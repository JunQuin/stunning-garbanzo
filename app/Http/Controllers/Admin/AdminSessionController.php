<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Admin\DataGetterController;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Routing\Route;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Cookie;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;

class AdminSessionController extends Controller
{
    public function show()
    {
        return view('admin/login');
    }

    public function index($id = null)
    {
        if (session('userId') == $id && $id !== null) {
            $sessionData = DataGetterController::adminDashboardSessionData($id);
            $proyectosData = DataGetterController::adminDashboardAllProjectsData();
            // dd($proyectosData);
            return view('admin/dashboard')->with([
                'sessionData' => $sessionData,
                'proyectosData' => $proyectosData
            ]);
        }
        Auth::guard('admin_users')->logout();
        Session::invalidate();
        // dd($request->session()->all());
        // $request->session()->regenerateToken();
        return redirect()->route('admin.login.show');
    }

    /**
     * Handle an authentication attempt.
     *
     * @param Request $request, $credencialesId
     * @return Application|Factory|View|RedirectResponse
     */

    public function authenticate(Request $request)
    {
        Auth::guard('admin_users')->logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        $credentials = $request->validate([
            'email' => ['required', 'email'],
            'password' => ['required'],
        ]);
        //        $credentials['password'] = Hash::make($credentials['password']);
        //        dd($credentials);
        if (Auth::guard('admin_users')->attempt($credentials, true)) {
            $request->session('admin_users')->regenerate();
            $user = DB::table('admin_users')->where('email', request('email'))->first();
            session(['userName' => $user->nombre]);
            session(['userCorreo' => $user->email]);
            session(['userId' => $user->id]);
            session(['userRol' => $user->rol]);
            return redirect()->route('admin.dashboard.index', ['id' => $user->id]);
        }

        return back()->withErrors([
            'email' => 'Las credenciales no coinciden con nuestros registros.',
        ]);
    }

    /**
     * Log the user out of the application.
     *
     * @param Request $request
     * @return Application|Redirector|RedirectResponse
     */
    public function destroy(Request $request)
    {
        Auth::guard('admin_users')->logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();
        return redirect()->route('admin.login.show');
    }
}

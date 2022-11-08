<?php

namespace App\Http\Controllers;

use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Routing\Redirector;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class SessionController extends Controller
{
    public function show()
    {
        return view('iniciar-sesion');
    }

    /**
     * Handle an authentication attempt.
     *
     * @param Request $request
     * @return Application|Factory|View|RedirectResponse
     */

    public function authenticate(Request $request)
    {
        $credentials = $request->validate([
            'email' => ['required', 'email'],
            'password' => ['required'],
        ]);
        //        $credentials['password'] = Hash::make($credentials['password']);
        //        dd($credentials);
        if (Auth::guard('web')->attempt($credentials, true)) {
            $request->session()->regenerate();
            $user = DB::table('users')->where('email', request('email'))->first();
            session(['userName' => $user->name]);
            session(['userId' => $user->id]);
            return redirect()->route('proyecto.dashboard');
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
        Auth::guard('web')->logout();
        $request->session()->flush();
        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect('/');
    }

    public function checkLogin()
    {
        if (Auth::guard('web')->check()) {
            $userId = session('userId');
            $project = ClsDataGetter::dashboardData($userId);
            return view('dashboard')->with(['project' => $project]);
        } else {
            return view('index');
        }
    }
}

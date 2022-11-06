<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Admin\AdminJueces;
use App\Models\Admin\AdminUsers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class AdminJuecesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $listadoJueces = adminJueces::where('status', 1)->get();
        return view('admin.jueces')->with(['listadoJueces' => $listadoJueces]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'nombre' => ['required'],
            'apellido' => ['required'],
            'email' => ['required'],
            'celular' => ['required'],
        ]);

        if (!AdminUsers::where('email', $request['email'])->orWhere('celular', $request['celular'])->first()) {
            AdminUsers::create([
                'nombre' => $request['nombre'] . ' ' . $request['apellido'],
                'email' => $request['email'],
                'celular' => $request['celular'],
                'password' => Hash::make($request['celular']),
                'rol' => 2, //Juez
                'status' => 1,
            ]);

            AdminJueces::create([
                'nombre' => $request['nombre'],
                'apellido' => $request['apellido'],
                'email' => $request['email'],
                'celular' => $request['celular'],
                'status' => 1,
            ]);

            return redirect('admin-jueces')->with('status', 'Juez Registrado Con Exito!');
        } else {
            return redirect('admin-jueces')->with('error', 'Juez Ya Registrado Previamente');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Admin\AdminJueces  $adminJueces
     * @return \Illuminate\Http\Response
     */
    public function show(AdminJueces $adminJueces)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Admin\AdminJueces  $adminJueces
     * @return \Illuminate\Http\Response
     */
    public function edit(AdminJueces $adminJueces)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Admin\AdminJueces  $adminJueces
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, AdminJueces $adminJueces)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int $id  $adminJueces
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $adminJuez = AdminJueces::findOrFail($id);
        $adminUser = AdminUsers::where('email', $adminJuez->email)
            ->where('celular', $adminJuez->celular)
            ->where('rol', 2);
        if ($adminJuez->delete  () && $adminUser->delete()) {
            return redirect()->route('admin-jueces.index')
                ->with('status', 'Juez Eliminado Exitosamente!');
        }
        return redirect()->route('admin-jueces.index')
        ->with('error', 'Juez No Encontrado!');
    }
}

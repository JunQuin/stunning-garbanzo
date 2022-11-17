<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Admin\AdminJueces;
use App\Models\User;
use App\Models\Admin\AdminProyectoJueces;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class AdminProyectoJuecesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // DataGetterController::adminDashboardJuezAsig(3);
        $proyectosData = DataGetterController::adminDashboardAllProjectsData();
        $jueces = DataGetterController::getJueces();
        $juezAsign = DataGetterController::adminDashboardJuezAsig();
        return view('admin/proyecto-juez')->with([
            'proyectosData' => $proyectosData,
            'jueces' => $jueces,
            'juezAsign' => $juezAsign
        ]);
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
        if ($request->juez1) {
            $juez = $request->juez1;
        }
        if ($request->juez2) {
            $juez = $request->juez2;
        }
        if ($request->juez3) {
            $juez = $request->juez3;
        }

        if (DB::table('admin_proyecto_jueces')->where('juez_id', '=', $juez)->where('proyecto_id', '=', $request->proyecto)->exists()) {
            return redirect('admin-proyecto-juez')->with('error', 'Juez Asignado Previamente!');
        } else {
            if (DB::table('admin_proyecto_jueces')->where('proyecto_id', '=', $request->proyecto)->where('posicion', '=', $request->posicion)->exists()) {
                DB::table('admin_proyecto_jueces')
                ->where('proyecto_id', $request->proyecto)
                ->where('posicion', $request->posicion)
                ->update(['juez_id' => $juez]);
                return redirect('admin-proyecto-juez')->with('status', 'Juez Actualizado Con Exito!');
            }
            AdminProyectoJueces::create([
                'juez_id' => $juez,
                'proyecto_id' => $request->proyecto,
                'posicion' => $request->posicion
            ]);
            return redirect('admin-proyecto-juez')->with('status', 'Juez Asignado Con Exito!');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Admin\AdminProyectoJueces  $adminProyectoJueces
     * @return \Illuminate\Http\Response
     */
    public function show(AdminProyectoJueces $adminProyectoJueces)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Admin\AdminProyectoJueces  $adminProyectoJueces
     * @return \Illuminate\Http\Response
     */
    public function edit(AdminProyectoJueces $adminProyectoJueces)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Admin\AdminProyectoJueces  $adminProyectoJueces
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, AdminProyectoJueces $adminProyectoJueces)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Admin\AdminProyectoJueces  $adminProyectoJueces
     * @return \Illuminate\Http\Response
     */
    public function destroy(AdminProyectoJueces $adminProyectoJueces)
    {
        //
    }
}

<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Admin\AdminProyectoJueces;
use Illuminate\Http\Request;

class AdminProyectoJuecesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $u = AdminProyectoJueces::toSql();
        dd('entra', $u);
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
        //
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

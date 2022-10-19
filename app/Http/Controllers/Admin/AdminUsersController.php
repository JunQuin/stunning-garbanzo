<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Admin\AdminUsers;
use Illuminate\Http\Request;

class AdminUsersController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        dd(AdminUsers::all());
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
     * @param  \App\Models\Admin\AdminUsers  $adminUsers
     * @return \Illuminate\Http\Response
     */
    public function show(AdminUsers $adminUsers)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Admin\AdminUsers  $adminUsers
     * @return \Illuminate\Http\Response
     */
    public function edit(AdminUsers $adminUsers)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Admin\AdminUsers  $adminUsers
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, AdminUsers $adminUsers)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Admin\AdminUsers  $adminUsers
     * @return \Illuminate\Http\Response
     */
    public function destroy(AdminUsers $adminUsers)
    {
        //
    }
}

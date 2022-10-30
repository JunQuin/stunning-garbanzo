<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Admin\AdminUsers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use stdClass;

class DataGetterController extends Controller
{
    public static function adminDashboardSessionData(int $id)
    {
        $adminUserData = new stdClass();
        $adminUser = DB::table('admin_users')
            ->where('id', '=', $id)
            ->first();
        $adminUserData->id = $adminUser->id;
        $adminUserData->nombre = $adminUser->nombre;
        $adminUserData->email = $adminUser->email;
        $adminUserData->celular = $adminUser->celular;
        $adminUserData->rol = $adminUser->rol;
        return ($adminUserData);
    }

    public static function adminDashboardAllProjectsData()
    {
        $allProyectsData = DB::table('dashboarddataview')
            ->where('status', '=', 1)
            ->orderBy('pro_nombre')
            ->get();
        return ($allProyectsData);
    }

    public static function adminDashboardProjectData($id)
    {
        $proyectsData = DB::table('dashboarddataview')
            ->where('status', '=', 1)
            ->where('pro_id', '=', $id)
            ->first();
        return ($proyectsData);
    }
}

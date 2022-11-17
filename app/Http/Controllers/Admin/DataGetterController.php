<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Admin\AdminJueces;
use App\Models\Admin\AdminProyectoJueces;
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
        $proyectosData = DB::table('dashboarddataview')
            ->where('status', '=', 1)
            ->where('pro_id', '=', $id)
            ->first();
        return ($proyectosData);
    }

    public static function adminDashboardJuezAsig()
    {
        $juezAsig = DB::table('admin_proyecto_jueces')
            ->select(
                'admin_proyecto_jueces.proyecto_id',
                'admin_proyecto_jueces.posicion',
                'admin_jueces.nombre',
                'admin_jueces.apellido'
            )
            ->join('admin_jueces', 'admin_jueces.id', '=', 'admin_proyecto_jueces.juez_id')
            ->get();
        // dd($idProyecto->toJson());

        $juezAsig->toArray();
        $return = array();
        foreach ($juezAsig as $val) {
            $return[$val->proyecto_id][$val->posicion-1] = $val;
        }

        return ($return);
    }

    public static function getJueces()
    {
        return DB::table('admin_jueces')
            ->orderBy('nombre', 'asc')
            ->get();

        // AdminJueces::order('nombre','desc')->get();
    }

    /**
     * Groups an array by a given key. Any additional keys will be used for grouping
     * the next set of sub-arrays.
     *
     * @author Jake Zatecky
     *
     * @param array $arr     The array to be grouped.
     * @param mixed $key,... A set of keys to group by.
     *
     * @return array
     */
    function array_group_by(array $arr, $key): array
    {
        if (!is_string($key) && !is_int($key) && !is_float($key) && !is_callable($key)) {
            trigger_error('array_group_by(): The key should be a string, an integer, a float, or a function', E_USER_ERROR);
        }

        $isFunction = !is_string($key) && is_callable($key);

        // Load the new array, splitting by the target key
        $grouped = [];
        foreach ($arr as $value) {
            $groupKey = null;

            if ($isFunction) {
                $groupKey = $key($value);
            } else if (is_object($value)) {
                $groupKey = $value->{$key};
            } else {
                $groupKey = $value[$key];
            }

            $grouped[$groupKey][] = $value;
        }

        // Recursively build a nested grouping if more parameters are supplied
        // Each grouped array value is grouped according to the next sequential key
        if (func_num_args() > 2) {
            $args = func_get_args();

            foreach ($grouped as $groupKey => $value) {
                $params = array_merge([$value], array_slice($args, 2, func_num_args()));
                $grouped[$groupKey] = call_user_func_array('array_group_by', $params);
            }
        }

        return $grouped;
    }
}

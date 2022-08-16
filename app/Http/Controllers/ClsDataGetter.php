<?php

namespace App\Http\Controllers;

use Illuminate\Support\Collection;
use Illuminate\Support\Facades\DB;

class ClsDataGetter
{
    public static function dashboardData(int $id)
    {
        $component = DB::table('dashboarddataview')
            ->where('pro_id', '=' , $id)
            ->first();
        return ($component);
    }
}

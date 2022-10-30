<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class PorjectViewerController extends Controller
{
    public function show(int $id = null)
    {
        if ($id != null) {
            return view('admin.project',['project'=>DataGetterController::adminDashboardProjectData($id)]);
        }
        else{
            return back(302);
        }
    }
}

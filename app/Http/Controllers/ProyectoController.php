<?php

namespace App\Http\Controllers;

use App\Models\Proyecto;
use App\Models\User;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\ValidationException;


class ProyectoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Application|Factory|\Illuminate\Contracts\View\View|\Illuminate\Http\Response
     */
    public function create()
    {
        //        $user = DB::table('users')->where('id', session('userId'))->first();
        // $asesor = DB::table('asesors')->get();
        $categoria = DB::table('categorias')->get();
        $sub_categoria = DB::table('sub_categorias')->get();

        return view('registrar-proyecto', compact('categoria', 'sub_categoria'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param Request $request
     * @return Application|Factory|View
     * @throws ValidationException
     */
    public function store(Request $request)
    {

        $this->validate($request, [
            'proyectoNombre' => ['required', 'max:100'],
            'proyectoDescripcion' => ['required', 'max:1000'],
            'proyectoAsesorNombre' => ['required'],
            'proyectoAsesorCelular' => ['required'],
            'proyectoAsesorCorreo' => ['required', 'email'],
            'participado' => ['required'],
            'categoria' => ['required'],
            'participante1_Nombre' => ['required'],
            'participante1_Apellidos' => ['required'],
            'participante1_Telefono' => ['required'],
            'participante1_Correo' => ['required', 'email'],
            'participante1_InstitucionProcedencia' => ['required'],
            'participante1_NivelEducativo' => ['required'],
            'participante1_TallaPlayera' => ['required'],
            // 'participante2_Nombre' => ['required'],
            // 'participante2_Apellidos' => ['required'],
            // 'participante2_Telefono' => ['required'],
            // 'participante2_Correo' => ['required', 'email'],
            // 'participante2_InstitucionProcedencia' => ['required'],
            // 'participante2_NivelEducativo' => ['required'],
            // 'participante2_TallaPlayera' => ['required'],
        ]);

        //        dd(with(['mail'=> $request['participante1_Correo'],'pass' => $request['participante1_Telefono']]));
        if (DB::table('users')->where('email', $request['participante1_Correo'])->first()) {
            return redirect()->route('error_registro');
        }

        $user = User::create([
            /*            'id' => ['required', 'string', 'max:12', 'unique:users'],*/
            'name' => $request['proyectoNombre'],
            'status' => 1,
            'email' => $request['participante1_Correo'],
            'password' => Hash::make($request['participante1_Telefono']),
            'descripcion' => $request['proyectoDescripcion'],
            'asesorNombre' => $request['proyectoAsesorNombre'],
            'asesorCelular' => $request['proyectoAsesorCelular'],
            'asesorEmail' => $request['proyectoAsesorCorreo'],
            'participado' => $request['participado'],
            'categoria' => $request['categoria'],
            'subcategoria' => $request['sub-Categoria'],
            'participante1_Nombre' => $request['participante1_Nombre'],
            'participante1_Apellidos' => $request['participante1_Apellidos'],
            'participante1_Telefono' => $request['participante1_Telefono'],
            'participante1_Correo' => $request['participante1_Correo'],
            'participante1_InstitucionProcedencia' => $request['participante1_InstitucionProcedencia'],
            'participante1_NivelEducativo' => $request['participante1_NivelEducativo'],
            'participante1_TallaPlayera' => $request['participante1_TallaPlayera'],
            'participante2_Nombre' => $request['participante2_Nombre'],
            'participante2_Apellidos' => $request['participante2_Apellidos'],
            'participante2_Telefono' => $request['participante2_Telefono'],
            'participante2_Correo' => $request['participante2_Correo'],
            'participante2_InstitucionProcedencia' => $request['participante2_InstitucionProcedencia'],
            'participante2_NivelEducativo' => $request['participante2_NivelEducativo'],
            'participante2_TallaPlayera' => $request['participante2_TallaPlayera'],
            'bitacoras' => 'null',
        ]);
        /*return Validator::make((array)$request, [
            'proyectoNombre' => ['required', 'alpha_num', 'max:100'],
            'proyectoDescripcion' => ['required', 'alpha_num', 'max:500'],
            'proyectoAsesor' => ['required'],
        ]);*/
        auth()->login($user);
        session(['userName' => $user->name]);
        session(['userId' => $user->id]);
        return view('confirmacion-registro')->with(['mail' => $request['participante1_Correo'], 'pass' => $request['participante1_Telefono']]);
    }

    /**
     * Display the specified resource.
     *
     * @param \App\Models\Proyecto $proyecto
     * @return \Illuminate\Http\Response
     */
    public function show(Proyecto $proyecto)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param \App\Models\Proyecto $proyecto
     * @return Application|Factory|View|\Illuminate\Http\Response
     */
    public function edit(Proyecto $proyecto)
    {
        return \view('edit-project');
    }

    /**
     * Update the specified resource in storage.
     *
     * @param Request $request
     * @param \App\Models\Proyecto $proyecto
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Proyecto $proyecto)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param \App\Models\Proyecto $proyecto
     * @return \Illuminate\Http\Response
     */
    public function destroy(Proyecto $proyecto)
    {
        //
    }

    public function dashboard()
    {
        $userid = session('userId');
        $project = ClsDataGetter::dashboardData($userid);
        return view('dashboard')->with(['project' => $project]);
    }
}

<?php

namespace App\Http\Controllers;

use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;
use Illuminate\Validation\ValidationException;

class VideoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Application|Factory|View
     */
    public function create()
    {
        $url = DB::table('users')->select('link')->where('id', session('userId'))->first();

        if (isset($url->link)) {
            $pos = strrpos($url->link, '=');
            $link = $pos === false ? $url->link : substr($url->link, $pos + 1);
            return view('files.upload-video')->with(['link' => $link,'url' => $url->link]);
        }
        return view('files.upload-video')->with(['link' => null]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param Request $request
     * @return RedirectResponse
     * @throws ValidationException
     */
    public function store(Request $request): RedirectResponse
    {
        $this->validate($request, [
            'formFile' => 'required',
        ]);

        $userid = session('userId');
        $video = $request['formFile'];

        try {
            DB::table('users')
                ->where('id', $userid)
                ->update(['link' => $video]);

            return back()->with('formFile', 'Link del Video Guardado Correctamente');
        } catch (\Exception $e) {
            return back()->with('formFile', 'Error, Contacte al aministrador del sitio');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param Request $request
     * @param  int  $id
     * @return Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return Response
     */
    public function destroy($id)
    {
        //
    }
}

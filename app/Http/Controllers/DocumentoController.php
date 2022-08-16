<?php

namespace App\Http\Controllers;

use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Storage;
use Illuminate\Validation\ValidationException;
use Symfony\Component\HttpFoundation\BinaryFileResponse;

class DocumentoController extends Controller
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
     * @return Factory|Application|View
     */
    public function create()
    {
        $file = DB::table('users')->select('document')->where('id', session('userId'))->first();
        return view('files.upload-documento')->with(['file' => $file]);
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
            'formFile' => 'required|mimes:pdf',
        ]);

        $userid = session('userId');
        $pdf = $request->file('formFile');
        $fileUrl = time() . '_' . $pdf->getClientOriginalName();
        $oldFileUrl = DB::table('users')->select('document')->where('id', session('userId'))->first();

        if (Storage::disk('documentos')->exists($oldFileUrl->document)){
            Storage::disk('documentos')->delete($oldFileUrl->document);
        }

        try {
            Storage::disk('documentos')->put($fileUrl, file_get_contents($pdf->getRealPath()));
            DB::table('users')
                ->where('id', $userid)
                ->update(['document' => $fileUrl]);

            return back()->with('formFile', 'Proyecto Guardado Correctamente');
        } catch (\Exception $e) {
            return back()->with('formFile', 'Error, Contacte al aministrador del sitio');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param string $url
     * @return BinaryFileResponse
     */
    public function show(string $url)
    {
        $path = public_path('files/documentos' . '/' . $url);
        // header
        $header = [
            'Content-Type' => 'application/pdf',
            'Content-Disposition' => 'inline; filename="' . $path . '"'
        ];
        return response()->file($path, $header);
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

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
use Symfony\Component\HttpFoundation\BinaryFileResponse;

class BitacoraController extends Controller
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
        $file = DB::table('users')->select('bitacoras')->where('id', session('userId'))->first();
        return view('files.upload-bitacora')->with(['file' => $file->bitacoras]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @return RedirectResponse
     * @throws \Illuminate\Validation\ValidationException
     */
    public function store(Request $request): RedirectResponse
    {
        $this->validate($request, [
            'formFile' => 'required|mimes:pdf',
        ]);

        $userid = session('userId');
        $pdf = $request->file('formFile');
        $fileUrl = time() . '_' . $pdf->getClientOriginalName();
        $oldFileUrl = DB::table('users')->select('bitacoras')->where('id', session('userId'))->first();

        if (Storage::disk('bitacoras')->exists($oldFileUrl->bitacoras)){
            Storage::disk('bitacoras')->delete($oldFileUrl->bitacoras);
        }

        try {
            Storage::disk('bitacoras')->put($fileUrl, file_get_contents($pdf->getRealPath()));
            DB::table('users')
                ->where('id', $userid)
                ->update(['bitacoras' => $fileUrl]);

            return back()->with('formFile', 'Bitacora Guardada Correctamente');
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
    public function show(string $url):BinaryFileResponse
    {
        $path = public_path('files/bitacoras' . '/' . $url);
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
     * @param int $id
     * @return Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param int $id
     * @return Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param int $id
     * @return Response
     */
    public function destroy($id)
    {
        //
    }
}

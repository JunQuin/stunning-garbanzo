<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\BinaryFileResponse;

class FileViewer extends Controller
{
    /**
     * Display the specified recibo.
     *
     * @param string $url
     * @return BinaryFileResponse
     */
    public function showRecibo(string $url): BinaryFileResponse
    {
        $path = public_path('files/recibos' . '/' . $url);
        // header
        $header = [
            //            'Content-Type' => 'application/pdf',
            'Content-Disposition' => 'inline; filename="' . $path . '"'
        ];
        return response()->file($path, $header);
    }

    /**
     * Display the specified Documento.
     *
     * @param string $url
     * @return BinaryFileResponse
     */
    public function showDocumento(string $url): BinaryFileResponse
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
     * Display the specified Bitacora.
     *
     * @param string $url
     * @return BinaryFileResponse
     */
    public function showBitacora(string $url): BinaryFileResponse
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
     * Display the specified Video.
     *
     * @param string $url
     * @return BinaryFileResponse
     */
    public function showVideo(string $url): BinaryFileResponse
    {
        $path = public_path('files/recibos' . '/' . $url);
        // header
        $header = [
            //            'Content-Type' => 'application/pdf',
            'Content-Disposition' => 'inline; filename="' . $path . '"'
        ];
        return response()->file($path, $header);
    }
}

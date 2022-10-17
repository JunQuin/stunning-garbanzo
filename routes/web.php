<?php

use App\Http\Controllers\BitacoraController;
use App\Http\Controllers\DocumentoController;
use App\Http\Controllers\ProyectoController;
use App\Http\Controllers\ReciboController;
use App\Http\Controllers\SessionController;
use App\Http\Controllers\VideoController;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Storage;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', [SessionController::class, 'checkLogin'])->name('index');

Route::get('/login', [SessionController::class, 'show'])->name('login.show')->middleware('guest');

Route::post('/login', [SessionController::class, 'authenticate'])->name('login')->middleware('guest');

Route::get('/logout', [SessionController::class, 'destroy'])->name('logout')->middleware('auth');

Route::get('/registrar-proyecto', [ProyectoController::class, 'create'])->name('proyecto.create')->middleware('guest');

Route::post('/registrar-proyecto.store', [ProyectoController::class, 'store'])->name('proyecto.store');

Route::get('/dashboard', [ProyectoController::class, 'dashboard'])->name('proyecto.dashboard')->middleware('auth');

Route::get('/editar-proyecto', [ProyectoController::class, 'edit'])->name('proyecto.edit')->middleware('auth');

/*
 * CARGA DE ARCHIVOS
 **/

Route::resource('/bitacora', BitacoraController::class)->middleware('auth');

Route::resource('/documento', DocumentoController::class)->middleware('auth');

Route::resource('/video', VideoController::class)->middleware('auth');

Route::resource('/recibo', ReciboController::class)->middleware('auth');

Route::get('/error_registro', function () {
    return view('error.error_crear');
})->name(('error_registro'));

<?php

use App\Http\Controllers\Admin\AdminSessionController;
use App\Http\Controllers\Admin\AdminUsersController;
use App\Http\Controllers\Admin\FileViewer;
use App\Http\Controllers\BitacoraController;
use App\Http\Controllers\DocumentoController;
use App\Http\Controllers\ProyectoController;
use App\Http\Controllers\ReciboController;
use App\Http\Controllers\SessionController;
use App\Http\Controllers\VideoController;
use Illuminate\Support\Facades\Route;

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

/*
 * ADMIN ROUTES
 */

Route::resource('/admin-users', AdminUsersController::class);
Route::get('/admin-dashboard/{id?}', [AdminSessionController::class, 'index'])->name('admin.dashboard.index')->middleware('admin.auth');
Route::get('/admin-file-Viewer-recibo/{url?}', [FileViewer::class, 'showRecibo'])->name('admin.view.recibo')->middleware('admin.auth');
Route::get('/admin-file-Viewer-documento/{url?}', [FileViewer::class, 'showDocumento'])->name('admin.view.documento')->middleware('admin.auth');
Route::get('/admin-file-Viewer-bitacora/{url?}', [FileViewer::class, 'showBitacora'])->name('admin.view.bitacora')->middleware('admin.auth');
Route::get('/admin-login', [AdminSessionController::class, 'show'])->name('admin.login.show')->middleware('admin.guest');
Route::post('/admin-login', [AdminSessionController::class, 'authenticate'])->name('admin.login.authenticate')->middleware('admin.guest');

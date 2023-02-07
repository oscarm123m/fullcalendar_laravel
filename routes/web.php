<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\RegistroController;
use App\Http\Controllers\ClientesController;
use App\Http\Controllers\MascotasController;
use App\Http\Controllers\CitasController;

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

Route::get('/', function () {
    return view('login');
});

Route::get('listmascotas', [MascotasController::class,'listmascotas'])->name('listmascotas');
Route::get('crearmascotas', [MascotasController::class,'crearmascotas'])->name('crearmascotas');
Route::post('guardarmascotas', [MascotasController::class,'guardarmascotas'])->name('guardarmascotas');
Route::get('actualizarmascotas/{idp}', [MascotasController::class,'actualizarmascotas'])->name('actualizarmascotas');
Route::post('guardarcambiomascotas', [MascotasController::class,'guardarcambiomascotas'])->name('guardarcambiomascotas');
Route::get('borrarmascotas/{idp}', [MascotasController::class,'borrarmascotas'])->name('borrarmascotas');

Route::get('prueba', [MascotasController::class,'prueba'])->name('prueba');

Route::get('listclientes', [ClientesController::class,'listclientes'])->name('listclientes');
Route::get('crearclientes', [ClientesController::class,'crearclientes'])->name('crearclientes');
Route::post('guardarclientes', [ClientesController::class,'guardarclientes'])->name('guardarclientes');
Route::get('actualizarclientes/{idp}', [ClientesController::class,'actualizarclientes'])->name('actualizarclientes');
Route::post('guardarcambioclientes', [ClientesController::class,'guardarcambioclientes'])->name('guardarcambioclientes');
Route::get('borrarclientes/{idp}', [ClientesController::class,'borrarclientes'])->name('borrarclientes');

Route::get('mensaje', [ClientesController::class,'mensaje']);

Route::get('login', [LoginController::class,'login'])->name('login');
Route::post('validar', [LoginController::class,'validar'])->name('validar');
Route::get('principal', [LoginController::class,'principal'])->name('principal');
Route::get('cerrarsession', [LoginController::class,'cerrarsession'])->name('cerrarsession');
Route::get('registro', [LoginController::class,'registro'])->name('registro');

Route::post('registrardatos', [RegistroController::class,'registrardatos'])->name('registrardatos');

//Route::get('calendario', [CitasController::class,'calendario'])->name('calendario');
Route::post('agregar', [CitasController::class,'store']);
Route::get('mostrar', [CitasController::class,'show']);

Route::get('listcitas', [CitasController::class,'listcitas'])->name('listcitas');
Route::get('crearcitas', [CitasController::class,'crearcitas'])->name('crearcitas');
Route::post('guardarcitas', [CitasController::class,'guardarcitas'])->name('guardarcitas');
Route::get('actualizarcitas/{idp}', [CitasController::class,'actualizarcitas'])->name('actualizarcitas');
Route::post('guardarcambiocitas', [CitasController::class,'guardarcambiocitas'])->name('guardarcambiocitas');
Route::get('borrarcitas/{idp}', [CitasController::class,'borrarcitas'])->name('borrarcitas');

Route::get('end/{region}', [CitasController::class,'end'])->name('end');

//Route::get('calendario', [CitasController::class, 'index'])->name('calendario');
//Route::post('fullcalenderAjax', [CitasController::class, 'ajax']);
Route::get('calendario', [CitasController::class, 'index'])->name('calendario');
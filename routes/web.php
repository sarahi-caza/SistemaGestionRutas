<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\EmpleadoController;


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
    return view('welcome');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
//ruta a formulario informacion personal empleado
Route::get('/info_empleado', function () {
    return view('info_empleado');
});
//ruta a formulario informacion personal chofer
Route::get('/info_chofer', function () {
    return view('info_chofer');
});
//ruta a formulario ingreso nuevo horario
Route::get('/nuevo_horario', function () {
    return view('nuevo_horario');
});
//ruta a formulario ingreso nuevo horario selecionr area
Route::get('/selec_nuevo_horario', function () {
    return view('selec_nuevo_horario');
});

Route::resource('empleados', EmpleadoController::class);

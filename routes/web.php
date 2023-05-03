<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\EmpleadoController;
use App\Http\Controllers\ChoferController;


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

//ruta a formulario ingreso nuevo horario
Route::get('/nuevo_horario', function () {
    return view('nuevo_horario');
});
//ruta a formulario ingreso nuevo horario selecionr area
Route::get('/selec_nuevo_horario', function () {
    return view('selec_nuevo_horario');
});

Route::resource('empleados', EmpleadoController::class);
Route::resource('choferes', ChoferController::class);
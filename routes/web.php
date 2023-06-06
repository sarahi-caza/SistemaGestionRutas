<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\EmpleadoController;
use App\Http\Controllers\ChoferController;
use App\Http\Controllers\RutaController;
use App\Http\Controllers\HorarioController;

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
Route::get('/horarios.select_area', [HorarioController::class, 'index'])->name('horarios.select_area');
Route::get('/horarios.nuevo_horario/{area}', [HorarioController::class, 'selectArea'])->name('horarios.nuevo_horario');
Route::post('/horarios.store', [HorarioController::class, 'store'])->name('horarios.store');
Route::get('/horarios.historial', [HorarioController::class, 'historialHorarios'])->name('horarios.historial');

//rutas para asignar empleados a una ruta
Route::get('/rutas.asignarRuta', [RutaController::class, 'asignarRuta'])->name('rutas.asignarRuta');
Route::post('/rutas.storeAsignarRuta', [RutaController::class, 'storeAsignarRuta'])->name('rutas.storeAsignarRuta');

//rutas para Re-asignar empleados a una ruta
Route::get('/rutas.reAsignarRuta/{id}', [RutaController::class, 'reAsignarRuta'])->name('rutas.reAsignarRuta');
Route::post('/rutas.storeReAsignarRuta', [RutaController::class, 'storeReAsignarRuta'])->name('rutas.storeReAsignarRuta');

Route::resource('empleados', EmpleadoController::class);
Route::resource('choferes', ChoferController::class);
Route::resource('rutas', RutaController::class);
Route::resource('horarios', HorarioController::class);

<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\ApiController;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:sanctum')->get('/users', function (Request $request) {
    return $request->users();
});

//Route::apiResource('apiEmpleado', ApiEmpleado::class)
//      ->only(['index','show', 'destroy'])
//      ->middleware('auth:sanctum');

Route::post('login', [App\Http\Controllers\Api\LoginController::class, 'login']);

Route::post('apiLogin', [ApiController::class, 'apiLogin'])->middleware('auth:sanctum');
Route::post('getHorario', [ApiController::class, 'getHorario'])->middleware('auth:sanctum');
Route::post('actualizarPwd', [ApiController::class, 'actualizarPwd'])->middleware('auth:sanctum');
Route::post('listaRecorrido', [ApiController::class, 'listaRecorrido'])->middleware('auth:sanctum');
Route::post('ubicacionCasa', [ApiController::class, 'ubicacionCasa'])->middleware('auth:sanctum');
Route::post('olvidoClave', [ApiController::class, 'olvidoClave'])->middleware('auth:sanctum');

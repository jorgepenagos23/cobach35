<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

use App\Http\Controllers\AlumnoController;
use App\Http\Controllers\LoginController;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) { return $request->user();
});


///ruta api resource para el sistema general
Route::apiResource('v1/secciones', SeccionController::class);
Route::apiResource('v1/usuarios', UsuarioController::class);
Route::apiResource('v1/alumnos',AlumnoController::class);
Route::apiResource('v1/alumno-reporte',AlumnoReporteController::class);

Route::post('v1/login', [LoginController::class, 'authenticate']);

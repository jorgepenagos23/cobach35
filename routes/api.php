<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

use App\Http\Controllers\AlumnoController;
use App\Http\Controllers\BoletaController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\PublicacionController;


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

Route::middleware('auth:api')->group(function () {


});




///// rutas nuevas PARA API REST
Route::apiResource('v1/alumnos', AlumnoController::class, [ 'parameters' => ['v1/alumnos' => 'alumno' ]])->middleware('auth:sanctum');


Route::get('user/index', [UserController::class, 'index']);
Route::get('user/index2', [UserController::class, 'index2']);

Route::get('v1/boleta', [BoletaController::class, 'index'])->middleware('auth:sanctum');


Route::get('v1/publicacion', [PublicacionController::class,'index']);
Route::get('v1/publicacion/create', [PublicacionController::class, 'create'])->middleware('auth:sanctum');
Route::post('v1/publicacion', [PublicacionController::class, 'store']);
Route::get('v1/publicacion/{id}', [PublicacionController::class, 'show'])->middleware('auth:sanctum');
Route::get('v1/publicacion/{id}/edit', [PublicacionController::class, 'edit'])->middleware('auth:sanctum');
Route::put('v1/publicacion/{id}', [PublicacionController::class, 'update'])->middleware('auth:sanctum');
Route::delete('v1/publicacion/{id}', [PublicacionController::class, 'destroy'])->middleware('auth:sanctum');





// POST NO MOVER 
Route::post('v1/login', [LoginController::class, 'authenticate']);
Route::post('user/create',[UserController::class,'create']);
Route::post('/logout',[LoginController::class, 'logout']);
Route::post('/revoke',[LoginController::class, 'revokeAllTokens']);


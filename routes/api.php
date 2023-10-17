<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

use App\Http\Controllers\AlumnoController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\UserController;

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
Route::post('/logout',[LoginController::class, 'logout']);


///// rutas nuevas 
Route::apiResource('v1/alumnos',AlumnoController::class);
Route::post('v1/login', [LoginController::class, 'authenticate']);

Route::get('user/index', [UserController::class, 'index']);

Route::post('user/create',[UserController::class,'create']);



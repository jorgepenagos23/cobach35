 <?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

use App\Http\Controllers\AlumnoController;
use App\Http\Controllers\AlumnoReporteController;
use App\Http\Controllers\BoletaController;
use App\Http\Controllers\BoletaParcial1Controller;
use App\Http\Controllers\DescargaController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\PublicacionController;
use App\Http\Controllers\ReporteController;

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
Route::get('user/index3', [UserController::class, 'index3'])->middleware('auth:sanctum');

///boletas api 
Route::get('v1/boleta', [BoletaController::class, 'index'])->middleware('auth:sanctum');
Route::get('/v1/boleta/parcial1', [BoletaParcial1Controller::class, 'index'])->name('index');
Route::get('v1/generar/parcial1', [BoletaParcial1Controller::class,'generarPdf']);



//alunos rutas api

Route::get('v1/alumno/show/{id}',[AlumnoController::class,'show'])->middleware('auth:sanctum');


//publicaciones api
Route::get('v1/publicacion', [PublicacionController::class,'index']);
Route::get('v1/publicacion/create', [PublicacionController::class, 'create'])->middleware('auth:sanctum');
Route::post('v1/publicacion', [PublicacionController::class, 'store']);
Route::get('v1/publicacion/{id}', [PublicacionController::class, 'show'])->middleware('auth:sanctum');
Route::get('v1/publicacion/{id}/edit', [PublicacionController::class, 'edit'])->middleware('auth:sanctum');
Route::put('v1/publicacion/{id}', [PublicacionController::class, 'update'])->middleware('auth:sanctum');
Route::delete('v1/publicacion/{id}', [PublicacionController::class, 'destroy'])->middleware('auth:sanctum');

//reportes api

Route::get('v1/reporte', [ReporteController::class,'index']);
Route::get('v1/reportes/alumnos', [ReporteController::class,'index2']);

Route::post('v1/reporte/subir', [AlumnoReporteController::class, 'store']);
Route::get('v1/reporte/alumno/show/{id}', [AlumnoReporteController::class, 'show'])->middleware('auth:sanctum');


Route::get('/obtener-reporte/{matricula}', [AlumnoReporteController::class, 'obtenerReportedelALumno']);



Route::get('/obtener-boletas/{matricula}', [AlumnoController::class, 'obtenerBoletasDelAlumno'])->middleware('auth:sanctum');





// POST NO MOVER 
Route::post('v1/login', [LoginController::class, 'authenticate']);
Route::post('user/create',[UserController::class,'create']);
Route::post('/logout',[LoginController::class, 'logout']);
Route::post('/revoke',[LoginController::class, 'revokeAllTokens']);
Route::post('/subir-excel-alumno', [AlumnoController::class, 'import'])->name('upload-excel-alumno')->middleware('auth:sanctum');;
Route::post('/subir-excel-users', [UserController::class, 'import'])->name('upload-excel-users')->middleware('auth:sanctum');;


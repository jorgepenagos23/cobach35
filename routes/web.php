<?php

use App\Http\Controllers\AlumnoController;
use App\Http\Controllers\BoletaParcial1Controller;
use App\Http\Controllers\BoletaParcial2Controller;

use App\Http\Controllers\PrimeroBoletaParcial2Controller;

use App\Http\Controllers\DescargaController;
use App\Http\Controllers\LoginController;

use App\Http\Controllers\PrimeroABoletaParcial2Controller;
use App\Http\Controllers\PrimeroABoletaParcial3Controller;
use App\Http\Controllers\UserController;
use App\Models\Primero_A_BoletaParcial2;
use Illuminate\Support\Facades\Artisan;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/
Route::get('/boletas_formato', [BoletaParcial1Controller::class, 'alumnosparaboletas']);




Route::middleware(['web', 'auth'])->group(function () {
});



Route::get('/', function () { return view('welcome');})->name('welcome');
Route::get('/listar_alumno',[AlumnoController::class,'index2'])->name('listarAlumno');

Route::post('/import', [AlumnoController::class, 'import'])->name('import');


Route::get('/pdfs', [DescargaController::class, 'index2']);
Route::post('/pdfs', [DescargaController::class, 'store']);




//rutas import PRIMER SEMESTRE 
Route::post('/import_parcial1', [BoletaParcial1Controller::class, 'import'])->name('/import_parcial1');  /// PARCIAL 1 
Route::post('/import_primero_A_parcial2', [PrimeroABoletaParcial2Controller::class, 'import'])->name('/import_primero_A_parcial2');  /// PARCIAL 1 
Route::post('/import_primero_A_parcial3', [PrimeroABoletaParcial3Controller::class, 'import'])->name('/import_primero_A_parcial3');  /// PARCIAL 3 





///rutas import SEGUNDO SEMESTRE 

Route::post('/import_parcial1/segundo', [BoletaParcial2Controller::class, 'import'])->name('/import_parcial1/segundo');  /// PARCIAL 1 
Route::post('/import_parcial2/segundo', [BoletaParcial2Controller::class, 'import2'])->name('/import_parcial2/segundo');  /// PARCIAL 1 
Route::post('/import_parcial3/segundo', [BoletaParcial2Controller::class, 'import3'])->name('/import_parcial2/segundo');  /// PARCIAL 1 














Route::get('/listar_parcial1', [BoletaParcial1Controller::class, 'index2'])->name('index2');









/// RUTAS DE DESCARGA  PRIMER SEMESTRE PARCIAL 1
Route::get('/descargar-pdf/{nombreArchivo}', function ($nombreArchivo) {

    $pdfPath = "boletas/primer_semestre/grupoA/parcial1/{$nombreArchivo}";

    if (Storage::exists($pdfPath)) {
        return response()->download(Storage::path($pdfPath));
    } else {
        return response()->json(['message' => 'Archivo no encontrado'], 404);
    }
});




/// RUTAS DE DESCARGA  PRIMER SEMESTRE PARCIAL 2



/// RUTAS DE DESCARGA  PRIMER SEMESTRE PARCIAL 3

/// RUTAS DE DESCARGA  PRIMER SEMESTRE PARCIAL 4

/// RUTAS DE DESCARGA  PRIMER SEMESTRE PARCIAL 5

/// RUTAS DE DESCARGA  PRIMER SEMESTRE PARCIAL 6






Route::get('/descargar_pdf/todos/{nombreArchivo}', function ($nombreArchivo) {

    $pdfPath = "pdf/{$nombreArchivo}";

    if (Storage::exists($pdfPath)) {
        return response()->download(Storage::path($pdfPath));
    } else {
        return response()->json(['message' => 'Archivo no encontrado'], 404);
    }
});





Route::get('/contenidos', [DescargaController::class, 'index2']);

Route::put('/contenidos/{id}/visibilidad', [DescargaController::class, 'actualizarVisibilidad']);
Route::post('/subir-pdf', [DescargaController::class, 'subirPdf']);



Route::get('/migrar',function(){ Artisan::call('migrate',["--seed"=>true]);
});



//Route::get('/{any}', function () { return redirect('/');})->where('any', '.*');






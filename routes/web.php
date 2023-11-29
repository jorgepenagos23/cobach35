<?php

use App\Http\Controllers\AlumnoController;
use App\Http\Controllers\BoletaParcial1Controller;
use App\Http\Controllers\DescargaController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\UserController;
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

Route::middleware(['web', 'auth'])->group(function () {
});



Route::get('/', function () { return view('welcome');})->name('welcome');
Route::get('/listar_alumno',[AlumnoController::class,'index2'])->name('listarAlumno');

Route::post('/import', [AlumnoController::class, 'import'])->name('import');


Route::get('/pdfs', [DescargaController::class, 'index']);
Route::post('/pdfs', [DescargaController::class, 'store']);



Route::get('/listar_parcial1', [BoletaParcial1Controller::class, 'index2'])->name('index2');


Route::post('/import_parcial1', [BoletaParcial1Controller::class, 'import'])->name('/import_parcial1');

// En el archivo de rutas (web.php o api.php)
Route::get('/descargar-pdf/{nombreArchivo}', function ($nombreArchivo) {
    // Asegúrate de que el nombre del archivo es seguro para evitar posibles problemas de seguridad

    // Define la ruta completa al archivo PDF en el sistema de archivos de Laravel
    $pdfPath = "boletas/{$nombreArchivo}";

    // Verifica si el archivo existe en el sistema de archivos de Laravel
    if (Storage::exists($pdfPath)) {
        // Devuelve el archivo para descarga
        return response()->download(Storage::path($pdfPath));
    } else {
        // Devuelve una respuesta 404 si el archivo no se encuentra
        return response()->json(['message' => 'Archivo no encontrado'], 404);
    }
});


Route::post('/subir-pdf', [DescargaController::class, 'subirPdf']);



Route::get('/migrar',function(){ Artisan::call('migrate',["--seed"=>true]);
});






//Route::get('/{any}', function () { return redirect('/');})->where('any', '.*');


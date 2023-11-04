<?php

use App\Http\Controllers\AlumnoController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Artisan;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
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


Route::get('/migrar',function(){ Artisan::call('migrate',["--seed"=>true]);
});



//Route::post('/import', [AlumnoController::class, 'import'])->name('import');



//Route::get('/{any}', function () { return redirect('/');})->where('any', '.*');


<?php

namespace App\Http\Controllers;
use App\Models\User;
use App\Models\Boleta;

use Illuminate\Http\Request;
use Database\Factories\UserFactory;
use Illuminate\Support\Facades\Cache;
use App\Http\Requests\User\IndexRequest;
use App\Http\Resources\UserResource;
use App\Http\Requests\User\CreateRequest;
use App\Imports\UserImportExcel;
use App\Models\Alumno;
use App\Models\Publicacion;
use Illuminate\Database\Eloquent\Collection;
use Maatwebsite\Excel\Facades\Excel;

class UserController extends Controller


{
    public function __construct()
    {
        $this->middleware('auth:sanctum');
    }
    
    public function index(IndexRequest $request)
    {
        $users = User::all();
        $boletas = Boleta::all();
        $publicaciones = Publicacion::all(); 
        $alumnos = Alumno::all();
    
        // Crear un arreglo con los datos que deseas devolver
        $data = [
            'users' => UserResource::collection($users),
            'boletas' => $boletas,
            'publicaciones' => $publicaciones,
            'alumnos' => $alumnos
        ];
    
        // Devuelve una respuesta JSON con el arreglo
        return response()->json($data);
    }


    
    
    public function index3(){
        $users = User::all();

        $data = [
            'users' => UserResource::collection($users),
        
        ];
        return response()->json($data);
    }

        
    public function createUser()
    {
        // Utiliza el Factory para crear un usuario
        $user = UserFactory::new()->create();

        // Accede a la matrícula generada
        $matricula = $user->matricula;

        // Haz lo que necesites con la matrícula
        return $matricula;
    }


    public function create(CreateRequest $request){

        
    }

    public function index2(IndexRequest $request)
{
    // Intenta obtener los datos desde el cache
    $combinedData = Cache::remember('combinedData', 60 * 5, function () {
        // Si los datos no están en el cache, ejecuta la lógica para obtenerlos

        $users = User::with('alumno')->get();
        $matriculas = $users->pluck('matricula')->toArray();
    
        $alumnos = Alumno::whereIn('matricula', $matriculas)->get();
    
        // Combina los datos de usuarios y alumnos
        return $users->map(function ($user) use ($alumnos) {
            $alumno = $alumnos->where('matricula', $user->matricula)->first();
            return [
                'user' => $user,
                'alumno' => $alumno,
            ];
        });
    });

    // Devuelve una respuesta JSON con los datos combinados
    return response()->json($combinedData);
}
        
    public function import(Request $request){

        $request->validate([
        'excel_file' =>'required|mimes:xls,xlsx,csv'


        ]);
        Excel::import(new UserImportExcel, $request->file('excel_file')); ///mandamos el archivo a importar
        return response()->json(['message' => 'Archivo Excel subido con éxito']);
    }


 
}

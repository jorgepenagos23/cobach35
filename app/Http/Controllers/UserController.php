<?php

namespace App\Http\Controllers;
use App\Models\User;
use App\Models\Boleta;

use Illuminate\Http\Request;
use Database\Factories\UserFactory;
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
        // Obtén los modelos o datos que deseas devolver
        $users = User::all();
        $boletas = Boleta::all();
        $publicaciones = Publicacion::all(); // Reemplaza 'Publicacion' con el nombre de tu modelo de publicaciones
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
        // Obtén los modelos o datos que deseas devolver
        $users = User::all();
      
        $alumnos = Alumno::all();
        
        // Crear un arreglo para almacenar los datos combinados
        $combinedData = [];
    
        // Itera a través de los usuarios para combinar los datos de "alumnos" y "users"
        foreach ($users as $user) {
            // Encuentra el alumno correspondiente basado en la relación por "matricula"
            $alumno = $alumnos->where('matricula', $user->matricula)->first();
    
            // Combinar datos del usuario y el alumno
            $combinedData[] = [
                'user' => $user,
                'alumno' => $alumno,
            ];
        }
        
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

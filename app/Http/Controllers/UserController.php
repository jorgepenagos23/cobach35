<?php

namespace App\Http\Controllers;
use App\Models\User;
use App\Models\Boleta;

use Illuminate\Http\Request;
use Database\Factories\UserFactory;
use App\Http\Requests\User\IndexRequest;
use App\Http\Resources\UserResource;
use App\Http\Requests\User\CreateRequest;
use App\Models\Alumno;
use App\Models\Publicacion;
use Illuminate\Database\Eloquent\Collection;

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
        $boletas = Boleta::all();
        $publicaciones = Publicacion::all();
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

 
}

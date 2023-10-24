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
    public function showBoletas()
    {
        // Lógica para recuperar y mostrar las boletas
        $boletas = Boleta::all(); // Suponiendo que tienes un modelo Boleta
    
        // Devuelve las boletas como un JSON
        return response()->json(['boletas' => $boletas]);
    }

 
}

<?php

namespace App\Http\Controllers;
use App\Models\User;
use Illuminate\Http\Request;
use Database\Factories\UserFactory;
use App\Http\Requests\User\IndexRequest;
use App\Http\Resources\UserResource;
use App\Http\Requests\User\CreateRequest;

use Illuminate\Database\Eloquent\Collection;

class UserController extends Controller


{
    public function __construct()
    {
        $this->middleware('auth:sanctum');
    }
    

    public function index(IndexRequest $request)
    {
   
        return new UserResource(User::all());    }


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

}

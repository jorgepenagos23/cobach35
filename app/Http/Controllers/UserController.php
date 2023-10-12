<?php

namespace App\Http\Controllers;
use App\Models\User;
use Illuminate\Http\Request;
use Database\Factories\UserFactory;
class UserController extends Controller
{
    public function createUser()
    {
        // Utiliza el Factory para crear un usuario
        $user = UserFactory::new()->create();

        // Accede a la matrícula generada
        $matricula = $user->matricula;

        // Haz lo que necesites con la matrícula
        return $matricula;
    }
}

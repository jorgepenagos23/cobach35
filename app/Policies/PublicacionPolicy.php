<?php

namespace App\Policies;

use App\Models\Publicacion;
use App\Models\User;
use Illuminate\Support\Facades\Auth;

class PublicacionPolicy
{
    /**
     * Create a new policy instance.
     */
    public function __construct()
    {
        //
    }
    
    public function update(User $user)
    {
        // Verificar si el usuario autenticado es el propietario de la publicación
        return in_array($user->rol, ['director', 'administrador', 'estudiante']);
    }


}

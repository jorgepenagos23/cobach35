<?php

namespace App\Policies;

use App\Models\Alumno;
use App\Models\User;

class AlumnoPolicy
{

    public function ver(User $user, Alumno $alumno)
    {

        $rolesPermitidosVerALumnos = ['administrador','director','subdirector'];
        return  in_array($user->rol,$rolesPermitidosVerALumnos);
    }

    /**
     * Determine whether the user can view any models.
     */
    public function viewAny(User $user): bool
    {
        //
    }

    /**
     * Determine whether the user can view the model.
     */
    public function view(User $user, Alumno $alumno): bool
    {
        //
    }

    /**
     * Determine whether the user can create models.
     */
    public function create(User $user): bool
    {
        //
    }

    /**
     * Determine whether the user can update the model.
     */
    public function update(User $user, Alumno $alumno): bool
    {
        //
    }

    /**
     * Determine whether the user can delete the model.
     */
    public function delete(User $user, Alumno $alumno): bool
    {
        //
    }

    /**
     * Determine whether the user can restore the model.
     */
    public function restore(User $user, Alumno $alumno): bool
    {
        //
    }

    /**
     * Determine whether the user can permanently delete the model.
     */
    public function forceDelete(User $user, Alumno $alumno): bool
    {
        //
    }
}

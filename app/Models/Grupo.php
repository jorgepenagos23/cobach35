<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Grupo extends Model
{
    protected $fillable = ['grupo','grado'];




    public function alumnos()
    {
        return $this->hasMany(Alumno::class);
    }
}
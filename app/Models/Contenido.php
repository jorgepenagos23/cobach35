<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Contenido extends Model
{
    use HasFactory;
    protected $table = 'contenidos_seccion';
    protected $fillable = [

        'id',
        'titulo',
        'descripcion',
        'fecha',
        'imagen',



    ];

}

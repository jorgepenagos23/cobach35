<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Boleta extends Model
{
    use HasFactory;
    protected $table = 'boletas_calificaciones';


    protected $fillable = [

        'id',
        'alumno_id',
        'numero_boleta',
        'nombre',
        'calificacion_parcial_1',
        'calificacion_parcial_2',
        'calificacion_parcial_3',
        'materias_recursadas',
        'promedio',
        'observaciones '

    ];

}

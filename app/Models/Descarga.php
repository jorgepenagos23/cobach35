<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Descarga extends Model
{
    use HasFactory;
    protected $table ='descargas';
    protected $fillable =[

    'id',
    'nombre',
    'descripcion',
    'archivo'

    ];

}

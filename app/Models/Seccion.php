<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Seccion extends Model
{
    use HasFactory;
    protected $table = 'secciones';
    protected $fillable = [

        'id',
        'orden_presentacion',
        'nombre',
        'visible',
        'seccion_id',
        'objetivo',
        'tipo',



    ];

    public function subsecciones(){


        return $this->hasMany(Seccion::class, 'seccion_id');
    }

}

<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Publicacion extends Model
{
    use HasFactory;

    protected $table = 'publicaciones'; 
    protected $fillable = ['titulo', 'descripcion', 'fecha', 'tipo', 'publicador', 'imagen', 'seccion_id', 'subseccion_id'];

    public function seccion()
    {
        return $this->belongsTo(Seccion::class, 'seccion_id');
    }

    public function subseccion()
    {
        return $this->belongsTo(Seccion::class, 'subseccion_id');
    }
}

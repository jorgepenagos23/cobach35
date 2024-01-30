<?php
// Seccion.php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Seccion extends Model
{    protected $table = 'secciones'; 

    protected $fillable = ['nombre', 'nombre_subseccion', 
    'contenido_id', 'tipo', 'visible',
     'seccion_id_padre', 'orden_presentacion', 
     'ruta', 'nombre_componente', 'es_subseccion'];

    public function publicaciones()
    {
        return $this->hasMany(Publicacion::class, $this->es_subseccion ? 'subseccion_id' : 'seccion_id');
    }
    // Definir el evento creating para asignar un contenido predeterminado
    protected static function boot()
    {
        parent::boot();

        static::creating(function ($seccion) {
            if (!$seccion->contenido_id) {
                $contenido = Contenido::create([
                    'descripcion' => 'Este es el contenido predeterminado',
                ]);

                $seccion->contenido_id = $contenido->id;
            }
        });
    }


    
    public function subsecciones()
    {
        return $this->hasMany(Seccion::class, 'seccion_id_padre');
    }
}

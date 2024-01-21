<?php
// Seccion.php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Seccion extends Model
{
    protected $table = 'secciones';

    use HasFactory;

    protected $fillable = [
        'orden_presentacion',
        'nombre',
        'visible',
        'nombre_subseccion',
        'seccion_id_padre',
        'tipo',
        'ruta',
        'nombre_componente',
    ];

    // Definir el evento creating para asignar un contenido predeterminado
    protected static function boot()
    {
        parent::boot();

        static::creating(function ($seccion) {
            // Si no se proporciona un contenido_id, asigna uno predeterminado
            if (!$seccion->contenido_id) {
                $contenido = Contenido::create([
                    'descripcion' => 'Este es el contenido predeterminado',
                    // Otros campos de contenido que desees completar
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

<?php
// Seccion.php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Seccion extends Model
{
    protected $table = 'secciones';

    protected $fillable = ['nombre', 'nombre_subseccion', 'contenido_id', 'tipo', 'visible', 'seccion_id_padre', 'orden_presentacion', 'ruta', 'nombre_componente', 'es_subseccion'];

    public function publicaciones()
    {
        return $this->hasMany(Publicacion::class, $this->es_subseccion ? 'subseccion_id' : 'seccion_id');
    }

    public function subsecciones()
    {
        return $this->hasMany(Seccion::class, 'seccion_id_padre');
    }

    // Seccion.php

// Seccion.php

// Seccion.php


public function contenidos()
{
    return $this->hasMany(Contenido::class, 'contenido_id');
}

public function crearContenidoParaSeccion($titulo, $descripcion)
{
    // Crear un nuevo contenido
    $contenido = Contenido::create([
        'titulo' => $titulo,
        'descripcion' => $descripcion,
        // ... otras columnas necesarias
    ]);

    // Asociar el contenido a la sección
    $this->contenidos()->save($contenido);
    // Si estás haciendo algo más complejo, ajusta esta lógica según tus necesidades.
}






}

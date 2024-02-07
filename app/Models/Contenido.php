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

    
// Relación con el modelo Seccion
public function seccion()
{
    return $this->belongsTo(Seccion::class, 'contenido_id'); // Ajusta 'seccion_id' según la clave foránea real en tu base de datos
}

}

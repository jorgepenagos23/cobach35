<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AlumnoReporte extends Model
{
    use HasFactory;
    protected $table = 'alumno_reportes';

    protected $fillable = [

        'id',
        'descripcion',
        'matricula',
        'fecha',
        'usuario_id',
        'reporte_id'

    ];

    public function reportes()
    {
        return $this->hasMany(AlumnoReporte::class, 'matricula', 'matricula');
    }

}

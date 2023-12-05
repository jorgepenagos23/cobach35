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

    public function reporte()
    {
        return $this->belongsTo(Reporte::class, 'reporte_id');
    }
    public function reportes()
    {
        return $this->hasMany(AlumnoReporte::class, 'matricula', 'matricula');
    }

    public function usuario()
    {
        return $this->belongsTo(User::class, 'usuario_id');
    }

    public function obtenerReportedelALumno($matricula)
    {
        $reporte_alumno_buscador = $this->where('matricula', $matricula)->first();


        if($reporte_alumno_buscador){

            return $reporte_alumno_buscador->reportes;
        }else{
            return null;
        }
    }

}

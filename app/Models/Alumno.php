<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Laravel\Sanctum\HasApiTokens;
use Illuminate\Notifications\Notifiable;
class Alumno extends Model
{
    use HasApiTokens, HasFactory, Notifiable;
    protected $table = 'alumnos';
    
    protected $fillable = [

        'id',
        'n',
        'grado',
        'grupo',
        'matricula',
        'nombre_completo',
        'curp',
        'observaciones'
   
    ];


    public function user()
    {
        return $this->hasOne(User::class, 'matricula', 'matricula');
    }

    
  
    public function reportes()
    {
        return $this->hasMany(AlumnoReporte::class);
    }

  
    public function boletas()
{
    return $this->hasMany(BoletaParcial1::class, 'matricula', 'matricula');
}
public function boletas2()
{
    return $this->hasMany(Primero_A_BoletaParcial2::class, 'matricula', 'matricula');
}


public function obtenerBoletas($matricula){

    $alumno = $this->where('matricula', $matricula)->first();

    if ($alumno) {
        return $alumno->boletas;
    } else {
        return null;
    }
}

  public function grupo()
    {
        return $this->belongsTo(Grupo::class);
    }

    public function rol()
    {
        return $this->rol; 
    }
}



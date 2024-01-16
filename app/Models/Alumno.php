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

  

    ///metodos relaciones PRIMER SEMESTRE
    public function boletas()
{
    return $this->hasMany(BoletaParcial1::class, 'matricula', 'matricula');
}
public function boletas2()
{
    return $this->hasMany(Primero_A_BoletaParcial2::class, 'matricula', 'matricula');
}

public function boletas3()
{
    return $this->hasMany(Primero_A_BoletaParcial3::class, 'matricula', 'matricula');
}

public function boletas4()
{
    return $this->hasMany(Primero_B_BoletaParcial1::class, 'matricula', 'matricula');
}

public function boletas11()
{
    return $this->hasMany(Primero_D__BoletaParcial1::class, 'matricula', 'matricula');
}


public function boletas5()
{
    return $this->hasMany(Primero_C__BoletaParcial1::class, 'matricula', 'matricula');
}
public function boletas6()
{
    return $this->hasMany(Primero_E__BoletaParcial1::class, 'matricula', 'matricula');
}
public function boletas7()
{
    return $this->hasMany(Primero_F__BoletaParcial1::class, 'matricula', 'matricula');
}
public function boletas8()
{
    return $this->hasMany(Primero_G__BoletaParcial1::class, 'matricula', 'matricula');
}

public function boletas9()
{
    return $this->hasMany(Primero_B_BoletaParcial2::class, 'matricula', 'matricula');
}

public function boletas10()
{
    return $this->hasMany(Primero_C__BoletaParcial2::class, 'matricula', 'matricula');
}

public function boletas12()
{
    return $this->hasMany(Primero_D__BoletaParcial2::class, 'matricula', 'matricula');
}


public function boletas13()
{
    return $this->hasMany(Primero_E__BoletaParcial2::class, 'matricula', 'matricula');
}


public function boletas14()
{
    return $this->hasMany(Primero_G__BoletaParcial2::class, 'matricula', 'matricula');
}


public function boletas15()
{
    return $this->hasMany(Primero_B_BoletaParcial3::class, 'matricula', 'matricula');
}

public function boletas16()
{
    return $this->hasMany(Primero_C__BoletaParcial3::class, 'matricula', 'matricula');
}

public function boletas17()
{
    return $this->hasMany(Primero_D__BoletaParcial3::class, 'matricula', 'matricula');
}

public function boletas18()
{
    return $this->hasMany(Primero_E__BoletaParcial3::class, 'matricula', 'matricula');
}

public function boletas19()
{
    return $this->hasMany(Primero_F__BoletaParcial3::class, 'matricula', 'matricula');
}



public function boletas20()
{
    return $this->hasMany(Primero_E__BoletaParcial3::class, 'matricula', 'matricula');
}

public function boletas21()
{
    return $this->hasMany(Primero_G__BoletaParcial3::class, 'matricula', 'matricula');
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



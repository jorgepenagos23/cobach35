<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
//
class Primero_C__BoletaParcial3 extends Model
{
    protected $table = 'primero__c___boleta_parcial3s';

    protected $fillable = [
        'matricula',
        'nombre_alumno',
        'materia',
        'espanol1',
        'espanol2',
        'espanol3' ,
        'matematicas1' ,
        'matematicas2' ,
        'matematicas3' ,
        'ingles1' ,
        'ingles2',
        'ingles3' ,
        'historia1',
        'historia2' ,
        'historia3' ,
        'literatura1', 
        'literatura2' ,
        'literatura3' ,
        'orientacion1' ,
        'orientacion2' ,
        'orientacion3', 
        'fisica1' ,
        'fisica2' ,
        'fisica3' ,
        'biologia1',
        'biologia2' ,
        'biologia3' ,
        'civico1' ,
        'civico2' ,
        'civico3' ,
        'sistema1' ,
        'sistema2' ,
        'sistema3' ,
        'promedio' ,
        'observaciones', 
   
    ];

 
    public function alumno()
    {
        return $this->belongsTo(Alumno::class, 'matricula', 'matricula');
    }


    
}

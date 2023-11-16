<?php

namespace App\Imports;

use App\Models\BoletaParcial1;
use Maatwebsite\Excel\Concerns\ToModel;
use App\Models\Calificacion;

class CalificacionesImport implements ToModel
{
    public function model(array $row)
    {
        return new BoletaParcial1([
            'matricula' => $row[0],
            'nombre_alumno' => $row[1],
            'espanol1' => $row[2],
            'espanol2' => $row[3],
            'espanol3' => $row[4],
            'matematicas1' => $row[5],
            'matematicas2' => $row[6],
            'matematicas3' => $row[7],
            'ingles1' => $row[8],
            'ingles2' => $row[9],
            'ingles3' => $row[10],
            'historia1' => $row[11],
            'historia2' => $row[12],
            'historia3' => $row[13],
            'literatura1' => $row[14],
            'literatura2' => $row[15],
            'literatura3' => $row[16],
            'materia6' => $row[17],
            'orientacion1' => $row[18],
            'orientacion2' => $row[19],
            'orientacion3' => $row[20],
            'fisica1' => $row[21],
            'fisica2' => $row[22],
            'fisica3' => $row[23],
            'biologia1' => $row[24],
            'biologia2' => $row[25],
            'biologia3' => $row[26],
            'civico1' => $row[27],
            'civico2' => $row[28],
            'civico3' => $row[29],
            'sistema1' => $row[30],
            'sistema2' => $row[31],
            'sistema3' => $row[32],
            'promedio' => $row[33],
            'observaciones' => $row[34],
        ]);
    }
}

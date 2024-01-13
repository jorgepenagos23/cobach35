<?php

namespace App\Imports;

use Illuminate\Support\Collection;

use Maatwebsite\Excel\Concerns\ToModel;
use App\Models\Primero_A_BoletaParcial2;

class CalificacionesImportPrimeroAPARCIAL1 implements ToModel
{
    private $primeraColumnaUsada = true;
    public function model(array $row)
    {

        if ($this->primeraColumnaUsada) {

            $this->primeraColumnaUsada = false;
            return null;
        }

        return new Primero_A_BoletaParcial2([
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
            'orientacion1' => $row[17], 
            'orientacion2' => $row[18],
            'orientacion3' => $row[19],
            'fisica1' => $row[20],
            'fisica2' => $row[21],
            'fisica3' => $row[22],
            'biologia1' => $row[23],
            'biologia2' => $row[24],
            'biologia3' => $row[25],
            'civico1' => $row[26],
            'civico2' => $row[27],
            'civico3' => $row[28],
            'sistema1' => $row[29],
            'sistema2' => $row[30],
            'sistema3' => $row[31],
            'promedio' => $row[32],
            'observaciones' => $row[33],
        ]);
    }
}

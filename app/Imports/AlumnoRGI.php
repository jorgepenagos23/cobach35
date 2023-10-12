<?php

namespace App\Imports;

use App\Models\Alumno;
use Maatwebsite\Excel\Concerns\ToModel;

class AlumnoRGI implements ToModel
{
    /**
     * @param array $row
     *
     * @return Alumno|null
     */
    public function model(array $row)
    {
        // Verificar si la matrícula no está en blanco
        if (!empty($row[3])) {
            return new Alumno([
                'n' => $row[0],
                'grado' => $row[1],
                'grupo' => $row[2],
                'matricula' => $row[3],
                'nombre_completo' => $row[4],
                'curp' => $row[5],
                'observaciones' => $row[6],
            ]);
        }
        return null; // Retorna null si la matrícula está en blanco
    }
    
}
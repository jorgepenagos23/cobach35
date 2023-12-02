<?php

namespace App\Imports;

use App\Models\BoletaExcel;
use Maatwebsite\Excel\Concerns\ToModel;

class BoletasExcelIMport implements ToModel
{
    /**
     * @param array $row
     *
     * @return BoletaExcel|null
     */
    public function model(array $row)
    {

        if (!empty($row[3])) {
            return new BoletaExcel([
                'n' => $row[0],
                'grado' => $row[1],
                'grupo' => $row[2],
                'matricula' => $row[3],
                'nombre_completo' => $row[4],
                'curp' => $row[5],
                'promedio' => $row[6],
            ]);
        }
        return null; // Retorna null si la matrícula está en blanco
    }
    
}
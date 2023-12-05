<?php

namespace App\Imports;

use App\Models\Alumno;
use Maatwebsite\Excel\Concerns\ToModel;

class AlumnoRGI implements ToModel
{
    private $primeraColumna = true;

    public function model(array $row)
    {

        
        

        if (!empty($row[3])) {
            if($this->primeraColumna){
                $this->primeraColumna =false;
                return null;
            }



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
        return null; 

    }
    
}
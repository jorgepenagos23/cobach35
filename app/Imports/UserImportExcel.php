<?php

namespace App\Imports;

use App\Models\User;
use Maatwebsite\Excel\Concerns\ToModel;

class UserImportExcel implements ToModel
{
    /**
     * @param array $row
     *
     * @return User|null
     */
    public function model(array $row)
    {
        // Verificar si la matrícula no está en blanco
        if (!empty($row[3])) {
            return new User([
                'nombre' => $row[0],
                'email' => $row[1],
                'matricula' => $row[2],
                'rol' => $row[3],
                'password' => $row[4],

            ]);
        }
        return null; // Retorna null si la matrícula está en blanco
    }
    
}
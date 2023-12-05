<?php

namespace App\Imports;
use Maatwebsite\Excel\Concerns\WithBatchInserts;
use Maatwebsite\Excel\Concerns\WithChunkReading;
use Maatwebsite\Excel\Concerns\WithHeadingRow;
use Illuminate\Contracts\Queue\ShouldQueue;
use App\Models\User;
use Maatwebsite\Excel\Concerns\ToModel;

class UserImportExcel implements ToModel
{
    /**
     * @param array $row
     *
     * @return User|null
     */

    private $columnaPrimera = true;
    public function model(array $row)
    {
        if ($this->columnaPrimera) {
            $this->columnaPrimera = false;
            return null; 
        }
    
        if (!empty($row[3])) {
            return new User([
                'nombre' => $row[0],
                'email' => $row[1],
                'matricula' => $row[2],
                'password' => $row[3],
                'rol' => $row[4],
            ]);
        }
    
        return null;
    }
}
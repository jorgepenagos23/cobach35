<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

use App\Models\Alumno;
use App\Models\Rol;
use App\Models\Reporte;


class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
  
    \App\Models\User::factory(4)->create();
    //\App\Models\Alumno::factory(1)->create();
    \App\Models\Permiso::factory()->count(5)->create();
    \App\Models\Publicacion::factory()->count(5)->create();


            $rol = new Rol();
            $rol->nombre = 'Director';
            $rol->guard = 'web';
            $rol->save();

            $rol = new Rol();
            $rol->nombre = 'Subdirector';
            $rol->guard = 'web';
            $rol->save();

            $rol = new Rol();
            $rol->nombre = 'Administrador';
            $rol->guard = 'web';
            $rol->save();

            $rol = new Rol();
            $rol->nombre = 'Orientadora';
            $rol->guard = 'web';
            $rol->save();

            $rol = new Rol();
            $rol->nombre = 'Alumno';
            $rol->guard = 'web';
            $rol->save();

                     /// Reporte seeder
            $reporte = new Reporte();
            $reporte->nombre ='Ausencia de Clases';
            $reporte->save();


            $reporte = new Reporte();
            $reporte->nombre ='Cita Padre de Familia';
            $reporte->save();


            $reporte = new Reporte();
            $reporte->nombre ='Mal comportamiento';
            $reporte->save();

    \App\Models\Boleta::factory()->count(10)->create(); 
    




    }

}

<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

use App\Models\Alumno;
use App\Models\Rol;
use App\Models\Reporte;
use App\Models\AlumnoReporte;
use App\Models\Seccion;
use App\Models\User;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
  
    \App\Models\User::factory(0)->create();
    \App\Models\Alumno::factory(0)->create();
    \App\Models\Permiso::factory()->count(5)->create();
    \App\Models\Publicacion::factory()->count(500)->create();
            

            $user = new User();
            $user->nombre='Citlatli Clemente Parra '   ;
            $user->email='citlali@cobach.mx';
            $user->password = bcrypt('cobach');         
            $user->matricula='Numero de Plaza';
            $user->rol ='administrador';
            $user->save();

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



            $reportealumno = new AlumnoReporte();
            $reportealumno->descripcion=' el alumno viene muy tarde a sus clases ';
            $reportealumno->matricula ='COBACH';
            $reportealumno->fecha = now(); // Asigna la fecha y hora actual a la propiedad 'fecha'
            $reportealumno->usuario_id ='1';
            $reportealumno->reporte_id ='1';
            $reportealumno->save();

            

                $seccion = new Seccion();
                $seccion->orden_presentacion = 1;
                $seccion->nombre = 'Inicio ';
                $seccion->visible = true;
                $seccion->seccion_id = 1; // Asignar el ID de la sección padre
                $seccion->objetivo = 'Este es el contenido de la Sección 1';
                $seccion->tipo = 'contenido';
                $seccion->save();



                $seccion = new Seccion();
                $seccion->orden_presentacion = 2;
                $seccion->nombre = 'Noticias ';
                $seccion->visible = true;
                $seccion->seccion_id = 1; // Asignar el ID de la sección padre
                $seccion->objetivo = 'Este es el contenido de la Sección 2';
                $seccion->tipo = 'contenido';
                $seccion->save();


                $seccion = new Seccion();
                $seccion->orden_presentacion = 3;
                $seccion->nombre = 'Alumnos ';
                $seccion->visible = true;
                $seccion->seccion_id = 1; // Asignar el ID de la sección padre
                $seccion->objetivo = 'Este es el contenido de la Sección 3 ';
                $seccion->tipo = 'contenido';
                $seccion->save();



    }

}

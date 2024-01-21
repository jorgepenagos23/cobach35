<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

use App\Models\Alumno;
use App\Models\Rol;
use App\Models\Reporte;
use App\Models\AlumnoReporte;
use App\Models\Contenido;
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
    \App\Models\Publicacion::factory()->count(10)->create();
            

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


         // Crear la sección
                    $seccion = Seccion::create([
                        'orden_presentacion' => 1,
                        'nombre' => 'Inicio',
                        'visible' => true,
                        'seccion_id_padre' => null, // Asignar el ID de la sección padre
                        'tipo' => 'contenido',
                        'ruta' => '/',
                        'nombre_componente' =>'inicio.vue',
                 ]);

                   
                    Seccion::create([
                        'orden_presentacion' => 2,
                        'nombre' => 'Conócenos',
                        'visible' => true,
                        'seccion_id_padre' => null, // No hay sección padre para Conócenos
                        'tipo' => 'contenido',
                        'ruta' => 'conocenos',
                        'nombre_componente' =>'conocenos.vue',
                    ]);
            
                    Seccion::create([
                        'orden_presentacion' => 3,
                        'nombre' => 'Oferta Educativa',
                        'visible' => true,
                        'seccion_id_padre' => null, 
                        'tipo' => 'contenido',
                        'ruta' => 'oferta',
                        'nombre_componente' =>'oferta.vue',
                    ]);
            
                    Seccion::create([
                        'orden_presentacion' => 4,
                        'nombre' => 'Alumnos',
                        'visible' => true,
                        'seccion_id_padre' => null, 
                        'tipo' => 'contenido',
                        'ruta' => 'Alumnos',
                        'nombre_componente' =>'Alumnos.vue',
                    ]);
            

                    Seccion::create([
                        'orden_presentacion' => 5,
                        'nombre' => 'Vinculacion',
                        'visible' => true,
                        'seccion_id_padre' => null, 
                        'tipo' => 'contenido',
                        'ruta' => 'Vinculacion',
                        'nombre_componente' =>'vinculacion.vue',
                    ]);

                    Seccion::create([
                        'orden_presentacion' => null,
                        'visible' => true,
                        'nombre_subseccion'=>'Mision & Vision',
                        'seccion_id_padre' => 2, 
                        'tipo' => 'contenido',
                        'ruta' => 'mision',
                        'nombre_componente' =>'mision.vue',
                    ]);
                    Seccion::create([
                        'orden_presentacion' => null,
                        'visible' => true,
                        'nombre_subseccion'=>'Historia',
                        'seccion_id_padre' => 2, 
                        'tipo' => 'contenido',
                        'ruta' => 'historia',
                        'nombre_componente' =>'historia.vue',
                    ]);
            
                    Seccion::create([
                        'orden_presentacion' => null,
                        'visible' => true,
                        'nombre_subseccion'=>'Estructura Funcional',
                        'seccion_id_padre' => 2, 
                        'tipo' => 'contenido',
                        'ruta' => 'Estructura',
                        'nombre_componente' =>'Estructura.vue',
                    ]);
            
                    Seccion::create([
                        'orden_presentacion' => null,
                        'visible' => true,
                        'nombre_subseccion'=>'Instalaciones',
                        'seccion_id_padre' => 2, 
                        'tipo' => 'contenido',
                        'ruta' => 'instalaciones',
                        'nombre_componente' =>'instalaciones.vue',
                    ]);

                    Seccion::create([
                        'orden_presentacion' => null,
                        'visible' => true,
                        'nombre_subseccion'=>'Visitanos',
                        'seccion_id_padre' => 2, 
                        'tipo' => 'contenido',
                        'ruta' => 'Visitanos',
                        'nombre_componente' =>'Visitanos.vue',
                    ]);
            
                  
                    Seccion::create([
                        'orden_presentacion' => null,
                        'visible' => true,
                        'nombre_subseccion'=>'Academias',
                        'seccion_id_padre' => 3, 
                        'tipo' => 'contenido',
                        'ruta' => 'Academias',
                        'nombre_componente' =>'Academias.vue',
                    ]);
            
                  
                    Seccion::create([
                        'orden_presentacion' => null,
                        'visible' => true,
                        'nombre_subseccion'=>'Plan de Estudios',
                        'seccion_id_padre' => 3, 
                        'tipo' => 'contenido',
                        'ruta' => 'Plan',
                        'nombre_componente' =>'Plan.vue',
                    ]);
            
                  

                    
                     Seccion::create([
                        'orden_presentacion' => null,
                        'visible' => true,
                        'nombre_subseccion'=>'Horarios',
                        'seccion_id_padre' => 4, 
                        'tipo' => 'contenido',
                        'ruta' => 'Horarios',
                        'nombre_componente' =>'Horarios.vue',
                    ]);

                    Seccion::create([
                        'orden_presentacion' => null,
                        'visible' => true,
                        'nombre_subseccion'=>'Calendarios',
                        'seccion_id_padre' => 4, 
                        'tipo' => 'contenido',
                        'ruta' => 'Calendarios',
                        'nombre_componente' =>'Calendarios.vue',
                    ]);

                    Seccion::create([
                        'orden_presentacion' => null,
                        'visible' => true,
                        'nombre_subseccion'=>'Becas',
                        'seccion_id_padre' => 4, 
                        'tipo' => 'contenido',
                        'ruta' => 'Becas',
                        'nombre_componente' =>'Becas.vue',
                    ]);


            
                      Seccion::create([
                        'orden_presentacion' => null,
                        'visible' => true,
                        'nombre_subseccion'=>'Sistema COBACH',
                        'seccion_id_padre' => 4,  
                        'tipo' => 'contenido',
                        'ruta' => 'login',
                        'nombre_componente' =>'login.vue',
                    ]);

            
                    Seccion::create([
                        'orden_presentacion' => null,
                        'visible' => true,
                        'nombre_subseccion'=>'Danza Folklorika',
                        'seccion_id_padre' => 5,  
                        'tipo' => 'contenido',
                        'ruta' => 'Danza',
                        'nombre_componente' =>'Danza.vue',
                    ]);

            
       
       


                    // Asociar un contenido a la sección creada
                    $contenido = Contenido::create([
                        'descripcion' => 'Este es el contenido predeterminado',
                        'titulo' => 'Título predeterminado', 
                        'fecha' => now(), 

                    ]);




                    
                $this->call([
                    CalificacionesSeeder::class,
                    // Otros seeders si los tienes
                ]);


    }

}

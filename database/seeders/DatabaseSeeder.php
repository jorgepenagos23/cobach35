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
        $this->call([
            GruposSeeder::class,
        ]);

        
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
         $seccionInicio = Seccion::firstOrCreate(
            ['nombre' => 'Inicio'],
            [
                'orden_presentacion' => 1,
                'visible' => true,
                'seccion_id_padre' => null,
                'tipo' => 'contenido',
                'ruta' => '/',
                'nombre_componente' => 'inicio.vue',
                'es_subseccion' => false,
            ]
        );
        
        $contenidoInicio = Contenido::create([
            'descripcion' => 'Nos complace darles una cálida bienvenida a esta institución educativa que se distingue por su compromiso con la excelencia académica y el desarrollo integral de sus estudiantes. En COBACH, nos esforzamos por proporcionar un ambiente educativo enriquecedor que fomente el aprendizaje, la creatividad y el crecimiento personal.
            Este nuevo capítulo en sus vidas les brinda la oportunidad de explorar nuevas ideas, descubrir sus pasiones y cultivar habilidades que les serán útiles a lo largo de su trayectoria académica y profesional. Nuestra comunidad educativa está compuesta por profesionales dedicados, comprometidos con su éxito y dispuestos a apoyarlos en cada paso de su educación.',
            'titulo' => 'Bienvenida',
            'publicador' => 'Admin',
            'imagen' => '/images/publicaciones/1706342839.jpg',
            'fecha' => now(),
        ]);
        $seccionInicio->update(['contenido_id' => $contenidoInicio->id]);




                    Seccion::create([
                        'orden_presentacion' => 2,
                        'nombre' => 'Conócenos',
                        'visible' => true,
                        'seccion_id_padre' => null, // No hay sección padre para Conócenos
                        'tipo' => 'contenido',
                        'ruta' => '/conocenos',
                        'nombre_componente' =>'conocenos.vue',
                        'es_subseccion' => false, // Agregar el campo es_subseccion
                    ]);
            
                    Seccion::create([
                        'orden_presentacion' => 3,
                        'nombre' => 'Oferta Educativa',
                        'visible' => true,
                        'seccion_id_padre' => null, 
                        'tipo' => 'contenido',
                        'ruta' => '/oferta',
                        'nombre_componente' =>'oferta.vue',
                        'es_subseccion' => false, // Agregar el campo es_subseccion
                    ]);
            
                    Seccion::create([
                        'orden_presentacion' => 4,
                        'nombre' => 'Alumnos',
                        'visible' => true,
                        'seccion_id_padre' => null, 
                        'tipo' => 'contenido',
                        'ruta' => '/alumnos',
                        'nombre_componente' =>'Alumnos.vue',
                        'es_subseccion' => false, // Agregar el campo es_subseccion
                    ]);
            

                    Seccion::create([
                        'orden_presentacion' => 5,
                        'nombre' => 'Vinculacion',
                        'visible' => true,
                        'seccion_id_padre' => null, 
                        'tipo' => 'contenido',
                        'ruta' => '/vinculacion',
                        'nombre_componente' =>'vinculacion.vue',
                        'es_subseccion' => false, // Agregar el campo es_subseccion
                    ]);

                    Seccion::create([
                        'orden_presentacion' => null,
                        'visible' => true,
                        'nombre_subseccion'=>'Mision & Vision',
                        'seccion_id_padre' => 2, 
                        'tipo' => 'contenido',
                        'ruta' => '/mision',
                        'nombre_componente' =>'mision.vue',   
                        'es_subseccion' => true, // Agregar el campo es_subseccion
                    ]);
                    Seccion::create([
                        'orden_presentacion' => null,
                        'visible' => true,
                        'nombre_subseccion'=>'Historia',
                        'seccion_id_padre' => 2, 
                        'tipo' => 'contenido',
                        'ruta' => '/historia',
                        'nombre_componente' =>'historia.vue',

                        'es_subseccion' => true, // Agregar el campo es_subseccion

                    ]);
            
                    Seccion::create([
                        'orden_presentacion' => null,
                        'visible' => true,
                        'nombre_subseccion'=>'Estructura Funcional',
                        'seccion_id_padre' => 2, 
                        'tipo' => 'contenido',
                        'ruta' => '/estructura',
                        'nombre_componente' =>'estructura.vue',
                        'es_subseccion' => true, // Agregar el campo es_subseccion

                    ]);
            
                    Seccion::create([
                        'orden_presentacion' => null,
                        'visible' => true,
                        'nombre_subseccion'=>'Instalaciones',
                        'seccion_id_padre' => 2, 
                        'tipo' => 'contenido',
                        'ruta' => '/instalaciones',
                        'nombre_componente' =>'instalaciones.vue',
                        'es_subseccion' => true, // Agregar el campo es_subseccion

                    ]);

                    Seccion::create([
                        'orden_presentacion' => null,
                        'visible' => true,
                        'nombre_subseccion'=>'Visitanos',
                        'seccion_id_padre' => 2, 
                        'tipo' => 'contenido',
                        'ruta' => '/visitanos',
                        'nombre_componente' =>'Visitanos.vue',
                        'es_subseccion' => true, // Agregar el campo es_subseccion

                    ]);
            
                  
                    Seccion::create([
                        'orden_presentacion' => null,
                        'visible' => true,
                        'nombre_subseccion'=>'Academias',
                        'seccion_id_padre' => 3, 
                        'tipo' => 'contenido',
                        'ruta' => '/academias',
                        'nombre_componente' =>'academias.vue',
                        'es_subseccion' => true, // Agregar el campo es_subseccion

                    ]);
            
                  
                    Seccion::create([
                        'orden_presentacion' => null,
                        'visible' => true,
                        'nombre_subseccion'=>'Plan de Estudios',
                        'seccion_id_padre' => 3, 
                        'tipo' => 'contenido',
                        'ruta' => '/plan',
                        'nombre_componente' =>'Plan.vue',
                        'es_subseccion' => true, // Agregar el campo es_subseccion

                    ]);
            
                  

                    
                     Seccion::create([
                        'orden_presentacion' => null,
                        'visible' => true,
                        'nombre_subseccion'=>'Horarios',
                        'seccion_id_padre' => 4, 
                        'tipo' => 'contenido',
                        'ruta' => '/horarios',
                        'nombre_componente' =>'Horarios.vue',
                        'es_subseccion' => true, // Agregar el campo es_subseccion

                    ]);

                    Seccion::create([
                        'orden_presentacion' => null,
                        'visible' => true,
                        'nombre_subseccion'=>'Calendarios',
                        'seccion_id_padre' => 4, 
                        'tipo' => 'contenido',
                        'ruta' => '/calendarios',
                        'nombre_componente' =>'Calendarios.vue',
                        'es_subseccion' => true, // Agregar el campo es_subseccion

                    ]);

                    Seccion::create([
                        'orden_presentacion' => null,
                        'visible' => true,
                        'nombre_subseccion'=>'Becas',
                        'seccion_id_padre' => 4, 
                        'tipo' => 'contenido',
                        'ruta' => '/becas',
                        'nombre_componente' =>'Becas.vue',
                        'es_subseccion' => true, // Agregar el campo es_subseccion

                        
                    ]);


            
                      Seccion::create([
                        'orden_presentacion' => null,
                        'visible' => true,
                        'nombre_subseccion'=>'Sistema COBACH',
                        'seccion_id_padre' => 4,  
                        'tipo' => 'contenido',
                        'ruta' => '/login',
                        'nombre_componente' =>'login.vue',
                        'es_subseccion' => true, // Agregar el campo es_subseccion

                    ]);

            
                    Seccion::create([
                        'orden_presentacion' => null,
                        'visible' => true,
                        'nombre_subseccion'=>'Danza Folklorika',
                        'seccion_id_padre' => 5,  
                        'tipo' => 'contenido',
                        'ruta' => '/danza',
                        'nombre_componente' =>'danza.vue',
                        'es_subseccion' => true, // Agregar el campo es_subseccion

                    ]);

            
       


            


                    
                $this->call([
                    CalificacionesSeeder::class,
                    // Otros seeders si los tienes
                ]);


    }

}

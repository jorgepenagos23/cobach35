<?php

// SeccionesContenidosSeeder.php
namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Seccion;
use App\Models\Contenido;

class SeccionesContenidosSeeder extends Seeder
{
    public function run()
    {
        

        $this->crearSeccionYContenido(
            'Inicio', 
            '', 
            '/',
            'Título Inicio', 
            'Descripción Inicio', 
            'inicio.vue', 
            true,
            null, 
            null 
        );

        $this->crearSeccionYContenido(
            'Conocenos', 
            '', 
            '/conocenos',
            'Título conocenos', 
            'Descripción conocenos', 
            'conocenos.vue', 
            true,
            null, 
            null 
        );
     
        $this->crearSeccionYContenido(
            'Oferta Educativa', 
            '', 
            '/oferta',
            'Título de  oferta', 
            'Descripción oferta', 
            'oferta.vue', 
            true,
            null, 
            null 
        );
        $this->crearSeccionYContenido(
            'Alumnos', 
            '', 
            '/alumnos',
            'Título de  Alumnos', 
            'Descripción Alumnos', 
            'alumnos.vue', 
            true,
            null, 
            null 
        );
        $this->crearSeccionYContenido(
            'Vinculacion', 
            '', 
            '/vinculacion',
            'Título de  Vinculacion', 
            'Descripción de Vinculacion', 
            'alumnos.vue', 
            true,
            null, 
            null 
        );
     
     

        $this->crearSeccionYContenido(
            '', 
            'Instalaciones', 
            '/instalaciones',
            
            'Título Instalaciones', 
            'Descripción de la sección Instalaciones', 
            'instalaciones.vue', 
            true,
            2, 
            null 
        );
     
        
        $this->crearSeccionYContenido(
            '', 
            'Mision y Vision', 
            '/mision', 
            'Título MIsion y VIsion', 
            'Descripción de la sección mision y vision', 
            'mision.vue', 
            true, 
            2, 
            null 
        );

        $this->crearSeccionYContenido(
            '', // nombreSeccion
            'Historia', // nombreSubseccion
            '/historia', // ruta
            'Título Historia', // tituloContenido
            'Descripción de la sección Historia', // descripcionContenido
            'historia.vue', // nombreComponente
            true, // esSubseccion
            2, // seccionPadreId
        );
        
        $this->crearSeccionYContenido(
            '', // nombreSeccion
            'Estructura Funcional', // nombreSubseccion
            '/estructura', // ruta
            'Título Estructura Funcional', // tituloContenido
            'Descripción de la sección Estructura Funcional', // descripcionContenido
            'estructura.vue', // nombreComponente
            true, // esSubseccion
            2, // seccionPadreId
        );
        
  
        $this->crearSeccionYContenido(
            '', // nombreSeccion
            'Visitanos', // nombreSubseccion
            '/visitanos', // ruta
            'Título Visitanos', // tituloContenido
            'Descripción de la sección Visitanos', // descripcionContenido
            'Visitanos.vue', // nombreComponente
            true, // esSubseccion
            2, // seccionPadreId
        );
        
        $this->crearSeccionYContenido(
            '', // nombreSeccion
            'Academias', // nombreSubseccion
            '/academias', // ruta
            'Título Academias', // tituloContenido
            'Descripción de la sección Academias', // descripcionContenido
            'academias.vue', // nombreComponente
            true, // esSubseccion
            3, // seccionPadreId
        );
        
        $this->crearSeccionYContenido(
            '', // nombreSeccion
            'Plan de Estudios', // nombreSubseccion
            '/plan', // ruta
            'Título Plan de Estudios', // tituloContenido
            'Descripción de la sección Plan de Estudios', // descripcionContenido
            'Plan.vue', // nombreComponente
            true, // esSubseccion
            3, // seccionPadreId
        );
        $this->crearSeccionYContenido(
            '',
            'Horarios',
            '/horarios',
            'Título Horarios',
            'Descripción de la sección Horarios',
            'Horarios.vue',
            true,
            4
        );
        
        $this->crearSeccionYContenido(
            '',
            'Calendarios',
            '/calendarios',
            'Título Calendarios',
            'Descripción de la sección Calendarios',
            'Calendarios.vue',
            true,
            4
        );
        
        $this->crearSeccionYContenido(
            '',
            'Becas',
            '/becas',
            'Título Becas',
            'Descripción de la sección Becas',
            'Becas.vue',
            true,
            4
        );
        
        $this->crearSeccionYContenido(
            '',
            'Sistema COBACH',
            '/login',
            'Título Sistema COBACH',
            'Descripción de la sección Sistema COBACH',
            'login.vue',
            true,
            4
        );
        
        $this->crearSeccionYContenido(
            '',
            'Danza Folklorika',
            '/danza',
            'Título Danza Folklorika',
            'Descripción de la sección Danza Folklorika',
            'danza.vue',
            true,
            5
        );

     


        
    }
    private function crearSeccionYContenido($nombreSeccion, $nombreSubseccion, $ruta, $tituloContenido, $descripcionContenido, $nombreComponente, $esSubseccion, $seccionPadreId, $ordenPresentacion = null)
    {
        // Crear un nuevo contenido
        $contenido = Contenido::create([
            'titulo' => $tituloContenido,
            'descripcion' => $descripcionContenido,
            // ... otras columnas necesarias
        ]);
    
        // Crear una nueva sección y asociar el contenido
        $seccion = Seccion::create([
            'nombre' => $nombreSeccion,
            'nombre_subseccion' => $nombreSubseccion,
            'orden_presentacion' => $ordenPresentacion,
            'visible' => true,
            'seccion_id_padre' => $seccionPadreId,
            'tipo' => 'contenido',
            'ruta' => $ruta,
            'nombre_componente' => $nombreComponente,
            'es_subseccion' => $esSubseccion,
            'contenido_id' => $contenido->id, // Asignar el id del contenido
        ]);
    
        // Comentar o eliminar esta línea, ya que ya se ha asociado el contenido en la creación de la sección
        // $seccion->crearContenidoParaSeccion($tituloContenido, $
    



}

}

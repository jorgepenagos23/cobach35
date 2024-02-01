<?php

namespace App\Http\Controllers;

use App\Models\Seccion;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cache;
use function PHPSTORM_META\map;

class SeccionController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
{
    // Utiliza la caché para almacenar los resultados y establece una clave única para esta consulta
 
    $secciones = Seccion::orderBy('orden_presentacion')->get();

        // Filtrar y mapear solo las secciones con nombre no vacío
        $seccionesConNombre = $secciones->filter(function ($seccion) {
            return !empty($seccion->nombre);
        })->mapWithKeys(function ($seccion) {
            return [
                $seccion->id => [
                    'id' => $seccion->id,
                    'nombre' => $seccion->nombre,
                    'ruta' => $seccion->ruta,
                    'contenido_id' => $seccion->contenido_id,
                    'nombre_componente' => $seccion->nombre_componente,
                    // Agrega otros campos según sea necesario
                ],
            ];
        });
    

    return response()->json([
        'message' => 'secciones devueltas',
        'secciones' => $seccionesConNombre,
    ], 200);
}

   public function index2()
{
    // Obtener todas las subsecciones
    $subsecciones = Seccion::all();

    $subseccionesFiltradas = $subsecciones
        ->filter(function ($subseccion) {
            return !empty($subseccion->nombre_subseccion);
        })
        ->groupBy('seccion_id_padre')
        ->map(function ($subseccionesPorSeccion, $seccionId) {
            return $subseccionesPorSeccion
                ->map(function ($subseccion) {
                    return [
                        'nombre_subseccion' => $subseccion->nombre_subseccion,
                        'ruta' => $subseccion->ruta,
                        'padre' => $subseccion->seccion_id_padre,
                        'nombre_padre' => $subseccion->nombre,

                    ];
                });
        })
        ->keyBy(function ($subseccionesPorSeccion, $seccionId) {
            return $seccionId;
        });

    return response()->json([
        'message' => 'subsecciones devueltas',
        'subseccionesPorSeccion' => $subseccionesFiltradas,
    ], 200);
}

public function index_todos()
{
    $todos_index = Seccion::all();
    $groupedSections = [];

    foreach ($todos_index as $seccion) {
        $parentId = $seccion->seccion_id_padre;
        if ($parentId === null) {
            // Sección principal
            $groupedSections[$seccion->id] = $seccion->toArray();
            $groupedSections[$seccion->id]['subsecciones'] = [];
        } else {
            // Subsección
            $groupedSections[$parentId]['subsecciones'][] = $seccion->toArray();
        }
    }

    $result = array_values($groupedSections);

    return response()->json(['secciones_todos' => $result]);
}



public function fachada_subseccion()
{
    // Obtener todas las secciones ordenadas por orden de presentación
    $secciones = Seccion::orderBy('orden_presentacion')->get();

    // Filtrar solo las subsecciones (aquellas que tienen un id de sección padre)
    $subsecciones = $secciones->filter(function ($seccion) {
        return !empty($seccion->seccion_id_padre);
    });

    // Mapear las subsecciones con la información requerida
    $subseccionesInfo = $subsecciones->map(function ($subseccion) {
        return [
            'ruta' => $subseccion->ruta,
            'nombre_componente' => $subseccion->nombre_componente,
            'contenido_id' => $subseccion->contenido_id,
            'seccion_padre' => $subseccion->seccion_id_padre,

        ];
    });

    return response()->json([
        'message' => 'Subsecciones devueltas',
        'subsecciones' => $subseccionesInfo,
    ], 200);
}





    public function store(Request $request)
    {
        //
    }

    public function show(Seccion $seccion)
    {
        //
    }

  
    public function update(Request $request, Seccion $seccion)
    {
        //
    }





    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Seccion $seccion)
    {
        //
    }
}

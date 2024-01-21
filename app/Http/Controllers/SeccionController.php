<?php

namespace App\Http\Controllers;

use App\Models\Seccion;
use Illuminate\Http\Request;

use function PHPSTORM_META\map;

class SeccionController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        // Obtener todas las secciones
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

    
    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(Seccion $seccion)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
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

<?php

namespace App\Http\Controllers;

use App\Models\AlumnoReporte;
use Illuminate\Http\Request;
use App\Models\User;

class AlumnoReporteController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
  
     public function store(Request $request)
{
    $validatedData = $request->validate([
        'descripcion' => 'required|string',
        'matricula' => 'required|string',
        'fecha' => 'required|date',
        'reporte_id' => 'required|integer',
    ]);

    // Obtén el usuario_id del request
    $usuario = User::where('matricula', $validatedData['matricula'])->first();
    $usuario_id = $usuario ? $usuario->id : null;

    // Crea el objeto AlumnoReporte
    $reporte = new AlumnoReporte();
    $reporte->descripcion = $validatedData['descripcion'];
    $reporte->matricula = $validatedData['matricula'];
    $reporte->fecha = $validatedData['fecha'];
    $reporte->reporte_id = $validatedData['reporte_id'];
    $reporte->usuario_id = $usuario_id; // Asigna el usuario_id

    $reporte->save();

    return response()->json([
        'data' => $reporte,
        'message' => 'Reporte creado correctamente',
    ], 201);
}

    /**
     * Display the specified resource.
     */
 public function show($id)
{
    $reporte_alumno_buscador = AlumnoReporte::find($id);

    if(isset($reporte_alumno_buscador)){

        return response()->json([
            'reportes' => $reporte_alumno_buscador, // Cambiado a un array llamado 'reportes'
            'message' => 'reporte de alumno encontrado con exito'
        ]);

    } else {
        // Si no se encuentra el reporte, puedes devolver un mensaje indicando que no se encontró.
        return response()->json([
            'reportes' => null,
            'message' => 'No se encontró el reporte de alumno con el ID proporcionado.'
        ], 404); // 404 es el código de respuesta HTTP para "No encontrado".
    }
}





    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, AlumnoReporte $alumnoReporte)
    {
        //
    }


    /**
     * Remove the specified resource from storage.
     */
    public function destroy(AlumnoReporte $alumnoReporte)
    {
        //
    }


    public function obtenerReportedelALumno($matricula)
    {
        // Obtener todos los reportes del alumno con las relaciones cargadas
        $reportes_del_alumno = AlumnoReporte::with('usuario', 'reporte')
            ->where('matricula', $matricula)
            ->get(); // Utiliza `get` en lugar de `first` para obtener una colección de resultados
        
        if ($reportes_del_alumno->isNotEmpty()) {
            // Mapear los resultados para construir la respuesta
            $reportes = $reportes_del_alumno->map(function ($reporte_con_alumno) {
                $usuario = $reporte_con_alumno->usuario;
                $reporte = $reporte_con_alumno->reporte;
    
                return [
                    'id' => $reporte_con_alumno->id,
                    'descripcion' => $reporte_con_alumno->descripcion,
                    'matricula' => $reporte_con_alumno->matricula,
                    'fecha' => $reporte_con_alumno->fecha,
                    'usuario' => [
                        'id' => $usuario->id,
                        'nombre' => $usuario->nombre,
                    ],
                    'reporte' => [
                        'id' => $reporte->id,
                        'nombre' => $reporte->nombre,
                    ],
                ];
            });
    
            return response()->json([
                'reportes' => $reportes,
                'message' => 'Reportes del alumno encontrados correctamente'
            ]);
        } else {
            return response()->json([
                'mensaje' => 'No se encontraron reportes para la matrícula proporcionada'
            ]);
        }
    }
    

}

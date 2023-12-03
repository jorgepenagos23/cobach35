<?php

namespace App\Http\Controllers;

use App\Models\AlumnoReporte;
use Illuminate\Http\Request;

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
             'fecha' => 'required|date', // Asegúrate de que fecha sea una fecha válida
             'reporte_id' => 'required|integer',
 
         ]);
     
         $reporte = new AlumnoReporte();
         $reporte->descripcion = $validatedData['descripcion'];
         $reporte->matricula = $validatedData['matricula'];
         $reporte->fecha = $validatedData['fecha'];
         $reporte->reporte_id = $validatedData['reporte_id'];
 
 
         $reporte->save();
     
         return response()->json([
             'data' => $reporte,
             'message' => 'reporte creada correctamente',
         ], 201); // El código 201 indica que la publicación se ha creado con éxito
     }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {

        $reporte_alumno_buscador = AlumnoReporte::find($id);

        if(isset($reporte_alumno_buscador)){

            return response()->json([
                'data' => $reporte_alumno_buscador,
                'mensaje' => 'reporte de alumno encontrado con exito'
            ]);

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


    public function obtenerReportedelAlumno($matricula)
    {
        // Obtener el reporte del alumno con las relaciones cargadas
        $reporte_con_alumno = AlumnoReporte::with('usuario', 'reporte')->where('matricula', $matricula)->first();
    
        if ($reporte_con_alumno) {
            // Acceder a las relaciones de usuario y reporte
            $usuario = $reporte_con_alumno->usuario;
            $reporte = $reporte_con_alumno->reporte;
    
            return response()->json([
                'reportes' => [
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
                      
                        // Agrega más campos según sea necesario
                    ],
                ],
                'message' => 'reporte hallado correctamente'
            ]);
        } else {
            return response()->json([
                'mensaje' => 'reporte no hallado '
            ]);
        }
    }

}

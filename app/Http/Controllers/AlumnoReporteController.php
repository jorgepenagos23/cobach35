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


    public function obtenerReportedelALumno($matricula)
    {

        //creamos la instancia al modelo  alumno reporte 

        $reporte_alumno_buscador = new AlumnoReporte;

        $reporte_con_alumno = $reporte_alumno_buscador->obtenerReportedelALumno($matricula);

        if($reporte_con_alumno){

            return response()->json([

                'reportes' => $reporte_con_alumno,
                'message' =>'reporte hallado correctamente'

            ]);
        }else{
            return response()->json([

                'mensaje' => 'reporte no hallado '
            ]);
        }

    }


}

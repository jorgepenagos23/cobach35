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
             'usuario_id' => 'required|integer',
             'reporte_id' => 'required|integer',
 
         ]);
     
         $reporte = new AlumnoReporte();
         $reporte->descripcion = $validatedData['descripcion'];
         $reporte->matricula = $validatedData['matricula'];
         $reporte->fecha = $validatedData['fecha'];
         $reporte->usuario_id = $validatedData['usuario_id'];
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
    public function show(AlumnoReporte $alumnoReporte)
    {
        //
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
}

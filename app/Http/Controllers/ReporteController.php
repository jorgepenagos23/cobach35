<?php

namespace App\Http\Controllers;

use App\Models\AlumnoReporte;
use App\Models\Reporte;
use Illuminate\Http\Request;

class ReporteController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        
        $reportes = Reporte::all();


        return response()->json([
            'reportes '=>$reportes,
                'message' => 'hallados exitosamente' ]);
    }       

    public function index2()
    {
        
       $reporte_alumno = AlumnoReporte::all(); 
        

        return response()->json([
              
            'reportesA' => $reporte_alumno,
            'message' => 'alumnos con reportes encontrados exitosamente'

        ]);
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
    public function show(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}

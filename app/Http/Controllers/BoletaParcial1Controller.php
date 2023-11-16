<?php

namespace App\Http\Controllers;

use App\Imports\CalificacionesImport;
use App\Models\BoletaParcial1;
use App\Models\BoletaParcial2;

use Illuminate\Http\Request;
use Maatwebsite\Excel\Facades\Excel;
use Illuminate\Support\Facades\Log;
class BoletaParcial1Controller extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index2()
    {
        $boletas = BoletaParcial1::all();

        return view('alumnos.index', compact('boletas'));
    }


    public function import(Request $request)
    {
        $request->validate([
            'excel_file' => 'required|mimes:xls,xlsx,csv,json',
            'grupo' => 'required|in:Grupo A,Grupo B,Grupo C,Grupo D,Grupo E,Grupo F,Grupo G', // Ajusta según tus grupos permitidos        
        ]);
    
        $grupo = $request->input('grupo');
    
        // Lógica para determinar el modelo (tabla) según el grupo
        $modelo = null;
    
        switch ($grupo) {
            case 'Grupo A':
                // Asigna el modelo correspondiente al Grupo A
                $modelo = new BoletaParcial1(); // Ejemplo, ajusta según tus necesidades
                break;
            case 'Grupo B':

                return response()->json(['error' => 'No se encontró un modelo correspondiente al grupo'], 422);

                break;
            // Añade más casos según sea necesario
            default:
                // Maneja el caso en que no se haya encontrado un modelo correspondiente
                return response()->json(['error' => 'No se encontró un modelo correspondiente al grupo'], 422);
        }
    
        try {
            // Subir el archivo a la tabla correspondiente al Grupo
            Excel::import(new CalificacionesImport($modelo), $request->file('excel_file'));
    
            return response()->json(['message' => 'Archivo Excel subido con éxito']);
        } catch (\Exception $e) {
            Log::error('Mensaje de error personalizado: ' . $e->getMessage(), ['trace' => $e->getTrace()]);
    
            return response()->json(['error' => 'Error al subir el archivo. Consulta los logs para más detalles.'], 422);
        }
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
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
    public function show(BoletaParcial1 $boletaParcial1)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(BoletaParcial1 $boletaParcial1)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, BoletaParcial1 $boletaParcial1)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(BoletaParcial1 $boletaParcial1)
    {
        //
    }
}

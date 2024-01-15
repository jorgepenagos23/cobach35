<?php

namespace App\Http\Controllers;

use App\Imports\CalificacionesImport;
use App\Models\Alumno;
use App\Models\BoletaParcial1;
use App\Models\Primero_B_BoletaParcial1;
use App\Models\Primero_C__BoletaParcial1;
use App\Models\Primero_D__BoletaParcial1;
use App\Models\Primero_E__BoletaParcial1;
use App\Models\Primero_F__BoletaParcial1;
use App\Models\Primero_G__BoletaParcial1;

use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Http\Request;
use Maatwebsite\Excel\Facades\Excel;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Str;
use Symfony\Component\HttpFoundation\StreamedResponse;
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


    public function index(){

        $parcial1 = BoletaParcial1::all();

        return response()->json([

            'message' => 'boletas solicitadas correctamente',
            'data' => $parcial1,


        ]);


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
            $modelo = new BoletaParcial1();

            break;
        case 'Grupo B':
            $modelo = new Primero_B_BoletaParcial1();
            
            break;
        case 'Grupo C':
            $modelo = new Primero_C__BoletaParcial1();
            break;
        case 'Grupo D':
            $modelo = new Primero_D__BoletaParcial1();
            break;
        case 'Grupo E':
                $modelo = new Primero_E__BoletaParcial1();
                break;
         case 'Grupo F':
                    $modelo = new Primero_F__BoletaParcial1();
                    break;
      case 'Grupo G':
                        $modelo = new Primero_G__BoletaParcial1();
                        break;
        // Añade más casos según sea necesario
        default:
            return response()->json(['error' => 'No se encontró un modelo correspondiente al grupo'], 422);
    }

    try {
        // Subir el archivo al modelo correspondiente al Grupo
        Excel::import(new CalificacionesImport($modelo), $request->file('excel_file'));

        return response()->json(['message' => 'Archivo Excel subido con éxito']);
    } catch (\Exception $e) {
        Log::error('Mensaje de error personalizado: ' . $e->getMessage(), ['trace' => $e->getTrace()]);

        return response()->json(['error' => 'Error al subir el archivo. Consulta los logs para más detalles.'], 422);
    }
}

    
public function generarPdf(Request $request, $grupo)
{
    switch ($grupo) {
        case 'Grupo A':
            $totalBoletas = BoletaParcial1::count();

            if ($totalBoletas === 0) {
                return response()->json(['message' => 'No hay boletas disponibles'], 404);
            }
        
            $counter = 0;
        
            return new StreamedResponse(function () use ($totalBoletas, &$counter) {
                BoletaParcial1::chunk(20, function ($boletas) use ($totalBoletas, &$counter) {
                    foreach ($boletas as $boleta) {
                        try {
                            // Obtener datos del alumno
                            $alumno = Alumno::where('matricula', $boleta->matricula)->first();
        
                            // Verificar si el alumno existe
                            if ($alumno) {
                                $data = [
                                    'boleta_parcial1' => $boleta,
                                    'alumno' => $alumno,
                                ];
        
                                $pdf = PDF::loadView('boletaparcial1', $data)->setPaper('letter', 'landscape');
        
                                $matriculaSlug = Str::slug($boleta->matricula, '_');
                                $pdfPath = "boletas/primer_semestre/grupoA/parcial1/{$matriculaSlug}_boleta.pdf";
                                Storage::put($pdfPath, $pdf->output());
        
                                $boleta->update(['pdf_path' => $pdfPath]);
        
                                unset($data, $pdf);
                            } else {
                                Log::warning("No se encontró al alumno con matrícula {$boleta->matricula}.");
                            }
                        } catch (\Exception $e) {
                            Log::error("Error generando PDF para boleta {$boleta->matricula}: " . $e->getMessage());
                        }
        
                        // Incrementar el contador de boletas procesadas
                        $counter++;
        
                        // Calcular y enviar el progreso actual
                        $progress = ($counter / $totalBoletas) * 100;
                        echo "data: {\"progress\": $progress}\n\n";
                        ob_flush();
                        flush();
                    }
                });
            }, 200, [
                'Content-Type' => 'text/event-stream',
                'Cache-Control' => 'no-cache',
                'Connection' => 'keep-alive',
            ]);
         
            break;
        case 'Grupo B':

            $totalBoletas = Primero_B_BoletaParcial1::count();
            if ($totalBoletas === 0) {
                return response()->json(['message' => 'No hay boletas disponibles'], 404);
            }
        
            $counter = 0;
        
            return new StreamedResponse(function () use ($totalBoletas, &$counter) {
                Primero_B_BoletaParcial1::chunk(20, function ($boletas) use ($totalBoletas, &$counter) {
                    foreach ($boletas as $boleta) {
                        try {
                            // Obtener datos del alumno
                            $alumno = Alumno::where('matricula', $boleta->matricula)->first();
        
                            // Verificar si el alumno existe
                            if ($alumno) {
                                $data = [
                                    'boleta_parcial1' => $boleta,
                                    'alumno' => $alumno,
                                ];

                                $pdf = PDF::loadView('Primero.A.B.parcial1', $data)->setPaper('letter', 'landscape');
    
                                $matriculaSlug = Str::slug($boleta->matricula, '_');
                                $pdfPath = "boletas/primer_semestre/grupoB/parcial1/{$matriculaSlug}_boleta.pdf";
                                Storage::put($pdfPath, $pdf->output());
        
                                $boleta->update(['pdf_path' => $pdfPath]);
        
                                unset($data, $pdf);
                            } else {
                                Log::warning("No se encontró al alumno con matrícula {$boleta->matricula}.");
                            }
                        } catch (\Exception $e) {
                            Log::error("Error generando PDF para boleta {$boleta->matricula}: " . $e->getMessage());
                        }
        
                        // Incrementar el contador de boletas procesadas
                        $counter++;
        
                        // Calcular y enviar el progreso actual
                        $progress = ($counter / $totalBoletas) * 100;
                        echo "data: {\"progress\": $progress}\n\n";
                        ob_flush();
                        flush();
                    }
                });
            }, 200, [
                'Content-Type' => 'text/event-stream',
                'Cache-Control' => 'no-cache',
                'Connection' => 'keep-alive',
            ]);

            break;


        default:
            return response()->json([
                'message' => 'Grupo no válido, selecciona correctamente'
            ]);
    }
}

private function generarPdfGrupoA()
{
   
    return response()->json([
        'message' => 'Generación exitosa para GrupoA',
    ]);}







public function alumnosparaboletas()
{
    $alumnosparaboletas = Alumno::all();

    return view('boletaparcial1', ['alumnosparaboletas' => $alumnosparaboletas]);
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

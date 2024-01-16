<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Imports\CalificacionesImportPrimeroAPARCIAL1;
use App\Models\Alumno;
use App\Models\Primero_A_BoletaParcial2;
use App\Models\Primero_B_BoletaParcial2;
use App\Models\Primero_C__BoletaParcial2;
use App\Models\Primero_D__BoletaParcial2;
use App\Models\Primero_E__BoletaParcial2;
use App\Models\Primero_F__BoletaParcial2;
use App\Models\Primero_G__BoletaParcial2;


use Barryvdh\DomPDF\Facade\Pdf;
use Maatwebsite\Excel\Facades\Excel;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Str;
use Symfony\Component\HttpFoundation\StreamedResponse;

/// vamos usar este para todos los PRIMEROS SEMESTRES PARCIAL 2
class PrimeroABoletaParcial2Controller extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
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
    public function show(Primero_A_BoletaParcial2 $primero_A_BoletaParcial2)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Primero_A_BoletaParcial2 $primero_A_BoletaParcial2)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Primero_A_BoletaParcial2 $primero_A_BoletaParcial2)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Primero_A_BoletaParcial2 $primero_A_BoletaParcial2)
    {
        //
    }

    public function import(Request $request)
    {
        $request->validate([
            'excel_file' => 'required|mimes:xls,xlsx,csv,json',
            'grupo' => 'required|in:Grupo A,Grupo B,Grupo C,Grupo D,Grupo E,Grupo F,Grupo G', // Ajusta según tus grupos permitidos        
        ]);
    
        $grupo = $request->input('grupo');
    
        // Lógica para determinar el modelo (tabla) según el grupoz
        $modelo = null;
    
        switch ($grupo) {
            case 'Grupo A':
                $modelo = new Primero_A_BoletaParcial2(); // Ejemplo, ajusta según tus necesidades
                break;
            case 'Grupo B':
                $modelo = new Primero_B_BoletaParcial2();
             break;
            case 'Grupo C':
                $modelo = new Primero_C__BoletaParcial2();

             break;
             case 'Grupo D':
                $modelo = new Primero_D__BoletaParcial2();

             break;
             case 'Grupo E':
                $modelo = new Primero_E__BoletaParcial2();
             break;

             case 'Grupo F':
                $modelo = new Primero_F__BoletaParcial2();
             break;

             case 'Grupo G':
                $modelo = new Primero_G__BoletaParcial2();
             break;

            default:
                // Maneja el caso en que no se haya encontrado un modelo correspondiente
                return response()->json(['error' => 'No se encontró un modelo correspondiente al grupo'], 422);
        }
    
        try {
            // Subir el archivo a la tabla correspondiente al Grupo
            Excel::import(new CalificacionesImportPrimeroAPARCIAL1($modelo), $request->file('excel_file'));
    
            return response()->json(['message' => 'Archivo Excel subido con éxito']);
        } catch (\Exception $e) {
            Log::error('Mensaje de error personalizado: ' . $e->getMessage(), ['trace' => $e->getTrace()]);
    
            return response()->json(['error' => 'Error al subir el archivo. Consulta los logs para más detalles.'], 422);
        }
    }
/// generar pdf primer semestre parcial 2

public function generarpdfparcial2(Request $request, $grupo)
{
    switch ($grupo) {
        case 'Grupo A':
            $totalBoletas = Primero_A_BoletaParcial2::count();

            if ($totalBoletas === 0) {
                return response()->json(['message' => 'No hay boletas disponibles'], 404);
            }
        
            $counter = 0;
        
            return new StreamedResponse(function () use ($totalBoletas, &$counter) {
                Primero_A_BoletaParcial2::chunk(20, function ($boletas) use ($totalBoletas, &$counter) {
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
        
                                $pdf = PDF::loadView('Primero.A.parcial2', $data)->setPaper('letter', 'landscape');
        
                                $matriculaSlug = Str::slug($boleta->matricula, '_');
                                $pdfPath = "boletas/primer_semestre/grupoA/parcial2/{$matriculaSlug}_boleta.pdf";
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
            $totalBoletas = Primero_B_BoletaParcial2::count();
            if ($totalBoletas === 0) {
                return response()->json(['message' => 'No hay boletas disponibles'], 404);
            }
            $counter = 0;
            return new StreamedResponse(function () use ($totalBoletas, &$counter) {
                Primero_B_BoletaParcial2::chunk(20, function ($boletas) use ($totalBoletas, &$counter) {
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

                                $pdf = PDF::loadView('Primero.A.B.parcial2', $data)->setPaper('letter', 'landscape');
    
                                $matriculaSlug = Str::slug($boleta->matricula, '_');
                                $pdfPath = "boletas/primer_semestre/grupoB/parcial2/{$matriculaSlug}_boleta.pdf";
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
            case 'Grupo C':
                $totalBoletas = Primero_C__BoletaParcial2::count();
                if ($totalBoletas === 0) {
                    return response()->json(['message' => 'No hay boletas disponibles'], 404);
                }
            
                $counter = 0;
            
                return new StreamedResponse(function () use ($totalBoletas, &$counter) {
                    Primero_C__BoletaParcial2::chunk(20, function ($boletas) use ($totalBoletas, &$counter) {
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
    
                                    $pdf = PDF::loadView('Primero.A.B.C.parcial2', $data)->setPaper('letter', 'landscape');
        
                                    $matriculaSlug = Str::slug($boleta->matricula, '_');
                                    $pdfPath = "boletas/primer_semestre/grupoC/parcial2/{$matriculaSlug}_boleta.pdf";
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
            case 'Grupo D':
                $totalBoletas = Primero_D__BoletaParcial2::count();
                if ($totalBoletas === 0) {
                    return response()->json(['message' => 'No hay boletas disponibles'], 404);
                }
            
                $counter = 0;
            
                return new StreamedResponse(function () use ($totalBoletas, &$counter) {
                    Primero_D__BoletaParcial2::chunk(20, function ($boletas) use ($totalBoletas, &$counter) {
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

                                    $pdf = PDF::loadView('Primero.D.parcial2', $data)->setPaper('letter', 'landscape');
    
                                    $matriculaSlug = Str::slug($boleta->matricula, '_');
                                    $pdfPath = "boletas/primer_semestre/grupoD/parcial2/{$matriculaSlug}_boleta.pdf";
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
            case 'Grupo E':
                $totalBoletas = Primero_E__BoletaParcial2::count();
                if ($totalBoletas === 0) {
                    return response()->json(['message' => 'No hay boletas disponibles'], 404);
                }
            
                $counter = 0;
            
                return new StreamedResponse(function () use ($totalBoletas, &$counter) {
                    Primero_E__BoletaParcial2::chunk(20, function ($boletas) use ($totalBoletas, &$counter) {
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

                                    $pdf = PDF::loadView('Primero.E.parcial2', $data)->setPaper('letter', 'landscape');
    
                                    $matriculaSlug = Str::slug($boleta->matricula, '_');
                                    $pdfPath = "boletas/primer_semestre/grupoE/parcial2/{$matriculaSlug}_boleta.pdf";
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
            case 'Grupo F':

          $totalBoletas = Primero_F__BoletaParcial2::count();
                if ($totalBoletas === 0) {
                    return response()->json(['message' => 'No hay boletas disponibles'], 404);
                }
            
                $counter = 0;
            
                return new StreamedResponse(function () use ($totalBoletas, &$counter) {
                    Primero_F__BoletaParcial2::chunk(20, function ($boletas) use ($totalBoletas, &$counter) {
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

                                    $pdf = PDF::loadView('Primero.F.parcial2', $data)->setPaper('letter', 'landscape');
    
                                    $matriculaSlug = Str::slug($boleta->matricula, '_');
                                    $pdfPath = "boletas/primer_semestre/grupoF/parcial2/{$matriculaSlug}_boleta.pdf";
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
            case 'Grupo G':
                $totalBoletas = Primero_G__BoletaParcial2::count();
                if ($totalBoletas === 0) {
                    return response()->json(['message' => 'No hay boletas disponibles'], 404);
                }
            
                $counter = 0;
            
                return new StreamedResponse(function () use ($totalBoletas, &$counter) {
                    Primero_G__BoletaParcial2::chunk(20, function ($boletas) use ($totalBoletas, &$counter) {
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

                                    $pdf = PDF::loadView('Primero.G.parcial2', $data)->setPaper('letter', 'landscape');
    
                                    $matriculaSlug = Str::slug($boleta->matricula, '_');
                                    $pdfPath = "boletas/primer_semestre/grupoG/parcial2/{$matriculaSlug}_boleta.pdf";
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









}

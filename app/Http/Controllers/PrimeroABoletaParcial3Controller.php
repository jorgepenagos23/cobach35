<?php

namespace App\Http\Controllers;

use App\Models\Primero_A_BoletaParcial3;
use Illuminate\Http\Request;
use App\Models\Primero_A_BoletaParcial2;
use App\Imports\CalificacionesImportPrimeroAPARCIAL1;
use App\Imports\CalificacionesImportPrimeroAPARCIAL3;
use App\Models\Alumno;
use App\Models\Primero_B_BoletaParcial3;
use App\Models\Primero_C__BoletaParcial3;
use App\Models\Primero_D__BoletaParcial2;
use App\Models\Primero_D__BoletaParcial3;
use App\Models\Primero_E__BoletaParcial2;
use App\Models\Primero_E__BoletaParcial3;
use App\Models\Primero_F__BoletaParcial2;
use App\Models\Primero_F__BoletaParcial3;
use App\Models\Primero_G__BoletaParcial2;
use App\Models\Primero_G__BoletaParcial3;
use Barryvdh\DomPDF\Facade\Pdf;
use Maatwebsite\Excel\Facades\Excel;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Str;
use Symfony\Component\HttpFoundation\StreamedResponse;
/// vamos usar este para todos los PRIMEROS SEMESTRES PARCIAL 3

class PrimeroABoletaParcial3Controller extends Controller
{

    
    public function import(Request $request)
    {
        $request->validate([
            'excel_file' => 'required|mimes:xls,xlsx,csv,json',
            'grupo' => 'required|in:Grupo A,Grupo B,Grupo C,Grupo D,Grupo E,Grupo F,Grupo G',  ///grupos permitidos        
        ]);
    
        $grupo = $request->input('grupo');
    
  
        $modelo = null;
    
        switch ($grupo) {
            case 'Grupo A':
                $modelo = new Primero_A_BoletaParcial3(); // Ejemplo, ajusta según tus necesidades
                break;
            case 'Grupo B':
                $modelo = new Primero_B_BoletaParcial3();
             break;
            case 'Grupo C':
                $modelo = new Primero_C__BoletaParcial3();

             break;
             case 'Grupo D':
                $modelo = new Primero_D__BoletaParcial3();

             break;
             case 'Grupo E':
                $modelo = new Primero_E__BoletaParcial3();
             break;

             case 'Grupo F':
                $modelo = new Primero_F__BoletaParcial3();
             break;

             case 'Grupo G':
                $modelo = new Primero_G__BoletaParcial3();
             break;

            default:
                // Maneja el caso en que no se haya encontrado un modelo correspondiente
                return response()->json(['error' => 'No se encontró un modelo correspondiente al grupo'], 422);
        }



        try {
            Excel::import(new CalificacionesImportPrimeroAPARCIAL3($modelo), $request->file('excel_file'));
    
            return response()->json(['message' => 'Archivo Excel subido con éxito']);
        } catch (\Exception $e) {
            Log::error('Mensaje de error personalizado: ' . $e->getMessage(), ['trace' => $e->getTrace()]);
    
            return response()->json(['error' => 'Error al subir el archivo. Consulta los logs para más detalles.'], 422);
        }
    }



    public function generarpdfparcial3(Request $request, $grupo)
    {
        switch ($grupo) {
            case 'Grupo A':
                $totalBoletas = Primero_A_BoletaParcial3::count();
    
                if ($totalBoletas === 0) {
                    return response()->json(['message' => 'No hay boletas disponibles'], 404);
                }
            
                $counter = 0;
            
                return new StreamedResponse(function () use ($totalBoletas, &$counter) {
                    Primero_A_BoletaParcial3::chunk(20, function ($boletas) use ($totalBoletas, &$counter) {
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
            
                                    $pdf = PDF::loadView('Primero.A.parcial3', $data)->setPaper('letter', 'landscape');
            
                                    $matriculaSlug = Str::slug($boleta->matricula, '_');
                                    $pdfPath = "boletas/primer_semestre/grupoA/parcial3/{$matriculaSlug}_boleta.pdf";
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
                $totalBoletas = Primero_B_BoletaParcial3::count();
                if ($totalBoletas === 0) {
                    return response()->json(['message' => 'No hay boletas disponibles'], 404);
                }
                $counter = 0;
                return new StreamedResponse(function () use ($totalBoletas, &$counter) {
                    Primero_B_BoletaParcial3::chunk(20, function ($boletas) use ($totalBoletas, &$counter) {
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
    
                                    $pdf = PDF::loadView('Primero.A.B.parcial3', $data)->setPaper('letter', 'landscape');
        
                                    $matriculaSlug = Str::slug($boleta->matricula, '_');
                                    $pdfPath = "boletas/primer_semestre/grupoB/parcial3/{$matriculaSlug}_boleta.pdf";
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
                    $totalBoletas = Primero_C__BoletaParcial3::count();
                    if ($totalBoletas === 0) {
                        return response()->json(['message' => 'No hay boletas disponibles'], 404);
                    }
                
                    $counter = 0;
                
                    return new StreamedResponse(function () use ($totalBoletas, &$counter) {
                        Primero_C__BoletaParcial3::chunk(20, function ($boletas) use ($totalBoletas, &$counter) {
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
        
                                        $pdf = PDF::loadView('Primero.A.B.C.parcial3', $data)->setPaper('letter', 'landscape');
            
                                        $matriculaSlug = Str::slug($boleta->matricula, '_');
                                        $pdfPath = "boletas/primer_semestre/grupoC/parcial3/{$matriculaSlug}_boleta.pdf";
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
                    $totalBoletas = Primero_D__BoletaParcial3::count();
                    if ($totalBoletas === 0) {
                        return response()->json(['message' => 'No hay boletas disponibles'], 404);
                    }
                
                    $counter = 0;
                
                    return new StreamedResponse(function () use ($totalBoletas, &$counter) {
                        Primero_D__BoletaParcial3::chunk(20, function ($boletas) use ($totalBoletas, &$counter) {
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
    
                                        $pdf = PDF::loadView('Primero.D.parcial3', $data)->setPaper('letter', 'landscape');
        
                                        $matriculaSlug = Str::slug($boleta->matricula, '_');
                                        $pdfPath = "boletas/primer_semestre/grupoD/parcial3/{$matriculaSlug}_boleta.pdf";
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
                    $totalBoletas = Primero_E__BoletaParcial3::count();
                    if ($totalBoletas === 0) {
                        return response()->json(['message' => 'No hay boletas disponibles'], 404);
                    }
                
                    $counter = 0;
                
                    return new StreamedResponse(function () use ($totalBoletas, &$counter) {
                        Primero_E__BoletaParcial3::chunk(20, function ($boletas) use ($totalBoletas, &$counter) {
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
    
                                        $pdf = PDF::loadView('Primero.E.parcial3', $data)->setPaper('letter', 'landscape');
        
                                        $matriculaSlug = Str::slug($boleta->matricula, '_');
                                        $pdfPath = "boletas/primer_semestre/grupoE/parcial3/{$matriculaSlug}_boleta.pdf";
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
    
              $totalBoletas = Primero_F__BoletaParcial3::count();
                    if ($totalBoletas === 0) {
                        return response()->json(['message' => 'No hay boletas disponibles'], 404);
                    }
                
                    $counter = 0;
                
                    return new StreamedResponse(function () use ($totalBoletas, &$counter) {
                        Primero_F__BoletaParcial3::chunk(20, function ($boletas) use ($totalBoletas, &$counter) {
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
    
                                        $pdf = PDF::loadView('Primero.F.parcial3', $data)->setPaper('letter', 'landscape');
        
                                        $matriculaSlug = Str::slug($boleta->matricula, '_');
                                        $pdfPath = "boletas/primer_semestre/grupoF/parcial3/{$matriculaSlug}_boleta.pdf";
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
                    $totalBoletas = Primero_G__BoletaParcial3::count();
                    if ($totalBoletas === 0) {
                        return response()->json(['message' => 'No hay boletas disponibles'], 404);
                    }
                
                    $counter = 0;
                
                    return new StreamedResponse(function () use ($totalBoletas, &$counter) {
                        Primero_G__BoletaParcial3::chunk(20, function ($boletas) use ($totalBoletas, &$counter) {
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
    
                                        $pdf = PDF::loadView('Primero.G.parcial3', $data)->setPaper('letter', 'landscape');
        
                                        $matriculaSlug = Str::slug($boleta->matricula, '_');
                                        $pdfPath = "boletas/primer_semestre/grupoG/parcial3/{$matriculaSlug}_boleta.pdf";
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
    










   
    public function index()
    {
        //
    }

    public function create()
    {
        //
    }

    public function store(Request $request)
    {
        //
    }

  
    public function show(Primero_A_BoletaParcial3 $primero_A_BoletaParcial3)
    {
        //
    }

    public function edit(Primero_A_BoletaParcial3 $primero_A_BoletaParcial3)
    {
        //
    }

    public function update(Request $request, Primero_A_BoletaParcial3 $primero_A_BoletaParcial3)
    {
        //
    }

  
    public function destroy(Primero_A_BoletaParcial3 $primero_A_BoletaParcial3)
    {
    
    }




}

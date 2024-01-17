<?php

namespace App\Http\Controllers;
use Barryvdh\DomPDF\Facade\Pdf;
use Maatwebsite\Excel\Facades\Excel;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Str;
use Symfony\Component\HttpFoundation\StreamedResponse;
use App\Models\Segundo_A_BoletaParcial1;
use App\Models\Segundo_B_BoletaParcial1;
use App\Models\Segundo_C_BoletaParcial1;
use App\Models\Segundo_D_BoletaParcial1;
use App\Models\Segundo_E_BoletaParcial1;
use App\Models\Segundo_F_BoletaParcial1;
use App\Imports\CalificacionesImportSegundoPARCIAL1;
use App\Imports\CalificacionesImportSegundoPARCIAL2;
use App\Imports\CalificacionesImportSegundoPARCIAL3;
use App\Models\Alumno;
use App\Models\Segundo_A_BoletaParcial2;
use App\Models\Segundo_A_BoletaParcial3;
use App\Models\Segundo_B_BoletaParcial2;
use App\Models\Segundo_B_BoletaParcial3;
use App\Models\Segundo_C_BoletaParcial2;
use App\Models\Segundo_C_BoletaParcial3;
use App\Models\Segundo_D_BoletaParcial2;
use App\Models\Segundo_D_BoletaParcial3;
use App\Models\Segundo_E_BoletaParcial2;
use App\Models\Segundo_E_BoletaParcial3;
use App\Models\Segundo_F_BoletaParcial2;
use App\Models\Segundo_F_BoletaParcial3;
use App\Models\Segundo_G_BoletaParcial1;
use App\Models\Segundo_G_BoletaParcial2;
use App\Models\Segundo_G_BoletaParcial3;
use Illuminate\Http\Request;

class BoletaParcial2Controller extends Controller
{
    public function import(Request $request)
{
    $request->validate([
        'excel_file' => 'required|mimes:xls,xlsx,csv,json',
        'grupo' => 'required|in:Grupo A,Grupo B,Grupo C,Grupo D,Grupo E,Grupo F,Grupo G',     
    ]);

    $grupo = $request->input('grupo');

    $modelo = null;

    switch ($grupo) {
        case 'Grupo A':
            $modelo = new Segundo_A_BoletaParcial1();

            break;
        case 'Grupo B':
            $modelo = new Segundo_B_BoletaParcial1();
            
            break;
        case 'Grupo C':
            $modelo = new Segundo_C_BoletaParcial1();
            break;
        case 'Grupo D':
            $modelo = new Segundo_D_BoletaParcial1();
            break;
        case 'Grupo E':
                $modelo = new Segundo_E_BoletaParcial1();
                break;
         case 'Grupo F':
                    $modelo = new Segundo_F_BoletaParcial1();
                    break;
      case 'Grupo G':
                        $modelo = new Segundo_G_BoletaParcial1();
                        break;
        default:
            return response()->json(['error' => 'No se encontró un modelo correspondiente al grupo'], 422);
    }

    try {
        // Subir el archivo al modelo correspondiente al Grupo
        Excel::import(new CalificacionesImportSegundoPARCIAL1($modelo), $request->file('excel_file'));

        return response()->json(['message' => 'Archivo Excel subido con éxito']);
    } catch (\Exception $e) {
        Log::error('Mensaje de error personalizado: ' . $e->getMessage(), ['trace' => $e->getTrace()]);

        return response()->json(['error' => 'Error al subir el archivo. Consulta los logs para más detalles.'], 422);
    }
}



//// import segundo semestre parcial 2
public function import2(Request $request)
{
    $request->validate([
        'excel_file' => 'required|mimes:xls,xlsx,csv,json',
        'grupo' => 'required|in:Grupo A,Grupo B,Grupo C,Grupo D,Grupo E,Grupo F,Grupo G',     
    ]);

    $grupo = $request->input('grupo');

    $modelo = null;

    switch ($grupo) {
        case 'Grupo A':
            $modelo = new Segundo_A_BoletaParcial2();

            break;
        case 'Grupo B':
            $modelo = new Segundo_B_BoletaParcial2();
            
            break;
        case 'Grupo C':
            $modelo = new Segundo_C_BoletaParcial2();
            break;
        case 'Grupo D':
            $modelo = new Segundo_D_BoletaParcial2();
            break;
        case 'Grupo E':
                $modelo = new Segundo_E_BoletaParcial2();
                break;
         case 'Grupo F':
                    $modelo = new Segundo_F_BoletaParcial2();
                    break;
      case 'Grupo G':
                        $modelo = new Segundo_G_BoletaParcial2();
                        break;
        default:
            return response()->json(['error' => 'No se encontró un modelo correspondiente al grupo'], 422);
    }

    try {
        // Subir el archivo al modelo correspondiente al Grupo
        Excel::import(new CalificacionesImportSegundoPARCIAL2($modelo), $request->file('excel_file'));

        return response()->json(['message' => 'Archivo Excel subido con éxito']);
    } catch (\Exception $e) {
        Log::error('Mensaje de error personalizado: ' . $e->getMessage(), ['trace' => $e->getTrace()]);

        return response()->json(['error' => 'Error al subir el archivo. Consulta los logs para más detalles.'], 422);
    }
}




//// import segundo semestre parcial 3


public function import3(Request $request)
{
    $request->validate([
        'excel_file' => 'required|mimes:xls,xlsx,csv,json',
        'grupo' => 'required|in:Grupo A,Grupo B,Grupo C,Grupo D,Grupo E,Grupo F,Grupo G',     
    ]);

    $grupo = $request->input('grupo');

    $modelo = null;

    switch ($grupo) {
        case 'Grupo A':
            $modelo = new Segundo_A_BoletaParcial3();

            break;
        case 'Grupo B':
            $modelo = new Segundo_B_BoletaParcial3();
            
            break;
        case 'Grupo C':
            $modelo = new Segundo_C_BoletaParcial3();
            break;
        case 'Grupo D':
            $modelo = new Segundo_D_BoletaParcial3();
            break;
        case 'Grupo E':
                $modelo = new Segundo_E_BoletaParcial3();
                break;
         case 'Grupo F':
                    $modelo = new Segundo_F_BoletaParcial3();
                    break;
      case 'Grupo G':
                        $modelo = new Segundo_G_BoletaParcial3();
                        break;
        default:
            return response()->json(['error' => 'No se encontró un modelo correspondiente al grupo'], 422);
    }

    try {
        // Subir el archivo al modelo correspondiente al Grupo
        Excel::import(new CalificacionesImportSegundoPARCIAL3($modelo), $request->file('excel_file'));

        return response()->json(['message' => 'Archivo Excel subido con éxito']);
    } catch (\Exception $e) {
        Log::error('Mensaje de error personalizado: ' . $e->getMessage(), ['trace' => $e->getTrace()]);

        return response()->json(['error' => 'Error al subir el archivo. Consulta los logs para más detalles.'], 422);
    }
}




//// generar PDF SEGUNDO SEMESTRE 

public function generarPdf(Request $request, $grupo){
    switch ($grupo) {
        case 'Grupo A':
            $totalBoletas = Segundo_A_BoletaParcial1::count();

            if ($totalBoletas === 0) {
                return response()->json(['message' => 'No hay boletas disponibles'], 404);
            }
        
            $counter = 0;
        
            return new StreamedResponse(function () use ($totalBoletas, &$counter) {
                Segundo_A_BoletaParcial1::chunk(20, function ($boletas) use ($totalBoletas, &$counter) {
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
        
                                $pdf = PDF::loadView('Segundo.A.parcial1', $data)->setPaper('letter', 'landscape');
        
                                $matriculaSlug = Str::slug($boleta->matricula, '_');
                                $pdfPath = "boletas/segundo_semestre/grupoA/parcial1/{$matriculaSlug}_boleta.pdf";
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

            $totalBoletas = Segundo_B_BoletaParcial1::count();
            if ($totalBoletas === 0) {
                return response()->json(['message' => 'No hay boletas disponibles'], 404);
            }
        
            $counter = 0;
        
            return new StreamedResponse(function () use ($totalBoletas, &$counter) {
                Segundo_B_BoletaParcial1::chunk(20, function ($boletas) use ($totalBoletas, &$counter) {
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
                                $pdfPath = "boletas/segundo_semestre/grupoB/parcial1/{$matriculaSlug}_boleta.pdf";
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
                $totalBoletas = Segundo_C_BoletaParcial1::count();
                if ($totalBoletas === 0) {
                    return response()->json(['message' => 'No hay boletas disponibles'], 404);
                }
            
                $counter = 0;
            
                return new StreamedResponse(function () use ($totalBoletas, &$counter) {
                    Segundo_C_BoletaParcial1::chunk(20, function ($boletas) use ($totalBoletas, &$counter) {
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
    
                                    $pdf = PDF::loadView('Primero.A.B.C.parcial1', $data)->setPaper('letter', 'landscape');
        
                                    $matriculaSlug = Str::slug($boleta->matricula, '_');
                                    $pdfPath = "boletas/segundo_semestre/grupoC/parcial1/{$matriculaSlug}_boleta.pdf";
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
                $totalBoletas = Segundo_D_BoletaParcial1::count();
                if ($totalBoletas === 0) {
                    return response()->json(['message' => 'No hay boletas disponibles'], 404);
                }
            
                $counter = 0;
            
                return new StreamedResponse(function () use ($totalBoletas, &$counter) {
                    Segundo_D_BoletaParcial1::chunk(20, function ($boletas) use ($totalBoletas, &$counter) {
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

                                    $pdf = PDF::loadView('Primero.D.parcial1', $data)->setPaper('letter', 'landscape');
    
                                    $matriculaSlug = Str::slug($boleta->matricula, '_');
                                    $pdfPath = "boletas/segundo_semestre/grupoD/parcial1/{$matriculaSlug}_boleta.pdf";
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
                $totalBoletas = Segundo_E_BoletaParcial1::count();
                if ($totalBoletas === 0) {
                    return response()->json(['message' => 'No hay boletas disponibles'], 404);
                }
            
                $counter = 0;
            
                return new StreamedResponse(function () use ($totalBoletas, &$counter) {
                    Segundo_E_BoletaParcial1::chunk(20, function ($boletas) use ($totalBoletas, &$counter) {
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

                                    $pdf = PDF::loadView('Primero.E.parcial1', $data)->setPaper('letter', 'landscape');
    
                                    $matriculaSlug = Str::slug($boleta->matricula, '_');
                                    $pdfPath = "boletas/segundo_semestre/grupoE/parcial1/{$matriculaSlug}_boleta.pdf";
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

          $totalBoletas = Segundo_F_BoletaParcial1::count();
                if ($totalBoletas === 0) {
                    return response()->json(['message' => 'No hay boletas disponibles'], 404);
                }
            
                $counter = 0;
            
                return new StreamedResponse(function () use ($totalBoletas, &$counter) {
                    Segundo_F_BoletaParcial1::chunk(20, function ($boletas) use ($totalBoletas, &$counter) {
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

                                    $pdf = PDF::loadView('Primero.F.parcial1', $data)->setPaper('letter', 'landscape');
    
                                    $matriculaSlug = Str::slug($boleta->matricula, '_');
                                    $pdfPath = "boletas/segundo_semestre/grupoF/parcial1/{$matriculaSlug}_boleta.pdf";
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
                $totalBoletas = Segundo_G_BoletaParcial1::count();
                if ($totalBoletas === 0) {
                    return response()->json(['message' => 'No hay boletas disponibles'], 404);
                }
            
                $counter = 0;
            
                return new StreamedResponse(function () use ($totalBoletas, &$counter) {
                    Segundo_G_BoletaParcial1::chunk(20, function ($boletas) use ($totalBoletas, &$counter) {
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

                                    $pdf = PDF::loadView('Primero.G.parcial1', $data)->setPaper('letter', 'landscape');
    
                                    $matriculaSlug = Str::slug($boleta->matricula, '_');
                                    $pdfPath = "boletas/segundo_semestre/grupoG/parcial1/{$matriculaSlug}_boleta.pdf";
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


        default:
            return response()->json([
                'message' => 'Grupo no válido, selecciona correctamente'
            ]);
    }


}




public function generarpdfparcial2($grupo){
    switch ($grupo) {
        case 'Grupo A':
            $totalBoletas = Segundo_A_BoletaParcial2::count();

            if ($totalBoletas === 0) {
                return response()->json(['message' => 'No hay boletas disponibles'], 404);
            }
        
            $counter = 0;
        
            return new StreamedResponse(function () use ($totalBoletas, &$counter) {
                Segundo_A_BoletaParcial2::chunk(20, function ($boletas) use ($totalBoletas, &$counter) {
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
        
                                $pdf = PDF::loadView('Segundo.A.parcial2', $data)->setPaper('letter', 'landscape');
        
                                $matriculaSlug = Str::slug($boleta->matricula, '_');
                                $pdfPath = "boletas/segundo_semestre/grupoA/parcial2/{$matriculaSlug}_boleta.pdf";
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

            $totalBoletas = Segundo_B_BoletaParcial2::count();
            if ($totalBoletas === 0) {
                return response()->json(['message' => 'No hay boletas disponibles'], 404);
            }
        
            $counter = 0;
        
            return new StreamedResponse(function () use ($totalBoletas, &$counter) {
                Segundo_B_BoletaParcial2::chunk(20, function ($boletas) use ($totalBoletas, &$counter) {
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
                                $pdfPath = "boletas/segundo_semestre/grupoB/parcial2/{$matriculaSlug}_boleta.pdf";
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
                $totalBoletas = Segundo_C_BoletaParcial2::count();
                if ($totalBoletas === 0) {
                    return response()->json(['message' => 'No hay boletas disponibles'], 404);
                }
            
                $counter = 0;
            
                return new StreamedResponse(function () use ($totalBoletas, &$counter) {
                    Segundo_C_BoletaParcial2::chunk(20, function ($boletas) use ($totalBoletas, &$counter) {
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
                                    $pdfPath = "boletas/segundo_semestre/grupoC/parcial2/{$matriculaSlug}_boleta.pdf";
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
                $totalBoletas = Segundo_D_BoletaParcial2::count();
                if ($totalBoletas === 0) {
                    return response()->json(['message' => 'No hay boletas disponibles'], 404);
                }
            
                $counter = 0;
            
                return new StreamedResponse(function () use ($totalBoletas, &$counter) {
                    Segundo_D_BoletaParcial2::chunk(20, function ($boletas) use ($totalBoletas, &$counter) {
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
                                    $pdfPath = "boletas/segundo_semestre/grupoD/parcial2/{$matriculaSlug}_boleta.pdf";
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
                $totalBoletas = Segundo_E_BoletaParcial2::count();
                if ($totalBoletas === 0) {
                    return response()->json(['message' => 'No hay boletas disponibles'], 404);
                }
            
                $counter = 0;
            
                return new StreamedResponse(function () use ($totalBoletas, &$counter) {
                    Segundo_E_BoletaParcial2::chunk(20, function ($boletas) use ($totalBoletas, &$counter) {
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
                                    $pdfPath = "boletas/segundo_semestre/grupoE/parcial2/{$matriculaSlug}_boleta.pdf";
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

          $totalBoletas = Segundo_F_BoletaParcial2::count();
                if ($totalBoletas === 0) {
                    return response()->json(['message' => 'No hay boletas disponibles'], 404);
                }
            
                $counter = 0;
            
                return new StreamedResponse(function () use ($totalBoletas, &$counter) {
                    Segundo_F_BoletaParcial2::chunk(20, function ($boletas) use ($totalBoletas, &$counter) {
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
                                    $pdfPath = "boletas/segundo_semestre/grupoF/parcial2/{$matriculaSlug}_boleta.pdf";
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
                $totalBoletas = Segundo_G_BoletaParcial2::count();
                if ($totalBoletas === 0) {
                    return response()->json(['message' => 'No hay boletas disponibles'], 404);
                }
            
                $counter = 0;
            
                return new StreamedResponse(function () use ($totalBoletas, &$counter) {
                    Segundo_G_BoletaParcial2::chunk(20, function ($boletas) use ($totalBoletas, &$counter) {
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
                                    $pdfPath = "boletas/segundo_semestre/grupoG/parcial2/{$matriculaSlug}_boleta.pdf";
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


        default:
            return response()->json([
                'message' => 'Grupo no válido, selecciona correctamente'
            ]);
    }


    

}





public function generarpdfparcial3($grupo){
    switch ($grupo) {
        case 'Grupo A':
            $totalBoletas = Segundo_A_BoletaParcial3::count();

            if ($totalBoletas === 0) {
                return response()->json(['message' => 'No hay boletas disponibles'], 404);
            }
        
            $counter = 0;
        
            return new StreamedResponse(function () use ($totalBoletas, &$counter) {
                Segundo_A_BoletaParcial3::chunk(20, function ($boletas) use ($totalBoletas, &$counter) {
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
        
                                $pdf = PDF::loadView('Segundo.A.parcial3', $data)->setPaper('letter', 'landscape');
        
                                $matriculaSlug = Str::slug($boleta->matricula, '_');
                                $pdfPath = "boletas/segundo_semestre/grupoA/parcial3/{$matriculaSlug}_boleta.pdf";
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

            $totalBoletas = Segundo_B_BoletaParcial3::count();
            if ($totalBoletas === 0) {
                return response()->json(['message' => 'No hay boletas disponibles'], 404);
            }
        
            $counter = 0;
        
            return new StreamedResponse(function () use ($totalBoletas, &$counter) {
                Segundo_B_BoletaParcial3::chunk(20, function ($boletas) use ($totalBoletas, &$counter) {
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
                                $pdfPath = "boletas/segundo_semestre/grupoB/parcial3/{$matriculaSlug}_boleta.pdf";
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
                $totalBoletas = Segundo_C_BoletaParcial3::count();
                if ($totalBoletas === 0) {
                    return response()->json(['message' => 'No hay boletas disponibles'], 404);
                }
            
                $counter = 0;
            
                return new StreamedResponse(function () use ($totalBoletas, &$counter) {
                    Segundo_C_BoletaParcial3::chunk(20, function ($boletas) use ($totalBoletas, &$counter) {
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
                                    $pdfPath = "boletas/segundo_semestre/grupoC/parcial3/{$matriculaSlug}_boleta.pdf";
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
                $totalBoletas = Segundo_D_BoletaParcial3::count();
                if ($totalBoletas === 0) {
                    return response()->json(['message' => 'No hay boletas disponibles'], 404);
                }
            
                $counter = 0;
            
                return new StreamedResponse(function () use ($totalBoletas, &$counter) {
                    Segundo_D_BoletaParcial3::chunk(20, function ($boletas) use ($totalBoletas, &$counter) {
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
                                    $pdfPath = "boletas/segundo_semestre/grupoD/parcial3/{$matriculaSlug}_boleta.pdf";
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
                $totalBoletas = Segundo_E_BoletaParcial3::count();
                if ($totalBoletas === 0) {
                    return response()->json(['message' => 'No hay boletas disponibles'], 404);
                }
            
                $counter = 0;
            
                return new StreamedResponse(function () use ($totalBoletas, &$counter) {
                    Segundo_E_BoletaParcial3::chunk(20, function ($boletas) use ($totalBoletas, &$counter) {
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
                                    $pdfPath = "boletas/segundo_semestre/grupoE/parcial3/{$matriculaSlug}_boleta.pdf";
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

          $totalBoletas = Segundo_F_BoletaParcial3::count();
                if ($totalBoletas === 0) {
                    return response()->json(['message' => 'No hay boletas disponibles'], 404);
                }
            
                $counter = 0;
            
                return new StreamedResponse(function () use ($totalBoletas, &$counter) {
                    Segundo_F_BoletaParcial3::chunk(20, function ($boletas) use ($totalBoletas, &$counter) {
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
                                    $pdfPath = "boletas/segundo_semestre/grupoF/parcial3/{$matriculaSlug}_boleta.pdf";
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
                $totalBoletas = Segundo_G_BoletaParcial3::count();
                if ($totalBoletas === 0) {
                    return response()->json(['message' => 'No hay boletas disponibles'], 404);
                }
            
                $counter = 0;
            
                return new StreamedResponse(function () use ($totalBoletas, &$counter) {
                    Segundo_G_BoletaParcial3::chunk(20, function ($boletas) use ($totalBoletas, &$counter) {
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
                                    $pdfPath = "boletas/segundo_semestre/grupoG/parcial3/{$matriculaSlug}_boleta.pdf";
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


        default:
            return response()->json([
                'message' => 'Grupo no válido, selecciona correctamente'
            ]);
    }
    

}












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

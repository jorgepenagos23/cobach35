<?php

namespace App\Http\Controllers;
use Illuminate\Validation\ValidationException;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
class DescargaController extends Controller
{
    public function descargapdf($nombreArchivo){

        $usuarioActual = auth()->user(); // Obtener al usuario actual
        $rutaArchivo = public_path("boletas/{$usuarioActual->matricula}_boleta.pdf");
    
        if (file_exists($rutaArchivo)) {
            $contenidoArchivo = file_get_contents($rutaArchivo);
    
            return response()->make($contenidoArchivo, 200, [
                'Content-Type' => 'application/pdf',
                'Content-Disposition' => 'inline; filename="' . $nombreArchivo . '"',
            ]);
        } else {
            abort(404);
        }

    }


    /**
     * Display a listing of the resource.
     */
  

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
   
    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
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

    public function index()
    {
        // Obtener la lista de archivos PDF en la carpeta 'pdf' en storage
        $pdfFiles = Storage::files('pdf');

        return response()->json(['pdfs' => $pdfFiles], 200);
    }

    public function store(Request $request)
    {
        $request->validate([
            'file' => 'required|mimes:pdf|max:10240', // Validar que es un archivo PDF y no excede los 10MB
        ]);

        $file = $request->file('file');
        
        // Almacenar el archivo PDF en la carpeta 'pdf' en storage con un nombre único
        $filePath = $file->storeAs('pdf', $file->getClientOriginalName(), 'public');

        return response()->json(['message' => 'PDF subido correctamente', 'path' => $filePath], 200);
    }

    public function download($filename)
    {
        // Definir la ruta completa al archivo PDF en storage
        $pdfPath = storage_path("app/public/pdf/{$filename}");

        // Verificar si el archivo existe
        if (file_exists($pdfPath)) {
            // Devolver el archivo para descarga
            return response()->download($pdfPath);
        } else {
            // Devolver una respuesta 404 si el archivo no se encuentra
            return response()->json(['message' => 'Archivo no encontrado'], 404);
        }
    }

    public function subirPdf(Request $request)
    {
        $request->validate([
            'archivo' => 'required|mimes:pdf|max:10240',
        ]);
    
        // Manejo del archivo
        $archivo = $request->file('archivo');
    
        // Almacenar el archivo en la carpeta 'pdf' dentro de 'storage/app'
        $ruta = $archivo->storeAs('pdf', $archivo->getClientOriginalName());
    
        return response()->json(['ruta' => $ruta], 200);
    }

}

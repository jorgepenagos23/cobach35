<?php

namespace App\Http\Controllers;

use App\Models\Publicacion;
use Illuminate\Http\Request;

class PublicacionController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
     
        $publicaciones = Publicacion::all();
        return response()->json([
           'publicaciones' =>$publicaciones, 
           'message' => 'Solicitud Exitosa API'
        ],200);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'titulo' => 'required|string',
            'descripcion' => 'required|string',
            'fecha' => 'required|date', // Asegúrate de que fecha sea una fecha válida
            'nombre' => 'required|string',
        ]);
    
        $publicacion = new Publicacion;
        $publicacion->titulo = $validatedData['titulo'];
        $publicacion->descripcion = $validatedData['descripcion'];
        $publicacion->fecha = $validatedData['fecha'];
        $publicacion->nombre = $validatedData['nombre'];
        $publicacion->save();
    
        return response()->json([
            'data' => $publicacion,
            'message' => 'Publicación creada correctamente',
        ], 201); // El código 201 indica que la publicación se ha creado con éxito
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

<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreContenidoRequest;
use App\Http\Requests\UpdateContenidoRequest;
use App\Models\Contenido;

class ContenidoController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
       
        
            
            $contenido = Contenido::all();     
    
            return response()->json([
                'message'=>'contenido devueltas',
                 'contenido'=>$contenido,
            ],200);
    
        
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
    public function store(StoreContenidoRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(Contenido $contenido)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Contenido $contenido)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateContenidoRequest $request, Contenido $contenido)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Contenido $contenido)
    {
        //
    }
}

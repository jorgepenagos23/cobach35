<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Boleta;
use App\Models\Alumno;

use App\Http\Requests\User\IndexRequest;
use App\Http\Resources\UserResource;
class BoletaController extends Controller
{
   
    public function index()
    {
        // Lógica para obtener las boletas en formato JSON
        $boletas = Boleta::all();

        return response()->json($boletas);
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

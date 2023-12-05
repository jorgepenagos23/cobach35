<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Boleta;
use App\Models\Alumno;
use Maatwebsite\Excel\Facades\Excel;

use App\Http\Requests\User\IndexRequest;
use App\Http\Resources\UserResource;
use App\Imports\BoletasExcelIMport;

class BoletaController extends Controller
{
   
    public function index()
    {
        // Lógica para obtener las boletas en formato JSON
        $boletas = Boleta::all();

        return response()->json([
            'boletas' => $boletas,
            'message' => 'Solicitud API '

        ] ,200);
    }

    public function import(Request $request){

        $request->validate([
          
            'excel_file' =>'required|mimes:xls,xlsx,csv'

        ]);
        
        Excel::import(new BoletasExcelIMport,$request->file('exce;_file'));

        return response()->json([

            'message' => 'archivo excel de boletas  subido con exito'
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

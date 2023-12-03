<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreAlumnoRequest;
use App\Http\Requests\UpdateAlumnoRequest;
use App\Models\Alumno;
use App\Imports\AlumnoRGI;
use Maatwebsite\Excel\Facades\Excel;
use Illuminate\Http\Request;
class AlumnoController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $alumnos = Alumno::all();
        return response()->json(['alumnos' => $alumnos], 200);
    }
   
    public function index2()
    {
        $alumno = Alumno::get();

        return view('alumnos.alumno',['alumnos'=>$alumno]);    }



    
    public function import(Request $request){

        $request->validate([
        'excel_file' =>'required|mimes:xls,xlsx,csv'


        ]);
        Excel::import(new AlumnoRGI, $request->file('excel_file')); ///mandamos el archivo a importar
        return response()->json(['message' => 'Archivo Excel subido con éxito']);
    }


    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }
    public function store(Request $request)
    {

        $inputs = $request->input();

        $respuesta = Alumno::create($inputs);

        return response()->json([

                'data' => $respuesta,
                'mensaje' => "creado correctamente "
        ]);


    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        $alumno = Alumno::find($id);
    
        if (!$alumno) {
            return response()->json([
                'error' => true,
                'mensaje' => 'No existe esa alumno',
            ]);
        }
    
        $this->authorize('ver', $alumno);
    
        return response()->json([
            'data' => $alumno,
            'mensaje' => 'Encontrada con éxito',
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Alumno $alumno)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $seccion = Alumno::find($id);

        if( isset($seccion)){

            $seccion->nombreplan = $request->nombreplan;
            $seccion->clavemuni = $request->clavemuni;
            $seccion->clavelocal = $request->clavelocal;
            $seccion->matricula = $request->matricula;
            $seccion->correo = $request->correo;
            $seccion->nombres = $request->nombres;
            $seccion->papellido = $request->papellido;
            $seccion->sapellido = $request->sapellido;
            $seccion->curp = $request->curp;
            $seccion->telcasa = $request->telcasa;
            $seccion->nacionalidad = $request->nacionalidad;
            $seccion->foliosec = $request->foliosec;
            $seccion->grado = $request->grado;
            $seccion->grupo = $request->grupo;
            $seccion->estatus = $request->estatus;
            $seccion->celular = $request->celular;
            $seccion->created_at = $request->created_at;
            $seccion->updated_at = $request->updated_at;

            if( $seccion->save()){

                return response()->json([

                    'data' => $seccion,
                    'mensaje' => " actulizada con exito ",
                ]);
            }else{

                return response()->json([
                    'error'=>true,
                    'mesnsaje'=>"No se actualizo  ",
                ]);

            }
        }else{

            return response()->json([
                'error'=>true,
                'mesnsaje'=>"No existe esa ",
            ]);

        }


    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Alumno $alumno)
    {
        //
    }



    
    public function obtenerBoletasDelAlumno($matricula)
    {
        // Crear una instancia del modelo Alumno
        $alumno = new Alumno;

        // Llamar al método obtenerBoletas
        $boletasDelAlumno = $alumno->obtenerBoletas($matricula);

        if ($boletasDelAlumno) {
            // Hacer algo con las boletas (por ejemplo, pasarlas a la vista)


            return response()->json(['boletas' =>$boletasDelAlumno]);
        } else {
            // Manejar el caso en el que el alumno no fue encontrado
            return response()->json(['mensaje' => 'Alumno no encontrado'], 404);        }
    }


}
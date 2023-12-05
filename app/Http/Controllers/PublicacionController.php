<?php

namespace App\Http\Controllers;

use App\Models\Publicacion;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Auth\Access\AuthorizationException;

class PublicacionController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $page = $request->input('page', 1); // Obtiene el número de página desde la solicitud
        $perPage = 3; // Establece la cantidad de resultados por página según tus necesidades
    
        $publicaciones = Publicacion::skip(($page - 1) * $perPage)->take($perPage)->get();
        $totalPublicaciones = Publicacion::count();
    
        return response()->json([
            'publicaciones' => $publicaciones,
            'total' => $totalPublicaciones, // Puedes devolver el total de resultados para que la vista lo utilice
            'message' => 'Solicitud Exitosa API'
        ], 200);
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
            'publicador' => 'required|string',
            'imagen' => 'required|string',

        ]);
    
        $publicacion = new Publicacion;
        $publicacion->titulo = $validatedData['titulo'];
        $publicacion->descripcion = $validatedData['descripcion'];
        $publicacion->fecha = $validatedData['fecha'];
        $publicacion->publicador = $validatedData['publicador'];
        $publicacion->imagen = $validatedData['imagen'];

        $publicacion->save();
    
        return response()->json([
            'data' => $publicacion,
            'message' => 'Publicación creada correctamente',
        ], 201); // El código 201 indica que la publicación se ha creado con éxito
    }

    /**
     * Display the specified resource.
     */
    public function show( $id)
    {
        $publicacion = Publicacion::find($id);

        if( isset($publicacion)){


            return response()->json([

                'data' => $publicacion,
                'mensaje' => "publicacion  encontrada con exito  "

                ]);

        }else{

                return response()->json([
                    'error'=>true,
                    'mesnsaje'=>"la publicacion no existe",
                ]);

            }


    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $publicacion = Publicacion::find($id);
    
        if (!isset($publicacion)) {
            return response()->json([
                'error' => true,
                'mensaje' => "No existe esa publicación",
            ]);
        }
    
        $this->authorize('update', $publicacion);
    
        // Realizar la actualización de la publicación
        $publicacion->titulo = $request->input('titulo');
        $publicacion->descripcion = $request->input('descripcion');
        $publicacion->fecha = $request->input('fecha');
        $publicacion->imagen = $request->input('imagen');

        if ($publicacion->save()) {
            return response()->json([
                'data' => $publicacion,
                'mensaje' => "Publicación actualizada con éxito",
            ]);
        } else {
            return response()->json([
                'error' => true,
                'mensaje' => "No se actualizó esa publicación",
            ]);
        }
    }
    
    /**
     * Remove the specified resource from storage.
     */
    public function destroy( $id)
    {
       
        $publicacion = Publicacion::find($id);

        if( isset($publicacion)){

            $resp = Publicacion::destroy($id);
            if($resp){

                return response()->json([
                    'data'=>$publicacion,
                    'mesnsaje'=>"se borro la publicacion exitosamente",
                ]);
            }else{
                return response()->json([
                    'data'=>$publicacion,
                    'mesnsaje'=>"la publicacion no existe",
                ]);

            }

        }else{

                return response()->json([
                    'error'=>true,
                    'mesnsaje'=>"la publicacion no existe",
                ]);

            }

    }
}

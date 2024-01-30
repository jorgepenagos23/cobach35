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
        $perPage = 3; // resuultaods per page por pagina 
    
        $publicaciones = Publicacion::orderBy('fecha', 'desc')
            ->skip(($page - 1) * $perPage)
            ->take($perPage)
            ->get();
    
        $totalPublicaciones = Publicacion::count();
    
        return response()->json([
            'publicaciones' => $publicaciones,
            'total' => $totalPublicaciones, // Puedes devolver el total de resultados para que la vista lo utilice
            'message' => 'Solicitud Exitosa API'
        ], 200);
    }

    
    


public function indexConSecciones()
{
    // Lógica para obtener publicaciones con información de secciones y subsecciones
    $publicaciones = Publicacion::with(['seccion', 'subseccion'])->get();

    return response()->json($publicaciones);
}



    
    public function store(Request $request)
    {
        $request->validate([
            'titulo' => 'required|string',
            'descripcion' => 'required|string',
            'fecha' => 'required|date',
            'publicador' => 'required|string',
            'imagenFile' => 'required|mimetypes:image/jpeg,image/png,image/jpg,image/gif,video/mp4|max:29480', // admite imágenes (jpeg, png, jpg, gif) y videos (mp4)

        ]);

        $publicacion = new Publicacion();
        $publicacion->titulo = $request->titulo;
        $publicacion->descripcion = $request->descripcion;
        $publicacion->fecha = $request->fecha;
        $publicacion->publicador = $request->publicador;

        // Manejo de la imagen
        if ($request->hasFile('imagenFile')) {
            $imagenFile = $request->file('imagenFile');
            $imagenNombre = time() . '.' . $imagenFile->getClientOriginalExtension();
            $imagenRuta = public_path('/images/publicaciones/');
            $imagenFile->move($imagenRuta, $imagenNombre);
            $publicacion->imagen = '/images/publicaciones/' . $imagenNombre;
        }

        $publicacion->save();

        return response()->json($publicacion, 201);
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

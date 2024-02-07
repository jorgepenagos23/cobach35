<?php

namespace App\Http\Controllers;

use App\Models\Publicacion;
use App\Models\Seccion;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Auth\Access\AuthorizationException;
use Illuminate\Support\Facades\Cache;
class PublicacionController extends Controller
{
    
     
    public function index(Request $request)
    {
        $page = $request->input('page', 1);
        $perPage = 3;
    
        $cacheKey = 'publicaciones_' . $page;
        $publicaciones = Cache::remember($cacheKey, 300, function () use ($page, $perPage) {
            // Esta función se ejecutará solo si los datos no están en caché o han expirado (300 segundos = 5 minutos)
            return Publicacion::orderBy('fecha', 'desc')
                ->skip(($page - 1) * $perPage)
                ->take($perPage)
                ->get();
        });
    
        $totalPublicaciones = Cache::remember('total_publicaciones', 300, function () {
            // También puedes cachear el total de publicaciones si es necesario
            return Publicacion::count();
        });
    
        return response()->json([
            'publicaciones' => $publicaciones,
            'total' => $totalPublicaciones,
            'message' => 'Solicitud Exitosa API'
        ], 200);
    }
    
    


public function indexConSecciones()
{
    // Lógica para obtener publicaciones con información de secciones y subsecciones
    $publicaciones = Publicacion::with(['seccion', 'subseccion'])->get();

    return response()->json($publicaciones);
}

public function indexConSecciones2()
{
    // Obtener todas las publicaciones con información de secciones y subsecciones
    $publicaciones = Publicacion::with(['seccion', 'subseccion'])->get();

    // Obtener todas las secciones
    $secciones = Seccion::all();

    // Retornar un arreglo asociativo con las publicaciones y las secciones
    return response()->json([
        'publicaciones' => $publicaciones,
        'secciones' => $secciones,
    ]);
}

public function indexConSecciones3()
{
    // Obtener todas las publicaciones con información de secciones y subsecciones

    // Obtener todas las secciones
    $secciones = Seccion::all();

    // Retornar un arreglo asociativo con las publicaciones y las secciones
    return response()->json([
        'secciones' => $secciones,
    ]);
}



public function store(Request $request)
{
    $request->validate([
        'titulo' => 'required|string',
        'descripcion' => 'required|string',
        'fecha' => 'required|date',
        'publicador' => 'required|string',
        'imagenFile' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
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

    // Verificar si seccion_id está presente y no es nulo antes de asignarlo
    if ($request->has('seccion_id') && $request->input('seccion_id') !== null) {
        $publicacion->seccion_id = $request->input('seccion_id');
    }

    // Verificar si subseccion_id está presente y no es nulo antes de asignarlo
    if ($request->has('subseccion_id') && $request->input('subseccion_id') !== null) {
        $publicacion->subseccion_id = $request->input('subseccion_id');
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

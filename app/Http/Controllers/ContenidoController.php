<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreContenidoRequest;
use App\Http\Requests\UpdateContenidoRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

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
            'message' => 'Contenido devueltas',
            'contenido' => $contenido,
        ], 200);
    }

    public function edit(Contenido $contenido)
    {
        return response()->json([
            'message' => 'Contenido para editar',
            'contenido' => $contenido,
        ], 200);
    }




    
    public function update(Request $request, $id)
    {
    Log::info('Datos del Request:', $request->all());
        $contenido = Contenido::findOrFail($id);    
        if (!$contenido) {
            return response()->json([
                'error' => true,
                'mensaje' => "No existe ese contenido",
            ]);
        }
    
        $this->authorize('update', $contenido);
    
        $request->validate([
            'titulo' => 'required',
            'descripcion' => 'required',
            'fecha' => 'required',
            'imagenFile' => 'image|mimes:jpeg,png,jpg,gif|max:2048', // Ajusta según tus necesidades
        ]);

    
        $contenido->titulo = $request->input('titulo');
        $contenido->descripcion = $request->input('descripcion');
        $contenido->fecha = $request->input('fecha');


        if ($request->hasFile('imagenFile')) {
            $imagenPath = $request->file('imagenFile')->storeAs('public/images/contenidos', 'nombre_personalizado.jpg');
            $contenido->imagen = str_replace('public/', '', $imagenPath);
        }
        
        if ($contenido->save()) {
            return response()->json([
                'data' => $contenido,
                'mensaje' => "Contenido actualizado con éxito",
            ]);
        } else {
            return response()->json([
                'error' => true,
                'mensaje' => "No se actualizó ese contenido",
            ]);
        }
    }
    








    public function destroy( $id)
    {
       
        $contenido = Contenido::find($id);

        if( isset($contenido)){

            $resp = Contenido::destroy($id);
            if($resp){

                return response()->json([
                    'data'=>$contenido,
                    'message' => 'Contenido eliminado exitosamente',
                ]);
            }else{
                return response()->json([
                    'data'=>$contenido,
                    'mesnsaje'=>"el contenido  no existe",
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

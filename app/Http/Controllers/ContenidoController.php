<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Storage;
use App\Http\Requests\StoreContenidoRequest;
use App\Http\Requests\UpdateContenidoRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\File;
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
        $contenido = Contenido::findOrFail($id);

        Log::info('Datos del Request:', $request->all());
        $contenido->titulo = $request->input('titulo');
        $contenido->descripcion = $request->input('descripcion');
        $contenido->fecha = $request->input('fecha');
        // Guarda el modelo en la base de datos
        $contenido->save();


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
    public function formSubmit(Request $request)
    {
        $id = $request->input('id'); // Obtén el ID desde el cuerpo de la solicitud
    
        $imageName = time().'.'.$request->image->getClientOriginalExtension();
    
        $request->image->move(public_path('images'), $imageName);
    
        // Actualiza la ruta de la imagen y otros campos según sea necesario utilizando el ID
        $contenido = Contenido::findOrFail($id);
        $contenido->imagen = '/public/images/' . $imageName;
        // ... actualiza otros campos si es necesario ...
        $contenido->save();
    
        return response()->json(['success'=>'You have successfully upload image.']);
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

<?php

namespace App\Http\Controllers;

use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Intervention\Image\Facades\Image;

class ImagenController extends Controller
{
    //Funcion para procesar imagenes
    public function store(Request $request){
        $imagen = $request->file('file');
        // Se genera un ID único para la imagen
        $nombreImagen = Str::uuid() . '.' . $imagen->extension();
        
        // Procesa la imagen
        $imagenServidor = Image::make($imagen);
        // Recorta la imagen
        $imagenServidor->fit(1000, 1000);

        $imagenPath = public_path('uploads') . '/' . $nombreImagen;
        $imagenServidor->save($imagenPath);
 
        return response()->json([
            'imagen' => $nombreImagen
        ]);
    }
}

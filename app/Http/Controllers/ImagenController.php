<?php

namespace App\Http\Controllers;

use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Intervention\Image\Facades\Image;

class ImagenController extends Controller
{
    //Metodo para procesar la imagen
    public function store(Request $request)
    {
        $imagen = $request->file('file');
        $nombreImagen = Str::uuid() . '.' . $imagen->extension();


        //Utilizar Intervention Image para redimensionar la imagen

        $imagenServidor = Image::make($imagen)->fit(1000, 1000);

        //Guardar la imagen en el servidor
        $imagenPath = public_path('uploads/') . $nombreImagen;
        $imagenServidor->save($imagenPath);
        return response()->json(['imagen' => $nombreImagen]);
    }
}

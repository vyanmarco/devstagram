<?php

namespace App\Http\Controllers;

use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Intervention\Image\Facades\Image;

class ImagenController extends Controller
{
    public function store(Request $request){
        
        //Recuperamos la imagen desde el reques
        $imagen = $request->file('file');

        //Asignamos un nombre unico a la imagen
        $nombreImagen = Str::uuid() . "." . $imagen->extension();

        //Creamos la imagen en una variable
        $imagenServidor = Image::make($imagen);

        //Decimos que la imagen mide 1000 x 1000
        $imagenServidor->fit('1000', '1000');

        //Ruta donde se almacena la imagen con su nombre unico
        $imagePath = public_path('uploads'). "/" . $nombreImagen;

        //Guardamos la foto en la carpeta seleccionada
        $imagenServidor->save($imagePath);

        return response()->json(['imagen' => $nombreImagen]);
    }
}

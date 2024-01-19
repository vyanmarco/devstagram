<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Intervention\Image\Facades\Image;

class PerfilController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index(User $user){
        return view('perfil.index', [
            'user' => $user
        ]);
    }
    
    public function store(Request $request){
        
        //Modificar el request y pasarlo limpio de espacios y caracteres raros
        $request->request->add(['username' => Str::slug($request->username)]);

        //Validar los imputs
        $this->validate($request, [
            'username' => ['unique:users,username,'. auth()->user()->id, 'required', 'min:3', 'max:20', 'not_in:editar-perfil']
        ]);
        
        
        //Si existe una imagen
        if($request->imagen){
            
            //Recuperamos la imagen desde el reques
            $imagen = $request->file('imagen');

            //Asignamos un nombre unico a la imagen
            $nombreImagen = Str::uuid() . "." . $imagen->extension();

            //Creamos la imagen en una variable
            $imagenServidor = Image::make($imagen);

            //Decimos que la imagen mide 1000 x 1000
            $imagenServidor->fit('1000', '1000');

            //Ruta donde se almacena la imagen con su nombre unico
            $imagePath = public_path('perfiles'). "/" . $nombreImagen;

            //Guardamos la foto en la carpeta seleccionada
            $imagenServidor->save($imagePath);

        }

        //Guardar cambios
        $usuario = User::find(auth()->user()->id);

        $usuario->username = $request->username;
        
        //Guardar imagen o dejarlo vacio
        $usuario->imagen = $nombreImagen ?? auth()->user()->imagen ?? null;
        
        $usuario->save();

        return redirect()->route('post.index', $usuario->username)->with('success', 'Los cambios han sido guardados exitosamente!');

    }
}

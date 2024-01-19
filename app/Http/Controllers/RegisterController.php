<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class RegisterController extends Controller
{
    public function index(){

        if(Auth()->user()){
            return redirect()->route('post.index', Auth()->user()->username);
        }

        return view('auth.register');
    }

    public function store(Request $request){

        //Pasar el username limpio de espacios y tildes, y convertirlo en enlace amigable
        $request->request->add([
            'username' => Str::slug($request->username)
        ]);

        //Validar y limpiar los datos del form
        $this->validate($request, [
            'name' => 'required|min:5|max:30',
            'username' => 'required|min:8|max:30|unique:users',
            'email' => 'required|unique:users|max:60|email',
            'password' => 'required|min:6|confirmed'
        ]);

        //Crear el usuario
        User::create([
            'name' => $request->name,
            'username' => $request->username,
            'email' => $request->email,
            'password' => Hash::make($request->password)
        ]);

        //Autenticar usuario
        Auth()->attempt($request->only('email', 'password'));

        //Redireccionar al muro
        return redirect()->route('post.index', Auth()->user()->username);
    }
}

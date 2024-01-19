<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    public function index(){

        if(Auth()->user()){
            return redirect()->route('post.index', Auth()->user()->username);
        }

        return view('auth.login');
    }

    //Validar los datos de inicio de sesión
    public function store(Request $request){
        $this->validate($request, [
            'email' => 'required|email',
            'password' => 'required'
        ]);

        //Si no son correctos y no autentifican se devulve al login con mensaje de error
        if(!auth()->attempt($request->only('email', 'password'), $request->remember)){
            return back()->with('mensaje', 'Credenciales Incorrectas');
        }

        //Si son correctos los datos se redirige al controlador encargado de mostrar el muro
        return redirect()->route('post.index', auth()->user()->username);
    }
}

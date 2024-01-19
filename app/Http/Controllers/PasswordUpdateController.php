<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules\Password;

class PasswordUpdateController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index(){

        $user = User::find(auth()->user()->id);

        return view('password.index', [
            'user' => $user
        ]);
    }

    public function store(Request $request){

        $this->validate($request, [
            'validate_password' => 'required',
            'password' => ['required', 'confirmed', Password::min(5)->mixedCase()->numbers()->symbols()->uncompromised()]
        ]);

        $validate_password = Hash::check($request->validate_password, auth()->user()->password);

        if($validate_password){
            
            $user = User::find(auth()->user()->id);

            $user->password = Hash::make($request->password);

            $user->save();

            return redirect()->route('post.index', auth()->user()->username)->with('success', 'Contraseña cambiada con exito!');

        }else{
            
            return back()->with('error', 'la contraseña actual no es la correcta, vuelve a intentarlo');
        }

    }
}

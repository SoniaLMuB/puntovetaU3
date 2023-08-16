<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use RealRashid\SweetAlert\Facades\Alert;

class LoginController extends Controller
{
    //Funcion para redireccionar a la vista de login
    public function index(){
        return view('auth.login');
    }

    //Funcion para autentificar al usuario
    public function store(Request $request){
        $this->validate($request, [
            'email' => 'required|email',
            'password' => 'required'
        ]);

        // Condicion para saber si el user se pudo autenticar
        if (!auth()->attempt($request->only('email', 'password'), $request->remember)) {
            // back() para volver a la pagina anterior, en este caso, con un mensaje
            return back()->with('errors', 'Credenciales Incorrectas');
        }

        $status= User::where('email',$request->email)->select('status')->first();

        if($status->status==0){
            return back()->with('errors', 'El usuario está incativo');
        }

        // Redirecciona
        return redirect()->route('post.index');
    }
}

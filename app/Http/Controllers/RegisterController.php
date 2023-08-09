<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use RealRashid\SweetAlert\Facades\Alert;

class RegisterController extends Controller
{
    //Funcion para retornar la vista de registro
    public function index()
    {
        return view('auth.register');
    }

    //Funcion para registrar usuarios en la base de datos
    public function store(Request $request)
    {
        //Validaciones de los campos
        $this->validate($request, [
            'nombre' => 'required',
            'username' => 'required',
            'email' => 'required|email',
            'password' => 'required'
        ]);

        // Se agrega el campo 'username' en Models/User.php filleable para que espere ese campo también
        User::create([
            'name' => $request->nombre,
            'username' => $request->username,
            'email' => $request->email,
            'password' => Hash::make($request->password), // Hash::make para encriptar la password

        ]);

        // Otra forma de autenticar
        auth()->attempt($request->only('email', 'password'));

        return redirect()->route('login')->with('success','El usuario se ha creado correctamente');
    }
}
<?php

namespace App\Http\Controllers;

use App\Models\Cliente;
use Illuminate\Http\Request;

class ClientesController extends Controller
{
    //Constructor para validar usuario autentificado
    public function __construct()
    {
        // Para verificar que el user este autenticado
        // except() es para indicar cuales metodos pueden usarse sin autenticarse
        $this->middleware('auth');
    }

    //Funcion para retornar a la vista de clientes
    public function index(){
        return view('clientes.cliente');
    }

    //Funcion para retornar la vista de agregar clientes
    public function create(){
        return view('clientes.newCliente');
    }

    //Funcion para registrar marcas en la tabla
    public function store(Request $request)
    {
        //Validaciones de formulario
        $this->validate($request, [
            'nombre' => 'required',
            'codigo' => 'required',
            'email' => 'required|unique:customers|min:3|max:20',
            'telefono' => 'required|min:10|max:10',
            'imagen' => 'required'
        ]);
        //Se hace el registro en la tabla de marcas
        Cliente::create([
            'nombre' => $request->nombre,
            'codigo' => $request->codigo,
            'empresa' => $request->empresa,
            'telefono' => $request->telefono,
            'imagen' => $request->imagen
        ]);
        //Se retorna a la vista de marcas
        return redirect()->route('clientes.index');
    }
}

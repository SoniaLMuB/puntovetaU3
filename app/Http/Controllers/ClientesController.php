<?php

namespace App\Http\Controllers;

use App\Models\Cliente;
use App\Models\Country;
use Illuminate\Http\Request;
use RealRashid\SweetAlert\Facades\Alert;

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
        $clientes=Cliente::all();
        return view('clientes.cliente',['clientes'=>$clientes]);
    }

    //Funcion para retornar la vista de agregar clientes
    public function create(){
        $paises = Country::all();
        return view('clientes.newCliente',["paises"=>$paises]);
    }

    //Funcion para registrar los clientes en la tabla
    public function store(Request $request)
    {
        //Validaciones de formulario
        $this->validate($request, [
            'nombre' => 'required',
            'codigo' => 'required',
            'empresa' => 'required',
            'email' => 'required|email|min:3',
            'telefono' => 'required|min:10|max:10',
            'pais' => 'required',
            'ciudad' => 'required',
            'descripcion' => 'required',
            'imagen' => 'required'
        ]);
        //Se hace el registro en la tabla de clientes
        Cliente::create([
            'nombre' => $request->nombre,
            'codigo' => $request->codigo,
            'empresa' => $request->empresa,
            'email' => $request->email,
            'telefono' => $request->telefono,
            'pais_id' => $request->pais,
            'imagen' => $request->imagen,
            'descripcion' => $request->descripcion,
            'ciudad' => $request->ciudad,
        ]);
        //Se retorna a la vista de clientes
        return redirect()->route('clientes.index')->with('success','El cliente se ha creado correctamente');
    }

    //Ruta para retornar la vista de editar cliente
    public function edit($id_cliente){
        //Se busca el cliente mediante el ID
        $cliente= Cliente::where('id',$id_cliente)->get();
        //dd($cliente);
        $paises = Country::all();
        //Se retorna a la vista
        return view('clientes.editcliente',["cliente"=>$cliente,"paises"=>$paises]);
    }

    //Función para actualizar los datos del cliente en la base de datos
    public function update(Request $request)
    {
        //Validaciones de formulario
        $this->validate($request, [
            'nombre' => 'required',
            'codigo' => 'required',
            'empresa' => 'required',
            'email' => 'required|email|min:3|max:20',
            'telefono' => 'required|min:10|max:10',
            'pais' => 'required',
            'ciudad' => 'required',
            'descripcion' => 'required',
            'imagen' => 'required'
        ]);
        //Actualizacion de datos
        Cliente::where('id', $request->id)->update([
            'nombre' => $request->nombre,
            'codigo' => $request->codigo,
            'empresa' => $request->empresa,
            'email' => $request->email,
            'telefono' => $request->telefono,
            'pais_id' => $request->pais,
            'imagen' => $request->imagen,
            'ciudad' => $request->ciudad,
            'descripcion' => $request->descripcion
        ]);
        //Se retorna a la vista de clientees
        return redirect()->route('clientes.index')->with('success','El cliente se ha actualizado correctamente');
    }

    //Funcion para eliminar el cliente
    public function delete($id_cliente)
    {
        //Se busca el cliente en el modelo y se elimina
        Cliente::find($id_cliente)->delete();
        return redirect()->route('clientes.index')->with('success','El cliente se ha eliminado correctamente');
    }
}

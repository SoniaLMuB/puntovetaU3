<?php

namespace App\Http\Controllers;

use App\Models\Marca;
use Illuminate\Http\Request;

class MarcasController extends Controller
{
    //Constructor para validar usuario autentificado
    public function __construct()
    {
        // Para verificar que el user este autenticado
        // except() es para indicar cuales metodos pueden usarse sin autenticarse
        $this->middleware('auth');
    }

    //Funcion para retornar a la vista de marcas
    public function index()
    {
        $marcas = Marca::all();
        return view('branch.branch', ['marcas' => $marcas]);
    }
    //Funcion para retornar la vista de registro de marcas
    public function create()
    {
        return view('branch.newBranch');
    }

    //Funcion para registrar marcas en la tabla
    public function store(Request $request)
    {
        //Validaciones de formulario
        $this->validate($request, [
            'nombre' => 'required',
            'descripcion' => 'required',
            'imagen' => 'required'
        ]);
        //Se hace el registro en la tabla de marcas
        Marca::create([
            'nombre' => $request->nombre,
            'descripcion' => $request->descripcion,
            'imagen' => $request->imagen
        ]);
        //Se retorna a la vista de marcas
        return redirect()->route('marcas.index');
    }

    //Funcion para retornar a la vista de retornar marca
    public function view($id_marca)
    {
        $marcas = Marca::find($id_marca)->get();
        return view('branch.editBranch', ['marcas' => $marcas]);
    }

    //Función para actualizar los datos de la marca en la base de datos
    public function update(Request $request)
    {
        //Validaciones de formulario
        $this->validate($request, [
            'nombre' => 'required',
            'descripcion' => 'required',
            'imagen' => 'required'
        ]);

        //Actualizacion de datos
        Marca::where('id', $request->id)->update([
            'nombre' => $request->nombre,
            'descripcion' => $request->descripcion,
            'imagen' => $request->imagen
        ]);

        //Se retorna a la vista de marcas
        return redirect()->route('marcas.index');
    }

    //Funcion para eliminar la marca
    public function delete($id_marca)
    {
        //Se busca la categoria en el modelo y se elimina
        Marca::find($id_marca)->delete();
        return redirect()->route('marcas.index');

    }
}
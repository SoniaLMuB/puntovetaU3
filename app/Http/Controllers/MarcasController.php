<?php

namespace App\Http\Controllers;

use App\Models\Marca;
use Illuminate\Http\Request;

class MarcasController extends Controller
{
    //Funcion para retornar a la vista de marcas
    public function index(){
        $marcas=Marca::all();
        return view('branch.branch',['marcas'=>$marcas]);
    }
    //Funcion para retornar la vista de registro de marcas
    public function create(){
        return view('branch.newBranch');
    }

    //Funcion para registrar marcas en la tabla
    public function store(Request $request){
        //Validaciones de formulario
        $this->validate($request,[
            'nombre'=>'required',
            'descripcion'=>'required',
            'imagen'=>'required'
        ]);
        //Se hace el registro en la tabla de marcas
        Marca::create([
            'nombre'=>$request->nombre,
            'descripcion'=>$request->descripcion,
            'imagen'=>$request->imagen
        ]);
        //Se retorna a la vista de marcas
        return redirect()->route('marcas.index');
    }
}

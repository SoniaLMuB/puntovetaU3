<?php

namespace App\Http\Controllers;

use App\Models\Categoria;
use Illuminate\Http\Request;
use RealRashid\SweetAlert\Facades\Alert;

class CategoriasController extends Controller
{
    //Constructor para validar usuario autentificado
    public function __construct()
    {
        // Para verificar que el user este autenticado
        // except() es para indicar cuales metodos pueden usarse sin autenticarse
        $this->middleware('auth');
    }
    
    //Funcion para retornar la vista de categorias
    public function index(){
        $categorias=Categoria::all();
        return view('categories.categories',['categorias'=>$categorias]);
    }
    //Funcion para retornar la funcion de registrar categorias
    public function create(){
        return view('categories.newCategories');
    }

    //Ruta para registrar categorias en la base de datos
    public function store(Request $request){
        //Validaciones de formulario
        $this->validate($request,[
            'nombre'=>'required',
            'codigo'=>'required|unique:categorias',
            'descripcion'=>'required',
            'imagen'=>'required'
        ]);
        //Insercion a la tabla categorias de la base de datos
        Categoria::create([
            'nombre'=>$request->nombre,
            'codigo'=>$request->codigo,
            'descripcion'=>$request->descripcion,
            'imagen'=>$request->imagen,
            'creado_por'=>auth()->user()->username
        ]);

        return redirect()->route('categorias.index')->with('success','La categoría se ha creado correctamente');
    }

    //Ruta para retornar a la vista de editar categoria
    public function edit($id_categoria){
        $categoria=Categoria::find($id_categoria);
        return view('categories.editCategory',['dato'=>$categoria]);
    }
    //Funcion para actualizar la categoria
    public function update(Request $request){
        //Validaciones de formulario
        $this->validate($request,[
            'nombre'=>'required',
            'codigo'=>'required|unique:categorias,codigo,'.$request->id,
            'descripcion'=>'required',
            'imagen'=>'required'
        ]);
        //Actualizacion de datos
        Categoria::where('id',$request->id)->update([
            'nombre'=>$request->nombre,
            'codigo'=>$request->codigo,
            'descripcion'=>$request->descripcion,
            'imagen'=>$request->imagen,
            'creado_por'=>auth()->user()->username
        ]);
        return redirect()->route('categorias.index')->with('success','La categoría se ha actualizado correctamente');

    }

    //Funcion para eliminar categorias
    public function delete($id_categoria){
        //Se busca la categoria en el modelo y se elimina
        Categoria::find($id_categoria)->delete();
        return redirect()->route('categorias.index')->with('success','La categoría se ha eliminado correctamente');

    }
}

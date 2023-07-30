<?php

namespace App\Http\Controllers;

use App\Models\Categoria;
use App\Models\Subcategoria;
use Illuminate\Http\Request;
use RealRashid\SweetAlert\Facades\Alert;

class subCategoriaController extends Controller
{
    //Constructor para validar usuario autentificado
    public function __construct()
    {
        // Para verificar que el user este autenticado
        // except() es para indicar cuales metodos pueden usarse sin autenticarse
        $this->middleware('auth');
    }

    //Funcion para retornar la vista de subCategorias
    public function index()
    {
        $subCategorias = Subcategoria::all();
        foreach ($subCategorias as $dato) {
            $datos = $dato->categoria_id;
        }
        $subCategorias = Subcategoria::with('categorias')->get();
        return view('subCategories.subCategories', ['subCategorias' => $subCategorias]);
    }

    //Funcion para retornar a la vista de añadir subcategoria
    public function create()
    {
        $categorias = Categoria::all();
        return view('subCategories.newSubCategory', ['categorias' => $categorias]);
    }
    //Funcion para crear la subcategoria en la base de datos
    public function store(Request $request)
    {
        //Validaciones de formulario
        $this->validate($request, [
            'nombre' => 'required',
            'categoria' => 'required',
            'codigo' => 'required',
            'descripcion' => 'required',
            'imagen' => 'required'
        ]);
        //Insercion a la tabla categorias de la base de datos
        Subcategoria::create([
            'nombre' => $request->nombre,
            'categoria_id' => $request->categoria,
            'codigo' => $request->codigo,
            'descripcion' => $request->descripcion,
            'imagen' => $request->imagen,
            'creado_por' => auth()->user()->username
        ]);

        return redirect()->route('subCategoria.index')->with('success','La Subcategoría se ha creado correctamente');
    }

    //Funcion para retornar la vista de editar subcategoria
    public function view($id_subcategoria)
    {
        $subcategorias = Subcategoria::with('categorias')
            ->where('id', $id_subcategoria)
            ->get();
        $categorias = Categoria::all();
        return view('subCategories.editSubCategory', ['subcategorias' => $subcategorias, 'categorias' => $categorias]);
    }
    //Funcion para actualizar los datos de la subcategoria
    public function update(Request $request)
    {
        //Validaciones de formulario
        $this->validate($request, [
            'nombre' => 'required',
            'categoria' => 'required',
            'codigo' => 'required',
            'descripcion' => 'required',
            'imagen' => 'required'
        ]);

        //Actualizacion de datos
        Subcategoria::where('id', $request->id)->update([
            'nombre' => $request->nombre,
            'categoria_id' => $request->categoria,
            'codigo' => $request->codigo,
            'descripcion' => $request->descripcion,
            'imagen' => $request->imagen,
            'creado_por' => auth()->user()->username
        ]);

        return redirect()->route('subCategoria.index')->with('success','La Subcategoría se ha actualizado correctamente');

    }

    //Funcion para eliminar una subcategoria
    public function delete($id_subcategoria)
    {
        //Se busca la categoria en el modelo y se elimina
        Subcategoria::find($id_subcategoria)->delete();
        return redirect()->route('subCategoria.index')->with('success','La Subcategoría se ha eliminado correctamente');

    }
}
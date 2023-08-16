<?php

namespace App\Http\Controllers;

use App\Models\Marca;
use Illuminate\Http\Request;
use RealRashid\SweetAlert\Facades\Alert;

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
        return redirect()->route('marcas.index')->with('success', 'La marca se ha creado correctamente');
    }

    //Funcion para retornar a la vista de retornar marca
    public function view($id_marca)
    {
        $marcas = Marca::find($id_marca);
        return view('branch.editBranch', ['marca' => $marcas]);
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
        return redirect()->route('marcas.index')->with('success', 'La marca se ha actualizado correctamente');
    }

    //Funcion para eliminar la marca
    public function delete($id_marca)
    {
        try {
            $marca = Marca::findOrFail($id_marca);
            $marca->delete();
            // Redirige de regreso con un mensaje de éxito
            return redirect()->route('marcas.index')
                ->with('success', 'La marca se ha eliminado correctamente');
        } catch (\Exception $e) {
            // En caso de error, redirige de regreso con un mensaje de error
            return redirect()->route('marcas.index')
                ->with('error', 'Hubo un error al eliminar la marca');
        }
    }
}
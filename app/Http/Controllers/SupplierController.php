<?php

namespace App\Http\Controllers;

use App\Models\Supplier;
use Illuminate\Http\Request;

class SupplierController extends Controller
{
    //Constructor para validar usuario autentificado
    public function __construct()
    {
        // Para verificar que el user este autenticado
        // except() es para indicar cuales metodos pueden usarse sin autenticarse
        $this->middleware('auth');
    }

    //Funcion para retornar a la vista de proveedores
    public function index(){
        $proveedores=Supplier::all();
        return view('suppliers.suppliers',['proveedores'=>$proveedores]);
    }

    //Funcion para retornar la vista de agregar proveedores
    public function create(){
        return view('suppliers.newSupplier');
    }

    //Funcion para agregar un proveedor a la base de datos
    public function store(Request $request){
        // Se validan los formularios
        $this->validate($request,[
            'nombre'=>'required',
            'codigo'=>'required',
            'telefono'=>'required',
            'email'=>'required|email',
            'imagen'=>'required'
        ]);
        //Se añade el registro a la base de datos
        Supplier::create([
            'nombre'=>$request->nombre,
            'codigo'=>$request->codigo,
            'telefono'=>$request->telefono,
            'email'=>$request->email,
            'imagen'=>$request->imagen
        ]);

        return redirect()->route('supplier.index');

    }

    //Ruta para retornar la vista de editar proveedor
    public function edit($id_proveedor){
        //Se busca el proveedor mediante el ID
        $proveedor= Supplier::find($id_proveedor)->get();
        //Se retorna a la vista
        return view('suppliers.editSupplier',["proveedor"=>$proveedor]);
    }

        //Función para actualizar los datos del proveedor en la base de datos
        public function update(Request $request)
        {
            //Validaciones de formulario
            $this->validate($request, [
                'nombre' => 'required',
                'codigo' => 'required',
                'telefono'=>'required',
                'email'=>'required|email',
                'imagen' => 'required'
            ]);
    
            //Actualizacion de datos
            Supplier::where('id', $request->id)->update([
                'nombre'=>$request->nombre,
                'codigo'=>$request->codigo,
                'telefono'=>$request->telefono,
                'email'=>$request->email,
                'imagen'=>$request->imagen
            ]);
    
            //Se retorna a la vista de proveedores
            return redirect()->route('supplier.index');
        }

        //Funcion para eliminar el proveedor
        public function delete($id_proveedor)
        {
            //Se busca el proveedor en el modelo y se elimina
            Supplier::find($id_proveedor)->delete();
            return redirect()->route('supplier.index');
    
        }
}
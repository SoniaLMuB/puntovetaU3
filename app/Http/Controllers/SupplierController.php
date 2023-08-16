<?php

namespace App\Http\Controllers;

use App\Models\Country;
use App\Models\Supplier;
use Illuminate\Http\Request;
use RealRashid\SweetAlert\Facades\Alert;

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
        $paises = Country::all();
        return view('suppliers.newSupplier',["paises"=>$paises]);
    }

    //Funcion para agregar un proveedor a la base de datos
    public function store(Request $request){
        // Se validan los formularios
        $this->validate($request,[
            'nombre'=>'required',
            'codigo'=>'required|unique:suppliers',
            'telefono'=>'required',
            'email'=>'required|email',
            'imagen'=>'required',
            'ciudad'=>'required',
            'descripcion' => 'required',
            'pais'=>'required'
        ]);
        //Se añade el registro a la base de datos
        Supplier::create([
            'nombre'=>$request->nombre,
            'codigo'=>$request->codigo,
            'telefono'=>$request->telefono,
            'email'=>$request->email,
            'imagen'=>$request->imagen,
            'pais_id'=>$request->pais,
            'descripcion' => $request->descripcion,
            'ciudad'=>$request->ciudad
        ]);

        return redirect()->route('supplier.index')->with('success','El proveedor se ha creado correctamente');

    }

    //Ruta para retornar la vista de editar proveedor
    public function edit($id_proveedor){
        //Se busca el proveedor mediante el ID
        $proveedor= Supplier::with('pais')->find($id_proveedor);
        $paises = Country::all();

        //Se retorna a la vista
        return view('suppliers.editSupplier',["proveedor"=>$proveedor,"paises"=>$paises]);
    }

        //Función para actualizar los datos del proveedor en la base de datos
        public function update(Request $request)
        {
            //Validaciones de formulario
            $this->validate($request, [
                'nombre' => 'required',
                'codigo' => 'required|unique:suppliers,codigo,'.$request->id,
                'telefono'=>'required',
                'email'=>'required|email',
                'pais'=>'required',
                'ciudad'=>'required',
                'descripcion' => 'required',
                'imagen' => 'required'
            ]);
    
            //Actualizacion de datos
            Supplier::where('id', $request->id)->update([
                'nombre'=>$request->nombre,
                'codigo'=>$request->codigo,
                'telefono'=>$request->telefono,
                'email'=>$request->email,
                'pais_id'=>$request->pais,
                'ciudad'=>$request->ciudad,
                'imagen'=>$request->imagen,
                'descripcion' => $request->descripcion
            ]);
    
            //Se retorna a la vista de proveedores
            return redirect()->route('supplier.index')->with('success','El proveedor se ha actualizado correctamente');
        }

        //Funcion para eliminar el proveedor
        public function delete($id_proveedor)
        {
            //Se busca el proveedor en el modelo y se elimina
            Supplier::find($id_proveedor)->delete();
            return redirect()->route('supplier.index')->with('success','El proveedor se ha eliminado correctamente');
    
        }
}
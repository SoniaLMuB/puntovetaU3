<?php

namespace App\Http\Controllers;

use App\Models\Categoria;
use App\Models\Marca;
use App\Models\Producto;
use Illuminate\Http\Request;
use RealRashid\SweetAlert\Facades\Alert;

class ProductosController extends Controller
{
        //Constructor para validar usuario autentificado
    public function __construct()
    {
        // Para verificar que el user este autenticado
        // except() es para indicar cuales metodos pueden usarse sin autenticarse
        $this->middleware('auth');
    }
    //Funcion para retornar la vista de productos
    public function index(){
        $productos=Producto::all();
        $title = 'Delete User!';
        $text = "Are you sure you want to delete?";
        confirmDelete($title, $text);
        
        return view('products.products',["productos"=>$productos]);
    }

    //Funcion para retornar la vista de agregar productos
    public function create(){
        $marcas=Marca::all();
        $categorias=Categoria::all();
        return view('products.newProducts',["marcas"=>$marcas,"categorias"=>$categorias]);
    }

    //Funcion para registrar productos en la base de datos
    public function store(Request $request){
        //Validaciones de formulario
        $this->validate($request,[
            'nombre'=>'required',
            'codigo'=>'required',
            'precio_venta'=>'required',
            'precio_compra'=>'required',
            'stock'=>'required',
            'categoria'=>'required',
            'subcategoria'=>'required',
            'marca'=>'required',
            'imagen'=>'required'
        ]);
       
        //Se hace el registro a la base de datos
        Producto::create([
            'nombre'=>$request->nombre,
            'codigo'=>$request->codigo,
            'creado_por'=>auth()->user()->username,
            'categoria_id'=>$request->categoria,
            'marca_id'=>$request->marca,
            'subcategoria_id'=>$request->subcategoria,
            'stock'=>$request->stock,
            'precio_venta'=>$request->precio_venta,
            'precio_compra'=>$request->precio_compra,
            'imagen'=>$request->imagen
        ]);

        return redirect()->route('productos.index')->with('success','El producto fue creado correctamente');
    }

    //Funcion para retornar la vista de detalle producto
    public function view($id_producto){
        $producto = Producto::with('marca', 'categoria')->find($id_producto);
        return view('products.viewProduct',['producto'=>$producto]);
    }

    //Funcion para retornar a la vista de actualizar producto
    public function edit($id_producto){
        $producto = Producto::with('marca', 'categoria')->find($id_producto);
        $marcas=Marca::all();
        $categorias=Categoria::all();
        return view('products.editProduct',['producto'=>$producto,'marcas'=>$marcas,'categorias'=>$categorias]);
    }

    //Funcion para actualizar el producto
    public function update(Request $request){
        //Validaciones de formulario
        $this->validate($request,[
            'nombre'=>'required',
            'codigo'=>'required',
            'precio_venta'=>'required',
            'precio_compra'=>'required',
            'stock'=>'required',
            'categoria'=>'required',
            'marca'=>'required',
            'imagen'=>'required'
        ]);
        //Actualizacion de datos
        Producto::where('id',$request->id)->update([
            'nombre'=>$request->nombre,
            'codigo'=>$request->codigo,
            'creado_por'=>auth()->user()->username,
            'categoria_id'=>$request->categoria,
            'marca_id'=>$request->marca,
            'stock'=>$request->stock,
            'precio_venta'=>$request->precio_venta,
            'precio_compra'=>$request->precio_compra,
            'imagen'=>$request->imagen
        ]);
        return redirect()->route('productos.index')->with('success','El producto se ha actualizado correctamente');

    }

       //Funcion para eliminar categorias
    public function delete($id_producto){
        //Se busca la categoria en el modelo y se elimina
        Producto::find($id_producto)->delete();
        return redirect()->route('productos.index')->with('success','El producto se ha eliminado correctamente');

    }

}

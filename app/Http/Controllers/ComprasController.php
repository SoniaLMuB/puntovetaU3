<?php

namespace App\Http\Controllers;

use App\Models\Producto;
use App\Models\Supplier;
use Illuminate\Http\Request;

class ComprasController extends Controller
{
    //
     //Función que dirigirá a la vista del listado de compras
    public function index(){
        return view('compras.compra');
    }

    //Funcion para redirigir a la vista de crear compra
    public function create(){
        $proveedores=Supplier::all();
        $productos=Producto::all();
        return view('compras.addcompra',['proveedores'=>$proveedores,'productos'=>$productos]);
    }

    //Funcion para obtener producto
    public function getProduct($id_producto){
        $producto = Producto::find($id_producto);

        if(!$producto) {
            return response()->json(['error' => 'Producto no encontrado'], 404);
        }
    
        // Supongamos que el impuesto es un 15% del precio del producto
        $impuesto = $producto->precio_compra * 0.15;
        $impuesto_truncado=round($impuesto);
        // Agregamos el impuesto al objeto producto
        $producto->costo_total= $producto->precio_venta+$impuesto_truncado;
        $producto->impuesto = $impuesto_truncado;
    
        return response()->json($producto);
    }
}

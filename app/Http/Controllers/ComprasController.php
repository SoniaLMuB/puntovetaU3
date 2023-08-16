<?php

namespace App\Http\Controllers;

use App\Models\Compra;
use App\Models\Producto;
use App\Models\Supplier;
use Illuminate\Http\Request;
use App\Models\DetalleCompra;

class ComprasController extends Controller
{
    //
    //Constructor para validar usuario autentificado
    public function __construct()
    {
        // Para verificar que el user este autenticado
        // except() es para indicar cuales metodos pueden usarse sin autenticarse
        $this->middleware('auth');
    }
    //Función que dirigirá a la vista del listado de compras
    public function index()
    {
        $compras = Compra::with('supplier')->get();
        return view('compras.compra', ['compras' => $compras]);
    }

    //Funcion para redirigir a la vista de crear compra
    public function create()
    {
        $proveedores = Supplier::all();
        $productos = Producto::all();
        return view('compras.addcompra', ['proveedores' => $proveedores, 'productos' => $productos]);
    }

    //Funcion para obtener producto
    public function getProduct($id_producto)
    {
        $producto = Producto::find($id_producto);

        if (!$producto) {
            return response()->json(['error' => 'Producto no encontrado'], 404);
        }

        // Supongamos que el impuesto es un 15% del precio del producto
        $impuesto = $producto->precio_compra * 0.15;
        $impuesto_truncado = round($impuesto);
        // Agregamos el impuesto al objeto producto
        $producto->costo_total = $producto->precio_venta + $impuesto_truncado;
        $producto->impuesto = $impuesto_truncado;

        return response()->json($producto);
    }

    //Funcion para almacenar las compras en la base de datos
    public function store(Request $request)
    {
        $this->validate($request, [
            'proveedor' => 'required',
            'fecha' => 'required',
            'referencia' => 'required|unique:compras',
            'descripcion' => 'required',
            'producto_ids' => 'required',
            'stocks' => 'required',
            'precios_compra' => 'required' // Validar también los precios de compra

        ]);
        $productoIds = $request->input('producto_ids');
        $stocks = $request->input('stocks');
        $preciosCompraModificados = $request->input('precios_compra'); // Recoger los precios de compra modificados

        // Crear una nueva compra
        $compra = new Compra;
        $compra->supplier_id = $request->proveedor;
        $compra->descripcion = $request->descripcion;
        $compra->referencia = $request->referencia;
        $compra->fecha = $request->fecha; // o cualquier otra fecha que desees
        $compra->total = $request->input('costo_total'); // asumiendo que tienes un input con el total
        $compra->save();

        for ($i = 0; $i < count($productoIds); $i++) {
            $producto = Producto::find($productoIds[$i]);
            if ($producto) {
                // Actualizar el stock del producto
                $producto->stock += $stocks[$i];
                // Actualizar el precio de compra del producto
                $producto->precio_compra = $preciosCompraModificados[$i];
                $producto->save();

                // Guardar el detalle de la compra
                $detalle = new DetalleCompra;
                $detalle->compra_id = $compra->id;
                $detalle->producto_id = $producto->id;
                $detalle->stock = $stocks[$i];
                $detalle->precio_compra = $producto->precio_compra;
                $detalle->save();
            }
        }

        return redirect()->route('compras.index')->with('success', 'Compra procesada con éxito');
    }

    //Funcion para redirigir a la vista de editar compra
    public function show($id_compra)
    {
        $compra = Compra::with('supplier')->find($id_compra);
        $detalle_compra = DetalleCompra::with('producto')->where('compra_id', $id_compra)->get();
        return view('compras.viewCompra', compact('compra'), ['detalle_compra' => $detalle_compra]);
    }

    //Funcion para eliminar compra
    public function delete($id_compra)
    {
        $compra = Compra::find($id_compra)->delete();
        $detalle_compra = DetalleCompra::where('compra_id', $id_compra)->delete();
        return redirect()->route('compras.index')->with('success', 'La compra se ha eliminado correctamente');
    }
}
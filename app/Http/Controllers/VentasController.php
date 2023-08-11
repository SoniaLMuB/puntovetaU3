<?php

namespace App\Http\Controllers;

use App\Models\Venta;
use App\Models\Cliente;
use App\Models\Producto;
use App\Models\Categoria;
use App\Models\DetalleVenta;
use Illuminate\Http\Request;
use RealRashid\SweetAlert\Facades\Alert;

class VentasController extends Controller
{
    //Función que dirigirá a la vista del listado de ventas
    public function index()
    {
        $ventas = Venta::with('cliente')->get();
        return view('ventas.listadoVentas', ['ventas' => $ventas]);
    }

    //Función que dirigirá a la vista dertalle de ventas
    public function show($id_venta)
    {

        $venta = Venta::with('cliente')->where('id', $id_venta)->get();
        $detalleVenta = DetalleVenta::with('producto')->where('venta_id', $id_venta)->get();
        return view('ventas.detallesVentas', ['venta' => $venta, 'detalle' => $detalleVenta]);
    }

    //Función que dirigirá a la vista del listado de ventas
    public function mostrar()
    {
        return view('ventas.devolucionesVentas');
    }

    //Funcion para redirigir a la vista de crear venta
    public function create()
    {
        $categories = Categoria::all();
        $clientes = Cliente::all();
        return view('ventas.addVenta', ['categorias' => $categories, 'clientes' => $clientes]);
    }


    //Funcion para consultar los productos del flitrado
    public function getProductos($categoria_id)
    {
        if ($categoria_id == 'all') {
            $productos = Producto::where('stock', '>', 0)->get();
        } else {
            $productos = Producto::with('categoria')
                ->where('categoria_id', $categoria_id)
                ->where('stock', '>', 0)
                ->get();
        }

        return response()->json($productos);
    }

    //Funcion para registrar la venta en la base de datos
    public function store(Request $request)
    {
        $this->validate($request, [
            'cliente' => 'required',
            'referencia' => 'required|unique:ventas',
            'producto_id' => 'required',
            'producto_cantidad' => 'required'
        ]);
        //Se hacen las inserciones por medio del objeto venta
        $venta = new Venta;
        $venta->customer_id = $request->input('cliente');
        $venta->referencia = $request->input('referencia');
        $venta->iva = $request->input('iva');
        $venta->subtotal = $request->input('subtotal');
        $venta->total = $request->input('total');
        $venta->creado_por = auth()->user()->username;
        $venta->fecha = now();
        $venta->save();

        $productos = $request->input('producto_id');
        $cantidades = $request->input('producto_cantidad');

        foreach ($productos as $index => $producto_id) {
            $detalleVenta = new DetalleVenta;
            $detalleVenta->venta_id = $venta->id;
            $detalleVenta->producto_id = $producto_id;
            $detalleVenta->cantidad = $cantidades[$index];
            $detalleVenta->save();

            // Actualizar el stock del producto
            $producto = Producto::find($producto_id);
            $producto->stock -= $cantidades[$index];
            $producto->save();
        }

        return redirect()->route('ventas.index')->with('success', 'Venta realizada con éxito!');
    }

    //Funcion para eliminar la venta
    public function delete($id_venta)
    {
        //Se busca la categoria en el modelo y se elimina
        Venta::find($id_venta)->delete();
        return redirect()->route('ventas.index')->with('success', 'La venta se ha eliminado correctamente');
    }
}
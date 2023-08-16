<?php

namespace App\Http\Controllers;

use App\Models\Cotizacion;
use App\Models\DetalleCotizacion;
use App\Models\Producto;
use App\Models\Supplier;
use Illuminate\Http\Request;

class CotizacionesController extends Controller
{

    //Constructor para validar usuario autentificado
    public function __construct()
    {
        // Para verificar que el user este autenticado
        // except() es para indicar cuales metodos pueden usarse sin autenticarse
        $this->middleware('auth');
    }

    //Función que dirigirá a la vista del listado de cotizaciones
    public function index()
    {
        $cotizaciones = Cotizacion::with('supplier')->get();
        return view('cotizaciones.cotizaciones', ['cotizaciones' => $cotizaciones]);
    }

    //Funcion para redirigir a la vista de crear cotizacion
    public function create()
    {
        $proveedores = Supplier::all();
        $productos = Producto::all();
        return view('cotizaciones.addCotizacion', ['proveedores' => $proveedores, 'productos' => $productos]);
    }

    //Funcion para obtener producto
    public function getProduct($id_producto)
    {
        $producto = Producto::find($id_producto);

        if (!$producto) {
            return response()->json(['error' => 'Producto no encontrado'], 404);
        }

        // Supongamos que el impuesto es un 15% del precio del producto
        $impuesto = $producto->precio_cotizacion * 0.15;
        $impuesto_truncado = round($impuesto);
        //dd($impuesto_truncado);
        // Agregamos el impuesto al objeto producto
        $producto->costo_total = $producto->precio_venta + $impuesto_truncado;
        $producto->impuesto = $impuesto_truncado;

        return response()->json($producto);
    }

    //Funcion para almacenar las cotizaciones en la base de datos
    public function store(Request $request)
    {
        $this->validate($request, [
            'proveedor' => 'required',
            'fecha' => 'required',
            'referencia' => 'required|unique:cotizaciones',
            'descripcion' => 'required',
            'producto_ids' => 'required',
            'stocks' => 'required'
        ]);
        $productoIds = $request->input('producto_ids');
        $stocks = $request->input('stocks');

        // Crear una nueva cotización
        $cotizacion = new Cotizacion;
        $cotizacion->supplier_id = $request->proveedor;
        $cotizacion->descripcion = $request->descripcion;
        $cotizacion->referencia = $request->referencia;
        $cotizacion->fecha = $request->fecha; // o cualquier otra fecha que desees
        $cotizacion->total = $request->input('costo_total'); // asumiendo que tienes un input con el total
        $cotizacion->save();

        for ($i = 0; $i < count($productoIds); $i++) {
            $producto = Producto::find($productoIds[$i]);
            if ($producto) {
                // Guardar el detalle de la cotizacion
                $detalle = new DetalleCotizacion;
                $detalle->cotizacion_id = $cotizacion->id;
                $detalle->producto_id = $producto->id;
                $detalle->stock = $stocks[$i];
                $detalle->precio_cotizacion = $producto->precio_compra;
                $detalle->save();
            }
        }

        return redirect()->route('cotizaciones.index')->with('success', 'cotizacion procesada con éxito');
    }

    //Funcion para redirigir a la vista de editar cotizacion
    public function show($id_cotizacion)
    {
        $cotizacion = Cotizacion::with('supplier')->find($id_cotizacion);
        $detalle_cotizacion = DetalleCotizacion::with('producto')->where('cotizacion_id', $id_cotizacion)->get();
        return view('cotizaciones.viewCotizacion', compact('cotizacion'), ['detalle_cotizacion' => $detalle_cotizacion]);
    }

    //Funcion para eliminar cotizacion
    public function delete($id_cotizacion)
    {
        $cotizacion = Cotizacion::find($id_cotizacion)->delete();
        $detalle_cotizacion = DetalleCotizacion::where('cotizacion_id', $id_cotizacion)->delete();
        return redirect()->route('cotizaciones.index')->with('success', 'La cotizacion se ha eliminado correctamente');
    }
}
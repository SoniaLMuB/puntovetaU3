<?php

namespace App\Http\Controllers;

use App\Models\Devolucion;
use Illuminate\Http\Request;

class DevolucionesController extends Controller
{
    //Constructor para validar usuario autentificado
    public function __construct()
    {
        // Para verificar que el user este autenticado
        // except() es para indicar cuales metodos pueden usarse sin autenticarse
        $this->middleware('auth');
    }
    //Funcion para ver la vista de devoluciones
    public function index()
    {
        $devoluciones = Devolucion::with('customer', 'producto', 'venta')->get();

        return view('ventas.devolucionesVentas', ['devoluciones' => $devoluciones]);
    }

    //Funcion para eliminar una devolución
    public function delete($id_devolucion)
    {
        //Se busca la categoria en el modelo y se elimina
        Devolucion::find($id_devolucion)->delete();
        return redirect()->route('ventas.devoluciones')->with('success', 'La devolución se ha eliminado correctamente');
    }
}
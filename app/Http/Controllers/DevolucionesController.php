<?php

namespace App\Http\Controllers;

use App\Models\Devolucion;
use Illuminate\Http\Request;

class DevolucionesController extends Controller
{
    //Funcion para ver la vista de devoluciones
    public function index(){
        $devoluciones = Devolucion::with('customer','producto','venta')->get();

        return view('ventas.devolucionesVentas',['devoluciones'=>$devoluciones]);
    }
}

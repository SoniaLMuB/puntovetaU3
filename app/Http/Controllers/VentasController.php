<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use RealRashid\SweetAlert\Facades\Alert;

class VentasController extends Controller
{
    //Función que dirigirá a la vista del listado de ventas
    public function index(){
        return view('ventas.listadoVentas');
    }

    //Función que dirigirá a la vista del listado de ventas
    public function show(){
        return view('ventas.detallesVentas');
    }

    //Función que dirigirá a la vista del listado de ventas
    public function mostrar(){
        return view('ventas.devolucionesVentas');
    }
}

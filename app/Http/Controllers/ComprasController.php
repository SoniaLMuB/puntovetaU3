<?php

namespace App\Http\Controllers;

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
        return view('compras.addcompra');
    }
}

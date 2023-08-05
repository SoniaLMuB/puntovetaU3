<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class CotizacionesController extends Controller
{
    //Funcion para retornar la vista de cotizaciones
    public function index(){
        return view('cotizaciones.cotizaciones');
    }

    //Funcion para retornar la vista de agregar cotizaciones
    public function create(){
        return view('cotizaciones.addCotizacion');
    }
}

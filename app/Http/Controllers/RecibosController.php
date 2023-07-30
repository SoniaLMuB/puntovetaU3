<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class RecibosController extends Controller
{
    //Funcion para redireccionar a la vista de recibos
    public function index(){
        return view('recibos.recibos');
    }
}

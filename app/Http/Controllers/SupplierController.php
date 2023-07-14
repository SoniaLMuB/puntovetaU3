<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class SupplierController extends Controller
{
    //Constructor para validar usuario autentificado
    public function __construct()
    {
        // Para verificar que el user este autenticado
        // except() es para indicar cuales metodos pueden usarse sin autenticarse
        $this->middleware('auth');
    }

    //Funcion para retornar a la vista de proveedores
    public function index(){
        return view('suppliers.suppliers');
    }

    //Funcion para retornar la vista de agregar proveedores
    public function create(){
        return view('suppliers.newSupplier');
    }
}
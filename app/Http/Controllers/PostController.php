<?php

namespace App\Http\Controllers;

use App\Models\DetalleVenta;
use Illuminate\Http\Request;
use RealRashid\SweetAlert\Facades\Alert;

class PostController extends Controller
{
    public function __construct()
    {
        // Para verificar que el user este autenticado
        // except() es para indicar cuales metodos pueden usarse sin autenticarse
        $this->middleware('auth');
    }
    //Funcion para retornar una vez autentificado el usuario
    public function index()
    {
        $productosVendidos = DetalleVenta::with('producto')
            ->selectRaw('producto_id, SUM(cantidad) as total')
            ->groupBy('producto_id')
            ->orderBy('total', 'DESC')
            ->limit(5)
            ->get();

        $productoArray = [];
        $totalArray = [];

        foreach ($productosVendidos as $detalle) {
            $productoArray[] = $detalle->producto->nombre;
            $totalArray[] = $detalle->total;
        }
        return view('dashboard',['productos' => json_encode($productoArray), 'totals' => json_encode($totalArray)]);
    }
}
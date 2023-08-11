<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Venta extends Model
{
    use HasFactory;

    protected $fillable=[
        'cliente_id',
        'referencia',
        'subtotal',
        'iva',
        'total',
        'creado_por',
        'fecha'
    ];

    //Se hacen las relaciones a las tablas

    public function detalles(){
        return $this->hasMany(DetalleVenta::class);
    }

    public function cliente(){
        return $this->belongsTo(Cliente::class,'customer_id');
    }
}

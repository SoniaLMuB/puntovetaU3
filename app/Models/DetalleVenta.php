<?php

namespace App\Models;

use App\Models\Producto;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class DetalleVenta extends Model
{
    use HasFactory;

    protected $table="detalleventas";
    protected $fillable=[
        'venta_id',
        'producto_id',
        'cantidad'
    ];

    //Se hacen relaciones a las tablas
    public function productos(){
        return $this->belongsTo(Producto::class);
    }

    public function venta(){
        return $this->belongsTo(Venta::class);
    }
}

<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Devolucion extends Model
{
    use HasFactory;
    protected $table='devoluciones';
    protected $fillable=[
        'venta_id',
        'producto_id',
        'customer_id'
    ];

    public function producto(){
        return $this->belongsTo(Producto::class);
    }

    public function venta(){
        return $this->belongsTo(Venta::class);
    }

    public function customer(){
        return $this->belongsTo(Cliente::class,'customer_id');
    }
}

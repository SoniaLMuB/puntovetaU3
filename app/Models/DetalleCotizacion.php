<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DetalleCotizacion extends Model
{
    use HasFactory;
    protected $table = 'detallecotizaciones';

    protected $fillable=[
        'producto_id',
        'cotizacion_id',
        'stock',
        'precio_cotizacion'
    ];

    public function cotizacion() {
        return $this->belongsTo(Cotizacion::class);
    }

    public function producto() {
        return $this->belongsTo(Producto::class);
    }
}

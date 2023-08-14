<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Cotizacion extends Model
{
    use HasFactory;
    protected $table = 'cotizaciones';
    protected $fillable=[
        'fecha',
        'supplier_id',
        'referencia',
        'total',
        'descripcion'
    ];
    //Se hace la relacion con detalles de compra
    public function detalles() {
        return $this->hasMany(DetalleCotizacion::class);
    }  
    public function supplier(){
        return $this->belongsTo(Supplier::class);
    }
}

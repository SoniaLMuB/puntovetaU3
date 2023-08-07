<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Compra extends Model
{
    use HasFactory;
    protected $fillable=[
        'fecha',
        'supplier_id',
        'referencia',
        'total',
        'descripcion'
    ];  
    //Se hace la relacion con detalles de compra
    public function detalles() {
        return $this->hasMany(DetalleCompra::class);
    }

    public function supplier(){
        return $this->belongsTo(Supplier::class);
    }
}

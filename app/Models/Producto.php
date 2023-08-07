<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Producto extends Model
{
    use HasFactory;
    protected $fillable=[
        'nombre',
        'codigo',
        'precio_compra',
        'precio_venta',
        'stock',
        'marca_id',
        'categoria_id',
        'subcategoria_id',
        'creado_por',
        'imagen'
    ];

    //Se hacen las relaciones entre los modelos
    public function marca(){
        return $this->belongsTo(Marca::class,'marca_id');
    }
    public function categoria(){
        return $this->belongsTo(Categoria::class,'categoria_id');
    }

    public function subcategoria(){
        return $this->belongsTo(Subcategoria::class);
    }

    public function detalle(){
        return $this->hasMany(DetalleCompra::class);
    }
}

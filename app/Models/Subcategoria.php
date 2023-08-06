<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Subcategoria extends Model
{
    use HasFactory;
    protected $table = 'subcategoria';

    protected $fillable=[
        'nombre',
        'descripcion',
        'codigo',
        'categoria_id',
        'imagen',
        'creado_por'
    ];

    public function categorias(){
        return $this->belongsTo(Categoria::class,'categoria_id');
    }

    public function productos(){
        return $this->belongsTo(Producto::class);
    }
}

<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Categoria extends Model
{
    use HasFactory;
    
    protected $fillable=[
        'nombre',
        'codigo',
        'descripcion',
        'creado_por',
        'imagen'
    ];

    //Se hacen las relaciones entre los modelos
    public function productos(){
        return $this->hasMany(Producto::class,'categoria_id');
    }

    public function subCategoria(){
        return $this->hasMany(Subcategoria::class,'categoria_id');
    }
}

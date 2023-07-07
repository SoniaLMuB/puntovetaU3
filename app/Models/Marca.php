<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Marca extends Model
{
    use HasFactory;
    protected $fillable=[
        'nombre',
        'descripcion',
        'imagen'
    ];

    //Se hacen la relaciones entre los modelos
    public function productos(){
        return $this->hasMany(Producto::class,'marca_id');
    }
}

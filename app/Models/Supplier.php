<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Supplier extends Model
{
    use HasFactory;

    protected $fillable=[
        'nombre',
        'codigo',
        'telefono',
        'imagen',
        'email',
        'pais_id',
        'ciudad',
        'descripcion'
    ];

    public function compras(){
        return $this->hasMany(Compra::class);
    }

    public function pais()
    {
        return $this->belongsTo(Country::class, 'pais_id');
    }
}

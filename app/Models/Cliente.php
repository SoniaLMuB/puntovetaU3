<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Cliente extends Model
{
    protected $table = 'customers';
    use HasFactory;
    protected $fillable=[
        'nombre',
        'codigo',
        'empresa',
        'email',
        'telefono',
        'imagen',
        'pais_id',
        'ciudad',
        'descripcion',
    ];

    public function pais()
    {
        return $this->belongsTo(Country::class, 'pais_id');
    }
}

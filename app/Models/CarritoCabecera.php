<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class CarritoCabecera extends Model
{
    protected $table = 'carrito_cabeceras';

    public function detalles()
    {
        return $this->hasMany(CarritoDetalle::class, 'carrito_id');
    }
}

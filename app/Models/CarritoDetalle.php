<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class CarritoDetalle extends Model
{
    protected $table = 'carrito_detalles';

    public function producto()
    {
        return $this->belongsTo(Producto::class, 'producto_id');
    }
}

<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Producto extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'price',
        // otros campos
    ];

    // Relación con el modelo Carrito
    public function carritos()
    {
        return $this->hasMany(Carrito::class);
    }
}

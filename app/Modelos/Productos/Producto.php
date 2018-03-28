<?php

namespace App\Modelos\Productos;

use App\Modelos\Base;

class Producto extends Base
{
    protected $table = 'productos';
    
    protected static function boot() {
        parent::boot();
    }
    
    public function productos() {
        return $this->belongsToMany(Producto::class, 'paquete_producto', 'paquete_id', 'producto_id')->withPivot(['cantidad'])->withTimestamps();
    }
}

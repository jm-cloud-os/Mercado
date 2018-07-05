<?php

namespace App\Modelos\Productos;

use App\Modelos\Base;
use App\Modelos\Categoria;

class Producto extends Base
{
    protected $table = 'productos';
    
    protected static function boot() {
        parent::boot();
    }
    
    public function productos() {
        return $this->belongsToMany(Producto::class, 'paquete_producto', 'paquete_id', 'producto_id')->withPivot(['cantidad'])->withTimestamps();
    }
    
    public function inventario() {
        return $this->hasOne(\App\Modelos\Inventario::class)->where('almacen_id', session('almacen'));
    }

    public function categorias(){
        return $this->belongsToMany(Categoria::class);
    }
}

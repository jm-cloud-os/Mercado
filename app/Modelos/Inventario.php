<?php

namespace App\Modelos;

use Illuminate\Database\Eloquent\Model;

class Inventario extends Base
{
    protected $table = 'inventarios';
    
    public function productos() {
        return $this->belongsTo(Productos\Producto::class, 'producto_id');
    }
    
    public function producto() {
        return $this->belongsTo(Productos\Producto::class);
    }
}

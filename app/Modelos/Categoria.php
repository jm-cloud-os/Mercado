<?php

namespace App\Modelos;

use Illuminate\Database\Eloquent\Model;
use App\Modelos\Productos\Producto;

class Categoria extends Base
{
    protected $table = 'categorias';

    public function productos(){
        return $this->belongsToMany(Producto::class);
    }
}

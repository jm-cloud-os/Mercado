<?php

namespace App\Modelos\Productos;

use Illuminate\Database\Eloquent\Model;

class PaqueteProducto extends Model
{
    protected $table = 'paquete_producto';
    //table without primary key
    protected $primaryKey = null;
    //so disable autoincrement
    public $incrementing = false;
}

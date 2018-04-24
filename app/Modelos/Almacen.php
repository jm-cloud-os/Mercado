<?php

namespace App\Modelos;

use Illuminate\Database\Eloquent\Model;
use App\Traits\AlmacenesTrait;

class Almacen extends Base
{
    use AlmacenesTrait;
    
    protected $table = 'almacenes';
}

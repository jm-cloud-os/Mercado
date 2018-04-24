<?php

namespace App\Modelos;

use App\Traits\CalidadesTrait;
use Illuminate\Database\Eloquent\Model;

class Calidad extends Base
{
    use CalidadesTrait;
    
    protected $table = 'calidades';
}

<?php

namespace App\Modelos;

use App\Traits\CanalesTrait;
use Illuminate\Database\Eloquent\Model;

class Canal extends Base
{
    use CanalesTrait;
    
    protected $table = 'canales';
}

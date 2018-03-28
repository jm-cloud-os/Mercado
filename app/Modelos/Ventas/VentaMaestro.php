<?php

namespace App\Modelos\Ventas;

use Illuminate\Database\Eloquent\Model;
use App\Modelos\Base;

class VentaMaestro extends Base
{
    protected $table = 'venta_maestro';
    
    public function productos() {
        return $this->hasMany(VentaDetalle::class, 'venta_maestro_id');
    }
}

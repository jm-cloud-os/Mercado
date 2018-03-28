<?php

namespace App\Modelos\Ventas;

use Illuminate\Database\Eloquent\Model;
use App\Modelos\Base;

class VentaDetalle extends Base
{
    protected $table = 'venta_detalle';

    public function venta() {
        return $this->belongsTo(VentaMaestro::class, 'venta_maestro_id');
    }
}

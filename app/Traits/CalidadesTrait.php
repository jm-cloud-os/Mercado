<?php

namespace App\Traits;

use App\Traits\CalidadesTrait;
/**
 *
 * @author josemiguel
 */
trait CalidadesTrait {
    public function init($empresa = null) {
        array_set($this, 'nombre', 'Premium');
        array_set($this, 'empresa_id', array_get($empresa, 'id'));
    }
}

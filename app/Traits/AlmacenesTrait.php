<?php
namespace App\Traits;

/**
 *
 * @author josemiguel
 */
trait AlmacenesTrait {
    public function init($empresa = null) {
        array_set($this, 'nombre', 'General');
        array_set($this, 'empresa_id', array_get($empresa, 'id'));
    }
}

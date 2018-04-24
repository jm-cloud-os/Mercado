<?php

namespace App\Traits;

/**
 *
 * @author josemiguel
 */
trait CanalesTrait {
    public function init($empresa = null) {
        array_set($this, 'nombre', 'Web');
        array_set($this, 'empresa_id', array_get($empresa, 'id'));
    }
}

<?php

namespace App\Statics;

use App\Modelos\Almacen;

/**
 * Description of Catalogos
 *
 * @author josemiguel
 */
class Catalogos {

    public static function almacenes($dropdown = false) {
        if ($dropdown) {
            return Almacen::all()->reduce(function($carry, $item) {
                        $carry[array_get($item, 'id')] = array_get($item, 'nombre');
                        return $carry;
                    }, []);
        }
        return Almacen::all();
    }

}

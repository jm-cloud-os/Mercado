<?php

namespace App\Statics;

use App\Modelos\Almacen;
use App\Modelos\Calidad;
use App\Modelos\Canal;

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
    
    public static function calidades($dropdown = false) {
        if($dropdown){
            return Calidad::all()->reduce(function($carry, $item) {
                        $carry[array_get($item, 'id')] = array_get($item, 'nombre');
                        return $carry;
                    }, []);
        }
        return Calidad::all();
    }
    
    public static function canales($dropdown = false) {
        if ($dropdown) {
            return Canal::all()->reduce(function($carry, $item) {
                        $carry[array_get($item, 'id')] = array_get($item, 'nombre');
                        return $carry;
                    }, []);
        }
        return Almacen::all();
    }

}

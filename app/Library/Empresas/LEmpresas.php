<?php
namespace App\Library\Empresas;

use App\Modelos\Empresa;
use App\Modelos\Almacen;
use App\Modelos\Canal;
use App\Modelos\Calidad;
/**
 * Description of LEmpresas
 *
 * @author josemiguel
 */
class LEmpresas {
    
    public static function init($data) {
        $empresa = new Empresa();
        array_set($empresa, 'nombre', array_get($data, 'nombre_empresa'));
        $empresa->save();
        
        static::crearAlmacen($empresa);
        static::crearCalidad($empresa);
        static::crearCanal($empresa);
        
        return $empresa;
    }
    
    private static function crearAlmacen($empresa) {
        $almacen = new Almacen();
        $almacen->init($empresa);
        $almacen->save();
    }
    
    private static function crearCalidad($empresa) {
        $calidad = new Calidad();
        $calidad->init($empresa);
        $calidad->save();
    }
    
    private static function crearCanal($empresa){
        $canal = new Canal();
        $canal->init($empresa);
        $canal->save();
    }
}

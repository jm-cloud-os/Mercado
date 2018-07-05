<?php

namespace App\Modelos;

use Illuminate\Database\Eloquent\Model;
use App\User;

class Empresa extends Model
{
    
    public function usuarios() {
        return $this->hasMany(User::class);
    }
    
    public function ventas() {
        return $this->hasMany(Ventas\VentaMaestro::class);
    }
    
    public function almacenes() {
        return $this->hasMany(Almacen::class);
    }
    
    public function canales() {
        return $this->hasMany(Canal::class);
    }
    
    public function calidades() {
        return $this->hasMany(Calidad::class);
    }

    public function categorias() {
        return $this->hasMany(Categoria::class);
    }
    
    public function inventarios() {
        return $this->hasMany(Inventario::class);
    }
    
}

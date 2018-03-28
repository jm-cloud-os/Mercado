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
        return $this->hasMany(Empresa::class);
    }
    
}

<?php

namespace App\Modelos;

use Illuminate\Database\Eloquent\Model;
use App\Scopes\EmpresaScope;
use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Eloquent\SoftDeletes;

class Base extends Model
{
    use SoftDeletes;
    
    protected static function boot() {
        parent::boot();
        static::addGlobalScope(new EmpresaScope());
    }
    
    public function save(array $options = []) {
        if ($this->validate()) {
            return parent::save($options);
        }
        return false;
    }

    public function delete() {
        if ($this->validate()) {
            return parent::delete();
        }
        return false;
    }

    private function validate() {
        if(auth()->check()){//for authenticated users
            if (array_key_exists('empresa_id', $this->attributes) && $this->attributes['empresa_id'] == auth()->user()->empresa_id) {
                return true;
            }
        }
        return false;
    }
    
    /**
     * Overriddes default getAttributes function
     * $default param indicates if should perform default function or custom
     * @param boolean $default
     * @return array
     */
    public function getAttributes($default = true) {
        if ($default) {
            return parent::getAttributes();
        }
        return Schema::getColumnListing($this->getTable());
    }
}

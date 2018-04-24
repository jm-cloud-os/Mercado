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

<?php

namespace App\Scopes;

use Illuminate\Database\Eloquent\Scope;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Builder;

/**
 * Constraints all models to get data only if the current user or tenant id matches
 *
 * @author josemiguel
 */
class EmpresaScope implements Scope{
    
    public function apply(Builder $builder, Model $model){
        
        if(auth()->check()){
            $builder->where($model->getTable() . '.empresa_id', auth()->user()->empresa_id);
        }
        else{
            
        }
        return $builder;
    }

}

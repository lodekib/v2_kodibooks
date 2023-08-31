<?php

namespace App\Traits;

use App\Models\Scopes\ManagerScope;

trait HasManager
{
    protected static function bootHasManager()
    {
        static::addGlobalScope(new ManagerScope);
        static::creating(function($model){
            if(auth()->user()){
                // $manager_id = Manager::where('id',auth()->id())->get('id');
                $model->manager_id = auth()->id();
            }
        });
    }
}

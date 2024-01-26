<?php

namespace App\Traits;

use App\Models\Scopes\MarketerScope;

trait HasMarketer
{
    protected static function bootHasMarketer()
    {
        static::addGlobalScope(new MarketerScope);
        static::creating(function ($model) {
            if (auth()->user()) {
                // $manager_id = Manager::where('id',auth()->id())->get('id');
                $model->marketer_id = auth()->id();
            }
        });
    }
}

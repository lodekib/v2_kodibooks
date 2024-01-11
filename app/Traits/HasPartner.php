<?php

namespace App\Traits;

use App\Models\Scopes\PartnerScope;
use Illuminate\Support\Facades\Auth;

trait HasPartner
{
    protected static function bootHasPartner()
    {
        static::addGlobalScope(new PartnerScope);
        static::creating(function ($model) {
            if (auth()->user()) {
                $model->partner_id = Auth::id();
            }
        });
    }
}

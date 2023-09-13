<?php

namespace App\Models;

use App\Traits\HasManager;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Statement extends Model
{
    use HasFactory, HasManager;

    protected $guarded = [];

    //TODO::REMEMBER TO UNCOMMENT
    // protected static function booted(): void
    // {
    //     static::addGlobalScope('nonestale', function (Builder $builder) {
    //         $builder->where('status', 'not like', 'stale/%');
    //     });
    // }
}

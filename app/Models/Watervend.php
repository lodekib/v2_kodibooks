<?php

namespace App\Models;

use App\Traits\HasManager;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Watervend extends Model
{
    use HasFactory,HasManager;

    protected $guarded = [];

    public function outsourcewaters(): HasMany
    {
        return $this->hasMany(Outsourcewater::class);
    }
}

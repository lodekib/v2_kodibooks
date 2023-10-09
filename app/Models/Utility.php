<?php

namespace App\Models;

use App\Traits\HasManager;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Utility extends Model
{
    use HasFactory, HasManager;

    protected $guarded = [];

    public function property(): BelongsTo
    {
        return $this->belongsTo(Property::class,'property_name','property_name');
    }
}

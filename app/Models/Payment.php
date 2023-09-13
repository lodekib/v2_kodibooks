<?php

namespace App\Models;

use App\Traits\HasManager;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Payment extends Model
{
    use HasFactory, HasManager;

    protected $guarded = [];

    public function allocations(): HasMany
    {
        return $this->hasMany(Allocation::class, 'receipt_number', 'receipt_number');
    }
}

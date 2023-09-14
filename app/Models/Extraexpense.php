<?php

namespace App\Models;

use App\Traits\HasManager;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Extraexpense extends Model
{
    use HasFactory, HasManager;

    protected $guarded = [];

    public function expense(): BelongsTo
    {
        return $this->belongsTo(Expense::class);
    }
}

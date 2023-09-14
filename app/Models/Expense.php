<?php

namespace App\Models;

use App\Traits\HasManager;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Expense extends Model
{
    use HasFactory, HasManager;

    protected $guarded = [];
    protected $casts = ['unit_name' => 'array'];

    public function extraexpenses(): HasMany
    {
        return $this->hasMany(Extraexpense::class);
    }
}

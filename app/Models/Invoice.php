<?php

namespace App\Models;

use App\Traits\HasManager;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Invoice extends Model
{
    use HasFactory,HasManager;

    protected $guarded = ['invoice_date'];

    public function allocations(): HasMany
    {
        return $this->hasMany(Allocation::class,'invoice_number','invoice_number');
    }
}

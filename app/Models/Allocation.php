<?php

namespace App\Models;

use App\Traits\HasManager;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Allocation extends Model
{
    use HasFactory, HasManager;

    protected $guarded = [];

    public function payment(): BelongsTo
    {
        return $this->belongsTo(Payment::class, 'receipt_number','receipt_number');
    }

    public function invoice():BelongsTo
    {
        return $this->belongsTo(Invoice::class,'invoice_number','invoice_number');
    }
}

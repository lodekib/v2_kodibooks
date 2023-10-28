<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Manager extends Model
{
    use HasFactory;

    protected $guarded = ['otp', 'otp_mail'];

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class,'id','id');
    }
}

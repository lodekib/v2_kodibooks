<?php

namespace App\Models;

use App\Traits\HasPartner;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MpesaB2C extends Model
{
    use HasFactory,HasPartner;

    protected $guarded = [];
    protected $table = 'mpesa_b2c';
}

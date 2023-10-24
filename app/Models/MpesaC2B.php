<?php

namespace App\Models;

use App\Traits\HasManager;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MpesaC2B extends Model
{
    use HasFactory,HasManager;

    protected $guarded = [];
    protected $table = 'mpesa_c2b';
}

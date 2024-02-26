<?php

namespace App\Models;

use App\Traits\HasManager;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class OutsourceInvoice extends Model
{
    use HasFactory,HasManager;

    protected $guarded = [];
}

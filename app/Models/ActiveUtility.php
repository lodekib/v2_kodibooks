<?php

namespace App\Models;

use App\Traits\HasManager;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ActiveUtility extends Model
{
    use HasFactory,HasManager;

    protected $guarded = [];
    protected $casts = ['active_utilities' => 'array'];
}

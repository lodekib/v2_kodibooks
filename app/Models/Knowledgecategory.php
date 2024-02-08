<?php

namespace App\Models;

use App\Traits\HasMarketer;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Knowledgecategory extends Model
{
    use HasFactory, HasMarketer;

    protected $guarded = [];
    
}

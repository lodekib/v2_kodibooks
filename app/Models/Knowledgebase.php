<?php

namespace App\Models;

use App\Traits\HasMarketer;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\MediaLibrary\HasMedia;
use Spatie\MediaLibrary\InteractsWithMedia;

class Knowledgebase extends Model implements HasMedia
{
    use HasFactory, HasMarketer, InteractsWithMedia;

    protected $guarded = [];

    public function watchingPartners()
    {
        return $this->belongsToMany(Partner::class)->withPivot('watched');
    }
}

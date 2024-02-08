<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Partner extends Model
{
    use HasFactory;

    protected $guarded = [];

    protected $casts = [
        'kyc' => 'array'
    ];

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class, 'id', 'id');
    }

    public function watchedVideos()
    {
        return $this->belongsToMany(Knowledgebase::class)->withPivot('watched');
    }

    
}

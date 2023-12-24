<?php

namespace App\Models;

use App\Traits\HasManager;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\HasOne;
use Illuminate\Notifications\Notifiable;

class Tenant extends Model
{
    use HasFactory, Notifiable, HasManager;

    protected $guarded = [];

    protected static function booted()
    {
        static::addGlobalScope('nonestale', function (Builder $builder) {
            $builder->where('status', '!=', 'stale');
        });
    }

    // public function routeNotificationForAfricasTalking($notification)
    // {
    //     return '254' . substr($this->phone_number, 1);
    // }

    public function units(): HasMany
    {
        return $this->hasMany(Unit::class);
    }

    public function property(): BelongsTo
    {
        return $this->belongsTo(Property::class);
    }

    public function activeutility(): HasOne
    {
        return $this->hasOne(ActiveUtility::class);
    }

    public function payments(): HasMany
    {
        return $this->hasMany(Payment::class);
    }

    public function invoices(): HasMany
    {
        return $this->hasMany(Invoice::class);
    }
}

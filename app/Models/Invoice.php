<?php

namespace App\Models;

use App\Traits\HasManager;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\HasOne;

class Invoice extends Model
{
    use HasFactory, HasManager;

    protected $guarded = ['invoice_date'];

    protected static function booted()
    {
        static::addGlobalScope('nonestale', function (Builder $builder) {
            $builder->where('invoice_status', 'not like', 'stale/%');
        });
    }

    public function allocations(): HasMany
    {
        return $this->hasMany(Allocation::class, 'invoice_number', 'invoice_number');
    }

    public function tenant(): BelongsTo
    {
        return $this->belongsTo(Tenant::class);
    }

    public function property(): BelongsTo
    {
        return $this->belongsTo(Property::class, 'property_name', 'property_name');
    }

    public function statement(): HasOne
    {
        return $this->hasOne(Statement::class, 'reference', 'invoice_number');
    }
}

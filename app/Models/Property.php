<?php

namespace App\Models;

use App\Traits\HasManager;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Property extends Model
{
    use HasFactory, HasManager;

    protected $guarded = [];

    public function units(): HasMany
    {
        return $this->hasMany(Unit::class);
    }

    public function tenants(): HasMany
    {
        return $this->hasMany(Tenant::class);
    }

    public function payments(): HasMany
    {
        return $this->hasMany(Payment::class, 'property_name', 'property_name');
    }

    public function invoices(): HasMany
    {
        return $this->hasMany(Invoice::class, 'property_name', 'property_name');
    }

    public function utilities(): HasMany
    {
        return $this->hasMany(Utility::class,'property_name','property_name');
    }
}

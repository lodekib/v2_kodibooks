<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;
use Althinect\FilamentSpatieRolesPermissions\Concerns\HasSuperAdmin;
use Bpuig\Subby\Models\Plan;
use Filament\Models\Contracts\FilamentUser;
use Filament\Panel;
use Illuminate\Support\Facades\Auth;
use Jeffgreco13\FilamentBreezy\Traits\TwoFactorAuthenticatable;
use Illuminate\Support\Facades\Storage;
use Bpuig\Subby\Traits\HasSubscriptions;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\HasOne;

class User extends Authenticatable implements FilamentUser
{
    use HasApiTokens,
        HasFactory,
        Notifiable,
        HasSuperAdmin,
        TwoFactorAuthenticatable,
        HasSubscriptions;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'email',
        'password',
        'avatar_url',
        'type'
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
        'password' => 'hashed',
    ];


    public function getFilamentAvatarUrl(): ?string
    {
        return $this->avatar_url ? Storage::url($this->avatar_url) : null;
    }


    public function canAccessPanel(Panel $panel): bool
    {
        $response = false;

        if (
            $panel->getId() == 'admin' && Auth::user()->hasRole('Super Admin') ||
            $panel->getId() == 'manager' && Auth::user()->hasRole('Manager')   ||
            $panel->getId() == 'partner' && Auth::user()->hasRole('Partner')
        ) {
            $response =  true;
        }

        return $response;
    }


    protected static function boot()
    {
        parent::boot();
        static::created(function ($user) {
            if ($user->type == null) {
                $user->assignRole('Manager');
                $plan = Plan::getByTag('basic');
                $user->newSubscription('primary', $plan, 'Primary Subscription', 'Client primary subscription', null, 'mpesa');
            }
        });
    }

    public function manager(): HasOne
    {
        return $this->hasOne(Manager::class, 'id', 'id');
    }

    public function partners(): HasMany
    {
        return $this->hasMany(Partner::class, 'id', 'id');
    }
}

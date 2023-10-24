<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;
use Althinect\FilamentSpatieRolesPermissions\Concerns\HasSuperAdmin;
use Filament\Models\Contracts\FilamentUser;
use Filament\Panel;
use Illuminate\Support\Facades\Auth;
use Jeffgreco13\FilamentBreezy\Traits\TwoFactorAuthenticatable;
use Fouladgar\OTP\Contracts\OTPNotifiable;
use Fouladgar\OTP\Concerns\HasOTPNotify;
use Illuminate\Support\Facades\Storage;
use Bpuig\Subby\Traits\HasSubscriptions;

class User extends Authenticatable implements FilamentUser, OTPNotifiable
{
    use HasApiTokens, HasFactory, Notifiable, HasSuperAdmin, 
    TwoFactorAuthenticatable, HasOTPNotify,HasSubscriptions;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'email',
        'password',
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
        return $this->avatar_url ? Storage::url($this->avatar_url) : null ;
    }

    public function canAccessPanel(Panel $panel): bool
    {
        $response = false;

        if ($panel->getId() == 'admin' && Auth::user()->hasRole('Super Admin') || $panel->getId() == 'manager' && Auth::user()->hasRole('Manager')) {
            $response =  true;
        }

        return $response;
    }


    protected static function boot()
    {
        parent::boot();
        static::created(fn ($user) => $user->assignRole('Manager'));
    }
}

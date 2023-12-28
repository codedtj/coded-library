<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\MorphToMany;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable, HasUuids;

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

    public function resources(): HasMany
    {
        return $this->hasMany(Resource::class, 'created_by');
    }

    public function favouriteResources(): BelongsToMany
    {
        return $this->belongsToMany(Resource::class, 'favourite_resources')->using(BasePivot::class)->withTimestamps();
    }

    public function roles(): MorphToMany
    {
        return $this->morphToMany(Role::class, 'roleable')
            ->using(BaseMorphPivot::class)
            ->withTimestamps();
    }

    public function isAdmin(): bool
    {
        return null !== $this->roles()->where('name', 'admin')->first();
    }

    public function hasAnyRole($roles): bool
    {
        return null !== $this->roles()->whereIn('name', $roles)->first();
    }

    public function hasRole($role): bool
    {
        return null !== $this->roles()->where('name', $role)->first();
    }
}

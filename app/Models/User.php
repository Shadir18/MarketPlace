<?php

namespace App\Models;
use Database\Factories\UserFactory;
use Illuminate\Database\Eloquent\Attributes\Fillable;
use Illuminate\Database\Eloquent\Attributes\Hidden;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;


class User extends Authenticatable
{
    /** @use HasFactory<UserFactory> */
    use HasFactory, Notifiable;
    
    public static $ADMIN_EMAIL = 'admin@example.com';
    
    protected $fillable = [
        'first_name',
        'last_name',
        'email',
        'admin',
        'manager',
        'user',
        'password',
    ];

    public function seller()
    {
        return $this->hasOne(Seller::class);
    }

    public function postAds()
    {
        return $this->hasMany(PostAds::class);
    }

    /**
     * Get the attributes that should be cast.
     *
     * @return array<string, string>
     */
    protected function casts(): array
    {
        return [
            'email_verified_at' => 'datetime',
            'password' => 'hashed',
        ];
    }
}
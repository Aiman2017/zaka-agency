<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'email',
        'role',
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
    ];

    public function isSuperAdmin(): bool
    {
        return $this->role === 'superadmin';
    }

    public function getGreetingAttribute()
    {
        $hour = now()->hour;


        if ($hour >= 4 && $hour < 12) {
            $greeting = 'Доброе утро';
        } elseif ($hour >= 12 && $hour < 18) {
            $greeting = 'Добрый день';
        } elseif ($hour >= 18 && $hour < 23) {
            $greeting = 'Добрый вечер';
        } else {
            $greeting = 'Доброй ночи';
        }

        return $greeting.', '.$this->name;
    }
}

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
    
      const ROLE_ADMIN = 'admin';
    const ROLE_CALLAGENT = 'call agent';
    const ROLE_OPERATION = 'operation';

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'email',
        'password',
        'phone',
        'dob',
        'gender',
        'country',
        'remember_token',
        'role',
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
    
    
     public function isadmin()
    {
        return $this->role == self::ROLE_ADMIN;
    }

    /**
     * Check if the user is a store manager.
     *
     * @return bool
     */
    public function isCallagent()
    {
        return $this->role === self::ROLE_CALLAGENT;
    }

    /**
     * Check if the user is a purchaser.
     *
     * @return bool
     */
    public function isoperation()
    {
        return $this->role === self::ROLE_OPERATION;
    }
}

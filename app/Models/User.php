<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use HasFactory, Notifiable;

    protected $fillable = [
        'name',
        'email',
        'password',
        'phone',
        'role'
    ];

    protected $hidden = [
        'password',
        'remember_token',
    ];

    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    // Role check methods
     public function isManager(): bool
    {
        return $this->role === 'manager';
    }

    /**
     * Check if user is a reservation clerk
     */
    public function isReservationClerk(): bool
    {
        return $this->role === 'reservation_clerk';
    }

    /**
     * Check if user is a customer
     */
    public function isCustomer(): bool
    {
        return $this->role === 'customer';
    }

    /**
     * Check if user is a travel company
     */
    public function isTravelCompany(): bool
    {
        return $this->role === 'travel_company';
    }
}
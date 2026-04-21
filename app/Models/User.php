<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use HasFactory, Notifiable;

    protected $fillable = ['name', 'email', 'password', 'role', 'is_active'];

    protected $hidden = ['password', 'remember_token'];

    protected function casts(): array
    {
        return [
            'email_verified_at' => 'datetime',
            'password'          => 'hashed',
            'is_active'         => 'boolean',
        ];
    }

    // Customer orders (belongs to user_id)
    public function customerOrders()
    {
        return $this->hasMany(Order::class, 'user_id');
    }

    // Staff assigned orders (belongs to staff_id)
    public function staffOrders()
    {
        return $this->hasMany(Order::class, 'staff_id');
    }
}

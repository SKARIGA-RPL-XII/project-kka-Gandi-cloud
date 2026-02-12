<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\User;
use App\Models\Order;

class Staff extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'assigned_area',
        'active',
    ];

    // Relasi ke user
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    // Relasi ke orders
    public function orders()
    {
        return $this->hasMany(Order::class);
    }
}

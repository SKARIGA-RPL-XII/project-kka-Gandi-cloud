<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
protected $fillable = [
        'user_id',
        'service_id',
        'staff_id',
        'order_date',
        'address',
        'total_price',
        'status',
        'payment_status',
        'payment_method'
    ];

    // Relasi ke User
public function customer()
    {
        return $this->belongsTo(User::class, 'customer_id');
    }

    public function staff()
    {
        return $this->belongsTo(User::class, 'staff_id');
    }

    // Relasi ke Service
    public function service()
    {
        return $this->belongsTo(Service::class);
    }
}
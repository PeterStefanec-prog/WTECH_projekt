<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class OrderItem extends Model
{
    // OrderItem belongs to 1 order N:1
    public function order()
    {
        return $this->belongsTo(Order::class);
    }

    // OrderItems belong to 1 product N:1
    public function product()
    {
        return $this->belongsTo(Product::class);
    }
}

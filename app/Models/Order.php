<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{

    public function user()
    {
        return $this->belongsTo(User::class);  // objednavku vytvoril user
    }

    public function address()
    {
        return $this->belongsTo(Address::class);
    }

    public function paymentMethod()
    {
        return $this->belongsTo(PaymentMethod::class);
    }

    public function shippingMethod()
    {
        return $this->belongsTo(ShippingMethod::class);
    }

    public function items()
    {
        return $this->hasMany(OrderItem::class);
    }
}

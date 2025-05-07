<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;

    // Povolené polia pre hromadné vytváranie
    protected $fillable = [
        'user_id',
        'order_date',
        'status',
        'address_id',
        'payment_method_id',
        'shipping_method_id',
        'total_price',
    ];

    protected $casts = [
        'order_date'  => 'datetime',
        'total_price' => 'decimal:2',
    ];

    public function items()
    {
        return $this->hasMany(OrderItem::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
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
}

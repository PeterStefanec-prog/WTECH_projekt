<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ShoppingCart extends Model
{
    //
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    // A shopping cart can have many items
    public function items()
    {
        return $this->hasMany(CartItem::class);
    }
}

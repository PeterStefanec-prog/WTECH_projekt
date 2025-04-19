<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    // Product has many sizes 1:N
    public function sizes()
    {
        return $this->hasMany(ProductSize::class);
    }
}

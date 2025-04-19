<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ProductSize extends Model
{
    // Size has 1 product N:1
    public function product()
    {
        return $this->belongsTo(Product::class);
    }
}

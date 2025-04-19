<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ProductPhoto extends Model
{
    // Photos belongs to 1 product N:1
    public function product()
    {
        return $this->belongsTo(Product::class);
    }
}

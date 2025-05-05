<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected $fillable = [
        'name','description','price','brand',
        'gender','category','color'
    ];
    
    // Product has many sizes 1:N
    public function sizes()
    {
        return $this->hasMany(ProductSize::class);
    }
    public function photos()
    {
        return $this->hasMany(\App\Models\ProductPhoto::class, 'product_id', 'id');
    }

}

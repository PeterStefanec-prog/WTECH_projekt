<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    /** @use HasFactory<\Database\Factories\UserFactory> */
    use HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable. - hromadne sa vedia zaplnit
     *
     * @var list<string>
     */
    protected $fillable = [
        'first_name',
        'last_name',
        'email',
        'password',
        'is_admin',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var list<string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * Get the attributes that should be cast.
     *
     * @return array<string, string>
     */
    protected function casts(): array
    {
        return [
            'email_verified_at' => 'datetime',
            'password' => 'hashed',
        ];
    }


    // getter for full name
    // potom v blade to getneme - {{ Auth::user()->full_name }}
    public function getFullNameAttribute()
    {
        return $this->first_name . ' ' . $this->last_name;
    }


    // 1:N → User has many orders
    public function orders()
    {
        return $this->hasMany(Order::class);
    }

    // N:1 user has ome address
    public function address()
    {
        return $this->hasOne(Address::class);
    }

    //  1:1  User has one shopping cart
    public function shoppingCart()
    {
        return $this->hasOne(ShoppingCart::class);
    }
}

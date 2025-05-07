<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
class Address extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'first_name',
        'last_name',
        'street',
        'city',
        'country',
        'postal_code',
        'notes',
    ];

    // spätný vzťah: každá adresa patrí jednému používateľovi
    public function user()
    {
        return $this->belongsTo(User::class);
    }
}

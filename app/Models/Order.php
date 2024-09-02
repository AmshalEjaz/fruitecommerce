<?php
// app/Models/Order.php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'first_name',
        'last_name',
        'address',
        'city',
        'country',
        'postcode',
        'mobile',
        'email',
        'payment_method',
        'order_notes',
        'subtotal',
        'discount',
        'total',
    ];

    // Define any relationships here, if needed
}

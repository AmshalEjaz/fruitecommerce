<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Cart extends Model
{
    protected $fillable = ['user_id', 'shop_id', 'quantity', 'discount'];

    // Relationship to the Shop model
    public function shop()
    {
        return $this->belongsTo(Shop::class, 'shop_id');
    }

    // Optional: Relationship to the User model
    public function user()
    {
        return $this->belongsTo(User::class);
    }
}

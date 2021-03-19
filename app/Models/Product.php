<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;

    protected $fillable = ['name', 'price', 'category', 'description', 'gallery'];

    public function carts(){
        return $this->belongsToMany(Cart::class, 'cart_product', 'product_id', 'cart_id');
    }
}

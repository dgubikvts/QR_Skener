<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CartItem extends Model
{
    use HasFactory;

    protected $fillable = [
        'quantity'
    ];

    public function product(){
        return $this->belongsTo(Product::class);
    }
      
    public function cart(){
        return $this->belongsTo(Cart::class);
    }
    
    public function createCartItem($cart_id, $product_id, $quantity){
        $this->cart_id = $cart_id;
        $this->product_id = $product_id;
        $this->quantity = $quantity;
        $this->save();
    }
}
<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class OrderItem extends Model
{
    use HasFactory;

    public function product(){
        return $this->belongsTo(Product::class);
    }
      
    public function order(){
        return $this->belongsTo(Order::class);
    }
    
    public function createOrderItem($order_id, $product_id, $quantity){
        $this->order_id = $order_id;
        $this->product_id = $product_id;
        $this->quantity = $quantity;
        $this->save();
    }
}
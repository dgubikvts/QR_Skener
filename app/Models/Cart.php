<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Cart extends Model
{
    use HasFactory;

    protected $fillable = [
        'price'
    ];

    public function user(){
        return $this->belongsTo(User::class);
    }

    public function cart_item(){
        return $this->hasMany(CartItem::class);
    }
    
    public function createCart($user_id){
        $this->user_id = $user_id;
        $this->save();
    }
}
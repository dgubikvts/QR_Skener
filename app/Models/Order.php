<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;

    protected $fillable = [
        'city',
        'address',
        'phone_number',
        'email'
    ];

    public function user(){
        return $this->belongsTo(User::class);
    }
    
    public function order_item(){
        return $this->hasMany(OrderItem::class);
    }

    public function createOrder($user_id, $name, $lastname, $email, $city, $address, $phone){
        $this->user_id = $user_id;
        $this->name = $name;
        $this->lastname = $lastname;
        $this->email = $email;
        $this->city = $city;
        $this->address = $address;
        $this->phone = $phone;
        $this->save();
    }
}
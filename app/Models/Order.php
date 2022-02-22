<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;

    protected $fillable = [
        'id',
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

    public function createOrder($ime, $prezime, $email, $grad, $adresa, $telefon){
        $this->ime = $ime;
        $this->prezime = $prezime;
        $this->email = $email;
        $this->grad = $grad;
        $this->adresa = $adresa;
        $this->telefon = $telefon;
        $this->save();
    }
}
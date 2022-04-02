<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Support\Facades\Auth;
use App\Models\Order;
use App\Models\OrderItem;
use App\Models\Cart;
use App\Models\CartItem;

class OrderController extends Controller
{
    public function orders(){
        $order_id = Order::all();
        return view('pages.orders', compact('order_id'));
    }

    public function submit_order(Request $request){
        $order = new Order();
        $order->createOrder(Auth::id(),
                            $request->input('name'),
                            $request->input('lastname'),
                            $request->input('email'),
                            $request->input('city'),
                            $request->input('address'),
                            $request->input('phone'));
        if(Auth::user()){
            $cart = Cart::where('user_id', Auth::id())->first();
            $cartItem = CartItem::where('cart_id', $cart->id)->get();
            foreach($cartItem as $id => $proizvod){
                $orderItem = new OrderItem();
                $orderItem->createOrderItem($order->id, $proizvod->product->id, $proizvod->quantity);
                $proizvod->delete();
                $order->price = $cart->price;
                $order->save();
            }
        }
        else{
            $cart = session()->get('cart');
            foreach($cart as $c => $proizvod){
                $orderItem = new OrderItem();
                $orderItem->createOrderItem($order->id, $c, $cart[$c]['Kolicina']);
            }
            $order->price = session()->get('total');
            $order->save();
            session()->flush();
        }
        $order_items = OrderItem::where('order_id', $order->id)->get();
        return view('pages.successful-order', compact('order_items'));
    }

    public function data_input(){
        if(Auth::user()){
            try{
                $cartItems = CartItem::where('cart_id', Cart::where('user_id', Auth::id())->firstOrFail()->id)->get();
            }
            catch(ModelNotFoundException $e){
                $cartItems = null;
            }
        }
        else{
            $cartItems = session('cart');
        }
        return view("pages.data-input")->with('cartItems', $cartItems);
    }
 
    public static function getTotalPrice($order_id){
        return Order::where('id', $order_id)->first()->price;
    }
}
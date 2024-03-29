<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Support\Facades\Auth;
use App\Models\Product;
use App\Models\Cart;
use App\Models\CartItem;

class CartController extends Controller
{
    public function cart(){
        if(Auth::user()){
            try{
                $cart = CartItem::where('cart_id', Cart::where('user_id', Auth::id())->firstOrFail()->id)->get();
                if($cart->isEmpty()) $cart = null;
            }
            catch(ModelNotFoundException $e){
                $cart = null;
            }
        }
        else{
            $cart = session('cart');
        }
        return view('pages.cart')->with('cart', $cart);
    }

    public static function cartQty(){
        $total = 0;
        if(Auth::user()){
            try{
                $cart = CartItem::where('cart_id', Cart::where('user_id', Auth::id())->firstOrFail()->id)->get();
                foreach($cart as $id => $product)
                $total += $product->quantity;
            }
            catch(ModelNotFoundException $e){
                return $total;
            }
        }
        else{
            if(session('cart')){
                foreach(session('cart') as $id => $product)
                  $total += $product['Kolicina'];
            }
        }
        return $total;
    }
    
    public function add_to_cart(Request $request){
        if($request->id and $request->quantity){
            $product = Product::find($request->id);  
            if (Auth::user()){
                $cart = Cart::where('user_id', Auth::id())->first();
                if(!$cart){
                    $cart = new Cart();
                    $cart->createCart(Auth::id());
                }
                $cartItem = CartItem::where([['cart_id', $cart->id],['product_id', $request->id]])->first();
                if($cartItem){
                    $cartItem->quantity += $request->quantity;
                    $cartItem->save();
                }
                else{
                    $cartItem = new CartItem(); 
                    $cartItem->createCartItem($cart->id, $request->id, $request->quantity);
                }
            }
            else{
                $cart = session()->get('cart');
                if(!$cart) $cart = [];
                if(!isset($cart[$request->id])){
                    $cart[$request->id] = [
                        'Naziv' => $product->title,
                        'Kolicina' => $request->quantity,
                        'Cena' => $product->price,
                        'Opis' => $product->desc,
                        'Barcode' => $product->barcode
                    ];
                }
                else{
                    $cart[$request->id]['Kolicina'] += $request->quantity;
                }
                session()->put('cart', $cart);
            }
            return response()->json(['product' => $product, 'productQty' => $request->quantity, 'cartQty' => $this->cartQty()]);
        }
        else return abort(404);
    }

    public function remove_from_cart(Request $request){
        if($request->id){
            if(Auth::user()){
                $cart = Cart::where('user_id', Auth::id())->first();
                CartItem::where([['cart_id', $cart->id],['product_id', $request->id]])->first()->delete();
            }
            else{
                $cart = session()->get('cart');
                if(!isset($cart[$request->id])) return abort(404);
                unset($cart[$request->id]);
                session()->put('cart', $cart);
            }
            return redirect()->back();
        }
        else return abort(404);
    }

    public function remove_all_from_cart(){
        if(Auth::user()){
            $cart = Cart::where('user_id', Auth::id())->first();
            CartItem::where('cart_id', $cart->id)->delete();
        }
        else{
            session()->forget('cart');
        }
        return redirect()->back();
    }

    public function update_cart(Request $request){
        if($request->id){
            if(Auth::user()){
                $cart = Cart::where('user_id', Auth::id())->first();
                $cartItem = CartItem::where([['cart_id', $cart->id],['product_id', $request->id]])->first();
                $cartItem->quantity = $request->quantity;
                $cartItem->save();
            }
            else{
                $cart = session()->get('cart');
                $cart[$request->id]['Kolicina'] = $request->quantity;
                session()->put('cart', $cart);
            }
            return redirect()->back();
        }
        else return abort(404);
    }

    public static function updateTotalPrice($price){
        if(Auth::user()){
            try{
                $cart = Cart::where('id', Auth::id())->firstOrFail();
                $cart->price = $price;
                $cart->save();
            }
            catch(ModelNotFoundException $e){
                return abort(404);
            }
        }
        else{
            session()->put('total', $price);
        }
    }
}
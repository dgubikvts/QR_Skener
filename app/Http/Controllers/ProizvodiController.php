<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use App\Models\Product;
use App\Models\Order;
use App\Models\OrderItem;
use Exception;
class ProizvodiController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $products = Product::all();
        return view('pages.pocetna', compact('products'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    public function search(Request $request)
    {
        $request->validate([
            'query'=>'required'
        ]);
        $query = $request->input('query');
        $proizvod = Product::where('barcode', $query)->orWhere('naziv', 'like', "%$query%")->orWhere('opis', 'like', "%$query%")->get();
        return view('pages.rezultat-pretrage', compact('proizvod', 'query'));
    }

    public function quicksearch($query)
    {
        try{
            $proizvod = Product::where('barcode', $query)->firstOrFail()->id;
            return redirect()->route('proizvod.show', $proizvod);
        }
        catch(ModelNotFoundException $e){
            return redirect('/skener')->with('error','Taj proizvod ne postoji!');
        }
    }   
    
    public function add_to_cart(Request $request){
        if($request->id and $request->quantity){
            $proizvod = Product::findOrFail($request->id);
            if(!$proizvod) return abort(404);     
            $cart = session()->get('cart');
            if(!$cart) $cart = [];
            if(!isset($cart[$request->id])){
                $cart[$request->id] = [
                    'Naziv' => $proizvod->naziv,
                    'Kolicina' => $request->quantity,
                    'Cena' => $proizvod->cena,
                    'Opis' => $proizvod->opis,
                    'Barcode' => $proizvod->barcode
                ];
            }
            else{
                $cart[$request->id]['Kolicina'] += $request->quantity;
            }
            session()->put('cart', $cart);
            return response()->json(['proizvod' => $proizvod, 'qty' => $request->quantity]);
        }
        else return abort(404);
    }

    public function remove_from_cart(Request $request){
        if($request->id){
            $cart = session()->get('cart');
            foreach((array)$request->id as $id){
                if(!isset($cart[$id])) return abort(404);
                unset($cart[$id]);
            }
            session()->put('cart', $cart);
            return redirect()->back();
        }
        else return abort(404);
    }

    public function update_cart(Request $request){
        if($request->id){
            $cart = session()->get('cart');
            $cart[$request->id]['Kolicina'] = $request->quantity;
            session()->put('cart', $cart);
            return redirect()->back();
        }
        else return abort(404);
    }

    public function submit_order(Request $request){
        $order = new Order();
        $order->createOrder($request->input('ime'),
                            $request->input('prezime'),
                            $request->input('email'),
                            $request->input('grad'),
                            $request->input('ulica'),
                            $request->input('telefon'));
        $cart = session()->get('cart');
        foreach($cart as $c => $proizvod){
            $orderItem = new OrderItem();
            $orderItem->createOrderItem($order->id, $c, $cart[$c]['Kolicina']);
        }
        $order_items = OrderItem::where('order_id', $order->id)->with('product')->get();
        session()->flush();
        return view('pages.uspesna-porudzbina', compact('order_items'));
    }

    public function unos_podataka(){
        return view("pages.unos-podataka");
    }

    public function cart(){
        return view('pages.cart');
    }

    public static function cartQty(){
        $total = 0;
        if(session('cart')){
            foreach(session('cart') as $id => $product){
              $total += $product['Kolicina'];
            }
        }
        return $total;
    }
    public static function ukupnaCena(){
        $total = 0;
        if(session('cart')){
            foreach(session('cart') as $id => $product){
              $total += $product['Cena'] * $product['Kolicina'];
            }
        }
        return $total;
    }

    public function orders(){
        $order_id = Order::all();
        return view('pages.orders', compact('order_id'));
    }
    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function flush(){
        session()->flush();
        return redirect('/');
    }
    public function show($id)
    {
        try{
            $proizvod = Product::findOrFail($id);
            return view('pages.proizvod')->with('proizvod', $proizvod);
        }
        catch(ModelNotFoundException $e){
            return redirect('/');
        }
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}

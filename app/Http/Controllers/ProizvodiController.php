<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use App\Models\Product;
use Illuminate\Support\Facades\Auth;
use Exception;
class ProizvodiController extends Controller
{
    public function index()
    {
        $products = Product::all();
        return view('pages.index', compact('products'));
    }

    public function search(Request $request)
    {
        $request->validate([
            'query'=>'required'
        ]);
        $query = $request->input('query');
        $products = Product::where('barcode', $query)->orWhere('title', 'like', "%$query%")->orWhere('desc', 'like', "%$query%")->get();
        return view('pages.search-result', compact('products', 'query'));
    }

    public function quick_search($query)
    {
        try{
            $product_id = Product::where('barcode', $query)->firstOrFail()->id;
            return redirect()->route('product.show', $product_id);
        }
        catch(ModelNotFoundException $e){
            return redirect('/scanner')->with('error','Taj proizvod ne postoji!');
        }
    }   
    
    public function show($id)
    {
        try{
            $product = Product::findOrFail($id);
            return view('pages.product')->with('product', $product);
        }
        catch(ModelNotFoundException $e){
            return redirect('/');
        }
    }
}
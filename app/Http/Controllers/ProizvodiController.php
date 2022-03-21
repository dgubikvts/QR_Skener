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
        $proizvod = Product::where('barcode', $query)->orWhere('naziv', 'like', "%$query%")->orWhere('opis', 'like', "%$query%")->get();
        return view('pages.search-result', compact('proizvod', 'query'));
    }

    public function quick_search($query)
    {
        try{
            $proizvod = Product::where('barcode', $query)->firstOrFail()->id;
            return redirect()->route('product.show', $proizvod);
        }
        catch(ModelNotFoundException $e){
            return redirect('/scanner')->with('error','Taj proizvod ne postoji!');
        }
    }   
    
    public function flush(){
        session()->flush();
        return redirect('/');
    }

    public function show($id)
    {
        try{
            $proizvod = Product::findOrFail($id);
            return view('pages.product')->with('proizvod', $proizvod);
        }
        catch(ModelNotFoundException $e){
            return redirect('/');
        }
    }
}
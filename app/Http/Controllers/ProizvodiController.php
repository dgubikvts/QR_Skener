<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Srafovi;

class ProizvodiController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $srafovi = Srafovi::all();
        return view('pocetna', compact('srafovi'));
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
        $proizvod = Srafovi::where('barcode', $query)->orWhere('naziv', 'like', "%$query%")->orWhere('opis', 'like', "%$query%")->get();
        return view('rezultat-pretrage', compact('proizvod', 'query'));
    }
    public function searchbarcode(Request $request)
    {
        $request->validate([
            'query'=>'required'
        ]);
        $query = $request->input('query');
        $proizvod = Srafovi::where('barcode', $query)->first();
        return view('proizvod')->with('proizvod', $proizvod);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $proizvod = Srafovi::find($id);
        return view('proizvod')->with('proizvod', $proizvod);
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

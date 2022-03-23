<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use App\Models\Order;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function update_profile(Request $request){
        Auth::user()->name = $request->name;
        Auth::user()->lastname = $request->lastname;
        Auth::user()->email = $request->email;
        Auth::user()->city = $request->city;
        Auth::user()->address = $request->address;
        Auth::user()->phone = $request->phone;
        Auth::user()->save();
        return redirect('/profile');
    }
}

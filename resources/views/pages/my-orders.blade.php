@extends('layouts/app')
@section('content')

@forelse(Auth::user()->orders as $order)
    @foreach($order->order_item as $item)
        <img src="{{url($item->product->slika)}}" alt="Image" class="img-fluid col-2"/>
        {{$item->product->naziv}}
        {{$item->product->cena}}
        x{{$item->quantity}}
        <br>
    @endforeach
    <hr>
@empty
    <p>No orders</p>
@endforelse

@endsection
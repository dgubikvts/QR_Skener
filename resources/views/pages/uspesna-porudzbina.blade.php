@extends('layouts/app')
@section('content')
<h2 class="h1 text-center mb-4">Porudzbina je uneta u sistem!</h2>
<div class="col-12 col-md-10 col-lg-8 col-xl-6 m-auto">
    <table class="table table-bordered text-center">
        <thead>
            <th scope="col"></th>
            <th scope="col">Naziv</th>
            <th scope="col">Pojedinacna cena</th>
            <th scope="col">Kolicina</th>
            <th scope="col">Cena</th>
            </tr>
        </thead>
        <tbody>
        @php $ukupnacena = 0 @endphp
        @foreach($order_items as $order_item)
            <tr class="align-middle">
                <td><a href="/proizvod/{{$order_item->product->id}}"><img class="korpa-img p-0 m-0" src="{{url('/images/Sraf' . $order_item->product->id . '.jpg')}}" alt="{{$order_item->product->naziv}}"></a></td>
                <td><a href="/proizvod/{{$order_item->product->id}}" class="text-decoration-none text-black">{{$order_item->product->naziv}}</a></td>
                <td>{{$order_item->product->cena}}rsd</td>
                <td>{{$order_item->quantity}}</td>
                <td>{{$order_item->product->cena * $order_item->quantity}}rsd</td>
                @php $ukupnacena += $order_item->product->cena * $order_item->quantity @endphp
            </tr>
        @endforeach
        </tbody>
    </table>
    <div class="d-flex justify-content-end mb-4">
        <p class="h5 align-self-center m-0">Ukupno: {{ $ukupnacena }}rsd</p>
    </div>
    <hr>
    <a href="/" class="btn btn-primary float-end">Nazad na pocetnu</a>

</div>

@endsection
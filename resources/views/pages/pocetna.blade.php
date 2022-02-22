@extends('layouts/app')
@section('content')

<h1 class="text-center display-4 my-5">Katalog</h1> 
    @if(session()->has('error')) 
    <div class="alert alert-danger alert-popup errors" role="alert">
        {{session('error')}}
    </div>
    @endif
    @if(count($products) > 0)
        <div class="row row-cols-1 row-cols-md-2 row-cols-lg-4 row-cols-xl-5 g-4">
        @foreach($products as $s)
            <div class="col mb-5">
                <div class="card h-100">
                    <div class="card-header">
                        <a href="/proizvod/{{$s->id}}" class="text-decoration-none text-black"><h5 class="text-center my-2 card-title">{{$s->naziv}}</h5></a>
                    </div>
                    <a href="/proizvod/{{$s->id}}"><img class="card-img-top" src="{{url('/images/Sraf' . $s->id . '.jpg')}}" alt="{{$s->naziv}}"></a>
                    <div class="card-body d-flex flex-column">
                        <p class="card-text">{!! $s->opis !!}</p>
                        <p class="card-text lead mt-auto">Cena: {{$s->cena}}rsd</p>
                    </div>
                    <div class="card-footer">
                        <form action="{{route('add.to.cart')}}" method="GET" class="d-flex justify-content-around">
                            <button type="submit" class="btn btn-primary mt-auto col-8 add-to-cart" data-id="{{$s->id}}">Dodaj u korpu</button>
                            <input type="number" name="quantity" value="1" min="1" max="50" class="text-center" data-id="quantity{{$s->id}}">
                        </form>
                    </div>
                </div>
            </div>
        @endforeach
        </div>  
    @else
        <h1>Katalog je prazan</h1>
    @endif
    <script>
        $(document).ready(function () {
            $(".add-to-cart").click(function (e) {
                e.preventDefault();
                var id = $(this).attr('data-id');
                var quantity = $("form").find(`[data-id='quantity${id}']`);
                quantity.val() > 50 ? quantity.val(50) : null;
                quantity.val() < 1 ? quantity.val(1) : null;
                $.ajax({
                    type: 'GET',
                    url: "{{route('add.to.cart')}}",
                    data: {
                        id: id, 
                        quantity: quantity.val()
                    },
                    success: function (response) {
                        $(".cartquantity").html(parseInt($(".cartquantity").html()) + parseInt(quantity.val()));
                        $('.alert-popup').show().delay(1500).fadeOut();
                    }
                });
            });
        });
    </script>
@endsection 


@extends('layouts/app')
@section('content')
    @if($proizvod !== null)
            <div class="d-flex">
                <div class="col-4 offset-1">
                    <h1 class="display-6 my-5 ">{{$proizvod->naziv}}</h1>
                    <img src="{{url('/images/Sraf' . $proizvod->id . '.jpg')}}" alt="Image" class="img-fluid col-12 col-md-9"/>
                </div>
                <div class="text-right col-6 offset-1 d-flex flex-column">
                        <p class="lead  my-5">{!! $proizvod->opis !!}</p>
                        <div class="mt-auto">
                        <p class="h4 mb-5">Cena: {{$proizvod->cena}}rsd</p>
                        <form action="{{route('add.to.cart')}}" method="GET" class="d-flex">
                            <input type="number" name="quantity" value="1" min="1" max="50" class="text-center me-3" data-id="quantity{{$proizvod->id}}">                   
                            <button type="submit" class="btn btn-primary add-to-cart" data-id="{{$proizvod->id}}">Dodaj u korpu</button>
                            <a href="/skener" class="btn btn-secondary ms-5">Skeniraj proizvod</a>
                        </form>
                        </div>
                        
                    
                </div>
            </div>
        
    @else
        <h1>Taj proizvod ne postoji</h1>
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
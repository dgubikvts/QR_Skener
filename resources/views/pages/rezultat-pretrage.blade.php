@extends('layouts/app')
@section('content')
    <h1 class="display-6 my-5 text-center">Pretraga za: {{$query}}</h1>
    @if(count($proizvod) > 0)
        <div class="row row-cols-1 row-cols-md-2 row-cols-lg-4 row-cols-xl-5 g-4">
            @foreach($proizvod as $s)
                <div class="col mb-5">
                    <div class="card h-100">
                        <div class="card-header">
                            <a href="/proizvod/{{$s->id}}" class="text-decoration-none text-black"><h5 class="text-center my-2 card-title">{{$s->naziv}}</h5></a>
                        </div>
                        <a href="/proizvod/{{$s->id}}"><img class="card-img-top" src="{{url('/images/Sraf' . $s->id . '.jpg')}}" alt="{{$s->naziv}}"></a>
                        <div class="card-body d-flex flex-column">
                            <p class="card-text">{!! $s->opis !!}</p>
                            <p class="card-text lead mt-auto" data-name="cena" data-cena="{{$s->cena}}"></p>
                        </div>
                        <div class="card-footer">
                            <form action="{{route('add.to.cart')}}" method="POST" class="d-flex justify-content-around">
                                <button type="submit" class="btn btn-primary mt-auto col-8 add-to-cart" data-id="{{$s->id}}">Dodaj u korpu</button>
                                <input type="number" name="quantity" value="1" min="1" max="50" class="text-center" data-id="quantity{{$s->id}}">
                            </form>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>  
    @else
        <h1>Nema proizvoda koji se poklapaju vasoj pretrazi</h1>
    @endif
    <script>
        $(document).ready(function () {
            formatirajCene();
            $(".add-to-cart").click(function (e) {
                e.preventDefault();
                var id = $(this).attr('data-id');
                var quantity = $("form").find(`[data-id='quantity${id}']`);
                quantity.val() > 50 ? quantity.val(50) : null;
                quantity.val() < 1 ? quantity.val(1) : null;
                $.ajaxSetup({
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    }
                });
                $.ajax({
                    type: 'POST',
                    url: "{{route('add.to.cart')}}",
                    data: {
                        id: id, 
                        quantity: quantity.val()
                    },
                    success: function (response) {
                        $(".cartquantity").html(parseInt($(".cartquantity").html()) + parseInt(quantity.val()));
                        $('.navbar').append("<div class='alert alert-success alert-popup text-center' role='alert'><h4>Dodato u korpu! <hr></h4> <div class='d-flex'> <img src=" + response.proizvod['slika'] + " class='korpa-img'> <p class='lead align-self-center m-2'>" + response.proizvod['naziv'] + "</p></div></div>");
                        $(".alert-popup").delay(1000).fadeOut(1000, function() {
                            $( this ).remove();
                        });
                    }
                });
            });
            function formatirajCene(){
                $("p[data-name='cena']").each(function(index, p) {
                    $(p).html('Cena: ' + formatRSD($(p).attr('data-cena')) + 'rsd');
                });
            }
        });
    </script>
@endsection
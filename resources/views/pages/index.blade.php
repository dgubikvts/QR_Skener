@extends('layouts/app')
@section('content')

<h1 class="text-center display-4 my-5">Katalog</h1> 
    @if(count($products) > 0)
        <div class="row row-cols-1 row-cols-md-2 row-cols-lg-4 row-cols-xl-5 g-4">
        @foreach($products as $product)
            <div class="col mb-5">
                <div class="card h-100">
                    <div class="card-header">
                        <a href="/product/{{$product->id}}" class="text-decoration-none text-black"><h5 class="text-center my-2 card-title">{{$product->title}}</h5></a>
                    </div>
                    <a href="/product/{{$product->id}}"><img class="card-img-top" src="{{url($product->image)}}" alt="{{$product->title}}"></a>
                    <div class="card-body d-flex flex-column">
                        <p class="card-text">{!! $product->desc !!}</p>
                        <p class="card-text lead mt-auto" data-name="cena" data-cena="{{$product->price}}"></p>
                    </div>
                    <div class="card-footer">
                        <form action="{{route('add.to.cart')}}" method="POST" class="d-flex justify-content-around">
                            <button type="submit" class="btn btn-primary mt-auto col-8 add-to-cart" data-id="{{$product->id}}">Dodaj u korpu</button>
                            <input type="number" name="quantity" value="1" min="1" max="50" class="text-center" data-id="quantity{{$product->id}}">
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
                        $(".cartquantity").html(response.totalqty);
                        $(".cartquantity").attr('data-qty', response.totalqty);
                        $('.navbar').append(`
                        <div class='alert alert-success alert-popup text-center' role='alert'>
                            <div class='d-flex'> 
                                <img src="${response.proizvod['image']}" width='100px'>
                                <p class='lead align-self-center m-0 m-3'>
                                    ${response.proizvod['title']}
                                </p>
                                <p class='lead align-self-center m-0 ms-auto'>
                                    x${response.qty}
                                </p>
                            </div>
                        </div>`);
                        $(".alert-popup").delay(1000).fadeOut(1000, function() {
                            $( this ).remove();
                        });
                        console.log(response.test);
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
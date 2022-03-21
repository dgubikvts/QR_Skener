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
                        <p class="h4 mb-5" data-name="cena" data-cena="{{$proizvod->cena}}"></p>
                        <form action="{{route('add.to.cart')}}" method="POST" class="d-flex">
                            <input type="number" name="quantity" value="1" min="1" max="50" class="text-center me-3" data-id="quantity{{$proizvod->id}}">                   
                            <button type="submit" class="btn btn-primary add-to-cart" data-id="{{$proizvod->id}}">Dodaj u korpu</button>
                            <a href="/skener" class="btn btn-secondary ms-5">Skeniraj sledeci proizvod</a>
                        </form>
                        </div>
                </div>
            </div>
        
    @else
        <h1>Taj proizvod ne postoji</h1>
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
                        $('.navbar').append(`
                        <div class='alert alert-success alert-popup text-center' role='alert'>
                            <div class='d-flex'> 
                                <img src="${response.proizvod['slika']}" width='100px'>
                                <p class='lead align-self-center m-0 m-3'>
                                    ${response.proizvod['naziv']}
                                </p>
                                <p class='lead align-self-center m-0 ms-auto'>
                                    x${response.qty}
                                </p>
                            </div>
                        </div>`);
                        $(".alert-popup").delay(1000).fadeOut(1000, function() {
                            $( this ).remove();
                        });
                    }
                });
            });
            function formatirajCene(){
                $("p[data-name='cena']").html('Cena: ' + formatRSD($("p[data-name='cena']").attr('data-cena')) + 'rsd');
            }
        });
    </script>
@endsection
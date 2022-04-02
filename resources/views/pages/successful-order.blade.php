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
            <tr class="align-middle" data-selectable="true">
                <td><a href="/product/{{$order_item->product->id}}"><img class="korpa-img p-0 m-0" src="{{url($order_item->product->image)}}" alt="{{$order_item->product->title}}"></a></td>
                <td><a href="/product/{{$order_item->product->id}}" class="text-decoration-none text-black">{{$order_item->product->title}}</a></td>
                <td data-name="cena" data-cena="{{$order_item->product->price}}"></td>
                <td>{{$order_item->quantity}}</td>
                <td data-name="cenaReda" data-cena="{{$order_item->product->price * $order_item->quantity}}"></td>
                @php $ukupnacena += $order_item->product->price * $order_item->quantity @endphp
            </tr>
        @endforeach
        </tbody>
    </table>
    <div class="d-flex justify-content-end mb-4">
        <p class="h5 align-self-center m-0 total" data-cena="{{ $ukupnacena }}"></p>
    </div>
    <hr>
    <a href="/" class="btn btn-primary float-end">Nazad na pocetnu</a>
</div>
<script>
    $(document).ready(function () {
        formatirajCene();
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
        function formatirajCene(){
            $("tr[data-selectable='true']").each(function(index, tr) {
                $(tr).find("[data-name='cena']").html(formatRSD($(tr).find("[data-name='cena']").attr('data-cena')) + 'rsd');
                $(tr).find("[data-name='cenaReda']").html(formatRSD($(tr).find("[data-name='cenaReda']").attr('data-cena')) + 'rsd');
            });
            $('.total').html('Ukupno: ' + formatRSD($('.total').attr('data-cena')) + 'rsd');
        }
    });
</script>
@endsection
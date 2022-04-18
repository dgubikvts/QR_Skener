@extends('layouts/app')
@section('content')

@if($cart)
    <div class="col-12 col-md-10 col-lg-8 m-auto">
        <table class="table table-bordered text-center">
            <thead>
                <th scope="col"></th>
                <th scope="col">Naziv</th>
                <th scope="col">Pojedinacna cena</th>
                <th scope="col">Kolicina</th>
                <th scope="col">Cena</th>
                <th scope="col"></th>
            </thead>
            <tbody>
            @auth
                @php $ukupnacena = 0 @endphp
                @foreach($cart as $id => $cartItem)
                    <tr class="align-middle" data-id="{{$cartItem->product->id}}" data-selectable="true">
                        <td><a href="/product/{{$cartItem->product->id}}"><img class="korpa-img p-0 m-0" src="{{url($cartItem->product->image)}}" alt="{{$cartItem->product->title}}"></a></td>
                        <td><a href="/product/{{$cartItem->product->id}}" class="text-decoration-none text-black">{{$cartItem->product->title}}</a></td>
                        <td data-name="pojedinacna" data-cena="{{$cartItem->product->price}}"></td>
                        <td><input type="number" name="quantity{{$cartItem->product->id}}" data-id="{{$cartItem->product->id}}" data-name='qty' value="{{$cartItem->quantity}}" min="1" max="50" class="text-center update-cart" required></td>
                        <td data-cena="{{$cartItem->product->price * $cartItem->quantity}}" data-name="UkupnaCena"></td>
                        @php $ukupnacena += $cartItem->product->price * $cartItem->quantity @endphp
                        <td><a href="{{route('remove.from.cart')}}" class="remove-from-cart" data-id="{{$cartItem->product->id}}"><i class="fal fa-trash-alt"></i></a></td>
                    </tr>
                @endforeach
            @else
                @php $ukupnacena = 0 @endphp
                @foreach($cart as $id => $proizvod)
                    <tr class="align-middle" data-id="{{$id}}" data-selectable="true">
                        <td><a href="/product/{{$id}}"><img class="korpa-img p-0 m-0" src="{{url('/images/Sraf' . $id . '.jpg')}}" alt="{{$proizvod['Naziv']}}"></a></td>
                        <td><a href="/product/{{$id}}" class="text-decoration-none text-black">{{$proizvod['Naziv']}}</a></td>
                        <td data-name="pojedinacna" data-cena="{{$proizvod['Cena']}}">{{$proizvod['Cena']}}rsd</td>
                        <td><input type="number" name="quantity{{$id}}" data-id="{{$id}}" data-name='qty' value="{{$proizvod['Kolicina']}}" min="1" max="50" class="text-center update-cart" required></td>
                        <td data-cena="{{$proizvod['Cena'] * $proizvod['Kolicina']}}" data-name="UkupnaCena">{{$proizvod['Cena'] * $proizvod['Kolicina']}}rsd</td>
                        @php $ukupnacena += $proizvod['Cena'] * $proizvod['Kolicina'] @endphp
                        <td><a href="{{route('remove.from.cart')}}" class="remove-from-cart" data-id="{{$id}}"><i class="fal fa-trash-alt"></i></a></td>
                    </tr>
                @endforeach
            @endauth
            </tbody>
        </table>
        <div class="d-flex justify-content-end mb-4">
            <a href="/" class="btn btn-primary float-end">Nastavi kupovinu</a>    
            <button class="btn btn-danger float-end mx-2 delete-all">Obrisi sve</button>    
            <p class="h5 align-self-center m-0 total {{ App\Http\Controllers\CartController::updateTotalPrice($ukupnacena) }}" data-cena="{{ $ukupnacena }}">Ukupno: {{ $ukupnacena }}rsd</p>
        </div>
        <hr>
        <form action="{{route('data.input')}}" method="POST">
            @csrf
            <button type="submit" class="btn btn-success float-end">Idi na kasu</button>    
        </form>
    </div>
@else
<h1 class="h1 text-center">Nemate proizvoda u korpi</h1>
@endif
<script>
    $(document).ready(function () {
        formatirajCene();
        $(".update-cart").on('change', function (e) {
            e.preventDefault();
            var id = $(this).attr('data-id');
            var quantity = $(this);
            quantity.val() > 50 ? quantity.val(50) : null;
            quantity.val() < 1 ? quantity.val(1) : null;
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });
            $.ajax({
                type: "POST",
                url: "{{route('update.cart')}}",
                data: {
                    _method:"PATCH",
                    id: id,
                    quantity: quantity.val()
                },
                success: function (response) {
                    var total = 0;
                    var totalQty = 0;
                    var tr = $("tr[data-id='" + id + "']");
                    var cenaReda = tr.find("[data-name='UkupnaCena']");
                    var pojedinacnaCena = tr.find("[data-name='pojedinacna']");
                    cenaReda.attr('data-cena', pojedinacnaCena.data('cena') * quantity.val());
                    $("tr[data-selectable='true']").each(function(index, tr) {
                        total += ~~parseInt($(tr).find("[data-name='UkupnaCena']").attr('data-cena'));
                        totalQty += ~~$(tr).find("[data-name='qty']").val();
                    });
                    $('.total').attr('data-cena',total);
                    $(".cartquantity").html(totalQty);
                    formatirajCene();
                }
            });
        });
        $(".remove-from-cart").click(function (e) {
            e.preventDefault();
            if (window.confirm("Are you sure?")) {
                var id = $(this).data('id');
                $.ajaxSetup({
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    }
                });
                $.ajax({
                    type: "POST",
                    url: "{{route('remove.from.cart')}}",
                    data: {
                        _method: "DELETE",
                        id: id
                    },
                    success: function (response) {
                        $("tr[data-id='" + id + "']").remove();    
                        if(!$("tr[data-selectable='true']").length) window.location.replace('/');  
                        var total = 0;
                        var totalQty = 0;
                        $("tr[data-selectable='true']").each(function(index, tr) {
                            total += ~~parseInt($(tr).find("[data-name='UkupnaCena']").attr('data-cena'));
                            totalQty += ~~$(tr).find("[data-name='qty']").val();
                        });
                        $('.total').attr('data-cena',total);
                        $(".cartquantity").html(totalQty);
                        formatirajCene();
                    }
                });
            }
        });
        $(".delete-all").click(function(e) {
            if (window.confirm("Are you sure?")) {
                var id = [];
                $("tr[data-selectable='true']").each(function(index, tr) {
                    id.push($(this).data('id'));
                });
                $.ajaxSetup({
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    }
                });
                $.ajax({
                    type: "POST",
                    url: "{{route('remove.from.cart')}}",
                    data: {
                        _method: "DELETE",
                        id: id
                    },
                    success: function (response) {
                        $("tr[data-selectable='true']").each(function(index, tr) {
                            $(this).remove();
                        }); 
                        window.location.replace('/');  
                    }
                });
            }
        });
        function formatirajCene(){
            $("tr[data-selectable='true']").each(function(index, tr) {
                $(tr).find("[data-name='UkupnaCena']").html(formatRSD(~~$(tr).find("[data-name='UkupnaCena']").attr('data-cena')) + 'rsd');
                $(tr).find("[data-name='pojedinacna']").html(formatRSD(~~$(tr).find("[data-name='pojedinacna']").attr('data-cena')) + 'rsd');
            });
            $(".total").html("Ukupno: " + formatRSD($(".total").attr('data-cena')) + 'rsd');
        }
    });
</script>
@endsection
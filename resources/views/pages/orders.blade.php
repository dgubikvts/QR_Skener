@extends('layouts/app')
@section('content')

@if($order_id->count() > 0)
<div class="col-12 col-md-10 col-lg-8 col-xl-6 m-auto">
    <table class="table">
    <thead>
        <tr>
        <th scope="col">ID porudzbine</th>
        <th scope="col">User ID</th>
        <th scope="col">Ime</th>
        <th scope="col">Prezime</th>
        <th scope="col">Email</th>
        <th scope="col">Mesto</th>
        <th scope="col">Adresa</th>
        <th scope="col">Telefon</th>
        <th scope="col">Proizvodi</th>
        </tr>
    </thead>
    <tbody>
        @foreach($order_id as $order)
            <tr>
                <td>{{$order->id}}</td>
                <td>{{$order->user_id ? $order->user_id : 'Gost'}}</td>
                <td>{{$order->name}}</td>
                <td>{{$order->lastname}}</td>
                <td>{{$order->email}}</td>
                <td>{{$order->city}}</td>
                <td>{{$order->address}}</td>
                <td>{{$order->phone}}</td>
                <td>
                    <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#Modal{{$order->id}}">Detaljnije</button>
                    <div class="modal fade" id="Modal{{$order->id}}" tabindex="-1" aria-labelledby="ModalLabel{{$order->id}}" aria-hidden="true">
                        <div class="modal-dialog modal-xl">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="ModalLabel{{$order->id}}">Porudzbina #{{$order->id}}</h5>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                </div>
                                <div class="modal-body">
                                    <table class="table">
                                        <thead>
                                            <th></th>
                                            <th>Naziv</th>
                                            <th>Cena</th>
                                            <th>Kolicina</th>
                                        </thead>
                                        <tbody>
                                            @foreach($order->order_item as $item)
                                                @if($order->id === $item->order_id)
                                                    <tr class="align-middle" data-selectable="true">
                                                        <td><img class="korpa-img p-0 m-0" src="{{url('/images/Sraf' . $item->product->id . '.jpg')}}"></td>
                                                        <td>{{$item->product->title}}</td>
                                                        <td data-name="cenaReda" data-cena="{{$item->product->price * $item->quantity}}"></td>
                                                        <td>{{$item->quantity}}</td>
                                                    </tr>
                                                @endif
                                            @endforeach
                                        </tbody>
                                    </table>
                                    <p class="lead text-end ukupno" data-cena="{{ App\Http\Controllers\OrderController::getTotalPrice($order->id) }}"></p>
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>
</div>

@else
<h3 class="text-center h1">Trenutno ne postoji nijedna porudzbina</h3>
@endif
<script>
    $(document).ready(function () {
        function formatirajCene(){
            $("tr[data-selectable='true']").each(function(index, tr) {
                $(tr).find("[data-name='cenaReda']").html(formatRSD($(tr).find("[data-name='cenaReda']").attr('data-cena')) + 'rsd');
            });
            $(".ukupno").each(function(index, ukupno){
                $(ukupno).html("Ukupno: " + formatRSD($(ukupno).attr('data-cena')) + 'rsd');
            });
        }
        formatirajCene();
    });
</script>

@endsection
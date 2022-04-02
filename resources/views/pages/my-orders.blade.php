@extends('layouts/app')
@section('content')

<h3 class="text-center">Moje porudzbine</h3>
<div class="row row-cols-1 g-4 col-12 col-md-8 m-auto">
    @forelse(Auth::user()->orders as $order)
    <div class="col">
        <div class="card">
            <h5 class="card-title text-center mt-3">Porudzbina #{{$order->id}}</h5>
            <hr>
            <table class="table text-center table-borderless">
                <tbody>
                    @foreach($order->order_item as $item)
                    <tr class="align-middle">
                        <td class="p-0 m-0"><img src="{{url($item->product->image)}}" alt="Image" class="korpa-img p-0 m-0"/></td>
                        <td>{{$item->product->title}}</td>
                        <td>{{$item->product->price}}rsd</td>
                        <td>x{{$item->quantity}}</td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
            <hr>
            <p class="lead text-end me-2 total" data-cena="{{$order->price}}"></p>
        </div>
    </div>
        
    @empty
        <h3 class="text-center">Trenutno nemate nijednu porudzbinu</h3>
    @endforelse
 
  
</div>

<script>
    $(document).ready(function () {
        $(".total").each(function() {
            $(this).html("Ukupno: " + formatRSD($(this).attr('data-cena')) + 'rsd');
        });
    });
    
</script>

@endsection
@extends('layouts/app')
@section('content')
    
<div class="row">
    <h3 class="h1 text-center mb-5">Unos podataka</h3>
    <div class="col-6 offset-1">
        <form action="{{ route('submit.order') }}" method="POST" class="col-12">
            @csrf
            @method('PUT')
            <div class="row mb-4 justify-content-center">
                <div class="col-12 col-lg-2">
                    <label for="name" class="col-form-label">Ime:</label>
                </div>
                <div class="col-12 col-lg-auto">
                    <input type="text" name="name" id="name" class="form-control" value="@auth{{Auth::user()->name}}@endauth" required autocomplete="given-name">
                </div>
            </div>  
            <div class="row mb-4 justify-content-center">
                <div class="col-12 col-lg-2">
                    <label for="lastname" class="col-form-label">Prezime:</label>
                </div>
                <div class="col-12 col-lg-auto">
                    <input type="text" name="lastname" id="lastname" class="form-control" value="@auth{{Auth::user()->lastname}}@endauth" required autocomplete="family-name">
                </div>
            </div>  
            <div class="row mb-4 justify-content-center">
                <div class="col-12 col-lg-2">
                    <label for="email" class="col-form-label">Email:</label>
                </div>
                <div class="col-12 col-lg-auto">
                    <input type="email" name="email" id="email" class="form-control" value="@auth{{Auth::user()->email}}@endauth" required autocomplete="email">
                </div>
            </div>  
            <div class="row mb-4 justify-content-center">
                <div class="col-12 col-lg-2">
                    <label for="phone" class="col-form-label">Broj telefona:</label>
                </div>
                <div class="col-12 col-lg-auto">
                    <input type="text" pattern="[0-9]*" name="phone" id="phone" class="form-control" value="@auth{{Auth::user()->phone}}@endauth" required autocomplete="tel-national">
                </div>
            </div>  
            <div class="row mb-4 justify-content-center">
                <div class="col-12 col-lg-2">
                    <label for="city" class="col-form-label">Grad:</label>
                </div>
                <div class="col-12 col-lg-auto">
                    <input type="text" name="city" id="city" class="form-control" value="@auth{{Auth::user()->city}}@endauth" required autocomplete="home city">
                </div>
            </div>  
            <div class="row mb-4 justify-content-center">
                <div class="col-12 col-lg-2">
                    <label for="address" class="col-form-label">Ulica i broj:</label>
                </div>
                <div class="col-12 col-lg-auto">
                    <input type="text" name="address" id="address" class="form-control" value="@auth{{Auth::user()->address}}@endauth" required autocomplete="address">
                </div>
            </div>  
            <button type="submit" class="btn btn-success d-lg-block m-lg-auto">Poruci</button>
        </form>
    </div>
    <div class="col-5 text-center">
        <h3 class="mb-3">Vasa korpa</h3>
        <div class="row row-cols-1 row-cols-md-1 row-cols-lg-2 row-cols-xxl-3 g-4">
            @foreach($cartItems as $id=>$cartItem)
                <div class="col">
                    <div class="card h-100">
                        <div class="card-body d-flex flex-column">
                            <h6 class="card-title">@auth {{$cartItem->product->title}} @else {{$cartItem['Naziv']}} @endauth</h6>
                            <img src="@auth {{url($cartItem->product->image)}} @else {{url('/images/Sraf' . $id . '.jpg')}} @endauth" alt="@auth {{$cartItem->product->title}} @else {{$cartItem['Naziv']}} @endauth">
                            <br>
                            <div class="mt-auto">
                                <p class="my-0 py-0">Kolicina: @auth {{$cartItem->quantity}} @else {{$cartItem['Kolicina']}} @endauth</p>
                                <p class="card-text lead cena" data-cena="@auth{{$cartItem->product->price * $cartItem->quantity}}@else{{$cartItem['Cena'] * $cartItem['Kolicina']}}@endauth"></p>
                            </div>

                        </div>
                    </div>
                </div>  
            @endforeach
        </div>
        <hr>
        <h3 class="h3 my-3 ukupno" data-cena="@auth{{$cartItem->cart->price}}@else{{session()->get('total')}}@endauth"></h3>
    </div>
</div>

<script>
    $(document).ready(function () {
        formatirajCene();
        function formatirajCene(){
            $(".cena").each(function(index, p) {
                $(p).html(formatRSD($(p).attr('data-cena') + 'rsd'));
            });
            $('.ukupno').html('Ukupno: ' + formatRSD($('.ukupno').attr('data-cena')) + 'rsd');
        }
    });
</script>
@endsection
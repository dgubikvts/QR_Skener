@extends('layouts/app')
@section('content')
    
<div class="row">
    <div class="col-6 offset-2">
        <form action="{{ route('submit.order') }}" method="POST">
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
    <div class="col-3 text-center">
        <h3 class="h1 text-center mb-4">Proizvodi</h3>
        @foreach($cartItems as $id=>$cartItem)
            <p class="lead">@auth {{$cartItem->product->title}} @else {{$cartItem['Naziv']}} @endauth</p>
            <div class="row">
                <div class="col-5">
                    <img class="w-100" src="@auth {{url($cartItem->product->image)}} @else {{url('/images/Sraf' . $id . '.jpg')}} @endauth" alt="@auth {{$cartItem->product->title}} @else {{$cartItem['Naziv']}} @endauth">
                </div>
                <div class="col-3 offset-4 align-self-center">
                    <h3 class="h3">x @auth {{$cartItem->quantity}} @else {{$cartItem['Kolicina']}} @endauth</h3>
                </div>
            </div>
            <p class="h3 my-3 cena" data-cena="@auth {{$cartItem->product->price * $cartItem->quantity}} @else {{$cartItem['Cena'] * $cartItem['Kolicina']}} @endauth"></p>
            <hr>
        @endforeach
        <h3 class="h3 my-3 ukupno" data-cena="@auth {{$cartItem->cart->price}} @else {{session()->get('total')}} @endauth"></h3>
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
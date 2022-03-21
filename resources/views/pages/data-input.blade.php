@extends('layouts/app')
@section('content')
    
<div class="row">
    <div class="col-6 offset-2">
        <form action="{{ route('submit.order') }}" method="POST">
            @csrf
            @method('PUT')
            <div class="row mb-4 justify-content-center">
                <div class="col-12 col-lg-2">
                    <label for="ime" class="col-form-label">Ime:</label>
                </div>
                <div class="col-12 col-lg-auto">
                    <input type="text" name="ime" id="ime" class="form-control" value="@auth{{Auth::user()->name}}@endauth" required>
                </div>
            </div>  
            <div class="row mb-4 justify-content-center">
                <div class="col-12 col-lg-2">
                    <label for="prezime" class="col-form-label">Prezime:</label>
                </div>
                <div class="col-12 col-lg-auto">
                    <input type="text" name="prezime" id="prezime" class="form-control" value="@auth{{Auth::user()->lastname}}@endauth" required>
                </div>
            </div>  
            <div class="row mb-4 justify-content-center">
                <div class="col-12 col-lg-2">
                    <label for="email" class="col-form-label">Email:</label>
                </div>
                <div class="col-12 col-lg-auto">
                    <input type="email" name="email" id="email" class="form-control" value="@auth{{Auth::user()->email}}@endauth" required>
                </div>
            </div>  
            <div class="row mb-4 justify-content-center">
                <div class="col-12 col-lg-2">
                    <label for="telefon" class="col-form-label">Broj telefona:</label>
                </div>
                <div class="col-12 col-lg-auto">
                    <input type="text" pattern="[0-9]*" name="telefon" id="telefon" class="form-control" value="@auth{{Auth::user()->phone}}@endauth" required>
                </div>
            </div>  
            <div class="row mb-4 justify-content-center">
                <div class="col-12 col-lg-2">
                    <label for="grad" class="col-form-label">Grad:</label>
                </div>
                <div class="col-12 col-lg-auto">
                    <input type="text" name="grad" id="grad" class="form-control" value="@auth{{Auth::user()->city}}@endauth" required>
                </div>
            </div>  
            <div class="row mb-4 justify-content-center">
                <div class="col-12 col-lg-2">
                    <label for="ulica" class="col-form-label">Ulica i broj:</label>
                </div>
                <div class="col-12 col-lg-auto">
                    <input type="text" name="ulica" id="ulica" class="form-control" value="@auth{{Auth::user()->address}}@endauth" required>
                </div>
            </div>  
            <button type="submit" class="btn btn-success d-lg-block m-lg-auto">Poruci</button>
        </form>
    </div>
    <div class="col-3 text-center">
        <h3 class="h1 text-center mb-4">Proizvodi</h3>
        @foreach($cart as $id=>$proizvod)
            <p class="lead">@auth {{$proizvod->product->naziv}} @else {{$proizvod['Naziv']}} @endauth</p>
            <div class="row">
                <div class="col-5">
                    <img class="w-100" src="@auth {{url($proizvod->product->slika)}} @else {{url('/images/Sraf' . $id . '.jpg')}} @endauth" alt="@auth {{$proizvod->product->naziv}} @else {{$proizvod['Naziv']}} @endauth">
                </div>
                <div class="col-3 offset-4 align-self-center">
                    <h3 class="h3">x @auth {{$proizvod->quantity}} @else {{$proizvod['Kolicina']}} @endauth</h3>
                </div>
            </div>
            <p class="h3 my-3 cena" data-cena="@auth {{$proizvod->product->cena * $proizvod->quantity}} @else {{$proizvod['Cena'] * $proizvod['Kolicina']}} @endauth"></p>
            <hr>
        @endforeach
        <h3 class="h3 my-3 ukupno" data-cena="@auth {{$proizvod->cart->price}} @else {{session()->get('total')}} @endauth"></h3>
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
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
                    <input type="text" name="ime" id="ime" class="form-control" required>
                </div>
            </div>  
            <div class="row mb-4 justify-content-center">
                <div class="col-12 col-lg-2">
                    <label for="prezime" class="col-form-label">Prezime:</label>
                </div>
                <div class="col-12 col-lg-auto">
                    <input type="text" name="prezime" id="prezime" class="form-control" required>
                </div>
            </div>  
            <div class="row mb-4 justify-content-center">
                <div class="col-12 col-lg-2">
                    <label for="email" class="col-form-label">Email:</label>
                </div>
                <div class="col-12 col-lg-auto">
                    <input type="email" name="email" id="email" class="form-control" required>
                </div>
            </div>  
            <div class="row mb-4 justify-content-center">
                <div class="col-12 col-lg-2">
                    <label for="telefon" class="col-form-label">Broj telefona:</label>
                </div>
                <div class="col-12 col-lg-auto">
                    <input type="text" name="telefon" id="telefon" class="form-control" required>
                </div>
            </div>  
            <div class="row mb-4 justify-content-center">
                <div class="col-12 col-lg-2">
                    <label for="grad" class="col-form-label">Grad:</label>
                </div>
                <div class="col-12 col-lg-auto">
                    <input type="text" name="grad" id="grad" class="form-control" required>
                </div>
            </div>  
            <div class="row mb-4 justify-content-center">
                <div class="col-12 col-lg-2">
                    <label for="ulica" class="col-form-label">Ulica i broj:</label>
                </div>
                <div class="col-12 col-lg-auto">
                    <input type="text" name="ulica" id="ulica" class="form-control" required>
                </div>
            </div>  
            <button type="submit" class="btn btn-success d-lg-block m-lg-auto">Poruci</button>
        </form>
    </div>
    <div class="col-3 text-center">
        <h3 class="h1 text-center mb-4">Proizvodi</h3>
        @foreach(session('cart') as $c=>$proizvod)
            <p class="lead">{{$proizvod['Naziv']}}</p>
            <div class="row">
                <div class="col-9">
                    <img class="w-100" src="{{url('/images/Sraf' . $c . '.jpg')}}" alt="{{$proizvod['Naziv']}}">
                </div>
                <div class="col-3 align-self-center">
                    <h3 class="h3">x{{$proizvod['Kolicina']}}</h3>
                </div>
            </div>
            <p class="h3 my-3">{{$proizvod['Cena'] * $proizvod['Kolicina']}}rsd</p>
            <hr>
        @endforeach
    </div>
</div>

@endsection
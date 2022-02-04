@extends('layouts/app')
@section('content')
    <h1 class="display-6 my-5 text-center">Pretraga za: {{$query}}</h1>
    <div class="d-flex flex-wrap justify-content-start">
    @if(count($proizvod) > 0)
        @foreach($proizvod as $p)
            <div class="card mb-5 mx-4" style="width: 18rem;">
                <a href="{{ url('proizvod/'.$p->id)}}" class="link"><h6 class="card-title text-center mt-4">{{$p->naziv}}</h6></a>
                <div class="card-body d-flex flex-column">
                    <div style="height:200px">
                        <img class="card-img-top" src="{{url('/images/Sraf' . $p->id . '.jpg')}}" alt="{{$p->naziv}}">
                    </div>
                    <p class="card-text">{{$p->opis}}</p>
                    <p class="card-text lead mt-auto">Cena: {{$p->cena}}rsd</p>
                    <a href="#" class="btn btn-primary mt-auto">Dodaj u korpu</a>
                </div>
            </div>
        @endforeach
        </div>
    @else
        <h1>Nema proizvoda koji se poklapaju vasoj pretrazi</h1>
    @endif
@endsection
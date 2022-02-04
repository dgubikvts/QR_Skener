@extends('layouts/app')
@section('content')

<h1 class="text-center display-4 my-5">Katalog</h1>
<div class="d-flex flex-wrap justify-content-start">
    @if(count($srafovi) > 0)
        @foreach($srafovi as $s)
            <div class="card mb-5 mx-4" style="width: 18rem;">
                <a href="{{ url('proizvod/'.$s->id)}}" class="link"><h6 class="card-title text-center mt-4">{{$s->naziv}}</h6></a>
                <div class="card-body d-flex flex-column">
                    <div style="height:200px">
                        <img class="card-img-top" src="{{url('/images/Sraf' . $s->id . '.jpg')}}" alt="{{$s->naziv}}">
                    </div>
                    <p class="card-text">{{$s->opis}}</p>
                    <p class="card-text lead mt-auto">Cena: {{$s->cena}}rsd</p>
                    <a href="#" class="btn btn-primary mt-auto">Dodaj u korpu</a>
                </div>
            </div>
        @endforeach
    @else
        <h1>Katalog je prazan</h1>
    @endif
</div>
@endsection 
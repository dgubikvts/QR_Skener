@extends('layouts/app')
@section('content')
    <div class="container">
    @if($proizvod !== null)
        <h1 class="display-5 my-5">{{$proizvod->naziv}}</h1>
        <div class="d-flex justify-content-around">
            <div>
                <img src="{{url('/images/Sraf' . $proizvod->id . '.jpg')}}" alt="Image" class="img-fluid col-12 col-md-8"/>
            </div>
            <div class="text-right row">
                <p class="lead">{{$proizvod->opis}}</p>
                <p class="display-6">Cena: {{$proizvod->cena}}rsd</p>
                <div class=" align-self-end ">
                    <a href="#" class="btn btn-primary">Dodaj u korpu</a>
                </div>
            </div>
        </div>
    @else
        <h1>Taj proizvod ne postoji</h1>
    @endif
    </div>
@endsection
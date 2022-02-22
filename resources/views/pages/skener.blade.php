@extends('layouts/app')
@section('content')
    @if(session()->has('error')) 
    <div class="alert alert-danger alert-popup errors" role="alert">
        {{session('error')}}
    </div>
    @endif
    <div style="width: 500px" id="reader" class="d-block m-auto mt-5"></div>
@endsection
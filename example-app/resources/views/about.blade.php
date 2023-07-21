@extends('layouts.main')
@section ('container')
    <h1>Halaman About</h1>
    <h1>{{$name}}</h1>
    <h1>{{$email}}</h1>
    <img src="img/{{$img}}" width="200" alt="{{$name}}">
@endsection
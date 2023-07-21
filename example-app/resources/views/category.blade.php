{{-- <!-- Remember @dd is laravel shorthand function for var_dump() and die() function in php --> --}}
{{-- @dd($posts) --}}

@extends('layouts.main')

@section('container')

    <h1 class="mb-5">Post Category : {{$category}}</h1>

    @foreach ($posts as $item)
        <article class="mb-5">
            <h2>
                <a href="/post/{{$item->slug}}">{{$item->title}}</h2></a>
            {{-- <h5>By : {{$item['author']}}</h5> --}}
            <p>{{$item->excerpt}}</p>
        </article>
    @endforeach

    
@endsection

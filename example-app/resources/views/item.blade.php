{{-- @dd($post) --}}

@extends('layouts.main')

@section('container')

    <div class="container">
        <div class="row justify-content-center mb-5">
            <div class="col-md-8">
                <h2 class="mb-3">{{$post->title}}</h2>
                <p>By. <a href="/post?author={{$post->author->name}}" class="text-decoration-none">{{$post->author->name}}</a> in 
                    <a href="/post?category={{$post->category->slug}}" class="text-decoration-none">{{$post->category->name}}</a></p>
                @if ($post->image)
                    <div style="max-height:350px; overflow:hidden">
                        <img src="{{asset('storage/' . $post->image)}}" alt="{{$post->category->name}}"
                            class="img-fluid">
                    </div>
                @else
                    <img src="https://source.unsplash.com/1200x400?{{$post->category->name}}" alt="{{$post->category->name}}"
                        class="img-fluid">
                @endif
                <article class="my-3 fs-5">
                    {!!$post->body!!}
                </article>
                <a href="/post" class="d-block mt-5">Back to Post</a>
            </div>
        </div>
    </div>
        
    {{-- <h5>{{$post['author']}}</h5> --}}
    
@endsection
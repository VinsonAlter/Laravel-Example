{{-- <!-- Remember @dd is laravel shorthand function for var_dump() and die() function in php --> --}}
{{-- @dd($posts) --}}

@extends('layouts.main')

@section('container')

    <h1 class="mb-3 text-center">{{$title}}</h1>

    <div class="row justify-content-center mb-3">
        <div class="col-md-6">
            <form action="/post">
                @if(request('category'))
                    <input type="hidden" name="category" value="{{request('category')}}">
                @endif
                @if(request('author'))
                    <input type="hidden" name="author" value="{{request('author')}}">
                @endif
                <div class="input-group mb-3">
                    <input type="text" class="form-control" placeholder="Search..." name="search"    
                        value="{{request('search')}}">
                    <button class="btn btn-danger" type="submit" >Search</button>
                  </div>
            </form>
        </div>
    </div>

    @if ($posts->count()) 
        <div class="card mb-3">
            @if ($posts[0]->image)
                <div style="max-height:350px; overflow:hidden">
                    <img src="{{asset('storage/' . $posts[0]->image)}}" alt="{{$posts[0]->category->name}}"
                        class="img-fluid">
                </div>
            @else
                <img src="https://source.unsplash.com/1200x400?{{$posts[0]->category->name}}" class="card-img-top" alt="{{$posts[0]->category->name}}">
            @endif
            <div class="card-body text-center">
                <h5 class="card-title"><a href="/post/{{$posts[0]->slug}}" class="text-decoration-none text-dark">{{$posts[0]->title}}</a></h5>
                <p><small class="text-muted">
                    By. <a href="/post?author={{$posts[0]->author->name}}" class="text-decoration-none">{{$posts[0]->author->name}}</a> in <a href="/post?category={{$posts[0]->category->slug}}" class="text-decoration-none">
                      {{$posts[0]->category->name}}</a> {{$posts[0]->created_at->diffForHumans()}}</small>
                </p>
                <p class="card-text">{{$posts[0]->excerpt}}</p>
                <a href="/post/{{$posts[0]->slug}}" class="text-decoration-none btn btn-primary">Read More...</a>
            </div>
        </div>
    
        <div class="container">
            <div class="row">
                @foreach ($posts->skip(1) as $post)
                <div class="col-md-4 mb-3">
                    <div class="card" style="width: 18rem;">
                        <div class="position-absolute bg-dark px-3 py-2" style="background-color:rgba(0, 0, 0, 0.7)">
                            <a href="/post?category={{$post->category->slug}}" class="text-white text-decoration-none">{{$post->category->name}}</a>
                        </div>
                        @if ($post->image)
                            <img src="{{asset('storage/' . $post->image)}}" alt="{{$post->category->name}}"
                                class="img-fluid">
                        @else
                            <img src="https://source.unsplash.com/500x500?{{$post->category->name}}" class="card-img-top" alt="{{$post->category->name}}">
                        @endif
                        <div class="card-body">
                        <h5 class="card-title">{{$post->title}}</h5>
                            <p><small class="text-muted">
                                By. <a href="/post?author={{$post->author->name}}" class="text-decoration-none">{{$post->author->name}}</a>
                                {{$post->created_at->diffForHumans()}}</small>
                            </p>
                        <p class="card-text">{{$post->excerpt}}</p>
                        <a href="/post/{{$post->slug}}" class="btn btn-primary">Go somewhere</a>
                        </div>
                    </div>
                </div>
                @endforeach
            </div>
        </div>

    @else 
        <p class="text-center fs-4">No Post found</p>
    @endif
    
    <div class="d-flex justify-content-end">
        {{$posts->links()}}
    </div>

    {{-- @foreach ($posts->skip(1) as $item)
        <article class="mb-5 border-bottom">
            <h2><a href="/post/{{$item->slug}}" class="text-decoration-none">{{$item->title}}</h2></a>
            <p>By. <a href="/authors/{{$item->author->name}}" class="text-decoration-none">{{$item->author->name}}</a> in <a href="/categories/{{$item->category->slug}}" class="text-decoration-none">
                {{$item->category->name}}</a></p>
            <p>{{$item->excerpt}}</p>
            <a href="/post/{{$item->slug}}" class="text-decoration-none">Read More...</a>
        </article>
    @endforeach --}}

    
@endsection

<!-- https://source.unsplash.com/1600x900/?nature,water-->
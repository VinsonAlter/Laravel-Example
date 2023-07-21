@extends('dashboard.layouts.main')

@section('container')
    <div class="container">
        <div class="row my-5">
            <div class="col-lg-8">
                <h2 class="mb-3">{{$post->title}}</h2>
                <a href="/dashboard/posts" class="btn btn-success">
                    <i class="bi bi-arrow-left"></i> Back to all my posts</a>
                <a href="/dashboard/posts/{{$post->slug}}/edit" class="btn btn-warning">
                    <i class="bi bi-pencil-square"></i> Edit</a>
                {{-- <a href="" class="btn btn-danger">
                    <i class="bi bi-x-circle"></i> Delete</a> --}}
                <form action="/dashboard/posts/{{$post->slug}}" method="post" class="d-inline">
                    @method('delete')
                    @csrf
                    <button class="btn btn-danger" onclick="return confirm('Are you sure?')"><i class="bi bi-x-circle"></i>
                        Delete</button> 
                </form>
                <!-- get unsplash image if image is empty, otherwise fetch the img from database -->
                @if ($post->image)
                    <div style="max-height:350px; overflow:hidden">
                        <img src="{{asset('storage/' . $post->image)}}" alt="{{$post->category->name}}"
                            class="img-fluid mt-3">
                    </div>
                @else
                    <img src="https://source.unsplash.com/1200x400?{{$post->category->name}}" alt="{{$post->category->name}}"
                        class="img-fluid mt-3">
                @endif
                <article class="my-3 fs-5">
                    {!!$post->body!!}
                </article>
                <a href="/post" class="d-block mt-5">Back to Post</a>
            </div>
        </div>
    </div>
@endsection
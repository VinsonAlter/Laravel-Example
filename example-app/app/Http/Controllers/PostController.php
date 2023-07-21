<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Post;
use App\Models\Category;
use App\Models\User;

class PostController extends Controller
{


    public function index() 
    {
        // $post = Post::latest();

        // @dd(request('search'));
        $title = '';

        if(request('category')){
            $category = Category::firstWhere('slug', request('category'));
            $title = ' in ' . $category->name;    
        }

        if(request('author')){
            $author = User::firstWhere('name', request('author'));
            $title = ' by ' . $author->name;
        }

        return view('post', [
            "title" => "All Posts" . $title,
            // "active" => 'post',
            // "posts" => Post::all()
            "posts" => Post::latest()->filter(request(['search', 'category', 'author']))->paginate(7)->withQueryString()
        ]);

        
    }

    public function show(Post $post)
    {
        return view('item', [
            "title" => "Single Post",
            // "active" => 'post',
            "post" => $post
        ]);
    }
}

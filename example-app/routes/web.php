<?php

// use App\Models\Post;
use App\Models\Category;
// use App\Models\User;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PostController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\DashboardPostController;
use App\Http\Controllers\AdminCategoryController;

/* here's the way to make custom middleware
   php artisan make middleware middlewareName,
   after creating your own middleware, register it to kernel.php at protected $routeMiddleware
*/

/* to connect to models */
/* use App\Models\Post; */

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('home', [
        "title" => "Home",
        // "active" => "home"
    ]);
});

Route::get('/about', function(){
    return view('about', [
        "title" => "About",
        "name" => "Vinson",
        "email" => "vinson@gmail.com",
        "img" => "Jenis Klakson Mobil.jpg",
        // "active" => 'about'
    ]);
});

// not used anymore, since changed to controllers
// Route::get('/blog', function(){
    // $blog_posts = [
    //     [
    //         "title" => "Judul Post Pertama",
    //         "slug" => "judul-post-pertama",
    //         "author" => "Vinson",
    //         "body" => "Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. 
    //         Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. 
    //         Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. 
    //         Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum"
    //     ],
    //     [
    //         "title" => "Judul Post Kedua",
    //         "slug" => "judul-post-kedua",
    //         "author" => "Dummy",
    //         "body" => "Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque laudantium, 
    //                     totam rem aperiam, eaque ipsa quae ab illo inventore veritatis et quasi architecto beatae vitae dicta sunt explicabo. 
    //                     Nemo enim ipsam voluptatem quia voluptas sit aspernatur aut odit aut fugit, 
    //                     sed quia consequuntur magni dolores eos qui ratione voluptatem sequi nesciunt. Neque porro quisquam est, qui dolorem ipsum quia dolor sit amet, consectetur, adipisci velit, sed quia non numquam eius modi tempora incidunt ut labore et dolore magnam aliquam quaerat voluptatem. Ut enim ad minima veniam, quis nostrum exercitationem ullam corporis suscipit laboriosam, nisi ut aliquid ex ea commodi consequatur? Quis autem vel eum iure reprehenderit qui in 
    //                     ea voluptate velit esse quam nihil molestiae consequatur, vel illum qui dolorem eum fugiat quo voluptas nulla pariatur?"
    //     ]
    // ];
    
    
    // return view('post', [
    //     "title" => "Post",
    //     "posts" => Post::all()
    // ]);
// });

Route::get('/post', [PostController::class, 'index']);

// Not used anymore, since changed to controllers
// halaman single post
// Route::get('post/{slug}', function($slug) {
    // $blog_posts = [
    //     [
    //         "title" => "Judul Post Pertama",
    //         "slug" => "judul-post-pertama",
    //         "author" => "Vinson",
    //         "body" => "Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. 
    //         Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. 
    //         Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. 
    //         Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum"
    //     ],
    //     [
    //         "title" => "Judul Post Kedua",
    //         "slug" => "judul-post-kedua",
    //         "author" => "Dummy",
    //         "body" => "Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque laudantium, 
    //                     totam rem aperiam, eaque ipsa quae ab illo inventore veritatis et quasi architecto beatae vitae dicta sunt explicabo. 
    //                     Nemo enim ipsam voluptatem quia voluptas sit aspernatur aut odit aut fugit, 
    //                     sed quia consequuntur magni dolores eos qui ratione voluptatem sequi nesciunt. Neque porro quisquam est, qui dolorem ipsum quia dolor sit amet, consectetur, adipisci velit, sed quia non numquam eius modi tempora incidunt ut labore et dolore magnam aliquam quaerat voluptatem. Ut enim ad minima veniam, quis nostrum exercitationem ullam corporis suscipit laboriosam, nisi ut aliquid ex ea commodi consequatur? Quis autem vel eum iure reprehenderit qui in 
    //                     ea voluptate velit esse quam nihil molestiae consequatur, vel illum qui dolorem eum fugiat quo voluptas nulla pariatur?"
    //     ]
    // ];
    // $new_post = [];
    // foreach($blog_posts as $post) {
    //     if($post['slug'] === $slug) {
    //         $new_post = $post;
    //     }
    // }

    // return view('item', [
    //     "title" => "Single Post",
    //     "post" => Post::find($slug)
    // ]);
// });

Route::get('/post/{post:slug}', [PostController::class, 'show']);

Route::get('/categories', function() {
    return view('categories', [
        'title' => 'Post Categories',
        // 'active' => 'categories',
        'categories' => Category::all()
    ]);
});

// Route::get('/categories/{category:slug}', function(Category $category){
//     return view('post', [
//         'title' => "Post By Category : $category->name",
//         'active' => 'categories',
//         'posts' => $category->post->load('category', 'author')
//         // 'category' => $category->name
//     ]);
// });

// Route::get('/authors/{author:name}', function(User $author) {
//     return view('post', [
//         'title' => "Post By Author : $author->name",
//         'active' => 'post',
//         'posts' => $author->posts->load('category', 'author')
//     ]);
// });

// middleware guest means user that didn't have a login can access this part, means that 
// only guest can access this part
Route::get('/login', [LoginController::class, 'index'])->name('login')->middleware('guest');

Route::post('/login', [LoginController::class, 'authenticate']);

Route::post('/logout', [LoginController::class, 'logout']);

Route::get('/register', [RegisterController::class, 'index'])->middleware('guest');

Route::post('/register', [RegisterController::class, 'store']);

// means that only user that login, can access this part
Route::get('/dashboard', function() {
    return view('dashboard.index');
})->middleware('auth');

Route::get('/dashboard/posts/checkSlug', [DashboardPostController::class, 'checkSlug'])->middleware('auth');
Route::resource('/dashboard/posts', DashboardPostController::class)->middleware('auth');

// disable 'show' function inside resource route, 

// authorize via providers
Route::resource('/dashboard/categories', AdminCategoryController::class)->except('show');

// this is you authorize using middleware, another way is to authorize the resource via AppServiceProvider
Route::resource('/dashboard/categories', AdminCategoryController::class)->except('show')->middleware('is_admin');
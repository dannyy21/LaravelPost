<?php

// use App\Models\User;
// use App\Models\Postt;

use App\Http\Controllers\DashboardController;
use App\Http\Controllers\DashboardPostController;
use App\Models\Category;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PostController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\RegisterController;
use SebastianBergmann\CodeCoverage\Report\Html\Dashboard;

// mengubungkan folder web dengan Post php di models

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

Route::get('/', function () { // slash itu untuk alamat web yang ditulis di alamat web
    return view('home',[
        "title" => "home",
        "active" => 'home'
    ]); //return view welcome itu cari di folder view yang bernama welcome
});
Route::get('/about', function () { // slash itu untuk alamat web yang ditulis di alamat web
    return view('about', [
        "active" => 'about',
        "title" => "About",
        "name" => "danny",
        "email" => "dpp",
        "img" => "d.jpg"
    ]); //return view welcome itu cari di folder view yang bernama welcome
});

Route::get('/posts', [PostController::class, 'index']);
// ini ke controller dimana file class PostController yg ber function index
// Route::get('/posts', function () { // slash itu untuk alamat web yang ditulis di alamat web 
// });
//halaman single post
Route::get('/post/{post:slug}', [PostController::class, 'show']); 
//post:slug adalah link nya berdasarkan slug yang mana ada di db 
// berhubungan dengan controller
    //blogpost sebagai post, di post jika ada slug yang sama dengan slug maka newpost keluarkan $post

// Route::get('/categories/{category:slug}', function(Category $category){//function ini menghubungan model tanpa controler namafile $namaini ::slug liat sebelumnya
// //: nya 1 aja 
//     return view('posts',[
//         //view nama file
//         'title' => "Post By Category : $category->name",
//         'posts' => $category->posts->load('category', 'author'),
//         'active' => 'categories'
    

//     ]);

// });

Route::get('/categories', function(){
    return view('categories',[
        'title' => 'Post Categories',
        "active" => 'categories',
        // biar nyala isinya sesuai view yg ada di navbar
        'categories' => Category::all()
        // category::all() itu tampilin semua data
    ]);
});

Route::get('/login', [LoginController::class, 'index'])->name('login')->middleware('guest');
// name login itu ngash tau namanya login jadi ngasi nama ke url jadi ga terpaku ke url
// midleware guest itu jadi login itu diakses buat yg blm otentikasi(login)
// app\provider\routeserviceprovider
Route::post('/login', [LoginController::class, 'authenticate']);

Route::get('/register', [RegisterController::class, 'index'])->middleware('guest');
Route::post('/register', [RegisterController::class, 'store']);
Route::get('/dashboard', function(){
    return view('dashboard.index');
})->middleware('auth');//auth buat yg bisa akses ini yg udah login
Route::post('/logout', [LoginController::class, 'logout']);

//gini bacanya klo ada request halaman register tapi method post maka panggil postcontroller dengan metod store 

Route::get('/dashboard/posts/checkSlug', [DashboardPostController::class, 'checkSlug'])->middleware('auth');
Route::resource('/dashboard/posts', DashboardPostController::class)->middleware('auth');
// kalo udah masuk kesini tingaal methodnya aja soalnya otomatis langsung masuk ke controller


// Route::get('/authors/{author:username}', function(User $author){
//     // cara link sesuai yg mau itu user:ini sesuai di db
//     return view('posts',[
//         'title' => "Post By Author : $author->name",
//         'posts' => $author->posts->load('category', 'author'),
//         // category::all() itu tampilin semua data
//     ]);
// });




//

    //ini itu ngambil dari slug nya berdasarkan slug terus masuk ke single post yang namanya file post di folder view


    // Route::get('/post (nama file)/{post:slug}(masuk controller)', [PostController::class, 'show'(alamat controller)]);

<?php

namespace App\Http\Controllers;

use App\Models\Category;
use  App\Models\Postt;
use App\Models\User;
use Illuminate\Auth\Middleware\Authorize;
use Illuminate\Http\Request;

class PostController extends Controller
{
    public function index(){
            // $posts = Postt::latest();
            // cari di postt postingan pertama
        $title = '';
        if (request('category')) {
            $category = Category::firstWhere('slug', request('category'));
            $title = ' in ' . $category->name;
        }
        if (request('author')){
            $author = User::firstWhere('username', request('author'));
            $title = ' by ' . $author->name;
        }

        return view('posts',[
            "title" => "All Posts" . $title,
            "active" => 'posts',
            // biar nyala
            "posts" => Postt::latest()->filter(request(['search', 'category', 'author']))->paginate(7)->withQueryString()//apapun query string sbelumnya bakal dibawa
            // paginate buat next halaman 
            // get()
            // filter itu dari function scopeFilter
            // berhubungan sama models post 
            //
            // latest itu biar yg terbaru
            // posts => Post ::all() adalah tampilkan yang ada di Post degang method all() yang ada di file Post di models
        ]); //return view welcome itu cari di folder view yang bernama welcome
    }

    public function show(Postt $post){
        //model $yg ada di route web
    return view ('post',[
        "title" => "Single Post",
        "active" => 'posts',
        "post" => $post
        // "post" => Postt::find($id)
        //Postt::all() / find ini Postt nya sesuai nama yang ada di model
    ]);
         
    }
    
}

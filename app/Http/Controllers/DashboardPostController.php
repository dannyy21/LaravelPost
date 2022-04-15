<?php

namespace App\Http\Controllers;

use App\Models\Postt;
use App\Models\Category;
use Cviebrock\EloquentSluggable\Services\SlugService;
use Illuminate\Http\Request;
use Illuminate\Support\Str;


class DashboardPostController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {   
        return view('/dashboard.posts.index', [
            'posts' => Postt::where('user_id', auth()->user()->id)->get()
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('dashboard.posts.create', [
            'categories' => Category::all()
            // unutk kategori 
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
       $validatedData = $request->validate([
           'title' => 'required|max:255',
           'slug' => 'required|unique:postts',
        //    kalo disini masuk nya nama db ya 
           'category_id' => 'required',
           'body' => 'required'
        //    suapaya input ga sembarangbiar ada message lanjut di voew 
       ]);

       $validatedData['user_id'] = auth()->user()->id;
       $validatedData['excerpt'] = Str::limit(strip_tags($request->body), 200);

       Postt::create($validatedData);

       return redirect('/dashboard/posts')->with('success', 'New post has been added !');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function show(Postt $post)
    {
        return view('dashboard.posts.show',[
            'post' => $post
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function edit(Postt $post)
    {
        return view('/dashboard.posts.edit', [
            'post' => $post,
            'categories' =>Category::all()
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Postt $post)
    // request ini apa yg kita tulis baru da Postt itu data lama 
    {
        $rules =[
            'title' => 'required|max:255',
         //    kalo disini masuk nya nama db ya 
            'category_id' => 'required',
            'body' => 'required'
         //    suapaya input ga sembarangbiar ada message lanjut di voew 
        ];

        if($request->slug != $post->slug){
            $rules['slug'] = 'required|unique:postts';
        }

        $validatedData = $request->validate($rules);
        // biar slug ga error kalo sama kan masih ada di db jadi tkut nimpa dan unik jadi error
        $validatedData['user_id'] = auth()->user()->id;
        $validatedData['excerpt'] = Str::limit(strip_tags($request->body), 200);
 
        Postt::where('id', $post->id)
                ->update($validatedData);
 
        return redirect('/dashboard/posts')->with('success', 'post has been updated !');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function destroy(Postt $post)
    {
        Postt::destroy($post->id);
       return redirect('/dashboard/posts')->with('success', 'Posts has been deleted !');
   
    }

    public function checkSlug(Request $request){

        $slug = SlugService::createSlug(Postt::class, 'slug', $request->title);
        return response()->json(['slug' => $slug]);
    }
}

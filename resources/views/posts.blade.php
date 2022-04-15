
@extends('layouts.main')

@section('container')

    <h1 class="mb-3 text-center">{{ $title }}</h1>

    <div class="row justify-content-center">
        <div class="col-md-3">
            <form action="/posts"> 
              @if (request('category'))
                  <input type="hidden" name="category" value="{{ request('category') }}">                  
              @endif
              @if (request('author'))
              <input type="hidden" name="author" value="{{ request('author') }}">                  
          @endif
            {{-- ke models biasanya tapi di controller juga bisa --}}
                {{-- method get itu ori nya jadi kalo ga ditulis bakal otomatis --}}
                  <div class="input-group mb-3">
                    <input type="text" class="form-control" placeholder="Search" name="search" value="{{ request('search') }}">{{-- name buat simpen data biar dipanggil, value buat kalo udah pencet searcch jadi masih ada tertuliss --}}
                    <button class="btn btn-danger" type="submit">Search</button>
                  </div>
        </div>
    </div>

    @if ($posts->count())
    <div class="card mb-3">
        <img src="https://source.unsplash.com/1200x400?{{ $posts[0]->category->name }}" class="card-img-top" alt="{{ $posts[0]->category->name }}">
        {{-- untuk gambar yg seusai --}}
        <div class="card-body text-center">
          <h3 class="card-title"><a href="/post/{{ $posts[0]->slug }}" class="text-decoration-none text-dark">{{ $posts[0]->title }}</a></h3>
          {{-- judul dan link by slug --}}
            <p>
                <small class="text-muted">
                By. <a href="/posts?author={{ $posts[0]->author->username }}" class="text-decoration-none"> {{ $posts[0]->author->name }}</a> 
                {{-- nama yg buat --}}
                in <a href="/posts?category={{ $posts[0]->category->slug }}" class="text-decoration-none">{{ $posts[0]->category->name }}</a> 
                {{-- kategorinya --}}
                {{ $posts[0]->created_at->diffForhumans() }}
                 </small> 
                {{-- buat kaya last 3 min ago --}}
            </p>
          <p class="card-text">{{ $posts[0]->excerpt }}</p>
          <a href="/post/{{ $posts[0]->slug }}" class="text-decoration-none btn btn-primary">Read more</a>
        </div>
      </div>

      
    <h1>{{ $title }}</h1>
  
      <div class="container">
        <div class="row">
            @foreach ($posts->skip(1) as $post)
            <div class="col-md-4 mb-3">
                <div class="card">
                    <div class="position-absolute px-3 py-2 " style="background-color:rgba
                    /* dibawah ini post?category itu buat search */
                    (0, 0, 0, 0.7)"><a href="/posts?category={{ $post->category->slug }}" class="text-white text-decoration-none ">{{ $post->category->name }}</a></div>
                    <img src="https://source.unsplash.com/500x400?{{ $post->category->name }}" class="card-img-top" alt="{{ $post->category->name }}">
                    <div class="card-body">
                      <h5 class="card-title">{{ $post->title }}</h5>
                      <small class="text-muted">
                        By. <a href="/posts?author={{ $post->author->username }}" class="text-decoration-none"> {{ $post->author->name }}</a> 
                        {{ $post->created_at->diffForhumans() }}
                         </small> 
                      <p class="card-text">{{ $post->excerpt}}</p>
                      <a href="/post/{{ $post->slug }}" class="btn btn-primary">Read More</a>
                    </div>
                  </div>
            </div>
            @endforeach
            @else
            <p class="text-center fs-4">No Post Found</p>
      @endif
            {{ $posts->links() }}
            {{-- ini buat next next gitu lanjut ke ap providers appserviceprovider karena ini pake boostrap --}}
        </div>
      </div>

    {{-- @foreach ($posts->skip(1) as $post)
    {{-- buat skip postingan pertama karena udah ada diatasnya --}}
        {{-- $posts dari route web dan $post itu bikin sendiri  --}}
        {{-- <article class="mb-5 border bottom pb-4">
        <h2> 
           <a href="/post/{{ $post->slug }}" class="text-decoration-none"> {{ $post->title }}</a>
            {{-- kalo mau ambil data dari web itu ambil variable nya baru munculkan yg mau ditampilin
                contoh $posts as $post, dari $posts masuk ke $post, 
                $post[]"disini panggil"] --}}
        {{-- </h2>
        <p>By. <a href="/authors/{{ $post->author->username }}" class="text-decoration-none"> {{ $post->author->name }}</a> in <a href="/categories/{{ $post->category->slug }}" class="text-decoration-none">{{ $post->category->name }}</a></p>    
   
        <p> {{ $post->excerpt}}</p>
        {{-- ini langsung terhubung ke migrate --}}
        {{-- <a href="/post/{{ $post->slug }}" class="text-decoration-none">Read more....</a>
    </article>
    @endforeach --}}

    
@endsection
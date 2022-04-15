@extends('layouts.main')

@section('container')

    <div class="container">
        <div class="row justify-content-center mb-5">
            {{-- supaya ga mepet --}}
            <div class="col-md-8">
                <h1 class="mb-3">{{ $post->title }}</h1>
                <p>By. <a href="/posts?author={{ $post->author->username }}" class="text-decoration-none"> {{ $post->author->name }} </a>
                     in <a href="/posts?category={{ $post->category->slug }}" class="text-decoration-none">{{ $post->category->name }}</a></p>    
               
                <img src="https://source.unsplash.com/1200x400?{{ $post->category->name }}" alt="{{ $post->category->name }}" class="img-fluid">

                {{-- $post->method yg ada di models->db --}}
                {{-- itu ngelink ke postingan kategori dengan link by slug
                    itu ngambil nama category nya langsung dari db   --}}
                    <article class="my-3 fs-5">
                {!! $post->body !!}
                    </article>
                {{-- kalo pake {!! ini kalo ada tag html langsung dijalanin !!}--}}
            {{-- ini tampilan nya disini yang ngmbil ke db atau ke migrate langsung --}}
            
            <a href="/posts" class="text-decoration-none d-block mt-3">Back to posts</a>
        
            </div>
        </div>

    </div>
  
    
@endsection 
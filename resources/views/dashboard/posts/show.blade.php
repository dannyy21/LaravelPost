@extends('dashboard.layouts.main')

@section('container')

<div class="container">
    <div class="row my-3">
        {{-- supaya ga mepet --}}
        <div class="col-lg-8">
            <h1 class="mb-3">{{ $post->title }}</h1>
            <a href="/dashboard/posts" class="btn btn-success"><span data-feather="arrow-left"></span>Back To My Posts</a>
            <a href="/dashboard/posts/{{ $post->slug }}/edit" class="btn btn-warning"><span data-feather="edit"></span>Edit</a>

            <form action="/dashboard/posts/{{ $post->slug }}" method="post" class="d-inline">
                {{-- ke controller --}}
                @method('delete')
                @csrf
                <button class="btn btn-danger" onclick="return confirm('Are you sure want to delete?')"><span data-feather="x-circle"></span>Delete</button>
              </form>
            
            <img src="https://source.unsplash.com/1200x400?{{ $post->category->name }}" alt="{{ $post->category->name }}" 
            class="img-fluid mt-3">

            {{-- $post->method yg ada di models->db --}}
            {{-- itu ngelink ke postingan kategori dengan link by slug
                itu ngambil nama category nya langsung dari db   --}}
                <article class="my-3 fs-5">
            {!! $post->body !!}
                </article>
            {{-- kalo pake {!! ini kalo ada tag html langsung dijalanin !!}--}}
        {{-- ini tampilan nya disini yang ngmbil ke db atau ke migrate langsung --}}
        
    
    
        </div>
    </div>

</div>
@endsection
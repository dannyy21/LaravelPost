@extends('dashboard.layouts.main')

@section('container')
<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
    <h1 class="h2">My Posts</h1>
  </div>

  @if (session()->has('success'))
  <div class="alert alert-success col-lg-8" role="alert">
    {{ session ('success') }}
  </div>
      
  @endif
 
  <div class="table-responsive col-lg-8">
      <a href="/dashboard/posts/create " class="btn btn-primary"> New Post </a>
      {{-- tambahdata wajib create karena samain sama controler nya  --}}
    <table class="table table-striped table-sm">
      <thead>
        <tr>    
          <th scope="col">#</th>
          <th scope="col">Title</th>
          <th scope="col">Category</th>
          <th scope="col">Action</th>
        </tr>
      </thead>
      <tbody>
          @foreach ($posts as $post)
            {{-- posts sesuai dengan controller --}}
          <tr>
            <td>{{ $loop->iteration }}</td>
            {{-- buat angka --}}
            <td>{{ $post->title }}</td>
            <td>{{ $post->category->name }}</td>
            <td><a href="/dashboard/posts/{{ $post->slug }}" class="badge bg-info"><span data-feather="eye"></span></a>
            {{-- lnjut ke controler metod show --}}
           <a href="/dashboard/posts/{{ $post->slug }}/edit" class="badge bg-warning"><span data-feather="edit"></span></a>
              {{-- aturan default reousrce pake edit --}}
           <form action="/dashboard/posts/{{ $post->slug }}" method="post" class="d-inline">
              {{-- ke controller --}}
              @method('delete')
              @csrf
              <button class="badge bg-danger border-0" onclick="return confirm('Are you sure want to delete?')"><span data-feather="x-circle"></button>
            </form>
            {{-- untuk delete --}}
          </td>
            
        </tr>
          @endforeach
      </tbody>
    </table>
  </div> 

@endsection
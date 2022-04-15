@extends('layouts.main')
{{-- lokasi file --}}

@section('container')
    {{--nama sesuai di main  --}}

    <h1>Halaman aBout</h1>
    <h3>{{ $name}}</h3>
    <h3>{{ $email}}</h3>
    <img src = "{{ $img }}" alt="{{ $name }}" width="200" class="img-thumbnail rounded-circle">
    @endsection

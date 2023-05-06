@extends('layout.master')
@section('judul_halaman', 'Halaman Fakultas')

@section('content')
    <h2>Fakultas</h2>
    ini adalah halaman fakultas
    <ul>
        @foreach ($fakultas as $item)
            <li>{{ $item }}</li>
        @endforeach
    </ul>
@endsection
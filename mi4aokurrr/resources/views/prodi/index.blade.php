@extends('layout.master')
@section('judul_halaman', 'Halaman Provinsi')

@section('content')
<h2>Program Studi</h2>
<br>
<table class = "table table-striped">
    <thead>
        <tr>
            <th>Nama Program Studi</th>
            <th>Nama Fakultas</th>
        </tr>
    </thead>

    <tbody>
        @foreach ($prodi as $item)
            <tr>
                <td>{{ $item['nama_prodi'] }}</td>
                <td>{{ $item['fakultas']-> nama_fakultas }}</td>
            </tr>
        @endforeach
    </tbody>
</table>
@endsection
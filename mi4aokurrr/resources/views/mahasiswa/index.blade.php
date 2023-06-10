@extends('layout.main')
@section('judul_halaman', 'Halaman Mahasiswa')

@section('content')
<div class="row">
    <div class="col-lg-12 grid-margin stretch-card">
      <div class="card">
        <div class="card-body">
          <h4 class="card-title">Mahasiswa</h4>
          @if(Session::get('success'))
            <div class = "alert alert-success">
              {{Session::get('success')}}
            </div>
          @endif
          <div class="text-right">
            <a href = "{{ route('mahasiswa.create')}}" type="button" class="btn btn-info btn-rounded btn-fw">Tambah</a>
          </div>
          <div class="table-responsive">
            <table class="table table-striped">
                <thead>
                    <tr>
                        <th>NPM</th>
                        <th>Nama Mahasiswa</th>
                        <th>Tanggal</th>
                        <th>Foto</th>
                        <th>Program Studi</th>
                    </tr>
                </thead>
            
                <tbody>
                    @foreach ($mahasiswas as $item)
                        <tr>
                            <td>{{ $item['npm'] }}</td>
                            <td>{{ $item['nama'] }}</td>
                           <td> {{ $item['tanggal'] }}</td>
                          
                            <td><img src="public/images/{{$item->foto}}" alt="foto"></td>
                            <td>{{ $item['prodi']-> nama_prodi }}</td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
          </div>
        </div>
      </div>
    </div>
</div>

@endsection
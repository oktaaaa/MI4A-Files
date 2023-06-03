@extends('layout.main')
@section('judul_halaman', 'Halaman Prodi')

@section('content')
<div class="row">
    <div class="col-lg-12 grid-margin stretch-card">
      <div class="card">
        <div class="card-body">
          <h4 class="card-title">Prodi</h4>
          <div class="table-responsive">
            <table class="table table-striped">
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
          </div>
        </div>
      </div>
    </div>
</div>

@endsection
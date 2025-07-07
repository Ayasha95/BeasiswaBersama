@extends('backend.layouts.app')

@section('contents')
<div class="container-fluid">
  <h1 class="h3 mb-4 text-gray-800">Daftar Beasiswa</h1>

  @if(session('success'))
    <div class="alert alert-success">{{ session('success') }}</div>
  @elseif(session('fail'))
    <div class="alert alert-danger">{{ session('fail') }}</div>
  @endif

  @if (auth()->user()->level == 'Admin')
    <a href="{{ route('beasiswa.tambah') }}" class="btn btn-primary mb-3">+ Tambah Beasiswa</a>
  @endif

  <div class="card shadow">
    <div class="card-body">
      <div class="table-responsive">
        <table class="table table-bordered">
          <thead>
            <tr>
              <th>No</th>
              <th>Kode Beasiswa</th>
              <th>Nama Beasiswa</th>
              <th>Kategori</th>
              <th>Deskripsi</th>
              <th>Nominal</th>
              <th>Kuota</th>
              <th>Tanggal Mulai</th>
              <th>Tanggal Akhir</th>
              <th>Status</th>
              @if (auth()->user()->level == 'Admin')
              <th>Aksi</th>
              @endif
            </tr>
          </thead>
          <tbody>
            @foreach($data as $key => $beasiswa)
            <tr>
              <td>{{ $loop->iteration }}</td>
              <td>{{ $beasiswa->kode_beasiswa }}</td>
              <td>{{ $beasiswa->nama_beasiswa }}</td>
              <td>{{ $beasiswa->kategori->nama_kategori ?? '-' }}</td>
              <td>{{ $beasiswa->deskripsi }}</td>
              <td>{{ number_format($beasiswa->nominal, 0, ',', '.') }}</td>
              <td>{{ $beasiswa->kuota }}</td>
              <td>{{ $beasiswa->tanggal_mulai }}</td>
              <td>{{ $beasiswa->tanggal_akhir }}</td>
            <td>
              <span class="badge 
              {{ $beasiswa->status == 'Dibuka' ? 'bg-success' : ($beasiswa->status == 'Ditutup' ? 'bg-danger' : 'bg-secondary') }}">
               {{ $beasiswa->status }}
              </span>
            </td>
              @if (auth()->user()->level == 'Admin')
              <td>
              <div style="display: flex; gap: 5px;">
                <a href="{{ route('beasiswa.edit', $beasiswa->id) }}" class="btn btn-warning btn-sm">Edit</a>
                <form method="POST" action="{{ route('beasiswa.hapus', $beasiswa->id) }}">
                  @csrf
                  @method('DELETE')
                  <button class="btn btn-danger btn-sm" onclick="return confirm('Hapus data ini?')">Hapus</button>
                </form>
              </div>
            </td>
            @endif
          </tr>
          @endforeach
          </tbody>
        </table>
      </div>
    </div>
  </div>
</div>
@endsection
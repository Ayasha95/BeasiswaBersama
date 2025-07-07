@extends('backend.layouts.app')


@section('contents')
<div class="container-fluid">
  <h1 class="h3 mb-4 text-gray-800">Daftar Mahasiswa</h1>

  {{-- Flash Message --}}
  @if(session('success'))
    <div class="alert alert-success">{{ session('success') }}</div>
  @elseif(session('fail'))
    <div class="alert alert-danger">{{ session('fail') }}</div>
  @endif

  {{-- Tombol Tambah --}}
  <a href="{{ route('mahasiswa.tambah') }}" class="btn btn-success mb-3">
    + Tambah Mahasiswa
  </a>

  {{-- Tabel Mahasiswa --}}
  <div class="card shadow">
    <div class="card-body">
      <div class="table-responsive">
        <table class="table table-bordered table-hover">
          <thead class="thead-light">
            <tr>
              <th>No</th>
              <th>NIK</th>
              <th>Nama Lengkap</th>
              <th>Email</th>
              <th>Alamat</th>
              <th>No. Telepon</th>
              <th>Semester</th>
              <th>Program Studi</th>
              <th>Status</th>
              <th>Aksi</th>
            </tr>
          </thead>
          <tbody>
            @forelse($listMahasiswa as $mahasiswa)
            <tr>
              <td>{{ $loop->iteration }}</td>
              <td>{{ $mahasiswa->nik }}</td>
              <td>{{ $mahasiswa->nama_lengkap }}</td>
              <td>{{ $mahasiswa->email }}</td>
              <td>{{ $mahasiswa->alamat }}</td>
              <td>{{ $mahasiswa->no_telp }}</td>
              <td>{{ $mahasiswa->semester }}</td>
              <td>{{ $mahasiswa->program_studi }}</td>
              <td>
                <span class="badge badge-{{ $mahasiswa->status === 'aktif' ? 'success' : 'secondary' }}">
                  {{ ucfirst($mahasiswa->status) }}
                </span>
              </td>
              <td>
                <div class="d-flex">
                  <a href="{{ route('mahasiswa.edit', $mahasiswa->id) }}" class="btn btn-warning btn-sm mr-1">Edit</a>
                  <form method="POST" action="{{ route('mahasiswa.hapus', $mahasiswa->id) }}">
                    @csrf
                    @method('DELETE')
                    <button class="btn btn-danger btn-sm" onclick="return confirm('Yakin ingin menghapus?')">Hapus</button>
                  </form>
                </div>
              </td>
            </tr>
            @empty
            <tr>
              <td colspan="10" class="text-center text-muted">Tidak ada data mahasiswa.</td>
            </tr>
            @endforelse
          </tbody>
        </table>
      </div>
    </div>
  </div>
</div>
@endsection

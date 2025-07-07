@extends('backend.layouts.app')

@section('stylesheets')
<link href="https://cdn.jsdelivr.net/npm/select2@4.0.12/dist/css/select2.min.css" rel="stylesheet"/>
@endsection

@section('contents')
<div class="container-fluid">
  <h1 class="h3 mb-4 text-gray-800 text-center">Edit Data Mahasiswa</h1>

  <div class="row justify-content-center">
    <div class="col-lg-8">
      <div class="card shadow mb-4">
        <div class="card-body">
          <form method="POST" action="{{ route('mahasiswa.tambah.update', $mahasiswa->id) }}">
            @csrf
            @method('PUT')

            {{-- NIM --}}
            <div class="form-group">
              <label for="nim">NIM</label>
              <input type="number" class="form-control @error('nim') is-invalid @enderror" name="nim" value="{{ old('nim', $mahasiswa->nim) }}" required>
              @error('nim') <div class="invalid-feedback">{{ $message }}</div> @enderror
            </div>

            {{-- Nama Lengkap --}}
            <div class="form-group">
              <label for="nama_lengkap">Nama Lengkap</label>
              <input type="text" class="form-control @error('nama_lengkap') is-invalid @enderror" name="nama_lengkap" value="{{ old('nama_lengkap', $mahasiswa->nama_lengkap) }}" required>
              @error('nama_lengkap') <div class="invalid-feedback">{{ $message }}</div> @enderror
            </div>

            {{-- Email --}}
            <div class="form-group">
              <label for="email">Email</label>
              <input type="text" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email', $mahasiswa->email) }}" required>
              @error('email') <div class="invalid-feedback">{{ $message }}</div> @enderror
            </div>

            {{-- Alamat --}}
            <div class="form-group">
              <label for="alamat">Alamat</label>
              <input type="text" step="0.01" min="0" max="4" class="form-control @error('alamat') is-invalid @enderror" name="alamat" value="{{ old('alamat', $mahasiswa->alamat) }}" required>
              @error('alamat') <div class="invalid-feedback">{{ $message }}</div> @enderror
            </div>

            {{-- No. Telepon --}}
            <div class="form-group">
              <label for="no_telp">No. Telepon</label>
              <input type="number" class="form-control @error('no_telp') is-invalid @enderror" name="no_telp" value="{{ old('no_telp', $mahasiswa->no_telp) }}" required>
              @error('no_telp') <div class="invalid-feedback">{{ $message }}</div> @enderror
            </div>

            {{-- Semester --}}
            <div class="form-group">
              <label for="semester">Semester</label>
              <input type="number" min="0" max="8" class="form-control @error('semester') is-invalid @enderror" name="semester" value="{{ old('semester', $mahasiswa->semester) }}" required>
              @error('semester') <div class="invalid-feedback">{{ $message }}</div> @enderror
            </div>

            {{-- Program Studi --}}
            <div class="form-group">
            <label for="program_studi">Program Studi</label>
              <input type="text" min="0" max="8" class="form-control @error('program_studi') is-invalid @enderror" name="program_studi" value="{{ old('program_studi', $mahasiswa->program_studi) }}" required>
              @error('program_studi') <div class="invalid-feedback">{{ $message }}</div> @enderror       
            </div>

            {{-- Status Mahasiswa --}}
            <div class="form-group">
              <label for="status">Status Mahasiswa</label>
              <select class="form-control @error('status') is-invalid @enderror" name="status" required>
                <option value="" disabled>Pilih Status</option>
                <option value="aktif" {{ old('status', $mahasiswa->status) == 'aktif' ? 'selected' : '' }}>Aktif</option>
                <option value="tidak Aktif" {{ old('status', $mahasiswa->status) == 'tidak aktif' ? 'selected' : '' }}>Tidak Aktif</option>
              </select>
              @error('status') <div class="invalid-feedback">{{ $message }}</div> @enderror
            </div>

            <button type="submit" class="btn btn-primary btn-block">Simpan Perubahan</button>
            <a href="{{ route('mahasiswa') }}" class="btn btn-secondary btn-block">Kembali</a>
          </form>
        </div>
      </div>
    </div>
  </div>
</div>
@endsection

@section('javascripts')
<script src="https://cdn.jsdelivr.net/npm/select2@4.0.12/dist/js/select2.min.js"></script>
<script>
  $(document).ready(function() {
    $('.select2').select2();
  });
</script>
@endsection

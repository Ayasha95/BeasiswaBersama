@extends('backend.layouts.app')

@section('contents')
<div class="container-fluid">
  <h1 class="h3 mb-4 text-gray-800 text-center">Edit Data Pendaftaran</h1>

  <form method="POST" action="{{ route('pendaftaran.tambah.update', $pendaftaran->id) }}" enctype="multipart/form-data">
    @csrf
    @method('PUT')

    {{-- Mahasiswa --}}
    <div class="form-group">
      <label for="mahasiswa_id">Mahasiswa <span class="text-danger">*</span></label>
      <select id="mahasiswa_id" class="form-control select2 @error('mahasiswa_id') is-invalid @enderror" name="mahasiswa_id" required>
        <option value="" disabled>Pilih Mahasiswa</option>
        @foreach($mahasiswa as $mhs)
          <option value="{{ $mhs->id }}" {{ old('mahasiswa_id', $pendaftaran->mahasiswa_id) == $mhs->id ? 'selected' : '' }}>
            {{ $mhs->nama_lengkap }} - {{ $mhs->nim }}
          </option>
        @endforeach
      </select>
      @error('mahasiswa_id') 
        <div class="invalid-feedback">{{ $message }}</div> 
      @enderror
    </div>

    {{-- Beasiswa --}}
    <div class="form-group">
      <label for="beasiswa_id">Beasiswa <span class="text-danger">*</span></label>
      <select id="beasiswa_id" class="form-control custom-select select2 @error('beasiswa_id') is-invalid @enderror" name="beasiswa_id" required>
        <option value="" disabled>Pilih Beasiswa</option>
        @foreach($beasiswa as $bsw)
          <option value="{{ $bsw->id }}" {{ old('beasiswa_id', $pendaftaran->beasiswa_id) == $bsw->id ? 'selected' : '' }}>
            {{ $bsw->nama_beasiswa }} - {{ $bsw->kategori->nama_kategori ?? 'Kategori tidak tersedia' }}
          </option>
        @endforeach
      </select>
      @error('beasiswa_id') 
        <div class="invalid-feedback">{{ $message }}</div> 
      @enderror
    </div>

    {{-- ==== DATA ORANG TUA ==== --}}
<hr>
<h5 class="mt-4">Data Orang Tua / Wali</h5>

{{-- Nama Orang Tua --}}
<div class="form-group">
  <label for="nama_orang_tua_wali">Nama Orang Tua/Wali <span class="text-danger">*</span></label>
  <input type="text" class="form-control @error('nama_orang_tua_wali') is-invalid @enderror" id="nama_orang_tua_wali" name="nama_orang_tua_wali" value="{{ old('nama_orang_tua_wali', $pendaftaran->nama_orang_tua_wali) }}" required>
  @error('nama_orang_tua_wali') <div class="invalid-feedback">{{ $message }}</div> @enderror
</div>

{{-- NIK Orang Tua --}}
<div class="form-group">
  <label for="nik_orang_tua_wali">NIK Orang Tua/Wali</label>
  <input type="text" class="form-control @error('nik_orang_tua_wali') is-invalid @enderror" id="nik_orang_tua_wali" name="nik_orang_tua_wali" value="{{ old('nik_orang_tua_wali', $pendaftaran->nik_orang_tua_wali) }}">
  @error('nik_orang_tua_wali') <div class="invalid-feedback">{{ $message }}</div> @enderror
</div>

{{-- Pendidikan Terakhir --}}
<div class="form-group">
  <label for="pendidikan_terakhir">Pendidikan Terakhir</label>
  <input type="text" class="form-control @error('pendidikan_terakhir') is-invalid @enderror" id="pendidikan_terakhir" name="pendidikan_terakhir" value="{{ old('pendidikan_terakhir', $pendaftaran->pendidikan_terakhir) }}">
  @error('pendidikan_terakhir') <div class="invalid-feedback">{{ $message }}</div> @enderror
</div>

{{-- Alamat Orang Tua --}}
<div class="form-group">
  <label for="alamat_orang_tua_wali">Alamat Orang Tua/Wali</label>
  <textarea class="form-control @error('alamat_orang_tua_wali') is-invalid @enderror" id="alamat_orang_tua_wali" name="alamat_orang_tua_wali">{{ old('alamat_orang_tua_wali', $pendaftaran->alamat_orang_tua_wali) }}</textarea>
  @error('alamat_orang_tua_wali') <div class="invalid-feedback">{{ $message }}</div> @enderror
</div>

{{-- No. Telp Orang Tua --}}
<div class="form-group">
  <label for="no_telp_orang_tua_wali">No. Telp Orang Tua/Wali</label>
  <input type="text" class="form-control @error('no_telp_orang_tua_wali') is-invalid @enderror" id="no_telp_orang_tua_wali" name="no_telp_orang_tua_wali" value="{{ old('no_telp_orang_tua_wali', $pendaftaran->no_telp_orang_tua_wali) }}">
  @error('no_telp_orang_tua_wali') <div class="invalid-feedback">{{ $message }}</div> @enderror
</div>

{{-- Pekerjaan --}}
<div class="form-group">
  <label for="pekerjaan">Pekerjaan Orang Tua/Wali</label>
  <input type="text" class="form-control @error('pekerjaan') is-invalid @enderror" id="pekerjaan" name="pekerjaan" value="{{ old('pekerjaan', $pendaftaran->pekerjaan) }}">
  @error('pekerjaan') <div class="invalid-feedback">{{ $message }}</div> @enderror
</div>

{{-- Penghasilan --}}
<div class="form-group">
  <label for="penghasilan">Penghasilan Orang Tua/Wali</label>
  <select class="form-control @error('penghasilan') is-invalid @enderror" name="penghasilan" id="penghasilan">
    <option value="">-- Pilih Penghasilan --</option>
    <option value="< 1 juta" {{ old('penghasilan', $pendaftaran->penghasilan) == '< 1 juta' ? 'selected' : '' }}>< 1 juta</option>
    <option value="1-3 juta" {{ old('penghasilan', $pendaftaran->penghasilan) == '1-3 juta' ? 'selected' : '' }}>1-3 juta</option>
    <option value="> 3 juta" {{ old('penghasilan', $pendaftaran->penghasilan) == '> 3 juta' ? 'selected' : '' }}>> 3 juta</option>
  </select>
  @error('penghasilan') <div class="invalid-feedback">{{ $message }}</div> @enderror
</div>

    {{-- Status --}}
    <div class="form-group">
      <label for="status">Status <span class="text-danger">*</span></label>
      <select id="status" class="form-control @error('status') is-invalid @enderror" name="status" required>
        <option value="pending" {{ old('status', $pendaftaran->status) == 'pending' ? 'selected' : '' }}>Pending</option>
        <option value="disetujui" {{ old('status', $pendaftaran->status) == 'disetujui' ? 'selected' : '' }}>Disetujui</option>
        <option value="ditolak" {{ old('status', $pendaftaran->status) == 'ditolak' ? 'selected' : '' }}>Ditolak</option>
      </select>
      @error('status') 
        <div class="invalid-feedback">{{ $message }}</div> 
      @enderror
    </div>

    <div class="form-group">
      <button type="submit" class="btn btn-primary">
        <i class="fas fa-save"></i> Simpan Perubahan
      </button>
      <a href="{{ route('pendaftaran') }}" class="btn btn-secondary">
        <i class="fas fa-times"></i> Batal
      </a>
    </div>
  </form>
</div>

<script>
  document.querySelector('.custom-file-input').addEventListener('change', function(e) {
    let fileName = e.target.files[0]?.name || 'Pilih file baru...';
    e.target.nextElementSibling.innerText = fileName;
  });
</script>
@endsection
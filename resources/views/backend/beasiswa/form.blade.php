@extends('backend.layouts.app')

@section('title', 'Form Beasiswa')

@section('contents')
  <form action="{{ isset($beasiswa) ? route('beasiswa.tambah.update', $beasiswa->id) : route('beasiswa.tambah.simpan') }}" method="post">
    @csrf
    <div class="row">
      <div class="col-12">
        <div class="card shadow mb-4">
          <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">{{ isset($beasiswa) ? 'Form Edit Beasiswa' : 'Form Tambah Beasiswa' }}</h6>
          </div>
          <div class="card-body">
            <div class="form-group">
              <label for="kode_beasiswa">Kode Beasiswa</label>
              <input type="text" class="form-control" id="kode_beasiswa" name="kode_beasiswa" value="{{ isset($beasiswa) ? $beasiswa->kode_beasiswa : '' }}">
            </div>
            <div class="form-group">
              <label for="nama_beasiswa">Nama Beasiswa</label>
              <input type="text" class="form-control" id="nama_beasiswa" name="nama_beasiswa" value="{{ isset($beasiswa) ? $beasiswa->nama_beasiswa : '' }}">
            </div>
            <div class="form-group">
              <label for="kategori_id">Kategori</label>
              <select name="kategori_id" id="kategori_id" class="custom-select" required>
                <option value="" selected disabled hidden>-- Pilih Kategori --</option>
                @foreach ($kategori as $row)
                  <option value="{{ $row->id }}" {{ isset($beasiswa) ? ($beasiswa->kategori_id == $row->id ? 'selected' : '') : '' }}>{{ $row->nama_kategori }}</option>
                @endforeach
              </select>
            </div>
            <div class="form-group">
              <label for="deskripsi">Deskripsi Beasiswa</label>
              <textarea class="form-control" id="deskripsi" name="deskripsi" rows="4">{{ isset($beasiswa) ? $beasiswa->deskripsi : '' }}</textarea>
            </div>
            <div class="form-group">
              <label for="nominal">Nominal Beasiswa</label>
              <input type="number" class="form-control" id="nominal" name="nominal" value="{{ isset($beasiswa) ? $beasiswa->nominal : '' }}">
            </div>
            <div class="form-group">
              <label for="kuota">Kuota Beasiswa</label>
              <input type="number" class="form-control" id="kuota" name="kuota" value="{{ isset($beasiswa) ? $beasiswa->kuota : '' }}">
            </div>
            <div class="form-group">
              <label for="tanggal_mulai">Tanggal Mulai</label>
              <input type="date" class="form-control" id="tanggal_mulai" name="tanggal_mulai" value="{{ isset($beasiswa) ? $beasiswa->tanggal_mulai : '' }}">
            </div>
            <div class="form-group">
              <label for="tanggal_akhir">Tanggal Akhir</label>
              <input type="date" class="form-control" id="tanggal_akhir" name="tanggal_akhir" value="{{ isset($beasiswa) ? $beasiswa->tanggal_akhir : '' }}">
            </div>
            <div class="form-group">
              <label for="status">Status</label>
              <select name="status" id="status" class="form-control" required>
                <option value="Dibuka" {{ (isset($beasiswa) && $beasiswa->status == 'Dibuka') ? 'selected' : '' }}>Dibuka</option>
                <option value="Ditutup" {{ (isset($beasiswa) && $beasiswa->status == 'Ditutup') ? 'selected' : '' }}>Ditutup</option>
              </select>
            </div>
          </div>
          <div class="card-footer">
            <button type="submit" class="btn btn-primary">Simpan</button>
          </div>
        </div>
      </div>
    </div>
  </form>
@endsection
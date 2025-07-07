@extends('backend.layouts.app')

@section('contents')
<div class="container-fluid">
  <h1 class="h3 mb-4 text-gray-800">Daftar Pendaftaran Beasiswa</h1>

  <a href="{{ route('pendaftaran.tambah') }}" class="btn btn-success mb-3">
    <i class="fas fa-plus"></i> Tambah Pendaftaran
  </a>

  <div class="card shadow mb-4">
    {{-- HAPUS bagian judul card-header --}}
    {{-- <div class="card-header py-3">
      <h6 class="m-0 font-weight-bold text-primary">Data Pendaftaran</h6>
    </div> --}}
    
    <div class="card-body">
      <div class="table-responsive">
        <table class="table table-bordered bg-white text-dark" id="dataTable" width="100%" cellspacing="0">
          <thead>
            <tr>
              <th>No</th>
              <th>Nama Lengkap</th>
              <th>NIK</th>
              <th>Tanggal Lahir</th>
              <th>Alamat</th>
              <th>No. Telp</th>
              <th>Asal Kampus</th>
              <th>NPSN</th>
              <th>Nama Orang Tua/Wali</th>
              <th>NIK Orang Tua/Wali</th>
              <th>Pendidikan Terakhir</th>
              <th>Alamat Orang Tua/Wali</th>
              <th>No. Telp Orang Tua/Wali</th>
              <th>Pekerjaan</th>
              <th>Penghasilan</th>
              <th>Periode</th>
              <th>Dokumen</th>
              <th>Status</th>
              @if(auth()->user()->level == 'Admin')
                <th>Aksi</th>
              @endif
            </tr>
          </thead>
          <tbody>
            @forelse($pendaftaran as $data)
            <tr>
              <td>{{ $loop->iteration }}</td>
              <td>{{ $data->nama }}</td>
              <td>{{ $data->nik }}</td>
              <td>{{ $data->tanggal_lahir }}</td>
              <td>{{ $data->alamat }}</td>
              <td>{{ $data->no_telp }}</td>
              <td>{{ $data->asal_kampus }}</td>
              <td>{{ $data->npsn }}</td>
              <td>{{ $data->nama_orang_tua_wali }}</td>
              <td>{{ $data->nik_orang_tua_wali }}</td>
              <td>{{ $data->pendidikan_terakhir }}</td>
              <td>{{ $data->alamat_orang_tua_wali }}</td>
              <td>{{ $data->no_telp_orang_tua_wali }}</td>
              <td>{{ $data->pekerjaan }}</td>
              <td>{{ $data->penghasilan }}</td>
              <td>{{ $data->periode_penghasilan }}</td>
              <td>
                @if($data->dokumen_transkrip)
                  <a href="{{ asset('storage/'.$data->dokumen_transkrip) }}" target="_blank">Transkrip</a><br>
                @endif
                @if($data->dokumen_rekomendasi)
                  <a href="{{ asset('storage/'.$data->dokumen_rekomendasi) }}" target="_blank">Rekomendasi</a>
                @endif
              </td>
              <td>
                <span class="badge 
                  {{ $data->status === 'disetujui' ? 'badge-success' : ($data->status === 'ditolak' ? 'badge-danger' : 'badge-warning') }}">
                  {{ ucfirst($data->status) }}
                </span>
              </td>
              @if(auth()->user()->level == 'Admin')
              <td>
                <div class="btn-group" role="group">
                <a href="{{ route('pendaftaran.show', $data->id) }}" class="btn btn-info btn-sm">
                  <i class="fas fa-eye"></i> Detail
                </a>
                  <a href="{{ route('pendaftaran.edit', $data->id) }}" class="btn btn-warning btn-sm">
                    <i class="fas fa-edit"></i> Edit
                  </a>
                  <form action="{{ route('pendaftaran.hapus', $data->id) }}" method="POST" style="display:inline-block;" 
                        onsubmit="return confirm('Yakin ingin menghapus data ini?')">
                    @csrf
                    @method('DELETE')
                    <button class="btn btn-danger btn-sm">
                      <i class="fas fa-trash"></i> Hapus
                    </button>
                  </form>
                </div>
              </td>
              @endif
            </tr>
            @empty
            <tr>
              <td colspan="19" class="text-center">Belum ada data pendaftaran.</td>
            </tr>
            @endforelse
          </tbody>
        </table>
      </div>
    </div>
  </div>
</div>
@endsection

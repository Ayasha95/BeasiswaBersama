@extends('backend.layouts.app')

@section('contents')
<div class="container-fluid">
    <h1 class="h3 mb-4 text-gray-800">Data Pendaftaran Beasiswa Cendekia</h1>
    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif
    <a href="{{ route('admin.pendaftaran_cendekia.create') }}" class="btn btn-success mb-3">
        <i class="fas fa-plus"></i> Tambah Pendaftaran
    </a>
    <div class="card shadow mb-4">
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered bg-white text-dark" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Nama Lengkap</th>
                            <th>Email</th>
                            <th>NIK</th>
                            <th>Tanggal Lahir</th>
                            <th>Alamat</th>
                            <th>No Telepon</th>
                            <th>Asal Kampus</th>
                            <th>NPSN</th>
                            <th>No KK</th>
                            <th>Nama Ortu</th>
                            <th>NIK Ortu</th>
                            <th>Pendidikan Terakhir Ortu</th>
                            <th>Alamat Ortu</th>
                            <th>No Telepon Ortu</th>
                            <th>Pekerjaan Ortu</th>
                            <th>Penghasilan Ortu</th>
                            <th>Periode Penghasilan Ortu</th>
                            <th>Transkrip Nilai</th>
                            <th>Surat Rekomendasi</th>
                            <th>Motivasi</th>
                            <th>Pernyataan Kebenaran</th>
                            <th>Siap Tes Seleksi</th>
                            <th>Nilai Tes</th>
                            <th>Status</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse($pendaftarans as $p)
                        <tr>
                            <td>{{ $loop->iteration }}</td>
                            <td>{{ $p->nama_lengkap }}</td>
                            <td>{{ $p->email }}</td>
                            <td>{{ $p->nik }}</td>
                            <td>{{ $p->tanggal_lahir }}</td>
                            <td>{{ $p->alamat }}</td>
                            <td>{{ $p->no_telepon }}</td>
                            <td>{{ $p->asal_kampus }}</td>
                            <td>{{ $p->npsn }}</td>
                            <td>{{ $p->no_kk }}</td>
                            <td>{{ $p->nama_ortu }}</td>
                            <td>{{ $p->nik_ortu }}</td>
                            <td>{{ $p->pendidikan_terakhir_ortu }}</td>
                            <td>{{ $p->alamat_ortu }}</td>
                            <td>{{ $p->no_telepon_ortu }}</td>
                            <td>{{ $p->pekerjaan_ortu }}</td>
                            <td>{{ $p->penghasilan_ortu }}</td>
                            <td>{{ $p->periode_penghasilan_ortu }}</td>
                            <td>
                                @if($p->transkrip_nilai)
                                    <a href="{{ asset('storage/'.$p->transkrip_nilai) }}" target="_blank">Transkrip</a>
                                @endif
                            </td>
                            <td>
                                @if($p->surat_rekomendasi)
                                    <a href="{{ asset('storage/'.$p->surat_rekomendasi) }}" target="_blank">Rekomendasi</a>
                                @endif
                            </td>
                            <td>{{ $p->motivasi }}</td>
                            <td>{{ $p->pernyataan_kebenaran ? 'Ya' : 'Tidak' }}</td>
                            <td>{{ $p->siap_tes_seleksi ? 'Ya' : 'Tidak' }}</td>
                            <td>{{ $p->nilai_tes }}</td>
                            <td>
                                <span class="badge 
                                    {{ $p->status === 'disetujui' ? 'badge-success' : ($p->status === 'ditolak' ? 'badge-danger' : 'badge-warning') }}">
                                    {{ ucfirst($p->status) }}
                                </span>
                            </td>
                            <td>
                                <a href="{{ route('admin.pendaftaran_cendekia.show', $p->id) }}" class="btn btn-info btn-sm">Detail</a>
                                <a href="{{ route('admin.pendaftaran_cendekia.edit', $p->id) }}" class="btn btn-warning btn-sm">Edit</a>
                                <form action="{{ route('admin.pendaftaran_cendekia.destroy', $p->id) }}" method="POST" class="d-inline" onsubmit="return confirm('Yakin hapus?')">
                                    @csrf @method('DELETE')
                                    <button class="btn btn-danger btn-sm">Hapus</button>
                                </form>
                                <form action="{{ route('admin.pendaftaran_cendekia.sendGFormLink', $p->id) }}" method="POST" class="d-inline">
                                    @csrf
                                    <button class="btn btn-success btn-sm">Kirim Link GForm</button>
                                </form>
                            </td>
                        </tr>
                        @empty
                        <tr>
                            <td colspan="26" class="text-center">Belum ada data pendaftaran.</td>
                        </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
@endsection 
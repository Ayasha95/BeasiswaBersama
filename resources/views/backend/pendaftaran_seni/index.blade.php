@extends('backend.layouts.app')

@section('contents')
<div class="container-fluid">
    <h2 class="h3 mb-4 text-gray-800">Data Pendaftar Beasiswa Talent Seni</h2>
    <a href="{{ route('admin.pendaftaran.talent_seni.create') }}" class="btn btn-success mb-3">+ Tambah Pendaftar</a>
    <div class="card shadow mb-4">
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered bg-white text-dark" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Nama Lengkap</th>
                            <th>NIK</th>
                            <th>Tanggal Lahir</th>
                            <th>Alamat</th>
                            <th>No Telepon</th>
                            <th>Email</th>
                            <th>Asal Kampus</th>
                            <th>NPSN</th>
                            <th>Jenis Seni</th>
                            <th>Deskripsi Prestasi</th>
                            <th>Portofolio</th>
                            <th>Sertifikat</th>
                            <th>Bersedia Seleksi</th>
                            <th>Status</th>
                            <th>Jadwal Interview</th>
                            <th>Link Zoom</th>
                            <th>Catatan Admin</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($pendaftarans as $i => $p)
                        <tr>
                            <td>{{ $i+1 }}</td>
                            <td>{{ $p->nama_lengkap }}</td>
                            <td>{{ $p->nik }}</td>
                            <td>{{ $p->tanggal_lahir }}</td>
                            <td>{{ $p->alamat }}</td>
                            <td>{{ $p->no_telepon }}</td>
                            <td>{{ $p->email }}</td>
                            <td>{{ $p->asal_kampus }}</td>
                            <td>{{ $p->npsn }}</td>
                            <td>{{ $p->jenis_seni }}</td>
                            <td>{{ $p->deskripsi_prestasi }}</td>
                            <td>
                                @if($p->portofolio_path)
                                <a href="{{ asset('storage/' . $p->portofolio_path) }}" target="_blank">Lihat</a>
                                @endif
                            </td>
                            <td>
                                @if($p->sertifikat_path)
                                <a href="{{ asset('storage/' . $p->sertifikat_path) }}" target="_blank">Lihat</a>
                                @endif
                            </td>
                            <td>{{ ucfirst($p->bersedia_seleksi) }}</td>
                            <td>
                                <span class="badge 
                                    @if($p->status == 'disetujui') badge-success
                                    @elseif($p->status == 'ditolak') badge-danger
                                    @else badge-warning @endif">
                                    {{ ucfirst($p->status ?? 'pending') }}
                                </span>
                            </td>
                            <td>{{ $p->jadwal_interview }}</td>
                            <td>
                                @if($p->link_zoom)
                                <a href="{{ $p->link_zoom }}" target="_blank">Link</a>
                                @endif
                            </td>
                            <td>{{ $p->catatan_admin }}</td>
                            <td>
                                <a href="{{ route('admin.pendaftaran.talent_seni.show', $p->id) }}" class="btn btn-info btn-sm">Lihat</a>
                                <a href="{{ route('admin.pendaftaran.talent_seni.edit', $p->id) }}" class="btn btn-warning btn-sm">Edit</a>
                                <form action="{{ route('admin.pendaftaran.talent_seni.destroy', $p->id) }}" method="POST" style="display:inline-block" onsubmit="return confirm('Yakin hapus data ini?')">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-danger btn-sm">Hapus</button>
                                </form>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
@endsection 
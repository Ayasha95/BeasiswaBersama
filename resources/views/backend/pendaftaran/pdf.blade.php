<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>Detail Pendaftaran Beasiswa</title>
    <style>
        body { font-family: DejaVu Sans, sans-serif; font-size: 12px; }
        .judul { font-size: 18px; font-weight: bold; margin-bottom: 20px; }
        .data { margin-bottom: 8px; }
        .label { font-weight: bold; }
    </style>
</head>
<body>
    <div class="judul">Detail Pendaftaran Beasiswa</div>
    <div class="data"><span class="label">Nama:</span> {{ $pendaftaran->nama }}</div>
    <div class="data"><span class="label">Email:</span> {{ $pendaftaran->email }}</div>
    <div class="data"><span class="label">NIK:</span> {{ $pendaftaran->nik }}</div>
    <div class="data"><span class="label">Tanggal Lahir:</span> {{ $pendaftaran->tanggal_lahir }}</div>
    <div class="data"><span class="label">Alamat:</span> {{ $pendaftaran->alamat }}</div>
    <div class="data"><span class="label">No. Telp:</span> {{ $pendaftaran->no_telp }}</div>
    <div class="data"><span class="label">Asal Kampus:</span> {{ $pendaftaran->asal_kampus }}</div>
    <div class="data"><span class="label">NPSN:</span> {{ $pendaftaran->npsn }}</div>
    <div class="data"><span class="label">Beasiswa:</span> {{ $pendaftaran->beasiswa->nama_beasiswa ?? '-' }}</div>
    <div class="data"><span class="label">Kategori:</span> {{ $pendaftaran->beasiswa->kategori->nama_kategori ?? '-' }}</div>
    <div class="data"><span class="label">Status:</span> {{ ucfirst($pendaftaran->status) }}</div>
    <div class="data"><span class="label">Tanggal Daftar:</span> {{ $pendaftaran->created_at ? $pendaftaran->created_at->format('d M Y') : '-' }}</div>
    <div class="data"><span class="label">Tanggal Update:</span> {{ $pendaftaran->updated_at ? $pendaftaran->updated_at->format('d M Y') : '-' }}</div>
    <div class="data"><span class="label">Catatan:</span> 
        @if($pendaftaran->status == 'disetujui')
            Selamat! Anda diterima dalam beasiswa ini.
        @elseif($pendaftaran->status == 'ditolak')
            Mohon maaf, pendaftaran Anda ditolak.
        @else
            Dokumen sedang dalam proses review.
        @endif
    </div>
    <hr>
    <div class="judul" style="font-size:15px;">Data Orang Tua / Wali</div>
    <div class="data"><span class="label">Nama:</span> {{ $pendaftaran->nama_orang_tua_wali ?? '-' }}</div>
    <div class="data"><span class="label">NIK:</span> {{ $pendaftaran->nik_orang_tua_wali ?? '-' }}</div>
    <div class="data"><span class="label">Pendidikan Terakhir:</span> {{ $pendaftaran->pendidikan_terakhir ?? '-' }}</div>
    <div class="data"><span class="label">Pekerjaan:</span> {{ $pendaftaran->pekerjaan ?? '-' }}</div>
    <div class="data"><span class="label">Penghasilan:</span> {{ $pendaftaran->penghasilan ?? '-' }}</div>
    <div class="data"><span class="label">No. Telp:</span> {{ $pendaftaran->no_telp_orang_tua_wali ?? '-' }}</div>
    <div class="data"><span class="label">Alamat:</span> {{ $pendaftaran->alamat_orang_tua_wali ?? '-' }}</div>
    <div class="data"><span class="label">Periode:</span> {{ $pendaftaran->periode_penghasilan ?? '-' }}</div>
    <hr>
    <div class="judul" style="font-size:15px;">Dokumen yang Diupload</div>
    <div class="data"><span class="label">Transkrip Nilai:</span> {{ $pendaftaran->dokumen_transkrip ? asset('storage/' . $pendaftaran->dokumen_transkrip) : '-' }}</div>
    <div class="data"><span class="label">Surat Rekomendasi:</span> {{ $pendaftaran->dokumen_rekomendasi ? asset('storage/' . $pendaftaran->dokumen_rekomendasi) : '-' }}</div>
</body>
</html> 
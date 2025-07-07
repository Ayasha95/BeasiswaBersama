<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>Detail Pendaftar Talent Seni</title>
    <style>
        body { font-family: DejaVu Sans, sans-serif; font-size: 12px; }
        .judul { font-size: 18px; font-weight: bold; margin-bottom: 20px; }
        .data { margin-bottom: 8px; }
        .label { font-weight: bold; }
    </style>
</head>
<body>
    <div class="judul">Detail Pendaftar Talent Seni</div>
    <div class="data"><span class="label">Nama Lengkap:</span> {{ $pendaftaran->nama_lengkap }}</div>
    <div class="data"><span class="label">Email:</span> {{ $pendaftaran->email }}</div>
    <div class="data"><span class="label">No Telepon:</span> {{ $pendaftaran->no_telepon }}</div>
    <div class="data"><span class="label">NIK:</span> {{ $pendaftaran->nik }}</div>
    <div class="data"><span class="label">Tanggal Lahir:</span> {{ $pendaftaran->tanggal_lahir }}</div>
    <div class="data"><span class="label">Alamat:</span> {{ $pendaftaran->alamat }}</div>
    <div class="data"><span class="label">Asal Kampus:</span> {{ $pendaftaran->asal_kampus }}</div>
    <div class="data"><span class="label">NPSN:</span> {{ $pendaftaran->npsn }}</div>
    <div class="data"><span class="label">Deskripsi Prestasi:</span> {{ $pendaftaran->deskripsi_prestasi }}</div>
    <div class="data"><span class="label">Jenis Seni:</span> {{ $pendaftaran->jenis_seni }}</div>
    <div class="data"><span class="label">Bersedia Seleksi:</span> {{ ucfirst($pendaftaran->bersedia_seleksi) }}</div>
    <div class="data"><span class="label">Status:</span> {{ ucfirst($pendaftaran->status) }}</div>
    <div class="data"><span class="label">Jadwal Interview:</span> {{ $pendaftaran->jadwal_interview }}</div>
    <div class="data"><span class="label">Link Zoom:</span> {{ $pendaftaran->link_zoom }}</div>
    <div class="data"><span class="label">Catatan Admin:</span> {{ $pendaftaran->catatan_admin }}</div>
    <div class="data"><span class="label">Portofolio:</span> {{ $pendaftaran->portofolio_path ? asset('storage/' . $pendaftaran->portofolio_path) : '-' }}</div>
    <div class="data"><span class="label">Sertifikat Seni:</span> {{ $pendaftaran->sertifikat_path ? asset('storage/' . $pendaftaran->sertifikat_path) : '-' }}</div>
</body>
</html> 
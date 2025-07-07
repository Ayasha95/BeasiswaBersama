# Beasiswa Bersama

Website pendaftaran dan manajemen beasiswa untuk mahasiswa berbasis Laravel. Sistem ini mendukung dua jenis pengguna: **Admin** dan **Peserta** (mahasiswa), serta mendukung beberapa jenis beasiswa dengan alur seleksi dan verifikasi yang terintegrasi.

---

## ✨ Fitur Utama

- **Registrasi & Login**  
  Otentikasi terpisah untuk admin dan peserta (mahasiswa).
- **Formulir Pendaftaran Online**  
  Pengisian data diri, data orang tua, dan upload dokumen persyaratan.
- **Multi Beasiswa**  
  Mendukung pendaftaran Beasiswa Mandiri, Prestasi, Seni, dan Cendekia.
- **Manajemen Data & Seleksi**  
  Admin dapat memverifikasi, mengubah status, dan mengelola data pendaftar.
- **Upload & Download Dokumen**  
  Peserta dapat mengunggah dokumen (transkrip, sertifikat, portofolio, dsb), admin dapat mengunduh.
- **Status & Timeline Pendaftaran**  
  Peserta dapat memantau status pendaftaran dan riwayat aktivitas.
- **Dashboard Statistik**  
  Statistik pendaftaran, status, dan aktivitas terbaru untuk admin & peserta.
- **Cetak Bukti Pendaftaran**  
  Peserta dapat mengunduh/cetak bukti pendaftaran.
- **Role-based Access**  
  Hak akses dan tampilan berbeda untuk admin dan peserta.

---

## 📂 Jenis Beasiswa

1. **Beasiswa Mandiri**  
   Terbuka untuk semua mahasiswa.  
   _Persyaratan:_ Biodata lengkap, data orang tua, upload dokumen.

2. **Beasiswa Prestasi**  
   Untuk mahasiswa berprestasi akademik/seni.  
   _Persyaratan tambahan:_ Upload sertifikat, portofolio karya, siap interview/tampil.

3. **Beasiswa Seni**  
   Untuk mahasiswa dengan bakat seni.  
   _Persyaratan:_ Portofolio, sertifikat, dan dokumen pendukung.

4. **Beasiswa Cendekia**  
   Untuk mahasiswa dengan prestasi akademik tinggi.  
   _Persyaratan:_ Transkrip nilai, surat rekomendasi, hasil tes, dsb.

---

## ⚙️ Instalasi

### 1. Clone Repository

```bash
git clone https://github.com/Ayasha95/BeasiswaBersama.git
cd BeasiswaBersama
```

### 2. Install Dependency

```bash
composer install
cp .env.example .env
php artisan key:generate
```

### 3. Setup Database

- Edit file `.env` dan sesuaikan konfigurasi database Anda.
- Jalankan migrasi dan seeder:

```bash
php artisan migrate --seed
```

### 4. Jalankan Server

```bash
php artisan serve
```

Akses aplikasi di [http://localhost:8000](http://localhost:8000)

---

## 👤 Akun Demo

**Admin**
- Email: `admin@beasiswa.com`
- Password: `password`

**Peserta**
- Email: `user@beasiswa.com`
- Password: `password`

_(Atau buat akun baru melalui halaman registrasi peserta)_

---

## 🗂️ Struktur Direktori Penting

- `app/Http/Controllers/` — Controller untuk admin, peserta, dan pendaftaran
- `resources/views/` — Blade template untuk frontend & backend
- `routes/web.php` — Definisi seluruh route aplikasi
- `database/migrations/` — Struktur tabel database
- `public/uploads/` — Lokasi file upload dokumen peserta

---

## 📝 Catatan

- Pastikan folder `public/uploads` dapat ditulis (writeable).
- Untuk pengiriman email/notifikasi, sesuaikan konfigurasi di `.env` jika diperlukan.
- Dokumentasi kode dan komentar tersedia di setiap file utama.

---

## 📞 Kontak & Kontribusi

Untuk pertanyaan, bug, atau kontribusi, silakan hubungi [Ayasha95](https://github.com/Ayasha95) melalui Github.

---

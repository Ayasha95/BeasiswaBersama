<p align="center">
<<<<<<< HEAD
  <img src="https://raw.githubusercontent.com/Ayasha95/BeasiswaBersama/main/public/logo-beasiswa.png" alt="Beasiswa Bersama" width="120">
=======
  <img src="https://laravel.com/img/logomark.min.svg" alt="Beasiswa Bersama" width="120">
>>>>>>> 7131e9346697301cb648a09ec1437b3932463468
</p>

<p align="center">
  <a href="#"><img src="https://img.shields.io/badge/Laravel-10.x-red"></a>
  <a href="#"><img src="https://img.shields.io/badge/license-MIT-green"></a>
</p>

# Beasiswa Bersama

<<<<<<< HEAD
Beasiswa Bersama adalah aplikasi web berbasis Laravel untuk pendaftaran dan manajemen beasiswa mahasiswa. Sistem ini mendukung beberapa jenis beasiswa, proses seleksi terintegrasi, serta dashboard statistik untuk admin dan peserta.
=======
Website pendaftaran dan manajemen beasiswa untuk mahasiswa berbasis Laravel. Sistem ini mendukung dua jenis pengguna: **Admin** dan **Peserta** (mahasiswa), serta mendukung beberapa jenis beasiswa dengan alur seleksi dan verifikasi yang terintegrasi.
>>>>>>> 7131e9346697301cb648a09ec1437b3932463468

---

## ✨ Fitur Utama

<<<<<<< HEAD
- **Registrasi & Login** untuk admin dan peserta (mahasiswa)
- **Formulir Pendaftaran Online** (data diri, orang tua, upload dokumen)
- **Multi Beasiswa**: Mandiri, Prestasi, Seni, Cendekia
- **Manajemen Data & Seleksi** oleh admin
- **Upload & Download Dokumen**
- **Status & Timeline Pendaftaran**
- **Dashboard Statistik**
- **Cetak Bukti Pendaftaran**
- **Role-based Access**

---

## 📚 Belajar & Dokumentasi

- Dokumentasi kode dan video tutorial Laravel: [Laravel Docs](https://laravel.com/docs)
- Panduan penggunaan aplikasi: [Wiki Beasiswa Bersama](#)
=======
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

| Nama                | Deskripsi & Persyaratan                                                                 |
|---------------------|----------------------------------------------------------------------------------------|
| **Mandiri**         | Terbuka untuk semua mahasiswa. Biodata lengkap, data orang tua, upload dokumen.        |
| **Prestasi**        | Untuk mahasiswa berprestasi akademik/seni. Upload sertifikat, portofolio, siap tampil. |
| **Seni**            | Untuk mahasiswa berbakat seni. Portofolio, sertifikat, dokumen pendukung.              |
| **Cendekia**        | Prestasi akademik tinggi. Transkrip nilai, surat rekomendasi, hasil tes, dsb.          |
>>>>>>> 7131e9346697301cb648a09ec1437b3932463468

---

## ⚙️ Instalasi

```bash
git clone https://github.com/Ayasha95/BeasiswaBersama.git
cd BeasiswaBersama
composer install
cp .env.example .env
php artisan key:generate
# Edit .env, lalu:
php artisan migrate --seed
php artisan serve
```

Akses aplikasi di [http://localhost:8000](http://localhost:8000)

---

## 👤 Akun Demo

| Role    | Email                  | Password  |
|---------|------------------------|-----------|
| Admin   | admin@beasiswa.com     | password  |
| Peserta | user@beasiswa.com      | password  |

_(Atau buat akun baru melalui halaman registrasi peserta)_

---

> **Catatan:**  
> Pastikan folder `public/uploads` dapat ditulis.  
> Untuk pengiriman email/notifikasi, sesuaikan konfigurasi di `.env`.

---

<<<<<<< HEAD
## 🤝 Kontributor & Sponsor

Terima kasih kepada semua kontributor dan sponsor yang telah mendukung pengembangan Beasiswa Bersama. Ingin berkontribusi? Lihat [Panduan Kontribusi](#).

- [Ayasha95](https://github.com/Ayasha95)
- [Laravel](https://laravel.com)

---

## 📬 Kontribusi

Silakan buat issue atau pull request untuk perbaikan dan pengembangan fitur. Panduan kontribusi dapat ditemukan di [CONTRIBUTING.md](#).

---

<p align="center">
  <sub>Copyright &copy; 2024 Beasiswa Bersama. Powered by Laravel.</sub>
</p>
=======
## 📞 Kontak & Kontribusi

Untuk pertanyaan, bug, atau kontribusi, silakan hubungi [Ayasha95](https://github.com/Ayasha95).
>>>>>>> 7131e9346697301cb648a09ec1437b3932463468

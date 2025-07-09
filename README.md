<p align="center">
  <a href="#"><img src="https://img.shields.io/badge/Laravel-10.x-red"></a>
  <a href="#"><img src="https://img.shields.io/badge/license-MIT-green"></a>
</p>

# Beasiswa Bersama

Beasiswa Bersama adalah aplikasi web berbasis Laravel untuk pendaftaran dan manajemen beasiswa mahasiswa. Sistem ini mendukung beberapa jenis beasiswa, proses seleksi terintegrasi, serta dashboard statistik untuk admin dan peserta.

---

## ✨ Fitur Utama

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

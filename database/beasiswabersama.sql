-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Waktu pembuatan: 03 Jul 2025 pada 07.36
-- Versi server: 8.0.30
-- Versi PHP: 8.1.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `beasiswabersama`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `beasiswa`
--

CREATE TABLE `beasiswa` (
  `id` bigint UNSIGNED NOT NULL,
  `kode_beasiswa` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `nama_beasiswa` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `kategori_id` bigint UNSIGNED DEFAULT NULL,
  `deskripsi` text COLLATE utf8mb4_unicode_ci,
  `kuota` int DEFAULT NULL,
  `nominal` bigint DEFAULT NULL,
  `tanggal_mulai` date DEFAULT NULL,
  `tanggal_akhir` date DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `status` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'Dibuka'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `beasiswa`
--

INSERT INTO `beasiswa` (`id`, `kode_beasiswa`, `nama_beasiswa`, `kategori_id`, `deskripsi`, `kuota`, `nominal`, `tanggal_mulai`, `tanggal_akhir`, `created_at`, `updated_at`, `status`) VALUES
(3, 'TECHNOVA25', 'Beasiswa Inovasi Digital', 1, 'Untuk mahasiswa yang memiliki karya atau proyek inovatif di bidang teknologi informasi, aplikasi, atau perangkat lunak.', 15, 7000000, '2024-12-20', '2025-01-20', '2025-06-25 11:43:44', '2025-06-25 12:28:44', 'Ditutup'),
(4, 'TALENT-ART', 'Beasiswa Talent Seni', 3, 'Beasiswa khusus bagi mahasiswa yang menunjukkan bakat luar biasa dalam seni musik, tari, teater, rupa, dan seni lainnya yang diakui secara kampus atau nasional.', 20, 5500000, '2025-06-01', '2025-07-10', '2025-06-25 11:57:26', '2025-06-25 11:57:26', 'Dibuka'),
(5, 'GLOBAL', 'Beasiswa Global Prestasi', 4, 'Beasiswa penuh untuk mahasiswa Indonesia yang ingin melanjutkan studi S1/S2 ke universitas ternama di luar negeri. Seleksi berdasarkan prestasi akademik, kemampuan bahasa Inggris, dan kegiatan non-akademik.', 5, 150000000, '2025-01-01', '2025-04-15', '2025-06-25 12:27:14', '2025-07-02 23:54:01', 'Ditutup'),
(6, 'SCIENCE', 'Beasiswa Sains Jepang', 4, 'Program beasiswa khusus bagi mahasiswa Indonesia yang ingin melanjutkan studi di bidang teknik dan sains di universitas terkemuka di Jepang. Termasuk pembiayaan kuliah, biaya hidup, pelatihan bahasa Jepang, dan tiket pesawat.', 7, 180000000, '2025-02-05', '2025-05-20', '2025-06-25 12:30:32', '2025-07-03 00:11:42', 'Ditutup'),
(7, 'MANDIRI', 'Beasiswa Mandiri', 2, 'Diberikan kepada mahasiswa yang memiliki latar belakang ekonomi menengah ke bawah namun tetap aktif dan mandiri secara akademik.', 40, 4000000, '2025-02-20', '2025-08-21', '2025-06-25 12:32:29', '2025-07-03 00:00:07', 'Dibuka'),
(8, 'BC2025', 'Beasiswa Cendekia', 2, 'Beasiswa untuk mahasiswa berprestasi dengan kondisi keterbatasan ekonomi namun menunjukkan semangat dan potensi akademik yang tinggi.', 50, 6000000, '2025-06-20', '2025-07-05', '2025-06-25 12:35:36', '2025-06-25 12:36:12', 'Dibuka');

-- --------------------------------------------------------

--
-- Struktur dari tabel `kategori`
--

CREATE TABLE `kategori` (
  `id` bigint UNSIGNED NOT NULL,
  `nama_kategori` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `kategori`
--

INSERT INTO `kategori` (`id`, `nama_kategori`, `created_at`, `updated_at`) VALUES
(1, 'Beasiswa Prestasi Akademik', '2025-06-25 11:23:58', '2025-06-25 11:23:58'),
(2, 'Beasiswa Kebutuhan Ekonomi', '2025-06-25 11:24:10', '2025-06-25 11:24:10'),
(3, 'Beasiswa Miinat & Bakat', '2025-06-25 11:24:35', '2025-06-25 11:51:25'),
(4, 'Beasiswa Luar Negeri', '2025-06-25 11:24:44', '2025-06-25 11:24:44');

-- --------------------------------------------------------

--
-- Struktur dari tabel `mahasiswa`
--

CREATE TABLE `mahasiswa` (
  `id` bigint UNSIGNED NOT NULL,
  `user_id` bigint UNSIGNED NOT NULL,
  `nim` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `nik` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `nama_lengkap` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `no_telp` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `asal_kampus` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `program_studi` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `semester` tinyint UNSIGNED NOT NULL,
  `tanggal_lahir` date NOT NULL,
  `alamat` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` enum('aktif','tidak aktif') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'aktif',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `mahasiswa`
--

INSERT INTO `mahasiswa` (`id`, `user_id`, `nim`, `nik`, `nama_lengkap`, `email`, `no_telp`, `asal_kampus`, `program_studi`, `semester`, `tanggal_lahir`, `alamat`, `status`, `created_at`, `updated_at`) VALUES
(1, 1, '3201091507020001', '3201091507020001', 'Sadewa Rajendra', 'dewa@gmail.com', '081234567890', 'Universitas Bina Sarana Informatika', 'Universitas Bina Sarana Informatika', 1, '2002-07-15', 'Jl. Mawar No. 10, Kecamatan Sukasari, Kota Bandung', 'aktif', '2025-06-25 13:07:37', '2025-06-25 17:37:42'),
(2, 4, '3276012403050002', '3276012403050002', 'Naira Malika', 'malika@gmail.com', '081234567890', 'Universitas Saintek', 'Universitas Saintek', 1, '2005-03-24', 'Jl. Melati No. 10, Jakarta Selatan', 'aktif', '2025-06-26 00:45:33', '2025-06-26 00:45:33');

-- --------------------------------------------------------

--
-- Struktur dari tabel `migrations`
--

CREATE TABLE `migrations` (
  `id` int UNSIGNED NOT NULL,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(17, '2014_10_12_100000_create_password_resets_table', 1),
(18, '2019_12_14_000001_create_personal_access_tokens_table', 1),
(19, '2025_05_25_014801_create_user_table', 1),
(20, '2025_05_25_015127_create_kategori_table', 1),
(21, '2025_05_28_100634_create_beasiswa_table', 1),
(22, '2025_05_29_092159_create_mahasiswa_tabel', 1),
(23, '2025_06_07_044650_create_pendaftaran_table', 1),
(24, '2025_06_13_063220_create_pages_table', 1),
(25, '2025_06_25_190059_add_status_to_beasiswa_table', 2);

-- --------------------------------------------------------

--
-- Struktur dari tabel `pages`
--

CREATE TABLE `pages` (
  `id` bigint UNSIGNED NOT NULL,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `content` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `pendaftaran`
--

CREATE TABLE `pendaftaran` (
  `id` bigint UNSIGNED NOT NULL,
  `beasiswa_id` bigint UNSIGNED NOT NULL,
  `mahasiswa_id` bigint UNSIGNED NOT NULL,
  `status` enum('pending','disetujui','ditolak') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'pending',
  `nama` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `nik` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tanggal_lahir` date NOT NULL,
  `alamat` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `no_telp` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `asal_kampus` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `npsn` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `no_kk` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `nama_orang_tua_wali` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `nik_orang_tua_wali` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `pendidikan_terakhir` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `alamat_orang_tua_wali` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `no_telp_orang_tua_wali` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `pekerjaan` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `penghasilan` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `periode_penghasilan` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `dokumen_transkrip` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `dokumen_rekomendasi` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `pendaftaran`
--

INSERT INTO `pendaftaran` (`id`, `beasiswa_id`, `mahasiswa_id`, `status`, `nama`, `email`, `nik`, `tanggal_lahir`, `alamat`, `no_telp`, `asal_kampus`, `npsn`, `no_kk`, `nama_orang_tua_wali`, `nik_orang_tua_wali`, `pendidikan_terakhir`, `alamat_orang_tua_wali`, `no_telp_orang_tua_wali`, `pekerjaan`, `penghasilan`, `periode_penghasilan`, `dokumen_transkrip`, `dokumen_rekomendasi`, `created_at`, `updated_at`) VALUES
(1, 8, 1, 'disetujui', 'Sadewa Rajendra', 'dewa@gmail.com', '3201091507020001', '2002-07-15', 'Jl. Mawar No. 10, Kecamatan Sukasari, Kota Bandung', '081234567890', 'Universitas Bina Sarana Informatika', '031065', '3201092207050002', 'Wiranto Rajendra', '3201091207700003', 'SMA', 'Jl. Mawar No. 10, Kecamatan Sukasari, Kota Bandung', '081298765432', 'Wirausaha', '< 1 juta', 'perbulan', 'dokumen_pendaftaran/1/8/transkrip_1750882058.pdf', 'dokumen_pendaftaran/1/8/rekomendasi_1750882059.pdf', '2025-06-25 13:07:39', '2025-06-25 17:28:35'),
(2, 4, 2, 'disetujui', 'Naira Malika', 'malika@gmail.com', '3276012403050002', '2005-03-24', 'Jl. Melati No. 10, Jakarta Selatan', '081234567890', 'Universitas Saintek', '12345678', '3276011201800003', 'Siti Aminah', '3276011207700003', 'SMA', 'Jl. Kenanga No. 5, Jakarta Selatan', '081298765432', 'Lainnya', '< 1 juta', 'perbulan', 'dokumen_pendaftaran/2/4/transkrip_1750923933.pdf', 'dokumen_pendaftaran/2/4/rekomendasi_1750923933.pdf', '2025-06-26 00:45:33', '2025-06-26 00:56:56');

-- --------------------------------------------------------

--
-- Struktur dari tabel `personal_access_tokens`
--

CREATE TABLE `personal_access_tokens` (
  `id` bigint UNSIGNED NOT NULL,
  `tokenable_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tokenable_id` bigint UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(64) COLLATE utf8mb4_unicode_ci NOT NULL,
  `abilities` text COLLATE utf8mb4_unicode_ci,
  `last_used_at` timestamp NULL DEFAULT NULL,
  `expires_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `users`
--

CREATE TABLE `users` (
  `id` bigint UNSIGNED NOT NULL,
  `nama` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `level` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'User',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `users`
--

INSERT INTO `users` (`id`, `nama`, `email`, `password`, `level`, `created_at`, `updated_at`) VALUES
(1, 'Superadmin', 'admin@email.com', '$2y$10$LGq.uPOCCHODy3tBzu0vPOSIsG9WQ/lurLPqvgc/RowlIO4857tCW', 'Admin', '2025-06-25 11:01:33', '2025-06-25 11:01:33'),
(2, NULL, 'dewa@gmail.com', '$2y$10$f4eJvUApf0d/u7/.pSPPfuyvzSQr59X4TLk9d07LB0KuScs1Acr5G', 'User', '2025-06-25 11:35:08', '2025-06-25 11:35:08'),
(3, NULL, 'dewarjr@gmail.com', '$2y$10$Qmgedu99E7sGfvhWd.Y/Cu2hEXHYfTRfaGK/QlhFEBaf/F57XWGZW', 'User', '2025-06-26 00:30:21', '2025-06-26 00:30:21'),
(4, NULL, 'malika@gmail.com', '$2y$10$qfb61s5GEldFRAfmM9Tm9.dnmchcZ0jpHPMQwTdtJPtzV7m8PaNJO', 'User', '2025-06-26 00:35:10', '2025-06-26 00:35:10'),
(5, NULL, 'keyra@gmai.com', '$2y$10$19/7DcF4rrcQkaL0YbbKqOgpdWQ4sPpf1JNOZ7YWycq1WgTrcE6gW', 'User', '2025-07-02 18:19:32', '2025-07-02 18:19:32'),
(6, NULL, 'balala@gmail.com', '$2y$10$2OLfrm9xjghh.omMG4U8EOv26/xQYAVik6Z05ZmL59c2BY5AbhJUq', 'User', '2025-07-02 19:22:55', '2025-07-02 19:22:55'),
(7, NULL, 'wil@gmail.com', '$2y$10$Ql2PxYKPx0bSmYeSaNRGp.wLvuub1q2kg2AOrFxVTCh8jcmQ1FyV.', 'User', '2025-07-02 19:38:39', '2025-07-02 19:38:39'),
(8, NULL, 'wook@email.com', '$2y$10$/KvwuXuicUKkoaY9PvQ8kuaVMnTnwv7sONtEM2XC5Ur7rqPO3cr2m', 'User', '2025-07-02 21:02:38', '2025-07-02 21:02:38');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `beasiswa`
--
ALTER TABLE `beasiswa`
  ADD PRIMARY KEY (`id`),
  ADD KEY `beasiswa_kategori_id_foreign` (`kategori_id`);

--
-- Indeks untuk tabel `kategori`
--
ALTER TABLE `kategori`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `mahasiswa`
--
ALTER TABLE `mahasiswa`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `mahasiswa_user_id_unique` (`user_id`),
  ADD UNIQUE KEY `mahasiswa_nim_unique` (`nim`),
  ADD UNIQUE KEY `mahasiswa_nik_unique` (`nik`);

--
-- Indeks untuk tabel `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `pages`
--
ALTER TABLE `pages`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Indeks untuk tabel `pendaftaran`
--
ALTER TABLE `pendaftaran`
  ADD PRIMARY KEY (`id`),
  ADD KEY `pendaftaran_beasiswa_id_foreign` (`beasiswa_id`),
  ADD KEY `pendaftaran_mahasiswa_id_foreign` (`mahasiswa_id`);

--
-- Indeks untuk tabel `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  ADD KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`);

--
-- Indeks untuk tabel `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `beasiswa`
--
ALTER TABLE `beasiswa`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT untuk tabel `kategori`
--
ALTER TABLE `kategori`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT untuk tabel `mahasiswa`
--
ALTER TABLE `mahasiswa`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT untuk tabel `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;

--
-- AUTO_INCREMENT untuk tabel `pages`
--
ALTER TABLE `pages`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `pendaftaran`
--
ALTER TABLE `pendaftaran`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT untuk tabel `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- Ketidakleluasaan untuk tabel pelimpahan (Dumped Tables)
--

--
-- Ketidakleluasaan untuk tabel `beasiswa`
--
ALTER TABLE `beasiswa`
  ADD CONSTRAINT `beasiswa_kategori_id_foreign` FOREIGN KEY (`kategori_id`) REFERENCES `kategori` (`id`) ON DELETE CASCADE;

--
-- Ketidakleluasaan untuk tabel `mahasiswa`
--
ALTER TABLE `mahasiswa`
  ADD CONSTRAINT `mahasiswa_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Ketidakleluasaan untuk tabel `pendaftaran`
--
ALTER TABLE `pendaftaran`
  ADD CONSTRAINT `pendaftaran_beasiswa_id_foreign` FOREIGN KEY (`beasiswa_id`) REFERENCES `beasiswa` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `pendaftaran_mahasiswa_id_foreign` FOREIGN KEY (`mahasiswa_id`) REFERENCES `mahasiswa` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

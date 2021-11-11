-- phpMyAdmin SQL Dump
-- version 5.0.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 11 Nov 2021 pada 08.47
-- Versi server: 10.4.17-MariaDB
-- Versi PHP: 7.3.27

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `aset_nict`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `connection` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `inventaris`
--

CREATE TABLE `inventaris` (
  `id_inventaris` bigint(20) UNSIGNED NOT NULL,
  `kode_inventaris` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `nama_inventaris` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `ruangan_id` bigint(20) UNSIGNED DEFAULT NULL,
  `nup` int(11) NOT NULL,
  `tahun` year(4) NOT NULL,
  `merk` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `harga` int(11) DEFAULT NULL,
  `keterangan` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `kondisi` enum('Baik','Rusak Ringan','Rusak Berat') COLLATE utf8mb4_unicode_ci NOT NULL,
  `label` enum('Sudah Dilabel','Belum Dilabel') COLLATE utf8mb4_unicode_ci NOT NULL,
  `sensus` enum('Ditemukan','Tidak Ditemukan') COLLATE utf8mb4_unicode_ci NOT NULL,
  `foto_inventaris` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `inventaris`
--

INSERT INTO `inventaris` (`id_inventaris`, `kode_inventaris`, `nama_inventaris`, `ruangan_id`, `nup`, `tahun`, `merk`, `harga`, `keterangan`, `kondisi`, `label`, `sensus`, `foto_inventaris`, `created_at`, `updated_at`) VALUES
(1, '4010101001', 'Bangunan Gedung Kantor Permanen', 1, 11, 2010, 'Gedung Utama (Main Buliding)', 123456, '215 Tahun 2020', 'Baik', 'Sudah Dilabel', 'Ditemukan', 'gdng.jpg-1617401474.jpg', NULL, NULL),
(2, '4010108001', 'Bangunan Gedung Tempat Ibadah Permanen', 1, 3, 2010, 'Musholla', 123456, '215 Tahun 2020', 'Baik', 'Sudah Dilabel', 'Ditemukan', '', NULL, NULL),
(3, '4010113001', 'Gedung Pos Jaga Permanen', 1, 15, 2010, 'Pos Keamanan', 123456, '215 Tahun 2020', 'Baik', 'Sudah Dilabel', 'Ditemukan', 'foto', NULL, NULL),
(4, '3030103003', 'Transformator', 2, 3, 2009, 'Transformator Kp 1000 kVA', 12345, '216 Tahun 2020', 'Baik', 'Sudah Dilabel', 'Ditemukan', '', NULL, NULL),
(5, '3050105058', 'Focusing Screen/Layar LCD Projector', 3, 227, 2010, 'Cinema', 12345, '216 Tahun 2020', 'Rusak Ringan', 'Belum Dilabel', 'Ditemukan', 'foto', NULL, NULL),
(6, '4010205001', 'Asrama Permanen', 1, 9, 2010, 'Gedung Asrama (Dormitory)', 1234567, '215 Tahun 2020', 'Baik', 'Sudah Dilabel', 'Ditemukan', 'foto', NULL, NULL),
(8, '3050201019', 'Meja Makan Kayu', 3, 67, 2010, 'Meja Makan Kayu untuk 6 Orang', 132467, '216 Tahun 2020', 'Baik', 'Belum Dilabel', 'Ditemukan', 'img01.jpg-1617453832.jpg', NULL, NULL),
(9, '3050206037', 'Mimbar/Podium', 3, 42, 2010, 'abc', 132456, '216 Tahun 2020', 'Baik', 'Sudah Dilabel', 'Ditemukan', '3050206037-42_20201109_140434.jpg-1617128984.jpg', NULL, NULL),
(10, '3050105007', 'CCTV - Camera Control Television System', 3, 371, 2010, 'Samsung (SID-45)', 12345, '216 Tahun 2020', 'Baik', 'Belum Dilabel', 'Ditemukan', 'camara-seguridad-cctv_117856-354.jpg-1617404150.jpg', NULL, NULL);

-- --------------------------------------------------------

--
-- Struktur dari tabel `inventory`
--

CREATE TABLE `inventory` (
  `id_inventory` bigint(20) UNSIGNED NOT NULL,
  `nama_inventory` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `no_kwitansi` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `vendor` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `harga` int(11) NOT NULL,
  `id_jenis_barang` bigint(20) UNSIGNED NOT NULL,
  `tgl_perolehan` date NOT NULL,
  `tgl_pembukuan` date NOT NULL,
  `jumlah` int(11) NOT NULL,
  `satuan` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `foto_inventory` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `inventory`
--

INSERT INTO `inventory` (`id_inventory`, `nama_inventory`, `no_kwitansi`, `vendor`, `harga`, `id_jenis_barang`, `tgl_perolehan`, `tgl_pembukuan`, `jumlah`, `satuan`, `foto_inventory`, `created_at`, `updated_at`) VALUES
(1, 'Spidol', 'KW/0001', 'Toko Spidol', 500000, 1, '2021-03-24', '2021-03-31', 10, 'lusin', 'd7cb7b3daea70389682ae777e9044555c0276242_0.jpg-1628976452.jpg', NULL, NULL),
(2, 'Kertas HVS A4', 'KW/0002', 'Sinar Dunia', 10000000, 1, '2021-03-26', '2021-03-31', 50, 'box', 'kertas_hvs_paper_one_a4_1_dus_1549930511_c19ad751_progressive.jpg-1628976419.jpg', NULL, NULL),
(3, 'Pulpen', 'Kw/0004', 'toko alat tulis', 200000, 1, '2021-03-29', '2021-04-03', 10, 'pack', NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Struktur dari tabel `jenis_barang`
--

CREATE TABLE `jenis_barang` (
  `id_jenis_barang` bigint(20) UNSIGNED NOT NULL,
  `nama_jenis_barang` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `jenis_barang`
--

INSERT INTO `jenis_barang` (`id_jenis_barang`, `nama_jenis_barang`, `created_at`, `updated_at`) VALUES
(1, 'Alat Tulis', NULL, NULL);

-- --------------------------------------------------------

--
-- Struktur dari tabel `kategori_ruangans`
--

CREATE TABLE `kategori_ruangans` (
  `id_kategori_ruangan` bigint(20) UNSIGNED NOT NULL,
  `nama_kategori_ruang` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `kategori_ruangans`
--

INSERT INTO `kategori_ruangans` (`id_kategori_ruangan`, `nama_kategori_ruang`, `created_at`, `updated_at`) VALUES
(1, 'Taman/Halaman', NULL, NULL),
(2, 'Ruang Engineering', NULL, NULL),
(3, 'Auditorium', NULL, NULL);

-- --------------------------------------------------------

--
-- Struktur dari tabel `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_resets_table', 1),
(3, '2019_08_19_000000_create_failed_jobs_table', 1),
(4, '2021_03_23_110549_create_inventaris_table', 1),
(5, '2021_03_23_150435_create_ruangan_table', 1),
(6, '2021_03_23_183934_create_kategori_ruangan_table', 1),
(8, '2021_03_31_175719_create_jenis_barang_table', 2),
(10, '2021_03_31_175927_create_inventory_table', 3);

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
-- Struktur dari tabel `ruangans`
--

CREATE TABLE `ruangans` (
  `ruangan_id` bigint(20) UNSIGNED NOT NULL,
  `nama_ruangan` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `kode_ruangan` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `lantai` char(11) COLLATE utf8mb4_unicode_ci NOT NULL,
  `id_kategori_ruangan` bigint(20) UNSIGNED NOT NULL,
  `luas` int(11) NOT NULL,
  `foto_ruangan` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `dipakai` tinyint(1) DEFAULT 0,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `ruangans`
--

INSERT INTO `ruangans` (`ruangan_id`, `nama_ruangan`, `kode_ruangan`, `lantai`, `id_kategori_ruangan`, `luas`, `foto_ruangan`, `dipakai`, `created_at`, `updated_at`) VALUES
(1, 'Halaman Depan/Utama', 'FA.001', '1', 1, 350, '1594635143_20200713_115624.jpg', 1, NULL, NULL),
(2, 'Ruang Travo', 'MB.B06', 'Basement', 2, 30, '1593661806_15936610759241076915019519494205.jpg', 1, NULL, NULL),
(3, 'Auditorium', 'MB.101', '1', 3, 100, '1593656747_15936566977383695411418852472736.jpg', 1, NULL, NULL),
(4, 'Halaman Utara/Kiri', 'FA.002', '1', 1, 120, '1594636184_20200713_172412[1].jpg-1617986297.jpg', 1, NULL, NULL),
(5, 'Halaman Selatan/Kanan', 'FA.003', '1', 1, 160, '1594615980_15946159083444879130163780340696.jpg-1618550920.jpg', 1, NULL, NULL),
(6, 'Halaman Belakang', 'FA.004', '1', 1, 180, '1594636259_20200713_172507[1].jpg-1618551098.jpg', 1, NULL, NULL),
(7, 'Halaman Antara', 'FA.005', '1', 1, 30, '1594614559_15946145248637170506917106239632.jpg-1618630742.jpg', 1, NULL, NULL),
(8, 'LV Room', 'DB.114', '1', 2, 3, '1594283794_LV Room.jpg-1618631930.jpg', 1, NULL, NULL),
(9, 'AV Room', 'DB.115', '1', 2, 1, '1594283868_AV Room.jpg-1618632135.jpg', 1, NULL, NULL),
(10, 'LV Room', 'DB.223', '2', 2, 2, '1594638267_LV Room.jpg-1618940691.jpg', 1, NULL, NULL),
(11, 'AV Room', 'DB.224', '2', 2, 1, '1594638783_AV Room.jpg-1618941106.jpg', 1, NULL, NULL);

-- --------------------------------------------------------

--
-- Struktur dari tabel `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `inventaris`
--
ALTER TABLE `inventaris`
  ADD PRIMARY KEY (`id_inventaris`),
  ADD UNIQUE KEY `inventaris_kode_inventaris_unique` (`kode_inventaris`),
  ADD KEY `ruangan_id` (`ruangan_id`);

--
-- Indeks untuk tabel `inventory`
--
ALTER TABLE `inventory`
  ADD PRIMARY KEY (`id_inventory`),
  ADD UNIQUE KEY `inventory_no_kwitansi_unique` (`no_kwitansi`),
  ADD KEY `id_jenis_barang` (`id_jenis_barang`);

--
-- Indeks untuk tabel `jenis_barang`
--
ALTER TABLE `jenis_barang`
  ADD PRIMARY KEY (`id_jenis_barang`);

--
-- Indeks untuk tabel `kategori_ruangans`
--
ALTER TABLE `kategori_ruangans`
  ADD PRIMARY KEY (`id_kategori_ruangan`);

--
-- Indeks untuk tabel `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Indeks untuk tabel `ruangans`
--
ALTER TABLE `ruangans`
  ADD PRIMARY KEY (`ruangan_id`),
  ADD UNIQUE KEY `ruangans_kode_ruangan_unique` (`kode_ruangan`),
  ADD KEY `id_kategori_ruangan` (`id_kategori_ruangan`);

--
-- Indeks untuk tabel `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `inventaris`
--
ALTER TABLE `inventaris`
  MODIFY `id_inventaris` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT untuk tabel `inventory`
--
ALTER TABLE `inventory`
  MODIFY `id_inventory` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT untuk tabel `jenis_barang`
--
ALTER TABLE `jenis_barang`
  MODIFY `id_jenis_barang` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT untuk tabel `kategori_ruangans`
--
ALTER TABLE `kategori_ruangans`
  MODIFY `id_kategori_ruangan` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT untuk tabel `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT untuk tabel `ruangans`
--
ALTER TABLE `ruangans`
  MODIFY `ruangan_id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT untuk tabel `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- Ketidakleluasaan untuk tabel pelimpahan (Dumped Tables)
--

--
-- Ketidakleluasaan untuk tabel `inventaris`
--
ALTER TABLE `inventaris`
  ADD CONSTRAINT `inventaris_ibfk_1` FOREIGN KEY (`ruangan_id`) REFERENCES `ruangans` (`ruangan_id`);

--
-- Ketidakleluasaan untuk tabel `inventory`
--
ALTER TABLE `inventory`
  ADD CONSTRAINT `inventory_ibfk_1` FOREIGN KEY (`id_jenis_barang`) REFERENCES `jenis_barang` (`id_jenis_barang`);

--
-- Ketidakleluasaan untuk tabel `ruangans`
--
ALTER TABLE `ruangans`
  ADD CONSTRAINT `ruangans_ibfk_1` FOREIGN KEY (`id_kategori_ruangan`) REFERENCES `kategori_ruangans` (`id_kategori_ruangan`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

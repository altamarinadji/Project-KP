-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 07 Jul 2021 pada 08.28
-- Versi server: 10.4.11-MariaDB
-- Versi PHP: 7.4.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `denyaluminium`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `bahan_bakus`
--

CREATE TABLE `bahan_bakus` (
  `id_bb` bigint(20) UNSIGNED NOT NULL,
  `nama_bb` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `jenis_bahan_id` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `bahan_bakus`
--

INSERT INTO `bahan_bakus` (`id_bb`, `nama_bb`, `jenis_bahan_id`, `created_at`, `updated_at`) VALUES
(8, 'Aluminium 4 inch', 1, NULL, '2021-03-11 01:56:42'),
(9, 'Aluminium 3 inch', 1, NULL, NULL),
(11, 'Kaca Bening', 2, NULL, NULL),
(12, 'Kaca Riben', 2, NULL, '2021-05-30 20:00:15'),
(21, 'Triplek', 3, '2021-06-28 19:05:47', '2021-06-28 19:05:47');

-- --------------------------------------------------------

--
-- Struktur dari tabel `detail_bahans`
--

CREATE TABLE `detail_bahans` (
  `id_detbah` bigint(20) UNSIGNED NOT NULL,
  `nama_detbah` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `pesanan_detail_id` int(11) NOT NULL,
  `bahan_baku_id` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `detail_bahans`
--

INSERT INTO `detail_bahans` (`id_detbah`, `nama_detbah`, `pesanan_detail_id`, `bahan_baku_id`, `created_at`, `updated_at`) VALUES
(134, 'Aluminium 4 inch', 85, 8, '2021-06-03 20:19:44', '2021-06-03 20:19:44'),
(135, 'Aluminium 4 inch', 86, 8, '2021-06-03 20:20:46', '2021-06-03 20:20:46'),
(136, 'Aluminium 4 inch', 87, 8, '2021-06-07 06:01:06', '2021-06-07 06:01:06'),
(137, 'Aluminium 3 inch', 88, 9, '2021-06-07 06:36:46', '2021-06-07 06:36:46'),
(138, 'Aluminium 4 inch', 89, 8, '2021-06-07 06:38:26', '2021-06-07 06:38:26'),
(139, 'Aluminium 4 inch', 90, 8, '2021-06-07 06:42:45', '2021-06-07 06:42:45'),
(140, 'Aluminium 4 inch', 91, 8, '2021-06-07 06:44:38', '2021-06-07 06:44:38'),
(141, 'Aluminium 4 inch', 92, 8, '2021-06-07 06:51:11', '2021-06-07 06:51:11'),
(142, 'Kaca Bening', 92, 11, '2021-06-07 06:51:11', '2021-06-07 06:51:11'),
(143, 'Triplek', 92, 13, '2021-06-07 06:51:11', '2021-06-07 06:51:11'),
(144, 'Aluminium 4 inch', 93, 8, '2021-06-07 07:19:10', '2021-06-07 07:19:10'),
(152, 'Aluminium 4 inch', 97, 8, '2021-06-13 19:04:32', '2021-06-13 19:04:32'),
(153, 'Aluminium 4 inch', 98, 8, '2021-06-21 23:33:58', '2021-06-21 23:33:58'),
(154, 'Aluminium 4 inch', 99, 8, '2021-06-21 23:34:15', '2021-06-21 23:34:15'),
(155, 'Aluminium 3 inch', 100, 9, '2021-06-28 19:01:27', '2021-06-28 19:01:27'),
(156, 'Kaca Bening', 100, 11, '2021-06-28 19:01:27', '2021-06-28 19:01:27');

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
-- Struktur dari tabel `jenis_bahans`
--

CREATE TABLE `jenis_bahans` (
  `id_jenis` bigint(20) UNSIGNED NOT NULL,
  `nama_jenis` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `jenis_bahans`
--

INSERT INTO `jenis_bahans` (`id_jenis`, `nama_jenis`, `created_at`, `updated_at`) VALUES
(1, 'Aluminium', NULL, NULL),
(2, 'Kaca', NULL, NULL),
(3, 'Triplek', NULL, NULL);

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
(4, '2021_02_10_040652_create_products_table', 1),
(5, '2021_02_10_040721_create_pesanans_table', 1),
(6, '2021_02_10_040748_create_pesanan_details_table', 1),
(7, '2021_02_20_033845_create_jenis_bahans_table', 1),
(8, '2021_02_20_033923_create_bahan_bakus_table', 1),
(9, '2021_02_22_073529_create_detail_bahans_table', 1);

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
-- Struktur dari tabel `pesanans`
--

CREATE TABLE `pesanans` (
  `id_pesan` bigint(20) UNSIGNED NOT NULL,
  `kode_pemesanan` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '0',
  `total_harga_pesan` int(11) DEFAULT NULL,
  `Dp` int(11) DEFAULT NULL,
  `kode_unik` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `pesanans`
--

INSERT INTO `pesanans` (`id_pesan`, `kode_pemesanan`, `status`, `total_harga_pesan`, `Dp`, `kode_unik`, `user_id`, `created_at`, `updated_at`) VALUES
(43, 'DA-43', '2', 1000000, 500000, 85, 9, '2021-06-03 20:19:44', '2021-06-03 20:20:18'),
(44, 'DA-44', '2', 100000, 50000, 49, 9, '2021-06-03 20:20:46', '2021-06-11 21:22:04'),
(53, 'DA-53', '2', 1000000, 500000, 69, 13, '2021-06-13 19:04:32', '2021-06-13 19:05:51'),
(54, 'DA-54', '1', 1500000, 750000, 82, 13, '2021-06-21 23:33:58', '2021-06-21 23:35:24'),
(55, 'DA-55', '2', 1000000, 500000, 7, 13, '2021-06-28 19:01:27', '2021-06-28 19:06:18');

-- --------------------------------------------------------

--
-- Struktur dari tabel `pesanan_details`
--

CREATE TABLE `pesanan_details` (
  `id_det` bigint(20) UNSIGNED NOT NULL,
  `jumlah_pesanan` int(11) NOT NULL,
  `total_hargadet` int(11) DEFAULT NULL,
  `panjang` int(11) NOT NULL,
  `lebar` int(11) NOT NULL,
  `tinggi` int(11) NOT NULL,
  `Warna` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `deskripsi` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `contoh_model` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `model_ditawarkan` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `revisi` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `product_id` int(11) NOT NULL,
  `pesanan_id` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `pesanan_details`
--

INSERT INTO `pesanan_details` (`id_det`, `jumlah_pesanan`, `total_hargadet`, `panjang`, `lebar`, `tinggi`, `Warna`, `deskripsi`, `contoh_model`, `model_ditawarkan`, `revisi`, `product_id`, `pesanan_id`, `created_at`, `updated_at`) VALUES
(85, 1, 1000000, 1, 1, 1, 'Coklat', NULL, NULL, 'avanza.jpg', NULL, 1, 43, '2021-06-03 20:19:44', '2021-06-03 20:20:09'),
(86, 1, 100000, 1, 1, 1, 'Putih', NULL, NULL, 'pngwing.com (2).png', NULL, 4, 44, '2021-06-03 20:20:46', '2021-06-11 21:22:04'),
(97, 1, 1000000, 1, 1, 1, 'Putih', NULL, '3rZz5u5ocQbLhYDCbPMo9i55JEPF1IkT89nx0BkH.jpg', 'avanza.jpg', NULL, 1, 53, '2021-06-13 19:04:32', '2021-06-13 19:04:51'),
(98, 1, 1000000, 111, 121, 11, 'Coklat', NULL, NULL, 'avanza.jpg', NULL, 3, 54, '2021-06-21 23:33:58', '2021-06-21 23:34:54'),
(99, 100, 500000, 100, 100, 100, 'Coklat', NULL, NULL, 'brio.jpg', NULL, 1, 54, '2021-06-21 23:34:15', '2021-06-21 23:35:11'),
(100, 1, 1000000, 100, 50, 100, 'Abu-abu', NULL, 'rjo3gMMGhPUWtB8ZB2TcXFyT29xhCyKk1THt2ixf.jpg', 'avanza.jpg', 'KUrang sesuai', 1, 55, '2021-06-28 19:01:27', '2021-06-28 19:03:08');

-- --------------------------------------------------------

--
-- Struktur dari tabel `products`
--

CREATE TABLE `products` (
  `id_pro` bigint(20) UNSIGNED NOT NULL,
  `kode_produk` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `nama_pro` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `gambar_pro` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `Kaca` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `Triplek` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `products`
--

INSERT INTO `products` (`id_pro`, `kode_produk`, `nama_pro`, `gambar_pro`, `Kaca`, `Triplek`, `created_at`, `updated_at`) VALUES
(1, 'Rk003', 'Rak Buku', 'tokolinggaucom_rak-buku-portable-aluminium---rak-serbaguna-5-lapis_full02.webp', 'Pakai', 'Pakai', '2021-03-11 01:06:29', '2021-05-30 01:32:00'),
(3, 'Rk001', 'Rak Sepatu', '0_9eab6151-be2b-4f73-b3cc-e481cc0eb18c_750_1050.jpg', 'Pakai', 'Pakai', NULL, '2021-04-20 23:37:00'),
(4, 'Rk002', 'Rak Pajangan', 'WhatsApp Image 2021-03-10 at 20.24.00.jpeg', 'Pakai', 'Pakai', NULL, '2021-04-20 23:37:20'),
(13, 'Mj001', 'Meja Belajar', 'WhatsApp Image 2021-03-10 at 20.23.58.jpeg', 'Pakai', 'Pakai', '2021-03-11 01:01:55', '2021-04-20 23:37:28'),
(25, 'PR123', 'Lemari alum', 'avanza.jpg', 'Pakai', 'Pakai', '2021-06-13 19:10:20', '2021-06-13 19:10:46'),
(26, 'DN123', 'Lemari Kecil', 'avanza.jpg', 'Pakai', NULL, '2021-06-28 19:05:10', '2021-06-28 19:05:10');

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
  `user_level` int(11) NOT NULL,
  `alamat` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `nohp` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `email_verified_at`, `password`, `user_level`, `alamat`, `nohp`, `remember_token`, `created_at`, `updated_at`) VALUES
(5, 'admin', 'admin@gmail.com', NULL, '$2y$10$qST.dxreUtziBw7b455zgewH0M7oQrxVlyI3JsZ54EMdj1NZfvNsu', 1, NULL, NULL, NULL, '2021-03-07 05:53:11', '2021-03-07 05:53:11'),
(9, 'Altamarin', 'alta@gmail.com', NULL, '$2y$10$2D8Ox5dUj0vQ.9fPs/yLYeGC.HC/rsdUcUBhVy7TJ1yIypNLO0PMK', 0, 'Jl Mawar 11', '082828284', NULL, '2021-06-03 19:46:17', '2021-06-11 21:19:30'),
(13, 'Altamarin', 'altamarin02212000@gmail.com', NULL, '$2y$10$arqgDoENjCXJ3alK55w/iuUvMb14gLEfrp6/l//6kgXu7.1oOgdvG', 0, 'jl merpati 7', '0812121212', 'fuEvTj9kB3gCe2pIaioisNSaXiGfaykWdqLoj7UYeBpzLMb30u4EnRN5UK9u', '2021-06-13 18:54:06', '2021-06-22 00:03:33');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `bahan_bakus`
--
ALTER TABLE `bahan_bakus`
  ADD PRIMARY KEY (`id_bb`);

--
-- Indeks untuk tabel `detail_bahans`
--
ALTER TABLE `detail_bahans`
  ADD PRIMARY KEY (`id_detbah`);

--
-- Indeks untuk tabel `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `jenis_bahans`
--
ALTER TABLE `jenis_bahans`
  ADD PRIMARY KEY (`id_jenis`);

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
-- Indeks untuk tabel `pesanans`
--
ALTER TABLE `pesanans`
  ADD PRIMARY KEY (`id_pesan`);

--
-- Indeks untuk tabel `pesanan_details`
--
ALTER TABLE `pesanan_details`
  ADD PRIMARY KEY (`id_det`);

--
-- Indeks untuk tabel `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id_pro`);

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
-- AUTO_INCREMENT untuk tabel `bahan_bakus`
--
ALTER TABLE `bahan_bakus`
  MODIFY `id_bb` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT untuk tabel `detail_bahans`
--
ALTER TABLE `detail_bahans`
  MODIFY `id_detbah` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=157;

--
-- AUTO_INCREMENT untuk tabel `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `jenis_bahans`
--
ALTER TABLE `jenis_bahans`
  MODIFY `id_jenis` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT untuk tabel `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT untuk tabel `pesanans`
--
ALTER TABLE `pesanans`
  MODIFY `id_pesan` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=56;

--
-- AUTO_INCREMENT untuk tabel `pesanan_details`
--
ALTER TABLE `pesanan_details`
  MODIFY `id_det` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=101;

--
-- AUTO_INCREMENT untuk tabel `products`
--
ALTER TABLE `products`
  MODIFY `id_pro` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;

--
-- AUTO_INCREMENT untuk tabel `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

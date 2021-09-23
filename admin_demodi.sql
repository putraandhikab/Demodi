-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Sep 23, 2021 at 05:25 AM
-- Server version: 10.4.20-MariaDB
-- PHP Version: 7.4.22

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `admin_demodi`
--

-- --------------------------------------------------------

--
-- Table structure for table `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `uuid` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `connection` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `jadwals`
--

CREATE TABLE `jadwals` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `id_jadwal` varchar(6) COLLATE utf8mb4_unicode_ci NOT NULL,
  `id_sales` varchar(6) COLLATE utf8mb4_unicode_ci NOT NULL,
  `id_profile` varchar(6) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tanggal_kunjungan` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `jadwals`
--

INSERT INTO `jadwals` (`id`, `id_jadwal`, `id_sales`, `id_profile`, `tanggal_kunjungan`) VALUES
(1, 'J001', 'S001', 'PR001', '2021-09-26'),
(4, 'J002', 'S002', 'PR002', '2021-09-27'),
(5, 'J005', 'S003', 'PR003', '2021-09-29');

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_resets_table', 1),
(3, '2019_08_19_000000_create_failed_jobs_table', 1),
(4, '2019_12_14_000001_create_personal_access_tokens_table', 1),
(5, '2021_08_31_034506_create_sales_table', 1),
(6, '2021_08_31_034947_create_produks_table', 1),
(7, '2021_08_31_035122_create_prospek_profiles_table', 1),
(8, '2021_08_31_035438_create_jadwals_table', 1);

-- --------------------------------------------------------

--
-- Table structure for table `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `personal_access_tokens`
--

CREATE TABLE `personal_access_tokens` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `tokenable_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tokenable_id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(64) COLLATE utf8mb4_unicode_ci NOT NULL,
  `abilities` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `last_used_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `produks`
--

CREATE TABLE `produks` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `id_produk` varchar(6) COLLATE utf8mb4_unicode_ci NOT NULL,
  `merk` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tipe` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `warna` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `harga` int(11) NOT NULL,
  `stok` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `produks`
--

INSERT INTO `produks` (`id`, `id_produk`, `merk`, `tipe`, `warna`, `harga`, `stok`, `created_at`, `updated_at`) VALUES
(1, 'P001', 'Toyota', 'Agya', 'Silver', 170390000, '4', NULL, NULL),
(2, 'P002', 'Daihatsu', 'Terios', 'White', 255600000, '9', NULL, NULL),
(3, 'P003', 'Honda', 'Brio', 'Yellow', 201700000, '7', NULL, NULL),
(4, 'P004', 'Mitsubishi', 'Pajero Sport', 'Red', 748700000, '6', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `prospek_profiles`
--

CREATE TABLE `prospek_profiles` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `id_profile` varchar(6) COLLATE utf8mb4_unicode_ci NOT NULL,
  `nama_profile` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `nohp_profile` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `alamat_profile` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `longtitude` double NOT NULL,
  `latitude` double NOT NULL,
  `metode_pembelian` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `kepemilikan_rumah` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `akses_kendaraan` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tanggal_pengiriman` date NOT NULL,
  `ketersediaan_dana` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `booking_fee` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `merk` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tipe` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `down_payment` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tipe_asuransi` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `diskon` double NOT NULL,
  `penawaran_lain` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `leasing` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `kunjungan_selanjutnya` date NOT NULL,
  `foto` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `prospek_profiles`
--

INSERT INTO `prospek_profiles` (`id`, `id_profile`, `nama_profile`, `nohp_profile`, `alamat_profile`, `longtitude`, `latitude`, `metode_pembelian`, `kepemilikan_rumah`, `akses_kendaraan`, `tanggal_pengiriman`, `ketersediaan_dana`, `booking_fee`, `merk`, `tipe`, `down_payment`, `tipe_asuransi`, `diskon`, `penawaran_lain`, `leasing`, `kunjungan_selanjutnya`, `foto`) VALUES
(1, 'PR001', 'Tasya Sita Mutia', '08326218462', 'Jl. Andir', 106.82181, -6.193125, 'Cash', 'Sendiri', 'Jalan Mobil', '2021-09-30', 'Siap', 'Siap', 'Mitsubishi', 'Pajero Sport', '20%', 'Kombinasi', 0.2, 'Ya', NULL, '2021-09-25', '1632280542.jpg'),
(2, 'PR002', 'Yasyfa Camilla', '08512621743', 'Jl. Kiara Condong', 107.6341158, -6.9237577, 'kredit', 'kontrak', 'Jalan Motor', '2021-10-08', 'belum', 'belum', 'Toyota', 'Agya', '40%', 'all risk', 0.3, 'tidak', 'Adira', '2021-09-28', '1632298629.jpg'),
(3, 'PR003', 'Dinda Fauziah', '081283829173', 'Jl. Riau', 106.82181, -6.193125, 'kredit', 'kontrak', 'Jalan Motor', '2021-09-29', 'siap', 'siap', 'Daihatsu', 'Terios', '30%', 'kombinasi', 0.5, 'ya', NULL, '2021-09-30', '1632365591.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `sales`
--

CREATE TABLE `sales` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `id_sales` varchar(6) COLLATE utf8mb4_unicode_ci NOT NULL,
  `nama_sales` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `username` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `no_hp` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `alamat_sales` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `bank` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `norek` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `pendapatan` int(11) NOT NULL,
  `foto` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `sales`
--

INSERT INTO `sales` (`id`, `id_sales`, `nama_sales`, `username`, `password`, `no_hp`, `alamat_sales`, `email`, `bank`, `norek`, `pendapatan`, `foto`, `created_at`, `updated_at`) VALUES
(1, 'S001', 'Bagas D P', 'bagasputera', '$2y$10$ad5zGBeRv/QWyW6WoMdFGuKZywUZTTywZf6wzkbhOWNAGDbDzTCBi', '082126212694', 'Jl. Kopo', 'bagasputera746@gmail.com', 'MANDIRI', '1010006341323', 1000000, '1632294838.jpg', NULL, NULL),
(2, 'S002', 'Putra A B', 'putraab7', '$2y$10$ad5zGBeRv/QWyW6WoMdFGuKZywUZTTywZf6wzkbhOWNAGDbDzTCBi', '081324355489', 'Jl. Permata Cimahi', 'putraandhika28@gmail.com', 'BNI', '0238272077', 1100000, '1632295020.jpg', NULL, NULL),
(3, 'S003', 'Farouq A A', 'sayagipar', '$2y$10$ad5zGBeRv/QWyW6WoMdFGuKZywUZTTywZf6wzkbhOWNAGDbDzTCBi', '083195166660', 'Jl. Bayangkara', 'farouqalghi12@gmail.com', 'BCA', '5220304312', 1250000, '1632295155.jpg', NULL, NULL),
(4, 'S004', 'Deni Samuel', 'desa123', '$2y$10$kYGg9VD4LgcCYk3WoJ.QL.Uz3wLHgYtAoi/9WmQw8onykGDFxG0hq', '083126212699', 'Jl. Cibereum', 'denisamuel@gmail.com', 'BTN', '701101155', 1050000, '1632295913.jpg', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `firstname` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `lastname` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `username` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `phonenumber` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `address` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `foto` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'admin.png',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `firstname`, `lastname`, `username`, `email`, `password`, `phonenumber`, `address`, `foto`, `created_at`, `updated_at`) VALUES
(1, 'Demodi', 'Admin', 'demodi', 'demodi@gmail.com', '$2y$10$ad5zGBeRv/QWyW6WoMdFGuKZywUZTTywZf6wzkbhOWNAGDbDzTCBi', '02254424458', 'M-Square Blok C 22-23 Cibaduyut', 'admin.png', NULL, NULL);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Indexes for table `jadwals`
--
ALTER TABLE `jadwals`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Indexes for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  ADD KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`);

--
-- Indexes for table `produks`
--
ALTER TABLE `produks`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `prospek_profiles`
--
ALTER TABLE `prospek_profiles`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `sales`
--
ALTER TABLE `sales`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `sales_email_unique` (`email`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `jadwals`
--
ALTER TABLE `jadwals`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `produks`
--
ALTER TABLE `produks`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `prospek_profiles`
--
ALTER TABLE `prospek_profiles`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `sales`
--
ALTER TABLE `sales`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

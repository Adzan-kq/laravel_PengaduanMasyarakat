-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 18, 2023 at 02:41 AM
-- Server version: 10.4.22-MariaDB
-- PHP Version: 8.0.13

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `pengaduan`
--

-- --------------------------------------------------------

--
-- Table structure for table `masyarakat`
--

CREATE TABLE `masyarakat` (
  `nik` char(16) COLLATE utf8mb4_unicode_ci NOT NULL,
  `nama` varchar(35) COLLATE utf8mb4_unicode_ci NOT NULL,
  `username` varchar(25) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `telp` varchar(13) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `masyarakat`
--

INSERT INTO `masyarakat` (`nik`, `nama`, `username`, `password`, `telp`, `created_at`, `updated_at`) VALUES
('20111678687', 'Ibrahim Surya', 'surya', '$2y$10$jDDlUNJGJ.I8HzcVwlbkX.QbYZG85GJUeX4eRhxpsH3mlgDN1l6Wm', '089768696', '2023-03-15 03:22:06', '2023-03-15 03:22:06'),
('2011189000', 'Muhammad Adzan Nurkholiq', 'jan', '$2y$10$JF/gBIUcxQSCWMIiPsS2Le3JIZst60hVqR/yIOehtLpflej2VTWcC', '089602431552', '2023-03-15 03:20:02', '2023-03-15 03:20:02'),
('20118345', 'Faisal Firdaus Wibowo', 'bowo', '$2y$10$wHKax3Q1xT.rYkOh9ikhteC4.g./oowvhbgefMgmC3WULXM84X5Ua', '08976868546', '2023-03-17 07:53:52', '2023-03-17 07:53:52');

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
(9, '2014_10_12_000000_create_users_table', 1),
(10, '2014_10_12_100000_create_password_resets_table', 1),
(11, '2019_08_19_000000_create_failed_jobs_table', 1),
(12, '2019_12_14_000001_create_personal_access_tokens_table', 1),
(13, '2023_03_08_021520_create_masyarakats_table', 1),
(14, '2023_03_08_022216_create_pengaduans_table', 1),
(15, '2023_03_08_023304_create_petugas_table', 1),
(16, '2023_03_08_024036_create_tanggapans_table', 1);

-- --------------------------------------------------------

--
-- Table structure for table `pengaduan`
--

CREATE TABLE `pengaduan` (
  `id_pengaduan` bigint(20) UNSIGNED NOT NULL,
  `tgl_pengaduan` datetime NOT NULL,
  `nik` char(16) COLLATE utf8mb4_unicode_ci NOT NULL,
  `isi_laporan` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `foto` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` enum('0','proses','selesai') COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `pengaduan`
--

INSERT INTO `pengaduan` (`id_pengaduan`, `tgl_pengaduan`, `nik`, `isi_laporan`, `foto`, `status`, `created_at`, `updated_at`) VALUES
(1, '2023-03-15 05:30:51', '2011189000', 'banjir di jakarta sangat meresahkan', 'assets/pengaduan/AGiklHnrrAQ3AGBTlKVe3KMTqiPnqykVTMG4QIbW.jpg', 'selesai', '2023-03-15 10:30:51', '2023-03-15 03:31:31'),
(2, '2023-03-16 01:32:58', '20111678687', 'jalan rusak di cimahi', 'assets/pengaduan/wxFMELDdu0CIvUxELsccSoowJZNCOH2WYarwPwmR.jpg', 'selesai', '2023-03-16 06:32:58', '2023-03-15 23:36:59'),
(3, '2023-03-17 09:58:58', '20118345', 'Pipa pertamina bocor di cimahi', 'assets/pengaduan/xstNLGscfbfFWDkL84i80vCGj7bwoa8kj9YAsAew.jpg', '0', '2023-03-17 14:58:58', '2023-03-17 14:58:58');

-- --------------------------------------------------------

--
-- Table structure for table `petugas`
--

CREATE TABLE `petugas` (
  `id_petugas` bigint(20) UNSIGNED NOT NULL,
  `nama_petugas` varchar(35) COLLATE utf8mb4_unicode_ci NOT NULL,
  `username` varchar(25) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `telp` varchar(13) COLLATE utf8mb4_unicode_ci NOT NULL,
  `level` enum('admin','petugas') COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `petugas`
--

INSERT INTO `petugas` (`id_petugas`, `nama_petugas`, `username`, `password`, `telp`, `level`, `created_at`, `updated_at`) VALUES
(1, 'Ojan', 'admin', '$2y$10$I8tv8pMeWllJXgzpfslChO8T360xBKfyvxls4K.Ln6Rpbwu.SZFwm', '08999229230', 'admin', '2023-03-15 03:11:09', '2023-03-15 03:11:09'),
(2, 'Paulin Mayasari', 'paul', '$2y$10$fs17gLq1o1yc1ovb4V8QNeTg8c0Pr4IwtufkZBza02hjHlb9kgx9q', '0629386485', 'petugas', '2023-03-15 23:36:26', '2023-03-15 23:36:26');

-- --------------------------------------------------------

--
-- Table structure for table `tanggapan`
--

CREATE TABLE `tanggapan` (
  `id_tanggapan` bigint(20) UNSIGNED NOT NULL,
  `id_pengaduan` bigint(20) UNSIGNED NOT NULL,
  `tgl_tanggapan` datetime NOT NULL,
  `tanggapan` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `id_petugas` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `tanggapan`
--

INSERT INTO `tanggapan` (`id_tanggapan`, `id_pengaduan`, `tgl_tanggapan`, `tanggapan`, `id_petugas`, `created_at`, `updated_at`) VALUES
(1, 1, '2023-03-15 00:00:00', 'sudah di lelokasikan ya kak', 1, '2023-03-15 03:31:31', '2023-03-15 03:31:31'),
(2, 2, '2023-03-16 00:00:00', 'sudah kami perbaiki ya kak', 2, '2023-03-15 23:36:59', '2023-03-15 23:36:59');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `masyarakat`
--
ALTER TABLE `masyarakat`
  ADD PRIMARY KEY (`nik`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `pengaduan`
--
ALTER TABLE `pengaduan`
  ADD PRIMARY KEY (`id_pengaduan`),
  ADD KEY `pengaduan_nik_foreign` (`nik`);

--
-- Indexes for table `petugas`
--
ALTER TABLE `petugas`
  ADD PRIMARY KEY (`id_petugas`),
  ADD UNIQUE KEY `petugas_username_unique` (`username`);

--
-- Indexes for table `tanggapan`
--
ALTER TABLE `tanggapan`
  ADD PRIMARY KEY (`id_tanggapan`),
  ADD KEY `tanggapan_id_pengaduan_foreign` (`id_pengaduan`),
  ADD KEY `tanggapan_id_petugas_foreign` (`id_petugas`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `pengaduan`
--
ALTER TABLE `pengaduan`
  MODIFY `id_pengaduan` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `petugas`
--
ALTER TABLE `petugas`
  MODIFY `id_petugas` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `tanggapan`
--
ALTER TABLE `tanggapan`
  MODIFY `id_tanggapan` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `pengaduan`
--
ALTER TABLE `pengaduan`
  ADD CONSTRAINT `pengaduan_nik_foreign` FOREIGN KEY (`nik`) REFERENCES `masyarakat` (`nik`);

--
-- Constraints for table `tanggapan`
--
ALTER TABLE `tanggapan`
  ADD CONSTRAINT `tanggapan_id_pengaduan_foreign` FOREIGN KEY (`id_pengaduan`) REFERENCES `pengaduan` (`id_pengaduan`),
  ADD CONSTRAINT `tanggapan_id_petugas_foreign` FOREIGN KEY (`id_petugas`) REFERENCES `petugas` (`id_petugas`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

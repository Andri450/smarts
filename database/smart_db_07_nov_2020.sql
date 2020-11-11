-- phpMyAdmin SQL Dump
-- version 5.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Nov 07, 2020 at 03:06 PM
-- Server version: 10.4.11-MariaDB
-- PHP Version: 7.4.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `smart_db`
--

-- --------------------------------------------------------

--
-- Table structure for table `jabatan`
--

CREATE TABLE `jabatan` (
  `id` int(11) NOT NULL,
  `nama_jabatan` varchar(120) NOT NULL,
  `jenis_jabatan` enum('Struktural','Fungsional') NOT NULL,
  `created_by` int(11) NOT NULL DEFAULT 1,
  `updated_by` int(11) NOT NULL DEFAULT 1,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `jabatan`
--

INSERT INTO `jabatan` (`id`, `nama_jabatan`, `jenis_jabatan`, `created_by`, `updated_by`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 'ANALIS TATA USAHA', 'Fungsional', 1, 1, NULL, NULL, NULL),
(2, 'PENGELOLA MONITORING DAN EVALUASI', 'Struktural', 1, 1, NULL, NULL, NULL),
(3, 'Tenaga Ahli IT', 'Fungsional', 1, 1, NULL, '2020-10-03 16:17:03', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `pangkat_golongan`
--

CREATE TABLE `pangkat_golongan` (
  `id` int(11) NOT NULL,
  `nama_pangkat` varchar(120) NOT NULL,
  `golongan` varchar(10) NOT NULL,
  `created_by` int(11) NOT NULL DEFAULT 1,
  `updated_by` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `pangkat_golongan`
--

INSERT INTO `pangkat_golongan` (`id`, `nama_pangkat`, `golongan`, `created_by`, `updated_by`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 'Pembina', 'IV A', 1, NULL, NULL, NULL, NULL),
(2, 'Penata Muda', 'III A', 1, NULL, NULL, NULL, NULL),
(3, 'Penata Muda Tingkat 1', 'III B', 1, NULL, NULL, NULL, NULL),
(4, 'Penata', 'III C', 1, NULL, NULL, NULL, NULL),
(5, 'Penata Tingkat 1', 'III D', 1, NULL, NULL, NULL, NULL),
(6, 'Pengatur Muda', 'II A', 1, NULL, NULL, NULL, NULL),
(7, 'Pengatur Muda Tingkat 1', 'II B', 1, NULL, NULL, NULL, NULL),
(8, 'Pengatur', 'II C', 1, NULL, NULL, NULL, NULL),
(9, 'Pengatur Tingkat 1', 'II D', 1, NULL, NULL, NULL, NULL),
(10, 'Pembina Tingkat 1', 'IV B', 1, NULL, NULL, NULL, NULL),
(11, 'Juru Tingkat 1', 'I D', 1, NULL, NULL, NULL, NULL),
(12, 'Tidak ada', '-', 1, NULL, NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `roles`
--

CREATE TABLE `roles` (
  `id_role` int(4) NOT NULL,
  `id_user` int(4) NOT NULL,
  `role_menu` varchar(100) NOT NULL,
  `published` enum('T','F') NOT NULL DEFAULT 'T',
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(10) UNSIGNED NOT NULL,
  `username` varchar(255) NOT NULL,
  `name` varchar(255) NOT NULL,
  `tempat_lahir` varchar(120) DEFAULT NULL,
  `tanggal_lahir` date DEFAULT NULL,
  `nik` varchar(100) NOT NULL,
  `telepon` varchar(100) NOT NULL,
  `alamat` text NOT NULL,
  `waktu_mulai_kerja` date DEFAULT NULL,
  `id_jabatan` int(4) DEFAULT NULL,
  `id_pangkat_golongan` int(4) DEFAULT NULL,
  `jenis_pegawai` enum('PNS','Honor Daerah','Honor Dinas') NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `active` enum('T','F') NOT NULL DEFAULT 'T',
  `picture` text DEFAULT NULL,
  `created_by` int(4) NOT NULL DEFAULT 1,
  `updated_by` int(4) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `username`, `name`, `tempat_lahir`, `tanggal_lahir`, `nik`, `telepon`, `alamat`, `waktu_mulai_kerja`, `id_jabatan`, `id_pangkat_golongan`, `jenis_pegawai`, `email`, `password`, `active`, `picture`, `created_by`, `updated_by`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 'superadmin', 'Superadmin Utama', 'Tokyo', '2020-09-05', '20190909', '0812838393', 'Telukbetung', '2020-09-05', 1, 1, 'PNS', 'tapisdev@gmail.com', '$2y$10$N33og08eYBFZlPT8unPeYe7D.xxoropy2OniU3jsN3Cb0iuUIGuae', 'T', 'no_img.png', 1, 1, '2020-09-07 19:53:54', '2020-09-07 20:38:49', NULL),
(2, 'operator', 'Operator', 'Metro', '1994-06-10', '222', '444', 'Kalianda, Lampun selatan', '2018-06-10', 3, 12, '', 'operator@lampungprov.go.id', '$2y$10$jHQ8WAe8K5JNjhhlR6BYK.vNQk56cHaMUemdubYge5hYjXWinbLcW', 'T', '1599624278717.png', 1, 1, '2020-09-07 19:53:54', '2020-09-08 21:05:02', NULL),
(9, 'wahyu599', 'Wahyu M.T', 'Tokyo', '1995-07-06', '2020', '0812838393', 'Telukbetung Selatan, Bandar Lampung', '2020-09-05', 1, 1, 'PNS', 'wahyu2@gmail.com', '$2y$10$iBUKp1971L5K1bEWXgctSOSPFdru3uo2/O.9LByyzumitRLsfLmVa', 'T', '1599536935355.png', 1, 1, '2020-09-07 19:53:54', '2020-09-07 21:06:59', NULL),
(10, 'fahrizal', 'Fahrizal M.Nuclear', 'Filipina', '1998-11-08', '2019', '0899922222', 'Kedaton', '2020-09-01', 3, 12, 'Honor Daerah', 'fahrizal@gmail.com', '$2y$10$TnIzlYTVMhKf6Ilih6MDXOm2SJacKdC5l10.adHAZZN1ZSVrmYi4W', 'T', '1599538156788.png', 1, 1, '2020-09-07 21:09:16', '2020-09-07 21:55:22', NULL);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `jabatan`
--
ALTER TABLE `jabatan`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `pangkat_golongan`
--
ALTER TABLE `pangkat_golongan`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `roles`
--
ALTER TABLE `roles`
  ADD PRIMARY KEY (`id_role`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `jabatan`
--
ALTER TABLE `jabatan`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `pangkat_golongan`
--
ALTER TABLE `pangkat_golongan`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `roles`
--
ALTER TABLE `roles`
  MODIFY `id_role` int(4) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

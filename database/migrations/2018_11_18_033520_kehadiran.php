<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Kehadiran extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('kehadiran', function (Blueprint $table) {
            $table->increments('id');
            $table->text('deskripsi');
            $table->enum('stts',['0','1']);
            $table->integer('id_jadwal');
            $table->integer('id_user');
            $table->date('tgl');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('kehadiran');
    }
}


/*
-- phpMyAdmin SQL Dump
-- version 4.8.3
-- https://www.phpmyadmin.net/
--
-- Host: localhost:8889
-- Generation Time: Nov 18, 2018 at 03:41 AM
-- Server version: 5.7.23
-- PHP Version: 7.2.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";

--
-- Database: `programAbsen2`
--

-- --------------------------------------------------------

--
-- Table structure for table `bidang_studi`
--

CREATE TABLE `bidang_studi` (
  `id` int(10) UNSIGNED NOT NULL,
  `deskripsi` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `bidang_studi`
--

INSERT INTO `bidang_studi` (`id`, `deskripsi`, `created_at`, `updated_at`) VALUES
(1, 'MTK', '2018-11-17 19:39:33', '2018-11-17 19:39:33'),
(2, 'Bahasa Indonesia', '2018-11-17 19:39:39', '2018-11-17 19:39:39'),
(3, 'PKN', '2018-11-17 19:39:56', '2018-11-17 19:39:56');

-- --------------------------------------------------------

--
-- Table structure for table `guru`
--

CREATE TABLE `guru` (
  `id` int(10) UNSIGNED NOT NULL,
  `nik` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL,
  `nama` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tlpn` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `guru`
--

INSERT INTO `guru` (`id`, `nik`, `nama`, `email`, `tlpn`, `created_at`, `updated_at`) VALUES
(1, '1531', 'udin', 'udin@udin.com', '987654', '2018-11-17 19:38:47', '2018-11-17 19:38:47'),
(2, '1532', 'ucup', 'ucup@ucup.com', '546987', '2018-11-17 19:39:01', '2018-11-17 19:39:01'),
(3, '1533', 'ucok', 'ucok@ucok.com', '326546', '2018-11-17 19:39:22', '2018-11-17 19:39:22');

-- --------------------------------------------------------

--
-- Table structure for table `jadwal_guru`
--

CREATE TABLE `jadwal_guru` (
  `id` int(10) UNSIGNED NOT NULL,
  `jam_mulai` time NOT NULL,
  `jam_berakhir` time NOT NULL,
  `hari` enum('senin','selasa','rabu','kamis','jumat') COLLATE utf8mb4_unicode_ci NOT NULL,
  `bidang_studi_id` int(11) NOT NULL,
  `guru_id` int(11) NOT NULL,
  `kelas_id` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `jadwal_guru`
--

INSERT INTO `jadwal_guru` (`id`, `jam_mulai`, `jam_berakhir`, `hari`, `bidang_studi_id`, `guru_id`, `kelas_id`, `created_at`, `updated_at`) VALUES
(1, '07:00:00', '09:00:00', 'senin', 1, 1, 1, '2018-11-17 19:42:29', '2018-11-17 19:42:29'),
(2, '09:00:00', '11:00:00', 'senin', 2, 2, 1, '2018-11-17 19:43:10', '2018-11-17 19:43:10'),
(3, '07:00:00', '09:00:00', 'senin', 3, 3, 2, '2018-11-17 19:44:04', '2018-11-17 19:44:04'),
(4, '09:00:00', '11:00:00', 'senin', 1, 1, 2, '2018-11-17 19:44:52', '2018-11-17 19:44:52'),
(5, '10:00:00', '11:00:00', 'selasa', 1, 3, 1, '2018-11-17 19:49:20', '2018-11-17 19:49:20'),
(6, '10:00:00', '11:00:00', 'selasa', 1, 3, 1, '2018-11-17 19:56:52', '2018-11-17 19:56:52'),
(7, '07:00:00', '08:00:00', 'rabu', 3, 1, 1, '2018-11-17 19:59:24', '2018-11-17 19:59:24'),
(8, '08:00:00', '11:00:00', 'rabu', 1, 2, 1, '2018-11-17 20:00:31', '2018-11-17 20:00:31'),
(9, '07:00:00', '09:00:00', 'kamis', 3, 3, 1, '2018-11-17 20:01:31', '2018-11-17 20:01:31'),
(10, '09:00:00', '11:00:00', 'kamis', 2, 2, 1, '2018-11-17 20:02:24', '2018-11-17 20:02:24'),
(11, '07:00:00', '10:00:00', 'jumat', 1, 1, 1, '2018-11-17 20:06:16', '2018-11-17 20:06:16'),
(13, '07:00:00', '10:00:00', 'jumat', 1, 1, 1, '2018-11-17 20:08:14', '2018-11-17 20:08:14'),
(14, '10:00:00', '11:00:00', 'jumat', 2, 2, 1, '2018-11-17 20:08:46', '2018-11-17 20:08:46'),
(15, '07:00:00', '10:00:00', 'selasa', 2, 1, 2, '2018-11-17 20:23:58', '2018-11-17 20:23:58'),
(16, '10:00:00', '11:00:00', 'selasa', 1, 3, 2, '2018-11-17 20:25:19', '2018-11-17 20:25:19'),
(17, '07:00:00', '08:00:00', 'rabu', 3, 2, 2, '2018-11-17 20:26:34', '2018-11-17 20:26:34'),
(19, '08:00:00', '11:00:00', 'rabu', 1, 1, 2, '2018-11-17 20:28:15', '2018-11-17 20:28:15'),
(21, '07:00:00', '09:00:00', 'kamis', 2, 2, 2, '2018-11-17 20:30:21', '2018-11-17 20:30:21'),
(22, '09:00:00', '11:00:00', 'kamis', 1, 2, 2, '2018-11-17 20:30:59', '2018-11-17 20:30:59'),
(23, '07:00:00', '10:00:00', 'jumat', 2, 2, 2, '2018-11-17 20:31:34', '2018-11-17 20:31:34'),
(24, '10:00:00', '11:00:00', 'jumat', 3, 1, 2, '2018-11-17 20:32:06', '2018-11-17 20:32:06');

-- --------------------------------------------------------

--
-- Table structure for table `kehadiran`
--

CREATE TABLE `kehadiran` (
  `id` int(10) UNSIGNED NOT NULL,
  `deskripsi` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `stts` tinyint(1) NOT NULL,
  `id_jadwal` int(11) NOT NULL,
  `id_user` int(11) NOT NULL,
  `tgl` date NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `kelas`
--

CREATE TABLE `kelas` (
  `id` int(10) UNSIGNED NOT NULL,
  `deskripsi` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `kelas`
--

INSERT INTO `kelas` (`id`, `deskripsi`, `created_at`, `updated_at`) VALUES
(1, '1 A', '2018-11-17 19:37:38', '2018-11-17 19:37:52'),
(2, '1 B', '2018-11-17 19:37:56', '2018-11-17 19:38:05'),
(3, '2 A', '2018-11-17 19:38:10', '2018-11-17 19:38:10'),
(4, '2 B', '2018-11-17 19:38:12', '2018-11-17 19:38:12'),
(5, '3 A', '2018-11-17 19:38:15', '2018-11-17 19:38:15'),
(6, '3 B', '2018-11-17 19:38:18', '2018-11-17 19:38:18');

-- --------------------------------------------------------

--
-- Table structure for table `members`
--

CREATE TABLE `members` (
  `id` int(10) UNSIGNED NOT NULL,
  `kelas_id` int(10) UNSIGNED NOT NULL,
  `user_id` int(10) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_resets_table', 1),
(3, '2018_11_10_043604_create_kelas_table', 1),
(4, '2018_11_10_112720_create_bidang_studis_table', 1),
(5, '2018_11_10_215913_create_gurus_table', 1),
(6, '2018_11_11_012533_create_jadwal_gurus_table', 1),
(7, '2018_11_11_035507_create_members_table', 1),
(8, '2018_11_18_033520_kehadiran', 2);

-- --------------------------------------------------------

--
-- Table structure for table `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(10) UNSIGNED NOT NULL,
  `firstname` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `lastname` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `id_kelas` int(11) NOT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `levelakses` enum('admin','member') COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `firstname`, `lastname`, `id_kelas`, `email`, `email_verified_at`, `password`, `levelakses`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'fadli', 'muharram', 0, 'fadlimuharrambolt4g@gmail.com', NULL, '$2y$10$wWkeTomuPJ8fYwc1gFvxJOUA6uuuTtCv73Dv4n/3xwWHOla/lBY9G', 'admin', 'PCokAZtio7E9taDlTjdSl0UTOsfsjCWPEd08p5NWGFHK6o9JiIBgX9JGWV5F', '2018-11-17 19:36:55', '2018-11-17 19:36:55'),
(2, 'Misaka', 'Mikoto', 1, 'misaka@tes.com', NULL, '$2y$10$6xLVbzLhvWqUCdrec48.TuFPlrNZBKQhBR9oismbBaNkJLSYZzM0e', 'member', NULL, '2018-11-17 20:33:12', '2018-11-17 20:33:12');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `bidang_studi`
--
ALTER TABLE `bidang_studi`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `guru`
--
ALTER TABLE `guru`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `guru_nik_unique` (`nik`);

--
-- Indexes for table `jadwal_guru`
--
ALTER TABLE `jadwal_guru`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `kehadiran`
--
ALTER TABLE `kehadiran`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `kelas`
--
ALTER TABLE `kelas`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `members`
--
ALTER TABLE `members`
  ADD PRIMARY KEY (`id`),
  ADD KEY `members_kelas_id_foreign` (`kelas_id`),
  ADD KEY `members_user_id_foreign` (`user_id`);

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
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `bidang_studi`
--
ALTER TABLE `bidang_studi`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `guru`
--
ALTER TABLE `guru`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `jadwal_guru`
--
ALTER TABLE `jadwal_guru`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- AUTO_INCREMENT for table `kehadiran`
--
ALTER TABLE `kehadiran`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `kelas`
--
ALTER TABLE `kelas`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `members`
--
ALTER TABLE `members`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `members`
--
ALTER TABLE `members`
  ADD CONSTRAINT `members_kelas_id_foreign` FOREIGN KEY (`kelas_id`) REFERENCES `kelas` (`id`),
  ADD CONSTRAINT `members_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`);

*/
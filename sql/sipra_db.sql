-- phpMyAdmin SQL Dump
-- version 4.9.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 26 Jan 2022 pada 09.42
-- Versi server: 10.4.6-MariaDB
-- Versi PHP: 7.3.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `sipra_db`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `anggaran`
--

CREATE TABLE `anggaran` (
  `id_anggaran` int(11) NOT NULL,
  `nama_anggaran` varchar(225) NOT NULL,
  `mata_anggaran` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `anggaran`
--

INSERT INTO `anggaran` (`id_anggaran`, `nama_anggaran`, `mata_anggaran`) VALUES
(1, 'abc1\r\n', 'A. II.2.1\r\n'),
(2, 'abc2\r\n', 'A. II.2.2\r\n'),
(3, 'abc3\r\n', 'A. II.2.3');

-- --------------------------------------------------------

--
-- Struktur dari tabel `failed_jobs`
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
(4, '2021_06_03_160118_create_users_table', 2);

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
-- Struktur dari tabel `program_kegiatan`
--

CREATE TABLE `program_kegiatan` (
  `id_program` int(11) NOT NULL,
  `nama_kegiatan` varchar(225) DEFAULT NULL,
  `volume` int(11) DEFAULT NULL,
  `satuan` varchar(255) DEFAULT NULL,
  `harga` int(11) DEFAULT NULL,
  `jumlah` int(11) DEFAULT NULL,
  `waktu_start` date DEFAULT NULL,
  `waktu_finish` date DEFAULT NULL,
  `id_rka` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `program_kegiatan`
--

INSERT INTO `program_kegiatan` (`id_program`, `nama_kegiatan`, `volume`, `satuan`, `harga`, `jumlah`, `waktu_start`, `waktu_finish`, `id_rka`) VALUES
(2, 'Suryanto', 2, 'paper', 34, 67, '2021-05-24', '2021-06-03', 11),
(14, 'Suryanto', 23, 'paper', 43, 43, '2021-05-19', '2021-06-02', 11),
(17, 'Reward Bagi Dosen Yang Karya Ilmiah Publish di Jurnal Terindeks Internasional', 2, 'paper', 54, 34, '2021-05-17', '2021-06-02', 26),
(18, 'Reward Bagi Dosen Yang Karya Ilmiah Publish di Jurnal Terindeks Internasional', 4, 'paper', 3454, 3453, '2021-06-21', '2021-06-29', 28),
(39, 'Reward Bagi Dosen Yang Karya Ilmiah Publish di Jurnal Terindeks Internasional', 3, 'paper', 1000, 3000, '2021-06-02', '2021-07-01', 2),
(41, 'Reward Bagi Dosen Yang Karya Ilmiah Publish di Jurnal Terindeks Nasional', 2, 'paper', 1000, 2000, '2021-06-25', '2021-06-25', 43),
(44, 'Kunjungan ke MIT', 3, 'person', 1000, 3000, '2021-08-27', '2021-09-08', 45),
(46, 'mcksn', 2, 'cdmk', 3000, 6000, '2021-12-17', '2021-12-31', 47),
(48, 'klhg', 2, 'kg', 3000, 6000, '2021-12-04', '2021-12-09', 48),
(52, '100 pohon', 100, 'pohon', 30000, 3000000, '2023-02-06', '2023-02-07', 52),
(53, '100 pohon', 100, 'pohon', 30000, 3000000, '2023-01-06', '2023-01-07', 53),
(56, '1000 pohon', 1000, 'pohon', 20000, 20000000, '2021-12-09', '2021-12-10', 50),
(58, 'Natal', 100, 'helai', 50000, 5000000, '2021-12-25', '2021-12-26', 50);

-- --------------------------------------------------------

--
-- Struktur dari tabel `realisasi`
--

CREATE TABLE `realisasi` (
  `id_realisasi` int(11) NOT NULL,
  `id_rka` int(11) DEFAULT NULL,
  `id_program` int(11) NOT NULL,
  `kode_unit` varchar(255) NOT NULL,
  `mata_anggaran` varchar(225) NOT NULL,
  `nama_kegiatan` varchar(255) NOT NULL,
  `rincian_aktivitas` varchar(255) NOT NULL,
  `total_dana` varchar(255) NOT NULL,
  `dana_digunakan` varchar(255) NOT NULL,
  `sisa_dana` varchar(225) NOT NULL,
  `bukti` varchar(225) NOT NULL,
  `status` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `realisasi`
--

INSERT INTO `realisasi` (`id_realisasi`, `id_rka`, `id_program`, `kode_unit`, `mata_anggaran`, `nama_kegiatan`, `rincian_aktivitas`, `total_dana`, `dana_digunakan`, `sisa_dana`, `bukti`, `status`) VALUES
(19, 43, 41, 'U001', 'A. II.2.1.1', 'Reward Bagi Dosen Yang Karya Ilmiah Publish di Jurnal Terindeks Nasioanal', 'meyliza', '2000', '1000', '1000', 'Reward Bagi Dosen Yang Karya Ilmiah Publish di Jurnal Terindeks Nasioanal.jpg', 'ditolak'),
(21, 45, 44, 'U001', 'A. II.2.2.1', 'Kunjungan ke MIT', 'Kunjungan Ke MIT oleh Rektor', '3000', '1000', '2000', 'Kunjungan ke MIT.png', NULL),
(22, 50, 56, 'U001', 'A. II.2.1.1', '1000 pohon', 'mksakcnsn', '20000000', '20000000', '0', '1000 pohon.jpg', NULL),
(23, 50, 58, 'U001', 'A. II.2.1.2', 'Natal', 'abcdef', '5000000', '300000', '2000000', 'Natal.jpg', NULL),
(24, 47, 46, 'U001', 'A. II.2.2.1', 'mcksn', 'mksakcnsn', '3000', '2500', '500', 'mcksn.png', NULL),
(25, 50, 58, 'U001', 'A. II.2.1.2', 'Natal', '?,,,', '500000', '300000', '500000', 'Natal.jpg', NULL),
(26, 50, 56, 'U001', 'A. II.2.1.1', '1000 pohon', '+=\';', '20000000', 'abcd', '1000000', '1000 pohon.jpg', NULL),
(27, 50, 56, 'U001', 'A. II.2.1.1', '1000 pohon', '+=\';', 'klmn', '2000000', '100000', '1000 pohon.jpg', NULL);

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbl_rka`
--

CREATE TABLE `tbl_rka` (
  `id_rka` int(11) NOT NULL,
  `tahun_anggaran` varchar(225) NOT NULL,
  `mata_anggaran` varchar(255) NOT NULL,
  `nama_anggaran` varchar(255) NOT NULL,
  `kode_unit` varchar(255) NOT NULL,
  `status` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `tbl_rka`
--

INSERT INTO `tbl_rka` (`id_rka`, `tahun_anggaran`, `mata_anggaran`, `nama_anggaran`, `kode_unit`, `status`) VALUES
(2, '2020-2021', 'A. II.2.4', 'Reward karya ilmiah/publikasi, diktat, bahan kuliah', 'U002', ''),
(5, '2021-2022', 'A. II.2.4', 'Reward karya ilmiah/publikasi, diktat, bahan kuliah', 'U004', ''),
(11, '2021-2022', 'A. II.2.4', 'fghjtyutyutyjgff', 'U002', ''),
(26, '2021-2022', 'D. II.2.1', 'Kunjungan kerja pimpinan institut kemana aja', 'U004', NULL),
(28, '2021-2022', 'D. II.2.1', 'Kunjungan kerja pimpinan institut', 'U002', NULL),
(43, '2022', 'A. II.2.1', 'abc1', 'U001', 'ditolak'),
(45, '2022', 'A. II.2.2', 'abc1', 'U001', 'diterima'),
(47, '2022', 'A. II.2.2', 'abc2', 'U001', NULL),
(48, '2022', 'A. II.2.3', 'abc1', 'U004', NULL),
(50, '2021', 'A. II.2.1', 'abc1', 'U001', NULL),
(52, '2023', 'A. II.2.1', 'abc2', 'U002', NULL),
(53, '2023', 'A. II.2.1', 'abc1', 'U001', NULL);

-- --------------------------------------------------------

--
-- Struktur dari tabel `unit`
--

CREATE TABLE `unit` (
  `kode_unit` varchar(255) NOT NULL,
  `nama_unit` varchar(225) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `unit`
--

INSERT INTO `unit` (`kode_unit`, `nama_unit`) VALUES
('342', 'dfgdfgerfghbfg'),
('U001', 'FTI'),
('U002', 'Keasramaan'),
('U003', 'FTI'),
('U004', 'Kantin'),
('U005', 'LPPM'),
('U006', 'Fakultas Bioproses'),
('WR1U01', 'Lembaga Penelitian dan Pengabdian kepada Masyarakat'),
('WR2U01', 'Setiap proses dapat menggunakan beberapa port untuk menerima pesan,tetapi suatu proses ');

-- --------------------------------------------------------

--
-- Struktur dari tabel `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `level` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `kode_unit` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `level`, `kode_unit`, `status`, `email_verified_at`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'Mikhael Hutapea', 'mikhael@gmail.com', '2', 'U001', 'aktif', NULL, '$2y$10$UgxQGRhhjSa/p.B9Rz17KOCeVTbQ9UVGJjTkRcG0QM0EgRKo3DgV.', '1BUiWh6brUQxe1H2lrqDJp33fopGFkZHhnhRuBftdT31nq2nlPO69tZcwZcP', '2021-06-03 09:06:23', '2021-06-03 09:06:23'),
(3, 'Suryanto Panjaitan', 'suryanto@gmail.com', '2', 'U002', 'nonaktif', NULL, '$2y$10$a.GLWkuYJSnbQn0vHDG9R.B/6LP6WJV.xanNleIILGP2OP2keoo2K', NULL, '2021-06-03 09:07:45', '2021-06-03 09:07:45'),
(5, 'Ivan', 'ivan@gmail.com', '2', 'U004', 'nonaktif', NULL, '$2y$10$1BDQ7X9DbqW8qOr87YLDJObLt0R673GFFIAvpwF/fjpwOnM7mOzcC', NULL, NULL, NULL),
(6, 'Admin', 'admin@gmail.com', '1', 'null', 'aktif', NULL, '$2y$10$9GHA4AyzdXKSaCrFb71mj.38ipoEbw6mLSwN4dOzi74R.vvj3TTsa', NULL, NULL, NULL),
(7, 'Wakil Rektor 2', 'wr2@gmail.com', '3', 'null', 'aktif', NULL, '$2y$10$IuZy..jkULmfeUkcdB05P.vh/fyPxYcI5Aow.PtpwzoEnmd/vzEKi', NULL, NULL, NULL),
(8, 'ervina', 'ervina@gmail.com', '2', 'U001', 'nonaktif', NULL, '$2y$10$1am5BXIYlbH8GX8D7isalOdAgWC18Vy1sfEhUQEcNVwjNasylQFAG', NULL, NULL, NULL),
(15, 'Meyliza', 'meyliza2001@gmail.com', '2', 'U001', 'aktif', NULL, '$2y$10$.ckOPSsvtE1abJQ6n./XZObajHZFfooCtIA2BVSShERhJuDkj4zfm', NULL, NULL, NULL),
(17, 'Kantin', 'kantin@gmail.com', '2', 'U004', 'aktif', NULL, '$2y$10$BHwJKJIUmfXjoeperd12k.g7LMpmcDDdIZVy9hydg9V9BlxfAuzae', NULL, NULL, NULL),
(20, 'FITE', 'fite@gmail.com', '2', 'U001', 'aktif', NULL, '$2y$10$4QeaguODopwL3saEEEFtsenmzGTNgl442kgKHv8grmhpNJC2jugAy', NULL, NULL, NULL),
(21, 'FTI', 'fti@gmail.com', '2', 'U003', 'aktif', NULL, '$2y$10$TORbtAAeCBHufThDpIn1leHaToWSdWrVNmGLtGSVyUgIzGRaAjTfe', NULL, NULL, NULL),
(25, 'Ayu', 'ayu@gmail.com', 'null', 'U003', 'aktif', NULL, '$2y$10$wTV67WEnoRazmqSj4PXtSeOdwNORgiYVpar4yBkjLnFxRo4zuKiSK', NULL, NULL, NULL),
(26, 'Ani', 'ani@gmail.com', 'null', 'U001', 'aktif', NULL, '$2y$10$5RH2zSYHqet.iRe0Z3gTVelYJ4cRL2KsYgviHzhccJvOwIJOaP2nO', NULL, NULL, NULL),
(28, 'Jerr', 'jerr@gmail.com', 'null', 'U001', 'aktif', NULL, '$2y$10$ri7hjjYiBJlqKDazleyNZ.hdLIGOiek1WrnspPD8rGM2g.L48RvSW', NULL, NULL, NULL),
(31, 'Mey', 'mey@gmail.com', 'null', 'U001', 'aktif', NULL, '$2y$10$J4tzmbbaqQz8SqFHTtOjSuptcesU1dI1ArJo6NhgmhQB/Bkd11atm', NULL, NULL, NULL),
(32, 'Meyliza', 'meyliza@gmail.com', '2', 'null', 'aktif', NULL, '$2y$10$4i5LoGY5LM3DeJ60uH6QUeNPp0xD3s6vZQ6wt4F9X8uhpaxdECyjq', NULL, NULL, NULL),
(33, 'Ika', 'ika@gmail.com', 'null', 'null', 'aktif', NULL, '$2y$10$WgqIufMlS7CVu.5B9Pdj3Oic2VayHzbr7UpGQkuLyHfjZ6cH4voTS', NULL, NULL, NULL),
(34, '?%0%0?', 'user@gmail.com', '2', 'U003', 'aktif', NULL, '$2y$10$reFIkcdJkBz6KglE2FWk../KyaH7JeyGsjVsGCGpW8KocWNbMPfh.', NULL, NULL, NULL);

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `anggaran`
--
ALTER TABLE `anggaran`
  ADD PRIMARY KEY (`id_anggaran`);

--
-- Indeks untuk tabel `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

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
-- Indeks untuk tabel `program_kegiatan`
--
ALTER TABLE `program_kegiatan`
  ADD PRIMARY KEY (`id_program`),
  ADD KEY `fk_rka` (`id_rka`);

--
-- Indeks untuk tabel `realisasi`
--
ALTER TABLE `realisasi`
  ADD PRIMARY KEY (`id_realisasi`),
  ADD KEY `fk_kodeunit` (`kode_unit`),
  ADD KEY `fk_idprogram` (`id_program`),
  ADD KEY `fk_tblRKA` (`id_rka`);

--
-- Indeks untuk tabel `tbl_rka`
--
ALTER TABLE `tbl_rka`
  ADD PRIMARY KEY (`id_rka`);

--
-- Indeks untuk tabel `unit`
--
ALTER TABLE `unit`
  ADD PRIMARY KEY (`kode_unit`);

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
-- AUTO_INCREMENT untuk tabel `anggaran`
--
ALTER TABLE `anggaran`
  MODIFY `id_anggaran` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT untuk tabel `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT untuk tabel `program_kegiatan`
--
ALTER TABLE `program_kegiatan`
  MODIFY `id_program` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=60;

--
-- AUTO_INCREMENT untuk tabel `realisasi`
--
ALTER TABLE `realisasi`
  MODIFY `id_realisasi` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;

--
-- AUTO_INCREMENT untuk tabel `tbl_rka`
--
ALTER TABLE `tbl_rka`
  MODIFY `id_rka` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=55;

--
-- AUTO_INCREMENT untuk tabel `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=35;

--
-- Ketidakleluasaan untuk tabel pelimpahan (Dumped Tables)
--

--
-- Ketidakleluasaan untuk tabel `program_kegiatan`
--
ALTER TABLE `program_kegiatan`
  ADD CONSTRAINT `fk_rka` FOREIGN KEY (`id_rka`) REFERENCES `tbl_rka` (`id_rka`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Ketidakleluasaan untuk tabel `realisasi`
--
ALTER TABLE `realisasi`
  ADD CONSTRAINT `fk_idprogram` FOREIGN KEY (`id_program`) REFERENCES `program_kegiatan` (`id_program`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_kodeunit` FOREIGN KEY (`kode_unit`) REFERENCES `unit` (`kode_unit`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_tblRKA` FOREIGN KEY (`id_rka`) REFERENCES `tbl_rka` (`id_rka`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

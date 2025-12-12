-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Oct 25, 2025 at 03:57 PM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `rpl4`
--

-- --------------------------------------------------------

--
-- Table structure for table `buku`
--

CREATE TABLE `buku` (
  `id_buku` int(11) NOT NULL,
  `judul` varchar(100) NOT NULL,
  `penulis` varchar(100) NOT NULL,
  `penerbit` varchar(100) NOT NULL,
  `tahun_terbit` year(4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `buku`
--

INSERT INTO `buku` (`id_buku`, `judul`, `penulis`, `penerbit`, `tahun_terbit`) VALUES
(1, 'Pemrograman Web Dasar', 'Ahmad Fikri', 'Informatika', '2021'),
(2, 'Algoritma dan Pemrograman', 'Dwi Nugroho', 'Erlangga ', '2020'),
(3, 'Database MySQL', 'Rina Susanti', 'Andi Publisher', '2019'),
(4, 'Jaringan Komputer ', 'Bambang Prasetyo ', 'Gramedia ', '2022'),
(5, 'Desain UI/UX Modern ', 'Fitri Handayani ', 'Deepublish', '2023'),
(6, 'HTML & CSS Lengkap', 'Teguh Santoso', 'Informatika ', '2021'),
(7, 'Python untuk pemula', 'Rudi Hartono ', 'Elex Media', '2022'),
(8, 'Kecerdasan buatan', 'Siti Rahma', 'Erlangga ', '2023'),
(9, 'Basis Data Lanjut', 'Indra Yulianto ', 'Andi Publisher ', '2020'),
(10, 'Pemrograman PHP&MySQL', 'Yusuf Alamsyah', 'Informatika ', '2024');

-- --------------------------------------------------------

--
-- Table structure for table `peminjaman`
--

CREATE TABLE `peminjaman` (
  `id_peminjaman` int(11) NOT NULL,
  `id_buku` int(11) NOT NULL,
  `id_user` int(11) NOT NULL,
  `tanggal_pinjam` date NOT NULL,
  `tanggal_kembali` date NOT NULL,
  `status` enum('dipinjam','dikembalikan') DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `peminjaman`
--

INSERT INTO `peminjaman` (`id_peminjaman`, `id_buku`, `id_user`, `tanggal_pinjam`, `tanggal_kembali`, `status`) VALUES
(1, 1, 1, '2025-10-01', '2025-10-05', 'dikembalikan'),
(2, 2, 2, '2025-10-02', '2025-10-06', 'dikembalikan'),
(3, 3, 3, '2025-10-03', '2025-10-07', 'dipinjam'),
(4, 4, 4, '2025-10-04', '2025-10-08', 'dipinjam'),
(5, 5, 5, '2025-10-05', '2025-10-09', 'dikembalikan'),
(6, 6, 6, '2025-10-06', '2025-10-10', 'dipinjam'),
(7, 7, 7, '2025-10-07', '2025-10-11', 'dikembalikan'),
(8, 8, 8, '2025-10-08', '2025-10-12', 'dipinjam'),
(9, 9, 9, '2025-10-09', '2025-10-13', 'dipinjam'),
(10, 10, 10, '2025-10-10', '2025-10-14', 'dipinjam'),
(11, 2, 2, '2025-10-07', '2025-10-14', 'dikembalikan');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id_user` int(11) NOT NULL,
  `nama` varchar(100) NOT NULL,
  `kelas` varchar(20) NOT NULL,
  `no_induk` varchar(20) NOT NULL,
  `password` varchar(100) NOT NULL,
  `role` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id_user`, `nama`, `kelas`, `no_induk`, `password`, `role`) VALUES
(1, 'iman', 'XI RPL 4', '202501', 'iman', 'admin'),
(2, 'Budi Santoso ', 'XI RPL 2', '202502', 'budi', 'user'),
(3, 'Citra Dewi', 'XII TKJ 1', '202503', 'citra', 'user'),
(4, 'Dewi Lestari', 'XII RPL 1', '202504', 'Dewi', 'user'),
(5, 'Eka Putra', 'XII TKJ 2', '202505', 'eka', 'user'),
(6, 'Farhan Ali', 'XIi RPL 2', '202506', 'Farhan', 'user'),
(7, 'Gita Ayu', 'X RPL 1', '202507', 'Gita', 'user'),
(8, 'Hadi Kurnia', 'XI RPL 3', '202508', 'Hadi', 'user'),
(9, 'Indah Pertiwi', 'XII TKJ 2', '202509', 'Indah', 'user'),
(10, 'Joko Setiawan', 'XI RPL 1', '202510', 'Joko', 'user');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `buku`
--
ALTER TABLE `buku`
  ADD PRIMARY KEY (`id_buku`);

--
-- Indexes for table `peminjaman`
--
ALTER TABLE `peminjaman`
  ADD PRIMARY KEY (`id_peminjaman`),
  ADD KEY `fk_buku` (`id_buku`),
  ADD KEY `fk_anggota` (`id_user`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id_user`),
  ADD UNIQUE KEY `no_induk` (`no_induk`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `buku`
--
ALTER TABLE `buku`
  MODIFY `id_buku` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `peminjaman`
--
ALTER TABLE `peminjaman`
  MODIFY `id_peminjaman` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id_user` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `peminjaman`
--
ALTER TABLE `peminjaman`
  ADD CONSTRAINT `fk_peminjaman_anggota` FOREIGN KEY (`id_user`) REFERENCES `user` (`id_user`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_peminjaman_buku` FOREIGN KEY (`id_buku`) REFERENCES `buku` (`id_buku`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

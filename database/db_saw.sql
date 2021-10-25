-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Oct 26, 2021 at 01:11 AM
-- Server version: 10.4.19-MariaDB
-- PHP Version: 8.0.7

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_saw`
--

-- --------------------------------------------------------

--
-- Table structure for table `tb_bobot`
--

CREATE TABLE `tb_bobot` (
  `id_bobot` int(2) NOT NULL,
  `kriteria` varchar(50) NOT NULL,
  `nilai_bobot` varchar(4) NOT NULL,
  `keterangan` enum('benefit','cost') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tb_bobot`
--

INSERT INTO `tb_bobot` (`id_bobot`, `kriteria`, `nilai_bobot`, `keterangan`) VALUES
(11, 'Absensi Kehadiran', '5', 'benefit'),
(12, 'Penilaian Tugas', '5', 'benefit'),
(13, 'Penilaian Quiz Mingguan dan Final Project', '5', 'benefit');

-- --------------------------------------------------------

--
-- Table structure for table `tb_hasil_penilaian`
--

CREATE TABLE `tb_hasil_penilaian` (
  `id_penilaian` int(2) NOT NULL,
  `nama` varchar(100) NOT NULL,
  `kehadiran` varchar(10) NOT NULL,
  `tugas` varchar(10) NOT NULL,
  `quiz_project` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tb_hasil_penilaian`
--

INSERT INTO `tb_hasil_penilaian` (`id_penilaian`, `nama`, `kehadiran`, `tugas`, `quiz_project`) VALUES
(22, 'hafidh ahmad fauzan', '5 minggu', '2.40', '4.00'),
(23, 'taufik nurrahman', '5 minggu', '2.40', '3'),
(24, 'fachreza norrahma', '3 minggu', '2.60', '3.20'),
(25, 'ade neviyani', '2 minggu', '3.00', '4.00'),
(26, 'aziiz pranaja', '4 minggu', '2.78', '1.00');

-- --------------------------------------------------------

--
-- Table structure for table `tb_rating`
--

CREATE TABLE `tb_rating` (
  `id_rating` int(2) NOT NULL,
  `id_penilaian` int(2) NOT NULL,
  `kehadiran` varchar(4) NOT NULL,
  `tugas` varchar(4) NOT NULL,
  `quiz_project` varchar(4) NOT NULL,
  `total_rating` varchar(4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tb_rating`
--

INSERT INTO `tb_rating` (`id_rating`, `id_penilaian`, `kehadiran`, `tugas`, `quiz_project`, `total_rating`) VALUES
(16, 22, '1', '0.6', '0.8', '2.4'),
(17, 23, '1', '0.6', '0.6', '2.2'),
(18, 24, '0.6', '0.6', '0.8', '2'),
(19, 25, '0.4', '0.6', '0.8', '1.8'),
(20, 26, '0.8', '0.6', '0.2', '1.6');

-- --------------------------------------------------------

--
-- Table structure for table `tb_user`
--

CREATE TABLE `tb_user` (
  `id_user` int(8) NOT NULL,
  `username` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tb_user`
--

INSERT INTO `tb_user` (`id_user`, `username`, `email`, `password`) VALUES
(0, 'admin', 'admin@gmail.com', '$2y$10$lam5dyA3B46EzaST3Uqo1u9leInx4afJBdq51ZQTykmi/VNvgTVWi');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tb_bobot`
--
ALTER TABLE `tb_bobot`
  ADD PRIMARY KEY (`id_bobot`);

--
-- Indexes for table `tb_hasil_penilaian`
--
ALTER TABLE `tb_hasil_penilaian`
  ADD PRIMARY KEY (`id_penilaian`);

--
-- Indexes for table `tb_rating`
--
ALTER TABLE `tb_rating`
  ADD PRIMARY KEY (`id_rating`),
  ADD KEY `id_penilaian` (`id_penilaian`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tb_bobot`
--
ALTER TABLE `tb_bobot`
  MODIFY `id_bobot` int(2) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `tb_hasil_penilaian`
--
ALTER TABLE `tb_hasil_penilaian`
  MODIFY `id_penilaian` int(2) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=32;

--
-- AUTO_INCREMENT for table `tb_rating`
--
ALTER TABLE `tb_rating`
  MODIFY `id_rating` int(2) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `tb_rating`
--
ALTER TABLE `tb_rating`
  ADD CONSTRAINT `r_ratingKecocokan` FOREIGN KEY (`id_penilaian`) REFERENCES `tb_hasil_penilaian` (`id_penilaian`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

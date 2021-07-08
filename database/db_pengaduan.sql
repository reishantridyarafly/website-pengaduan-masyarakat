-- phpMyAdmin SQL Dump
-- version 5.0.3
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 07, 2021 at 06:34 PM
-- Server version: 10.4.14-MariaDB
-- PHP Version: 7.4.11

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_pengaduan`
--

-- --------------------------------------------------------

--
-- Table structure for table `masyarakat`
--

CREATE TABLE `masyarakat` (
  `nik` char(16) NOT NULL,
  `nama` varchar(35) NOT NULL,
  `username` varchar(25) NOT NULL,
  `email_masyarakat` varchar(40) DEFAULT NULL,
  `password` varchar(32) NOT NULL,
  `telp` varchar(13) DEFAULT NULL,
  `foto` varchar(40) DEFAULT NULL,
  `status_masyarakat` enum('0','1') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `masyarakat`
--

INSERT INTO `masyarakat` (`nik`, `nama`, `username`, `email_masyarakat`, `password`, `telp`, `foto`, `status_masyarakat`) VALUES
('1234567890123456', 'budi', 'budi', 'budi@gmail.com', 'ewVh0O', '038038038', '022cfdd2232c606f25e894a7014a2825.png', '0'),
('3201454545748484', 'Alfin', 'alfin', 'alfin@gmail.com', 'wn2yJx', '089237262728', 'avatar-1.png', '1'),
('3201478520310005', 'Muhammad Fahri', 'fahri', 'fahri@gmail.com', '4mLSYF', '0857412587452', 'avatar-1.png', '1'),
('3201478527412586', 'Rizki Kurniawan', 'rizki', 'rizkikurniawan@gmail.com', 'CYFyjz', '085471528963', 'avatar-1.png', '1'),
('3202583695600005', 'Dede Kurniawan', 'dede', 'dedekurniawan@gmail.com', 'D6MyVg', '08521479632', 'avatar-1.png', '1'),
('3202587419632555', 'Nurhidayah', 'nurhidayah', 'nurhidayah@gmail.com', 'YN6zp8', '0853726182738', '7774692bbb08c08ffde07048e6423cee.png', '1');

-- --------------------------------------------------------

--
-- Table structure for table `pengaduan`
--

CREATE TABLE `pengaduan` (
  `id_pengaduan` int(11) NOT NULL,
  `tgl_pengaduan` date NOT NULL,
  `nik` char(16) NOT NULL,
  `isi_laporan` text NOT NULL,
  `foto_pengaduan` varchar(40) DEFAULT NULL,
  `status` enum('0','proses','selesai','ditolak') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `pengaduan`
--

INSERT INTO `pengaduan` (`id_pengaduan`, `tgl_pengaduan`, `nik`, `isi_laporan`, `foto_pengaduan`, `status`) VALUES
(48, '2021-03-09', '3201478527412586', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.', '000b7bc732a041a4db8fb85e31ded6b0.jpg', 'selesai'),
(51, '2021-03-30', '3202583695600005', 'ajajajajajajj', 'cabff2123a46c467d494a5d82e127b8a.jpg', 'proses'),
(56, '2021-04-03', '3201478527412586', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.', '1bc6596c30729426c360798f98b24980.jpg', '0'),
(57, '2021-04-03', '3202583695600005', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.', '87eec2bfc6a30fce3637a7b5f42c92d6.jpg', '0'),
(59, '2021-04-06', '3201454545748484', 'sjssskskskkssk', '61454ab89d4ff1408c1f7946609bbdd0.png', 'ditolak'),
(60, '2021-04-07', '3202587419632555', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.', 'd00150c1ebd860d847f0fb44af14e2ad.JPG', 'proses'),
(61, '2021-04-07', '3202587419632555', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.', 'e3696705921833d820f646559b7b5425.jpg', '0'),
(62, '2021-04-07', '1234567890123456', 'kebanjiran', 'b87ef2eab9970b3bb32d37f3addd5679.jpg', '0');

-- --------------------------------------------------------

--
-- Table structure for table `petugas`
--

CREATE TABLE `petugas` (
  `id_petugas` int(11) NOT NULL,
  `nama_petugas` varchar(35) NOT NULL,
  `username` varchar(25) NOT NULL,
  `email_petugas` varchar(40) DEFAULT NULL,
  `password` varchar(32) NOT NULL,
  `telp` varchar(13) DEFAULT NULL,
  `level` enum('admin','petugas') NOT NULL,
  `foto` varchar(40) DEFAULT NULL,
  `status` enum('0','1') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `petugas`
--

INSERT INTO `petugas` (`id_petugas`, `nama_petugas`, `username`, `email_petugas`, `password`, `telp`, `level`, `foto`, `status`) VALUES
(25, 'Adam Muhammad', 'petugas', 'adammuhammad@gmail.com', 'afb91ef692fd08c445e8cb1bab2ccf9c', '085741258935', 'petugas', 'avatar-1.png', '1'),
(27, 'Reishan Tridya Rafly', 'admin', 'reishantridyarafly@gmail.com', '21232f297a57a5a743894a0e4a801fc3', '0895617545305', 'admin', '3444f3b288805382ebe84cd6739df8c4.jpg', '1'),
(30, 'Sigit Sutanto', 'sigit', NULL, 'e10adc3949ba59abbe56e057f20f883e', '0852618268172', 'petugas', 'f4533764f8dc0ef5f01a4a94690ca6e7.png', '1');

-- --------------------------------------------------------

--
-- Table structure for table `tanggapan`
--

CREATE TABLE `tanggapan` (
  `id_tanggapan` int(11) NOT NULL,
  `id_pengaduan` int(11) NOT NULL,
  `tgl_tanggapan` date NOT NULL,
  `tanggapan` text NOT NULL,
  `id_petugas` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tanggapan`
--

INSERT INTO `tanggapan` (`id_tanggapan`, `id_pengaduan`, `tgl_tanggapan`, `tanggapan`, `id_petugas`) VALUES
(17, 48, '2021-03-29', 'Pengaduan anda telah selesai di proses, Terima kasih!', 27),
(18, 51, '2021-03-30', 'Akan Segera Kami Proses', 25),
(21, 60, '2021-04-07', 'Okee Terima kasihhhhhh', 30);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `masyarakat`
--
ALTER TABLE `masyarakat`
  ADD PRIMARY KEY (`nik`);

--
-- Indexes for table `pengaduan`
--
ALTER TABLE `pengaduan`
  ADD PRIMARY KEY (`id_pengaduan`),
  ADD KEY `nik` (`nik`);

--
-- Indexes for table `petugas`
--
ALTER TABLE `petugas`
  ADD PRIMARY KEY (`id_petugas`);

--
-- Indexes for table `tanggapan`
--
ALTER TABLE `tanggapan`
  ADD PRIMARY KEY (`id_tanggapan`),
  ADD KEY `id_pengaduan` (`id_pengaduan`),
  ADD KEY `id_petugas` (`id_petugas`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `pengaduan`
--
ALTER TABLE `pengaduan`
  MODIFY `id_pengaduan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=63;

--
-- AUTO_INCREMENT for table `petugas`
--
ALTER TABLE `petugas`
  MODIFY `id_petugas` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;

--
-- AUTO_INCREMENT for table `tanggapan`
--
ALTER TABLE `tanggapan`
  MODIFY `id_tanggapan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `pengaduan`
--
ALTER TABLE `pengaduan`
  ADD CONSTRAINT `pengaduan_ibfk_1` FOREIGN KEY (`nik`) REFERENCES `masyarakat` (`nik`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `tanggapan`
--
ALTER TABLE `tanggapan`
  ADD CONSTRAINT `tanggapan_ibfk_1` FOREIGN KEY (`id_pengaduan`) REFERENCES `pengaduan` (`id_pengaduan`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `tanggapan_ibfk_2` FOREIGN KEY (`id_petugas`) REFERENCES `petugas` (`id_petugas`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

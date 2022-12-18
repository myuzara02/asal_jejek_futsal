-- phpMyAdmin SQL Dump
-- version 4.6.5.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 27, 2017 at 09:30 AM
-- Server version: 10.1.21-MariaDB
-- PHP Version: 5.6.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_futsal`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `id_user` int(3) NOT NULL,
  `username` varchar(20) NOT NULL,
  `password` varchar(20) NOT NULL,
  `nama` varchar(50) NOT NULL,
  `phone` varchar(15) NOT NULL,
  `email` varchar(50) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`id_user`, `username`, `password`, `nama`, `phone`, `email`) VALUES
(1, 'admin', 'admin', 'Administrator', '+6281947472218', 'admin@gmail.com');

-- --------------------------------------------------------

--
-- Table structure for table `bayar`
--

CREATE TABLE `bayar` (
  `idbayar` int(11) NOT NULL,
  `idsewa` int(11) NOT NULL,
  `bukti` text NOT NULL,
  `tgl_upload` date NOT NULL,
  `konfirmasi` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `bayar`
--

INSERT INTO `bayar` (`idbayar`, `idsewa`, `bukti`, `tgl_upload`, `konfirmasi`) VALUES
(16, 30, 'Desert.jpg', '2017-11-27', 'Sudah'),
(17, 31, 'Jellyfish.jpg', '2017-11-27', 'Belum'),
(18, 32, 'Lighthouse.jpg', '2017-11-27', 'Sudah'),
(19, 33, 'Hydrangeas.jpg', '2017-11-27', 'Belum'),
(20, 34, 'Jellyfish.jpg', '2017-11-27', 'Belum'),
(21, 35, 'Koala.jpg', '2017-11-27', 'Belum'),
(22, 36, 'Tulips.jpg', '2017-11-27', 'Sudah'),
(23, 37, 'Desert.jpg', '2017-11-27', 'Belum'),
(24, 39, 'Chrysanthemum.jpg', '2017-11-27', 'Sudah'),
(25, 38, 'Jellyfish.jpg', '2017-11-27', 'Sudah');

-- --------------------------------------------------------

--
-- Table structure for table `lapangan`
--

CREATE TABLE `lapangan` (
  `idlap` int(11) NOT NULL,
  `nm` varchar(35) NOT NULL,
  `ket` text NOT NULL,
  `harga1` int(11) NOT NULL,
  `harga2` int(11) NOT NULL,
  `f1` text NOT NULL,
  `f2` text NOT NULL,
  `f3` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `lapangan`
--

INSERT INTO `lapangan` (`idlap`, `nm`, `ket`, `harga1`, `harga2`, `f1`, `f2`, `f3`) VALUES
(1, 'Golden', 'ket1', 50000, 60000, 'katakana 2.jpg', '2.jpg', '3.jpg'),
(2, 'Prima', 'ket2', 50000, 55000, '4.jpg', '5.jpg', '6.jpg'),
(3, 'qw', 'qwqe', 4000, 54000, '1505586_500579516728270_1800199790_n.jpg', 'katakana 3.jpg', 'hiragana 2.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `sewa`
--

CREATE TABLE `sewa` (
  `idsewa` int(11) NOT NULL,
  `iduser` int(11) NOT NULL,
  `idlap` int(11) NOT NULL,
  `tgl_pesan` date NOT NULL,
  `lama` int(11) NOT NULL,
  `jmulai` datetime NOT NULL,
  `jhabis` datetime NOT NULL,
  `jns` varchar(10) NOT NULL,
  `harga` int(11) NOT NULL,
  `tot` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `sewa`
--

INSERT INTO `sewa` (`idsewa`, `iduser`, `idlap`, `tgl_pesan`, `lama`, `jmulai`, `jhabis`, `jns`, `harga`, `tot`) VALUES
(30, 56, 1, '2017-11-27', 1, '2017-04-15 13:00:00', '2017-04-15 13:00:00', 'Siang', 50000, 50000),
(31, 56, 1, '2017-11-27', 3, '2017-09-26 21:00:00', '2017-09-26 21:00:00', 'Malam', 60000, 180000),
(32, 55, 2, '2017-11-27', 1, '2017-01-01 14:00:00', '2017-01-01 14:00:00', 'Siang', 50000, 50000),
(33, 55, 1, '2017-11-27', 1, '2017-06-11 14:00:00', '2017-06-11 14:00:00', 'Siang', 50000, 50000),
(34, 55, 3, '2017-11-27', 14, '2017-03-19 22:00:00', '2017-03-19 22:00:00', 'Malam', 54000, 756000),
(35, 40, 3, '2017-11-27', 3, '2017-07-05 13:00:00', '2017-07-05 13:00:00', 'Siang', 4000, 12000),
(36, 40, 1, '2017-11-27', 1, '2017-12-01 17:00:00', '2017-12-01 17:00:00', 'Siang', 50000, 50000),
(37, 40, 1, '2017-11-27', 13, '2017-01-28 09:00:00', '2017-01-28 09:00:00', 'Siang', 50000, 650000),
(38, 41, 1, '2017-11-27', 2, '2017-05-20 13:00:00', '2017-05-20 13:00:00', 'Siang', 50000, 100000),
(39, 41, 1, '2017-11-27', 1, '2017-09-12 14:00:00', '2017-09-12 14:00:00', 'Siang', 50000, 50000);

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id_user` int(11) NOT NULL,
  `email` varchar(50) NOT NULL,
  `password` varchar(32) NOT NULL,
  `hp` varchar(20) NOT NULL,
  `jenis_kelamin` varchar(10) NOT NULL,
  `nama_lengkap` varchar(60) NOT NULL,
  `alamat` text NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id_user`, `email`, `password`, `hp`, `jenis_kelamin`, `nama_lengkap`, `alamat`) VALUES
(40, 'indah@yahoo.com', '827ccb0eea8a706c4c34a16891f84e7b', '082170213344', 'P', 'Indah Wahyuni', ''),
(41, 'tull@yahoo.com', '827ccb0eea8a706c4c34a16891f84e7b', '081993448855', 'L', 'Muhamad Tuliliah', ''),
(42, 'Yandi@yahoo.com', '827ccb0eea8a706c4c34a16891f84e7b', '081344558833', 'L', 'Yandi Saputra', ''),
(32, 'ilham@yahoo.com', '827ccb0eea8a706c4c34a16891f84e7b', '089193448855', 'L', 'Ilham Kusuma', ''),
(33, 'ridwan@yahoo.com', '827ccb0eea8a706c4c34a16891f84e7b', '082170445566', 'L', 'Ridwan Indrawan', ''),
(45, 'indaswari@yahoo.com', '827ccb0eea8a706c4c34a16891f84e7b', '082170214495', 'P', 'Feronika Indaswari', ''),
(52, 'indah2@gmail.com', 'c4ca4238a0b923820dcc509a6f75849b', '081', 'Laki-Laki', 'tes2', 'asas'),
(56, 'jonjo@gmail.com', 'ca1afb3d43828b2a6c8d603e167e2729', '081234564321', 'Laki-Laki', 'Jonjo Wirawan', 'Solok'),
(54, 'andiputra@gmail.com', 'ce0e5bf55e4f71749eade7a8b95c4e46', '081234567890', 'Laki-Laki', 'Andi Putra', 'Padang'),
(55, 'dodiputra@gmail.com', 'dc82a0e0107a31ba5d137a47ab09a26b', '081234543213', 'Laki-Laki', 'Dodi Putra', 'Padang');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id_user`);

--
-- Indexes for table `bayar`
--
ALTER TABLE `bayar`
  ADD PRIMARY KEY (`idbayar`);

--
-- Indexes for table `lapangan`
--
ALTER TABLE `lapangan`
  ADD PRIMARY KEY (`idlap`);

--
-- Indexes for table `sewa`
--
ALTER TABLE `sewa`
  ADD PRIMARY KEY (`idsewa`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id_user`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `id_user` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `bayar`
--
ALTER TABLE `bayar`
  MODIFY `idbayar` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;
--
-- AUTO_INCREMENT for table `lapangan`
--
ALTER TABLE `lapangan`
  MODIFY `idlap` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `sewa`
--
ALTER TABLE `sewa`
  MODIFY `idsewa` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=40;
--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id_user` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=57;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

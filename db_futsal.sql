-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Dec 11, 2022 at 04:00 PM
-- Server version: 10.1.13-MariaDB
-- PHP Version: 5.5.37

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
(25, 38, 'Jellyfish.jpg', '2017-11-27', 'Sudah'),
(26, 40, 'lapang.jpg', '2022-12-11', 'Belum');

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
(40, 57, 2, '2022-12-11', 12, '2008-00-00 00:00:00', '2022-12-11 08:00:00', 'Siang', 50000, 600000);

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
(32, 'ilham@yahoo.com', '827ccb0eea8a706c4c34a16891f84e7b', '089193448855', 'L', 'Ilham Kusuma', ''),
(57, 'husnipicors10@gmail.com', 'e10adc3949ba59abbe56e057f20f883e', '123', 'Laki-Laki', 'Husni', 'garut');

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
  MODIFY `idbayar` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;
--
-- AUTO_INCREMENT for table `lapangan`
--
ALTER TABLE `lapangan`
  MODIFY `idlap` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `sewa`
--
ALTER TABLE `sewa`
  MODIFY `idsewa` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=41;
--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id_user` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=58;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

-- phpMyAdmin SQL Dump
-- version 4.9.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 13, 2020 at 04:35 AM
-- Server version: 10.4.8-MariaDB
-- PHP Version: 7.3.11

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_booking`
--

-- --------------------------------------------------------

--
-- Table structure for table `tb_detail_order`
--

CREATE TABLE `tb_detail_order` (
  `id_detail_order` int(11) NOT NULL,
  `id_order` int(11) NOT NULL,
  `id_tiket` int(11) NOT NULL,
  `jumlah` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_detail_order`
--

INSERT INTO `tb_detail_order` (`id_detail_order`, `id_order`, `id_tiket`, `jumlah`) VALUES
(1, 2, 1, 1),
(2, 3, 1, 1),
(3, 4, 1, 1),
(4, 4, 2, 1),
(5, 6, 1, 1),
(6, 6, 3, 1),
(7, 7, 1, 1),
(8, 7, 2, 1),
(9, 8, 1, 1),
(10, 9, 1, 1),
(11, 10, 1, 1),
(12, 11, 1, 1),
(13, 12, 1, 1),
(14, 13, 1, 1),
(15, 14, 1, 1),
(16, 15, 1, 1),
(17, 16, 1, 1),
(18, 17, 1, 1),
(19, 18, 1, 1),
(20, 19, 1, 1),
(21, 20, 1, 1),
(22, 21, 1, 1),
(23, 22, 1, 1),
(24, 23, 1, 1),
(25, 24, 1, 1),
(26, 25, 1, 2),
(27, 26, 1, 3),
(28, 27, 1, 1),
(29, 28, 1, 2),
(30, 28, 2, 1),
(31, 29, 1, 1),
(32, 30, 1, 1),
(33, 31, 1, 1),
(34, 32, 1, 2),
(35, 32, 2, 1);

-- --------------------------------------------------------

--
-- Table structure for table `tb_order`
--

CREATE TABLE `tb_order` (
  `id_order` int(11) NOT NULL,
  `id_user` int(11) NOT NULL,
  `tgl_order` date NOT NULL,
  `total` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_order`
--

INSERT INTO `tb_order` (`id_order`, `id_user`, `tgl_order`, `total`) VALUES
(1, 1, '2020-06-11', 600000),
(2, 1, '2020-06-11', 600000),
(3, 1, '2020-06-11', 300000),
(4, 1, '2020-06-12', 650000),
(5, 1, '2020-06-12', 0),
(6, 1, '2020-06-12', 700000),
(7, 1, '2020-06-12', 650000),
(8, 1, '2020-06-12', 300000),
(9, 1, '2020-06-12', 300000),
(10, 1, '2020-06-12', 300000),
(11, 1, '2020-06-12', 300000),
(12, 1, '2020-06-12', 300000),
(13, 1, '2020-06-12', 300000),
(14, 1, '2020-06-12', 300000),
(15, 1, '2020-06-12', 300000),
(16, 1, '2020-06-12', 300000),
(17, 5, '2020-06-12', 300000),
(18, 1, '2020-06-12', 300000),
(19, 1, '2020-06-12', 300000),
(20, 1, '2020-06-12', 300000),
(21, 1, '2020-06-12', 300000),
(22, 1, '2020-06-12', 300000),
(23, 1, '2020-06-12', 300000),
(24, 1, '2020-06-12', 300000),
(25, 1, '2020-06-12', 600000),
(26, 1, '2020-06-13', 900000),
(27, 1, '2020-06-13', 300000),
(28, 1, '2020-06-13', 950000),
(29, 1, '2020-06-13', 300000),
(30, 1, '2020-06-13', 300000),
(31, 1, '2020-06-13', 300000),
(32, 1, '2020-06-13', 950000);

-- --------------------------------------------------------

--
-- Table structure for table `tb_tiket`
--

CREATE TABLE `tb_tiket` (
  `id` int(11) NOT NULL,
  `kategori` varchar(255) NOT NULL,
  `keterangan` varchar(255) NOT NULL,
  `harga` float NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_tiket`
--

INSERT INTO `tb_tiket` (`id`, `kategori`, `keterangan`, `harga`) VALUES
(1, 'Early bird', '3 Days Pass', 300000),
(2, 'Presale 1', '3 Days Pass', 350000),
(3, 'Presale 2', '3 Days Pass', 400000),
(4, 'Presale 3', '3 Days Pass', 450000),
(5, 'Regular', 'Daily Pass', 300000),
(6, 'Regular', '3 Days Pass', 600000),
(7, 'Early Entry', 'Daily Pass', 230000),
(8, 'On The Spot', 'Daily Pass', 400000),
(9, 'On The Spot', '3 Days Pass', 750000);

-- --------------------------------------------------------

--
-- Table structure for table `tb_user`
--

CREATE TABLE `tb_user` (
  `id_user` int(11) NOT NULL,
  `email_user` varchar(100) NOT NULL,
  `password_user` varchar(100) NOT NULL,
  `nama_user` varchar(100) NOT NULL,
  `no_hp` varchar(15) NOT NULL,
  `alamat` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_user`
--

INSERT INTO `tb_user` (`id_user`, `email_user`, `password_user`, `nama_user`, `no_hp`, `alamat`) VALUES
(1, 'user1@email.com', 'user1', 'User 1', '081904892216', 'jl. gading ix blok z no 888 pondok bambu'),
(5, 'user2@email.com', 'user2', 'user2', '087728829303', 'Jl. Mangga no 94'),
(7, 'user3@email.com', 'user3', 'user3', '081902626786', 'Jl. Kedondong no 3');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tb_detail_order`
--
ALTER TABLE `tb_detail_order`
  ADD PRIMARY KEY (`id_detail_order`);

--
-- Indexes for table `tb_order`
--
ALTER TABLE `tb_order`
  ADD PRIMARY KEY (`id_order`);

--
-- Indexes for table `tb_tiket`
--
ALTER TABLE `tb_tiket`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tb_user`
--
ALTER TABLE `tb_user`
  ADD PRIMARY KEY (`id_user`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tb_detail_order`
--
ALTER TABLE `tb_detail_order`
  MODIFY `id_detail_order` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=36;

--
-- AUTO_INCREMENT for table `tb_order`
--
ALTER TABLE `tb_order`
  MODIFY `id_order` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=33;

--
-- AUTO_INCREMENT for table `tb_tiket`
--
ALTER TABLE `tb_tiket`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `tb_user`
--
ALTER TABLE `tb_user`
  MODIFY `id_user` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

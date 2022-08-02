-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 14, 2022 at 08:35 AM
-- Server version: 10.4.22-MariaDB
-- PHP Version: 7.4.27

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `dbhotel`
--

-- --------------------------------------------------------

--
-- Table structure for table `kamar`
--

CREATE TABLE `kamar` (
  `nokamar` int(11) NOT NULL,
  `jeniskamar` varchar(100) NOT NULL,
  `jumlahkamar` int(11) NOT NULL,
  `harga` int(10) NOT NULL,
  `gambar` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `kamar`
--

INSERT INTO `kamar` (`nokamar`, `jeniskamar`, `jumlahkamar`, `harga`, `gambar`) VALUES
(15, 'nss', 2, 200000, 'C:\\fakepath\\bagroundhotel.jpg'),
(18, '999', 999, 999, '1646387991_3f1a9b7c8bbc47f81f64.jpg'),
(19, 'dxc', 2, 3000, '1646398494_db7853698076e0aee1f4.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `pembayaran`
--

CREATE TABLE `pembayaran` (
  `no_pembayaran` int(11) NOT NULL,
  `metode` varchar(25) NOT NULL,
  `nomor_rekening` varchar(25) NOT NULL,
  `namabank` text NOT NULL,
  `gambarlogo` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `pembayaran`
--

INSERT INTO `pembayaran` (`no_pembayaran`, `metode`, `nomor_rekening`, `namabank`, `gambarlogo`) VALUES
(10, 'BNI', '213435465', 'MyHotle', '1654701358_5bc4de0292433a461471.png');

-- --------------------------------------------------------

--
-- Table structure for table `tkonfirmasi`
--

CREATE TABLE `tkonfirmasi` (
  `id` int(11) NOT NULL,
  `no_transaksi` int(11) NOT NULL,
  `no_pembayaran` int(11) NOT NULL,
  `namapengirim` varchar(50) NOT NULL,
  `norekening` int(25) NOT NULL,
  `uploadgambar` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `transaksi`
--

CREATE TABLE `transaksi` (
  `no_transaksi` int(11) NOT NULL,
  `userid` int(11) NOT NULL,
  `nokamar` int(11) NOT NULL,
  `jumlahkamar` int(11) NOT NULL,
  `tanggalmasuk` date NOT NULL,
  `tanggalkeluar` date NOT NULL,
  `lamamenginap` int(11) NOT NULL,
  `totalharga` bigint(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `transaksi`
--

INSERT INTO `transaksi` (`no_transaksi`, `userid`, `nokamar`, `jumlahkamar`, `tanggalmasuk`, `tanggalkeluar`, `lamamenginap`, `totalharga`) VALUES
(1, 1, 15, 2, '2022-03-02', '2022-03-07', 5, 4000000),
(4, 1, 18, 2, '2022-03-10', '2022-03-12', 2, 3996),
(7, 3, 19, 2, '2022-03-10', '2022-03-11', 1, 6000),
(8, 3, 18, 2, '2022-03-10', '2022-03-11', 2, 3996);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `userid` int(11) NOT NULL,
  `namalengkap` varchar(80) NOT NULL,
  `email` varchar(70) NOT NULL,
  `password` varchar(30) NOT NULL,
  `jeniskelamin` enum('laki-laki','perempuan') NOT NULL,
  `notelp` int(15) NOT NULL,
  `alamat` varchar(200) NOT NULL,
  `tgljoin` timestamp NOT NULL DEFAULT current_timestamp(),
  `role` enum('admin','pelanggan') NOT NULL DEFAULT 'pelanggan'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`userid`, `namalengkap`, `email`, `password`, `jeniskelamin`, `notelp`, `alamat`, `tgljoin`, `role`) VALUES
(1, 'Annisa Qhairiyahh', 'admin@gmail.com', 'admin', 'laki-laki', 2147483647, 'Jl.Baru AMD No.52', '2022-02-14 04:10:11', 'admin'),
(3, 'Annisa Qhairiyah', 'aqhairiyah@gmail.com', 'admin', 'laki-laki', 2147483342, 'Jl.Baru AMD No.52', '2022-02-15 10:23:07', 'pelanggan');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `kamar`
--
ALTER TABLE `kamar`
  ADD PRIMARY KEY (`nokamar`);

--
-- Indexes for table `pembayaran`
--
ALTER TABLE `pembayaran`
  ADD PRIMARY KEY (`no_pembayaran`);

--
-- Indexes for table `tkonfirmasi`
--
ALTER TABLE `tkonfirmasi`
  ADD PRIMARY KEY (`id`),
  ADD KEY `no_transaksi` (`no_transaksi`),
  ADD KEY `no_pembayaran` (`no_pembayaran`);

--
-- Indexes for table `transaksi`
--
ALTER TABLE `transaksi`
  ADD PRIMARY KEY (`no_transaksi`),
  ADD KEY `userid` (`userid`),
  ADD KEY `nokamar` (`nokamar`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`userid`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `kamar`
--
ALTER TABLE `kamar`
  MODIFY `nokamar` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT for table `pembayaran`
--
ALTER TABLE `pembayaran`
  MODIFY `no_pembayaran` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `tkonfirmasi`
--
ALTER TABLE `tkonfirmasi`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `transaksi`
--
ALTER TABLE `transaksi`
  MODIFY `no_transaksi` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `userid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `tkonfirmasi`
--
ALTER TABLE `tkonfirmasi`
  ADD CONSTRAINT `tkonfirmasi_ibfk_1` FOREIGN KEY (`no_pembayaran`) REFERENCES `pembayaran` (`no_pembayaran`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `tkonfirmasi_ibfk_2` FOREIGN KEY (`no_transaksi`) REFERENCES `transaksi` (`no_transaksi`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `transaksi`
--
ALTER TABLE `transaksi`
  ADD CONSTRAINT `transaksi_ibfk_1` FOREIGN KEY (`userid`) REFERENCES `users` (`userid`) ON DELETE NO ACTION ON UPDATE CASCADE,
  ADD CONSTRAINT `transaksi_ibfk_2` FOREIGN KEY (`nokamar`) REFERENCES `kamar` (`nokamar`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

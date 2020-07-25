-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Jul 25, 2020 at 07:11 AM
-- Server version: 10.4.11-MariaDB
-- PHP Version: 7.2.31

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `dbs_koperasi`
--

-- --------------------------------------------------------

--
-- Table structure for table `detail_keluar`
--

CREATE TABLE `detail_keluar` (
  `no_keluar` varchar(25) DEFAULT NULL,
  `nama_barang` varchar(80) DEFAULT NULL,
  `jumlah` int(11) DEFAULT NULL,
  `satuan` varchar(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `detail_keluar`
--

INSERT INTO `detail_keluar` (`no_keluar`, `nama_barang`, `jumlah`, `satuan`) VALUES
('TR1584538942', 'Keyboard', 1, 'pcs'),
('TR1584538942', 'Mouse', 1, 'pcs');

-- --------------------------------------------------------

--
-- Table structure for table `detail_terima`
--

CREATE TABLE `detail_terima` (
  `no_terima` varchar(25) DEFAULT NULL,
  `nama_barang` varchar(80) DEFAULT NULL,
  `jumlah` int(11) DEFAULT NULL,
  `satuan` varchar(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `detail_terima`
--

INSERT INTO `detail_terima` (`no_terima`, `nama_barang`, `jumlah`, `satuan`) VALUES
('TR1584538872', 'Keyboard', 1, 'pcs'),
('TR1584538872', 'Mouse', 1, 'pcs'),
('TR1584539271', 'Keyboard', 4, 'pcs');

-- --------------------------------------------------------

--
-- Table structure for table `historisetoran`
--

CREATE TABLE `historisetoran` (
  `kode` varchar(20) NOT NULL,
  `tanggal` date NOT NULL,
  `waktu` enum('pagi','sore') NOT NULL,
  `idpetugas` varchar(20) NOT NULL,
  `idpeternak` varchar(20) NOT NULL,
  `jumlahsetoran` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `kualitassusu`
--

CREATE TABLE `kualitassusu` (
  `kodesusu` varchar(20) NOT NULL,
  `kondisi` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `kualitassusu`
--

INSERT INTO `kualitassusu` (`kodesusu`, `kondisi`) VALUES
('A', 'baik'),
('B', 'cukup'),
('C', 'buruk');

-- --------------------------------------------------------

--
-- Table structure for table `penerimaan`
--

CREATE TABLE `penerimaan` (
  `id` int(11) NOT NULL,
  `no_terima` varchar(25) DEFAULT NULL,
  `tgl_terima` varchar(25) DEFAULT NULL,
  `jam_terima` varchar(10) DEFAULT NULL,
  `nama_supplier` varchar(80) DEFAULT NULL,
  `nama_petugas` varchar(80) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `penerimaan`
--

INSERT INTO `penerimaan` (`id`, `no_terima`, `tgl_terima`, `jam_terima`, `nama_supplier`, `nama_petugas`) VALUES
(3, 'TR1584538872', '18/03/2020', '20:41:12', 'Mutiara Comp', 'Nugrohoo'),
(4, 'TR1584539271', '18/03/2020', '20:47:51', 'Mutiara Comp', 'Fanani');

-- --------------------------------------------------------

--
-- Table structure for table `pengeluaran`
--

CREATE TABLE `pengeluaran` (
  `id` int(11) NOT NULL,
  `no_keluar` varchar(25) DEFAULT NULL,
  `tgl_keluar` varchar(25) DEFAULT NULL,
  `jam_keluar` varchar(10) DEFAULT NULL,
  `nama_customer` varchar(80) DEFAULT NULL,
  `nama_petugas` varchar(80) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `pengeluaran`
--

INSERT INTO `pengeluaran` (`id`, `no_keluar`, `tgl_keluar`, `jam_keluar`, `nama_customer`, `nama_petugas`) VALUES
(5, 'TR1584538942', '18/03/2020', '20:42:22', 'Smart Computer', 'Nugrohoo');

-- --------------------------------------------------------

--
-- Table structure for table `pengguna`
--

CREATE TABLE `pengguna` (
  `id` int(11) NOT NULL,
  `kode` varchar(20) DEFAULT NULL,
  `nama` varchar(100) DEFAULT NULL,
  `username` varchar(20) DEFAULT NULL,
  `password` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `pengguna`
--

INSERT INTO `pengguna` (`id`, `kode`, `nama`, `username`, `password`) VALUES
(1, 'PGN17', 'delly', 'delly', 'delly');

-- --------------------------------------------------------

--
-- Table structure for table `peternak`
--

CREATE TABLE `peternak` (
  `kode` varchar(20) NOT NULL,
  `nama` varchar(100) NOT NULL,
  `jumlahsapi` varchar(100) NOT NULL,
  `telepon` varchar(11) NOT NULL,
  `alamat` varchar(255) NOT NULL,
  `kodepos` int(100) NOT NULL,
  `kualitassusu` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `peternak`
--

INSERT INTO `peternak` (`kode`, `nama`, `jumlahsapi`, `telepon`, `alamat`, `kodepos`, `kualitassusu`) VALUES
('PTR885', 'agus', '4', '0875432', 'pujon', 4, 'A');

-- --------------------------------------------------------

--
-- Table structure for table `petugas`
--

CREATE TABLE `petugas` (
  `kode` varchar(20) NOT NULL,
  `nama` varchar(100) DEFAULT NULL,
  `username` varchar(20) DEFAULT NULL,
  `password` varchar(255) DEFAULT NULL,
  `telepon` int(11) NOT NULL,
  `alamat` varchar(128) NOT NULL,
  `poskode` int(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `petugas`
--

INSERT INTO `petugas` (`kode`, `nama`, `username`, `password`, `telepon`, `alamat`, `poskode`) VALUES
('PTGS207', 'agus', 'agus', 'agus', 188888, 'Ngroto', 5),
('PTGS381', 'delly', 'delly', 'delly', 82222, 'pujon', 4);

-- --------------------------------------------------------

--
-- Table structure for table `pospenampungan`
--

CREATE TABLE `pospenampungan` (
  `kodepos` int(100) NOT NULL,
  `alamatpos` varchar(128) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `pospenampungan`
--

INSERT INTO `pospenampungan` (`kodepos`, `alamatpos`) VALUES
(4, 'pujon'),
(5, 'Ngroto');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `historisetoran`
--
ALTER TABLE `historisetoran`
  ADD PRIMARY KEY (`kode`),
  ADD KEY `idpetugas` (`idpetugas`),
  ADD KEY `idpeternak` (`idpeternak`);

--
-- Indexes for table `kualitassusu`
--
ALTER TABLE `kualitassusu`
  ADD PRIMARY KEY (`kodesusu`);

--
-- Indexes for table `penerimaan`
--
ALTER TABLE `penerimaan`
  ADD PRIMARY KEY (`id`),
  ADD KEY `no_terima` (`no_terima`);

--
-- Indexes for table `pengeluaran`
--
ALTER TABLE `pengeluaran`
  ADD PRIMARY KEY (`id`),
  ADD KEY `no_keluar` (`no_keluar`);

--
-- Indexes for table `pengguna`
--
ALTER TABLE `pengguna`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `peternak`
--
ALTER TABLE `peternak`
  ADD PRIMARY KEY (`kode`),
  ADD KEY `kodepos` (`kodepos`),
  ADD KEY `kualitassusu` (`kualitassusu`);

--
-- Indexes for table `petugas`
--
ALTER TABLE `petugas`
  ADD PRIMARY KEY (`kode`),
  ADD KEY `poskode` (`poskode`);

--
-- Indexes for table `pospenampungan`
--
ALTER TABLE `pospenampungan`
  ADD PRIMARY KEY (`kodepos`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `penerimaan`
--
ALTER TABLE `penerimaan`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `pengeluaran`
--
ALTER TABLE `pengeluaran`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `pengguna`
--
ALTER TABLE `pengguna`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `pospenampungan`
--
ALTER TABLE `pospenampungan`
  MODIFY `kodepos` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `historisetoran`
--
ALTER TABLE `historisetoran`
  ADD CONSTRAINT `historisetoran_ibfk_1` FOREIGN KEY (`idpetugas`) REFERENCES `petugas` (`kode`),
  ADD CONSTRAINT `historisetoran_ibfk_2` FOREIGN KEY (`idpeternak`) REFERENCES `peternak` (`kode`);

--
-- Constraints for table `peternak`
--
ALTER TABLE `peternak`
  ADD CONSTRAINT `peternak_ibfk_1` FOREIGN KEY (`kodepos`) REFERENCES `pospenampungan` (`kodepos`),
  ADD CONSTRAINT `peternak_ibfk_2` FOREIGN KEY (`kualitassusu`) REFERENCES `kualitassusu` (`kodesusu`),
  ADD CONSTRAINT `peternak_ibfk_3` FOREIGN KEY (`kualitassusu`) REFERENCES `kualitassusu` (`kodesusu`);

--
-- Constraints for table `petugas`
--
ALTER TABLE `petugas`
  ADD CONSTRAINT `petugas_ibfk_1` FOREIGN KEY (`poskode`) REFERENCES `pospenampungan` (`kodepos`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

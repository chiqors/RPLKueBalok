-- phpMyAdmin SQL Dump
-- version 4.8.3
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Aug 09, 2019 at 01:02 AM
-- Server version: 5.7.24
-- PHP Version: 7.2.11

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `rplkuebalok`
--

-- --------------------------------------------------------

--
-- Table structure for table `bahanbaku`
--

CREATE TABLE `bahanbaku` (
  `IdBahanBaku` int(11) NOT NULL COMMENT 'Id Bahan Baku',
  `Nama` varchar(30) NOT NULL COMMENT 'Nama Bahan Baku',
  `Jenis` varchar(25) NOT NULL COMMENT 'Jenis Bahan Baku',
  `Kategori` varchar(25) NOT NULL COMMENT 'Kategori Bahan Baku',
  `harga` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `belanja`
--

CREATE TABLE `belanja` (
  `IdBelanja` int(11) NOT NULL,
  `IdBahanBaku` int(11) NOT NULL COMMENT 'Id Bahan Baku',
  `Kuantitas` int(4) NOT NULL COMMENT 'Kuantitas',
  `TanggalKadaluarsa` date NOT NULL COMMENT 'Waktu tanggal kadaluarsa',
  `TanggalBeli` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `detailmejapesanan`
--

CREATE TABLE `detailmejapesanan` (
  `KodePesanan` varchar(10) NOT NULL COMMENT 'Kode Pesanan',
  `NoMeja` int(4) NOT NULL COMMENT 'Nomor Meja',
  `TanggalWaktuReservasi` datetime NOT NULL COMMENT 'Tipe Meja'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `detailmenupesanan`
--

CREATE TABLE `detailmenupesanan` (
  `KodePesanan` varchar(10) NOT NULL COMMENT 'Kode Pesanan',
  `IdMenu` int(11) NOT NULL COMMENT 'Id Menu',
  `Kuantitas` int(4) NOT NULL COMMENT 'Kuantitas',
  `StatusMenu` enum('Belum Dilayani','Sudah Dilayani') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `kuisioner`
--

CREATE TABLE `kuisioner` (
  `IdKuisioner` int(11) NOT NULL COMMENT 'Id Kuisioner',
  `IdPembayaran` int(11) NOT NULL,
  `StatusKuisioner` varchar(16) NOT NULL COMMENT 'Status kuisioner',
  `Jwb_kondisi` text NOT NULL COMMENT 'Jawaban tentang kondisi',
  `Jwb_tempat` text NOT NULL COMMENT 'Jawaban tentang tempat',
  `Jwb_menu` text NOT NULL COMMENT 'Jawaban tentang menu',
  `Jwb_servis` text NOT NULL COMMENT 'Nomor Telepon',
  `TanggalPengisian` date NOT NULL COMMENT 'Waktu dan tanggal pengisian kuisioner'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `meja`
--

CREATE TABLE `meja` (
  `NoMeja` int(4) NOT NULL COMMENT 'Nomor Meja',
  `Kapasitas` int(4) NOT NULL,
  `TipeMeja` varchar(11) NOT NULL,
  `HargaLayananMeja` int(8) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `menu`
--

CREATE TABLE `menu` (
  `IdMenu` int(11) NOT NULL,
  `JenisMenu` varchar(25) NOT NULL,
  `Nama` varchar(30) NOT NULL,
  `Harga` int(8) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `menu_bahanbaku`
--

CREATE TABLE `menu_bahanbaku` (
  `IdMenu` int(11) NOT NULL COMMENT 'Id Menu',
  `IdBahanBaku` int(11) NOT NULL COMMENT 'Id Bahan Baku',
  `Jumlah` int(4) NOT NULL COMMENT 'Jumlah Bahan Baku'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `pembayaran`
--

CREATE TABLE `pembayaran` (
  `IdPembayaran` int(11) NOT NULL,
  `KodePesanan` varchar(10) NOT NULL COMMENT 'Kode Pesanan',
  `TanggalBayar` datetime NOT NULL COMMENT 'Waktu tanggal pembayaran',
  `SubTotalBayar` int(8) NOT NULL COMMENT 'Sub Total Pembayaran',
  `Diskon` int(8) NOT NULL COMMENT 'Diskon',
  `TotalBayar` int(8) NOT NULL COMMENT 'Total Pembayaran'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `pengguna`
--

CREATE TABLE `pengguna` (
  `NIP` varchar(8) NOT NULL COMMENT 'Nomor Induk Pegawai',
  `Username` varchar(16) NOT NULL COMMENT 'Nama Pengguna',
  `Password` varchar(125) NOT NULL COMMENT 'Password Pengguna',
  `NamaLengkap` varchar(50) NOT NULL COMMENT 'Nama Karyawan',
  `Jabatan` varchar(16) NOT NULL COMMENT 'Jabatan Karyawan',
  `NoTelp` varchar(12) NOT NULL COMMENT 'Nomor Telepon'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `pengguna`
--

INSERT INTO `pengguna` (`NIP`, `Username`, `Password`, `NamaLengkap`, `Jabatan`, `NoTelp`) VALUES
('10153243', 'pantry', 'dfc1c8bed5de7350be927562047dd29f', 'Pantry', 'Pantry', '081223939233'),
('10524647', 'koki', 'c38be0f1f87d0e77a0cd2fe6941253eb', 'Koki', 'Koki', '067347346376'),
('12512343', 'kasir', 'c7911af3adbd12a035b289556d96470a', 'Kasir', 'Kasir', '03657675643'),
('15235252', 'owner', '72122ce96bfec66e2396d2e25225d70a', 'Owner', 'Owner', '07584574554'),
('35246275', 'customer_servis', '79d3ec7b465739aedb61129500f119a5', 'Customer Servis', 'Customer Servis', '5834537564'),
('62523523', 'pelayan', '511cc40443f2a1ab03ab373b77d28091', 'Pelayan', 'Pelayan', '063734756546');

-- --------------------------------------------------------

--
-- Table structure for table `pesanan`
--

CREATE TABLE `pesanan` (
  `KodePesanan` varchar(10) NOT NULL COMMENT 'Kode Pesanan',
  `NIP` varchar(8) NOT NULL COMMENT 'Nomor Induk Pegawai',
  `TanggalPesanan` datetime NOT NULL COMMENT 'Waktu tanggal pesanan',
  `StatusPesanan` varchar(20) NOT NULL COMMENT 'Status pesanan',
  `NamaPelanggan` varchar(30) NOT NULL COMMENT 'Nama Pelanggan',
  `NoTelepon` varchar(12) NOT NULL COMMENT 'Nomor Telepon',
  `Email` varchar(30) NOT NULL COMMENT 'Email'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `bahanbaku`
--
ALTER TABLE `bahanbaku`
  ADD PRIMARY KEY (`IdBahanBaku`);

--
-- Indexes for table `belanja`
--
ALTER TABLE `belanja`
  ADD PRIMARY KEY (`IdBelanja`),
  ADD KEY `IdBahanBaku` (`IdBahanBaku`);

--
-- Indexes for table `detailmejapesanan`
--
ALTER TABLE `detailmejapesanan`
  ADD KEY `KodePesanan` (`KodePesanan`),
  ADD KEY `NoMeja` (`NoMeja`);

--
-- Indexes for table `detailmenupesanan`
--
ALTER TABLE `detailmenupesanan`
  ADD KEY `IdMenu` (`IdMenu`),
  ADD KEY `KodePesanan` (`KodePesanan`);

--
-- Indexes for table `kuisioner`
--
ALTER TABLE `kuisioner`
  ADD PRIMARY KEY (`IdKuisioner`),
  ADD KEY `IdPembayaran` (`IdPembayaran`);

--
-- Indexes for table `meja`
--
ALTER TABLE `meja`
  ADD PRIMARY KEY (`NoMeja`);

--
-- Indexes for table `menu`
--
ALTER TABLE `menu`
  ADD PRIMARY KEY (`IdMenu`);

--
-- Indexes for table `menu_bahanbaku`
--
ALTER TABLE `menu_bahanbaku`
  ADD KEY `IdBahanBaku` (`IdBahanBaku`),
  ADD KEY `IdMenu` (`IdMenu`);

--
-- Indexes for table `pembayaran`
--
ALTER TABLE `pembayaran`
  ADD PRIMARY KEY (`IdPembayaran`),
  ADD KEY `KodePesanan` (`KodePesanan`);

--
-- Indexes for table `pengguna`
--
ALTER TABLE `pengguna`
  ADD PRIMARY KEY (`NIP`);

--
-- Indexes for table `pesanan`
--
ALTER TABLE `pesanan`
  ADD PRIMARY KEY (`KodePesanan`),
  ADD KEY `NIP` (`NIP`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `bahanbaku`
--
ALTER TABLE `bahanbaku`
  MODIFY `IdBahanBaku` int(11) NOT NULL AUTO_INCREMENT COMMENT 'Id Bahan Baku';

--
-- AUTO_INCREMENT for table `belanja`
--
ALTER TABLE `belanja`
  MODIFY `IdBelanja` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `kuisioner`
--
ALTER TABLE `kuisioner`
  MODIFY `IdKuisioner` int(11) NOT NULL AUTO_INCREMENT COMMENT 'Id Kuisioner';

--
-- AUTO_INCREMENT for table `meja`
--
ALTER TABLE `meja`
  MODIFY `NoMeja` int(4) NOT NULL AUTO_INCREMENT COMMENT 'Nomor Meja';

--
-- AUTO_INCREMENT for table `menu`
--
ALTER TABLE `menu`
  MODIFY `IdMenu` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `pembayaran`
--
ALTER TABLE `pembayaran`
  MODIFY `IdPembayaran` int(11) NOT NULL AUTO_INCREMENT;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `belanja`
--
ALTER TABLE `belanja`
  ADD CONSTRAINT `belanja_ibfk_1` FOREIGN KEY (`IdBahanBaku`) REFERENCES `bahanbaku` (`IdBahanBaku`);

--
-- Constraints for table `detailmejapesanan`
--
ALTER TABLE `detailmejapesanan`
  ADD CONSTRAINT `detailmejapesanan_ibfk_1` FOREIGN KEY (`KodePesanan`) REFERENCES `pesanan` (`KodePesanan`),
  ADD CONSTRAINT `detailmejapesanan_ibfk_2` FOREIGN KEY (`NoMeja`) REFERENCES `meja` (`NoMeja`);

--
-- Constraints for table `detailmenupesanan`
--
ALTER TABLE `detailmenupesanan`
  ADD CONSTRAINT `detailmenupesanan_ibfk_1` FOREIGN KEY (`IdMenu`) REFERENCES `menu` (`IdMenu`),
  ADD CONSTRAINT `detailmenupesanan_ibfk_2` FOREIGN KEY (`KodePesanan`) REFERENCES `pesanan` (`KodePesanan`);

--
-- Constraints for table `kuisioner`
--
ALTER TABLE `kuisioner`
  ADD CONSTRAINT `kuisioner_ibfk_1` FOREIGN KEY (`IdPembayaran`) REFERENCES `pembayaran` (`IdPembayaran`);

--
-- Constraints for table `menu_bahanbaku`
--
ALTER TABLE `menu_bahanbaku`
  ADD CONSTRAINT `menu_bahanbaku_ibfk_1` FOREIGN KEY (`IdBahanBaku`) REFERENCES `bahanbaku` (`IdBahanBaku`),
  ADD CONSTRAINT `menu_bahanbaku_ibfk_2` FOREIGN KEY (`IdMenu`) REFERENCES `menu` (`IdMenu`);

--
-- Constraints for table `pembayaran`
--
ALTER TABLE `pembayaran`
  ADD CONSTRAINT `pembayaran_ibfk_1` FOREIGN KEY (`KodePesanan`) REFERENCES `pesanan` (`KodePesanan`);

--
-- Constraints for table `pesanan`
--
ALTER TABLE `pesanan`
  ADD CONSTRAINT `pesanan_ibfk_1` FOREIGN KEY (`NIP`) REFERENCES `pengguna` (`NIP`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

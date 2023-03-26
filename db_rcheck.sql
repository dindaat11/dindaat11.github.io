-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 20, 2023 at 03:08 PM
-- Server version: 10.4.24-MariaDB
-- PHP Version: 7.4.29

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_rcheck`
--

-- --------------------------------------------------------

--
-- Table structure for table `dpemeriksaan`
--

CREATE TABLE `dpemeriksaan` (
  `iddpemeriksaan` int(11) NOT NULL,
  `name` varchar(200) NOT NULL,
  `tanggal` varchar(200) NOT NULL,
  `lokasi` varchar(200) NOT NULL,
  `nlokasi` varchar(200) NOT NULL,
  `umur` varchar(200) NOT NULL,
  `npo` varchar(200) NOT NULL,
  `nstuk` varchar(200) NOT NULL,
  `nkendaraan` varchar(200) NOT NULL,
  `ntkendaraan` varchar(200) NOT NULL,
  `jtrayek` varchar(200) NOT NULL,
  `trayek` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `dpemeriksaan`
--

INSERT INTO `dpemeriksaan` (`iddpemeriksaan`, `name`, `tanggal`, `lokasi`, `nlokasi`, `umur`, `npo`, `nstuk`, `nkendaraan`, `ntkendaraan`, `jtrayek`, `trayek`) VALUES
(38, 'TEGUH ALFARUQI', '2023-03-20', 'Terminal', 'GARUT', '22', 'TEST123', '534535', 'DTDGDSG', 'Reguler', 'AKDP', 'GSGRAES'),
(39, 'sirg vorg', '2023-03-21', 'Terminal', 'GARUT', '15', 'TEST', '534535', 'DTDGDSG', 'Reguler', 'AKAP', 'GSGRAES'),
(40, 'TEGUH ALFARUQI', '2023-03-22', 'Terminal', 'GARUT', '15', 'TEST', '534535', 'DTDGDSG', 'Reguler', 'AKAP', 'GSGRAES');

-- --------------------------------------------------------

--
-- Table structure for table `uadministrasi`
--

CREATE TABLE `uadministrasi` (
  `iduadministrasi` int(11) NOT NULL,
  `iddpemeriksaan` int(11) NOT NULL,
  `kuji` varchar(200) NOT NULL,
  `kpreguler` varchar(200) NOT NULL,
  `kpcadangan` varchar(200) NOT NULL,
  `spengemudi` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `uadministrasi`
--

INSERT INTO `uadministrasi` (`iduadministrasi`, `iddpemeriksaan`, `kuji`, `kpreguler`, `kpcadangan`, `spengemudi`) VALUES
(34, 38, 'Tidak berlaku', 'Tida ada', 'Tidak berlaku', 'A(Umum)'),
(35, 39, 'Tida sesuai fisik', 'Tida sesuai fisik', 'Tidak berlaku', 'Sim tidak sesuai'),
(36, 40, 'Ada, berlaku', 'Ada, berlaku', 'Ada, berlaku', 'A(Umum)');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `idusers` int(11) NOT NULL,
  `username` varchar(100) NOT NULL,
  `password` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`idusers`, `username`, `password`) VALUES
(1, 'admin123', '698d51a19d8a121ce581499d7b701668');

-- --------------------------------------------------------

--
-- Table structure for table `uteknisp`
--

CREATE TABLE `uteknisp` (
  `iduteknisp` int(11) NOT NULL,
  `iddpemeriksaan` int(11) NOT NULL,
  `pkecepatan` varchar(200) NOT NULL,
  `lsdepan` varchar(200) NOT NULL,
  `lsbelakang` varchar(200) NOT NULL,
  `kspion` varchar(200) NOT NULL,
  `kwiper` varchar(200) NOT NULL,
  `klakson` varchar(200) NOT NULL,
  `jtduduk` varchar(200) NOT NULL,
  `bcadangan` varchar(200) NOT NULL,
  `spengaman` varchar(200) NOT NULL,
  `dongkrak` varchar(200) NOT NULL,
  `proda` varchar(200) NOT NULL,
  `lsenter` varchar(200) NOT NULL,
  `pdarurat` varchar(200) NOT NULL,
  `jdarurat` varchar(200) NOT NULL,
  `pkaca` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `uteknisp`
--

INSERT INTO `uteknisp` (`iduteknisp`, `iddpemeriksaan`, `pkecepatan`, `lsdepan`, `lsbelakang`, `kspion`, `kwiper`, `klakson`, `jtduduk`, `bcadangan`, `spengaman`, `dongkrak`, `proda`, `lsenter`, `pdarurat`, `jdarurat`, `pkaca`) VALUES
(34, 38, 'Ada dan fungsi', 'Semua menyala', 'Tidak menyala(kanan)', 'Ada dan sesuai', 'Ada', 'Ada', 'Sesuai', 'Ada dan Laik', 'Ada', 'Tidak ada', 'Tidak ada', 'Tidak ada', 'Ada', 'Ada', 'Tidak ada'),
(35, 39, 'Tidak berfungsi', 'Tidak menyala(kanan)', 'Tidak menyala(kanan)', 'Tidak ada', 'Tidak ada', 'Tidak berfungsi', 'Sesuai', 'Ada dan Laik', 'Ada', 'Ada', 'Ada', 'Ada', 'Ada', 'Ada', 'Ada'),
(36, 40, 'Ada dan fungsi', 'Semua menyala', 'Semua menyala', 'Ada dan sesuai', 'Ada', 'Ada', 'Sesuai', 'Ada dan Laik', 'Ada', 'Ada', 'Ada', 'Ada', 'Ada', 'Ada', 'Ada');

-- --------------------------------------------------------

--
-- Table structure for table `uteknisu`
--

CREATE TABLE `uteknisu` (
  `iduteknisu` int(11) NOT NULL,
  `iddpemeriksaan` int(11) NOT NULL,
  `ldekat` varchar(200) NOT NULL,
  `ljauh` varchar(200) NOT NULL,
  `ldepan` varchar(200) NOT NULL,
  `lbelakang` varchar(200) NOT NULL,
  `lrem` varchar(200) NOT NULL,
  `lmundur` varchar(200) NOT NULL,
  `rutama` varchar(200) NOT NULL,
  `rparkir` varchar(200) NOT NULL,
  `kdepan` varchar(200) NOT NULL,
  `kbdepan` varchar(200) NOT NULL,
  `kbbelakang` varchar(200) NOT NULL,
  `skpengemudi` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `uteknisu`
--

INSERT INTO `uteknisu` (`iduteknisu`, `iddpemeriksaan`, `ldekat`, `ljauh`, `ldepan`, `lbelakang`, `lrem`, `lmundur`, `rutama`, `rparkir`, `kdepan`, `kbdepan`, `kbbelakang`, `skpengemudi`) VALUES
(34, 38, 'Semua menyala', 'Semua menyala', 'Semua menyala', 'Semua menyala', 'Semua menyala', 'Tidak menyala(kanan)', 'Berfungsi', 'Berfungsi', 'Baik', 'Semua Laik', 'Semua Laik', 'Ada dan fungsi'),
(35, 39, 'Tidak menyala(kanan)', 'Tidak menyala(kiri)', 'Tidak menyala(kanan)', 'Tidak menyala(kanan)', 'Tidak menyala(kanan)', 'Tidak menyala(kanan)', 'Tidak Berfungsi', 'Tidak Berfungsi', 'Buruk', 'Tidak Laik(Kanan)', 'Tidak Laik(Kanan)', 'Tidak fungsi/Tidak ada'),
(36, 40, 'Semua menyala', 'Semua menyala', 'Semua menyala', 'Semua menyala', 'Semua menyala', 'Semua menyala', 'Berfungsi', 'Berfungsi', 'Baik', 'Semua Laik', 'Semua Laik', 'Ada dan fungsi');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `dpemeriksaan`
--
ALTER TABLE `dpemeriksaan`
  ADD PRIMARY KEY (`iddpemeriksaan`);

--
-- Indexes for table `uadministrasi`
--
ALTER TABLE `uadministrasi`
  ADD PRIMARY KEY (`iduadministrasi`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`idusers`);

--
-- Indexes for table `uteknisp`
--
ALTER TABLE `uteknisp`
  ADD PRIMARY KEY (`iduteknisp`);

--
-- Indexes for table `uteknisu`
--
ALTER TABLE `uteknisu`
  ADD PRIMARY KEY (`iduteknisu`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `dpemeriksaan`
--
ALTER TABLE `dpemeriksaan`
  MODIFY `iddpemeriksaan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=41;

--
-- AUTO_INCREMENT for table `uadministrasi`
--
ALTER TABLE `uadministrasi`
  MODIFY `iduadministrasi` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=37;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `idusers` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `uteknisp`
--
ALTER TABLE `uteknisp`
  MODIFY `iduteknisp` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=37;

--
-- AUTO_INCREMENT for table `uteknisu`
--
ALTER TABLE `uteknisu`
  MODIFY `iduteknisu` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=37;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

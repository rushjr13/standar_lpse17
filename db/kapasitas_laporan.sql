-- phpMyAdmin SQL Dump
-- version 4.9.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 16, 2019 at 09:06 AM
-- Server version: 10.4.6-MariaDB
-- PHP Version: 7.3.8

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `s_lpse`
--

-- --------------------------------------------------------

--
-- Table structure for table `kapasitas_laporan`
--

CREATE TABLE `kapasitas_laporan` (
  `id_kapasitas` varchar(20) NOT NULL,
  `latar_belakang` text DEFAULT 'Belum Ada Data',
  `ruang_lingkup` text DEFAULT 'Belum Ada Data',
  `metode` text DEFAULT 'Belum Ada Data',
  `laporan_saat_ini` text DEFAULT 'Belum Ada Data',
  `prediksi_akan_datang` text DEFAULT 'Belum Ada Data',
  `laporan_pakai_komponen` text DEFAULT 'Belum Ada Data',
  `analisis_trend` text DEFAULT 'Belum Ada Data',
  `prediksi_kebutuhan` text DEFAULT 'Belum Ada Data',
  `pilihan_peningkatan_layanan` text DEFAULT 'Belum Ada Data',
  `prediksi_pembiayaan` text DEFAULT 'Belum Ada Data',
  `rekomendasi_kapasitas` text DEFAULT 'Belum Ada Data'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `kapasitas_laporan`
--

INSERT INTO `kapasitas_laporan` (`id_kapasitas`, `latar_belakang`, `ruang_lingkup`, `metode`, `laporan_saat_ini`, `prediksi_akan_datang`, `laporan_pakai_komponen`, `analisis_trend`, `prediksi_kebutuhan`, `pilihan_peningkatan_layanan`, `prediksi_pembiayaan`, `rekomendasi_kapasitas`) VALUES
('KL1576477235', '\'Belum Ada Data\'', '\'Belum Ada Data\'', '\'Belum Ada Data\'', '\'Belum Ada Data\'', '\'Belum Ada Data\'', '\'Belum Ada Data\'', '\'Belum Ada Data\'', '\'Belum Ada Data\'', '\'Belum Ada Data\'', '\'Belum Ada Data\'', '\'Belum Ada Data\''),
('KL1576478838', '\'Belum Ada Data\'', '\'Belum Ada Data\'', '\'Belum Ada Data\'', '\'Belum Ada Data\'', '\'Belum Ada Data\'', '\'Belum Ada Data\'', '\'Belum Ada Data\'', '\'Belum Ada Data\'', '\'Belum Ada Data\'', '\'Belum Ada Data\'', '\'Belum Ada Data\'');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `kapasitas_laporan`
--
ALTER TABLE `kapasitas_laporan`
  ADD PRIMARY KEY (`id_kapasitas`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

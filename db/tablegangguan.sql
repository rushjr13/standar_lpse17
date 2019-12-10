-- phpMyAdmin SQL Dump
-- version 4.9.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 06, 2019 at 03:31 AM
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
-- Table structure for table `gangguan`
--

CREATE TABLE `gangguan` (
  `id_gangguan` varchar(20) NOT NULL,
  `nama_pengguna` varchar(250) NOT NULL,
  `kontak_pengguna` varchar(25) NOT NULL,
  `media_pelaporan` enum('E-Mail','Telepon','SMS','Surat','Lainnya') NOT NULL,
  `tgl_pelaporan` date NOT NULL,
  `deskripsi_gangguan` text NOT NULL,
  `id_tipe` int(10) NOT NULL,
  `id_kategori` int(10) NOT NULL,
  `id_user` int(10) NOT NULL,
  `id_jenis` int(10) NOT NULL,
  `id_urgensi` int(10) NOT NULL,
  `id_dampak` int(10) NOT NULL,
  `id_prioritas` int(10) NOT NULL,
  `petugas_penanganan` varchar(150) NOT NULL,
  `status_penanganan` varchar(50) NOT NULL,
  `ket_penanganan` text NOT NULL,
  `tgl_penanganan` date NOT NULL,
  `solusi_penyelesaian` text NOT NULL,
  `tgl_penyelesaian` date NOT NULL,
  `status_konfirmasi` enum('Telah Diinformasikan','Belum Diinformasikan','','') NOT NULL,
  `status_gangguan` enum('Tercatat','Penanganan','Penyelesaian','') NOT NULL,
  `file_gangguan` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `gangguan`
--

INSERT INTO `gangguan` (`id_gangguan`, `nama_pengguna`, `kontak_pengguna`, `media_pelaporan`, `tgl_pelaporan`, `deskripsi_gangguan`, `id_tipe`, `id_kategori`, `id_user`, `id_jenis`, `id_urgensi`, `id_dampak`, `id_prioritas`, `petugas_penanganan`, `status_penanganan`, `ket_penanganan`, `tgl_penanganan`, `solusi_penyelesaian`, `tgl_penyelesaian`, `status_konfirmasi`, `status_gangguan`, `file_gangguan`) VALUES
('GG1575356899', 'PT. Alliessan', '', 'E-Mail', '2019-12-03', 'Penyedia tidak dapat melakukan recovery password karena mail server sedang dalam maintenance', 2, 1, 2, 2, 1, 2, 2, 'TM', 'T', 'Eskalasi ke LKPP', '2019-12-04', 'Telah difasilitasi perbaikan oleh LKPP', '2019-12-05', 'Telah Diinformasikan', 'Penyelesaian', '');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `gangguan`
--
ALTER TABLE `gangguan`
  ADD PRIMARY KEY (`id_gangguan`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

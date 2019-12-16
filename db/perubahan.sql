-- phpMyAdmin SQL Dump
-- version 4.9.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 11, 2019 at 08:18 AM
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
-- Table structure for table `perubahan`
--

CREATE TABLE `perubahan` (
  `id_perubahan` varchar(20) NOT NULL,
  `tgl_permohonanperubahan` date NOT NULL,
  `nama_pemohon` varchar(150) NOT NULL,
  `kontak_pemohon` varchar(25) NOT NULL,
  `instansi_pemohon` varchar(255) NOT NULL,
  `deskripsi_perubahan` text NOT NULL,
  `tgl_berlakuperubahan` date NOT NULL,
  `mt_perubahan` text NOT NULL,
  `jenis_perubahan` text DEFAULT NULL,
  `kategori_perubahan` enum('Emergency','Normal') DEFAULT NULL,
  `dampak_lingkungan` text DEFAULT NULL,
  `sumber` text DEFAULT NULL,
  `deskripsi_ujicoba` text DEFAULT NULL,
  `deskripsi_rollback` text DEFAULT NULL,
  `status_permintaan` enum('Setuju','Tidak Setuju') DEFAULT NULL,
  `ket_statuspermintaan` text DEFAULT NULL,
  `jadwal_perubahan` date NOT NULL,
  `petugas_implementasi` varchar(255) DEFAULT NULL,
  `test_perubahan` text DEFAULT NULL,
  `implementasi_perubahan` text DEFAULT NULL,
  `tgl_implementasi` date NOT NULL,
  `status_perubahan` enum('Tercatat','Evaluasi','Persetujuan','Implementasi') NOT NULL,
  `pengelola_perubahan` varchar(150) NOT NULL,
  `tgl_update` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `perubahan`
--

INSERT INTO `perubahan` (`id_perubahan`, `tgl_permohonanperubahan`, `nama_pemohon`, `kontak_pemohon`, `instansi_pemohon`, `deskripsi_perubahan`, `tgl_berlakuperubahan`, `mt_perubahan`, `jenis_perubahan`, `kategori_perubahan`, `dampak_lingkungan`, `sumber`, `deskripsi_ujicoba`, `deskripsi_rollback`, `status_permintaan`, `ket_statuspermintaan`, `jadwal_perubahan`, `petugas_implementasi`, `test_perubahan`, `implementasi_perubahan`, `tgl_implementasi`, `status_perubahan`, `pengelola_perubahan`, `tgl_update`) VALUES
('UB1576041329', '2019-12-04', 'Rahmanto Gani, ST', '0852', 'Biro Pengadaan Setda Provinsi Gorontalo', 'Permohonan Migrasi Server dan Instalasi SPSE versi 4 dan latihannya', '2019-12-04', 'Server yang digunakan saat ini tidak lagi berfungsi secara normal', 'Aplikasi, Infrastruktur', 'Emergency', 'Mempengaruhi kinerja pengguna', 'Software, Hardware', 'Sering terjadi error', '-', NULL, NULL, '2019-12-11', NULL, NULL, NULL, '2019-12-11', 'Evaluasi', 'Administrator', 1576048506);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `perubahan`
--
ALTER TABLE `perubahan`
  ADD PRIMARY KEY (`id_perubahan`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

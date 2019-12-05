-- phpMyAdmin SQL Dump
-- version 4.9.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 05, 2019 at 04:26 AM
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
-- Table structure for table `akses_menu`
--

CREATE TABLE `akses_menu` (
  `id_am` int(10) NOT NULL,
  `username` varchar(255) NOT NULL,
  `id_menu` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `akses_menu`
--

INSERT INTO `akses_menu` (`id_am`, `username`, `id_menu`) VALUES
(1568620426, 'admin', '1568618910'),
(1568620428, 'admin', '1568618926'),
(1568620431, 'admin', '1568618936'),
(1568620433, 'admin', '1568618967'),
(1568620434, 'admin', '1568618946'),
(1568620436, 'admin', '1568618956'),
(1568620438, 'admin', '1568618995'),
(1568620441, 'admin', '1568618985'),
(1568620443, 'admin', '1568618976'),
(1568620444, 'admin', '1568619012'),
(1568620446, 'admin', '1568619004'),
(1568620448, 'admin', '1568619019'),
(1568620449, 'admin', '1568619073'),
(1568620450, 'admin', '1568619036'),
(1568620451, 'admin', '1568619052'),
(1568620453, 'admin', '1568619029'),
(1568620454, 'admin', '1568619060');

-- --------------------------------------------------------

--
-- Table structure for table `aset_fisik`
--

CREATE TABLE `aset_fisik` (
  `idf` varchar(15) NOT NULL,
  `nama` varchar(255) NOT NULL,
  `id_klasifikasiaset` int(11) NOT NULL,
  `id_jenisaset` int(11) NOT NULL,
  `spesifikasi` text NOT NULL,
  `pemilik` varchar(255) NOT NULL,
  `penyedia` varchar(255) NOT NULL,
  `pemegang` varchar(255) NOT NULL,
  `lokasi` varchar(255) NOT NULL,
  `berlaku` date NOT NULL,
  `kerahasiaan` enum('1','2','3','') NOT NULL,
  `integritas` enum('1','2','3','') NOT NULL,
  `ketersediaan` enum('1','2','3','') NOT NULL,
  `keterangan` varchar(255) NOT NULL,
  `username` varchar(255) NOT NULL,
  `tgl_update` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `aset_fisik`
--

INSERT INTO `aset_fisik` (`idf`, `nama`, `id_klasifikasiaset`, `id_jenisaset`, `spesifikasi`, `pemilik`, `penyedia`, `pemegang`, `lokasi`, `berlaku`, `kerahasiaan`, `integritas`, `ketersediaan`, `keterangan`, `username`, `tgl_update`) VALUES
('F1569815670', 'Hardisk External', 1, 1, '1 TB', 'Kepala LPSE', 'CV. Angin Media', 'Arsad Abas', 'Ruang Verifikasi', '2019-09-05', '3', '3', '3', '', 'admin', 1569815698),
('F1569896299', 'Laptop', 2, 2, 'HP 6520s, XP Prof, Cote 2 Duo  Cache, (1,8Ghz) 800 Mhz FSB, 2 MB L2 IGBM, 667 DDR2, 120 GB (5400 RPM 1280x800 max res, VCA Intel GMA X3100 upto 384 shared), Integmted or PCMCIA Ethemet l0/100/1000, RI45, 16-bits, built in two speakers and microphone, Universal power 110-220v.', 'Kepala LPSE', 'CV. Angin Media', 'Arsad Abas', 'Ruang Admin', '2019-10-01', '3', '3', '3', '', 'admin', 1569896368),
('F1569899790', 'Power Disaibution Unit ABBA', 3, 3, 'PDU for Server, 3x vertical PDU, EC 40A 220 VA, mounting bracket 19\" flat shelf mountin & 3x12 PDU', 'Kepala LPSE', 'PT. Bhinneka Jakarta', 'Arsad Abas', 'Ruang Server/Admin', '2019-10-01', '3', '3', '3', '', 'admin', 1569899837),
('F1569899901', 'UPS', 3, 4, 'UPS For Server APC, APCSUA22ooRmi2U, 1980 waus, 220vA,230v, Height 2U, Operating humidity 30-90%, Back up time at tull load 15,7 minutes halfload 5,2 minutes full load, Operating ternpemture 540oC.Software Powerchute business edition', 'Kepala LPSE', 'PT. Bhinneka Jakarta', 'Fanky Abas, S.Kom', 'Ruang Server/Admin', '2019-10-01', '3', '3', '3', '', 'admin', 1569899969);

-- --------------------------------------------------------

--
-- Table structure for table `aset_informasi`
--

CREATE TABLE `aset_informasi` (
  `id` varchar(15) NOT NULL,
  `nama` varchar(255) NOT NULL,
  `klasifikasi` varchar(255) NOT NULL,
  `format` varchar(255) NOT NULL,
  `pemilik` varchar(255) NOT NULL,
  `berlaku` varchar(255) NOT NULL,
  `kerahasiaan` enum('1','2','3','') NOT NULL,
  `integritas` enum('1','2','3','') NOT NULL,
  `ketersediaan` enum('1','2','3','') NOT NULL,
  `keterangan` varchar(255) NOT NULL,
  `username` varchar(255) NOT NULL,
  `tgl_update` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `aset_informasi`
--

INSERT INTO `aset_informasi` (`id`, `nama`, `klasifikasi`, `format`, `pemilik`, `berlaku`, `kerahasiaan`, `integritas`, `ketersediaan`, `keterangan`, `username`, `tgl_update`) VALUES
('i1568860821', 'Pencatatan Permasalahan', 'Dokumen Tertulis Internal', 'Dokumen Elektronik', 'Unit Pelatihan dan Helpdesk', '-', '2', '2', '3', '', 'admin', 1568862259);

-- --------------------------------------------------------

--
-- Table structure for table `aset_intangible`
--

CREATE TABLE `aset_intangible` (
  `idi` varchar(15) NOT NULL,
  `nama` varchar(255) NOT NULL,
  `klasifikasi` varchar(255) NOT NULL,
  `pemilik` varchar(255) NOT NULL,
  `kerahasiaan` enum('1','2','3','') NOT NULL,
  `integritas` enum('1','2','3','') NOT NULL,
  `ketersediaan` enum('1','2','3','') NOT NULL,
  `keterangan` varchar(255) NOT NULL,
  `username` varchar(255) NOT NULL,
  `tgl_update` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `aset_intangible`
--

INSERT INTO `aset_intangible` (`idi`, `nama`, `klasifikasi`, `pemilik`, `kerahasiaan`, `integritas`, `ketersediaan`, `keterangan`, `username`, `tgl_update`) VALUES
('IT1569992822', 'Kualitas Penyelesaian Masalah', 'Layanan-Layanan', 'Unit Pelatihan dan Helpdesk', '1', '3', '2', '', 'admin', 1569992942);

-- --------------------------------------------------------

--
-- Table structure for table `aset_integritas`
--

CREATE TABLE `aset_integritas` (
  `id_integritas` int(1) NOT NULL,
  `nama_integritas` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `aset_integritas`
--

INSERT INTO `aset_integritas` (`id_integritas`, `nama_integritas`) VALUES
(1, 'Rendah'),
(2, 'Sedang'),
(3, 'Tinggi');

-- --------------------------------------------------------

--
-- Table structure for table `aset_kerahasiaan`
--

CREATE TABLE `aset_kerahasiaan` (
  `id_rahasia` int(1) NOT NULL,
  `nama_rahasia` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `aset_kerahasiaan`
--

INSERT INTO `aset_kerahasiaan` (`id_rahasia`, `nama_rahasia`) VALUES
(1, 'Rendah'),
(2, 'Sedang'),
(3, 'Tinggi');

-- --------------------------------------------------------

--
-- Table structure for table `aset_ketersediaan`
--

CREATE TABLE `aset_ketersediaan` (
  `id_sedia` int(1) NOT NULL,
  `nama_sedia` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `aset_ketersediaan`
--

INSERT INTO `aset_ketersediaan` (`id_sedia`, `nama_sedia`) VALUES
(1, 'Rendah'),
(2, 'Sedang'),
(3, 'Tinggi');

-- --------------------------------------------------------

--
-- Table structure for table `aset_layanan`
--

CREATE TABLE `aset_layanan` (
  `idl` varchar(15) NOT NULL,
  `nama` varchar(255) NOT NULL,
  `klasifikasi` varchar(255) NOT NULL,
  `pemilik` varchar(255) NOT NULL,
  `pemegang` varchar(255) NOT NULL,
  `penyedia` varchar(255) NOT NULL,
  `kontrak_no` varchar(255) NOT NULL,
  `kontrak_deskripsi` varchar(255) NOT NULL,
  `kontrak_berlaku` date NOT NULL,
  `kerahasiaan` enum('1','2','3','') NOT NULL,
  `integritas` enum('1','2','3','') NOT NULL,
  `ketersediaan` enum('1','2','3','') NOT NULL,
  `keterangan` varchar(255) NOT NULL,
  `username` varchar(255) NOT NULL,
  `tgl_update` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `aset_layanan`
--

INSERT INTO `aset_layanan` (`idl`, `nama`, `klasifikasi`, `pemilik`, `pemegang`, `penyedia`, `kontrak_no`, `kontrak_deskripsi`, `kontrak_berlaku`, `kerahasiaan`, `integritas`, `ketersediaan`, `keterangan`, `username`, `tgl_update`) VALUES
('LY1569988223', 'Jaringan Internet Utama', 'Jaringan Internet Khusus', 'Kepala LPSE', 'Administrator System', 'PT. Telkom Indonesia', '-', 'Uptime 100 %', '2019-10-02', '1', '2', '3', 'Astinet', 'admin', 1569989317);

-- --------------------------------------------------------

--
-- Table structure for table `aset_sdm`
--

CREATE TABLE `aset_sdm` (
  `id` varchar(15) NOT NULL,
  `nama` varchar(255) NOT NULL,
  `klasifikasi` varchar(255) NOT NULL,
  `identitas` varchar(255) NOT NULL,
  `pemilik_fungsi` varchar(255) NOT NULL,
  `pemilik_subfungsi` varchar(255) NOT NULL,
  `pemilik_unit` varchar(255) NOT NULL,
  `jabatan` varchar(255) NOT NULL,
  `kontrak` varchar(255) NOT NULL,
  `atasan` varchar(255) NOT NULL,
  `kerahasiaan` enum('1','2','3','') NOT NULL,
  `integritas` enum('1','2','3','') NOT NULL,
  `ketersediaan` enum('1','2','3','') NOT NULL,
  `keterangan` varchar(255) NOT NULL,
  `username` varchar(255) NOT NULL,
  `tgl_update` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `aset_sdm`
--

INSERT INTO `aset_sdm` (`id`, `nama`, `klasifikasi`, `identitas`, `pemilik_fungsi`, `pemilik_subfungsi`, `pemilik_unit`, `jabatan`, `kontrak`, `atasan`, `kerahasiaan`, `integritas`, `ketersediaan`, `keterangan`, `username`, `tgl_update`) VALUES
('SDM1568869444', 'Rahmanto Gani, ST', 'Pegawai Tetap', '19790929 200802 1 002', 'Admin PPE', 'Trainer', 'Unit Pelatihan dan Admin PPE', 'Kasubag LPSE', '56/03/II/2015', 'Kepala LPSE', '2', '3', '3', '', 'admin', 1568870673),
('SDM1568870673', 'Helmy Lacuba, S.Kom', 'Pegawai Tetap', '19800515 200801 1 031', 'Admin Agency', 'Resepsionis', 'Unit Pelatihan dan Helpdesk', 'Staf LPSE', '56/03/II/2015', 'Kasubag LPSE/Admin PPE', '2', '3', '3', '', 'admin', 1568870806),
('SDM1568870806', 'Ika Apriliani Isa, S.Kom', 'Pegawai Tetap', '19800402 200501 2 017', 'Verifikator', 'Helpdesk', 'Unit Pelatihan dan Helpdesk', 'Staf LPSE', '56/03/II/2015', 'Kasubag LPSE/Admin PPE', '2', '3', '3', '', 'admin', 1568871344),
('SDM1568871364', 'Yenny Kaluku, S.Kom', 'Pegawai Tetap', '19741028 201001 2 002', 'Verifikator', 'Helpdesk', 'Unit Pelatihan dan Helpdesk', 'Staf LPSE', '56/03/II/2015', 'Kasubag LPSE/Admin PPE', '2', '3', '3', '', 'admin', 1568871496),
('SDM1568871496', 'Arsad Abas', 'Pegawai Tetap', '19800521 200212 1 003', 'Tim TI dan Komunikasi, Administrator Sistem', 'Koordinator Keamanan Informasi', 'Unit Admin', 'Staf LPSE', '56/03/II/2015', 'Kasubag LPSE/Admin PPE', '3', '3', '3', '', 'admin', 1569816626),
('SDM1568871611', 'Fanky Abas, S.Kom', 'Pegawai Tidak Tetap', '-', 'Tim TI dan Komunikasi, Administrator Sistem', '-', 'Unit Admin', 'Staf LPSE', '56/03/II/2015', 'Kasubag LPSE/Admin PPE', '3', '3', '3', '', 'admin', 1568871707),
('SDM1568871787', 'Aminuddin Hasan', 'Pegawai Tidak Tetap', '-', 'Tim TI dan Komunikasi, Administrator Sistem', 'Admin Genset dan UPS LPSE', 'Unit Admin', 'Staf LPSE', '56/03/II/2015', 'Kasubag LPSE/Admin PPE', '3', '3', '3', '', 'admin', 1568871911),
('SDM1568871911', 'Berly M. Lasulika', 'Pegawai Tetap', '19791013 200604 2 016', 'Helpdesk', 'Trainer', 'Unit Pelatihan dan Admin PPE', 'Staf LPSE', '56/03/II/2015', 'Kasubag LPSE/Admin PPE', '2', '3', '3', '', 'admin', 1568872054);

-- --------------------------------------------------------

--
-- Table structure for table `aset_sk`
--

CREATE TABLE `aset_sk` (
  `id` varchar(15) NOT NULL,
  `nomor` varchar(255) NOT NULL,
  `tanggal` date NOT NULL,
  `nama` varchar(255) NOT NULL,
  `tentang` varchar(255) NOT NULL,
  `berlaku` date NOT NULL,
  `berakhir` date NOT NULL,
  `file` varchar(255) NOT NULL,
  `username` varchar(255) NOT NULL,
  `tgl_update` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `aset_sk`
--

INSERT INTO `aset_sk` (`id`, `nomor`, `tanggal`, `nama`, `tentang`, `berlaku`, `berakhir`, `file`, `username`, `tgl_update`) VALUES
('SK1570001916', '12', '2019-10-02', 'SK Kepala LPSE Provinsi Gorontalo', 'Koordinator dan Pengelola Aset Layanan', '2019-10-03', '2019-10-31', 'std_3_sop_pengelolaan_aset_LPSE_Prov__Gorontalo.pdf', 'admin', 1570667724);

-- --------------------------------------------------------

--
-- Table structure for table `aset_software`
--

CREATE TABLE `aset_software` (
  `ids` varchar(15) NOT NULL,
  `nama` varchar(255) NOT NULL,
  `klasifikasi` varchar(255) NOT NULL,
  `pemilik` varchar(255) NOT NULL,
  `pemegang` varchar(255) NOT NULL,
  `lokasi` varchar(255) NOT NULL,
  `berlaku` date NOT NULL,
  `hapus` varchar(255) NOT NULL,
  `kerahasiaan` enum('1','2','3','') NOT NULL,
  `integritas` enum('1','2','3','') NOT NULL,
  `ketersediaan` enum('1','2','3','') NOT NULL,
  `keterangan` varchar(255) NOT NULL,
  `username` varchar(255) NOT NULL,
  `tgl_update` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `aset_software`
--

INSERT INTO `aset_software` (`ids`, `nama`, `klasifikasi`, `pemilik`, `pemegang`, `lokasi`, `berlaku`, `hapus`, `kerahasiaan`, `integritas`, `ketersediaan`, `keterangan`, `username`, `tgl_update`) VALUES
('SW1569908399', 'Windows 7', 'Operating System', 'Kepala LPSE', 'Dr. Wahyudin A. Katili, S.STP, MT', 'Laptop Helpdesk', '2019-10-01', 'Delete Normal', '1', '2', '3', '', 'admin', 1569909324);

-- --------------------------------------------------------

--
-- Table structure for table `aset_sop`
--

CREATE TABLE `aset_sop` (
  `id` varchar(10) NOT NULL,
  `nama` varchar(255) NOT NULL,
  `isi` text NOT NULL,
  `tabel` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `aset_sop`
--

INSERT INTO `aset_sop` (`id`, `nama`, `isi`, `tabel`) VALUES
('1568774849', 'Informasi', '<p>Aset Informasi dikelola dengan cara didaftarkan dengan menggunakan daftar yang terus diperbaharui, adapun isi daftar aset informasi sebagai berikut ini :</p>\r\n\r\n<ol>\r\n	<li style=\"text-align:justify\"><strong>Kode</strong>, adalah kode identifikasi aset informasi yang dapat diisi dengan <u>nomor urut</u> atau dengan <u>gabungan huruf dan angka</u>;</li>\r\n	<li style=\"text-align:justify\"><strong>Nama Aset</strong>, adalah nama dari aset informasi;</li>\r\n	<li style=\"text-align:justify\"><strong>Sub Klasifikasi</strong>, merupakan pengelompokan aset informasi, yang memiliki sifat, ciri atau jenis yang serupa untuk memudahkan dalam pengelolaan risiko;</li>\r\n	<li style=\"text-align:justify\"><strong>Format Penyimpanan</strong>, merupakan informasi bagaimana aset tersebut disimpan;</li>\r\n	<li style=\"text-align:justify\"><strong>Pemilik Aset</strong>, merupakan pihak yang bertanggung jawab terhadap aset informasi dan bertanggung jawab dalam penentuan nilai dan risiko dari aset tersebut;</li>\r\n	<li style=\"text-align:justify\"><strong>Masa Berlaku</strong>, merupakan rentang waktu atau batas akhir aset informasi digunakan;</li>\r\n	<li style=\"text-align:justify\">Klasifikasi Keamanan Informasi :\r\n	<ol style=\"list-style-type:lower-alpha\">\r\n		<li style=\"text-align:justify\"><strong>Kerahasiaan</strong>, adalah tingkat kerahasian dari aset informasi yang direpresentasikan dalam angka (rendah=1; sedang=2; tinggi=3), misalnya apakah aset tersebut boleh diketahui umum atau tidak;</li>\r\n		<li style=\"text-align:justify\"><strong>Integritas</strong>, adalah tingkat keakurasian dan ketepatan (integritas) dari aset informasi yang direpresentasikan dalam angka (rendah=1; sedang=2; tinggi=3). misalnya daftar gaji, tingkat keakurasian dan ketepatan penggolongan atau pemberian isi dari gaji tidak boleh dapat diubah sembarangan oleh orang yang tidak berhak;</li>\r\n		<li style=\"text-align:justify\"><strong>Ketersediaan</strong>, adalah tingkat kebutuhan akan ketersediaan dari aset informasi yang direpresentasikan dalam angka (rendah=1; sedang=2; tinggi=3), misalnya data yang sering dipergunakan maka memiliki tingkat ketersediaan lebih tinggi dibandingkan data yang diakses hanya setahun sekali;</li>\r\n	</ol>\r\n	</li>\r\n	<li style=\"text-align:justify\"><strong>Nilai Aset Informasi</strong>, merupakan nilai dari aset informasi terhadap ketiga aspek (kerahasiaan, integritas dan ketersediaan) yang didapatkan dengan merata-ratakan nilai ketiganya;</li>\r\n	<li style=\"text-align:justify\"><strong>Keterangan </strong>merupakan status/informasi tambahan atas aset informasi.</li>\r\n</ol>\r\n', 'aset_informasi'),
('1568775826', 'Sumber Daya Manusia (SDM)', '<p>Aset Orang dikelola dengan cara didaftarkan dengan menggunakan daftar yang terus diperbaharui, adapun isi daftar aset orang sebagai berikut:</p>\r\n\r\n<ol>\r\n	<li style=\"text-align:justify\"><strong>Kode</strong>, adalah kode identifikasi aset yang dapat diisi dengan nomor urut atau dengan gabungan huruf dan angka;</li>\r\n	<li style=\"text-align:justify\"><strong>Nama Aset</strong>, adalah nama dari personil LPSE yang dimasukkan sebagai aset;</li>\r\n	<li style=\"text-align:justify\"><strong>Sub Klasifikasi</strong>, merupakan pengelompokan aset informasi, yang memiliki sifat, ciri atau jenis yang serupa untuk memudahkan dalam pengelolaan risiko, misalnya: <u>Pengambil Keputusan, Pegawai Tetap, Pegawai Tidak Tetap</u>, dll;</li>\r\n	<li style=\"text-align:justify\"><strong>No. Identitas/NIP</strong>, merupakan nomor identitas personil LPSE yang dimasukkan sebagai aset;</li>\r\n	<li style=\"text-align:justify\"><strong>Pemilik Aset</strong>, merupakan bagian dari struktur organisasi tempat personil LPSE yang dimasukkan sebagai aset bekerja, setiap aset harus diberi keterangan fungsinya, sub-fungsi (jika ada) dan unit kerjanya;</li>\r\n	<li style=\"text-align:justify\"><strong>Jabatan</strong>, merupakan posisi/kedudukan dari pegawai yang dimasukkan sebagai aset;</li>\r\n	<li style=\"text-align:justify\"><strong>No. Kontrak/NDA</strong> (<em>Non-Disclosure Agreement</em>), adalah nomor kontrak bagi personil LPSE yang bekerja berdasarkan kontrak kerja dengan organisasi dan atau nomor perjanjian penjagaan kerahasiaan (NDA);</li>\r\n	<li style=\"text-align:justify\"><strong>Atasan Langsung</strong>, merupakan posisi/jabatan tepat di atas SDM sebagai personil LPSE dimaksud, dimana hasil pekerjaan disampaikan/dilaporkan kepadanya.</li>\r\n	<li style=\"text-align:justify\">Klasifikasi Keamanan Informasi:\r\n	<ol style=\"list-style-type:lower-alpha\">\r\n		<li style=\"text-align:justify\"><strong>Kerahasiaan</strong>, adalah tingkat kerahasian dari aset SDM yang direpresentasikan dalam angka (rendah=1; sedang=2; tinggi=3), misalnya admin system yang memiliki akses kepada system lebih tinggi nilai kerahasiaannya dari pada helpdesk yang bertugas melayani pengguna;</li>\r\n		<li style=\"text-align:justify\"><strong>Integritas</strong>, adalah tingkat kebutuhan integritas dari aset SDM yang direpresentasikan dalam angka (rendah=1; sedang=2; tinggi=3), misalnya verifikator yang melakukan verifikasi pendaftaran pengguna lebih tinggi kebutuhan integritasnya dari pada pelatih (trainer) aplikasi;</li>\r\n		<li style=\"text-align:justify\"><strong>Ketersediaan</strong>, adalah tingkat kebutuhan ketersediaan dari aset SDM yang direpresentasikan dalam angka (rendah=1; sedang=2; tinggi=3), misalnya helpdesk yang melayani pengguna lebih tinggi kebutuhan ketersediaannya dibandingkan dengan pelatih (trainer).</li>\r\n	</ol>\r\n	</li>\r\n	<li style=\"text-align:justify\"><strong>Nilai</strong>, merupakan nilai dari aset SDM terhadap ketiga aspek (kerahasiaan, integritas dan ketersediaan) yang didapatkan dengan merata-ratakan nilai ketiganya;</li>\r\n	<li style=\"text-align:justify\"><strong>Keterangan</strong> merupakan status/informasi tambahan atas aset SDM.</li>\r\n</ol>\r\n', 'aset_sdm'),
('1568776152', 'Fisik', '<p>Aset Fisik dikelola dengan cara didaftarkan dengan menggunakan daftar yang terus diperbaharui, adapun isi daftar aset fisik sebagai berikut :</p>\r\n\r\n<ol>\r\n	<li style=\"text-align:justify\"><strong>Nomor Aset Kode</strong>, adalah kode identifikasi aset fisik yang dapat diisi dengan <u>nomor urut</u> atau dengan <u>gabungan huruf dan angka</u>;</li>\r\n	<li style=\"text-align:justify\"><strong>Nama Aset</strong>, adalah nama dari aset fisik;</li>\r\n	<li style=\"text-align:justify\"><strong>Sub Klasifikasi</strong>, merupakan pengelompokan aset fisik, yang memiliki sifat, ciri atau jenis yang serupa untuk memudahkan dalam pengelolaan risiko, misalnya: <u>Perangkat Server, Terminal Pengguna, Perangkat Pendukung Elektronik, Perangkat Pendukung Non-Elektronik</u>, dll;</li>\r\n	<li style=\"text-align:justify\"><strong>Jenis Aset</strong>, merupakan jenis dari aset fisik, misal <u>Server, Media Penyimpanan, Komputer Kerja</u>, dll;</li>\r\n	<li style=\"text-align:justify\"><strong>Spesifikasi</strong> merupakan informasi teknis dari aset fisik;</li>\r\n	<li style=\"text-align:justify\"><strong>Pemilik Aset</strong>, merupakan pihak yang bertanggung jawab terhadap aset fisik dan bertanggung jawab dalam penentuan nilai dan risiko dari aset tersebut;</li>\r\n	<li style=\"text-align:justify\"><strong>Penyedia Aset</strong>, merupakan nama pihak yang menyediakan aset fisik;</li>\r\n	<li style=\"text-align:justify\"><strong>Pemegang Aset</strong>, merupakan nama pegawai yang diberi wewenang untuk membawa atau menggunakan aset fisik, misalnya <u>pegawai yang ditugaskan untuk menyimpan media backup</u>;</li>\r\n	<li style=\"text-align:justify\"><strong>Lokasi Aset</strong>, merupakan nama tempat dimana aset fisik diletakkan;</li>\r\n	<li style=\"text-align:justify\"><strong>Masa Berlaku</strong>, merupakan informasi batasan masa berlaku penggunaan aset fisik (jika ada), misalnya masa berlaku Alat Pemadam Api Ringan (APAR)</li>\r\n	<li style=\"text-align:justify\">Klasifikasi Keamanan Informasi:\r\n	<ol style=\"list-style-type:lower-alpha\">\r\n		<li style=\"text-align:justify\"><strong>Kerahasiaan</strong>, adalah tingkat kerahasian dari aset fisik yang direpresentasikan dalam angka (rendah=1; sedang=2; tinggi=3), misalnya lemari brankas (safe deposit box) yang memiliki tingkat kerahasiaan lebih tinggi dibandingkan dengan lemari perpustakaan;</li>\r\n		<li style=\"text-align:justify\"><strong>Integritas</strong>, adalah tingkat keakurasian dan ketepatan (integritas) dari aset fisik yang direpresentasikan dalam angka (rendah=1; sedang=2; tinggi=3), misalnya kabel-kabel yang harus diamankan dari gangguan kerusakan memiliki nilai integritas yang tinggi dibandingkan dengan aset fisik habis pakai;</li>\r\n		<li style=\"text-align:justify\"><strong>Ketersediaan</strong>, adalah tingkat kebutuhan akan ketersediaan dari aset fisik yang direpresentasikan dalam angka (rendah=1; sedang=2; tinggi=3), misalnya kebutuhan ketersediaan komputer kerja admin system yang lebih tinggi dibandingkan dengan komputer diruangan pelatihan;</li>\r\n	</ol>\r\n	</li>\r\n	<li style=\"text-align:justify\"><strong>Nilai Aset Fisik</strong> merupakan nilai dari aset fisik terhadap ketiga aspek (kerahasiaan, integritas dan ketersediaan) yang didapatkan dengan merata-ratakan nilai ketiganya;</li>\r\n	<li style=\"text-align:justify\"><strong>Keterangan</strong> merupakan status/informasi tambahan atas aset fisik.</li>\r\n</ol>\r\n', 'aset_fisik'),
('1568776450', 'Software', '<p>Aset Software Perangkat Lunak dikelola dengan cara didaftarkan dengan menggunakan daftar yang terus diperbaharui, adapun isi daftar aset software perangkat lunak sebagai berikut :</p>\r\n\r\n<ol>\r\n	<li style=\"text-align:justify\"><strong>Nomor Aset Kode</strong>, adalah kode identifikasi aset software perangkat lunak yang dapat diisi dengan <u>nomor urut</u> atau dengan <u>gabungan huruf dan angka</u>;</li>\r\n	<li style=\"text-align:justify\"><strong>Nama Aset</strong>, adalah nama dari aset software perangkat lunak;</li>\r\n	<li style=\"text-align:justify\"><strong>Sub Klasifikasi</strong>, merupakan pengelompokan aset software, yang memiliki sifat, ciri atau jenis yang serupa untuk memudahkan dalam pengelolaan risiko, misalnya: <u>Operating System, Aplikasi Pendukung Helpdesk, Aplikasi Perkantoran</u>, dll;</li>\r\n	<li style=\"text-align:justify\"><strong>Pemilik Aset</strong>, merupakan pihak yang bertanggung jawab terhadap aset software dan bertanggung jawab dalam penentuan nilai dan risiko dari aset tersebut;</li>\r\n	<li style=\"text-align:justify\"><strong>Pemegang Aset</strong>, merupakan nama pegawai yang diberi wewenang untuk membawa atau menggunakan aset software;</li>\r\n	<li style=\"text-align:justify\"><strong>Lokasi Aset</strong>, merupakan nama tempat dimana aset software diletakkan atau diinstall;</li>\r\n	<li style=\"text-align:justify\"><strong>Masa Berlaku</strong>, merupakan informasi batasan masa berlaku penggunaan aset software (jika ada), misalnya masa berlaku lisensi aplikasi perkantoran.</li>\r\n	<li style=\"text-align:justify\"><strong>Metode Penghapusan</strong>, merupakan cara/mekanisme penghapusan aset software, informasi ini erat kaitannya dengan keamanan informasi yang melekat pada aset software tersebut;</li>\r\n	<li style=\"text-align:justify\"><strong>Kerahasiaan</strong>, adalah tingkat kerahasian dari aset software yang direpresentasikan dalam angka (rendah=1; sedang=2; tinggi=3);</li>\r\n	<li style=\"text-align:justify\"><strong>Integritas</strong>, adalah tingkat keakurasian dan ketepatan (integritas) dari aset software yang direpresentasikan dalam angka (rendah=1; sedang=2; tinggi=3), misalnya kebutuhan integritas aplikasi email client lebih tinggi daripada aplikasi internet browser;</li>\r\n	<li style=\"text-align:justify\"><strong>Ketersediaan</strong>, adalah tingkat kebutuhan akan ketersediaan dari aset software yang direpresentasikan dalam angka (rendah=1; sedang=2; tinggi=3), misalnya kebutuhan ketersediaan aplikasi perkantoran lebih tinggi dibandingkan dengan aplikasi pendukung layanan (trouble ticketing system, dll);</li>\r\n	<li style=\"text-align:justify\"><strong>Nilai Aset Software</strong>, merupakan nilai dari aset software terhadap ketiga aspek (kerahasiaan, integritas dan ketersediaan) yang didapatkan dengan merata-ratakan nilai ketiganya;</li>\r\n	<li style=\"text-align:justify\"><strong>Keterangan</strong> merupakan status/informasi tambahan atas aset software.</li>\r\n</ol>\r\n', 'aset_software'),
('1568776664', 'Layanan', '<p>Aset Layanan dikelola dengan cara didaftarkan dengan menggunakan daftar yang terus diperbaharui, adapun isi daftar aset layanan sebagai berikut :</p>\r\n\r\n<ol>\r\n	<li style=\"text-align:justify\"><strong>Nomor Aset</strong>, adalah kode identifikasi aset layanan yang dapat diisi dengan <u>nomor urut</u> atau dengan <u>gabungan huruf dan angka</u>;</li>\r\n	<li style=\"text-align:justify\"><strong>Nama Aset</strong>, adalah nama dari aset layanan;</li>\r\n	<li style=\"text-align:justify\"><strong>Sub Klasifikasi</strong>, merupakan pengelompokan aset layanan, yang memiliki sifat, ciri atau jenis yang serupa untuk memudahkan dalam pengelolaan risiko, misalnya: <u>Jaringan Internet, Layanan Pendukung</u>, dll;</li>\r\n	<li style=\"text-align:justify\"><strong>Pemilik Aset</strong>, merupakan pihak yang bertanggung jawab terhadap aset layanan dan bertanggung jawab dalam penentuan nilai dan risiko dari aset tersebut;</li>\r\n	<li style=\"text-align:justify\"><strong>Pemegang Aset</strong>, merupakan unit atau pegawai yang diberi wewenang untuk penggunaan aset layanan, misalnya layanan internet dipegang oleh tim IT Operation;</li>\r\n	<li style=\"text-align:justify\"><strong>Penyedia Aset</strong>, merupakan nama pihak yang menyediakan aset layanan;</li>\r\n	<li style=\"text-align:justify\"><strong>No. Kontrak/SLA</strong> (<em>Service Level Agreement</em>), adalah nomor kontrak kerja pemberi layanan dan atau nomor perjanjian tingkat layanan (SLA);</li>\r\n	<li style=\"text-align:justify\"><strong>Deskripsi</strong>, merupakan penjelasan singkat atas isi dokumen kontrak atau SLA;</li>\r\n	<li style=\"text-align:justify\"><strong>Masa Berlaku</strong>, merupakan batasan waktu akhir atas berlakunya kontrak/SLA dengan pihak Penyedia Aset Layanan;</li>\r\n	<li style=\"text-align:justify\"><strong>Kerahasiaan</strong>, adalah tingkat kerahasian dari aset layanan yang direpresentasikan dalam angka (rendah=1; sedang=2; tinggi=3), misalnya layanan call centre yang dipihak ketigakan lebih tinggi nilai kerahasiannya untuk menjaga citra organisasi dibandingkan dengan layanan internet yang umumnya memang dipihak ketigakan;</li>\r\n	<li style=\"text-align:justify\"><strong>Integritas</strong>, adalah tingkat keakurasian dan ketepatan (integritas) dari aset layanan yang direpresentasikan dalam angka (rendah=1; sedang=2; tinggi=3), misalnya layanan call centre yang dipihak ketigakan lebih tinggi kebutuhan integritasnya dibandingkan dengan layanan pengelolaan air conditioner (AC);</li>\r\n	<li style=\"text-align:justify\"><strong>Ketersediaan</strong>, adalah tingkat kebutuhan akan ketersediaan dari aset layanan yang direpresentasikan dalam angka (rendah=1; sedang=2; tinggi=3), misalnya kebutuhan ketersediaan layanan internet untuk server lebih tinggi dibandingkan ketersediaan layanan internet untuk bidding room yang sudah terhubung ke server secara lokal;</li>\r\n	<li style=\"text-align:justify\"><strong>Nilai Aset Layanan</strong>, merupakan nilai dari aset layanan terhadap ketiga aspek (kerahasiaan, integritas dan ketersediaan) yang didapatkan dengan merata-ratakan nilai ketiganya;</li>\r\n	<li style=\"text-align:justify\"><strong>Keterangan</strong> merupakan status/informasi tambahan atas aset layanan.</li>\r\n</ol>\r\n', 'aset_layanan'),
('1568776864', 'Intangible', '<p>Aset Intangible dikelola dengan cara didaftarkan dengan menggunakan daftar yang terus diperbaharui, adapun isi daftar aset intangible sebagai berikut :</p>\r\n\r\n<ol>\r\n	<li style=\"text-align:justify\"><strong>Nomor Aset</strong>, adalah kode identifikasi aset intangible yang dapat diisi dengan <u>nomor urut</u> atau dengan <u>gabungan huruf dan angka</u>;</li>\r\n	<li style=\"text-align:justify\"><strong>Nama Aset</strong>, adalah nama dari aset intangible;</li>\r\n	<li style=\"text-align:justify\"><strong>Sub Klasifikasi</strong>, merupakan pengelompokan aset intangible, yang memiliki sifat, ciri atau jenis yang serupa untuk memudahkan dalam pengelolaan risiko, misalnya: <u>Citra Organisasi, Kualitas Layanan</u>, dll;</li>\r\n	<li style=\"text-align:justify\"><strong>Pemilik Aset</strong>, merupakan pihak yang bertanggung jawab terhadap aset intangible dan bertanggung jawab dalam penentuan nilai dan risiko dari aset tersebut;</li>\r\n	<li style=\"text-align:justify\"><strong>Kerahasiaan</strong>, adalah tingkat kerahasian dari aset intangible yang direpresentasikan dalam angka (rendah=1; sedang=2; tinggi=3), misalnya kenyamanan pegawai dalam bekerja lebih tinggi kerahasiaannya dibandingkan dengan penghargaan yang didapatkan dari LKPP sebagai LPSE terbaik;</li>\r\n	<li style=\"text-align:justify\"><strong>Integritas</strong>, adalah tingkat keakurasian dan ketepatan (integritas) dari aset intangible yang direpresentasikan dalam angka (rendah=1; sedang=2; tinggi=3), misalnya untuk mendapatkan penghargaan sebagai LPSE terbaik lagi ditahun yang akan datang, maka kualitas layanan tidak boleh menurun;</li>\r\n	<li style=\"text-align:justify\"><strong>Ketersediaan</strong>, adalah tingkat kebutuhan akan ketersediaan dari aset intangible yang direpresentasikan dalam angka (rendah=1; sedang=2; tinggi=3), misalnya kebutuhan kenyamanan pegawai dalam bekerja perlu ditingkatkan dibanding dengan kebutuhan mendapatkan penghargaan;</li>\r\n	<li style=\"text-align:justify\"><strong>Nilai Aset Intangible</strong>, merupakan nilai dari aset intangible terhadap ketiga aspek (kerahasiaan, integritas dan ketersediaan) yang didapatkan dengan merata-ratakan nilai ketiganya;</li>\r\n	<li style=\"text-align:justify\"><strong>Keterangan</strong> merupakan status/informasi tambahan atas aset intangible.</li>\r\n</ol>\r\n', 'aset_intangible'),
('istilah', 'Daftar Istilah', '<p>Aset adalah segala sesuatu yang berguna bagi organisasi, perusahaan, instansi atau lembaga. Aset terbagi menjadi beberapa dan umumnya diklasifikasikan sebagai berikut:</p>\r\n\r\n<table cellspacing=\"0\" class=\"table table-bordered border-dark\" id=\"dataTable\" style=\"width:100%\">\r\n	<thead>\r\n		<tr>\r\n			<th style=\"width:25%\">Klasifikasi Aset</th>\r\n			<th>Contoh</th>\r\n		</tr>\r\n	</thead>\r\n	<tbody>\r\n		<tr>\r\n			<td>Informasi</td>\r\n			<td>Basis Data (database) atau file, kontrak, perjanjian, dokumentasi sistem, dokumentasi hasil penelitian, buku petunjuk, bahan pelatihan, dokumen pendukung operasional, rencana kelangsungan bisnis, audit trail/log, dan informasi yang diarsipkan.</td>\r\n		</tr>\r\n		<tr>\r\n			<td>Sumber Daya Manusia</td>\r\n			<td>Kualifikasi, keterampilan, dan pengalaman.</td>\r\n		</tr>\r\n		<tr>\r\n			<td>Fisik</td>\r\n			<td>Peralatan komputer, peralatan komunikasi, removable media, dan peralatan lainnya.</td>\r\n		</tr>\r\n		<tr>\r\n			<td>Perangkat Lunak</td>\r\n			<td>Perangkat lunak aplikasi, perangkat lunak sistem, perangkat pengembangan, dan utilitas.</td>\r\n		</tr>\r\n		<tr>\r\n			<td>Layanan</td>\r\n			<td>Komputasi dan komunikasi, utilitas umum seperti penerangan, listrik, telepon, air, pelayanan genset, fotokopi.</td>\r\n		</tr>\r\n		<tr>\r\n			<td>Tak Berwujud (Intangible)</td>\r\n			<td>Reputasi dan citra organisasi, kualitas layanan.</td>\r\n		</tr>\r\n	</tbody>\r\n</table>\r\n', NULL);

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
  `tgl_penanganan` int(11) NOT NULL,
  `solusi_penyelesaian` text NOT NULL,
  `tgl_penyelesaian` int(11) NOT NULL,
  `status_konfirmasi` enum('Telah Diinformasikan','Belum Diinformasikan','','') NOT NULL,
  `status_gangguan` enum('Tercatat','Penanganan','Penyelesaian','') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `gangguan`
--

INSERT INTO `gangguan` (`id_gangguan`, `nama_pengguna`, `kontak_pengguna`, `media_pelaporan`, `tgl_pelaporan`, `deskripsi_gangguan`, `id_tipe`, `id_kategori`, `id_user`, `id_jenis`, `id_urgensi`, `id_dampak`, `id_prioritas`, `petugas_penanganan`, `status_penanganan`, `ket_penanganan`, `tgl_penanganan`, `solusi_penyelesaian`, `tgl_penyelesaian`, `status_konfirmasi`, `status_gangguan`) VALUES
('GG1575356899', 'PT. Alliessan', '', 'E-Mail', '2019-12-03', 'Penyedia tidak dapat melakukan recovery password karena mail server sedang dalam maintenance', 2, 1, 2, 2, 1, 2, 2, 'Admin', '-', '-', 1575357489, '-', 1575357489, 'Belum Diinformasikan', 'Tercatat');

-- --------------------------------------------------------

--
-- Table structure for table `gangguan_dampak`
--

CREATE TABLE `gangguan_dampak` (
  `id_dampak` int(11) NOT NULL,
  `kode_dampak` varchar(10) NOT NULL,
  `nama_dampak` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `gangguan_dampak`
--

INSERT INTO `gangguan_dampak` (`id_dampak`, `kode_dampak`, `nama_dampak`) VALUES
(1, 'K', 'Kecil'),
(2, 'S', 'Sedang'),
(3, 'B', 'Besar');

-- --------------------------------------------------------

--
-- Table structure for table `gangguan_jenis`
--

CREATE TABLE `gangguan_jenis` (
  `id_jenis` int(11) NOT NULL,
  `kode_jenis` varchar(10) NOT NULL,
  `nama_jenis` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `gangguan_jenis`
--

INSERT INTO `gangguan_jenis` (`id_jenis`, `kode_jenis`, `nama_jenis`) VALUES
(1, 'Hw', 'Hardware'),
(2, 'Sw', 'Software'),
(3, 'Ps', 'Prosedur'),
(4, 'L', 'Lainnya');

-- --------------------------------------------------------

--
-- Table structure for table `gangguan_kategori`
--

CREATE TABLE `gangguan_kategori` (
  `id_kategori` int(11) NOT NULL,
  `kode_kategori` varchar(10) NOT NULL,
  `nama_kategori` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `gangguan_kategori`
--

INSERT INTO `gangguan_kategori` (`id_kategori`, `kode_kategori`, `nama_kategori`) VALUES
(1, 'T', 'Teknis'),
(2, 'NT', 'Non Teknis');

-- --------------------------------------------------------

--
-- Table structure for table `gangguan_prioritas`
--

CREATE TABLE `gangguan_prioritas` (
  `id_prioritas` int(11) NOT NULL,
  `kode_prioritas` varchar(10) NOT NULL,
  `nama_prioritas` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `gangguan_prioritas`
--

INSERT INTO `gangguan_prioritas` (`id_prioritas`, `kode_prioritas`, `nama_prioritas`) VALUES
(1, 'R', 'Rendah'),
(2, 'M', 'Menengah'),
(3, 'T', 'Tinggi');

-- --------------------------------------------------------

--
-- Table structure for table `gangguan_tipe`
--

CREATE TABLE `gangguan_tipe` (
  `id_tipe` int(11) NOT NULL,
  `kode_tipe` varchar(10) NOT NULL,
  `nama_tipe` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `gangguan_tipe`
--

INSERT INTO `gangguan_tipe` (`id_tipe`, `kode_tipe`, `nama_tipe`) VALUES
(1, 'G', 'Gangguan'),
(2, 'M', 'Masalah'),
(3, 'PL', 'Permintaan Layanan');

-- --------------------------------------------------------

--
-- Table structure for table `gangguan_urgensi`
--

CREATE TABLE `gangguan_urgensi` (
  `id_urgensi` int(11) NOT NULL,
  `kode_urgensi` varchar(10) NOT NULL,
  `nama_urgensi` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `gangguan_urgensi`
--

INSERT INTO `gangguan_urgensi` (`id_urgensi`, `kode_urgensi`, `nama_urgensi`) VALUES
(1, 'M', 'Mendesak'),
(2, 'TM', 'Tidak Mendesak');

-- --------------------------------------------------------

--
-- Table structure for table `gangguan_user`
--

CREATE TABLE `gangguan_user` (
  `id_user` int(11) NOT NULL,
  `kode_user` varchar(10) NOT NULL,
  `nama_user` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `gangguan_user`
--

INSERT INTO `gangguan_user` (`id_user`, `kode_user`, `nama_user`) VALUES
(1, 'Pnt', 'Panitia'),
(2, 'Py', 'Penyedia'),
(3, 'PPK', 'PPK'),
(4, 'Aud', 'Auditor'),
(5, 'Pub', 'Publik'),
(6, 'L', 'Lainnya');

-- --------------------------------------------------------

--
-- Table structure for table `jenis_aset_fisik`
--

CREATE TABLE `jenis_aset_fisik` (
  `id` int(11) NOT NULL,
  `nama_jenisaset` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `jenis_aset_fisik`
--

INSERT INTO `jenis_aset_fisik` (`id`, `nama_jenisaset`) VALUES
(1, 'Media Penyimpanan Portable'),
(2, 'Komputer Kerja'),
(3, 'Power Distribution Unit'),
(4, 'UPS For Server'),
(5, 'Media Jaringan'),
(6, 'Networking Infrastructure'),
(7, 'Komputer Pelayanan'),
(8, 'UPS Untuk Komputer Biding'),
(9, 'Scanner Ruang Biding'),
(10, 'Projektor Pelatihan'),
(11, 'Media Presentase'),
(12, 'Sistem Operasional'),
(13, 'Pengaturan Jaringan'),
(14, 'Data'),
(15, 'Sirkulasi Jaringan'),
(16, 'Media Penyimpanan/ Backup data'),
(17, 'Mail Server');

-- --------------------------------------------------------

--
-- Table structure for table `klasifikasi_aset_fisik`
--

CREATE TABLE `klasifikasi_aset_fisik` (
  `id` int(11) NOT NULL,
  `nama_klasifikasi` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `klasifikasi_aset_fisik`
--

INSERT INTO `klasifikasi_aset_fisik` (`id`, `nama_klasifikasi`) VALUES
(1, 'Media Backup'),
(2, 'Perangkat Admin'),
(3, 'Perangkat Server'),
(4, 'Perangkat Ruang Biding'),
(5, 'Perangkat Pemindai/Scan'),
(6, 'Media Informasi/Presentase'),
(7, 'Media Penyimpanan'),
(8, 'Media Email, Konfirmasi Pendaftaran'),
(9, 'Media Pembagi/Pendistribusi IP');

-- --------------------------------------------------------

--
-- Table structure for table `klasifikasi_informasi`
--

CREATE TABLE `klasifikasi_informasi` (
  `id_ki` int(11) NOT NULL,
  `kla_informasi` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `klasifikasi_informasi`
--

INSERT INTO `klasifikasi_informasi` (`id_ki`, `kla_informasi`) VALUES
(1, 'Dokumen Tertulis Internal');

-- --------------------------------------------------------

--
-- Table structure for table `klasifikasi_intangible`
--

CREATE TABLE `klasifikasi_intangible` (
  `id_in` int(11) NOT NULL,
  `kla_intangible` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `klasifikasi_intangible`
--

INSERT INTO `klasifikasi_intangible` (`id_in`, `kla_intangible`) VALUES
(1, 'Layanan-layanan');

-- --------------------------------------------------------

--
-- Table structure for table `klasifikasi_layanan`
--

CREATE TABLE `klasifikasi_layanan` (
  `id_kl` int(11) NOT NULL,
  `kla_layanan` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `klasifikasi_layanan`
--

INSERT INTO `klasifikasi_layanan` (`id_kl`, `kla_layanan`) VALUES
(1, 'Jaringan Internet Khusus'),
(2, 'Jaringan Internet Umum'),
(3, 'Jaringan Internet Load Balanced'),
(4, 'Jaringan Intranet Umum'),
(5, 'Jaringan Point to Point');

-- --------------------------------------------------------

--
-- Table structure for table `klasifikasi_sdm`
--

CREATE TABLE `klasifikasi_sdm` (
  `id_ksdm` int(11) NOT NULL,
  `kla_sdm` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `klasifikasi_sdm`
--

INSERT INTO `klasifikasi_sdm` (`id_ksdm`, `kla_sdm`) VALUES
(1, 'Ketua LPSE'),
(2, 'Trainer'),
(3, 'Admin PPE'),
(4, 'Admin Agency'),
(5, 'Tim TI dan Komunikasi, Administrator Sistem'),
(6, 'Verifikator'),
(7, 'Helpdesk'),
(8, 'Resepsionis'),
(9, 'Koordinator Keamanan Informasi'),
(10, 'Admin Genset dan UPS LPSE'),
(11, 'Pegawai Tetap'),
(12, 'Pegawai Tidak Tetap');

-- --------------------------------------------------------

--
-- Table structure for table `klasifikasi_software`
--

CREATE TABLE `klasifikasi_software` (
  `id_ksw` int(11) NOT NULL,
  `kla_sw` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `klasifikasi_software`
--

INSERT INTO `klasifikasi_software` (`id_ksw`, `kla_sw`) VALUES
(1, 'Application Server'),
(2, 'Operating System'),
(3, 'Application');

-- --------------------------------------------------------

--
-- Table structure for table `level`
--

CREATE TABLE `level` (
  `id_level` int(11) NOT NULL,
  `nama_level` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `level`
--

INSERT INTO `level` (`id_level`, `nama_level`) VALUES
(1, 'Admin'),
(2, 'Koordinator');

-- --------------------------------------------------------

--
-- Table structure for table `menu`
--

CREATE TABLE `menu` (
  `id_menu` varchar(10) NOT NULL,
  `nama_menu` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `menu`
--

INSERT INTO `menu` (`id_menu`, `nama_menu`) VALUES
('1568618910', '01. Kebijakan Layanan'),
('1568618926', '02. Pengorganisasian Layanan'),
('1568618936', '03. Pengelolaan Aset Layanan'),
('1568618946', '04. Pengelolaan Resiko Layanan'),
('1568618956', '05. Gangguan Masalah &amp; Permintaan Layanan'),
('1568618967', '06. Pengelolaan Perubahan'),
('1568618976', '07. Kapasitas Layanan'),
('1568618985', '08. Sumber Daya Manusia'),
('1568618995', '09. Keamanan Perangkat'),
('1568619004', '10. Operasional Keamanan Layanan'),
('1568619012', '11. Keamanan Server &amp; Jaringan'),
('1568619019', '12. Kelangsungan Pelayanan'),
('1568619029', '13. Anggaran Layanan'),
('1568619036', '14. Pendukung Layanan'),
('1568619052', '15. Hubungan Bisnis Layanan'),
('1568619060', '16. Pengelolaan Kepatuhan'),
('1568619073', '17. Penilaian Internal');

-- --------------------------------------------------------

--
-- Table structure for table `organisasi_sk`
--

CREATE TABLE `organisasi_sk` (
  `id_sko` int(10) NOT NULL,
  `nomor_sko` varchar(255) NOT NULL,
  `tanggal_sko` date NOT NULL,
  `nama_sko` varchar(255) NOT NULL,
  `tentang_sko` text NOT NULL,
  `file_sko` varchar(255) NOT NULL,
  `tgl_update` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `organisasi_st`
--

CREATE TABLE `organisasi_st` (
  `id_st` int(10) NOT NULL,
  `id_su` int(10) NOT NULL,
  `jabatan_st` varchar(255) NOT NULL,
  `tugas_st` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `organisasi_struktur`
--

CREATE TABLE `organisasi_struktur` (
  `id_su` int(10) NOT NULL,
  `jabatan_su` varchar(255) NOT NULL,
  `tugas_su` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `organisasi_tujuan`
--

CREATE TABLE `organisasi_tujuan` (
  `id_ot` varchar(6) NOT NULL,
  `isi_ot` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `organisasi_tujuan`
--

INSERT INTO `organisasi_tujuan` (`id_ot`, `isi_ot`) VALUES
('gambar', 'strukturorganisasi.png'),
('tujuan', '<p style=\"text-align:justify\">Dalam rangka pelaksanaan pengelolaan Layanan Pengadaan Secara Elektronik (LPSE) diperlukan optimalisasi peran yang bertanggungjawab dalam penerapan pengelolaan layanan. Untuk itu dipandang perlu membentuk tim yang selaras dengan kerangka kerja LPSE, yang bertujuan:</p>\r\n\r\n<ol>\r\n	<li style=\"text-align:justify\">Memastikan bahwa setiap personil LPSE mengambil peran melaksanakan tugas dan tanggungjawabnya dengan baik;</li>\r\n	<li style=\"text-align:justify\">Mensinergikan proses di seluruh area LPSE guna mewujudkan tata kelola IT Service Management (ITSM) yang baik, efektif dan efisien;</li>\r\n	<li style=\"text-align:justify\">Untuk memudahkan evaluasi dan monitoring sebagai bahan perbaikan agar LPSE dapat mewujudkan layanan TIK yang prima;</li>\r\n	<li style=\"text-align:justify\">Mendukung dan mewujudkan integritas Layanan Pengadaan Secara Elektronik yang handal;</li>\r\n	<li style=\"text-align:justify\">Memberikan perbaikan dan pelaksanaan ITSM yang sesuai denganstandardisasi layanan.</li>\r\n</ol>\r\n');

-- --------------------------------------------------------

--
-- Table structure for table `pengaturan`
--

CREATE TABLE `pengaturan` (
  `id` varchar(4) NOT NULL,
  `nama_web` varchar(255) NOT NULL,
  `alias` varchar(3) NOT NULL,
  `url` varchar(255) NOT NULL,
  `alamat` text NOT NULL,
  `telpon` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `jam_kerja` text NOT NULL,
  `facebook` varchar(255) NOT NULL,
  `instagram` varchar(255) NOT NULL,
  `twitter` varchar(255) NOT NULL,
  `logo` varchar(255) NOT NULL,
  `icon` varchar(255) NOT NULL,
  `map` text NOT NULL,
  `info` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `pengaturan`
--

INSERT INTO `pengaturan` (`id`, `nama_web`, `alias`, `url`, `alamat`, `telpon`, `email`, `jam_kerja`, `facebook`, `instagram`, `twitter`, `logo`, `icon`, `map`, `info`) VALUES
('atur', 'Standard Operasional Sistem LPSE', 'SOS', 'http://118.97.133.51/', '<p>Biro Pengadaan Setda Provinsi Gorontalo<br />\r\nJl. Sapta Marga Kel. Botu Kec. Dumbo Raya Kota Gorontalo 96118</p>\r\n', '(0435) 821277', 'lpse_gtloprov@gmail.com', 'Senin - Jumat | 08.00 - 16.30 WITA', 'lpsecoe_gtloprov', 'lpsecoe_gtloprov', 'lpsecoe_gtloprov', 'logo.png', 'icon2.png', 'https://maps.google.com/maps?q=kantor%20gubernur%20gorontalo&amp;t=&amp;z=15&amp;ie=UTF8&amp;iwloc=&amp;output=embed', '<p>17 Standar LPSE untuk menjadi&nbsp;<em>Center Of Excellent</em> (COE)</p>\r\n');

-- --------------------------------------------------------

--
-- Table structure for table `pengguna`
--

CREATE TABLE `pengguna` (
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `nama_lengkap` varchar(255) NOT NULL,
  `id_level` varchar(255) NOT NULL,
  `status` enum('Aktif','Belum Aktif','','') NOT NULL,
  `foto` varchar(255) NOT NULL,
  `tgl_daftar` int(11) NOT NULL,
  `tgl_update` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `pengguna`
--

INSERT INTO `pengguna` (`username`, `password`, `email`, `nama_lengkap`, `id_level`, `status`, `foto`, `tgl_daftar`, `tgl_update`) VALUES
('admin', 'admin', 'admin@email.com', 'Administrator', '1', 'Aktif', 'user.png', 1567485251, 1567485260),
('helmy', '123456', 'helmy@email.com', 'Helmy Lacuba', '2', 'Aktif', 'user.png', 1567733032, 1567733032),
('lucy', '123456', 'lucy@email.com', 'Lucy Latief', '2', 'Aktif', 'user.png', 1567733136, 1567733136),
('manto', '123456', 'manto@email.com', 'Rahmanto Gani', '2', 'Aktif', 'user.png', 1567732824, 1567732824),
('rushjr', 'samuel93', 'ruslansamuel11@gmail.com', 'Rush Jr.', '1', 'Aktif', 'user.png', 1567491061, 1567491071),
('yenny', '123456', 'yenny@email.com', 'Yenny Kaluku', '2', 'Aktif', 'user.png', 1567732967, 1567732967);

-- --------------------------------------------------------

--
-- Table structure for table `regulasi`
--

CREATE TABLE `regulasi` (
  `id_regulasi` varchar(255) NOT NULL,
  `nama_regulasi` varchar(255) NOT NULL,
  `isi_regulasi` text NOT NULL,
  `tgl_update` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `regulasi`
--

INSERT INTO `regulasi` (`id_regulasi`, `nama_regulasi`, `isi_regulasi`, `tgl_update`) VALUES
('kebijakan_keamanan_informasi', 'Kebijakan Keamanan Informasi', '<ol>\r\n	<li style=\"text-align:justify\"><span style=\"font-size:11pt\"><span style=\"font-family:Calibri,sans-serif\"><span style=\"font-size:12.0pt\">Mengikuti perkembangan kebijakan keamanan informasi;</span></span></span></li>\r\n	<li style=\"text-align:justify\"><span style=\"font-size:11pt\"><span style=\"font-family:Calibri,sans-serif\"><span style=\"font-size:12.0pt\">Meningkatkan kesadaran dan kompetensi pengelola LPSE dalam hal keamanan informasi;</span></span></span></li>\r\n	<li style=\"text-align:justify\"><span style=\"font-size:11pt\"><span style=\"font-family:Calibri,sans-serif\"><span style=\"font-size:12.0pt\">Melakukan proses pengawasan keamanan informasi layanan;</span></span></span></li>\r\n	<li style=\"text-align:justify\"><span style=\"font-size:11pt\"><span style=\"font-family:Calibri,sans-serif\"><span style=\"font-size:12.0pt\">Penggunaan format dokumen dan rekaman sesuai dengan ketentuan keamanan informasi layanan, termasuk didalamnya pengklasifikasian informasi yang terkandung didalamnya;</span></span></span></li>\r\n	<li style=\"text-align:justify\"><span style=\"font-size:11pt\"><span style=\"font-family:Calibri,sans-serif\"><span style=\"font-size:12.0pt\">Melakukan kaji ulang secara berkala kinerja system pengelolaan keamanan informasi layanan;</span></span></span></li>\r\n	<li style=\"text-align:justify\"><span style=\"font-size:11pt\"><span style=\"font-family:Calibri,sans-serif\"><span style=\"font-size:12.0pt\">Penggunaan kata sandi harus memenuhi kriteria keamanan minimum, sebagai berikut:</span></span></span>\r\n	<ol style=\"list-style-type:lower-alpha\">\r\n		<li style=\"text-align:justify\"><span style=\"font-size:11pt\"><span style=\"font-family:Calibri,sans-serif\"><span style=\"font-size:12.0pt\">Terdiri dari 10 karakter;</span></span></span></li>\r\n		<li style=\"text-align:justify\"><span style=\"font-size:11pt\"><span style=\"font-family:Calibri,sans-serif\"><span style=\"font-size:12.0pt\">Terdiri dari huruf (besar dan kecil), angka dan karakter special (tanda baca);</span></span></span></li>\r\n		<li style=\"text-align:justify\"><span style=\"font-size:11pt\"><span style=\"font-family:Calibri,sans-serif\"><span style=\"font-size:12.0pt\">Tidak menggunakan kata-kata atau informasi yang mudah ditebak, misalnya nama anak, tanggal lahir, kota kelahiran, dll;</span></span></span></li>\r\n		<li style=\"text-align:justify\"><span style=\"font-size:11pt\"><span style=\"font-family:Calibri,sans-serif\"><span style=\"font-size:12.0pt\">Penyimpanan kata sandi dalam bentuk tertulis untuk semua media, baik cetak maupun elektronik tidak diperkenankan kecuali dalam bentuk terenkripsi.</span></span></span></li>\r\n	</ol>\r\n	</li>\r\n	<li style=\"text-align:justify\"><span style=\"font-size:11pt\"><span style=\"font-family:Calibri,sans-serif\"><span style=\"font-size:12.0pt\">Melakukan backup terhadap semua informasi teknis yang bersifat kritis, misalnya konfigurasi sistem, arsitektur sistem, dll; </span></span></span></li>\r\n	<li style=\"text-align:justify\"><span style=\"font-size:11pt\"><span style=\"font-family:Calibri,sans-serif\"><span style=\"font-size:12.0pt\">Melakukan pengamanan media penyimpanan utama maupun backup sesuai dengan nilai risiko yang terkandung didalamnya.</span></span></span></li>\r\n</ol>\r\n', 1568087778),
('kebijakan_layanan', 'Kebijakan Layanan', '<ol>\r\n	<li style=\"text-align:justify\"><span style=\"font-size:11pt\"><span style=\"font-family:Calibri,sans-serif\"><span style=\"font-size:12.0pt\">Mengutamakan </span><span style=\"font-size:12.0pt\">pemenuhan </span><span style=\"font-size:12.0pt\">mutu </span><span style=\"font-size:12.0pt\">layanan dan </span><span style=\"font-size:12.0pt\">kepuasan pelanggan</span><span style=\"font-size:12.0pt\"> sesuai Standar Operasional Prosedur Umum LPSE</span><span style=\"font-size:12.0pt\">;</span></span></span></li>\r\n	<li style=\"text-align:justify\"><span style=\"font-size:11pt\"><span style=\"font-family:Calibri,sans-serif\"><span style=\"font-size:12.0pt\">Mengkomunikasikan komitmen kepada seluruh pengguna </span><span style=\"font-size:12.0pt\">LPSE </span><span style=\"font-size:12.0pt\">untuk memberikan pelayanan terbaik;</span></span></span></li>\r\n	<li style=\"text-align:justify\"><span style=\"font-size:11pt\"><span style=\"font-family:Calibri,sans-serif\"><span style=\"font-size:12.0pt\">Menggunakan kerangka kerja dalam setiap proses penyelenggaraan layanan guna mencapai tujuan dari pengelolaan layanan;</span></span></span></li>\r\n	<li style=\"text-align:justify\"><span style=\"font-size:11pt\"><span style=\"font-family:Calibri,sans-serif\"><span style=\"font-size:12.0pt\">Melakukan kaji ulang secara berkala kinerja sistem pengelolaan layanan;</span></span></span></li>\r\n	<li style=\"text-align:justify\"><span style=\"font-size:11pt\"><span style=\"font-family:Calibri,sans-serif\"><span style=\"font-size:12.0pt\">Senantiasa melakukan perbaikan berkelanjutan pada </span><span style=\"font-size:12.0pt\">pengelolaan layanan</span><span style=\"font-size:12.0pt\">, sesuai dengan kaidah yang berlaku secara umum</span><span style=\"font-size:12.0pt\">.</span></span></span></li>\r\n</ol>\r\n', 1568087746),
('kebijakan_umum', 'Kebijakan Umum', '<ol>\r\n	<li style=\"text-align:justify\"><span style=\"font-size:11pt\"><span style=\"font-family:Calibri,sans-serif\"><span style=\"font-size:12.0pt\">Mematuhi seluruh peraturan dan perundangan yang berlaku di Republik Indonesia, terutama peraturan yang terkait dengan pengadaan barang/jasa pemerintah, pelayanan publik, hak cipta, dan informasi dan transaksi elektronik;</span></span></span></li>\r\n	<li style=\"text-align:justify\"><span style=\"font-size:11pt\"><span style=\"font-family:Calibri,sans-serif\"><span style=\"font-size:12.0pt\">Mematuhi dan menjalankan semua prosedur internal yang berlaku di LPSE.</span></span></span></li>\r\n</ol>\r\n', 1568087713);

-- --------------------------------------------------------

--
-- Table structure for table `regulasi_perka`
--

CREATE TABLE `regulasi_perka` (
  `id` varchar(10) NOT NULL,
  `nomor` varchar(255) NOT NULL,
  `tahun` varchar(4) NOT NULL,
  `nama` varchar(255) NOT NULL,
  `tentang` varchar(255) NOT NULL,
  `berlaku` date DEFAULT NULL,
  `berakhir` date DEFAULT NULL,
  `file` varchar(255) NOT NULL,
  `tgl_ubah` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `resiko_dampak`
--

CREATE TABLE `resiko_dampak` (
  `nilai` int(2) NOT NULL,
  `ekonomi` varchar(255) NOT NULL,
  `reputasi` varchar(255) NOT NULL,
  `pidana` varchar(255) NOT NULL,
  `kinerja` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `resiko_dampak`
--

INSERT INTO `resiko_dampak` (`nilai`, `ekonomi`, `reputasi`, `pidana`, `kinerja`) VALUES
(1, 'Tidak ada', 'Tidak ada', 'Tidak ada', 'Tidak ada'),
(2, 'Potensi mengganggu penyerapan anggaran', 'Kehilangan kepercayaan pengguna', 'Tidak ada', 'Menyulitkan pelaksanaan pemberian layanan'),
(3, 'Mengganggu penyerapan anggaran', 'Pengalihan pengelolaan LPSE kepada pihak/unit kerja lain', 'Personil LPSE terancam hukuman pidana kurang dari 5 tahun', 'Mengganggu pelayanan kepada pengguna'),
(4, 'Menghambat penyerapan anggaran', 'Pembubaran LPSE', 'Personil LPSE terancam hukuman pidana lebih dari 5 tahun', 'Menghentikan pelayanan kepada pengguna');

-- --------------------------------------------------------

--
-- Table structure for table `resiko_fisik`
--

CREATE TABLE `resiko_fisik` (
  `id_rfisik` varchar(20) NOT NULL,
  `id_kfisik` int(11) NOT NULL,
  `dampak` int(11) NOT NULL,
  `pengancam` int(11) NOT NULL,
  `kerentanan` int(11) NOT NULL,
  `paparan` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `resiko_fisik`
--

INSERT INTO `resiko_fisik` (`id_rfisik`, `id_kfisik`, `dampak`, `pengancam`, `kerentanan`, `paparan`) VALUES
('RF1575337558', 1, 1, 1, 1, 1);

-- --------------------------------------------------------

--
-- Table structure for table `resiko_informasi`
--

CREATE TABLE `resiko_informasi` (
  `id` varchar(20) NOT NULL,
  `id_ki` int(11) NOT NULL,
  `dampak` int(11) NOT NULL,
  `pengancam` int(11) NOT NULL,
  `kerentanan` int(11) NOT NULL,
  `paparan` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `resiko_informasi`
--

INSERT INTO `resiko_informasi` (`id`, `id_ki`, `dampak`, `pengancam`, `kerentanan`, `paparan`) VALUES
('RI1570671264', 1, 4, 3, 4, 2);

-- --------------------------------------------------------

--
-- Table structure for table `resiko_intangible`
--

CREATE TABLE `resiko_intangible` (
  `id` varchar(20) NOT NULL,
  `id_in` int(11) NOT NULL,
  `dampak` int(11) NOT NULL,
  `pengancam` int(11) NOT NULL,
  `kerentanan` int(11) NOT NULL,
  `paparan` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `resiko_intangible`
--

INSERT INTO `resiko_intangible` (`id`, `id_in`, `dampak`, `pengancam`, `kerentanan`, `paparan`) VALUES
('RIN1575341642', 1, 1, 1, 1, 1);

-- --------------------------------------------------------

--
-- Table structure for table `resiko_layanan`
--

CREATE TABLE `resiko_layanan` (
  `id` varchar(20) NOT NULL,
  `id_kl` int(11) NOT NULL,
  `dampak` int(11) NOT NULL,
  `pengancam` int(11) NOT NULL,
  `kerentanan` int(11) NOT NULL,
  `paparan` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `resiko_layanan`
--

INSERT INTO `resiko_layanan` (`id`, `id_kl`, `dampak`, `pengancam`, `kerentanan`, `paparan`) VALUES
('RL1575340940', 1, 1, 1, 1, 1);

-- --------------------------------------------------------

--
-- Table structure for table `resiko_paparan`
--

CREATE TABLE `resiko_paparan` (
  `nilai` int(2) NOT NULL,
  `tingkat_paparan` varchar(255) NOT NULL,
  `contoh_paparan` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `resiko_paparan`
--

INSERT INTO `resiko_paparan` (`nilai`, `tingkat_paparan`, `contoh_paparan`) VALUES
(1, 'Rendah', 'Antivirus bekerja dengan baik'),
(2, 'Sedang', 'Antivirus terpasang namun tidak update'),
(3, 'Tinggi', 'Tidak ada antivirus');

-- --------------------------------------------------------

--
-- Table structure for table `resiko_pengancam`
--

CREATE TABLE `resiko_pengancam` (
  `nilai` int(2) NOT NULL,
  `tingkat_pengancam` varchar(255) NOT NULL,
  `profil_pengancam` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `resiko_pengancam`
--

INSERT INTO `resiko_pengancam` (`nilai`, `tingkat_pengancam`, `profil_pengancam`) VALUES
(1, 'Rendah', 'Pengguna yang tidak sah; Peretas pemula; Pemilik dana sampai dengan Rp. 10 Juta.'),
(2, 'Sedang', 'Pengguna yang sah; Peretas senior; Pemilik dana antara Rp. 10 Juta sampai Rp. 100 Juta.'),
(3, 'Tinggi', 'Operator atau Administrator; Pemilik dana antara Rp. 100 Juta sampai Rp. 1 Miliar.'),
(4, 'Sangat Tinggi', 'Kejahatan terorganisir; Pemerintah Negara lain; Pemilik dana lebih dari Rp. 1 Miliar.');

-- --------------------------------------------------------

--
-- Table structure for table `resiko_rentan`
--

CREATE TABLE `resiko_rentan` (
  `id` int(11) NOT NULL,
  `id_rentan_kategori` int(11) NOT NULL,
  `aspek` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `resiko_rentan`
--

INSERT INTO `resiko_rentan` (`id`, `id_rentan_kategori`, `aspek`) VALUES
(1, 1, 'Latar belakang'),
(2, 1, 'Tingkah laku'),
(3, 1, 'Ketaatan prosedur'),
(4, 1, 'Kompetensi'),
(5, 2, 'Kebijakan'),
(6, 2, 'Prosedur'),
(7, 2, 'Efektifitas implementasi kebijakan dan prosedur'),
(8, 3, 'Arsitektur system'),
(9, 3, 'Pengendalian akses'),
(10, 3, 'Konfigurasi system'),
(11, 4, 'Pengendalian akses'),
(12, 4, 'Daya tahan terhadap serangan fisik'),
(13, 4, 'Perlindungan fisik');

-- --------------------------------------------------------

--
-- Table structure for table `resiko_rentan_jenis`
--

CREATE TABLE `resiko_rentan_jenis` (
  `id` int(11) NOT NULL,
  `id_resiko` varchar(255) NOT NULL,
  `id_resiko_rentan` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `resiko_rentan_jenis`
--

INSERT INTO `resiko_rentan_jenis` (`id`, `id_resiko`, `id_resiko_rentan`) VALUES
(5, 'RI1570671264', 3);

-- --------------------------------------------------------

--
-- Table structure for table `resiko_rentan_kategori`
--

CREATE TABLE `resiko_rentan_kategori` (
  `id` int(2) NOT NULL,
  `nama` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `resiko_rentan_kategori`
--

INSERT INTO `resiko_rentan_kategori` (`id`, `nama`) VALUES
(1, 'Orang'),
(2, 'Administratif'),
(3, 'Logis'),
(4, 'Fisik');

-- --------------------------------------------------------

--
-- Table structure for table `resiko_rentan_nilai`
--

CREATE TABLE `resiko_rentan_nilai` (
  `nilai` int(2) NOT NULL,
  `tingkat_rentan` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `resiko_rentan_nilai`
--

INSERT INTO `resiko_rentan_nilai` (`nilai`, `tingkat_rentan`) VALUES
(1, 'Rendah'),
(2, 'Sedang'),
(3, 'Tinggi'),
(4, 'Sangat Tinggi');

-- --------------------------------------------------------

--
-- Table structure for table `resiko_sdm`
--

CREATE TABLE `resiko_sdm` (
  `id` varchar(20) NOT NULL,
  `id_ksdm` int(11) NOT NULL,
  `dampak` int(11) NOT NULL,
  `pengancam` int(11) NOT NULL,
  `kerentanan` int(11) NOT NULL,
  `paparan` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `resiko_sdm`
--

INSERT INTO `resiko_sdm` (`id`, `id_ksdm`, `dampak`, `pengancam`, `kerentanan`, `paparan`) VALUES
('RSDM1575335489', 1, 1, 1, 2, 1);

-- --------------------------------------------------------

--
-- Table structure for table `resiko_sk`
--

CREATE TABLE `resiko_sk` (
  `id` varchar(15) NOT NULL,
  `nomor` varchar(255) NOT NULL,
  `tanggal` date NOT NULL,
  `nama` varchar(255) NOT NULL,
  `tentang` varchar(255) NOT NULL,
  `berlaku` date NOT NULL,
  `berakhir` date NOT NULL,
  `file` varchar(255) NOT NULL,
  `username` varchar(255) NOT NULL,
  `tgl_update` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `resiko_sk`
--

INSERT INTO `resiko_sk` (`id`, `nomor`, `tanggal`, `nama`, `tentang`, `berlaku`, `berakhir`, `file`, `username`, `tgl_update`) VALUES
('SK1570503911', '40', '2019-10-01', 'SK Kepala LPSE Provinsi Gorontalo', 'Koordinator dan Pengelola ResikoLayanan', '2019-10-02', '2019-10-31', 'std_4_tata_cara_pengelolaan_risiko.pdf', 'admin', 1570667616);

-- --------------------------------------------------------

--
-- Table structure for table `resiko_software`
--

CREATE TABLE `resiko_software` (
  `id` varchar(20) NOT NULL,
  `id_ksoftware` int(11) NOT NULL,
  `dampak` int(11) NOT NULL,
  `pengancam` int(11) NOT NULL,
  `kerentanan` int(11) NOT NULL,
  `paparan` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `resiko_software`
--

INSERT INTO `resiko_software` (`id`, `id_ksoftware`, `dampak`, `pengancam`, `kerentanan`, `paparan`) VALUES
('RSW1575340007', 1, 1, 1, 1, 1);

-- --------------------------------------------------------

--
-- Table structure for table `resiko_sop`
--

CREATE TABLE `resiko_sop` (
  `id` varchar(10) NOT NULL,
  `nama` varchar(255) NOT NULL,
  `isi` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `resiko_sop`
--

INSERT INTO `resiko_sop` (`id`, `nama`, `isi`) VALUES
('1568775826', 'Prosedur Pengelolaan Resiko', '<p>Risiko dikelola dengan cara didaftarkan dengan menggunakan daftar yang terus diperbaharui. Pendaftaran risiko dibuat berdasarkan pengelompokan dari klasifikasi dan sub klasifikasi aset, adapun isi daftar risiko sebagai berikut:</p>\r\n\r\n<ol>\r\n	<li style=\"text-align:justify\">No., adalah nomor urut risiko atau dapat juga dengan kombinasi huruf dan angka, tanggal atau kode lainnya jika dibutuhkan;</li>\r\n	<li style=\"text-align:justify\">Sub Klasifikasi, adalah Sub Klasifikasi aset yang sudah didaftarkan pada Form Daftar Aset;</li>\r\n	<li style=\"text-align:justify\">Dampak, adalah penjelasan dampak dari risiko beserta penilaian yang sesuai dengan Metode Penilaian Risiko (poin 1.1);</li>\r\n	<li style=\"text-align:justify\">Pengancam, adalah penjelasan pengancam dari risiko beserta penilaian yang sesuai dengan Metode, Penilaian Risiko (poin 1.2);</li>\r\n	<li style=\"text-align:justify\">Kerentanan, adalah penjelasan kerentanan dari aset beserta penilaian yang sesuai dengan Metode Penilaian Risiko (poin 1.3);</li>\r\n	<li style=\"text-align:justify\">Paparan, adalah penjelasan paparan risiko terhadap aset beserta penilaian yang sesuai dengan Metode Penilaian Risiko (poin 1.4);</li>\r\n	<li style=\"text-align:justify\">Jenis Risiko, merupakan aspek Kerahasiaan, Integritas dan Ketersediaan yang melekat pada aset yang terpapar risiko;</li>\r\n	<li style=\"text-align:justify\">Nilai Risiko, merupaka hasil perhitungan risiko yang sesuai dengan Metode Penilaian Risiko (poin 1.5);</li>\r\n	<li style=\"text-align:justify\">Kontrol, merupakan tindakan-tindakan pengendalian yang diambil yang bertujuan untuk menurunkan nilai kerentanan atau paparan;</li>\r\n	<li style=\"text-align:justify\">Mitigasi, adalah informasi kontrol yang akan diterapkan, PIC yang melaksanakan dan target penyelesaian proses mitigasi. Tindakan mitigasi diambil berdasarkan klasifikasi risiko yang sesuai dengan Metode Penilaian Risiko (poin 1.6).</li>\r\n</ol>\r\n'),
('1570165925', 'Metode Penilaian Resiko', '<ol>\r\n	<li><strong>PENILAIAN DAMPAK</strong>\r\n	<p>Pemberian nilai dampak diidentifikasi dari beberapa aspek berikut:</p>\r\n\r\n	<table class=\"table table-bordered\" style=\"width:100%\">\r\n		<tbody>\r\n			<tr>\r\n				<th>NILAI</th>\r\n				<th>EKONOMI</th>\r\n				<th>REPUTASI</th>\r\n				<th>PIDANA</th>\r\n				<th>KINERJA</th>\r\n			</tr>\r\n			<tr>\r\n				<td>4</td>\r\n				<td>Menghambat penyerapan anggaran</td>\r\n				<td>Pembubaran LPSE</td>\r\n				<td>Personil LPSE terancam hukuman pidana lebih dari 5 tahun</td>\r\n				<td>Menghentikan pelayanan kepada pengguna</td>\r\n			</tr>\r\n			<tr>\r\n				<td>3</td>\r\n				<td>Mengganggu penerapan anggaran</td>\r\n				<td>Pengalihan pengelolaan LPSE kepada pihak/unit kerja lain</td>\r\n				<td>Personil LPSE terancam hukuman pidana kurang dari 5 tahun</td>\r\n				<td>Mengganggu pelayanan kepada pengguna</td>\r\n			</tr>\r\n			<tr>\r\n				<td>2</td>\r\n				<td>Potensi mengganggu penyerapan anggaran</td>\r\n				<td>Kehilangan kepercayaan pengguna</td>\r\n				<td>Tidak ada</td>\r\n				<td>Meyulitkan pelaksanaan pemberian layanan</td>\r\n			</tr>\r\n			<tr>\r\n				<td>1</td>\r\n				<td>Tidak ada</td>\r\n				<td>Tidak ada</td>\r\n				<td>Tidak ada</td>\r\n				<td>Tidak ada</td>\r\n			</tr>\r\n		</tbody>\r\n	</table>\r\n	</li>\r\n	<li><strong>PENILAIAN PENGANCAM</strong>\r\n	<p>Pemberian nilai pengancam diidentifikasi dari profil pengancam berikut:</p>\r\n\r\n	<table class=\"table table-bordered\" style=\"width:70%\">\r\n		<tbody>\r\n			<tr>\r\n				<th>NILAI</th>\r\n				<th>TINGKAT</th>\r\n				<th>PROFIL</th>\r\n			</tr>\r\n			<tr>\r\n				<td>4</td>\r\n				<td>Sangat Tinggi</td>\r\n				<td>\r\n				<ul>\r\n					<li>Kejahatan terorganisir</li>\r\n					<li>Pemerintah Negara lain</li>\r\n					<li>Pemilik dana lebih dari Rp. 1 Miliar</li>\r\n				</ul>\r\n				</td>\r\n			</tr>\r\n			<tr>\r\n				<td>3</td>\r\n				<td>Tinggi</td>\r\n				<td>\r\n				<ul>\r\n					<li>Operator atau Administrator</li>\r\n					<li>Pemilik dana antara Rp. 100 Juta sampai Rp. 1 Miliar</li>\r\n				</ul>\r\n				</td>\r\n			</tr>\r\n			<tr>\r\n				<td>2</td>\r\n				<td>Sedang</td>\r\n				<td>\r\n				<ul>\r\n					<li>Pengguna yang sah</li>\r\n					<li>Peretas senior</li>\r\n					<li>Pemilik dana antara Rp. 10 Juta sampai Rp. 100 Juta</li>\r\n				</ul>\r\n				</td>\r\n			</tr>\r\n			<tr>\r\n				<td>1</td>\r\n				<td>Rendah</td>\r\n				<td>\r\n				<ul>\r\n					<li>Pengguna yang tidak sah</li>\r\n					<li>Peretas pemula</li>\r\n					<li>Pemilik dana sampai dengan Rp. 10 Juta</li>\r\n				</ul>\r\n				</td>\r\n			</tr>\r\n		</tbody>\r\n	</table>\r\n	</li>\r\n	<li><strong>PENILAIAN KERENTANAN</strong>\r\n	<p>Pemberian nilai kerentanan diidentifikasi dari 4 (empat) aspek, sebagai berikut</p>\r\n\r\n	<table class=\"table table-bordered\" style=\"width:70%\">\r\n		<tbody>\r\n			<tr>\r\n				<th>KERENTANAN</th>\r\n				<th>ASPEK PENILAIAN</th>\r\n			</tr>\r\n			<tr>\r\n				<td>Orang</td>\r\n				<td>\r\n				<ul>\r\n					<li>Latar belakang</li>\r\n					<li>Tingkah laku</li>\r\n					<li>Ketaatan prosedur</li>\r\n					<li>Kompetensi</li>\r\n				</ul>\r\n				</td>\r\n			</tr>\r\n			<tr>\r\n				<td>Administratif</td>\r\n				<td>\r\n				<ul>\r\n					<li>Kebijakan</li>\r\n					<li>Prosedur</li>\r\n					<li>Efektifitas implementasi kebijakan dan prosedur</li>\r\n				</ul>\r\n				</td>\r\n			</tr>\r\n			<tr>\r\n				<td>Logis</td>\r\n				<td>\r\n				<ul>\r\n					<li>Arsitektur system</li>\r\n					<li>Pengendalian akses</li>\r\n					<li>Konfigurasi system</li>\r\n				</ul>\r\n				</td>\r\n			</tr>\r\n			<tr>\r\n				<td>Fisik</td>\r\n				<td>\r\n				<ul>\r\n					<li>Pengendalian akses</li>\r\n					<li>Daya tahan terhadap serangan fisik</li>\r\n					<li>Perlindungan fisik</li>\r\n				</ul>\r\n				</td>\r\n			</tr>\r\n		</tbody>\r\n	</table>\r\n\r\n	<p>Berdasarkan identifikasi diatas, kerentanan diberikan nilai:</p>\r\n\r\n	<table class=\"table table-bordered\" style=\"width:30%\">\r\n		<tbody>\r\n			<tr>\r\n				<th>NILAI</th>\r\n				<th>TINGKAT KERENTANAN</th>\r\n			</tr>\r\n			<tr>\r\n				<td>4</td>\r\n				<td>Sangat Tinggi</td>\r\n			</tr>\r\n			<tr>\r\n				<td>3</td>\r\n				<td>Tinggi</td>\r\n			</tr>\r\n			<tr>\r\n				<td>2</td>\r\n				<td>Sedang</td>\r\n			</tr>\r\n			<tr>\r\n				<td>1</td>\r\n				<td>Rendah</td>\r\n			</tr>\r\n		</tbody>\r\n	</table>\r\n	</li>\r\n	<li><strong>PENILAIAN PAPARAN</strong>\r\n	<p>Pemberian nilai paparan berdasarkan tingkatan berikut:</p>\r\n\r\n	<table class=\"table table-bordered\" style=\"width:50%\">\r\n		<tbody>\r\n			<tr>\r\n				<th>NILAI</th>\r\n				<th>TINGKAT PAPARAN</th>\r\n				<th>CONTOH</th>\r\n			</tr>\r\n			<tr>\r\n				<td>3</td>\r\n				<td>Tinggi</td>\r\n				<td>Tidak ada antivirus</td>\r\n			</tr>\r\n			<tr>\r\n				<td>2</td>\r\n				<td>Sedang</td>\r\n				<td>Antivirus terpasang namun tidak update</td>\r\n			</tr>\r\n			<tr>\r\n				<td>1</td>\r\n				<td>Rendah</td>\r\n				<td>Antivirus bekerja dengan baik</td>\r\n			</tr>\r\n		</tbody>\r\n	</table>\r\n	</li>\r\n	<li><strong>PENILAIAN RESIKO</strong>\r\n		<p>Penilaian risiko didapat dari perhitungan berikut:</p>\r\n		<div class=\"card border-success text-success font-weight-bold mb-3\" style=\"width:65%\">\r\n			<div class=\"card-body\">\r\n				<table class=\"table table-borderless m-0 p-0\" style=\"width:100%\">\r\n					<tbody>\r\n						<tr>\r\n							<td>Risiko Turunan (tanpa kontrol)</td>\r\n							<td>=</td>\r\n							<td>Dampak x Pengancam x Kerentanan x paparan</td>\r\n						</tr>\r\n						<tr>\r\n							<td>Risiko Sisa (dengan kontrol)</td>\r\n							<td>=</td>\r\n							<td>Dampak x Pengancam x Kerentanan x paparan</td>\r\n						</tr>\r\n					</tbody>\r\n				</table>\r\n			</div>\r\n		</div>\r\n		<p>Tabel Keparahan</p>\r\n		<table class=\"table table-bordered text-center\" style=\"width:100%\">\r\n			<tbody>\r\n				<tr>\r\n					<td colspan=\"2\">Pengancam</td>\r\n					<td colspan=\"4\">1</td>\r\n					<td colspan=\"4\">2</td>\r\n					<td colspan=\"4\">3</td>\r\n					<td colspan=\"4\">4</td>\r\n				</tr>\r\n				<tr>\r\n					<td colspan=\"2\">Kerentanan</td>\r\n					<td>1</td>\r\n					<td>2</td>\r\n					<td>3</td>\r\n					<td>4</td>\r\n					<td>1</td>\r\n					<td>2</td>\r\n					<td>3</td>\r\n					<td>4</td>\r\n					<td>1</td>\r\n					<td>2</td>\r\n					<td>3</td>\r\n					<td>4</td>\r\n					<td>1</td>\r\n					<td>2</td>\r\n					<td>3</td>\r\n					<td>4</td>\r\n				</tr>\r\n				<tr>\r\n					<td rowspan=\"5\">Dampak</td>\r\n				</tr>\r\n				<tr>\r\n					<td>1</td>\r\n					<td>1</td>\r\n					<td>2</td>\r\n					<td>3</td>\r\n					<td>4</td>\r\n					<td>2</td>\r\n					<td>4</td>\r\n					<td>6</td>\r\n					<td>8</td>\r\n					<td>3</td>\r\n					<td>6</td>\r\n					<td>9</td>\r\n					<td>12</td>\r\n					<td>4</td>\r\n					<td>8</td>\r\n					<td>12</td>\r\n					<td>16</td>\r\n				</tr>\r\n				<tr>\r\n					<td>2</td>\r\n					<td>2</td>\r\n					<td>4</td>\r\n					<td>6</td>\r\n					<td>8</td>\r\n					<td>4</td>\r\n					<td>8</td>\r\n					<td>12</td>\r\n					<td>16</td>\r\n					<td>6</td>\r\n					<td>12</td>\r\n					<td>18</td>\r\n					<td>24</td>\r\n					<td>8</td>\r\n					<td>16</td>\r\n					<td>24</td>\r\n					<td>32</td>\r\n				</tr>\r\n				<tr>\r\n					<td>3</td>\r\n					<td>3</td>\r\n					<td>6</td>\r\n					<td>9</td>\r\n					<td>12</td>\r\n					<td>6</td>\r\n					<td>12</td>\r\n					<td>18</td>\r\n					<td>24</td>\r\n					<td>9</td>\r\n					<td>18</td>\r\n					<td>27</td>\r\n					<td>36</td>\r\n					<td>12</td>\r\n					<td>24</td>\r\n					<td>36</td>\r\n					<td>48</td>\r\n				</tr>\r\n				<tr>\r\n					<td>4</td>\r\n					<td>4</td>\r\n					<td>8</td>\r\n					<td>12</td>\r\n					<td>16</td>\r\n					<td>8</td>\r\n					<td>16</td>\r\n					<td>24</td>\r\n					<td>32</td>\r\n					<td>12</td>\r\n					<td>24</td>\r\n					<td>36</td>\r\n					<td>48</td>\r\n					<td>16</td>\r\n					<td>32</td>\r\n					<td>48</td>\r\n					<td>64</td>\r\n				</tr>\r\n			</tbody>\r\n		</table>\r\n		<p>Tabel Resiko</p>\r\n		<table class=\"table table-sm table-bordered text-center align-middle\" style=\"width:25%\">\r\n			<tbody>\r\n				<tr>\r\n					<td>PAPARAN</td>\r\n					<td rowspan=\"2\">1</td>\r\n					<td rowspan=\"2\">2</td>\r\n					<td rowspan=\"2\">3</td>\r\n				</tr>\r\n				<tr>\r\n					<td>KEPARAHAN</td>\r\n				</tr>\r\n				<tr>\r\n					<td>1</td>\r\n					<td>1</td>\r\n					<td>2</td>\r\n					<td>3</td>\r\n				</tr>\r\n				<tr>\r\n					<td>2</td>\r\n					<td>2</td>\r\n					<td>4</td>\r\n					<td>6</td>\r\n				</tr>\r\n				<tr>\r\n					<td>3</td>\r\n					<td>3</td>\r\n					<td>6</td>\r\n					<td>9</td>\r\n				</tr>\r\n				<tr>\r\n					<td>4</td>\r\n					<td>4</td>\r\n					<td>8</td>\r\n					<td>12</td>\r\n				</tr>\r\n				<tr>\r\n					<td>6</td>\r\n					<td>6</td>\r\n					<td>12</td>\r\n					<td>18</td>\r\n				</tr>\r\n				<tr>\r\n					<td>8</td>\r\n					<td>8</td>\r\n					<td>16</td>\r\n					<td>24</td>\r\n				</tr>\r\n				<tr>\r\n					<td>9</td>\r\n					<td>9</td>\r\n					<td>18</td>\r\n					<td>27</td>\r\n				</tr>\r\n				<tr>\r\n					<td>12</td>\r\n					<td>12</td>\r\n					<td>24</td>\r\n					<td>36</td>\r\n				</tr>\r\n				<tr>\r\n					<td>16</td>\r\n					<td>16</td>\r\n					<td>32</td>\r\n					<td>48</td>\r\n				</tr>\r\n				<tr>\r\n					<td>18</td>\r\n					<td>18</td>\r\n					<td>38</td>\r\n					<td>54</td>\r\n				</tr>\r\n				<tr>\r\n					<td>24</td>\r\n					<td>24</td>\r\n					<td>48</td>\r\n					<td>72</td>\r\n				</tr>\r\n				<tr>\r\n					<td>27</td>\r\n					<td>27</td>\r\n					<td>54</td>\r\n					<td>81</td>\r\n				</tr>\r\n				<tr>\r\n					<td>32</td>\r\n					<td>32</td>\r\n					<td>64</td>\r\n					<td>96</td>\r\n				</tr>\r\n				<tr>\r\n					<td>36</td>\r\n					<td>36</td>\r\n					<td>72</td>\r\n					<td>108</td>\r\n				</tr>\r\n				<tr>\r\n					<td>48</td>\r\n					<td>48</td>\r\n					<td>96</td>\r\n					<td>144</td>\r\n				</tr>\r\n				<tr>\r\n					<td>64</td>\r\n					<td>64</td>\r\n					<td>128</td>\r\n					<td>192</td>\r\n				</tr>\r\n			</tbody>\r\n		</table>\r\n	</li>\r\n	<li><strong>KLARIFIKASI RESIKO</strong>\r\n		<p>Berdasarkan tabel penilaian risiko, risiko dikelompokkan sebagai berikut:</p>\r\n		<table class=\"table table-bordered\" style=\"width:50%\">\r\n			<tbody>\r\n				<tr>\r\n					<th>RESIKO</th>\r\n					<th>NILAI RESIKO</th>\r\n					<th>TINDAKAN</th>\r\n				</tr>\r\n				<tr>\r\n					<td>Rendah</td>\r\n					<td><=24</td>\r\n					<td>Resiko diterima</td>\r\n				</tr>\r\n				<tr>\r\n					<td>Sedang</td>\r\n					<td>>24 dan <=64</td>\r\n					<td>Dilakukan mitigasi</td>\r\n				</tr>\r\n				<tr>\r\n					<td>Tinggi</td>\r\n					<td>>64</td>\r\n					<td>Dilakukan mitigasi dengan prioritas tinggi</td>\r\n				</tr>\r\n			</tbody>\r\n		</table>\r\n		<table class=\"table table-sm table-bordered text-center align-middle\" style=\"width:25%\">\r\n			<tbody>\r\n				<tr>\r\n					<td>PAPARAN</td>\r\n					<td rowspan=\"2\">1</td>\r\n					<td rowspan=\"2\">2</td>\r\n					<td rowspan=\"2\">3</td>\r\n				</tr>\r\n				<tr>\r\n					<td>KEPARAHAN</td>\r\n				</tr>\r\n				<tr>\r\n					<td>1</td>\r\n					<td>1</td>\r\n					<td>2</td>\r\n					<td>3</td>\r\n				</tr>\r\n				<tr>\r\n					<td>2</td>\r\n					<td>2</td>\r\n					<td>4</td>\r\n					<td>6</td>\r\n				</tr>\r\n				<tr>\r\n					<td>3</td>\r\n					<td>3</td>\r\n					<td>6</td>\r\n					<td>9</td>\r\n				</tr>\r\n				<tr>\r\n					<td>4</td>\r\n					<td>4</td>\r\n					<td>8</td>\r\n					<td>12</td>\r\n				</tr>\r\n				<tr>\r\n					<td>6</td>\r\n					<td>6</td>\r\n					<td>12</td>\r\n					<td>18</td>\r\n				</tr>\r\n				<tr>\r\n					<td>8</td>\r\n					<td>8</td>\r\n					<td>16</td>\r\n					<td>24</td>\r\n				</tr>\r\n				<tr>\r\n					<td>9</td>\r\n					<td>9</td>\r\n					<td>18</td>\r\n					<td>27</td>\r\n				</tr>\r\n				<tr>\r\n					<td>12</td>\r\n					<td>12</td>\r\n					<td>24</td>\r\n					<td>36</td>\r\n				</tr>\r\n				<tr>\r\n					<td>16</td>\r\n					<td>16</td>\r\n					<td>32</td>\r\n					<td>48</td>\r\n				</tr>\r\n				<tr>\r\n					<td>18</td>\r\n					<td>18</td>\r\n					<td>38</td>\r\n					<td>54</td>\r\n				</tr>\r\n				<tr>\r\n					<td>24</td>\r\n					<td>24</td>\r\n					<td>48</td>\r\n					<td>72</td>\r\n				</tr>\r\n				<tr>\r\n					<td>27</td>\r\n					<td>27</td>\r\n					<td>54</td>\r\n					<td>81</td>\r\n				</tr>\r\n				<tr>\r\n					<td>32</td>\r\n					<td>32</td>\r\n					<td>64</td>\r\n					<td>96</td>\r\n				</tr>\r\n				<tr>\r\n					<td>36</td>\r\n					<td>36</td>\r\n					<td>72</td>\r\n					<td>108</td>\r\n				</tr>\r\n				<tr>\r\n					<td>48</td>\r\n					<td>48</td>\r\n					<td>96</td>\r\n					<td>144</td>\r\n				</tr>\r\n				<tr>\r\n					<td>64</td>\r\n					<td>64</td>\r\n					<td>128</td>\r\n					<td>192</td>\r\n				</tr>\r\n			</tbody>\r\n		</table>\r\n	</li>\r\n</ol>\r\n'),
('istilah', 'Daftar Istilah', '<ol>\r\n	<li style=\"text-align:justify; font-size:12pt;\"><strong>Risiko</strong> adalah segala sesuatu yang dapat memberikan gangguan terhadap suatu proses, output, maupun kegiatan. Dalam melaksanakan penilaian risiko dapat menggabungkan dari beberapa jenis risiko, yaitu: Risiko Operasional, Risiko Finansial, Risiko Kepatuhan, Risiko Turunan (<em>Inherent Risk</em>) dan Risiko Sisa (<em>Residual Risk</em>).\r\n	<ol style=\"list-style-type:lower-alpha\">\r\n		<li style=\"text-align:justify; font-size:12pt;\"><strong>Risiko Operasional</strong> adalah risiko yang diakibatkan oleh kegagalan dari Pedoman &amp; prosedur, proses, sistem, personil, atau kejadian eksternal. Hal ini termasuk risiko dari kesalahan operasional pada aktivitas bisnis atau kesalahan dalam pengelolaan dan sistem manajemen.</li>\r\n		<li style=\"text-align:justify; font-size:12pt;\"><strong>Risiko Finansial</strong> adalah risiko yang diakibatkan antara lain oleh risiko pasar, yaitu akibat dari pergerakan negatif komponen-komponen pasar, seperti nilai valas, suku bunga, ekuitas dan komoditas.</li>\r\n		<li style=\"text-align:justify; font-size:12pt;\"><strong>Risiko Kepatuhan</strong> adalah risiko yang diakibatkan oleh keterlambataan, pelanggaran atau ketidaksesuaian dengan hukum yang berlaku, pelanggaran atau ketidaksesuaian perjanjian pihak ketiga (kontrak) dan pelanggaran atau ketidaksesuaian dengan regulasi eksternal/internal.</li>\r\n		<li style=\"text-align:justify; font-size:12pt;\"><strong>Risiko</strong> <strong>Turunan </strong>adalah risiko yang diakibatkan oleh kegagalan atau tidak adanya pengendalian (kontrol) internal.</li>\r\n		<li style=\"text-align:justify; font-size:12pt;\"><strong>Risiko Sisa </strong>adalah risiko yang masih muncul setelah dilakukannya pengendalian (kontrol). Risiko sisa juga harus dikendalikan hingga mencapai tingkat risiko yang dapat diterima.</li>\r\n	</ol>\r\n	</li>\r\n	<li style=\"text-align:justify; font-size:12pt;\"><strong>Dampak </strong>adalah pengaruh atau akibat yang muncul dari suatu risiko yang ada.</li>\r\n	<li style=\"text-align:justify; font-size:12pt;\"><strong>Pengancam </strong>adalah pihak yang membawa akibat potensial dari suatu insiden yang tidak dikehendaki dikarenakan adanya kelemahan yang dapat membahayakan system atau organisasi.</li>\r\n	<li style=\"text-align:justify; font-size:12pt;\"><strong>Kerentanan </strong>adalah kerawanan dari aset yang dapat dieksploitasi dan menimbulkan ancaman.</li>\r\n	<li style=\"text-align:justify; font-size:12pt;\"><strong>Paparan</strong> adalah tingkat keterpengaruhan aset dari suatu risiko.</li>\r\n	<li style=\"text-align:justify; font-size:12pt;\"><strong>Kontrol </strong>adalah alat untuk mengendalikan risiko, dapat merupakan kebijakan, prosedur, standard, tindakan, struktur, organisasi atau teknologi yang dapat bersifat administrative, pengelolaan, teknis atau hukum.</li>\r\n</ol>');

-- --------------------------------------------------------

--
-- Table structure for table `submenu`
--

CREATE TABLE `submenu` (
  `id_submenu` varchar(10) NOT NULL,
  `id_menu` varchar(10) NOT NULL,
  `nama_submenu` varchar(255) NOT NULL,
  `link` varchar(255) NOT NULL,
  `icon` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `submenu`
--

INSERT INTO `submenu` (`id_submenu`, `id_menu`, `nama_submenu`, `link`, `icon`) VALUES
('105d7f3f33', '1568618910', 'Informasi', 'regulasi', 'fa-list'),
('105d7f3f58', '1568618910', 'Regulasi', 'regulasi/perka', 'fa-list'),
('105d7f413c', '1568618926', 'Struktur Organisasi', 'organisasi', 'fa-list'),
('105d7f4185', '1568618926', 'SOP Organisasi', 'organisasi/sop', 'fa-list'),
('105d7f419f', '1568618926', 'SK Organisasi', 'organisasi/sk', 'fa-list'),
('105d7f421b', '1568618936', 'SOP Aset Layanan', 'aset', 'fa-list'),
('105d7f425f', '1568618936', 'SK Koordinator Aset', 'aset/sk', 'fa-list'),
('105d7f427d', '1568618936', 'Pencatatan Aset Layanan', 'aset/form', 'fa-list'),
('105d7f42ab', '1568618946', 'SOP Resiko Layanan', 'resiko', 'fa-list'),
('105d7f42df', '1568618946', 'SK Koordinator Resiko Layanan', 'resiko/sk', 'fa-list'),
('105d7f431b', '1568618946', 'Pencatatan Resiko Layanan', 'resiko/form', 'fa-list'),
('105d7f4367', '1568618956', 'SOP Gangguan Layanan', 'gangguan', 'fa-list'),
('105d7f4390', '1568618956', 'SK Koordinator Gangguan', 'gangguan/sk', 'fa-list'),
('105d7f43ac', '1568618956', 'Pencatatan Gangguan Layanan', 'gangguan/form', 'fa-list'),
('105d7f43c4', '1568618956', 'FAQ Gangguan Layanan', 'gangguan/faq', 'fa-list'),
('105d7f43fc', '1568618967', 'SOP Perubahan', 'perubahan', 'fa-list'),
('105d7f440e', '1568618967', 'Pencatatan Perubahan', 'perubahan/form', 'fa-list'),
('105d7f4424', '1568618976', 'SOP Kapasitas Layanan', 'kapasitas', 'fa-list'),
('105d7f4439', '1568618976', 'SK Koordinator Kapasitas', 'kapasitas/sk', 'fa-list'),
('105d7f444f', '1568618976', 'Pencatatan Kapasitas Layanan', 'kapasitas/form', 'fa-list'),
('105d7f447c', '1568618985', 'Regulasi SDM', 'sdm', 'fa-list'),
('105d7f4490', '1568618985', 'SK Koordinator SDM', 'sdm/sk', 'fa-list'),
('105d7f44a3', '1568618985', 'Pencatatan SDM', 'sdm/form', 'fa-list'),
('105d7f44d1', '1568618995', 'Regulasi Keamanan Perangkat', 'perangkat', 'fa-list'),
('105d7f44f1', '1568618995', 'SOP Keamanan Perangkat', 'perangkat/sop', 'fa-list'),
('105d7f4510', '1568618995', 'SK Koordinator Perangkat', 'perangkat/sk', 'fa-list'),
('105d7f4520', '1568618995', 'Form Keamanan Perangkat', 'perangkat/form', 'fa-list'),
('105d7f458c', '1568619004', 'SOP Keamanan Layanan', 'layanan', 'fa-list'),
('105d7f459d', '1568619004', 'SK Koordinator Layanan', 'layanan/sk', 'fa-list'),
('105d7f45ac', '1568619004', 'Form Keamanan Layanan', 'layanan/form', 'fa-list'),
('105d7f45cb', '1568619012', 'SOP Keamanan Server', 'server', 'fa-list'),
('105d7f45d9', '1568619012', 'SK Koordinator Server', 'server/sk', 'fa-list'),
('105d7f45e4', '1568619012', 'Form Keamanan Server', 'server/form', 'fa-list'),
('105d7f45fb', '1568619019', 'SOP Kelangsungan Pelayanan', 'pelayanan', 'fa-list'),
('105d7f4613', '1568619019', 'SK Koordinator Pelayanan', 'pelayanan/sk', 'fa-list'),
('105d7f4632', '1568619019', 'Pencatatan Pelayanan', 'pelayanan/form', 'fa-list'),
('105d7f4648', '1568619029', 'SOP Anggaran Layanan', 'anggaran', 'fa-list'),
('105d7f4657', '1568619029', 'SK Koordinator Anggaran', 'anggaran/sk', 'fa-list'),
('105d7f4666', '1568619029', 'Pencatatan Anggaran Layanan', 'anggaran/form', 'fa-list'),
('105d7f468d', '1568619036', 'SOP Dukungan Layanan', 'duknan', 'fa-list'),
('105d7f46a2', '1568619036', 'SK Dukungan Layanan', 'duknan/sk', 'fa-list'),
('105d7f46bb', '1568619036', 'Pencatatan Dukungan Layanan', 'duknan/form', 'fa-list'),
('105d7f46cd', '1568619036', 'Evaluasi Dukungan Layanan', 'duknan/evaluasi', 'fa-list'),
('105d7f46fe', '1568619052', 'SOP Hubungan Bisnis', 'hubnis', 'fa-list'),
('105d7f470d', '1568619052', 'SK Hubungan Bisnis', 'hubnis/sk', 'fa-list'),
('105d7f471f', '1568619052', 'Survey Hubungan Bisnis', 'hubnis/survey', 'fa-list'),
('105d7f472d', '1568619052', 'Evaluasi Hubungan Bisnis', 'hubnis/evaluasi', 'fa-list'),
('105d7f4745', '1568619060', 'Buku Induk Kebijakan', 'kepatuhan', 'fa-list'),
('105d7f475b', '1568619060', 'Software dan Lisensi', 'kepatuhan/software', 'fa-list'),
('105d7f4768', '1568619060', 'Wawancara', 'kepatuhan/form', 'fa-list'),
('105d7f4784', '1568619073', 'SOP Penilaian Internal', 'internal', 'fa-list'),
('105d7f4795', '1568619073', 'Penilaian Mandiri Internal', 'internal/penilaian', 'fa-list'),
('105d7f47b4', '1568619073', 'Dokumen Penilaian Internal', 'internal/dokumen', 'fa-list'),
('105d7f47cb', '1568619073', 'Pencatatan Internal', 'internal/form', 'fa-list');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `akses_menu`
--
ALTER TABLE `akses_menu`
  ADD PRIMARY KEY (`id_am`);

--
-- Indexes for table `aset_fisik`
--
ALTER TABLE `aset_fisik`
  ADD PRIMARY KEY (`idf`);

--
-- Indexes for table `aset_informasi`
--
ALTER TABLE `aset_informasi`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `aset_intangible`
--
ALTER TABLE `aset_intangible`
  ADD PRIMARY KEY (`idi`);

--
-- Indexes for table `aset_integritas`
--
ALTER TABLE `aset_integritas`
  ADD PRIMARY KEY (`id_integritas`);

--
-- Indexes for table `aset_kerahasiaan`
--
ALTER TABLE `aset_kerahasiaan`
  ADD PRIMARY KEY (`id_rahasia`);

--
-- Indexes for table `aset_ketersediaan`
--
ALTER TABLE `aset_ketersediaan`
  ADD PRIMARY KEY (`id_sedia`);

--
-- Indexes for table `aset_layanan`
--
ALTER TABLE `aset_layanan`
  ADD PRIMARY KEY (`idl`);

--
-- Indexes for table `aset_sdm`
--
ALTER TABLE `aset_sdm`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `aset_sk`
--
ALTER TABLE `aset_sk`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `aset_software`
--
ALTER TABLE `aset_software`
  ADD PRIMARY KEY (`ids`);

--
-- Indexes for table `aset_sop`
--
ALTER TABLE `aset_sop`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `gangguan`
--
ALTER TABLE `gangguan`
  ADD PRIMARY KEY (`id_gangguan`);

--
-- Indexes for table `gangguan_dampak`
--
ALTER TABLE `gangguan_dampak`
  ADD PRIMARY KEY (`id_dampak`);

--
-- Indexes for table `gangguan_jenis`
--
ALTER TABLE `gangguan_jenis`
  ADD PRIMARY KEY (`id_jenis`);

--
-- Indexes for table `gangguan_kategori`
--
ALTER TABLE `gangguan_kategori`
  ADD PRIMARY KEY (`id_kategori`);

--
-- Indexes for table `gangguan_prioritas`
--
ALTER TABLE `gangguan_prioritas`
  ADD PRIMARY KEY (`id_prioritas`);

--
-- Indexes for table `gangguan_tipe`
--
ALTER TABLE `gangguan_tipe`
  ADD PRIMARY KEY (`id_tipe`);

--
-- Indexes for table `gangguan_urgensi`
--
ALTER TABLE `gangguan_urgensi`
  ADD PRIMARY KEY (`id_urgensi`);

--
-- Indexes for table `gangguan_user`
--
ALTER TABLE `gangguan_user`
  ADD PRIMARY KEY (`id_user`);

--
-- Indexes for table `jenis_aset_fisik`
--
ALTER TABLE `jenis_aset_fisik`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `klasifikasi_aset_fisik`
--
ALTER TABLE `klasifikasi_aset_fisik`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `klasifikasi_informasi`
--
ALTER TABLE `klasifikasi_informasi`
  ADD PRIMARY KEY (`id_ki`);

--
-- Indexes for table `klasifikasi_intangible`
--
ALTER TABLE `klasifikasi_intangible`
  ADD PRIMARY KEY (`id_in`);

--
-- Indexes for table `klasifikasi_layanan`
--
ALTER TABLE `klasifikasi_layanan`
  ADD PRIMARY KEY (`id_kl`);

--
-- Indexes for table `klasifikasi_sdm`
--
ALTER TABLE `klasifikasi_sdm`
  ADD PRIMARY KEY (`id_ksdm`);

--
-- Indexes for table `klasifikasi_software`
--
ALTER TABLE `klasifikasi_software`
  ADD PRIMARY KEY (`id_ksw`);

--
-- Indexes for table `level`
--
ALTER TABLE `level`
  ADD PRIMARY KEY (`id_level`);

--
-- Indexes for table `menu`
--
ALTER TABLE `menu`
  ADD PRIMARY KEY (`id_menu`);

--
-- Indexes for table `organisasi_sk`
--
ALTER TABLE `organisasi_sk`
  ADD PRIMARY KEY (`id_sko`);

--
-- Indexes for table `organisasi_st`
--
ALTER TABLE `organisasi_st`
  ADD PRIMARY KEY (`id_st`);

--
-- Indexes for table `organisasi_struktur`
--
ALTER TABLE `organisasi_struktur`
  ADD PRIMARY KEY (`id_su`);

--
-- Indexes for table `organisasi_tujuan`
--
ALTER TABLE `organisasi_tujuan`
  ADD PRIMARY KEY (`id_ot`);

--
-- Indexes for table `pengaturan`
--
ALTER TABLE `pengaturan`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `pengguna`
--
ALTER TABLE `pengguna`
  ADD PRIMARY KEY (`username`);

--
-- Indexes for table `regulasi`
--
ALTER TABLE `regulasi`
  ADD PRIMARY KEY (`id_regulasi`);

--
-- Indexes for table `regulasi_perka`
--
ALTER TABLE `regulasi_perka`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `resiko_dampak`
--
ALTER TABLE `resiko_dampak`
  ADD PRIMARY KEY (`nilai`);

--
-- Indexes for table `resiko_fisik`
--
ALTER TABLE `resiko_fisik`
  ADD PRIMARY KEY (`id_rfisik`);

--
-- Indexes for table `resiko_informasi`
--
ALTER TABLE `resiko_informasi`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `resiko_intangible`
--
ALTER TABLE `resiko_intangible`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `resiko_layanan`
--
ALTER TABLE `resiko_layanan`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `resiko_paparan`
--
ALTER TABLE `resiko_paparan`
  ADD PRIMARY KEY (`nilai`);

--
-- Indexes for table `resiko_pengancam`
--
ALTER TABLE `resiko_pengancam`
  ADD PRIMARY KEY (`nilai`);

--
-- Indexes for table `resiko_rentan`
--
ALTER TABLE `resiko_rentan`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `resiko_rentan_jenis`
--
ALTER TABLE `resiko_rentan_jenis`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `resiko_rentan_kategori`
--
ALTER TABLE `resiko_rentan_kategori`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `resiko_rentan_nilai`
--
ALTER TABLE `resiko_rentan_nilai`
  ADD PRIMARY KEY (`nilai`);

--
-- Indexes for table `resiko_sdm`
--
ALTER TABLE `resiko_sdm`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `resiko_sk`
--
ALTER TABLE `resiko_sk`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `resiko_software`
--
ALTER TABLE `resiko_software`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `resiko_sop`
--
ALTER TABLE `resiko_sop`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `submenu`
--
ALTER TABLE `submenu`
  ADD PRIMARY KEY (`id_submenu`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `aset_integritas`
--
ALTER TABLE `aset_integritas`
  MODIFY `id_integritas` int(1) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `aset_kerahasiaan`
--
ALTER TABLE `aset_kerahasiaan`
  MODIFY `id_rahasia` int(1) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `aset_ketersediaan`
--
ALTER TABLE `aset_ketersediaan`
  MODIFY `id_sedia` int(1) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `gangguan_dampak`
--
ALTER TABLE `gangguan_dampak`
  MODIFY `id_dampak` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `gangguan_jenis`
--
ALTER TABLE `gangguan_jenis`
  MODIFY `id_jenis` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `gangguan_kategori`
--
ALTER TABLE `gangguan_kategori`
  MODIFY `id_kategori` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `gangguan_prioritas`
--
ALTER TABLE `gangguan_prioritas`
  MODIFY `id_prioritas` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `gangguan_tipe`
--
ALTER TABLE `gangguan_tipe`
  MODIFY `id_tipe` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `gangguan_urgensi`
--
ALTER TABLE `gangguan_urgensi`
  MODIFY `id_urgensi` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `gangguan_user`
--
ALTER TABLE `gangguan_user`
  MODIFY `id_user` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `jenis_aset_fisik`
--
ALTER TABLE `jenis_aset_fisik`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT for table `klasifikasi_aset_fisik`
--
ALTER TABLE `klasifikasi_aset_fisik`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `klasifikasi_informasi`
--
ALTER TABLE `klasifikasi_informasi`
  MODIFY `id_ki` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `klasifikasi_intangible`
--
ALTER TABLE `klasifikasi_intangible`
  MODIFY `id_in` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `klasifikasi_layanan`
--
ALTER TABLE `klasifikasi_layanan`
  MODIFY `id_kl` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `klasifikasi_sdm`
--
ALTER TABLE `klasifikasi_sdm`
  MODIFY `id_ksdm` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `klasifikasi_software`
--
ALTER TABLE `klasifikasi_software`
  MODIFY `id_ksw` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `level`
--
ALTER TABLE `level`
  MODIFY `id_level` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `resiko_rentan`
--
ALTER TABLE `resiko_rentan`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `resiko_rentan_jenis`
--
ALTER TABLE `resiko_rentan_jenis`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

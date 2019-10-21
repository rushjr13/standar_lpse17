-- phpMyAdmin SQL Dump
-- version 4.9.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 04 Okt 2019 pada 02.59
-- Versi server: 10.4.6-MariaDB
-- Versi PHP: 7.3.8

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
-- Struktur dari tabel `akses_menu`
--

CREATE TABLE `akses_menu` (
  `id_am` int(10) NOT NULL,
  `username` varchar(255) NOT NULL,
  `id_menu` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `akses_menu`
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
-- Struktur dari tabel `aset_fisik`
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
-- Dumping data untuk tabel `aset_fisik`
--

INSERT INTO `aset_fisik` (`idf`, `nama`, `id_klasifikasiaset`, `id_jenisaset`, `spesifikasi`, `pemilik`, `penyedia`, `pemegang`, `lokasi`, `berlaku`, `kerahasiaan`, `integritas`, `ketersediaan`, `keterangan`, `username`, `tgl_update`) VALUES
('F1569815670', 'Hardisk External', 1, 1, '1 TB', 'Kepala LPSE', 'CV. Angin Media', 'Arsad Abas', 'Ruang Verifikasi', '2019-09-05', '3', '3', '3', '', 'admin', 1569815698),
('F1569896299', 'Laptop', 2, 2, 'HP 6520s, XP Prof, Cote 2 Duo  Cache, (1,8Ghz) 800 Mhz FSB, 2 MB L2 IGBM, 667 DDR2, 120 GB (5400 RPM 1280x800 max res, VCA Intel GMA X3100 upto 384 shared), Integmted or PCMCIA Ethemet l0/100/1000, RI45, 16-bits, built in two speakers and microphone, Universal power 110-220v.', 'Kepala LPSE', 'CV. Angin Media', 'Arsad Abas', 'Ruang Admin', '2019-10-01', '3', '3', '3', '', 'admin', 1569896368),
('F1569899790', 'Power Disaibution Unit ABBA', 3, 3, 'PDU for Server, 3x vertical PDU, EC 40A 220 VA, mounting bracket 19\" flat shelf mountin & 3x12 PDU', 'Kepala LPSE', 'PT. Bhinneka Jakarta', 'Arsad Abas', 'Ruang Server/Admin', '2019-10-01', '3', '3', '3', '', 'admin', 1569899837),
('F1569899901', 'UPS', 3, 4, 'UPS For Server APC, APCSUA22ooRmi2U, 1980 waus, 220vA,230v, Height 2U, Operating humidity 30-90%, Back up time at tull load 15,7 minutes halfload 5,2 minutes full load, Operating ternpemture 540oC.Software Powerchute business edition', 'Kepala LPSE', 'PT. Bhinneka Jakarta', 'Fanky Abas, S.Kom', 'Ruang Server/Admin', '2019-10-01', '3', '3', '3', '', 'admin', 1569899969);

-- --------------------------------------------------------

--
-- Struktur dari tabel `aset_informasi`
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
-- Dumping data untuk tabel `aset_informasi`
--

INSERT INTO `aset_informasi` (`id`, `nama`, `klasifikasi`, `format`, `pemilik`, `berlaku`, `kerahasiaan`, `integritas`, `ketersediaan`, `keterangan`, `username`, `tgl_update`) VALUES
('i1568860821', 'Pencatatan Permasalahan', 'Dokumen Tertulis Internal', 'Dokumen Elektronik', 'Unit Pelatihan dan Helpdesk', '-', '2', '2', '3', '', 'admin', 1568862259);

-- --------------------------------------------------------

--
-- Struktur dari tabel `aset_intangible`
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
-- Dumping data untuk tabel `aset_intangible`
--

INSERT INTO `aset_intangible` (`idi`, `nama`, `klasifikasi`, `pemilik`, `kerahasiaan`, `integritas`, `ketersediaan`, `keterangan`, `username`, `tgl_update`) VALUES
('IT1569992822', 'Kualitas Penyelesaian Masalah', 'Layanan-Layanan', 'Unit Pelatihan dan Helpdesk', '1', '3', '2', '', 'admin', 1569992942);

-- --------------------------------------------------------

--
-- Struktur dari tabel `aset_integritas`
--

CREATE TABLE `aset_integritas` (
  `id_integritas` int(1) NOT NULL,
  `nama_integritas` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `aset_integritas`
--

INSERT INTO `aset_integritas` (`id_integritas`, `nama_integritas`) VALUES
(1, 'Rendah'),
(2, 'Sedang'),
(3, 'Tinggi');

-- --------------------------------------------------------

--
-- Struktur dari tabel `aset_kerahasiaan`
--

CREATE TABLE `aset_kerahasiaan` (
  `id_rahasia` int(1) NOT NULL,
  `nama_rahasia` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `aset_kerahasiaan`
--

INSERT INTO `aset_kerahasiaan` (`id_rahasia`, `nama_rahasia`) VALUES
(1, 'Rendah'),
(2, 'Sedang'),
(3, 'Tinggi');

-- --------------------------------------------------------

--
-- Struktur dari tabel `aset_ketersediaan`
--

CREATE TABLE `aset_ketersediaan` (
  `id_sedia` int(1) NOT NULL,
  `nama_sedia` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `aset_ketersediaan`
--

INSERT INTO `aset_ketersediaan` (`id_sedia`, `nama_sedia`) VALUES
(1, 'Rendah'),
(2, 'Sedang'),
(3, 'Tinggi');

-- --------------------------------------------------------

--
-- Struktur dari tabel `aset_layanan`
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
-- Dumping data untuk tabel `aset_layanan`
--

INSERT INTO `aset_layanan` (`idl`, `nama`, `klasifikasi`, `pemilik`, `pemegang`, `penyedia`, `kontrak_no`, `kontrak_deskripsi`, `kontrak_berlaku`, `kerahasiaan`, `integritas`, `ketersediaan`, `keterangan`, `username`, `tgl_update`) VALUES
('LY1569988223', 'Jaringan Internet Utama', 'Jaringan Internet Khusus', 'Kepala LPSE', 'Administrator System', 'PT. Telkom Indonesia', '-', 'Uptime 100 %', '2019-10-02', '1', '2', '3', 'Astinet', 'admin', 1569989317);

-- --------------------------------------------------------

--
-- Struktur dari tabel `aset_sdm`
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
-- Dumping data untuk tabel `aset_sdm`
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
-- Struktur dari tabel `aset_sk`
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
-- Dumping data untuk tabel `aset_sk`
--

INSERT INTO `aset_sk` (`id`, `nomor`, `tanggal`, `nama`, `tentang`, `berlaku`, `berakhir`, `file`, `username`, `tgl_update`) VALUES
('SK1570001916', '12', '2019-10-02', 'SK Kepala LPSE Provinsi Gorontalo', 'Koordinator dan Pengelola Aset Layanan', '2019-10-03', '2019-10-31', 'spek_p2e.PDF', 'admin', 1570002966);

-- --------------------------------------------------------

--
-- Struktur dari tabel `aset_software`
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
-- Dumping data untuk tabel `aset_software`
--

INSERT INTO `aset_software` (`ids`, `nama`, `klasifikasi`, `pemilik`, `pemegang`, `lokasi`, `berlaku`, `hapus`, `kerahasiaan`, `integritas`, `ketersediaan`, `keterangan`, `username`, `tgl_update`) VALUES
('SW1569908399', 'Windows 7', 'Operating System', 'Kepala LPSE', 'Dr. Wahyudin A. Katili, S.STP, MT', 'Laptop Helpdesk', '2019-10-01', 'Delete Normal', '1', '2', '3', '', 'admin', 1569909324);

-- --------------------------------------------------------

--
-- Struktur dari tabel `aset_sop`
--

CREATE TABLE `aset_sop` (
  `id` varchar(10) NOT NULL,
  `nama` varchar(255) NOT NULL,
  `isi` text NOT NULL,
  `tabel` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `aset_sop`
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
-- Struktur dari tabel `jenis_aset_fisik`
--

CREATE TABLE `jenis_aset_fisik` (
  `id` int(11) NOT NULL,
  `nama_jenisaset` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `jenis_aset_fisik`
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
-- Struktur dari tabel `klasifikasi_aset_fisik`
--

CREATE TABLE `klasifikasi_aset_fisik` (
  `id` int(11) NOT NULL,
  `nama_klasifikasi` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `klasifikasi_aset_fisik`
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
-- Struktur dari tabel `level`
--

CREATE TABLE `level` (
  `id_level` int(11) NOT NULL,
  `nama_level` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `level`
--

INSERT INTO `level` (`id_level`, `nama_level`) VALUES
(1, 'Admin'),
(2, 'Koordinator');

-- --------------------------------------------------------

--
-- Struktur dari tabel `menu`
--

CREATE TABLE `menu` (
  `id_menu` varchar(10) NOT NULL,
  `nama_menu` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `menu`
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
-- Struktur dari tabel `organisasi_sk`
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
-- Struktur dari tabel `organisasi_st`
--

CREATE TABLE `organisasi_st` (
  `id_st` int(10) NOT NULL,
  `id_su` int(10) NOT NULL,
  `jabatan_st` varchar(255) NOT NULL,
  `tugas_st` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Struktur dari tabel `organisasi_struktur`
--

CREATE TABLE `organisasi_struktur` (
  `id_su` int(10) NOT NULL,
  `jabatan_su` varchar(255) NOT NULL,
  `tugas_su` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Struktur dari tabel `organisasi_tujuan`
--

CREATE TABLE `organisasi_tujuan` (
  `id_ot` varchar(6) NOT NULL,
  `isi_ot` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `organisasi_tujuan`
--

INSERT INTO `organisasi_tujuan` (`id_ot`, `isi_ot`) VALUES
('gambar', 'strukturorganisasi.png'),
('tujuan', '<p style=\"text-align:justify\">Dalam rangka pelaksanaan pengelolaan Layanan Pengadaan Secara Elektronik (LPSE) diperlukan optimalisasi peran yang bertanggungjawab dalam penerapan pengelolaan layanan. Untuk itu dipandang perlu membentuk tim yang selaras dengan kerangka kerja LPSE, yang bertujuan:</p>\r\n\r\n<ol>\r\n	<li style=\"text-align:justify\">Memastikan bahwa setiap personil LPSE mengambil peran melaksanakan tugas dan tanggungjawabnya dengan baik;</li>\r\n	<li style=\"text-align:justify\">Mensinergikan proses di seluruh area LPSE guna mewujudkan tata kelola IT Service Management (ITSM) yang baik, efektif dan efisien;</li>\r\n	<li style=\"text-align:justify\">Untuk memudahkan evaluasi dan monitoring sebagai bahan perbaikan agar LPSE dapat mewujudkan layanan TIK yang prima;</li>\r\n	<li style=\"text-align:justify\">Mendukung dan mewujudkan integritas Layanan Pengadaan Secara Elektronik yang handal;</li>\r\n	<li style=\"text-align:justify\">Memberikan perbaikan dan pelaksanaan ITSM yang sesuai denganstandardisasi layanan.</li>\r\n</ol>\r\n');

-- --------------------------------------------------------

--
-- Struktur dari tabel `pengaturan`
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
-- Dumping data untuk tabel `pengaturan`
--

INSERT INTO `pengaturan` (`id`, `nama_web`, `alias`, `url`, `alamat`, `telpon`, `email`, `jam_kerja`, `facebook`, `instagram`, `twitter`, `logo`, `icon`, `map`, `info`) VALUES
('atur', 'Standard COE LPSE', 'LPS', 'http://localhost/standarlpse_17/', '<p>Biro Pengadaan Setda Provinsi Gorontalo<br />\r\nJl. Sapta Marga Kel. Botu Kec. Dumbo Raya Kota Gorontalo 96118</p>\r\n', '(0435) 821277', 'lpse_gtloprov@gmail.com', 'Senin - Jumat | 08.00 - 16.30 WITA', 'lpsecoe_gtloprov', 'lpsecoe_gtloprov', 'lpsecoe_gtloprov', 'logo.png', 'icon2.png', 'https://maps.google.com/maps?q=kantor%20gubernur%20gorontalo&amp;t=&amp;z=15&amp;ie=UTF8&amp;iwloc=&amp;output=embed', '<p>17 Standar LPSE untuk menjadi&nbsp;<em>Center Of Excellent</em> (COE)</p>\r\n');

-- --------------------------------------------------------

--
-- Struktur dari tabel `pengguna`
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
-- Dumping data untuk tabel `pengguna`
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
-- Struktur dari tabel `regulasi`
--

CREATE TABLE `regulasi` (
  `id_regulasi` varchar(255) NOT NULL,
  `nama_regulasi` varchar(255) NOT NULL,
  `isi_regulasi` text NOT NULL,
  `tgl_update` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `regulasi`
--

INSERT INTO `regulasi` (`id_regulasi`, `nama_regulasi`, `isi_regulasi`, `tgl_update`) VALUES
('kebijakan_keamanan_informasi', 'Kebijakan Keamanan Informasi', '<ol>\r\n	<li style=\"text-align:justify\"><span style=\"font-size:11pt\"><span style=\"font-family:Calibri,sans-serif\"><span style=\"font-size:12.0pt\">Mengikuti perkembangan kebijakan keamanan informasi;</span></span></span></li>\r\n	<li style=\"text-align:justify\"><span style=\"font-size:11pt\"><span style=\"font-family:Calibri,sans-serif\"><span style=\"font-size:12.0pt\">Meningkatkan kesadaran dan kompetensi pengelola LPSE dalam hal keamanan informasi;</span></span></span></li>\r\n	<li style=\"text-align:justify\"><span style=\"font-size:11pt\"><span style=\"font-family:Calibri,sans-serif\"><span style=\"font-size:12.0pt\">Melakukan proses pengawasan keamanan informasi layanan;</span></span></span></li>\r\n	<li style=\"text-align:justify\"><span style=\"font-size:11pt\"><span style=\"font-family:Calibri,sans-serif\"><span style=\"font-size:12.0pt\">Penggunaan format dokumen dan rekaman sesuai dengan ketentuan keamanan informasi layanan, termasuk didalamnya pengklasifikasian informasi yang terkandung didalamnya;</span></span></span></li>\r\n	<li style=\"text-align:justify\"><span style=\"font-size:11pt\"><span style=\"font-family:Calibri,sans-serif\"><span style=\"font-size:12.0pt\">Melakukan kaji ulang secara berkala kinerja system pengelolaan keamanan informasi layanan;</span></span></span></li>\r\n	<li style=\"text-align:justify\"><span style=\"font-size:11pt\"><span style=\"font-family:Calibri,sans-serif\"><span style=\"font-size:12.0pt\">Penggunaan kata sandi harus memenuhi kriteria keamanan minimum, sebagai berikut:</span></span></span>\r\n	<ol style=\"list-style-type:lower-alpha\">\r\n		<li style=\"text-align:justify\"><span style=\"font-size:11pt\"><span style=\"font-family:Calibri,sans-serif\"><span style=\"font-size:12.0pt\">Terdiri dari 10 karakter;</span></span></span></li>\r\n		<li style=\"text-align:justify\"><span style=\"font-size:11pt\"><span style=\"font-family:Calibri,sans-serif\"><span style=\"font-size:12.0pt\">Terdiri dari huruf (besar dan kecil), angka dan karakter special (tanda baca);</span></span></span></li>\r\n		<li style=\"text-align:justify\"><span style=\"font-size:11pt\"><span style=\"font-family:Calibri,sans-serif\"><span style=\"font-size:12.0pt\">Tidak menggunakan kata-kata atau informasi yang mudah ditebak, misalnya nama anak, tanggal lahir, kota kelahiran, dll;</span></span></span></li>\r\n		<li style=\"text-align:justify\"><span style=\"font-size:11pt\"><span style=\"font-family:Calibri,sans-serif\"><span style=\"font-size:12.0pt\">Penyimpanan kata sandi dalam bentuk tertulis untuk semua media, baik cetak maupun elektronik tidak diperkenankan kecuali dalam bentuk terenkripsi.</span></span></span></li>\r\n	</ol>\r\n	</li>\r\n	<li style=\"text-align:justify\"><span style=\"font-size:11pt\"><span style=\"font-family:Calibri,sans-serif\"><span style=\"font-size:12.0pt\">Melakukan backup terhadap semua informasi teknis yang bersifat kritis, misalnya konfigurasi sistem, arsitektur sistem, dll; </span></span></span></li>\r\n	<li style=\"text-align:justify\"><span style=\"font-size:11pt\"><span style=\"font-family:Calibri,sans-serif\"><span style=\"font-size:12.0pt\">Melakukan pengamanan media penyimpanan utama maupun backup sesuai dengan nilai risiko yang terkandung didalamnya.</span></span></span></li>\r\n</ol>\r\n', 1568087778),
('kebijakan_layanan', 'Kebijakan Layanan', '<ol>\r\n	<li style=\"text-align:justify\"><span style=\"font-size:11pt\"><span style=\"font-family:Calibri,sans-serif\"><span style=\"font-size:12.0pt\">Mengutamakan </span><span style=\"font-size:12.0pt\">pemenuhan </span><span style=\"font-size:12.0pt\">mutu </span><span style=\"font-size:12.0pt\">layanan dan </span><span style=\"font-size:12.0pt\">kepuasan pelanggan</span><span style=\"font-size:12.0pt\"> sesuai Standar Operasional Prosedur Umum LPSE</span><span style=\"font-size:12.0pt\">;</span></span></span></li>\r\n	<li style=\"text-align:justify\"><span style=\"font-size:11pt\"><span style=\"font-family:Calibri,sans-serif\"><span style=\"font-size:12.0pt\">Mengkomunikasikan komitmen kepada seluruh pengguna </span><span style=\"font-size:12.0pt\">LPSE </span><span style=\"font-size:12.0pt\">untuk memberikan pelayanan terbaik;</span></span></span></li>\r\n	<li style=\"text-align:justify\"><span style=\"font-size:11pt\"><span style=\"font-family:Calibri,sans-serif\"><span style=\"font-size:12.0pt\">Menggunakan kerangka kerja dalam setiap proses penyelenggaraan layanan guna mencapai tujuan dari pengelolaan layanan;</span></span></span></li>\r\n	<li style=\"text-align:justify\"><span style=\"font-size:11pt\"><span style=\"font-family:Calibri,sans-serif\"><span style=\"font-size:12.0pt\">Melakukan kaji ulang secara berkala kinerja sistem pengelolaan layanan;</span></span></span></li>\r\n	<li style=\"text-align:justify\"><span style=\"font-size:11pt\"><span style=\"font-family:Calibri,sans-serif\"><span style=\"font-size:12.0pt\">Senantiasa melakukan perbaikan berkelanjutan pada </span><span style=\"font-size:12.0pt\">pengelolaan layanan</span><span style=\"font-size:12.0pt\">, sesuai dengan kaidah yang berlaku secara umum</span><span style=\"font-size:12.0pt\">.</span></span></span></li>\r\n</ol>\r\n', 1568087746),
('kebijakan_umum', 'Kebijakan Umum', '<ol>\r\n	<li style=\"text-align:justify\"><span style=\"font-size:11pt\"><span style=\"font-family:Calibri,sans-serif\"><span style=\"font-size:12.0pt\">Mematuhi seluruh peraturan dan perundangan yang berlaku di Republik Indonesia, terutama peraturan yang terkait dengan pengadaan barang/jasa pemerintah, pelayanan publik, hak cipta, dan informasi dan transaksi elektronik;</span></span></span></li>\r\n	<li style=\"text-align:justify\"><span style=\"font-size:11pt\"><span style=\"font-family:Calibri,sans-serif\"><span style=\"font-size:12.0pt\">Mematuhi dan menjalankan semua prosedur internal yang berlaku di LPSE.</span></span></span></li>\r\n</ol>\r\n', 1568087713);

-- --------------------------------------------------------

--
-- Struktur dari tabel `regulasi_perka`
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
-- Struktur dari tabel `submenu`
--

CREATE TABLE `submenu` (
  `id_submenu` varchar(10) NOT NULL,
  `id_menu` varchar(10) NOT NULL,
  `nama_submenu` varchar(255) NOT NULL,
  `link` varchar(255) NOT NULL,
  `icon` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `submenu`
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
-- Indeks untuk tabel `akses_menu`
--
ALTER TABLE `akses_menu`
  ADD PRIMARY KEY (`id_am`);

--
-- Indeks untuk tabel `aset_fisik`
--
ALTER TABLE `aset_fisik`
  ADD PRIMARY KEY (`idf`);

--
-- Indeks untuk tabel `aset_informasi`
--
ALTER TABLE `aset_informasi`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `aset_intangible`
--
ALTER TABLE `aset_intangible`
  ADD PRIMARY KEY (`idi`);

--
-- Indeks untuk tabel `aset_integritas`
--
ALTER TABLE `aset_integritas`
  ADD PRIMARY KEY (`id_integritas`);

--
-- Indeks untuk tabel `aset_kerahasiaan`
--
ALTER TABLE `aset_kerahasiaan`
  ADD PRIMARY KEY (`id_rahasia`);

--
-- Indeks untuk tabel `aset_ketersediaan`
--
ALTER TABLE `aset_ketersediaan`
  ADD PRIMARY KEY (`id_sedia`);

--
-- Indeks untuk tabel `aset_layanan`
--
ALTER TABLE `aset_layanan`
  ADD PRIMARY KEY (`idl`);

--
-- Indeks untuk tabel `aset_sdm`
--
ALTER TABLE `aset_sdm`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `aset_sk`
--
ALTER TABLE `aset_sk`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `aset_software`
--
ALTER TABLE `aset_software`
  ADD PRIMARY KEY (`ids`);

--
-- Indeks untuk tabel `aset_sop`
--
ALTER TABLE `aset_sop`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `jenis_aset_fisik`
--
ALTER TABLE `jenis_aset_fisik`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `klasifikasi_aset_fisik`
--
ALTER TABLE `klasifikasi_aset_fisik`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `level`
--
ALTER TABLE `level`
  ADD PRIMARY KEY (`id_level`);

--
-- Indeks untuk tabel `menu`
--
ALTER TABLE `menu`
  ADD PRIMARY KEY (`id_menu`);

--
-- Indeks untuk tabel `organisasi_sk`
--
ALTER TABLE `organisasi_sk`
  ADD PRIMARY KEY (`id_sko`);

--
-- Indeks untuk tabel `organisasi_st`
--
ALTER TABLE `organisasi_st`
  ADD PRIMARY KEY (`id_st`);

--
-- Indeks untuk tabel `organisasi_struktur`
--
ALTER TABLE `organisasi_struktur`
  ADD PRIMARY KEY (`id_su`);

--
-- Indeks untuk tabel `organisasi_tujuan`
--
ALTER TABLE `organisasi_tujuan`
  ADD PRIMARY KEY (`id_ot`);

--
-- Indeks untuk tabel `pengaturan`
--
ALTER TABLE `pengaturan`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `pengguna`
--
ALTER TABLE `pengguna`
  ADD PRIMARY KEY (`username`);

--
-- Indeks untuk tabel `regulasi`
--
ALTER TABLE `regulasi`
  ADD PRIMARY KEY (`id_regulasi`);

--
-- Indeks untuk tabel `regulasi_perka`
--
ALTER TABLE `regulasi_perka`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `submenu`
--
ALTER TABLE `submenu`
  ADD PRIMARY KEY (`id_submenu`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `aset_integritas`
--
ALTER TABLE `aset_integritas`
  MODIFY `id_integritas` int(1) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT untuk tabel `aset_kerahasiaan`
--
ALTER TABLE `aset_kerahasiaan`
  MODIFY `id_rahasia` int(1) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT untuk tabel `aset_ketersediaan`
--
ALTER TABLE `aset_ketersediaan`
  MODIFY `id_sedia` int(1) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT untuk tabel `jenis_aset_fisik`
--
ALTER TABLE `jenis_aset_fisik`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT untuk tabel `klasifikasi_aset_fisik`
--
ALTER TABLE `klasifikasi_aset_fisik`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT untuk tabel `level`
--
ALTER TABLE `level`
  MODIFY `id_level` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

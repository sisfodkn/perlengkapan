-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 02, 2022 at 02:26 PM
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
-- Database: `perlengkapan`
--

-- --------------------------------------------------------

--
-- Table structure for table `atk`
--

CREATE TABLE `atk` (
  `id` int(10) UNSIGNED NOT NULL,
  `nama_atk` varchar(100) NOT NULL,
  `kategori_atk` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `atk`
--

INSERT INTO `atk` (`id`, `nama_atk`, `kategori_atk`) VALUES
(7, 'Pensil', 'ATK');

-- --------------------------------------------------------

--
-- Table structure for table `coba`
--

CREATE TABLE `coba` (
  `id` int(11) NOT NULL,
  `nip_nrp` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `coba`
--

INSERT INTO `coba` (`id`, `nip_nrp`) VALUES
(1, '123'),
(2, '234'),
(3, '345'),
(4, '456'),
(5, '567');

-- --------------------------------------------------------

--
-- Table structure for table `detail_permintaan_pengadaan`
--

CREATE TABLE `detail_permintaan_pengadaan` (
  `id_permintaan` int(11) NOT NULL,
  `id_atk` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `distribusi_permintaan_pengadaan`
--

CREATE TABLE `distribusi_permintaan_pengadaan` (
  `id` int(10) UNSIGNED NOT NULL,
  `id_permintaan_pengadaan` int(10) UNSIGNED NOT NULL,
  `status` varchar(2) DEFAULT NULL,
  `tgl_kirim` datetime DEFAULT NULL,
  `tgl_terkirim` datetime DEFAULT NULL,
  `tgl_terima` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `distribusi_permintaan_pengadaan`
--

INSERT INTO `distribusi_permintaan_pengadaan` (`id`, `id_permintaan_pengadaan`, `status`, `tgl_kirim`, `tgl_terkirim`, `tgl_terima`) VALUES
(11, 11, '3', '2022-07-25 00:00:00', '2022-07-25 00:00:00', '2022-08-08 02:51:35'),
(13, 12, '3', '2022-08-05 00:00:00', '2022-08-05 00:00:00', '2022-08-08 04:00:46'),
(14, 13, '3', '2022-07-28 00:00:00', '2022-07-28 00:00:00', '2022-08-10 10:26:07'),
(16, 14, '3', '2022-08-02 00:00:00', '2022-08-02 00:00:00', '2022-08-10 10:26:07'),
(23, 22, '3', '2022-08-02 00:00:00', '2022-08-02 00:00:00', '2022-08-10 10:26:07'),
(28, 16, '3', '2022-08-02 00:00:00', '2022-08-02 00:00:00', '2022-08-10 10:26:07'),
(29, 17, '3', '2022-08-02 00:00:00', '2022-08-02 00:00:00', '2022-08-10 10:26:07'),
(30, 18, '3', '2022-08-02 00:00:00', '2022-08-02 00:00:00', '2022-08-10 10:26:07'),
(31, 19, '3', '2022-08-02 00:00:00', '2022-08-02 00:00:00', '2022-08-10 10:26:07'),
(32, 20, '3', '2022-08-02 00:00:00', '2022-08-02 00:00:00', '2022-08-10 10:26:07'),
(33, 21, '3', '2022-08-02 00:00:00', '2022-08-02 00:00:00', '2022-08-10 10:26:07'),
(35, 23, '3', '2022-08-03 00:00:00', '2022-08-03 00:00:00', '2022-08-10 10:26:07'),
(36, 24, '3', '2022-08-03 00:00:00', '2022-08-03 00:00:00', '2022-08-10 10:26:07'),
(38, 25, '3', '2022-08-03 00:00:00', '2022-08-03 00:00:00', '2022-08-10 10:26:07'),
(42, 28, '3', '2022-08-03 00:00:00', '2022-08-03 00:00:00', '2022-08-10 10:26:07'),
(44, 30, '3', '2022-08-04 00:00:00', '2022-08-04 00:00:00', '2022-08-10 10:26:07'),
(45, 31, '3', '2022-08-04 00:00:00', '2022-08-04 00:00:00', '2022-08-10 10:26:07'),
(46, 32, '3', '2022-08-04 00:00:00', '2022-08-04 00:00:00', '2022-08-10 10:26:07'),
(47, 26, '3', '2022-08-03 00:00:00', '2022-08-03 00:00:00', '2022-08-10 10:26:07'),
(48, 27, '3', '2022-08-03 00:00:00', '2022-08-03 00:00:00', '2022-08-10 10:26:07'),
(50, 29, '3', '2022-08-03 00:00:00', '2022-08-03 00:00:00', '2022-08-10 10:26:07');

-- --------------------------------------------------------

--
-- Table structure for table `distribusi_randis`
--

CREATE TABLE `distribusi_randis` (
  `id` int(10) UNSIGNED NOT NULL,
  `id_kendaraan_dinas` int(10) UNSIGNED NOT NULL,
  `id_pegawai` int(10) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `distribusi_randis`
--

INSERT INTO `distribusi_randis` (`id`, `id_kendaraan_dinas`, `id_pegawai`) VALUES
(4, 32, 51),
(5, 7, 1),
(6, 8, 2),
(7, 9, 4),
(8, 11, 5),
(9, 12, 24),
(10, 13, 22),
(11, 14, 23),
(12, 15, 20),
(13, 17, 36);

-- --------------------------------------------------------

--
-- Table structure for table `gedung`
--

CREATE TABLE `gedung` (
  `id` int(10) UNSIGNED NOT NULL,
  `nama_gedung` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `gedung`
--

INSERT INTO `gedung` (`id`, `nama_gedung`) VALUES
(1, 'Gedung Dewan Ketahanan Nasional Jl. Medan Merdeka Barat 15 Jakarta Pusat Lantai 3,4 dan 5 A, 5B'),
(2, 'Dewan Ketahanan Nasional Jl. Ir H. Juanda 36 Jakarta Pusat Lantai 4 dan 5 ');

-- --------------------------------------------------------

--
-- Table structure for table `jabatan`
--

CREATE TABLE `jabatan` (
  `id` int(10) UNSIGNED NOT NULL,
  `nama_jabatan` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `jabatan`
--

INSERT INTO `jabatan` (`id`, `nama_jabatan`) VALUES
(1, 'Sekretaris Jenderal'),
(2, 'Deputi Bidang Sistem Nasional'),
(3, 'Deputi Bidang Pengkajian dan Penginderaan'),
(4, 'Deputi Bidang Politik dan Strategi'),
(5, 'Deputi Bidang Pengembangan'),
(6, 'Kepala Biro Umum'),
(7, 'Kabag PPBJ'),
(8, 'Sub Koor Pok Pengadaan'),
(9, 'Sub Koor Pok BMN'),
(10, 'Sub Koor Pok Rumga'),
(11, 'Pengelola Instalasi TI'),
(12, 'Prakom Ahli Muda'),
(13, 'Analis SDM Aparatur'),
(14, 'Analis Kepegawaian Ahli Muda'),
(15, 'Analis Persandian'),
(16, 'Staf Ahli Bidang Ilmu Pengetahuan dan Teknologi'),
(17, 'Staf Ahli Bidang Sosial Budaya'),
(18, 'Staf Ahli Bidang Ekonomi'),
(19, 'Staf Ahli Bidang Hukum'),
(20, 'Staf Ahli Bidang Pertahanan Keamanan '),
(21, 'Pembantu Deputi Urusan Lingkungan Sosial, Desisnas'),
(22, 'Pembantu Deputi  Urusan Lingkungan Strategis Nasional, Dejiandra'),
(23, 'Pembantu Deputi  Urusan Lingkungan Strategis Nasional, Dejiandra'),
(24, 'Pembantu Deputi Urusan Hukum dan Perundang-Undangan, Debang '),
(25, 'Pembantu Deputi Urusan Strategi Nasional, Depolstra'),
(26, 'Pembantu Deputi Urusan Informasi dan Pengolahan Data, Desisnas'),
(27, 'Pembantu Deputi Urusan Politik Nasional, Depolstra'),
(28, 'Pembantu Deputi  Urusan Lingkungan Strategis Regional, Dejiandra '),
(29, 'Pembantu Deputi Urusan Pertahanan dan Keamanan,  Debang'),
(30, 'Pembantu Deputi Urusan Lingkungan Strategis Internasional, Dejiandra'),
(31, 'Pembantu Deputi Urusan Ekonomi, Debang'),
(32, 'Pembantu Deputi  Urusan Perencanaan Kontinjensi, Depolstra'),
(33, 'Pembantu Deputi Urusan Lingkungan Pemerintahan Negara, Desisnas '),
(34, 'Pembantu Deputi Urusan Lingkungan Alam, Desisnas'),
(35, 'Kepala Biro Perencanaan, Organisasi dan Keuangan'),
(36, 'Kepala Biro Umum'),
(37, 'Kepala Biro Persidangan, Sistem Informasi, dan Pengawasan Internal'),
(38, 'Analis Kebijakan Bidang Sumber Daya Alam, Desisnas '),
(39, 'Analis Kebijakan Bidang Rencana Kontinjensi Ekonomi, Depolstra'),
(40, 'Analis Kebijakan Bidang Rencana Kontinjensi Politik dan Keamanan, Depolstra'),
(41, 'Analis Kebijakan Bidang Pengembangan Mobilisasi dan Demobilisasi, Debang'),
(42, 'Analis Kebijakan Bidang Pengembangan Keuangan dan Moneter, Debang'),
(43, 'Analis Kebijakan Bidang Ekonomi Nasional, Dejiandra'),
(44, 'Analis Kebijakan Bidang Rencana Pembangunan Nasional Jangka Sedang dan Pendek, Depolstra'),
(45, 'Analis Kebijakan Bidang Perencanaan Strategi Pembangunan Nasional Jangka Panjang, '),
(46, 'Analis Kebijakan Bidang Pengembangan Hukum, Debang'),
(47, 'Analis Kebijakan Bidang Geografi, Desisnas'),
(48, 'Analis Kebijakan Bidang Kelembagaan, Desisnas '),
(49, 'Analis Kebijakan Bidang Pengembangan Penegakan Hukum, Debang'),
(50, 'Analis Kebijakan Bidang Politik Keamanan Nasional, Dejiandra'),
(51, 'Analis Kebijakan Bidang Sosial Budaya Regional, Dejiandra'),
(52, 'Analis Kebijakan Bidang Monitoring dan Evaluasi Politik Nasional, Depolstra'),
(53, 'Analis Kebijakan Bidang Ekonomi Regional, Dejiandra'),
(54, 'Analis Kebijakan Bidang Pullah Info, Desisnas'),
(55, 'Analis Kebijakan Bidang Sosial Budaya Nasional, Dejiandra'),
(56, 'Analis Kebijakan Bidang Pengumpulan dan Pengolahan Data Politik Nasional, Depolstra '),
(58, 'Analis Kebijakan Bidang Politik Keamanan Internasional, Dejiandra'),
(59, 'Analis Kebijakan Bidang Pengembangan Kesejahteraan Sosial, Debang'),
(60, 'Analis Kebijakan Bidang Pengembangan Keagamaan, Debang'),
(61, 'Analis Kebijakan Bidang Sosial Ekonomi, Desisnas'),
(62, 'Analis Kebijakan Bidang Sosial Budaya Internasional, Dejiandra'),
(63, 'Analis Kebijakan Bidang Pengembangan Sektor Riil, Debang '),
(64, 'Analis Kebijakan Bidang Politik Keamanan, Desisnas'),
(65, 'Analis Kebijakan Bidang Demografi, Desisnas'),
(66, 'Analis Kebijakan Bidang Sosial Budaya, Desisnas'),
(67, 'Analis Kebijakan Bidang Sosial Budaya, Desisnas'),
(68, 'Analis Kebijakan Bidang Sumber Daya Manusia, Desisnas'),
(69, 'Analis Kebijakan Bidang Pengembangan Jasa dan Pariwisata, Debang'),
(70, 'Analis Kebijakan Bidang Ketatalaksanaan dan Sarana Prasarana, Desisnas'),
(71, 'Analis Kebijakan Bidang Pengembangan Pendidikan, Debang'),
(72, 'Analis Kebijakan Bidang Pengembangan Bela Negara, Debang'),
(73, 'Analis Kebijakan Bidang Rencana Kontinjensi Sosial Budaya, Depolstra'),
(74, 'Analis Kebijakan Bidang Perumusan Pengkajian Politik Nasional, Depolstra '),
(75, 'Analis Kebijakan Bidang Pengembangan Perundang-undangan, Debang'),
(76, 'Analis Kebijakan Bidang Pengembangan Militer dan Kepolisian, Debang'),
(77, 'Kabag Perencanaan Biro POK'),
(78, 'Kepala Bagian Sistem Informasi, Biro PSP'),
(79, 'Kepala Bagian Persidangan dan Humas,Biro PSP'),
(80, 'Analis Kebijakan Ahli Madya   Koordinator Kelompok Organisasi dan Tata Laksana Biro POK'),
(81, 'Auditor Ahli Madya  Koordinator Kelompok Pengawasan Internal Biro PSP'),
(82, 'Analis Kepegawaian Ahli Madya  Koordinator Kelompok Kepegawaian dan Hukum Biro Umum'),
(83, 'Analis Pengelolaan Keuangan APBN Ahli Madya  Koordinator Kelompok Keuangan Biro POK'),
(84, 'Kabag Perlengkapan dan Pengadaan Barang/Jasa, Biro Umum'),
(85, 'Arsiparis Ahli Muda  Sub Koordinator Kelompok TU Desisnas  selaku Koordinator Kelompok Tata Usaha da'),
(86, 'Pengelola Pengadaan Barang dan Jasa Ahli Muda Sub Koordinator Kelompok Barang Milik Negara Bagian Pe'),
(87, 'Pranata Humas Ahli Muda Sub Koordinator Kelompok Hubungan Media dan Publikasi Kelompok Persidangan d'),
(88, 'Pranata Komputer Ahli Muda Sub Koordinator Kelompok Data dan Keamanan Informasi Kelompok Sistem Info'),
(89, 'Arsiparis Ahli Muda Sub Koordinator Kelompok TU Debang Kelompok TU dan Protokol Biro Umum'),
(90, 'Arsiparis Ahli Muda Sub Koordinator Kelompok TU Depolstra Kelompok TU dan Protokol Biro Umum'),
(91, 'Analis Kepegawaian Ahli Muda Sub Koordinator Kelompok Hukum Kelompok Kepegawaian dan Hukum Biro Umum'),
(92, 'Pengelola Pengadaan Barang dan Jasa Ahli Muda Sub Koordinator Kelompok Pengadaan Bagian Perlengkapan'),
(93, 'Analis Pengelolaan Keuangan APBN Ahli Muda  Sub Koordinator Kelompok Perbendaharaan Kelompok Keuanga'),
(94, 'Arsiparis Ahli Muda  Sub Koordinator Kelompok TU  Dejiandra Kelompok TU dan Protokol '),
(95, 'Arsiparis Ahli Muda Sub Koordinator Kelompok Protokol dan Pengamanan Kelompok TU dan Protokol Biro U'),
(96, 'Pengelola Pengadaan Barang dan Jasa Ahli Muda  Sub Koordinator Kelompok Rumah Tangga Bagian Perlengk'),
(97, 'Arsiparis Ahli Muda Sub Koordinator Kelompok Kearsipan Kelompok TU dan Protokol Biro Umum'),
(98, 'Analis Kebijakan Ahli Muda Sub Koordinator Kelompok Organisasi dan Fasilitasi RB Kelompok Organisasi'),
(99, 'Perencana Ahli Muda Sub Koordinator Kelompok Rencana Anggaran Bagian Perencanaan Biro POK'),
(100, 'Analis Kepegawaian Ahli Muda Sub Koordinator Kelompok Mutasi Pegawai dan Administrasi Kepegawaian Ke'),
(101, 'Perencana Ahli Muda  Sub Koordinator Kelompok Evaluasi dan Pelaporan Bagian Perencanaan  Biro POK'),
(102, 'Arsiparis Ahli Muda  Sub Koordinator Kelompok Persuratan Kelompok TU dan Protokol  Biro Umum'),
(103, 'Analis Kepegawaian Ahli Muda  Sub Koordinator Kelompok Disiplin dan Pengembangan Pegawai  Kelompok K'),
(104, 'Pranata Komputer Ahli Muda  Sub Koordinator Kelompok Teknologi Informasi Kelompok Sistem Informasi B'),
(105, 'Analis Pengelolaan Keuangan APBN Ahli Muda Sub Koordinator Kelompok Akuntansi dan '),
(106, 'Kasubbag Protokol dan TU Pimpinan Bagian Perlengkapan dan Pengadaan Barang/Jasa Biro Umum selaku Plt'),
(107, 'Sub Koordinator Kelompok Hubungan Antar Lembaga Kelompok Persidangan dan Humas Biro PSP'),
(108, 'Sub Koordinator Kelompok TU Sahli Kelompok TU dan Protokol Biro Umum'),
(109, 'Sub Kelompok Tata Laksana Kelompok Organisasi dan Tata Laksana Biro POK'),
(110, 'Sub Koordinator Kelompok Pelayanan Persidangan Kelompok Persidangan dan Humas Biro PSP'),
(111, 'Sub Koordinator Kelompok Rencana Program dan Kinerja Bagian Perencanaan Biro POK'),
(112, 'Sub Koordinator Kelompok Produksi, Dokumentasi dan Perpustakaan Kelompok Persidangan dan Humas Biro '),
(113, 'Analis Pengelolaan Keuangan APBN Ahli Muda Sub Koordinator Kelompok Verifikasi   Kelompok Keuangan B'),
(114, 'Analis Kebijakan BMN Sub Kelompok BMN Bagian Perlengkapan dan Pengadaan Barang/Jasa Biro Umum'),
(115, 'Analis Tata Usaha Sub Kelompok TU Debang Kelompok TU dan Protokol Biro Umum'),
(116, 'Penyuluh Kearsipan Sub Kelompok Kearsipan Kelompok TU dan Protokol Biro Umum'),
(117, 'Penyusun Risalah, Kelompok Persidangan dan Humas Biro PSP'),
(118, 'Analis Tata Usaha Sub Kelompok TU Sahli Kelompok TU dan Protokol Biro Umum'),
(119, 'Analis Tata Usaha Sub Bagian Protokol dan TU Pimpinan, Bagian Perlengkapan dan Pengadaan Barang/Jasa'),
(120, 'Analis Tata Usaha Sub Kelompok TU Desisnas, Kelompok TU dan Protokol Biro Umum selaku Sub Koordinato'),
(121, 'Analis Manajemen Perkantoran Sub Kelompok Tata Laksana Kelompok Organisasi dan Tata Laksana Biro POK'),
(122, 'Analis Tata Usaha Sub Kelompok TU Desisnas Kelompok TU dan Protokol Biro Umum'),
(123, 'Analis Laporan Akuntabilitas Kinerja  Sub Kelompok Evaluasi dan Pelaporan Bagian Perencanaan Biro PO'),
(124, 'Analis Organisasi dan Tata Laksana  Sub Kelompok Tata Laksana  Kelompok Ortala Biro POK'),
(125, 'Penata Keuangan Sub Kelompok Perbendaharaan Kelompok Keuangan Biro POK'),
(126, 'Analis Tata Usaha Sub Bagian Protokol dan TU Pimpinan Bagian Perlengkapan dan Pengadaan Barang/Jasa '),
(127, 'Analis Hukum Sub Kelompok Hukum Kelompok Kepegawaian dan Hukum Biro Umum'),
(128, 'Analis Persandian  Sub Kelompok Protokol dan Pengamanan Kelompok TU dan Protokol Biro Umum'),
(129, 'Analis Hubungan Antar Lembaga  Sub Kelompok Hubungan Antar Lembaga Kelompok Persidangan dan Humas Bi'),
(130, 'Pengelola Instalasi Teknologi Informasi Sub Kelompok TI Bagian Sisfo Biro PSP'),
(131, 'Analis Laporan Hasil Pengawasan  Sub Kelompok Tata Usaha  Kelompok Pengawasan Internal Biro PSP'),
(132, 'Pemeriksa Pelaporan dan Transaksi Keuangan Sub Kelompok Akuntansi dan Pelaporan  Kelompok Keuangan B'),
(133, 'Penelaah Kebijakan Pengadaan Barang/Jasa Sub Kelompok Pengadaan Bagian Perlengkapan dan Pengadaan Ba'),
(134, 'Analis Tata Usaha Sub Pok TU Sahli Kelompok TU dan Protokol Biro Umum'),
(135, 'Analis Kebijakan Barang Milik Negara Kelompok PPBJ Biro Umum'),
(136, 'Analis Tata Usaha Sub Pok TU Desisnas Kelompok TU dan Protokol Biro Umum'),
(137, 'Analis Hukum Kelompok Kepegawaian dan Hukum Biro Umum'),
(138, 'Auditor Ahli Pertama Kelompok Pengawasan Internal Biro PSP'),
(139, 'Analis Keuangan Kelompok Keuangan Biro POK'),
(140, 'Analis Laporan Akuntabilitas Kinerja Kelompok Perencanaan Biro POK'),
(141, 'Analis Rencana Program dan Kegiatan Kelompok Perencanaan Biro POK'),
(142, 'Analis Keuangan Kelompok Keuangan Biro POK'),
(143, 'Analis Kelembagaan Sub Kelompok Organisasi dan Fasilitasi RB Kelompok Organisasi dan Tata Laksana Bi'),
(144, 'Analis Persandian  Sub Kelompok Protokol dan Pengamanan Kelompok TU dan Protokol Biro Umum'),
(145, 'Analis Organisasi dan Tata Laksana  Sub Kelompok Tata Laksana  Kelompok Ortala Biro POK'),
(146, 'Analis Rencana Program dan Kegiatan Sub Kelompok Rencana Program dan Kinerja Bagian Perencanaan Biro'),
(147, 'Analis Laporan Akuntabilitas Kinerja  Sub Kelompok Evaluasi dan Pelaporan  Bagian Perencanaan Biro P'),
(148, 'Analis Sistem Informasi Perbendaharaan Sub Kelompok Perbendaharaan '),
(149, 'Auditor Ahli Pertama  Kelompok Pengawasan Internal Biro PSP'),
(150, 'Analis Sumber Daya Manusia Aparatur Sub Kelompok Mutasi Pegawai dan Adm Kepeg Kelompok Kepegawaian d'),
(151, 'Analis Sistem Informasi  Sub Kelompok Teknologi Informasi  Bagian Sisfo Biro PSP'),
(152, 'Analis Sistem Informasi  Sub Kelompok Teknologi Informasi  Bagian Sisfo Biro PSP'),
(153, 'Analis Konsultasi dan Bantuan Hukum Sub Kelompok Hukum Kelompok Kepegawaian dan Hukum Biro Umum'),
(154, 'Penyusun Norma, Standar, Prosedur dan Kriteria Sub Kelompok Tata Laksana  Kelompok Ortala Biro POK '),
(155, 'Analis Laporan Hasil Pengawasan  Sub Kelompok Tata Usaha  Kelompok Pengawasan Internal Biro PSP'),
(156, 'Analis Publikasi  Sub Kelompok Hubungan Media dan Publikasi  Kelompok Persidangan dan Humas Biro PSP'),
(158, 'Analis Sumber Daya Manusia Aparatur Sub Kelompok Mutasi Pegawai dan Adm Kepeg Kelompok Kepegawaian d'),
(159, 'Penata Keuangan Sub Kelompok Perbendaharaan Kelompok Keuangan Biro POK'),
(160, 'Pengelola Layanan Pengadaan Sub Kelompok pengadaan Bagian Perlengkapan dan Pengadaan Barang/Jasa Bir'),
(161, 'Pengelola Persidangan Sub Kelompok Pelayanan Sidang Kelompok Persidangan dan Humas Biro PSP'),
(162, 'Pengelola Keuangan Sub Kelompok TU Dejiandra Kelompok TU dan Protokol Biro Umum'),
(163, 'Pengelola Keuangan Sub Kelompok TU Depolstra Kelompok TU dan Protokol Biro Umum'),
(164, 'Bendahara  Sub Kelompok Perbendaharaan Biro POK'),
(165, 'Pengelola Penataan Sarana dan Prasarana Sub Kelompok Rumah Tangga Bagian Perlengkapan da Pengadaan B'),
(166, 'Pengadministrasi Sarana dan Prasarana  Sub Kelompok BMN Bagian Perlengkapan dan Pengadaan Barang/Jas'),
(167, 'Pengelola Instalasi Teknologi Informasi Sub Kelompok TI Bagian Sisfo Biro PSP'),
(168, 'Pengelola Keamanan Sistem Informasi Sub Kelompok Data Kaminfo Bagian Sisfo Biro PSP'),
(169, 'Pengelola Instalasi Teknologi Informasi Sub Kelompok TI Bagian Sisfo Biro PSP'),
(170, 'Pranata Komputer Terampil  Sub Kelompok TI Bagian Sisfo Biro PSP'),
(171, 'Pranata Komputer Terampil  Sub Kelompok Data Kaminfo Bagian Sisfo Biro '),
(172, 'Pengadministrasi Sarana dan Prasarana Sub Kelompok Rumah Tangga  Bagian Perlengkapan dan Pengadaan B'),
(173, 'Pengadministrasi Persuratan Sub Kelompok Persuratan Kelompok TU & Protokol Biro Umum'),
(174, 'Perawat Pelaksana Sub Kelompok Disiplin dan Pengembangan Pegawai Kelompok Kepegawaian dan Hukum Biro'),
(175, 'Petugas Kebersihan Sub Kelompok Rumah Tangga Bagian Perlengkapan dan Pengadaan Barang/Jasa Biro Umum'),
(176, 'Petugas Kebersihan Sub Kelompok Rumah Tangga Bagian Perlengkapan dan Pengadaan Barang/Jasa Biro Umum'),
(177, 'Petugas Kebersihan Sub Kelompok Rumah Tangga Bagian Perlengkapan dan Pengadaan Barang/Jasa Biro Umum'),
(178, 'Petugas Kebersihan Sub Kelompok Rumah Tangga Bagian Perlengkapan dan Pengadaan Barang/Jasa Biro Umum'),
(179, 'Petugas Kebersihan Sub Kelompok Rumah Tangga Bagian Perlengkapan dan Pengadaan Barang/Jasa Biro Umum'),
(180, 'Petugas Kebersihan Sub Kelompok Rumah Tangga Bagian Perlengkapan dan Pengadaan Barang/Jasa Biro Umum'),
(181, 'Petugas Kebersihan Sub Kelompok Rumah Tangga Bagian Perlengkapan dan Pengadaan Barang/Jasa Biro Umum'),
(182, 'Petugas Kebersihan Sub Kelompok Rumah Tangga Bagian Perlengkapan dan Pengadaan Barang/Jasa Biro Umum'),
(183, 'Petugas Kebersihan Sub Kelompok Rumah Tangga Bagian Perlengkapan dan Pengadaan Barang/Jasa Biro Umum'),
(184, 'Petugas Kebersihan Sub Kelompok Rumah Tangga  Bagian Perlengkapan dan Pengadaan Barang/Jasa Biro Umu'),
(185, 'Petugas Kebersihan Sub Kelompok Rumah Tangga Bagian Perlengkapan dan Pengadaan Barang/Jasa Biro Umum'),
(186, 'Petugas Keamanan Dalam Sub Kelompok Rumah Tangga Bagian Perlengkapan dan Pengadaan Barang/Jasa Biro '),
(187, 'Petugas Keamanan Dalam Sub Kelompok Rumah Tangga Bagian Perlengkapan dan Pengadaan Barang/Jasa Biro '),
(188, 'Petugas Keamanan Dalam Sub Kelompok Rumah Tangga Bagian Perlengkapan dan Pengadaan Barang/Jasa Biro '),
(189, 'Petugas Keamanan Dalam Sub Kelompok Rumah Tangga Bagian Perlengkapan dan Pengadaan Barang/Jasa Biro '),
(190, 'Petugas Keamanan Dalam Sub Kelompok Rumah Tangga Bagian Perlengkapan dan Pengadaan Barang/Jasa Biro '),
(191, 'Petugas Keamanan Dalam Sub Kelompok Rumah Tangga Bagian Perlengkapan dan Pengadaan Barang/Jasa Biro '),
(192, 'Pranata Komputer Terampil  Sub Kelompok Data Kaminfo Bagian Sisfo Biro PSP'),
(193, 'Pengelola Tata Naskah Sub Kelompok Persuratan Kelompok TU dan Protokol Biro Umum'),
(194, 'Teknisi Sarana dan Prasarana Sub Kelompok Rumah Tangga Bagian Perlengkapan dan Pengadaan Barang/Jasa'),
(195, 'Teknisi Sarana dan Prasarana Sub Kelompok Rumah Tangga Bagian Perlengkapan dan Pengadaan Barang/Jasa'),
(196, 'Pengelola Tata Naskah Sub Kelompok Persuratan Kelompok TU dan Protokol Biro Umum');

-- --------------------------------------------------------

--
-- Table structure for table `jenis_operasional`
--

CREATE TABLE `jenis_operasional` (
  `id` int(10) UNSIGNED NOT NULL,
  `jenis_operasional` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `jenis_operasional`
--

INSERT INTO `jenis_operasional` (`id`, `jenis_operasional`) VALUES
(1, 'Perkantoran'),
(2, 'Jabatan'),
(3, 'Kepala Bagian'),
(4, 'Sub Bagian');

-- --------------------------------------------------------

--
-- Table structure for table `kegiatan`
--

CREATE TABLE `kegiatan` (
  `id` int(11) NOT NULL,
  `jenis_kegiatan` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `kegiatan`
--

INSERT INTO `kegiatan` (`id`, `jenis_kegiatan`) VALUES
(1, 'Bulanan'),
(2, 'Rakertas'),
(3, 'Pokjasus'),
(5, 'RTD'),
(6, 'KKDN');

-- --------------------------------------------------------

--
-- Table structure for table `kendaraan_dinas`
--

CREATE TABLE `kendaraan_dinas` (
  `id` int(10) UNSIGNED NOT NULL,
  `nopol` varchar(50) NOT NULL,
  `tahun_pengadaan` varchar(4) NOT NULL,
  `merk_kendaraan` varchar(200) NOT NULL,
  `tipe_kendaraan` varchar(100) NOT NULL,
  `id_jenis_operasional` int(10) UNSIGNED NOT NULL,
  `keterangan` varchar(500) DEFAULT NULL,
  `status` varchar(2) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `kendaraan_dinas`
--

INSERT INTO `kendaraan_dinas` (`id`, `nopol`, `tahun_pengadaan`, `merk_kendaraan`, `tipe_kendaraan`, `id_jenis_operasional`, `keterangan`, `status`) VALUES
(7, 'B 1958 PQA', '2015', 'TOYOTA HIBRID', 'mobil', 2, '', NULL),
(8, 'B 1970 PQA', '2015', 'TOYOTA CAMRY 2.5 V A/T', 'mobil', 2, '', NULL),
(9, 'B 1967 PQA', '2015', 'TOYOTA CAMRY 2.5 V A/T', 'mobil', 2, '', NULL),
(10, 'B 1979 PQA', '2015', 'TOYOTA CAMRY 2.5 V A/T', 'mobil', 2, '', NULL),
(11, 'B 1957 PQA', '2015', 'TOYOTA CAMRY 2.5 V A/T', 'mobil', 2, '', NULL),
(12, 'B.1960 PQA', '2015', 'TOYOTA CAMRY 2.5 V A/T', 'mobil', 2, '', NULL),
(13, 'B.1969 PQA', '2015', 'TOYOTA CAMRY 2.5 V A/T', 'mobil', 2, '', NULL),
(14, 'B.1963 PQA', '2015', 'TOYOTA CAMRY 2.5 V A/T', 'mobil', 2, '', NULL),
(15, 'B.1966 PQA', '2015', 'TOYOTA CAMRY 2.5 V A/T', 'mobil', 2, '', NULL),
(16, 'B 1962 PQA', '2015', 'New Corola Altis 1.8 V A/T', 'mobil', 2, '', NULL),
(17, 'B 1961 PQA', '2015', 'New Corola Altis 1.8 V A/T', 'mobil', 2, '', NULL),
(18, 'B.1968 PQA', '2015', 'New Corola Altis 1.8 V A/T', 'mobil', 2, '', NULL),
(19, 'B 1971 PQA', '2015', 'New Corola Altis 1.8 V A/T', 'mobil', 2, '', NULL),
(20, 'B 1965 PQA', '2015', 'New Corola Altis 1.8 V A/T', 'mobil', 2, '', NULL),
(21, 'B.1953 PQA', '2015', 'New Corola Altis 1.8 V A/T', 'mobil', 2, '', NULL),
(22, 'B 1952 PQA', '2015', 'New Corola Altis 1.8 V A/T', 'mobil', 2, '', NULL),
(23, 'B 1959 PQA', '2015', 'New Corola Altis 1.8 V A/T', 'mobil', 2, '', NULL),
(24, 'B 1973 PQA', '2015', 'New Corola Altis 1.8 V A/T', 'mobil', 2, '', NULL),
(25, 'B 1956 PQA', '2015', 'New Corola Altis 1.8 V A/T', 'mobil', 2, '', NULL),
(26, 'B 1975 PQA', '2015', 'New Corola Altis 1.8 V A/T', 'mobil', 2, '', NULL),
(27, 'B 1978 PQA', '2015', 'New Corola Altis 1.8 V A/T', 'mobil', 2, '', NULL),
(28, 'B 1964 PQA', '2015', 'New Corola Altis 1.8 V A/T', 'mobil', 2, '', NULL),
(29, 'B 1974 PQA', '2015', 'New Corola Altis 1.8 V A/T', 'mobil', 2, '', NULL),
(30, 'B 1955 PQA', '2015', 'New Corola Altis 1.8 V A/T', 'mobil', 2, '', NULL),
(31, 'B 1972 PQA', '2015', 'Vios 1.5 G A/TM', 'mobil', 2, '', NULL),
(32, 'B 1976 PQA', '2015', 'Vios 1.5 G A/TM', 'mobil', 2, '', NULL),
(33, 'B 1954 PQA', '2015', 'Vios 1.5 G A/TM', 'mobil', 2, '', NULL),
(34, 'B 1981 PQA', '2015', 'Vios 1.5 G A/TM', 'mobil', 2, '', NULL),
(35, 'B 1103 PQB', '2015', 'Vios 1.5 G A/TM', 'mobil', 2, '', NULL),
(36, 'B 1101 PQB', '2015', 'Vios 1.5 G A/TM', 'mobil', 2, '', NULL),
(37, 'B 1093 PQB', '2015', 'Vios 1.5 G A/TM', 'mobil', 2, '', NULL),
(38, 'B 1098 PQB', '2015', 'Vios 1.5 G A/TM', 'mobil', 2, '', NULL),
(39, 'B 1094 PQB', '2015', 'Vios 1.5 G A/TM', 'mobil', 2, '', NULL),
(40, 'B 1102 PQB', '2015', 'Vios 1.5 G A/TM', 'mobil', 2, '', NULL),
(41, 'B 1097 PQB', '2015', 'Vios 1.5 G A/TM', 'mobil', 2, '', NULL),
(42, 'B 1104 PQB', '2015', 'Vios 1.5 G A/TM', 'mobil', 2, '', NULL),
(43, 'B 1100 PQB', '2015', 'Vios 1.5 G A/TM', 'mobil', 2, '', NULL),
(44, 'B 1885 PQP', '2012', 'XENIA', 'mobil', 2, '', NULL),
(45, 'B 1886 PQP', '2012', 'XENIA', 'mobil', 1, '', NULL),
(46, ' B 1417 PQA', '2011', 'TOYOTA NEW CAMRY', 'mobil', 2, '', NULL),
(47, ' B 1538 FQ', '2006', 'H.ACCORD CM5ATVTIL', 'mobil', 1, '', NULL),
(48, ' B 1680 PQA', '2013', 'TOYOTA COROLA ALTIS 1.8', 'mobil', 2, '', NULL),
(49, ' B 1679 PQA', '2013', 'TOYOTA COROLA ALTIS 1.8', 'mobil', 2, '', NULL),
(50, ' B. 1831 VQ', '2006', 'H.CRV RD5 2WD20ATCK', 'mobil', 2, '', NULL),
(51, ' B  1830 VQ', '2006', 'H.CRV RD5 2WD20ATCK', 'mobil', 2, '', NULL),
(52, ' B 1828 VQ', '2006', 'H.CRV RD5 2WD20ATCK', 'mobil', 2, '', NULL),
(53, ' B 8430 WU', '2006', 'ISUZU N.P TBR 541 LV', 'mobil', 2, '', NULL),
(54, ' B. 8432 WU', '2006', 'ISUZU N.P TBR 541 LV', 'mobil', 3, '', NULL),
(55, ' B. 8433 WU', '2006', 'ISUZU N.P TBR 541 LV', 'mobil', 3, '', NULL),
(56, ' B. 8434 WU', '2006', 'ISUZU N.P TBR 541 LV', 'mobil', 2, '', NULL),
(57, ' B 8435 WU', '2006', 'ISUZU N.P TBR 541 LV', 'mobil', 3, '', NULL),
(58, ' B 8436 WU', '2006', 'ISUZU N.P TBR 541 LV', 'mobil', 2, '', NULL),
(59, 'B 8437 WU', '2006', 'ISUZU N.P TBR 541 LV', 'mobil', 2, '', NULL),
(60, ' B. 8438 WU', '2006', 'ISUZU N.P TBR 541 LV', 'mobil', 2, '', NULL),
(61, ' B. 8439 WU', '2006', 'ISUZU N.P TBR 541 LV', 'mobil', 3, '', NULL),
(62, ' B. 8439 WU', '2006', 'ISUZU N.P TBR 541 LV', 'mobil', 2, '', NULL),
(63, ' B. 8441 WU', '2006', 'ISUZU N.P TBR 541 LV', 'mobil', 2, '', NULL),
(64, ' B. 8442 WU', '2006', 'ISUZU N.P TBR 541 LV', 'mobil', 2, '', NULL),
(65, ' B. 8443 WU', '2006', 'ISUZU N.P TBR 541 LV', 'mobil', 2, '', NULL),
(66, ' B. 8448 WU', '2006', 'ISUZU N.P TBR 541 LV', 'mobil', 2, '', NULL),
(67, ' B. 8449 WU', '2006', 'ISUZU N.P TBR 541 LV', 'mobil', 3, '', NULL),
(68, ' B 8450 WU', '2006', 'ISUZU N.P TBR 541 LV', 'mobil', 2, '', NULL),
(69, ' B. 8451 WU', '2006', 'ISUZU N.P TBR 541 LV', 'mobil', 1, '', NULL),
(70, ' B. 1245 WQ', '2005', 'ISUZU PANTHER LM 25', 'mobil', 3, '', NULL),
(71, ' B. 1247 WQ', '2005', 'ISUZU PANTHER LM 25', 'mobil', 3, '', NULL),
(72, 'B.1966 PQN', '2010', 'AVANZA 1.3 GMMFJJ', 'mobil', 3, '', NULL),
(73, 'B.1967 PQN', '2010', 'AVANZA 1.3 GMMFJJ', 'mobil', 2, '', NULL),
(74, 'B.1965 PQN', '2010', 'AVANZA 1.3 GMMFJJ', 'mobil', 1, '', NULL),
(75, 'B 1237 PQB', '2016', 'Vios 1.5 G A/TM', 'mobil', 2, '', NULL),
(76, 'B 1703 PQS', '2017', 'Avanza F53EM/T', 'mobil', 3, '', NULL),
(77, 'B 1231 PQB', '2016', 'Vios 1.5 G A/TM', 'mobil', 2, '', NULL),
(78, 'B 1232 PQB', '2016', 'Vios 1.5 G A/TM', 'mobil', 2, '', NULL),
(79, 'B 1232 PQB', '2016', 'Vios 1.5 G A/TM', 'mobil', 2, '', NULL),
(80, 'B 1233 PQB', '2016', 'Vios 1.5 G A/TM', 'mobil', 2, '', NULL),
(81, 'B 1235 PQB', '2016', 'Vios 1.5 G A/TM', 'mobil', 2, '', NULL),
(82, 'B 1236 PQB', '2016', 'Vios 1.5 G A/TM', 'mobil', 2, '', NULL),
(83, 'B 1256 PQB', '2017', 'Vios 1.5 G CVT', 'mobil', 2, '', NULL),
(84, 'B 1257 PQB', '2017', 'Vios 1.5 G CVT', 'mobil', 2, '', NULL),
(85, 'B 1258 PQB', '2017', 'Vios 1.5 G CVT', 'mobil', 2, '', NULL),
(86, 'B 1259 PQB', '2017', 'Vios 1.5 G CVT', 'mobil', 2, '', NULL),
(87, 'B 1259 PQB', '2017', 'Vios 1.5 G CVT', 'mobil', 2, '', NULL),
(88, 'B 1260 PQB', '2017', 'Vios 1.5 G CVT', 'mobil', 2, '', NULL),
(89, ' B. 7008 DQ', '2006', 'ISUZU NHR 55', 'bus', 1, '', NULL),
(90, ' B. 7007 DQ', '2006', 'ISUZU NHR 55', 'bus', 1, '', NULL),
(91, 'B. 9035 PQU', '2010', 'HILUX 2.0 L MT', 'mobil', 1, '', NULL),
(92, 'B 7392 PPA', '2015', 'HIACE COMMUTER MT', 'bus', 1, '', NULL),
(93, 'B 1235 PHX', '2015', 'Toyota Kijang E', 'mobil', 1, '', NULL),
(94, 'B 7613 PPA', '2017', 'HIACE COMMUTER MT', 'bus', 1, '', NULL),
(95, 'B 7649 PPA', '2017', 'HINO', 'bus', 1, '', NULL),
(96, ' B 6421 PEQ', '2006', 'HONDA NF 125 SF', 'motor', 4, '', NULL),
(97, ' B 6190 PCQ', '2005', 'HONDA GL MAX II', 'motor', 1, '', NULL),
(98, ' B 6422 PEQ', '2006', 'HONDA NF 125 SF', 'motor', 4, '', NULL),
(99, ' B 6423 PEQ', '2006', 'HONDA NF 125 SF', 'motor', 4, '', NULL),
(100, ' B 6424 PEQ', '2006', 'HONDA NF 125 SF', 'motor', 4, '', NULL),
(101, ' B 6425 PEQ', '2006', 'HONDA NF 125 SF', 'motor', 4, '', NULL),
(102, ' B 6426 PEQ', '2006', 'HONDA NF 125 SF', 'motor', 4, '', NULL),
(103, ' B 6427 PEQ', '2006', 'HONDA NF 125 SF', 'motor', 4, '', NULL),
(104, ' B 6429 PEQ', '2006', 'HONDA NF 125 SF', 'motor', 1, '', NULL),
(105, ' B 6433 PEQ', '2006', 'HONDA NF 125 SF', 'motor', 4, '', NULL),
(106, 'B 6434 PEQ', '2006', 'HONDA NF 125 SF', 'motor', 4, '', NULL),
(107, 'B 6435 PEQ', '2006', 'HONDA NF 125 SF', 'motor', 1, '', NULL),
(108, 'B 6794  PLQ', '2010', 'HONDA NF 125 TR', 'motor', 4, '', NULL),
(109, 'B 6795 PLQ', '2010', 'HONDA NF 125 TR', 'motor', 4, '', NULL),
(110, ' B 6796 PLQ', '2010', 'HONDA NF 125 TR', 'motor', 4, '', NULL),
(111, 'B 6797 PLQ', '2010', 'HONDA NF 125 TR', 'motor', 4, '', NULL),
(112, 'B 3063 PAQ', '2015', 'HONDA  CB', 'motor', 4, '', NULL),
(113, 'B 3064 PAQ', '2015', 'HONDA  CB', 'motor', 4, '', NULL),
(114, 'B 3360 PEQ', '2016', 'NEW BYSON F1', 'motor', 4, '', NULL),
(115, 'B 3359 PEQ', '2016', 'NEW BYSON F1', 'motor', 1, '', NULL),
(116, 'B 3362 PEQ', '2016', 'NEW BYSON F1', 'motor', 4, '', NULL),
(117, 'B 3361 PEQ', '2016', 'NEW BYSON F1', 'motor', 4, '', NULL),
(118, 'B 3655 PFQ', '2017', 'HONDA VARIO ', 'motor', 4, '', NULL),
(119, 'B 3656 PFQ', '2017', 'HONDA VARIO ', 'motor', 4, '', NULL),
(120, 'B 3657 PFQ', '2017', 'HONDA VARIO ', 'motor', 4, '', NULL),
(121, 'B 3658 PFQ', '2017', 'HONDA VARIO ', 'motor', 4, '', NULL),
(122, 'B 3659 PFQ', '2017', 'HONDA VARIO ', 'motor', 4, '', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `version` varchar(255) NOT NULL,
  `class` varchar(255) NOT NULL,
  `group` varchar(255) NOT NULL,
  `namespace` varchar(255) NOT NULL,
  `time` int(11) NOT NULL,
  `batch` int(11) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `version`, `class`, `group`, `namespace`, `time`, `batch`) VALUES
(1, '2022-06-26-133201', 'App\\Database\\Migrations\\Pegawai', 'default', 'App', 1656309387, 1),
(2, '2022-06-26-151546', 'App\\Database\\Migrations\\Unit', 'default', 'App', 1656309387, 1),
(3, '2022-06-26-151553', 'App\\Database\\Migrations\\Jabatan', 'default', 'App', 1656309388, 1),
(4, '2022-06-26-151608', 'App\\Database\\Migrations\\Users', 'default', 'App', 1656309388, 1);

-- --------------------------------------------------------

--
-- Table structure for table `pegawai`
--

CREATE TABLE `pegawai` (
  `id` int(10) UNSIGNED NOT NULL,
  `nip_nrp` varchar(50) NOT NULL,
  `nama_pegawai` varchar(100) NOT NULL,
  `pangkat` varchar(100) NOT NULL,
  `id_jabatan` int(10) UNSIGNED NOT NULL,
  `id_unit` int(10) UNSIGNED NOT NULL,
  `id_subunit` int(10) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `pegawai`
--

INSERT INTO `pegawai` (`id`, `nip_nrp`, `nama_pegawai`, `pangkat`, `id_jabatan`, `id_unit`, `id_subunit`) VALUES
(0, 'admin', 'Administrator', '', 0, 0, 0),
(2, '9256/P', 'Gregorius Agung W. D., M.Tr (Han)', 'Laksda TNI', 3, 3, 0),
(3, '513119', 'Maman Suherman, M.A.P., M.Han.', 'Marsda TNI', 5, 5, 0),
(4, '32378', 'Syachriyal E. Siregar, S.E.', 'Mayjen TNI', 2, 2, 0),
(5, '65030622', 'Drs. Heribertus Dahana R., S.H., M.Si.', 'Irjen Pol', 4, 4, 0),
(7, '11225/P', 'Supendi, S.T., M.Tr.Opsla', 'Laksma TNI', 6, 6, 0),
(8, '198211252009011006', 'Nurman Kahar, S.IP., M.AP.', '', 7, 6, 5),
(9, '196503301990051001', 'Sutawijaya', '', 9, 6, 5),
(10, '198308262009012003', 'Mutia Tri Yuliyati, S.E.', '', 8, 6, 5),
(13, '197709122006041004', 'Dedy Purwadi, A.Md', '', 12, 8, 1),
(14, '198704092019021001', 'Haryo Sasmito, S.E.', '', 13, 6, 4),
(15, '197410302009011001', 'Reno Ardiansyah, S.Kom.', '', 14, 6, 4),
(20, '196412161987031002', 'Dr. Ir. Hendri Firman Windarto, M.Eng.', 'Pembina Utama / IV.e', 16, 9, 0),
(21, '31111', 'Eddy Syahputra Siahaan, S.I.P., M.M.', 'Mayjen TNI', 17, 9, 0),
(22, '32402', 'Dr. Budi Pramono, S.I.P., M.M., M.A., (GSC),, CIQaR., CIQnR., M.O.S., M.C.E., CIMMR', 'Mayjen TNI', 18, 9, 0),
(23, '66040394', 'Drs. I Nyoman Labha Suradnya, M.M.', 'Irjen Pol', 19, 9, 0),
(24, '8933/P', 'Udyatmiko', 'Laksda TNI', 20, 9, 0),
(25, '196303271993031001', 'Ir. Hadian Ananta Wardhana, CES', 'Pembina Utama Madya / IV.d', 21, 2, 0),
(26, '9298/P', 'Bambang Eko Palgunadi, S.T., M.A.P.', 'Laksma TNI', 23, 3, 0),
(27, '196806181992031001', 'Maulana, S.H., M.H.', 'Pembina Utama Madya / IV.d', 24, 5, 0),
(28, '515584', 'Dr. Afrizal Hendra, SIP., M.Si.,CHRMP.', 'Marsma TNI', 25, 4, 0),
(29, '32419', 'Dr. Drs. Haris Sarjana, M.M., M.Tr. (Han)', 'Brigjen TNI', 26, 2, 0),
(30, '72110330', 'H. Nazirwan Adji Wibowo, S.I.K., M.Si', 'Brigjen Pol', 27, 4, 0),
(31, '512493', 'Sugeng Wiwoho', 'Marsma TNI', 28, 3, 0),
(32, '9860/P', 'F. Y. Nevy Dwi Soesanto, S.T., CHRMP, CACA.', 'Laksma TNI ', 29, 5, 0),
(33, '1900024690766', 'Godman Siagian, S.I.P., M.Si', 'Brigjen TNI', 30, 3, 0),
(34, '67080350', 'Drs. R. Eko Wahyu Prasetyo, S.H.', 'Brigjen Pol', 31, 5, 0),
(35, '10146/P', 'Samista, S.H.', 'Laksma TNI', 32, 4, 0),
(36, '32266', 'Suherlan', 'Brigjen TNI', 33, 2, 0),
(37, '11930088180368', 'Elphis Rudy, S.S., M.Sc.,', 'Brigjen TNI', 34, 2, 0),
(38, '512464', 'Shopian', 'Marsma TNI', 35, 7, 0),
(40, '32817', 'I Gusti Putu Wirejana, S.T., M.M.S.I.', 'Brigjen TNI', 37, 1, 0),
(41, '33927', 'Siti Aminah', 'Kolonel Cku (K)', 38, 2, 0),
(42, '514553', 'Ir. Yufie Syafari', 'Kolonel Lek', 39, 4, 0),
(43, '1900008690468', 'Joko Setyo Putro', 'Kolonel Inf', 40, 4, 0),
(44, '516353', 'Marudut Jhonson Lumbantoruan, S.E.', 'Kolonel Lek', 41, 5, 0),
(45, '522980', 'Drs. Agus Suharto, M.Si.', 'Kolonel Sus', 42, 5, 0),
(46, '518370', 'Drs. H. Nurofik', 'Kolonel Sus', 43, 3, 0),
(47, '518801', 'Bonan D.O. Siagian, S.E., M.Si. (Han)', 'Kolonel Tek', 44, 4, 0),
(48, '196804181995022001', 'Dra. Sri Rahayu Purwaningtyastuti', 'Pembina Utama Muda / IV.c ', 45, 4, 0),
(49, '12396/P', 'Dr. Dwi Ari Purwanto, S.Pd., M.Pd.', 'Kolonel Laut (KH)', 46, 5, 0),
(50, '67070627', 'Yulias, S.I.K.', 'Kombes Pol', 47, 2, 0),
(51, '196309251992031003', 'Abdul Azis, S.H., M..Hum', 'Jaksa Utama Muda / IV.c', 48, 2, 0),
(52, '196505071995031001', 'Dr. Rustam, S.T., M.Si', 'Pembina Utama Muda / IV.c', 49, 5, 0),
(53, '9314/P', 'Darmansyah', 'Kolonel Laut (S)', 50, 3, 0),
(54, '196402181991032003', 'Dra. Sri Haryani, M.M.', 'Pembina Utama Muda/ IV.c ', 51, 3, 0),
(55, '196805091992012001', 'Dr. Ulmi Listianingsih, S.Sos., M.M. ', 'Pembina Utama Muda/ IV.c', 52, 4, 0),
(56, '196803291993031001', 'Sindu Utomo, S.H., M.M.', 'Pembina Utama Muda/ IV.c', 53, 3, 0),
(57, '11368/P', 'Imam Hidayat, S.E., M.M.', 'Kolonel Laut (P)', 54, 2, 0),
(58, '518371', 'Drs. H. Ahmad Yani, S.H., M.T.', 'Kolonel  Sus', 55, 3, 0),
(59, '13336/P', 'Eko Erys Hidayanto, S.T., M.M., CHRMP', 'Kolonel Laut (T)', 56, 4, 0),
(60, '196704141992032001', 'Dr. Nur Chusniah, S.H., M.H.', 'Pembina Utama Muda / IV.c', 58, 3, 0),
(61, '10150/P', 'Aris Mudian, M.M.', 'Kolonel Mar', 59, 5, 0),
(62, '519741', 'Drs. Moechlisin, M.Si.', 'Kolonel Adm', 60, 5, 0),
(63, '522968', 'Rudolf P. Purba, B.Sc., S.A.P.', 'Kolonel Kes', 61, 2, 0),
(64, '197908021998101001', 'Syamsu Khoirudin, S.STP, M.Si.', 'Pembina Tingkat I /IV.b', 62, 3, 0),
(65, '197006261996031003', 'Agung Tri Prasetyo, S.Si., M.A.,', 'Pembina Utama Muda / IV.c', 63, 5, 0),
(66, '1910048940868', 'Fathur Rochman ', 'Kolonel Czi', 64, 2, 0),
(67, '13128/P', 'Tantawi Jauhari, S.E., M.M., CTMP', 'Kolonel Laut (KH)', 65, 2, 0),
(68, '13371/P', 'Yudo Purnomo, S.T., M.Tr. Hanla', 'Kolonel Laut (E)', 67, 2, 0),
(69, '11940027600773', 'Jatmiko Wirastomo, S.Kom', 'Kolonel Inf', 68, 2, 0),
(70, '11940016550171', 'Budi Tjahjono, S.Sos., M.A.P	', 'Kolonel Inf', 69, 5, 0),
(71, '11950053820471', 'Nurtjahjo Wibowo, S.E., M.M.', 'Kolonel Czi', 70, 2, 0),
(72, '11050012161270', 'Rahman, S.Pd., M.Sc.', 'Kolonel Kav', 71, 5, 0),
(73, '13864/P', 'Robert Litanto, S.T., M.M., M.Tr.Han.', 'Kolonel Laut (T)', 72, 5, 0),
(74, '13083/P', 'Fenny Akwan, S.H., M.H.', 'Kolonel Laut (KH)', 73, 4, 0),
(75, '526331', 'Agus Basuki, S.T., M.M.', 'Kolonel Adm', 74, 4, 0),
(76, '76010511', 'Endrastiawan Setyowibowo, S.I.K., M.H.', 'Kombes Pol', 75, 5, 0),
(77, '75030460', 'Muhammad Nur Syam, S.I.K., S.H.', 'Kombes Pol', 76, 5, 0),
(78, '13911/P', 'Abdul Rozaq, S.T., M.Tr.Hanla., M.M.', 'Kolonel Laut (S)', 77, 7, 7),
(79, '12690/P', 'Ari Purnomo, S.T., M.Si', 'Kolonel Laut (E)', 78, 8, 1),
(80, '11050013800465', 'Abdul Cholik, S.H., M.H.', 'Kolonel Arh', 79, 8, 3),
(81, '197911051999031002', 'Tri Hariyadi, S.Sos, M.AP', 'Pembina Tk. I / IV.b', 80, 6, 8),
(82, '197502072006042001', 'Titin Mardyaningsih, S.E., M.M.', 'Pembina Tk. I / IV.b', 81, 8, 2),
(83, '196801281990031003', 'Imam Supriyadi, S.E.', 'Pembina / IV.a ', 82, 6, 4),
(84, '197706302006041003', 'Yadi Kurniawanto, S.T.', 'Pembina / IV.a', 83, 7, 9),
(86, '197212311993101005', 'Dr. La Piliha, S.Pd., M.Pd.', 'Pembina Tk.I / IV.b', 85, 6, 6),
(88, '197309092006042003', 'Desi Fajar Nita, S.Sos.', 'Penata Tk.I / III.d', 87, 8, 3),
(89, '197206301993011001', 'Kriswanto', 'Penata Tk.I / III.d', 88, 8, 1),
(90, '197203131993022001', 'Susi Hendrawati', 'Penata  Tk. I / III.d', 89, 6, 6),
(91, '197106032009011003', 'Chairul Didiek Djunaedi, S.E.', 'Penata Tk. I / III.d', 90, 6, 6),
(92, '198210262009012004', 'Deviana Oktoria, S.Sos.', 'Penata Tk. I / III.d', 91, 6, 4),
(94, '197311301995012001 ', 'Susi Amiliawaty, S.Ikom.', 'Penata Tk. I / III.d', 93, 7, 9),
(95, '198103262009012003', 'Eka Rosilawati, S.Sos.', 'Penata Tk. I / III.d', 94, 6, 6),
(96, '196711201989101001', 'Denyadi ', 'Penata Tk. I / III.d', 95, 6, 6),
(97, '196911271988031001', 'Suntama', 'Penata Tk. I / III.d', 96, 6, 5),
(98, '196803131989101001', 'Agus Sutarja', 'Penata Tk. I / III.d', 97, 6, 6),
(99, '196604231993011001', 'Jumadi Saman', 'Penata Tk. I / III.d', 98, 7, 8),
(100, '196808101995011001', 'Mohammad Agussyah', 'Penata Tk. I / III.d', 99, 7, 7),
(101, '197008031995011001', 'Agus Suprapto, S.Sos.', 'Penata Tk. I / III.d', 100, 6, 4),
(102, '197103181998031002', 'Prasetyo, A.Md', 'Penata Tk. I / III.d', 101, 7, 7),
(103, '197603042009121001', 'Handi Ishak, S.E.', 'Penata Tk. I / III.d', 102, 6, 6),
(106, '198402072006042002', 'Eka Puji Astuti, A.Md.', 'Penata / III.c', 105, 7, 9),
(107, '198301162008012012', 'Riza Savitri, A.Md.', 'Penata Muda Tk. I / III.b', 106, 8, 3),
(108, '196502101991031007', 'Ngatiman', 'Penata Muda Tk.I / III.b', 114, 6, 5),
(109, '197202211997031001', 'I n o', 'Penata Muda Tk.I / III.b', 115, 6, 5),
(110, '198701272006042001', 'Yesilia Prahasasti, S.E.', 'Penata / III.c', 116, 6, 6),
(111, '197105191998031004', 'Purwanto  ', 'Penata Muda Tk.I / III.b', 117, 8, 3),
(112, '197711241998031001', 'Sartono', 'Penata Muda Tk.I / III.b', 118, 6, 6),
(113, '196906121999031001', 'Sumartono', 'Penata Muda Tk. I / III.b', 119, 6, 5),
(114, '198107172008012016', 'Mila Purnama Yulianti, A.Md.', 'Penata Muda Tk. I / III.b', 120, 6, 6),
(115, '198105262009011002', 'Enang Suhendar, S.Kom.', 'Penata Muda Tk. I / III.b', 121, 7, 8),
(116, '197302122006042003', 'Rissa Henriani, SAP', 'Penata Muda Tk.I / III.b ', 122, 6, 6),
(117, '198512132019021002', 'Genanto Atmadiredja, S.E.', 'Penata Muda / III.a', 123, 7, 7),
(118, '199505222019022004', 'Tisa Siti Rachmawati, S.E.', 'Penata Muda / III.a', 124, 7, 8),
(119, '199612022019022002', 'Sofyanti Astri, S.E.', 'Penata Muda / III.a', 125, 7, 9),
(120, 'pitra', 'Pitra Nervie', 'Honorer', 126, 6, 6),
(121, '199506232019022002', 'Karina Dewi, S.H.', 'Penata Muda / III.a', 127, 6, 4),
(122, '199307232019022005', 'Nadia Talita Putri, S.I.P.', 'Penata Muda / III.a', 128, 6, 6),
(123, '199406272019022003', 'Fauziah Nurunnajmi, S.E.', 'Penata Muda / III.a', 129, 8, 3),
(124, '198510052019021001', 'Galih Pamungkas Sabriarso, A.Md.', 'Pengatur / II.c ', 130, 8, 1),
(125, '199208242019021002', 'Alvin Rayinda Pramasha, S.E.', 'Penata Muda / III.a', 131, 8, 2),
(126, '197705161998031001', 'Supardi, S.Sos.', 'Penata Muda Tk. I / III.b', 132, 7, 9),
(127, '198602032009011001', 'Wim Ruska, A.Md.', 'Penata Muda Tk. I / III.b', 133, 6, 6),
(128, ' 198007122010121001', 'Roy Wariko, S.Kom., ', 'Penata Muda Tk. I / III.b', 134, 6, 6),
(129, '197908062007101001', 'Agus Munadi, S.A.P., ', 'Penata Muda Tk. I / III.b', 135, 6, 5),
(130, '198603232019022002', 'Amalia Fajarina, S.H., ', 'Penata Muda / III.a', 137, 6, 3),
(131, '199105182019022001', 'Dian Ayu Pertiwi, S.E., ', 'Penata Muda / III.a', 138, 8, 2),
(132, '199210082019021001', 'Andre Pamungkas, S.E., ', 'Penata Muda / III.a', 139, 7, 9),
(133, '198612042019021001', 'Bayu Prawiradisma Siregar, S.E., ', 'Penata Muda / III.a', 141, 7, 7),
(135, '199209122019021001', 'Nasrul Ma’arif, S.Sos.', 'Penata Muda / III.a', 143, 7, 8),
(136, '199306062019022003', 'Anindhita Primanisantiara Fildatie, S.I.P.', 'Penata Muda / III.a', 144, 6, 6),
(137, '199506032019021001', 'Raka Narhadi Saputra, S.E.', 'Penata Muda / III.a', 146, 7, 7),
(138, '199506072019022004', 'Afifah Fitriani, S.E.', 'Penata Muda / III.a', 147, 7, 7),
(139, '199605182019022002', 'Sely Kurniawati, S.E.', 'Penata Muda / III.a', 148, 7, 9),
(140, '198402122019021001', 'Daniel Maruli Tua Manik, S.E.', 'Penata Muda / III.a', 149, 8, 2),
(142, '198812192019021001', 'Helfrida Sinaga, S.E.', 'Penata Muda / III.a', 151, 8, 2),
(143, '199001252019021001', 'Andreas Christian Siahaan, S.Kom.', 'Penata Muda / III.a', 152, 8, 1),
(144, '199104172019021003', 'Andreanus, S.H.', 'Penata Muda / III.a', 153, 6, 4),
(145, '199110022019022002', 'Maulidya Nurisya, S.E.', 'Penata Muda / III.a', 154, 7, 8),
(146, '199207012019022003', 'Riedjanti Restu Biandari, S.E.', 'Penata Muda / III.a', 155, 8, 2),
(147, '199312222019022001', 'Natalina Pakpahan, S.I.Kom.', 'Penata Muda / III.a', 156, 8, 3),
(149, '199505172019022003', 'Renie Dwi Sulistyani, S.M.', 'Penata Muda / III.a', 158, 6, 4),
(150, '96350', 'Rudy Priyanto', 'Pelda Ttu', 160, 6, 5),
(151, '197511252007101001', 'Kiswanto', 'Pengatur Tk. I / II.d', 161, 8, 3),
(152, '196807121988011001', 'Hanung Utoro', 'Pengatur Tk I / II.d', 162, 6, 6),
(153, '198108162008101001', 'Raharjo', 'Pengatur Tk. I / II.d ', 163, 6, 6),
(154, '198404072008101001', 'Riswondo', 'Pengatur Tk I / II.d', 164, 7, 9),
(155, '198502122008101001', 'Efendi', 'Pengatur Tk I / II.d', 165, 6, 5),
(156, '197508182007011004', 'Agus Winaryo', 'Pengatur / II.c', 166, 6, 5),
(158, '199508062019021001', 'Guspahri Ardiansyah Hasibuan, A.Md.', 'Pengatur / II.c ', 168, 8, 1),
(159, '199308252019021003', 'Robby Haryadi, A.Md.', 'Pengatur / II.c ', 169, 8, 1),
(160, '198901072019021001', 'Yayat Ruhiat, A.Md.', 'Pengatur / II.c ', 170, 8, 1),
(161, '199307062019021002', 'Jordan Hendrix Setiawan, A.Md.', 'Pengatur / II.c ', 171, 8, 1),
(162, '31980110111176', 'Yandi Irawan', 'Serka', 172, 6, 5),
(163, '197710042008101001', 'Rusmanto', 'Pengatur Muda Tk. I / II.b', 173, 6, 6),
(164, '108618', 'Subono ', 'Serda Apm', 174, 6, 4),
(165, 'andi', 'Andi Suhandi', 'Honorer', 175, 6, 5),
(166, 'akmal', 'Akmal', 'Honorer', 176, 6, 5),
(167, 'eko', 'Eko Mendi Sugana', 'Honorer', 177, 6, 5),
(168, 'urip', 'Urip Muhammad Subekti', 'Honorer', 178, 6, 5),
(169, 'sulfi', 'Sulfi Adi Lestyono', 'Honorer', 179, 6, 5),
(170, 'sujai', 'Sujai Triana', 'Honorer', 180, 6, 5),
(171, 'suroso', 'Wahyu Suroso', 'Honorer', 181, 6, 5),
(172, 'dani', 'Dani Saepul Anwar', 'Honorer', 182, 6, 5),
(173, 'galih', 'Galih Prakuso', 'Honorer', 183, 6, 5),
(174, 'masykur', 'Achmad Masykur R', 'Honorer', 184, 6, 5),
(175, 'sabrina', 'Sabrina Rizkiani', 'Honorer', 185, 6, 5),
(176, 'jefri', 'Jefri Jaka P', 'Honorer', 186, 6, 5),
(177, 'heru ', 'Heru Prasetiyo', 'Honorer', 187, 6, 5),
(178, 'doni', 'Ahmad Romadonia', 'Honorer', 188, 6, 5),
(179, 'dicky ', 'Dicky Ariyanda', 'Honorer', 189, 6, 5),
(180, 'yuly', 'Yuly Setiyadi', 'Honorer', 190, 6, 5),
(181, 'agus', 'Agus Cahyo Santoso', 'Honorer', 191, 6, 5),
(183, 'oman', 'Oman Romansyah ', 'Honorer', 193, 6, 6),
(184, 'jatmiko', 'Jatmiko', 'Honorer', 194, 6, 5),
(185, 'wahyu', 'Wahyu Wardiwana', 'Honorer', 195, 6, 6),
(186, 'firdi', 'Dalila Firdi Nerizal Pratama', 'Honorer', 196, 6, 6);

-- --------------------------------------------------------

--
-- Table structure for table `peminjaman_randis`
--

CREATE TABLE `peminjaman_randis` (
  `id` int(10) UNSIGNED NOT NULL,
  `id_pegawai` int(10) UNSIGNED NOT NULL,
  `id_randis` int(10) UNSIGNED NOT NULL,
  `tgl_pengajuan` datetime NOT NULL,
  `tgl_peminjaman` datetime NOT NULL,
  `tgl_pengembalian` datetime NOT NULL,
  `keperluan` varchar(500) DEFAULT NULL,
  `tgl_persetujuan_subbag` datetime DEFAULT NULL,
  `tgl_persetujuan_bag` datetime DEFAULT NULL,
  `tgl_persetujuan_karo` datetime DEFAULT NULL,
  `status` varchar(2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `peminjaman_randis`
--

INSERT INTO `peminjaman_randis` (`id`, `id_pegawai`, `id_randis`, `tgl_pengajuan`, `tgl_peminjaman`, `tgl_pengembalian`, `keperluan`, `tgl_persetujuan_subbag`, `tgl_persetujuan_bag`, `tgl_persetujuan_karo`, `status`) VALUES
(4, 15, 45, '2022-08-08 00:00:00', '2022-08-12 00:00:00', '2022-08-14 00:00:00', 'Pulang Kampung', '2022-08-08 00:00:00', '2022-08-08 00:00:00', '2022-08-08 00:00:00', '3'),
(5, 120, 92, '2022-07-29 00:00:00', '2022-08-01 00:00:00', '2022-08-01 00:00:00', 'Kunjungan Kegiatan Dharma Wanita ', '2022-07-29 00:00:00', '2022-07-29 00:00:00', '2022-07-29 00:00:00', '3'),
(6, 95, 94, '2022-07-26 00:00:00', '2022-07-26 00:00:00', '2022-07-26 00:00:00', 'Penjemputan rombongan Kedeputian Jiandra dan Sahli', '2022-07-26 00:00:00', '2022-07-26 00:00:00', '2022-07-26 00:00:00', '3'),
(7, 95, 94, '2022-08-09 00:00:00', '2022-08-09 00:00:00', '2022-08-09 00:00:00', 'Penjemputan Kedeputian Jiandra', '2022-08-09 00:00:00', '2022-08-09 00:00:00', '2022-08-09 00:00:00', '3'),
(8, 91, 92, '2022-08-03 00:00:00', '2022-08-03 00:00:00', '2022-08-03 00:00:00', 'Kujungan ke Kediaman Irjen Pol. Sukma Edy Mulyono (Kebayoran)', '2022-08-03 00:00:00', '2022-08-03 00:00:00', '2022-08-03 00:00:00', '3'),
(9, 112, 94, '2022-08-08 00:00:00', '2022-08-08 00:00:00', '2022-08-08 00:00:00', 'Penjemputan Sahli (Rapat di Merdeka Barat)', '2022-08-08 00:00:00', '2022-08-08 00:00:00', '2022-08-08 00:00:00', '3'),
(10, 120, 92, '2022-08-01 00:00:00', '2022-08-01 00:00:00', '2022-08-01 00:00:00', 'Besuk ke RS Islam Cempaka Putih', '2022-08-01 00:00:00', '2022-08-01 00:00:00', '2022-08-01 00:00:00', '3'),
(11, 120, 69, '2022-07-28 00:00:00', '2022-07-28 00:00:00', '2022-07-28 00:00:00', ' keperluan Mengantar parcel ke Kediaman Laksda TNI Udyatmoko ke Cibubur', '2022-07-28 00:00:00', '2022-07-28 00:00:00', '2022-07-28 00:00:00', '3'),
(12, 110, 74, '2022-08-01 00:00:00', '2022-08-01 00:00:00', '2022-08-01 00:00:00', 'Rapat di ANRI Cilandak', '2022-08-01 00:00:00', '2022-08-01 00:00:00', '2022-08-01 00:00:00', '3'),
(13, 98, 74, '2022-07-27 00:00:00', '2022-07-27 00:00:00', '2022-07-27 00:00:00', 'Rapat di ANRI Cilandak ', '2022-07-27 00:00:00', '2022-07-27 00:00:00', '2022-07-27 00:00:00', '3'),
(14, 106, 47, '2022-07-28 00:00:00', '2022-07-28 00:00:00', '2022-07-28 00:00:00', 'Rapat di Kemenkeu dan BPK', '2022-07-28 00:00:00', '2022-07-28 00:00:00', '2022-07-28 00:00:00', '3'),
(15, 113, 92, '2022-07-28 00:00:00', '2022-07-28 00:00:00', '2022-07-28 00:00:00', 'Kunjungan Rombongan Sesjen, Deputi, dan Sahli ke Kompas TV ', '2022-07-28 00:00:00', '2022-07-28 00:00:00', '2022-07-28 00:00:00', '3'),
(16, 130, 69, '2022-08-01 00:00:00', '2022-08-01 00:00:00', '2022-08-01 00:00:00', 'Rapat di BKN Cawang', '2022-08-01 00:00:00', '2022-08-01 00:00:00', '2022-08-01 00:00:00', '3'),
(17, 126, 74, '2022-08-02 00:00:00', '2022-08-02 00:00:00', '2022-08-02 00:00:00', 'Besuk pegawai di RSCM Cipete', '2022-08-02 00:00:00', '2022-08-02 00:00:00', '2022-08-02 00:00:00', '3'),
(18, 163, 69, '2022-07-26 00:00:00', '2022-07-26 00:00:00', '2022-07-26 00:00:00', 'Rapat di ANRI Cilandak', '2022-07-26 00:00:00', '2022-07-26 00:00:00', '2022-07-26 00:00:00', '3'),
(19, 155, 95, '2022-07-29 00:00:00', '2022-07-29 00:00:00', '2022-07-29 00:00:00', 'Kegiatan Olahraga Lapangan Kemanggisan', '2022-07-29 00:00:00', '2022-07-29 00:00:00', '2022-07-29 00:00:00', '3'),
(20, 155, 95, '2022-08-05 00:00:00', '2022-08-05 00:00:00', '2022-08-05 00:00:00', 'Kegiatan Olahraga Lapangan Kemayoran', '2022-08-05 00:00:00', '2022-08-05 00:00:00', '2022-08-05 00:00:00', '3'),
(21, 156, 74, '2022-07-26 00:00:00', '2022-07-26 00:00:00', '2022-07-26 00:00:00', 'KPKNL Jakarta', '2022-07-26 00:00:00', '2022-07-26 00:00:00', '2022-07-26 00:00:00', '3');

-- --------------------------------------------------------

--
-- Table structure for table `permintaan_pengadaan`
--

CREATE TABLE `permintaan_pengadaan` (
  `id` int(10) UNSIGNED NOT NULL,
  `id_pegawai` int(10) UNSIGNED NOT NULL,
  `id_unit` int(10) UNSIGNED NOT NULL,
  `id_subunit` int(10) UNSIGNED NOT NULL,
  `tipe_pengadaan` varchar(50) NOT NULL,
  `jenis_kegiatan` varchar(100) NOT NULL,
  `isi_permintaan` varchar(500) NOT NULL,
  `tgl_pengajuan` datetime NOT NULL,
  `tgl_persetujuan_subbag` datetime DEFAULT NULL,
  `tgl_persetujuan_bag` datetime DEFAULT NULL,
  `status` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `permintaan_pengadaan`
--

INSERT INTO `permintaan_pengadaan` (`id`, `id_pegawai`, `id_unit`, `id_subunit`, `tipe_pengadaan`, `jenis_kegiatan`, `isi_permintaan`, `tgl_pengajuan`, `tgl_persetujuan_subbag`, `tgl_persetujuan_bag`, `status`) VALUES
(11, 123, 8, 3, 'ATK', 'Bulanan', 'A4                                               5 rim\r\nMap garuda                             40 pcs\r\nMap bening (clear sleeves)   10 pcs\r\nDocument tray 2 tingkat          2 pcs\r\nIsi staples besar                       3 pcs\r\nTinta printer Epson L5190       1 set\r\nLakban hitam                            3 pcs\r\nBaterai A2                                 8 pasang', '2022-07-25 00:00:00', '2022-07-25 00:00:00', '2022-07-25 00:00:00', '2'),
(12, 119, 7, 9, 'ATK', 'Bulanan', 'Flashdisk 2, Baterai AA 2, Baterai A3 2, Isi Seteples 10, Tipex Kertas 3, Map 3 dus, Tinta Printer L565 semua warna 2 pack, Bolpoint Gel 2 dus, Kerta A4 10rim, Plastik F4 20 bungkus.', '2022-08-05 00:00:00', '2022-08-05 00:00:00', '2022-08-05 00:00:00', '2'),
(13, 110, 6, 6, 'ATK', 'Bulanan', 'Batre AA 2 set\r\nBatre AAA 2 set\r\nLakban item 2\r\nSolusi putih besar 1\r\nPensil 5\r\nPulpen 10\r\nPenghapus 3\r\nPenggaris 2\r\nCutter 1\r\nKertas A4 2 rim\r\nKertas F4 2 rim\r\nTipe x roll 1\r\nGunting 1', '2022-07-28 00:00:00', '2022-07-28 00:00:00', '2022-07-28 00:00:00', '2'),
(14, 123, 8, 3, 'ATK', 'Bulanan', 'A4                                                                           10 rim\r\nF4                                                                             8 rim\r\nMouse                                                                      3 pcs\r\nDesk organizer (yg ada tempat klip)                    5 pcs\r\nPensil 2B                                                                 1 dus\r\nBox file                                                                     3 pcs\r\nLakban hitam        ', '2022-08-02 00:00:00', '2022-08-02 00:00:00', '2022-08-02 00:00:00', '2'),
(16, 91, 6, 6, 'ATK', 'Bulanan', '- Baterai A3                                        : 3 pasang\r\n- Baterai A2                                        : 3 pasang\r\n- Kertas foto uk A4                            : 20 lembar\r\n- Sheet Protector F4 isi 100 PP       : 6 box\r\n- Stabillo   5                                        :  5 Warna\r\n- Kertas A4                                         : 5 Rim\r\n- Kertas F4                                         : 2 rim\r\n- Bolpoin hitam                                  : 2 box\r\n- Amplop panjang   ', '2022-08-02 00:00:00', '2022-08-02 00:00:00', '2022-08-02 00:00:00', '2'),
(17, 112, 6, 6, 'ATK', 'Bulanan', '1. Bateray AA  : 6 buah\r\n2. Kertas A4    : 6 Rim\r\n3. Tinta printer Epson L.565 : 1 Set\r\n4. Isi Hexmacine Kecil : 6 dus\r\n5. Pos It Warna Warni : 2 buah\r\n6. Bolpoin faster : 6 buah\r\n7. Stop map Biasa : 30 lbr\r\n8. Binder clip 105 : 6 dus\r\n9. binder clip 107 : 6 Dus\r\n10. Amplop Coklat ukuran A4 : 20 lbr', '2022-08-02 00:00:00', '2022-08-02 00:00:00', '2022-08-02 00:00:00', '2'),
(18, 124, 8, 1, 'ATK', 'Bulanan', '1. Kertas A4 3 Rim\r\n2. Baterai A3 4 pasang\r\n3. Kertas F4 1 Rim\r\n4. Stopmap Biasa 25 buah\r\n5. Stopmap Garuda 10 buah\r\n6. Binder clip kecil 5 kotak\r\n7. Kertas foto spectra A4 20 sheets\r\n8. Bolpoint ball liner hitam 5 buah\r\n9. Flashdisk 5 buah\r\n10. Tempat pensil besi hitam 2 buah\r\n11. Isolasi kecil 4 buah\r\n12. Alat pemotongan isolasi besar 2 buah\r\n13. Baterai kotak alkalin 2 buah\r\n14. Laser pointer 1 buah \r\n15. Double tape besar 1 buah\r\n16. Kertas K Label Printer EZ Label 9 MM 12MM  Compatible Casi', '2022-08-02 00:00:00', '2022-08-02 00:00:00', '2022-08-02 00:00:00', '2'),
(19, 118, 7, 8, 'ATK', 'Bulanan', 'tinta 283A\r\ntinta 217A\r\ntinta 12A \r\ntinta 664 1 set\r\nisi streples besar 2\r\nisi streples kecil 2\r\nkertas a4 5\r\nmouse wireless 3\r\nmouse pad 5\r\npulpen hitam 3\r\npulpen biru 3', '2022-08-02 00:00:00', '2022-08-02 00:00:00', '2022-08-02 00:00:00', '2'),
(20, 121, 6, 4, 'ATK', 'Bulanan', 'kertas A4 (3 rim)\r\nkertas F4 (2 rim)\r\nsheet protector F4 (5 pack)\r\nclear sleeves 9002 (1 pack)\r\nballiner hitam (12 pcs)\r\nbussiness file (12 pcs)', '2022-08-02 00:00:00', '2022-08-02 00:00:00', '2022-08-02 00:00:00', '2'),
(21, 125, 8, 2, 'ATK', 'Bulanan', '1.Kertas A4 (3 rim)\r\n2. Map (40 pcs)\r\n3. Mouse (2 Pcs)\r\n4. Sticker sign here (2)\r\n5. Plastik Bening untuk Map Folder 40 PCS\r\n6. Tip ex (1)\r\n7. Binder Clip no. 260 (1 kardus), 200 (1 kardus), 155 (1 kardus), 280 (1 kardus)\r\n8. Lem (2)\r\n9. Penggaris (1)', '2022-08-02 00:00:00', '2022-08-02 00:00:00', '2022-08-02 00:00:00', '2'),
(22, 117, 7, 7, 'ATK', 'Bulanan', 'Kertas A4 3 RIM\r\nMouse komputer 2\r\ntrigonal clip 2 bungkus', '2022-08-02 00:00:00', '2022-08-02 00:00:00', '2022-08-02 00:00:00', '2'),
(23, 125, 8, 2, 'ATK', 'Bulanan', '1.Kertas A4 (3 rim)\r\n2. Map (40 pcs)\r\n3. Mouse (2 Pcs)\r\n4. Sticker sign here (2)\r\n5. Plastik Bening untuk Map Folder 40 PCS\r\n6. Tip ex (1)\r\n7. Binder Clip no. 260 (1 kardus), 200 (1 kardus), 155 (1 kardus), 280 (1 kardus)\r\n8. Lem (2)\r\n9. Penggaris (1)\r\n10. Staples (2)\r\n11. Isi staples (10)\r\n12. Sheet Protector-glass clear (3)\r\n13. Ordner Bindex (2)\r\n14. Mousepad yang bagus (2)', '2022-08-03 00:00:00', '2022-08-03 00:00:00', '2022-08-03 00:00:00', '2'),
(24, 116, 6, 6, 'ATK', 'Bulanan', '1.        KERTAS GARUDA EMAS 1 RIM\r\n2.        KERTAS A4 5 RIM\r\n3.        GUNTING KECIL 1 BUAH\r\n4.    BATERAI A2 3 SET\r\n5.        RAUTAN PINSIL BESAR 1 BUAH\r\n6.        TINTA PRINTER EPSON 664 1 SET\r\n7.        MAP BIASA MERAH 100 LEMBAR (BUAT PENGAJUAN WABKU, PERINTAH DEPUTI)\r\n8.        MAP GARUDA 20 LEMBAR\r\n9.        bATERAI BESAT BUAT PEWANGI ELEKTRIK 4 BH\r\n10.        LAKBAN BENING BESAR 2 BH\r\n11.        BATERAI A3 3 SET\r\n12.        REFIL PEWANGI ELEKTRIK 2 BH\r\n13.        MOUSE WIRELLES  1 BUAH\r', '2022-08-03 00:00:00', '2022-08-03 00:00:00', '2022-08-03 00:00:00', '2'),
(25, 95, 6, 6, 'ATK', 'Bulanan', '1. Kenko Binder Clip No. 105         = 5 dos\r\n2. Kenko Binder Clip No. 111        = 5 dos\r\n3. Kenko Binder Clip No. 155         = 5 dos\r\n4. Kenko Binder Clip No. 200        = 5 dos\r\n5. Kenko Binder Clip No. 260        = 5 dos\r\n6. Clip Trigonal Joyco No.3            = 5 dos\r\n7. Post it Mark                                = 5 pcs\r\n8. Post It Notes                              = 5 pcs\r\n9. Spidol White Board (H/M/B)        = 2/2/2\r\n10. Map Logo Garuda                       = 20 pcs\r\n11. Map Biasa   ', '2022-08-03 00:00:00', '2022-08-03 00:00:00', '2022-08-03 00:00:00', '2'),
(26, 95, 6, 6, 'ATK', 'RTD', '1. Kertas A4 = 3 rim\r\n2. Cover bolong = 15 pcs\r\n3. Kertas cover warna cream = 1 pak\r\n4. Lem fox = 1 pcs', '2022-08-03 00:00:00', '2022-08-03 00:00:00', '2022-08-03 00:00:00', '2'),
(27, 95, 6, 6, 'ATK', 'RTD', '1. Kertas A4 = 3 rim\r\n2. Cover bolong = 15 pcs\r\n3. kertas cover biru muda = 1 pak', '2022-08-03 00:00:00', '2022-08-03 00:00:00', '2022-08-03 00:00:00', '2'),
(28, 91, 6, 6, 'ATK', 'KKDN', '- Plakat Setjen Wantannas  : 5 buah', '2022-08-03 00:00:00', '2022-08-03 00:00:00', '2022-08-03 00:00:00', '2'),
(29, 122, 6, 6, 'ATK', 'Bulanan', 'Binder clip kecil                               3 box\r\nPaper clip                                         3 box\r\nKertas A4                                         10 rim\r\nKertas A4 Garuda emas                 5 rim\r\nAmplop Putih Garuda emas          2 Pack\r\nSticky note                                       2 buah\r\npulpen joyko biru                            5 buah\r\npulpen joyko hitam                         5 buah\r\nbaterai AAA                                     2 pasang\r\nbaterai AA            ', '2022-08-03 00:00:00', '2022-08-03 00:00:00', '2022-08-03 00:00:00', '2'),
(30, 90, 6, 6, 'ATK', 'Bulanan', '1. Toner 83 A                             1 bh\r\n2. tinta  664 (M, K, H)                1 BH\r\n3. Flasdiks 16 GB                      2 bh\r\n4. Balliner hitam                        2 bh\r\n5. Baliiner Biru                           2 bh\r\n6. Kertas A4                               4 rim\r\n7. Cover bolong                         50 lbr\r\n8. Pembatas kertas                   25 lbr\r\n9. Amplop kecil                          1 dus\r\n10. Mark notes warna               2 bh\r\n11. doble tip                     ', '2022-08-04 00:00:00', '2022-08-04 00:00:00', '2022-08-04 00:00:00', '2'),
(31, 120, 6, 6, 'ATK', 'Bulanan', '1. Kertas A4 1 rim\r\n2. Bulpen 1 pack\r\n3. Map biasa 5 buah\r\n4. Isolasi kecil 2 buah\r\n5. Double tape kecil 1 buah', '2022-08-04 00:00:00', '2022-08-04 00:00:00', '2022-08-04 00:00:00', '2'),
(32, 121, 6, 4, 'ATK', 'Bulanan', 'box arsip (10 box)', '2022-08-04 00:00:00', '2022-08-04 00:00:00', '2022-08-04 00:00:00', '2');

-- --------------------------------------------------------

--
-- Table structure for table `ruangan`
--

CREATE TABLE `ruangan` (
  `id` int(10) UNSIGNED NOT NULL,
  `kode_ruangan` varchar(50) NOT NULL,
  `nama_ruangan` varchar(100) NOT NULL,
  `id_gedung` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `ruangan`
--

INSERT INTO `ruangan` (`id`, `kode_ruangan`, `nama_ruangan`, `id_gedung`) VALUES
(1, '1', 'Ruangan 1', 1),
(2, '2', 'Ruangan 2', 2);

-- --------------------------------------------------------

--
-- Table structure for table `sub_unit`
--

CREATE TABLE `sub_unit` (
  `id` int(11) NOT NULL,
  `nama_subunit` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `sub_unit`
--

INSERT INTO `sub_unit` (`id`, `nama_subunit`) VALUES
(1, 'Bagian Sistem Informasi'),
(2, 'Bagian Pengawasan Internal'),
(3, 'Bagian Persidangan & Humas'),
(4, 'Bagian Kepegawaian'),
(5, 'Bagian Perlengkapan'),
(6, 'Bagian Tata Usaha & Protokol'),
(7, 'Bagian Perencanaan'),
(8, 'Bagian Ortala'),
(9, 'Bagian Keuangan');

-- --------------------------------------------------------

--
-- Table structure for table `unit`
--

CREATE TABLE `unit` (
  `id` int(10) UNSIGNED NOT NULL,
  `nama_unit` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `unit`
--

INSERT INTO `unit` (`id`, `nama_unit`) VALUES
(1, 'Sekretariat Jenderal Dewan Ketahanan Nasional'),
(2, 'Deputi Sistem Nasional'),
(3, 'Deputi Pengkajian dan Penginderaan'),
(4, 'Deputi Politik dan Strategi'),
(5, 'Deputi Pengembangan'),
(6, 'Biro Umum'),
(7, 'Biro POK'),
(8, 'Biro PSP'),
(9, 'Staf Ahli');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(10) UNSIGNED NOT NULL,
  `username` varchar(20) NOT NULL,
  `password` varchar(100) NOT NULL,
  `role` varchar(100) NOT NULL,
  `id_pegawai` int(10) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `username`, `password`, `role`, `id_pegawai`) VALUES
(1, 'admin', '$2y$10$6AmUCsZPL.lHddKv5oldZ.kpVHLglOK3VmzMJz47sioTiCaJmne7y', 'Administrator', 0),
(3, '9256/P', '$2y$10$s83aMABcEpKehF7TsbRR2u7L9iqD33NyCTqr1bdjm4SB/5Yb3inrG', 'User', 2),
(4, '11225/P', '$2y$10$0Y8k.6vqoUwQBUcHmoDC7uvQSQZIwIk5747f6QM4KPX4QUb2W3eMO', 'Karoum', 7),
(5, '198211252009011006', '$2y$10$U9KUvDhf1RFfLLGnVzdy9OHoxd/nuQ.xFm/.xr8L/YJEuN0hisG4y', 'Kabag PPBJ', 8),
(6, '198308262009012003', '$2y$10$gLbbqR5DGDo28uY7chfnFuoxj7Qqx6IfdwUoqgTFJx/.hhzh9mSim', 'Sub Pengadaan', 10),
(8, '196503301990051001', '$2y$10$oTMREt3aaIk4JhNj3WLzluA/w8PcU5DV9/ZyZZ7/bXdUCgl8hNUci', 'Sub BMN', 9),
(11, '197709122006041004', '$2y$10$EuW.iwQCKxVy3vTojv9FTeyFNqido7kLhuX.Q9Z3jZWEku6QYIKga', 'User', 13),
(12, '198704092019021001', '$2y$10$Mivw31nVc0YiUxmxojC/8e/hrGA32mTy/hj9IkvLDAFCAufx3IA2m', 'User', 14),
(13, '197410302009011001', '$2y$10$4xPWNbNc7PVWQnL9GaiEsexPTL/LJpGE/bKCVjlYw0rs3iibmmTqC', 'User', 15),
(14, '32378', '$2y$10$DP.8l3XL/CTDKNRQm.R0ium2UFVeSJbvkExxsOTCKw2W30.CM7Ppq', 'User', 4),
(15, '513119', '$2y$10$FqKTI1RNcGKphXmk6uAGaunB2fSu5NSyIhNWnTLImSmtZbCr8sGDi', 'User', 3),
(17, '196604231993011001', '$2y$10$GU7UL/gkD1wILtIRm3lrOO3zn3x/9iGo1tjVum2G7KyKmiZFs9F0G', 'User', 99),
(18, '196808101995011001', '$2y$10$5FsEQc6n.qqbh0kZzam.t.qTUIkRBcc89K9wmbd4Ebi2QuPuVMgpC', 'User', 100),
(19, '196711201989101001', '$2y$10$e5UXEofYsGQBF7YNaYN/k.p/8jyyxGLTcAQ4cqo4VyeMuxyC8PKWe', 'User', 96),
(20, '65030622', '$2y$10$vjPQQjv2GkEyLiL9mZPEiOVPKt8UBvnPF9Hr4Pr6l2G5S1Gp3d8cm', 'User', 5),
(21, '196412161987031002', '$2y$10$wg3hhqNyp2F2hZc.tB0zgutJIdzFPTOABPc80WdcW3SIzvY19p01a', 'User', 20),
(22, '198512132019021002', '$2y$10$yxMCXbmXlUayWTNS.Fv9R.wiHKf9qZPOCpsg.7baiIbz1teJhpN1e', 'User', 117),
(23, '199505222019022004', '$2y$10$ujvb7PizOneOfPbAbWhVrOSVbfOBst15X9bFr1Nfvk4RrdRGQeP4i', 'User', 118),
(24, '199612022019022002', '$2y$10$SuYT2kH6eAsJUTWpv4il8One4o6OBs1fuEl47JWazWW6GkrJohqXG', 'User', 119),
(25, '197302122006042003', '$2y$10$e0aEgtOZGZEOXxRHb7RQ3eIHmrFQPr25o9rOktgsPZi0V5UN5dvT2', 'User', 116),
(26, '197203131993022001', '$2y$10$.N8b0vEVD6HvHrnOdi05g.Z1gwR/My0RUO1GzW3Sdy.YdnZR8eg.S', 'User', 90),
(27, '197106032009011003', '$2y$10$i59ggN2h.Y0e9j4xyFDESO2/6SJq53UasUofPhwoSSpz8eSZFKVWS', 'User', 91),
(28, 'pitra', '$2y$10$k3.fPGibWzyknEXEADckbuPsWH0b63Lv/CUcvFBTpojxkiAfBZSVK', 'User', 120),
(29, '199506232019022002', '$2y$10$7qqryCJFOAKgnl7dvRHyB.kq9Ok3IFQLn71zuUf0ZyFOWeMdG48oO', 'User', 121),
(30, '199307232019022005', '$2y$10$o66W.BeTylraJ6D6MDcv8OQGFp8xDLRYJo9irsJ88hxOmeXPhsJ1e', 'User', 122),
(31, '199406272019022003', '$2y$10$I0ek3S1fy36b6SZNvxyGc.D/9/aQqVURtSEEsJVE3l1hV4MyJXCoK', 'User', 123),
(32, '198510052019021001', '$2y$10$NT4SXrh.sXsDpjFpO9qacevLrdMzLg2j3KMJCJ0rOsDjX5YdBEnj2', 'User', 124),
(33, '199208242019021002', '$2y$10$OmDqUAB0IFL4AR9cS2EI5es.AhcES1rK0RDX1uvv4/aYQ9d73XndW', 'User', 125),
(34, '197711241998031001', '$2y$10$Zn0Mhp.cJcg7s1BlnrnY3uCS5N3jS4TBVFiisdua2a8UWY7UXv1MW', 'User', 112),
(35, '198103262009012003', '$2y$10$nrm0HOwO.fCru.ydLPSVHO6a9XpoxeAY7Zyy5MmNM/xV/dR6HfvEi', 'User', 95),
(36, '198701272006042001', '$2y$10$JvFgDL2jmsWwYFAtgRVd4uZ0H8CySF7Td/LoC3kbngjBQ9jIjQ/qu', 'User', 110),
(37, '197508182007011004', '$2y$10$r7muDcAhsAw7Z//ZulL15.ITEn.CGEvM1IYhufRaJXvF/r0IArm1G', 'User', 156),
(38, '196803131989101001', '$2y$10$K0NBtZ.G.meo7ra/2yfZiO87QSTc1TkCO62ICmDwZnKUEkJbAGdiS', 'User', 98),
(39, '197309092006042003', '$2y$10$80F4/1ANYWW9HJZM51MVaecVKW1WxOBcI4fDKRei7vKwGLP2CXLrm', 'User', 88),
(40, '198402072006042002', '$2y$10$ka4PZhuXuXbxIIUGtiDXw.Gg1RtVF3asaylyL6Mx.iR4aAspb6Yc6', 'User', 106),
(41, '196906121999031001', '$2y$10$fESSMgbsykAcwvaQQsAvAu66VoO/.PL2yLHVKhhFt.ZEDcZMMygoK', 'User', 113),
(42, '198502122008101001', '$2y$10$YzySCgMX90WM8v7HXiS69.xsE9v.03AcX0WXxMV3wH3g16NLQ5VZ.', 'User', 155),
(43, '198603232019022002', '$2y$10$ncFGof8F1RQ8d/ewaahy1OHJmfhKIY.lS1J0m4KHMo3kiGk4pgyQ.', 'User', 130),
(44, '197705161998031001', '$2y$10$UyDFcFaRzqFPgml0lu1nzO0m9h11XJvqPzgTp0ue.rMTxPtN6Ziny', 'User', 126),
(45, '11050013800465', '$2y$10$PwIJiB4vn5M49K0HntQ5/ulE.3JL.oQrMUWJwQlZefpt8TlxssSTS', 'User', 80),
(46, '197710042008101001', '$2y$10$ZPFAg603EP2pk7xYH1sco.2HAV/Z33pmQYoSmYyY3PNuGc4tZ1cPa', 'User', 163),
(47, '196911271988031001', '$2y$10$lmk0Je0zY8kTUypUwReWz.78OHpKyzrm6HQPbyNCqmioRBrNL6LxS', 'Sub Rumga', 97);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `atk`
--
ALTER TABLE `atk`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `coba`
--
ALTER TABLE `coba`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `distribusi_permintaan_pengadaan`
--
ALTER TABLE `distribusi_permintaan_pengadaan`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `distribusi_randis`
--
ALTER TABLE `distribusi_randis`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `gedung`
--
ALTER TABLE `gedung`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `jabatan`
--
ALTER TABLE `jabatan`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `jenis_operasional`
--
ALTER TABLE `jenis_operasional`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `kegiatan`
--
ALTER TABLE `kegiatan`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `kendaraan_dinas`
--
ALTER TABLE `kendaraan_dinas`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `pegawai`
--
ALTER TABLE `pegawai`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `peminjaman_randis`
--
ALTER TABLE `peminjaman_randis`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `permintaan_pengadaan`
--
ALTER TABLE `permintaan_pengadaan`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `ruangan`
--
ALTER TABLE `ruangan`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `sub_unit`
--
ALTER TABLE `sub_unit`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `unit`
--
ALTER TABLE `unit`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `atk`
--
ALTER TABLE `atk`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `coba`
--
ALTER TABLE `coba`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `distribusi_permintaan_pengadaan`
--
ALTER TABLE `distribusi_permintaan_pengadaan`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=58;

--
-- AUTO_INCREMENT for table `distribusi_randis`
--
ALTER TABLE `distribusi_randis`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `gedung`
--
ALTER TABLE `gedung`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `jabatan`
--
ALTER TABLE `jabatan`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=197;

--
-- AUTO_INCREMENT for table `jenis_operasional`
--
ALTER TABLE `jenis_operasional`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `kegiatan`
--
ALTER TABLE `kegiatan`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `kendaraan_dinas`
--
ALTER TABLE `kendaraan_dinas`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=123;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `pegawai`
--
ALTER TABLE `pegawai`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=187;

--
-- AUTO_INCREMENT for table `peminjaman_randis`
--
ALTER TABLE `peminjaman_randis`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT for table `permintaan_pengadaan`
--
ALTER TABLE `permintaan_pengadaan`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=38;

--
-- AUTO_INCREMENT for table `ruangan`
--
ALTER TABLE `ruangan`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `sub_unit`
--
ALTER TABLE `sub_unit`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `unit`
--
ALTER TABLE `unit`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=48;

DELIMITER $$
--
-- Events
--
CREATE DEFINER=`root`@`localhost` EVENT `Update Tanggal Terima` ON SCHEDULE EVERY 1 DAY STARTS '2022-08-09 10:26:06' ON COMPLETION NOT PRESERVE ENABLE DO UPDATE distribusi_permintaan_pengadaan 
SET tgl_terima = NOW(),
	staus = '3'
WHERE tgl_terima IS NULL
AND tgl_terkirim IS NOT NULL
AND NOW() > DATE_ADD(tgl_terkirim, INTERVAL 2 DAY)$$

DELIMITER ;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

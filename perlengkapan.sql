-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Aug 07, 2022 at 05:34 PM
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
(1, 5, '3', '2022-08-06 23:26:34', '2022-08-06 23:31:29', '2022-08-07 10:32:54'),
(2, 6, '0', NULL, NULL, NULL),
(3, 7, '0', NULL, NULL, NULL),
(4, 9, '0', NULL, NULL, NULL),
(9, 8, '0', NULL, NULL, NULL),
(10, 10, '3', '2022-08-07 10:06:15', '2022-08-07 10:12:32', '2022-08-07 10:31:33');

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
(1, 2, 9),
(2, 3, 3),
(3, 6, 13);

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
(15, 'Analis Persandian');

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
(2, 'Rapat Kerja Terbatas'),
(3, 'Kelompok Kerja Khusus'),
(4, 'Kunjungan dari BKN');

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
  `keterangan` varchar(500) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `kendaraan_dinas`
--

INSERT INTO `kendaraan_dinas` (`id`, `nopol`, `tahun_pengadaan`, `merk_kendaraan`, `tipe_kendaraan`, `id_jenis_operasional`, `keterangan`) VALUES
(2, 'B1234CD', '2014', 'Suzuki Phanter', 'mobil', 3, 'Mobil Suzuki Phanter'),
(3, 'B1234EF', '2015', 'Toyota Altis', 'mobil', 2, 'Mobil Toyota Altis'),
(4, 'B1234GH', '2018', 'HIACE', 'bus', 1, 'Mobil Hiace 1'),
(5, 'B1235GH', '2018', 'HIACE', 'bus', 1, 'Mobil Hiace 2'),
(6, 'B1111AB', '2020', 'Bus Wantannas', 'bus', 3, '');

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
(1, '8890/P', 'Dr. Ir. Harjo Susmoro, S.Sos., S.H., M.H., M.Tr.Opsla.', 'Laksdya TNI', 1, 1, 0),
(2, '9256/P', 'Gregorius Agung W. D., M.Tr (Han)', 'Laksda TNI', 3, 3, 0),
(3, '513119', 'Maman Suherman, M.A.P., M.Han.', 'Marsda TNI', 5, 5, 0),
(4, '32378', 'Syachriyal E. Siregar, S.E.', 'Mayjen TNI', 2, 2, 0),
(5, '65030622', 'Drs. Heribertus Dahana R., S.H., M.Si.', 'Irjen Pol', 4, 4, 0),
(7, '11225/P', 'Supendi, S.T., M.Tr.Opsla', 'Laksma TNI', 6, 6, 0),
(8, '198211252009011006', 'Nurman Kahar, S.IP., M.AP.', '', 7, 6, 5),
(9, '196503301990051001', 'Sutawijaya', '', 9, 6, 5),
(10, '198308262009012003', 'Mutia Tri Yuliyati, S.E.', '', 8, 6, 5),
(11, '196911271988031001', 'Suntama', '', 10, 6, 5),
(13, '197709122006041004', 'Dedy Purwadi, A.Md', '', 12, 8, 1),
(14, '198704092019021001', 'Haryo Sasmito, S.E.', '', 13, 6, 4),
(15, '197410302009011001', 'Reno Ardiansyah, S.Kom.', '', 14, 6, 4),
(19, '199307232019022005', 'Nadia Talita Putri, S.I.P.', '', 15, 6, 6);

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
(1, 15, 4, '2022-08-05 00:00:00', '2022-08-15 00:00:00', '2022-08-19 00:00:00', 'Untuk Pulang Kampung', NULL, NULL, NULL, '0'),
(2, 14, 4, '2022-08-05 00:00:00', '2022-08-15 00:00:00', '2022-08-16 00:00:00', 'Jalan jalan', NULL, NULL, NULL, '0');

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
(5, 14, 6, 4, 'ATK', 'Bulanan', '- Flashdisk 16GB 1pcs\r\n- Kertas A4 1rim', '2022-08-03 00:00:00', '2022-08-03 04:45:53', '2022-08-03 05:35:42', '2'),
(6, 15, 6, 4, 'ATK', 'Bulanan', '- Ballpoint 1pcs', '2022-07-05 00:00:00', '2022-08-03 05:48:54', '2022-08-03 05:49:54', '2'),
(7, 14, 6, 4, 'ATK', 'Bulanan', '- Coba 1\r\n- Coba 2\r\n- Coba 3', '2022-08-04 00:00:00', '2022-08-04 11:12:54', '2022-08-04 11:12:54', '2'),
(8, 14, 6, 4, 'Cetakan', 'Kunjungan dari BKN', 'Plakat Wantannas 1pcs', '2022-08-05 00:00:00', '2022-08-07 08:32:22', '2022-08-07 08:32:22', '2'),
(9, 14, 6, 4, 'ATK', 'Rapat Kerja Terbatas', '- Kertas A4 10rim', '2022-08-05 00:00:00', '2022-08-05 02:10:11', '2022-08-05 02:10:11', '2'),
(10, 19, 6, 6, 'ATK', 'Bulanan', '- Pensil 1\r\n- Ballpoint 1', '2022-08-07 00:00:00', '2022-08-07 09:04:06', '2022-08-07 09:04:06', '2');

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
(8, 'Biro PSP');

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
(2, '8890/P', '$2y$10$6AmUCsZPL.lHddKv5oldZ.kpVHLglOK3VmzMJz47sioTiCaJmne7y', 'User', 1),
(3, '9256/P', '$2y$10$s83aMABcEpKehF7TsbRR2u7L9iqD33NyCTqr1bdjm4SB/5Yb3inrG', 'User', 2),
(4, '11225/P', '$2y$10$0Y8k.6vqoUwQBUcHmoDC7uvQSQZIwIk5747f6QM4KPX4QUb2W3eMO', 'Karoum', 7),
(5, '198211252009011006', '$2y$10$U9KUvDhf1RFfLLGnVzdy9OHoxd/nuQ.xFm/.xr8L/YJEuN0hisG4y', 'Kabag PPBJ', 8),
(6, '198308262009012003', '$2y$10$gLbbqR5DGDo28uY7chfnFuoxj7Qqx6IfdwUoqgTFJx/.hhzh9mSim', 'Sub Pengadaan', 10),
(7, '196911271988031001', '$2y$10$hgS2Jl4irOrSe46FYXztBOvWgxIzovmjVzUh5zFKR89f2O6C3tMom', 'Sub Rumga', 11),
(8, '196503301990051001', '$2y$10$oTMREt3aaIk4JhNj3WLzluA/w8PcU5DV9/ZyZZ7/bXdUCgl8hNUci', 'Sub BMN', 9),
(11, '197709122006041004', '$2y$10$EuW.iwQCKxVy3vTojv9FTeyFNqido7kLhuX.Q9Z3jZWEku6QYIKga', 'User', 13),
(12, '198704092019021001', '$2y$10$Mivw31nVc0YiUxmxojC/8e/hrGA32mTy/hj9IkvLDAFCAufx3IA2m', 'User', 14),
(13, '197410302009011001', '$2y$10$4xPWNbNc7PVWQnL9GaiEsexPTL/LJpGE/bKCVjlYw0rs3iibmmTqC', 'User', 15),
(14, '32378', '$2y$10$DP.8l3XL/CTDKNRQm.R0ium2UFVeSJbvkExxsOTCKw2W30.CM7Ppq', 'User', 4),
(15, '513119', '$2y$10$FqKTI1RNcGKphXmk6uAGaunB2fSu5NSyIhNWnTLImSmtZbCr8sGDi', 'User', 3),
(16, '199307232019022005', '$2y$10$7duHwEC56tsTk30qMTyLU.rzTJZg6BgGO8BDimsCMn0Ora6gEGqPe', 'User', 19);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `atk`
--
ALTER TABLE `atk`
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
-- AUTO_INCREMENT for table `distribusi_permintaan_pengadaan`
--
ALTER TABLE `distribusi_permintaan_pengadaan`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `distribusi_randis`
--
ALTER TABLE `distribusi_randis`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `gedung`
--
ALTER TABLE `gedung`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `jabatan`
--
ALTER TABLE `jabatan`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `jenis_operasional`
--
ALTER TABLE `jenis_operasional`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `kegiatan`
--
ALTER TABLE `kegiatan`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `kendaraan_dinas`
--
ALTER TABLE `kendaraan_dinas`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `pegawai`
--
ALTER TABLE `pegawai`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT for table `peminjaman_randis`
--
ALTER TABLE `peminjaman_randis`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `permintaan_pengadaan`
--
ALTER TABLE `permintaan_pengadaan`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

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
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 10, 2023 at 10:29 AM
-- Server version: 10.4.27-MariaDB
-- PHP Version: 7.4.33

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `webgis-php`
--

-- --------------------------------------------------------

--
-- Table structure for table `m_kecamatan`
--

CREATE TABLE `m_kecamatan` (
  `id_kecamatan` int(11) NOT NULL,
  `kd_kecamatan` varchar(10) NOT NULL,
  `nm_kecamatan` varchar(30) NOT NULL,
  `geojson_kecamatan` varchar(30) NOT NULL,
  `warna_kecamatan` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `m_kecamatan`
--

INSERT INTO `m_kecamatan` (`id_kecamatan`, `kd_kecamatan`, `nm_kecamatan`, `geojson_kecamatan`, `warna_kecamatan`) VALUES
(6, '63.01.08', 'Tambang Ulang', '55300320083500.geojson', '#009900'),
(8, '63.01.01', 'Takisung', '25061219081252.geojson', '#0de70d'),
(16, '63.01.05', 'Bati-Bati', '71061219081303.geojson', '#880000'),
(17, '63.01.02', 'Jorong', '34061219081408.geojson', '#000099'),
(18, '63.01.03', 'Pelaihari', '39061219081421.geojson', '#DD9900'),
(19, '63.01.04', 'Kurau', '30061219081442.geojson', '#009999'),
(20, '63.01.07', 'Kintap', '29061219081511.geojson', '#ff0099'),
(21, '63.01.09', 'Batu Ampar', '44061219081535.geojson', '#990099'),
(22, '63.01.10', 'Bajuin', '92061219081549.geojson', '#662222'),
(23, '63.01.11', 'Bumi Makmur', '58061219081604.geojson', '#888'),
(24, '63.01.06', 'Panyipatan', '100061219081653.geojson', '#222');

-- --------------------------------------------------------

--
-- Table structure for table `pengguna`
--

CREATE TABLE `pengguna` (
  `id_pengguna` int(11) NOT NULL,
  `nm_pengguna` varchar(20) NOT NULL,
  `kt_sandi` varchar(150) NOT NULL,
  `level` enum('Admin','User') NOT NULL DEFAULT 'User'
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `pengguna`
--

INSERT INTO `pengguna` (`id_pengguna`, `nm_pengguna`, `kt_sandi`, `level`) VALUES
(1, 'admin', '$2y$10$oNX.X8jgLhNclHBeI8ytT.1vODlml8.AN1Ieb.rSIChhCa1e7cS0S', 'Admin'),
(2, 'user', '$2y$10$oNX.X8jgLhNclHBeI8ytT.1vODlml8.AN1Ieb.rSIChhCa1e7cS0S', 'User');

-- --------------------------------------------------------

--
-- Table structure for table `t_hotspot`
--

CREATE TABLE `t_hotspot` (
  `id_smp` int(11) NOT NULL,
  `nm_smp` varchar(100) NOT NULL,
  `npsn` varchar(100) NOT NULL,
  `lat` float(9,6) NOT NULL,
  `lng` float(9,6) NOT NULL,
  `alamat` text NOT NULL,
  `akre` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `t_hotspot`
--

INSERT INTO `t_hotspot` (`id_smp`, `nm_smp`, `npsn`, `lat`, `lng`, `alamat`, `akre`) VALUES
(18, 'SMPN 10 KOTA BEKASI', '20223002', -6.316828, 107.008430, 'Jl. Raya Padurenan No.RT 03/06, RT.001/RW.006, Padurenan, Kec. Mustika Jaya, Kota Bks, Jawa Barat 17156', 'A'),
(19, 'SMPN 26 KOTA BEKASI', '20222967', -6.306455, 107.025200, 'Jl. Graha Indah XII No.17, RT.007/RW.020, Mustika Jaya, Kec. Mustika Jaya, Kota Bks, Jawa Barat 16340', 'A'),
(20, 'SMPN 36 KOTA BEKASI', '20258383 ', -6.309859, 107.016693, 'M2Q8+WMP, Kp, Jl. Klp. Dua, RT.003/RW.008, Padurenan, Kec. Mustika Jaya, Kota Bks, Jawa Barat 16340', 'A'),
(21, 'SMPN 40 KOTA BEKASI', '69862662', -6.294368, 107.022079, 'Jl. Rw. Mulya, RT.018/RW.003, Mustika Jaya, Kec. Mustika Jaya, Kota Bks, Jawa Barat 17158', 'A'),
(22, 'SMPN 48 KOTA BEKASI', '69973603', -6.322487, 107.025726, 'Jl. Bantar Gebang Setu No.KM 5, RT.003/RW.001, Cimuning, Kec. Mustika Jaya, Kota Bks, Jawa Barat 17155', 'A'),
(23, 'SMP DAYA UTAMA', '20231653', -6.295911, 107.030670, 'Jl. Mustika Jaya No.24, RT.002/RW.011, Mustika Jaya, Kec. Mustika Jaya, Kota Bks, Jawa Barat 17158', 'A'),
(24, 'SMP ISLAM ASSURYANIYAH', '69960135', -6.295911, 107.030670, 'Jl. Mustika Jaya No.24, RT.002/RW.011, Mustika Jaya, Kec. Mustika Jaya, Kota Bks, Jawa Barat 17158', 'A'),
(25, 'SMP ISLAM REJIS', '70001088', -6.287389, 107.035286, 'Jl. Perum Kodam Raya No.27, RT.001/RW.013, Mustika Jaya, Kec. Mustika Jaya, Kota Bks, Jawa Barat 17158', 'A'),
(26, 'SMP ISLAM RIYADHUS SHALIHIN', '69992183', -6.311635, 107.012321, 'Perumahan Mutiara Insani, Kel. Padurenan, Kec, Jl. Klp. Dua, RT.006/RW.008, Mustika Jaya, Bekasi Timur, Kota Bks, Jawa Barat 17156', 'A'),
(27, 'SMP ISLAM TERATAI PUTIH GLOBAL', '20222991', -6.307698, 107.034325, 'SMP Islam Teratai Putih Global Bekasi, Sma Islam Teratai Putih Global Bekasi, Jl. Kampus Teratai Putih No.1, RT.001/RW.005, Cimuning, Kec. Mustika Jaya, Kota Bks, Jawa Barat 17155', 'A'),
(28, 'SMP ISLAMIC GREEN SCHOOL', '69964660', -6.295024, 107.015305, 'Jalan Cipete Raya, Kp Jl. Babakan Bondol No.113, Mustikasari, Kec. Mustika Jaya, Kota Bks, Jawa Barat 17157', 'A'),
(29, 'SMP IT AL AZHAR JAYA INDONESIA', '69900736', -6.321975, 107.024170, 'Jl. Sirih Prada, RT.004/RW.003, Cimuning, Kec. Mustika Jaya, Kota Bks, Jawa Barat 17155', 'A'),
(30, 'SMP IT TITIAN ILMU', '69864696', -6.303505, 107.018974, 'Jl. Asem Jaya No.4, RT.001/RW.005, Mustika Jaya, Kec. Mustika Jaya, Kota Bks, Jawa Barat 17158', 'A'),
(31, 'SMP PELITA GLOBAL MANDIRI', '70026254', -6.302210, 107.039146, 'Jl. Gondang No.14, RT.001/RW.010, Mustika Jaya, Kec. Mustika Jaya, Kota Bks, Jawa Barat 17158', 'A'),
(32, 'SMP PERSADA BHAKTI', '20231692', -6.285110, 107.013664, 'Jl. Cipete Raya Blok G No.2, RT.014/RW.008, Mustikasari, Kec. Mustika Jaya, Kabupaten Bekasi, Jawa Barat 17157', 'A'),
(33, 'SMP SUMBER DAYA', '20231698', -6.295768, 107.001480, 'Jl. Babakan Mustika Sari No.53, RT.002/RW.003, Mustikasari, Kec. Mustika Jaya, Kota Bks, Jawa Barat 17157', 'A'),
(34, 'SMP TINTA EMAS INDONESIA', '20254020', -6.305068, 107.019394, 'Jl. Asem Jaya No.1, RT.003/RW.030, Mustika Jaya, Kec. Mustika Jaya, Kota Bks, Jawa Barat 16340', 'A'),
(35, 'SMPIT AL QURAN INSAN MADANI', '69988233', -6.317476, 107.005447, 'Jl. Telkom No.105, Pedurenan, Mustika Jaya, RT.003/RW.003, Padurenan, Kec. Mustika Jaya, Kota Bks, Jawa Barat 17156', 'A'),
(36, 'SMPIT ARKAN CENDEKIA', '69988635', -6.334382, 107.012352, 'Jl. Bawang Raya No.62, Cimuning, Kec. Mustika Jaya, Kota Bks, Jawa Barat 17155', 'A'),
(37, 'SMPIT BAHANA MANDIRI', '69984908', -6.312956, 107.009254, 'Jl. Klp. Dua, RT.002/RW.007, Padurenan, Kec. Mustika Jaya, Kota Bks, Jawa Barat 17156', 'A'),
(38, 'SMPS AL IHSAN LEGENDA', '20231644', -6.314540, 107.020523, 'RT.003/RW.009, Padurenan, Kec. Mustika Jaya, Kota Bks, Jawa Barat 17156', 'A'),
(39, 'SMPS BINA KREASI MANDIRI', '20271863', -6.297311, 107.024223, 'SD SMP Bina Kreasi Mandiri, Mustika Jaya, Kota Bks,, RT.004/RW.005, Mustika Jaya, Kec. Mustika Jaya, Kota Bks, Jawa Barat 17157', 'A'),
(40, 'SMP BINA NUSANTARA', '70011894', -6.325390, 106.990623, 'Binus School Bekasi, Jl. Saraswati No.1, RT.001/RW.010, Padurenan, Kec. Mustika Jaya, Kota Bks, Jawa Barat 16340', 'A');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `m_kecamatan`
--
ALTER TABLE `m_kecamatan`
  ADD PRIMARY KEY (`id_kecamatan`);

--
-- Indexes for table `pengguna`
--
ALTER TABLE `pengguna`
  ADD PRIMARY KEY (`id_pengguna`);

--
-- Indexes for table `t_hotspot`
--
ALTER TABLE `t_hotspot`
  ADD PRIMARY KEY (`id_smp`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `m_kecamatan`
--
ALTER TABLE `m_kecamatan`
  MODIFY `id_kecamatan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;

--
-- AUTO_INCREMENT for table `pengguna`
--
ALTER TABLE `pengguna`
  MODIFY `id_pengguna` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `t_hotspot`
--
ALTER TABLE `t_hotspot`
  MODIFY `id_smp` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=43;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

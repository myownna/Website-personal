-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 17, 2023 at 11:48 AM
-- Server version: 10.4.27-MariaDB
-- PHP Version: 8.2.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `februari_iklan`
--

-- --------------------------------------------------------

--
-- Table structure for table `tb_admin`
--

CREATE TABLE `tb_admin` (
  `id_admin` varchar(15) NOT NULL,
  `nama_admin` varchar(30) NOT NULL,
  `email` varchar(40) NOT NULL,
  `telepon` varchar(15) NOT NULL,
  `username` varchar(20) NOT NULL,
  `password` varchar(20) NOT NULL,
  `status` varchar(15) NOT NULL,
  `keterangan` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tb_admin`
--

INSERT INTO `tb_admin` (`id_admin`, `nama_admin`, `email`, `telepon`, `username`, `password`, `status`, `keterangan`) VALUES
('ADM01', 'Kim Minju', 'minjukim@gmail.com', '08973653432', 'a', 'a', 'Aktif', '-');

-- --------------------------------------------------------

--
-- Table structure for table `tb_gambar`
--

CREATE TABLE `tb_gambar` (
  `id_gambar` int(8) NOT NULL,
  `id_pem_iklan` varchar(15) NOT NULL,
  `gambar` varchar(100) NOT NULL,
  `catatan` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tb_gambar`
--

INSERT INTO `tb_gambar` (`id_gambar`, `id_pem_iklan`, `gambar`, `catatan`) VALUES
(1, 'PIK2305002', '1.jpg', '-'),
(2, 'PIK2305002', '2.PNG', '-'),
(3, 'PIK2305003', 'IMG_20230405_101247.jpg', ''),
(5, 'PIK2305003', 'IMG_20230405_101259.jpg', 'Swimming Pool'),
(6, 'PIK2305003', 'IMG_20230405_101327.jpg', 'Bath Room'),
(7, 'PIK2305003', 'IMG_20230405_101338.jpg', 'Bath Room'),
(8, 'PIK2305003', 'IMG_20230405_101354.jpg', ''),
(9, 'PIK2305003', 'IMG_20230405_101412.jpg', ''),
(10, 'PIK2305003', 'IMG_20230405_101426.jpg', ''),
(11, 'PIK2305003', 'IMG_20230405_103044.jpg', ''),
(12, 'PIK2305003', 'IMG_20230405_103100.jpg', 'Swimming Pool'),
(13, 'PIK2305003', 'IMG_20230405_103111.jpg', 'Front Door'),
(15, 'PIK2305003', 'IMG_20230405_103139.jpg', ''),
(16, 'PIK2305003', 'IMG_20230405_103149.jpg', 'Family Room'),
(17, 'PIK2305003', 'IMG_20230405_101229.jpg', ''),
(18, 'PIK2305004', '2.jpg', 'ok');

-- --------------------------------------------------------

--
-- Table structure for table `tb_inbox`
--

CREATE TABLE `tb_inbox` (
  `id_inbox` int(8) NOT NULL,
  `id_pelanggan` varchar(15) NOT NULL,
  `pesan` text NOT NULL,
  `tanggal` date NOT NULL,
  `jam` time NOT NULL,
  `kategori` varchar(15) NOT NULL,
  `status` varchar(15) NOT NULL,
  `keterangan` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tb_inbox`
--

INSERT INTO `tb_inbox` (`id_inbox`, `id_pelanggan`, `pesan`, `tanggal`, `jam`, `kategori`, `status`, `keterangan`) VALUES
(1, 'PLG2302001', 'halo saya mau bertanya tentang iklan saya yang berid ini, tolong di cek', '2023-05-17', '12:00:03', 'Pelanggan', 'Read', '-'),
(2, 'PLG2302001', 'nanya apaan tuh gan', '2023-05-17', '12:09:43', 'CS', 'Dikirim CS', '-'),
(3, 'PLG2302001', 'yaaa kepo', '2023-05-17', '12:10:17', 'Pelanggan', 'Read', '-'),
(4, 'PLG2302001', 'YANG BENER AJEEE', '2023-05-17', '12:13:10', 'CS', 'Dikirim CS', '-'),
(5, 'PLG2302001', 'hehehee just kidding', '2023-05-17', '12:18:16', 'Pelanggan', 'Read', '-'),
(6, 'PLG2302001', 'dasar', '2023-05-17', '15:01:54', 'CS', 'Dikirim CS', '-'),
(7, 'PLG2305001', 'thanks bos', '2023-05-17', '16:37:06', 'Pelanggan', 'Unread', '-');

-- --------------------------------------------------------

--
-- Table structure for table `tb_konfirmasi`
--

CREATE TABLE `tb_konfirmasi` (
  `id_konfirmasi` varchar(15) NOT NULL,
  `id_pem_iklan` varchar(15) NOT NULL,
  `id_pelanggan` varchar(15) NOT NULL,
  `tanggal` date NOT NULL,
  `jam` time NOT NULL,
  `pesan` text NOT NULL,
  `nominal` int(10) NOT NULL,
  `bukti_bayar` varchar(100) NOT NULL,
  `status` varchar(15) NOT NULL,
  `keterangan` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tb_konfirmasi`
--

INSERT INTO `tb_konfirmasi` (`id_konfirmasi`, `id_pem_iklan`, `id_pelanggan`, `tanggal`, `jam`, `pesan`, `nominal`, `bukti_bayar`, `status`, `keterangan`) VALUES
('KNF2303001', 'PIK2303001', '', '2023-03-16', '13:09:29', 'ok', 499990, '1.PNG', 'Valid', '-'),
('KNF2305001', 'PIK2305002', '', '2023-05-17', '15:46:09', 'ok', 110000, '1.PNG', 'Valid', '-'),
('KNF2305002', 'PIK2305004', '', '2023-05-17', '16:31:11', 'ok', 110000, '1.PNG', 'Valid', 'mantap');

-- --------------------------------------------------------

--
-- Table structure for table `tb_pelanggan`
--

CREATE TABLE `tb_pelanggan` (
  `id_pelanggan` varchar(15) NOT NULL,
  `nama_pelanggan` varchar(30) NOT NULL,
  `email` varchar(40) NOT NULL,
  `telepon` varchar(15) NOT NULL,
  `alamat` text NOT NULL,
  `username` varchar(20) NOT NULL,
  `password` varchar(20) NOT NULL,
  `status` varchar(15) NOT NULL,
  `keterangan` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tb_pelanggan`
--

INSERT INTO `tb_pelanggan` (`id_pelanggan`, `nama_pelanggan`, `email`, `telepon`, `alamat`, `username`, `password`, `status`, `keterangan`) VALUES
('PLG2302001', 'Adam', 'mephisto@gmail.com', '0877777777', 'jl.pondok randu', 'adam', 'adam', 'Aktif', '-'),
('PLG2305001', 'Rifan', 'rifan@gmail.com', '0876543222', 'bintaro', 'rifan', 'rifan', 'Aktif', '-');

-- --------------------------------------------------------

--
-- Table structure for table `tb_pemasangan_iklan`
--

CREATE TABLE `tb_pemasangan_iklan` (
  `id_pem_iklan` varchar(15) NOT NULL,
  `id_pelanggan` varchar(15) NOT NULL,
  `judul` varchar(100) NOT NULL,
  `jenis` varchar(15) NOT NULL,
  `kategori` varchar(15) NOT NULL,
  `deskripsi` text NOT NULL,
  `gambar` varchar(100) NOT NULL,
  `harga` int(10) NOT NULL,
  `lokasi` varchar(100) NOT NULL,
  `fasilitas` text NOT NULL,
  `status` varchar(15) NOT NULL,
  `tanggal` date NOT NULL,
  `jam` time NOT NULL,
  `tanggal_mulai` date NOT NULL,
  `durasi` varchar(15) NOT NULL,
  `keterangan` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tb_pemasangan_iklan`
--

INSERT INTO `tb_pemasangan_iklan` (`id_pem_iklan`, `id_pelanggan`, `judul`, `jenis`, `kategori`, `deskripsi`, `gambar`, `harga`, `lokasi`, `fasilitas`, `status`, `tanggal`, `jam`, `tanggal_mulai`, `durasi`, `keterangan`) VALUES
('PIK2305001', 'PLG2302001', 'RUMAH MEGAH 2 LANTAI DI TAMAN WIJAYA', 'Cluster', 'Dijual', 'Blok e A LT 39 dan LB\r\n\r\nSelling Point \r\n10 menit dari Town Square\r\n10 menit dari UIN Syarif Hiayatullah\r\n10 menit dari One BellPark Mall\r\n10 menit dari SMAN 66\r\n10 menit dari Kantor Lurah Pondok Labu\r\n10 menit dari SMPN 156 Wijaya\r\n', 'IMG_20230405_100315.jpg', 1026000000, 'Taman Wijaya, K', 'Luas Tanah dan Bangunan 39m\r\nKamar Tidur : 2\r\nKamar Mandi : 2\r\nRuang Tamu\r\nDapur\r\nRuang Cuci/Jemur\r\n\r\n', 'Approve', '2023-05-17', '15:30:08', '2023-05-18', '3 Bulan', ''),
('PIK2305002', 'PLG2302001', 'Jual Tanah 200 hektar', 'Kavling', 'Dijual', 'jual tanah', '1.PNG', 500000000, 'Jaksel', 'banyaaaak', 'Mulai', '2023-05-17', '15:34:52', '2023-05-31', '6 Bulan', ''),
('PIK2305003', 'PLG2302001', 'DISEWA RUMAH SIAP HUNI MODERN ', 'Cluster', 'Disewakan', '<p>Disewa Minimal 2 tahun Pertahun : 612000000.</p>\r\n<p>Hubungi : 0895-xxx-xxxx (WA).</p>', 'IMG_20230405_101229.jpg', 612000000, 'Dharmawangsa, J', '<p>Bangunan 2 Lantai.</p>\r\n<p>Luas Tanah 260m.</p>\r\n<p>Luas Bangunan 400m.</p>\r\n<p>Bangunan : 2 Lantai.</p>\r\n<p>Kamar Tidur 4+1 (ART).</p>\r\n<p>Kamar Mandi 4+1(ART).</p>\r\n<p>Swimming Pool.</p>\r\n<p>Semi Furnish.</p>\r\n<p>Garasi &amp; Carport : 2 + 2.</p>\r\n<p>Listrik : 6600 Watt.</p>', 'Mulai', '2023-05-17', '15:51:00', '2023-05-17', '6 Bulan', ''),
('PIK2305004', 'PLG2305001', 'Apartemen II', 'Ruko', 'Disewakan', '<p>ok</p>', '1.jpg', 2000000, 'Jaksel', '<p>-</p>', 'Mulai', '2023-05-17', '16:29:54', '2023-05-20', '6 Bulan', ''),
('PIK2305005', 'PLG2305001', 'The Newton 2 Tipe Studio', 'Ruko', 'Dijual', '<p>addsdad</p>', 'IMG_20230405_102434.jpg', 1100000000, 'Kebayoran Baru, Jakarta Selatan.', '<p>sadsa</p>', 'Request', '2023-05-17', '16:45:36', '2023-05-22', '12 Bulan', '');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tb_admin`
--
ALTER TABLE `tb_admin`
  ADD PRIMARY KEY (`id_admin`);

--
-- Indexes for table `tb_gambar`
--
ALTER TABLE `tb_gambar`
  ADD PRIMARY KEY (`id_gambar`);

--
-- Indexes for table `tb_inbox`
--
ALTER TABLE `tb_inbox`
  ADD PRIMARY KEY (`id_inbox`);

--
-- Indexes for table `tb_pelanggan`
--
ALTER TABLE `tb_pelanggan`
  ADD PRIMARY KEY (`id_pelanggan`);

--
-- Indexes for table `tb_pemasangan_iklan`
--
ALTER TABLE `tb_pemasangan_iklan`
  ADD PRIMARY KEY (`id_pem_iklan`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tb_gambar`
--
ALTER TABLE `tb_gambar`
  MODIFY `id_gambar` int(8) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT for table `tb_inbox`
--
ALTER TABLE `tb_inbox`
  MODIFY `id_inbox` int(8) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

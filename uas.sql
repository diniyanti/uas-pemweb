-- phpMyAdmin SQL Dump
-- version 4.8.3
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 15, 2023 at 09:06 PM
-- Server version: 10.1.37-MariaDB
-- PHP Version: 7.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `uas`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `id_admin` int(11) NOT NULL,
  `username` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`id_admin`, `username`, `password`) VALUES
(2, 'admin', '21232f297a57a5a743894a0e4a801fc3');

-- --------------------------------------------------------

--
-- Table structure for table `customer`
--

CREATE TABLE `customer` (
  `id_customer` int(50) NOT NULL,
  `nama` varchar(100) NOT NULL,
  `notelphone` varchar(20) NOT NULL,
  `alamat` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `password` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `customer`
--

INSERT INTO `customer` (`id_customer`, `nama`, `notelphone`, `alamat`, `email`, `password`) VALUES
(2, 'Rian', '5678989009', 'Jombang', 'rian@gmail.com', '92daa86ad43a42f28f4bf58e94667c95'),
(3, 'fajar', '877965', 'mjk', 'fajar@gmail.com', '202cb962ac59075b964b07152d234b70'),
(5, 'dina', '081554482631', 'Mawar', 'Dina@gmail.com', 'e274648aed611371cf5c30a30bbe1d65'),
(6, 'NurDin', '5678989009', 'Mawar', 'Din@gmail.com', '202cb962ac59075b964b07152d234b70'),
(7, 'Nur Diniyanti', '87676564554', 'Mojokerto', 'nurdin@gmail.com', '83476316a972856163fb987b861a0a2c'),
(8, 'Daniel susanto', '8767565445', 'Ngawi', 'daniel@gmail.com', 'aa47f8215c6f30a0dcdb2a36a9f4168e');

-- --------------------------------------------------------

--
-- Table structure for table `kategori`
--

CREATE TABLE `kategori` (
  `id_kategori` int(11) NOT NULL,
  `nama_kategori` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `kategori`
--

INSERT INTO `kategori` (`id_kategori`, `nama_kategori`) VALUES
(2, 'Adat/Tradisional'),
(3, 'Modern'),
(6, 'Kebaya');

-- --------------------------------------------------------

--
-- Table structure for table `produk`
--

CREATE TABLE `produk` (
  `id_produk` int(11) NOT NULL,
  `id_kategori` int(11) NOT NULL,
  `nama_produk` varchar(100) NOT NULL,
  `ukuran` enum('S','M','L','XL') NOT NULL,
  `harga` varchar(100) NOT NULL,
  `status` varchar(100) NOT NULL,
  `image` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `produk`
--

INSERT INTO `produk` (`id_produk`, `id_kategori`, `nama_produk`, `ukuran`, `harga`, `status`, `image`) VALUES
(36, 2, 'Rote (NTT)', 'XL', '100000', 'Kosong', 'NTT.jpg'),
(39, 2, 'Ulos (Sumut)', 'M', '100000', 'kosong', 'sumatra utara.jpg'),
(40, 2, 'King Tompang (Kalbar)', 'M', '100000', 'ready', 'kalimantan barat.jpg'),
(41, 2, 'Aesan Gede (Sumsel)', 'S', '100000', 'ready', 'sumsel.jpg'),
(42, 2, 'Ulee Balang (Aceh)', 'L', '100000', 'ready', 'aceh.jpg'),
(43, 2, 'Pangsi (Banten)', 'XL', '100000', 'ready', 'banten.jpeg'),
(44, 2, 'Payas Agung (Bali)', 'S', '100000', 'ready', 'bali.jpg'),
(45, 2, 'Bodo (Sulawesi Selatan)', 'L', '100000', 'ready', 'sulsel.jpg'),
(46, 2, 'Kebaya (Jawa Tengah)', 'M', '100000', 'ready', 'adat jateng.jpg'),
(47, 2, 'Pesaâ€™an (Jawa Timur)', 'L', '100000', 'ready', 'jatim.jpg'),
(48, 2, 'Sangkarut (Kalteng)', 'XL', '100000', 'ready', 'kalimantan tengah.jpg'),
(49, 2, 'Sadariah (DKI Jakarta)', 'M', '100000', 'ready', 'jabar.jpg'),
(50, 6, 'kebaya classic all white', 'L', '100000', 'ready', 'kebaya-modern-dengan-model-classic-all-white.jpg'),
(51, 6, 'Kebaya Brokat', 'M', '100000', 'ready', 'ke.jpg'),
(52, 6, 'Kebaya short sleeve', 'XL', '100000', 'ready', 'Model-kebaya-modern-simple-short-sleeve-dengan-waist-line.jpg'),
(53, 3, 'Gaun model duyung', 'L', '100000', 'ready', 'gaun2.jpg'),
(54, 3, 'gaun bunga putih', 'L', '100000', 'ready', 'banner.jpeg'),
(55, 6, 'Kebaya tulle ballon sleeve', 'XL', '100000', 'ready', 'Model-kebaya-tulle-modifikasi-ballon-sleeve-untuk-hijabers.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `sewa`
--

CREATE TABLE `sewa` (
  `id_sewa` int(11) NOT NULL,
  `id_produk` int(11) NOT NULL,
  `nama` varchar(100) NOT NULL,
  `alamat` text NOT NULL,
  `telephone` varchar(100) NOT NULL,
  `kode_sewa` varchar(100) NOT NULL,
  `ktp` varchar(100) NOT NULL,
  `tgl_sewa` date NOT NULL,
  `tgl_mulai` date NOT NULL,
  `tgl_selesai` date NOT NULL,
  `durasi` varchar(50) NOT NULL,
  `sub_total` int(11) NOT NULL,
  `status_sewa` varchar(50) NOT NULL,
  `status_pembayaran` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `sewa`
--

INSERT INTO `sewa` (`id_sewa`, `id_produk`, `nama`, `alamat`, `telephone`, `kode_sewa`, `ktp`, `tgl_sewa`, `tgl_mulai`, `tgl_selesai`, `durasi`, `sub_total`, `status_sewa`, `status_pembayaran`) VALUES
(9, 39, 'Nur Dinanita', 'mjk', '098765432123', '4mBfUsRJ', 'bb.jpg', '2023-06-09', '2023-06-11', '2023-06-13', '2', 100000, 'terkonfirmasi', 'sudah bayar'),
(10, 36, 'Nur Dinanita', 'dffggf', '87656565657', 'dFG2em64', 'Scan+KTP.jpg', '2023-06-09', '2023-06-10', '2023-06-11', '1', 50000, 'terkonfirmasi', 'sudah bayar'),
(11, 40, 'Fajar Alvian', 'mjk', '787878786', 'uG9CjGsV', 'cc.jpg', '2023-06-12', '2023-05-13', '2023-05-14', '1', 100000, 'belum terkonfirmasi', 'belum bayar'),
(12, 42, 'Nur Dinanita', 'mjk', '2345456', 'qMwIkXGp', 'bb.jpg', '2023-06-12', '2023-05-13', '2023-05-14', '1', 100000, 'belum terkonfirmasi', 'belum bayar'),
(13, 45, 'Nur Diniyanti', 'Mojokerto', '87867656676', 'FTyQw2j5', '96726031415-69122718926-20190112_142859.jpg', '2023-06-15', '2023-07-18', '2023-07-20', '2', 200000, 'terkonfirmasi', 'sudah bayar'),
(14, 43, 'Daniel susanto', 'Ngawi', '3892781', 't2LX1ZGH', 'IMG_20190507_111021.jpg', '2023-06-15', '2023-07-20', '2023-07-23', '3', 300000, 'terkonfirmasi', 'sudah bayar');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id_admin`);

--
-- Indexes for table `customer`
--
ALTER TABLE `customer`
  ADD PRIMARY KEY (`id_customer`);

--
-- Indexes for table `kategori`
--
ALTER TABLE `kategori`
  ADD PRIMARY KEY (`id_kategori`);

--
-- Indexes for table `produk`
--
ALTER TABLE `produk`
  ADD PRIMARY KEY (`id_produk`),
  ADD KEY `id_kategori` (`id_kategori`);

--
-- Indexes for table `sewa`
--
ALTER TABLE `sewa`
  ADD PRIMARY KEY (`id_sewa`),
  ADD KEY `id_produk` (`id_produk`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `id_admin` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `customer`
--
ALTER TABLE `customer`
  MODIFY `id_customer` int(50) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `kategori`
--
ALTER TABLE `kategori`
  MODIFY `id_kategori` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `produk`
--
ALTER TABLE `produk`
  MODIFY `id_produk` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=56;

--
-- AUTO_INCREMENT for table `sewa`
--
ALTER TABLE `sewa`
  MODIFY `id_sewa` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `produk`
--
ALTER TABLE `produk`
  ADD CONSTRAINT `produk_ibfk_1` FOREIGN KEY (`id_kategori`) REFERENCES `kategori` (`id_kategori`);

--
-- Constraints for table `sewa`
--
ALTER TABLE `sewa`
  ADD CONSTRAINT `sewa_ibfk_1` FOREIGN KEY (`id_produk`) REFERENCES `produk` (`id_produk`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

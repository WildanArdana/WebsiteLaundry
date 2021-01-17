-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 24, 2019 at 02:34 PM
-- Server version: 10.1.38-MariaDB
-- PHP Version: 7.3.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `penjualan`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `id` int(11) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`id`, `username`, `password`) VALUES
(2, 'candra', '$2y$10$LOE5Wk5Iei.HNGOSrAXYT.6MLj5qwR/YK4M/UH5ZJtzbKSzIw.nwy'),
(3, 'taufik', '$2y$10$TiBJsrk.SudHKbvszOoTLetKLy9I/06jW45/dfcnowwDyjLtQQA6q'),
(4, 'wildan', '$2y$10$m1fYy.8aznJpIOQbeneA2uru/iC8KJflqZ5Nx9BbZ8xar9G.O6Vm6'),
(5, 'arfian', '$2y$10$5NjCjk0ThSyhUzAAw2Y/ee9yX1ykMOFNXzdQIHEZUkt56A6SV53/C'),
(6, 'admin', '$2y$10$3gNmsXwH0bCE2AbxfaKw/.qP2w9cGzVtRIjDL5wrTiHr3v47d/K6.');

-- --------------------------------------------------------

--
-- Table structure for table `harga`
--

CREATE TABLE `harga` (
  `id` int(11) NOT NULL,
  `paket` varchar(100) NOT NULL,
  `harga` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `harga`
--

INSERT INTO `harga` (`id`, `paket`, `harga`) VALUES
(5, '5 Jam', 5000),
(6, '10 Jam', 4000),
(7, '1 Hari', 3000),
(8, '2 Hari', 2000);

-- --------------------------------------------------------

--
-- Table structure for table `komplain`
--

CREATE TABLE `komplain` (
  `id` int(11) NOT NULL,
  `nama` varchar(100) NOT NULL,
  `tanggal` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `pesan` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `komplain`
--

INSERT INTO `komplain` (`id`, `nama`, `tanggal`, `pesan`) VALUES
(6, 'candra', '2019-07-15 00:23:27', 'cepetin bray'),
(9, 'adni', '2019-07-16 20:55:52', 'ngopii ngapa '),
(10, 'fatah', '2019-07-17 22:00:30', 'tes test test'),
(11, 'candra', '2019-07-18 17:01:58', 'mantap');

-- --------------------------------------------------------

--
-- Table structure for table `konsumen`
--

CREATE TABLE `konsumen` (
  `id` int(11) NOT NULL,
  `nama` varchar(50) NOT NULL,
  `tanggal` varchar(20) NOT NULL,
  `jenis` varchar(20) NOT NULL,
  `berat` float NOT NULL,
  `status` varchar(20) NOT NULL DEFAULT 'PROSES',
  `harga` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `konsumen`
--

INSERT INTO `konsumen` (`id`, `nama`, `tanggal`, `jenis`, `berat`, `status`, `harga`) VALUES
(47, 'fatah', '21:05 16-07-2019', '2 Hari', 2.4, 'BENTAR SAYANG', 4800),
(48, 'candra', '21:13 16-07-2019', '10 Jam', 3.6, 'SELESAI', 14400);

-- --------------------------------------------------------

--
-- Table structure for table `pengumuman`
--

CREATE TABLE `pengumuman` (
  `pesan` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `pengumuman`
--

INSERT INTO `pengumuman` (`pesan`) VALUES
('Website sedang dalam proses pengembangan. mohon maaf');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `harga`
--
ALTER TABLE `harga`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `komplain`
--
ALTER TABLE `komplain`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `konsumen`
--
ALTER TABLE `konsumen`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `pengumuman`
--
ALTER TABLE `pengumuman`
  ADD PRIMARY KEY (`pesan`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `harga`
--
ALTER TABLE `harga`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `komplain`
--
ALTER TABLE `komplain`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `konsumen`
--
ALTER TABLE `konsumen`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=49;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

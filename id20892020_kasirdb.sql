-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Jun 10, 2023 at 05:30 PM
-- Server version: 10.5.20-MariaDB
-- PHP Version: 7.3.33

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `id20892020_kasirdb`
--

-- --------------------------------------------------------

--
-- Table structure for table `barang`
--

CREATE TABLE `barang` (
  `id_barang` int(11) NOT NULL,
  `nama` varchar(255) NOT NULL,
  `harga` int(11) NOT NULL,
  `jumlah` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `barang`
--

INSERT INTO `barang` (`id_barang`, `nama`, `harga`, `jumlah`) VALUES
(3500, 'Biskuat', 4500, 48),
(4200, 'Chocolatos', 2000, 47),
(6500, 'Telur', 15000, 30),
(6800, 'Wafer Tango', 2500, 100),
(7410, 'marjan', 17000, 25),
(8520, 'gelas', 7000, 31),
(9530, 'Mie Sedap', 2500, 100),
(9630, 'sabun', 3000, 8),
(9900, 'Silverqueen', 15000, 50),
(123456, 'tisu', 5000, 21),
(156153, 'pepsodent', 18000, 15),
(789654, 'molto pewangi', 22800, 13),
(45678910, 'rexsona', 14000, 10);

-- --------------------------------------------------------

--
-- Table structure for table `karyawan`
--

CREATE TABLE `karyawan` (
  `id_karyawan` int(11) NOT NULL,
  `nama` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `karyawan`
--

INSERT INTO `karyawan` (`id_karyawan`, `nama`, `email`, `password`) VALUES
(1, 'admin', 'admin@admin.com', 'admin'),
(8, 'Fachrul Ghifari', 'fachrulghifari04@gmail.com', 'ghifari');

-- --------------------------------------------------------

--
-- Table structure for table `notulen`
--

CREATE TABLE `notulen` (
  `id_nota` int(11) NOT NULL,
  `id_barang` int(11) NOT NULL,
  `nama_barang` varchar(255) NOT NULL,
  `tanggal` datetime NOT NULL,
  `jumlah` int(11) NOT NULL,
  `harga` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `notulen`
--

INSERT INTO `notulen` (`id_nota`, `id_barang`, `nama_barang`, `tanggal`, `jumlah`, `harga`) VALUES
(1, 7410, 'marjan', '2023-06-10 09:11:50', 4, 68000),
(1, 8520, 'gelas', '2023-06-10 09:11:50', 1, 7000),
(1, 9630, 'sabun', '2023-06-10 09:11:50', 2, 6000),
(2, 9630, 'sabun', '2023-06-10 08:51:05', 1, 3000),
(2, 123456, 'tisu', '2023-06-10 08:51:05', 3, 15000),
(2, 7410, 'marjan', '2023-06-10 08:51:05', 3, 51000),
(3, 9630, 'sabun', '2023-06-10 08:51:08', 1, 3000),
(3, 123456, 'tisu', '2023-06-10 08:51:08', 3, 15000),
(3, 7410, 'marjan', '2023-06-10 08:51:08', 3, 51000),
(4, 9630, 'sabun', '2023-06-10 08:52:59', 1, 3000),
(4, 123456, 'tisu', '2023-06-10 08:52:59', 3, 15000),
(4, 7410, 'marjan', '2023-06-10 08:52:59', 3, 51000),
(5, 7410, 'marjan', '2023-06-10 08:57:17', 1, 17000),
(5, 8520, 'gelas', '2023-06-10 08:57:17', 1, 7000),
(5, 9630, 'sabun', '2023-06-10 08:57:17', 1, 3000),
(6, 7410, 'marjan', '2023-06-10 09:17:04', 3, 51000),
(7, 7410, 'marjan', '2023-06-10 10:36:10', 2, 34000),
(8, 4200, 'Chocolatos', '2023-06-10 12:31:11', 3, 6000),
(8, 3500, 'Biskuat', '2023-06-10 12:31:11', 2, 9000),
(9, 7410, 'marjan', '2023-06-10 17:16:32', 2, 34000),
(10, 9630, 'sabun', '2023-06-10 17:17:39', 5, 15000),
(11, 7410, 'marjan', '2023-06-10 17:19:24', 1, 17000),
(11, 8520, 'gelas', '2023-06-10 17:19:24', 2, 14000),
(11, 9630, 'sabun', '2023-06-10 17:19:24', 2, 6000);

-- --------------------------------------------------------

--
-- Table structure for table `temp`
--

CREATE TABLE `temp` (
  `id_barang` int(11) NOT NULL,
  `nama` varchar(255) NOT NULL,
  `harga` int(11) NOT NULL,
  `jumlah` int(11) NOT NULL,
  `total` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `barang`
--
ALTER TABLE `barang`
  ADD PRIMARY KEY (`id_barang`);

--
-- Indexes for table `karyawan`
--
ALTER TABLE `karyawan`
  ADD PRIMARY KEY (`id_karyawan`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `karyawan`
--
ALTER TABLE `karyawan`
  MODIFY `id_karyawan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

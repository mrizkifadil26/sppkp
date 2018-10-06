-- phpMyAdmin SQL Dump
-- version 4.6.6
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Oct 02, 2018 at 06:43 AM
-- Server version: 5.7.17-log
-- PHP Version: 5.6.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `harga`
--

CREATE DATABASE harga;
USE harga;

-- --------------------------------------------------------

--
-- Table structure for table `harga`
--

CREATE TABLE `harga` (
  `tanggal` varchar(8) NOT NULL,
  `id_komoditi` int(11) NOT NULL,
  `harga` varchar(100) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Dumping data for table `harga`
--

INSERT INTO `harga` (`tanggal`, `id_komoditi`, `harga`) VALUES
('20180930', 1, '900'),
('20180930', 4, '2000'),
('20180930', 5, '2000'),
('20180930', 6, '1000');

-- --------------------------------------------------------

--
-- Table structure for table `komoditi`
--

CREATE TABLE `komoditi` (
  `id` int(11) NOT NULL,
  `komoditi` varchar(100) NOT NULL,
  `satuan` varchar(100) NOT NULL,
  `hapus` int(11) NOT NULL DEFAULT '0'
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Dumping data for table `komoditi`
--

INSERT INTO `komoditi` (`id`, `komoditi`, `satuan`, `hapus`) VALUES
(1, 'Beras Premium', 'kg', 0),
(3, 'sd2', 'nds2', 1),
(4, 'Gula Pasir Lokal', 'kg', 0),
(5, 'Kedelai Impor', 'kg', 0),
(6, 'Minyak Goreng Kemasan', 'liter', 0);

-- --------------------------------------------------------

--
-- Table structure for table `pengguna`
--

CREATE TABLE `pengguna` (
  `id` varchar(100) NOT NULL,
  `pass` varchar(32) NOT NULL,
  `role` varchar(100) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Dumping data for table `pengguna`
--

INSERT INTO `pengguna` (`id`, `pass`, `role`) VALUES
('operator', '123', 'operator'),
('admin', '123', 'admin'),
('surveyor', '123', 'surveyor');

-- --------------------------------------------------------

--
-- Table structure for table `survey`
--

CREATE TABLE `survey` (
  `tanggal` varchar(8) NOT NULL,
  `id_komoditi` int(11) NOT NULL,
  `surveyor` varchar(100) NOT NULL,
  `timestamp` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `harga` varchar(100) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Dumping data for table `survey`
--

INSERT INTO `survey` (`tanggal`, `id_komoditi`, `surveyor`, `timestamp`, `harga`) VALUES
('20180930', 1, 'surveyor', '2018-09-30 12:17:05', '2000'),
('20180930', 4, 'surveyor', '2018-09-30 12:17:05', '1000'),
('20180930', 5, 'surveyor', '2018-09-30 12:17:05', '500'),
('20180930', 6, 'surveyor', '2018-09-30 12:17:05', '3000'),
('20180930', 1, 'surveyor2', '2018-09-30 12:39:51', '900'),
('20180930', 4, 'surveyor2', '2018-09-30 12:39:51', '2000'),
('20180930', 5, 'surveyor2', '2018-09-30 12:39:51', '2000'),
('20180930', 6, 'surveyor2', '2018-09-30 14:41:42', '1000');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `harga`
--
ALTER TABLE `harga`
  ADD PRIMARY KEY (`tanggal`,`id_komoditi`);

--
-- Indexes for table `komoditi`
--
ALTER TABLE `komoditi`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `pengguna`
--
ALTER TABLE `pengguna`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `survey`
--
ALTER TABLE `survey`
  ADD PRIMARY KEY (`tanggal`,`id_komoditi`,`surveyor`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `komoditi`
--
ALTER TABLE `komoditi`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

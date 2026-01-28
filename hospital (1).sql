-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 23, 2025 at 05:28 AM
-- Server version: 10.4.22-MariaDB
-- PHP Version: 8.1.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `hospital`
--

-- --------------------------------------------------------

--
-- Table structure for table `gurubertugas`
--

CREATE TABLE `gurubertugas` (
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `gurubertugas`
--

INSERT INTO `gurubertugas` (`username`, `password`) VALUES
('Guru Bertugas', 'kvgerik');

-- --------------------------------------------------------

--
-- Table structure for table `images`
--

CREATE TABLE `images` (
  `id` int(11) NOT NULL,
  `img_name` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `jadual`
--

CREATE TABLE `jadual` (
  `id` int(11) NOT NULL,
  `image` varchar(200) DEFAULT NULL,
  `text` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `janjitemu`
--

CREATE TABLE `janjitemu` (
  `nama` text NOT NULL,
  `nokp` char(12) NOT NULL,
  `program` varchar(255) NOT NULL,
  `tahun` varchar(255) NOT NULL,
  `id_janjitemu` int(10) NOT NULL,
  `waktu` varchar(255) NOT NULL,
  `tarikh` date NOT NULL,
  `notel` varchar(12) DEFAULT NULL,
  `notelpen` varchar(12) DEFAULT NULL,
  `alamat` varchar(255) DEFAULT NULL,
  `jantina` varchar(50) DEFAULT NULL,
  `sebab` varchar(255) DEFAULT NULL,
  `status` varchar(100) DEFAULT 'dalam proses'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `janjitemu`
--

INSERT INTO `janjitemu` (`nama`, `nokp`, `program`, `tahun`, `id_janjitemu`, `waktu`, `tarikh`, `notel`, `notelpen`, `alamat`, `jantina`, `sebab`, `status`) VALUES
('NUR BATRISYA DAMIA BINTI ROZAIDI', '071030140142', 'KPD', 'Tahun 2 SVM', 46, '9.00 A.M', '2025-04-24', '013-6376044', '011-62639139', 'Residensi MH Platinum 2 , Setapak Kuala Lumpur ', 'perempuan', 'sakit jiwa', 'Sah');

-- --------------------------------------------------------

--
-- Table structure for table `loginadmin`
--

CREATE TABLE `loginadmin` (
  `id` int(11) NOT NULL,
  `username` varchar(255) DEFAULT NULL,
  `password` varchar(255) DEFAULT NULL,
  `image` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `mc`
--

CREATE TABLE `mc` (
  `id` int(11) NOT NULL,
  `pdf` varchar(100) DEFAULT NULL,
  `jenis` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `mc`
--

INSERT INTO `mc` (`id`, `pdf`, `jenis`) VALUES
(5, '3033-SURAT LAMBAT DAFTAR.pdf', 'MC');

-- --------------------------------------------------------

--
-- Table structure for table `user_form`
--

CREATE TABLE `user_form` (
  `id_pelajar` int(11) NOT NULL,
  `password` varchar(255) NOT NULL,
  `nokp` char(15) NOT NULL,
  `nama` varchar(255) NOT NULL,
  `image` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `user_form`
--

INSERT INTO `user_form` (`id_pelajar`, `password`, `nokp`, `nama`, `image`) VALUES
(15, '25d55ad283aa400af464c76d713c07ad', '071030140142', 'damia', 'WhatsApp Image 2025-04-17 at 22.18.52_b7f58ed6.jpg');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `gurubertugas`
--
ALTER TABLE `gurubertugas`
  ADD PRIMARY KEY (`password`);

--
-- Indexes for table `images`
--
ALTER TABLE `images`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `jadual`
--
ALTER TABLE `jadual`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `janjitemu`
--
ALTER TABLE `janjitemu`
  ADD PRIMARY KEY (`id_janjitemu`);

--
-- Indexes for table `loginadmin`
--
ALTER TABLE `loginadmin`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `mc`
--
ALTER TABLE `mc`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user_form`
--
ALTER TABLE `user_form`
  ADD PRIMARY KEY (`id_pelajar`),
  ADD UNIQUE KEY `nokp` (`nokp`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `images`
--
ALTER TABLE `images`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `jadual`
--
ALTER TABLE `jadual`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `janjitemu`
--
ALTER TABLE `janjitemu`
  MODIFY `id_janjitemu` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=47;

--
-- AUTO_INCREMENT for table `loginadmin`
--
ALTER TABLE `loginadmin`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `mc`
--
ALTER TABLE `mc`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `user_form`
--
ALTER TABLE `user_form`
  MODIFY `id_pelajar` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

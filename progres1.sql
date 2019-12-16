-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 17, 2019 at 02:11 PM
-- Server version: 10.1.38-MariaDB
-- PHP Version: 7.3.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `progres1`
--
CREATE DATABASE IF NOT EXISTS `progres1` DEFAULT CHARACTER SET latin1 COLLATE latin1_swedish_ci;
USE `progres1`;

-- --------------------------------------------------------

--
-- Table structure for table `buruh`
--

CREATE TABLE `buruh` (
  `id` int(11) NOT NULL,
  `nik` int(50) NOT NULL,
  `nama` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `buruh`
--

INSERT INTO `buruh` (`id`, `nik`, `nama`) VALUES
(2, 12321412, 'zainul');

-- --------------------------------------------------------

--
-- Table structure for table `manager`
--

CREATE TABLE `manager` (
  `id_manager` int(11) NOT NULL,
  `nik` int(50) NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `jk` varchar(11) NOT NULL,
  `agama` varchar(11) NOT NULL,
  `tgl_lahir` date NOT NULL,
  `role` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `manager`
--

INSERT INTO `manager` (`id_manager`, `nik`, `name`, `email`, `jk`, `agama`, `tgl_lahir`, `role`) VALUES
(1, 1231908687, 'Muhamad Zainul Mustofa', 'zn@gmail.com', 'laki-laki', 'islam', '1999-11-06', 'manager');

-- --------------------------------------------------------

--
-- Table structure for table `pegawai`
--

CREATE TABLE `pegawai` (
  `id_pegawai` int(11) NOT NULL,
  `nik` int(50) NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `jk` varchar(11) NOT NULL,
  `agama` varchar(11) NOT NULL,
  `tgl_lahir` date NOT NULL,
  `role` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `pegawai`
--

INSERT INTO `pegawai` (`id_pegawai`, `nik`, `name`, `email`, `jk`, `agama`, `tgl_lahir`, `role`) VALUES
(4, 12341, 'zainul mustofa', 'zn@gm.c', 'Laki-laki', 'islam', '1999-05-06', 'pegawai');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id` int(5) NOT NULL,
  `name` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL,
  `role_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `name`, `email`, `password`, `role_id`) VALUES
(1, 'fira', 'difaayusafira@gmail.com', '$2y$10$y7DKGcP..BvuxZGdL4IYweYxBKD.w7rDnLs85zgtuHTVTCG5Yf13e', 2),
(2, 'holaw', 'holawsavayona@gmail.com', '$2y$10$mEZ08E1htLKyyFCsORvdNeQmIwp.PoD4U/z4GdzZrIAIP1lzlqwqu', 2),
(3, 'anggit', 'anggit@gmail.com', '$2y$10$dgV8QUBnQQY761hSGDh/7OWVEUZ4Spo6fvZ4bqySFu4JTNow6QPKu', 2),
(10, 'zain', 'zn@gm.c', '$2y$10$3bIBOzkwEEZKtOnL.DBcAuJJHgZ.6dfj4kn1PduOgud0Wpbp.oyve', 1),
(11, 'zainul', 'zn@gm.com', '$2y$10$/nf/UxQ.n1ZrVzrv9BLpPupYLoTewwb1DavAfCGoiiXSn/pNhN6KS', 3);

-- --------------------------------------------------------

--
-- Table structure for table `user_role`
--

CREATE TABLE `user_role` (
  `id` int(11) NOT NULL,
  `role` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user_role`
--

INSERT INTO `user_role` (`id`, `role`) VALUES
(1, 'admin'),
(2, 'manager'),
(3, 'pegawai');

CREATE TABLE "AGAMA"(
  `id` int(11) NOT NULL AUTO_INCREMENT PRIMARY Key,
  'nama_agama' varchar(50) not null
);

INSERT INTO `Agama` (`nama_agama`) VALUES
('Islam'),
('Kristen'),
('Buddha'),
('Hindhu'),
('Kong Hu Chu');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `buruh`
--
ALTER TABLE `buruh`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `manager`
--
ALTER TABLE `manager`
  ADD PRIMARY KEY (`id_manager`);

--
-- Indexes for table `pegawai`
--
ALTER TABLE `pegawai`
  ADD PRIMARY KEY (`id_pegawai`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user_role`
--
ALTER TABLE `user_role`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `buruh`
--
ALTER TABLE `buruh`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `manager`
--
ALTER TABLE `manager`
  MODIFY `id_manager` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `pegawai`
--
ALTER TABLE `pegawai`
  MODIFY `id_pegawai` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `user_role`
--
ALTER TABLE `user_role`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 17, 2024 at 10:16 AM
-- Server version: 10.4.22-MariaDB
-- PHP Version: 7.4.27

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_blood`
--

-- --------------------------------------------------------

--
-- Table structure for table `tbldonation`
--

CREATE TABLE `tbldonation` (
  `donation_id` int(11) NOT NULL,
  `name` varchar(250) NOT NULL,
  `email` varchar(50) NOT NULL,
  `phone` bigint(10) NOT NULL,
  `blood_group` varchar(3) NOT NULL,
  `city` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbldonation`
--

INSERT INTO `tbldonation` (`donation_id`, `name`, `email`, `phone`, `blood_group`, `city`) VALUES
(1, 'Kenil Kanani', 'kenil.kanani@gmail.com', 9157465330, 'B+', 'Surat');

-- --------------------------------------------------------

--
-- Table structure for table `tblevent`
--

CREATE TABLE `tblevent` (
  `event_id` int(11) NOT NULL,
  `title` varchar(250) NOT NULL,
  `date` date NOT NULL,
  `location` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tblevent`
--

INSERT INTO `tblevent` (`event_id`, `title`, `date`, `location`) VALUES
(1, 'Blood Donation Awareness Camp', '2024-04-16', 'Vadodara'),
(3, 'Blood Donation Camp', '2024-04-15', 'Surat'),
(4, 'Expert talk on blood donation', '2024-04-20', 'Rajkot'),
(5, 'Blood Donation : Mega Drive', '2024-04-21', 'Mumbai');

-- --------------------------------------------------------

--
-- Table structure for table `tblregistration`
--

CREATE TABLE `tblregistration` (
  `id` int(11) NOT NULL,
  `full_name` varchar(250) NOT NULL,
  `email` varchar(50) NOT NULL,
  `password` varchar(20) NOT NULL,
  `blood_group` varchar(3) NOT NULL,
  `role` varchar(10) NOT NULL DEFAULT 'user'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tblregistration`
--

INSERT INTO `tblregistration` (`id`, `full_name`, `email`, `password`, `blood_group`, `role`) VALUES
(1, 'Admin', 'admin.bds@gmail.com', 'Admin@BDS', 'A+', 'admin'),
(2, 'Kenil', 'kenil.kanani@gmail.com', 'Kenil@BDS', 'B+', 'user'),
(3, 'Ved', 'ved.kanani@gmail.com', 'Ved@123', 'O+', 'user'),
(5, 'Dhyan', 'dhyan@gmail.com', 'Dhyan@123', 'A-', 'user');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tbldonation`
--
ALTER TABLE `tbldonation`
  ADD PRIMARY KEY (`donation_id`);

--
-- Indexes for table `tblevent`
--
ALTER TABLE `tblevent`
  ADD PRIMARY KEY (`event_id`);

--
-- Indexes for table `tblregistration`
--
ALTER TABLE `tblregistration`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tbldonation`
--
ALTER TABLE `tbldonation`
  MODIFY `donation_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `tblevent`
--
ALTER TABLE `tblevent`
  MODIFY `event_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `tblregistration`
--
ALTER TABLE `tblregistration`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

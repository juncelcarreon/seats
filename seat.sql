-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 13, 2023 at 01:51 AM
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
-- Database: `seat`
--

-- --------------------------------------------------------

--
-- Table structure for table `tbl_rooms`
--

CREATE TABLE `tbl_rooms` (
  `idx` int(4) UNSIGNED NOT NULL,
  `room_name` char(128) NOT NULL,
  `status` enum('ACTIVE','INACTIVE') NOT NULL DEFAULT 'ACTIVE',
  `reg_date` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tbl_rooms`
--

INSERT INTO `tbl_rooms` (`idx`, `room_name`, `status`, `reg_date`) VALUES
(1, 'HR', 'ACTIVE', '2023-05-12 21:19:06');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_seats`
--

CREATE TABLE `tbl_seats` (
  `idx` int(4) UNSIGNED NOT NULL,
  `room_idx` int(4) UNSIGNED NOT NULL,
  `seat_name` char(128) NOT NULL,
  `style` text NOT NULL,
  `status` enum('ACTIVE','INACTIVE') NOT NULL DEFAULT 'ACTIVE',
  `reg_date` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tbl_seats`
--

INSERT INTO `tbl_seats` (`idx`, `room_idx`, `seat_name`, `style`, `status`, `reg_date`) VALUES
(1, 1, 'R401', 'left: 692px; top: 34px; transform: rotate(90deg);', 'ACTIVE', '2023-05-12 23:10:14'),
(2, 1, 'R402', 'left: 0; top: 0;', 'ACTIVE', '2023-05-12 23:11:02');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_seats_info`
--

CREATE TABLE `tbl_seats_info` (
  `idx` int(4) UNSIGNED NOT NULL,
  `seat_idx` int(4) UNSIGNED NOT NULL,
  `employee_idx` int(4) NOT NULL,
  `time_in` datetime NOT NULL,
  `time_out` datetime NOT NULL,
  `reg_date` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tbl_rooms`
--
ALTER TABLE `tbl_rooms`
  ADD PRIMARY KEY (`idx`),
  ADD KEY `key_rooms` (`status`);

--
-- Indexes for table `tbl_seats`
--
ALTER TABLE `tbl_seats`
  ADD PRIMARY KEY (`idx`),
  ADD KEY `key_seats` (`room_idx`,`status`);

--
-- Indexes for table `tbl_seats_info`
--
ALTER TABLE `tbl_seats_info`
  ADD PRIMARY KEY (`idx`),
  ADD KEY `key_seats_info` (`seat_idx`,`employee_idx`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tbl_rooms`
--
ALTER TABLE `tbl_rooms`
  MODIFY `idx` int(4) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `tbl_seats`
--
ALTER TABLE `tbl_seats`
  MODIFY `idx` int(4) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `tbl_seats_info`
--
ALTER TABLE `tbl_seats_info`
  MODIFY `idx` int(4) UNSIGNED NOT NULL AUTO_INCREMENT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

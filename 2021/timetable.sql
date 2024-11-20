-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 20, 2024 at 04:23 PM
-- Server version: 10.4.28-MariaDB
-- PHP Version: 8.0.28

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `timetable`
--

-- --------------------------------------------------------

--
-- Table structure for table `calender`
--

CREATE TABLE `calender` (
  `id` int(3) NOT NULL,
  `week` varchar(20) NOT NULL,
  `time` float(4,2) NOT NULL,
  `course` varchar(20) NOT NULL,
  `lecture` varchar(10) NOT NULL,
  `venue` varchar(10) NOT NULL,
  `level` varchar(3) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `calender`
--

INSERT INTO `calender` (`id`, `week`, `time`, `course`, `lecture`, `venue`, `level`) VALUES
(1, 'Monday', 9.00, 'CSC302S25', 'MS', 'CLS3', '1S'),
(2, 'Tuesday', 10.00, 'CSC202S2', 'DD', 'CSL1', '2S'),
(3, 'Thursday', 12.00, 'CSC302S2', 'ML', 'CLS2', '3S'),
(5, 'Wednesday', 13.00, 'CSC402S2', 'MS', 'SSL2', '4S'),
(6, 'Friday', 16.00, 'CSC308S2', 'NR', 'CLS3', '3S'),
(10, 'Monday', 8.00, 'CSC208S2 ', 'MS', 'CLS3', '2S'),
(11, 'Saturday', 8.00, 'CSC208S2', 'MS', 'CLS3', '2S'),
(13, 'Thursday', 16.00, 'CSC211S2', 'NR', 'CLS2', '2S'),
(14, 'Wednesday', 9.00, 'CSC311S2', 'NR', 'SSH1', '3S'),
(15, 'Thursday', 10.00, 'CSC322S2', 'MS', 'CLS2', '3S'),
(16, 'Monday', 13.00, 'CSC322S2', 'KS', 'CLS2', '2S'),
(17, 'Monday', 15.00, 'CSC302S2', 'MS', 'CLS2', '3S'),
(18, 'Tuesday', 13.00, 'CSC402S2', 'NR', 'CLS2', '4S');

-- --------------------------------------------------------

--
-- Table structure for table `changes`
--

CREATE TABLE `changes` (
  `id` int(3) NOT NULL,
  `action` varchar(30) NOT NULL,
  `user` varchar(20) NOT NULL,
  `details` varchar(255) NOT NULL,
  `date` varchar(30) NOT NULL,
  `time` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `changes`
--

INSERT INTO `changes` (`id`, `action`, `user`, `details`, `date`, `time`) VALUES
(1, 'added', 'user', '', '2024/11/20', '11:10:04am'),
(2, 'added', 'user', 'change is made', '2024/11/20', '11:13:10am'),
(3, 'added', 'user', 'change is made', '2024/11/20', '12:04:24am'),
(4, 'added', 'user', 'change is made', '2024/11/20', '12:06:19am'),
(5, 'added', 'user', 'change is made', '2024/11/20', '12:21:00am'),
(6, 'new value added', 'admin1', 'change is made', '2024/11/20', '12:59:24am'),
(7, 'new value added', 'admin1', 'change is made', '2024/11/20', '01:00:36pm'),
(8, ' value deleted', 'admin1', 'delete is made', '2024/11/20', '01:30:10pm'),
(9, 'value updated', 'admin1', 'update is made', '2024/11/20', '01:30:40pm'),
(10, 'value updated', 'admin1', 'update is made', '2024/11/20', '01:30:48pm'),
(11, 'value updated', 'admin1', 'update is made', '2024/11/20', '01:35:46pm'),
(12, ' value deleted', 'admin1', 'delete is made', '2024/11/20', '01:36:16pm'),
(13, ' value deleted', 'admin1', 'delete is made', '2024/11/20', '01:36:43pm'),
(14, 'value updated', 'admin1', 'update is made', '2024/11/20', '01:37:04pm'),
(15, ' value deleted', 'admin1', 'delete is made', '2024/11/20', '01:38:32pm'),
(16, ' value deleted', 'admin1', 'delete is made', '2024/11/20', '01:39:02pm'),
(17, 'value updated', 'admin1', 'update is made', '2024/11/20', '01:39:10pm'),
(18, 'new value added', 'admin1', 'change is made', '2024/11/20', '04:07:04pm'),
(19, 'new value added', 'admin1', 'change is made', '2024/11/20', '04:08:45pm'),
(20, 'new value added', 'admin1', 'change is made', '2024/11/20', '08:40:46pm'),
(21, 'new value added', 'admin1', 'change is made', '2024/11/20', '20:51:01pm');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `name` varchar(30) NOT NULL,
  `password` varchar(255) NOT NULL,
  `status` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`name`, `password`, `status`) VALUES
('admin1', '$2y$10$vzaXbMrKTPSwZ3BVq.Z/Futzv79sFLdm3MBjVluxUPuPOPdLfSfeC', 1);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `calender`
--
ALTER TABLE `calender`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `changes`
--
ALTER TABLE `changes`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`name`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `calender`
--
ALTER TABLE `calender`
  MODIFY `id` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT for table `changes`
--
ALTER TABLE `changes`
  MODIFY `id` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

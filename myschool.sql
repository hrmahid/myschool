-- phpMyAdmin SQL Dump
-- version 4.8.3
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 06, 2019 at 07:00 AM
-- Server version: 10.1.35-MariaDB
-- PHP Version: 7.2.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `myschool`
--

-- --------------------------------------------------------

--
-- Table structure for table `admins`
--

CREATE TABLE `admins` (
  `admin_id` int(11) NOT NULL,
  `admin_name` varchar(255) NOT NULL,
  `admin_email` varchar(255) NOT NULL,
  `admin_phone` varchar(255) NOT NULL,
  `admin_password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `admins`
--

INSERT INTO `admins` (`admin_id`, `admin_name`, `admin_email`, `admin_phone`, `admin_password`) VALUES
(1, 'Admin', 'admin@gmail.com', '01845635308', '7110eda4d09e062aa5e4a390b0a572ac0d2c0220');

-- --------------------------------------------------------

--
-- Table structure for table `routines`
--

CREATE TABLE `routines` (
  `routine_id` int(11) NOT NULL,
  `routine_title` varchar(255) NOT NULL,
  `class_id` int(255) NOT NULL,
  `routine_path` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `routines`
--

INSERT INTO `routines` (`routine_id`, `routine_title`, `class_id`, `routine_path`) VALUES
(1, 'Routine Of Class One', 1, 'routine/2874.pdf');

-- --------------------------------------------------------

--
-- Table structure for table `students`
--

CREATE TABLE `students` (
  `student_id` int(11) NOT NULL,
  `std_name` varchar(255) NOT NULL,
  `f_name` varchar(255) NOT NULL,
  `m_name` varchar(255) NOT NULL,
  `dob` varchar(255) NOT NULL,
  `address` varchar(255) NOT NULL,
  `phone` varchar(225) NOT NULL,
  `class_id` int(2) NOT NULL,
  `std_roll` int(6) NOT NULL,
  `admission_date` varchar(225) NOT NULL,
  `student_photo` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `students`
--

INSERT INTO `students` (`student_id`, `std_name`, `f_name`, `m_name`, `dob`, `address`, `phone`, `class_id`, `std_roll`, `admission_date`, `student_photo`) VALUES
(1, 'Ali Hossain', 'Rajib Mia', 'Rumana Begum', 'Gashitula', '2001-06-06', '01623405027', 1, 20191, '30/10/19', 'img/students/pubg-player-unknown-battlegrounds-artwork-uhd-4k-wallpaper.jpg'),
(2, 'Roni Ahmed', 'Ziaul Islam', 'Amena Begum', 'Sabuj Sena, Block-A, House No-79, Gashitula', '2014-06-12', '01786252789', 1, 2020, '30/10/19', 'img/students/profile.jpg'),
(3, 'Roni Ahmed', 'Ziaul Islam', 'Amena Begum', 'Sabuj Sena, Block-A, House No-79, Gashitula', '2014-06-12', '01786252789', 1, 2021, '30/10/19', 'img/students/profile.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `s_class`
--

CREATE TABLE `s_class` (
  `class_id` int(11) NOT NULL,
  `class_name` varchar(222) NOT NULL,
  `active_status` int(1) NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `s_class`
--

INSERT INTO `s_class` (`class_id`, `class_name`, `active_status`) VALUES
(1, 'ONE', 1),
(2, 'TWO', 1),
(3, 'THREE', 1),
(4, 'FOUR', 1),
(5, 'FIVE', 1),
(6, 'SIX', 1);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admins`
--
ALTER TABLE `admins`
  ADD PRIMARY KEY (`admin_id`);

--
-- Indexes for table `routines`
--
ALTER TABLE `routines`
  ADD PRIMARY KEY (`routine_id`);

--
-- Indexes for table `students`
--
ALTER TABLE `students`
  ADD PRIMARY KEY (`student_id`);

--
-- Indexes for table `s_class`
--
ALTER TABLE `s_class`
  ADD PRIMARY KEY (`class_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admins`
--
ALTER TABLE `admins`
  MODIFY `admin_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `routines`
--
ALTER TABLE `routines`
  MODIFY `routine_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `students`
--
ALTER TABLE `students`
  MODIFY `student_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `s_class`
--
ALTER TABLE `s_class`
  MODIFY `class_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

-- phpMyAdmin SQL Dump
-- version 4.8.3
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 04, 2019 at 06:07 AM
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
CREATE DATABASE IF NOT EXISTS `myschool` DEFAULT CHARACTER SET latin1 COLLATE latin1_swedish_ci;
USE `myschool`;

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
-- Table structure for table `main_results`
--

CREATE TABLE `main_results` (
  `result_id` int(11) NOT NULL,
  `student_id` int(255) NOT NULL,
  `class_id` int(2) NOT NULL,
  `rollno` int(15) NOT NULL,
  `pub_date` varchar(255) NOT NULL,
  `pub_year` int(255) NOT NULL,
  `gpa` varchar(225) NOT NULL,
  `total_grade` varchar(225) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `main_results`
--

INSERT INTO `main_results` (`result_id`, `student_id`, `class_id`, `rollno`, `pub_date`, `pub_year`, `gpa`, `total_grade`) VALUES
(1, 1, 1, 2019, '18/11/2019', 2019, '3.67', 'A-'),
(2, 2, 1, 2020, '18/11/2019', 2019, '3.00', 'A-');

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
(1, 'Routine Of Class One', 1, 'routine/2874.pdf'),
(2, 'Routine Of Class Two', 2, 'routine/à¦¡à¦¿à¦ªà§à¦²à§‹à¦®à¦¾ à¦‡à¦¨ à¦‡à¦žà§à¦œà¦¿à¦¨à¦¿à§Ÿà¦¾à¦°à¦¿à¦‚ à¦¶à¦¿à¦•à§à¦·à¦¾à¦•à§à¦°à¦®à§‡à¦° à¦ªà¦°à§€à¦•à§à¦·à¦¾à¦° à¦«à¦°à¦® à¦ªà§‚à¦°à¦£à§‡à¦° à¦¸à¦‚à¦¶à§‹à¦§à¦¨à§€ à¦¬à¦¿à¦œà§à¦žà¦ªà§à¦¤à¦¿.htm');

-- --------------------------------------------------------

--
-- Table structure for table `single_notices`
--

CREATE TABLE `single_notices` (
  `notice_id` int(11) NOT NULL,
  `title` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `single_notices`
--

INSERT INTO `single_notices` (`notice_id`, `title`) VALUES
(1, 'Today Is School Closed'),
(3, 'klk school bondo gulap fuler gondo'),
(4, 'Today Is Last Class');

-- --------------------------------------------------------

--
-- Table structure for table `sliders`
--

CREATE TABLE `sliders` (
  `slider_id` int(11) NOT NULL,
  `slider_path` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `sliders`
--

INSERT INTO `sliders` (`slider_id`, `slider_path`) VALUES
(1, 'img/slider_img/screencapture-127-0-0-1-inventory-pos-2019-07-01-23_44_08.png'),
(2, 'img/slider_img/screencapture-file-D-HTMLWORK-Admin-Dashboard-With-Bootstrap-index-html-2019-07-01-23_55_54.png'),
(3, 'img/slider_img/screencapture-file-D-HTMLWORK-Button-Designs-buttons-html-2019-07-01-23_55_27.png');

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
(1, 'Ali Hossain', 'Rajib Mia', 'Rumana Begum', 'Gashitula', '2001-06-06', '01623405027', 1, 2019, '30/10/19', 'img/students/pubg-player-unknown-battlegrounds-artwork-uhd-4k-wallpaper.jpg'),
(2, 'Roni Ahmed', 'Ziaul Islam', 'Amena Begum', 'Sabuj Sena, Block-A, House No-79, Gashitula', '2014-06-12', '01786252789', 1, 2020, '30/10/19', 'img/students/profile.jpg'),
(3, 'Roni Ahmed', 'Ziaul Islam', 'Amena Begum', 'Sabuj Sena, Block-A, House No-79, Gashitula', '2014-06-12', '01786252789', 1, 2021, '30/10/19', 'img/students/profile.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `subject_results`
--

CREATE TABLE `subject_results` (
  `swres_id` int(11) NOT NULL,
  `result_id` int(255) NOT NULL,
  `subject_name` varchar(255) NOT NULL,
  `subject_grade` varchar(255) NOT NULL,
  `subject_gpa` varchar(222) NOT NULL,
  `subject_marks` float NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `subject_results`
--

INSERT INTO `subject_results` (`swres_id`, `result_id`, `subject_name`, `subject_grade`, `subject_gpa`, `subject_marks`) VALUES
(1, 1, 'Bangla', 'A+', '5.00', 80),
(2, 1, 'English', 'A', '4.55', 70),
(3, 1, 'Math', 'C', '2.00', 40),
(4, 2, 'Bangla', 'C', '2.00', 55),
(5, 2, 'English', 'B', '3.00', 66),
(6, 2, 'Math', 'A', '4.00', 78);

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
(6, 'SIX', 1),
(7, 'Seven', 1);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admins`
--
ALTER TABLE `admins`
  ADD PRIMARY KEY (`admin_id`);

--
-- Indexes for table `main_results`
--
ALTER TABLE `main_results`
  ADD PRIMARY KEY (`result_id`);

--
-- Indexes for table `routines`
--
ALTER TABLE `routines`
  ADD PRIMARY KEY (`routine_id`);

--
-- Indexes for table `single_notices`
--
ALTER TABLE `single_notices`
  ADD PRIMARY KEY (`notice_id`);

--
-- Indexes for table `sliders`
--
ALTER TABLE `sliders`
  ADD PRIMARY KEY (`slider_id`);

--
-- Indexes for table `students`
--
ALTER TABLE `students`
  ADD PRIMARY KEY (`student_id`);

--
-- Indexes for table `subject_results`
--
ALTER TABLE `subject_results`
  ADD PRIMARY KEY (`swres_id`);

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
-- AUTO_INCREMENT for table `main_results`
--
ALTER TABLE `main_results`
  MODIFY `result_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `routines`
--
ALTER TABLE `routines`
  MODIFY `routine_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `single_notices`
--
ALTER TABLE `single_notices`
  MODIFY `notice_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `sliders`
--
ALTER TABLE `sliders`
  MODIFY `slider_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `students`
--
ALTER TABLE `students`
  MODIFY `student_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `subject_results`
--
ALTER TABLE `subject_results`
  MODIFY `swres_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `s_class`
--
ALTER TABLE `s_class`
  MODIFY `class_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

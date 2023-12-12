-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 12, 2023 at 09:17 AM
-- Server version: 10.4.25-MariaDB
-- PHP Version: 8.1.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `student-grade`
--

-- --------------------------------------------------------

--
-- Table structure for table `grade_average`
--

CREATE TABLE `grade_average` (
  `grade_id` int(10) NOT NULL,
  `lessonName` text NOT NULL,
  `exam1` int(4) NOT NULL,
  `exam2` int(10) NOT NULL,
  `exam3` int(10) NOT NULL,
  `average` float NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `grade_average`
--

INSERT INTO `grade_average` (`grade_id`, `lessonName`, `exam1`, `exam2`, `exam3`, `average`) VALUES
(0, 'Matematik', 100, 1556, 100, 0),
(143, 'turkce', 0, 0, 0, 27.6667),
(144, 'TT', 100, 15, 100, 100),
(145, 'oo', 3534, 49545, 3445, 39.3333),
(146, 'Deneme', 39, 546, 65, 216.667),
(147, 'Fen Bilgisi', 35, 42, 104, 60.3333);

-- --------------------------------------------------------

--
-- Table structure for table `lessons`
--

CREATE TABLE `lessons` (
  `lessons_id` int(10) NOT NULL,
  `lesson_name` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `lessons`
--

INSERT INTO `lessons` (`lessons_id`, `lesson_name`) VALUES
(34, 'Turkce'),
(35, 'Matematik');

-- --------------------------------------------------------

--
-- Table structure for table `student-info`
--

CREATE TABLE `student-info` (
  `student_id` int(10) NOT NULL,
  `user_name` text NOT NULL,
  `city` text NOT NULL,
  `birthday` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `student-info`
--

INSERT INTO `student-info` (`student_id`, `user_name`, `city`, `birthday`) VALUES
(348439324, 'Deniz D.', 'Denizli', '1111-11-11');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `grade_average`
--
ALTER TABLE `grade_average`
  ADD PRIMARY KEY (`grade_id`);

--
-- Indexes for table `lessons`
--
ALTER TABLE `lessons`
  ADD PRIMARY KEY (`lessons_id`);

--
-- Indexes for table `student-info`
--
ALTER TABLE `student-info`
  ADD PRIMARY KEY (`student_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `grade_average`
--
ALTER TABLE `grade_average`
  MODIFY `grade_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=148;

--
-- AUTO_INCREMENT for table `lessons`
--
ALTER TABLE `lessons`
  MODIFY `lessons_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=36;

--
-- AUTO_INCREMENT for table `student-info`
--
ALTER TABLE `student-info`
  MODIFY `student_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=348439325;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

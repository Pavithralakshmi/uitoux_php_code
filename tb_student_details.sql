-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Oct 01, 2021 at 09:22 AM
-- Server version: 10.4.20-MariaDB
-- PHP Version: 8.0.8

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `tb_student_details`
--

-- --------------------------------------------------------

--
-- Table structure for table `tb_student_marks`
--

CREATE TABLE `tb_student_marks` (
  `mark_id` int(11) NOT NULL,
  `student_id` varchar(50) NOT NULL,
  `mark_1` int(11) NOT NULL,
  `mark_2` int(11) NOT NULL,
  `mark_3` int(11) NOT NULL,
  `total` int(11) NOT NULL,
  `rank` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tb_student_marks`
--

INSERT INTO `tb_student_marks` (`mark_id`, `student_id`, `mark_1`, `mark_2`, `mark_3`, `total`, `rank`) VALUES
(1, 'dddd', 8, 7, 7, 22, 0),
(2, 'ui', 8, 9, 5, 22, 0),
(3, 'pavi', 8, 4, 94, 106, 0);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tb_student_marks`
--
ALTER TABLE `tb_student_marks`
  ADD PRIMARY KEY (`mark_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tb_student_marks`
--
ALTER TABLE `tb_student_marks`
  MODIFY `mark_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

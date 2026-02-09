-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 16, 2025 at 05:17 AM
-- Server version: 10.4.28-MariaDB
-- PHP Version: 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `4114db`
--
CREATE DATABASE IF NOT EXISTS `4114db` DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci;
USE `4114db`;

-- --------------------------------------------------------

--
-- Table structure for table `applications`
--

CREATE TABLE `applications` (
  `id` int(11) NOT NULL,
  `position` varchar(100) NOT NULL,
  `title_name` varchar(50) NOT NULL,
  `fullname` varchar(200) NOT NULL,
  `dob` date NOT NULL,
  `education` varchar(100) NOT NULL,
  `skills` text DEFAULT NULL,
  `experience` text DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data for table `applications`
--

INSERT INTO `applications` (`id`, `position`, `title_name`, `fullname`, `dob`, `education`, `skills`, `experience`, `created_at`) VALUES
(1, 'Digital Marketer', 'นาย', 'สมรักษ์ คำแพง', '2025-12-26', 'อนุปริญญา / ปวส.', 'ไม่มี', 'ไม่มี', '2025-12-16 04:11:30'),
(2, 'Digital Marketer', 'นาย', 'วาสุเทพ ดวงแพงมาตร', '2025-12-25', 'อนุปริญญา / ปวส.', 'คอมพิวเตอร์ ช่างไฟ/อิเล็กทรอนิกส์', 'ช่างไฟฟ้าอิเล็กทรอนิกส์ร้าน 3 เอส.พี.เอ็น', '2025-12-16 04:13:35');

-- --------------------------------------------------------

--
-- Table structure for table `register`
--

CREATE TABLE `register` (
  `r_id` int(6) NOT NULL,
  `r_name` varchar(255) NOT NULL,
  `r_phone` varchar(255) NOT NULL,
  `r_saraly` int(7) NOT NULL,
  `r_height` varchar(255) NOT NULL,
  `r_color` varchar(255) NOT NULL,
  `r_major` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `register`
--

INSERT INTO `register` (`r_id`, `r_name`, `r_phone`, `r_saraly`, `r_height`, `r_color`, `r_major`) VALUES
(1, 'วาสุเทพ ดวงแพงมาตร', '', 0, '', '', ''),
(2, 'พงศธร ศรีขอดเขต', '', 0, '', '', ''),
(3, 'วาสุเทพ ดวงแพงมาตร', '', 0, '', '', ''),
(4, 'วาสุเทพ ดวงแพงมาตร', '', 0, '', '', ''),
(5, 'สมรักษ์ คำแพง', '', 0, '', '', ''),
(6, 'มหาเทพ ลินการ์ด', '', 0, '', '', ''),
(7, 'จินณโจ่ย โล่ยสึง', '5167518346', 0, '', '', ''),
(8, 'บี้อี่ปี่ จึงกะปึ๋ง', '0963890658', 123524, '175', '#3d7b49', 'การตลาด'),
(9, 'สาหิรุ จิงกามะยะ', '0935573270', 154621, '190', '#3d417b', 'การตลก'),
(10, 'วินนิซิอุส จูเนียร์', '0889658788', 1912060, '195', '#717b3d', 'การคอมพิวเตอร์ธุรกิจ'),
(11, 'สาหิรุ จิงกามะยะ', '0935573270', 154621, '190', '#3d417b', 'การตลก'),
(12, 'หายนะ มาเยือนนะจ๊ะ', '0990581957', 564723, '200', '#3d7b47', 'การคอมพิวเตอร์ธุรกิจ'),
(13, 'หายนะ มาเยือนนะจ๊ะ', '0990581957', 564723, '200', '#3d7b47', 'การคอมพิวเตอร์ธุรกิจ');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `applications`
--
ALTER TABLE `applications`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `register`
--
ALTER TABLE `register`
  ADD PRIMARY KEY (`r_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `applications`
--
ALTER TABLE `applications`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `register`
--
ALTER TABLE `register`
  MODIFY `r_id` int(6) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

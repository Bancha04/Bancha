-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Sep 04, 2025 at 02:59 PM
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
-- Database: `msu`
--
CREATE DATABASE IF NOT EXISTS `msu` DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci;
USE `msu`;

-- --------------------------------------------------------

--
-- Table structure for table `faculty`
--

CREATE TABLE `faculty` (
  `f_id` int(4) NOT NULL,
  `f_name` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `faculty`
--

INSERT INTO `faculty` (`f_id`, `f_name`) VALUES
(1, 'คณะการบัญชีและการจัดการ'),
(2, 'คณะมนุษย์ศาสตร์'),
(3, 'คณะวิศวกรรมศาสตร์'),
(4, 'คณะแพทย์ศาสตร์'),
(5, 'คณะเทคโนโลยี'),
(12, ''),
(13, '');

-- --------------------------------------------------------

--
-- Table structure for table `student`
--

CREATE TABLE `student` (
  `s_id` varchar(11) NOT NULL,
  `s_name` varchar(200) NOT NULL,
  `s_address` text NOT NULL,
  `s_gpax` float(3,2) NOT NULL,
  `f_id` int(4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `student`
--

INSERT INTO `student` (`s_id`, `s_name`, `s_address`, `s_gpax`, `f_id`) VALUES
('6010915575', 'โชคดี  มีชัย', '', 0.00, 0),
('66010915582', 'นางสาววิภา ฐานะดี', 'อุบลราชธานี', 3.56, 2),
('66010915602', 'นางสาวธิดาพร  ชาวคูเวียง', 'ช่องบก', 3.33, 2),
('66010915603', 'นางสาวบุหงาวลัย เมืองทิพย์', '3จังหวัดชายแดนภาคใต้', 4.00, 4),
('6610915575', 'โชคดี  มีชัย', '', 0.00, 0),
('67010916173', 'นายกษิดิศ ศรีกงพลี', 'ขอนแก่น', 3.34, 1),
('67010974002', 'นายขจรศักดิ์ จันทรเสนา', 'อุดรธานี', 2.83, 1),
('67010974003', 'นายคณาธิป ขวากุดแข้', 'ร้อยเอ็ด', 3.46, 3),
('67010974005', 'นางสาวณิตญา คำสมศรี', 'มหาสารคาม', 2.81, 3),
('67010974006', 'นางสาวธิดาทิพย์ ฤกใหญ่', 'ขอนแก่น', 3.81, 4),
('67010974008', 'นายบัญชา แสนนา', 'สุรินทร์', 3.74, 4),
('67010974009', 'นางสาวประภัสสร สองคร', 'อุดรธานี', 2.03, 2),
('67010974010', 'นางสาวปาริชาติ ทัพธานี', 'มหาสารคาม', 3.35, 2),
('67010974011', 'นางสาวพิมพ์จันทร์ แสนโสม', 'กาฬสินธุ์', 3.73, 3),
('67010974013', 'นายรัฐศาสตร์ บรรจงกุล', 'ขอนแก่น', 2.92, 1),
('67010974014', 'นางสาวลลิตภัทร เข็มพิมาย', 'ขอนแก่น', 3.46, 3),
('67010974015', 'นางสาววณิชชา สดใส', 'กรุงเทพมหานคร', 3.65, 2),
('67010974016', 'นายวีรภัทร สุพร', 'กรุงเทพมหานคร', 2.39, 2),
('67010974018', 'นายอนันตยศ อินทราพงษ์', 'มหาสารคาม', 3.65, 4),
('67010974019', 'นายอัครพนธ์ ป้อมพระราช', 'กาฬสินธุ์', 2.67, 1),
('68010974001', 'กนกวรรณ  รอบรู้ดี', '', 0.00, 0),
('68010974002', 'เบญจวรรณ  รุ่งเรือง', '', 0.00, 0),
('68010974003', 'ปาริชาติ แหยม', '', 0.00, 0),
('68010974006', 'เบญจวรรณ  จันทะมา', 'อุดรธานี', 3.99, 1),
('68010974009', 'นายมีสุข  สุขใจ', 'ขอนแก่น', 3.99, 1);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `faculty`
--
ALTER TABLE `faculty`
  ADD PRIMARY KEY (`f_id`);

--
-- Indexes for table `student`
--
ALTER TABLE `student`
  ADD PRIMARY KEY (`s_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `faculty`
--
ALTER TABLE `faculty`
  MODIFY `f_id` int(4) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

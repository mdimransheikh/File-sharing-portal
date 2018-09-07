-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Jul 12, 2018 at 04:36 PM
-- Server version: 10.1.13-MariaDB
-- PHP Version: 5.6.23

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `student_faculty`
--

-- --------------------------------------------------------

--
-- Table structure for table `student`
--

CREATE TABLE `student` (
  `Id` int(11) NOT NULL,
  `roll_num` varchar(32) NOT NULL,
  `Name` varchar(100) NOT NULL,
  `Uname` varchar(100) NOT NULL,
  `Password` varchar(100) NOT NULL,
  `RePass` varchar(100) NOT NULL,
  `Email` varchar(100) NOT NULL,
  `Subject` varchar(100) NOT NULL,
  `University` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `student`
--

INSERT INTO `student` (`Id`, `roll_num`, `Name`, `Uname`, `Password`, `RePass`, `Email`, `Subject`, `University`) VALUES
(1, '0', 'Alamgir Hossain', 'Alamgir_JUST', '123', '123', 'malamgirhossain1996@gmail.com', 'Computer Science and Engineering', 'Jessore University of Science and Technology'),
(3, '0', 'Md. Alamgir Hossain', 'alamgir_cse', 'alam58280', 'alam58280', 'alamgir.cse14.just@gmail.com', 'Computer Science & Engineering', 'Jessore University of Science & Technology'),
(4, '140141', 'Md Alomgir Hossain', 'Alamgir_JUST_CSE', '1234', '1234', 'alom@gmail.com', 'cse', 'JUST'),
(5, '140141', 'alamgir_just', 'Alamgir_JUST', '1234', '1234', 'alom@gmail.com', 'cse', 'JUST');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_admin`
--

CREATE TABLE `tbl_admin` (
  `Name` varchar(200) NOT NULL,
  `Password` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_admin`
--

INSERT INTO `tbl_admin` (`Name`, `Password`) VALUES
('Md. Alamgir Hossain', 'alam58280'),
('alamgir_just', 'alam58280'),
('Nowsin Amin Sheikh', '12345'),
('Nowsin_Amin', '12345');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_books`
--

CREATE TABLE `tbl_books` (
  `Books_Id` int(11) NOT NULL,
  `Department` varchar(100) NOT NULL,
  `Year` varchar(50) NOT NULL,
  `Semister` varchar(50) NOT NULL,
  `Books_Type` varchar(100) NOT NULL,
  `Books_Name` varchar(200) NOT NULL,
  `Publishers` varchar(100) NOT NULL,
  `Book_File` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_books`
--

INSERT INTO `tbl_books` (`Books_Id`, `Department`, `Year`, `Semister`, `Books_Type`, `Books_Name`, `Publishers`, `Book_File`) VALUES
(242345325, 'pme', 'forth', 'first', 'database', 'sadfgsdgsdfgs', 'gasdasdfg', 'my_resume.pdf'),
(467989, 'cse', 'first', 'first', 'sadfasdf', 'fasdfasdf', 'fasdfasdf', 'Pattern Recognition- an Overview.pdf'),
(467989, 'pme', 'first', 'first', 'Academic', 'This is the comment', 'Doctor Alom', 'Pattern Recognition- an Overview.pdf'),
(3457, 'pme', 'first', 'first', 'test book', 'This is the comment', 'fasdfasdf', 'Syllabus.pdf');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_discussion`
--

CREATE TABLE `tbl_discussion` (
  `id` int(11) NOT NULL,
  `messageby` varchar(100) NOT NULL,
  `Message` varchar(10000) NOT NULL,
  `File` varchar(255) DEFAULT NULL,
  `pub_date` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_discussion`
--

INSERT INTO `tbl_discussion` (`id`, `messageby`, `Message`, `File`, `pub_date`) VALUES
(24, 'alamgir_just', 'sadgvsdfgvzsdfg', 'my_resume.pdf', '2018-06-28 22:48:22'),
(25, 'alamgir_just', 'sadgvsdfgvzsdfg', 'my_resume.pdf', '2018-06-28 22:52:31');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_faculty`
--

CREATE TABLE `tbl_faculty` (
  `id` int(11) NOT NULL,
  `Name` varchar(100) NOT NULL,
  `Department` varchar(100) NOT NULL,
  `University` varchar(100) NOT NULL,
  `Designation` varchar(100) NOT NULL,
  `Email` varchar(32) NOT NULL,
  `Website` text NOT NULL,
  `Picture` varchar(500) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_faculty`
--

INSERT INTO `tbl_faculty` (`id`, `Name`, `Department`, `University`, `Designation`, `Email`, `Website`, `Picture`) VALUES
(19, 'Nowsin Amin Sheikh', 'Computer Science and Engineering', 'Jessore University of Science & Technology', 'Asssistant Professor', '', 'amamgirhossainjust.blogspot.com', 'images\\17498987_1262414233811823_4360666191603824613_n.png'),
(20, 'NowsinAmin', 'COmputer Science and Engineering', 'Jessore University of Science and Technology', 'Assistant Professor', '', '', 'images\\17498987_1262414233811823_4360666191603824613_n.png'),
(21, 'Mohammad Nowsin Amin', 'Computer Science and Engineering', 'Jessore University of Science and Technology', 'Assistant Professor', '', '', 'images\\17498987_1262414233811823_4360666191603824613_n.png'),
(22, 'Nowsin_Amin', 'Computer Science & Engineering', 'Jessore University of Science & Technology', 'Assistant Professor', '', 'https://alamgirhossainjust.blogspot.com/', 'images\\17498987_1262414233811823_4360666191603824613_n.png'),
(23, 'alamgir_just', 'fasdfa', 'fasdfasd', 'fasdfas', '', 'fasdfasdf', 'files/c4a87e3a74.png');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_message`
--

CREATE TABLE `tbl_message` (
  `id` int(11) NOT NULL,
  `username` varchar(32) NOT NULL,
  `message` text NOT NULL,
  `message_file` varchar(255) NOT NULL,
  `message_time` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_notice`
--

CREATE TABLE `tbl_notice` (
  `Notice_Id` int(11) NOT NULL,
  `Department` varchar(100) NOT NULL,
  `Topics` varchar(1000) NOT NULL,
  `Notice_Name` varchar(200) NOT NULL,
  `Notice_File` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_notice`
--

INSERT INTO `tbl_notice` (`Notice_Id`, `Department`, `Topics`, `Notice_Name`, `Notice_File`) VALUES
(1232423, 'cse', 'result', 'efsafd', 'Resume.pdf');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_result`
--

CREATE TABLE `tbl_result` (
  `Result_Id` int(11) NOT NULL,
  `Department` varchar(100) NOT NULL,
  `Year` varchar(50) NOT NULL,
  `Semister` varchar(50) NOT NULL,
  `Type` varchar(100) NOT NULL,
  `Name` varchar(400) NOT NULL,
  `Result_File` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_result`
--

INSERT INTO `tbl_result` (`Result_Id`, `Department`, `Year`, `Semister`, `Type`, `Name`, `Result_File`) VALUES
(454556, 'cse', 'first', 'first', 'semester', 'sdftgsdfg', 'my_resume.pdf');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_sdiscussion`
--

CREATE TABLE `tbl_sdiscussion` (
  `id` int(11) NOT NULL,
  `messageby` varchar(100) NOT NULL,
  `Message` text NOT NULL,
  `File` varchar(255) NOT NULL,
  `pub_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_sdiscussion`
--

INSERT INTO `tbl_sdiscussion` (`id`, `messageby`, `Message`, `File`, `pub_date`) VALUES
(6, 'Nowsin_Amin', 'ffffffffffffffffff', 'my_resume.pdf', '2018-06-28 17:19:27'),
(7, 'Nowsin_Amin', 'ffffffffffffffffff', 'my_resume.pdf', '2018-06-28 17:19:36'),
(8, 'Nowsin_Amin', 'ffffffffffffffffff', 'my_resume.pdf', '2018-06-28 17:20:38');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `student`
--
ALTER TABLE `student`
  ADD PRIMARY KEY (`Id`);

--
-- Indexes for table `tbl_discussion`
--
ALTER TABLE `tbl_discussion`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_faculty`
--
ALTER TABLE `tbl_faculty`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_message`
--
ALTER TABLE `tbl_message`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_sdiscussion`
--
ALTER TABLE `tbl_sdiscussion`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `student`
--
ALTER TABLE `student`
  MODIFY `Id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT for table `tbl_discussion`
--
ALTER TABLE `tbl_discussion`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;
--
-- AUTO_INCREMENT for table `tbl_faculty`
--
ALTER TABLE `tbl_faculty`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;
--
-- AUTO_INCREMENT for table `tbl_message`
--
ALTER TABLE `tbl_message`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `tbl_sdiscussion`
--
ALTER TABLE `tbl_sdiscussion`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

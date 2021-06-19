-- phpMyAdmin SQL Dump
-- version 5.0.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 19, 2021 at 04:15 PM
-- Server version: 10.4.17-MariaDB
-- PHP Version: 8.0.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `ecourse`
--

-- --------------------------------------------------------

--
-- Table structure for table `cc`
--

CREATE TABLE `cc` (
  `ccid` int(11) NOT NULL,
  `username` int(11) NOT NULL,
  `password` varchar(100) NOT NULL,
  `fullname` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `programme` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `cc`
--

INSERT INTO `cc` (`ccid`, `username`, `password`, `fullname`, `email`, `programme`) VALUES
(1, 72663, 'Nira1#', 'Sharifah Anira ', 'Anira@gmail.com', 'Software Engineering');

-- --------------------------------------------------------

--
-- Table structure for table `class`
--

CREATE TABLE `class` (
  `class_id` int(11) NOT NULL,
  `courseid` varchar(100) NOT NULL,
  `ccid` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `class`
--

INSERT INTO `class` (`class_id`, `courseid`, `ccid`) VALUES
(9, 'TMN2234', '1');

-- --------------------------------------------------------

--
-- Table structure for table `course`
--

CREATE TABLE `course` (
  `courseid` int(11) NOT NULL,
  `code` varchar(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `semester` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `course`
--

INSERT INTO `course` (`courseid`, `code`, `name`, `semester`) VALUES
(4, 'TMF2954', 'Java Programming', 4),
(5, 'TMN2234', 'Web Based System Development', 1),
(6, 'TMN2073', 'Computer Security', 2);

-- --------------------------------------------------------

--
-- Table structure for table `file`
--

CREATE TABLE `file` (
  `file_id` int(11) NOT NULL,
  `fname` varchar(100) NOT NULL,
  `fcomment` varchar(100) NOT NULL,
  `fstatus` varchar(100) NOT NULL,
  `ccid` int(11) NOT NULL,
  `class_id` int(11) NOT NULL,
  `fqmcstatus` varchar(100) NOT NULL,
  `fqmccomment` varchar(100) NOT NULL,
  `qmcid` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `file`
--

INSERT INTO `file` (`file_id`, `fname`, `fcomment`, `fstatus`, `ccid`, `class_id`, `fqmcstatus`, `fqmccomment`, `qmcid`) VALUES
(11, 'UploadFile.docx', 'Introduction to HTML', 'Complete', 1, 9, 'Checked', 'Excellent', 0),
(12, 'UploadFile.xlsx', 'Database User', 'Incomplete', 1, 9, 'Checked', 'not enough material', 0);

-- --------------------------------------------------------

--
-- Table structure for table `qmc`
--

CREATE TABLE `qmc` (
  `qmcid` int(11) NOT NULL,
  `qusername` int(11) NOT NULL,
  `qpassword` varchar(100) NOT NULL,
  `qfullname` varchar(100) NOT NULL,
  `qemail` varchar(100) NOT NULL,
  `qprogramme` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `qmc`
--

INSERT INTO `qmc` (`qmcid`, `qusername`, `qpassword`, `qfullname`, `qemail`, `qprogramme`) VALUES
(1, 72234, 'Zera1#', 'Fatin Nur Azzirah', 'Fatin@gmail.com', 'Information System');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `userid` int(11) NOT NULL,
  `username` int(11) NOT NULL,
  `password` varchar(100) NOT NULL,
  `fullname` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `programme` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`userid`, `username`, `password`, `fullname`, `email`, `programme`) VALUES
(1, 72848, 'Miza1#', 'Sharifah Amiza', 'amiza@gmail.com', 'Network Computing');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `cc`
--
ALTER TABLE `cc`
  ADD PRIMARY KEY (`ccid`);

--
-- Indexes for table `class`
--
ALTER TABLE `class`
  ADD PRIMARY KEY (`class_id`);

--
-- Indexes for table `course`
--
ALTER TABLE `course`
  ADD PRIMARY KEY (`courseid`);

--
-- Indexes for table `file`
--
ALTER TABLE `file`
  ADD PRIMARY KEY (`file_id`);

--
-- Indexes for table `qmc`
--
ALTER TABLE `qmc`
  ADD PRIMARY KEY (`qmcid`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`userid`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `cc`
--
ALTER TABLE `cc`
  MODIFY `ccid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `class`
--
ALTER TABLE `class`
  MODIFY `class_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `course`
--
ALTER TABLE `course`
  MODIFY `courseid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `file`
--
ALTER TABLE `file`
  MODIFY `file_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `qmc`
--
ALTER TABLE `qmc`
  MODIFY `qmcid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `userid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

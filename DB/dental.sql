-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Oct 07, 2016 at 09:06 PM
-- Server version: 10.1.9-MariaDB
-- PHP Version: 5.6.15

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `dental`
--

-- --------------------------------------------------------

--
-- Table structure for table `patient`
--

CREATE TABLE `patient` (
  `id` int(11) NOT NULL,
  `title` varchar(6) NOT NULL,
  `fname` varchar(50) NOT NULL,
  `lname` varchar(50) NOT NULL,
  `occupation` varchar(30) NOT NULL,
  `address` varchar(100) NOT NULL,
  `email` varchar(50) NOT NULL,
  `phone` varchar(10) NOT NULL,
  `gender` varchar(10) NOT NULL,
  `dob` date NOT NULL,
  `regdatetime` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `patient`
--

INSERT INTO `patient` (`id`, `title`, `fname`, `lname`, `occupation`, `address`, `email`, `phone`, `gender`, `dob`, `regdatetime`) VALUES
(1, 'Mr', 'Sanjula', 'madumal', 'student', 'vvvv', 'sanjula.madumal@gmail.com', '1111111111', 'Male', '1993-12-12', '2016-09-09 15:41:24'),
(2, 'Mr', 'Hari', 'Prashanth', 'STUDENT', '11111111111', 'HARI@GMAIL.COM', '1112233445', 'Male', '1993-12-12', '2016-09-09 15:47:53'),
(3, 'Mr', 'aruna', 'we', 'student', '12123\r\n12312\r\n123123', 'aruna@gmail.com', '0123456789', 'Male', '1993-12-12', '2016-09-16 07:05:47'),
(4, 'Mr.', 'kamal', 'new', 'student', 'no 32, kandy', 'kamal@gmail.com', '123456890', 'Male', '1991-09-28', '2016-10-01 05:35:18'),
(5, 'Mr', 'nnnnn', 'nnnn', 'nnn', 'ffffff', '465465@ff.com', '1234567890', 'Male', '2016-01-13', '2016-10-01 11:28:20'),
(6, 'Mr', 'aaa', 'aaaa', '1111', '12 nn wwwggg, bbb', '', '1234567890', 'Male', '1993-12-12', '2016-10-04 09:05:06');

-- --------------------------------------------------------

--
-- Table structure for table `trauma_details`
--

CREATE TABLE `trauma_details` (
  `pid` int(11) NOT NULL,
  `tdate` varchar(20) NOT NULL,
  `ttime` varchar(20) NOT NULL,
  `cause` varchar(25) NOT NULL,
  `cause_details` varchar(200) NOT NULL,
  `date` date NOT NULL,
  `bd` varchar(3) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `trauma_details`
--

INSERT INTO `trauma_details` (`pid`, `tdate`, `ttime`, `cause`, `cause_details`, `date`, `bd`) VALUES
(1, '2016-09-15', '00:12', 'Hit over object', '', '2016-09-16', 'yes'),
(2, '2016-09-08', '00:12', 'Fallen', '', '2016-09-16', 'no'),
(3, '2016-09-01', '12:12', 'RTA:Motor bike', 'yes', '2016-09-22', 'yes');

-- --------------------------------------------------------

--
-- Table structure for table `trauma_examination`
--

CREATE TABLE `trauma_examination` (
  `pid` int(11) NOT NULL,
  `ateeth` varchar(3) NOT NULL,
  `found` varchar(3) NOT NULL,
  `smedium` varchar(20) NOT NULL,
  `dirty` varchar(3) NOT NULL,
  `drytime` varchar(20) NOT NULL,
  `repanted` varchar(3) NOT NULL,
  `image` varchar(50) DEFAULT NULL,
  `imgdescription` varchar(500) NOT NULL,
  `oralhygiene` varchar(10) NOT NULL,
  `apdisease` varchar(3) NOT NULL,
  `madication` varchar(1000) NOT NULL,
  `pic` varchar(20) NOT NULL,
  `teeth` varchar(40) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `trauma_examination`
--

INSERT INTO `trauma_examination` (`pid`, `ateeth`, `found`, `smedium`, `dirty`, `drytime`, `repanted`, `image`, `imgdescription`, `oralhygiene`, `apdisease`, `madication`, `pic`, `teeth`) VALUES
(1, 'yes', 'no', 'water', 'yes', '5:50', 'yes', NULL, 'none', 'yes', 'no', 'none', 'face1.jpg', '12,31,11'),
(2, 'yes', 'yes', 'insocket', 'no', '12:00', 'no', NULL, 'none', 'poor', 'yes', 'no', 'face2.jpg', '12'),
(3, 'yes', 'no', 'insocket', 'no', '21:12', 'no', NULL, '22', 'poor', 'no', 'no', '', '11,22,21,41,31');

-- --------------------------------------------------------

--
-- Table structure for table `trauma_medical_details`
--

CREATE TABLE `trauma_medical_details` (
  `pid` int(11) NOT NULL,
  `healthy` varchar(3) NOT NULL,
  `healthy_details` varchar(500) NOT NULL,
  `allergies` varchar(3) NOT NULL,
  `allergies_details` varchar(500) NOT NULL,
  `smoking` varchar(3) NOT NULL,
  `smoking_number` float NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `trauma_medical_details`
--

INSERT INTO `trauma_medical_details` (`pid`, `healthy`, `healthy_details`, `allergies`, `allergies_details`, `smoking`, `smoking_number`) VALUES
(1, 'yes', '', 'no', ' ', 'no', 0),
(2, 'yes', '', 'yes', ' all', 'no', 0),
(3, 'yes', '', 'no', ' ', 'yes', 1);

-- --------------------------------------------------------

--
-- Table structure for table `trauma_teeth_details`
--

CREATE TABLE `trauma_teeth_details` (
  `pid` int(11) NOT NULL,
  `xrayiamge` varchar(30) DEFAULT NULL,
  `finding` varchar(200) DEFAULT NULL,
  `diagnosis` varchar(200) DEFAULT NULL,
  `prognosis` varchar(200) DEFAULT NULL,
  `plan` varchar(200) DEFAULT NULL,
  `xrayissues` varchar(200) DEFAULT NULL,
  `t11` varchar(2) NOT NULL DEFAULT '0',
  `t12` varchar(2) NOT NULL DEFAULT '0',
  `t13` varchar(2) NOT NULL DEFAULT '0',
  `t14` varchar(2) NOT NULL DEFAULT '0',
  `t15` varchar(2) NOT NULL DEFAULT '0',
  `t21` varchar(2) NOT NULL DEFAULT '0',
  `t22` varchar(2) NOT NULL DEFAULT '0',
  `t23` varchar(2) NOT NULL DEFAULT '0',
  `t24` varchar(2) NOT NULL DEFAULT '0',
  `t25` varchar(2) NOT NULL DEFAULT '0',
  `t31` varchar(2) NOT NULL DEFAULT '0',
  `t32` varchar(2) NOT NULL DEFAULT '0',
  `t33` varchar(2) NOT NULL DEFAULT '0',
  `t34` varchar(2) NOT NULL DEFAULT '0',
  `t35` varchar(2) NOT NULL DEFAULT '0',
  `t41` varchar(2) NOT NULL DEFAULT '0',
  `t42` varchar(2) NOT NULL DEFAULT '0',
  `t43` varchar(2) NOT NULL DEFAULT '0',
  `t44` varchar(2) NOT NULL DEFAULT '0',
  `t45` varchar(2) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `trauma_teeth_details`
--

INSERT INTO `trauma_teeth_details` (`pid`, `xrayiamge`, `finding`, `diagnosis`, `prognosis`, `plan`, `xrayissues`, `t11`, `t12`, `t13`, `t14`, `t15`, `t21`, `t22`, `t23`, `t24`, `t25`, `t31`, `t32`, `t33`, `t34`, `t35`, `t41`, `t42`, `t43`, `t44`, `t45`) VALUES
(1, 'truamaxray2.jpg', 'rr', 'rrr', 'poor', 'rr', 'Bite wing,L.S Occlusal', '2', '9', '12', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0'),
(2, 'truamaxray2.jpg', 'hhyfghgfh', '1111fff', 'good', '111', 'Bite wing,U.S Occlusal,Soft tissue', '2', '9', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0'),
(3, 'truamaxray3.jpg', '11', '111', 'poor', '11', 'Bite wing,U.S Occlusal,Soft tissue', '2', '9', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `patient`
--
ALTER TABLE `patient`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `trauma_details`
--
ALTER TABLE `trauma_details`
  ADD PRIMARY KEY (`pid`,`date`);

--
-- Indexes for table `trauma_examination`
--
ALTER TABLE `trauma_examination`
  ADD PRIMARY KEY (`pid`);

--
-- Indexes for table `trauma_medical_details`
--
ALTER TABLE `trauma_medical_details`
  ADD PRIMARY KEY (`pid`);

--
-- Indexes for table `trauma_teeth_details`
--
ALTER TABLE `trauma_teeth_details`
  ADD PRIMARY KEY (`pid`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `patient`
--
ALTER TABLE `patient`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

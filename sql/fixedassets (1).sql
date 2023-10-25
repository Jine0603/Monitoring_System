-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Oct 05, 2023 at 11:18 AM
-- Server version: 10.4.24-MariaDB
-- PHP Version: 8.0.19

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `fixedassets`
--

-- --------------------------------------------------------

--
-- Table structure for table `access_tbl`
--

CREATE TABLE `access_tbl` (
  `id` int(11) NOT NULL,
  `access` varchar(255) CHARACTER SET latin1 DEFAULT NULL,
  `status` varchar(50) CHARACTER SET latin1 DEFAULT '1',
  `date_created` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `access_tbl`
--

INSERT INTO `access_tbl` (`id`, `access`, `status`, `date_created`) VALUES
(1, 'Super Admin', '1', '2023-10-04 09:52:08');

-- --------------------------------------------------------

--
-- Table structure for table `categ_tbl`
--

CREATE TABLE `categ_tbl` (
  `id` int(11) NOT NULL,
  `categories` varchar(255) CHARACTER SET latin1 DEFAULT NULL,
  `description` varchar(255) CHARACTER SET latin1 DEFAULT NULL,
  `status` varchar(255) CHARACTER SET latin1 DEFAULT '1',
  `datecreated` datetime DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `categ_tbl`
--

INSERT INTO `categ_tbl` (`id`, `categories`, `description`, `status`, `datecreated`) VALUES
(1, 'BI', 'Building Improvement', '1', '2023-09-13 13:12:24'),
(2, 'CE', 'Computer Equipment & Accessories', '1', '2023-09-25 10:04:49'),
(3, 'FF', 'Furniture & Fixtures', '1', '2023-09-28 15:43:28'),
(4, 'LAND', 'Land Improvements', '1', '2023-09-28 15:43:28'),
(5, 'LE', 'Leasehold', '1', '2023-09-28 15:46:27'),
(6, 'OE', 'Office Equipment', '1', '2023-09-28 15:46:27'),
(7, 'SI', 'Software Investment', '1', '2023-09-28 15:50:10'),
(8, 'TO', 'Tools', '1', '2023-09-28 15:50:10'),
(9, 'VE', 'Vehicles', '1', '2023-09-28 15:52:18'),
(10, 'WI', 'Warehouse Improvements', '1', '2023-09-28 15:52:18');

-- --------------------------------------------------------

--
-- Table structure for table `com_tbl`
--

CREATE TABLE `com_tbl` (
  `id` int(11) NOT NULL,
  `company` varchar(255) CHARACTER SET latin1 DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `com_tbl`
--

INSERT INTO `com_tbl` (`id`, `company`) VALUES
(1, 'Filipinas Multi-Line Corp.'),
(2, 'Multi-Line Building System,Inc.'),
(3, 'Multi-Line Structure Corp.'),
(4, 'EverFirst Loans Corp.');

-- --------------------------------------------------------

--
-- Table structure for table `dep_tbl`
--

CREATE TABLE `dep_tbl` (
  `id` int(11) NOT NULL,
  `companyid` varchar(255) CHARACTER SET latin1 DEFAULT NULL,
  `department` varchar(255) CHARACTER SET latin1 DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `dep_tbl`
--

INSERT INTO `dep_tbl` (`id`, `companyid`, `department`) VALUES
(1, '1', 'General'),
(2, '2', 'General'),
(3, '1', 'IT'),
(4, '2', 'Management');

-- --------------------------------------------------------

--
-- Table structure for table `emp_tbl`
--

CREATE TABLE `emp_tbl` (
  `id` int(11) NOT NULL,
  `employeeid` varchar(50) CHARACTER SET latin1 DEFAULT NULL,
  `firstname` varchar(255) DEFAULT NULL,
  `lastname` varchar(255) DEFAULT NULL,
  `username` varchar(255) DEFAULT NULL,
  `password` varchar(25) DEFAULT NULL,
  `companyid` varchar(50) CHARACTER SET latin1 DEFAULT NULL,
  `departmentid` varchar(50) CHARACTER SET latin1 DEFAULT NULL,
  `positionid` varchar(10) DEFAULT NULL,
  `accessid` varchar(50) DEFAULT NULL,
  `status` varchar(50) CHARACTER SET latin1 DEFAULT '1',
  `datecreated` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `emp_tbl`
--

INSERT INTO `emp_tbl` (`id`, `employeeid`, `firstname`, `lastname`, `username`, `password`, `companyid`, `departmentid`, `positionid`, `accessid`, `status`, `datecreated`) VALUES
(1, '361', 'Jine', '1', 'jine00', '123', '1', '2', '7', '1', '1', '2023-08-23 09:15:09'),
(2, '362', 'Requestor', 'FMC', 'requestor', '123', '1', '1', '2', '2', '1', '2023-08-23 09:15:09'),
(3, '123', 'Approver', '1', 'approver1', '123', '1', '2', '7', '3', '1', '2023-08-23 09:15:09'),
(4, '123', 'Approver', '2', 'approver2', '123', '1', '2', '7', '4', '1', '2023-08-23 09:15:09'),
(5, '123', 'Approver', '3', 'approver3', '123', '1', '2', '7', '5', '1', '2023-08-23 09:15:09'),
(6, '123', 'Approver', '4', 'approver4', '123', '1', '2', '7', '6', '1', '2023-08-23 09:15:09'),
(7, '123', 'Approver', '5', 'approver5', '123', '1', '2', '7', '7', '1', '2023-08-23 09:15:09'),
(8, '555', 'Requestor', 'FMC', 'requestor2', '123', '1', '2', '7', '2', '1', '2023-08-23 09:15:09'),
(9, '1234', 'Requestor', 'one', 'requestor3', '123', '2', '9', '11', '2', '0', '2023-08-25 09:19:00');

-- --------------------------------------------------------

--
-- Table structure for table `itemstatus_tbl`
--

CREATE TABLE `itemstatus_tbl` (
  `id` int(11) NOT NULL,
  `itemsta` varchar(255) CHARACTER SET latin1 DEFAULT NULL,
  `status` varchar(255) CHARACTER SET latin1 DEFAULT '1',
  `date_created` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `itemstatus_tbl`
--

INSERT INTO `itemstatus_tbl` (`id`, `itemsta`, `status`, `date_created`) VALUES
(1, 'Stock', '1', '2023-09-21 15:28:41'),
(2, 'In Use', '1', '2023-09-21 15:28:41');

-- --------------------------------------------------------

--
-- Table structure for table `sample_db`
--

CREATE TABLE `sample_db` (
  `id` int(11) NOT NULL,
  `assetid` varchar(50) CHARACTER SET latin1 DEFAULT NULL,
  `assetmodel` varchar(255) CHARACTER SET latin1 DEFAULT 'NA',
  `file_name` varchar(255) CHARACTER SET latin1 DEFAULT NULL,
  `assetname` varchar(255) CHARACTER SET latin1 DEFAULT NULL,
  `companyid` varchar(255) CHARACTER SET latin1 DEFAULT NULL,
  `categoriesid` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_nopad_ci DEFAULT NULL,
  `departmentid` varchar(255) CHARACTER SET latin1 DEFAULT NULL,
  `date_purchase` date DEFAULT NULL,
  `assetstatus` varchar(50) CHARACTER SET latin1 DEFAULT NULL,
  `assignemployee` varchar(255) CHARACTER SET latin1 DEFAULT NULL,
  `status` varchar(50) NOT NULL DEFAULT '1',
  `date_created` datetime DEFAULT NULL,
  `quantity` int(50) DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `sample_db`
--

INSERT INTO `sample_db` (`id`, `assetid`, `assetmodel`, `file_name`, `assetname`, `companyid`, `categoriesid`, `departmentid`, `date_purchase`, `assetstatus`, `assignemployee`, `status`, `date_created`, `quantity`) VALUES
(9, 'FF161642586', 'FHD AMD', '2794_6505040_sd.jpg', 'FreeSync Monitor', '1', '1', '1', '2023-09-15', '1', NULL, '1', '2023-09-25 09:08:13', 1),
(10, 'FF128015247', 'NA', '2985_140622072805-160720123421-01.jpeg', 'Niko Office Table', '2', '2', '2', '2023-09-16', '1', NULL, '1', '2023-09-25 10:07:39', 1),
(11, 'FF123347162', '3650 MT', '6387_s-l1600.jpg', 'Dell Inspiron', '1', '1', '1', '2023-09-23', '2', 'jamez walzon', '1', '2023-09-25 10:13:09', 1),
(12, 'FF104812610', 'M612', '9984_redragon-predator.jpg', 'Redragon Predator ', '1', '3', '3', '2023-09-02', '1', NULL, '1', '2023-09-25 16:33:29', 1),
(18, 'FF128340778', 'NA', '3985_55261_ivoryboucl_01.jpg', 'Boucle Swivel Chair', '1', '2', '1', '2023-09-12', '2', 'Lance', '1', '2023-09-27 14:57:10', 1),
(19, '136005036[object PointerEvent]', 'dsfgdsg', '8120_6505040_sd.jpg', 'HP', '1', '2', '1', '2023-09-28', '2', 'Walker', '1', '2023-09-29 09:21:37', 1),
(20, '04-191603721', 'dsfgdsg', '3628_s-l1600.jpg', 'LG 27\"', '1', '4', '1', '2023-09-20', '2', 'Anderson', '1', '2023-09-29 13:33:19', 1),
(21, '04-175711382', 'dsfgdsg', '1883_redragon-predator.jpg', '4', '1', '4', '1', '2023-10-04', '1', NULL, '1', '2023-10-04 13:22:48', 1),
(22, '02-141424438', 'dsfgdsg', '9656_55261_ivoryboucl_01.jpg', '100', '1', '2', '1', '2023-10-17', '1', NULL, '1', '2023-10-04 14:22:26', 1),
(23, '03-138268207', 'ava', '2032_6505040_sd.jpg', 'ASUS', '2', '3', '2', '2023-10-03', '1', NULL, '1', '2023-10-05 10:49:33', 1),
(24, '02-162545094', 'dsfgdsg', '2258_55261_ivoryboucl_01.jpg', 'Niko Office Table', '1', '2', '1', '2023-10-01', '1', NULL, '1', '2023-10-05 13:03:08', 1),
(25, '02-162545094', 'dsfgdsg', '2258_55261_ivoryboucl_01.jpg', 'Niko Office Table', '1', '2', '1', '2023-10-01', '1', NULL, '1', '2023-10-05 13:03:08', 1),
(26, '04-105000239', '45', '2039_6505040_sd.jpg', 'Niko Office Table', '1', '4', '1', '2023-10-08', '1', NULL, '1', '2023-10-05 13:06:25', 1),
(27, '04-105000239', '45', '2039_6505040_sd.jpg', 'Niko Office Table', '1', '4', '1', '2023-10-08', '1', NULL, '1', '2023-10-05 13:06:25', 1),
(28, '04-105000239', '45', '2039_6505040_sd.jpg', 'Niko Office Table', '1', '4', '1', '2023-10-08', '1', NULL, '1', '2023-10-05 13:06:25', 1),
(29, '02-123928472', '45ws', '4041_6505040_sd.jpg', 'ASUS', '1', '2', '1', '2023-10-09', '1', NULL, '1', '2023-10-05 13:19:06', 1),
(30, '02-101120925', 'dsfgdsg', '1368_140622072805-160720123421-01.jpeg', 'HP', '1', '2', '1', '2023-10-01', '1', NULL, '1', '2023-10-05 13:31:32', 1),
(31, '02-101120925', 'dsfgdsg', '1368_140622072805-160720123421-01.jpeg', 'HP', '1', '2', '1', '2023-10-01', '1', NULL, '1', '2023-10-05 13:31:32', 1),
(32, '02-101120925', 'dsfgdsg', '1368_140622072805-160720123421-01.jpeg', 'HP', '1', '2', '1', '2023-10-01', '1', NULL, '1', '2023-10-05 13:31:32', 1);

-- --------------------------------------------------------

--
-- Table structure for table `try_tbl`
--

CREATE TABLE `try_tbl` (
  `id` int(11) NOT NULL,
  `assetid` varchar(255) DEFAULT NULL,
  `quantity` varchar(255) DEFAULT '1',
  `acess` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `try_tbl`
--

INSERT INTO `try_tbl` (`id`, `assetid`, `quantity`, `acess`) VALUES
(1, '14731', '', NULL),
(2, '11009', '', NULL),
(3, '15818', '', NULL),
(4, '13081', '3', NULL),
(5, '', '', NULL),
(6, '', '', NULL),
(7, '', '1', NULL),
(8, '65464564', '3', NULL),
(9, '0001', '3', NULL),
(10, '', '10', NULL),
(11, '19198', '10', NULL),
(12, '19198', '10', NULL),
(13, '19198', '10', NULL),
(14, '', '3', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `user_tbl`
--

CREATE TABLE `user_tbl` (
  `id` int(11) NOT NULL,
  `username` varchar(255) CHARACTER SET latin1 DEFAULT NULL,
  `password` varchar(255) CHARACTER SET latin1 DEFAULT NULL,
  `accessid` varchar(50) CHARACTER SET latin1 DEFAULT NULL,
  `status` varchar(50) CHARACTER SET latin1 DEFAULT NULL,
  `datecreated` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `user_tbl`
--

INSERT INTO `user_tbl` (`id`, `username`, `password`, `accessid`, `status`, `datecreated`) VALUES
(1, 'jine', '123456', '1', '1', '2023-09-04 13:58:11');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `access_tbl`
--
ALTER TABLE `access_tbl`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `categ_tbl`
--
ALTER TABLE `categ_tbl`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `com_tbl`
--
ALTER TABLE `com_tbl`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `dep_tbl`
--
ALTER TABLE `dep_tbl`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `itemstatus_tbl`
--
ALTER TABLE `itemstatus_tbl`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `sample_db`
--
ALTER TABLE `sample_db`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `try_tbl`
--
ALTER TABLE `try_tbl`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user_tbl`
--
ALTER TABLE `user_tbl`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `access_tbl`
--
ALTER TABLE `access_tbl`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `categ_tbl`
--
ALTER TABLE `categ_tbl`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `com_tbl`
--
ALTER TABLE `com_tbl`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `dep_tbl`
--
ALTER TABLE `dep_tbl`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `itemstatus_tbl`
--
ALTER TABLE `itemstatus_tbl`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `sample_db`
--
ALTER TABLE `sample_db`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=33;

--
-- AUTO_INCREMENT for table `try_tbl`
--
ALTER TABLE `try_tbl`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `user_tbl`
--
ALTER TABLE `user_tbl`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

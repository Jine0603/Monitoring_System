-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Oct 13, 2023 at 10:55 AM
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
(1, 'Super Admin', '1', '2023-10-04 09:52:08'),
(2, 'FMC', '1', '2023-10-09 08:04:41'),
(3, 'MSC', '1', '2023-10-09 16:40:28'),
(4, 'MBI', '1', '2023-10-09 16:40:28'),
(5, 'EVERFIRST', '1', '2023-10-09 16:41:07'),
(6, 'Viewing', '1', '2023-10-09 16:41:47');

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
(2, 'Multi-Line Structure Corp.'),
(3, 'Multi-Line Building System,Inc.'),
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
(1, '1', 'CMG'),
(2, '1', 'ADVERTISING'),
(3, '1', 'IT'),
(4, '1', 'HR'),
(5, '1', 'TREASURY'),
(6, '1', 'CNC'),
(7, '1', 'ACCOUNTING'),
(8, '1', 'WAREHOUSE'),
(9, '1', 'FINANCE'),
(10, '1', 'MARKETING'),
(11, '1', 'FAAP'),
(12, '1', 'ADMINISTRATION'),
(13, '1', 'AUDIT'),
(14, '1', 'PURCHASING'),
(15, '2', 'ENGINEERING'),
(16, '2', 'PID'),
(17, '2', 'ACCOUNTING'),
(18, '2', 'SALES'),
(19, '2', 'SALES-NORTH'),
(20, '2', 'SALES-SOUTH'),
(21, '2', 'WAREHOUSE/CALDERON'),
(22, '2', 'WAREHOUSE/BAESA'),
(23, '2', 'TREASURY'),
(24, '2', 'CDO'),
(25, '2', 'DDO'),
(26, '2', 'ADMINISTRATION'),
(27, '2', 'CMG'),
(28, '2', 'WAREHOUSE'),
(29, '2', 'CNC'),
(30, '2', 'WORLDCRAFT'),
(31, '3', 'ENGINEERING'),
(32, '3', 'PID'),
(33, '3', 'SALES'),
(34, '3', 'TSG'),
(35, '3', 'ACCOUNTING'),
(36, '3', 'ADMINISTRATION'),
(37, '3', 'CMG'),
(38, '3', 'CNC'),
(39, '3', 'PAYROLL'),
(40, '3', 'PID'),
(41, '3', 'SERVICE'),
(42, '4', 'PAYROLL'),
(43, '4', 'COLLECTION'),
(44, '4', 'OPERATIONS'),
(45, '4', 'ACCOUNTING'),
(46, '4', 'TREASURY'),
(47, '4', 'MARKETING'),
(48, '4', 'AUDIT'),
(49, '4', 'ADMINISTRATION'),
(50, NULL, NULL),
(51, '4', 'IT'),
(52, '4', 'COLLECTION'),
(53, '4', 'VERIFICATION'),
(54, '4', 'APPROVING'),
(55, '4', 'TRAINING');

-- --------------------------------------------------------

--
-- Table structure for table `employee_tbl`
--

CREATE TABLE `employee_tbl` (
  `id` int(11) NOT NULL,
  `employeeid` varchar(255) CHARACTER SET latin1 DEFAULT NULL,
  `firstname` varchar(255) CHARACTER SET latin1 DEFAULT NULL,
  `lastname` varchar(255) CHARACTER SET latin1 DEFAULT NULL,
  `datebirth` date DEFAULT NULL,
  `phone` varchar(255) CHARACTER SET latin1 DEFAULT NULL,
  `username` varchar(255) CHARACTER SET latin1 DEFAULT NULL,
  `password` varchar(255) CHARACTER SET latin1 DEFAULT NULL,
  `companyid` varchar(200) CHARACTER SET latin1 DEFAULT NULL,
  `departmentid` varchar(200) CHARACTER SET latin1 DEFAULT NULL,
  `positionid` varchar(255) DEFAULT NULL,
  `usertype` varchar(255) CHARACTER SET latin1 DEFAULT NULL,
  `status` varchar(50) CHARACTER SET latin1 DEFAULT '1',
  `datecreated` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `employee_tbl`
--

INSERT INTO `employee_tbl` (`id`, `employeeid`, `firstname`, `lastname`, `datebirth`, `phone`, `username`, `password`, `companyid`, `departmentid`, `positionid`, `usertype`, `status`, `datecreated`) VALUES
(17, '6544564', 'sadsad', 'eryryrty', '2023-10-09', '09854859826', 'ana', '123', '1', '3', '9', '6', '1', '2023-10-09 10:16:00'),
(18, '002', 'Kimmy', 'Sanford', '2023-10-13', '09854859826', 'kimmy', '123', '1', '7', '28', '2', '1', '2023-10-13 02:45:00');

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
-- Table structure for table `item_tbl`
--

CREATE TABLE `item_tbl` (
  `id` int(11) NOT NULL,
  `assetid` varchar(255) CHARACTER SET latin1 DEFAULT NULL,
  `assetmodel` varchar(255) CHARACTER SET latin1 DEFAULT NULL,
  `file_name` varchar(255) CHARACTER SET latin1 DEFAULT NULL,
  `assetname` varchar(255) CHARACTER SET latin1 DEFAULT NULL,
  `companyid` varchar(255) CHARACTER SET latin1 DEFAULT NULL,
  `categoriesid` varchar(255) CHARACTER SET latin1 DEFAULT NULL,
  `departmentid` varchar(255) CHARACTER SET latin1 DEFAULT NULL,
  `date_purchase` date DEFAULT NULL,
  `assetstatus` varchar(255) CHARACTER SET latin1 DEFAULT NULL,
  `assignemployee` varchar(255) CHARACTER SET latin1 DEFAULT NULL,
  `quantity` int(200) DEFAULT NULL,
  `status` varchar(50) CHARACTER SET latin1 DEFAULT '1',
  `date_created` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `item_tbl`
--

INSERT INTO `item_tbl` (`id`, `assetid`, `assetmodel`, `file_name`, `assetname`, `companyid`, `categoriesid`, `departmentid`, `date_purchase`, `assetstatus`, `assignemployee`, `quantity`, `status`, `date_created`) VALUES
(1, '02-1293414900', 'ava', '3558_6505040_sd.jpg', 'ASUS', '1', '2', '1', '2023-10-01', '1', NULL, 1, '1', '2023-10-09 11:50:59'),
(2, '02-1293414901', 'ava', '3558_6505040_sd.jpg', 'ASUS', '1', '2', '1', '2023-10-01', '1', NULL, 1, '1', '2023-10-09 11:50:59');

-- --------------------------------------------------------

--
-- Table structure for table `position_tbl`
--

CREATE TABLE `position_tbl` (
  `id` int(11) NOT NULL,
  `companyid` varchar(255) DEFAULT NULL,
  `departmentid` varchar(255) DEFAULT NULL,
  `position` varchar(250) DEFAULT NULL,
  `status` varchar(50) DEFAULT '1',
  `datecreated` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `position_tbl`
--

INSERT INTO `position_tbl` (`id`, `companyid`, `departmentid`, `position`, `status`, `datecreated`) VALUES
(1, '1', '1', 'CMG MANAGER', '1', '2023-10-10 07:41:00'),
(2, '1', '2', 'ADVERTISING ASSISTANT', '1', '2023-10-10 07:46:00'),
(3, '1', '2', 'ADVERTISING SUPERVISOR', '1', '2023-10-10 07:46:00'),
(4, '1', '2', 'ONLINE MARKETING ASSISTANT', '1', '2023-10-10 07:46:00'),
(5, '1', '2', 'WEB DEVELOPER', '1', '2023-10-10 07:46:00'),
(6, '1', '2', 'ADVERTISING MANAGER', '1', '2023-10-10 07:46:00'),
(7, '1', '3', 'GPS TECHNICIAN', '1', '2023-10-10 07:46:00'),
(8, '1', '3', 'GPS TRACKING STAFF', '1', '2023-10-10 07:46:00'),
(9, '1', '3', 'IT MANAGER', '1', '2023-10-10 07:46:00'),
(10, '1', '3', 'IT TECHNICIAN', '1', '2023-10-10 08:01:00'),
(11, '1', '3', 'JUNIOR SYSTEMS PROGRAMMER', '1', '2023-10-10 08:01:00'),
(12, '1', '3', 'SYSTEMS PROGRAMMER', '1', '2023-10-10 08:01:00'),
(13, '1', '3', 'SYSTEMS PROGRAMMER SUPERVISOR', '1', '2023-10-10 08:01:00'),
(14, '1', '3', 'SYSTEMS SUPPORTS STAFF', '1', '2023-10-10 08:01:00'),
(15, '1', '4', 'HR ASSISTANT', '1', '2023-10-10 08:02:00'),
(16, '1', '4', 'HR STAFF(RIDER)', '1', '2023-10-10 08:02:00'),
(17, '1', '4', 'HR SUPERVISOR', '1', '2023-10-10 08:43:00'),
(18, '1', '4', 'MANAGER FOR ADMINISTRATION', '1', '2023-10-10 08:43:00'),
(19, '1', '5', 'ASSISTANT TO THE TREASURY SUPERVISOR', '1', '2023-10-10 08:43:00'),
(20, '1', '5', 'BANK RUNNER', '1', '2023-10-10 08:43:00'),
(21, '1', '5', 'TREASURY ASSISTANT', '1', '2023-10-10 08:43:00'),
(22, '1', '5', 'TREASURY HEAD', '1', '2023-10-10 08:46:00'),
(23, '1', '5', 'TREASURY SUPERVISOR', '1', '2023-10-10 08:46:00'),
(24, '1', '6', 'C & C MANAGER', '1', '2023-10-10 08:46:00'),
(25, '1', '6', 'MESSENGER', '1', '2023-10-10 08:46:00'),
(26, '1', '7', 'ACCOUNTING ASSISTANT', '1', '2023-10-10 08:47:00'),
(27, '1', '7', 'CHIEF ACCOUNTANT', '1', '2023-10-10 08:47:00'),
(28, '1', '7', 'GENERAL ACCOUNTANT', '1', '2023-10-10 08:47:00'),
(29, '1', '7', 'OFFICE STAFF', '1', '2023-10-10 15:06:17'),
(30, '1', '8', 'Assistant Mechanic', '1', '2023-10-10 10:14:00'),
(31, '1', '8', 'Logistics Assistant', '1', '2023-10-10 10:20:00'),
(32, '1', '8', 'Reach Truck Operator', '1', '2023-10-10 10:21:00'),
(33, '1', '8', 'Warehouse Driver', '1', '2023-10-10 10:25:00'),
(34, '1', '8', 'Warehouse Helper', '1', '2023-10-10 10:26:00'),
(35, '1', '8', 'Warehouse Manager', '1', '2023-10-10 10:27:00'),
(36, '1', '8', 'Logistics Supervisor', '1', '2023-10-10 10:27:00'),
(37, '1', '9', 'AVP for Finance', '1', '2023-10-10 10:30:00'),
(38, '1', '9', 'Compliance Officer', '1', '2023-10-10 10:30:00'),
(39, '1', '9', 'Financial Analysis and Planning Manager', '1', '2023-10-10 10:31:00'),
(40, '1', '9', 'Financial Analyst', '1', '2023-10-10 10:31:00'),
(41, '1', '9', 'Finance Manager', '1', '2023-10-10 10:31:00'),
(42, '1', '10', 'Digital Marketing Manager', '1', '2023-10-10 10:33:00');

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
(24, '02-162545094', 'dsfgdsg', '2258_55261_ivoryboucl_01.jpg', 'Niko Office Table', '1', '2', '1', '2023-10-01', '1', NULL, '1', '2023-10-05 13:03:08', 1),
(51, '04-180036379', '45ws', '7681_6505040_sd.jpg', 'Niko Office Table', '1', '4', '1', '2023-10-08', '1', NULL, '1', '2023-10-06 15:20:25', 1),
(52, '04-180036379', '45ws', '7681_6505040_sd.jpg', 'Niko Office Table', '1', '4', '1', '2023-10-08', '1', NULL, '1', '2023-10-06 15:20:25', 1),
(53, '04-151790581', 'dsfgdsg', '5024_140622072805-160720123421-01.jpeg', 'Niko Office Table', '1', '4', '1', '2023-10-11', '1', NULL, '1', '2023-10-06 15:26:38', 1),
(54, '04-151790581', 'dsfgdsg', '5024_140622072805-160720123421-01.jpeg', 'Niko Office Table', '1', '4', '1', '2023-10-11', '1', NULL, '1', '2023-10-06 15:26:38', 1),
(55, '06-1334528100', 'ava', '898_6505040_sd.jpg', 'HP', '2', '6', '2', '2023-10-01', '1', NULL, '1', '2023-10-06 16:42:27', 1),
(56, '06-1334528101', 'ava', '898_6505040_sd.jpg', 'HP', '2', '6', '2', '2023-10-01', '1', NULL, '1', '2023-10-06 16:42:27', 1),
(57, '09-1810142900', 'adfa', '', 'Boucle Swivel Chair', '1', '9', '1', '2023-10-08', '1', NULL, '1', '2023-10-06 16:45:20', 1),
(58, '09-1810142901', 'adfa', '', 'Boucle Swivel Chair', '1', '9', '1', '2023-10-08', '1', NULL, '1', '2023-10-06 16:45:20', 1),
(59, '09-1810142902', 'adfa', '', 'Boucle Swivel Chair', '1', '9', '1', '2023-10-08', '1', NULL, '1', '2023-10-06 16:45:20', 1),
(60, '03-1349984480', 'adwq', '2380_55261_ivoryboucl_01.jpg', 'Niko Office Table', '1', '3', '1', '2023-10-09', '1', NULL, '1', '2023-10-06 16:47:38', 1),
(61, '03-1349984481', 'adwq', '2380_55261_ivoryboucl_01.jpg', 'Niko Office Table', '1', '3', '1', '2023-10-09', '1', NULL, '1', '2023-10-06 16:47:38', 1),
(62, '03-1349984482', 'adwq', '2380_55261_ivoryboucl_01.jpg', 'Niko Office Table', '1', '3', '1', '2023-10-09', '1', NULL, '1', '2023-10-06 16:47:38', 1),
(63, '03-1349984483', 'adwq', '2380_55261_ivoryboucl_01.jpg', 'Niko Office Table', '1', '3', '1', '2023-10-09', '1', NULL, '1', '2023-10-06 16:47:38', 1);

-- --------------------------------------------------------

--
-- Table structure for table `sam_tbl`
--

CREATE TABLE `sam_tbl` (
  `id` int(11) NOT NULL,
  `companyid` varchar(50) DEFAULT NULL,
  `departmentid` varchar(50) DEFAULT NULL,
  `position` varchar(255) DEFAULT NULL,
  `datecreated` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `sam_tbl`
--

INSERT INTO `sam_tbl` (`id`, `companyid`, `departmentid`, `position`, `datecreated`) VALUES
(25, '1', '1', 'CMG MANAGER', '2023-10-10 09:58:00');

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
(1, 'jine00', '123456', '1', '1', '2023-09-04 13:58:11'),
(2, 'jine', '123', '2', '1', '2023-10-09 08:11:45');

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
-- Indexes for table `employee_tbl`
--
ALTER TABLE `employee_tbl`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `itemstatus_tbl`
--
ALTER TABLE `itemstatus_tbl`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `item_tbl`
--
ALTER TABLE `item_tbl`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `position_tbl`
--
ALTER TABLE `position_tbl`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `sample_db`
--
ALTER TABLE `sample_db`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `sam_tbl`
--
ALTER TABLE `sam_tbl`
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
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

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
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=56;

--
-- AUTO_INCREMENT for table `employee_tbl`
--
ALTER TABLE `employee_tbl`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT for table `itemstatus_tbl`
--
ALTER TABLE `itemstatus_tbl`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `item_tbl`
--
ALTER TABLE `item_tbl`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `position_tbl`
--
ALTER TABLE `position_tbl`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=43;

--
-- AUTO_INCREMENT for table `sample_db`
--
ALTER TABLE `sample_db`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=64;

--
-- AUTO_INCREMENT for table `sam_tbl`
--
ALTER TABLE `sam_tbl`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;

--
-- AUTO_INCREMENT for table `try_tbl`
--
ALTER TABLE `try_tbl`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `user_tbl`
--
ALTER TABLE `user_tbl`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

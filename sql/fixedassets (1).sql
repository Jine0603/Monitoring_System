-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 17, 2023 at 04:57 AM
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
-- Table structure for table `accrole_tbl`
--

CREATE TABLE `accrole_tbl` (
  `id` int(11) NOT NULL,
  `employeeid` varchar(255) DEFAULT NULL,
  `usertype` varchar(255) DEFAULT NULL,
  `status` varchar(50) DEFAULT '1',
  `datecreated` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `accrole_tbl`
--

INSERT INTO `accrole_tbl` (`id`, `employeeid`, `usertype`, `status`, `datecreated`) VALUES
(1, '2', '1', '1', '2023-11-08 00:08:43'),
(2, '3', '2', '1', '2023-11-03 09:01:37'),
(3, '4', '2', '1', '2023-11-14 22:26:00'),
(4, '5', '2', '1', '2023-11-14 23:53:00');

-- --------------------------------------------------------

--
-- Table structure for table `assigned_tbl`
--

CREATE TABLE `assigned_tbl` (
  `id` int(11) NOT NULL,
  `acc_id` varchar(255) CHARACTER SET latin1 DEFAULT NULL,
  `item_id` varchar(255) CHARACTER SET latin1 DEFAULT NULL,
  `cateid` varchar(255) CHARACTER SET latin1 DEFAULT NULL,
  `employee_assigned` varchar(255) CHARACTER SET latin1 DEFAULT NULL,
  `companyid` varchar(255) CHARACTER SET latin1 DEFAULT NULL,
  `locationid` varchar(255) CHARACTER SET latin1 DEFAULT NULL,
  `departmentid` varchar(255) CHARACTER SET latin1 DEFAULT NULL,
  `positionid` varchar(255) CHARACTER SET latin1 DEFAULT NULL,
  `status` varchar(50) CHARACTER SET latin1 DEFAULT '1',
  `assigned_date` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `assigned_tbl`
--

INSERT INTO `assigned_tbl` (`id`, `acc_id`, `item_id`, `cateid`, `employee_assigned`, `companyid`, `locationid`, `departmentid`, `positionid`, `status`, `assigned_date`) VALUES
(67, '3', '94', 'CE', '3', '1', 'default', '3', '2', '0', '2023-11-16 03:47:58'),
(68, '3', '99', 'FF', '2', '1', 'default', '4', '12', '1', '2023-11-16 03:46:34'),
(69, '3', '100', 'FF', 'default', '1', '4', 'default', 'Select Department', '1', '2023-11-16 03:47:07'),
(70, '3', '94', 'CE', 'default', '1', '1', 'default', 'Select Department', '0', '2023-11-16 03:49:05');

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
(4, 'EverFirst Loans Corp.'),
(5, 'Filipinas Multi-Line Corp.(CEBU)'),
(6, 'Multi-Line Structure Corp.(CEBU)'),
(7, 'Multi-Line Building System,Inc.(CEBU)'),
(8, 'Filipinas Multi-Line Corp.(DAVAO)'),
(9, 'Multi-Line Structure Corp.(DAVAO)'),
(10, 'Multi-Line Building System,Inc.(DAVAO)');

-- --------------------------------------------------------

--
-- Table structure for table `dep_tbl`
--

CREATE TABLE `dep_tbl` (
  `id` int(11) NOT NULL,
  `companyid` varchar(255) CHARACTER SET latin1 DEFAULT NULL,
  `department` varchar(255) CHARACTER SET latin1 DEFAULT NULL,
  `status` varchar(50) CHARACTER SET latin1 DEFAULT '1',
  `datecreated` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `dep_tbl`
--

INSERT INTO `dep_tbl` (`id`, `companyid`, `department`, `status`, `datecreated`) VALUES
(1, '1', 'General', '0', '2023-11-08 00:09:38'),
(2, '1', 'CMG', '1', '2023-10-24 08:51:13'),
(3, '1', 'ADVERTISING', '1', '2023-10-24 00:51:25'),
(4, '1', 'IT', '1', '2023-10-24 00:51:25'),
(5, '1', 'HR', '1', '2023-10-24 00:51:25'),
(6, '1', 'TREASURY', '1', '2023-10-24 00:51:25'),
(7, '1', 'CNC', '1', '2023-10-24 00:51:25'),
(8, '1', 'ACCOUNTING', '1', '2023-10-24 00:51:25'),
(9, '1', 'WAREHOUSE', '1', '2023-10-24 00:51:25'),
(10, '1', 'FINANCE', '1', '2023-10-24 00:51:25'),
(11, '1', 'MARKETING', '1', '2023-10-24 00:51:25'),
(12, '1', 'FAAP', '1', '2023-10-24 00:51:25'),
(13, '1', 'ADMINISTRATION', '1', '2023-10-24 00:51:25'),
(14, '1', 'AUDIT', '1', '2023-10-24 00:51:25'),
(15, '1', 'PURCHASING', '1', '2023-10-24 00:51:25'),
(16, '2', 'General', '1', '2023-10-24 00:52:15'),
(17, '2', 'ENGINEERING', '1', '2023-10-24 00:54:03'),
(18, '2', 'PID', '1', '2023-10-24 00:54:03'),
(19, '2', 'ACCOUNTING', '1', '2023-10-24 00:54:03'),
(20, '2', 'SALES', '1', '2023-10-24 00:54:03'),
(21, '2', 'SALES-NORTH', '1', '2023-10-24 00:54:03'),
(22, '2', 'SALES-SOUTH', '1', '2023-10-24 00:54:03'),
(23, '2', 'WAREHOUSE/CALDERON', '1', '2023-10-24 00:54:03'),
(24, '2', 'WAREHOUSE/BAESA', '1', '2023-10-24 00:54:03'),
(25, '2', 'TREASURY', '1', '2023-10-24 00:54:03'),
(26, '2', 'CDO', '1', '2023-10-24 00:54:03'),
(27, '2', 'DDO', '1', '2023-10-24 00:54:03'),
(28, '2', 'ADMINISTRATION', '1', '2023-10-24 00:54:03'),
(29, '2', 'CMG', '1', '2023-10-24 00:54:03'),
(30, '2', 'WAREHOUSE', '1', '2023-10-24 00:54:03'),
(31, '2', 'CNC', '1', '2023-10-24 00:54:03'),
(32, '2', 'WORLDCRAFT', '1', '2023-10-24 00:54:03'),
(33, '3', 'General', '1', '2023-10-24 00:54:34'),
(34, '3', 'ENGINEERING', '1', '2023-10-24 00:55:54'),
(35, '3', 'PID', '1', '2023-10-24 00:55:54'),
(36, '3', 'SALES', '1', '2023-10-24 00:55:54'),
(37, '3', 'TSG', '1', '2023-10-24 00:55:54'),
(38, '3', 'ACCOUNTING', '1', '2023-10-24 00:55:54'),
(39, '3', 'ADMINISTRATION', '1', '2023-10-24 00:55:54'),
(40, '3', 'CMG', '1', '2023-10-24 00:55:54'),
(41, '3', 'CNC', '1', '2023-10-24 00:55:54'),
(42, '3', 'PAYROLL', '1', '2023-10-24 00:55:54'),
(43, '3', 'PID', '1', '2023-10-24 00:55:54'),
(44, '3', 'SERVICE', '1', '2023-10-24 00:55:54'),
(45, '4', 'General', '1', '2023-10-24 00:56:17'),
(46, '4', 'PAYROLL', '1', '2023-10-24 00:57:48'),
(47, '4', 'COLLECTION', '1', '2023-10-24 00:57:48'),
(48, '4', 'OPERATIONS', '1', '2023-10-24 00:57:48'),
(49, '4', 'ACCOUNTING', '1', '2023-10-24 00:57:48'),
(50, '4', 'TREASURY', '1', '2023-10-24 00:57:48'),
(51, '4', 'MARKETING', '1', '2023-10-24 00:57:48'),
(52, '4', 'AUDIT', '1', '2023-10-24 00:57:48'),
(53, '4', 'ADMINISTRATION', '1', '2023-10-24 00:57:48'),
(54, '4', 'IT', '1', '2023-10-24 00:57:48'),
(55, '4', 'COLLECTION', '1', '2023-10-24 00:57:48'),
(56, '4', 'VERIFICATION', '1', '2023-10-24 00:57:48'),
(57, '4', 'APPROVING', '1', '2023-10-24 00:57:48'),
(58, '4', 'TRAINING', '1', '2023-10-24 00:57:48'),
(59, '1', 'General', '1', '2023-10-24 02:36:53'),
(60, 'default', '', '1', '2023-10-24 07:25:48'),
(61, '2', 'GENERAL', '1', '2023-10-24 08:38:16'),
(62, 'default', '', '0', '2023-11-15 05:27:38'),
(63, '1', 'GENERAL', '1', '2023-11-15 07:16:56'),
(64, '5', 'GENERAL', '0', '2023-11-15 05:27:33');

-- --------------------------------------------------------

--
-- Table structure for table `employee_tbl`
--

CREATE TABLE `employee_tbl` (
  `id` int(11) NOT NULL,
  `employeeid` varchar(255) CHARACTER SET latin1 DEFAULT NULL,
  `firstname` varchar(255) CHARACTER SET latin1 DEFAULT NULL,
  `lastname` varchar(255) CHARACTER SET latin1 DEFAULT NULL,
  `username` varchar(255) CHARACTER SET latin1 DEFAULT NULL,
  `password` varchar(255) CHARACTER SET latin1 DEFAULT NULL,
  `companyid` varchar(255) CHARACTER SET latin1 DEFAULT NULL,
  `departmentid` varchar(255) CHARACTER SET latin1 DEFAULT NULL,
  `positionid` varchar(255) CHARACTER SET latin1 DEFAULT NULL,
  `status` varchar(50) DEFAULT '1',
  `datecreated` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `employee_tbl`
--

INSERT INTO `employee_tbl` (`id`, `employeeid`, `firstname`, `lastname`, `username`, `password`, `companyid`, `departmentid`, `positionid`, `status`, `datecreated`) VALUES
(1, '000', 'GENERAL', NULL, NULL, NULL, '1', NULL, NULL, '1', '2023-11-03 07:35:40'),
(2, '361', 'Reygine', 'Ellorico', 'jine', '060300', '1', '4', '12', '1', '2023-11-03 07:32:09'),
(3, '001', 'Louice', 'Sanford', 'san', '123', '1', '3', '5', '1', '2023-11-08 00:14:43'),
(4, '123', 'sadsad', 'dsadsa', 'ako', '123', '1', '2', '1', '0', '2023-11-15 05:26:35'),
(5, '001', 'Louice', 'O', 'ako', '123', '1', '4', '12', '1', '2023-11-14 23:53:00');

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
  `file_name` varchar(255) CHARACTER SET latin1 DEFAULT NULL,
  `assetname` varchar(255) CHARACTER SET latin1 DEFAULT NULL,
  `categoriesid` varchar(255) CHARACTER SET latin1 DEFAULT NULL,
  `companyid` varchar(255) CHARACTER SET latin1 DEFAULT NULL,
  `date_purchase` date DEFAULT NULL,
  `locationid` varchar(255) CHARACTER SET latin1 DEFAULT NULL,
  `assigned_status` varchar(255) CHARACTER SET latin1 DEFAULT '0',
  `quantity` int(255) DEFAULT 1,
  `status` varchar(50) CHARACTER SET latin1 DEFAULT '1',
  `date_created` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `update_date` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `item_tbl`
--

INSERT INTO `item_tbl` (`id`, `assetid`, `file_name`, `assetname`, `categoriesid`, `companyid`, `date_purchase`, `locationid`, `assigned_status`, `quantity`, `status`, `date_created`, `update_date`) VALUES
(94, '0001', '1619_redragon-predator.jpg', 'aaa', 'CE', '1', '2023-10-29', '2', '0', 1, '1', '2023-11-16 03:49:05', NULL),
(95, '0001', '6973_800px-Set_of_fourteen_side_chairs_MET_DP110780.jpg', 'acaaaa', 'CE', '1', '2023-10-29', '3', '0', 1, '1', '2023-11-16 03:44:11', NULL),
(96, '0002', '7862_800px-Set_of_fourteen_side_chairs_MET_DP110780.jpg', 'trest', 'FF', '1', '2023-10-29', '1', '0', 1, '1', '2023-11-16 00:22:26', NULL),
(97, '0003', '7862_800px-Set_of_fourteen_side_chairs_MET_DP110780.jpg', 'trest', 'FF', '1', '2023-10-29', '1', '0', 1, '0', '2023-11-15 05:34:12', NULL),
(98, '0004', '6979_800px-Set_of_fourteen_side_chairs_MET_DP110780.jpg', 'Chair', 'FF', '1', '2023-10-29', '1', '0', 1, '1', '2023-11-16 03:39:00', NULL),
(99, '0005', '249_55261_ivoryboucl_01.jpg', 'chair2', 'FF', '1', '2023-10-29', '2', '1', 1, '1', '2023-11-16 03:46:34', NULL),
(100, '0006', '249_55261_ivoryboucl_01.jpg', 'chair2', 'FF', '1', '2023-10-29', '2', '1', 1, '1', '2023-11-16 03:47:07', NULL),
(101, '0007', '249_55261_ivoryboucl_01.jpg', 'chair2', 'FF', '1', '2023-10-29', '2', '0', 1, '1', '2023-11-16 03:40:18', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `location_assigned`
--

CREATE TABLE `location_assigned` (
  `id` int(11) NOT NULL,
  `location` varchar(255) CHARACTER SET latin1 DEFAULT NULL,
  `status` varchar(50) CHARACTER SET latin1 DEFAULT '1',
  `datecreated` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `location_assigned`
--

INSERT INTO `location_assigned` (`id`, `location`, `status`, `datecreated`) VALUES
(1, 'Baesa Warehouse', '1', '2023-11-15 03:03:59'),
(2, 'Cebu Office', '1', '2023-11-15 03:03:59'),
(3, 'TRAGG', '1', '2023-11-15 03:04:51'),
(4, 'MINDANAO WAREHOUSE', '1', '2023-11-15 03:04:51'),
(5, 'Royal Pines', '1', '2023-11-15 03:05:21'),
(6, 'TWIN OAKS', '1', '2023-11-15 03:05:21'),
(7, 'Viera Residence', '1', '2023-11-15 03:06:15'),
(8, 'BLUE ROOM/ ADMIN', '1', '2023-11-15 03:06:15');

-- --------------------------------------------------------

--
-- Table structure for table `location_tbl`
--

CREATE TABLE `location_tbl` (
  `id` int(11) NOT NULL,
  `location` varchar(255) DEFAULT NULL,
  `status` varchar(50) DEFAULT '1',
  `datecreated` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `location_tbl`
--

INSERT INTO `location_tbl` (`id`, `location`, `status`, `datecreated`) VALUES
(1, 'Imuss', '1', '2023-10-24 08:55:38'),
(2, 'Baysa', '1', '2023-11-07 00:17:10'),
(3, 'Cebu', '1', '2023-11-07 00:17:28'),
(4, 'Davao', '1', '2023-11-07 00:17:43'),
(9, 'test', '0', '2023-11-15 05:31:29');

-- --------------------------------------------------------

--
-- Table structure for table `multfile_tbl`
--

CREATE TABLE `multfile_tbl` (
  `id` int(11) NOT NULL,
  `employeeid` varchar(255) CHARACTER SET latin1 DEFAULT NULL,
  `itemid` varchar(255) CHARACTER SET latin1 DEFAULT NULL,
  `file` varchar(255) CHARACTER SET latin1 DEFAULT NULL,
  `status` varchar(50) CHARACTER SET latin1 DEFAULT '1',
  `datecreated` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `multfile_tbl`
--

INSERT INTO `multfile_tbl` (`id`, `employeeid`, `itemid`, `file`, `status`, `datecreated`) VALUES
(89, '3', '94', 'Fixed Asset Monitoring System with Barcode_4555_1699941233_1.pdf', '0', '2023-11-16 01:01:19'),
(90, '3', '94', 'SCOPE OF WORK FIXED ASSET MONITORING SYSTEM WITH BARCODE_9242_1699941233_1.pdf', '1', '2023-11-15 00:53:18'),
(91, '3', '95', 'Fixed Asset Monitoring System with Barcode_79_1699941345_1.pdf', '0', '2023-11-16 03:43:45'),
(92, '3', '94', 'Fixed Asset Monitoring System with Barcode_9737_1699949569_.pdf', '1', '2023-11-14 08:12:49'),
(93, '3', '95', 'Fixed Asset Monitoring System with Barcode_6742_1699949686_.pdf', '1', '2023-11-15 01:20:10'),
(94, '3', '95', 'SCOPE OF WORK FIXED ASSET MONITORING SYSTEM WITH BARCODE_2770_1700009618_.pdf', '1', '2023-11-15 01:20:14'),
(95, '3', '94', 'SCOPE OF WORK FIXED ASSET MONITORING SYSTEM WITH BARCODE_4611_1700009792_.pdf', '1', '2023-11-15 00:56:32'),
(96, '3', '94', 'SCOPE OF WORK FIXED ASSET MONITORING SYSTEM WITH BARCODE_6032_1700009830_.pdf', '1', '2023-11-15 00:57:10'),
(97, '3', '96', 'Fixed Asset Monitoring System with Barcode_7442_1700026374_1.pdf', '1', '2023-11-15 05:32:54'),
(98, '3', '97', 'Fixed Asset Monitoring System with Barcode_7442_1700026374_1.pdf', '1', '2023-11-15 05:32:54'),
(99, '3', '96', 'SCOPE OF WORK FIXED ASSET MONITORING SYSTEM WITH BARCODE_6829_1700026374_1.pdf', '1', '2023-11-15 05:32:54'),
(100, '3', '97', 'SCOPE OF WORK FIXED ASSET MONITORING SYSTEM WITH BARCODE_6829_1700026374_1.pdf', '1', '2023-11-15 05:32:54'),
(101, '3', '98', 'Fixed Asset Monitoring System with Barcode_4247_1700105940_1.pdf', '1', '2023-11-16 03:39:00'),
(102, '3', '98', 'SCOPE OF WORK FIXED ASSET MONITORING SYSTEM WITH BARCODE_1292_1700105940_1.pdf', '1', '2023-11-16 03:39:00'),
(103, '3', '99', 'Fixed Asset Monitoring System with Barcode_3701_1700106018_1.pdf', '1', '2023-11-16 03:40:18'),
(104, '3', '100', 'Fixed Asset Monitoring System with Barcode_3701_1700106018_1.pdf', '1', '2023-11-16 03:40:18'),
(105, '3', '101', 'Fixed Asset Monitoring System with Barcode_3701_1700106018_1.pdf', '1', '2023-11-16 03:40:18'),
(106, '3', '99', 'SCOPE OF WORK FIXED ASSET MONITORING SYSTEM WITH BARCODE_1869_1700106018_1.pdf', '1', '2023-11-16 03:40:18'),
(107, '3', '100', 'SCOPE OF WORK FIXED ASSET MONITORING SYSTEM WITH BARCODE_1869_1700106018_1.pdf', '1', '2023-11-16 03:40:18'),
(108, '3', '101', 'SCOPE OF WORK FIXED ASSET MONITORING SYSTEM WITH BARCODE_1869_1700106018_1.pdf', '1', '2023-11-16 03:40:18');

-- --------------------------------------------------------

--
-- Table structure for table `position_tbl`
--

CREATE TABLE `position_tbl` (
  `id` int(11) NOT NULL,
  `companyid` varchar(255) CHARACTER SET latin1 DEFAULT NULL,
  `departmentid` varchar(255) CHARACTER SET latin1 DEFAULT NULL,
  `position` varchar(255) CHARACTER SET latin1 DEFAULT NULL,
  `status` varchar(50) CHARACTER SET latin1 DEFAULT '1',
  `datecreated` datetime NOT NULL DEFAULT '0000-00-00 00:00:00' ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `position_tbl`
--

INSERT INTO `position_tbl` (`id`, `companyid`, `departmentid`, `position`, `status`, `datecreated`) VALUES
(1, '1', '2', 'CMG MANAGER', '1', '2023-10-27 13:51:12'),
(2, '1', '3', 'ADVERTISING ASSISTANT', '1', '2023-10-27 13:52:34'),
(3, '1', '3', 'ADVERTISING SUPERVISOR', '1', '2023-10-27 13:52:34'),
(4, '1', '3', 'ONLINE MARKETING ASSISTANT', '1', '2023-10-27 13:52:34'),
(5, '1', '3', 'WEB DEVELOPER', '1', '2023-10-27 13:52:34'),
(6, '1', '3', 'ADVERTISING MANAGER', '1', '2023-10-27 13:52:34'),
(7, '1', '4', 'GPS TECHNICIAN', '1', '2023-10-27 13:52:34'),
(8, '1', '4', 'GPS TRACKING STAFF', '1', '2023-10-27 13:52:34'),
(9, '1', '4', 'IT MANAGER', '1', '2023-10-27 13:52:34'),
(10, '1', '4', 'IT TECHNICIAN', '1', '2023-10-27 13:52:34'),
(11, '1', '4', 'JUNIOR SYSTEMS PROGRAMMER', '1', '2023-10-27 13:52:34'),
(12, '1', '4', 'SYSTEMS PROGRAMMER', '1', '2023-10-27 13:52:34'),
(13, '1', '4', 'SYSTEMS PROGRAMMER SUPERVISOR', '1', '2023-10-27 13:52:34'),
(14, '1', '4', 'SYSTEMS SUPPORTS STAFF', '1', '2023-10-27 13:52:34'),
(15, '1', '1', 'test', '0', '2023-11-15 13:29:33');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `access_tbl`
--
ALTER TABLE `access_tbl`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `accrole_tbl`
--
ALTER TABLE `accrole_tbl`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `assigned_tbl`
--
ALTER TABLE `assigned_tbl`
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
-- Indexes for table `location_assigned`
--
ALTER TABLE `location_assigned`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `location_tbl`
--
ALTER TABLE `location_tbl`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `multfile_tbl`
--
ALTER TABLE `multfile_tbl`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `position_tbl`
--
ALTER TABLE `position_tbl`
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
-- AUTO_INCREMENT for table `accrole_tbl`
--
ALTER TABLE `accrole_tbl`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `assigned_tbl`
--
ALTER TABLE `assigned_tbl`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=71;

--
-- AUTO_INCREMENT for table `categ_tbl`
--
ALTER TABLE `categ_tbl`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `com_tbl`
--
ALTER TABLE `com_tbl`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `dep_tbl`
--
ALTER TABLE `dep_tbl`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=65;

--
-- AUTO_INCREMENT for table `employee_tbl`
--
ALTER TABLE `employee_tbl`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `itemstatus_tbl`
--
ALTER TABLE `itemstatus_tbl`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `item_tbl`
--
ALTER TABLE `item_tbl`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=102;

--
-- AUTO_INCREMENT for table `location_assigned`
--
ALTER TABLE `location_assigned`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `location_tbl`
--
ALTER TABLE `location_tbl`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `multfile_tbl`
--
ALTER TABLE `multfile_tbl`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=109;

--
-- AUTO_INCREMENT for table `position_tbl`
--
ALTER TABLE `position_tbl`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

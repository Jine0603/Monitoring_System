-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 10, 2023 at 10:20 AM
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
(2, '3', '2', '1', '2023-11-03 09:01:37');

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
  `departmentid` varchar(255) CHARACTER SET latin1 DEFAULT NULL,
  `positionid` varchar(255) CHARACTER SET latin1 DEFAULT NULL,
  `status` varchar(50) CHARACTER SET latin1 DEFAULT '1',
  `assigned_date` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `update_date` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `assigned_tbl`
--

INSERT INTO `assigned_tbl` (`id`, `acc_id`, `item_id`, `cateid`, `employee_assigned`, `companyid`, `departmentid`, `positionid`, `status`, `assigned_date`, `update_date`) VALUES
(42, '3', '19', 'OE', '3', '1', '2', '1', '1', '2023-11-09 00:27:16', NULL),
(43, '3', '76', 'CE', '2', '1', '3', '3', '1', '2023-11-10 07:51:36', NULL);

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
(62, 'default', '', '1', '2023-10-24 08:38:26'),
(63, '1', 'GENERAL', '1', '2023-10-24 08:50:41');

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
(3, '001', 'Louice', 'Sanford', 'san', '123', '1', '3', '5', '1', '2023-11-08 00:14:43');

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
  `date_created` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `item_tbl`
--

INSERT INTO `item_tbl` (`id`, `assetid`, `file_name`, `assetname`, `categoriesid`, `companyid`, `date_purchase`, `locationid`, `assigned_status`, `quantity`, `status`, `date_created`) VALUES
(76, '0001', '9228_55261_ivoryboucl_01.jpg', 's', 'CE', '1', '2023-10-29', '1', '0', 1, '1', '2023-11-10 07:07:34'),
(77, '0002', '9589_55261_ivoryboucl_01.jpg', 'sx', 'CE', '1', '2023-10-29', '2', '0', 1, '1', '2023-11-10 07:13:14'),
(78, '0003', '8948_55261_ivoryboucl_01.jpg', 'sx', 'CE', '1', '2023-10-29', '2', '0', 1, '1', '2023-11-10 07:15:56'),
(79, '0004', '319_140622072805-160720123421-01.jpeg', 's', 'CE', '1', '2023-10-29', '1', '0', 1, '1', '2023-11-10 07:16:18'),
(80, '0005', '7311_6505040_sd.jpg', 'e', 'CE', '1', '2023-10-29', '2', '0', 1, '1', '2023-11-10 07:28:41'),
(81, '0006', '575_140622072805-160720123421-01.jpeg', 'fv', 'CE', '1', '2023-10-29', '3', '0', 1, '1', '2023-11-10 07:32:10'),
(82, '0007', '5801_cb0030c2-a029-47dc-9f37-c2cbc940bef0.jpg', 'df', 'CE', '1', '2023-10-29', '1', '0', 1, '1', '2023-11-10 07:35:00'),
(83, '0008', '9708_202603-6-10PEI1.png', 'd', 'CE', '1', '2023-10-29', '2', '0', 1, '1', '2023-11-10 07:35:43'),
(84, '0001', '1291_6505040_sd.jpg', 'ssss', 'FF', '1', '2023-10-29', '2', '0', 1, '1', '2023-11-10 07:41:42'),
(85, '0001', '505_55261_ivoryboucl_01.jpg', 'fgdf', 'BI', '1', '2023-10-29', '2', '0', 1, '1', '2023-11-10 07:42:29'),
(86, '0002', '8105_55261_ivoryboucl_01.jpg', 'fgdf', 'BI', '1', '2023-10-29', '2', '0', 1, '1', '2023-11-10 07:42:35'),
(87, '0009', '5147_800px-Set_of_fourteen_side_chairs_MET_DP110780.jpg', 'asd', 'CE', '1', '2023-10-29', '1', '0', 1, '1', '2023-11-10 07:43:19'),
(88, '0002', '6229_800px-Set_of_fourteen_side_chairs_MET_DP110780.jpg', 'as', 'FF', '1', '2023-10-29', '1', '0', 1, '1', '2023-11-10 07:44:50'),
(89, '0010', '4682_redragon-predator.jpg', 'scs', 'CE', '1', '2023-10-29', '3', '0', 1, '1', '2023-11-10 07:54:22');

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
(4, 'Davao', '1', '2023-11-07 00:17:43');

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
(20, '3', '22', '{\"0\":\"Fixed Asset Monitoring System with Barcode_3476_1699512362_1.pdf\",\"1\":\"SCOPE OF WORK FIXED ASSET MONITORING SYSTEM WITH BARCODE_450_1699512362_1.pdf\"}', '1', '2023-11-09 06:46:02'),
(21, '3', '23', 'Fixed Asset Monitoring System with Barcode_2553_1699581540_1.pdf', '1', '2023-11-10 01:59:00'),
(22, '3', '23', 'SCOPE OF WORK FIXED ASSET MONITORING SYSTEM WITH BARCODE_9802_1699581540_1.pdf', '1', '2023-11-10 01:59:00'),
(23, '3', '24', 'Fixed Asset Monitoring System with Barcode_2258_1699582499_2.pdf', '1', '2023-11-10 02:14:59'),
(24, '3', '25', 'Fixed Asset Monitoring System with Barcode_2258_1699582499_2.pdf', '1', '2023-11-10 02:14:59'),
(25, '3', '26', 'Fixed Asset Monitoring System with Barcode_3379_1699583326_1.pdf', '1', '2023-11-10 02:28:46'),
(26, '3', '27', 'Fixed Asset Monitoring System with Barcode_9123_1699583522_1.pdf', '1', '2023-11-10 02:32:02'),
(27, '3', '28', 'Fixed Asset Monitoring System with Barcode_3075_1699583864_1.pdf', '1', '2023-11-10 02:37:44'),
(28, '3', '33', '800px-Set_of_fourteen_side_chairs_MET_DP110780.jpg', '1', '2023-11-10 03:18:26'),
(29, '3', '35', 'Fixed Asset Monitoring System with Barcode_6369_1699587041_1.pdf', '1', '2023-11-10 03:30:41'),
(30, '3', '36', 'Fixed Asset Monitoring System with Barcode_2478_1699587190_1.pdf', '1', '2023-11-10 03:33:10'),
(31, '3', '37', 'Fixed Asset Monitoring System with Barcode_1796_1699587266_1.pdf', '1', '2023-11-10 03:34:26'),
(32, '3', '38', 'Fixed Asset Monitoring System with Barcode_5447_1699587353_1.pdf', '1', '2023-11-10 03:35:53'),
(33, '3', '39', 'Fixed Asset Monitoring System with Barcode_2823_1699587465_1.pdf', '1', '2023-11-10 03:37:45'),
(34, '3', '40', 'Fixed Asset Monitoring System with Barcode.docx', '1', '2023-11-10 03:42:30'),
(35, '3', '41', 'Fixed Asset Monitoring System with Barcode_4350_1699589112_1.pdf', '1', '2023-11-10 04:05:12'),
(36, '3', '43', 'Fixed Asset Monitoring System with Barcode_9843_1699589341_1.pdf', '1', '2023-11-10 04:09:01'),
(37, '3', '44', 'Fixed Asset Monitoring System with Barcode_2059_1699592927_1.pdf', '1', '2023-11-10 05:08:47'),
(38, '3', '45', 'Fixed Asset Monitoring System with Barcode_3975_1699592995_1.pdf', '1', '2023-11-10 05:09:55'),
(39, '3', '46', 'Fixed Asset Monitoring System with Barcode_1214_1699593050_1.pdf', '1', '2023-11-10 05:10:50'),
(40, '3', '47', 'Fixed Asset Monitoring System with Barcode_2283_1699593689_1.pdf', '1', '2023-11-10 05:21:29'),
(41, '3', '48', 'SCOPE OF WORK FIXED ASSET MONITORING SYSTEM WITH BARCODE_2114_1699595311_1.pdf', '1', '2023-11-10 05:48:31'),
(42, '3', '49', 'SCOPE OF WORK FIXED ASSET MONITORING SYSTEM WITH BARCODE_1563_1699595449_1.pdf', '1', '2023-11-10 05:50:49'),
(43, '3', '50', 'SCOPE OF WORK FIXED ASSET MONITORING SYSTEM WITH BARCODE_8004_1699595591_1.pdf', '1', '2023-11-10 05:53:11'),
(44, '3', '51', 'Fixed Asset Monitoring System with Barcode_8321_1699596006_1.pdf', '1', '2023-11-10 06:00:06'),
(45, '3', '52', 'Fixed Asset Monitoring System with Barcode_5283_1699596015_1.pdf', '1', '2023-11-10 06:00:15'),
(46, '3', '53', 'Fixed Asset Monitoring System with Barcode_8447_1699596367_1.pdf', '1', '2023-11-10 06:06:07'),
(47, '3', '54', 'SCOPE OF WORK FIXED ASSET MONITORING SYSTEM WITH BARCODE_4525_1699596457_1.pdf', '1', '2023-11-10 06:07:37'),
(48, '3', '55', 'SCOPE OF WORK FIXED ASSET MONITORING SYSTEM WITH BARCODE_1427_1699596472_1.pdf', '1', '2023-11-10 06:07:52'),
(49, '3', '56', 'SCOPE OF WORK FIXED ASSET MONITORING SYSTEM WITH BARCODE_3194_1699596472_1.pdf', '1', '2023-11-10 06:07:52'),
(50, '3', '57', 'SCOPE OF WORK FIXED ASSET MONITORING SYSTEM WITH BARCODE_9103_1699596472_1.pdf', '1', '2023-11-10 06:07:52'),
(51, '3', '58', 'SCOPE OF WORK FIXED ASSET MONITORING SYSTEM WITH BARCODE_1844_1699596473_1.pdf', '1', '2023-11-10 06:07:53'),
(52, '3', '59', 'SCOPE OF WORK FIXED ASSET MONITORING SYSTEM WITH BARCODE_5685_1699596473_1.pdf', '1', '2023-11-10 06:07:53'),
(53, '3', '60', 'SCOPE OF WORK FIXED ASSET MONITORING SYSTEM WITH BARCODE_3336_1699596473_1.pdf', '1', '2023-11-10 06:07:53'),
(54, '3', '61', 'SCOPE OF WORK FIXED ASSET MONITORING SYSTEM WITH BARCODE_8160_1699596473_1.pdf', '1', '2023-11-10 06:07:53'),
(55, '3', '62', 'SCOPE OF WORK FIXED ASSET MONITORING SYSTEM WITH BARCODE_9709_1699596474_1.pdf', '1', '2023-11-10 06:07:54'),
(56, '3', '63', 'SCOPE OF WORK FIXED ASSET MONITORING SYSTEM WITH BARCODE_1540_1699596474_1.pdf', '1', '2023-11-10 06:07:54'),
(57, '3', '64', 'SCOPE OF WORK FIXED ASSET MONITORING SYSTEM WITH BARCODE_2061_1699596603_1.pdf', '1', '2023-11-10 06:10:03'),
(58, '3', '65', 'Fixed Asset Monitoring System with Barcode_3571_1699596673_1.pdf', '1', '2023-11-10 06:11:13'),
(59, '3', '66', 'Fixed Asset Monitoring System with Barcode_3713_1699596681_1.pdf', '1', '2023-11-10 06:11:21'),
(60, '3', '67', 'Fixed Asset Monitoring System with Barcode_7284_1699596748_1.pdf', '1', '2023-11-10 06:12:28'),
(61, '3', '68', 'Fixed Asset Monitoring System with Barcode_619_1699596791_1.pdf', '1', '2023-11-10 06:13:11'),
(62, '3', '69', 'Fixed Asset Monitoring System with Barcode_7332_1699596801_1.pdf', '1', '2023-11-10 06:13:21'),
(63, '3', '70', 'SCOPE OF WORK FIXED ASSET MONITORING SYSTEM WITH BARCODE_2616_1699596900_1.pdf', '1', '2023-11-10 06:15:00'),
(64, '3', '71', 'SCOPE OF WORK FIXED ASSET MONITORING SYSTEM WITH BARCODE_6231_1699596987_1.pdf', '1', '2023-11-10 06:16:27'),
(65, '3', '72', 'Fixed Asset Monitoring System with Barcode_7698_1699597334_1.pdf', '1', '2023-11-10 06:22:14'),
(66, '3', '73', 'Fixed Asset Monitoring System with Barcode_8348_1699597526_1.pdf', '1', '2023-11-10 06:25:25'),
(67, '3', '74', 'Fixed Asset Monitoring System with Barcode_2080_1699597640_1.pdf', '1', '2023-11-10 06:27:20'),
(68, '3', '75', 'Fixed Asset Monitoring System with Barcode_8914_1699597781_1.pdf', '1', '2023-11-10 06:29:41'),
(69, '3', '76', 'Fixed Asset Monitoring System with Barcode_553_1699600054_1.pdf', '1', '2023-11-10 07:07:34'),
(70, '3', '77', 'Fixed Asset Monitoring System with Barcode_8439_1699600394_1.pdf', '1', '2023-11-10 07:13:14'),
(71, '3', '78', 'Fixed Asset Monitoring System with Barcode_5323_1699600556_1.pdf', '1', '2023-11-10 07:15:56'),
(72, '3', '79', 'Fixed Asset Monitoring System with Barcode_1433_1699600578_1.pdf', '1', '2023-11-10 07:16:18'),
(73, '3', '80', 'Fixed Asset Monitoring System with Barcode_8720_1699601321_1.pdf', '1', '2023-11-10 07:28:41'),
(74, '3', '81', 'Fixed Asset Monitoring System with Barcode_6972_1699601530_1.pdf', '1', '2023-11-10 07:32:10'),
(75, '3', '82', 'Fixed Asset Monitoring System with Barcode_9479_1699601700_1.pdf', '1', '2023-11-10 07:35:00'),
(76, '3', '83', 'Fixed Asset Monitoring System with Barcode_3063_1699601743_1.pdf', '1', '2023-11-10 07:35:43'),
(77, '3', '84', 'Fixed Asset Monitoring System with Barcode_4968_1699602102_1.pdf', '1', '2023-11-10 07:41:42'),
(78, '3', '85', 'Fixed Asset Monitoring System with Barcode_7848_1699602149_1.pdf', '1', '2023-11-10 07:42:29'),
(79, '3', '86', 'Fixed Asset Monitoring System with Barcode_4469_1699602155_1.pdf', '1', '2023-11-10 07:42:35'),
(80, '3', '87', 'Fixed Asset Monitoring System with Barcode_4199_1699602199_1.pdf', '1', '2023-11-10 07:43:19'),
(81, '3', '88', 'Fixed Asset Monitoring System with Barcode_1845_1699602290_1.pdf', '1', '2023-11-10 07:44:50'),
(82, '3', '89', 'Fixed Asset Monitoring System with Barcode_5717_1699602862_1.pdf', '1', '2023-11-10 07:54:22');

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
(14, '1', '4', 'SYSTEMS SUPPORTS STAFF', '1', '2023-10-27 13:52:34');

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
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `assigned_tbl`
--
ALTER TABLE `assigned_tbl`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=44;

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
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=64;

--
-- AUTO_INCREMENT for table `employee_tbl`
--
ALTER TABLE `employee_tbl`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `itemstatus_tbl`
--
ALTER TABLE `itemstatus_tbl`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `item_tbl`
--
ALTER TABLE `item_tbl`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=90;

--
-- AUTO_INCREMENT for table `location_tbl`
--
ALTER TABLE `location_tbl`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `multfile_tbl`
--
ALTER TABLE `multfile_tbl`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=83;

--
-- AUTO_INCREMENT for table `position_tbl`
--
ALTER TABLE `position_tbl`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

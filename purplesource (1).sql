-- phpMyAdmin SQL Dump
-- version 4.2.11
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: May 19, 2016 at 06:13 PM
-- Server version: 5.6.21-log
-- PHP Version: 5.6.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `purplesource`
--

-- --------------------------------------------------------

--
-- Table structure for table `activitylog`
--

CREATE TABLE IF NOT EXISTS `activitylog` (
`id` int(11) NOT NULL,
  `action` varchar(40) NOT NULL,
  `userid` varchar(20) NOT NULL,
  `description` text NOT NULL,
  `dateupdated` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `auditclientdetails`
--

CREATE TABLE IF NOT EXISTS `auditclientdetails` (
`sn` int(11) NOT NULL,
  `companyname` varchar(50) NOT NULL,
  `clienttypesn` int(1) NOT NULL,
  `contactphone` varchar(15) NOT NULL,
  `emailaddress` varchar(100) NOT NULL,
  `officeaddress` text NOT NULL,
  `dateadded` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `auditclientdetails`
--

INSERT INTO `auditclientdetails` (`sn`, `companyname`, `clienttypesn`, `contactphone`, `emailaddress`, `officeaddress`, `dateadded`) VALUES
(1, 'Mansard HMO', 2, '08035437263', 'juuasd@gmail.com', '54/55 Ahmadu Bello Way, Bacita', '2016-04-18 08:43:16'),
(2, '0', 1, '08034203674', 'huasd@gk.com', 'Ibrahim Way, Bacita', '2016-04-20 08:14:52'),
(3, '0', 2, '0347238842774', 'hasdf@hygeiahmo.co', 'ghadii asdo', '2016-04-20 08:42:05');

-- --------------------------------------------------------

--
-- Table structure for table `auditclienttype`
--

CREATE TABLE IF NOT EXISTS `auditclienttype` (
`sn` int(11) NOT NULL,
  `companytype` varchar(50) NOT NULL,
  `datecreated` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `auditclienttype`
--

INSERT INTO `auditclienttype` (`sn`, `companytype`, `datecreated`) VALUES
(1, 'Company', '2016-04-08 13:54:10'),
(2, 'HMO', '2016-04-08 13:54:10'),
(3, 'NHIS', '2016-04-08 13:54:19');

-- --------------------------------------------------------

--
-- Table structure for table `auditdisease`
--

CREATE TABLE IF NOT EXISTS `auditdisease` (
`sn` int(11) NOT NULL,
  `diseasename` varchar(100) NOT NULL,
  `dateadded` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB AUTO_INCREMENT=12 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `auditdisease`
--

INSERT INTO `auditdisease` (`sn`, `diseasename`, `dateadded`) VALUES
(1, 'Thyphoid', '2016-04-01 14:36:24'),
(2, 'Ante-natal care', '2016-04-01 14:36:24'),
(3, 'Asthma', '2016-04-01 14:36:36'),
(4, 'Hypertension', '2016-04-01 14:36:36'),
(5, 'Malaria', '2016-04-01 14:37:08'),
(6, 'Diabetes', '2016-04-01 14:37:08'),
(7, 'URTI', '2016-04-01 14:37:27'),
(8, 'Gastro-Enteritis', '2016-04-01 14:37:27'),
(9, 'Diarrhea in children', '2016-04-01 14:37:45'),
(10, 'Deliveries', '2016-04-01 14:37:45'),
(11, 'Others', '2016-04-01 14:37:55');

-- --------------------------------------------------------

--
-- Table structure for table `auditdiseaseprofile`
--

CREATE TABLE IF NOT EXISTS `auditdiseaseprofile` (
`sn` int(11) NOT NULL,
  `diseasesn` int(2) NOT NULL,
  `sitesn` int(2) NOT NULL,
  `value` int(5) NOT NULL,
  `month` varchar(20) NOT NULL,
  `year` varchar(4) NOT NULL,
  `date` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `auditdiseaseprofile`
--

INSERT INTO `auditdiseaseprofile` (`sn`, `diseasesn`, `sitesn`, `value`, `month`, `year`, `date`) VALUES
(1, 2, 1, 34, 'April', '2016', '2016-04-01 15:29:26'),
(2, 2, 3, 42, 'April', '2016', '2016-04-01 16:00:41'),
(3, 1, 1, 54, 'January', '2013', '2016-04-01 17:00:06'),
(5, 3, 1, 34, 'January', '2016', '2016-04-01 17:03:34'),
(6, 1, 1, 534, 'April', '2016', '2016-04-01 17:09:47'),
(7, 2, 4, 13, 'April', '2016', '2016-04-02 11:31:45'),
(8, 1, 4, 234, 'January', '2016', '2016-04-14 16:42:14'),
(9, 1, 1, 45, 'March', '2016', '2016-04-26 09:14:10'),
(10, 1, 2, 37, 'March', '2016', '2016-04-26 09:14:34');

-- --------------------------------------------------------

--
-- Table structure for table `auditdrugpurchases`
--

CREATE TABLE IF NOT EXISTS `auditdrugpurchases` (
`sn` int(11) NOT NULL,
  `purchasetype` int(1) NOT NULL,
  `sitesn` int(1) NOT NULL,
  `value` int(50) NOT NULL,
  `month` varchar(20) NOT NULL,
  `year` varchar(5) NOT NULL,
  `date` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB AUTO_INCREMENT=24 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `auditdrugpurchases`
--

INSERT INTO `auditdrugpurchases` (`sn`, `purchasetype`, `sitesn`, `value`, `month`, `year`, `date`) VALUES
(1, 1, 1, 32, 'January', '2016', '2016-04-02 23:14:17'),
(3, 1, 2, 54, 'January', '2016', '2016-04-02 23:15:42'),
(4, 1, 5, 53, 'January', '2016', '2016-04-02 23:15:52'),
(5, 1, 4, 341, 'January', '2016', '2016-04-02 23:15:57'),
(8, 1, 6, 366, 'January', '2016', '2016-04-02 23:16:50'),
(9, 1, 3, 124, 'January', '2016', '2016-04-02 23:16:56'),
(10, 1, 1, 1342, 'March', '2016', '2016-04-04 16:53:52'),
(11, 2, 1, 670, 'February', '2016', '2016-04-04 16:54:24'),
(12, 1, 5, 100, 'April', '2016', '2016-04-04 16:54:53'),
(17, 1, 2, 423134, 'February', '2015', '2016-04-08 11:01:07'),
(18, 1, 1, 34536, 'April', '2016', '2016-04-08 11:02:48'),
(22, 1, 6, 434300, 'April', '2016', '2016-04-08 11:40:10'),
(23, 2, 1, 20324, 'January', '2016', '2016-04-08 11:43:10');

-- --------------------------------------------------------

--
-- Table structure for table `auditpaymentcategory`
--

CREATE TABLE IF NOT EXISTS `auditpaymentcategory` (
`sn` int(11) NOT NULL,
  `categoryname` varchar(100) NOT NULL,
  `purchasetypesn` int(1) NOT NULL,
  `datecreated` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `auditpaymentcategory`
--

INSERT INTO `auditpaymentcategory` (`sn`, `categoryname`, `purchasetypesn`, `datecreated`) VALUES
(1, 'Kitchen Expenses', 1, '2016-04-11 10:23:51'),
(2, 'Laundry items', 2, '2016-04-08 11:42:46'),
(3, 'Mokonla Trades', 1, '2016-04-08 12:29:25');

-- --------------------------------------------------------

--
-- Table structure for table `auditprivatepayments`
--

CREATE TABLE IF NOT EXISTS `auditprivatepayments` (
`sn` int(11) NOT NULL,
  `siteid` int(1) NOT NULL,
  `month` varchar(20) NOT NULL,
  `year` varchar(4) NOT NULL,
  `value` int(10) NOT NULL,
  `date` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `auditprivatepayments`
--

INSERT INTO `auditprivatepayments` (`sn`, `siteid`, `month`, `year`, `value`, `date`) VALUES
(1, 1, 'January', '2016', 4234, '2016-04-05 09:52:40');

-- --------------------------------------------------------

--
-- Table structure for table `auditpurchasetype`
--

CREATE TABLE IF NOT EXISTS `auditpurchasetype` (
`sn` int(11) NOT NULL,
  `purchasetype` varchar(50) NOT NULL,
  `datecreated` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `auditpurchasetype`
--

INSERT INTO `auditpurchasetype` (`sn`, `purchasetype`, `datecreated`) VALUES
(1, 'Credit Purchase(s)', '2016-04-02 21:46:23'),
(2, 'Petty Cash Purchases', '2016-04-02 21:46:23'),
(3, 'NHIS/HMO Enrollees (Pharmacy suppliers)', '2016-04-02 21:47:01'),
(4, 'Direct cash purchases', '2016-04-02 21:47:01');

-- --------------------------------------------------------

--
-- Table structure for table `bankdetails`
--

CREATE TABLE IF NOT EXISTS `bankdetails` (
`detailid` int(11) NOT NULL,
  `bankid` varchar(5) NOT NULL,
  `staffid` varchar(20) NOT NULL,
  `accountnumber` varchar(15) NOT NULL,
  `accountname` varchar(100) NOT NULL,
  `bankadddate` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB AUTO_INCREMENT=12 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `bankdetails`
--

INSERT INTO `bankdetails` (`detailid`, `bankid`, `staffid`, `accountnumber`, `accountname`, `bankadddate`) VALUES
(1, '1', 'FAFI1379', '44244224001', 'Agbede Joseph Kayode', '2016-03-16 16:25:21'),
(2, '', 'FAAD1162', '', '', '2016-03-17 14:58:40'),
(3, '', 'ICCL1726', '', '', '2016-03-17 15:13:47'),
(4, '', 'ICCL1786', '', '', '2016-03-17 15:15:46'),
(5, '', 'ICCL1374', '', '', '2016-03-17 15:17:31'),
(6, '', 'ICCL1451', '', '', '2016-03-17 15:20:04'),
(7, '', 'ICCL1692', '', '', '2016-03-17 15:20:33'),
(8, '', 'ICCL1310', '', '', '2016-03-17 15:21:56'),
(9, '', 'EGAD1380', '', '', '2016-03-18 12:32:06'),
(10, '', 'BWFI1107', '', '', '2016-03-18 16:27:14'),
(11, '', 'BWPR1081', '', '', '2016-05-18 13:30:24');

-- --------------------------------------------------------

--
-- Table structure for table `bankinformation`
--

CREATE TABLE IF NOT EXISTS `bankinformation` (
`bankid` int(11) NOT NULL,
  `bankname` varchar(40) NOT NULL,
  `datecreated` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `bankinformation`
--

INSERT INTO `bankinformation` (`bankid`, `bankname`, `datecreated`) VALUES
(1, 'GTBank', '2016-03-11 13:44:19'),
(2, 'Access Bank', '2016-03-11 13:44:19');

-- --------------------------------------------------------

--
-- Table structure for table `departments`
--

CREATE TABLE IF NOT EXISTS `departments` (
`id` int(11) NOT NULL,
  `departmentid` varchar(2) NOT NULL,
  `departmentname` varchar(20) NOT NULL,
  `datecreated` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `departments`
--

INSERT INTO `departments` (`id`, `departmentid`, `departmentname`, `datecreated`) VALUES
(1, 'AD', 'Administrative', '2016-03-10 11:45:47'),
(2, 'CL', 'Clinical', '2016-03-10 11:45:47'),
(3, 'NR', 'Nursing', '2016-03-10 11:46:03'),
(4, 'FI', 'Finance', '2016-03-10 11:46:03'),
(5, 'PR', 'Procurement', '2016-03-10 11:46:39'),
(6, 'IT', 'Info-Tech', '2016-03-10 11:46:39'),
(7, 'FD', 'Front-Desk', '2016-03-10 11:47:06'),
(8, 'BD', 'Business-Development', '2016-03-10 11:47:06'),
(9, 'HR', 'Human Resource', '2016-03-10 11:47:15');

-- --------------------------------------------------------

--
-- Table structure for table `drugcategory`
--

CREATE TABLE IF NOT EXISTS `drugcategory` (
`sn` int(11) NOT NULL,
  `categoryname` varchar(50) NOT NULL,
  `datecreated` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB AUTO_INCREMENT=14 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `drugcategory`
--

INSERT INTO `drugcategory` (`sn`, `categoryname`, `datecreated`) VALUES
(3, 'Capsule', '2016-05-18 16:19:15'),
(4, 'Tablet', '2016-05-18 11:33:16'),
(12, 'Innsd', '2016-05-17 15:32:16'),
(13, 'Price', '2016-05-17 15:38:10');

-- --------------------------------------------------------

--
-- Table structure for table `drugstore`
--

CREATE TABLE IF NOT EXISTS `drugstore` (
`sn` int(11) NOT NULL,
  `drugname` varchar(50) NOT NULL,
  `category` varchar(2) NOT NULL,
  `dateadded` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `drugstore`
--

INSERT INTO `drugstore` (`sn`, `drugname`, `category`, `dateadded`) VALUES
(1, 'Ampicillin', '3', '2016-05-17 11:25:35'),
(2, 'Ampiclox', '3', '2016-05-17 14:23:20'),
(3, 'Ampiclox', '4', '2016-05-17 14:23:31');

-- --------------------------------------------------------

--
-- Table structure for table `jobdetail`
--

CREATE TABLE IF NOT EXISTS `jobdetail` (
`sn` int(11) NOT NULL,
  `jobid` varchar(10) NOT NULL,
  `jobtitle` varchar(60) NOT NULL,
  `jobdescription` text NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `jobdetail`
--

INSERT INTO `jobdetail` (`sn`, `jobid`, `jobtitle`, `jobdescription`) VALUES
(1, '', 'Data Management (Manager)', 'All data management issues '),
(6, '', 'Procurement', '<p>All things procurement</p><p><br></p><p>From hardware to soft items</p>'),
(8, '', 'Security Officer', 'Security will be responsible for the security of all property'),
(9, '', 'HR Secretary', 'To assist the Human resource Personnel'),
(10, '', 'Human Resource Manager', 'Be responsible for HR activities at all sites');

-- --------------------------------------------------------

--
-- Table structure for table `nigerianstates`
--

CREATE TABLE IF NOT EXISTS `nigerianstates` (
`id` int(11) NOT NULL,
  `statename` varchar(30) NOT NULL,
  `datecreated` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `nigerianstates`
--

INSERT INTO `nigerianstates` (`id`, `statename`, `datecreated`) VALUES
(1, 'Abia', '2016-03-11 14:04:44'),
(2, 'Akwa-Ibom', '2016-03-11 14:04:44');

-- --------------------------------------------------------

--
-- Table structure for table `nokdetails`
--

CREATE TABLE IF NOT EXISTS `nokdetails` (
`sn` int(11) NOT NULL,
  `staffid` varchar(20) NOT NULL,
  `nokname` varchar(100) NOT NULL,
  `nokmobilenumber` varchar(20) NOT NULL,
  `nokaddress` text NOT NULL,
  `datecreated` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `nokdetails`
--

INSERT INTO `nokdetails` (`sn`, `staffid`, `nokname`, `nokmobilenumber`, `nokaddress`, `datecreated`) VALUES
(1, 'EGAD1380', 'Dr. Agbede', '07055518205', '64/65 Ahmadu Bello Way, bacita', '2016-03-18 11:41:37'),
(2, 'BWFI1107', 'Mrs. Ibrahim Awosika', '080243264517', 'Ahmadu Bello Way, Bacita, Kwara State', '2016-03-18 15:27:14'),
(3, 'BWPR1081', '', '', '', '2016-05-18 12:30:24');

-- --------------------------------------------------------

--
-- Table structure for table `partnershipinfo`
--

CREATE TABLE IF NOT EXISTS `partnershipinfo` (
`id` int(11) NOT NULL,
  `companyname` varchar(20) NOT NULL,
  `companytype` varchar(10) NOT NULL,
  `companycode` varchar(10) NOT NULL,
  `syncstatus` int(1) NOT NULL,
  `datecreated` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COMMENT='syncstatus 0- unsynced, 1- synced, 2- updatdnotsynced';

-- --------------------------------------------------------

--
-- Table structure for table `patientsinfo`
--

CREATE TABLE IF NOT EXISTS `patientsinfo` (
`id` int(11) NOT NULL,
  `firstname` varchar(20) NOT NULL,
  `middlename` varchar(20) NOT NULL,
  `lastname` varchar(20) NOT NULL,
  `gender` varchar(1) NOT NULL,
  `address` text NOT NULL,
  `phonenumber` varchar(20) NOT NULL,
  `emailaddress` varchar(30) NOT NULL,
  `hospnumber` varchar(10) NOT NULL,
  `company` varchar(2) NOT NULL,
  `dateadded` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `pensiondetails`
--

CREATE TABLE IF NOT EXISTS `pensiondetails` (
`pensiondetailsid` int(11) NOT NULL,
  `staffid` varchar(20) NOT NULL,
  `pensionpin` varchar(20) NOT NULL,
  `pensionadministrator` varchar(100) NOT NULL,
  `pensionadddate` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `pensiondetails`
--

INSERT INTO `pensiondetails` (`pensiondetailsid`, `staffid`, `pensionpin`, `pensionadministrator`, `pensionadddate`) VALUES
(1, 'EGAD1380', '82378736', 'Mr. Aderibigbe', '2016-03-18 11:32:06'),
(2, 'BWFI1107', '7123554128', 'Mr. Ibrahim Oloruntoba', '2016-03-18 15:27:14'),
(3, 'BWPR1081', '', '', '2016-05-18 12:30:24');

-- --------------------------------------------------------

--
-- Table structure for table `requisitionborno_way`
--

CREATE TABLE IF NOT EXISTS `requisitionborno_way` (
`sn` int(11) NOT NULL,
  `drugid` int(3) NOT NULL,
  `requiredqty` int(4) NOT NULL,
  `qtyleft` int(4) NOT NULL,
  `minimumreorderlevel` int(3) NOT NULL,
  `datecreated` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `requisitionborno_way`
--

INSERT INTO `requisitionborno_way` (`sn`, `drugid`, `requiredqty`, `qtyleft`, `minimumreorderlevel`, `datecreated`) VALUES
(1, 1, 20, 20, 15, '2016-05-17 11:25:35'),
(2, 2, 43, 29, 30, '2016-05-17 14:23:20'),
(3, 2, 45, 45, 30, '2016-05-17 14:23:31');

-- --------------------------------------------------------

--
-- Table structure for table `requisitionegbe`
--

CREATE TABLE IF NOT EXISTS `requisitionegbe` (
`sn` int(11) NOT NULL,
  `drugid` int(3) NOT NULL,
  `requiredqty` int(4) NOT NULL,
  `qtyleft` int(4) NOT NULL,
  `minimumreorderlevel` int(3) NOT NULL,
  `datecreated` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `requisitionegbe`
--

INSERT INTO `requisitionegbe` (`sn`, `drugid`, `requiredqty`, `qtyleft`, `minimumreorderlevel`, `datecreated`) VALUES
(1, 1, 20, 20, 15, '2016-05-17 11:25:35'),
(2, 2, 43, 43, 30, '2016-05-17 14:23:20'),
(3, 2, 45, 45, 30, '2016-05-17 14:23:31');

-- --------------------------------------------------------

--
-- Table structure for table `requisitionfalolu`
--

CREATE TABLE IF NOT EXISTS `requisitionfalolu` (
`sn` int(11) NOT NULL,
  `drugid` int(3) NOT NULL,
  `requiredqty` int(3) NOT NULL,
  `qtyleft` int(3) NOT NULL,
  `minimumreorderlevel` int(3) NOT NULL,
  `datecreated` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `requisitionfalolu`
--

INSERT INTO `requisitionfalolu` (`sn`, `drugid`, `requiredqty`, `qtyleft`, `minimumreorderlevel`, `datecreated`) VALUES
(1, 1, 20, 20, 15, '2016-05-17 11:25:35'),
(2, 2, 43, 43, 30, '2016-05-17 14:23:20'),
(3, 2, 45, 45, 30, '2016-05-17 14:23:31');

-- --------------------------------------------------------

--
-- Table structure for table `requisitionikoyi_club`
--

CREATE TABLE IF NOT EXISTS `requisitionikoyi_club` (
`sn` int(11) NOT NULL,
  `drugid` int(3) NOT NULL,
  `requiredqty` int(4) NOT NULL,
  `qtyleft` int(4) NOT NULL,
  `minimumreorderlevel` int(3) NOT NULL,
  `datecreated` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `requisitionikoyi_club`
--

INSERT INTO `requisitionikoyi_club` (`sn`, `drugid`, `requiredqty`, `qtyleft`, `minimumreorderlevel`, `datecreated`) VALUES
(1, 1, 20, 20, 15, '2016-05-17 11:25:35'),
(2, 2, 43, 43, 30, '2016-05-17 14:23:20'),
(3, 2, 45, 45, 30, '2016-05-17 14:23:31');

-- --------------------------------------------------------

--
-- Table structure for table `requisitionmushin`
--

CREATE TABLE IF NOT EXISTS `requisitionmushin` (
`sn` int(11) NOT NULL,
  `drugid` int(5) NOT NULL,
  `requiredqty` int(5) NOT NULL,
  `qtyleft` int(5) NOT NULL,
  `minimumreorderlevel` int(5) NOT NULL,
  `datecreated` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `requisitionmushin`
--

INSERT INTO `requisitionmushin` (`sn`, `drugid`, `requiredqty`, `qtyleft`, `minimumreorderlevel`, `datecreated`) VALUES
(1, 1, 20, 20, 15, '2016-05-17 11:25:35'),
(2, 2, 43, 43, 30, '2016-05-17 14:23:20'),
(3, 2, 45, 45, 30, '2016-05-17 14:23:31');

-- --------------------------------------------------------

--
-- Table structure for table `requisitiononikan`
--

CREATE TABLE IF NOT EXISTS `requisitiononikan` (
`sn` int(11) NOT NULL,
  `drugid` int(3) NOT NULL,
  `requiredqty` int(5) NOT NULL,
  `qtyleft` int(5) NOT NULL,
  `minimumreorderlevel` int(5) NOT NULL,
  `datecreated` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `requisitiononikan`
--

INSERT INTO `requisitiononikan` (`sn`, `drugid`, `requiredqty`, `qtyleft`, `minimumreorderlevel`, `datecreated`) VALUES
(1, 1, 20, 20, 15, '2016-05-17 11:25:35'),
(2, 2, 43, 43, 30, '2016-05-17 14:23:20'),
(3, 2, 45, 45, 30, '2016-05-17 14:23:31');

-- --------------------------------------------------------

--
-- Table structure for table `role`
--

CREATE TABLE IF NOT EXISTS `role` (
`sn` int(11) NOT NULL,
  `role` varchar(20) NOT NULL,
  `datecreated` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `role`
--

INSERT INTO `role` (`sn`, `role`, `datecreated`) VALUES
(1, 'Team lead', '2016-05-10 15:48:32'),
(2, 'Team member', '2016-05-10 15:48:32');

-- --------------------------------------------------------

--
-- Table structure for table `schedulelog`
--

CREATE TABLE IF NOT EXISTS `schedulelog` (
`id` int(11) NOT NULL,
  `schedule` varchar(100) NOT NULL,
  `startDate` date NOT NULL,
  `endDate` date NOT NULL,
  `dateadded` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `sites`
--

CREATE TABLE IF NOT EXISTS `sites` (
`id` int(11) NOT NULL,
  `siteid` varchar(2) NOT NULL,
  `sitename` varchar(20) NOT NULL,
  `datecreated` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `sites`
--

INSERT INTO `sites` (`id`, `siteid`, `sitename`, `datecreated`) VALUES
(1, 'BW', 'Borno_Way', '2016-03-10 11:43:00'),
(3, 'ON', 'Onikan', '2016-03-10 11:43:26'),
(4, 'IC', 'Ikoyi_Club', '2016-03-10 11:43:26'),
(5, 'FA', 'Falolu', '2016-03-10 11:44:29'),
(6, 'IS', 'Isolo', '2016-03-10 11:44:29');

-- --------------------------------------------------------

--
-- Table structure for table `staff`
--

CREATE TABLE IF NOT EXISTS `staff` (
`id` int(11) NOT NULL,
  `userid` varchar(8) NOT NULL,
  `staffid` varchar(20) NOT NULL,
  `password` varchar(200) NOT NULL,
  `firstname` varchar(30) NOT NULL,
  `middlename` varchar(30) NOT NULL,
  `lastname` varchar(30) NOT NULL,
  `department` int(2) NOT NULL,
  `role` int(1) NOT NULL,
  `maritalstatus` varchar(20) NOT NULL,
  `gender` varchar(2) NOT NULL,
  `emailaddress` text NOT NULL,
  `phonenumber` int(15) NOT NULL,
  `homeaddress` text NOT NULL,
  `highestqualification` varchar(50) NOT NULL,
  `dirpath` text NOT NULL,
  `datecreated` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `syncstatus` int(1) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1 COMMENT='Table holding all PurpleSource staff information';

--
-- Dumping data for table `staff`
--

INSERT INTO `staff` (`id`, `userid`, `staffid`, `password`, `firstname`, `middlename`, `lastname`, `department`, `role`, `maritalstatus`, `gender`, `emailaddress`, `phonenumber`, `homeaddress`, `highestqualification`, `dirpath`, `datecreated`, `syncstatus`) VALUES
(1, 'EGAD1380', 'EGAD1380', '74e0ffde57f67bb3270f0bd003f1a973', 'Kayode', 'hjd', 'kjb', 0, 0, 'M', 'M', 'asd@sfdf.com', 2147483647, 'uvad qie gugiugb', 'Phd', 'HDD/psource_s/EGAD1380', '2016-03-18 12:32:06', 0),
(2, 'BWFI1107', 'BWFI1107', 'd25f7b4dbdbbbaad9b5b795d3038785a', 'Michael', 'G', 'Mt. Sinari', 0, 0, 'S', 'M', 'jkagbedeasda@gsdf.com', 2147483647, 'Mt. Sinai Hospital', 'M.Sc', 'HDD/psource_s/BWFI1107', '2016-03-18 16:27:14', 0),
(3, 'BWPR1081', 'BWPR1081', '506f48e7541fcc8cea7abd25bf599ddd', 'Basirat', 'Ajoke', 'Sulaimon', 5, 1, 'S', 'F', 'jkagbede@gmail.com', 2147483647, 'Gowon Estate', 'B.Sc', 'HDD/psource_s/BWPR1081', '2016-05-18 13:30:24', 0);

-- --------------------------------------------------------

--
-- Table structure for table `staffrequireddocuments`
--

CREATE TABLE IF NOT EXISTS `staffrequireddocuments` (
`sn` int(11) NOT NULL,
  `category` int(3) NOT NULL,
  `documentstoupload` varchar(40) NOT NULL,
  `datecreated` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1 COMMENT='0 for all staff, positionid for job specific positions';

--
-- Dumping data for table `staffrequireddocuments`
--

INSERT INTO `staffrequireddocuments` (`sn`, `category`, `documentstoupload`, `datecreated`) VALUES
(1, 0, 'NYSC_Certificate', '2016-03-17 12:04:19'),
(2, 0, 'Birth_Certificate', '2016-03-17 12:04:19');

-- --------------------------------------------------------

--
-- Table structure for table `staffschedule`
--

CREATE TABLE IF NOT EXISTS `staffschedule` (
`sn` int(11) NOT NULL,
  `schedule` varchar(100) NOT NULL,
  `staffid` int(2) NOT NULL,
  `date` varchar(20) NOT NULL,
  `starttime` varchar(10) NOT NULL,
  `endtime` varchar(10) NOT NULL,
  `datetime` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `staffuploadeddocument`
--

CREATE TABLE IF NOT EXISTS `staffuploadeddocument` (
`sn` int(11) NOT NULL,
  `documentid` varchar(2) NOT NULL,
  `staffid` varchar(20) NOT NULL,
  `dateuploaded` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `staffuploadeddocument`
--

INSERT INTO `staffuploadeddocument` (`sn`, `documentid`, `staffid`, `dateuploaded`) VALUES
(1, '1', 'EGAD1380', '2016-03-18 12:42:45'),
(2, '2', 'EGAD1380', '2016-03-18 12:42:50'),
(3, '1', 'BWFI1107', '2016-03-26 15:20:41');

-- --------------------------------------------------------

--
-- Table structure for table `vendordetails`
--

CREATE TABLE IF NOT EXISTS `vendordetails` (
`sn` int(11) NOT NULL,
  `vendorname` varchar(50) NOT NULL,
  `contactperson` varchar(50) NOT NULL,
  `contactphonenumber` varchar(15) NOT NULL,
  `emailaddress` varchar(50) NOT NULL,
  `officeaddress` text NOT NULL,
  `dateadded` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `vendordetails`
--

INSERT INTO `vendordetails` (`sn`, `vendorname`, `contactperson`, `contactphonenumber`, `emailaddress`, `officeaddress`, `dateadded`) VALUES
(1, 'Mummy White', 'Mrs Do good', '080423647234', 'hithitpharm@pharmatech.com', 'werwer', '2016-05-05 09:43:47'),
(2, 'Musa Musa Pharmacy', 'Imman', '07055516273', 'jiasd@gmail.com', 'Ibrahim Taiwo Road, Bacita, Kwara State', '2016-05-06 08:59:04'),
(3, 'Irisi-Oluwa Pharmacy', 'Mrs. Atolagbe', '070555263172', 'jiasdf@asd.com', 'Yaba street. Campus road', '2016-05-06 09:01:04');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `activitylog`
--
ALTER TABLE `activitylog`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `auditclientdetails`
--
ALTER TABLE `auditclientdetails`
 ADD PRIMARY KEY (`sn`);

--
-- Indexes for table `auditclienttype`
--
ALTER TABLE `auditclienttype`
 ADD PRIMARY KEY (`sn`);

--
-- Indexes for table `auditdisease`
--
ALTER TABLE `auditdisease`
 ADD PRIMARY KEY (`sn`), ADD UNIQUE KEY `diseasename` (`diseasename`);

--
-- Indexes for table `auditdiseaseprofile`
--
ALTER TABLE `auditdiseaseprofile`
 ADD PRIMARY KEY (`sn`), ADD UNIQUE KEY `diseasesn` (`diseasesn`,`sitesn`,`value`,`month`,`year`);

--
-- Indexes for table `auditdrugpurchases`
--
ALTER TABLE `auditdrugpurchases`
 ADD PRIMARY KEY (`sn`), ADD UNIQUE KEY `purchasetype` (`purchasetype`,`sitesn`,`value`,`month`,`year`), ADD UNIQUE KEY `purchasetype_2` (`purchasetype`,`sitesn`,`month`,`year`);

--
-- Indexes for table `auditpaymentcategory`
--
ALTER TABLE `auditpaymentcategory`
 ADD PRIMARY KEY (`sn`);

--
-- Indexes for table `auditprivatepayments`
--
ALTER TABLE `auditprivatepayments`
 ADD PRIMARY KEY (`sn`), ADD UNIQUE KEY `siteid` (`siteid`,`month`,`year`,`value`);

--
-- Indexes for table `auditpurchasetype`
--
ALTER TABLE `auditpurchasetype`
 ADD PRIMARY KEY (`sn`);

--
-- Indexes for table `bankdetails`
--
ALTER TABLE `bankdetails`
 ADD PRIMARY KEY (`detailid`);

--
-- Indexes for table `bankinformation`
--
ALTER TABLE `bankinformation`
 ADD PRIMARY KEY (`bankid`);

--
-- Indexes for table `departments`
--
ALTER TABLE `departments`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `drugcategory`
--
ALTER TABLE `drugcategory`
 ADD PRIMARY KEY (`sn`), ADD UNIQUE KEY `categoryname` (`categoryname`);

--
-- Indexes for table `drugstore`
--
ALTER TABLE `drugstore`
 ADD PRIMARY KEY (`sn`), ADD UNIQUE KEY `drugname` (`drugname`,`category`);

--
-- Indexes for table `jobdetail`
--
ALTER TABLE `jobdetail`
 ADD PRIMARY KEY (`sn`), ADD UNIQUE KEY `jobtitle` (`jobtitle`);

--
-- Indexes for table `nigerianstates`
--
ALTER TABLE `nigerianstates`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `nokdetails`
--
ALTER TABLE `nokdetails`
 ADD PRIMARY KEY (`sn`);

--
-- Indexes for table `partnershipinfo`
--
ALTER TABLE `partnershipinfo`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `patientsinfo`
--
ALTER TABLE `patientsinfo`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `pensiondetails`
--
ALTER TABLE `pensiondetails`
 ADD PRIMARY KEY (`pensiondetailsid`);

--
-- Indexes for table `requisitionborno_way`
--
ALTER TABLE `requisitionborno_way`
 ADD PRIMARY KEY (`sn`);

--
-- Indexes for table `requisitionegbe`
--
ALTER TABLE `requisitionegbe`
 ADD PRIMARY KEY (`sn`);

--
-- Indexes for table `requisitionfalolu`
--
ALTER TABLE `requisitionfalolu`
 ADD PRIMARY KEY (`sn`);

--
-- Indexes for table `requisitionikoyi_club`
--
ALTER TABLE `requisitionikoyi_club`
 ADD PRIMARY KEY (`sn`);

--
-- Indexes for table `requisitionmushin`
--
ALTER TABLE `requisitionmushin`
 ADD PRIMARY KEY (`sn`);

--
-- Indexes for table `requisitiononikan`
--
ALTER TABLE `requisitiononikan`
 ADD PRIMARY KEY (`sn`);

--
-- Indexes for table `role`
--
ALTER TABLE `role`
 ADD PRIMARY KEY (`sn`);

--
-- Indexes for table `schedulelog`
--
ALTER TABLE `schedulelog`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `sites`
--
ALTER TABLE `sites`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `staff`
--
ALTER TABLE `staff`
 ADD PRIMARY KEY (`id`), ADD UNIQUE KEY `firstname` (`firstname`,`middlename`,`lastname`,`maritalstatus`,`gender`);

--
-- Indexes for table `staffrequireddocuments`
--
ALTER TABLE `staffrequireddocuments`
 ADD PRIMARY KEY (`sn`);

--
-- Indexes for table `staffschedule`
--
ALTER TABLE `staffschedule`
 ADD PRIMARY KEY (`sn`);

--
-- Indexes for table `staffuploadeddocument`
--
ALTER TABLE `staffuploadeddocument`
 ADD PRIMARY KEY (`sn`), ADD UNIQUE KEY `documentid` (`documentid`,`staffid`);

--
-- Indexes for table `vendordetails`
--
ALTER TABLE `vendordetails`
 ADD PRIMARY KEY (`sn`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `activitylog`
--
ALTER TABLE `activitylog`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `auditclientdetails`
--
ALTER TABLE `auditclientdetails`
MODIFY `sn` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `auditclienttype`
--
ALTER TABLE `auditclienttype`
MODIFY `sn` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `auditdisease`
--
ALTER TABLE `auditdisease`
MODIFY `sn` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=12;
--
-- AUTO_INCREMENT for table `auditdiseaseprofile`
--
ALTER TABLE `auditdiseaseprofile`
MODIFY `sn` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=11;
--
-- AUTO_INCREMENT for table `auditdrugpurchases`
--
ALTER TABLE `auditdrugpurchases`
MODIFY `sn` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=24;
--
-- AUTO_INCREMENT for table `auditpaymentcategory`
--
ALTER TABLE `auditpaymentcategory`
MODIFY `sn` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `auditprivatepayments`
--
ALTER TABLE `auditprivatepayments`
MODIFY `sn` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `auditpurchasetype`
--
ALTER TABLE `auditpurchasetype`
MODIFY `sn` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `bankdetails`
--
ALTER TABLE `bankdetails`
MODIFY `detailid` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=12;
--
-- AUTO_INCREMENT for table `bankinformation`
--
ALTER TABLE `bankinformation`
MODIFY `bankid` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `departments`
--
ALTER TABLE `departments`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=10;
--
-- AUTO_INCREMENT for table `drugcategory`
--
ALTER TABLE `drugcategory`
MODIFY `sn` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=14;
--
-- AUTO_INCREMENT for table `drugstore`
--
ALTER TABLE `drugstore`
MODIFY `sn` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `jobdetail`
--
ALTER TABLE `jobdetail`
MODIFY `sn` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=11;
--
-- AUTO_INCREMENT for table `nigerianstates`
--
ALTER TABLE `nigerianstates`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `nokdetails`
--
ALTER TABLE `nokdetails`
MODIFY `sn` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `partnershipinfo`
--
ALTER TABLE `partnershipinfo`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `patientsinfo`
--
ALTER TABLE `patientsinfo`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `pensiondetails`
--
ALTER TABLE `pensiondetails`
MODIFY `pensiondetailsid` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `requisitionborno_way`
--
ALTER TABLE `requisitionborno_way`
MODIFY `sn` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `requisitionegbe`
--
ALTER TABLE `requisitionegbe`
MODIFY `sn` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `requisitionfalolu`
--
ALTER TABLE `requisitionfalolu`
MODIFY `sn` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `requisitionikoyi_club`
--
ALTER TABLE `requisitionikoyi_club`
MODIFY `sn` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `requisitionmushin`
--
ALTER TABLE `requisitionmushin`
MODIFY `sn` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `requisitiononikan`
--
ALTER TABLE `requisitiononikan`
MODIFY `sn` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `role`
--
ALTER TABLE `role`
MODIFY `sn` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `schedulelog`
--
ALTER TABLE `schedulelog`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `sites`
--
ALTER TABLE `sites`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT for table `staff`
--
ALTER TABLE `staff`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `staffrequireddocuments`
--
ALTER TABLE `staffrequireddocuments`
MODIFY `sn` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `staffschedule`
--
ALTER TABLE `staffschedule`
MODIFY `sn` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `staffuploadeddocument`
--
ALTER TABLE `staffuploadeddocument`
MODIFY `sn` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `vendordetails`
--
ALTER TABLE `vendordetails`
MODIFY `sn` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=4;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

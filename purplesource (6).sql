-- phpMyAdmin SQL Dump
-- version 4.2.11
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Jan 11, 2017 at 05:36 AM
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
  `description` varchar(500) NOT NULL,
  `dateupdated` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB AUTO_INCREMENT=19 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `activitylog`
--

INSERT INTO `activitylog` (`id`, `action`, `userid`, `description`, `dateupdated`) VALUES
(11, 'Update', '3', 'Values for AMPICILLIN stock at Egbe has been updated. requiredqty set to 50 Minimumre-Order level set to 25.', '2016-06-29 11:17:21'),
(12, 'Update', '3', 'Values for AMPICILLIN stock at Egbe has been updated. requiredqty set to 50 Minimumre-Order level set to 35.', '2016-06-29 11:17:51'),
(13, 'Update', '3', 'Values for AMPICILLIN stock at Borno-Way has been updated. requiredqty set to 50 Minimumre-Order level set to 35.', '2016-07-01 08:59:45'),
(14, 'Update', '3', 'Values for AMPICILLIN stock at Borno-Way has been updated. requiredqty set to 50 Minimumre-Order level set to 10.', '2016-07-01 09:00:07'),
(15, 'Update', '3', 'Values for AMPICILLIN stock at Onikan has been updated. requiredqty set to 40 Minimumre-Order level set to 25.', '2016-07-01 11:40:03'),
(16, 'Update', '3', 'Values for AMPICLOX stock at Surulere has been updated. requiredqty set to 55 Minimumre-Order level set to 20.', '2016-07-08 07:01:40'),
(17, 'Update', '3', 'Values for AMPICLOX stock at Falolu has been updated. requiredqty set to 43 Minimumre-Order level set to 35.', '2016-07-12 09:18:31'),
(18, 'Update', '8', 'Values for AMPICILLIN stock at Egbe has been updated. requiredqty set to 50 MRL set to 35, Quantity left set to 14.', '2016-09-29 17:20:00');

-- --------------------------------------------------------

--
-- Table structure for table `addillcategory`
--

CREATE TABLE IF NOT EXISTS `addillcategory` (
`sn` int(11) NOT NULL,
  `hospitalid` varchar(15) NOT NULL,
  `clientillcategory` varchar(1) NOT NULL,
  `datecreated` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `addillcategory`
--

INSERT INTO `addillcategory` (`sn`, `hospitalid`, `clientillcategory`, `datecreated`) VALUES
(1, '', '2', '2016-09-06 16:29:53'),
(2, '', '2', '2016-09-06 16:32:44'),
(3, '', '2', '2016-09-06 16:33:56'),
(4, '', '3', '2016-09-06 16:40:47'),
(5, '', '4', '2016-09-06 16:41:11'),
(6, '', '0', '2016-10-05 14:36:51'),
(7, '', '1', '2016-10-05 15:04:31'),
(8, '', '2', '2016-10-05 15:05:30');

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
) ENGINE=InnoDB AUTO_INCREMENT=24 DEFAULT CHARSET=latin1;

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
(11, '', 'BWPR1081', '', '', '2016-05-18 13:30:24'),
(12, '', 'EGPR1106', '', '', '2016-07-26 10:27:09'),
(13, '', 'EGNR1319', '', '', '2016-08-17 14:06:11'),
(14, '', 'BWAD1454', '', '', '2016-08-17 14:29:23'),
(15, '', 'BWBD1198', '', '', '2016-09-06 17:27:12'),
(16, '', 'BWBD1682', '', '', '2016-09-14 15:40:55'),
(17, '', 'BWPH1237', '', '', '2016-09-20 13:06:05'),
(18, '', 'EGPH1112', '', '', '2016-09-23 14:01:35'),
(19, '', 'EGPH1833', '', '', '2016-09-23 15:20:46'),
(20, '', 'EGPH1811', '', '', '2016-09-23 16:47:14'),
(21, '', 'EGPH1608', '', '', '2016-09-29 15:17:14'),
(22, '', 'EG11614', '', '', '2016-10-06 16:44:16'),
(23, '', 'BW11473', '', '', '2016-10-06 16:55:05');

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
-- Table structure for table `billingcategorization`
--

CREATE TABLE IF NOT EXISTS `billingcategorization` (
`categoryid` int(11) NOT NULL,
  `clientcategory` varchar(30) NOT NULL,
  `categorydescription` text NOT NULL,
  `dateadded` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB AUTO_INCREMENT=15 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `billingcategorization`
--

INSERT INTO `billingcategorization` (`categoryid`, `clientcategory`, `categorydescription`, `dateadded`) VALUES
(1, 'HMO', 'Health Management Organization', '2016-11-07 09:16:36'),
(2, 'NHIS', 'National Health Insurance Scheme', '2016-11-07 09:18:00'),
(3, 'Private', 'Private clients. Billed at Hospital rate', '2016-11-07 09:18:35'),
(4, 'Corporate', 'Company clients billed at company negotiated rate', '2016-11-07 09:19:14'),
(5, 'Staff', 'Mt. Sinai Hospital staff', '2016-11-07 09:19:52'),
(6, 'NHIS plan B', 'hia', '2016-11-10 12:02:28'),
(8, 'Islamiya', 'For Hijab wearing', '2016-11-10 12:18:33'),
(9, 'Ibrr', 'Ibrr Clients Only', '2016-11-10 12:36:26'),
(10, 'kk', 'jasd', '2016-11-10 12:36:51'),
(11, 'dfsdf', 'sdfsd', '2016-11-10 12:45:18'),
(12, 'James', 'hasd', '2016-11-10 12:59:39'),
(14, 'NHIS B', 'Second batch', '2016-11-11 13:14:49');

-- --------------------------------------------------------

--
-- Table structure for table `billingdiagnosis`
--

CREATE TABLE IF NOT EXISTS `billingdiagnosis` (
`diagnosisid` int(11) NOT NULL,
  `diagnosisname` varchar(30) NOT NULL,
  `diagnosisdescription` text NOT NULL,
  `dateadded` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `billinginvestigation`
--

CREATE TABLE IF NOT EXISTS `billinginvestigation` (
`investigationid` int(11) NOT NULL,
  `investigationname` varchar(50) NOT NULL,
  `investigationdescription` text NOT NULL,
  `dateadded` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `billinginvestigation`
--

INSERT INTO `billinginvestigation` (`investigationid`, `investigationname`, `investigationdescription`, `dateadded`) VALUES
(1, 'FBS', 'Fasting Blood Glucos', '2016-11-10 06:49:14');

-- --------------------------------------------------------

--
-- Table structure for table `billingservicecategory`
--

CREATE TABLE IF NOT EXISTS `billingservicecategory` (
`serviceid` int(11) NOT NULL,
  `servicename` varchar(100) NOT NULL,
  `servicedescription` text NOT NULL,
  `datecreated` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `billingservicecategory`
--

INSERT INTO `billingservicecategory` (`serviceid`, `servicename`, `servicedescription`, `datecreated`) VALUES
(1, 'Registration and consultation for all OPD cases', 'Registration and consultation', '2016-11-11 10:37:54'),
(2, 'Obstetrics and Gyneacology - Bundled Pricing for treatment', 'O and G', '2016-11-11 10:38:58'),
(3, 'Neonatal Services - Bundled pricing for treatment', 'Neonatal', '2016-11-11 10:40:22'),
(4, 'Accomodation and Feeding', 'Daily charge', '2016-11-11 10:40:49'),
(5, 'Surgical Procedures', 'Surgeries', '2016-11-11 10:41:17');

-- --------------------------------------------------------

--
-- Table structure for table `billingservicecategoryelement`
--

CREATE TABLE IF NOT EXISTS `billingservicecategoryelement` (
`elementid` int(11) NOT NULL,
  `categoryid` int(11) NOT NULL,
  `elementname` varchar(200) NOT NULL,
  `dateadded` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB AUTO_INCREMENT=101 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `billingservicecategoryelement`
--

INSERT INTO `billingservicecategoryelement` (`elementid`, `categoryid`, `elementname`, `dateadded`) VALUES
(3, 1, 'Registration - Individual', '2016-11-11 12:21:42'),
(4, 1, 'Registration - Family (of 6)', '2016-11-11 12:22:18'),
(5, 1, 'Consultation - Medical Officer', '2016-11-11 12:22:32'),
(6, 1, 'Follow-Up consultation - Medical Officer', '2016-11-11 12:23:06'),
(7, 1, 'Consultation - SCIB only', '2016-11-11 12:23:32'),
(8, 1, 'Follow-Up consultation - SCIB only', '2016-11-11 12:27:05'),
(12, 1, 'Consultation - Specialist', '2016-11-11 12:31:35'),
(13, 1, 'Follow Up Consultation - Specialist', '2016-11-11 12:31:44'),
(14, 1, 'Injection administrative fee (For every round of injections at OPD only)', '2016-11-11 12:32:30'),
(15, 2, 'ANC consultation and generic drugs per visit (ONLY if woman did not subscribe to package, cost inves', '2016-11-11 12:34:35'),
(16, 2, 'RHOGAM Injection', '2016-11-11 12:35:20'),
(17, 2, 'Normal Delivery - Booked patient', '2016-11-11 12:35:44'),
(18, 2, 'Normal Delivery - Unbooked patient', '2016-11-11 12:35:52'),
(19, 2, 'Assisted Delivery - Booked patient', '2016-11-11 12:36:14'),
(20, 2, 'Assisted Delivery - Unbooked patient', '2016-11-11 12:36:37'),
(21, 2, 'Twin delivery - Booked Patient', '2016-11-11 12:36:56'),
(22, 2, 'Twin delivery - Unbooked Patient', '2016-11-11 12:37:04'),
(23, 2, 'Birth before arrival care (BBA)', '2016-11-11 12:37:23'),
(24, 2, 'ANC Package (Incl. consultations, booking and routine ANC investigations, routine drugs + 2 obstetric scans)', '2016-11-11 12:41:23'),
(25, 2, 'ANC Package (Incl. consultations, booking and routine ANC investigations, routine drugs + 2 obstetric scnas, basic infant vaccinations and circumcisions/ear piearcing))', '2016-11-11 12:43:14'),
(26, 2, 'CEASEREAN SECTION (elective) - All inclusive of Anaesthesia, room (7 days) and routine drugs (Excluding blood transfusion)', '2016-11-11 12:44:49'),
(27, 2, 'CEASEREAN SECTION (emergency and previous scar) - ALL inclusive of Anaesthesia, room (7days) and routine drugs (Excluding blood transfusion)', '2016-11-11 12:45:49'),
(28, 2, 'Post Abortal D&C/Evacuation', '2016-11-11 12:46:16'),
(29, 2, 'Ectopic Pregnancy (Anaesthesia inclusive)', '2016-11-11 12:46:49'),
(30, 2, 'Examination under anaesthesia', '2016-11-11 12:47:05'),
(31, 2, 'Myomectomy (Anaesthesia Inclusive)', '2016-11-11 12:47:33'),
(35, 2, 'Pint of blood', '2016-11-11 12:49:19'),
(36, 2, 'Uterine Evacuation for incomplete abortion', '2016-11-11 12:49:37'),
(37, 3, 'EPI immunization', '2016-11-11 12:51:41'),
(39, 3, 'Hepatitis B Vaccination (HBV)/Pentavalent', '2016-11-11 12:52:25'),
(40, 3, 'Haemophilus Influenza Vaccination (HIB)', '2016-11-11 12:52:59'),
(41, 3, 'Pneumococcal Vaccine', '2016-11-11 12:53:15'),
(42, 3, 'Measles, Mumps, Rubella, Vaccination (MMR)', '2016-11-11 12:53:40'),
(43, 3, 'Circumcision for male baby', '2016-11-11 12:53:56'),
(44, 3, 'Ear Piercing', '2016-11-11 12:54:06'),
(45, 3, 'Phototherapy (per diem)', '2016-11-11 12:54:21'),
(46, 4, 'Observation', '2016-11-11 12:56:22'),
(47, 4, 'Admissions - General Ward (Room Rate per day)', '2016-11-11 12:56:52'),
(48, 4, 'Admissions - Semi-Private (Room Rate per day)', '2016-11-11 12:57:12'),
(49, 4, 'Admissions - Private (Room Rate per day)', '2016-11-11 12:57:21'),
(50, 4, 'Feeding (daily) From day of admission', '2016-11-17 11:28:25'),
(51, 4, 'Professional review - Daily', '2016-11-17 11:28:42'),
(52, 5, 'Minor Abscess ( I & D )', '2016-11-17 11:30:33'),
(54, 5, 'Moderate Abscess ( I & D )', '2016-11-17 11:31:13'),
(55, 5, 'Major Abscess ( I & D)', '2016-11-17 11:31:33'),
(56, 5, 'Daily Dressing - Minor', '2016-11-17 11:31:42'),
(57, 5, 'Daily Dressing - Major', '2016-11-17 11:31:50'),
(58, 5, 'Bilateral Antral Washout (BAWO)', '2016-11-17 11:32:08'),
(59, 5, 'Cervical Biopsy', '2016-11-17 11:32:17'),
(60, 5, 'Chest Tube Insertion', '2016-11-17 11:32:27'),
(61, 5, 'Chest Tube Kit', '2016-11-17 11:32:40'),
(62, 5, 'Ear Syringing', '2016-11-17 11:33:00'),
(63, 5, 'Excision of breast Lump (Excluding histology cost)', '2016-11-17 11:33:23'),
(64, 5, 'Ganglionectomy (Excluding histology cost)', '2016-11-17 11:33:53'),
(65, 5, 'Lipectomy (Excluding histology cost)', '2016-11-17 11:34:13'),
(66, 5, 'Marsupialization (Bartholins CYST)', '2016-11-17 11:34:39'),
(67, 5, 'Pterigium Excision', '2016-11-17 11:34:56'),
(68, 5, 'Shirodkar Operationa/Cervical Circlage Insertion', '2016-11-17 11:35:21'),
(69, 5, 'Appendectomy (Anaesthesia Inclusive)', '2016-11-17 11:37:42'),
(71, 5, 'Appendectomy (Ruptured)(Anaesthesia Inclusive)', '2016-11-17 11:37:58'),
(72, 5, 'Haemorroidectomy (Anaesthesia inclusive)', '2016-11-17 11:38:33'),
(73, 5, 'Herniotomy (Anaesthesia Inclusive)', '2016-11-17 11:38:59'),
(74, 5, 'Herniorrhaphies (Anaesthesia Inclusive)', '2016-11-17 11:39:20'),
(75, 5, 'Hydrocoelectomy (Anaesthesia Inclusive)', '2016-11-17 11:39:56'),
(76, 5, 'Low Fistulectomy (Anaesthesia Inclusive)', '2016-11-17 11:40:12'),
(77, 5, 'Varicocoelectomy (Anaesthesia Inclusive)', '2016-11-17 11:40:28'),
(78, 5, 'Surgery for in growing toe nail', '2016-11-17 11:42:28'),
(79, 5, 'Suprapubic Cystostomy', '2016-11-17 11:42:58'),
(80, 5, 'Wound Debridement', '2016-11-17 11:43:13'),
(81, 5, 'Adenotonsillectomy (Anaesthesia Inclusive)', '2016-11-17 11:43:43'),
(82, 5, 'Surgery for ectopic pregnancy (Anaesthesia Inclusive)', '2016-11-17 11:43:57'),
(83, 5, 'ORTHOPAEDICS - Release of trigger finger (Refer to Igbobi)', '2016-11-17 11:44:39'),
(84, 5, 'ORTHOPAEDICS - Simple manipulation of dislocation or closed fracture', '2016-11-17 11:45:13'),
(85, 5, 'ORTHOPAEDICS - Application of Full Upper Limb POP cast (Includes cost of manipulation, application plus POP and Crape bandage)', '2016-11-17 11:46:22'),
(86, 5, 'ORTHOPAEDICS - Application of short arm upper LIMB POP cast (Includes cost of manipulation, application plus POP and crape bandage', '2016-11-17 11:47:44'),
(87, 5, 'ORTHOPAEDICS - Application of full lower limb POP cast ( Includes cost of manipulation, application plus POP and Crape bandage )', '2016-11-17 11:49:04'),
(88, 5, 'ORTHOPAEDICS - Application of short lower limb POP cast ( Includes cost of manipulation, application plus POP and Crape bandage )', '2016-11-17 11:49:32'),
(89, 5, 'Scotch Cast Application', '2016-11-17 11:49:44'),
(90, 5, 'Crutches (When needed)', '2016-11-17 11:49:57'),
(91, 5, 'IUCD Insertion', '2016-11-17 11:50:17'),
(92, 5, 'IUCD Removal', '2016-11-17 11:50:26'),
(93, 5, 'Urethral Bouginage', '2016-11-17 11:50:39'),
(94, 5, 'Release of tongue tie', '2016-11-17 11:50:50'),
(95, 5, 'Paps Smear', '2016-11-17 11:51:02'),
(96, 5, 'Spirometry', '2016-11-17 11:51:10'),
(97, 5, 'Oxygen per diem', '2016-11-17 11:51:20'),
(98, 5, 'Neck Collar (Hard)', '2016-11-17 11:51:34'),
(99, 5, 'Neck Collar (Soft)', '2016-11-17 11:51:39'),
(100, 5, 'Walking Frame', '2016-11-17 11:51:47');

-- --------------------------------------------------------

--
-- Table structure for table `billingsubscriberplan`
--

CREATE TABLE IF NOT EXISTS `billingsubscriberplan` (
`planid` int(11) NOT NULL,
  `subscriberid` int(2) NOT NULL,
  `subscriberplanname` varchar(30) NOT NULL,
  `dateadded` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `billingsubscriberplan`
--

INSERT INTO `billingsubscriberplan` (`planid`, `subscriberid`, `subscriberplanname`, `dateadded`) VALUES
(1, 3, 'Gold', '2016-11-09 16:36:55'),
(2, 2, 'Silver', '2016-11-09 16:37:04'),
(6, 2, 'hhh', '2016-11-10 22:01:41'),
(7, 2, 'Gold', '2016-11-10 22:08:03'),
(8, 3, 'hhhh', '2016-11-10 22:08:45'),
(9, 4, 'MavroHeat', '2016-11-11 04:53:24'),
(10, 5, 'Private', '2016-11-21 08:52:20');

-- --------------------------------------------------------

--
-- Table structure for table `billingsubscriberrate`
--

CREATE TABLE IF NOT EXISTS `billingsubscriberrate` (
`rateid` int(11) NOT NULL,
  `planid` int(2) NOT NULL,
  `servicecategoryid` int(2) NOT NULL,
  `price` int(9) NOT NULL,
  `datecreated` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `billingsubscribers`
--

CREATE TABLE IF NOT EXISTS `billingsubscribers` (
`subscriberid` int(11) NOT NULL,
  `subscribername` varchar(30) DEFAULT 'NOT NULL',
  `subscriberaddress` text NOT NULL,
  `anchorname` varchar(40) NOT NULL,
  `anchorphone` varchar(15) NOT NULL,
  `clientcategory` int(2) NOT NULL,
  `dateadded` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `billingsubscribers`
--

INSERT INTO `billingsubscribers` (`subscriberid`, `subscribername`, `subscriberaddress`, `anchorname`, `anchorphone`, `clientcategory`, `dateadded`) VALUES
(2, 'Hygeia', 'Sobo-Arobiudu', 'Mrs. Phillips', '080325361723', 4, '2016-11-10 15:22:55'),
(3, 'Axa Mansard', 'Sobo Arobiudu', 'Mrs. Basirat', '070342773892', 4, '2016-11-10 16:19:49'),
(4, 'Clearline ', 'Clearline addresses', 'Ibrahim Sheikh', '090345234234', 1, '2016-11-10 16:23:11'),
(5, 'Private', '', '', '', 3, '2016-11-10 16:23:55'),
(6, 'Staff', 'Mt. Sinai Hospitals', 'Mr. Fawibe', '08036245263', 5, '2016-11-10 16:48:32');

-- --------------------------------------------------------

--
-- Table structure for table `carpoolschedule`
--

CREATE TABLE IF NOT EXISTS `carpoolschedule` (
`sn` int(11) NOT NULL,
  `requestingstaff` int(3) NOT NULL,
  `destination` varchar(100) NOT NULL,
  `purposeoftravel` varchar(200) NOT NULL,
  `dateWtime` datetime NOT NULL,
  `duration` int(4) NOT NULL,
  `freight` varchar(5) NOT NULL,
  `approval` int(1) NOT NULL,
  `dateadded` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `carpoolschedule`
--

INSERT INTO `carpoolschedule` (`sn`, `requestingstaff`, `destination`, `purposeoftravel`, `dateWtime`, `duration`, `freight`, `approval`, `dateadded`) VALUES
(1, 3, 'Egbe', 'Training for staff', '2016-09-06 00:00:00', 2, 'No', 1, '2016-09-06 10:14:03'),
(2, 2, 'Surulere', 'Begin third training', '2016-09-06 00:00:00', 1, 'Yes', 1, '2016-09-06 11:10:40'),
(3, 3, 'Mt. Sinai Surulere', 'Transport Drugs', '2016-12-31 00:00:00', 2, 'no', 0, '2016-09-13 12:39:35');

-- --------------------------------------------------------

--
-- Table structure for table `checkinlog`
--

CREATE TABLE IF NOT EXISTS `checkinlog` (
`sn` int(11) NOT NULL,
  `unitid` varchar(3) NOT NULL,
  `hospitalid` varchar(10) NOT NULL,
  `checkin` time NOT NULL,
  `checkout` time NOT NULL,
  `date` date NOT NULL,
  `datetime` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB AUTO_INCREMENT=26 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `checkinlog`
--

INSERT INTO `checkinlog` (`sn`, `unitid`, `hospitalid`, `checkin`, `checkout`, `date`, `datetime`) VALUES
(1, '', 'MSH2141GD', '13:41:28', '00:00:00', '0000-00-00', '2016-10-31 13:41:28'),
(2, '', 'MSH2141GD', '13:44:09', '00:00:00', '0000-00-00', '2016-10-31 13:44:09'),
(3, '', 'MSH2141GD', '14:17:34', '00:00:00', '0000-00-00', '2016-10-31 14:17:34'),
(4, '', 'MSH2141GD', '14:56:38', '00:00:00', '0000-00-00', '2016-10-31 14:56:38'),
(5, '', 'MSH2141GD', '15:53:42', '00:00:00', '0000-00-00', '2016-10-31 15:53:42'),
(6, '', 'MSH2141GD', '15:57:47', '00:00:00', '0000-00-00', '2016-10-31 15:57:47'),
(7, '', 'MSH2141GD', '15:57:49', '00:00:00', '0000-00-00', '2016-10-31 15:57:49'),
(9, '', 'MSH2141GD', '08:43:33', '00:00:00', '2011-01-16', '2016-11-01 08:43:33'),
(10, '', 'MSH2141GD', '08:44:52', '00:00:00', '2011-01-16', '2016-11-01 08:44:52'),
(11, '', 'MSH2141GD', '08:44:53', '00:00:00', '2011-01-16', '2016-11-01 08:44:53'),
(12, '', 'MSH2831GD', '13:17:30', '00:00:00', '2011-01-16', '2016-11-01 13:17:30'),
(13, '', 'MSH2831GD', '14:40:03', '00:00:00', '2011-01-16', '2016-11-01 14:40:03'),
(14, '', 'MSH2831GD', '15:41:56', '00:00:00', '2011-01-16', '2016-11-01 15:41:56'),
(15, '', 'MSH2141GD', '16:16:26', '00:00:00', '2011-01-16', '2016-11-01 16:16:26'),
(16, '', 'MSH2831GD', '14:19:44', '00:00:00', '2011-03-16', '2016-11-03 14:19:44'),
(17, '', 'MSH2831GD', '09:03:34', '00:00:00', '2011-04-16', '2016-11-04 09:03:34'),
(18, '', 'MSH2831GD', '10:05:56', '00:00:00', '2011-07-16', '2016-11-07 10:05:56'),
(19, '', 'MSH2831GD', '15:22:11', '00:00:00', '2011-07-16', '2016-11-07 15:22:11'),
(20, '', 'MSH2831GD', '17:08:15', '00:00:00', '2011-09-16', '2016-11-09 17:08:15'),
(21, '', 'MSH2831GD', '17:11:11', '00:00:00', '2011-09-16', '2016-11-09 17:11:11'),
(22, '', 'MSH2831GD', '06:41:32', '00:00:00', '2011-11-16', '2016-11-11 06:41:32'),
(23, '', 'MSH2831GD', '14:03:24', '00:00:00', '2011-11-16', '2016-11-11 14:03:24'),
(24, '', 'MSH2141GD', '14:11:27', '00:00:00', '2011-11-16', '2016-11-11 14:11:27'),
(25, '', 'MSH2141GD', '12:07:06', '00:00:00', '0000-00-00', '2016-12-28 12:07:06');

-- --------------------------------------------------------

--
-- Table structure for table `chronicmessages`
--

CREATE TABLE IF NOT EXISTS `chronicmessages` (
`msgeid` int(11) NOT NULL,
  `illnesscategory` int(2) NOT NULL,
  `recipientnumber` int(4) NOT NULL,
  `messagecontent` varchar(320) NOT NULL,
  `datesent` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `chronicmessages`
--

INSERT INTO `chronicmessages` (`msgeid`, `illnesscategory`, `recipientnumber`, `messagecontent`, `datesent`) VALUES
(1, 0, 1, 'Second Malaria tip.. Are you all getting this?', '2016-09-25 18:00:34'),
(2, 3, 1, 'Third Malaria tip.. Affix illnesscategory', '2016-09-25 18:01:57');

-- --------------------------------------------------------

--
-- Table structure for table `clientlist`
--

CREATE TABLE IF NOT EXISTS `clientlist` (
`sn` int(11) NOT NULL,
  `memberid` varchar(8) NOT NULL,
  `newid` varchar(8) NOT NULL,
  `lastname` varchar(20) NOT NULL,
  `firstname` varchar(20) NOT NULL,
  `othername` varchar(20) NOT NULL,
  `legacycode` varchar(8) NOT NULL,
  `alternatecode1` varchar(8) NOT NULL,
  `principalid` varchar(8) NOT NULL,
  `dependentid` varchar(2) NOT NULL,
  `gendername` varchar(6) NOT NULL,
  `deptypename` varchar(10) NOT NULL,
  `plancode` varchar(4) NOT NULL,
  `planname` varchar(25) NOT NULL,
  `groupname` varchar(100) NOT NULL,
  `datetime` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `clientsurvey`
--

CREATE TABLE IF NOT EXISTS `clientsurvey` (
`surveyid` int(11) NOT NULL,
  `clientname` varchar(60) NOT NULL,
  `clientvisitdate` date NOT NULL,
  `clientphone` varchar(15) NOT NULL,
  `clientrating` varchar(5) NOT NULL,
  `clientreason` text NOT NULL,
  `datetime` varchar(10) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `clientsurvey`
--

INSERT INTO `clientsurvey` (`surveyid`, `clientname`, `clientvisitdate`, `clientphone`, `clientrating`, `clientreason`, `datetime`) VALUES
(1, 'James Rafiu', '2015-12-31', '08037274288', 'Bad', 'You guys can do it better', '2016-09-09'),
(2, 'Rabiu Kulu', '2015-10-30', '923488523949', 'Fair', 'Yea. the staff can be nicer', '2016-09-11'),
(3, 'Emmanuella Rafiu', '2016-01-01', '07055518204', 'Great', 'We dey here', '2016-09-11'),
(4, 'James', '0000-00-00', '76869900090', 'Great', 'We loved everything about us', '2016-09-11'),
(5, 'James', '2016-10-30', '76869900090', 'Great', 'We loved everything about us', '2016-09-11'),
(6, 'James butler', '2016-12-31', '823477234885993', 'Bad', 'Response time is slow', '2016-09-11'),
(7, 'Emmanuella Olotu', '2016-01-01', '812398791873987', 'Good', 'Thanks for everything Mt. Sinai', '2016-09-11'),
(8, 'James Olowoporoku', '2016-01-01', '08034203576', 'Bad', 'We are hungry please let us in', '2016-09-11'),
(9, 'Emmanuella Olowoporoku', '2016-01-01', '07055518205', 'Bad', 'We are grateful to the almighty Jehovah', '2016-09-11'),
(10, 'James butler Olowoporoku', '2016-01-01', '070333624123', 'Fair', 'We know we can do better', '2016-09-11');

-- --------------------------------------------------------

--
-- Table structure for table `departments`
--

CREATE TABLE IF NOT EXISTS `departments` (
`id` int(11) NOT NULL,
  `departmentid` varchar(2) NOT NULL,
  `departmentname` varchar(20) NOT NULL,
  `datecreated` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=latin1;

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
(9, 'HR', 'Human Resource', '2016-03-10 11:47:15'),
(10, 'PH', 'Pharmacy', '2016-08-17 15:14:19');

-- --------------------------------------------------------

--
-- Table structure for table `dispensarylog`
--

CREATE TABLE IF NOT EXISTS `dispensarylog` (
`sn` int(11) NOT NULL,
  `unitid` int(2) NOT NULL,
  `drugid` int(2) NOT NULL,
  `qtydispensed` int(5) NOT NULL,
  `datedispensed` varchar(12) NOT NULL,
  `dateRecorded` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

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
(13, 'Syringe', '2016-05-27 07:14:40');

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
-- Table structure for table `drugsusage`
--

CREATE TABLE IF NOT EXISTS `drugsusage` (
`sn` int(11) NOT NULL,
  `patientID` varchar(80) NOT NULL,
  `siteid` varchar(3) NOT NULL,
  `DrugID` varchar(4) NOT NULL,
  `InitialQty` int(5) NOT NULL,
  `QtyDispensed` int(4) NOT NULL,
  `QtyLeft` int(5) NOT NULL,
  `userid` varchar(10) NOT NULL,
  `DateTime` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `drugsusage`
--

INSERT INTO `drugsusage` (`sn`, `patientID`, `siteid`, `DrugID`, `InitialQty`, `QtyDispensed`, `QtyLeft`, `userid`, `DateTime`) VALUES
(1, 'MSH2831GD', 'BW', '2', 307, 23, 284, '16', '2016-10-11 15:43:43'),
(3, 'MSH2831GD', 'BW', '2', 284, 12, 272, '16', '2016-10-11 15:45:08'),
(4, 'MSH2831GD', 'BW', '2', 272, 5, 267, '16', '2016-10-11 15:46:15'),
(9, 'MSH2831GD', 'BW', '2', 267, 4, 263, '16', '2016-10-11 15:51:41'),
(10, 'MSH2141GD', 'BW', '2', 263, 34, 229, '16', '2016-10-11 16:06:24');

-- --------------------------------------------------------

--
-- Table structure for table `enrolleelist`
--

CREATE TABLE IF NOT EXISTS `enrolleelist` (
  `sn` int(4) NOT NULL,
  `hospitalnumber` varchar(10) NOT NULL,
  `lastname` varchar(30) NOT NULL,
  `firstname` varchar(20) NOT NULL,
  `othername` varchar(20) NOT NULL,
  `dateofbirth` varchar(15) NOT NULL,
  `gender` varchar(10) NOT NULL,
  `homeaddress` varchar(500) NOT NULL,
  `phonenumber` varchar(15) NOT NULL,
  `emailaddress` varchar(60) NOT NULL,
  `staffid` varchar(3) NOT NULL,
  `datesaved` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `enrolleelist`
--

INSERT INTO `enrolleelist` (`sn`, `hospitalnumber`, `lastname`, `firstname`, `othername`, `dateofbirth`, `gender`, `homeaddress`, `phonenumber`, `emailaddress`, `staffid`, `datesaved`) VALUES
(0, 'MSH2831GD', 'Agbede', 'Kayode', 'Josh', '2016-01-01', 'Male', 'Ibrahim Taiwo Road, Bacita', '07055518207', '', '16', '2016-10-11 13:12:21'),
(0, 'MSH2141GD', 'Junta', 'Kayode', 'Olutintin', '2010-01-03', 'Male', 'Ibrahim Taiwo Rd, Bacita', '08034203576', '', '16', '2016-10-11 16:05:47');

-- --------------------------------------------------------

--
-- Table structure for table `illnesscategory`
--

CREATE TABLE IF NOT EXISTS `illnesscategory` (
`sn` int(11) NOT NULL,
  `illness` varchar(50) NOT NULL,
  `aboutilless` varchar(200) NOT NULL,
  `datecreated` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `illnesscategory`
--

INSERT INTO `illnesscategory` (`sn`, `illness`, `aboutilless`, `datecreated`) VALUES
(1, 'Hypertension', 'High blood pressure people', '2016-09-06 10:48:49'),
(2, 'Diabetes', 'High sugar level people', '2016-09-06 10:48:49'),
(3, 'Malaria', 'Acute malaria', '2016-09-06 12:00:17'),
(4, 'Tuberculosis', 'Bloody cough', '2016-09-06 13:09:05');

-- --------------------------------------------------------

--
-- Table structure for table `jobdetail`
--

CREATE TABLE IF NOT EXISTS `jobdetail` (
`sn` int(11) NOT NULL,
  `jobid` varchar(10) NOT NULL,
  `jobtitle` varchar(60) NOT NULL,
  `jobdescription` text NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=14 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `jobdetail`
--

INSERT INTO `jobdetail` (`sn`, `jobid`, `jobtitle`, `jobdescription`) VALUES
(1, '', 'Data Management (Manager)', 'All data management issues '),
(6, '', 'Procurement', '<p>All things procurement</p><p><br></p><p>From hardware to soft items</p>'),
(8, '', 'Security Officer', 'Security will be responsible for the security of all property'),
(9, '', 'HR Secretary', 'To assist the Human resource Personnel'),
(10, '', 'Human Resource Manager', 'Be responsible for HR activities at all sites'),
(11, '', 'Call Centre', 'Manage Call Centre operations'),
(12, '', 'Pharmacy Personel', 'Ensure drugs never run out of stock'),
(13, '', 'Hospital Administrator', 'Manages hospital staff');

-- --------------------------------------------------------

--
-- Table structure for table `nigerianstates`
--

CREATE TABLE IF NOT EXISTS `nigerianstates` (
`id` int(11) NOT NULL,
  `statename` varchar(30) NOT NULL,
  `datecreated` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB AUTO_INCREMENT=24 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `nigerianstates`
--

INSERT INTO `nigerianstates` (`id`, `statename`, `datecreated`) VALUES
(1, 'Abia', '2016-03-11 14:04:44'),
(2, 'Akwa-Ibom', '2016-03-11 14:04:44'),
(3, 'Anambra', '2016-09-14 15:37:19'),
(4, 'Bauchi', '2016-09-14 15:37:19'),
(5, 'Bayelsa', '2016-09-14 15:37:30'),
(6, 'Borno', '2016-09-14 15:37:30'),
(7, 'Cross-River', '2016-09-14 15:37:45'),
(8, 'Delta', '2016-09-14 15:37:45'),
(9, 'Edo', '2016-09-14 15:37:56'),
(10, 'Enugu', '2016-09-14 15:37:56'),
(11, 'Imo', '2016-09-14 15:38:16'),
(12, 'Jigawa', '2016-09-14 15:38:16'),
(13, 'Kaduna', '2016-09-14 15:38:25'),
(14, 'Kwara', '2016-09-14 15:38:25'),
(15, 'Kano', '2016-09-14 15:38:33'),
(16, 'Kogi', '2016-09-14 15:38:33'),
(17, 'Lagos', '2016-09-14 15:38:52'),
(18, 'Niger', '2016-09-14 15:38:52'),
(19, 'Osun', '2016-09-14 15:39:01'),
(20, 'Oyo', '2016-09-14 15:39:01'),
(21, 'Ondo', '2016-09-14 15:39:23'),
(22, 'Ogun', '2016-09-14 15:39:23'),
(23, 'Rivers', '2016-09-14 15:39:44');

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
) ENGINE=InnoDB AUTO_INCREMENT=16 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `nokdetails`
--

INSERT INTO `nokdetails` (`sn`, `staffid`, `nokname`, `nokmobilenumber`, `nokaddress`, `datecreated`) VALUES
(1, 'EGAD1380', 'Dr. Agbede', '07055518205', '64/65 Ahmadu Bello Way, bacita', '2016-03-18 11:41:37'),
(2, 'BWFI1107', 'Mrs. Ibrahim Awosika', '080243264517', 'Ahmadu Bello Way, Bacita, Kwara State', '2016-03-18 15:27:14'),
(3, 'BWPR1081', '', '', '', '2016-05-18 12:30:24'),
(4, 'EGPR1106', '', '', '', '2016-07-26 09:27:09'),
(5, 'EGNR1319', '', '', '', '2016-08-17 13:06:11'),
(6, 'BWAD1454', '', '', '', '2016-08-17 13:29:23'),
(7, 'BWBD1198', '', '', '', '2016-09-06 16:27:12'),
(8, 'BWBD1682', '', '', '', '2016-09-14 14:40:55'),
(9, 'BWPH1237', '', '', '', '2016-09-20 12:06:05'),
(10, 'EGPH1112', '', '', '', '2016-09-23 13:01:35'),
(11, 'EGPH1833', '', '', '', '2016-09-23 14:20:46'),
(12, 'EGPH1811', '', '', '', '2016-09-23 15:47:14'),
(13, 'EGPH1608', '', '', '', '2016-09-29 14:17:14'),
(14, 'EG11614', '', '', '', '2016-10-06 15:44:16'),
(15, 'BW11473', '', '', '', '2016-10-06 15:55:05');

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
) ENGINE=InnoDB AUTO_INCREMENT=16 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `pensiondetails`
--

INSERT INTO `pensiondetails` (`pensiondetailsid`, `staffid`, `pensionpin`, `pensionadministrator`, `pensionadddate`) VALUES
(1, 'EGAD1380', '82378736', 'Mr. Aderibigbe', '2016-03-18 11:32:06'),
(2, 'BWFI1107', '7123554128', 'Mr. Ibrahim Oloruntoba', '2016-03-18 15:27:14'),
(3, 'BWPR1081', '', '', '2016-05-18 12:30:24'),
(4, 'EGPR1106', '', '', '2016-07-26 09:27:09'),
(5, 'EGNR1319', '', '', '2016-08-17 13:06:11'),
(6, 'BWAD1454', '', '', '2016-08-17 13:29:23'),
(7, 'BWBD1198', '', '', '2016-09-06 16:27:12'),
(8, 'BWBD1682', '', '', '2016-09-14 14:40:55'),
(9, 'BWPH1237', '', '', '2016-09-20 12:06:05'),
(10, 'EGPH1112', '', '', '2016-09-23 13:01:35'),
(11, 'EGPH1833', '', '', '2016-09-23 14:20:46'),
(12, 'EGPH1811', '', '', '2016-09-23 15:47:14'),
(13, 'EGPH1608', '', '', '2016-09-29 14:17:14'),
(14, 'EG11614', '', '', '2016-10-06 15:44:16'),
(15, 'BW11473', '', '', '2016-10-06 15:55:05');

-- --------------------------------------------------------

--
-- Table structure for table `pregnantwomen`
--

CREATE TABLE IF NOT EXISTS `pregnantwomen` (
`pregid` int(11) NOT NULL,
  `name` varchar(140) NOT NULL,
  `dateofbirth` date NOT NULL,
  `emailaddress` varchar(50) NOT NULL,
  `phonenumber` varchar(15) NOT NULL,
  `lastmentrualperiod` date NOT NULL,
  `givenbirth` int(1) NOT NULL,
  `dategivenbirth` date NOT NULL,
  `address` text NOT NULL,
  `status` int(1) NOT NULL,
  `dateregistered` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB AUTO_INCREMENT=34 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `pregnantwomen`
--

INSERT INTO `pregnantwomen` (`pregid`, `name`, `dateofbirth`, `emailaddress`, `phonenumber`, `lastmentrualperiod`, `givenbirth`, `dategivenbirth`, `address`, `status`, `dateregistered`) VALUES
(17, 'Shade Ibrahim', '2016-05-12', 'jkagbede@gmail.com', '08065985437', '2016-08-03', 1, '2016-06-08', 'Olotu Oluwagbenga street Obalende', 0, '2016-08-31 14:36:52'),
(18, 'Ibrahimovic', '2016-05-12', 'jkagbede@gmail.com', '08065985437', '2016-08-03', 1, '2016-08-10', '0', 0, '2016-08-31 14:40:22'),
(19, 'Ibrahim', '2016-05-12', 'ibrahimtaiwo@gmail.com', '08034203576', '2016-06-09', 1, '2016-10-03', '0', 0, '2016-08-31 14:45:26'),
(20, 'Olayode Taiwo', '2016-05-12', 'jkagbede@gmail.com', '08063812187', '2016-08-30', 1, '2016-11-09', '0', 0, '2016-08-31 14:46:27'),
(21, 'Ibrahim', '2016-05-12', 'jkagbede@gmail.com', '08065985437', '2016-08-02', 0, '0000-00-00', 'Egbeda', 0, '2016-08-31 14:48:03'),
(22, 'Ibrahim', '2016-05-12', 'jkagbede@gmail.com', '08065985437', '2016-08-10', 0, '0000-00-00', 'Egbeda', 0, '2016-08-31 14:48:35'),
(23, 'Ibrahim', '2016-05-12', 'jkagbede@gmail.com', '08065985437', '2016-07-20', 1, '2016-10-05', 'Egbeda', 1, '2016-08-31 14:49:12'),
(24, 'Ibrahim', '2016-05-12', 'jkagbede@gmail.com', '08065985437', '2016-07-13', 0, '0000-00-00', 'Egbeda', 0, '2016-08-31 14:49:20'),
(25, 'Ibrahim', '2016-05-12', 'jkagbede@gmail.com', '08063812187', '2016-07-13', 0, '0000-00-00', 'Egbeda', 0, '2016-08-31 14:49:47'),
(26, 'Ibrahim', '2016-05-12', 'jkagbede@gmail.com', '08063812187', '2016-07-27', 0, '0000-00-00', 'Egbeda', 0, '2016-08-31 14:58:59'),
(27, 'Ibrahim', '2016-05-12', 'jkagbede@gmail.com', '08063812187', '2016-07-20', 0, '0000-00-00', '0', 0, '2016-08-31 14:59:04'),
(28, 'Ibrahim Ologunoriola', '2016-05-12', 'jkagbede@gmail.com', '08063812187', '2016-07-13', 0, '0000-00-00', 'Safari', 0, '2016-08-31 14:59:08'),
(29, 'Mrs. Onigbinde', '2016-05-11', 'jkagbede@gmail.com', '08065985437', '2016-01-06', 0, '0000-00-00', 'Ibrahim Taiwo', 0, '2016-09-06 10:39:27'),
(30, 'Kayode Agbede', '2016-01-04', 'jkagbede@gmail.com', '08065985437', '2016-01-01', 0, '0000-00-00', '64/65 Ahmadu Bello Way, Bacita', 0, '2016-09-13 12:33:48'),
(31, 'Kayode Agbede', '2016-01-04', 'jkagbede@gmail.com', '08065985437', '2016-01-01', 0, '0000-00-00', '64/65 Ahmadu Bello Way, Bacita', 0, '2016-09-13 12:34:58'),
(32, 'Kayode Agbede', '2016-01-01', 'jkagbede@gmail.com', '08065985437', '2016-01-04', 1, '2016-10-13', '64/65 Ahmadu Bello Way, Bacita', 0, '2016-09-13 13:07:33'),
(33, 'Kayode Agbede', '2016-01-01', 'jkagbede@gmail.com', '08065985437', '2016-01-04', 0, '0000-00-00', '64/65 Ahmadu Bello Way, Bacita', 1, '2016-09-13 13:08:52');

-- --------------------------------------------------------

--
-- Table structure for table `pregnantwomendelivered`
--

CREATE TABLE IF NOT EXISTS `pregnantwomendelivered` (
`smsid` int(11) NOT NULL,
  `week` varchar(10) NOT NULL,
  `sms` text NOT NULL,
  `pages` int(1) NOT NULL,
  `datecreated` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB AUTO_INCREMENT=53 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `pregnantwomendelivered`
--

INSERT INTO `pregnantwomendelivered` (`smsid`, `week`, `sms`, `pages`, `datecreated`) VALUES
(1, 'newborn', 'Congratulations, your baby''s here! Give him the best by breastfeeding. If he refuses to feed or has difficulty breathing, go to the clinic. Hold your newborn ba', 1, '2016-08-30 14:37:27'),
(2, 'week1', 'Keep your baby quiet and warm. . If his eyes are yellow, breastfeed him more often. You will see his jaw moving as he feeds and hear him swallow.', 1, '2016-08-30 14:37:27'),
(3, 'week2', 'Some bleeding after birth is normal. If bleeding gets heavier, go to the clinic. Look for signs of infection.  If your discharge smells, tummy hurts or you have', 2, '2016-08-30 14:38:15'),
(4, 'week3', 'Breastmilk makes your baby strong so feed him 8-10 times daily. Don’t give him water or anything else. The longer your baby feeds each time, the richer your mil', 2, '2016-08-30 14:38:15'),
(5, 'week4', 'Observe your baby, If she is floppy and unresponsive, take her to the clinic. Your baby''s getting enough milk if he wets 6-8 nappies daily. Let your baby feed u', 2, '2016-08-30 14:38:59'),
(6, 'week5', 'If you have sore, pink, cracked nipples, go to the clinic with your baby. It could be a yeast infection. This week your baby will need vaccines to protect your ', 2, '2016-08-30 14:38:59'),
(7, 'week6', 'A good sign is your baby heavier as you pick him up. Feed your baby ONLY breastmilk. This prevents pregnancy until your baby turns 6 months. Watch your baby bre', 2, '2016-08-30 14:40:15'),
(8, 'week7', 'When you talk to your baby, he''ll respond by waving his arms and legs. Is your baby floppy, pale or not feeding well? Visit the clinic. A healthy baby is curiou', 2, '2016-08-30 14:40:15'),
(9, 'week8', 'Keep your baby off the ground, away from direct sunlight. Get rid of stools safely and wash your hands with soap. Your baby does not need water even when it''s h', 2, '2016-08-30 14:41:38'),
(10, 'week9', 'At 2 months old, breastmilk will help him gain nearly a kilo this month. Are your baby''s stools suddenly loose and watery? Breastfeed him often and see the clin', 2, '2016-08-30 14:41:38'),
(11, 'week10', 'Your clinician may give you iron & folic-acid pills to take for the next few months. This will help you recover. Wrap your baby with a cotton cloth to help her ', 2, '2016-08-30 14:42:25'),
(12, 'week11', 'Try breastfeeding if your baby is crying. Wrap/rock gently to soothe your baby. Crying is normal for babies, but if your baby is crying non-stop, or cries stran', 2, '2016-08-30 14:42:25'),
(13, 'week12', 'Your baby loves the sound of your voice. Make eye contact and smile. A fever, shivering and rapid breathing are signs of an ill baby. Your breasts may feel soft', 2, '2016-08-30 14:42:55'),
(14, 'week13', 'Make more time to play with your baby as baby stays longer during the day.  Are you feeling sad all the time? Talk to your health worker about this. Ask your fa', 2, '2016-08-30 14:43:57'),
(15, 'week14', 'Your baby''s next set of immunisations are due, this will protect against many diseases. Ask at the clinic. Ensure your baby sleeps inside insecticide-treated to', 2, '2016-08-30 14:43:57'),
(16, 'week15', 'Your baby is becoming more curious; Give him different toys and objects to look at. Wash your hands before cooking and eating and after using the toilet. If you', 2, '2016-08-30 14:44:45'),
(17, 'week16', 'Your baby can see more clearly now. ! If his eye gets infected, visit the clinic. Keep our room well ventilated. Your body is able to make as much breastmilk as', 2, '2016-08-30 14:44:45'),
(18, 'week17', 'Develop a routine so your baby knows what to expect and also help manage your time. Let your baby sleep on her/his back. Protect your baby from mosquitoes', 1, '2016-08-30 14:45:53'),
(19, 'week18', 'Breastmilk will help your baby recover from a cold. Try feeding while baby is sitting up. Babies get colds easily. If you want to give her traditional remedies,', 2, '2016-08-30 14:45:53'),
(20, 'week19', 'Talk to your baby more, this encourages your baby as he tries to copy words. Babies who are inactive, grunting, feverish or a blue colour are ill. Visit the cli', 2, '2016-08-30 14:46:51'),
(21, 'week20', 'Your baby''s skin is very sensitive to the sun. Give adequate clothe covering. Keep baby away from smoke- fire, cigarettes. Make your home safe for your baby. Re', 2, '2016-08-30 14:46:51'),
(22, 'week21', 'A good sign of development is when your baby laughs; try to make your baby laugh more. Wait at least two years so your next baby is healthy. Find out about fami', 2, '2016-08-30 14:47:42'),
(23, 'week22', 'Your baby''s first tooth will be coming through soon. If your baby tries to bite at the breast, pull him in close to you. Your breast will cover his nose and mak', 2, '2016-08-30 14:47:42'),
(24, 'week23', 'Play with your baby often. Putting your baby to sleep on pillows can be dangerous, baby doesn’t need one yet. Your periods might return soon. Talk to your healt', 2, '2016-08-30 14:48:21'),
(25, 'week24', 'Around now your baby will begin to recognise her own name. In a few weeks, he will be ready to try some other foods and water, but not yet. Spacing your family ', 2, '2016-08-30 14:48:21'),
(26, 'week25', 'Ensue your environment is clean. Look out for signs of illness. If your baby vomits more than 5 times during a day, go to the clinic. Wash your hands with water', 2, '2016-08-30 14:49:09'),
(27, 'week26', 'Your baby is moving a lot more now. Next week you can give your baby mashed foods. Your milk is still your baby''s main source of food, even after he starts eati', 2, '2016-08-30 14:49:09'),
(28, 'week27', 'Now your baby is 6 months, he can have some soft, mashed foods. Dispose of his stools in a latrine to keep your baby safe', 2, '2016-08-30 14:51:24'),
(29, 'week28', 'Hand washing helps keep your family healthy. Protect your baby from diarrhoea. Make sure his food is well-cooked and fresh. Give him only clean, safe water. Bea', 2, '2016-08-30 14:51:24'),
(30, 'week29', 'Your baby can hold toys well now. Teething can be painful. Rub a clean finger over his gums to numb the pain. Ensure you eat well and get some mild exercises da', 2, '2016-08-30 14:52:00'),
(31, 'week30', 'Your baby can detect your emotions. If he bites when feeding, take him off the breast and say ''no'' loudly! Don''t stop feeding him your milk. Trust your motherly', 2, '2016-08-30 14:52:58'),
(32, 'week31', 'Keep an eye on your baby as he/she moves around more or leave your baby with a responsible adult to prevent accidents. Learn about reliable methods to space bab', 2, '2016-08-30 14:52:58'),
(33, 'week32', 'Wash your baby’s hands with soap and water if he/she touches any animal. If your baby swallows anything poisonous, like kerosene or detergents, rush to the clin', 2, '2016-08-30 14:53:42'),
(34, 'week33', 'Your baby is too precious to take risks with. If she is ill, go to the clinic for good care. Sometimes leaving your baby with someone is good to help the baby l', 2, '2016-08-30 14:53:42'),
(35, 'week34', 'Comfort your baby when he accidentally bumps while walking/crawling. Keep your baby out of the cooking area. For your baby''s safety, cover water containers with', 2, '2016-08-30 14:54:37'),
(36, 'week35', 'Baby playtime may get noisy. Before drinking water or using it to cook, boil it to clean it. You can now give your baby food 3-4 times a day. Keep breastfeeding', 2, '2016-08-30 14:54:37'),
(37, 'week36', 'Discipline, although hard is necessary. Be firm but don''t shout. Chest pain and a cough that lasts over three weeks are signs of TB. If a family member has TB, ', 2, '2016-08-30 14:55:39'),
(38, 'week37', 'Your baby should be sitting well now. Your baby may try to stand up, if not visit the clinic. Visit the clinic for rashes or fever. If your baby gets bitten or ', 2, '2016-08-30 14:55:39'),
(39, 'week38', 'Putting your baby down to sleep at the same time every day will help her to settle. Feeling tired? Rest when your baby naps, drink plenty of clean water and mak', 2, '2016-08-30 14:56:43'),
(40, 'week39', 'Keep talking to your baby so he can learn more. Take your baby to the clinic to get vaccinated for measles. When your baby tries to walk, hold her hands to enco', 2, '2016-08-30 14:56:43'),
(41, 'week40', 'Many babies crawl, by this age, but some never crawl and go straight to walking. Your partner may feel left out. Suggest he gives the baby his baths. That will ', 2, '2016-08-30 15:03:23'),
(42, 'week41', 'Your baby is starting to understand simple words. ORS made up with clean water is vital when your baby has diarrhoea. Give him lots of clean water to prevent de', 2, '2016-08-30 15:03:23'),
(43, 'week42', 'If your baby has a cold, a fever & pulls his ear, it could be an ear infection. Go to the clinic. You can now give your baby food 3-4 times a day. Your baby may', 2, '2016-08-30 15:04:10'),
(44, 'week43', 'If your baby is hot, irritable and feeding poorly, may be a fever, go to the clinic. If your baby''s forehead, chest or back feel hot, bathe her in cool water. I', 2, '2016-08-30 15:04:10'),
(45, 'week44', 'Your baby now understands simple instructions. If your baby gets a cut, wash it well to prevent infection. Then rub some antiseptic cream. If baby’s eyes are st', 2, '2016-08-30 15:05:28'),
(46, 'week45', 'Use boiled water to wash fruits and vegetables to remove germs. Be patient if your baby refuses to eat. Bad food can cause diarrhoea. Buy fresh foods regularly', 1, '2016-08-30 15:05:28'),
(47, 'week46', 'New foods may make your baby''s stools hard. Feed her mashed fruit. Breastfeeding is still important. Take him to the clinic for ORS and zinc.', 1, '2016-08-30 15:06:15'),
(48, 'week47', 'Expect bruises as your baby crawls everywhere. As your baby turns 1, start introducing adult foods gently so she can adjust to the new diet.', 1, '2016-08-30 15:06:15'),
(49, 'week48', 'Your baby can now remember things. Don’t give your baby anything before checking at the clinic if ill. Try new food combinations to encourage her to adjust to t', 2, '2016-08-30 15:07:14'),
(50, 'week49', 'Your baby maybe able to feed herself. Ensure your baby’s hands are clean always. Keep an eye on your baby as she explores her world. Feeling overwhelmed? seek h', 2, '2016-08-30 15:07:14'),
(51, 'week50', 'Stay in touch with the clinic to know when to go for some more vaccines during the next year. Thick shoes or socks help protect your baby when he plays outside', 1, '2016-08-30 15:07:55'),
(52, 'week51', 'Talk to your clinician to know more ways to prevent getting pregnant soon. Keep breastfeeding your baby & continue to care for your baby. Goodbye and goodluck!', 1, '2016-08-30 15:07:55');

-- --------------------------------------------------------

--
-- Table structure for table `pregnantwomensms`
--

CREATE TABLE IF NOT EXISTS `pregnantwomensms` (
`smsid` int(11) NOT NULL,
  `week` varchar(50) NOT NULL,
  `sms` text NOT NULL,
  `pages` int(1) NOT NULL,
  `datecreated` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB AUTO_INCREMENT=43 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `pregnantwomensms`
--

INSERT INTO `pregnantwomensms` (`smsid`, `week`, `sms`, `pages`, `datecreated`) VALUES
(1, 'week1', 'Congratulations on your pregnancy and Welcome to the Mt. Sinai Hospitals ANC, over the next few weeks you will receive supportive messages from us once a week.', 1, '2016-08-30 13:51:14'),
(2, 'week2', 'Congratulations on your pregnancy and Welcome to the Mt. Sinai Hospitals ANC, over the next few weeks you will receive supportive messages from us once a week.', 1, '2016-08-30 13:51:14'),
(3, 'week3', 'Congratulations on your pregnancy and Welcome to the Mt. Sinai Hospitals ANC, over the next few weeks you will receive supportive messages from us once a week.', 1, '2016-08-30 13:51:28'),
(4, 'week4', 'Congratulations on your pregnancy and Welcome to the Mt. Sinai Hospitals ANC, over the next few weeks you will receive supportive messages from us once a week.', 1, '2016-08-30 13:51:28'),
(5, 'week5', 'Do you feel like vomiting; most women do in early pregnancy. Try having some pap or ginger, mint or lemon tea and rest as much as you can.', 1, '2016-08-30 13:52:54'),
(6, 'week6', 'Your baby is the size of a bean but he has tiny hands & feet & his heart is beating. Dont miss your antenatal clinics, as regular clinic visits help detect', 1, '2016-08-30 13:52:54'),
(7, 'week7', 'Your baby''s heart & brain are forming. Take iron and folic acid daily to help baby stay safe. Eat well, so baby will grow well. Try to eat some meat, eggs or be', 2, '2016-08-30 13:56:20'),
(8, 'week8', 'Your baby is the size of a grape and his bones are developing. Some medicines can harm your baby. Do not take medicines not prescribed by your Doctor.', 1, '2016-08-30 13:56:20'),
(9, 'week9', 'Even though the baby inside you, being very tired is normal. Growing a baby is hard work! Wash your hands after toilet & avoid stale food to prevent infections ', 1, '2016-08-30 13:57:40'),
(10, 'week10', 'Your baby is now the size of a date. Expect to receive your first dose of tetanus vaccine at your next visit to protect you and baby. Use iodized salt only for.', 2, '2016-08-30 13:57:40'),
(11, 'week11', 'Your baby is the size of your thumb and is protected by the water in your womb. Feeling dizzy? Sit down, eat & drink something, until you feel better. Get up sl', 2, '2016-08-30 13:58:45'),
(12, 'week12', 'If you have a fever, or start shaking & feeling sick, go to the clinic. A fever can affect your baby as well as you & needs treating. Sleep under a net. Wash yo', 2, '2016-08-30 13:58:45'),
(13, 'week13', 'Your baby is as big as half a banana! She is growing sucking muscles in her mouth. She will be ready to breastfeed as soon as she is born. Eat more meat or fish', 2, '2016-08-30 13:59:43'),
(14, 'week14', 'Your baby is growing hair & he can also grasp, frown and even suck his thumb! Try to eat an extra mouthful of food at each meal and extra snacks. Eat fruits, ve', 2, '2016-08-30 13:59:43'),
(15, 'week15', 'Inside you, your baby will just fit in the palm of your hand. He even has tiny fingernails and eye lashes. Avoid alcohol, smoking and smoky rooms. They can harm', 2, '2016-08-30 14:00:40'),
(16, 'week16', 'Your baby is now the size of a pear. He may have found his first toy - the umbilical cord! After birth, keep cord stump clean. Mosquitoes cause malaria. Always ', 2, '2016-08-30 14:00:40'),
(17, 'week17', 'Your baby is now the size of a small mango. If constipated, drink plenty of clean water & eat fruit & vegetables. Wash your hands with soap to prevent infection', 2, '2016-08-30 14:02:05'),
(18, 'week18', 'Your baby is twice the size he was last week. It is common to have backache in pregnancy. Lift heavy things carefully. Divide loads evenly between both hands. A', 2, '2016-08-30 14:02:05'),
(19, 'week19', 'Your baby has all her major organs now - the heart, liver and kidneys. Ask about your blood group at the clinic. Check if relatives have the same blood group. A', 1, '2016-08-30 14:06:03'),
(20, 'week20', 'You''re halfway through pregnancy! Your baby floats in fluid. This protects him from bumps, keeps him warm and lets him move around. Take time every day to feel ', 2, '2016-08-30 14:06:03'),
(21, 'week21', 'Your baby can hear your voice now, so talk & sing to him. Drink plenty of clean water all the day. Go to the clinic if you have a fever, vomiting, bleeding or p', 2, '2016-08-30 14:07:05'),
(22, 'week22', 'Your baby can turn over as well as kick. This is a good sign. Tell your clinician if you notice your baby moving much less than usual. As baby grows inside you,', 2, '2016-08-30 14:07:05'),
(23, 'week23', 'Your baby now has definite times of sleeping and waking. He may wake you with his kicks. Go to the clinic if the kicks slow down or stop. The area around your n', 2, '2016-08-30 14:10:31'),
(24, 'week24', 'Your baby''s sense of taste is developing, ready to enjoy your milk! Your breastmilk will make your baby grow strong. It''s the perfect food.', 1, '2016-08-30 14:10:31'),
(25, 'week25', 'Your baby is gaining fat. This will help keep him warm when he is born. You can help him by eating a few extra mouthfuls at each meal. A burning sensation at th', 2, '2016-08-30 14:12:00'),
(26, 'week26', 'Your baby is about the size of a pineapple. He is practising moving the muscles in his chest, so he will be ready to breathe at birth. Complications sometimes o', 2, '2016-08-30 14:12:00'),
(27, 'week27', 'Babies dream at this stage in pregnancy. Perhaps he''s dreaming about being born! If he''s not as active as usual, tell your clinician. Slightly swollen hands and', 2, '2016-08-30 14:16:28'),
(28, 'week28', 'Your baby responds to change - she may move when you undress! Feel thirsty and need to urinate a lot? Tell clinic staff, it may be diabetes. As your baby grows,', 2, '2016-08-30 14:16:28'),
(29, 'week29', 'Your baby is the same size as a large breadfruit. You may feel him reacting to light and sound. Eat 2 extra mouthfuls of food at each meal and a healthy snack b', 2, '2016-08-30 14:17:31'),
(30, 'week30', 'Your baby can open and close his eyes. Inside your womb, he can tell day from night by the way the light changes. It''s best to give birth at the clinic. Find ou', 2, '2016-08-30 14:17:31'),
(31, 'week31', 'If you could take a peek inside, you would see if you have a boy or girl, as the genitals have now developed. Have you felt your belly tighten suddenly, then re', 2, '2016-08-30 14:18:26'),
(32, 'week32', 'Your baby is getting plump! This body fat will keep him warm when he is born. Have 2 cloths ready. One to dry him and one to wrap him in.', 1, '2016-08-30 14:18:26'),
(33, 'week33', 'Your baby may settle head down now, the best position to be born! You may find it harder to walk. It''s time to slow down. If the bag of waters your baby is in b', 2, '2016-08-30 14:21:23'),
(34, 'week34', 'Sudden swelling of hands, face and feet is a sign of a problem. Tell your family, and ask them to take you to the clinic if they see this. Your baby will drop l', 2, '2016-08-30 14:21:23'),
(35, 'week35', 'Your body is designed to give birth. It will stretch and open with each contraction in labour, making space for your baby to be born.  Sometimes an operation is', 2, '2016-08-30 14:22:15'),
(36, 'week36 ', 'Your newborn baby will need help to stay warm when he''s born. Have some cloths ready to wrap and dry him with, and hold him close to you.', 1, '2016-08-30 14:22:15'),
(37, 'week37', 'A cord infection can make your baby very ill. Sponge the cord with clean water and leave it uncovered to dry. Don''t put anything else on it.\r\nDon''t bathe your b', 2, '2016-08-30 14:23:19'),
(38, 'week38', 'Your baby is curled up inside you all ready to be born. Low back pain is a sign that the baby is low down, ready to get born. Make sure you can get to the clini', 2, '2016-08-30 14:23:19'),
(39, 'week39', 'Your baby needs nothing else apart from breastmilk for the first 6 months. Your milk will contain all the water and goodness he needs.\r\nYour baby will need the ', 2, '2016-08-30 14:24:10'),
(40, 'week40', 'Your newborn needs warmth. Nurse him on your bare chest under a blanket. Go to the clinic, if his eyes, palms and feet turn yellow.\r\nYour new baby needs your ca', 2, '2016-08-30 14:24:10'),
(41, 'week41', 'Breastfeeding helps to reduce your bleeding after birth. Go to the clinic if your bleeding becomes heavy, clotted, smelly or you feel faint.', 1, '2016-08-30 14:25:47'),
(42, 'week42', 'If your baby is still not here by next week, visit the clinic. Make sure you can get to the clinic when labour does start.\r\nRegular, strong contractions are a s', 2, '2016-08-30 14:25:47');

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
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `requisitionborno_way`
--

INSERT INTO `requisitionborno_way` (`sn`, `drugid`, `requiredqty`, `qtyleft`, `minimumreorderlevel`, `datecreated`) VALUES
(2, 2, 43, 229, 30, '2016-05-17 14:23:20'),
(3, 1, 0, 0, 0, '2016-10-10 15:54:38'),
(5, 3, 0, 0, 0, '2016-10-10 15:55:24');

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
) ENGINE=InnoDB AUTO_INCREMENT=13 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `requisitionegbe`
--

INSERT INTO `requisitionegbe` (`sn`, `drugid`, `requiredqty`, `qtyleft`, `minimumreorderlevel`, `datecreated`) VALUES
(1, 1, 50, 11, 35, '2016-05-17 11:25:35'),
(11, 3, 0, 0, 0, '2016-10-04 14:07:41'),
(12, 2, 0, 0, 0, '2016-10-04 14:08:00');

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
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `requisitionfalolu`
--

INSERT INTO `requisitionfalolu` (`sn`, `drugid`, `requiredqty`, `qtyleft`, `minimumreorderlevel`, `datecreated`) VALUES
(1, 1, 20, -4, 15, '2016-05-17 11:25:35'),
(2, 2, 43, 2, 35, '2016-05-17 14:23:20');

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
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `requisitionikoyi_club`
--

INSERT INTO `requisitionikoyi_club` (`sn`, `drugid`, `requiredqty`, `qtyleft`, `minimumreorderlevel`, `datecreated`) VALUES
(1, 1, 20, 20, 15, '2016-05-17 11:25:35');

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
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `requisitionmushin`
--

INSERT INTO `requisitionmushin` (`sn`, `drugid`, `requiredqty`, `qtyleft`, `minimumreorderlevel`, `datecreated`) VALUES
(1, 1, 20, 20, 15, '2016-05-17 11:25:35'),
(2, 2, 55, 43, 20, '2016-05-17 14:23:20');

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
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `requisitiononikan`
--

INSERT INTO `requisitiononikan` (`sn`, `drugid`, `requiredqty`, `qtyleft`, `minimumreorderlevel`, `datecreated`) VALUES
(1, 1, 40, 30, 25, '2016-05-17 11:25:35');

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
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `sites`
--

INSERT INTO `sites` (`id`, `siteid`, `sitename`, `datecreated`) VALUES
(1, 'BW', 'Borno_Way', '2016-03-10 11:43:00'),
(3, 'ON', 'Onikan', '2016-03-10 11:43:26'),
(4, 'IC', 'Ikoyi_Club', '2016-03-10 11:43:26'),
(5, 'FA', 'Falolu', '2016-03-10 11:44:29'),
(6, 'IS', 'Mushin', '2016-03-10 11:44:29'),
(7, 'EG', 'Egbe', '2016-05-22 07:26:23');

-- --------------------------------------------------------

--
-- Table structure for table `staff`
--

CREATE TABLE IF NOT EXISTS `staff` (
`id` int(11) NOT NULL,
  `userid` varchar(8) NOT NULL,
  `staffid` varchar(20) NOT NULL,
  `unecnryptedpass` varchar(50) NOT NULL,
  `password` varchar(200) NOT NULL,
  `firstname` varchar(30) NOT NULL,
  `middlename` varchar(30) NOT NULL,
  `lastname` varchar(30) NOT NULL,
  `department` varchar(4) NOT NULL,
  `siteid` varchar(3) NOT NULL,
  `role` varchar(5) NOT NULL,
  `jobdetail` varchar(5) NOT NULL,
  `maritalstatus` varchar(20) NOT NULL,
  `gender` varchar(2) NOT NULL,
  `emailaddress` text NOT NULL,
  `phonenumber` varchar(15) NOT NULL,
  `homeaddress` text NOT NULL,
  `highestqualification` varchar(50) NOT NULL,
  `dirpath` text NOT NULL,
  `datecreated` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `syncstatus` int(1) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=17 DEFAULT CHARSET=latin1 COMMENT='Table holding all PurpleSource staff information';

--
-- Dumping data for table `staff`
--

INSERT INTO `staff` (`id`, `userid`, `staffid`, `unecnryptedpass`, `password`, `firstname`, `middlename`, `lastname`, `department`, `siteid`, `role`, `jobdetail`, `maritalstatus`, `gender`, `emailaddress`, `phonenumber`, `homeaddress`, `highestqualification`, `dirpath`, `datecreated`, `syncstatus`) VALUES
(1, 'EGAD1380', 'EGAD1380', '', 'a8bf615e8e9d1b984889614840b1de5a', 'Kayode', 'hjd', 'Agbede', '6', '0', '0', '', 'M', 'M', 'asd@sfdf.com', '2147483647', 'uvad qie gugiugb', 'Phd', 'HDD/psource_s/EGAD1380', '2016-03-18 12:32:06', 0),
(2, 'BWFI1107', 'BWFI1107', '', 'a8bf615e8e9d1b984889614840b1de5a', 'Michael', 'G', 'Mt. Sinari', '4', '0', '0', '', 'S', 'M', 'jkagbedeasda@gsdf.com', '2147483647', 'Mt. Sinai Hospital', 'M.Sc', 'HDD/psource_s/BWFI1107', '2016-03-18 16:27:14', 0),
(3, 'BWPR1081', 'BWPR1081', '', '63400edd1d8229ee8d2228597e9a14a3', 'Basirat', 'Ajoke', 'Sulaimon', '5', '0', '1', '', 'S', 'F', 'jkagbede@gmail.com', '07055518205', 'Gowon Estate', 'B.Sc', 'HDD/psource_s/BWPR1081', '2016-05-18 13:30:24', 0),
(4, 'EGPR1106', 'EGPR1106', '', 'a8bf615e8e9d1b984889614840b1de5a', 'Emmanuel', 'Olotu', 'Ibrahim', '0', '0', '0', '', 'S', 'F', 'gbegi123@yahoo.com', '08065985437', '64/65 Ahmadu Bello Way, Bacita', 'M.Sc', 'HDD/psource_s/EGPR1106', '2016-07-26 10:27:09', 0),
(5, 'EGNR1319', 'EGNR1319', 'GmY65I79', 'a8bf615e8e9d1b984889614840b1de5a', 'Ibrahim Olotu', 'James', 'Bond', '0', '0', '0', '', 'M', 'M', 'jkagbede@gmail.com', '08065985437', 'Ibrahim Taiwo road', 'M.Sc', 'HDD/psource_s/EGNR1319', '2016-08-17 14:06:11', 0),
(6, 'BWAD1454', 'BWAD1454', 'AbF89L73', 'a8bf615e8e9d1b984889614840b1de5a', 'Ibrahim Olotuk', 'Iya Rainbow', 'Bond', '10', 'BW', '0', '', 'M', 'F', 'jkagbede@gmail.com', '08065985437', 'Ibrahim Taiwo road', 'M.Sc', 'HDD/psource_s/BWAD1454', '2016-08-17 14:29:23', 0),
(7, 'BWBD1198', 'BWBD1198', 'EqP86C73', 'a8bf615e8e9d1b984889614840b1de5a', 'Fortune', 'O', 'Ehienulo', '0', 'BW', '0', '', 'S', 'M', 'jkagbede@gmail.com', '08065985437', 'Egbeda, Lagos state', 'M.Sc', 'HDD/psource_s/BWBD1198', '2016-09-06 17:27:12', 0),
(8, 'BWBD1682', 'BWBD1682', 'BkQ71D70', '6e643309c23be991478a98220dc6e7e6', 'Fortune', 'E', 'Ehienulo', '8', 'BW', '0', '11', 'M', 'M', 'jkagbede@gmail.com', '08065985437', '64/65 Ahmadu Bello Way, Bacita', 'B.Sc', 'HDD/psource_s/BWBD1682', '2016-09-14 15:40:55', 0),
(9, 'BWPH1237', 'BWPH1237', 'SwV85S67', '9480f7948c83af1f715e6ec0667f7860', 'Christiana', 'O', 'Igbinovia', '10', 'BW', '0', '12', 'M', 'F', 'gbegi123@yahoo.com', '08065985437', '8,LADIPO STREET EBUTE-METTA', 'B.Sc', 'HDD/psource_s/BWPH1237', '2016-09-20 13:06:05', 0),
(10, 'EGPH1112', 'EGPH1112', 'NbB76R80', '24b53c8e440a0a5f33ee1211b4341cec', 'Ibrahim', 'Olowoporoku', 'Innn', '0', 'EG', '0', '', 'M', 'F', 'jkagbede@gmail.com', '08065985437', 'Ibrahim Taiwo Rd', 'B.Sc', 'HDD/psource_s/EGPH1112', '2016-09-23 14:01:35', 0),
(11, 'EGPH1833', 'EGPH1833', 'YhR81Q79', '2b641c6cf2625bdab54b7dea80688e08', 'Ibrahim', 'Olotu', 'Adetutu', '0', 'EG', '0', '10', 'S', 'M', 'jkagbede@gmail.com', '08065985437', 'Ibrahim taiwo road, Ilorin, ', 'B.Sc', 'HDD/psource_s/EGPH1833', '2016-09-23 15:20:46', 0),
(13, 'EGPH1811', 'EGPH1811', 'AzC86Y74', 'be86c528a19cd9d6b2434ae28e9ae0da', 'Mohammed', 'Olotu', 'Adetutu', '10', 'EG', 'AD', '12', 'S', 'M', 'jkagbede@gmail.com', '08065985437', 'Ibrahim taiwo road, Ilorin, ', 'B.Sc', 'HDD/psource_s/EGPH1811', '2016-09-23 16:47:14', 0),
(14, 'EGPH1608', 'EGPH1608', 'HcY83H81', '5e0101d7f358bbe851976eef76a05e19', 'Joseph', 'K', 'Agbede', '', 'EG', 'PH', '12', 'M', 'F', 'jkagbede@gmail.com', '08065985437', 'Isheri Idimu road', 'Phd', 'HDD/psource_s/EGPH1608', '2016-09-29 15:17:14', 0),
(15, 'EG11614', 'EG11614', 'NpI81Z81', 'a41d872664fe8f541d545c5547bfe989', 'Mrs.', 'Aribilola', 'Jonathan', '', 'EG', '1', '13', 'M', 'F', 'jkagbede@gmail.com', '08065985437', 'Ibrahim Taiwo Woodwork', 'M.Sc', 'HDD/psource_s/EG11614', '2016-10-06 16:44:16', 0),
(16, 'BW11473', 'BW11473', 'QzJ77Z89', '87a90a498342b2469913845c9636202e', 'Ibrahim', 'O', 'Oloworonshoki', '1', 'BW', '1', '13', 'M', 'F', 'jkagbede@gmail.com', '08065985437', 'Ibrahim Taiwo Road', 'M.Sc', 'HDD/psource_s/BW11473', '2016-10-06 16:55:05', 0);

-- --------------------------------------------------------

--
-- Table structure for table `staffreminder`
--

CREATE TABLE IF NOT EXISTS `staffreminder` (
`id` int(11) NOT NULL,
  `issuer` int(2) NOT NULL,
  `remindnote` varchar(200) NOT NULL,
  `remindstartdate` datetime NOT NULL,
  `remindenddate` datetime NOT NULL,
  `remindstatus` int(1) NOT NULL,
  `recipientid` int(11) NOT NULL,
  `datetimeissued` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

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
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `staffschedule`
--

INSERT INTO `staffschedule` (`sn`, `schedule`, `staffid`, `date`, `starttime`, `endtime`, `datetime`) VALUES
(1, 'Wake the people up', 3, '2016-07-01', '02:00', '13:00', '2016-05-22 19:15:38'),
(5, 'zsfgsgsbsb ', 3, '2016-05-26', '17:01', '19:02', '2016-05-22 20:09:17'),
(6, 'Check with Dr. Sule for training at integraHealth', 3, '2016-07-07', '09:00', '09:10', '2016-07-01 16:06:16'),
(7, 'Give Borno-Way staff assignments', 3, '2016-07-07', '10:00', '10:20', '2016-07-01 16:07:31'),
(8, 'Steal the show', 6, '2016-08-03', '13:00', '22:59', '2016-08-18 13:51:52');

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
(3, 'Irisi-Oluwa Pharmacy and stores', 'Mrs. Atolagbe', '070555263172', 'jkagbede@gmail.com', 'Yaba street. Campus road', '2016-05-06 09:01:04');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `activitylog`
--
ALTER TABLE `activitylog`
 ADD PRIMARY KEY (`id`), ADD UNIQUE KEY `action` (`action`,`userid`,`description`);

--
-- Indexes for table `addillcategory`
--
ALTER TABLE `addillcategory`
 ADD PRIMARY KEY (`sn`);

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
-- Indexes for table `billingcategorization`
--
ALTER TABLE `billingcategorization`
 ADD PRIMARY KEY (`categoryid`), ADD UNIQUE KEY `clientcategory` (`clientcategory`);

--
-- Indexes for table `billingdiagnosis`
--
ALTER TABLE `billingdiagnosis`
 ADD PRIMARY KEY (`diagnosisid`);

--
-- Indexes for table `billinginvestigation`
--
ALTER TABLE `billinginvestigation`
 ADD PRIMARY KEY (`investigationid`);

--
-- Indexes for table `billingservicecategory`
--
ALTER TABLE `billingservicecategory`
 ADD PRIMARY KEY (`serviceid`);

--
-- Indexes for table `billingservicecategoryelement`
--
ALTER TABLE `billingservicecategoryelement`
 ADD PRIMARY KEY (`elementid`), ADD UNIQUE KEY `categoryid` (`categoryid`,`elementname`);

--
-- Indexes for table `billingsubscriberplan`
--
ALTER TABLE `billingsubscriberplan`
 ADD PRIMARY KEY (`planid`), ADD UNIQUE KEY `subscriberid` (`subscriberid`,`subscriberplanname`);

--
-- Indexes for table `billingsubscriberrate`
--
ALTER TABLE `billingsubscriberrate`
 ADD PRIMARY KEY (`rateid`);

--
-- Indexes for table `billingsubscribers`
--
ALTER TABLE `billingsubscribers`
 ADD PRIMARY KEY (`subscriberid`);

--
-- Indexes for table `carpoolschedule`
--
ALTER TABLE `carpoolschedule`
 ADD PRIMARY KEY (`sn`);

--
-- Indexes for table `checkinlog`
--
ALTER TABLE `checkinlog`
 ADD PRIMARY KEY (`sn`), ADD UNIQUE KEY `datetime` (`datetime`);

--
-- Indexes for table `chronicmessages`
--
ALTER TABLE `chronicmessages`
 ADD PRIMARY KEY (`msgeid`);

--
-- Indexes for table `clientlist`
--
ALTER TABLE `clientlist`
 ADD PRIMARY KEY (`sn`);

--
-- Indexes for table `clientsurvey`
--
ALTER TABLE `clientsurvey`
 ADD PRIMARY KEY (`surveyid`);

--
-- Indexes for table `departments`
--
ALTER TABLE `departments`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `dispensarylog`
--
ALTER TABLE `dispensarylog`
 ADD PRIMARY KEY (`sn`);

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
-- Indexes for table `drugsusage`
--
ALTER TABLE `drugsusage`
 ADD PRIMARY KEY (`sn`), ADD UNIQUE KEY `patientname` (`patientID`,`siteid`,`DrugID`,`QtyDispensed`,`userid`);

--
-- Indexes for table `enrolleelist`
--
ALTER TABLE `enrolleelist`
 ADD UNIQUE KEY `sn` (`sn`,`lastname`,`firstname`,`othername`);

--
-- Indexes for table `illnesscategory`
--
ALTER TABLE `illnesscategory`
 ADD PRIMARY KEY (`sn`);

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
-- Indexes for table `pregnantwomen`
--
ALTER TABLE `pregnantwomen`
 ADD PRIMARY KEY (`pregid`);

--
-- Indexes for table `pregnantwomendelivered`
--
ALTER TABLE `pregnantwomendelivered`
 ADD PRIMARY KEY (`smsid`);

--
-- Indexes for table `pregnantwomensms`
--
ALTER TABLE `pregnantwomensms`
 ADD PRIMARY KEY (`smsid`);

--
-- Indexes for table `requisitionborno_way`
--
ALTER TABLE `requisitionborno_way`
 ADD PRIMARY KEY (`sn`), ADD UNIQUE KEY `drugid` (`drugid`);

--
-- Indexes for table `requisitionegbe`
--
ALTER TABLE `requisitionegbe`
 ADD PRIMARY KEY (`sn`), ADD UNIQUE KEY `drugid` (`drugid`);

--
-- Indexes for table `requisitionfalolu`
--
ALTER TABLE `requisitionfalolu`
 ADD PRIMARY KEY (`sn`), ADD UNIQUE KEY `drugid` (`drugid`);

--
-- Indexes for table `requisitionikoyi_club`
--
ALTER TABLE `requisitionikoyi_club`
 ADD PRIMARY KEY (`sn`), ADD UNIQUE KEY `drugid` (`drugid`);

--
-- Indexes for table `requisitionmushin`
--
ALTER TABLE `requisitionmushin`
 ADD PRIMARY KEY (`sn`), ADD UNIQUE KEY `drugid` (`drugid`);

--
-- Indexes for table `requisitiononikan`
--
ALTER TABLE `requisitiononikan`
 ADD PRIMARY KEY (`sn`), ADD UNIQUE KEY `drugid` (`drugid`);

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
-- Indexes for table `staffreminder`
--
ALTER TABLE `staffreminder`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `staffrequireddocuments`
--
ALTER TABLE `staffrequireddocuments`
 ADD PRIMARY KEY (`sn`);

--
-- Indexes for table `staffschedule`
--
ALTER TABLE `staffschedule`
 ADD PRIMARY KEY (`sn`), ADD UNIQUE KEY `schedule` (`schedule`,`staffid`,`date`,`starttime`,`endtime`);

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
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=19;
--
-- AUTO_INCREMENT for table `addillcategory`
--
ALTER TABLE `addillcategory`
MODIFY `sn` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=9;
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
MODIFY `detailid` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=24;
--
-- AUTO_INCREMENT for table `bankinformation`
--
ALTER TABLE `bankinformation`
MODIFY `bankid` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `billingcategorization`
--
ALTER TABLE `billingcategorization`
MODIFY `categoryid` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=15;
--
-- AUTO_INCREMENT for table `billingdiagnosis`
--
ALTER TABLE `billingdiagnosis`
MODIFY `diagnosisid` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `billinginvestigation`
--
ALTER TABLE `billinginvestigation`
MODIFY `investigationid` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `billingservicecategory`
--
ALTER TABLE `billingservicecategory`
MODIFY `serviceid` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT for table `billingservicecategoryelement`
--
ALTER TABLE `billingservicecategoryelement`
MODIFY `elementid` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=101;
--
-- AUTO_INCREMENT for table `billingsubscriberplan`
--
ALTER TABLE `billingsubscriberplan`
MODIFY `planid` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=11;
--
-- AUTO_INCREMENT for table `billingsubscriberrate`
--
ALTER TABLE `billingsubscriberrate`
MODIFY `rateid` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `billingsubscribers`
--
ALTER TABLE `billingsubscribers`
MODIFY `subscriberid` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT for table `carpoolschedule`
--
ALTER TABLE `carpoolschedule`
MODIFY `sn` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `checkinlog`
--
ALTER TABLE `checkinlog`
MODIFY `sn` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=26;
--
-- AUTO_INCREMENT for table `chronicmessages`
--
ALTER TABLE `chronicmessages`
MODIFY `msgeid` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `clientlist`
--
ALTER TABLE `clientlist`
MODIFY `sn` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `clientsurvey`
--
ALTER TABLE `clientsurvey`
MODIFY `surveyid` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=11;
--
-- AUTO_INCREMENT for table `departments`
--
ALTER TABLE `departments`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=11;
--
-- AUTO_INCREMENT for table `dispensarylog`
--
ALTER TABLE `dispensarylog`
MODIFY `sn` int(11) NOT NULL AUTO_INCREMENT;
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
-- AUTO_INCREMENT for table `drugsusage`
--
ALTER TABLE `drugsusage`
MODIFY `sn` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=11;
--
-- AUTO_INCREMENT for table `illnesscategory`
--
ALTER TABLE `illnesscategory`
MODIFY `sn` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `jobdetail`
--
ALTER TABLE `jobdetail`
MODIFY `sn` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=14;
--
-- AUTO_INCREMENT for table `nigerianstates`
--
ALTER TABLE `nigerianstates`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=24;
--
-- AUTO_INCREMENT for table `nokdetails`
--
ALTER TABLE `nokdetails`
MODIFY `sn` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=16;
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
MODIFY `pensiondetailsid` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=16;
--
-- AUTO_INCREMENT for table `pregnantwomen`
--
ALTER TABLE `pregnantwomen`
MODIFY `pregid` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=34;
--
-- AUTO_INCREMENT for table `pregnantwomendelivered`
--
ALTER TABLE `pregnantwomendelivered`
MODIFY `smsid` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=53;
--
-- AUTO_INCREMENT for table `pregnantwomensms`
--
ALTER TABLE `pregnantwomensms`
MODIFY `smsid` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=43;
--
-- AUTO_INCREMENT for table `requisitionborno_way`
--
ALTER TABLE `requisitionborno_way`
MODIFY `sn` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT for table `requisitionegbe`
--
ALTER TABLE `requisitionegbe`
MODIFY `sn` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=13;
--
-- AUTO_INCREMENT for table `requisitionfalolu`
--
ALTER TABLE `requisitionfalolu`
MODIFY `sn` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `requisitionikoyi_club`
--
ALTER TABLE `requisitionikoyi_club`
MODIFY `sn` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `requisitionmushin`
--
ALTER TABLE `requisitionmushin`
MODIFY `sn` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `requisitiononikan`
--
ALTER TABLE `requisitiononikan`
MODIFY `sn` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=2;
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
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=8;
--
-- AUTO_INCREMENT for table `staff`
--
ALTER TABLE `staff`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=17;
--
-- AUTO_INCREMENT for table `staffreminder`
--
ALTER TABLE `staffreminder`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `staffrequireddocuments`
--
ALTER TABLE `staffrequireddocuments`
MODIFY `sn` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `staffschedule`
--
ALTER TABLE `staffschedule`
MODIFY `sn` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=9;
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

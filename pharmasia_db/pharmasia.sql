-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 09, 2019 at 12:39 AM
-- Server version: 10.1.40-MariaDB
-- PHP Version: 7.3.5

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `pharmasia`
--

-- --------------------------------------------------------

--
-- Table structure for table `area`
--

CREATE TABLE `area` (
  `id` int(11) NOT NULL,
  `name` varchar(256) DEFAULT NULL,
  `district_id` int(11) NOT NULL,
  `region_id` int(11) NOT NULL,
  `is_deleted` int(11) NOT NULL DEFAULT '0',
  `_key` varchar(256) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `area`
--

INSERT INTO `area` (`id`, `name`, `district_id`, `region_id`, `is_deleted`, `_key`) VALUES
(1, '1', 2, 4, 1, 'xcvbcxgdd'),
(2, 'Area 51', 2, 4, 0, 'a657841116dbc1dc8781ebd6d0a498ac'),
(3, 'Area 22', 2, 3, 0, 'b88d8f49ef497b7b55358994ca021b17'),
(4, 'Atowari', 3, 4, 1, '25fa0b246c473391736cb6b48191464d'),
(5, 'Tetulia', 3, 4, 0, '6155aec08712a92128c10877c4019efd'),
(6, 'dfdsfd', 5, 3, 0, 'a9b7fe3985149cbee73256a999b376e3');

-- --------------------------------------------------------

--
-- Table structure for table `chamber`
--

CREATE TABLE `chamber` (
  `id` int(11) NOT NULL,
  `doctor_id` int(11) DEFAULT NULL,
  `region_id` int(11) DEFAULT NULL,
  `area_id` int(11) DEFAULT NULL,
  `teritory_id` int(11) DEFAULT NULL,
  `market_id` int(11) DEFAULT NULL,
  `consulting_center_id` int(11) DEFAULT NULL,
  `hospital_id` int(11) DEFAULT NULL,
  `address` varchar(256) DEFAULT NULL,
  `contact` varchar(11) DEFAULT NULL,
  `visiting_hour` varchar(256) DEFAULT NULL,
  `fee` varchar(256) DEFAULT NULL,
  `is_deleted` tinyint(4) NOT NULL DEFAULT '0',
  `_key` varchar(256) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `chamber`
--

INSERT INTO `chamber` (`id`, `doctor_id`, `region_id`, `area_id`, `teritory_id`, `market_id`, `consulting_center_id`, `hospital_id`, `address`, `contact`, `visiting_hour`, `fee`, `is_deleted`, `_key`) VALUES
(1, 9, 4, 2, 2, 4, NULL, NULL, 'this is address', '01751465611', NULL, '500', 0, '56465f592024999a3551332e1630cec3'),
(2, 8, 4, 2, 2, 4, NULL, NULL, 'fgsdgs', '01751465611', '4pm-5pm', '1000', 0, '91195c5f7c92cf2326030e31e8a0150d'),
(3, 9, 4, 2, 3, 5, NULL, NULL, 'address', '01751465611', '4pm-8pm', '1000', 0, 'ced39e530a90f0ab24f5daa5522de54a'),
(4, 6, 4, 2, 2, 4, NULL, NULL, 'dfgd', '01751465611', '4pm-5pm', '1000', 0, '3a9b4c78966736edbb2c91026ab6fa48'),
(5, 6, 4, 2, 2, 4, 2, NULL, 'dfsdfsd', '01751465611', '4pm-5pm', '500', 0, 'dc7b1e416a1bc80d7b0c80128b2fa0e9'),
(6, 10, 4, 2, 2, 4, 2, NULL, 'dfsfsdfs', '01751465611', '4pm-5pm', '1000', 0, 'ba8652dc8a693e8b59faf230df42e9d0'),
(7, 11, 4, 2, 2, 4, 2, NULL, 'fgsdgs', '01751465611', '4pm-5pm', '1000', 0, 'f9b27b0cfb6456cd70fa88d09d984362'),
(8, 11, 4, 2, 2, 6, NULL, 2, 'dfsdfsd', '01751465611', '4pm-5pm', '1000', 0, 'e7f25d93ad9cbd80dcdb92bc6875d18b'),
(9, 10, 4, 2, 2, 6, NULL, 2, 'fgsdgs', '01751465611', '4pm-5pm', '500', 0, 'd4b15625c03e31d4afed1a1682714496'),
(10, 8, 4, 2, 2, 6, NULL, NULL, 'rtgdfg', '01751465611', '4pm-5pm', '500', 0, '6e6ba8029095210daeea393bbfee486e');

-- --------------------------------------------------------

--
-- Table structure for table `clinic`
--

CREATE TABLE `clinic` (
  `id` int(11) NOT NULL,
  `name` varchar(256) DEFAULT NULL,
  `market_id` int(11) DEFAULT NULL,
  `area_id` int(11) DEFAULT NULL,
  `district_id` int(11) DEFAULT NULL,
  `region_id` int(11) DEFAULT NULL,
  `address` text,
  `latitude` varchar(256) DEFAULT NULL,
  `longitude` varchar(256) DEFAULT NULL,
  `is_deleted` int(11) NOT NULL DEFAULT '0',
  `_key` varchar(256) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `clinic`
--

INSERT INTO `clinic` (`id`, `name`, `market_id`, `area_id`, `district_id`, `region_id`, `address`, `latitude`, `longitude`, `is_deleted`, `_key`) VALUES
(1, 'Surjer Hasi clinic', 3, 2, 2, 4, 'this is address', NULL, NULL, 1, 'b60eaa7eb697355329ba770c12ee089d'),
(2, 'dispensary 11', 3, 2, 2, 4, 'this is address', NULL, NULL, 1, 'abb84b388c4dcee3456dc8d054050ba6'),
(3, 'Medicine Dispesary Dispesary', 4, 2, 2, 4, 'this is address', NULL, NULL, 0, 'dc220e5ecaa8297ae1a074b84dab4d6d'),
(4, 'Surjer Hasi clinic', 4, 2, 2, 4, 'rtgdfg', '25.720', '89.256', 0, '1da3cde2f969598003fe3063d97e0f98'),
(5, 'Medicine Dispesary Dispesary', 4, 2, 2, 4, 'this is address', NULL, NULL, 0, '3aa4d6466b50202f2a8870b1c834d358');

-- --------------------------------------------------------

--
-- Table structure for table `consulting_center`
--

CREATE TABLE `consulting_center` (
  `id` int(11) NOT NULL,
  `name` varchar(256) DEFAULT NULL,
  `region_id` int(11) DEFAULT NULL,
  `area_id` int(11) DEFAULT NULL,
  `teritory_id` int(11) DEFAULT NULL,
  `market_id` int(11) DEFAULT NULL,
  `address` text,
  `is_deleted` tinyint(4) NOT NULL DEFAULT '0',
  `_key` varchar(256) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `consulting_center`
--

INSERT INTO `consulting_center` (`id`, `name`, `region_id`, `area_id`, `teritory_id`, `market_id`, `address`, `is_deleted`, `_key`) VALUES
(1, 'test', 4, 2, 2, 4, 'rtgdfg', 1, '02f08c49f2dd84ce85f582097d38810b'),
(2, 'Surjer Hasi clinic', 4, 2, 2, 4, 'dfsfsdfs', 0, '7d2c228e8c876f73cd84ad3365be0338'),
(3, 'dip eye care', 4, 2, 2, 4, 'this is address', 0, '2537f9d0384770c0063c5518e25e7d63');

-- --------------------------------------------------------

--
-- Table structure for table `dispensary`
--

CREATE TABLE `dispensary` (
  `id` int(11) NOT NULL,
  `consulting_center_id` int(11) DEFAULT NULL,
  `hospital_id` int(11) DEFAULT NULL,
  `name` varchar(256) DEFAULT NULL,
  `owner` varchar(100) DEFAULT NULL,
  `address` varchar(256) DEFAULT NULL,
  `market_id` int(11) DEFAULT NULL,
  `area_id` int(11) DEFAULT NULL,
  `district_id` int(11) DEFAULT NULL,
  `region_id` int(11) DEFAULT NULL,
  `is_covered` enum('Covered','Not Covered') DEFAULT NULL,
  `is_deleted` int(11) NOT NULL DEFAULT '0',
  `_key` varchar(256) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `dispensary`
--

INSERT INTO `dispensary` (`id`, `consulting_center_id`, `hospital_id`, `name`, `owner`, `address`, `market_id`, `area_id`, `district_id`, `region_id`, `is_covered`, `is_deleted`, `_key`) VALUES
(1, 2, NULL, 'Medicine Dispesary', 'Mr. John Doe', 'dfsfsdfs', 4, 2, 2, 4, 'Covered', 0, '73fad14e185045f73568cfb5aeb72ee6'),
(2, NULL, NULL, 'Medicine', 'Mr. John Doe', NULL, 3, 2, 2, 4, NULL, 0, '36192e4b2fab561c9cd2b72cc84a42a7'),
(3, NULL, NULL, 'Medicine Dispesary Dispesary', 'Mr. John Doe', NULL, 3, 2, 2, 4, NULL, 1, '314073335f8a6c564dcea7acd633445d'),
(4, NULL, NULL, 'Medi ded', 'Mr. John Doe', NULL, 3, 2, 2, 4, NULL, 0, '08656ae511fa6f8a8b4d647a265d2f9b'),
(5, NULL, NULL, 'Surjer Hasi clinic', 'fhsdg', NULL, 4, 2, 2, 4, NULL, 0, '69cdaf150ac675ae8294e31a22904ad4'),
(6, NULL, NULL, '@hasin', 'Mr. John Doe', NULL, 4, 2, 2, 4, NULL, 0, 'b312ef52d2f1c31da3d718b49d909d20'),
(7, NULL, 2, 'jononi drug house', 'parvej ahmed', 'dfgd', 6, 2, 2, 4, 'Covered', 0, '72cc75a7e990bcdce6b731ab578d31df'),
(8, NULL, NULL, 'jhon drug house', 'Mr. John Doe', 'this is address', 4, 2, 2, 4, 'Not Covered', 0, '0de7888514763442d169b3a749ade73f'),
(9, 3, NULL, 'dfgdfgdfgfdgfdg', 'Mr. John Doe', 'dfsdfsd', 4, 2, 2, 4, 'Not Covered', 0, 'bc856b8cc76224153f194b2870963a20'),
(10, NULL, NULL, 'fdf', 'Mr. John Doe', 'dfsfsdfs', 7, 5, 3, 4, 'Covered', 0, 'ad952c91d38e9303b29dd11bd60b6df5');

-- --------------------------------------------------------

--
-- Table structure for table `district`
--

CREATE TABLE `district` (
  `id` int(11) NOT NULL,
  `name` varchar(256) DEFAULT NULL,
  `region_id` int(11) NOT NULL,
  `is_deleted` int(11) NOT NULL DEFAULT '0',
  `_key` varchar(256) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `district`
--

INSERT INTO `district` (`id`, `name`, `region_id`, `is_deleted`, `_key`) VALUES
(1, 'dfgd', 1, 1, 'fgdfgdgdsfs'),
(2, 'admintest', 4, 0, 'f826b5d34d5120928f1b9926ada2bc62'),
(3, 'Panchagarh', 4, 0, '491bd213958e4db9fcc935719a2ba1e1'),
(4, 'Thakurgaon', 4, 0, 'ceb6f355fdb3916aa1748416ca952275'),
(5, 'dd', 3, 0, 'b203a5ef6a16a9c02822a81892f169f5'),
(6, 'Hughb', 4, 0, '57292dd4cba7376f5a070b6a1be47962');

-- --------------------------------------------------------

--
-- Table structure for table `doctor`
--

CREATE TABLE `doctor` (
  `id` int(11) NOT NULL,
  `name` varchar(256) DEFAULT NULL,
  `designation` varchar(256) NOT NULL,
  `expertise` varchar(256) NOT NULL,
  `degree` varchar(256) DEFAULT NULL,
  `department` varchar(256) DEFAULT NULL,
  `institute` varchar(256) DEFAULT NULL,
  `contact` varchar(11) DEFAULT NULL,
  `mail` varchar(256) DEFAULT NULL,
  `address` varchar(256) DEFAULT NULL,
  `is_qualified` enum('yes','no') DEFAULT NULL,
  `mul_chamber` enum('yes','no') NOT NULL DEFAULT 'no',
  `is_covered` enum('Covered','Not Covered') DEFAULT NULL,
  `is_deleted` int(11) NOT NULL DEFAULT '0',
  `_key` varchar(256) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `doctor`
--

INSERT INTO `doctor` (`id`, `name`, `designation`, `expertise`, `degree`, `department`, `institute`, `contact`, `mail`, `address`, `is_qualified`, `mul_chamber`, `is_covered`, `is_deleted`, `_key`) VALUES
(1, 'nk', 'dfdsf', 'dsfsfd', NULL, NULL, NULL, NULL, NULL, NULL, 'yes', 'no', NULL, 0, 'd4b0a117f289aae6176ccee4b4028ea5'),
(2, 'Medicine dispensary', 'dfdsf', 'dsfsfd', NULL, NULL, NULL, NULL, NULL, NULL, 'yes', 'no', NULL, 0, 'fd98712f0bf1a5c62d9a340146e6b0a0'),
(3, 'dfsdfd', 'dfdsf', 'dsfsfd', NULL, NULL, NULL, NULL, NULL, NULL, 'yes', 'no', NULL, 0, '53265e74de5a6440ae3516898106b86a'),
(4, 'sdfgdsfgd', 'sdfdf', 'dsfsfdsdfsdf', NULL, NULL, NULL, NULL, NULL, NULL, 'yes', 'no', NULL, 0, '164fe71a31f75c26248cb94a54cf4acb'),
(5, 'dfsdfd', 'dfdsf', 'dsfsfd', NULL, NULL, NULL, NULL, NULL, NULL, 'yes', 'no', NULL, 0, '615c08266ec29f433288779a6bd9b87b'),
(6, 'test', 'dfdsf', 'dsfsfdsdfsdf', NULL, NULL, NULL, NULL, NULL, NULL, 'yes', 'no', NULL, 0, '606ff19edaf60e8becc8307a12040fd4'),
(7, 'dfsdfd', 'dfdsf', 'dsfsfd', NULL, NULL, NULL, NULL, NULL, NULL, 'yes', 'no', NULL, 0, 'b3ec8b943c956c140b48386f50d7772e'),
(8, 'sujon sir', 'dfdsf', 'dsfsfd', NULL, NULL, NULL, NULL, NULL, NULL, 'yes', 'no', NULL, 0, 'b4a3be6078fc7487aa1b8ba68f96f210'),
(9, 'Dr. ABS Ruman', 'Assistant Professor', 'Sargon', 'MBBS, MD, FCPS', 'Nefrology', 'Panchagar Medical College', NULL, NULL, NULL, 'yes', 'yes', NULL, 0, '72d266cbc39ac47554f320e63a9fe566'),
(10, 'rashikul', 'bolod', 'sexology', 'MBBS, MD, FCPS', 'Sexology and women gender', 'Park more sexual university', NULL, NULL, NULL, 'yes', 'no', 'Covered', 0, '398d7ec4b2692c256381d93ee424477f'),
(11, 'kazal', 'dfdsf', 'dsfsfd', 'MBBS, MD, FCPS', 'Vvhv', 'Panchagar Medical College', '01751465611', 'mhpitom007@gmail.com', 'this is address', 'yes', 'yes', 'Covered', 0, 'a3ba69a193596ee5ae3037beaea5fb2b');

-- --------------------------------------------------------

--
-- Table structure for table `employee`
--

CREATE TABLE `employee` (
  `id` int(11) NOT NULL,
  `user_id` int(11) DEFAULT NULL,
  `designation` varchar(256) DEFAULT NULL,
  `phone` varchar(11) DEFAULT NULL,
  `area_id` int(11) DEFAULT NULL,
  `district_id` int(11) DEFAULT NULL,
  `region_id` int(11) DEFAULT NULL,
  `address` varchar(256) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `employee`
--

INSERT INTO `employee` (`id`, `user_id`, `designation`, `phone`, `area_id`, `district_id`, `region_id`, `address`) VALUES
(1, 1, 'bhai', '01751465611', 2, 2, 4, 'this is address'),
(3, 2, 'dfdsf', '01751465611', 4, 3, 4, 'this is address'),
(4, 3, 'test', '01751465611', 2, 2, 4, 'dfd'),
(5, 4, NULL, '01751465611', 6, 5, 3, 'this is address');

-- --------------------------------------------------------

--
-- Table structure for table `hospital`
--

CREATE TABLE `hospital` (
  `id` int(11) NOT NULL,
  `name` varchar(256) DEFAULT NULL,
  `teritory_id` int(11) DEFAULT NULL,
  `area_id` int(11) DEFAULT NULL,
  `region_id` int(11) DEFAULT NULL,
  `market_id` int(11) DEFAULT NULL,
  `address` text NOT NULL,
  `is_deleted` tinyint(4) NOT NULL DEFAULT '0',
  `_key` varchar(256) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `hospital`
--

INSERT INTO `hospital` (`id`, `name`, `teritory_id`, `area_id`, `region_id`, `market_id`, `address`, `is_deleted`, `_key`) VALUES
(1, 'test hos', 3, 2, 4, 5, 'this is address', 1, '39d9ca85942c3d96dd9e55b03d3eed71'),
(2, 'Medi ded', 2, 2, 4, 6, 'this is address', 0, '06c2e027fd129b8d2a0ffd2508fef555'),
(4, 'pirgachha upazila health complex', 2, 2, 4, 4, 'this is address', 0, '793c7ccf5a7a673b59ad7f9ab163e3cf');

-- --------------------------------------------------------

--
-- Table structure for table `market`
--

CREATE TABLE `market` (
  `id` int(11) NOT NULL,
  `name` varchar(256) DEFAULT NULL,
  `area_id` int(11) NOT NULL,
  `district_id` int(11) NOT NULL,
  `region_id` int(11) NOT NULL,
  `is_deleted` int(11) NOT NULL DEFAULT '0',
  `_key` varchar(256) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `market`
--

INSERT INTO `market` (`id`, `name`, `area_id`, `district_id`, `region_id`, `is_deleted`, `_key`) VALUES
(1, NULL, 2, 2, 4, 1, '31b3b3e66298e102549dc43272c262c2'),
(2, NULL, 2, 2, 3, 1, '551c52c89fa75f0b9730d8fec2d58e11'),
(3, 'something', 3, 3, 3, 1, '5e85bbc89b9000d5945f419c5d12aca7'),
(4, 'pirgachha', 2, 2, 4, 0, '46f5849109ef1b286dcc0eecc9e2b713'),
(5, 'hhdjfkjk', 3, 2, 4, 0, '12ee5fedbf38580b7c227f824012a809'),
(6, 'abcd', 2, 2, 4, 0, '8a6e85151e0698ca99fb304b675e6729'),
(7, 'dfdddddddd', 5, 3, 4, 0, '60a6e7b89fac97ba0c4a0e891ebda276');

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `region`
--

CREATE TABLE `region` (
  `id` int(11) NOT NULL,
  `name` varchar(256) DEFAULT NULL,
  `is_deleted` tinyint(4) NOT NULL DEFAULT '0',
  `_key` varchar(256) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `region`
--

INSERT INTO `region` (`id`, `name`, `is_deleted`, `_key`) VALUES
(1, 'not test', 1, '61e8d2e252682f750d907244229da48d'),
(2, 'test', 1, 'baba0f1ab35bdf151c2bed362148488e'),
(3, 'something', 1, '493590acc4d71513489770532cf14a27'),
(4, 'another', 0, '81f2040c7b257cc78d8263767ad42ed6'),
(5, 'chalkbazar', 0, 'c45b4027b4e4c57dc630af2db60cdce9');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `user_role` varchar(11) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` date DEFAULT NULL,
  `updated_at` date DEFAULT NULL,
  `created_by` int(11) DEFAULT NULL,
  `modified_by` int(11) DEFAULT NULL,
  `is_deleted` int(11) NOT NULL DEFAULT '0',
  `_key` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `email_verified_at`, `password`, `remember_token`, `user_role`, `created_at`, `updated_at`, `created_by`, `modified_by`, `is_deleted`, `_key`) VALUES
(1, 'pitom', 'mhpitom007@gmail.com', NULL, '$2y$10$Pfccp0XrXufGsmi8R.ABquHGBxqa.JY0/OHMdrm//3rBMvKDxkVfK', 'sJBctIHQHbNLCPFHwVoDtLOfiU5hULmkcP2b3yQHay3NgTPaANkp85nOdEyI', '0', '2019-10-09', '2019-10-09', NULL, NULL, 0, NULL),
(2, 'Ratul', 'ratul@gmail.com', NULL, '$2y$10$euhSXfAgs2PWLKKn2Rsm8.IXHoJxzWwBkPY0VBmkWs3v5n/jFKDsS', NULL, '2', '2019-10-20', '2019-10-20', NULL, NULL, 0, '2a085bcff52de41c225c315cb8a99e3b'),
(3, '@hasin', 'mridula@gmail.com', NULL, '$2y$10$3j1hu1vYg63AwuiLn8C12.m76CLM7yq7ImHrJXLuiUusuPrWVEXxy', NULL, '3', '2019-10-21', '2019-11-06', NULL, NULL, 1, '205a995e9ef7b052805d0ef4d5dbcbab'),
(4, 'Medi ded', 'csebrur.hasinmanjare34@gmail.com', NULL, '$2y$10$vUISx0T5HMybtz/KPM1e0.pKuFLX/TiDztWtrSdFsEoRDVwRyLa96', NULL, '4', '2019-10-21', '2019-11-06', NULL, NULL, 1, '609df2951dce3c0b85df16c59d4872a6');

-- --------------------------------------------------------

--
-- Table structure for table `visit_log`
--

CREATE TABLE `visit_log` (
  `id` int(11) NOT NULL,
  `doctor_id` int(11) DEFAULT NULL,
  `dispensary_id` int(11) DEFAULT NULL,
  `clinic_id` int(11) DEFAULT NULL,
  `employee_id` int(11) DEFAULT NULL,
  `visited` int(11) NOT NULL DEFAULT '1',
  `doc_group` int(11) DEFAULT NULL,
  `dis_group` int(11) DEFAULT NULL,
  `clinic_group` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `visit_log`
--

INSERT INTO `visit_log` (`id`, `doctor_id`, `dispensary_id`, `clinic_id`, `employee_id`, `visited`, `doc_group`, `dis_group`, `clinic_group`) VALUES
(1, NULL, NULL, NULL, 1, 1, NULL, NULL, NULL),
(2, NULL, NULL, NULL, 1, 1, NULL, NULL, NULL),
(3, 2, NULL, NULL, 1, 1, 2, NULL, NULL),
(4, 1, NULL, NULL, 1, 1, 1, NULL, NULL),
(5, NULL, 1, NULL, 1, 1, NULL, NULL, NULL),
(6, 15, NULL, 3, 1, 1, NULL, NULL, NULL),
(7, 15, 1, NULL, 1, 1, NULL, NULL, NULL),
(8, 1, NULL, NULL, 4, 1, 1, NULL, NULL),
(9, 1, NULL, NULL, 1, 1, 1, NULL, NULL),
(10, 2, NULL, NULL, 1, 1, 2, NULL, NULL),
(11, 2, NULL, NULL, 1, 1, 2, NULL, NULL),
(12, 6, NULL, NULL, 1, 1, 6, NULL, NULL),
(13, 1, NULL, NULL, 1, 1, 1, NULL, NULL),
(14, 1, NULL, NULL, 1, 1, 1, NULL, NULL),
(15, 15, NULL, NULL, 1, 1, 6, NULL, NULL),
(16, NULL, NULL, 4, 1, 1, NULL, NULL, NULL),
(17, NULL, 6, NULL, 1, 1, NULL, NULL, NULL),
(18, NULL, 1, NULL, 1, 1, NULL, NULL, NULL),
(19, NULL, 6, NULL, 1, 1, NULL, NULL, NULL),
(20, NULL, 7, NULL, 1, 1, NULL, NULL, NULL);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `area`
--
ALTER TABLE `area`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `chamber`
--
ALTER TABLE `chamber`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `clinic`
--
ALTER TABLE `clinic`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `consulting_center`
--
ALTER TABLE `consulting_center`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `dispensary`
--
ALTER TABLE `dispensary`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `district`
--
ALTER TABLE `district`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `doctor`
--
ALTER TABLE `doctor`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `employee`
--
ALTER TABLE `employee`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `hospital`
--
ALTER TABLE `hospital`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `market`
--
ALTER TABLE `market`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `region`
--
ALTER TABLE `region`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `visit_log`
--
ALTER TABLE `visit_log`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `area`
--
ALTER TABLE `area`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `chamber`
--
ALTER TABLE `chamber`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `clinic`
--
ALTER TABLE `clinic`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `consulting_center`
--
ALTER TABLE `consulting_center`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `dispensary`
--
ALTER TABLE `dispensary`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `district`
--
ALTER TABLE `district`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `doctor`
--
ALTER TABLE `doctor`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `employee`
--
ALTER TABLE `employee`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `hospital`
--
ALTER TABLE `hospital`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `market`
--
ALTER TABLE `market`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `region`
--
ALTER TABLE `region`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `visit_log`
--
ALTER TABLE `visit_log`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

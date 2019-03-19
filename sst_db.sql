-- phpMyAdmin SQL Dump
-- version 4.8.3
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Feb 18, 2019 at 08:59 AM
-- Server version: 10.1.13-MariaDB
-- PHP Version: 7.2.11

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `sst_db`
--

-- --------------------------------------------------------

--
-- Table structure for table `branches`
--

CREATE TABLE `branches` (
  `id` int(11) NOT NULL,
  `branch_name` varchar(255) NOT NULL,
  `remember_token` varchar(100) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `branches`
--

INSERT INTO `branches` (`id`, `branch_name`, `remember_token`, `created_at`, `updated_at`) VALUES
(4, 'Aurora', NULL, '2018-05-30 14:37:11', '2018-03-11 03:13:10'),
(5, 'Cebu', NULL, '2018-12-04 07:25:24', '2018-12-04 07:25:24'),
(6, 'Manila', NULL, '2018-12-04 07:28:37', '2018-12-04 07:28:37');

-- --------------------------------------------------------

--
-- Table structure for table `branchusers`
--

CREATE TABLE `branchusers` (
  `id` int(11) NOT NULL,
  `branch_id` int(11) NOT NULL,
  `userid` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `branchusers`
--

INSERT INTO `branchusers` (`id`, `branch_id`, `userid`, `created_at`, `updated_at`) VALUES
(3, 4, 41, '2018-10-19 00:14:33', '2018-10-19 00:14:33'),
(4, 4, 42, '2018-10-25 07:09:27', '2018-10-25 07:09:27'),
(5, 4, 43, '2018-10-25 19:29:20', '2018-10-25 19:29:20'),
(6, 5, 44, '2018-10-25 19:30:40', '2018-10-25 19:30:40'),
(7, 6, 45, '2018-10-25 19:32:27', '2018-10-25 19:32:27'),
(8, 7, 46, '2018-10-25 19:33:19', '2018-10-25 19:33:19'),
(9, 5, 47, '2019-01-08 14:55:33', '2019-01-08 14:55:33'),
(10, 5, 48, '2019-01-08 15:01:56', '2019-01-08 15:01:56'),
(11, 5, 49, '2019-01-08 15:05:46', '2019-01-08 15:05:46'),
(12, 5, 50, '2019-01-08 15:06:40', '2019-01-08 15:06:40'),
(13, 4, 51, '2019-01-08 15:24:08', '2019-01-08 15:24:08'),
(14, 4, 52, '2019-02-10 08:48:34', '2019-02-10 08:48:34');

-- --------------------------------------------------------

--
-- Table structure for table `brands`
--

CREATE TABLE `brands` (
  `id` int(10) UNSIGNED NOT NULL,
  `brand_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `brands`
--

INSERT INTO `brands` (`id`, `brand_name`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'Sky Direct', NULL, '2018-01-21 19:11:30', '2018-07-10 16:01:36'),
(2, 'Marine', NULL, '2018-12-11 08:17:10', '2018-12-11 08:17:10'),
(3, 'Test', NULL, '2018-12-11 08:19:59', '2018-12-11 08:19:59'),
(4, 'tes', NULL, '2018-12-11 08:20:16', '2018-12-11 08:20:16'),
(5, 'test', NULL, '2018-12-11 08:21:01', '2018-12-11 08:21:01'),
(6, 'gwapo', NULL, '2018-12-11 08:21:34', '2018-12-11 08:21:39');

-- --------------------------------------------------------

--
-- Table structure for table `cancelorders`
--

CREATE TABLE `cancelorders` (
  `id` int(10) UNSIGNED NOT NULL,
  `branchid` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `cashierid` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `ordernumber` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `ornumber` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `reason` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `cancelorders`
--

INSERT INTO `cancelorders` (`id`, `branchid`, `cashierid`, `ordernumber`, `ornumber`, `reason`, `created_at`, `updated_at`) VALUES
(1, '5', '43', 'QJ2DGHWSSI', '5', 'test', '2018-10-29 03:45:33', '2018-10-29 03:45:33'),
(2, '5', '43', 'GCTWLCHDBV', '66', 'test', '2018-10-29 04:07:37', '2018-10-29 04:07:37'),
(3, '5', '43', 'ZMNA2HGHDG', '24', 'test', '2018-10-29 04:07:44', '2018-10-29 04:07:44'),
(4, '5', '43', 'LZUMOCQC3U', '645', 'test', '2018-10-29 04:07:54', '2018-10-29 04:07:54');

-- --------------------------------------------------------

--
-- Table structure for table `carts`
--

CREATE TABLE `carts` (
  `id` int(10) UNSIGNED NOT NULL,
  `prodquantityid` int(11) NOT NULL,
  `quantity` int(11) NOT NULL,
  `requestId` int(11) NOT NULL,
  `amount` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `cashierorders`
--

CREATE TABLE `cashierorders` (
  `id` int(10) UNSIGNED NOT NULL,
  `cashier_id` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `item_id` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `rquantity` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `ramount` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `rdiscount` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `id` int(10) UNSIGNED NOT NULL,
  `cat_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`id`, `cat_name`, `remember_token`, `created_at`, `updated_at`) VALUES
(2, 'Category 1', NULL, '2018-05-09 02:38:34', '2018-11-26 14:08:54'),
(3, 'Category 2', NULL, '2018-08-09 07:15:09', '2018-11-26 14:06:23'),
(4, 'Category 3', NULL, '2018-10-14 18:58:41', '2018-11-26 14:06:32');

-- --------------------------------------------------------

--
-- Table structure for table `customers`
--

CREATE TABLE `customers` (
  `id` int(10) UNSIGNED NOT NULL,
  `userId` int(11) DEFAULT NULL,
  `boxId` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `fname` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `lname` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `mname` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `address` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `contactnum` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `branchid` int(11) DEFAULT NULL,
  `status` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `dateactivation` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `customers`
--

INSERT INTO `customers` (`id`, `userId`, `boxId`, `fname`, `lname`, `mname`, `address`, `email`, `contactnum`, `branchid`, `status`, `remember_token`, `created_at`, `updated_at`, `dateactivation`) VALUES
(1, NULL, '8000000', 'nancy', 'yu', NULL, 'ZSP', 'N/A', '09153130943', 5, '1', NULL, '2018-10-25 21:48:27', '2018-10-27 04:07:06', '10-27-2018'),
(2, NULL, '80001234', 'RIZA', 'CUTIN', NULL, 'POBLACION Aurora Zamboanga Del Sur', 'rizacutin@gmail.com', '09153654262', 4, '1', NULL, '2018-10-25 21:49:21', '2018-10-26 06:43:34', '10-26-2018'),
(3, NULL, '81111111', 'SE', 'TA', NULL, 'ZDN', 'N/A', '09140858501', 5, '1', NULL, '2018-10-25 22:11:49', '2018-10-25 22:12:10', NULL),
(4, NULL, '80121212', 'SE', 'NA', NULL, 'BNG', 'N/A', '09153130974', 5, '1', NULL, '2018-10-25 22:18:12', '2018-10-27 04:07:10', '10-27-2018'),
(5, NULL, '43443333', 'D', 'D', NULL, 'DSDDD', 'N/A', '0909090909', 5, '1', NULL, '2018-10-25 22:19:33', '2018-10-27 04:07:18', '10-27-2018'),
(6, NULL, '2333222', 'gege', 'gege', NULL, 'dsasdas', 'gegejosper.gasb@gmail.com', '09985518079', 4, '1', NULL, '2018-10-26 05:22:55', '2018-10-26 06:43:44', '10-26-2018'),
(7, NULL, '4333', 'sdasda', 'sadsa', NULL, 'sadasdasd', 'sadas', '23121', 4, '0', NULL, '2018-10-26 16:59:56', '2018-10-26 16:59:56', NULL),
(8, NULL, '4333', 'sdasda', 'sadsa', NULL, 'sadasdasd', 'sadas', '23121', 4, '0', NULL, '2018-10-26 17:00:13', '2018-10-26 17:00:13', NULL),
(9, NULL, '4333', 'sdasda', 'sadsa', NULL, 'sadasdasd', 'sadas', '23121', 4, '0', NULL, '2018-10-26 17:01:22', '2018-10-26 17:01:22', NULL),
(10, NULL, '80000000', 'luis', 'tilde', NULL, 'DSR', 'NA', '09153654354652', 5, '1', NULL, '2018-10-27 02:47:41', '2018-10-27 04:07:21', '10-27-2018'),
(11, NULL, '800001', 'zari', 'guzman', NULL, 'zamboanga city', 'zari@gmail.com', '9917801', 7, '0', NULL, '2018-10-27 02:49:28', '2018-10-27 02:49:28', NULL),
(12, NULL, '80241264', 'neecel', 'perez', NULL, 'san jose aurora zamboanga del sur', 'neecel@kenlextelecom.com', '09399032179', 4, '0', NULL, '2018-10-27 02:52:39', '2018-10-27 02:52:39', NULL),
(13, NULL, '80000564', 'GLADYS', 'ROMANASO', NULL, 'AURORA XAMBOANGA DEL SUR', 'GLAD@GMAIL.COM', '09126587983', 6, '1', NULL, '2018-10-27 02:54:35', '2018-10-27 04:08:20', '10-27-2018'),
(14, NULL, '80214715', 'jessi', 'quino', NULL, 'San Jose Aurora Zamboanga del sur', 'NA', '09236584256', 4, '0', NULL, '2018-10-27 03:02:07', '2018-10-27 03:02:07', NULL),
(15, NULL, '80214526', 'nesil', 'peres', NULL, 'poblacion aurora zambonga del sur', 'na', '09262654897', 4, '0', NULL, '2018-10-27 03:03:35', '2018-10-27 03:03:35', NULL),
(16, NULL, '80254555', 'perter', 'perez', NULL, 'poblacion aurora zamboanga del sur', 'na', '092636548951', 4, '0', NULL, '2018-10-27 03:04:56', '2018-10-27 03:04:56', NULL),
(17, NULL, '80001234', 'PETER', 'CALISO', NULL, 'SAN JOSE AURORA ZDS', 'NA', '09362439600', 4, '0', NULL, '2018-10-27 03:07:34', '2018-10-27 03:07:34', NULL),
(18, NULL, '14', 'GH', 'FT', NULL, 'ZSE', 'SDF', '136565', 5, '1', NULL, '2018-10-27 03:10:24', '2018-10-27 04:07:25', '10-27-2018'),
(19, NULL, '234', 'ASDF', 'AF', NULL, 'F', 'AF', '65', 5, '1', NULL, '2018-10-27 03:15:39', '2018-10-27 04:07:34', '10-27-2018'),
(20, NULL, '896', 'J', 'KO', NULL, 'SDF', 'NA', '5869', 5, '1', NULL, '2018-10-27 03:22:11', '2018-10-27 04:07:38', '10-27-2018'),
(21, NULL, '65', 'J', 'POL', NULL, 'G', 'NA', '564', 5, '1', NULL, '2018-10-27 03:23:45', '2018-10-27 04:07:42', '10-27-2018'),
(22, NULL, '82', 'jy', 'jg', NULL, 'fa', 'na', '46', 4, '0', NULL, '2018-10-27 03:23:47', '2018-10-27 03:23:47', NULL),
(23, NULL, '5465', 'J', 'LIK', NULL, 'FAZ', 'F', '145', 5, '1', NULL, '2018-10-27 03:26:23', '2018-10-27 04:07:45', '10-27-2018'),
(24, NULL, '8225', 'hf', 'fd', NULL, 'rr', 'na', 'wrr', 4, '0', NULL, '2018-10-27 03:29:52', '2018-10-27 03:29:52', NULL),
(25, NULL, '811', 'fghfg', 'hj', NULL, 'hfj', 'j4t', 'r79', 4, '0', NULL, '2018-10-27 06:33:17', '2018-10-27 06:33:17', NULL),
(26, NULL, '80124555', 'ben', 'castro', NULL, 'san jose azs', 'na', '0936254411', 4, '0', NULL, '2018-10-27 08:41:59', '2018-10-27 08:41:59', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `custoorders`
--

CREATE TABLE `custoorders` (
  `id` int(10) UNSIGNED NOT NULL,
  `customer_id` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `order_id` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `dailyquantitysales`
--

CREATE TABLE `dailyquantitysales` (
  `id` int(10) UNSIGNED NOT NULL,
  `branchid` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `productid` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `salequantity` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `saledate` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `dailyquantitysales`
--

INSERT INTO `dailyquantitysales` (`id`, `branchid`, `productid`, `salequantity`, `saledate`, `created_at`, `updated_at`) VALUES
(1, '4', '1', '41', '10-27-2018', '2018-10-26 15:47:50', '2018-10-27 08:41:59'),
(2, '4', '2', '12', '10-27-2018', '2018-10-26 15:48:44', '2018-10-27 08:41:59'),
(3, '4', '3', '167', '10-27-2018', '2018-10-26 15:49:25', '2018-10-27 08:41:59'),
(4, '4', '4', '13', '10-27-2018', '2018-10-26 15:49:25', '2018-10-27 08:41:59'),
(5, '4', '1', '5', '10-27-2018', NULL, NULL),
(6, '4', '5', '13', '10-27-2018', '2018-10-26 16:30:40', '2018-10-27 08:41:59'),
(7, '5', '6', '193', '10-27-2018', '2018-10-27 02:47:41', '2018-10-27 04:00:56'),
(8, '5', '7', '10', '10-27-2018', '2018-10-27 02:47:41', '2018-10-27 03:34:48'),
(9, '5', '8', '151', '10-27-2018', '2018-10-27 02:47:41', '2018-10-27 03:34:48'),
(10, '5', '9', '11', '10-27-2018', '2018-10-27 02:47:41', '2018-10-27 03:34:48'),
(11, '5', '10', '15', '10-27-2018', '2018-10-27 02:47:41', '2018-10-27 03:34:48'),
(12, '7', '16', '16', '10-27-2018', '2018-10-27 02:49:28', '2018-10-27 03:27:32'),
(13, '7', '17', '11', '10-27-2018', '2018-10-27 02:49:28', '2018-10-27 03:20:12'),
(14, '7', '18', '165', '10-27-2018', '2018-10-27 02:49:28', '2018-10-27 03:20:12'),
(15, '7', '19', '11', '10-27-2018', '2018-10-27 02:49:28', '2018-10-27 03:20:13'),
(16, '7', '20', '11', '10-27-2018', '2018-10-27 02:49:28', '2018-10-27 03:20:13'),
(17, '5', '30', '12', '10-27-2018', '2018-10-27 02:50:56', '2018-10-27 03:45:03'),
(18, '6', '11', '4', '10-27-2018', '2018-10-27 02:54:35', '2018-10-27 03:17:49'),
(19, '6', '12', '1', '10-27-2018', '2018-10-27 02:54:35', '2018-10-27 02:54:35'),
(20, '6', '13', '15', '10-27-2018', '2018-10-27 02:54:35', '2018-10-27 02:54:35'),
(21, '6', '14', '2', '10-27-2018', '2018-10-27 02:54:35', '2018-10-27 03:29:32'),
(22, '6', '15', '1', '10-27-2018', '2018-10-27 02:54:35', '2018-10-27 02:54:35'),
(23, '6', '41', '1', '10-27-2018', '2018-10-27 02:55:33', '2018-10-27 02:55:33'),
(24, '5', '29', '13', '10-27-2018', '2018-10-27 03:09:21', '2018-10-27 03:40:42'),
(25, '6', '37', '55', '10-27-2018', '2018-10-27 03:13:40', '2018-10-27 03:42:36'),
(26, '7', '46', '2', '10-27-2018', '2018-10-27 03:15:30', '2018-10-27 03:15:30'),
(27, '6', '39', '11', '10-27-2018', '2018-10-27 03:21:32', '2018-10-27 03:42:36'),
(28, '5', '32', '15', '10-27-2018', '2018-10-27 03:24:58', '2018-10-27 03:45:03'),
(29, '4', '24', '20', '10-27-2018', '2018-10-27 03:25:26', '2018-10-27 03:40:27'),
(30, '4', '23', '35', '10-27-2018', '2018-10-27 03:26:12', '2018-10-27 04:03:51'),
(31, '4', '25', '240', '10-27-2018', '2018-10-27 03:26:52', '2018-10-27 04:02:36'),
(32, '5', '31', '519', '10-27-2018', '2018-10-27 03:38:37', '2018-10-27 03:47:23'),
(33, '6', '40', '5', '10-27-2018', '2018-10-27 03:42:36', '2018-10-27 03:42:36'),
(34, '7', '45', '50', '10-27-2018', '2018-10-27 03:47:44', '2018-10-27 03:47:44'),
(35, '7', '47', '10', '10-27-2018', '2018-10-27 03:47:44', '2018-10-27 03:47:44'),
(36, '7', '48', '5', '10-27-2018', '2018-10-27 03:47:44', '2018-10-27 03:47:44'),
(37, '5', '31', '1', '10-29-2018', '2018-10-28 17:23:06', '2018-10-28 17:23:06'),
(38, '5', '6', '2', '10-29-2018', '2018-10-28 17:23:06', '2018-10-28 17:24:57'),
(39, '5', '7', '1', '10-29-2018', '2018-10-28 17:24:57', '2018-10-28 17:24:57'),
(40, '4', '103', '3', '01-10-2019', '2019-01-09 19:18:46', '2019-01-09 19:18:46'),
(41, '4', '102', '6', '01-10-2019', '2019-01-09 19:18:46', '2019-01-09 19:18:46');

-- --------------------------------------------------------

--
-- Table structure for table `distributionrecords`
--

CREATE TABLE `distributionrecords` (
  `id` int(10) UNSIGNED NOT NULL,
  `distributionnumber` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `branchid` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `productid` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `skuid` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `quantity` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `recievequantity` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `date` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `distributionrecords`
--

INSERT INTO `distributionrecords` (`id`, `distributionnumber`, `branchid`, `productid`, `skuid`, `quantity`, `recievequantity`, `status`, `date`, `created_at`, `updated_at`) VALUES
(1, 'tr-0100', '4', '3', '', '100', NULL, '2', '10/26/2018', '2018-10-25 19:43:13', '2018-10-25 20:06:29'),
(2, 'tr-0100', '4', '4', '', '100', '100', '2', '10/26/2018', '2018-10-25 19:44:02', '2018-10-25 20:07:05'),
(3, 'tr-0100', '4', '5', '', '1500', '1500', '2', '10/26/2018', '2018-10-25 19:44:41', '2018-10-25 20:07:17'),
(4, 'tr-0100', '4', '6', '', '100', '100', '2', '10/26/2018', '2018-10-25 19:45:12', '2018-10-25 20:07:27'),
(5, 'tr-0100', '4', '7', '', '100', '100', '2', '10/26/2018', '2018-10-25 19:45:30', '2018-10-25 20:07:37'),
(6, 'tr-0100', '4', '8', '', '200', '200', '2', '10/26/2018', '2018-10-25 19:45:42', '2018-10-25 20:07:46'),
(7, 'tr-0100', '4', '9', '', '200', '200', '2', '10/26/2018', '2018-10-25 19:45:54', '2018-10-25 20:08:25'),
(8, 'tr-0100', '4', '10', '', '100', '100', '2', '10/26/2018', '2018-10-25 19:46:06', '2018-10-25 20:08:35'),
(9, 'tr-0100', '4', '11', '', '100', '100', '2', '10/26/2018', '2018-10-25 19:46:15', '2018-10-25 20:08:50'),
(10, 'tr-0100', '4', '12', '', '200', '100', '2', '10/26/2018', '2018-10-25 19:46:28', '2018-10-25 20:08:58'),
(11, 'tr-0100', '4', '13', '', '100', '100', '2', '10/26/2018', '2018-10-25 19:46:37', '2018-10-25 20:09:16'),
(12, 'tr-0100', '4', '14', '', '50', '50', '2', '10/26/2018', '2018-10-25 19:46:56', '2018-10-25 20:09:27'),
(13, 'tr-0100', '4', '15', '', '100', '100', '2', '10/26/2018', '2018-10-25 19:47:04', '2018-10-25 20:09:34'),
(14, 'tr-0101', '5', '3', '', '100', '100', '2', '10/26/2018', '2018-10-25 19:47:56', '2018-10-25 20:06:28'),
(15, 'tr-0101', '5', '4', '', '100', '100', '2', '10/26/2018', '2018-10-25 19:48:04', '2018-10-25 20:06:42'),
(16, 'tr-0101', '5', '5', '', '1500', '1500', '2', '10/26/2018', '2018-10-25 19:48:17', '2018-10-25 20:07:04'),
(17, 'tr-0101', '5', '6', '', '100', '100', '2', '10/26/2018', '2018-10-25 19:48:25', '2018-10-25 20:07:11'),
(18, 'tr-0101', '5', '7', '', '100', '100', '2', '10/26/2018', '2018-10-25 19:48:48', '2018-10-25 20:07:19'),
(19, 'tr-0101', '5', '8', '', '100', '100', '2', '10/26/2018', '2018-10-25 19:48:57', '2018-10-25 20:07:28'),
(21, 'tr-0101', '5', '9', '', '50', '50', '2', '10/26/2018', '2018-10-25 19:49:24', '2018-10-25 20:07:36'),
(22, 'tr-0101', '5', '10', '', '100', '100', '2', '10/26/2018', '2018-10-25 19:49:31', '2018-10-25 20:07:42'),
(23, 'tr-0101', '5', '11', '', '100', '100', '2', '10/26/2018', '2018-10-25 19:49:38', '2018-10-25 20:07:49'),
(24, 'tr-0101', '5', '12', '', '200', '200', '2', '10/26/2018', '2018-10-25 19:49:47', '2018-10-25 20:07:57'),
(25, 'tr-0101', '5', '13', '', '100', '100', '2', '10/26/2018', '2018-10-25 19:49:54', '2018-10-25 20:08:04'),
(26, 'tr-0101', '5', '14', '', '100', '100', '2', '10/26/2018', '2018-10-25 19:50:04', '2018-10-25 20:08:12'),
(27, 'tr-0101', '5', '15', '', '80', '80', '2', '10/26/2018', '2018-10-25 19:50:19', '2018-10-25 20:08:19'),
(28, 'tr-0102', '6', '3', '', '100', '100', '2', '10/26/2018', '2018-10-25 19:51:25', '2018-10-25 20:08:03'),
(29, 'tr-0102', '6', '4', '', '100', '100', '2', '10/26/2018', '2018-10-25 19:51:31', '2018-10-25 20:10:22'),
(30, 'tr-0102', '6', '5', '', '1500', '1500', '2', '10/26/2018', '2018-10-25 19:51:37', '2018-10-25 20:10:37'),
(31, 'tr-0102', '6', '6', '', '50', '50', '2', '10/26/2018', '2018-10-25 19:51:50', '2018-10-25 20:10:46'),
(32, 'tr-0102', '6', '7', '', '100', '100', '2', '10/26/2018', '2018-10-25 19:52:03', '2018-10-25 20:11:00'),
(33, 'tr-0102', '6', '8', '', '100', '100', '2', '10/26/2018', '2018-10-25 19:52:13', '2018-10-25 20:11:16'),
(35, 'tr-0102', '6', '9', '', '100', '100', '2', '10/26/2018', '2018-10-25 19:52:35', '2018-10-25 20:11:33'),
(36, 'tr-0102', '6', '10', '', '100', '100', '2', '10/26/2018', '2018-10-25 19:52:47', '2018-10-25 20:11:47'),
(37, 'tr-0102', '6', '11', '', '80', '80', '2', '10/26/2018', '2018-10-25 19:53:01', '2018-10-25 20:11:59'),
(38, 'tr-0102', '6', '12', '', '200', '200', '2', '10/26/2018', '2018-10-25 19:53:09', '2018-10-25 20:12:09'),
(39, 'tr-0102', '6', '13', '', '100', '100', '2', '10/26/2018', '2018-10-25 19:53:15', '2018-10-25 20:12:24'),
(40, 'tr-0102', '6', '14', '', '100', '100', '2', '10/26/2018', '2018-10-25 19:53:23', '2018-10-25 20:12:40'),
(41, 'tr-0102', '6', '15', '', '100', '100', '2', '10/26/2018', '2018-10-25 19:53:37', '2018-10-25 20:12:51'),
(42, 'tr-0102', '6', '16', '', '0', NULL, '0', '10/26/2018', '2018-10-25 19:53:53', '2018-10-25 19:53:53'),
(43, 'tr-0103', '7', '3', '', '100', '100', '2', '10/26/2018', '2018-10-25 19:54:16', '2018-10-25 20:07:37'),
(44, 'tr-0103', '7', '4', '', '100', '100', '2', '10/26/2018', '2018-10-25 19:54:23', '2018-10-25 20:08:50'),
(45, 'tr-0103', '7', '5', '', '1500', '1500', '2', '10/26/2018', '2018-10-25 19:54:32', '2018-10-25 20:10:24'),
(46, 'tr-0103', '7', '6', '', '100', '100', '2', '10/26/2018', '2018-10-25 19:54:39', '2018-10-25 20:10:33'),
(47, 'tr-0103', '7', '7', '', '50', '50', '2', '10/26/2018', '2018-10-25 19:54:45', '2018-10-25 20:10:44'),
(48, 'tr-0103', '7', '8', '', '150', '150', '2', '10/26/2018', '2018-10-25 19:54:55', '2018-10-25 20:10:53'),
(50, 'tr-0103', '7', '9', '', '100', '100', '2', '10/26/2018', '2018-10-25 19:55:10', '2018-10-25 20:11:01'),
(51, 'tr-0103', '7', '10', '', '100', '100', '2', '10/26/2018', '2018-10-25 19:55:21', '2018-10-25 20:11:09'),
(52, 'tr-0103', '7', '11', '', '100', '100', '2', '10/26/2018', '2018-10-25 19:56:41', '2018-10-25 20:11:21'),
(53, 'tr-0103', '7', '12', '', '200', '200', '2', '10/26/2018', '2018-10-25 19:56:47', '2018-10-25 20:11:30'),
(54, 'tr-0103', '7', '13', '', '100', '100', '2', '10/26/2018', '2018-10-25 19:56:53', '2018-10-25 20:11:44'),
(55, 'tr-0103', '7', '14', '', '100', '100', '2', '10/26/2018', '2018-10-25 19:57:00', '2018-10-25 20:11:50'),
(56, 'tr-0103', '7', '15', '', '200', '200', '2', '10/26/2018', '2018-10-25 19:57:06', '2018-10-25 20:12:01'),
(57, 'tr-0103', '7', '16', '', '0', '0', '2', '10/26/2018', '2018-10-25 19:57:15', '2018-10-25 20:12:39'),
(61, 'DR-10262018-12', '4', '8', '', '50', NULL, '0', '10/26/2018', '2018-10-25 21:05:05', '2018-10-25 21:05:05'),
(62, 'DR-11072018-14', '4', '3', '', '5', NULL, '0', '11/07/2018', '2018-11-07 15:04:33', '2018-11-07 15:04:33'),
(90, 'DR-01032019-17', '4', '45', '25', '2', NULL, '0', '01/03/2019', '2019-01-03 08:41:00', '2019-01-03 08:41:00'),
(92, 'DR-01032019-17', '4', '45', '25', '50', NULL, '0', '01/03/2019', '2019-01-03 09:00:59', '2019-01-03 09:00:59'),
(93, 'DR-01032019-18', '4', '46', '24', '25', NULL, '0', '01/03/2019', '2019-01-03 09:10:11', '2019-01-03 09:10:11'),
(94, 'DR-01032019-18', '4', '46', '24', '60', NULL, '0', '01/03/2019', '2019-01-03 09:10:31', '2019-01-03 09:10:31'),
(95, 'DR-01032019-20', '4', '44', '23', '20', NULL, '0', '01/03/2019', '2019-01-03 09:17:52', '2019-01-03 09:17:52'),
(96, 'DR-01032019-20', '44', '44', '23', '10', NULL, '0', '01/03/2019', '2019-01-03 09:18:53', '2019-01-03 09:18:53'),
(97, 'DR-01032019-22', '4', '44', '23', '10', NULL, '0', '01/03/2019', '2019-01-03 09:19:54', '2019-01-03 09:19:54'),
(98, 'DR-01232019-26', '4', '49', '31', '10', '10', '2', '01/23/2019', '2019-01-23 13:45:02', '2019-01-23 13:45:21'),
(99, 'DR-01232019-27', '4', '49', '32', '20', NULL, '0', '01/23/2019', '2019-01-23 13:49:29', '2019-01-23 13:49:29'),
(100, 'DR-02102019-28', '4', '50', '33', '10', '10', '2', '02/10/2019', '2019-02-10 08:53:27', '2019-02-10 09:27:57'),
(101, 'DR-02102019-28', '4', '49', '31', '10', '10', '2', '02/10/2019', '2019-02-10 08:53:30', '2019-02-10 09:28:06');

-- --------------------------------------------------------

--
-- Table structure for table `distributions`
--

CREATE TABLE `distributions` (
  `id` int(10) UNSIGNED NOT NULL,
  `distributionnumber` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `branchid` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `date` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `distributions`
--

INSERT INTO `distributions` (`id`, `distributionnumber`, `branchid`, `status`, `date`, `created_at`, `updated_at`) VALUES
(1, 'tr-0100', '4', '2', '10/26/2018', '2018-10-25 19:42:59', '2018-10-25 20:12:56'),
(2, 'tr-0101', '5', '2', '10/26/2018', '2018-10-25 19:47:48', '2018-10-25 20:08:39'),
(3, 'DR-10262018-3', '6', '0', '10/26/2018', '2018-10-25 19:50:49', '2018-10-25 19:50:49'),
(4, 'tr-0102', '6', '1', '10/26/2018', '2018-10-25 19:51:14', '2018-10-25 19:53:53'),
(5, 'tr-0103', '7', '2', '10/26/2018', '2018-10-25 19:54:10', '2018-10-25 20:12:51'),
(6, 'DR-10262018-6', '4', '0', '10/26/2018', '2018-10-25 20:06:57', '2018-10-25 20:06:57'),
(7, 'DR-10262018-7', '4', '2', '10/26/2018', '2018-10-25 20:10:57', '2018-10-27 04:06:46'),
(8, 'DR-10262018-7', '4', '2', '10/26/2018', '2018-10-25 20:11:30', '2018-10-27 04:06:46'),
(9, 'DR-10262018-7', '5', '2', '10/26/2018', '2018-10-25 20:11:41', '2018-10-27 04:06:46'),
(10, 'DR-10262018-10', '4', '0', '10/26/2018', '2018-10-25 20:39:22', '2018-10-25 20:39:22'),
(11, 'DR-10262018-11', '4', '0', '10/26/2018', '2018-10-25 20:40:08', '2018-10-25 20:40:08'),
(12, 'DR-10262018-12', '4', '1', '10/26/2018', '2018-10-25 21:04:35', '2018-10-25 21:06:01'),
(13, 'DR-10262018-13', '4', '0', '10/26/2018', '2018-10-26 04:34:05', '2018-10-26 04:34:05'),
(14, 'DR-11072018-14', '4', '1', '11/07/2018', '2018-11-07 15:01:23', '2018-11-07 15:15:15'),
(15, 'DR-12112018-15', '4', '0', '12/11/2018', '2018-12-11 08:50:38', '2018-12-11 08:50:38'),
(16, 'DR-12112018-16', '4', '0', '12/11/2018', '2018-12-11 13:18:08', '2018-12-11 13:18:08'),
(17, 'DR-01032019-17', '4', '1', '01/03/2019', '2019-01-03 04:40:41', '2019-01-03 09:02:18'),
(18, 'DR-01032019-18', '4', '1', '01/03/2019', '2019-01-03 09:10:04', '2019-01-03 09:10:44'),
(19, 'DR-01032019-19', '4', '0', '01/03/2019', '2019-01-03 09:16:22', '2019-01-03 09:16:22'),
(20, 'DR-01032019-20', '4', '1', '01/03/2019', '2019-01-03 09:17:47', '2019-01-03 09:19:03'),
(21, 'DR-01032019-20', '4', '1', '01/03/2019', '2019-01-03 09:18:48', '2019-01-03 09:19:03'),
(22, 'DR-01032019-22', '4', '1', '01/03/2019', '2019-01-03 09:19:48', '2019-01-03 09:20:49'),
(23, 'DR-01032019-23', '4', '0', '01/03/2019', '2019-01-03 13:15:16', '2019-01-03 13:15:16'),
(24, 'DR-01042019-24', '4', '0', '01/04/2019', '2019-01-03 16:07:52', '2019-01-03 16:07:52'),
(25, 'DR-01092019-25', '4', '0', '01/09/2019', '2019-01-08 16:58:49', '2019-01-08 16:58:49'),
(26, 'DR-01232019-26', '4', '2', '01/23/2019', '2019-01-23 13:44:56', '2019-01-23 13:49:41'),
(27, 'DR-01232019-27', '4', '2', '01/23/2019', '2019-01-23 13:49:21', '2019-02-10 10:06:59'),
(28, 'DR-02102019-28', '4', '2', '02/10/2019', '2019-02-10 08:53:21', '2019-02-10 10:06:52');

-- --------------------------------------------------------

--
-- Table structure for table `itembalances`
--

CREATE TABLE `itembalances` (
  `id` int(10) UNSIGNED NOT NULL,
  `item_id` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `quantity` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `unit_price` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `items`
--

CREATE TABLE `items` (
  `id` int(10) UNSIGNED NOT NULL,
  `item_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `sku` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `unittype` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_000000_create_users_table', 1),
(15, '2018_01_18_160417_create_categories_table', 2),
(16, '2018_01_18_160544_create_suppliers_table', 2),
(17, '2018_01_18_160558_create_brands_table', 2),
(18, '2018_01_18_160609_create_branchs_table', 2),
(19, '2018_01_18_160638_create_tags_table', 2),
(20, '2018_01_18_161337_create_items_table', 2),
(21, '2018_01_18_161354_create_requests_table', 2),
(23, '2018_01_18_161441_create_customers_table', 2),
(24, '2018_01_18_161519_create_customer_orders_table', 2),
(25, '2018_01_18_162425_create_item_balances_table', 2),
(26, '2018_01_18_162811_create_request_orders_table', 2),
(27, '2018_01_18_163332_create_order_items_table', 2),
(28, '2014_01_07_073615_create_tagged_table', 3),
(29, '2014_01_07_073615_create_tags_table', 3),
(30, '2016_06_29_073615_create_tag_groups_table', 3),
(31, '2016_06_29_073615_update_tags_table', 3),
(32, '2018_03_10_135411_create_product_table', 4),
(33, '2018_03_10_135650_create_product_quantities_table', 4),
(35, '2018_03_13_080222_create_cart_table', 5),
(36, '2018_03_15_071713_create_reservation_table', 5),
(37, '2018_03_16_051912_create_reservations_table', 6),
(38, '2018_03_16_093051_create_purchaserecord_table', 7),
(39, '2018_03_18_180012_create_cashierorder_table', 8),
(42, '2018_03_11_152907_create_purchase_table', 9),
(43, '2018_01_18_161405_create_orders_table', 10),
(44, '2018_05_26_044802_create_bookings_table', 11),
(45, '2018_05_28_134630_create_transports_table', 12),
(48, '2018_06_27_135404_create_purchaserequests_table', 13),
(49, '2018_08_09_162929_create_packages_table', 14),
(50, '2018_08_09_165808_create_packageitems_table', 15),
(51, '2018_08_10_174244_create_packagebranch_table', 16),
(52, '2018_08_10_174513_create_packagebranchs_table', 17),
(53, '2018_08_10_174602_create_packagebranches_table', 18),
(54, '2018_08_20_050155_create_distribution_table', 19),
(55, '2018_08_20_050213_create_distributionrecord_table', 19),
(56, '2018_09_13_154354_create_packageorder_table', 20),
(57, '2018_09_17_142749_create_dealer_table', 21),
(58, '2018_09_18_023623_create_boxid_table', 22),
(59, '2018_09_18_054926_create_dealerpackageorder_table', 23),
(60, '2018_10_18_160133_create_returns_table', 24),
(61, '2018_10_19_003636_create_returnproducts_table', 25),
(62, '2018_10_19_011327_create_returnproductlists_table', 26),
(63, '2018_10_26_233043_create_dailyquantitysale_table', 27),
(64, '2018_10_29_013003_create_cancelorder_table', 28),
(65, '2018_11_30_122647_create_productvariants_table', 29),
(66, '2018_11_30_122742_create_productvariantsoptions_table', 29),
(67, '2018_11_30_122841_create_skuproductvariantsoptions_table', 29),
(68, '2019_02_06_124919_create_productpictures_table', 30);

-- --------------------------------------------------------

--
-- Table structure for table `orderitems`
--

CREATE TABLE `orderitems` (
  `id` int(10) UNSIGNED NOT NULL,
  `req_id` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `item_id` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `quantity` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `amount` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `id` int(10) UNSIGNED NOT NULL,
  `cashier_id` int(11) NOT NULL,
  `orderId` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `ornumber` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `itemId` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `ramount` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `rquantity` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `rdiscount` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`id`, `cashier_id`, `orderId`, `ornumber`, `itemId`, `ramount`, `rquantity`, `rdiscount`, `status`, `created_at`, `updated_at`) VALUES
(1, 41, 'L5AO8KIGSP', NULL, '4', '7600', '10', '5', NULL, '2018-10-22 18:35:17', '2018-10-22 18:35:17'),
(2, 41, 'L5AO8KIGSP', NULL, '24', '10687.5', '25', '5', NULL, '2018-10-22 18:35:17', '2018-10-22 18:35:17'),
(3, 41, 'U4M8IJPNQS', NULL, '1', '1999', '1', '0', NULL, '2018-10-22 18:41:57', '2018-10-22 18:41:57'),
(4, 44, 'FIUREEUEB7', NULL, '9', '4000', '5', '0', NULL, '2018-10-25 20:29:04', '2018-10-25 20:29:04'),
(5, 43, 'XZRF7NSSBM', NULL, '4', '4000', '5', '0', NULL, '2018-10-25 20:29:04', '2018-10-25 20:29:04'),
(6, 45, 'NUM6ATMTH2', NULL, '14', '4000', '5', '0', NULL, '2018-10-25 20:29:18', '2018-10-25 20:29:18'),
(7, 46, 'UKQZRXR7SR', NULL, '19', '4000', '5', '0', NULL, '2018-10-25 20:29:24', '2018-10-25 20:29:24'),
(8, 43, 'Z8AMB66B7A', NULL, '4', '4000', '5', '0', NULL, '2018-10-25 20:33:11', '2018-10-25 20:33:11'),
(9, 43, 'ADVHCQSPTB', NULL, '24', '4050', '10', '10', NULL, '2018-10-25 20:38:14', '2018-10-25 20:38:14'),
(10, 44, 'JHKJXHNQGT', NULL, '33', '2180', '20', '0', NULL, '2018-10-25 20:39:36', '2018-10-25 20:39:36'),
(11, 45, '0MOYBQ1WMF', NULL, '14', '1400', '2', '12.5', NULL, '2018-10-25 20:46:19', '2018-10-25 20:46:19'),
(12, 43, 'BWY4PDKPNR', NULL, '4', '700', '1', '12.5', NULL, '2018-10-25 20:47:18', '2018-10-25 20:47:18'),
(13, 44, 'XR2O4MPJNK', NULL, '31', '2340', '10', '10', NULL, '2018-10-25 21:15:36', '2018-10-25 21:15:36'),
(14, 44, 'FAAEFBX9ZN', NULL, '31', '23400', '100', '10', NULL, '2018-10-25 21:24:36', '2018-10-25 21:24:36'),
(15, 44, 'VK2OMMJPQO', NULL, '31', '23400', '100', '10', NULL, '2018-10-25 21:42:25', '2018-10-25 21:42:25'),
(16, 43, 'JLKMB9ENRH', NULL, '24', '12150', '30', '10', NULL, '2018-10-25 22:33:15', '2018-10-25 22:33:15'),
(17, 43, 'RZROGXA6JY', NULL, '1', '1999', '1', NULL, NULL, '2018-10-26 04:16:42', '2018-10-26 04:16:42'),
(18, 43, '76EKHVLUG0', NULL, '1', '1999', '1', '0', NULL, '2018-10-26 05:38:13', '2018-10-26 05:38:13'),
(19, 43, 'FJN4KPFJS1', NULL, '1', '1999', '1', '0', NULL, '2018-10-26 15:47:50', '2018-10-26 15:47:50'),
(20, 43, 'NA6CJDNPQD', NULL, '1', '3998', '2', '0', NULL, '2018-10-26 15:48:44', '2018-10-26 15:48:44'),
(21, 43, 'NA6CJDNPQD', NULL, '2', '1860', '1', '0', NULL, '2018-10-26 15:48:44', '2018-10-26 15:48:44'),
(22, 43, 'CJI2VUIZMT', NULL, '3', '70', '2', '0', NULL, '2018-10-26 15:49:25', '2018-10-26 15:49:25'),
(23, 43, 'CJI2VUIZMT', NULL, '4', '1600', '2', '0', NULL, '2018-10-26 15:49:25', '2018-10-26 15:49:25'),
(24, 43, 'NWZ1HDBDTG', NULL, '5', '1000', '2', '0', NULL, '2018-10-26 16:30:40', '2018-10-26 16:30:40'),
(25, 44, 'KLJA42O75P', NULL, '30', '320', '2', '0', NULL, '2018-10-27 02:50:56', '2018-10-27 02:50:56'),
(26, 45, 'QBCRHAQMQY', NULL, '41', '109', '1', '0', NULL, '2018-10-27 02:55:33', '2018-10-27 02:55:33'),
(27, 44, '4CXVY2MTKV', NULL, '29', '109', '1', '0', NULL, '2018-10-27 03:09:21', '2018-10-27 03:09:21'),
(28, 44, 'CI5V5BX7RD', NULL, '9', '800', '1', '0', NULL, '2018-10-27 03:11:39', '2018-10-27 03:11:39'),
(29, 44, 'CI5V5BX7RD', NULL, '29', '218', '2', '0', NULL, '2018-10-27 03:11:39', '2018-10-27 03:11:39'),
(30, 44, '9K7VXPRIVM', NULL, '10', '1680', '1', '0', NULL, '2018-10-27 03:13:04', '2018-10-27 03:13:04'),
(31, 44, '9K7VXPRIVM', NULL, '8', '35', '1', '0', NULL, '2018-10-27 03:13:04', '2018-10-27 03:13:04'),
(32, 45, 'JRQEXYT75A', NULL, '37', '109', '1', '0', NULL, '2018-10-27 03:13:40', '2018-10-27 03:13:40'),
(33, 45, 'U3WRZQMXPJ', NULL, '37', '109', '1', '0', NULL, '2018-10-27 03:14:43', '2018-10-27 03:14:43'),
(34, 46, 'PVYMS4VKNC', NULL, '46', '320', '2', '0', NULL, '2018-10-27 03:15:30', '2018-10-27 03:15:30'),
(35, 43, 'MLYXB7UHUF', NULL, '1', '1999', '1', '0', NULL, '2018-10-27 03:19:58', '2018-10-27 03:19:58'),
(36, 45, 'G4RFZRSSBN', NULL, '37', '218', '2', '0', NULL, '2018-10-27 03:20:23', '2018-10-27 03:20:23'),
(37, 45, 'KLFXMLMK0E', NULL, '39', '260', '1', '0', NULL, '2018-10-27 03:21:32', '2018-10-27 03:21:32'),
(38, 44, '6IUTHJRLTK', NULL, '32', '2300', '5', '0', NULL, '2018-10-27 03:24:58', '2018-10-27 03:24:58'),
(39, 43, '4O8JCFEBRR', NULL, '24', '2250', '5', '0', NULL, '2018-10-27 03:25:26', '2018-10-27 03:25:26'),
(40, 44, '5LMMDT5P1L', NULL, '10', '6720', '4', '0', NULL, '2018-10-27 03:25:53', '2018-10-27 03:25:53'),
(41, 43, 'OIX9FGVODD', NULL, '23', '7020', '30', '10', NULL, '2018-10-27 03:26:12', '2018-10-27 03:26:12'),
(42, 43, 'ZUPGEK9XJE', NULL, '25', '2673', '30', '10', NULL, '2018-10-27 03:26:52', '2018-10-27 03:26:52'),
(43, 43, 'QESCONTCHL', NULL, '24', '4050', '10', '10', NULL, '2018-10-27 03:28:46', '2018-10-27 03:28:46'),
(44, 45, 'OVDYFB2FQF', NULL, '14', '800', '1', '0', NULL, '2018-10-27 03:29:32', '2018-10-27 03:29:32'),
(45, 45, 'OVDYFB2FQF', NULL, '37', '109', '1', '0', NULL, '2018-10-27 03:29:32', '2018-10-27 03:29:32'),
(46, 44, 'ZXJEOVOJIO', NULL, '29', '545', '5', '0', NULL, '2018-10-27 03:35:30', '2018-10-27 03:35:30'),
(47, 44, 'A6YNLUX8P2', NULL, '31', '46800', '200', '10', NULL, '2018-10-27 03:38:37', '2018-10-27 03:38:37'),
(48, 44, 'NJO30HXPFP', NULL, '31', '46800', '200', '10', NULL, '2018-10-27 03:39:34', '2018-10-27 03:39:34'),
(49, 43, 'KHFI3OPXIG', NULL, '24', '2250', '5', '0', NULL, '2018-10-27 03:40:27', '2018-10-27 03:40:27'),
(50, 44, 'YOVPDOQ6TQ', NULL, '29', '545', '5', '0', NULL, '2018-10-27 03:40:42', '2018-10-27 03:40:42'),
(51, 44, 'GOJRZAV2VT', NULL, '31', '20826', '89', '10', NULL, '2018-10-27 03:41:26', '2018-10-27 03:41:26'),
(52, 43, 'ICSQYUT6MB', NULL, '25', '17820', '200', '10', NULL, '2018-10-27 03:42:33', '2018-10-27 03:42:33'),
(53, 45, 'URIV1US54K', NULL, '37', '4905', '50', '10', NULL, '2018-10-27 03:42:36', '2018-10-27 03:42:36'),
(54, 45, 'URIV1US54K', NULL, '39', '2340', '10', '10', NULL, '2018-10-27 03:42:36', '2018-10-27 03:42:36'),
(55, 45, 'URIV1US54K', NULL, '40', '2070', '5', '10', NULL, '2018-10-27 03:42:36', '2018-10-27 03:42:36'),
(56, 44, '5TOBKWE9ID', NULL, '30', '1440', '10', '10', NULL, '2018-10-27 03:45:03', '2018-10-27 03:45:03'),
(57, 44, '5TOBKWE9ID', NULL, '31', '2340', '10', '10', NULL, '2018-10-27 03:45:03', '2018-10-27 03:45:03'),
(58, 44, '5TOBKWE9ID', NULL, '32', '4140', '10', '10', NULL, '2018-10-27 03:45:03', '2018-10-27 03:45:03'),
(59, 44, '7HCRCZKUF8', NULL, '31', '2340', '10', '10', NULL, '2018-10-27 03:45:39', '2018-10-27 03:45:39'),
(60, 44, 'HK3TR4ANVU', NULL, '31', '2340', '10', '10', NULL, '2018-10-27 03:47:23', '2018-10-27 03:47:23'),
(61, 46, '47KCKKLNQS', NULL, '45', '4905', '50', '10', NULL, '2018-10-27 03:47:44', '2018-10-27 03:47:44'),
(62, 46, '47KCKKLNQS', NULL, '47', '2340', '10', '10', NULL, '2018-10-27 03:47:44', '2018-10-27 03:47:44'),
(63, 46, '47KCKKLNQS', NULL, '48', '2070', '5', '10', NULL, '2018-10-27 03:47:44', '2018-10-27 03:47:44'),
(64, 44, 'H4ZEB7LSOR', NULL, '6', '177110', '89', '0', NULL, '2018-10-27 03:57:06', '2018-10-27 03:57:06'),
(65, 44, 'TYFYW0BBHY', NULL, '6', '177110', '89', '0', NULL, '2018-10-27 04:00:56', '2018-10-27 04:00:56'),
(66, 43, 'GCTWLCHDBV', NULL, '25', '891', '10', '10', NULL, '2018-10-27 04:02:36', '2018-10-27 04:02:36'),
(67, 43, 'TEL0PJU0FO', NULL, '1', '39980', '20', '0', NULL, '2018-10-27 04:03:51', '2018-10-27 04:03:51'),
(68, 43, 'TEL0PJU0FO', NULL, '23', '1300', '5', '0', NULL, '2018-10-27 04:03:51', '2018-10-27 04:03:51'),
(69, 44, 'DMJTVOE8G8', NULL, '31', '260', '1', '0', 0, '2018-10-28 17:23:06', '2018-10-28 17:23:06'),
(70, 44, 'DMJTVOE8G8', NULL, '6', '1990', '1', '0', 0, '2018-10-28 17:23:06', '2018-10-28 17:23:06'),
(71, 44, 'TETEUG4EFQ', NULL, '6', '1990', '1', '0', 0, '2018-10-28 17:24:57', '2018-10-28 17:24:57'),
(72, 44, 'TETEUG4EFQ', NULL, '7', '1860', '1', '0', 0, '2018-10-28 17:24:57', '2018-10-28 17:24:57'),
(73, 51, 'CAU0M2LJHP', NULL, '103', '900', '3', '0', 0, '2019-01-09 19:18:46', '2019-01-09 19:18:46'),
(74, 51, 'CAU0M2LJHP', NULL, '102', '1800', '6', '0', 0, '2019-01-09 19:18:46', '2019-01-09 19:18:46');

-- --------------------------------------------------------

--
-- Table structure for table `packageitems`
--

CREATE TABLE `packageitems` (
  `id` int(10) UNSIGNED NOT NULL,
  `packageid` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `productid` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `quantity` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `packageitems`
--

INSERT INTO `packageitems` (`id`, `packageid`, `productid`, `quantity`, `created_at`, `updated_at`) VALUES
(1, '1', '3', '1', '2018-10-18 21:59:41', '2018-10-18 21:59:41'),
(2, '1', '4', '1', '2018-10-18 21:59:50', '2018-10-18 21:59:50'),
(3, '1', '5', '15', '2018-10-18 22:00:15', '2018-10-18 22:00:15'),
(4, '1', '6', '1', '2018-10-18 22:00:29', '2018-10-18 22:00:29'),
(5, '1', '7', '1', '2018-10-18 22:01:05', '2018-10-18 22:01:05'),
(6, '2', '3', '1', '2018-10-18 22:09:45', '2018-10-18 22:09:45'),
(7, '3', '3', '1', '2018-10-18 22:21:10', '2018-10-18 22:21:10'),
(8, '3', '4', '1', '2018-10-18 22:21:22', '2018-10-18 22:21:22'),
(9, '3', '5', '15', '2018-10-18 22:21:31', '2018-10-18 22:21:31'),
(10, '3', '6', '1', '2018-10-18 22:21:38', '2018-10-18 22:21:38'),
(11, '3', '7', '1', '2018-10-18 22:21:45', '2018-10-18 22:21:45'),
(12, '4', '3', '1', '2018-10-18 23:02:17', '2018-10-18 23:02:17'),
(13, '4', '4', '1', '2018-10-18 23:02:29', '2018-10-18 23:02:29'),
(14, '4', '5', '15', '2018-10-18 23:02:42', '2018-10-18 23:02:42'),
(15, '4', '6', '1', '2018-10-18 23:02:50', '2018-10-18 23:02:50'),
(16, '4', '7', '1', '2018-10-18 23:03:00', '2018-10-18 23:03:00'),
(17, '5', '3', '1', '2018-10-18 23:03:36', '2018-10-18 23:03:36'),
(18, '5', '4', '1', '2018-10-18 23:03:44', '2018-10-18 23:03:44'),
(19, '5', '5', '15', '2018-10-18 23:03:53', '2018-10-18 23:03:53'),
(20, '5', '6', '1', '2018-10-18 23:05:02', '2018-10-18 23:05:02'),
(21, '5', '7', '1', '2018-10-18 23:05:11', '2018-10-18 23:05:11'),
(22, '6', '3', '1', '2018-10-18 23:06:36', '2018-10-18 23:06:36'),
(23, '7', '3', '1', '2018-10-18 23:07:06', '2018-10-18 23:07:06'),
(24, '8', '3', '1', '2018-10-18 23:07:23', '2018-10-18 23:07:23'),
(25, '9', '3', '1', '2018-10-18 23:07:46', '2018-10-18 23:07:46'),
(26, '10', '3', '1', '2018-10-22 18:55:08', '2018-10-22 18:55:08'),
(27, '11', '3', '1', '2018-10-22 18:56:53', '2018-10-22 18:56:53'),
(28, '11', '4', '1', '2018-10-22 18:57:00', '2018-10-22 18:57:00'),
(29, '11', '5', '15', '2018-10-22 18:57:09', '2018-10-22 18:57:09'),
(30, '11', '6', '1', '2018-10-22 18:57:18', '2018-10-22 18:57:18'),
(31, '11', '7', '1', '2018-10-22 18:57:27', '2018-10-22 18:57:27'),
(32, '41', '3', '1', '2018-10-25 19:42:19', '2018-10-25 19:42:19');

-- --------------------------------------------------------

--
-- Table structure for table `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `password_resets`
--

INSERT INTO `password_resets` (`email`, `token`, `created_at`) VALUES
('gegejosper@gmail.com', '$2y$10$oB52nFHcdIQKW1P/i74k3eFOzCbMVOQWU6fJrdXeF8OJc/./qnwPa', '2018-03-19 07:20:26');

-- --------------------------------------------------------

--
-- Table structure for table `productpictures`
--

CREATE TABLE `productpictures` (
  `id` int(10) UNSIGNED NOT NULL,
  `productid` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `pic` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `productpictures`
--

INSERT INTO `productpictures` (`id`, `productid`, `pic`, `created_at`, `updated_at`) VALUES
(1, '50', '1549429804.png', '2019-02-06 05:10:04', '2019-02-06 05:10:04');

-- --------------------------------------------------------

--
-- Table structure for table `productquantities`
--

CREATE TABLE `productquantities` (
  `id` int(10) UNSIGNED NOT NULL,
  `prod_id` int(11) NOT NULL,
  `options_id` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `brand_id` int(11) DEFAULT NULL,
  `branch_id` int(11) NOT NULL,
  `price` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `description` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `quantity` int(11) DEFAULT NULL,
  `unit` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `var_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `productquantities`
--

INSERT INTO `productquantities` (`id`, `prod_id`, `options_id`, `brand_id`, `branch_id`, `price`, `description`, `quantity`, `unit`, `var_name`, `remember_token`, `created_at`, `updated_at`) VALUES
(102, 47, '26', NULL, 4, '300.00', NULL, 589, NULL, '', NULL, '2019-01-09 16:50:23', '2019-01-23 14:46:48'),
(103, 47, '27', NULL, 4, '300.00', NULL, 597, NULL, '', NULL, '2019-01-09 16:50:23', '2019-01-09 19:18:46'),
(104, 47, '26', NULL, 5, '300.00', NULL, 500, NULL, '', NULL, '2019-01-09 16:50:25', '2019-01-09 17:08:11'),
(105, 47, '27', NULL, 5, '300.00', NULL, 500, NULL, '', NULL, '2019-01-09 16:50:25', '2019-01-09 17:08:19'),
(106, 47, '26', NULL, 6, '300', NULL, 0, NULL, '', NULL, '2019-01-09 16:50:27', '2019-01-09 16:50:27'),
(107, 47, '27', NULL, 6, '300', NULL, 0, NULL, '', NULL, '2019-01-09 16:50:27', '2019-01-09 16:50:27'),
(108, 48, '29', NULL, 4, '30', NULL, 0, NULL, '', NULL, '2019-01-09 18:16:56', '2019-01-09 18:16:56'),
(109, 48, '30', NULL, 4, '30', NULL, 0, NULL, '', NULL, '2019-01-09 18:16:56', '2019-01-09 18:16:56'),
(110, 48, '29', NULL, 5, '30', NULL, 0, NULL, '', NULL, '2019-01-09 18:16:57', '2019-01-09 18:16:57'),
(111, 48, '30', NULL, 5, '30', NULL, 0, NULL, '', NULL, '2019-01-09 18:16:57', '2019-01-09 18:16:57'),
(112, 48, '29', NULL, 6, '30', NULL, 0, NULL, '', NULL, '2019-01-09 18:16:59', '2019-01-09 18:16:59'),
(113, 48, '30', NULL, 6, '30', NULL, 0, NULL, '', NULL, '2019-01-09 18:16:59', '2019-01-09 18:16:59'),
(114, 49, '31', NULL, 4, '20', NULL, 20, NULL, 'Good', NULL, '2019-01-09 18:37:39', '2019-02-10 09:28:06'),
(115, 49, '32', NULL, 4, '20', NULL, 0, NULL, 'Bad', NULL, '2019-01-09 18:37:39', '2019-01-09 18:37:39'),
(116, 49, '31', NULL, 5, '20', NULL, 0, NULL, 'Good', NULL, '2019-01-09 18:37:42', '2019-01-09 18:37:42'),
(117, 49, '32', NULL, 5, '20', NULL, 0, NULL, 'Bad', NULL, '2019-01-09 18:37:42', '2019-01-09 18:37:42'),
(118, 49, '31', NULL, 6, '20', NULL, 0, NULL, 'Good', NULL, '2019-01-09 18:37:43', '2019-01-09 18:37:43'),
(119, 49, '32', NULL, 6, '20', NULL, 0, NULL, 'Bad', NULL, '2019-01-09 18:37:43', '2019-01-09 18:37:43'),
(120, 50, '33', NULL, 4, '0', NULL, 31, NULL, '', NULL, '2019-02-06 05:14:23', '2019-02-10 09:27:57'),
(121, 50, '33', NULL, 4, '0', NULL, 21, NULL, '', NULL, '2019-02-06 05:16:41', '2019-02-06 05:16:41');

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `id` int(10) UNSIGNED NOT NULL,
  `pic` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `product_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `brand_id` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `category_id` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `warehousequantity` int(11) DEFAULT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `unit` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `bulkquantity` int(11) NOT NULL,
  `bulkunit` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`id`, `pic`, `product_name`, `description`, `brand_id`, `category_id`, `warehousequantity`, `remember_token`, `created_at`, `updated_at`, `unit`, `bulkquantity`, `bulkunit`) VALUES
(47, '', 'Test 1', 'test1', '2', '2', NULL, NULL, '2019-01-09 16:49:47', '2019-01-09 16:49:47', 'piece', 20, 'Box'),
(48, '', 'New', 'new', '1', '2', NULL, NULL, '2019-01-09 18:16:29', '2019-01-09 18:16:29', 'piece', 40, 'Box'),
(49, '', 'Latest', 'sadasda', '1', '2', NULL, NULL, '2019-01-09 18:35:32', '2019-01-09 18:35:32', 'piece', 20, 'Box'),
(50, '', 'Latest', 'dsadas', '1', '2', NULL, NULL, '2019-02-06 04:08:13', '2019-02-06 04:08:13', 'piece', 23, 'Box');

-- --------------------------------------------------------

--
-- Table structure for table `productvariants`
--

CREATE TABLE `productvariants` (
  `id` int(10) UNSIGNED NOT NULL,
  `prod_id` int(11) NOT NULL,
  `var_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `productvariants`
--

INSERT INTO `productvariants` (`id`, `prod_id`, `var_name`, `created_at`, `updated_at`) VALUES
(21, 47, 'Size', '2019-01-09 16:50:13', '2019-01-09 16:50:13'),
(22, 48, 'Color', '2019-01-09 18:16:42', '2019-01-09 18:16:42'),
(23, 49, 'Type', '2019-01-09 18:35:53', '2019-01-09 18:35:53'),
(24, 50, 'N/A', '2019-02-06 04:27:59', '2019-02-06 04:27:59');

-- --------------------------------------------------------

--
-- Table structure for table `productvariantsoptions`
--

CREATE TABLE `productvariantsoptions` (
  `id` int(10) UNSIGNED NOT NULL,
  `var_id` int(11) NOT NULL,
  `option_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `productvariantsoptions`
--

INSERT INTO `productvariantsoptions` (`id`, `var_id`, `option_name`, `created_at`, `updated_at`) VALUES
(26, 21, 'Small', '2019-01-09 16:50:13', '2019-01-09 16:50:13'),
(27, 21, 'Medium', '2019-01-09 16:50:13', '2019-01-09 16:50:13'),
(28, 21, 'Large', '2019-01-09 16:53:12', '2019-01-09 16:53:12'),
(29, 22, 'Black', '2019-01-09 18:16:42', '2019-01-09 18:16:42'),
(30, 22, 'Red', '2019-01-09 18:16:52', '2019-01-09 18:16:52'),
(31, 23, 'Good', '2019-01-09 18:35:53', '2019-01-09 18:35:53'),
(32, 23, 'Bad', '2019-01-09 18:35:53', '2019-01-09 18:35:53'),
(33, 24, 'N/A', '2019-02-06 04:27:59', '2019-02-06 04:27:59');

-- --------------------------------------------------------

--
-- Table structure for table `purchaserecords`
--

CREATE TABLE `purchaserecords` (
  `id` int(10) UNSIGNED NOT NULL,
  `purchasenumber` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `date` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `quantity` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `recievequantity` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `price` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `prodquantityid` int(11) NOT NULL,
  `status` int(11) NOT NULL,
  `recievedate` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `skuid` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `purchaserecords`
--

INSERT INTO `purchaserecords` (`id`, `purchasenumber`, `date`, `quantity`, `recievequantity`, `price`, `prodquantityid`, `status`, `recievedate`, `skuid`, `created_at`, `updated_at`) VALUES
(2, 'KLT-11072018-3', '11/07/2018', '1', NULL, NULL, 3, 1, NULL, NULL, '2018-11-07 15:51:04', '2018-11-07 15:51:07'),
(4, 'KLT-01032019-7', '01/03/2019', '100', '100', NULL, 36, 2, '01/03/2019', '15', '2019-01-03 13:50:42', '2019-01-03 14:22:02'),
(5, 'KLT-01032019-7', '01/03/2019', '500', '500', NULL, 46, 2, '01/03/2019', '24', '2019-01-03 13:57:08', '2019-01-03 14:22:38'),
(6, 'KLT-01032019-8', '01/03/2019', '600', '600', NULL, 36, 2, '01/03/2019', '15', '2019-01-03 14:01:38', '2019-01-03 14:20:59'),
(7, 'KLT-01032019-9', '01/03/2019', '500', '500', NULL, 46, 2, '01/03/2019', '24', '2019-01-03 14:32:02', '2019-01-03 14:32:12'),
(8, 'KLT-01032019-10', '01/03/2019', '200', '200', NULL, 46, 2, '01/03/2019', '24', '2019-01-03 14:32:36', '2019-01-03 14:32:44'),
(9, 'KLT-01042019-11', '01/04/2019', '2', '2', NULL, 46, 2, '01/04/2019', '24', '2019-01-03 16:32:39', '2019-01-03 16:32:47');

-- --------------------------------------------------------

--
-- Table structure for table `purchaserequests`
--

CREATE TABLE `purchaserequests` (
  `id` int(10) UNSIGNED NOT NULL,
  `purchasenumber` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `date` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `purchaserequests`
--

INSERT INTO `purchaserequests` (`id`, `purchasenumber`, `status`, `date`, `created_at`, `updated_at`) VALUES
(1, 'PR-01', '0', '10/26/2018', '2018-10-25 19:50:39', '2018-10-25 19:50:39'),
(2, 'PR-01', '0', '10/26/2018', '2018-10-25 19:51:26', '2018-10-25 19:51:26'),
(3, 'KLT-11072018-3', '0', '11/07/2018', '2018-11-07 15:45:00', '2018-11-07 15:45:00'),
(4, 'KLT-12112018-4', '0', '12/11/2018', '2018-12-11 08:42:28', '2018-12-11 08:42:28'),
(5, 'KLT-01032019-5', '0', '01/03/2019', '2019-01-03 09:04:29', '2019-01-03 09:04:29'),
(6, 'KLT-01032019-6', '0', '01/03/2019', '2019-01-03 13:11:48', '2019-01-03 13:11:48'),
(7, 'KLT-01032019-7', '0', '01/03/2019', '2019-01-03 13:15:04', '2019-01-03 13:15:04'),
(8, 'KLT-01032019-8', '0', '01/03/2019', '2019-01-03 14:01:31', '2019-01-03 14:01:31'),
(9, 'KLT-01032019-9', '2', '01/03/2019', '2019-01-03 14:31:54', '2019-01-03 14:32:13'),
(10, 'KLT-01032019-10', '2', '01/03/2019', '2019-01-03 14:32:32', '2019-01-03 14:32:46'),
(11, 'KLT-01042019-11', '2', '01/04/2019', '2019-01-03 16:24:48', '2019-01-03 16:32:49');

-- --------------------------------------------------------

--
-- Table structure for table `purchases`
--

CREATE TABLE `purchases` (
  `id` int(10) UNSIGNED NOT NULL,
  `amount` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `amountpaid` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `change` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `cashier_id` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `branchid` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `orderNumber` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `ornumber` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `date` date NOT NULL,
  `status` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `purchases`
--

INSERT INTO `purchases` (`id`, `amount`, `amountpaid`, `change`, `cashier_id`, `branchid`, `orderNumber`, `ornumber`, `date`, `status`, `created_at`, `updated_at`) VALUES
(1, '18287.5', '18287.50', '0', '41', '4', 'L5AO8KIGSP', '852', '2018-10-23', NULL, '2018-10-22 18:35:17', '2018-10-22 18:35:17'),
(2, '1999', '1999', '0', '41', '4', 'U4M8IJPNQS', '856', '2018-10-23', NULL, '2018-10-22 18:41:57', '2018-10-22 18:41:57'),
(3, '4000', '4000', '0', '44', '5', 'FIUREEUEB7', '852', '2018-10-26', NULL, '2018-10-25 20:29:04', '2018-10-25 20:29:04'),
(4, '4000', '4000', '0', '43', '4', 'XZRF7NSSBM', '3562', '2018-10-26', NULL, '2018-10-25 20:29:04', '2018-10-25 20:29:04'),
(6, '4000', '4000', '0', '45', '6', 'NUM6ATMTH2', '0123', '2018-10-26', NULL, '2018-10-25 20:29:18', '2018-10-25 20:29:18'),
(7, '4000', '4000', '0', '46', '7', 'UKQZRXR7SR', '3257', '2018-10-26', NULL, '2018-10-25 20:29:24', '2018-10-25 20:29:24'),
(8, '4000', '4000', '0', '43', '4', 'Z8AMB66B7A', '354', '2018-10-26', NULL, '2018-10-25 20:33:11', '2018-10-25 20:33:11'),
(9, '4050', '4050', '0', '43', '4', 'ADVHCQSPTB', '53710', '2018-10-26', NULL, '2018-10-25 20:38:14', '2018-10-25 20:38:14'),
(10, '2180', '2180', '0', '44', '5', 'JHKJXHNQGT', '856', '2018-10-26', NULL, '2018-10-25 20:39:36', '2018-10-25 20:39:36'),
(11, '1400', '1500', '100', '45', '6', '0MOYBQ1WMF', '0124', '2018-10-26', NULL, '2018-10-25 20:46:19', '2018-10-25 20:46:19'),
(12, '700', '700', '0', '43', '4', 'BWY4PDKPNR', '231', '2018-10-26', NULL, '2018-10-25 20:47:18', '2018-10-25 20:47:18'),
(13, '2340', '2340', '0', '44', '5', 'XR2O4MPJNK', '857', '2018-10-26', NULL, '2018-10-25 21:15:36', '2018-10-25 21:15:36'),
(14, '23400', '23400', '0', '44', '5', 'FAAEFBX9ZN', '858', '2018-10-26', NULL, '2018-10-25 21:24:36', '2018-10-25 21:24:36'),
(15, '23400', '23400', '0', '44', '5', 'VK2OMMJPQO', '859', '2018-10-26', NULL, '2018-10-25 21:42:25', '2018-10-25 21:42:25'),
(16, '12150', '12150', '0', '43', '4', 'JLKMB9ENRH', '526', '2018-10-26', NULL, '2018-10-25 22:33:15', '2018-10-25 22:33:15'),
(17, '1999', '2000', '1', '43', '4', 'RZROGXA6JY', '232333', '2018-10-26', NULL, '2018-10-26 04:16:42', '2018-10-26 04:16:42'),
(18, '1999', '2000', '1', '43', '4', '76EKHVLUG0', '2000', '2018-10-26', NULL, '2018-10-26 05:38:13', '2018-10-26 05:38:13'),
(19, '1999', '2000', '1', '43', '4', 'FJN4KPFJS1', '3322222', '2018-10-26', NULL, '2018-10-26 15:47:50', '2018-10-26 15:47:50'),
(20, '5858', '6000', '142', '43', '4', 'NA6CJDNPQD', '2322', '2018-10-26', NULL, '2018-10-26 15:48:44', '2018-10-26 15:48:44'),
(21, '1670', '1700', '30', '43', '4', 'CJI2VUIZMT', '233332', '2018-10-26', NULL, '2018-10-26 15:49:25', '2018-10-26 15:49:25'),
(22, '1000', '1000', '0', '43', '4', 'NWZ1HDBDTG', '2333', '2018-10-27', NULL, '2018-10-26 16:30:40', '2018-10-26 16:30:40'),
(23, '320', '320', '0', '44', '5', 'KLJA42O75P', '12345', '2018-10-27', '0', '2018-10-27 02:50:56', '2018-10-27 02:50:56'),
(24, '109', '110', '1', '45', '6', 'QBCRHAQMQY', '0987', '2018-10-27', '0', '2018-10-27 02:55:33', '2018-10-27 02:55:33'),
(25, '109', '109', '0', '44', '5', '4CXVY2MTKV', '1256', '2018-10-27', '0', '2018-10-27 03:09:21', '2018-10-27 03:09:21'),
(26, '1018', '218', '-800', '44', '5', 'CI5V5BX7RD', '2265', '2018-10-27', '0', '2018-10-27 03:11:39', '2018-10-27 03:11:39'),
(27, '1715', '1680', '-35', '44', '5', '9K7VXPRIVM', '1456', '2018-10-27', '0', '2018-10-27 03:13:04', '2018-10-27 03:13:04'),
(28, '109', '109', '0', '45', '6', 'JRQEXYT75A', '0753', '2018-10-27', '0', '2018-10-27 03:13:40', '2018-10-27 03:13:40'),
(29, '109', '109', '0', '45', '6', 'U3WRZQMXPJ', '0435', '2018-10-27', '0', '2018-10-27 03:14:43', '2018-10-27 03:14:43'),
(30, '109', '109', '0', '45', '6', '7PCXNLF5B7', '0435', '2018-10-27', '0', '2018-10-27 03:14:44', '2018-10-27 03:14:44'),
(31, '320', '320', '0', '46', '7', 'PVYMS4VKNC', '3563', '2018-10-27', '0', '2018-10-27 03:15:30', '2018-10-27 03:15:30'),
(32, '1999', '2000', '1', '43', '4', 'MLYXB7UHUF', '32222', '2018-10-27', '0', '2018-10-27 03:19:58', '2018-10-27 03:19:58'),
(33, '218', '218', '0', '45', '6', 'G4RFZRSSBN', '0164', '2018-10-27', '0', '2018-10-27 03:20:23', '2018-10-27 03:20:23'),
(34, '260', '260', '0', '45', '6', 'KLFXMLMK0E', '0164', '2018-10-27', '0', '2018-10-27 03:21:32', '2018-10-27 03:21:32'),
(35, '2300', '2300', '0', '44', '5', '6IUTHJRLTK', '50', '2018-10-27', '0', '2018-10-27 03:24:58', '2018-10-27 03:24:58'),
(36, '2250', '2250', '0', '43', '4', '4O8JCFEBRR', 'h87', '2018-10-27', '0', '2018-10-27 03:25:26', '2018-10-27 03:25:26'),
(37, '6720', '6720', '0', '44', '5', '5LMMDT5P1L', '50', '2018-10-27', '0', '2018-10-27 03:25:53', '2018-10-27 03:25:53'),
(38, '7020', '7020', '0', '43', '4', 'OIX9FGVODD', '24', '2018-10-27', '0', '2018-10-27 03:26:12', '2018-10-27 03:26:12'),
(39, '2673', '2673', '0', '43', '4', 'ZUPGEK9XJE', '364', '2018-10-27', '0', '2018-10-27 03:26:52', '2018-10-27 03:26:52'),
(40, '4050', '4050', '0', '43', '4', 'QESCONTCHL', '25', '2018-10-27', '0', '2018-10-27 03:28:46', '2018-10-27 03:28:46'),
(41, '909', '909', '0', '45', '6', 'OVDYFB2FQF', '987', '2018-10-27', '0', '2018-10-27 03:29:32', '2018-10-27 03:29:32'),
(42, '545', '545', '0', '44', '5', 'ZXJEOVOJIO', '12345', '2018-10-27', '0', '2018-10-27 03:35:30', '2018-10-27 03:35:30'),
(43, '46800', '46800', '0', '44', '5', 'A6YNLUX8P2', '123', '2018-10-27', '0', '2018-10-27 03:38:37', '2018-10-27 03:38:37'),
(44, '46800', '46800', '0', '44', '5', 'NJO30HXPFP', '123', '2018-10-27', '0', '2018-10-27 03:39:34', '2018-10-27 03:39:34'),
(45, '2250', '2250', '0', '43', '4', 'KHFI3OPXIG', '125', '2018-10-27', '0', '2018-10-27 03:40:27', '2018-10-27 03:40:27'),
(46, '545', '545', '0', '44', '5', 'YOVPDOQ6TQ', '148', '2018-10-27', '0', '2018-10-27 03:40:42', '2018-10-27 03:40:42'),
(47, '20826', '20826', '0', '44', '5', 'GOJRZAV2VT', '159', '2018-10-27', '0', '2018-10-27 03:41:26', '2018-10-27 03:41:26'),
(48, '17820', '17820', '0', '43', '4', 'ICSQYUT6MB', '874', '2018-10-27', '0', '2018-10-27 03:42:33', '2018-10-27 03:42:33'),
(49, '9315', '9315', '0', '45', '6', 'URIV1US54K', '0453', '2018-10-27', '0', '2018-10-27 03:42:36', '2018-10-27 03:42:36'),
(50, '7920', '7920', '0', '44', '5', '5TOBKWE9ID', '1234', '2018-10-27', '0', '2018-10-27 03:45:03', '2018-10-27 03:45:03'),
(51, '2340', '2340', '0', '44', '5', '7HCRCZKUF8', '10', '2018-10-27', '0', '2018-10-27 03:45:39', '2018-10-27 03:45:39'),
(52, '2340', '2340', '0', '44', '5', 'HK3TR4ANVU', '113', '2018-10-27', '1', '2018-10-27 03:47:23', '2018-10-28 17:20:37'),
(53, '9315', '9315', '0', '46', '7', '47KCKKLNQS', '3565', '2018-10-27', '0', '2018-10-27 03:47:44', '2018-10-27 03:47:44'),
(54, '177110', '180000', '2890', '44', '5', 'H4ZEB7LSOR', '322222', '2018-10-27', '1', '2018-10-27 03:57:06', '2018-10-28 17:19:47'),
(55, '177110', '177110', '0', '44', '5', 'TYFYW0BBHY', '1', '2018-10-27', '1', '2018-10-27 04:00:56', '2018-10-28 17:04:05'),
(56, '891', '891', '0', '43', '4', 'GCTWLCHDBV', '66', '2018-10-27', '1', '2018-10-27 04:02:36', '2018-10-29 04:07:37'),
(57, '41280', '41280', '0', '43', '4', 'TEL0PJU0FO', '859', '2018-10-27', '1', '2018-10-27 04:03:51', '2018-10-29 03:34:20'),
(58, '2250', '2500', '250', '44', '5', 'DMJTVOE8G8', '21212121', '2018-10-29', '1', '2018-10-28 17:23:06', '2018-10-28 17:24:10'),
(59, '3850', '4000', '150', '44', '5', 'TETEUG4EFQ', '212121', '2018-10-29', '1', '2018-10-28 17:24:57', '2018-10-28 17:25:12'),
(60, '2700', '5990', '3290', '51', '4', 'CAU0M2LJHP', '4454', '2019-01-10', '0', '2019-01-09 19:18:46', '2019-01-09 19:18:46');

-- --------------------------------------------------------

--
-- Table structure for table `reqorders`
--

CREATE TABLE `reqorders` (
  `id` int(10) UNSIGNED NOT NULL,
  `req_id` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `item_id` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `rquantity` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `ramount` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `requests`
--

CREATE TABLE `requests` (
  `id` int(10) UNSIGNED NOT NULL,
  `customer_id` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `req_order_id` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `reservations`
--

CREATE TABLE `reservations` (
  `id` int(10) UNSIGNED NOT NULL,
  `requestId` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `userId` int(11) NOT NULL,
  `message` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `reservestatus` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `returnsproductlists`
--

CREATE TABLE `returnsproductlists` (
  `id` int(10) UNSIGNED NOT NULL,
  `branchid` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `item_id` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `rquantity` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `note` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `returnbatchnum` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `returnsproductlists`
--

INSERT INTO `returnsproductlists` (`id`, `branchid`, `item_id`, `rquantity`, `note`, `returnbatchnum`, `status`, `created_at`, `updated_at`) VALUES
(1, '7', '16', '1', 'defective', 'HZY9KYI3LN', '0', '2018-10-25 22:33:22', '2018-10-25 22:33:22'),
(2, '7', '16', '1', 'defective', 'P4FC284WVJ', '0', '2018-10-25 22:34:39', '2018-10-25 22:34:39'),
(3, '4', '1', '1', 'dsdsdssdsd', 'A0BALXCCFB', '0', '2018-10-26 17:03:46', '2018-10-26 17:03:46'),
(4, '5', '6', '2', 'Damage', 'EDE39QOUYD', '0', '2018-10-28 17:33:02', '2018-10-28 17:33:02'),
(5, '5', '6', '1', 'sssddssssa', 'AR6PKGGRIP', '0', '2018-10-29 05:02:50', '2018-10-29 05:02:50'),
(6, '4', '49', '1', 'test', 'RPBG8BEUKM', '0', '2019-01-23 14:41:34', '2019-01-23 14:41:34'),
(7, '4', '49', '1', 'testsda', 'GAK3BRMFHK', '0', '2019-01-23 14:42:58', '2019-01-23 14:42:58'),
(8, '4', '49', '1', 'testsdadsads', '5AIHDPOLXD', '0', '2019-01-23 14:43:39', '2019-01-23 14:43:39'),
(9, '4', '49', '1', 'testsdadsadsdasdasd', 'RNCU0RDRHN', '0', '2019-01-23 14:43:55', '2019-01-23 14:43:55'),
(10, '4', '49', '1', 'testsdadsadsdasddasdasasd', '8WGGOMWPXA', '0', '2019-01-23 14:46:04', '2019-01-23 14:46:04'),
(11, '4', '102', '5', 'dasdasdas', '5JUI6BFECF', '0', '2019-01-23 14:46:48', '2019-01-23 14:46:48');

-- --------------------------------------------------------

--
-- Table structure for table `returnsproducts`
--

CREATE TABLE `returnsproducts` (
  `id` int(10) UNSIGNED NOT NULL,
  `branchid` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `item_id` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `rquantity` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `skuproductvariantsoptions`
--

CREATE TABLE `skuproductvariantsoptions` (
  `id` int(10) UNSIGNED NOT NULL,
  `var_id` int(11) NOT NULL,
  `options_id` int(11) NOT NULL,
  `prod_id` int(11) NOT NULL,
  `warehousequantity` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `varprice` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `skuproductvariantsoptions`
--

INSERT INTO `skuproductvariantsoptions` (`id`, `var_id`, `options_id`, `prod_id`, `warehousequantity`, `varprice`, `created_at`, `updated_at`) VALUES
(26, 21, 26, 47, '400', '300', '2019-01-09 16:50:13', '2019-01-09 16:50:13'),
(27, 21, 27, 47, '400', '300', '2019-01-09 16:50:13', '2019-01-09 16:50:13'),
(28, 21, 28, 47, '300', '400', '2019-01-09 16:53:12', '2019-01-09 16:53:12'),
(29, 22, 29, 48, '500', '30', '2019-01-09 18:16:42', '2019-01-09 18:16:42'),
(30, 22, 30, 48, '400', '30', '2019-01-09 18:16:52', '2019-01-09 18:16:52'),
(31, 23, 31, 49, '280', '20', '2019-01-09 18:35:53', '2019-02-10 08:53:30'),
(32, 23, 32, 49, '380', '20', '2019-01-09 18:35:53', '2019-01-23 13:49:29'),
(33, 24, 33, 50, '11', '20', '2019-02-06 04:27:59', '2019-02-10 08:53:27');

-- --------------------------------------------------------

--
-- Table structure for table `suppliers`
--

CREATE TABLE `suppliers` (
  `id` int(10) UNSIGNED NOT NULL,
  `supplier_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `supplier_address` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `suppliers`
--

INSERT INTO `suppliers` (`id`, `supplier_name`, `supplier_address`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'Sky Direct', 'Manila', NULL, '2018-01-21 19:11:26', '2018-07-10 16:01:55');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `usertype` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `contactnum` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `company` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `profilepic` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `password`, `usertype`, `contactnum`, `company`, `profilepic`, `remember_token`, `created_at`, `updated_at`) VALUES
(21, 'Gege', 'gegejosper@gmail.com', '$2y$10$CcMDgpcyfEhZhcrzEMgkGO7asknQ.dqxFjipDPFUSAMQw6ZjqCmIa', 'admin', NULL, NULL, '', 'arUKcAs5c9gj3xCJ208pvJpG5NYxZtnVjA3WCA3B94pRXRD2sXusUvF2KO9d', '2018-01-22 05:52:13', '2018-01-22 05:52:13'),
(34, 'admin', 'admin@kenlextelecom.com', '$2y$10$CcMDgpcyfEhZhcrzEMgkGO7asknQ.dqxFjipDPFUSAMQw6ZjqCmIa', 'admin', NULL, NULL, NULL, 'TA5DQ0qLA36Zt5ojPIL65YEWaZDLIb6mrjW1rJAlMGhuxpNkVWmX3aW7Am1m', NULL, NULL),
(38, 'Accounting', 'acc@kenlextelecom.com', '$2y$10$/uDAVAAioVana5biA1iuge4/bHmvYyrw66EknWXdkewNoQysxSoJ2', 'accounting', NULL, NULL, NULL, 'BXXRxcwGJG8ySmyT0XdGVJRv4egyXGNtMSnt2UwOx3sv0khtvTwB7oJIbt2J', '2018-10-14 17:57:26', '2018-10-14 17:57:26'),
(41, 'wilma coca', 'cctvwilma@gmail.com', '$2y$10$7bbbKKG5JDLgLnYSPIK/7u2jUQ2kKw8zOyZ.58nI0dJPwpSJ5NY9G', 'cashier', NULL, NULL, NULL, 'Lry8UHT9vfFSvNacxG8yu4v8Fs2i5nuthchzx5FpXYg30fF5WYiJsjRyR51A', '2018-10-19 00:14:33', '2018-10-19 00:14:33'),
(42, 'Test', 'test@gmail.com', '$2y$10$CcMDgpcyfEhZhcrzEMgkGO7asknQ.dqxFjipDPFUSAMQw6ZjqCmIa', 'cashier', NULL, NULL, NULL, 'wwGPDJmLPJ9MRZipnTFGWrNfQ0LVwr4x1ABsWbH5VjDMXjNFauCQOcLA7C2D', '2018-10-25 07:09:27', '2018-10-25 07:09:27'),
(43, 'NEECEL PEREZ', 'neecel@kenlextelecom.com', '$2y$10$dBq7lblqOwECyALI3.GR/ueu74l54qO33Vf.YkMpxehOzW3hMY2Jm', 'cashier', NULL, NULL, NULL, 'UmdDgmucTk6cEWoiTu6aGfzzBfS2EkdRO0sPWmGw5JgyQY9hKlAqiccEbZlk', '2018-10-25 19:29:20', '2018-10-29 04:35:09'),
(44, 'sheryl', 'sheryl@kenlextelecom.com', '$2y$10$.m/Oygp0Z79J6TrUsVqrvuQIcjpt7byPJmxZbXdoOnuQmy7B1X2.W', 'cashier', NULL, NULL, NULL, 'UvhpaXQj3Se7mPFBsm6sMUxmG16BzCyFHmgB7Bk5EtlKJb5MpcprBVR84mWT', '2018-10-25 19:30:40', '2019-01-08 15:17:24'),
(45, 'MARY GRACE ROSAURO', 'marygrace@kenlextelecom.com', '$2y$10$eYZNIcUfFjxdvT7vmDzRc.PiXsqBjjihErk1BUasKIek5uSiuGjL6', 'cashier', NULL, NULL, NULL, 'YPfBop2iJalaum1KtSQU6taj76a85FEwBSplWhPQsfUMWETZtzbTe2XRDbFy', '2018-10-25 19:32:27', '2018-10-25 19:32:27'),
(46, 'rizalyn gregorio', 'rizalyn@kenlextelecom.com', '$2y$10$Fo2ET7D1/gB3cGCqCK.s6uL.vdwwEfavRrAnnngT.hAIqQMq6B2nO', 'cashier', NULL, NULL, NULL, 'IDyRfVSiAyPIH2cOWWjkrIdDbmOjghggcQGSDvYfl1kgc623a6fIWj6Iay3j', '2018-10-25 19:33:19', '2018-10-25 19:33:19'),
(47, 'Reggie', 'reg@gmail.com', '$2y$10$XuJzSRLZV3hagImJTYVJb.Do2hlkd2StVMXM2JgHKV091W3jdcEaC', 'cashier', NULL, NULL, NULL, NULL, '2019-01-08 14:55:33', '2019-01-08 15:07:37'),
(48, 'qw', 'qw@gmail.com', '$2y$10$gQOJbbXBl6RWYXET.eEc5O26A6jvuXAMrxfAU4EhdPyU7V5s.gVqq', 'cashier', NULL, NULL, NULL, NULL, '2019-01-08 15:01:56', '2019-01-08 15:01:56'),
(49, 'ge', 'gegegegege@gmail.com', '$2y$10$KoL7tOzm3.2p7Go5W01Ai.p5dviL6gcXm7WNKPMx2R5CW4j2qwmra', 'checker', NULL, NULL, NULL, NULL, '2019-01-08 15:05:46', '2019-01-08 15:11:29'),
(50, 'qqqq', 'qqq@gmail.com', '$2y$10$65i94kDl8IqELrRLRRvp2usyg4LkO9l7./D59VMs1y9l866fVil7e', 'cashier', NULL, NULL, NULL, NULL, '2019-01-08 15:06:40', '2019-01-08 15:06:40'),
(51, 'q', 'q@gmail.com', '$2y$10$1qz4qbhm4uhQTOtNofi9luj9K2IDHCeSpt2e8TfaezaMpfGJKzmoG', 'cashier', NULL, NULL, NULL, 'dFoNPbhzKP1k7kXtF3SPxlQXr5k4Un30zOxIOxBAxifynycr3erAJAIpXZFY', '2019-01-08 15:24:08', '2019-01-08 15:24:08'),
(52, 'checker', 'checker@gmail.com', '$2y$10$pf8i3m5GXkxCbQUPXjQUqeBcMP6QFLPURL4o7LNcel02E7m.G1s0q', 'checker', NULL, NULL, NULL, 'FTLOW9dyyMroSQhpOj1HB9fda9QeEhTPlVW0M8zVon6jGenE0qIbUwlqBYp7', '2019-02-10 08:48:34', '2019-02-10 10:06:11');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `branches`
--
ALTER TABLE `branches`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `branchusers`
--
ALTER TABLE `branchusers`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `brands`
--
ALTER TABLE `brands`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `cancelorders`
--
ALTER TABLE `cancelorders`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `carts`
--
ALTER TABLE `carts`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `cashierorders`
--
ALTER TABLE `cashierorders`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `customers`
--
ALTER TABLE `customers`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `custoorders`
--
ALTER TABLE `custoorders`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `dailyquantitysales`
--
ALTER TABLE `dailyquantitysales`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `distributionrecords`
--
ALTER TABLE `distributionrecords`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `distributions`
--
ALTER TABLE `distributions`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `itembalances`
--
ALTER TABLE `itembalances`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `items`
--
ALTER TABLE `items`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `orderitems`
--
ALTER TABLE `orderitems`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `packageitems`
--
ALTER TABLE `packageitems`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `productpictures`
--
ALTER TABLE `productpictures`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `productquantities`
--
ALTER TABLE `productquantities`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `productvariants`
--
ALTER TABLE `productvariants`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `productvariantsoptions`
--
ALTER TABLE `productvariantsoptions`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `purchaserecords`
--
ALTER TABLE `purchaserecords`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `purchaserequests`
--
ALTER TABLE `purchaserequests`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `purchases`
--
ALTER TABLE `purchases`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `reqorders`
--
ALTER TABLE `reqorders`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `requests`
--
ALTER TABLE `requests`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `reservations`
--
ALTER TABLE `reservations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `returnsproductlists`
--
ALTER TABLE `returnsproductlists`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `returnsproducts`
--
ALTER TABLE `returnsproducts`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `skuproductvariantsoptions`
--
ALTER TABLE `skuproductvariantsoptions`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `suppliers`
--
ALTER TABLE `suppliers`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `branches`
--
ALTER TABLE `branches`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `branchusers`
--
ALTER TABLE `branchusers`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `brands`
--
ALTER TABLE `brands`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `cancelorders`
--
ALTER TABLE `cancelorders`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `carts`
--
ALTER TABLE `carts`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `cashierorders`
--
ALTER TABLE `cashierorders`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `customers`
--
ALTER TABLE `customers`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;

--
-- AUTO_INCREMENT for table `custoorders`
--
ALTER TABLE `custoorders`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `dailyquantitysales`
--
ALTER TABLE `dailyquantitysales`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=42;

--
-- AUTO_INCREMENT for table `distributionrecords`
--
ALTER TABLE `distributionrecords`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=102;

--
-- AUTO_INCREMENT for table `distributions`
--
ALTER TABLE `distributions`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=29;

--
-- AUTO_INCREMENT for table `itembalances`
--
ALTER TABLE `itembalances`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `items`
--
ALTER TABLE `items`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=69;

--
-- AUTO_INCREMENT for table `orderitems`
--
ALTER TABLE `orderitems`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=75;

--
-- AUTO_INCREMENT for table `packageitems`
--
ALTER TABLE `packageitems`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=33;

--
-- AUTO_INCREMENT for table `productpictures`
--
ALTER TABLE `productpictures`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `productquantities`
--
ALTER TABLE `productquantities`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=122;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=51;

--
-- AUTO_INCREMENT for table `productvariants`
--
ALTER TABLE `productvariants`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- AUTO_INCREMENT for table `productvariantsoptions`
--
ALTER TABLE `productvariantsoptions`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=34;

--
-- AUTO_INCREMENT for table `purchaserecords`
--
ALTER TABLE `purchaserecords`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `purchaserequests`
--
ALTER TABLE `purchaserequests`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `purchases`
--
ALTER TABLE `purchases`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=61;

--
-- AUTO_INCREMENT for table `reqorders`
--
ALTER TABLE `reqorders`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `requests`
--
ALTER TABLE `requests`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `reservations`
--
ALTER TABLE `reservations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `returnsproductlists`
--
ALTER TABLE `returnsproductlists`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `returnsproducts`
--
ALTER TABLE `returnsproducts`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `skuproductvariantsoptions`
--
ALTER TABLE `skuproductvariantsoptions`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=34;

--
-- AUTO_INCREMENT for table `suppliers`
--
ALTER TABLE `suppliers`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=53;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

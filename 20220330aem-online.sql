-- phpMyAdmin SQL Dump
-- version 5.1.0
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Mar 30, 2022 at 01:07 AM
-- Server version: 5.7.32-35-log
-- PHP Version: 7.4.28

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `dbyhpam5asmrhw`
--

-- --------------------------------------------------------

--
-- Table structure for table `activities`
--

DROP TABLE IF EXISTS `activities`;
CREATE TABLE `activities` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `activityDescription` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `location` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `activityDateStart` date NOT NULL,
  `activityDateEnd` date NOT NULL,
  `papID` int(11) NOT NULL DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `activities`
--

INSERT INTO `activities` (`id`, `activityDescription`, `location`, `activityDateStart`, `activityDateEnd`, `papID`, `created_at`, `updated_at`) VALUES
(1, 'Digos City eBPLS Data Build-up', 'BPLO, Digos City Hall, Digos City', '2022-02-17', '2022-02-18', 1, '2022-02-16 00:23:02', '2022-02-16 00:23:02'),
(2, 'Matanao eBPLS Users Training', 'Arnaldos Hotel, Digos City', '2022-02-08', '2022-02-10', 1, '2022-02-16 20:51:11', '2022-02-16 20:51:11'),
(3, 'LGU Kiblawan Tech4Ed Center Turnover of Equipment and Launching', 'Kiblawan, Davao del Sur', '2022-03-17', '2022-03-18', 2, '2022-03-01 20:29:26', '2022-03-01 20:29:26');

-- --------------------------------------------------------

--
-- Table structure for table `activity_attendances`
--

DROP TABLE IF EXISTS `activity_attendances`;
CREATE TABLE `activity_attendances` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `RegisteredID` int(11) NOT NULL DEFAULT '0',
  `ActivityID` int(11) NOT NULL DEFAULT '0',
  `registrationDate` date NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `activity_attendances`
--

INSERT INTO `activity_attendances` (`id`, `RegisteredID`, `ActivityID`, `registrationDate`, `created_at`, `updated_at`) VALUES
(1, 2, 1, '2022-02-16', '2022-02-16 00:26:19', '2022-02-16 00:26:19'),
(2, 1, 1, '2022-02-16', '2022-02-16 00:27:57', '2022-02-16 00:27:57'),
(3, 5, 1, '2022-02-16', '2022-02-16 00:32:34', '2022-02-16 00:32:34'),
(4, 6, 1, '2022-02-17', '2022-02-16 01:11:19', '2022-02-16 01:11:19'),
(7, 9, 1, '2022-02-17', '2022-02-16 19:45:22', '2022-02-16 19:45:22'),
(8, 1, 2, '2022-02-07', '2022-02-16 20:51:31', '2022-02-16 20:51:31'),
(12, 5, 2, '2022-02-07', '2022-02-17 00:48:39', '2022-02-17 00:48:39'),
(13, 9, 2, '2022-02-08', '2022-02-17 00:49:29', '2022-02-17 00:49:29'),
(16, 8, 1, '2022-02-17', '2022-02-17 21:59:33', '2022-02-17 21:59:33'),
(17, 11, 1, '2022-02-18', '2022-02-17 22:44:00', '2022-02-17 22:44:00'),
(18, 2, 1, '2022-02-22', '2022-02-21 00:20:52', '2022-02-21 00:20:52'),
(19, 2, 2, '2022-02-23', '2022-02-21 17:33:00', '2022-02-21 17:33:00'),
(20, 13, 2, '2022-02-22', '2022-02-21 19:52:10', '2022-02-21 19:52:10'),
(21, 23, 1, '2022-03-13', '2022-03-13 22:32:22', '2022-03-13 22:32:22');

-- --------------------------------------------------------

--
-- Table structure for table `activity_expenses`
--

DROP TABLE IF EXISTS `activity_expenses`;
CREATE TABLE `activity_expenses` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `activityID` int(11) NOT NULL DEFAULT '0',
  `fuelLubricants` decimal(10,2) NOT NULL DEFAULT '0.00',
  `travelPerDiem` decimal(10,2) NOT NULL DEFAULT '0.00',
  `foodAccommodation` decimal(10,2) NOT NULL DEFAULT '0.00',
  `miscExpense` decimal(10,2) NOT NULL DEFAULT '0.00',
  `activityNotes` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `activity_expenses`
--

INSERT INTO `activity_expenses` (`id`, `activityID`, `fuelLubricants`, `travelPerDiem`, `foodAccommodation`, `miscExpense`, `activityNotes`, `created_at`, `updated_at`) VALUES
(1, 1, '19781.00', '13500.00', '0.00', '0.00', 'sample note', '2022-02-20 17:07:49', '2022-02-20 17:07:49'),
(3, 2, '1772.40', '25200.00', '0.00', '0.00', 'none', '2022-02-23 19:04:12', '2022-02-23 19:04:12');

-- --------------------------------------------------------

--
-- Table structure for table `evidences`
--

DROP TABLE IF EXISTS `evidences`;
CREATE TABLE `evidences` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `task_id` int(11) NOT NULL DEFAULT '0',
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `path` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `evidences`
--

INSERT INTO `evidences` (`id`, `task_id`, `name`, `path`, `created_at`, `updated_at`) VALUES
(1, 76, '164818655734.jpg', '164818655734.jpg', '2022-03-25 05:35:57', NULL),
(2, 82, '16485315144.jpg', '16485315144.jpg', '2022-03-29 05:25:14', NULL),
(3, 84, '164856392910.png', '164856392910.png', '2022-03-29 14:25:29', NULL),
(4, 83, '164856406523.png', '164856406523.png', '2022-03-29 14:27:45', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `failed_jobs`
--

DROP TABLE IF EXISTS `failed_jobs`;
CREATE TABLE `failed_jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `uuid` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `connection` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `images`
--

DROP TABLE IF EXISTS `images`;
CREATE TABLE `images` (
  `id` int(11) NOT NULL,
  `user_id` int(11) DEFAULT NULL,
  `name` varchar(100) NOT NULL,
  `path` varchar(255) NOT NULL,
  `created_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `images`
--

INSERT INTO `images` (`id`, `user_id`, `name`, `path`, `created_at`, `updated_at`) VALUES
(1, NULL, 'unnamed.jpg', 'public/images/R2q4CxIjYsngeXA97sHf9fGTWGqbE2QOds1Enbru.jpg', '2022-03-17 08:18:41', '2022-03-17 08:18:41'),
(2, NULL, 'jason_omac.jpg', 'public/images/8p3klwdx35sRo13Zyk8dNf2xfdQslzxB9srRDFiQ.jpg', '2022-03-17 08:20:38', '2022-03-17 08:20:38'),
(3, NULL, 'unnamed.jpg', 'public/images/5bICnj2G5NMXsAenf9uBwOhbsvsfiEQqjvZlcXLD.jpg', '2022-03-17 08:49:51', '2022-03-17 08:49:51'),
(4, NULL, 'unnamed.jpg', 'public/images/s70pqcfdBqT2VY6fMwd6g4fT0dNvGfDmZFiYt9me.jpg', '2022-03-18 00:42:35', '2022-03-18 00:42:35'),
(5, NULL, '235259349_177682501097408_6832642550029029818_n.jpg', 'images/aZGzRkNnLX9ywOZG91uDIV77CXuNLS4wDjoGBkxM.jpg', '2022-03-18 02:10:13', '2022-03-18 02:10:13'),
(6, NULL, 'jason_omac.jpg', 'images/Amtz4656yFz6MnOcG0v6aRcKo4IEDSkiTzMAz9mB.jpg', '2022-03-18 05:34:22', '2022-03-18 05:34:22'),
(7, 23, 'jason_omac.jpg', 'images/0fPJYO9IGONuNWUPyHz2gNWgl6Augi2BUwGc6xly.jpg', '2022-03-18 08:10:51', '2022-03-18 08:10:51'),
(8, 2, 'jason_omac_@.png', 'images/8hsNiD7gnF9rCCeGjXhr2e1iok71xxYRJeEVorwC.png', '2022-03-18 08:31:36', '2022-03-18 08:31:36'),
(9, 5, 'FPSM6921.jpg', 'images/WkDoCM36WCfOzEh9oTjzEFeWFtDCANTfe8lKRmJW.jpg', '2022-03-18 08:34:37', '2022-03-18 08:34:37'),
(10, 5, 'vien ID.png', 'images/o8hsSlUk0GS7N9PhVKkhDCCLe7t4baEXqk4AMqMk.png', '2022-03-18 08:35:20', '2022-03-18 08:35:20'),
(11, 24, 'vien.PNG', 'images/iNaps3HtHGVNs7ncWV8qVTMoqD3vhm3owoaIbZGD.png', '2022-03-30 08:16:52', '2022-03-30 08:16:52'),
(12, 24, 'vien.PNG', 'images/LfrQl1ecciowHcdPfHwKMCym9rQPRqRoJKAzTCv6.png', '2022-03-30 08:17:28', '2022-03-30 08:17:28');

-- --------------------------------------------------------

--
-- Table structure for table `log_activities`
--

DROP TABLE IF EXISTS `log_activities`;
CREATE TABLE `log_activities` (
  `id` int(10) UNSIGNED NOT NULL,
  `subject` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `url` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `method` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `ip` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `agent` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `user_id` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `log_activities`
--

INSERT INTO `log_activities` (`id`, `subject`, `url`, `method`, `ip`, `agent`, `user_id`, `created_at`, `updated_at`) VALUES
(1, 'User Login', 'https://dict-mc3.online/2021/aem/public/login', 'POST', '202.90.138.249', 'Mozilla/5.0 (iPad; CPU OS 14_7 like Mac OS X) AppleWebKit/605.1.15 (KHTML, like Gecko) CriOS/98.0.4758.97 Mobile/15E148 Safari/604.1', 1, '2022-03-13 18:05:52', '2022-03-13 18:05:52'),
(2, 'User Login', 'https://dict-mc3.online/2021/aem/public/login', 'POST', '202.90.138.249', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/99.0.4844.51 Safari/537.36', 2, '2022-03-13 18:12:39', '2022-03-13 18:12:39'),
(3, 'User Login', 'https://dict-mc3.online/2021/aem/public/login', 'POST', '175.176.91.252', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/99.0.4844.51 Safari/537.36', 9, '2022-03-13 18:39:30', '2022-03-13 18:39:30'),
(4, 'User Login', 'https://dict-mc3.online/2021/aem/public/login', 'POST', '202.90.138.249', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/99.0.4844.51 Safari/537.36', 1, '2022-03-13 20:17:04', '2022-03-13 20:17:04'),
(5, 'User Login', 'https://dict-mc3.online/2021/aem/public/login', 'POST', '202.90.138.249', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/99.0.4844.51 Safari/537.36', 5, '2022-03-13 20:32:58', '2022-03-13 20:32:58'),
(6, 'User Logout', 'https://dict-mc3.online/2021/aem/public/logout', 'GET', '202.90.138.249', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/99.0.4844.51 Safari/537.36', 1, '2022-03-13 20:40:10', '2022-03-13 20:40:10'),
(7, 'User Login', 'https://dict-mc3.online/2021/aem/public/login', 'POST', '202.90.138.249', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/99.0.4844.51 Safari/537.36', 2, '2022-03-13 20:40:22', '2022-03-13 20:40:22'),
(8, 'User Logout', 'https://dict-mc3.online/2021/aem/public/logout', 'GET', '202.90.138.249', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/99.0.4844.51 Safari/537.36', 1, '2022-03-13 20:41:01', '2022-03-13 20:41:01'),
(9, 'User Login', 'https://dict-mc3.online/2021/aem/public/login', 'POST', '202.90.138.249', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/99.0.4844.51 Safari/537.36', 2, '2022-03-13 20:41:52', '2022-03-13 20:41:52'),
(10, 'User Logout', 'https://dict-mc3.online/2021/aem/public/logout', 'GET', '202.90.138.249', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/99.0.4844.51 Safari/537.36', 1, '2022-03-13 20:42:40', '2022-03-13 20:42:40'),
(11, 'User Logout', 'https://dict-mc3.online/2021/aem/public/logout', 'GET', '202.90.138.249', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/99.0.4844.51 Safari/537.36', 1, '2022-03-13 20:58:52', '2022-03-13 20:58:52'),
(12, 'User Login', 'https://dict-mc3.online/2021/aem/public/login', 'POST', '202.90.138.249', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/99.0.4844.51 Safari/537.36', 2, '2022-03-13 20:59:00', '2022-03-13 20:59:00'),
(13, 'User Logout', 'https://dict-mc3.online/2021/aem/public/logout', 'GET', '202.90.138.249', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/99.0.4844.51 Safari/537.36', 1, '2022-03-13 21:02:37', '2022-03-13 21:02:37'),
(14, 'User Login', 'https://dict-mc3.online/2021/aem/public/login', 'POST', '202.90.138.249', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/99.0.4844.51 Safari/537.36', 22, '2022-03-13 21:02:46', '2022-03-13 21:02:46'),
(15, 'User Logout', 'https://dict-mc3.online/2021/aem/public/logout', 'GET', '202.90.138.249', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/99.0.4844.51 Safari/537.36', 1, '2022-03-13 21:03:29', '2022-03-13 21:03:29'),
(16, 'User Login', 'https://dict-mc3.online/2021/aem/public/login', 'POST', '202.90.138.249', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/99.0.4844.51 Safari/537.36', 2, '2022-03-13 21:03:40', '2022-03-13 21:03:40'),
(17, 'User Logout', 'https://dict-mc3.online/2021/aem/public/logout', 'GET', '202.90.138.249', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/99.0.4844.51 Safari/537.36', 1, '2022-03-13 21:04:47', '2022-03-13 21:04:47'),
(18, 'User Login', 'https://dict-mc3.online/2021/aem/public/login', 'POST', '202.90.138.249', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/99.0.4844.51 Safari/537.36', 22, '2022-03-13 21:04:53', '2022-03-13 21:04:53'),
(19, 'User Logout', 'https://dict-mc3.online/2021/aem/public/logout', 'GET', '202.90.138.249', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/99.0.4844.51 Safari/537.36', 1, '2022-03-13 21:07:56', '2022-03-13 21:07:56'),
(20, 'User Login', 'https://dict-mc3.online/2021/aem/public/login', 'POST', '202.90.138.249', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/99.0.4844.51 Safari/537.36', 2, '2022-03-13 21:08:56', '2022-03-13 21:08:56'),
(21, 'Accessed Permission Index', 'https://dict-mc3.online/2021/aem/public/admin/permissions', 'GET', '202.90.138.249', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/99.0.4844.51 Safari/537.36', 2, '2022-03-13 21:10:49', '2022-03-13 21:10:49'),
(22, 'Accessed Permission Create', 'https://dict-mc3.online/2021/aem/public/admin/permissions/create', 'GET', '202.90.138.249', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/99.0.4844.51 Safari/537.36', 2, '2022-03-13 21:10:51', '2022-03-13 21:10:51'),
(23, 'Just Created new Permission', 'https://dict-mc3.online/2021/aem/public/admin/permissions', 'POST', '202.90.138.249', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/99.0.4844.51 Safari/537.36', 2, '2022-03-13 21:10:56', '2022-03-13 21:10:56'),
(24, 'Accessed Permission Index', 'https://dict-mc3.online/2021/aem/public/admin/permissions', 'GET', '202.90.138.249', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/99.0.4844.51 Safari/537.36', 2, '2022-03-13 21:10:56', '2022-03-13 21:10:56'),
(25, 'Accessed Permission Create', 'https://dict-mc3.online/2021/aem/public/admin/permissions/create', 'GET', '202.90.138.249', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/99.0.4844.51 Safari/537.36', 2, '2022-03-13 21:10:57', '2022-03-13 21:10:57'),
(26, 'Just Created new Permission', 'https://dict-mc3.online/2021/aem/public/admin/permissions', 'POST', '202.90.138.249', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/99.0.4844.51 Safari/537.36', 2, '2022-03-13 21:11:05', '2022-03-13 21:11:05'),
(27, 'Accessed Permission Index', 'https://dict-mc3.online/2021/aem/public/admin/permissions', 'GET', '202.90.138.249', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/99.0.4844.51 Safari/537.36', 2, '2022-03-13 21:11:05', '2022-03-13 21:11:05'),
(28, 'Accessed Permission Create', 'https://dict-mc3.online/2021/aem/public/admin/permissions/create', 'GET', '202.90.138.249', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/99.0.4844.51 Safari/537.36', 2, '2022-03-13 21:11:14', '2022-03-13 21:11:14'),
(29, 'Accessed Permission Create', 'https://dict-mc3.online/2021/aem/public/admin/permissions/create', 'GET', '202.90.138.249', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/99.0.4844.51 Safari/537.36', 2, '2022-03-13 21:11:19', '2022-03-13 21:11:19'),
(30, 'User Logout', 'https://dict-mc3.online/2021/aem/public/logout', 'GET', '202.90.138.249', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/99.0.4844.51 Safari/537.36', 1, '2022-03-13 21:12:46', '2022-03-13 21:12:46'),
(31, 'User Login', 'https://dict-mc3.online/2021/aem/public/login', 'POST', '202.90.138.249', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/99.0.4844.51 Safari/537.36', 22, '2022-03-13 21:12:55', '2022-03-13 21:12:55'),
(32, 'User Logout', 'https://dict-mc3.online/2021/aem/public/logout', 'GET', '202.90.138.249', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/99.0.4844.51 Safari/537.36', 1, '2022-03-13 21:14:31', '2022-03-13 21:14:31'),
(33, 'User Login', 'https://dict-mc3.online/2021/aem/public/login', 'POST', '202.90.138.249', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/99.0.4844.51 Safari/537.36', 2, '2022-03-13 21:15:26', '2022-03-13 21:15:26'),
(34, 'User Logout', 'https://dict-mc3.online/2021/aem/public/logout', 'GET', '202.90.138.249', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/99.0.4844.51 Safari/537.36', 1, '2022-03-13 21:18:59', '2022-03-13 21:18:59'),
(35, 'User Login', 'https://dict-mc3.online/2021/aem/public/login', 'POST', '202.90.138.249', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/99.0.4844.51 Safari/537.36', 22, '2022-03-13 21:19:05', '2022-03-13 21:19:05'),
(36, 'User Logout', 'https://dict-mc3.online/2021/aem/public/logout', 'GET', '202.90.138.249', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/99.0.4844.51 Safari/537.36', 1, '2022-03-13 21:19:38', '2022-03-13 21:19:38'),
(37, 'User Login', 'https://dict-mc3.online/2021/aem/public/login', 'POST', '202.90.138.249', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/99.0.4844.51 Safari/537.36', 2, '2022-03-13 21:20:05', '2022-03-13 21:20:05'),
(38, 'User Logout', 'https://dict-mc3.online/2021/aem/public/logout', 'GET', '202.90.138.249', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/99.0.4844.51 Safari/537.36', 1, '2022-03-13 21:20:24', '2022-03-13 21:20:24'),
(39, 'User Login', 'https://dict-mc3.online/2021/aem/public/login', 'POST', '202.90.138.249', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/99.0.4844.51 Safari/537.36', 22, '2022-03-13 21:20:30', '2022-03-13 21:20:30'),
(40, 'User Logout', 'https://dict-mc3.online/2021/aem/public/logout', 'GET', '202.90.138.249', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/99.0.4844.51 Safari/537.36', 1, '2022-03-13 21:20:43', '2022-03-13 21:20:43'),
(41, 'User Login', 'https://dict-mc3.online/2021/aem/public/login', 'POST', '202.90.138.249', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/99.0.4844.51 Safari/537.36', 2, '2022-03-13 21:20:59', '2022-03-13 21:20:59'),
(42, 'User Logout', 'https://dict-mc3.online/2021/aem/public/logout', 'GET', '202.90.138.249', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/99.0.4844.51 Safari/537.36', 1, '2022-03-13 21:21:40', '2022-03-13 21:21:40'),
(43, 'User Login', 'https://dict-mc3.online/2021/aem/public/login', 'POST', '202.90.138.249', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/99.0.4844.51 Safari/537.36', 22, '2022-03-13 21:21:56', '2022-03-13 21:21:56'),
(44, 'User Logout', 'https://dict-mc3.online/2021/aem/public/logout', 'GET', '202.90.138.249', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/99.0.4844.51 Safari/537.36', 1, '2022-03-13 22:15:48', '2022-03-13 22:15:48'),
(45, 'User Login', 'https://dict-mc3.online/2021/aem/public/login', 'POST', '202.90.138.249', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/99.0.4844.51 Safari/537.36', 2, '2022-03-13 22:16:05', '2022-03-13 22:16:05'),
(46, 'User Logout', 'https://dict-mc3.online/2021/aem/public/logout', 'GET', '202.90.138.249', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/99.0.4844.51 Safari/537.36', 1, '2022-03-13 22:16:44', '2022-03-13 22:16:44'),
(47, 'User Login', 'https://dict-mc3.online/2021/aem/public/login', 'POST', '202.90.138.249', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/99.0.4844.51 Safari/537.36', 2, '2022-03-13 22:20:41', '2022-03-13 22:20:41'),
(48, 'User Logout', 'https://dict-mc3.online/2021/aem/public/logout', 'GET', '202.90.138.249', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/99.0.4844.51 Safari/537.36', 1, '2022-03-13 22:21:15', '2022-03-13 22:21:15'),
(49, 'User Login', 'https://dict-mc3.online/2021/aem/public/login', 'POST', '202.90.138.249', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/99.0.4844.51 Safari/537.36', 23, '2022-03-13 22:23:32', '2022-03-13 22:23:32'),
(50, 'User Logout', 'https://dict-mc3.online/2021/aem/public/logout', 'GET', '202.90.138.249', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/99.0.4844.51 Safari/537.36', 1, '2022-03-13 22:25:22', '2022-03-13 22:25:22'),
(51, 'User Login', 'https://dict-mc3.online/2021/aem/public/login', 'POST', '202.90.138.249', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/99.0.4844.51 Safari/537.36', 2, '2022-03-13 22:25:37', '2022-03-13 22:25:37'),
(52, 'User Logout', 'https://dict-mc3.online/2021/aem/public/logout', 'GET', '202.90.138.249', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/99.0.4844.51 Safari/537.36', 1, '2022-03-13 22:26:04', '2022-03-13 22:26:04'),
(53, 'User Login', 'https://dict-mc3.online/2021/aem/public/login', 'POST', '202.90.138.249', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/99.0.4844.51 Safari/537.36', 23, '2022-03-13 22:26:10', '2022-03-13 22:26:10'),
(54, 'User Logout', 'https://dict-mc3.online/2021/aem/public/logout', 'GET', '202.90.138.249', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/99.0.4844.51 Safari/537.36', 1, '2022-03-13 22:28:32', '2022-03-13 22:28:32'),
(55, 'User Login', 'https://dict-mc3.online/2021/aem/public/login', 'POST', '202.90.138.249', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/99.0.4844.51 Safari/537.36', 23, '2022-03-13 22:28:45', '2022-03-13 22:28:45'),
(56, 'User Logout', 'https://dict-mc3.online/2021/aem/public/logout', 'GET', '202.90.138.249', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/99.0.4844.51 Safari/537.36', 1, '2022-03-13 22:29:01', '2022-03-13 22:29:01'),
(57, 'User Login', 'https://dict-mc3.online/2021/aem/public/login', 'POST', '202.90.138.249', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/99.0.4844.51 Safari/537.36', 2, '2022-03-13 22:29:10', '2022-03-13 22:29:10'),
(58, 'User Logout', 'https://dict-mc3.online/2021/aem/public/logout', 'GET', '202.90.138.249', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/99.0.4844.51 Safari/537.36', 1, '2022-03-13 22:29:26', '2022-03-13 22:29:26'),
(59, 'User Login', 'https://dict-mc3.online/2021/aem/public/login', 'POST', '202.90.138.249', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/99.0.4844.51 Safari/537.36', 23, '2022-03-13 22:29:42', '2022-03-13 22:29:42'),
(60, 'User Logout', 'https://dict-mc3.online/2021/aem/public/logout', 'GET', '202.90.138.249', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/99.0.4844.51 Safari/537.36', 1, '2022-03-13 22:46:52', '2022-03-13 22:46:52'),
(61, 'User Login', 'https://dict-mc3.online/2021/aem/public/login', 'POST', '202.90.138.249', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/99.0.4844.51 Safari/537.36', 5, '2022-03-13 22:46:58', '2022-03-13 22:46:58'),
(62, 'User Logout', 'https://dict-mc3.online/2021/aem/public/logout', 'GET', '202.90.138.249', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/99.0.4844.51 Safari/537.36', 1, '2022-03-13 22:59:09', '2022-03-13 22:59:09'),
(63, 'User Login', 'https://dict-mc3.online/2021/aem/public/login', 'POST', '202.90.138.249', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/99.0.4844.51 Safari/537.36', 2, '2022-03-13 22:59:20', '2022-03-13 22:59:20'),
(64, 'Accessed Permission Index', 'https://dict-mc3.online/2021/aem/public/admin/permissions', 'GET', '202.90.138.249', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/99.0.4844.51 Safari/537.36', 2, '2022-03-13 23:04:13', '2022-03-13 23:04:13'),
(65, 'Accessed Permission Create', 'https://dict-mc3.online/2021/aem/public/admin/permissions/create', 'GET', '202.90.138.249', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/99.0.4844.51 Safari/537.36', 2, '2022-03-13 23:04:15', '2022-03-13 23:04:15'),
(66, 'Just Created new Permission', 'https://dict-mc3.online/2021/aem/public/admin/permissions', 'POST', '202.90.138.249', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/99.0.4844.51 Safari/537.36', 2, '2022-03-13 23:04:24', '2022-03-13 23:04:24'),
(67, 'Accessed Permission Index', 'https://dict-mc3.online/2021/aem/public/admin/permissions', 'GET', '202.90.138.249', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/99.0.4844.51 Safari/537.36', 2, '2022-03-13 23:04:24', '2022-03-13 23:04:24'),
(68, 'User Logout', 'https://dict-mc3.online/2021/aem/public/logout', 'GET', '202.90.138.249', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/99.0.4844.51 Safari/537.36', 1, '2022-03-13 23:06:59', '2022-03-13 23:06:59'),
(69, 'User Login', 'https://dict-mc3.online/2021/aem/public/login', 'POST', '202.90.138.249', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/99.0.4844.51 Safari/537.36', 23, '2022-03-13 23:07:05', '2022-03-13 23:07:05'),
(70, 'User Logout', 'https://dict-mc3.online/2021/aem/public/logout', 'GET', '202.90.138.249', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/99.0.4844.51 Safari/537.36', 1, '2022-03-13 23:07:18', '2022-03-13 23:07:18'),
(71, 'User Login', 'https://dict-mc3.online/2021/aem/public/login', 'POST', '202.90.138.249', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/99.0.4844.51 Safari/537.36', 2, '2022-03-13 23:07:27', '2022-03-13 23:07:27'),
(72, 'Accessed Permission Index', 'https://dict-mc3.online/2021/aem/public/admin/permissions', 'GET', '202.90.138.249', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/99.0.4844.51 Safari/537.36', 2, '2022-03-13 23:08:02', '2022-03-13 23:08:02'),
(73, 'Accessed Permission Index', 'https://dict-mc3.online/2021/aem/public/admin/permissions', 'GET', '202.90.138.249', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/99.0.4844.51 Safari/537.36', 2, '2022-03-13 23:08:34', '2022-03-13 23:08:34'),
(74, 'User Logout', 'https://dict-mc3.online/2021/aem/public/logout', 'GET', '202.90.138.249', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/99.0.4844.51 Safari/537.36', 1, '2022-03-13 23:08:40', '2022-03-13 23:08:40'),
(75, 'User Login', 'https://dict-mc3.online/2021/aem/public/login', 'POST', '202.90.138.249', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/99.0.4844.51 Safari/537.36', 23, '2022-03-13 23:09:01', '2022-03-13 23:09:01'),
(76, 'User Login', 'https://dict-mc3.online/2021/aem/public/login', 'POST', '175.176.91.252', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/99.0.4844.51 Safari/537.36', 9, '2022-03-14 01:15:24', '2022-03-14 01:15:24'),
(77, 'User Login', 'https://dict-mc3.online/2021/aem/public/login', 'POST', '202.90.138.249', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/99.0.4844.51 Safari/537.36', 1, '2022-03-14 01:28:38', '2022-03-14 01:28:38'),
(78, 'User Login', 'https://dict-mc3.online/2021/aem/public/login', 'POST', '202.90.138.249', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/99.0.4844.51 Safari/537.36', 4, '2022-03-14 17:00:06', '2022-03-14 17:00:06'),
(79, 'User Login', 'https://dict-mc3.online/2021/aem/public/login', 'POST', '58.69.221.56', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/99.0.4844.51 Safari/537.36', 4, '2022-03-15 00:21:32', '2022-03-15 00:21:32'),
(80, 'User Login', 'https://dict-mc3.online/2021/aem/public/login', 'POST', '58.69.221.56', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/99.0.4844.51 Safari/537.36', 5, '2022-03-15 00:33:16', '2022-03-15 00:33:16'),
(81, 'User Login', 'https://dict-mc3.online/2021/aem/public/login', 'POST', '49.146.43.33', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/99.0.4844.51 Safari/537.36', 2, '2022-03-15 01:27:24', '2022-03-15 01:27:24'),
(82, 'User Logout', 'https://dict-mc3.online/2021/aem/public/logout', 'GET', '49.146.43.33', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/99.0.4844.51 Safari/537.36', 1, '2022-03-15 02:40:14', '2022-03-15 02:40:14'),
(83, 'User Login', 'https://dict-mc3.online/2021/aem/login', 'POST', '49.146.43.33', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/99.0.4844.51 Safari/537.36', 2, '2022-03-15 03:24:05', '2022-03-15 03:24:05'),
(84, 'User Logout', 'https://dict-mc3.online/2021/aem/logout', 'GET', '49.146.43.33', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/99.0.4844.51 Safari/537.36', 1, '2022-03-15 03:24:12', '2022-03-15 03:24:12'),
(85, 'User Login', 'https://dict-mc3.online/2021/aem/login', 'POST', '49.146.43.33', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/99.0.4844.51 Safari/537.36', 23, '2022-03-15 09:27:05', '2022-03-15 09:27:05'),
(86, 'User Logout', 'https://dict-mc3.online/2021/aem/logout', 'GET', '49.146.43.33', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/99.0.4844.51 Safari/537.36', 1, '2022-03-15 09:28:15', '2022-03-15 09:28:15'),
(87, 'User Login', 'https://dict-mc3.online/2021/aem/login', 'POST', '49.146.43.33', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/99.0.4844.51 Safari/537.36', 2, '2022-03-15 09:28:30', '2022-03-15 09:28:30'),
(88, 'Accessed Permission Index', 'https://dict-mc3.online/2021/aem/admin/permissions', 'GET', '49.146.43.33', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/99.0.4844.51 Safari/537.36', 2, '2022-03-15 09:50:17', '2022-03-15 09:50:17'),
(89, 'User Logout', 'https://dict-mc3.online/2021/aem/logout', 'GET', '49.146.43.33', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/99.0.4844.51 Safari/537.36', 1, '2022-03-15 09:50:42', '2022-03-15 09:50:42'),
(90, 'User Login', 'https://dict-mc3.online/2021/aem/public/login', 'POST', '58.69.221.56', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/99.0.4844.51 Safari/537.36', 1, '2022-03-15 16:39:34', '2022-03-15 16:39:34'),
(91, 'User Login', 'https://dict-mc3.online/2021/aem/login', 'POST', '58.69.221.56', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/99.0.4844.51 Safari/537.36', 2, '2022-03-15 16:51:25', '2022-03-15 16:51:25'),
(92, 'User Logout', 'https://dict-mc3.online/2021/aem/logout', 'GET', '58.69.221.56', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/99.0.4844.51 Safari/537.36', 1, '2022-03-15 16:51:43', '2022-03-15 16:51:43'),
(93, 'User Login', 'https://dict-mc3.online/2021/aem/login', 'POST', '58.69.221.56', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/99.0.4844.51 Safari/537.36', 23, '2022-03-15 16:51:55', '2022-03-15 16:51:55'),
(94, 'User Logout', 'https://dict-mc3.online/2021/aem/logout', 'GET', '58.69.221.56', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/99.0.4844.51 Safari/537.36', 1, '2022-03-15 16:58:03', '2022-03-15 16:58:03'),
(95, 'User Login', 'https://dict-mc3.online/2021/aem/login', 'POST', '58.69.221.56', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/99.0.4844.51 Safari/537.36', 2, '2022-03-15 16:58:15', '2022-03-15 16:58:15'),
(96, 'User Login', 'https://dict-mc3.online/2021/aem/public/login', 'POST', '58.69.221.56', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/99.0.4844.51 Safari/537.36', 4, '2022-03-15 18:38:37', '2022-03-15 18:38:37'),
(97, 'User Login', 'https://dict-mc3.online/2021/aem/public/login', 'POST', '175.176.91.228', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/99.0.4844.51 Safari/537.36', 9, '2022-03-15 18:38:47', '2022-03-15 18:38:47'),
(98, 'User Login', 'https://dict-mc3.online/2021/aem/public/login', 'POST', '58.69.221.56', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/99.0.4844.51 Safari/537.36', 1, '2022-03-15 22:32:22', '2022-03-15 22:32:22'),
(99, 'User Login', 'https://dict-mc3.online/2021/aem/public/login', 'POST', '58.69.221.56', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/99.0.4844.51 Safari/537.36', 2, '2022-03-16 00:45:43', '2022-03-16 00:45:43'),
(100, 'Accessed Permission Index', 'https://dict-mc3.online/2021/aem/public/admin/permissions', 'GET', '58.69.221.56', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/99.0.4844.51 Safari/537.36', 2, '2022-03-16 00:45:53', '2022-03-16 00:45:53'),
(101, 'Accessed Permission Create', 'https://dict-mc3.online/2021/aem/public/admin/permissions/create', 'GET', '58.69.221.56', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/99.0.4844.51 Safari/537.36', 2, '2022-03-16 00:45:59', '2022-03-16 00:45:59'),
(102, 'Just Created new Permission', 'https://dict-mc3.online/2021/aem/public/admin/permissions', 'POST', '58.69.221.56', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/99.0.4844.51 Safari/537.36', 2, '2022-03-16 00:46:19', '2022-03-16 00:46:19'),
(103, 'Accessed Permission Index', 'https://dict-mc3.online/2021/aem/public/admin/permissions', 'GET', '58.69.221.56', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/99.0.4844.51 Safari/537.36', 2, '2022-03-16 00:46:19', '2022-03-16 00:46:19'),
(104, 'Accessed Permission Index', 'https://dict-mc3.online/2021/aem/public/admin/permissions?page=2', 'GET', '58.69.221.56', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/99.0.4844.51 Safari/537.36', 2, '2022-03-16 00:46:22', '2022-03-16 00:46:22'),
(105, 'Accessed Permission Index', 'https://dict-mc3.online/2021/aem/public/admin/permissions?page=3', 'GET', '58.69.221.56', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/99.0.4844.51 Safari/537.36', 2, '2022-03-16 00:46:24', '2022-03-16 00:46:24'),
(106, 'Accessed Permission Index', 'https://dict-mc3.online/2021/aem/public/admin/permissions?page=4', 'GET', '58.69.221.56', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/99.0.4844.51 Safari/537.36', 2, '2022-03-16 00:46:25', '2022-03-16 00:46:25'),
(107, 'Accessed Permission Index', 'https://dict-mc3.online/2021/aem/public/admin/permissions?page=5', 'GET', '58.69.221.56', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/99.0.4844.51 Safari/537.36', 2, '2022-03-16 00:46:26', '2022-03-16 00:46:26'),
(108, 'User Logout', 'https://dict-mc3.online/2021/aem/public/logout', 'GET', '58.69.221.56', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/99.0.4844.51 Safari/537.36', 1, '2022-03-16 00:50:25', '2022-03-16 00:50:25'),
(109, 'User Login', 'https://dict-mc3.online/2021/aem/public/login', 'POST', '175.176.91.228', 'Mozilla/5.0 (Linux; Android 10; Mi 9T) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/83.0.4103.101 Mobile Safari/537.36', 9, '2022-03-16 16:29:55', '2022-03-16 16:29:55'),
(110, 'User Login', 'https://dict-mc3.online/2021/aem/public/login', 'POST', '58.69.221.56', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/99.0.4844.51 Safari/537.36', 1, '2022-03-16 17:14:47', '2022-03-16 17:14:47'),
(111, 'User Login', 'https://dict-mc3.online/2021/aem/public/login', 'POST', '175.176.91.228', 'Mozilla/5.0 (Linux; Android 10; Mi 9T) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/83.0.4103.101 Mobile Safari/537.36', 9, '2022-03-16 19:20:21', '2022-03-16 19:20:21'),
(112, 'User Login', 'https://dict-mc3.online/2021/aem/login', 'POST', '58.69.221.56', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/99.0.4844.51 Safari/537.36', 23, '2022-03-16 20:58:32', '2022-03-16 20:58:32'),
(113, 'User Logout', 'https://dict-mc3.online/2021/aem/logout', 'GET', '58.69.221.56', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/99.0.4844.51 Safari/537.36', 1, '2022-03-16 21:00:22', '2022-03-16 21:00:22'),
(114, 'User Login', 'https://dict-mc3.online/2021/aem/login', 'POST', '58.69.221.56', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/99.0.4844.51 Safari/537.36', 2, '2022-03-16 21:00:32', '2022-03-16 21:00:32'),
(115, 'User Logout', 'https://dict-mc3.online/2021/aem/logout', 'GET', '58.69.221.56', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/99.0.4844.51 Safari/537.36', 1, '2022-03-16 21:01:27', '2022-03-16 21:01:27'),
(116, 'User Login', 'https://dict-mc3.online/2021/aem/login', 'POST', '58.69.221.56', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/99.0.4844.51 Safari/537.36', 1, '2022-03-16 21:01:41', '2022-03-16 21:01:41'),
(117, 'Accessed Permission Index', 'https://dict-mc3.online/2021/aem/admin/permissions', 'GET', '58.69.221.56', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/99.0.4844.51 Safari/537.36', 1, '2022-03-16 21:06:14', '2022-03-16 21:06:14'),
(118, 'User Logout', 'https://dict-mc3.online/2021/aem/logout', 'GET', '58.69.221.56', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/99.0.4844.51 Safari/537.36', 1, '2022-03-16 21:07:12', '2022-03-16 21:07:12'),
(119, 'User Login', 'https://dict-mc3.online/2021/aem/login', 'POST', '58.69.221.56', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/99.0.4844.51 Safari/537.36', 23, '2022-03-16 21:07:21', '2022-03-16 21:07:21'),
(120, 'User Logout', 'https://dict-mc3.online/2021/aem/logout', 'GET', '58.69.221.56', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/99.0.4844.51 Safari/537.36', 1, '2022-03-16 21:15:09', '2022-03-16 21:15:09'),
(121, 'User Login', 'https://dict-mc3.online/2021/aem/login', 'POST', '58.69.221.56', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/99.0.4844.51 Safari/537.36', 2, '2022-03-16 21:15:23', '2022-03-16 21:15:23'),
(122, 'Accessed Permission Index', 'https://dict-mc3.online/2021/aem/admin/permissions', 'GET', '58.69.221.56', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/99.0.4844.51 Safari/537.36', 2, '2022-03-16 21:15:28', '2022-03-16 21:15:28'),
(123, 'Accessed Permission Index', 'https://dict-mc3.online/2021/aem/admin/permissions?page=2', 'GET', '58.69.221.56', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/99.0.4844.51 Safari/537.36', 2, '2022-03-16 21:15:31', '2022-03-16 21:15:31'),
(124, 'Accessed Permission Index', 'https://dict-mc3.online/2021/aem/admin/permissions?page=3', 'GET', '58.69.221.56', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/99.0.4844.51 Safari/537.36', 2, '2022-03-16 21:15:33', '2022-03-16 21:15:33'),
(125, 'Accessed Permission Index', 'https://dict-mc3.online/2021/aem/admin/permissions?page=4', 'GET', '58.69.221.56', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/99.0.4844.51 Safari/537.36', 2, '2022-03-16 21:15:33', '2022-03-16 21:15:33'),
(126, 'Accessed Permission Index', 'https://dict-mc3.online/2021/aem/admin/permissions?page=5', 'GET', '58.69.221.56', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/99.0.4844.51 Safari/537.36', 2, '2022-03-16 21:15:35', '2022-03-16 21:15:35'),
(127, 'Accessed Permission Create', 'https://dict-mc3.online/2021/aem/admin/permissions/create', 'GET', '58.69.221.56', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/99.0.4844.51 Safari/537.36', 2, '2022-03-16 21:15:42', '2022-03-16 21:15:42'),
(128, 'Just Created new Permission', 'https://dict-mc3.online/2021/aem/admin/permissions', 'POST', '58.69.221.56', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/99.0.4844.51 Safari/537.36', 2, '2022-03-16 21:15:45', '2022-03-16 21:15:45'),
(129, 'Accessed Permission Index', 'https://dict-mc3.online/2021/aem/admin/permissions', 'GET', '58.69.221.56', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/99.0.4844.51 Safari/537.36', 2, '2022-03-16 21:15:45', '2022-03-16 21:15:45'),
(130, 'Accessed Permission Create', 'https://dict-mc3.online/2021/aem/admin/permissions/create', 'GET', '58.69.221.56', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/99.0.4844.51 Safari/537.36', 2, '2022-03-16 21:15:50', '2022-03-16 21:15:50'),
(131, 'Just Created new Permission', 'https://dict-mc3.online/2021/aem/admin/permissions', 'POST', '58.69.221.56', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/99.0.4844.51 Safari/537.36', 2, '2022-03-16 21:15:53', '2022-03-16 21:15:53'),
(132, 'Accessed Permission Index', 'https://dict-mc3.online/2021/aem/admin/permissions', 'GET', '58.69.221.56', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/99.0.4844.51 Safari/537.36', 2, '2022-03-16 21:15:53', '2022-03-16 21:15:53'),
(133, 'Accessed Permission Create', 'https://dict-mc3.online/2021/aem/admin/permissions/create', 'GET', '58.69.221.56', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/99.0.4844.51 Safari/537.36', 2, '2022-03-16 21:15:57', '2022-03-16 21:15:57'),
(134, 'Just Created new Permission', 'https://dict-mc3.online/2021/aem/admin/permissions', 'POST', '58.69.221.56', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/99.0.4844.51 Safari/537.36', 2, '2022-03-16 21:16:02', '2022-03-16 21:16:02'),
(135, 'Accessed Permission Index', 'https://dict-mc3.online/2021/aem/admin/permissions', 'GET', '58.69.221.56', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/99.0.4844.51 Safari/537.36', 2, '2022-03-16 21:16:03', '2022-03-16 21:16:03'),
(136, 'Accessed Permission Index', 'https://dict-mc3.online/2021/aem/admin/permissions?page=2', 'GET', '58.69.221.56', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/99.0.4844.51 Safari/537.36', 2, '2022-03-16 21:16:10', '2022-03-16 21:16:10'),
(137, 'Accessed Permission Index', 'https://dict-mc3.online/2021/aem/admin/permissions?page=3', 'GET', '58.69.221.56', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/99.0.4844.51 Safari/537.36', 2, '2022-03-16 21:16:12', '2022-03-16 21:16:12'),
(138, 'Accessed Permission Index', 'https://dict-mc3.online/2021/aem/admin/permissions?page=4', 'GET', '58.69.221.56', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/99.0.4844.51 Safari/537.36', 2, '2022-03-16 21:16:13', '2022-03-16 21:16:13'),
(139, 'Accessed Permission Index', 'https://dict-mc3.online/2021/aem/admin/permissions?page=5', 'GET', '58.69.221.56', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/99.0.4844.51 Safari/537.36', 2, '2022-03-16 21:16:14', '2022-03-16 21:16:14'),
(140, 'Accessed Permission Index', 'https://dict-mc3.online/2021/aem/admin/permissions?page=6', 'GET', '58.69.221.56', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/99.0.4844.51 Safari/537.36', 2, '2022-03-16 21:16:16', '2022-03-16 21:16:16'),
(141, 'Accessed Permission Index', 'https://dict-mc3.online/2021/aem/admin/permissions?page=6', 'GET', '58.69.221.56', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/99.0.4844.51 Safari/537.36', 2, '2022-03-16 21:16:23', '2022-03-16 21:16:23'),
(142, 'User Logout', 'https://dict-mc3.online/2021/aem/logout', 'GET', '58.69.221.56', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/99.0.4844.51 Safari/537.36', 1, '2022-03-16 21:16:54', '2022-03-16 21:16:54'),
(143, 'User Login', 'https://dict-mc3.online/2021/aem/login', 'POST', '58.69.221.56', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/99.0.4844.51 Safari/537.36', 1, '2022-03-16 21:17:03', '2022-03-16 21:17:03'),
(144, 'User Logout', 'https://dict-mc3.online/2021/aem/logout', 'GET', '58.69.221.56', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/99.0.4844.51 Safari/537.36', 1, '2022-03-16 21:30:11', '2022-03-16 21:30:11'),
(145, 'User Login', 'https://dict-mc3.online/2021/aem/login', 'POST', '58.69.221.56', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/99.0.4844.51 Safari/537.36', 5, '2022-03-16 21:30:18', '2022-03-16 21:30:18'),
(146, 'User Login', 'https://dict-mc3.online/2021/aem/public/login', 'POST', '58.69.221.56', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/99.0.4844.51 Safari/537.36', 4, '2022-03-16 21:31:25', '2022-03-16 21:31:25'),
(147, 'User Logout', 'https://dict-mc3.online/2021/aem/logout', 'GET', '58.69.221.56', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/99.0.4844.51 Safari/537.36', 1, '2022-03-16 21:31:27', '2022-03-16 21:31:27'),
(148, 'User Login', 'https://dict-mc3.online/2021/aem/public/login', 'POST', '58.69.221.56', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/99.0.4844.51 Safari/537.36', 1, '2022-03-16 21:36:46', '2022-03-16 21:36:46'),
(149, 'User Login', 'https://dict-mc3.online/2021/aem/public/login', 'POST', '58.69.221.56', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/99.0.4844.74 Safari/537.36', 5, '2022-03-16 21:59:27', '2022-03-16 21:59:27'),
(150, 'User Login', 'https://dict-mc3.online/2021/aem/login', 'POST', '58.69.221.56', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/99.0.4844.51 Safari/537.36', 2, '2022-03-16 22:40:40', '2022-03-16 22:40:40'),
(151, 'User Logout', 'https://dict-mc3.online/2021/aem/logout', 'GET', '58.69.221.56', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/99.0.4844.51 Safari/537.36', 1, '2022-03-16 22:41:40', '2022-03-16 22:41:40'),
(152, 'User Login', 'https://dict-mc3.online/2021/aem/login', 'POST', '58.69.221.56', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/99.0.4844.51 Safari/537.36', 23, '2022-03-16 22:41:47', '2022-03-16 22:41:47'),
(153, 'User Logout', 'https://dict-mc3.online/2021/aem/logout', 'GET', '202.90.138.249', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/99.0.4844.51 Safari/537.36', 1, '2022-03-17 00:59:26', '2022-03-17 00:59:26'),
(154, 'User Login', 'https://dict-mc3.online/2021/aem/login', 'POST', '202.90.138.249', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/99.0.4844.51 Safari/537.36', 23, '2022-03-17 01:02:50', '2022-03-17 01:02:50'),
(155, 'User Login', 'https://dict-mc3.online/2021/aem/login', 'POST', '202.90.138.249', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/99.0.4844.51 Safari/537.36', 2, '2022-03-17 16:42:22', '2022-03-17 16:42:22'),
(156, 'User Login', 'https://dict-mc3.online/2021/aem/public/login', 'POST', '202.90.138.249', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/99.0.4844.74 Safari/537.36', 1, '2022-03-17 16:54:15', '2022-03-17 16:54:15'),
(157, 'User Logout', 'https://dict-mc3.online/2021/aem/public/logout', 'GET', '202.90.138.249', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/99.0.4844.74 Safari/537.36', 1, '2022-03-17 16:54:55', '2022-03-17 16:54:55'),
(158, 'User Login', 'https://dict-mc3.online/2021/aem/public/login', 'POST', '202.90.138.249', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/99.0.4844.74 Safari/537.36', 1, '2022-03-17 16:54:59', '2022-03-17 16:54:59'),
(159, 'User Logout', 'https://dict-mc3.online/2021/aem/public/logout', 'GET', '202.90.138.249', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/99.0.4844.74 Safari/537.36', 1, '2022-03-17 16:57:56', '2022-03-17 16:57:56'),
(160, 'User Login', 'https://dict-mc3.online/2021/aem/public/login', 'POST', '202.90.138.249', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/99.0.4844.74 Safari/537.36', 1, '2022-03-17 16:58:19', '2022-03-17 16:58:19'),
(161, 'User Logout', 'https://dict-mc3.online/2021/aem/public/logout', 'GET', '202.90.138.249', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/99.0.4844.74 Safari/537.36', 1, '2022-03-17 16:58:59', '2022-03-17 16:58:59'),
(162, 'User Login', 'https://dict-mc3.online/2021/aem/public/login', 'POST', '202.90.138.249', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/99.0.4844.74 Safari/537.36', 1, '2022-03-17 16:59:01', '2022-03-17 16:59:01'),
(163, 'User Logout', 'https://dict-mc3.online/2021/aem/logout', 'GET', '202.90.138.249', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/99.0.4844.51 Safari/537.36', 1, '2022-03-17 17:32:57', '2022-03-17 17:32:57'),
(164, 'User Login', 'https://dict-mc3.online/2021/aem/login', 'POST', '202.90.138.249', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/99.0.4844.51 Safari/537.36', 23, '2022-03-17 17:50:26', '2022-03-17 17:50:26'),
(165, 'User Login', 'https://dict-mc3.online/2021/aem/public/login', 'POST', '202.90.138.249', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/99.0.4844.74 Safari/537.36', 5, '2022-03-17 18:37:15', '2022-03-17 18:37:15'),
(166, 'User Login', 'https://dict-mc3.online/2021/aem/login', 'POST', '202.90.138.249', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/99.0.4844.51 Safari/537.36', 23, '2022-03-17 21:34:03', '2022-03-17 21:34:03'),
(167, 'User Login', 'https://dict-mc3.online/2021/aem/login', 'POST', '202.90.138.249', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/99.0.4844.74 Safari/537.36', 23, '2022-03-18 00:10:11', '2022-03-18 00:10:11'),
(168, 'User Logout', 'https://dict-mc3.online/2021/aem/logout', 'GET', '202.90.138.249', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/99.0.4844.74 Safari/537.36', 1, '2022-03-18 00:30:47', '2022-03-18 00:30:47'),
(169, 'User Login', 'https://dict-mc3.online/2021/aem/login', 'POST', '202.90.138.249', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/99.0.4844.74 Safari/537.36', 2, '2022-03-18 00:31:16', '2022-03-18 00:31:16'),
(170, 'User Login', 'https://dict-mc3.online/2021/aem/public/login', 'POST', '202.90.138.249', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/99.0.4844.74 Safari/537.36', 5, '2022-03-18 00:33:02', '2022-03-18 00:33:02'),
(171, 'User Logout', 'https://dict-mc3.online/2021/aem/logout', 'GET', '202.90.138.249', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/99.0.4844.74 Safari/537.36', 1, '2022-03-18 00:42:43', '2022-03-18 00:42:43'),
(172, 'User Login', 'https://dict-mc3.online/2021/aem/login', 'POST', '202.90.138.249', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/99.0.4844.74 Safari/537.36', 23, '2022-03-18 00:42:49', '2022-03-18 00:42:49'),
(173, 'User Logout', 'https://dict-mc3.online/2021/aem/logout', 'GET', '202.90.138.249', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/99.0.4844.74 Safari/537.36', 1, '2022-03-18 00:43:14', '2022-03-18 00:43:14'),
(174, 'User Login', 'https://dict-mc3.online/2021/aem/public/login', 'POST', '49.146.41.67', 'Mozilla/5.0 (Macintosh; Intel Mac OS X 10_15_7) AppleWebKit/605.1.15 (KHTML, like Gecko) Version/15.3 Safari/605.1.15', 1, '2022-03-18 16:00:25', '2022-03-18 16:00:25'),
(175, 'User Login', 'https://dict-mc3.online/2021/aem/public/login', 'POST', '202.90.138.249', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/99.0.4844.74 Safari/537.36', 4, '2022-03-20 16:33:23', '2022-03-20 16:33:23'),
(176, 'User Login', 'https://dict-mc3.online/2021/aem/public/login', 'POST', '202.90.138.249', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/99.0.4844.74 Safari/537.36', 5, '2022-03-20 16:44:12', '2022-03-20 16:44:12'),
(177, 'User Login', 'https://dict-mc3.online/2021/aem/login', 'POST', '202.90.138.249', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/99.0.4844.74 Safari/537.36', 2, '2022-03-20 17:53:35', '2022-03-20 17:53:35'),
(178, 'Accessed Permission Index', 'https://dict-mc3.online/2021/aem/admin/permissions', 'GET', '202.90.138.249', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/99.0.4844.74 Safari/537.36', 2, '2022-03-20 17:53:47', '2022-03-20 17:53:47'),
(179, 'Accessed Permission Index', 'https://dict-mc3.online/2021/aem/admin/permissions', 'GET', '202.90.138.249', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/99.0.4844.74 Safari/537.36', 2, '2022-03-20 17:54:13', '2022-03-20 17:54:13'),
(180, 'Accessed Permission Index', 'https://dict-mc3.online/2021/aem/admin/permissions', 'GET', '202.90.138.249', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/99.0.4844.74 Safari/537.36', 2, '2022-03-20 17:56:36', '2022-03-20 17:56:36'),
(181, 'Accessed Permission Index', 'https://dict-mc3.online/2021/aem/admin/permissions?page=2', 'GET', '202.90.138.249', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/99.0.4844.74 Safari/537.36', 2, '2022-03-20 17:56:38', '2022-03-20 17:56:38'),
(182, 'Accessed Permission Index', 'https://dict-mc3.online/2021/aem/admin/permissions?page=3', 'GET', '202.90.138.249', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/99.0.4844.74 Safari/537.36', 2, '2022-03-20 17:56:40', '2022-03-20 17:56:40'),
(183, 'Accessed Permission Index', 'https://dict-mc3.online/2021/aem/admin/permissions?page=4', 'GET', '202.90.138.249', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/99.0.4844.74 Safari/537.36', 2, '2022-03-20 17:56:42', '2022-03-20 17:56:42'),
(184, 'Accessed Permission Index', 'https://dict-mc3.online/2021/aem/admin/permissions?page=5', 'GET', '202.90.138.249', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/99.0.4844.74 Safari/537.36', 2, '2022-03-20 17:56:44', '2022-03-20 17:56:44'),
(185, 'Accessed Permission Index', 'https://dict-mc3.online/2021/aem/admin/permissions', 'GET', '202.90.138.249', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/99.0.4844.74 Safari/537.36', 2, '2022-03-20 17:57:02', '2022-03-20 17:57:02'),
(186, 'Accessed Permission Create', 'https://dict-mc3.online/2021/aem/admin/permissions/create', 'GET', '202.90.138.249', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/99.0.4844.74 Safari/537.36', 2, '2022-03-20 17:57:03', '2022-03-20 17:57:03'),
(187, 'Just Created new Permission', 'https://dict-mc3.online/2021/aem/admin/permissions', 'POST', '202.90.138.249', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/99.0.4844.74 Safari/537.36', 2, '2022-03-20 17:57:09', '2022-03-20 17:57:09');
INSERT INTO `log_activities` (`id`, `subject`, `url`, `method`, `ip`, `agent`, `user_id`, `created_at`, `updated_at`) VALUES
(188, 'Accessed Permission Index', 'https://dict-mc3.online/2021/aem/admin/permissions', 'GET', '202.90.138.249', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/99.0.4844.74 Safari/537.36', 2, '2022-03-20 17:57:09', '2022-03-20 17:57:09'),
(189, 'User Logout', 'https://dict-mc3.online/2021/aem/logout', 'GET', '202.90.138.249', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/99.0.4844.74 Safari/537.36', 1, '2022-03-20 17:59:01', '2022-03-20 17:59:01'),
(190, 'User Login', 'https://dict-mc3.online/2021/aem/login', 'POST', '202.90.138.249', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/99.0.4844.74 Safari/537.36', 23, '2022-03-20 18:40:13', '2022-03-20 18:40:13'),
(191, 'User Logout', 'https://dict-mc3.online/2021/aem/logout', 'GET', '202.90.138.249', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/99.0.4844.74 Safari/537.36', 1, '2022-03-20 18:41:00', '2022-03-20 18:41:00'),
(192, 'User Login', 'https://dict-mc3.online/2021/aem/login', 'POST', '202.90.138.249', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/99.0.4844.74 Safari/537.36', 2, '2022-03-20 18:41:15', '2022-03-20 18:41:15'),
(193, 'User Logout', 'https://dict-mc3.online/2021/aem/logout', 'GET', '202.90.138.249', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/99.0.4844.74 Safari/537.36', 1, '2022-03-20 18:41:43', '2022-03-20 18:41:43'),
(194, 'User Login', 'https://dict-mc3.online/2021/aem/login', 'POST', '202.90.138.249', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/99.0.4844.74 Safari/537.36', 23, '2022-03-20 18:41:50', '2022-03-20 18:41:50'),
(195, 'User Logout', 'https://dict-mc3.online/2021/aem/logout', 'GET', '202.90.138.249', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/99.0.4844.74 Safari/537.36', 1, '2022-03-20 18:43:29', '2022-03-20 18:43:29'),
(196, 'User Login', 'https://dict-mc3.online/2021/aem/login', 'POST', '202.90.138.249', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/99.0.4844.74 Safari/537.36', 2, '2022-03-20 18:43:41', '2022-03-20 18:43:41'),
(197, 'User Logout', 'https://dict-mc3.online/2021/aem/logout', 'GET', '202.90.138.249', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/99.0.4844.74 Safari/537.36', 1, '2022-03-20 18:44:51', '2022-03-20 18:44:51'),
(198, 'User Login', 'https://dict-mc3.online/2021/aem/login', 'POST', '202.90.138.249', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/99.0.4844.74 Safari/537.36', 23, '2022-03-20 18:45:03', '2022-03-20 18:45:03'),
(199, 'User Logout', 'https://dict-mc3.online/2021/aem/logout', 'GET', '202.90.138.249', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/99.0.4844.74 Safari/537.36', 1, '2022-03-20 18:45:24', '2022-03-20 18:45:24'),
(200, 'User Login', 'https://dict-mc3.online/2021/aem/login', 'POST', '202.90.138.249', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/99.0.4844.74 Safari/537.36', 2, '2022-03-20 18:45:31', '2022-03-20 18:45:31'),
(201, 'User Logout', 'https://dict-mc3.online/2021/aem/logout', 'GET', '202.90.138.249', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/99.0.4844.74 Safari/537.36', 1, '2022-03-20 18:46:07', '2022-03-20 18:46:07'),
(202, 'User Login', 'https://dict-mc3.online/2021/aem/login', 'POST', '202.90.138.249', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/99.0.4844.74 Safari/537.36', 23, '2022-03-20 18:46:14', '2022-03-20 18:46:14'),
(203, 'User Logout', 'https://dict-mc3.online/2021/aem/logout', 'GET', '202.90.138.249', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/99.0.4844.74 Safari/537.36', 1, '2022-03-20 18:47:49', '2022-03-20 18:47:49'),
(204, 'User Login', 'https://dict-mc3.online/2021/aem/login', 'POST', '202.90.138.249', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/99.0.4844.74 Safari/537.36', 2, '2022-03-20 18:48:02', '2022-03-20 18:48:02'),
(205, 'User Logout', 'https://dict-mc3.online/2021/aem/logout', 'GET', '202.90.138.249', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/99.0.4844.74 Safari/537.36', 1, '2022-03-20 18:49:49', '2022-03-20 18:49:49'),
(206, 'User Login', 'https://dict-mc3.online/2021/aem/login', 'POST', '202.90.138.249', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/99.0.4844.74 Safari/537.36', 23, '2022-03-20 18:50:07', '2022-03-20 18:50:07'),
(207, 'User Login', 'https://dict-mc3.online/2021/aem/public/login', 'POST', '175.176.82.97', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/99.0.4844.74 Safari/537.36', 9, '2022-03-20 19:01:16', '2022-03-20 19:01:16'),
(208, 'User Login', 'https://dict-mc3.online/2021/aem/public/login', 'POST', '202.90.138.249', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/99.0.4844.74 Safari/537.36', 2, '2022-03-20 20:54:48', '2022-03-20 20:54:48'),
(209, 'Accessed Permission Index', 'https://dict-mc3.online/2021/aem/public/admin/permissions', 'GET', '202.90.138.249', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/99.0.4844.74 Safari/537.36', 2, '2022-03-20 20:54:57', '2022-03-20 20:54:57'),
(210, 'Accessed Permission Index', 'https://dict-mc3.online/2021/aem/public/admin/permissions?page=2', 'GET', '202.90.138.249', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/99.0.4844.74 Safari/537.36', 2, '2022-03-20 20:54:59', '2022-03-20 20:54:59'),
(211, 'Accessed Permission Index', 'https://dict-mc3.online/2021/aem/public/admin/permissions?page=3', 'GET', '202.90.138.249', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/99.0.4844.74 Safari/537.36', 2, '2022-03-20 20:55:00', '2022-03-20 20:55:00'),
(212, 'Accessed Permission Index', 'https://dict-mc3.online/2021/aem/public/admin/permissions?page=4', 'GET', '202.90.138.249', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/99.0.4844.74 Safari/537.36', 2, '2022-03-20 20:55:01', '2022-03-20 20:55:01'),
(213, 'Accessed Permission Create', 'https://dict-mc3.online/2021/aem/public/admin/permissions/create', 'GET', '202.90.138.249', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/99.0.4844.74 Safari/537.36', 2, '2022-03-20 20:55:09', '2022-03-20 20:55:09'),
(214, 'Just Created new Permission', 'https://dict-mc3.online/2021/aem/public/admin/permissions', 'POST', '202.90.138.249', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/99.0.4844.74 Safari/537.36', 2, '2022-03-20 20:55:11', '2022-03-20 20:55:11'),
(215, 'Accessed Permission Index', 'https://dict-mc3.online/2021/aem/public/admin/permissions', 'GET', '202.90.138.249', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/99.0.4844.74 Safari/537.36', 2, '2022-03-20 20:55:11', '2022-03-20 20:55:11'),
(216, 'Accessed Permission Index', 'https://dict-mc3.online/2021/aem/public/admin/permissions?page=2', 'GET', '202.90.138.249', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/99.0.4844.74 Safari/537.36', 2, '2022-03-20 20:55:14', '2022-03-20 20:55:14'),
(217, 'Accessed Permission Index', 'https://dict-mc3.online/2021/aem/public/admin/permissions?page=1', 'GET', '202.90.138.249', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/99.0.4844.74 Safari/537.36', 2, '2022-03-20 20:55:16', '2022-03-20 20:55:16'),
(218, 'Accessed Permission Index', 'https://dict-mc3.online/2021/aem/public/admin/permissions?page=2', 'GET', '202.90.138.249', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/99.0.4844.74 Safari/537.36', 2, '2022-03-20 20:55:18', '2022-03-20 20:55:18'),
(219, 'Accessed Permission Index', 'https://dict-mc3.online/2021/aem/public/admin/permissions?page=3', 'GET', '202.90.138.249', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/99.0.4844.74 Safari/537.36', 2, '2022-03-20 20:55:20', '2022-03-20 20:55:20'),
(220, 'Accessed Permission Index', 'https://dict-mc3.online/2021/aem/public/admin/permissions?page=4', 'GET', '202.90.138.249', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/99.0.4844.74 Safari/537.36', 2, '2022-03-20 20:55:22', '2022-03-20 20:55:22'),
(221, 'Accessed Permission Index', 'https://dict-mc3.online/2021/aem/public/admin/permissions?page=5', 'GET', '202.90.138.249', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/99.0.4844.74 Safari/537.36', 2, '2022-03-20 20:55:23', '2022-03-20 20:55:23'),
(222, 'User Logout', 'https://dict-mc3.online/2021/aem/public/logout', 'GET', '202.90.138.249', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/99.0.4844.74 Safari/537.36', 1, '2022-03-20 20:55:51', '2022-03-20 20:55:51'),
(223, 'User Login', 'https://dict-mc3.online/2021/aem/public/login', 'POST', '202.90.138.249', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/99.0.4844.74 Safari/537.36', 23, '2022-03-20 20:55:57', '2022-03-20 20:55:57'),
(224, 'User Logout', 'https://dict-mc3.online/2021/aem/public/logout', 'GET', '202.90.138.249', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/99.0.4844.74 Safari/537.36', 1, '2022-03-20 21:23:36', '2022-03-20 21:23:36'),
(225, 'User Login', 'https://dict-mc3.online/2021/aem/public/login', 'POST', '202.90.138.249', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/99.0.4844.74 Safari/537.36', 2, '2022-03-20 21:23:45', '2022-03-20 21:23:45'),
(226, 'Accessed Permission Index', 'https://dict-mc3.online/2021/aem/public/admin/permissions', 'GET', '202.90.138.249', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/99.0.4844.74 Safari/537.36', 2, '2022-03-20 21:24:00', '2022-03-20 21:24:00'),
(227, 'Accessed Permission Index', 'https://dict-mc3.online/2021/aem/public/admin/permissions?page=2', 'GET', '202.90.138.249', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/99.0.4844.74 Safari/537.36', 2, '2022-03-20 21:24:02', '2022-03-20 21:24:02'),
(228, 'Accessed Permission Index', 'https://dict-mc3.online/2021/aem/public/admin/permissions?page=3', 'GET', '202.90.138.249', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/99.0.4844.74 Safari/537.36', 2, '2022-03-20 21:24:03', '2022-03-20 21:24:03'),
(229, 'Accessed Permission Index', 'https://dict-mc3.online/2021/aem/public/admin/permissions?page=4', 'GET', '202.90.138.249', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/99.0.4844.74 Safari/537.36', 2, '2022-03-20 21:24:04', '2022-03-20 21:24:04'),
(230, 'Accessed Permission Index', 'https://dict-mc3.online/2021/aem/public/admin/permissions?page=5', 'GET', '202.90.138.249', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/99.0.4844.74 Safari/537.36', 2, '2022-03-20 21:24:05', '2022-03-20 21:24:05'),
(231, 'Accessed Permission Index', 'https://dict-mc3.online/2021/aem/public/admin/permissions?page=6', 'GET', '202.90.138.249', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/99.0.4844.74 Safari/537.36', 2, '2022-03-20 21:24:06', '2022-03-20 21:24:06'),
(232, 'User Logout', 'https://dict-mc3.online/2021/aem/logout', 'GET', '202.90.138.249', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/99.0.4844.74 Safari/537.36', 1, '2022-03-20 21:43:16', '2022-03-20 21:43:16'),
(233, 'User Login', 'https://dict-mc3.online/2021/aem/login', 'POST', '202.90.138.249', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/99.0.4844.74 Safari/537.36', 20, '2022-03-20 21:43:25', '2022-03-20 21:43:25'),
(234, 'User Login', 'https://dict-mc3.online/2021/aem/public/login', 'POST', '202.90.138.249', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/99.0.4844.74 Safari/537.36', 2, '2022-03-20 21:44:09', '2022-03-20 21:44:09'),
(235, 'Accessed Permission Index', 'https://dict-mc3.online/2021/aem/admin/permissions', 'GET', '202.90.138.249', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/99.0.4844.74 Safari/537.36', 20, '2022-03-20 21:46:47', '2022-03-20 21:46:47'),
(236, 'Accessed Permission Index', 'https://dict-mc3.online/2021/aem/admin/permissions?page=2', 'GET', '202.90.138.249', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/99.0.4844.74 Safari/537.36', 20, '2022-03-20 21:46:51', '2022-03-20 21:46:51'),
(237, 'Accessed Permission Index', 'https://dict-mc3.online/2021/aem/admin/permissions?page=3', 'GET', '202.90.138.249', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/99.0.4844.74 Safari/537.36', 20, '2022-03-20 21:46:53', '2022-03-20 21:46:53'),
(238, 'Accessed Permission Index', 'https://dict-mc3.online/2021/aem/admin/permissions?page=4', 'GET', '202.90.138.249', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/99.0.4844.74 Safari/537.36', 20, '2022-03-20 21:46:55', '2022-03-20 21:46:55'),
(239, 'Accessed Permission Index', 'https://dict-mc3.online/2021/aem/admin/permissions?page=5', 'GET', '202.90.138.249', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/99.0.4844.74 Safari/537.36', 20, '2022-03-20 21:46:56', '2022-03-20 21:46:56'),
(240, 'Accessed Permission Index', 'https://dict-mc3.online/2021/aem/admin/permissions?page=6', 'GET', '202.90.138.249', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/99.0.4844.74 Safari/537.36', 20, '2022-03-20 21:46:57', '2022-03-20 21:46:57'),
(241, 'Accessed Permission Index', 'https://dict-mc3.online/2021/aem/admin/permissions?page=5', 'GET', '202.90.138.249', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/99.0.4844.74 Safari/537.36', 20, '2022-03-20 21:47:00', '2022-03-20 21:47:00'),
(242, 'User Logout', 'https://dict-mc3.online/2021/aem/logout', 'GET', '202.90.138.249', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/99.0.4844.74 Safari/537.36', 1, '2022-03-20 21:49:03', '2022-03-20 21:49:03'),
(243, 'User Login', 'https://dict-mc3.online/2021/aem/public/login', 'POST', '202.90.138.249', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/99.0.4844.74 Safari/537.36', 23, '2022-03-20 22:31:18', '2022-03-20 22:31:18'),
(244, 'User Logout', 'https://dict-mc3.online/2021/aem/public/logout', 'GET', '202.90.138.249', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/99.0.4844.74 Safari/537.36', 1, '2022-03-20 22:53:31', '2022-03-20 22:53:31'),
(245, 'User Login', 'https://dict-mc3.online/2021/aem/public/login', 'POST', '202.90.138.249', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/99.0.4844.74 Safari/537.36', 4, '2022-03-20 22:59:04', '2022-03-20 22:59:04'),
(246, 'User Login', 'https://dict-mc3.online/2021/aem/public/login', 'POST', '202.90.138.249', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/99.0.4844.83 Safari/537.36', 5, '2022-03-21 15:56:04', '2022-03-21 15:56:04'),
(247, 'User Login', 'https://dict-mc3.online/2021/aem/public/login', 'POST', '202.90.138.249', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/99.0.4844.74 Safari/537.36', 2, '2022-03-21 16:01:33', '2022-03-21 16:01:33'),
(248, 'User Logout', 'https://dict-mc3.online/2021/aem/public/logout', 'GET', '202.90.138.249', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/99.0.4844.74 Safari/537.36', 1, '2022-03-21 16:02:13', '2022-03-21 16:02:13'),
(249, 'User Login', 'https://dict-mc3.online/2021/aem/public/login', 'POST', '202.90.138.249', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/99.0.4844.74 Safari/537.36', 23, '2022-03-21 16:02:19', '2022-03-21 16:02:19'),
(250, 'User Logout', 'https://dict-mc3.online/2021/aem/public/logout', 'GET', '202.90.138.249', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/99.0.4844.74 Safari/537.36', 1, '2022-03-21 16:02:40', '2022-03-21 16:02:40'),
(251, 'User Login', 'https://dict-mc3.online/2021/aem/public/login', 'POST', '202.90.138.249', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/99.0.4844.74 Safari/537.36', 2, '2022-03-21 16:36:33', '2022-03-21 16:36:33'),
(252, 'User Logout', 'https://dict-mc3.online/2021/aem/public/logout', 'GET', '202.90.138.249', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/99.0.4844.74 Safari/537.36', 1, '2022-03-21 16:39:47', '2022-03-21 16:39:47'),
(253, 'User Login', 'https://dict-mc3.online/2021/aem/public/login', 'POST', '202.90.138.249', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/99.0.4844.74 Safari/537.36', 1, '2022-03-21 17:12:20', '2022-03-21 17:12:20'),
(254, 'User Login', 'https://dict-mc3.online/2021/aem/public/login', 'POST', '202.90.138.249', 'Mozilla/5.0 (Macintosh; Intel Mac OS X 10_15_7) AppleWebKit/605.1.15 (KHTML, like Gecko) Version/15.3 Safari/605.1.15', 1, '2022-03-21 18:53:09', '2022-03-21 18:53:09'),
(255, 'User Login', 'https://dict-mc3.online/2021/aem/public/login', 'POST', '202.90.138.249', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/99.0.4844.74 Safari/537.36', 4, '2022-03-21 22:31:36', '2022-03-21 22:31:36'),
(256, 'User Login', 'https://dict-mc3.online/2021/aem/public/login', 'POST', '202.90.138.249', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/99.0.4844.74 Safari/537.36', 1, '2022-03-21 22:52:55', '2022-03-21 22:52:55'),
(257, 'User Logout', 'https://dict-mc3.online/2021/aem/public/logout', 'GET', '202.90.138.249', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/99.0.4844.74 Safari/537.36', 1, '2022-03-21 23:20:27', '2022-03-21 23:20:27'),
(258, 'User Login', 'https://dict-mc3.online/2021/aem/public/login', 'POST', '202.90.138.249', 'Mozilla/5.0 (Linux; Android 12; SM-A426B Build/SP1A.210812.016; wv) AppleWebKit/537.36 (KHTML, like Gecko) Version/4.0 Chrome/99.0.4844.58 Mobile Safari/537.36', 1, '2022-03-21 23:21:55', '2022-03-21 23:21:55'),
(259, 'User Login', 'https://dict-mc3.online/2021/aem/login', 'POST', '49.146.46.32', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/99.0.4844.82 Safari/537.36', 2, '2022-03-22 16:23:26', '2022-03-22 16:23:26'),
(260, 'User Logout', 'https://dict-mc3.online/2021/aem/logout', 'GET', '49.146.46.32', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/99.0.4844.82 Safari/537.36', 1, '2022-03-22 16:24:52', '2022-03-22 16:24:52'),
(261, 'User Login', 'https://dict-mc3.online/2021/aem/login', 'POST', '49.146.46.32', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/99.0.4844.82 Safari/537.36', 23, '2022-03-22 16:25:02', '2022-03-22 16:25:02'),
(262, 'User Logout', 'https://dict-mc3.online/2021/aem/logout', 'GET', '49.146.46.32', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/99.0.4844.82 Safari/537.36', 1, '2022-03-22 16:25:32', '2022-03-22 16:25:32'),
(263, 'User Login', 'https://dict-mc3.online/2021/aem/login', 'POST', '49.146.46.32', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/99.0.4844.82 Safari/537.36', 2, '2022-03-22 16:25:47', '2022-03-22 16:25:47'),
(264, 'User Logout', 'https://dict-mc3.online/2021/aem/logout', 'GET', '49.146.46.32', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/99.0.4844.82 Safari/537.36', 1, '2022-03-22 16:26:58', '2022-03-22 16:26:58'),
(265, 'User Login', 'https://dict-mc3.online/2021/aem/login', 'POST', '49.146.46.32', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/99.0.4844.82 Safari/537.36', 2, '2022-03-22 16:27:32', '2022-03-22 16:27:32'),
(266, 'User Login', 'https://dict-mc3.online/2021/aem/login', 'POST', '49.146.46.32', 'Mozilla/5.0 (Linux; Android 6.0.1; SM-P355) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/99.0.4844.73 Safari/537.36', 2, '2022-03-22 16:33:06', '2022-03-22 16:33:06'),
(267, 'User Login', 'https://dict-mc3.online/2021/aem/public/login', 'POST', '202.90.138.249', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/99.0.4844.82 Safari/537.36', 2, '2022-03-23 00:14:55', '2022-03-23 00:14:55'),
(268, 'User Logout', 'https://dict-mc3.online/2021/aem/public/logout', 'GET', '202.90.138.249', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/99.0.4844.82 Safari/537.36', 1, '2022-03-23 00:21:16', '2022-03-23 00:21:16'),
(269, 'User Login', 'https://dict-mc3.online/2021/aem/public/login', 'POST', '202.90.138.249', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/99.0.4844.74 Safari/537.36', 1, '2022-03-23 01:20:17', '2022-03-23 01:20:17'),
(270, 'User Login', 'https://dict-mc3.online/2021/aem/login', 'POST', '202.90.138.249', 'Mozilla/5.0 (iPad; CPU OS 14_7 like Mac OS X) AppleWebKit/605.1.15 (KHTML, like Gecko) CriOS/99.0.4844.59 Mobile/15E148 Safari/604.1', 1, '2022-03-23 01:45:05', '2022-03-23 01:45:05'),
(271, 'User Login', 'https://dict-mc3.online/2021/aem/login', 'POST', '202.90.138.249', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/99.0.4844.82 Safari/537.36', 2, '2022-03-23 02:47:56', '2022-03-23 02:47:56'),
(272, 'User Logout', 'https://dict-mc3.online/2021/aem/logout', 'GET', '202.90.138.249', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/99.0.4844.82 Safari/537.36', 1, '2022-03-23 04:41:17', '2022-03-23 04:41:17'),
(273, 'User Login', 'https://dict-mc3.online/2021/aem/public/login', 'POST', '202.90.138.249', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/99.0.4844.82 Safari/537.36', 23, '2022-03-23 06:24:48', '2022-03-23 06:24:48'),
(274, 'User Logout', 'https://dict-mc3.online/2021/aem/public/logout', 'GET', '202.90.138.249', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/99.0.4844.82 Safari/537.36', 1, '2022-03-23 06:27:07', '2022-03-23 06:27:07'),
(275, 'User Login', 'https://dict-mc3.online/2021/aem/public/login', 'POST', '202.90.138.249', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/99.0.4844.82 Safari/537.36', 2, '2022-03-23 06:29:44', '2022-03-23 06:29:44'),
(276, 'User Login', 'https://dict-mc3.online/2021/aem/public/login', 'POST', '202.90.138.249', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/99.0.4844.83 Safari/537.36', 5, '2022-03-23 06:32:14', '2022-03-23 06:32:14'),
(277, 'User Login', 'https://dict-mc3.online/2021/aem/public/login', 'POST', '202.90.138.249', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/99.0.4844.74 Safari/537.36', 4, '2022-03-23 08:11:09', '2022-03-23 08:11:09'),
(278, 'User Login', 'https://dict-mc3.online/2021/aem/public/login', 'POST', '202.90.138.249', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/99.0.4844.83 Safari/537.36', 5, '2022-03-24 01:01:33', '2022-03-24 01:01:33'),
(279, 'User Login', 'https://dict-mc3.online/2021/aem/public/login', 'POST', '202.90.138.249', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/99.0.4844.82 Safari/537.36', 4, '2022-03-24 01:02:22', '2022-03-24 01:02:22'),
(280, 'User Login', 'https://dict-mc3.online/2021/aem/public/login', 'POST', '202.90.138.249', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/99.0.4844.82 Safari/537.36', 2, '2022-03-24 02:42:25', '2022-03-24 02:42:25'),
(281, 'User Logout', 'https://dict-mc3.online/2021/aem/public/logout', 'GET', '202.90.138.249', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/99.0.4844.82 Safari/537.36', 1, '2022-03-24 03:27:24', '2022-03-24 03:27:24'),
(282, 'User Login', 'https://dict-mc3.online/2021/aem/public/login', 'POST', '202.90.138.249', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/99.0.4844.82 Safari/537.36', 2, '2022-03-24 04:54:09', '2022-03-24 04:54:09'),
(283, 'Accessed Permission Index', 'https://dict-mc3.online/2021/aem/admin/permissions', 'GET', '202.90.138.249', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/99.0.4844.82 Safari/537.36', 2, '2022-03-24 06:02:06', '2022-03-24 06:02:06'),
(284, 'Accessed Permission Create', 'https://dict-mc3.online/2021/aem/admin/permissions/create', 'GET', '202.90.138.249', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/99.0.4844.82 Safari/537.36', 2, '2022-03-24 06:02:08', '2022-03-24 06:02:08'),
(285, 'Just Created new Permission', 'https://dict-mc3.online/2021/aem/admin/permissions', 'POST', '202.90.138.249', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/99.0.4844.82 Safari/537.36', 2, '2022-03-24 06:02:12', '2022-03-24 06:02:12'),
(286, 'Accessed Permission Index', 'https://dict-mc3.online/2021/aem/admin/permissions', 'GET', '202.90.138.249', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/99.0.4844.82 Safari/537.36', 2, '2022-03-24 06:02:13', '2022-03-24 06:02:13'),
(287, 'Accessed Permission Index', 'https://dict-mc3.online/2021/aem/admin/permissions?page=6', 'GET', '202.90.138.249', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/99.0.4844.82 Safari/537.36', 2, '2022-03-24 06:02:17', '2022-03-24 06:02:17'),
(288, 'User Logout', 'https://dict-mc3.online/2021/aem/logout', 'GET', '202.90.138.249', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/99.0.4844.82 Safari/537.36', 1, '2022-03-24 06:02:27', '2022-03-24 06:02:27'),
(289, 'User Login', 'https://dict-mc3.online/2021/aem/public/login', 'POST', '202.90.138.249', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/99.0.4844.82 Safari/537.36', 23, '2022-03-24 06:07:32', '2022-03-24 06:07:32'),
(290, 'User Logout', 'https://dict-mc3.online/2021/aem/public/logout', 'GET', '202.90.138.249', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/99.0.4844.82 Safari/537.36', 1, '2022-03-24 06:07:47', '2022-03-24 06:07:47'),
(291, 'User Login', 'https://dict-mc3.online/2021/aem/public/login', 'POST', '202.90.138.249', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/99.0.4844.82 Safari/537.36', 2, '2022-03-24 06:07:53', '2022-03-24 06:07:53'),
(292, 'Accessed Permission Index', 'https://dict-mc3.online/2021/aem/public/admin/permissions', 'GET', '202.90.138.249', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/99.0.4844.82 Safari/537.36', 2, '2022-03-24 06:08:08', '2022-03-24 06:08:08'),
(293, 'Accessed Permission Index', 'https://dict-mc3.online/2021/aem/public/admin/permissions?page=6', 'GET', '202.90.138.249', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/99.0.4844.82 Safari/537.36', 2, '2022-03-24 06:08:09', '2022-03-24 06:08:09'),
(294, 'User Logout', 'https://dict-mc3.online/2021/aem/public/logout', 'GET', '202.90.138.249', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/99.0.4844.82 Safari/537.36', 1, '2022-03-24 06:08:38', '2022-03-24 06:08:38'),
(295, 'User Login', 'https://dict-mc3.online/2021/aem/public/login', 'POST', '202.90.138.249', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/99.0.4844.82 Safari/537.36', 23, '2022-03-24 06:08:44', '2022-03-24 06:08:44'),
(296, 'User Logout', 'https://dict-mc3.online/2021/aem/public/logout', 'GET', '202.90.138.249', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/99.0.4844.82 Safari/537.36', 1, '2022-03-24 06:08:58', '2022-03-24 06:08:58'),
(297, 'User Login', 'https://dict-mc3.online/2021/aem/public/login', 'POST', '202.90.138.249', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/99.0.4844.82 Safari/537.36', 2, '2022-03-24 06:09:12', '2022-03-24 06:09:12'),
(298, 'User Logout', 'https://dict-mc3.online/2021/aem/public/logout', 'GET', '202.90.138.249', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/99.0.4844.82 Safari/537.36', 1, '2022-03-24 06:09:31', '2022-03-24 06:09:31'),
(299, 'User Login', 'https://dict-mc3.online/2021/aem/public/login', 'POST', '202.90.138.249', 'Mozilla/5.0 (Macintosh; Intel Mac OS X 10_15_7) AppleWebKit/605.1.15 (KHTML, like Gecko) Version/15.4 Safari/605.1.15', 1, '2022-03-24 06:15:28', '2022-03-24 06:15:28'),
(300, 'User Login', 'https://dict-mc3.online/2021/aem/public/login', 'POST', '202.90.138.249', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/99.0.4844.82 Safari/537.36', 4, '2022-03-24 06:46:50', '2022-03-24 06:46:50'),
(301, 'User Login', 'https://dict-mc3.online/2021/aem/public/login', 'POST', '202.90.138.249', 'Mozilla/5.0 (Macintosh; Intel Mac OS X 10_15_7) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/99.0.4844.74 Safari/537.36', 1, '2022-03-24 07:58:02', '2022-03-24 07:58:02'),
(302, 'User Login', 'https://dict-mc3.online/2021/aem/public/login', 'POST', '202.90.138.249', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/99.0.4844.83 Safari/537.36', 5, '2022-03-24 08:44:03', '2022-03-24 08:44:03'),
(303, 'User Login', 'https://dict-mc3.online/2021/aem/public/login', 'POST', '49.146.46.32', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/99.0.4844.82 Safari/537.36', 2, '2022-03-24 14:24:54', '2022-03-24 14:24:54'),
(304, 'User Logout', 'https://dict-mc3.online/2021/aem/public/logout', 'GET', '49.146.46.32', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/99.0.4844.82 Safari/537.36', 1, '2022-03-24 14:26:40', '2022-03-24 14:26:40'),
(305, 'User Login', 'https://dict-mc3.online/2021/aem/public/login', 'POST', '49.146.46.32', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/99.0.4844.82 Safari/537.36', 23, '2022-03-24 14:26:59', '2022-03-24 14:26:59'),
(306, 'User Logout', 'https://dict-mc3.online/2021/aem/public/logout', 'GET', '49.146.46.32', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/99.0.4844.82 Safari/537.36', 1, '2022-03-24 14:27:38', '2022-03-24 14:27:38'),
(307, 'User Login', 'https://dict-mc3.online/2021/aem/public/login', 'POST', '49.146.46.32', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/99.0.4844.82 Safari/537.36', 2, '2022-03-24 14:28:02', '2022-03-24 14:28:02'),
(308, 'User Logout', 'https://dict-mc3.online/2021/aem/public/logout', 'GET', '49.146.46.32', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/99.0.4844.82 Safari/537.36', 1, '2022-03-24 14:28:38', '2022-03-24 14:28:38'),
(309, 'User Login', 'https://dict-mc3.online/2021/aem/public/login', 'POST', '49.146.46.32', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/99.0.4844.82 Safari/537.36', 2, '2022-03-24 14:28:46', '2022-03-24 14:28:46'),
(310, 'User Login', 'https://dict-mc3.online/2021/aem/public/login', 'POST', '49.146.46.32', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/99.0.4844.82 Safari/537.36', 23, '2022-03-24 14:29:35', '2022-03-24 14:29:35'),
(311, 'User Logout', 'https://dict-mc3.online/2021/aem/public/logout', 'GET', '49.146.46.32', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/99.0.4844.82 Safari/537.36', 1, '2022-03-24 14:30:42', '2022-03-24 14:30:42'),
(312, 'User Logout', 'https://dict-mc3.online/2021/aem/public/logout', 'GET', '49.146.46.32', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/99.0.4844.82 Safari/537.36', 1, '2022-03-24 14:34:40', '2022-03-24 14:34:40'),
(313, 'User Login', 'https://dict-mc3.online/2021/aem/public/login', 'POST', '202.90.138.249', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/99.0.4844.82 Safari/537.36', 4, '2022-03-25 01:00:45', '2022-03-25 01:00:45'),
(314, 'User Login', 'https://dict-mc3.online/2021/aem/public/login', 'POST', '202.90.138.249', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/99.0.4844.82 Safari/537.36', 2, '2022-03-25 02:07:54', '2022-03-25 02:07:54'),
(315, 'User Login', 'https://dict-mc3.online/2021/aem/public/login', 'POST', '202.90.138.249', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/99.0.4844.83 Safari/537.36', 5, '2022-03-25 02:09:25', '2022-03-25 02:09:25'),
(316, 'User Logout', 'https://dict-mc3.online/2021/aem/public/logout', 'GET', '202.90.138.249', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/99.0.4844.82 Safari/537.36', 1, '2022-03-25 02:11:25', '2022-03-25 02:11:25'),
(317, 'User Login', 'https://dict-mc3.online/2021/aem/public/login', 'POST', '202.90.138.249', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/99.0.4844.82 Safari/537.36', 2, '2022-03-25 02:11:41', '2022-03-25 02:11:41'),
(318, 'User Logout', 'https://dict-mc3.online/2021/aem/public/logout', 'GET', '202.90.138.249', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/99.0.4844.82 Safari/537.36', 1, '2022-03-25 02:11:51', '2022-03-25 02:11:51'),
(319, 'User Login', 'https://dict-mc3.online/2021/aem/public/login', 'POST', '202.90.138.249', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/99.0.4844.82 Safari/537.36', 23, '2022-03-25 02:11:59', '2022-03-25 02:11:59'),
(320, 'User Login', 'https://dict-mc3.online/2021/aem/login', 'POST', '202.90.138.249', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/99.0.4844.82 Safari/537.36', 2, '2022-03-25 05:34:05', '2022-03-25 05:34:05'),
(321, 'User Login', 'https://dict-mc3.online/2021/aem/login', 'POST', '202.90.138.249', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/99.0.4844.82 Safari/537.36', 2, '2022-03-28 00:50:51', '2022-03-28 00:50:51'),
(322, 'User Logout', 'https://dict-mc3.online/2021/aem/logout', 'GET', '202.90.138.249', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/99.0.4844.82 Safari/537.36', 1, '2022-03-28 00:51:55', '2022-03-28 00:51:55'),
(323, 'User Login', 'https://dict-mc3.online/2021/aem/public/login', 'POST', '202.90.138.249', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/99.0.4844.82 Safari/537.36', 1, '2022-03-28 07:13:44', '2022-03-28 07:13:44'),
(324, 'User Login', 'https://dict-mc3.online/2021/aem/public/login', 'POST', '202.90.138.249', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/99.0.4844.82 Safari/537.36', 23, '2022-03-28 08:30:38', '2022-03-28 08:30:38'),
(325, 'User Logout', 'https://dict-mc3.online/2021/aem/public/logout', 'GET', '202.90.138.249', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/99.0.4844.82 Safari/537.36', 1, '2022-03-28 08:31:43', '2022-03-28 08:31:43'),
(326, 'User Login', 'https://dict-mc3.online/2021/aem/public/login', 'POST', '202.90.138.249', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/99.0.4844.82 Safari/537.36', 2, '2022-03-28 08:31:51', '2022-03-28 08:31:51'),
(327, 'User Logout', 'https://dict-mc3.online/2021/aem/public/logout', 'GET', '202.90.138.249', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/99.0.4844.82 Safari/537.36', 1, '2022-03-28 08:32:20', '2022-03-28 08:32:20'),
(328, 'User Login', 'https://dict-mc3.online/2021/aem/login', 'POST', '202.90.138.249', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/99.0.4844.82 Safari/537.36', 2, '2022-03-28 08:35:23', '2022-03-28 08:35:23'),
(329, 'User Logout', 'https://dict-mc3.online/2021/aem/logout', 'GET', '202.90.138.249', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/99.0.4844.82 Safari/537.36', 1, '2022-03-28 08:42:45', '2022-03-28 08:42:45'),
(330, 'User Login', 'https://dict-mc3.online/2021/aem/public/login', 'POST', '202.90.138.249', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/99.0.4844.88 Safari/537.36', 5, '2022-03-29 00:25:16', '2022-03-29 00:25:16'),
(331, 'User Login', 'https://dict-mc3.online/2021/aem/login', 'POST', '202.90.138.249', 'Mozilla/5.0 (iPad; CPU OS 14_7 like Mac OS X) AppleWebKit/605.1.15 (KHTML, like Gecko) CriOS/99.0.4844.59 Mobile/15E148 Safari/604.1', 1, '2022-03-29 00:40:36', '2022-03-29 00:40:36'),
(332, 'User Login', 'https://dict-mc3.online/2021/aem/public/login', 'POST', '202.90.138.249', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/99.0.4844.88 Safari/537.36', 5, '2022-03-29 04:48:24', '2022-03-29 04:48:24'),
(333, 'User Login', 'https://dict-mc3.online/2021/aem/public/login', 'POST', '202.90.138.249', 'Mozilla/5.0 (Linux; Android 9; MRD-LX2 Build/HUAWEIMRD-LX2; wv) AppleWebKit/537.36 (KHTML, like Gecko) Version/4.0 Chrome/99.0.4844.73 Mobile Safari/537.36', 2, '2022-03-29 05:11:52', '2022-03-29 05:11:52'),
(334, 'User Logout', 'https://dict-mc3.online/2021/aem/public/logout', 'GET', '202.90.138.249', 'Mozilla/5.0 (Linux; Android 9; MRD-LX2 Build/HUAWEIMRD-LX2; wv) AppleWebKit/537.36 (KHTML, like Gecko) Version/4.0 Chrome/99.0.4844.73 Mobile Safari/537.36', 1, '2022-03-29 05:39:18', '2022-03-29 05:39:18'),
(335, 'User Login', 'https://dict-mc3.online/2021/aem/public/login', 'POST', '202.90.138.249', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/99.0.4844.88 Safari/537.36', 5, '2022-03-29 07:52:44', '2022-03-29 07:52:44'),
(336, 'User Login', 'https://dict-mc3.online/2021/aem/login', 'POST', '202.90.138.249', 'Mozilla/5.0 (iPad; CPU OS 14_7 like Mac OS X) AppleWebKit/605.1.15 (KHTML, like Gecko) CriOS/99.0.4844.59 Mobile/15E148 Safari/604.1', 1, '2022-03-29 07:55:02', '2022-03-29 07:55:02'),
(337, 'User Login', 'https://act.dict-mc3.online/login', 'POST', '202.90.138.249', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/99.0.4844.82 Safari/537.36', 1, '2022-03-29 08:28:04', '2022-03-29 08:28:04'),
(338, 'User Login', 'https://act.dict-mc3.online/login', 'POST', '202.90.138.249', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/99.0.4844.88 Safari/537.36', 5, '2022-03-29 08:38:20', '2022-03-29 08:38:20'),
(339, 'User Logout', 'https://act.dict-mc3.online/logout', 'GET', '202.90.138.249', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/99.0.4844.82 Safari/537.36', 1, '2022-03-29 08:39:13', '2022-03-29 08:39:13'),
(340, 'User Logout', 'https://act.dict-mc3.online/logout', 'GET', '202.90.138.249', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/99.0.4844.88 Safari/537.36', 1, '2022-03-29 08:41:22', '2022-03-29 08:41:22'),
(341, 'User Login', 'https://act.dict-mc3.online/login', 'POST', '202.90.138.249', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/99.0.4844.88 Safari/537.36', 23, '2022-03-29 08:41:54', '2022-03-29 08:41:54'),
(342, 'User Logout', 'https://act.dict-mc3.online/logout', 'GET', '202.90.138.249', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/99.0.4844.88 Safari/537.36', 1, '2022-03-29 08:41:55', '2022-03-29 08:41:55'),
(343, 'User Login', 'https://act.dict-mc3.online/login', 'POST', '202.90.138.249', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/99.0.4844.82 Safari/537.36', 23, '2022-03-29 08:43:10', '2022-03-29 08:43:10'),
(344, 'User Login', 'https://act.dict-mc3.online/login', 'POST', '202.90.138.249', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/99.0.4844.88 Safari/537.36', 5, '2022-03-29 08:45:03', '2022-03-29 08:45:03'),
(345, 'User Logout', 'https://act.dict-mc3.online/logout', 'GET', '202.90.138.249', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/99.0.4844.88 Safari/537.36', 1, '2022-03-29 08:46:42', '2022-03-29 08:46:42'),
(346, 'User Login', 'https://act.dict-mc3.online/login', 'POST', '202.90.138.249', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/99.0.4844.82 Safari/537.36', 1, '2022-03-29 08:47:30', '2022-03-29 08:47:30'),
(347, 'User Login', 'https://act.dict-mc3.online/login', 'POST', '202.90.138.249', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/99.0.4844.88 Safari/537.36', 23, '2022-03-29 08:47:38', '2022-03-29 08:47:38'),
(348, 'User Login', 'https://act.dict-mc3.online/login', 'POST', '202.90.138.249', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/99.0.4844.88 Safari/537.36', 5, '2022-03-29 08:48:15', '2022-03-29 08:48:15'),
(349, 'User Logout', 'https://act.dict-mc3.online/logout', 'GET', '202.90.138.249', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/99.0.4844.88 Safari/537.36', 1, '2022-03-29 08:51:18', '2022-03-29 08:51:18'),
(350, 'User Login', 'https://act.dict-mc3.online/login', 'POST', '202.90.138.249', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/99.0.4844.88 Safari/537.36', 20, '2022-03-29 08:51:29', '2022-03-29 08:51:29'),
(351, 'User Logout', 'https://act.dict-mc3.online/logout', 'GET', '202.90.138.249', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/99.0.4844.88 Safari/537.36', 1, '2022-03-29 08:59:27', '2022-03-29 08:59:27'),
(352, 'User Login', 'https://act.dict-mc3.online/login', 'POST', '202.90.138.249', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/99.0.4844.88 Safari/537.36', 5, '2022-03-29 08:59:32', '2022-03-29 08:59:32'),
(353, 'User Logout', 'https://act.dict-mc3.online/logout', 'GET', '202.90.138.249', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/99.0.4844.88 Safari/537.36', 1, '2022-03-29 09:03:42', '2022-03-29 09:03:42'),
(354, 'User Login', 'https://act.dict-mc3.online/login', 'POST', '112.198.98.68', 'Mozilla/5.0 (Linux; Android 10; V2032; wv) AppleWebKit/537.36 (KHTML, like Gecko) Version/4.0 Chrome/87.0.4280.141 Mobile Safari/537.36 VivoBrowser/8.2.2.1', 24, '2022-03-29 09:09:49', '2022-03-29 09:09:49'),
(355, 'User Logout', 'https://act.dict-mc3.online/logout', 'GET', '202.90.138.249', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/99.0.4844.82 Safari/537.36', 1, '2022-03-29 09:10:03', '2022-03-29 09:10:03'),
(356, 'User Login', 'https://act.dict-mc3.online/login', 'POST', '202.90.138.249', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/99.0.4844.82 Safari/537.36', 23, '2022-03-29 09:10:09', '2022-03-29 09:10:09'),
(357, 'User Login', 'https://act.dict-mc3.online/login', 'POST', '49.146.42.1', 'Mozilla/5.0 (iPad; CPU OS 14_7 like Mac OS X) AppleWebKit/605.1.15 (KHTML, like Gecko) CriOS/99.0.4844.59 Mobile/15E148 Safari/604.1', 1, '2022-03-29 14:17:53', '2022-03-29 14:17:53'),
(358, 'User Login', 'https://act.dict-mc3.online/login', 'POST', '49.146.42.1', 'Mozilla/5.0 (iPad; CPU OS 14_7 like Mac OS X) AppleWebKit/605.1.15 (KHTML, like Gecko) CriOS/99.0.4844.59 Mobile/15E148 Safari/604.1', 1, '2022-03-29 22:19:09', '2022-03-29 22:19:09'),
(359, 'User Login', 'https://act.dict-mc3.online/login', 'POST', '202.90.138.249', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/99.0.4844.88 Safari/537.36', 24, '2022-03-29 23:46:43', '2022-03-29 23:46:43'),
(360, 'Accessed Permission Index', 'https://act.dict-mc3.online/admin/permissions', 'GET', '202.90.138.249', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/99.0.4844.88 Safari/537.36', 24, '2022-03-29 23:48:45', '2022-03-29 23:48:45'),
(361, 'Accessed Permission Index', 'https://act.dict-mc3.online/admin/permissions?page=2', 'GET', '202.90.138.249', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/99.0.4844.88 Safari/537.36', 24, '2022-03-29 23:49:17', '2022-03-29 23:49:17'),
(362, 'Accessed Permission Index', 'https://act.dict-mc3.online/admin/permissions?page=3', 'GET', '202.90.138.249', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/99.0.4844.88 Safari/537.36', 24, '2022-03-29 23:49:18', '2022-03-29 23:49:18'),
(363, 'Accessed Permission Index', 'https://act.dict-mc3.online/admin/permissions?page=4', 'GET', '202.90.138.249', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/99.0.4844.88 Safari/537.36', 24, '2022-03-29 23:49:19', '2022-03-29 23:49:19'),
(364, 'Accessed Permission Index', 'https://act.dict-mc3.online/admin/permissions?page=5', 'GET', '202.90.138.249', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/99.0.4844.88 Safari/537.36', 24, '2022-03-29 23:49:20', '2022-03-29 23:49:20'),
(365, 'Accessed Permission Index', 'https://act.dict-mc3.online/admin/permissions?page=6', 'GET', '202.90.138.249', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/99.0.4844.88 Safari/537.36', 24, '2022-03-29 23:49:21', '2022-03-29 23:49:21'),
(366, 'User Logout', 'https://act.dict-mc3.online/logout', 'GET', '202.90.138.249', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/99.0.4844.88 Safari/537.36', 1, '2022-03-30 00:07:48', '2022-03-30 00:07:48'),
(367, 'User Login', 'https://act.dict-mc3.online/login', 'POST', '202.90.138.249', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/99.0.4844.88 Safari/537.36', 24, '2022-03-30 00:09:19', '2022-03-30 00:09:19'),
(368, 'User Logout', 'https://act.dict-mc3.online/logout', 'GET', '202.90.138.249', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/99.0.4844.88 Safari/537.36', 1, '2022-03-30 00:17:55', '2022-03-30 00:17:55'),
(369, 'User Login', 'https://act.dict-mc3.online/login', 'POST', '202.90.138.249', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/99.0.4844.88 Safari/537.36', 5, '2022-03-30 00:18:09', '2022-03-30 00:18:09'),
(370, 'User Login', 'https://act.dict-mc3.online/login', 'POST', '202.90.138.249', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/99.0.4844.82 Safari/537.36', 4, '2022-03-30 00:20:48', '2022-03-30 00:20:48'),
(371, 'User Login', 'https://act.dict-mc3.online/login', 'POST', '202.90.138.249', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/99.0.4844.84 Safari/537.36', 1, '2022-03-30 00:53:29', '2022-03-30 00:53:29');

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

DROP TABLE IF EXISTS `migrations`;
CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_resets_table', 1),
(3, '2019_08_19_000000_create_failed_jobs_table', 1),
(4, '2019_12_14_000001_create_personal_access_tokens_table', 1),
(5, '2022_02_10_014209_create_activities_table', 1),
(6, '2022_02_10_014331_create_activity_expenses_table', 1),
(7, '2022_02_10_031831_create_programs_table', 1),
(8, '2022_02_11_040545_create_activity_attendance_table', 1);

-- --------------------------------------------------------

--
-- Table structure for table `one_time_passwords`
--

DROP TABLE IF EXISTS `one_time_passwords`;
CREATE TABLE `one_time_passwords` (
  `otpid` int(11) NOT NULL,
  `email` varchar(25) NOT NULL,
  `otp` varchar(25) NOT NULL,
  `status` int(11) NOT NULL,
  `created_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `one_time_passwords`
--

INSERT INTO `one_time_passwords` (`otpid`, `email`, `otp`, `status`, `created_at`, `updated_at`) VALUES
(2, 'jsceon@gmail.com', 'n9VJ2q9e', 0, '2022-03-07 01:18:56', '2022-03-07 01:18:56');

-- --------------------------------------------------------

--
-- Table structure for table `password_resets`
--

DROP TABLE IF EXISTS `password_resets`;
CREATE TABLE `password_resets` (
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `password_resets`
--

INSERT INTO `password_resets` (`email`, `token`, `created_at`) VALUES
('virgil.fuentes@dict.gov.ph', 'rHexOYhNKbIl5yrbO6LQpYIvDizZZtknIFVKRuBMSLWgFEao7SfVDGKNFNths0jn', '2022-03-16 21:35:06');

-- --------------------------------------------------------

--
-- Table structure for table `permissions`
--

DROP TABLE IF EXISTS `permissions`;
CREATE TABLE `permissions` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `permissions`
--

INSERT INTO `permissions` (`id`, `name`, `created_at`, `updated_at`) VALUES
(1, 'admin_panel_access', '2022-03-07 16:43:04', '2022-03-07 16:43:04'),
(2, 'users_access', '2022-03-07 16:43:04', '2022-03-07 16:43:04'),
(3, 'user_edit', '2022-03-07 16:43:04', '2022-03-07 16:43:04'),
(4, 'user_delete', '2022-03-07 16:43:04', '2022-03-07 16:43:04'),
(5, 'user_create', '2022-03-07 16:43:04', '2022-03-07 16:43:04'),
(6, 'user_show', '2022-03-07 16:43:04', '2022-03-07 16:43:04'),
(7, 'roles_access', '2022-03-07 16:43:04', '2022-03-07 16:43:04'),
(8, 'role_edit', '2022-03-07 16:43:04', '2022-03-07 16:43:04'),
(9, 'role_delete', '2022-03-07 16:43:04', '2022-03-07 16:43:04'),
(10, 'role_create', '2022-03-07 16:43:04', '2022-03-07 16:43:04'),
(11, 'role_show', '2022-03-07 16:43:04', '2022-03-07 16:43:04'),
(12, 'permissions_access', '2022-03-07 16:43:04', '2022-03-07 16:43:04'),
(13, 'permission_edit', '2022-03-07 16:43:04', '2022-03-07 16:43:04'),
(14, 'permission_delete', '2022-03-07 16:43:04', '2022-03-07 16:43:04'),
(15, 'permission_create', '2022-03-07 16:43:04', '2022-03-07 16:43:04'),
(16, 'dashboard_view', '2022-03-07 16:48:33', '2022-03-07 16:48:33'),
(18, 'task_assignment', '2022-03-08 23:18:53', '2022-03-08 23:18:53'),
(19, 'training_registered', '2022-03-09 09:48:20', '2022-03-09 09:48:20'),
(20, 'my_task', '2022-03-09 09:48:32', '2022-03-09 09:48:32'),
(21, 'master_tables', '2022-03-09 09:48:40', '2022-03-09 09:48:40'),
(22, 'activity_registration', '2022-03-13 21:10:56', '2022-03-13 21:10:56'),
(23, 'dashboard', '2022-03-13 21:11:05', '2022-03-13 21:11:05'),
(24, 'view_usermanagement', '2022-03-13 23:04:24', '2022-03-13 23:04:24'),
(25, 'manuallyassignfocal', '2022-03-16 00:46:19', '2022-03-16 00:46:19'),
(26, 'programs', '2022-03-16 21:15:45', '2022-03-16 21:15:45'),
(27, 'activityindex', '2022-03-16 21:15:53', '2022-03-16 21:15:53'),
(28, 'expense', '2022-03-16 21:16:02', '2022-03-16 21:16:02'),
(29, 'userlogs', '2022-03-20 17:57:09', '2022-03-20 17:57:09'),
(30, 'self_program_create', '2022-03-20 20:55:11', '2022-03-20 20:55:11'),
(31, 'deletetask', '2022-03-24 06:02:12', '2022-03-24 06:02:12');

-- --------------------------------------------------------

--
-- Table structure for table `personal_access_tokens`
--

DROP TABLE IF EXISTS `personal_access_tokens`;
CREATE TABLE `personal_access_tokens` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `tokenable_type` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tokenable_id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(64) COLLATE utf8mb4_unicode_ci NOT NULL,
  `abilities` text COLLATE utf8mb4_unicode_ci,
  `last_used_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `programs`
--

DROP TABLE IF EXISTS `programs`;
CREATE TABLE `programs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `shortName` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `programDescription` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `focalPerson` tinyint(3) UNSIGNED DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `programs`
--

INSERT INTO `programs` (`id`, `shortName`, `programDescription`, `focalPerson`, `created_at`, `updated_at`) VALUES
(1, 'iBPLS', 'iBPLS is an an online application software developed by the DICT that helps LGUs to expedite the processing and issuance of business permits, building permits and related permits.', 1, '2022-02-15 17:20:22', '2022-02-15 17:20:22'),
(2, 'e-Filipino Tech4Ed', 'Tech4ED Project provides access points for individuals and communities to bridge the digital and education divide.', 9, '2022-02-15 17:22:01', '2022-03-20 21:22:02'),
(3, 'BAC Secretariat', 'Government Procurement Reform Act (Republic Act 9184) under Section 12 and its 2016 Implementing Rules and Regulations (IRR), requires the creation of the (BAC)', 1, '2022-02-20 20:00:28', '2022-02-20 20:00:28'),
(4, 'GWHS', 'Integrated Government Philippines (iGovPhil) Program provides a web hosting service to government entities, including government agencies, financial institutions, etc.', 1, '2022-02-20 20:02:40', '2022-02-20 20:02:40'),
(5, 'PNPKI', 'Public Key Infrastructure (PKI) allows users of public networks like the Internet to exchange private data securely.', 1, '2022-03-06 19:09:33', '2022-03-06 19:09:33'),
(6, 'System Dev', 'System Development', 1, '2022-03-08 17:37:51', '2022-03-08 17:37:51'),
(7, 'Inter-Agency Collaboration', 'Cross agency and other stakeholders partnership', 1, '2022-03-16 00:44:53', '2022-03-16 00:44:53');

-- --------------------------------------------------------

--
-- Table structure for table `roles`
--

DROP TABLE IF EXISTS `roles`;
CREATE TABLE `roles` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `title` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `short_code` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `roles`
--

INSERT INTO `roles` (`id`, `title`, `short_code`, `created_at`, `updated_at`) VALUES
(1, 'Administrator', 'Admin', '2022-03-07 16:43:04', '2022-03-07 16:43:04'),
(2, 'User', 'User', '2022-03-07 16:43:04', '2022-03-29 23:48:37'),
(3, 'RD', 'Regional Director', '2022-03-07 16:49:27', '2022-03-29 08:57:29'),
(4, 'God Mode', 'gm', '2022-03-08 23:28:51', '2022-03-08 23:28:51'),
(5, 'Focal', 'focal', '2022-03-08 23:29:11', '2022-03-08 23:29:11');

-- --------------------------------------------------------

--
-- Table structure for table `role_permissions`
--

DROP TABLE IF EXISTS `role_permissions`;
CREATE TABLE `role_permissions` (
  `role_id` bigint(20) UNSIGNED NOT NULL,
  `permission_id` bigint(20) UNSIGNED NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `role_permissions`
--

INSERT INTO `role_permissions` (`role_id`, `permission_id`) VALUES
(1, 1),
(1, 2),
(2, 31),
(1, 29),
(1, 5),
(1, 6),
(5, 21),
(5, 20),
(5, 19),
(5, 18),
(5, 16),
(1, 28),
(1, 27),
(5, 28),
(5, 1),
(2, 1),
(2, 6),
(3, 16),
(3, 1),
(1, 16),
(1, 18),
(4, 1),
(4, 2),
(4, 3),
(4, 4),
(4, 5),
(4, 6),
(4, 7),
(4, 8),
(4, 9),
(4, 10),
(4, 11),
(4, 12),
(4, 13),
(4, 14),
(4, 15),
(4, 16),
(4, 18),
(5, 27),
(5, 26),
(3, 18),
(1, 26),
(2, 27),
(2, 28),
(4, 29),
(3, 20),
(5, 23),
(1, 19),
(1, 20),
(1, 21),
(2, 16),
(2, 18),
(2, 19),
(2, 20),
(2, 21),
(1, 3),
(1, 4),
(1, 7),
(1, 8),
(1, 9),
(1, 10),
(1, 11),
(1, 12),
(1, 13),
(1, 14),
(1, 15),
(4, 19),
(4, 20),
(4, 21),
(3, 28),
(3, 27),
(2, 4),
(2, 5),
(4, 24),
(3, 26),
(3, 22),
(3, 21),
(2, 30),
(3, 25),
(3, 23),
(1, 24),
(3, 19),
(2, 22),
(2, 23),
(1, 22),
(1, 23),
(4, 22),
(4, 23),
(3, 30);

-- --------------------------------------------------------

--
-- Table structure for table `task_assignments`
--

DROP TABLE IF EXISTS `task_assignments`;
CREATE TABLE `task_assignments` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `papID` int(11) NOT NULL DEFAULT '0',
  `taskBy` int(11) NOT NULL DEFAULT '0',
  `taskedTo` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `taskDetail` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `taskResolved` int(11) NOT NULL DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `task_assignments`
--

INSERT INTO `task_assignments` (`id`, `papID`, `taskBy`, `taskedTo`, `taskDetail`, `taskResolved`, `created_at`, `updated_at`) VALUES
(2, 3, 1, ' ', 'Break into two ( DC Tech and Jharka) resolution for termination', 0, '2022-02-23 23:57:11', '2022-02-23 23:57:11'),
(4, 1, 3, ' ', 'moa print', 0, '2022-03-01 23:30:18', '2022-03-01 23:30:18'),
(7, 1, 1, ' ', 'Update AEM system', 1, '2022-03-04 19:44:45', '2022-03-04 19:44:45'),
(8, 5, 1, ' ', 'Digital Certificate request from Leann Baruis, Kapitan Tomas SPED Center', 1, '2022-03-06 19:11:18', '2022-03-06 19:11:18'),
(9, 1, 4, ' ', 'Follow up LGUs for February 2022 status', 1, '2022-03-08 00:16:08', '2022-03-08 00:16:08'),
(10, 1, 4, ' ', 'Remind LGU of Manay, Davao Oriental the FEEDBACK SURVEY for eBPLS', 1, '2022-03-08 17:13:53', '2022-03-08 17:13:53'),
(11, 1, 5, ' ', '1.	Monitoring and provided technical assistance on LGU’s with full implementation of eBPLS Cloud', 1, '2022-03-08 17:27:38', '2022-03-08 17:27:38'),
(12, 1, 5, ' ', '1.	Monitoring and provided technical assistance on LGU’s with full implementation of eBPLS Cloud', 1, '2022-03-08 17:30:17', '2022-03-08 17:30:17'),
(14, 1, 4, ' ', 'Updated status of LGU for iBPLS: BPBC Utilization Monitoring February 2022  - Report for PMT', 1, '2022-03-08 17:44:32', '2022-03-08 17:44:32'),
(15, 1, 4, ' ', 'Updated status of LGU for iBPLS: BPCO Utilization Monitoring February 2022 - Report for PMT', 1, '2022-03-08 17:45:43', '2022-03-08 17:45:43'),
(16, 6, 23, ' ', 'Adding Permission to User(s)', 1, '2022-03-13 22:33:20', '2022-03-13 22:33:20'),
(17, 1, 4, ' ', 'Gender Sensitivity and Equality Training - March 15-16, 2022', 1, '2022-03-15 00:23:38', '2022-03-15 00:23:38'),
(18, 1, 4, ' ', 'Online Orientation Seminar with J.O/COS Employees from NGAs - RDO132 - March 11, 2022', 1, '2022-03-15 00:29:06', '2022-03-15 00:29:06'),
(19, 1, 4, ' ', 'Launching of DICT Online Safeguarding website: \"Ensuring safer free internet for children\" - March 11, 2022', 1, '2022-03-15 00:31:39', '2022-03-15 00:31:39'),
(20, 1, 2, ' ', 'Provide Technical Assistance to LGU Baganga and  Lupon, Davao Oriental', 0, '2022-03-15 01:28:21', '2022-03-15 01:28:21'),
(21, 1, 4, ' ', 'Prepared Canvass and Purchase Request for ICT and Office Supplies for 2022', 1, '2022-03-15 21:02:29', '2022-03-15 21:02:29'),
(22, 7, 1, ' ', 'Learning event on strengthening the innovation ecosystem, based on a 3rd party assessment of STRIDE activities', 1, '2022-03-16 00:47:40', '2022-03-16 00:47:40'),
(23, 1, 4, '', 'ONLINE FORUM - ASSESSING THE PROMISE OF LEO SATELLITES IN ACCELERATING RURAL CONNECTIVITY AND CLOSING THE DIGITAL DIVIDE', 1, '2022-03-16 21:34:35', '2022-03-16 21:34:35'),
(24, 1, 4, '', 'Region Wide Meeting for 2nd Sem Accomplishments/Updates and Presentation of Project Targets for 2022 and Target Distribution per Province   - Region XI - March 2, 2022', 1, '2022-03-20 16:36:55', '2022-03-20 16:36:55'),
(25, 1, 4, '', 'ITEE Promotion Seminar (Preparing for PhilNITS Certification Exams)', 1, '2022-03-20 16:41:18', '2022-03-20 16:41:18'),
(26, 1, 4, '', 'User\'s Training on the Submission of MPAR and TODA through the PMIS (Program Management Information System)', 1, '2022-03-20 16:42:28', '2022-03-20 16:42:28'),
(27, 1, 4, '', 'Follow up LGUs for their Designation Form', 0, '2022-03-20 22:59:56', '2022-03-20 22:59:56'),
(28, 1, 1, '', 'Process Mati City iBPLS request', 1, '2022-03-21 18:54:10', '2022-03-21 18:54:10'),
(29, 7, 1, '', 'Attend presentation of TribungKape IBR guided by University of Mindanao as consultant.', 1, '2022-03-21 19:00:41', '2022-03-21 19:00:41'),
(30, 1, 4, '', 'P-EAGA ICT_ Presentation of RPOPs and Implementation Plan (March 29, 2022) - FY2022', 0, '2022-03-21 22:32:31', '2022-03-21 22:32:31'),
(33, 1, 4, '', 'Updated iBPLS - Batch Activities for AR February 2022', 0, '2022-03-23 08:18:37', '2022-03-23 08:18:37'),
(36, 7, 1, '', 'IBR plan presentation of Holy Cross of Davao College for Rosit Cacao Farms ( 24 March 2022 1:00-3:00pm )', 0, '2022-03-24 06:16:57', '2022-03-24 06:16:57'),
(37, 1, 4, '', 'WEBINAR: Advancing Women and Diversity in the Information Security Workforce', 0, '2022-03-24 07:18:41', '2022-03-24 07:18:41'),
(38, 1, 4, '', 'Policy Advocacy Webinar: Ensuring a Safe Cyberspace for Women, Children and Young People on 24 March', 0, '2022-03-24 07:19:52', '2022-03-24 07:19:52'),
(39, 1, 1, '', 'CMCI 2022: Request for CMCI Data for LGU implementing eBPLS', 0, '2022-03-24 07:59:31', '2022-03-24 07:59:31'),
(40, 7, 1, '', 'IBR Plan Presentation of Filipnas Oro de Cacao by Holy Cross of Davao College', 0, '2022-03-28 07:14:48', '2022-03-28 07:14:48'),
(41, 1, 2, '', 'Follow up MOA of LGU Caraga, Davao Oriental', 0, '2022-03-28 08:36:32', '2022-03-28 08:36:32'),
(42, 1, 2, '', 'Provide Technical Assistance specifically on LGU Lupon, Davao Oriental. For the issue of penalty was not reflected.', 0, '2022-03-28 08:40:47', '2022-03-28 08:40:47'),
(43, 1, 2, '', 'Test', 0, '2022-03-29 05:24:03', '2022-03-29 05:24:03'),
(44, 7, 1, '', 'Attend on DICT Consultation among the Supervising Executive Officials, Delivery Units, and Regional Offices on the FY2023 Budget Preparation', 0, '2022-03-29 14:20:31', '2022-03-29 14:20:31'),
(45, 7, 1, '', 'IBR Plan Presentation of Malayan Colleges Mindanao for Mount Apo Civet Coffee Incorporated (2PM-4PM)', 0, '2022-03-29 14:22:26', '2022-03-29 14:22:26');

-- --------------------------------------------------------

--
-- Table structure for table `task_resolutions`
--

DROP TABLE IF EXISTS `task_resolutions`;
CREATE TABLE `task_resolutions` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `taskAssignmentID` int(11) NOT NULL DEFAULT '0',
  `resolutionDetails` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `userID` int(11) NOT NULL DEFAULT '0',
  `verifiedBy` int(11) NOT NULL DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `task_resolutions`
--

INSERT INTO `task_resolutions` (`id`, `taskAssignmentID`, `resolutionDetails`, `userID`, `verifiedBy`, `created_at`, `updated_at`) VALUES
(2, 2, ' ', 12, 0, '2022-02-23 23:57:11', '2022-02-23 23:57:11'),
(4, 4, ' ', 19, 0, '2022-03-01 23:30:18', '2022-03-01 23:30:18'),
(7, 7, 'create instance in another platform', 1, 1, '2022-03-04 19:44:45', '2022-03-04 19:44:45'),
(8, 8, 'Coordinated with Engr. Galang and Engr. Jose Benjamin the status. Problem lies with the Davao City DepEd erroneous submission.', 1, 1, '2022-03-06 19:11:18', '2022-03-06 19:11:18'),
(9, 9, 'done', 4, 1, '2022-03-08 00:16:08', '2022-03-08 00:16:08'),
(10, 10, 'done', 4, 1, '2022-03-08 17:13:53', '2022-03-08 17:13:53'),
(11, 11, 'done', 5, 1, '2022-03-08 17:27:38', '2022-03-08 17:27:38'),
(12, 11, 'done', 19, 1, '2022-03-08 17:27:38', '2022-03-08 17:27:38'),
(13, 11, 'done', 2, 1, '2022-03-08 17:27:38', '2022-03-08 17:27:38'),
(14, 12, 'done', 4, 1, '2022-03-08 17:30:17', '2022-03-08 17:30:17'),
(15, 13, 'done', 5, 1, '2022-03-08 17:38:43', '2022-03-08 17:38:43'),
(16, 13, 'done', 4, 1, '2022-03-08 17:38:43', '2022-03-08 17:38:43'),
(17, 14, 'done', 4, 1, '2022-03-08 17:44:32', '2022-03-08 17:44:32'),
(18, 15, 'done', 4, 1, '2022-03-08 17:45:43', '2022-03-08 17:45:43'),
(19, 16, 'Already Added please check po', 23, 0, '2022-03-13 22:33:20', '2022-03-13 22:33:20'),
(20, 17, 'Attended and filled out the evaluation forms.', 1, 1, '2022-03-15 00:23:38', '2022-03-15 00:23:38'),
(21, 17, 'Attended and filled out the evaluation forms.', 4, 1, '2022-03-15 00:23:38', '2022-03-15 00:23:38'),
(22, 17, 'Attended and filled out the evaluation forms.', 2, 1, '2022-03-15 00:23:38', '2022-03-15 00:23:38'),
(23, 17, 'Attended and filled out the evaluation forms.', 3, 1, '2022-03-15 00:23:38', '2022-03-15 00:23:38'),
(24, 17, 'Attended and filled out the evaluation forms.', 5, 1, '2022-03-15 00:23:38', '2022-03-15 00:23:38'),
(25, 18, 'done', 4, 1, '2022-03-15 00:29:06', '2022-03-15 00:29:06'),
(26, 18, 'done', 2, 1, '2022-03-15 00:29:06', '2022-03-15 00:29:06'),
(27, 18, 'done', 5, 1, '2022-03-15 00:29:06', '2022-03-15 00:29:06'),
(28, 19, 'done', 4, 1, '2022-03-15 00:31:39', '2022-03-15 00:31:39'),
(29, 20, 'Already done', 2, 1, '2022-03-15 01:28:21', '2022-03-15 01:28:21'),
(30, 21, 'done', 4, 1, '2022-03-15 21:02:29', '2022-03-15 21:02:29'),
(31, 22, 'Attended and participated on break out session workshop.', 1, 1, '2022-03-16 00:47:40', '2022-03-16 00:47:40'),
(32, 23, 'done', 1, 1, '2022-03-16 21:34:35', '2022-03-16 21:34:35'),
(33, 23, 'done', 5, 1, '2022-03-16 21:34:35', '2022-03-16 21:34:35'),
(34, 23, 'done', 3, 1, '2022-03-16 21:34:35', '2022-03-16 21:34:35'),
(35, 23, 'done', 2, 1, '2022-03-16 21:34:35', '2022-03-16 21:34:35'),
(36, 23, 'done', 4, 1, '2022-03-16 21:34:35', '2022-03-16 21:34:35'),
(37, 24, NULL, 1, 1, '2022-03-20 16:36:55', '2022-03-20 16:36:55'),
(38, 24, 'done', 2, 1, '2022-03-20 16:36:55', '2022-03-20 16:36:55'),
(39, 24, NULL, 4, 1, '2022-03-20 16:36:55', '2022-03-20 16:36:55'),
(40, 24, 'done', 5, 1, '2022-03-20 16:36:55', '2022-03-20 16:36:55'),
(41, 24, NULL, 3, 1, '2022-03-20 16:36:55', '2022-03-20 16:36:55'),
(42, 25, 'done', 1, 1, '2022-03-20 16:41:18', '2022-03-20 16:41:18'),
(43, 25, 'done', 2, 1, '2022-03-20 16:41:18', '2022-03-20 16:41:18'),
(44, 25, 'done', 3, 1, '2022-03-20 16:41:18', '2022-03-20 16:41:18'),
(45, 25, 'done', 5, 1, '2022-03-20 16:41:18', '2022-03-20 16:41:18'),
(46, 25, 'done', 4, 1, '2022-03-20 16:41:18', '2022-03-20 16:41:18'),
(47, 26, 'done', 1, 1, '2022-03-20 16:42:28', '2022-03-20 16:42:28'),
(48, 26, 'done', 2, 1, '2022-03-20 16:42:28', '2022-03-20 16:42:28'),
(49, 26, 'done', 3, 1, '2022-03-20 16:42:28', '2022-03-20 16:42:28'),
(50, 26, 'done', 5, 1, '2022-03-20 16:42:28', '2022-03-20 16:42:28'),
(51, 26, 'done', 4, 1, '2022-03-20 16:42:28', '2022-03-20 16:42:28'),
(52, 27, NULL, 4, 1, '2022-03-20 22:59:56', '2022-03-20 22:59:56'),
(53, 28, 'Forwarded the concern to Miss Del Basada and looped it to directors and division chiefs.', 1, 0, '2022-03-21 18:54:10', '2022-03-21 18:54:10'),
(54, 29, 'actively participated in discussion.', 1, 1, '2022-03-21 19:00:41', '2022-03-21 19:00:41'),
(55, 30, NULL, 4, 1, '2022-03-21 22:32:31', '2022-03-21 22:32:31'),
(56, 31, NULL, 3, 0, '2022-03-22 16:29:27', '2022-03-22 16:29:27'),
(57, 31, 'Tried adding task today at exactly 4:18pm, tama naman yung time na nag appear.', 4, 0, '2022-03-22 16:29:27', '2022-03-22 16:29:27'),
(58, 31, 'done', 5, 0, '2022-03-22 16:29:27', '2022-03-22 16:29:27'),
(59, 32, 'Responded', 2, 0, '2022-03-23 00:20:57', '2022-03-23 00:20:57'),
(60, 33, NULL, 4, 1, '2022-03-23 08:18:37', '2022-03-23 08:18:37'),
(61, 34, NULL, 2, 0, '2022-03-24 02:26:59', '2022-03-24 02:26:59'),
(62, 34, 'done', 4, 0, '2022-03-24 02:26:59', '2022-03-24 02:26:59'),
(63, 34, 'done', 5, 1, '2022-03-24 02:27:01', '2022-03-24 02:27:01'),
(64, 34, NULL, 3, 0, '2022-03-24 02:27:03', '2022-03-24 02:27:03'),
(65, 35, NULL, 3, 0, '2022-03-24 02:43:28', '2022-03-24 02:43:28'),
(66, 35, NULL, 4, 0, '2022-03-24 02:43:30', '2022-03-24 02:43:30'),
(67, 35, NULL, 2, 0, '2022-03-24 02:43:32', '2022-03-24 02:43:32'),
(68, 36, 'Online presence endorsement for agency intervention.', 1, 1, '2022-03-24 06:16:57', '2022-03-24 06:16:57'),
(69, 37, NULL, 1, 1, '2022-03-24 07:18:41', '2022-03-24 07:18:41'),
(70, 37, NULL, 2, 1, '2022-03-24 07:18:41', '2022-03-24 07:18:41'),
(71, 37, NULL, 5, 1, '2022-03-24 07:18:41', '2022-03-24 07:18:41'),
(72, 37, NULL, 4, 1, '2022-03-24 07:18:42', '2022-03-24 07:18:42'),
(73, 38, NULL, 2, 1, '2022-03-24 07:19:52', '2022-03-24 07:19:52'),
(74, 38, 'done', 5, 1, '2022-03-24 07:19:54', '2022-03-24 07:19:54'),
(75, 38, NULL, 4, 1, '2022-03-24 07:19:55', '2022-03-24 07:19:55'),
(76, 39, 'Already encoded the data', 2, 0, '2022-03-24 07:59:31', '2022-03-24 07:59:31'),
(77, 39, NULL, 4, 0, '2022-03-24 07:59:31', '2022-03-24 07:59:31'),
(78, 39, 'done', 5, 0, '2022-03-24 07:59:31', '2022-03-24 07:59:31'),
(79, 40, 'participated and suggested digital payment thru GCash Outlets for them to pay their supplier.', 1, 1, '2022-03-28 07:14:48', '2022-03-28 07:14:48'),
(80, 41, 'Already Contacted and LGU Caraga  was responsive.', 2, 1, '2022-03-28 08:36:32', '2022-03-28 08:36:32'),
(81, 42, 'Done', 2, 1, '2022-03-28 08:40:47', '2022-03-28 08:40:47'),
(82, 43, 'Response', 2, 2, '2022-03-29 05:24:03', '2022-03-29 05:24:03'),
(83, 44, 'Made suggestions on ISSP concerns of LGUs.', 1, 1, '2022-03-29 14:20:31', '2022-03-29 14:20:31'),
(84, 45, 'Suggested inclusion of information system for a data driven policy and decision making.', 1, 1, '2022-03-29 14:22:26', '2022-03-29 14:22:26');

-- --------------------------------------------------------

--
-- Table structure for table `todos`
--

DROP TABLE IF EXISTS `todos`;
CREATE TABLE `todos` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `title` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `todos`
--

INSERT INTO `todos` (`id`, `title`, `description`, `created_at`, `updated_at`) VALUES
(1, 'Title', 'Description', '2022-03-13 20:26:34', '2022-03-13 20:26:34');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

DROP TABLE IF EXISTS `users`;
CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `agency` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `division` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `designation` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `contactNumber` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `sex` tinyint(4) NOT NULL DEFAULT '0',
  `role_id` bigint(20) DEFAULT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `agency`, `division`, `designation`, `contactNumber`, `sex`, `role_id`, `email`, `email_verified_at`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'Engr. Virgil A. Fuentes', 'DICT XI', 'TOD', 'ITO 1 / iBPLS Focal', '09228027185', 0, 1, 'virgil.fuentes@dict.gov.ph', '2022-02-15 17:16:07', '$2y$10$Piyu5F52Ekfs2HIwVHTrNuyw0sAdszqMKai2qwi/Lemhp6iKuk0Wi', NULL, '2022-02-15 17:16:07', '2022-03-17 16:58:49'),
(2, 'JASON OMAC', 'Department of Information and Communication Technology', 'TOD', 'Information System  Analyst I', '09096716850', 0, 2, 'jason.omac@dict.gov.ph', '2022-02-15 17:16:07', '$2y$10$dUsVCJL4AdZM29BmMQP/keuu2rfOba7ccS53vqgemyQxPMqE1pkEC', NULL, '2022-02-16 00:25:50', '2022-03-25 05:37:39'),
(3, 'Jasper Humprey', 'DICT', 'TOD', 'ISA I', '09101107559', 0, 4, 'jasper.perez@dict.gov.ph', '2022-02-15 17:16:07', '$2y$10$6P/IblXk1cuneX/9Jqb9lu89q04P5MdRVwqD/1jtOd9TzIp2oHFf.', NULL, '2022-02-16 00:29:18', '2022-02-16 00:29:18'),
(4, 'Lucky Plus Humuad', 'DICT', 'MC3', 'ISA 1', '09977229745', 1, 2, 'lucky.humuad@dict.gov.ph', '2022-02-15 17:16:07', '$2y$10$OcY5dF8ySp8/lM0oB8YoW.CR80kohmDzFT6Q67zcQZ9JpCcIhgsvC', NULL, '2022-02-16 00:29:58', '2022-03-13 20:28:30'),
(5, 'Nevien Chris Cimafranca', 'DICT MC3', 'TOD', 'ISA I', '09165727120', 0, 2, 'nevien.cimafranca@dict.gov.ph', '2022-02-15 17:16:07', '$2y$10$TfotEFX65Jadze7RcULPVOUmq3rZRIxJQ/4EPLwY2JRtqeddXqOvW', NULL, '2022-02-16 00:30:03', '2022-03-29 09:03:36'),
(6, 'Rechael L. Mangaron', 'LGU-Digos', 'Business Permits and Licensing Division', 'Administrative Aide VI', '09073114956', 1, 2, 'rechael_mangaron@yahoo.com', '2022-02-15 17:16:07', '$2y$10$iHsnspFDwMVFmXOjmZVSCuIjlW74n3spYe5.p/HI5kFt9yYjxuo7C', NULL, '2022-02-16 00:42:57', '2022-03-13 20:29:48'),
(7, 'ANNA LORAINE O. MIRO', 'LGU-DIGOS', 'BPLO', 'Admin Aide 1', '09187160704', 1, 2, 'annalorainemiro325@gmail.com', '2022-02-15 17:16:07', '$2y$10$Omrb4.soEztDFvq2J89XNOmcbYLONrRYU1UB3OxmFIDg8uUjTZZDW', NULL, '2022-02-16 16:55:39', '2022-03-13 20:30:09'),
(8, 'Ariel Movida :)', 'lgu digos', 'license', 'staff', '09952239080', 0, 2, 'arielmovida09@gmail.com', '2022-02-15 17:16:07', '$2y$10$J7G1MVNPuJqTIU8gh0fnOu.Bc9fwhHK/VBER1XuCag/FhO44bdJ1S', NULL, '2022-02-16 17:02:44', '2022-03-13 20:30:26'),
(9, 'Loren Grace Recoleto', 'DICT XI', 'Free WiFi', 'Engineer 1', '09103206279', 1, 2, 'loren.recoleto@dict.gov.ph', '2022-02-15 17:16:07', '$2y$10$tA2C18ZcsxVPz1N7NMGb4e3V4ji1xLsj48BAYjoL6dgrEOFKVAS0C', NULL, '2022-02-16 19:44:46', '2022-03-13 20:30:42'),
(10, 'Loren', 'Test', 'Test', 'Test', '09260017849', 0, 2, 'ren.recoleto@gmail.com', '2022-02-15 17:16:07', '$2y$10$8ql16OJ2kvJUxWoFGe8L8eHDODRylqvjskGNLWCMefHT71NPdAP3K', NULL, '2022-02-17 19:24:34', '2022-03-13 20:31:11'),
(11, 'KAREN U. BALAZON', 'CITY GOVERNMENT  OF DIGOS', 'TREASURER\'S OFFICE', 'RCC II', '09168263145', 1, 2, 'karenbalazon40@gmail.com', '2022-02-15 17:16:07', '$2y$10$KkuMIZ8xGMtWd67Q8Ag.RO/tl9E0WakzTBETWvZBk71OtaCms.yVO', NULL, '2022-02-17 22:42:31', '2022-03-13 20:31:45'),
(12, 'Zada Fernandez', 'DICT Region 11', 'Free Wi-Fi Program', 'Engineer II', '09171861279', 1, 2, 'zada.fernandez@dict.gov.ph', '2022-02-15 17:16:07', '$2y$10$k2iLsDEi8mS/vm/ruyPPyubZ90TlzywU5BJhjYoABlS1MbKT.lGOG', NULL, '2022-02-21 01:04:41', '2022-03-13 20:31:51'),
(13, 'Edward Snowden', 'CIA', 'IT Department', 'Programmer', '123409987', 0, 2, 'edward@gmail.com', '2022-02-15 17:16:07', '$2y$10$bixyDmZ/xGB73iXppZgxQ.MnsTPHYEsRYNH0271aSNpZQsnafphru', NULL, '2022-02-21 19:51:11', '2022-03-13 20:31:57'),
(14, 'Erlito Tancontian', 'DICT MC3', 'ARD office', 'Assistant Regional Director', '09177025809', 0, 3, 'erlito.tancontian@dict.gov.ph', '2022-02-15 17:16:07', '$2y$10$dE3KcVJ/Z3xYyGnJ1KQnn.kpAOMeDsWzSR/ISVO1RypMmnAi2ZpJC', NULL, '2022-02-23 20:50:11', '2022-03-30 00:11:04'),
(15, 'Alimbzar P. Asum', 'DICT XI', 'RD Office', 'Regional Director', '09209450350', 0, 3, 'alimbzar.asum@dict.gov.ph', '2022-02-15 17:16:07', '$2y$10$vIIYqQ6YjgoBttLeFa6o2uSRlgn/LpOBV.1dkPHwbc/Lr92CDkHva', NULL, '2022-02-23 22:20:10', '2022-03-30 00:10:29'),
(16, 'Jose Benjamin Valencia', 'DICT MC3', 'TOD', 'ITO II', '09328896207', 0, 2, 'jbenjamin.valencia@dict.gov.ph', '2022-02-15 17:16:07', '$2y$10$B7CQys4mIcUeCaaangZdf.rO7p4ne68ebEErwmYprUpJfmY5lDNOS', NULL, '2022-02-23 23:24:36', '2022-03-13 20:37:34'),
(17, 'Eduardo Tuquib', 'DICT MC3', 'TOD', 'ITO II', '0943709882', 0, 2, 'eduard.tuquib@dict.gov.ph', '2022-02-15 17:16:07', '$2y$10$pHLwYJ9XIf5XM.4S6TbJeeon25K5Jo2mYmvWEhEqmHYCh8YUcUo0q', NULL, '2022-02-23 23:49:39', '2022-03-13 20:37:47'),
(18, 'JAy', 'DILG', 'CYBERCRIME', 'NA', '911', 0, 2, 'test@gmail.com', '2022-02-15 17:16:07', '$2y$10$vmZGsmx52ANMgXlHH9fW2uHnc2cO4PijgdCnpsJKDiIEpWavaVzWq', NULL, '2022-03-01 20:01:23', '2022-03-13 20:38:16'),
(19, 'LUCY HUMUAD', 'DICT', 'TOD', 'ISA 1', '0909090900', 0, 2, 'lucky.humuad@gmail.com', '2022-02-15 17:16:07', '$2y$10$r87IILkWHZzCFQtbKs3YLeh8tPPWqm6o2uVGCBDPvBFytzUzPhRxK', NULL, '2022-03-01 23:24:51', '2022-03-13 20:38:47'),
(20, 'JASON CASTRO', 'DICT', 'TOD', 'ISA', '09393939393', 0, 5, 'deathkeeperk@yahoo.com', '2022-02-15 17:16:07', '$2y$10$SPZQvdbOakcyhEVoc0n9nOkeqve.NYwp0m2CbZZj.OhZedwfHeSqO', NULL, '2022-03-13 18:02:33', '2022-03-20 21:47:20'),
(23, 'JSCEON', 'DICT', 'TOD', 'ISA I', '098888888', 0, 4, 'jsceon@gmail.com', '2022-03-13 22:23:32', '$2y$10$n1jJk9ih8iMFYSBi/Oa32eA33bAp80Xqox6cFGqq9ZP.jzOTVv9Aa', NULL, '2022-03-13 22:21:48', '2022-03-24 14:28:21'),
(24, 'Vien', 'DICT', 'TOD', 'ISA I', '09761706085', 0, 1, 'viencc01@gmail.com', '2022-03-29 09:09:50', '$2y$10$IPDPWuJQRP603lG.yREfpejcMS7DVgQ16G7.tY7kV6nB8fnjCsz2y', NULL, '2022-03-29 09:05:29', '2022-03-29 09:10:24'),
(25, 'Janet Arlene Soliman', 'DICT', 'ADMIN', 'Chief Admin', '09874569321', 1, 2, 'jing.soliman@dict.gov.ph', NULL, '$2y$10$SBXklreOOtPx1AFdKGe78uc6CA2katCX859n1L2YJQMGDZ2icpVPe', NULL, '2022-03-30 00:12:02', '2022-03-30 00:12:02');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `activities`
--
ALTER TABLE `activities`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `activity_attendances`
--
ALTER TABLE `activity_attendances`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `activity_expenses`
--
ALTER TABLE `activity_expenses`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `evidences`
--
ALTER TABLE `evidences`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Indexes for table `images`
--
ALTER TABLE `images`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `log_activities`
--
ALTER TABLE `log_activities`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `one_time_passwords`
--
ALTER TABLE `one_time_passwords`
  ADD PRIMARY KEY (`otpid`);

--
-- Indexes for table `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Indexes for table `permissions`
--
ALTER TABLE `permissions`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  ADD KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`);

--
-- Indexes for table `programs`
--
ALTER TABLE `programs`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `roles`
--
ALTER TABLE `roles`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `role_permissions`
--
ALTER TABLE `role_permissions`
  ADD KEY `role_permissions_role_id_foreign` (`role_id`),
  ADD KEY `role_permissions_permission_id_foreign` (`permission_id`);

--
-- Indexes for table `task_assignments`
--
ALTER TABLE `task_assignments`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `task_resolutions`
--
ALTER TABLE `task_resolutions`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `todos`
--
ALTER TABLE `todos`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`),
  ADD KEY `role_id` (`role_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `activities`
--
ALTER TABLE `activities`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `activity_attendances`
--
ALTER TABLE `activity_attendances`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT for table `activity_expenses`
--
ALTER TABLE `activity_expenses`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `evidences`
--
ALTER TABLE `evidences`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `images`
--
ALTER TABLE `images`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `log_activities`
--
ALTER TABLE `log_activities`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=372;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `one_time_passwords`
--
ALTER TABLE `one_time_passwords`
  MODIFY `otpid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `permissions`
--
ALTER TABLE `permissions`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=32;

--
-- AUTO_INCREMENT for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `programs`
--
ALTER TABLE `programs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `roles`
--
ALTER TABLE `roles`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `task_assignments`
--
ALTER TABLE `task_assignments`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=46;

--
-- AUTO_INCREMENT for table `task_resolutions`
--
ALTER TABLE `task_resolutions`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=85;

--
-- AUTO_INCREMENT for table `todos`
--
ALTER TABLE `todos`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

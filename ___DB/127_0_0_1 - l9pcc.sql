-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 21, 2022 at 04:28 PM
-- Server version: 10.4.22-MariaDB
-- PHP Version: 8.1.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `l9pcc`
--
CREATE DATABASE IF NOT EXISTS `l9pcc` DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci;
USE `l9pcc`;

-- --------------------------------------------------------

--
-- Table structure for table `carousels`
--

CREATE TABLE `carousels` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `blob` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` tinyint(1) NOT NULL DEFAULT 1,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `carousels`
--

INSERT INTO `carousels` (`id`, `title`, `description`, `blob`, `status`, `created_at`, `updated_at`) VALUES
(8, 'Slide 01', 'PCC Slide 01', '20220713_114248_29c1cbcbb338ef73ef5291bf9c30c16419314ef5.png', 1, '2022-07-13 06:12:48', '2022-07-16 08:25:36');

-- --------------------------------------------------------

--
-- Table structure for table `center_details`
--

CREATE TABLE `center_details` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `center_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` tinyint(1) NOT NULL DEFAULT 0,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `center_details`
--

INSERT INTO `center_details` (`id`, `center_name`, `status`, `created_at`, `updated_at`) VALUES
(5, 'ABC', 1, '2022-07-16 08:24:48', '2022-07-18 00:58:22');

-- --------------------------------------------------------

--
-- Table structure for table `city_details`
--

CREATE TABLE `city_details` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `city_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` tinyint(1) NOT NULL DEFAULT 1,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `city_details`
--

INSERT INTO `city_details` (`id`, `city_name`, `status`, `created_at`, `updated_at`) VALUES
(5, 'Veraval', 1, '2022-07-16 08:25:11', '2022-07-16 08:25:11'),
(6, 'Rajkot', 1, '2022-07-16 08:25:17', '2022-07-16 08:25:17'),
(7, 'Porbandar', 1, '2022-07-16 08:25:21', '2022-07-16 08:25:21');

-- --------------------------------------------------------

--
-- Table structure for table `contacts`
--

CREATE TABLE `contacts` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `fullname` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(200) COLLATE utf8mb4_unicode_ci NOT NULL,
  `phone` varchar(15) COLLATE utf8mb4_unicode_ci NOT NULL,
  `subject` varchar(200) COLLATE utf8mb4_unicode_ci NOT NULL,
  `message` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `contacts`
--

INSERT INTO `contacts` (`id`, `fullname`, `email`, `phone`, `subject`, `message`, `created_at`, `updated_at`) VALUES
(5, 'Mehul Dhokia', 'mehuldhokia@gmail.com', '9033903457', 'Today\'s Quote', 'Never give up. Today is hard, tomorrow will be worse, but the day after tomorrow will be sunshine.', '2022-07-15 12:40:04', '2022-07-15 12:40:04');

-- --------------------------------------------------------

--
-- Table structure for table `courses`
--

CREATE TABLE `courses` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `amount` decimal(10,2) NOT NULL,
  `course_code` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `qualification` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `duration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `blob` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` tinyint(1) NOT NULL DEFAULT 1,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `courses`
--

INSERT INTO `courses` (`id`, `title`, `description`, `amount`, `course_code`, `qualification`, `duration`, `blob`, `status`, `created_at`, `updated_at`) VALUES
(2, 'Post Graduate Diploma in Computer Application', '<div><strong>Semester-1</strong></div>\r\n\r\n<ul>\r\n	<li>Computer Fundamental</li>\r\n	<li>MS-Dos</li>\r\n	<li>Windows Operating System</li>\r\n	<li>MS-Office</li>\r\n	<li>MS-Word</li>\r\n	<li>MS-Excel</li>\r\n	<li>MS-Power Point</li>\r\n	<li>MS-Access</li>\r\n	<li>MS-Outlook</li>\r\n	<li>MS-OneNote</li>\r\n</ul>\r\n\r\n<div><strong>Semester-2</strong></div>\r\n\r\n<ul>\r\n	<li>\r\n	<div>DTP-Course</div>\r\n	</li>\r\n	<li>\r\n	<div>Adobe PageMaker</div>\r\n	</li>\r\n	<li>\r\n	<div>CorelDRAW</div>\r\n	</li>\r\n	<li>\r\n	<div>Adobe Photoshop</div>\r\n	</li>\r\n	<li>\r\n	<div>Flash</div>\r\n	</li>\r\n	<li>\r\n	<div>Movie Maker</div>\r\n	</li>\r\n</ul>\r\n\r\n<div><strong>Semester-3</strong></div>\r\n\r\n<ul>\r\n	<li>\r\n	<div>FoxPro (DBMS)</div>\r\n	</li>\r\n	<li>\r\n	<div>Accounting Package (Tally)</div>\r\n	</li>\r\n	<li>\r\n	<div>HTML</div>\r\n	</li>\r\n</ul>\r\n\r\n<div><strong>Semester-4</strong></div>\r\n\r\n<ul>\r\n	<li>\r\n	<div>C Programming</div>\r\n	</li>\r\n	<li>\r\n	<div>Visual Basic</div>\r\n	</li>\r\n	<li>\r\n	<div>Introduction of Internet</div>\r\n	</li>\r\n</ul>\r\n\r\n<p>(For Post Graduate Diploma the minimum qualification is graduate otherwise the student will get DCA Diploma)</p>', '2342.00', 'PGDCA', 'Graduation', '4 Years', '20220714_103421_The-Potential-of-The-IoT-in-Education-610x458.jpg', 1, '2022-07-14 04:42:57', '2022-07-14 06:38:06');

-- --------------------------------------------------------

--
-- Table structure for table `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `uuid` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `connection` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT current_timestamp()
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
(2, '2014_10_12_100000_create_password_resets_table', 1),
(3, '2019_08_19_000000_create_failed_jobs_table', 1),
(4, '2019_12_14_000001_create_personal_access_tokens_table', 1),
(5, '2022_06_15_105445_create_permission_tables', 1),
(14, '2022_07_13_100047_create_carousels_table', 2),
(15, '2022_07_13_124038_create_courses_table', 3),
(16, '2022_07_14_121307_create_center_details_table', 4),
(17, '2022_07_14_121712_create_city_details_table', 4),
(21, '2022_07_15_044051_create_contacts_table', 5),
(23, '2022_07_18_092512_create_qualifications_table', 7),
(27, '2022_07_18_171347_create_photos_table', 8),
(28, '2022_07_18_182740_create_videos_table', 8),
(29, '2022_07_18_092900_create_register_users_table', 9);

-- --------------------------------------------------------

--
-- Table structure for table `model_has_permissions`
--

CREATE TABLE `model_has_permissions` (
  `permission_id` bigint(20) UNSIGNED NOT NULL,
  `model_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `model_id` bigint(20) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `model_has_roles`
--

CREATE TABLE `model_has_roles` (
  `role_id` bigint(20) UNSIGNED NOT NULL,
  `model_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `model_id` bigint(20) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `model_has_roles`
--

INSERT INTO `model_has_roles` (`role_id`, `model_type`, `model_id`) VALUES
(1, 'App\\Models\\User', 1);

-- --------------------------------------------------------

--
-- Table structure for table `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `permissions`
--

CREATE TABLE `permissions` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `guard_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `permissions`
--

INSERT INTO `permissions` (`id`, `name`, `guard_name`, `created_at`, `updated_at`) VALUES
(1, 'user-create', 'web', '2022-07-11 22:51:20', '2022-07-11 22:51:20'),
(2, 'user-read', 'web', '2022-07-11 22:51:20', '2022-07-11 22:51:20'),
(3, 'user-update', 'web', '2022-07-11 22:51:20', '2022-07-11 22:51:20'),
(4, 'user-delete', 'web', '2022-07-11 22:51:20', '2022-07-11 22:51:20'),
(5, 'user-trash', 'web', '2022-07-11 22:51:20', '2022-07-11 22:51:20'),
(6, 'user-restore', 'web', '2022-07-11 22:51:20', '2022-07-11 22:51:20'),
(7, 'user-truncate', 'web', '2022-07-11 22:51:20', '2022-07-11 22:51:20'),
(8, 'role-create', 'web', '2022-07-11 22:51:20', '2022-07-11 22:51:20'),
(9, 'role-read', 'web', '2022-07-11 22:51:20', '2022-07-11 22:51:20'),
(10, 'role-update', 'web', '2022-07-11 22:51:20', '2022-07-11 22:51:20'),
(11, 'role-delete', 'web', '2022-07-11 22:51:20', '2022-07-11 22:51:20'),
(12, 'carousel-create', 'web', '2022-07-13 04:56:12', '2022-07-13 04:56:12'),
(13, 'carousel-read', 'web', '2022-07-13 04:56:18', '2022-07-13 04:56:18'),
(14, 'carousel-update', 'web', '2022-07-13 04:56:25', '2022-07-13 04:56:25'),
(15, 'carousel-delete', 'web', '2022-07-13 04:56:34', '2022-07-13 04:56:34'),
(16, 'course-create', 'web', '2022-07-13 07:36:45', '2022-07-13 07:36:45'),
(17, 'course-read', 'web', '2022-07-13 07:36:51', '2022-07-13 07:36:51'),
(18, 'course-update', 'web', '2022-07-13 07:36:57', '2022-07-13 07:36:57'),
(19, 'course-delete', 'web', '2022-07-13 07:37:05', '2022-07-13 07:37:05'),
(20, 'center-create', 'web', '2022-07-14 07:30:41', '2022-07-14 07:30:41'),
(21, 'center-read', 'web', '2022-07-14 07:30:50', '2022-07-14 07:30:50'),
(22, 'center-update', 'web', '2022-07-14 07:30:57', '2022-07-14 07:30:57'),
(23, 'center-delete', 'web', '2022-07-14 07:31:05', '2022-07-14 07:31:05'),
(24, 'city-create', 'web', '2022-07-14 08:23:07', '2022-07-14 08:23:07'),
(25, 'city-read', 'web', '2022-07-14 08:23:24', '2022-07-14 08:23:24'),
(26, 'city-update', 'web', '2022-07-14 08:23:28', '2022-07-14 08:23:28'),
(27, 'city-delete', 'web', '2022-07-14 08:23:34', '2022-07-14 08:23:34'),
(28, 'contact-create', 'web', '2022-07-14 23:45:20', '2022-07-14 23:45:20'),
(29, 'contact-read', 'web', '2022-07-14 23:45:27', '2022-07-14 23:45:27'),
(30, 'contact-update', 'web', '2022-07-14 23:45:41', '2022-07-14 23:45:41'),
(31, 'contact-delete', 'web', '2022-07-14 23:45:47', '2022-07-14 23:45:47'),
(32, 'qualification-create', 'web', '2022-07-18 00:27:24', '2022-07-18 00:27:24'),
(33, 'qualification-read', 'web', '2022-07-18 00:27:30', '2022-07-18 00:27:30'),
(34, 'qualification-update', 'web', '2022-07-18 00:27:37', '2022-07-18 00:27:37'),
(35, 'qualification-delete', 'web', '2022-07-18 00:27:47', '2022-07-18 00:27:47'),
(36, 'photo-create', 'web', '2022-07-18 07:18:33', '2022-07-18 07:18:33'),
(37, 'photo-read', 'web', '2022-07-18 07:18:42', '2022-07-18 07:18:42'),
(38, 'photo-update', 'web', '2022-07-18 07:18:49', '2022-07-18 07:18:49'),
(39, 'photo-delete', 'web', '2022-07-18 07:19:02', '2022-07-18 07:19:02'),
(40, 'video-create', 'web', '2022-07-18 07:19:11', '2022-07-18 07:19:11'),
(41, 'video-read', 'web', '2022-07-18 07:19:17', '2022-07-18 07:19:17'),
(42, 'video-update', 'web', '2022-07-18 07:19:22', '2022-07-18 07:19:22'),
(43, 'video-delete', 'web', '2022-07-18 07:19:34', '2022-07-18 07:19:34'),
(44, 'student-create', 'web', '2022-07-20 07:20:27', '2022-07-20 07:20:27'),
(45, 'student-read', 'web', '2022-07-20 07:20:32', '2022-07-20 07:20:32'),
(46, 'student-update', 'web', '2022-07-20 07:20:44', '2022-07-20 07:20:44'),
(47, 'student-delete', 'web', '2022-07-20 07:20:49', '2022-07-20 07:20:49');

-- --------------------------------------------------------

--
-- Table structure for table `personal_access_tokens`
--

CREATE TABLE `personal_access_tokens` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `tokenable_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tokenable_id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(64) COLLATE utf8mb4_unicode_ci NOT NULL,
  `abilities` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `last_used_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `photos`
--

CREATE TABLE `photos` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `blob` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `description` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` tinyint(1) NOT NULL DEFAULT 1,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `photos`
--

INSERT INTO `photos` (`id`, `blob`, `description`, `status`, `created_at`, `updated_at`) VALUES
(1, 'P_20220720_063541_cover-6.jpg', 'Cover Image', 1, '2022-07-20 01:05:41', '2022-07-20 01:05:41');

-- --------------------------------------------------------

--
-- Table structure for table `qualifications`
--

CREATE TABLE `qualifications` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` tinyint(1) NOT NULL DEFAULT 0,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `qualifications`
--

INSERT INTO `qualifications` (`id`, `name`, `status`, `created_at`, `updated_at`) VALUES
(1, '1st Standard', 1, '2022-07-18 00:24:22', '2022-07-18 00:24:22'),
(2, '2nd Standard', 1, '2022-07-18 00:24:39', '2022-07-18 00:24:39'),
(3, '3rd Standard', 1, '2022-07-18 00:24:49', '2022-07-18 00:24:49'),
(4, '4th Standard', 1, '2022-07-18 00:24:55', '2022-07-18 00:24:55'),
(5, '5th Standard', 1, '2022-07-18 00:25:04', '2022-07-18 00:25:04'),
(6, '6th Standard', 1, '2022-07-18 00:25:12', '2022-07-18 00:25:12'),
(7, '7th Standard', 1, '2022-07-18 00:25:16', '2022-07-18 00:25:16'),
(8, '8th Standard', 1, '2022-07-18 00:25:20', '2022-07-18 00:25:20'),
(9, '9th Standard', 1, '2022-07-18 00:25:25', '2022-07-18 00:25:25'),
(10, '10th Standard', 1, '2022-07-18 00:25:29', '2022-07-18 00:25:29'),
(11, '11th Standard', 1, '2022-07-18 00:25:36', '2022-07-18 00:25:36'),
(12, '12th Standard', 1, '2022-07-18 00:25:43', '2022-07-18 00:25:43'),
(13, 'B.Com', 1, '2022-07-18 00:26:21', '2022-07-18 00:26:21'),
(14, 'M.Com', 1, '2022-07-18 00:26:33', '2022-07-18 00:26:33'),
(15, 'BCA', 1, '2022-07-18 00:26:38', '2022-07-18 00:26:38'),
(16, 'MCA', 1, '2022-07-18 00:26:43', '2022-07-18 00:26:43'),
(17, 'Other', 1, '2022-07-18 00:26:47', '2022-07-18 00:26:47');

-- --------------------------------------------------------

--
-- Table structure for table `register_users`
--

CREATE TABLE `register_users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `fullname` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(190) COLLATE utf8mb4_unicode_ci NOT NULL,
  `city` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `uaddress` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `dob` date NOT NULL,
  `gender` varchar(10) COLLATE utf8mb4_unicode_ci NOT NULL,
  `qualification_id` bigint(20) UNSIGNED DEFAULT NULL,
  `phone` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `whatsappno` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `refer_code` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` tinyint(1) NOT NULL DEFAULT 1,
  `photo` varchar(190) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_date` datetime NOT NULL DEFAULT current_timestamp(),
  `refer_by` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `last_login_date` datetime NOT NULL DEFAULT current_timestamp(),
  `otp` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `user_id` bigint(20) UNSIGNED DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `register_users`
--

INSERT INTO `register_users` (`id`, `fullname`, `email`, `city`, `uaddress`, `dob`, `gender`, `qualification_id`, `phone`, `whatsappno`, `refer_code`, `password`, `status`, `photo`, `created_date`, `refer_by`, `last_login_date`, `otp`, `user_id`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 'Admin', 'admin@gmail.com', 'Veraval', 'Shop no.15, 2nd Floor, Ananddham Complex,\nS.T. Station', '2011-02-23', 'M', 17, '9909094300', '9909094300', 'PCCF00000000', '$2y$10$r7ngwnT4U/TZJUJHnj.wyOUQj0T5wU1vcpLH/RWnOthE89u31iHAW', 1, '20220720_102347_avtar-beard-gray.png', '2022-07-20 00:00:00', NULL, '0000-00-00 00:00:00', NULL, NULL, '2022-07-20 04:53:47', '2022-07-20 23:58:04', NULL),
(2, 'Shailesh K Barad', 'skbarad008@yahoo.com', 'Veraval', 'PCC COMPUTER EDUCATION', '2000-04-22', 'M', 17, '9925453208', '9925453208', 'PCCF00000002', '$2y$10$PE85h2crLfsTActmTja3DuD5QOYjiKey.eCrK2A2G2ytEUGuqJU9q', 1, '20220721_162812_avtar-men-1.png', '2022-07-21 16:28:12', 'PCCF00000000', '2022-07-21 16:28:12', NULL, 1, '2022-07-21 10:58:12', '2022-07-21 05:38:26', NULL),
(3, 'Sufiyan H Rathod', 'sufiyan.rathod82@gmail.com', 'Pune', 'Dapodi', '2001-04-22', 'M', 16, '9764852349', '9764852349', 'PCCF00000003', '$2y$10$PF2LiZSVFZ1EPshUCVl4Pu0R9UzLciF5/InJfHUlg6CuiShSyvAma', 1, '20220721_172430_avtar-beard.png', '2022-07-21 17:24:30', 'PCCF00000000', '2022-07-21 17:24:30', NULL, 1, '2022-07-21 11:54:30', '2022-07-21 11:54:30', NULL),
(4, 'Vadher Shital Naranbhai', 'shitalvadher20@gmail.com', 'Veraval', 'Bhalprara', '1998-05-20', 'F', 15, '9512362101', '9512362101', 'PCCF00000004', '$2y$10$GWAWgt2f16rE4XCuRsL9J.49SBn2..1EJEv/7LW4rIgWRP7lB80Xy', 1, '20220721_174127_avtar-women-1.png', '2022-07-21 17:41:27', 'PCCF00000002', '2022-07-21 19:34:49', NULL, 2, '2022-07-21 12:11:27', '2022-07-21 14:04:49', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `roles`
--

CREATE TABLE `roles` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `guard_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `roles`
--

INSERT INTO `roles` (`id`, `name`, `guard_name`, `created_at`, `updated_at`) VALUES
(1, 'Admin', 'web', '2022-07-11 22:51:20', '2022-07-11 22:51:20'),
(2, 'Franchisor', 'web', '2022-07-16 08:26:55', '2022-07-16 08:26:55'),
(3, 'User', 'web', '2022-07-16 08:27:22', '2022-07-18 00:28:28');

-- --------------------------------------------------------

--
-- Table structure for table `role_has_permissions`
--

CREATE TABLE `role_has_permissions` (
  `permission_id` bigint(20) UNSIGNED NOT NULL,
  `role_id` bigint(20) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `role_has_permissions`
--

INSERT INTO `role_has_permissions` (`permission_id`, `role_id`) VALUES
(1, 1),
(2, 1),
(2, 2),
(2, 3),
(3, 1),
(3, 2),
(3, 3),
(4, 1),
(5, 1),
(6, 1),
(7, 1),
(8, 1),
(9, 1),
(10, 1),
(11, 1),
(12, 1),
(13, 1),
(14, 1),
(15, 1),
(16, 1),
(17, 1),
(17, 2),
(17, 3),
(18, 1),
(19, 1),
(20, 1),
(21, 1),
(21, 3),
(22, 1),
(23, 1),
(24, 1),
(25, 1),
(25, 2),
(25, 3),
(26, 1),
(27, 1),
(28, 1),
(29, 1),
(30, 1),
(31, 1),
(32, 1),
(33, 1),
(33, 2),
(33, 3),
(34, 1),
(35, 1),
(36, 1),
(37, 1),
(37, 2),
(38, 1),
(39, 1),
(40, 1),
(41, 1),
(41, 2),
(42, 1),
(43, 1),
(44, 1),
(44, 2),
(45, 1),
(45, 2),
(46, 1),
(46, 2),
(47, 1),
(47, 2);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `photo` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(190) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `phone` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `otp` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `verified` tinyint(1) NOT NULL DEFAULT 0,
  `status` tinyint(1) NOT NULL DEFAULT 1,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `photo`, `name`, `email`, `email_verified_at`, `phone`, `otp`, `password`, `verified`, `status`, `remember_token`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, NULL, 'Vaistra Technologies', 'mehuldhokia@gmail.com', '2022-07-11 22:51:20', '9876543210', NULL, '$2y$10$2oyuVox04.IgJh2/K/Xm6u/nw7CaR39wPQheiKWkiO0XHI/yk2NZm', 0, 1, 'XeCqE6vdA1aKPEiLgJckrs38DBT3FwVnFd7vL6mksNAJ5ClGpVtj9JKCnVVH', '2022-07-11 22:51:20', '2022-07-15 07:10:38', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `videos`
--

CREATE TABLE `videos` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `url` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `blob` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` tinyint(1) NOT NULL DEFAULT 1,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `videos`
--

INSERT INTO `videos` (`id`, `title`, `url`, `blob`, `status`, `created_at`, `updated_at`) VALUES
(2, 'Thai Good Stories Recomposition', 'https://youtu.be/CvSuUyP0Qs8', 'V_20220720_064101_profile.png', 1, '2022-07-20 01:11:01', '2022-07-20 01:12:22'),
(3, 'Advertisement', 'https://youtu.be/czVz47n8X_0', 'V_20220720_064726_adv.png', 1, '2022-07-20 01:17:26', '2022-07-20 01:17:26'),
(4, 'ABC', 'https://youtu.be/PwMMspgYkUY', 'V_20220720_110019_img-7.jpg', 1, '2022-07-20 01:19:18', '2022-07-20 05:30:19');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `carousels`
--
ALTER TABLE `carousels`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `center_details`
--
ALTER TABLE `center_details`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `city_details`
--
ALTER TABLE `city_details`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `contacts`
--
ALTER TABLE `contacts`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `courses`
--
ALTER TABLE `courses`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `model_has_permissions`
--
ALTER TABLE `model_has_permissions`
  ADD PRIMARY KEY (`permission_id`,`model_id`,`model_type`),
  ADD KEY `model_has_permissions_model_id_model_type_index` (`model_id`,`model_type`);

--
-- Indexes for table `model_has_roles`
--
ALTER TABLE `model_has_roles`
  ADD PRIMARY KEY (`role_id`,`model_id`,`model_type`),
  ADD KEY `model_has_roles_model_id_model_type_index` (`model_id`,`model_type`);

--
-- Indexes for table `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Indexes for table `permissions`
--
ALTER TABLE `permissions`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `permissions_name_guard_name_unique` (`name`,`guard_name`);

--
-- Indexes for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  ADD KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`);

--
-- Indexes for table `photos`
--
ALTER TABLE `photos`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `qualifications`
--
ALTER TABLE `qualifications`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `register_users`
--
ALTER TABLE `register_users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `register_users_photo_unique` (`photo`),
  ADD KEY `register_users_user_id_foreign` (`user_id`),
  ADD KEY `register_users_qualification_id_foreign` (`qualification_id`);

--
-- Indexes for table `roles`
--
ALTER TABLE `roles`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `roles_name_guard_name_unique` (`name`,`guard_name`);

--
-- Indexes for table `role_has_permissions`
--
ALTER TABLE `role_has_permissions`
  ADD PRIMARY KEY (`permission_id`,`role_id`),
  ADD KEY `role_has_permissions_role_id_foreign` (`role_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- Indexes for table `videos`
--
ALTER TABLE `videos`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `carousels`
--
ALTER TABLE `carousels`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `center_details`
--
ALTER TABLE `center_details`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `city_details`
--
ALTER TABLE `city_details`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `contacts`
--
ALTER TABLE `contacts`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `courses`
--
ALTER TABLE `courses`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=30;

--
-- AUTO_INCREMENT for table `permissions`
--
ALTER TABLE `permissions`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=48;

--
-- AUTO_INCREMENT for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `photos`
--
ALTER TABLE `photos`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `qualifications`
--
ALTER TABLE `qualifications`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `register_users`
--
ALTER TABLE `register_users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `roles`
--
ALTER TABLE `roles`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `videos`
--
ALTER TABLE `videos`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `model_has_permissions`
--
ALTER TABLE `model_has_permissions`
  ADD CONSTRAINT `model_has_permissions_permission_id_foreign` FOREIGN KEY (`permission_id`) REFERENCES `permissions` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `model_has_roles`
--
ALTER TABLE `model_has_roles`
  ADD CONSTRAINT `model_has_roles_role_id_foreign` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `register_users`
--
ALTER TABLE `register_users`
  ADD CONSTRAINT `register_users_qualification_id_foreign` FOREIGN KEY (`qualification_id`) REFERENCES `qualifications` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `register_users_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `register_users` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `role_has_permissions`
--
ALTER TABLE `role_has_permissions`
  ADD CONSTRAINT `role_has_permissions_permission_id_foreign` FOREIGN KEY (`permission_id`) REFERENCES `permissions` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `role_has_permissions_role_id_foreign` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

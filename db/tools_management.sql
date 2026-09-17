-- phpMyAdmin SQL Dump
-- version 5.2.3
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Sep 17, 2026 at 12:05 PM
-- Server version: 8.4.7
-- PHP Version: 8.3.28

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `tools_management`
--

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

DROP TABLE IF EXISTS `migrations`;
CREATE TABLE IF NOT EXISTS `migrations` (
  `id` int UNSIGNED NOT NULL AUTO_INCREMENT,
  `migration` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2026_09_06_131723_create_users_table', 1),
(2, '2026_09_17_085813_create_tools_table', 1),
(3, '2026_09_17_085909_create_tool_issues_table', 1);

-- --------------------------------------------------------

--
-- Table structure for table `tools`
--

DROP TABLE IF EXISTS `tools`;
CREATE TABLE IF NOT EXISTS `tools` (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `tool_name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `category` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `image` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `quantity` int UNSIGNED NOT NULL DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `tools`
--

INSERT INTO `tools` (`id`, `tool_name`, `category`, `image`, `quantity`, `created_at`, `updated_at`) VALUES
(1, 'Hammmer', 'Hammer', '1789643507_download.jpg', 16, '2026-09-17 05:41:47', '2026-09-17 05:51:17'),
(2, 'Screw', 'Screwdriver', '1789644063_download1.png', 20, '2026-09-17 05:51:03', '2026-09-17 06:29:25'),
(3, 'Plier', 'Plier', '1789645791_imaplierges.jpg', 100, '2026-09-17 06:19:51', '2026-09-17 06:29:35'),
(4, 'Wrench', 'Wrench', '1789645820_wrench.jpg', 10, '2026-09-17 06:20:20', '2026-09-17 06:20:20');

-- --------------------------------------------------------

--
-- Table structure for table `tool_issues`
--

DROP TABLE IF EXISTS `tool_issues`;
CREATE TABLE IF NOT EXISTS `tool_issues` (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `user_id` bigint UNSIGNED NOT NULL,
  `tool_id` bigint UNSIGNED NOT NULL,
  `quantity` int UNSIGNED NOT NULL,
  `issue_date` datetime NOT NULL,
  `return_date` datetime DEFAULT NULL,
  `status` enum('issued','returned') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'issued',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `tool_issues_user_id_foreign` (`user_id`),
  KEY `tool_issues_tool_id_foreign` (`tool_id`)
) ENGINE=MyISAM AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `tool_issues`
--

INSERT INTO `tool_issues` (`id`, `user_id`, `tool_id`, `quantity`, `issue_date`, `return_date`, `status`, `created_at`, `updated_at`) VALUES
(1, 2, 1, 1, '2026-09-17 11:14:17', '2026-09-17 11:14:29', 'returned', '2026-09-17 05:44:17', '2026-09-17 05:44:29'),
(2, 2, 1, 1, '2026-09-17 11:15:49', '2026-09-17 11:16:16', 'returned', '2026-09-17 05:45:49', '2026-09-17 05:46:16'),
(3, 2, 2, 1, '2026-09-17 11:35:05', '2026-09-17 11:35:14', 'returned', '2026-09-17 06:05:05', '2026-09-17 06:05:14'),
(4, 2, 3, 1, '2026-09-17 11:50:49', '2026-09-17 11:59:35', 'returned', '2026-09-17 06:20:49', '2026-09-17 06:29:35'),
(5, 2, 2, 1, '2026-09-17 11:50:52', '2026-09-17 11:59:25', 'returned', '2026-09-17 06:20:52', '2026-09-17 06:29:25');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

DROP TABLE IF EXISTS `users`;
CREATE TABLE IF NOT EXISTS `users` (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `mobile` varchar(10) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `picture` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `mechanic_level` enum('Expert','Medium','New Recruit','Trainee') COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `role` enum('admin','mechanic') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'mechanic',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `users_email_unique` (`email`),
  UNIQUE KEY `users_mobile_unique` (`mobile`)
) ENGINE=MyISAM AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `mobile`, `password`, `picture`, `mechanic_level`, `role`, `created_at`, `updated_at`) VALUES
(1, 'Admin', 'admin@gmail.com', '9999999999', '$2y$12$GyDQWCoXSmR82ZXHC.TB9eg3gv4hwXSVhNKNewVGHK0yG9ttwR/6W', NULL, NULL, 'admin', '2026-09-17 05:40:35', '2026-09-17 05:40:35'),
(2, 'gyan', 'gyan@gmail.com', '8927058666', '$2y$12$rd.VGNMBUWR5yNdgHCKZYuuqUhldq5bLdl4vTTjf/aJktwq/Ule2i', '1789643621_07c93bef55c9e2e7169e7297e3e24f10.jpg', 'Expert', 'mechanic', '2026-09-17 05:43:42', '2026-09-17 05:43:42'),
(3, 'test', 'test@gmail.com', '8957058666', '$2y$12$JtpdrNQIKeYCZhuZQ7rb/ORXTCjECjRp5ULf/ATh3qVWdaURKvLTK', '1789644987_30kbsign.jpeg', 'Trainee', 'mechanic', '2026-09-17 06:06:27', '2026-09-17 06:06:27');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

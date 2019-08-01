-- phpMyAdmin SQL Dump
-- version 4.6.6deb5
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Aug 01, 2019 at 03:46 PM
-- Server version: 5.7.25-0ubuntu0.18.04.2
-- PHP Version: 7.2.15-0ubuntu0.18.04.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `dave`
--

-- --------------------------------------------------------

--
-- Table structure for table `claims`
--

CREATE TABLE `claims` (
  `id` int(10) UNSIGNED NOT NULL,
  `user_id` int(10) UNSIGNED NOT NULL,
  `director` int(11) NOT NULL,
  `finance` int(11) NOT NULL,
  `dep_admin` int(11) NOT NULL,
  `dean` int(11) NOT NULL,
  `semester` int(11) NOT NULL,
  `year` year(4) NOT NULL,
  `faculty_id` int(11) NOT NULL,
  `department_id` int(11) NOT NULL,
  `department_admin_id` int(11) NOT NULL,
  `service` int(11) NOT NULL,
  `bank` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `acc_no` bigint(20) NOT NULL,
  `total` double UNSIGNED DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `claims`
--

INSERT INTO `claims` (`id`, `user_id`, `director`, `finance`, `dep_admin`, `dean`, `semester`, `year`, `faculty_id`, `department_id`, `department_admin_id`, `service`, `bank`, `acc_no`, `total`, `created_at`, `updated_at`) VALUES
(1, 3, 1, 1, 1, 1, 1, 2019, 1, 1, 2, 1, 'NationalBank', 1222222223, 1476, '2019-07-28 06:51:14', '2019-07-28 13:34:29'),
(2, 3, 0, 0, 0, 0, 1, 2019, 2, 1, 2, 1, 'NationalBank', 929299928, 56356, '2019-08-01 09:52:24', '2019-08-01 09:52:24'),
(4, 7, 1, 1, 1, 1, 1, 2018, 1, 1, 2, 1, 'Equity', 12345, 26790, '2019-08-01 10:15:41', '2019-08-01 10:19:49');

-- --------------------------------------------------------

--
-- Table structure for table `claim_amounts`
--

CREATE TABLE `claim_amounts` (
  `id` int(10) UNSIGNED NOT NULL,
  `unit_id` int(11) NOT NULL,
  `claim_id` int(11) NOT NULL,
  `service` double UNSIGNED DEFAULT NULL,
  `marking` double UNSIGNED DEFAULT NULL,
  `transport` double UNSIGNED DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `claim_amounts`
--

INSERT INTO `claim_amounts` (`id`, `unit_id`, `claim_id`, `service`, `marking`, `transport`, `created_at`, `updated_at`) VALUES
(1, 1, 1, 1234, 121, 121, '2019-07-28 06:51:14', '2019-07-28 06:51:14'),
(2, 1, 2, 1000, 5000, 123, '2019-08-01 09:52:24', '2019-08-01 09:52:24'),
(3, 2, 2, 100, 50010, 123, '2019-08-01 09:52:24', '2019-08-01 09:52:24'),
(4, 1, 3, 10000, 2344, 21321, '2019-08-01 10:08:54', '2019-08-01 10:08:54'),
(5, 1, 4, 2435, 12232, 12123, '2019-08-01 10:15:41', '2019-08-01 10:15:41');

-- --------------------------------------------------------

--
-- Table structure for table `departments`
--

CREATE TABLE `departments` (
  `id` int(10) UNSIGNED NOT NULL,
  `department_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `faculty_id` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `departments`
--

INSERT INTO `departments` (`id`, `department_name`, `faculty_id`, `created_at`, `updated_at`) VALUES
(1, 'Information Technology', 1, NULL, NULL),
(2, 'HRD', 2, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `faculties`
--

CREATE TABLE `faculties` (
  `id` int(10) UNSIGNED NOT NULL,
  `faculty_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `faculties`
--

INSERT INTO `faculties` (`id`, `faculty_name`, `created_at`, `updated_at`) VALUES
(1, 'SCIT', NULL, NULL),
(2, 'COHRED', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `messages`
--

CREATE TABLE `messages` (
  `id` int(10) UNSIGNED NOT NULL,
  `status_id` int(11) NOT NULL,
  `claim_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `role_id` int(11) NOT NULL,
  `message` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `department_id` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `messages`
--

INSERT INTO `messages` (`id`, `status_id`, `claim_id`, `user_id`, `role_id`, `message`, `department_id`, `created_at`, `updated_at`) VALUES
(3, 1, 1, 2, 2, 'You didnt Teach', 1, '2019-07-28 07:17:54', '2019-07-28 07:17:54'),
(4, 2, 1, 5, 3, 'Sorry I havent Seen you', 1, '2019-07-28 07:39:17', '2019-07-28 07:39:17'),
(5, 5, 1, 6, 4, 'sorry baba', 0, '2019-07-28 09:40:22', '2019-07-28 09:40:22');

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
(107, '2019_06_21_115415_create_statuses_table', 1),
(204, '2014_10_12_000000_create_users_table', 2),
(205, '2014_10_12_100000_create_password_resets_table', 2),
(206, '2019_06_20_182143_create_roles_table', 2),
(207, '2019_06_20_231155_create_uploads_table', 2),
(208, '2019_06_20_232359_create_claims_table', 2),
(209, '2019_06_21_080157_create_departments_table', 2),
(210, '2019_06_21_082401_create_faculties_table', 2),
(211, '2019_06_21_103452_create_units_table', 2),
(212, '2019_06_21_111545_create_claim_amounts_table', 2),
(213, '2019_06_21_120339_create_messages_table', 2),
(214, '2019_07_06_105059_create_vouchers_table', 2);

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
-- Table structure for table `roles`
--

CREATE TABLE `roles` (
  `id` int(10) UNSIGNED NOT NULL,
  `role_id` int(11) NOT NULL,
  `role_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `roles`
--

INSERT INTO `roles` (`id`, `role_id`, `role_name`, `created_at`, `updated_at`) VALUES
(1, 1, 'System Admin', NULL, NULL),
(2, 2, 'Chairman', NULL, NULL),
(3, 3, 'Director', NULL, NULL),
(4, 4, 'Dean', NULL, NULL),
(5, 5, 'Finance', NULL, NULL),
(6, 6, 'User', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `statuses`
--

CREATE TABLE `statuses` (
  `id` int(10) UNSIGNED NOT NULL,
  `user_id` int(11) NOT NULL,
  `claim_id` int(11) NOT NULL,
  `finance` tinyint(1) NOT NULL,
  `dep_admin` tinyint(1) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `statuses`
--

INSERT INTO `statuses` (`id`, `user_id`, `claim_id`, `finance`, `dep_admin`, `created_at`, `updated_at`) VALUES
(1, 1, 1, 0, 1, '2019-06-22 12:22:44', '2019-06-22 12:22:44'),
(2, 4, 2, 0, 0, '2019-06-22 12:22:44', '2019-06-22 12:22:44'),
(3, 6, 3, 0, 0, '2019-06-22 12:22:44', '2019-06-22 12:22:44'),
(4, 8, 4, 1, 0, '2019-06-22 12:22:44', '2019-06-22 12:22:44'),
(5, 10, 5, 0, 0, '2019-06-22 12:22:45', '2019-06-22 12:22:45'),
(6, 12, 6, 0, 0, '2019-06-22 12:22:45', '2019-06-22 12:22:45'),
(7, 14, 7, 0, 0, '2019-06-22 12:22:45', '2019-06-22 12:22:45'),
(8, 16, 8, 1, 0, '2019-06-22 12:22:45', '2019-06-22 12:22:45'),
(9, 17, 9, 0, 1, '2019-06-22 12:22:45', '2019-06-22 12:22:45');

-- --------------------------------------------------------

--
-- Table structure for table `units`
--

CREATE TABLE `units` (
  `id` int(10) UNSIGNED NOT NULL,
  `unit_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `department_id` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `units`
--

INSERT INTO `units` (`id`, `unit_name`, `department_id`, `created_at`, `updated_at`) VALUES
(1, 'Computerized Accounting', 1, '2019-07-28 07:00:00', '2019-07-28 07:00:00'),
(2, 'Bussiness Management', 2, '2019-07-28 07:00:00', '2019-07-28 07:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `uploads`
--

CREATE TABLE `uploads` (
  `id` int(10) UNSIGNED NOT NULL,
  `user_id` int(11) NOT NULL,
  `claim_id` int(11) NOT NULL,
  `upload` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `uploads`
--

INSERT INTO `uploads` (`id`, `user_id`, `claim_id`, `upload`, `created_at`, `updated_at`) VALUES
(1, 3, 1, '156430747411_chapter 2.pdf', '2019-07-28 06:51:14', '2019-07-28 06:51:14'),
(2, 3, 2, '1564663944bowlschatappusermanual.pdf', '2019-08-01 09:52:25', '2019-08-01 09:52:25'),
(3, 7, 3, '1564664934dan documentation_1.docx', '2019-08-01 10:08:54', '2019-08-01 10:08:54'),
(4, 7, 4, '1564665341dan documentation_1.docx', '2019-08-01 10:15:41', '2019-08-01 10:15:41');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(10) UNSIGNED NOT NULL,
  `role_id` int(11) NOT NULL,
  `fname` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `lname` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `department_id` int(11) DEFAULT NULL,
  `faculty_id` int(11) DEFAULT NULL,
  `pf_no` int(11) NOT NULL,
  `id_no` int(11) NOT NULL,
  `path` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `role_id`, `fname`, `lname`, `department_id`, `faculty_id`, `pf_no`, `id_no`, `path`, `email`, `email_verified_at`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 1, 'Mark', 'Mathenge', 1, 1, 12345, 29182785, 'avatar.png', 'mark@gmail.com', NULL, '$2y$10$X/5ZN8sHKNwmrcc3DMu2HO99tD0n4/8dLsRuaWXglMue7Z0CNZwk6', NULL, '2019-07-28 06:42:00', '2019-07-28 06:42:00'),
(2, 2, 'David', 'Njuguna', 1, 1, 1234, 1234, 'avatar.png', 'chairman@gmail.com', NULL, '$2y$10$WsRQz/WJIxt35fetu.pMoOCmf7SKPIcvnfdQQd1RVDKg23K57Qcj2', NULL, '2019-07-28 06:42:00', '2019-07-28 06:42:00'),
(3, 6, 'Kelly', 'Koome', 1, 1, 12345, 12345, 'avatar.png', 'kelly@gmail.com', NULL, '$2y$10$QJM3NwA.mNJXAg1VIH5xNuQvyldwrvYM.P2eTNMfDed73BynOlzdm', NULL, '2019-07-28 06:43:23', '2019-07-28 06:43:23'),
(4, 5, 'Finance', 'Mathenge', 0, 0, 12345, 29182785, 'avatar.png', 'finance@gmail.com', NULL, '$2y$10$X/5ZN8sHKNwmrcc3DMu2HO99tD0n4/8dLsRuaWXglMue7Z0CNZwk6', NULL, '2019-07-28 06:42:00', '2019-07-28 06:42:00'),
(5, 3, 'Director', 'David', 1, 1, 23456, 235667, 'avatar.png', 'director@gmail.com', NULL, '$2y$10$QAdY.jvh4vf.AApRGrRmD.xOcuEkPDKD9uPMrcas4eXrA8R8Tcajy', NULL, '2019-07-28 07:24:14', '2019-07-28 07:24:14'),
(6, 4, 'Dean', 'Mathenge', 0, 0, 12345, 29182785, 'avatar.png', 'dean@gmail.com', NULL, '$2y$10$X/5ZN8sHKNwmrcc3DMu2HO99tD0n4/8dLsRuaWXglMue7Z0CNZwk6', NULL, '2019-07-28 06:42:00', '2019-07-28 06:42:00'),
(7, 6, 'Moses', 'Njoroge', 1, 1, 129920, 124455, 'avatar.png', 'moses@gmail.com', NULL, '$2y$10$REJN3izaU8Fd.ICgymfL9O6MqBH241zTo.MfL.EmURJT1m1g6uGe2', NULL, '2019-08-01 10:06:44', '2019-08-01 10:06:44');

-- --------------------------------------------------------

--
-- Table structure for table `vouchers`
--

CREATE TABLE `vouchers` (
  `id` int(10) UNSIGNED NOT NULL,
  `user_id` int(11) NOT NULL,
  `claim_id` int(11) NOT NULL,
  `voucher_id` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `amount` double NOT NULL,
  `status` tinyint(1) NOT NULL,
  `alert` tinyint(1) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `vouchers`
--

INSERT INTO `vouchers` (`id`, `user_id`, `claim_id`, `voucher_id`, `amount`, `status`, `alert`, `created_at`, `updated_at`) VALUES
(1, 3, 1, 'JKUAT-0-1', 1476, 0, 1, '2019-07-28 13:27:55', '2019-07-28 13:27:55'),
(2, 7, 4, 'JKUAT-1-4', 26790, 0, 1, '2019-08-01 10:19:49', '2019-08-01 10:19:49');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `claims`
--
ALTER TABLE `claims`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `claim_amounts`
--
ALTER TABLE `claim_amounts`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `departments`
--
ALTER TABLE `departments`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `faculties`
--
ALTER TABLE `faculties`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `messages`
--
ALTER TABLE `messages`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Indexes for table `roles`
--
ALTER TABLE `roles`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `statuses`
--
ALTER TABLE `statuses`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `units`
--
ALTER TABLE `units`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `uploads`
--
ALTER TABLE `uploads`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- Indexes for table `vouchers`
--
ALTER TABLE `vouchers`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `vouchers_voucher_id_unique` (`voucher_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `claims`
--
ALTER TABLE `claims`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `claim_amounts`
--
ALTER TABLE `claim_amounts`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT for table `departments`
--
ALTER TABLE `departments`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `faculties`
--
ALTER TABLE `faculties`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `messages`
--
ALTER TABLE `messages`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=215;
--
-- AUTO_INCREMENT for table `roles`
--
ALTER TABLE `roles`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT for table `statuses`
--
ALTER TABLE `statuses`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;
--
-- AUTO_INCREMENT for table `units`
--
ALTER TABLE `units`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `uploads`
--
ALTER TABLE `uploads`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
--
-- AUTO_INCREMENT for table `vouchers`
--
ALTER TABLE `vouchers`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

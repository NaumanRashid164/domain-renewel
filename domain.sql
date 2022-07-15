-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 25, 2022 at 08:37 AM
-- Server version: 10.4.21-MariaDB
-- PHP Version: 8.0.11

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `domain`
--

-- --------------------------------------------------------

--
-- Table structure for table `contact_details`
--

CREATE TABLE `contact_details` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `phone` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `nameCompany` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `company_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `company_address` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` tinyint(1) DEFAULT 1,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `contact_details`
--

INSERT INTO `contact_details` (`id`, `name`, `email`, `phone`, `nameCompany`, `company_name`, `company_address`, `status`, `created_at`, `updated_at`) VALUES
(1, 'Test', 'naumanrashid164@gmail.com', '12345678', 'Test-Suzuk', 'Suzuki', 'address', 0, '2022-04-22 12:47:23', '2022-04-25 00:10:21'),
(2, 'Test', 'naumanrashid164@gmail.com', '12345678', 'Test-Test', 'Test', 'address', 1, '2022-04-25 00:10:55', '2022-04-25 00:10:55');

-- --------------------------------------------------------

--
-- Table structure for table `customers`
--

CREATE TABLE `customers` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `contact_id` bigint(20) UNSIGNED NOT NULL,
  `duration_id` bigint(20) UNSIGNED NOT NULL,
  `vat_id` bigint(20) UNSIGNED NOT NULL,
  `registrant_id` bigint(20) UNSIGNED NOT NULL,
  `hosted` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `hosting_id` bigint(20) UNSIGNED DEFAULT NULL,
  `email_id` bigint(20) UNSIGNED NOT NULL,
  `vat` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `cost_inc_vat` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `start_date` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `expiry_date` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `cost` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `service_stopped` tinyint(1) NOT NULL DEFAULT 0,
  `stopped_by` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `stopped_comment` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `domain_name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `comment` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `customers`
--

INSERT INTO `customers` (`id`, `contact_id`, `duration_id`, `vat_id`, `registrant_id`, `hosted`, `hosting_id`, `email_id`, `vat`, `cost_inc_vat`, `start_date`, `expiry_date`, `cost`, `service_stopped`, `stopped_by`, `stopped_comment`, `domain_name`, `comment`, `created_at`, `updated_at`) VALUES
(1, 1, 1, 1, 1, 'internal', NULL, 3, '2000', '120', '06/04/2022', '26/05/2022', '100', 0, NULL, NULL, 'dmoani', 'comment', '2022-04-22 13:48:49', '2022-04-23 02:19:23'),
(2, 1, 1, 1, 1, 'internal', NULL, 3, '4680', '254', '27/03/2022', '16/05/2022', '234', 0, NULL, NULL, 'qwertyu', 'asdfgh', '2022-04-22 13:57:13', '2022-04-23 02:52:58'),
(3, 2, 6, 2, 1, 'internal', NULL, 7, '200', '30', '25/04/2022', '30/04/2022', '20', 0, NULL, NULL, 'New.com', 'Nothing', '2022-04-25 00:18:42', '2022-04-25 00:21:22');

-- --------------------------------------------------------

--
-- Table structure for table `durations`
--

CREATE TABLE `durations` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `duration` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `durations`
--

INSERT INTO `durations` (`id`, `duration`, `created_at`, `updated_at`) VALUES
(1, 50, '2022-04-22 12:42:28', '2022-04-22 12:42:28'),
(6, 5, '2022-04-25 00:07:12', '2022-04-25 00:07:24'),
(8, 10, '2022-04-25 00:44:40', '2022-04-25 00:44:40');

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
(5, '2022_04_01_100223_create_counties_table', 2),
(6, '2022_04_01_114623_create_message_set_ups_table', 2),
(7, '2022_04_04_092410_create_branches_table', 2),
(8, '2022_04_04_092415_create_message_send_outs_table', 2),
(9, '2022_04_05_061638_create_members_table', 2),
(10, '2022_04_06_075630_create_histories_table', 2),
(11, '2022_04_07_115852_create_member_farmings_table', 2),
(12, '2022_04_12_094056_create_registrant_table', 3),
(13, '2022_04_12_101827_create_registrants_table', 4),
(14, '2022_04_12_103928_create_hostings_table', 5),
(15, '2022_04_12_110946_create_emails_table', 6),
(23, '2022_04_13_101258_create_customer_registrants_table', 12),
(24, '2022_04_14_063305_create_customer_hostings_table', 13),
(25, '2022_04_14_075640_create_customer_mails_table', 14),
(28, '2014_10_12_000000_create_users_table', 15),
(29, '2014_10_12_100000_create_password_resets_table', 15),
(30, '2019_08_19_000000_create_failed_jobs_table', 15),
(31, '2019_12_14_000001_create_personal_access_tokens_table', 15),
(33, '2022_04_13_070520_create_names_table', 15),
(35, '2022_04_13_053508_create_durations_table', 16),
(36, '2022_04_13_081658_create_contact_details_table', 16),
(38, '2022_04_22_100606_create_vat_rates_table', 17),
(40, '2022_04_14_081448_create_customers_table', 18);

-- --------------------------------------------------------

--
-- Table structure for table `names`
--

CREATE TABLE `names` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `names`
--

INSERT INTO `names` (`id`, `type`, `name`, `created_at`, `updated_at`) VALUES
(1, 'registrant', 'Registrant Name', '2022-04-22 12:45:51', '2022-04-22 12:45:51'),
(2, 'hosting', 'hosting Name', '2022-04-22 12:46:01', '2022-04-22 12:46:01'),
(3, 'email', 'email name', '2022-04-22 12:46:11', '2022-04-22 12:46:11'),
(4, 'hosting', 'hosting123', '2022-04-22 13:23:14', '2022-04-22 13:23:14'),
(5, 'registrant', 'R_Name', '2022-04-25 00:07:32', '2022-04-25 00:07:47'),
(6, 'hosting', 'H_Name', '2022-04-25 00:07:56', '2022-04-25 00:08:05'),
(7, 'email', 'E_name', '2022-04-25 00:08:20', '2022-04-25 00:08:56');

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
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `avatar` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'uploads/profile/default.png',
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `email_verified_at`, `password`, `avatar`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'admin', 'admin@domain.com', '2021-02-07 12:00:00', '$2y$10$3xjUaQ4p6piVIVnjNq6HL.SLUJpro4hSZElUdC1nmaM4RNjE1c4cy', 'uploads/profile/default.png', NULL, '2022-04-22 12:27:09', '2022-04-22 12:27:09');

-- --------------------------------------------------------

--
-- Table structure for table `vat_rates`
--

CREATE TABLE `vat_rates` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `rate` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `vat_rates`
--

INSERT INTO `vat_rates` (`id`, `rate`, `created_at`, `updated_at`) VALUES
(1, '20', '2022-04-22 12:46:23', '2022-04-22 12:46:23'),
(2, '10', '2022-04-25 00:09:19', '2022-04-25 00:09:30');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `contact_details`
--
ALTER TABLE `contact_details`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `customers`
--
ALTER TABLE `customers`
  ADD PRIMARY KEY (`id`),
  ADD KEY `customers_contact_id_foreign` (`contact_id`),
  ADD KEY `customers_duration_id_foreign` (`duration_id`),
  ADD KEY `customers_vat_id_foreign` (`vat_id`),
  ADD KEY `customers_registrant_id_foreign` (`registrant_id`),
  ADD KEY `customers_hosting_id_foreign` (`hosting_id`),
  ADD KEY `customers_email_id_foreign` (`email_id`);

--
-- Indexes for table `durations`
--
ALTER TABLE `durations`
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
-- Indexes for table `names`
--
ALTER TABLE `names`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Indexes for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  ADD KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- Indexes for table `vat_rates`
--
ALTER TABLE `vat_rates`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `contact_details`
--
ALTER TABLE `contact_details`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `customers`
--
ALTER TABLE `customers`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `durations`
--
ALTER TABLE `durations`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=41;

--
-- AUTO_INCREMENT for table `names`
--
ALTER TABLE `names`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `vat_rates`
--
ALTER TABLE `vat_rates`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `customers`
--
ALTER TABLE `customers`
  ADD CONSTRAINT `customers_contact_id_foreign` FOREIGN KEY (`contact_id`) REFERENCES `contact_details` (`id`),
  ADD CONSTRAINT `customers_duration_id_foreign` FOREIGN KEY (`duration_id`) REFERENCES `durations` (`id`),
  ADD CONSTRAINT `customers_email_id_foreign` FOREIGN KEY (`email_id`) REFERENCES `names` (`id`),
  ADD CONSTRAINT `customers_hosting_id_foreign` FOREIGN KEY (`hosting_id`) REFERENCES `names` (`id`),
  ADD CONSTRAINT `customers_registrant_id_foreign` FOREIGN KEY (`registrant_id`) REFERENCES `names` (`id`),
  ADD CONSTRAINT `customers_vat_id_foreign` FOREIGN KEY (`vat_id`) REFERENCES `vat_rates` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

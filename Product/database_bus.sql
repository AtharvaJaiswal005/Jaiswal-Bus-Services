-- phpMyAdmin SQL Dump
-- version 5.1.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Feb 26, 2022 at 04:55 AM
-- Server version: 10.4.19-MariaDB
-- PHP Version: 8.0.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `bus`
--

-- --------------------------------------------------------

--
-- Table structure for table `buses`
--

CREATE TABLE `buses` (
  `bus_id` bigint(20) UNSIGNED NOT NULL,
  `bus_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `bus_reg_no` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `bus_contact_no` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `bus_no_seats` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` tinyint(1) NOT NULL DEFAULT 0,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `buses`
--

INSERT INTO `buses` (`bus_id`, `bus_name`, `bus_reg_no`, `bus_contact_no`, `bus_no_seats`, `status`, `created_at`, `updated_at`) VALUES
(1, 'Vijayant', 'MP47P0012', '9405042000', '42', 1, '2022-02-06 07:08:26', '2022-02-06 07:08:26'),
(2, 'Control Bus', 'IB470012', '852045623', '42', 1, '2022-02-25 10:36:37', '2022-02-25 10:36:37');

-- --------------------------------------------------------

--
-- Table structure for table `bus_routes`
--

CREATE TABLE `bus_routes` (
  `route_id` bigint(20) UNSIGNED NOT NULL,
  `bus_id` bigint(20) UNSIGNED NOT NULL,
  `start_time` time NOT NULL,
  `end_time` time NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `bus_routes`
--

INSERT INTO `bus_routes` (`route_id`, `bus_id`, `start_time`, `end_time`, `created_at`, `updated_at`) VALUES
(1, 1, '07:00:00', '12:20:00', '2022-02-06 07:11:31', '2022-02-06 07:11:31'),
(2, 2, '10:00:00', '16:00:00', '2022-02-25 10:40:40', '2022-02-25 10:40:40');

-- --------------------------------------------------------

--
-- Table structure for table `cities`
--

CREATE TABLE `cities` (
  `city_id` bigint(20) UNSIGNED NOT NULL,
  `city_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `city_status` tinyint(1) NOT NULL DEFAULT 1,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `cities`
--

INSERT INTO `cities` (`city_id`, `city_name`, `city_status`, `created_at`, `updated_at`) VALUES
(1, 'Indore', 1, '2022-02-06 07:09:12', '2022-02-06 07:09:12'),
(2, 'Khudel', 1, '2022-02-06 07:09:34', '2022-02-06 07:09:34'),
(3, 'Double Choki', 1, '2022-02-06 07:10:19', '2022-02-06 07:10:19'),
(4, 'Chapda', 1, '2022-02-06 07:10:25', '2022-02-06 07:10:25'),
(5, 'Badi', 1, '2022-02-06 07:10:32', '2022-02-06 07:10:32'),
(6, 'Bijawar', 1, '2022-02-06 07:10:37', '2022-02-06 07:10:37'),
(7, 'Kanod', 1, '2022-02-06 07:10:43', '2022-02-06 07:10:43'),
(8, 'Khategaon', 1, '2022-02-06 07:10:48', '2022-02-06 07:10:48'),
(9, 'Nemawar', 1, '2022-02-06 07:10:53', '2022-02-06 07:10:53'),
(10, 'Hundiya', 1, '2022-02-06 07:10:58', '2022-02-06 07:10:58'),
(11, 'Harda', 1, '2022-02-06 07:11:04', '2022-02-25 09:20:54'),
(13, 'red-node', 1, '2022-02-25 09:30:25', '2022-02-25 09:30:49');

-- --------------------------------------------------------

--
-- Table structure for table `clients`
--

CREATE TABLE `clients` (
  `clnt_id` bigint(20) UNSIGNED NOT NULL,
  `clnt_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `clnt_nic` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `clnt_contact_no_def` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `clnt_contact_no_sec` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `clients`
--

INSERT INTO `clients` (`clnt_id`, `clnt_name`, `clnt_nic`, `clnt_contact_no_def`, `clnt_contact_no_sec`, `user_id`, `created_at`, `updated_at`) VALUES
(1, 'Dewansh', 'revisionvilla@gmail.com', '986451230', NULL, 2, '2022-01-25 03:19:05', '2022-01-25 03:19:05'),
(2, 'testuser', 'testuser', '7948620', NULL, 3, '2022-01-25 23:17:14', '2022-01-25 23:17:14'),
(3, 'database', 'database', '779486320', NULL, 4, '2022-02-07 11:26:56', '2022-02-07 11:26:56'),
(4, 'Blocking', 'Blocking', '94816750', NULL, 5, '2022-02-07 11:41:33', '2022-02-07 11:41:33'),
(5, 'Queueable', 'Queueable', '852063', NULL, 6, '2022-02-08 08:36:36', '2022-02-08 08:36:36'),
(6, 'DearStudent@DearStudent.DearStudent', 'testuser', '88520520', NULL, 7, '2022-02-13 23:50:42', '2022-02-13 23:50:42'),
(7, 'Akul', 'Akul', '85208520', NULL, 8, '2022-02-17 23:07:25', '2022-02-17 23:07:25'),
(8, 'Akul', 'akul.goyal@choithraminternational.com', '85085208520', NULL, 9, '2022-02-17 23:10:28', '2022-02-17 23:10:28'),
(9, 'dragon', '852045685', '852045685', NULL, 10, '2022-02-24 04:10:12', '2022-02-24 04:10:12');

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
-- Table structure for table `jobs`
--

CREATE TABLE `jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `queue` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `attempts` tinyint(3) UNSIGNED NOT NULL,
  `reserved_at` int(10) UNSIGNED DEFAULT NULL,
  `available_at` int(10) UNSIGNED NOT NULL,
  `created_at` int(10) UNSIGNED NOT NULL
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
(1, '2013_10_11_184835_create_user_roles_table', 1),
(2, '2014_10_12_000000_create_users_table', 1),
(3, '2014_10_12_100000_create_password_resets_table', 1),
(4, '2019_08_19_000000_create_failed_jobs_table', 1),
(5, '2019_12_14_000001_create_personal_access_tokens_table', 1),
(6, '2021_10_13_181532_create_buses_table', 1),
(7, '2021_10_13_190257_create_bus_routes_table', 1),
(8, '2021_10_13_202116_create_cities_table', 1),
(9, '2021_10_13_211714_create_route_city_prices_table', 1),
(10, '2021_10_16_184032_create_clients_table', 1),
(11, '2021_10_16_184404_create_reservations_table', 1),
(12, '2021_11_10_072831_create_temp_data_table', 1),
(13, '2022_02_07_165217_create_jobs_table', 2);

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
-- Table structure for table `reservations`
--

CREATE TABLE `reservations` (
  `reservations_id` bigint(20) UNSIGNED NOT NULL,
  `status` int(11) NOT NULL DEFAULT 3,
  `reservation_date` date NOT NULL,
  `clnt_id` bigint(20) UNSIGNED NOT NULL,
  `bus_id` bigint(20) UNSIGNED NOT NULL,
  `route_id` bigint(20) UNSIGNED NOT NULL,
  `city_first` bigint(20) UNSIGNED NOT NULL,
  `city_second` bigint(20) UNSIGNED NOT NULL,
  `seats_count` int(11) NOT NULL,
  `seats` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_bin NOT NULL CHECK (json_valid(`seats`)),
  `notice` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `price_per_one_seat` double(8,2) NOT NULL,
  `price_total` double(8,2) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `reservations`
--

INSERT INTO `reservations` (`reservations_id`, `status`, `reservation_date`, `clnt_id`, `bus_id`, `route_id`, `city_first`, `city_second`, `seats_count`, `seats`, `notice`, `price_per_one_seat`, `price_total`, `created_at`, `updated_at`) VALUES
(1, 2, '2022-02-13', 1, 1, 1, 5, 10, 3, '[\"\"]', NULL, 90.00, 270.00, '2022-02-06 07:18:21', '2022-02-06 07:19:11'),
(2, 2, '2022-03-23', 8, 1, 1, 1, 10, 15, '[\"20\",\"41\",\"41\",\"39\",\"38\",\"35\",\"34\",\"31\",\"30\",\"27\",\"26\",\"23\",\"22\",\"1\",\"4\",\"5\",\"8\",\"9\",\"12\",\"13\",\"16\",\"17\"]', 'xjybfdfxcdf', 190.00, 2850.00, '2022-02-17 23:14:11', '2022-02-17 23:15:55'),
(3, 2, '2022-02-26', 9, 2, 2, 11, 13, 5, '[\"19\",\"20\",\"41\",\"41\",\"39\"]', 'please provide meal', 600.00, 3000.00, '2022-02-25 11:09:01', '2022-02-25 11:12:12');

-- --------------------------------------------------------

--
-- Table structure for table `route_city_prices`
--

CREATE TABLE `route_city_prices` (
  `route_city_prices_id` bigint(20) UNSIGNED NOT NULL,
  `route_id` bigint(20) UNSIGNED NOT NULL,
  `city_id` bigint(20) UNSIGNED NOT NULL,
  `price` double(8,2) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `route_city_prices`
--

INSERT INTO `route_city_prices` (`route_city_prices_id`, `route_id`, `city_id`, `price`, `created_at`, `updated_at`) VALUES
(1, 1, 1, 0.00, '2022-02-06 07:11:53', '2022-02-06 07:11:53'),
(2, 1, 2, 30.00, '2022-02-06 07:12:05', '2022-02-06 07:12:05'),
(3, 1, 3, 40.00, '2022-02-06 07:12:16', '2022-02-06 07:12:16'),
(4, 1, 4, 60.00, '2022-02-06 07:12:28', '2022-02-06 07:12:28'),
(5, 1, 5, 100.00, '2022-02-06 07:12:39', '2022-02-06 07:12:39'),
(6, 1, 6, 110.00, '2022-02-06 07:12:52', '2022-02-06 07:12:52'),
(7, 1, 7, 130.00, '2022-02-06 07:13:04', '2022-02-06 07:13:04'),
(8, 1, 8, 160.00, '2022-02-06 07:13:18', '2022-02-06 07:13:18'),
(9, 1, 9, 180.00, '2022-02-06 07:13:28', '2022-02-06 07:13:28'),
(10, 1, 10, 190.00, '2022-02-06 07:13:47', '2022-02-06 07:13:47'),
(11, 1, 11, 210.00, '2022-02-06 07:13:58', '2022-02-06 07:13:58'),
(12, 2, 1, 0.00, '2022-02-25 10:42:57', '2022-02-25 10:42:57'),
(13, 2, 11, 100.00, '2022-02-25 10:43:05', '2022-02-25 10:43:05'),
(14, 2, 5, 300.00, '2022-02-25 10:43:15', '2022-02-25 10:43:15'),
(15, 2, 13, 700.00, '2022-02-25 10:43:25', '2022-02-25 10:43:25');

-- --------------------------------------------------------

--
-- Table structure for table `temp_data`
--

CREATE TABLE `temp_data` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `ip` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `res_date` date DEFAULT NULL,
  `bus_id` int(11) NOT NULL,
  `from_id` int(11) NOT NULL,
  `to_id` int(11) NOT NULL,
  `route_id` int(11) NOT NULL,
  `route_price` double(8,2) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `username` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `avatar` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'profile.jpg',
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `role` bigint(20) UNSIGNED NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `username`, `email`, `avatar`, `email_verified_at`, `password`, `role`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'Admin', 'admi@admin.com', 'profile.jpg', '2022-01-04 08:48:22', '$2y$10$qcFDtBqj.IQ.ugTOqC4tCuT9DxeEhT2bafCSKiXnpQixepIt/dDgy', 1, NULL, '2022-01-25 03:17:36', '2022-01-25 03:17:36'),
(2, 'Dewansh', 'revisionvilla@gmail.com', 'thumb-1920-86518.png', '2022-01-14 08:49:26', '$2y$10$/azI5v6PoK5IC33ingATZ.Gp58ADUNHxmTg5CSpZWSX278dVvXoqC', 2, NULL, '2022-01-25 03:19:05', '2022-02-01 10:41:13'),
(3, 'testuser', 'user@gmail.im', '652abf4084f4b37cbbe53ebd9d386e13.jpg', '2022-01-12 04:47:38', '$2y$10$ntJR05ExjrzaEwtwykEpGu4f8Yr.PIJXxLiOBGhJCZfltx.y5GINa', 2, NULL, '2022-01-25 23:17:13', '2022-02-23 22:22:05'),
(4, 'database', 'database@database.database', 'profile.jpg', NULL, '$2y$10$sOww8jzqrLGNRrO8aeXfCeVXRinLWhKnG2LpwUCJ9UEKNQT50wOlK', 2, NULL, '2022-02-07 11:26:56', '2022-02-07 11:26:56'),
(5, 'Blocking', 'Blocking@Blocking.Blocking', 'profile.jpg', NULL, '$2y$10$.hh6cWc3TglamHQyhNnDMOdirFGHLU/VfctnCs2CL/hn/l4Wumjk2', 2, NULL, '2022-02-07 11:41:33', '2022-02-07 11:41:33'),
(6, 'Queueable', 'Queueable@Queueable.Queueable', 'profile.jpg', NULL, '$2y$10$TPDrN4YtiBsW4bvPcyQxEO808mhdAvrucD6qFtvAg.dLHRli/1fwO', 2, NULL, '2022-02-08 08:36:36', '2022-02-08 08:36:36'),
(7, 'DearStudent@DearStudent.DearStudent', 'DearStudent@DearStudent.DearStudent', 'profile.jpg', NULL, '$2y$10$FrTmEzYDSEl6vDBGdUa8b.p8BESTnLB15jWT4GeDKfp6.bkPSqyUu', 2, NULL, '2022-02-13 23:50:42', '2022-02-13 23:50:42'),
(8, 'Nice', 'anay.goyal@choithraminternational.com', 'profile.jpg', NULL, '$2y$10$OHnCjbM5G54k0cQA9aDOvOAIoO4by0C03Avl2kN11wAsaThjni5Qu', 2, NULL, '2022-02-17 23:07:24', '2022-02-17 23:07:24'),
(9, 'Akul', 'akul.goyal@choithraminternational.com', '95227.jpg', '2022-02-11 04:41:49', '$2y$10$EPwiyh73hl5zyN8pGje0YOOkWIBuA0jSM6JCCgjHKbfDstgkyjXxO', 2, NULL, '2022-02-17 23:10:27', '2022-02-17 23:15:16'),
(10, 'dragon', 'atharv.jaiswal@choithraminternational.com', '95227 (1).jpg', '2022-02-24 04:19:05', '$2y$10$MqYaj2/yC66P045r8kODreyzCE9CrwXiG8uCRf/vacHxjE5LpDH2K', 2, NULL, '2022-02-24 04:10:12', '2022-02-25 08:33:53');

-- --------------------------------------------------------

--
-- Table structure for table `user_roles`
--

CREATE TABLE `user_roles` (
  `role_id` bigint(20) UNSIGNED NOT NULL,
  `role_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `user_roles`
--

INSERT INTO `user_roles` (`role_id`, `role_name`, `created_at`, `updated_at`) VALUES
(1, 'Admin', '2022-01-25 03:17:35', '2022-01-25 03:17:35'),
(2, 'Client', '2022-01-25 03:17:35', '2022-01-25 03:17:35');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `buses`
--
ALTER TABLE `buses`
  ADD PRIMARY KEY (`bus_id`);

--
-- Indexes for table `bus_routes`
--
ALTER TABLE `bus_routes`
  ADD PRIMARY KEY (`route_id`),
  ADD KEY `bus_routes_bus_id_foreign` (`bus_id`);

--
-- Indexes for table `cities`
--
ALTER TABLE `cities`
  ADD PRIMARY KEY (`city_id`);

--
-- Indexes for table `clients`
--
ALTER TABLE `clients`
  ADD PRIMARY KEY (`clnt_id`),
  ADD KEY `clients_user_id_foreign` (`user_id`);

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Indexes for table `jobs`
--
ALTER TABLE `jobs`
  ADD PRIMARY KEY (`id`),
  ADD KEY `jobs_queue_index` (`queue`);

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
-- Indexes for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  ADD KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`);

--
-- Indexes for table `reservations`
--
ALTER TABLE `reservations`
  ADD PRIMARY KEY (`reservations_id`),
  ADD KEY `reservations_clnt_id_foreign` (`clnt_id`),
  ADD KEY `reservations_bus_id_foreign` (`bus_id`),
  ADD KEY `reservations_route_id_foreign` (`route_id`),
  ADD KEY `reservations_city_first_foreign` (`city_first`),
  ADD KEY `reservations_city_second_foreign` (`city_second`);

--
-- Indexes for table `route_city_prices`
--
ALTER TABLE `route_city_prices`
  ADD PRIMARY KEY (`route_city_prices_id`),
  ADD KEY `route_city_prices_route_id_foreign` (`route_id`),
  ADD KEY `route_city_prices_city_id_foreign` (`city_id`);

--
-- Indexes for table `temp_data`
--
ALTER TABLE `temp_data`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_username_unique` (`username`),
  ADD UNIQUE KEY `users_email_unique` (`email`),
  ADD KEY `users_role_foreign` (`role`);

--
-- Indexes for table `user_roles`
--
ALTER TABLE `user_roles`
  ADD PRIMARY KEY (`role_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `buses`
--
ALTER TABLE `buses`
  MODIFY `bus_id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `bus_routes`
--
ALTER TABLE `bus_routes`
  MODIFY `route_id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `cities`
--
ALTER TABLE `cities`
  MODIFY `city_id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `clients`
--
ALTER TABLE `clients`
  MODIFY `clnt_id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `jobs`
--
ALTER TABLE `jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `reservations`
--
ALTER TABLE `reservations`
  MODIFY `reservations_id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `route_city_prices`
--
ALTER TABLE `route_city_prices`
  MODIFY `route_city_prices_id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `temp_data`
--
ALTER TABLE `temp_data`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `user_roles`
--
ALTER TABLE `user_roles`
  MODIFY `role_id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `bus_routes`
--
ALTER TABLE `bus_routes`
  ADD CONSTRAINT `bus_routes_bus_id_foreign` FOREIGN KEY (`bus_id`) REFERENCES `buses` (`bus_id`);

--
-- Constraints for table `clients`
--
ALTER TABLE `clients`
  ADD CONSTRAINT `clients_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`);

--
-- Constraints for table `reservations`
--
ALTER TABLE `reservations`
  ADD CONSTRAINT `reservations_bus_id_foreign` FOREIGN KEY (`bus_id`) REFERENCES `buses` (`bus_id`),
  ADD CONSTRAINT `reservations_city_first_foreign` FOREIGN KEY (`city_first`) REFERENCES `cities` (`city_id`),
  ADD CONSTRAINT `reservations_city_second_foreign` FOREIGN KEY (`city_second`) REFERENCES `cities` (`city_id`),
  ADD CONSTRAINT `reservations_clnt_id_foreign` FOREIGN KEY (`clnt_id`) REFERENCES `clients` (`clnt_id`),
  ADD CONSTRAINT `reservations_route_id_foreign` FOREIGN KEY (`route_id`) REFERENCES `bus_routes` (`route_id`);

--
-- Constraints for table `route_city_prices`
--
ALTER TABLE `route_city_prices`
  ADD CONSTRAINT `route_city_prices_city_id_foreign` FOREIGN KEY (`city_id`) REFERENCES `cities` (`city_id`),
  ADD CONSTRAINT `route_city_prices_route_id_foreign` FOREIGN KEY (`route_id`) REFERENCES `bus_routes` (`route_id`);

--
-- Constraints for table `users`
--
ALTER TABLE `users`
  ADD CONSTRAINT `users_role_foreign` FOREIGN KEY (`role`) REFERENCES `user_roles` (`role_id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

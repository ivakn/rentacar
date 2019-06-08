-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 04, 2019 at 03:52 AM
-- Server version: 10.1.38-MariaDB
-- PHP Version: 7.3.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `rent-a-car`
--

-- --------------------------------------------------------

--
-- Table structure for table `cars`
--

CREATE TABLE `cars` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `price` double NOT NULL,
  `image_path` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `model` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `fuel` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `numberOfPassengers` int(11) NOT NULL,
  `airCondition` tinyint(1) NOT NULL,
  `doors` int(11) NOT NULL,
  `transmission` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `category` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `cars`
--

INSERT INTO `cars` (`id`, `name`, `price`, `image_path`, `created_at`, `updated_at`, `model`, `fuel`, `numberOfPassengers`, `airCondition`, `doors`, `transmission`, `category`) VALUES
(5, 'Renault Megane', 25.5, '/images/megane.png', '2019-06-03 22:00:00', '2019-06-03 22:00:00', 'Megane', 'Diesel', 5, 1, 5, 'Manual', 'Renault'),
(6, 'BMW Touring', 35.5, 'images/bmw-touring.png', '2019-06-03 22:00:00', '2019-06-03 22:00:00', 'Touring', 'Diesel', 5, 1, 5, 'Manual', 'BMW'),
(8, 'VW Up', 21.5, 'images/vw-up.png', '2019-06-03 22:00:00', '2019-06-03 22:00:00', 'Up', 'Petrol', 4, 1, 5, 'Manual', 'VW'),
(9, 'Renault Capture', 30.5, 'images/capture.png', '2019-06-03 22:00:00', '2019-06-03 22:00:00', 'Capture', 'Diesel', 5, 1, 5, 'Manual', 'Renault'),
(12, 'Mini Cooper', 21.5, 'images/mini-cooper.png', '2019-06-03 22:00:00', '2019-06-03 22:00:00', 'Cooper', 'Diesel', 4, 1, 2, 'Manual', 'Mini'),
(13, 'Fiat 500', 23.5, 'images/fiat.png', '2019-06-03 22:00:00', '2019-06-03 22:00:00', '500', 'Diesel', 5, 1, 5, 'Manual', 'Fiat');

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(33, '2014_10_12_000000_create_users_table', 1),
(34, '2014_10_12_100000_create_password_resets_table', 1),
(35, '2019_05_29_162323_create_cars_table', 1),
(36, '2019_05_29_224016_create_reservation-table', 2),
(37, '2019_05_30_165323_create_carfree_view', 3),
(38, '2019_05_30_170000_create_carfree_view', 4);

-- --------------------------------------------------------

--
-- Table structure for table `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `reservations`
--

CREATE TABLE `reservations` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `start_date` date NOT NULL,
  `ending_date` date NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `numberOfDays` int(11) NOT NULL,
  `price` double NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `car_id` bigint(20) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `reservations`
--

INSERT INTO `reservations` (`id`, `start_date`, `ending_date`, `user_id`, `numberOfDays`, `price`, `created_at`, `updated_at`, `car_id`) VALUES
(18, '2019-06-20', '2019-06-28', 6, 8, 219, '2019-06-03 23:48:11', '2019-06-03 23:48:11', 5),
(19, '2019-07-17', '2019-07-26', 6, 9, 233.5, '2019-06-03 23:48:56', '2019-06-03 23:48:56', 8),
(20, '2019-06-20', '2019-06-27', 4, 7, 222.5, '2019-06-03 23:49:54', '2019-06-03 23:49:54', 8);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
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

INSERT INTO `users` (`id`, `name`, `email`, `email_verified_at`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES
(4, 'Iva Knezevic', 'ivakpg@gmail.com', NULL, '$2y$10$o705GkMLTFefOIlDupZJE.IIiIY9CJpVi/l0QjvV4P/9qUSIoAJhK', NULL, '2019-06-03 21:35:05', '2019-06-03 21:35:05'),
(6, 'Mark', 'mark@gmail.com', NULL, '$2y$10$Zz/b2y6aNsG5D1d/OWnh7OSDgD4MY//LX12beTAqXS8uTInTUcZZW', NULL, '2019-06-03 23:47:43', '2019-06-03 23:47:43');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `cars`
--
ALTER TABLE `cars`
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
-- Indexes for table `reservations`
--
ALTER TABLE `reservations`
  ADD PRIMARY KEY (`id`),
  ADD KEY `car_id` (`car_id`),
  ADD KEY `user_id` (`user_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `cars`
--
ALTER TABLE `cars`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=39;

--
-- AUTO_INCREMENT for table `reservations`
--
ALTER TABLE `reservations`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `reservations`
--
ALTER TABLE `reservations`
  ADD CONSTRAINT `reservations_ibfk_1` FOREIGN KEY (`car_id`) REFERENCES `cars` (`id`),
  ADD CONSTRAINT `reservations_ibfk_2` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

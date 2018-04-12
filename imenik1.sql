-- phpMyAdmin SQL Dump
-- version 4.6.5.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 12, 2018 at 09:46 AM
-- Server version: 10.1.21-MariaDB
-- PHP Version: 5.6.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `imenik1`
--

-- --------------------------------------------------------

--
-- Table structure for table `contacts`
--

CREATE TABLE `contacts` (
  `id` int(10) UNSIGNED NOT NULL,
  `ime` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `prezime` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `telefon` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `slika` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `contacts`
--

INSERT INTO `contacts` (`id`, `ime`, `prezime`, `telefon`, `email`, `slika`, `created_at`, `updated_at`) VALUES
(2, 'kontakt1', 'kontakt', '+123 123 123', 'test@test.com', 'kontakt1_2.jpg', '2017-09-11 11:58:31', '2018-04-12 05:34:00'),
(3, 'kontakt4', 'kontakt', '+ 123 123 123', 'test@test.com', 'Mico_3.jpg', '2017-09-11 11:59:02', '2018-04-12 05:38:43'),
(5, 'kontakt7', 'kontakt', '+324234234234', 'test@test.com', 'default.png', '2017-09-11 12:00:05', '2018-04-12 05:40:03'),
(6, 'kontakt10', 'kontakt', '+123 123 123', 'test@test.com', 'default.png', '2017-09-11 12:00:24', '2018-04-12 05:41:00'),
(14, 'kontakt2', 'kontakt', '+3242342342', 'test@test.com', 'default.png', '2017-09-11 13:00:49', '2018-04-12 05:38:28'),
(15, 'kontakt5', 'kontakt', '+324234234', 'test@test.com', 'Nebojsa_15.jpg', '2017-09-12 10:06:38', '2018-04-12 05:39:02'),
(16, 'kontakt8', 'kontakt', '+324234234234', 'test@test.com', 'default.png', '2017-09-12 11:45:36', '2018-04-12 05:40:31'),
(17, 'Kontakt 11', 'kontakt', '+12324234', 'test@test.com', 'Kontakt2_17.png', '2017-09-12 11:46:11', '2018-04-12 05:41:42'),
(18, 'Kontakt3', 'Prezime', '+2324235234', 'neki@hotmail.com', 'default.png', '2017-09-12 11:46:36', '2017-09-12 11:52:35'),
(19, 'kontakt6', 'kontakt', '+3234234234', 'test@test.com', 'Kontakt411_19.jpg', '2017-09-12 11:46:52', '2018-04-12 05:39:56'),
(21, 'kontakt9', 'kontakt', '+123 123 123', 'test@test.com', 'default.png', '2017-09-12 13:17:30', '2018-04-12 05:40:45'),
(22, 'kontakt12', 'kontakt', '+123 123 123', 'test@test.com', 'default.png', '2017-09-13 06:23:00', '2018-04-12 05:42:00'),
(31, 'kontakt13', 'kontakt', '+123 123 123', 'test@test.com', 'default.png', '2018-04-12 05:42:16', '2018-04-12 05:42:16'),
(32, 'kontakt14', 'kontakt', '+123 123 123', 'test@test.com', 'default.png', '2018-04-12 05:42:36', '2018-04-12 05:42:36');

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
(1, '2017_09_11_094529_create_contacts_table', 1);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `contacts`
--
ALTER TABLE `contacts`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `contacts`
--
ALTER TABLE `contacts`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=33;
--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

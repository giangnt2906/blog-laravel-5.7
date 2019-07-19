-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 14, 2019 at 06:09 PM
-- Server version: 10.1.38-MariaDB
-- PHP Version: 7.3.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `lsapp`
--

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
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_resets_table', 1),
(3, '2019_07_01_075027_create_posts_table', 1),
(4, '2019_07_10_024630_add_user_id_to_posts', 2),
(5, '2019_07_12_015753_add_cover_image_to_posts', 3);

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
-- Table structure for table `posts`
--

CREATE TABLE `posts` (
  `id` int(10) UNSIGNED NOT NULL,
  `title` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `body` mediumtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `user_id` int(10) UNSIGNED NOT NULL,
  `cover_image` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `posts`
--

INSERT INTO `posts` (`id`, `title`, `body`, `created_at`, `updated_at`, `user_id`, `cover_image`) VALUES
(12, 'pos 1', '<p>day la post 1</p>', '2019-07-11 19:44:04', '2019-07-11 19:54:53', 1, 'pyramids-minimalist-4k-33_1562900093.jpeg'),
(13, 'post 2', '<p>day la post 2</p>', '2019-07-11 19:44:26', '2019-07-11 19:47:43', 1, 'worldPixel_1562899663.png'),
(14, 'post 3', '<p>ko co anh</p>', '2019-07-11 19:55:26', '2019-07-11 19:57:22', 1, 'saturn-planet-illustration-minimalist-3w_1562900242.jpeg'),
(15, 'post 4', '<p>khong co anh</p>', '2019-07-11 19:58:34', '2019-07-11 19:58:46', 1, 'sunrise-illustration-as_1562900326.jpeg'),
(16, 'post 5', '<p>day la post 5</p>', '2019-07-11 20:00:12', '2019-07-11 20:00:25', 1, 'thanos-new-art-8k-tc_1562900425.jpeg'),
(17, 'Face', '<p>aaa</p>', '2019-07-11 20:03:02', '2019-07-11 20:04:03', 1, 'pikachu-thor-minimalism-4k-8m_1562900643.jpeg'),
(18, 'test 2', '<p>test upload button</p>', '2019-07-14 08:45:02', '2019-07-14 08:45:02', 1, 'saturn-planet-illustration-minimalist-3w_1563119102.jpeg'),
(19, 'check file 1', '<p>file address 2</p>', '2019-07-14 08:47:42', '2019-07-14 09:06:12', 1, 'pikachu-thor-minimalism-4k-8m_1563119262.jpeg'),
(21, 'test edit 2', '<p>gta test thanos. Khong&nbsp;edit anh</p>', '2019-07-14 08:57:28', '2019-07-14 09:05:59', 1, 'sunrise-illustration-as_1563120359.jpeg'),
(22, '10', '<p>post 10</p>', '2019-07-14 09:07:01', '2019-07-14 09:07:01', 1, 'noimage.jpg'),
(23, '11', '<p>post 11</p>', '2019-07-14 09:07:24', '2019-07-14 09:07:24', 1, 'kawhi_leonard_1563120444.jpeg'),
(24, '14', '<p>post 14</p>', '2019-07-14 09:08:17', '2019-07-14 09:08:17', 1, 'lbjHeat_1563120497.jpeg');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(10) UNSIGNED NOT NULL,
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
(1, 'giang', 'nggiang290697@gmail.com', NULL, '$2y$10$G/ViDGrx3JuiEXQTvAQzu.uI1mb9NLqXO9ybKSlhixdsSNrYdGuXW', 'T8dEeSDPMvuoOUyIsVee51NsXnZdeM8JgUm6DXX1Phu6L8E3NeGGycxslWes', '2019-07-09 19:13:15', '2019-07-09 19:13:15'),
(2, 'test', 'ntgiang@vn.gimasys.com', NULL, '$2y$10$iwCzuV43kE/kvRS8R1Avl.qSIcaFiSASAr3sn5NyglTcTuO0fGBRS', 'CRSOH2R2baM0eqJQ1dxAFzxEZqG6W83jEyqn4nQqEbpy4elw3d27QBlnX8Dc', '2019-07-09 20:15:34', '2019-07-09 20:15:34');

--
-- Indexes for dumped tables
--

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
-- Indexes for table `posts`
--
ALTER TABLE `posts`
  ADD PRIMARY KEY (`id`);

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
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `posts`
--
ALTER TABLE `posts`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

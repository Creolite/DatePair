-- phpMyAdmin SQL Dump
-- version 4.5.4.1deb2ubuntu2
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Apr 05, 2018 at 10:53 AM
-- Server version: 10.1.25-MariaDB-1~xenial
-- PHP Version: 7.0.22-0ubuntu0.16.04.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `dating`
--

-- --------------------------------------------------------

--
-- Table structure for table `comments`
--

CREATE TABLE `comments` (
  `id` int(10) UNSIGNED NOT NULL,
  `comment` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_id` int(10) UNSIGNED NOT NULL,
  `topic_id` int(10) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `likes` bigint(20) UNSIGNED NOT NULL DEFAULT '0',
  `dislikes` bigint(20) UNSIGNED NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `comments`
--

INSERT INTO `comments` (`id`, `comment`, `user_id`, `topic_id`, `created_at`, `updated_at`, `likes`, `dislikes`) VALUES
(1, 'Hello Cyndy, pls contact me via ottomanie91@yahoo.com. I direlly need your assistance', 3, 4, '2018-04-05 08:04:08', '2018-04-05 08:04:08', 0, 0),
(2, 'Awesome post! Nice of you', 2, 4, '2018-04-05 07:59:08', '2018-04-05 08:04:08', 23, 0),
(3, 'There is nothing like early marriage. Any female above 18 is adult and fit enough. May take though ', 4, 4, '2018-04-05 08:21:08', '2018-04-05 08:22:08', 15, 6),
(4, 'You all truly deserve to be awarded. Thumbs up!', 3, 3, '2018-04-02 01:01:08', '2018-04-05 08:22:08', 39, 1);

-- --------------------------------------------------------

--
-- Table structure for table `forums`
--

CREATE TABLE `forums` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `forums`
--

INSERT INTO `forums` (`id`, `name`, `description`, `created_at`, `updated_at`) VALUES
(1, 'DTW Worldwide', 'All topic for all countries', NULL, NULL),
(2, 'Dating & Love', 'Find your perfect match', NULL, NULL);

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
(2, '2014_10_12_100000_create_password_resets_table', 2),
(3, '2018_03_16_100921_create_forums_table', 3),
(4, '2018_03_17_184539_create_trends_table', 4),
(5, '2018_03_17_184950_create_tags_table', 5),
(6, '2018_03_17_204219_create_topics_table', 6),
(7, '2018_03_22_184403_create_comments_table', 7),
(8, '2018_04_04_231307_add_voted_columns_to_comments', 8);

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
-- Table structure for table `tags`
--

CREATE TABLE `tags` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `topics`
--

CREATE TABLE `topics` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `forums` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `trends` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `tags` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `user_id` int(10) UNSIGNED DEFAULT NULL,
  `forums_id` int(10) UNSIGNED DEFAULT NULL,
  `trends_id` int(10) UNSIGNED DEFAULT NULL,
  `tags_id` int(10) UNSIGNED DEFAULT NULL,
  `likes` bigint(20) NOT NULL,
  `dislikes` bigint(20) NOT NULL,
  `name_slug` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `topics`
--

INSERT INTO `topics` (`id`, `name`, `description`, `forums`, `trends`, `tags`, `user_id`, `forums_id`, `trends_id`, `tags_id`, `likes`, `dislikes`, `name_slug`, `created_at`, `updated_at`) VALUES
(1, 'This topic goes to all my Friends', 'This is working for me and all', NULL, NULL, NULL, 2, 1, NULL, NULL, 7, 1, 'this-topic-goes-to-all-my-friends', '2018-03-27 11:32:51', '2018-03-27 11:32:51'),
(3, 'Clap for the best Authors!', 'They need your appreciation. Please, spare them a little "Thumbs up!"', NULL, NULL, NULL, 1, 1, NULL, NULL, 74, 8, 'clap-for-the-best-authors', '2018-04-01 08:07:27', '2018-03-27 11:32:51'),
(4, 'A word on early marriage', 'Young people ask: "What age constitutes \'early\' marriage in the first place?"', NULL, NULL, NULL, 1, 2, NULL, NULL, 54, 2, 'a-word-on-early-marriage', '2018-04-05 07:51:33', '2018-03-27 11:32:51');

-- --------------------------------------------------------

--
-- Table structure for table `trends`
--

CREATE TABLE `trends` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'Cyndy Bella', 'cyndy23a@gmail.com', '$2y$10$wVWCxdHjtZP/DyxM/7MxD.dqXQM3OwFENYxnbeQSmq2QCc4S5vpOu', 'e46vmcAJ6ikKmGfEAmilAlCvgF3HdmYFR6kOKDrJwsDapa79g7wu0UGdtBLM', '2018-04-05 08:09:31', '2018-04-05 08:09:31'),
(2, 'Manuel Chuba', 'mc94.manuel@gmail.com', '$2y$10$4drgwM5enXw0NwzKmcH6vuVfZK5qLmxGMNehSu3lA4yAEqjSPe9Za', 'EsSzPQH9njzudpl6CljT9KwEOd4bF38cDvcaClRFA9ZjFNixxlPK9Od8brIL', '2018-04-05 08:10:57', '2018-04-05 08:10:57'),
(3, 'Jane Doe', 'jane.dolly03@example.com', '$2y$10$sF9/gJuozyyaLSPmYfQ/4es8Z.xtbD6CrexV6knK//bxTqO5hSP3G', '0kbx6aBQU7M0kK2u4YTEwQCKQrGeplCyrX4JyZ1S3XIKQdN4oX3PVg85PVqG', '2018-04-05 08:43:43', '2018-04-05 08:43:43'),
(4, 'Abiyode Darryl', 'darrylyke14@outlook.com', '$2y$10$EJuhhIl1bz0RGR5R/asSEOBpClApZOMGOR4fZbOABZdpHn/A.MmBW', NULL, '2018-04-05 08:50:08', '2018-04-05 08:50:08');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `comments`
--
ALTER TABLE `comments`
  ADD PRIMARY KEY (`id`),
  ADD KEY `comments_user_id_foreign` (`user_id`),
  ADD KEY `comments_topic_id_foreign` (`topic_id`);

--
-- Indexes for table `forums`
--
ALTER TABLE `forums`
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
-- Indexes for table `tags`
--
ALTER TABLE `tags`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `topics`
--
ALTER TABLE `topics`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `topics_name_slug_unique` (`name_slug`),
  ADD KEY `topics_user_id_foreign` (`user_id`),
  ADD KEY `topics_forums_id_foreign` (`forums_id`),
  ADD KEY `topics_trends_id_foreign` (`trends_id`),
  ADD KEY `topics_tags_id_foreign` (`tags_id`);

--
-- Indexes for table `trends`
--
ALTER TABLE `trends`
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
-- AUTO_INCREMENT for table `comments`
--
ALTER TABLE `comments`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `forums`
--
ALTER TABLE `forums`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
--
-- AUTO_INCREMENT for table `tags`
--
ALTER TABLE `tags`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `topics`
--
ALTER TABLE `topics`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `trends`
--
ALTER TABLE `trends`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- Constraints for dumped tables
--

--
-- Constraints for table `comments`
--
ALTER TABLE `comments`
  ADD CONSTRAINT `comments_topic_id_foreign` FOREIGN KEY (`topic_id`) REFERENCES `topics` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `comments_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `topics`
--
ALTER TABLE `topics`
  ADD CONSTRAINT `topics_forums_id_foreign` FOREIGN KEY (`forums_id`) REFERENCES `forums` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `topics_tags_id_foreign` FOREIGN KEY (`tags_id`) REFERENCES `tags` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `topics_trends_id_foreign` FOREIGN KEY (`trends_id`) REFERENCES `trends` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `topics_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

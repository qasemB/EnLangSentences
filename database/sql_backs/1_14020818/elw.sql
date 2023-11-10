-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 10, 2023 at 12:24 AM
-- Server version: 10.4.27-MariaDB
-- PHP Version: 8.2.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `elw`
--

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `title` varchar(255) NOT NULL,
  `descriptions` text DEFAULT NULL,
  `image` text DEFAULT NULL,
  `is_active` tinyint(1) NOT NULL DEFAULT 1,
  `show_in_menu` tinyint(1) NOT NULL DEFAULT 1,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`id`, `title`, `descriptions`, `image`, `is_active`, `show_in_menu`, `created_at`, `updated_at`) VALUES
(1, 'Word/Phrase meaning', 'تمرکز روی معنی کلمات و عبارات', NULL, 1, 1, NULL, NULL),
(2, 'Word/Phrase Using', 'تمرکز روی مکان استفاده کلمه یا عبارت', NULL, 1, 1, NULL, NULL),
(3, 'Idiom using', 'تمرکز روی اصلاحات', NULL, 1, 1, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `category_phrase`
--

CREATE TABLE `category_phrase` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `category_id` bigint(20) UNSIGNED NOT NULL,
  `phrase_id` bigint(20) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `category_phrase`
--

INSERT INTO `category_phrase` (`id`, `category_id`, `phrase_id`) VALUES
(1, 1, 11),
(2, 1, 11),
(3, 1, 12),
(4, 1, 13),
(5, 1, 14),
(6, 1, 15),
(7, 1, 16),
(8, 1, 17),
(9, 1, 18),
(10, 1, 19),
(11, 1, 19);

-- --------------------------------------------------------

--
-- Table structure for table `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `uuid` varchar(255) NOT NULL,
  `connection` text NOT NULL,
  `queue` text NOT NULL,
  `payload` longtext NOT NULL,
  `exception` longtext NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_reset_tokens_table', 1),
(3, '2019_08_19_000000_create_failed_jobs_table', 1),
(4, '2019_12_14_000001_create_personal_access_tokens_table', 1),
(5, '2023_10_03_193322_create_categories_table', 1),
(6, '2023_10_03_193528_create_phrases_table', 1),
(7, '2023_10_27_140811_create_sentences_table', 1),
(8, '2023_11_03_201000_create_category_phrase_table', 1),
(9, '2023_11_03_201102_create_phrase_sentece_table', 1),
(10, '2023_11_03_203542_create_sentece_user_table', 1),
(11, '2023_11_03_203633_create_phrase_user_table', 1);

-- --------------------------------------------------------

--
-- Table structure for table `password_reset_tokens`
--

CREATE TABLE `password_reset_tokens` (
  `email` varchar(255) NOT NULL,
  `token` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `personal_access_tokens`
--

CREATE TABLE `personal_access_tokens` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `tokenable_type` varchar(255) NOT NULL,
  `tokenable_id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `token` varchar(64) NOT NULL,
  `abilities` text DEFAULT NULL,
  `last_used_at` timestamp NULL DEFAULT NULL,
  `expires_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `phrases`
--

CREATE TABLE `phrases` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `title` varchar(255) NOT NULL,
  `description` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `phrases`
--

INSERT INTO `phrases` (`id`, `title`, `description`, `created_at`, `updated_at`) VALUES
(11, 'sentences', NULL, '2023-11-06 17:16:51', '2023-11-06 17:39:46'),
(12, 'remember ', NULL, '2023-11-06 17:39:46', '2023-11-06 17:39:46'),
(13, 'intelligent', NULL, '2023-11-09 09:04:02', '2023-11-09 09:04:02'),
(14, 'hurt', NULL, '2023-11-09 09:08:27', '2023-11-09 09:08:27'),
(15, 'responsibility', NULL, '2023-11-09 09:09:38', '2023-11-09 09:09:38'),
(16, 'protect ', NULL, '2023-11-09 09:09:38', '2023-11-09 09:09:38'),
(17, 'suffer', NULL, '2023-11-09 19:11:12', '2023-11-09 19:11:12'),
(18, 'admit', NULL, '2023-11-09 19:13:40', '2023-11-09 19:13:40'),
(19, 'punishment ', NULL, '2023-11-09 19:14:41', '2023-11-09 19:22:00');

-- --------------------------------------------------------

--
-- Table structure for table `phrase_sentence`
--

CREATE TABLE `phrase_sentence` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `phrase_id` bigint(20) UNSIGNED NOT NULL,
  `sentence_id` bigint(20) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `phrase_sentence`
--

INSERT INTO `phrase_sentence` (`id`, `phrase_id`, `sentence_id`) VALUES
(3, 11, 9),
(6, 13, 11),
(7, 14, 12),
(8, 15, 13),
(9, 16, 13),
(10, 17, 14),
(11, 18, 15),
(12, 19, 16),
(13, 19, 17);

-- --------------------------------------------------------

--
-- Table structure for table `phrase_user`
--

CREATE TABLE `phrase_user` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `phrase_id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `count` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `phrase_user`
--

INSERT INTO `phrase_user` (`id`, `phrase_id`, `user_id`, `count`) VALUES
(1, 11, 2, 2),
(2, 14, 2, 2),
(3, 15, 2, 2),
(4, 16, 2, 2),
(5, 13, 2, 2),
(6, 18, 2, 2),
(7, 17, 2, 1),
(8, 19, 2, 2);

-- --------------------------------------------------------

--
-- Table structure for table `sentences`
--

CREATE TABLE `sentences` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `author_id` bigint(20) UNSIGNED NOT NULL,
  `sentence` text NOT NULL,
  `target_words` varchar(255) DEFAULT NULL,
  `category_id` bigint(20) UNSIGNED NOT NULL,
  `level` tinyint(4) NOT NULL COMMENT '1 to 6',
  `description` text DEFAULT NULL,
  `hide_for_others` tinyint(1) NOT NULL DEFAULT 0,
  `is_active` tinyint(1) NOT NULL DEFAULT 1,
  `like_count` int(11) NOT NULL DEFAULT 0,
  `dislike_count` int(11) NOT NULL DEFAULT 0,
  `view_count` int(11) NOT NULL DEFAULT 0,
  `in_voting` tinyint(1) NOT NULL DEFAULT 0,
  `to_delete_count` int(11) NOT NULL DEFAULT 0 COMMENT 'when in_voting is true',
  `not_to_delete_count` int(11) NOT NULL DEFAULT 0 COMMENT 'when in_voting is true',
  `image` text DEFAULT NULL,
  `video` text DEFAULT NULL,
  `audio` text DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `sentences`
--

INSERT INTO `sentences` (`id`, `author_id`, `sentence`, `target_words`, `category_id`, `level`, `description`, `hide_for_others`, `is_active`, `like_count`, `dislike_count`, `view_count`, `in_voting`, `to_delete_count`, `not_to_delete_count`, `image`, `video`, `audio`, `created_at`, `updated_at`) VALUES
(9, 2, 'The best way to remember new words is to learn them in sentences', 'sentences', 1, 3, NULL, 0, 1, 0, 0, 0, 0, 0, 0, NULL, NULL, NULL, '2023-11-06 17:16:51', '2023-11-06 17:16:51'),
(11, 2, 'It makes the customers feel intelligent', 'intelligent', 1, 3, NULL, 0, 1, 0, 0, 0, 0, 0, 0, NULL, NULL, NULL, '2023-11-09 09:04:02', '2023-11-09 09:04:02'),
(12, 2, 'Sometimes we lie to not hurt someone\'s feelings', 'hurt', 1, 3, NULL, 0, 1, 0, 0, 0, 0, 0, 0, NULL, NULL, NULL, '2023-11-09 09:08:27', '2023-11-09 09:08:27'),
(13, 2, 'I have a responsibility to protect you', 'responsibility,protect ', 1, 3, NULL, 0, 1, 0, 0, 0, 0, 0, 0, NULL, NULL, NULL, '2023-11-09 09:09:38', '2023-11-09 09:09:38'),
(14, 2, 'I suffer from being sick', 'suffer', 1, 2, NULL, 0, 1, 0, 0, 0, 0, 0, 0, NULL, NULL, NULL, '2023-11-09 19:11:12', '2023-11-09 19:11:12'),
(15, 2, 'Most people don\'t admit it, but people often tell lies', 'admit', 1, 3, NULL, 0, 1, 0, 0, 0, 0, 0, 0, NULL, NULL, NULL, '2023-11-09 19:13:40', '2023-11-09 19:13:40'),
(16, 2, 'He is afraid of the punishment', 'punishment', 1, 2, NULL, 0, 1, 0, 0, 0, 0, 0, 0, NULL, NULL, NULL, '2023-11-09 19:14:41', '2023-11-09 19:14:41'),
(17, 2, 'my punishment is no TV for a day', 'punishment ', 1, 2, NULL, 0, 1, 0, 0, 0, 0, 0, 0, NULL, NULL, NULL, '2023-11-09 19:22:00', '2023-11-09 19:22:00');

-- --------------------------------------------------------

--
-- Table structure for table `sentence_user`
--

CREATE TABLE `sentence_user` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `sentence_id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `count` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `sentence_user`
--

INSERT INTO `sentence_user` (`id`, `sentence_id`, `user_id`, `count`) VALUES
(1, 9, 2, 2),
(2, 12, 2, 2),
(3, 13, 2, 2),
(4, 11, 2, 2),
(5, 15, 2, 2),
(6, 14, 2, 1),
(7, 16, 2, 1),
(8, 17, 2, 1);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `is_admin` tinyint(1) NOT NULL DEFAULT 0,
  `name` varchar(255) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) NOT NULL,
  `phone` varchar(255) NOT NULL,
  `remember_token` varchar(100) DEFAULT NULL,
  `first_name` varchar(255) DEFAULT NULL,
  `last_name` varchar(255) DEFAULT NULL,
  `national_code` varchar(255) DEFAULT NULL,
  `ip` varchar(255) DEFAULT NULL,
  `birth_date` timestamp NULL DEFAULT NULL,
  `gender` tinyint(4) DEFAULT NULL,
  `province` varchar(255) DEFAULT NULL,
  `city` varchar(255) DEFAULT NULL,
  `address` text DEFAULT NULL,
  `avatar` text DEFAULT NULL,
  `instagram` varchar(255) DEFAULT NULL,
  `telegram` varchar(255) DEFAULT NULL,
  `news` tinyint(4) NOT NULL DEFAULT 1,
  `is_active` tinyint(1) NOT NULL DEFAULT 1,
  `see_all` tinyint(4) NOT NULL DEFAULT 1 COMMENT '1=all, 2=just my sentences, 3=just other users sentences',
  `editing_score` int(11) NOT NULL DEFAULT 0,
  `adding_score` int(11) NOT NULL DEFAULT 0,
  `practicing_score` int(11) NOT NULL DEFAULT 0,
  `practicing_count` int(11) NOT NULL DEFAULT 0,
  `last_practice_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `is_admin`, `name`, `email`, `email_verified_at`, `password`, `phone`, `remember_token`, `first_name`, `last_name`, `national_code`, `ip`, `birth_date`, `gender`, `province`, `city`, `address`, `avatar`, `instagram`, `telegram`, `news`, `is_active`, `see_all`, `editing_score`, `adding_score`, `practicing_score`, `practicing_count`, `last_practice_at`, `created_at`, `updated_at`) VALUES
(2, 1, NULL, NULL, NULL, '$2y$10$7Wv3bnkAeBHEO7q.XsG6vOFJQP1pcKxTakLkaitJd/JOxHORElGaW', '09185234439', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '/images/avatar.png', NULL, NULL, 1, 1, 1, 0, 80, 214, 0, '2023-11-09 19:50:56', '2023-11-03 18:27:11', '2023-11-09 19:50:56');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `category_phrase`
--
ALTER TABLE `category_phrase`
  ADD PRIMARY KEY (`id`),
  ADD KEY `category_phrase_category_id_index` (`category_id`),
  ADD KEY `category_phrase_phrase_id_index` (`phrase_id`);

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
-- Indexes for table `password_reset_tokens`
--
ALTER TABLE `password_reset_tokens`
  ADD PRIMARY KEY (`email`);

--
-- Indexes for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  ADD KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`);

--
-- Indexes for table `phrases`
--
ALTER TABLE `phrases`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `phrases_title_unique` (`title`);

--
-- Indexes for table `phrase_sentence`
--
ALTER TABLE `phrase_sentence`
  ADD PRIMARY KEY (`id`),
  ADD KEY `phrase_sentece_phrase_id_index` (`phrase_id`),
  ADD KEY `phrase_sentece_sentence_id_index` (`sentence_id`);

--
-- Indexes for table `phrase_user`
--
ALTER TABLE `phrase_user`
  ADD PRIMARY KEY (`id`),
  ADD KEY `phrase_user_phrase_id_index` (`phrase_id`),
  ADD KEY `phrase_user_user_id_index` (`user_id`);

--
-- Indexes for table `sentences`
--
ALTER TABLE `sentences`
  ADD PRIMARY KEY (`id`),
  ADD KEY `sentences_author_id_index` (`author_id`),
  ADD KEY `sentences_category_id_index` (`category_id`);

--
-- Indexes for table `sentence_user`
--
ALTER TABLE `sentence_user`
  ADD PRIMARY KEY (`id`),
  ADD KEY `sentece_user_sentence_id_index` (`sentence_id`),
  ADD KEY `sentece_user_user_id_index` (`user_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_phone_unique` (`phone`),
  ADD UNIQUE KEY `users_national_code_unique` (`national_code`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `category_phrase`
--
ALTER TABLE `category_phrase`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `phrases`
--
ALTER TABLE `phrases`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT for table `phrase_sentence`
--
ALTER TABLE `phrase_sentence`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `phrase_user`
--
ALTER TABLE `phrase_user`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `sentences`
--
ALTER TABLE `sentences`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `sentence_user`
--
ALTER TABLE `sentence_user`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `category_phrase`
--
ALTER TABLE `category_phrase`
  ADD CONSTRAINT `category_phrase_category_id_foreign` FOREIGN KEY (`category_id`) REFERENCES `categories` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `category_phrase_phrase_id_foreign` FOREIGN KEY (`phrase_id`) REFERENCES `phrases` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `phrase_sentence`
--
ALTER TABLE `phrase_sentence`
  ADD CONSTRAINT `phrase_sentece_phrase_id_foreign` FOREIGN KEY (`phrase_id`) REFERENCES `phrases` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `phrase_sentece_sentence_id_foreign` FOREIGN KEY (`sentence_id`) REFERENCES `sentences` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `phrase_user`
--
ALTER TABLE `phrase_user`
  ADD CONSTRAINT `phrase_user_phrase_id_foreign` FOREIGN KEY (`phrase_id`) REFERENCES `phrases` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `phrase_user_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `sentences`
--
ALTER TABLE `sentences`
  ADD CONSTRAINT `sentences_author_id_foreign` FOREIGN KEY (`author_id`) REFERENCES `users` (`id`),
  ADD CONSTRAINT `sentences_category_id_foreign` FOREIGN KEY (`category_id`) REFERENCES `categories` (`id`);

--
-- Constraints for table `sentence_user`
--
ALTER TABLE `sentence_user`
  ADD CONSTRAINT `sentece_user_sentence_id_foreign` FOREIGN KEY (`sentence_id`) REFERENCES `sentences` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `sentece_user_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

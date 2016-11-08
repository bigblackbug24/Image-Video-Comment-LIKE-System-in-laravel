-- phpMyAdmin SQL Dump
-- version 4.0.10deb1
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Jul 14, 2016 at 01:00 PM
-- Server version: 5.5.47-0ubuntu0.14.04.1
-- PHP Version: 5.5.9-1ubuntu4.14

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `location_system`
--

-- --------------------------------------------------------

--
-- Table structure for table `comments`
--

CREATE TABLE IF NOT EXISTS `comments` (
  `comment_id` int(10) NOT NULL AUTO_INCREMENT,
  `comment` varchar(255) NOT NULL,
  `data_id` int(10) NOT NULL,
  `user_id` int(10) unsigned NOT NULL,
  `comment_date` varchar(255) NOT NULL,
  `comment_status` int(10) NOT NULL,
  PRIMARY KEY (`comment_id`),
  KEY `data_id` (`data_id`),
  KEY `user_id` (`user_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=14 ;

--
-- Dumping data for table `comments`
--

INSERT INTO `comments` (`comment_id`, `comment`, `data_id`, `user_id`, `comment_date`, `comment_status`) VALUES
(1, 'dsadas', 6, 1, '2016-06-29 05:23:47', 0),
(2, 'hahaha', 6, 1, '2016-06-29 05:27:55', 0),
(3, 'thats my pic', 5, 1, '2016-06-29 05:30:03', 0),
(4, 'lolx', 6, 1, '2016-06-29 06:45:48', 0),
(5, 'cooolllll', 5, 1, '2016-06-29 06:46:06', 0),
(6, 'nothing yrrr just boriat', 3, 1, '2016-06-29 07:19:29', 0),
(7, 'waooo beauty...', 6, 3, '2016-06-30 05:11:09', 0),
(8, 'lolx', 5, 3, '2016-06-30 05:17:04', 0),
(9, 'q??', 3, 3, '2016-06-30 05:18:13', 0),
(10, 'nice one', 2, 1, '2016-07-11 09:38:24', 0),
(11, 'what', 1, 1, '2016-07-11 13:25:34', 0),
(12, '?', 1, 1, '2016-07-11 13:25:49', 0),
(13, 'nice car', 4, 1, '2016-07-12 12:59:57', 0);

-- --------------------------------------------------------

--
-- Table structure for table `data`
--

CREATE TABLE IF NOT EXISTS `data` (
  `data_id` int(10) NOT NULL AUTO_INCREMENT,
  `status_name` varchar(255) DEFAULT NULL,
  `data_status` int(10) DEFAULT NULL,
  `image` varchar(255) DEFAULT NULL,
  `video` varchar(255) DEFAULT NULL,
  `status_date` varchar(255) DEFAULT NULL,
  `user_id` int(10) unsigned DEFAULT NULL,
  `like_id` int(10) NOT NULL,
  PRIMARY KEY (`data_id`),
  KEY `user_id` (`user_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=8 ;

--
-- Dumping data for table `data`
--

INSERT INTO `data` (`data_id`, `status_name`, `data_status`, `image`, `video`, `status_date`, `user_id`, `like_id`) VALUES
(1, 'helooooooo....', 0, NULL, NULL, '2016', 1, 0),
(2, NULL, 0, 'images/92235.jpg', NULL, '2016', 1, 0),
(3, 'whats up man ???', 0, NULL, NULL, '2016', 1, 0),
(4, NULL, 0, 'images/67235.jpg', NULL, '2016', 1, 0),
(5, NULL, 0, 'images/50886.jpg', NULL, '2016', 1, 0),
(6, 'whats going on.....', 0, NULL, NULL, '2016-06-28 06:01:27', 1, 0),
(7, 'are u ok..???', 0, NULL, NULL, '2016-07-11 12:59:45', 3, 0);

-- --------------------------------------------------------

--
-- Table structure for table `images`
--

CREATE TABLE IF NOT EXISTS `images` (
  `image_id` int(255) NOT NULL AUTO_INCREMENT,
  `image_name` varchar(255) NOT NULL,
  `image_path` varchar(255) NOT NULL,
  `image_date` varchar(255) NOT NULL,
  `user_id` int(10) unsigned NOT NULL,
  PRIMARY KEY (`image_id`),
  UNIQUE KEY `name` (`image_name`),
  KEY `image_date` (`image_date`),
  KEY `user_id` (`user_id`),
  KEY `user_id_2` (`user_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=5 ;

--
-- Dumping data for table `images`
--

INSERT INTO `images` (`image_id`, `image_name`, `image_path`, `image_date`, `user_id`) VALUES
(4, '36749.jpg', 'images', '2016-06-28 04:45:25', 1);

-- --------------------------------------------------------

--
-- Table structure for table `likes`
--

CREATE TABLE IF NOT EXISTS `likes` (
  `like_id` int(10) NOT NULL AUTO_INCREMENT,
  `liked_by` int(10) unsigned NOT NULL,
  `likes_data_id` int(10) NOT NULL,
  PRIMARY KEY (`like_id`),
  KEY `liked_by` (`liked_by`),
  KEY `likes_data_id` (`likes_data_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=54 ;

--
-- Dumping data for table `likes`
--

INSERT INTO `likes` (`like_id`, `liked_by`, `likes_data_id`) VALUES
(36, 1, 4),
(37, 1, 3),
(49, 1, 7),
(51, 1, 7),
(53, 1, 7);

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE IF NOT EXISTS `migrations` (
  `migration` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`migration`, `batch`) VALUES
('2014_10_12_000000_create_users_table', 1),
('2014_10_12_100000_create_password_resets_table', 1);

-- --------------------------------------------------------

--
-- Table structure for table `password_resets`
--

CREATE TABLE IF NOT EXISTS `password_resets` (
  `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  KEY `password_resets_email_index` (`email`),
  KEY `password_resets_token_index` (`token`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `password_resets`
--

INSERT INTO `password_resets` (`email`, `token`, `created_at`) VALUES
('hammad_132@yahoo.com', '0d73386d734797cbe6673c12e70a6024f9459d250d28ed7f15f115046d2ae51b', '2016-06-23 01:38:18');

-- --------------------------------------------------------

--
-- Table structure for table `status`
--

CREATE TABLE IF NOT EXISTS `status` (
  `status_id` int(255) NOT NULL AUTO_INCREMENT,
  `status_name` varchar(255) NOT NULL,
  `status_status` int(255) NOT NULL,
  `status_date` varchar(255) NOT NULL,
  `user_id` int(10) unsigned NOT NULL,
  PRIMARY KEY (`status_id`),
  KEY `user_id` (`user_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=6 ;

--
-- Dumping data for table `status`
--

INSERT INTO `status` (`status_id`, `status_name`, `status_status`, `status_date`, `user_id`) VALUES
(3, 'whats up.....', 0, '2016-06-28 04:45:18', 1),
(4, 'waooooo', 0, '2016-06-28 04:46:21', 1),
(5, 'dasdasda', 0, '2016-06-28 04:49:47', 1);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE IF NOT EXISTS `users` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `role` int(255) NOT NULL,
  `status` int(255) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `users_email_unique` (`email`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=4 ;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `password`, `remember_token`, `created_at`, `updated_at`, `role`, `status`) VALUES
(1, 'usman', 'usman@yahoo.com', '$2y$10$OOqgKiqzkJBhf4t3lTmcfe/iNsl1KBkciipYCuR1mKVaoL9Lf3ibe', 'jJhDCdABQXDnsHKtBKvfzkD1uomcpedKq5vHxVmUQ9t8yaxqL5W1STVxQScs', '0000-00-00 00:00:00', '2016-07-12 07:18:06', 0, 0),
(3, 'usman munir', 'abc@gmail.com', '$2y$10$7aaYSrTh3u7LkzSjPlTc7.WQx/lXa0VM7uRPBSBBPzrlOQgDaDkwi', NULL, '2016-06-23 01:22:58', '2016-06-23 01:22:58', 0, 0);

-- --------------------------------------------------------

--
-- Table structure for table `videos`
--

CREATE TABLE IF NOT EXISTS `videos` (
  `vidoe_id` int(255) NOT NULL AUTO_INCREMENT,
  `vidoe_name` varchar(255) NOT NULL,
  `vidoe_path` varchar(255) NOT NULL,
  `vidoe_date` varchar(255) NOT NULL,
  `user_id` int(10) unsigned NOT NULL,
  PRIMARY KEY (`vidoe_id`),
  KEY `user_id` (`user_id`),
  KEY `vidoe_date` (`vidoe_date`),
  KEY `user_id_2` (`user_id`),
  KEY `user_id_3` (`user_id`),
  KEY `user_id_4` (`user_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `comments`
--
ALTER TABLE `comments`
  ADD CONSTRAINT `comment_data_fk` FOREIGN KEY (`data_id`) REFERENCES `data` (`data_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `comment_user_fk` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `data`
--
ALTER TABLE `data`
  ADD CONSTRAINT `data_user_fk` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `images`
--
ALTER TABLE `images`
  ADD CONSTRAINT `user_fk` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `likes`
--
ALTER TABLE `likes`
  ADD CONSTRAINT `data_id` FOREIGN KEY (`likes_data_id`) REFERENCES `data` (`data_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `like_user_fk` FOREIGN KEY (`liked_by`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `status`
--
ALTER TABLE `status`
  ADD CONSTRAINT `status_fk` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `videos`
--
ALTER TABLE `videos`
  ADD CONSTRAINT `videos_users_fk` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

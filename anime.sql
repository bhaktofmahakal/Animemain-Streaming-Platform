-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 01, 2026 at 07:21 AM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.1.25

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `anime`
--

CREATE DATABASE IF NOT EXISTS `anime` DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci;
USE `anime`;

-- --------------------------------------------------------

--
-- Table structure for table `admins`
--

DROP TABLE IF EXISTS `admins`;
CREATE TABLE IF NOT EXISTS `admins` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `email` varchar(200) NOT NULL,
  `adminname` varchar(200) NOT NULL,
  `password` varchar(200) NOT NULL,
  `created_at` datetime NOT NULL DEFAULT current_timestamp(),
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `admins`
--
-- Default admin credentials: email: admin@example.com / password hash: $2y$10$PYALDOrXTKOVfqmyLBGEoepRpLyOub2ITx79k9kptwY1YJAPFYxve
--

INSERT INTO `admins` (`id`, `email`, `adminname`, `password`, `created_at`) VALUES
(1, 'admin@example.com', 'admin@example.com', '$2y$10$PYALDOrXTKOVfqmyLBGEoepRpLyOub2ITx79k9kptwY1YJAPFYxve', '2025-04-07 10:51:54');

-- --------------------------------------------------------

--
-- Table structure for table `comments`
--

DROP TABLE IF EXISTS `comments`;
CREATE TABLE IF NOT EXISTS `comments` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `comment` varchar(200) NOT NULL,
  `show_id` int(10) NOT NULL,
  `user_id` int(10) NOT NULL,
  `user_name` varchar(200) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=18 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `comments`
--

INSERT INTO `comments` (`id`, `comment`, `show_id`, `user_id`, `user_name`, `created_at`) VALUES
(1, 'wohhh nice', 2, 3, 'moviesf14@gmail.com', '2025-04-07 05:18:50'),
(2, 'very good', 2, 3, 'moviesf14@gmail.com', '2025-04-07 05:19:04');

-- --------------------------------------------------------

--
-- Table structure for table `episodes`
--

DROP TABLE IF EXISTS `episodes`;
CREATE TABLE IF NOT EXISTS `episodes` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `video` varchar(200) NOT NULL,
  `thumbnail` varchar(200) NOT NULL,
  `show_id` int(10) NOT NULL,
  `name` varchar(200) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `episodes`
--

INSERT INTO `episodes` (`id`, `video`, `thumbnail`, `show_id`, `name`, `created_at`) VALUES
(1, '1.mp4', 'anime-watch.jpg', 1, '1', '2024-05-21 11:15:49'),
(2, '2.mp4', 'anime-watch.jpg', 1, '2', '2024-05-21 11:15:49'),
(4, '2.mp4', 'anime-watch.jpg', 2, '1', '2024-05-21 11:15:49');

-- --------------------------------------------------------

--
-- Table structure for table `followings`
--

DROP TABLE IF EXISTS `followings`;
CREATE TABLE IF NOT EXISTS `followings` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `show_id` int(10) NOT NULL,
  `user_id` int(10) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `followings`
--

INSERT INTO `followings` (`id`, `show_id`, `user_id`, `created_at`) VALUES
(8, 1, 2, '2024-05-24 11:03:45'),
(9, 2, 2, '2024-05-24 11:39:12');

-- --------------------------------------------------------

--
-- Table structure for table `genres`
--

DROP TABLE IF EXISTS `genres`;
CREATE TABLE IF NOT EXISTS `genres` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `name` varchar(200) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `genres`
--

INSERT INTO `genres` (`id`, `name`, `created_at`) VALUES
(1, 'Action', '2024-05-20 11:25:03'),
(2, 'Adventure', '2024-05-20 11:25:03'),
(3, 'Magic', '2024-05-20 11:25:03');

-- --------------------------------------------------------

--
-- Table structure for table `shows`
--

DROP TABLE IF EXISTS `shows`;
CREATE TABLE IF NOT EXISTS `shows` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `title` varchar(200) NOT NULL,
  `description` text NOT NULL,
  `type` varchar(200) NOT NULL,
  `studios` varchar(200) NOT NULL,
  `date_aired` varchar(200) NOT NULL,
  `status` varchar(200) NOT NULL,
  `genre` varchar(200) NOT NULL,
  `duration` varchar(200) NOT NULL,
  `quality` varchar(200) NOT NULL,
  `num_available` int(10) NOT NULL,
  `num_total` int(10) NOT NULL,
  `image` varchar(200) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `shows`
--

INSERT INTO `shows` (`id`, `title`, `description`, `type`, `studios`, `date_aired`, `status`, `genre`, `duration`, `quality`, `num_available`, `num_total`, `image`, `created_at`) VALUES
(1, 'Naruto', 'Naruto Uzumaki, a mischievous adolescent ninja, struggles as he searches for recognition and dreams of becoming the Hokage, the village\'s leader and strongest ninja.', 'Tv Series', 'Pierrot', 'Oct 3, 2002', 'Finished Airing', 'Action', '23 min/ep', 'HD', 220, 220, 'naruto.jpg', '2024-05-20 11:30:00'),
(2, 'One Piece', 'Gol D. Roger was known as the Pirate King, the strongest and most infamous being to have sailed the Grand Line. The capture and execution of Roger by the World Government brought a change throughout the world.', 'Tv Series', 'Toei Animation', 'Oct 20, 1999', 'Currently Airing', 'Adventure', '24 min/ep', 'HD', 1000, 1000, 'one-piece.jpg', '2024-05-20 11:35:00'),
(3, 'Fairy Tail', 'Lucy is a 17-year-old girl who wants to be a full-fledged mage. One day when visiting Hargeon Town, she meets a young man named Natsu who is in town looking for someone.', 'Tv Series', 'A-1 Pictures', 'Oct 12, 2009', 'Finished Airing', 'Magic', '24 min/ep', 'HD', 175, 175, 'fairy-tail.jpg', '2024-05-20 11:40:00');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

DROP TABLE IF EXISTS `users`;
CREATE TABLE IF NOT EXISTS `users` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `email` varchar(200) NOT NULL,
  `username` varchar(200) NOT NULL,
  `password` varchar(200) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `users`
--
-- Sample user credentials: password for all sample users is: password
--

INSERT INTO `users` (`id`, `email`, `username`, `password`, `created_at`) VALUES
(2, 'user@example.com', 'sampleuser', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', '2024-05-20 11:00:00'),
(3, 'user2@example.com', 'sampleuser2', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', '2025-04-07 04:50:00');

-- --------------------------------------------------------

--
-- Table structure for table `views`
--

DROP TABLE IF EXISTS `views`;
CREATE TABLE IF NOT EXISTS `views` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `show_id` int(10) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=20 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `views`
--

INSERT INTO `views` (`id`, `show_id`, `created_at`) VALUES
(1, 1, '2024-05-21 10:00:00'),
(2, 1, '2024-05-21 10:05:00'),
(3, 1, '2024-05-21 10:10:00'),
(4, 2, '2024-05-21 10:15:00'),
(5, 2, '2024-05-21 10:20:00'),
(6, 3, '2024-05-21 10:25:00'),
(7, 1, '2024-05-22 10:00:00'),
(8, 2, '2024-05-22 10:05:00'),
(9, 3, '2024-05-22 10:10:00'),
(10, 1, '2024-05-23 10:00:00');

COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

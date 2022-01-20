-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Jan 20, 2022 at 11:09 PM
-- Server version: 5.7.31
-- PHP Version: 7.3.21

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `chatapp`
--

-- --------------------------------------------------------

--
-- Table structure for table `messages`
--

DROP TABLE IF EXISTS `messages`;
CREATE TABLE IF NOT EXISTS `messages` (
  `msg_id` int(11) NOT NULL AUTO_INCREMENT,
  `incoming_msg_id` int(255) NOT NULL,
  `outgoing_msg_id` int(255) NOT NULL,
  `msg` varchar(1000) NOT NULL,
  PRIMARY KEY (`msg_id`)
) ENGINE=InnoDB AUTO_INCREMENT=14 DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `messages`
--

INSERT INTO `messages` (`msg_id`, `incoming_msg_id`, `outgoing_msg_id`, `msg`) VALUES
(1, 1152989886, 1499109842, 'This is a test chat'),
(2, 1499109842, 1152989886, 'another test chat'),
(3, 1152989886, 1499109842, 'hello'),
(4, 1499109842, 1152989886, 'hi'),
(5, 1152989886, 1499109842, '1'),
(6, 1152989886, 1499109842, '2'),
(7, 1152989886, 1499109842, '3'),
(8, 1499109842, 1152989886, 'test'),
(9, 1499109842, 1152989886, 'play a quick game'),
(10, 1152989886, 1499109842, 'invite me'),
(11, 1499109842, 1152989886, '1'),
(12, 1499109842, 1152989886, '2'),
(13, 1499109842, 1152989886, '3');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

DROP TABLE IF EXISTS `users`;
CREATE TABLE IF NOT EXISTS `users` (
  `user_id` int(11) NOT NULL AUTO_INCREMENT,
  `unique_id` int(255) NOT NULL,
  `fname` varchar(255) NOT NULL,
  `lname` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `img` varchar(255) NOT NULL,
  `status` varchar(255) NOT NULL,
  `game` varchar(255) NOT NULL,
  `uname` varchar(255) NOT NULL,
  PRIMARY KEY (`user_id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`user_id`, `unique_id`, `fname`, `lname`, `email`, `password`, `img`, `status`, `game`, `uname`) VALUES
(1, 167108667, 'trisha', 'bor', 'margaret@yahoo.com', '25d55ad283aa400af464c76d713c07ad', '1642701280ale.jpg', 'Offline now', 'Valorant', 'tisang'),
(2, 1522819162, 'risc', 'bor', 'riscbor@yahoo.com', '25d55ad283aa400af464c76d713c07ad', '1642701347bg.jpg', 'Offline now', 'Valorant', 'Anit'),
(3, 1621009759, 'lyle', 'bor', 'lylebor@yahoo.com', '25d55ad283aa400af464c76d713c07ad', '1642707703kj2.jpg', 'Offline now', 'Dota 2', 'lyle21'),
(4, 1152989886, 'Terence', 'Borromeo', 'lyleborromeo21@yahoo.com', '25d55ad283aa400af464c76d713c07ad', '1642717186kj2.jpg', 'Offline now', 'Valorant', 'lyle'),
(5, 1499109842, 'margaret', 'borromeo', 'margaret@gmail.com', '25d55ad283aa400af464c76d713c07ad', '1642717259kj.jpg', 'Offline now', 'Valorant', 'tisang');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

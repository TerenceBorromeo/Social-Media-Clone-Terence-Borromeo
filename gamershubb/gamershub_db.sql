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
-- Database: `gamershub_db`
--

-- --------------------------------------------------------

--
-- Table structure for table `chat_messages`
--

DROP TABLE IF EXISTS `chat_messages`;
CREATE TABLE IF NOT EXISTS `chat_messages` (
  `msg_id` int(11) NOT NULL AUTO_INCREMENT,
  `incoming_msg_id` int(255) NOT NULL,
  `outgoing_msg_id` int(255) NOT NULL,
  `msg` varchar(1000) NOT NULL,
  PRIMARY KEY (`msg_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `chat_users`
--

DROP TABLE IF EXISTS `chat_users`;
CREATE TABLE IF NOT EXISTS `chat_users` (
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
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `content_i_follow`
--

DROP TABLE IF EXISTS `content_i_follow`;
CREATE TABLE IF NOT EXISTS `content_i_follow` (
  `id` bigint(20) NOT NULL AUTO_INCREMENT,
  `userid` bigint(20) DEFAULT NULL,
  `contentid` bigint(20) DEFAULT NULL,
  `content_type` varchar(10) DEFAULT NULL,
  `disabled` tinyint(1) DEFAULT '0',
  `date` datetime NOT NULL,
  PRIMARY KEY (`id`),
  KEY `userid` (`userid`),
  KEY `contentid` (`contentid`),
  KEY `content_type` (`content_type`),
  KEY `disabled` (`disabled`),
  KEY `date` (`date`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `content_i_follow`
--

INSERT INTO `content_i_follow` (`id`, `userid`, `contentid`, `content_type`, `disabled`, `date`) VALUES
(1, 6962697923, 41695513021924, 'post', 0, '2022-01-20 22:15:50'),
(2, 49336043028125659, 35909358, 'post', 0, '2022-01-20 22:17:57');

-- --------------------------------------------------------

--
-- Table structure for table `likes`
--

DROP TABLE IF EXISTS `likes`;
CREATE TABLE IF NOT EXISTS `likes` (
  `id` bigint(20) NOT NULL AUTO_INCREMENT,
  `type` varchar(10) DEFAULT NULL,
  `likes` text,
  `contentid` bigint(20) DEFAULT NULL,
  `following` text,
  PRIMARY KEY (`id`),
  KEY `type` (`type`),
  KEY `contentid` (`contentid`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `likes`
--

INSERT INTO `likes` (`id`, `type`, `likes`, `contentid`, `following`) VALUES
(1, 'post', '[]', 131411, NULL),
(2, 'user', '[{\"userid\":\"6962697923\",\"date\":\"2022-01-20 22:14:38\"}]', 49336043028125659, NULL),
(3, 'user', NULL, 6962697923, '[{\"userid\":\"49336043028125659\",\"date\":\"2022-01-20 22:14:39\"}]'),
(4, 'post', '[{\"userid\":\"6962697923\",\"date\":\"2022-01-20 22:15:26\"}]', 41695513021924, NULL),
(5, 'post', '[{\"userid\":\"49336043028125659\",\"date\":\"2022-01-20 22:18:38\"},{\"userid\":\"6962697923\",\"date\":\"2022-01-20 22:25:03\"}]', 35909358, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `notifications`
--

DROP TABLE IF EXISTS `notifications`;
CREATE TABLE IF NOT EXISTS `notifications` (
  `id` bigint(20) NOT NULL AUTO_INCREMENT,
  `userid` bigint(20) DEFAULT NULL,
  `activity` varchar(10) DEFAULT NULL,
  `contentid` bigint(20) DEFAULT NULL,
  `content_owner` bigint(20) DEFAULT NULL,
  `content_type` varchar(10) DEFAULT NULL,
  `date` datetime NOT NULL,
  PRIMARY KEY (`id`),
  KEY `userid` (`userid`),
  KEY `activity` (`activity`),
  KEY `contentid` (`contentid`),
  KEY `content_owner` (`content_owner`),
  KEY `content_owner_2` (`content_owner`),
  KEY `content_type` (`content_type`),
  KEY `date` (`date`)
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `notifications`
--

INSERT INTO `notifications` (`id`, `userid`, `activity`, `contentid`, `content_owner`, `content_type`, `date`) VALUES
(1, 6962697923, 'like', 131411, 6962697923, 'post', '2022-01-20 22:09:50'),
(2, 6962697923, 'like', 131411, 6962697923, 'post', '2022-01-20 22:10:53'),
(3, 6962697923, 'follow', 49336043028125659, 49336043028125659, 'profile', '2022-01-20 22:14:39'),
(4, 6962697923, 'like', 41695513021924, 49336043028125659, 'post', '2022-01-20 22:15:26'),
(5, 6962697923, 'comment', 41695513021924, 49336043028125659, 'post', '2022-01-20 22:15:50'),
(6, 6962697923, 'tag', 35909358, 49336043028125659, 'post', '2022-01-20 22:17:16'),
(7, 49336043028125659, 'comment', 35909358, 6962697923, 'post', '2022-01-20 22:17:57'),
(8, 6962697923, 'like', 35909358, 6962697923, 'post', '2022-01-20 22:18:33'),
(9, 49336043028125659, 'like', 35909358, 6962697923, 'post', '2022-01-20 22:18:38'),
(10, 6962697923, 'like', 35909358, 6962697923, 'post', '2022-01-20 22:25:03');

-- --------------------------------------------------------

--
-- Table structure for table `notification_seen`
--

DROP TABLE IF EXISTS `notification_seen`;
CREATE TABLE IF NOT EXISTS `notification_seen` (
  `id` bigint(20) NOT NULL AUTO_INCREMENT,
  `userid` bigint(20) DEFAULT NULL,
  `notification_id` bigint(20) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `userid` (`userid`),
  KEY `notification_id` (`notification_id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `notification_seen`
--

INSERT INTO `notification_seen` (`id`, `userid`, `notification_id`) VALUES
(1, 49336043028125659, 5),
(2, 49336043028125659, 6),
(3, 6962697923, 7);

-- --------------------------------------------------------

--
-- Table structure for table `posts`
--

DROP TABLE IF EXISTS `posts`;
CREATE TABLE IF NOT EXISTS `posts` (
  `id` bigint(20) NOT NULL AUTO_INCREMENT,
  `postid` bigint(20) NOT NULL,
  `post` text NOT NULL,
  `image` varchar(500) DEFAULT NULL,
  `has_image` tinyint(1) DEFAULT NULL,
  `is_profile_image` tinyint(1) DEFAULT NULL,
  `is_cover_image` tinyint(1) DEFAULT NULL,
  `parent` bigint(20) DEFAULT NULL,
  `date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `userid` bigint(20) DEFAULT NULL,
  `likes` int(11) DEFAULT NULL,
  `comments` int(11) DEFAULT NULL,
  `tags` varchar(2048) DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `postid` (`postid`),
  KEY `image` (`image`),
  KEY `parent` (`parent`),
  KEY `date` (`date`),
  KEY `userid` (`userid`),
  KEY `tags` (`tags`),
  KEY `comments` (`comments`),
  KEY `likes` (`likes`)
) ENGINE=InnoDB AUTO_INCREMENT=17 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `posts`
--

INSERT INTO `posts` (`id`, `postid`, `post`, `image`, `has_image`, `is_profile_image`, `is_cover_image`, `parent`, `date`, `userid`, `likes`, `comments`, `tags`) VALUES
(1, 4765295737432420669, '', 'uploads/49336043028125659/9BJlqeKoLfSsfrz.jpg', 1, 1, 0, 0, '2022-01-20 22:05:36', 49336043028125659, 0, 0, '[]'),
(2, 41695513021924, '', 'uploads/49336043028125659/UGepKEm9MRJycH7.jpg', 1, 0, 1, 0, '2022-01-20 22:05:42', 49336043028125659, 1, 2, '[]'),
(3, 668685750673756208, '', 'uploads/6962697923/sQtycAG80XUOOdO.jpg', 1, 1, 0, 0, '2022-01-20 22:09:27', 6962697923, 0, 1, '[]'),
(4, 67318888278243027, '', 'uploads/6962697923/ScJGsILZWo6wlh9.jpg', 1, 0, 1, 0, '2022-01-20 22:09:35', 6962697923, 0, 1, '[]'),
(8, 9364838338163, 'a comment on a cover photo', '', 0, 0, 0, 67318888278243027, '2022-01-20 22:13:11', 6962697923, 0, 0, '[]'),
(9, 7360196, 'a comment on a profile picture', '', 0, 0, 0, 668685750673756208, '2022-01-20 22:13:22', 6962697923, 0, 0, '[]'),
(10, 8054320478509, 'this is a test to notify comment', '', 0, 0, 0, 41695513021924, '2022-01-20 22:15:50', 6962697923, 0, 0, '[]'),
(11, 5317, 'this is a test comment', '', 0, 0, 0, 41695513021924, '2022-01-20 22:16:12', 49336043028125659, 0, 0, '[]'),
(12, 35909358, 'Hello @ale', '', 0, 0, 0, 0, '2022-01-20 22:17:16', 6962697923, 2, 4, '[\"ale\"]'),
(13, 7877614902835692, 'Hello @lyle do you want to play a game', '', 0, 0, 0, 35909358, '2022-01-20 22:17:57', 49336043028125659, 0, 0, '[]'),
(14, 546658249134, '1', '', 0, 0, 0, 35909358, '2022-01-20 22:25:08', 6962697923, 0, 0, '[]'),
(15, 71079731877, '3', '', 0, 0, 0, 35909358, '2022-01-20 22:25:10', 6962697923, 0, 0, '[]'),
(16, 473995748358226618, '4', '', 0, 0, 0, 35909358, '2022-01-20 22:25:13', 6962697923, 0, 0, '[]');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

DROP TABLE IF EXISTS `users`;
CREATE TABLE IF NOT EXISTS `users` (
  `id` bigint(20) NOT NULL AUTO_INCREMENT,
  `userid` bigint(20) NOT NULL,
  `first_name` varchar(20) NOT NULL,
  `last_name` varchar(20) NOT NULL,
  `gender` varchar(6) NOT NULL,
  `profile_image` varchar(500) DEFAULT NULL,
  `cover_image` varchar(500) DEFAULT NULL,
  `date` datetime DEFAULT NULL,
  `online` int(11) DEFAULT NULL,
  `email` varchar(100) NOT NULL,
  `password` varchar(64) NOT NULL,
  `url_address` varchar(100) NOT NULL,
  `likes` int(11) NOT NULL,
  `about` text,
  `tag_name` varchar(20) DEFAULT NULL,
  `username` varchar(19) DEFAULT NULL,
  `game` varchar(19) DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `first_name` (`first_name`),
  KEY `userid` (`userid`),
  KEY `last_name` (`last_name`),
  KEY `gender` (`gender`),
  KEY `profile_image` (`profile_image`),
  KEY `cover_image` (`cover_image`),
  KEY `date` (`date`),
  KEY `online` (`online`),
  KEY `email` (`email`),
  KEY `url_address` (`url_address`),
  KEY `likes` (`likes`),
  KEY `tag_name` (`tag_name`),
  KEY `username` (`username`),
  KEY `game` (`game`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `userid`, `first_name`, `last_name`, `gender`, `profile_image`, `cover_image`, `date`, `online`, `email`, `password`, `url_address`, `likes`, `about`, `tag_name`, `username`, `game`) VALUES
(1, 49336043028125659, 'Alescha', 'Ruz', 'Female', 'uploads/49336043028125659/9BJlqeKoLfSsfrz.jpg', 'uploads/49336043028125659/UGepKEm9MRJycH7.jpg', NULL, 1642717390, 'aleruz19@gmail.com', '7110eda4d09e062aa5e4a390b0a572ac0d2c0220', 'ale', 1, NULL, 'ale', 'ale', 'Mobile Legends'),
(2, 6962697923, 'lyle', 'terence', 'Male', 'uploads/6962697923/sQtycAG80XUOOdO.jpg', 'uploads/6962697923/ScJGsILZWo6wlh9.jpg', NULL, 1642717525, 'lyleborromeo21@gmail.com', '7c222fb2927d828af22f592134e8932480637c0d', 'lyle', 0, NULL, 'lyle', 'lylee', 'Valorant');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `likes`
--
ALTER TABLE `likes` ADD FULLTEXT KEY `likes` (`likes`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

-- phpMyAdmin SQL Dump
-- version 5.0.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 18, 2021 at 07:31 AM
-- Server version: 10.4.17-MariaDB
-- PHP Version: 7.3.27

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `koshisale`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin_users`
--

CREATE TABLE `admin_users` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `addes_on` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `admin_users`
--

INSERT INTO `admin_users` (`id`, `name`, `password`, `addes_on`) VALUES
(1, 'admin', '$2y$10$GzlXWuQz0eJEBhKdsGIGVeIXAZ6UaXn0bWww3tE88dq9s29te5NCW', '2021-03-03 09:21:39');

-- --------------------------------------------------------

--
-- Table structure for table `cart`
--

CREATE TABLE `cart` (
  `cartID` int(11) NOT NULL,
  `pid` int(11) NOT NULL,
  `uid` int(11) NOT NULL,
  `qty` int(11) NOT NULL,
  `total` float NOT NULL,
  `status` tinyint(2) NOT NULL,
  `uniqueId` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `cart`
--

INSERT INTO `cart` (`cartID`, `pid`, `uid`, `qty`, `total`, `status`, `uniqueId`) VALUES
(174, 11, 13, 1, 900, 0, '607040bf6cde92021-04-0901:55:43pm'),
(177, 8, 13, 2, 2000, 0, '60704df598d2d2021-04-0902:52:05pm'),
(178, 4, 13, 3, 3600, 0, '60704f064130d2021-04-0902:56:38pm'),
(179, 11, 13, 2, 1800, 0, '60704f064130d2021-04-0902:56:38pm'),
(180, 9, 13, 1, 500, 0, '60704f064130d2021-04-0902:56:38pm'),
(181, 14, 13, 2, 800, 0, '60704f4ddb5862021-04-0902:57:49pm'),
(182, 9, 13, 1, 500, 0, '60704f4ddb5862021-04-0902:57:49pm'),
(183, 9, 13, 1, 500, 0, '6070511821fe32021-04-0903:05:28pm'),
(184, 7, 13, 1, 1350, 0, '6070515a1fb7f2021-04-0903:06:34pm'),
(185, 3, 13, 1, 110900, 0, '6071032a31ee22021-04-1003:45:14am'),
(186, 11, 13, 1, 900, 0, '607106cb2fb642021-04-1004:00:43am'),
(187, 15, 13, 1, 150000, 0, '607109bfe57002021-04-1004:13:19am'),
(188, 11, 13, 1, 900, 0, '607109bfe57002021-04-1004:13:19am'),
(189, 14, 13, 1, 400, 0, '60710afdd72972021-04-1004:18:37am'),
(190, 11, 13, 1, 900, 0, '60710afdd72972021-04-1004:18:37am'),
(191, 7, 13, 1, 1350, 0, '60710c73a9dd72021-04-1004:24:51am'),
(192, 11, 13, 1, 900, 0, '60710d9d174782021-04-1004:29:49am'),
(193, 14, 13, 1, 400, 0, '607112050a5062021-04-1004:48:37am'),
(194, 6, 13, 2, 3000, 0, '607115161a5d82021-04-1005:01:42am'),
(195, 15, 13, 1, 150000, 0, '607115161a5d82021-04-1005:01:42am'),
(197, 11, 13, 1, 900, 0, '60742a08a61fd2021-04-1201:07:52pm'),
(198, 8, 13, 1, 1000, 0, '60742b90f3da02021-04-1201:14:24pm'),
(199, 7, 13, 1, 1350, 0, '60742c5326b902021-04-1201:17:39pm'),
(200, 11, 13, 16, 14400, 0, '60742d0a447012021-04-1201:20:42pm'),
(201, 9, 13, 16, 8000, 0, '60742d0a447012021-04-1201:20:42pm'),
(203, 14, 13, 1, 400, 0, '60769d6ab07c42021-04-1409:44:42am'),
(205, 8, 2, 2, 2000, 0, '60781301d50b32021-04-1512:18:41pm'),
(206, 11, 2, 1, 900, 0, '60781301d50b32021-04-1512:18:41pm'),
(207, 15, 2, 2, 300000, 0, '60781301d50b32021-04-1512:18:41pm'),
(208, 15, 2, 1, 150000, 0, '6078137c76d412021-04-1512:20:44pm');

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `id` int(11) NOT NULL,
  `categories` varchar(255) NOT NULL,
  `status` tinyint(4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`id`, `categories`, `status`) VALUES
(1, 'Mobile', 1),
(2, 'Man', 1),
(4, 'Woman', 1),
(7, 'Car', 1);

-- --------------------------------------------------------

--
-- Table structure for table `contact_us`
--

CREATE TABLE `contact_us` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(75) NOT NULL,
  `mobile` varchar(15) NOT NULL,
  `comment` text NOT NULL,
  `added_on` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `contact_us`
--

INSERT INTO `contact_us` (`id`, `name`, `email`, `mobile`, `comment`, `added_on`) VALUES
(5, 'shah', 'shah@shah.com', '9816745048', 'hello world', '2021-03-13 08:02:29'),
(7, 'kartik', 'kartik@gmail.com', '9816745048', 'hello world', '2021-03-14 15:58:56'),
(8, 'T-shirt ', 'ram@gmail.com', '9816745048', 'nice message', '2021-03-24 12:31:58'),
(9, 'lax', 'lax011011@gmail.com', '9816745048', 'lovely', '2021-03-24 12:33:28'),
(11, 'ram', 'ram@gmail.com', '9816745049', 'nice product ', '2021-04-14 17:44:34');

-- --------------------------------------------------------

--
-- Table structure for table `delivery`
--

CREATE TABLE `delivery` (
  `did` int(11) NOT NULL,
  `uid` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `mobile` varchar(15) NOT NULL,
  `address` varchar(250) NOT NULL,
  `uniqueId` varchar(100) NOT NULL,
  `isPaid` tinyint(4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `delivery`
--

INSERT INTO `delivery` (`did`, `uid`, `name`, `mobile`, `address`, `uniqueId`, `isPaid`) VALUES
(6, 13, 'lax', '9816745048', 'gachepani', '', 1),
(7, 13, 'lax', '9816745048', 'gachepani', '', 1),
(8, 13, 'lax', '9816745048', 'pokhara12', '', 1),
(9, 13, 'lax', '9816745048', 'bhimad', '60710afdd72972021-04-1004:18:37am', 1),
(10, 13, 'lax', '9816745048', 'kaski', '607112050a5062021-04-1004:48:37am', 1),
(11, 13, 'lax', '9816745048', 'mustang', '607115161a5d82021-04-1005:01:42am', 1),
(12, 13, 'lax', '9816745048', 'pokhara', '60742a08a61fd2021-04-1201:07:52pm', 1),
(13, 13, 'lax', '9816745048', 'pokhara', '60742b90f3da02021-04-1201:14:24pm', 1),
(14, 13, 'lax', '9816745048', 'pokhara', '60742c5326b902021-04-1201:17:39pm', 1),
(15, 13, 'lax', '9816745048', 'pokhara', '60742d0a447012021-04-1201:20:42pm', 1),
(16, 13, 'lax', '9816745048', 'pokhara', '60769d6ab07c42021-04-1409:44:42am', 1),
(17, 13, 'lax', '9816745048', 'pokhara', '', 0),
(18, 2, 'ram', '9816745048', 'shuklagandaki 5, tanahun', '60781301d50b32021-04-1512:18:41pm', 1),
(19, 2, 'ram', '9816745048', 'shuklagandaki 5, tanahun', '6078137c76d412021-04-1512:20:44pm', 1);

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `oid` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `mobile` varchar(15) NOT NULL,
  `uid` int(11) NOT NULL,
  `total` float NOT NULL,
  `paymentType` varchar(50) NOT NULL,
  `uniqueId` varchar(100) NOT NULL,
  `status` tinyint(1) NOT NULL,
  `isDelivered` tinyint(1) NOT NULL,
  `added_on` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`oid`, `name`, `mobile`, `uid`, `total`, `paymentType`, `uniqueId`, `status`, `isDelivered`, `added_on`) VALUES
(412, '', '', 13, 400, 'Online payment', '60703eb2d264a2021-04-0901:46:58pm', 0, 0, '2021-04-09 11:46:58'),
(413, '', '', 13, 400, 'Online payment', '60703f31074912021-04-0901:49:05pm', 0, 0, '2021-04-09 11:49:05'),
(414, '', '', 13, 400, 'Online payment', '60703f3bebcbc2021-04-0901:49:15pm', 0, 0, '2021-04-09 11:49:15'),
(415, '', '', 13, 900, 'Online payment', '60704071c98c92021-04-0901:54:25pm', 0, 0, '2021-04-09 11:54:25'),
(416, '', '', 13, 900, 'COD', '607040bf6cde92021-04-0901:55:43pm', 1, 0, '2021-04-09 11:55:43'),
(417, '', '', 13, 150000, 'Online payment', '60704207a99c72021-04-0902:01:11pm', 0, 0, '2021-04-09 12:01:11'),
(418, '', '', 13, 150000, 'Online payment', '607042ada59ad2021-04-0902:03:57pm', 0, 0, '2021-04-09 12:03:57'),
(419, '', '', 13, 150000, 'Online payment', '607042b36bfa22021-04-0902:04:03pm', 0, 0, '2021-04-09 12:04:03'),
(420, '', '', 13, 150000, 'Online payment', '607042caa45872021-04-0902:04:26pm', 0, 0, '2021-04-09 12:04:26'),
(421, '', '', 13, 150000, 'Online payment', '607042f2dd1e62021-04-0902:05:06pm', 0, 0, '2021-04-09 12:05:06'),
(422, '', '', 13, 150000, 'Online payment', '60704334d207a2021-04-0902:06:12pm', 0, 0, '2021-04-09 12:06:12'),
(423, '', '', 13, 150000, 'Online payment', '6070434eb9dea2021-04-0902:06:38pm', 0, 0, '2021-04-09 12:06:38'),
(424, '', '', 13, 150000, 'Online payment', '6070438cb88a92021-04-0902:07:40pm', 0, 0, '2021-04-09 12:07:40'),
(425, '', '', 13, 150000, 'Online payment', '607043b43ad8f2021-04-0902:08:20pm', 0, 0, '2021-04-09 12:08:20'),
(426, '', '', 13, 150000, 'Online payment', '607043be2a8792021-04-0902:08:30pm', 0, 0, '2021-04-09 12:08:30'),
(427, '', '', 13, 150000, 'Online payment', '607043da3b0582021-04-0902:08:58pm', 0, 0, '2021-04-09 12:08:58'),
(428, '', '', 13, 150000, 'Online payment', '607043de837c22021-04-0902:09:02pm', 0, 0, '2021-04-09 12:09:02'),
(429, '', '', 13, 150000, 'Online payment', '607043ed4fbfd2021-04-0902:09:17pm', 0, 0, '2021-04-09 12:09:17'),
(430, '', '', 13, 150000, 'Online payment', '6070440128c6c2021-04-0902:09:37pm', 0, 0, '2021-04-09 12:09:37'),
(431, '', '', 13, 150000, 'Online payment', '60704416690cc2021-04-0902:09:58pm', 0, 0, '2021-04-09 12:09:58'),
(432, '', '', 13, 150000, 'Online payment', '6070455fa464a2021-04-0902:15:27pm', 0, 0, '2021-04-09 12:15:27'),
(433, '', '', 13, 150000, 'Online payment', '60704563067822021-04-0902:15:31pm', 0, 0, '2021-04-09 12:15:31'),
(434, '', '', 13, 150000, 'Online payment', '607045fdbabc92021-04-0902:18:05pm', 0, 0, '2021-04-09 12:18:05'),
(435, '', '', 13, 150000, 'Online payment', '60704709414e02021-04-0902:22:33pm', 0, 0, '2021-04-09 12:22:33'),
(436, '', '', 13, 150000, 'Online payment', '6070470c51e792021-04-0902:22:36pm', 0, 0, '2021-04-09 12:22:36'),
(437, '', '', 13, 150000, 'Online payment', '60704b315f4f02021-04-0902:40:17pm', 0, 0, '2021-04-09 12:40:17'),
(438, '', '', 13, 150000, 'Online payment', '60704b83275592021-04-0902:41:39pm', 0, 0, '2021-04-09 12:41:39'),
(439, '', '', 13, 150000, 'Online payment', '60704c6e505b02021-04-0902:45:34pm', 0, 0, '2021-04-09 12:45:34'),
(440, '', '', 13, 150000, 'Online payment', '60704c8b4fd702021-04-0902:46:03pm', 0, 0, '2021-04-09 12:46:03'),
(441, '', '', 13, 150000, 'Online payment', '60704c9a19e052021-04-0902:46:18pm', 0, 0, '2021-04-09 12:46:18'),
(442, '', '', 13, 150000, 'Online payment', '60704cc0a711b2021-04-0902:46:56pm', 0, 0, '2021-04-09 12:46:56'),
(443, '', '', 13, 150000, 'Online payment', '60704d3c0d4542021-04-0902:49:00pm', 0, 0, '2021-04-09 12:49:00'),
(444, '', '', 13, 150000, 'Online payment', '60704d602eb222021-04-0902:49:36pm', 0, 0, '2021-04-09 12:49:36'),
(445, '', '', 13, 150000, 'COD', '60704d754bc882021-04-0902:49:57pm', 1, 0, '2021-04-09 12:49:57'),
(446, '', '', 13, 150000, 'Online payment', '60704dd529fc62021-04-0902:51:33pm', 0, 0, '2021-04-09 12:51:33'),
(447, '', '', 13, 2000, 'Online payment', '60704df3246962021-04-0902:52:03pm', 0, 0, '2021-04-09 12:52:03'),
(448, '', '', 13, 2000, 'COD', '60704df598d2d2021-04-0902:52:05pm', 1, 0, '2021-04-09 12:52:05'),
(449, '', '', 13, 5900, 'Online payment', '60704ee10b88b2021-04-0902:56:01pm', 0, 0, '2021-04-09 12:56:01'),
(450, '', '', 13, 5900, 'Online payment', '60704efcdc6d92021-04-0902:56:28pm', 0, 0, '2021-04-09 12:56:28'),
(451, '', '', 13, 5900, 'COD', '60704f064130d2021-04-0902:56:38pm', 1, 0, '2021-04-09 12:56:38'),
(452, '', '', 13, 1300, 'Online payment', '60704f40c26e92021-04-0902:57:36pm', 0, 0, '2021-04-09 12:57:36'),
(453, '', '', 13, 1300, 'COD', '60704f4ddb5862021-04-0902:57:49pm', 1, 0, '2021-04-09 12:57:49'),
(454, '', '', 13, 500, 'Online payment', '60705105ad70a2021-04-0903:05:09pm', 0, 0, '2021-04-09 13:05:09'),
(455, '', '', 13, 500, 'Online payment', '607051149abe52021-04-0903:05:24pm', 0, 0, '2021-04-09 13:05:24'),
(456, '', '', 13, 500, 'COD', '6070511821fe32021-04-0903:05:28pm', 1, 0, '2021-04-09 13:05:28'),
(457, '', '', 13, 1350, 'Online payment', '6070515a1fb7f2021-04-0903:06:34pm', 1, 0, '2021-04-09 13:06:51'),
(458, '', '', 13, 110900, 'Online payment', '607102782f37d2021-04-1003:42:16am', 0, 0, '2021-04-10 01:42:16'),
(459, '', '', 13, 110900, 'Online payment', '607102c3efc092021-04-1003:43:31am', 0, 0, '2021-04-10 01:43:31'),
(460, '', '', 13, 110900, 'COD', '6071032a31ee22021-04-1003:45:14am', 1, 0, '2021-04-10 01:45:14'),
(461, '', '', 13, 900, 'Online payment', '607105f76d8372021-04-1003:57:11am', 0, 0, '2021-04-10 01:57:11'),
(462, '', '', 13, 900, 'Online payment', '60710627cfdc42021-04-1003:57:59am', 0, 0, '2021-04-10 01:57:59'),
(463, '', '', 13, 900, 'Online payment', '6071068892b192021-04-1003:59:36am', 0, 0, '2021-04-10 01:59:36'),
(464, '', '', 13, 900, 'Online payment', '60710697abdf92021-04-1003:59:51am', 0, 0, '2021-04-10 01:59:51'),
(465, '', '', 13, 900, 'COD', '607106cb2fb642021-04-1004:00:43am', 1, 0, '2021-04-10 02:00:43'),
(466, '', '', 13, 150000, 'Online payment', '607107ea7dd8b2021-04-1004:05:30am', 0, 0, '2021-04-10 02:05:30'),
(467, '', '', 13, 150000, 'Online payment', '6071080e147c72021-04-1004:06:06am', 0, 0, '2021-04-10 02:06:06'),
(468, '', '', 13, 150900, 'Online payment', '607108d10181f2021-04-1004:09:21am', 0, 0, '2021-04-10 02:09:21'),
(469, '', '', 13, 150900, 'Online payment', '60710925bee122021-04-1004:10:45am', 0, 0, '2021-04-10 02:10:45'),
(470, '', '', 13, 150900, 'Online payment', '6071095115a282021-04-1004:11:29am', 0, 0, '2021-04-10 02:11:29'),
(471, '', '', 13, 150900, 'Online payment', '6071096d4ed2b2021-04-1004:11:57am', 0, 0, '2021-04-10 02:11:57'),
(472, '', '', 13, 150900, 'Online payment', '607109954d3a42021-04-1004:12:37am', 0, 0, '2021-04-10 02:12:37'),
(473, '', '', 13, 150900, 'COD', '607109bfe57002021-04-1004:13:19am', 1, 0, '2021-04-10 02:13:19'),
(474, '', '', 13, 400, 'Online payment', '60710a1cd53c92021-04-1004:14:52am', 0, 0, '2021-04-10 02:14:52'),
(475, '', '', 13, 1300, 'Online payment', '60710ac8e922f2021-04-1004:17:44am', 0, 0, '2021-04-10 02:17:44'),
(476, '', '', 13, 1300, 'Online payment', '60710aec58ff52021-04-1004:18:20am', 0, 0, '2021-04-10 02:18:20'),
(477, '', '', 13, 1300, 'COD', '60710afdd72972021-04-1004:18:37am', 1, 0, '2021-04-10 02:18:37'),
(478, '', '', 13, 1350, 'Online payment', '60710c73a9dd72021-04-1004:24:51am', 1, 0, '2021-04-10 02:27:44'),
(479, '', '', 13, 900, 'Online payment', '60710d7bc55472021-04-1004:29:15am', 0, 0, '2021-04-10 02:29:15'),
(480, '', '', 13, 900, 'Online payment', '60710d9d174782021-04-1004:29:49am', 1, 0, '2021-04-10 02:32:06'),
(481, '', '', 13, 400, 'Online payment', '607111f8c75c62021-04-1004:48:24am', 0, 0, '2021-04-10 02:48:24'),
(482, '', '', 13, 400, 'Online payment', '607112050a5062021-04-1004:48:37am', 1, 0, '2021-04-10 02:58:11'),
(483, '', '', 13, 153000, 'Online payment', '607114ed0e9e22021-04-1005:01:01am', 0, 0, '2021-04-10 03:01:01'),
(484, '', '', 13, 153000, 'Online payment', '6071150d00e872021-04-1005:01:33am', 0, 0, '2021-04-10 03:01:33'),
(485, '', '', 13, 153000, 'COD', '607115161a5d82021-04-1005:01:42am', 1, 0, '2021-04-10 03:01:42'),
(486, '', '', 13, 900, 'Online payment', '60742a06759602021-04-1201:07:50pm', 0, 0, '2021-04-12 11:07:50'),
(487, '', '', 13, 900, 'COD', '60742a08a61fd2021-04-1201:07:52pm', 1, 0, '2021-04-12 11:07:52'),
(488, '', '', 13, 1000, 'Online payment', '60742b8d5a5a32021-04-1201:14:21pm', 0, 0, '2021-04-12 11:14:21'),
(489, '', '', 13, 1000, 'COD', '60742b90f3da02021-04-1201:14:24pm', 1, 0, '2021-04-12 11:14:24'),
(490, '', '', 13, 1350, 'Online payment', '60742c50059f02021-04-1201:17:36pm', 0, 0, '2021-04-12 11:17:36'),
(491, '', '', 13, 1350, 'COD', '60742c5326b902021-04-1201:17:39pm', 1, 0, '2021-04-12 11:17:39'),
(492, '', '', 13, 22400, 'Online payment', '60742d072e7f12021-04-1201:20:39pm', 0, 0, '2021-04-12 11:20:39'),
(493, '', '', 13, 22400, 'COD', '60742d0a447012021-04-1201:20:42pm', 1, 1, '2021-04-14 12:21:05'),
(494, '', '', 13, 400, 'Online payment', '60752678c36ab2021-04-1307:04:56am', 0, 0, '2021-04-13 05:04:56'),
(495, '', '', 13, 400, 'Online payment', '60766de11a7972021-04-1406:21:53am', 0, 0, '2021-04-14 04:21:53'),
(496, '', '', 13, 400, 'Online payment', '60769d62b07c72021-04-1409:44:34am', 0, 0, '2021-04-14 07:44:34'),
(497, '', '', 13, 400, 'COD', '60769d6ab07c42021-04-1409:44:42am', 1, 1, '2021-04-14 12:21:03'),
(498, '', '', 2, 302900, 'Online payment', '607811b6330e02021-04-1512:13:10pm', 0, 0, '2021-04-15 10:13:10'),
(499, '', '', 2, 302900, 'Online payment', '607812f9dd4d02021-04-1512:18:33pm', 0, 0, '2021-04-15 10:18:33'),
(500, '', '', 2, 302900, 'COD', '60781301d50b32021-04-1512:18:41pm', 1, 0, '2021-04-15 10:18:41'),
(501, '', '', 2, 150000, 'Online payment', '60781374050d92021-04-1512:20:36pm', 0, 0, '2021-04-15 10:20:36'),
(502, '', '', 2, 150000, 'Online payment', '6078137a273712021-04-1512:20:42pm', 0, 0, '2021-04-15 10:20:42'),
(503, '', '', 2, 150000, 'COD', '6078137c76d412021-04-1512:20:44pm', 1, 0, '2021-04-15 10:20:44');

-- --------------------------------------------------------

--
-- Table structure for table `product`
--

CREATE TABLE `product` (
  `id` int(11) NOT NULL,
  `categories_id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `mrp` float NOT NULL,
  `price` float NOT NULL,
  `qty` int(11) NOT NULL,
  `image` varchar(255) NOT NULL,
  `short_desc` varchar(2000) NOT NULL,
  `description` text NOT NULL,
  `meta_title` varchar(2000) NOT NULL,
  `meta_desc` varchar(2000) NOT NULL,
  `meta_keyword` varchar(2000) NOT NULL,
  `status` tinyint(4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `product`
--

INSERT INTO `product` (`id`, `categories_id`, `name`, `mrp`, `price`, `qty`, `image`, `short_desc`, `description`, `meta_title`, `meta_desc`, `meta_keyword`, `status`) VALUES
(1, 1, 'Realme C3 (Frozen Blue, 4 GB, 64 GB)', 9999, 8499, 10, '799153645_303b4a46-a701-4b43-b9c1-d98a2b53422f.jpg', '90 Hz Ultra Smooth Display Get ready for a smooth and seamless interaction experience, every time you slide or tap your finger on the realme 6 Pro’s screen.', '90 Hz Ultra Smooth Display Get ready for a smooth and seamless interaction experience, every time you slide or tap your finger on the realme 6 Pro’s screen. By refreshing 90 times per second and featuring a fast refresh rate, this phone’s screen is as smooth as it comes.Dual In-display Selfie Take your selfie game to a whole ‘nother level with the realme 6 Pro’s 16 MP wide-angle lens, a 105° ultra-wide-angle lens, and a dual-camera combination that provides a 3x wider field of view.64 MP AI Quad Camera with 20x Zoom You can now click pictures from any distance as this phone features a professional four-camera system which offers a zoom function from wide-angle to telephoto.', 'Realme C3 (Frozen Blue, 64 GB) (4 GB RAM)', '', 'Realme C3 (Frozen Blue, 64 GB) (4 GB RAM)', 1),
(2, 1, 'APPLE IPHONE 11 PRO MAX (512GB)', 165800, 155800, 4, '942626953_iphone.jpg', '6.5-inch Super Retina XDR display with HDR and True Tone.', '6.5-inch Super Retina XDR display with HDR and True Tone. 12MP TrueDepth front camera with Portrait mode, Smart HDR, 4K video recording up to 60 fps, and slo-mo video support for 1080p at 120 fps. A13 Bionic chip with third-generation Neural Engine. Water resistant to a depth of 4 metres for up to 30 minutes (IP68).', 'APPLE IPHONE 11 PRO MAX (512GB) - MIDNIGHT GREEN', '', 'APPLE IPHONE 11 PRO MAX (512GB) - MIDNIGHT GREEN', 1),
(3, 1, 'Samsung Galaxy S10 Plus 1TB', 115900, 110900, 5, '567328558_samsung-galaxy-s10-plus-1tb-ceramic-white-12gb-ram-.jpg', 'Triple rear camera setup: 16MP with f2.2 aperture ultra wide + 12MP with f1.5 and f2.4 aperture wide + 12MP f2.4 tele| Dual front', 'Triple rear camera setup: 16MP with f2.2 aperture ultra wide + 12MP with f1.5 and f2.4 aperture wide + 12MP f2.4 tele| Dual front camera setup - 10MP f1.9 Main + 8MP f2.2 live focus\r\n16.35 centimeters (6.4-inch) Dynamic AMOLED multi-touch capacitive touchscreen with 3040 x 1440 pixels resolution, 522 ppi pixel density\r\nMemory, Storage and SIM: 12GB RAM | 1024GB internal memory expandable up to 512GB | Dual SIM (nano+nano) dual stand by (4G+4G)\r\nAndroid Pie v9.0 operating system with 2.7GHz + 2.3GHz + 1.9GHz Exynos 9820 octa core processor\r\n4100mAH lithium-ion battery\r\n1 year manufacturer warranty for device and 6 months manufacturer warranty for in-box accessories including batteries from the date of purchase\r\nBox also includes: Earphones, Travel Adapter, USB Cable, Ejection Pin, User Manual', 'Samsung Galaxy S10 Plus 1TB (Ceramic White, 12GB RAM)', '', 'Samsung Galaxy S10 Plus 1TB (Ceramic White, 12GB RAM)', 1),
(4, 2, 'SHEEN-SOLID TROUSER-OLIVE', 1999, 1200, 3, '697347005_2__1538219531_49.204.69.38_600x.jpg', 'per inceptos himenaeos. Ut commodo ullamcorper quam non pulvinar.', 'Fit Type: Regular\r\n100% Cotton\r\nRegular Fit\r\nThis is a Regular fit trousers that sits close through waist & thigh and falls Regular from knee to ankle\r\nMachine wash cold, Wash dark colors separately, Do not bleach, Tumble dry low, Warm iron\r\nMachine wash cold, Wash dark colors separately, Do not bleach, Tumble dry low, Warm iron\r\nThere might be minor color variation between actual product and image shown on screen due to lighting on the photography', 'SHEEN-SOLID TROUSER-OLIVE', '', 'SHEEN-SOLID TROUSER-OLIVE', 1),
(5, 2, 'NATURE-LINEN SHIRT-GREEN', 2799, 2399, 8, '812581380_nature_green-0224_600x.jpg', 'a nisl pharetra orci, at condimentum nisl lorem elementum ipsum.', 'Care Instructions: Hand Wash Only\r\nFit Type: Tailored Fit\r\n100% COTTON ,DOBBY PREMIUM FABRIC, TAILORED FIT, FORMAL SHIRT, LONG SLEEVE, GENTLE WASH CARE INSTRUCTION\r\nFor men\r\nAwailable Sizes: Small, Medium, Large, Extra large\r\nGENTLE WASH CARE INSTRUCTION', 'NATURE-LINEN SHIRT-GREEN', '', 'NATURE-LINEN SHIRT-GREEN', 1),
(6, 2, 'Monte Carlo Turquoise Blue Solid Collar T Shirt', 1999, 1500, 8, '931830512__8-(1)-E5x-104831-NJD.jpg', 'A sky blue tshirt', 'MATERIAL - These are 100% cotton t-shirt which are made of pre-shrunk cotton and are soft & smooth with a high thread-count. They are comfortable and durable.\r\nPRINTING - Our stylish t-shirts are screen printed with inks that are vibrant, durable, and highly crack resistant.\r\nSIZES AND FIT - Our unisex t shirt is available in - XS, S, M, L, XL, XXL, XXXL AND 4XL perfect for both male and female.\r\nWASH CARE - Ensure washing the tee in cold water, don\'t iron directly on the print and don\'t dry in direct sunlight. Instructions are printed on the neck label for your convenience.\r\nDESIGN - This cool USA flag tshirt is sure to stand out no matter where you go. There\'s no reason to delay adding this t-shirt to your wardrobe.', 'Monte Carlo Turquoise Blue Solid Collar T Shirt', '', 'Monte Carlo Turquoise Blue Solid Collar T Shirt', 1),
(7, 4, 'Dark Blue Floral Print Polo T-shirt', 1900, 1350, 7, '309027777_Floral-Print-Polo-T-shirt.jpg', 'isl pharetra orci, at condimentum nisl lorem elementum ipsum.', 'Care Instructions: Machine Wash\r\nFit Type: Regular Fit\r\nColor Name: Black Solid\r\nMaterial: Synthetic\r\nMachine wash\r\nGeometric print\r\nHalf sleeve', 'Floral Print Polo T-shirt', '', 'Floral Print Polo T-shirt', 1),
(8, 4, 'Lates White Colour Polo T-shirt', 1120, 1000, 10, '651584201_Floral-Embroidered-Polo-T-shirt.jpg', 'Care Instructions: Machine Wash\r\nFit Type: Regular Fit\r\n97% Cotton 3% Elastane\r\nmachine wash\r\nHalf Sleeve\r\nA wardrobe essential Polo\r\nMade with a premium quality cotton fabric for a soft handfeel and comfort.', 'Care Instructions: Machine Wash\r\nFit Type: Regular Fit\r\n97% Cotton 3% Elastane\r\nmachine wash\r\nHalf Sleeve\r\nA wardrobe essential Polo\r\nMade with a premium quality cotton fabric for a soft handfeel and comfort.', 'Floral Embroidered Polo T-shirt', '', 'Floral Embroidered Polo T-shirt', 1),
(9, 4, 'Floral Print Polo T-shirt Latest', 650, 500, 10, '526258680_Floral-Print-Polo-T-shirt1.jpg', 'Fit Type: Regular Fit\r\n97% Cotton and 3% spandex\r\nMachine wash cold, wash dark colors separately, do not bleach, tumble dry low, warm iron', 'Care Instructions: Machine wash cold, wash dark colors separately, do not bleach, tumble dry low, warm iron\r\nFit Type: Regular Fit\r\n97% Cotton and 3% spandex\r\nMachine wash cold, wash dark colors separately, do not bleach, tumble dry low, warm iron\r\nShort Sleeve\r\nRegular fit', 'Floral Print Polo T-shirt Latest', '', 'Floral Print Polo T-shirt Latest', 1),
(11, 2, 'Brown colour british sweater', 1000, 900, 20, '296530266_sweater.jpg', 'suitable for men', 'A sweater, also called a jumper in British and Australian English,[1] and a windcheater in parts of Australia[2], is a piece of clothing, typically with long sleeves, made of knitted or crocheted material, that covers the upper part of the body. When sleeveless, the garment is often called a slipover or sweater vest.\r\nSweaters are worn by adults and children of all genders, often over a shirt, blouse, T-shirt, or another top, but sometimes next to the skin. Sweaters were traditionally made from wool but can now be made of cotton, synthetic fibers, or any combination of these. There are also seasonal sweaters, which around Christmas are called \"ugly sweaters', '', '', '', 1),
(14, 4, 'Tatto design black T-shirt', 500, 400, 14, '285340762_black tshirt.jpg', 'beautiful black tshirt', 'Join the boldest, bravest and the baddest of the marvel universe with Van Heusen Woman Exclusive range. The range covers the journey of our beloved characters from their inception, struggles and victories. These heart warming stories are captured in premium fabrics and trendy prints, redefining casual wear and personal style for the Van Heusen Woman.', '', '', '', 1),
(15, 1, 'iphone 12 max pro 6.5-inch  display', 180000, 150000, 5, '301458072_iphone.jpg', 'branded mobile 6.5-inch Super Retina XDR display with HDR and True Tone', '6.5-inch Super Retina XDR display with HDR and True Tone. 12MP TrueDepth front camera with Portrait mode, Smart HDR, 4K video recording up to 60 fps, and slo-mo video support for 1080p at 120 fps. A13 Bionic chip with third-generation Neural Engine. Water resistant to a depth of 4 metres for up to 30 minutes (IP68).(works with Qi chargers)', '', '', '', 1);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `password` varchar(100) NOT NULL,
  `conform_password` varchar(100) NOT NULL,
  `email` varchar(50) NOT NULL,
  `mobile` varchar(15) NOT NULL,
  `token` varchar(255) NOT NULL,
  `status` tinyint(2) NOT NULL,
  `address` varchar(200) DEFAULT NULL,
  `added_on` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `password`, `conform_password`, `email`, `mobile`, `token`, `status`, `address`, `added_on`) VALUES
(2, 'ram', '$2y$10$QOmZyKEIam4x75hxcPx23etoitNdfUNQaNyzfmbu9rad0.tlQ7txS', '$2y$10$FU3Y63UWUlj.j7FkVhTydeeZaEfj.Dc4aqdTnt0jQ7Lhm8nDbUsT.', 'ram@gmail.com', '9816745048', '', 1, 'shuklagandaki 5, tanahun', '2021-03-23 11:33:05'),
(3, 'maya', '$2y$10$SHf3GWXw1PuHdv7pgJn/Vu7AJeLfLLSV8yCqZ3Xlb3CPtZuZgnWM6', '$2y$10$p17LDjcLMrUJiqxoep0xN.077zDYszGS3hlu1xoGflNP/C5DcOxje', 'maya@maya.com', '9816745048', '', 1, NULL, '2021-03-14 12:15:51'),
(13, 'lax', '$2y$10$f3wjYA9qXLGPQvixllCkkuEUNy6BN7uw.sPQ0XEj8.Ct/qY9eU996', '$2y$10$ZKVG3gR4HDFgsphWrgnWX./YVq.qCeMYkgupbw.rC8YSsVSvqzS2W', 'lax011011@gmail.com', '9816745048', '5919faf23a2cad48c7b660853f8090', 1, 'pokhara', '2021-04-14 18:31:25'),
(16, 'nageshwor', '$2y$10$rYkIry0Y.xALb9wg7w/36epRY8a8vKgfOEiyJJB3wpEBJPPjIR6Y.', '$2y$10$rYkIry0Y.xALb9wg7w/36epRY8a8vKgfOEiyJJB3wpEBJPPjIR6ci', 'nageshwor011@gmail.com', '9816745048', '1f5365f07fc58bce1eda245a4effe8', 1, 'shuklagandaki 5, tanahun', '2021-03-24 17:36:06');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin_users`
--
ALTER TABLE `admin_users`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `cart`
--
ALTER TABLE `cart`
  ADD PRIMARY KEY (`cartID`),
  ADD KEY `pid` (`pid`),
  ADD KEY `uid` (`uid`);

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `contact_us`
--
ALTER TABLE `contact_us`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `delivery`
--
ALTER TABLE `delivery`
  ADD PRIMARY KEY (`did`);

--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`oid`),
  ADD KEY `uid` (`uid`);

--
-- Indexes for table `product`
--
ALTER TABLE `product`
  ADD PRIMARY KEY (`id`),
  ADD KEY `categories_id` (`categories_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin_users`
--
ALTER TABLE `admin_users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `cart`
--
ALTER TABLE `cart`
  MODIFY `cartID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=209;

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `contact_us`
--
ALTER TABLE `contact_us`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `delivery`
--
ALTER TABLE `delivery`
  MODIFY `did` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `oid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=504;

--
-- AUTO_INCREMENT for table `product`
--
ALTER TABLE `product`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `cart`
--
ALTER TABLE `cart`
  ADD CONSTRAINT `cart_ibfk_1` FOREIGN KEY (`pid`) REFERENCES `product` (`id`),
  ADD CONSTRAINT `cart_ibfk_2` FOREIGN KEY (`uid`) REFERENCES `users` (`id`);

--
-- Constraints for table `orders`
--
ALTER TABLE `orders`
  ADD CONSTRAINT `orders_ibfk_1` FOREIGN KEY (`uid`) REFERENCES `users` (`id`);

--
-- Constraints for table `product`
--
ALTER TABLE `product`
  ADD CONSTRAINT `product_ibfk_1` FOREIGN KEY (`categories_id`) REFERENCES `categories` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

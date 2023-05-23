-- phpMyAdmin SQL Dump
-- version 4.9.0.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: May 22, 2023 at 06:20 PM
-- Server version: 10.3.16-MariaDB
-- PHP Version: 7.3.7

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `Arik`
--

-- --------------------------------------------------------

--
-- Table structure for table `abouts`
--

CREATE TABLE `abouts` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `image` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `aviationIndustries` int(11) NOT NULL,
  `aviationIndustries_text` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` bigint(20) NOT NULL DEFAULT 1,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `abouts`
--

INSERT INTO `abouts` (`id`, `title`, `description`, `image`, `aviationIndustries`, `aviationIndustries_text`, `status`, `created_at`, `updated_at`) VALUES
(1, 'ARIK AIR', 'Engage worldwide methodologies with web-enabled technology. Interactively coordinate proactive e-commerce via process-centric outside the box thinking. Completely pursue scalable customer service through sustainable potentialities.\r\n\r\n\r\n   Engage worldwide methodologies with web-enabled technology. Interactively coordinate proactive e-commerce via process-centric outside the box thinking. Completely pursue scalable customer service through sustainable potentialities.Engage worldwide methodologies with web-enabled technology', '1684388597Frame 1.jpg', 10, 'Aviation Industry', 1, '2023-05-16 10:19:18', '2023-05-18 05:43:17');

-- --------------------------------------------------------

--
-- Table structure for table `activities`
--

CREATE TABLE `activities` (
  `activity_id` int(11) NOT NULL,
  `activity` varchar(255) NOT NULL,
  `activity_type` varchar(20) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `date_time` timestamp NOT NULL DEFAULT current_timestamp(),
  `status` enum('0','1','2') NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `activities`
--

INSERT INTO `activities` (`activity_id`, `activity`, `activity_type`, `created_at`, `date_time`, `status`) VALUES
(1, 'a Promo was unhidden byMeyor', 'unhide', '2023-04-25 18:30:09', '2023-04-25 18:30:09', '1'),
(2, 'User Menu Was Added byMeyor', 'Added', '2023-04-25 19:05:33', '2023-04-25 19:05:33', '1'),
(3, 'User Menu Was Added byMeyor', 'Added', '2023-04-25 19:05:43', '2023-04-25 19:05:43', '1'),
(4, 'User Menu Was Added byMeyor', 'Added', '2023-04-25 19:05:48', '2023-04-25 19:05:48', '1'),
(5, 'User Menu Removed Successfully  byMeyor', 'delete', '2023-04-25 19:07:30', '2023-04-25 19:07:30', '1'),
(6, 'User Menu Removed Successfully  byMeyor', 'delete', '2023-04-25 19:07:34', '2023-04-25 19:07:34', '1'),
(7, 'User Menu Removed Successfully  byMeyor', 'delete', '2023-04-25 19:07:39', '2023-04-25 19:07:39', '1'),
(8, 'User Menu Removed Successfully  byMeyor', 'delete', '2023-04-25 19:07:43', '2023-04-25 19:07:43', '1'),
(9, 'User Menu Removed Successfully  byMeyor', 'delete', '2023-04-25 19:07:49', '2023-04-25 19:07:49', '1'),
(10, 'User Menu Was Added byMeyor', 'Added', '2023-04-25 19:07:59', '2023-04-25 19:07:59', '1'),
(11, 'User Menu Was Added byMeyor', 'Added', '2023-04-25 19:08:03', '2023-04-25 19:08:03', '1'),
(12, 'a Destination was hidden byMeyor', 'hide', '2023-04-26 00:29:10', '2023-04-26 00:29:10', '1'),
(13, 'a DealsOffer was hidden byMeyor', 'hide', '2023-04-26 00:33:37', '2023-04-26 00:33:37', '1'),
(14, 'a DealsOffer was unhidden byMeyor', 'unhide', '2023-04-26 00:34:02', '2023-04-26 00:34:02', '1'),
(15, 'a DealsOffer was hidden byMeyor', 'hide', '2023-04-26 00:40:58', '2023-04-26 00:40:58', '1'),
(16, 'User Menu Was Added byMeyor', 'Added', '2023-04-26 00:43:39', '2023-04-26 00:43:39', '1'),
(17, 'a DealsOffer was unhidden byMeyor', 'unhide', '2023-04-26 00:48:13', '2023-04-26 00:48:13', '1'),
(18, 'User Menu Was Added byMeyor', 'Added', '2023-04-26 00:57:30', '2023-04-26 00:57:30', '1'),
(19, 'User Menu Was Added byMeyor', 'Added', '2023-04-26 00:57:35', '2023-04-26 00:57:35', '1'),
(20, 'Slider Updated by Meyor', 'Upload Slider', '2023-04-26 19:09:24', '2023-04-26 19:09:24', '1'),
(21, 'a NewsEvent was unhidden byMeyor', 'unhide', '2023-04-26 19:10:26', '2023-04-26 19:10:26', '1'),
(22, 'Slider Added by Meyor', 'Added Slider', '2023-04-27 19:59:50', '2023-04-27 19:59:50', '1'),
(23, 'Slider Updated by Meyor', 'Upload Slider', '2023-04-27 20:00:30', '2023-04-27 20:00:30', '1'),
(24, 'a Destination was hidden byMeyor', 'hide', '2023-04-27 20:19:52', '2023-04-27 20:19:52', '1'),
(25, 'a Destination was hidden byMeyor', 'hide', '2023-04-27 23:14:48', '2023-04-27 23:14:48', '1'),
(26, 'a Destination was unhidden byMeyor', 'unhide', '2023-04-27 23:14:54', '2023-04-27 23:14:54', '1'),
(27, 'a WebMenu was unhidden byMeyor', 'unhide', '2023-05-01 10:07:24', '2023-05-01 10:07:24', '1'),
(28, 'a WebMenu was unhidden byMeyor', 'unhide', '2023-05-01 10:07:28', '2023-05-01 10:07:28', '1'),
(29, 'a WebMenu was unhidden byMeyor', 'unhide', '2023-05-01 10:24:20', '2023-05-01 10:24:20', '1'),
(30, 'a WebMenu was unhidden byMeyor', 'unhide', '2023-05-01 10:24:25', '2023-05-01 10:24:25', '1'),
(31, 'a WebMenu was unhidden byMeyor', 'unhide', '2023-05-01 10:24:29', '2023-05-01 10:24:29', '1'),
(32, 'a WebMenu was unhidden byMeyor', 'unhide', '2023-05-01 10:24:33', '2023-05-01 10:24:33', '1'),
(33, 'User Menu Was Added byMeyor', 'Added', '2023-05-01 12:58:31', '2023-05-01 12:58:31', '1'),
(34, 'User Menu Was Added byMeyor', 'Added', '2023-05-01 18:57:01', '2023-05-01 18:57:01', '1'),
(35, 'User Menu Was Added byMeyor', 'Added', '2023-05-01 18:57:16', '2023-05-01 18:57:16', '1'),
(36, 'User Menu Was Added byMeyor', 'Added', '2023-05-01 18:57:21', '2023-05-01 18:57:21', '1'),
(37, 'User Menu Was Added byMeyor', 'Added', '2023-05-01 18:57:25', '2023-05-01 18:57:25', '1'),
(38, 'User Menu Was Added byMeyor', 'Added', '2023-05-01 18:57:32', '2023-05-01 18:57:32', '1'),
(39, 'User Menu Was Added byMeyor', 'Added', '2023-05-01 18:57:36', '2023-05-01 18:57:36', '1'),
(40, 'User Menu Was Added byMeyor', 'Added', '2023-05-01 18:58:17', '2023-05-01 18:58:17', '1'),
(41, 'User Menu Removed Successfully  byMeyor', 'delete', '2023-05-01 18:59:19', '2023-05-01 18:59:19', '1'),
(42, 'User Menu Was Added byMeyor', 'Added', '2023-05-01 18:59:49', '2023-05-01 18:59:49', '1'),
(43, 'User Menu Was Added byMeyor', 'Added', '2023-05-01 18:59:57', '2023-05-01 18:59:57', '1'),
(44, 'User Menu Was Added byMeyor', 'Added', '2023-05-01 19:00:02', '2023-05-01 19:00:02', '1'),
(45, 'User Menu Was Added byMeyor', 'Added', '2023-05-01 19:03:10', '2023-05-01 19:03:10', '1'),
(46, 'User Menu Removed Successfully  byMeyor', 'delete', '2023-05-01 19:03:14', '2023-05-01 19:03:14', '1'),
(47, 'User Menu Was Added byMeyor', 'Added', '2023-05-01 19:03:17', '2023-05-01 19:03:17', '1'),
(48, 'User Menu Was Added byMeyor', 'Added', '2023-05-01 19:03:22', '2023-05-01 19:03:22', '1'),
(49, 'User Menu Was Added byMeyor', 'Added', '2023-05-01 19:04:04', '2023-05-01 19:04:04', '1'),
(50, 'User Menu Was Added byMeyor', 'Added', '2023-05-01 19:05:26', '2023-05-01 19:05:26', '1'),
(51, 'User Menu Was Added byMeyor', 'Added', '2023-05-01 19:11:56', '2023-05-01 19:11:56', '1'),
(52, 'User Menu Removed Successfully  byMeyor', 'delete', '2023-05-01 19:12:00', '2023-05-01 19:12:00', '1'),
(53, 'User Menu Was Added byMeyor', 'Added', '2023-05-01 19:14:32', '2023-05-01 19:14:32', '1'),
(54, 'User Menu Was Added byMeyor', 'Added', '2023-05-01 19:17:14', '2023-05-01 19:17:14', '1'),
(55, 'User Menu Was Added byMeyor', 'Added', '2023-05-01 19:17:18', '2023-05-01 19:17:18', '1'),
(56, 'User Menu Was Added byMeyor', 'Added', '2023-05-01 19:17:46', '2023-05-01 19:17:46', '1'),
(57, 'User Menu Was Added byMeyor', 'Added', '2023-05-01 19:17:50', '2023-05-01 19:17:50', '1'),
(58, 'User Menu Was Added byMeyor', 'Added', '2023-05-01 19:17:55', '2023-05-01 19:17:55', '1'),
(59, 'User Menu Was Added byMohammed Lawal Abubakar', 'Added', '2023-05-01 21:59:07', '2023-05-01 21:59:07', '1'),
(60, 'Policy content edited by Mohammed Lawal Abubakar', 'Policy content', '2023-05-01 22:01:22', '2023-05-01 22:01:22', '1'),
(61, 'Policy content edited by Mohammed Lawal Abubakar', 'Policy content', '2023-05-01 22:01:32', '2023-05-01 22:01:32', '1'),
(62, 'Policy content edited by Mohammed Lawal Abubakar', 'Policy content', '2023-05-01 22:01:41', '2023-05-01 22:01:41', '1'),
(63, 'Policy content edited by Mohammed Lawal Abubakar', 'Policy content', '2023-05-01 22:01:47', '2023-05-01 22:01:47', '1'),
(64, 'Policy content edited by Mohammed Lawal Abubakar', 'Policy content', '2023-05-01 22:01:54', '2023-05-01 22:01:54', '1'),
(65, 'FAQ edited by Mohammed Lawal Abubakar', 'FAQ', '2023-05-01 22:02:30', '2023-05-01 22:02:30', '1'),
(66, 'FAQ edited by Mohammed Lawal Abubakar', 'FAQ', '2023-05-01 22:02:42', '2023-05-01 22:02:42', '1'),
(67, 'a Promo was unhidden byMohammed Lawal Abubakar', 'unhide', '2023-05-01 22:09:05', '2023-05-01 22:09:05', '1'),
(68, 'a Promo was unhidden byMohammed Lawal Abubakar', 'unhide', '2023-05-01 22:26:16', '2023-05-01 22:26:16', '1'),
(69, 'a NewsEvent was unhidden byMohammed Lawal Abubakar', 'unhide', '2023-05-01 22:59:43', '2023-05-01 22:59:43', '1'),
(70, 'a NewsEvent was unhidden byMohammed Lawal Abubakar', 'unhide', '2023-05-01 22:59:43', '2023-05-01 22:59:43', '1'),
(71, 'User Menu Was Added byMohammed Lawal Abubakar', 'Added', '2023-05-01 23:10:26', '2023-05-01 23:10:26', '1'),
(72, 'User Menu Was Added byMohammed Lawal Abubakar', 'Added', '2023-05-01 23:25:28', '2023-05-01 23:25:28', '1'),
(73, 'A User Was Added By15', 'add', '2023-05-02 06:26:52', '2023-05-02 06:26:52', '1'),
(74, 'User Menu Was Added byMeyor', 'Added', '2023-05-02 08:57:04', '2023-05-02 08:57:04', '1'),
(75, 'User Menu Was Added byMeyor', 'Added', '2023-05-05 19:50:56', '2023-05-05 19:50:56', '1'),
(76, 'a Commercials was hidden byMeyor', 'hide', '2023-05-06 14:43:42', '2023-05-06 14:43:42', '1'),
(77, 'a Commercials was unhidden byMeyor', 'unhide', '2023-05-06 14:43:50', '2023-05-06 14:43:50', '1'),
(78, 'a Commercials was hidden byMeyor', 'hide', '2023-05-06 14:44:20', '2023-05-06 14:44:20', '1'),
(79, 'a Commercials was unhidden byMeyor', 'unhide', '2023-05-06 14:44:49', '2023-05-06 14:44:49', '1'),
(80, 'a Commercials was hidden byMeyor', 'hide', '2023-05-06 14:44:55', '2023-05-06 14:44:55', '1'),
(81, 'a Commercials was unhidden byMeyor', 'unhide', '2023-05-06 14:45:16', '2023-05-06 14:45:16', '1'),
(82, 'a Commercials was hidden byMeyor', 'hide', '2023-05-06 14:45:25', '2023-05-06 14:45:25', '1'),
(83, 'a Commercials was unhidden byMeyor', 'unhide', '2023-05-06 14:49:32', '2023-05-06 14:49:32', '1'),
(84, 'a Commercials was hidden byMeyor', 'hide', '2023-05-06 17:32:30', '2023-05-06 17:32:30', '1'),
(85, 'a Commercials was unhidden byMeyor', 'unhide', '2023-05-06 17:32:38', '2023-05-06 17:32:38', '1'),
(86, 'a Commercials was hidden byMeyor', 'hide', '2023-05-06 17:38:06', '2023-05-06 17:38:06', '1'),
(87, 'a Commercials was unhidden byMeyor', 'unhide', '2023-05-06 18:21:28', '2023-05-06 18:21:28', '1'),
(88, 'a DealsOffer was hidden byMeyor', 'hide', '2023-05-07 09:38:29', '2023-05-07 09:38:29', '1'),
(89, 'a DealsOffer was unhidden byMeyor', 'unhide', '2023-05-07 09:40:36', '2023-05-07 09:40:36', '1'),
(90, 'a DealsOffer was hidden byMeyor', 'hide', '2023-05-07 09:40:39', '2023-05-07 09:40:39', '1'),
(91, 'a DealsOffer was unhidden byMeyor', 'unhide', '2023-05-07 09:44:48', '2023-05-07 09:44:48', '1'),
(92, 'a DealsOffer was hidden byMeyor', 'hide', '2023-05-07 09:44:53', '2023-05-07 09:44:53', '1'),
(93, 'a DealsOffer was hidden byMeyor', 'hide', '2023-05-07 09:45:26', '2023-05-07 09:45:26', '1'),
(94, 'a DealsOffer was unhidden byMeyor', 'unhide', '2023-05-07 09:48:36', '2023-05-07 09:48:36', '1'),
(95, 'a DealsOffer was unhidden byMeyor', 'unhide', '2023-05-07 09:48:45', '2023-05-07 09:48:45', '1'),
(96, 'a DealsOffer was hidden byMeyor', 'hide', '2023-05-07 09:49:00', '2023-05-07 09:49:00', '1'),
(97, 'a WebMenu was hidden byMeyor', 'hide', '2023-05-07 09:51:30', '2023-05-07 09:51:30', '1'),
(98, 'User Menu Was Added byMeyor', 'Added', '2023-05-07 17:47:12', '2023-05-07 17:47:12', '1'),
(99, 'a Category was hidden byMeyor', 'hide', '2023-05-07 18:43:30', '2023-05-07 18:43:30', '1'),
(100, 'a Category was unhidden byMeyor', 'unhide', '2023-05-07 18:43:34', '2023-05-07 18:43:34', '1'),
(101, 'a SubCategory was hidden byMeyor', 'hide', '2023-05-07 19:21:39', '2023-05-07 19:21:39', '1'),
(102, 'a SubCategory was unhidden byMeyor', 'unhide', '2023-05-07 19:26:46', '2023-05-07 19:26:46', '1'),
(103, 'User Menu Was Added byMeyor', 'Added', '2023-05-08 08:49:44', '2023-05-08 08:49:44', '1'),
(104, 'a WebMenu was unhidden byMeyor', 'unhide', '2023-05-08 23:16:57', '2023-05-08 23:16:57', '1'),
(105, 'User Menu Was Added byMeyor', 'Added', '2023-05-09 12:03:17', '2023-05-09 12:03:17', '1'),
(106, 'User Menu Was Added byMeyor', 'Added', '2023-05-09 12:11:11', '2023-05-09 12:11:11', '1'),
(107, 'User Menu Was Added byMeyor', 'Added', '2023-05-09 13:53:36', '2023-05-09 13:53:36', '1'),
(108, 'a QuickBox was hidden byMeyor', 'hide', '2023-05-09 13:53:44', '2023-05-09 13:53:44', '1'),
(109, 'a QuickBox was unhidden byMeyor', 'unhide', '2023-05-09 13:53:57', '2023-05-09 13:53:57', '1'),
(110, 'a WebMenu was unhidden byMeyor', 'unhide', '2023-05-10 00:08:17', '2023-05-10 00:08:17', '1'),
(111, 'Slider Updated by Meyor', 'Upload Slider', '2023-05-12 06:57:39', '2023-05-12 06:57:39', '1'),
(112, 'a About was hidden byMeyor', 'hide', '2023-05-12 08:16:12', '2023-05-12 08:16:12', '1'),
(113, 'a Policy was hidden byMeyor', 'hide', '2023-05-12 08:23:24', '2023-05-12 08:23:24', '1'),
(114, 'a Policy was unhidden byMeyor', 'unhide', '2023-05-12 08:23:29', '2023-05-12 08:23:29', '1'),
(115, 'a About was hidden byMeyor', 'hide', '2023-05-12 09:28:54', '2023-05-12 09:28:54', '1'),
(116, 'a MissionVission was hidden byMeyor', 'hide', '2023-05-12 09:44:04', '2023-05-12 09:44:04', '1'),
(117, 'a MissionVission was hidden byMeyor', 'hide', '2023-05-12 09:44:45', '2023-05-12 09:44:45', '1'),
(118, 'a MissionVission was unhidden byMeyor', 'unhide', '2023-05-12 09:44:52', '2023-05-12 09:44:52', '1'),
(119, 'A User Was Added By15', 'add', '2023-05-12 10:22:14', '2023-05-12 10:22:14', '1'),
(120, 'A User Deleted ByMeyor', 'deleted', '2023-05-12 10:22:28', '2023-05-12 10:22:28', '1'),
(121, 'a DealsOffer was unhidden byMohammed Lawal Abubakar', 'unhide', '2023-05-13 20:37:24', '2023-05-13 20:37:24', '1'),
(122, 'User Menu Was Added byMeyor', 'Added', '2023-05-15 08:35:35', '2023-05-15 08:35:35', '1'),
(123, 'User Menu Was Added byMeyor', 'Added', '2023-05-15 13:41:33', '2023-05-15 13:41:33', '1'),
(124, 'User Menu Was Added byMeyor', 'Added', '2023-05-15 15:39:54', '2023-05-15 15:39:54', '1'),
(125, 'User Menu Was Added byMeyor', 'Added', '2023-05-15 16:03:51', '2023-05-15 16:03:51', '1'),
(126, 'a Faq was hidden byMeyor', 'hide', '2023-05-16 09:58:58', '2023-05-16 09:58:58', '1'),
(127, 'a Faq was unhidden byMeyor', 'unhide', '2023-05-16 09:59:02', '2023-05-16 09:59:02', '1'),
(128, 'a CompanyHistory was hidden byMeyor', 'hide', '2023-05-16 21:57:58', '2023-05-16 21:57:58', '1'),
(129, 'a CompanyHistory was hidden byMeyor', 'hide', '2023-05-16 21:58:49', '2023-05-16 21:58:49', '1'),
(130, 'a CompanyHistory was unhidden byMeyor', 'unhide', '2023-05-16 21:58:53', '2023-05-16 21:58:53', '1'),
(131, 'a AppStore was hidden byMeyor', 'hide', '2023-05-16 22:31:59', '2023-05-16 22:31:59', '1'),
(132, 'a AppStore was unhidden byMeyor', 'unhide', '2023-05-16 22:32:04', '2023-05-16 22:32:04', '1'),
(133, 'a AppStore was hidden byMeyor', 'hide', '2023-05-16 22:40:26', '2023-05-16 22:40:26', '1'),
(134, 'a AppStore was unhidden byMeyor', 'unhide', '2023-05-16 22:40:31', '2023-05-16 22:40:31', '1'),
(135, 'a Routing was hidden byMeyor', 'hide', '2023-05-17 08:43:30', '2023-05-17 08:43:30', '1'),
(136, 'Slider Updated by Meyor', 'Upload Slider', '2023-05-17 09:37:59', '2023-05-17 09:37:59', '1'),
(137, 'Slider Updated by Meyor', 'Upload Slider', '2023-05-17 10:03:43', '2023-05-17 10:03:43', '1'),
(138, 'a Social was hidden byMeyor', 'hide', '2023-05-18 10:03:27', '2023-05-18 10:03:27', '1'),
(139, 'a Social was unhidden byMeyor', 'unhide', '2023-05-18 10:03:33', '2023-05-18 10:03:33', '1'),
(140, 'User Menu Was Added byMohammed Lawal Abubakar', 'Added', '2023-05-19 14:14:53', '2023-05-19 14:14:53', '1'),
(141, 'User Menu Removed Successfully  byMeyor', 'delete', '2023-05-19 16:14:36', '2023-05-19 16:14:36', '1'),
(142, 'User Menu Was Added byMohammed Lawal Abubakar', 'Added', '2023-05-20 14:32:49', '2023-05-20 14:32:49', '1');

-- --------------------------------------------------------

--
-- Table structure for table `admin_user_menu`
--

CREATE TABLE `admin_user_menu` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `menu_id` int(11) NOT NULL,
  `status` enum('0','1') NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `appstores`
--

CREATE TABLE `appstores` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `image` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `link` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` bigint(20) NOT NULL DEFAULT 1,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `appstores`
--

INSERT INTO `appstores` (`id`, `title`, `image`, `link`, `status`, `created_at`, `updated_at`) VALUES
(1, 'Playstore', '1684276313pricetag.png', 'Placeat mollitia si', 1, '2023-05-16 21:31:53', '2023-05-16 21:39:22'),
(2, 'Apple', '1684358403pricetag.png', 'apple', 1, '2023-05-17 21:20:03', '2023-05-17 21:20:03');

-- --------------------------------------------------------

--
-- Table structure for table `bonuses`
--

CREATE TABLE `bonuses` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `image` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `url_link` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `homepage_id` bigint(20) NOT NULL,
  `status` bigint(20) NOT NULL DEFAULT 1,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `bonuses`
--

INSERT INTO `bonuses` (`id`, `title`, `description`, `image`, `url_link`, `homepage_id`, `status`, `created_at`, `updated_at`) VALUES
(1, 'Get 500 Bonus Points When You Sign Up For Free Arikair', 'Already a member? Register to get your points.', '1684139599slider1.jpg', 'sign up now', 3, 1, '2023-05-08 23:17:17', '2023-05-15 08:33:19');

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `link` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` bigint(20) NOT NULL DEFAULT 1,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`id`, `title`, `link`, `status`, `created_at`, `updated_at`) VALUES
(1, 'About us', '/Aboutus', 1, '2023-05-07 17:27:17', '2023-05-13 09:34:17'),
(2, 'Policies', '/Policies', 1, '2023-05-08 07:17:21', '2023-05-13 09:34:35'),
(3, 'Company', '/Company', 1, '2023-05-08 07:17:30', '2023-05-13 09:34:51');

-- --------------------------------------------------------

--
-- Table structure for table `commercials`
--

CREATE TABLE `commercials` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `image` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `title2` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `description2` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `image2` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `video` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `homepage_id` bigint(20) NOT NULL,
  `status` bigint(20) NOT NULL DEFAULT 1,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `commercials`
--

INSERT INTO `commercials` (`id`, `title`, `description`, `image`, `title2`, `description2`, `image2`, `video`, `homepage_id`, `status`, `created_at`, `updated_at`) VALUES
(8, 'Amet et iure quis q', 'Voluptas illo necess', '1684324362Lugages.jpg', 'Sit perferendis con', 'Magnam sit aliqua xhhhhhhhhh', '1684325113Pilot program.jpg', 'https://www.youtube.com/embed/YOUR_VIDEO_ID', 1, 1, '2023-05-15 15:25:49', '2023-05-17 12:05:13');

-- --------------------------------------------------------

--
-- Table structure for table `company`
--

CREATE TABLE `company` (
  `id` int(11) NOT NULL,
  `company_name` varchar(222) NOT NULL,
  `company_email` varchar(100) NOT NULL,
  `company_phone` varchar(20) NOT NULL,
  `address_1` varchar(500) NOT NULL,
  `address_2` varchar(500) NOT NULL,
  `address_3` varchar(500) NOT NULL,
  `status` enum('0','1') NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `company`
--

INSERT INTO `company` (`id`, `company_name`, `company_email`, `company_phone`, `address_1`, `address_2`, `address_3`, `status`) VALUES
(1, 'Arik', 'meyorpop@gmail.com.com', '+234 708 888 5242', 'Josc', 'Walk In Store:\r\nNigeri', 'Lagos Office:\r\nComing Soon!', '1');

-- --------------------------------------------------------

--
-- Table structure for table `company_histories`
--

CREATE TABLE `company_histories` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `image` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `owner` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` bigint(20) NOT NULL DEFAULT 1,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `company_histories`
--

INSERT INTO `company_histories` (`id`, `title`, `description`, `image`, `owner`, `status`, `created_at`, `updated_at`) VALUES
(1, 'Company History', 'Engage worldwide methodologies with web-enabled technology. Interactively coordinate proactive e-commerce via process-centric outside the box thinking. Completely pursue scalable customer service through sustainable potentialities.\r\n\r\nTravis Kirkpatrick, Owner', '1684341260Rectangle 704.png', 'Travis Kirkpatrick, Owner', 1, '2023-05-16 20:56:34', '2023-05-17 16:34:20');

-- --------------------------------------------------------

--
-- Table structure for table `deals_offers`
--

CREATE TABLE `deals_offers` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `image` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `kid` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `kid_title` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `kid_image` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `background_color` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` bigint(20) NOT NULL DEFAULT 1,
  `homepage_id` enum('1','2','3','') COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `deals_offers`
--

INSERT INTO `deals_offers` (`id`, `title`, `type`, `description`, `image`, `kid`, `kid_title`, `kid_image`, `background_color`, `status`, `homepage_id`, `created_at`, `updated_at`) VALUES
(2, 'Occaecat architecto c', 'Basic', 'Quos sit aliqua poppmmm ccc', '1684327305Deals and offer.jpg', 'TRAVELLING WITH KIDS', 'ARIK GO FAMILY', 'family.png', '#f66151', 1, '1', '2023-04-25 23:39:45', '2023-05-22 15:19:29'),
(3, 'Aut et enim eum offi', 'Arik Biz', 'Provident aspernatu', '1684166959slider1.jpg', 'TRAVELLING WITH KIDS', 'ARIK GO FAMILY', 'family.png', '#613583', 1, '2', '2023-04-25 23:46:57', '2023-05-15 16:09:19'),
(4, 'Voluptatem modi est', 'Arik Biz', 'Reprehenderit adipi', '1682629335category2.svg', 'TRAVELLING WITH KIDS', 'ARIK GO FAMILY', 'family.png', '#613583', 1, '2', '2023-04-27 20:02:15', '2023-04-27 20:02:15'),
(5, 'Repellendus Culpa', 'Arik Plus', 'Est ullam dignissim', '1684010267Trip discovery.jpg', 'TRAVELLING WITH KIDS', 'ARIK GO FAMILY', 'family.png', '#613583', 1, '1', '2023-05-02 08:10:45', '2023-05-13 20:37:47'),
(6, 'Duis possimus amet', 'Arik Biz', 'Accusantium iusto id', '1683099788hero.jpg', 'TRAVELLING WITH KIDS', 'ARIK GO FAMILY', 'family.png', '#613583', 1, '1', '2023-05-03 06:43:08', '2023-05-03 06:43:08'),
(7, 'ARIK BIZ', 'Arik_Biz', 'The fastest way to earn rewards and status. Earn on every Naira spent.', '1684506722Rectangle 661.png', 'TRAVELLING WITH KIDS', 'ARIK GO FAMILY', 'family.png', '#613583', 1, '3', '2023-05-09 11:04:11', '2023-05-19 14:32:02'),
(8, 'JOIN SAVER CLUB', 'Arik_Plus', 'The fastest way to earn rewards and status. Earn on every Naira spent.', '1684506878Rectangle 661 (2).png', 'TRAVELLING WITH KIDS', 'ARIK GO FAMILY', 'family.png', '#613583', 1, '3', '2023-05-09 11:04:57', '2023-05-19 14:34:38'),
(9, 'AFFINITY WINGS', 'Basic', 'The fastest way to earn rewards and status. Earn on every Naira spent.', '1684506907Rectangle 661 (1).png', 'TRAVELLING WITH KIDS', 'ARIK GO FAMILY', 'family.png', '#613583', 1, '3', '2023-05-09 11:10:47', '2023-05-19 14:35:07');

-- --------------------------------------------------------

--
-- Table structure for table `deal_icons`
--

CREATE TABLE `deal_icons` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `image` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `deal_id` bigint(20) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `deal_icons`
--

INSERT INTO `deal_icons` (`id`, `title`, `image`, `deal_id`, `created_at`, `updated_at`) VALUES
(7, 'Quas obcaecati quae', '1684770156pricetag.png', 2, '2023-05-22 14:42:36', '2023-05-22 14:42:36'),
(8, 'Quas obcaecati quae', '1684770156pricetag.png', 2, '2023-05-22 14:42:36', '2023-05-22 14:42:36'),
(9, 'Quas obcaecati quae', '1684770156pricetag.png', 2, '2023-05-22 14:42:36', '2023-05-22 14:42:36'),
(15, 'Quas obcaecati quae', '1684770156pricetag.png', 5, '2023-05-22 14:42:36', '2023-05-22 14:42:36'),
(16, 'Quas obcaecati quae', '1684770156pricetag.png', 5, '2023-05-22 14:42:36', '2023-05-22 14:42:36'),
(17, 'Quas obcaecati quae', '1684770156pricetag.png', 5, '2023-05-22 14:42:36', '2023-05-22 14:42:36'),
(18, 'Quas obcaecati quae', '1684770156pricetag.png', 6, '2023-05-22 14:42:36', '2023-05-22 14:42:36'),
(19, 'Quas obcaecati quae', '1684770156pricetag.png', 6, '2023-05-22 14:42:36', '2023-05-22 14:42:36'),
(20, 'Quas obcaecati quae', '1684770156pricetag.png', 6, '2023-05-22 14:42:36', '2023-05-22 14:42:36');

-- --------------------------------------------------------

--
-- Table structure for table `deal_labels`
--

CREATE TABLE `deal_labels` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `image` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` bigint(20) NOT NULL DEFAULT 1,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `deal_labels`
--

INSERT INTO `deal_labels` (`id`, `title`, `description`, `image`, `status`, `created_at`, `updated_at`) VALUES
(1, 'Relax with Arik', 'Deals & Offers', '1684163016pricetag.png', 1, NULL, '2023-05-16 11:58:41');

-- --------------------------------------------------------

--
-- Table structure for table `destinations`
--

CREATE TABLE `destinations` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `state` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `image` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `homepage_id` int(11) NOT NULL,
  `color` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` bigint(20) NOT NULL DEFAULT 1,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `destinations`
--

INSERT INTO `destinations` (`id`, `state`, `description`, `image`, `homepage_id`, `color`, `status`, `created_at`, `updated_at`) VALUES
(3, 'Owerri', 'Owerri', '1684326167Owerri.jpg', 2, '#42240b', 1, '2023-04-27 22:14:40', '2023-05-17 12:22:47'),
(5, 'Abuja', 'Abuja', '1684326396ABuja-state.jpg', 1, '#08300e', 1, '2023-05-17 12:26:36', '2023-05-17 12:27:37'),
(6, 'Kaduna', 'Mollitia non elit u', '1684405745club.png', 1, '#ce904b', 1, '2023-05-18 10:29:05', '2023-05-18 10:29:50');

-- --------------------------------------------------------

--
-- Table structure for table `destination_labels`
--

CREATE TABLE `destination_labels` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `image` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` bigint(20) NOT NULL DEFAULT 1,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `destination_labels`
--

INSERT INTO `destination_labels` (`id`, `title`, `description`, `image`, `status`, `created_at`, `updated_at`) VALUES
(1, 'Relax with Arik', 'Porpular Destinations', '1684162768flight.png', 1, NULL, '2023-05-15 14:59:28');

-- --------------------------------------------------------

--
-- Table structure for table `dollar_rate`
--

CREATE TABLE `dollar_rate` (
  `id` int(11) NOT NULL,
  `rate` varchar(200) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `dollar_rate`
--

INSERT INTO `dollar_rate` (`id`, `rate`, `created_at`) VALUES
(1, '900', '2022-11-09 14:32:44');

-- --------------------------------------------------------

--
-- Table structure for table `event_cats`
--

CREATE TABLE `event_cats` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` bigint(20) NOT NULL DEFAULT 1,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `event_cats`
--

INSERT INTO `event_cats` (`id`, `title`, `status`, `created_at`, `updated_at`) VALUES
(1, 'News', 1, '2023-05-21 08:06:13', '2023-05-21 08:06:13'),
(2, 'Article', 1, '2023-05-21 08:08:44', '2023-05-21 08:08:44');

-- --------------------------------------------------------

--
-- Table structure for table `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `uuid` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `connection` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `faqs`
--

CREATE TABLE `faqs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `question` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `answer` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` bigint(20) NOT NULL DEFAULT 1,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `faqs`
--

INSERT INTO `faqs` (`id`, `question`, `answer`, `status`, `created_at`, `updated_at`) VALUES
(1, 'Quis aut laborum est', 'Aliquid qui dolorem', 1, '2023-05-16 08:57:42', '2023-05-16 08:57:42'),
(2, 'Eaque earum irure qu', 'Suscipit veniam Nam', 1, '2023-05-16 17:28:46', '2023-05-16 17:28:46'),
(3, 'Suscipit labore volu', 'Dolore sint qui qui', 1, '2023-05-16 17:29:44', '2023-05-16 17:29:44');

-- --------------------------------------------------------

--
-- Table structure for table `features`
--

CREATE TABLE `features` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `image` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `icon` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `homepage_id` int(11) NOT NULL,
  `status` bigint(20) NOT NULL DEFAULT 1,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `features`
--

INSERT INTO `features` (`id`, `name`, `title`, `description`, `image`, `icon`, `homepage_id`, `status`, `created_at`, `updated_at`) VALUES
(2, 'group booking', 'Enjoy Benefits of Booking together', 'Have fun flying together while enjoying the benefits of group booking.', '1684220946groupbooking.jpg', '1683973948email (1).png', 1, 1, '2023-04-25 13:18:56', '2023-05-16 07:09:06'),
(3, 'AFFINITY WINGS', 'Enjoy Arik\'s Afinity Wings Service', 'Have fun flying together while enjoying the benefits of group booking.', '1684221083affinityarik.png', '1683973948email (1).png', 1, 1, '2023-04-26 18:11:10', '2023-05-16 07:11:23'),
(4, 'CHARTER SERVICE', 'We Offer The Best Affordable Charter Service', 'Enjoy our realiable service of charter, yoga and amazing view and much more at best prices.', '1684221193charter.png', '1683973948email (1).png', 1, 1, '2023-05-01 22:10:58', '2023-05-16 07:13:13'),
(5, 'HELICOPTER SERVICE', 'Enjoy Our Helicopter Service At Your Finger Tip', 'Have fun flying together while enjoying the benefits of group booking.', '1684221269helicopterservice.jpg', '1683973948email (1).png', 1, 1, '2023-05-03 06:50:24', '2023-05-16 07:15:08'),
(6, 'HOTEL', 'Book For The Best Hotel From Within Our Site', 'Have fun flying together while enjoying the benefits of group booking.', '1684221399hotelandairbnb.jpg', '1684221399pricetag.png', 1, 1, '2023-05-16 07:16:39', '2023-05-16 07:16:39');

-- --------------------------------------------------------

--
-- Table structure for table `footers`
--

CREATE TABLE `footers` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `image` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `background_color` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `color` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `homepage_id` int(11) NOT NULL,
  `status` bigint(20) NOT NULL DEFAULT 1,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `footers`
--

INSERT INTO `footers` (`id`, `title`, `image`, `background_color`, `color`, `homepage_id`, `status`, `created_at`, `updated_at`) VALUES
(3, 'Moms', '1684238409Ariklogowhite.png', '#4c0909', '#ffffff', 1, 1, '2023-05-07 16:53:41', '2023-05-20 11:53:02'),
(4, 'Page2', '1684158204.JPG', '#a51d2d', '#ffffff', 2, 1, '2023-05-08 07:53:36', '2023-05-15 16:04:58'),
(5, 'Page3', '1684404387Ariklogowhite.png', '#4c0909', '#ffffff', 3, 1, '2023-05-08 07:53:36', '2023-05-18 10:06:27');

-- --------------------------------------------------------

--
-- Table structure for table `home_pages`
--

CREATE TABLE `home_pages` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` tinyint(1) NOT NULL DEFAULT 0,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `home_pages`
--

INSERT INTO `home_pages` (`id`, `title`, `status`, `created_at`, `updated_at`) VALUES
(1, 'Homepage 1', 1, NULL, '2023-05-20 14:34:55'),
(2, 'Homepage 2', 0, NULL, '2023-05-20 14:34:55'),
(3, 'Homepage 3', 0, NULL, '2023-05-20 14:34:55');

-- --------------------------------------------------------

--
-- Table structure for table `home_roles`
--

CREATE TABLE `home_roles` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `homepage_id` bigint(20) NOT NULL,
  `role_id` bigint(20) NOT NULL,
  `status` tinyint(1) NOT NULL DEFAULT 1,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `home_roles`
--

INSERT INTO `home_roles` (`id`, `homepage_id`, `role_id`, `status`, `created_at`, `updated_at`) VALUES
(3, 2, 3, 1, NULL, NULL),
(4, 2, 7, 1, NULL, NULL),
(5, 2, 2, 1, NULL, NULL),
(6, 2, 4, 1, NULL, NULL),
(7, 1, 1, 1, NULL, NULL),
(8, 1, 2, 1, NULL, NULL),
(9, 1, 3, 1, NULL, NULL),
(10, 1, 4, 1, NULL, NULL),
(11, 1, 5, 1, NULL, NULL),
(12, 1, 7, 1, NULL, NULL),
(13, 1, 6, 1, NULL, NULL),
(14, 1, 8, 1, NULL, NULL),
(15, 1, 9, 1, NULL, NULL),
(16, 2, 9, 1, NULL, NULL),
(17, 3, 7, 1, NULL, NULL),
(18, 3, 9, 1, NULL, NULL),
(19, 1, 10, 1, NULL, NULL),
(20, 3, 4, 1, NULL, NULL),
(21, 3, 10, 1, NULL, NULL),
(22, 3, 8, 1, NULL, NULL),
(23, 2, 10, 1, NULL, NULL),
(24, 3, 3, 1, NULL, NULL),
(25, 3, 2, 1, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `manage_site`
--

CREATE TABLE `manage_site` (
  `id` int(11) NOT NULL,
  `value` int(11) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `manage_site`
--

INSERT INTO `manage_site` (`id`, `value`, `created_at`) VALUES
(1, 1, '2022-11-09 13:54:43');

-- --------------------------------------------------------

--
-- Table structure for table `manage_users`
--

CREATE TABLE `manage_users` (
  `id` int(11) NOT NULL,
  `usersss_menu` varchar(200) NOT NULL,
  `users_log` varchar(200) NOT NULL,
  `status` enum('0','1','2') NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `menu`
--

CREATE TABLE `menu` (
  `id` int(11) NOT NULL,
  `title` varchar(255) NOT NULL,
  `link` varchar(255) NOT NULL,
  `icon` text NOT NULL,
  `orderby` int(11) NOT NULL,
  `status` enum('0','1','2') NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `menu`
--

INSERT INTO `menu` (`id`, `title`, `link`, `icon`, `orderby`, `status`) VALUES
(1, 'Active Home', '{{ route(\'home_role\', [\'id\' => md5($homepage->id) ]) }}', '<span class=\"svg-icon svg-icon-primary svg-icon-2x\"><!--begin::Svg Icon | path:/var/www/preview.keenthemes.com/metronic/releases/2021-05-14-112058/theme/html/demo13/dist/../src/media/svg/icons/Navigation/Exchange.svg--><svg xmlns=\"http://www.w3.org/2000/svg\" xmlns:xlink=\"http://www.w3.org/1999/xlink\" width=\"24px\" height=\"24px\" viewBox=\"0 0 24 24\" version=\"1.1\">\r\n    <g stroke=\"none\" stroke-width=\"1\" fill=\"none\" fill-rule=\"evenodd\">\r\n        <polygon points=\"0 0 24 0 24 24 0 24\"/>\r\n        <rect fill=\"#000000\" opacity=\"0.3\" transform=\"translate(13.000000, 6.000000) rotate(-450.000000) translate(-13.000000, -6.000000) \" x=\"12\" y=\"8.8817842e-16\" width=\"2\" height=\"12\" rx=\"1\"/>\r\n        <path d=\"M9.79289322,3.79289322 C10.1834175,3.40236893 10.8165825,3.40236893 11.2071068,3.79289322 C11.5976311,4.18341751 11.5976311,4.81658249 11.2071068,5.20710678 L8.20710678,8.20710678 C7.81658249,8.59763107 7.18341751,8.59763107 6.79289322,8.20710678 L3.79289322,5.20710678 C3.40236893,4.81658249 3.40236893,4.18341751 3.79289322,3.79289322 C4.18341751,3.40236893 4.81658249,3.40236893 5.20710678,3.79289322 L7.5,6.08578644 L9.79289322,3.79289322 Z\" fill=\"#000000\" fill-rule=\"nonzero\" transform=\"translate(7.500000, 6.000000) rotate(-270.000000) translate(-7.500000, -6.000000) \"/>\r\n        <rect fill=\"#000000\" opacity=\"0.3\" transform=\"translate(11.000000, 18.000000) scale(1, -1) rotate(90.000000) translate(-11.000000, -18.000000) \" x=\"10\" y=\"12\" width=\"2\" height=\"12\" rx=\"1\"/>\r\n        <path d=\"M18.7928932,15.7928932 C19.1834175,15.4023689 19.8165825,15.4023689 20.2071068,15.7928932 C20.5976311,16.1834175 20.5976311,16.8165825 20.2071068,17.2071068 L17.2071068,20.2071068 C16.8165825,20.5976311 16.1834175,20.5976311 15.7928932,20.2071068 L12.7928932,17.2071068 C12.4023689,16.8165825 12.4023689,16.1834175 12.7928932,15.7928932 C13.1834175,15.4023689 13.8165825,15.4023689 14.2071068,15.7928932 L16.5,18.0857864 L18.7928932,15.7928932 Z\" fill=\"#000000\" fill-rule=\"nonzero\" transform=\"translate(16.500000, 18.000000) scale(1, -1) rotate(270.000000) translate(-16.500000, -18.000000) \"/>\r\n    </g>\r\n</svg><!--end::Svg Icon--></span>', 1, '0'),
(2, 'User Account', '/manage-users', '<span class=\"svg-icon svg-icon-primary svg-icon-2x\"><!--begin::Svg Icon | path:/var/www/preview.keenthemes.com/metronic/releases/2021-05-14-112058/theme/html/demo13/dist/../src/media/svg/icons/General/User.svg--><svg xmlns=\"http://www.w3.org/2000/svg\" xmlns:xlink=\"http://www.w3.org/1999/xlink\" width=\"24px\" height=\"24px\" viewBox=\"0 0 24 24\" version=\"1.1\">\r\n    <g stroke=\"none\" stroke-width=\"1\" fill=\"none\" fill-rule=\"evenodd\">\r\n        <polygon points=\"0 0 24 0 24 24 0 24\"/>\r\n        <path d=\"M12,11 C9.790861,11 8,9.209139 8,7 C8,4.790861 9.790861,3 12,3 C14.209139,3 16,4.790861 16,7 C16,9.209139 14.209139,11 12,11 Z\" fill=\"#000000\" fill-rule=\"nonzero\" opacity=\"0.3\"/>\r\n        <path d=\"M3.00065168,20.1992055 C3.38825852,15.4265159 7.26191235,13 11.9833413,13 C16.7712164,13 20.7048837,15.2931929 20.9979143,20.2 C21.0095879,20.3954741 20.9979143,21 20.2466999,21 C16.541124,21 11.0347247,21 3.72750223,21 C3.47671215,21 2.97953825,20.45918 3.00065168,20.1992055 Z\" fill=\"#000000\" fill-rule=\"nonzero\"/>\r\n    </g>\r\n</svg><!--end::Svg Icon--></span>', 2, '1'),
(3, 'Manage Promo', '/manage-Promo', '<span class=\"svg-icon svg-icon-primary svg-icon-2x\"><!--begin::Svg Icon | path:/var/www/preview.keenthemes.com/metronic/releases/2021-05-14-112058/theme/html/demo13/dist/../src/media/svg/icons/Design/Adjust.svg--><svg xmlns=\"http://www.w3.org/2000/svg\" xmlns:xlink=\"http://www.w3.org/1999/xlink\" width=\"24px\" height=\"24px\" viewBox=\"0 0 24 24\" version=\"1.1\">\n    <g stroke=\"none\" stroke-width=\"1\" fill=\"none\" fill-rule=\"evenodd\">\n        <rect x=\"0\" y=\"0\" width=\"24\" height=\"24\"/>\n        <path d=\"M12,20 C7.581722,20 4,16.418278 4,12 C4,7.581722 7.581722,4 12,4 C16.418278,4 20,7.581722 20,12 C20,16.418278 16.418278,20 12,20 Z M12,5.99999664 C8.6862915,6 6,8.6862915 6,12 C6,15.3137085 8.6862915,18 12,18.0000034 L12,5.99999664 Z\" fill=\"#000000\" fill-rule=\"nonzero\"/>\n    </g>\n</svg><!--end::Svg Icon--></span>', 3, '0'),
(5, 'Manage-menus', '/Overall', '<span class=\"svg-icon svg-icon-primary svg-icon-2x\"><!--begin::Svg Icon | path:/var/www/preview.keenthemes.com/metronic/releases/2021-05-14-112058/theme/html/demo13/dist/../src/media/svg/icons/Design/Adjust.svg--><svg xmlns=\"http://www.w3.org/2000/svg\" xmlns:xlink=\"http://www.w3.org/1999/xlink\" width=\"24px\" height=\"24px\" viewBox=\"0 0 24 24\" version=\"1.1\">\r\n    <g stroke=\"none\" stroke-width=\"1\" fill=\"none\" fill-rule=\"evenodd\">\r\n        <rect x=\"0\" y=\"0\" width=\"24\" height=\"24\"/>\r\n        <path d=\"M12,20 C7.581722,20 4,16.418278 4,12 C4,7.581722 7.581722,4 12,4 C16.418278,4 20,7.581722 20,12 C20,16.418278 16.418278,20 12,20 Z M12,5.99999664 C8.6862915,6 6,8.6862915 6,12 C6,15.3137085 8.6862915,18 12,18.0000034 L12,5.99999664 Z\" fill=\"#000000\" fill-rule=\"nonzero\"/>\r\n    </g>\r\n</svg><!--end::Svg Icon--></span>', 4, '1'),
(6, 'Manage Popular Destination', '/manage-Destination', '<span class=\"svg-icon svg-icon-primary svg-icon-2x\"><!--begin::Svg Icon | path:/var/www/preview.keenthemes.com/metronic/releases/2021-05-14-112058/theme/html/demo13/dist/../src/media/svg/icons/Code/Option.svg--><svg xmlns=\"http://www.w3.org/2000/svg\" xmlns:xlink=\"http://www.w3.org/1999/xlink\" width=\"24px\" height=\"24px\" viewBox=\"0 0 24 24\" version=\"1.1\">\n    <g stroke=\"none\" stroke-width=\"1\" fill=\"none\" fill-rule=\"evenodd\">\n        <rect x=\"0\" y=\"0\" width=\"24\" height=\"24\"/>\n        <rect fill=\"#000000\" opacity=\"0.3\" x=\"12\" y=\"7\" width=\"10\" height=\"2\" rx=\"1\"/>\n        <path d=\"M2,9 C1.44771525,9 1,8.55228475 1,8 C1,7.44771525 1.44771525,7 2,7 L7.35012691,7 C8.14050434,7 8.85674733,7.46546704 9.17775001,8.18772307 L12.6498731,16 L22,16 C22.5522847,16 23,16.4477153 23,17 C23,17.5522847 22.5522847,18 22,18 L12.6498731,18 C11.8594957,18 11.1432527,17.534533 10.82225,16.8122769 L7.35012691,9 L2,9 Z\" fill=\"#000000\" fill-rule=\"nonzero\"/>\n    </g>\n</svg><!--end::Svg Icon--></span>', 0, '0'),
(13, 'Manage Web Contents', '/web-content', '<span class=\"svg-icon svg-icon-primary svg-icon-2x\"><!--begin::Svg Icon | path:/var/www/preview.keenthemes.com/metronic/releases/2021-05-14-112058/theme/html/demo13/dist/../src/media/svg/icons/Code/Option.svg--><svg xmlns=\"http://www.w3.org/2000/svg\" xmlns:xlink=\"http://www.w3.org/1999/xlink\" width=\"24px\" height=\"24px\" viewBox=\"0 0 24 24\" version=\"1.1\">\n    <g stroke=\"none\" stroke-width=\"1\" fill=\"none\" fill-rule=\"evenodd\">\n        <rect x=\"0\" y=\"0\" width=\"24\" height=\"24\"/>\n        <rect fill=\"#000000\" opacity=\"0.3\" x=\"12\" y=\"7\" width=\"10\" height=\"2\" rx=\"1\"/>\n        <path d=\"M2,9 C1.44771525,9 1,8.55228475 1,8 C1,7.44771525 1.44771525,7 2,7 L7.35012691,7 C8.14050434,7 8.85674733,7.46546704 9.17775001,8.18772307 L12.6498731,16 L22,16 C22.5522847,16 23,16.4477153 23,17 C23,17.5522847 22.5522847,18 22,18 L12.6498731,18 C11.8594957,18 11.1432527,17.534533 10.82225,16.8122769 L7.35012691,9 L2,9 Z\" fill=\"#000000\" fill-rule=\"nonzero\"/>\n    </g>\n</svg><!--end::Svg Icon--></span>', 0, '1'),
(14, 'Manage Deals and offers', '/manage-DealsOffer', '<span class=\"svg-icon svg-icon-primary svg-icon-2x\"><!--begin::Svg Icon | path:/var/www/preview.keenthemes.com/metronic/releases/2021-05-14-112058/theme/html/demo13/dist/../src/media/svg/icons/Code/Option.svg--><svg xmlns=\"http://www.w3.org/2000/svg\" xmlns:xlink=\"http://www.w3.org/1999/xlink\" width=\"24px\" height=\"24px\" viewBox=\"0 0 24 24\" version=\"1.1\">\r\n    <g stroke=\"none\" stroke-width=\"1\" fill=\"none\" fill-rule=\"evenodd\">\r\n        <rect x=\"0\" y=\"0\" width=\"24\" height=\"24\"/>\r\n        <rect fill=\"#000000\" opacity=\"0.3\" x=\"12\" y=\"7\" width=\"10\" height=\"2\" rx=\"1\"/>\r\n        <path d=\"M2,9 C1.44771525,9 1,8.55228475 1,8 C1,7.44771525 1.44771525,7 2,7 L7.35012691,7 C8.14050434,7 8.85674733,7.46546704 9.17775001,8.18772307 L12.6498731,16 L22,16 C22.5522847,16 23,16.4477153 23,17 C23,17.5522847 22.5522847,18 22,18 L12.6498731,18 C11.8594957,18 11.1432527,17.534533 10.82225,16.8122769 L7.35012691,9 L2,9 Z\" fill=\"#000000\" fill-rule=\"nonzero\"/>\r\n    </g>\r\n</svg><!--end::Svg Icon--></span>', 0, '0');

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
(2, '2014_10_12_100000_create_password_resets_table', 1),
(3, '2019_08_19_000000_create_failed_jobs_table', 1),
(4, '2019_12_14_000001_create_personal_access_tokens_table', 1),
(5, '2023_04_24_092835_create_newsletters_table', 1),
(6, '2023_04_24_113601_create_promos_table', 2),
(7, '2023_04_24_171744_create_news_events_table', 3),
(8, '2023_04_25_102356_create_web_menus_table', 4),
(9, '2023_04_25_103045_create_sub_menus_table', 4),
(10, '2023_04_25_132736_create_features_table', 5),
(11, '2023_04_25_142930_create_socials_table', 6),
(12, '2023_04_25_142952_create_faqs_table', 6),
(13, '2023_04_25_165607_create_web_logos_table', 7),
(14, '2023_04_25_191133_create_destinations_table', 8),
(15, '2023_04_26_000945_create_deals_offers_table', 9),
(16, '2023_05_01_084511_create_home_pages_table', 10),
(17, '2023_05_01_124258_create_roles_table', 11),
(18, '2023_05_01_124607_create_home_roles_table', 11),
(19, '2023_05_05_192506_create_commercials_table', 12),
(20, '2023_05_07_111500_create_categories_table', 13),
(21, '2023_05_07_111537_create_sub_categories_table', 13),
(22, '2023_05_07_112012_create_footers_table', 14),
(23, '2023_05_08_234640_create_bonuses_table', 15),
(24, '2023_05_09_133132_create_quick_boxes_table', 16),
(25, '2023_05_11_221300_create_abouts_table', 17),
(26, '2023_05_12_065140_create_policies_table', 17),
(27, '2023_05_12_065300_create_mission_vissions_table', 17),
(28, '2023_05_12_071627_create_deal_labels_table', 17),
(29, '2023_05_12_111657_create_destination_labels_table', 18),
(30, '2023_05_12_115241_create_news_event_labels_table', 19),
(31, '2023_05_16_075938_create_faqs_table', 20),
(32, '2023_05_16_095952_create_appstores_table', 21),
(33, '2023_05_16_180845_create_company_histories_table', 21),
(34, '2023_05_16_181157_create_routings_table', 21),
(35, '2023_05_19_072539_create_deal_icons_table', 22),
(36, '2023_05_19_123653_create_event_cats_table', 23);

-- --------------------------------------------------------

--
-- Table structure for table `mission_vissions`
--

CREATE TABLE `mission_vissions` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `image` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` bigint(20) NOT NULL DEFAULT 1,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `mission_vissions`
--

INSERT INTO `mission_vissions` (`id`, `title`, `description`, `image`, `status`, `created_at`, `updated_at`) VALUES
(1, 'Mission', 'Engage worldwide methodologies with web- enabled technology. Interactively coordinate proactive e-commerce via process-centric outside the box thinking. Completely pursue scalable customer service through sustainable potentialities. s', '1684341018Rectangle 711.png', 0, '2023-05-12 08:43:45', '2023-05-17 16:30:18'),
(2, 'VIssion', 'Engage worldwide methodologies with web- enabled technology. Interactively coordinate proactive e-commerce via process-centric outside the box thinking. Completely pursue scalable customer service through sustainable potentialities.', '1684341109Rectangle 712.png', 1, '2023-05-15 12:25:42', '2023-05-17 16:31:49');

-- --------------------------------------------------------

--
-- Table structure for table `newsletters`
--

CREATE TABLE `newsletters` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `description` longtext COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `homepage_id` int(11) NOT NULL,
  `link` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` int(11) NOT NULL DEFAULT 1,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `newsletters`
--

INSERT INTO `newsletters` (`id`, `title`, `description`, `homepage_id`, `link`, `status`, `created_at`, `updated_at`) VALUES
(5, 'Qui illo nulla asper shsshhshs', 'Pariatur Sunt dndjdjjjjjdj', 1, NULL, 1, '2023-04-24 09:53:44', '2023-04-24 10:24:56'),
(6, 'Nisi excepturi omnis', 'Aute unde tempor vel', 1, NULL, 1, '2023-05-01 22:06:54', '2023-05-01 22:06:54');

-- --------------------------------------------------------

--
-- Table structure for table `news_events`
--

CREATE TABLE `news_events` (
  `id` int(11) NOT NULL,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `description` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `image` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `homepage_id` int(11) NOT NULL,
  `eventdate` varchar(250) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `location` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `start_time` time DEFAULT NULL,
  `end_time` time DEFAULT NULL,
  `category_id` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` bigint(20) NOT NULL DEFAULT 1,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `news_events`
--

INSERT INTO `news_events` (`id`, `title`, `description`, `image`, `homepage_id`, `eventdate`, `location`, `start_time`, `end_time`, `category_id`, `status`, `created_at`, `updated_at`) VALUES
(1, 'Et esse exercitation', 'Lorem officia quis r', '1684329236taxify.jpeg', 1, '2023-05-15', 'Lagos', '02:02:00', '02:02:00', '[\"1\"]', 1, '2023-04-25 17:45:57', '2023-05-21 09:55:21'),
(2, 'Molestiae ratione nu', 'Reprehenderit aut a', '1682536220blog3.jpg', 1, '2023-05-30', 'Kaduna', '00:00:00', '18:00:00', NULL, 1, '2023-04-26 18:10:20', '2023-05-15 15:45:31'),
(3, 'Ad quibusdam iste to', 'At modi quia quis au', '1682982132grid-img4.jpg', 1, NULL, NULL, NULL, NULL, '[\"2\"]', 1, '2023-05-01 22:02:12', '2023-05-22 15:09:18'),
(4, 'Doloremque enim et l', 'Aut ut at est volupt', '1683232937product-cover-2.png', 1, '2023-05-04', NULL, NULL, NULL, NULL, 1, '2023-05-04 19:42:17', '2023-05-04 19:42:17'),
(5, 'Nulla maxime eum in', 'Et quibusdam volupta', '1684665290pricetag.png', 1, '2023-05-21', 'Dolore assumenda qui', '14:51:00', '20:55:00', NULL, 1, '2023-05-21 09:34:50', '2023-05-21 09:34:50');

-- --------------------------------------------------------

--
-- Table structure for table `news_event_labels`
--

CREATE TABLE `news_event_labels` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `image` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` bigint(20) NOT NULL DEFAULT 1,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `news_event_labels`
--

INSERT INTO `news_event_labels` (`id`, `title`, `description`, `image`, `status`, `created_at`, `updated_at`) VALUES
(1, 'Arik News Room', 'News & Events', '1684162703news1.png', 1, NULL, '2023-05-15 14:58:23');

-- --------------------------------------------------------

--
-- Table structure for table `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `personal_access_tokens`
--

CREATE TABLE `personal_access_tokens` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `tokenable_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tokenable_id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(64) COLLATE utf8mb4_unicode_ci NOT NULL,
  `abilities` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `policies`
--

CREATE TABLE `policies` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `description` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `content` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `image` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `icon` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` bigint(20) NOT NULL DEFAULT 1,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `policies`
--

INSERT INTO `policies` (`id`, `title`, `name`, `description`, `content`, `image`, `icon`, `status`, `created_at`, `updated_at`) VALUES
(1, 'Possimus aut unde rdhhhhhhh', NULL, 'Architecto cum qui c', NULL, '1683879787Screenshot from 2023-05-10 09-25-38.png', NULL, 1, '2023-05-12 07:23:07', '2023-05-12 08:26:13'),
(2, 'Free checked baggage allowance', 'baggage', 'Baggage allowance details shown are indications for Arik Air operated flights only and may be subject to change depending on aircraft operated on the day of travel. Flights operated by other airlines under a Arik Air flight number may be subject to other baggage restrictions.', 'Your Bag Deserves\na Plus One', '1684322714charter.png', '1684322714suitcase.png', 1, '2023-05-17 08:13:17', '2023-05-17 11:25:14');

-- --------------------------------------------------------

--
-- Table structure for table `promos`
--

CREATE TABLE `promos` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `description` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `price` decimal(8,2) NOT NULL DEFAULT 0.00,
  `image` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `homepage_id` int(11) NOT NULL,
  `color` varchar(250) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `url_link` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` bigint(20) NOT NULL DEFAULT 1,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `promos`
--

INSERT INTO `promos` (`id`, `title`, `description`, `price`, `image`, `homepage_id`, `color`, `url_link`, `status`, `created_at`, `updated_at`) VALUES
(7, 'Harum dolore volupta', 'Travelza is the ultimate travel organizing app template that provides a seamless experience to users.', '80000.00', '1683897584slider1.jpg', 1, '#613583', NULL, 1, '2023-05-12 13:19:44', '2023-05-20 14:44:30'),
(8, 'Top Destination', 'Destination Trip', '50000.00', '1683933191slider-5.png', 1, '#000000', NULL, 1, '2023-05-12 23:13:11', '2023-05-12 23:13:11');

-- --------------------------------------------------------

--
-- Table structure for table `quick_boxes`
--

CREATE TABLE `quick_boxes` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `image` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `homepage_id` bigint(20) NOT NULL,
  `status` bigint(20) NOT NULL DEFAULT 1,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `quick_boxes`
--

INSERT INTO `quick_boxes` (`id`, `title`, `description`, `image`, `homepage_id`, `status`, `created_at`, `updated_at`) VALUES
(3, 'Route Map', 'the quick fox jumps over the lazy dog', '1684328117003-route.png', 1, 1, '2023-05-17 12:55:17', '2023-05-17 12:55:17'),
(4, 'Travel Update', 'the quick fox jumps over the lazy dog', '1684328240012-location.png', 1, 1, '2023-05-17 12:57:20', '2023-05-17 12:57:20'),
(5, 'Flight Time Table', 'the quick fox jumps over the lazy dog', '1684328296040-duty-free.png', 1, 1, '2023-05-17 12:58:16', '2023-05-17 12:58:16'),
(6, 'My Booking', 'the quick fox jumps over the lazy dog', '1684328376028-luggage.png', 1, 1, '2023-05-17 12:59:36', '2023-05-17 12:59:36');

-- --------------------------------------------------------

--
-- Table structure for table `roles`
--

CREATE TABLE `roles` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `link` varchar(250) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` tinyint(1) NOT NULL DEFAULT 1,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `roles`
--

INSERT INTO `roles` (`id`, `title`, `link`, `status`, `created_at`, `updated_at`) VALUES
(2, 'Slider/ Promo', '/manage-Promo', 1, '2023-04-30 23:00:00', '2023-04-30 23:00:00'),
(3, 'Feature', '/manage-Feature', 1, '2023-04-30 23:00:00', '2023-04-30 23:00:00'),
(4, 'NewsEvent', '/manage-NewsEvent', 1, '2023-04-30 23:00:00', '2023-04-30 23:00:00'),
(5, 'Newsletter', '/manage-Newsletter', 1, '2023-04-30 23:00:00', '2023-04-30 23:00:00'),
(6, 'Destination', '/manage-Destination', 1, '2023-04-30 23:00:00', '2023-04-30 23:00:00'),
(7, 'DealsOffer', '/manage-DealsOffer', 1, '2023-04-30 23:00:00', '2023-04-30 23:00:00'),
(8, 'Commercial', '/manage-Commercial', 1, '2023-04-30 23:00:00', '2023-04-30 23:00:00'),
(9, 'Quick Box', '/manage-QuickBox', 1, '2023-04-30 23:00:00', '2023-04-30 23:00:00'),
(10, 'Footer', '/manage-Footer', 1, '2023-04-30 23:00:00', '2023-04-30 23:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `routings`
--

CREATE TABLE `routings` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `routing` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `business_class` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `economy` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` int(11) NOT NULL DEFAULT 1,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `routings`
--

INSERT INTO `routings` (`id`, `routing`, `business_class`, `economy`, `status`, `created_at`, `updated_at`) VALUES
(1, 'ABUJA-LAGOS', '2PC 23kg/50lbs max each', '2PC 23kg/50lbs max each', 0, '2023-05-17 07:26:41', '2023-05-17 10:06:52'),
(2, 'ABUJA-LAGOS', '2PC 23kg/50lbs max each', '2PC 23kg/50lbs max each', 0, '2023-05-17 07:26:41', '2023-05-17 10:06:52'),
(3, 'ABUJA-LAGOS', '2PC 23kg/50lbs max each', '2PC 23kg/50lbs max each', 0, '2023-05-17 07:26:41', '2023-05-17 10:06:52'),
(4, 'ABUJA-LAGOS', '2PC 23kg/50lbs max each', '2PC 23kg/50lbs max each', 0, '2023-05-17 07:26:41', '2023-05-17 10:06:52');

-- --------------------------------------------------------

--
-- Table structure for table `slider`
--

CREATE TABLE `slider` (
  `id` int(11) NOT NULL,
  `img` varchar(225) NOT NULL,
  `img_2` varchar(200) DEFAULT NULL,
  `img_3` varchar(200) DEFAULT NULL,
  `status` enum('0','1','2') NOT NULL DEFAULT '1',
  `homepage` enum('1','2','3','') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `slider`
--

INSERT INTO `slider` (`id`, `img`, `img_2`, `img_3`, `status`, `homepage`) VALUES
(1, '', '1682369622product4.jpg', '1682369622product4.jpg', '1', '1'),
(2, '1682625630category2.svg', '1682625630category5.svg', '1682625630category5.svg', '1', '2');

-- --------------------------------------------------------

--
-- Table structure for table `slider2`
--

CREATE TABLE `slider2` (
  `id` int(11) NOT NULL,
  `img` varchar(225) NOT NULL,
  `img_2` varchar(200) DEFAULT NULL,
  `img_3` varchar(200) DEFAULT NULL,
  `status` enum('0','1','2') NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `slider2`
--

INSERT INTO `slider2` (`id`, `img`, `img_2`, `img_3`, `status`) VALUES
(1, '1682327664bg-image-3.png', '1682327664blog-pics1.png', '1682327664blog-pics1.png', '1');

-- --------------------------------------------------------

--
-- Table structure for table `socials`
--

CREATE TABLE `socials` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `url` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `image` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` bigint(20) NOT NULL DEFAULT 1,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `socials`
--

INSERT INTO `socials` (`id`, `title`, `url`, `image`, `status`, `created_at`, `updated_at`) VALUES
(1, 'Facebook', 'https://www.facebook.com', '1684238490Facebook.png', 1, '2023-04-25 16:58:44', '2023-05-16 12:01:30'),
(2, 'Linkin', 'https://www.linkedin.com/login', '1684404236Linkedin.png', 1, '2023-04-25 17:00:49', '2023-05-18 10:03:56'),
(3, 'Twitter', 'https://twitter.com', '1684238649Twitter.png', 1, '2023-05-16 12:04:09', '2023-05-16 12:04:09');

-- --------------------------------------------------------

--
-- Table structure for table `sub_categories`
--

CREATE TABLE `sub_categories` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `category_id` bigint(20) NOT NULL,
  `link` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` bigint(20) NOT NULL DEFAULT 1,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `sub_categories`
--

INSERT INTO `sub_categories` (`id`, `title`, `category_id`, `link`, `status`, `created_at`, `updated_at`) VALUES
(1, 'Employee database', 1, NULL, 1, '2023-05-07 18:20:49', '2023-05-08 07:15:54'),
(2, 'Payroll', 1, NULL, 1, '2023-05-08 07:16:12', '2023-05-08 07:16:12'),
(3, 'Absences', 1, NULL, 1, '2023-05-08 07:16:24', '2023-05-08 07:16:24'),
(4, 'Time tracking', 1, NULL, 1, '2023-05-08 07:16:37', '2023-05-08 07:16:37'),
(5, 'Shift planner', 1, NULL, 1, '2023-05-08 07:16:51', '2023-05-08 07:16:51'),
(6, 'Recruiting', 1, NULL, 1, '2023-05-08 07:17:04', '2023-05-08 07:17:04'),
(7, 'FAQ', 2, NULL, 1, '2023-05-08 07:17:51', '2023-05-08 07:17:51'),
(8, 'Blog', 2, NULL, 1, '2023-05-08 07:18:05', '2023-05-08 07:18:05'),
(9, 'Support', 1, NULL, 1, '2023-05-08 07:18:15', '2023-05-08 07:18:15'),
(10, 'Career', 3, NULL, 1, '2023-05-08 07:18:37', '2023-05-08 07:18:37'),
(11, 'Contact us', 3, NULL, 1, '2023-05-08 07:18:52', '2023-05-08 07:18:52'),
(12, 'Lift Media', 1, NULL, 1, '2023-05-08 07:19:05', '2023-05-08 07:19:05'),
(13, 'Baggage-policy', 2, '/Baggage-policy', 1, '2023-05-13 10:28:22', '2023-05-13 10:28:22'),
(14, 'Policy-policy', 2, '/Policy-policy', 1, '2023-05-13 10:28:48', '2023-05-13 10:28:48');

-- --------------------------------------------------------

--
-- Table structure for table `sub_menus`
--

CREATE TABLE `sub_menus` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `menu_id` bigint(20) NOT NULL,
  `link` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` bigint(20) NOT NULL DEFAULT 1,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `sub_menus`
--

INSERT INTO `sub_menus` (`id`, `title`, `menu_id`, `link`, `status`, `created_at`, `updated_at`) VALUES
(5, 'TRAVEL EXTRAS', 3, '/TRAVELEXTRAS', 1, '2023-05-02 08:14:48', '2023-05-13 09:33:14'),
(6, 'FLIGHT PACKAGES', 3, '/FLIGHTPACKAGES', 1, '2023-05-02 08:15:02', '2023-05-13 09:32:58'),
(7, 'FLY & WATCH', 3, '/FLY&WATCH', 1, '2023-05-02 08:15:24', '2023-05-13 09:32:40'),
(8, 'SEAT SELECTION', 3, '/SEATSELECTION', 1, '2023-05-02 08:15:37', '2023-05-13 09:32:13'),
(9, 'ARIK CAFE', 3, '/ARIKCAFE', 1, '2023-05-02 08:15:54', '2023-05-13 09:31:56'),
(10, 'ADDITIONAL BAGGAGE', 3, '/ADDITIONALBAGGAGE', 1, '2023-05-02 08:16:11', '2023-05-13 09:31:38'),
(11, 'LOST BAGGAGE APPLICATION', 3, '/LOSTBAGGAGEAPPLICATION', 1, '2023-05-02 08:16:24', '2023-05-13 09:31:23'),
(12, 'BAGGAGE RECIEPT', 3, '/BAGGAGERECIEPT', 1, '2023-05-02 08:16:43', '2023-05-13 09:29:12'),
(13, 'GENERAL RULES', 4, '/GENERALRULES', 1, '2023-05-02 08:17:01', '2023-05-13 09:27:27'),
(14, 'OUR NETWORK', 4, '/OURNETWORK', 1, '2023-05-02 08:17:16', '2023-05-13 09:27:08'),
(15, 'PRIVACY', 4, '/PRIVACY', 1, '2023-05-02 08:17:40', '2023-05-13 09:26:39'),
(16, 'CHECK-IN', 4, '/CHECK-IN', 1, '2023-05-02 08:17:52', '2023-05-13 09:26:21'),
(17, 'BAGGAGE ALLOWANCE', 4, '/BAGGAGEALLOWANCE', 1, '2023-05-02 08:20:36', '2023-05-13 09:26:05'),
(18, 'Mollit quod providen', 1, '/Mollitquodproviden', 1, '2023-05-07 18:17:25', '2023-05-13 09:25:51'),
(19, 'Quidem magnam unde u', 1, '/Quidemmagnamundeu', 1, '2023-05-07 18:17:59', '2023-05-13 09:25:28');

-- --------------------------------------------------------

--
-- Table structure for table `taxs`
--

CREATE TABLE `taxs` (
  `id` int(11) NOT NULL,
  `tax_title` varchar(255) NOT NULL,
  `value` int(11) NOT NULL,
  `status` enum('0','1','2') NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `taxs`
--

INSERT INTO `taxs` (`id`, `tax_title`, `value`, `status`) VALUES
(1, 'tax', 20, '1'),
(2, 'bar', 80, '1');

-- --------------------------------------------------------

--
-- Table structure for table `tops`
--

CREATE TABLE `tops` (
  `id` int(11) NOT NULL,
  `part_id` char(36) CHARACTER SET latin1 COLLATE latin1_bin NOT NULL,
  `createdAt` datetime NOT NULL,
  `updatedAt` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tops`
--

INSERT INTO `tops` (`id`, `part_id`, `createdAt`, `updatedAt`) VALUES
(1, '9778d5d219c5080b9a6a17bef029331c', '2021-11-25 12:55:07', '2021-11-25 12:55:07'),
(2, '92cc227532d17e56e07902b254dfad10', '2021-11-25 12:55:28', '2021-11-25 12:55:28'),
(3, 'c20ad4d76fe97759aa27a0c99bff6710', '2021-11-25 12:55:41', '2021-11-25 12:55:41'),
(4, 'c4ca4238a0b923820dcc509a6f75849bw111', '2021-11-25 14:03:29', '2021-11-25 14:04:04'),
(5, '76dc611d6ebaafc66cc0879c71b5db5c', '2022-06-17 09:59:03', '2022-06-17 09:59:03'),
(6, '47d1e990583c9c67424d369f3414728e', '2022-10-12 14:39:56', '2022-10-12 14:39:56');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` enum('0','1','2') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '1',
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `type` varchar(200) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'user',
  `created_at` timestamp NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `email_verified_at`, `password`, `status`, `remember_token`, `type`, `created_at`, `updated_at`) VALUES
(1, 'Mohammed Lawal Abubakar', 'softdiddy@gmail.com', NULL, '$2y$10$FljMJ2y.52b065gCE0tBxuCL3isUXldJwNstPnS25BhaJK1Apwtjm', '1', NULL, 'Supper', '2022-10-09 00:35:18', '2022-10-09 00:35:18'),
(2, 'Charles C.', 'charles.c@gapaautoparts.com', NULL, '$2y$10$lDoXkWYn502aLKoosoWQduycWBsCr/tLoFCH6EGLB0htG0EXoueJ6', '1', NULL, 'Supper', '2022-10-17 08:39:30', '2022-10-17 08:39:30'),
(3, 'Itoro Ido', 'itoro.i@gapaautoparts.com', NULL, '$2y$10$Ll59oGYvNALRDyBzrhR3YuZhGzXQIvo5Nfur/h3O1SUsIp7v45BV.', '0', NULL, 'user', '2022-11-03 11:21:02', '2022-11-03 11:21:02'),
(4, 'Grace Ogenyi', 'grace.o@gapaautoparts.com', NULL, '$2y$10$hCy4g3pGUie6Y4GKvBrb9.T9iO8Q36X8bBqbqnqhckPZ.WwgBPhwK', '1', NULL, 'user', '2022-11-03 11:22:03', '2022-11-03 11:22:03'),
(5, 'Yinka Ajani', 'yinka.a@gapaautoparts.com', NULL, '$2y$10$qhA6cKVkktzXpiO6nd.OteXBWAWvWnF2xrOnUHgwFIUfXWyKdwAcm', '1', NULL, 'user', '2022-11-03 13:06:56', '2022-11-03 13:06:56'),
(6, 'Murna Abdul', 'murna.a@gapaautoparts.com', NULL, '$2y$10$IsRiULQDvAvH6SMvoNhgqu1DQNsbMkeLrWJCL98YtOG2.niJtXree', '1', NULL, 'user', '2022-11-03 13:13:47', '2022-11-03 13:13:47'),
(7, 'Anita Ishaka', 'anita.i@gapaautoparts.com', NULL, '$2y$10$X5rTW5Nu2C8lrzmtjHrQ5.ypnHHp1caA20b3aT7fES3i2taoWyBVK', '1', NULL, 'user', '2022-11-03 13:14:43', '2022-11-03 13:14:43'),
(8, 'Mohammed Lawal Abubakar', 'softdiddy1@gmail.com', NULL, '$2y$10$FljMJ2y.52b065gCE0tBxuCL3isUXldJwNstPnS25BhaJK1Apwtjm', '2', NULL, 'user', '2022-10-09 00:35:18', '2022-10-09 00:35:18'),
(9, 'Blessing Korokorosei', 'ebimorkay@gmail.com', NULL, '$2y$10$BEOVi0WO/r9md3b30iEh3.qx5Iqd8q7NluEKa4WqUEZ50kOzNDBc2', '0', NULL, 'user', '2022-11-14 08:10:41', '2022-11-14 08:10:41'),
(10, 'Ufoma Okwifi', 'peaceufoma8@gmail.com', NULL, '$2y$10$KjDU5wR.ydQwwX7VOBvmY.PFAdfFh76lI6FwHe6eNhae/pAJgLVHW', '0', NULL, 'user', '2022-11-15 10:14:01', '2022-11-15 10:14:01'),
(11, 'Adewale George', 'adegeorge@gapaautoparts.com', NULL, '$2y$10$jvIKYwZ8wS1DhyGPAExFyeCdF0pQ8vL/ve/zNPhYNoYcO3EU577WC', '1', NULL, 'manage_users', '2022-11-17 14:38:59', '2022-11-17 14:38:59'),
(12, 'Mohammed Lawal Abubakar', 'soft@gmail.com', NULL, '$2y$10$FljMJ2y.52b065gCE0tBxuCL3isUXldJwNstPnS25BhaJK1Apwtjm', '2', NULL, 'Supper', '2022-10-09 00:35:18', '2022-10-09 00:35:18'),
(13, 'Alex Nwekwo', 'nwekwo.olisabuikem.alex@gmail.com', NULL, '$2y$10$Nz/cRFF.9RELzP28FGMHL.MZjDVzhqnuv65yDId2t3vOrk/nycX7a', '1', NULL, 'user', '2023-01-12 15:05:46', '2023-01-12 15:05:46'),
(14, 'meyor', 'user@user.com', NULL, '$2y$10$PBE.lDmZJCE8dUtL2jKuKeXIFhPv04MvhGC7FSZzDl4glUtMnZ7Su', '1', NULL, 'user', '2023-04-15 08:31:38', '2023-04-15 08:31:38'),
(15, 'Meyor', 'meyorpop@gmail.com', NULL, '$2y$10$FljMJ2y.52b065gCE0tBxuCL3isUXldJwNstPnS25BhaJK1Apwtjm', '1', NULL, 'Supper', '2023-04-23 21:24:45', '2023-04-23 21:24:45'),
(16, 'vic', 'vic@vic.com', NULL, '$2y$10$gIZwO4f2ZtfWsK/YBUxH7.kFspDkz3K7Mw2O5gBBTY000AcpRXbry', '1', NULL, 'Owner', '2023-05-02 06:26:52', '2023-05-02 06:26:52'),
(17, 'Joshua Crosby', 'sihafofuga@mailinator.com', NULL, '$2y$10$XpNmNJFDlM1eSY/agW9RcuM.rddxhXBdvcChZch5rG9bXRQ69XFme', '2', NULL, 'user', '2023-05-12 10:22:14', '2023-05-12 10:22:14');

-- --------------------------------------------------------

--
-- Table structure for table `user_menu`
--

CREATE TABLE `user_menu` (
  `user_menu_id` int(11) NOT NULL,
  `user_id` int(200) NOT NULL,
  `menu_id` int(200) NOT NULL,
  `status` enum('0','1','2') NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `user_menu`
--

INSERT INTO `user_menu` (`user_menu_id`, `user_id`, `menu_id`, `status`) VALUES
(1, 3, 1, '1'),
(2, 1, 2, '1'),
(3, 3, 2, '1'),
(4, 5, 1, '1'),
(5, 5, 2, '1'),
(6, 5, 3, '1'),
(7, 5, 4, '1'),
(8, 5, 5, '1'),
(9, 5, 7, '1'),
(10, 1, 3, '1'),
(11, 1, 4, '1'),
(13, 1, 7, '1'),
(14, 6, 14, '1'),
(15, 6, 8, '1'),
(16, 6, 15, '1'),
(17, 7, 14, '1'),
(18, 7, 15, '1'),
(19, 7, 8, '1'),
(20, 8, 14, '1'),
(21, 8, 8, '1'),
(22, 13, 8, '1'),
(23, 13, 5, '1'),
(24, 9, 8, '1'),
(25, 9, 15, '1'),
(26, 14, 8, '1'),
(27, 13, 3, '1'),
(28, 12, 8, '1'),
(29, 10, 2, '1'),
(30, 10, 5, '1'),
(31, 10, 7, '1'),
(32, 10, 8, '1'),
(33, 10, 9, '1'),
(34, 10, 11, '1'),
(35, 10, 15, '1'),
(36, 10, 14, '1'),
(37, 10, 13, '1'),
(38, 10, 4, '1'),
(39, 10, 10, '1'),
(40, 17, 8, '1'),
(41, 17, 14, '1'),
(42, 14, 15, '1'),
(43, 14, 4, '1'),
(44, 1, 16, '1'),
(45, 5, 16, '1'),
(46, 15, 2, '1'),
(48, 15, 4, '1'),
(49, 15, 1, '1'),
(52, 15, 8, '1'),
(55, 1, 1, '1'),
(56, 1, 13, '1'),
(58, 15, 12, '1'),
(59, 15, 14, '1'),
(60, 15, 5, '1'),
(61, 15, 9, '1'),
(62, 15, 6, '1'),
(63, 15, 3, '1'),
(64, 15, 13, '1'),
(65, 1, 5, '1');

-- --------------------------------------------------------

--
-- Table structure for table `website`
--

CREATE TABLE `website` (
  `id` int(11) NOT NULL,
  `about` text NOT NULL,
  `terms` text NOT NULL,
  `policy` text NOT NULL,
  `status` enum('0','1') NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `website`
--

INSERT INTO `website` (`id`, `about`, `terms`, `policy`, `status`) VALUES
(1, 'Abouts\r\n\r\n', 'Terms', 'policy', '0');

-- --------------------------------------------------------

--
-- Table structure for table `web_logos`
--

CREATE TABLE `web_logos` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `logo` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `web_logos`
--

INSERT INTO `web_logos` (`id`, `logo`, `created_at`, `updated_at`) VALUES
(1, '1684317823Ariklogowhite.png', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `web_menus`
--

CREATE TABLE `web_menus` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `orderby` int(11) NOT NULL,
  `link` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` bigint(20) NOT NULL DEFAULT 0,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `web_menus`
--

INSERT INTO `web_menus` (`id`, `title`, `description`, `orderby`, `link`, `status`, `created_at`, `updated_at`) VALUES
(1, 'About us', NULL, 1, '/Aboutus', 1, '2023-05-01 09:05:08', '2023-05-13 11:38:57'),
(2, 'BOOK', 'BOOK', 3, '/BOOK', 1, '2023-05-01 09:05:19', '2023-05-13 11:38:57'),
(3, 'EXPLORE', 'EXPLORE', 6, '/EXPLORE', 1, '2023-05-01 09:08:45', '2023-05-13 11:38:57'),
(4, 'SERVICES', 'SERVICES', 4, '/SERVICES', 1, '2023-05-01 09:08:57', '2023-05-13 11:38:57'),
(5, 'ABOUT', 'ABOUT', 2, '/ABOUT', 1, '2023-05-01 09:09:08', '2023-05-13 11:38:57'),
(6, 'CONTACT US', 'CONTACT USs', 5, '/CONTACTUS', 1, '2023-05-01 09:09:28', '2023-05-13 11:38:57');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `abouts`
--
ALTER TABLE `abouts`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `activities`
--
ALTER TABLE `activities`
  ADD PRIMARY KEY (`activity_id`);

--
-- Indexes for table `admin_user_menu`
--
ALTER TABLE `admin_user_menu`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `appstores`
--
ALTER TABLE `appstores`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `bonuses`
--
ALTER TABLE `bonuses`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `commercials`
--
ALTER TABLE `commercials`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `company_histories`
--
ALTER TABLE `company_histories`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `deals_offers`
--
ALTER TABLE `deals_offers`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `deal_icons`
--
ALTER TABLE `deal_icons`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `deal_labels`
--
ALTER TABLE `deal_labels`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `destinations`
--
ALTER TABLE `destinations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `destination_labels`
--
ALTER TABLE `destination_labels`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `event_cats`
--
ALTER TABLE `event_cats`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Indexes for table `faqs`
--
ALTER TABLE `faqs`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `features`
--
ALTER TABLE `features`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `footers`
--
ALTER TABLE `footers`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `home_pages`
--
ALTER TABLE `home_pages`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `home_roles`
--
ALTER TABLE `home_roles`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `menu`
--
ALTER TABLE `menu`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `mission_vissions`
--
ALTER TABLE `mission_vissions`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `newsletters`
--
ALTER TABLE `newsletters`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `news_events`
--
ALTER TABLE `news_events`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `news_event_labels`
--
ALTER TABLE `news_event_labels`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Indexes for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  ADD KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`);

--
-- Indexes for table `policies`
--
ALTER TABLE `policies`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `promos`
--
ALTER TABLE `promos`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `quick_boxes`
--
ALTER TABLE `quick_boxes`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `roles`
--
ALTER TABLE `roles`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `routings`
--
ALTER TABLE `routings`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `slider`
--
ALTER TABLE `slider`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `socials`
--
ALTER TABLE `socials`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `sub_categories`
--
ALTER TABLE `sub_categories`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `sub_menus`
--
ALTER TABLE `sub_menus`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user_menu`
--
ALTER TABLE `user_menu`
  ADD PRIMARY KEY (`user_menu_id`);

--
-- Indexes for table `website`
--
ALTER TABLE `website`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `web_logos`
--
ALTER TABLE `web_logos`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `web_menus`
--
ALTER TABLE `web_menus`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `abouts`
--
ALTER TABLE `abouts`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `activities`
--
ALTER TABLE `activities`
  MODIFY `activity_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=143;

--
-- AUTO_INCREMENT for table `appstores`
--
ALTER TABLE `appstores`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `bonuses`
--
ALTER TABLE `bonuses`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `commercials`
--
ALTER TABLE `commercials`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `company_histories`
--
ALTER TABLE `company_histories`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `deals_offers`
--
ALTER TABLE `deals_offers`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `deal_icons`
--
ALTER TABLE `deal_icons`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT for table `deal_labels`
--
ALTER TABLE `deal_labels`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `destinations`
--
ALTER TABLE `destinations`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `destination_labels`
--
ALTER TABLE `destination_labels`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `event_cats`
--
ALTER TABLE `event_cats`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `faqs`
--
ALTER TABLE `faqs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `features`
--
ALTER TABLE `features`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `footers`
--
ALTER TABLE `footers`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `home_pages`
--
ALTER TABLE `home_pages`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `home_roles`
--
ALTER TABLE `home_roles`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;

--
-- AUTO_INCREMENT for table `menu`
--
ALTER TABLE `menu`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=37;

--
-- AUTO_INCREMENT for table `mission_vissions`
--
ALTER TABLE `mission_vissions`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `newsletters`
--
ALTER TABLE `newsletters`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `news_events`
--
ALTER TABLE `news_events`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `news_event_labels`
--
ALTER TABLE `news_event_labels`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `policies`
--
ALTER TABLE `policies`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `promos`
--
ALTER TABLE `promos`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `quick_boxes`
--
ALTER TABLE `quick_boxes`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `roles`
--
ALTER TABLE `roles`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `routings`
--
ALTER TABLE `routings`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `slider`
--
ALTER TABLE `slider`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `socials`
--
ALTER TABLE `socials`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `sub_categories`
--
ALTER TABLE `sub_categories`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `sub_menus`
--
ALTER TABLE `sub_menus`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `user_menu`
--
ALTER TABLE `user_menu`
  MODIFY `user_menu_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=66;

--
-- AUTO_INCREMENT for table `website`
--
ALTER TABLE `website`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `web_logos`
--
ALTER TABLE `web_logos`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `web_menus`
--
ALTER TABLE `web_menus`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

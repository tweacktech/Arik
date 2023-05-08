-- phpMyAdmin SQL Dump
-- version 4.9.0.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: May 05, 2023 at 03:07 PM
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
(74, 'User Menu Was Added byMeyor', 'Added', '2023-05-02 08:57:04', '2023-05-02 08:57:04', '1');

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
-- Table structure for table `deals_offers`
--

CREATE TABLE `deals_offers` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `image` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` bigint(20) NOT NULL DEFAULT 1,
  `homepage_id` enum('1','2','3','') COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `deals_offers`
--

INSERT INTO `deals_offers` (`id`, `title`, `type`, `description`, `image`, `status`, `homepage_id`, `created_at`, `updated_at`) VALUES
(2, 'Occaecat architecto', 'Arik Plus', 'Quos sit aliqua popp', '1682469585category5.svg', 1, '1', '2023-04-25 23:39:45', '2023-04-27 19:41:08'),
(3, 'Aut et enim eum offi', 'Arik Biz', 'Provident aspernatu', '1682470017bars.logo.svg', 1, '2', '2023-04-25 23:46:57', '2023-04-27 20:12:11'),
(4, 'Voluptatem modi est', 'Arik Biz', 'Reprehenderit adipi', '1682629335category2.svg', 1, '2', '2023-04-27 20:02:15', '2023-04-27 20:02:15'),
(5, 'Repellendus Culpa', 'Arik Plus', 'Est ullam dignissim', '1683018645grid-img2.jpg', 1, '1', '2023-05-02 08:10:45', '2023-05-02 08:10:45'),
(6, 'Duis possimus amet', 'Arik Biz', 'Accusantium iusto id', '1683099788hero.jpg', 1, '1', '2023-05-03 06:43:08', '2023-05-03 06:43:08');

-- --------------------------------------------------------

--
-- Table structure for table `delivery_fee`
--

CREATE TABLE `delivery_fee` (
  `id` int(11) NOT NULL,
  `fee` varchar(200) NOT NULL,
  `status` enum('0','1') NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `delivery_fee`
--

INSERT INTO `delivery_fee` (`id`, `fee`, `status`) VALUES
(1, '200', '1');

-- --------------------------------------------------------

--
-- Table structure for table `delivery_rate_per_km`
--

CREATE TABLE `delivery_rate_per_km` (
  `id` int(11) NOT NULL,
  `rate` varchar(200) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `delivery_rate_per_km`
--

INSERT INTO `delivery_rate_per_km` (`id`, `rate`, `created_at`) VALUES
(2, '600', '2022-11-09 15:01:30');

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
(3, 'Allegra Underwood', 'Aut sint porro nostr', '1682637280grid-img5.jpg', 2, '#613583', 1, '2023-04-27 22:14:40', '2023-04-27 22:14:40'),
(4, 'Kiara Gillespiesssss', 'Modi dolore quia quosss', '1683018376grid-img4.jpg', 1, '#613583', 1, '2023-05-02 08:06:16', '2023-05-02 08:06:42');

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
  `faq` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `faqs`
--

INSERT INTO `faqs` (`id`, `faq`, `created_at`, `updated_at`) VALUES
(1, '<div class=\"ql-editor\" data-gramm=\"false\" contenteditable=\"true\"><p>Ask mw any quetion</p></div><div class=\"ql-clipboard\" tabindex=\"-1\" contenteditable=\"true\"></div><div class=\"ql-tooltip ql-hidden\"><a class=\"ql-preview\" target=\"_blank\" href=\"about:blank\"></a><input type=\"text\" data-formula=\"e=mc^2\" data-link=\"https://quilljs.com\" data-video=\"Embed URL\"><a class=\"ql-action\"></a><a class=\"ql-remove\"></a></div>', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `features`
--

CREATE TABLE `features` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
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
(2, 'group booking', 'Enjoy Benefits of Booking together', 'Have fun flying together while enjoying the benefits of group booking.', '1682432336hero.jpg', '1682432336category1.svg', 1, 1, '2023-04-25 13:18:56', '2023-04-25 13:18:56'),
(3, 'Madaline Hess', 'Distinctio Nemo ex', 'Animi rerum omnis e', '1682536270grid-img1.jpg', '1682536270category4.svg', 1, 1, '2023-04-26 18:11:10', '2023-04-26 18:11:10'),
(4, 'Ronan Whitaker', 'Voluptate quis animi', 'Voluptas aliquam sed', '1682982658category6.svg', '1682982658grid-img1.jpg', 1, 1, '2023-05-01 22:10:58', '2023-05-01 22:10:58'),
(5, 'Xandra Goodman', 'Amet magni eaque no', 'Consequatur sed ab', '1683100224category6.svg', '1683100224grid-img2.jpg', 1, 1, '2023-05-03 06:50:24', '2023-05-03 06:50:24');

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
(1, 'Homepage 1', 1, NULL, '2023-05-01 21:59:29'),
(2, 'Homepage 2', 0, NULL, '2023-05-01 21:59:29'),
(3, 'Homepage 3', 0, NULL, '2023-05-01 21:59:29');

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
(2, 2, 1, 1, NULL, NULL),
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
(13, 1, 6, 1, NULL, NULL);

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
(1, 'User Account', '/manage-users', '<span class=\"svg-icon svg-icon-primary svg-icon-2x\"><!--begin::Svg Icon | path:/var/www/preview.keenthemes.com/metronic/releases/2021-05-14-112058/theme/html/demo13/dist/../src/media/svg/icons/General/User.svg--><svg xmlns=\"http://www.w3.org/2000/svg\" xmlns:xlink=\"http://www.w3.org/1999/xlink\" width=\"24px\" height=\"24px\" viewBox=\"0 0 24 24\" version=\"1.1\">\n    <g stroke=\"none\" stroke-width=\"1\" fill=\"none\" fill-rule=\"evenodd\">\n        <polygon points=\"0 0 24 0 24 24 0 24\"/>\n        <path d=\"M12,11 C9.790861,11 8,9.209139 8,7 C8,4.790861 9.790861,3 12,3 C14.209139,3 16,4.790861 16,7 C16,9.209139 14.209139,11 12,11 Z\" fill=\"#000000\" fill-rule=\"nonzero\" opacity=\"0.3\"/>\n        <path d=\"M3.00065168,20.1992055 C3.38825852,15.4265159 7.26191235,13 11.9833413,13 C16.7712164,13 20.7048837,15.2931929 20.9979143,20.2 C21.0095879,20.3954741 20.9979143,21 20.2466999,21 C16.541124,21 11.0347247,21 3.72750223,21 C3.47671215,21 2.97953825,20.45918 3.00065168,20.1992055 Z\" fill=\"#000000\" fill-rule=\"nonzero\"/>\n    </g>\n</svg><!--end::Svg Icon--></span>', 1, '1'),
(3, 'Manage Promo', '/manage-Promo', '<span class=\"svg-icon svg-icon-primary svg-icon-2x\"><!--begin::Svg Icon | path:/var/www/preview.keenthemes.com/metronic/releases/2021-05-14-112058/theme/html/demo13/dist/../src/media/svg/icons/Design/Adjust.svg--><svg xmlns=\"http://www.w3.org/2000/svg\" xmlns:xlink=\"http://www.w3.org/1999/xlink\" width=\"24px\" height=\"24px\" viewBox=\"0 0 24 24\" version=\"1.1\">\n    <g stroke=\"none\" stroke-width=\"1\" fill=\"none\" fill-rule=\"evenodd\">\n        <rect x=\"0\" y=\"0\" width=\"24\" height=\"24\"/>\n        <path d=\"M12,20 C7.581722,20 4,16.418278 4,12 C4,7.581722 7.581722,4 12,4 C16.418278,4 20,7.581722 20,12 C20,16.418278 16.418278,20 12,20 Z M12,5.99999664 C8.6862915,6 6,8.6862915 6,12 C6,15.3137085 8.6862915,18 12,18.0000034 L12,5.99999664 Z\" fill=\"#000000\" fill-rule=\"nonzero\"/>\n    </g>\n</svg><!--end::Svg Icon--></span>', 2, '0'),
(5, 'Manage-menus', '/Overall', '<span class=\"svg-icon svg-icon-primary svg-icon-2x\"><!--begin::Svg Icon | path:/var/www/preview.keenthemes.com/metronic/releases/2021-05-14-112058/theme/html/demo13/dist/../src/media/svg/icons/Design/Adjust.svg--><svg xmlns=\"http://www.w3.org/2000/svg\" xmlns:xlink=\"http://www.w3.org/1999/xlink\" width=\"24px\" height=\"24px\" viewBox=\"0 0 24 24\" version=\"1.1\">\r\n    <g stroke=\"none\" stroke-width=\"1\" fill=\"none\" fill-rule=\"evenodd\">\r\n        <rect x=\"0\" y=\"0\" width=\"24\" height=\"24\"/>\r\n        <path d=\"M12,20 C7.581722,20 4,16.418278 4,12 C4,7.581722 7.581722,4 12,4 C16.418278,4 20,7.581722 20,12 C20,16.418278 16.418278,20 12,20 Z M12,5.99999664 C8.6862915,6 6,8.6862915 6,12 C6,15.3137085 8.6862915,18 12,18.0000034 L12,5.99999664 Z\" fill=\"#000000\" fill-rule=\"nonzero\"/>\r\n    </g>\r\n</svg><!--end::Svg Icon--></span>', 3, '1'),
(6, 'Manage Popular Destination', '/manage-Destination', '<span class=\"svg-icon svg-icon-primary svg-icon-2x\"><!--begin::Svg Icon | path:/var/www/preview.keenthemes.com/metronic/releases/2021-05-14-112058/theme/html/demo13/dist/../src/media/svg/icons/Code/Option.svg--><svg xmlns=\"http://www.w3.org/2000/svg\" xmlns:xlink=\"http://www.w3.org/1999/xlink\" width=\"24px\" height=\"24px\" viewBox=\"0 0 24 24\" version=\"1.1\">\n    <g stroke=\"none\" stroke-width=\"1\" fill=\"none\" fill-rule=\"evenodd\">\n        <rect x=\"0\" y=\"0\" width=\"24\" height=\"24\"/>\n        <rect fill=\"#000000\" opacity=\"0.3\" x=\"12\" y=\"7\" width=\"10\" height=\"2\" rx=\"1\"/>\n        <path d=\"M2,9 C1.44771525,9 1,8.55228475 1,8 C1,7.44771525 1.44771525,7 2,7 L7.35012691,7 C8.14050434,7 8.85674733,7.46546704 9.17775001,8.18772307 L12.6498731,16 L22,16 C22.5522847,16 23,16.4477153 23,17 C23,17.5522847 22.5522847,18 22,18 L12.6498731,18 C11.8594957,18 11.1432527,17.534533 10.82225,16.8122769 L7.35012691,9 L2,9 Z\" fill=\"#000000\" fill-rule=\"nonzero\"/>\n    </g>\n</svg><!--end::Svg Icon--></span>', 0, '0'),
(13, 'Manage Web Contents', '/web-content', '<span class=\"svg-icon svg-icon-primary svg-icon-2x\"><!--begin::Svg Icon | path:/var/www/preview.keenthemes.com/metronic/releases/2021-05-14-112058/theme/html/demo13/dist/../src/media/svg/icons/Code/Option.svg--><svg xmlns=\"http://www.w3.org/2000/svg\" xmlns:xlink=\"http://www.w3.org/1999/xlink\" width=\"24px\" height=\"24px\" viewBox=\"0 0 24 24\" version=\"1.1\">\n    <g stroke=\"none\" stroke-width=\"1\" fill=\"none\" fill-rule=\"evenodd\">\n        <rect x=\"0\" y=\"0\" width=\"24\" height=\"24\"/>\n        <rect fill=\"#000000\" opacity=\"0.3\" x=\"12\" y=\"7\" width=\"10\" height=\"2\" rx=\"1\"/>\n        <path d=\"M2,9 C1.44771525,9 1,8.55228475 1,8 C1,7.44771525 1.44771525,7 2,7 L7.35012691,7 C8.14050434,7 8.85674733,7.46546704 9.17775001,8.18772307 L12.6498731,16 L22,16 C22.5522847,16 23,16.4477153 23,17 C23,17.5522847 22.5522847,18 22,18 L12.6498731,18 C11.8594957,18 11.1432527,17.534533 10.82225,16.8122769 L7.35012691,9 L2,9 Z\" fill=\"#000000\" fill-rule=\"nonzero\"/>\n    </g>\n</svg><!--end::Svg Icon--></span>', 0, '1'),
(14, 'Manage Deals and offers', '/manage-DealsOffer', '<?xml version=\"1.0\" encoding=\"iso-8859-1\"?>\r\n<!-- Uploaded to: SVG Repo, www.svgrepo.com, Generator: SVG Repo Mixer Tools -->\r\n<!DOCTYPE svg PUBLIC \"-//W3C//DTD SVG 1.1//EN\" \"http://www.w3.org/Graphics/SVG/1.1/DTD/svg11.dtd\">\r\n<svg fill=\"#000000\" version=\"1.1\" id=\"Capa_1\" xmlns=\"http://www.w3.org/2000/svg\" xmlns:xlink=\"http://www.w3.org/1999/xlink\" \r\n	 width=\"800px\" height=\"800px\" viewBox=\"0 0 980.954 980.955\"\r\n	 xml:space=\"preserve\">\r\n<g>\r\n	<g>\r\n		<path d=\"M980.954,154.181H794.946l-281.25,499.875c-15.543-5.318-32.201-8.209-49.523-8.209c-4.571,0-9.095,0.213-13.565,0.605\r\n			l116.502-205.108l26.405,14.998l90.682-159.651l-26.405-14.998l0,0l-111.616-63.397l-334.3-189.881l-90.682,159.65l26.406,14.999\r\n			L0,462.923l373.914,212.381c-11.394,8.324-21.608,18.17-30.323,29.252L48.999,538.806l-33.344,59.262l298.764,168.1\r\n			c-2.345,10.641-3.593,21.689-3.593,33.025c0,84.557,68.791,153.346,153.346,153.346c84.556,0,153.347-68.791,153.347-153.346\r\n			c0-42.768-17.606-81.496-45.942-109.336l208.956-371.383l200.422-0.084V154.181z M373.12,333.767l-40.116,70.37l-30.351-17.302\r\n			l40.115-70.371L373.12,333.767z M237.418,121.127l250.08,142.045l77.579,44.064l26.405,14.998l-23.513,41.395l-26.405-14.998\r\n			l-301.253-171.11l-26.406-14.998L237.418,121.127z M284.736,280.958l-74.835,131.274l148.501,84.656l74.967-131.506l74.61,42.378\r\n			L393.965,608.49L92.712,437.38l114.014-200.73L284.736,280.958z M549.519,799.193c0,47.061-38.286,85.346-85.347,85.346\r\n			c-45.967,0-83.542-36.533-85.263-82.088c-0.041-1.084-0.083-2.166-0.083-3.258c0-23.666,9.687-45.105,25.297-60.58\r\n			c15.432-15.299,36.654-24.766,60.049-24.766c5.159,0,10.204,0.486,15.113,1.367c23.739,4.262,44.092,18.361,56.685,37.926\r\n			C544.529,766.437,549.519,782.238,549.519,799.193z M912.954,250.418l-94.153,0.039l15.91-28.277h78.243V250.418z\"/>\r\n	</g>\r\n</g>\r\n</svg>', 0, '0');

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
(18, '2023_05_01_124607_create_home_roles_table', 11);

-- --------------------------------------------------------

--
-- Table structure for table `newsletters`
--

CREATE TABLE `newsletters` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `description` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `homepage_id` int(11) NOT NULL,
  `status` int(11) NOT NULL DEFAULT 1,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `newsletters`
--

INSERT INTO `newsletters` (`id`, `title`, `description`, `homepage_id`, `status`, `created_at`, `updated_at`) VALUES
(5, 'Qui illo nulla asper shsshhshs', 'Pariatur Sunt dndjdjjjjjdj', 1, 1, '2023-04-24 09:53:44', '2023-04-24 10:24:56'),
(6, 'Nisi excepturi omnis', 'Aute unde tempor vel', 1, 1, '2023-05-01 22:06:54', '2023-05-01 22:06:54');

-- --------------------------------------------------------

--
-- Table structure for table `news_events`
--

CREATE TABLE `news_events` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `description` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `image` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `homepage_id` int(11) NOT NULL,
  `eventdate` varchar(250) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` bigint(20) NOT NULL DEFAULT 1,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `news_events`
--

INSERT INTO `news_events` (`id`, `title`, `description`, `image`, `homepage_id`, `eventdate`, `status`, `created_at`, `updated_at`) VALUES
(3, 'Et esse exercitation', 'Lorem officia quis r', '1683280950bg-image-2.png', 1, '2023-05-06', 1, '2023-04-25 17:45:57', '2023-05-05 09:02:30'),
(4, 'Molestiae ratione nu', 'Reprehenderit aut a', '1682536220blog3.jpg', 1, NULL, 1, '2023-04-26 18:10:20', '2023-04-26 18:10:20'),
(5, 'Ad quibusdam iste to', 'At modi quia quis au', '1682982132grid-img4.jpg', 1, NULL, 1, '2023-05-01 22:02:12', '2023-05-01 22:02:12'),
(6, 'Doloremque enim et l', 'Aut ut at est volupt', '1683232937product-cover-2.png', 1, '2023-05-04', 1, '2023-05-04 19:42:17', '2023-05-04 19:42:17');

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
  `status` bigint(20) NOT NULL DEFAULT 1,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `promos`
--

INSERT INTO `promos` (`id`, `title`, `description`, `price`, `image`, `homepage_id`, `color`, `status`, `created_at`, `updated_at`) VALUES
(1, 'Harum dolore volupta', 'Accusantium voluptat', '875.00', '1682978933hero.jpg', 1, '#613583', 1, '2023-05-01 21:08:53', '2023-05-04 18:52:42'),
(2, 'Reprehenderit et do', 'Dicta esse perspici', '689.00', '1682979971category6.svg', 1, '#1696cb', 1, '2023-05-01 21:26:11', '2023-05-01 21:26:11'),
(3, 'Voluptas distinctio', 'Totam nisi veniam q', '469.00', '1683099268category6.svg', 1, '#1696c1', 1, '2023-05-03 06:34:28', '2023-05-03 06:34:28'),
(4, 'Porro atque accusant', 'Nulla ut aliquam mol', '177.00', '1683099853product1.jpg', 1, '#1696cb', 1, '2023-05-03 06:44:13', '2023-05-03 06:44:13'),
(5, 'Repudiandae consequa', 'Dolor id adipisicin', '973.00', '1683229475product-cover-3.png', 1, '#e66100', 1, '2023-05-04 18:44:35', '2023-05-04 18:48:32');

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
(2, 'Promo', '/manage-Promo', 1, '2023-04-30 23:00:00', '2023-04-30 23:00:00'),
(3, 'NewsEvent', '/manage-NewsEvent', 1, '2023-04-30 23:00:00', '2023-04-30 23:00:00'),
(4, 'Newsletter', '/manage-Newsletter', 1, '2023-04-30 23:00:00', '2023-04-30 23:00:00'),
(5, 'Feature', '/manage-Feature', 1, '2023-04-30 23:00:00', '2023-04-30 23:00:00'),
(6, 'Destination', '/manage-Destination', 1, '2023-04-30 23:00:00', '2023-04-30 23:00:00'),
(7, 'DealsOffer', '/manage-DealsOffer', 1, '2023-04-30 23:00:00', '2023-04-30 23:00:00');

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
(1, 'Facebook', 'https://www.facebook.com', '1682445524category3.svg', 1, '2023-04-25 16:58:44', '2023-04-25 17:07:53'),
(2, 'Linkin', 'https://www.linkedin.com/login', '1682445649Tylertone.png', 1, '2023-04-25 17:00:49', '2023-04-25 17:00:49');

-- --------------------------------------------------------

--
-- Table structure for table `sub_menus`
--

CREATE TABLE `sub_menus` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `menu_id` bigint(20) NOT NULL,
  `status` bigint(20) NOT NULL DEFAULT 1,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `sub_menus`
--

INSERT INTO `sub_menus` (`id`, `title`, `menu_id`, `status`, `created_at`, `updated_at`) VALUES
(5, 'TRAVEL EXTRAS', 3, 1, '2023-05-02 08:14:48', '2023-05-02 08:14:48'),
(6, 'FLIGHT PACKAGES', 3, 1, '2023-05-02 08:15:02', '2023-05-02 08:15:02'),
(7, 'FLY & WATCH', 3, 1, '2023-05-02 08:15:24', '2023-05-02 08:15:24'),
(8, 'SEAT SELECTION', 3, 1, '2023-05-02 08:15:37', '2023-05-02 08:15:37'),
(9, 'ARIK CAFE', 3, 1, '2023-05-02 08:15:54', '2023-05-02 08:15:54'),
(10, 'ADDITIONAL BAGGAGE', 3, 1, '2023-05-02 08:16:11', '2023-05-02 08:16:11'),
(11, 'LOST BAGGAGE APPLICATION', 3, 1, '2023-05-02 08:16:24', '2023-05-02 08:16:24'),
(12, 'BAGGAGE RECIEPT', 3, 1, '2023-05-02 08:16:43', '2023-05-02 08:16:43'),
(13, 'GENERAL RULES', 4, 1, '2023-05-02 08:17:01', '2023-05-02 08:17:01'),
(14, 'OUR NETWORK', 4, 1, '2023-05-02 08:17:16', '2023-05-02 08:17:16'),
(15, 'PRIVACY', 4, 1, '2023-05-02 08:17:40', '2023-05-02 08:17:40'),
(16, 'CHECK-IN', 4, 1, '2023-05-02 08:17:52', '2023-05-02 08:17:52'),
(17, 'BAGGAGE ALLOWANCE', 4, 1, '2023-05-02 08:20:36', '2023-05-02 08:20:36');

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
(16, 'vic', 'vic@vic.com', NULL, '$2y$10$gIZwO4f2ZtfWsK/YBUxH7.kFspDkz3K7Mw2O5gBBTY000AcpRXbry', '1', NULL, 'Owner', '2023-05-02 06:26:52', '2023-05-02 06:26:52');

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
(1, '1682536164blog3.jpg', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `web_menus`
--

CREATE TABLE `web_menus` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` bigint(20) NOT NULL DEFAULT 0,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `web_menus`
--

INSERT INTO `web_menus` (`id`, `title`, `description`, `status`, `created_at`, `updated_at`) VALUES
(1, 'HOME', 'HOME', 1, '2023-05-01 09:05:08', '2023-05-01 09:08:23'),
(2, 'BOOK', 'BOOK', 1, '2023-05-01 09:05:19', '2023-05-01 09:07:48'),
(3, 'EXPLORE', 'EXPLORE', 1, '2023-05-01 09:08:45', '2023-05-01 09:08:45'),
(4, 'SERVICES', 'SERVICES', 1, '2023-05-01 09:08:57', '2023-05-01 09:08:57'),
(5, 'ABOUT', 'ABOUT', 1, '2023-05-01 09:09:08', '2023-05-01 09:09:08'),
(6, 'CONTACT US', 'CONTACT US', 1, '2023-05-01 09:09:28', '2023-05-01 09:09:28');

--
-- Indexes for dumped tables
--

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
-- Indexes for table `deals_offers`
--
ALTER TABLE `deals_offers`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `destinations`
--
ALTER TABLE `destinations`
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
-- Indexes for table `promos`
--
ALTER TABLE `promos`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `roles`
--
ALTER TABLE `roles`
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
-- AUTO_INCREMENT for table `activities`
--
ALTER TABLE `activities`
  MODIFY `activity_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=75;

--
-- AUTO_INCREMENT for table `deals_offers`
--
ALTER TABLE `deals_offers`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `destinations`
--
ALTER TABLE `destinations`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `faqs`
--
ALTER TABLE `faqs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `features`
--
ALTER TABLE `features`
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
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `menu`
--
ALTER TABLE `menu`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT for table `newsletters`
--
ALTER TABLE `newsletters`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `news_events`
--
ALTER TABLE `news_events`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `promos`
--
ALTER TABLE `promos`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `roles`
--
ALTER TABLE `roles`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `slider`
--
ALTER TABLE `slider`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `socials`
--
ALTER TABLE `socials`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `sub_menus`
--
ALTER TABLE `sub_menus`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

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
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

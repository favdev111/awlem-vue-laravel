-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 11, 2021 at 10:31 AM
-- Server version: 10.4.14-MariaDB
-- PHP Version: 7.4.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `olum-production`
--

-- --------------------------------------------------------

--
-- Table structure for table `areas`
--

CREATE TABLE `areas` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `region_id` int(11) NOT NULL DEFAULT 0,
  `name` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `areas`
--

INSERT INTO `areas` (`id`, `region_id`, `name`, `created_at`, `updated_at`) VALUES
(1, 1, 'المعادي', '2020-09-17 11:54:08', '2020-09-17 11:54:08'),
(2, 2, 'بنها', '2020-09-17 12:00:46', '2020-09-17 12:02:18'),
(3, 1, 'الجيزة', '2020-09-17 12:23:26', '2020-09-17 12:23:26'),
(4, 1, 'مدينة نصر', '2020-09-17 12:23:43', '2020-09-17 12:23:43'),
(5, 1, 'القطامية', '2020-09-17 12:25:28', '2020-09-17 12:25:28'),
(6, 1, 'اللوتس', '2020-09-17 12:25:37', '2020-09-17 12:25:37'),
(7, 2, 'طوخ', '2020-10-07 09:05:41', '2020-10-07 09:05:41'),
(8, 2, 'شبين', '2020-10-07 09:05:47', '2020-10-07 09:05:47'),
(9, 1, 'التجمع الثالث', '2020-10-14 06:52:21', '2020-10-14 06:52:21');

-- --------------------------------------------------------

--
-- Table structure for table `area_restorants`
--

CREATE TABLE `area_restorants` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `area_id` int(11) NOT NULL DEFAULT 0,
  `restorant_id` int(11) NOT NULL DEFAULT 0,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `area_restorants`
--

INSERT INTO `area_restorants` (`id`, `area_id`, `restorant_id`, `created_at`, `updated_at`) VALUES
(17, 2, 2, NULL, NULL),
(23, 2, 3, NULL, NULL),
(34, 2, 5, NULL, NULL),
(46, 2, 7, NULL, NULL),
(51, 2, 8, NULL, NULL),
(56, 2, 9, NULL, NULL),
(68, 2, 11, NULL, NULL),
(69, 2, 13, NULL, NULL),
(70, 2, 4, NULL, NULL),
(71, 2, 6, NULL, NULL),
(72, 2, 10, NULL, NULL),
(73, 2, 12, NULL, NULL),
(74, 2, 14, NULL, NULL),
(75, 1, 2, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `branches`
--

CREATE TABLE `branches` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` int(11) NOT NULL DEFAULT 0,
  `area_id` int(11) NOT NULL DEFAULT 0,
  `restorant_id` int(11) NOT NULL DEFAULT 0,
  `busy` tinyint(1) NOT NULL DEFAULT 1,
  `name` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `location_name` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `location_lat` double NOT NULL DEFAULT 0,
  `location_lon` double NOT NULL DEFAULT 0,
  `open_dayes` text COLLATE utf8_unicode_ci DEFAULT NULL,
  `open_from` time DEFAULT NULL,
  `open_to` time DEFAULT NULL,
  `description` text COLLATE utf8_unicode_ci DEFAULT NULL,
  `eat_in_branch` tinyint(1) NOT NULL DEFAULT 0,
  `delever_to_car` tinyint(1) NOT NULL DEFAULT 0,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `branches`
--

INSERT INTO `branches` (`id`, `user_id`, `area_id`, `restorant_id`, `busy`, `name`, `location_name`, `location_lat`, `location_lon`, `open_dayes`, `open_from`, `open_to`, `description`, `eat_in_branch`, `delever_to_car`, `created_at`, `updated_at`) VALUES
(1, 10, 1, 2, 0, 'فرع مدينة نصر', 'مدينة نصر', 29.9580885, 31.2503928, '[1,2,3,4,5,6,7]', '01:00:00', '23:59:00', 'لوريم ايبسوم دولار سيت أميت ,كونسيكتيتور أدايبا يسكينج أليايت,سيت دو أيوسمود تيمبور أنكايديديونتيوت لابوري ات دولار ماجنا أليكيوا . يوت انيم أد مينيم فينايم,كيواس نوستريد أكسير سيتاشن يللأمكو لابورأس نيسي يت أليكيوب أكس أيا كوممودو كونسيكيوات . ديواس أيوتي أريري دولار إن ريبريهينديرأيت فوليوبتاتي فيلايت أيسسي كايلليوم دولار أيو فيجايت', 1, 1, '2020-09-21 12:45:14', '2020-12-28 15:07:06'),
(2, 17, 2, 2, 1, 'الشبراوي فرع المعادي', 'مدينة نصر 2', 29.9580885, 31.2503928, '[2,5,6]', '00:00:00', '11:59:00', 'لوريم ايبسوم دولار سيت أميت ,كونسيكتيتور أدايبا يسكينج أليايت,سيت دو أيوسمود تيمبور أنكايديديونتيوت لابوري ات دولار ماجنا أليكيوا . يوت انيم أد مينيم فينايم,كيواس نوستريد أكسير سيتاشن يللأمكو لابورأس نيسي يت أليكيوب أكس أيا كوممودو كونسيكيوات . ديواس أيوتي أريري دولار إن ريبريهينديرأيت فوليوبتاتي فيلايت أيسسي كايلليوم دولار أيو فيجايت', 0, 0, '2020-09-22 07:35:54', '2020-12-28 11:54:11'),
(3, 18, 2, 2, 1, 'فرع بنها', 'بنها قليوبية', 30.473052097553225, 31.188675781249977, '[2,3,4,6]', '13:59:00', '13:59:00', 'لوريم ايبسوم دولار سيت أميت ,كونسيكتيتور أدايبا يسكينج أليايت,سيت دو أيوسمود تيمبور أنكايديديونتيوت لابوري ات دولار ماجنا أليكيوا . يوت انيم أد مينيم فينايم,كيواس نوستريد أكسير سيتاشن يللأمكو لابورأس نيسي يت أليكيوب أكس أيا كوممودو كونسيكيوات . ديواس أيوتي أريري دولار إن ريبريهينديرأيت فوليوبتاتي فيلايت أيسسي كايلليوم دولار أيو فيجايت', 0, 0, '2020-10-14 10:02:23', '2020-11-01 10:42:15'),
(4, 102, 7, 2, 1, 'فرع طوخ', 'طوخ قليوبيه', 30.484052097553228, 31.180675781249974, '[3,4,6]', '14:52:00', '14:52:00', 'لوريم ايبسوم دولار سيت أميت ,كونسيكتيتور أدايبا يسكينج أليايت,سيت دو أيوسمود تيمبور أنكايديديونتيوت لابوري ات دولار ماجنا أليكيوا . يوت انيم أد مينيم فينايم,كيواس نوستريد أكسير سيتاشن يللأمكو لابورأس نيسي يت أليكيوب أكس أيا كوممودو كونسيكيوات . ديواس أيوتي أريري دولار إن ريبريهينديرأيت فوليوبتاتي فيلايت أيسسي كايلليوم دولار أيو فيجايت', 0, 0, '2020-10-14 10:53:44', '2020-12-09 12:00:46'),
(5, 101, 1, 10, 1, 'صبحي كابر فرع المعادي', 'المعادي', 30.495052097553224, 31.182675781249976, '[1,2,5,6,7]', '11:20:00', '11:20:00', 'لوريم ايبسوم دولار سيت أميت ,كونسيكتيتور أدايبا يسكينج أليايت,سيت دو أيوسمود تيمبور أنكايديديونتيوت لابوري ات دولار ماجنا أليكيوا . يوت انيم أد مينيم فينايم,كيواس نوستريد أكسير سيتاشن يللأمكو لابورأس نيسي يت أليكيوب أكس أيا كوممودو كونسيكيوات . ديواس أيوتي أريري دولار إن ريبريهينديرأيت فوليوبتاتي فيلايت أيسسي كايلليوم دولار أيو فيجايت', 0, 0, '2020-10-18 07:27:59', '2020-12-09 11:59:28'),
(6, 107, 6, 6, 1, 'سوبر ماركت مترو فرع اللوتس', 'اللوتس', 29.9580885, 31.2503928, '[1,2,3,4,5,6,7]', '09:40:00', '20:40:00', 'لوريم إيبسوم(Lorem Ipsum) هو ببساطة نص شكلي (بمعنى أن الغاية هي الشكل وليس المحتوى) ويُستخدم في صناعات المطابع ودور النشر. كان لوريم إيبسوم ولايزال المعيار للنص الشكلي منذ القرن الخامس عشر عندما قامت مطبعة مجهولة برص مجموعة من الأحرف بشكل عشوائي أخذتها من نص، لتكوّن كتيّب بمثابة دليل أو مرجع شكلي لهذه الأحرف. خمسة قرون من الزمن لم تقضي على هذا النص، بل انه حتى صار مستخدماً وبشكله الأصلي في الطباعة والتنضيد الإلكتروني. انتشر بشكل كبير في ستينيّات هذا القرن مع إصدار رقائق \"ليتراسيت\" (Letraset) البلاستيكية تحوي مقاطع من هذا النص، وعاد لينتشر مرة أخرى مؤخراَ مع ظهور برامج النشر الإلكتروني مثل \"ألدوس بايج مايكر\" (Aldus PageMaker) والتي حوت أيضاً على نسخ من', 1, 1, '2020-12-24 09:41:47', '2020-12-24 09:43:09');

-- --------------------------------------------------------

--
-- Table structure for table `branch_offers`
--

CREATE TABLE `branch_offers` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` int(11) DEFAULT NULL,
  `product_id` int(11) DEFAULT NULL,
  `branch_id` int(11) DEFAULT NULL,
  `offer_end_date` datetime DEFAULT NULL,
  `active` tinyint(1) NOT NULL DEFAULT 0,
  `percent` double NOT NULL DEFAULT 0,
  `amount` double NOT NULL DEFAULT 0,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `branch_offers`
--

INSERT INTO `branch_offers` (`id`, `user_id`, `product_id`, `branch_id`, `offer_end_date`, `active`, `percent`, `amount`, `created_at`, `updated_at`) VALUES
(10, 7, 4, 1, '2020-12-31 09:56:00', 1, 25, 12.5, '2020-11-12 07:56:52', '2020-11-12 07:56:52'),
(14, 7, 5, 1, '2020-12-31 10:25:00', 1, 20, 10, '2020-12-22 14:59:46', '2020-12-22 14:59:46'),
(18, 7, 2, 1, '2020-12-31 09:55:00', 1, 20, 10, '2020-12-28 13:17:27', '2020-12-28 13:17:27');

-- --------------------------------------------------------

--
-- Table structure for table `branch_photos`
--

CREATE TABLE `branch_photos` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `branch_id` int(11) NOT NULL DEFAULT 0,
  `photo` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `uuid` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `branch_photos`
--

INSERT INTO `branch_photos` (`id`, `branch_id`, `photo`, `uuid`, `created_at`, `updated_at`) VALUES
(7, 1, 'images/branch/1600774914absolutvision-82TpEld0_e4-unsplash.png', 'a902c2f7-dff4-44fd-a892-e5724138925b', '2020-09-22 09:41:58', '2020-09-22 09:41:58'),
(8, 1, 'images/branch/16007749172813143.png', '51869e29-e66b-4541-ac37-079cf13b29a0', '2020-09-22 09:41:58', '2020-09-22 09:41:58'),
(9, 2, 'images/branch/1601884463miti-R1ql7fk3I1Y-unsplash.png', 'a4d40981-5bff-49ef-92f4-9adb009dcc95', '2020-10-05 05:54:28', '2020-10-05 05:54:28'),
(10, 2, 'images/branch/1601884463mahmoud-fawzy-aZZ01mrj4b4-unsplash.png', '57e11472-16be-4832-b37a-a4760ec7cfa8', '2020-10-05 05:54:28', '2020-10-05 05:54:28'),
(11, 2, 'images/branch/1601884463ulysse-pcl-1WmlAiYgnoI-unsplash.png', '3e50ac39-cedf-4671-aa55-c7ac12618ee4', '2020-10-05 05:54:28', '2020-10-05 05:54:28'),
(12, 2, 'images/branch/1600774914absolutvision-82TpEld0_e4-unsplash.png', 'a902c2f7-dff4-44fd-a892-e5724138925b', '2020-10-12 06:20:19', '2020-10-12 06:20:19'),
(13, 2, 'images/branch/16007749172813143.png', '51869e29-e66b-4541-ac37-079cf13b29a0', '2020-10-12 06:20:19', '2020-10-12 06:20:19'),
(14, 3, 'images/branch/1602676901unnamed.png', 'f5c1c909-be61-46f4-943a-c25821fc8e91', '2020-10-14 10:02:23', '2020-10-14 10:02:23'),
(15, 3, 'images/branch/1602676901images.jpg', 'b8de8d49-09dc-4137-9d3a-6604c5841d8e', '2020-10-14 10:02:23', '2020-10-14 10:02:23'),
(18, 4, 'images/branch/1602679982download.png', '0bfd0a06-7470-4d87-99f5-48b08765475f', '2020-10-14 10:53:45', '2020-10-14 10:53:45'),
(19, 4, 'images/branch/1602679988unnamed.png', 'be55001b-5284-4afe-9e2b-458a689cac1e', '2020-10-14 10:53:45', '2020-10-14 10:53:45'),
(20, 4, 'images/branch/1602680023images.jpg', 'cbd33ae3-934d-4bf0-b03b-1c92d45b5e9d', '2020-10-14 10:53:45', '2020-10-14 10:53:45'),
(21, 5, 'images/branch/1603012915success-story-sobhy-kaber.png', 'b347e2ef-ac04-49e6-9779-31bd390078fb', '2020-10-18 07:27:59', '2020-10-18 07:27:59'),
(22, 1, 'images/branch/1601884463miti-R1ql7fk3I1Y-unsplash.png', 'a4d40981-5bff-49ef-92f4-9adb009dcc95', '2020-11-01 10:41:58', '2020-11-01 10:41:58'),
(23, 1, 'images/branch/1601884463mahmoud-fawzy-aZZ01mrj4b4-unsplash.png', '57e11472-16be-4832-b37a-a4760ec7cfa8', '2020-11-01 10:41:58', '2020-11-01 10:41:58'),
(24, 1, 'images/branch/1601884463ulysse-pcl-1WmlAiYgnoI-unsplash.png', '3e50ac39-cedf-4671-aa55-c7ac12618ee4', '2020-11-01 10:41:58', '2020-11-01 10:41:58'),
(25, 1, 'images/branch/1602676901unnamed.png', 'f5c1c909-be61-46f4-943a-c25821fc8e91', '2020-11-01 10:41:58', '2020-11-01 10:41:58'),
(26, 1, 'images/branch/1602676901images.jpg', 'b8de8d49-09dc-4137-9d3a-6604c5841d8e', '2020-11-01 10:41:58', '2020-11-01 10:41:58'),
(27, 1, 'images/branch/1602679982download.png', '0bfd0a06-7470-4d87-99f5-48b08765475f', '2020-11-01 10:41:58', '2020-11-01 10:41:58'),
(28, 1, 'images/branch/1602679988unnamed.png', 'be55001b-5284-4afe-9e2b-458a689cac1e', '2020-11-01 10:41:58', '2020-11-01 10:41:58'),
(29, 1, 'images/branch/1602680023images.jpg', 'cbd33ae3-934d-4bf0-b03b-1c92d45b5e9d', '2020-11-01 10:41:58', '2020-11-01 10:41:58'),
(30, 1, 'images/branch/1603012915success-story-sobhy-kaber.png', 'b347e2ef-ac04-49e6-9779-31bd390078fb', '2020-11-01 10:41:58', '2020-11-01 10:41:58'),
(31, 6, 'images/branch/1608802896download (1).jpg', 'cead5e1c-b30e-4fed-81e3-24902a90299c', '2020-12-24 09:41:47', '2020-12-24 09:41:47'),
(32, 6, 'images/branch/1608802896download (2).jpg', 'cd29f907-5cf8-4b81-b961-22fda1628f75', '2020-12-24 09:41:47', '2020-12-24 09:41:47'),
(33, 6, 'images/branch/1608802896website.jpg', 'c9b5d848-ee7a-4d65-aefa-abab83238b1a', '2020-12-24 09:41:47', '2020-12-24 09:41:47'),
(34, 1, 'images/branch/1608802896download (1).jpg', 'cead5e1c-b30e-4fed-81e3-24902a90299c', '2020-12-27 12:40:50', '2020-12-27 12:40:50'),
(35, 1, 'images/branch/1608802896download (2).jpg', 'cd29f907-5cf8-4b81-b961-22fda1628f75', '2020-12-27 12:40:50', '2020-12-27 12:40:50'),
(36, 1, 'images/branch/1608802896website.jpg', 'c9b5d848-ee7a-4d65-aefa-abab83238b1a', '2020-12-27 12:40:50', '2020-12-27 12:40:50');

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `photo` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`id`, `name`, `photo`, `created_at`, `updated_at`) VALUES
(1, 'مقهى', 'images/category/1/photo/g.png', '2020-09-17 10:30:36', '2020-10-12 10:10:12'),
(2, 'شرقى', 'images/category/2/photo/png-clipart-belly-dance-bellydance-by-amartia-music-shimmy-belly-dancer.png', '2020-09-17 10:32:13', '2020-10-12 10:10:48'),
(3, 'صيني', 'images/category/3/photo/kisspng-china-symbol-culture-5af8f460e83890.6287647415262649289512.jpg', '2020-09-17 10:32:21', '2020-10-12 10:11:23'),
(4, 'فرنسي', 'images/category/4/photo/gratis-png-francia-mapa-frances-informacion-mapa-infografico.png', '2020-09-17 10:32:30', '2020-10-12 10:12:05'),
(5, 'أيطالي', 'images/category/5/photo/gratis-png-domino-s-pizza-salami-cocina-italiana-restaurante-pizza.png', '2020-09-17 10:32:43', '2020-10-12 10:12:40'),
(6, 'سوبرماركت', 'images/category/6/photo/png-clipart-dairy-products-milk-food-farm-milk-spalsh-food-supermarket.png', '2020-10-12 08:21:11', '2020-10-12 10:13:28'),
(11, 'Nader Gamal', 'images/category/11/photo/awlem1611135893.jpg', '2021-01-20 09:42:26', '2021-01-20 09:44:53');

-- --------------------------------------------------------

--
-- Table structure for table `cobon_users`
--

CREATE TABLE `cobon_users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` int(11) NOT NULL DEFAULT 0,
  `cobon_id` int(11) NOT NULL DEFAULT 0,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `complaints`
--

CREATE TABLE `complaints` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` int(11) NOT NULL DEFAULT 0,
  `name` varchar(150) COLLATE utf8_unicode_ci DEFAULT NULL,
  `body` text COLLATE utf8_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `complaints`
--

INSERT INTO `complaints` (`id`, `user_id`, `name`, `body`, `created_at`, `updated_at`) VALUES
(1, 103, 'مشكله في الطلب', 'مشكله في الطلب على فكره انا كنت عاوز أقولك اني كنت من محبي الفنان محمد عبده والدرس ومش عارف ايه مواضيع جديده في البيت يعني أن شاءالله تعجبكم', '2020-12-27 13:09:23', '2020-12-27 13:09:23');

-- --------------------------------------------------------

--
-- Table structure for table `discount_cobons`
--

CREATE TABLE `discount_cobons` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `code` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL,
  `min_to_apply` double NOT NULL DEFAULT 0,
  `price` int(11) NOT NULL DEFAULT 0,
  `dicount_percentage` int(11) NOT NULL DEFAULT 0,
  `usage_limit` int(11) NOT NULL DEFAULT 1,
  `active` tinyint(1) NOT NULL DEFAULT 0,
  `end_date` datetime DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `discount_cobons`
--

INSERT INTO `discount_cobons` (`id`, `code`, `min_to_apply`, `price`, `dicount_percentage`, `usage_limit`, `active`, `end_date`, `created_at`, `updated_at`) VALUES
(2, 'YTTR333FD', 100, 100, 0, 20, 1, '2020-12-30 11:23:00', '2020-09-20 09:23:41', '2020-09-20 09:23:41'),
(3, 'ABCD7', 90, 200, 0, 7, 1, '2020-12-16 13:07:00', '2020-12-07 11:08:50', '2020-12-07 11:08:50');

-- --------------------------------------------------------

--
-- Table structure for table `faq_admins`
--

CREATE TABLE `faq_admins` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `question` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `answer` text COLLATE utf8_unicode_ci DEFAULT NULL,
  `active` tinyint(1) DEFAULT 0,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `faq_admins`
--

INSERT INTO `faq_admins` (`id`, `question`, `answer`, `active`, `created_at`, `updated_at`) VALUES
(3, 'كيف يمكننى استخدام أولم ؟', 'لوريم ايبسوم هو نموذج افتراضي يوضع في التصاميم لتعرض على العميل ليتصور طريقه وضع النصوص بالتصاميم سواء كانت تصاميم مطبوعه ... بروشور او فلاير على سبيل المثال ... او نماذج مواقع انترنت ...', 1, '2020-11-01 08:30:25', '2020-11-01 08:30:25'),
(4, 'ما هو أولم ؟', 'لوريم ايبسوم هو نموذج افتراضي يوضع في التصاميم لتعرض على العميل ليتصور طريقه وضع النصوص بالتصاميم سواء كانت تصاميم مطبوعه ... بروشور او فلاير على سبيل المثال ... او نماذج مواقع انترنت ...', 1, '2020-11-01 08:30:39', '2020-11-01 08:30:39'),
(5, 'كيف يمكننى الإبلاغ عن مشكلة ؟', 'لوريم ايبسوم هو نموذج افتراضي يوضع في التصاميم لتعرض على العميل ليتصور طريقه وضع النصوص بالتصاميم سواء كانت تصاميم مطبوعه ... بروشور او فلاير على سبيل المثال ... او نماذج مواقع انترنت ...', 1, '2020-11-01 08:30:59', '2020-11-01 08:30:59');

-- --------------------------------------------------------

--
-- Table structure for table `faq_ratings`
--

CREATE TABLE `faq_ratings` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `faq_id` int(11) NOT NULL DEFAULT 0,
  `helpfull` tinyint(1) NOT NULL DEFAULT 0,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `faq_ratings`
--

INSERT INTO `faq_ratings` (`id`, `faq_id`, `helpfull`, `created_at`, `updated_at`) VALUES
(1, 1, 1, '2020-11-26 12:32:15', '2020-11-26 12:32:15'),
(2, 5, 1, '2020-11-26 12:50:49', '2020-11-26 12:50:49'),
(3, 5, 0, '2020-11-26 12:54:21', '2020-11-26 12:54:21'),
(4, 4, 1, '2020-11-26 12:55:04', '2020-11-26 12:55:04'),
(5, 3, 1, '2020-11-26 13:48:57', '2020-11-26 13:48:57'),
(6, 4, 1, '2020-11-26 13:50:40', '2020-11-26 13:50:40'),
(7, 3, 1, '2020-11-26 13:52:46', '2020-11-26 13:52:46'),
(8, 4, 1, '2020-11-26 13:52:58', '2020-11-26 13:52:58'),
(9, 3, 1, '2020-11-26 13:55:54', '2020-11-26 13:55:54'),
(10, 4, 0, '2020-11-26 13:56:05', '2020-11-26 13:56:05'),
(11, 3, 1, '2020-11-26 14:38:56', '2020-11-26 14:38:56'),
(12, 4, 0, '2020-11-26 14:39:10', '2020-11-26 14:39:10'),
(13, 3, 1, '2020-12-02 12:01:07', '2020-12-02 12:01:07'),
(14, 5, 0, '2020-12-02 12:06:13', '2020-12-02 12:06:13'),
(15, 3, 1, '2020-12-02 12:38:53', '2020-12-02 12:38:53'),
(16, 3, 1, '2020-12-02 12:39:07', '2020-12-02 12:39:07'),
(17, 3, 1, '2020-12-02 14:50:38', '2020-12-02 14:50:38'),
(18, 3, 1, '2020-12-02 14:59:36', '2020-12-02 14:59:36'),
(19, 3, 1, '2020-12-02 15:00:07', '2020-12-02 15:00:07'),
(20, 3, 1, '2020-12-20 10:43:06', '2020-12-20 10:43:06'),
(21, 3, 1, '2020-12-20 10:43:18', '2020-12-20 10:43:18'),
(22, 3, 1, '2020-12-27 13:09:49', '2020-12-27 13:09:49'),
(23, 3, 1, '2020-12-28 13:55:43', '2020-12-28 13:55:43');

-- --------------------------------------------------------

--
-- Table structure for table `features`
--

CREATE TABLE `features` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `title` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `description` text COLLATE utf8_unicode_ci DEFAULT NULL,
  `imge` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `features`
--

INSERT INTO `features` (`id`, `title`, `description`, `imge`, `created_at`, `updated_at`) VALUES
(1, 'مميزات أولم', 'لوريم ايبسوم دولار سيت أميت ,كونسيكتيتور أدايبا يسكينج أليايت,سيت دو أيوسمود تيمبور', 'images/feature/1/imge/awlem1611136973.jpg', NULL, '2021-01-20 10:02:53'),
(2, 'مميزات أولم', 'لوريم ايبسوم دولار سيت أميت ,كونسيكتيتور أدايبا يسكينج أليايت,سيت دو أيوسمود تيمبور', 'images/feature/2/imge/device-img-1.png', NULL, '2020-11-25 09:46:29'),
(3, 'مميزات أولم', 'لوريم ايبسوم دولار سيت أميت ,كونسيكتيتور أدايبا يسكينج أليايت,سيت دو أيوسمود تيمبور', 'images/feature/3/imge/device-img-1.png', NULL, '2020-11-25 09:46:37'),
(4, 'مميزات أولم', 'لوريم ايبسوم دولار سيت أميت ,كونسيكتيتور أدايبا يسكينج أليايت,سيت دو أيوسمود تيمبور', 'images/feature/4/imge/device-img-1.png', NULL, '2020-11-25 09:46:42'),
(5, 'مميزات أولم', 'لوريم ايبسوم دولار سيت أميت ,كونسيكتيتور أدايبا يسكينج أليايت,سيت دو أيوسمود تيمبور', 'images/feature/5/imge/device-img-1.png', NULL, '2020-11-25 09:46:46'),
(6, 'مميزات أولم', 'لوريم ايبسوم دولار سيت أميت ,كونسيكتيتور أدايبا يسكينج أليايت,سيت دو أيوسمود تيمبور', 'images/feature/6/imge/device-img-1.png', NULL, '2020-11-25 09:46:51');

-- --------------------------------------------------------

--
-- Table structure for table `follwers`
--

CREATE TABLE `follwers` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `email` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `follwers`
--

INSERT INTO `follwers` (`id`, `email`, `created_at`, `updated_at`) VALUES
(1, 'refaatgamal222@gmail.com', '2020-09-10 06:18:33', '2020-09-10 06:18:33'),
(2, 'refaatgamal2222@gmail.com', '2020-09-10 06:20:33', '2020-09-10 06:20:33'),
(3, 'Emad@yahoo.com', '2020-09-13 12:57:39', '2020-09-13 12:57:39'),
(4, 'refaatgamal2@gmail.com', '2020-09-14 07:57:28', '2020-09-14 07:57:28'),
(5, 'admin@admin.com', '2020-09-14 08:07:38', '2020-09-14 08:07:38'),
(6, 'ssaa1234@gmail.com', '2020-09-15 09:01:43', '2020-09-15 09:01:43'),
(7, 'nnneee@hgdj.com', '2020-10-12 07:57:56', '2020-10-12 07:57:56'),
(8, 'nnn4e@hgdj.com', '2020-11-01 08:37:32', '2020-11-01 08:37:32'),
(9, 'admin2@admin.com', '2020-11-01 09:22:21', '2020-11-01 09:22:21'),
(10, 'email@email..com', '2020-11-01 09:22:37', '2020-11-01 09:22:37'),
(11, 'Emdad@yahoo.com', '2020-11-01 09:23:27', '2020-11-01 09:23:27'),
(12, 'Em44ad@yahoo.com', '2020-11-01 09:23:44', '2020-11-01 09:23:44'),
(13, 'nnnedsdsdee@hgdj.com', '2020-11-01 10:21:02', '2020-11-01 10:21:02'),
(14, 'nnne7ee@hgdj.com', '2020-11-01 11:06:02', '2020-11-01 11:06:02');

-- --------------------------------------------------------

--
-- Table structure for table `meals`
--

CREATE TABLE `meals` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(150) COLLATE utf8_unicode_ci DEFAULT NULL,
  `restorant_id` int(11) NOT NULL DEFAULT 0,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `meals`
--

INSERT INTO `meals` (`id`, `name`, `restorant_id`, `created_at`, `updated_at`) VALUES
(1, 'لحوم', 2, '2020-09-22 12:01:35', '2020-09-22 12:01:35'),
(2, 'فراخ', 2, '2020-09-22 12:01:48', '2020-09-22 12:01:48'),
(3, 'بيتزا', 2, '2020-09-22 12:01:58', '2020-09-22 12:01:58'),
(4, 'مشويات', 2, '2020-09-22 12:05:04', '2020-09-22 12:05:04'),
(7, 'معجنات', 2, '2020-09-23 08:59:34', '2020-09-23 08:59:34'),
(10, 'سندوتشات', 3, '2020-10-05 07:37:35', '2020-10-05 09:34:32'),
(12, 'وجبات', 3, '2020-10-05 08:55:24', '2020-10-05 09:54:35'),
(13, 'مقرمشات', 6, '2020-12-24 09:46:25', '2020-12-24 09:46:25');

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_resets_table', 1),
(3, '2020_06_16_071431_create_permission_tables', 1),
(4, '2016_06_01_000001_create_oauth_auth_codes_table', 2),
(5, '2016_06_01_000002_create_oauth_access_tokens_table', 2),
(6, '2016_06_01_000003_create_oauth_refresh_tokens_table', 2),
(7, '2016_06_01_000004_create_oauth_clients_table', 2),
(8, '2016_06_01_000005_create_oauth_personal_access_clients_table', 2),
(9, '2020_06_23_084444_create_contries_table', 3),
(10, '2020_06_23_084611_create_cities_table', 3),
(11, '2020_06_23_085116_create_categories_table', 3),
(12, '2020_06_23_085511_create_vehicles_types_table', 3),
(13, '2020_06_23_085546_create_vehicles_models_table', 3),
(14, '2020_06_23_085626_create_vehicles_table', 3),
(15, '2020_06_23_085727_create_vehicle_photos_table', 3),
(16, '2020_06_23_085813_create_transfers_table', 3),
(17, '2020_06_23_085950_create_invoices_table', 3),
(18, '2020_06_23_090102_create_vehicles_users_table', 3),
(19, '2020_06_23_090152_create_complaints_table', 3),
(20, '2020_06_23_090226_create_faq_admins_table', 3),
(21, '2020_06_23_090244_create_pages_table', 3),
(22, '2020_06_30_094908_create_branches_table', 4),
(23, '2020_08_17_111207_create_androids_table', 5),
(24, '2020_08_17_113856_create_articles_table', 6),
(25, '2020_08_17_140157_create_brands_table', 7),
(26, '2020_08_18_082028_create_products_table', 8),
(27, '2020_08_18_094947_create_vehicles_table', 9),
(28, '2020_08_18_105532_create_settings_table', 10),
(29, '2020_08_18_143912_create_generals_table', 11),
(30, '2020_08_20_123606_create_follwers_table', 12),
(31, '2020_09_16_091106_create_activities_table', 13),
(32, '2020_09_16_091645_create_discount_cobons_table', 14),
(33, '2020_09_16_092257_create_complaints_table', 15),
(34, '2020_09_16_092931_create_faq_ratings_table', 15),
(35, '2020_09_16_093943_create_ratings_table', 16),
(36, '2020_09_16_094435_create_categories_table', 17),
(37, '2020_09_16_100207_create_regions_table', 18),
(38, '2020_09_16_100337_create_areas_table', 19),
(39, '2020_09_16_100704_create_area_restorants_table', 20),
(40, '2020_09_16_100856_create_are_restorants_table', 21),
(41, '2020_09_16_100913_create_restorants_table', 21),
(42, '2020_09_16_101541_create_types_table', 22),
(43, '2020_09_16_110606_create_type_restorants_table', 23),
(44, '2020_09_16_111620_create_branches_table', 24),
(45, '2020_09_16_112357_create_branch_photos_table', 25),
(46, '2020_09_16_113040_create_products_table', 26),
(47, '2020_09_16_113603_create_meals_table', 27),
(48, '2020_09_16_113940_create_product_meals_table', 28),
(49, '2020_09_16_114349_create_product_groups_table', 29),
(50, '2020_09_16_115025_create_product_group_options_table', 30),
(51, '2020_09_16_115318_create_branch_ratings_table', 31),
(52, '2020_09_16_115603_create_orders_table', 32),
(53, '2020_09_16_120548_create_order_products_table', 33),
(54, '2020_09_16_121022_create_order_ratings_table', 34),
(55, '2020_09_23_114428_create_product_branches_table', 35),
(56, '2020_10_18_084108_create_weeks_table', 36),
(57, '2020_11_09_123825_create_branch_offers_table', 36),
(58, '2020_11_25_111605_create_features_table', 37),
(59, '2020_12_06_133216_create_notifications_table', 38),
(60, '2020_12_06_155049_create_cobon_users_table', 39);

-- --------------------------------------------------------

--
-- Table structure for table `model_has_permissions`
--

CREATE TABLE `model_has_permissions` (
  `permission_id` bigint(20) UNSIGNED NOT NULL,
  `model_type` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `model_id` bigint(20) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `model_has_roles`
--

CREATE TABLE `model_has_roles` (
  `role_id` bigint(20) UNSIGNED NOT NULL,
  `model_type` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `model_id` bigint(20) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `model_has_roles`
--

INSERT INTO `model_has_roles` (`role_id`, `model_type`, `model_id`) VALUES
(4, 'App\\User', 8),
(4, 'App\\User', 9),
(4, 'App\\User', 11),
(4, 'App\\User', 12),
(4, 'App\\User', 20),
(4, 'App\\User', 21),
(4, 'App\\User', 22),
(4, 'App\\User', 25),
(4, 'App\\User', 26),
(4, 'App\\User', 27),
(4, 'App\\User', 28),
(4, 'App\\User', 33),
(4, 'App\\User', 34),
(4, 'App\\User', 36),
(4, 'App\\User', 95),
(4, 'App\\User', 96),
(4, 'App\\User', 97),
(4, 'App\\User', 98),
(4, 'App\\User', 99),
(4, 'App\\User', 100),
(6, 'App\\User', 10),
(6, 'App\\User', 11),
(6, 'App\\User', 13),
(6, 'App\\User', 17),
(6, 'App\\User', 18),
(6, 'App\\User', 19),
(6, 'App\\User', 101),
(6, 'App\\User', 102),
(6, 'App\\User', 107),
(7, 'App\\User', 7),
(12, 'App\\User', 105);

-- --------------------------------------------------------

--
-- Table structure for table `notifications`
--

CREATE TABLE `notifications` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `order_id` int(11) DEFAULT NULL,
  `reciever_id` int(11) NOT NULL DEFAULT 0,
  `notification_body` text COLLATE utf8_unicode_ci DEFAULT NULL,
  `is_read` tinyint(1) NOT NULL DEFAULT 0,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `notifications`
--

INSERT INTO `notifications` (`id`, `order_id`, `reciever_id`, `notification_body`, `is_read`, `created_at`, `updated_at`) VALUES
(28, 2, 104, '{\"reciever_id\":104,\"image\":\"images\\/restorant\\/2\\/photo\\/sincerely-media-VNsdEl1gORk-unsplash.png\",\"type\":\"order\",\"order_status\":\"prepared\",\"order_id\":\"2\",\"title\":\"\\u0645\\u0637\\u0639\\u0645 \\u0627\\u0644\\u0634\\u0628\\u0631\\u0627\\u0648\\u064a\",\"body\":\"\\u0645\\u0631\\u062d\\u0628\\u0627 George \\u0644\\u0642\\u062f \\u062a\\u0645 \\u0648\\u0636\\u0639 \\u0637\\u0644\\u0628\\u0643 \\u0641\\u064a \\u062d\\u0627\\u0644\\u0629 \\u062a\\u0645 \\u0627\\u0644\\u062a\\u062d\\u0636\\u064a\\u0631 \\u0645\\u0634\\u0627\\u0647\\u062f\\u0629 \\u0627\\u0644\\u0645\\u0632\\u064a\\u062f.\",\"click_action\":\"HomeActivity\",\"sound\":true,\"icon\":\"logo\",\"android_channel_id\":\"android_channel_id\",\"high_priority\":\"high_priority\",\"show_in_foreground\":true}', 0, '2020-12-29 13:46:49', '2020-12-29 13:46:49'),
(29, 2, 104, '{\"reciever_id\":104,\"image\":\"images\\/restorant\\/2\\/photo\\/sincerely-media-VNsdEl1gORk-unsplash.png\",\"type\":\"order\",\"order_status\":\"preparing\",\"order_id\":\"2\",\"title\":\"\\u0645\\u0637\\u0639\\u0645 \\u0627\\u0644\\u0634\\u0628\\u0631\\u0627\\u0648\\u064a\",\"body\":\"\\u0645\\u0631\\u062d\\u0628\\u0627 George \\u0644\\u0642\\u062f \\u062a\\u0645 \\u0648\\u0636\\u0639 \\u0637\\u0644\\u0628\\u0643 \\u0641\\u064a \\u062d\\u0627\\u0644\\u0629 \\u064a\\u062a\\u0645 \\u062a\\u062d\\u0636\\u064a\\u0631 \\u0627\\u0644\\u0637\\u0644\\u0628 \\u0645\\u0634\\u0627\\u0647\\u062f\\u0629 \\u0627\\u0644\\u0645\\u0632\\u064a\\u062f.\",\"click_action\":\"HomeActivity\",\"sound\":true,\"icon\":\"logo\",\"android_channel_id\":\"android_channel_id\",\"high_priority\":\"high_priority\",\"show_in_foreground\":true}', 0, '2020-12-29 13:46:59', '2020-12-29 13:46:59'),
(30, 2, 104, '{\"reciever_id\":104,\"image\":\"images\\/restorant\\/2\\/photo\\/sincerely-media-VNsdEl1gORk-unsplash.png\",\"type\":\"order\",\"order_status\":\"preparing\",\"order_id\":\"2\",\"title\":\"\\u0645\\u0637\\u0639\\u0645 \\u0627\\u0644\\u0634\\u0628\\u0631\\u0627\\u0648\\u064a\",\"body\":\"\\u0645\\u0631\\u062d\\u0628\\u0627 George \\u0644\\u0642\\u062f \\u062a\\u0645 \\u0648\\u0636\\u0639 \\u0637\\u0644\\u0628\\u0643 \\u0641\\u064a \\u062d\\u0627\\u0644\\u0629 \\u064a\\u062a\\u0645 \\u062a\\u062d\\u0636\\u064a\\u0631 \\u0627\\u0644\\u0637\\u0644\\u0628 \\u0645\\u0634\\u0627\\u0647\\u062f\\u0629 \\u0627\\u0644\\u0645\\u0632\\u064a\\u062f.\",\"click_action\":\"HomeActivity\",\"sound\":true,\"icon\":\"logo\",\"android_channel_id\":\"android_channel_id\",\"high_priority\":\"high_priority\",\"show_in_foreground\":true}', 0, '2020-12-29 13:52:17', '2020-12-29 13:52:17'),
(31, 2, 104, '{\"reciever_id\":104,\"image\":\"images\\/restorant\\/2\\/photo\\/sincerely-media-VNsdEl1gORk-unsplash.png\",\"type\":\"order\",\"order_status\":\"prepared\",\"order_id\":\"2\",\"title\":\"\\u0645\\u0637\\u0639\\u0645 \\u0627\\u0644\\u0634\\u0628\\u0631\\u0627\\u0648\\u064a\",\"body\":\"\\u0645\\u0631\\u062d\\u0628\\u0627 George \\u0644\\u0642\\u062f \\u062a\\u0645 \\u0648\\u0636\\u0639 \\u0637\\u0644\\u0628\\u0643 \\u0641\\u064a \\u062d\\u0627\\u0644\\u0629 \\u062a\\u0645 \\u0627\\u0644\\u062a\\u062d\\u0636\\u064a\\u0631 \\u0645\\u0634\\u0627\\u0647\\u062f\\u0629 \\u0627\\u0644\\u0645\\u0632\\u064a\\u062f.\",\"click_action\":\"HomeActivity\",\"sound\":true,\"icon\":\"logo\",\"android_channel_id\":\"android_channel_id\",\"high_priority\":\"high_priority\",\"show_in_foreground\":true}', 0, '2020-12-29 13:52:29', '2020-12-29 13:52:29'),
(32, 2, 104, '{\"reciever_id\":104,\"image\":\"images\\/restorant\\/2\\/photo\\/sincerely-media-VNsdEl1gORk-unsplash.png\",\"type\":\"order\",\"order_status\":\"preparing\",\"order_id\":\"2\",\"title\":\"\\u0645\\u0637\\u0639\\u0645 \\u0627\\u0644\\u0634\\u0628\\u0631\\u0627\\u0648\\u064a\",\"body\":\"\\u0645\\u0631\\u062d\\u0628\\u0627 George \\u0644\\u0642\\u062f \\u062a\\u0645 \\u0648\\u0636\\u0639 \\u0637\\u0644\\u0628\\u0643 \\u0641\\u064a \\u062d\\u0627\\u0644\\u0629 \\u064a\\u062a\\u0645 \\u062a\\u062d\\u0636\\u064a\\u0631 \\u0627\\u0644\\u0637\\u0644\\u0628 \\u0645\\u0634\\u0627\\u0647\\u062f\\u0629 \\u0627\\u0644\\u0645\\u0632\\u064a\\u062f.\",\"click_action\":\"HomeActivity\",\"sound\":true,\"icon\":\"logo\",\"android_channel_id\":\"android_channel_id\",\"high_priority\":\"high_priority\",\"show_in_foreground\":true}', 0, '2020-12-29 13:52:40', '2020-12-29 13:52:40');

-- --------------------------------------------------------

--
-- Table structure for table `oauth_access_tokens`
--

CREATE TABLE `oauth_access_tokens` (
  `id` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `user_id` bigint(20) DEFAULT NULL,
  `client_id` int(10) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `scopes` text COLLATE utf8_unicode_ci DEFAULT NULL,
  `revoked` tinyint(1) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `expires_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `oauth_access_tokens`
--

INSERT INTO `oauth_access_tokens` (`id`, `user_id`, `client_id`, `name`, `scopes`, `revoked`, `created_at`, `updated_at`, `expires_at`) VALUES
('015252289d45015bbe4eeeaff6d43cb0f3981a48ca8c0ae10bec1b3e083c8e8c19d6b524edb83822', 93, 1, 'MyApp', '[]', 0, '2021-01-14 11:05:56', '2021-01-14 11:05:56', '2022-01-14 13:05:56'),
('0395253d8801a85149975aaffe41e7d44fd98b54e77f6113879dc6f85909ebc16415b4080c5be3c6', 104, 1, 'MyApp', '[]', 0, '2020-12-27 09:01:11', '2020-12-27 09:01:11', '2021-12-27 11:01:11'),
('061ff6d3bea72469ba62bcd0f98ae2e3743fc884f734dc5a921ec0e55e1b16c578710ee4ab3a4b07', 31, 1, 'MyApp', '[]', 0, '2020-10-18 09:32:21', '2020-10-18 09:32:21', '2021-10-18 11:32:21'),
('063d1df824df7ddefedac03a5c046a97e23af0543bb32c8376420c8742a420c9450fa1dbb48b7c4f', 86, 1, 'MyApp', '[]', 0, '2020-12-01 10:42:23', '2020-12-01 10:42:23', '2021-12-01 12:42:23'),
('09f643ff4862b73638bb53c7ee5b93ffd1cf35b6967cbc2ba0198b8a9aa80b5ffd011ba2fcd64be8', 93, 1, 'MyApp', '[]', 0, '2020-12-28 08:01:56', '2020-12-28 08:01:56', '2021-12-28 10:01:56'),
('09f7a5e1765173518e41bccf81f727b1c58e7e84ae5d130533723dc06a27d1f46180567ad6beb4a3', 86, 1, 'MyApp', '[]', 0, '2020-12-01 09:27:52', '2020-12-01 09:27:52', '2021-12-01 11:27:52'),
('0bd08d068a542d0427553de11b0d17fb59c7ef461b3e4c0ba9682533c3e596b57c67c95255af158d', 30, 1, 'MyApp', '[]', 0, '2020-11-24 08:30:06', '2020-11-24 08:30:06', '2021-11-24 10:30:06'),
('0c504accd2f073c06890e06aacd9015c0533e7ee7a44047f83533667790f8e58cbe988daa3cd391b', 104, 1, 'MyApp', '[]', 0, '2020-12-21 07:32:34', '2020-12-21 07:32:34', '2021-12-21 09:32:34'),
('0cff62a7d9de531f08f8841cf1fea5481a011ee9527b0386af382721d89598414b28c0a05de90c4b', 42, 1, 'MyApp', '[]', 0, '2020-11-03 08:43:57', '2020-11-03 08:43:57', '2021-11-03 10:43:57'),
('0d781f9747dc85c6a910fd72c19c0599be0e4668bff19b9436d3b407b8b413c1050d055953239f65', 27, 1, 'MyApp', '[]', 0, '2020-10-15 11:59:00', '2020-10-15 11:59:00', '2021-10-15 13:59:00'),
('0ef80764f0ae73ea66524540069d5b1980a7d5397722fbe7a23e26cb8b8ba46bbec7ecc65808d7af', 83, 1, 'MyApp', '[]', 0, '2020-11-03 14:45:33', '2020-11-03 14:45:33', '2021-11-03 16:45:33'),
('0fd4568867bbcbd5e1598245242975e2cba65ebf24de317290da1b310a8d206267aabdac7055d9d7', 37, 1, 'MyApp', '[]', 0, '2020-11-02 14:01:58', '2020-11-02 14:01:58', '2021-11-02 16:01:58'),
('102f1c25da6506b04efd96d73cd29e727df2e760d72cff8c5f258ea3233e184682e420f48dc3a116', 87, 1, 'MyApp', '[]', 0, '2020-12-02 12:59:25', '2020-12-02 12:59:25', '2021-12-02 14:59:25'),
('10e824bf64c8ae26a7168ce254c88231dc058787e102e6782a576ea128bef074a5fd9749bd4701b9', 71, 1, 'MyApp', '[]', 0, '2020-11-03 10:38:18', '2020-11-03 10:38:18', '2021-11-03 12:38:18'),
('11c086f202bb1b26962da480790b0fdd2b09769e95df512b2890aed69007feaf836b82ccd66fbb2c', 80, 1, 'MyApp', '[]', 0, '2020-11-03 14:20:09', '2020-11-03 14:20:09', '2021-11-03 16:20:09'),
('123c140783f5c314149153f0266a2f44268036b072c2913d961c9cd943f60b93bd369defeff86b55', 79, 1, 'MyApp', '[]', 0, '2020-11-03 13:50:57', '2020-11-03 13:50:57', '2021-11-03 15:50:57'),
('13001941e3a03e53419c9bc32b9bc1bd89aa6fdd014defe03d855f7c3652b0d81b77d9a9f5565d34', 73, 1, 'MyApp', '[]', 0, '2020-11-03 11:16:01', '2020-11-03 11:16:01', '2021-11-03 13:16:01'),
('1592d8c8d67fb1e33c3693e69fdfade65de2f693346d9b868eecf6ba0967034b6b8bb7bfef553245', 86, 1, 'MyApp', '[]', 0, '2020-12-01 09:36:53', '2020-12-01 09:36:53', '2021-12-01 11:36:53'),
('15984e10cb0544203014bb6d94a247c9fc3831d23e0d418ecd3446f0b65609f475abea89886df1da', 88, 1, 'MyApp', '[]', 0, '2020-12-01 11:35:27', '2020-12-01 11:35:27', '2021-12-01 13:35:27'),
('1672d96f06cf3e68d4764db17e62c047a354f79ee7251697eee36b6a5a15085dad616e9a1f3aecbe', 103, 1, 'MyApp', '[]', 0, '2020-12-20 10:37:24', '2020-12-20 10:37:24', '2021-12-20 12:37:24'),
('187dc52bec215bd3eb13e664fa365c246b3ed70b17b523f4cb96298507d6e6431529f040cb54763f', 15, 1, 'MyApp', '[]', 0, '2020-10-05 12:03:28', '2020-10-05 12:03:28', '2021-10-05 14:03:28'),
('18c603a299e0feed68d42082e31abe127453cb411b6523b0c58a823bb4eb22ff8dd293325b81e751', 93, 1, 'MyApp', '[]', 0, '2020-12-24 08:41:08', '2020-12-24 08:41:08', '2021-12-24 10:41:08'),
('1a9b043e87b9d6294faa479fc6fd15f53b22edc54bd93755f23b837f4c24b82c51411985ab7f5537', 87, 1, 'MyApp', '[]', 0, '2020-12-02 14:39:02', '2020-12-02 14:39:02', '2021-12-02 16:39:02'),
('1cb4274932d3f9b3a7dff2b6ac075619a86c8a7bc0dca457060d0d98adc530f0bbc997f1efcdd92a', 81, 1, 'MyApp', '[]', 0, '2020-11-03 14:40:03', '2020-11-03 14:40:03', '2021-11-03 16:40:03'),
('1dfe9c1cd9e70281cce152c4f7c81296cba43fcedec25db8b5da962197a7f62c802be7eca03d4814', 86, 1, 'MyApp', '[]', 0, '2020-12-01 08:33:50', '2020-12-01 08:33:50', '2021-12-01 10:33:50'),
('1f1cbf0d699147e26ede1266dfdfe3b7e8a6e55ad67b666e0e13f0749192b9e1774397e0284d0a3c', 16, 1, 'MyApp', '[]', 0, '2020-10-05 12:10:16', '2020-10-05 12:10:16', '2021-10-05 14:10:16'),
('1f5718b7ece6f0019f587ef9d5e9ebd4ae6a1cf3fde0117f77f01e635629d3c01df8e83c9a85d262', 62, 1, 'MyApp', '[]', 0, '2020-11-03 09:59:07', '2020-11-03 09:59:07', '2021-11-03 11:59:07'),
('20a3af03338433f89145a19111ae06b81038cc760e6cc0e71fe8850e721ac529e869eb06b23360de', 72, 1, 'MyApp', '[]', 0, '2020-11-03 10:41:01', '2020-11-03 10:41:01', '2021-11-03 12:41:01'),
('20b14a5fe9db5f3cb4e63c82f465c7b9e6977d9db353c857a889adbe12a2e09a4f9318220b0d0d8c', 77, 1, 'MyApp', '[]', 0, '2020-11-03 13:46:44', '2020-11-03 13:46:44', '2021-11-03 15:46:44'),
('23a3ed71256e4382ab8156c0e04e52893a9f31b103a4b175013027a3acd81039299a45f7a40b67c9', 93, 1, 'MyApp', '[]', 0, '2020-12-27 08:59:29', '2020-12-27 08:59:29', '2021-12-27 10:59:29'),
('24e31a39ac133d5a18e2335a34bc607d77d84af8e38786d4ec80fbc75161ab7a1859982617872bb2', 82, 1, 'MyApp', '[]', 0, '2020-11-03 14:42:38', '2020-11-03 14:42:38', '2021-11-03 16:42:38'),
('26722df1e6f726c8578a5e1705377fc4a1ac5ab79b06c7304e68792d538664f77529608057859401', 93, 1, 'MyApp', '[]', 0, '2020-12-28 09:16:40', '2020-12-28 09:16:40', '2021-12-28 11:16:40'),
('2ab4f4bdd403a82f4ba3966cbd063949aab66ebf5bb84fd47a2dbb57febfdb4e326c4d3d9e14173e', 76, 1, 'MyApp', '[]', 0, '2020-11-03 12:34:27', '2020-11-03 12:34:27', '2021-11-03 14:34:27'),
('2ad6540c2596d1d0ea31be188d4f613e0f23e8983b24c573354e858b14ce29dbd5035bc18509e190', 93, 1, 'MyApp', '[]', 0, '2020-12-07 12:28:59', '2020-12-07 12:28:59', '2021-12-07 14:28:59'),
('2ba5b8ff2d18f30b8b6979a8dd8104dc6bc92aaf9161dc4c5397adf6ccb92c567f49fa92b687b896', 89, 1, 'MyApp', '[]', 0, '2020-12-02 10:14:12', '2020-12-02 10:14:12', '2021-12-02 12:14:12'),
('2cb68d1ea8bcd1dd07c5497c2addc72dd43d1899b511480564d1bb0b20887b55f3011234b4913b79', 32, 1, 'MyApp', '[]', 0, '2020-10-18 11:51:49', '2020-10-18 11:51:49', '2021-10-18 13:51:49'),
('2e073aabaceff3cea07220e1120b8bef9c2440c87c52d8617a9f96a3b4a6e450abd15dfe6a84f9be', 38, 1, 'MyApp', '[]', 0, '2020-11-03 08:26:54', '2020-11-03 08:26:54', '2021-11-03 10:26:54'),
('2e5f3bad3f8fbd367da4f196590126b1f7e20c6fdb708abdf3dc3579cda5b6c04a9521606b503bc6', 93, 1, 'MyApp', '[]', 0, '2020-12-09 09:04:06', '2020-12-09 09:04:06', '2021-12-09 11:04:06'),
('2e92d69c743d2bf08c50bcea193ad303a874e6aed711bd530683b117ece216e0c0398bb83f35411c', 93, 1, 'MyApp', '[]', 0, '2020-12-09 13:10:57', '2020-12-09 13:10:57', '2021-12-09 15:10:57'),
('2f6533c27c3c5f5d4cb0c96dc8d12c947c30915a332c9d6d567c36537e3f4e77334bfa055bf3b271', 74, 1, 'MyApp', '[]', 0, '2020-11-03 12:30:05', '2020-11-03 12:30:05', '2021-11-03 14:30:05'),
('2f69c00a5f8909031c963c1daf9847ecd6efd449f110819dcaa9df3aa3840ddf92924fcfea703c78', 104, 1, NULL, '[]', 0, '2020-12-27 08:47:03', '2020-12-27 08:47:03', '2021-12-27 10:47:03'),
('32f22b1bd0eb66e3e38885c2f6f10a153f42bac7fa83cd1a89ec0ba9f18aed7123403bb5aeeab82c', 14, 1, 'MyApp', '[]', 0, '2020-10-05 12:00:25', '2020-10-05 12:00:25', '2021-10-05 14:00:25'),
('33aefc1c62ec3b4a817cfaea46dcb6afb9162a6a661f933ce77cadae6557d0afc90a9e89fd74932d', 60, 1, 'MyApp', '[]', 0, '2020-11-03 09:45:32', '2020-11-03 09:45:32', '2021-11-03 11:45:32'),
('379b2a1f58aa84c3869c30c0926a69c5f0c90b8b96df61c72f22f37c306b490ee01c5855a0125144', 30, 1, 'MyApp', '[]', 0, '2020-10-18 09:25:55', '2020-10-18 09:25:55', '2021-10-18 11:25:55'),
('3964098660b8b453af92810453e9ad3f926e31a1bebc357dc80e1f8808ed7139c1e70c47cf6a4111', 86, 1, 'MyApp', '[]', 0, '2020-12-01 14:15:17', '2020-12-01 14:15:17', '2021-12-01 16:15:17'),
('3ae5014391711665103e989c76d952cdbc10087b17318b1cdf189355f30bcfab18153a93c02e19fd', 86, 1, 'MyApp', '[]', 0, '2020-12-01 09:25:36', '2020-12-01 09:25:36', '2021-12-01 11:25:36'),
('3e6dcc88b845adb65b3de7dc201f31250f88651dbab62d472cb9576974b097582f8f73832fb1190f', 38, 1, 'MyApp', '[]', 0, '2020-11-05 11:16:38', '2020-11-05 11:16:38', '2021-11-05 13:16:38'),
('4027e2102c1a989ddb6e0fc0b343aaf9adbd40db400c8d754e18d2761c81eb5044ac3696cbf16e03', 110, 1, 'MyApp', '[]', 0, '2020-12-28 14:32:34', '2020-12-28 14:32:34', '2021-12-28 16:32:34'),
('418876e4a94719226338c7ac786e0ec8a305bf69d4875ae4c5be29066f90f4279ada4e5db215c1b1', 93, 1, 'MyApp', '[]', 0, '2020-12-17 13:30:30', '2020-12-17 13:30:30', '2021-12-17 15:30:30'),
('419b12ef486012b82b422a8c383c93edfacd98833239deb7469c09a9c9adebfee04c5603e15e49a9', 1, 1, 'MyApp', '[]', 0, '2020-06-22 07:25:09', '2020-06-22 07:25:09', '2021-06-22 09:25:09'),
('4246c401174a008a4ecbcff1f442c92b0c19b149e23bc93c6545690b44c662c8f839773493bb26e9', 104, 1, NULL, '[]', 0, '2020-12-27 08:25:16', '2020-12-27 08:25:16', '2021-12-27 10:25:16'),
('42fe325b6a34f51fb59639038ec3e991302457e891d731ebf9ad49677df1c5394fb0807dc902be50', 110, 1, 'MyApp', '[]', 0, '2020-12-28 14:26:42', '2020-12-28 14:26:42', '2021-12-28 16:26:42'),
('45b5e671f43b4bdb16e43f30f83c34bf6b8a7ae112dbe61fe72b222d230e639cc78a6a017803f101', 70, 1, 'MyApp', '[]', 0, '2020-11-03 10:36:26', '2020-11-03 10:36:26', '2021-11-03 12:36:26'),
('464527d6845ed628f86c1071bc223143f84e7b083e83788960d45ebabe4773892de5867954e52aab', 85, 1, 'MyApp', '[]', 0, '2020-11-30 10:11:04', '2020-11-30 10:11:04', '2021-11-30 12:11:04'),
('472e98882e218d9119583b5012e91a8671e04bac7ea6f896430a345da01d8ac7d3449d8f6f305020', 38, 1, 'MyApp', '[]', 0, '2020-12-01 08:38:54', '2020-12-01 08:38:54', '2021-12-01 10:38:54'),
('4a38ed350bcef99ab9601d043436fcff82fdb9fd4ccf4ce7bded4986a47493da1f23cca357b9237a', 104, 1, 'MyApp', '[]', 0, '2020-12-24 11:17:22', '2020-12-24 11:17:22', '2021-12-24 13:17:22'),
('4a4bbc1afc80de8dc7ebd1a79320019ce79e5793ac57b483df7a9e8936f1b826c4ca75b72b68ae81', 30, 1, 'MyApp', '[]', 0, '2020-10-18 09:23:47', '2020-10-18 09:23:47', '2021-10-18 11:23:47'),
('4a9d8b584c47bdc1a31a95663cfc2b6bc98d9fc33d80ac4966e1e0d45d874aa0f4e576575b25fb32', 104, 1, 'MyApp', '[]', 0, '2020-12-27 13:47:41', '2020-12-27 13:47:41', '2021-12-27 15:47:41'),
('4b3691c8f8c73a8e99def4da5981644c91bcb038056153144262171be941d6ea50b7aebce90f2e1a', 85, 1, 'MyApp', '[]', 0, '2020-11-30 10:08:48', '2020-11-30 10:08:48', '2021-11-30 12:08:48'),
('4be5b332396593dfa8d17d20129aa4d676a45e88e6f7c8edea6ec73d0a0d1212355a4ad22e9b2486', 85, 1, 'MyApp', '[]', 0, '2020-11-30 11:05:11', '2020-11-30 11:05:11', '2021-11-30 13:05:11'),
('4bf20cfda108428ae9b007ed769be684fe5caafab3764bae5c62a692f994d0c41b1f2ecfde74224d', 45, 1, 'MyApp', '[]', 0, '2020-11-03 08:56:50', '2020-11-03 08:56:50', '2021-11-03 10:56:50'),
('4ce98f91f034191b4f56a451e27196ec77af0d1e50c785b6b738f45bf8f3fd92ee0d0e4305946aec', 103, 1, 'MyApp', '[]', 0, '2020-12-20 10:48:43', '2020-12-20 10:48:43', '2021-12-20 12:48:43'),
('4d03f3f8fc4a3522789694a4b831a56682fded52c1b085fca303f30b42be3eee580232b95ae77587', 92, 1, 'MyApp', '[]', 0, '2020-12-08 10:08:43', '2020-12-08 10:08:43', '2021-12-08 12:08:43'),
('4ea950d185a47b5a4249c3be845505156e4837dbd87c2f54af24c5bb2aba01de8338adef396b035d', 93, 1, 'MyApp', '[]', 0, '2020-12-06 13:19:04', '2020-12-06 13:19:04', '2021-12-06 15:19:04'),
('5051202e32c5b2cff43003d9aa8bde3a859a660160f1d63c8049f275a45f454b1e01619733103800', 87, 1, 'MyApp', '[]', 0, '2020-12-02 14:58:03', '2020-12-02 14:58:03', '2021-12-02 16:58:03'),
('51385235728b89e62a76aa41bf4162df21d93b7fbf3780451a73cda2d7e466b17821e522d1ec2682', 58, 1, 'MyApp', '[]', 0, '2020-11-03 09:38:59', '2020-11-03 09:38:59', '2021-11-03 11:38:59'),
('518cab237ae6b421cd48ba3d3462847e143be8d270c385a50382f9c80ab69d5e0d4fe46c5c99056c', 85, 1, 'MyApp', '[]', 0, '2020-11-30 10:10:49', '2020-11-30 10:10:49', '2021-11-30 12:10:49'),
('519b82acaebe658a6ddec9ae921daa8590c4e2c9a8123bf6f6e599c1413a4bc7f2a16b0900f6de5f', 30, 1, 'MyApp', '[]', 0, '2020-10-18 09:24:57', '2020-10-18 09:24:57', '2021-10-18 11:24:57'),
('55159e3e8947616a9c960c64d51916ba6d12e50760f3b7314d86355b3c44257b5e828119da4a544e', 38, 1, 'MyApp', '[]', 0, '2020-12-01 09:02:27', '2020-12-01 09:02:27', '2021-12-01 11:02:27'),
('551e677675c3b312fb387c9024adc06ca3d740809aa47315a464227f0ecaa7556466b92a5642952b', 93, 1, 'MyApp', '[]', 0, '2020-12-29 13:31:49', '2020-12-29 13:31:49', '2021-12-29 15:31:49'),
('558b04e1d0ed1cbe15d9a49e616de9d74bafd8c0af77993a2990f78de895c02a9c88d8af0bd44610', 67, 1, 'MyApp', '[]', 0, '2020-11-03 10:27:41', '2020-11-03 10:27:41', '2021-11-03 12:27:41'),
('5672c528e3558157d827f8e5f49835be69aae1ac95ebb6c660ae345ac4cd193de483a4789ec3935f', 39, 1, 'MyApp', '[]', 0, '2020-11-03 08:32:12', '2020-11-03 08:32:12', '2021-11-03 10:32:12'),
('56772409c5a57af58e2bb7793d49858b74bee0a8c5c9c03802889df822aedd59344a140d267564a2', 86, 1, 'MyApp', '[]', 0, '2020-12-01 08:34:04', '2020-12-01 08:34:04', '2021-12-01 10:34:04'),
('57c3ea6dfbdc1ff48670c5c94907e77e67af9e7accad4d615e2ef6608e04595fa71c748edaa6ae7c', 30, 1, 'MyApp', '[]', 0, '2020-10-18 09:29:47', '2020-10-18 09:29:47', '2021-10-18 11:29:47'),
('58178f0ef046576f0f2d1b9eec26cc8d942b33ccd21e9f413af0bb762bab2ad60e67d7a05d95822d', 87, 1, 'MyApp', '[]', 0, '2020-12-01 10:44:14', '2020-12-01 10:44:14', '2021-12-01 12:44:14'),
('5940e3a0bae5172f756f55174cb88bc7a08110fbc792d25f2918a0cc17274c685963490c6ff6ed39', 55, 1, 'MyApp', '[]', 0, '2020-11-03 09:22:19', '2020-11-03 09:22:19', '2021-11-03 11:22:19'),
('59421a56a50fabd58ae0d85fe2b78a4e71ed1fa5898fd354837751525103155bdab648b344b67317', 59, 1, 'MyApp', '[]', 0, '2020-11-03 09:40:33', '2020-11-03 09:40:33', '2021-11-03 11:40:33'),
('5b6a4d9656b1a468ab51e207a91d5219e45b34f4fc95779d7e716a18de03e3284fffb7e9a641e4cb', 92, 1, 'MyApp', '[]', 0, '2020-12-08 10:08:57', '2020-12-08 10:08:57', '2021-12-08 12:08:57'),
('5bfe58ce04ab0f7056a9b382684aaac2bada449750233da0ef1cdf66a6dce9ff10db64755ba52a22', 48, 1, 'MyApp', '[]', 0, '2020-11-03 09:05:10', '2020-11-03 09:05:10', '2021-11-03 11:05:10'),
('5db06f762681f8ac16c57b2df1f4c6b00dd6a7e06b796a980ef4bb4c99d51a87f6768e2d9ee25a5f', 49, 1, 'MyApp', '[]', 0, '2020-11-03 09:07:49', '2020-11-03 09:07:49', '2021-11-03 11:07:49'),
('5db5c0f68cb7d935c92db208e46fe49dec696c8eccbb1e18e1ecadcb4e504821ef847e7e2284614d', 78, 1, 'MyApp', '[]', 0, '2020-11-03 13:48:29', '2020-11-03 13:48:29', '2021-11-03 15:48:29'),
('5eb62dea157896eb4940d6ed605330279e800a2c3a9fabe98e6b3169c8850dbf9f4a11910bc22799', 90, 1, 'MyApp', '[]', 0, '2020-12-03 09:25:48', '2020-12-03 09:25:48', '2021-12-03 11:25:48'),
('607bb065282444fb00d06145f9fb387f1b5aebcabe3e4709b17f118ed637c99f5e8d83bbda58c56d', 91, 1, 'MyApp', '[]', 0, '2020-12-06 11:59:08', '2020-12-06 11:59:08', '2021-12-06 13:59:08'),
('64a5ea74c645697d24db79bd56f17de473c265edef65678dc3407cacd2b748c3377d006fe2256761', 104, 1, 'MyApp', '[]', 0, '2020-12-21 14:16:44', '2020-12-21 14:16:44', '2021-12-21 16:16:44'),
('6518fa9e720d33c0fe5cba67f51f67b221093440fcc834c7daa585b83315df9eff0e86cac5d7f3e3', 85, 1, 'MyApp', '[]', 0, '2020-11-30 11:33:04', '2020-11-30 11:33:04', '2021-11-30 13:33:04'),
('663d7582d3e8505bdc0d45a200d65da285a642a08d89f634a0036c2cc856fc4c8004ee969fcf1da3', 108, 1, 'MyApp', '[]', 0, '2020-12-28 13:44:10', '2020-12-28 13:44:10', '2021-12-28 15:44:10'),
('66afc16aa1307df1f497b7a812487cbece4033040944ba8fe318a2a02fc1e22e5ae01c215da645da', 51, 1, 'MyApp', '[]', 0, '2020-11-03 09:11:11', '2020-11-03 09:11:11', '2021-11-03 11:11:11'),
('66db53562f2288955fa69a28ae9d1d8a67c39c0f88b547785dcde322004bd9dea07d0d3108cfd264', 44, 1, 'MyApp', '[]', 0, '2020-11-03 08:55:11', '2020-11-03 08:55:11', '2021-11-03 10:55:11'),
('67f36b263158609a6649adc61005859d31431f645c36ebcb239800cc8269a25144f067497e1d9616', 104, 1, 'MyApp', '[]', 0, '2020-12-22 11:00:10', '2020-12-22 11:00:10', '2021-12-22 13:00:10'),
('68aa3ff81f850e4b0df84059bde8867787e9a3b1825e69708227f7a22783cbf518882e163ce27cdf', 30, 1, 'MyApp', '[]', 0, '2020-10-18 09:32:52', '2020-10-18 09:32:52', '2021-10-18 11:32:52'),
('6a029271658296acff15da3a96deac3e2c175d8ee2be060502597be30a60eab4f9fbb6de07a05a82', 30, 1, 'MyApp', '[]', 0, '2020-10-18 09:24:15', '2020-10-18 09:24:15', '2021-10-18 11:24:15'),
('6f7c97bb952686e04c711f58207d0f36591b1847fc905fccaa397a95fd675efd7f76d0fa1efe6f01', 68, 1, 'MyApp', '[]', 0, '2020-11-03 10:28:51', '2020-11-03 10:28:51', '2021-11-03 12:28:51'),
('7203a313645352c053609fbcc141f0dab4c21d543a42ab1f7d247eda0bbb04abfc526a54ccac26bf', 86, 1, 'MyApp', '[]', 0, '2020-12-01 08:56:24', '2020-12-01 08:56:24', '2021-12-01 10:56:24'),
('736256052b5504543c662c11b58fa4a0c902784e7386588f8cc61577fb8f28d10395496c9ef32f76', 38, 1, 'MyApp', '[]', 0, '2020-11-05 11:16:09', '2020-11-05 11:16:09', '2021-11-05 13:16:09'),
('741330509c8cf68ad0bac1c44a9b41491065e278ab886136747eb3e068a4043f87fa99342523782e', 104, 1, 'MyApp', '[]', 0, '2020-12-27 09:03:43', '2020-12-27 09:03:43', '2021-12-27 11:03:43'),
('754543a95e97c60d379845741ab23d36d831e689930508986c8b9896ef912a58d178ff0ff5efe7cd', 93, 1, 'MyApp', '[]', 0, '2020-12-29 12:12:22', '2020-12-29 12:12:22', '2021-12-29 14:12:22'),
('75f1f53d0d4f354c6cfaaf9195794352aef81a5ba8eefd421839a5ceff6036a1a8f5a2006e0d5048', 84, 1, 'MyApp', '[]', 0, '2020-11-05 11:18:27', '2020-11-05 11:18:27', '2021-11-05 13:18:27'),
('765b260fa6cdeb7f0fb21069620675fc769e5841ffba3e3a89dc8b513d523859850b8a1653e17d89', 89, 1, 'MyApp', '[]', 0, '2020-12-02 10:11:46', '2020-12-02 10:11:46', '2021-12-02 12:11:46'),
('78070ffbd882bc744a6109a0f79b4dd87ac34103b00045d6daa13c07ac1abafe680b808a1731913b', 89, 1, 'MyApp', '[]', 0, '2020-12-01 12:16:01', '2020-12-01 12:16:01', '2021-12-01 14:16:01'),
('79845e8985eb4c21fe46547eb989ffce5dc2bfbbeab1fe12a02a166b7d56863b0bb67b639b312667', 87, 1, 'MyApp', '[]', 0, '2020-12-02 13:04:32', '2020-12-02 13:04:32', '2021-12-02 15:04:32'),
('7b16a68d8aac535902d8c70307c8575eb8f82b7f8d4b5a80f2c9e0bbe045bbaf7312843dc7e864b0', 93, 1, 'MyApp', '[]', 0, '2020-12-20 10:48:10', '2020-12-20 10:48:10', '2021-12-20 12:48:10'),
('7bff030e19adbf9c025c838fb35529976e607a6f4d2856a7b4748ffa64a23d5ba4bbffac35bb13c0', 66, 1, 'MyApp', '[]', 0, '2020-11-03 10:26:09', '2020-11-03 10:26:09', '2021-11-03 12:26:09'),
('7d797fcbbb4cfe214ec8bb087f516a5e7eb5dda6fdf32f8c4f6e8263f01fac1cecdd2382b0b440b4', 89, 1, 'MyApp', '[]', 0, '2020-12-01 11:44:05', '2020-12-01 11:44:05', '2021-12-01 13:44:05'),
('7ee0fb886e2a182c861ddc9800dea0c4d8e6a4f1aeafb9372b53f8b68e90c19c5f630e598bab9e88', 104, 1, 'MyApp', '[]', 0, '2020-12-21 10:13:47', '2020-12-21 10:13:47', '2021-12-21 12:13:47'),
('80f5a58f5eeecee146d896643900c6a9dfdaad36f235ed7708cfc1fb7ecb3af820a051272b0f6ae2', 103, 1, 'MyApp', '[]', 0, '2020-12-27 12:56:53', '2020-12-27 12:56:53', '2021-12-27 14:56:53'),
('825db4a61481e71b8c141b48dddf9dee4b0f34da9dff7615f0c111a8f28543a501705b3ad4d94cf2', 37, 1, 'MyApp', '[]', 0, '2020-11-02 14:18:14', '2020-11-02 14:18:14', '2021-11-02 16:18:14'),
('82e0d965ce0fdc877ba84dff5470f060413e7e4e23f2e4056a9ae44a500ec6aa9c0f339082c61076', 36, 1, 'MyApp', '[]', 0, '2020-11-02 12:01:52', '2020-11-02 12:01:52', '2021-11-02 14:01:52'),
('836731eb74fc71b791411986ea29c44ededce19594de96f02cefb83cb0fe00a64d75cf7a993ad2ca', 93, 1, 'MyApp', '[]', 0, '2020-12-23 11:27:36', '2020-12-23 11:27:36', '2021-12-23 13:27:36'),
('84ba1d6b315a4c134a1f786c735988c17ec91ad6e5e5e38f305ead0a5fdb915ace59558d9ad8a9e9', 106, 1, 'MyApp', '[]', 0, '2020-12-22 13:51:33', '2020-12-22 13:51:33', '2021-12-22 15:51:33'),
('8571b56793f6ceff68d7ea09f5da471a36e0a4b286697a78d27f031ad66c43c7eff1d59d685c7da2', 92, 1, 'MyApp', '[]', 0, '2020-12-06 13:18:16', '2020-12-06 13:18:16', '2021-12-06 15:18:16'),
('869e6404942a465bd827d72df4069040f90fe24fe299778a3b9cef6ab713809d249e21e8e29cbae4', 104, 1, 'MyApp', '[]', 0, '2020-12-20 11:29:17', '2020-12-20 11:29:17', '2021-12-20 13:29:17'),
('8889c883529c48e31684c8be346e53bdb9fde23daa2de1e39447649a3ca37dc9179d2326e8901f88', 34, 1, 'MyApp', '[]', 0, '2020-11-02 11:41:51', '2020-11-02 11:41:51', '2021-11-02 13:41:51'),
('92498b5c48f4f333e02571f2f7d9d357da370e428977abbeb4adebc6926caadc5c3d2d2b660ba730', 85, 1, 'MyApp', '[]', 0, '2020-11-30 08:54:27', '2020-11-30 08:54:27', '2021-11-30 10:54:27'),
('92dcfd8519411ed8bcfc0d52036d53b090f3190d9222cb0ac64b403816903b3ff1daf95593509c9c', 1, 1, 'MyApp', '[]', 0, '2020-06-21 10:22:50', '2020-06-21 10:22:50', '2021-06-21 12:22:50'),
('93c0f9c9fac6b2eda77f7a52d0a3a5da563e0f6e457b9a730159c3b4cb2021cc22a28873e934a360', 86, 1, 'MyApp', '[]', 0, '2020-12-01 09:26:00', '2020-12-01 09:26:00', '2021-12-01 11:26:00'),
('97ea3d82818942046991d6f9be87d7b859882438d04f83e32047ea4e060da8e5c914b2cc94df0d34', 85, 1, 'MyApp', '[]', 0, '2020-11-30 10:09:26', '2020-11-30 10:09:26', '2021-11-30 12:09:26'),
('98399a4f0eb345475b73654ea393919072d4ea0102d63e8b7b5288203927b5cb4498a22bb22086dc', 85, 1, 'MyApp', '[]', 0, '2020-11-30 10:10:13', '2020-11-30 10:10:13', '2021-11-30 12:10:13'),
('98ad9cf5835eb54b20063d569dae8f6d3b9552671c89d10a6ddc5b8f873aa39b37a5d41cd47530de', 93, 1, 'MyApp', '[]', 0, '2020-12-27 09:06:08', '2020-12-27 09:06:08', '2021-12-27 11:06:08'),
('9aaf20ccdca90fee9f9b5cc21c6801201f107a863d8b938b97e3bbc8e92f871bae88a5b79687eb7f', 104, 1, 'MyApp', '[]', 0, '2020-12-23 12:24:23', '2020-12-23 12:24:23', '2021-12-23 14:24:23'),
('9ab3471f9723d3832b9f6eb0f676c49750c9d108b548fb95cef23587ccb1388401a034268c365d48', 104, 1, 'MyApp', '[]', 0, '2020-12-23 14:00:47', '2020-12-23 14:00:47', '2021-12-23 16:00:47'),
('9af2b7877bab84e8e9e01eeff2f93994a2f2243e09fa217d9f5f5d829f3d4c23d3ac182fb71074bc', 63, 1, 'MyApp', '[]', 0, '2020-11-03 10:01:30', '2020-11-03 10:01:30', '2021-11-03 12:01:30'),
('9d158d9e13a9ca86b6ff2f55c4c3165f46ef9030bfeb3792ad0c2f5e01a91e2f11323720091f5c55', 41, 1, 'MyApp', '[]', 0, '2020-11-03 08:40:39', '2020-11-03 08:40:39', '2021-11-03 10:40:39'),
('a0ee3592cd9eeff23e5ed9ee9423492d8dfcdff50c9b8a3707861bb7fddb5185cf3837436751e0c8', 93, 1, 'MyApp', '[]', 0, '2020-12-27 12:54:57', '2020-12-27 12:54:57', '2021-12-27 14:54:57'),
('a22ea5ab653057f5c216cf8760a9830150acce724d92db91eedf36cf8b758f108ddde50fc8d80df7', 50, 1, 'MyApp', '[]', 0, '2020-11-03 09:09:47', '2020-11-03 09:09:47', '2021-11-03 11:09:47'),
('a34b713821768d65185113e914ce4c66d14b586c12c6a8f7d1c4dfa1d9428c6ccec4f7e2f2955698', 69, 1, 'MyApp', '[]', 0, '2020-11-03 10:31:58', '2020-11-03 10:31:58', '2021-11-03 12:31:58'),
('a71f7884741b0a9ee6b2512422b25fe3a56b46afb715648e5c036ae257fcf8135e409dbfdcbc0fbf', 104, 1, 'MyApp', '[]', 0, '2020-12-28 08:53:48', '2020-12-28 08:53:48', '2021-12-28 10:53:48'),
('a776b745b6ea315b47bcc93359357f741f40c203cfa48c0eb7c206ec8c758cb9d37875194f1df223', 79, 1, 'MyApp', '[]', 0, '2020-11-03 13:51:39', '2020-11-03 13:51:39', '2021-11-03 15:51:39'),
('ac799e1fa266284b40358256abae9c6b6666c40c8c3224aa1fb34b21cfa4194fd8b3988ef5301ad6', 93, 1, NULL, '[]', 0, '2020-12-27 08:47:57', '2020-12-27 08:47:57', '2021-12-27 10:47:57'),
('ad255c928b917b155a59f66b89d5bc8d1d069426334b849694345c71e9b1959bae6e8ea2b72a5865', 1, 1, 'MyApp', '[]', 0, '2020-06-21 10:36:32', '2020-06-21 10:36:32', '2021-06-21 12:36:32'),
('af8770187ccefd97eb739fa387505616d3fe326a58e8a4fded7c8d47fdc97cb008587f938fa67432', 85, 1, 'MyApp', '[]', 0, '2020-11-30 10:10:05', '2020-11-30 10:10:05', '2021-11-30 12:10:05'),
('b244c64279cc5af0c937d49f5d932e2f700b56f3842ec3400001a555b5328ec5bf81bf1a20e542e0', 91, 1, 'MyApp', '[]', 0, '2020-12-06 11:46:39', '2020-12-06 11:46:39', '2021-12-06 13:46:39'),
('b36039204d73b90cb2341f8bea1e618a0c98572321675b308b87d59ee98b16bfb5f3c746cb61a740', 30, 1, 'MyApp', '[]', 0, '2020-11-02 14:22:14', '2020-11-02 14:22:14', '2021-11-02 16:22:14'),
('b72b1ddce1ad7e157a47980a27cd65ab78f685c3786e76b7559fa1449bf7996444db642b284f4d40', 85, 1, 'MyApp', '[]', 0, '2020-11-30 08:54:50', '2020-11-30 08:54:50', '2021-11-30 10:54:50'),
('b7f8b276b9f7cd49e138f2bc65786f4dd0dc1a51d0d21eab1fb230f094c2bc002a364eb223f71b63', 93, 1, 'MyApp', '[]', 0, '2020-12-29 11:56:31', '2020-12-29 11:56:31', '2021-12-29 13:56:31'),
('b83edbfe252888769bba426f525548e7b2b66b3616b9946dfd8cd60f4b17f236a2baa518ae5b5270', 64, 1, 'MyApp', '[]', 0, '2020-11-03 10:17:19', '2020-11-03 10:17:19', '2021-11-03 12:17:19'),
('b87a7a097e15427ba02663ab4f79df518c286574cb2a45222d5e2a76ee27d155d390488f7159a054', 89, 1, 'MyApp', '[]', 0, '2020-12-01 12:43:27', '2020-12-01 12:43:27', '2021-12-01 14:43:27'),
('bca40be5b1d09c1584b2868e29d07b4fcc919bbe6fe02e7d3020df7136a283b9749f56502733e889', 29, 1, 'MyApp', '[]', 0, '2020-10-18 09:11:04', '2020-10-18 09:11:04', '2021-10-18 11:11:04'),
('be5fff92acfa7d08b4d8e807abb0893e0f839739626669e47d2f1b0127ac80ec2f5e31fc125daba2', 33, 1, 'MyApp', '[]', 0, '2020-11-02 11:26:59', '2020-11-02 11:26:59', '2021-11-02 13:26:59'),
('be88474902cf129187a5cca4b37b5057a8a162be0589c75f99ff3c8dbc90e1714eaf1e20115dbab8', 93, 1, 'MyApp', '[]', 0, '2020-12-27 10:22:56', '2020-12-27 10:22:56', '2021-12-27 12:22:56'),
('beea956b78cd3e1140ee837540717e248d016f1ac23431b5ff6f4774de17e81a7d8e21695a106d8a', 110, 1, 'MyApp', '[]', 0, '2020-12-28 14:27:18', '2020-12-28 14:27:18', '2021-12-28 16:27:18'),
('c02341d9f7919d8cc95b478f0869e8b93cdf1a16dd2e933d4bcb996a18ed361c6c480c8307b4dfc7', 56, 1, 'MyApp', '[]', 0, '2020-11-03 09:32:10', '2020-11-03 09:32:10', '2021-11-03 11:32:10'),
('c1134a8e07fdacfcbb9df06971dd0d477e34a8b960a8d1940993b3478de5d8541e683e062170b689', 61, 1, 'MyApp', '[]', 0, '2020-11-03 09:49:39', '2020-11-03 09:49:39', '2021-11-03 11:49:39'),
('c1b403a4164b9ab124e1f4eae048e93b826e088cf97af3a27cee25c45fc77846282c4df859627936', 53, 1, 'MyApp', '[]', 0, '2020-11-03 09:17:18', '2020-11-03 09:17:18', '2021-11-03 11:17:18'),
('c3ce54c50b4ee2651c7ac1825fa23e6c8c9d1f4e6236c94c8c3df800d0de63e0314d874c337ecc87', 104, 1, 'MyApp', '[]', 0, '2020-12-27 12:55:24', '2020-12-27 12:55:24', '2021-12-27 14:55:24'),
('c9db867c6946f48808cc27e3349300e0a06998f7d1956b805ab806fe3e70a8234797f4bd9af3e54f', 93, 1, 'MyApp', '[]', 0, '2020-12-09 11:19:45', '2020-12-09 11:19:45', '2021-12-09 13:19:45'),
('cd216701d4f46c9c6ac246e3bcb417d6eeeae56d4aa78dc57b2854385be18d2c48036c6ada26c3e5', 93, 1, 'MyApp', '[]', 0, '2020-12-08 09:35:49', '2020-12-08 09:35:49', '2021-12-08 11:35:49'),
('d0c2000afedec1df6f99c7b1b50309d69246dac08f1f33b1cf4e423dfa38dbf7620ac45cdc6ff867', 93, 1, 'MyApp', '[]', 0, '2020-12-10 10:49:21', '2020-12-10 10:49:21', '2021-12-10 12:49:21'),
('d10a963b60719f11e43c52bbec600bcc980adff23268f81c6ca1e9a43f993fbdd606fc4c172f964a', 52, 1, 'MyApp', '[]', 0, '2020-11-03 09:15:31', '2020-11-03 09:15:31', '2021-11-03 11:15:31'),
('d17112910d0a3d2d46b79522bc0ffd971e45d0b0ca2f11c15317c6f83c231dc47d86bcd1290c2c10', 104, 1, 'MyApp', '[]', 0, '2020-12-29 12:38:34', '2020-12-29 12:38:34', '2021-12-29 14:38:34'),
('d1a64d9b5e44152a37728c5dba35f83e216e7ce677288287b3810851f977ed453bec99e2c92981e4', 86, 1, 'MyApp', '[]', 0, '2020-12-01 10:28:32', '2020-12-01 10:28:32', '2021-12-01 12:28:32'),
('d3e39be9bdef12571e46c254c58bcfa749ac776d114c2a76254f2dbf8dbe91de8c651b7a5c59e10f', 87, 1, 'MyApp', '[]', 0, '2020-12-02 14:47:00', '2020-12-02 14:47:00', '2021-12-02 16:47:00'),
('d49d99896da52490ebdc79c1cea6b31b4bd4aab11ccdd0014725f5faa07e4be5a3d09d302f4002c6', 38, 1, 'MyApp', '[]', 0, '2020-11-30 09:24:56', '2020-11-30 09:24:56', '2021-11-30 11:24:56'),
('d87d00b95f7193492d3d20a1975fc8d8454459dc2ceec4e5cd709f31771c414d800134593b68d173', 84, 1, 'MyApp', '[]', 0, '2020-11-05 10:05:38', '2020-11-05 10:05:38', '2021-11-05 12:05:38'),
('dbb95e69b73974a4ca2f57f3aa08848b0aaa355a83ac55607fcbc73546aefa884f5192dd691fa559', 110, 1, 'MyApp', '[]', 0, '2020-12-28 14:30:22', '2020-12-28 14:30:22', '2021-12-28 16:30:22'),
('dc2da8bb3436ae8f0ad4b8bbe87b71918d68356e1f4dd233d188ec514c5293468bc26dbd2b4842dd', 91, 1, 'MyApp', '[]', 0, '2020-12-06 11:48:07', '2020-12-06 11:48:07', '2021-12-06 13:48:07'),
('de41ee715f55f07aed8a84f7938f402cbd2b5c86016e497928472ba7a0fd2948d43148ed1057a5ba', 43, 1, 'MyApp', '[]', 0, '2020-11-03 08:47:30', '2020-11-03 08:47:30', '2021-11-03 10:47:30'),
('e322f66492ac6597e95265083684cec0ff4454a25caa14ca10b1eacb345d638bb485bb01459b6fc2', 104, 1, NULL, '[]', 0, '2020-12-27 08:46:09', '2020-12-27 08:46:09', '2021-12-27 10:46:09'),
('e3c9f545fcfb18afa2ed37e22585841aaa47a1c3a99a6d009618e0f783b677b14fd588960269f7b2', 38, 1, 'MyApp', '[]', 0, '2020-11-05 11:15:48', '2020-11-05 11:15:48', '2021-11-05 13:15:48'),
('e42e70a8207178d7dff5228e90e0acf5983f991efb97cfec63fa685d3c1b4add0b108dc655654098', 104, 1, NULL, '[]', 0, '2020-12-27 08:46:30', '2020-12-27 08:46:30', '2021-12-27 10:46:30'),
('e47f677ff1ef8196ad9f110abac07703d629f9658e8d9d6cdf5cc4e1cc4ed69aaa5d35076abdb818', 106, 1, 'MyApp', '[]', 0, '2020-12-27 12:56:05', '2020-12-27 12:56:05', '2021-12-27 14:56:05'),
('e4f6f75ae6493a03ec55be20b3fe4bb86ff6fb293762bdb733f672a9ac7ba4b10e4dd5df79b75f5a', 85, 1, 'MyApp', '[]', 0, '2020-11-30 10:09:01', '2020-11-30 10:09:01', '2021-11-30 12:09:01'),
('e776ceefb52f6e28d9fdd77e99dd0d453210cfd4e074933d0f8e4094db879730a9d3ac09d6f7fcb4', 103, 1, 'MyApp', '[]', 0, '2020-12-24 12:05:27', '2020-12-24 12:05:27', '2021-12-24 14:05:27'),
('e7b3336bdf2759e4cee4a55fd00a7fc028aedce55912e839e005cfcd490016e632656f5dd0674702', 46, 1, 'MyApp', '[]', 0, '2020-11-03 08:59:57', '2020-11-03 08:59:57', '2021-11-03 10:59:57'),
('ea448fa94b1c4be36f7f0dd911df50bf0989332559c40405d8fc55680569f2cc3a272a186639217e', 87, 1, 'MyApp', '[]', 0, '2020-12-02 11:59:57', '2020-12-02 11:59:57', '2021-12-02 13:59:57'),
('ebe7aae818b3c6a970543e39d194e35e8482eaa0b2410ea9473c535a3d4a7da9aa0a7bdee267d708', 75, 1, 'MyApp', '[]', 0, '2020-11-03 12:31:32', '2020-11-03 12:31:32', '2021-11-03 14:31:32'),
('ef00d9e32a1f687f93303f33721a247855c71f28322ea08337cf9c17cbc46abdcb3c7c84979ea219', 47, 1, 'MyApp', '[]', 0, '2020-11-03 09:02:50', '2020-11-03 09:02:50', '2021-11-03 11:02:50'),
('ef59e05d93310ed9a41540bb091bb3b220fb8a660c24dee881bcbab2b2d4edbfe1e6fbedfcfb2cf1', 54, 1, 'MyApp', '[]', 0, '2020-11-03 09:19:50', '2020-11-03 09:19:50', '2021-11-03 11:19:50'),
('f0821a3f6a19a50eae45f4e5f80a1ac53334f0a303e669c4e01d4c8ad762f9062385eabc4cff123b', 109, 1, 'MyApp', '[]', 0, '2020-12-28 14:20:46', '2020-12-28 14:20:46', '2021-12-28 16:20:46'),
('f0c076c17ac5d8c158793fb9f141b14630ecc468ca745632b1aa7e2cb73796e836eefff2972fcb79', 35, 1, 'MyApp', '[]', 0, '2020-11-02 12:00:50', '2020-11-02 12:00:50', '2021-11-02 14:00:50'),
('f0d106913b29f7fadb36bcb2d69b5b0101ae31cffc683f06d5c74b2a7528f52212c32e00608909eb', 93, 1, 'MyApp', '[]', 0, '2020-12-17 13:32:57', '2020-12-17 13:32:57', '2021-12-17 15:32:57'),
('f11be909788b7f15d76d3113cae202d9016c11b54406ab91c256e967a4cb8bb06e5e5b85c29a6d85', 84, 1, 'MyApp', '[]', 0, '2020-11-05 10:06:13', '2020-11-05 10:06:13', '2021-11-05 12:06:13'),
('f3d6afaf692cb939a36e1ae372ffb16926e6bc85efb202a074fdba7c6c73e43d0a864e215719b4fc', 93, 1, 'MyApp', '[]', 0, '2020-12-27 09:05:55', '2020-12-27 09:05:55', '2021-12-27 11:05:55'),
('f4f1bd0e491eb5e662ec6030f02b16bd8561a13e991bcd5758607220757ca5ee9d624e8717836106', 30, 1, 'MyApp', '[]', 0, '2020-10-18 09:23:54', '2020-10-18 09:23:54', '2021-10-18 11:23:54'),
('f82054ce64132843735c02006f290ba81bda8dcc1dcba0a04e980c53f8d9ef9098b28eb48f3bad4a', 93, 1, 'MyApp', '[]', 0, '2020-12-27 12:13:06', '2020-12-27 12:13:06', '2021-12-27 14:13:06'),
('fc65de0f72a78a614e5079608b8d72ea051adb1f94b28b4f60438737436daf7bcf6bd9230d7e70eb', 104, 1, NULL, '[]', 0, '2020-12-27 08:42:58', '2020-12-27 08:42:58', '2021-12-27 10:42:58'),
('fe196b225f751da5a7d4f2866b6450cc097d8657fe222df6a4be167fc13fab01bb468c994ff3b3a7', 65, 1, 'MyApp', '[]', 0, '2020-11-03 10:24:02', '2020-11-03 10:24:02', '2021-11-03 12:24:02'),
('fef68bb4b760c9209b8d3ff449edb7ccbf11db9c287b3587f70606a3f4de717f756a2e27eeb95386', 57, 1, 'MyApp', '[]', 0, '2020-11-03 09:34:32', '2020-11-03 09:34:32', '2021-11-03 11:34:32'),
('ff8dc4b5f4daaba7df6509b65c10b279fdb484a7de7c6b99130fd97645ebc59ac93a2d6a64209e39', 40, 1, 'MyApp', '[]', 0, '2020-11-03 08:34:52', '2020-11-03 08:34:52', '2021-11-03 10:34:52');

-- --------------------------------------------------------

--
-- Table structure for table `oauth_auth_codes`
--

CREATE TABLE `oauth_auth_codes` (
  `id` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `user_id` bigint(20) NOT NULL,
  `client_id` int(10) UNSIGNED NOT NULL,
  `scopes` text COLLATE utf8_unicode_ci DEFAULT NULL,
  `revoked` tinyint(1) NOT NULL,
  `expires_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `oauth_clients`
--

CREATE TABLE `oauth_clients` (
  `id` int(10) UNSIGNED NOT NULL,
  `user_id` bigint(20) DEFAULT NULL,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `secret` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `redirect` text COLLATE utf8_unicode_ci NOT NULL,
  `personal_access_client` tinyint(1) NOT NULL,
  `password_client` tinyint(1) NOT NULL,
  `revoked` tinyint(1) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `oauth_clients`
--

INSERT INTO `oauth_clients` (`id`, `user_id`, `name`, `secret`, `redirect`, `personal_access_client`, `password_client`, `revoked`, `created_at`, `updated_at`) VALUES
(1, NULL, 'Laravel Personal Access Client', '0VgXgPBlFxJh8QKLvzyp6F13AVqx4nveCcY0OgLD', 'http://localhost', 1, 0, 0, '2020-06-21 10:14:35', '2020-06-21 10:14:35'),
(2, NULL, 'Laravel Password Grant Client', 'dvLMkWVh1TYxF0H4qoZRp3nf2Zuz7rO6215PZ2zg', 'http://localhost', 0, 1, 0, '2020-06-21 10:14:35', '2020-06-21 10:14:35');

-- --------------------------------------------------------

--
-- Table structure for table `oauth_personal_access_clients`
--

CREATE TABLE `oauth_personal_access_clients` (
  `id` int(10) UNSIGNED NOT NULL,
  `client_id` int(10) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `oauth_personal_access_clients`
--

INSERT INTO `oauth_personal_access_clients` (`id`, `client_id`, `created_at`, `updated_at`) VALUES
(1, 1, '2020-06-21 10:14:35', '2020-06-21 10:14:35');

-- --------------------------------------------------------

--
-- Table structure for table `oauth_refresh_tokens`
--

CREATE TABLE `oauth_refresh_tokens` (
  `id` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `access_token_id` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `revoked` tinyint(1) NOT NULL,
  `expires_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `serial_num` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `user_id` int(11) NOT NULL DEFAULT 0,
  `branch_id` int(11) DEFAULT NULL,
  `local` tinyint(1) NOT NULL DEFAULT 0,
  `travel_type` enum('hand','car','no') COLLATE utf8_unicode_ci NOT NULL DEFAULT 'no',
  `families_Individuals` enum('families','individuals') COLLATE utf8_unicode_ci DEFAULT NULL,
  `Individuals_num` int(11) NOT NULL DEFAULT 0,
  `arrival_time` time DEFAULT NULL,
  `car_type` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `car_color` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL,
  `car_palet` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL,
  `discount` double NOT NULL DEFAULT 0,
  `copon_id` int(11) DEFAULT NULL,
  `total_price` double NOT NULL DEFAULT 0,
  `tax_price` double NOT NULL DEFAULT 0,
  `order_vat` double NOT NULL DEFAULT 0,
  `app_vat` double NOT NULL DEFAULT 0,
  `pay_type` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL,
  `ready_time` time DEFAULT NULL,
  `order_date` datetime DEFAULT NULL,
  `status` enum('submited','rejected','canceled','preparing','prepared','arrival','done') COLLATE utf8_unicode_ci NOT NULL DEFAULT 'submited',
  `is_rated` tinyint(1) NOT NULL DEFAULT 0,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`id`, `serial_num`, `user_id`, `branch_id`, `local`, `travel_type`, `families_Individuals`, `Individuals_num`, `arrival_time`, `car_type`, `car_color`, `car_palet`, `discount`, `copon_id`, `total_price`, `tax_price`, `order_vat`, `app_vat`, `pay_type`, `ready_time`, `order_date`, `status`, `is_rated`, `created_at`, `updated_at`) VALUES
(1, '202012291511', 104, 1, 0, 'hand', NULL, 0, '15:41:00', NULL, NULL, NULL, 0, NULL, 47.5, 5, 0, 0, 'cash', '15:41:00', '2020-12-29 15:11:00', 'arrival', 0, '2020-12-29 13:11:53', '2020-12-29 13:33:19'),
(2, '202012291534', 104, 1, 0, 'hand', NULL, 0, '16:04:00', NULL, NULL, NULL, 0, NULL, 47.5, 5, 5.2, 2.1, 'cash', '16:04:00', '2020-12-29 15:34:00', 'arrival', 0, '2020-12-29 13:34:55', '2020-12-29 13:52:39');

-- --------------------------------------------------------

--
-- Table structure for table `order_products`
--

CREATE TABLE `order_products` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `order_id` int(11) NOT NULL DEFAULT 0,
  `product_id` int(11) NOT NULL DEFAULT 0,
  `product_offer` enum('Product','Offer') COLLATE utf8_unicode_ci NOT NULL DEFAULT 'Product',
  `offer_discount` double NOT NULL DEFAULT 0,
  `quantity` int(11) NOT NULL DEFAULT 1,
  `price` double NOT NULL DEFAULT 0,
  `serialized_optios` text COLLATE utf8_unicode_ci DEFAULT NULL,
  `custom_requires` text COLLATE utf8_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `order_products`
--

INSERT INTO `order_products` (`id`, `order_id`, `product_id`, `product_offer`, `offer_discount`, `quantity`, `price`, `serialized_optios`, `custom_requires`, `created_at`, `updated_at`) VALUES
(1, 1, 4, 'Offer', 12.5, 1, 42.5, '[{\"id\":10,\"name\":\"\\u0646\\u0648\\u0639 \\u0627\\u0644\\u0645\\u0643\\u0631\\u0648\\u0646\\u0629\",\"product_group_option\":[{\"title\":\"\\u0646\\u062c\\u0631\\u0633\\u0643\\u0648\",\"price\":5,\"id\":24,\"quantity\":1}]},{\"id\":12,\"name\":\"\\u0646\\u0648\\u0639 \\u0627\\u0644\\u0623\\u0636\\u0627\\u0641\\u0629 \\u0627\\u0644\\u0631\\u0626\\u064a\\u0633\\u064a\\u0629\",\"product_group_option\":[{\"title\":\"\\u062a\\u0648\\u0646\\u0629\",\"price\":0,\"id\":29,\"quantity\":1}]}]', NULL, '2020-12-29 13:11:53', '2020-12-29 13:11:53'),
(2, 2, 4, 'Offer', 12.5, 1, 42.5, '[{\"id\":10,\"name\":\"\\u0646\\u0648\\u0639 \\u0627\\u0644\\u0645\\u0643\\u0631\\u0648\\u0646\\u0629\",\"product_group_option\":[{\"title\":\"\\u0646\\u062c\\u0631\\u0633\\u0643\\u0648\",\"price\":5,\"id\":24,\"quantity\":1}]},{\"id\":12,\"name\":\"\\u0646\\u0648\\u0639 \\u0627\\u0644\\u0623\\u0636\\u0627\\u0641\\u0629 \\u0627\\u0644\\u0631\\u0626\\u064a\\u0633\\u064a\\u0629\",\"product_group_option\":[{\"title\":\"\\u062a\\u0648\\u0646\\u0629\",\"price\":0,\"id\":29,\"quantity\":1}]}]', NULL, '2020-12-29 13:34:55', '2020-12-29 13:34:55');

-- --------------------------------------------------------

--
-- Table structure for table `order_ratings`
--

CREATE TABLE `order_ratings` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` int(11) NOT NULL,
  `order_id` int(11) NOT NULL,
  `rate` float NOT NULL DEFAULT 0,
  `review` text COLLATE utf8_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `pages`
--

CREATE TABLE `pages` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `title` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `body` text COLLATE utf8_unicode_ci NOT NULL,
  `show_mobile` tinyint(1) NOT NULL DEFAULT 0,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `pages`
--

INSERT INTO `pages` (`id`, `title`, `body`, `show_mobile`, `created_at`, `updated_at`) VALUES
(1, 'سياسة الخصوصية', '<p>لوريم ايبسوم دولار سيت أميت ,كونسيكتيتور أدايبا يسكينج أليايت,سيت دو أيوسمود تيمبور أنكايديديونتيوت لابوري ات دولار ماجنا أليكيوا . يوت انيم أد مينيم فينايم,كيواس نوستريد أكسير سيتاشن يللأمكو لابورأس نيسي يت أليكيوب أكس أيا كوممودو كونسيكيوات . ديواس أيوتي أريري دولار إن ريبريهينديرأيت فوليوبتاتي فيلايت أيسسي كايلليوم دولار أيو فيجايت نيولا باراياتيور. أيكسسيبتيور ساينت أوككايكات كيوبايداتات نون بروايدينت ,سيونت ان كيولبا كيو أوفيسيا ديسيريونتموليت انيم أيدي ايست لابوريوم لوريم ايبسوم دولار سيت أميت ,كونسيكتيتور أدايبا يسكينج أليايت,سيت دو أيوسمود تيمبور أنكايديديونتيوت لابوري ات دولار ماجنا أليكيوا . يوت انيم أد مينيم فينايم,كيواس نوستريد أكسير سيتاشن يللأمكو لابورأس نيسي يت أليكيوب أكس أيا كوممودو كونسيكيوات . ديواس أيوتي أريري دولار إن ريبريهينديرأيت فوليوبتاتي فيلايت أيسسي كايلليوم دولار أيو فيجايت نيولا باراياتيور. أيكسسيبتيور ساينت أوككايكات كيوبايداتات نون بروايدينت ,سيونت ان كيولبا كيو أوفيسيا ديسيريونتموليت انيم أيدي ايست لابوريوم لوريم ايبسوم دولار سيت أميت ,كونسيكتيتور أدايبا يسكينج أليايت,سيت دو أيوسمود تيمبور أنكايديديونتيوت لابوري ات دولار ماجنا أليكيوا . يوت انيم أد مينيم فينايم,كيواس نوستريد أكسير سيتاشن يللأمكو لابورأس نيسي يت أليكيوب أكس أيا كوممودو كونسيكيوات . ديواس أيوتي أريري دولار إن ريبريهينديرأيت فوليوبتاتي فيلايت أيسسي كايلليوم دولار أيو فيجايت نيولا باراياتيور. أيكسسيبتيور ساينت أوككايكات كيوبايداتات نون بروايدينت ,سيونت ان كيولبا كيو أوفيسيا ديسيريونتموليت انيم أيدي ايست لابوريوم لوريم ايبسوم دولار سيت أميت ,كونسيكتيتور أدايبا يسكينج أليايت,سيت دو أيوسمود تيمبور أنكايديديونتيوت لابوري ات دولار ماجنا أليكيوا . يوت انيم أد مينيم فينايم,كيواس نوستريد أكسير سيتاشن يللأمكو لابورأس نيسي يت أليكيوب أكس أيا كوممودو كونسيكيوات . ديواس أيوتي أريري دولار إن ريبريهينديرأيت فوليوبتاتي فيلايت أيسسي كايلليوم دولار أيو فيجايت نيولا باراياتيور. أيكسسيبتيور ساينت أوككايكات كيوبايداتات نون بروايدينت ,سيونت ان كيولبا كيو أوفيسيا ديسيريونتموليت انيم أيدي ايست لابوريوم لوريم ايبسوم دولار سيت أميت ,كونسيكتيتور أدايبا يسكينج أليايت,سيت دو أيوسمود تيمبور أنكايديديونتيوت لابوري ات دولار ماجنا أليكيوا . يوت انيم أد مينيم فينايم,كيواس نوستريد أكسير سيتاشن يللأمكو لابورأس نيسي يت أليكيوب أكس أيا كوممودو كونسيكيوات . ديواس أيوتي أريري دولار إن ريبريهينديرأيت فوليوبتاتي فيلايت أيسسي كايلليوم دولار أيو فيجايت نيولا باراياتيور. أيكسسيبتيور ساينت أوككايكات كيوبايداتات نون بروايدينت ,سيونت ان كيولبا كيو أوفيسيا ديسيريونتموليت انيم أيدي ايست لابوريوم لوريم ايبسوم دولار سيت أميت ,كونسيكتيتور أدايبا يسكينج أليايت,سيت دو أيوسمود تيمبور أنكايديديونتيوت لابوري ات دولار ماجنا أليكيوا . يوت انيم أد مينيم فينايم,كيواس نوستريد أكسير سيتاشن يللأمكو لابورأس نيسي يت أليكيوب أكس أيا كوممودو كونسيكيوات . ديواس أيوتي أريري دولار إن ريبريهينديرأيت فوليوبتاتي فيلايت أيسسي كايلليوم دولار أيو فيجايت نيولا باراياتيور. أيكسسيبتيور ساينت أوككايكات كيوبايداتات نون بروايدينت ,سيونت ان كيولبا كيو أوفيسيا ديسيريونتموليت انيم أيدي ايست لابوريوم لوريم ايبسوم دولار سيت أميت ,كونسيكتيتور أدايبا يسكينج أليايت,سيت دو أيوسمود تيمبور أنكايديديونتيوت لابوري ات دولار ماجنا أليكيوا . يوت انيم أد مينيم فينايم,كيواس نوستريد أكسير سيتاشن يللأمكو لابورأس نيسي يت أليكيوب أكس أيا كوممودو كونسيكيوات . ديواس أيوتي أريري دولار إن ريبريهينديرأيت فوليوبتاتي فيلايت أيسسي كايلليوم دولار أيو فيجايت نيولا باراياتيور. أيكسسيبتيور ساينت أوككايكات كيوبايداتات نون بروايدينت ,سيونت ان كيولبا كيو أوفيسيا ديسيريونتموليت انيم أيدي ايست لابوريوم</p>', 0, '2020-11-25 09:13:17', '2020-12-21 12:43:02'),
(2, 'الشروط والأحكام', '<p>لوريم ايبسوم دولار سيت أميت ,كونسيكتيتور أدايبا يسكينج أليايت,سيت دو أيوسمود تيمبور أنكايديديونتيوت لابوري ات دولار ماجنا أليكيوا . يوت انيم أد مينيم فينايم,كيواس نوستريد أكسير سيتاشن يللأمكو لابورأس نيسي يت أليكيوب أكس أيا كوممودو كونسيكيوات . ديواس أيوتي أريري دولار إن ريبريهينديرأيت فوليوبتاتي فيلايت أيسسي كايلليوم دولار أيو فيجايت نيولا باراياتيور. أيكسسيبتيور ساينت أوككايكات كيوبايداتات نون بروايدينت ,سيونت ان كيولبا كيو أوفيسيا ديسيريونتموليت انيم أيدي ايست لابوريوم لوريم ايبسوم دولار سيت أميت ,كونسيكتيتور أدايبا يسكينج أليايت,سيت دو أيوسمود تيمبور أنكايديديونتيوت لابوري ات دولار ماجنا أليكيوا . يوت انيم أد مينيم فينايم,كيواس نوستريد أكسير سيتاشن يللأمكو لابورأس نيسي يت أليكيوب أكس أيا كوممودو كونسيكيوات . ديواس أيوتي أريري دولار إن ريبريهينديرأيت فوليوبتاتي فيلايت أيسسي كايلليوم دولار أيو فيجايت نيولا باراياتيور. أيكسسيبتيور ساينت أوككايكات كيوبايداتات نون بروايدينت ,سيونت ان كيولبا كيو أوفيسيا ديسيريونتموليت انيم أيدي ايست لابوريوم لوريم ايبسوم دولار سيت أميت ,كونسيكتيتور أدايبا يسكينج أليايت,سيت دو أيوسمود تيمبور أنكايديديونتيوت لابوري ات دولار ماجنا أليكيوا . يوت انيم أد مينيم فينايم,كيواس نوستريد أكسير سيتاشن يللأمكو لابورأس نيسي يت أليكيوب أكس أيا كوممودو كونسيكيوات . ديواس أيوتي أريري دولار إن ريبريهينديرأيت فوليوبتاتي فيلايت أيسسي كايلليوم دولار أيو فيجايت نيولا باراياتيور. أيكسسيبتيور ساينت أوككايكات كيوبايداتات نون بروايدينت ,سيونت ان كيولبا كيو أوفيسيا ديسيريونتموليت انيم أيدي ايست لابوريوم لوريم ايبسوم دولار سيت أميت ,كونسيكتيتور أدايبا يسكينج أليايت,سيت دو أيوسمود تيمبور أنكايديديونتيوت لابوري ات دولار ماجنا أليكيوا . يوت انيم أد مينيم فينايم,كيواس نوستريد أكسير سيتاشن يللأمكو لابورأس نيسي يت أليكيوب أكس أيا كوممودو كونسيكيوات . ديواس أيوتي أريري دولار إن ريبريهينديرأيت فوليوبتاتي فيلايت أيسسي كايلليوم دولار أيو فيجايت نيولا باراياتيور. أيكسسيبتيور ساينت أوككايكات كيوبايداتات نون بروايدينت ,سيونت ان كيولبا كيو أوفيسيا ديسيريونتموليت انيم أيدي ايست لابوريوم لوريم ايبسوم دولار سيت أميت ,كونسيكتيتور أدايبا يسكينج أليايت,سيت دو أيوسمود تيمبور أنكايديديونتيوت لابوري ات دولار ماجنا أليكيوا . يوت انيم أد مينيم فينايم,كيواس نوستريد أكسير سيتاشن يللأمكو لابورأس نيسي يت أليكيوب أكس أيا كوممودو كونسيكيوات . ديواس أيوتي أريري دولار إن ريبريهينديرأيت فوليوبتاتي فيلايت أيسسي كايلليوم دولار أيو فيجايت نيولا باراياتيور. أيكسسيبتيور ساينت أوككايكات كيوبايداتات نون بروايدينت ,سيونت ان كيولبا كيو أوفيسيا ديسيريونتموليت انيم أيدي ايست لابوريوم لوريم ايبسوم دولار سيت أميت ,كونسيكتيتور أدايبا يسكينج أليايت,سيت دو أيوسمود تيمبور أنكايديديونتيوت لابوري ات دولار ماجنا أليكيوا . يوت انيم أد مينيم فينايم,كيواس نوستريد أكسير سيتاشن يللأمكو لابورأس نيسي يت أليكيوب أكس أيا كوممودو كونسيكيوات . ديواس أيوتي أريري دولار إن ريبريهينديرأيت فوليوبتاتي فيلايت أيسسي كايلليوم دولار أيو فيجايت نيولا باراياتيور. أيكسسيبتيور ساينت أوككايكات كيوبايداتات نون بروايدينت ,سيونت ان كيولبا كيو أوفيسيا ديسيريونتموليت انيم أيدي ايست لابوريوم لوريم ايبسوم دولار سيت أميت ,كونسيكتيتور أدايبا يسكينج أليايت,سيت دو أيوسمود تيمبور أنكايديديونتيوت لابوري ات دولار ماجنا أليكيوا . يوت انيم أد مينيم فينايم,كيواس نوستريد أكسير سيتاشن يللأمكو لابورأس نيسي يت أليكيوب أكس أيا كوممودو كونسيكيوات . ديواس أيوتي أريري دولار إن ريبريهينديرأيت فوليوبتاتي فيلايت أيسسي كايلليوم دولار أيو فيجايت نيولا باراياتيور. أيكسسيبتيور ساينت أوككايكات كيوبايداتات نون بروايدينت ,سيونت ان كيولبا كيو أوفيسيا ديسيريونتموليت انيم أيدي ايست لابوريوم</p>', 1, '2020-11-25 09:13:17', '2020-11-25 09:13:17'),
(4, 'الشروط والأحكام', '<p>لوريم ايبسوم دولار سيت أميت ,كونسيكتيتور أدايبا يسكينج أليايت,سيت دو أيوسمود تيمبور أنكايديديونتيوت لابوري ات دولار ماجنا أليكيوا . يوت انيم أد مينيم فينايم,كيواس نوستريد أكسير سيتاشن يللأمكو لابورأس نيسي يت أليكيوب أكس أيا كوممودو كونسيكيوات . ديواس أيوتي أريري دولار إن ريبريهينديرأيت فوليوبتاتي فيلايت أيسسي كايلليوم دولار أيو فيجايت نيولا باراياتيور. أيكسسيبتيور ساينت أوككايكات كيوبايداتات نون بروايدينت ,سيونت ان كيولبا كيو أوفيسيا ديسيريونتموليت انيم أيدي ايست لابوريوم لوريم ايبسوم دولار سيت أميت ,كونسيكتيتور أدايبا يسكينج أليايت,سيت دو أيوسمود تيمبور أنكايديديونتيوت لابوري ات دولار ماجنا أليكيوا . يوت انيم أد مينيم فينايم,كيواس نوستريد أكسير سيتاشن يللأمكو لابورأس نيسي يت أليكيوب أكس أيا كوممودو كونسيكيوات . ديواس أيوتي أريري دولار إن ريبريهينديرأيت فوليوبتاتي فيلايت أيسسي كايلليوم دولار أيو فيجايت نيولا باراياتيور. أيكسسيبتيور ساينت أوككايكات كيوبايداتات نون بروايدينت ,سيونت ان كيولبا كيو أوفيسيا ديسيريونتموليت انيم أيدي ايست لابوريوم لوريم ايبسوم دولار سيت أميت ,كونسيكتيتور أدايبا يسكينج أليايت,سيت دو أيوسمود تيمبور أنكايديديونتيوت لابوري ات دولار ماجنا أليكيوا . يوت انيم أد مينيم فينايم,كيواس نوستريد أكسير سيتاشن يللأمكو لابورأس نيسي يت أليكيوب أكس أيا كوممودو كونسيكيوات . ديواس أيوتي أريري دولار إن ريبريهينديرأيت فوليوبتاتي فيلايت أيسسي كايلليوم دولار أيو فيجايت نيولا باراياتيور. أيكسسيبتيور ساينت أوككايكات كيوبايداتات نون بروايدينت ,سيونت ان كيولبا كيو أوفيسيا ديسيريونتموليت انيم أيدي ايست لابوريوم لوريم ايبسوم دولار سيت أميت ,كونسيكتيتور أدايبا يسكينج أليايت,سيت دو أيوسمود تيمبور أنكايديديونتيوت لابوري ات دولار ماجنا أليكيوا . يوت انيم أد مينيم فينايم,كيواس نوستريد أكسير سيتاشن يللأمكو لابورأس نيسي يت أليكيوب أكس أيا كوممودو كونسيكيوات . ديواس أيوتي أريري دولار إن ريبريهينديرأيت فوليوبتاتي فيلايت أيسسي كايلليوم دولار أيو فيجايت نيولا باراياتيور. أيكسسيبتيور ساينت أوككايكات كيوبايداتات نون بروايدينت ,سيونت ان كيولبا كيو أوفيسيا ديسيريونتموليت انيم أيدي ايست لابوريوم لوريم ايبسوم دولار سيت أميت ,كونسيكتيتور أدايبا يسكينج أليايت,سيت دو أيوسمود تيمبور أنكايديديونتيوت لابوري ات دولار ماجنا أليكيوا . يوت انيم أد مينيم فينايم,كيواس نوستريد أكسير سيتاشن يللأمكو لابورأس نيسي يت أليكيوب أكس أيا كوممودو كونسيكيوات . ديواس أيوتي أريري دولار إن ريبريهينديرأيت فوليوبتاتي فيلايت أيسسي كايلليوم دولار أيو فيجايت نيولا باراياتيور. أيكسسيبتيور ساينت أوككايكات كيوبايداتات نون بروايدينت ,سيونت ان كيولبا كيو أوفيسيا ديسيريونتموليت انيم أيدي ايست لابوريوم لوريم ايبسوم دولار سيت أميت ,كونسيكتيتور أدايبا يسكينج أليايت,سيت دو أيوسمود تيمبور أنكايديديونتيوت لابوري ات دولار ماجنا أليكيوا . يوت انيم أد مينيم فينايم,كيواس نوستريد أكسير سيتاشن يللأمكو لابورأس نيسي يت أليكيوب أكس أيا كوممودو كونسيكيوات . ديواس أيوتي أريري دولار إن ريبريهينديرأيت فوليوبتاتي فيلايت أيسسي كايلليوم دولار أيو فيجايت نيولا باراياتيور. أيكسسيبتيور ساينت أوككايكات كيوبايداتات نون بروايدينت ,سيونت ان كيولبا كيو أوفيسيا ديسيريونتموليت انيم أيدي ايست لابوريوم لوريم ايبسوم دولار سيت أميت ,كونسيكتيتور أدايبا يسكينج أليايت,سيت دو أيوسمود تيمبور أنكايديديونتيوت لابوري ات دولار ماجنا أليكيوا . يوت انيم أد مينيم فينايم,كيواس نوستريد أكسير سيتاشن يللأمكو لابورأس نيسي يت أليكيوب أكس أيا كوممودو كونسيكيوات . ديواس أيوتي أريري دولار إن ريبريهينديرأيت فوليوبتاتي فيلايت أيسسي كايلليوم دولار أيو فيجايت نيولا باراياتيور. أيكسسيبتيور ساينت أوككايكات كيوبايداتات نون بروايدينت ,سيونت ان كيولبا كيو أوفيسيا ديسيريونتموليت انيم أيدي ايست لابوريوم</p>', 0, '2020-11-25 09:13:17', '2020-11-25 09:13:17');

-- --------------------------------------------------------

--
-- Table structure for table `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `permissions`
--

CREATE TABLE `permissions` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `guard_name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `permissions`
--

INSERT INTO `permissions` (`id`, `name`, `guard_name`, `created_at`, `updated_at`) VALUES
(1, 'FollowersController_store', 'web', '2020-12-20 09:30:12', '2020-12-20 09:30:12'),
(2, 'AdminIndexController_forbidden', 'web', '2020-12-20 09:30:12', '2020-12-20 09:30:12'),
(3, 'AdminIndexController_index', 'web', '2020-12-20 09:30:12', '2020-12-20 09:30:12'),
(4, 'AdminIndexController_getLabelsYearly', 'web', '2020-12-20 09:30:12', '2020-12-20 09:30:12'),
(5, 'AdminIndexController_getLabelsMonthly', 'web', '2020-12-20 09:30:12', '2020-12-20 09:30:12'),
(6, 'AdminIndexController_getLabelsWeekly', 'web', '2020-12-20 09:30:12', '2020-12-20 09:30:12'),
(7, 'AdminIndexController_getLabelsDaily', 'web', '2020-12-20 09:30:12', '2020-12-20 09:30:12'),
(8, 'UsersController_getUsersMonthly', 'web', '2020-12-20 09:30:13', '2020-12-20 09:30:13'),
(9, 'UsersController_getUsersDaily', 'web', '2020-12-20 09:30:13', '2020-12-20 09:30:13'),
(10, 'UsersController_getUsersWeekly', 'web', '2020-12-20 09:30:13', '2020-12-20 09:30:13'),
(11, 'UsersController_getUsersYearly', 'web', '2020-12-20 09:30:13', '2020-12-20 09:30:13'),
(12, 'RestorantsController_getRestorantsYearly', 'web', '2020-12-20 09:30:13', '2020-12-20 09:30:13'),
(13, 'RestorantsController_getRestorantsWeekly', 'web', '2020-12-20 09:30:13', '2020-12-20 09:30:13'),
(14, 'RestorantsController_getRestorantsMonthly', 'web', '2020-12-20 09:30:13', '2020-12-20 09:30:13'),
(15, 'RestorantsController_getRestorantsDaily', 'web', '2020-12-20 09:30:13', '2020-12-20 09:30:13'),
(16, 'BranchesController_getBranchesYearly', 'web', '2020-12-20 09:30:13', '2020-12-20 09:30:13'),
(17, 'BranchesController_getBranchesMonthly', 'web', '2020-12-20 09:30:13', '2020-12-20 09:30:13'),
(18, 'BranchesController_getBranchesWeekly', 'web', '2020-12-20 09:30:13', '2020-12-20 09:30:13'),
(19, 'BranchesController_getBranchesDaily', 'web', '2020-12-20 09:30:13', '2020-12-20 09:30:13'),
(20, 'MealsController_storeFromRestorant', 'web', '2020-12-20 09:30:13', '2020-12-20 09:30:13'),
(21, 'UsersController_editRestorantUser', 'web', '2020-12-20 09:30:13', '2020-12-20 09:30:13'),
(22, 'UsersController_updateRestorantUser', 'web', '2020-12-20 09:30:13', '2020-12-20 09:30:13'),
(23, 'ProductsController_creatFromRestorant', 'web', '2020-12-20 09:30:13', '2020-12-20 09:30:13'),
(24, 'ProductsController_creatFromBranch', 'web', '2020-12-20 09:30:13', '2020-12-20 09:30:13'),
(25, 'BranchesController_creatBranchFromRestorant', 'web', '2020-12-20 09:30:13', '2020-12-20 09:30:13'),
(26, 'ProductsController_storeFromRestorant', 'web', '2020-12-20 09:30:13', '2020-12-20 09:30:13'),
(27, 'ProductsController_storeFromBranch', 'web', '2020-12-20 09:30:13', '2020-12-20 09:30:13'),
(28, 'UsersController_addRestorantEmployee', 'web', '2020-12-20 09:30:13', '2020-12-20 09:30:13'),
(29, 'UsersController_storeRestorantEmployee', 'web', '2020-12-20 09:30:13', '2020-12-20 09:30:13'),
(30, 'ClientsController_index', 'web', '2020-12-20 09:30:13', '2020-12-20 09:30:13'),
(31, 'ClientsController_create', 'web', '2020-12-20 09:30:13', '2020-12-20 09:30:13'),
(32, 'ClientsController_store', 'web', '2020-12-20 09:30:13', '2020-12-20 09:30:13'),
(33, 'ClientsController_show', 'web', '2020-12-20 09:30:13', '2020-12-20 09:30:13'),
(34, 'ClientsController_edit', 'web', '2020-12-20 09:30:13', '2020-12-20 09:30:13'),
(35, 'ClientsController_update', 'web', '2020-12-20 09:30:13', '2020-12-20 09:30:13'),
(36, 'ClientsController_destroy', 'web', '2020-12-20 09:30:13', '2020-12-20 09:30:13'),
(37, 'UsersController_index', 'web', '2020-12-20 09:30:14', '2020-12-20 09:30:14'),
(38, 'UsersController_create', 'web', '2020-12-20 09:30:14', '2020-12-20 09:30:14'),
(39, 'UsersController_store', 'web', '2020-12-20 09:30:14', '2020-12-20 09:30:14'),
(40, 'UsersController_show', 'web', '2020-12-20 09:30:14', '2020-12-20 09:30:14'),
(41, 'UsersController_edit', 'web', '2020-12-20 09:30:14', '2020-12-20 09:30:14'),
(42, 'UsersController_update', 'web', '2020-12-20 09:30:14', '2020-12-20 09:30:14'),
(43, 'UsersController_destroy', 'web', '2020-12-20 09:30:14', '2020-12-20 09:30:14'),
(44, 'PagesController_index', 'web', '2020-12-20 09:30:14', '2020-12-20 09:30:14'),
(45, 'PagesController_create', 'web', '2020-12-20 09:30:14', '2020-12-20 09:30:14'),
(46, 'PagesController_store', 'web', '2020-12-20 09:30:14', '2020-12-20 09:30:14'),
(47, 'PagesController_show', 'web', '2020-12-20 09:30:14', '2020-12-20 09:30:14'),
(48, 'PagesController_edit', 'web', '2020-12-20 09:30:14', '2020-12-20 09:30:14'),
(49, 'PagesController_update', 'web', '2020-12-20 09:30:14', '2020-12-20 09:30:14'),
(50, 'PagesController_destroy', 'web', '2020-12-20 09:30:14', '2020-12-20 09:30:14'),
(51, 'FaqController_index', 'web', '2020-12-20 09:30:14', '2020-12-20 09:30:14'),
(52, 'FaqController_create', 'web', '2020-12-20 09:30:14', '2020-12-20 09:30:14'),
(53, 'FaqController_store', 'web', '2020-12-20 09:30:14', '2020-12-20 09:30:14'),
(54, 'FaqController_show', 'web', '2020-12-20 09:30:14', '2020-12-20 09:30:14'),
(55, 'FaqController_edit', 'web', '2020-12-20 09:30:14', '2020-12-20 09:30:14'),
(56, 'FaqController_update', 'web', '2020-12-20 09:30:14', '2020-12-20 09:30:14'),
(57, 'FaqController_destroy', 'web', '2020-12-20 09:30:14', '2020-12-20 09:30:14'),
(58, 'AreasController_index', 'web', '2020-12-20 09:30:14', '2020-12-20 09:30:14'),
(59, 'AreasController_create', 'web', '2020-12-20 09:30:15', '2020-12-20 09:30:15'),
(60, 'AreasController_store', 'web', '2020-12-20 09:30:15', '2020-12-20 09:30:15'),
(61, 'AreasController_show', 'web', '2020-12-20 09:30:15', '2020-12-20 09:30:15'),
(62, 'AreasController_edit', 'web', '2020-12-20 09:30:15', '2020-12-20 09:30:15'),
(63, 'AreasController_update', 'web', '2020-12-20 09:30:15', '2020-12-20 09:30:15'),
(64, 'AreasController_destroy', 'web', '2020-12-20 09:30:15', '2020-12-20 09:30:15'),
(65, 'BranchesController_index', 'web', '2020-12-20 09:30:15', '2020-12-20 09:30:15'),
(66, 'BranchesController_create', 'web', '2020-12-20 09:30:15', '2020-12-20 09:30:15'),
(67, 'BranchesController_store', 'web', '2020-12-20 09:30:15', '2020-12-20 09:30:15'),
(68, 'BranchesController_show', 'web', '2020-12-20 09:30:15', '2020-12-20 09:30:15'),
(69, 'BranchesController_edit', 'web', '2020-12-20 09:30:15', '2020-12-20 09:30:15'),
(70, 'BranchesController_update', 'web', '2020-12-20 09:30:15', '2020-12-20 09:30:15'),
(71, 'BranchesController_destroy', 'web', '2020-12-20 09:30:15', '2020-12-20 09:30:15'),
(72, 'CategoriesController_index', 'web', '2020-12-20 09:30:15', '2020-12-20 09:30:15'),
(73, 'CategoriesController_create', 'web', '2020-12-20 09:30:15', '2020-12-20 09:30:15'),
(74, 'CategoriesController_store', 'web', '2020-12-20 09:30:15', '2020-12-20 09:30:15'),
(75, 'CategoriesController_show', 'web', '2020-12-20 09:30:15', '2020-12-20 09:30:15'),
(76, 'CategoriesController_edit', 'web', '2020-12-20 09:30:15', '2020-12-20 09:30:15'),
(77, 'CategoriesController_update', 'web', '2020-12-20 09:30:15', '2020-12-20 09:30:15'),
(78, 'CategoriesController_destroy', 'web', '2020-12-20 09:30:15', '2020-12-20 09:30:15'),
(79, 'FeaturesController_index', 'web', '2020-12-20 09:30:16', '2020-12-20 09:30:16'),
(80, 'FeaturesController_create', 'web', '2020-12-20 09:30:16', '2020-12-20 09:30:16'),
(81, 'FeaturesController_store', 'web', '2020-12-20 09:30:16', '2020-12-20 09:30:16'),
(82, 'FeaturesController_show', 'web', '2020-12-20 09:30:16', '2020-12-20 09:30:16'),
(83, 'FeaturesController_edit', 'web', '2020-12-20 09:30:16', '2020-12-20 09:30:16'),
(84, 'FeaturesController_update', 'web', '2020-12-20 09:30:16', '2020-12-20 09:30:16'),
(85, 'FeaturesController_destroy', 'web', '2020-12-20 09:30:16', '2020-12-20 09:30:16'),
(86, 'ComplaintsController_index', 'web', '2020-12-20 09:30:16', '2020-12-20 09:30:16'),
(87, 'ComplaintsController_create', 'web', '2020-12-20 09:30:16', '2020-12-20 09:30:16'),
(88, 'ComplaintsController_store', 'web', '2020-12-20 09:30:16', '2020-12-20 09:30:16'),
(89, 'ComplaintsController_show', 'web', '2020-12-20 09:30:16', '2020-12-20 09:30:16'),
(90, 'ComplaintsController_edit', 'web', '2020-12-20 09:30:16', '2020-12-20 09:30:16'),
(91, 'ComplaintsController_update', 'web', '2020-12-20 09:30:16', '2020-12-20 09:30:16'),
(92, 'ComplaintsController_destroy', 'web', '2020-12-20 09:30:16', '2020-12-20 09:30:16'),
(93, 'DiscountCobonsController_index', 'web', '2020-12-20 09:30:16', '2020-12-20 09:30:16'),
(94, 'DiscountCobonsController_create', 'web', '2020-12-20 09:30:16', '2020-12-20 09:30:16'),
(95, 'DiscountCobonsController_store', 'web', '2020-12-20 09:30:16', '2020-12-20 09:30:16'),
(96, 'DiscountCobonsController_show', 'web', '2020-12-20 09:30:16', '2020-12-20 09:30:16'),
(97, 'DiscountCobonsController_edit', 'web', '2020-12-20 09:30:16', '2020-12-20 09:30:16'),
(98, 'DiscountCobonsController_update', 'web', '2020-12-20 09:30:16', '2020-12-20 09:30:16'),
(99, 'DiscountCobonsController_destroy', 'web', '2020-12-20 09:30:16', '2020-12-20 09:30:16'),
(100, 'MealsController_index', 'web', '2020-12-20 09:30:16', '2020-12-20 09:30:16'),
(101, 'MealsController_create', 'web', '2020-12-20 09:30:17', '2020-12-20 09:30:17'),
(102, 'MealsController_store', 'web', '2020-12-20 09:30:17', '2020-12-20 09:30:17'),
(103, 'MealsController_show', 'web', '2020-12-20 09:30:17', '2020-12-20 09:30:17'),
(104, 'MealsController_edit', 'web', '2020-12-20 09:30:17', '2020-12-20 09:30:17'),
(105, 'MealsController_update', 'web', '2020-12-20 09:30:17', '2020-12-20 09:30:17'),
(106, 'MealsController_destroy', 'web', '2020-12-20 09:30:17', '2020-12-20 09:30:17'),
(107, 'OrdersController_index', 'web', '2020-12-20 09:30:17', '2020-12-20 09:30:17'),
(108, 'OrdersController_create', 'web', '2020-12-20 09:30:17', '2020-12-20 09:30:17'),
(109, 'OrdersController_store', 'web', '2020-12-20 09:30:17', '2020-12-20 09:30:17'),
(110, 'OrdersController_show', 'web', '2020-12-20 09:30:17', '2020-12-20 09:30:17'),
(111, 'OrdersController_edit', 'web', '2020-12-20 09:30:17', '2020-12-20 09:30:17'),
(112, 'OrdersController_update', 'web', '2020-12-20 09:30:17', '2020-12-20 09:30:17'),
(113, 'OrdersController_destroy', 'web', '2020-12-20 09:30:17', '2020-12-20 09:30:17'),
(114, 'OrdersController_branchOrders', 'web', '2020-12-20 09:30:17', '2020-12-20 09:30:17'),
(115, 'ProductsController_index', 'web', '2020-12-20 09:30:17', '2020-12-20 09:30:17'),
(116, 'ProductsController_create', 'web', '2020-12-20 09:30:17', '2020-12-20 09:30:17'),
(117, 'ProductsController_store', 'web', '2020-12-20 09:30:17', '2020-12-20 09:30:17'),
(118, 'ProductsController_show', 'web', '2020-12-20 09:30:17', '2020-12-20 09:30:17'),
(119, 'ProductsController_edit', 'web', '2020-12-20 09:30:17', '2020-12-20 09:30:17'),
(120, 'ProductsController_update', 'web', '2020-12-20 09:30:17', '2020-12-20 09:30:17'),
(121, 'ProductsController_destroy', 'web', '2020-12-20 09:30:17', '2020-12-20 09:30:17'),
(122, 'RatingsController_index', 'web', '2020-12-20 09:30:17', '2020-12-20 09:30:17'),
(123, 'RatingsController_create', 'web', '2020-12-20 09:30:17', '2020-12-20 09:30:17'),
(124, 'RatingsController_store', 'web', '2020-12-20 09:30:17', '2020-12-20 09:30:17'),
(125, 'RatingsController_show', 'web', '2020-12-20 09:30:17', '2020-12-20 09:30:17'),
(126, 'RatingsController_edit', 'web', '2020-12-20 09:30:18', '2020-12-20 09:30:18'),
(127, 'RatingsController_update', 'web', '2020-12-20 09:30:18', '2020-12-20 09:30:18'),
(128, 'RatingsController_destroy', 'web', '2020-12-20 09:30:18', '2020-12-20 09:30:18'),
(129, 'RegionsController_index', 'web', '2020-12-20 09:30:18', '2020-12-20 09:30:18'),
(130, 'RegionsController_create', 'web', '2020-12-20 09:30:18', '2020-12-20 09:30:18'),
(131, 'RegionsController_store', 'web', '2020-12-20 09:30:18', '2020-12-20 09:30:18'),
(132, 'RegionsController_show', 'web', '2020-12-20 09:30:18', '2020-12-20 09:30:18'),
(133, 'RegionsController_edit', 'web', '2020-12-20 09:30:18', '2020-12-20 09:30:18'),
(134, 'RegionsController_update', 'web', '2020-12-20 09:30:18', '2020-12-20 09:30:18'),
(135, 'RegionsController_destroy', 'web', '2020-12-20 09:30:18', '2020-12-20 09:30:18'),
(136, 'RestorantsController_index', 'web', '2020-12-20 09:30:18', '2020-12-20 09:30:18'),
(137, 'RestorantsController_create', 'web', '2020-12-20 09:30:18', '2020-12-20 09:30:18'),
(138, 'RestorantsController_store', 'web', '2020-12-20 09:30:18', '2020-12-20 09:30:18'),
(139, 'RestorantsController_show', 'web', '2020-12-20 09:30:18', '2020-12-20 09:30:18'),
(140, 'RestorantsController_edit', 'web', '2020-12-20 09:30:18', '2020-12-20 09:30:18'),
(141, 'RestorantsController_update', 'web', '2020-12-20 09:30:18', '2020-12-20 09:30:18'),
(142, 'RestorantsController_destroy', 'web', '2020-12-20 09:30:18', '2020-12-20 09:30:18'),
(143, 'RestorantsController_updatePriority', 'web', '2020-12-20 09:30:18', '2020-12-20 09:30:18'),
(144, 'TypesController_index', 'web', '2020-12-20 09:30:18', '2020-12-20 09:30:18'),
(145, 'TypesController_create', 'web', '2020-12-20 09:30:18', '2020-12-20 09:30:18'),
(146, 'TypesController_store', 'web', '2020-12-20 09:30:18', '2020-12-20 09:30:18'),
(147, 'TypesController_show', 'web', '2020-12-20 09:30:18', '2020-12-20 09:30:18'),
(148, 'TypesController_edit', 'web', '2020-12-20 09:30:18', '2020-12-20 09:30:18'),
(149, 'TypesController_update', 'web', '2020-12-20 09:30:18', '2020-12-20 09:30:18'),
(150, 'TypesController_destroy', 'web', '2020-12-20 09:30:18', '2020-12-20 09:30:18'),
(151, 'settingsController_index', 'web', '2020-12-20 09:30:18', '2020-12-20 09:30:18'),
(152, 'settingsController_create', 'web', '2020-12-20 09:30:19', '2020-12-20 09:30:19'),
(153, 'settingsController_store', 'web', '2020-12-20 09:30:19', '2020-12-20 09:30:19'),
(154, 'settingsController_show', 'web', '2020-12-20 09:30:19', '2020-12-20 09:30:19'),
(155, 'settingsController_edit', 'web', '2020-12-20 09:30:19', '2020-12-20 09:30:19'),
(156, 'settingsController_update', 'web', '2020-12-20 09:30:19', '2020-12-20 09:30:19'),
(157, 'settingsController_destroy', 'web', '2020-12-20 09:30:19', '2020-12-20 09:30:19'),
(158, 'ProductsController_synkBranches', 'web', '2020-12-20 09:30:19', '2020-12-20 09:30:19'),
(159, 'ProductsController_storeOffer', 'web', '2020-12-20 09:30:19', '2020-12-20 09:30:19'),
(160, 'ProductsController_updateOffer', 'web', '2020-12-20 09:30:19', '2020-12-20 09:30:19'),
(161, 'ProductsController_deleteOffer', 'web', '2020-12-20 09:30:19', '2020-12-20 09:30:19'),
(162, 'ProductsController_EditOffer', 'web', '2020-12-20 09:30:19', '2020-12-20 09:30:19'),
(163, 'BranchesController_getBranchesWithPages', 'web', '2020-12-20 09:30:19', '2020-12-20 09:30:19'),
(164, 'ProductsController_getProductsByMealId', 'web', '2020-12-20 09:30:19', '2020-12-20 09:30:19'),
(165, 'ProductsController_getProductsByMealIdForAddOffer', 'web', '2020-12-20 09:30:20', '2020-12-20 09:30:20'),
(166, 'BranchesController_imageuploads', 'web', '2020-12-20 09:30:20', '2020-12-20 09:30:20'),
(167, 'BranchesController_imageuploadsdelete', 'web', '2020-12-20 09:30:20', '2020-12-20 09:30:20'),
(168, 'BranchesController_getuploadedimages', 'web', '2020-12-20 09:30:20', '2020-12-20 09:30:20'),
(169, 'BranchesController_ajaxChangeBusyStatus', 'web', '2020-12-20 09:30:20', '2020-12-20 09:30:20'),
(170, 'ProductsController_makeBranchProductUnAvailable', 'web', '2020-12-20 09:30:20', '2020-12-20 09:30:20'),
(171, 'OrdersController_getOrdersYearly', 'web', '2021-01-24 08:40:28', '2021-01-24 08:40:28'),
(172, 'OrdersController_getOrdersMonthly', 'web', '2021-01-24 08:40:28', '2021-01-24 08:40:28'),
(173, 'OrdersController_getOrdersWeekly', 'web', '2021-01-24 08:40:28', '2021-01-24 08:40:28'),
(174, 'OrdersController_getOrdersDaily', 'web', '2021-01-24 08:40:28', '2021-01-24 08:40:28'),
(175, 'OrdersController_getClientsArivals', 'web', '2021-01-24 08:40:28', '2021-01-24 08:40:28'),
(176, 'ProductsController_generatePDF', 'web', '2021-01-24 08:40:29', '2021-01-24 08:40:29');

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `photo` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `restorant_id` int(11) NOT NULL DEFAULT 0,
  `name` varchar(150) COLLATE utf8_unicode_ci DEFAULT NULL,
  `description` text COLLATE utf8_unicode_ci DEFAULT NULL,
  `price` double NOT NULL DEFAULT 0,
  `ready_in` int(11) NOT NULL DEFAULT 1,
  `ready_to` int(11) NOT NULL DEFAULT 1,
  `max_additional_options` int(11) NOT NULL DEFAULT 1,
  `front_quantity` int(11) NOT NULL DEFAULT 0,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`id`, `photo`, `restorant_id`, `name`, `description`, `price`, `ready_in`, `ready_to`, `max_additional_options`, `front_quantity`, `created_at`, `updated_at`) VALUES
(2, 'images/product/2/photo/download.jpg', 2, 'كريب كبده سوبر', 'كريب كبدة سوبر من الشبراوي بأضافات الشبراوي الشهية ذا خبرة السنوات الطويلة.', 50, 1, 2, 3, 0, '2020-09-28 08:51:14', '2020-12-10 11:29:48'),
(3, 'images/product/3/photo/food10.png', 2, 'كريب بوم فريت سوبر', 'كريب بوم فريت سوبر من الشبراوي بأضافات الشبراوي ذات خبرة السنوات العديده في مجال الأكلات المتنوعة.', 20, 15, 20, 2, 0, '2020-09-28 09:03:17', '2020-09-28 09:03:17'),
(4, 'images/product/4/photo/61-619294_spaghetti-transparent-seafood-pasta-png-png-download.png', 2, 'باستا سوبر', 'باستا سوبر من الشبراوي تتميز بالطعم الفرنسي ذات الجود العاليه بأضافات من الشبراوي ذات خبرة السنوات تعطي لها طعم لا مثيل له فى علم الباستا .', 50, 20, 40, 3, 0, '2020-09-28 09:19:22', '2020-09-28 09:19:22'),
(5, 'images/product/5/photo/Chicken_Shawerma_Fat_637124642067799091.jpg', 2, 'فتة شاورما', 'فتة شاورما سوري من الشبراوي تتميز بالطعم السوري مع أضافات الشبراوي ذات الخبره العريقة.', 50, 15, 20, 7, 0, '2020-10-01 10:15:48', '2020-10-01 10:15:48'),
(6, 'images/product/6/photo/fdgdfg.jpeg', 2, 'فاهيا دجاج', 'فاهيتا دجاج من الشبراوي بنكهات مميزه ذات الخبره العريقه من الشبراوي.', 100, 20, 25, 4, 0, '2020-10-04 12:37:25', '2020-10-04 12:37:25'),
(8, 'images/product/8/photo/825.png', 6, 'كيس شيبسي خل وملح', 'كيس شيبسي خل وملح', 8, 0, 0, 0, 0, '2020-12-24 09:48:57', '2020-12-24 09:48:57'),
(9, 'images/product/9/photo/c31e2e86-6d8d-4ce4-929b-f75abd2d8e6d.jpg', 2, 'Ton', '2222', 22, 2, 22, 22, 0, '2021-01-20 10:06:25', '2021-01-20 10:06:25'),
(10, 'images/product/10/photo/awlem1611137680.jpg', 2, 'Nader Gamal', '2sdsdasd', 22, 2, 3, 3, 0, '2021-01-20 10:09:56', '2021-01-20 10:14:40'),
(11, 'images/product/11/photo/awlem1611137719.jpg', 2, 'mohamed', 'rfgdfgdf', 33, 432, 43, 43, 0, '2021-01-20 10:15:19', '2021-01-20 10:15:20');

-- --------------------------------------------------------

--
-- Table structure for table `product_branches`
--

CREATE TABLE `product_branches` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `branch_id` int(11) NOT NULL DEFAULT 0,
  `product_id` int(11) NOT NULL DEFAULT 0,
  `available` tinyint(1) NOT NULL DEFAULT 1,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `product_branches`
--

INSERT INTO `product_branches` (`id`, `branch_id`, `product_id`, `available`, `created_at`, `updated_at`) VALUES
(39, 2, 2, 1, NULL, NULL),
(40, 2, 4, 1, NULL, NULL),
(41, 2, 5, 1, NULL, NULL),
(42, 2, 6, 1, NULL, NULL),
(44, 2, 3, 1, NULL, NULL),
(46, 3, 2, 1, NULL, NULL),
(47, 3, 4, 1, NULL, NULL),
(48, 3, 5, 1, NULL, NULL),
(49, 3, 3, 1, NULL, NULL),
(56, 1, 6, 1, '2020-12-22 10:11:27', '2020-12-22 10:11:27'),
(57, 6, 7, 1, '2020-12-24 09:46:58', '2020-12-24 09:46:58'),
(60, 6, 8, 1, '2020-12-24 10:01:24', '2020-12-24 10:01:24'),
(62, 1, 3, 1, '2020-12-27 09:49:23', '2020-12-27 09:49:23'),
(66, 1, 2, 0, '2020-12-28 12:58:56', '2020-12-28 12:58:56'),
(73, 1, 5, 0, '2020-12-28 13:42:08', '2020-12-28 13:42:08'),
(77, 1, 4, 1, '2020-12-28 15:09:33', '2020-12-28 15:09:33'),
(78, 1, 9, 1, '2021-01-20 10:06:25', '2021-01-20 10:06:25'),
(79, 1, 10, 1, '2021-01-20 10:09:56', '2021-01-20 10:09:56'),
(80, 2, 10, 1, '2021-01-20 10:09:56', '2021-01-20 10:09:56'),
(81, 3, 10, 1, '2021-01-20 10:09:56', '2021-01-20 10:09:56'),
(82, 2, 11, 1, '2021-01-20 10:15:19', '2021-01-20 10:15:19'),
(83, 3, 11, 1, '2021-01-20 10:15:20', '2021-01-20 10:15:20'),
(84, 4, 11, 1, '2021-01-20 10:15:20', '2021-01-20 10:15:20');

-- --------------------------------------------------------

--
-- Table structure for table `product_groups`
--

CREATE TABLE `product_groups` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `product_id` int(11) NOT NULL DEFAULT 0,
  `required_options` tinyint(1) NOT NULL DEFAULT 0,
  `name` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `choices_numbers` int(11) NOT NULL DEFAULT 0,
  `allow_incriments` tinyint(1) NOT NULL DEFAULT 0,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `product_groups`
--

INSERT INTO `product_groups` (`id`, `product_id`, `required_options`, `name`, `choices_numbers`, `allow_incriments`, `created_at`, `updated_at`) VALUES
(1, 1, 1, 'الحجم', 1, 0, '2020-09-28 08:14:57', '2020-10-19 06:33:15'),
(2, 1, 1, 'نوع الجبنة', 2, 1, '2020-09-28 08:14:57', '2020-10-19 06:33:15'),
(3, 1, 1, 'نوع اللحم', 1, 0, '2020-09-28 08:14:57', '2020-10-19 06:33:15'),
(4, 1, 0, 'أكياس الكاتشب الأضافية', 10, 1, '2020-09-28 08:14:57', '2020-10-19 06:33:15'),
(5, 1, 1, 'نوع الكاتشب', 1, 0, '2020-09-28 08:14:57', '2020-10-19 06:33:15'),
(6, 2, 1, 'نوع الكاتشب', 1, 0, '2020-09-28 08:51:15', '2020-12-10 11:29:48'),
(7, 2, 1, 'نوع الصوص', 1, 0, '2020-09-28 08:51:15', '2020-12-10 11:29:48'),
(8, 3, 0, 'نوع الجبنة', 2, 0, '2020-09-28 09:03:18', '2020-09-28 09:03:18'),
(9, 3, 1, 'نوع الكاتشب', 1, 0, '2020-09-28 09:03:18', '2020-09-28 09:03:18'),
(10, 4, 1, 'نوع المكرونة', 1, 0, '2020-09-28 09:19:23', '2020-09-28 09:19:23'),
(11, 4, 0, 'نوع الصوص', 1, 0, '2020-09-28 09:19:23', '2020-09-28 09:19:23'),
(12, 4, 1, 'نوع الأضافة الرئيسية', 1, 0, '2020-09-28 09:19:23', '2020-09-28 09:19:23'),
(17, 5, 0, 'أكياس الكاتشب الأضافية', 5, 1, '2020-10-01 10:15:49', '2020-10-01 10:23:14'),
(18, 5, 1, 'نوع الصوص', 1, 0, '2020-10-01 10:15:49', '2020-10-01 10:23:14'),
(19, 5, 1, 'نوع اللحم', 1, 0, '2020-10-01 10:15:49', '2020-10-01 10:23:14'),
(20, 6, 1, 'الكاتشب', 1, 0, '2020-10-04 12:37:25', '2020-10-04 12:37:25');

-- --------------------------------------------------------

--
-- Table structure for table `product_group_options`
--

CREATE TABLE `product_group_options` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `product_group_id` int(11) NOT NULL DEFAULT 0,
  `title` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `price` double NOT NULL DEFAULT 0,
  `quantity` int(1) NOT NULL DEFAULT 0 COMMENT 'for frontend only',
  `front_checked` tinyint(1) NOT NULL DEFAULT 0,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `product_group_options`
--

INSERT INTO `product_group_options` (`id`, `product_group_id`, `title`, `price`, `quantity`, `front_checked`, `created_at`, `updated_at`) VALUES
(1, 1, 'كبير', 30, 0, 0, '2020-09-28 08:14:57', '2020-09-28 08:14:57'),
(2, 1, 'وسط', 20, 0, 0, '2020-09-28 08:14:57', '2020-09-28 08:14:57'),
(3, 1, 'صغير', 0, 0, 0, '2020-09-28 08:14:57', '2020-09-28 08:14:57'),
(4, 2, 'شيدر', 2, 0, 0, '2020-09-28 08:14:57', '2020-09-28 08:14:57'),
(5, 2, 'رومي', 0, 0, 0, '2020-09-28 08:14:57', '2020-09-28 08:14:57'),
(6, 2, 'موزريلا', 0, 0, 0, '2020-09-28 08:14:57', '2020-09-28 08:14:57'),
(7, 3, 'جمبري', 50, 0, 0, '2020-09-28 08:14:57', '2020-09-28 08:14:57'),
(8, 3, 'تونة', 10, 0, 0, '2020-09-28 08:14:57', '2020-09-28 08:14:57'),
(9, 3, 'لحمة', 20, 0, 0, '2020-09-28 08:14:57', '2020-09-28 08:14:57'),
(10, 3, 'فراخ', 0, 0, 0, '2020-09-28 08:14:57', '2020-09-28 08:14:57'),
(11, 4, 'كاتشب ماك', 2, 0, 0, '2020-09-28 08:14:57', '2020-09-28 08:14:57'),
(12, 4, 'كاتشب هاينز', 1, 0, 0, '2020-09-28 08:14:57', '2020-09-28 08:14:57'),
(13, 5, 'كاتشب حلو', 0, 0, 0, '2020-09-28 08:14:57', '2020-09-28 08:14:57'),
(14, 5, 'كاتشب حار', 0, 0, 0, '2020-09-28 08:14:57', '2020-09-28 08:14:57'),
(15, 6, 'كاتشب حلو', 0, 0, 0, '2020-09-28 08:51:15', '2020-09-28 08:51:15'),
(16, 6, 'كاتشب حار', 0, 0, 0, '2020-09-28 08:51:15', '2020-09-28 08:51:15'),
(17, 7, 'صوص أبيض', 0, 0, 0, '2020-09-28 08:51:15', '2020-09-28 08:51:15'),
(18, 7, 'صوص أحمر', 0, 0, 0, '2020-09-28 08:51:15', '2020-09-28 08:51:15'),
(19, 8, 'رومي', 3, 0, 0, '2020-09-28 09:03:18', '2020-09-28 09:03:18'),
(20, 8, 'شيدر', 7, 0, 0, '2020-09-28 09:03:18', '2020-09-28 09:03:18'),
(21, 8, 'مودزريلا', 5, 0, 0, '2020-09-28 09:03:18', '2020-09-28 09:03:18'),
(22, 9, 'كاتشب حلو', 0, 0, 0, '2020-09-28 09:03:18', '2020-09-28 09:03:18'),
(23, 9, 'كاتشب حار', 0, 0, 0, '2020-09-28 09:03:18', '2020-09-28 09:03:18'),
(24, 10, 'نجرسكو', 5, 0, 0, '2020-09-28 09:19:23', '2020-09-28 09:19:23'),
(25, 10, 'اسباجتي', 0, 0, 0, '2020-09-28 09:19:23', '2020-09-28 09:19:23'),
(26, 10, 'أقلام', 0, 0, 0, '2020-09-28 09:19:23', '2020-09-28 09:19:23'),
(27, 11, 'صوص أحمر', 0, 0, 0, '2020-09-28 09:19:23', '2020-09-28 09:19:23'),
(28, 11, 'صوص أبيض', 0, 0, 0, '2020-09-28 09:19:23', '2020-09-28 09:19:23'),
(29, 12, 'تونة', 0, 0, 0, '2020-09-28 09:19:23', '2020-09-28 09:19:23'),
(30, 12, 'فراخ', 0, 0, 0, '2020-09-28 09:19:23', '2020-09-28 09:19:23'),
(31, 12, 'لحم', 0, 0, 0, '2020-09-28 09:19:23', '2020-09-28 09:19:23'),
(32, 12, 'جمبري', 10, 0, 0, '2020-09-28 09:19:23', '2020-09-28 09:19:23'),
(33, 13, 'بتنجان مشوي', 10, 0, 0, '2020-10-01 09:02:26', '2020-10-01 09:02:26'),
(34, 13, 'بتنجان مقلي', 20, 0, 0, '2020-10-01 09:02:26', '2020-10-01 09:02:26'),
(36, 14, 'ملوخية خضراء', 15, 0, 0, '2020-10-01 09:02:26', '2020-10-01 09:02:26'),
(37, 15, 'بتنجان مشوي', 10, 0, 0, '2020-10-01 09:03:14', '2020-10-01 09:03:14'),
(39, 16, 'ملوخية نشفه', 17, 0, 0, '2020-10-01 09:03:14', '2020-10-01 09:03:14'),
(40, 16, 'ملوخية خضراء', 15, 0, 0, '2020-10-01 09:03:14', '2020-10-01 09:03:14'),
(41, 17, '2 كيس كاتشب', 1, 0, 0, '2020-10-01 10:15:49', '2020-10-01 10:15:49'),
(42, 18, 'صوص أبيض', 0, 0, 0, '2020-10-01 10:15:49', '2020-10-01 10:15:49'),
(43, 18, 'صوص أحمر', 0, 0, 0, '2020-10-01 10:15:49', '2020-10-01 10:15:49'),
(44, 19, 'فراخ', 10, 0, 0, '2020-10-01 10:15:49', '2020-10-01 10:15:49'),
(45, 19, 'لحمة', 0, 0, 0, '2020-10-01 10:15:49', '2020-10-01 10:15:49'),
(46, 20, 'كاتشب حلو', 0, 0, 0, '2020-10-04 12:37:25', '2020-10-04 12:37:25'),
(47, 20, 'كاتشب حار', 0, 0, 0, '2020-10-04 12:37:25', '2020-10-04 12:37:25'),
(48, 21, 'كيس كاتشب حلو', 1, 0, 0, '2020-10-05 07:42:46', '2020-10-05 07:42:46'),
(49, 21, 'كيس كاتشب حار', 1, 0, 0, '2020-10-05 07:42:46', '2020-10-05 07:42:46');

-- --------------------------------------------------------

--
-- Table structure for table `product_meals`
--

CREATE TABLE `product_meals` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `product_id` int(11) NOT NULL DEFAULT 0,
  `meal_id` int(11) NOT NULL DEFAULT 0,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `product_meals`
--

INSERT INTO `product_meals` (`id`, `product_id`, `meal_id`, `created_at`, `updated_at`) VALUES
(5, 2, 1, NULL, NULL),
(6, 2, 7, NULL, NULL),
(7, 3, 7, NULL, NULL),
(8, 4, 1, NULL, NULL),
(9, 4, 2, NULL, NULL),
(10, 4, 7, NULL, NULL),
(12, 5, 1, NULL, NULL),
(13, 5, 2, NULL, NULL),
(14, 6, 2, NULL, NULL),
(15, 7, 13, NULL, NULL),
(16, 8, 13, NULL, NULL),
(17, 9, 1, NULL, NULL),
(18, 9, 2, NULL, NULL),
(19, 9, 3, NULL, NULL),
(20, 10, 1, NULL, NULL),
(21, 10, 2, NULL, NULL),
(22, 10, 3, NULL, NULL),
(23, 11, 2, NULL, NULL),
(24, 11, 3, NULL, NULL),
(25, 11, 4, NULL, NULL),
(26, 11, 7, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `ratings`
--

CREATE TABLE `ratings` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` int(11) NOT NULL DEFAULT 0,
  `active` tinyint(1) NOT NULL DEFAULT 0,
  `rate` float NOT NULL DEFAULT 0,
  `review` text COLLATE utf8_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `ratings`
--

INSERT INTO `ratings` (`id`, `user_id`, `active`, `rate`, `review`, `created_at`, `updated_at`) VALUES
(1, 9, 1, 5, 'جيد جدا', '2020-10-18 08:53:36', '2020-10-18 09:03:57'),
(2, 22, 1, 4, 'تطبيق أكثر من ممتاز', '2020-10-18 09:06:22', '2020-10-18 09:06:22'),
(3, 24, 1, 3, 'التطبيق يسهل عليك أشياء كثيرة', '2020-10-18 09:06:44', '2020-10-18 09:06:44'),
(4, 28, 1, 5, 'شكرا لتقديمكم كل هذه الخدمات بانتظار الأفضل منك دوما', '2020-10-18 09:07:17', '2020-10-18 09:07:17'),
(5, 23, 1, 4, 'أحسنتم وللأفضل متقدمين بأذن الله', '2020-10-18 09:07:44', '2020-10-18 09:07:44'),
(6, 0, 1, 5, 'شكرا لتقديمكم كل هذه الخدمات بانتظار الأفضل منك دوما', '2020-10-18 09:07:17', '2020-10-18 09:07:17'),
(7, 0, 1, 4, 'أحسنتم وللأفضل متقدمين بأذن الله', '2020-10-18 09:07:44', '2020-10-18 09:07:44'),
(8, 87, 0, 3.5, 'email', '2020-12-01 14:34:30', '2020-12-01 14:34:30'),
(9, 87, 0, 3.5, 'cjcj', '2020-12-01 14:34:46', '2020-12-01 14:34:46'),
(10, 87, 0, 3.5, 'cncncjcj', '2020-12-01 14:38:13', '2020-12-01 14:38:13'),
(11, 87, 0, 3.5, 'رزرو و', '2020-12-02 12:06:21', '2020-12-02 12:06:21'),
(12, 93, 0, 3.5, 'h8j8jinij', '2020-12-17 13:36:53', '2020-12-17 13:36:53'),
(13, 103, 0, 2, 'تمام التمام', '2020-12-20 10:49:26', '2020-12-20 10:49:26'),
(14, 103, 0, 3, 'عةعاعاعا', '2020-12-27 13:16:44', '2020-12-27 13:16:44'),
(15, 108, 0, 5, 'nnnnn', '2020-12-28 13:58:31', '2020-12-28 13:58:31');

-- --------------------------------------------------------

--
-- Table structure for table `regions`
--

CREATE TABLE `regions` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `regions`
--

INSERT INTO `regions` (`id`, `name`, `created_at`, `updated_at`) VALUES
(1, 'القاهرة', '2020-09-17 11:26:43', '2020-09-17 11:26:43'),
(2, 'القليوبية', '2020-09-17 11:27:41', '2020-09-17 11:27:41'),
(3, 'الأسكندرية', '2020-09-17 11:27:51', '2020-09-17 11:27:51'),
(4, 'المنصورة', '2020-09-17 11:28:02', '2020-09-17 11:28:02'),
(5, 'الغربية', '2020-09-17 11:28:17', '2020-09-17 11:28:17'),
(7, 'شرم الشيخ', '2020-09-17 11:32:24', '2020-09-17 11:35:22');

-- --------------------------------------------------------

--
-- Table structure for table `restorants`
--

CREATE TABLE `restorants` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `featured` tinyint(1) NOT NULL DEFAULT 0,
  `featured_meals` text COLLATE utf8_unicode_ci DEFAULT NULL,
  `name` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `photo` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `category_id` int(11) NOT NULL DEFAULT 0,
  `user_id` int(11) NOT NULL DEFAULT 0,
  `accepted` tinyint(1) NOT NULL DEFAULT 0,
  `priority` int(11) NOT NULL DEFAULT 0,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `restorants`
--

INSERT INTO `restorants` (`id`, `featured`, `featured_meals`, `name`, `photo`, `category_id`, `user_id`, `accepted`, `priority`, `created_at`, `updated_at`) VALUES
(2, 1, 'مشويات', 'مطعم الشبراوي', 'images/restorant/2/photo/sincerely-media-VNsdEl1gORk-unsplash.png', 2, 9, 1, 10, '2020-09-21 11:43:59', '2021-02-03 13:20:43'),
(3, 1, 'وجبة شرائح الدجاج المقرمش , وجبة شرائح دجاج دينرالجديدة المقرمشة', 'كنتاكي', 'images/restorant/3/photo/image.jpg', 4, 20, 1, 5, '2020-10-12 08:08:01', '2020-12-27 12:36:00'),
(4, 1, 'وجبات سريعة , مشويات', 'ماكدونالدز', 'images/restorant/4/photo/a19bed5e-a480-4aef-be66-5ef2f777c957.jpg', 5, 21, 1, 0, '2020-10-12 08:10:43', '2020-12-27 12:36:17'),
(5, 1, 'مقرمشات , مشويات', 'أبو الخير', 'images/restorant/5/photo/maxresdefault.jpg', 5, 22, 1, 0, '2020-10-12 08:16:30', '2020-12-27 12:36:26'),
(6, 1, 'مثلجات , معلبات', 'سوبر ماركت مترو', 'images/restorant/6/photo/1460214396_451_40996_330_559949792.jpg', 6, 95, 1, 0, '2020-10-12 08:22:17', '2020-12-27 12:36:34'),
(7, 1, 'مقرمشات , مشويات', 'حضر موت', 'images/restorant/7/photo/1485914187hadramoot.jpg', 4, 96, 1, 0, '2020-10-12 08:42:27', '2020-12-27 12:36:40'),
(8, 1, 'مكرونات , باسطا', 'بسطاويسي', 'images/restorant/8/photo/recipe-large.png', 4, 25, 1, 0, '2020-10-12 08:46:42', '2020-12-27 12:36:45'),
(9, 1, 'مقرمشات , سندوتشات', 'كوك دور', 'images/restorant/9/photo/photo1jpg.jpg', 3, 26, 1, 0, '2020-10-12 08:49:03', '2020-12-27 12:36:51'),
(10, 1, 'مشويات', 'صبحي كابر', 'images/restorant/10/photo/website.jpg', 2, 28, 1, 0, '2020-10-15 11:59:00', '2020-12-27 12:36:57'),
(11, 1, 'بيتزا', 'برونتو', 'images/restorant/11/photo/download (2).jpg', 2, 97, 1, 0, '2020-11-02 11:26:59', '2020-12-27 12:37:03'),
(12, 1, 'مشويات', 'كي اف سي', 'images/restorant/12/photo/website.jpg', 4, 98, 1, 0, '2020-11-02 11:41:52', '2020-12-27 12:37:08'),
(13, 1, 'فراخ', 'مطعم طلعت', 'images/restorant/13/photo/download.jpg', 2, 99, 1, 0, '2020-11-02 12:01:52', '2020-12-09 11:56:36'),
(14, 0, 'بيتزا , بشاميل', 'اونيونز', 'images/restorant/14/photo/download (1).jpg', 5, 100, 1, 0, '2020-12-08 13:55:34', '2021-01-14 10:59:00');

-- --------------------------------------------------------

--
-- Table structure for table `restorant_ratings`
--

CREATE TABLE `restorant_ratings` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` int(11) NOT NULL DEFAULT 0,
  `restorant_id` int(11) NOT NULL DEFAULT 0,
  `rate` float NOT NULL DEFAULT 0,
  `review` text COLLATE utf8_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `restorant_ratings`
--

INSERT INTO `restorant_ratings` (`id`, `user_id`, `restorant_id`, `rate`, `review`, `created_at`, `updated_at`) VALUES
(1, 93, 1, 4, 'ممتاز جدا جدا', '2020-12-09 13:41:55', '2020-12-09 13:41:55'),
(2, 93, 1, 4, 'جيد جدا جدا', '2020-12-10 10:57:48', '2020-12-10 10:57:48'),
(3, 93, 1, 4, 'جامد جدا', '2020-12-10 12:17:56', '2020-12-10 12:17:56'),
(4, 93, 1, 3, 'حلو جدا', '2020-12-10 12:45:59', '2020-12-10 12:45:59'),
(5, 93, 1, 3, NULL, '2020-12-10 13:21:46', '2020-12-10 13:21:46'),
(6, 93, 1, 3, 'جيد جدا', '2020-12-24 10:35:04', '2020-12-24 10:35:04'),
(7, 93, 1, 4, 'ممتاز جدا جدا', '2020-12-24 12:19:55', '2020-12-24 12:19:55'),
(8, 93, 1, 4, 'جيد جدا', '2020-12-24 14:09:12', '2020-12-24 14:09:12'),
(9, 93, 1, 3, NULL, '2020-12-28 09:16:09', '2020-12-28 09:16:09'),
(10, 93, 1, 4, 'جيد جدا', '2020-12-28 12:36:07', '2020-12-28 12:36:07'),
(11, 93, 1, 4, NULL, '2020-12-28 13:08:13', '2020-12-28 13:08:13'),
(12, 93, 2, 5, 'ووووة', '2020-12-28 13:40:05', '2020-12-28 13:40:05');

-- --------------------------------------------------------

--
-- Table structure for table `roles`
--

CREATE TABLE `roles` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `guard_name` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `roles`
--

INSERT INTO `roles` (`id`, `name`, `guard_name`, `created_at`, `updated_at`) VALUES
(4, 'Restorant', 'web', '2020-06-17 08:01:00', '2020-12-09 11:30:30'),
(6, 'Branch', 'web', '2020-09-17 06:55:34', '2020-12-09 11:30:46'),
(7, 'Super Admin', 'web', '2020-10-07 11:10:02', '2020-10-07 11:10:02'),
(12, 'testRol', 'web', '2020-12-22 09:58:59', '2020-12-22 09:58:59');

-- --------------------------------------------------------

--
-- Table structure for table `role_has_permissions`
--

CREATE TABLE `role_has_permissions` (
  `permission_id` bigint(20) UNSIGNED NOT NULL,
  `role_id` bigint(20) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `role_has_permissions`
--

INSERT INTO `role_has_permissions` (`permission_id`, `role_id`) VALUES
(3, 12),
(4, 12),
(5, 12),
(6, 12),
(7, 12),
(20, 4),
(21, 4),
(22, 4),
(23, 4),
(24, 4),
(24, 6),
(25, 4),
(26, 4),
(27, 4),
(27, 6),
(28, 4),
(29, 4),
(65, 4),
(65, 6),
(66, 12),
(67, 4),
(67, 12),
(68, 4),
(68, 6),
(69, 6),
(70, 4),
(70, 6),
(71, 4),
(100, 4),
(107, 4),
(107, 6),
(108, 4),
(109, 4),
(110, 4),
(110, 6),
(111, 4),
(111, 6),
(112, 4),
(112, 6),
(113, 4),
(114, 4),
(114, 6),
(115, 4),
(115, 6),
(116, 4),
(117, 4),
(117, 6),
(118, 4),
(118, 6),
(119, 4),
(120, 4),
(121, 4),
(136, 4),
(139, 4),
(140, 4),
(141, 4),
(158, 4),
(158, 6),
(159, 4),
(159, 6),
(160, 4),
(160, 6),
(161, 4),
(161, 6),
(162, 4),
(162, 6),
(163, 4),
(163, 6),
(164, 4),
(164, 6),
(165, 4),
(165, 6),
(166, 4),
(166, 6),
(167, 4),
(167, 6),
(168, 4),
(168, 6),
(169, 4),
(169, 6),
(170, 4),
(170, 6),
(175, 6);

-- --------------------------------------------------------

--
-- Table structure for table `settings`
--

CREATE TABLE `settings` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `address_ara` varchar(150) COLLATE utf8_unicode_ci DEFAULT NULL,
  `address_eng` varchar(150) COLLATE utf8_unicode_ci DEFAULT NULL,
  `email` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `rasheed_site` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `rasheed_telephon` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `phone` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `fax` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `facebook` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `twitter` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `instgram` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `whatsapp` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `appstore_link` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `google_play_link` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `main_vedio_link` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `products` int(11) NOT NULL DEFAULT 0,
  `location` varchar(150) COLLATE utf8_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `title` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `description` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `email_contact_us_1` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `email_contact_us_2` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `phone_contact_us_1` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL,
  `phone_contact_us_2` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL,
  `olum_decription` text COLLATE utf8_unicode_ci DEFAULT NULL,
  `olum_card_1_photo` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `olum_card_1_title` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `olum_card_1_description` text COLLATE utf8_unicode_ci DEFAULT NULL,
  `olum_card_2_photo` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `olum_card_2_title` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `olum_card_2_description` text COLLATE utf8_unicode_ci DEFAULT NULL,
  `olum_card_3_photo` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `olum_card_3_title` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `olum_card_3_description` text COLLATE utf8_unicode_ci DEFAULT NULL,
  `olum_price` double NOT NULL DEFAULT 0,
  `olum_percentage` double NOT NULL DEFAULT 0,
  `vat_price` double NOT NULL DEFAULT 0,
  `vat_percentage` double NOT NULL DEFAULT 0,
  `tax_number` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `settings`
--

INSERT INTO `settings` (`id`, `address_ara`, `address_eng`, `email`, `rasheed_site`, `rasheed_telephon`, `phone`, `fax`, `facebook`, `twitter`, `instgram`, `whatsapp`, `appstore_link`, `google_play_link`, `main_vedio_link`, `products`, `location`, `created_at`, `updated_at`, `title`, `description`, `email_contact_us_1`, `email_contact_us_2`, `phone_contact_us_1`, `phone_contact_us_2`, `olum_decription`, `olum_card_1_photo`, `olum_card_1_title`, `olum_card_1_description`, `olum_card_2_photo`, `olum_card_2_title`, `olum_card_2_description`, `olum_card_3_photo`, `olum_card_3_title`, `olum_card_3_description`, `olum_price`, `olum_percentage`, `vat_price`, `vat_percentage`, `tax_number`) VALUES
(1, 'مرصفا بنها قليوبيه', 'Marsafa Banha Qaliobia', 'refaatgamal222@gmail.com', 'https://www.google.com/', '0133347718', '01153430338', '01153430338', 'https://www.facebook.com/', 'https://twitter.com/?lang=en', 'https://www.instagram.com/?hl=en', 'https://www.facebook.com/', 'https://www.apple.com/app-store/', 'https://play.google.com/store/movies/details/Harry_Potter_and_the_Half_Blood_Prince?id=TBxwIBpYyBo.P', 'https://www.youtube.com/embed/MzfNZb22Rcg', 80, '30.4058247,31.2473141,17', NULL, '2021-01-14 11:23:49', 'كيف يمكننا مساعدتك', 'قسم خدمة العملاء لدينا جاهز لاستقبال استفساراتكم على مدار الساعة طوال أيام الأسبوع', '‏example@mail.com', '‏example.olem@gmail.com', '‏966 514 8748 962', '‏966 514 8748 962', 'لوريم ايبسوم دولار سيت أميت ,كونسيكتيتور أدايبا يسكينج أليايت,سيت دو أيوسمود تيمبور أنكايديديونتيوت لابوري ات دولار ماجنا أليكيوا . يوت انيم أد مينيم فينايم,كيواس نوستريد أكسير سيتاشن يللأمكو لابورأس نيسي يت أليكيوب أكس أيا كوممودو كونسيكيوات . ديواس أيوتي أريري دولار إن ريبريهينديرأيت فوليوبتاتي فيلايت أيسسي كايلليوم دولار أيو فيجايت نيولا باراياتيور. أيكسسيبتيور ساينت أوككايكات كيوبايداتات نون بروايدينت ,سيونت ان كيولباكيو أوفيسيا ديسيري', 'images/olum_card/order.png', 'تجهيز الوجبات', 'لوريم ايبسوم دولار سيت أميت ,كونسيكتيتور أدايبا يسكينج أليايت,سيت دو أيوسمود تيمبور أنكايديديونتيوت لابوري ات دولار ماجنا أليكيوا . يوت انيم', 'images/olum_card/track.png', 'تجهيز الوجبات', 'لوريم ايبسوم دولار سيت أميت ,كونسيكتيتور أدايبا يسكينج أليايت,سيت دو أيوسمود تيمبور أنكايديديونتيوت لابوري ات دولار ماجنا أليكيوا . يوت انيم', 'images/olum_card/delivered.png', 'تجهيز الوجبات', 'لوريم ايبسوم دولار سيت أميت ,كونسيكتيتور أدايبا يسكينج أليايت,سيت دو أيوسمود تيمبور أنكايديديونتيوت لابوري ات دولار ماجنا أليكيوا . يوت انيم', 0, 20, 10, 10, '343434354565465765');

-- --------------------------------------------------------

--
-- Table structure for table `types`
--

CREATE TABLE `types` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `photo` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `types`
--

INSERT INTO `types` (`id`, `name`, `photo`, `created_at`, `updated_at`) VALUES
(1, 'مأكولات', 'images/type/1/photo/chad-montano-MqT0asuoIcU-unsplash.png', '2020-09-20 06:44:37', '2020-11-25 09:38:38'),
(2, 'مشروبات', 'images/type/2/photo/sincerely-media-VNsdEl1gORk-unsplash.jpg', '2020-09-20 06:44:46', '2020-10-06 07:38:08'),
(3, 'حلويات', 'images/type/3/photo/ulysse-pcl-1WmlAiYgnoI-unsplash.jpg', '2020-09-20 06:45:00', '2020-10-06 07:38:11'),
(4, 'مخبوزات', 'images/type/4/photo/miti-R1ql7fk3I1Y-unsplash.jpg', '2020-09-20 06:45:11', '2020-10-06 07:38:15'),
(5, 'فطائر', 'images/type/5/photo/mahmoud-fawzy-aZZ01mrj4b4-unsplash.jpg', '2020-10-05 11:19:04', '2020-10-06 07:38:20');

-- --------------------------------------------------------

--
-- Table structure for table `type_restorants`
--

CREATE TABLE `type_restorants` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `type_id` int(11) NOT NULL DEFAULT 0,
  `restorant_id` int(11) NOT NULL DEFAULT 0,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `type_restorants`
--

INSERT INTO `type_restorants` (`id`, `type_id`, `restorant_id`, `created_at`, `updated_at`) VALUES
(6, 1, 2, NULL, NULL),
(7, 3, 2, NULL, NULL),
(8, 4, 2, NULL, NULL),
(9, 1, 3, NULL, NULL),
(10, 2, 3, NULL, NULL),
(11, 3, 3, NULL, NULL),
(12, 4, 3, NULL, NULL),
(13, 1, 4, NULL, NULL),
(14, 2, 4, NULL, NULL),
(15, 1, 5, NULL, NULL),
(16, 2, 5, NULL, NULL),
(17, 1, 6, NULL, NULL),
(18, 2, 6, NULL, NULL),
(19, 1, 7, NULL, NULL),
(20, 2, 7, NULL, NULL),
(21, 1, 8, NULL, NULL),
(22, 2, 8, NULL, NULL),
(23, 4, 8, NULL, NULL),
(24, 1, 9, NULL, NULL),
(25, 2, 9, NULL, NULL),
(26, 1, 10, NULL, NULL),
(27, 2, 10, NULL, NULL),
(28, 3, 10, NULL, NULL),
(29, 1, 12, NULL, NULL),
(30, 1, 13, NULL, NULL),
(31, 2, 13, NULL, NULL),
(32, 1, 14, NULL, NULL),
(33, 5, 14, NULL, NULL),
(34, 1, 11, NULL, NULL),
(35, 4, 11, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `accepted` tinyint(1) NOT NULL DEFAULT 0,
  `category_id` int(11) NOT NULL DEFAULT 0,
  `parent_restorant` int(11) NOT NULL DEFAULT 0,
  `websit_link` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `remember_token` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `hasAdminAccess` enum('true','false') COLLATE utf8_unicode_ci NOT NULL DEFAULT 'false',
  `phone` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `address` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `token` text COLLATE utf8_unicode_ci DEFAULT NULL,
  `device_token` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `active` tinyint(1) DEFAULT 0,
  `virification_code` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `lang` enum('1','2') COLLATE utf8_unicode_ci DEFAULT NULL,
  `photo` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `accepted`, `category_id`, `parent_restorant`, `websit_link`, `name`, `email`, `email_verified_at`, `password`, `remember_token`, `hasAdminAccess`, `phone`, `address`, `token`, `device_token`, `active`, `virification_code`, `lang`, `photo`, `created_at`, `updated_at`) VALUES
(7, 0, 0, 0, NULL, 'شامل', 'admin@admin.com', NULL, '$2y$10$KxyrHSMxPbRhiX3B.0C8vOXEcXtk3ZLFJbyejUgZD.ONeEWtNiz7u', NULL, 'true', '0115343033844', 'sdfdsfdsfd', NULL, NULL, 1, NULL, NULL, NULL, '2020-09-17 07:07:03', '2020-09-17 07:28:19'),
(9, 0, 0, 0, NULL, 'الشبراوي', 'shap@shap.com', NULL, '$2y$10$jQEUqv4MtaXAHQ.Q70TGXOjYCF.5JoxXnezD.VaKBUJ/c1wcMIhVO', NULL, 'true', '301153430338', 'مرصفا بنها قليوبية', NULL, NULL, 1, NULL, NULL, NULL, '2020-09-21 11:00:04', '2020-10-15 12:38:04'),
(10, 0, 0, 2, NULL, 'موظف الشبراوي فرع مدينة نصر', 'shamdnas@shamdnas.com', NULL, '$2y$10$KhrOL6e2o9jAM9W2M0SJy.JG9Tji.t.d5UBU5R1reTbWmyRYAti12', NULL, 'true', '0115343033843', 'fdgdfgdfgfg', NULL, NULL, 1, NULL, NULL, NULL, '2020-09-21 12:14:29', '2020-09-21 12:14:29'),
(17, 0, 0, 2, NULL, 'موظف الشبراوي فرع المعادي', 'maadi@maadi.com', NULL, '$2y$10$h8JfPBdJ9JlQkGYg89Ci6.GMJZN0q04JKmOQyFBtPmRhfvrK6le8y', NULL, 'true', '01153430589', 'المعادي أبراج المعادي ستار', NULL, NULL, NULL, NULL, NULL, NULL, '2020-10-11 09:22:22', '2020-10-11 09:22:22'),
(18, 0, 0, 2, NULL, 'موظف الشبراوي فرع بنها', 'banha@banha.com', NULL, '$2y$10$7vXUj4ubVLvzSVMaBz9SBOaktt3lBUq8sSK9aF3IuGLTAFgV8W7vK', NULL, 'true', '0152565895', 'مرصفا بنها قليوبية', NULL, NULL, NULL, NULL, NULL, NULL, '2020-10-11 09:23:48', '2020-10-11 09:23:48'),
(19, 0, 0, 2, NULL, 'أسماء محمد محمود غنيم', 'asmaa@asmaa.com', NULL, '$2y$10$UgZlcoXewqkCD/ps7iY5RO6SwH7DKbFD/f6KiLYZsrRhqxGbi3yBC', NULL, 'true', '01256589587', 'من قلب المنوفية', NULL, NULL, NULL, NULL, NULL, NULL, '2020-10-12 06:30:58', '2020-10-12 06:30:58'),
(20, 0, 0, 0, NULL, 'كنتاكي أونر', 'kentaky@kentaky.com', NULL, '$2y$10$JNdsZFu2NC3VA9Xn559mHeZUo5EOrN2aRyZVVPCNDO3rg1/Rp2gd6', NULL, 'true', '0152668977', 'لا يوجد', NULL, NULL, 1, NULL, NULL, NULL, '2020-10-12 08:05:15', '2020-10-12 08:05:15'),
(21, 0, 0, 0, NULL, 'ماكدونالدز أونر', 'mak@mak.com', NULL, '$2y$10$4OM/nE8ac0qWo8QLJ/BQgOBMTQW.CPA2U0A2XrufH8caZb244krnS', NULL, 'true', '01256802598', 'لا يوجد', NULL, NULL, 1, NULL, NULL, NULL, '2020-10-12 08:09:50', '2020-10-12 08:09:50'),
(22, 0, 0, 0, NULL, 'أبو الخير أونر', 'khair@kair.com', NULL, '$2y$10$fbm6.C2HpEa.j/d1oPchLOBxGJAE/uybNsPP0YElbFXtk8hrZn/de', NULL, 'true', '01525685987', 'لا يوجد', NULL, NULL, 1, NULL, NULL, NULL, '2020-10-12 08:15:09', '2020-10-12 08:15:09'),
(25, 0, 0, 0, NULL, 'بسطاويسي أونر', 'bastawesy@bastawesy.com', NULL, '$2y$10$7MOWethiuCkadawF5vhzwOF3RBpLcYTFTlay/yY3pyeGCkRRn.kxe', NULL, 'true', '0123658963', 'لا يوجد', NULL, NULL, 1, NULL, NULL, NULL, '2020-10-12 08:45:56', '2020-10-12 08:45:56'),
(26, 0, 0, 0, NULL, 'كوك دور', 'kok@kok.com', NULL, '$2y$10$YAIPuTopAaNxt.D.0/54cuVVzNp850O9jn47wCIsGk5DZ30A3jifW', NULL, 'true', '014785698523', 'لا يوجد', NULL, NULL, 1, NULL, NULL, NULL, '2020-10-12 08:48:08', '2020-10-12 08:48:08'),
(27, 0, 0, 0, NULL, 'نادر جمال', 'naderRes@naderRest.com', NULL, '$2y$10$Fc6cuKvByxSELEMLy5bJKOn3zY4fq6oXwUaTF922RfIJKT3JIdSv2', NULL, 'true', '011524568598', 'مرصفا بنها قليوبية', 'eyJ0eXAiOiJKV1QiLCJhbGciOiJSUzI1NiIsImp0aSI6IjBkNzgxZjk3NDdkYzg1YzZhOTEwZmQ3MmMxOWMwNTk5YmUwZTQ2NjhiZmYxOWI5NDM2ZDNiNDA3YjhiNDEzYzEwNTBkMDU1OTUzMjM5ZjY1In0.eyJhdWQiOiIxIiwianRpIjoiMGQ3ODFmOTc0N2RjODVjNmE5MTBmZDcyYzE5YzA1OTliZTBlNDY2OGJmZjE5Yjk0MzZkM2I0MDdiOGI0MTNjMTA1MGQwNTU5NTMyMzlmNjUiLCJpYXQiOjE2MDI3NzAzNDAsIm5iZiI6MTYwMjc3MDM0MCwiZXhwIjoxNjM0MzA2MzQwLCJzdWIiOiIyNyIsInNjb3BlcyI6W119.E8xnGv9cF39yBAn-cmASQKcrsbdEploHvu_YUVcdeBu_SsPtItvkDVVjvcYT7riqzXDVkxWrOmkldWJlgR8hYoCV0zAEod0B3lgwlJzxoxruZUk8nq04iP56hLxniJ08wIDDg3CygHpDu6whwBT5x1D5nDB3H87LpO92thbG-ke2CYFZRnZH2DDurY6GP3G14yE1BpV_vjS9WGkKR-3L84MWKCX4NlcIFuOmUD6B3fNi6ac108H_e3_HXA4MusvPuuGDW4WJ9Ri7yKvpXMFWXuWzAsF84vlMkiU2c1yChKHtkqo1-qgkzF_3iV7kERwKg2YxeXRvYvH619nrfl1rqB18UXH0wOgzfQd-HdmGxRhDP-jI2woZHAzWftTvUJNOaf6i2EEyBihvDxoqmQ-WFwfzzaLa41OooN7nbYbE4zlLaqZtnnmcXTxnYbacia3J6aHkDsiL1M1__EUXlrpJYTw5mgDBpA6YP597rzZc6hxzziaR9tfMQJbml71X_8KXZbuzc7frE9pmvaGj0GjRB-9SnxsQuMzn6SDo3ujEESmy_Az0Yvl15MzrcNE9tO0o1C3LLc1WfYXLEh1GbkLat-_Jgk7QlzOsyHmmjAQrF4w_jCJkRqPH6nA6QNfSuDV9T0s0AxcQ4SMVqbfL2QvvtEpb2XeNALHEDR59aoUlSM4', NULL, NULL, '2233', NULL, NULL, '2020-10-15 11:58:59', '2020-10-15 11:59:00'),
(28, 0, 0, 0, NULL, 'صبحي كابر أونر', 'sobh@sobh.com', NULL, '$2y$10$ocEnVt6ROpbcBEoNoCfG9ubgIxSv0s0EyJ5UExoEy.Es4oYB79dHu', NULL, 'true', '01256365895', 'القاهرة', NULL, NULL, 1, NULL, NULL, NULL, '2020-10-18 07:18:08', '2020-10-18 07:18:08'),
(92, 0, 0, 0, NULL, 'emad_abdou7', 'mail@email.com', NULL, '$2y$10$QOK.8O7tUG0G4FRVum8LOuV38CnPl8OzOG4/NIlMaPiLTh4e3vsge', NULL, 'false', '012345678901', NULL, 'eyJ0eXAiOiJKV1QiLCJhbGciOiJSUzI1NiIsImp0aSI6IjViNmE0ZDk2NTZiMWE0NjhhYjUxZTIwN2E5MWQ1MjE5ZTQ1YjM0ZjRmYzk1Nzc5ZDdlNzE2YTE4ZGUwM2UzMjg0ZmZmYjdlOWE2NDFlNGNiIn0.eyJhdWQiOiIxIiwianRpIjoiNWI2YTRkOTY1NmIxYTQ2OGFiNTFlMjA3YTkxZDUyMTllNDViMzRmNGZjOTU3NzlkN2U3MTZhMThkZTAzZTMyODRmZmZiN2U5YTY0MWU0Y2IiLCJpYXQiOjE2MDc0MjIxMzcsIm5iZiI6MTYwNzQyMjEzNywiZXhwIjoxNjM4OTU4MTM3LCJzdWIiOiI5MiIsInNjb3BlcyI6W119.h-wVeh4PumOavp_kRCpZzWkPmc1Uc5T9leIDY_DlyPYlh5Hh1M1Ru3pHSbdFBthyLCpyMznEBVgu788tVYmYrSdMJ3eAPBrCpYHOneD-92iLl0WnB04Od8ftr_UhXCWUCgtiKTsrk7MFZlea68JKthRty-Ypox51bIT-chcf-An1zG90JqJoEsltVuPz_lr048ed9CVt1DSNivDYG8Oko9x3v62Skt7_nqO3fKI6Jok5kTilwloIULClMU0eZa0YBLUp8E5QUZ9m28RlsdTKX7TOluuWn0r94K_On5UPHcccoMqom6ukSkmSg9aAm5ChTuLPMrgp5ky3jYYahqTonqV0-y2BGc_hoRmITJGzX5zkXfynfJRGV2zfOp_UeJB5lOIBDfysxMv1EbeVAzEiFFFYGX0fDGRAG3ZVpMsfgZqSmwHVu0js9sXGXUAjax_fNf4zPYcfv-P0ggJEzXtT7JGLqPiwrqwSaGtUc09EkI5vgYVjfVO1IkeEOesKGhz3pDBF2DOytWX7IoepJzCc9YrA44WrdYv6ss79svnO6Y1nW47PHlePkvycb4RpuN-D7zYeCfxJ1f0DZUCKeNlKATatnN1-PhTTFrWGsWZiPqaOXD5VKLr7G-UdHZ0MCVGwOKyoW3vcUOucw84oLTQTkfTuc6AwMw8QYyMUHtXVGWA', NULL, 1, '4496', NULL, NULL, '2020-12-06 13:18:16', '2020-12-08 10:08:57'),
(93, 0, 0, 0, NULL, 'emad_abdou7', 'eeee@www.com', NULL, '$2y$10$XjBXYcDV3xuslVj690xd2O7JToMMIjm78ghJPTyhZZUTs7txuBK0C', NULL, 'false', '01153430338', NULL, 'eyJ0eXAiOiJKV1QiLCJhbGciOiJSUzI1NiIsImp0aSI6IjAxNTI1MjI4OWQ0NTAxNWJiZTRlZWVhZmY2ZDQzY2IwZjM5ODFhNDhjYThjMGFlMTBiZWMxYjNlMDgzYzhlOGMxOWQ2YjUyNGVkYjgzODIyIn0.eyJhdWQiOiIxIiwianRpIjoiMDE1MjUyMjg5ZDQ1MDE1YmJlNGVlZWFmZjZkNDNjYjBmMzk4MWE0OGNhOGMwYWUxMGJlYzFiM2UwODNjOGU4YzE5ZDZiNTI0ZWRiODM4MjIiLCJpYXQiOjE2MTA2MjIzNTYsIm5iZiI6MTYxMDYyMjM1NiwiZXhwIjoxNjQyMTU4MzU2LCJzdWIiOiI5MyIsInNjb3BlcyI6W119.IZufEdhvqPN1XPmaL1j-A7pt_maySfnPRmVVM_WY8jrRhz62Uq2BNTq_asV6XsxUvdnRkVygukHHGRlcdlzAqqhRFywEMl56xRaycRx3NqMZrliW8nrLMW-0HiKCPQQUr68UJ_RSmm834KY2HvxMLSEtiqywgfG1WUPluUCeJm8YBWLbjFc-rJuNNdczvU6c1mWk7u4_UoiKZgwreQLbsiGrnnPcCb5vJ9L8folTGZ9j_xqRNkLaaLs6wAmSUhV0HHuDWTS10KdFCmpz1CMnNuxwHcBC7ZVZkarzMhprnseHffUYw1tASpEHYfxsBOLAznzL3TtSmFY5_RMHzt3HPpyy2TcYNN9w7SQPAVIjt2yvpcMgEtRlQlD11tiXLDc0vGR73gloERQwvdCfu1z14fzDTPCslQzRDFIuvCyRvklt6FXP19aCtxZFj1vFtmx_5UlTWQTGcs5yqzMTfS87cVldONPXYCpMGxve7EFiW4Vlz9ubyAzzkwVaszMO4d6UKDBEW4uRLN-F4HLVzDtqx0qrQTFctJkO25JLhOFTBNnCaV8dl-0JIqXAfQ3jiH9APFGaUAn6yMbmGhLwXSA0KRiVfvquWSqlomwQIFA1HxekduKhsodgfW_iXtrnU7mE0Ni7ho24B08-sRiu0S6VGGrtSlsdOm1viF6lN7Gd3Q4', 'eSvMSLy-RA6Qr2KxdFHs-k:APA91bH55D-88xk9et4GLgo4DN3umzfNiaTTcsDEhqJe1EDSXY_59WNMbgD66xKTHGB0I3J7I2WS4PTOQ8UGIY7zBoGnjsusTOB3V4W0lpZBXF3Q2tQlq3tEVuEVIyboUiAtW69NQPkv', 1, '2887', NULL, 'images/user/93/photo/Screenshot_20201213-122754_Awlem.jpg', '2020-12-06 13:19:04', '2021-01-14 11:05:56'),
(94, 0, 0, 0, NULL, 'Nader Gamaldds', 'sdsd@fdfd.com', NULL, '$2y$10$IOtwYzOnTnKNvMzn/yXuTuP7RQ3T5OdNwGZLCxhAyfyCZrLhtrFJu', NULL, 'false', '011534330338', 'egypt, ddddddddddddd, dddddd', NULL, NULL, 1, NULL, NULL, NULL, '2020-12-09 10:39:20', '2020-12-09 10:52:56'),
(95, 0, 0, 0, NULL, 'سوبر ماركت مترو', 'metro@metro.com', NULL, '$2y$10$hvhWl8q18BFQMINMriDNXe1BFD3ZBtrKVr9yNbRlik1XEf6BBmeUS', NULL, 'true', '01114731662', 'egypt, ddddddddddddd, dddddd', NULL, NULL, 1, NULL, NULL, NULL, '2020-12-09 11:37:26', '2020-12-09 11:37:26'),
(96, 0, 0, 0, NULL, 'حضر موت', 'hadr@hadr.com', NULL, '$2y$10$zr3BmcGYqgFug1xb53Xxb.ujwjItrz9qw1QjQOvEqV1ccOO8g3Ita', NULL, 'true', '01153433408', 'egypt, ddddddddddddd, dddddd', NULL, NULL, 1, NULL, NULL, NULL, '2020-12-09 11:51:42', '2020-12-09 11:51:42'),
(97, 0, 0, 0, NULL, 'برونتو', 'bronto@bronto.com', NULL, '$2y$10$9CzhEk6XqtkGNYCb3mvHZ.DmEbx4s/emfgR06pcKiZP1UPfTW3X9O', NULL, 'true', '01125830338', 'egypt, ddddddddddddd, dddddd', NULL, NULL, 1, NULL, NULL, NULL, '2020-12-09 11:53:59', '2020-12-09 11:53:59'),
(98, 0, 0, 0, NULL, 'كي أف سي', 'kfc@kfc', NULL, '$2y$10$6P6.l0UcIZdG3QWkWv2wtOlTJTcV1Hyzbe0y62qXy/DYsldO/ffMO', NULL, 'true', '01153589338', 'egypt, ddddddddddddd, dddddd', NULL, NULL, 1, NULL, NULL, NULL, '2020-12-09 11:55:24', '2020-12-09 11:55:24'),
(99, 0, 0, 0, NULL, 'طلعت', 'talat@talat.com', NULL, '$2y$10$G0dSHSqm8ZLVYD8msY36gOOsVQkQgxhsesvY5CV0YwlaLnYrzyKB.', NULL, 'true', '01153852338', 'egypt, ddddddddddddd, dddddd', NULL, NULL, 1, NULL, NULL, NULL, '2020-12-09 11:56:22', '2020-12-09 11:56:22'),
(100, 0, 0, 0, NULL, 'أونيونز', 'on@on.com', NULL, '$2y$10$ql8gCOKsUp1.M1jjCcFqjOEH.WjhWuKi32rexWWTZqzJEGNHKzXPm', NULL, 'true', '01153415938', 'egypt, ddddddddddddd, dddddd', NULL, NULL, 1, NULL, NULL, NULL, '2020-12-09 11:57:17', '2020-12-09 11:57:17'),
(101, 0, 0, 0, NULL, 'صبحي كابر فرع المعادي', 'kab@kab.com', NULL, '$2y$10$F75GMnvwO0kt7mOgGgJ//.qxynypzPhSM3/rEel8s10MyxLbbg/d.', NULL, 'true', '0115154990338', 'egypt, ddddddddddddd, dddddd', NULL, NULL, 1, NULL, NULL, NULL, '2020-12-09 11:59:12', '2020-12-09 11:59:12'),
(102, 0, 0, 0, NULL, 'الشبراوي فرع طوخ', 'shtokh@tokh.com', NULL, '$2y$10$Ll3dT44pdbU1ZfaVXuMOW.xELm87/2tiUJ.ZVb8YoZJWrAi4N83V6', NULL, 'true', '01158526930338', 'egypt, ddddddddddddd, dddddd', NULL, NULL, 1, NULL, NULL, NULL, '2020-12-09 12:00:32', '2020-12-09 12:00:32'),
(103, 0, 0, 0, NULL, 'نادر جمال', 'refaatgamal2222@gmail.com', NULL, '$2y$10$wMwbB3NdLEivIOSNRWOFReK8xr22auBc0DI3vUbAZ4og6b93aOU9S', NULL, 'false', '01153430339', NULL, 'eyJ0eXAiOiJKV1QiLCJhbGciOiJSUzI1NiIsImp0aSI6IjgwZjVhNThmNWVlZWNlZTE0NmQ4OTY2NDM5MDBjNmE5ZGZkYWFkMzZmMjM1ZWQ3NzA4Y2ZjMWZiN2VjYjNhZjgyMGEwNTEyNzJiMGY2YWUyIn0.eyJhdWQiOiIxIiwianRpIjoiODBmNWE1OGY1ZWVlY2VlMTQ2ZDg5NjY0MzkwMGM2YTlkZmRhYWQzNmYyMzVlZDc3MDhjZmMxZmI3ZWNiM2FmODIwYTA1MTI3MmIwZjZhZTIiLCJpYXQiOjE2MDkwNzM4MTMsIm5iZiI6MTYwOTA3MzgxMywiZXhwIjoxNjQwNjA5ODEzLCJzdWIiOiIxMDMiLCJzY29wZXMiOltdfQ.TPWr_KrcBDm3-1GhjE_HUAfPpNHqsh9S1m5F610PR-tijvmA2RjTsqCeVBVIk0sRUhoNOScREAnYlPvsopNI07IypjUSoC55Nb5NLNzlOtCHEPvby_JwUJIwmp-2ipWtKIdC8wTp4msx6D2Y-40UahMKuegvqxsg-n3FxDE7tB3yZJGxRNK92_Sxuc_WUgMX8NuX-DR010WjDHH3sR0hRAL6WmCoaqBWms4kTYiqpcYqws_GLrjTnD5z5j4tF5GYoYCCLkLt6wpsIKu1GqJSeQfEobzUsgJYg6GyUIjKFkuUSyEpfkvz2pcdv8vql4O9dylTSqWOXfbUAH-sTYipmrj6E550i7NTRsLBTq_SZ7aO4Z4MiN6L3-40vLmtoLQIxPnhuU-iFGLKv5nAvuFvYtSuRoSa6vnagTb0xmFaRI_IVtlmjdzLrMre5_UsX6z6wbK5KWWyp8af8yIoYuDRZR-Zkw-KjA2PJ8ekcFlBj2enYfxJaYtjqsqPZVKtQW7xgo6sWUsL1kgB1-dqD0lhxaoM8xSphcltGv-SXL56mXnFrMrO-dNt6dhVSomrfTvDLDs5rib4ffArE2h7EzHoic5FPn4G8nH5MA4R1bZyslk9YvGYSe0_8HGYe9zC09C_TGq-6u29areMqDXD059ARGDCCYeM80toyuLtqZmt-B4', 'eYdRpoZgSG2XMQKBtZpbr7:APA91bGEAuZGP8ZWyE2BmLoAR-ZOgv8ky_cLeFXa2z4QCMMaEjftwK8Tp5v1cBAjIRcUt9RYndRrJOKPRB1wJJhZyyUCYzjG7RcgiveKoQGlnrI43_OAqBG6u7QsNpAvsl2wfyQndJzh', 1, '7342', NULL, 'images/user/103/photo/IMG_20201123_141758270.jpg', '2020-12-20 10:37:24', '2020-12-27 12:56:53'),
(104, 0, 0, 0, NULL, 'George', 'georgehany3355@gmail.com', NULL, '$2y$10$rYV/1zcVz8QBk2r4aZ4FeuwevZ3bNqW7K53wxon4DOSoS4OS7f3Em', NULL, 'false', '01550296912', NULL, 'eyJ0eXAiOiJKV1QiLCJhbGciOiJSUzI1NiIsImp0aSI6ImQxNzExMjkxMGQwYTNkMmQ0NmI3OTUyMmJjMGZmZDk3MWU0NWQwYjBjYTJmMTFjMTUzMTdjNmY4M2MyMzFkYzQ3ZDg2YmNkMTI5MGMyYzEwIn0.eyJhdWQiOiIxIiwianRpIjoiZDE3MTEyOTEwZDBhM2QyZDQ2Yjc5NTIyYmMwZmZkOTcxZTQ1ZDBiMGNhMmYxMWMxNTMxN2M2ZjgzYzIzMWRjNDdkODZiY2QxMjkwYzJjMTAiLCJpYXQiOjE2MDkyNDU1MTQsIm5iZiI6MTYwOTI0NTUxNCwiZXhwIjoxNjQwNzgxNTE0LCJzdWIiOiIxMDQiLCJzY29wZXMiOltdfQ.hxrPn-gmoxIUtbeX1NeEM42U2HLL5RTlOSUqJ3SRWwWsim2w6tF2IF-giDKxVIBJcYM9kmJTf4Dqykj1HUuUmmyG75jCY8hknoQcweqkghE_XWV8ORtGjfx8eOYjnmPLc4ae71X2r_os9lwo4FQ8bAfsw1AQwn373m-CvUP4ejDkV5Fgk5DWZ0doOl8BmkGjab2F8mqsSOmJwplIRbV5MUpFxVawWSkHkvOAmuVmLl8Z1ZjPGMVLlc5ad2QYllIDBAsWwEXdSmLXp32n9EiZc7L-dJbYXmjGUwyvZfsiwnGMV3GQImHhvNN3d7DXFlA3BjJLoT-QM8M4QahbHcoTZi0Bb9qrqkVjeDmrIWXK7OchlRa4vHVsnT-tEJlncq_1ZAjmdfOlnTSDnDvspaz5qlBM_A0AE619MqjbX23llQxV0EQaeit0xZmFfLcprJp3L3zY4oBY4ms03s8q_k12nX9HOiOWplTZ8KopnjZpsfmAQhAmvAM0yOhVQMnjWfddZyKmHr71_-CUcIaUqjl0WiGN4IytjdnNOdm0KgpbcrRbfoeF9yOcZGuZ3ZcIkagKB-9gM8_8ZBgWpUUlR1xUVpBVat8zwXJi-VSdDinns6z9a4tnUo0EFQxIBSE241bHYfgNHix-7jp3H8eEvgTTsAlleQCrZn-mlstr3aNWooE', 'fY6EBKWEQDG-FVQWEDpjrO:APA91bGVUuzc0H4FlkLtMK7khdw9E6dmE9xAiWUl1cLitCt6jSuD00RbxRRjjE1CUOD3Y7t5uVKo145D7FeWpUZagHX6d4vZ1WUyIiJR5sTb4J2vOlwpV4-1giOjPnvIxvOdy4_YCupd', 1, '8297', NULL, 'images/user/104/photo/IMG_20201217_120219115.jpg', '2020-12-20 11:29:17', '2020-12-29 12:38:34'),
(105, 0, 0, 0, NULL, 'Nader Gamal', 'test@test.com', NULL, '$2y$10$/AElWV0NpZ4ExCjGpECBjuvBs04KUqCCsMTX2mMrN9gRKFu6.hLL2', NULL, 'true', '801153430338', 'egypt, ddddddddddddd, dddddd', NULL, NULL, 1, NULL, NULL, NULL, '2020-12-22 09:59:35', '2020-12-22 09:59:35'),
(106, 0, 0, 0, NULL, 'Nader Gamal', 'refaatgdsa2233@gmail.com', NULL, '$2y$10$FNongigsND1ZS25CnfZCX.iValG/i98Xuuao8m4gZYmVX.s/ZBLQC', NULL, 'false', '01153485832', NULL, 'eyJ0eXAiOiJKV1QiLCJhbGciOiJSUzI1NiIsImp0aSI6ImU0N2Y2NzdmZjFlZjgxOTZhZDlmMTEwYWJhYzA3NzAzZDYyOWY5NjU4ZThkOWQ2Y2RmNWNjNGUxY2M0ZWQ2OWFhYTVkMzUwNzZhYmRiODE4In0.eyJhdWQiOiIxIiwianRpIjoiZTQ3ZjY3N2ZmMWVmODE5NmFkOWYxMTBhYmFjMDc3MDNkNjI5Zjk2NThlOGQ5ZDZjZGY1Y2M0ZTFjYzRlZDY5YWFhNWQzNTA3NmFiZGI4MTgiLCJpYXQiOjE2MDkwNzM3NjUsIm5iZiI6MTYwOTA3Mzc2NSwiZXhwIjoxNjQwNjA5NzY1LCJzdWIiOiIxMDYiLCJzY29wZXMiOltdfQ.U237Em6GCqeucSAvcLKLs_CtFk4BmdmzkOHpHzHu-BgyxJpqxvX-SyJ5Thm9oq8wKu5ru1b7_ZBE3T06aRK1zFFqwkNM0CAxAztc6gFWQVeNgJMsNa7OA6u9cppDzAipj3oGGZLUgzJ7ai2d8AT8V7REuH_MqZRRZSD4wt7hQO4wexTjtKJSzblqqnqAtiRzB2pTrrkanrNytxjV4PC83cm47Nxdmwc-s8dFkXzlMIApuIw_aiiEtGc4WcJPJacW09FXxc5_CU-MvZzv7FBoU8z8WREV13t7jsueruiDyo65jmr9i9BEPSPi48V-EKnhd0tS1P_yD9JWByZCTkVP6sQ-tWozc3326yLJTAo38ilPWpandtM0k9HcimUBGrcj5ZJvme7IAUVYeur-UeKitbvtOMZfrhAtle2WVJd7QBD_LV6Eo2zuXi2IAKMCiX4uwMtnP7Y7n5QogtENt7yQjY-GmPof378YCPU5D9rS7Gvv0Ir9d1F80GLtIcgfT9af2e1qA9Xg0qHHyXK_3qzj56A55UA_9bRdoFzgvvhLasK2qO1S9CIiLmo09QF1E2uFugjaWJ1DiJeW1oaE1CcZVdieHUwKaO-K1k8vVnDcjvIO94KSgm2JVVrMJuSsfJTuX4nsFaASCaJ7xbgOPprxU6o2mO1RlN6LuPHxfdh8a4U', 'eYdRpoZgSG2XMQKBtZpbr7:APA91bGEAuZGP8ZWyE2BmLoAR-ZOgv8ky_cLeFXa2z4QCMMaEjftwK8Tp5v1cBAjIRcUt9RYndRrJOKPRB1wJJhZyyUCYzjG7RcgiveKoQGlnrI43_OAqBG6u7QsNpAvsl2wfyQndJzh', 1, '7279', NULL, NULL, '2020-12-22 13:51:32', '2020-12-27 12:56:21'),
(107, 0, 0, 6, NULL, 'جورج هاني فنجري جرجس', 'g.hahhny@xware.co', NULL, '$2y$10$yjNZiVyAKCbG.EeEFN1qhuvpSoO1T.r/UqAPinSD9RoAhvCzy6plq', NULL, 'true', '0155085296912', 'السراقنا - القوصيه - اسيوط', NULL, NULL, 0, NULL, NULL, NULL, '2020-12-24 09:39:27', '2020-12-24 09:39:27'),
(108, 0, 0, 0, NULL, 'agmed emam', 'dghgv@fggh.com', NULL, '$2y$10$9Pda6gKg1LIKrl4Drt6fa.dvXQ02G5IhdhwIaH1EW9WR6F.0fzTK.', NULL, 'false', '01111190368', NULL, 'eyJ0eXAiOiJKV1QiLCJhbGciOiJSUzI1NiIsImp0aSI6IjY2M2Q3NTgyZDNlODUwNWJkYzBkNDVhMjAwZDY1ZGEyODVhNjQyYTA4ZDg5ZjYzNGEwMDM2YzJjYzg1NmZjNGM4MDA0ZWU5NjlmY2YxZGEzIn0.eyJhdWQiOiIxIiwianRpIjoiNjYzZDc1ODJkM2U4NTA1YmRjMGQ0NWEyMDBkNjVkYTI4NWE2NDJhMDhkODlmNjM0YTAwMzZjMmNjODU2ZmM0YzgwMDRlZTk2OWZjZjFkYTMiLCJpYXQiOjE2MDkxNjMwNTAsIm5iZiI6MTYwOTE2MzA1MCwiZXhwIjoxNjQwNjk5MDUwLCJzdWIiOiIxMDgiLCJzY29wZXMiOltdfQ.wctw0qUpXJBKMe3mdaV3l3LtSd6Qg9xvXi1IqZIuH6_JkWAiiBBEmNkKmaQj_imwtlS7xUSTZrX_M8d2WpTUZB5jrydn-4OLhF8aO72ovHSfhBPaNQyjH9PsklUzbkDhZl3kCxyk8fBO9LdLavrAySI3ybaOGatPCJmfNQj-FhFLux6NM8RxshCJTS4AgjdOWMeZN-OkmJQoEUCUj7V1XYVKnDlNDJb7fMBoDO963eJGH7T3tsnCJDLsGv0apVPR0nIzedQcq0XzdWILdGGndjrcwcvtdjMEjh4cvPvY40bE0oWM6Uz9SjliRPMvf5YJmWaCEliU2D8e1Z4aPNFv2hshaxcUoGkaXX03vlCJ6u59mO_LDP3QZPHLCk3pG8kl2-BIfjfBcIaYdkW-KYRBnQcV4z0USzPke2hg9ZhqlYWzaKpNP0kIyu1mUP3kdwAJ8aJeZbU2P0r3euddmgZF82KZoWBd0njQKDj8PfAB1bglaw2IA1KvSVQaJS0oMgnnQoeMhrktdTUID0OnsSQ0JtTvVVKQ9rLxVQAzCPOboijVoIo21G4YCA0lF4wkbVHeFjImFt0PP5J6V0gu12j8RNSm2pjuH3ui8kRAlgDKcpyupF8MvOy7X-V91x0KVp6A9hzzXCeRzmW4kDjxvOBQECeYFbC1_YlhWcbs98JpINg', 'de4N-6M6S9qpiqpwpqLPPR:APA91bH5s_y1411bbraed4unZD0ogTYUZ959GUdn8hUnBukNmAwjfRdd5_6uGsC5BzuLz_pbUlPbZVUtxivf9Xu-Ky1xX8pKL9XClJjW37E7lbXHpZ1YeDdgLBPdQs2x8N0gMBYpKY_1', 1, '9172', NULL, 'images/user/108/photo/IMG_20201228_155745994.jpg', '2020-12-28 13:44:10', '2020-12-28 13:57:48'),
(109, 0, 0, 0, NULL, 'Nader Gamal', 'refaatgdsa223@gmail.com', NULL, '$2y$10$y9NrqIBe7A2E.fFxY/FziuAPJLQgMGC/PqiM2IHUWdfjBdve/Ha6q', NULL, 'false', '01153485885', NULL, 'eyJ0eXAiOiJKV1QiLCJhbGciOiJSUzI1NiIsImp0aSI6ImYwODIxYTNmNmExOWE1MGVhZTQ1ZjRlNWY4MGExYWM1MzMzNGYwYTMwM2U2NjljNGUwMWQ0YzhhZDc2MmY5MDYyMzg1ZWFiYzRjZmYxMjNiIn0.eyJhdWQiOiIxIiwianRpIjoiZjA4MjFhM2Y2YTE5YTUwZWFlNDVmNGU1ZjgwYTFhYzUzMzM0ZjBhMzAzZTY2OWM0ZTAxZDRjOGFkNzYyZjkwNjIzODVlYWJjNGNmZjEyM2IiLCJpYXQiOjE2MDkxNjUyNDYsIm5iZiI6MTYwOTE2NTI0NiwiZXhwIjoxNjQwNzAxMjQ2LCJzdWIiOiIxMDkiLCJzY29wZXMiOltdfQ.qm1yqc4dGX4xUEhU3O3tq_u6RqZY48D2niq0i1b0k993CAgz-_JTjbaswAOSH9VC9jmAge_xJCyCEYTiDzFA1g9cGGEtvYdKnYWz714yK8HUM_yltkksnGC7Xt-67GVlYEq9DZYlKhL3jdzAPOqa-aCk4gT2CPYn2cC5WEC3s0tBCBHbPeX7FLdw4j_foIEp251bfquzvzWRnLJCjmPum6MChru86hF3IjHLApnHvMYxL4TkieaGG_mIdBlrpNL_mbuLkrEO7k_uN7S8iIuugYhc6jKRDFLsh-SirZnGeCoe2pa5maachn-F0myNJwIfIsgfzjwdGzDwVms4mKHprlg0aCAu86kQEZQjFIjN99NHFvTBT0ofWfDkO-IWaYG_bGLF_tPqSqhhd24lwXJPmZ1008YUeBCBqqo8mswnwVYltQAELxB29fz7N7e129ix11ixVxONEUQRF_8i3Nyr1QUR63EBOjrt4l_6fF_Lhffxwqu-rV9kss-qKoENlKgXkzWPoD00LPjOmhe6lcdJnui0AQU92dn-kotR0ERN4aZeMpD9uBD0xTmWfrBWR4cxWlw7QgBYucwHlZv7daYcNPY9n1mLBYomxV90YyOQuUmNXKsGTZjZ_b5tsi4mqfB8kKyNCdLodljkWBaC05U4Dk8bib6gzMsX-cj7HI0h6vY', 'dsssdsddfdsfdfdfsdfdsfdsf', 1, '8671', NULL, NULL, '2020-12-28 14:20:46', '2020-12-28 14:23:05'),
(110, 0, 0, 0, NULL, 'jo', 'jo@gmail.com', NULL, '$2y$10$UzGz8bkMPHkS1pP07ooQsO.9rk695KgRKCc2rnwRtjdyOxbEwzNvW', NULL, 'false', '0123', NULL, 'eyJ0eXAiOiJKV1QiLCJhbGciOiJSUzI1NiIsImp0aSI6IjQwMjdlMjEwMmMxYTk4OWRkYjZlMGZjMGIzNDNhYWY5YWRiZDQwZGI0MDBjOGQ3NTRlMThkMjc2MWM4MWViNTA0NGFjMzY5NmNiZjE2ZTAzIn0.eyJhdWQiOiIxIiwianRpIjoiNDAyN2UyMTAyYzFhOTg5ZGRiNmUwZmMwYjM0M2FhZjlhZGJkNDBkYjQwMGM4ZDc1NGUxOGQyNzYxYzgxZWI1MDQ0YWMzNjk2Y2JmMTZlMDMiLCJpYXQiOjE2MDkxNjU5NTQsIm5iZiI6MTYwOTE2NTk1NCwiZXhwIjoxNjQwNzAxOTU0LCJzdWIiOiIxMTAiLCJzY29wZXMiOltdfQ.KDMM9O--hZBRY91U3H8pUT1wQ3eQJxxQyt3Xjwwawp_dvIXKHMbT3bcxKKYs2VlZAvrkwjhH2o15CVDbSLCN4Lcmp4emOUK-sOwNlyjU694mE8NlL8-Omf_94L3e-6M16mzLzbeYyGRag0Q9Q55Jl8i2VyFUCcR4Bt5x-d1B35N3riq3DtdN-RtSQXLR1ZAHS1jnpUelSbJzYScuZ56E107Z3mE8kX67iLetDjOjVP9IXNyyzE1TA4AbHroKq-qJYUQwFLf-6jyoPufFiw3jWKitMlFz3MtKlbdRqpfO3Yk1OMOCybBaYkGleMp4M-xkIUGbalZq_6mYHfzYs9tGPR2ooOCzLInzwY1YShl6T4092K7Cmc-y_gZPa3RjCkbIJGIkXeuwTWOV2reENY6YMuZ04cknBF8zHs7HlV5S8PhjlJsolue_GkxRFx1esJyfk98RfcA6dtlG3Qjkazhl3pvVQSe9lM3d2ZTWP3ON9oSg_FbrSiTmfLhIiNjDaECVgUiDi3Tm801mCjrg2QbwRI3jk7j00JPUIInUdLZuwKTH6sPXrxJrSHEInZH05o4Uu8kAZ36DfNE_WE5tgluh4gRwbzjhr88Y_issM5iTpZo7v1p4vqxnLqlLtTw-iBQiW2xB0B8FeT51P1D7L88u0mA3VeFzG4VvICZsX840E-M', 'de4N-6M6S9qpiqpwpqLPPR:APA91bH5s_y1411bbraed4unZD0ogTYUZ959GUdn8hUnBukNmAwjfRdd5_6uGsC5BzuLz_pbUlPbZVUtxivf9Xu-Ky1xX8pKL9XClJjW37E7lbXHpZ1YeDdgLBPdQs2x8N0gMBYpKY_1', 1, '4929', NULL, NULL, '2020-12-28 14:26:41', '2020-12-28 14:33:10');

-- --------------------------------------------------------

--
-- Table structure for table `weeks`
--

CREATE TABLE `weeks` (
  `id` int(11) NOT NULL,
  `name` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `weeks`
--

INSERT INTO `weeks` (`id`, `name`) VALUES
(1, 'الأثنين'),
(2, 'الثلاثاء'),
(3, 'الأربعاء'),
(4, 'الخميس'),
(5, 'الجمعة'),
(6, 'السبت'),
(7, 'الأحد');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `areas`
--
ALTER TABLE `areas`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `area_restorants`
--
ALTER TABLE `area_restorants`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `branches`
--
ALTER TABLE `branches`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `branch_offers`
--
ALTER TABLE `branch_offers`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `branch_photos`
--
ALTER TABLE `branch_photos`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `cobon_users`
--
ALTER TABLE `cobon_users`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `complaints`
--
ALTER TABLE `complaints`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `discount_cobons`
--
ALTER TABLE `discount_cobons`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `faq_admins`
--
ALTER TABLE `faq_admins`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `faq_ratings`
--
ALTER TABLE `faq_ratings`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `features`
--
ALTER TABLE `features`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `follwers`
--
ALTER TABLE `follwers`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `meals`
--
ALTER TABLE `meals`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `model_has_permissions`
--
ALTER TABLE `model_has_permissions`
  ADD PRIMARY KEY (`permission_id`,`model_id`,`model_type`),
  ADD KEY `model_has_permissions_model_id_model_type_index` (`model_id`,`model_type`);

--
-- Indexes for table `model_has_roles`
--
ALTER TABLE `model_has_roles`
  ADD PRIMARY KEY (`role_id`,`model_id`,`model_type`),
  ADD KEY `model_has_roles_model_id_model_type_index` (`model_id`,`model_type`);

--
-- Indexes for table `notifications`
--
ALTER TABLE `notifications`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `oauth_access_tokens`
--
ALTER TABLE `oauth_access_tokens`
  ADD PRIMARY KEY (`id`),
  ADD KEY `oauth_access_tokens_user_id_index` (`user_id`);

--
-- Indexes for table `oauth_auth_codes`
--
ALTER TABLE `oauth_auth_codes`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `oauth_clients`
--
ALTER TABLE `oauth_clients`
  ADD PRIMARY KEY (`id`),
  ADD KEY `oauth_clients_user_id_index` (`user_id`);

--
-- Indexes for table `oauth_personal_access_clients`
--
ALTER TABLE `oauth_personal_access_clients`
  ADD PRIMARY KEY (`id`),
  ADD KEY `oauth_personal_access_clients_client_id_index` (`client_id`);

--
-- Indexes for table `oauth_refresh_tokens`
--
ALTER TABLE `oauth_refresh_tokens`
  ADD PRIMARY KEY (`id`),
  ADD KEY `oauth_refresh_tokens_access_token_id_index` (`access_token_id`);

--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `order_products`
--
ALTER TABLE `order_products`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `order_ratings`
--
ALTER TABLE `order_ratings`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `pages`
--
ALTER TABLE `pages`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `permissions`
--
ALTER TABLE `permissions`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `product_branches`
--
ALTER TABLE `product_branches`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `product_groups`
--
ALTER TABLE `product_groups`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `product_group_options`
--
ALTER TABLE `product_group_options`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `product_meals`
--
ALTER TABLE `product_meals`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `ratings`
--
ALTER TABLE `ratings`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `regions`
--
ALTER TABLE `regions`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `restorants`
--
ALTER TABLE `restorants`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `restorant_ratings`
--
ALTER TABLE `restorant_ratings`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `roles`
--
ALTER TABLE `roles`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `role_has_permissions`
--
ALTER TABLE `role_has_permissions`
  ADD PRIMARY KEY (`permission_id`,`role_id`),
  ADD KEY `role_has_permissions_role_id_foreign` (`role_id`);

--
-- Indexes for table `settings`
--
ALTER TABLE `settings`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `types`
--
ALTER TABLE `types`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `type_restorants`
--
ALTER TABLE `type_restorants`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `weeks`
--
ALTER TABLE `weeks`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `areas`
--
ALTER TABLE `areas`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `area_restorants`
--
ALTER TABLE `area_restorants`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=79;

--
-- AUTO_INCREMENT for table `branches`
--
ALTER TABLE `branches`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `branch_offers`
--
ALTER TABLE `branch_offers`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT for table `branch_photos`
--
ALTER TABLE `branch_photos`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=39;

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `cobon_users`
--
ALTER TABLE `cobon_users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `complaints`
--
ALTER TABLE `complaints`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `discount_cobons`
--
ALTER TABLE `discount_cobons`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `faq_admins`
--
ALTER TABLE `faq_admins`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `faq_ratings`
--
ALTER TABLE `faq_ratings`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- AUTO_INCREMENT for table `features`
--
ALTER TABLE `features`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `follwers`
--
ALTER TABLE `follwers`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `meals`
--
ALTER TABLE `meals`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=61;

--
-- AUTO_INCREMENT for table `notifications`
--
ALTER TABLE `notifications`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=33;

--
-- AUTO_INCREMENT for table `oauth_clients`
--
ALTER TABLE `oauth_clients`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `oauth_personal_access_clients`
--
ALTER TABLE `oauth_personal_access_clients`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `order_products`
--
ALTER TABLE `order_products`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `order_ratings`
--
ALTER TABLE `order_ratings`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `pages`
--
ALTER TABLE `pages`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `permissions`
--
ALTER TABLE `permissions`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=177;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `product_branches`
--
ALTER TABLE `product_branches`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=85;

--
-- AUTO_INCREMENT for table `product_groups`
--
ALTER TABLE `product_groups`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT for table `product_group_options`
--
ALTER TABLE `product_group_options`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=50;

--
-- AUTO_INCREMENT for table `product_meals`
--
ALTER TABLE `product_meals`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;

--
-- AUTO_INCREMENT for table `ratings`
--
ALTER TABLE `ratings`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `regions`
--
ALTER TABLE `regions`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `restorants`
--
ALTER TABLE `restorants`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `restorant_ratings`
--
ALTER TABLE `restorant_ratings`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `roles`
--
ALTER TABLE `roles`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `settings`
--
ALTER TABLE `settings`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `types`
--
ALTER TABLE `types`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `type_restorants`
--
ALTER TABLE `type_restorants`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=39;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=111;

--
-- AUTO_INCREMENT for table `weeks`
--
ALTER TABLE `weeks`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `model_has_permissions`
--
ALTER TABLE `model_has_permissions`
  ADD CONSTRAINT `model_has_permissions_permission_id_foreign` FOREIGN KEY (`permission_id`) REFERENCES `permissions` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `model_has_roles`
--
ALTER TABLE `model_has_roles`
  ADD CONSTRAINT `model_has_roles_role_id_foreign` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `role_has_permissions`
--
ALTER TABLE `role_has_permissions`
  ADD CONSTRAINT `role_has_permissions_permission_id_foreign` FOREIGN KEY (`permission_id`) REFERENCES `permissions` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `role_has_permissions_role_id_foreign` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

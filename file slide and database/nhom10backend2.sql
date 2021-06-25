-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Máy chủ: 127.0.0.1:3306
-- Thời gian đã tạo: Th6 25, 2021 lúc 06:32 AM
-- Phiên bản máy phục vụ: 5.7.31
-- Phiên bản PHP: 7.3.21

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Cơ sở dữ liệu: `nhom10backend2`
--

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `bills`
--

DROP TABLE IF EXISTS `bills`;
CREATE TABLE IF NOT EXISTS `bills` (
  `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `user_id` int(11) DEFAULT NULL,
  `total_money` double DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `shipping_id` int(10) UNSIGNED NOT NULL,
  PRIMARY KEY (`id`),
  KEY `bills_user_id_foreign` (`user_id`),
  KEY `bills_shipping_id_foreign` (`shipping_id`)
) ENGINE=MyISAM AUTO_INCREMENT=44 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `bills`
--

INSERT INTO `bills` (`id`, `user_id`, `total_money`, `created_at`, `updated_at`, `shipping_id`) VALUES
(16, 5, 769000, NULL, NULL, 23),
(15, 5, 2636000, NULL, NULL, 22),
(14, 6, 5327000, NULL, NULL, 21),
(17, 6, 17574000, NULL, NULL, 24),
(18, 6, 17574000, NULL, NULL, 25),
(19, 6, 17574000, NULL, NULL, 26),
(20, 6, 200, NULL, NULL, 27),
(21, 6, 200, NULL, NULL, 28),
(22, 5, 2127000, NULL, NULL, 29),
(23, 5, 4219000, NULL, NULL, 30),
(24, 5, 4219000, NULL, NULL, 31),
(25, 5, 2457000, NULL, NULL, 32),
(26, 5, 2657000, NULL, NULL, 33),
(27, 6, 18072000, NULL, NULL, 34),
(28, 6, 4957000, NULL, NULL, 35),
(29, 6, 819000, NULL, NULL, 36),
(30, 6, 819000, NULL, NULL, 37),
(31, 5, 200, NULL, NULL, 38),
(32, 11, 3837000, NULL, NULL, 39),
(33, 11, 1019000, NULL, NULL, 40),
(34, 11, 819000, NULL, NULL, 41),
(35, 11, 2857000, NULL, NULL, 42),
(36, 11, 819000, NULL, NULL, 43),
(37, 5, 819000, NULL, NULL, 44),
(38, 13, 819000, NULL, NULL, 45),
(39, 13, 2038000, NULL, NULL, 46),
(40, 13, 1279369, NULL, NULL, 47),
(41, 14, 819000, NULL, NULL, 48),
(42, 5, 2038000, NULL, NULL, 49),
(43, 5, 4518000, NULL, NULL, 50);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `bill__details`
--

DROP TABLE IF EXISTS `bill__details`;
CREATE TABLE IF NOT EXISTS `bill__details` (
  `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `bill_id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `amount` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `total_money` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `bill__details_bill_id_foreign` (`bill_id`),
  KEY `bill__details_product_id_foreign` (`product_id`)
) ENGINE=MyISAM AUTO_INCREMENT=64 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `bill__details`
--

INSERT INTO `bill__details` (`id`, `bill_id`, `product_id`, `amount`, `created_at`, `updated_at`, `total_money`) VALUES
(27, 15, 29, 4, NULL, NULL, 2636000),
(26, 14, 106, 3, NULL, NULL, 2370000),
(25, 14, 101, 1, NULL, NULL, 500000),
(24, 14, 11, 3, NULL, NULL, 2457000),
(20, 12, 2, 1, NULL, NULL, 200),
(19, 12, 1, 1, NULL, NULL, 100),
(18, 11, 3, 1, NULL, NULL, 350),
(17, 11, 39, 1, NULL, NULL, 639000),
(16, 11, 2, 1, NULL, NULL, 200),
(28, 16, 37, 1, NULL, NULL, 769000),
(29, 17, 6, 6, NULL, NULL, 17574000),
(30, 18, 6, 6, NULL, NULL, 17574000),
(31, 19, 6, 6, NULL, NULL, 17574000),
(32, 20, 2, 1, NULL, NULL, 200),
(33, 21, 2, 1, NULL, NULL, 200),
(34, 22, 27, 3, NULL, NULL, 2127000),
(35, 23, 35, 2, NULL, NULL, 3400000),
(36, 23, 12, 1, NULL, NULL, 819000),
(37, 24, 35, 2, NULL, NULL, 3400000),
(38, 24, 12, 1, NULL, NULL, 819000),
(39, 25, 11, 3, NULL, NULL, 2457000),
(40, 26, 11, 2, NULL, NULL, 1638000),
(41, 26, 13, 1, NULL, NULL, 1019000),
(42, 27, 10, 4, NULL, NULL, 18072000),
(43, 28, 135, 3, NULL, NULL, 2100000),
(44, 28, 11, 1, NULL, NULL, 819000),
(45, 28, 17, 2, NULL, NULL, 2038000),
(46, 29, 11, 1, NULL, NULL, 819000),
(47, 30, 12, 1, NULL, NULL, 819000),
(48, 31, 153, 1, NULL, NULL, 200),
(49, 32, 20, 2, NULL, NULL, 2558000),
(50, 32, 18, 1, NULL, NULL, 1279000),
(51, 33, 13, 1, NULL, NULL, 1019000),
(52, 34, 12, 1, NULL, NULL, 819000),
(53, 35, 11, 1, NULL, NULL, 819000),
(54, 35, 13, 2, NULL, NULL, 2038000),
(55, 36, 12, 1, NULL, NULL, 819000),
(56, 37, 11, 1, NULL, NULL, 819000),
(57, 38, 11, 1, NULL, NULL, 819000),
(58, 39, 13, 2, NULL, NULL, 2038000),
(59, 40, 14, 1, NULL, NULL, 1279000),
(60, 40, 5, 1, NULL, NULL, 369),
(61, 41, 147, 1, NULL, NULL, 819000),
(62, 42, 13, 2, NULL, NULL, 2038000),
(63, 43, 10, 1, NULL, NULL, 4518000);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `genders`
--

DROP TABLE IF EXISTS `genders`;
CREATE TABLE IF NOT EXISTS `genders` (
  `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `gender_name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `genders`
--

INSERT INTO `genders` (`id`, `gender_name`, `created_at`, `updated_at`) VALUES
(1, 'Men', NULL, NULL),
(2, 'Women', NULL, NULL);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `infos`
--

DROP TABLE IF EXISTS `infos`;
CREATE TABLE IF NOT EXISTS `infos` (
  `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `NSX` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `product_id` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `infos_product_id_foreign` (`product_id`)
) ENGINE=MyISAM AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `infos`
--

INSERT INTO `infos` (`id`, `NSX`, `product_id`, `created_at`, `updated_at`) VALUES
(1, 'apple', 1, NULL, NULL),
(2, 'google', 2, NULL, NULL);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `manufactures`
--

DROP TABLE IF EXISTS `manufactures`;
CREATE TABLE IF NOT EXISTS `manufactures` (
  `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `manu_name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `manufactures`
--

INSERT INTO `manufactures` (`id`, `manu_name`, `created_at`, `updated_at`) VALUES
(1, 'Nike', NULL, NULL),
(2, 'Adidas', NULL, NULL),
(3, 'Puma', NULL, NULL),
(4, 'Kappa', NULL, NULL),
(5, 'Fila', NULL, NULL);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `migrations`
--

DROP TABLE IF EXISTS `migrations`;
CREATE TABLE IF NOT EXISTS `migrations` (
  `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `migration` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=18 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2021_05_09_035400_create_users_table', 1),
(2, '2021_05_09_035457_create_protypes_table', 1),
(3, '2021_05_09_035521_create_manufactures_table', 1),
(4, '2021_05_09_035542_create_genders_table', 1),
(5, '2021_05_09_035557_create_products_table', 1),
(6, '2021_05_09_035614_create_product__images_table', 1),
(7, '2021_05_09_035636_create_bills_table', 1),
(8, '2021_05_09_035655_create_bill__details_table', 1),
(9, '2021_05_09_035845_create_type__users_table', 1),
(10, '2014_10_12_100000_create_password_resets_table', 2),
(11, '2021_05_10_143911_add_image_column_for_product_table', 2),
(12, '2021_05_26_082921_sanpham', 3),
(13, '2021_05_26_083233_create_sanpham_table', 3),
(14, '2021_06_04_021703_create_shipping__infos_table', 3),
(15, '2021_06_05_040003_updatebilltable', 4),
(16, '2021_06_10_142153_create_ratings_table', 5),
(17, '2021_06_11_150442_add_column_ratingname_into_ratings_table', 6);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `password_resets`
--

DROP TABLE IF EXISTS `password_resets`;
CREATE TABLE IF NOT EXISTS `password_resets` (
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  KEY `password_resets_email_index` (`email`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `products`
--

DROP TABLE IF EXISTS `products`;
CREATE TABLE IF NOT EXISTS `products` (
  `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `price` double NOT NULL,
  `type_id` int(11) NOT NULL,
  `manu_id` int(11) NOT NULL,
  `description` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `sale` int(11) NOT NULL,
  `size` int(11) NOT NULL,
  `gender` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `image` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  PRIMARY KEY (`id`),
  KEY `products_type_id_foreign` (`type_id`),
  KEY `products_manu_id_foreign` (`manu_id`),
  KEY `products_gender_foreign` (`gender`)
) ENGINE=MyISAM AUTO_INCREMENT=155 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `products`
--

INSERT INTO `products` (`id`, `name`, `price`, `type_id`, `manu_id`, `description`, `sale`, `size`, `gender`, `created_at`, `updated_at`, `image`) VALUES
(1, 'Nike Air III', 100, 2, 1, 'The people\'s shoe returns with the Nike Air Max III. This faithful remake showcases a timeless mix of OG colors', 30, 40, 1, '2021-05-09 09:11:47', '2021-05-09 09:11:47', 'nike1_3.jpg'),
(2, 'Nike Air VaporMax Evo', 200, 2, 1, 'The Nike Air VaporMax Evo puts Air Max DNA under the microscope, to showcase the distinguishing features of 7 Nike icons.', 30, 40, 1, '2021-05-09 09:11:47', '2021-05-09 09:11:47', 'nike2_3.jpg\r\n'),
(3, 'Nike Air Max 90', 350, 2, 1, 'Nothing as fly, nothing as comfortable, nothing as proven—the Nike Air Max 90 stays true to its roots with the iconic Waffle sole', 30, 41, 1, '2021-05-09 09:54:30', '2021-05-09 09:54:30', 'nike3_3.jpg'),
(4, 'Air Jordan 1 Mid', 500, 2, 1, 'The Air Jordan 1 Mid Shoe is inspired by the first AJ1, offering fans of Jordan retros a chance to follow in the footsteps of greatness', 10, 42, 2, '2021-05-09 09:11:47', '2021-05-09 09:11:47', 'nike4_2.jpg'),
(5, 'Jordan MA2 \'Still Loading', 369, 2, 1, 'Lace up your journey in the Jordan MA2 \'Still Loading\'. Inspired by our unlimited potential as athletes*', 20, 41, 1, '2021-05-09 09:54:30', '2021-05-09 09:54:30', 'nike5_3.jpg'),
(6, 'Nike Waffle One\r\n', 2929000, 2, 1, 'Bringing a new look to the Waffle sneaker family, the Nike Waffle One balances everything you love about heritage Nike running with fresh innovations', 20, 39, 2, '2021-05-09 09:11:47', '2021-05-09 09:11:47', 'nike6_3.jpg'),
(7, 'Nike Waffle Racer 2X', 2929000, 2, 1, 'Revamping classic Nike running shoes, the Nike Waffle Racer 2X modernises the traditional moccasin-inspired upper and Waffle outsole with exaggerated details.', 20, 41, 2, '2021-05-09 09:54:30', '2021-05-09 09:54:30', 'nike7_2.jpg'),
(8, 'Nike Waffle Racer Crater', 2929000, 2, 1, 'Putting a fresh twist on the 1977 OG, the Nike Waffle Racer Crater combines super-plush Crater Foam with Nike Grind rubber details for a rugged, athletics-inspired look', 40, 40, 2, '2021-05-09 10:07:21', '2021-05-09 10:07:21', 'nike8_2.jpg'),
(9, 'Nike Air VaporMax 2020 Flyknit', 6459000, 2, 1, 'Designed with sustainability in mind, the Nike Air VaporMax 2020 Flyknit is made from at least 50% recycled content by weight. ', 20, 41, 2, '2021-05-09 09:54:30', '2021-05-09 09:54:30', 'nike9_3.jpg'),
(10, 'Nike Air VaporMax 2020 Flyknit', 4518000, 2, 1, 'Designed with sustainability in mind, the Nike Air VaporMax 2020 Flyknit is made from at least 50% recycled content by weight.', 10, 40, 2, '2021-05-09 10:12:51', '2021-05-09 10:12:51', 'nike10_2.jpg'),
(11, 'Nike Sportswear', 819000, 1, 1, 'Complement your favourite sneakers in the comfort of the Nike Sportswear T-Shirt. Its everyday fabric and classic fit provide a soft, familiar feel.', 20, 40, 2, '2021-05-09 09:11:47', '2021-05-09 09:11:47', 'clothing_11_1.jpg'),
(12, 'Jordan Jumpman Classics', 819000, 1, 1, 'Ready for take-off. The Jordan Jumpman Classics T-Shirt riffs on an iconic Michael Jordan image with a fresh, bold-letter graphic.', 20, 42, 2, '2021-05-09 09:54:30', '2021-05-09 09:54:30', 'clothing_12_2.jpg'),
(13, 'Jordan Sport DNA', 1019000, 1, 1, 'Rise in the Jordan Sport DNA Long-Sleeve Crew, a cotton-made tee with multicolour heritage graphics.', 20, 39, 2, '2021-05-09 09:11:47', '2021-05-09 09:11:47', 'clothing_13_1.jpg'),
(14, 'Jordan Jumpman Classics', 1279000, 1, 1, 'The Jordan Jumpman Classics Shorts are made from softly brushed French terry for comfort. They have an easy, relaxed feel and come with a toggle-adjustable waistband.', 20, 40, 2, '2021-05-09 09:54:30', '2021-05-09 09:54:30', 'clothing_14_1.jpg'),
(15, 'Jordan Sport DNA', 1019000, 1, 1, 'Rise in the Jordan Sport DNA Long-Sleeve Crew, a cotton-made tee with multicolour heritage graphics.', 20, 39, 2, '2021-05-09 09:11:47', '2021-05-09 09:11:47', 'clothing_15_1.jpg'),
(16, 'Jordan Jumpman Classics', 1279000, 1, 1, 'The Jordan Jumpman Classics Shorts are made from softly brushed French terry for comfort. They have an easy, relaxed feel and come with a toggle-adjustable waistband.', 20, 40, 1, '2021-05-09 09:54:30', '2021-05-09 09:54:30', 'clothing_16_2.jpg'),
(17, 'Jordan Sport DNA', 1019000, 1, 1, 'Rise in the Jordan Sport DNA Long-Sleeve Crew, a cotton-made tee with multicolour heritage graphics.', 20, 39, 1, '2021-05-09 09:11:47', '2021-05-09 09:11:47', 'clothing_17_1.jpg'),
(18, 'Jordan Jumpman Classics', 1279000, 1, 1, 'The Jordan Jumpman Classics Shorts are made from softly brushed French terry for comfort. They have an easy, relaxed feel and come with a toggle-adjustable waistband.', 20, 40, 1, '2021-05-09 09:54:30', '2021-05-09 09:54:30', 'clothing_18_1.jpg'),
(19, 'Jordan Sport DNA', 1019000, 1, 1, 'Rise in the Jordan Sport DNA Long-Sleeve Crew, a cotton-made tee with multicolour heritage graphics.', 20, 39, 1, '2021-05-09 09:11:47', '2021-05-09 09:11:47', 'clothing_19_1.jpg'),
(20, 'Jordan Jumpman Classics', 1279000, 1, 1, 'The Jordan Jumpman Classics Shorts are made from softly brushed French terry for comfort. They have an easy, relaxed feel and come with a toggle-adjustable waistband.', 20, 40, 1, '2021-05-09 09:54:30', '2021-05-09 09:54:30', 'clothing_20_1.jpg'),
(27, 'Nike Dri-FIT Pro', 709000, 3, 1, 'Run those backroads in cool comfort with the Nike Dri-FIT Pro Cap. Its adjustable design lets you control the fit and coverage.', 20, 32, 1, '2021-05-09 09:11:47', '2021-05-09 09:11:47', 'hat27_1.jpg'),
(28, 'Jordan Jumpman Heritage86', 559000, 3, 1, 'Top off your look and take flight. The Jordan Jumpman Heritage86 Hat offers the classic look and feel of an unstructured crown and a pre-curved bill. ', 20, 32, 1, '2021-05-09 16:49:03', '2021-05-09 16:49:03', 'hat28_1.jpg'),
(21, 'Nike Sportswear Heritage 86', 539000, 3, 1, 'The Nike Sportswear Heritage 86 Cap is a classic 6-panel design with sweat-wicking support.', 20, 32, 1, '2021-05-09 10:50:06', '2021-05-09 10:50:06', 'hat21_1.jpg'),
(22, 'Nike Sportswear Heritage 86', 53900, 3, 1, 'The Nike Sportswear Heritage 86 Cap is a classic 6-panel design with sweat-wicking support.', 20, 32, 1, '2021-05-09 15:26:49', '2021-05-09 15:26:49', 'hat22_1.jpg'),
(26, 'Nike Dri-FIT Tailwind Fast', 599000, 3, 1, 'Wear your fast with a look that\'s built for speed.Sleek and cool, the Nike Dri-FIT Tailwind Fast Cap helps keep you covered through your miles.', 20, 32, 1, '2021-05-09 16:43:38', '2021-05-09 16:43:38', 'hat26_1.jpg'),
(23, 'Nike AeroBill Legacy91', 559000, 3, 1, 'The Nike AeroBill Legacy91 Hat features the power of sweat-wicking technology and the enhanced breathability of laser perforations around the front', 10, 32, 2, '2021-05-09 10:12:51', '2021-05-09 10:12:51', 'hat23_1.jpg'),
(24, 'Nike Sportswear Dri-FIT Pro Futura', 659000, 3, 1, 'The Nike Sportswear Cap features the classic comfort of a 6-panel design, flat bill and adjustable back closure.', 10, 32, 2, '2021-05-09 09:11:47', '2021-05-09 09:11:47', 'hat24_1.jpg'),
(25, 'Paris Saint-Germain Pro', 819000, 3, 1, 'Keep your head in the game with the Paris Saint-Germain Pro Cap. Its high, structured crown is made from a wool and rayon blend.', 20, 32, 2, '2021-05-09 09:54:30', '2021-05-09 09:54:30', 'hat25_1.jpg'),
(29, 'Nike Sportswear Dri-FIT Pro Futura', 659000, 3, 1, 'The Nike Sportswear Cap features the classic comfort of a 6-panel design, flat bill and adjustable back closure. ', 20, 32, 2, '2021-05-09 10:12:51', '2021-05-09 10:12:51', 'hat29_1.jpg'),
(30, 'Nike Sportswear Dri-FIT Pro Futura', 539000, 3, 1, 'The Nike Sportswear Cap features the classic comfort of a 6-panel design, flat bill and adjustable back closure.', 20, 32, 2, '2021-05-09 10:50:06', '2021-05-09 10:50:06', 'hat30_1.jpg'),
(31, 'Nike Heritage', 369000, 4, 1, 'Keep the small stuff out of your pockets with the Nike Heritage Cross-Body Bag. Zipped compartments help keep your essentials organised', 10, 32, 1, '2021-05-10 07:17:12', '2021-05-10 07:17:12', 'nike_bag_31_1.jpg'),
(32, 'Nike Air', 769000, 4, 1, 'The Nike Air Small Items Bag features a durable design with multiple compartments so you can stay organised throughout your day. ', 10, 32, 1, '2021-05-09 16:49:03', '2021-05-09 16:49:03', 'nike_bag_32_1.jpg'),
(33, 'Nike Air Tech', 1019000, 4, 1, 'Compact and convenient, the Nike Air Tech Hip Pack offers quick storage to help you move through your day in style. ', 10, 32, 2, '2021-05-09 10:12:51', '2021-05-09 10:12:51', 'nike_bag_33_1.jpg'),
(34, 'Nike Sportswear Heritage', 819000, 4, 1, 'Street-ready and fresh, the Nike Sportswear Hip Pack might become your go-to bag for quick trips.', 15, 32, 2, '2021-05-10 07:21:32', '2021-05-10 07:21:32', 'nike_bag_34_1.jpg'),
(35, 'Nike Tech', 1700000, 4, 1, 'With 3 zipped compartments and a loop for clipping keys, the Nike Tech Hip Pack might become your go-to for quick trips. ', 15, 32, 1, '2021-05-10 07:21:32', '2021-05-10 07:21:32', 'nike_bag_35_1.jpg'),
(37, 'Nike Heritage 2.0', 769000, 4, 1, 'The Nike Heritage 2.0 Small Items Bag features a durable design with multiple compartments so you can stay organised as you go through your day.', 25, 32, 1, '2021-05-10 07:24:31', '2021-05-10 07:24:31', 'nike_bag_37_1.jpg'),
(36, 'Nike Sportswear Essentials', 819000, 4, 1, 'The Nike Sportswear Hip Pack keeps your essentials close with multiple pockets. The convenient cross-body strap lets you change how you carry it on the go. ', 25, 32, 2, '2021-05-10 07:24:31', '2021-05-10 07:24:31', 'nike_bag_36_1.jpg'),
(38, 'Nike Heritage', 819000, 4, 1, 'The Nike Heritage 2.0 Small Items Bag features a durable design with multiple compartments so you can stay organised as you go through your day.', 20, 32, 2, '2021-05-09 09:11:47', '2021-05-09 09:11:47', 'nike_bag_38_1.jpg'),
(39, 'Nike Sportswear Heritage', 639000, 4, 1, 'The Nike Heritage Hip Pack lets you easily access and carry your gear. It features a padded, adjustable strap allowing you to customise your fit.', 40, 32, 1, '2021-05-09 09:54:30', '2021-05-09 09:54:30', 'nike_bag_39_1.jpg'),
(40, 'Nike Heritage', 528000, 4, 1, 'Street-ready and timeless, the Nike Heritage Hip Pack is your go-to bag for quick trips. The large main zip compartment lets you secure essentials', 10, 32, 2, '2021-05-09 10:12:51', '2021-05-09 10:12:51', 'nike_bag_40_1.jpg'),
(41, 'Nike Kawa SE 2', 819000, 5, 1, 'The Nike Kawa SE 2 Slide is all about a comfy option for getting out of the door fast or helping feet recover after game time. ', 0, 38, 1, '2021-05-10 07:21:32', '2021-05-10 07:21:32', 'nike_sandal_41_1.jpg'),
(42, 'Nike Kawa SE 2', 819000, 5, 1, 'The Nike Kawa SE 2 Slide is all about a comfy option for getting out of the door fast or helping feet recover after game time. ', 0, 32, 1, '2021-05-10 07:24:31', '2021-05-10 07:24:31', 'nike_sandal_42_1.jpg'),
(43, 'Jordan Break', 458000, 5, 1, 'Featuring a fixed strap over the top of the foot, the Jordan Break Slide uses durable synthetic leather and lightweight foam cushioning for underfoot comfort.', 0, 32, 2, '2021-05-09 10:12:51', '2021-05-09 10:12:51', 'nike_sandal_43_1.jpg'),
(44, 'Nike Victory One', 539000, 5, 1, 'From the beach to the bleachers, the Nike Victory One perfects a classic, must-have design. Delivering lightweight comfort that\'s easy to wear', 0, 40, 1, '2021-05-09 10:50:06', '2021-05-09 10:50:06', 'nike_sandal_44_1.jpg'),
(45, 'Nike Kawa SE 2', 819000, 5, 1, 'The Nike Kawa SE 2 Slide is all about a comfy option for getting out of the door fast or helping feet recover after game time. ', 0, 38, 2, '2021-05-10 07:21:32', '2021-05-10 07:21:32', 'nike_sandal_45_2.jpg'),
(46, 'Nike Kawa SE 2', 819000, 5, 1, 'The Nike Kawa SE 2 Slide is all about a comfy option for getting out of the door fast or helping feet recover after game time. ', 0, 32, 2, '2021-05-10 07:24:31', '2021-05-10 07:24:31', 'nike_sandal_46_2.jpg'),
(47, 'Jordan Break', 458000, 5, 1, 'Featuring a fixed strap over the top of the foot, the Jordan Break Slide uses durable synthetic leather and lightweight foam cushioning for underfoot comfort.', 0, 32, 2, '2021-05-09 10:12:51', '2021-05-09 10:12:51', 'nike_sandal_47_1.jpg'),
(48, 'Nike Victory One', 539000, 5, 1, 'From the beach to the bleachers, the Nike Victory One perfects a classic, must-have design. Delivering lightweight comfort that\'s easy to wear', 0, 40, 1, '2021-05-09 10:50:06', '2021-05-09 10:50:06', 'nike_sandal_48_1.jpg'),
(49, 'Nike Victory One', 53900, 5, 1, 'From the beach to the streets, the Nike Victory One perfects a classic, must-have design.', 0, 39, 1, '2021-05-09 15:26:49', '2021-05-09 15:26:49', 'nike_sandal_49_1.jpg'),
(50, 'Nike Victory One', 578000, 5, 1, 'From the beach to the streets, the Nike Victory One perfects a classic, must-have design.', 0, 40, 2, '2021-05-10 07:56:27', '2021-05-10 07:56:27', 'nike_sandal_50_1.jpg'),
(51, 'TÚI ĐEO CHÉO PRIMEBLUE', 650000, 4, 2, 'Túi quần không đủ chỗ nhưng chưa đến mức cần đeo ba lô. Giải pháp là gì? Hãy lựa chọn chiếc túi đeo chéo adidas này và đựng mọi vật dụng thiết yếu ở đúng vị trí bạn cần. ', 0, 32, 1, '2021-05-10 07:17:12', '2021-05-10 07:17:12', 'adi_bag_51_1.jpg'),
(52, 'BA LÔ POWER ID', 1300000, 4, 2, 'Mang theo cả ngày và chất đồ hết cỡ sẽ không phù hợp với một chiếc ba lô yếu ớt. Hãy cứ tự tin chất đầy chiếc ba lô adidas này. Ba lô có thể chứa mọi vật dụng của bạn, và hơn thế nữa.', 0, 32, 1, '2021-05-09 09:54:30', '2021-05-09 09:54:30', 'adi_bag_52_1.jpg'),
(53, 'BA LÔ CLASSIC ADICOLOR PRIMEBLUE', 900000, 4, 2, 'BA LÔ CLASSIC ADICOLOR PRIMEBLUE\r\nCHIẾC BA LÔ CLASSIC VỚI CÁC CHI TIẾT ĐẶC TRƯNG CỦA ADIDAS.', 0, 32, 2, '2021-05-10 07:21:32', '2021-05-10 07:21:32', 'adi_bag_53_1.jpg'),
(54, 'BA LÔ POWER ID', 1300000, 4, 2, 'Mang theo cả ngày và chất đồ hết cỡ sẽ không phù hợp với một chiếc ba lô yếu ớt. Hãy cứ tự tin chất đầy chiếc ba lô adidas này. ', 0, 32, 1, '2021-05-09 09:54:30', '2021-05-09 09:54:30', 'adi_bag_54_1.jpg'),
(55, 'BA LÔ CLASSIC ADICOLOR PRIMEBLUE', 900000, 4, 2, 'BA LÔ CLASSIC ADICOLOR PRIMEBLUE\r\nCHIẾC BA LÔ CLASSIC VỚI CÁC CHI TIẾT ĐẶC TRƯNG CỦA ADIDAS.', 0, 32, 2, '2021-05-10 07:21:32', '2021-05-10 07:21:32', 'adi_bag_55_1.jpg'),
(61, 'ICON SNAPBACK HAT', 590000, 3, 2, 'Not much to say other than it has Adidas quality and in a throwback SnapBack style. Good but if you’re looking for that sort of thing.', 0, 32, 1, '2021-05-10 16:52:43', '2021-05-10 16:52:43', 'adi_hat_61_1.jpg'),
(60, 'QUẦN SHORT 2 TRONG 1 OWN THE RUN', 7000000, 1, 2, 'Chiếc quần short adidas này may bằng chất vải siêu nhẹ và thoáng khí. Quần bó may liền bên trong luôn cố định khi bạn vận động. \r\n\r\n', 0, 40, 1, '2021-05-09 15:26:49', '2021-05-09 15:26:49', 'adi_clothing_60_1.jpg'),
(59, 'ÁO THUN 3 SỌC HEAT.RDY', 1919000, 1, 2, 'Sử dụng chất vải cải tiến siêu nhẹ, dòng sản phẩm HEAT.RDY của adidas tăng cường lưu thông khí tối đa giúp bạn luôn cảm thấy thoáng mát.', 0, 40, 1, '2021-05-09 10:50:06', '2021-05-09 10:50:06', 'adi_clothing_59_1.jpg'),
(56, 'WXE TREF INFILL', 700000, 1, 2, 'Sản phẩm này không áp dụng bất kỳ chương trình ưu đãi và khuyến mãi nào. Giới hạn số lượng 1 sản phẩm trên mỗi đơn hàng.', 0, 40, 1, '2021-05-10 07:17:12', '2021-05-10 07:17:12', 'adi_clothing_56_1.jpg'),
(57, 'WXE SHORT 3S', 900000, 1, 2, 'No returns, no refunds', 0, 40, 1, '2021-05-10 07:24:31', '2021-05-10 07:24:31', 'adi_clothing_57_1.jpg'),
(58, 'WXE TEE AOP', 559000, 1, 2, 'No returns, no refunds', 0, 40, 1, '2021-05-09 10:12:51', '2021-05-09 10:12:51', 'adi_clothing_58_1.jpg'),
(62, 'TREFOIL BUCKET HAT', 650000, 3, 2, 'Free size but the size is a little tight for me. But overall, it looks good', 0, 32, 2, '2021-05-09 09:54:30', '2021-05-09 09:54:30', 'adi_hat_62_1.jpg'),
(63, 'ADIDAS ADVENTURE BOONIE HAT', 819000, 3, 2, 'Just like the archival outdoor gear that inspires its design, this adidas bucket hat goes anywhere.', 0, 32, 1, '2021-05-09 09:54:30', '2021-05-09 09:54:30', 'adi_hat_63_1.jpg'),
(64, 'STAN BASEBALL CAP', 750000, 3, 2, 'Rock that legacy with this adidas hat. A pre-curved brim keeps the sun out of your eyes so you can wear it on the go.\r\n\r\n', 0, 32, 1, '2021-05-09 10:12:51', '2021-05-09 10:12:51', 'adi_hat_64_1.jpg'),
(65, 'RELAXED WAVE HAT', 850000, 3, 2, 'Except perhaps in how you carry yourself. Which, with this cap, is probably with confidence.', 0, 32, 2, '2021-05-09 10:50:06', '2021-05-09 10:50:06', 'adi_hat_65_1.jpg'),
(66, 'SANDAL ALTASWIM', 350000, 5, 2, ' Quai dép điều chỉnh được độ vừa vặn theo bàn chân lớn lên từng ngày, giúp bé nhanh chóng chuẩn bị cho những ngày đi biển hay vui chơi dưới nước.', 0, 40, 1, '2021-05-09 09:11:47', '2021-05-09 09:11:47', 'adi_sandal_66_1.jpg'),
(67, 'DÉP SANDAL COMFORT', 850000, 5, 2, 'Cho bé vui đùa thỏa thích dưới nắng hè. Đôi dép sandal đi bơi adidas dành cho trẻ em này có thiết kế thoát nước và nhanh khô', 0, 32, 1, '2021-05-10 07:21:32', '2021-05-10 07:21:32', 'adi_sandal_67_1.jpg'),
(68, 'SANDAL ĐI BƠI', 750000, 5, 2, 'phù hợp cho đôi chân ở tuổi đang lớn. Lòng dép ôm chân và nhanh khô, mang đến cho bé cảm giác thoải mái khi chơi đùa trên bãi biển hay bên hồ bơi.', 0, 32, 2, '2021-05-09 10:12:51', '2021-05-09 10:12:51', 'adi_sandal_68_1.jpg'),
(69, 'DÉP SANDAL COMFORT', 850000, 5, 2, 'Quai dép điều chỉnh được mang đến cảm giác ôm sát, nâng đỡ cho nhà phiêu lưu nhí. Đế ngoài chống trơn trượt tạo độ bám trên mọi bề mặt.\r\n\r\n', 0, 32, 2, '2021-05-09 10:50:06', '2021-05-09 10:50:06', 'adi_sandal_69_1.jpg'),
(70, 'SANDAL ĐI BƠI', 7000000, 5, 2, ' Lòng dép ôm chân và nhanh khô, mang đến cho bé cảm giác thoải mái khi chơi đùa trên bãi biển hay bên hồ bơi.', 0, 32, 2, '2021-05-09 15:26:49', '2021-05-09 15:26:49', 'adi_sandal_70_1.jpg'),
(71, 'GIÀY ULTRABOOST 21 PRIMEBLUE', 5000000, 2, 2, 'Công nghệ adidas Primeknit tạo phom ôm sát bàn chân với các vùng nâng đỡ tập trung.', 0, 40, 1, '2021-05-09 09:11:47', '2021-05-09 09:11:47', 'adi_shoes_71_1.jpg'),
(72, 'ZX 8000 LEGO', 3400000, 2, 2, 'Bộ sưu tập ZX 8000 \"Bricks\" được thiết kế để trở nên táo bạo. Có mặt trong sáu màu sắc kinh điển nhất của LEGO®', 0, 40, 2, '2021-05-10 07:21:32', '2021-05-10 07:21:32', 'adi_shoes_72_1.jpg'),
(73, 'ZX 8000 LEGO', 3500000, 2, 2, 'No returns, no refunds', 0, 40, 1, '2021-05-09 10:12:51', '2021-05-09 10:12:51', 'adi_shoes_73_1.jpg'),
(74, 'SUPERSTAR SIMPSONS SQUISHEE', 2400000, 2, 2, 'High Quality materials, great price and great concept. I would recommend to anyone who wants to own a solid collab.', 0, 40, 2, '2021-05-09 10:50:06', '2021-05-09 10:50:06', 'adi_shoes_74_1.jpg'),
(75, 'GIÀY ULTRABOOST 21 PRIMEBLUE', 5000000, 2, 2, 'Hệ thống Linear Energy Push tích hợp trên đế ngoài tăng cường độ ổn định và đàn hồi hơn bao giờ hết cho phần mũi chân và giữa bàn chân.', 0, 40, 2, '2021-05-09 15:26:49', '2021-05-09 15:26:49', 'adi_shoes_75_1.jpg'),
(76, 'PUMA Core Up Womens\' Waistbag', 5200000, 4, 3, 'Up your look with this glamorous and sleek waist bag. It is extra shiny, extra strong and extra hard to miss. ', 0, 32, 2, '2021-05-09 10:07:21', '2021-05-09 10:07:21', 'puma_bag_76_1.jpg'),
(77, 'PUMA Women\'s Valentine\'s Backpack Core\r\n', 6179000, 4, 3, 'Inspired by the most romantic day of the year, but designed for every day, this backpack has a two-way zip opening into the main compartment', 0, 40, 2, '2021-05-09 09:54:30', '2021-05-09 09:54:30', 'puma_bag_77_1.jpg'),
(78, 'PUMA x MR. DOODLE Backpack', 750000, 4, 3, 'Hit the streets in this street-art inspired backpack from the latest season of PUMA x MR. DOODLE.', 0, 35, 1, '2021-05-09 10:12:51', '2021-05-09 10:12:51', 'puma_bag_78_1.jpg'),
(79, 'Neymar Jr. Creativity Backpack', 8500000, 4, 3, 'Athlete or artist. On the pitch or on the street. From the Neymar Jr. Creativity collection, this backpack is made for expression in all its forms. ', 0, 40, 1, '2021-05-09 10:50:06', '2021-05-09 10:50:06', 'puma_bag_79_1.jpg'),
(80, 'Chivas Backpack', 6000000, 4, 3, 'For Chivas fans on the go, this sporty, functional backpack is designed to get you through your day in fresh fan style.', 0, 40, 1, '2021-05-09 15:26:49', '2021-05-09 15:26:49', 'puma_bag_80_1.jpg'),
(81, 'Pride Women\'s Fitted Tee', 4109000, 1, 3, 'Forever Free is PUMA’s latest Pride collection created with Cara Delevingne. Wear your pride on your chest with bold', 0, 38, 2, '2021-05-09 10:07:21', '2021-05-09 10:07:21', 'puma_clo_81_1.jpg'),
(82, 'PUMA x MR. DOODLE Women\'s Loose Tee', 3519000, 1, 3, 'Classic is creative in the latest collab tee from PUMA x MR. DOODLE. Featuring Mr. Doodle\'s signature doodle graphics', 0, 40, 2, '2021-05-10 07:21:32', '2021-05-10 07:21:32', 'puma_clo_82_1.jpg'),
(83, 'PUMA x MR. DOODLE Women\'s Loose Tee', 559000, 1, 3, 'Classic is creative in the latest collab tee from PUMA x MR. DOODLE. Featuring Mr. Doodle\'s signature doodle graphics', 0, 38, 2, '2021-05-09 10:12:51', '2021-05-09 10:12:51', 'puma_clo_83_1.jpg'),
(84, 'FIGC Away Replica Women\'s Jersey', 850000, 1, 3, 'Step out in fresh football fan style with our FIGC Italia Away Replica Jersey, a one-to-one replica of the shirts worn by your football heroes on the pitch', 0, 40, 1, '2021-05-09 10:50:06', '2021-05-09 10:50:06', 'puma_clo_84_1.jpg'),
(85, 'Women\'s Graphic Tee', 53900, 1, 3, 'Embracing big cat energy all summer long in this classic graphic tee. With cute cat cartoon graphics and PUMA branding', 0, 40, 1, '2021-05-09 15:26:49', '2021-05-09 15:26:49', 'puma_clo_85_1.jpg'),
(86, 'RS-Sandal GID Women\'s Sandals', 4109000, 5, 3, 'Give your summer streetwear a boost of retro style in the all-new RS-Sandal. A playful color palette and ultra-cushioned RS', 0, 39, 1, '2021-05-09 10:07:21', '2021-05-09 10:07:21', 'puma_sandal_86_1.jpg'),
(87, 'RS-Sandal', 3519000, 5, 3, 'Product runs in men’s sizes only. Women should order 1 size down from their usual size.', 0, 40, 1, '2021-05-09 09:54:30', '2021-05-09 09:54:30', 'puma_sandal_87_1.jpg'),
(88, 'RS-Sandal', 3500000, 5, 3, 'Product runs in men’s sizes only. Women should order 1 size down from their usual size.', 0, 35, 1, '2021-05-09 10:12:51', '2021-05-09 10:12:51', 'puma_sandal_88_1.jpg'),
(89, 'Future Rider Sandals', 539000, 5, 3, 'The Future Rider is letting the top down and living the good life in these warm weather-ready sandals.', 0, 40, 2, '2021-05-09 10:50:06', '2021-05-09 10:50:06', 'puma_sandal_89_1.jpg'),
(90, 'RS-Sandal Arcade', 539000, 5, 3, 'Give your summer streetwear a boost of retro style in the all-new RS-Sandal. Brightly-colored and nostalgia-packed', 0, 40, 2, '2021-05-09 15:26:49', '2021-05-09 15:26:49', 'puma_sandal_90_1.jpg'),
(91, 'Nexus Adjustable Dad Cap', 1019000, 3, 3, 'Next-level looks for your everyday. This classic dad cap features an adjustable closure and cool PUMA branding for your sporty lifestyle.', 0, 32, 2, '2021-05-09 09:11:47', '2021-05-09 09:11:47', 'puma_hat_91_1.jpg'),
(92, 'Nexus Adjustable Dad Cap', 1090000, 3, 3, 'Next-level looks for your everyday. This classic dad cap features an adjustable closure and cool PUMA branding for your sporty lifestyle.', 0, 32, 1, '2021-05-09 09:54:30', '2021-05-09 09:54:30', 'puma_hat_92_1.jpg'),
(93, 'Pride Bucket Hat', 1019000, 3, 3, 'Forever Free is PUMA’s latest Pride collection created with Cara Delevingne.', 0, 32, 2, '2021-05-09 10:12:51', '2021-05-09 10:12:51', 'puma_hat_93_1.jpg'),
(94, 'Neymar Jr. Creativity Baseball Cap', 239000, 3, 3, 'Inspired by one of the most creative playmakers in the game, the Neymar Jr. ', 0, 32, 1, '2021-05-09 10:50:06', '2021-05-09 10:50:06', 'puma_hat_94_1.jpg'),
(95, 'Estate 2.0 Snapback', 539000, 3, 3, 'Bold branding, 3D embroidery and an adjustable closure make this snapback a sleek statement.\r\n', 0, 32, 1, '2021-05-09 15:26:49', '2021-05-09 15:26:49', 'puma_hat_95_1.jpg'),
(96, 'Cali Sport In Bloom Women\'s Sneakers\r\n', 4109000, 2, 3, 'Cali Sport is in full bloom. Arriving just in time for Spring, Cali Sport In Bloom features a soft leather and suede upper', 0, 38, 2, '2021-05-09 09:11:47', '2021-05-09 09:11:47', 'puma_shoes_96_1.jpg'),
(97, 'Mayze Women\'s Sneakers', 2929000, 2, 3, 'Get ready to find your style in Mayze. We made this one for the hype girls, the street enthusiasts, the trend mavens.', 0, 40, 2, '2021-05-09 09:54:30', '2021-05-09 09:54:30', 'puma_shoes_97_1.jpg'),
(98, 'Suede Classic XXI Women\'s Sneakers', 2350000, 2, 3, 'The Suede hit the scene in 1968 and has been changing the game ever since.', 0, 38, 2, '2021-05-09 10:12:51', '2021-05-09 10:12:51', 'puma_shoes_98_1.jpg'),
(99, 'PUMA x MR DOODLE Future Rider Sneakers', 539000, 2, 3, 'The Future Rider gets a playful update in this edition from PUMA x MR. DOODLE. The retro running shoe is decked out in a fresh material mix', 0, 40, 1, '2021-05-09 10:50:06', '2021-05-09 10:50:06', 'puma_shoes_99_1.jpg'),
(100, 'Provoke XT Block Women\'s Training Shoes', 4439000, 2, 3, 'Made from a mold? Never. You were born to provoke. Designed for risk takers and head turners, this flawless silhouette challenges the standards', 0, 40, 1, '2021-05-09 15:26:49', '2021-05-09 15:26:49', 'puma_shoes_100_1.jpg'),
(101, 'Kappa túi unisex K0AX8BX70M 242', 500000, 4, 4, 'Nằm trong Bộ sưu tập KAPPA MIXMATCH, với những thiết kế #basic đi vào cuộc sống hàng ngày, nhưng vẫn năng động', 0, 32, 1, '2021-05-09 10:07:21', '2021-05-09 10:07:21', 'kappa_bag_101_1.jpg'),
(102, 'Kappa Túi xách Unisex 3111ITW ANA', 500000, 4, 4, 'Thiết kế ấn tượng trong Bộ sưu tập BANDA ROGER của thương hiệu thời trang Kappa, với Logo Omini nổi bật phía trước và dải Banda màu sắc tương phản ', 0, 32, 2, '2021-05-09 09:54:30', '2021-05-09 09:54:30', 'kappa_bag_102_1.jpg'),
(103, 'Kappa balo unisex 304SM40 903', 500000, 4, 4, 'Balo #BackPack kiểu dáng thời trang và năng động, ngăn chính với thiết kế rộng rãi giúp tận dụng tối đa không gian để chứa đồ', 0, 40, 2, '2021-05-09 10:12:51', '2021-05-09 10:12:51', 'kappa_bag_103_1.jpg'),
(104, 'KAPPA TÚI 304RMV0 908', 400000, 4, 4, 'Nằm trong Bộ sưu tập BANDA BALTUC của thương hiệu thời trang Kappa, với với Logo vuông Omini và dải Banda màu sắc tương phản nổi bật phía trước', 0, 32, 1, '2021-05-09 10:50:06', '2021-05-09 10:50:06', 'kappa_bag_104_1.jpg'),
(105, 'Kappa ba lô unisex K0AX8BS01 001P', 700000, 4, 4, 'Đặc tính: Độ bền cao, có khả năng chống thấm nước và chống nhăn hiệu quả, dễ vệ sinh và không bị phai màu theo thời gian.', 0, 40, 1, '2021-05-09 15:26:49', '2021-05-09 15:26:49', 'kappa_bag_105_1.jpg'),
(106, 'Kappa quần short nam K0A12CQ01D 133', 790000, 1, 4, 'Quần dài Kappa màu đen mạnh mẽ, cá tính đến từ Bộ sưu tập KAPPA SPIRITO với chất liệu Cotton co giãn tốt, thấm hút mồ hôi hiệu quả, thoáng mát và mang lại độ bền cao ', 0, 39, 1, '2021-05-09 10:07:21', '2021-05-09 10:07:21', 'kappa_clo_106_1.jpg'),
(107, 'Kappa quần shorts quần nam K0A12DY03D 880', 590000, 1, 4, 'Quần Short Kappa màu xanh dương trẻ trung, năng động với chất liệu COTTON 71.4% POLYESTER 28.6% co giãn tốt, thấm hút mồ hôi hiệu quả', 0, 40, 1, '2021-05-10 07:21:32', '2021-05-10 07:21:32', 'kappa_clo_107_1.jpg'),
(108, 'Kappa bộ thể thao nam 30271D0 924', 890000, 1, 4, 'Logo Omini biểu tượng của Kappa xuất hiện ở ngực áo và thân quần.', 0, 40, 1, '2021-05-09 10:12:51', '2021-05-09 10:12:51', 'kappa_clo_108_1.jpg'),
(109, 'Kappa áo khoác thun nữ K0962WK75D 481', 900000, 1, 4, 'Áo khoác Kappa màu sắc trẻ trung, năng động đến từ Bộ sưu tập KAPPA PARK với chất liệu 100% COTTON mềm mại, thấm hút mồ hôi hiệu quả, mang đến độ bền cao cho sản phẩm.', 0, 40, 2, '2021-05-09 10:50:06', '2021-05-09 10:50:06', 'kappa_clo_109_1.jpg'),
(110, 'Kappa áo khoác nam K0952FJ06D 793', 990000, 1, 4, 'Áo khoác Kappa màu cam nổi bật, ấn tượng đến từ Bộ sưu tập AUTHENTIC với chất liệu 100% COTTON mềm mại, thấm hút mồ hôi hiệu quả, mang đến độ bền cao cho sản phẩm.', 0, 40, 1, '2021-05-09 15:26:49', '2021-05-09 15:26:49', 'kappa_clo_110_1.jpg'),
(112, 'Kappa nón unisex K0AX8MB01 4502', 390000, 3, 4, 'Màu sắc: Có 2 màu Vàng và Xanh Dương để bạn lựa chọn theo sở thích.', 0, 40, 1, '2021-05-09 09:54:30', '2021-05-09 09:54:30', 'kappa_hat_112_1.jpg'),
(111, 'Kappa nón nữ K0A48MB29 990', 390000, 3, 4, 'Thuộc BST KAPPA MIXMATCH, với những thiết kế #basic đi vào cuộc sống hàng ngày, nhưng vẫn năng động và cực kỳ #trendy, mang đậm tinh thần thời trang thể thao của thương hiệu #Kappa.', 0, 38, 2, '2021-05-09 10:07:21', '2021-05-09 10:07:21', 'kappa_hat_111_1.jpg'),
(113, 'Kappa nón unisex 34174IW A05', 290000, 3, 4, 'Thiết kế: Kiểu dáng nón lưỡi trai thời trang, màu sắc cá tính. Họa tiết logo Banda thiết kế dọc theo thân nón ấn tượng.', 0, 32, 2, '2021-05-09 10:12:51', '2021-05-09 10:12:51', 'kappa_hat_113_1.jpg'),
(114, 'Kappa nón unisex 34172UW 001', 390000, 3, 4, 'Thiết kế: Kiểu dáng nón lưỡi trai thời trang, màu sắc cá tính. Họa tiết logo Banda thiết kế dọc theo thân nón ấn tượng.', 0, 38, 2, '2021-05-09 10:07:21', '2021-05-09 10:07:21', 'kappa_hat_114_1.jpg'),
(115, 'Kappa nón unisex K0AW8MB01 012', 390000, 3, 4, 'Nón Kappa màu trắng năng động, trẻ trung với chất liệu 100% COTTON mềm mại, thấm hút mồ hôi hiệu quả, mang đến độ bền cao cho sản phẩm', 0, 40, 1, '2021-05-09 09:54:30', '2021-05-09 09:54:30', 'kappa_hat_115_1.jpg'),
(116, 'Kappa dép quai ngang unisex 304T5Z0 916 BLACK', 390000, 5, 4, 'Giới tính: Unisex\r\nNơi gia công: Trung Quốc', 0, 42, 2, '2021-05-09 10:07:21', '2021-05-09 10:07:21', 'kappa_sandal_116_1.jpg'),
(117, 'Kappa xăng đan unisex 304VF50 A2W', 990000, 5, 4, 'Thiết kế: Sandal quai ngang unisex thời trang, quai bản to trẻ trung và phần lòng dép ôm vừa bàn chân, đem đến cảm giác thoải mái cho bạn. ', 0, 32, 2, '2021-05-09 09:54:30', '2021-05-09 09:54:30', 'kappa_sandal_117_1.jpg'),
(118, 'Kappa dép quai ngang unisex 304T5Z0 A1L WHITE', 899000, 5, 4, '• Phù hợp: Các hoạt động thường ngày.\r\n• Xuất xứ thương hiệu: Italia.', 0, 32, 2, '2021-05-09 10:12:51', '2021-05-09 10:12:51', 'kappa_sandal_118_1.jpg'),
(119, 'Kappa dép quai ngang unisex 304T5Z0 A1G BLUE', 899000, 5, 4, '• Phù hợp: Các hoạt động thường ngày.\r\n• Xuất xứ thương hiệu: Italia.', 0, 39, 2, '2021-05-09 10:50:06', '2021-05-09 10:50:06', 'kappa_sandal_119_1.jpg'),
(120, 'Kappa dép quai ngang unisex 304T5Z0 A1H BROWN', 899000, 5, 4, '• Phù hợp: Các hoạt động thường ngày.\r\n• Xuất xứ thương hiệu: Italia.', 0, 40, 2, '2021-05-09 15:26:49', '2021-05-09 15:26:49', 'kappa_sandal_120_1.jpg'),
(121, 'Superga giày thời trang cổ thấp unisex 219SSU3_S00GRT0 905', 490000, 2, 4, 'Giày Unisex Superga cổ thấp, với chất liệu đế làm từ cao su tự nhiên chống trơn trượt tốt, hạn chế mài mòn, càng di chuyển càng đàn hồi', 0, 32, 1, '2021-05-09 10:07:21', '2021-05-09 10:07:21', 'kappa_shoes_121_1.jpg'),
(122, 'Superga giày thời trang cổ thấp unisex 219SSU1_S0046Q0 361', 490000, 2, 4, 'Giày thời trang Unisex Superga cổ thấp, với chất liệu đế làm từ cao su tự nhiên chống trơn trượt tốt, hạn chế mài mòn', 0, 40, 2, '2021-05-09 09:54:30', '2021-05-09 09:54:30', 'kappa_shoes_122_1.jpg'),
(123, 'Kappa giày sneakers nam 311762W A0I', 490000, 2, 4, 'Thiết kế: Kiểu dáng thời trang. Giày sneakers cổ thấp, được làm bằng chất liệu tổng hợp, có phần đế ngoài bằng cao su.', 0, 40, 1, '2021-05-09 10:12:51', '2021-05-09 10:12:51', 'kappa_shoes_123_1.jpg'),
(124, 'Kappa giày sneakers nữ 3112H5W A0L', 1000000, 2, 4, 'Logo Omini được thiết kế ở phần thân giày và phía sau gót ấn tượng. Trên phần thân giày có những đường may nổi bật, mang tính thời trang cao.', 0, 40, 2, '2021-05-09 10:50:06', '2021-05-09 10:50:06', 'kappa_shoes_124_1.jpg'),
(125, 'Superga giày thời trang cổ thấp unisex 119SSU1_S00FLA0 729', 490000, 2, 4, 'Đế cao su tự nhiên cao 2cm, chống trơn trượt tốt, hạn chế mài mòn, càng di chuyển càng đàn hồi, bền bỉ theo thời gian.', 0, 39, 2, '2021-05-09 15:26:49', '2021-05-09 15:26:49', 'kappa_shoes_125_1.jpg'),
(126, 'FILA TENNIS BACKPACK LEE', 819000, 4, 5, 'Pockets: small pockets with zippers / side pockets for water bottles etc. / large main pocket with zipper', 0, 42, 1, '2021-05-09 10:07:21', '2021-05-09 10:07:21', 'fila_bag_126_1.jpg'),
(127, 'FILA BACKPACK MESH DRAWSTRING AOP', 900000, 4, 5, 'style: backpack\r\ncolor: grey', 0, 40, 1, '2021-05-10 07:21:32', '2021-05-10 07:21:32', 'fila_bag_127_1.jpg'),
(128, 'FILA PASSPORT POUCH', 590000, 4, 5, 'logo: linear logo on front\r\nmaterial: 100% polyester', 0, 40, 2, '2021-05-09 10:12:51', '2021-05-09 10:12:51', 'fila_bag_128_1.jpg'),
(129, 'FILA ROLLTOP BACKPACK ÖREBRO SEA-SPRAY', 850000, 4, 5, 'gender: unisex\r\nstyle: rolltop backpack', 0, 40, 1, '2021-05-09 10:50:06', '2021-05-09 10:50:06', 'fila_bag_129_1.jpg'),
(130, 'FILA SPORTY DUFFEL BAG', 539000, 4, 5, 'gender: unisex\r\nstyle: duffel bag\r\ncolor: navy / red / white', 0, 40, 1, '2021-05-09 15:26:49', '2021-05-09 15:26:49', 'fila_bag_130_1.jpg'),
(131, 'Stance Track Jacket\r\n', 819000, 1, 5, 'Function, meet fashion.\r\nStaying comfy looks better than ever.\r\nIconic Everywhere. #FILAstyle', 0, 40, 1, '2021-05-09 10:07:21', '2021-05-09 10:07:21', 'fila_clo_131_1.jpg'),
(132, 'Alley Short\r\n', 900000, 1, 5, 'Anything but basic.\r\nCasual. Cozy. Cool.\r\nIconic Everywhere. #FILAstyle', 0, 40, 1, '2021-05-10 07:21:32', '2021-05-10 07:21:32', 'fila_clo_132_1.jpg'),
(133, 'Edgecumbe Short Sleeve Tee', 1019000, 1, 5, 'A fresh twist on the heritage feel.\r\nComfy classic that\'s anything but basic.\r\nIconic Everywhere. #FILAstyle', 0, 38, 1, '2021-05-09 10:12:51', '2021-05-09 10:12:51', 'fila_clo_133_1.jpg'),
(134, 'Halama 1/4 Zip Jacket\r\n', 850000, 1, 5, 'Heritage apparel with a stylish update.\r\nThe perfect light layer for any outfit.\r\nIconic Everywhere. #FILAstyle', 0, 40, 1, '2021-05-09 10:50:06', '2021-05-09 10:50:06', 'fila_clo_134_1.jpg'),
(135, 'Gualtiero Jacket', 700000, 1, 5, 'This standout jacket features a distinct corduroy construction with a pullover design. A hood offers extra coverage, while bold FILA branding adds extra flair.', 0, 40, 1, '2021-05-09 15:26:49', '2021-05-09 15:26:49', 'fila_clo_135_1.jpg'),
(136, 'FILA DAD CAP WITH F-BOX LOGO / STRAP BACK', 819000, 3, 5, 'Shipping through the official FILA shop\r\nFast delivery to several countries\r\nFree delivery within Germany (from 40.00 €)\r\nFree returns within Germany', 0, 32, 1, '2021-05-09 10:07:21', '2021-05-09 10:07:21', 'fila_hat_136_1.jpg'),
(137, 'FILA 6 PANEL CAP WITH LINEAR LOGO/ STRAP BACK', 819000, 3, 5, 'Shipping through the official FILA shop\r\nFast delivery to several countries\r\nFree delivery within Germany (from 40.00 €)\r\nFree returns within Germany', 0, 32, 2, '2021-05-09 09:54:30', '2021-05-09 09:54:30', 'fila_hat_137_1.jpg'),
(138, 'FILA PLASTIC VISOR WHITE', 559000, 3, 5, 'Shipping through the official FILA shop\r\nFast delivery to several countries\r\nFree delivery within Germany (from 40.00 €)\r\nFree returns within Germany', 0, 32, 2, '2021-05-09 10:12:51', '2021-05-09 10:12:51', 'fila_hat_138_1.jpg'),
(139, 'FILA AYAKA AOP VISOR', 1919000, 3, 5, 'Shipping through the official FILA shop\r\nFast delivery to several countries\r\nFree delivery within Germany (from 40.00 €)\r\nFree returns within Germany', 0, 40, 2, '2021-05-09 10:50:06', '2021-05-09 10:50:06', 'fila_hat_139_1.jpg'),
(140, 'FILA BLOCKED BUCKET HAT RED-YELLOW-NAVY', 7000000, 3, 5, 'Shipping through the official FILA shop\r\nFast delivery to several countries\r\nFree delivery within Germany (from 40.00 €)\r\nFree returns within Germany', 0, 40, 1, '2021-05-09 15:26:49', '2021-05-09 15:26:49', 'fila_hat_140_1.jpg'),
(141, 'FILA OUTDOOR SANDAL WMN WHITE', 819000, 5, 5, 'Shipping through the official FILA shop\r\nFast delivery to several countries\r\nFree delivery within Germany (from 40.00 €)\r\nFree returns within Germany', 0, 38, 2, '2021-05-09 10:07:21', '2021-05-09 10:07:21', 'fila_sandal_141_1.jpg'),
(142, 'FILA TOMAIA LOGO SANDAL WMN', 819000, 5, 5, 'Shipping through the official FILA shop\r\nFast delivery to several countries\r\nFree delivery within Germany (from 40.00 €)\r\nFree returns within Germany', 0, 41, 2, '2021-05-10 07:21:32', '2021-05-10 07:21:32', 'fila_sandal_142_1.jpg'),
(143, 'FILA DISRUPTOR SANDAL WMN WHITE-LIMELIGHT', 1019000, 5, 5, 'Shipping through the official FILA shop\r\nFast delivery to several countries\r\nFree delivery within Germany (from 40.00 €)\r\nFree returns within Germany', 0, 40, 2, '2021-05-09 10:12:51', '2021-05-09 10:12:51', 'fila_sandal_143_1.jpg'),
(144, 'FILA MORRO BAY ZEPPA F WMN BLACK', 539000, 5, 5, 'Shipping through the official FILA shop\r\nFast delivery to several countries\r\nFree delivery within Germany (from 40.00 €)\r\nFree returns within Germany', 0, 40, 1, '2021-05-09 10:50:06', '2021-05-09 10:50:06', 'fila_sandal_144_1.jpg'),
(145, 'FILA DISRUPTOR SANDAL WMN WHITE', 7000000, 1, 5, 'Shipping through the official FILA shop\r\nFast delivery to several countries\r\nFree delivery within Germany (from 40.00 €)\r\nFree returns within Germany', 0, 40, 1, '2021-05-09 15:26:49', '2021-05-09 15:26:49', 'fila_sandal_145_1.jpg'),
(146, '2/3\r\nClose\r\nFILA VENOM RUSH MEN WHITE-NAVY', 819000, 2, 5, 'Shipping through the official FILA shop\r\nFast delivery to several countries\r\nFree delivery within Germany (from 40.00 €)\r\nFree returns within Germany', 0, 39, 1, '2021-05-09 10:07:21', '2021-05-09 10:07:21', 'fila_shoes_146_1.jpg'),
(147, 'FILA TENNIS SHOES MEN GREY', 819000, 2, 5, 'Shipping through the official FILA shop\r\nFast delivery to several countries\r\nFree delivery within Germany (from 40.00 €)\r\nFree returns within Germany', 0, 38, 1, '2021-05-10 07:24:31', '2021-05-10 07:24:31', 'fila_shoes_147_1.jpg'),
(148, 'FILA TECLUS MEN CLEMATIS-BLUE', 659000, 2, 5, 'Shipping through the official FILA shop\r\nFast delivery to several countries\r\nFree delivery within Germany (from 40.00 €)\r\nFree returns within Germany', 0, 36, 2, '2021-05-09 10:12:51', '2021-05-09 10:12:51', 'fila_shoes_148_1.jpg'),
(149, 'FILA ARCHIVE RJV 90S MEN', 1919000, 2, 5, 'Shipping through the official FILA shop\r\nFast delivery to several countries\r\nFree delivery within Germany (from 40.00 €)\r\nFree returns within Germany', 0, 40, 1, '2021-05-09 10:50:06', '2021-05-09 10:50:06', 'fila_shoes_149_1.jpg'),
(150, 'FILA RAY TRACER MEN BLACK-EVERGLADE-LIME', 7000000, 2, 5, 'Shipping through the official FILA shop\r\nFast delivery to several countries\r\nFree delivery within Germany (from 40.00 €)\r\nFree returns within Germany', 0, 40, 1, '2021-05-09 15:26:49', '2021-05-09 15:26:49', 'fila_shoes_150_1.jpg'),
(151, 'ÁO HOODIE DÁNG RỘNG', 400, 1, 2, 'Hãy cho cả thế giới thấy cách nhìn nhận cuộc sống đầy độc đáo của bạn. Chiếc áo hoodie adidas này giúp bạn khoe phong cách thể thao đầy cá tính.', 0, 39, 2, NULL, NULL, 'adi_clothing_61_1.jpg'),
(152, 'ÁO THUN TOKYO RUN', 550, 1, 2, 'Hãy mặc chiếc áo thun adidas này và gặp gỡ hội chạy bộ của bạn. Hoặc chạy một mình. chứ sao', 0, 38, 2, NULL, NULL, 'adi_clothing_62_1.jpg'),
(153, 'áo thun thể thao nữ', 200, 1, 5, 'Còn gì tuyệt vời hơn khi sỏ hữu và mang trên người khi đi du lịch cùng gấu của mình và đi những nơi lạnh khi trời trở đông như Đà Lạt, Sapa, Hà Giang, ... ', 0, 37, 2, NULL, NULL, 'fila_clo_136_1.jpg');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `product__images`
--

DROP TABLE IF EXISTS `product__images`;
CREATE TABLE IF NOT EXISTS `product__images` (
  `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `image_name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `product_id` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `product__images_product_id_foreign` (`product_id`)
) ENGINE=MyISAM AUTO_INCREMENT=462 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `product__images`
--

INSERT INTO `product__images` (`id`, `image_name`, `product_id`, `created_at`, `updated_at`) VALUES
(1, 'nike1_1.jpg', 1, '2021-05-09 09:11:47', '2021-05-09 09:11:47'),
(2, 'nike1_2.jpg', 1, NULL, NULL),
(3, 'nike1_3.jpg', 1, NULL, NULL),
(7, 'nike2_2.jpg', 2, NULL, NULL),
(6, 'nike2_1.jpg', 2, NULL, NULL),
(8, 'nike2_3.jpg', 2, NULL, NULL),
(9, 'nike3_1.jpg', 3, NULL, NULL),
(10, 'nike3_2.jpg', 3, NULL, NULL),
(11, 'nike3_3.jpg', 3, NULL, NULL),
(12, 'nike4_1.jpg', 4, NULL, NULL),
(13, 'nike4_2.jpg', 4, NULL, NULL),
(14, 'nike4_3.jpg', 4, NULL, NULL),
(15, 'nike5_1.jpg', 5, NULL, NULL),
(16, 'nike5_2.jpg', 5, NULL, NULL),
(17, 'nike5_3.jpg', 5, NULL, NULL),
(18, 'nike6_1.jpg', 6, NULL, NULL),
(19, 'nike6_2.jpg', 6, NULL, NULL),
(20, 'nike6_3.jpg', 6, NULL, NULL),
(21, 'nike7_1.jpg', 7, NULL, NULL),
(22, 'nike7_2.jpg', 7, NULL, NULL),
(23, 'nike7_3.jpg', 7, NULL, NULL),
(24, 'nike8_1.jpg', 8, NULL, NULL),
(25, 'nike8_2.jpg', 8, NULL, NULL),
(26, 'nike8_3.jpg', 8, NULL, NULL),
(27, 'nike9_1.jpg', 9, NULL, NULL),
(28, 'nike9_2.jpg', 9, NULL, NULL),
(29, 'nike9_3.jpg', 9, NULL, NULL),
(30, 'nike10_1.jpg', 10, NULL, NULL),
(31, 'nike10_2.jpg', 10, NULL, NULL),
(32, 'nike10_3.jpg', 10, NULL, NULL),
(33, 'clothing_11_1.jpg', 11, NULL, NULL),
(34, 'clothing_11_2.jpg', 11, NULL, NULL),
(35, 'clothing_11_3.jpg', 11, NULL, NULL),
(36, 'clothing_12_1.jpg', 12, NULL, NULL),
(37, 'clothing_12_2.jpg', 12, NULL, NULL),
(38, 'clothing_12_3.jpg', 12, NULL, NULL),
(39, 'clothing_13_1.jpg', 13, NULL, NULL),
(40, 'clothing_13_2.jpg', 13, NULL, NULL),
(41, 'clothing_13_3.jpg', 13, NULL, NULL),
(42, 'clothing_14_1.jpg', 14, NULL, NULL),
(43, 'clothing_14_2.jpg', 14, NULL, NULL),
(44, 'clothing_14_3.jpg', 14, NULL, NULL),
(45, 'clothing_15_1.jpg', 15, NULL, NULL),
(46, 'clothing_15_2.jpg', 15, NULL, NULL),
(47, 'clothing_15_3.jpg', 15, NULL, NULL),
(48, 'clothing_16_1.jpg', 16, NULL, NULL),
(49, 'clothing_16_2.jpg', 16, NULL, NULL),
(50, 'clothing_16_3.jpg', 16, NULL, NULL),
(51, 'clothing_17_1.jpg', 17, NULL, NULL),
(52, 'clothing_17_2.jpg', 17, NULL, NULL),
(53, 'clothing_17_3.jpg', 17, NULL, NULL),
(54, 'clothing_18_1.jpg', 18, NULL, NULL),
(55, 'clothing_18_2.jpg', 18, NULL, NULL),
(56, 'clothing_18_3.jpg', 18, NULL, NULL),
(57, 'clothing_19_1.jpg', 19, NULL, NULL),
(58, 'clothing_19_2.jpg', 19, NULL, NULL),
(59, 'clothing_19_3.jpg', 19, NULL, NULL),
(60, 'clothing_20_1.jpg', 20, NULL, NULL),
(61, 'clothing_20_2.jpg', 20, NULL, NULL),
(62, 'clothing_20_3.jpg', 20, NULL, NULL),
(63, 'hat21_1.jpg', 21, NULL, NULL),
(64, 'hat21_2.jpg', 21, NULL, NULL),
(65, 'hat22_1.jpg', 22, NULL, NULL),
(66, 'hat22_2.jpg', 22, NULL, NULL),
(67, 'hat23_1.jpg', 23, NULL, NULL),
(68, 'hat23_2.jpg', 23, NULL, NULL),
(69, 'hat24_1.jpg', 24, NULL, NULL),
(70, 'hat24_2.jpg', 24, NULL, NULL),
(71, 'hat25_1.jpg', 25, NULL, NULL),
(72, 'hat25_2.jpg', 25, NULL, NULL),
(73, 'hat26_1.jpg', 26, NULL, NULL),
(74, 'hat26_2.jpg', 26, NULL, NULL),
(75, 'hat27_1.jpg', 27, NULL, NULL),
(76, 'hat27_2.jpg', 27, NULL, NULL),
(77, 'hat28_1.jpg', 28, NULL, NULL),
(78, 'hat28_2.jpg', 28, NULL, NULL),
(79, 'hat29_1.jpg', 29, NULL, NULL),
(80, 'hat29_2.jpg', 29, NULL, NULL),
(81, 'hat30_1.jpg', 30, NULL, NULL),
(82, 'hat30_2.jpg', 30, NULL, NULL),
(83, 'nike_bag_31_1.jpg', 31, NULL, NULL),
(84, 'nike_bag_31_2.jpg', 31, NULL, NULL),
(85, 'nike_bag_32_1.jpg', 32, NULL, NULL),
(86, 'nike_bag_32_2.jpg', 32, NULL, NULL),
(87, 'nike_bag_33_1.jpg', 33, NULL, NULL),
(88, 'nike_bag_33_2.jpg', 33, NULL, NULL),
(89, 'nike_bag_34_1.jpg', 34, NULL, NULL),
(90, 'nike_bag_34_2.jpg', 34, NULL, NULL),
(91, 'nike_bag_35_1.jpg', 35, NULL, NULL),
(92, 'nike_bag_35_2.jpg', 35, NULL, NULL),
(93, 'nike_bag_36_1.jpg', 36, NULL, NULL),
(94, 'nike_bag_36_2.jpg', 36, NULL, NULL),
(95, 'nike_bag_37_1.jpg', 37, NULL, NULL),
(96, 'nike_bag_37_2.jpg', 37, NULL, NULL),
(97, 'nike_bag_38_1.jpg', 38, NULL, NULL),
(98, 'nike_bag_38_2.jpg', 38, NULL, NULL),
(99, 'nike_bag_39_1.jpg', 39, NULL, NULL),
(100, 'nike_bag_39_2.jpg', 39, NULL, NULL),
(101, 'nike_bag_40_1.jpg', 40, NULL, NULL),
(102, 'nike_bag_40_2.jpg', 40, NULL, NULL),
(103, 'nike_sandal_41_1.jpg', 41, NULL, NULL),
(104, 'nike_sandal_41_2.jpg', 41, NULL, NULL),
(105, 'nike_sandal_42_1.jpg', 42, NULL, NULL),
(106, 'nike_sandal_42_2.jpg', 42, NULL, NULL),
(107, 'nike_sandal_43_1.jpg', 43, NULL, NULL),
(108, 'nike_sandal_43_2.jpg', 43, NULL, NULL),
(109, 'nike_sandal_44_1.jpg', 44, NULL, NULL),
(110, 'nike_sandal_44_2.jpg', 44, NULL, NULL),
(111, 'nike_sandal_45_1.jpg', 45, NULL, NULL),
(112, 'nike_sandal_45_2.jpg', 45, NULL, NULL),
(113, 'nike_sandal_46_1.jpg', 46, NULL, NULL),
(114, 'nike_sandal_46_2.jpg', 46, NULL, NULL),
(115, 'nike_sandal_47_1.jpg', 47, NULL, NULL),
(116, 'nike_sandal_47_2.jpg', 47, NULL, NULL),
(117, 'nike_sandal_48_1.jpg', 48, NULL, NULL),
(118, 'nike_sandal_48_2.jpg', 48, NULL, NULL),
(119, 'nike_sandal_49_1.jpg', 49, NULL, NULL),
(120, 'nike_sandal_49_2.jpg', 49, NULL, NULL),
(121, 'nike_sandal_50_1.jpg', 50, NULL, NULL),
(122, 'nike_sandal_50_2.jpg', 50, NULL, NULL),
(123, 'adi_bag_51_1.jpg', 51, NULL, NULL),
(124, 'adi_bag_51_2.jpg', 51, NULL, NULL),
(125, 'adi_bag_52_1.jpg', 52, NULL, NULL),
(126, 'adi_bag_52_2.jpg', 52, NULL, NULL),
(127, 'adi_bag_53_1.jpg', 53, NULL, NULL),
(128, 'adi_bag_53_2.jpg', 53, NULL, NULL),
(129, 'adi_bag_54_1.jpg', 54, NULL, NULL),
(130, 'adi_bag_54_2.jpg', 54, NULL, NULL),
(131, 'adi_bag_55_1.jpg', 55, NULL, NULL),
(132, 'adi_bag_55_2.jpg', 55, NULL, NULL),
(133, 'adi_clothing_56_1.jpg', 56, NULL, NULL),
(134, 'adi_clothing_56_2.jpg', 56, NULL, NULL),
(135, 'adi_clothing_57_1.jpg', 57, NULL, NULL),
(136, 'adi_clothing_57_2.jpg', 57, NULL, NULL),
(137, 'adi_clothing_58_1.jpg', 58, NULL, NULL),
(138, 'adi_clothing_58_2.jpg', 58, NULL, NULL),
(139, 'adi_clothing_59_1.jpg', 59, NULL, NULL),
(140, 'adi_clothing_59_2.jpg', 59, NULL, NULL),
(141, 'adi_clothing_60_1.jpg', 60, NULL, NULL),
(142, 'adi_clothing_60_2.jpg', 60, NULL, NULL),
(143, 'adi_hat_61_1.jpg', 61, NULL, NULL),
(144, 'adi_hat_61_2.jpg', 61, NULL, NULL),
(145, 'adi_hat_62_1.jpg', 62, NULL, NULL),
(146, 'adi_hat_62_2.jpg', 62, NULL, NULL),
(147, 'adi_hat_63_1.jpg', 63, NULL, NULL),
(148, 'adi_hat_63_2.jpg', 63, NULL, NULL),
(149, 'adi_hat_64_1.jpg', 64, NULL, NULL),
(150, 'adi_hat_64_2.jpg', 64, NULL, NULL),
(151, 'adi_hat_65_1.jpg', 65, NULL, NULL),
(152, 'adi_hat_65_2.jpg', 65, NULL, NULL),
(153, 'adi_sandal_66_1.jpg', 66, NULL, NULL),
(154, 'adi_sandal_66_2.jpg', 66, NULL, NULL),
(155, 'adi_sandal_67_1.jpg', 67, NULL, NULL),
(156, 'adi_sandal_67_2.jpg', 67, NULL, NULL),
(157, 'adi_sandal_68_1.jpg', 68, NULL, NULL),
(158, 'adi_sandal_68_2.jpg', 68, NULL, NULL),
(159, 'adi_sandal_69_1.jpg', 69, NULL, NULL),
(160, 'adi_sandal_69_2.jpg', 69, NULL, NULL),
(161, 'adi_sandal_70_1.jpg', 70, NULL, NULL),
(162, 'adi_sandal_70_2.jpg', 70, NULL, NULL),
(163, 'adi_shoes_71_2.jpg', 71, NULL, NULL),
(164, 'adi_shoes_71_2.jpg', 71, NULL, NULL),
(165, 'adi_shoes_72_1.jpg', 72, NULL, NULL),
(166, 'adi_shoes_72_2.jpg', 72, NULL, NULL),
(167, 'adi_shoes_73_1.jpg', 73, NULL, NULL),
(168, 'adi_shoes_73_2.jpg', 73, NULL, NULL),
(169, 'adi_shoes_74_1.jpg', 74, NULL, NULL),
(170, 'adi_shoes_74_2.jpg', 74, NULL, NULL),
(171, 'adi_shoes_75_1.jpg', 75, NULL, NULL),
(172, 'adi_shoes_75_2.jpg', 75, NULL, NULL),
(173, 'puma_bag_76_2.jpg', 76, NULL, NULL),
(174, 'puma_bag_76_2.jpg', 76, NULL, NULL),
(175, 'puma_bag_77_1.jpg', 77, NULL, NULL),
(176, 'puma_bag_77_2.jpg', 77, NULL, NULL),
(177, 'puma_bag_78_1.jpg', 78, NULL, NULL),
(178, 'puma_bag_78_2.jpg', 78, NULL, NULL),
(179, 'puma_bag_79_1.jpg', 79, NULL, NULL),
(180, 'puma_bag_79_2.jpg', 79, NULL, NULL),
(181, 'puma_bag_80_1.jpg', 80, NULL, NULL),
(182, 'puma_bag_80_2.jpg', 80, NULL, NULL),
(183, 'puma_clo_81_1.jpg', 81, NULL, NULL),
(184, 'puma_clo_81_2.jpg', 81, NULL, NULL),
(185, 'puma_clo_82_1.jpg', 82, NULL, NULL),
(186, 'puma_clo_82_2.jpg', 82, NULL, NULL),
(187, 'puma_clo_83_1.jpg', 83, NULL, NULL),
(188, 'puma_clo_83_2.jpg', 83, NULL, NULL),
(189, 'puma_clo_84_1.jpg', 84, NULL, NULL),
(190, 'puma_clo_84_2.jpg', 84, NULL, NULL),
(191, 'puma_clo_85_1.jpg', 85, NULL, NULL),
(192, 'puma_clo_85_2.jpg', 85, NULL, NULL),
(193, 'puma_sandal_86_1.jpg', 86, NULL, NULL),
(194, 'puma_sandal_86_2.jpg', 86, NULL, NULL),
(195, 'puma_sandal_87_1.jpg', 87, NULL, NULL),
(196, 'puma_sandal_87_2.jpg', 87, NULL, NULL),
(197, 'puma_sandal_88_1.jpg', 88, NULL, NULL),
(198, 'puma_sandal_88_2.jpg', 88, NULL, NULL),
(199, 'puma_sandal_89_1.jpg', 89, NULL, NULL),
(200, 'puma_sandal_89_2.jpg', 89, NULL, NULL),
(201, 'puma_sandal_90_1.jpg', 90, NULL, NULL),
(202, 'puma_sandal_90_2.jpg', 90, NULL, NULL),
(203, 'puma_hat_91_1.jpg', 91, NULL, NULL),
(204, 'puma_hat_91_2.jpg', 91, NULL, NULL),
(205, 'puma_hat_92_1.jpg', 92, NULL, NULL),
(206, 'puma_hat_92_2.jpg', 92, NULL, NULL),
(207, 'puma_hat_93_1.jpg', 93, NULL, NULL),
(208, 'puma_hat_93_2.jpg', 93, NULL, NULL),
(209, 'puma_hat_94_1.jpg', 94, NULL, NULL),
(210, 'puma_hat_94_2.jpg', 94, NULL, NULL),
(211, 'puma_hat_95_1.jpg', 95, NULL, NULL),
(212, 'puma_hat_95_2.jpg', 95, NULL, NULL),
(213, 'puma_shoes_96_1.jpg', 96, NULL, NULL),
(214, 'puma_shoes_96_2.jpg', 96, NULL, NULL),
(215, 'puma_shoes_97_1.jpg', 97, NULL, NULL),
(216, 'puma_shoes_97_2.jpg', 97, NULL, NULL),
(217, 'puma_shoes_98_1.jpg', 98, NULL, NULL),
(218, 'puma_shoes_98_2.jpg', 98, NULL, NULL),
(219, 'puma_shoes_99_1.jpg', 99, NULL, NULL),
(220, 'puma_shoes_99_2.jpg', 99, NULL, NULL),
(221, 'puma_shoes_100_1.jpg', 100, NULL, NULL),
(222, 'puma_shoes_100_2.jpg', 100, NULL, NULL),
(223, 'kappa_bag_101_1.jpg', 101, NULL, NULL),
(224, 'kappa_bag_101_2.jpg', 101, NULL, NULL),
(225, 'kappa_bag_102_1.jpg', 102, NULL, NULL),
(226, 'kappa_bag_102_2.jpg', 102, NULL, NULL),
(227, 'kappa_bag_103_1.jpg', 103, NULL, NULL),
(228, 'kappa_bag_103_2.jpg', 103, NULL, NULL),
(229, 'kappa_bag_104_1.jpg', 104, NULL, NULL),
(230, 'kappa_bag_104_2.jpg', 104, NULL, NULL),
(231, 'kappa_bag_105_1.jpg', 105, NULL, NULL),
(232, 'kappa_bag_105_2.jpg', 105, NULL, NULL),
(233, 'kappa_clo_106_1.jpg', 106, NULL, NULL),
(234, 'kappa_clo_106_2.jpg', 106, NULL, NULL),
(235, 'kappa_clo_107_1.jpg', 107, NULL, NULL),
(236, 'kappa_clo_107_2.jpg', 107, NULL, NULL),
(237, 'kappa_clo_108_1.jpg', 108, NULL, NULL),
(238, 'kappa_clo_108_2.jpg', 108, NULL, NULL),
(239, 'kappa_clo_109_1.jpg', 109, NULL, NULL),
(240, 'kappa_clo_109_2.jpg', 109, NULL, NULL),
(241, 'kappa_clo_110_1.jpg', 110, NULL, NULL),
(242, 'kappa_clo_110_2.jpg', 110, NULL, NULL),
(243, 'kappa_hat_111_1.jpg', 111, NULL, NULL),
(244, 'kappa_hat_111_2.jpg', 111, NULL, NULL),
(245, 'kappa_hat_112_1.jpg', 112, NULL, NULL),
(246, 'kappa_hat_112_2.jpg', 112, NULL, NULL),
(247, 'kappa_hat_113_1.jpg', 113, NULL, NULL),
(248, 'kappa_hat_113_2.jpg', 113, NULL, NULL),
(249, 'kappa_hat_114_1.jpg', 114, NULL, NULL),
(250, 'kappa_hat_114_2.jpg', 114, NULL, NULL),
(251, 'kappa_hat_115_1.jpg', 115, NULL, NULL),
(252, 'kappa_hat_115_2.jpg', 115, NULL, NULL),
(253, 'kappa_sandal_116_1.jpg', 116, NULL, NULL),
(254, 'kappa_sandal_116_2.jpg', 116, NULL, NULL),
(255, 'kappa_sandal_117_1.jpg', 117, NULL, NULL),
(256, 'kappa_sandal_117_2.jpg', 117, NULL, NULL),
(257, 'kappa_sandal_118_1.jpg', 118, NULL, NULL),
(258, 'kappa_sandal_118_2.jpg', 118, NULL, NULL),
(259, 'kappa_sandal_119_1.jpg', 119, NULL, NULL),
(260, 'kappa_sandal_119_2.jpg', 119, NULL, NULL),
(261, 'kappa_sandal_120_1.jpg', 120, NULL, NULL),
(262, 'kappa_sandal_120_2.jpg', 120, NULL, NULL),
(263, 'kappa_shoes_121_1.jpg', 121, NULL, NULL),
(264, 'kappa_shoes_121_2.jpg', 121, NULL, NULL),
(265, 'kappa_shoes_122_1.jpg', 122, NULL, NULL),
(266, 'kappa_shoes_122_2.jpg', 122, NULL, NULL),
(267, 'kappa_shoes_123_1.jpg', 123, NULL, NULL),
(268, 'kappa_shoes_123_2.jpg', 123, NULL, NULL),
(269, 'kappa_shoes_124_1.jpg', 124, NULL, NULL),
(270, 'kappa_shoes_124_2.jpg', 124, NULL, NULL),
(271, 'kappa_shoes_125_1.jpg', 125, NULL, NULL),
(272, 'kappa_shoes_125_2.jpg', 125, NULL, NULL),
(273, 'fila_bag_126_1.jpg', 126, NULL, NULL),
(274, 'fila_bag_126_2.jpg', 126, NULL, NULL),
(275, 'fila_bag_127_1.jpg', 127, NULL, NULL),
(276, 'fila_bag_127_2.jpg', 127, NULL, NULL),
(277, 'fila_bag_128_1.jpg', 128, NULL, NULL),
(278, 'fila_bag_128_2.jpg', 128, NULL, NULL),
(279, 'fila_bag_129_1.jpg', 129, NULL, NULL),
(280, 'fila_bag_129_2.jpg', 129, NULL, NULL),
(281, 'fila_bag_130_1.jpg', 130, NULL, NULL),
(282, 'fila_bag_130_2.jpg', 130, NULL, NULL),
(283, 'fila_clo_131_1.jpg', 131, NULL, NULL),
(284, 'fila_clo_131_2.jpg', 131, NULL, NULL),
(285, 'fila_clo_132_1.jpg', 132, NULL, NULL),
(286, 'fila_clo_132_2.jpg', 132, NULL, NULL),
(287, 'fila_clo_133_1.jpg', 133, NULL, NULL),
(288, 'fila_clo_133_2.jpg', 133, NULL, NULL),
(289, 'fila_clo_134_1.jpg', 134, NULL, NULL),
(290, 'fila_clo_134_2.jpg', 134, NULL, NULL),
(291, 'fila_clo_135_1.jpg', 135, NULL, NULL),
(292, 'fila_clo_135_2.jpg', 135, NULL, NULL),
(293, 'fila_hat_136_1.jpg', 136, NULL, NULL),
(294, 'fila_hat_136_2.jpg', 136, NULL, NULL),
(295, 'fila_hat_137_1.jpg', 137, NULL, NULL),
(296, 'fila_hat_137_2.jpg', 137, NULL, NULL),
(297, 'fila_hat_138_1.jpg', 138, NULL, NULL),
(298, 'fila_hat_138_2.jpg', 138, NULL, NULL),
(299, 'fila_hat_139_1.jpg', 139, NULL, NULL),
(300, 'fila_hat_139_2.jpg', 139, NULL, NULL),
(301, 'fila_hat_140_1.jpg', 140, NULL, NULL),
(302, 'fila_hat_140_2.jpg', 140, NULL, NULL),
(303, 'fila_sandal_141_1.jpg', 141, NULL, NULL),
(304, 'fila_sandal_141_2.jpg', 141, NULL, NULL),
(305, '1fila_sandal_142_1.jpg', 142, NULL, NULL),
(306, '1fila_sandal_142_2.jpg', 142, NULL, NULL),
(307, 'fila_sandal_143_1.jpg', 143, NULL, NULL),
(308, 'fila_sandal_143_2.jpg', 143, NULL, NULL),
(309, 'fila_sandal_144_1.jpg', 144, NULL, NULL),
(310, 'fila_sandal_144_2.jpg', 144, NULL, NULL),
(311, 'fila_sandal_145_1.jpg', 145, NULL, NULL),
(312, 'fila_sandal_145_2.jpg', 145, NULL, NULL),
(313, 'fila_shoes_146_1.jpg', 146, NULL, NULL),
(314, 'fila_shoes_146_2.jpg', 146, NULL, NULL),
(315, 'fila_shoes_147_1.jpg', 147, NULL, NULL),
(316, 'fila_shoes_147_2.jpg', 147, NULL, NULL),
(317, 'fila_shoes_148_1.jpg', 148, NULL, NULL),
(318, 'fila_shoes_148_2.jpg', 148, NULL, NULL),
(319, 'fila_shoes_149_1.jpg', 149, NULL, NULL),
(320, 'fila_shoes_149_2.jpg', 149, NULL, NULL),
(321, 'fila_shoes_150_1.jpg', 150, NULL, NULL),
(322, 'fila_shoes_150_2.jpg', 150, NULL, NULL),
(323, 'hat21_3.jpg', 21, NULL, NULL),
(324, 'hat22_3.jpg', 22, NULL, NULL),
(325, 'hat23_3.jpg', 23, NULL, NULL),
(326, 'hat24_3.jpg', 24, NULL, NULL),
(327, 'hat25_3.jpg', 25, NULL, NULL),
(328, 'hat26_3.jpg', 26, NULL, NULL),
(329, 'hat27_3.jpg', 27, NULL, NULL),
(330, 'hat28_3.jpg', 28, NULL, NULL),
(331, 'hat29_3.jpg', 29, NULL, NULL),
(332, 'hat30_3.jpg', 30, NULL, NULL),
(333, 'nike_bag_31_3.jpg', 31, NULL, NULL),
(334, 'nike_bag_32_3.jpg', 32, NULL, NULL),
(335, 'nike_bag_33_3.jpg', 33, NULL, NULL),
(336, 'nike_bag_34_3.jpg', 34, NULL, NULL),
(337, 'nike_bag_35_3.jpg', 35, NULL, NULL),
(338, 'nike_bag_36_3.jpg', 36, NULL, NULL),
(339, 'nike_bag_37_3.jpg', 37, NULL, NULL),
(340, 'nike_bag_38_3.jpg', 38, NULL, NULL),
(341, 'nike_bag_39_3.jpg', 39, NULL, NULL),
(342, 'nike_bag_40_3.jpg', 40, NULL, NULL),
(343, 'nike_sandal_41_3.jpg', 41, NULL, NULL),
(344, 'nike_sandal_42_3.jpg', 42, NULL, NULL),
(345, 'nike_sandal_43_3.jpg', 43, NULL, NULL),
(346, 'nike_sandal_44_3.jpg', 44, NULL, NULL),
(347, 'nike_sandal_45_3.jpg', 45, NULL, NULL),
(348, 'nike_sandal_46_3.jpg', 46, NULL, NULL),
(349, 'nike_sandal_47_3.jpg', 47, NULL, NULL),
(350, 'nike_sandal_48_3.jpg', 48, NULL, NULL),
(351, 'nike_sandal_49_3.jpg', 49, NULL, NULL),
(352, 'nike_sandal_50_3.jpg', 50, NULL, NULL),
(353, 'adi_bag_51_3.jpg', 51, NULL, NULL),
(354, 'adi_bag_52_3.jpg', 52, NULL, NULL),
(355, 'adi_bag_53_3.jpg', 53, NULL, NULL),
(356, 'adi_bag_54_3.jpg', 54, NULL, NULL),
(357, 'adi_bag_55_3.jpg', 55, NULL, NULL),
(358, 'adi_clothing_56_3.jpg', 56, NULL, NULL),
(359, 'adi_clothing_57_3.jpg', 57, NULL, NULL),
(360, 'adi_clothing_58_3.jpg', 58, NULL, NULL),
(361, 'adi_clothing_59_3.jpg', 59, NULL, NULL),
(362, 'adi_clothing_60_3.jpg', 60, NULL, NULL),
(363, 'adi_hat_61_3.jpg', 61, NULL, NULL),
(364, 'adi_hat_62_3.jpg', 62, NULL, NULL),
(365, 'adi_hat_63_3.jpg', 63, NULL, NULL),
(366, 'adi_hat_64_3.jpg', 64, NULL, NULL),
(367, 'adi_hat_65_3.jpg', 65, NULL, NULL),
(368, 'adi_sandal_66_3.jpg', 66, NULL, NULL),
(369, 'adi_sandal_67_3.jpg', 67, NULL, NULL),
(370, 'adi_sandal_68_3.jpg', 68, NULL, NULL),
(371, 'adi_sandal_69_3.jpg', 69, NULL, NULL),
(372, 'adi_sandal_70_3.jpg', 70, NULL, NULL),
(373, 'adi_shoes_71_3.jpg', 71, NULL, NULL),
(374, 'adi_shoes_72_3.jpg', 72, NULL, NULL),
(375, 'adi_shoes_73_3.jpg', 73, NULL, NULL),
(376, 'adi_shoes_74_3.jpg', 74, NULL, NULL),
(377, 'adi_shoes_75_3.jpg', 75, NULL, NULL),
(378, 'puma_bag_76_3.jpg', 76, NULL, NULL),
(379, 'puma_bag_77_3.jpg', 77, NULL, NULL),
(380, 'puma_bag_78_3.jpg', 78, NULL, NULL),
(381, 'puma_bag_79_3.jpg', 79, NULL, NULL),
(382, 'puma_bag_80_3.jpg', 80, NULL, NULL),
(383, 'puma_clo_81_3.jpg', 81, NULL, NULL),
(384, 'puma_clo_82_3.jpg', 82, NULL, NULL),
(385, 'puma_clo_83_3.jpg', 83, NULL, NULL),
(386, 'puma_clo_84_3.jpg', 84, NULL, NULL),
(387, 'puma_clo_85_3.jpg', 85, NULL, NULL),
(388, 'puma_sandal_86_3.jpg', 86, NULL, NULL),
(389, 'puma_sandal_87_3.jpg', 87, NULL, NULL),
(390, 'puma_sandal_88_3.jpg', 88, NULL, NULL),
(391, 'puma_sandal_89_3.jpg', 89, NULL, NULL),
(392, 'puma_sandal_90_3.jpg', 90, NULL, NULL),
(393, 'puma_hat_91_3.jpg', 91, NULL, NULL),
(394, 'puma_hat_92_3.jpg', 92, NULL, NULL),
(395, 'puma_hat_93_3.jpg', 93, NULL, NULL),
(396, 'puma_hat_94_3.jpg', 94, NULL, NULL),
(397, 'puma_hat_95_3.jpg', 95, NULL, NULL),
(398, 'puma_shoes_96_3.jpg', 96, NULL, NULL),
(399, 'puma_shoes_97_3.jpg', 97, NULL, NULL),
(400, 'puma_shoes_98_3.jpg', 98, NULL, NULL),
(401, 'puma_shoes_99_3.jpg', 99, NULL, NULL),
(402, 'puma_shoes_100_3.jpg', 100, NULL, NULL),
(403, 'kappa_bag_101_3.jpg', 101, NULL, NULL),
(404, 'kappa_bag_102_3.jpg', 102, NULL, NULL),
(405, 'kappa_bag_103_3.jpg', 103, NULL, NULL),
(406, 'kappa_bag_104_3.jpg', 104, NULL, NULL),
(407, 'kappa_bag_105_3.jpg', 105, NULL, NULL),
(408, 'kappa_clo_106_3.jpg', 106, NULL, NULL),
(409, 'kappa_clo_107_3.jpg', 107, NULL, NULL),
(410, 'kappa_clo_108_3.jpg', 108, NULL, NULL),
(411, 'kappa_clo_109_3.jpg', 109, NULL, NULL),
(412, 'kappa_clo_110_3.jpg', 110, NULL, NULL),
(413, 'kappa_hat_111_3.jpg', 111, NULL, NULL),
(414, 'kappa_hat_112_3.jpg', 112, NULL, NULL),
(415, 'kappa_hat_113_3.jpg', 113, NULL, NULL),
(416, 'kappa_hat_114_3.jpg', 114, NULL, NULL),
(417, 'kappa_hat_115_3.jpg', 115, NULL, NULL),
(418, 'kappa_sandal_116_3.jpg', 116, NULL, NULL),
(419, 'kappa_sandal_117_3.jpg', 117, NULL, NULL),
(420, 'kappa_sandal_118_3.jpg', 118, NULL, NULL),
(421, 'kappa_sandal_119_3.jpg', 119, NULL, NULL),
(422, 'kappa_sandal_120_3.jpg', 120, NULL, NULL),
(423, 'kappa_shoes_121_3.jpg', 121, NULL, NULL),
(424, 'kappa_shoes_122_3.jpg', 122, NULL, NULL),
(425, 'kappa_shoes_123_3.jpg', 123, NULL, NULL),
(426, 'kappa_shoes_124_3.jpg', 124, NULL, NULL),
(427, 'kappa_shoes_125_3.jpg', 125, NULL, NULL),
(428, 'fila_bag_126_3.jpg', 126, NULL, NULL),
(429, 'fila_bag_127_3.jpg', 127, NULL, NULL),
(430, 'fila_bag_128_3.jpg', 128, NULL, NULL),
(431, 'fila_bag_129_3.jpg', 129, NULL, NULL),
(432, 'fila_bag_130_3.jpg', 130, NULL, NULL),
(433, 'fila_clo_131_3.jpg', 131, NULL, NULL),
(434, 'fila_clo_132_3.jpg', 132, NULL, NULL),
(435, 'fila_clo_133_3.jpg', 133, NULL, NULL),
(436, 'fila_clo_134_3.jpg', 134, NULL, NULL),
(437, 'fila_clo_135_3.jpg', 135, NULL, NULL),
(438, 'fila_hat_136_3.jpg', 136, NULL, NULL),
(439, 'fila_hat_137_3.jpg', 137, NULL, NULL),
(440, 'fila_hat_138_3.jpg', 138, NULL, NULL),
(441, 'fila_hat_139_3.jpg', 139, NULL, NULL),
(442, 'fila_hat_140_3.jpg', 140, NULL, NULL),
(443, 'fila_sandal_141_3.jpg', 141, NULL, NULL),
(444, 'fila_sandal_142_3.jpg', 142, NULL, NULL),
(445, 'fila_sandal_143_3.jpg', 143, NULL, NULL),
(446, 'fila_sandal_144_3.jpg', 144, NULL, NULL),
(447, 'fila_sandal_145_3.jpg', 145, NULL, NULL),
(448, 'fila_shoes_146_3.jpg', 146, NULL, NULL),
(449, 'fila_shoes_147_3.jpg', 147, NULL, NULL),
(450, 'fila_shoes_148_3.jpg', 148, NULL, NULL),
(451, 'fila_shoes_149_3.jpg', 149, NULL, NULL),
(452, 'fila_shoes_150_3.jpg', 150, NULL, NULL),
(453, 'adi_clothing_61_1.jpg', 151, NULL, NULL),
(454, 'adi_clothing_61_2.jpg', 151, NULL, NULL),
(455, 'adi_clothing_61_3.jpg', 151, NULL, NULL),
(456, 'adi_clothing_62_1.jpg', 152, NULL, NULL),
(457, 'adi_clothing_62_2.jpg', 152, NULL, NULL),
(458, 'adi_clothing_62_3.jpg', 152, NULL, NULL),
(459, 'fila_clo_136_1.jpg', 153, NULL, NULL),
(460, 'fila_clo_136_2.jpg', 153, NULL, NULL),
(461, 'fila_clo_136_3.jpg', 153, NULL, NULL);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `protypes`
--

DROP TABLE IF EXISTS `protypes`;
CREATE TABLE IF NOT EXISTS `protypes` (
  `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `type_name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `protypes`
--

INSERT INTO `protypes` (`id`, `type_name`, `created_at`, `updated_at`) VALUES
(1, 'Clothing', NULL, NULL),
(2, 'Shoes', NULL, NULL),
(3, 'Hats', NULL, NULL),
(4, 'Bags', NULL, NULL),
(5, 'Sandal', NULL, NULL);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `ratings`
--

DROP TABLE IF EXISTS `ratings`;
CREATE TABLE IF NOT EXISTS `ratings` (
  `rating_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `rating_comment` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `product_id` int(10) UNSIGNED NOT NULL,
  `user_id` int(10) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `rating_name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  PRIMARY KEY (`rating_id`),
  KEY `ratings_product_id_foreign` (`product_id`),
  KEY `ratings_user_id_foreign` (`user_id`)
) ENGINE=MyISAM AUTO_INCREMENT=29 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `ratings`
--

INSERT INTO `ratings` (`rating_id`, `rating_comment`, `product_id`, `user_id`, `created_at`, `updated_at`, `rating_name`) VALUES
(5, 'giày như quần què z má ơi', 6, 6, NULL, NULL, 'nguyen thi le'),
(4, 'oke nha bồ', 32, 5, NULL, NULL, 'trần phi thường'),
(6, 'non dep do', 27, 5, NULL, NULL, 'trần phi thường'),
(7, 'cui qua', 35, 5, NULL, NULL, 'trần phi thường'),
(8, 'xin so', 12, 5, NULL, NULL, 'trần phi thường'),
(9, 'ấddf', 11, 5, NULL, NULL, 'trần phi thường'),
(10, 'áo đẹp', 11, 5, NULL, NULL, 'trần phi thường'),
(11, 'quần xấu', 13, 5, NULL, NULL, 'trần phi thường'),
(12, 'giày cùi quá', 10, 6, NULL, NULL, 'nguyen thi le'),
(13, 'hihi', 135, 6, NULL, NULL, 'nguyen thi le'),
(14, 'hoho', 11, 6, NULL, NULL, 'nguyen thi le'),
(15, 'haha', 17, 6, NULL, NULL, 'nguyen thi le'),
(1, '2', 3, 2, '2021-06-14 17:00:00', '2021-06-14 17:00:00', 'thuong'),
(16, 'lelelele', 11, 6, '2021-06-14 17:00:00', NULL, 'nguyen thi le'),
(17, 'sản phẩm của tao mà', 12, 6, '2021-06-14 17:00:00', NULL, 'nguyen thi le'),
(18, 'huhu', 153, 5, '2021-06-16 17:00:00', NULL, 'trần phi thường'),
(19, 'quần xịn', 20, 11, '2021-06-18 17:00:00', NULL, 'soobin'),
(20, 'áo đẹp', 18, 11, '2021-06-18 17:00:00', NULL, 'soobin'),
(21, 'ko đepfj', 13, 11, '2021-06-18 17:00:00', NULL, 'soobin'),
(22, 'oke đó you', 12, 11, '2021-06-18 17:00:00', NULL, 'soobin'),
(23, '11', 11, 13, '2021-06-20 17:00:00', NULL, 'tiến'),
(24, 'test purchase history', 13, 13, '2021-06-20 17:00:00', NULL, 'tiến'),
(25, 'giày vip quá', 147, 14, '2021-06-21 17:00:00', NULL, 'heo'),
(26, 'dđ', 13, 5, '2021-06-22 17:00:00', NULL, 'trần phi thường'),
(27, 'ngu', 13, 5, '2021-06-22 17:00:00', NULL, 'trần phi thường'),
(28, 'hahahahahaha', 10, 5, '2021-06-24 17:00:00', NULL, 'trần phi thường');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `role`
--

DROP TABLE IF EXISTS `role`;
CREATE TABLE IF NOT EXISTS `role` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name_role` text COLLATE utf8mb4_unicode_ci,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `role`
--

INSERT INTO `role` (`id`, `name_role`) VALUES
(1, 'admin'),
(2, 'user');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `sanpham`
--

DROP TABLE IF EXISTS `sanpham`;
CREATE TABLE IF NOT EXISTS `sanpham` (
  `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `price` double NOT NULL,
  `type_id` int(10) UNSIGNED NOT NULL,
  `manu_id` int(10) UNSIGNED NOT NULL,
  `description` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `image` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `sanpham_type_id_foreign` (`type_id`),
  KEY `sanpham_manu_id_foreign` (`manu_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `shipping__infos`
--

DROP TABLE IF EXISTS `shipping__infos`;
CREATE TABLE IF NOT EXISTS `shipping__infos` (
  `shipping_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `shipping_email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `shipping_name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `shipping_address` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `shipping_phone` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `shipping_note` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`shipping_id`)
) ENGINE=MyISAM AUTO_INCREMENT=51 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `shipping__infos`
--

INSERT INTO `shipping__infos` (`shipping_id`, `shipping_email`, `shipping_name`, `shipping_address`, `shipping_phone`, `shipping_note`, `created_at`, `updated_at`) VALUES
(1, 'tranthuong@gmail.com', 'trần phi thường', 'thôn 2 cư mốt', '00000000000', 'đơn hàng dễ vỡ', NULL, NULL),
(2, 'tranthuong@gmail.com', 'tran phi thuong', 'thôn 3 cư mốt', '0999999999', NULL, NULL, NULL),
(3, 'tranthuong@gmail.com', 'thuong tran ne', 'ho chi min', '0937742323', NULL, NULL, NULL),
(4, 'nhattran@gmail.com', 'tran phi nhat', 'lam dong', '23424', 'giao trong ngay', NULL, NULL),
(5, 'nhattran@gmail.com', 'thuong', 'ha noi', '23424', 'tttttttt', NULL, NULL),
(6, 'truyen@gmail.com', 'thanh tuyen', 'dak lak', '096343', 'hello', NULL, NULL),
(7, 'truyen@gmail.com', 'thuong', 'ha noi', '096343', 'sdfsdfs', NULL, NULL),
(8, 'tranthuong@gmail.com', 'tt', 'tt', '444', 'sfsfd', NULL, NULL),
(9, 'huong@gmail.com', 'huong', 'huong222', '0386817841', NULL, NULL, NULL),
(10, 'hưng@gmail.com', 'xuân hưng', 'đà lạt', '095823232', 'nhanh nha ba', NULL, NULL),
(11, 'quang@gmail.com', 'quang', 'đà nẵng', '00000000', 'nhớ nha ba', NULL, NULL),
(12, 'quang@gmail.com', 'quang', 'đà nẵng', '00000000', 'nhớ nha ba', NULL, NULL),
(13, 'quang@gmail.com', 'quang', 'hello', '55555555', 'demo', NULL, NULL),
(14, 'quang@gmail.com', 'quang', 'hello', '55555555', 'demo', NULL, NULL),
(15, 'quang@gmail.com', 'quang tèo', 'hà nội', '200209342', 'please', NULL, NULL),
(16, 'quang@gmail.com', 'quang tèo', 'hà nội', '200209342', 'please', NULL, NULL),
(17, 'quang@gmail.com', 'quang tèo', 'hà nội', '200209342', 'please', NULL, NULL),
(18, 'tranthuong@gmail.com', 'quang tèo', 'thôn 3 cư mốt', '0999999999', 'hehe', NULL, NULL),
(19, 'le123@gmail.com', 'le', 'dakaka', '33333333', 'sfsf', NULL, NULL),
(20, 'le123@gmail.com', 'le', 'daklak', '43444444', 'fsdf', NULL, NULL),
(21, 'tuan@gmail.com', 'tuan', 'ho chi minh', '09999999999', 'tuan dep trai', NULL, NULL),
(22, 'tranthuong@gmail.com', 'nguyen thi thuy', 'ho chi min', '0937742323', 'quan short', NULL, NULL),
(23, 'tranthuong@gmail.com', 'thuong', 'daklak', '44444', 'ko co j', NULL, NULL),
(24, 'le1234@gmail.com', 'nguyen thi le', 'daklak ma oi', '0386817841', 'giao lẹ giùm má ơi', NULL, NULL),
(25, 'fgf', 'le', 'gg', '43', 'hh', NULL, NULL),
(26, 'nam', 'new', 'hihi', '3333333', 'nữ', NULL, NULL),
(27, 'tranthuong@gmail.com', 'tè le', 'ho chi min', '0937742323', 'sdfff', NULL, NULL),
(28, 'tranthuong@gmail.com', 'tè le', 'ho chi min', '0937742323', 'sdfff', NULL, NULL),
(29, 'tranthuong@gmail.com', 'ke tao', 'dak a', '0000000', 'ko co j', NULL, NULL),
(30, 'trrr', 'huynh trang', 'ha noi', 'tttt', 'sfsd', NULL, NULL),
(31, 'trrr', 'huynh trang', 'ha noi', 'tttt', 'sfsd', NULL, NULL),
(32, 'ádfas', 'sdf', 'fasfa', 'ádf', NULL, NULL, NULL),
(33, 'tranthuong@gmail.com', 'trần phi thường new', 'hcm', '444444', 'test nè', NULL, NULL),
(34, 'le123@gmail.com', 'nguyễn thị lệ new', 'đak lak', '3333333', 'giày nè', NULL, NULL),
(35, 'huong@gmail.com', 'hồ quang heieus', 'buôn ma thuột', '666666', 'ca sỹ', NULL, NULL),
(36, 'huong@gmail.com', 'huong', 'h', '0386817841', NULL, NULL, NULL),
(37, 'tranthuong@gmail.com', 'thuong tran ne', 'ho chi min', '0937742323', NULL, NULL, NULL),
(38, 'ấ', 'phỏng vấn', 'đăk lakw', 'dsfs', NULL, NULL, NULL),
(39, 'soobin@gmail.com', 'soobin hoàng sơn', 'hồ chí mình', '22222', 'lịch sử mua hàng', NULL, NULL),
(40, 'soobin@gmail.com', 'soobin hoàng sơn', 'hồ chí minh', '33', NULL, NULL, NULL),
(41, '333', 'fsf', 'sfsdf', '33', NULL, NULL, NULL),
(42, 'hong@gmail.com', 'hồng', 'đak lak', '3333333', 'ko có gì', NULL, NULL),
(43, 'le1234@gmail.com', 'soobin hoàng sơn', 'daklak ma oi', '0386817841', NULL, NULL, NULL),
(44, 'le1234@gmail.com', 'soobin hoàng sơn', 'daklak ma oi', '0386817841', NULL, NULL, NULL),
(45, 'tien@gmail.com', 'tiên', 'thôn 3 cư mốt', '0999999999', NULL, NULL, NULL),
(46, 'tien@gmail.com', 'tiên', 'thôn 3 cư mốt', '0999999999', NULL, NULL, NULL),
(47, 'tien@gmail.com', 'tiên', 'thôn 3 cư mốt', '0999999999', NULL, NULL, NULL),
(48, 'heo@gmail.com', 'heo', 'đà nẵng', '111111', NULL, NULL, NULL),
(49, 'dd', 'dd', 'dd', 'dđ', NULL, NULL, NULL),
(50, 'ẻwerwerw', 'ẻg', 'dfsd', '5345345', NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `type__users`
--

DROP TABLE IF EXISTS `type__users`;
CREATE TABLE IF NOT EXISTS `type__users` (
  `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `type_user` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_id` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `type__users_user_id_foreign` (`user_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `users`
--

DROP TABLE IF EXISTS `users`;
CREATE TABLE IF NOT EXISTS `users` (
  `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `username` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `password` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `phone` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `role` text COLLATE utf8mb4_unicode_ci,
  PRIMARY KEY (`id`),
  UNIQUE KEY `users_email_unique` (`email`)
) ENGINE=MyISAM AUTO_INCREMENT=15 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `users`
--

INSERT INTO `users` (`id`, `username`, `password`, `name`, `email`, `phone`, `email_verified_at`, `remember_token`, `created_at`, `updated_at`, `role`) VALUES
(14, NULL, '25d55ad283aa400af464c76d713c07ad', 'heo', 'heo@gmail.com', '11111111', NULL, NULL, NULL, NULL, NULL),
(6, NULL, '25d55ad283aa400af464c76d713c07ad', 'nguyen thi le', 'le123@gmail.com', '0386817841', NULL, NULL, NULL, NULL, ''),
(5, NULL, '25d55ad283aa400af464c76d713c07ad', 'trần phi thường', 'tranthuong@gmail.com', '0937742323', NULL, NULL, NULL, NULL, ''),
(12, 'tran anh quân', 'Thuong2001@', 'trần anh quân', 'quan@gmail.com', '0989999999', NULL, NULL, NULL, NULL, NULL),
(11, NULL, '25d55ad283aa400af464c76d713c07ad', 'soobin', 'soobin@gmail.com', '11111111', NULL, NULL, NULL, NULL, '2'),
(10, NULL, '25d55ad283aa400af464c76d713c07ad', 'hồng', 'hong@gmail.com', '12345678', NULL, NULL, NULL, NULL, '1');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

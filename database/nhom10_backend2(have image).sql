-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Máy chủ: 127.0.0.1:3308
-- Thời gian đã tạo: Th5 09, 2021 lúc 02:42 PM
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
-- Cơ sở dữ liệu: `nhom10_backend2`
--

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `bills`
--

DROP TABLE IF EXISTS `bills`;
CREATE TABLE IF NOT EXISTS `bills` (
  `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `user_id` int(11) NOT NULL,
  `total_money` double NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `bills_user_id_foreign` (`user_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

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
  PRIMARY KEY (`id`),
  KEY `bill__details_bill_id_foreign` (`bill_id`),
  KEY `bill__details_product_id_foreign` (`product_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

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
) ENGINE=MyISAM AUTO_INCREMENT=10 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

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
(9, '2021_05_09_035845_create_type__users_table', 1);

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
  PRIMARY KEY (`id`),
  KEY `products_type_id_foreign` (`type_id`),
  KEY `products_manu_id_foreign` (`manu_id`),
  KEY `products_gender_foreign` (`gender`)
) ENGINE=MyISAM AUTO_INCREMENT=29 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `products`
--

INSERT INTO `products` (`id`, `name`, `price`, `type_id`, `manu_id`, `description`, `sale`, `size`, `gender`, `created_at`, `updated_at`) VALUES
(1, 'Nike Air III', 4109000, 2, 1, 'The people\'s shoe returns with the Nike Air Max III. This faithful remake showcases a timeless mix of OG colors', 0, 40, 1, '2021-05-09 09:11:47', '2021-05-09 09:11:47'),
(2, 'Nike Air VaporMax Evo', 6179000, 2, 1, 'The Nike Air VaporMax Evo puts Air Max DNA under the microscope, to showcase the distinguishing features of 7 Nike icons.', 0, 40, 1, '2021-05-09 09:11:47', '2021-05-09 09:11:47'),
(3, 'Nike Air Max 90', 3519000, 2, 1, 'Nothing as fly, nothing as comfortable, nothing as proven—the Nike Air Max 90 stays true to its roots with the iconic Waffle sole', 0, 41, 1, '2021-05-09 09:54:30', '2021-05-09 09:54:30'),
(4, 'Air Jordan 1 Mid', 3239000, 2, 1, 'The Air Jordan 1 Mid Shoe is inspired by the first AJ1, offering fans of Jordan retros a chance to follow in the footsteps of greatness', 0, 42, 1, '2021-05-09 09:11:47', '2021-05-09 09:11:47'),
(5, 'Jordan MA2 \'Still Loading', 369900, 2, 1, 'Lace up your journey in the Jordan MA2 \'Still Loading\'. Inspired by our unlimited potential as athletes*', 0, 41, 1, '2021-05-09 09:54:30', '2021-05-09 09:54:30'),
(6, 'Nike Waffle One\r\n', 2929000, 2, 1, 'Bringing a new look to the Waffle sneaker family, the Nike Waffle One balances everything you love about heritage Nike running with fresh innovations', 0, 39, 2, '2021-05-09 09:11:47', '2021-05-09 09:11:47'),
(7, 'Nike Waffle Racer 2X', 2929000, 2, 1, 'Revamping classic Nike running shoes, the Nike Waffle Racer 2X modernises the traditional moccasin-inspired upper and Waffle outsole with exaggerated details.', 0, 41, 2, '2021-05-09 09:54:30', '2021-05-09 09:54:30'),
(8, 'Nike Waffle Racer Crater', 2929000, 2, 1, 'Putting a fresh twist on the 1977 OG, the Nike Waffle Racer Crater combines super-plush Crater Foam with Nike Grind rubber details for a rugged, athletics-inspired look', 400, 40, 2, '2021-05-09 10:07:21', '2021-05-09 10:07:21'),
(9, 'Nike Air VaporMax 2020 Flyknit', 6459000, 2, 1, 'Designed with sustainability in mind, the Nike Air VaporMax 2020 Flyknit is made from at least 50% recycled content by weight. ', 0, 41, 2, '2021-05-09 09:54:30', '2021-05-09 09:54:30'),
(10, 'Nike Air VaporMax 2020 Flyknit', 4518000, 2, 1, 'Designed with sustainability in mind, the Nike Air VaporMax 2020 Flyknit is made from at least 50% recycled content by weight.', 400, 40, 2, '2021-05-09 10:12:51', '2021-05-09 10:12:51'),
(11, 'Nike Sportswear', 819000, 1, 1, 'Complement your favourite sneakers in the comfort of the Nike Sportswear T-Shirt. Its everyday fabric and classic fit provide a soft, familiar feel.', 0, 40, 1, '2021-05-09 09:11:47', '2021-05-09 09:11:47'),
(12, 'Jordan Jumpman Classics', 819000, 1, 1, 'Ready for take-off. The Jordan Jumpman Classics T-Shirt riffs on an iconic Michael Jordan image with a fresh, bold-letter graphic.', 0, 42, 1, '2021-05-09 09:54:30', '2021-05-09 09:54:30'),
(13, 'Jordan Sport DNA', 1019000, 1, 1, 'Rise in the Jordan Sport DNA Long-Sleeve Crew, a cotton-made tee with multicolour heritage graphics.', 0, 39, 1, '2021-05-09 09:11:47', '2021-05-09 09:11:47'),
(14, 'Jordan Jumpman Classics', 1279000, 1, 1, 'The Jordan Jumpman Classics Shorts are made from softly brushed French terry for comfort. They have an easy, relaxed feel and come with a toggle-adjustable waistband.', 0, 40, 1, '2021-05-09 09:54:30', '2021-05-09 09:54:30'),
(15, 'Jordan Sport DNA', 1019000, 1, 1, 'Rise in the Jordan Sport DNA Long-Sleeve Crew, a cotton-made tee with multicolour heritage graphics.', 0, 39, 1, '2021-05-09 09:11:47', '2021-05-09 09:11:47'),
(16, 'Jordan Jumpman Classics', 1279000, 1, 1, 'The Jordan Jumpman Classics Shorts are made from softly brushed French terry for comfort. They have an easy, relaxed feel and come with a toggle-adjustable waistband.', 0, 40, 1, '2021-05-09 09:54:30', '2021-05-09 09:54:30'),
(17, 'Jordan Sport DNA', 1019000, 1, 1, 'Rise in the Jordan Sport DNA Long-Sleeve Crew, a cotton-made tee with multicolour heritage graphics.', 0, 39, 1, '2021-05-09 09:11:47', '2021-05-09 09:11:47'),
(18, 'Jordan Jumpman Classics', 1279000, 1, 1, 'The Jordan Jumpman Classics Shorts are made from softly brushed French terry for comfort. They have an easy, relaxed feel and come with a toggle-adjustable waistband.', 0, 40, 1, '2021-05-09 09:54:30', '2021-05-09 09:54:30'),
(19, 'Jordan Sport DNA', 1019000, 1, 1, 'Rise in the Jordan Sport DNA Long-Sleeve Crew, a cotton-made tee with multicolour heritage graphics.', 0, 39, 1, '2021-05-09 09:11:47', '2021-05-09 09:11:47'),
(20, 'Jordan Jumpman Classics', 1279000, 1, 1, 'The Jordan Jumpman Classics Shorts are made from softly brushed French terry for comfort. They have an easy, relaxed feel and come with a toggle-adjustable waistband.', 0, 40, 1, '2021-05-09 09:54:30', '2021-05-09 09:54:30');

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
) ENGINE=MyISAM AUTO_INCREMENT=18 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

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
(17, 'nike5_3.jpg', 5, NULL, NULL);

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
  `username` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `phone` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `users_email_unique` (`email`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

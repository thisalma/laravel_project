-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Oct 03, 2025 at 10:49 AM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `ecommerce_laravel`
--

-- --------------------------------------------------------

--
-- Table structure for table `cache`
--

CREATE TABLE `cache` (
  `key` varchar(255) NOT NULL,
  `value` mediumtext NOT NULL,
  `expiration` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `cache`
--

INSERT INTO `cache` (`key`, `value`, `expiration`) VALUES
('laravel-cache-1a88b2349a0fe58bbf345a23eb699091', 'i:2;', 1759208447),
('laravel-cache-1a88b2349a0fe58bbf345a23eb699091:timer', 'i:1759208447;', 1759208447),
('laravel-cache-4eca67cd10916ffc4106cf9a3db38683', 'i:1;', 1759480013),
('laravel-cache-4eca67cd10916ffc4106cf9a3db38683:timer', 'i:1759480013;', 1759480013),
('laravel-cache-64ac7765348487197e0c744906106737', 'i:1;', 1757923806),
('laravel-cache-64ac7765348487197e0c744906106737:timer', 'i:1757923806;', 1757923806),
('laravel-cache-c2f856e3f4f2f265c3b97e081655fb0b', 'i:1;', 1757579204),
('laravel-cache-c2f856e3f4f2f265c3b97e081655fb0b:timer', 'i:1757579204;', 1757579204),
('laravel-cache-cbf082b30d6e582bad0e33d4dd88d83e', 'i:1;', 1759480428),
('laravel-cache-cbf082b30d6e582bad0e33d4dd88d83e:timer', 'i:1759480428;', 1759480428),
('laravel-cache-mina@gamail.com|127.0.0.1', 'i:2;', 1759208447),
('laravel-cache-mina@gamail.com|127.0.0.1:timer', 'i:1759208447;', 1759208447);

-- --------------------------------------------------------

--
-- Table structure for table `cache_locks`
--

CREATE TABLE `cache_locks` (
  `key` varchar(255) NOT NULL,
  `owner` varchar(255) NOT NULL,
  `expiration` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `uuid` varchar(255) NOT NULL,
  `connection` text NOT NULL,
  `queue` text NOT NULL,
  `payload` longtext NOT NULL,
  `exception` longtext NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `jobs`
--

CREATE TABLE `jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `queue` varchar(255) NOT NULL,
  `payload` longtext NOT NULL,
  `attempts` tinyint(3) UNSIGNED NOT NULL,
  `reserved_at` int(10) UNSIGNED DEFAULT NULL,
  `available_at` int(10) UNSIGNED NOT NULL,
  `created_at` int(10) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `job_batches`
--

CREATE TABLE `job_batches` (
  `id` varchar(255) NOT NULL,
  `name` varchar(255) NOT NULL,
  `total_jobs` int(11) NOT NULL,
  `pending_jobs` int(11) NOT NULL,
  `failed_jobs` int(11) NOT NULL,
  `failed_job_ids` longtext NOT NULL,
  `options` mediumtext DEFAULT NULL,
  `cancelled_at` int(11) DEFAULT NULL,
  `created_at` int(11) NOT NULL,
  `finished_at` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '0001_01_01_000000_create_users_table', 1),
(2, '0001_01_01_000001_create_cache_table', 1),
(3, '0001_01_01_000002_create_jobs_table', 1),
(4, '2025_09_05_114731_add_two_factor_columns_to_users_table', 1),
(5, '2025_09_05_114821_create_personal_access_tokens_table', 1),
(6, '2025_09_20_094542_create_products_table', 2),
(7, '2025_09_24_065123_add_contact_and_address_to_users_table', 3),
(8, '2025_09_25_034814_create_orders_table', 4),
(9, '2025_09_25_035542_create_order_items_table', 4);

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `order_number` int(11) NOT NULL,
  `total` decimal(10,2) NOT NULL,
  `payment_method` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`id`, `user_id`, `order_number`, `total`, `payment_method`, `created_at`, `updated_at`) VALUES
(3, 13, 3, 1450.00, 'Cash on Delivery', '2025-09-25 00:12:56', '2025-09-25 00:12:56'),
(4, 5, 1, 1750.00, 'Cash on Delivery', '2025-09-28 05:41:33', '2025-09-28 05:41:33'),
(5, 5, 2, 2450.00, 'Cash on Delivery', '2025-09-28 05:45:25', '2025-09-28 05:45:25'),
(6, 5, 3, 2250.00, 'Cash on Delivery', '2025-09-28 05:46:20', '2025-09-28 05:46:20'),
(7, 5, 4, 1750.00, 'Cash on Delivery', '2025-09-28 05:46:56', '2025-09-28 05:46:56'),
(8, 5, 5, 2250.00, 'Cash on Delivery', '2025-09-28 05:49:12', '2025-09-28 05:49:12'),
(9, 5, 6, 850.00, 'Cash on Delivery', '2025-09-28 05:50:12', '2025-09-28 05:50:12'),
(10, 5, 7, 1750.00, 'Cash on Delivery', '2025-09-28 05:51:36', '2025-09-28 05:51:36'),
(14, 15, 483150, 3450.00, 'cod', '2025-10-03 01:25:34', '2025-10-03 01:25:34'),
(15, 15, 300385, 4450.00, 'cod', '2025-10-03 01:30:52', '2025-10-03 01:30:52'),
(16, 15, 2370, 1250.00, 'cod', '2025-10-03 01:35:52', '2025-10-03 01:35:52'),
(17, 5, 5062, 1250.00, 'cod', '2025-10-03 01:53:52', '2025-10-03 01:53:52'),
(18, 5, 7664, 1650.00, 'cod', '2025-10-03 02:16:04', '2025-10-03 02:16:04'),
(19, 5, 8342, 2950.00, 'cod', '2025-10-03 02:41:32', '2025-10-03 02:41:32');

-- --------------------------------------------------------

--
-- Table structure for table `order_items`
--

CREATE TABLE `order_items` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `order_id` bigint(20) UNSIGNED NOT NULL,
  `product_name` varchar(255) NOT NULL,
  `quantity` int(11) NOT NULL,
  `price` decimal(10,2) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `order_items`
--

INSERT INTO `order_items` (`id`, `order_id`, `product_name`, `quantity`, `price`, `created_at`, `updated_at`) VALUES
(3, 3, 'Dairy Milk Chocolate', 1, 1200.00, '2025-09-25 00:12:56', '2025-09-25 00:12:56'),
(4, 4, 'Quaker Rolled oats', 1, 1500.00, '2025-09-28 05:41:33', '2025-09-28 05:41:33'),
(5, 5, 'Werther\'s Original', 2, 600.00, '2025-09-28 05:45:25', '2025-09-28 05:45:25'),
(6, 5, 'Apple Juice', 1, 1000.00, '2025-09-28 05:45:25', '2025-09-28 05:45:25'),
(7, 6, 'Jordans Granola', 1, 2000.00, '2025-09-28 05:46:20', '2025-09-28 05:46:20'),
(8, 7, 'Tomato sause', 1, 1500.00, '2025-09-28 05:46:56', '2025-09-28 05:46:56'),
(9, 8, 'Jordans Granola', 1, 2000.00, '2025-09-28 05:49:12', '2025-09-28 05:49:12'),
(10, 9, 'Werther\'s Original', 1, 600.00, '2025-09-28 05:50:12', '2025-09-28 05:50:12'),
(11, 10, 'Quaker Rolled oats', 1, 1500.00, '2025-09-28 05:51:36', '2025-09-28 05:51:36'),
(12, 16, 'Cadbury Hot Chocolate', 1, 1000.00, '2025-10-03 01:35:52', '2025-10-03 01:35:52'),
(13, 17, 'Fruit Juice 1L', 1, 1000.00, '2025-10-03 01:53:52', '2025-10-03 01:53:52'),
(14, 18, 'Pizza', 1, 1400.00, '2025-10-03 02:16:04', '2025-10-03 02:16:04'),
(15, 19, 'Dairy Milk Chocolate', 1, 1200.00, '2025-10-03 02:41:32', '2025-10-03 02:41:32'),
(16, 19, 'Ramen Noodles', 1, 1500.00, '2025-10-03 02:41:32', '2025-10-03 02:41:32');

-- --------------------------------------------------------

--
-- Table structure for table `password_reset_tokens`
--

CREATE TABLE `password_reset_tokens` (
  `email` varchar(255) NOT NULL,
  `token` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `personal_access_tokens`
--

CREATE TABLE `personal_access_tokens` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `tokenable_type` varchar(255) NOT NULL,
  `tokenable_id` bigint(20) UNSIGNED NOT NULL,
  `name` text NOT NULL,
  `token` varchar(64) NOT NULL,
  `abilities` text DEFAULT NULL,
  `last_used_at` timestamp NULL DEFAULT NULL,
  `expires_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `personal_access_tokens`
--

INSERT INTO `personal_access_tokens` (`id`, `tokenable_type`, `tokenable_id`, `name`, `token`, `abilities`, `last_used_at`, `expires_at`, `created_at`, `updated_at`) VALUES
(1, 'App\\Models\\User', 2, 'flutter_token', '961920fc541c19581c0a773183e8dc577ec3117c3d579e4b0822e347beb75234', '[\"*\"]', NULL, NULL, '2025-09-14 01:25:44', '2025-09-14 01:25:44'),
(2, 'App\\Models\\User', 4, 'mobile-token', 'f18fad25f670fe10e106df7ca4abc3b354f65bc49d627ba330044bd26d8f1528', '[\"*\"]', NULL, NULL, '2025-09-16 23:45:09', '2025-09-16 23:45:09'),
(3, 'App\\Models\\User', 4, 'mobile-token', '435f6aeebac1adc22e7df58ce246accc5ea9dd4b07f6ef0e9af216c98bd6820d', '[\"*\"]', NULL, NULL, '2025-09-16 23:48:25', '2025-09-16 23:48:25'),
(4, 'App\\Models\\User', 5, 'mobile-token', '34b0a77087b11c943063d8a41ab9cc510a61cf675635aaa2fd92d0839a3e273d', '[\"*\"]', NULL, NULL, '2025-09-17 01:22:52', '2025-09-17 01:22:52'),
(5, 'App\\Models\\User', 6, 'mobile-token', '22b8f3d488a154b831c2c02ca8aedd1f52cd9d0b40df361d20cd81d19dfc9237', '[\"*\"]', NULL, NULL, '2025-09-17 01:24:21', '2025-09-17 01:24:21'),
(6, 'App\\Models\\User', 7, 'mobile-token', 'e0df677964129889c08a9b88f06c87b3230423e0cd06fb525c4acfbc2475d7c9', '[\"*\"]', NULL, NULL, '2025-09-17 01:30:49', '2025-09-17 01:30:49'),
(7, 'App\\Models\\User', 8, 'mobile-token', '1e42253deeff879c3ad13c6381c375903f52f00e472b884602d3ad8b49d75ff0', '[\"*\"]', NULL, NULL, '2025-09-17 01:37:07', '2025-09-17 01:37:07'),
(8, 'App\\Models\\User', 5, 'mobile-token', 'ba4075d89d2ca6a475a5e6106b837364d3073fc6082933c7c8ff87fbf761c24e', '[\"*\"]', NULL, NULL, '2025-09-17 01:38:12', '2025-09-17 01:38:12'),
(9, 'App\\Models\\User', 5, 'mobile-token', '28bb83ae15c81d035c6a584444422bff9ab890f2bebeaf8c92dce8b2d8253a8f', '[\"*\"]', NULL, NULL, '2025-09-17 01:39:55', '2025-09-17 01:39:55'),
(10, 'App\\Models\\User', 9, 'mobile-token', '2004b8451df89f7023a29146ba859b7a9695d2ba168fa29067d5ffc9d2b4fd4f', '[\"*\"]', NULL, NULL, '2025-09-17 02:32:20', '2025-09-17 02:32:20'),
(11, 'App\\Models\\User', 10, 'mobile-token', 'b4b03d8814fb223e5abe88cb44dd932b3404ec68adf5c96f741df9e698666c36', '[\"*\"]', NULL, NULL, '2025-09-17 02:46:10', '2025-09-17 02:46:10'),
(12, 'App\\Models\\User', 11, 'mobile-token', '517156e8981d69f68f46127c1b42fb371c1ce58adc4ecfc3b39d30ae90a9aa79', '[\"*\"]', NULL, NULL, '2025-09-17 02:58:40', '2025-09-17 02:58:40'),
(13, 'App\\Models\\User', 5, 'mobile-token', 'adc3db539db948fcff950c0ac594ab392cddf71ab32ad2439ce49c65e93f020a', '[\"*\"]', NULL, NULL, '2025-09-17 05:28:10', '2025-09-17 05:28:10'),
(14, 'App\\Models\\User', 5, 'mobile-token', '0bc6a229362de31e7106e451e9b1bc5c06d90ddf0f615ffc0a4cc8640e8a17b4', '[\"*\"]', NULL, NULL, '2025-09-17 05:28:12', '2025-09-17 05:28:12'),
(15, 'App\\Models\\User', 5, 'mobile-token', '00b9730f65c875ce3c7af512398be42775da7429e3b33a60e56722891619477a', '[\"*\"]', NULL, NULL, '2025-09-17 06:01:37', '2025-09-17 06:01:37'),
(16, 'App\\Models\\User', 5, 'mobile-token', '0059b40dfb4cf41cde9d32be435dd143e03e4d0d576f1f8401ff671e18f6395b', '[\"*\"]', NULL, NULL, '2025-09-17 06:01:40', '2025-09-17 06:01:40'),
(17, 'App\\Models\\User', 5, 'mobile-token', 'c61b3291afa7bc0f9503f3e6eac0400f0b03a1f379be35ffad24be71b3b1dd62', '[\"*\"]', NULL, NULL, '2025-09-17 06:01:46', '2025-09-17 06:01:46'),
(18, 'App\\Models\\User', 5, 'mobile-token', '24d65d8b0df53cf2f0cc5c7a2edf5b6675ba2e61f98fa3368385b4b451917398', '[\"*\"]', NULL, NULL, '2025-09-17 06:01:50', '2025-09-17 06:01:50'),
(19, 'App\\Models\\User', 5, 'mobile-token', 'cf5fd36566af5dd8d1f9936d704c8ce5bcdd54c5efda7ccd8a3f07fdc9816b8b', '[\"*\"]', NULL, NULL, '2025-09-17 06:01:51', '2025-09-17 06:01:51'),
(20, 'App\\Models\\User', 5, 'mobile-token', '1141eceabcae7be66c83d56ec87b51fff98f73b3d574c3f486d51e4d82826e98', '[\"*\"]', NULL, NULL, '2025-09-17 06:02:03', '2025-09-17 06:02:03'),
(21, 'App\\Models\\User', 12, 'mobile-token', '9a8feece12af52e807bf5352487ae9c3db59aa2a5074c5ef6b25df1854b95e3a', '[\"*\"]', NULL, NULL, '2025-09-18 01:55:10', '2025-09-18 01:55:10'),
(22, 'App\\Models\\User', 5, 'mobile-token', 'eb97c505b883898c5a7fa900ef5122d83d9a4d20113ad64aae741394d0a6d2ca', '[\"*\"]', NULL, NULL, '2025-09-21 01:43:18', '2025-09-21 01:43:18'),
(23, 'App\\Models\\User', 5, 'mobile-token', '82b0cebdae131bcd7c98097647c9cba6c062aebe5aa6a939e6d9ab6b3a91bfec', '[\"*\"]', NULL, NULL, '2025-09-22 04:45:16', '2025-09-22 04:45:16'),
(24, 'App\\Models\\User', 5, 'mobile-token', '75de9829aa5bd3a2ed288cfc9f819a85bb42eb6ff487a0e61dde2563f99d9211', '[\"*\"]', NULL, NULL, '2025-09-22 04:45:21', '2025-09-22 04:45:21'),
(25, 'App\\Models\\User', 5, 'mobile-token', '097b53ca4fe2b95169a4fd025d5861a9ded46eeb5173fe65de1650d4146bc835', '[\"*\"]', NULL, NULL, '2025-10-02 02:14:57', '2025-10-02 02:14:57'),
(26, 'App\\Models\\User', 15, 'mobile-token', '0f14b5fb83dfc8b6715c8725195a38e137c977b088d5ed907588c5b01537f299', '[\"*\"]', NULL, NULL, '2025-10-02 02:17:08', '2025-10-02 02:17:08'),
(27, 'App\\Models\\User', 15, 'mobile-token', 'ec12ba23b462408a3243ff1e7c95e94102949f8846f7a53ca79bae5766a290f1', '[\"*\"]', '2025-10-03 01:35:52', NULL, '2025-10-02 22:37:22', '2025-10-03 01:35:52'),
(28, 'App\\Models\\User', 5, 'mobile-token', '2e9ae7980e719a4f2427d82a26e9ee369e487b4db9c798456486623abe37ebd5', '[\"*\"]', '2025-10-03 02:48:41', NULL, '2025-10-03 01:41:03', '2025-10-03 02:48:41');

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `description` text DEFAULT NULL,
  `price` decimal(10,2) NOT NULL,
  `image` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`id`, `name`, `description`, `price`, `image`, `created_at`, `updated_at`) VALUES
(1, 'Galaxy Drinking Chocolate', 'Galaxy drinking chocolate is an indulgent hot chocolate mix known for its smooth, creamy, and decadent flavor. Made with real Galaxy milk chocolate, it is prized by fans for its silky texture and rich taste.', 1000.00, 'products/DtMS03JngYgIY0hq7OktKtsCLe5yRuIHR0dE0Pnk.jpg', '2025-09-21 10:45:06', '2025-09-21 10:45:06'),
(2, 'Nutella', 'Nutella is a creamy and sweet hazelnut cocoa spread manufactured by the Italian company Ferrero. The product is beloved globally for its smooth texture and distinctive flavor, making it a popular spread for toast, pancakes, waffles, and crepes, as well as an ingredient in many desserts', 2000.00, 'products/Uzv8o2MdDqNZjwNYrCaRpdSe3BgKJI4Eel85JhDh.jpg', '2025-09-22 02:25:57', '2025-09-22 02:25:57'),
(3, 'Dairy Milk Chocolate', 'Cadbury Dairy Milk The Creamiest, Milkiest Chocolate You\'ve Ever Tasted', 1200.00, 'products/zqR5yoLmslPAUXNGPtQl2URjlWMZbWbpG6rrsTHo.jpg', '2025-09-22 02:28:05', '2025-09-22 02:28:05'),
(4, 'Tomato sause', 'This rich, versatile tomato sauce is made from quality tomatoes, balanced with savory spices, a touch of sweetness, and a smooth consistency, perfect as a dipping sauce for snacks or an ingredient for pasta, pizza, and various savory dishes.', 1500.00, 'products/XdTQEQnRNixD0CDQSi0GlRpGDkW0JuS89Ug8xqu2.png', '2025-09-25 00:17:02', '2025-09-25 00:17:02'),
(5, 'Apple Juice', 'Enjoy the timeless, crisp flavor of our apple juice. Made from 100% pure, pressed apples with no added sugar or artificial ingredients, it\'s a naturally delicious and refreshing beverage that the whole family will love.', 1000.00, 'products/7SKBcGes1eZpQlapynrGOdsJIjtbVFeHuARUGcn9.jpg', '2025-09-25 00:18:06', '2025-09-25 00:18:06'),
(6, 'Corn Beef', 'Savor the rich, savory flavor of our premium corned beef. Made from a quality cut of beef brisket cured to perfection in a blend of salt and spices, it\'s slow-cooked for a melt-in-your-mouth tenderness.', 1000.00, 'products/iLHTEqNO9l8wFQYACCoMAyENC4V3xaPHFaZVThFQ.jpg', '2025-09-25 00:19:52', '2025-09-25 00:19:52'),
(7, 'Jordans Granola', 'Savour the simple, wholesome goodness of Jordans Simply Granola with a Hint of Honey. This classic blend is made with toasted wholegrain oats baked to a delicious crunch, subtly sweetened with a touch of honey. It\'s high in fibre, contains no artificial flavours or preservatives, and is perfect on its own or as a customisable base for your favourite breakfast creation', 2000.00, 'products/CEyzL6ssUjlchILcTzONXIMJH6QIaRXjbwljwihw.jpg', '2025-09-25 00:22:35', '2025-09-25 00:22:35'),
(8, 'Werther\'s Original', 'Discover a delightful combination of textures with Werther\'s Original Creamy Caramel Filled Hard Candies. A crunchy, golden butter candy shell gives way to a smooth, flowing caramel cream center for a luxurious, melt-in-your-mouth experience.', 600.00, 'products/lXas9GOrsq7c1Sbh4T3xTLkldr6iVOBcicofkAgX.jpg', '2025-09-25 00:23:44', '2025-09-25 00:23:44'),
(9, 'Quaker Rolled oats', 'Start your day the hearty way with Quaker Old Fashioned Rolled Oats. These 100% whole grains provide lasting energy to keep you feeling full all morning. They\'re a natural source of fiber and a good source of protein, with no artificial flavors or preservatives. Prepare a warm bowl for a satisfying, classic breakfast', 1500.00, 'products/FDpYwLD9DUddb9grMDrZsGMTxaeOEU6sYcEESmYF.jpg', '2025-09-25 00:24:45', '2025-09-25 00:24:45'),
(10, 'Penne Pasta', 'Savor every forkful of our wholesome penne pasta, made from the finest organic durum wheat. With a delightful al dente texture and a subtle, nutty flavor, it’s a pasta you can feel good about. The ribbed surface is engineered to hold light, fresh sauces and vibrant vegetable medleys, making for a meal that\'s both nutritious and delicious', 1000.00, 'products/CTdlgw87cr6VxYsUOWxGFUPeYAe7Y8X2UTlNCgh5.png', '2025-09-30 03:52:59', '2025-09-30 03:52:59'),
(11, 'Corn Chips', 'Experience the satisfyingly thick, rigid crunch of our corn chips. Made from a simple recipe of premium corn, sea salt, and high-quality oil, these chips deliver a roasted corn flavor so pure and intense, it stands on its own. Perfectly formed for maximum strength, they are the ideal partner for your best dips or a powerful snack straight from the bag', 200.00, 'products/KYhA4mLYh5REbqCIHq8SSlsniQcMt2cq5MgR6dFP.png', '2025-09-30 03:56:05', '2025-09-30 03:56:05');

-- --------------------------------------------------------

--
-- Table structure for table `sessions`
--

CREATE TABLE `sessions` (
  `id` varchar(255) NOT NULL,
  `user_id` bigint(20) UNSIGNED DEFAULT NULL,
  `ip_address` varchar(45) DEFAULT NULL,
  `user_agent` text DEFAULT NULL,
  `payload` longtext NOT NULL,
  `last_activity` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `sessions`
--

INSERT INTO `sessions` (`id`, `user_id`, `ip_address`, `user_agent`, `payload`, `last_activity`) VALUES
('m4BvhKoDFDdZFqreKptsytJyuujvSlfUZbGSG3Ta', 15, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/140.0.0.0 Safari/537.36 Edg/140.0.0.0', 'YTo2OntzOjY6Il90b2tlbiI7czo0MDoibDg0UlliQ2tpSmxxTjFENHhWSFFMbE9BZVphSXRnY290dmplWEh1SSI7czo2OiJfZmxhc2giO2E6Mjp7czozOiJvbGQiO2E6MDp7fXM6MzoibmV3IjthOjA6e319czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6Mjg6Imh0dHA6Ly8xMjcuMC4wLjE6ODAwMC9vcmRlcnMiO31zOjUwOiJsb2dpbl93ZWJfNTliYTM2YWRkYzJiMmY5NDAxNTgwZjAxNGM3ZjU4ZWE0ZTMwOTg5ZCI7aToxNTtzOjIxOiJwYXNzd29yZF9oYXNoX3NhbmN0dW0iO3M6NjA6IiQyeSQxMiRkMVhQVm1jMGtzaUJTV2dnN1RRc2RPbjJVa3ovOWJ2Mnl4VWcvQXZIaEdRRWJFbGQ0amFiTyI7czo0OiJjYXJ0IjthOjI6e2k6OTthOjQ6e3M6NDoibmFtZSI7czoxODoiUXVha2VyIFJvbGxlZCBvYXRzIjtzOjU6InByaWNlIjtzOjc6IjE1MDAuMDAiO3M6NToiaW1hZ2UiO3M6NTM6InByb2R1Y3RzL0ZEcFl3TEQ5RFVkZGI5Z3JNRHJac0dNVHhhZU9FVTZzWWNFRVNtWUYuanBnIjtzOjg6InF1YW50aXR5IjtpOjE7fWk6MTE7YTo0OntzOjQ6Im5hbWUiO3M6MTA6IkNvcm4gQ2hpcHMiO3M6NToicHJpY2UiO3M6NjoiMjAwLjAwIjtzOjU6ImltYWdlIjtzOjUzOiJwcm9kdWN0cy9LWWhBNG1MWWg1UkVicUNJSHE4U1Nsc25pUWNNdDJjcTVNZ1I2ZEZQLnBuZyI7czo4OiJxdWFudGl0eSI7aToxO319fQ==', 1759480967);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) NOT NULL,
  `two_factor_secret` text DEFAULT NULL,
  `two_factor_recovery_codes` text DEFAULT NULL,
  `two_factor_confirmed_at` timestamp NULL DEFAULT NULL,
  `remember_token` varchar(100) DEFAULT NULL,
  `current_team_id` bigint(20) UNSIGNED DEFAULT NULL,
  `profile_photo_path` varchar(2048) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `contact_number` varchar(255) DEFAULT NULL,
  `address` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `email_verified_at`, `password`, `two_factor_secret`, `two_factor_recovery_codes`, `two_factor_confirmed_at`, `remember_token`, `current_team_id`, `profile_photo_path`, `created_at`, `updated_at`, `contact_number`, `address`) VALUES
(1, 'lili', 'lili@gmail.com', NULL, '$2y$12$Irc320UQCsrwMvXt6ImehOthvj0APSr/4NubOh4ENLGeeawLBBzQm', NULL, NULL, NULL, NULL, NULL, NULL, '2025-09-05 06:54:26', '2025-09-05 06:54:26', NULL, NULL),
(2, 'Rose', 'rose@gmail.com', NULL, '$2y$12$j4B1kb4BdrcWtUAJXXPI7.uyXNggidpjOfzh9H9X2dHpJovNYd53O', NULL, NULL, NULL, NULL, NULL, NULL, '2025-09-08 01:36:36', '2025-09-08 01:36:36', NULL, NULL),
(3, 'Thisu', 'thisu@gmail.com', NULL, '$2y$12$5QNevTT3fXuBYKyaUZJ5YeOlMLNqhVBlsYPeAuxEal7loKVtTbrke', NULL, NULL, NULL, NULL, NULL, NULL, '2025-09-15 03:18:16', '2025-09-15 03:18:16', NULL, NULL),
(4, 'Risa', 'risa@gmail.com', NULL, '$2y$12$n0b5u6OmOgM.eXwOotRtn.xfnIEGV3iDj3OfPqrG0BGZnZc9JKUUK', NULL, NULL, NULL, NULL, NULL, NULL, '2025-09-16 23:45:08', '2025-09-16 23:45:08', NULL, NULL),
(5, 'Sima', 'sima@gmail.com', NULL, '$2y$12$nwikgqH/okFL2/SMeiYO8O3wX/ikOXquYr4ScqAF24rbV2FT6VOaq', NULL, NULL, NULL, NULL, NULL, NULL, '2025-09-17 01:22:52', '2025-09-24 01:45:59', '071035672', 'no 40 hill street'),
(6, 'Jhon', 'jhon@gmail.com', NULL, '$2y$12$VIRsmcF1Y0kjlF73RXjvfuY888Aux5S6OwQN04g6odkrayx.qNAkC', NULL, NULL, NULL, NULL, NULL, NULL, '2025-09-17 01:30:49', '2025-09-17 01:30:49', NULL, NULL),
(7, 'Susi', 'susi@gmail.com', NULL, '$2y$12$dKL6zGRM06VKiqcAm6itPuXrDF0NLkBGjnIMPTCABcsOOFWozqeaS', NULL, NULL, NULL, NULL, NULL, NULL, '2025-09-17 01:37:07', '2025-09-17 01:37:07', NULL, NULL),
(13, 'Shila', 'shila@gmail.com', NULL, '$2y$12$SjC1vIP6DBq98w808Z0XAuyq47e4N4RaJXJ4d2cDiReca.XB3JzBy', NULL, NULL, NULL, NULL, NULL, NULL, '2025-09-24 22:07:04', '2025-09-24 22:28:29', '0715689245', 'no 20 avenue road galkissa'),
(14, 'Stella', 'stella@gmail.com', NULL, '$2y$12$lkvwo6GkFQpJcQ9Dto3IFu.84yqm2IOk0EyuVdQFDoxsTAg/5q7D.', NULL, NULL, NULL, NULL, NULL, NULL, '2025-09-28 22:38:59', '2025-09-28 22:38:59', NULL, NULL),
(15, 'Sumba', 'sumba@gmail.com', NULL, '$2y$12$d1XPVmc0ksiBSWgg7TQsdOn2Ukz/9bv2yxUg/AvHhGQEbEld4jabO', NULL, NULL, NULL, NULL, NULL, NULL, '2025-10-02 01:46:34', '2025-10-02 11:05:56', NULL, NULL);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `cache`
--
ALTER TABLE `cache`
  ADD PRIMARY KEY (`key`);

--
-- Indexes for table `cache_locks`
--
ALTER TABLE `cache_locks`
  ADD PRIMARY KEY (`key`);

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Indexes for table `jobs`
--
ALTER TABLE `jobs`
  ADD PRIMARY KEY (`id`),
  ADD KEY `jobs_queue_index` (`queue`);

--
-- Indexes for table `job_batches`
--
ALTER TABLE `job_batches`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`id`),
  ADD KEY `orders_user_id_foreign` (`user_id`);

--
-- Indexes for table `order_items`
--
ALTER TABLE `order_items`
  ADD PRIMARY KEY (`id`),
  ADD KEY `order_items_order_id_foreign` (`order_id`);

--
-- Indexes for table `password_reset_tokens`
--
ALTER TABLE `password_reset_tokens`
  ADD PRIMARY KEY (`email`);

--
-- Indexes for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  ADD KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`),
  ADD KEY `personal_access_tokens_expires_at_index` (`expires_at`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `sessions`
--
ALTER TABLE `sessions`
  ADD PRIMARY KEY (`id`),
  ADD KEY `sessions_user_id_index` (`user_id`),
  ADD KEY `sessions_last_activity_index` (`last_activity`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `jobs`
--
ALTER TABLE `jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT for table `order_items`
--
ALTER TABLE `order_items`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=29;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `orders`
--
ALTER TABLE `orders`
  ADD CONSTRAINT `orders_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `order_items`
--
ALTER TABLE `order_items`
  ADD CONSTRAINT `order_items_order_id_foreign` FOREIGN KEY (`order_id`) REFERENCES `orders` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

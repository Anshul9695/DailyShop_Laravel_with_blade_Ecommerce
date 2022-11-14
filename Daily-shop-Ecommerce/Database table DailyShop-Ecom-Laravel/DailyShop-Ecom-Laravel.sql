-- phpMyAdmin SQL Dump
-- version 4.9.5deb2
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Nov 14, 2022 at 12:51 PM
-- Server version: 8.0.27-0ubuntu0.20.04.1
-- PHP Version: 7.2.34-28+ubuntu20.04.1+deb.sury.org+1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `DailyShop-Ecom-Laravel`
--

-- --------------------------------------------------------

--
-- Table structure for table `admins`
--

CREATE TABLE `admins` (
  `id` bigint UNSIGNED NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `admins`
--

INSERT INTO `admins` (`id`, `email`, `password`, `created_at`, `updated_at`) VALUES
(1, 'admin@gmail.com', '$2y$10$CfQwY6HBlmA9htwVwkJOLeKJl1rWfZ6riJcuVoply3UoYmbORk1Ae', '2022-07-12 02:43:15', '2022-07-11 23:32:38');

-- --------------------------------------------------------

--
-- Table structure for table `blog_posts`
--

CREATE TABLE `blog_posts` (
  `post_id` bigint UNSIGNED NOT NULL,
  `post_title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `post_description` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '1',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `blog_posts`
--

INSERT INTO `blog_posts` (`post_id`, `post_title`, `post_description`, `status`, `created_at`, `updated_at`) VALUES
(1, 'spacial festival time products', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Assumenda, ad? Autem quos natus nisi aperiam, beatae, fugiat odit vel impedit dicta enim repellendus animi. Expedita quas reprehenderit incidunt, voluptates corporis.', '1', '2022-09-21 02:10:35', '2022-09-21 02:10:35'),
(2, 'About the products', '<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Assumenda, ad? Autem quos natus nisi aperiam, beatae, fugiat odit vel impedit dicta enim repellendus animi. Expedita quas reprehenderit incidunt, voluptates corporis.</p>', '1', '2022-09-21 03:50:53', '2022-09-21 03:50:53'),
(3, 'About the single products', '<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Assumenda, ad? Autem quos natus nisi aperiam, beatae, fugiat odit vel impedit dicta enim repellendus animi. Expedita quas reprehenderit incidunt, voluptates corporis.</p>', '1', '2022-09-21 03:51:30', '2022-09-21 03:51:30'),
(4, 'Home collation and benifites', '<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Assumenda, ad? Autem quos natus nisi aperiam, beatae, fugiat odit vel impedit dicta enim repellendus animi. Expedita quas reprehenderit incidunt, voluptates corporis.</p>', '1', '2022-09-21 03:52:22', '2022-09-21 03:52:22');

-- --------------------------------------------------------

--
-- Table structure for table `brands`
--

CREATE TABLE `brands` (
  `id` bigint UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `image` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '1',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `brands`
--

INSERT INTO `brands` (`id`, `name`, `image`, `status`, `created_at`, `updated_at`) VALUES
(1, 'letest', 'IMG_20220314_123157.jpg', '1', NULL, NULL),
(2, 'kelvin check brand', 'ecommerce.jpeg', '1', NULL, '2022-07-28 05:00:21'),
(3, 'test_coupon', 'IMG_20220314_123157.jpg', '0', '2022-07-27 06:27:40', '2022-07-27 06:50:38'),
(6, 'test', NULL, '1', '2022-07-28 22:45:30', '2022-07-28 22:45:30'),
(7, 'Mishra Anshul', '1659069018.jpg', '1', '2022-07-28 23:00:18', '2022-07-28 23:00:18');

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `id` bigint UNSIGNED NOT NULL,
  `category_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `category_slug` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `status` int NOT NULL,
  `parent_category_id` int NOT NULL DEFAULT '0',
  `category_image` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'NULL'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`id`, `category_name`, `category_slug`, `created_at`, `updated_at`, `status`, `parent_category_id`, `category_image`) VALUES
(1, 'Mans', 'man', '2022-07-12 04:21:20', '2022-07-18 00:03:17', 1, 0, 'NULL'),
(2, 'SPORTS', 'SPORTS', '2022-07-12 04:22:29', '2022-08-30 07:38:06', 1, 0, 'NULL'),
(6, 'Women', 'womens', '2022-07-13 23:24:26', '2022-07-18 00:03:20', 1, 0, 'NULL'),
(9, 'ELECTRONICS', 'ELECTRONICS', '2022-07-28 07:08:43', '2022-08-30 07:36:52', 1, 2, '1659011923.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `colors`
--

CREATE TABLE `colors` (
  `id` bigint UNSIGNED NOT NULL,
  `color` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` int NOT NULL DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `colors`
--

INSERT INTO `colors` (`id`, `color`, `status`, `created_at`, `updated_at`) VALUES
(2, 'Red', 1, '2022-07-14 05:16:21', '2022-07-14 22:46:48'),
(3, 'Green', 1, '2022-07-14 05:16:27', '2022-07-14 22:47:01'),
(4, 'Blue', 0, '2022-07-14 05:16:32', '2022-07-14 05:16:32'),
(5, 'Brown', 0, '2022-07-14 06:43:11', '2022-07-14 06:43:11');

-- --------------------------------------------------------

--
-- Table structure for table `coupons`
--

CREATE TABLE `coupons` (
  `id` bigint UNSIGNED NOT NULL,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `code` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `value` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `status` int NOT NULL,
  `type` enum('value','per') COLLATE utf8mb4_unicode_ci NOT NULL,
  `min_order_amt` int NOT NULL,
  `is_once_time` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `coupons`
--

INSERT INTO `coupons` (`id`, `title`, `code`, `value`, `created_at`, `updated_at`, `status`, `type`, `min_order_amt`, `is_once_time`) VALUES
(1, 'January', 'jan_spl_offer', '200', '2022-07-13 07:05:49', '2022-07-14 00:51:42', 1, 'value', 0, 0),
(2, 'jan Coupon', 'jan 2022', '200', '2022-07-13 07:09:25', '2022-07-14 02:27:18', 1, 'value', 0, 0),
(6, 'super 500 up', 'super-500', '200', '2022-07-28 06:41:56', '2022-07-28 06:41:56', 0, 'per', 100, 1);

-- --------------------------------------------------------

--
-- Table structure for table `coustomers`
--

CREATE TABLE `coustomers` (
  `id` bigint UNSIGNED NOT NULL,
  `coustomer_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'NULL',
  `_coustomer_email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'NULL',
  `coustomer_phone` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'NULL',
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'NULL',
  `address` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'NULL',
  `city` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'NULL',
  `state` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'NULL',
  `zip` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'NULL',
  `company` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'NULL',
  `gstin` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'NULL',
  `image` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'NULL',
  `status` int NOT NULL DEFAULT '1',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `coustomers`
--

INSERT INTO `coustomers` (`id`, `coustomer_name`, `_coustomer_email`, `coustomer_phone`, `password`, `address`, `city`, `state`, `zip`, `company`, `gstin`, `image`, `status`, `created_at`, `updated_at`) VALUES
(1, 'Mishra Anshul', 'anshul@gmail.com', '6386437668', 'admin@123', 'chitrakoot uttar pradesh ', 'Agra', 'uttar pradesh', '210205', 'Unicode systems', '1', 'Null', 1, '2022-07-13 05:53:41', '2022-07-29 04:08:03'),
(2, 'DK Mishra', 'dkmishra@gmail.com', '9876543298', 'admin@123', 'NULL', 'NULL', 'NULL', 'NULL', 'NULL', 'NULL', 'NULL', 1, NULL, NULL),
(3, 'Aditya Mishra', 'aditya@gmail.com', '5409090909', 'NULL', 'chitrakoot', 'NULL', 'NULL', 'NULL', 'NULL', 'NULL', 'NULL', 1, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint UNSIGNED NOT NULL,
  `uuid` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `connection` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int UNSIGNED NOT NULL,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_resets_table', 1),
(3, '2019_08_19_000000_create_failed_jobs_table', 1),
(4, '2019_12_14_000001_create_personal_access_tokens_table', 1),
(5, '2022_07_12_021155_create_admins_table', 1),
(6, '2022_07_12_035123_create_categories_table', 2),
(7, '2022_07_13_114723_create_coupons_table', 3),
(8, '2022_07_14_070356_create_sizes_table', 4),
(9, '2022_07_14_095500_create_colors_table', 5),
(10, '2022_07_14_131243_create_products_table', 6),
(11, '2022_07_19_090010_product_attr', 7),
(12, '2022_07_25_044535_create_brands_table', 8),
(13, '2022_07_28_093700_add_extra_product_field_to_products', 9),
(14, '2022_07_28_112528_add_extra_fields_to_coupons', 10),
(15, '2022_07_28_122023_add_extra_fields_to_categories', 11),
(16, '2022_07_29_054844_create_coustomers_table', 12),
(17, '2022_09_21_044000_create_blog_posts_table', 13);

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
  `id` bigint UNSIGNED NOT NULL,
  `tokenable_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tokenable_id` bigint UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(64) COLLATE utf8mb4_unicode_ci NOT NULL,
  `abilities` text COLLATE utf8mb4_unicode_ci,
  `last_used_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `id` bigint UNSIGNED NOT NULL,
  `category_id` int NOT NULL,
  `product_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `product_slug` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `product_brand` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `short_desc` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `desc` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `keywords` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `technical_specification` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `uses` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `warrenty` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `image` varchar(250) COLLATE utf8mb4_unicode_ci NOT NULL,
  `lead_time` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'NULL',
  `tax` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'NULL',
  `tax_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'NULL',
  `is_promo` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'NULL',
  `is_featured` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'NULL',
  `is_discount` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'NULL',
  `is_tranding` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'NULL',
  `status` int NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`id`, `category_id`, `product_name`, `product_slug`, `product_brand`, `short_desc`, `desc`, `keywords`, `technical_specification`, `uses`, `warrenty`, `image`, `lead_time`, `tax`, `tax_type`, `is_promo`, `is_featured`, `is_discount`, `is_tranding`, `status`, `created_at`, `updated_at`) VALUES
(1, 1, 'Man\'s Shirt', 'man\'s shirt', 'good', 'A product description is the marketing copy that explains what a product is and why it\'s worth purchasing. The purpose of a product description is to supply customers with important information about the features and benefits of the product so they\'re compelled to buy.', 'A product description is the marketing copy that explains what a product is and why it\'s worth purchasing. The purpose of a product description is to supply customers with important information about the features and benefits of the product so they\'re compelled to buy.', 'A product description is the marketing copy that explains what a product is and why it\'s worth purchasing. The purpose of a product description is to supply customers with important information about the features and benefits of the product so they\'re compelled to buy.', 'A product description is the marketing copy that explains what a product is and why it\'s worth purchasing. The purpose of a product description is to supply customers with important information about the features and benefits of the product so they\'re compelled to buy.', 'A product description is the marketing copy that explains what a product is and why it\'s worth purchasing. The purpose of a product description is to supply customers with important information about the features and benefits of the product so they\'re compelled to buy.', 'A product description is the marketing copy that explains what a product is and why it\'s worth purchasing. The purpose of a product description is to supply customers with important information about the features and benefits of the product so they\'re compelled to buy.', '1658135171.jpg', 'NULL', 'NULL', 'NULL', 'NULL', 'NULL', 'NULL', 'NULL', 1, '2022-07-15 02:35:25', '2022-07-18 03:36:11'),
(2, 2, 'w-shirt', 'w-shirt', 'Cashback on Flipkart Axis Bank CardT&C  +1 more offer, w-shirt', 'Special PriceGet extra 5% offT&C  Bank Offer10% off on SBI Credit Card, up to ₹750. On orders of ₹1500 and aboveT&C  Bank Offer10% off on SBI Credit Card EMI Transactions, up to ₹1500. On orders of ₹1500 and aboveT&C  Bank Offer5% Cashback on Flipkart Axis Bank CardT&C  +1 more offer, w-shirt', 'Special PriceGet extra 5% offT&C  Bank Offer10% off on SBI Credit Card, up to ₹750. On orders of ₹1500 and aboveT&C  Bank Offer10% off on SBI Credit Card EMI Transactions, up to ₹1500. On orders of ₹1500 and aboveT&C  Bank Offer5% Cashback on Flipkart Axis Bank CardT&C  +1 more offer, w-shirt', 'Special PriceGet extra 5% offT&C  Bank Offer10% off on SBI Credit Card, up to ₹750. On orders of ₹1500 and aboveT&C  Bank Offer10% off on SBI Credit Card EMI Transactions, up to ₹1500. On orders of ₹1500 and aboveT&C  Bank Offer5% Cashback on Flipkart Axis Bank CardT&C  +1 more offer, w-shirt', 'Special PriceGet extra 5% offT&C  Bank Offer10% off on SBI Credit Card, up to ₹750. On orders of ₹1500 and aboveT&C  Bank Offer10% off on SBI Credit Card EMI Transactions, up to ₹1500. On orders of ₹1500 and aboveT&C  Bank Offer5% Cashback on Flipkart Axis Bank CardT&C  +1 more offer,w-shirt', 'Special PriceGet extra 5% offT&C  Bank Offer10% off on SBI Credit Card, up to ₹750. On orders of ₹1500 and aboveT&C  Bank Offer10% off on SBI Credit Card EMI Transactions, up to ₹1500. On orders of ₹1500 and aboveT&C  Bank Offer5% Cashback on Flipkart Axis Bank CardT&C  +1 more offer, w-shirt', 'Special PriceGet extra 5% offT&C  Bank Offer10% off on SBI Credit Card, up to ₹750. On orders of ₹1500 and aboveT&C  Bank Offer10% off on SBI Credit Card EMI Transactions, up to ₹1500. On orders of ₹1500 and aboveT&C  Bank Offer5% Cashback on Flipkart Axis Bank CardT&C  +1 more offer, w-shirt', '1658135189.jpg', 'NULL', 'NULL', 'NULL', 'NULL', 'NULL', 'NULL', 'NULL', 1, '2022-07-18 00:17:21', '2022-07-18 04:42:47'),
(3, 1, 'Campus Sutra Charcoal Stripes T-Shirt', 'campus sutra', 'Artfully crafted in premium cotton shirt', 'An ultimate choice that will redefine your classiness is this charcoal t-shirt from the latest collection of Campus Sutra. Artfully crafted in premium cotton material for a deluxe look and feel, it is designed with a regular fit, that accentuates your body in a young and elegant way. Style it with a pair of contrast denim and shoes to achieve that spectacular look.\r\n\r\nExplore the entire range of T-Shirts available on Nykaa. Shop more Campus Sutra products here.You can browse through the complete world of Campus Sutra T-Shirts .\r\nAlternatively, you can also find many more products from the Campus Sutra Charcoal Stripes T-Shirt range.', 'An ultimate choice that will redefine your classiness is this charcoal t-shirt from the latest collection of Campus Sutra. Artfully crafted in premium cotton material for a deluxe look and feel, it is designed with a regular fit, that accentuates your body in a young and elegant way. Style it with a pair of contrast denim and shoes to achieve that spectacular look.\r\nExplore the entire range of T-Shirts available on Nykaa. Shop more Campus Sutra products here.You can browse through the complete world of Campus Sutra T-Shirts .\r\nAlternatively, you can also find many more products from the Campus Sutra Charcoal Stripes T-Shirt range.', 'An ultimate choice that will redefine your classiness is this charcoal t-shirt from the latest collection of Campus Sutra. Artfully crafted in premium cotton material for a deluxe look and feel, it is designed with a regular fit, that accentuates your body in a young and elegant way. Style it with a pair of contrast denim and shoes to achieve that spectacular look.\r\n\r\nExplore the entire range of T-Shirts available on Nykaa. Shop more Campus Sutra products here.You can browse through the complete world of Campus Sutra T-Shirts .\r\nAlternatively, you can also find many more products from the Campus Sutra Charcoal Stripes T-Shirt range', 'An ultimate choice that will redefine your classiness is this charcoal t-shirt from the latest collection of Campus Sutra. Artfully crafted in premium cotton material for a deluxe look and feel, it is designed with a regular fit, that accentuates your body in a young and elegant way. Style it with a pair of contrast denim and shoes to achieve that spectacular look.\r\nExplore the entire range of T-Shirts available on Nykaa. Shop more Campus Sutra products here.You can browse through the complete world of Campus Sutra T-Shirts .\r\nAlternatively, you can also find many more products from the Campus Sutra Charcoal Stripes T-Shirt range.', 'An ultimate choice that will redefine your classiness is this charcoal t-shirt from the latest collection of Campus Sutra. Artfully crafted in premium cotton material for a deluxe look and feel, it is designed with a regular fit, that accentuates your body in a young and elegant way. Style it with a pair of contrast denim and shoes to achieve that spectacular look.\r\nExplore the entire range of T-Shirts available on Nykaa. Shop more Campus Sutra products here.You can browse through the complete world of Campus Sutra T-Shirts .\r\nAlternatively, you can also find many more products from the Campus Sutra Charcoal Stripes T-Shirt range.', 'An ultimate choice that will redefine your classiness is this charcoal t-shirt from the latest collection of Campus Sutra. Artfully crafted in premium cotton material for a deluxe look and feel, it is designed with a regular fit, that accentuates your body in a young and elegant way. Style it with a pair of contrast denim and shoes to achieve that spectacular look.\r\nExplore the entire range of T-Shirts available on Nykaa. Shop more Campus Sutra products here.You can browse through the complete world of Campus Sutra T-Shirts .\r\nAlternatively, you can also find many more products from the Campus Sutra Charcoal Stripes T-Shirt range.', '1658135301.jpg', 'NULL', 'NULL', 'NULL', 'NULL', 'NULL', 'NULL', 'NULL', 1, '2022-07-18 03:38:21', '2022-07-18 06:20:35'),
(7, 1, 'Man\'s Shirt 2022', 'Man\'s Shirt 2022', '1', '<p>Our easy fit 100% organic cotton button-front shirt with French cuffs and shirttail hem. Designed to be tucked in or worn loose .</p>', '<p>Our easy fit 100% organic cotton button-front shirt with French cuffs and shirttail hem. Designed to be tucked in or worn loose .</p>', 'Our easy fit 100% organic cotton button-front shirt with French cuffs and shirttail hem. Designed to be tucked in or worn loose .', '<p>Our easy fit 100% organic cotton button-front shirt with French cuffs and shirttail hem. Designed to be tucked in or worn loose .</p>', '<p>Our easy fit 100% organic cotton button-front shirt with French cuffs and shirttail hem. Designed to be tucked in or worn loose .</p>', '<p>Our easy fit 100% organic cotton button-front shirt with French cuffs and shirttail hem. Designed to be tucked in or worn loose .</p>', '1664427648.jpg', '2-3 days', '18%', 'GST 18%', '1', '1', '1', '1', 1, '2022-09-28 23:30:48', '2022-09-28 23:30:48'),
(8, 1, 'Man\'s Shirt black', 'Man\'s Shirt black', '1', '<p>Our easy fit 100% organic cotton button-front shirt with French cuffs and shirttail hem. Designed to be tucked in or worn loose .</p>', '<p>Our easy fit 100% organic cotton button-front shirt with French cuffs and shirttail hem. Designed to be tucked in or worn loose .</p>', 'Our easy fit 100% organic cotton button-front shirt with French cuffs and shirttail hem. Designed to be tucked in or worn loose .', '<p>Our easy fit 100% organic cotton button-front shirt with French cuffs and shirttail hem. Designed to be tucked in or worn loose .</p>', '<p>Our easy fit 100% organic cotton button-front shirt with French cuffs and shirttail hem. Designed to be tucked in or worn loose .</p>', '<p>Our easy fit 100% organic cotton button-front shirt with French cuffs and shirttail hem. Designed to be tucked in or worn loose .</p>', '1664427745.jpg', '2-3 days', '18%', 'GST 18%', '1', '1', '1', '1', 1, '2022-09-28 23:32:25', '2022-09-28 23:32:25');

-- --------------------------------------------------------

--
-- Table structure for table `product_attr`
--

CREATE TABLE `product_attr` (
  `id` bigint UNSIGNED NOT NULL,
  `product_id` int NOT NULL,
  `size_id` int NOT NULL,
  `color_id` int NOT NULL,
  `sku` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `mrp` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `price` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `qty` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `attr_image` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `product_attr`
--

INSERT INTO `product_attr` (`id`, `product_id`, `size_id`, `color_id`, `sku`, `mrp`, `price`, `qty`, `attr_image`, `created_at`, `updated_at`) VALUES
(1, 4, 2, 2, '1', '1', '2', '1', '1 test', NULL, NULL),
(2, 4, 2, 2, '2', '2', '2', '2', '1 test', NULL, NULL),
(3, 4, 4, 3, '3', '3', '3', '3', '1 test', NULL, NULL),
(4, 3, 2, 2, '455', '555', '23', 'pr1', '1 test', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `sizes`
--

CREATE TABLE `sizes` (
  `id` bigint UNSIGNED NOT NULL,
  `size` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` int NOT NULL DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `sizes`
--

INSERT INTO `sizes` (`id`, `size`, `status`, `created_at`, `updated_at`) VALUES
(2, 'xl', 1, '2022-07-14 02:22:57', '2022-07-14 03:55:40'),
(3, 'xxl', 1, '2022-07-14 02:23:02', '2022-07-14 03:55:46'),
(4, 'm', 1, '2022-07-14 02:23:10', '2022-07-14 04:48:08');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admins`
--
ALTER TABLE `admins`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `admins_email_unique` (`email`);

--
-- Indexes for table `blog_posts`
--
ALTER TABLE `blog_posts`
  ADD PRIMARY KEY (`post_id`);

--
-- Indexes for table `brands`
--
ALTER TABLE `brands`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `categories_category_slug_unique` (`category_slug`);

--
-- Indexes for table `colors`
--
ALTER TABLE `colors`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `coupons`
--
ALTER TABLE `coupons`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `coustomers`
--
ALTER TABLE `coustomers`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
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
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `product_attr`
--
ALTER TABLE `product_attr`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `sizes`
--
ALTER TABLE `sizes`
  ADD PRIMARY KEY (`id`);

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
-- AUTO_INCREMENT for table `admins`
--
ALTER TABLE `admins`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `blog_posts`
--
ALTER TABLE `blog_posts`
  MODIFY `post_id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `brands`
--
ALTER TABLE `brands`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `colors`
--
ALTER TABLE `colors`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `coupons`
--
ALTER TABLE `coupons`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `coustomers`
--
ALTER TABLE `coustomers`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `product_attr`
--
ALTER TABLE `product_attr`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `sizes`
--
ALTER TABLE `sizes`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

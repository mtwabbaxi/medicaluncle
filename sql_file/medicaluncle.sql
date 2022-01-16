-- phpMyAdmin SQL Dump
-- version 4.8.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 20, 2021 at 07:25 AM
-- Server version: 10.1.33-MariaDB
-- PHP Version: 7.2.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `medicaluncle`
--

-- --------------------------------------------------------

--
-- Table structure for table `bids`
--

CREATE TABLE `bids` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `request_id` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `seller_id` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `rfq_no` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `comment` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `delivery` date DEFAULT NULL,
  `status` int(11) DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `bids`
--

INSERT INTO `bids` (`id`, `request_id`, `seller_id`, `rfq_no`, `comment`, `delivery`, `status`, `created_at`, `updated_at`) VALUES
(1, '2', '6', 'BUYER-QNO-D866F', NULL, '2021-12-02', 1, '2021-12-01 04:19:46', '2021-12-01 07:03:21'),
(2, '3', '6', 'BUYER-QNO-26F5B', NULL, '2021-12-10', 1, '2021-12-01 12:08:27', '2021-12-01 13:10:19'),
(3, '4', '6', 'AL SHIFA HOSPITAL-QNO-7F3C2', NULL, '2021-12-17', 1, '2021-12-10 01:02:59', '2021-12-10 01:04:18'),
(4, '5', '6', 'AL SHIFA HOSPITAL-QNO-68E41', NULL, '2021-12-17', 1, '2021-12-10 01:41:10', '2021-12-10 01:44:41'),
(5, '6', '6', 'B-QNO-DD1A6', NULL, NULL, 0, '2021-12-15 13:13:11', '2021-12-15 13:13:11');

-- --------------------------------------------------------

--
-- Table structure for table `bid_products`
--

CREATE TABLE `bid_products` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `bid_id` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `product_id` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `product_price` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `bid_products`
--

INSERT INTO `bid_products` (`id`, `bid_id`, `product_id`, `product_price`, `created_at`, `updated_at`) VALUES
(5, '1', '9', '15000', '2021-12-01 04:36:14', '2021-12-01 04:36:14'),
(6, '1', '10', '20000', '2021-12-01 06:28:25', '2021-12-01 06:28:25'),
(7, '2', '10', '10000', '2021-12-01 12:08:37', '2021-12-01 12:08:37'),
(8, '3', '10', '15000', '2021-12-10 01:03:30', '2021-12-10 01:03:30'),
(9, '4', '10', '15000', '2021-12-10 01:44:07', '2021-12-10 01:44:07');

-- --------------------------------------------------------

--
-- Table structure for table `blogs`
--

CREATE TABLE `blogs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `title` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `excerpt` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `description` text COLLATE utf8mb4_unicode_ci,
  `image` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `blogs`
--

INSERT INTO `blogs` (`id`, `title`, `excerpt`, `description`, `image`, `created_at`, `updated_at`) VALUES
(1, 'Our 8 Favorite Books in 2021 for Healthy Living', 'This year’s Well Book List includes advice on how to change behavior, lower anxiety, cope with hardship and heal with poetry.', 'This year’s Well Book List includes advice on how to change behavior, lower anxiety, cope with hardship and heal with poetry.', '8a80e5239_02well-nl-videoLarge.jpg', '2021-12-05 09:09:51', '2021-12-05 09:09:51');

-- --------------------------------------------------------

--
-- Table structure for table `buyer_rfqs`
--

CREATE TABLE `buyer_rfqs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `rfq_no` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `city` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `delievery` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `message` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `buyer_id` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `expire` int(11) DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `buyer_rfqs`
--

INSERT INTO `buyer_rfqs` (`id`, `rfq_no`, `city`, `delievery`, `message`, `buyer_id`, `expire`, `created_at`, `updated_at`) VALUES
(2, 'BUYER-QNO-D866F', 'Islamabad/Rawalpindi', '1 Week', 'I need three vantilators', '3', 1, '2021-12-01 02:57:32', '2021-12-02 12:49:35'),
(3, 'BUYER-QNO-26F5B', 'Islamabad/Rawalpindi', '1 Week', 'I want three vantilators', '3', 0, '2021-12-01 12:03:35', '2021-12-02 12:51:30'),
(4, 'AL SHIFA HOSPITAL-QNO-7F3C2', 'Islamabad/Rawalpindi', '1 Week', 'ventilators required', '3', 0, '2021-12-10 00:58:01', '2021-12-10 00:58:01'),
(5, 'AL SHIFA HOSPITAL-QNO-68E41', 'Islamabad/Rawalpindi', '1 Week', 'ventilators required in islamabad', '3', 0, '2021-12-10 01:39:49', '2021-12-16 10:55:00'),
(6, 'B-QNO-DD1A6', 'Islamabad/Rawalpindi', '0', '0', '14', 1, '2021-12-15 06:36:53', '2021-12-15 06:36:53');

-- --------------------------------------------------------

--
-- Table structure for table `carts`
--

CREATE TABLE `carts` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `carts`
--

INSERT INTO `carts` (`id`, `user_id`, `created_at`, `updated_at`) VALUES
(1, '3', '2021-09-29 02:59:08', '2021-09-29 02:59:08'),
(2, '5', '2021-10-01 07:11:07', '2021-10-01 07:11:07'),
(3, '11', '2021-12-10 02:28:32', '2021-12-10 02:28:32'),
(4, '14', '2021-12-15 06:35:16', '2021-12-15 06:35:16');

-- --------------------------------------------------------

--
-- Table structure for table `cart__products`
--

CREATE TABLE `cart__products` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `cart_id` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `product_id` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `product_price` varchar(200) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `size` varchar(21) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `quantity` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `totalPrice` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `seller_id` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `catalogs`
--

CREATE TABLE `catalogs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `category_id` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `excerpt` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `image` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `pdf` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `catalogs`
--

INSERT INTO `catalogs` (`id`, `user_id`, `name`, `category_id`, `excerpt`, `image`, `pdf`, `created_at`, `updated_at`) VALUES
(3, '1', 'A Quantum Leap in Imaging Performance', '3', 'Comprehensive and Flexible \r\nHigh Resolution Imaging for Your Clinical\r\nAdvanced Imaging Technologies', '415b6343f_pdf3.jpg', '415b6343f_qunatum leap.pdf', '2021-08-27 21:32:37', '2021-08-27 21:32:37');

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_id` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`id`, `name`, `user_id`, `created_at`, `updated_at`) VALUES
(2, 'Physiotherapy', '1', '2021-05-24 05:22:50', '2021-05-24 05:22:50'),
(3, 'Electromedical', '1', '2021-05-24 05:35:59', '2021-05-24 05:35:59'),
(4, 'Emergency & Clinics Apparatuses', '4', '2021-10-01 07:18:52', '2021-10-01 07:18:52'),
(5, 'Home Use', '4', '2021-10-03 08:42:34', '2021-10-03 08:42:34'),
(7, 'Covid 19 Supplies', '2', '2021-10-04 05:19:35', '2021-10-04 05:19:35'),
(8, 'B2B Products', '2', '2021-12-05 06:57:51', '2021-12-05 06:57:51'),
(9, 'House', '2', '2021-12-15 06:43:00', '2021-12-15 06:43:00');

-- --------------------------------------------------------

--
-- Table structure for table `contacts`
--

CREATE TABLE `contacts` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `message` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `contacts`
--

INSERT INTO `contacts` (`id`, `name`, `email`, `message`, `created_at`, `updated_at`) VALUES
(1, 'Muhammad Talha Waseem', 'muhammadtalhawaseem@gmail.com', 'rwar', '2021-10-07 23:02:16', '2021-10-07 23:02:16'),
(2, 'Muhammad Talha Waseem', 'muhammadtalhawaseem@gmail.com', 'test', '2021-10-07 23:04:16', '2021-10-07 23:04:16'),
(3, 'test', 'test', 'test', '2021-10-07 23:04:37', '2021-10-07 23:04:37'),
(4, 'test', 'muhammadtalhawaseem@gmail.com', 'test', '2021-10-07 23:04:44', '2021-10-07 23:04:44'),
(5, 'test', 'muhammadtalhawaseem@gmail.com', 'test', '2021-10-07 23:05:21', '2021-10-07 23:05:21'),
(6, 'Muhammad Talha Waseem', 'muhammadtalhawaseem@gmail.com', 'tets', '2021-10-07 23:05:46', '2021-10-07 23:05:46'),
(7, 'Muhammad Talha Waseem', 'muhammadtalhawaseem@gmail.com', 'test', '2021-10-07 23:06:29', '2021-10-07 23:06:29'),
(8, 'Muhammad Talha Waseem', 'muhammadtalhawaseem@gmail.com', 'test', '2021-10-07 23:06:48', '2021-10-07 23:06:48');

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_resets_table', 1),
(4, '2021_05_24_095917_create_categories_table', 2),
(5, '2021_05_25_044112_create_products_table', 3),
(6, '2021_05_25_060112_create_catalogs_table', 4),
(7, '2021_09_28_074347_create_carts_table', 5),
(8, '2021_09_28_074418_create_cart__products_table', 5),
(9, '2021_09_28_074648_create_orders_table', 5),
(10, '2021_09_28_074805_create_order__products_table', 5),
(11, '2021_10_08_035424_create_contacts_table', 6),
(12, '2021_12_01_070104_create_buyer_rfqs_table', 7),
(13, '2021_12_01_090718_create_bids_table', 8),
(14, '2021_12_01_070138_create_bid_products_table', 9),
(15, '2021_12_05_133007_create_blogs_table', 10),
(16, '2021_12_08_162849_create_reviews_table', 11),
(17, '2021_12_14_102706_create_notifications_table', 12);

-- --------------------------------------------------------

--
-- Table structure for table `notifications`
--

CREATE TABLE `notifications` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `title` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `image` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `description` text COLLATE utf8mb4_unicode_ci,
  `seller_id` varchar(200) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `notifications`
--

INSERT INTO `notifications` (`id`, `title`, `image`, `description`, `seller_id`, `created_at`, `updated_at`) VALUES
(1, '12 12 Sale - 50% Off on Wheel Chair', '93e515b73_12-12-shopping-day-sale-banner-background_1198-895.jpg', 'To celebrate the year of achievements, We are offering customers discounts on its diverse product assortment and the chance to win prizes during the 12.12 Celebration. Due to the increased product assortment, the growing customer base will have access to a larger variety of items across more than 100 categories during the sale.\r\n\r\nOver the past year, Daraz has focused on bringing customers a personalized experience, making it easier for them to navigate through the growing assortment and easily access products that they are interested in.\r\n\r\nThe platform has curated an engaging user experience by introducing features such as in-app games giving customers the chance to win prizes and bonuses in their Daraz Wallet.\r\n\r\nDuring the sale, customers will have the chance to play games such as Running Daz and Fruit Ninja and win prizes from brand partners including Vivo, P&G, Nestle, Sunsilk, and L’Oreal. Mission 12.12 is another game that customers can play for a chance to win prizes such as a trip to Dubai. It involves completing a set of 12 easy, daily tasks.\r\n\r\nA significant focus has been placed on increasing payment options of customers in the last year. Daraz Wallet was launched to offer customers exclusive bonuses, faster check out, and instant refunds.', '6', '2021-12-14 05:54:36', '2021-12-14 05:54:36');

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `order_no` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `buyer_id` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `name` varchar(200) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email` varchar(200) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `phonenumber` varchar(200) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `payment_mode` varchar(200) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `shipping_address` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `seller_id` varchar(200) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` varchar(200) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`id`, `order_no`, `buyer_id`, `name`, `email`, `phonenumber`, `payment_mode`, `shipping_address`, `seller_id`, `status`, `created_at`, `updated_at`) VALUES
(1, '#00000001', '3', 'Muhammad Talha Waseem', 'muhammadtalhawaseem@gmail.com', '03485583125', 'cod', 'House # 650 Street # 06 Burji, ModelTown Humak, Islamabad, Pakistan', '1', 'Completed', '2021-09-29 02:59:18', '2021-09-29 05:42:12'),
(2, '#00000002', '3', 'Muhammad Talha Waseem', 'muhammadtalhawaseem@gmail.com', '03485583125', 'cod', 'House # 650 Street # 06 Burji, ModelTown Humak, Islamabad, Pakistan', '1', 'Completed', '2021-09-29 03:48:22', '2021-09-29 05:40:20'),
(3, '#00000003', '3', 'Muhammad Talha Waseem', 'muhammadtalhawaseem@gmail.com', '03485583125', 'cod', 'House # 650 Street # 06 Burji, ModelTown Humak, Islamabad, Pakistan', '1', 'Completed', '2021-09-29 07:30:01', '2021-09-29 07:30:40'),
(4, '#00000004', '3', 'Muhammad Talha Waseem', 'muhammadtalhawaseem@gmail.com', '03485583125', 'cod', 'House # 650 Street # 06 Burji, ModelTown Humak, Islamabad, Pakistan', '1', 'Completed', '2021-09-29 07:43:53', '2021-09-29 07:44:18'),
(5, '#00000005', '3', 'Muhammad Talha Waseem', 'muhammadtalhawaseem@gmail.com', '03485583125', 'cod', 'House # 650 Street # 06 Burji, ModelTown Humak, Islamabad, Pakistan', '1', 'Completed', '2021-09-30 00:46:29', '2021-09-30 00:47:03'),
(6, '#00000006', '3', 'Muhammad Talha Waseem', 'muhammadtalhawaseem@gmail.com', '03485583125', 'cod', 'House # 650 Street # 06 Burji, ModelTown Humak, Islamabad, Pakistan', '1', 'Completed', '2021-09-30 03:23:16', '2021-09-30 03:26:32'),
(7, '#00000007', '5', 'Khurram Zeeshan Nawaz', 'Zeeshan413@gmail.com', '03160250717', 'cod', 'house no c285 mohallah bachal shah', '4', 'Completed', '2021-10-01 09:07:07', '2021-10-03 08:33:22'),
(8, '#00000008', '3', 'Muhammad Talha Waseem', 'muhammadtalhawaseem@gmail.com', '03485583125', 'cod', 'House # 650 Street # 06 Burji, ModelTown Humak, Islamabad, Pakistan', '7', 'Completed', '2021-10-05 01:54:26', '2021-10-05 02:05:56'),
(9, '#00000008', '3', 'Muhammad Talha Waseem', 'muhammadtalhawaseem@gmail.com', '03485583125', 'cod', 'House # 650 Street # 06 Burji, ModelTown Humak, Islamabad, Pakistan', '6', 'Completed', '2021-10-05 01:54:26', '2021-10-05 02:18:35'),
(10, '#00000009', '3', 'Muhammad Talha Waseem', 'muhammadtalhawaseem@gmail.com', '03485583125', 'cod', 'House # 650 Street # 06 Burji, ModelTown Humak, Islamabad, Pakistan', '1', 'Completed', '2021-10-05 08:23:42', '2021-10-06 00:57:24'),
(11, '#00000011', '3', 'Muhammad Talha Waseem', 'muhammadtalhawaseem@gmail.com', '03485583125', 'cod', 'House # 650 Street # 06 Burji, ModelTown Humak, Islamabad, Pakistan', '1', 'Completed', '2021-10-06 02:18:25', '2021-10-06 02:19:15'),
(12, '#00000011', '3', 'Muhammad Talha Waseem', 'muhammadtalhawaseem@gmail.com', '03485583125', 'cod', 'House # 650 Street # 06 Burji, ModelTown Humak, Islamabad, Pakistan', '7', 'Completed', '2021-10-06 02:18:25', '2021-10-06 02:20:23'),
(13, '#00000012', '3', 'Muhammad Talha Waseem', 'muhammadtalhawaseem@gmail.com', '03485583125', 'cod', 'House # 650 Street # 06 Burji, ModelTown Humak, Islamabad, Pakistan', '1', 'Completed', '2021-10-06 04:10:59', '2021-10-06 13:07:47'),
(14, '#00000014', '3', 'Muhammad Talha Waseem', 'muhammadtalhawaseem@gmail.com', '03485583125', 'cod', 'House # 650 Street # 06 Burji, ModelTown Humak, Islamabad, Pakistan', '1', 'Completed', '2021-10-06 13:13:13', '2021-10-06 13:37:17'),
(15, '#00000014', '3', 'Muhammad Talha Waseem', 'muhammadtalhawaseem@gmail.com', '03485583125', 'cod', 'House # 650 Street # 06 Burji, ModelTown Humak, Islamabad, Pakistan', '7', 'Completed', '2021-10-06 13:13:13', '2021-10-06 13:38:18'),
(16, '#00000015', '3', 'Muhammad Talha Waseem', 'muhammadtalhawaseem@gmail.com', '03485583125', 'cod', 'House # 650 Street # 06 Burji, ModelTown Humak, Islamabad, Pakistan', '1', 'Completed', '2021-10-06 13:47:00', '2021-10-07 03:17:10'),
(17, '#00000017', '3', 'Muhammad Talha Waseem', 'muhammadtalhawaseem@gmail.com', '03485583125', 'cod', 'House # 650 Street # 06 Burji, ModelTown Humak, Islamabad, Pakistan', '1', 'Completed', '2021-10-08 03:14:02', '2021-10-08 03:16:31'),
(18, '#00000018', '3', 'Muhammad Talha Waseem', 'muhammadtalhawaseem@gmail.com', '03485583125', 'cod', 'House # 650 Street # 06 Burji, ModelTown Humak, Islamabad, Pakistan', '1', 'OrderPlaced', '2021-10-08 06:51:06', '2021-10-08 06:51:06'),
(19, '#00000019', '3', 'Muhammad Talha Waseem', 'muhammadtalhawaseem@gmail.com', '03485583125', 'cod', 'House # 650 Street # 06 Burji, ModelTown Humak, Islamabad, Pakistan', '2', 'Completed', '2021-11-29 00:46:55', '2021-11-29 06:18:01'),
(20, '#00000020', '3', 'Muhammad Talha Waseem', 'muhammadtalhawaseem@gmail.com', '03485583125', 'cod', 'House # 650 Street # 06 Burji, ModelTown Humak, Islamabad, Pakistan', '6', 'Completed', '2021-12-01 12:03:12', '2021-12-05 08:19:58'),
(21, '#00000021', '3', 'Muhammad Talha Waseem', 'muhammadtalhawaseem@gmail.com', '03485583125', 'cod', 'House # 650 Street # 06 Burji, ModelTown Humak, Islamabad, Pakistan', '6', 'OrderPlaced', '2021-12-01 13:15:16', '2021-12-01 13:15:16'),
(22, '#00000022', '3', 'Muhammad Talha Waseem', 'muhammadtalhawaseem@gmail.com', '03485583125', 'cod', 'House # 650 Street # 06 Burji, ModelTown Humak, Islamabad, Pakistan', '1', 'OrderPlaced', '2021-12-05 08:21:28', '2021-12-05 08:21:28'),
(23, '#00000022', '3', 'Muhammad Talha Waseem', 'muhammadtalhawaseem@gmail.com', '03485583125', 'cod', 'House # 650 Street # 06 Burji, ModelTown Humak, Islamabad, Pakistan', '7', 'OrderPlaced', '2021-12-05 08:21:28', '2021-12-05 08:21:28'),
(24, '#00000023', '3', 'Muhammad Talha Waseem', 'muhammadtalhawaseem@gmail.com', '03485583125', 'cod', 'House # 650 Street # 06 Burji, ModelTown Humak, Islamabad, Pakistan', '6', 'Completed', '2021-12-10 01:07:18', '2021-12-10 01:10:00'),
(25, '#00000025', '3', 'Muhammad Talha Waseem', 'muhammadtalhawaseem@gmail.com', '03485583125', 'cod', 'House # 650 Street # 06 Burji, ModelTown Humak, Islamabad, Pakistan', '6', 'Completed', '2021-12-10 01:47:13', '2021-12-10 01:49:14'),
(26, '#00000026', '3', 'Al Shifa Hospital', 'buyer@gmail.com', '03485583125', 'cod', 'a', '1', 'OrderPlaced', '2021-12-10 02:20:06', '2021-12-10 02:20:06'),
(27, '#00000027', '3', 'Al Shifa Hospital', 'buyer@gmail.com', '03485583125', 'cod', 'a', '1', 'OrderPlaced', '2021-12-10 02:21:49', '2021-12-10 02:21:49'),
(28, '#00000027', '3', 'Al Shifa Hospital', 'buyer@gmail.com', '03485583125', 'cod', 'a', '4', 'OrderPlaced', '2021-12-10 02:21:49', '2021-12-10 02:21:49'),
(29, '#00000028', '11', 'faheem', 'faheem1@gmailcom', '033333333333', 'cod', 'a', '1', 'OrderPlaced', '2021-12-10 02:28:44', '2021-12-10 02:28:44'),
(30, '#00000030', '3', 'Muhammad Talha Waseem', 'muhammadtalhawaseem@gmail.com', '03485583125', 'cod', 'House # 650 Street # 06 Burji, ModelTown Humak, Islamabad, Pakistan', '1', 'Completed', '2021-12-15 05:59:01', '2021-12-16 10:50:40'),
(31, '#00000031', '14', 'b', 'b@b.com', '11111111111', 'cod', 'aaaaaa', '1', 'OrderPlaced', '2021-12-15 06:41:56', '2021-12-15 06:41:56'),
(32, '#00000032', '3', 'Muhammad Talha Waseem', 'muhammadtalhawaseem@gmail.com', '03485583125', 'cod', 'House # 650 Street # 06 Burji, ModelTown Humak, Islamabad, Pakistan', '6', 'Completed', '2021-12-16 06:55:32', '2021-12-16 07:21:33'),
(33, '#00000033', '3', 'Muhammad Talha Waseem', 'muhammadtalhawaseem@gmail.com', '03485583125', 'cod', 'House # 650 Street # 06 Burji, ModelTown Humak, Islamabad, Pakistan', '6', 'Completed', '2021-12-16 07:31:16', '2021-12-16 07:32:11'),
(34, '#00000034', '3', 'Muhammad Talha Waseem', 'muhammadtalhawaseem@gmail.com', '03485583125', 'cod', 'House # 650 Street # 06 Burji, ModelTown Humak, Islamabad, Pakistan', '1', 'Completed', '2021-12-16 10:22:54', '2021-12-16 10:24:47'),
(35, '#00000035', '3', 'Muhammad Talha Waseem', 'muhammadtalhawaseem@gmail.com', '03485583125', 'cod', 'House # 650 Street # 06 Burji, ModelTown Humak, Islamabad, Pakistan', '1', 'Completed', '2021-12-16 10:25:40', '2021-12-16 10:29:35');

-- --------------------------------------------------------

--
-- Table structure for table `order__products`
--

CREATE TABLE `order__products` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `order_no` varchar(200) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `product_id` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `product_price` varchar(200) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `size` varchar(21) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `quantity` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `totalPrice` varchar(200) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `seller_id` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `vendor_status` varchar(200) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` varchar(200) COLLATE utf8mb4_unicode_ci DEFAULT 'Pending',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `order__products`
--

INSERT INTO `order__products` (`id`, `order_no`, `product_id`, `product_price`, `size`, `quantity`, `totalPrice`, `seller_id`, `vendor_status`, `status`, `created_at`, `updated_at`) VALUES
(1, '#00000001', '3', '50', NULL, '1', '50', '1', NULL, 'Delivered', '2021-09-29 02:59:18', '2021-09-29 05:42:12'),
(2, '#00000002', '3', '50', NULL, '1', '50', '1', NULL, 'Delivered', '2021-09-29 03:48:22', '2021-09-29 05:40:20'),
(3, '#00000003', '3', '50', NULL, '2', '100', '1', NULL, 'Delivered', '2021-09-29 07:30:01', '2021-09-29 07:30:40'),
(4, '#00000004', '3', '50', NULL, '1', '50', '1', NULL, 'Delivered', '2021-09-29 07:43:53', '2021-09-29 07:44:18'),
(5, '#00000005', '3', '50', NULL, '2', '100', '1', NULL, 'Delivered', '2021-09-30 00:46:29', '2021-09-30 00:47:03'),
(6, '#00000006', '3', '50', NULL, '10', '500', '1', NULL, 'Delivered', '2021-09-30 03:23:16', '2021-09-30 03:26:32'),
(7, '#00000007', '5', '450', NULL, '1', '450', '4', NULL, 'Delivered', '2021-10-01 09:07:07', '2021-10-03 08:33:22'),
(8, '#00000008', '14', '1500', NULL, '1', '1500', '7', NULL, 'Delivered', '2021-10-05 01:54:26', '2021-10-05 02:05:23'),
(9, '#00000008', '13', '10000', NULL, '1', '10000', '7', NULL, 'Delivered', '2021-10-05 01:54:26', '2021-10-05 02:05:56'),
(10, '#00000008', '9', '15000', NULL, '1', '15000', '6', NULL, 'Delivered', '2021-10-05 01:54:26', '2021-10-05 02:18:35'),
(11, '#00000009', '21', '25', NULL, '1', '25', '1', NULL, 'Delivered', '2021-10-05 08:23:42', '2021-10-06 00:57:24'),
(12, '#00000011', '23', '165', NULL, '1', '165', '1', NULL, 'Delivered', '2021-10-06 02:18:25', '2021-10-06 02:19:15'),
(13, '#00000011', '14', '1500', NULL, '1', '1500', '7', NULL, 'Delivered', '2021-10-06 02:18:25', '2021-10-06 02:20:23'),
(14, '#00000012', '23', '165', NULL, '1', '165', '1', 'Sent', 'Delivered', '2021-10-06 04:10:59', '2021-10-06 13:07:47'),
(15, '#00000014', '23', '165', NULL, '2', '330', '1', 'Sent', 'Delivered', '2021-10-06 13:13:13', '2021-10-06 13:37:08'),
(16, '#00000014', '21', '25', NULL, '1', '25', '1', 'Sent', 'Delivered', '2021-10-06 13:13:13', '2021-10-06 13:37:12'),
(17, '#00000014', '20', '150', NULL, '1', '150', '1', 'Sent', 'Delivered', '2021-10-06 13:13:13', '2021-10-06 13:37:17'),
(18, '#00000014', '13', '10000', NULL, '1', '10000', '7', 'Sent', 'Delivered', '2021-10-06 13:13:13', '2021-10-06 13:38:18'),
(19, '#00000015', '23', '165', NULL, '10', '1650', '1', 'Sent', 'Delivered', '2021-10-06 13:47:00', '2021-10-07 03:17:10'),
(20, '#00000017', '23', '165', NULL, '1', '165', '1', 'Sent', 'Delivered', '2021-10-08 03:14:02', '2021-10-08 03:16:31'),
(21, '#00000018', '24', '125', NULL, '1', '125', '1', 'Sent', 'Pending', '2021-10-08 06:51:06', '2021-10-08 06:52:46'),
(22, '#00000019', '22', '230', NULL, '1', '230', '2', NULL, 'Delivered', '2021-11-29 00:46:55', '2021-11-29 06:18:01'),
(23, '#00000020', '9', '15000', NULL, '1', '15000', '6', 'Sent', 'Delivered', '2021-12-01 12:03:12', '2021-12-05 08:19:58'),
(24, '#00000021', '10', '10000', NULL, '1', '10000', '6', 'Sent', 'Pending', '2021-12-01 13:15:16', '2021-12-15 06:44:33'),
(25, '#00000022', '24', '125', NULL, '1', '125', '1', NULL, 'Pending', '2021-12-05 08:21:28', '2021-12-05 08:21:28'),
(26, '#00000022', '19', '250', NULL, '1', '250', '1', NULL, 'Pending', '2021-12-05 08:21:28', '2021-12-05 08:21:28'),
(27, '#00000022', '14', '1500', NULL, '1', '1500', '7', NULL, 'Pending', '2021-12-05 08:21:28', '2021-12-05 08:21:28'),
(28, '#00000022', '15', '10000', NULL, '1', '10000', '7', NULL, 'Pending', '2021-12-05 08:21:28', '2021-12-05 08:21:28'),
(29, '#00000023', '10', '15000', NULL, '1', '15000', '6', 'Sent', 'Delivered', '2021-12-10 01:07:18', '2021-12-10 01:10:00'),
(30, '#00000025', '10', '15000', NULL, '1', '15000', '6', 'Sent', 'Delivered', '2021-12-10 01:47:13', '2021-12-10 01:49:14'),
(31, '#00000026', '24', '125', NULL, '13', '1625', '1', NULL, 'Pending', '2021-12-10 02:20:06', '2021-12-10 02:20:06'),
(32, '#00000026', '19', '250', NULL, '1', '250', '1', NULL, 'Pending', '2021-12-10 02:20:06', '2021-12-10 02:20:06'),
(33, '#00000027', '24', '125', NULL, '1', '125', '1', NULL, 'Pending', '2021-12-10 02:21:49', '2021-12-10 02:21:49'),
(34, '#00000027', '4', '30000', NULL, '1', '30000', '4', NULL, 'Pending', '2021-12-10 02:21:49', '2021-12-10 02:21:49'),
(35, '#00000028', '24', '125', NULL, '1', '125', '1', NULL, 'Pending', '2021-12-10 02:28:44', '2021-12-10 02:28:44'),
(36, '#00000030', '24', '125', NULL, '1', '125', '1', 'Sent', 'Delivered', '2021-12-15 05:59:01', '2021-12-16 10:50:40'),
(37, '#00000031', '24', '125', NULL, '2000000000000000000000000000000000000000000000000000000000000000000000000000000000000000', '2.5e89', '1', NULL, 'Pending', '2021-12-15 06:41:56', '2021-12-15 06:41:56'),
(38, '#00000031', '3', '50', NULL, '5000000000000000000000000000000000000000000000000000000000000000000', '2.5e68', '1', NULL, 'Pending', '2021-12-15 06:41:56', '2021-12-15 06:41:56'),
(39, '#00000032', '25', '1000000', NULL, '1', '1000000', '6', 'Sent', 'Delivered', '2021-12-16 06:55:32', '2021-12-16 07:21:33'),
(40, '#00000033', '25', '1000000', NULL, '1', '1000000', '6', 'Sent', 'Delivered', '2021-12-16 07:31:16', '2021-12-16 07:32:11'),
(41, '#00000034', '24', '125', NULL, '12', '1500', '1', 'Sent', 'Delivered', '2021-12-16 10:22:54', '2021-12-16 10:24:47'),
(42, '#00000035', '24', '125', NULL, '3', '375', '1', NULL, 'Delivered', '2021-12-16 10:25:40', '2021-12-16 10:29:35');

-- --------------------------------------------------------

--
-- Table structure for table `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `password_resets`
--

INSERT INTO `password_resets` (`email`, `token`, `created_at`) VALUES
('Zeeshana413@gmail.com', '$2y$10$QCfwK/TWbNzHzfq8ATepiuWQc/tFvkUmWMnPyZro4o0jX1XSG8XRm', '2021-10-01 06:50:04');

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `category_id` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `price` int(11) NOT NULL,
  `sku` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `stock` int(11) DEFAULT NULL,
  `image` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `image2` varchar(200) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `image3` varchar(200) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `image4` varchar(200) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `l` varchar(21) COLLATE utf8mb4_unicode_ci DEFAULT '0',
  `m` varchar(21) COLLATE utf8mb4_unicode_ci DEFAULT '0',
  `s` varchar(21) COLLATE utf8mb4_unicode_ci DEFAULT '0',
  `excerpt` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `description` varchar(6000) COLLATE utf8mb4_unicode_ci NOT NULL,
  `rating` varchar(11) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`id`, `user_id`, `name`, `category_id`, `price`, `sku`, `stock`, `image`, `image2`, `image3`, `image4`, `l`, `m`, `s`, `excerpt`, `description`, `rating`, `created_at`, `updated_at`) VALUES
(3, '1', 'Medical Tapes', '2', 50, '9856', 15, '6db00a50a_p3.png', NULL, NULL, NULL, '0', '0', '0', 'Medical tapes come in handy during all sorts of situations.', 'Medical tapes come in handy during all sorts of situations, and different types of medical tapes are best for different applications. When building a portable first aid kit, using a one-size-fits-all approach will help conserve valuable space and weight, but for a larger kit or home use, other tapes will be useful to address a wider range of needs. The medical tape that meets your needs is ultimately your decision, so I will lay out my top picks and the advantages/disadvantages to all of them.', NULL, '2021-08-27 21:30:36', '2021-08-27 21:30:36'),
(4, '4', 'Volumetric Infusion Pump', '4', 30000, 'IOEC75WE', 15, '440007035_H86eafc481459463d952d7bedc38acdc94_268x180_1_286x180.jpg', NULL, NULL, NULL, '0', '0', '0', 'The product is a volumetric infusion pump.', 'An infusion pump infuses fluids, medication or nutrients into a patient\'s circulatory system. It is generally used intravenously, although subcutaneous, arterial and epidural infusions are occasionally used.\r\n\r\nInfusion pumps can administer fluids in ways that would be impractically expensive or unreliable if performed manually by nursing staff. For example, they can administer as little as 0.1 mL per hour injections (too small for a drip), injections every minute, injections with repeated boluses requested by the patient, up to maximum number per hour (e.g. in patient-controlled analgesia), or fluids whose volumes vary by the time of day.\r\n\r\nBecause they can also produce quite high but controlled pressures, they can inject controlled amounts of fluids subcutaneously (beneath the skin), or epidurally (just within the surface of the central nervous system – a very popular local spinal anesthesia for childbirth).', NULL, '2021-10-01 07:26:10', '2021-10-01 08:06:14'),
(5, '4', 'Pulse Oximeter', '4', 450, 'PO19WE', 15, '11205b7fb_71b0lx-SadL._SL1500__286x180.jpg', NULL, NULL, NULL, '0', '0', '0', 'It is a Pulse Oximeter.', 'Pulse oximetry is a noninvasive method for monitoring a person\'s oxygen saturation. Peripheral oxygen saturation readings are typically within 2% accuracy of the more desirable reading of arterial oxygen saturation from arterial blood gas analysis.', NULL, '2021-10-01 08:18:29', '2021-10-01 08:28:33'),
(6, '4', 'Oxygen Mask', '4', 200, 'OM01GN', 15, '46cdf4b5b_unnamed_286x180.jpg', NULL, NULL, NULL, '0', '0', '0', 'Oxygen Mask For Patients.', 'An oxygen mask provides a method to transfer breathing oxygen gas from a storage tank to the lungs. Oxygen masks may cover only the nose and mouth (oral nasal mask) or the entire face (full-face mask). They may be made of plastic, silicone, or rubber.', NULL, '2021-10-03 08:32:59', '2021-10-03 08:32:59'),
(7, '4', 'Stainless Steel Stethoscope', '4', 8500, '11820009', 15, '9f6495ec1_littmann-stethoscope-6152-b-400x400_286x180.jpg', NULL, NULL, NULL, '0', '0', '0', 'The Stethoscope is designed for clinicians.', 'The Stethoscope is designed for clinicians who require outstanding acoustic performance combined with exceptional versatility. Its innovative design provides a single-piece tunable diaphragm on each side of the chestpiece.', NULL, '2021-10-03 08:41:16', '2021-10-03 08:41:16'),
(8, '4', 'Nebulizer', '5', 10000, 'NR01WB', 15, 'd7ef80aa7_nebulizer286x180.jpg', NULL, NULL, NULL, '0', '0', '0', 'Nebulizer for people with breathing Issues', 'A nebulizer turns liquid medicine into a mist to help treat your asthma. They come in electric or battery-run versions. They come in both a portable size you can carry with you and a larger size that\'s meant to sit on a table and plug into a wall.', NULL, '2021-10-03 08:46:15', '2021-10-03 08:46:15'),
(9, '6', 'WheelChair', '4', 15000, 'WC01BG', 15, '23c72437f_38372Wheelchair-Imported-809B_286x180.png', NULL, NULL, NULL, '0', '0', '0', 'Wheel Chair for people with disability', 'The wheelchair is one of the most commonly used assistive devices to promote mobility and enhance quality of life for people who have difficulties in walking (e.g. a person with spinal cord injuries resulting in quadriplegia or paraplegia, muscular dystrophy,etc).', NULL, '2021-10-03 08:54:14', '2021-10-03 08:54:14'),
(10, '6', 'Gurney', '4', 20000, 'GY01BW', 15, 'bd28cefc1_download_1_286x180.jpg', NULL, NULL, NULL, '0', '0', '0', 'Gurney for patients', 'A gurney is a device used to move a patient who can\'t easily walk and needs to lie flat. Unlike a stretcher, a gurney has wheels so that it doesn\'t need to be carried.', NULL, '2021-10-03 09:29:16', '2021-10-03 09:33:07'),
(11, '6', 'Stretcher', '4', 20000, 'SR01OG', 15, 'd77b5f613_2-Fold-Stretcher-1200x720_286x180.jpeg', NULL, NULL, NULL, '0', '0', '0', 'stretcher for patients', 'In a hospital, a stretcher is a device used to carry a person who must lie flat and can\'t move on their own. It takes two strong people to carry a patient on a stretcher.', NULL, '2021-10-03 09:29:16', '2021-10-03 09:32:44'),
(12, '6', 'Operating table', '4', 45000, 'OT01GY', 15, 'd4aecbfd2_medifa_7000_operating_table_286x180.jpg', NULL, NULL, NULL, '0', '0', '0', 'An operating table, sometimes called operating room table', 'An operating table, sometimes called operating room table, is the table on which the patient lies during a surgical operation. This surgical equipment is usually found inside the surgery room of a hospital.', NULL, '2021-10-03 09:36:04', '2021-10-03 09:36:04'),
(13, '7', 'Otoscope', '3', 10000, 'OE01BG', 15, '902d280eb_Otoscope_286x180.jpg', NULL, NULL, NULL, '0', '0', '0', 'An otoscope is a tool which shines a beam of light', 'An otoscope is a tool which shines a beam of light to help visualize and examine the condition of the ear canal and eardrum. Examining the ear can reveal the cause of symptoms such as an earache, the ear feeling full, or hearing loss', NULL, '2021-10-03 09:41:06', '2021-10-03 09:41:06'),
(14, '7', 'Endotracheal tube', '4', 1500, 'ET01BW', 15, 'a38e662a3_Clear_Pvc07071_1000x1000_286x180.jpg', NULL, NULL, NULL, '0', '0', '0', 'An endotracheal tube is a flexible plastic tube', 'An endotracheal tube is a flexible plastic tube that is placed through the mouth into the trachea (windpipe) to help a patient breathe. The endotracheal tube is then connected to a ventilator, which delivers oxygen to the lungs. The process of inserting the tube is called endotracheal intubation.\r\nIn its simplest form, the endotracheal tube is a tube constructed of polyvinyl chloride that is placed between the vocal cords through the trachea. It serves to provide oxygen and inhaled gases to the lungs and protects the lungs from contamination, such as gastric contents or blood.', NULL, '2021-10-03 09:44:01', '2021-10-03 09:44:01'),
(15, '7', 'Inhaler', '5', 10000, 'IR08GN', 15, '92c6eb7f1_AsthmaInhaler_286x180.jpg', NULL, NULL, NULL, '0', '0', '0', 'An inhaler is a medical device for asthma', 'An inhaler is a medical device used for delivering medicines into the lungs through the work of a person\'s breathing', NULL, '2021-10-03 09:47:47', '2021-10-03 09:47:47'),
(16, '1', 'Thermometer', '3', 65, 'PG-IRT1603', 15, '03ee63a18_product03.jpg', NULL, NULL, NULL, '0', '0', '0', 'The Thermometer uses infra-red technology to accurately measure temperature.', 'The Kinetik Wellbeing Ear and Forehead Thermometer use infra-red technology, to accurately measure temperature to within ±0.2°C. It is simple to use and gives a reading in just 1 second.\r\n\r\nAdditional functionality includes a backlit display with a traffic light system that visibly shows whether the temperature reading is low, medium or high.\r\n\r\nNo probe covers are required for this thermometer. Being a dual-mode system allows for measurements to be taken by ear or forehead and means it can be used by many individuals hygienically.\r\n\r\nWith a 9-reading memory, you can easily monitor and track your temperature and share this information with Healthcare Professionals if you do have any concerns.\r\n\r\nKEY FEATURES:\r\n\r\nSuitable From Birth - Can also be used on adults.\r\nFever Alert Over 37.5°C.\r\nHygienic - No touch infrared technology saving you time and money on disposable covers.\r\n9 Reading Memory So You Can Store Your Results\r\nQuick - 1 second accurate reading.\r\nSpeedy results\r\nBacklight So You Can Take Measurements In The Dark.\r\nTraffic light system shows whether the temperature reading is low, medium or high.\r\nMulti-Modes - Also measures ambient, surface and liquid temperatures. Auto shut down time of 10s.\r\nCE Marked - Meets latest british standards\r\n3 STEP SETUP:\r\n\r\nInsert batteries into the device, and allow 30 minutes for the device to adjust to room temp\r\nIn Forehead mode, hold the device 3 cm away from forehead/food/liquid and press scan to take measurement until an audible alert is heard\r\nIn-Ear mode, remove the magnetic cover to use and straighten the ear canal to take a reading\r\nPACK CONTAINS:\r\n\r\nKinetik Wellbeing Ear and Forehead Thermometer\r\n2 x AAA batteries\r\nInstruction manual', NULL, '2021-10-05 02:54:13', '2021-10-05 03:17:52'),
(17, '1', 'Surgical Glove', '4', 65, '9856', 15, '8c86374ce_product08.jpg', NULL, NULL, NULL, '0', '0', '0', 'A sterile glove worn to prevent contamination of the patient during invasive procedures.', 'A sterile glove worn to prevent contamination of the patient during invasive procedures and to protect the hand from exposure to potentially infectious materials.', NULL, '2021-10-05 02:55:29', '2021-10-05 03:17:14'),
(18, '1', 'Hand Sanitizer', '7', 65, '9857', 15, '570a5ed03_product07.jpg', NULL, NULL, NULL, '0', '0', '0', 'Most hand sanitizers are alcohol-based and come in gel, foam, or liquid form.', 'Hand sanitizers are a type of disinfectant and antiseptic that is used to destroy microorganisms (pathogens) such as harmful viruses, fungi, and bacteria. Most hand sanitizers are alcohol-based and come in gel, foam, or liquid form', NULL, '2021-10-05 02:56:22', '2021-10-05 02:56:22'),
(19, '1', 'Digital Stethoscope', '7', 250, '9885', 15, 'caed89486_product06.jpg', NULL, NULL, NULL, '0', '0', '0', 'A digital stethoscope is able to convert an acoustic sound to electronic signals.', 'A digital stethoscope is able to convert an acoustic sound to electronic signals, which can be further amplified for optimal listening. These electronic signals can be further processed and digitalized to transmit to a personal computer or a laptop.', NULL, '2021-10-05 02:57:15', '2021-10-05 03:18:21'),
(20, '1', 'Gloves', '7', 150, '10005', 15, '2cc249396_product05.jpg', NULL, NULL, NULL, '0', '0', '0', 'Medical gloves  are used by health care personnel to prevent the spread of infection or illness.', 'Medical gloves  are used by health care personnel to prevent the spread of infection or illness. Medical gloves are disposable and include patient examination gloves and surgeon’s gloves.', NULL, '2021-10-05 02:58:01', '2021-10-05 02:58:01'),
(21, '1', 'Glass Mask', '7', 25, '1005', 15, '32a192fe7_product04.jpg', NULL, NULL, NULL, '0', '0', '0', 'Face shields are a common sight in doctors’ offices and hospitals.', 'Face shields are a common sight in doctors’ offices and hospitals. And as the pandemic drags on, they are becoming more prevalent among the public, too. But how do they work? And just how effective are they when it comes to protecting against the new coronavirus? AARP asked the experts for their take on the advantages and disadvantages of face shields.', NULL, '2021-10-05 03:00:14', '2021-10-05 03:00:14'),
(22, '2', 'Sphygmomanometer', '7', 230, '10010', 15, '4c4636360_product01.jpg', NULL, NULL, NULL, '0', '0', '0', 'Sphygmomanometer, instrument for measuring blood pressure. It consists of an inflatable rubber cuff.', 'Sphygmomanometer, instrument for measuring blood pressure. It consists of an inflatable rubber cuff, which is wrapped around the upper arm and is connected to an apparatus that records pressure, usually in terms of the height of a column of mercury or on a dial (an aneroid manometer).', NULL, '2021-10-05 03:01:21', '2021-10-05 03:18:32'),
(23, '1', 'Thermometer', '7', 165, '1001', 15, '26a83c831_product02.jpg', NULL, NULL, NULL, '0', '0', '0', 'A thermometer is a device used for measuring temperature.', 'A thermometer is a device used for measuring temperature. ... A thermometer is an instrument that measures temperature. It can measure the temperature of a solid such as food, a liquid such as water, or a gas such as air', NULL, '2021-10-05 03:02:28', '2021-10-05 03:02:28'),
(24, '1', 'Vantilator', '2', 125, '10005', 0, '6d26632a6_p2.png', NULL, NULL, NULL, '0', '0', '0', 'test', 'test', NULL, '2021-10-08 06:46:50', '2021-12-16 10:50:40'),
(25, '6', 'CT Scanner', '3', 1000000, 'PG-IRT1603', 14, '9dff7bbe8_header-banner-ct-overview-xs-2020.jpg', NULL, NULL, NULL, 'on', 'on', 'on', 'Advanced technologies and ergonomics are standard on every configuration.', 'Advanced technologies and ergonomics are standard on every configuration. So innovative capabilities are readily available for scanning a wide range of patients—from pediatric to bariatric. Industry-leading, automated dose reduction capabilities improve patient safety and increase your quality of care.', '4.5', '2021-12-16 06:07:22', '2021-12-16 08:35:24'),
(27, '6', 'Omron M2', '5', 6000, '10005', 21, 'b8c5638ab_M2_01-1.jpg', 'b8c5638ab_M2_01-2.jpg', NULL, NULL, NULL, NULL, 'on', 'this unique OMRON technology ensures that there is less discomfort from over-inflation of the cuff.', 'Intellisense Technology - this unique OMRON technology ensures that there is less discomfort from over-inflation of the cuff.\r\nHelps you take your blood pressure quickly and easily with one touch operation.\r\nIncluded cuff fits arms with a circumference of 22-32cm', NULL, '2021-12-17 01:38:17', '2021-12-17 01:38:17');

-- --------------------------------------------------------

--
-- Table structure for table `reviews`
--

CREATE TABLE `reviews` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `order_id` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `product_id` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `seller_id` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `buyer_id` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `rating` int(11) DEFAULT NULL,
  `review` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `reviews`
--

INSERT INTO `reviews` (`id`, `order_id`, `product_id`, `seller_id`, `buyer_id`, `rating`, `review`, `created_at`, `updated_at`) VALUES
(2, '20', '9', '6', '3', 5, 'Best product ever seen!', '2021-12-08 11:46:03', '2021-12-08 11:46:03'),
(3, '9', '9', '6', '3', 4, 'nnnn', '2021-12-08 12:21:41', '2021-12-08 12:21:41'),
(4, '19', '22', '2', '3', 4, 'Great', '2021-12-10 00:59:48', '2021-12-10 00:59:48'),
(5, '25', '10', '6', '3', 4, 'great', '2021-12-10 02:04:53', '2021-12-10 02:04:53'),
(7, '33', '25', '6', '3', 5, 'Very Nice Product :)', '2021-12-16 08:32:28', '2021-12-16 08:32:28'),
(8, '32', '25', '6', '3', 4, 'Great Product, Buying the Second Time.', '2021-12-16 08:33:08', '2021-12-16 08:33:08');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `gender` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `role` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `phonenumber` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `email_verified_at`, `password`, `gender`, `role`, `phonenumber`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'Mtw', 'mtw@gmail.com', NULL, '$2y$10$tq41LnW.qfYSf8eME/ApqOyL1zLlc.nP.92d/AbP/jX8pNDvCLyMi', 'male', 'seller', '03485583125', NULL, '2021-05-12 11:16:33', '2021-05-26 02:30:53'),
(2, 'MedicalUncle', 'admin@medicaluncle.com', NULL, '$2y$10$MrNQYihy1TDzvV.uxSBZ.OnIFe5KuqbPK3HnhAFP5gQWSnkgccCAK', 'male', 'admin', '3243534534534', NULL, '2021-05-26 03:19:49', '2021-10-06 05:57:44'),
(3, 'Al Shifa Hospital', 'buyer@gmail.com', NULL, '$2y$10$MrNQYihy1TDzvV.uxSBZ.OnIFe5KuqbPK3HnhAFP5gQWSnkgccCAK', 'male', 'customer', '03485583125', NULL, '2021-08-30 00:44:14', '2021-08-30 00:44:14'),
(4, 'Khurram Zeeshan Nawaz', 'Zeeshana413@gmail.com', NULL, '$2y$10$sLujanq8LWiv0Eb/Ws0IbeeG9aE191ZoIztc3P1hke.1LmeEhMFre', 'male', 'seller', '03160250717', NULL, '2021-09-30 05:43:51', '2021-09-30 05:43:51'),
(5, 'Khurram', 'Zeeshan413@gmail.com', NULL, '$2y$10$HxlIaAs2vRmKn8ISq09AfetkkcXJaWReHSvRHeBchp75hUynmIj7C', 'male', 'customer', '03160250717', NULL, '2021-10-01 07:09:41', '2021-10-01 07:09:59'),
(6, 'Mtw Abbaxi', 'mtwabbaxi@gmail.com', NULL, '$2y$10$m27VKobIXWbZCZXFDHtxoewmcrOw8bxh3N/PgIdx5w/o0IT6SpIxS', 'male', 'seller', '03313951023', NULL, '2021-10-03 08:48:34', '2021-12-18 11:03:24'),
(7, 'MediEquip', 'mediequip@gmail.com', NULL, '$2y$10$NIwY0Evp2bsGmEC.dq2uU.3QJVW4LUclKaGJ0Dfakt5OfLjkhffSa', 'male', 'seller', '03104563089', NULL, '2021-10-03 09:38:10', '2021-10-03 09:38:10'),
(8, 'Muhammad Talha Waseem', 'faheemriaz@gmail.com', NULL, '$2y$10$xLMr3YnbCSXC2BjdSFm7su1EHIpSejOo.TgpdxXtQh18pm/2JRBF.', 'male', 'customer', '03485583125', NULL, '2021-12-10 02:11:23', '2021-12-10 02:11:23'),
(9, 'faheem', 'faheemriaz@gmailcom', NULL, '$2y$10$PVFZU3eDB.pX2/G8ZHbnXOvDS6rw8Z8yeiLv.hLit336NkcuEMj8a', 'male', 'customer', '0333333333333333333333333', NULL, '2021-12-10 02:12:12', '2021-12-10 02:12:12'),
(10, 'Muhammad Talha Waseem', 'muhammadtalhawaseem@gmail.com', NULL, '$2y$10$uz8DeMaDKguHGH.beWR4dOk1DT/AzCSN4CM0b3dA/s4gbLunSbRrS', 'male', 'seller', '033333333333333333', NULL, '2021-12-10 02:12:58', '2021-12-10 02:12:58'),
(11, 'faheem', 'faheem1@gmailcom', NULL, '$2y$10$BDKBCFA.pnXLJ3lcoVsb6.5Wt6rexWYh0v9f1C0t1TYc0WZjFgp0.', 'male', 'customer', '033333333333', NULL, '2021-12-10 02:28:18', '2021-12-10 02:28:18'),
(12, 'faheem', 'faheem2@gmail.com', NULL, '$2y$10$aszFaDiT6Fc/N08K1orgpuqRcWkjA/JQfpg0JuKI7oPxxmuDJ/LdS', 'male', 'customer', '03485583125', NULL, '2021-12-10 02:29:43', '2021-12-10 02:29:43'),
(13, 'a', 'a@a.com', NULL, '$2y$10$owsWaG0NwNk2CIrPdnznHeqIOr1bhBys5egIom2HYDOH1NbAxvhTC', 'male', 'seller', '11111111111', NULL, '2021-12-15 06:33:35', '2021-12-15 06:33:35'),
(14, 'b', 'b@b.com', NULL, '$2y$10$yGijw20XCfdoCSbUbCkKzO0q0wD.heVE0frj7Hc6M81.18VWDEXeq', 'male', 'customer', '11111111111', NULL, '2021-12-15 06:34:46', '2021-12-15 06:34:46');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `bids`
--
ALTER TABLE `bids`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `bid_products`
--
ALTER TABLE `bid_products`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `blogs`
--
ALTER TABLE `blogs`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `buyer_rfqs`
--
ALTER TABLE `buyer_rfqs`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `carts`
--
ALTER TABLE `carts`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `cart__products`
--
ALTER TABLE `cart__products`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `catalogs`
--
ALTER TABLE `catalogs`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `contacts`
--
ALTER TABLE `contacts`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `notifications`
--
ALTER TABLE `notifications`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `order__products`
--
ALTER TABLE `order__products`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `reviews`
--
ALTER TABLE `reviews`
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
-- AUTO_INCREMENT for table `bids`
--
ALTER TABLE `bids`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `bid_products`
--
ALTER TABLE `bid_products`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `blogs`
--
ALTER TABLE `blogs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `buyer_rfqs`
--
ALTER TABLE `buyer_rfqs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `carts`
--
ALTER TABLE `carts`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `cart__products`
--
ALTER TABLE `cart__products`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `catalogs`
--
ALTER TABLE `catalogs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `contacts`
--
ALTER TABLE `contacts`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `notifications`
--
ALTER TABLE `notifications`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=36;

--
-- AUTO_INCREMENT for table `order__products`
--
ALTER TABLE `order__products`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=43;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;

--
-- AUTO_INCREMENT for table `reviews`
--
ALTER TABLE `reviews`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

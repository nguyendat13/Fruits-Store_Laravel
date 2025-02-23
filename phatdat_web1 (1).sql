-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Feb 23, 2025 at 04:05 PM
-- Server version: 8.0.30
-- PHP Version: 8.1.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `phatdat_web1`
--

-- --------------------------------------------------------

--
-- Table structure for table `cdw1_banner`
--

CREATE TABLE `cdw1_banner` (
  `id` bigint UNSIGNED NOT NULL,
  `name` varchar(1000) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `link` varchar(1000) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `image` varchar(1000) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `position` enum('slideshow','banner') CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'slideshow',
  `description` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `sort_order` int UNSIGNED NOT NULL,
  `created_by` int UNSIGNED NOT NULL,
  `updated_by` int UNSIGNED DEFAULT NULL,
  `status` int UNSIGNED NOT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `cdw1_banner`
--

INSERT INTO `cdw1_banner` (`id`, `name`, `link`, `image`, `position`, `description`, `sort_order`, `created_by`, `updated_by`, `status`, `deleted_at`, `created_at`, `updated_at`) VALUES
(1, 'Rau Hữu Cơ & \nTrái Cây Thực Phẩm', 'slider-show-1', 'slider_1.webp', 'banner', '100% Thực phẩm hữu cơ', 1, 1, NULL, 1, NULL, '2025-01-01 10:16:49', NULL),
(2, 'Slider1', 'slider-show-2', 'hero-img-1.png', 'slideshow', 'Mo ta', 2, 1, NULL, 1, NULL, '2025-01-01 10:16:49', NULL),
(3, 'Slider show 3', 'slider-show-3', 'hero-img-2.jpg', 'slideshow', 'Mo ta', 2, 1, NULL, 1, NULL, '2025-01-01 10:16:49', NULL),
(4, 'Slider show 4', 'slider-show-4', 'slider-4png', 'slideshow', 'Mo ta', 1, 1, NULL, 0, NULL, '2025-01-01 10:16:49', NULL),
(5, 'Slider show 5', 'slider-show-5', 'slider-5png', 'slideshow', 'Mo ta', 1, 1, NULL, 0, NULL, '2025-01-01 10:16:49', NULL),
(6, 'Slider show 6', 'slider-show-6', 'slider-6png', 'slideshow', 'Mo ta', 1, 1, NULL, 0, NULL, '2025-01-01 10:16:49', NULL),
(7, 'Slider show 7', 'slider-show-7', 'slider-7png', 'slideshow', 'Mo ta', 1, 1, NULL, 0, NULL, '2025-01-01 10:16:49', NULL),
(8, 'Slider show 8', 'slider-show-8', 'slider-8png', 'slideshow', 'Mo ta', 1, 1, NULL, 0, NULL, '2025-01-01 10:16:49', NULL),
(9, 'Slider show 9', 'slider-show-9', 'slider-9png', 'slideshow', 'Mo ta', 1, 1, NULL, 0, NULL, '2025-01-01 10:16:49', NULL),
(10, 'Slider show 10', 'slider-show-10', 'slider-10png', 'slideshow', 'Mo ta', 1, 1, NULL, 0, NULL, '2025-01-01 10:16:49', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `cdw1_brand`
--

CREATE TABLE `cdw1_brand` (
  `id` bigint UNSIGNED NOT NULL,
  `name` varchar(1000) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `slug` varchar(1000) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `image` varchar(1000) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `sort_order` int UNSIGNED NOT NULL,
  `created_by` int UNSIGNED NOT NULL,
  `updated_by` int UNSIGNED DEFAULT NULL,
  `status` int UNSIGNED NOT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `cdw1_brand`
--

INSERT INTO `cdw1_brand` (`id`, `name`, `slug`, `image`, `description`, `sort_order`, `created_by`, `updated_by`, `status`, `deleted_at`, `created_at`, `updated_at`) VALUES
(1, 'Việt Nam', 'viet-nam', 'brand-1.png', 'Mô tả cho thương hiệu 1', 1, 1, NULL, 1, NULL, '2025-01-01 10:16:49', '2025-01-01 10:16:49'),
(2, 'Trung Quốc', 'trung-quoc', 'brand-2.png', 'Mô tả cho thương hiệu 2', 2, 1, NULL, 1, NULL, '2025-01-01 10:16:49', '2025-01-01 10:16:49'),
(3, 'Mỹ', 'my', 'brand-3.png', 'Mô tả cho thương hiệu 3', 3, 1, NULL, 1, NULL, '2025-01-01 10:16:49', '2025-01-01 10:16:49'),
(4, 'Thái Lan', 'thai-lan', 'brand-4.png', 'Mô tả cho thương hiệu 4', 4, 1, NULL, 1, NULL, '2025-01-01 10:16:49', '2025-01-01 10:16:49'),
(5, 'Nhật Bản', 'nhat-ban', 'brand-5.png', 'Mô tả cho thương hiệu 5', 5, 1, NULL, 1, NULL, '2025-01-01 10:16:49', '2025-01-01 10:16:49'),
(7, 'Brand 7', 'brand-7', 'brand-7.png', 'Mô tả cho thương hiệu 7', 7, 1, NULL, 0, NULL, '2025-01-01 10:16:49', '2025-01-01 10:16:49'),
(8, 'Brand 8', 'brand-8', 'brand-8.png', 'Mô tả cho thương hiệu 8', 8, 1, NULL, 0, NULL, '2025-01-01 10:16:49', '2025-01-01 10:16:49'),
(9, 'Brand 9', 'brand-9', 'brand-9.png', 'Mô tả cho thương hiệu 9', 9, 1, NULL, 0, NULL, '2025-01-01 10:16:49', '2025-01-01 10:16:49'),
(10, 'Brand 10', 'brand-10', 'brand-10.png', 'Mô tả cho thương hiệu 10', 10, 1, NULL, 0, NULL, '2025-01-01 10:16:49', '2025-01-01 10:16:49');

-- --------------------------------------------------------

--
-- Table structure for table `cdw1_cache`
--

CREATE TABLE `cdw1_cache` (
  `key` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `value` mediumtext CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `expiration` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `cdw1_cache_locks`
--

CREATE TABLE `cdw1_cache_locks` (
  `key` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `owner` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `expiration` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `cdw1_category`
--

CREATE TABLE `cdw1_category` (
  `id` bigint UNSIGNED NOT NULL,
  `name` varchar(1000) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `slug` varchar(1000) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `image` varchar(1000) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `parent_id` int UNSIGNED DEFAULT NULL,
  `sort_order` int UNSIGNED NOT NULL,
  `created_by` int UNSIGNED NOT NULL,
  `updated_by` int UNSIGNED DEFAULT NULL,
  `status` int UNSIGNED NOT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `cdw1_category`
--

INSERT INTO `cdw1_category` (`id`, `name`, `slug`, `image`, `description`, `parent_id`, `sort_order`, `created_by`, `updated_by`, `status`, `deleted_at`, `created_at`, `updated_at`) VALUES
(1, 'Sản phẩm hữu cơ của chúng tôi', 'category-1', 'category-1.png', 'Mô tả cho category 1', 0, 1, 1, NULL, 1, NULL, '2025-01-01 10:16:49', '2025-01-01 10:16:49'),
(2, 'Bánh mì', 'banh-mi', 'category-2.png', 'Mô tả cho category 2', 1, 2, 1, NULL, 1, NULL, '2025-01-01 10:16:49', '2025-01-01 10:16:49'),
(3, 'Thịt', 'thit', 'category-3.png', 'Mô tả cho category 3', 1, 3, 1, NULL, 1, NULL, '2025-01-01 10:16:49', '2025-01-01 10:16:49'),
(4, 'Trái cây', 'trai-cay', 'category-4.png', 'Mô tả cho category 4', 1, 4, 1, NULL, 1, NULL, '2025-01-01 10:16:49', '2025-01-01 10:16:49'),
(5, 'Rau củ quả', 'rau-cu-qua', 'category-5.png', 'Mô tả cho category 5', 1, 5, 1, NULL, 1, NULL, '2025-01-01 10:16:49', '2025-01-01 10:16:49'),
(7, 'Subcategory 7', 'subcategory-7', 'subcategory-7.png', 'Mô tả cho subcategory 7', NULL, 7, 1, NULL, 0, NULL, '2025-01-01 10:16:49', '2025-01-01 10:16:49'),
(8, 'Subcategory 8', 'subcategory-8', 'subcategory-8.png', 'Mô tả cho subcategory 8', NULL, 8, 1, NULL, 0, NULL, '2025-01-01 10:16:49', '2025-01-01 10:16:49'),
(9, 'Subcategory 9', 'subcategory-9', 'subcategory-9.png', 'Mô tả cho subcategory 9', NULL, 9, 1, NULL, 0, NULL, '2025-01-01 10:16:49', '2025-01-01 10:16:49'),
(10, 'Subcategory 10', 'subcategory-10', 'subcategory-10.png', 'Mô tả cho subcategory 10', NULL, 10, 1, NULL, 0, NULL, '2025-01-01 10:16:49', '2025-01-01 10:16:49');

-- --------------------------------------------------------

--
-- Table structure for table `cdw1_contact`
--

CREATE TABLE `cdw1_contact` (
  `id` bigint UNSIGNED NOT NULL,
  `user_id` int UNSIGNED NOT NULL,
  `name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `phone` varchar(15) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `title` varchar(1000) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `content` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `reply_id` int UNSIGNED DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `created_by` int UNSIGNED NOT NULL,
  `updated_by` int UNSIGNED DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `status` tinyint UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `cdw1_contact`
--

INSERT INTO `cdw1_contact` (`id`, `user_id`, `name`, `email`, `phone`, `title`, `content`, `reply_id`, `created_at`, `updated_at`, `created_by`, `updated_by`, `deleted_at`, `status`) VALUES
(1, 2, 'Contact User 1', 'contact1@example.com', '0123456781', 'Liên hệ số 1', 'Đây là nội dung liên hệ mẫu số 1.', NULL, '2025-01-01 10:16:49', '2025-01-01 10:16:49', 1, NULL, NULL, 1),
(2, 6, 'Contact User 2', 'contact2@example.com', '0123456782', 'Liên hệ số 2', 'Đây là nội dung liên hệ mẫu số 2.', NULL, '2025-01-01 10:16:49', '2025-01-01 10:16:49', 1, NULL, NULL, 1),
(3, 8, 'Contact User 3', 'contact3@example.com', '0123456783', 'Liên hệ số 3', 'Đây là nội dung liên hệ mẫu số 3.', NULL, '2025-01-01 10:16:49', '2025-01-01 10:16:49', 1, NULL, NULL, 1),
(4, 2, 'Contact User 4', 'contact4@example.com', '0123456784', 'Liên hệ số 4', 'Đây là nội dung liên hệ mẫu số 4.', NULL, '2025-01-01 10:16:49', '2025-01-01 10:16:49', 1, NULL, NULL, 0),
(5, 2, 'Contact User 5', 'contact5@example.com', '0123456785', 'Liên hệ số 5', 'Đây là nội dung liên hệ mẫu số 5.', NULL, '2025-01-01 10:16:49', '2025-01-01 10:16:49', 1, NULL, NULL, 0),
(6, 1, 'Contact User 6', 'contact6@example.com', '0123456786', 'Liên hệ số 6', 'Đây là nội dung liên hệ mẫu số 6.', NULL, '2025-01-01 10:16:49', '2025-01-01 10:16:49', 1, NULL, NULL, 1),
(7, 4, 'Contact User 7', 'contact7@example.com', '0123456787', 'Liên hệ số 7', 'Đây là nội dung liên hệ mẫu số 7.', NULL, '2025-01-01 10:16:49', '2025-01-01 10:16:49', 1, NULL, NULL, 0),
(8, 2, 'Contact User 8', 'contact8@example.com', '0123456788', 'Liên hệ số 8', 'Đây là nội dung liên hệ mẫu số 8.', NULL, '2025-01-01 10:16:49', '2025-01-01 10:16:49', 1, NULL, NULL, 1),
(9, 7, 'Contact User 9', 'contact9@example.com', '0123456789', 'Liên hệ số 9', 'Đây là nội dung liên hệ mẫu số 9.', NULL, '2025-01-01 10:16:49', '2025-01-01 10:16:49', 1, NULL, NULL, 1),
(10, 2, 'Contact User 10', 'contact10@example.com', '01234567810', 'Liên hệ số 10', 'Đây là nội dung liên hệ mẫu số 10.', NULL, '2025-01-01 10:16:49', '2025-01-01 10:16:49', 1, NULL, NULL, 0),
(17, 0, 'nguyen phat dat', 'dalrest2210@gmail.com', '0845553994', 'đa', '43', NULL, '2025-01-08 08:42:31', '2025-01-08 08:42:31', 0, NULL, NULL, 0),
(18, 0, 'nguyen phat dat', 'dalrest2210@gmail.com', '0845553994', 'đa', '43', NULL, '2025-01-08 08:42:51', '2025-01-08 08:42:51', 0, NULL, NULL, 0);

-- --------------------------------------------------------

--
-- Table structure for table `cdw1_failed_jobs`
--

CREATE TABLE `cdw1_failed_jobs` (
  `id` bigint UNSIGNED NOT NULL,
  `uuid` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `connection` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `cdw1_jobs`
--

CREATE TABLE `cdw1_jobs` (
  `id` bigint UNSIGNED NOT NULL,
  `queue` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `attempts` tinyint UNSIGNED NOT NULL,
  `reserved_at` int UNSIGNED DEFAULT NULL,
  `available_at` int UNSIGNED NOT NULL,
  `created_at` int UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `cdw1_job_batches`
--

CREATE TABLE `cdw1_job_batches` (
  `id` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `total_jobs` int NOT NULL,
  `pending_jobs` int NOT NULL,
  `failed_jobs` int NOT NULL,
  `failed_job_ids` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `options` mediumtext CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci,
  `cancelled_at` int DEFAULT NULL,
  `created_at` int NOT NULL,
  `finished_at` int DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `cdw1_menu`
--

CREATE TABLE `cdw1_menu` (
  `id` bigint UNSIGNED NOT NULL,
  `name` varchar(1000) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `link` varchar(1000) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `position` enum('mainmenu','footermenu') CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'mainmenu',
  `table_id` int UNSIGNED DEFAULT NULL,
  `type` varchar(1000) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `parent_id` int UNSIGNED NOT NULL DEFAULT '0',
  `sort_order` int UNSIGNED NOT NULL DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `created_by` int UNSIGNED NOT NULL,
  `updated_by` int UNSIGNED DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `status` tinyint UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `cdw1_menu`
--

INSERT INTO `cdw1_menu` (`id`, `name`, `link`, `position`, `table_id`, `type`, `parent_id`, `sort_order`, `created_at`, `updated_at`, `created_by`, `updated_by`, `deleted_at`, `status`) VALUES
(1, 'Rau củ quả', '/public/danh-muc/rau-cu-qua', 'mainmenu', NULL, 'category', 2, 1, '2025-01-01 10:16:49', '2025-01-01 10:16:49', 1, NULL, NULL, 1),
(2, 'Danh mục', '/public/danh-muc', 'mainmenu', NULL, 'category', 0, 2, '2025-01-01 10:16:49', '2025-01-01 10:16:49', 1, NULL, NULL, 1),
(3, 'Trái cây', '/public/danh-muc/trai-cay', 'mainmenu', NULL, 'category', 2, 3, '2025-01-01 10:16:49', '2025-01-01 10:16:49', 1, NULL, NULL, 1),
(4, 'Trang chủ', '/public', 'mainmenu', NULL, 'page', 0, 1, '2025-01-01 10:16:49', '2025-01-01 10:16:49', 1, NULL, NULL, 1),
(5, 'Bánh mì', '/public/danh-muc/banh-mi', 'mainmenu', NULL, 'category', 2, 5, '2025-01-01 10:16:49', '2025-01-01 10:16:49', 1, NULL, NULL, 1),
(6, 'Cửa hàng', '/public/san-pham', 'mainmenu', NULL, 'page', 0, 1, '2025-01-01 10:16:49', '2025-01-01 10:16:49', 1, NULL, NULL, 1),
(7, 'Thịt', '/public/danh-muc/thit', 'mainmenu', NULL, 'category', 2, 7, '2025-01-01 10:16:49', '2025-01-01 10:16:49', 1, NULL, NULL, 1),
(8, 'Về chúng tôi', '/public/ve-chung-toi', 'mainmenu', NULL, 'page', 0, 1, '2025-01-01 10:16:49', '2025-01-01 10:16:49', 1, NULL, NULL, 1),
(9, 'Bài viết', '/public/tat-ca-bai-viet', 'mainmenu', NULL, 'page', 0, 0, '2025-01-01 10:16:49', '2025-01-01 10:16:49', 1, NULL, NULL, 1),
(10, 'Liên hệ', '/public/lien-he', 'mainmenu', NULL, 'page', 0, 1, '2025-01-01 10:16:49', '2025-01-01 10:16:49', 1, NULL, NULL, 1),
(11, 'Thương hiệu', '/public/thuong-hieu', 'mainmenu', NULL, 'brand', 0, 3, '2025-01-06 09:06:32', '2025-01-06 09:06:36', 1, NULL, NULL, 1),
(12, 'Việt Nam', '/public/thuong-hieu/viet-nam', 'mainmenu', NULL, 'brand', 11, 1, '2025-01-12 18:30:43', '2025-01-12 18:30:43', 12, NULL, NULL, 1),
(13, 'Trung Quốc', '/public/thuong-hieu/trung-quoc', 'mainmenu', NULL, 'brand', 11, 2, '2025-01-12 18:33:25', '2025-01-12 18:33:25', 12, NULL, NULL, 1),
(14, 'Mỹ', '/public/thuong-hieu/my', 'mainmenu', NULL, 'brand', 11, 3, '2025-01-12 18:33:49', '2025-01-12 18:33:49', 12, NULL, NULL, 1),
(15, 'Thái Lan', '/public/thuong-hieu/thai-lan', 'mainmenu', NULL, 'brand', 11, 4, '2025-01-12 18:34:20', '2025-01-12 18:34:20', 12, NULL, NULL, 1),
(16, 'Nhật Bản', '/public/thuong-hieu/nhat-ban', 'mainmenu', NULL, 'brand', 11, 5, '2025-01-12 18:34:44', '2025-01-12 18:34:44', 12, NULL, NULL, 1),
(17, 'Danh mục sản phẩm', '/public/danh-muc', 'footermenu', NULL, 'category', 0, 1, '2025-01-13 07:39:14', '2025-01-13 07:39:14', 12, NULL, NULL, 1),
(18, 'Rau củ quả', '/public/danh-muc/rau-cu-qua', 'footermenu', NULL, 'category', 17, 1, '2025-01-13 07:39:56', '2025-01-13 07:41:12', 12, 12, NULL, 1),
(19, 'Trái cây', '/public/danh-muc/trai-cay', 'footermenu', NULL, 'category', 17, 2, '2025-01-13 07:40:19', '2025-01-13 07:41:06', 12, 12, NULL, 1),
(20, 'Bánh mì', '/public/danh-muc/banh-mi', 'footermenu', NULL, 'category', 17, 3, '2025-01-13 07:40:59', '2025-01-13 07:41:18', 12, 12, NULL, 1),
(21, 'Thịt', '/public/danh-muc/thit', 'footermenu', NULL, 'category', 17, 4, '2025-01-13 07:41:45', '2025-01-13 07:41:45', 12, NULL, NULL, 1),
(22, 'Chính sách', '/public/chinh-sach', 'footermenu', NULL, 'page', 0, 1, '2025-01-13 07:43:25', '2025-01-13 07:43:25', 12, NULL, NULL, 1),
(23, 'Chính sách vận chuyển', '/public/chinh-sach/chinh-sach-van-chuyen', 'footermenu', NULL, 'page', 22, 1, '2025-01-13 07:44:05', '2025-01-13 07:44:05', 12, NULL, NULL, 1),
(24, ' Chính sách thanh toán', '/public/chinh-sach/chinh-sach-thanh-toan', 'footermenu', NULL, 'page', 22, 2, '2025-01-13 07:44:37', '2025-01-13 07:44:37', 12, NULL, NULL, 1),
(25, 'Chính sách đổi trả', '/public/chinh-sach/chinh-sach-doi-tra', 'footermenu', NULL, 'page', 22, 3, '2025-01-13 07:45:01', '2025-01-13 07:45:01', 12, NULL, NULL, 1),
(26, ' Chính sách hỗ trợ', '/public/chinh-sach/chinh-sach-ho-tro', 'footermenu', NULL, 'page', 22, 4, '2025-01-13 07:45:40', '2025-01-13 07:45:40', 12, NULL, NULL, 1),
(27, 'Về chúng tôi', '/public/ve-chung-toi', 'footermenu', NULL, 'page', 0, 1, '2025-01-13 07:47:42', '2025-01-13 07:47:42', 12, NULL, NULL, 1),
(28, 'Liên hệ', '/public/lien-he', 'footermenu', NULL, 'page', 0, 1, '2025-01-13 07:48:57', '2025-01-13 07:48:57', 12, NULL, NULL, 1),
(29, 'Chúng tôi cung cấp các sản phẩm hữu cơ chất lượng cao, thân thiện với môi trường và đảm bảo sức khỏe người tiêu dùng...', '/public/ve-chung-toi', 'footermenu', NULL, 'page', 27, 1, '2025-01-13 08:05:47', '2025-01-13 08:05:47', 12, NULL, NULL, 1),
(30, 'Email: phatdat0803@gmail.com', '/public/lien-he', 'footermenu', NULL, 'page', 28, 1, '2025-01-13 08:09:34', '2025-01-13 08:10:22', 12, 12, NULL, 1),
(31, 'Số điện thoại: 0845553994', '/public/lien-he', 'footermenu', NULL, 'page', 28, 2, '2025-01-13 08:11:48', '2025-01-13 08:12:09', 12, 12, NULL, 1),
(32, 'Địa chỉ: 123 Đường ABC, Quận XYZ, TP.HCM', '/public/lien-he', 'footermenu', NULL, 'page', 28, 3, '2025-01-13 08:12:28', '2025-01-13 08:12:36', 12, NULL, NULL, 1);

-- --------------------------------------------------------

--
-- Table structure for table `cdw1_migrations`
--

CREATE TABLE `cdw1_migrations` (
  `id` int UNSIGNED NOT NULL,
  `migration` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `cdw1_migrations`
--

INSERT INTO `cdw1_migrations` (`id`, `migration`, `batch`) VALUES
(15, '0001_01_01_000000_create_users_table', 1),
(16, '0001_01_01_000001_create_cache_table', 1),
(17, '0001_01_01_000002_create_jobs_table', 1),
(18, '2024_12_10_101304_create_banner_table', 1),
(19, '2024_12_10_101401_create_brand_table', 1),
(20, '2024_12_10_101429_create_category_table', 1),
(21, '2024_12_10_101456_create_contact_table', 1),
(22, '2024_12_10_101544_create_menu_table', 1),
(23, '2024_12_10_101557_create_order_table', 1),
(24, '2024_12_10_101610_create_orderdetail_table', 1),
(25, '2024_12_10_101625_create_post_table', 1),
(26, '2024_12_10_101639_create_product_table', 1),
(27, '2024_12_10_101656_create_topic_table', 1),
(28, '2024_12_10_101706_create_user_table', 1),
(29, '2025_02_18_092033_refresh_users_table', 2),
(30, '2025_02_18_094037_add_login_attempts_and_locked_until_to_users_table', 3),
(31, '2025_02_18_095136_add_login_attempts_to_users_table', 4),
(32, '2025_02_18_122946_add_stock_to_products_table', 5);

-- --------------------------------------------------------

--
-- Table structure for table `cdw1_order`
--

CREATE TABLE `cdw1_order` (
  `id` bigint UNSIGNED NOT NULL,
  `user_id` bigint UNSIGNED NOT NULL,
  `name` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `phone` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `address` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `created_by` int UNSIGNED NOT NULL,
  `updated_by` int UNSIGNED DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `status` tinyint UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `cdw1_order`
--

INSERT INTO `cdw1_order` (`id`, `user_id`, `name`, `phone`, `email`, `address`, `created_at`, `updated_at`, `created_by`, `updated_by`, `deleted_at`, `status`) VALUES
(1, 14, 'Customer 1', '0123456781', 'customer1@example.com', 'Địa chỉ số 1', '2025-01-01 10:16:49', '2025-01-07 00:21:32', 1, NULL, '2025-01-07 00:21:32', 0),
(2, 4, 'Customer 2', '0123456782', 'customer2@example.com', 'Địa chỉ số 2', '2025-01-01 10:16:49', '2025-02-18 09:27:59', 1, NULL, NULL, 0),
(3, 3, 'Customer', '0123456783', 'customer3@example.com', 'Địa chỉ số 3', '2025-01-01 10:16:49', '2025-02-18 09:28:05', 1, 12, NULL, 0),
(4, 7, 'Customer 4', '0123456784', 'customer4@example.com', 'Địa chỉ số 4', '2025-01-01 10:16:49', '2025-01-01 10:16:49', 1, NULL, NULL, 0),
(5, 4, 'Customer 5', '0123456785', 'customer5@example.com', 'Địa chỉ số 5', '2025-01-01 10:16:49', '2025-01-01 10:16:49', 1, NULL, NULL, 0),
(6, 1, 'Customer 6', '0123456786', 'customer6@example.com', 'Địa chỉ số 6', '2025-01-01 10:16:49', '2025-01-01 10:16:49', 1, NULL, NULL, 1),
(7, 2, 'Customer 7', '0123456787', 'customer7@example.com', 'Địa chỉ số 7', '2025-01-01 10:16:49', '2025-01-01 10:16:49', 1, NULL, NULL, 1),
(8, 6, 'Customer 8', '0123456788', 'customer8@example.com', 'Địa chỉ số 8', '2025-01-01 10:16:49', '2025-01-01 10:16:49', 1, NULL, NULL, 0),
(9, 4, 'Customer 9', '0123456789', 'customer9@example.com', 'Địa chỉ số 9', '2025-01-01 10:16:49', '2025-01-01 10:16:49', 1, NULL, NULL, 1),
(10, 8, 'Customer 10', '01234567810', 'customer10@example.com', 'Địa chỉ số 10', '2025-01-01 10:16:49', '2025-01-01 10:16:49', 1, NULL, NULL, 1),
(14, 14, 'nguyen phat dat', '0845553994', 'dalrest2210@gmail.com', '16 tang nhon phu', '2025-01-06 23:46:25', '2025-02-21 02:04:03', 14, NULL, NULL, 1),
(15, 14, 'nguyen phat dat', '0845553994', 'dalrest2210@gmail.com', '16 tang nhon phu', '2025-01-06 23:48:00', '2025-01-07 09:08:26', 14, NULL, '2025-01-07 09:08:26', 0),
(16, 14, 'nguyen phat dat', '0845553994', 'dalrest2210@gmail.com', '16 tang nhon phu', '2025-01-07 03:11:15', '2025-01-07 09:08:23', 14, NULL, '2025-01-07 09:08:23', 0),
(17, 14, 'dsadsadsa', '0845553994', 'dat@gmail.com', 'đasadadsa', '2025-01-12 16:53:33', '2025-01-12 16:54:42', 14, NULL, '2025-01-12 16:54:42', 0),
(21, 32, 'fatdat04', '0781651616', 'dat@gmail.com', 'sssssssssssss', '2025-02-18 08:03:17', '2025-02-19 08:35:32', 32, NULL, '2025-02-19 08:35:32', 0),
(22, 32, 'fatdat04', '0781651616', 'dat@gmail.com', 'dsasssssss', '2025-02-19 08:35:18', '2025-02-21 02:02:56', 32, 12, NULL, 0);

-- --------------------------------------------------------

--
-- Table structure for table `cdw1_orderdetail`
--

CREATE TABLE `cdw1_orderdetail` (
  `id` bigint UNSIGNED NOT NULL,
  `order_id` int UNSIGNED NOT NULL,
  `product_id` int UNSIGNED NOT NULL,
  `price` decimal(15,2) NOT NULL,
  `discount` decimal(15,2) NOT NULL DEFAULT '0.00',
  `qty` int NOT NULL,
  `amount` decimal(15,2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `cdw1_orderdetail`
--

INSERT INTO `cdw1_orderdetail` (`id`, `order_id`, `product_id`, `price`, `discount`, `qty`, `amount`) VALUES
(1, 9, 29, '816.00', '46.00', 3, '2310.00'),
(2, 1, 17, '985.00', '16.00', 5, '4845.00'),
(3, 4, 38, '436.00', '39.00', 1, '397.00'),
(4, 7, 38, '862.00', '0.00', 4, '3448.00'),
(5, 1, 10, '601.00', '1.00', 2, '1200.00'),
(6, 4, 50, '204.00', '45.00', 4, '636.00'),
(7, 5, 47, '908.00', '22.00', 5, '4430.00'),
(8, 5, 6, '726.00', '40.00', 5, '3430.00'),
(9, 5, 40, '934.00', '25.00', 4, '3636.00'),
(10, 3, 50, '141.00', '43.00', 1, '98.00'),
(11, 4, 35, '843.00', '42.00', 3, '2403.00'),
(12, 8, 12, '163.00', '29.00', 4, '536.00'),
(13, 2, 48, '831.00', '34.00', 3, '2391.00'),
(14, 3, 47, '514.00', '29.00', 3, '1455.00'),
(15, 4, 20, '740.00', '14.00', 1, '726.00'),
(16, 4, 10, '196.00', '23.00', 3, '519.00'),
(17, 9, 33, '565.00', '41.00', 3, '1572.00'),
(18, 10, 18, '356.00', '34.00', 1, '322.00'),
(19, 5, 28, '827.00', '17.00', 1, '810.00'),
(20, 9, 10, '763.00', '17.00', 2, '1492.00'),
(21, 11, 8, '304.00', '0.00', 1, '304.00'),
(22, 12, 8, '304.00', '0.00', 1, '304.00'),
(23, 13, 8, '304.00', '0.00', 1, '304.00'),
(24, 14, 2, '169.00', '0.00', 1, '169.00'),
(25, 15, 2, '169.00', '0.00', 1, '169.00'),
(26, 16, 2, '169.00', '0.00', 1, '169.00'),
(27, 17, 2, '169.00', '0.00', 2, '338.00'),
(28, 18, 2, '169.00', '0.00', 1, '169.00'),
(29, 19, 3, '356.00', '0.00', 1, '356.00'),
(30, 20, 2, '169.00', '0.00', 1, '169.00'),
(31, 21, 3, '356.00', '0.00', 1, '356.00'),
(32, 22, 2, '169.00', '0.00', 1, '169.00');

-- --------------------------------------------------------

--
-- Table structure for table `cdw1_password_reset_tokens`
--

CREATE TABLE `cdw1_password_reset_tokens` (
  `email` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `cdw1_post`
--

CREATE TABLE `cdw1_post` (
  `id` bigint UNSIGNED NOT NULL,
  `topic_id` int UNSIGNED DEFAULT NULL,
  `title` varchar(1000) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `slug` varchar(1000) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `content` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `thumbnail` varchar(1000) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `type` enum('post','page') CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'post',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `created_by` int UNSIGNED NOT NULL,
  `updated_by` int UNSIGNED DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `status` tinyint UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `cdw1_post`
--

INSERT INTO `cdw1_post` (`id`, `topic_id`, `title`, `slug`, `content`, `description`, `thumbnail`, `type`, `created_at`, `updated_at`, `created_by`, `updated_by`, `deleted_at`, `status`) VALUES
(1, 2, 'Bác Tôm 15 năm ẩm thực và văn hóa … “Thuận Tự Nhiên”', 'bai-viet-1', '<p>Nội dung bài viết số 1</p>', 'Từ một ý tưởng nhỏ nhoi về thực phẩm sạch, Bác Tôm đã trở thành một thương hiệu được nhiều người yêu thích, nhờ vào sự tận tâm và lòng đam mê của người sáng lập và...', 'post5.jpg', 'page', '2025-01-01 10:16:49', '2025-01-01 10:16:49', 1, NULL, NULL, 0),
(2, 3, '6 mẹo Hay giúp vườn rau tại nhà Xanh Mướt mỗi ngày!', 'bai-viet-2', '<p>Nội dung bài viết số 2</p>', 'Việc trồng và chăm sóc vườn rau tại nhà không chỉ giúp bạn có nguồn...', 'blog.jpg', 'post', '2025-01-01 10:16:49', '2025-01-01 10:16:49', 1, NULL, NULL, 1),
(3, 2, 'Trải nghiệm Farm tour Đồng Sương – Hành trình “Từ Vườn tới Bàn ăn”\n', 'bai-viet-3', '<p>Nội dung bài viết số 3</p>', 'Vừa qua, Bác Tôm đã có dịp đồng hành cùng quý khách hàng trong chuyến Farm tour Đồng Sương. Chuyến đi nằm trong khuôn khổ dự án dinh dưỡng NIFAM – “Dự báo và Giám sát can thiệp dinh dưỡng” do Đại học Bonn tài trợ, do Trung tâm hỗ trợ phát triển...', 'post4.jpg', 'page', '2025-01-01 10:16:49', '2025-01-01 10:16:49', 1, NULL, NULL, 1),
(4, 1, 'Mách bạn cách luộc rau muống giòn xanh đẹp mắt, ai cũng làm được.', 'bai-viet-4', 'Theo y học cổ truyền, rau muống có vị nhạt, tính mát, giúp thanh nhiệt, thông đại tiểu tiện và chữa táo bón, đái rắt… Đây là loại rau được nhiều người yêu thích vì dễ ăn và có thể chế biến thành nhiều món ngon. Bác Tôm sẽ chia sẻ bí quyết luộc rau muống sao cho vừa ngon vừa đẹp mắt. Nhờ những bí quyết này, bạn sẽ có thể giữ được màu xanh tươi của rau muống mà vẫn đảm bảo độ giòn ngon, hấp dẫn. ', ' Nhiều người nghĩ rằng luộc rau muống là việc dễ dàng, nhưng thực tế...', 'amthuc1.png', 'post', '2025-01-01 10:16:49', '2025-01-01 10:16:49', 1, NULL, NULL, 0),
(5, 2, 'SỐNG VÀ HÀNH ĐỘNG HỮU CƠ – HẠN CHẾ TÚI NILON', 'bai-viet-5', '<p>Nội dung bài viết số 5</p>', 'Bạn có biết, mỗi chiếc túi nilon mỏng manh kia phải mất đến hàng trăm...', 'post6.jpg', 'page', '2025-01-01 10:16:49', '2025-01-01 10:16:49', 1, NULL, NULL, 1),
(6, 2, 'Khám phá 5 chuỗi cửa hàng Thực Phẩm Sạch hàng đầu tại Hà Nội\n', 'bai-viet-6', '<p>Nội dung bài viết số 6</p>', ' Chuỗi cửa hàng thực phẩm Uy tín Chất lượng lâu đời tại Thủ Đô...', 'post7.jpg', 'post', '2025-01-01 10:16:49', '2025-01-01 10:16:49', 1, NULL, NULL, 1),
(7, 1, 'Tết thêm đậm đà với món NGON Dinh Dưỡng từ Nấm hương', 'bai-viet-7', '<p>Nội dung bài viết số 7</p>', 'Trong dịp Tết, những bữa tiệc với bánh chưng và các món ăn dầu mỡ...', 'amthuc2.png', 'page', '2025-01-01 10:16:49', '2025-01-01 10:16:49', 1, NULL, NULL, 0),
(8, 3, 'Top 10 thực phẩm giàu Canxi Không Thể bỏ qua!', 'bai-viet-8', '<p>Nội dung bài viết số 8</p>', 'Canxi là khoáng chất đóng vai trò quan trọng đối với sự phát triển, chiếm...', 'blog1.jpg', 'post', '2025-01-01 10:16:49', '2025-01-01 10:16:49', 1, NULL, NULL, 1),
(9, 2, 'Những thứ không thể thiếu trong ngày rằm tại Bác Tôm\n', 'bai-viet-9', '<p>Nội dung bài viết số 9</p>', '🍒Thịt gà – Hoa quả – Bánh chưng 🙏🙏 Cứ ngày rằm, nhất là rằm thág...', 'post8.webp', 'page', '2025-01-01 10:16:49', '2025-01-01 10:16:49', 1, NULL, NULL, 0),
(10, 1, 'Công thức để hũ dưa muối NGON đúng điệu!', 'bai-viet-10', '<p>Nội dung bài viết số 10</p>', ' Dưa muối là một món ăn không thể thiếu trên mâm cơm của người Việt,...', 'amthuc3.jpg', 'post', '2025-01-01 10:16:49', '2025-01-01 10:16:49', 1, NULL, NULL, 1);

-- --------------------------------------------------------

--
-- Table structure for table `cdw1_product`
--

CREATE TABLE `cdw1_product` (
  `id` bigint UNSIGNED NOT NULL,
  `category_id` int UNSIGNED NOT NULL,
  `brand_id` int UNSIGNED NOT NULL,
  `name` varchar(1000) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `slug` varchar(1000) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `content` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `price_buy` double NOT NULL,
  `price_sale` double NOT NULL,
  `qty` int UNSIGNED NOT NULL,
  `detail` mediumtext CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `thumbnail` varchar(1000) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `created_by` int UNSIGNED NOT NULL,
  `updated_by` int UNSIGNED DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `status` tinyint UNSIGNED NOT NULL,
  `stock` int NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `cdw1_product`
--

INSERT INTO `cdw1_product` (`id`, `category_id`, `brand_id`, `name`, `slug`, `content`, `description`, `price_buy`, `price_sale`, `qty`, `detail`, `thumbnail`, `created_at`, `updated_at`, `created_by`, `updated_by`, `deleted_at`, `status`, `stock`) VALUES
(2, 4, 5, 'Quýt Đường', 'san-pham-2', '<p>Nội dung sản phẩm số 2</p>', 'Mô tả ngắn gọn cho sản phẩm 2', 169, 227, 90, 'Chi tiết sản phẩm 2', 'Quyt-duong.webp', '2025-01-01 10:17:43', '2025-01-01 10:17:43', 1, NULL, NULL, 0, 100),
(3, 4, 5, 'Chuối Viba', 'san-pham-3', '<p>Nội dung sản phẩm số 3</p>', 'Mô tả ngắn gọn cho sản phẩm 3', 356, 445, 53, 'Chi tiết sản phẩm 3', 'fruite-item-3.jpg', '2025-01-01 10:17:43', '2025-01-01 10:17:43', 1, NULL, NULL, 0, 100),
(4, 4, 4, 'Dưa Hấu Không Hạt', 'san-pham-4', '<p>Nội dung sản phẩm số 4</p>', 'Mô tả ngắn gọn cho sản phẩm 4', 311, 376, 27, 'Chi tiết sản phẩm 4', 'dua-hau-khong-hat-5-3-min.jpg', '2025-01-01 10:17:43', '2025-01-01 10:17:43', 1, NULL, NULL, 0, 100),
(5, 4, 2, 'Hồng xiêm', 'san-pham-5', '<p>Nội dung sản phẩm số 5</p>', 'Mô tả ngắn gọn cho sản phẩm 5', 180, 252, 59, 'Chi tiết sản phẩm 5', 'dac-diem-cua-trai-hong-xiem.jpg', '2025-01-01 10:17:43', '2025-01-01 10:17:43', 1, NULL, NULL, 0, 100),
(6, 4, 3, 'Táo', 'san-pham-6', '<p>Nội dung sản phẩm số 6</p>', 'Mô tả ngắn gọn cho sản phẩm 6', 425, 486, 21, 'Chi tiết sản phẩm 6', 'fruite-item-6.jpg', '2025-01-01 10:17:43', '2025-01-01 10:17:43', 1, NULL, NULL, 0, 100),
(7, 5, 5, 'Cà chua Hà Lan', 'san-pham-7', '<p>Nội dung sản phẩm số 7</p>', 'Mô tả ngắn gọn cho sản phẩm 7', 384, 456, 38, 'Chi tiết sản phẩm 7', 'vegetable-item-1.jpg', '2025-01-01 10:17:43', '2025-01-01 10:17:43', 1, NULL, NULL, 0, 100),
(8, 5, 2, 'Quả chanh RD', 'san-pham-8', '<p>Nội dung sản phẩm số 8</p>', 'Mô tả ngắn gọn cho sản phẩm 8', 304, 369, 97, 'Chi tiết sản phẩm 8', 'Qua-canh-nghe.webp', '2025-01-01 10:17:43', '2025-01-01 10:17:43', 1, NULL, NULL, 1, 100),
(9, 5, 1, 'Dưa chuột RD', 'san-pham-9', '<p>Nội dung sản phẩm số 9</p>', 'Mô tả ngắn gọn cho sản phẩm 9', 289, 374, 55, 'Chi tiết sản phẩm 9', 'hat-giong-dua-chuot-leo.webp', '2025-01-01 10:17:43', '2025-01-01 10:17:43', 1, NULL, NULL, 1, 100),
(10, 5, 5, 'Hành khô Kinh Môn', 'san-pham-10', '<p>Nội dung sản phẩm số 10</p>', 'Mô tả ngắn gọn cho sản phẩm 10', 313, 405, 47, 'Chi tiết sản phẩm 10', 'cu-hanh-kho.webp', '2025-01-01 10:17:43', '2025-01-01 10:17:43', 1, NULL, NULL, 0, 100),
(11, 5, 2, 'Khoai tây RA', 'san-pham-11', '<p>Nội dung sản phẩm số 11</p>', 'Mô tả ngắn gọn cho sản phẩm 11', 147, 228, 87, 'Chi tiết sản phẩm 11', 'vegetable-item-5.jpg', '2025-01-01 10:17:43', '2025-01-01 10:17:43', 1, NULL, NULL, 1, 100),
(12, 5, 3, 'Rau mùi RD', 'san-pham-12', '<p>Nội dung sản phẩm số 12</p>', 'Mô tả ngắn gọn cho sản phẩm 12', 301, 398, 42, 'Chi tiết sản phẩm 12', 'vegetable-item-6.jpg', '2025-01-01 10:17:43', '2025-01-01 10:17:43', 1, NULL, NULL, 1, 100),
(13, 2, 5, 'Bánh mì sừng bò bột đông lạnh', 'san-pham-13', '<p>Nội dung sản phẩm số 13</p>', 'Mô tả ngắn gọn cho sản phẩm 13', 357, 408, 22, 'Chi tiết sản phẩm 13', 'banh-mi-sung-bo.webp', '2025-01-01 10:17:43', '2025-01-01 10:17:43', 1, NULL, NULL, 0, 100),
(14, 2, 3, 'Bánh Mì Cao Cấp Nhân Cốm Bisou', 'san-pham-14', '<p>Nội dung sản phẩm số 14</p>', 'Mô tả ngắn gọn cho sản phẩm 14', 211, 280, 35, 'Chi tiết sản phẩm 14', 'Bánh-mì-cao-cấp-nhân-cốm-Biscou-gói-55g.webp', '2025-01-01 10:17:43', '2025-01-01 10:17:43', 1, NULL, NULL, 1, 100),
(15, 2, 1, 'Bánh mì cuộn quế bột', 'san-pham-15', '<p>Nội dung sản phẩm số 15</p>', 'Mô tả ngắn gọn cho sản phẩm 15', 381, 469, 95, 'Chi tiết sản phẩm 15', 'cinamon-roll.01-nén.webp', '2025-01-01 10:17:43', '2025-01-01 10:17:43', 1, NULL, NULL, 0, 100),
(16, 2, 2, 'Bánh mì sừng bò nhỏ bột ', 'san-pham-16', '<p>Nội dung sản phẩm số 16</p>', 'Mô tả ngắn gọn cho sản phẩm 16', 387, 473, 32, 'Chi tiết sản phẩm 16', 'mini-croissant-.01-nén.webp', '2025-01-01 10:17:43', '2025-01-01 10:17:43', 1, NULL, NULL, 0, 100),
(17, 3, 2, 'Cánh Gà', 'san-pham-17', '<p>Nội dung sản phẩm số 17</p>', 'Mô tả ngắn gọn cho sản phẩm 17', 139, 209, 61, 'Chi tiết sản phẩm 17', 'Canh-Ga-Vietgap-Pham-Ton.webp', '2025-01-01 10:17:43', '2025-01-01 10:17:43', 1, NULL, NULL, 0, 100),
(19, 3, 3, 'Heo Ba Rọi', 'san-pham-19', '<p>Nội dung sản phẩm số 19</p>', 'Mô tả ngắn gọn cho sản phẩm 19', 443, 511, 39, 'Chi tiết sản phẩm 19', 'Heo-ba-roi-Vietgap-An-Ha.webp', '2025-01-01 10:17:43', '2025-01-01 10:17:43', 1, NULL, NULL, 0, 100),
(20, 3, 2, 'Cốt Lếch Heo Thảo Mộc', 'san-pham-20', '<p>Nội dung sản phẩm số 20</p>', 'Mô tả ngắn gọn cho sản phẩm 20', 425, 478, 75, 'Chi tiết sản phẩm 20', 'coc-let-heo.webp', '2025-01-01 10:17:43', '2025-01-01 10:17:43', 1, NULL, NULL, 0, 100),
(21, 3, 1, 'Bắp Bò Tây Ninh', 'Sản phẩm 123', 'ád', 'sad', 1231, 123, 12, '', 'Bap-bo-Tay-Ninh.webp', '2025-01-06 19:57:38', '2025-01-06 20:27:41', 12, NULL, NULL, 1, 100),
(24, 4, 1, 'Chuối Chín', 'chuoi-chin', 'traicayyyy', 'traicayyyy', 14, 0, 15, '', '20250219163241.jpg', '2025-02-19 09:31:09', '2025-02-19 09:33:18', 12, 12, '2025-02-19 09:33:18', 1, 0);

-- --------------------------------------------------------

--
-- Table structure for table `cdw1_sessions`
--

CREATE TABLE `cdw1_sessions` (
  `id` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_id` bigint UNSIGNED DEFAULT NULL,
  `ip_address` varchar(45) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `user_agent` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci,
  `payload` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `last_activity` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `cdw1_topic`
--

CREATE TABLE `cdw1_topic` (
  `id` bigint UNSIGNED NOT NULL,
  `name` varchar(1000) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `slug` varchar(1000) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `sort_order` int UNSIGNED NOT NULL,
  `description` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `created_by` int UNSIGNED NOT NULL,
  `updated_by` int UNSIGNED DEFAULT NULL,
  `status` tinyint UNSIGNED NOT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `cdw1_topic`
--

INSERT INTO `cdw1_topic` (`id`, `name`, `slug`, `sort_order`, `description`, `created_at`, `updated_at`, `created_by`, `updated_by`, `status`, `deleted_at`) VALUES
(1, 'Cẩm nang ẩm thực', 'chu-de-1', 1, 'Mô tả ngắn cho chủ đề 1', '2025-01-01 10:16:49', '2025-01-01 10:16:49', 1, NULL, 1, NULL),
(2, 'Tin tức', 'chu-de-2', 2, 'Mô tả ngắn cho chủ đề 2', '2025-01-01 10:16:49', '2025-01-01 10:16:49', 1, NULL, 1, NULL),
(3, 'Blog Sóng Xanh', 'chu-de-3', 3, 'Mô tả ngắn cho chủ đề 3', '2025-01-01 10:16:49', '2025-01-01 10:16:49', 1, NULL, 1, NULL),
(4, 'Chủ đề 4', 'chu-de-4', 4, 'Mô tả ngắn cho chủ đề 4', '2025-01-01 10:16:49', '2025-01-01 10:16:49', 1, NULL, 0, NULL),
(5, 'Chủ đề 5', 'chu-de-5', 5, 'Mô tả ngắn cho chủ đề 5', '2025-01-01 10:16:49', '2025-01-01 10:16:49', 1, NULL, 0, NULL),
(6, 'Chủ đề 6', 'chu-de-6', 6, 'Mô tả ngắn cho chủ đề 6', '2025-01-01 10:16:49', '2025-01-01 10:16:49', 1, NULL, 0, NULL),
(7, 'Chủ đề 7', 'chu-de-7', 7, 'Mô tả ngắn cho chủ đề 7', '2025-01-01 10:16:49', '2025-01-01 10:16:49', 1, NULL, 0, NULL),
(8, 'Chủ đề 8', 'chu-de-8', 8, 'Mô tả ngắn cho chủ đề 8', '2025-01-01 10:16:49', '2025-01-01 10:16:49', 1, NULL, 0, NULL),
(9, 'Chủ đề 9', 'chu-de-9', 9, 'Mô tả ngắn cho chủ đề 9', '2025-01-01 10:16:49', '2025-01-01 10:16:49', 1, NULL, 0, NULL),
(10, 'Chủ đề 10', 'chu-de-10', 10, 'Mô tả ngắn cho chủ đề 10', '2025-01-01 10:16:49', '2025-01-01 10:16:49', 1, NULL, 0, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `cdw1_user`
--

CREATE TABLE `cdw1_user` (
  `id` bigint UNSIGNED NOT NULL,
  `name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `password` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `fullname` varchar(15) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '',
  `gender` varchar(1000) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'male',
  `thumbnail` varchar(1000) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email` varchar(1000) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `phone` varchar(1000) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `address` varchar(1000) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `roles` enum('admin','customer') CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'customer',
  `created_by` int UNSIGNED NOT NULL DEFAULT '1',
  `updated_by` int UNSIGNED DEFAULT NULL,
  `status` tinyint UNSIGNED NOT NULL DEFAULT '1',
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `remember_token` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `login_attempts` int NOT NULL DEFAULT '0',
  `locked_until` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `cdw1_user`
--

INSERT INTO `cdw1_user` (`id`, `name`, `password`, `fullname`, `gender`, `thumbnail`, `email`, `email_verified_at`, `phone`, `address`, `roles`, `created_by`, `updated_by`, `status`, `deleted_at`, `created_at`, `updated_at`, `remember_token`, `login_attempts`, `locked_until`) VALUES
(1, 'user1', '$2y$12$M7mI0EGF6NEPyURN6bL8pOkBWNNd.MU40/O3ffX/iCamqxymYWKni', 'Full Name 1', 'female', 'user-thumbnail-1.jpg', 'user1@example.com', '2025-01-01 10:16:49', '0123456781', 'Address 1', 'customer', 1, NULL, 1, NULL, '2025-01-01 10:16:49', '2025-01-01 10:16:49', NULL, 0, NULL),
(2, 'user2', '$2y$12$M7mI0EGF6NEPyURN6bL8pOkBWNNd.MU40/O3ffX/iCamqxymYWKni', 'Full Name 2', 'female', 'user-thumbnail-2.jpg', 'user2@example.com', '2025-01-01 10:16:50', '0123456782', 'Address 2', 'customer', 1, NULL, 1, NULL, '2025-01-01 10:16:50', '2025-01-01 10:16:50', NULL, 0, NULL),
(3, 'user3', '$2y$12$Xv5BASfJgL3ydIyMYu0WB.zFcHi/k2VDrAnu8zaBoA3b5kiu56E4.', 'Full Name 3', 'other', 'user-thumbnail-3.jpg', 'user3@example.com', '2025-01-01 10:16:50', '0123456783', 'Address 3', 'customer', 1, NULL, 1, '2025-02-23 00:02:43', '2025-01-01 10:16:50', '2025-02-23 00:02:43', NULL, 0, NULL),
(4, 'user4', '$2y$12$L1Fqu.kvZruEk7lqv6M1C.vIVf5a/IZ0hpSaf43cpx0fPhOFGo5oO', 'Full Name 4', 'female', 'user-thumbnail-4.jpg', 'user4@example.com', '2025-01-01 10:16:50', '0123456784', 'Address 4', 'customer', 1, NULL, 1, NULL, '2025-01-01 10:16:50', '2025-01-01 10:16:50', NULL, 0, NULL),
(5, 'user5', '$2y$12$qG6HS7sKwVaDASLRBVilNuddZASiqHb24vpfdYKftF0Ce5TIB9GvW', 'Full Name 5', 'male', 'user-thumbnail-5.jpg', 'user5@example.com', '2025-01-01 10:16:51', '0123456785', 'Address 5', 'customer', 1, NULL, 1, NULL, '2025-01-01 10:16:51', '2025-01-01 10:16:51', NULL, 0, NULL),
(6, 'user6', '$2y$12$gnua0ecHT2FO3wBTf.mxOufiBUol46eB8FvsAgnci/Op6Z/ybYYCm', 'Full Name 6', 'other', 'user-thumbnail-6.jpg', 'user6@example.com', '2025-01-01 10:16:51', '0123456786', 'Address 6', 'admin', 1, NULL, 0, NULL, '2025-01-01 10:16:51', '2025-01-01 10:16:51', NULL, 0, NULL),
(7, 'user7', '$2y$12$IlxF5cZa/kS2qVwyGOOulOgFqtEEoNZhjR31tlE2tpoksFdA7RY6i', 'Full Name 7', 'other', 'user-thumbnail-7.jpg', 'user7@example.com', '2025-01-01 10:16:51', '0123456787', 'Address 7', 'admin', 1, NULL, 0, NULL, '2025-01-01 10:16:51', '2025-01-01 10:16:51', NULL, 0, NULL),
(8, 'user8', '$2y$12$dkezOmwznxSTIZ/dPRW64.gxY7zbf9AB8n0FmtLfGvG3ZBdUvDgOO', 'Full Name 8', 'other', 'user-thumbnail-8.jpg', 'user8@example.com', '2025-01-01 10:16:51', '0123456788', 'Address 8', 'customer', 1, NULL, 1, NULL, '2025-01-01 10:16:51', '2025-01-01 10:16:51', NULL, 0, NULL),
(9, 'user9', '$2y$12$9c11vFfcYMsh7NenpLJtnOq9Ff364yf.bkRa0libhkGvd0nxgMly2', 'Full Name 9', 'other', 'user-thumbnail-9.jpg', 'user9@example.com', '2025-01-01 10:16:52', '0123456789', 'Address 9', 'admin', 1, NULL, 0, NULL, '2025-01-01 10:16:52', '2025-01-01 10:16:52', NULL, 0, NULL),
(10, 'user10', '$2y$12$PfCuHfOVbymuU2bnBN4OY.GwHxqA3lmWETh8OeQuLkE65h1Nkjscu', 'Full Name 10', 'other', 'user-thumbnail-10.jpg', 'user10@example.com', '2025-01-01 10:16:52', '01234567810', 'Address 10', 'customer', 1, NULL, 1, '2025-02-19 09:39:40', '2025-01-01 10:16:52', '2025-02-19 09:39:40', NULL, 0, NULL),
(12, 'datnguyen', '$2y$12$spGPsZlYn8zU6EcTUkjkyeoPC2X4riGxCZ26Ns80TrVLTFBf3V1E6', 'nguyeendat', 'male', 'default-thumbnail.jpg', 'dat48421@gmail.com', NULL, '0845553994', NULL, 'admin', 1, 1, 1, NULL, '2025-01-06 04:18:17', '2025-01-06 04:44:31', NULL, 0, NULL),
(18, 'dat dat', '$2y$12$gullykURnCsi.8w0O2wBEOpd5NKOaDqejs30RLB9pMSH/zq61tKMy', 'Phát Đạt', 'male', '20250219163851.jpg', 'fat@gmail.com', NULL, NULL, NULL, 'admin', 1, 12, 1, NULL, '2025-01-06 21:31:34', '2025-02-19 09:38:51', NULL, 0, NULL),
(32, 'fatdat04', '$2y$12$aBarXXCjBaXgZUZD1YFUbup1UEtue0MlQgCHpNWAyZp.ZFh5ToJLa', 'Nguyễn Phát Đạt', 'male', NULL, 'dat@gmail.com', NULL, '0781651616', 'Tăng nhơn phú', 'customer', 30, 32, 2, NULL, '2025-02-18 02:27:58', '2025-02-23 01:09:30', NULL, 4, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `cdw1_users`
--

CREATE TABLE `cdw1_users` (
  `id` bigint UNSIGNED NOT NULL,
  `name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `login_attempts` int NOT NULL DEFAULT '0',
  `locked_until` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `cdw1_banner`
--
ALTER TABLE `cdw1_banner`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `cdw1_brand`
--
ALTER TABLE `cdw1_brand`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `cdw1_cache`
--
ALTER TABLE `cdw1_cache`
  ADD PRIMARY KEY (`key`);

--
-- Indexes for table `cdw1_cache_locks`
--
ALTER TABLE `cdw1_cache_locks`
  ADD PRIMARY KEY (`key`);

--
-- Indexes for table `cdw1_category`
--
ALTER TABLE `cdw1_category`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `cdw1_contact`
--
ALTER TABLE `cdw1_contact`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `cdw1_failed_jobs`
--
ALTER TABLE `cdw1_failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `cdw1_failed_jobs_uuid_unique` (`uuid`);

--
-- Indexes for table `cdw1_jobs`
--
ALTER TABLE `cdw1_jobs`
  ADD PRIMARY KEY (`id`),
  ADD KEY `cdw1_jobs_queue_index` (`queue`);

--
-- Indexes for table `cdw1_job_batches`
--
ALTER TABLE `cdw1_job_batches`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `cdw1_menu`
--
ALTER TABLE `cdw1_menu`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `cdw1_migrations`
--
ALTER TABLE `cdw1_migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `cdw1_order`
--
ALTER TABLE `cdw1_order`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `cdw1_orderdetail`
--
ALTER TABLE `cdw1_orderdetail`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `cdw1_password_reset_tokens`
--
ALTER TABLE `cdw1_password_reset_tokens`
  ADD PRIMARY KEY (`email`);

--
-- Indexes for table `cdw1_post`
--
ALTER TABLE `cdw1_post`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `cdw1_product`
--
ALTER TABLE `cdw1_product`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `cdw1_sessions`
--
ALTER TABLE `cdw1_sessions`
  ADD PRIMARY KEY (`id`),
  ADD KEY `cdw1_sessions_user_id_index` (`user_id`),
  ADD KEY `cdw1_sessions_last_activity_index` (`last_activity`);

--
-- Indexes for table `cdw1_topic`
--
ALTER TABLE `cdw1_topic`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `cdw1_user`
--
ALTER TABLE `cdw1_user`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `cdw1_users`
--
ALTER TABLE `cdw1_users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `cdw1_users_email_unique` (`email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `cdw1_banner`
--
ALTER TABLE `cdw1_banner`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `cdw1_brand`
--
ALTER TABLE `cdw1_brand`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `cdw1_category`
--
ALTER TABLE `cdw1_category`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `cdw1_contact`
--
ALTER TABLE `cdw1_contact`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT for table `cdw1_failed_jobs`
--
ALTER TABLE `cdw1_failed_jobs`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `cdw1_jobs`
--
ALTER TABLE `cdw1_jobs`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `cdw1_menu`
--
ALTER TABLE `cdw1_menu`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=34;

--
-- AUTO_INCREMENT for table `cdw1_migrations`
--
ALTER TABLE `cdw1_migrations`
  MODIFY `id` int UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=33;

--
-- AUTO_INCREMENT for table `cdw1_order`
--
ALTER TABLE `cdw1_order`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT for table `cdw1_orderdetail`
--
ALTER TABLE `cdw1_orderdetail`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=33;

--
-- AUTO_INCREMENT for table `cdw1_post`
--
ALTER TABLE `cdw1_post`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `cdw1_product`
--
ALTER TABLE `cdw1_product`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- AUTO_INCREMENT for table `cdw1_topic`
--
ALTER TABLE `cdw1_topic`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `cdw1_user`
--
ALTER TABLE `cdw1_user`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=35;

--
-- AUTO_INCREMENT for table `cdw1_users`
--
ALTER TABLE `cdw1_users`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

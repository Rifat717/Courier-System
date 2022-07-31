-- phpMyAdmin SQL Dump
-- version 4.9.7
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Aug 01, 2022 at 01:39 AM
-- Server version: 5.7.39
-- PHP Version: 7.4.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `godelive_courier`
--

-- --------------------------------------------------------

--
-- Table structure for table `area_infos`
--

CREATE TABLE `area_infos` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `area_name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `area_infos`
--

INSERT INTO `area_infos` (`id`, `area_name`, `status`, `created_at`, `updated_at`) VALUES
(1, 'Dhanmonddi', 'a', NULL, NULL),
(2, 'Mirpur', 'a', NULL, NULL),
(3, 'Kollanpur', 'a', NULL, NULL),
(4, 'Shaymoli', 'i', NULL, NULL);

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
(1, '2022_01_11_052053_create_user_types_table', 1),
(2, '2022_01_23_050707_create_user_infos_table', 2),
(3, '2022_01_24_063202_create_area_infos_table', 3),
(4, '2022_01_24_073701_create_product_types_table', 4),
(5, '2022_01_24_110842_create_product_categories_table', 5),
(6, '2022_01_24_114533_create_product_infos_table', 6),
(7, '2022_01_25_071849_create_persell_infos_table', 7);

-- --------------------------------------------------------

--
-- Table structure for table `persell_infos`
--

CREATE TABLE `persell_infos` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `product_type_id` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `product_cate_id` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_info_id` int(11) NOT NULL,
  `create_by` int(11) NOT NULL,
  `coustomer_name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `coustomer_phone` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `coustomer_email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `customer_address` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `zone` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `area_id` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `cash_amount` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `product_price` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `delivery_type` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `weight` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `delivery_status` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'pending',
  `received_by` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `persell_infos`
--

INSERT INTO `persell_infos` (`id`, `product_type_id`, `product_cate_id`, `user_info_id`, `create_by`, `coustomer_name`, `coustomer_phone`, `coustomer_email`, `customer_address`, `zone`, `area_id`, `cash_amount`, `product_price`, `delivery_type`, `weight`, `delivery_status`, `received_by`, `created_at`, `updated_at`) VALUES
(2, 'Liqued', 'test', 12, 12, 'new customer', '01632594374', 'rifat@quintetalliance.com', 'Mirpur', 'north', 'Dhanmonddi', '1222', '1000', 'cod', '500gm', 'delivered', NULL, NULL, NULL),
(3, 'Brokenable', 'test', 7, 7, 'new Marchant', '+8801893470112', 'new@gmail.com', 'Dhanmondi, Dhaka', 'north', 'Mirpur', '1000', '1000', 'delivery', '1kg', 'Rider Assigned For PicUp', '20', NULL, NULL),
(4, 'Hard', 'test', 14, 14, 'Mr. Motion', '01632594374', 'test@gmail.com', 'Mirpur', 'north', 'Mirpur', '1222', '1000', 'cod', '500gm', 'Rider Assigned For PicUp', '21', NULL, NULL),
(5, 'Liqued', 'test', 14, 14, 'test', 'test', 'test@gmail.com', 'Mirpur', 'north', 'Mirpur', '1222', '1000', 'cod', '500gm', 'Rider Assigned For PicUp', '20', NULL, NULL),
(6, 'Liqued', 'Electronics', 15, 15, 'Jack', '01632594374', 'jack@gmail.com', 'Mirpur', 'north', 'Mirpur', '1000', '950', 'cod', '1kg', 'Rider Assigned For PicUp', '20', NULL, NULL),
(7, 'Liqued', 'test', 16, 16, 'new customer', '01632594374', 'rifat@quintetalliance.com', 'Mirpur', 'south', 'Dhanmonddi', '1222', '1000', 'cod', '500gm', 'Rider Assigned For PicUp', '21', NULL, NULL),
(8, 'Hard', 'Electronics', 17, 17, 'test', '54554454', 'test@jkjjkhhh', 'dhanmondi', 'south', 'Dhanmonddi', '7000', '7000', 'cod', '500gm', 'delivered', NULL, NULL, NULL),
(9, 'Hard', 'test', 18, 18, 'Rifat', '01670171255', 'mitul06@hotmail.com', '33/A', 'north', 'Dhanmonddi', '305', '300', 'cod', '500gm', 'Rider Assigned For PicUp', '20', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `product_categories`
--

CREATE TABLE `product_categories` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `product_category_name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `product_categories`
--

INSERT INTO `product_categories` (`id`, `product_category_name`, `created_at`, `updated_at`) VALUES
(2, 'test', NULL, NULL),
(3, 'Electronics', NULL, NULL),
(4, 'Cloth', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `product_infos`
--

CREATE TABLE `product_infos` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `product_type_id` int(11) NOT NULL,
  `product_category_id` int(11) NOT NULL,
  `product_name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `product_short_desc` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `product_desc` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `product_infos`
--

INSERT INTO `product_infos` (`id`, `product_type_id`, `product_category_id`, `product_name`, `product_short_desc`, `product_desc`, `status`, `created_at`, `updated_at`) VALUES
(1, 3, 2, 'Iphone 12', 'wew1', 'this long desc', 'a', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `product_types`
--

CREATE TABLE `product_types` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `product_type_name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `product_types`
--

INSERT INTO `product_types` (`id`, `product_type_name`, `created_at`, `updated_at`) VALUES
(2, 'Liqued', NULL, NULL),
(3, 'Hard', NULL, NULL),
(4, 'Brokenable', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `user_infos`
--

CREATE TABLE `user_infos` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_type_id` int(11) DEFAULT NULL,
  `user_name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_password` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_full_name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_phone` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_address` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_company_info` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `user_company_address` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `user_company_phone` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `user_company_email` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `nid_no` varchar(20) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `trade_license` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `user_status` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `user_infos`
--

INSERT INTO `user_infos` (`id`, `user_type_id`, `user_name`, `user_password`, `user_full_name`, `user_phone`, `user_email`, `user_address`, `user_company_info`, `user_company_address`, `user_company_phone`, `user_company_email`, `nid_no`, `trade_license`, `user_status`, `created_at`, `updated_at`) VALUES
(6, 14, 'Rifat Admin', '12345', 'maksud rifat', '01632594374', 'rifat@quintetalliance.com', 'Mirpur', 'QAPL', 'Mirpur', '+8801893470112', 'rifat@gmail.com', '4653142309', '123456789', 'a', NULL, NULL),
(7, 3, 'Rifatwewe', '12345', 'maksud rifat', '016325943742', 'rifat@quintetalliance.com', 'Mirpur', 'QAPL', 'Dhanmondi, Dhaka', '+8801893470112', 'rifat@quintetalliance.com', '2222222', '1212121212', 'a', NULL, NULL),
(12, 3, 'test', '123456', 'test', '016325943741', 'rifat@quintetalliance.com', 'Mirpur', 'test', 'Mirpur', '01632594374', 'rifat@quintetalliance.com', '4653142309', '1212121212', 'a', NULL, NULL),
(13, 3, 'toys_site', '123456', 'toy', '123456789', 'user@gmail.com', 'Gulshan', 'Toy shop', 'Gulshan', '1122334455', 'toy@gmail.com', '111111111111', '987654321', 'a', NULL, NULL),
(14, 3, 'Kazioffice', 'officework', 'Kazi Ayon Nur', '+8801893470115', 'ayon@quintetalliance', '33/a Dhanmondi 7', 'Clothing Store', '33/a Dhanmondi 7', '+8801893470115', 'ayon@quintetalliance', '12321321432143213', '21321432143214321', 'a', NULL, NULL),
(15, 3, 'Rifat', 'rifat', 'Md. Maksud Alam Rifat', '+8801893470112', 'rifat@quintetalliance.com', 'Lilyrin tower, Level 1, Building- 39, Dhanmondi 2', 'Pretom Burger', 'Lilyrin tower, Level 1, Building- 39, Dhanmondi 2', '+8801893470112', 'rifat@quintetalliance.com', '2222222', '1515151', 'a', NULL, NULL),
(16, 3, 'Mitul', '110075', 'Md Istiaque Hossain', '01670171255', 'mitul1plus68@gmail.com', '33/a Dhanmondi 7', 'QAPL', 'QAPL', '01670171255', 'mitul1plus68@gmail.com', '1233444', '1234445', 'a', NULL, NULL),
(17, 3, 'test', '12345', 'test', '11111111111', 'test@gmail.com', 'test', 'test', 'test', '21212121', 'test@gmail.com', '5454545', '545454', 'a', NULL, NULL),
(18, 3, 'Rony', '123456', 'Rony123', '01670171255', 'rony@gmail.com', '33/A, Road 07 Dhanmondi', 'AR Enterprice', 'AR Enterprice', '01893470100', '1234', '1234', '12345', 'a', NULL, NULL),
(20, 15, 'test Rider', '12345', 'test Rider', '123456789', 'rider@gmail.com', 'Dhanmonddi', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(21, 15, 'New Rider', '54321', 'New Rider', '11111111111', 'newrider@gmail.com', 'Shaymoli', NULL, NULL, NULL, NULL, NULL, NULL, 'a', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `user_types`
--

CREATE TABLE `user_types` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_type_name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` varchar(11) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `user_types`
--

INSERT INTO `user_types` (`id`, `user_type_name`, `status`, `created_at`, `updated_at`) VALUES
(2, 'Admin', 'a', NULL, NULL),
(3, 'Marchent', 'a', NULL, NULL),
(13, 'Manager', 'i', NULL, NULL),
(14, 'Supper Admin', 'a', NULL, NULL),
(15, 'Rider', 'a', NULL, NULL);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `area_infos`
--
ALTER TABLE `area_infos`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `persell_infos`
--
ALTER TABLE `persell_infos`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `product_categories`
--
ALTER TABLE `product_categories`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `product_infos`
--
ALTER TABLE `product_infos`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `product_types`
--
ALTER TABLE `product_types`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user_infos`
--
ALTER TABLE `user_infos`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user_types`
--
ALTER TABLE `user_types`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `area_infos`
--
ALTER TABLE `area_infos`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `persell_infos`
--
ALTER TABLE `persell_infos`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `product_categories`
--
ALTER TABLE `product_categories`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `product_infos`
--
ALTER TABLE `product_infos`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `product_types`
--
ALTER TABLE `product_types`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `user_infos`
--
ALTER TABLE `user_infos`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT for table `user_types`
--
ALTER TABLE `user_types`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

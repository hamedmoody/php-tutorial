-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Feb 21, 2025 at 11:26 AM
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
-- Database: `cartshop`
--

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

DROP TABLE IF EXISTS `products`;
CREATE TABLE `products` (
  `ID` bigint UNSIGNED NOT NULL,
  `title` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `thumbnail` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `stock` int NOT NULL,
  `price` bigint UNSIGNED NOT NULL,
  `sale_price` bigint UNSIGNED NOT NULL,
  `sale_price_expire` datetime DEFAULT NULL,
  `sale_count` int UNSIGNED NOT NULL DEFAULT '0',
  `sale_amount` bigint NOT NULL DEFAULT '0',
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL,
  `last_sale_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`ID`, `title`, `thumbnail`, `stock`, `price`, `sale_price`, `sale_price_expire`, `sale_count`, `sale_amount`, `created_at`, `updated_at`, `last_sale_at`) VALUES
(1, 'لپ تاپ 15.6 اینچی لنوو مدل IdeaPad Slim 3 15IRU8-i3 1315U-8GB LPDDR5-256GB SSD-TN', 'uploads/fbaad557b08bff79e4203da678cb57c20400dfc7_1727285957.webp', 12, 15000, 12000, '2025-02-12 17:18:35', 0, 0, '2025-02-10 13:48:35', '2025-02-10 13:48:35', NULL),
(2, 'لپ تاپ 12.4 اینچی مایکروسافت مدل Surface Laptop Go 2-i5 1135G7 8GB 128SSD', 'uploads/cd3bb35488030e01b5a60c0acf77f2d182f92df4_1712408595.webp', 25, 20000, 15000, NULL, 0, 0, '2025-02-10 14:14:31', '2025-02-10 14:14:31', NULL),
(3, 'لپ تاپ 15.6 اینچی ام اس آی مدل Thin 15 B12UCX-i5 12450H-16GB DDR4-500GB SSD-RTX2050-FHD', 'uploads/d5871f987049e67d857cb0f25b199b732b5e3d96_1730199224.webp', 5, 17000, 16000, NULL, 0, 0, '2025-02-10 14:15:28', '2025-02-10 14:15:28', NULL),
(4, 'لپ تاپ 15.6 اینچی ایسوس مدل Vivobook X1504VA-NJ816-i3 1315U 4GB 512SSD', 'uploads/f18461946289bf8b15487a5dd90fe5edecbff7d4_1716047399.webp', 5, 14000, 0, NULL, 0, 0, '2025-02-10 14:16:10', '2025-02-10 14:16:10', NULL),
(5, 'لپ تاپ 15.3 اینچی اپل مدل MacBook Air MXD33 2024 LLA-M3-16GB RAM-512GB SSD', 'uploads/e75d69cc408ea9d99fee43cd8e3229fa6e57f06a_1723653904.webp', 56, 15500, 10000, '2025-02-19 17:46:46', 0, 0, '2025-02-10 14:16:46', '2025-02-10 14:16:46', NULL),
(6, 'لپ تاپ 15.6 اینچی اچ‌ پی مدل Victus 15-FB2063DX-R5 7535HS-8GB DDR5-512GB SSD-RX6550M-FHD-W', 'uploads/0770d1b82583fc3b8c10ee2cd4e389727461cc91_1732913841.webp', 17, 16000, 14000, '2025-02-17 17:47:30', 0, 0, '2025-02-10 14:17:30', '2025-02-10 14:17:30', NULL),
(7, 'لپ تاپ 16 اینچی لنوو مدل Legion Pro 5 16IRX9-i7 14650HX-16GB DDR5-1TB SSD-RTX4060-QHD 240Hz', 'uploads/ea953b4b66183f3d8b6c57f74c15edcc5b1c67c8_1710317709.webp', 4, 17500, 15000, NULL, 0, 0, '2025-02-10 14:18:31', '2025-02-10 14:18:31', NULL),
(8, 'لپ تاپ 15.6 اینچی لنوو مدل IdeaPad 1 15AMN7-Athlon Silver 7120U-8GB LPDDR5-512GB SSD-TN - کاستوم شده', 'uploads/5b7e0bcd93509891548f36ce6c4f1955f23728f7_1731403159.webp', 2, 18000, 15000, '2025-02-28 17:49:50', 0, 0, '2025-02-10 14:19:50', '2025-02-10 14:19:50', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

DROP TABLE IF EXISTS `users`;
CREATE TABLE `users` (
  `ID` bigint UNSIGNED NOT NULL,
  `username` varchar(40) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(40) COLLATE utf8mb4_unicode_ci NOT NULL,
  `first_name` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `last_name` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `order_count` bigint UNSIGNED NOT NULL DEFAULT '0',
  `order_amount` bigint UNSIGNED NOT NULL DEFAULT '0',
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`ID`, `username`, `password`, `first_name`, `last_name`, `order_count`, `order_amount`, `created_at`, `updated_at`) VALUES
(1, 'hamedmoody', '123456789', 'حامد', 'مودی', 0, 0, '2025-02-10 13:40:05', '2025-02-10 13:40:05'),
(2, 'alirostami', '123456789', 'علی', 'رستمی', 0, 0, '2025-02-10 13:40:28', '2025-02-10 13:40:28');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`ID`),
  ADD KEY `username` (`username`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `ID` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `ID` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 13, 2026 at 07:44 PM
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
-- Database: `codealpha_shop`
--

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `id` int(11) NOT NULL,
  `product_names` text NOT NULL,
  `total_price` decimal(10,2) NOT NULL,
  `shipping_method` varchar(50) DEFAULT NULL,
  `order_date` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`id`, `product_names`, `total_price`, `shipping_method`, `order_date`) VALUES
(1, 'Responsive Design Pro', 29.99, NULL, '2026-05-11 16:43:15'),
(2, 'Responsive Design Pro', 29.99, NULL, '2026-05-11 16:43:26'),
(3, 'UI/UX Glassmorphism Kit', 19.99, NULL, '2026-05-11 16:43:31'),
(4, 'Expert Full Stack Bundle, Backend Logic Masterclass', 89.98, NULL, '2026-05-11 16:46:26'),
(5, 'Backend Logic Masterclass', 39.99, NULL, '2026-05-11 17:58:57'),
(6, 'UI/UX Glassmorphism Kit, Responsive Design Pro, UI/UX Glassmorphism Kit', 69.97, NULL, '2026-05-11 18:00:27'),
(7, 'Expert Full Stack Bundle', 49.99, NULL, '2026-05-11 18:04:39'),
(8, 'Responsive Design Pro', 29.99, NULL, '2026-05-11 18:04:50'),
(9, 'Responsive Design Pro', 29.99, 'Standard', '2026-05-11 18:09:03'),
(10, 'Backend Logic Masterclass', 54.99, 'Express', '2026-05-11 18:09:20'),
(11, 'Backend Logic Masterclass', 39.99, 'Standard', '2026-05-11 18:12:18'),
(12, 'iPhone 15 Pro Max, Expert Full Stack Bundle', 1263.99, 'Express', '2026-05-12 17:40:53'),
(13, 'Responsive Design Pro', 29.99, 'Standard', '2026-05-13 17:39:46');

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `price` decimal(10,2) NOT NULL,
  `image` varchar(500) NOT NULL,
  `image_url` varchar(500) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`id`, `name`, `price`, `image`, `image_url`) VALUES
(1, 'Smart Watch Series 9', 399.99, 'https://picsum.photos', 'https://images.unsplash.com/photo-1523275335684-37898b6baf30?w=400'),
(2, 'iPhone 15 Pro Max', 1199.00, 'https://picsum.photos', 'https://images.unsplash.com/photo-1695048133142-1a20484d2569?w=400'),
(3, 'iPhone 15 Pro Max', 1199.00, 'https://picsum.photos', 'https://images.unsplash.com/photo-1695048133142-1a20484d2569?w=400'),
(4, 'MacBook Pro M3', 1999.00, 'https://picsum.photos', 'https://images.unsplash.com/photo-1517336714731-489689fd1ca8?w=400'),
(5, 'Expert Full Stack Bundle', 49.99, 'https://picsum.photos', 'https://images.unsplash.com/photo-1587831990711-23ca6441447b?w=400'),
(6, 'Responsive Design Pro', 29.99, 'https://picsum.photos', 'https://images.unsplash.com/photo-1547658719-da2b51169166?w=400'),
(7, 'Backend Logic Masterclass', 39.99, 'https://picsum.photos', 'https://images.unsplash.com/photo-1555066931-4365d14bab8c?w=400'),
(8, 'UI/UX Glassmorphism Kit', 19.99, 'https://picsum.photos', 'https://images.unsplash.com/photo-1561070791-2526d30994b5?w=400'),
(9, 'Terminal Added Item', 99.99, 'https://picsum.photos', 'https://images.unsplash.com/photo-1505740420928-5e560c06d30e?w=400'),
(10, 'Expert Full Stack Bundle', 49.99, 'https://picsum.photos', 'https://images.unsplash.com/photo-1587831990711-23ca6441447b?w=400'),
(11, 'Responsive Design Pro', 29.99, 'https://picsum.photos', 'https://images.unsplash.com/photo-1547658719-da2b51169166?w=400'),
(12, 'Backend Logic Masterclass', 39.99, 'https://picsum.photos', 'https://images.unsplash.com/photo-1555066931-4365d14bab8c?w=400'),
(13, 'UI/UX Glassmorphism Kit', 19.99, 'https://picsum.photos', 'https://images.unsplash.com/photo-1561070791-2526d30994b5?w=400');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `full_name` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `password` varchar(255) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `full_name`, `email`, `password`, `created_at`) VALUES
(1, 'Namra Javed', 'namra122001@gmail.com', '$2y$10$H5vR9yJ6JpfbJxt2xnhyIu5o8aHKbQVamtSIDaDI93XZ1VD.d1wmu', '2026-05-11 17:55:33'),
(2, 'bandar', 'bandar123@gmail.com', '$2y$10$PvgYRXYv/5NAhXQE1k2Ut.KJZTwBDAk/kgsQYLsD353PBp2R2/rnm', '2026-05-11 17:59:31'),
(8, 'khoty', 'khoty123@gmai.com', '$2y$10$rUeUE4ZehpqAi.yVLGMsYOcVBlWqrUAVXgcRyc0asSmBiaye5MLUe', '2026-05-11 18:17:57'),
(9, 'umar kutta', 'kutta@gamil.com', '$2y$10$zQB91W5Ql14xLtH8CRnn4ebRwmDjSEHZYQjXEnRVaqk3AbnT2RRZG', '2026-05-12 17:39:05');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `email` (`email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

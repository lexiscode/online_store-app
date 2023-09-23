-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 28, 2023 at 02:03 PM
-- Server version: 10.4.27-MariaDB
-- PHP Version: 8.2.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `web_shop`
--

-- --------------------------------------------------------

--
-- Table structure for table `cart`
--

CREATE TABLE `cart` (
  `id` int(11) NOT NULL,
  `name` varchar(125) NOT NULL,
  `price` varchar(125) NOT NULL,
  `image` varchar(125) DEFAULT NULL,
  `quantity` varchar(125) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `cart`
--

INSERT INTO `cart` (`id`, `name`, `price`, `image`, `quantity`) VALUES
(1, 'Plantain Chips', '35', 'food-6-13.png', '1');

-- --------------------------------------------------------

--
-- Table structure for table `category`
--

CREATE TABLE `category` (
  `id` int(11) NOT NULL,
  `name` varchar(125) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `category`
--

INSERT INTO `category` (`id`, `name`) VALUES
(3, 'Drinks'),
(1, 'Foods');

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `id` int(11) NOT NULL,
  `name` varchar(125) NOT NULL,
  `number` varchar(125) NOT NULL,
  `email` varchar(125) NOT NULL,
  `method` varchar(125) NOT NULL,
  `street` varchar(125) NOT NULL,
  `city` varchar(125) NOT NULL,
  `state` varchar(125) NOT NULL,
  `country` varchar(125) NOT NULL,
  `total_products` varchar(125) NOT NULL,
  `total_price` varchar(125) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`id`, `name`, `number`, `email`, `method`, `street`, `city`, `state`, `country`, `total_products`, `total_price`) VALUES
(5, 'Nwokorie Alex', '07021701804', 'nwokoriealex@gmail.com', 'cash on delivery', '2 Olorunfunmi', 'Bariga', 'Abuja', 'Nigeria', 'Cheese (2) , Burger (3) , Coca Cola (5) ', '180'),
(6, 'Elena Victoria', '07025805804', 'vikky_elena@gmail.com', 'credit card', '20 Oke-Ado', 'Ikoyi', 'Lagos', 'Nigeria', 'Coca Cola (1) , Burger (3) ', '70'),
(8, 'Elina Chifeac', '0802829293', 'elina_chifeac@yahoo.com', 'cash on delivery', '20 clinton', 'Ikoyi', 'Lagos', 'Italy', 'Cheese (2) , Burger (3) ', '100'),
(9, 'Hennadii Shvedko', '09031929292', 'hennadii@gmail.com', 'cash on delivery', '33 Collins Avenue', 'Ankara', 'Istanbul', 'Turkey', 'Burger (3) , Cheese (1) , Plantain Chips (2) ', '110');

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `id` int(11) NOT NULL,
  `name` varchar(125) NOT NULL,
  `price` varchar(125) NOT NULL,
  `image` varchar(125) DEFAULT NULL,
  `description` text DEFAULT NULL,
  `category_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`id`, `name`, `price`, `image`, `description`, `category_id`) VALUES
(37, 'Burger', '15', 'food-1-12.png', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Vestibulum auctor volutpat neque, in blandit odio interdum eu. Nulla facilisi. Integer facilisis orci ligula, a finibus risus luctus in.', 1),
(39, 'Coca Cola', '10', 'food-5-2.png', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Vestibulum auctor volutpat neque, in blandit odio interdum eu. Nulla facilisi. Integer facilisis orci ligula, a finibus risus luctus in. ', 3),
(42, 'Plantain Chips', '35', 'food-6-13.png', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Vestibulum auctor volutpat neque, in blandit odio interdum eu. Nulla facilisi. Integer facilisis orci ligula, a finibus risus luctus in. ', 1),
(44, 'Corona', '25', 'corona.jpg', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Vestibulum auctor volutpat neque, in blandit odio interdum eu. Nulla facilisi. Integer facilisis orci ligula, a finibus risus luctus in.', 3),
(45, 'Strawberry', '15', 'Strawberry.webp', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Vestibulum auctor volutpat neque, in blandit odio interdum eu. Nulla facilisi. Integer facilisis orci ligula, a finibus risus luctus in.', 3);

-- --------------------------------------------------------

--
-- Table structure for table `reviews`
--

CREATE TABLE `reviews` (
  `id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `customer_name` varchar(255) NOT NULL,
  `comment` text NOT NULL,
  `image_url` varchar(500) DEFAULT NULL,
  `rating` float NOT NULL,
  `review_date` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `reviews`
--

INSERT INTO `reviews` (`id`, `product_id`, `customer_name`, `comment`, `image_url`, `rating`, `review_date`) VALUES
(11, 37, 'Elina Chifeac', 'It\'s Yummyyyy! I love it!', 'https://media.licdn.com/dms/image/C4D03AQGaaZfVWwSIpQ/profile-displayphoto-shrink_800_800/0/1620029788269?e=2147483647&v=beta&t=JFBgaTZGgrsS9zJ8j-HlAxMQ42naLP2meTjjaL2VFwI', 4.5, '2023-07-24 03:04:29'),
(12, 42, 'Hennadii Shvedko', 'Mehn!!! This chips tastes so Good!', 'https://avatars.githubusercontent.com/u/7961682?v=4', 4.7, '2023-07-24 03:11:49'),
(14, 39, 'Raul Krivan', 'I love this drink! Cheers!', 'https://media.licdn.com/dms/image/D4D03AQHqmuH3-uGhPA/profile-displayphoto-shrink_800_800/0/1680871824230?e=1695859200&v=beta&t=TYzPML0kKrhMTsbR6SQNJypH_pFy4zPwshLgeIBHWSA', 4.9, '2023-07-24 03:21:40'),
(17, 37, 'Chidiebere Ndubuisi', 'This taste great!', 'https://static.vecteezy.com/system/resources/previews/013/042/571/original/default-avatar-profile-icon-social-media-user-photo-in-flat-style-vector.jpg', 4.4, '2023-07-24 09:45:29'),
(18, 42, 'Elina Chifeac', 'It was a very satisfying meal.', 'https://media.licdn.com/dms/image/C4D03AQGaaZfVWwSIpQ/profile-displayphoto-shrink_800_800/0/1620029788269?e=2147483647&v=beta&t=JFBgaTZGgrsS9zJ8j-HlAxMQ42naLP2meTjjaL2VFwI', 4.9, '2023-07-24 09:56:34'),
(22, 42, 'Davide Bernardo', 'I love this chips!', 'https://media.licdn.com/dms/image/D4D03AQG3hMV1KF4SDg/profile-displayphoto-shrink_800_800/0/1667569698144?e=1695859200&v=beta&t=B4BhGWCpIlyv2Fr2b7GbZvDi_l2HGRSzYM4EC8ynIU0', 4.5, '2023-07-26 09:22:40');

-- --------------------------------------------------------

--
-- Table structure for table `users_record`
--

CREATE TABLE `users_record` (
  `id` int(11) NOT NULL,
  `full_name` varchar(50) NOT NULL,
  `username` varchar(30) NOT NULL,
  `email` varchar(50) NOT NULL,
  `user_password` varchar(255) NOT NULL,
  `user_role` int(11) DEFAULT 2
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `users_record`
--

INSERT INTO `users_record` (`id`, `full_name`, `username`, `email`, `user_password`, `user_role`) VALUES
(16, 'Davide Bernardo', 'davide', 'davide@gmail.com', '$2y$10$x8Pc7kNBIS/M72M1ZZVz7.gAN6SnD/ScfK9o0ft.CrmE4qTyxBOAi', 2),
(17, 'Nwokorie Alex', 'lexis', 'nwokoriealex20@gmail.com', '$2y$10$NIdMr12chCRI2e/Je7bA5eAJgdlwuCDISiBRb21POwpb37.RuB6/G', 1);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `cart`
--
ALTER TABLE `cart`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `name` (`name`);

--
-- Indexes for table `category`
--
ALTER TABLE `category`
  ADD PRIMARY KEY (`id`),
  ADD KEY `name` (`name`);

--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`),
  ADD KEY `category_id` (`category_id`) USING BTREE,
  ADD KEY `name` (`name`);

--
-- Indexes for table `reviews`
--
ALTER TABLE `reviews`
  ADD PRIMARY KEY (`id`),
  ADD KEY `product_id` (`product_id`);

--
-- Indexes for table `users_record`
--
ALTER TABLE `users_record`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `username` (`username`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `cart`
--
ALTER TABLE `cart`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `category`
--
ALTER TABLE `category`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=48;

--
-- AUTO_INCREMENT for table `reviews`
--
ALTER TABLE `reviews`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;

--
-- AUTO_INCREMENT for table `users_record`
--
ALTER TABLE `users_record`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `products`
--
ALTER TABLE `products`
  ADD CONSTRAINT `products_ibfk_1` FOREIGN KEY (`category_id`) REFERENCES `category` (`id`) ON DELETE SET NULL ON UPDATE CASCADE;

--
-- Constraints for table `reviews`
--
ALTER TABLE `reviews`
  ADD CONSTRAINT `reviews_ibfk_1` FOREIGN KEY (`product_id`) REFERENCES `products` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

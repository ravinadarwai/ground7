-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Oct 21, 2024 at 10:59 AM
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
-- Database: `turf`
--

-- --------------------------------------------------------

--
-- Table structure for table `comments`
--

CREATE TABLE `comments` (
  `id` int(11) NOT NULL,
  `post_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `comment_text` text NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `events`
--

CREATE TABLE `events` (
  `id` int(11) NOT NULL,
  `event_name` varchar(255) NOT NULL,
  `event_date` date NOT NULL,
  `event_image` varchar(255) NOT NULL,
  `turf_id` int(11) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `event_time` time NOT NULL,
  `event_location` varchar(255) NOT NULL,
  `event_description` text NOT NULL,
  `price` int(225) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `event_registrations`
--

CREATE TABLE `event_registrations` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `event_id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `location` varchar(255) NOT NULL,
  `phone` varchar(20) NOT NULL,
  `image` varchar(255) NOT NULL,
  `persons` int(11) NOT NULL,
  `token_no` varchar(20) NOT NULL,
  `registration_date` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `gallery`
--

CREATE TABLE `gallery` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `image` varchar(255) NOT NULL,
  `location` varchar(255) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `gallery`
--

INSERT INTO `gallery` (`id`, `user_id`, `image`, `location`, `created_at`) VALUES
(7, 26, 'uploads/1729167086_player turf-min.jpg', 'https://maps.app.goo.gl/iAQEtDH9kuUQXTyF8', '2024-10-17 12:11:26');

-- --------------------------------------------------------

--
-- Table structure for table `games`
--

CREATE TABLE `games` (
  `id` int(11) NOT NULL,
  `game_name` varchar(255) NOT NULL,
  `game_description` text NOT NULL,
  `court_type` varchar(50) NOT NULL,
  `max_players` int(11) NOT NULL,
  `duration` int(11) NOT NULL,
  `price_per_person` decimal(10,2) NOT NULL,
  `game_image` varchar(255) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `turf_owners_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `games`
--

INSERT INTO `games` (`id`, `game_name`, `game_description`, `court_type`, `max_players`, `duration`, `price_per_person`, `game_image`, `created_at`, `updated_at`, `turf_owners_id`) VALUES
(31, '3', 'circket game', '1', 11, 60, 120.00, 'uploads/670fb2c40d61b-cricket.jpg', '2024-10-16 12:34:12', '2024-10-16 12:34:12', 26);

-- --------------------------------------------------------

--
-- Table structure for table `game_categories`
--

CREATE TABLE `game_categories` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `image` varchar(255) NOT NULL,
  `description` text NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `game_categories`
--

INSERT INTO `game_categories` (`id`, `name`, `image`, `description`, `created_at`, `updated_at`) VALUES
(3, 'Cricket', 'uploads/cricket.jpg', 'Cricket is a dynamic bat-and-ball game played between two teams, each comprising 11 players. It is not only a celebrated sport but also a rich cultural phenomenon, particularly in countries like India, Australia, England, and South Africa.\r\nCricket is a team sport played on an oval-shaped field with a rectangular pitch at the center. The game involves two teams; one bats while the other bowls and fields. The batting team aims to score runs, while the bowling and fielding team strives to dismiss the batsmen and limit runs scored by the opposition', '2024-10-16 10:06:11', '2024-10-16 10:21:02'),
(4, 'Football', 'uploads/360_F_86418998_mQ7NZfxcfR1hK1PDbVDSUkr6TFZbNRc0.jpg', 'Football, also known as soccer in some regions, is a globally celebrated team sport characterized by its simplicity and accessibility. Played between two teams of eleven players, the game emphasizes skill, teamwork, and strategy.\r\nFootball is a game where two teams, each comprising eleven players, strive to maneuver a spherical ball into the opposing team\'s goal using any part of their body except their hands and arms.', '2024-10-16 10:09:07', '2024-10-16 10:20:55'),
(5, 'BasketBall', 'uploads/23-best-basketball-history-facts-1705406196.jpg', 'Basketball is a dynamic and highly popular team sport played between two teams of five players each. Its primary objective is to score by shooting a ball through the opponent’s hoop, which is elevated 10 feet above the court. The game\'s simplicity, combined with its fast pace, has made it a beloved sport worldwide.\r\nBasketball is played on a rectangular court, typically indoors, where each team competes to score points by throwing a basketball through the opposing team\'s hoop', '2024-10-16 10:12:29', '2024-10-16 10:20:47'),
(6, 'Badminton', 'uploads/360_F_527619052_kXqlrmkSBcrQSgXPrqHUGdI9gdCBulJ8.jpg', 'Badminton is a highly engaging racquet sport that can be played either as singles or doubles. It emphasizes skill, speed, and strategy, making it a popular pastime globally. Badminton is a racket sport in which two players (singles) or two teams of two (doubles) hit a shuttlecock back and forth over a net. Points are scored by landing the shuttlecock in the opponent\'s half of the court or when the opponent fails to return it. ', '2024-10-16 10:14:01', '2024-10-16 10:20:41');

-- --------------------------------------------------------

--
-- Table structure for table `likes`
--

CREATE TABLE `likes` (
  `id` int(11) NOT NULL,
  `post_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `posts`
--

CREATE TABLE `posts` (
  `id` int(11) NOT NULL,
  `username` varchar(255) NOT NULL,
  `description` text NOT NULL,
  `media_type` enum('image','video') DEFAULT NULL,
  `media_url` varchar(255) DEFAULT NULL,
  `likes` int(11) DEFAULT 0,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `posts`
--

INSERT INTO `posts` (`id`, `username`, `description`, `media_type`, `media_url`, `likes`, `created_at`) VALUES
(1, 'JohnDoe', '\r\n\r\nRead more at:\r\nhttp://timesofindia.indiatimes.com/articleshow/114156487.cms?utm_source=contentofinterest&utm_medium=text&utm_campaign=cppst', 'image', 'uploads/sport.jpg', 2, '2024-10-11 18:44:47');

-- --------------------------------------------------------

--
-- Table structure for table `reviews`
--

CREATE TABLE `reviews` (
  `id` int(11) NOT NULL,
  `reviewer_name` varchar(100) NOT NULL,
  `review_title` varchar(255) DEFAULT NULL,
  `review_text` text NOT NULL,
  `rating` int(11) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `superadmin`
--

CREATE TABLE `superadmin` (
  `id` int(11) NOT NULL,
  `email` varchar(225) NOT NULL,
  `password` varchar(225) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `superadmin`
--

INSERT INTO `superadmin` (`id`, `email`, `password`, `created_at`) VALUES
(1, 'darwairavina2002@gmail.com', '$2y$10$SyTVO8i.msGXbkuEUt7cwecGd0ZxmlQGrmgNeXcfNlOSWXeXrE4lO', '2024-10-14 10:05:10'),
(2, 'superadmin@gmail.com', '$2y$10$sWwQmpYkiSm/nxqUrh77xOGPjfiHWWTroWba39KDjjlSazukJiDmm', '2024-10-16 06:27:31');

-- --------------------------------------------------------

--
-- Table structure for table `turfuser`
--

CREATE TABLE `turfuser` (
  `id` int(11) NOT NULL,
  `name` varchar(100) DEFAULT NULL,
  `email` varchar(100) DEFAULT NULL,
  `contact_no` varchar(15) DEFAULT NULL,
  `location` varchar(100) DEFAULT NULL,
  `aadhar_no` varchar(12) DEFAULT NULL,
  `photo` varchar(255) DEFAULT NULL,
  `aadhar_image` varchar(255) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `turf_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `turf_availability`
--

CREATE TABLE `turf_availability` (
  `id` int(11) NOT NULL,
  `turf_id` int(11) NOT NULL,
  `date` date NOT NULL,
  `open_time` time DEFAULT NULL,
  `close_time` time DEFAULT NULL,
  `is_holiday` tinyint(1) DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `turf_owners`
--

CREATE TABLE `turf_owners` (
  `id` int(11) NOT NULL,
  `turf_name` varchar(100) NOT NULL,
  `turf_location` varchar(255) NOT NULL,
  `description` varchar(225) NOT NULL,
  `turf_area` varchar(225) NOT NULL,
  `grounds_number` int(11) NOT NULL,
  `open_time` time DEFAULT NULL,
  `close_time` time DEFAULT NULL,
  `owner_name` varchar(100) NOT NULL,
  `owner_email` varchar(100) NOT NULL,
  `owner_contact` varchar(15) NOT NULL,
  `owner_address` varchar(255) NOT NULL,
  `owner_aadhar` varchar(12) NOT NULL,
  `owner_image` varchar(255) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `username` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `image` varchar(225) CHARACTER SET utf8mb4 COLLATE utf8mb4_bin DEFAULT NULL,
  `is_verified` int(11) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `turf_owners`
--

INSERT INTO `turf_owners` (`id`, `turf_name`, `turf_location`, `description`, `turf_area`, `grounds_number`, `open_time`, `close_time`, `owner_name`, `owner_email`, `owner_contact`, `owner_address`, `owner_aadhar`, `owner_image`, `created_at`, `updated_at`, `username`, `email`, `password`, `image`, `is_verified`) VALUES
(26, 'GT Turf & Food Court', 'Kanadia Main Rd, behind HP Petrol Pump, Gokul Nagar, Indore, Madhya Pradesh 452016', 'Has all you can eat · Has outdoor seating · Serves vegetarian dishes', '1240*1240', 1, '07:00:00', '12:00:00', 'GT Turf', 'gtturf@gmail.com', '78800 39735', 'Kanadia Main Rd, behind HP Petrol Pump, Gokul Nagar, Indore, Madhya Pradesh 452016', '123456789012', 'uploads/people_10884521.png', '2024-10-16 06:25:03', '2024-10-16 06:28:00', 'gt turf', 'gtturf@gmail.com', '$2y$10$jZGdZbY3bp9rP8orXa4Vb.c/sokZjmd61curFvdsQNJpfPT6.RpZa', 'uploads/gt.jpg', 1),
(28, 'Vineet turf', 'Vineet Garden', 'The turf is very Cool and Best for fun', '600*900', 0, '09:00:00', '11:00:00', 'Vineet Suman', 'vineet@suman.com', '9876543212', 'Suman Palace', '567845673456', 'uploads/All-user.png', '2024-10-16 07:23:39', '2024-10-16 07:23:39', 'Vini@123', 'Vineet@suman.com', '$2y$10$E82o99HfOZh7QBqdKzznIelwSppDNXSdqXTkg5A4pcqf/dQdHZC7.', 'uploads/top-10-min-min.jpg', 0);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `email` varchar(255) NOT NULL,
  `username` varchar(50) NOT NULL,
  `first_name` varchar(50) DEFAULT NULL,
  `last_name` varchar(50) DEFAULT NULL,
  `gender` enum('Male','Female','Other') DEFAULT NULL,
  `password` varchar(255) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `email`, `username`, `first_name`, `last_name`, `gender`, `password`, `created_at`, `updated_at`) VALUES
(1, 'darwairavina2002@gmail.com', 'ravina_darwai', 'Ravina', 'Darwai', 'Female', '$2y$10$llb/KldtnbEUscLY1qTXje2GmoJVhC3kPve60vyXlkvlboPW4pH7C', '2024-10-11 10:01:15', '2024-10-11 10:01:15'),
(2, 'asdf1@gmail.com', 'ravina', 'Ravina', 'Darwai', 'Female', '$2y$10$2kWVZopZ2L65B6MRUBaw7OdvSdCIF2h8yXCUahht2PtkqEkjOydyu', '2024-10-11 10:27:51', '2024-10-11 10:27:51'),
(3, 'ravina2002@gmail.com', 'ravinadarwai', 'ravina', 'darwai', 'Female', '$2y$10$uCQtrEqmFTwS489O7tbVluLB2qWaySCzvpU3S.4XBOr2/f8zHstl.', '2024-10-16 07:34:38', '2024-10-16 07:34:38');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `comments`
--
ALTER TABLE `comments`
  ADD PRIMARY KEY (`id`),
  ADD KEY `post_id` (`post_id`),
  ADD KEY `user_id` (`user_id`);

--
-- Indexes for table `events`
--
ALTER TABLE `events`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_turf` (`turf_id`);

--
-- Indexes for table `event_registrations`
--
ALTER TABLE `event_registrations`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `token_no` (`token_no`),
  ADD KEY `user_id` (`user_id`),
  ADD KEY `event_id` (`event_id`);

--
-- Indexes for table `gallery`
--
ALTER TABLE `gallery`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_id` (`user_id`);

--
-- Indexes for table `games`
--
ALTER TABLE `games`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_turf_owners` (`turf_owners_id`);

--
-- Indexes for table `game_categories`
--
ALTER TABLE `game_categories`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `likes`
--
ALTER TABLE `likes`
  ADD PRIMARY KEY (`id`),
  ADD KEY `post_id` (`post_id`),
  ADD KEY `user_id` (`user_id`);

--
-- Indexes for table `posts`
--
ALTER TABLE `posts`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `reviews`
--
ALTER TABLE `reviews`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `reviewer_name` (`reviewer_name`);

--
-- Indexes for table `superadmin`
--
ALTER TABLE `superadmin`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `turfuser`
--
ALTER TABLE `turfuser`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_turf_owner` (`turf_id`);

--
-- Indexes for table `turf_availability`
--
ALTER TABLE `turf_availability`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `unique_turf_date` (`turf_id`,`date`);

--
-- Indexes for table `turf_owners`
--
ALTER TABLE `turf_owners`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `owner_email` (`owner_email`),
  ADD UNIQUE KEY `owner_aadhar` (`owner_aadhar`),
  ADD UNIQUE KEY `email` (`email`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `email` (`email`),
  ADD UNIQUE KEY `username` (`username`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `comments`
--
ALTER TABLE `comments`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `events`
--
ALTER TABLE `events`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `event_registrations`
--
ALTER TABLE `event_registrations`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `gallery`
--
ALTER TABLE `gallery`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `games`
--
ALTER TABLE `games`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=32;

--
-- AUTO_INCREMENT for table `game_categories`
--
ALTER TABLE `game_categories`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `likes`
--
ALTER TABLE `likes`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `posts`
--
ALTER TABLE `posts`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `reviews`
--
ALTER TABLE `reviews`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `superadmin`
--
ALTER TABLE `superadmin`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `turfuser`
--
ALTER TABLE `turfuser`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `turf_availability`
--
ALTER TABLE `turf_availability`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=106;

--
-- AUTO_INCREMENT for table `turf_owners`
--
ALTER TABLE `turf_owners`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=29;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `comments`
--
ALTER TABLE `comments`
  ADD CONSTRAINT `comments_ibfk_1` FOREIGN KEY (`post_id`) REFERENCES `posts` (`id`),
  ADD CONSTRAINT `comments_ibfk_2` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`);

--
-- Constraints for table `events`
--
ALTER TABLE `events`
  ADD CONSTRAINT `fk_turf` FOREIGN KEY (`turf_id`) REFERENCES `turf_owners` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `event_registrations`
--
ALTER TABLE `event_registrations`
  ADD CONSTRAINT `event_registrations_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`),
  ADD CONSTRAINT `event_registrations_ibfk_2` FOREIGN KEY (`event_id`) REFERENCES `events` (`id`);

--
-- Constraints for table `gallery`
--
ALTER TABLE `gallery`
  ADD CONSTRAINT `gallery_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `turf_owners` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `games`
--
ALTER TABLE `games`
  ADD CONSTRAINT `fk_turf_owners` FOREIGN KEY (`turf_owners_id`) REFERENCES `turf_owners` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `games_ibfk_1` FOREIGN KEY (`turf_owners_id`) REFERENCES `turf_owners` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `likes`
--
ALTER TABLE `likes`
  ADD CONSTRAINT `likes_ibfk_1` FOREIGN KEY (`post_id`) REFERENCES `posts` (`id`),
  ADD CONSTRAINT `likes_ibfk_2` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`);

--
-- Constraints for table `turfuser`
--
ALTER TABLE `turfuser`
  ADD CONSTRAINT `fk_turf_owner` FOREIGN KEY (`turf_id`) REFERENCES `turf_owners` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `turf_availability`
--
ALTER TABLE `turf_availability`
  ADD CONSTRAINT `turf_availability_ibfk_1` FOREIGN KEY (`turf_id`) REFERENCES `turf_owners` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Oct 08, 2024 at 12:29 PM
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
-- Database: `truf_project`
--

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
  `event_description` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `events`
--

INSERT INTO `events` (`id`, `event_name`, `event_date`, `event_image`, `turf_id`, `created_at`, `event_time`, `event_location`, `event_description`) VALUES
(4, 'circet tunment', '2024-10-15', 'uploads/events/sport1.jpg', 22, '2024-10-07 11:43:08', '02:02:00', 'indore', 'Organisations invest in artificial cricket surfaces for a number of reasons but, in particular, because of the guarantee of a consistent all-weather surface, that is available year round for practice and match days.');

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
(2, 22, 'uploads/1728029439_kundalimake3.jpg', 'https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d53286.66972174579!2d75.83670258522034!3d22.719675200591883!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3962e304ef837a73%3A0xdeb60059e75b4145!2sGreenland%20Turf%20and%20Cafe!5e1!3m2!1sen!2sin!4v', '2024-10-04 08:10:39');

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
(9, 'circket', 'Organisations invest in artificial cricket surfaces for a number of reasons but, in particular, because of the guarantee of a consistent all-weather surface, that is available year round for practice and match days.', '1', 14, 60, 200.00, 'uploads/sport.jpg', '2024-10-07 10:23:16', '2024-10-07 10:23:16', 22);

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

--
-- Dumping data for table `reviews`
--

INSERT INTO `reviews` (`id`, `reviewer_name`, `review_title`, `review_text`, `rating`, `created_at`) VALUES
(1, 'budhushu', 'njedjhijesi', 'bfuhis hsihfisj', 3, '2024-10-03 20:41:26');

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

--
-- Dumping data for table `turfuser`
--

INSERT INTO `turfuser` (`id`, `name`, `email`, `contact_no`, `location`, `aadhar_no`, `photo`, `aadhar_image`, `created_at`, `turf_id`) VALUES
(4, 'Ravina Darwai', 'darwairavina2002@gmail.com', '9098839256', 'sdfgyjio;', '123456789012', 'uploads/photos/1727763202_kun.jpg', 'uploads/aadhar/1727763202_kundlidoshas.jpg', '2024-10-01 06:13:22', 22),
(5, 'Ravina Darwai', 'darwairavina2002@gmail.com', '09098839256', 'bhopal', '123456789012', 'uploads/photos/1728380192_sport.jpg', 'uploads/aadhar/1728380192_shooting image.jpg', '2024-10-08 09:36:32', 22),
(6, 'Ravina Darwai', 'darwairavina2002@gmail.com', '09098839256', 'bhopal', '123456789012', 'uploads/photos/1728380231_sport.jpg', 'uploads/aadhar/1728380231_shooting image.jpg', '2024-10-08 09:37:11', 25),
(7, 'Ravina Darwai', 'darwairavina2002@gmail.com', '09098839256', 'bhopal', '123456789012', 'uploads/photos/1728380247_sport.jpg', 'uploads/aadhar/1728380247_shooting image.jpg', '2024-10-08 09:37:27', 25),
(8, 'Ravina Darwai', 'darwairavina2002@gmail.com', '09098839256', 'bhopal', '123456789012', 'uploads/photos/1728380271_sport.jpg', 'uploads/aadhar/1728380271_shooting image.jpg', '2024-10-08 09:37:51', 25);

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
  `turf_area` int(11) NOT NULL,
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
(22, 'Ground7', 'Bhopal', 'In publishing and graphic design, Lorem ipsum is a placeholder text commonly used to demonstrate the visual form of a document or a typeface without relying on meaningful content. Lorem ipsum may be used as a placeholder befo', 12, 2, '22:02:00', '22:02:00', 'Saurabh Singh Lodhi', 'darwairavina2002@gmail.com', '1234567890', 'indore', '123456789012', 'uploads/navratri.png', '2024-10-04 05:10:03', '2024-10-08 08:06:33', 'ravina_darwai', 'darwairavina2002@gmail.com', '$2y$10$8hobBRy1Ru6GkxojTkwcjOZdltf9/gs4j7ZXO07zlaEEziZOru2Ty', 'uploads/kundalimake3.jpg', 1),
(25, 'turf', 'bhopal', 'Track progress and improve performance\r\nRegister now as a coach and be a part of Ground7.', 23, 2, '22:02:00', '22:01:00', 'ravina darwai', 'ravina@gmail.com', '1234567890', 'indore', '123456189012', 'uploads/Flower_jtca001.jpg', '2024-10-08 09:41:35', '2024-10-08 09:57:55', 'ravina_darwai', 'asdf@gmail.com', '$2y$10$trLoiOmAn3vmB5c1OtTDBuoUY3dosGx7NPCLmbWxGR.s38x6YOtBe', 'uploads/sport.jpg', 1);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `events`
--
ALTER TABLE `events`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_turf` (`turf_id`);

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
-- Indexes for table `reviews`
--
ALTER TABLE `reviews`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `reviewer_name` (`reviewer_name`);

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
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `events`
--
ALTER TABLE `events`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `gallery`
--
ALTER TABLE `gallery`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `games`
--
ALTER TABLE `games`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `reviews`
--
ALTER TABLE `reviews`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `turfuser`
--
ALTER TABLE `turfuser`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `turf_availability`
--
ALTER TABLE `turf_availability`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=106;

--
-- AUTO_INCREMENT for table `turf_owners`
--
ALTER TABLE `turf_owners`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `events`
--
ALTER TABLE `events`
  ADD CONSTRAINT `fk_turf` FOREIGN KEY (`turf_id`) REFERENCES `turf_owners` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

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

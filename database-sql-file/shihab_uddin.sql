-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Sep 07, 2024 at 03:14 PM
-- Server version: 8.0.30
-- PHP Version: 8.3.11

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `shihab_uddin`
--

-- --------------------------------------------------------

--
-- Table structure for table `mails`
--

CREATE TABLE `mails` (
  `id` int NOT NULL,
  `name` varchar(200) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `email` varchar(200) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `body` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `mails`
--

INSERT INTO `mails` (`id`, `name`, `email`, `body`) VALUES
(1, 'shihab', 'shihabuddinrabbi19@gmail.com', 'aisdhfaiuwefh;ioasdfh');

-- --------------------------------------------------------

--
-- Table structure for table `protfolios`
--

CREATE TABLE `protfolios` (
  `id` int NOT NULL,
  `title` varchar(200) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `subtitle` varchar(200) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `description` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `image` varchar(200) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `status` varchar(200) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL DEFAULT 'deactive'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `protfolios`
--

INSERT INTO `protfolios` (`id`, `title`, `subtitle`, `description`, `image`, `status`) VALUES
(7, 'Alexander Bradford23', 'Salvador Whitley', '        Amet non blanditiis        ', '76-Carol Hansen-05-09-2024-08-50-05-902554.jpg', 'active'),
(8, 'Melodie Ratliff', 'Myra Day', ' Soluta eu impedit d ', '76-Melodie Ratliff-05-09-2024-06-05-34-246782.jpg', 'active'),
(9, 'Marah Rojas', 'Stewart Schwartz', ' Animi dolore offici ', '76-Marah Rojas-05-09-2024-06-29-34-922545.jpg', 'active'),
(10, 'Kessie Baldwin', 'Evangeline Beach', ' Veniam anim suscipi ', '76-Kessie Baldwin-05-09-2024-07-07-32-799862.jpg', 'deactive');

-- --------------------------------------------------------

--
-- Table structure for table `services`
--

CREATE TABLE `services` (
  `id` int NOT NULL,
  `title` varchar(200) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `description` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `icon` varchar(200) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `status` varchar(200) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL DEFAULT 'deactive'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `services`
--

INSERT INTO `services` (`id`, `title`, `description`, `icon`, `status`) VALUES
(10, 'Alexander Colon', 'Id at quis quisquam ', 'fa fa-adjust', 'deactive'),
(11, 'Hyacinth Hayden', 'Aut dignissimos sit ', 'fa fa-bell', 'active'),
(12, 'Rose Macdonald', 'Quidem et voluptatem', 'fa fa-calendar-check-o', 'active'),
(13, 'Nathaniel Leon', 'Harum ipsam consequu', 'fa fa-angellist', 'active');

-- --------------------------------------------------------

--
-- Table structure for table `skills`
--

CREATE TABLE `skills` (
  `id` int NOT NULL,
  `title` varchar(200) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `year` varchar(200) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `ratio` varchar(200) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `status` varchar(200) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL DEFAULT 'deactive'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `skills`
--

INSERT INTO `skills` (`id`, `title`, `year`, `ratio`, `status`) VALUES
(3, 'Alfreda Meyers', '1973', '100', 'active'),
(14, 'Melodie Bryant', '1994', '21', 'active'),
(15, 'Derek Townsend', '1971', '10', 'active'),
(16, 'Keefe Mcguire', '1983', '96', 'active');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int NOT NULL,
  `name` varchar(200) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `email` varchar(200) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `image` varchar(200) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL DEFAULT 'default.jpg',
  `password` varchar(200) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `image`, `password`) VALUES
(65, 'Shihab Uddin', 'zywivoso@mailinator.com', 'default.jpg', 'ac748cb38ff28d1ea98458b16695739d7e90f22d'),
(66, 'Price Elliott', 'fecopak@mailinator.com', 'default.jpg', 'ac748cb38ff28d1ea98458b16695739d7e90f22d'),
(67, 'Callum Cline', 'vomu@mailinator.com', 'default.jpg', 'ac748cb38ff28d1ea98458b16695739d7e90f22d'),
(68, 'Scarlett Henderson', 'tasaxev@mailinator.com', 'default.jpg', 'ac748cb38ff28d1ea98458b16695739d7e90f22d'),
(69, 'Dorian Wolfe', 'nykimy@mailinator.com', 'default.jpg', 'ac748cb38ff28d1ea98458b16695739d7e90f22d'),
(70, 'Rana Baird', 'hulygosule@mailinator.com', 'default.jpg', 'ac748cb38ff28d1ea98458b16695739d7e90f22d'),
(71, 'Tatyana Strong', 'zelopaxot@mailinator.com', 'default.jpg', 'ac748cb38ff28d1ea98458b16695739d7e90f22d'),
(72, 'Andrew Mills', 'vejyqu@mailinator.com', 'default.jpg', 'ac748cb38ff28d1ea98458b16695739d7e90f22d'),
(73, 'Abdul Guerrero', 'midorana@mailinator.com', 'default.jpg', 'ac748cb38ff28d1ea98458b16695739d7e90f22d'),
(74, 'Molly Ballard', 'sapipimyxu@mailinator.com', 'default.jpg', 'ac748cb38ff28d1ea98458b16695739d7e90f22d'),
(75, 'Hunter May', 'haciga@mailinator.com', 'default.jpg', 'ac748cb38ff28d1ea98458b16695739d7e90f22d'),
(76, 'Rabbi Hasan', 'shihabuddinrabbi19@gmail.com', '76-Rabbi Hasan-07-09-2024-03-11-36-180573.jpg', 'ac748cb38ff28d1ea98458b16695739d7e90f22d'),
(77, 'Arsenio Richmond', 'sexy@mailinator.com', 'default.jpg', 'ac748cb38ff28d1ea98458b16695739d7e90f22d'),
(78, 'Regan Flowers', 'futam@mailinator.com', 'default.jpg', 'ac748cb38ff28d1ea98458b16695739d7e90f22d'),
(79, 'Rhea Craft', 'zogecesa@mailinator.com', 'default.jpg', 'ac748cb38ff28d1ea98458b16695739d7e90f22d'),
(80, 'MacKensie Jackson', 'tydimomyk@mailinator.com', 'default.jpg', 'ac748cb38ff28d1ea98458b16695739d7e90f22d'),
(81, 'Charde Horn', 'pynaxizoda@mailinator.com', 'default.jpg', 'ac748cb38ff28d1ea98458b16695739d7e90f22d'),
(82, 'Brandon Molina', 'dijydypyv@mailinator.com', '82-Brandon Molina-03-09-2024-10-23-43-418386.jpg', 'ac748cb38ff28d1ea98458b16695739d7e90f22d'),
(83, 'Hiram Mccarty', 'banexysav@mailinator.com', 'default.jpg', 'ac748cb38ff28d1ea98458b16695739d7e90f22d');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `mails`
--
ALTER TABLE `mails`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `protfolios`
--
ALTER TABLE `protfolios`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `services`
--
ALTER TABLE `services`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `skills`
--
ALTER TABLE `skills`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `mails`
--
ALTER TABLE `mails`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `protfolios`
--
ALTER TABLE `protfolios`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `services`
--
ALTER TABLE `services`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `skills`
--
ALTER TABLE `skills`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=84;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

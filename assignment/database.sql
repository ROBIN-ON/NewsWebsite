-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: db
-- Generation Time: Feb 01, 2023 at 10:02 AM
-- Server version: 8.0.32
-- PHP Version: 8.0.19

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `article`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `id` int NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_general_ci NOT NULL,
  `username` varchar(255) COLLATE utf8mb4_general_ci NOT NULL,
  `password` varchar(255) COLLATE utf8mb4_general_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`id`, `email`, `username`, `password`) VALUES
(1, 'vawodi@mailinator.com', 'mulewe', '$2y$10$7lAU8aSFlTEgbGoS3qg.2OoaV4QClwmkwQkirnOe/C2UfxaZdVKrG'),
(2, 'a@gmail.com', 'abc', '$2y$10$AIAUnNaMFZlHplv.LGU8leMwJBLy0p7Y8rGhxHtXOcn0uoP1DuikO'),
(3, 'admin@gmail.com', 'admin', '$2y$10$BactQ0uFoFqGVYFKY1gHju9vwB2XfdoA8ycparUv4FA6fpWNTK/Yy');

-- --------------------------------------------------------

--
-- Table structure for table `article`
--

CREATE TABLE `article` (
  `id` int NOT NULL,
  `title` varchar(255) COLLATE utf8mb4_general_ci NOT NULL,
  `description` varchar(255) COLLATE utf8mb4_general_ci NOT NULL,
  `category_fk` int NOT NULL,
  `posted_on` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `article`
--

INSERT INTO `article` (`id`, `title`, `description`, `category_fk`, `posted_on`) VALUES
(1, 'Odio assumenda expli', 'Placeat architecto ', 2, '2023-01-08'),
(3, 'Iusto labore exercit', 'Dolor magni id non l', 3, '2023-01-09'),
(4, 'Maxime sint odio aut', 'Omnis necessitatibus', 2, '2023-01-09'),
(5, 'messi', 'Neque', 1, '2023-01-09');

-- --------------------------------------------------------

--
-- Table structure for table `category`
--

CREATE TABLE `category` (
  `id` int NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_general_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `category`
--

INSERT INTO `category` (`id`, `name`) VALUES
(1, 'Sports'),
(2, 'Business'),
(3, 'Politics'),
(8, 'Music'),
(11, 'New');

-- --------------------------------------------------------

--
-- Table structure for table `comment`
--

CREATE TABLE `comment` (
  `id` int NOT NULL,
  `body` varchar(255) COLLATE utf8mb4_general_ci NOT NULL,
  `comment_date` date NOT NULL,
  `article_fk` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `comment`
--

INSERT INTO `comment` (`id`, `body`, `comment_date`, `article_fk`) VALUES
(1, 'hello', '2023-01-09', 1),
(2, 'Hi', '2023-01-09', 3),
(3, 'Wow', '2023-01-09', 1),
(4, 'great', '2023-01-09', 1),
(5, 'Awesome', '2023-01-09', 1),
(6, 'Awesome', '2023-01-09', 4),
(7, 'Wow', '2023-01-09', 4),
(8, 'dawdadasd', '2023-01-09', 1),
(9, 'dssadasd', '2023-01-09', 4),
(10, '87r6r67r', '2023-01-09', 1),
(11, 'Hi', '2023-01-09', 5),
(12, 'great', '2023-01-09', 5),
(13, 'goat', '2023-01-09', 5);

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id` int NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_general_ci NOT NULL,
  `username` varchar(255) COLLATE utf8mb4_general_ci NOT NULL,
  `password` varchar(255) COLLATE utf8mb4_general_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `email`, `username`, `password`) VALUES
(2, 'b@gmail.com', 'bbbbb', '$2y$10$X3PB5ibaRSu9C5AHNrfSVOA6MlHXsJmLxl4/WwK44f3iIT265P3eO'),
(3, 'user@gmail.com', 'user', '$2y$10$TZQ1v/Leba3gMO/0OXExnenFGfThlqUgcEGZyQcz6GhwuKSHBQc.e'),
(4, 'op@gmail.com', 'op', '$2y$10$W9k1FG9faWu9l0G.JDry1O84ZdiAaY6s4IHhSd3QiWexCXfCyt9L2');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `article`
--
ALTER TABLE `article`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `category`
--
ALTER TABLE `category`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `comment`
--
ALTER TABLE `comment`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `article`
--
ALTER TABLE `article`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `category`
--
ALTER TABLE `category`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `comment`
--
ALTER TABLE `comment`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

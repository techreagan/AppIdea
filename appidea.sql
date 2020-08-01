-- phpMyAdmin SQL Dump
-- version 4.8.3
-- https://www.phpmyadmin.net/
--
-- Host: localhost:8889
-- Generation Time: Oct 29, 2018 at 12:44 PM
-- Server version: 5.7.23
-- PHP Version: 7.2.8

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";

--
-- Database: `appidea`
--

CREATE DATABASE IF NOT EXISTS `appidea` DEFAULT CHARACTER SET utf8 COLLATE utf8_general_ci;
USE `appidea`;

-- --------------------------------------------------------

--
-- Table structure for table `ideas`
--

CREATE TABLE `ideas` (
  `id` int(255) NOT NULL,
  `user_id` int(255) NOT NULL,
  `title` varchar(255) NOT NULL,
  `description` text NOT NULL,
  `created_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `ideas`
--

INSERT INTO `ideas` (`id`, `user_id`, `title`, `description`, `created_at`) VALUES
(1, 1, 'Social Network', 'The best Social Network Ever Created', '2018-10-25 19:37:49'),
(2, 1, 'Payment Platform', 'The best payment platform ever created', '2018-10-25 19:37:49'),
(4, 1, 'Twitter Clone', 'I&#39;m just gonna build a basic twitter clone, with basic functionality like tweet, followers and following, maybe include chat later.', '2018-10-25 20:23:09'),
(10, 3, 'hellos world', 'Build an hello world app using dart and flutter', '2018-10-25 22:45:50'),
(11, 1, 'Hello World', 'Build an hello world app in Go programming language', '2018-10-25 23:13:33'),
(12, 5, 'Hello World', 'How to build an hello world app in dart programming language', '2018-10-26 19:56:29');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `username` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `created_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `username`, `email`, `password`, `created_at`) VALUES
(1, 'reagan', 'reaganekhameye@gmail.com', '$2y$10$ikAcaD/jEumeWhhVkBrFtuv6Ktx6MSJ4wuTnF5FoupVUqo4CS/6X6', '2018-10-25 16:55:15'),
(2, 'ray', 'ray1@gmail.com', '$2y$10$ikAcaD/jEumeWhhVkBrFtuv6Ktx6MSJ4wuTnF5FoupVUqo4CS/6X6', '2018-10-25 22:33:51'),
(3, 'ray2', 'ray11@gmail.com', '$2y$10$ikAcaD/jEumeWhhVkBrFtuv6Ktx6MSJ4wuTnF5FoupVUqo4CS/6X6', '2018-10-25 22:42:05'),
(4, 'reagan1', 'reagan@gmail.com', '$2y$10$ikAcaD/jEumeWhhVkBrFtuv6Ktx6MSJ4wuTnF5FoupVUqo4CS/6X6', '2018-10-25 23:12:07'),
(5, 'love', 'raygun@gmail.com', '$2y$10$ikAcaD/jEumeWhhVkBrFtuv6Ktx6MSJ4wuTnF5FoupVUqo4CS/6X6', '2018-10-26 19:54:20');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `ideas`
--
ALTER TABLE `ideas`
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
-- AUTO_INCREMENT for table `ideas`
--
ALTER TABLE `ideas`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

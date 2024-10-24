-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Oct 24, 2024 at 04:03 PM
-- Server version: 10.4.28-MariaDB
-- PHP Version: 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `online_library_management_system`
--

-- --------------------------------------------------------

--
-- Table structure for table `bookings`
--

CREATE TABLE `bookings` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `book_id` int(11) NOT NULL,
  `booking_date` datetime DEFAULT current_timestamp(),
  `duration` varchar(20) NOT NULL,
  `mode` varchar(10) DEFAULT 'online',
  `status` varchar(20) DEFAULT 'not returned'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `bookings`
--

INSERT INTO `bookings` (`id`, `user_id`, `book_id`, `booking_date`, `duration`, `mode`, `status`) VALUES
(6, 10, 23, '2024-10-07 01:01:00', '1_week', 'online', 'not returned'),
(8, 10, 29, '2024-10-08 06:50:50', '2_weeks', 'online', 'not returned'),
(9, 10, 28, '2024-10-08 06:51:02', '1_week', 'online', 'returned'),
(10, 10, 41, '2024-10-08 06:51:18', '1_month', 'online', 'returned'),
(13, 13, 32, '2024-10-24 00:00:00', '1_month', 'offline', 'not returned');

-- --------------------------------------------------------

--
-- Table structure for table `books`
--

CREATE TABLE `books` (
  `photo` varchar(200) NOT NULL,
  `book_id` int(11) NOT NULL,
  `title` varchar(255) NOT NULL,
  `author` varchar(255) NOT NULL,
  `published_year` int(11) DEFAULT NULL,
  `genre` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `books`
--

INSERT INTO `books` (`photo`, `book_id`, `title`, `author`, `published_year`, `genre`) VALUES
('assets/the wings of fire.jpg', 22, 'The Wings of Fire', 'APJ Abdul Kalam', 2000, 'AutoBiography'),
('assets/mathilukal.jpg', 23, 'Mathilukal', 'Vaikom Muhammad Basheer', 1965, 'novel'),
('assets/aad jeevitham.jpg', 24, 'Aad Jeevitham', 'Banyamin', 2008, 'novel'),
('assets/sil.jpg', 25, 'The Silent Patient', 'Alex Michaelides', 2019, 'psycologycal Thriller'),
('assets/it.jpg', 26, 'It', 'Stephen King', 1986, 'horror'),
('assets/sleep tight.jpg', 27, 'Sleep Tight', 'J H Markert', 2024, 'horror'),
('assets/dairy of a young girl.jpg', 28, 'The Dairy Of a Yong Girl', 'Anne Frank', 1947, 'biography'),
('assets/paathummeda aad.jpg', 29, 'Pathummayude Aadu', 'Vaikom Muhammad Basheer', 1959, 'biography'),
('assets/isaakkinte ithihasam.jpg', 30, 'Khasakkinte Ithihasam', 'O V Vijayan', 1968, 'Magic Realism'),
('assets/kayar.jpg', 31, 'Kayar', 'Thakazhi Shivashankara Pillai', 1987, 'novel'),
('assets/dhaivathinte charanmaar.jpg', 32, 'Daivathinte Chathanmar', 'Joseph Annamkutty', 2019, 'biography'),
('assets/oru dheshathinte kadha.jpg', 33, 'Oru Dheshathinte Kadha', 'S K  Pottekkatt', 1971, 'AutoBiography'),
('assets/malala.jpg', 34, 'I Am Malala', 'Malala Yousafzai2013', 1971, 'AutoBiography'),
('assets/so thirsty.jpg', 35, 'So Thirsty', 'Rachel Harrison', 2024, 'horror fiction'),
('assets/the exo.jpg', 36, 'The Exorcist', 'William Peter Blatty', 1973, 'horror'),
('assets/story of struggles.jpg', 37, 'A Story Of struggles', 'Ashok Kumawat', 2020, 'Fiction'),
('assets/harry potter.jpg', 38, 'Harry Potter', 'J K Rowling', 1997, 'Fantacy'),
('assets/dog.jpg', 39, 'The Curious Incident Of The Dog In The Night-Time', 'Mark haddon', 2003, 'Mystry Novel'),
('assets/father.jpg', 40, 'The Innocents Of Father Brown', 'G K Chesterton', 1911, 'mystery'),
('assets/belive.jpg', 41, 'Believe In Yourself', 'Joseph Murphy', 1955, 'Self-Help');

-- --------------------------------------------------------

--
-- Table structure for table `feedback`
--

CREATE TABLE `feedback` (
  `username` varchar(25) NOT NULL,
  `email` varchar(25) NOT NULL,
  `message` varchar(250) NOT NULL,
  `user_id` int(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `feedback`
--

INSERT INTO `feedback` (`username`, `email`, `message`, `user_id`) VALUES
('assasa', 'asas@gmail.com', 'sdfghjmn ', 1),
('jjhhj', 'jbn@vhkugyh', 'hgfthhdcfvgku', 2),
('jhjuhb', 'hgyu@gcygfc', 'hjgyufyryu', 3);

-- --------------------------------------------------------

--
-- Table structure for table `login`
--

CREATE TABLE `login` (
  `email` varchar(25) NOT NULL,
  `password` varchar(20) NOT NULL,
  `user_type` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `login`
--

INSERT INTO `login` (`email`, `password`, `user_type`) VALUES
('ammu@gmail.com', 'asdf', '1'),
('admin@gmail.com', 'abcd', '6'),
('', '', ''),
('ggfjf@ggfj', 'qwer', '0'),
('najithanazar786@gmail.com', 'zxcv', '0'),
('fathima@gmail.com', 'sdfg', '0'),
('fathima@gmail.com', 'sdfg', '0');

-- --------------------------------------------------------

--
-- Table structure for table `teacher`
--

CREATE TABLE `teacher` (
  `username` varchar(25) NOT NULL,
  `phonenumber` int(12) NOT NULL,
  `email` varchar(25) NOT NULL,
  `password` varchar(25) NOT NULL,
  `user_id` int(25) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `teacher`
--

INSERT INTO `teacher` (`username`, `phonenumber`, `email`, `password`, `user_id`) VALUES
('sulfiya', 2147483647, 'sulfiya@gmail.com', 'asdfghj', 5),
('Nafiya', 1234567890, 'nafii@gmail.com', 'qwer', 6),
('ammu', 1234567890, 'ammu@gmail.com', 'asdf', 7),
('aswathy dinesh', 1234567890, 'aswathydinesh04@gmail.com', 'asdf', 11);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `name` varchar(25) NOT NULL,
  `phonenumber` int(12) NOT NULL,
  `email` varchar(40) NOT NULL,
  `username` varchar(25) NOT NULL,
  `password` varchar(20) NOT NULL,
  `usid` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`name`, `phonenumber`, `email`, `username`, `password`, `usid`) VALUES
('cgfjfg', 1234567899, 'ggfjf@ggfj', 'rizwanaaaaaa', 'qwer', 10),
('najitha', 2147483647, 'najithanazar786@gmail.com', 'najithaa', 'zxcv', 11),
('bgfhgfgf', 1234567890, 'fathima@gmail.com', 'asdfgef', 'sdfg', 12),
('bgfhgfgf', 1234567890, 'fathima@gmail.com', 'asdfgef', 'sdfg', 13);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `bookings`
--
ALTER TABLE `bookings`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `books`
--
ALTER TABLE `books`
  ADD PRIMARY KEY (`book_id`);

--
-- Indexes for table `feedback`
--
ALTER TABLE `feedback`
  ADD PRIMARY KEY (`user_id`);

--
-- Indexes for table `teacher`
--
ALTER TABLE `teacher`
  ADD PRIMARY KEY (`user_id`),
  ADD KEY `user_id` (`user_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`usid`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `bookings`
--
ALTER TABLE `bookings`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `books`
--
ALTER TABLE `books`
  MODIFY `book_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=64;

--
-- AUTO_INCREMENT for table `feedback`
--
ALTER TABLE `feedback`
  MODIFY `user_id` int(15) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `teacher`
--
ALTER TABLE `teacher`
  MODIFY `user_id` int(25) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `usid` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

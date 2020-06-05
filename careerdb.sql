-- phpMyAdmin SQL Dump
-- version 4.8.3
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 27, 2020 at 11:33 AM
-- Server version: 10.1.36-MariaDB
-- PHP Version: 7.2.11

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `careerdb`
--

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `name` varchar(255) DEFAULT NULL,
  `mobile` varchar(255) DEFAULT NULL,
  `password` varchar(100) DEFAULT NULL,
  `type` varchar(255) DEFAULT NULL,
  `status` varchar(255) DEFAULT 'Inactive',
  `email` varchar(100) DEFAULT NULL,
  `location` varchar(100) DEFAULT NULL,
  `company` varchar(100) DEFAULT NULL,
  `business_description` varchar(100) DEFAULT NULL,
  `educational_level` varchar(100) DEFAULT NULL,
  `category` varchar(50) DEFAULT NULL,
  `token` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `mobile`, `password`, `type`, `status`, `email`, `location`, `company`, `business_description`, `educational_level`, `category`, `token`) VALUES
(1, 'Teezle', '0501248796', '171867fed3422b5e43adfa9844407398', 'trainee', 'Active', 'teezle@gmail.com', 'Ogbojo', 'Teezle Incorporated', '', 'SHS', NULL, 0),
(2, '', '', '', '', 'Active', '', '', '', '', '', NULL, 0),
(3, 'Nana B', '0501478962', '171867fed3422b5e43adfa9844407398', 'trainee', 'Active', 'nana@gmail.com', 'Tema', 'nana@gmail.com', '', 'Tertiary', NULL, 0),
(4, 'Brian', '0501487952', '171867fed3422b5e43adfa9844407398', 'service_provider', 'Active', 'child@gmail.com', 'Ogbojo', 'BrainChild', 'brains the child', '', NULL, 0),
(5, 'jojo', '05048965', 'e10adc3949ba59abbe56e057f20f883e', 'trainee', 'Active', 'jojo@gmail.com', 'Ogbojo', 'jojo inc', '', 'SHS', NULL, 0),
(6, 'janie', '050214632', 'e10adc3949ba59abbe56e057f20f883e', 'trainer', 'Active', 'janie@gmail.com', 'Accra', 'janie inc', 'fashion and stuff', '', 'Fashion', 0),
(7, 'Kofi Sammy', '0504263521', 'e10adc3949ba59abbe56e057f20f883e', 'trainee', 'Active', 'sammy@gmail.com', 'Sunyani', 'sammy inc', '', 'SHS', '', 0),
(8, 'joe thomas', '0202548765', 'e10adc3949ba59abbe56e057f20f883e', 'investor', 'Active', '', 'Tema', 'joe inc', 'not much', '', '', 238342184),
(9, 'james', '0504263521', 'e10adc3949ba59abbe56e057f20f883e', 'trainee', 'Active', 'james@gmail.com', 'Adenta', '', '', 'SHS', '', 559607881);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 09, 2022 at 02:16 PM
-- Server version: 10.4.22-MariaDB
-- PHP Version: 8.0.13

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `obrs`
--

-- --------------------------------------------------------

--
-- Table structure for table `bikes`
--

CREATE TABLE `bikes` (
  `id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `number_plate` varchar(100) NOT NULL,
  `cc` varchar(10) NOT NULL,
  `billbook` varchar(1000) NOT NULL,
  `tax_expiry_date` varchar(50) NOT NULL,
  `price` int(50) NOT NULL,
  `user_id` varchar(255) NOT NULL,
  `category_id` int(11) NOT NULL,
  `city_id` int(11) NOT NULL,
  `status` int(11) NOT NULL,
  `approve` varchar(40) NOT NULL DEFAULT 'approved'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `bikes`
--

INSERT INTO `bikes` (`id`, `name`, `number_plate`, `cc`, `billbook`, `tax_expiry_date`, `price`, `user_id`, `category_id`, `city_id`, `status`, `approve`) VALUES
(30, '4354', '2434', '222', '', '2022-03-14', 0, '39', 1, 2, 0, 'approved'),
(31, '4354', '2434', '222', '', '2022-03-14', 0, '39', 2, 0, 0, 'approved'),
(32, 'Yamaha fz', '34332', '107', '', '2022-03-23', 0, '39', 0, 1, 0, 'approved'),
(33, 'Yamaha fz', '34332', '107', '', '2022-03-23', 0, '39', 0, 0, 0, 'approved'),
(34, 'Beneli', '2453', '122', '', '2022-03-31', 200, '53', 1, 0, 0, 'approved'),
(35, 'Beneli', '2453', '122', '', '2022-03-16', 0, '41', 0, 0, 0, 'approved'),
(36, 'jask', '32', '130', '', '2022-03-22', 0, '39', 0, 0, 0, 'approved'),
(49, 'pulse', '200', '220', '6242a1658b0e9.pdf', '2022-04-09', 200, '55', 2, 2, 0, 'approved'),
(53, 'Yamaha New ', '34876', '230', '6239f5b75101b.pdf', '2022-03-24', 250, '48', 2, 1, 0, 'approved'),
(54, 'Honda ', '3212', '125', '624019f817d22.pdf', '2023-05-31', 200, '55', 2, 1, 0, 'approved'),
(55, 'th14', '23243', '222', '62404200087fd.pdf', '2022-03-08', 190, '55', 1, 1, 0, 'approved'),
(56, 'super', '13243ssc', '125', '624676ad29c56.pdf', '2022-05-05', 230, '59', 2, 2, 0, 'approved'),
(57, 'honda', '2312', '125', '624aa73fb23a2.pdf', '2022-04-20', 250, '61', 3, 2, 0, 'approved');

-- --------------------------------------------------------

--
-- Table structure for table `bike_images`
--

CREATE TABLE `bike_images` (
  `id` int(11) NOT NULL,
  `images` varchar(255) NOT NULL,
  `bike_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `bike_images`
--

INSERT INTO `bike_images` (`id`, `images`, `bike_id`) VALUES
(1, '622da2719fa1e.jpeg', 33),
(2, '622da2a5d60f2.jpeg', 34),
(3, '622da5a2e9e53.png', 35),
(4, '622da5c978db0.png', 36),
(5, '622da7924db66.png', 37),
(6, '622db9116706b.jpeg', 38),
(7, '622db9a07d316.jpeg', 38),
(8, '622db9d20af83.jpeg', 39),
(9, '622db9e2bc959.jpeg', 40),
(10, '622ef07115c42.jpeg', 41),
(11, '622ef0adb3a8b.jpeg', 42),
(12, '62320fbc05528.jpeg', 43),
(13, '62320fff30410.jpeg', 44),
(14, '623215d2940ed.jpeg', 45),
(15, '6232a55108efd.jpeg', 46),
(16, '6232f34875306.png', 47),
(17, '6232f4bd62963.jpeg', 48),
(18, '62429d6de7e7c.jpeg', 49),
(19, '6237374307a4f.jpeg', 50),
(20, '62382208eb6c6.jpeg', 51),
(21, '6238226ea5fcc.jpeg', 52),
(22, '6239f5b7505aa.jpeg', 53),
(23, '624019f7e1693.png', 54),
(24, '6240420006f33.jpeg', 55),
(25, '624676ad22624.jpeg', 56),
(26, '624aa73fa65e2.jpeg', 57);

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `description` varchar(400) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`id`, `name`, `description`) VALUES
(1, 'Classic', ''),
(2, 'Simple', 'kadnrfjnf'),
(3, 'Electric Bike', 'An electric bicycle is a motorized bicycle with an integrated electric motor used to assist propulsion. Many kinds of e-bikes are available worldwide, but they generally fall into two broad categories: bikes that assist the rider\'s pedal-power and bikes that add a throttle, integrating moped-style functionality.'),
(5, 'Others', 'Those Bikes which are uncategorized in our system .Those bikes comes under Others');

-- --------------------------------------------------------

--
-- Table structure for table `cities`
--

CREATE TABLE `cities` (
  `id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `longtitude` varchar(100) NOT NULL,
  `latitude` float NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `cities`
--

INSERT INTO `cities` (`id`, `name`, `longtitude`, `latitude`) VALUES
(1, 'Ratnanagar', '24.4321', 84.5117),
(2, 'Bharatpur', '12.233', 13.324);

-- --------------------------------------------------------

--
-- Table structure for table `notifications`
--

CREATE TABLE `notifications` (
  `id` int(11) NOT NULL,
  `text` text NOT NULL,
  `admin_id` int(11) NOT NULL,
  `renter_id` int(11) NOT NULL,
  `owner_id` int(11) NOT NULL,
  `bike_id` int(11) NOT NULL,
  `rent_id` int(11) NOT NULL,
  `seen` varchar(11) NOT NULL DEFAULT 'unseen',
  `date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `notifications`
--

INSERT INTO `notifications` (`id`, `text`, `admin_id`, `renter_id`, `owner_id`, `bike_id`, `rent_id`, `seen`, `date`) VALUES
(48, 'Dear Ankit Simkhada , Roshan Poudel had requested your bike for  13 Days  From  2022-04-07 to 2022-04-20', 0, 0, 61, 0, 0, 'seen', '0000-00-00'),
(49, 'Dear Ankit Simkhada , Roshan Poudel had requested your bike for  13 Days  From  2022-04-07 to 2022-04-20', 0, 0, 61, 0, 0, 'seen', '0000-00-00'),
(50, 'Dear Ankit Simkhada , Roshan Poudel had requested your bike for  13 Days  From  2022-04-07 to 2022-04-20', 0, 0, 61, 0, 0, 'seen', '0000-00-00'),
(51, ' Your Bike Request is Approved .  ', 0, 52, 0, 0, 0, '0', '2022-04-06'),
(52, ' Your Bike Request is Approved .  ', 0, 52, 0, 0, 0, '0', '2022-04-06'),
(53, ' Your Bike Request is Approved .  ', 0, 52, 0, 0, 0, '0', '2022-04-06'),
(54, ' Your Bike Request is Rejected .  ', 0, 52, 0, 0, 0, '0', '2022-04-06'),
(55, 'Dear Sagar , Roshan Poudel had requested your bike for  10 Days  From  2022-04-09 to 2022-04-19', 0, 0, 55, 0, 0, 'unseen', '0000-00-00'),
(56, 'Dear Ankit Simkhada , Roshan Poudel had requested your bike for  5 Days  From  2022-04-10 to 2022-04-15', 0, 0, 61, 0, 0, 'unseen', '0000-00-00');

-- --------------------------------------------------------

--
-- Table structure for table `rent`
--

CREATE TABLE `rent` (
  `id` int(11) NOT NULL,
  `renter_id` int(11) NOT NULL,
  `owner_id` int(11) NOT NULL,
  `bike_id` int(11) NOT NULL,
  `from_date` date NOT NULL,
  `to_date` date NOT NULL,
  `total_price` int(11) NOT NULL,
  `estimated_distance` int(50) NOT NULL,
  `status` varchar(100) NOT NULL,
  `ticket` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `rent`
--

INSERT INTO `rent` (`id`, `renter_id`, `owner_id`, `bike_id`, `from_date`, `to_date`, `total_price`, `estimated_distance`, `status`, `ticket`) VALUES
(1, 52, 0, 53, '2022-03-28', '2022-04-07', 0, 0, '0', '1648367490'),
(2, 52, 55, 54, '2022-03-28', '2022-04-08', 0, 0, '0', '1648368231'),
(3, 52, 55, 54, '2022-03-28', '2022-04-08', 0, 0, '0', '1648368345'),
(4, 52, 55, 54, '2022-03-28', '2022-04-08', 0, 0, '0', '1648368707'),
(5, 52, 55, 54, '2022-03-28', '2022-04-08', 0, 0, '0', '1648368743'),
(6, 52, 55, 54, '2022-03-28', '2022-04-08', 0, 0, '0', '1648368839'),
(7, 52, 55, 54, '2022-03-28', '2022-04-08', 0, 0, '0', '1648368898'),
(8, 52, 55, 54, '2022-03-28', '2022-04-09', 0, 0, '0', '1648379589'),
(9, 52, 55, 55, '2022-03-29', '2022-04-07', 0, 0, '0', '1648388902'),
(10, 52, 55, 54, '2022-03-28', '2022-04-07', 0, 0, '0', '1648389512'),
(11, 52, 55, 54, '2022-03-28', '2022-04-07', 0, 0, '0', '1648389687'),
(12, 52, 55, 53, '2022-03-28', '2022-04-08', 0, 0, '0', '1648389722'),
(13, 52, 55, 54, '2022-03-29', '2022-04-06', 0, 0, '0', '1648389822'),
(14, 52, 55, 49, '2022-03-28', '2022-04-07', 0, 0, '0', '1648399693'),
(15, 52, 55, 49, '2022-03-28', '2022-04-07', 0, 0, '0', '1648399697'),
(16, 52, 55, 54, '2022-03-29', '2022-04-07', 0, 0, '0', '1648405421'),
(17, 52, 0, 53, '2022-03-28', '2022-04-07', 0, 0, '0', '1648445125'),
(18, 52, 0, 53, '2022-03-28', '2022-04-07', 0, 0, '0', '1648445238'),
(19, 52, 55, 55, '2022-03-29', '2022-04-08', 0, 0, '0', '1648455144'),
(20, 52, 55, 55, '2022-03-28', '2022-04-08', 0, 0, '0', '1648474471'),
(21, 56, 55, 55, '2022-03-29', '2022-04-07', 0, 0, '0', '1648484885'),
(22, 56, 55, 55, '2022-03-29', '2022-04-07', 0, 0, '0', '1648485119'),
(23, 56, 55, 55, '2022-03-29', '2022-04-07', 0, 0, '0', '1648485216'),
(24, 56, 55, 55, '2022-03-29', '2022-04-07', 0, 0, '0', '1648485258'),
(25, 56, 55, 55, '2022-03-29', '2022-04-07', 0, 0, '2', '1648485287'),
(26, 56, 55, 55, '2022-03-29', '2022-04-07', 0, 0, '0', '1648485374'),
(27, 56, 55, 55, '2022-03-29', '2022-04-07', 0, 0, '0', '1648485432'),
(28, 56, 55, 55, '2022-03-29', '2022-04-07', 0, 0, '0', '1648485447'),
(29, 56, 55, 55, '2022-03-29', '2022-04-07', 0, 0, '0', '1648485555'),
(30, 56, 55, 55, '2022-03-29', '2022-04-07', 0, 0, '0', '1648485570'),
(31, 56, 55, 55, '2022-03-29', '2022-04-07', 0, 0, '0', '1648485589'),
(32, 56, 55, 55, '2022-03-29', '2022-04-07', 0, 0, '0', '1648485611'),
(33, 56, 55, 55, '2022-03-29', '2022-04-07', 0, 0, '0', '1648485631'),
(34, 56, 55, 55, '2022-03-29', '2022-04-07', 0, 0, '0', '1648485721'),
(35, 56, 55, 55, '2022-03-29', '2022-04-07', 0, 0, '0', '1648485857'),
(36, 56, 55, 55, '2022-03-29', '2022-04-07', 0, 0, '0', '1648485877'),
(37, 56, 55, 55, '2022-03-29', '2022-04-07', 0, 0, '0', '1648485958'),
(38, 56, 55, 55, '2022-03-29', '2022-04-07', 0, 0, '0', '1648485985'),
(39, 56, 55, 55, '2022-03-29', '2022-04-07', 0, 0, '0', '1648486095'),
(40, 56, 55, 55, '2022-03-29', '2022-04-07', 0, 0, '0', '1648486146'),
(41, 56, 55, 55, '2022-03-29', '2022-04-07', 0, 0, '0', '1648486162'),
(42, 56, 55, 55, '2022-03-29', '2022-04-07', 0, 0, '0', '1648486175'),
(43, 56, 55, 55, '2022-03-29', '2022-04-07', 0, 0, '0', '1648486233'),
(44, 56, 55, 55, '2022-03-29', '2022-04-07', 0, 0, '0', '1648486261'),
(45, 56, 55, 55, '2022-03-29', '2022-04-07', 0, 0, '0', '1648486503'),
(46, 56, 55, 55, '2022-03-29', '2022-04-07', 0, 0, '0', '1648486852'),
(47, 56, 55, 55, '2022-03-29', '2022-04-07', 0, 0, '0', '1648486994'),
(48, 56, 55, 55, '2022-03-29', '2022-04-07', 0, 0, '0', '1648487140'),
(49, 56, 55, 55, '2022-03-29', '2022-04-07', 0, 0, '0', '1648487172'),
(50, 56, 55, 55, '2022-03-29', '2022-04-07', 0, 0, '0', '1648487185'),
(51, 56, 55, 55, '2022-03-29', '2022-04-07', 0, 0, '0', '1648487208'),
(52, 56, 55, 55, '2022-03-29', '2022-04-07', 0, 0, '0', '1648487219'),
(53, 56, 55, 55, '2022-03-29', '2022-04-07', 0, 0, '0', '1648487268'),
(54, 56, 55, 55, '2022-03-29', '2022-04-07', 0, 0, '0', '1648487277'),
(55, 56, 55, 55, '2022-03-29', '2022-04-07', 0, 0, '0', '1648487325'),
(56, 56, 55, 55, '2022-03-29', '2022-04-07', 0, 0, '0', '1648487366'),
(57, 56, 55, 55, '2022-03-29', '2022-04-07', 0, 0, '0', '1648487395'),
(58, 56, 55, 55, '2022-03-30', '2022-03-30', 0, 0, '1', '1648487539'),
(59, 56, 55, 55, '2022-03-30', '2022-03-30', 0, 0, '0', '1648487539'),
(60, 56, 55, 55, '2022-03-30', '2022-03-30', 0, 0, '0', '1648487539'),
(61, 56, 55, 55, '2022-03-30', '2022-03-30', 0, 0, '0', '1648487539'),
(62, 56, 55, 55, '2022-03-30', '2022-03-30', 0, 0, '0', '1648487539'),
(63, 56, 55, 55, '2022-03-30', '2022-03-30', 0, 0, '0', '1648487539'),
(64, 56, 55, 55, '2022-03-30', '2022-03-30', 0, 0, '0', '1648487539'),
(65, 56, 55, 55, '2022-03-30', '2022-03-30', 0, 0, '0', '1648487539'),
(66, 56, 55, 55, '2022-03-30', '2022-03-30', 0, 0, '0', '1648487539'),
(67, 56, 55, 55, '2022-03-30', '2022-03-30', 0, 0, '0', '1648487539'),
(68, 56, 55, 55, '2022-03-30', '2022-03-30', 0, 0, '0', '1648487539'),
(69, 56, 55, 55, '2022-03-30', '2022-03-30', 0, 0, '0', '1648487539'),
(70, 56, 55, 55, '2022-03-30', '2022-03-30', 0, 0, '0', '1648487539'),
(71, 56, 55, 55, '2022-03-30', '2022-03-30', 0, 0, '0', '1648487539'),
(72, 56, 55, 55, '2022-03-30', '2022-03-30', 0, 0, '0', '1648487539'),
(73, 56, 55, 55, '2022-03-30', '2022-03-30', 0, 0, '0', '1648487539'),
(74, 56, 55, 55, '2022-03-30', '2022-03-30', 0, 0, '0', '1648487539'),
(75, 56, 55, 55, '2022-03-30', '2022-03-30', 0, 0, '0', '1648487539'),
(76, 56, 55, 55, '2022-03-29', '2022-04-09', 0, 0, '0', '1648489257'),
(81, 56, 55, 54, '2022-03-30', '2022-04-09', 0, 0, '0', '1648489833'),
(83, 56, 55, 54, '2022-03-30', '2022-04-09', 0, 0, '0', '1648489975'),
(84, 56, 55, 54, '2022-03-30', '2022-04-09', 0, 0, '0', '1648489975'),
(85, 56, 55, 54, '2022-03-29', '2022-04-09', 0, 0, '0', '1648491017'),
(86, 56, 55, 54, '2022-03-29', '2022-04-09', 0, 0, '0', '1648491054'),
(87, 56, 55, 54, '2022-03-29', '2022-04-09', 0, 0, '0', '1648491054'),
(88, 56, 55, 54, '2022-03-29', '2022-04-09', 0, 0, '0', '1648491054'),
(89, 57, 55, 55, '2022-03-30', '2022-04-08', 0, 0, '0', '1648545322'),
(90, 57, 55, 55, '2022-03-30', '2022-04-09', 0, 0, '0', '1648545528'),
(91, 57, 55, 55, '2022-03-30', '2022-04-09', 0, 0, '0', '1648545528'),
(92, 52, 59, 54, '2022-03-29', '2022-04-06', 0, 0, '2', '1648617276'),
(93, 52, 59, 56, '2022-04-03', '2022-04-11', 0, 0, '0', '1648805901'),
(110, 52, 55, 55, '2022-04-07', '2022-04-14', 1330, 0, '0', '8624'),
(111, 52, 55, 55, '2022-04-07', '2022-04-14', 1330, 0, '0', '8624'),
(112, 62, 55, 55, '2022-04-07', '2022-04-14', 1330, 0, '0', '8624'),
(120, 52, 55, 55, '2022-04-09', '2022-04-19', 1900, 0, '1', '6250025d66315'),
(121, 52, 61, 57, '2022-04-10', '2022-04-15', 1250, 0, '1', '625117dd8e7ca');

-- --------------------------------------------------------

--
-- Table structure for table `review`
--

CREATE TABLE `review` (
  `id` int(11) NOT NULL,
  `review` text NOT NULL,
  `bike_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `password` varchar(255) NOT NULL,
  `dob` varchar(16) NOT NULL,
  `address` varchar(100) NOT NULL,
  `citizenship_number` varchar(50) NOT NULL,
  `license_number` varchar(50) NOT NULL,
  `personal_image` varchar(250) NOT NULL,
  `role` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `password`, `dob`, `address`, `citizenship_number`, `license_number`, `personal_image`, `role`) VALUES
(50, 'Admin', '', '$2y$10$G/A.2L/ROVDGDWed/voxT.VHA532DyOsyHRpPOyqoeB6c4XRqonbe', '', '', '', '', '', 'admin'),
(52, 'Roshan Poudel', 'roshan@gmail.com', '$2y$10$ZWMPhNPmO3X/C76N/fNGd.U.qpmedjP7e9NWKXC3lCGw0lZxpjrxe', '2000-08-26', 'shital', '123333333', '1213333', '623e9f8cb5195.jpeg', 'renter'),
(53, 'owner', 'owner@gmail.com', '$2y$10$T8.RkFJ7hUwaQ9gjeUXzSOGEA6aX78mBugvaUIRq84LTen.QcGmXy', '2000-02-02', 'shital', '22222', '2222222222', '623ec3ba52181.jpeg', 'owner'),
(54, 'name', '', '$2y$10$/iAcBylBMWpKvNxVc56GGOEfFz01mJAvO0HvHsk8z16I1x3h5zCtm', '2022-03-08', 'Baglung-12, Amalachaur, Baglung-12, Amalachaur', '', '', '', 'admin'),
(55, 'Sagar', 'sagar@gmail.com', '$2y$10$PGjybWrNQsvChG9hIY4zO.eaWjYbgCtltX41JYtGNG6BQtP5vBRt.', '2000-03-23', 'shital', '12345678901', '1234567890', '624018fd5bfdb.jpeg', 'owner'),
(56, 'Ram Sharma', 'ram@gmail.com', '$2y$10$tO1pd4PaYWL3bWX.YlqHu.nXyTpYEyWl3kPSUSxyMzlv2nFWjQsYa', '2000-02-02', 'Bharatpur-23 ', '1234567890', '1234567890', '62417f3f28fef.jpeg', 'renter'),
(57, 'Pramod', 'Pramod@gmail.com', '$2y$10$6Ex8C0SdXF73PJKx6rWWE.Ym2OiIPfp1QFA8o/xtvON8uVId6Y2CC', '2000-03-24', 'gaidakot-2', '1234567890', '1234567890', '', 'renter'),
(58, 'Pramod Chhetri', 'govinda@gmail.com', '$2y$10$Yj0Jqg1TTt/khDDU5i9ktOBUh6UZGrsEUqjgPA4RLO3Ws4lfC9WFK', '2000-03-04', 'shital', '1234567890', '1234567890', '', 'renter'),
(59, 'sagar', 'mahendra@gmail.com', '$2y$10$/g4W6Q0H8JDFVGEaXpgK9u.gD2.kFksI1jhKSa6fwvoMxD8E1Gqt2', '2000-03-24', 'shital', '1234567890', '1234567890', '', 'owner'),
(60, 'govinda', 'parajuligovinda541@gmail.com', '$2y$10$WFAZFdl9tGB8adX28U4k.ewnIrgmd0nvE8cxi6KXXWHnssQL7eQmK', '2000-07-09', 'GORKHA- HARMI', '11-1-111--11', '1234', '', 'renter'),
(61, 'Ankit Simkhada', 'ankit@gmail.com', '$2y$10$9xVgZL4Hw9vs38QgkTVsNuS8mUk8t64f/1XfJ.zr0vW49k5Njx3sy', '2000-04-27', 'Ratnanagar-9,Chitwan,Nepal', '1234567890', '1234567890', '', 'owner'),
(62, 'Nischal', 'nischal@gmail.com', '$2y$10$r3tvkM5uk3PRBmiBwHeUpuuLxBhtylyKq3tYBxoI1B/BPYmSkRhy.', '1999-10-21', 'dsd123', '123123', '12312', '', 'renter');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `bikes`
--
ALTER TABLE `bikes`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `bike_images`
--
ALTER TABLE `bike_images`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `cities`
--
ALTER TABLE `cities`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `notifications`
--
ALTER TABLE `notifications`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `rent`
--
ALTER TABLE `rent`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `review`
--
ALTER TABLE `review`
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
-- AUTO_INCREMENT for table `bikes`
--
ALTER TABLE `bikes`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=58;

--
-- AUTO_INCREMENT for table `bike_images`
--
ALTER TABLE `bike_images`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `cities`
--
ALTER TABLE `cities`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `notifications`
--
ALTER TABLE `notifications`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=57;

--
-- AUTO_INCREMENT for table `rent`
--
ALTER TABLE `rent`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=122;

--
-- AUTO_INCREMENT for table `review`
--
ALTER TABLE `review`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=63;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

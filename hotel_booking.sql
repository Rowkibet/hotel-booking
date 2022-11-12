-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 12, 2022 at 05:40 PM
-- Server version: 10.4.21-MariaDB
-- PHP Version: 7.3.31

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `hotel_booking`
--

-- --------------------------------------------------------

--
-- Table structure for table `booking`
--

CREATE TABLE `booking` (
  `id` int(50) NOT NULL,
  `check_in_date` date NOT NULL,
  `check_out_date` date NOT NULL,
  `nights` int(100) NOT NULL,
  `amount` int(100) NOT NULL,
  `booking_date` date NOT NULL DEFAULT current_timestamp(),
  `booking_status_id` int(11) NOT NULL,
  `user_id` int(50) NOT NULL,
  `room_id` int(50) NOT NULL,
  `room_type_id` int(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `booking`
--

INSERT INTO `booking` (`id`, `check_in_date`, `check_out_date`, `nights`, `amount`, `booking_date`, `booking_status_id`, `user_id`, `room_id`, `room_type_id`) VALUES
(20, '2022-11-12', '2022-11-14', 2, 6000, '2022-11-12', 4, 25, 5, 1);

-- --------------------------------------------------------

--
-- Table structure for table `booking_status`
--

CREATE TABLE `booking_status` (
  `id` int(11) NOT NULL,
  `name` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `booking_status`
--

INSERT INTO `booking_status` (`id`, `name`) VALUES
(1, 'pending'),
(3, 'checkedin'),
(4, 'checkedout');

-- --------------------------------------------------------

--
-- Table structure for table `payments`
--

CREATE TABLE `payments` (
  `payment_id` int(50) NOT NULL,
  `receipt_no` varchar(30) NOT NULL,
  `payment_date` date NOT NULL DEFAULT current_timestamp(),
  `amount_paid` int(100) NOT NULL,
  `payment_type_id` int(50) NOT NULL,
  `user_id` int(50) NOT NULL,
  `booking_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `payments`
--

INSERT INTO `payments` (`payment_id`, `receipt_no`, `payment_date`, `amount_paid`, `payment_type_id`, `user_id`, `booking_id`) VALUES
(18, 'FC16D3DF76', '2022-11-12', 6000, 1, 25, 20);

-- --------------------------------------------------------

--
-- Table structure for table `payment_type`
--

CREATE TABLE `payment_type` (
  `id` int(50) NOT NULL,
  `p_type` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `payment_type`
--

INSERT INTO `payment_type` (`id`, `p_type`) VALUES
(1, 'Mpesa'),
(2, 'Bank Cheque');

-- --------------------------------------------------------

--
-- Table structure for table `roles`
--

CREATE TABLE `roles` (
  `id` int(11) NOT NULL,
  `role_type` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `roles`
--

INSERT INTO `roles` (`id`, `role_type`) VALUES
(1, 'admin'),
(2, 'guest'),
(3, 'receptionist');

-- --------------------------------------------------------

--
-- Table structure for table `rooms`
--

CREATE TABLE `rooms` (
  `id` int(11) NOT NULL,
  `room_images` varchar(255) NOT NULL,
  `is_available` tinyint(2) NOT NULL,
  `room_type_id` int(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `rooms`
--

INSERT INTO `rooms` (`id`, `room_images`, `is_available`, `room_type_id`) VALUES
(2, '1665912412_room_2.jpg', 1, 2),
(3, '1665912437_room_2.jpg', 1, 3),
(4, '1667216025_room_4.jpg', 1, 2),
(5, '1665236237_hotel_room_image.jpg', 1, 1),
(6, '1665236261_hotel_room_image.jpg', 1, 1),
(7, '1665922012_room_1.jpg', 1, 3),
(9, '1665935900_room_4.jpg', 1, 2),
(10, '1665935919_room_3.jpg', 1, 2),
(11, '1667299119_hotel_room_image_2.jpg', 1, 1),
(12, '1667299205_room_1.jpg', 1, 3);

-- --------------------------------------------------------

--
-- Table structure for table `room_type`
--

CREATE TABLE `room_type` (
  `id` int(100) NOT NULL,
  `name` varchar(100) NOT NULL,
  `no_of_beds` int(50) NOT NULL,
  `price` int(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `room_type`
--

INSERT INTO `room_type` (`id`, `name`, `no_of_beds`, `price`) VALUES
(1, 'Single Room', 1, 3000),
(2, 'Double Room', 2, 5000),
(3, 'Family Room', 4, 8000);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `first_name` varchar(20) NOT NULL,
  `last_name` varchar(20) NOT NULL,
  `email` varchar(255) NOT NULL,
  `address` varchar(30) NOT NULL,
  `phone_no` varchar(10) NOT NULL,
  `passport` varchar(30) NOT NULL,
  `nationality` varchar(50) NOT NULL,
  `password` varchar(255) NOT NULL,
  `role_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `first_name`, `last_name`, `email`, `address`, `phone_no`, `passport`, `nationality`, `password`, `role_id`) VALUES
(6, 'Mike', 'Kirwa', 'mike@gmail.com', 'adfsa', '0723868921', '2424352', 'Kenya', '$2y$10$FZExnXsqxp7rJvo7Xlxl.OrYYbBBLK4b5kOU.iKWa1EJJxBKeRIMu', 2),
(13, 'John', 'Kamau', 'john@email.com', 'adfsa', '0723862324', '4245534', 'Kenya', '$2y$10$OFLeORIgy6C46fwHF.E99ePdZQRnAj2JI4NJ7vtj8y5GC7NgnK876', 1),
(14, 'Mark', 'Omondi', 'mark@gmail.com', '2345253', '0754363994', '2424352', 'Kenya', '$2y$10$TpFSrfc2u90qq2dn8ojA9..u6UoJ4tAzSzYwpSKqxVlyjqRk/ELGq', 2),
(20, 'Jane', 'Cheptoo', 'jane@gmail.com', '3252', '0772497252', '2424352', 'Kenya', '$2y$10$vd9.OEyfpQpuah9aahQC1uz0N8EMaFn2/l3gCx0ZGsWpnqcTve2RK', 2),
(21, 'Jack', 'Kinuthia', 'jack@gmail.com', 'adfsa', '0734547938', '2424352', 'Kenya', '$2y$10$OLrttU1UlOGHqZEoVCptmOxImniu0bAF6jdekgKLfTKaayOWXCAaG', 2),
(22, 'Peter', 'Koech', 'peter@gmail.com', 'adfsa', '0722893759', '2424352', 'Kenya', '$2y$10$Dvyj3ziQwhQOB97peTT/jOoQq8V36BB6UFf0YWX/K3n8VLI3gUqgK', 2),
(23, 'Patrick', 'Mutisya', 'patrick@gmail.com', 'adfsa', '0778237858', '2424352', 'Kenya', '$2y$10$ga500JVVHQPINcU0.sx0S.7DasYmCbYfneJNfuCiCo5hDc56J17DC', 3),
(25, 'Rowland', 'Koech', 'rowkibet@gmail.com', '7567', '0717105322', '4245534', 'Kenya', '$2y$10$aFltK4atV3RsTmq/pQ86e.HMtfr6htnRPGCSC.0g/Pg0rewuTbRLS', 2);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `booking`
--
ALTER TABLE `booking`
  ADD PRIMARY KEY (`id`),
  ADD KEY `booking_ibfk_1` (`booking_status_id`),
  ADD KEY `booking_ibfk_2` (`room_id`),
  ADD KEY `booking_ibfk_3` (`user_id`),
  ADD KEY `booking_ibfk_4` (`room_type_id`);

--
-- Indexes for table `booking_status`
--
ALTER TABLE `booking_status`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `payments`
--
ALTER TABLE `payments`
  ADD PRIMARY KEY (`payment_id`),
  ADD KEY `payment_type_id` (`payment_type_id`),
  ADD KEY `user_id` (`user_id`),
  ADD KEY `booking_id` (`booking_id`);

--
-- Indexes for table `payment_type`
--
ALTER TABLE `payment_type`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `roles`
--
ALTER TABLE `roles`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `rooms`
--
ALTER TABLE `rooms`
  ADD PRIMARY KEY (`id`),
  ADD KEY `room_type_id` (`room_type_id`);

--
-- Indexes for table `room_type`
--
ALTER TABLE `room_type`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `email` (`email`),
  ADD KEY `role_id` (`role_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `booking`
--
ALTER TABLE `booking`
  MODIFY `id` int(50) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT for table `booking_status`
--
ALTER TABLE `booking_status`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `payments`
--
ALTER TABLE `payments`
  MODIFY `payment_id` int(50) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT for table `payment_type`
--
ALTER TABLE `payment_type`
  MODIFY `id` int(50) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `roles`
--
ALTER TABLE `roles`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `rooms`
--
ALTER TABLE `rooms`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `room_type`
--
ALTER TABLE `room_type`
  MODIFY `id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `booking`
--
ALTER TABLE `booking`
  ADD CONSTRAINT `booking_ibfk_1` FOREIGN KEY (`booking_status_id`) REFERENCES `booking_status` (`id`),
  ADD CONSTRAINT `booking_ibfk_2` FOREIGN KEY (`room_id`) REFERENCES `rooms` (`id`),
  ADD CONSTRAINT `booking_ibfk_3` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`),
  ADD CONSTRAINT `booking_ibfk_4` FOREIGN KEY (`room_type_id`) REFERENCES `room_type` (`id`);

--
-- Constraints for table `payments`
--
ALTER TABLE `payments`
  ADD CONSTRAINT `payments_ibfk_1` FOREIGN KEY (`payment_type_id`) REFERENCES `payment_type` (`id`),
  ADD CONSTRAINT `payments_ibfk_2` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`),
  ADD CONSTRAINT `payments_ibfk_3` FOREIGN KEY (`booking_id`) REFERENCES `booking` (`id`);

--
-- Constraints for table `rooms`
--
ALTER TABLE `rooms`
  ADD CONSTRAINT `rooms_ibfk_1` FOREIGN KEY (`room_type_id`) REFERENCES `room_type` (`id`) ON UPDATE CASCADE;

--
-- Constraints for table `users`
--
ALTER TABLE `users`
  ADD CONSTRAINT `users_ibfk_1` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`) ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

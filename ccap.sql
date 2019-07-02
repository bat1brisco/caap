-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 28, 2019 at 02:24 PM
-- Server version: 10.1.38-MariaDB
-- PHP Version: 7.3.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `ccap`
--

-- --------------------------------------------------------

--
-- Table structure for table `cars`
--

CREATE TABLE `cars` (
  `car_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `make` varchar(75) NOT NULL,
  `model` varchar(100) NOT NULL,
  `year` varchar(4) NOT NULL,
  `price` int(11) NOT NULL,
  `car_status` enum('sold','available') NOT NULL,
  `transmission` enum('Automatic','Manual') NOT NULL,
  `seating_capacity` int(3) NOT NULL,
  `body_style` enum('Sedan','Pickup','Coupe','SUV','Hatchback','Van','Minivan') NOT NULL,
  `mileage` int(11) NOT NULL,
  `color` varchar(20) NOT NULL,
  `cylinder_engine` varchar(100) NOT NULL,
  `door` int(2) NOT NULL,
  `drive_type` enum('AWD','4WD','FWD','RWD') NOT NULL,
  `fuel_type` enum('Gasoline','Diesel','LPG','Ethanol','Bio-diesel') NOT NULL,
  `description` text NOT NULL,
  `rfs` text NOT NULL,
  `post_image` varchar(255) NOT NULL,
  `date_posted` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `notification_listing` tinyint(1) NOT NULL,
  `slug` varchar(255) NOT NULL,
  `status` enum('Approved','Declined','Pending','Sold') NOT NULL DEFAULT 'Pending'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `cars`
--

INSERT INTO `cars` (`car_id`, `user_id`, `make`, `model`, `year`, `price`, `car_status`, `transmission`, `seating_capacity`, `body_style`, `mileage`, `color`, `cylinder_engine`, `door`, `drive_type`, `fuel_type`, `description`, `rfs`, `post_image`, `date_posted`, `notification_listing`, `slug`, `status`) VALUES
(1, 9, 'Toyota', 'Altis', '2006', 450000, 'available', 'Manual', 5, 'Sedan', 190, 'White', '1.6 Liter Inline 4', 4, 'FWD', 'Gasoline', '2006 Toyota Sedan', 'Extra unit', 'noimage.png', '2019-05-09 05:39:43', 0, 'Toyotaf2yambeq3k', 'Approved'),
(2, 9, 'Toyota', 'Camry', '2017', 890000, 'available', 'Automatic', 5, 'Sedan', 100, 'Gray', '1.4 Liter Inline 4', 4, 'FWD', 'Gasoline', '2017 Toyota sedan', 'Extra unit', 'noimage.png', '2019-05-12 02:10:53', 0, 'Toyota05hx13ubgw', 'Approved'),
(3, 9, 'Suzuki', 'Grand Vitara', '2005', 650000, 'available', 'Automatic', 7, 'SUV', 200, 'Maroon', '1.5 Liter Inline 4', 5, 'FWD', 'Diesel', '2005 SUV', 'Extra unit', 'noimage.png', '2019-05-12 02:17:44', 0, 'Suzukik6xsgw54jo', 'Approved'),
(4, 9, 'Honda', 'Civic', '2003', 750000, 'available', 'Manual', 4, 'Coupe', 230, 'White', '1.5 Liter v4', 2, 'FWD', 'Gasoline', '2003 Classic sport coupe', 'Extra unit', 'noimage.png', '2019-05-12 02:21:17', 0, 'Hondaftpgz9nko1', 'Declined'),
(5, 9, 'Toyota', 'Camry', '2017', 890000, 'available', 'Automatic', 5, 'Sedan', 100, 'White', '1.5 Liter Inline 4', 4, 'FWD', 'Gasoline', '2017 Sedan', 'Extra unit', 'noimage.png', '2019-05-12 02:49:03', 0, 'Toyotatl5ed7c69a', 'Approved'),
(6, 9, 'Honda', 'Civic', '2003', 750000, 'available', 'Manual', 4, 'Coupe', 230, 'Black', '1.5 Liter v4', 2, 'FWD', 'Gasoline', '2003 sport coupe', 'extra unit', 'noimage.png', '2019-05-12 02:57:13', 0, 'Hondarceauqjk7n', 'Declined'),
(7, 9, 'Honda', 'Civic', '2003', 750000, 'available', 'Manual', 4, 'Coupe', 230, 'White', '1.5 Liter v4', 2, 'FWD', 'Gasoline', '2003 Coupe', 'Extra unit', 'noimage.png', '2019-05-12 04:07:45', 0, 'Hondape3bfr7my2', 'Pending'),
(8, 9, 'Honda', 'Civic', '2001', 750000, 'available', 'Manual', 4, 'Coupe', 230, 'White', '1.5 Liter v4', 2, 'FWD', 'Gasoline', '2001 Coupe', 'Extra unit', 'noimage.png', '2019-05-12 04:21:47', 0, 'Hondav0n8q5oh2a', 'Pending');

-- --------------------------------------------------------

--
-- Table structure for table `car_comments`
--

CREATE TABLE `car_comments` (
  `car_comment_id` int(11) NOT NULL,
  `car_id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `body` text NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `car_ratings`
--

CREATE TABLE `car_ratings` (
  `car_rating_id` int(11) NOT NULL,
  `car_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `car_rating` int(11) NOT NULL,
  `comment` text NOT NULL,
  `time_stamp` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `messages`
--

CREATE TABLE `messages` (
  `message_id` int(11) NOT NULL,
  `from_user_id` int(11) NOT NULL,
  `to_user_id` int(11) NOT NULL,
  `chat_message` text NOT NULL,
  `time_stamp` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `message_status` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `notifications`
--

CREATE TABLE `notifications` (
  `notification_id` int(11) NOT NULL,
  `notification_message` varchar(256) NOT NULL,
  `notif_date` varchar(15) NOT NULL,
  `status` enum('Read','Unread') NOT NULL,
  `user_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `notifications`
--

INSERT INTO `notifications` (`notification_id`, `notification_message`, `notif_date`, `status`, `user_id`) VALUES
(1, 'Alfred Adrea has posted a new car.', 'May 08, 2019', 'Unread', 1),
(2, 'Your requested post has been approved.', 'May 08, 2019', 'Read', 9),
(3, 'Alfred Adrea has posted a new car.', 'May 08, 2019', 'Unread', 1),
(4, 'Your requested post has been approved.', 'May 08, 2019', 'Read', 9),
(5, 'Alfred Adrea has posted a new car.', 'May 09, 2019', 'Unread', 1),
(6, 'Your requested post has been approved.', 'May 09, 2019', 'Read', 9),
(7, 'Alfred Adrea has posted a new car.', 'May 09, 2019', 'Unread', 1),
(8, 'Your requested post has been approved.', 'May 09, 2019', 'Read', 9),
(9, 'Alfred Adrea has posted a new car.', 'May 12, 2019', 'Unread', 1),
(10, 'Your requested post has been approved.', 'May 12, 2019', 'Read', 9),
(11, 'Alfred Adrea has posted a new car.', 'May 12, 2019', 'Unread', 1),
(12, 'Alfred Adrea has posted a new car.', 'May 12, 2019', 'Unread', 1),
(13, 'Alfred Adrea has posted a new car.', 'May 12, 2019', 'Unread', 1),
(14, 'Alfred Adrea has posted a new car.', 'May 12, 2019', 'Unread', 1),
(15, 'Alfred Adrea has posted a new car.', 'May 12, 2019', 'Unread', 1),
(16, 'Alfred Adrea has posted a new car.', 'May 12, 2019', 'Read', 2),
(17, 'Alfred Adrea has posted a new car.', 'May 12, 2019', 'Unread', 3),
(18, 'Alfred Adrea has posted a new car.', 'May 12, 2019', 'Unread', 4),
(19, 'Your requested post has been declined.', 'May 12, 2019', 'Read', 9),
(20, 'Your requested post has been declined.', 'May 12, 2019', 'Read', 9),
(21, 'Alfred Adrea has posted a new car.', 'May 12, 2019', 'Unread', 1),
(22, 'Alfred Adrea has posted a new car.', 'May 12, 2019', 'Read', 2),
(23, 'Alfred Adrea has posted a new car.', 'May 12, 2019', 'Unread', 3),
(24, 'Alfred Adrea has posted a new car.', 'May 12, 2019', 'Unread', 4),
(25, ' is registering as a new account.', 'May 12, 2019', 'Unread', 1),
(26, ' is registering as a new account.', 'May 12, 2019', 'Read', 2),
(27, ' is registering as a new account.', 'May 12, 2019', 'Unread', 3),
(28, ' is registering as a new account.', 'May 12, 2019', 'Unread', 4),
(29, ' is registering for a new account.', 'May 12, 2019', 'Unread', 1),
(30, ' is registering for a new account.', 'May 12, 2019', 'Read', 2),
(31, ' is registering for a new account.', 'May 12, 2019', 'Unread', 3),
(32, ' is registering for a new account.', 'May 12, 2019', 'Unread', 4),
(33, 'Your requested post has been approved.', 'May 12, 2019', 'Read', 9);

-- --------------------------------------------------------

--
-- Table structure for table `parts`
--

CREATE TABLE `parts` (
  `parts_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `price` int(11) NOT NULL,
  `category` enum('Wheels','Tires','Internal Accessories','Suspension','Transmission','Drive shafts','Brakes','Engine','External Accessories') NOT NULL,
  `brand` varchar(150) NOT NULL,
  `color` varchar(100) NOT NULL,
  `description` text NOT NULL,
  `parts_quantity` int(11) NOT NULL,
  `date_posted` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `parts_status` enum('sold','available','pending','declined') NOT NULL,
  `model_name` varchar(150) NOT NULL,
  `rfs` text NOT NULL,
  `notification_listing` tinyint(1) NOT NULL,
  `status` enum('Approved','Declined','Pending','Sold') NOT NULL DEFAULT 'Pending',
  `slug` varchar(50) NOT NULL,
  `post_image` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `parts_comments`
--

CREATE TABLE `parts_comments` (
  `parts_comment_id` int(11) NOT NULL,
  `parts_id` int(11) NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `body` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `parts_ratings`
--

CREATE TABLE `parts_ratings` (
  `parts_rating_id` int(11) NOT NULL,
  `parts_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `parts_rating` int(11) NOT NULL,
  `comment` text NOT NULL,
  `time_stamp` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `reports`
--

CREATE TABLE `reports` (
  `report_id` int(11) NOT NULL,
  `car_id` int(11) NOT NULL,
  `parts_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `user_id` int(11) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `fname` varchar(255) NOT NULL,
  `mname` varchar(255) NOT NULL,
  `lname` varchar(255) NOT NULL,
  `address` varchar(255) NOT NULL,
  `contact` varchar(12) NOT NULL,
  `user_type` enum('admin','user') NOT NULL,
  `status` enum('Approved','Declined','Pending') NOT NULL DEFAULT 'Declined'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`user_id`, `email`, `password`, `fname`, `mname`, `lname`, `address`, `contact`, `user_type`, `status`) VALUES
(1, 'jimmyaldiano@gmail.com', 'c2fe677a63ffd5b7ffd8facbf327dad0', 'Jimmy', 'Inocencio', 'Aldiano', 'Pitogo, Consolacion, Cebu', '09812773849', 'admin', 'Approved'),
(2, 'alexsantos@gmail.com', '534b44a19bf18d20b71ecc4eb77c572f', 'Alexander', 'Cruz', 'Santos', 'Nasipit, Talamban, Cebu', '09382118349', 'admin', 'Approved'),
(3, 'christopherjacinto@yahoo.com', '6b34fe24ac2ff8103f6fce1f0da2ef57', 'Christopher', 'Malinao', 'Jacinto', 'Poblacion, Occidental, Consolacion, Cebu', '09218228374', 'admin', 'Approved'),
(4, 'dinocruz@yahoo.com', 'b246ff693d453c3b1a3049752da2bc75', 'Dino', 'Aldiano', 'Cruz', 'Poblacion, Oriental, Consolacion, Cebu', '09283994875', 'admin', 'Approved'),
(5, 'craigtuyao@gmail.com', '14084800449265ee16a75ea7465d01b6', 'Craig', 'Semana', 'Tuyao', 'Tayud, Lilo-an, Cebu', '09483448591', 'user', 'Pending'),
(6, 'gabrieltomas@yahoo.com', '639bee393eecbc62256936a8e64d17b1', 'Gabriel', 'Alipe', 'Tomas', 'Tayud, Consolacion, Cebu', '09384775938', 'user', 'Approved'),
(7, 'ginocruz@yahoo.com', '09ad68ccea425181b0f3384a47eb0ee7', 'Gino', 'Deladia', 'Cruz', 'P. Del Rosario, Cebu City', '09384885939', 'user', 'Pending'),
(8, 'gerardogenerales@yahoo.com', '4024fb06e1423da90b80f0274e8e4476', 'Gerardo', 'Pantaleon', 'Generales', 'Banilad, Cebu City', '09483994851', 'user', 'Pending'),
(9, 'alfredadrea@yahoo.com', '29cb2448018800ab65a9de297548b6e0', 'Alfred', 'Cruz', 'Adrea', 'Garing, Consolacion, Cebu', '09384995832', 'user', 'Approved'),
(10, 'cliffordadriatico@yahoo.com', 'f15c041d08ec4a285457201287406d0d', 'Clifford', 'Cruz', 'Adriatico', 'Nangka, Consolacion, Cebu', '09328338492', 'user', 'Pending'),
(11, 'cliffordadriatico@yahoo.com', 'f15c041d08ec4a285457201287406d0d', 'Clifford', 'Cruz', 'Adriatico', 'Nangka, Consolacion, Cebu', '09328338492', 'user', 'Pending'),
(12, 'martinpontia@gmail.com', '925d7518fc597af0e43f5606f9a51512', 'Martin', 'Jugan', 'Pontia', 'Casili, Consolacion, Cebu', '09384994950', 'user', 'Pending'),
(13, 'martinpontia@gmail.com', '925d7518fc597af0e43f5606f9a51512', 'Martin', 'Jugan', 'Pontia', 'Casili, Consolacion, Cebu', '09384994950', 'user', 'Pending');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `cars`
--
ALTER TABLE `cars`
  ADD PRIMARY KEY (`car_id`),
  ADD KEY `fk_car_id` (`user_id`);

--
-- Indexes for table `car_comments`
--
ALTER TABLE `car_comments`
  ADD PRIMARY KEY (`car_comment_id`),
  ADD KEY `fk_car_comments_id` (`car_id`);

--
-- Indexes for table `car_ratings`
--
ALTER TABLE `car_ratings`
  ADD PRIMARY KEY (`car_rating_id`),
  ADD KEY `fk_car_rating_id` (`car_id`),
  ADD KEY `fk_car_user_id_id` (`user_id`);

--
-- Indexes for table `messages`
--
ALTER TABLE `messages`
  ADD PRIMARY KEY (`message_id`),
  ADD KEY `messages_user_from_user_id` (`from_user_id`);

--
-- Indexes for table `notifications`
--
ALTER TABLE `notifications`
  ADD PRIMARY KEY (`notification_id`),
  ADD KEY `fk_notifications_id` (`user_id`);

--
-- Indexes for table `parts`
--
ALTER TABLE `parts`
  ADD PRIMARY KEY (`parts_id`),
  ADD KEY `fk_part_id` (`user_id`);

--
-- Indexes for table `parts_comments`
--
ALTER TABLE `parts_comments`
  ADD PRIMARY KEY (`parts_comment_id`),
  ADD KEY `fk_parts_comments_id` (`parts_id`);

--
-- Indexes for table `parts_ratings`
--
ALTER TABLE `parts_ratings`
  ADD PRIMARY KEY (`parts_rating_id`),
  ADD KEY `fk_parts_rating_id` (`parts_id`),
  ADD KEY `fk_parts_user_id_id` (`user_id`);

--
-- Indexes for table `reports`
--
ALTER TABLE `reports`
  ADD PRIMARY KEY (`report_id`),
  ADD KEY `fk_car_status_id` (`car_id`),
  ADD KEY `fk_part_status_id` (`parts_id`),
  ADD KEY `fk_reports_user_id` (`user_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`user_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `cars`
--
ALTER TABLE `cars`
  MODIFY `car_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `car_ratings`
--
ALTER TABLE `car_ratings`
  MODIFY `car_rating_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `messages`
--
ALTER TABLE `messages`
  MODIFY `message_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `notifications`
--
ALTER TABLE `notifications`
  MODIFY `notification_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=34;

--
-- AUTO_INCREMENT for table `parts`
--
ALTER TABLE `parts`
  MODIFY `parts_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `parts_comments`
--
ALTER TABLE `parts_comments`
  MODIFY `parts_comment_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `parts_ratings`
--
ALTER TABLE `parts_ratings`
  MODIFY `parts_rating_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `reports`
--
ALTER TABLE `reports`
  MODIFY `report_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `cars`
--
ALTER TABLE `cars`
  ADD CONSTRAINT `fk_car_id` FOREIGN KEY (`user_id`) REFERENCES `users` (`user_id`);

--
-- Constraints for table `car_comments`
--
ALTER TABLE `car_comments`
  ADD CONSTRAINT `fk_car_comments_id` FOREIGN KEY (`car_id`) REFERENCES `car_ratings` (`car_rating_id`);

--
-- Constraints for table `car_ratings`
--
ALTER TABLE `car_ratings`
  ADD CONSTRAINT `fk_car_rating_id` FOREIGN KEY (`car_id`) REFERENCES `cars` (`car_id`),
  ADD CONSTRAINT `fk_car_user_id_id` FOREIGN KEY (`user_id`) REFERENCES `users` (`user_id`);

--
-- Constraints for table `messages`
--
ALTER TABLE `messages`
  ADD CONSTRAINT `messages_user_from_user_id` FOREIGN KEY (`from_user_id`) REFERENCES `users` (`user_id`);

--
-- Constraints for table `notifications`
--
ALTER TABLE `notifications`
  ADD CONSTRAINT `fk_notifications_id` FOREIGN KEY (`user_id`) REFERENCES `users` (`user_id`);

--
-- Constraints for table `parts`
--
ALTER TABLE `parts`
  ADD CONSTRAINT `fk_part_id` FOREIGN KEY (`user_id`) REFERENCES `users` (`user_id`);

--
-- Constraints for table `parts_comments`
--
ALTER TABLE `parts_comments`
  ADD CONSTRAINT `fk_parts_comments_id` FOREIGN KEY (`parts_id`) REFERENCES `parts_ratings` (`parts_rating_id`);

--
-- Constraints for table `parts_ratings`
--
ALTER TABLE `parts_ratings`
  ADD CONSTRAINT `fk_parts_rating_id` FOREIGN KEY (`parts_id`) REFERENCES `parts` (`parts_id`),
  ADD CONSTRAINT `fk_parts_user_id_id` FOREIGN KEY (`user_id`) REFERENCES `users` (`user_id`);

--
-- Constraints for table `reports`
--
ALTER TABLE `reports`
  ADD CONSTRAINT `fk_car_status_id` FOREIGN KEY (`car_id`) REFERENCES `cars` (`car_id`),
  ADD CONSTRAINT `fk_part_status_id` FOREIGN KEY (`parts_id`) REFERENCES `parts` (`parts_id`),
  ADD CONSTRAINT `fk_reports_user_id` FOREIGN KEY (`user_id`) REFERENCES `users` (`user_id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

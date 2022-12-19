-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 22, 2022 at 06:23 PM
-- Server version: 10.4.22-MariaDB
-- PHP Version: 8.1.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `ezbus`
--

-- --------------------------------------------------------

--
-- Table structure for table `bookings`
--

CREATE TABLE `bookings` (
  `Booking_id` int(11) NOT NULL,
  `Bus_id` int(11) DEFAULT NULL,
  `User_id` int(11) DEFAULT NULL,
  `Booked_name` varchar(30) DEFAULT NULL,
  `Phone_no` varchar(11) DEFAULT NULL,
  `Source_station` varchar(30) DEFAULT NULL,
  `Destination_station` varchar(30) DEFAULT NULL,
  `Date` date DEFAULT NULL,
  `No_of_Seats` int(11) DEFAULT NULL,
  `Price` float DEFAULT NULL,
  `Card_type` varchar(20) DEFAULT NULL,
  `Card_No` varchar(20) DEFAULT NULL,
  `Expiry_Date` date DEFAULT NULL,
  `Payment_Type` varchar(10) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `bookings`
--

INSERT INTO `bookings` (`Booking_id`, `Bus_id`, `User_id`, `Booked_name`, `Phone_no`, `Source_station`, `Destination_station`, `Date`, `No_of_Seats`, `Price`, `Card_type`, `Card_No`, `Expiry_Date`, `Payment_Type`) VALUES
(100, 100, 100, 'Thanish', '0762233585', 'Kandy', 'Mawanella', '2022-04-20', 1, 130, 'VISA', '1234 1234 1234 1234', '2023-05-01', 'Full'),
(101, 100, 101, 'Seyyed', '0724236578', 'Kandy', 'Colombo', '2022-04-21', 1, 500, 'VISA', '4563 7624 8971 1236', '2024-05-01', 'Half'),
(102, 104, 103, 'Hussain', '0776485331', 'Nuwareliya', 'Mahiyanganaya', '2022-04-21', 2, 500, 'Masters', '2224 5698 7231 2755', '2023-10-25', 'Full'),
(103, 103, 101, 'Ahamed', '0771254332', 'Kegalle', 'Colombo', '2022-04-25', 2, 620, 'Masters', '2348 7762 6554 9823', '2023-06-11', 'Half'),
(104, 102, 104, 'Umair', '0752445236', 'Matale', 'Hambanthota', '2022-04-24', 2, 5000, 'VISA', '1575 6624 3341 2341', '2025-01-23', 'Full'),
(105, 100, 100, 'Clovexia', '0778469588', 'Kandy', 'Mawanella', '2022-04-24', 2, 260, 'VISA', '1234 1234 1234 1234', '2023-05-01', 'Full'),
(106, 100, 102, 'Aracus', '0776200450', 'Kegalle', 'Colombo', '2022-04-23', 1, 310, 'VISA', '4565 7824 8771 1416', '2024-05-01', 'Half'),
(107, 101, 104, 'Wolveria', '0754658132', 'Kandy', 'Peradeniya', '2022-04-21', 1, 50, 'Masters', '1575 6624 3341 2341', '2023-10-25', 'Full'),
(108, 102, 103, 'Villanio', '0768974256', 'Matale', 'Kurunegala', '2022-04-24', 1, 350, 'VISA', '2224 5698 7231 2755', '2025-01-23', 'Full'),
(109, 103, 102, 'Ammar', '0774658248', 'Peradheniya', 'Colombo', '2022-04-23', 2, 900, 'VISA', '4565 7824 8771 1416', '2024-05-01', 'Half');

-- --------------------------------------------------------

--
-- Table structure for table `bus`
--

CREATE TABLE `bus` (
  `Bus_id` int(11) NOT NULL,
  `Route_id` int(11) DEFAULT NULL,
  `Driver_name` varchar(30) DEFAULT NULL,
  `Driver_license` varchar(20) DEFAULT NULL,
  `Bus_no` varchar(10) DEFAULT NULL,
  `Seats` int(11) DEFAULT NULL,
  `Dep_time` time DEFAULT NULL,
  `Arr_time` time DEFAULT NULL,
  `Bus_brand` varchar(25) DEFAULT NULL,
  `AC` int(11) DEFAULT NULL,
  `WIFI` int(11) DEFAULT NULL,
  `Bus_img` varchar(2048) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `bus`
--

INSERT INTO `bus` (`Bus_id`, `Route_id`, `Driver_name`, `Driver_license`, `Bus_no`, `Seats`, `Dep_time`, `Arr_time`, `Bus_brand`, `AC`, `WIFI`, `Bus_img`) VALUES
(100, 100, 'Thanish', 'B1324657', 'LP-4512', 66, '12:00:00', '15:20:00', 'Tata', 1, 1, '../../images/Admin/img/bus.png'),
(101, 101, 'Hussain', 'B2235145', 'LJ-7714', 64, '08:00:00', '11:10:00', 'Eicher', 0, 1, '../../images/Admin/img/bus.png'),
(102, 104, 'Ammar', 'D5612457', 'LP-3362', 35, '11:00:00', '17:30:00', 'Ashok Leyland', 1, 0, '../../images/Admin/img/bus.png'),
(103, 103, 'Waseek', 'B1320023', 'LP-7845', 35, '09:30:00', '18:50:00', 'Tata', 1, 1, '../../images/Admin/img/bus.png'),
(104, 102, 'Villanio', 'B1324657', 'LP-4512', 66, '09:30:00', '15:50:00', 'Tata', 0, 0, '../../images/Admin/img/bus.png');

-- --------------------------------------------------------

--
-- Table structure for table `bus_travelling_days`
--

CREATE TABLE `bus_travelling_days` (
  `Bus_id` int(11) NOT NULL,
  `Days` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `bus_travelling_days`
--

INSERT INTO `bus_travelling_days` (`Bus_id`, `Days`) VALUES
(100, 'Friday'),
(100, 'Monday'),
(100, 'Sunday'),
(100, 'Tuesday'),
(100, 'Wednesday'),
(101, 'Saturday'),
(101, 'Thursday'),
(102, 'Friday'),
(102, 'Monday'),
(103, 'Friday'),
(103, 'Monday'),
(104, 'Sunday'),
(104, 'Tuesday');

-- --------------------------------------------------------

--
-- Table structure for table `details`
--

CREATE TABLE `details` (
  `user_id` int(11) NOT NULL,
  `fname` varchar(20) DEFAULT NULL,
  `lname` varchar(20) DEFAULT NULL,
  `username` varchar(20) DEFAULT NULL,
  `email` varchar(50) DEFAULT NULL,
  `address` varchar(50) DEFAULT NULL,
  `password` varchar(50) DEFAULT NULL,
  `type` varchar(10) DEFAULT 'U'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `details`
--

INSERT INTO `details` (`user_id`, `fname`, `lname`, `username`, `email`, `address`, `password`, `type`) VALUES
(100, 'Admin', 'Admin', 'Admin', 'Admin@ezbus.com', 'ezbus service', 'Admin123', 'A'),
(101, 'Umair', 'Hussain', 'Villanio', 'Vilpio@gmail.com', '16/D Angoda,Colmbo', 'Imfromgeliyoya', 'A'),
(102, 'Thanish', 'Ahamed', 'Usman', 'Thansman@gmail.com', '13A Watadeniya,Gelioya', 'Imfromsliit', 'U'),
(103, 'Waseek', 'Settu', 'Mandawas', 'zaseek@gmail.com', '13/12 sadfsda,sdf', 'imtheownerofzoom', 'A'),
(104, 'sdfgdshf', 'sdfghsdfg', 'Ruthless', 'Amramar@gmail.com', 'fashdfgsahd', 'kandyboirulez@', 'A'),
(105, 'Hussain', 'Seyyed', 'Esclipse', 'smjsun007@gmail.com', 'fgdsfgsdfgsdg', 'imfromKurugoda123', 'U');

-- --------------------------------------------------------

--
-- Table structure for table `feedback`
--

CREATE TABLE `feedback` (
  `feed_id` int(11) NOT NULL,
  `user_id` int(11) DEFAULT NULL,
  `feedback_content` varchar(200) DEFAULT NULL,
  `reply_status` int(11) DEFAULT NULL CHECK (`reply_status` in (0,1))
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `feedback`
--

INSERT INTO `feedback` (`feed_id`, `user_id`, `feedback_content`, `reply_status`) VALUES
(100, 100, 'It will be great if you allow us to pay through paypal.', NULL),
(101, 101, 'It\'s better to have a remainder on the day of travelling as a notification', NULL),
(102, 102, 'Being collaborative with other transport services will benefit us', NULL),
(103, 103, 'If there are no busses on holidays,it\'s better to notify the users', NULL),
(104, 104, 'The site lacks the option of choosing the position of the seats, so that we could book windows seats as per our comfort', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `refund`
--

CREATE TABLE `refund` (
  `Refund_id` int(11) NOT NULL,
  `Booking_id` int(11) DEFAULT NULL,
  `Reason` text DEFAULT NULL,
  `Confirmation_status` int(11) DEFAULT NULL,
  `Amount` float DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `refund`
--

INSERT INTO `refund` (`Refund_id`, `Booking_id`, `Reason`, `Confirmation_status`, `Amount`) VALUES
(100, 105, 'Curfew is active on the date of travel', 1, 260),
(101, 106, 'The vacation plan has changed', 1, 155),
(102, 107, 'Have to attend a relatives funeral', NULL, 50),
(103, 108, 'I have found another mode of travel', NULL, 350),
(104, 109, 'The destination of my travels have been succumbed to a natural disaster', 0, 450);

-- --------------------------------------------------------

--
-- Table structure for table `review`
--

CREATE TABLE `review` (
  `review_id` int(11) NOT NULL,
  `user_id` int(11) DEFAULT NULL,
  `Review_comment` text DEFAULT NULL,
  `review_rating` decimal(2,1) DEFAULT NULL CHECK (`review_rating` >= 0 and `review_rating` <= 5)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `review`
--

INSERT INTO `review` (`review_id`, `user_id`, `Review_comment`, `review_rating`) VALUES
(100, 100, 'Not a bad site, many bus options to choose from and to many destinations in Sri Lanka.', '4.0'),
(101, 101, 'The experience is pretty convenient. There could have been Boarding location points with a location tracker though. So one could find the distance between the boarding point and the nearest location(airport, railway station etc)', '5.0'),
(102, 102, '3rd rate service with no accountability in case of anything wrong with the bus operator. The site doesn\'t even send me the bus/driver details or the exact boarding point. No contact number to call someone and ask.', '1.0'),
(103, 103, 'As long as you book a right ticket for the journey that you want to do, this site is very good but as soon as you do a mistake you are for a bigger ride. ', '2.0'),
(104, 104, 'I booked 3 seats and had to change my plans. This service allowed me to refund the booking immediately.', '1.0');

-- --------------------------------------------------------

--
-- Table structure for table `route`
--

CREATE TABLE `route` (
  `Route_id` int(11) NOT NULL,
  `Source` varchar(30) DEFAULT NULL,
  `Destination` varchar(30) DEFAULT NULL,
  `Distance` int(11) DEFAULT NULL,
  `Route_Details` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `route`
--

INSERT INTO `route` (`Route_id`, `Source`, `Destination`, `Distance`, `Route_Details`) VALUES
(100, 'Kandy', 'Colombo', 137, 'via Colombo - Kandy Rd/A1'),
(101, 'Kandy', 'Colombo', 144, 'via Central Expressway/E041'),
(102, 'Nuwara Eliya', 'Trincomalee', 290, ' via Ambepussa - Kurunegala - Trincomalee Hwy/Ambepussa - Trincomalee Hwy/Kandy Rd/A6y'),
(103, 'Galle', 'Jaffna', 501, 'via Kandy Rd/Kandy - Jaffna Hwy/A9'),
(104, 'Matale', 'Hambantota', 501, 'via Southern Expy/E01');

-- --------------------------------------------------------

--
-- Table structure for table `route_station`
--

CREATE TABLE `route_station` (
  `Route_id` int(11) NOT NULL,
  `Station_name` varchar(25) NOT NULL,
  `Price` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `route_station`
--

INSERT INTO `route_station` (`Route_id`, `Station_name`, `Price`) VALUES
(100, ' Colombo', 500),
(100, ' Kandy', 0),
(100, ' Kegalle ', 190),
(100, ' Mawanella', 130),
(100, ' Peradeniya', 50),
(100, ' Warakapola', 257),
(100, 'Nittambuwa', 375),
(101, ' Colombo', 600),
(101, ' Kandy', 0),
(101, ' Kegalle ', 190),
(101, ' Mawanella', 130),
(101, ' Peradeniya', 50),
(101, ' Warakapola', 257),
(101, 'Kadawatha', 400),
(102, ' Dambulla', 500),
(102, ' Hettipola', 350),
(102, ' Mahiyanganaya', 250),
(102, ' Nuwara Eliya', 0),
(102, ' Trincomalee', 1000),
(102, ' Waalapane', 120),
(102, 'Kantale ', 770),
(103, 'Anuradhapura', 1100),
(103, 'Colombo', 500),
(103, 'Dambulla', 800),
(103, 'Galle', 0),
(103, 'Jafna', 2000),
(103, 'Kilinochchi', 1800),
(103, 'Vavuniya', 1300),
(104, 'Hambanthota', 2500),
(104, 'Kurunegala', 350),
(104, 'Matale', 0);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `bookings`
--
ALTER TABLE `bookings`
  ADD PRIMARY KEY (`Booking_id`),
  ADD KEY `FK_Bookings_Bus` (`Bus_id`),
  ADD KEY `FK_Bookings_User` (`User_id`);

--
-- Indexes for table `bus`
--
ALTER TABLE `bus`
  ADD PRIMARY KEY (`Bus_id`),
  ADD KEY `FK_Bus` (`Route_id`);

--
-- Indexes for table `bus_travelling_days`
--
ALTER TABLE `bus_travelling_days`
  ADD PRIMARY KEY (`Bus_id`,`Days`);

--
-- Indexes for table `details`
--
ALTER TABLE `details`
  ADD PRIMARY KEY (`user_id`),
  ADD UNIQUE KEY `username` (`username`),
  ADD UNIQUE KEY `email` (`email`);

--
-- Indexes for table `feedback`
--
ALTER TABLE `feedback`
  ADD PRIMARY KEY (`feed_id`),
  ADD KEY `FK_feedback` (`user_id`);

--
-- Indexes for table `refund`
--
ALTER TABLE `refund`
  ADD PRIMARY KEY (`Refund_id`),
  ADD KEY `FK_Refund` (`Booking_id`);

--
-- Indexes for table `review`
--
ALTER TABLE `review`
  ADD PRIMARY KEY (`review_id`),
  ADD KEY `FK_review` (`user_id`);

--
-- Indexes for table `route`
--
ALTER TABLE `route`
  ADD PRIMARY KEY (`Route_id`);

--
-- Indexes for table `route_station`
--
ALTER TABLE `route_station`
  ADD PRIMARY KEY (`Route_id`,`Station_name`,`Price`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `bookings`
--
ALTER TABLE `bookings`
  MODIFY `Booking_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=110;

--
-- AUTO_INCREMENT for table `bus`
--
ALTER TABLE `bus`
  MODIFY `Bus_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=105;

--
-- AUTO_INCREMENT for table `bus_travelling_days`
--
ALTER TABLE `bus_travelling_days`
  MODIFY `Bus_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=105;

--
-- AUTO_INCREMENT for table `details`
--
ALTER TABLE `details`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=106;

--
-- AUTO_INCREMENT for table `feedback`
--
ALTER TABLE `feedback`
  MODIFY `feed_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=105;

--
-- AUTO_INCREMENT for table `refund`
--
ALTER TABLE `refund`
  MODIFY `Refund_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=105;

--
-- AUTO_INCREMENT for table `review`
--
ALTER TABLE `review`
  MODIFY `review_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=105;

--
-- AUTO_INCREMENT for table `route`
--
ALTER TABLE `route`
  MODIFY `Route_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=105;

--
-- AUTO_INCREMENT for table `route_station`
--
ALTER TABLE `route_station`
  MODIFY `Route_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=105;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `bookings`
--
ALTER TABLE `bookings`
  ADD CONSTRAINT `FK_Bookings_Bus` FOREIGN KEY (`Bus_id`) REFERENCES `bus` (`Bus_id`) ON DELETE CASCADE,
  ADD CONSTRAINT `FK_Bookings_User` FOREIGN KEY (`User_id`) REFERENCES `details` (`user_id`) ON DELETE CASCADE;

--
-- Constraints for table `bus`
--
ALTER TABLE `bus`
  ADD CONSTRAINT `FK_Bus` FOREIGN KEY (`Route_id`) REFERENCES `route` (`Route_id`) ON DELETE SET NULL;

--
-- Constraints for table `bus_travelling_days`
--
ALTER TABLE `bus_travelling_days`
  ADD CONSTRAINT `FK_Bus_Travelling_Days` FOREIGN KEY (`Bus_id`) REFERENCES `bus` (`Bus_id`) ON DELETE CASCADE;

--
-- Constraints for table `feedback`
--
ALTER TABLE `feedback`
  ADD CONSTRAINT `FK_feedback` FOREIGN KEY (`user_id`) REFERENCES `details` (`user_id`) ON DELETE CASCADE;

--
-- Constraints for table `refund`
--
ALTER TABLE `refund`
  ADD CONSTRAINT `FK_Refund` FOREIGN KEY (`Booking_id`) REFERENCES `bookings` (`Booking_id`) ON DELETE CASCADE;

--
-- Constraints for table `review`
--
ALTER TABLE `review`
  ADD CONSTRAINT `FK_review` FOREIGN KEY (`user_id`) REFERENCES `details` (`user_id`) ON DELETE CASCADE;

--
-- Constraints for table `route_station`
--
ALTER TABLE `route_station`
  ADD CONSTRAINT `FK_Route_station` FOREIGN KEY (`Route_id`) REFERENCES `route` (`Route_id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

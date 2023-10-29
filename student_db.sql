-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Oct 29, 2023 at 12:50 AM
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
-- Database: `student_db`
--

-- --------------------------------------------------------

--
-- Table structure for table `students`
--

CREATE TABLE `students` (
  `id` int(11) NOT NULL,
  `name` varchar(255) DEFAULT NULL,
  `dob` date DEFAULT NULL,
  `mobile_number` varchar(15) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `address` varchar(255) DEFAULT NULL,
  `city` varchar(255) DEFAULT NULL,
  `state` varchar(255) DEFAULT NULL,
  `course` varchar(255) DEFAULT NULL,
  `date_of_admission` date DEFAULT NULL,
  `qualifications` text DEFAULT NULL,
  `photo` varchar(255) DEFAULT NULL,
  `status` enum('Pending','Approved','Rejected') DEFAULT 'Pending'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `students`
--

INSERT INTO `students` (`id`, `name`, `dob`, `mobile_number`, `email`, `address`, `city`, `state`, `course`, `date_of_admission`, `qualifications`, `photo`, `status`) VALUES
(4, 'John Doe', '2023-10-05', '+1234567890', 'john@example.com', '123 Main St', 'Cityville', 'Stateville', 'Computer Science', '2023-09-27', '        High School Diploma', 'uploads/2.jpg', 'Pending'),
(5, 'Alice Smith', '2023-09-13', '+9876543210', 'alice@example.com', '456 Elm St', 'Townsville', 'Stateville', 'Engineering', '2023-09-14', '        Bachelor\\\'s Degree', 'uploads/1.jpg', 'Approved'),
(6, 'Michael Johnson', '2023-08-24', '+1122334455', 'michael@example.com', '789 Oak St', 'Villageton', '  Countyville', 'Medicine', '2023-08-29', 'Bachelor\\\'s Degree', 'uploads/6.jpg', 'Pending'),
(7, 'Sarah Williams', '2023-08-09', '+9988776655', 'sarah@example.com', '345 Pine St', 'Hillside', 'Countyville', 'Business', '2023-08-03', 'Master\\\'s Degree', 'uploads/5.jpg', 'Pending'),
(8, 'David Brown', '2023-04-19', '+7766554433', 'david@example.com', '567 Cedar St', 'Parkville', 'Countyville', 'Science', '2023-08-10', 'High School Diploma', 'uploads/3.jpg', 'Approved'),
(9, 'Emily Davis', '2023-04-13', '+9988776655', 'emily@example.com', '987 Birch St', 'Meadowville', 'Countyville', 'Arts', '2023-08-17', 'Bachelor\\\'s Degree', 'uploads/camera.jpg', 'Pending'),
(10, 'Olivia Moore', '2023-04-06', '+9988776655', 'olivia@example.com', '456 Oak St', 'Sunsetville', 'Countyville', 'Social Science', '2023-07-17', 'Bachelor\\\'s Degree', 'uploads/mic.jpg', 'Approved');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `students`
--
ALTER TABLE `students`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `students`
--
ALTER TABLE `students`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

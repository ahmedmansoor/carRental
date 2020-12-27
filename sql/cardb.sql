-- phpMyAdmin SQL Dump
-- version 5.0.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 27, 2020 at 12:09 PM
-- Server version: 10.4.17-MariaDB
-- PHP Version: 8.0.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `cardb`
--

-- --------------------------------------------------------

--
-- Table structure for table `bookings`
--

CREATE TABLE `bookings` (
  `id` int(30) NOT NULL,
  `uid` int(30) NOT NULL,
  `carid` int(30) NOT NULL,
  `fromlocation` varchar(100) NOT NULL,
  `tolocation` varchar(100) NOT NULL,
  `fromdate` date NOT NULL,
  `todate` date NOT NULL,
  `fromtime` time NOT NULL,
  `totime` time NOT NULL,
  `days` int(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `bookings`
--

INSERT INTO `bookings` (`id`, `uid`, `carid`, `fromlocation`, `tolocation`, `fromdate`, `todate`, `fromtime`, `totime`, `days`) VALUES
(78, 44, 31, 'Velana International Airport (Hulhule)', 'Jetty Number 1 (Male)', '2020-12-01', '2020-12-23', '06:35:00', '13:35:00', 22),
(79, 44, 38, 'Velana International Airport (Hulhule)', 'Jetty Number 1 (Male)', '2020-12-01', '2020-12-23', '06:35:00', '13:35:00', 22),
(80, 44, 75, 'Velana International Airport (Hulhule)', 'Airport Ferry Terminal (Male)', '2020-12-01', '2020-12-31', '01:42:00', '13:42:00', 30);

-- --------------------------------------------------------

--
-- Table structure for table `cars`
--

CREATE TABLE `cars` (
  `id` int(10) NOT NULL,
  `carname` varchar(30) NOT NULL,
  `image` varchar(100) NOT NULL,
  `price` int(15) NOT NULL,
  `location` varchar(100) NOT NULL,
  `fromdate` date NOT NULL,
  `todate` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `cars`
--

INSERT INTO `cars` (`id`, `carname`, `image`, `price`, `location`, `fromdate`, `todate`) VALUES
(31, 'Aston Martin DBS Superleggera', '../uploads/Aston Martin DBS Superleggera.jpg', 2700, 'Velana International Airport (Hulhulé)', '2020-12-01', '2021-01-23'),
(32, 'Audi', '../uploads/Bugatti Chiron.jpg', 4000, 'Airport Ferry Terminal (Male)', '0000-00-00', '0000-00-00'),
(34, 'Bugatti Chiron', '../uploads/Bugatti Chiron.jpg', 4500, 'Hulhumalé Ferry Terminal (Malé)', '2020-12-30', '2021-01-14'),
(36, 'Porsche 911 GT3 RS ', '../uploads/Porsche 911 GT3 RS — Lizard Green.jpg', 2000, 'Jetty Number 1 (Male)', '0000-00-00', '0000-00-00'),
(38, 'Volkswagen Arteon', '../uploads/Volkswagen Arteon.jpg', 1500, 'Velana International Airport (Hulhulé)', '2020-12-23', '2021-02-16'),
(46, 'Bugatti', '../uploads/Infiniti Q60.jpg', 3200, 'Velana International Airport (Hulhule)', '0000-00-00', '0000-00-00'),
(47, 'Porsche 911', '../uploads/Porsche 911.jpg', 4500, 'Jetty Number 2 (Male)', '2020-12-01', '2020-12-10'),
(48, 'Mercedes Benz GL 2013', '../uploads/Mercedes Benz GL 2013.jpg', 4500, 'Jetty Number 2 (Male)', '2020-12-08', '2020-12-15'),
(49, 'Toyota 4Runner', '../uploads/Toyota 4Runner.jpg', 3500, 'Jetty Number 4 (Male)', '2020-12-24', '2021-01-28'),
(51, 'Infiniti Q60', '../uploads/Infiniti Q60.jpg', 4500, 'Jetty Number 6 (Male)', '2020-12-23', '2021-01-30'),
(52, 'Mazda 3', '../uploads/Mazda 3.jpg', 1500, 'Jetty Number 5 (Male)', '2021-01-01', '2021-02-23'),
(53, 'Porsche 911 GT3 RS — Lizard Gr', '../uploads/Porsche 911 GT3 RS — Lizard Green.jpg', 3400, 'Jetty Number 6 (Male)', '2020-12-09', '2021-02-01'),
(54, 'Infiniti Q60', '../uploads/Infiniti Q60.jpg', 1200, 'Jetty Number 6 (Male)', '2020-12-23', '2020-12-28'),
(56, 'Lamborghini Gallardo', '../uploads/Lamborghini Gallardo.jpg', 1500, 'Hulhumalé Ferry Terminal (Male)', '2020-12-06', '2020-12-19'),
(57, 'Volkswagen Arteon', '../uploads/Volkswagen Arteon.jpg', 2300, 'Velana International Airport (Hulhule)', '2020-11-04', '2021-01-20'),
(58, 'Mercedes', '../uploads/Mercedes Benz GL 2013.jpg', 5000, 'Velana International Airport (Hulhule)', '0000-00-00', '0000-00-00'),
(59, '2021 Volkswagen ID Roomzz', '../uploads/2021 Volkswagen ID Roomzz.jpg', 5100, 'Jetty Number 2 (Male)', '2020-12-01', '2020-12-31'),
(60, '2021 Volkswagen ID Roomzz', '../uploads/2021 Volkswagen ID Roomzz.jpg', 5100, 'Jetty Number 2 (Male)', '2020-12-01', '2020-12-31'),
(61, '2021 Volkswagen ID Roomzz', '../uploads/2021 Volkswagen ID Roomzz.jpg', 5400, 'Jetty Number 4 (Male)', '2020-12-04', '2020-12-24'),
(62, '2021 Volkswagen ID Roomzz', '../uploads/2021 Volkswagen ID Roomzz.jpg', 5200, 'Hulhumalé Ferry Terminal (Male)', '2020-12-02', '2020-12-31'),
(63, 'Volkswagen Arteon', '../uploads/Volkswagen Arteon.jpg', 3500, 'Jetty Number 4 (Male)', '2020-12-11', '2020-12-31'),
(64, 'Volkswagen Arteon', '../uploads/Volkswagen Arteon.jpg', 3600, 'Hulhumalé Ferry Terminal (Male)', '2020-12-01', '2021-01-20'),
(66, 'Ferrari', '../uploads/Ferrari F8 Tributo.jpg', 3500, 'Airport Ferry Terminal (Male)', '0000-00-00', '0000-00-00'),
(67, 'Ferrari F8 Tributo', '../uploads/Ferrari F8 Tributo.jpg', 3000, 'Hulhumale Ferry Terminal (Hulhumale)', '0000-00-00', '0000-00-00'),
(68, 'Lexus LC', '../uploads/Lexus LC.jpg', 4500, 'Hulhumale Ferry Terminal (Hulhumale)', '2020-12-10', '2021-01-21'),
(69, 'Ford Mustang', '../uploads/Ford Mustang.jpg', 1500, 'Hulhumale Ferry Terminal (Hulhumale)', '2020-12-19', '2021-01-31'),
(70, 'Audi RS5 — Sonoma Green Metall', '../uploads/Audi RS5 — Sonoma Green Metallic.jpg', 2200, 'Hulhumalé Ferry Terminal (Male)', '2020-12-16', '2021-01-09'),
(71, 'Audi RS5 — Sonoma Green Metall', '../uploads/Audi RS5 — Sonoma Green Metallic.jpg', 2200, 'Jetty Number 5 (Male)', '2020-12-12', '2021-01-30'),
(72, 'Audi RS5 — Sonoma Green Metall', '../uploads/Audi RS5 — Sonoma Green Metallic.jpg', 2300, 'Jetty Number 2 (Male)', '2020-12-04', '2021-01-19'),
(73, 'Audi', '../uploads/Audi RS5 — Sonoma Green Metallic.jpg', 3400, 'Jetty Number 1 (Male)', '0000-00-00', '0000-00-00'),
(74, 'Maserati Levante Submodel', '../uploads/Maserati Levante Submodel.jpg', 3400, 'Airport Ferry Terminal (Male)', '2020-12-24', '2021-01-28'),
(75, 'Maserati Levante Submodel', '../uploads/Maserati Levante Submodel.jpg', 3300, 'Velana International Airport (Hulhule)', '2020-12-31', '2021-01-09'),
(76, 'Maserati Levante Submodel', '../uploads/Maserati Levante Submodel.jpg', 3500, 'Jetty Number 1 (Male)', '2021-01-02', '2021-01-31'),
(77, 'Ferrari', '../uploads/Ferrari 488 Pista.jpg', 2000, 'Velana International Airport (Hulhule)', '0000-00-00', '0000-00-00'),
(78, 'Ferrari 488 Pista', '../uploads/Ferrari 488 Pista.jpg', 2100, 'Hulhumalé Ferry Terminal (Male)', '2021-01-01', '2021-01-29'),
(79, 'Ferrari-GTC 4 Lusso', '../uploads/Ferrari-GTC 4 Lusso.jpg', 4300, 'Jetty Number 1 (Male)', '2021-01-08', '2021-02-19'),
(80, 'Lexus LC', '../uploads/Lexus LC.jpg', 2300, 'Jetty Number 4 (Male)', '2021-01-01', '2021-01-31'),
(81, 'Lamborghini Gallardo', '../uploads/Lamborghini Gallardo.jpg', 5000, 'Velana International Airport (Hulhule)', '2020-12-01', '2020-12-25'),
(82, 'Porsche', '../uploads/Porsche 911.jpg', 4500, 'Velana International Airport (Hulhule)', '2020-12-01', '2020-12-31'),
(83, 'Volkswagen Arteon', '../uploads/Volkswagen Arteon.jpg', 3500, 'Velana International Airport (Hulhule)', '2020-12-01', '2020-12-31'),
(84, 'Mercedes Benz GL 2013', '../uploads/Mercedes Benz GL 2013.jpg', 2100, 'Velana International Airport (Hulhule)', '2020-12-01', '2020-12-31'),
(85, 'Ford Mustang', '../uploads/Ford Mustang.jpg', 3700, 'Velana International Airport (Hulhule)', '2020-12-01', '2020-12-31');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `uid` int(30) NOT NULL,
  `username` varchar(20) NOT NULL,
  `email` varchar(30) NOT NULL,
  `role` varchar(10) DEFAULT NULL,
  `password` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`uid`, `username`, `email`, `role`, `password`) VALUES
(43, 'ahmedmansoor', 'ahmadh.mansoor@gmail.com', NULL, 'd1052a263437cd64f96aba5b5b207b94'),
(44, 'mante', 'mante@gmail.com', NULL, 'd67c7bbecb362b1047a85e8603430b2e'),
(45, 'admin', 'admin@gmail.com', 'Admin', '0192023a7bbd73250516f069df18b500');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `bookings`
--
ALTER TABLE `bookings`
  ADD PRIMARY KEY (`id`),
  ADD KEY `carid_fk` (`carid`),
  ADD KEY `uid_fk` (`uid`);

--
-- Indexes for table `cars`
--
ALTER TABLE `cars`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`uid`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `bookings`
--
ALTER TABLE `bookings`
  MODIFY `id` int(30) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=81;

--
-- AUTO_INCREMENT for table `cars`
--
ALTER TABLE `cars`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=86;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `uid` int(30) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=46;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `bookings`
--
ALTER TABLE `bookings`
  ADD CONSTRAINT `carid_fk` FOREIGN KEY (`carid`) REFERENCES `cars` (`id`),
  ADD CONSTRAINT `uid_fk` FOREIGN KEY (`uid`) REFERENCES `users` (`uid`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

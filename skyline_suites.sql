-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 20, 2023 at 06:32 AM
-- Server version: 10.4.27-MariaDB
-- PHP Version: 8.1.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `skyline_suites`
--

-- --------------------------------------------------------

--
-- Table structure for table `tbl_admin`
--

CREATE TABLE `tbl_admin` (
  `admin_id` int(5) NOT NULL,
  `admin_username` varchar(30) NOT NULL,
  `admin_pwd` varchar(50) NOT NULL,
  `admin_mail` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tbl_admin`
--

INSERT INTO `tbl_admin` (`admin_id`, `admin_username`, `admin_pwd`, `admin_mail`) VALUES
(1, 'avadh', '4caacdc832884264d63d2ec0775722d2', 'avadhkanaiya@gmail.com');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_book_room`
--

CREATE TABLE `tbl_book_room` (
  `booking_id` int(5) NOT NULL,
  `user_name` varchar(30) NOT NULL,
  `phone` int(12) NOT NULL,
  `room_id` int(5) NOT NULL,
  `checkin_dt` date NOT NULL,
  `checkout_dt` date NOT NULL,
  `no_of_adults` int(8) NOT NULL,
  `no_of_children` int(8) NOT NULL,
  `book_dt` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tbl_book_room`
--

INSERT INTO `tbl_book_room` (`booking_id`, `user_name`, `phone`, `room_id`, `checkin_dt`, `checkout_dt`, `no_of_adults`, `no_of_children`, `book_dt`) VALUES
(1, 'avadh', 1234567890, 1, '2023-03-19', '2023-03-20', 2, 0, '2023-03-19'),
(2, 'ak', 987654321, 3, '2023-03-23', '2023-03-25', 2, 1, '2023-03-19');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_category`
--

CREATE TABLE `tbl_category` (
  `category_id` int(5) NOT NULL,
  `category_name` varchar(50) NOT NULL,
  `category_img` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tbl_category`
--

INSERT INTO `tbl_category` (`category_id`, `category_name`, `category_img`) VALUES
(1, 'delux', 'delux.png'),
(2, 'superior', 'superior_room.png'),
(5, 'honeymoon suite', 'honeymoon_suites_room.jpg'),
(6, 'king suite', 'king_suite_room.jpg'),
(7, 'master suite', 'master_suite_room.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_facility`
--

CREATE TABLE `tbl_facility` (
  `fac_id` int(5) NOT NULL,
  `facility_name` varchar(30) NOT NULL,
  `facility_img` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tbl_facility`
--

INSERT INTO `tbl_facility` (`fac_id`, `facility_name`, `facility_img`) VALUES
(1, 'spa', 'spa.jpg'),
(2, 'swimming pool', 'swimming_pool.jpg'),
(3, 'gym', 'gym.jpg'),
(4, 'lounge', 'lounge.jpg'),
(5, 'parking lot', 'parking_lot.jpg'),
(7, 'gaming zone', 'gaming.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_feedback`
--

CREATE TABLE `tbl_feedback` (
  `feedback_id` int(11) NOT NULL,
  `user_id` int(5) NOT NULL,
  `date` date NOT NULL,
  `feedback` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tbl_feedback`
--

INSERT INTO `tbl_feedback` (`feedback_id`, `user_id`, `date`, `feedback`) VALUES
(1, 1, '2023-03-17', 'we delighted to stay in skyline suites.'),
(2, 2, '2023-03-19', 'hey everyone \r\ni am so happy to stay in skyline suites this my favorite hotel or i can say this is my dream hotel😍'),
(3, 1, '2023-03-19', 'nice one'),
(4, 1, '2023-03-20', 'great to seee you');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_room`
--

CREATE TABLE `tbl_room` (
  `room_id` int(5) NOT NULL,
  `room_name` varchar(40) NOT NULL,
  `no_of_adults` int(8) NOT NULL,
  `no_of_children` int(8) NOT NULL,
  `category_id` int(5) NOT NULL,
  `room_price` int(5) NOT NULL,
  `room_img` text NOT NULL,
  `room_desc` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tbl_room`
--

INSERT INTO `tbl_room` (`room_id`, `room_name`, `no_of_adults`, `no_of_children`, `category_id`, `room_price`, `room_img`, `room_desc`) VALUES
(1, 'delux101', 3, 2, 1, 1200, 'delux1.jpg', '1 double bed \r\nfree wifi'),
(2, 'supirior 1', 4, 2, 2, 2200, 'superior_room.png', 'free wifi \r\nac\r\nbath tub\r\nheater'),
(3, 'delux102', 4, 2, 1, 1200, 'delux.png', 'wifi\r\nac\r\nheater');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_user`
--

CREATE TABLE `tbl_user` (
  `user_id` int(5) NOT NULL,
  `user_name` varchar(30) NOT NULL,
  `user_pwd` varchar(32) NOT NULL,
  `email` varchar(50) NOT NULL,
  `phone` int(12) NOT NULL,
  `dob` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tbl_user`
--

INSERT INTO `tbl_user` (`user_id`, `user_name`, `user_pwd`, `email`, `phone`, `dob`) VALUES
(1, 'avadh kanaiya', '0a78a1629b492f51ab72078b3851d4ea', 'avadhkanaiya@gmail.com', 1234567888, '2023-03-17'),
(2, 'ak', 'b4ff095b98b5b800b0686c4037adf20d', 'avadhkanaiya@gmail.com', 2147483647, '2023-03-17');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tbl_admin`
--
ALTER TABLE `tbl_admin`
  ADD PRIMARY KEY (`admin_id`);

--
-- Indexes for table `tbl_book_room`
--
ALTER TABLE `tbl_book_room`
  ADD PRIMARY KEY (`booking_id`);

--
-- Indexes for table `tbl_category`
--
ALTER TABLE `tbl_category`
  ADD PRIMARY KEY (`category_id`);

--
-- Indexes for table `tbl_facility`
--
ALTER TABLE `tbl_facility`
  ADD PRIMARY KEY (`fac_id`);

--
-- Indexes for table `tbl_feedback`
--
ALTER TABLE `tbl_feedback`
  ADD PRIMARY KEY (`feedback_id`);

--
-- Indexes for table `tbl_room`
--
ALTER TABLE `tbl_room`
  ADD PRIMARY KEY (`room_id`);

--
-- Indexes for table `tbl_user`
--
ALTER TABLE `tbl_user`
  ADD PRIMARY KEY (`user_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tbl_admin`
--
ALTER TABLE `tbl_admin`
  MODIFY `admin_id` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `tbl_book_room`
--
ALTER TABLE `tbl_book_room`
  MODIFY `booking_id` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `tbl_category`
--
ALTER TABLE `tbl_category`
  MODIFY `category_id` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `tbl_facility`
--
ALTER TABLE `tbl_facility`
  MODIFY `fac_id` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `tbl_feedback`
--
ALTER TABLE `tbl_feedback`
  MODIFY `feedback_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `tbl_room`
--
ALTER TABLE `tbl_room`
  MODIFY `room_id` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `tbl_user`
--
ALTER TABLE `tbl_user`
  MODIFY `user_id` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

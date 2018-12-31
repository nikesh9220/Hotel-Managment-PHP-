-- phpMyAdmin SQL Dump
-- version 4.8.3
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 10, 2018 at 05:40 PM
-- Server version: 10.1.36-MariaDB
-- PHP Version: 5.6.38

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `hms`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin_profile`
--

CREATE TABLE `admin_profile` (
  `Ad_id` int(20) NOT NULL,
  `Ad_psw` varchar(25) NOT NULL,
  `Ad_fname` varchar(20) NOT NULL,
  `Ad_lname` varchar(20) NOT NULL,
  `Ad_Email_id` varchar(20) NOT NULL,
  `Ad_que1` varchar(30) NOT NULL,
  `Ad_que2` varchar(30) NOT NULL,
  `Ad_ans1` varchar(30) NOT NULL,
  `Ad_ans2` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `admin_profile`
--

INSERT INTO `admin_profile` (`Ad_id`, `Ad_psw`, `Ad_fname`, `Ad_lname`, `Ad_Email_id`, `Ad_que1`, `Ad_que2`, `Ad_ans1`, `Ad_ans2`) VALUES
(1, 'munaf', 'Munaf ', 'Vhora', 'admin@gmail.com', 'what is your fv food?', 'who is your fv Car?', 'apple', 'audi');

-- --------------------------------------------------------

--
-- Table structure for table `company`
--

CREATE TABLE `company` (
  `Address` varchar(50) NOT NULL,
  `Email` varchar(30) NOT NULL,
  `Contact` varchar(30) NOT NULL,
  `H_Name` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `company`
--

INSERT INTO `company` (`Address`, `Email`, `Contact`, `H_Name`) VALUES
('Radhekishan Villa,Toronto,Canada', 'munaf.vhora28@hotmail.com', '+1(647)248-6145', 'Sunrise');

-- --------------------------------------------------------

--
-- Table structure for table `customer_info`
--

CREATE TABLE `customer_info` (
  `Cu_id` int(20) NOT NULL,
  `Cu_name` varchar(20) NOT NULL,
  `Cu_Mo_no` varchar(10) NOT NULL,
  `Cu_Email_id` varchar(200) NOT NULL,
  `Cu_Address` varchar(50) NOT NULL,
  `Cu_City` varchar(20) NOT NULL,
  `Cu_State` varchar(20) NOT NULL,
  `Cu_Postal_code` int(6) NOT NULL,
  `Cu_psw` varchar(255) NOT NULL COMMENT 'Customer Password',
  `Cu_ans` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `customer_info`
--

INSERT INTO `customer_info` (`Cu_id`, `Cu_name`, `Cu_Mo_no`, `Cu_Email_id`, `Cu_Address`, `Cu_City`, `Cu_State`, `Cu_Postal_code`, `Cu_psw`, `Cu_ans`) VALUES
(31, 'Munaf Vhora', '6472486145', 'munaf.vhora28@hotmai.com', '21 Toronto', 'Toronto', 'Toronto,Canada', 33221145, '123456', 'Dog'),
(32, 'Nikesh Pandya', '7878989888', 'user@gmail.com', 'Abc,Xyz', 'Xaxa', 'Xyz', 787878, '123456', 'Cat');

-- --------------------------------------------------------

--
-- Table structure for table `c_detail`
--

CREATE TABLE `c_detail` (
  `C_id` int(3) NOT NULL,
  `R_id` int(11) NOT NULL,
  `Cu_Email_id` varchar(20) NOT NULL,
  `Room_no` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COMMENT='cancellation master';

-- --------------------------------------------------------

--
-- Table structure for table `c_master`
--

CREATE TABLE `c_master` (
  `C_id` int(3) NOT NULL,
  `C_date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `c_master`
--

INSERT INTO `c_master` (`C_id`, `C_date`) VALUES
(91, '2018-12-09');

-- --------------------------------------------------------

--
-- Table structure for table `feedback`
--

CREATE TABLE `feedback` (
  `Cu_id` int(10) NOT NULL,
  `Comments` varchar(50) NOT NULL,
  `Fb_date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `feedback`
--

INSERT INTO `feedback` (`Cu_id`, `Comments`, `Fb_date`) VALUES
(32, 'Best Hotel in Toronto.', '2018-12-10');

-- --------------------------------------------------------

--
-- Table structure for table `payment`
--

CREATE TABLE `payment` (
  `P_type` varchar(20) NOT NULL,
  `P_id` int(10) NOT NULL,
  `P_date` date NOT NULL,
  `R_id` int(11) DEFAULT NULL,
  `C_id` int(3) DEFAULT NULL,
  `P_mode` varchar(20) NOT NULL,
  `Card_no` int(20) NOT NULL,
  `Card_H_name` varchar(25) NOT NULL,
  `Cvv_no` int(5) NOT NULL,
  `Exp_month` varchar(10) NOT NULL,
  `Exp_year` varchar(10) NOT NULL,
  `Total_amt` int(10) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `payment`
--

INSERT INTO `payment` (`P_type`, `P_id`, `P_date`, `R_id`, `C_id`, `P_mode`, `Card_no`, `Card_H_name`, `Cvv_no`, `Exp_month`, `Exp_year`, `Total_amt`) VALUES
('Received', 90, '2018-12-09', 37, NULL, 'Credit', 2147483647, 'Munaf Vhora', 647, '2', '2019', 16800),
('Received', 91, '2018-12-09', 38, NULL, 'Credit', 0, 'admin', 0, '1', '2015', 18600),
('Received', 92, '2018-12-09', 39, NULL, 'Credit', 0, 'admin', 0, '1', '2015', 300),
('Received', 93, '2018-12-09', 40, NULL, 'Credit', 4545454, 'admin', 0, '1', '2015', 200),
('Refund', 94, '2018-12-09', NULL, 0, 'Credit', 4545454, 'admin', 0, '1', '2015', 150),
('Received', 95, '2018-12-10', 41, NULL, 'Credit', 123456, 'admin', 0, '1', '2015', 1600),
('Received', 96, '2018-12-10', 42, NULL, 'Credit', 45457896, 'Nikesh', 0, '1', '2015', 7500);

-- --------------------------------------------------------

--
-- Table structure for table `reservation_detail`
--

CREATE TABLE `reservation_detail` (
  `R_id` int(10) NOT NULL,
  `Room_no` int(10) NOT NULL,
  `No_person` int(10) NOT NULL,
  `price` int(10) DEFAULT NULL,
  `C_id` int(3) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `reservation_detail`
--

INSERT INTO `reservation_detail` (`R_id`, `Room_no`, `No_person`, `price`, `C_id`) VALUES
(40, 3, 0, 200, 91),
(41, 1, 1, 600, 0),
(41, 3, 3, 200, 0),
(42, 2, 2, 2200, 0),
(42, 4, 2, 300, 0);

-- --------------------------------------------------------

--
-- Table structure for table `re_master`
--

CREATE TABLE `re_master` (
  `R_id` int(11) NOT NULL,
  `R_date` date DEFAULT NULL,
  `R_cu_id` int(11) DEFAULT NULL,
  `Check_in` date DEFAULT NULL,
  `Check_out` date DEFAULT NULL,
  `No_of_rooms` int(5) DEFAULT NULL,
  `Total_price` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `re_master`
--

INSERT INTO `re_master` (`R_id`, `R_date`, `R_cu_id`, `Check_in`, `Check_out`, `No_of_rooms`, `Total_price`) VALUES
(37, '2018-12-09', 31, '2018-12-14', '2018-12-20', 2, 16800),
(38, '2018-12-09', 31, '2018-12-15', '2018-12-21', 3, 18600),
(39, '2018-12-09', 31, '2018-12-14', '2018-12-15', 1, 300),
(40, '2018-12-09', 31, '2018-12-01', '2018-12-02', 1, 200),
(41, '2018-12-10', 31, '2018-12-12', '2018-12-14', 2, 1600),
(42, '2018-12-10', 32, '2018-12-01', '2018-12-04', 2, 7500);

-- --------------------------------------------------------

--
-- Table structure for table `room_detail`
--

CREATE TABLE `room_detail` (
  `Room_no` int(10) NOT NULL,
  `Rm_type` varchar(25) NOT NULL,
  `Rm_No_bed` int(10) NOT NULL,
  `Rm_price` int(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `room_detail`
--

INSERT INTO `room_detail` (`Room_no`, `Rm_type`, `Rm_No_bed`, `Rm_price`) VALUES
(1, 'Basic', 1, 750),
(2, 'Silver', 1, 2200),
(3, 'Luxury', 2, 200),
(4, 'Standard', 2, 300),
(5, 'Luxury', 2, 1000),
(6, 'Standard', 2, 300),
(7, 'deluxe', 2, 500),
(8, 'luxury', 2, 300);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin_profile`
--
ALTER TABLE `admin_profile`
  ADD PRIMARY KEY (`Ad_id`);

--
-- Indexes for table `customer_info`
--
ALTER TABLE `customer_info`
  ADD PRIMARY KEY (`Cu_id`);

--
-- Indexes for table `c_detail`
--
ALTER TABLE `c_detail`
  ADD KEY `R_id` (`R_id`),
  ADD KEY `Room_no` (`Room_no`),
  ADD KEY `C_id` (`C_id`);

--
-- Indexes for table `c_master`
--
ALTER TABLE `c_master`
  ADD PRIMARY KEY (`C_id`);

--
-- Indexes for table `feedback`
--
ALTER TABLE `feedback`
  ADD KEY `feedback_ibfk_1` (`Cu_id`);

--
-- Indexes for table `payment`
--
ALTER TABLE `payment`
  ADD PRIMARY KEY (`P_id`),
  ADD KEY `R_id` (`R_id`);

--
-- Indexes for table `reservation_detail`
--
ALTER TABLE `reservation_detail`
  ADD KEY `R_id` (`R_id`),
  ADD KEY `C_id` (`C_id`),
  ADD KEY `Room_no` (`Room_no`);

--
-- Indexes for table `re_master`
--
ALTER TABLE `re_master`
  ADD PRIMARY KEY (`R_id`);

--
-- Indexes for table `room_detail`
--
ALTER TABLE `room_detail`
  ADD PRIMARY KEY (`Room_no`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `customer_info`
--
ALTER TABLE `customer_info`
  MODIFY `Cu_id` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=33;

--
-- AUTO_INCREMENT for table `c_master`
--
ALTER TABLE `c_master`
  MODIFY `C_id` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=92;

--
-- AUTO_INCREMENT for table `payment`
--
ALTER TABLE `payment`
  MODIFY `P_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=97;

--
-- AUTO_INCREMENT for table `re_master`
--
ALTER TABLE `re_master`
  MODIFY `R_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=43;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `c_detail`
--
ALTER TABLE `c_detail`
  ADD CONSTRAINT `c_detail_ibfk_1` FOREIGN KEY (`R_id`) REFERENCES `re_master` (`R_id`),
  ADD CONSTRAINT `c_detail_ibfk_2` FOREIGN KEY (`C_id`) REFERENCES `c_master` (`C_id`);

--
-- Constraints for table `feedback`
--
ALTER TABLE `feedback`
  ADD CONSTRAINT `feedback_ibfk_1` FOREIGN KEY (`Cu_id`) REFERENCES `customer_info` (`Cu_id`);

--
-- Constraints for table `payment`
--
ALTER TABLE `payment`
  ADD CONSTRAINT `payment_ibfk_1` FOREIGN KEY (`R_id`) REFERENCES `re_master` (`R_id`);

--
-- Constraints for table `reservation_detail`
--
ALTER TABLE `reservation_detail`
  ADD CONSTRAINT `reservation_detail_ibfk_1` FOREIGN KEY (`R_id`) REFERENCES `re_master` (`R_id`),
  ADD CONSTRAINT `reservation_detail_ibfk_3` FOREIGN KEY (`Room_no`) REFERENCES `room_detail` (`Room_no`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

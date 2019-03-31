-- phpMyAdmin SQL Dump
-- version 4.7.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 06, 2017 at 01:46 PM
-- Server version: 10.1.25-MariaDB
-- PHP Version: 5.6.31

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `inventory`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `Username` varchar(20) NOT NULL,
  `Password` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`Username`, `Password`) VALUES
('Indrani', '1404030'),
('Ratul', '1404010'),
('Shatabdi', '1404023');

-- --------------------------------------------------------

--
-- Table structure for table `can_access`
--

CREATE TABLE `can_access` (
  `Admin_name` varchar(20) NOT NULL,
  `C_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `can_access`
--

INSERT INTO `can_access` (`Admin_name`, `C_id`) VALUES
('Indrani', 3),
('Ratul', 2),
('Shatabdi', 8),
('Ratul', 6),
('Indrani', 4),
('Shatabdi', 5),
('Indrani', 9),
('Ratul', 10),
('Shatabdi', 1),
('Indrani', 7);

-- --------------------------------------------------------

--
-- Table structure for table `contains`
--

CREATE TABLE `contains` (
  `Item_id` int(11) NOT NULL,
  `Order_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `contains`
--

INSERT INTO `contains` (`Item_id`, `Order_id`) VALUES
(1, 1),
(1, 2),
(3, 4),
(4, 5),
(7, 7),
(8, 8),
(6, 12),
(3, 3),
(6, 6);

-- --------------------------------------------------------

--
-- Table structure for table `customers`
--

CREATE TABLE `customers` (
  `Customer_Id` int(11) NOT NULL,
  `Name` varchar(20) NOT NULL,
  `Contact_no` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `customers`
--

INSERT INTO `customers` (`Customer_Id`, `Name`, `Contact_no`) VALUES
(1, 'Sakura', 12357639),
(2, 'Jui', 75637692),
(3, 'Antor', 347634923),
(4, 'Maisha', 74363002),
(5, 'Sifat', 723603802),
(6, 'Zisha', 32074404),
(7, 'Tazree', 35487990),
(8, 'Lima', 2873037),
(9, 'Raju', 28730380),
(10, 'Towhid', 2736297);

-- --------------------------------------------------------

--
-- Table structure for table `empty_lots`
--

CREATE TABLE `empty_lots` (
  `Lot_no` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `inventory`
--

CREATE TABLE `inventory` (
  `entry_id` int(11) NOT NULL,
  `p_name` varchar(20) DEFAULT NULL,
  `Quantity` double DEFAULT NULL,
  `Last_Update_Date` date DEFAULT NULL,
  `Admin_name` varchar(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `inventory`
--

INSERT INTO `inventory` (`entry_id`, `p_name`, `Quantity`, `Last_Update_Date`, `Admin_name`) VALUES
(1, 'rice', 200, '2017-10-29', 'Ratul'),
(2, 'potato', 200, '2017-11-03', 'Shatabdi'),
(3, 'Onion', 100, '2017-10-01', 'Shatabdi'),
(4, 'Ginger', 100, '2017-10-01', 'Ratul'),
(5, 'Tomato', 80, '2017-10-27', 'Indrani'),
(6, 'Apple', 60, '2017-11-04', 'Shatabdi'),
(7, 'Garlic', 60, '2017-11-04', 'Shatabdi'),
(8, 'Pulse', 80, '2017-10-09', 'Indrani'),
(9, 'orange', 100, '2017-11-03', 'Ratul'),
(10, 'mango', 100, '2017-11-03', 'Indrani'),
(11, 'cement', 80, '2017-11-03', 'Shatabdi'),
(12, 'newname', 60, '2017-11-04', 'Ratul');

-- --------------------------------------------------------

--
-- Table structure for table `items`
--

CREATE TABLE `items` (
  `Item_id` int(11) NOT NULL,
  `Name` varchar(20) NOT NULL,
  `Quantity` int(11) NOT NULL,
  `Per_unit_buying_price` int(11) NOT NULL,
  `Total_price` int(11) NOT NULL,
  `per_unit_selling_price` int(11) NOT NULL,
  `entry_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `items`
--

INSERT INTO `items` (`Item_id`, `Name`, `Quantity`, `Per_unit_buying_price`, `Total_price`, `per_unit_selling_price`, `entry_id`) VALUES
(1, 'Rice', 200, 50, 10000, 60, 1),
(2, 'potato', 200, 15, 3000, 20, 2),
(3, 'Onion', 100, 40, 4000, 50, 3),
(4, 'Ginger', 100, 50, 5000, 65, 4),
(5, 'Tomato', 80, 20, 1600, 40, 5),
(6, 'Apple', 60, 100, 6000, 120, 6),
(7, 'Garlic', 60, 70, 4200, 100, 7),
(8, 'Pulse', 80, 100, 8000, 125, 8),
(9, 'orange', 100, 30, 3000, 50, 9),
(10, 'mango', 100, 50, 5000, 60, 10),
(11, 'cement', 80, 20, 1600, 30, 11),
(12, 'newname', 60, 20, 1200, 30, 12);

-- --------------------------------------------------------

--
-- Table structure for table `lot_details`
--

CREATE TABLE `lot_details` (
  `Item_id` int(11) NOT NULL,
  `Lot_no` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `lot_details`
--

INSERT INTO `lot_details` (`Item_id`, `Lot_no`) VALUES
(1, 1),
(1, 2),
(2, 14),
(3, 3),
(3, 5),
(4, 4),
(4, 6),
(5, 7),
(6, 8),
(6, 15),
(7, 9),
(8, 10),
(9, 11),
(10, 12),
(10, 13),
(11, 16),
(12, 18);

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `order_id` int(11) NOT NULL,
  `Order_Amount` double NOT NULL,
  `Order_Date` date NOT NULL,
  `Total_price` int(11) NOT NULL,
  `C_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`order_id`, `Order_Amount`, `Order_Date`, `Total_price`, `C_id`) VALUES
(1, 10, '2017-10-01', 600, 1),
(2, 20, '2017-10-04', 1200, 6),
(3, 40, '2017-10-04', 2000, 3),
(4, 50, '2017-10-07', 2500, 5),
(5, 30, '2017-10-12', 1950, 7),
(6, 60, '2017-10-12', 7200, 4),
(7, 30, '2017-10-17', 3000, 9),
(8, 40, '2017-10-19', 5000, 1),
(9, 50, '2017-10-21', 3500, 2),
(10, 30, '2017-10-23', 3600, 8),
(11, 50, '2017-10-17', 6000, 1),
(12, 70, '2017-10-18', 8400, 5),
(13, 90, '2017-10-25', 10800, 6),
(14, 46, '2017-10-24', 1150, 8),
(15, 36, '2017-10-15', 0, 3);

-- --------------------------------------------------------

--
-- Table structure for table `out_stock`
--

CREATE TABLE `out_stock` (
  `Id` int(11) NOT NULL,
  `Item_name` varchar(20) NOT NULL,
  `Min_quant` double NOT NULL,
  `Max_quant` double NOT NULL,
  `Probable_date` date NOT NULL,
  `entry_id` int(11) NOT NULL,
  `OOS_status` varchar(10) NOT NULL,
  `OS_status` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `out_stock`
--

INSERT INTO `out_stock` (`Id`, `Item_name`, `Min_quant`, `Max_quant`, `Probable_date`, `entry_id`, `OOS_status`, `OS_status`) VALUES
(101, 'Rice', 200, 300, '2017-11-01', 1, 'Yes', 'No'),
(102, 'potato', 50, 150, '2017-11-03', 2, 'No', 'Yes'),
(103, 'Onion', 40, 200, '2017-10-30', 3, '-', '-'),
(104, 'Ginger', 50, 200, '2017-10-30', 4, '-', '-'),
(105, 'Tomato', 20, 60, '2017-10-27', 5, 'No', 'Yes'),
(106, 'Apple', 30, 150, '2017-10-20', 6, '-', '-'),
(107, 'Garlic', 30, 150, '2017-10-21', 7, '-', '-'),
(108, 'Pulse', 40, 200, '2017-11-09', 8, '-', '-'),
(109, 'orange', 20, 80, '2017-11-03', 9, 'No', 'Yes'),
(110, 'mango', 40, 80, '2017-11-03', 10, 'No', 'Yes'),
(111, 'cement', 30, 60, '2017-11-03', 11, 'No', 'Yes'),
(114, 'newname', 10, 30, '2017-11-04', 12, 'No', 'Yes');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`Username`);

--
-- Indexes for table `can_access`
--
ALTER TABLE `can_access`
  ADD KEY `Admin_name` (`Admin_name`),
  ADD KEY `C_id` (`C_id`),
  ADD KEY `C_id_2` (`C_id`) USING BTREE;

--
-- Indexes for table `contains`
--
ALTER TABLE `contains`
  ADD KEY `Item_id` (`Item_id`),
  ADD KEY `Order_id` (`Order_id`);

--
-- Indexes for table `customers`
--
ALTER TABLE `customers`
  ADD PRIMARY KEY (`Customer_Id`);

--
-- Indexes for table `inventory`
--
ALTER TABLE `inventory`
  ADD PRIMARY KEY (`entry_id`),
  ADD KEY `Admin_name` (`Admin_name`);

--
-- Indexes for table `items`
--
ALTER TABLE `items`
  ADD PRIMARY KEY (`Item_id`),
  ADD KEY `entry_id` (`entry_id`);

--
-- Indexes for table `lot_details`
--
ALTER TABLE `lot_details`
  ADD PRIMARY KEY (`Lot_no`),
  ADD KEY `Item_id` (`Item_id`);

--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`order_id`),
  ADD KEY `C_id` (`C_id`),
  ADD KEY `C_id_2` (`C_id`);

--
-- Indexes for table `out_stock`
--
ALTER TABLE `out_stock`
  ADD PRIMARY KEY (`Id`),
  ADD KEY `entry_id` (`entry_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `lot_details`
--
ALTER TABLE `lot_details`
  MODIFY `Lot_no` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;
--
-- AUTO_INCREMENT for table `out_stock`
--
ALTER TABLE `out_stock`
  MODIFY `Id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=115;
--
-- Constraints for dumped tables
--

--
-- Constraints for table `can_access`
--
ALTER TABLE `can_access`
  ADD CONSTRAINT `can_access_ibfk_1` FOREIGN KEY (`Admin_name`) REFERENCES `admin` (`Username`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `can_access_ibfk_2` FOREIGN KEY (`C_id`) REFERENCES `customers` (`Customer_Id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `contains`
--
ALTER TABLE `contains`
  ADD CONSTRAINT `contains_ibfk_1` FOREIGN KEY (`Item_id`) REFERENCES `items` (`Item_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `contains_ibfk_2` FOREIGN KEY (`Order_id`) REFERENCES `orders` (`order_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `inventory`
--
ALTER TABLE `inventory`
  ADD CONSTRAINT `inventory_ibfk_1` FOREIGN KEY (`Admin_name`) REFERENCES `admin` (`Username`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `items`
--
ALTER TABLE `items`
  ADD CONSTRAINT `items_ibfk_1` FOREIGN KEY (`entry_id`) REFERENCES `inventory` (`entry_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `lot_details`
--
ALTER TABLE `lot_details`
  ADD CONSTRAINT `lot_details_ibfk_1` FOREIGN KEY (`Item_id`) REFERENCES `items` (`Item_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `orders`
--
ALTER TABLE `orders`
  ADD CONSTRAINT `orders_ibfk_1` FOREIGN KEY (`C_id`) REFERENCES `customers` (`Customer_Id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `out_stock`
--
ALTER TABLE `out_stock`
  ADD CONSTRAINT `out_stock_ibfk_1` FOREIGN KEY (`entry_id`) REFERENCES `inventory` (`entry_id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

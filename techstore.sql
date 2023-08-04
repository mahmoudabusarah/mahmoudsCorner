-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Aug 04, 2023 at 07:34 PM
-- Server version: 10.4.28-MariaDB
-- PHP Version: 8.0.28

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `techstore`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin_table`
--

CREATE TABLE `admin_table` (
  `Admin_ID` int(11) NOT NULL,
  `Admin_Name` varchar(1000) NOT NULL,
  `Admin_Email` varchar(1000) NOT NULL,
  `Admin_Password` varchar(1000) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `admin_table`
--

INSERT INTO `admin_table` (`Admin_ID`, `Admin_Name`, `Admin_Email`, `Admin_Password`) VALUES
(1, 'mahmoud abu sara', 'mahmoud@outlook.com', '123'),
(2, 'mahmoud abu sara', 'mahmoud@outlook.com', '123');

-- --------------------------------------------------------

--
-- Table structure for table `order_table`
--

CREATE TABLE `order_table` (
  `Order_ID` int(11) NOT NULL,
  `Product_name` varchar(1000) NOT NULL,
  `user_name` varchar(1000) NOT NULL,
  `User_Email` varchar(1000) NOT NULL,
  `User_Adress` varchar(1000) NOT NULL,
  `User_City` varchar(1000) NOT NULL,
  `user_State` varchar(1000) NOT NULL,
  `user_zipcode` int(11) NOT NULL,
  `user_phone_number` int(11) NOT NULL,
  `order_total` varchar(1000) NOT NULL,
  `product_color` varchar(1000) NOT NULL,
  `product_type` varchar(1000) NOT NULL,
  `product_Image` varchar(1000) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `order_table`
--

INSERT INTO `order_table` (`Order_ID`, `Product_name`, `user_name`, `User_Email`, `User_Adress`, `User_City`, `user_State`, `user_zipcode`, `user_phone_number`, `order_total`, `product_color`, `product_type`, `product_Image`) VALUES
(10, 'Galaxy S23 Ultra', 'mahmoud abusara', 'mahmoud.abusarah@outlook.com', '5417 butler street', 'Pittsburgh', 'GA', 15201, 2147483647, '1,189.00', 'black', 'SAMSUNG ', 'image1.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `product`
--

CREATE TABLE `product` (
  `PID` int(11) NOT NULL,
  `P_Name` varchar(1000) NOT NULL,
  `P_Price` varchar(1000) NOT NULL,
  `P_Type` varchar(1000) NOT NULL,
  `P_mage` varchar(1000) NOT NULL,
  `P_year` int(100) NOT NULL,
  `P_color` varchar(1000) NOT NULL,
  `P_Rating` int(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `product`
--

INSERT INTO `product` (`PID`, `P_Name`, `P_Price`, `P_Type`, `P_mage`, `P_year`, `P_color`, `P_Rating`) VALUES
(1, 'Galaxy S23 Ultra', '1,189.00', 'SAMSUNG ', 'image1.jpg', 2023, 'black', 5),
(2, 'iPhone 14 Pro Max', '1389.97', 'Apple', 'image2.jpg', 2023, 'Purple', 4),
(3, 'V60 ThinQ ', '207.99', 'LG', 'image3.jpg', 2018, 'Dark blue', 2),
(4, 'razr+', '999', 'Motorola', 'image4.jpg', 2023, 'sliver', 3),
(6, 'Y7', '99', 'Huawei', 'image5.jpg', 2014, 'blue', 1),
(7, ' Redmi Note 12', '158.50', 'Xiaomi ', 'image6.jpg', 2023, 'black', 4),
(9, 'Redmi Note 11', '120.5', 'Xiaomi ', 'image7.jpg', 2022, 'yellow', 2),
(10, 'Poco X5 PRO', '400', 'Xiaomi ', 'image9.jpg', 2022, 'black', 4),
(11, 'iphone 13 pro', '1,000.56', 'apple', 'image8.jpg', 2022, 'sky blue', 4),
(12, 'iPhone 12', '393.00', 'apple', 'image10.jpg', 2022, 'black', 5),
(13, 'Google Pixel 2', '267.00', 'Google', 'pixel2.jpg', 2017, 'Kinda Blue', 5);

-- --------------------------------------------------------

--
-- Table structure for table `support_table`
--

CREATE TABLE `support_table` (
  `Support_ID` int(11) NOT NULL,
  `Support_Name` varchar(1000) NOT NULL,
  `Support_Email` varchar(1000) NOT NULL,
  `Support_Password` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `support_table`
--

INSERT INTO `support_table` (`Support_ID`, `Support_Name`, `Support_Email`, `Support_Password`) VALUES
(1, 'mahmoud', 'mahmoud@outlook.com', 123);

-- --------------------------------------------------------

--
-- Table structure for table `tickiting_report`
--

CREATE TABLE `tickiting_report` (
  `TID` int(11) NOT NULL,
  `Order_ID` varchar(1000) NOT NULL,
  `Order_name` varchar(1000) NOT NULL,
  `Order_Device_name` varchar(1000) NOT NULL,
  `Order_total` varchar(1000) NOT NULL,
  `User_name` varchar(1000) NOT NULL,
  `User_email` varchar(1000) NOT NULL,
  `shipping_adress` varchar(1000) NOT NULL,
  `User_problem` text NOT NULL,
  `urgent_status` varchar(1000) NOT NULL,
  `damage_image` varchar(1000) NOT NULL,
  `ticket_subject` varchar(1000) NOT NULL,
  `ticket_status` varchar(1000) NOT NULL,
  `support_Name` varchar(1000) NOT NULL,
  `Support_Email` varchar(1000) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tickiting_report`
--

INSERT INTO `tickiting_report` (`TID`, `Order_ID`, `Order_name`, `Order_Device_name`, `Order_total`, `User_name`, `User_email`, `shipping_adress`, `User_problem`, `urgent_status`, `damage_image`, `ticket_subject`, `ticket_status`, `support_Name`, `Support_Email`) VALUES
(9, '10', 'Galaxy S23 Ultra', 'SAMSUNG ', '1,189.00', 'mahmoud abusara', 'mahmoud.abusarah@outlook.com', '5417 butler street Pittsburgh GA 15201', 'ewqewqewqewewqwe', 'high', 'image1.jpg', 'broken', 'solved', 'mahmoud', 'mahmoud@outlook.com');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `USID` int(11) NOT NULL,
  `User_Full_Name` varchar(1000) NOT NULL,
  `User_Email` varchar(1000) NOT NULL,
  `User_password` varchar(100) NOT NULL,
  `User_DOB` date NOT NULL,
  `User_Adress` varchar(100) NOT NULL,
  `User_State` varchar(100) NOT NULL,
  `User_city` varchar(100) NOT NULL,
  `user_zipcode` int(100) NOT NULL,
  `User_phone_number` int(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`USID`, `User_Full_Name`, `User_Email`, `User_password`, `User_DOB`, `User_Adress`, `User_State`, `User_city`, `user_zipcode`, `User_phone_number`) VALUES
(6, 'mahmoud abusara', 'mahmoud.abusarah@outlook.com', '123', '2023-08-23', '5417 butler street', 'GA', 'Pittsburgh', 15201, 2147483647);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin_table`
--
ALTER TABLE `admin_table`
  ADD PRIMARY KEY (`Admin_ID`);

--
-- Indexes for table `order_table`
--
ALTER TABLE `order_table`
  ADD PRIMARY KEY (`Order_ID`);

--
-- Indexes for table `product`
--
ALTER TABLE `product`
  ADD PRIMARY KEY (`PID`);

--
-- Indexes for table `support_table`
--
ALTER TABLE `support_table`
  ADD PRIMARY KEY (`Support_ID`);

--
-- Indexes for table `tickiting_report`
--
ALTER TABLE `tickiting_report`
  ADD PRIMARY KEY (`TID`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`USID`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin_table`
--
ALTER TABLE `admin_table`
  MODIFY `Admin_ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `order_table`
--
ALTER TABLE `order_table`
  MODIFY `Order_ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `product`
--
ALTER TABLE `product`
  MODIFY `PID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `support_table`
--
ALTER TABLE `support_table`
  MODIFY `Support_ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `tickiting_report`
--
ALTER TABLE `tickiting_report`
  MODIFY `TID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `USID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

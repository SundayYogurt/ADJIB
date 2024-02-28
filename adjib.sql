-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Feb 28, 2024 at 04:06 AM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `adjib`
--

-- --------------------------------------------------------

--
-- Table structure for table `tbl_classification`
--

CREATE TABLE `tbl_classification` (
  `Classification_ID` int(11) NOT NULL,
  `Classification_Name` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tbl_classification`
--

INSERT INTO `tbl_classification` (`Classification_ID`, `Classification_Name`) VALUES
(1, 'COMPUTER'),
(2, 'MACBOOK'),
(3, 'IPHONE'),
(4, 'IPAD'),
(5, 'SMARTPHONE');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_customer`
--

CREATE TABLE `tbl_customer` (
  `Customer_ID` int(11) NOT NULL,
  `User_Name` varchar(255) NOT NULL,
  `Password` int(11) NOT NULL,
  `zipcode` varchar(255) NOT NULL,
  `District` varchar(255) NOT NULL,
  `Sub_District` varchar(255) NOT NULL,
  `House_no` varchar(255) NOT NULL,
  `Province` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tbl_customer`
--

INSERT INTO `tbl_customer` (`Customer_ID`, `User_Name`, `Password`, `zipcode`, `District`, `Sub_District`, `House_no`, `Province`) VALUES
(1, 'SUKCHAI', 1234, '71000', 'วังตะกู', 'วังตะกู', '43/122', 'นครปฐม'),
(2, 'ธนกฤต', 7788, '10100', 'สยาม', 'สยาม', '244/110', 'กรุงเทพฯ');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_order`
--

CREATE TABLE `tbl_order` (
  `Order_ID` int(11) NOT NULL,
  `Customer_ID` int(11) NOT NULL,
  `Order_Date_Time` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `Track_ID` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tbl_order`
--

INSERT INTO `tbl_order` (`Order_ID`, `Customer_ID`, `Order_Date_Time`, `Track_ID`) VALUES
(1, 1, '2024-02-24 10:42:38', 1231244321),
(2, 2, '2024-02-27 14:27:00', 1231244321);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_order_detail`
--

CREATE TABLE `tbl_order_detail` (
  `Order_ID` int(11) NOT NULL,
  `Promotion_ID` int(11) NOT NULL,
  `Product_ID` int(11) NOT NULL,
  `Order_Quantity` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_product`
--

CREATE TABLE `tbl_product` (
  `Product_ID` int(11) NOT NULL,
  `Product_Name` varchar(255) NOT NULL,
  `Price` int(11) NOT NULL,
  `Picture` varchar(255) NOT NULL,
  `Brand` varchar(255) NOT NULL,
  `Classification_ID` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tbl_product`
--

INSERT INTO `tbl_product` (`Product_ID`, `Product_Name`, `Price`, `Picture`, `Brand`, `Classification_ID`) VALUES
(7, 'IPHONE 15 PRO 128GB NATURAL TITANIUM', 48900, 'iphone-15-promax-natural titanium.png', 'APPLE', 3),
(8, 'IPHONE 15 128GB PINK', 31900, 'iphone-15-pink.webp', 'APPLE', 3);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_promotion`
--

CREATE TABLE `tbl_promotion` (
  `Promotion_ID` int(11) NOT NULL,
  `Promotion_Name` varchar(255) NOT NULL,
  `Promotion_Remaining` int(11) NOT NULL,
  `Promotion_Date` date NOT NULL,
  `Discount_Used` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tbl_promotion`
--

INSERT INTO `tbl_promotion` (`Promotion_ID`, `Promotion_Name`, `Promotion_Remaining`, `Promotion_Date`, `Discount_Used`) VALUES
(1, 'ส่วนลด 90%', 20, '2024-02-25', 90);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_tracking`
--

CREATE TABLE `tbl_tracking` (
  `Track_ID` int(11) NOT NULL,
  `Courior_Name` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tbl_tracking`
--

INSERT INTO `tbl_tracking` (`Track_ID`, `Courior_Name`) VALUES
(235232353, 'FLASH'),
(1231244321, 'kerry');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tbl_classification`
--
ALTER TABLE `tbl_classification`
  ADD PRIMARY KEY (`Classification_ID`);

--
-- Indexes for table `tbl_customer`
--
ALTER TABLE `tbl_customer`
  ADD PRIMARY KEY (`Customer_ID`);

--
-- Indexes for table `tbl_order`
--
ALTER TABLE `tbl_order`
  ADD PRIMARY KEY (`Order_ID`),
  ADD KEY `Customer_ID` (`Customer_ID`),
  ADD KEY `Track_ID` (`Track_ID`);

--
-- Indexes for table `tbl_order_detail`
--
ALTER TABLE `tbl_order_detail`
  ADD PRIMARY KEY (`Order_ID`,`Promotion_ID`),
  ADD KEY `Promotion_ID` (`Promotion_ID`),
  ADD KEY `Product_ID` (`Product_ID`);

--
-- Indexes for table `tbl_product`
--
ALTER TABLE `tbl_product`
  ADD PRIMARY KEY (`Product_ID`),
  ADD KEY `Classification_ID` (`Classification_ID`);

--
-- Indexes for table `tbl_promotion`
--
ALTER TABLE `tbl_promotion`
  ADD PRIMARY KEY (`Promotion_ID`);

--
-- Indexes for table `tbl_tracking`
--
ALTER TABLE `tbl_tracking`
  ADD PRIMARY KEY (`Track_ID`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tbl_classification`
--
ALTER TABLE `tbl_classification`
  MODIFY `Classification_ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `tbl_customer`
--
ALTER TABLE `tbl_customer`
  MODIFY `Customer_ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `tbl_order`
--
ALTER TABLE `tbl_order`
  MODIFY `Order_ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `tbl_order_detail`
--
ALTER TABLE `tbl_order_detail`
  MODIFY `Order_ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `tbl_product`
--
ALTER TABLE `tbl_product`
  MODIFY `Product_ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `tbl_order`
--
ALTER TABLE `tbl_order`
  ADD CONSTRAINT `tbl_order_ibfk_1` FOREIGN KEY (`Customer_ID`) REFERENCES `tbl_customer` (`Customer_ID`),
  ADD CONSTRAINT `tbl_order_ibfk_2` FOREIGN KEY (`Track_ID`) REFERENCES `tbl_tracking` (`Track_ID`);

--
-- Constraints for table `tbl_order_detail`
--
ALTER TABLE `tbl_order_detail`
  ADD CONSTRAINT `tbl_order_detail_ibfk_1` FOREIGN KEY (`Order_ID`) REFERENCES `tbl_order` (`Order_ID`),
  ADD CONSTRAINT `tbl_order_detail_ibfk_2` FOREIGN KEY (`Promotion_ID`) REFERENCES `tbl_promotion` (`Promotion_ID`),
  ADD CONSTRAINT `tbl_order_detail_ibfk_3` FOREIGN KEY (`Product_ID`) REFERENCES `tbl_product` (`Product_ID`);

--
-- Constraints for table `tbl_product`
--
ALTER TABLE `tbl_product`
  ADD CONSTRAINT `tbl_product_ibfk_1` FOREIGN KEY (`Classification_ID`) REFERENCES `tbl_classification` (`Classification_ID`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

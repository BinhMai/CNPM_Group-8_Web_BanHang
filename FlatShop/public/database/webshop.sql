-- phpMyAdmin SQL Dump
-- version 4.7.2
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Nov 19, 2017 at 04:02 AM
-- Server version: 5.6.22
-- PHP Version: 7.1.7

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `webshop`
--

-- --------------------------------------------------------

--
-- Table structure for table `bill_detail`
--

CREATE TABLE `bill_detail` (
  `billID` varchar(20) COLLATE utf8mb4_vietnamese_ci NOT NULL,
  `userID` varchar(20) COLLATE utf8mb4_vietnamese_ci DEFAULT NULL,
  `orderID` varchar(20) COLLATE utf8mb4_vietnamese_ci NOT NULL,
  `dateofbirth` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_vietnamese_ci;

-- --------------------------------------------------------

--
-- Table structure for table `category_detail`
--

CREATE TABLE `category_detail` (
  `categoryID` varchar(20) COLLATE utf8mb4_vietnamese_ci NOT NULL,
  `name` varchar(50) COLLATE utf8mb4_vietnamese_ci NOT NULL,
  `url` varchar(50) COLLATE utf8mb4_vietnamese_ci NOT NULL,
  `parentID` varchar(20) COLLATE utf8mb4_vietnamese_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_vietnamese_ci;

-- --------------------------------------------------------

--
-- Table structure for table `comment`
--

CREATE TABLE `comment` (
  `commentID` varchar(20) COLLATE utf8mb4_vietnamese_ci NOT NULL,
  `userID` varchar(20) COLLATE utf8mb4_vietnamese_ci NOT NULL,
  `productID` varchar(20) COLLATE utf8mb4_vietnamese_ci NOT NULL,
  `content` text COLLATE utf8mb4_vietnamese_ci NOT NULL,
  `rate` int(1) DEFAULT NULL,
  `dateofbirth` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_vietnamese_ci;

-- --------------------------------------------------------

--
-- Table structure for table `media_detail`
--

CREATE TABLE `media_detail` (
  `mediaID` varchar(20) COLLATE utf8mb4_vietnamese_ci NOT NULL,
  `owner` varchar(20) COLLATE utf8mb4_vietnamese_ci NOT NULL,
  `name` varchar(100) COLLATE utf8mb4_vietnamese_ci NOT NULL,
  `dateofbirth` datetime NOT NULL,
  `path` text COLLATE utf8mb4_vietnamese_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_vietnamese_ci;

-- --------------------------------------------------------

--
-- Table structure for table `order_detail`
--

CREATE TABLE `order_detail` (
  `orderID` varchar(20) COLLATE utf8mb4_vietnamese_ci NOT NULL,
  `userID` varchar(20) COLLATE utf8mb4_vietnamese_ci DEFAULT NULL,
  `productID` varchar(20) COLLATE utf8mb4_vietnamese_ci NOT NULL,
  `dateofbirth` datetime NOT NULL,
  `dateofend` datetime NOT NULL,
  `coupon` varchar(20) COLLATE utf8mb4_vietnamese_ci NOT NULL,
  `price` int(50) NOT NULL,
  `status` int(1) NOT NULL DEFAULT '0',
  `isActive` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_vietnamese_ci;

--
-- Dumping data for table `order_detail`
--

INSERT INTO `order_detail` (`orderID`, `userID`, `productID`, `dateofbirth`, `dateofend`, `coupon`, `price`, `status`, `isActive`) VALUES
('OD01', 'bbbb', 'PD01', '2017-11-18 00:00:00', '2017-11-18 00:00:00', '', 50, 0, 1),
('OD02', 'bbbb', 'PD02', '2017-11-18 00:00:00', '2017-11-18 00:00:00', '', 100, 1, 1),
('OD03', 'hhhhh', 'PD03', '2017-11-24 00:00:00', '2017-11-30 00:00:00', '', 120, 2, 1);

-- --------------------------------------------------------

--
-- Table structure for table `order_product_reference`
--

CREATE TABLE `order_product_reference` (
  `opID` varchar(40) COLLATE utf8mb4_vietnamese_ci NOT NULL,
  `orderID` varchar(20) COLLATE utf8mb4_vietnamese_ci NOT NULL,
  `productID` varchar(20) COLLATE utf8mb4_vietnamese_ci NOT NULL,
  `quantum` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_vietnamese_ci;

-- --------------------------------------------------------

--
-- Table structure for table `product_category_reference`
--

CREATE TABLE `product_category_reference` (
  `id` varchar(40) COLLATE utf8mb4_vietnamese_ci NOT NULL,
  `productID` varchar(20) COLLATE utf8mb4_vietnamese_ci NOT NULL,
  `categoryID` varchar(20) COLLATE utf8mb4_vietnamese_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_vietnamese_ci;

-- --------------------------------------------------------

--
-- Table structure for table `product_detail`
--

CREATE TABLE `product_detail` (
  `productID` varchar(20) COLLATE utf8mb4_vietnamese_ci NOT NULL,
  `productname` varchar(100) COLLATE utf8mb4_vietnamese_ci DEFAULT NULL,
  `desciption` text COLLATE utf8mb4_vietnamese_ci,
  `price` int(50) DEFAULT NULL,
  `saleprice` int(50) DEFAULT '0',
  `pictures` varchar(200) COLLATE utf8mb4_vietnamese_ci NOT NULL DEFAULT 'images/slider-image-01.png',
  `quantuminstock` int(50) DEFAULT NULL,
  `categoryID` varchar(20) COLLATE utf8mb4_vietnamese_ci NOT NULL,
  `ownerID` varchar(20) COLLATE utf8mb4_vietnamese_ci NOT NULL,
  `dateofbirth` datetime NOT NULL,
  `dateofend` datetime NOT NULL,
  `isActive` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_vietnamese_ci;

--
-- Dumping data for table `product_detail`
--

INSERT INTO `product_detail` (`productID`, `productname`, `desciption`, `price`, `saleprice`, `pictures`, `quantuminstock`, `categoryID`, `ownerID`, `dateofbirth`, `dateofend`, `isActive`) VALUES
('bbbb', 'mmmmmmnnnnn', NULL, 80, 80, 'images/hinh-nen-noel-dep-cho-may-tinh-9.jpg', 70, 'B', 'D', '2017-11-19 00:04:56', '2017-11-19 00:04:56', 1),
('kkkkk', 'h', NULL, 45, 0, 'images/hinh-nen-giang-sinh-dep-cho-mua-noel-7.jpg', 70, 'B', 'C', '2017-11-18 10:39:11', '2017-11-18 10:39:11', 1),
('ttttt', 'ttt', NULL, 67, 0, 'images/slider-image-01.png', 56, 'B', 'C', '2017-11-19 00:05:34', '2017-11-19 00:05:34', 1),
('uuuu', 'eeee', NULL, 56, 40, 'images/slider-image-01.png', 70, 'C', 'D', '2017-11-18 00:57:35', '2017-11-18 00:57:35', 0),
('vvvvvvvv', 'Áo Thun đẹp', 'Nó rất là đẹp', 70, 0, 'images/hinh-nen-noel-dep-cho-may-tinh-9.jpg', 100, 'B', 'D', '2017-11-18 10:58:33', '2017-11-18 10:58:33', 0);

-- --------------------------------------------------------

--
-- Table structure for table `product_media_reference`
--

CREATE TABLE `product_media_reference` (
  `pmID` varchar(40) COLLATE utf8mb4_vietnamese_ci NOT NULL,
  `productID` varchar(20) COLLATE utf8mb4_vietnamese_ci NOT NULL,
  `mediaID` varchar(20) COLLATE utf8mb4_vietnamese_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_vietnamese_ci;

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `userID` varchar(20) CHARACTER SET latin1 NOT NULL,
  `username` varchar(50) CHARACTER SET latin1 NOT NULL,
  `password` varchar(200) CHARACTER SET latin1 NOT NULL,
  `email` varchar(100) CHARACTER SET latin1 NOT NULL,
  `address` varchar(50) COLLATE utf8mb4_vietnamese_ci NOT NULL,
  `firstname` varchar(20) CHARACTER SET utf16 COLLATE utf16_vietnamese_ci NOT NULL,
  `lastname` varchar(20) CHARACTER SET utf16 COLLATE utf16_vietnamese_ci NOT NULL,
  `telephone` int(11) NOT NULL,
  `mediaID` varchar(200) COLLATE utf8mb4_vietnamese_ci NOT NULL DEFAULT 'images/images.jpg',
  `gender` int(1) NOT NULL,
  `dateofbirth` date NOT NULL,
  `typeofuser` int(1) NOT NULL DEFAULT '4',
  `dateofcreate` datetime NOT NULL,
  `remember_token` varchar(200) COLLATE utf8mb4_vietnamese_ci DEFAULT NULL,
  `isActive` int(1) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_vietnamese_ci;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`userID`, `username`, `password`, `email`, `address`, `firstname`, `lastname`, `telephone`, `mediaID`, `gender`, `dateofbirth`, `typeofuser`, `dateofcreate`, `remember_token`, `isActive`) VALUES
('bbbb', 'binh', '$2y$10$OlrMzRdIs5gUaXY5.aN2hu8wItHA4mm2u5D4.3YZ7nEXTP4G1NAsa', 'hoanbinh@gmail.com', 'Nam Định', 'Hoàng', 'Bình', 1277079411, 'images/hinh-nen-noel-dep-cho-may-tinh-9.jpg', 1, '1996-10-31', 4, '2017-11-18 23:08:30', '4t31VaBmIMb4Q6vateRBzebaT11MWS983fTvhCWfjtZU4DQTjmFfxLjDyHo2', 1),
('kkkkkk', 'mai', '$2y$10$8e21AF1kc6y/9Vl6MNJTxel/CI9vNgrrlqflnTXpnc77vlR9ueB/W', 'hoangbinhnt1996@gmail.com', 'Hà Nội', 'Phạm Thị', 'Mai', 1277079411, 'images/Hinh-nen-noel-hinh-nen-giang-sinh-2015-2.jpg', 0, '1996-08-13', 2, '2017-11-19 00:07:44', 'nyiIRmlwML5Js6utRj0vnmIz6HDdqQliIOGAPItZWFlGXNXVCqgd3QNnJWo7', 1),
('tttt', 'binhmai', '$2y$10$6MYGRHeVFfAaay2jKIzihuFHMrzP47URkzRSlfwFEArB//gHy3YDW', 'hoa@gmail.com', 'Hà Nội', 'Hoàng Xuân', 'Bình', 1277079411, 'images/images.jpg', 1, '1996-10-31', 3, '2017-11-19 00:02:24', 'qygBmtkWK0T9RyXfTVUfGUY5koy3vX6h6jy1bV2q8SQD90CzwgfucgGEGDbX', 1),
('vvvv', 'admin', '$2y$10$wrkZ9MtUvKLtX4/W7WsmYO6muyswrohoLW8hAEn3q.MNcbJUeZbu6', 'admin@gmail.com', 'admin', 'ad', 'min', 1277079411, 'images/hinh-nen-noel-7.jpg', 1, '2010-05-02', 1, '2017-11-19 00:00:57', '6C59Rteesq51WjIwmrKxXgPfuOf2ZhUblLod72PSlNCMkcE4LiGefKsVk9d9', 1);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `bill_detail`
--
ALTER TABLE `bill_detail`
  ADD PRIMARY KEY (`billID`);

--
-- Indexes for table `category_detail`
--
ALTER TABLE `category_detail`
  ADD PRIMARY KEY (`categoryID`);

--
-- Indexes for table `comment`
--
ALTER TABLE `comment`
  ADD PRIMARY KEY (`commentID`);

--
-- Indexes for table `media_detail`
--
ALTER TABLE `media_detail`
  ADD PRIMARY KEY (`mediaID`);

--
-- Indexes for table `order_detail`
--
ALTER TABLE `order_detail`
  ADD PRIMARY KEY (`orderID`);

--
-- Indexes for table `order_product_reference`
--
ALTER TABLE `order_product_reference`
  ADD PRIMARY KEY (`opID`);

--
-- Indexes for table `product_category_reference`
--
ALTER TABLE `product_category_reference`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `product_detail`
--
ALTER TABLE `product_detail`
  ADD PRIMARY KEY (`productID`);

--
-- Indexes for table `product_media_reference`
--
ALTER TABLE `product_media_reference`
  ADD PRIMARY KEY (`pmID`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`userID`),
  ADD UNIQUE KEY `email` (`email`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

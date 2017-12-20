-- phpMyAdmin SQL Dump
-- version 4.7.2
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Dec 20, 2017 at 04:17 PM
-- Server version: 5.6.37
-- PHP Version: 7.2.0beta1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `web_shop`
--

-- --------------------------------------------------------

--
-- Table structure for table `bill_detail`
--

CREATE TABLE `bill_detail` (
  `bill_ID` int(20) NOT NULL,
  `userID` varchar(20) COLLATE utf8mb4_vietnamese_ci DEFAULT NULL,
  `shipper` varchar(20) COLLATE utf8mb4_vietnamese_ci DEFAULT NULL,
  `name` varchar(20) COLLATE utf8mb4_vietnamese_ci NOT NULL,
  `adress` varchar(50) COLLATE utf8mb4_vietnamese_ci NOT NULL,
  `telephone` int(13) NOT NULL,
  `email` varchar(30) COLLATE utf8mb4_vietnamese_ci NOT NULL,
  `price` int(50) NOT NULL DEFAULT '0',
  `dateofbirth` datetime NOT NULL,
  `status` int(1) NOT NULL DEFAULT '0',
  `isActive` int(1) NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_vietnamese_ci;

--
-- Dumping data for table `bill_detail`
--

INSERT INTO `bill_detail` (`bill_ID`, `userID`, `shipper`, `name`, `adress`, `telephone`, `email`, `price`, `dateofbirth`, `status`, `isActive`) VALUES
(20, '13', NULL, 'Ninh', 'Bắc Giang', 123456789, 'ngninh96@gmail.com', 550000, '2017-12-07 15:09:19', 1, 1),
(22, '12', NULL, 'Bình', 'Hà Nội', 1277079411, 'hoangbinhnt1996@gmail.com', 550000, '2017-12-08 09:23:05', 0, 1),
(23, '12', NULL, 'Bình', 'Hà Nội', 1277079411, 'hoangbinhnt1996@gmail.com', 550000, '2017-12-08 09:25:30', 0, 1),
(24, '12', NULL, 'Bình', 'Hà Nội', 1277079411, 'hoangbinhnt1996@gmail.com', 550000, '2017-12-08 09:26:34', 0, 1),
(25, '12', NULL, 'Bình', 'Hà Nội', 1277079411, 'hoangbinhnt1996@gmail.com', 550000, '2017-12-08 09:28:26', 0, 1),
(26, '14', NULL, 'Loan', 'Hưng Yên', 1111111111, 'loan@gmail.com', 7640000, '2017-12-08 09:32:26', 0, 1),
(27, '14', NULL, 'Loan', 'Hưng Yên', 1111111111, 'loan@gmail.com', 7640000, '2017-12-08 09:33:13', 0, 1),
(28, '118.70.184.228', NULL, 'Hoàng Bình', 'Hà Nội', 1277079411, 'hoangxuanbinh_t59@hus.edu.vn', 1828000, '2017-12-08 09:35:29', 1, 1),
(29, '118.70.184.228', NULL, 'Hoàng Bình', 'Hà Nội', 1277079411, 'hoangxuanbinh_t59@hus.edu.vn', 970000, '2017-12-08 09:37:53', 1, 1),
(30, '118.70.184.228', NULL, 'Hoàng Bình', 'Hà Nội', 1277079411, 'hoangxuanbinh_t59@hus.edu.vn', 970000, '2017-12-08 09:39:01', 1, 1),
(31, '118.70.184.228', NULL, 'Hoàng Bình', 'Hà Nội', 1277079411, 'hoangxuanbinh_t59@hus.edu.vn', 970000, '2017-12-08 09:39:48', 1, 1),
(32, '14', NULL, 'Loan', 'Hưng Yên', 1111111111, 'loan@gmail.com', 100000, '2017-12-08 11:48:11', 0, 1),
(33, '14', NULL, 'Loan', 'Hưng Yên', 1111111111, 'loan@gmail.com', 1170000, '2017-12-08 11:54:19', 0, 1),
(34, '5', NULL, 'admin', 'Nam Định', 1697444444, 'flatshop2017@gmail.com', 100000, '2017-12-08 12:50:41', 0, 1),
(35, '118.70.184.228', NULL, 'Hoàng Bình', 'Hà Nội', 1277079411, 'hoangxuanbinh_t59@hus.edu.vn', 220000, '2017-12-08 13:53:48', 0, 1),
(36, '118.70.184.228', NULL, 'Hoàng Bình', 'Hà Nội', 1277079411, 'hoangbinhnt1996@gmail.com', 550000, '2017-12-13 09:06:02', 0, 1),
(37, '12', NULL, 'Bình', 'Hà Nội', 1277079411, 'hoangbinhnt1996@gmail.com', 720000, '2017-12-13 09:31:18', 0, 1),
(38, '118.70.184.228', NULL, 'Hoàng Bình', 'Hà Nội', 1277079411, '', 908000, '2017-12-13 09:31:45', 0, 1);

-- --------------------------------------------------------

--
-- Table structure for table `category_detail`
--

CREATE TABLE `category_detail` (
  `categoryID` int(20) NOT NULL,
  `name` varchar(50) COLLATE utf8mb4_vietnamese_ci NOT NULL,
  `name_tv` varchar(20) COLLATE utf8mb4_vietnamese_ci NOT NULL,
  `url` varchar(50) COLLATE utf8mb4_vietnamese_ci NOT NULL,
  `parentID` int(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_vietnamese_ci;

--
-- Dumping data for table `category_detail`
--

INSERT INTO `category_detail` (`categoryID`, `name`, `name_tv`, `url`, `parentID`) VALUES
(1, 'Men', 'Nam', 'nam', 1),
(2, 'Women', 'Nữ', 'nu', 2),
(3, 'Kids', 'Trẻ em', 'tre-em', 3),
(4, 'Watch', 'Đồng hồ', 'dong-ho', 4),
(5, 'Jewelry', 'Phụ kiện', 'trang-suc', 5);

-- --------------------------------------------------------

--
-- Table structure for table `order_detail`
--

CREATE TABLE `order_detail` (
  `orderID` int(20) NOT NULL,
  `bill_ID` int(20) NOT NULL DEFAULT '0',
  `userID` varchar(20) COLLATE utf8mb4_vietnamese_ci DEFAULT NULL,
  `productID` int(20) NOT NULL,
  `dateofbirth` datetime NOT NULL,
  `dateofend` datetime NOT NULL,
  `amount` int(20) NOT NULL,
  `isActive` int(1) NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_vietnamese_ci;

--
-- Dumping data for table `order_detail`
--

INSERT INTO `order_detail` (`orderID`, `bill_ID`, `userID`, `productID`, `dateofbirth`, `dateofend`, `amount`, `isActive`) VALUES
(61, 19, '12', 23, '2017-12-07 14:09:38', '2017-12-07 14:09:38', 1, 1),
(62, 19, '12', 22, '2017-12-07 14:09:39', '2017-12-07 14:09:39', 1, 1),
(63, 0, '13', 23, '2017-12-07 15:08:42', '2017-12-07 15:08:42', 1, 1),
(64, 20, '13', 23, '2017-12-07 15:09:09', '2017-12-07 15:09:09', 1, 1),
(65, 20, '13', 22, '2017-12-07 15:09:10', '2017-12-07 15:09:10', 1, 1),
(66, 0, '118.70.184.228', 21, '2017-12-07 15:09:41', '2017-12-07 15:09:41', 1, 1),
(67, 0, '118.70.184.228', 23, '2017-12-07 15:09:43', '2017-12-07 15:09:43', 1, 1),
(68, 25, '12', 23, '2017-12-08 09:22:57', '2017-12-08 09:22:57', 1, 1),
(69, 25, '12', 22, '2017-12-08 09:22:58', '2017-12-08 09:22:58', 1, 1),
(70, 27, '14', 21, '2017-12-08 09:32:21', '2017-12-08 09:32:21', 1, 1),
(71, 28, '118.70.184.228', 19, '2017-12-08 09:35:12', '2017-12-08 09:35:12', 1, 1),
(72, 28, '118.70.184.228', 18, '2017-12-08 09:35:13', '2017-12-08 09:35:13', 1, 1),
(73, 28, '118.70.184.228', 17, '2017-12-08 09:35:15', '2017-12-08 09:35:15', 1, 1),
(74, 31, '118.70.184.228', 22, '2017-12-08 09:37:33', '2017-12-08 09:37:33', 1, 1),
(75, 31, '118.70.184.228', 1, '2017-12-08 09:37:39', '2017-12-08 09:37:39', 1, 1),
(76, 31, '118.70.184.228', 2, '2017-12-08 09:37:40', '2017-12-08 09:37:40', 1, 1),
(77, 0, '5', 23, '2017-12-08 09:49:18', '2017-12-08 09:49:18', 1, 0),
(78, 0, '14', 23, '2017-12-08 11:40:06', '2017-12-08 11:40:06', 1, 1),
(79, 32, '14', 23, '2017-12-08 11:46:47', '2017-12-08 11:46:47', 1, 1),
(80, 33, '14', 22, '2017-12-08 11:54:10', '2017-12-08 11:54:10', 1, 1),
(81, 33, '14', 20, '2017-12-08 11:54:11', '2017-12-08 11:54:11', 1, 1),
(82, 34, '5', 23, '2017-12-08 12:50:09', '2017-12-08 12:50:09', 1, 1),
(83, 35, '118.70.184.228', 10, '2017-12-08 13:53:30', '2017-12-08 13:53:30', 1, 1),
(84, 35, '118.70.184.228', 11, '2017-12-08 13:53:32', '2017-12-08 13:53:32', 1, 1),
(85, 0, '118.70.184.228', 1, '2017-12-08 16:38:29', '2017-12-08 16:38:29', 1, 1),
(86, 0, '118.70.184.228', 2, '2017-12-08 16:38:33', '2017-12-08 16:38:33', 1, 1),
(87, 0, '12', 23, '2017-12-08 17:03:18', '2017-12-08 17:03:18', 1, 1),
(88, 0, '5', 23, '2017-12-08 20:58:48', '2017-12-08 20:58:48', 1, 1),
(89, 0, '5', 1, '2017-12-08 21:02:44', '2017-12-08 21:02:44', 1, 1),
(90, 0, '118.70.184.228', 23, '2017-12-13 08:58:37', '2017-12-13 08:58:37', 1, 1),
(91, 36, '118.70.184.228', 22, '2017-12-13 08:58:38', '2017-12-13 08:58:38', 1, 1),
(92, 36, '118.70.184.228', 23, '2017-12-13 08:58:51', '2017-12-13 08:58:51', 1, 1),
(93, 37, '12', 20, '2017-12-13 09:31:12', '2017-12-13 09:31:12', 1, 1),
(94, 38, '118.70.184.228', 19, '2017-12-13 09:31:36', '2017-12-13 09:31:36', 1, 1),
(95, 0, '12', 21, '2017-12-19 21:37:08', '2017-12-19 21:37:08', 1, 1),
(96, 0, '12', 18, '2017-12-19 21:38:20', '2017-12-19 21:38:20', 1, 1),
(97, 0, '12', 1, '2017-12-19 21:39:56', '2017-12-19 21:39:56', 1, 1),
(98, 0, '14.189.100.34', 29, '2017-12-20 14:52:05', '2017-12-20 14:52:05', 1, 1);

-- --------------------------------------------------------

--
-- Table structure for table `product_detail`
--

CREATE TABLE `product_detail` (
  `productID` int(20) NOT NULL,
  `productname` varchar(100) COLLATE utf8mb4_vietnamese_ci DEFAULT NULL,
  `desciption` text COLLATE utf8mb4_vietnamese_ci,
  `price` int(50) DEFAULT NULL,
  `saleprice` int(50) DEFAULT '0',
  `pictures` varchar(200) COLLATE utf8mb4_vietnamese_ci NOT NULL DEFAULT 'images/slider-image-01.png',
  `quantuminstock` int(50) DEFAULT NULL,
  `categoryID` int(20) NOT NULL,
  `ownerID` int(20) DEFAULT NULL,
  `dateofbirth` datetime NOT NULL,
  `dateofend` datetime NOT NULL,
  `isActive` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_vietnamese_ci;

--
-- Dumping data for table `product_detail`
--

INSERT INTO `product_detail` (`productID`, `productname`, `desciption`, `price`, `saleprice`, `pictures`, `quantuminstock`, `categoryID`, `ownerID`, `dateofbirth`, `dateofend`, `isActive`) VALUES
(1, 'Áo Khoác Nam Bomber Jacket Kaki', 'Chất liệu vải vẫn là kaki nhật ngoại nhập cao cấp, 2 lớp lót dù mềm mại, chắc chắn, thấm hút mồ hôi tốt tạo sự thoải mái khi mặc. Áo bomber có túi, dây kéo tiện dụng giúp đựng được những vật nhỏ cần thiết và sử dụng gam màu trung tính sẽ là lựa chọn hoàn hảo cho phong cách smart-casual – không ồn ào những vẫn rất nổi bật, đơn giản mà thời trang, trẻ trung mà lịch lãm.', 200000, 0, 'images/product/Men1.jpg', 20, 1, 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 1),
(2, 'Áo Khoác Dù 2 Lớp LADOS', 'Áo có thiết kế khóa kéo phía trước tiện dụng bạn có thể dễ dàng khi mặc. Tay áo và thân phối bo, cố định khi mặc, ngoài tác dụng bảo vệ bạn khỏi tác hại từ môi trường bên ngoài áo còn tăng thêm phần thanh lịch và giữ ấm cơ thể.\r\n\r\nForm dáng cổ điển bạn có thể dễ dàng kết hợp với nhiều trang phục khác nhau vô cùng tiện dụng và bắt mắt.\r\n\r\nÁo một mặt màu đen, mặt còn lại màu xám, phối cùng bo đen ấn tượng dễ dàng phối cùng với nhiều phong cách riêng của mình. Chất liệu vải dù bền, đẹp, thấm hút tốt, không hầm bí khi mặc.\r\n\r\nChất liệu dù 2 lớp tiện lợi cho chàng trong những ngày đông mưa phùn hay gió lạnh.Màu sắc trang nhã dễ dàng mix cùng các trang phục khác.Bạn có thể kết hợp cùng áo sơ mi, áo kiểu, quần kaki, jean các phụ kiện đi kèm để luôn được tự tin và nổi bật nhất.', 320000, 0, 'images/product/Men2.jpg\r\n', 10, 1, 2, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 1),
(3, 'ÁO KHOÁC NAM KAKI THÊU HAI LỚP', 'Thiết kế tinh tế với cổ bẻ, tay dài phối bo tay sành điệu, cá tính, form dáng khỏe khoắn cho bạn phong cách trẻ trung, chỉnh chu và không kém phần lịch lãm. Kiểu dáng thời trang, đường chỉ may tỉ mỉ, tinh tế. Màu sắc trang nhã dễ dàng mix cùng các trang phục khác như áo thun, áo sơ mi,... Người bạn đồng hành lý tưởng cho bạn phong cách hoàn hảo. Chất liệu: Kaki  Size M: 50 - 55kg, Size L:56 - 65kg ', 270000, 0, 'images/product/Men3.jpg', 30, 1, 3, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 1),
(4, 'Áo khoác jean nam nhập khẩu AKJN01 ZAVANS (Xanh) ', 'Áo khoác jean denim ZAVANS được may từ chất liệu vải jean cao cấp với độ dày vừa phải có thể giữ ấm trong những ngày trở lạnh nhưng vẫn đảm bảo sự thông thoáng khi mặc. Ngoài ra, áo còn được thiết kế trẻ trung mang đến vẻ ngoài mang phong cách mạnh mẽ, trẻ trung, năng động mà cũng đầy hiện đại cho các bạn nam.\r\nChất liệu vải: Jean denim dày dặn\r\nKiểu dáng tay dài, cổ bẻ\r\nThiết kế màu sắc cá tính\r\nHàng nhập khẩu cao cấp', 212000, 0, 'images/product/Men4.jpg', 20, 1, 2, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 1),
(5, 'Áo Khoác dù nam phối nón hàn quốc Pigofashion SAK23 (xanh đen)  ', 'Thiết kế tinh tế với cổ bẻ, tay dài phối nón sành điệu, cá tính, form dáng khỏe khoắn cho bạn phong cách trẻ trung, chỉnh chu và không kém phần lịch lãm.\r\nĐảm Bảo Ko Ra Màu , Ko Phai Màu Suốt Quá Trình Sữ Dụng \r\nChất liệu: vải kaki 100% . bên trong có lớp lót vải mỏng giúp thoáng khí mát mẽ.\r\nCông dụng: che gió, chống nắng, giữ ấm mùa thu đông\r\nKiểu dáng thời trang, đường chỉ may tỉ mỉ, tinh tế.\r\nMàu sắc trang nhã dễ dàng mix cùng các trang phục khác như áo thun, áo sơ mi,...\r\nNgười bạn đồng hành lý tưởng cho bạn phong cách hoàn hảo.\r\nChất liệu: Dù cán dày dặn + lớp lót vải dù thoáng mát bên trong, phối nón sau phong cách hàn quốc\r\nSize: M: 50 - 55kg, L:56 - 65kg , XL: 66 - 75kg', 194000, 0, 'images/product/Men5.jpg', 4, 1, 3, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 1),
(6, 'Áo Khoác Kaki Nam Phối Kéo Hàn Quốc QK15 - Kem ', 'Áo Khoác Kaki Nam Phối Kéo Hàn Quốc QK15 - Kem cực đẹp, tinh tế & đẳng cấp, phong cách, năng động. Áo Khoác kaki cao cấp chất liệu kaki mịn lót dù ngoại nhập, đẹp, kiểu dáng đẳng cấp, thoải mái và thời trang.\r\n\r\nSize : Xem bảng bên dưới \r\n\r\n♦ Đảm Bảo Ko Ra Màu , Ko Phai Màu Suốt Quá Trình Sữ Dụng \r\n\r\n♦ Áo Khoác Kaki Nam Phối Kéo Hàn Quốc QK15 - Kem Cao Cấp với thiết kế mạnh mẽ và nam tính, cho bạn sự thoải mái, khỏe khoắn khi kết hợp với nhiều loại trang phục khác nhau.\r\n\r\n♦ Áo Khoác Kaki Nam Phối Kéo Hàn Quốc QK15 - Kem làm bằng kaki tổng hợp  cao cấp 2 lớp . Tuyệt đối không ra màu, độ bền cao  và thời trang.\r\n\r\n♦ Dây khóa làm inox mạ đồng lịch lãm nam tính.', 400000, 0, 'images/product/Men6.jpg', 195, 1, 2, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 1),
(7, 'Áo Khoác Da Nam Đen Trơn Khóa Kéo Đồng Cao Cấp - D21  ', 'Chất liệu Da cao cấp nhập Thái , có túi bên trong áo \r\nĐảm Bảo Ko Hư Hỏng , Ko Bong Tróc Suốt Quá Trình Sữ Dụng  \r\nDây khóa kéo đồng được mạ crom trắng cao cấp giúp ko bị rỉ sét \r\nMặc Tự Tróc Alo Shop Hoàn Trả Lại \r\nĐường chỉ may chắc chắn , tinh tế \r\nDễ dàng phối cùng nhiều loại trang phục khác nhau \r\nXứng đáng Đồng Tiền của Quý Khách \r\nSize xem bảng bên phần chi tiết sản phẩm', 259000, 0, 'images/product/Men7.jpg', 10, 1, 4, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 1),
(8, 'Áo khoác da lót lông cao cấp LADOS-01 (Đen)  ', 'Thiết kế thời trang\r\nSản phẩm chất lượng\r\nĐường may sắc sảo tinh tế\r\nDể dàng phối trang phục\r\nLót lông cực ấm\r\nDa siêu bền, không bong, tróc, nổ', 400000, 0, 'images/product/Men8.jpg', 20, 1, 3, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 1),
(9, 'Áo khoác jean nam nhập khẩu AKJN04 ZAVANS (Xanh bò)', 'Chất liệu vải: Jean denim dày dặn\r\nKiểu dáng tay dài, cổ bẻ\r\nThiết kế màu sắc cá tính\r\nHàng nhập khẩu cao cấp', 276000, 0, 'images/product/Men9.jpg', 30, 1, 2, '2017-12-11 20:34:07', '2017-12-11 20:34:07', 1),
(10, 'Áo thun tay lỡ Hàn Quốc có mũ form rộng ( ĐEN) SỐ 6  ', 'Thun cotton 4 chiều dày, mịn\r\nThiết kế trẻ trung năng động\r\nFreesize dành cho các bạn ~ 50kg\r\nTay lửng 3/4\r\nCó nón liền cổ phong cách thời trang', 100000, 0, 'images/product/Women1.jpg\r\n', 20, 2, 6, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 1),
(11, 'Áo Thun Nữ Cánh Dơi Sodoha ATV106216TX (Trắng xanh)  ', 'Mã sản phẩm: ATV106216TX\r\nMàu sắc: Trắng xanh, hồng xám\r\nSize: M, L, XL\r\nChất liệu: Polyester\r\nTay áo: tay áo ngắn', 120000, 0, 'images/product/Women2.jpg', 14, 2, 5, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 1),
(12, 'Áo cardigan (Vàng)  ', 'Chất liệu len mềm mịn, dày dặn và đứng dáng.\r\nChất liệu len cao cấp, thấm mồ hôi giúp người mặc luôn cảm thấy dễ chịu, mềm mại và êm ái.\r\nKiểu dáng đơn giản, trang nhã đem tới cho bạn nữ nét cá tính và hiện đại của người phụ nữ Á ', 290000, 0, 'images/product/Women3.jpg', 20, 2, 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 1),
(13, 'Áo Khoác Len Cardigans Thu Đông Hàn Quốc (Trắng)  ', 'Áo len cadigans luôn là lựa chọn tinh tế của các bạn nữ khi thời tiết se se lạnh.\r\nChất len mềm mại, không bai nhão\r\nMàu sắc cơ bản dễ kết hợp Có thể kết hợp cùng chân váy, quần jean, sooc  ', 250000, 0, 'images/product/Women4.jpg', 10, 2, 3, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 1),
(14, 'MŨ LEN NỒI ĐỘI ĐẦU CHO BÉ SIÊU XINH DỄ THƯƠNG ( HỒNG NHẠT )  ', 'Chất liệu len mềm mại\r\nMàu sắc tươi sáng\r\nĐược thiết kế 2 lớp dày dặn\r\nẤm áp cho bé yêu bé từ 2 đến 4 tuổi', 106000, 0, 'images/product/Kids1.jpg', 20, 3, 5, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 1),
(15, 'Bộ quần áo thu đông hình hoa cúc dễ thương cho bé từ 9-25kg (Hồng)  \r\n', 'Chất liệu: Nỉ da cá dày mịn\r\nCho bé gái từ 8-27kg\r\nChất liệu thoáng, thấm hút mồ hôi\r\nSử dụng mùa thu đông, trong thời tiết se lạnh và lạnh\r\nCho bé đi học, đi chơi, ở nhà, đi ngủ', 155000, 0, 'images/product/Kids2.jpg', 10, 3, 4, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 1),
(16, 'Bộ 2 quần Jean bò chun đáng yêu cho bé màu như hình  \r\n', '\r\nDễ kêt hợp vớ quần áo Co giãn 4 chiều  mang lại cho bé cảm giác thoải mái khi hoạt động', 289000, 0, 'images/product/Kids3.jpg', 20, 3, 2, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 1),
(17, 'Xả hàng:Combo 02 áo dài tay thu đông hàng xuất khẩu bé trai cao cấp', 'Thiết kế dài tay, cổ 3 phân giúp giữ ấm cho bé.\r\nChất liệu với 100% cotton len, mềm mại, thấm mồ hôi\r\nTỉ mỉ trên từng đường may cho bé\r\nSản phẩm giao màu ngẫu nhiên', 120000, 50, 'images/product/Kids4.jpg', 25, 3, 1, '2017-12-11 20:33:02', '2017-12-11 20:33:02', 1),
(18, 'Đồng hồ cơ Tevise 1000 dây đúc lộ máy (Đen)  ', 'Tevies chính hãng công nghệ Thụy Sỹ\r\nĐường kính 43mm, dày 15mm\r\nMặt kính cường lực chống trấy xước\r\nDây inox đặc không gỉ, thâu cắt được', 800000, 0, 'images/product/Watch1.jpg', 30, 4, 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 1),
(19, 'Đồng hồ nam dây da Casio Anh Khuê MTP-1183Q-7ADF  \r\n', 'Thương hiệu: Casio Nhật Bản\r\nChính hãng: Casio Anh Khuê\r\nBảo hành: 1 năm về máy\r\nĐầy đủ phụ kiện chính hãng\r\nTem chống hàng giả AK\r\nHộp và thẻ chính hãng Anh Khuê\r\nĐặc biệt: miễn phí thay pin trọn đời tại shop Phố Đồng Hồ', 908000, 0, 'images/product/Watch2.jpg', 19, 4, 2, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 1),
(20, 'ĐỒNG HỒ SEIKO CHỐNG NƯỚC NAM, NỮ', 'Chất liệu cao cấp\r\nĐộ bền cao\r\nAn toàn khi sử dụng', 720000, 0, 'images/product/Watch3.jpg', 30, 4, 3, '2017-12-11 20:29:51', '2017-12-11 20:29:51', 1),
(21, 'Đồng hồ nữ dây thép không gỉ Seiko Lord SUR802P1 (Vàng)  ', 'Dây thép không gỉ\r\nDành cho nữ\r\nThiết kế tinh tế; phù hợp nhiều phong cách', 7640000, 0, 'images/product/Watch4.jpg', 10, 4, 5, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0),
(22, 'Bộ Trang Sức Nữ Mạ 24K-01', '-Chất liệu hợp titan inox KHÔNG ĐEN - KHÔNG RỈ SÉT \r\n-Sản phẩm được sản xuất theo công nghệ mới tiên tiến nhất của Hàn Quốc\r\n-Được Xi mạ 4 lớp màu trong môi trường chân không\r\n-Lớp ngoài cùng được xi một lớp bảo vệ chống dị ứng, ngứa (ngoại trừ một số trường hợp đặc biệt như mồ hôi muối có tính acid quá cao)\r\n-Sản phẩm cao cấp bán chạy của UHA jewels & accessories\r\n-Tặng kèm hộp Sang Trọng khi mua sản phẩm hộp có chất hút ẩm để bảo vệ sản phẩm', 450000, 0, 'images/product/Jewelry1.jpg', 20, 5, 1, '2017-12-08 11:17:39', '2017-12-08 11:17:39', 1),
(23, 'Hoa tai thời trang dáng dài hoa lụa BT7286', 'Kiểu dáng thời trang, dễ kết hợp với nhiều loại trang phục\r\nChất liệu: Hợp kim, vải lụa\r\nKích thước: dài 13 cm\r\nMàu sắc: Đỏ và Hồng\r\nKhối lượng: 10g', 100000, 0, 'images/product/Jewelry2.jpg', 15, 5, 1, '2017-12-11 20:33:58', '2017-12-11 20:33:58', 1),
(25, 'Áo khoác len tay thêu hoa cao cấp BEYEU1688 - BY6194 ( ĐEN )', 'Áo khoác len tay thêu hoa cao cấp BEYEU1688  - BY6194 ( ĐEN )\\r\\n\\r\\nÁo khoác len tay thêu hoa cao cấp: Shop chuyên cung cấp thời trang nữ giá sỉ, áo sơ mi , đầm suông, đầm công sở, đầm body, đầm xòe... Với nhiều mẫu mã mới. Shop luôn cập nhật nhiều loại thời trang nữ cho các bạn lựa chọn.', 410000, 10, 'images/Women5.jpg', 4, 2, 2, '2017-12-18 18:33:05', '2017-12-18 18:33:05', 1),
(26, 'Set áo yếm + chân váy ôm Misa Fashion MS282 / Đỏ', 'Chất liệu : Chân váy cotton lụa co giãn tốt – áo voan / lụa - Màu sắc : Chân váy đen – áo hoa nền đen, chân váy đỏ - áo hoa nền trắng - Hàng do Misa Fashion sản xuất với form dáng chuẩn, đường may kỹ, đẹp. - Phong cách trẻ trung, quyến rũ', 300000, 0, 'images/Women6.jpg', 20, 2, 2, '2017-12-18 18:39:10', '2017-12-18 18:39:10', 1),
(27, 'Áo len nữ cổ tròn tay dài Rozalo RW5204P-Hồng', 'Màu : Xanh ,Hồng Size : On size Kiếu áo : Áo len dài tay cổ tròn', 325000, 0, 'images/Women7.jpg', 14, 2, 1, '2017-12-18 18:40:42', '2017-12-18 18:40:42', 1),
(28, 'Áo Khoác Cực Đẹp AK002 Shop Mây (Ca Rô Đỏ)', 'Size: Free Size, dành cho các bạn từ 46kg~56kg\\r\\nChất liệu nỉ cao cấp, thời trang kiểu Korea\\r\\nDễ dàng phối trang phục.', 460000, 0, 'images/Women8.jpg', 10, 2, 2, '2017-12-18 18:42:13', '2017-12-18 18:42:13', 1),
(29, 'Aó ren công sỡ tay lỡ thời trang', 'Thiết kế đầy trẻ trung và quyến rũ\\r\\nnhẹ nhàng dễ thương cho bạn gái luôn được thu hút và tỏa sáng\\r\\nMàu đen, chất liệu ren cao cấp\\r\\n;dễ dàng kết hợp cùng rất nhiều item thời trang khác', 210000, 0, 'images/Women9.jpg', 20, 2, 1, '2017-12-18 18:51:20', '2017-12-18 18:51:20', 1),
(30, 'Đầm jean xếp ly eo thời trang BeYeu1688 BY3070', 'Thiết kế thời trang thanh lịch\\r\\nĐường may tinh tế\\r\\nDễ dàng phối cùng phụ kiện khác\\r\\nChất liệu cao cấp', 238000, 0, 'images/Women10.jpg', 15, 2, 1, '2017-12-18 18:53:52', '2017-12-18 18:53:52', 1),
(31, 'Bộ 3 áo thun bé trai sành điệu thương hiệu cao cấp TAMOD', 'Bộ 3 áo thun bé trai sành điệu thương hiệu cao cấp TAMOD. Chất liệu cotton co dãn 4 chiều mềm và mịn, rất phù hợp cho những ngày Hè đầy năng động. Vải mềm, mịn và thoáng mát. Mực in cao cấp không bong chóc khi giặt. Phù hợp cho mặc ở nhà hay đi chơi cùng gia đình và bạn bè', 220000, 0, 'images/Kids5.jpg', 30, 3, 1, '2017-12-18 18:56:02', '2017-12-18 18:56:02', 1),
(32, 'Quần dài thun da cá in chữ - màu xám tiêu - QT116', 'size 1: kích thước trẻ  8kg\r\nsize 2: kích thước trẻ 10kg \r\nsize 3: là kích thước  trẻ 12kg\r\nsize 4: kích thước tẻ 14kg\r\nsize 5: là kích thước 15kg \r\nsize 6: là kích thước trẻ 17kg\r\nChất liệu cao cấp\\r\\nKiểu dáng thời trang.Đường may chi tiết.Độ bền cao', 75000, 0, 'images/Kids6.jpg', 20, 3, 2, '2017-12-18 19:01:44', '2017-12-18 19:01:44', 1),
(33, 'Bộ nỉ dài tay cho bé trai 6 tuổi đến 10 tuổi', 'Chất thun da cá dày dặn, co giãn tốt\\r\\nSize to cho bé từ 20kg trở lên', 115000, 0, 'images/Kids7.jpg', 30, 3, 1, '2017-12-18 19:10:11', '2017-12-18 19:10:11', 1),
(34, '́Áo dài cách tân bé gái màu đỏ', 'Cho bé mặc đi chơi lễ, tết, cưới hỏi…Chất liệu gấm cao cấp phối chân váy ren hoặc có thể kết hợp với quần riêng.Kiểu dáng mới lạ hiện đại.Có 3 màu đỏ, hồng, vàng', 255000, 0, 'images/Kids9.jpg', 27, 3, 3, '2017-12-18 19:15:39', '2017-12-18 19:15:39', 1),
(35, 'Đồng hồ nam dây da Yazole 318 (Đen)', 'Dây da mềm, bền, sang trọng\\r\\nĐường kính mặt: 40mm.Chiều dày: 10 mm', 300000, 0, 'images/Watch5.jpg', 12, 4, 1, '2017-12-18 19:20:55', '2017-12-18 19:20:55', 1),
(36, 'Đồng hồ dây da nam chống nước Yazole 358 (đen mặt đen)', 'Kiểu máy Quartz\r\n• Chất liệu hợp kim loại chống gỉ\r\n• Thiết kế nam tính\r\n• Độ chịu nước 3ATM\r\n• Mặt kính cứng pha khoáng\r\n• Không số; có lịch\r\n• Vành đồng hồ trơn\r\n• Sản xuất tại Đài Loan', 500000, 0, 'images/Watch6.jpg', 24, 4, 1, '2017-12-18 19:27:47', '2017-12-18 19:27:47', 1),
(37, 'Đồng hồ dây da nam chống nước Yazole 358 (nâu mặt đen)', 'Kiểu máy Quartz\r\n• Chất liệu hợp kim loại chống gỉ\r\n• Thiết kế nam tính\r\n• Độ chịu nước 3ATM\r\n• Mặt kính cứng pha khoáng\r\n• Không số; có lịch\r\n• Vành đồng hồ trơn\r\n• Sản xuất tại Đài Loan', 300000, 0, 'images/Watch7.jpg', 13, 4, 1, '2017-12-18 19:31:13', '2017-12-18 19:31:13', 1),
(38, 'Đồng hồ nữ dây da Guou 1512 (Hồng)', 'Chất liệu cao cấp. Thiết kế sang trọng, đẹp mắt. Bền, đẹp', 469000, 0, 'images/Watch8.jpg', 41, 4, 1, '2017-12-18 19:34:03', '2017-12-18 19:34:03', 1),
(39, 'Đồng hồ nữ đính đá thời trang BS FA0280B - Bạc', 'Thương hiệu: BEE SISTER\r\nKiểu dáng: đính đá, nhẹ nhàng, sang trọng\r\nNăng lượng: Pin \r\nKhả năng chống nước 3ATM(30M) \r\nChất liệu mặt đồng hồ: kính cứng pha khoáng tăng cường độ cứng, và chống trầy xước tốt.\r\nVỏ đồng hồ được làm từ hợp kim chất lượng cao\r\nDây đồng hồ làm từ thép không gỉ\r\nKích thước mặt: 32mm, độ dày: 10mm\r\nKích thước dây đồng hồ: Rộng 1.4mm, Dài 23cm (Có thể thâu cắt cho vừa tay)', 500000, 0, 'images/Watch9.jpg', 20, 4, 1, '2017-12-18 19:37:43', '2017-12-18 19:37:43', 1),
(40, 'Đồng hồ nữ thương hiệu GUOU mặt đính đá 3 kim dây thép thời trang', 'Loại máy: Quartz (máy Nhật), 3 kim\r\n✅ Chất liệu vỏ: Thép không gỉ\r\n✅ Dây đeo: Thép không gỉ, kích thước 16 x 200mm\r\n✅ Chất liệu mặt trước: Mineral - Kính cứng\r\n✅ Đường kính mặt : 32 mm, dày 8mm\r\n✅ Độ chịu nước: 3ATM (mức rửa tay, đi mưa nhẹ, rửa mặt)\r\n✅ Thiết kế tinh tế, kiểu dáng sang trọng\r\n✅ Dễ dàng phối đồ, trang phục', 800000, 0, 'images/Watch10.jpg', 30, 4, 1, '2017-12-18 19:40:00', '2017-12-18 19:40:00', 1),
(41, 'Kính mát SN-POLICE S8880k 0579 (Bạc)', 'Gọng làm bằng vật liệu cao cấp\r\nTròng pulycarbonat có khả năng\r\nChống tia cực tím; tia bức xạ; chống UV400\r\nThiết kế thời trang trẻ trung; thanh lịch và sành điệu', 3700000, 0, 'images/Jewelry5.jpg', 30, 5, 1, '2017-12-18 19:42:02', '2017-12-18 19:42:02', 1),
(42, 'Kính mát unisex RAYBAN-3025-001/51(62IT) (Vàng)', 'Giới tính: Unisex\r\nChất liệu mắt: Thủy tinh\r\nChất liệu gọng: Metal\r\nMàu mắt: Nâu Sáng /Gradient\r\nMàu gọng: Vàng\r\nLọc UV400: Có', 5000000, 0, 'images/Jewelry6.jpg', 40, 5, 1, '2017-12-18 19:44:08', '2017-12-18 19:44:08', 1),
(43, 'Kính mát Rayban 4259F-601/71(53IT) (Xanh đen)', 'Nguồn gốc: Italia\r\nChất liệu mắt: Plastic\r\nChất liệu gọng: Plasti\r\nMàu mắt: Xanh Green\r\nMàu Gọng: Đen\r\nLọc UV400: Có\r\nTemple Length: 150', 4750000, 0, 'images/Jewelry7.jpg', 24, 5, 1, '2017-12-18 19:46:25', '2017-12-18 19:46:25', 1),
(44, 'Kính Tây Nam-Nữ Thời Trang (Đen)', 'Gọng kính làm bằng nhựa cao cấp\r\nSiêu nhẹ; siêu bền\r\nKiểu dáng thời trang hiện đại\r\nÔm sát khuôn mặt', 250000, 0, 'images/Jewelry8.jpg', 32, 5, 1, '2017-12-18 19:48:20', '2017-12-18 19:48:20', 1),
(45, 'Kính Mát SEXY LOVE TRáng Gương ( BẠC )', 'Gọng được làm bằng hợp kim chịu lực\r\nTròng kính phân cực Polarized chống lóa\r\nGọng kính kiểu dáng thời trang', 50000, 0, 'images/Jewelry9.jpg', 41, 5, 1, '2017-12-18 19:49:54', '2017-12-18 19:49:54', 1),
(46, 'Kính mắt nữ ZAVANS KM03 (Đen)', 'Gọng kính làm bằng nhựa cao cấp\r\nSiêu nhẹ; siêu bền\r\nKiểu dáng thời trang hiện đại\r\nÔm sát khuôn mặt', 100000, 0, 'images/Jewelry10.jpg.jpg', 15, 5, 1, '2017-12-18 19:51:31', '2017-12-18 19:51:31', 1);

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `userID` int(20) NOT NULL,
  `username` varchar(50) CHARACTER SET latin1 NOT NULL,
  `password` varchar(200) CHARACTER SET latin1 NOT NULL,
  `email` varchar(100) CHARACTER SET latin1 NOT NULL,
  `address` varchar(50) COLLATE utf8mb4_vietnamese_ci NOT NULL,
  `firstname` varchar(20) CHARACTER SET utf16 COLLATE utf16_vietnamese_ci NOT NULL,
  `lastname` varchar(20) CHARACTER SET utf16 COLLATE utf16_vietnamese_ci NOT NULL,
  `telephone` int(11) NOT NULL,
  `mediaID` varchar(200) COLLATE utf8mb4_vietnamese_ci NOT NULL DEFAULT 'images/avatar/Defaul.png',
  `gender` int(1) NOT NULL,
  `dateofbirth` varchar(20) COLLATE utf8mb4_vietnamese_ci DEFAULT NULL,
  `typeofuser` int(1) NOT NULL DEFAULT '4',
  `dateofcreate` datetime NOT NULL,
  `remember_token` varchar(200) COLLATE utf8mb4_vietnamese_ci DEFAULT NULL,
  `isActive` int(1) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_vietnamese_ci;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`userID`, `username`, `password`, `email`, `address`, `firstname`, `lastname`, `telephone`, `mediaID`, `gender`, `dateofbirth`, `typeofuser`, `dateofcreate`, `remember_token`, `isActive`) VALUES
(5, 'admin', '$2y$10$Uht67Pofr0Y97oOavIEHZ.wiWotQ53JToZEHOcA.gf8sA.B9/IqYK', 'flatshop2017@gmail.com', 'Nam Định', 'admin', 'admin', 1697444444, 'images/avatar/anh1.png', 0, '2017-12-04', 1, '2017-12-07 10:30:07', 'YaN7qtwzVEvvgs4AJcI3khEXDQd0ZXtXlxNG7yClugb6gpnJ11Fx0oc9LSM8', 1),
(12, 'binh', '$2y$10$TPdj06asWyDONALp/9NZlOlhW2uc4qQTSsUEeZPzjhmk.BDBE1i.K', 'hoangbinhnt1996@gmail.com', 'Hà Nội', 'Hoàng', 'Bình', 1277079411, 'images/avatar/Defaul.png', 1, '1996-10-31', 2, '2017-12-08 17:02:30', 'XaYwvgXiT09AGRED9NHyRUPQsyX8M41bAoPJWim75btB4rv5tku7Jw2uPgyX', 1),
(13, 'ninh', '$2y$10$o3DHM7lj/haZhnpIAJzGfu2nH7UbZfGk./gAcZrMsRPGzwkJg6qPK', 'ngninh96@gmail.com', 'Bắc Giang', 'Nguyễn', 'Ninh', 123456789, 'images/avatar/Defaul.png', 0, NULL, 3, '2017-12-08 20:37:52', 'OTyD9faOqxV6BVwyeH2VjfKRtJ8J2xIC0TggMEiS069W0yMXElyTF1uLsjc2', 1),
(14, 'loan', '$2y$10$cxCizxTbFSo7S2N2jugrf.KMh6Wq.mv.3M0kPI4qul2aViahji0NS', 'loan@gmail.com', 'Hưng Yên', 'Nguyễn', 'Loan', 1111111111, 'images/avatar/Defaul.png', 0, NULL, 4, '2017-12-11 18:21:20', '7mDjjAOJoLc6Khqbc3BWmNrUc7jRWmMHeLnEVxWaMATu9I1fFO5iWW8njAun', 1),
(15, 'thoa', '$2y$10$vuv1yUoCyBAKB1miyoVE8OmVXH9y19ssWnPiVgs5.uM8f/INRLqBO', 'thoa@gmail.com', 'Nam Định', 'Nguyễn', 'Thoa', 222222222, 'images/avatar/Defaul.png', 0, NULL, 4, '2017-12-04 16:02:19', 'mPjHkkDhueTXnpYiZfn3pu3F1bj3dbO5OOvArnDd3LJihNGpTzDoXjZ4IZ9O', 1);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `bill_detail`
--
ALTER TABLE `bill_detail`
  ADD PRIMARY KEY (`bill_ID`);

--
-- Indexes for table `category_detail`
--
ALTER TABLE `category_detail`
  ADD PRIMARY KEY (`categoryID`);

--
-- Indexes for table `order_detail`
--
ALTER TABLE `order_detail`
  ADD PRIMARY KEY (`orderID`);

--
-- Indexes for table `product_detail`
--
ALTER TABLE `product_detail`
  ADD PRIMARY KEY (`productID`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`userID`),
  ADD UNIQUE KEY `email` (`email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `bill_detail`
--
ALTER TABLE `bill_detail`
  MODIFY `bill_ID` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=39;
--
-- AUTO_INCREMENT for table `category_detail`
--
ALTER TABLE `category_detail`
  MODIFY `categoryID` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT for table `order_detail`
--
ALTER TABLE `order_detail`
  MODIFY `orderID` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=99;
--
-- AUTO_INCREMENT for table `product_detail`
--
ALTER TABLE `product_detail`
  MODIFY `productID` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=47;
--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `userID` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

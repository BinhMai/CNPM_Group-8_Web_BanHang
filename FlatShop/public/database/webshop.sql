-- phpMyAdmin SQL Dump
-- version 4.7.2
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Dec 08, 2017 at 06:00 AM
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
  `bill_ID` int(20) NOT NULL,
  `userID` varchar(20) COLLATE utf8mb4_vietnamese_ci DEFAULT NULL,
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

INSERT INTO `bill_detail` (`bill_ID`, `userID`, `name`, `adress`, `telephone`, `email`, `price`, `dateofbirth`, `status`, `isActive`) VALUES
(20, '13', 'Ninh', 'Bắc Giang', 123456789, 'ngninh96@gmail.com', 550000, '2017-12-07 15:09:19', 2, 1),
(22, '12', 'Bình', 'Hà Nội', 1277079411, 'hoangbinhnt1996@gmail.com', 550000, '2017-12-08 09:23:05', 0, 1),
(23, '12', 'Bình', 'Hà Nội', 1277079411, 'hoangbinhnt1996@gmail.com', 550000, '2017-12-08 09:25:30', 0, 1),
(24, '12', 'Bình', 'Hà Nội', 1277079411, 'hoangbinhnt1996@gmail.com', 550000, '2017-12-08 09:26:34', 0, 1),
(25, '12', 'Bình', 'Hà Nội', 1277079411, 'hoangbinhnt1996@gmail.com', 550000, '2017-12-08 09:28:26', 0, 1),
(26, '14', 'Loan', 'Hưng Yên', 1111111111, 'loan@gmail.com', 7640000, '2017-12-08 09:32:26', 0, 1),
(27, '14', 'Loan', 'Hưng Yên', 1111111111, 'loan@gmail.com', 7640000, '2017-12-08 09:33:13', 0, 1),
(28, '118.70.184.228', 'Hoàng Bình', 'Hà Nội', 1277079411, 'hoangxuanbinh_t59@hus.edu.vn', 1828000, '2017-12-08 09:35:29', 1, 1),
(29, '118.70.184.228', 'Hoàng Bình', 'Hà Nội', 1277079411, 'hoangxuanbinh_t59@hus.edu.vn', 970000, '2017-12-08 09:37:53', 1, 1),
(30, '118.70.184.228', 'Hoàng Bình', 'Hà Nội', 1277079411, 'hoangxuanbinh_t59@hus.edu.vn', 970000, '2017-12-08 09:39:01', 1, 1),
(31, '118.70.184.228', 'Hoàng Bình', 'Hà Nội', 1277079411, 'hoangxuanbinh_t59@hus.edu.vn', 970000, '2017-12-08 09:39:48', 1, 1),
(32, '14', 'Loan', 'Hưng Yên', 1111111111, 'loan@gmail.com', 100000, '2017-12-08 11:48:11', 0, 1),
(33, '14', 'Loan', 'Hưng Yên', 1111111111, 'loan@gmail.com', 1170000, '2017-12-08 11:54:19', 0, 1),
(34, '5', 'admin', 'Nam Định', 1697444444, 'flatshop2017@gmail.com', 100000, '2017-12-08 12:50:41', 0, 1);

-- --------------------------------------------------------

--
-- Table structure for table `category_detail`
--

CREATE TABLE `category_detail` (
  `categoryID` int(20) NOT NULL,
  `name` varchar(50) COLLATE utf8mb4_vietnamese_ci NOT NULL,
  `url` varchar(50) COLLATE utf8mb4_vietnamese_ci NOT NULL,
  `parentID` int(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_vietnamese_ci;

--
-- Dumping data for table `category_detail`
--

INSERT INTO `category_detail` (`categoryID`, `name`, `url`, `parentID`) VALUES
(1, 'Men', '', 1),
(2, 'Women', '', 2),
(3, 'Kids', '', 3),
(4, 'Watch', '', 4),
(5, 'Jewelry', '', 5);

-- --------------------------------------------------------

--
-- Table structure for table `comment`
--

CREATE TABLE `comment` (
  `commentID` int(20) NOT NULL,
  `userID` int(20) NOT NULL,
  `productID` int(20) NOT NULL,
  `content` text COLLATE utf8mb4_vietnamese_ci NOT NULL,
  `rate` int(1) DEFAULT NULL,
  `dateofbirth` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_vietnamese_ci;

-- --------------------------------------------------------

--
-- Table structure for table `media_detail`
--

CREATE TABLE `media_detail` (
  `mediaID` int(20) NOT NULL,
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
(82, 34, '5', 23, '2017-12-08 12:50:09', '2017-12-08 12:50:09', 1, 1);

-- --------------------------------------------------------

--
-- Table structure for table `order_product_reference`
--

CREATE TABLE `order_product_reference` (
  `opID` int(40) NOT NULL,
  `orderID` int(20) NOT NULL,
  `productID` int(20) NOT NULL,
  `quantum` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_vietnamese_ci;

-- --------------------------------------------------------

--
-- Table structure for table `product_category_reference`
--

CREATE TABLE `product_category_reference` (
  `id` int(40) NOT NULL,
  `productID` int(20) NOT NULL,
  `categoryID` int(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_vietnamese_ci;

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
  `ownerID` int(20) NOT NULL,
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
(9, 'Áo khoác jean nam nhập khẩu AKJN04 ZAVANS (Xanh bò)  ', 'Chất liệu vải: Jean denim dày dặn\r\nKiểu dáng tay dài, cổ bẻ\r\nThiết kế màu sắc cá tính\r\nHàng nhập khẩu cao cấp', 276000, 0, 'images/product/Men9.jpg', 30, 1, 5, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 1),
(10, 'Áo thun tay lỡ Hàn Quốc có mũ form rộng ( ĐEN) SỐ 6  ', 'Thun cotton 4 chiều dày, mịn\r\nThiết kế trẻ trung năng động\r\nFreesize dành cho các bạn ~ 50kg\r\nTay lửng 3/4\r\nCó nón liền cổ phong cách thời trang', 100000, 0, 'images/product/Women1.jpg\r\n', 20, 2, 6, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 1),
(11, 'Áo Thun Nữ Cánh Dơi Sodoha ATV106216TX (Trắng xanh)  ', 'Mã sản phẩm: ATV106216TX\r\nMàu sắc: Trắng xanh, hồng xám\r\nSize: M, L, XL\r\nChất liệu: Polyester\r\nTay áo: tay áo ngắn', 120000, 0, 'images/product/Women2.jpg', 158000, 2, 5, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 1),
(12, 'Áo cardigan (Vàng)  ', 'Chất liệu len mềm mịn, dày dặn và đứng dáng.\r\nChất liệu len cao cấp, thấm mồ hôi giúp người mặc luôn cảm thấy dễ chịu, mềm mại và êm ái.\r\nKiểu dáng đơn giản, trang nhã đem tới cho bạn nữ nét cá tính và hiện đại của người phụ nữ Á ', 290000, 0, 'images/product/Women3.jpg', 20, 2, 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 1),
(13, 'Áo Khoác Len Cardigans Thu Đông Hàn Quốc (Trắng)  ', 'Áo len cadigans luôn là lựa chọn tinh tế của các bạn nữ khi thời tiết se se lạnh.\r\nChất len mềm mại, không bai nhão\r\nMàu sắc cơ bản dễ kết hợp Có thể kết hợp cùng chân váy, quần jean, sooc  ', 250000, 0, 'images/product/Women4.jpg', 10, 2, 3, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 1),
(14, 'MŨ LEN NỒI ĐỘI ĐẦU CHO BÉ SIÊU XINH DỄ THƯƠNG ( HỒNG NHẠT )  ', 'Chất liệu len mềm mại\r\nMàu sắc tươi sáng\r\nĐược thiết kế 2 lớp dày dặn\r\nẤm áp cho bé yêu bé từ 2 đến 4 tuổi', 106000, 0, 'images/product/Kids1.jpg', 20, 3, 5, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 1),
(15, 'Bộ quần áo thu đông hình hoa cúc dễ thương cho bé từ 9-25kg (Hồng)  \r\n', 'Chất liệu: Nỉ da cá dày mịn\r\nCho bé gái từ 8-27kg\r\nChất liệu thoáng, thấm hút mồ hôi\r\nSử dụng mùa thu đông, trong thời tiết se lạnh và lạnh\r\nCho bé đi học, đi chơi, ở nhà, đi ngủ', 155000, 0, 'images/product/Kids2.jpg', 10, 3, 4, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 1),
(16, 'Bộ 2 quần Jean bò chun đáng yêu cho bé màu như hình  \r\n', '\r\nDễ kêt hợp vớ quần áo Co giãn 4 chiều  mang lại cho bé cảm giác thoải mái khi hoạt động', 289000, 0, 'images/product/Kids3.jpg', 20, 3, 2, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 1),
(17, 'Xả hàng:Combo 02 áo dài tay thu đông hàng xuất khẩu bé trai cao cấp  ', 'Thiết kế dài tay, cổ 3 phân giúp giữ ấm cho bé.\r\nChất liệu với 100% cotton len, mềm mại, thấm mồ hôi\r\nTỉ mỉ trên từng đường may cho bé\r\nSản phẩm giao màu ngẫu nhiên ', 120000, 0, 'images/product/Kids4.jpg', 15, 3, 6, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 1),
(18, 'Đồng hồ cơ Tevise 1000 dây đúc lộ máy (Đen)  ', 'Tevies chính hãng công nghệ Thụy Sỹ\r\nĐường kính 43mm, dày 15mm\r\nMặt kính cường lực chống trấy xước\r\nDây inox đặc không gỉ, thâu cắt được', 800000, 0, 'images/product/Watch1.jpg', 30, 4, 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 1),
(19, 'Đồng hồ nam dây da Casio Anh Khuê MTP-1183Q-7ADF  \r\n', 'Thương hiệu: Casio Nhật Bản\r\nChính hãng: Casio Anh Khuê\r\nBảo hành: 1 năm về máy\r\nĐầy đủ phụ kiện chính hãng\r\nTem chống hàng giả AK\r\nHộp và thẻ chính hãng Anh Khuê\r\nĐặc biệt: miễn phí thay pin trọn đời tại shop Phố Đồng Hồ', 908000, 0, 'images/product/Watch2.jpg', 19, 4, 2, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 1),
(20, 'ĐỒNG HỒ SEIKO CHỐNG NƯỚC NAM, NỮ  ', 'Chất liệu cao cấp\r\nĐộ bền cao\r\nAn toàn khi sử dụng', 720000, 0, 'images/product/Watch3.jpg', 30, 4, 3, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 1),
(21, 'Đồng hồ nữ dây thép không gỉ Seiko Lord SUR802P1 (Vàng)  ', 'Dây thép không gỉ\r\nDành cho nữ\r\nThiết kế tinh tế; phù hợp nhiều phong cách', 7640000, 0, 'images/product/Watch4.jpg', 10, 4, 5, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0),
(22, 'Bộ Trang Sức Nữ Mạ 24K-01', '-Chất liệu hợp titan inox KHÔNG ĐEN - KHÔNG RỈ SÉT \r\n-Sản phẩm được sản xuất theo công nghệ mới tiên tiến nhất của Hàn Quốc\r\n-Được Xi mạ 4 lớp màu trong môi trường chân không\r\n-Lớp ngoài cùng được xi một lớp bảo vệ chống dị ứng, ngứa (ngoại trừ một số trường hợp đặc biệt như mồ hôi muối có tính acid quá cao)\r\n-Sản phẩm cao cấp bán chạy của UHA jewels & accessories\r\n-Tặng kèm hộp Sang Trọng khi mua sản phẩm hộp có chất hút ẩm để bảo vệ sản phẩm', 450000, 0, 'images/product/Jewelry1.jpg', 20, 5, 1, '2017-12-08 11:17:39', '2017-12-08 11:17:39', 1),
(23, 'Hoa tai thời trang dáng dài hoa lụa BT7286  ', 'Kiểu dáng thời trang, dễ kết hợp với nhiều loại trang phục\r\nChất liệu: Hợp kim, vải lụa\r\nKích thước: dài 13 cm\r\nMàu sắc: Đỏ và Hồng\r\nKhối lượng: 10g', 100000, 0, 'images/product/Jewelry2.jpg', 150000, 5, 6, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 1);

-- --------------------------------------------------------

--
-- Table structure for table `product_media_reference`
--

CREATE TABLE `product_media_reference` (
  `pmID` int(40) NOT NULL,
  `productID` int(20) NOT NULL,
  `mediaID` int(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_vietnamese_ci;

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
(5, 'admin', '$2y$10$Uht67Pofr0Y97oOavIEHZ.wiWotQ53JToZEHOcA.gf8sA.B9/IqYK', 'flatshop2017@gmail.com', 'Nam Định', 'admin', 'admin', 1697444444, 'images/avatar/anh1.png', 0, '2017-12-04', 1, '2017-12-07 10:30:07', 'pXorb2EZmFKWp9RbtY6rbdSW5EEdXhOdFzrLQborEpzU5mRGrWJpK3FS8Lvk', 1),
(12, 'binh', '$2y$10$TPdj06asWyDONALp/9NZlOlhW2uc4qQTSsUEeZPzjhmk.BDBE1i.K', 'hoangbinhnt1996@gmail.com', 'Hà Nội', 'Hoàng', 'Bình', 1277079411, 'images/avatar/Defaul.png', 1, '1996-10-31', 2, '2017-12-07 09:21:24', 'r0sYthDi9o7D6i23OLCDVqK36GJqGdPVb4OJRwoQCnM5cwcxGgg7Frufnh0h', 1),
(13, 'ninh', '$2y$10$o3DHM7lj/haZhnpIAJzGfu2nH7UbZfGk./gAcZrMsRPGzwkJg6qPK', 'ngninh96@gmail.com', 'Bắc Giang', 'Nguyễn', 'Ninh', 123456789, 'images/avatar/Defaul.png', 0, NULL, 3, '2017-12-04 15:59:18', 'OTyD9faOqxV6BVwyeH2VjfKRtJ8J2xIC0TggMEiS069W0yMXElyTF1uLsjc2', 1),
(14, 'loan', '$2y$10$cxCizxTbFSo7S2N2jugrf.KMh6Wq.mv.3M0kPI4qul2aViahji0NS', 'loan@gmail.com', 'Hưng Yên', 'Nguyễn', 'Loan', 1111111111, 'images/avatar/Defaul.png', 0, NULL, 4, '2017-12-04 16:01:05', 'duB7S7rbII74hIgYayHHorYFl3qZvAf09mfAmvPOhkq7wl0Qqi6SvYcvgrc6', 1),
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

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `bill_detail`
--
ALTER TABLE `bill_detail`
  MODIFY `bill_ID` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=35;
--
-- AUTO_INCREMENT for table `category_detail`
--
ALTER TABLE `category_detail`
  MODIFY `categoryID` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT for table `comment`
--
ALTER TABLE `comment`
  MODIFY `commentID` int(20) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `media_detail`
--
ALTER TABLE `media_detail`
  MODIFY `mediaID` int(20) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `order_detail`
--
ALTER TABLE `order_detail`
  MODIFY `orderID` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=83;
--
-- AUTO_INCREMENT for table `order_product_reference`
--
ALTER TABLE `order_product_reference`
  MODIFY `opID` int(40) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `product_category_reference`
--
ALTER TABLE `product_category_reference`
  MODIFY `id` int(40) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `product_detail`
--
ALTER TABLE `product_detail`
  MODIFY `productID` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;
--
-- AUTO_INCREMENT for table `product_media_reference`
--
ALTER TABLE `product_media_reference`
  MODIFY `pmID` int(40) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `userID` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

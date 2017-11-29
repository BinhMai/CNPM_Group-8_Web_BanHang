-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Nov 25, 2017 at 03:46 PM
-- Server version: 10.1.13-MariaDB
-- PHP Version: 5.6.20

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
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
  `billID` int(20) NOT NULL,
  `userID` int(20) DEFAULT NULL,
  `orderID` int(20) NOT NULL,
  `dateofbirth` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_vietnamese_ci;

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
(6, 'Jewelry', '', 5);

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
  `userID` int(20) DEFAULT NULL,
  `productID` int(20) NOT NULL,
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
(1, 0, 0, '2017-11-18 00:00:00', '2017-11-18 00:00:00', '', 50, 0, 1),
(2, 0, 0, '2017-11-18 00:00:00', '2017-11-18 00:00:00', '', 100, 1, 1),
(3, 0, 0, '2017-11-24 00:00:00', '2017-11-30 00:00:00', '', 120, 2, 1);

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
(1, 'Áo Khoác Nam Bomber Jacket Kaki', 'Chất liệu vải vẫn là kaki nhật ngoại nhập cao cấp, 2 lớp lót dù mềm mại, chắc chắn, thấm hút mồ hôi tốt tạo sự thoải mái khi mặc. Áo bomber có túi, dây kéo tiện dụng giúp đựng được những vật nhỏ cần thiết và sử dụng gam màu trung tính sẽ là lựa chọn hoàn hảo cho phong cách smart-casual – không ồn ào những vẫn rất nổi bật, đơn giản mà thời trang, trẻ trung mà lịch lãm.', 200000, 0, 'images/1.jpg', 20, 1, 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 1),
(2, 'Áo Khoác Dù 2 Lớp LADOS', 'Áo có thiết kế khóa kéo phía trước tiện dụng bạn có thể dễ dàng khi mặc. Tay áo và thân phối bo, cố định khi mặc, ngoài tác dụng bảo vệ bạn khỏi tác hại từ môi trường bên ngoài áo còn tăng thêm phần thanh lịch và giữ ấm cơ thể.\r\n\r\nForm dáng cổ điển bạn có thể dễ dàng kết hợp với nhiều trang phục khác nhau vô cùng tiện dụng và bắt mắt.\r\n\r\nÁo một mặt màu đen, mặt còn lại màu xám, phối cùng bo đen ấn tượng dễ dàng phối cùng với nhiều phong cách riêng của mình. Chất liệu vải dù bền, đẹp, thấm hút tốt, không hầm bí khi mặc.\r\n\r\nChất liệu dù 2 lớp tiện lợi cho chàng trong những ngày đông mưa phùn hay gió lạnh.Màu sắc trang nhã dễ dàng mix cùng các trang phục khác.Bạn có thể kết hợp cùng áo sơ mi, áo kiểu, quần kaki, jean các phụ kiện đi kèm để luôn được tự tin và nổi bật nhất.', 320000, 0, 'images/2.jpg\r\n', 10, 1, 2, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 1),
(3, 'ÁO KHOÁC NAM KAKI THÊU HAI LỚP', 'Thiết kế tinh tế với cổ bẻ, tay dài phối bo tay sành điệu, cá tính, form dáng khỏe khoắn cho bạn phong cách trẻ trung, chỉnh chu và không kém phần lịch lãm. Kiểu dáng thời trang, đường chỉ may tỉ mỉ, tinh tế. Màu sắc trang nhã dễ dàng mix cùng các trang phục khác như áo thun, áo sơ mi,... Người bạn đồng hành lý tưởng cho bạn phong cách hoàn hảo. Chất liệu: Kaki  Size M: 50 - 55kg, Size L:56 - 65kg ', 270000, 0, 'images/3.jpg', 30, 1, 3, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 1),
(4, 'Áo khoác jean nam nhập khẩu AKJN01 ZAVANS (Xanh) ', 'Áo khoác jean denim ZAVANS được may từ chất liệu vải jean cao cấp với độ dày vừa phải có thể giữ ấm trong những ngày trở lạnh nhưng vẫn đảm bảo sự thông thoáng khi mặc. Ngoài ra, áo còn được thiết kế trẻ trung mang đến vẻ ngoài mang phong cách mạnh mẽ, trẻ trung, năng động mà cũng đầy hiện đại cho các bạn nam.\r\nChất liệu vải: Jean denim dày dặn\r\nKiểu dáng tay dài, cổ bẻ\r\nThiết kế màu sắc cá tính\r\nHàng nhập khẩu cao cấp', 212000, 0, 'images/4.jpg', 20, 1, 2, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 1),
(5, 'Áo Khoác dù nam phối nón hàn quốc Pigofashion SAK23 (xanh đen)  ', 'Thiết kế tinh tế với cổ bẻ, tay dài phối nón sành điệu, cá tính, form dáng khỏe khoắn cho bạn phong cách trẻ trung, chỉnh chu và không kém phần lịch lãm.\r\nĐảm Bảo Ko Ra Màu , Ko Phai Màu Suốt Quá Trình Sữ Dụng \r\nChất liệu: vải kaki 100% . bên trong có lớp lót vải mỏng giúp thoáng khí mát mẽ.\r\nCông dụng: che gió, chống nắng, giữ ấm mùa thu đông\r\nKiểu dáng thời trang, đường chỉ may tỉ mỉ, tinh tế.\r\nMàu sắc trang nhã dễ dàng mix cùng các trang phục khác như áo thun, áo sơ mi,...\r\nNgười bạn đồng hành lý tưởng cho bạn phong cách hoàn hảo.\r\nChất liệu: Dù cán dày dặn + lớp lót vải dù thoáng mát bên trong, phối nón sau phong cách hàn quốc\r\nSize: M: 50 - 55kg, L:56 - 65kg , XL: 66 - 75kg', 194000, 0, 'images/5.jpg', 4, 1, 3, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 1),
(6, 'Áo Khoác Kaki Nam Phối Kéo Hàn Quốc QK15 - Kem ', 'Áo Khoác Kaki Nam Phối Kéo Hàn Quốc QK15 - Kem cực đẹp, tinh tế & đẳng cấp, phong cách, năng động. Áo Khoác kaki cao cấp chất liệu kaki mịn lót dù ngoại nhập, đẹp, kiểu dáng đẳng cấp, thoải mái và thời trang.\r\n\r\nSize : Xem bảng bên dưới \r\n\r\n♦ Đảm Bảo Ko Ra Màu , Ko Phai Màu Suốt Quá Trình Sữ Dụng \r\n\r\n♦ Áo Khoác Kaki Nam Phối Kéo Hàn Quốc QK15 - Kem Cao Cấp với thiết kế mạnh mẽ và nam tính, cho bạn sự thoải mái, khỏe khoắn khi kết hợp với nhiều loại trang phục khác nhau.\r\n\r\n♦ Áo Khoác Kaki Nam Phối Kéo Hàn Quốc QK15 - Kem làm bằng kaki tổng hợp  cao cấp 2 lớp . Tuyệt đối không ra màu, độ bền cao  và thời trang.\r\n\r\n♦ Dây khóa làm inox mạ đồng lịch lãm nam tính.', 400000, 0, 'images/6.jpg', 195, 1, 2, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 1),
(7, 'Áo Khoác Da Nam Đen Trơn Khóa Kéo Đồng Cao Cấp - D21  ', 'Chất liệu Da cao cấp nhập Thái , có túi bên trong áo \r\nĐảm Bảo Ko Hư Hỏng , Ko Bong Tróc Suốt Quá Trình Sữ Dụng  \r\nDây khóa kéo đồng được mạ crom trắng cao cấp giúp ko bị rỉ sét \r\nMặc Tự Tróc Alo Shop Hoàn Trả Lại \r\nĐường chỉ may chắc chắn , tinh tế \r\nDễ dàng phối cùng nhiều loại trang phục khác nhau \r\nXứng đáng Đồng Tiền của Quý Khách \r\nSize xem bảng bên phần chi tiết sản phẩm', 259000, 0, 'images/7.jpg', 10, 1, 4, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 1),
(8, 'Áo khoác da lót lông cao cấp LADOS-01 (Đen)  ', 'Thiết kế thời trang\r\nSản phẩm chất lượng\r\nĐường may sắc sảo tinh tế\r\nDể dàng phối trang phục\r\nLót lông cực ấm\r\nDa siêu bền, không bong, tróc, nổ', 400000, 0, 'images/8.jpg', 20, 1, 3, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 1),
(9, 'Áo khoác jean nam nhập khẩu AKJN04 ZAVANS (Xanh bò)  ', 'Chất liệu vải: Jean denim dày dặn\r\nKiểu dáng tay dài, cổ bẻ\r\nThiết kế màu sắc cá tính\r\nHàng nhập khẩu cao cấp', 276000, 0, 'images/9.jpg', 30, 1, 5, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 1),
(10, 'Áo thun tay lỡ Hàn Quốc có mũ form rộng ( ĐEN) SỐ 6  ', 'Thun cotton 4 chiều dày, mịn\r\nThiết kế trẻ trung năng động\r\nFreesize dành cho các bạn ~ 50kg\r\nTay lửng 3/4\r\nCó nón liền cổ phong cách thời trang', 100000, 0, 'images/1.jpg\r\n', 20, 2, 6, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 1),
(11, 'Áo Thun Nữ Cánh Dơi Sodoha ATV106216TX (Trắng xanh)  ', 'Mã sản phẩm: ATV106216TX\r\nMàu sắc: Trắng xanh, hồng xám\r\nSize: M, L, XL\r\nChất liệu: Polyester\r\nTay áo: tay áo ngắn', NULL, 0, 'images/2.jpg', 158000, 2, 5, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 1),
(12, 'Áo cardigan (Vàng)  ', 'Chất liệu len mềm mịn, dày dặn và đứng dáng.\r\nChất liệu len cao cấp, thấm mồ hôi giúp người mặc luôn cảm thấy dễ chịu, mềm mại và êm ái.\r\nKiểu dáng đơn giản, trang nhã đem tới cho bạn nữ nét cá tính và hiện đại của người phụ nữ Á ', 290000, 0, 'images/3.jpg', 20, 2, 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 1),
(13, 'Áo Khoác Len Cardigans Thu Đông Hàn Quốc (Trắng)  ', 'Áo len cadigans luôn là lựa chọn tinh tế của các bạn nữ khi thời tiết se se lạnh.\r\nChất len mềm mại, không bai nhão\r\nMàu sắc cơ bản dễ kết hợp Có thể kết hợp cùng chân váy, quần jean, sooc  ', 250000, 0, 'images/4.jpg', 10, 2, 3, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 1),
(14, 'MŨ LEN NỒI ĐỘI ĐẦU CHO BÉ SIÊU XINH DỄ THƯƠNG ( HỒNG NHẠT )  ', 'Chất liệu len mềm mại\r\nMàu sắc tươi sáng\r\nĐược thiết kế 2 lớp dày dặn\r\nẤm áp cho bé yêu bé từ 2 đến 4 tuổi', 106000, 0, 'images/1.jpg', 20, 3, 5, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 1),
(15, 'Bộ quần áo thu đông hình hoa cúc dễ thương cho bé từ 9-25kg (Hồng)  \r\n', 'Chất liệu: Nỉ da cá dày mịn\r\nCho bé gái từ 8-27kg\r\nChất liệu thoáng, thấm hút mồ hôi\r\nSử dụng mùa thu đông, trong thời tiết se lạnh và lạnh\r\nCho bé đi học, đi chơi, ở nhà, đi ngủ', 155000, 0, 'images/2.jpg', 10, 3, 4, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 1),
(16, 'Bộ 2 quần Jean bò chun đáng yêu cho bé màu như hình  \r\n', '\r\nDễ kêt hợp vớ quần áo Co giãn 4 chiều  mang lại cho bé cảm giác thoải mái khi hoạt động', 289000, 0, 'images/3.jpg', 20, 3, 2, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 1),
(17, 'Xả hàng:Combo 02 áo dài tay thu đông hàng xuất khẩu bé trai cao cấp  ', 'Thiết kế dài tay, cổ 3 phân giúp giữ ấm cho bé.\r\nChất liệu với 100% cotton len, mềm mại, thấm mồ hôi\r\nTỉ mỉ trên từng đường may cho bé\r\nSản phẩm giao màu ngẫu nhiên ', 120000, 0, 'images/4.jpg', 15, 3, 6, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 1),
(18, 'Đồng hồ cơ Tevise 1000 dây đúc lộ máy (Đen)  ', 'Tevies chính hãng công nghệ Thụy Sỹ\r\nĐường kính 43mm, dày 15mm\r\nMặt kính cường lực chống trấy xước\r\nDây inox đặc không gỉ, thâu cắt được', 800000, 0, 'images/1.jpg', 30, 4, 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 1),
(19, 'Đồng hồ nam dây da Casio Anh Khuê MTP-1183Q-7ADF  \r\n', 'Thương hiệu: Casio Nhật Bản\r\nChính hãng: Casio Anh Khuê\r\nBảo hành: 1 năm về máy\r\nĐầy đủ phụ kiện chính hãng\r\nTem chống hàng giả AK\r\nHộp và thẻ chính hãng Anh Khuê\r\nĐặc biệt: miễn phí thay pin trọn đời tại shop Phố Đồng Hồ', 908000, 0, 'images/2.jpg', 19, 4, 2, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 1),
(20, 'ĐỒNG HỒ SEIKO CHỐNG NƯỚC NAM, NỮ  ', 'Chất liệu cao cấp\r\nĐộ bền cao\r\nAn toàn khi sử dụng', 720000, 0, 'images/3.jpg', 30, 4, 3, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 1),
(21, 'Đồng hồ nữ dây thép không gỉ Seiko Lord SUR802P1 (Vàng)  ', 'Dây thép không gỉ\r\nDành cho nữ\r\nThiết kế tinh tế; phù hợp nhiều phong cách', 7640000, 0, 'images/4.jpg', 10, 4, 5, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 1),
(22, 'Bộ Trang Sức Nữ Mạ 24K-01  ', '-Chất liệu hợp titan inox KHÔNG ĐEN - KHÔNG RỈ SÉT \r\n-Sản phẩm được sản xuất theo công nghệ mới tiên tiến nhất của Hàn Quốc\r\n-Được Xi mạ 4 lớp màu trong môi trường chân không\r\n-Lớp ngoài cùng được xi một lớp bảo vệ chống dị ứng, ngứa (ngoại trừ một số trường hợp đặc biệt như mồ hôi muối có tính acid quá cao)\r\n-Sản phẩm cao cấp bán chạy của UHA jewels & accessories\r\n-Tặng kèm hộp Sang Trọng khi mua sản phẩm hộp có chất hút ẩm để bảo vệ sản phẩm', 450000, 0, 'images/1.jpg', 20, 5, 6, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 1),
(23, 'Hoa tai thời trang dáng dài hoa lụa BT7286  ', 'Kiểu dáng thời trang, dễ kết hợp với nhiều loại trang phục\r\nChất liệu: Hợp kim, vải lụa\r\nKích thước: dài 13 cm\r\nMàu sắc: Đỏ và Hồng\r\nKhối lượng: 10g', NULL, 0, 'images/slider-image-01.png', 150000, 5, 6, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 1);

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
  `mediaID` varchar(200) COLLATE utf8mb4_vietnamese_ci NOT NULL DEFAULT 'image_ava/Defaul.png',
  `gender` int(1) NOT NULL,
  `dateofbirth` varchar(20) COLLATE utf8mb4_vietnamese_ci NOT NULL,
  `typeofuser` int(1) NOT NULL DEFAULT '4',
  `dateofcreate` datetime NOT NULL,
  `remember_token` varchar(200) COLLATE utf8mb4_vietnamese_ci DEFAULT NULL,
  `isActive` int(1) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_vietnamese_ci;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`userID`, `username`, `password`, `email`, `address`, `firstname`, `lastname`, `telephone`, `mediaID`, `gender`, `dateofbirth`, `typeofuser`, `dateofcreate`, `remember_token`, `isActive`) VALUES
(5, 'Thoa Pham', '1', 'thoa@gmail.com', 'Nam Định', 'Thoa', 'Phạm', 1697444444, 'image_ava/anh1.png', 0, '1996/17/08', 2, '2017-11-24 00:00:00', NULL, 1),
(6, 'Ninh Nguyen', '2', 'ninh@gmail.com', 'Bắc Giang', 'Ninh', 'Nguyễn', 1234332322, 'image_ava/anh2.png', 0, '1996/11/11', 2, '2017-11-24 00:00:00', NULL, 0),
(7, 'Loan Nguyen', '3', 'loan@gmail.com', 'Hưng Yên', 'Loan', 'Nguyễn', 1273449499, 'image_ava/anh3.png', 0, '1996/2/2', 2, '2017-11-24 00:00:00', NULL, 1),
(8, 'Nhung Vu', '4', 'nhung@gmail.com', 'Hà Nội', 'Nhung', 'Vũ', 16933232, 'image_ava/anh4.png', 0, '', 4, '1996-03-03 00:00:00', NULL, 0),
(9, 'Binh Hoang', '5', 'binh@gmail.com', 'Nam Định', 'Bình', 'Hoàng', 134566766, 'image_ava/anh5.jpg', 1, '1996/4/4', 1, '2017-11-24 00:00:00', NULL, 1),
(10, 'Minh Nguyen', '6', 'minh@gmail.com', 'Hà Nam', 'Minh', 'Nguyễn', 13233566, 'image_ava/anh6.jpg', 1, '1996/6/6', 1, '2017-11-24 00:00:00', NULL, 1);

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

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `bill_detail`
--
ALTER TABLE `bill_detail`
  MODIFY `billID` int(20) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `category_detail`
--
ALTER TABLE `category_detail`
  MODIFY `categoryID` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
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
  MODIFY `orderID` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
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
  MODIFY `userID` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
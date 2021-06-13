-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 13, 2021 at 05:58 PM
-- Server version: 10.4.14-MariaDB
-- PHP Version: 7.4.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `shoes_store`
--

-- --------------------------------------------------------

--
-- Table structure for table `cart`
--

CREATE TABLE `cart` (
  `id_user` int(20) NOT NULL,
  `createAt` datetime NOT NULL,
  `status` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `cart_detail`
--

CREATE TABLE `cart_detail` (
  `id_cartdetail` int(20) NOT NULL,
  `id_user` int(20) NOT NULL,
  `id_prodetail` int(20) NOT NULL,
  `price` float NOT NULL,
  `discount` float NOT NULL,
  `quantity` int(20) NOT NULL,
  `createAt` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `category`
--

CREATE TABLE `category` (
  `id_cat` int(20) NOT NULL,
  `title_cat` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `category`
--

INSERT INTO `category` (`id_cat`, `title_cat`) VALUES
(1, 'Men'),
(2, 'Woman'),
(3, 'Kids');

-- --------------------------------------------------------

--
-- Table structure for table `product`
--

CREATE TABLE `product` (
  `id_pro` int(20) NOT NULL,
  `id_cat` int(20) NOT NULL,
  `id_subcat` int(20) NOT NULL,
  `productname` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `price` float NOT NULL,
  `discount` float NOT NULL,
  `createAt` datetime NOT NULL,
  `content` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `product`
--

INSERT INTO `product` (`id_pro`, `id_cat`, `id_subcat`, `productname`, `price`, `discount`, `createAt`, `content`) VALUES
(1, 1, 3, 'KD14', 4409000, 0, '2021-04-19 00:00:00', 'Kevin Durant lurks on the wing, waiting for the right time to strike before slicing his way through defences. The KD14 is designed to help versatile, relentless players like KD feel fresh all game long. Multi-layer mesh and a midfoot strap help reduce the foot\'s movements inside the shoe. Full-length Zoom Air cushioning plus Cushlon foam give back energy for lasting performance. This EP version uses an extra-durable sole that\'s ideal for outdoor courts.'),
(2, 1, 3, 'Nike Air Zoom G.T.Cut', 4990000, 0, '2021-04-19 00:00:00', 'The Nike Air Zoom G.T.Cut is made for the Space Makers—the players who use their skills to create space for themselves and others.This lightweight, low-to-the-ground silhouette is built to minimise ground contact, giving you a sense of total control and lateral stability.It also comes equipped with a full React drop-in sole stacked on top of a parabolic Air Zoom Strobel and an Air Zoom unit in the heel, providing a snappy, responsive feel.'),
(3, 1, 3, 'Floral', 4409000, 0, '2021-04-19 00:00:00', 'Every move you make has the potential to move the world forwards. The Cosmic Unity \'Floral\' is designed in honour of Earth Day and takes cues from the annual celebration of the planet with an expressive and festive design.\r\n\r\nFeaturing a Bright Pink lightweight upper, an eggshell Crater Foam midsole and hits of green on the outsole and tongue logos, this bold colourway reflects the beauty and strength of our world. It\'s built with at least 25% recycled material by weight and features a partially recycled Air Zoom strobel made to respond to your every move. This shoe is the latest effort from Nike Basketball to create more sustainable products without sacrificing performance.'),
(4, 1, 2, 'Nike ZoomX Vaporfly Next% 2', 9906000, 0, '2021-04-19 00:00:00', 'Continue the next evolution of speed with a racing shoe made to you help chase new goals and records. The Nike ZoomX Vaporfly Next% 2 builds on the model racers everywhere love. It helps improve comfort and breathability with a redesigned upper. From a 10K to a marathon, the 2 still has the responsive cushioning and secure support to push you towards your personal best.'),
(5, 1, 3, 'LeBron 18 Low \'Summer Refresh\'', 4699000, 0, '2021-04-21 00:00:00', 'A player of LeBron\'s power and agility needs a light yet strong shoe that harnesses his force but still allows him to move with precision.The LeBron 18 Low \'Summer Refresh\' colourway bursts onto the court with Bright Lime and Mango hues.It\'s lower and lighter than his game shoe, with Max Air plus Nike React foam providing impact cushioning and responsiveness.A padded, sculpted collar and the streamlined heel clip help secure the foot during games.'),
(6, 1, 2, 'Nike Renew Run 2', 2499000, 0, '2021-04-22 00:00:00', 'The Nike Renew Run 2 continues to deliver a smooth ride for your miles. It\'s designed with better shaping around the collar and tongue to help support your foot. When running becomes an everyday goal, this shoe delivers a comfortable feel and durable traction.'),
(7, 1, 2, 'Nike Legend React 2', 2929000, 0.39, '2021-04-22 00:00:00', 'The Nike Legend React 2 features breathable mesh in the upper and a full-length foam midsole that provides stability and cushioning on every mile. It\'s made for runners who are ready to go the distance in comfort.');

-- --------------------------------------------------------

--
-- Table structure for table `product_detail`
--

CREATE TABLE `product_detail` (
  `id_prode` int(20) NOT NULL,
  `id_pro` int(20) NOT NULL,
  `quantity` smallint(6) NOT NULL,
  `purchasecount` int(6) NOT NULL DEFAULT 0,
  `size` int(6) NOT NULL,
  `color` varchar(10) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `image` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `product_detail`
--

INSERT INTO `product_detail` (`id_prode`, `id_pro`, `quantity`, `purchasecount`, `size`, `color`, `image`) VALUES
(1, 1, 10, 0, 40, 'black', 'kd14.jpg'),
(2, 1, 10, 0, 41, 'black', 'kd14.jpg'),
(3, 1, 10, 0, 42, 'black', 'kd14.jpg'),
(4, 5, 10, 0, 40, 'green', 'lebron-18-low-green.jpg'),
(5, 5, 10, 0, 40, 'black', 'lebron-18-low-black.jpg'),
(6, 5, 10, 0, 40, 'purple', 'lebron-18-low-purple.jpg'),
(7, 5, 10, 0, 41, 'green', 'lebron-18-low-green.jpg'),
(8, 5, 10, 0, 41, 'black', 'lebron-18-low-black.jpg'),
(9, 5, 10, 0, 41, 'purple', 'lebron-18-low-purple.jpg'),
(10, 5, 10, 0, 42, 'purple', 'lebron-18-low-purple.jpg'),
(11, 6, 10, 0, 40, 'black', 'renew-run-2-black.jpg'),
(12, 6, 10, 0, 40, 'red', 'renew-run-2-red.jpg'),
(13, 6, 10, 0, 41, 'black', 'renew-run-2-black.jpg'),
(14, 6, 10, 0, 41, 'red', 'renew-run-2-red.jpg'),
(15, 6, 10, 0, 42, 'black', 'renew-run-2-black.jpg'),
(16, 6, 10, 0, 42, 'red', 'renew-run-2-red.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `sub_category`
--

CREATE TABLE `sub_category` (
  `id_subcat` int(20) NOT NULL,
  `id_cat` int(20) NOT NULL,
  `title_subcat` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `sub_category`
--

INSERT INTO `sub_category` (`id_subcat`, `id_cat`, `title_subcat`) VALUES
(1, 1, 'Thời trang'),
(2, 1, 'Chạy bộ'),
(3, 1, 'Bóng rổ'),
(4, 1, 'Bóng đá'),
(5, 1, 'Gym'),
(6, 1, 'Lướt ván'),
(7, 1, 'Tenis'),
(8, 2, 'Thời trang'),
(9, 2, 'Chạy bộ'),
(10, 2, 'Bóng rổ'),
(11, 2, 'Bóng đá'),
(12, 2, 'Gym'),
(13, 2, 'Lướt ván'),
(14, 2, 'Tenis'),
(15, 3, 'Trẻ em nhỏ tuổi'),
(16, 3, 'Trẻ em lớn tuổi'),
(17, 3, 'Thời trang'),
(18, 3, 'Chạy bộ'),
(19, 3, 'Bóng rổ'),
(20, 3, 'Bóng đá'),
(21, 3, 'Gym'),
(22, 3, 'Lướt ván'),
(23, 3, 'Tenis');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id_user` int(20) NOT NULL,
  `username` varchar(100) NOT NULL,
  `firstname` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `lastname` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `address` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(100) NOT NULL,
  `phone` varchar(11) NOT NULL,
  `admin` int(1) NOT NULL DEFAULT 0,
  `registerAt` datetime NOT NULL,
  `password` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id_user`, `username`, `firstname`, `lastname`, `address`, `email`, `phone`, `admin`, `registerAt`, `password`) VALUES
(1, 'longtk', 'long', 'nguyen', '02 Thanh Sơn', 'nduclong7@gmail.com', '0902336908', 0, '2021-06-08 16:20:01', '202cb962ac59075b964b07152d234b70'),
(2, 'admin', 'long', 'nguyen', '02 Thanh Sơn', 'nduclong79@gmail.com', '0914219427', 1, '2021-06-08 16:20:01', '21232f297a57a5a743894a0e4a801fc3'),
(3, 'linh', 'linh', 'truong', '24 Ông Ích khiêm', 'trconglinh@gmail.com', '0905456789', 0, '2021-06-08 16:33:21', 'e10adc3949ba59abbe56e057f20f883e');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `cart`
--
ALTER TABLE `cart`
  ADD PRIMARY KEY (`id_user`);

--
-- Indexes for table `cart_detail`
--
ALTER TABLE `cart_detail`
  ADD PRIMARY KEY (`id_cartdetail`),
  ADD KEY `id_cart` (`id_user`),
  ADD KEY `id_prodetail` (`id_prodetail`);

--
-- Indexes for table `category`
--
ALTER TABLE `category`
  ADD PRIMARY KEY (`id_cat`);

--
-- Indexes for table `product`
--
ALTER TABLE `product`
  ADD PRIMARY KEY (`id_pro`),
  ADD KEY `id_cat` (`id_cat`),
  ADD KEY `id_subcat` (`id_subcat`);

--
-- Indexes for table `product_detail`
--
ALTER TABLE `product_detail`
  ADD PRIMARY KEY (`id_prode`),
  ADD KEY `id_pro` (`id_pro`);

--
-- Indexes for table `sub_category`
--
ALTER TABLE `sub_category`
  ADD PRIMARY KEY (`id_subcat`),
  ADD KEY `id_cat` (`id_cat`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id_user`),
  ADD UNIQUE KEY `username` (`username`),
  ADD UNIQUE KEY `email` (`email`),
  ADD UNIQUE KEY `phone` (`phone`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `cart_detail`
--
ALTER TABLE `cart_detail`
  MODIFY `id_cartdetail` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `category`
--
ALTER TABLE `category`
  MODIFY `id_cat` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `product`
--
ALTER TABLE `product`
  MODIFY `id_pro` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `product_detail`
--
ALTER TABLE `product_detail`
  MODIFY `id_prode` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `sub_category`
--
ALTER TABLE `sub_category`
  MODIFY `id_subcat` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id_user` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `cart`
--
ALTER TABLE `cart`
  ADD CONSTRAINT `cart_ibfk_1` FOREIGN KEY (`id_user`) REFERENCES `user` (`id_user`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `cart_detail`
--
ALTER TABLE `cart_detail`
  ADD CONSTRAINT `cart_detail_ibfk_2` FOREIGN KEY (`id_prodetail`) REFERENCES `product_detail` (`id_prode`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `cart_detail_ibfk_3` FOREIGN KEY (`id_user`) REFERENCES `cart` (`id_user`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `product`
--
ALTER TABLE `product`
  ADD CONSTRAINT `product_ibfk_1` FOREIGN KEY (`id_cat`) REFERENCES `category` (`id_cat`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `product_ibfk_2` FOREIGN KEY (`id_subcat`) REFERENCES `sub_category` (`id_subcat`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `product_detail`
--
ALTER TABLE `product_detail`
  ADD CONSTRAINT `product_detail_ibfk_1` FOREIGN KEY (`id_pro`) REFERENCES `product` (`id_pro`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `sub_category`
--
ALTER TABLE `sub_category`
  ADD CONSTRAINT `sub_category_ibfk_1` FOREIGN KEY (`id_cat`) REFERENCES `category` (`id_cat`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

-- phpMyAdmin SQL Dump
-- version 4.8.3
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 10, 2019 at 06:05 AM
-- Server version: 10.1.35-MariaDB
-- PHP Version: 7.2.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `gaukute`
--

-- --------------------------------------------------------

--
-- Table structure for table `bills`
--

CREATE TABLE `bills` (
  `id` int(10) UNSIGNED NOT NULL,
  `customer_id` int(11) DEFAULT NULL,
  `date_order` date DEFAULT NULL,
  `total` float DEFAULT NULL,
  `payment` varchar(200) DEFAULT NULL,
  `note` varchar(500) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `status` int(1) DEFAULT '0',
  `created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `updated_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `bills`
--

INSERT INTO `bills` (`id`, `customer_id`, `date_order`, `total`, `payment`, `note`, `status`, `created_at`, `updated_at`) VALUES
(1, 1, '2019-06-09', 395000, 'COD', '123123', 1, '2019-06-10 00:57:03', '2019-06-10 00:57:03'),
(2, 2, '2019-06-10', 335000, 'COD', '213', 0, '2019-06-09 17:56:22', '2019-06-09 17:55:58'),
(3, 3, '2019-06-10', 2095000, 'COD', '123', 0, '2019-06-10 00:50:35', '2019-06-10 00:50:35'),
(4, 4, '2019-06-10', 125000, 'ATM', '123', 0, '2019-06-10 00:55:27', '2019-06-10 00:55:27');

-- --------------------------------------------------------

--
-- Table structure for table `bill_detail`
--

CREATE TABLE `bill_detail` (
  `id` int(10) UNSIGNED NOT NULL,
  `bill_id` int(10) NOT NULL,
  `product_id` int(10) NOT NULL,
  `quantity` int(11) NOT NULL,
  `unit_price` double NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `bill_detail`
--

INSERT INTO `bill_detail` (`id`, `bill_id`, `product_id`, `quantity`, `unit_price`, `created_at`, `updated_at`) VALUES
(1, 1, 177, 1, 395000, '2019-06-09 10:28:06', '2019-06-09 10:28:06'),
(2, 2, 183, 1, 335000, '2019-06-09 17:23:13', '2019-06-09 17:23:13'),
(3, 3, 25, 1, 1200000, '2019-06-10 00:50:35', '2019-06-10 00:50:35'),
(4, 3, 42, 1, 895000, '2019-06-10 00:50:35', '2019-06-10 00:50:35'),
(5, 4, 176, 1, 125000, '2019-06-10 00:55:27', '2019-06-10 00:55:27');

-- --------------------------------------------------------

--
-- Table structure for table `customer`
--

CREATE TABLE `customer` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(100) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `gender` varchar(10) NOT NULL,
  `email` varchar(50) NOT NULL,
  `address` varchar(100) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `phone_number` varchar(20) NOT NULL,
  `note` varchar(200) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `customer`
--

INSERT INTO `customer` (`id`, `name`, `gender`, `email`, `address`, `phone_number`, `note`, `created_at`, `updated_at`) VALUES
(1, 'Tan Nguyen', 'nam', 'testnew@mailinator.com', '123123', '0987654321', '123123', '2019-06-09 10:28:06', '2019-06-09 10:28:06'),
(2, 'test extra', 'nữ', 'testnew123@mailinator.com', '123', '1234567890', '213', '2019-06-09 17:23:13', '2019-06-09 17:23:13'),
(3, 'Tân Nguyễn', 'nam', 'testnew@mailinator.com', '098765432', '123123', '123', '2019-06-10 00:50:34', '2019-06-10 00:50:34'),
(4, 'BC', 'nữ', 'sdfsa@mail.com', 'kjhsfd', '098765432', '123', '2019-06-10 00:55:27', '2019-06-10 00:55:27');

-- --------------------------------------------------------

--
-- Table structure for table `product`
--

CREATE TABLE `product` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(100) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `type_id` int(10) UNSIGNED DEFAULT NULL,
  `description` text CHARACTER SET utf8 COLLATE utf8_unicode_ci,
  `unit_price` float DEFAULT NULL,
  `promotion_price` float DEFAULT NULL,
  `image` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `product`
--

INSERT INTO `product` (`id`, `name`, `type_id`, `description`, `unit_price`, `promotion_price`, `image`) VALUES
(5, 'Gấu Bông Teddy Nơ Lụa Đại', 1, 'Gấu Bông To', 1250000, 0, 'gau-no-lua-dai-1-300x300.jpg'),
(6, 'Gấu Bông Teddy Ôm Tim Hồng', 1, 'Gấu Bông To', 650000, 635000, 'om-tim-hong-6-300x300.jpg'),
(7, 'Gấu Bông Teddy Ôm Hoa', 1, 'Gấu Bông To', 635000, 0, 'teddy-om-hoa-8-300x300.jpg'),
(8, 'Gấu Bông Teddy Nơ Ôm Hoa Hồng', 1, 'Gấu Bông To', 700000, 695000, 'teddy-no-om-hoa-hong-3-300x300.jpg'),
(9, 'Gấu Bông Teddy Moschino', 1, 'Gấu Bông To', 600000, 595000, 'MG_9275-copy-300x300.jpg'),
(10, 'Gấu Bông Teddy Áo Len Gấu Love', 1, 'Gấu Bông To', 655000, 0, 'teddy-ao-len-gau-love-2-300x300.jpg'),
(11, 'Gấu Bông Teddy Áo Đen Love', 1, 'Gấu Bông To', 1350000, 0, 'teddy-ao-den-love-5-300x300.jpg'),
(12, 'Gấu Bông Teddy Khăn Tim Màu', 1, 'Gấu Bông To', 1200000, 0, 'teddy-khan-tim-mau-3-300x300.jpg'),
(13, 'Gấu Bông Teddy Tim Cờ Mỹ', 1, 'Gấu Bông To', 600000, 595000, 'teddy-tim-co-my-4-300x300.jpg'),
(14, 'Gấu Bông Teddy Bánh Sinh Nhật', 1, 'Gấu Bông To', 600000, 595000, 'teddy-banh-sinh-nhat-3-300x300.jpg'),
(15, 'Gấu Bông Teddy Nơ', 1, 'Gấu Bông To', 400000, 395000, 'teddy-no-3-300x300.jpg'),
(16, 'Gấu Bông Teddy Angel Hồng', 1, 'Gấu Bông To', 600000, 595000, 'teddy-angle-hong-7-300x300.jpg'),
(17, 'Gấu Bông Teddy Angel Tím', 1, 'Gấu Bông To', 425000, 0, 'teddy-angle-tim-5-300x300.jpg'),
(18, 'Gấu Bông Teddy Socola', 1, 'Gấu Bông To', 965000, 0, 'socola-6-300x300.jpg'),
(19, 'Gấu Bông Teddy Logo Baby', 1, 'Gấu Bông To', 700000, 685000, 'teddy-logo-baby-6-300x300.jpg'),
(20, 'Gấu Bông Teddy Áo Kiss Me', 1, 'Gấu Bông To', 700000, 655000, 'teddy-len-kiss-1-300x300.jpg'),
(21, 'Gấu Bông Teddy Nơ Lụa Đại', 2, 'Gấu Bông Teddy giá rẻ', 1250000, 0, 'gau-no-lua-dai-1-300x300.jpg'),
(22, 'Gấu Bông Áo Kẻ', 2, 'Gấu Bông Teddy giá rẻ', 175000, 0, 'gau-ao-ke-4-300x300.jpg'),
(23, 'Gấu Bông Teddy Ôm Tim Hồng', 2, 'Gấu Bông Teddy giá rẻ', 650000, 635000, 'om-tim-hong-6-300x300.jpg'),
(24, 'Gấu Bông Teddy Ôm Hoa', 2, 'Gấu Bông Teddy giá rẻ', 400000, 395000, 'teddy-om-hoa-8-300x300.jpg'),
(25, 'Gấu Bông Teddy Nơ Ôm Hoa Hồng', 2, 'Gấu Bông Teddy giá rẻ', 1200000, 0, 'teddy-no-om-hoa-hong-3-300x300.jpg'),
(26, 'Gấu Bông Teddy Moschino', 2, 'Gấu Bông Teddy giá rẻ', 400000, 395000, 'MG_9275-copy-300x300.jpg'),
(27, 'Gấu Bông Teddy Áo Đen Love', 2, 'Gấu Bông Teddy giá rẻ', 1350000, 0, 'teddy-ao-den-love-5-300x300.jpg'),
(28, 'Gấu Bông Teddy Khăn Tim Màu', 2, 'Gấu Bông Teddy giá rẻ', 1200000, 0, 'teddy-khan-tim-mau-3-300x300.jpg'),
(29, 'Gấu Bông Teddy Tim Cờ Mỹ', 2, 'Gấu Bông Teddy giá rẻ', 600000, 595000, 'teddy-tim-co-my-4-300x300.jpg'),
(30, 'Gấu Bông Teddy Bánh Sinh Nhật', 2, 'Gấu Bông Teddy giá rẻ', 400000, 395000, 'teddy-banh-sinh-nhat-3-300x300.jpg'),
(31, 'Gấu Bông Teddy Nơ', 2, 'Gấu Bông Teddy giá rẻ', 400000, 395000, 'teddy-no-3-300x300.jpg'),
(32, 'Gấu Bông Teddy Angel Hồng', 2, 'Gấu Bông Teddy giá rẻ', 1200000, 0, 'teddy-angle-hong-7-300x300.jpg'),
(33, 'Gấu Bông Teddy Angel Tím', 2, 'Gấu Bông Teddy giá rẻ', 1200000, 0, 'teddy-angle-tim-5-300x300.jpg'),
(34, 'Gấu Bông Teddy Socola', 2, 'Gấu Bông Teddy giá rẻ', 2100000, 0, 'socola-6-300x300.jpg'),
(35, 'Gấu Bông Teddy Logo Baby', 2, 'Gấu Bông Teddy giá rẻ', 1400000, 0, 'teddy-logo-baby-6-300x300.jpg'),
(36, 'Gấu Bông Teddy Áo Kiss Me', 2, 'Gấu Bông Teddy giá rẻ', 800000, 795000, 'teddy-len-kiss-1-300x300.jpg'),
(37, 'Gấu Bông Teddy Ôm Hoa', 3, 'Gấu Bông Teddy giá rẻ', 400000, 395000, 'teddy-om-hoa-8-300x300.jpg'),
(38, 'Gấu Bông Teddy Angel Hồng', 3, 'Gấu Bông Teddy giá rẻ', 1200000, 0, 'teddy-angle-hong-7-300x300.jpg'),
(39, 'Gấu Bông Teddy Socola', 3, 'Gấu Bông Teddy giá rẻ', 2100000, 0, 'socola-6-300x300.jpg'),
(40, 'Gấu Bông Teddy Logo Baby', 3, 'Gấu Bông Teddy giá rẻ', 1400000, 0, 'teddy-logo-baby-6-300x300.jpg'),
(41, 'Gấu Bông Teddy Áo Kiss Me', 3, 'Gấu Bông Teddy giá rẻ', 800000, 795000, 'teddy-len-kiss-1-300x300.jpg'),
(42, 'Gấu Bông Teddy Áo Baymax', 3, 'Gấu Bông Teddy giá rẻ', 900000, 895000, 'teddy-ao-baymax-1-300x300.jpg'),
(43, 'Gấu Bông Teddy Ted Bự', 3, 'Gấu Bông Teddy giá rẻ', 800000, 755000, 'ted-bu-1-300x300.jpg'),
(44, 'Gấu Bông Teddy Head Tales Đại', 3, 'Gấu Bông Teddy giá rẻ', 1050000, 0, 'head-tales-2-300x300.jpg'),
(45, 'Gấu Bông Teddy Váy Nâu', 3, 'Gấu Bông Teddy giá rẻ', 435000, 0, 'teddy-vay-nau-3-300x300.jpg'),
(46, 'Gấu Bông Teddy Áo Len Sao', 3, 'Gấu Bông Teddy giá rẻ', 900000, 795000, 'teddy-ao-len-sao1-300x300.jpg'),
(47, 'Gấu Bông Ted Chấm Chân', 3, 'Gấu Bông Teddy giá rẻ', 835000, 0, 'teddy-cham-chan2-300x300.jpg'),
(48, 'Gấu Bông Teddy Nâu Love', 3, 'Gấu Bông Teddy giá rẻ', 1250000, 0, 'teddy-nau-love-avt-300x300.jpg'),
(49, 'Gấu Bông Teddy Cà Vạt', 3, 'Gấu Bông Teddy giá rẻ', 390000, 0, 'ca-vat-1-300x300.jpg'),
(50, 'Gấu Bông Teddy Đen Xù', 3, 'Gấu Bông Teddy giá rẻ', 1000000, 955000, 'teddy-den-xu-4-300x300.jpg'),
(51, 'Gấu Bông Teddy Head Tales Nhỏ', 3, 'Gấu Bông Teddy giá rẻ', 150000, 145000, 'head-tales3-1-300x300.jpg'),
(52, 'Gấu Bông Teddy Áo Love', 3, 'Gấu Bông Teddy giá rẻ', 900000, 885000, 'teddy-ao-love1-300x300.jpg'),
(53, 'Rilakkuma Cử Nhân', 4, 'Gấu Bông Tốt nghiệp', 155000, 0, 'rila-cu-nhan-3-300x300.jpg'),
(54, 'Gấu Cử Nhân Kính', 4, 'Gấu Bông Tốt nghiệp', 80000, 0, 'cu-nhan-kinh-3-300x300.jpg'),
(55, 'Gấu Cử Nhân Nhỏ', 4, 'Gấu Bông Tốt nghiệp', 80000, 55000, 'gau-cu-nhan-nho-2-300x300.jpg'),
(56, 'Gấu Cử Nhân', 4, 'Gấu Bông Tốt nghiệp', 250000, 235000, 'gau-cu-nhan-5-300x300.jpg'),
(57, 'Gấu Cử Nhân', 4, 'Gấu Bông Tốt nghiệp', 155000, 0, 'gau-cu-nhan-3-300x300.jpg'),
(58, 'Gấu Cử Nhân', 4, 'Gấu Bông Tốt nghiệp', 75000, 0, '139591968065-300x300.jpg'),
(59, 'Chó Bông Shiba Mềm', 5, 'Chó bông', 300000, 295000, 'cho-shiba-mem-7-300x300.jpg'),
(60, 'Chó Nhật Bông', 5, 'Chó bông', 215000, 0, 'cho-nhat-11-300x300.jpg'),
(61, 'Chó Bông Akita Dài', 5, 'Chó bông', 235000, 0, 'cho-akita-dai-5-300x300.jpg'),
(62, 'Chó Bông Áo Xù', 5, 'Chó bông', 165000, 0, 'cho-xu-ao-6-300x300.jpg'),
(63, 'Chó Bông Đầu To', 5, 'Chó bông', 500000, 455000, 'cho-dau-to-8-300x300.jpg'),
(64, 'Chó Puco V Bông', 5, 'Chó bông', 250000, 215000, 'cho-puco-1-300x300.jpg'),
(65, 'Chó Ngao Bông', 5, 'Chó bông', 150000, 135000, 'cho-ngao2-300x300.jpg'),
(66, 'Chó Bông Alaska', 5, 'Chó bông', 200000, 195000, 'husky-5-300x300.jpg'),
(67, 'Chó Cừu Bông', 5, 'Chó bông', 265000, 0, 'cho-cuu-7-300x300.jpg'),
(68, 'Chó Mắt Đốm Mềm', 5, 'Chó bông', 75000, 0, 'cho-mat-dom-mem-3-300x300.jpg'),
(69, 'Chó Bông Party', 5, 'Chó bông', 250000, 245000, 'cho-party-7-300x300.jpg'),
(70, 'Chó Đốm Bông', 5, 'Chó bông', 180000, 155000, 'cho-dom-2-300x300.jpg'),
(71, 'Chó Bông Shiba Cosplay', 5, 'Chó bông', 350000, 335000, 'shiba-cosplay-8-300x300.jpg'),
(72, 'Chó Bông Mũi Tim', 5, 'Chó bông', 250000, 235000, 'mg_7150-300x300.jpg'),
(73, 'Gối Chăn Bông Chó Akita Nằm', 5, 'Chó bông', 355000, 0, 'goi-chan-cho-akita-nam-1-300x300.jpg'),
(74, 'Gối Chăn Bông Chó Akita Đứng', 5, 'Chó bông', 355000, 0, 'goi-chan-cho-akita-dung-1-300x300.jpg'),
(75, 'Mèo Bông Color', 6, 'Mèo bông', 175000, 0, 'meo-color-13-300x300.jpg'),
(76, 'Mèo Bông Mắt Híp', 6, 'Mèo bông', 150000, 135000, 'meo-hip-hong-2-300x300.jpg'),
(77, 'Mèo Bông Dinga Đại', 6, 'Mèo bông', 300000, 285000, 'meo-dinga-3-300x300.jpg'),
(78, 'Mèo Thần Tài Amuse Bông', 6, 'Mèo bông', 230000, 195000, 'meo-than-tai-amuse-1-300x300.jpg'),
(79, 'Mèo Mặt Lớn Bông', 6, 'Mèo bông', 635000, 0, 'meo-mat-lon-14-300x300.jpg'),
(80, 'Gối Bông Mèo Pusheen', 6, 'Mèo bông', 165000, 0, 'goi-meo-pusheen-2-300x300.jpg'),
(81, 'Mèo Bông Mềm Nằm', 6, 'Mèo bông', 250000, 245000, 'meo-mem-nam-6-300x300.jpg'),
(82, 'Gối Chăn Bông Mèo Xù', 6, 'Mèo bông', 380000, 355000, 'goi-chan-meo-xu-1-300x300.jpg'),
(83, 'Mèo Chii Bông', 6, 'Mèo bông', 385000, 0, 'meo-chi2-300x300.jpg'),
(84, 'Mèo Amuse Đại', 6, 'Mèo bông', 200000, 195000, 'meo-amuse-den-3-300x300.jpg'),
(85, 'Mèo Bông Dinga', 6, 'Mèo bông', 255000, 0, 'meo-dinga1-300x300.jpg'),
(86, 'Mèo Chii Nằm Mềm', 6, 'Mèo bông', 165000, 0, 'meo-chii-nam-mem-5-300x300.jpg'),
(87, 'Mèo Chii Bông Nhỏ', 6, 'Mèo bông', 75000, 0, 'mèo-chii-7-300x300.jpg'),
(88, 'Mèo Bông Oggy', 6, 'Mèo bông', 75000, 0, 'meo-oggy-4-300x300.jpg'),
(89, 'Mèo Vàng Mặt Lớn', 6, 'Mèo bông', 225000, 0, 'meo-mat-lon-vang-5-300x300.jpg'),
(90, 'Gối Chăn Mèo Bông', 6, 'Mèo bông', 400000, 395000, 'goi-men-chan-6-300x300.jpg'),
(91, 'Lợn Mũ Khăn Bông', 7, 'Lợn bông', 160000, 145000, 'lon-mu-khan-9-300x300.jpg'),
(92, 'Lợn Bông Mũ Cosplay', 7, 'Lợn bông', 250000, 225000, 'lon-mu-cosplay-3-300x300.jpg'),
(93, 'Lợn Tiktok Bông Đứng', 7, 'Lợn bông', 280000, 265000, 'lon-tiktok-dung-3-300x300.jpg'),
(94, 'Lợn Xù Trắng Bông', 7, 'Lợn bông', 900000, 895000, 'lon-xu-trang-1-300x300.jpg'),
(95, 'Lợn Bông Tròn', 7, 'Lợn bông', 200000, 195000, 'lon-tron-2-300x300.jpg'),
(96, 'Lợn Bông Nằm Cosplay', 7, 'Lợn bông', 275000, 0, 'lon-nam-cosplay-3-300x300.jpg'),
(97, 'Lợn Bông TicTok Nằm', 7, 'Lợn bông', 350000, 335000, 'heo-tiktok-nam-1-300x300.jpg'),
(98, 'Lợn Bông TicTok', 7, 'Lợn bông', 360000, 345000, 'lon-titok-7-300x300.jpg'),
(99, 'Lợn Vương Miện Bông', 7, 'Lợn bông', 300000, 295000, 'lon-vuong-mien-1-300x300.jpg'),
(100, 'Lợn Bông Mũ Yếm', 7, 'Lợn bông', 455000, 0, 'lon-mu-yem-1-1-300x300.jpg'),
(101, 'Lợn Thiên Thần Bông', 7, 'Lợn bông', 295000, 0, 'lon-thien-than-3-300x300.jpg'),
(102, 'Lợn Bông Áo kẻ', 7, 'Lợn bông', 175000, 0, 'lon-ao-ke-1-300x300.jpg'),
(103, 'Lợn Bông Khăn Mềm', 7, 'Lợn bông', 175000, 165000, 'lon-khan-mem-2-300x300.jpg'),
(104, 'Lợn Bông Quả', 7, 'Lợn bông', 250000, 225000, 'Lon-qua-10-300x300.jpg'),
(105, 'Lợn Bông Mềm', 7, 'Lợn bông', 165000, 0, 'lon-bong-mem-2-300x300.jpg'),
(106, 'Lợn Bông Lovely', 7, 'Lợn bông', 300000, 295000, 'lon-lovely-3-300x300.jpg'),
(107, 'Thỏ Bông Má Hồng', 8, 'Thỏ bông', 145000, 0, 'tho-ma-hong-1-300x300.jpg'),
(108, 'Thỏ Bông Trai Gái', 8, 'Thỏ bông', 200000, 195000, 'tho-trai-gai-2-300x300.jpg'),
(109, 'Thỏ Bông Áo Len Love', 8, 'Thỏ bông', 295000, 0, 'tho-ao-len-love-4-300x300.jpg'),
(110, 'Thỏ Váy Bông Hán Quốc', 8, 'Thỏ bông', 250000, 225000, 'tho-vay-han-quoc-1-300x300.jpg'),
(111, 'Thỏ Bông Đôi', 8, 'Thỏ bông', 165000, 0, 'Teddy-banh-14-300x300.jpg'),
(112, 'Gối Chăn Bông Thỏ Molang', 8, 'Thỏ bông', 395000, 0, 'goi-chan-tho-molang-3-300x300.jpg'),
(113, 'Thỏ Cà Rốt Bông', 8, 'Thỏ bông', 190000, 175000, 'tho-ca-rot-5-300x300.jpg'),
(114, 'Thỏ Bông Mắt To', 8, 'Thỏ bông', 350000, 325000, 'tho-mat-to-1-1-300x300.jpg'),
(115, 'Thỏ Bông Mắt Híp', 8, 'Thỏ bông', 95000, 0, 'tho-mat-hip1-155k-265k-300x300.jpg'),
(116, 'Thỏ Bông Áo Len', 8, 'Thỏ bông', 150000, 135000, 'tho-ao-len-2-300x300.jpg'),
(117, 'Thỏ Khăn Bông', 8, 'Thỏ bông', 155000, 0, 'tho-khan-3-1-300x300.jpg'),
(118, 'Thỏ Quả Bông', 8, 'Thỏ bông', 195000, 0, 'Tho-qua-5-300x300.jpg'),
(119, 'Thỏ Xám IKEA Bông', 8, 'Thỏ bông', 355000, 0, 'tho-xam-ikea-avt-300x300.jpg'),
(120, 'Thỏ Bông LeSucre', 8, 'Thỏ bông', 160000, 145000, 'tho-bong-lesurce-8-300x300.jpg'),
(121, 'Gối Thỏ Usagi', 8, 'Thỏ bông', 295000, 0, 'goi-tho-usagi-1-300x300.jpg'),
(122, 'Thỏ Mashimaro', 8, 'Thỏ bông', 120000, 105000, 'tho-mashimaro-1-1-copy-300x300.jpg'),
(123, 'Khỉ Bông Đầu To', 9, 'Khỉ bông', 145000, 0, 'khi-dau-to-5-300x300.jpg'),
(124, 'Khỉ Bông Đại', 9, 'Khỉ bông', 380000, 345000, 'Khi-bong-dai-8-300x300.jpg'),
(125, 'Khỉ Bông Má Hồng', 9, 'Khỉ bông', 125000, 0, 'khi-ma-hong-5-300x300.jpg'),
(126, 'Gối Bông Liên Chăn Khỉ Bông', 9, 'Khỉ bông', 245000, 0, 'goi-lien-chan-33-1-300x300.jpg'),
(127, 'Khỉ Rốn', 9, 'Khỉ bông', 150000, 135000, 'khi-ron-3-300x300.jpg'),
(128, 'Khỉ Nâu', 9, 'Khỉ bông', 150000, 145000, 'khi-nau-4-300x300.jpg'),
(129, 'Khỉ Đôi', 9, 'Khỉ bông', 300000, 295000, 'khi-doi-1-300x300.jpg'),
(130, 'Khỉ Bông Son Oh Gong', 9, 'Khỉ bông', 185000, 0, 'son-oh-gong-4-300x300.jpg'),
(131, 'Khỉ Bông Đứng', 9, 'Khỉ bông', 195000, 0, 'khi-dung-7-300x300.jpg'),
(132, 'Khỉ Cà vạt', 9, 'Khỉ bông', 190000, 185000, 'khi-ca-vat-1-300x300.jpg'),
(133, 'Khỉ Ôm Hoa', 9, 'Khỉ bông', 285000, 0, 'khi-om-hoa-gia-re-300x300.jpg'),
(134, 'Khỉ Bông Ôm Tim', 9, 'Khỉ bông', 450000, 435000, 'khi-om-tim-300x300.jpg'),
(135, 'Khỉ Yếm', 9, 'Khỉ bông', 250000, 245000, 'khi-yem-300x300.jpg'),
(136, 'Khỉ Vui', 9, 'Khỉ bông', 395000, 0, 'khi-vui.jpg'),
(137, 'Khỉ Chuối Bông', 9, 'Khỉ bông', 235000, 0, 'khi-chuoi-300x300.jpg'),
(138, 'Hà Mã Bông Momin Màu', 10, 'Hà mã bông', 335000, 0, 'ha-ma-momin-9-300x300.jpg'),
(139, 'Hà Mã Bông Nằm', 10, 'Hà mã bông', 250000, 235000, 'ha-ma-nam-4-300x300.jpg'),
(140, 'Hà Mã Bông Moomin To', 10, 'Hà mã bông', 255000, 0, 'ha-ma-moomin-to-e1499188137714.jpg'),
(141, 'Hà Mã Bông Ngồi', 10, 'Hà mã bông', 295000, 0, 'gau-bong-ha-ma-ngoi-300x300.jpg'),
(142, 'Hà Mã Bông To', 10, 'Hà mã bông', 350000, 335000, 'ha-ma-to-dep-nhat-300x300.jpg'),
(143, 'Hà Mã Nhiều Màu', 10, 'Hà mã bông', 180000, 165000, 'ha-ma-bong-gia-re-300x300.jpg'),
(144, 'Hà Mã Áo', 10, 'Hà mã bông', 175000, 0, 'ha-ma-ao-300x300.jpg'),
(145, 'Cá Sấu Bông Áo Kẻ', 11, 'Cá bông', 735000, 0, 'ca-sau-ao-ke-17-300x300.jpg'),
(146, 'Cá Nemo Bông', 11, 'Cá bông', 75000, 0, 'Ca-Nemo-1-300x300.jpg'),
(147, 'Cá Sấu Mềm Bông', 11, 'Cá bông', 175000, 0, 'ca-sau-bong-5-300x300.jpg'),
(148, 'Cá Dory Bông', 11, 'Cá bông', 75000, 0, 'Ca-Dory-1-300x300.jpg'),
(149, 'Cá Heo Xanh Bông', 11, 'Cá bông', 200000, 195000, 'ca-heo-7-300x300.jpg'),
(150, 'Cá Mập Mềm Bông', 11, 'Cá bông', 150000, 115000, 'ca-map-mem-5-300x300.jpg'),
(151, 'Cá Ngựa Bông', 11, 'Cá bông', 165000, 0, 'ca-ngua-4-300x300.jpg'),
(152, 'Cá Mập Xanh', 11, 'Cá bông', 295000, 0, 'ca-map-2-300x300.jpg'),
(153, 'Cá Sấu Kute', 11, 'Cá bông', 180000, 165000, 'ca-sau-kute-6-300x300.jpg'),
(154, 'Cá Sấu Tim', 11, 'Cá bông', 295000, 0, 'ca-sau-tim-10-300x300.jpg'),
(155, 'Cá Sấu Áo', 11, 'Cá bông', 395000, 0, 'ca-sau-ao-1-300x300.jpg'),
(156, 'Cá Nemo Mềm', 11, 'Cá bông', 260000, 245000, 'ca-nemo-mem2-300x300.jpg'),
(157, 'Cá Sấu Kute', 11, 'Cá bông', 225000, 0, 'ca-sau-kute1-300x300.jpg'),
(158, 'Cá Mập Xám', 11, 'Cá bông', 195000, 0, 'ca-map-4-300x300.jpg'),
(159, 'Cá Nemo', 11, 'Cá bông', 180000, 165000, 'ca-ne-mo-re-dep-300x300.jpg'),
(160, 'Cá Sấu Bông', 11, 'Cá bông', 295000, 0, 'ca-sau-gia-re-300x300.jpg'),
(161, 'Ngựa Bông Pony', 12, 'Ngựa bông', 145000, 0, 'ngua-pony-du-mau-sac-300x300.jpg'),
(162, 'Kì Lân Chibi Bông', 12, 'Ngựa bông', 350000, 335000, 'ki-lan-chibi-1-300x300.jpg'),
(163, 'Ngựa Một Sừng Unicorn', 12, 'Ngựa bông', 165000, 0, 'ngua-mot-sung-4-300x300.jpg'),
(164, 'Ngựa Bông Unicorn Mềm', 12, 'Ngựa bông', 250000, 245000, 'ngua-unicorn-8-300x300.jpg'),
(165, 'Ngựa Một Sừng', 12, 'Ngựa bông', 180000, 165000, 'ngua-mot-sung-2-300x300.jpg'),
(166, 'Ngựa Baby', 12, 'Ngựa bông', 75000, 0, 'ngua-baby-18-300x300.jpg'),
(174, 'Ngựa Bông', 12, 'Ngựa bông', 225000, 0, 'lua-bong-6-300x300.jpg'),
(175, 'Khủng Long Bông Tròn', 13, 'Khủng long bông', 265000, 0, 'khung-long-tron-14-300x300.jpg'),
(176, 'Khủng Long Bạo Chúa Bông', 13, 'Khủng long bông', 125000, 0, 'khung-long-bao-chua-8-300x300.jpg'),
(177, 'Gối Chăn Bông Khủng Long', 13, 'Khủng long bông', 400000, 395000, 'khung-long-3-300x300.jpg'),
(178, 'Khủng Long Bông Dài', 13, 'Khủng long bông', 325000, 0, 'khung-long-dai-3-300x300.jpg'),
(179, 'Khủng Long Bông Nằm', 13, 'Khủng long bông', 75000, 0, 'khung-long-nam-1-300x300.jpg'),
(180, 'Khủng Long Arlo Bông', 13, 'Khủng long bông', 380000, 355000, 'khung-long-arlo-5-300x300.jpg'),
(181, 'Khủng Long Bông Đứng', 13, 'Khủng long bông', 365000, 0, 'khung-long-3-1-300x300.jpg'),
(182, 'Gấu Trúc Đầu To', 14, 'Gấu trúc bông', 600000, 595000, 'gau-truc-dau-to1-300x300.jpg'),
(183, 'Gấu Trúc Nơ Tim', 14, 'Gấu trúc bông', 350000, 335000, '26-2-300x300.jpg'),
(184, 'Gấu Trúc Đứng', 14, 'Gấu trúc bông', 455000, 0, 'gau-truc-dung-300x300.jpg'),
(185, 'Gấu Trúc Bông Nằm', 14, 'Gấu trúc bông', 145000, 0, 'gau-truc-nam1-300x300.jpg'),
(186, 'Thỏ Nơ Bướm Bông', 15, 'Thú bông nhỏ', 80000, 0, 'thp-qua-8-300x300.jpg'),
(187, 'Chó Xù Bông', 15, 'Thú bông nhỏ', 145000, 0, 'cho-xu5-300x300.jpg'),
(188, 'Thỏ Khăn Bông Nhỏ', 15, 'Thú bông nhỏ', 75000, 0, 'tho-khan-bong-nho-1-300x300.jpg'),
(189, 'Gà Vàng Kute Nhỏ', 15, 'Thú bông nhỏ', 75000, 0, 'thu-bong-nho-30-300x300.jpg'),
(190, 'Chuột Hamster Bông Nhỏ', 15, 'Thú bông nhỏ', 75000, 0, 'chuot-hamster-nho-300x300.jpg'),
(191, 'Vịt Bông Tik Tok', 15, 'Thú bông nhỏ', 75000, 0, 'vit-tik-tok-2-300x300.jpg'),
(192, 'Người Tuyết Bông', 15, 'Thú bông nhỏ', 75000, 0, 'nguoi-tuyet-bong-2-300x300.jpg'),
(193, 'Gấu Bông Big', 15, 'Thú bông nhỏ', 75000, 0, 'gau-big-300x300.jpg'),
(194, 'Mèo Chii Bông Nhỏ', 15, 'Thú bông nhỏ', 75000, 0, 'mèo-chii-7-300x300.jpg'),
(195, 'Lợn Quân Nhân Bông', 15, 'Thú bông nhỏ', 95000, 0, 'lon-quan-nhan-3-300x300.jpg'),
(196, 'Chó Mắt Đốm', 15, 'Thú bông nhỏ', 100000, 85000, 'cho-mat-dom-3-300x300.jpg'),
(197, 'Chó Chuông Baby', 15, 'Thú bông nhỏ', 150000, 125000, 'cho-chuong-baby-4-300x300.jpg'),
(198, 'Chó Bông Tai Xù', 15, 'Thú bông nhỏ', 145000, 0, 'cho-tai-xu-2-300x300.jpg'),
(199, 'Chó Cứu Hộ', 15, 'Thú bông nhỏ', 75000, 0, 'cho-cuu-ho-1-300x300.jpg'),
(200, 'Trứng Lười Gudetama', 15, 'Thú bông nhỏ', 75000, 0, 'trung-luoi-2-300x300.jpg'),
(201, 'Chó Bông Cosplay', 15, 'Thú bông nhỏ', 150000, 125000, 'cho-cosplay-2-300x300.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `slide`
--

CREATE TABLE `slide` (
  `id` int(11) NOT NULL,
  `link` varchar(100) NOT NULL,
  `image` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `slide`
--

INSERT INTO `slide` (`id`, `link`, `image`) VALUES
(1, '', 'banner1.jpg'),
(2, '', 'banner2.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `type_product`
--

CREATE TABLE `type_product` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(100) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `kind` varchar(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `type_product`
--

INSERT INTO `type_product` (`id`, `name`, `kind`) VALUES
(1, 'Gấu bông Teddy to', 'teddy'),
(2, 'Gấu bông Teddy giá rẻ', 'teddy'),
(3, 'Gấu bông Cao cấp', 'teddy'),
(4, 'Gấu bông Tốt nghiệp', 'teddy'),
(5, 'Chó bông', 'animal'),
(6, 'Mèo bông', 'animal'),
(7, 'Lợn bông', 'animal'),
(8, 'Thỏ bông', 'animal'),
(9, 'Khỉ bông', 'animal'),
(10, 'Hà mã bông', 'animal'),
(11, 'Cá bông', 'animal'),
(12, 'Ngựa bông', 'another'),
(13, 'Khủng long bông', 'another'),
(14, 'Gấu trúc bông', 'another'),
(15, 'Thú bông nhỏ', 'another'),
(16, 'Hello Kitty', 'cartoon'),
(17, 'Doremon', 'cartoon'),
(18, 'Shin - Cậu bé bút chì', 'cartoon'),
(19, 'We Bare Bears', 'cartoon'),
(20, 'Pikachu', 'cartoon'),
(21, 'Minions', 'cartoon'),
(22, 'Gấu Pooh', 'cartoon'),
(23, 'Búp bê', 'cartoon'),
(24, 'NV hoạt hình khác', 'cartoon'),
(25, 'Gấu bông QooBee', 'hot'),
(26, 'Gấu brown & Thỏ Cony', 'hot'),
(27, 'Totoro', 'hot'),
(28, 'Stitch', 'hot'),
(29, 'Gấu bông Larva', 'hot'),
(30, 'Kumamon', 'hot'),
(31, 'Kakao Talk', 'hot'),
(32, 'Rilakkuma', 'hot'),
(33, 'Gối cổ bông Chữ U', 'pillow'),
(34, 'Gối chăn- Gối mền', 'pillow'),
(35, 'Gối ôm dài', 'pillow'),
(36, 'Áo choàng', 'nani'),
(37, 'Ghế bông', 'nani');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(10) UNSIGNED NOT NULL,
  `full_name` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `email` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `role` int(1) DEFAULT '0',
  `password` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `phone` varchar(20) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `address` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `remember_token` varchar(100) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `full_name`, `email`, `role`, `password`, `phone`, `address`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'Tan Nguyen', 'admin@admin.com', 1, '$2y$10$e1HbP31pqRZvv2sLz2MhFuvf/mFCvM/TE3P7cTupP7Yzd5bZDA27O', '23456789', 'KTX khu A', NULL, '2017-03-23 00:17:33', '2017-03-23 00:17:33'),
(3, 'TanDepTrai', 'testnew@mailinator.com', 0, '$2y$10$e1HbP31pqRZvv2sLz2MhFuvf/mFCvM/TE3P7cTupP7Yzd5bZDA27O', '123123120', NULL, NULL, '2019-05-30 03:49:58', '2019-05-30 03:49:58');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `bills`
--
ALTER TABLE `bills`
  ADD PRIMARY KEY (`id`),
  ADD KEY `bills_ibfk_1` (`customer_id`);

--
-- Indexes for table `bill_detail`
--
ALTER TABLE `bill_detail`
  ADD PRIMARY KEY (`id`),
  ADD KEY `bill_detail_ibfk_2` (`product_id`);

--
-- Indexes for table `customer`
--
ALTER TABLE `customer`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `product`
--
ALTER TABLE `product`
  ADD PRIMARY KEY (`id`),
  ADD KEY `products_id_type_foreign` (`type_id`);

--
-- Indexes for table `slide`
--
ALTER TABLE `slide`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `type_product`
--
ALTER TABLE `type_product`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `bills`
--
ALTER TABLE `bills`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `bill_detail`
--
ALTER TABLE `bill_detail`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `customer`
--
ALTER TABLE `customer`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `product`
--
ALTER TABLE `product`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=202;

--
-- AUTO_INCREMENT for table `slide`
--
ALTER TABLE `slide`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `type_product`
--
ALTER TABLE `type_product`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=38;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `product`
--
ALTER TABLE `product`
  ADD CONSTRAINT `products_id_type_foreign` FOREIGN KEY (`type_id`) REFERENCES `type_product` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

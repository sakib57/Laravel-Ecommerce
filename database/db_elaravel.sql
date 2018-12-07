-- phpMyAdmin SQL Dump
-- version 4.7.7
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 04, 2018 at 02:16 AM
-- Server version: 10.1.30-MariaDB
-- PHP Version: 7.2.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_elaravel`
--

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2018_05_24_233939_create_admin_table', 1),
(2, '2018_05_26_141941_create_category_table', 2),
(3, '2018_05_28_020732_create_manufacturer_table', 3),
(4, '2018_07_01_231414_create_data_table', 4),
(5, '2018_07_10_131936_create_product_table', 5),
(6, '2018_09_08_082511_create_slider_table', 6);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_admin`
--

CREATE TABLE `tbl_admin` (
  `admin_id` int(10) UNSIGNED NOT NULL,
  `admin_email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `admin_password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `admin_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `admin_phone` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `tbl_admin`
--

INSERT INTO `tbl_admin` (`admin_id`, `admin_email`, `admin_password`, `admin_name`, `admin_phone`, `created_at`, `updated_at`) VALUES
(1, 'sakib@gmail.com', '202cb962ac59075b964b07152d234b70', 'Sakib', '01738719951', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_brand`
--

CREATE TABLE `tbl_brand` (
  `brand_id` int(10) UNSIGNED NOT NULL,
  `brand_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `brand_detail` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `publication_status` int(11) NOT NULL DEFAULT '2',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `tbl_brand`
--

INSERT INTO `tbl_brand` (`brand_id`, `brand_name`, `brand_detail`, `publication_status`, `created_at`, `updated_at`) VALUES
(2, 'Samsung', '						A good electronics brand', 1, NULL, NULL),
(4, 'Dorji Bari', '						Good cloths', 1, NULL, NULL),
(6, 'RFL', 'good plastic product', 1, NULL, NULL),
(7, 'EASY', 'cloths brand', 1, NULL, NULL),
(8, 'Diamond World', 'jewelry products&nbsp;', 1, NULL, NULL),
(9, 'Apex', 'footware', 1, NULL, NULL),
(10, 'Apple', 'good for electronics', 1, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_category`
--

CREATE TABLE `tbl_category` (
  `category_id` int(10) UNSIGNED NOT NULL,
  `category_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `category_description` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `publication_status` tinyint(9) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `tbl_category`
--

INSERT INTO `tbl_category` (`category_id`, `category_name`, `category_description`, `publication_status`, `created_at`, `updated_at`) VALUES
(1, 'Mens Wear', '						dfgdfhbhbth2\r\n					', 0, NULL, NULL),
(2, 'Womens Wear', 'bnfjiopoi gjklo ygulouy8o', 1, NULL, NULL),
(3, 'Chield Wear', 'zdfxzdfg fgjhgfuiku fyki', 1, NULL, NULL),
(7, 'Electronics', 'fgjnfxghnfrxt', 1, NULL, NULL),
(8, 'Sports Wear', 'hdrhd', 1, NULL, NULL),
(9, 'Gadget and gear', 'this is gadget and gear', 1, NULL, NULL),
(10, 'Shoes', 'all shoes', 1, NULL, NULL),
(11, 'Ornaments', 'women ornaments', 1, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_products`
--

CREATE TABLE `tbl_products` (
  `id` int(10) UNSIGNED NOT NULL,
  `product_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `category` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `brand` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `product_price` int(5) NOT NULL,
  `short_desc` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `long_desc` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `image` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `publication_status` tinyint(1) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `tbl_products`
--

INSERT INTO `tbl_products` (`id`, `product_name`, `category`, `brand`, `product_price`, `short_desc`, `long_desc`, `image`, `publication_status`, `created_at`, `updated_at`) VALUES
(1, 'Finger Ring Black', '11', '8', 18500, 'good ring', 'very good ring', '1536391950.jpg', 1, '2018-09-08 07:32:30', '2018-09-08 07:32:30'),
(2, 'Finger Ring Golden', '11', '8', 25600, 'nfcn dhyhrd dyujtyuj', 'jfyhu tyujy tyujtyuj tf tyujyt', '1536392010.jpg', 1, '2018-09-08 07:33:30', '2018-09-08 07:33:30'),
(3, 'Neckeless', '11', '8', 78200, 'good jndfidj jdbsdkjlf', 'sdfsdzjfn jnjfbnlkzsdjf lksjdfszkd', '1536392105.jpg', 1, '2018-09-08 07:35:05', '2018-09-08 07:35:05'),
(4, 'Ear ring', '11', '8', 12600, 'dgdxgbv dfjhjklijo;opk gdx drty drty', 'thyfhj fytujtyiugyikyguv kjykyguikyujkyuj', '1536392151.jpg', 1, '2018-09-08 07:35:51', '2018-09-08 07:35:51'),
(5, 'Saree Black', '2', '4', 8000, 'fhnfdxh dyujyujj tujyj', 'tyutkj uikyugjtf', '1536392234.jpg', 1, '2018-09-08 07:37:14', '2018-09-08 07:37:14'),
(6, 'Saree Red', '2', '4', 7500, 'fgjhhfc drhryh yuyukiuik', 'ukhgk uioiuliyju yiouo', '1536392273.jpg', 1, '2018-09-08 07:37:53', '2018-09-08 07:37:53'),
(7, 'Female Shoe ', '10', '9', 950, 'hjfgjhn ftjtj', 'oipo;klj. ouiliku hjkgyukj', '1536392356.jpg', 1, '2018-09-08 07:39:16', '2018-09-08 07:39:16'),
(8, 'Shoe ', '10', '9', 775, 'hgjgh yuio&nbsp;', 'yuiyguj uiouio', '1536392414.jpg', 1, '2018-09-08 07:40:14', '2018-09-08 07:40:14'),
(9, 'Parfume Deep', '9', '6', 450, 'fgjhnh', 'ghjghj tyjgyhfyhjm&nbsp;', '1536392470.jpg', 1, '2018-09-08 07:41:10', '2018-09-08 07:41:10'),
(10, 'Parfume Light', '9', '6', 665, 'hgjgfj yhkuikguy yguik', 'yhkigyuik fjtyuj ygui', '1536392513.jpg', 1, '2018-09-08 07:41:53', '2018-09-08 07:41:53'),
(11, 'Parfume Medium', '9', '6', 555, 'yujkuyjk yuiyui', 'yug gyuiyuik yguiou', '1536392550.jpg', 1, '2018-09-08 07:42:30', '2018-09-08 07:42:30'),
(12, 'T-Shirt', '1', '7', 650, 'fdgdfxvbgdx ghbfgb', 'dghfgb fhjfghj ghjh', '1536392735.jpg', 1, '2018-09-08 07:45:35', '2018-09-08 07:45:35'),
(13, 'Blaser ', '1', '7', 4500, 'hfgb dghfgch cgfhjfn', 'bn gh bfhjghj fthj', '1536392802.jpg', 1, '2018-09-08 07:46:42', '2018-09-08 07:46:42'),
(14, 'Shirt Formal', '1', '7', 1480, 'ghmghcjn fjuy ft', 'dxfgbdxb ryjyj gyui yguj', '1536392848.jpg', 1, '2018-09-08 07:47:28', '2018-09-08 07:47:28'),
(15, 'i Phone 6', '7', '10', 89000, 'good phone', 'very good phone', '1536812940.jpg', 1, '2018-09-13 04:29:00', '2018-09-13 04:29:00'),
(16, 'i Phone X', '7', '10', 130000, 'more than good', 'sdds dfgh tyjyugk yuik u&nbsp;', '1536812981.jpg', 1, '2018-09-13 04:29:41', '2018-09-13 04:29:41'),
(17, 'Macbook Pro ', '7', '10', 130000, 'ghjg yuiuy yuiui gyuii tuit tuii', 'tyutyu gyuikyugi yguiu ui0ppop[o;ij', '1536813027.jpg', 1, '2018-09-13 04:30:27', '2018-09-13 04:30:27'),
(18, 'Macbook Air', '7', '10', 110000, 'sfgsg gjyu&nbsp;', 'yuiyui uiouo uioi', '1536813058.jpg', 1, '2018-09-13 04:30:58', '2018-09-13 04:30:58');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_slider`
--

CREATE TABLE `tbl_slider` (
  `id` int(10) UNSIGNED NOT NULL,
  `slider_image` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `publication_status` tinyint(1) NOT NULL,
  `created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `tbl_slider`
--

INSERT INTO `tbl_slider` (`id`, `slider_image`, `publication_status`, `created_at`, `updated_at`) VALUES
(2, '1536814049.jpg', 1, '2018-09-13 04:47:29', '2018-09-13 04:47:29'),
(3, '1536814236.jpg', 1, '2018-09-13 04:50:36', '2018-09-13 04:50:36'),
(4, '1536814243.jpg', 1, '2018-09-13 04:50:43', '2018-09-13 04:50:43');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_admin`
--
ALTER TABLE `tbl_admin`
  ADD PRIMARY KEY (`admin_id`);

--
-- Indexes for table `tbl_brand`
--
ALTER TABLE `tbl_brand`
  ADD PRIMARY KEY (`brand_id`);

--
-- Indexes for table `tbl_category`
--
ALTER TABLE `tbl_category`
  ADD PRIMARY KEY (`category_id`);

--
-- Indexes for table `tbl_products`
--
ALTER TABLE `tbl_products`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_slider`
--
ALTER TABLE `tbl_slider`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `tbl_admin`
--
ALTER TABLE `tbl_admin`
  MODIFY `admin_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `tbl_brand`
--
ALTER TABLE `tbl_brand`
  MODIFY `brand_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `tbl_category`
--
ALTER TABLE `tbl_category`
  MODIFY `category_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `tbl_products`
--
ALTER TABLE `tbl_products`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT for table `tbl_slider`
--
ALTER TABLE `tbl_slider`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

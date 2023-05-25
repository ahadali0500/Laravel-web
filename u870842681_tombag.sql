-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: May 25, 2023 at 01:58 PM
-- Server version: 10.6.12-MariaDB-cll-lve
-- PHP Version: 7.2.34

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `u870842681_tombag`
--

-- --------------------------------------------------------

--
-- Table structure for table `adminauth`
--

CREATE TABLE `adminauth` (
  `AdminAuth_id` int(11) NOT NULL,
  `email` varchar(225) NOT NULL,
  `password` varchar(225) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `adminauth`
--

INSERT INTO `adminauth` (`AdminAuth_id`, `email`, `password`) VALUES
(1, 'admin@gmail.com', 'admin');

-- --------------------------------------------------------

--
-- Table structure for table `cart`
--

CREATE TABLE `cart` (
  `id` int(11) NOT NULL,
  `cart_id` varchar(225) NOT NULL,
  `register_id` varchar(225) NOT NULL,
  `product_id` varchar(225) NOT NULL,
  `product_qty` varchar(225) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `category`
--

CREATE TABLE `category` (
  `id` int(11) NOT NULL,
  `category_id` varchar(225) NOT NULL,
  `category_name` varchar(225) NOT NULL,
  `category_status` int(225) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `category`
--

INSERT INTO `category` (`id`, `category_id`, `category_name`, `category_status`) VALUES
(12, '50960', 'Boston Bag', 1),
(13, '31985', 'Accordion Handbag', 1),
(14, '103458', 'Canvas Bag', 1);

-- --------------------------------------------------------

--
-- Table structure for table `contact`
--

CREATE TABLE `contact` (
  `id` int(11) NOT NULL,
  `contact_id` int(11) NOT NULL,
  `first_name` varchar(1000) NOT NULL,
  `phone` varchar(1000) NOT NULL,
  `email_address` varchar(1000) NOT NULL,
  `contact_subject` varchar(1000) NOT NULL,
  `message` varchar(1000) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `contact`
--

INSERT INTO `contact` (`id`, `contact_id`, `first_name`, `phone`, `email_address`, `contact_subject`, `message`) VALUES
(3, 1034, 'Ahad', '8632863273232', 'ahadali0500@gmail.com', 'test', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry'),
(4, 22, 'Razi Ur Rehman', '+923204862761', 'razirao588@gmail.com', 'complain', 'delivery issue');

-- --------------------------------------------------------

--
-- Table structure for table `order`
--

CREATE TABLE `order` (
  `id` int(11) NOT NULL,
  `order_id` varchar(225) NOT NULL,
  `user_id` varchar(255) NOT NULL,
  `order_first_name` varchar(225) NOT NULL,
  `order_last_name` varchar(225) NOT NULL,
  `order_company_name` varchar(225) NOT NULL,
  `order_conutry` varchar(225) NOT NULL,
  `order_street_address` varchar(225) NOT NULL,
  `order_state` varchar(225) NOT NULL,
  `order_city` varchar(1000) NOT NULL,
  `order_zip_code` varchar(225) NOT NULL,
  `order_phone` varchar(225) NOT NULL,
  `order_order_note` longtext NOT NULL,
  `order_total` varchar(225) NOT NULL,
  `order_status` varchar(225) NOT NULL,
  `order_date` varchar(225) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `order`
--

INSERT INTO `order` (`id`, `order_id`, `user_id`, `order_first_name`, `order_last_name`, `order_company_name`, `order_conutry`, `order_street_address`, `order_state`, `order_city`, `order_zip_code`, `order_phone`, `order_order_note`, `order_total`, `order_status`, `order_date`) VALUES
(20, 'ord-54068359', '8800948', 'Austin', 'Moses', 'Griffin and Clements Trading', 'Aut mollit corrupti', '842 South White Second Lane', 'Fugiat natus unde e', 'Ab aliquam minim mol', '64924', '141', 'ghg', '11108', 'delivered', '05/07/2023'),
(21, 'ord-62564282', '8347361', 'M ILYAS', 'ILYAS', 'WEB', 'PAKISTAN', 'PAKPATTAN', 'PUNJAB', 'PAKPATTAN', '57000', '03257580940', 'OKKK', '2000', 'pending', '05/10/2023'),
(22, 'ord-34858738', '8800948', 'Austin', 'Moses', 'Griffin and Clements Trading', 'Aut mollit corrupti', '842 South White Second Lane', 'Fugiat natus unde e', 'Ab aliquam minim mol', '64924', '141', 'kk', '6250', 'shipped', '05/14/2023'),
(23, 'ord-16098702', '5719713', 'Razi', 'Ur Rehman', 'student', 'Pakistan', 'House#73 chak 85/6-R Bashir Town Sahiwal, House#73 chak 85/6-R Bashir Town Sahiwal', 'Punjab', 'Sahiwal', '57000', '+923204862761', 'good', '1500', 'delivered', '05/25/2023'),
(24, 'ord-45866376', '5719713', 'Razi', 'Ur Rehman', 'student', 'Pakistan', 'House#73 chak 85/6-R Bashir Town Sahiwal, House#73 chak 85/6-R Bashir Town Sahiwal', 'Punjab', 'Sahiwal', '57000', '+923204862761', 'GOOD', '1000', 'delivered', '05/25/2023'),
(25, 'ord-86537537', '5719713', 'Razi', 'Ur Rehman', 'student', 'Pakistan', 'House#73 chak 85/6-R Bashir Town Sahiwal, House#73 chak 85/6-R Bashir Town Sahiwal', 'Punjab', 'Sahiwal', '57000', '+923204862761', 'kindly deliver on time', '2400', 'shipped', '05/25/2023'),
(26, 'ord-90453717', '5719713', 'Razi', 'Ur Rehman', 'student', 'Pakistan', 'House#73 chak 85/6-R Bashir Town Sahiwal, House#73 chak 85/6-R Bashir Town Sahiwal', 'Punjab', 'Sahiwal', '57000', '+923204862761', 'good', '1500', 'pending', '05/25/2023');

-- --------------------------------------------------------

--
-- Table structure for table `order_detail`
--

CREATE TABLE `order_detail` (
  `id` int(11) NOT NULL,
  `order_id` varchar(225) NOT NULL,
  `order_product_id` varchar(225) NOT NULL,
  `order_product_qty` varchar(225) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `order_detail`
--

INSERT INTO `order_detail` (`id`, `order_id`, `order_product_id`, `order_product_qty`) VALUES
(22, 'ord-54068359', '5237306', '2'),
(23, 'ord-62564282', '9207203', '2'),
(24, 'ord-34858738', '5003902', '5'),
(25, 'ord-16098702', '6537233', '1'),
(26, 'ord-45866376', '9207203', '1'),
(27, 'ord-86537537', '7241421', '1'),
(28, 'ord-90453717', '6537233', '1');

-- --------------------------------------------------------

--
-- Table structure for table `product`
--

CREATE TABLE `product` (
  `id` int(11) NOT NULL,
  `product_category` varchar(225) NOT NULL,
  `product_id` int(225) NOT NULL,
  `product_name` varchar(225) NOT NULL,
  `product_sku` varchar(225) NOT NULL,
  `product_price` varchar(225) NOT NULL,
  `product_qty` int(225) NOT NULL,
  `product_mrp` varchar(225) NOT NULL,
  `product_imagea` varchar(225) NOT NULL,
  `product_imageb` varchar(225) NOT NULL,
  `product_short_des` longtext NOT NULL,
  `product_long_des` longtext NOT NULL,
  `product_status` varchar(225) NOT NULL,
  `inventry_status` varchar(225) NOT NULL DEFAULT 'active'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `product`
--

INSERT INTO `product` (`id`, `product_category`, `product_id`, `product_name`, `product_sku`, `product_price`, `product_qty`, `product_mrp`, `product_imagea`, `product_imageb`, `product_short_des`, `product_long_des`, `product_status`, `inventry_status`) VALUES
(9, '50960', 5332642, 'blue shopping bag', '123', '5000', 23, '4000', '1599013893.jpg', '508955939.jpg', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s,', 'when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged.', '1', 'active'),
(10, '31985', 5237306, 'school laeather bag', '234', '5554', 43, '5000', '1048330909.jpg', '1384395034.jpg', 'when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged.', 'when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged.', '1', 'active'),
(11, '103458', 9207203, 'Ladies bag', '544', '1000', 12, '2500', '266480975.jpg', '1035094514.jpg', 'when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged.', 'when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged.', '1', 'active'),
(12, '50960', 7782864, 'leather bag', '544', '3000', 12, '2500', '1084439702.jpg', '297475661.jpg', 'when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged.', 'when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged.', '1', 'active'),
(13, '31985', 6537233, 'Handsome Handbag', 'HandsomeHandbag-43', '1500', 50, '1800', '294947741.jpg', '727372443.jpg', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry.', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged.', '1', 'active'),
(14, '50960', 5003902, 'stylimo bag', 'stylimobag-442', '1250', 23, '1498', '412199574.jpg', '2082481832.jpg', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged.', '1', 'active'),
(15, '31985', 7241421, 'Leather Shoulder bag', 'Leather-Shoulder-bag-8399', '2400', 4, '2700', '278953680.jpg', '1387766861.jpg', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.\r\n\r\nWhy do we use it?\r\nIt is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout. The point of using Lorem Ipsum is that it has a more-or-less normal distribution of letters, as opposed to using \'Content here, content here\', making it look like readable English. Many desktop publishing packages and web page editors now use Lorem Ipsum as their default model text, and a search for \'lorem ipsum\' will uncover many web sites still in their infancy. Various versions have evolved over the years, sometimes by accident, sometimes on purpose (injected humour and the like).\r\n\r\n\r\nWhere does it come from?\r\nContrary to popular belief, Lorem Ipsum is not simply random text. It has roots in a piece of classical Latin literature from 45 BC, making it over 2000 years old. Richard McClintock, a Latin professor at Hampden-Sydney College in Virginia, looked up one of the more obscure Latin words, consectetur, from a Lorem Ipsum passage, and going through the cites of the word in classical literature, discovered the undoubtable source. Lorem Ipsum comes from sections 1.10.32 and 1.10.33 of \"de Finibus Bonorum et Malorum\" (The Extremes of Good and Evil) by Cicero, written in 45 BC. This book is a treatise on the theory of ethics, very popular during the Renaissance. The first line of Lorem Ipsum, \"Lorem ipsum dolor sit amet..\", comes from a line in section 1.10.32.\r\n\r\nThe standard chunk of Lorem Ipsum used since the 1500s is reproduced below for those interested. Sections 1.10.32 and 1.10.33 from \"de Finibus Bonorum et Malorum\" by Cicero are also reproduced in their exact original form, accompanied by English versions from the 1914 translation by H. Rackham.\r\n\r\nWhere can I get some?\r\nThere are many variations of passages of Lorem Ipsum available, but the majority have suffered alteration in some form, by injected humour, or randomised words which don\'t look even slightly believable. If you are going to use a passage of Lorem Ipsum, you need to be sure there isn\'t anything embarrassing hidden in the middle of text. All the Lorem Ipsum generators on the Internet tend to repeat predefined chunks as necessary, making this the first true generator on the Internet. It uses a dictionary of over 200 Latin words, combined with a handful of model sentence structures, to generate Lorem Ipsum which looks reasonable. The generated Lorem Ipsum is therefore always free from repetition, injected humour, or non-characteristic words etc.', '1', 'active');

-- --------------------------------------------------------

--
-- Table structure for table `product_image`
--

CREATE TABLE `product_image` (
  `id` int(11) NOT NULL,
  `product_id` varchar(225) NOT NULL,
  `product_image` varchar(225) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `product_image`
--

INSERT INTO `product_image` (`id`, `product_id`, `product_image`) VALUES
(26, '5332642', '943297164.jpg'),
(27, '5332642', '335680326.jpg'),
(28, '5332642', '826038236.jpg'),
(29, '5237306', '243400128.jpg'),
(30, '5237306', '729463932.jpg'),
(31, '9207203', '871365394.jpg'),
(32, '9207203', '186825733.jpg'),
(33, '9207203', '408842640.jpg'),
(34, '7782864', '635854258.jpg'),
(35, '7782864', '544782049.jpg'),
(36, '7782864', '205470515.jpg'),
(37, '6537233', '436707652.jpg'),
(38, '5003902', '723984828.jpg'),
(39, '5003902', '963109371.jpg'),
(40, '7241421', '714276142.jpg'),
(41, '7241421', '512418837.jpg'),
(42, '7241421', '164398796.jpg'),
(43, '7241421', '432452197.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `register`
--

CREATE TABLE `register` (
  `id` int(11) NOT NULL,
  `register_id` int(225) NOT NULL,
  `register_aboutyou` varchar(225) NOT NULL,
  `register_website` varchar(225) DEFAULT NULL,
  `register_taxid` varchar(225) NOT NULL,
  `register_email` varchar(225) NOT NULL,
  `register_password` varchar(1200) NOT NULL,
  `register_firstname` varchar(225) NOT NULL,
  `register_lastname` varchar(225) NOT NULL,
  `register_company` varchar(225) NOT NULL,
  `register_number` varchar(225) NOT NULL,
  `register_address1` varchar(225) NOT NULL,
  `register_address2` varchar(225) NOT NULL,
  `register_city` varchar(225) NOT NULL,
  `register_state` varchar(225) NOT NULL,
  `register_zipcode` varchar(225) NOT NULL,
  `register_country` varchar(225) NOT NULL,
  `register_find` varchar(225) NOT NULL,
  `register_newsletter` varchar(225) NOT NULL DEFAULT 'off',
  `register_status` varchar(225) DEFAULT '0',
  `fp_id` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `register`
--

INSERT INTO `register` (`id`, `register_id`, `register_aboutyou`, `register_website`, `register_taxid`, `register_email`, `register_password`, `register_firstname`, `register_lastname`, `register_company`, `register_number`, `register_address1`, `register_address2`, `register_city`, `register_state`, `register_zipcode`, `register_country`, `register_find`, `register_newsletter`, `register_status`, `fp_id`) VALUES
(9, 8800948, 'Null', 'Null', 'Null', 'ahadali0500@gmail.com', 'eyJpdiI6IldHWloxVjQwM2kzTVhkcTVzVjRqSWc9PSIsInZhbHVlIjoid0RSQXFTK0xERWdKWllEQ1RuTk9mdz09IiwibWFjIjoiYWVlMDhmMjE0YTYyYzc3MDg1ZTBiY2NlMWNlYWI5MDkwNGZhMjk3ZTViMmM1ZTQxYmVlZjRiNmY5ODI5NmJhMSIsInRhZyI6IiJ9', 'Austin', 'Moses', 'Griffin and Clements Trading', '141', '842 South White Second Lane', 'Aute et aute laudant', 'Ab aliquam minim mol', 'Fugiat natus unde e', '64924', 'Aut mollit corrupti', 'socialmedia', 'on', 'Approve', 'fp_10738670'),
(10, 10302416, 'Null', 'Null', 'Null', 'khansahib148684@gmail.com', 'eyJpdiI6IkQveVJ5Ump3MXNEZjhJaitNajRFc3c9PSIsInZhbHVlIjoiVE51V2JOek5ISGt6V2RaMnJQbVVHTDBIQS90TlVHeVlzTktsSUQyTVhGaz0iLCJtYWMiOiI5MDhiY2QyZTQ1OTFkZjkzZjE4YWRkYWI2ZWE3OWFiZTFkZDNmNTVkYjczOTFiOTkzYTZiOGZjZmYxMWI4Njg4IiwidGFnIjoiIn0=', 'Raheel', 'Khan', 'Student', '03178240134', '134 9l sahiwal', 'Sahiwal', 'Sahiwal', 'Asia', '57000', 'Pakistan', 'websearch', 'off', 'Approve', NULL),
(11, 7505744, 'Null', 'Null', 'Null', 'shanzakhalid000786000@gmail.com', 'eyJpdiI6IkxkQVRSQkJRMkYwSlhqVE9LcXFWWkE9PSIsInZhbHVlIjoiQXJRYldySjBBUUpzNndyaVNDay9zdz09IiwibWFjIjoiNDU2ZTgxNWVmODQ4YWNhNDhlODlkYmI5M2RkOTUyZmNhNzE4OWI4NTdlN2NkYmY3M2E3OTYwMGFkZDYzZGY4YSIsInRhZyI6IiJ9', 'Shanza Khalid', 'Muhammad Khalid javed', 'Daraz', '03265179002', '95', '95', 'Sahiwal', 'Punjab', '57000', 'Pakistan', 'websearch', 'on', 'Approve', NULL),
(12, 8347361, 'Null', 'Null', 'Null', 'mhmdalyasalyas36@gmail.com', 'eyJpdiI6ImYvSGJKYUR6NkZ0MVJmWFNWT2hHaXc9PSIsInZhbHVlIjoibjk5Z0E0OU1wVHRtcStJOGFaWm5WUT09IiwibWFjIjoiN2RlOTJmN2ViYzJmOTM1MTNhMzk5ZjZmZTNhMGI5ZWRmMDI2MzEzNjIzOGVkZDBkYzhiOTk3MTc2MzgzYmIxMSIsInRhZyI6IiJ9', 'M ILYAS', 'ILYAS', 'WEB', '03257580940', 'PAKPATTAN', 'RAMPUR', 'PAKPATTAN', 'PUNJAB', '57000', 'PAKISTAN', 'socialmedia', 'on', 'Approve', NULL),
(13, 5719713, 'Null', 'Null', 'Null', 'razirao588@gmail.com', 'eyJpdiI6IkJwUDVGQ2xLT2pUTnQ1enRLNlFwQVE9PSIsInZhbHVlIjoidkhRVWJvVmRWTDZ3ZnViUzZ5UHJ5RXBzMk9RanFRclE0eThjMm5udFFSVT0iLCJtYWMiOiJmYzVjMTQ2OTM3MzMzODhiZDk2NDA0NGQyOTA2NDEzYzg3YjlkMTcxNjA1ZjE1MzlkZDQ0NjJiMzViMjlkODNiIiwidGFnIjoiIn0=', 'Razi', 'Ur Rehman', 'student', '+923204862761', 'House#73 chak 85/6-R Bashir Town Sahiwal, House#73 chak 85/6-R Bashir Town Sahiwal', 'House#73 chak 85/6-R Bashir Town Sahiwal', 'Sahiwal', 'Punjab', '57000', 'Pakistan', 'websearch', 'on', 'Approve', NULL),
(14, 8149210, 'Null', 'Null', 'Null', 'm.amjid1904@gmail.com', 'eyJpdiI6IlhZYll2TGNzNHNUaGZ5TWk3RlFWUXc9PSIsInZhbHVlIjoiMi9MY0Q2d3I0NEZLaE9uUzJmRzdMekpHNjBGT0pHOXdnai9SUFR1cnJPND0iLCJtYWMiOiIyYjhhZDRhMjJjYTUyOTQ5YjBlYTE3NDY5OGE2ZjIzZDgzYmQ1MTI3N2M0YjUzYjdlM2ExOGNhOWRlZThiYzdjIiwidGFnIjoiIn0=', 'muhammad', 'amjad', 'teacher', '03066585571', 'Tariq-bin-zayad', 'lala-zar', 'Shaiwal', 'punjab', '57000', 'pakistan', 'websearch', 'on', '0', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `slider`
--

CREATE TABLE `slider` (
  `id` int(11) NOT NULL,
  `slider_id` varchar(225) NOT NULL,
  `slider_title` varchar(225) NOT NULL,
  `slider_heading` varchar(225) NOT NULL,
  `slider_link` varchar(225) NOT NULL,
  `slider_image` varchar(225) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `slider`
--

INSERT INTO `slider` (`id`, `slider_id`, `slider_title`, `slider_heading`, `slider_link`, `slider_image`) VALUES
(10, '102', 'RZ RAO', 'LAPTOP BAG FOR UNIVERSITY STUDENTS', 'https://www.daraz.pk/catalog/?q=LAPTOP+BAGS&_keyori=ss&from=input&spm=a2o2r4.tm800125353.search.go.4fc173924cNgiO', '2078325493.webp'),
(11, '1', 'Laptops by M.Amjad', 'premium propuct', 'https://www.aliexpress.com/w/wholesale-laptop.html?catId=0&initiative_id=SB_20230525003733&SearchText=laptop&spm=a2g0o.best.1000002.0', '4499299.jpg'),
(12, '15', 'Ahad Ali', 'Leather bag for university students', 'https://www.amazon.com/s?k=larather+bag&crid=2WUND3KXYW393&sprefix=larather+bag%2Caps%2C456&ref=nb_sb_noss_2', '312434196.jpg');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `adminauth`
--
ALTER TABLE `adminauth`
  ADD PRIMARY KEY (`AdminAuth_id`);

--
-- Indexes for table `cart`
--
ALTER TABLE `cart`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `category`
--
ALTER TABLE `category`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `contact`
--
ALTER TABLE `contact`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `order`
--
ALTER TABLE `order`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `order_detail`
--
ALTER TABLE `order_detail`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `product`
--
ALTER TABLE `product`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `product_image`
--
ALTER TABLE `product_image`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `register`
--
ALTER TABLE `register`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `slider`
--
ALTER TABLE `slider`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `adminauth`
--
ALTER TABLE `adminauth`
  MODIFY `AdminAuth_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `cart`
--
ALTER TABLE `cart`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=77;

--
-- AUTO_INCREMENT for table `category`
--
ALTER TABLE `category`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `contact`
--
ALTER TABLE `contact`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `order`
--
ALTER TABLE `order`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;

--
-- AUTO_INCREMENT for table `order_detail`
--
ALTER TABLE `order_detail`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=29;

--
-- AUTO_INCREMENT for table `product`
--
ALTER TABLE `product`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `product_image`
--
ALTER TABLE `product_image`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=44;

--
-- AUTO_INCREMENT for table `register`
--
ALTER TABLE `register`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `slider`
--
ALTER TABLE `slider`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

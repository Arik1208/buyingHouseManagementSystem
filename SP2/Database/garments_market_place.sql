-- phpMyAdmin SQL Dump
-- version 5.0.3
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 05, 2020 at 02:54 PM
-- Server version: 10.4.14-MariaDB
-- PHP Version: 7.4.11

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `garments_market_place`
--

-- --------------------------------------------------------

--
-- Table structure for table `buyers`
--

CREATE TABLE `buyers` (
  `buyer_id` int(50) NOT NULL,
  `name` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `phone` varchar(50) NOT NULL,
  `company_name` varchar(50) NOT NULL,
  `address` varchar(50) NOT NULL,
  `nid` varchar(50) NOT NULL,
  `identification_id` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `buyers`
--

INSERT INTO `buyers` (`buyer_id`, `name`, `email`, `phone`, `company_name`, `address`, `nid`, `identification_id`, `password`) VALUES
(501, 'John Wick', 'johnwick@gmail.com', '+0232546573', 'ZARA', 'Municipality of Arteixo, Spain', '5684409832', '554767344377', 'johnwick'),
(502, 'Cristiano Ronaldo', 'c.ronaldo@gmail.com', '03856503193', 'CR7', 'Turin, Italy', '03656503193', '03846503193', 'c.ronaldo7');

-- --------------------------------------------------------

--
-- Table structure for table `garments_information`
--

CREATE TABLE `garments_information` (
  `license_id` int(50) NOT NULL,
  `gname` varchar(50) NOT NULL,
  `address` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `country` varchar(255) NOT NULL,
  `phone` varchar(255) NOT NULL,
  `website` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `garments_information`
--

INSERT INTO `garments_information` (`license_id`, `gname`, `address`, `email`, `country`, `phone`, `website`, `password`) VALUES
(1234506565, 'Epyllion Group', 'NINAKABBO 227/A  Level: 12-13,Tejgaon-Gulshan Link', 'info@epylliongroup.com', 'Bangladesh', '+8802 9840223', 'www.epylliongroup.com', 'epylliongroup'),
(1343655398, 'Ha-meem Group', 'Phoenix Tower (4th Floor) 407, Tejgaon Industrial ', 'delwerp2000@yahoo.com', 'Bangladesh', '+880-2-8170623', 'http://www.hameemgroup.net/', 'hameemgroup'),
(2147483647, 'BEXIMCO Fashions Ltd.', '17 Dhanmondi R/A, Road No. 2, Dhaka-1205, Banglade', 'beximcochq@beximco.net', 'Bangladesh', '880-2-8618220', 'http://beximcofashions.com/', 'beximco220');

-- --------------------------------------------------------

--
-- Table structure for table `login`
--

CREATE TABLE `login` (
  `id` int(50) NOT NULL,
  `email` varchar(30) NOT NULL,
  `password` varchar(40) NOT NULL,
  `u_type` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `login`
--

INSERT INTO `login` (`id`, `email`, `password`, `u_type`) VALUES
(6, 'delwerp2000@yahoo.com', 'hameemgroup', 'garment'),
(7, 'beximcochq@beximco.net', 'beximco220', 'garment'),
(8, 'info@epylliongroup.com', 'epylliongroup', 'garment'),
(9, 'johnwick@gmail.com', 'johnwick', 'buyer'),
(10, 'c.ronaldo@gmail.com', 'c.ronaldo7', 'buyer');

-- --------------------------------------------------------

--
-- Table structure for table `offers`
--

CREATE TABLE `offers` (
  `o_id` int(255) NOT NULL,
  `name` varchar(500) CHARACTER SET latin1 NOT NULL,
  `image` varchar(255) CHARACTER SET latin1 NOT NULL,
  `buyer_email` varchar(255) CHARACTER SET latin1 NOT NULL,
  `quantity` int(255) DEFAULT NULL,
  `price` double(255,4) DEFAULT NULL,
  `colour` varchar(255) CHARACTER SET latin1 NOT NULL,
  `details` text CHARACTER SET latin1 NOT NULL,
  `size` varchar(255) CHARACTER SET latin1 NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `offers`
--

INSERT INTO `offers` (`o_id`, `name`, `image`, `buyer_email`, `quantity`, `price`, `colour`, `details`, `size`) VALUES
(2, 'Cotton-blend hoodie', '9_1604579726.png', 'johnwick@gmail.com', 1000, 20.5000, 'Orange', 'Top in soft sweatshirt fabric made from a cotton blend with a jersey-lined hood, gently dropped shoulders, long sleeves and ribbing at the cuffs and hem.\r\n\r\nComposition\r\n\r\n        Shell: Cotton 80%, Polyester 20%Hood: Cotton 100%', '0-2Y,2-4Y, 4-6Y'),
(3, 'Printed Ninja sweat shirt', '9_1604580043.png', 'johnwick@gmail.com', 20000, 25.4500, 'Light Gray', 'Long-sleeved top in soft, printed sweatshirt fabric with ribbing around the neckline, cuffs and hem. Soft brushed inside.\r\n\r\nComposition\r\n\r\n        Cotton 80%, Polyester 20%Elastic rib: Cotton 95%, Elastane 5%', '0-2Y,2-4Y, 4-6Y'),
(4, 'Fine-knit jumper', '9_1604580127.png', 'johnwick@gmail.com', 5000, 24.4000, 'Gray', 'Jumper in soft, fine-knit cotton with long sleeves and ribbing around the neckline, cuffs and hem.\r\n\r\nComposition\r\nCotton 100%', '0-2Y,2-4Y, 4-6Y'),
(5, 'Oversized printed T-shirt', '10_1604581522.png', 'c.ronaldo@gmail.com', 6000, 35.5000, 'Light beige', 'Oversized T-shirt in soft cotton jersey with a print motif on the front, a round, ribbed neckline and gently dropped shoulders.', 'L,XL,XXL'),
(6, 'Jacquard-knit jumper', '10_1604581800.png', 'c.ronaldo@gmail.com', 1200, 40.5000, 'Red/Mickey Mouse', 'umper in a soft jacquard knit containing some wool with dropped shoulders, long sleeves and ribbing around the neckline, cuffs and hem.', 'L,XL,XXL'),
(7, 'Cotton shirt', '10_1604581909.png', 'c.ronaldo@gmail.com', 3000, 30.0000, 'Red/Black checked', 'Straight-cut shirt in a cotton weave with a collar, buttons down the front and yoke with a pleat at the back. Open chest pocket, long sleeves with buttoned cuffs, and a rounded hem. Slightly longer at the back.\r\n\r\nWeight\r\n    0.2 KG', 'L,XL,XXL');

-- --------------------------------------------------------

--
-- Table structure for table `order_info`
--

CREATE TABLE `order_info` (
  `order_id` int(64) NOT NULL,
  `product_id` int(64) DEFAULT NULL,
  `quantity` int(64) DEFAULT NULL,
  `total_price` double(64,4) DEFAULT NULL,
  `address` text NOT NULL,
  `buyer_email` varchar(250) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `order_info`
--

INSERT INTO `order_info` (`order_id`, `product_id`, `quantity`, `total_price`, `address`, `buyer_email`) VALUES
(14, 30, 500, 17500.0000, ' Turin,Spain', 'c.ronaldo@gmail.com'),
(15, 28, 10000, 500000.0000, ' Madrid,Spain', 'c.ronaldo@gmail.com'),
(16, 27, 20000, 1600000.0000, ' Paris,France', 'c.ronaldo@gmail.com'),
(17, 31, 10000, 325000.0000, ' London,England', 'johnwick@gmail.com'),
(18, 29, 5000, 200000.0000, 'Dhanmondi,Dhaka,Bangladesh ', 'johnwick@gmail.com');

-- --------------------------------------------------------

--
-- Table structure for table `product_info`
--

CREATE TABLE `product_info` (
  `p_id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `description` text NOT NULL,
  `image` varchar(500) NOT NULL,
  `price` double NOT NULL,
  `colour` text NOT NULL,
  `size` text NOT NULL,
  `min_order` int(50) NOT NULL,
  `gname` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `product_info`
--

INSERT INTO `product_info` (`p_id`, `name`, `description`, `image`, `price`, `colour`, `size`, `min_order`, `gname`, `email`) VALUES
(23, 'SLIM FIT DENIM OVERDYE SHIRT', 'This classic cotton denim shirt has a slim fit and is overdyed, to be finished off with CR7 logo tape on the side. ', '8_1604576625.png', 90, 'Red', 'S,M,L,XL,XXL', 500, 'Epyllion Group', 'info@epylliongroup.com'),
(24, 'REGULAR FIT RAGLAN JACQUARD PULLOVER WITH LOGO DESIGN', 'A crew neck with raglan sleeve pullover in a viscose blend. This pullover has a regular fit and our CR7 logo jacquard knitted on the chest. ', '8_1604576935.png', 80, 'Navy', 'S,M,L,XL,XXL', 1000, 'Epyllion Group', 'info@epylliongroup.com'),
(25, 'Slim fit classic crew neck pullover', 'A classic cotton crew neck pullover with a slim fit. This item has been irregularly dyed to create a faded effect and has a CR7 logo tape on the side. ', '8_1604577029.png', 95, 'Cobalt', 'S,M,L,XL,XXL', 1500, 'Epyllion Group', 'info@epylliongroup.com'),
(26, 'Trucker jacket with CR7 logo in bright indigo stretch denim', 'Our bright indigo cotton trucker jacket has a worn look and is made with an embroidered CR7 logo on the back. ', '6_1604577301.png', 75, 'Vibrant Blue', 'L,XL,XXL', 20000, 'Ha-meem Group', 'delwerp2000@yahoo.com'),
(27, 'STRAIGHT FIT JEANS IN BRIGHT INDIGO STRETCH DENIM', 'These straight fit jeans are designed with a little bit of stretch and have a comfortable fit. They are bright indigo and have a lightly used effect.', '6_1604577441.png', 80, 'Vibrant Blue', 'W28/L30 , W29/30, W30/L30, W31/31', 10000, 'Ha-meem Group', 'delwerp2000@yahoo.com'),
(28, 'REGULAR FIT SHORT SLEEVE SHIRT WITH CAMOUFLAGE PRINT', 'A short sleeve shirt in red camouflage printed viscose fabric. This shirt has a regular fit, button closure and our CR7 logo tape on the sideseam. ', '6_1604577577.png', 50, 'RED CAMOUFLAGE', 'M,L,XL,XXL', 10000, 'Ha-meem Group', 'delwerp2000@yahoo.com'),
(29, 'Fleece hoodie', 'Long-sleeved hoodie in soft fleece. Double-layered drawstring hood with a wrapover front, a kangaroo pocket and covered elastication at the cuffs and hem.  Weight  0.61 KG, Composition   Polyester 100%', '7_1604578401.png', 40, 'Light beige', 'S,M,L,XL,XXL', 500, 'BEXIMCO Fashions Ltd.', 'beximcochq@beximco.net'),
(30, 'Cotton-blend hoodie', 'Top in soft sweatshirt fabric made from a cotton blend with a jersey-lined hood, gently dropped shoulders, long sleeves and ribbing at the cuffs and hem.  Weight     0.22 KG Composition          Cotton 80%, Polyester 20%', '7_1604578901.png', 35, 'Yellow', '2-4Y, 4-6Y', 400, 'BEXIMCO Fashions Ltd.', 'beximcochq@beximco.net'),
(31, 'Printed sweat shirt', 'Long-sleeved top in soft, printed sweatshirt fabric with ribbing around the neckline, cuffs and hem. Soft brushed inside.  Weight     0.12 KG Composition    Cotton 83%, Polyester 17%', '7_1604579049.png', 32.5, 'Blue/Paw Patrol', '2-4Y, 4-6Y', 1000, 'BEXIMCO Fashions Ltd.', 'beximcochq@beximco.net');

-- --------------------------------------------------------

--
-- Table structure for table `submitted_offers`
--

CREATE TABLE `submitted_offers` (
  `id` int(255) NOT NULL,
  `offer_id` int(255) NOT NULL,
  `price` double(255,4) NOT NULL,
  `g_email` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `submitted_offers`
--

INSERT INTO `submitted_offers` (`id`, `offer_id`, `price`, `g_email`) VALUES
(5, 7, 29.8000, 'beximcochq@beximco.net'),
(6, 4, 24.5000, 'beximcochq@beximco.net'),
(7, 5, 35.2000, 'beximcochq@beximco.net'),
(8, 2, 20.5000, 'info@epylliongroup.com'),
(9, 2, 20.4000, 'beximcochq@beximco.net'),
(10, 3, 25.3500, 'delwerp2000@yahoo.com');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `buyers`
--
ALTER TABLE `buyers`
  ADD PRIMARY KEY (`buyer_id`),
  ADD UNIQUE KEY `email` (`email`);

--
-- Indexes for table `garments_information`
--
ALTER TABLE `garments_information`
  ADD PRIMARY KEY (`license_id`),
  ADD UNIQUE KEY `email` (`email`);

--
-- Indexes for table `login`
--
ALTER TABLE `login`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `email` (`email`);

--
-- Indexes for table `offers`
--
ALTER TABLE `offers`
  ADD PRIMARY KEY (`o_id`);

--
-- Indexes for table `order_info`
--
ALTER TABLE `order_info`
  ADD PRIMARY KEY (`order_id`);

--
-- Indexes for table `product_info`
--
ALTER TABLE `product_info`
  ADD PRIMARY KEY (`p_id`);

--
-- Indexes for table `submitted_offers`
--
ALTER TABLE `submitted_offers`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `buyers`
--
ALTER TABLE `buyers`
  MODIFY `buyer_id` int(50) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=503;

--
-- AUTO_INCREMENT for table `login`
--
ALTER TABLE `login`
  MODIFY `id` int(50) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `offers`
--
ALTER TABLE `offers`
  MODIFY `o_id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `order_info`
--
ALTER TABLE `order_info`
  MODIFY `order_id` int(64) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT for table `product_info`
--
ALTER TABLE `product_info`
  MODIFY `p_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=32;

--
-- AUTO_INCREMENT for table `submitted_offers`
--
ALTER TABLE `submitted_offers`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

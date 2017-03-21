-- phpMyAdmin SQL Dump
-- version 4.2.5
-- http://www.phpmyadmin.net
--
-- Host: localhost:8889
-- Generation Time: Mar 21, 2017 at 12:42 PM
-- Server version: 5.5.38
-- PHP Version: 5.5.14

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";

--
-- Database: `tokyo_store`
--

-- --------------------------------------------------------

--
-- Table structure for table `markers`
--

CREATE TABLE `markers` (
`id` int(11) NOT NULL,
  `shop_code` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `name` varchar(60) COLLATE utf8_unicode_ci NOT NULL,
  `address` varchar(80) COLLATE utf8_unicode_ci NOT NULL,
  `Area` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `lat` float(10,6) NOT NULL,
  `lng` float(10,6) NOT NULL,
  `type` varchar(30) COLLATE utf8_unicode_ci NOT NULL,
  `food_speciality` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `total_customer_visited` int(10) DEFAULT '0',
  `daily_sales` float NOT NULL DEFAULT '0'
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=13 ;

--
-- Dumping data for table `markers`
--

INSERT INTO `markers` (`id`, `shop_code`, `name`, `address`, `Area`, `lat`, `lng`, `type`, `food_speciality`, `total_customer_visited`, `daily_sales`) VALUES
(1, '101', 'Marugotohokkaidou', '2-11-5, Asakusa, Taitou-ku, Tokyo, 111-0032', 'Taitou-ku', 35.714069, 139.792725, 'restaurant', 'Sea Food', 1000, 10000),
(2, '102', 'Sushi no Isomatsu', '3-5-25, Kamimeguro, Meguro-ku, Tokyo, 153-0051', 'Meguro-ku', 35.642479, 139.697174, 'restaurant', 'Sushi', 2005, 25000),
(3, '103', 'Living:bar', '3-14-20, Shinjuku, Shinjuku-ku, Tokyo, 160-0022', 'Shinjuku-ku', 35.691101, 139.706757, 'bar', 'Carpaccio', 3000, 30000),
(6, '104', 'Osakakitchen', '3-3-10, Nihonbashiningyocho, Chuo-ku, Tokyo, 103-0013', 'Chuo-ku', 35.709862, 139.733734, 'restaurant', 'Nama Biru', 4000, 40000),
(7, '105', 'ESPRIT TOKYO', '5-1-6, Roppongi, Minato-ku, Tokyo, 106-0032', 'Minato-ku', 35.662655, 139.733139, 'bar', 'Beer', 5000, 50000),
(8, '106', 'JUMANJI 55', '3-10-5, Roppongi, Minato-ku, Tokyo, 106-0032', 'Minato-ku', 35.663204, 139.733429, 'bar', 'beer', 6000, 600000),
(9, '107', 'MIST', '3-15-24, Roppongi, Minato-ku, Tokyo, 106-0032', 'Minato-ku', 35.662663, 139.735382, 'bar', 'Takila\r\n', 7000, 70000),
(10, '108', 'DiA TOKYO', '3-8-15, Roppongi, Minato-ku, Tokyo, 106-0032', 'Minato-ku', 35.663433, 139.733994, 'bar', 'Red Wine', 8000, 80000),
(11, '109', 'V2TOKYO', '5-5-1, Roppongi, Minato-ku, Tokyo, 106-0032', 'Minato-ku', 35.661938, 139.734558, 'bar', 'Beer', 9000, 90000),
(12, '110', 'CUBE', '3-4-11, Azabudai, Minato-ku, Tokyo, 106-0041', 'Minato-ku', 35.660561, 139.738968, 'bar', 'Beer', 10000, 100000);

-- --------------------------------------------------------

--
-- Table structure for table `sales_data`
--

CREATE TABLE `sales_data` (
  `shop_code` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `date_time` datetime NOT NULL,
  `num_cust` int(11) NOT NULL DEFAULT '0',
  `daily_sales` float NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `sales_data`
--

INSERT INTO `sales_data` (`shop_code`, `date_time`, `num_cust`, `daily_sales`) VALUES
('102', '2017-03-21 12:33:15', 5, 5000);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `markers`
--
ALTER TABLE `markers`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `sales_data`
--
ALTER TABLE `sales_data`
 ADD PRIMARY KEY (`shop_code`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `markers`
--
ALTER TABLE `markers`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=13;
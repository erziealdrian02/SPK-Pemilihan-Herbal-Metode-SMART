-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Oct 31, 2024 at 07:13 PM
-- Server version: 10.4.25-MariaDB
-- PHP Version: 8.3.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `spk_herbal_smart`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `id_admin` int(11) NOT NULL,
  `nama` varchar(50) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(250) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`id_admin`, `nama`, `username`, `password`) VALUES
(1, 'Nama Admin', 'Admin', '123456');

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `description` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`id`, `name`, `description`) VALUES
(17, 'Kesehatan Umum', 'Produk yang mendukung kesehatan umum, termasuk energi, daya tahan tubuh, dan antioksidan.'),
(18, 'Kesehatan Spesifik', 'Produk yang mendukung kesehatan spesifik seperti kesehatan prostat, hormonal wanita, dan vitalitas pria.'),
(19, 'Kesehatan Fungsional', 'Produk yang mendukung fungsi tubuh tertentu seperti pencernaan, jantung, mata, dan pernapasan.'),
(20, 'Kesehatan Mental dan Mood', 'Produk yang mendukung kesehatan mental, mengurangi stres, meningkatkan energi, dan membantu tidur.'),
(21, 'Kesehatan Kulit dan Anti-inflamasi', 'Produk yang mendukung kesehatan kulit, memiliki efek anti-inflamasi, dan detoksifikasi.'),
(24, 'Add Category', 'Ini Edit ke 4 Category123, uwawawawaa\r\n');

-- --------------------------------------------------------

--
-- Table structure for table `consumers`
--

CREATE TABLE `consumers` (
  `consumer_id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `consumers`
--

INSERT INTO `consumers` (`consumer_id`, `name`, `email`) VALUES
(1, 'Test Consumer Edit', 'consumer@test.com'),
(4, 'Test Consumer Dua', 'ermai@mail.com'),
(5, 'Nama Satu', 'emaisatu@mail.com');

-- --------------------------------------------------------

--
-- Table structure for table `criteria`
--

CREATE TABLE `criteria` (
  `criteria_id` int(11) NOT NULL,
  `harga` int(11) NOT NULL,
  `efek` int(11) NOT NULL,
  `aman` int(11) NOT NULL,
  `sedia` int(11) NOT NULL,
  `popular` int(11) NOT NULL,
  `total_bobot` int(11) NOT NULL DEFAULT 0,
  `harga_relatif` decimal(5,2) NOT NULL DEFAULT 0.00,
  `efek_relatif` decimal(5,2) NOT NULL DEFAULT 0.00,
  `aman_relatif` decimal(5,2) NOT NULL DEFAULT 0.00,
  `sedia_relatif` decimal(5,2) NOT NULL DEFAULT 0.00,
  `popular_relatif` decimal(5,2) NOT NULL DEFAULT 0.00
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `criteria`
--

INSERT INTO `criteria` (`criteria_id`, `harga`, `efek`, `aman`, `sedia`, `popular`, `total_bobot`, `harga_relatif`, `efek_relatif`, `aman_relatif`, `sedia_relatif`, `popular_relatif`) VALUES
(1, 5, 80, 50, 90, 80, 305, '0.02', '0.26', '0.16', '0.30', '0.26');

-- --------------------------------------------------------

--
-- Table structure for table `penilaian`
--

CREATE TABLE `penilaian` (
  `penilaian_id` int(11) NOT NULL,
  `name` varchar(244) NOT NULL,
  `harga` int(11) NOT NULL,
  `efektivitas` int(11) NOT NULL,
  `keamanan` int(11) NOT NULL,
  `ketersediaan` int(11) NOT NULL,
  `popularitas` int(11) NOT NULL,
  `total_penilaian` varchar(255) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `penilaian`
--

INSERT INTO `penilaian` (`penilaian_id`, `name`, `harga`, `efektivitas`, `keamanan`, `ketersediaan`, `popularitas`, `total_penilaian`) VALUES
(2, 'Nama Satu', 100000, 90, 90, 100, 100, '2,093.8'),
(3, 'Test Consumer', 150000, 90, 85, 80, 68, '3,078.7'),
(4, 'Test Consumer Dua', 40000, 12, 69, 90, 90, '864.6'),
(5, 'Test Consumer Dua', 180000, 90, 80, 70, 80, '3,678.0'),
(6, 'Test Consumer Edit', 200000, 60, 90, 50, 30, '4,052.8');

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `product_id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `category` varchar(255) DEFAULT NULL,
  `description` text DEFAULT NULL,
  `price` int(11) DEFAULT NULL,
  `brand` varchar(255) DEFAULT NULL,
  `efektivitas` int(11) NOT NULL,
  `keamanan` int(11) NOT NULL,
  `ketersediaan` int(11) NOT NULL,
  `popularitas` int(11) NOT NULL,
  `total_relatif` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`product_id`, `name`, `category`, `description`, `price`, `brand`, `efektivitas`, `keamanan`, `ketersediaan`, `popularitas`, `total_relatif`) VALUES
(36, 'Ginseng Extract', 'Kesehatan Umum', 'Ekstrak ginseng untuk meningkatkan energi dan daya tahan tubuh.', 150000, 'Nature\'s Way', 85, 90, 70, 80, '3078.3'),
(37, 'Echinacea', 'Kesehatan Umum', 'Suplemen echinacea untuk meningkatkan sistem kekebalan tubuh.', 100000, 'NOW Foods', 80, 85, 75, 70, '2075.1'),
(38, 'Ginger Root', 'Kesehatan Fungsional', 'Ekstrak akar jahe untuk kesehatan pencernaan dan anti-inflamasi.', 80000, 'Nature\'s Bounty', 75, 80, 85, 75, '1677.3'),
(39, 'Turmeric Curcumin', 'Kesehatan Kulit dan Anti-inflamasi', 'Suplemen kunyit untuk anti-inflamasi dan kesehatan sendi.', 120000, 'BioSchwartz', 90, 85, 80, 90, '2484.4'),
(54, 'Rhodiola Rosea', 'Kesehatan Mental dan Mood', 'Suplemen rhodiola rosea untuk mengurangi stres dan meningkatkan energi.', 120000, 'Gaia Herbs', 85, 80, 90, 75, '2481.4'),
(55, 'Black Cohosh', 'Kesehatan Spesifik', 'Suplemen black cohosh untuk kesehatan wanita.', 130000, 'Nature\'s Way', 80, 85, 75, 70, '2675.1'),
(56, 'Tribulus Terrestris', 'Kesehatan Spesifik', 'Suplemen tribulus terrestris untuk meningkatkan vitalitas pria.', 140000, 'NOW Foods', 75, 80, 85, 75, '2877.3'),
(57, 'Red Clover', 'Kesehatan Spesifik', 'Suplemen red clover untuk kesehatan hormonal wanita.', 90000, 'Nature\'s Answer', 90, 85, 80, 90, '1884.4'),
(58, 'Astragalus Root', 'Kesehatan Umum', 'Suplemen akar astragalus untuk meningkatkan sistem imun.', 110000, 'Nature\'s Way', 85, 90, 70, 80, '2278.3'),
(59, 'Hawthorn Berry', 'Kesehatan Fungsional', 'Suplemen hawthorn berry untuk kesehatan jantung.', 95000, 'Gaia Herbs', 80, 75, 85, 70, '1976.5'),
(60, 'Bilberry Extract', 'Kesehatan Fungsional', 'Ekstrak bilberry untuk kesehatan mata.', 150000, 'NOW Foods', 85, 80, 40, 75, '3066.4'),
(76, 'promag', 'Kesehatan Mental dan Mood', 'bgyvygbhb', 2000000, 'Test edit', 20, 30, 40, 50, '40035');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id_admin`);

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `consumers`
--
ALTER TABLE `consumers`
  ADD PRIMARY KEY (`consumer_id`),
  ADD UNIQUE KEY `email` (`email`);

--
-- Indexes for table `criteria`
--
ALTER TABLE `criteria`
  ADD PRIMARY KEY (`criteria_id`);

--
-- Indexes for table `penilaian`
--
ALTER TABLE `penilaian`
  ADD PRIMARY KEY (`penilaian_id`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`product_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `id_admin` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- AUTO_INCREMENT for table `consumers`
--
ALTER TABLE `consumers`
  MODIFY `consumer_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;

--
-- AUTO_INCREMENT for table `criteria`
--
ALTER TABLE `criteria`
  MODIFY `criteria_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `penilaian`
--
ALTER TABLE `penilaian`
  MODIFY `penilaian_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `product_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=77;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

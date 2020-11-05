-- phpMyAdmin SQL Dump
-- version 5.0.3
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 05, 2020 at 02:44 PM
-- Server version: 10.4.14-MariaDB
-- PHP Version: 7.2.34

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `dbplacas`
--

-- --------------------------------------------------------

--
-- Table structure for table `placas`
--

CREATE TABLE `placas` (
  `codigo` int(11) NOT NULL,
  `nome` varchar(30) NOT NULL,
  `modelo` varchar(256) NOT NULL,
  `marca` varchar(15) NOT NULL,
  `memoria` int(16) NOT NULL,
  `tipo_memoria` varchar(6) NOT NULL,
  `clock` int(12) NOT NULL,
  `foto` varchar(256) DEFAULT NULL,
  `bit` int(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `placas`
--

INSERT INTO `placas` (`codigo`, `nome`, `modelo`, `marca`, `memoria`, `tipo_memoria`, `clock`, `foto`, `bit`) VALUES
(9, 'RTX 2080', 'ROG Strix ', 'asus', 11, 'gddr6', 1350, 'f4e67457696ca3493acc5dc7c049fd63.jpg', 256),
(12, 'Geforce1660', 'Phoenix', 'asus', 6, 'gddr6', 1000, 'da4db8e5143208b584480f037013df27.jpg', 192),
(13, 'RTX 480', 'Radeon', 'AMD', 8, 'gddr5', 1120, 'b75e63a7a66fb85308e3ae1c8e5c037e.jpg', 256),
(21, 'GTX 1650', 'GeForce', 'Gigabyte', 4, 'gddr6', 1635, '90e4f12f1a0de273ada5044bbea3d12e.jpg', 128),
(22, 'Radeon580', 'RX', 'AMD', 8, 'gddr5', 1380, '2f3314096a40e7794fe39164bdced5e9.jpg', 128),
(23, 'GTX1660 Super', 'GeForce TUF3', 'Asus', 6, 'gddr6', 1860, 'fb90e2ba7e9ac8ca238a9905098ecc44.jpg', 256),
(24, 'RTX 2060', 'GeForce TUF', 'Asus', 6, 'gddr6', 1365, '1a1680fd1989e153bab2d0ac1473b303.jpg', 256),
(25, 'Sapphire Pulse 580', 'RX ', 'AMD', 8, 'gddr5', 1350, '9f00c0c0b2afd0e04d73bd8a1ae0e28b.jpg', 128),
(26, 'Radeon 550', 'RX PowerColor', 'AMD', 4, 'gddr5', 1430, 'aa49df6a7acf83490b12f101cf90fc4e.jpg', 128),
(27, 'Radeon 580', 'RX Gaming', 'Gigabyte', 8, 'gddr5', 1355, 'e77148f24fef9f9b230febda6c2ff01a.jpg', 128),
(28, 'GTX1660 Super', 'XC Gaming', 'EVGA', 4, 'gddr6', 1725, 'a6e161b02974098582d7e8b118157e8d.jpg', 150),
(29, 'GeForce 1030', 'GT', 'Gigabyte', 2, 'gddr5', 680, '55ada60b6c86998207378052258f091c.jpg', 80),
(30, 'GeForce 730', 'GT', 'Gigabyte', 3, 'gddr5', 1000, '567fc46fda70403cbf701506fac527e0.jpg', 128),
(31, 'GeForce', 'GTX', 'Pny', 4, 'gddr6', 1250, '068d6bd9335ae0e87b3c1e06f5978b9a.jpg', 128),
(32, 'GeForce 710', 'GT', 'MSI', 1, 'ddr3', 1600, '2fd90a90e5934e45de481900e0b600d3.jpg', 80),
(33, 'GeForce RTX 2060', 'KO Ultra Gaming', 'EVGA', 6, 'gddr6', 1750, '49a49d3997c74b4b4e3200b4994c487a.jpg', 256),
(34, 'Radeon 5600', 'XT EVO', 'Asus', 6, 'gddr6', 2200, 'f8a3b5cb297276c882a829d293075e34.jpg', 256),
(35, 'Radeon 570', 'RX Armor', 'MSI', 8, 'gddr5', 1730, 'b6e89384b27fcb49348b05205b6096eb.jpg', 128),
(36, 'Radeon 5500', 'XT OC', 'Gigabyte', 4, 'gddr6', 1700, '0d848ad0dbf9b2edfaa4a77e32b789bb.jpg', 128),
(37, 'GTX 1650', 'GeForce SC Ultra', 'EBGA', 4, 'gddr6', 1650, '318a767c1ecca6f4a95e83300c0e90c1.jpg', 128),
(41, 'uma', 'madrugada', 'toda', 0, 'no lix', 0, 'b056b80bb5456885b590c0311f3a10ee.jpg', 0);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `placas`
--
ALTER TABLE `placas`
  ADD PRIMARY KEY (`codigo`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `placas`
--
ALTER TABLE `placas`
  MODIFY `codigo` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=42;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Aug 11, 2024 at 05:13 PM
-- Server version: 8.3.0
-- PHP Version: 8.2.18

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `wecd`
--

-- --------------------------------------------------------

--
-- Table structure for table `emp_db`
--

DROP TABLE IF EXISTS `emp_db`;
CREATE TABLE IF NOT EXISTS `emp_db` (
  `id` int NOT NULL AUTO_INCREMENT,
  `emp_name` varchar(100) NOT NULL,
  `desig` varchar(100) NOT NULL,
  `mobile` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `project` varchar(100) NOT NULL,
  `sector` varchar(100) NOT NULL,
  `district` varchar(100) NOT NULL,
  `status` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=7 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `emp_db`
--

INSERT INTO `emp_db` (`id`, `emp_name`, `desig`, `mobile`, `email`, `project`, `sector`, `district`, `status`, `password`) VALUES
(1, 'xyz', '', '******3580', 'xyz@gamil.com', '', '', '', '', '123'),
(2, 'abc', '', '******3580', 'abc@gamil.com', '', '', '', '', '12334'),
(3, 'pqr', '', '******3580', 'pqr123@gamil.com', 'Bhagwanpur', '', 'Haridwar', 'on', '123456'),
(4, 'npm', '', '******3580', 'npm@gamil.com', 'Haldwani Rural', '', 'Nanital', 'on', '12334'),
(5, 'rk', '', '******3580', 'rkgraphics@123gmail.com', 'Gairsain', '', 'Chamoli', 'on', '123'),
(6, 'xyz', '', '8979983580', 'djhd8@gmail.com', '', '', '', 'on', '987');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

-- phpMyAdmin SQL Dump
-- version 4.1.14
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Apr 22, 2017 at 06:36 PM
-- Server version: 10.1.21-MariaDB
-- PHP Version: 5.5.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;




--
-- Database: `signin`
--

--
--------------------------------------------------------

--
-- Table structure for table `login`
--


CREATE TABLE IF NOT EXISTS `login` (
  `username` varchar(10) NOT NULL,

  `password` varchar(10) NOT NULL,
 
 `id` varchar(10) NOT NULL,

  `name` varchar(30) NOT NULL,

  `gender` varchar(6) NOT NULL,

  `dob` date NOT NULL,

  `fname` varchar(20) NOT NULL,

  `course` varchar(6) NOT NULL,
 
 `branch` varchar(3) DEFAULT NULL,

  `semester` int(1) NOT NULL,

  `batch` int(4) NOT NULL,

  `contact` bigint(10) NOT NULL,

  `email` varchar(30) NOT NULL,
 
`address` varchar(50) NOT NULL,

  `img` blob NOT NULL,

  `updated` int(1) NOT NULL,

  `att_fine` double NOT NULL,
 
 `fee_fine` double NOT NULL,

  `lib_fine` double NOT NULL,

  `other_fine` double NOT NULL,
  
PRIMARY KEY (`id`)
) 
ENGINE=InnoDB 
DEFAULT CHARSET=latin1 
COMMENT='Table to verify login';






/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;

/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;

/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;



INSERT INTO `login` (`username`, `password`) VALUES ('admin', '123');
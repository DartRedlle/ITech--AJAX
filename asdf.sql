-- phpMyAdmin SQL Dump
-- version 5.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 20, 2020 at 06:37 PM
-- Server version: 10.4.11-MariaDB
-- PHP Version: 7.4.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `asdf`
--

-- --------------------------------------------------------

--
-- Table structure for table `client`
--

CREATE TABLE `client` (
  `ID_Client` int(11) NOT NULL,
  `name` varchar(50) NOT NULL,
  `login` varchar(50) NOT NULL,
  `password` varchar(30) NOT NULL,
  `IP` varchar(15) NOT NULL,
  `balance` double NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `client`
--

INSERT INTO `client` (`ID_Client`, `name`, `login`, `password`, `IP`, `balance`) VALUES
(0, 'vasya', 'nagibator228', 'parol123', '192.128.0.1', 100),
(1, 'petya', 'asdf123', 'password', '192.162.100.50', 200),
(2, 'kolya', 'omegahacker153', 'lkjfasdfjkl7q', '222.118.131.66', 5000),
(3, 'Bogdan', 'BOGDAN1', 'qwerty', '111.21.34.5', -50),
(4, 'Maria', 'masha', 'bilfjj', '252.52.5.543', -300);

-- --------------------------------------------------------

--
-- Table structure for table `seanse`
--

CREATE TABLE `seanse` (
  `ID_Seanse` int(11) NOT NULL,
  `start` datetime NOT NULL,
  `stop` datetime NOT NULL,
  `in_traffic` int(11) NOT NULL,
  `out_traffic` int(11) NOT NULL,
  `FID_Client` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `seanse`
--

INSERT INTO `seanse` (`ID_Seanse`, `start`, `stop`, `in_traffic`, `out_traffic`, `FID_Client`) VALUES
(0, '2020-03-04 10:00:00', '2020-03-04 15:00:00', 1024, 20, 0),
(1, '2020-03-04 13:00:00', '2020-03-04 14:00:00', 1243, 743, 1),
(2, '2020-03-04 01:00:01', '2020-03-04 04:00:00', 2048, 5001, 2),
(3, '2020-03-07 00:00:00', '2020-03-08 00:00:00', 1234, 1253, 0),
(4, '2020-03-09 07:00:00', '2020-03-09 08:00:00', 52341, 123414, 0);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `client`
--
ALTER TABLE `client`
  ADD PRIMARY KEY (`ID_Client`);

--
-- Indexes for table `seanse`
--
ALTER TABLE `seanse`
  ADD PRIMARY KEY (`ID_Seanse`),
  ADD KEY `FID_Client` (`FID_Client`);

--
-- Constraints for dumped tables
--

--
-- Constraints for table `seanse`
--
ALTER TABLE `seanse`
  ADD CONSTRAINT `seanse_ibfk_1` FOREIGN KEY (`FID_Client`) REFERENCES `client` (`ID_Client`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

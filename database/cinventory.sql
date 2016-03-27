-- phpMyAdmin SQL Dump
-- version 4.3.11
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Feb 29, 2016 at 02:05 PM
-- Server version: 5.6.24
-- PHP Version: 5.6.8

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `cinventory`
--

-- --------------------------------------------------------

--
-- Table structure for table `chemicals`
--

CREATE TABLE IF NOT EXISTS `chemicals` (
  `id` int(11) NOT NULL,
  `name` varchar(50) NOT NULL,
  `description` text NOT NULL,
  `qty` varchar(50) NOT NULL,
  `unit` varchar(50) NOT NULL,
  `supplier` varchar(50) NOT NULL,
  `dateIn` varchar(50) NOT NULL,
  `dateUpdated` varchar(50) NOT NULL,
  `createdBy` varchar(50) NOT NULL,
  `updatedBy` varchar(50) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `chemicals`
--

INSERT INTO `chemicals` (`id`, `name`, `description`, `qty`, `unit`, `supplier`, `dateIn`, `dateUpdated`, `createdBy`, `updatedBy`) VALUES
(2, 'Chemical 102', '\nsdfsd\n\n', '7', '0', 'Supplier 1', '10/05/2014 05:25 PM', '12/13/2015 08:56', 'Jimmy Lomocso', 'Jimzky Sky'),
(3, 'Tyro x-2001', '<p>Atomic Bombs</p>', '5', '10', 'Supplier 2', '10/05/2014 05:26 PM', '10/06/2014 09:48 AM', 'Jimmy Lomocso', 'Jimzky Sky'),
(5, 'Chemical X ver 2', '<p>Change human into monster</p>', '6', '6', 'Supplier 1', '10/05/2014 06:59 PM', '10/06/2014 09:48 AM', 'Jimmy Lomocso', 'Jimzky Sky');

-- --------------------------------------------------------

--
-- Table structure for table `items`
--

CREATE TABLE IF NOT EXISTS `items` (
  `id` int(11) NOT NULL,
  `name` varchar(50) NOT NULL,
  `description` text NOT NULL,
  `qty` varchar(50) NOT NULL,
  `unit` varchar(50) NOT NULL,
  `unitsign` varchar(50) NOT NULL,
  `remark` varchar(50) NOT NULL,
  `image` varchar(50) NOT NULL,
  `supplier` varchar(50) NOT NULL,
  `dateIn` varchar(50) NOT NULL,
  `dateUpdated` varchar(50) NOT NULL,
  `createdBy` varchar(50) NOT NULL,
  `updatedBy` varchar(50) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=13 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `items`
--

INSERT INTO `items` (`id`, `name`, `description`, `qty`, `unit`, `unitsign`, `remark`, `image`, `supplier`, `dateIn`, `dateUpdated`, `createdBy`, `updatedBy`) VALUES
(1, 'Mouse', '<p>Mouse Ball</p>', '5', '1', 'Box', 'Not Functional', 'Mouse-272b.jpg', 'Supplier 1', '10/05/2014 12:18 PM', '10/06/2014 09:45 AM', 'Jimmy Lomocso', 'Jimzky Sky'),
(2, 'Keyboard Mini', '<p>Wireless Keyboard</p>', '2', '0', 'Pcs.', 'Functional', 'Keyboard Mini-pc-keyboards-RazerTron.jpg', 'Supplier 102', '10/05/2014 12:48 PM', '10/06/2014 11:17 AM', 'Jimmy Lomocso', 'Jimzky Sky'),
(4, 'System unit', '<p>With fan</p>', '5', '5', 'Box', 'Functional', 'System unit-Computer-Set.jpg', 'Supplier 1', '10/05/2014 02:10 PM', '10/06/2014 11:16 AM', 'Jimmy Lomocso', 'Jimzky Sky'),
(12, 'Laptop', '<p>Laptop here</p>', '2', '2', 'Pcs.', 'Functional', 'Laptop-Apple-Laptop.jpg', 'Jimzky Sky', '10/05/2014 11:18 PM', '10/06/2014 09:45 AM', 'Jimmy Lomocso', 'Jimzky Sky');

-- --------------------------------------------------------

--
-- Table structure for table `logs`
--

CREATE TABLE IF NOT EXISTS `logs` (
  `id` int(11) NOT NULL,
  `user` varchar(50) NOT NULL,
  `operation` text NOT NULL,
  `date` varchar(50) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=153 DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `supplier`
--

CREATE TABLE IF NOT EXISTS `supplier` (
  `id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `company` varchar(100) NOT NULL,
  `contact` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `address` text NOT NULL,
  `dateCreated` varchar(100) NOT NULL,
  `dateUpdated` varchar(100) NOT NULL,
  `createdBy` varchar(100) NOT NULL,
  `updatedBy` varchar(100) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `supplier`
--

INSERT INTO `supplier` (`id`, `name`, `company`, `contact`, `email`, `address`, `dateCreated`, `dateUpdated`, `createdBy`, `updatedBy`) VALUES
(5, 'Supplier 101', 'PIEC', '1111', 'peie@cgaml.com', 'Cebu City', '10/05/2014 11:24 PM', '10/06/2014 12:15 PM', 'Jimmy Lomocso', 'Jimzky Sky'),
(6, 'Supplier 102', '', '2222', '', 'Cebu City', '10/05/2014 11:24 PM', '', 'Jimmy Lomocso', '');

-- --------------------------------------------------------

--
-- Table structure for table `userdata`
--

CREATE TABLE IF NOT EXISTS `userdata` (
  `id` int(11) NOT NULL,
  `fname` varchar(50) NOT NULL,
  `lname` varchar(50) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL,
  `contact` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `address` text NOT NULL,
  `dateAdded` varchar(50) NOT NULL,
  `dateUpdated` varchar(50) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `userdata`
--

INSERT INTO `userdata` (`id`, `fname`, `lname`, `username`, `password`, `contact`, `email`, `address`, `dateAdded`, `dateUpdated`) VALUES
(2, 'root', 'root', 'root', 'dc76e9f0c0006e8f919e0c515c66dbba3982f785', '12345', 'root@gmail.com', 'root', '10/05/2014 09:42 PM', ''),
(4, 'admin', 'admin', 'admin', 'd033e22ae348aeb5660fc2140aec35850c4da997', '123456', 'admin@gmail.com', 'admin', '10/05/2014 10:13 PM', '');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `chemicals`
--
ALTER TABLE `chemicals`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `items`
--
ALTER TABLE `items`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `logs`
--
ALTER TABLE `logs`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `supplier`
--
ALTER TABLE `supplier`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `userdata`
--
ALTER TABLE `userdata`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `chemicals`
--
ALTER TABLE `chemicals`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT for table `items`
--
ALTER TABLE `items`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=13;
--
-- AUTO_INCREMENT for table `logs`
--
ALTER TABLE `logs`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=153;
--
-- AUTO_INCREMENT for table `supplier`
--
ALTER TABLE `supplier`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT for table `userdata`
--
ALTER TABLE `userdata`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=5;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

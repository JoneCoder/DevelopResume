-- phpMyAdmin SQL Dump
-- version 4.8.3
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 25, 2019 at 10:46 AM
-- Server version: 10.1.37-MariaDB
-- PHP Version: 7.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `portfolio`
--

-- --------------------------------------------------------

--
-- Table structure for table `projects`
--

CREATE TABLE `projects` (
  `sn` int(11) NOT NULL,
  `userid` varchar(200) NOT NULL,
  `projectname` varchar(200) NOT NULL,
  `ppic` varchar(200) NOT NULL,
  `description` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `projects`
--

INSERT INTO `projects` (`sn`, `userid`, `projectname`, `ppic`, `description`) VALUES
(1, '#66872', 'Business site', 'project-1.jpg', 'This is a business site project.'),
(3, '#66872', 'Portfolio', 'project-3.jpg', 'This is a portfolio site.'),
(4, '#66872', 'Business site', 'project-4.jpg', 'This is business site project.'),
(5, '#66872', 'Portfolio', 'project-5.jpg', 'This is a portfolio site.'),
(6, '#66872', 'Business site', 'project-6.jpg', 'This is a business site.'),
(7, '#66872', 'eCommerce', 'project-7.jpg', 'This is a eCommerce site.'),
(8, '#66872', 'Portfolio', 'project-8.jpg', 'This is a portfolio site.'),
(9, '#66872', 'Portfolio', 'project-9.jpg', 'This is a portfolio site.'),
(10, '#66872', 'Portfolio', 'project-10.jpg', 'This is a portfolio site.'),
(11, '#66872', 'Portfolio', 'project-11.jpg', 'This is a portfolio site.'),
(12, '#66872', 'Portfolio', 'project-12.jpg', 'This is a portfolio site.'),
(13, '#66872', 'Portfolio', 'project-13.jpg', 'Portfolio');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `projects`
--
ALTER TABLE `projects`
  ADD PRIMARY KEY (`sn`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `projects`
--
ALTER TABLE `projects`
  MODIFY `sn` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

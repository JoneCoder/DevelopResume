-- phpMyAdmin SQL Dump
-- version 4.8.3
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 25, 2019 at 10:45 AM
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
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `id` int(11) NOT NULL,
  `userid` varchar(11) NOT NULL,
  `fullname` text NOT NULL,
  `username` varchar(25) NOT NULL,
  `profession` text NOT NULL,
  `email` varchar(100) NOT NULL,
  `password` varchar(20) NOT NULL DEFAULT 'adMin123',
  `mobile` varchar(20) NOT NULL,
  `address1` varchar(100) NOT NULL,
  `address2` varchar(200) NOT NULL,
  `gender` text NOT NULL,
  `pic` varchar(200) NOT NULL,
  `rate` varchar(10) NOT NULL,
  `state` text NOT NULL,
  `postcode` int(11) NOT NULL,
  `city` text NOT NULL,
  `country` text NOT NULL,
  `rank` varchar(10) NOT NULL,
  `experience` text NOT NULL,
  `skills` varchar(200) NOT NULL,
  `english` varchar(100) NOT NULL,
  `projects` int(11) NOT NULL,
  `availability` varchar(100) NOT NULL,
  `facebook` varchar(200) NOT NULL,
  `twitter` varchar(200) NOT NULL,
  `instagram` varchar(200) NOT NULL,
  `linkedin` varchar(200) NOT NULL,
  `website` varchar(200) NOT NULL,
  `about` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`id`, `userid`, `fullname`, `username`, `profession`, `email`, `password`, `mobile`, `address1`, `address2`, `gender`, `pic`, `rate`, `state`, `postcode`, `city`, `country`, `rank`, `experience`, `skills`, `english`, `projects`, `availability`, `facebook`, `twitter`, `instagram`, `linkedin`, `website`, `about`) VALUES
(1, '#66872', 'Md. Shariful Islam', 'Jone', 'Python & PHP Web Developer', 'mohummadshorifulislam@gmail.com', '51A20h7r', '01712074151', '93, Narinda Road, Dhaka-1100', '93, Narinda Road, Dhaka-1100', 'Male', 'admin1.jpg', '10$/hr', 'Bangladesh', 1100, 'Dhaka', 'Bangladesh', '8/10', 'Entry level', 'HTML5,CSS3,Javascript,jQuery,Bootstrap,Wordpress,PHP (laravel),Python (django),Photoshop,Illustrator', 'Intermediate', 12, 'Hourly', 'https://web.facebook.com/JoneDesigner', 'https://twitter.com/JoneDesigner', 'https://www.instagram.com/jonecanvas', 'https://www.linkedin.com/in/jonedesigner/', 'https://www.jonecoder.com', 'It\'s my pleasure to introduce my self..well, I\'m Sharif and raised in Bangladesh.\r\n\r\nMy strengths are my attitude that i like to take challenges that I CAN do it,my way of thinking that i take both success and failure in a balanced manner..'),
(2, '#88572', 'Md. Shariful Islam', 'JoneCoder', 'Web Designer and Developer', 'mohummadshorifulislam@gmail.com', 'adMin123', '01712074151', '93, Narinda Road, Dhaka-1100', '93, Narinda Road, Dhaka-1100', 'Male', 'default_male.jpg', '50$/hr', 'Bangladesh', 1100, 'Dhaka', 'Bangladesh', '8/10', 'Expart', 'HTML, CSS, Javascript', 'Intermediate', 12, 'Hourly', 'https://web.facebook.com/JoneDesigner', 'https://twitter.com/JoneDesigner', 'https://www.instagram.com/jonecanvas', 'https://www.linkedin.com/in/jonedesigner/', 'https://www.jonecoder.com', 'Write about your self.'),
(3, '#12205', 'Hassan Mahmud', 'JoneCanvas', 'Web Designer', 'hassan@gmail.com', '51G30h7r', '01712074151', '93, Narinda Road, Dhaka-1100', '93, Narinda Road, Dhaka-1100', 'Male', 'default_male.jpg', '50$/hr', 'Bangladesh', 1100, 'Dhaka', 'Bangladesh', '8/10', 'Expart', 'HTML, CSS, Javascript', 'Intermediate', 12, 'Hourly', 'https://web.facebook.com/JoneDesigner', 'https://twitter.com/JoneDesigner', 'https://www.instagram.com/jonecanvas', 'https://www.linkedin.com/in/jonedesigner/', 'https://www.hassan.com', 'Write about your self.');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

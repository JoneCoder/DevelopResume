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
-- Table structure for table `message`
--

CREATE TABLE `message` (
  `id` int(11) NOT NULL,
  `username` text NOT NULL,
  `email` varchar(100) NOT NULL,
  `message` varchar(500) NOT NULL,
  `photo` varchar(200) NOT NULL DEFAULT 'default.jpg',
  `subject` text NOT NULL,
  `userid` varchar(500) NOT NULL,
  `time` int(11) NOT NULL,
  `date` varchar(200) NOT NULL,
  `respond` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `message`
--

INSERT INTO `message` (`id`, `username`, `email`, `message`, `photo`, `subject`, `userid`, `time`, `date`, `respond`) VALUES
(3, 'Mahdi Tahsan', 'tahsan@gmail.com', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry', '3.jpg', 'Web design', '#97867', 1553107798, '21-03-19', 1553155987),
(4, 'Kamal Hossain', 'kamal@gmail.com', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry', '4.png', 'Web design', '#71195', 1553107822, '21-03-19', 1553157949),
(6, 'Md. Shariful Islam', 'mohummadshorifulislam@gmail.com', 'Lorem Ipsum is simply dummy text of the printing a', '6.jpg', 'Web development', '#32058', 1553116113, '21-03-19', 1553158335),
(9, 'Jone', 'jonestven@gmail.com', '93, Narinda Road, Dhaka-Bangladesh.', '9.png', 'Web design', '#19070', 1553159933, '21-03-19', 1553159977),
(11, 'Tasfiya Tanjim Sadiya', 'tasfiyatanjimsadiya@gmail.com', 'This is a message!', '11.png', 'Web development', '#89692', 1553227568, '22-03-19', 1553227646),
(12, 'Kobir Hossain', 'kabir@gmail.com', '93, Narinda Road, Dhaka-1100', '12.jpg', 'Web development', '#91314', 1553445456, '24-03-19', 1553445497),
(13, 'Hassan Mahmud', 'hassan@gmail.com', '93, Narinda Road, Dhaka-1100', '13.png', 'Web design', '#36652', 1553447169, '24-03-19', 1553450243);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `message`
--
ALTER TABLE `message`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `message`
--
ALTER TABLE `message`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

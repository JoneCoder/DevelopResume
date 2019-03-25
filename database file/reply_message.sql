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
-- Table structure for table `reply_message`
--

CREATE TABLE `reply_message` (
  `id` int(11) NOT NULL,
  `adminusername` varchar(200) NOT NULL,
  `subject` text NOT NULL,
  `formadmin` varchar(100) NOT NULL,
  `touser` varchar(100) NOT NULL,
  `date` varchar(200) NOT NULL,
  `message` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `reply_message`
--

INSERT INTO `reply_message` (`id`, `adminusername`, `subject`, `formadmin`, `touser`, `date`, `message`) VALUES
(7, 'JoneCoder', 'Thanks for subscribe!', 'jonecoder@gmail.com', 'jonestven@gmail.com', '21-03-19', 'Something!'),
(1, 'JoneCoder', 'Thanks for subscribe!', 'jonecoder@gmail.com', 'mohummadshorifulislam@gmail.com', '21-03-19', 'Welcomes!'),
(3, 'JoneCoder', 'Thanks for subscribe!', 'jonecoder@gmail.com', 'tahsan@gmail.com', '21-03-19', 'hello'),
(4, 'JoneCoder', 'Thanks for subscribe!', 'jonecoder@gmail.com', 'kamal@gmail.com', '21-03-19', 'hello'),
(6, 'JoneCoder', 'Thanks for subscribe!', 'jonecoder@gmail.com', 'mohummadshorifulislam@gmail.com', '21-03-19', 'hi'),
(9, 'JoneCoder', 'Thanks for subscribe!', 'jonecoder@gmail.com', 'jonestven@gmail.com', '21-03-19', 'reply'),
(11, 'JoneCoder', 'Thanks for subscribe!', 'jonecoder@gmail.com', 'tasfiyatanjimsadiya@gmail.com', '22-03-19', 'thanks for subscribe!'),
(12, 'Jone', 'Thanks for subscribe!', 'mohummadshorifulislam@gmail.com', 'kabir@gmail.com', '24-03-19', 'hello'),
(13, 'Jone', 'Thanks for subscribe!', 'mohummadshorifulislam@gmail.com', 'hassan@gmail.com', '24-03-19', 'hello');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

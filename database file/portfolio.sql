-- phpMyAdmin SQL Dump
-- version 4.8.3
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 01, 2019 at 10:11 PM
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

-- --------------------------------------------------------

--
-- Table structure for table `background`
--

CREATE TABLE `background` (
  `id` int(11) NOT NULL,
  `userid` varchar(200) NOT NULL,
  `pic` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `background`
--

INSERT INTO `background` (`id`, `userid`, `pic`) VALUES
(1, '#66872', '1back.jpg'),
(2, '#66872', '2back.jpg'),
(3, '#66872', '3back.jpg'),
(4, '#66872', '4back.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `education`
--

CREATE TABLE `education` (
  `sn` int(11) NOT NULL,
  `userid` varchar(200) NOT NULL,
  `institution` text NOT NULL,
  `degree` text NOT NULL,
  `passing` varchar(50) NOT NULL,
  `description` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `education`
--

INSERT INTO `education` (`sn`, `userid`, `institution`, `degree`, `passing`, `description`) VALUES
(1, '#66872', 'Kabi Nazrul Govt. College', 'B.S.S', '2016', 'This is my higher educational institution and my favorite subject is economic.'),
(2, '#66872', 'Habibullah Bahar College Dhaka', 'Accounting', '2013', '\r\nThis institution my college.'),
(4, '#66872', 'Ibrahimpur Iswar chandra High School Manikgonj', 'Accounting', '2011', 'This institution is my high school.');

-- --------------------------------------------------------

--
-- Table structure for table `experience`
--

CREATE TABLE `experience` (
  `sn` int(11) NOT NULL,
  `userid` varchar(200) NOT NULL,
  `start_end` varchar(200) NOT NULL,
  `title` varchar(200) NOT NULL,
  `institute` varchar(200) NOT NULL,
  `pic` varchar(200) NOT NULL,
  `description` varchar(500) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `experience`
--

INSERT INTO `experience` (`sn`, `userid`, `start_end`, `title`, `institute`, `pic`, `description`) VALUES
(1, '#66872', 'Jan 2019-Present', 'WEB DEVELOPMENT COURSE', 'Training in Creative IT Institute Of Bangladesh', '1experience.jpg', 'According to US News and World Report, web developer is ranked one of the top best tech jobs in the world. '),
(2, '#66872', 'Mar 2018-Oct 2018', 'WEB DESIGN COURSE', 'Trained in BITM ( BASIS Institute of Technology & Management )', '2experience.jpg', 'Design and build websites using HTML 5 and CSS 3, Java Script, JQuery,Bootstrap.'),
(3, '#66872', 'Jan 2017-Jan 2018', 'ONLINE COURSE', 'Freecodecamp.org', '3experience.jpg', 'freeCodeCamp is a non-profit organization that consists of an interactive learning web platform, an online community forum, chat rooms, Medium publications and local organizations that intend to make learning web development accessible to anyone.'),
(4, '#66872', 'Jan 2016-Jan 2017', 'WebStyle Technologies', 'W3schools.com', '4experience.jpg', 'W3Schools is an educational website for learning web technologies online.');

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
(11, 'Tasfiya Tanjim Sadiya', 'tasfiyatanjimsadiya@gmail.com', 'This is a message!', '11.png', 'Web development', '#89692', 1553227568, '22-03-19', 1553227646),
(12, 'Kobir Hossain', 'kabir@gmail.com', '93, Narinda Road, Dhaka-1100', '12.jpg', 'Web development', '#91314', 1553445456, '24-03-19', 1553445497),
(13, 'Hassan Mahmud', 'hassan@gmail.com', '93, Narinda Road, Dhaka-1100', '13.png', 'Web design', '#36652', 1553447169, '24-03-19', 1553450243);

-- --------------------------------------------------------

--
-- Table structure for table `mypng`
--

CREATE TABLE `mypng` (
  `sn` int(11) NOT NULL,
  `userid` varchar(200) NOT NULL,
  `png` varchar(200) NOT NULL,
  `action` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `mypng`
--

INSERT INTO `mypng` (`sn`, `userid`, `png`, `action`) VALUES
(1, '#66872', 'Jone-1.png', 0),
(2, '#66872', 'Jone-2.png', 1);

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
(13, '#66872', 'Portfolio', 'project-13.jpg', 'This is portfolio site.');

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
(11, 'JoneCoder', 'Thanks for subscribe!', 'jonecoder@gmail.com', 'tasfiyatanjimsadiya@gmail.com', '22-03-19', 'thanks for subscribe!'),
(12, 'Jone', 'Thanks for subscribe!', 'mohummadshorifulislam@gmail.com', 'kabir@gmail.com', '24-03-19', 'hello'),
(13, 'Jone', 'Thanks for subscribe!', 'mohummadshorifulislam@gmail.com', 'hassan@gmail.com', '24-03-19', 'hello');

-- --------------------------------------------------------

--
-- Table structure for table `services`
--

CREATE TABLE `services` (
  `sn` int(11) NOT NULL,
  `userid` varchar(200) NOT NULL,
  `title` varchar(200) NOT NULL,
  `icons` varchar(200) NOT NULL,
  `description` varchar(500) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `services`
--

INSERT INTO `services` (`sn`, `userid`, `title`, `icons`, `description`) VALUES
(1, '#66872', 'Web Design', 'mdi mdi-laptop', 'Full responsive web design. Support all the devices we are providing bootstrap Responsive designs.'),
(2, '#66872', 'Creative Design', 'mdi mdi-pencil', 'Creative web design make user friendly website.'),
(3, '#66872', 'Html Coding', 'mdi mdi-language-html5', 'PSD to html, static website, landing page design etc.'),
(4, '#66872', 'Web Development', 'mdi mdi-code-tags', 'Web Developing basically server site coding, like this login, logout, security matter and dynamic  website.'),
(5, '#66872', 'Python Development', 'mdi mdi-language-python', 'Web base app making, python (django) is the most popular web framework.'),
(7, '#66872', 'PHP Development', 'mdi mdi-language-php', 'Php laravel framework is the another most popular for web developing.');

-- --------------------------------------------------------

--
-- Table structure for table `slider`
--

CREATE TABLE `slider` (
  `sn` int(11) NOT NULL,
  `userid` varchar(200) NOT NULL,
  `image` varchar(200) NOT NULL,
  `default` int(11) NOT NULL,
  `action` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `slider`
--

INSERT INTO `slider` (`sn`, `userid`, `image`, `default`, `action`) VALUES
(1, '#66872', 'default_slid.jpg', 1, 1),
(2, '#66872', 'default_slid2.jpg', 1, 0),
(3, '#66872', 'default_slid3.jpg', 1, 0),
(4, '#66872', 'default_slid4.jpg', 1, 0);

-- --------------------------------------------------------

--
-- Table structure for table `tmp_message`
--

CREATE TABLE `tmp_message` (
  `id` int(11) NOT NULL,
  `username` varchar(200) NOT NULL,
  `subject` text NOT NULL,
  `pic` varchar(200) NOT NULL,
  `time` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `education`
--
ALTER TABLE `education`
  ADD PRIMARY KEY (`sn`);

--
-- Indexes for table `experience`
--
ALTER TABLE `experience`
  ADD PRIMARY KEY (`sn`);

--
-- Indexes for table `message`
--
ALTER TABLE `message`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `mypng`
--
ALTER TABLE `mypng`
  ADD PRIMARY KEY (`sn`);

--
-- Indexes for table `projects`
--
ALTER TABLE `projects`
  ADD PRIMARY KEY (`sn`);

--
-- Indexes for table `services`
--
ALTER TABLE `services`
  ADD PRIMARY KEY (`sn`);

--
-- Indexes for table `slider`
--
ALTER TABLE `slider`
  ADD PRIMARY KEY (`sn`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `education`
--
ALTER TABLE `education`
  MODIFY `sn` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `experience`
--
ALTER TABLE `experience`
  MODIFY `sn` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `message`
--
ALTER TABLE `message`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `mypng`
--
ALTER TABLE `mypng`
  MODIFY `sn` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `projects`
--
ALTER TABLE `projects`
  MODIFY `sn` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `services`
--
ALTER TABLE `services`
  MODIFY `sn` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `slider`
--
ALTER TABLE `slider`
  MODIFY `sn` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

-- phpMyAdmin SQL Dump
-- version 3.4.5
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Jun 01, 2018 at 10:56 AM
-- Server version: 5.5.16
-- PHP Version: 5.3.8

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `Minifb`
--

-- --------------------------------------------------------

--
-- Table structure for table `chating`
--

CREATE TABLE IF NOT EXISTS `chating` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `sender` int(11) NOT NULL,
  `receiver` int(11) NOT NULL,
  `message` varchar(10000) NOT NULL,
  `read` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=95 ;

--
-- Dumping data for table `chating`
--

INSERT INTO `chating` (`id`, `sender`, `receiver`, `message`, `read`) VALUES
(1, 3, 4, 'hi', 1),
(2, 3, 4, 'hi', 1),
(3, 4, 3, 'hi', 1),
(4, 3, 4, 'hi', 1),
(5, 3, 4, 'hi', 1),
(6, 4, 3, 'cheppu ra', 1),
(7, 3, 4, 'em leu ra', 1),
(8, 4, 3, 'buvva thinnava', 1),
(9, 3, 4, 'thinna ra', 1),
(10, 3, 4, 'nuv', 1),
(11, 4, 3, 'ha', 1),
(12, 4, 3, 'thinna', 1),
(19, 4, 3, 'hi', 1),
(20, 4, 3, 'raji vachinda', 1),
(21, 4, 3, 'ha', 1),
(22, 3, 4, 'what', 1),
(23, 3, 4, 'what', 1),
(24, 4, 3, 'hha', 1),
(25, 4, 3, 'hh', 1),
(26, 3, 4, 'hi', 1),
(27, 3, 4, 'ha', 1),
(28, 4, 3, 'hi', 1),
(29, 3, 4, 'hi', 1),
(30, 4, 3, 'h', 1),
(31, 3, 4, 'h', 1),
(32, 3, 4, 'hi', 1),
(33, 3, 4, 'hi', 1),
(34, 3, 4, 'hi', 1),
(35, 3, 4, 'hi', 1),
(36, 3, 4, 'hi', 1),
(37, 3, 4, 'hi', 1),
(38, 3, 4, 'hi', 1),
(39, 3, 4, 'hello', 1),
(40, 3, 4, 'yeah i got it ra potti', 1),
(41, 4, 3, 'antha naa valle ka ra', 1),
(42, 4, 3, 'hi', 1),
(43, 4, 3, 'hi', 1),
(44, 4, 3, 'bocchhu', 1),
(45, 3, 4, 'era', 1),
(46, 4, 3, 'hi', 1),
(47, 4, 3, 'hi', 1),
(48, 3, 4, 'samosa', 1),
(49, 4, 3, 'g', 1),
(50, 4, 3, 'h', 1),
(51, 4, 3, 'hi', 1),
(52, 4, 3, 'sc', 1),
(53, 4, 3, 'hi', 1),
(54, 4, 3, 'hi', 1),
(55, 4, 3, 'ss', 1),
(56, 4, 3, 'hi', 1),
(57, 4, 3, 'yeah', 1),
(58, 4, 3, 'hi', 1),
(59, 4, 3, 'f', 1),
(60, 4, 3, 'hi', 1),
(61, 4, 3, 'f', 1),
(62, 4, 3, 'h', 1),
(63, 4, 3, 'ff', 1),
(64, 3, 4, 'hi', 1),
(65, 3, 4, 'hi', 1),
(66, 3, 4, 'hi', 1),
(67, 3, 4, 'hi', 1),
(68, 3, 4, 'h', 1),
(69, 3, 4, 'hi', 1),
(70, 3, 4, 'hi', 1),
(71, 3, 4, 'hi', 1),
(72, 3, 4, 'av', 1),
(73, 3, 4, 'i love ', 1),
(74, 3, 4, 'hi', 1),
(75, 3, 4, 'l', 1),
(76, 3, 4, 'f', 1),
(77, 4, 3, 'jaffa', 1),
(78, 4, 3, 'hi', 1),
(79, 4, 3, 'h', 1),
(80, 4, 3, 'hi', 1),
(81, 4, 3, 'hi', 1),
(82, 4, 3, 'hi', 1),
(83, 4, 3, 'a', 1),
(84, 4, 3, 'hi', 1),
(85, 3, 4, 'hi', 1),
(86, 3, 4, 'h', 1),
(87, 4, 3, 'hi', 1),
(88, 4, 3, 'h', 1),
(89, 4, 3, 'hi', 1),
(90, 3, 4, 'hi', 1),
(91, 3, 5, 'emi ra', 1),
(92, 5, 4, 'hi', 1),
(93, 3, 4, 'hi', 1),
(94, 4, 3, 'hi', 1);

-- --------------------------------------------------------

--
-- Table structure for table `Comments`
--

CREATE TABLE IF NOT EXISTS `Comments` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `userid` int(11) NOT NULL,
  `imageid` int(11) NOT NULL,
  `comment` varchar(1000) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=69 ;

--
-- Dumping data for table `Comments`
--

INSERT INTO `Comments` (`id`, `userid`, `imageid`, `comment`) VALUES
(42, 3, 8, 'hi'),
(43, 3, 8, 'yeah'),
(44, 3, 7, 'hi'),
(45, 3, 4, 'hi'),
(46, 3, 8, 'hi'),
(47, 3, 7, 'i love you'),
(48, 3, 7, 'hi'),
(49, 3, 7, 'hi'),
(50, 3, 7, 'hi'),
(51, 3, 7, 'hi'),
(52, 3, 7, 'hi'),
(53, 3, 7, 'hi'),
(54, 3, 7, 'ha'),
(55, 4, 7, 'why'),
(56, 4, 7, 'ww'),
(57, 3, 7, 'ha'),
(58, 3, 7, 'ha'),
(59, 3, 8, 'ha'),
(60, 3, 10, 'hi'),
(61, 4, 10, 'cheppu'),
(62, 3, 10, 'nice'),
(63, 3, 10, 'super'),
(64, 3, 7, 'suip'),
(65, 3, 8, 'thu... nee bathuku'),
(66, 3, 8, 'excellent'),
(67, 3, 13, 'nice'),
(68, 3, 13, 'tq');

-- --------------------------------------------------------

--
-- Table structure for table `Feedback`
--

CREATE TABLE IF NOT EXISTS `Feedback` (
  `name` varchar(50) NOT NULL,
  `feedback` varchar(1000) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `Feedback`
--

INSERT INTO `Feedback` (`name`, `feedback`) VALUES
('Mahesh Ippili', 'hi'),
('Mahesh Ippili', 'hi');

-- --------------------------------------------------------

--
-- Table structure for table `Friendrequests`
--

CREATE TABLE IF NOT EXISTS `Friendrequests` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `sender` int(11) NOT NULL,
  `receiver` int(11) NOT NULL,
  `read` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `Friends`
--

CREATE TABLE IF NOT EXISTS `Friends` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `friend1` int(11) NOT NULL,
  `friend2` int(11) NOT NULL,
  `friends` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=6 ;

--
-- Dumping data for table `Friends`
--

INSERT INTO `Friends` (`id`, `friend1`, `friend2`, `friends`) VALUES
(2, 3, 4, 0),
(3, 4, 5, 0),
(4, 5, 3, 0),
(5, 6, 3, 0);

-- --------------------------------------------------------

--
-- Table structure for table `Images`
--

CREATE TABLE IF NOT EXISTS `Images` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `location` varchar(200) NOT NULL,
  `uploader` int(11) NOT NULL,
  `type` int(11) NOT NULL,
  `likes` int(11) NOT NULL,
  `comments` int(11) NOT NULL,
  `shares` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=14 ;

--
-- Dumping data for table `Images`
--

INSERT INTO `Images` (`id`, `location`, `uploader`, `type`, `likes`, `comments`, `shares`) VALUES
(1, 'posts/Screenshot from 2016-09-28 12:00:12.png', 3, 0, 2, 0, 0),
(2, 'posts/Screenshot from 2016-09-28 12:00:12.png', 3, 0, 2, 0, 0),
(3, 'posts/Screenshot from 2017-04-18 09:09:55.png', 4, 0, 2, 0, 0),
(4, 'posts/Screenshot from 2016-09-28 12:05:23.png', 3, 0, 1, 1, 0),
(5, 'posts/Screenshot from 2016-09-28 12:00:12.png', 4, 0, 1, 0, 0),
(6, 'posts/Screenshot from 2016-09-28 12:00:12.png', 4, 0, 1, 0, 0),
(7, 'posts/Screenshot from 2016-09-28 12:04:34.png', 3, 0, 2, 14, 0),
(8, 'posts/Screenshot from 2016-09-27 20:18:09.png', 4, 0, 2, 6, 0),
(9, 'posts/vlcsnap-2017-09-04-17h30m37s338.png', 3, 0, 3, 0, 0),
(10, 'posts/19106036_478367549172477_8072477533187092820_n.jpg', 3, 0, 3, 4, 1),
(11, 'posts/19106036_478367549172477_8072477533187092820_n.jpg', 3, 3, 1, 0, 1),
(12, 'posts/19106036_478367549172477_8072477533187092820_n.jpg', 5, 3, 2, 0, 0),
(13, 'profiles/3.jpg', 3, -1, 2, 2, 0);

-- --------------------------------------------------------

--
-- Table structure for table `likes`
--

CREATE TABLE IF NOT EXISTS `likes` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `liker` int(11) NOT NULL,
  `image` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=33 ;

--
-- Dumping data for table `likes`
--

INSERT INTO `likes` (`id`, `liker`, `image`) VALUES
(6, 3, 2),
(7, 3, 1),
(8, 4, 3),
(9, 4, 2),
(10, 4, 1),
(11, 0, 0),
(12, 3, 3),
(13, 3, 4),
(14, 3, 8),
(15, 3, 7),
(16, 3, 6),
(17, 3, 5),
(18, 3, 9),
(19, 4, 9),
(20, 4, 8),
(21, 3, 10),
(22, 0, 0),
(23, 0, 0),
(24, 5, 10),
(25, 5, 9),
(26, 5, 7),
(27, 3, 12),
(28, 3, 11),
(29, 3, 13),
(30, 6, 13),
(31, 6, 12),
(32, 6, 10);

-- --------------------------------------------------------

--
-- Table structure for table `Notifications`
--

CREATE TABLE IF NOT EXISTS `Notifications` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `receiver` int(11) NOT NULL,
  `notification` varchar(200) NOT NULL,
  `post` int(11) NOT NULL,
  `read` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=44 ;

--
-- Dumping data for table `Notifications`
--

INSERT INTO `Notifications` (`id`, `receiver`, `notification`, `post`, `read`) VALUES
(4, 4, 'Mahesh Ippili send a freindrequest to you', 0, 1),
(5, 4, 'Mahesh Ippili send a freindrequest to you', 0, 1),
(6, 3, 'Raju dussa accepts your request', 0, 1),
(7, 3, 'Raju dussa accepts your request', 0, 1),
(8, 3, 'Raju dussa accepts your request', 0, 1),
(9, 4, 'Mahesh Ippili send a freindrequest to you', 0, 1),
(10, 3, 'Raju dussa rejects your request', 0, 1),
(11, 4, 'Mahesh Ippili send a freindrequest to you', 0, 1),
(12, 3, 'Raju dussa accepts your request', 0, 1),
(13, 4, 'Mahesh Ippili send a freindrequest to you', 0, 1),
(14, 3, 'Raju dussa accepts your request', 0, 1),
(15, 5, 'Raju dussa send a freindrequest to you', 0, 1),
(16, 4, 'Rajkumar Varikalu accepts your request', 0, 1),
(17, 3, 'Rajkumar Varikalu send a freindrequest to you', 0, 1),
(18, 5, 'Mahesh Ippili accepts your request', 0, 1),
(19, 3, 'Rajkumar Varikalu likes a photo you uploaded', 0, 1),
(20, 3, 'Rajkumar Varikalu likes a photo you uploaded', 0, 1),
(21, 3, 'Rajkumar Varikalu likes a photo you uploaded', 0, 1),
(23, 4, 'Mahesh Ippili commented on a photo you uploaded', 0, 1),
(24, 3, 'Mahesh Ippili shared a post you posted', 0, 1),
(25, 3, 'Rajkumar Varikalu shared a post you posted', 0, 1),
(26, 5, 'Mahesh Ippili likes a photo you uploaded', 0, 1),
(27, 3, 'Mahesh Ippili likes a photo you uploaded', 0, 1),
(28, 3, 'Mahesh Ippili likes a photo you uploaded', 0, 1),
(29, 3, 'Mahesh Ippili commented on a photo you uploaded', 0, 1),
(30, 5, 'Today is Raju dussa Birthday', 0, 1),
(31, 5, 'Today is Raju dussa Birthday', 0, 1),
(32, 3, 'Today is Raju dussa Birthday', 0, 1),
(33, 5, 'Today is Raju dussa Birthday', 0, 1),
(34, 3, 'Today is Raju dussa Birthday', 0, 1),
(35, 5, 'Today is Raju dussa Birthday', 0, 1),
(36, 3, 'Today is Raju dussa Birthday', 0, 1),
(37, 5, 'Today is Raju dussa Birthday', 0, 1),
(38, 5, 'Today is Raju dussa Birthday', 0, 0),
(39, 3, 'Today is Raju dussa Birthday', 0, 1),
(40, 5, 'Today is Raju dussa Birthday', 0, 0),
(41, 3, 'Bulliraju Gunnam send a friendrequest to you', 0, 1),
(42, 6, 'Mahesh Ippili accepts your request', 0, 1),
(43, 3, 'Bulliraju Gunnam likes a photo you uploaded', 10, 1);

-- --------------------------------------------------------

--
-- Table structure for table `Users`
--

CREATE TABLE IF NOT EXISTS `Users` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `firstname` varchar(30) NOT NULL,
  `surname` varchar(30) NOT NULL,
  `username` varchar(30) NOT NULL,
  `password` varchar(10) NOT NULL,
  `gender` varchar(10) NOT NULL,
  `dob` date NOT NULL,
  `online` int(11) NOT NULL,
  `profile` varchar(100) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=7 ;

--
-- Dumping data for table `Users`
--

INSERT INTO `Users` (`id`, `firstname`, `surname`, `username`, `password`, `gender`, `dob`, `online`, `profile`) VALUES
(3, 'Mahesh', 'Ippili', '8179802491', 'mahesh', 'male', '1999-11-03', 1, 'profiles/3.jpg'),
(4, 'Raju', 'dussa', '8179802491', 'raju', 'male', '1998-05-28', 0, 'profiles/default.png'),
(5, 'Rajkumar', 'Varikalu', 'rajkumar', 'raju', 'male', '1999-08-25', 0, 'profiles/5.jpg'),
(6, 'Bulliraju', 'Gunnam', 'bulli', 'bulli', 'male', '1999-08-24', 1, 'profiles/default.png');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

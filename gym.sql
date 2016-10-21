-- phpMyAdmin SQL Dump
-- version 4.0.4
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Feb 22, 2015 at 06:00 PM
-- Server version: 5.6.12-log
-- PHP Version: 5.4.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `gym`
--
CREATE DATABASE IF NOT EXISTS `gym` DEFAULT CHARACTER SET latin1 COLLATE latin1_swedish_ci;
USE `gym`;

-- --------------------------------------------------------

--
-- Table structure for table `auth`
--

CREATE TABLE IF NOT EXISTS `auth` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `uname` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `role` varchar(100) NOT NULL,
  `status` tinyint(4) NOT NULL,
  `token` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=8 ;

--
-- Dumping data for table `auth`
--

INSERT INTO `auth` (`id`, `uname`, `email`, `password`, `role`, `status`, `token`) VALUES
(6, 'pawan', 'pawan@pawan.com', 'pawan', 'regular', 1, ''),
(7, 'admin', 'admin@admin.com', 'admin', 'admin', 1, '');

-- --------------------------------------------------------

--
-- Table structure for table `member`
--

CREATE TABLE IF NOT EXISTS `member` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `fname` varchar(255) NOT NULL,
  `mname` varchar(255) NOT NULL,
  `lname` varchar(255) NOT NULL,
  `gender` varchar(100) NOT NULL,
  `address` text NOT NULL,
  `area` varchar(255) NOT NULL,
  `telephone` varchar(12) NOT NULL,
  `telephone2` varchar(12) NOT NULL,
  `created` date DEFAULT NULL,
  `expired` tinyint(4) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=21 ;

--
-- Dumping data for table `member`
--

INSERT INTO `member` (`id`, `fname`, `mname`, `lname`, `gender`, `address`, `area`, `telephone`, `telephone2`, `created`, `expired`) VALUES
(17, 'vikram', 'bastimal', 'parihar', 'M', '', 'sumerpur', '9022349606', '', '2015-02-20', 1),
(18, 'vikram', 'bastimal', 'parihar', '0', '', 'sumerpur', '9022349606', '', '2015-02-20', 1),
(19, 'vikram', 'bastimal', 'parihar', 'M', '', 'sumerpur', '9022349606', '', '2015-02-20', 1),
(20, 'vikram', 'bastimal', 'parihar', 'M', '', 'sumerpur', '9022349606', '', '2015-02-22', 0);

-- --------------------------------------------------------

--
-- Table structure for table `member_plan`
--

CREATE TABLE IF NOT EXISTS `member_plan` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `member_id` int(11) NOT NULL,
  `package_type` varchar(255) NOT NULL,
  `package_period` varchar(255) NOT NULL,
  `start_date` date NOT NULL,
  `expire_date` date DEFAULT NULL,
  `paid` int(11) NOT NULL,
  `unpaid` int(11) NOT NULL DEFAULT '0',
  `next_installment` date DEFAULT NULL,
  `desc` text NOT NULL,
  `created` date DEFAULT NULL,
  `modified` date DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=15 ;

--
-- Dumping data for table `member_plan`
--

INSERT INTO `member_plan` (`id`, `member_id`, `package_type`, `package_period`, `start_date`, `expire_date`, `paid`, `unpaid`, `next_installment`, `desc`, `created`, `modified`) VALUES
(11, 17, '3', '7', '2014-08-15', '2014-11-01', 12000, 12000, '2015-02-20', '1200 rupees for 3 months', '2015-02-20', '2015-02-20'),
(12, 18, '8', '5', '2014-08-15', '2014-11-01', 12000, 12000, '2015-03-01', 'Weight training for 6 months 1500 fee plus 100 entry free total 1600 plus one month free total 7 month', '2015-02-20', '2015-02-20'),
(13, 19, '9', '10', '2014-08-15', '2014-11-01', 12000, 12000, '2015-02-20', '3 members ! per member 750 plus 100 entry fee (total 850).\r\ntotal 2550', '2015-02-20', '2015-02-20'),
(14, 20, '8', '4', '2015-02-22', '2015-03-23', 12000, 12000, '2015-03-20', 'Weight training for 3 months 800 fee plus 100 entry free total 900', '2015-02-22', '2015-02-22');

-- --------------------------------------------------------

--
-- Table structure for table `plan`
--

CREATE TABLE IF NOT EXISTS `plan` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  `code` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=10 ;

--
-- Dumping data for table `plan`
--

INSERT INTO `plan` (`id`, `name`, `code`) VALUES
(3, 'Cardio Training', 'CT'),
(4, 'Weight Training  plus Cardio Training  ', 'WCT'),
(8, 'Weight Training', 'WT'),
(9, 'group entry', 'GE');

-- --------------------------------------------------------

--
-- Table structure for table `temp`
--

CREATE TABLE IF NOT EXISTS `temp` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `flag` varchar(100) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=7 ;

--
-- Dumping data for table `temp`
--

INSERT INTO `temp` (`id`, `flag`) VALUES
(1, 'yes'),
(2, 'yes'),
(3, 'yes'),
(4, 'yes'),
(5, 'no'),
(6, 'yes');

-- --------------------------------------------------------

--
-- Table structure for table `teriff`
--

CREATE TABLE IF NOT EXISTS `teriff` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `plan_id` int(11) NOT NULL,
  `duration` varchar(255) NOT NULL,
  `price` int(11) NOT NULL,
  `offer` varchar(255) NOT NULL,
  `notes` text NOT NULL,
  PRIMARY KEY (`id`),
  KEY `plan_id` (`plan_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=12 ;

--
-- Dumping data for table `teriff`
--

INSERT INTO `teriff` (`id`, `plan_id`, `duration`, `price`, `offer`, `notes`) VALUES
(4, 8, '3  months', 900, 'none', 'Weight training for 3 months 800 fee plus 100 entry free total 900'),
(5, 8, '6 months', 1600, '1 month free', 'Weight training for 6 months 1500 fee plus 100 entry free total 1600 plus one month free total 7 month'),
(6, 8, '12 months', 3000, '2 months free', 'Weight training for 12 months 3000 fee plus 2 month free total 14 months'),
(7, 3, '3  months', 1200, 'none', '1200 rupees for 3 months'),
(8, 3, '6 months', 2000, '', '2000 rupees for 6 months'),
(9, 3, '12 months', 4000, '', '4000 rupees for 12 months'),
(10, 9, '3  months', 2550, '', '3 members ! per member 750 plus 100 entry fee (total 850).\r\ntotal 2550'),
(11, 9, '3  months', 4000, '', '5 members ! per member 700 plus 100 entry fee (total 800). total 4000');

--
-- Constraints for dumped tables
--

--
-- Constraints for table `teriff`
--
ALTER TABLE `teriff`
  ADD CONSTRAINT `teriff_ibfk_1` FOREIGN KEY (`plan_id`) REFERENCES `plan` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

-- phpMyAdmin SQL Dump
-- version 2.11.6
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: May 06, 2024 at 10:28 AM
-- Server version: 5.0.51
-- PHP Version: 5.2.6

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `fisherman`
--

-- --------------------------------------------------------

--
-- Table structure for table `fm_admin`
--

CREATE TABLE `fm_admin` (
  `username` varchar(20) NOT NULL,
  `password` varchar(20) NOT NULL,
  `fid` int(11) NOT NULL,
  `tid` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `fm_admin`
--

INSERT INTO `fm_admin` (`username`, `password`, `fid`, `tid`) VALUES
('admin', 'admin', 0, 1);

-- --------------------------------------------------------

--
-- Table structure for table `fm_authority`
--

CREATE TABLE `fm_authority` (
  `id` int(11) NOT NULL,
  `name` varchar(20) NOT NULL,
  `mobile` bigint(20) NOT NULL,
  `email` varchar(40) NOT NULL,
  `location` varchar(50) NOT NULL,
  `uname` varchar(20) NOT NULL,
  `pass` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `fm_authority`
--

INSERT INTO `fm_authority` (`id`, `name`, `mobile`, `email`, `location`, `uname`, `pass`) VALUES
(1, 'Naresh', 9894442716, 'naresh@gmail.com', 'Chennai', 'M1', '1234');

-- --------------------------------------------------------

--
-- Table structure for table `fm_fisher`
--

CREATE TABLE `fm_fisher` (
  `id` int(11) NOT NULL,
  `name` varchar(20) NOT NULL,
  `gender` varchar(10) NOT NULL,
  `dob` varchar(20) NOT NULL,
  `address` varchar(50) NOT NULL,
  `mobile` bigint(20) NOT NULL,
  `email` varchar(40) NOT NULL,
  `aadhar` varchar(50) NOT NULL,
  `fisher_card` varchar(50) NOT NULL,
  `uname` varchar(20) NOT NULL,
  `pass` varchar(20) NOT NULL,
  `rdate` varchar(20) NOT NULL,
  `approve_st` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `fm_fisher`
--

INSERT INTO `fm_fisher` (`id`, `name`, `gender`, `dob`, `address`, `mobile`, `email`, `aadhar`, `fisher_card`, `uname`, `pass`, `rdate`, `approve_st`) VALUES
(1, 'Siva', 'Male', '1997-06-05', '28, RR Kuppam', 9894442716, 'bgeduscanner@gmail.com', 'A1b6.jpg', 'F1fscard.png', 'F1', '123456', '06-05-2024', 1);

-- --------------------------------------------------------

--
-- Table structure for table `fm_history`
--

CREATE TABLE `fm_history` (
  `id` int(11) NOT NULL,
  `fisher` varchar(20) NOT NULL,
  `tid` int(11) NOT NULL,
  `location` varchar(30) NOT NULL,
  `status` varchar(30) NOT NULL,
  `rdate` varchar(20) NOT NULL,
  `rtime` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `fm_history`
--


-- --------------------------------------------------------

--
-- Table structure for table `fm_trip`
--

CREATE TABLE `fm_trip` (
  `id` int(11) NOT NULL,
  `fisher_id` varchar(20) NOT NULL,
  `sdate` varchar(20) NOT NULL,
  `stime` varchar(20) NOT NULL,
  `edate` varchar(20) NOT NULL,
  `etime` varchar(20) NOT NULL,
  `request_st` int(11) NOT NULL,
  `trip_st` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `fm_trip`
--

INSERT INTO `fm_trip` (`id`, `fisher_id`, `sdate`, `stime`, `edate`, `etime`, `request_st`, `trip_st`) VALUES
(1, 'F1', '06-05-2024', '9:10', '', '', 1, 1);

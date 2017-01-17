-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Aug 11, 2016 at 09:22 AM
-- Server version: 10.1.13-MariaDB
-- PHP Version: 5.6.23

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `lms`
--

-- --------------------------------------------------------

--
-- Table structure for table `author`
--

CREATE TABLE `author` (
  `aid` smallint(6) NOT NULL COMMENT 'auto incrementing author id',
  `topic_id` varchar(2) NOT NULL COMMENT 'topic id foreign key',
  `branch_id` varchar(2) NOT NULL COMMENT 'branch id foreign key',
  `author_id` varchar(4) NOT NULL COMMENT 'author id based on branch id ',
  `author_name` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `author`
--

INSERT INTO `author` (`aid`, `topic_id`, `branch_id`, `author_id`, `author_name`) VALUES
(1, '01', '01', '0001', 'hjavsi'),
(2, '01', '01', '0002', 'jhsv'),
(3, '01', '01', '0002', 'umang'),
(4, '03', '02', '0003', 'nilesh'),
(5, '01', '01', '0004', 'nilesh'),
(6, '02', '03', '0001', 'iwdjbfw'),
(7, '03', '02', '0002', 'kjbo'),
(8, '08', '02', '0001', 'hello'),
(9, '10', '01', '0001', 'kumbhojkar');

-- --------------------------------------------------------

--
-- Table structure for table `bloodgroup`
--

CREATE TABLE `bloodgroup` (
  `blood_id` int(3) NOT NULL,
  `blood_name` varchar(6) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `bloodgroup`
--

INSERT INTO `bloodgroup` (`blood_id`, `blood_name`) VALUES
(1, 'A+ve'),
(2, 'A-ve'),
(5, 'AB+ve'),
(6, 'AB-ve'),
(3, 'B+ve'),
(4, 'B-ve'),
(7, 'O+ve'),
(8, 'O-ve');

-- --------------------------------------------------------

--
-- Table structure for table `book`
--

CREATE TABLE `book` (
  `bk_id` mediumint(9) NOT NULL COMMENT 'auto incrementing bookid',
  `branch_id` varchar(2) NOT NULL COMMENT 'branch_id foreign key',
  `topic_id` varchar(2) NOT NULL COMMENT 'topic_id foreign key',
  `author_id` varchar(4) NOT NULL COMMENT 'author_id foreign key',
  `book_id` varchar(10) NOT NULL COMMENT 'book_id comprising of branch+topic+author+copy_id',
  `publication_id` tinyint(4) NOT NULL COMMENT 'publication_id foreign key',
  `copy` tinyint(2) NOT NULL COMMENT 'copy_id foreign key',
  `book_name` varchar(30) NOT NULL,
  `book_type` varchar(15) NOT NULL,
  `cost` varchar(10) NOT NULL,
  `purchase_date` varchar(15) NOT NULL COMMENT 'describes purchasing date of book'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `book`
--

INSERT INTO `book` (`bk_id`, `branch_id`, `topic_id`, `author_id`, `book_id`, `publication_id`, `copy`, `book_name`, `book_type`, `cost`, `purchase_date`) VALUES
(1, '01', '02', '0001', '0102000101', 1, 1, 'ok', 'Educational', '1111', '2015-10-13'),
(2, '01', '02', '0001', '0102000102', 1, 2, 'ok', 'Educational', '130', '2015-12-30');

-- --------------------------------------------------------

--
-- Table structure for table `bookold`
--

CREATE TABLE `bookold` (
  `bkold_id` mediumint(9) NOT NULL COMMENT 'auto incrementing bookoldid',
  `branch_id` varchar(2) NOT NULL COMMENT 'branch_id foreign key',
  `topic_id` varchar(2) NOT NULL COMMENT 'topic_id foreign key',
  `author_id` varchar(4) NOT NULL COMMENT 'author_id foreign key',
  `bookold_id` varchar(8) NOT NULL COMMENT 'book_id comprising of branch+topic+author+copy_id',
  `publication_id` tinyint(4) NOT NULL COMMENT 'publication_id foreign key',
  `copy_id` varchar(2) NOT NULL COMMENT 'copy_id foreign key',
  `bookold_name` varchar(30) NOT NULL,
  `cost` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `branch`
--

CREATE TABLE `branch` (
  `b_id` tinyint(4) NOT NULL COMMENT 'auto incrementing branch id',
  `branch_id` varchar(2) NOT NULL COMMENT 'same b_id with 0 as a prefix',
  `branch_name` varchar(40) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `branch`
--

INSERT INTO `branch` (`b_id`, `branch_id`, `branch_name`) VALUES
(1, '01', 'Computer Engineering'),
(2, '02', 'Electrical Engineering'),
(3, '03', 'Mechanical Engineering'),
(4, '04', 'Electrical Engineering'),
(5, '05', 'Civil Engineering'),
(6, '06', 'Instrumental Engineering'),
(7, '07', 'Electronics and Telecommunications'),
(8, '01', 'Science'),
(9, '09', 'commerce'),
(10, '10', 'arts'),
(11, '11', 'eco');

-- --------------------------------------------------------

--
-- Table structure for table `co-author`
--

CREATE TABLE `co-author` (
  `ca_id` smallint(6) NOT NULL COMMENT 'auto incrementing co-author id',
  `topic_id` varchar(2) NOT NULL COMMENT 'topic id foreign key',
  `branch_id` varchar(2) NOT NULL COMMENT 'branch id foreign key',
  `co-author_id` varchar(4) NOT NULL COMMENT 'co-author id based on branch id',
  `co-author_name` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `college`
--

CREATE TABLE `college` (
  `college_id` int(3) NOT NULL,
  `college_name` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `college`
--

INSERT INTO `college` (`college_id`, `college_name`) VALUES
(2, 'K.J Somaiya, Vidyavihar'),
(4, 'TSEC, Bandra'),
(3, 'VESIT, Chembur'),
(1, 'VJTI, Matunga');

-- --------------------------------------------------------

--
-- Table structure for table `copy`
--

CREATE TABLE `copy` (
  `c_id` tinyint(4) NOT NULL,
  `copy_id` varchar(2) NOT NULL,
  `copy_value` tinyint(4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `deposit`
--

CREATE TABLE `deposit` (
  `deposit_id` mediumint(9) NOT NULL,
  `member_id` mediumint(9) NOT NULL,
  `date` varchar(20) NOT NULL,
  `amount` varchar(5) NOT NULL,
  `booklet` varchar(10) NOT NULL,
  `receipt` varchar(10) NOT NULL,
  `returned` tinyint(4) NOT NULL COMMENT '0=withVSM,1=returned',
  `return_date` varchar(15) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `deposit`
--

INSERT INTO `deposit` (`deposit_id`, `member_id`, `date`, `amount`, `booklet`, `receipt`, `returned`, `return_date`) VALUES
(2, 2, '12/09/2014', '650', '8648', 'ut89', 1, '2016-05-05'),
(3, 42, '2016-04-30', '650', 'j', 'j', 0, NULL),
(4, 21, '2015-12-30', '650', '23AS', '1131', 0, NULL),
(5, 43, '2018-09-11', '1000', '123456', '123456', 0, NULL),
(6, 44, '2016-09-20', '10000', '1234567', '123456789', 0, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `fee`
--

CREATE TABLE `fee` (
  `id` int(11) NOT NULL,
  `member_id` mediumint(9) NOT NULL,
  `amount` mediumint(9) NOT NULL,
  `start_date` varchar(15) NOT NULL COMMENT 'taken by user',
  `end_date` varchar(15) NOT NULL COMMENT 'calculated by system',
  `period` tinyint(4) NOT NULL COMMENT 'in months,taken as input',
  `booklet` varchar(20) NOT NULL,
  `receipt` varchar(20) NOT NULL,
  `history` tinyint(4) DEFAULT NULL COMMENT '1=added in fee history on renewal'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `fee`
--

INSERT INTO `fee` (`id`, `member_id`, `amount`, `start_date`, `end_date`, `period`, `booklet`, `receipt`, `history`) VALUES
(1, 1, 450, '14-10-2015', '14-04-2016', 6, '2312', '2131', 1),
(3, 1, 450, '2014-12-31', '20146 month', 6, '2321', '2321', 1),
(4, 1, 450, '2014-12-31', '20146 month', 6, '2321', '2321', 1),
(5, 1, 450, '2014-12-31', '20146 month', 6, '2321', '2321', 1),
(6, 1, 450, '2014-12-31', '20146 month', 6, '2321', '2321', 1),
(7, 1, 450, '2014-12-31', '20146 month', 6, '2321', '2321', 1),
(8, 1, 450, '2014-12-31', '20146 month', 6, '2321', '2321', 1),
(9, 1, 450, '2014-12-31', '20146 month', 6, '2321', '2321', 1),
(10, 1, 450, '2014-12-31', '20146 month', 6, '2321', '2321', 1),
(11, 1, 450, '2014-12-31', '20146 month', 6, '2321', '2321', 1),
(12, 1, 450, '2014-12-31', '2014-12-31', 6, '2321', '2321', 1),
(13, 1, 450, '2014-12-31', '70-01-01', 6, '2321', '2321', 1),
(14, 1, 450, '2014-12-31', '70-01-01', 6, '2321', '2321', 1),
(15, 1, 450, '2014-12-31', '70-01-01', 6, '2321', '2321', 1),
(16, 1, 450, '2014-12-31', '70-01-01', 6, '2321', '2321', 1),
(17, 1, 450, '2014-12-31', '70-01-01', 6, '2321', '2321', 1),
(18, 1, 450, '2014-12-31', '70-01-01', 6, '2321', '2321', 1),
(19, 1, 450, '2014-12-31', '70-01-01', 6, '2321', '2321', 1),
(20, 1, 450, '2014-12-31', '70-01-01', 6, '2321', '2321', 1),
(21, 1, 450, '2014-12-31', '70-01-01', 6, '2321', '2321', 1),
(22, 1, 450, '2014-12-31', '70-01-01', 6, '2321', '2321', 1),
(23, 1, 450, '2014-12-31', '70-01-01', 6, '2321', '2321', 1),
(24, 1, 450, '2014-12-31', '70-01-01', 6, '2321', '2321', 1),
(25, 1, 450, '2014-12-31', '70-01-01', 6, '2321', '2321', 1),
(26, 1, 450, '2014-12-31', '70-01-01', 6, '2321', '2321', 1),
(27, 1, 450, '2014-12-31', '70-01-01', 6, '2321', '2321', 1),
(28, 1, 450, '2014-12-31', '70-01-01', 6, '2321', '2321', 1),
(29, 1, 450, '2014-12-31', '70-01-01', 6, '2321', '2321', 1),
(30, 1, 450, '2014-12-31', '70-01-01', 6, '2321', '2321', 1),
(31, 1, 450, '2014-12-31', '70-01-01', 6, '2321', '2321', 1),
(32, 1, 450, '2014-12-31', '70-01-01', 6, '2321', '2321', 1),
(33, 1, 450, '2014-12-31', '70-01-01', 6, '2321', '2321', 1),
(34, 1, 450, '2014-12-31', '70-01-01', 6, '2321', '2321', 1),
(35, 1, 450, '2014-12-31', '70-01-01', 6, '2321', '2321', 1),
(36, 1, 450, '2014-12-31', '70-01-01', 6, '2321', '2321', 1),
(37, 1, 450, '2014-12-31', '70-01-01', 6, '2321', '2321', 1),
(38, 1, 450, '2014-12-31', '70-01-01', 6, '2321', '2321', 1),
(39, 1, 450, '2014-12-31', '70-01-01', 6, '2321', '2321', 1),
(40, 1, 450, '2014-12-31', '15-06-30', 6, '2321', '2321', 1),
(41, 1, 200, '2016-08-05', '16-10-04', 2, '123456', '123456', NULL),
(42, 0, 200, '2016-08-05', '16-10-04', 2, '123456', '123456', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `fee_history`
--

CREATE TABLE `fee_history` (
  `id` int(11) NOT NULL,
  `member_id` mediumint(9) NOT NULL,
  `amount` mediumint(9) NOT NULL,
  `start_date` varchar(15) NOT NULL COMMENT 'taken by user',
  `end_date` varchar(15) NOT NULL COMMENT 'calculated by system',
  `period` tinyint(4) NOT NULL COMMENT 'in months,taken as input',
  `booklet` varchar(20) NOT NULL,
  `receipt` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `fee_history`
--

INSERT INTO `fee_history` (`id`, `member_id`, `amount`, `start_date`, `end_date`, `period`, `booklet`, `receipt`) VALUES
(1, 1, 450, '14-10-2015', '14-04-2016', 6, '2312', '2131'),
(1, 1, 450, '14-10-2015', '14-04-2016', 6, '2312', '2131'),
(3, 1, 450, '2014-12-31', '20146 month', 6, '2321', '2321'),
(1, 1, 450, '14-10-2015', '14-04-2016', 6, '2312', '2131'),
(3, 1, 450, '2014-12-31', '20146 month', 6, '2321', '2321'),
(4, 1, 450, '2014-12-31', '20146 month', 6, '2321', '2321');

-- --------------------------------------------------------

--
-- Table structure for table `fine_record`
--

CREATE TABLE `fine_record` (
  `id` int(11) NOT NULL,
  `member_id` int(11) NOT NULL,
  `amt_paid` smallint(6) NOT NULL,
  `date` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `fine_record`
--

INSERT INTO `fine_record` (`id`, `member_id`, `amt_paid`, `date`) VALUES
(12, 1, 2, 'July 7, 2016, 3:52 pm');

-- --------------------------------------------------------

--
-- Table structure for table `magazine`
--

CREATE TABLE `magazine` (
  `id` tinyint(4) NOT NULL,
  `magazine_id` varchar(5) NOT NULL,
  `magazine_name` varchar(100) NOT NULL,
  `publication_id` tinyint(4) NOT NULL,
  `author_id` varchar(4) NOT NULL,
  `cost` varchar(15) NOT NULL,
  `purchase_date` date NOT NULL,
  `book_type` varchar(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `magazine`
--

INSERT INTO `magazine` (`id`, `magazine_id`, `magazine_name`, `publication_id`, `author_id`, `cost`, `purchase_date`, `book_type`) VALUES
(1, '20001', 'ijb', 1, '0002', '120', '2014-12-31', 'Magazine');

-- --------------------------------------------------------

--
-- Table structure for table `member`
--

CREATE TABLE `member` (
  `member_id` smallint(6) NOT NULL,
  `first_name` varchar(20) NOT NULL,
  `middle_name` varchar(20) NOT NULL,
  `last_name` varchar(20) NOT NULL,
  `date_of_birth` date NOT NULL,
  `email` varchar(50) NOT NULL,
  `contact_1` varchar(12) NOT NULL,
  `contact_2` varchar(12) DEFAULT NULL,
  `address_building` varchar(50) NOT NULL,
  `address_street` varchar(50) NOT NULL,
  `address_city` varchar(25) NOT NULL,
  `address_state` int(2) NOT NULL,
  `address_pin` varchar(6) NOT NULL,
  `date_of_joining` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `type` varchar(10) NOT NULL,
  `college` int(3) NOT NULL,
  `company` varchar(50) DEFAULT NULL,
  `course` varchar(10) NOT NULL,
  `current_year` smallint(2) DEFAULT NULL,
  `gender` varchar(6) NOT NULL,
  `blood_group` int(2) DEFAULT NULL,
  `university` int(3) NOT NULL,
  `year_of_passing` varchar(16) DEFAULT NULL,
  `designation` varchar(30) DEFAULT NULL,
  `domain_of_work` varchar(30) DEFAULT NULL,
  `status` tinyint(1) NOT NULL,
  `branch` tinyint(4) NOT NULL COMMENT 'refers to b_id in branch table'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `member`
--

INSERT INTO `member` (`member_id`, `first_name`, `middle_name`, `last_name`, `date_of_birth`, `email`, `contact_1`, `contact_2`, `address_building`, `address_street`, `address_city`, `address_state`, `address_pin`, `date_of_joining`, `type`, `college`, `company`, `course`, `current_year`, `gender`, `blood_group`, `university`, `year_of_passing`, `designation`, `domain_of_work`, `status`, `branch`) VALUES
(1, 'Nilesh', 'Chander', 'Thadani', '1994-07-19', 'thadaninilesh@gmail.in', '09372111555', '', 'This is my address', 'qwerty', 'Ulhasnagar', 21, '421002', '2016-05-03 09:33:55', 'Student', 3, 'VSM', 'Degree', 4, 'Male', 3, 1, '2016-05', 'Volunteer', 'Web', 1, 1),
(2, 'Nisha', 'Raju', 'Sajnani', '1995-07-09', 'sajnaninisha19@gmail.com', '9022414157', '', 'my building', 'my street', 'ulhasnagar', 21, '421003', '2016-05-05 17:47:05', 'Student', 3, 'VSM', 'Degree', 4, 'Male', 3, 1, '2015-12', '', '', 0, 5),
(3, 'Viraj', 'A', 'Khatavkar', '2015-12-31', 'viraj.2438@gmail.com', '9876543212', '', 'qwerty', 'wertyghj', 'dombivli', 21, '432123', '2016-05-02 09:33:58', 'Student', 3, '', 'Degree', 0, 'Male', 1, 1, '2014-05', '', '', 1, 1),
(4, 'a', 'b', 'c', '2015-12-31', 'qwe@dvs.com', '1234567890', '', 'asdfgy', 'scvbh', 'scvgh', 11, '987654', '2016-05-02 09:13:55', 'Working', 4, 'shjd', 'Diploma', 1, 'Male', 1, 2, '2015-12', 'iv', 'ihv', 0, 1),
(5, 'hv', 'v', 'hv', '2013-12-31', 'hv@jh.ikbj', '1987654333', '', 'hfu', 'uhvv', 'hvh', 1, '654321', '2016-05-02 09:05:58', 'Student', 2, '', 'Degree', 0, 'Male', 3, 1, '2015-12', '', '', 0, 5),
(6, 'nishu', 'm', 'sajnani', '2004-07-15', 'nisha.sajnani@ves.ac.in', '9876543211', '', 'hjvib', 'jhvihv', 'Ulhasnagar', 1, '421002', '2015-06-18 09:41:17', 'Student', 2, '', 'Degree', 2, 'Male', 1, 1, '2019-02', '', '', 1, 1),
(7, 'nisha', 'kjbJKB', 'jb', '2014-09-05', 'ob@iv.com', '1234512123', '', 'ojbgjbi', 'uibiubib', 'Ulhasnagar', 21, '421002', '2015-06-23 18:09:32', 'Student', 2, 'VSM', 'Degree', 0, 'Male', 1, 1, '2014-12', '', '', 1, 2),
(8, 'ihv', 'hvj', 'ihjvij', '2008-05-31', 'jhb@kjb.in', '1234567890', '', 'yfchjb', 'ibib', 'iubibjkb', 1, '432123', '2015-06-23 18:11:06', 'Working', 2, '', 'Degree', 0, 'Female', 2, 1, '2014-12', '', '', 1, 2),
(9, 'Nilesh', 'dbobdbo', 'obob', '2014-11-30', 'kjbd@lb.com', '1234567890', '', 'kjbb', 'ojbob', 'Ulhasnagar', 21, '421002', '2015-06-23 18:29:52', 'Student', 2, '', 'Degree', 2, 'Male', 1, 1, '2014-12', '', '', 1, 1),
(10, 'lknp', 'onion', 'oknon', '2003-11-30', 'linon@onb.com', '1234567890', '', 'khjbvib', 'ibibib', 'ibib', 1, '123456', '2015-06-24 08:41:34', 'Working', 4, '', 'Degree', 1, 'Female', 1, 2, '2014-12', '', '', 1, 2),
(11, 'hema', 'ijb', 'ivb', '2002-12-31', 'dfv@oujb.com', '1234567891', '', 'sdf', 'dfv', 'Ulhasnagar', 21, '421002', '2016-05-02 09:06:53', 'Student', 2, 'VSM', 'Degree', 1, 'Female', 1, 1, '2015-12', '', '', 0, 1),
(12, 'nilesh', 'chander', 'thadani', '2014-12-31', 'milesh@gmail.com', '9372111555', '', 'snow white', 'aman talkies', 'Ulhasnagar', 21, '421003', '2015-06-29 05:59:18', 'Student', 3, 'VSM', 'Degree', 4, 'Male', 3, 1, '2016-06', '', '', 1, 1),
(14, 'Umang', 'Chander', 'Thadani', '2016-04-10', 'umang@gmail.com', '8087041707', '', 'Snow White Society', 'Near Aman Talkies', 'Ulhasnagar', 1, '421002', '2016-04-23 08:32:19', 'Student', 2, '', 'Degree', 2, 'Male', 2, 1, '2016-12', '', '', 1, 1),
(21, 'Chander', 'G', 'Thadani', '1968-10-31', 'chander@gmail.com', '123456789', '', 'trfu uihin ', ' ini ij', 'kjbkjbijb', 1, '421001', '2016-05-03 05:30:56', 'Working', 2, '', 'Degree', 3, 'Male', 1, 1, '2016-12', '', '', 1, 1),
(42, 'iub', 'bi', 'bib', '1984-07-31', 'ub@ib.ci', '2345678', '', 'tfubkjbkji hij ijni', 'ihoihini jnij ', 'uhbiubu', 8, '345678', '2016-05-02 19:31:00', 'Working', 2, '', 'Degree', 3, 'Male', 1, 1, '2016-11', '', '', 1, 1),
(43, 'madhukar', 'ss', 'f f', '1990-11-01', 'abc@gmail.com', '9820982098', '', 'de', 'dad', 'Dombivli', 21, '421202', '2016-08-11 07:11:53', 'Student', 3, '', 'Degree', 2, 'Male', 8, 1, '2018-02', '', '', 0, 1),
(44, 'Pavankumar', 'M', 'Sakhare', '1996-11-07', 'abc123@gmail.com', '9876543210', '', 'abc', 'abc', 'Dombivli', 21, '421202', '2016-08-11 05:08:19', 'Student', 3, '', 'Degree', 3, 'Male', 1, 1, '2018-04', '', '', 1, 2);

-- --------------------------------------------------------

--
-- Table structure for table `member_fine`
--

CREATE TABLE `member_fine` (
  `id` int(11) NOT NULL,
  `member_id` int(11) NOT NULL,
  `transaction_id` int(11) NOT NULL,
  `total_fine` smallint(6) NOT NULL,
  `paid_fine` smallint(6) NOT NULL,
  `updated_at` varchar(30) NOT NULL,
  `full_pay` tinyint(4) NOT NULL COMMENT '0=pending, 1=complete'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `member_fine`
--

INSERT INTO `member_fine` (`id`, `member_id`, `transaction_id`, `total_fine`, `paid_fine`, `updated_at`, `full_pay`) VALUES
(12, 1, 17, 4, 2, 'July 7, 2016, 3:52 pm', 0);

-- --------------------------------------------------------

--
-- Table structure for table `novel`
--

CREATE TABLE `novel` (
  `id` tinyint(4) NOT NULL,
  `novel_id` varchar(5) NOT NULL,
  `novel_name` varchar(100) NOT NULL,
  `author_id` varchar(4) NOT NULL,
  `cost` varchar(15) NOT NULL,
  `purchase_date` date NOT NULL,
  `publication_id` tinyint(4) NOT NULL,
  `book_type` varchar(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `novel`
--

INSERT INTO `novel` (`id`, `novel_id`, `novel_name`, `author_id`, `cost`, `purchase_date`, `publication_id`, `book_type`) VALUES
(1, '10001', 'sdijfb', '0002', '1110', '2014-12-31', 1, 'Novel');

-- --------------------------------------------------------

--
-- Table structure for table `publication`
--

CREATE TABLE `publication` (
  `p_id` tinyint(4) NOT NULL COMMENT 'foreign key in book relation',
  `publication_name` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `publication`
--

INSERT INTO `publication` (`p_id`, `publication_name`) VALUES
(1, 'abc'),
(2, 'xyz'),
(3, 'nirali'),
(4, 'techmax'),
(5, 'technical');

-- --------------------------------------------------------

--
-- Table structure for table `state`
--

CREATE TABLE `state` (
  `state_id` int(3) NOT NULL,
  `state_name` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `state`
--

INSERT INTO `state` (`state_id`, `state_name`) VALUES
(1, 'Andaman and Nicobar Islands'),
(2, 'Andhra Pradesh'),
(3, 'Arunachal Pradesh'),
(4, 'Assam'),
(5, 'Bihar'),
(6, 'Chandigarh'),
(7, 'Chhattisgarh'),
(8, 'Dadra and Nagar Haveli'),
(9, 'Daman and Diu'),
(10, 'Delhi'),
(11, 'Goa'),
(12, 'Gujarat'),
(13, 'Haryana'),
(14, 'Himachal Pradesh'),
(15, 'Jammu and Kashmir'),
(16, 'Jharkhand'),
(17, 'Karnataka'),
(18, 'Kerala'),
(19, 'Lakshadweep'),
(20, 'Madhya Pradesh'),
(21, 'Maharashtra'),
(22, 'Manipur'),
(23, 'Meghalaya'),
(24, 'Mizoram'),
(25, 'Nagaland'),
(26, 'Odisha'),
(27, 'Puducherry?'),
(28, 'Punjab'),
(29, 'Rajasthan'),
(30, 'Sikkim'),
(31, 'Tamil Nadu'),
(32, 'Telangana'),
(33, 'Tripura'),
(34, 'Uttar Pradesh'),
(35, 'Uttarakhand'),
(36, 'West Bengal');

-- --------------------------------------------------------

--
-- Table structure for table `status`
--

CREATE TABLE `status` (
  `status_id` tinyint(1) NOT NULL,
  `status_name` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `status`
--

INSERT INTO `status` (`status_id`, `status_name`) VALUES
(1, 'Active'),
(0, 'Inactive');

-- --------------------------------------------------------

--
-- Table structure for table `topic`
--

CREATE TABLE `topic` (
  `tid` smallint(6) NOT NULL COMMENT 'autoincrementing id',
  `topic_id` varchar(2) NOT NULL COMMENT 'topic id based on branch id',
  `branch_id` varchar(2) NOT NULL COMMENT 'branch id foreign key',
  `topic_name` varchar(30) NOT NULL COMMENT 'topic name'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `topic`
--

INSERT INTO `topic` (`tid`, `topic_id`, `branch_id`, `topic_name`) VALUES
(1, '01', '01', 'html'),
(2, '02', '01', 'php'),
(3, '03', '03', 'java'),
(4, '04', '04', 'c++4'),
(5, '01', '03', 'comps'),
(6, '01', '01', 'it'),
(7, '01', '01', 'it'),
(8, '01', '01', 'it'),
(9, '01', '01', 'it'),
(10, '01', '01', 'it'),
(11, '03', '03', 'isjbd'),
(12, '08', '01', 'asdfgh'),
(13, '04', '03', 'web'),
(14, '02', '01', 'Web'),
(15, '10', '01', 'C');

-- --------------------------------------------------------

--
-- Table structure for table `transaction_issue`
--

CREATE TABLE `transaction_issue` (
  `t_id` int(10) UNSIGNED NOT NULL,
  `book_id` varchar(11) NOT NULL,
  `book_type` tinyint(3) UNSIGNED NOT NULL COMMENT '0=edu, 1=magazine,2=novel',
  `member_id` varchar(11) NOT NULL,
  `issue_date` varchar(50) NOT NULL,
  `return_date` varchar(50) NOT NULL,
  `returned_on` varchar(30) NOT NULL,
  `status` tinyint(4) NOT NULL DEFAULT '0' COMMENT '0=not returned | 1=returned'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `transaction_issue`
--

INSERT INTO `transaction_issue` (`t_id`, `book_id`, `book_type`, `member_id`, `issue_date`, `return_date`, `returned_on`, `status`) VALUES
(1, '20001', 1, '1', 'July 2, 2016, 6:34 pm', '16-07-2016', '', 1),
(2, '10001', 2, '3', 'July 3, 2016, 7:00 pm', '09-07-2016', '', 1),
(3, '0102000101', 0, '1', 'June 1, 2016, 10:00 pm', '02-06-2016', '0', 1),
(4, '0102000102', 0, '1', 'July 4, 2016, 8:03 pm', '18-07-2016', '', 1),
(5, '0102000101', 0, '1', 'July 4, 2016, 8:03 pm', '18-07-2016', '0', 1),
(6, '20001', 1, '1', 'July 4, 2016, 8:21 pm', '18-07-2016', '', 1),
(7, '20001', 1, '1', 'July 4, 2016, 8:22 pm', '18-07-2016', '', 1),
(8, '20001', 1, '1', 'July 4, 2016, 8:24 pm', '18-07-2016', '', 1),
(9, '20001', 1, '1', 'July 4, 2016, 8:26 pm', '18-07-2016', '', 1),
(10, '20001', 1, '1', 'July 2, 2016, 8:26 pm', '05-07-2016', 'July 7, 2016, 3:52 pm', 1),
(11, '0102000101', 0, '1', 'July 4, 2016, 8:27 pm', '18-07-2016', '0', 1),
(12, '0102000101', 0, '1', 'July 7, 2016, 1:12 pm', '21-07-2016', 'July 7, 2016, 1:24 pm', 1),
(13, '0102000101', 0, '43', 'July 4, 2016, 5:35 am', '09-08-2016', 'August 3, 2016, 3:02 am', 1),
(14, '0102000102', 0, '42', 'August 11, 2016, 4:07 am', '25-08-2016', 'August 11, 2016, 4:53 am', 1),
(22, '0102000102', 0, '42', 'August 11, 2016, 5:18 am', '25-08-2016', '0', 1),
(23, '0102000101', 0, '44', 'August 11, 2016, 8:51 am', '18-08-2016', '0', 0),
(24, '0102000102', 0, '42', 'August 11, 2016, 9:00 am', '25-08-2016', '0', 0);

-- --------------------------------------------------------

--
-- Table structure for table `university`
--

CREATE TABLE `university` (
  `university_id` int(3) NOT NULL,
  `university_name` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `university`
--

INSERT INTO `university` (`university_id`, `university_name`) VALUES
(1, 'Mumbai University'),
(2, 'Pune University');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(10) UNSIGNED NOT NULL,
  `uname` varchar(100) DEFAULT NULL,
  `pword` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `uname`, `pword`) VALUES
(1, 'admin', '202cb962ac59075b964b07152d234b70');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `author`
--
ALTER TABLE `author`
  ADD PRIMARY KEY (`aid`),
  ADD UNIQUE KEY `aid` (`aid`),
  ADD KEY `topic_id` (`topic_id`,`branch_id`),
  ADD KEY `branch_id` (`branch_id`),
  ADD KEY `author_name` (`author_name`),
  ADD KEY `author_id` (`author_id`);

--
-- Indexes for table `bloodgroup`
--
ALTER TABLE `bloodgroup`
  ADD PRIMARY KEY (`blood_id`),
  ADD KEY `blood_name` (`blood_name`);

--
-- Indexes for table `book`
--
ALTER TABLE `book`
  ADD PRIMARY KEY (`bk_id`),
  ADD UNIQUE KEY `bk_id` (`bk_id`),
  ADD KEY `branch_id` (`branch_id`,`topic_id`,`author_id`,`publication_id`,`copy`),
  ADD KEY `topic_id` (`topic_id`),
  ADD KEY `author_id` (`author_id`),
  ADD KEY `publication_id` (`publication_id`),
  ADD KEY `copy_id` (`copy`),
  ADD KEY `book_id` (`book_id`);

--
-- Indexes for table `bookold`
--
ALTER TABLE `bookold`
  ADD PRIMARY KEY (`bkold_id`),
  ADD UNIQUE KEY `bk_id` (`bkold_id`),
  ADD KEY `branch_id` (`branch_id`,`topic_id`,`author_id`,`publication_id`,`copy_id`),
  ADD KEY `topic_id` (`topic_id`),
  ADD KEY `author_id` (`author_id`),
  ADD KEY `publication_id` (`publication_id`),
  ADD KEY `copy_id` (`copy_id`),
  ADD KEY `bookold_id` (`bookold_id`);

--
-- Indexes for table `branch`
--
ALTER TABLE `branch`
  ADD PRIMARY KEY (`b_id`),
  ADD UNIQUE KEY `b_id` (`b_id`),
  ADD KEY `branch_name` (`branch_name`),
  ADD KEY `branch_name_2` (`branch_name`),
  ADD KEY `branch_id` (`branch_id`);

--
-- Indexes for table `co-author`
--
ALTER TABLE `co-author`
  ADD PRIMARY KEY (`ca_id`),
  ADD UNIQUE KEY `ca_id` (`ca_id`),
  ADD KEY `topic_id` (`topic_id`,`branch_id`),
  ADD KEY `branch_id` (`branch_id`),
  ADD KEY `co-author_name` (`co-author_name`),
  ADD KEY `co-author_id` (`co-author_id`);

--
-- Indexes for table `college`
--
ALTER TABLE `college`
  ADD PRIMARY KEY (`college_id`),
  ADD KEY `college_name` (`college_name`);

--
-- Indexes for table `copy`
--
ALTER TABLE `copy`
  ADD PRIMARY KEY (`copy_id`),
  ADD UNIQUE KEY `c_id` (`c_id`);

--
-- Indexes for table `deposit`
--
ALTER TABLE `deposit`
  ADD PRIMARY KEY (`deposit_id`),
  ADD UNIQUE KEY `member_id` (`member_id`);

--
-- Indexes for table `fee`
--
ALTER TABLE `fee`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `fine_record`
--
ALTER TABLE `fine_record`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `magazine`
--
ALTER TABLE `magazine`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `magazineid` (`magazine_id`),
  ADD KEY `publicationid` (`publication_id`),
  ADD KEY `author_id` (`author_id`);

--
-- Indexes for table `member`
--
ALTER TABLE `member`
  ADD PRIMARY KEY (`member_id`),
  ADD UNIQUE KEY `member_email` (`email`),
  ADD KEY `member_bloodgroup` (`blood_group`,`university`,`branch`),
  ADD KEY `member_branch` (`branch`),
  ADD KEY `member_university` (`university`),
  ADD KEY `blood_group` (`blood_group`),
  ADD KEY `college` (`college`),
  ADD KEY `address_state` (`address_state`),
  ADD KEY `type_id` (`type`),
  ADD KEY `type` (`type`),
  ADD KEY `status` (`status`),
  ADD KEY `status_2` (`status`);

--
-- Indexes for table `member_fine`
--
ALTER TABLE `member_fine`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `transaction_id` (`transaction_id`);

--
-- Indexes for table `novel`
--
ALTER TABLE `novel`
  ADD PRIMARY KEY (`id`),
  ADD KEY `authorid` (`author_id`),
  ADD KEY `publication_id` (`publication_id`);

--
-- Indexes for table `publication`
--
ALTER TABLE `publication`
  ADD PRIMARY KEY (`p_id`),
  ADD KEY `p_id` (`p_id`);

--
-- Indexes for table `state`
--
ALTER TABLE `state`
  ADD PRIMARY KEY (`state_id`),
  ADD KEY `state_name` (`state_name`),
  ADD KEY `state_id` (`state_id`);

--
-- Indexes for table `status`
--
ALTER TABLE `status`
  ADD PRIMARY KEY (`status_id`),
  ADD KEY `status_name` (`status_name`);

--
-- Indexes for table `topic`
--
ALTER TABLE `topic`
  ADD PRIMARY KEY (`tid`),
  ADD UNIQUE KEY `tid` (`tid`),
  ADD KEY `branch_id` (`branch_id`),
  ADD KEY `topic_id` (`topic_id`);

--
-- Indexes for table `transaction_issue`
--
ALTER TABLE `transaction_issue`
  ADD PRIMARY KEY (`t_id`);

--
-- Indexes for table `university`
--
ALTER TABLE `university`
  ADD PRIMARY KEY (`university_id`),
  ADD KEY `university_name` (`university_name`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `author`
--
ALTER TABLE `author`
  MODIFY `aid` smallint(6) NOT NULL AUTO_INCREMENT COMMENT 'auto incrementing author id', AUTO_INCREMENT=10;
--
-- AUTO_INCREMENT for table `bloodgroup`
--
ALTER TABLE `bloodgroup`
  MODIFY `blood_id` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
--
-- AUTO_INCREMENT for table `book`
--
ALTER TABLE `book`
  MODIFY `bk_id` mediumint(9) NOT NULL AUTO_INCREMENT COMMENT 'auto incrementing bookid', AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `bookold`
--
ALTER TABLE `bookold`
  MODIFY `bkold_id` mediumint(9) NOT NULL AUTO_INCREMENT COMMENT 'auto incrementing bookoldid';
--
-- AUTO_INCREMENT for table `branch`
--
ALTER TABLE `branch`
  MODIFY `b_id` tinyint(4) NOT NULL AUTO_INCREMENT COMMENT 'auto incrementing branch id', AUTO_INCREMENT=12;
--
-- AUTO_INCREMENT for table `co-author`
--
ALTER TABLE `co-author`
  MODIFY `ca_id` smallint(6) NOT NULL AUTO_INCREMENT COMMENT 'auto incrementing co-author id';
--
-- AUTO_INCREMENT for table `college`
--
ALTER TABLE `college`
  MODIFY `college_id` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `copy`
--
ALTER TABLE `copy`
  MODIFY `c_id` tinyint(4) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `deposit`
--
ALTER TABLE `deposit`
  MODIFY `deposit_id` mediumint(9) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT for table `fee`
--
ALTER TABLE `fee`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=43;
--
-- AUTO_INCREMENT for table `fine_record`
--
ALTER TABLE `fine_record`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;
--
-- AUTO_INCREMENT for table `magazine`
--
ALTER TABLE `magazine`
  MODIFY `id` tinyint(4) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `member`
--
ALTER TABLE `member`
  MODIFY `member_id` smallint(6) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=45;
--
-- AUTO_INCREMENT for table `member_fine`
--
ALTER TABLE `member_fine`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;
--
-- AUTO_INCREMENT for table `novel`
--
ALTER TABLE `novel`
  MODIFY `id` tinyint(4) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `publication`
--
ALTER TABLE `publication`
  MODIFY `p_id` tinyint(4) NOT NULL AUTO_INCREMENT COMMENT 'foreign key in book relation', AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT for table `state`
--
ALTER TABLE `state`
  MODIFY `state_id` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=37;
--
-- AUTO_INCREMENT for table `topic`
--
ALTER TABLE `topic`
  MODIFY `tid` smallint(6) NOT NULL AUTO_INCREMENT COMMENT 'autoincrementing id', AUTO_INCREMENT=16;
--
-- AUTO_INCREMENT for table `transaction_issue`
--
ALTER TABLE `transaction_issue`
  MODIFY `t_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;
--
-- AUTO_INCREMENT for table `university`
--
ALTER TABLE `university`
  MODIFY `university_id` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- Constraints for dumped tables
--

--
-- Constraints for table `author`
--
ALTER TABLE `author`
  ADD CONSTRAINT `author_ibfk_1` FOREIGN KEY (`topic_id`) REFERENCES `topic` (`topic_id`),
  ADD CONSTRAINT `author_ibfk_2` FOREIGN KEY (`branch_id`) REFERENCES `branch` (`branch_id`);

--
-- Constraints for table `book`
--
ALTER TABLE `book`
  ADD CONSTRAINT `book_ibfk_1` FOREIGN KEY (`branch_id`) REFERENCES `branch` (`branch_id`),
  ADD CONSTRAINT `book_ibfk_2` FOREIGN KEY (`topic_id`) REFERENCES `topic` (`topic_id`),
  ADD CONSTRAINT `book_ibfk_3` FOREIGN KEY (`author_id`) REFERENCES `author` (`author_id`),
  ADD CONSTRAINT `book_ibfk_4` FOREIGN KEY (`publication_id`) REFERENCES `publication` (`p_id`);

--
-- Constraints for table `bookold`
--
ALTER TABLE `bookold`
  ADD CONSTRAINT `bookold_ibfk_1` FOREIGN KEY (`branch_id`) REFERENCES `branch` (`branch_id`),
  ADD CONSTRAINT `bookold_ibfk_2` FOREIGN KEY (`topic_id`) REFERENCES `topic` (`topic_id`),
  ADD CONSTRAINT `bookold_ibfk_3` FOREIGN KEY (`author_id`) REFERENCES `author` (`author_id`),
  ADD CONSTRAINT `bookold_ibfk_4` FOREIGN KEY (`publication_id`) REFERENCES `publication` (`p_id`),
  ADD CONSTRAINT `bookold_ibfk_5` FOREIGN KEY (`copy_id`) REFERENCES `copy` (`copy_id`);

--
-- Constraints for table `co-author`
--
ALTER TABLE `co-author`
  ADD CONSTRAINT `co@002dauthor_ibfk_1` FOREIGN KEY (`ca_id`) REFERENCES `author` (`aid`),
  ADD CONSTRAINT `co@002dauthor_ibfk_2` FOREIGN KEY (`topic_id`) REFERENCES `topic` (`topic_id`),
  ADD CONSTRAINT `co@002dauthor_ibfk_3` FOREIGN KEY (`co-author_id`) REFERENCES `author` (`author_id`),
  ADD CONSTRAINT `co@002dauthor_ibfk_4` FOREIGN KEY (`branch_id`) REFERENCES `branch` (`branch_id`),
  ADD CONSTRAINT `co@002dauthor_ibfk_5` FOREIGN KEY (`co-author_name`) REFERENCES `author` (`author_name`);

--
-- Constraints for table `magazine`
--
ALTER TABLE `magazine`
  ADD CONSTRAINT `magazine_ibfk_1` FOREIGN KEY (`publication_id`) REFERENCES `publication` (`p_id`);

--
-- Constraints for table `member`
--
ALTER TABLE `member`
  ADD CONSTRAINT `member_ibfk_1` FOREIGN KEY (`address_state`) REFERENCES `state` (`state_id`) ON UPDATE CASCADE,
  ADD CONSTRAINT `member_ibfk_3` FOREIGN KEY (`university`) REFERENCES `university` (`university_id`) ON UPDATE CASCADE,
  ADD CONSTRAINT `member_ibfk_5` FOREIGN KEY (`college`) REFERENCES `college` (`college_id`) ON UPDATE CASCADE,
  ADD CONSTRAINT `member_ibfk_6` FOREIGN KEY (`blood_group`) REFERENCES `bloodgroup` (`blood_id`),
  ADD CONSTRAINT `member_ibfk_7` FOREIGN KEY (`status`) REFERENCES `status` (`status_id`) ON UPDATE CASCADE,
  ADD CONSTRAINT `member_ibfk_8` FOREIGN KEY (`branch`) REFERENCES `branch` (`b_id`);

--
-- Constraints for table `novel`
--
ALTER TABLE `novel`
  ADD CONSTRAINT `novel_ibfk_1` FOREIGN KEY (`publication_id`) REFERENCES `publication` (`p_id`);

--
-- Constraints for table `topic`
--
ALTER TABLE `topic`
  ADD CONSTRAINT `topic_ibfk_1` FOREIGN KEY (`branch_id`) REFERENCES `branch` (`branch_id`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

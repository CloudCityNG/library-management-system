-- phpMyAdmin SQL Dump
-- version 4.5.4.1
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Jan 19, 2017 at 02:45 PM
-- Server version: 5.5.53-0ubuntu0.14.04.1
-- PHP Version: 7.0.12-1+deb.sury.org~trusty+1

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

-- --------------------------------------------------------

--
-- Table structure for table `college`
--

CREATE TABLE `college` (
  `college_id` int(3) NOT NULL,
  `college_name` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

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
-- Table structure for table `co_author`
--

CREATE TABLE `co_author` (
  `ca_id` smallint(6) NOT NULL COMMENT 'auto incrementing co-author id',
  `topic_id` varchar(2) NOT NULL COMMENT 'topic id foreign key',
  `branch_id` varchar(2) NOT NULL COMMENT 'branch id foreign key',
  `co-author_id` varchar(4) NOT NULL COMMENT 'co-author id based on branch id',
  `co-author_name` varchar(30) NOT NULL
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

-- --------------------------------------------------------

--
-- Table structure for table `publication`
--

CREATE TABLE `publication` (
  `p_id` tinyint(4) NOT NULL COMMENT 'foreign key in book relation',
  `publication_name` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `settings`
--

CREATE TABLE `settings` (
  `id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `value` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `settings`
--

INSERT INTO `settings` (`id`, `name`, `value`) VALUES
(1, 'FEE', '1500'),
(2, 'DEPOSIT', '205');

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

-- --------------------------------------------------------

--
-- Table structure for table `university`
--

CREATE TABLE `university` (
  `university_id` int(3) NOT NULL,
  `university_name` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `mobile` varchar(11) NOT NULL,
  `username` varchar(100) NOT NULL,
  `password` varchar(256) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `mobile`, `username`, `password`, `created_at`) VALUES
(2, 'Nilesh Thadani', 'thadaninilesh@gmail.com', '9372111555', 'thadaninilesh', 'e0b7a311043ce8d5c24c3dee0ae23e36ad9342adf3f2d760922128cd55daefb2', '2017-01-16 16:38:17'),
(3, 'VSM', 'admin@lms.com', '9323773777', 'admin', '8c6976e5b5410415bde908bd4dee15dfb167a9c873fc4bb8a81f6f2ab448a918', '2017-01-19 14:37:06');

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
-- Indexes for table `co_author`
--
ALTER TABLE `co_author`
  ADD PRIMARY KEY (`ca_id`),
  ADD UNIQUE KEY `ca_id` (`ca_id`),
  ADD KEY `topic_id` (`topic_id`,`branch_id`),
  ADD KEY `branch_id` (`branch_id`),
  ADD KEY `co-author_name` (`co-author_name`),
  ADD KEY `co-author_id` (`co-author_id`);

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
-- Indexes for table `settings`
--
ALTER TABLE `settings`
  ADD PRIMARY KEY (`id`);

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
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `email` (`email`),
  ADD UNIQUE KEY `mobile` (`mobile`),
  ADD UNIQUE KEY `username` (`username`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `author`
--
ALTER TABLE `author`
  MODIFY `aid` smallint(6) NOT NULL AUTO_INCREMENT COMMENT 'auto incrementing author id';
--
-- AUTO_INCREMENT for table `bloodgroup`
--
ALTER TABLE `bloodgroup`
  MODIFY `blood_id` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
--
-- AUTO_INCREMENT for table `book`
--
ALTER TABLE `book`
  MODIFY `bk_id` mediumint(9) NOT NULL AUTO_INCREMENT COMMENT 'auto incrementing bookid';
--
-- AUTO_INCREMENT for table `bookold`
--
ALTER TABLE `bookold`
  MODIFY `bkold_id` mediumint(9) NOT NULL AUTO_INCREMENT COMMENT 'auto incrementing bookoldid';
--
-- AUTO_INCREMENT for table `branch`
--
ALTER TABLE `branch`
  MODIFY `b_id` tinyint(4) NOT NULL AUTO_INCREMENT COMMENT 'auto incrementing branch id';
--
-- AUTO_INCREMENT for table `college`
--
ALTER TABLE `college`
  MODIFY `college_id` int(3) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `copy`
--
ALTER TABLE `copy`
  MODIFY `c_id` tinyint(4) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `co_author`
--
ALTER TABLE `co_author`
  MODIFY `ca_id` smallint(6) NOT NULL AUTO_INCREMENT COMMENT 'auto incrementing co-author id';
--
-- AUTO_INCREMENT for table `deposit`
--
ALTER TABLE `deposit`
  MODIFY `deposit_id` mediumint(9) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `fee`
--
ALTER TABLE `fee`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `fine_record`
--
ALTER TABLE `fine_record`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `magazine`
--
ALTER TABLE `magazine`
  MODIFY `id` tinyint(4) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `member`
--
ALTER TABLE `member`
  MODIFY `member_id` smallint(6) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `member_fine`
--
ALTER TABLE `member_fine`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `novel`
--
ALTER TABLE `novel`
  MODIFY `id` tinyint(4) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `publication`
--
ALTER TABLE `publication`
  MODIFY `p_id` tinyint(4) NOT NULL AUTO_INCREMENT COMMENT 'foreign key in book relation';
--
-- AUTO_INCREMENT for table `settings`
--
ALTER TABLE `settings`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `state`
--
ALTER TABLE `state`
  MODIFY `state_id` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=37;
--
-- AUTO_INCREMENT for table `topic`
--
ALTER TABLE `topic`
  MODIFY `tid` smallint(6) NOT NULL AUTO_INCREMENT COMMENT 'autoincrementing id';
--
-- AUTO_INCREMENT for table `transaction_issue`
--
ALTER TABLE `transaction_issue`
  MODIFY `t_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `university`
--
ALTER TABLE `university`
  MODIFY `university_id` int(3) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
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
-- Constraints for table `co_author`
--
ALTER TABLE `co_author`
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

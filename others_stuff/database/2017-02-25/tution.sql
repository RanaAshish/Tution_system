-- phpMyAdmin SQL Dump
-- version 4.6.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Feb 26, 2017 at 02:52 AM
-- Server version: 5.7.14
-- PHP Version: 5.6.25

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `tution`
--
CREATE DATABASE IF NOT EXISTS `tution` DEFAULT CHARACTER SET latin1 COLLATE latin1_swedish_ci;
USE `tution`;

-- --------------------------------------------------------

--
-- Table structure for table `branch`
--

CREATE TABLE `branch` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `tution_id` int(11) NOT NULL,
  `area` varchar(255) NOT NULL,
  `address` text,
  `latitude` double(10,6) DEFAULT NULL,
  `longitude` double(10,6) DEFAULT NULL,
  `establishment_year` varchar(4) NOT NULL,
  `contact` json NOT NULL,
  `email` json NOT NULL,
  `facility` json NOT NULL,
  `creation_time` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updation_time` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `is_primary` enum('0','1') NOT NULL DEFAULT '0',
  `is_approved` enum('0','1') NOT NULL DEFAULT '0',
  `is_freeze` enum('0','1') NOT NULL DEFAULT '0',
  `is_delete` enum('0','1') NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `branch`
--

INSERT INTO `branch` (`id`, `name`, `tution_id`, `area`, `address`, `latitude`, `longitude`, `establishment_year`, `contact`, `email`, `facility`, `creation_time`, `updation_time`, `is_primary`, `is_approved`, `is_freeze`, `is_delete`) VALUES
(1, '', 2, '', 'Test', NULL, NULL, '2015', 'null', 'null', 'null', '2016-11-14 17:17:36', '2016-11-14 17:17:36', '1', '1', '0', '0'),
(2, '', 3, '', 'Testing purpose', NULL, NULL, '2014', 'null', 'null', 'null', '2016-11-14 17:17:36', '2016-11-14 17:17:36', '1', '0', '0', '0'),
(5, '', 8, '', 'surat', NULL, NULL, '2015', 'null', 'null', 'null', '2016-11-20 22:58:03', '2016-11-20 22:58:03', '1', '0', '0', '0');

-- --------------------------------------------------------

--
-- Table structure for table `class_students`
--

CREATE TABLE `class_students` (
  `id` int(11) NOT NULL,
  `class_id` int(11) NOT NULL,
  `student_id` int(11) NOT NULL,
  `is_current` tinyint(1) NOT NULL DEFAULT '1',
  `creation_time` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updation_time` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `classes`
--

CREATE TABLE `classes` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `branch_id` int(11) NOT NULL,
  `description` int(11) NOT NULL,
  `course_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `course`
--

CREATE TABLE `course` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `parent` int(11) NOT NULL,
  `type` enum('1','2','3') NOT NULL DEFAULT '1' COMMENT '1 = Degree/Course;2 = Year/Standard;3 = Term/Sem',
  `description` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `course_branch`
--

CREATE TABLE `course_branch` (
  `id` int(11) NOT NULL,
  `course_id` int(11) NOT NULL,
  `branch_id` int(11) NOT NULL,
  `creation_time` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updation_time` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `faculty`
--

CREATE TABLE `faculty` (
  `id` int(11) NOT NULL,
  `first_name` varchar(255) NOT NULL,
  `middle_name` varchar(255) DEFAULT NULL,
  `last_name` varchar(255) NOT NULL,
  `profile_image` varchar(1000) NOT NULL,
  `user_id` int(11) DEFAULT NULL,
  `creation_time` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updation_time` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `role`
--

CREATE TABLE `role` (
  `id` int(11) NOT NULL,
  `role_name` varchar(255) NOT NULL,
  `creation_time` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updation_time` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `is_delete` enum('0','1') NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `role`
--

INSERT INTO `role` (`id`, `role_name`, `creation_time`, `updation_time`, `is_delete`) VALUES
(1, 'admin', '2016-07-25 14:11:52', '2016-07-25 14:11:52', '0'),
(2, 'tution', '2016-07-25 14:12:20', '2016-07-25 14:12:20', '0'),
(3, 'student', '2016-07-25 14:12:39', '2016-07-25 14:12:39', '0');

-- --------------------------------------------------------

--
-- Table structure for table `students`
--

CREATE TABLE `students` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `parent_id` int(11) NOT NULL COMMENT '`',
  `first_name` varchar(255) NOT NULL,
  `middle_name` varchar(255) DEFAULT NULL,
  `last_name` varchar(255) NOT NULL,
  `primary_phone` varchar(25) DEFAULT NULL,
  `creation_time` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updation_time` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `is_delete` enum('0','1') NOT NULL DEFAULT '0',
  `contact` json NOT NULL,
  `email` json NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `tutions`
--

CREATE TABLE `tutions` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `tution_name` varchar(1000) NOT NULL,
  `profile_image` varchar(1000) DEFAULT NULL,
  `cover_image` varchar(1000) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tutions`
--

INSERT INTO `tutions` (`id`, `user_id`, `tution_name`, `profile_image`, `cover_image`) VALUES
(2, 2, 'Test', NULL, NULL),
(3, 2, 'Test2', NULL, NULL),
(8, 10, 'my test class', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `username` varchar(255) NOT NULL,
  `password` varchar(1000) NOT NULL,
  `role_id` int(11) NOT NULL,
  `block_reason` varchar(1500) DEFAULT NULL,
  `creation_time` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updation_time` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `is_approved` enum('0','1') NOT NULL DEFAULT '0',
  `is_block` enum('0','1') NOT NULL DEFAULT '0',
  `is_delete` enum('0','1') NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `username`, `password`, `role_id`, `block_reason`, `creation_time`, `updation_time`, `is_approved`, `is_block`, `is_delete`) VALUES
(1, 'admin', 'harami', 1, '', '2016-07-25 14:14:00', '2016-07-25 14:14:00', '0', '0', '0'),
(2, 'Ashish', 'Ashish', 2, NULL, '2016-09-04 11:05:17', '2016-09-04 11:05:17', '0', '0', '0'),
(10, 'myclass', 'kb9D51BJ', 2, NULL, '2016-11-20 22:58:03', '2016-11-20 22:58:03', '0', '0', '0');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `branch`
--
ALTER TABLE `branch`
  ADD PRIMARY KEY (`id`),
  ADD KEY `class_id` (`tution_id`);

--
-- Indexes for table `class_students`
--
ALTER TABLE `class_students`
  ADD PRIMARY KEY (`id`),
  ADD KEY `branch_id` (`class_id`),
  ADD KEY `student_id` (`student_id`);

--
-- Indexes for table `classes`
--
ALTER TABLE `classes`
  ADD PRIMARY KEY (`id`),
  ADD KEY `branch_id` (`branch_id`),
  ADD KEY `course_id` (`course_id`);

--
-- Indexes for table `course`
--
ALTER TABLE `course`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `course_branch`
--
ALTER TABLE `course_branch`
  ADD PRIMARY KEY (`id`),
  ADD KEY `course_id` (`course_id`),
  ADD KEY `branch_id` (`branch_id`);

--
-- Indexes for table `faculty`
--
ALTER TABLE `faculty`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_id` (`user_id`);

--
-- Indexes for table `role`
--
ALTER TABLE `role`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `students`
--
ALTER TABLE `students`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_id` (`user_id`);

--
-- Indexes for table `tutions`
--
ALTER TABLE `tutions`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_id` (`user_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `username` (`username`),
  ADD KEY `role_id` (`role_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `branch`
--
ALTER TABLE `branch`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT for table `class_students`
--
ALTER TABLE `class_students`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `classes`
--
ALTER TABLE `classes`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `course`
--
ALTER TABLE `course`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `course_branch`
--
ALTER TABLE `course_branch`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `faculty`
--
ALTER TABLE `faculty`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `role`
--
ALTER TABLE `role`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `students`
--
ALTER TABLE `students`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `tutions`
--
ALTER TABLE `tutions`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;
--
-- Constraints for dumped tables
--

--
-- Constraints for table `class_students`
--
ALTER TABLE `class_students`
  ADD CONSTRAINT `class_students_ibfk_1` FOREIGN KEY (`class_id`) REFERENCES `classes` (`id`),
  ADD CONSTRAINT `class_students_ibfk_2` FOREIGN KEY (`student_id`) REFERENCES `students` (`id`);

--
-- Constraints for table `classes`
--
ALTER TABLE `classes`
  ADD CONSTRAINT `classes_ibfk_1` FOREIGN KEY (`course_id`) REFERENCES `course` (`id`),
  ADD CONSTRAINT `clsses_branch` FOREIGN KEY (`branch_id`) REFERENCES `branch` (`id`);

--
-- Constraints for table `course_branch`
--
ALTER TABLE `course_branch`
  ADD CONSTRAINT `cb_branch` FOREIGN KEY (`branch_id`) REFERENCES `branch` (`id`),
  ADD CONSTRAINT `cb_course` FOREIGN KEY (`course_id`) REFERENCES `course` (`id`);

--
-- Constraints for table `faculty`
--
ALTER TABLE `faculty`
  ADD CONSTRAINT `faculty_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

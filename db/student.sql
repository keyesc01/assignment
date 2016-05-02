-- phpMyAdmin SQL Dump
-- version 4.5.2
-- http://www.phpmyadmin.net
--
-- Host: localhost:3306
-- Generation Time: May 02, 2016 at 01:48 PM
-- Server version: 10.1.9-MariaDB-log
-- PHP Version: 5.6.16

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `student`
--

-- --------------------------------------------------------

--
-- Table structure for table `attendances`
--

CREATE TABLE `attendances` (
  `id` int(11) NOT NULL,
  `date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `username` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `attendances`
--

INSERT INTO `attendances` (`id`, `date`, `username`) VALUES
(143, '2016-05-02 20:00:15', 'ciaran'),
(144, '2016-05-02 20:01:12', 'bob'),
(145, '2016-05-02 20:02:16', 'bob'),
(146, '2016-05-02 20:03:25', 'bob'),
(147, '2016-05-02 20:03:58', 'bob'),
(148, '2016-05-02 20:04:54', 'bob'),
(149, '2016-05-02 20:06:19', 'ciaran'),
(150, '2016-05-02 20:25:47', 'ciaran'),
(151, '2016-05-02 20:43:50', 'ciaran'),
(152, '2016-05-02 20:44:11', 'bob');

-- --------------------------------------------------------

--
-- Table structure for table `belts`
--

CREATE TABLE `belts` (
  `id` int(11) NOT NULL,
  `colour` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `belts`
--

INSERT INTO `belts` (`id`, `colour`) VALUES
(1, 'white'),
(2, 'red'),
(3, 'black');

-- --------------------------------------------------------

--
-- Table structure for table `gradings`
--

CREATE TABLE `gradings` (
  `id` int(11) NOT NULL,
  `studentId` int(11) NOT NULL,
  `date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `studentgradingtechnique`
--

CREATE TABLE `studentgradingtechnique` (
  `id` int(11) NOT NULL,
  `studentId` int(11) NOT NULL,
  `gradingId` int(11) NOT NULL,
  `techniqueId` int(11) NOT NULL,
  `passed` int(11) NOT NULL,
  `grade` char(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `students`
--

CREATE TABLE `students` (
  `id` int(11) NOT NULL,
  `username` varchar(20) NOT NULL,
  `password` varchar(60) NOT NULL,
  `lastGrade` text NOT NULL,
  `currentGrade` text NOT NULL,
  `date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `belt` text NOT NULL,
  `joined` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `students`
--

INSERT INTO `students` (`id`, `username`, `password`, `lastGrade`, `currentGrade`, `date`, `belt`, `joined`) VALUES
(20, 'admin', 'admin', '', '', '2016-05-02 12:22:10', '', '0000-00-00'),
(30, 'ciaran', '$2y$10$4F8AkZ3x1RQe329mR37GpOQ0TBMmy9GMTLmRxPxnkqEkXSlCjVEma', '01-05-2016', '', '2016-05-02 17:36:29', 'white', '0000-00-00'),
(31, 'bob', '$2y$10$J4EUOtpti98jWPR1OLdewefN6ZHL0TT7uG8DDejHdsYidsipL3NHa', '01-03-2016', '', '2016-05-02 17:37:28', 'red', '0000-00-00');

-- --------------------------------------------------------

--
-- Table structure for table `techniques`
--

CREATE TABLE `techniques` (
  `id` int(11) NOT NULL,
  `description` text NOT NULL,
  `belt` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `techniques`
--

INSERT INTO `techniques` (`id`, `description`, `belt`) VALUES
(1, 'Bushido', 'white'),
(2, 'Bo-staff', 'white'),
(3, 'Karate', 'red'),
(4, 'Kick Boxing', 'red'),
(5, 'Kendo', 'black'),
(6, 'Katana', 'black');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `attendances`
--
ALTER TABLE `attendances`
  ADD PRIMARY KEY (`id`),
  ADD KEY `studentId` (`username`);

--
-- Indexes for table `belts`
--
ALTER TABLE `belts`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `gradings`
--
ALTER TABLE `gradings`
  ADD PRIMARY KEY (`id`),
  ADD KEY `studentId` (`studentId`),
  ADD KEY `date` (`date`);

--
-- Indexes for table `studentgradingtechnique`
--
ALTER TABLE `studentgradingtechnique`
  ADD PRIMARY KEY (`id`),
  ADD KEY `studentId` (`studentId`),
  ADD KEY `gradingId` (`gradingId`),
  ADD KEY `techniqueId` (`techniqueId`),
  ADD KEY `techniqueId_2` (`techniqueId`);

--
-- Indexes for table `students`
--
ALTER TABLE `students`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `techniques`
--
ALTER TABLE `techniques`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `attendances`
--
ALTER TABLE `attendances`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=153;
--
-- AUTO_INCREMENT for table `belts`
--
ALTER TABLE `belts`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `gradings`
--
ALTER TABLE `gradings`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `students`
--
ALTER TABLE `students`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=35;
--
-- AUTO_INCREMENT for table `techniques`
--
ALTER TABLE `techniques`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
--
-- Constraints for dumped tables
--

--
-- Constraints for table `gradings`
--
ALTER TABLE `gradings`
  ADD CONSTRAINT `gradings_ibfk_1` FOREIGN KEY (`studentId`) REFERENCES `students` (`id`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

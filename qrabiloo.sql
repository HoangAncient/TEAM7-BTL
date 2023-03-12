-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Mar 12, 2023 at 05:27 PM
-- Server version: 10.4.27-MariaDB
-- PHP Version: 8.1.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `qrabiloo`
--

-- --------------------------------------------------------

--
-- Table structure for table `courseclass`
--

CREATE TABLE `courseclass` (
  `classID` varchar(25) NOT NULL,
  `courseID` varchar(20) NOT NULL,
  `teacherID` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `courses`
--

CREATE TABLE `courses` (
  `courseID` varchar(20) NOT NULL,
  `courseName` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `onexam`
--

CREATE TABLE `onexam` (
  `doID` int(11) NOT NULL,
  `grade` double NOT NULL,
  `timeStart` datetime NOT NULL,
  `timeEnd` datetime NOT NULL,
  `studentID` int(11) NOT NULL,
  `testID` varchar(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `person`
--

CREATE TABLE `person` (
  `ID` int(11) NOT NULL,
  `account` varchar(50) NOT NULL,
  `pass` varchar(50) NOT NULL,
  `firstName` varchar(20) NOT NULL,
  `lastName` varchar(20) NOT NULL,
  `middleName` varchar(20) NOT NULL,
  `email` varchar(50) NOT NULL,
  `birthday` varchar(250) NOT NULL,
  `phoneNumber` varchar(12) NOT NULL,
  `isTeacher` tinyint(1) DEFAULT NULL,
  `ecoin` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `person`
--

INSERT INTO `person` (`ID`, `account`, `pass`, `firstName`, `lastName`, `middleName`, `email`, `birthday`, `phoneNumber`, `isTeacher`, `ecoin`) VALUES
(1, 'giangvien01', 'abc', 'Trinh', 'Khoi', 'Minh', 'khoikhtn2109@gmail.com', '21/09/2003', '0984146006', 1, 0),
(2, 'Florentino', 'a', 'Trịnh', 'Khôi', 'Minh', 'khoikhtn2109@gmail.com', '213', '0984146006', NULL, NULL),
(3, 'giangvien0123', 'a', 'Trịnh', 'Khôi', 'Minh', 'khoikhtn2109@gmail.com', '213', '0984146006', NULL, NULL),
(4, 'Minh Khoi', 'abc', 'Trịnh', 'Khôi', 'Minh', 'khoikhtn2109@gmail.com', '213', '0984146006', NULL, NULL),
(5, 'Minh Khoi', 'abc', 'Trịnh', 'Khôi', 'Minh', 'khoikhtn2109@gmail.com', '213', '0984146006', NULL, NULL),
(6, 'giangvien011212', 'abc', 'Trịnh', 'Khôi', 'Minh', 'khoikhtn2109@gmail.com', '213', '0984146006', NULL, NULL),
(7, 'giangvien0112333', 'abc', 'Trịnh', 'Khôi', 'Minh', 'khoikhtn2109@gmail.com', '2003-09-21', '0984146006', NULL, NULL),
(8, 'Magneto', 'abc', 'Edward', 'Justin', '', 'khoikhtn2109@gmail.com', '2003-09-21', '0984146006', NULL, NULL),
(9, 'giangvien03213', 'abc', 'Trịnh', 'Khôi', 'Minh', 'khoikhtn2109@gmail.com', '2003-09-21', '0984146006', NULL, NULL),
(10, 'Sunspot', 'abc', 'Trịnh', 'Khôi', 'Minh', 'khoikhtn2109@gmail.com', '2003-09-21', '0984146006', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `questintest`
--

CREATE TABLE `questintest` (
  `questionID` int(11) NOT NULL,
  `TestID` varchar(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `question`
--

CREATE TABLE `question` (
  `id` int(11) NOT NULL,
  `quest` text NOT NULL,
  `filepath` text DEFAULT NULL,
  `answer1` text NOT NULL,
  `answer2` text NOT NULL,
  `answer3` text NOT NULL,
  `answer4` text NOT NULL,
  `ranswer` text NOT NULL,
  `courseID` varchar(25) NOT NULL,
  `chapter` varchar(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `sample1`
--

CREATE TABLE `sample1` (
  `ID` int(11) NOT NULL,
  `account` varchar(250) NOT NULL,
  `pass` varchar(250) NOT NULL,
  `firstName` varchar(250) NOT NULL,
  `lastName` varchar(250) NOT NULL,
  `middleName` varchar(250) NOT NULL,
  `email` varchar(250) NOT NULL,
  `birthday` varchar(250) NOT NULL,
  `phoneNumber` varchar(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `sample1`
--

INSERT INTO `sample1` (`ID`, `account`, `pass`, `firstName`, `lastName`, `middleName`, `email`, `birthday`, `phoneNumber`) VALUES
(1, 'Florentino', 'a', 'Trịnh', 'Khôi', 'Minh', 'khoikhtn2109@gmail.com', '213', '0984146006'),
(2, 'giangvien01111', 'abc', 'Trịnh', 'Khôi', 'Minh', 'khoikhtn2109@gmail.com', '2003-09-21', '0984146006');

-- --------------------------------------------------------

--
-- Table structure for table `study`
--

CREATE TABLE `study` (
  `studentID` int(11) NOT NULL,
  `classID` varchar(25) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `test`
--

CREATE TABLE `test` (
  `testID` varchar(11) NOT NULL,
  `testName` varchar(50) NOT NULL,
  `courseClassID` varchar(25) NOT NULL,
  `teacherID` int(11) NOT NULL,
  `timeStart` datetime NOT NULL,
  `timeEnd` datetime NOT NULL,
  `timePeriod` int(11) NOT NULL,
  `studentOnly` tinyint(1) NOT NULL,
  `turn` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `username` text NOT NULL,
  `usergrade` double DEFAULT NULL,
  `timeStart` datetime DEFAULT NULL,
  `timeEnd` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `courseclass`
--
ALTER TABLE `courseclass`
  ADD PRIMARY KEY (`classID`),
  ADD KEY `classCourses` (`courseID`),
  ADD KEY `classTeacher` (`teacherID`);

--
-- Indexes for table `courses`
--
ALTER TABLE `courses`
  ADD PRIMARY KEY (`courseID`);

--
-- Indexes for table `onexam`
--
ALTER TABLE `onexam`
  ADD PRIMARY KEY (`doID`),
  ADD KEY `onExamStudent` (`studentID`),
  ADD KEY `onExamTest` (`testID`);

--
-- Indexes for table `person`
--
ALTER TABLE `person`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `questintest`
--
ALTER TABLE `questintest`
  ADD PRIMARY KEY (`questionID`,`TestID`),
  ADD KEY `questinTest` (`TestID`);

--
-- Indexes for table `question`
--
ALTER TABLE `question`
  ADD PRIMARY KEY (`id`),
  ADD KEY `questCourse` (`courseID`);

--
-- Indexes for table `sample1`
--
ALTER TABLE `sample1`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `study`
--
ALTER TABLE `study`
  ADD PRIMARY KEY (`classID`,`studentID`) USING BTREE,
  ADD KEY `studyPerson` (`studentID`);

--
-- Indexes for table `test`
--
ALTER TABLE `test`
  ADD PRIMARY KEY (`testID`),
  ADD KEY `teacherTest` (`teacherID`),
  ADD KEY `testCourseClass` (`courseClassID`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `onexam`
--
ALTER TABLE `onexam`
  MODIFY `doID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `person`
--
ALTER TABLE `person`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `question`
--
ALTER TABLE `question`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=69;

--
-- AUTO_INCREMENT for table `sample1`
--
ALTER TABLE `sample1`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=36;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `courseclass`
--
ALTER TABLE `courseclass`
  ADD CONSTRAINT `classCourses` FOREIGN KEY (`courseID`) REFERENCES `courses` (`courseID`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `classTeacher` FOREIGN KEY (`teacherID`) REFERENCES `person` (`ID`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `onexam`
--
ALTER TABLE `onexam`
  ADD CONSTRAINT `onExamStudent` FOREIGN KEY (`studentID`) REFERENCES `person` (`ID`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `onExamTest` FOREIGN KEY (`testID`) REFERENCES `test` (`testID`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `questintest`
--
ALTER TABLE `questintest`
  ADD CONSTRAINT `questQuest` FOREIGN KEY (`questionID`) REFERENCES `question` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `questinTest` FOREIGN KEY (`TestID`) REFERENCES `test` (`testID`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `question`
--
ALTER TABLE `question`
  ADD CONSTRAINT `questCourse` FOREIGN KEY (`courseID`) REFERENCES `courses` (`courseID`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `study`
--
ALTER TABLE `study`
  ADD CONSTRAINT `studyClass` FOREIGN KEY (`classID`) REFERENCES `courseclass` (`classID`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `studyPerson` FOREIGN KEY (`studentID`) REFERENCES `person` (`ID`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `test`
--
ALTER TABLE `test`
  ADD CONSTRAINT `teacherTest` FOREIGN KEY (`teacherID`) REFERENCES `person` (`ID`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `testCourseClass` FOREIGN KEY (`courseClassID`) REFERENCES `courseclass` (`classID`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

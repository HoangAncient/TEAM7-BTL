-- phpMyAdmin SQL Dump
-- version 6.0.0-dev+20230213.ef941c2080
-- https://www.phpmyadmin.net/
--
-- Máy chủ: 127.0.0.1
-- Thời gian đã tạo: Th3 16, 2023 lúc 08:46 AM
-- Phiên bản máy phục vụ: 10.4.24-MariaDB
-- Phiên bản PHP: 8.1.5

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Cơ sở dữ liệu: `qrabiloo`
--

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `courseclass`
--

CREATE TABLE `courseclass` (
  `classID` varchar(25) NOT NULL,
  `className` varchar(256) NOT NULL,
  `courseID` varchar(20) NOT NULL,
  `teacherID` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Đang đổ dữ liệu cho bảng `courseclass`
--

INSERT INTO `courseclass` (`classID`, `className`, `courseID`, `teacherID`) VALUES
('Lớp 12', '9.0', 'INT2204', 1235);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `courses`
--

CREATE TABLE `courses` (
  `courseID` varchar(20) NOT NULL,
  `courseName` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Đang đổ dữ liệu cho bảng `courses`
--

INSERT INTO `courses` (`courseID`, `courseName`) VALUES
('INT2204', 'IELTS');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `lecture`
--

CREATE TABLE `lecture` (
  `lectureID` int(11) NOT NULL,
  `filepath` varchar(255) NOT NULL,
  `STT` int(11) NOT NULL,
  `classID` varchar(25) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `onexam`
--

CREATE TABLE `onexam` (
  `doID` int(11) NOT NULL,
  `grade` double NOT NULL,
  `timeStart` datetime NOT NULL,
  `timeEnd` datetime NOT NULL,
  `studentID` int(11) NOT NULL,
  `testID` varchar(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Đang đổ dữ liệu cho bảng `onexam`
--

INSERT INTO `onexam` (`doID`, `grade`, `timeStart`, `timeEnd`, `studentID`, `testID`) VALUES
(8, 1.43, '2022-12-06 00:49:27', '2022-12-06 00:49:36', 21020003, '2310'),
(9, 2.86, '2022-12-06 01:19:54', '2022-12-06 01:20:05', 21020003, '2310'),
(10, 1.67, '2022-12-06 07:34:41', '2022-12-06 07:34:57', 21020001, 'kkkk'),
(11, 2.5, '2023-02-03 14:42:30', '2023-02-03 14:42:37', 21020001, 'Loffil'),
(12, 0, '2023-02-03 15:56:14', '2023-02-03 15:56:21', 21020001, '3249658');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `person`
--

CREATE TABLE `person` (
  `ID` int(11) NOT NULL,
  `account` varchar(50) NOT NULL,
  `pass` varchar(50) NOT NULL,
  `firstName` varchar(20) NOT NULL,
  `middleName` varchar(25) DEFAULT NULL,
  `lastName` varchar(20) NOT NULL,
  `middleName` varchar(20) NOT NULL,
  `email` varchar(50) NOT NULL,
  `avatar` text DEFAULT NULL,
  `birthday` date NOT NULL,
  `address` text NOT NULL,
  `phoneNumber` int(12) NOT NULL,
  `class` varchar(20) DEFAULT NULL,
  `isTeacher` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Đang đổ dữ liệu cho bảng `person`
--

INSERT INTO `person` (`ID`, `account`, `pass`, `firstName`, `lastName`, `email`, `birthday`, `address`, `phoneNumber`, `isTeacher`) VALUES
(1, 'admin01', 'admin', 'Hoang', 'Dinh', 'hoangdinhnho23@gmail.com', '2003-08-13', '', 839493747, 2),
(2, 'admin02', 'admin', 'Khoi', 'Trinh', 'khoikhtn2109@gmail.com', '2003-09-21', '', 123456789, 2),
(1234, 'admin03', 'admin', 'Minh', 'Doan', 'minhwhisky700@gmail.com', '2003-04-04', '', 123456798, 2),
(1235, 'giangvien01', 'abc@123', 'Hoang', 'Dinh', 'hoangdinhnho23@gmail.com', '2023-03-08', '', 839493747, 1),
(1236, 'giangvien02', 'abc@123', 'Trang', 'Phạm', 'trangptq@vnu.edu.vn', '2023-03-01', '', 123456798, 1),
(1237, 'giangvien03', 'abc@123', 'Minh', 'Phạm', '21021496@vnu.edu.vn', '2023-03-01', '', 123456798, 1),
(1238, '21000001', '21000001', 'Linh', 'Tinh', 'hellocunconhaha@gmail.com', '2023-03-01', '', 123456798, 0),
(1239, '21000002', '21000002', 'Tinh', 'Binh', 'doibung@gmail.com', '2023-03-07', '', 123456798, 0),
(1240, '21000003', '21000003', 'Binh', 'Chilling', 'helloongtuong@gmail.com', '2023-03-10', '', 123456798, 0);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `questintest`
--

CREATE TABLE `questintest` (
  `questionID` int(11) NOT NULL,
  `TestID` varchar(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Đang đổ dữ liệu cho bảng `questintest`
--

INSERT INTO `questintest` (`questionID`, `TestID`) VALUES
(42, '2310'),
(42, '98765'),
(53, '1111'),
(53, '12345'),
(53, '12347'),
(53, '1489'),
(53, '2310'),
(53, '2423'),
(53, '3249658'),
(53, '34'),
(53, '98765'),
(53, '996321'),
(53, 'abels'),
(53, 'kkkk'),
(53, 'Loffil'),
(54, '12345'),
(54, '2423'),
(54, '34'),
(54, '98765'),
(54, 'abels'),
(55, '1111'),
(55, '123'),
(55, '2310'),
(55, '2423'),
(55, '3249658'),
(55, '34'),
(55, '98765'),
(55, 'Loffil'),
(56, '123'),
(56, '12345'),
(56, '1489'),
(56, '2310'),
(56, '2423'),
(56, '7745'),
(56, '98765'),
(56, '9967'),
(56, 'kkkk'),
(57, '1111'),
(57, '12345'),
(57, '12347'),
(57, '1489'),
(57, '2310'),
(57, '34'),
(57, '98765'),
(57, '996321'),
(57, 'abels'),
(57, 'kkkk'),
(58, '2310'),
(58, '3249658'),
(58, '98765'),
(58, 'abels'),
(58, 'kkkk'),
(63, '1111'),
(63, '12345'),
(63, '1489'),
(63, '3249658'),
(63, '34'),
(63, '7745'),
(63, '98765'),
(63, '9967'),
(63, 'kkkk'),
(63, 'Loffil'),
(65, '1111'),
(65, '12347'),
(65, '1489'),
(65, '2310'),
(65, '2423'),
(65, '98765'),
(65, '996321'),
(65, 'kkkk'),
(66, 'Loffil');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `question`
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
  `chapter` varchar(11) NOT NULL,
  `hardmode` int(1) NOT NULL,
  `explaination` text NOT NULL,
  `bankID` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Đang đổ dữ liệu cho bảng `question`
--

CREATE TABLE `questionbank` (
  `bankID` int(11) NOT NULL,
  `bankName` varchar(255) NOT NULL,
  `category` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `study`
--

CREATE TABLE `study` (
  `studentID` int(11) NOT NULL,
  `classID` varchar(25) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Đang đổ dữ liệu cho bảng `study`
--

INSERT INTO `study` (`studentID`, `classID`) VALUES
(21020002, '2223I_INT2204_46'),
(21020001, '2223I_INT2211_44'),
(21020002, '2223I_INT2211_47'),
(21020001, '2223I_INT2212_43'),
(21020003, '2223I_INT2212_47');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `test`
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
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Đang đổ dữ liệu cho bảng `test`
--

INSERT INTO `test` (`testID`, `testName`, `courseClassID`, `teacherID`, `timeStart`, `timeEnd`, `timePeriod`, `studentOnly`, `turn`) VALUES
('1111', 'Bài kiểm tra cuối', '2223I_INT2212_43', 20001, '2022-12-04 00:00:00', '2022-12-09 00:00:00', 30, 1, 1),
('123', 'Bài kiểm tra số 1', '2223I_INT2212_43', 20001, '2022-12-04 00:00:00', '2022-12-07 00:00:00', 30, 1, 1),
('12345', 'Bài kiểm tra cuối cùng', '2223I_INT2212_43', 20001, '2022-11-28 00:00:00', '2022-12-08 00:00:00', 30, 1, 1),
('12347', 'Bài kiểm tra số 4', '2223I_INT2212_47', 20001, '2022-11-28 00:00:00', '2022-12-17 00:00:00', 30, 1, 1),
('1489', 'last time ', '2223I_INT2212_47', 20001, '2022-12-07 00:00:00', '2022-12-14 00:00:00', 30, 1, 1),
('2310', 'Tại sao lại fail', '2223I_INT2212_47', 20001, '2022-12-04 00:00:00', '2022-12-07 00:00:00', 40, 0, 1),
('2423', 'Và thế là hết :))', '2223I_INT2212_47', 20001, '2022-12-05 00:00:00', '2022-12-09 00:00:00', 30, 1, 1),
('3249658', 'Bài kiểm tra học kì II', '2223I_INT2212_43', 20001, '2023-02-01 00:00:00', '2023-02-04 00:00:00', 40, 1, 1),
('34', 'Bài kiểm tra số 2', '2223I_INT2212_47', 20001, '2022-12-04 00:00:00', '2022-12-07 00:00:00', 30, 1, 1),
('5689', 'Bài kiểm tra số 5', '2223I_INT2212_43', 20001, '2022-12-04 00:00:00', '2022-12-07 00:00:00', 30, 1, 1),
('7745', 'Bài kiểm tra số 3', '2223I_INT2212_43', 20001, '2022-12-04 00:00:00', '2022-12-07 00:00:00', 30, 1, 1),
('98765', 'Bài kiểm tra thực hành', '2223I_INT2212_47', 20001, '2022-12-05 00:00:00', '2022-12-08 00:00:00', 40, 1, 1),
('996321', 'Bài kiểm tra số 4', '2223I_INT2212_43', 20001, '2022-12-04 00:00:00', '2022-12-07 00:00:00', 30, 1, 1),
('9967', 'Bài kiểm tra số 2', '2223I_INT2212_43', 20001, '2022-12-05 00:00:00', '2022-12-07 00:00:00', 30, 1, 1),
('abels', 'Kiểm tra Lý Thuyết', '2223I_INT2212_47', 20001, '2023-02-09 00:00:00', '2023-02-14 00:00:00', 20, 1, 1),
('kkkk', 'Bài kiểm tra cuối cùng', '2223I_INT2212_43', 20001, '2022-12-04 00:00:00', '2022-12-06 00:00:00', 30, 0, 1),
('Loffil', 'Baif thi giua ki', '2223I_INT2212_43', 20001, '2023-02-02 00:00:00', '2023-02-04 00:00:00', 20, 1, 1);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `username` text NOT NULL,
  `usergrade` double DEFAULT NULL,
  `timeStart` datetime DEFAULT NULL,
  `timeEnd` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Chỉ mục cho các bảng đã đổ
--

--
-- Chỉ mục cho bảng `courseclass`
--
ALTER TABLE `courseclass`
  ADD PRIMARY KEY (`classID`),
  ADD KEY `classCourses` (`courseID`),
  ADD KEY `classTeacher` (`teacherID`);

--
-- Chỉ mục cho bảng `courses`
--
ALTER TABLE `courses`
  ADD PRIMARY KEY (`courseID`);

--
-- Chỉ mục cho bảng `onexam`
--
ALTER TABLE `onexam`
  ADD PRIMARY KEY (`doID`),
  ADD KEY `onExamStudent` (`studentID`),
  ADD KEY `onExamTest` (`testID`);

--
-- Chỉ mục cho bảng `person`
--
ALTER TABLE `person`
  ADD PRIMARY KEY (`ID`);

--
-- Chỉ mục cho bảng `pwdreset`
--
ALTER TABLE `pwdreset`
  ADD PRIMARY KEY (`pwdResetId`);

--
-- Chỉ mục cho bảng `questintest`
--
ALTER TABLE `questintest`
  ADD PRIMARY KEY (`questionID`,`TestID`),
  ADD KEY `questinTest` (`TestID`);

--
-- Chỉ mục cho bảng `question`
--
ALTER TABLE `question`
  ADD PRIMARY KEY (`id`),
  ADD KEY `questCourse` (`courseID`);

--
-- Chỉ mục cho bảng `study`
--
ALTER TABLE `study`
  ADD PRIMARY KEY (`classID`,`studentID`) USING BTREE,
  ADD KEY `studyPerson` (`studentID`);

--
-- Chỉ mục cho bảng `test`
--
ALTER TABLE `test`
  ADD PRIMARY KEY (`testID`),
  ADD KEY `teacherTest` (`teacherID`),
  ADD KEY `testCourseClass` (`courseClassID`);

--
-- Chỉ mục cho bảng `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT cho các bảng đã đổ
--

--
-- AUTO_INCREMENT cho bảng `onexam`
--
ALTER TABLE `onexam`
  MODIFY `doID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT cho bảng `pwdreset`
--
ALTER TABLE `pwdreset`
  MODIFY `pwdResetId` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT cho bảng `question`
--
ALTER TABLE `question`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=69;

--
-- AUTO_INCREMENT cho bảng `user`
--
ALTER TABLE `questionbank`
  MODIFY `bankID` int(11) NOT NULL AUTO_INCREMENT;

--
-- Các ràng buộc cho các bảng đã đổ
--

--
-- Các ràng buộc cho bảng `courseclass`
--
ALTER TABLE `courseclass`
  ADD CONSTRAINT `classCourses` FOREIGN KEY (`courseID`) REFERENCES `courses` (`courseID`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `classTeacher` FOREIGN KEY (`teacherID`) REFERENCES `person` (`ID`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Các ràng buộc cho bảng `onexam`
--
ALTER TABLE `onexam`
  ADD CONSTRAINT `onExamStudent` FOREIGN KEY (`studentID`) REFERENCES `person` (`ID`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `onExamTest` FOREIGN KEY (`testID`) REFERENCES `test` (`testID`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Các ràng buộc cho bảng `questintest`
--
ALTER TABLE `questintest`
  ADD CONSTRAINT `questQuest` FOREIGN KEY (`questionID`) REFERENCES `question` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `questinTest` FOREIGN KEY (`TestID`) REFERENCES `test` (`testID`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Các ràng buộc cho bảng `question`
--
ALTER TABLE `question`
  ADD CONSTRAINT `questCourse` FOREIGN KEY (`courseID`) REFERENCES `courses` (`courseID`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Các ràng buộc cho bảng `study`
--
ALTER TABLE `study`
  ADD CONSTRAINT `studyClass` FOREIGN KEY (`classID`) REFERENCES `courseclass` (`classID`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `studyPerson` FOREIGN KEY (`studentID`) REFERENCES `person` (`ID`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Các ràng buộc cho bảng `test`
--
ALTER TABLE `test`
  ADD CONSTRAINT `teacherTest` FOREIGN KEY (`teacherID`) REFERENCES `person` (`ID`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `testCourseClass` FOREIGN KEY (`courseClassID`) REFERENCES `courseclass` (`classID`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

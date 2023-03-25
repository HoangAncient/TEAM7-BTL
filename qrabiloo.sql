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

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `person`
--

CREATE TABLE `person` (
  `ID` int(11) NOT NULL,
  `account` varchar(50) NOT NULL,
  `pass` varchar(50) NOT NULL,
  `firstName` varchar(20) NOT NULL,
  `lastName` varchar(20) NOT NULL,
  `email` varchar(50) NOT NULL,
  `birthday` date NOT NULL,
  `address` text NOT NULL,
  `phoneNumber` int(12) NOT NULL,
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
-- Cấu trúc bảng cho bảng `questionbank`
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

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `stulearnlec`
--

CREATE TABLE `stulearnlec` (
  `studentID` int(11) NOT NULL,
  `LecID` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `teacheracessbank`
--

CREATE TABLE `teacheracessbank` (
  `teacherID` int(11) NOT NULL,
  `bankID` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

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
  `turn` int(11) DEFAULT NULL,
  `testType` int(1) NOT NULL,
  `stt` int(11) NOT NULL,
  `status` tinyint(1) NOT NULL
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
-- Chỉ mục cho bảng `lecture`
--
ALTER TABLE `lecture`
  ADD PRIMARY KEY (`lectureID`),
  ADD KEY `lecInClass` (`classID`);

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
  ADD KEY `questInBank` (`bankID`);

--
-- Chỉ mục cho bảng `questionbank`
--
ALTER TABLE `questionbank`
  ADD PRIMARY KEY (`bankID`);

--
-- Chỉ mục cho bảng `study`
--
ALTER TABLE `study`
  ADD PRIMARY KEY (`classID`,`studentID`) USING BTREE,
  ADD KEY `studyPerson` (`studentID`);

--
-- Chỉ mục cho bảng `stulearnlec`
--
ALTER TABLE `stulearnlec`
  ADD PRIMARY KEY (`studentID`,`LecID`),
  ADD KEY `stuLearnLec` (`LecID`);

--
-- Chỉ mục cho bảng `teacheracessbank`
--
ALTER TABLE `teacheracessbank`
  ADD PRIMARY KEY (`teacherID`,`bankID`),
  ADD KEY `teachAccessBank` (`bankID`);

--
-- Chỉ mục cho bảng `test`
--
ALTER TABLE `test`
  ADD PRIMARY KEY (`testID`),
  ADD KEY `teacherTest` (`teacherID`),
  ADD KEY `testCourseClass` (`courseClassID`);

--
-- AUTO_INCREMENT cho các bảng đã đổ
--

--
-- AUTO_INCREMENT cho bảng `lecture`
--
ALTER TABLE `lecture`
  MODIFY `lectureID` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT cho bảng `onexam`
--
ALTER TABLE `onexam`
  MODIFY `doID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT cho bảng `person`
--
ALTER TABLE `person`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=1241;

--
-- AUTO_INCREMENT cho bảng `question`
--
ALTER TABLE `question`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=69;

--
-- AUTO_INCREMENT cho bảng `questionbank`
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
-- Các ràng buộc cho bảng `lecture`
--
ALTER TABLE `lecture`
  ADD CONSTRAINT `lecInClass` FOREIGN KEY (`classID`) REFERENCES `courseclass` (`classID`) ON DELETE CASCADE ON UPDATE CASCADE;

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
  ADD CONSTRAINT `questInBank` FOREIGN KEY (`bankID`) REFERENCES `questionbank` (`bankID`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Các ràng buộc cho bảng `study`
--
ALTER TABLE `study`
  ADD CONSTRAINT `studyClass` FOREIGN KEY (`classID`) REFERENCES `courseclass` (`classID`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `studyPerson` FOREIGN KEY (`studentID`) REFERENCES `person` (`ID`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Các ràng buộc cho bảng `stulearnlec`
--
ALTER TABLE `stulearnlec`
  ADD CONSTRAINT `stuLearnLec` FOREIGN KEY (`LecID`) REFERENCES `lecture` (`lectureID`),
  ADD CONSTRAINT `stuLec` FOREIGN KEY (`studentID`) REFERENCES `person` (`ID`);

--
-- Các ràng buộc cho bảng `teacheracessbank`
--
ALTER TABLE `teacheracessbank`
  ADD CONSTRAINT `teachAccessBank` FOREIGN KEY (`bankID`) REFERENCES `questionbank` (`bankID`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `teachBank` FOREIGN KEY (`teacherID`) REFERENCES `person` (`ID`) ON DELETE CASCADE ON UPDATE CASCADE;

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

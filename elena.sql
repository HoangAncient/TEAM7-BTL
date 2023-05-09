-- phpMyAdmin SQL Dump
-- version 6.0.0-dev+20230213.ef941c2080
-- https://www.phpmyadmin.net/
--
-- Máy chủ: 127.0.0.1
-- Thời gian đã tạo: Th5 09, 2023 lúc 04:45 PM
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
-- Cơ sở dữ liệu: `elena`
--

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `courseclass`
--

CREATE TABLE `courseclass` (
  `classID` varchar(25) NOT NULL,
  `className` varchar(256) NOT NULL,
  `cost` int(11) DEFAULT NULL,
  `courseID` varchar(20) NOT NULL,
  `teacherID` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Đang đổ dữ liệu cho bảng `courseclass`
--

INSERT INTO `courseclass` (`classID`, `className`, `cost`, `courseID`, `teacherID`) VALUES
('2223I_INT2204_1', 'PREPARE IELTS', NULL, 'INT2204', 1235),
('2223I_INT2204_2', 'IELTS 7.5+', NULL, 'INT2204', 1235),
('2223I_INT2204_3', 'IELTS 8.0+.', NULL, 'INT2204', 1237),
('2223I_INT2208_47', 'B2 Cấp tốc', 100000, 'INT2208', 1),
('2223I_INT2211_1', 'TOEIC 700+.', NULL, 'INT2211', 1236),
('2223I_INT2211_43', 'TOEIC 800+', NULL, 'INT2211', 1236),
('2223I_INT2212_1', 'THPT QG tiếng anh Aim 8+ ', NULL, 'INT2212', 1235),
('2223I_INT2212_2', 'THPT QG tiếng anh Aim 9+', NULL, 'INT2212', 1235);

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
('INT2204', 'IELTS'),
('INT2208', 'B2'),
('INT2211', 'TOEIC'),
('INT2212', 'THPTQG');

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

--
-- Đang đổ dữ liệu cho bảng `lecture`
--

INSERT INTO `lecture` (`lectureID`, `filepath`, `STT`, `classID`) VALUES
(1, 'Slide Trí Tuệ Nhân Tạo - Lecture01 - Intro - Phạm Bảo Sơn - UET.pdf', 1, '2223I_INT2204_1'),
(4, 'Key.pdf', 1, '2223I_INT2204_1');

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
(15, 10, '2023-03-31 13:38:25', '2023-03-31 13:38:31', 1238, 'cx'),
(19, 5, '2023-04-20 15:25:51', '2023-04-20 15:26:21', 1238, 'polki'),
(20, 0, '2023-04-20 15:50:03', '2023-04-20 15:50:31', 1238, 'polki'),
(21, 10, '2023-04-20 15:51:43', '2023-04-20 15:51:52', 1238, 'polki'),
(22, 10, '2023-04-20 15:52:27', '2023-04-20 15:52:31', 1238, 'polki'),
(23, 10, '2023-04-20 15:54:32', '2023-04-20 15:54:37', 1238, 'polki'),
(24, 0, '2023-04-20 16:05:46', '2023-04-20 16:05:47', 1238, 'polki'),
(25, 10, '2023-04-20 16:06:10', '2023-04-20 16:06:18', 1238, 'polki'),
(26, 5, '2023-04-20 21:05:06', '2023-04-20 21:05:27', 1238, 'polki'),
(27, 5, '2023-04-20 21:09:49', '2023-04-20 21:10:20', 1238, 'polki'),
(28, 0, '2023-04-20 21:16:50', '2023-04-20 21:16:54', 1238, 'polki'),
(29, 10, '2023-04-21 14:24:24', '2023-04-21 14:24:34', 1238, 'polki'),
(30, 0, '2023-04-21 14:34:02', '2023-04-21 14:34:04', 1238, 'polki'),
(31, 0, '2023-04-28 23:17:49', '2023-04-28 23:18:20', 1238, 'polki'),
(32, 5, '2023-04-28 23:18:34', '2023-04-28 23:19:05', 1238, 'polki'),
(33, 5, '2023-04-28 23:22:29', '2023-04-28 23:22:36', 1238, 'polki'),
(34, 5, '2023-05-07 02:57:47', '2023-05-07 02:57:58', 1238, 'polki'),
(35, 10, '2023-05-07 03:01:48', '2023-05-07 03:01:57', 1238, 'polki');

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
  `email` varchar(50) NOT NULL,
  `avatar` text DEFAULT NULL,
  `birthday` date NOT NULL,
  `address` text NOT NULL,
  `phoneNumber` int(12) NOT NULL,
  `isTeacher` tinyint(1) NOT NULL,
  `ecoin` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Đang đổ dữ liệu cho bảng `person`
--

INSERT INTO `person` (`ID`, `account`, `pass`, `firstName`, `middleName`, `lastName`, `email`, `avatar`, `birthday`, `address`, `phoneNumber`, `isTeacher`, `ecoin`) VALUES
(1, 'admin01', 'nhohoang2k2', 'Hoàng', NULL, 'Đinh', 'chauhienpc@gmail.com', NULL, '2003-08-13', '', 839493747, 2, 0),
(2, 'admin02', 'admin', 'Khôi', NULL, 'Trịnh', 'khoikhtn2109@gmail.com', NULL, '2003-09-21', '', 123456789, 2, 0),
(1234, 'admin03', 'admin', 'Minh', NULL, 'Doan', 'minhwhisky700@gmail.com', NULL, '2003-04-04', '', 123456798, 2, 0),
(1235, 'giangvien01', 'nhohoang2k2', 'GOAT', '', '', 'hoangdinhnho23@gmail.com', NULL, '2023-03-08', '', 839493747, 1, 0),
(1236, 'giangvien02', 'abc@123', 'Bé', 'Văn', 'Lào', 'trangptq@vnu.edu.vn', NULL, '2023-03-01', '', 123456798, 1, 0),
(1237, 'giangvien03', 'abc@123', 'たて', '', 'いか', '21021496@vnu.edu.vn', NULL, '2023-03-01', '', 123456798, 1, 0),
(1238, '21000001', '21000001', 'Heart', 'In My ', 'H', 'hellocunconhaha@gmail.com', NULL, '2023-03-01', '', 123456798, 0, 0),
(1239, '21000002', '21000002', 'Tinh', NULL, 'Binh', 'doibung@gmail.com', NULL, '2023-03-07', '', 123456798, 0, 0),
(1240, '21000003', '21000003', 'Binh', NULL, 'Chilling', 'helloongtuong@gmail.com', NULL, '2023-03-10', '', 123456798, 0, 0);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `pwdreset`
--

CREATE TABLE `pwdreset` (
  `pwdResetId` int(11) NOT NULL,
  `pwdResetEmail` text NOT NULL,
  `pwdResetSelector` text NOT NULL,
  `pwdResetToken` longtext NOT NULL,
  `pwdResetExpires` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Đang đổ dữ liệu cho bảng `pwdreset`
--

INSERT INTO `pwdreset` (`pwdResetId`, `pwdResetEmail`, `pwdResetSelector`, `pwdResetToken`, `pwdResetExpires`) VALUES
(5, '21021496@vnu.edu.v', 'fefe8fddf0f08bac', '$2y$10$rCzWWR8gkhBczGi0k.bOmOpZ83Z.6TJC3OSt9VJ6t7Jz4a2A3g332', '1680855910'),
(7, 'hoangdinhnho23@gmail.com', '3805ae77794c25ff', '$2y$10$M9eaThM9ukT0vEAoxlrunONZ4xmg0H54WxRGp0SUxxAJnzMmnqvAK', '1682701013');

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
(1, '9967'),
(77, 'polki'),
(78, 'polki'),
(79, 'cx'),
(80, 'cx');

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
  `explaination` text DEFAULT NULL,
  `bankID` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Đang đổ dữ liệu cho bảng `question`
--

INSERT INTO `question` (`id`, `quest`, `filepath`, `answer1`, `answer2`, `answer3`, `answer4`, `ranswer`, `chapter`, `explaination`, `bankID`) VALUES
(1, 'Đâu là biệt danh của Trịnh Đạt?', NULL, 'Datbeosexy', 'Khoikhtn', 'MinhWhisky', 'Hirue', 'answer1', '3.1', 'Trịnh Xuân Đạt hay còn có biệt danh là Datbeosexy, là một bạn nam rất thân thiện', 134),
(70, '                    Hoàng Sieu Dep Trai', NULL, 'a', 'sai', 'không đúng', 'thiếu chút nữa', 'answer4', '3.2', '', 134),
(76, '                    Hoang co xau trai k', 'Biểu_đồ_1.4.4.png', 'co', 'k', 'chac chan roi', 'sure', 'answer2', '1.1', 'Nho Hoang Dep zai ma', 134),
(77, 'I am very happy _____ in India. I really miss being there.', NULL, 'to live', 'to have lived', 'to be lived', 'to be living', 'answer2', '1.4', 'rrhtjtrdjytj', 134),
(78, 'Is there _____ milk in the fridge?', NULL, 'a lot', 'many', 'much', 'some', 'answer4', '1.3', 'k co', 134),
(79, 'We know their address, but they don’t know ________.', NULL, 'ours', 'their’s', 'our’s', 'our', 'answer1', '1.2', 'k co', 134),
(80, 'Did you ask your father ________ some money?', NULL, '0', 'after', 'on', 'for', 'answer4', '3.1', 'k co', 134),
(81, 'Mark the letter A, B, C, or D to indicate the word that differs from the other three in the position of the primary stress in each of the following questions.', NULL, 'access', 'afford', 'brochure', 'casual', 'answer2', '1.3', 'rrhtjtrdjytj', 134),
(82, 'Mark the letter A, B, C, or D to indicate the word that differs from the other three in the position of the primary stress in each of the following questions.', NULL, 'behaviour', 'determined', 'counselor', 'decisive', 'answer3', '1.3', 'rrhtjtrdjytj', 134),
(83, 'Mark the letter A, B, C, or D to indicate the word that differs from the other three in the position of the primary stress in each of the following questions.', NULL, 'donate', 'compare', 'campaign', 'flashy', 'answer4', '1.3', 'rrhtjtrdjytj', 134),
(84, 'Mark the letter A, B, C, or D to indicate the sentence that is closest in meaning to each of the following questions. Nobody in the class is as tall as Mike.', 'NULL', 'Everybody in the class is taller than Mike.', 'Somebody in the class may be shorter than Mike.', 'Mike is the tallest student in the class.', ' Mike may be taller than most students in the class.', 'answer3', '1.3', 'rrhtjtrdjytj', 134);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `questionbank`
--

CREATE TABLE `questionbank` (
  `bankID` int(11) NOT NULL,
  `bankName` varchar(255) NOT NULL,
  `category` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Đang đổ dữ liệu cho bảng `questionbank`
--

INSERT INTO `questionbank` (`bankID`, `bankName`, `category`) VALUES
(134, 'Demo Bank', 'Tổng hợp');

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
(1238, '2223I_INT2204_1'),
(1238, '2223I_INT2211_1'),
(1239, '2223I_INT2211_1'),
(1238, '2223I_INT2212_1');

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
-- Đang đổ dữ liệu cho bảng `test`
--

INSERT INTO `test` (`testID`, `testName`, `courseClassID`, `teacherID`, `timeStart`, `timeEnd`, `timePeriod`, `studentOnly`, `turn`, `testType`, `stt`, `status`) VALUES
('1111', 'Demo1', '2223I_INT2204_1', 1235, '2023-03-23 00:00:00', '2023-04-01 00:00:00', 62, 0, 1, 0, 0, 0),
('9967', 'Demo2', '2223I_INT2204_1', 1235, '2023-03-22 00:00:00', '2023-04-01 00:00:00', 15, 0, 1, 0, 0, 0),
('cx', 'Demo3', '2223I_INT2204_1', 1235, '2023-03-23 00:00:00', '2023-04-01 00:00:00', 14, 0, 1, 0, 0, 0),
('polki', 'Demo4', '2223I_INT2204_2', 1235, '2023-04-18 00:00:00', '2023-05-09 00:00:00', 30, 1, 1, 0, 0, 0);

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
  MODIFY `lectureID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT cho bảng `onexam`
--
ALTER TABLE `onexam`
  MODIFY `doID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=36;

--
-- AUTO_INCREMENT cho bảng `person`
--
ALTER TABLE `person`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=1241;

--
-- AUTO_INCREMENT cho bảng `pwdreset`
--
ALTER TABLE `pwdreset`
  MODIFY `pwdResetId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT cho bảng `question`
--
ALTER TABLE `question`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=85;

--
-- AUTO_INCREMENT cho bảng `questionbank`
--
ALTER TABLE `questionbank`
  MODIFY `bankID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=135;

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

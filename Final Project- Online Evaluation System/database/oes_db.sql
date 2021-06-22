-- phpMyAdmin SQL Dump
-- version 5.0.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 22, 2021 at 01:11 PM
-- Server version: 10.4.17-MariaDB
-- PHP Version: 8.0.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `oes_db`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `id` int(11) NOT NULL,
  `oid` varchar(20) NOT NULL,
  `name` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `password` varchar(200) NOT NULL,
  `gender` varchar(10) NOT NULL,
  `dob` date NOT NULL,
  `usertype` varchar(10) NOT NULL,
  `image` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`id`, `oid`, `name`, `email`, `password`, `gender`, `dob`, `usertype`, `image`) VALUES
(1000, '18-38043-22', 'Mahabubul Hasan', 'Mahabubul470@gmail.com', '$2y$12$x0n6D/p6Obor9xPnZ83B0eimtuk8WSholGNlvwsabQuTdTOWI7wWe', 'male', '2021-03-03', 'admin', ''),
(1003, '1', 'Mahabubul Hasasn', 'mahabubul470@gmail.com', '$2y$12$pB31G16du77Eb43bYWDNYuDOWHXI/1ihz7fS46i7HyDk8hZLLRddG', 'male', '2021-04-21', 'admin', ''),
(1004, '2', 'Mahabubul Hasasn', 'mahabubul470@gmail.com', '$2y$12$/NM8765YKLscrR/o1Gtgau.zA1J.i8NUpMwdGAxM7oODhYMS55HvW', 'male', '2021-04-06', 'admin', ''),
(1005, '3', 'Mahabubul Hasasn', 'mahabubul470@gmail.com', '$2y$12$GESTBO2wYIR5p89TBAuAWurtscOgUfzgFEhnldOUiVoV0yOKLrUKO', 'male', '2021-04-29', 'admin', ''),
(1006, '4', 'Mahabubul Hasasn', 'mahabubul470@gmail.com', '$2y$12$roOIvzOnxq/aclF6EQ/J4.yrCeKN90MN2DZkFM2GeMs5vlFh/3NLC', 'male', '2021-04-27', 'admin', ''),
(1007, '5', 'Mahabubul Hasasn', 'mahabubul470@gmail.com', '$2y$12$SnwOKRqZ0cNEsm.1RQ5seuGqNHURAi5XMULfvR/fuSfpzHISxVNyC', 'male', '2021-04-07', 'admin', ''),
(1008, '7', 'Mahabubul Hasasn', 'mahabubul470@gmail.com', '$2y$12$2nWkD34CGnqAT4gOZRZPDOEEFFeyocsTXn304nV69KZY0Z5iV6bse', 'male', '2021-04-29', 'admin', '');

-- --------------------------------------------------------

--
-- Table structure for table `answer`
--

CREATE TABLE `answer` (
  `ID` int(200) NOT NULL,
  `questionid` int(11) NOT NULL,
  `ansid` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `answer`
--

INSERT INTO `answer` (`ID`, `questionid`, `ansid`) VALUES
(1, 1, 'asd192'),
(3, 2, 'asd196'),
(4, 3, 'asd200'),
(5, 4, 'asd206');

-- --------------------------------------------------------

--
-- Table structure for table `course`
--

CREATE TABLE `course` (
  `id` int(11) NOT NULL,
  `cid` varchar(20) NOT NULL,
  `name` varchar(200) NOT NULL,
  `section` varchar(200) NOT NULL,
  `oid` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `options`
--

CREATE TABLE `options` (
  `ID` int(11) NOT NULL,
  `questionid` int(11) NOT NULL,
  `option` varchar(5000) NOT NULL,
  `optionid` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `options`
--

INSERT INTO `options` (`ID`, `questionid`, `option`, `optionid`) VALUES
(1, 1, 'it is a data structure', '192asd'),
(2, 1, 'It is an array', '193asd'),
(3, 1, 'It is a way to manipulate strings', '194asd'),
(4, 1, 'None of the above', '195asd'),
(5, 2, 'It finds the middle index and spits in two', '196asd'),
(6, 2, 'It iterates through all the elements', '197asd'),
(7, 2, 'None of the above', '198asd'),
(8, 2, 'all of the above', '199asd');

-- --------------------------------------------------------

--
-- Table structure for table `papermcq`
--

CREATE TABLE `papermcq` (
  `id` int(11) NOT NULL,
  `op1` varchar(200) NOT NULL,
  `op2` varchar(200) NOT NULL,
  `op3` varchar(200) NOT NULL,
  `op4` varchar(200) NOT NULL,
  `correct` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `questions`
--

CREATE TABLE `questions` (
  `ID` int(11) NOT NULL,
  `quizid` int(11) NOT NULL,
  `questionid` int(11) NOT NULL,
  `qns` text CHARACTER SET utf8 NOT NULL,
  `choice` int(10) NOT NULL,
  `sn` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `questions`
--

INSERT INTO `questions` (`ID`, `quizid`, `questionid`, `qns`, `choice`, `sn`) VALUES
(1, 1, 1121, 'What is Queue?', 4, 1),
(2, 1, 1122, 'How Does Bubble sort work?', 4, 2);

-- --------------------------------------------------------

--
-- Table structure for table `quiz`
--

CREATE TABLE `quiz` (
  `id` int(11) NOT NULL,
  `quizName` varchar(100) NOT NULL,
  `type` varchar(50) NOT NULL,
  `time` varchar(50) NOT NULL,
  `courseId` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `quiz`
--

INSERT INTO `quiz` (`id`, `quizName`, `type`, `time`, `courseId`) VALUES
(1, 'asd', 'a', '10', 1234);

-- --------------------------------------------------------

--
-- Table structure for table `student`
--

CREATE TABLE `student` (
  `id` int(11) NOT NULL,
  `oid` varchar(200) NOT NULL,
  `name` varchar(200) NOT NULL,
  `email` varchar(200) NOT NULL,
  `password` varchar(200) NOT NULL,
  `gender` varchar(200) NOT NULL,
  `dob` date NOT NULL,
  `usertype` varchar(200) NOT NULL,
  `image` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `student`
--

INSERT INTO `student` (`id`, `oid`, `name`, `email`, `password`, `gender`, `dob`, `usertype`, `image`) VALUES
(1003, '18-38043-2', 'Mahabubul Hasasn', 'mahabubul470@gmail.com', '$2y$12$p7qx3KJuqxvKydFKdBXJtuKau9rqidKH2Gf6glopF7SOSGq2igO8S', 'male', '2021-04-08', 'student', ''),
(1029, '18-38043-2222', 'Mahabubul Hasasn', 'mahabubul470@gmail.com', '$2y$12$x0n6D/p6Obor9xPnZ83B0eimtuk8WSholGNlvwsabQuTdTOWI7wWe', 'male', '2021-04-14', 'student', '');

-- --------------------------------------------------------

--
-- Table structure for table `teacher`
--

CREATE TABLE `teacher` (
  `id` int(11) NOT NULL,
  `oid` varchar(20) NOT NULL,
  `name` varchar(200) NOT NULL,
  `email` varchar(50) NOT NULL,
  `password` varchar(200) NOT NULL,
  `gender` varchar(11) NOT NULL,
  `dob` date NOT NULL,
  `usertype` varchar(11) NOT NULL,
  `image` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `teacher`
--

INSERT INTO `teacher` (`id`, `oid`, `name`, `email`, `password`, `gender`, `dob`, `usertype`, `image`) VALUES
(6, '11234', 'Mahabubul Hasasn', 'mahabubul470@gmail.com', '$2y$12$yhYrZFNCVIFwD5amur3Bs.Dbra3Q53ocxdnPWJuBQbyYlwqSoI1JC', 'male', '2021-04-16', 'teacher', '');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id`) USING BTREE;

--
-- Indexes for table `answer`
--
ALTER TABLE `answer`
  ADD PRIMARY KEY (`ID`),
  ADD KEY `test3` (`questionid`);

--
-- Indexes for table `course`
--
ALTER TABLE `course`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `papermcq`
--
ALTER TABLE `papermcq`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `quiz`
--
ALTER TABLE `quiz`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `student`
--
ALTER TABLE `student`
  ADD PRIMARY KEY (`id`) USING BTREE;

--
-- Indexes for table `teacher`
--
ALTER TABLE `teacher`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=1009;

--
-- AUTO_INCREMENT for table `answer`
--
ALTER TABLE `answer`
  MODIFY `ID` int(200) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `course`
--
ALTER TABLE `course`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `papermcq`
--
ALTER TABLE `papermcq`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `quiz`
--
ALTER TABLE `quiz`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `student`
--
ALTER TABLE `student`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=1034;

--
-- AUTO_INCREMENT for table `teacher`
--
ALTER TABLE `teacher`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

-- phpMyAdmin SQL Dump
-- version 5.1.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 20, 2021 at 02:35 PM
-- Server version: 10.4.18-MariaDB
-- PHP Version: 8.0.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `blue-job-portal`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `id` int(11) NOT NULL,
  `username` varchar(200) NOT NULL,
  `password` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`id`, `username`, `password`) VALUES
(1, 'admin', '123456');

-- --------------------------------------------------------

--
-- Table structure for table `applyjob`
--

CREATE TABLE `applyjob` (
  `id_apply` int(11) NOT NULL,
  `id_user` int(11) NOT NULL,
  `id_jobpost` int(11) NOT NULL,
  `id_emp` int(11) NOT NULL,
  `status` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `applyjob`
--

INSERT INTO `applyjob` (`id_apply`, `id_user`, `id_jobpost`, `id_emp`, `status`) VALUES
(1, 4, 1, 2, 1),
(2, 4, 4, 2, 2);

-- --------------------------------------------------------

--
-- Table structure for table `employees`
--

CREATE TABLE `employees` (
  `id_user` int(11) NOT NULL,
  `firstname` varchar(20) NOT NULL,
  `lastname` varchar(20) NOT NULL,
  `email` varchar(20) NOT NULL,
  `location` varchar(20) NOT NULL,
  `gender` varchar(20) NOT NULL,
  `phone` int(11) NOT NULL,
  `password` varchar(200) NOT NULL,
  `active` int(11) DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `employees`
--

INSERT INTO `employees` (`id_user`, `firstname`, `lastname`, `email`, `location`, `gender`, `phone`, `password`, `active`) VALUES
(1, 'olyviah', 'ngatia', 'johndoe@gmail.com', 'Kakamega', 'male', 1234567899, 'MDE3NmZmYjk5YzBhNzJhYTk1Nzc5ZWY2N2Q0ZGEwMmM=', 1),
(4, 'test', 'employee', 'test@gmail.com', 'Kakamega', 'male', 0, 'MDE3NmZmYjk5YzBhNzJhYTk1Nzc5ZWY2N2Q0ZGEwMmM=', 1),
(5, 'nyaboke', 'kikiki', 'joygichure@gmail.com', 'Kakamega', 'male', 1234567890, 'Yjk0ODU3ZjZhOTA1Y2NkMDI4MzI5YjBhODMyNGFjNGM=', 1),
(6, 'test2', 'egna', 'test2@gmail.com', 'Kakamega', 'male', 1234567899, 'MDdiNDMyZDI1MTcwYjQ2OWI1NzA5NWNhMjY5YmMyMDI=', 1),
(7, 'test2', 'egna', 'test3@gmail.com', 'Kakamega', 'male', 1234578909, 'YWJlYzA3NjY3ZjI0ZTE5MTg1NzRhNjkxZmI3NmM5NWI=', 1);

-- --------------------------------------------------------

--
-- Table structure for table `employers`
--

CREATE TABLE `employers` (
  `id_emp` int(11) NOT NULL,
  `username` varchar(20) NOT NULL,
  `firstname` varchar(20) NOT NULL,
  `lastname` varchar(20) NOT NULL,
  `email` varchar(20) NOT NULL,
  `phone` int(11) NOT NULL,
  `location` varchar(20) NOT NULL,
  `password` varchar(200) NOT NULL,
  `active` int(11) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `employers`
--

INSERT INTO `employers` (`id_emp`, `username`, `firstname`, `lastname`, `email`, `phone`, `location`, `password`, `active`) VALUES
(1, '121455', 'nyaboke', 'amwoma', 'joygichure@gmail.com', 1234567894, 'Kakamega', 'MDE3NmZmYjk5YzBhNzJhYTk1Nzc5ZWY2N2Q0ZGEwMmM=', 1),
(2, 'testemp', 'test1', 'employer1', 'test@gmail.com', 1235786543, 'Kakamega', 'Yjk0ODU3ZjZhOTA1Y2NkMDI4MzI5YjBhODMyNGFjNGM=', 1);

-- --------------------------------------------------------

--
-- Table structure for table `job_post`
--

CREATE TABLE `job_post` (
  `id_jobpost` int(11) NOT NULL,
  `id_emp` int(11) NOT NULL,
  `jobtitle` varchar(200) NOT NULL,
  `description` text NOT NULL,
  `minimumsalary` int(11) NOT NULL,
  `maximumsalary` int(11) NOT NULL,
  `createdate` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `job_post`
--

INSERT INTO `job_post` (`id_jobpost`, `id_emp`, `jobtitle`, `description`, `minimumsalary`, `maximumsalary`, `createdate`) VALUES
(1, 2, 'Laundry', 'one kg bundle of clothes', 1002, 2000, '2021-04-20 08:56:34'),
(2, 2, 'Watchman', 'a school ', 1000, 12345, '2021-04-20 09:41:02'),
(3, 2, 'Laundry', 'a schools flag', 1000, 145678, '2021-04-20 09:41:31'),
(4, 2, 'Cleaner', 'lorem ', 1000, 2147483647, '2021-04-20 09:41:50'),
(5, 2, 'Watchman', 'w', 1000, 111111, '2021-04-20 09:42:05');

-- --------------------------------------------------------

--
-- Table structure for table `mailbox`
--

CREATE TABLE `mailbox` (
  `id_mailbox` int(11) NOT NULL,
  `id_fromuser` int(11) NOT NULL,
  `fromuser` varchar(200) NOT NULL,
  `id_touser` int(11) NOT NULL,
  `subject` varchar(200) NOT NULL,
  `message` text NOT NULL,
  `createdAt` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `mailbox`
--

INSERT INTO `mailbox` (`id_mailbox`, `id_fromuser`, `fromuser`, `id_touser`, `subject`, `message`, `createdAt`) VALUES
(1, 2, 'employers', 4, 'Acceptance', '<p>please except a call from 0782y8913y by today.</p>', '2021-04-20 11:43:39');

-- --------------------------------------------------------

--
-- Table structure for table `reply_mailbox`
--

CREATE TABLE `reply_mailbox` (
  `id_reply` int(11) NOT NULL,
  `id_mailbox` int(11) NOT NULL,
  `id_user` int(11) NOT NULL,
  `usertype` varchar(200) NOT NULL,
  `message` text NOT NULL,
  `createdAt` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `reply_mailbox`
--

INSERT INTO `reply_mailbox` (`id_reply`, `id_mailbox`, `id_user`, `usertype`, `message`, `createdAt`) VALUES
(0, 1, 4, 'user', '<p>thankyou si muchh</p>', '2021-04-20 11:53:19');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `applyjob`
--
ALTER TABLE `applyjob`
  ADD PRIMARY KEY (`id_apply`);

--
-- Indexes for table `employees`
--
ALTER TABLE `employees`
  ADD PRIMARY KEY (`id_user`);

--
-- Indexes for table `employers`
--
ALTER TABLE `employers`
  ADD PRIMARY KEY (`id_emp`);

--
-- Indexes for table `job_post`
--
ALTER TABLE `job_post`
  ADD PRIMARY KEY (`id_jobpost`);

--
-- Indexes for table `mailbox`
--
ALTER TABLE `mailbox`
  ADD PRIMARY KEY (`id_mailbox`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `applyjob`
--
ALTER TABLE `applyjob`
  MODIFY `id_apply` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `employees`
--
ALTER TABLE `employees`
  MODIFY `id_user` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `employers`
--
ALTER TABLE `employers`
  MODIFY `id_emp` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `job_post`
--
ALTER TABLE `job_post`
  MODIFY `id_jobpost` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `mailbox`
--
ALTER TABLE `mailbox`
  MODIFY `id_mailbox` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

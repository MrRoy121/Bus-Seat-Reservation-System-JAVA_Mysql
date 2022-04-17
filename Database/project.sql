-- phpMyAdmin SQL Dump
-- version 5.0.4
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Apr 18, 2022 at 04:08 PM
-- Server version: 10.4.17-MariaDB
-- PHP Version: 7.4.15

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `project`
--

-- --------------------------------------------------------

--
-- Table structure for table `tbl_admin`
--

CREATE TABLE `tbl_admin` (
  `id` int(55) NOT NULL,
  `name` varchar(255) NOT NULL,
  `username` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `phone` varchar(255) NOT NULL,
  `img` varchar(255) NOT NULL,
  `hometown` varchar(255) NOT NULL,
  `curaddress` varchar(255) NOT NULL,
  `role` varchar(255) NOT NULL,
  `pin` int(5) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_admin`
--

INSERT INTO `tbl_admin` (`id`, `name`, `username`, `email`, `password`, `phone`, `img`, `hometown`, `curaddress`, `role`, `pin`) VALUES
(1001, 'Shah Fayez Ali', 'foyez', 'foyez@gmail.com', '202cb962ac59075b964b07152d234b70', '0161011212', 'upload/admins/58331f0ddc.jpg', 'Moulvibazar', 'Shibgonj, Sylhet', 'Admin', 100),
(1002, 'Ashraful Islam', 'nila', 'nila@gmail.com', '202cb962ac59075b964b07152d234b70', '01845678766', 'upload/admins/f69f282259.jpg', 'Hobiganj', 'Lamabazar, Sylhet', 'BusAdmin', 100),
(1003, 'Ashraful Islam', 'ashraf', 'ashraf@gmail.com', '202cb962ac59075b964b07152d234b70', '018181818181', 'upload/admins/fd8ddf586f.jpg', 'Moulvibazar', 'Shibgonj, Sylhet', 'Admin', 100),
(1004, 'Parvez Ahmed', 'parvez', 'parvez@gmail.com', '202cb962ac59075b964b07152d234b70', '01818181818', 'upload/admins/ce8c39e9b5.jpg', 'Sunamgang', 'Akhali, Sylhet', 'StudentAdmin', 100),
(1005, 'Abdur Rahim', 'rahim', 'rahim@gmail.com', '202cb962ac59075b964b07152d234b70', '01712121212', 'upload/admins/fd1e559d18.jpg', 'Tajpur', 'Akhali, Sylhet', 'BusAdmin', 101),
(1006, 'Jamal Hasan', 'jamal', 'jamal@gmail.com', '202cb962ac59075b964b07152d234b70', '01791919191', 'upload/admins/39ae3021d0.jpg', 'Habiganj', 'Modina Market', 'StudentAdmin', 132),
(1007, 'Mina Akter', 'mina', 'mina@gmail.com', '202cb962ac59075b964b07152d234b70', '01717171717', 'upload/admins/79886b894b.jpg', 'Osmaninagar', 'Subidbazar, Sylhet', 'Admin', 102);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_allstudents`
--

CREATE TABLE `tbl_allstudents` (
  `sl` int(255) NOT NULL,
  `id` int(255) NOT NULL,
  `studentName` varchar(255) NOT NULL,
  `dept` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `phone` int(255) NOT NULL,
  `dob` date NOT NULL,
  `semester` int(55) NOT NULL,
  `section` varchar(55) NOT NULL,
  `img` varchar(255) NOT NULL,
  `hometown` varchar(255) NOT NULL,
  `current_address` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_allstudents`
--

INSERT INTO `tbl_allstudents` (`sl`, `id`, `studentName`, `dept`, `email`, `phone`, `dob`, `semester`, `section`, `img`, `hometown`, `current_address`) VALUES
(4, 1812020124, 'Shah Fayez Ali', 'CSE', 'shah@gmail.com', 1701010101, '1998-12-10', 10, 'C', 'upload/allStudents/6aced87624.jpg', 'Rajnagar, Moulvibazar', 'Shibganj, Sylhet'),
(5, 1812020127, 'Nilashish Roy', 'EEE', 'nila@gmail.com', 1501010101, '1997-12-12', 10, 'C', 'upload/allStudents/41cdc90c39.jpg', 'Habiganj', 'Lamabazar, Sylhet'),
(6, 1812020111, 'Parvez Ahmed', 'Civi', 'parvez@gmail.com', 1801010101, '1997-12-12', 10, 'C', 'upload/allStudents/5466325dde.jpg', 'Sunamganj', 'Tilaghor, Sylhet'),
(8, 1812020101, 'Masum Ahmed', 'IS', 'masum@gmail.com', 1500000001, '1996-09-19', 4, 'B', 'upload/allStudents/2544b4e3ad.jpg', 'Tajpur', 'Shibgonj, Sylhet'),
(9, 1812020102, 'Ayesha Akter', 'EEE', 'ayesha@gmail.com', 1900011111, '1998-11-19', 9, 'D', 'upload/allStudents/4d1040a1ee.jpg', 'Kulaura', 'Akhali, Sylhet');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_bookinghistory`
--

CREATE TABLE `tbl_bookinghistory` (
  `No` int(101) NOT NULL,
  `studentid` text NOT NULL,
  `busid` text NOT NULL,
  `seat` text NOT NULL,
  `frm` text NOT NULL,
  `time` text NOT NULL,
  `date` text NOT NULL,
  `stats` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_bookinghistory`
--

INSERT INTO `tbl_bookinghistory` (`No`, `studentid`, `busid`, `seat`, `frm`, `time`, `date`, `stats`) VALUES
(10, '1812020123', '2', 'a1', 'SUST Gate', '08:00', '2021/09/20', '1'),
(11, '1812020123', '2', 'b1', 'SUST Gate', '08:00', '2021/09/20', '1');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_bus`
--

CREATE TABLE `tbl_bus` (
  `No` int(55) NOT NULL,
  `busid` int(255) NOT NULL,
  `nplate` varchar(255) NOT NULL,
  `seats` int(255) NOT NULL,
  `status` int(11) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_bus`
--

INSERT INTO `tbl_bus` (`No`, `busid`, `nplate`, `seats`, `status`) VALUES
(17, 1, 'sylhet-ha-0001', 71, 1),
(18, 2, 'sylhet-ha-0002', 38, 0),
(19, 5, 'sylhet-ha-0466', 38, 0);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_buslocation`
--

CREATE TABLE `tbl_buslocation` (
  `Sl` int(11) NOT NULL,
  `busid` text NOT NULL,
  `lng` text NOT NULL,
  `lat` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_busrecord`
--

CREATE TABLE `tbl_busrecord` (
  `busid` int(255) NOT NULL,
  `nplate` varchar(55) NOT NULL,
  `frm` varchar(255) NOT NULL,
  `dest` varchar(255) NOT NULL,
  `route` int(55) NOT NULL,
  `seats` int(55) NOT NULL,
  `booked` int(55) NOT NULL DEFAULT 0,
  `datee` date NOT NULL,
  `start` time NOT NULL,
  `reach` time NOT NULL,
  `status` int(55) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_busrecord`
--

INSERT INTO `tbl_busrecord` (`busid`, `nplate`, `frm`, `dest`, `route`, `seats`, `booked`, `datee`, `start`, `reach`, `status`) VALUES
(1, 'sylhet-ha-0001', 'Tilaghor', 'Kamal Bazar', 1, 41, 0, '2021-01-01', '01:56:00', '01:57:00', 1),
(1, 'sylhet-ha-0001', 'Tilaghor', 'Kamal Bazar', 3, 41, 0, '2021-01-01', '01:59:00', '02:00:00', 1),
(1, 'sylhet-ha-0001', 'Kamal Bazar', 'Tilaghor', 1, 41, 0, '2021-01-01', '02:13:00', '02:18:00', 1),
(2, 'sylhet-ha-0002', 'Tilaghor', 'Kamal Bazar', 3, 44, 0, '2021-03-01', '02:19:00', '02:24:00', 1),
(4, 'sylhet-ha-1004', 'Tilaghor', 'Kamal Bazar', 1, 40, 0, '2021-03-04', '02:20:00', '02:25:00', 1),
(9, 'sylhet-ha-1009', 'Tilaghor', 'Kamal Bazar', 2, 39, 0, '2021-03-04', '02:22:00', '02:32:00', 1),
(1, 'sylhet-ha-0001', 'Tilaghor', 'Kamal Bazar', 2, 41, 0, '2021-01-01', '02:23:00', '02:25:00', 1),
(1, 'sylhet-ha-0001', 'Tilaghor', 'Kamal Bazar', 2, 41, 0, '2021-01-01', '02:26:00', '02:28:00', 1),
(6, 'sylhet-ha-1006', 'Tilaghor', 'Upashahar', 2, 40, 0, '2021-03-04', '02:27:00', '02:34:00', 1),
(8, 'sylhet-ha-1008', 'Tilaghor', 'Upashahar', 2, 44, 0, '2021-03-01', '02:28:00', '02:33:00', 1),
(2, 'sylhet-ha-0002', 'Tilaghor', 'Kamal Bazar', 1, 44, 0, '2021-03-01', '03:04:00', '03:05:00', 1),
(3, 'sylhet-ha-1003', 'Tilaghor', 'Kamal Bazar', 2, 39, 0, '2021-03-04', '03:05:00', '03:10:00', 1),
(1, 'sylhet-ha-0001', 'Tilaghor', 'Kamal Bazar', 3, 41, 0, '2021-01-01', '03:18:00', '03:19:00', 1),
(5, 'sylhet-ha-1005', 'Tilaghor', 'Kamal Bazar', 4, 44, 0, '2021-03-05', '20:39:00', '20:40:00', 1),
(5, 'sylhet-ha-1005', 'Tilaghor', 'Upashahar', 1, 44, 0, '2021-03-05', '20:40:00', '20:41:00', 1),
(3, 'sylhet-ha-1003', 'Tilaghor', 'Kamal Bazar', 2, 39, 0, '2021-03-05', '21:02:00', '21:05:00', 1),
(5, 'sylhet-ha-1005', 'Tilaghor', 'Upashahar', 2, 44, 0, '2021-03-05', '21:04:00', '21:05:00', 1),
(10, 'sylhet-ha-1010', 'Tilaghor', 'Kamal Bazar', 2, 55, 0, '2021-03-05', '21:23:00', '21:24:00', 1),
(6, 'sylhet-ha-1006', 'Tilaghor', 'Kamal Bazar', 1, 40, 0, '2021-03-05', '21:23:00', '21:23:39', 1),
(10, 'sylhet-ha-1010', 'Kamal Bazar', 'Upashahar', 4, 55, 0, '2021-03-05', '21:26:00', '21:26:43', 1),
(10, 'sylhet-ha-1010', 'Tilaghor', 'Kamal Bazar', 4, 55, 0, '2021-03-05', '21:32:00', '21:34:00', 1),
(9, 'sylhet-ha-1009', 'Tilaghor', 'Kamal Bazar', 2, 39, 0, '2021-03-05', '21:33:00', '21:33:59', 1),
(1, 'sylhet-ha-0001', 'Tilaghor', 'Kamal Bazar', 1, 41, 0, '2021-03-07', '02:11:00', '02:15:00', 1),
(8, 'sylhet-ha-1008', 'Tilaghor', 'Kamal Bazar', 2, 44, 0, '2021-03-07', '02:11:00', '02:17:00', 1),
(6, 'sylhet-ha-1006', 'Kamal Bazar', 'Tilaghor', 4, 40, 0, '2021-03-07', '02:12:00', '03:07:00', 1),
(1, 'sylhet-ha-0001', 'Tilaghor', 'Kamal Bazar', 2, 41, 0, '2021-03-08', '15:05:00', '15:06:00', 1),
(1, 'sylhet-ha-0001', 'Tilaghor', 'Kamal Bazar', 1, 41, 0, '2021-03-08', '15:07:00', '15:08:00', 1),
(10, 'sylhet-ha-1010', 'Tilaghor', 'Kamal Bazar', 1, 55, 0, '2021-03-14', '20:50:00', '21:30:00', 1),
(5, 'sylhet-ha-1005', 'Tilaghor', 'Kamal Bazar', 1, 44, 0, '2021-03-14', '20:50:00', '21:12:00', 1),
(2, 'sylhet-ha-0002', 'Kamal Bazar', 'Upashahar', 4, 44, 0, '2021-03-14', '22:51:00', '22:55:00', 1),
(3, 'sylhet-ha-1003', 'Kamal Bazar', 'Subid Bazar', 3, 39, 0, '2021-03-14', '22:51:00', '00:23:55', 1),
(4, 'sylhet-ha-1004', 'Tilaghor', 'Kamal Bazar', 3, 40, 0, '2021-03-14', '22:52:00', '22:53:00', 1),
(2, 'sylhet-ha-0002', 'Tilaghor', 'Kamal Bazar', 2, 44, 0, '2021-03-15', '00:29:00', '00:30:00', 1),
(4, 'sylhet-ha-1004', 'Tilaghor', 'Kamal Bazar', 1, 40, 0, '2021-03-15', '08:33:00', '11:10:00', 1),
(6, 'sylhet-ha-1006', 'Tilaghor', 'Kamal Bazar', 3, 40, 0, '2021-03-15', '14:55:00', '16:59:00', 2),
(2, 'sylhet-ha-0002', 'Tilaghor', 'Kamal Bazar', 2, 44, 0, '2021-03-15', '15:10:00', '15:11:00', 1),
(7, 'sylhet-ha-1007', 'Tilaghor', 'Kamal Bazar', 2, 44, 0, '2021-03-15', '16:24:00', '16:25:00', 1),
(7, 'sylhet-ha-1007', 'Tilaghor', 'Upashahar', 3, 44, 0, '2021-03-15', '16:26:00', '16:32:00', 2),
(1, 'sylhet-ha-0001', 'Tilaghor', 'Upashahar', 2, 41, 0, '2021-03-15', '16:31:00', '16:43:00', 2),
(10, 'sylhet-ha-1010', 'Kamal Bazar', 'Tilaghor', 2, 55, 0, '2021-03-15', '16:33:00', '18:38:00', 1),
(5, 'sylhet-ha-1005', 'Tilaghor', 'Kamal Bazar', 4, 44, 0, '2021-03-15', '20:52:00', '22:50:00', 1),
(11, 'sylhet-ha-1011', 'Upashahar', 'Kamal Bazar', 1, 44, 0, '2021-03-15', '22:14:00', '23:14:00', 2),
(9, 'sylhet-ha-1009', 'Kamal Bazar', 'Tilaghor', 2, 39, 0, '2021-03-15', '22:58:00', '22:59:00', 1),
(2, 'sylhet-ha-0002', 'Kamal Bazar', 'Tilaghor', 2, 44, 0, '2021-03-17', '15:57:00', '16:30:00', 1),
(1, 'sylhet-ha-0001', 'Tilaghor', 'Kamal Bazar', 2, 41, 0, '2021-03-18', '00:40:00', '01:04:00', 1),
(4, 'sylhet-ha-1004', 'Tilaghor', 'Kamal Bazar', 3, 40, 0, '2021-03-18', '00:41:00', '01:47:00', 1),
(8, 'sylhet-ha-1008', 'Tilaghor', 'Upashahar', 2, 44, 0, '2021-03-18', '15:56:00', '16:56:00', 1),
(1, 'sylhet-ha-0001', 'Tilaghor', 'Kamal Bazar', 2, 41, 0, '2021-03-18', '22:05:00', '22:06:00', 1),
(1, 'sylhet-ha-0001', 'Tilaghor', 'Kamal Bazar', 3, 41, 0, '2021-03-18', '22:22:00', '22:28:00', 1),
(1, 'sylhet-ha-0001', 'Tilaghor', 'Kamal Bazar', 1, 41, 0, '2021-03-25', '23:47:00', '23:53:00', 1),
(5, 'sylhet-ha-1005', 'Kamal Bazar', 'Tilaghor', 2, 44, 0, '2021-03-26', '22:17:00', '22:17:29', 1),
(2, 'sylhet-ha-0002', 'Tilaghor', 'Kamal Bazar', 2, 44, 0, '2021-03-30', '21:34:00', '21:52:32', 1),
(1, 'sylhet-ha-0001', 'Tilaghor', 'Kamal Bazar', 2, 41, 0, '2021-03-31', '13:52:00', '14:00:49', 1),
(1, 'sylhet-ha-0001', 'Tilaghor', 'Subid Bazar', 1, 71, 0, '2021-06-04', '02:16:00', '03:17:00', 0),
(2, 'sylhet-ha-0002', 'Tilaghor', 'Kamal Bazar', 1, 38, 0, '2021-09-20', '20:04:00', '21:04:00', 0);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_bussend`
--

CREATE TABLE `tbl_bussend` (
  `Sl` int(101) NOT NULL,
  `busid` text NOT NULL,
  `frm` text NOT NULL,
  `dest` text NOT NULL,
  `route` text NOT NULL,
  `seats` text NOT NULL,
  `bookedseats` text NOT NULL DEFAULT '0',
  `driverid` text NOT NULL DEFAULT '0',
  `time` text NOT NULL DEFAULT '0',
  `datee` text NOT NULL,
  `start` text NOT NULL,
  `reach` text NOT NULL,
  `avail` text NOT NULL DEFAULT '0',
  `status` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_point`
--

CREATE TABLE `tbl_point` (
  `No` int(101) NOT NULL,
  `route` varchar(55) NOT NULL,
  `point` varchar(501) NOT NULL,
  `time` varchar(500) NOT NULL,
  `slot` varchar(250) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_point`
--

INSERT INTO `tbl_point` (`No`, `route`, `point`, `time`, `slot`) VALUES
(1, '01', 'Tilaghor', '08:00', '1'),
(2, '01', 'Baluchar Point', '08:05', '1'),
(3, '01', 'TV Gate', '08:10', '1'),
(4, '01', 'Shahi Eidgah', '08:15', '1'),
(5, '01', 'Amborkhana', '08:20', '1'),
(6, '01', 'Jalalabad', '08:25', '1'),
(7, '01', 'Subid Bazar', '08:30', '1'),
(8, '01', 'Modina Market', '08:35', '1'),
(9, '01', 'Pathantula', '08:40', '1'),
(10, '01', 'SUST Gate', '08:45', '1'),
(11, '02', 'Surma Tower', '08:00', '1'),
(12, '02', 'Taltola', '08:05', '1'),
(13, '02', 'Jitu Miahs Point', '08:10', '1'),
(14, '02', 'Kuarpar Point', '08:15', '1'),
(15, '02', 'Lamabazar', '08:20', '1'),
(16, '02', 'Rikabi Bazar', '08:25', '1'),
(17, '02', 'Police Line', '08:30', '1'),
(18, '02', 'Mirer Maydan', '08:35', '1'),
(19, '02', 'Akhalia Bazar', '08:40', '1'),
(20, '02', 'Temukhi Point', '08:45', '1'),
(21, '02', 'Surma Tower', '10:30', '2'),
(22, '02', 'Taltola', '10:35', '2'),
(23, '02', 'Jitu Miahs Point', '10:40', '2'),
(24, '02', 'Kuarpar Point', '10:45', '2'),
(25, '02', 'Lamabazar', '10:50', '2'),
(26, '02', 'Rikabi Bazar', '10:55', '2'),
(27, '02', 'Police Line', '11:00', '2'),
(28, '02', 'Mirer Maydan', '11:05', '2'),
(29, '02', 'Akhalia Bazar', '11:10', '2'),
(30, '02', 'Temukhi Point', '11:15', '2'),
(31, '02', 'Surma Tower', '12:45', '3'),
(32, '02', 'Taltola', '12:50', '3'),
(33, '02', 'Jitu Miahs Point', '12:55', '3'),
(34, '02', 'Kuarpar Point', '01:00', '3'),
(35, '02', 'Lamabazar', '01:05', '3'),
(36, '02', 'Rikabi Bazar', '01:10', '3'),
(37, '02', 'Police Line', '01:15', '3'),
(38, '02', 'Mirer Maydan', '01:20', '3'),
(39, '02', 'Akhalia Bazar', '01:25', '3'),
(40, '02', 'Temukhi Point', '01:30', '3');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_seat`
--

CREATE TABLE `tbl_seat` (
  `No` int(101) NOT NULL,
  `route` text NOT NULL,
  `busid` text NOT NULL,
  `seat` text NOT NULL,
  `studentid` text NOT NULL,
  `status` text NOT NULL,
  `time` text NOT NULL,
  `date` text NOT NULL,
  `frm` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_student`
--

CREATE TABLE `tbl_student` (
  `Sl` int(100) NOT NULL,
  `studentid` text NOT NULL,
  `studentName` text NOT NULL,
  `email` text NOT NULL,
  `phone` text NOT NULL,
  `section` text NOT NULL,
  `dob` text NOT NULL,
  `dept` text NOT NULL,
  `route` text NOT NULL,
  `semester` text NOT NULL,
  `batch` text NOT NULL,
  `pickuppoint` text NOT NULL,
  `password` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_student`
--

INSERT INTO `tbl_student` (`Sl`, `studentid`, `studentName`, `email`, `phone`, `section`, `dob`, `dept`, `route`, `semester`, `batch`, `pickuppoint`, `password`) VALUES
(4, '1812020128', 'Nilashish Roy', 'nilashishroy@gmail.com', '01634813787', 'C', '14-3-1998', 'CSE', '02', '11', '47', 'Lamabazar', '1234'),
(5, '1812020124', 'Shah Fayez Ali', 'shahfayez@gmail.com', '0171028543', 'C', '3-9-1997', 'Civil Engineering', '02', '3', '61', 'Shibgonj', '1234'),
(6, '1812020123', 'Muhammed Ashraful', 'ash@gmail.com', '01735942786', 'C', '2-9-2021', 'Bangla', '04', '6', '25', 'Kaji Tula', '1234');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tbl_admin`
--
ALTER TABLE `tbl_admin`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_allstudents`
--
ALTER TABLE `tbl_allstudents`
  ADD PRIMARY KEY (`sl`);

--
-- Indexes for table `tbl_bookinghistory`
--
ALTER TABLE `tbl_bookinghistory`
  ADD PRIMARY KEY (`No`);

--
-- Indexes for table `tbl_bus`
--
ALTER TABLE `tbl_bus`
  ADD PRIMARY KEY (`No`);

--
-- Indexes for table `tbl_buslocation`
--
ALTER TABLE `tbl_buslocation`
  ADD PRIMARY KEY (`Sl`);

--
-- Indexes for table `tbl_bussend`
--
ALTER TABLE `tbl_bussend`
  ADD PRIMARY KEY (`Sl`);

--
-- Indexes for table `tbl_point`
--
ALTER TABLE `tbl_point`
  ADD PRIMARY KEY (`No`);

--
-- Indexes for table `tbl_seat`
--
ALTER TABLE `tbl_seat`
  ADD PRIMARY KEY (`No`);

--
-- Indexes for table `tbl_student`
--
ALTER TABLE `tbl_student`
  ADD PRIMARY KEY (`Sl`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tbl_allstudents`
--
ALTER TABLE `tbl_allstudents`
  MODIFY `sl` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `tbl_bookinghistory`
--
ALTER TABLE `tbl_bookinghistory`
  MODIFY `No` int(101) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `tbl_bus`
--
ALTER TABLE `tbl_bus`
  MODIFY `No` int(55) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT for table `tbl_buslocation`
--
ALTER TABLE `tbl_buslocation`
  MODIFY `Sl` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tbl_bussend`
--
ALTER TABLE `tbl_bussend`
  MODIFY `Sl` int(101) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `tbl_point`
--
ALTER TABLE `tbl_point`
  MODIFY `No` int(101) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=41;

--
-- AUTO_INCREMENT for table `tbl_seat`
--
ALTER TABLE `tbl_seat`
  MODIFY `No` int(101) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `tbl_student`
--
ALTER TABLE `tbl_student`
  MODIFY `Sl` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 16, 2020 at 06:01 AM
-- Server version: 10.4.11-MariaDB
-- PHP Version: 7.4.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `online_activity_registration_system`
--

-- --------------------------------------------------------

--
-- Table structure for table `academictable`
--

CREATE TABLE `academictable` (
  `ID` varchar(9) NOT NULL,
  `Faculty` varchar(254) DEFAULT NULL,
  `Course` varchar(254) DEFAULT NULL,
  `EntryYear` varchar(4) DEFAULT NULL,
  `Duration` varchar(4) DEFAULT NULL,
  `Mode` varchar(13) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `academictable`
--

INSERT INTO `academictable` (`ID`, `Faculty`, `Course`, `EntryYear`, `Duration`, `Mode`) VALUES
('WIF180049', NULL, NULL, NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `contacttable`
--

CREATE TABLE `contacttable` (
  `ID` varchar(9) NOT NULL,
  `Address` varchar(254) DEFAULT NULL,
  `Postcode` varchar(5) DEFAULT NULL,
  `City` varchar(20) DEFAULT NULL,
  `State` varchar(30) DEFAULT NULL,
  `Phone` varchar(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `contacttable`
--

INSERT INTO `contacttable` (`ID`, `Address`, `Postcode`, `City`, `State`, `Phone`) VALUES
('WIF180049', '', '', '', '', '');

-- --------------------------------------------------------

--
-- Table structure for table `personaltable`
--

CREATE TABLE `personaltable` (
  `ID` varchar(9) NOT NULL,
  `ProfilePicture` longblob DEFAULT NULL,
  `NewMatrics` varchar(10) DEFAULT NULL,
  `IC` varchar(20) DEFAULT NULL,
  `Nationality` varchar(13) DEFAULT NULL,
  `Gender` varchar(6) DEFAULT NULL,
  `Birthday` varchar(254) DEFAULT NULL,
  `Race` varchar(10) DEFAULT NULL,
  `Religion` varchar(12) DEFAULT NULL,
  `Marital` varchar(10) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `personaltable`
--

INSERT INTO `personaltable` (`ID`, `ProfilePicture`, `NewMatrics`, `IC`, `Nationality`, `Gender`, `Birthday`, `Race`, `Religion`, `Marital`) VALUES
('WIF180049', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `reset_password`
--

CREATE TABLE `reset_password` (
  `ID` int(11) NOT NULL,
  `Code` varchar(255) NOT NULL,
  `Email` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `ID` varchar(9) NOT NULL,
  `Email` varchar(254) NOT NULL,
  `Name` varchar(255) NOT NULL,
  `Password` varchar(128) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`ID`, `Email`, `Name`, `Password`) VALUES
('WIF180049', 'WIF180049@SISWA.UM.EDU.MY', 'NATHANIEL ONG YII TAK', '82a4dfdccd1dc4e98cc4099d20e0279565b96d579b5cc708ae30ea11f1bda8b7');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `academictable`
--
ALTER TABLE `academictable`
  ADD PRIMARY KEY (`ID`),
  ADD UNIQUE KEY `UA_ID` (`ID`);

--
-- Indexes for table `contacttable`
--
ALTER TABLE `contacttable`
  ADD PRIMARY KEY (`ID`),
  ADD UNIQUE KEY `UCON_ID` (`ID`);

--
-- Indexes for table `personaltable`
--
ALTER TABLE `personaltable`
  ADD PRIMARY KEY (`ID`),
  ADD UNIQUE KEY `UP_ID` (`ID`);

--
-- Indexes for table `reset_password`
--
ALTER TABLE `reset_password`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD UNIQUE KEY `UC_ID` (`ID`),
  ADD UNIQUE KEY `UC_Email` (`Email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `reset_password`
--
ALTER TABLE `reset_password`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

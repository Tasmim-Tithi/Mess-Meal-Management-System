-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Feb 16, 2021 at 05:45 PM
-- Server version: 10.4.11-MariaDB
-- PHP Version: 7.4.5

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `mes_meal_database`
--

-- --------------------------------------------------------

--
-- Table structure for table `bazar`
--

CREATE TABLE `bazar` (
  `id` int(100) NOT NULL,
  `date` date NOT NULL,
  `amount` double NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `login_manager`
--

CREATE TABLE `login_manager` (
  `password` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `login_manager`
--

INSERT INTO `login_manager` (`password`) VALUES
('123456');

-- --------------------------------------------------------

--
-- Table structure for table `mealtable`
--

CREATE TABLE `mealtable` (
  `id` int(255) NOT NULL,
  `name` varchar(100) NOT NULL,
  `phnNum` varchar(20) NOT NULL,
  `date` date DEFAULT NULL,
  `brekfast` float DEFAULT NULL,
  `lunch` float DEFAULT NULL,
  `dinner` float DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `members`
--

CREATE TABLE `members` (
  `ID` int(100) NOT NULL,
  `NAME` varchar(100) NOT NULL,
  `PHONE_NUMBER` varchar(11) NOT NULL,
  `ADDRESS` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `members`
--

INSERT INTO `members` (`ID`, `NAME`, `PHONE_NUMBER`, `ADDRESS`) VALUES
(1, 'anika', '89353658019', 'GOURASHAR');

-- --------------------------------------------------------

--
-- Table structure for table `members_deposit`
--

CREATE TABLE `members_deposit` (
  `ID` int(100) NOT NULL,
  `NAME` varchar(100) NOT NULL,
  `PHONE_NUMBER` varchar(11) NOT NULL,
  `totalDeposit` int(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `members_deposit`
--

INSERT INTO `members_deposit` (`ID`, `NAME`, `PHONE_NUMBER`, `totalDeposit`) VALUES
(1, 'anika', '89353658019', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `previous_record_1`
--

CREATE TABLE `previous_record_1` (
  `id` int(100) NOT NULL,
  `name` varchar(20) NOT NULL,
  `phnNum` varchar(20) NOT NULL,
  `date` date NOT NULL,
  `Bf` float NOT NULL,
  `L` float NOT NULL,
  `D` float NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `previous_record_1`
--

INSERT INTO `previous_record_1` (`id`, `name`, `phnNum`, `date`, `Bf`, `L`, `D`) VALUES
(1, 'tahmid', '12345678', '2021-02-17', 1, 2, 1),
(2, 'nitu', '12345678', '2021-02-17', 1, 2, 1),
(3, 'jannat', '', '2021-02-17', 1, 2, 1),
(4, 'akhi', '10', '2021-02-18', 1, 2, 1),
(5, 'rparbona', '1', '2021-02-19', 1, 2, 1);

-- --------------------------------------------------------

--
-- Table structure for table `previous_record_2`
--

CREATE TABLE `previous_record_2` (
  `id` int(100) NOT NULL,
  `name` varchar(20) NOT NULL,
  `Total_cost` float NOT NULL,
  `amount` float NOT NULL,
  `S_date` date NOT NULL,
  `E_date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `bazar`
--
ALTER TABLE `bazar`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `mealtable`
--
ALTER TABLE `mealtable`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `members`
--
ALTER TABLE `members`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `members_deposit`
--
ALTER TABLE `members_deposit`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `previous_record_1`
--
ALTER TABLE `previous_record_1`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `previous_record_2`
--
ALTER TABLE `previous_record_2`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `bazar`
--
ALTER TABLE `bazar`
  MODIFY `id` int(100) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `mealtable`
--
ALTER TABLE `mealtable`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `members`
--
ALTER TABLE `members`
  MODIFY `ID` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `members_deposit`
--
ALTER TABLE `members_deposit`
  MODIFY `ID` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `previous_record_1`
--
ALTER TABLE `previous_record_1`
  MODIFY `id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `previous_record_2`
--
ALTER TABLE `previous_record_2`
  MODIFY `id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

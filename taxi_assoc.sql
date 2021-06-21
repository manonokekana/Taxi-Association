-- phpMyAdmin SQL Dump
-- version 4.8.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Oct 17, 2020 at 05:45 AM
-- Server version: 10.1.37-MariaDB
-- PHP Version: 7.3.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `taxi_assoc`
--

-- --------------------------------------------------------

--
-- Table structure for table `driver`
--

CREATE TABLE `driver` (
  `driver_id` int(11) NOT NULL,
  `driver_name` varchar(30) DEFAULT NULL,
  `driver_surname` varchar(30) DEFAULT NULL,
  `driver_id_no` varchar(13) NOT NULL,
  `contact` varchar(13) DEFAULT NULL,
  `fit` varchar(20) NOT NULL,
  `driver_lic_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `driver`
--

INSERT INTO `driver` (`driver_id`, `driver_name`, `driver_surname`, `driver_id_no`, `contact`, `fit`, `driver_lic_id`) VALUES
(1, 'James', 'Left', '1234', '0768907654', 'yes', 1),
(2, 'Oupa', 'Lwazi', '2468', '01123467543', 'not tested', 2);

-- --------------------------------------------------------

--
-- Table structure for table `driver_lic`
--

CREATE TABLE `driver_lic` (
  `driver_lic_id` int(11) NOT NULL,
  `code` varchar(12) NOT NULL,
  `first_issue_date` date NOT NULL,
  `driver_lic_exp_date` date NOT NULL,
  `pdp_exp_date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `driver_lic`
--

INSERT INTO `driver_lic` (`driver_lic_id`, `code`, `first_issue_date`, `driver_lic_exp_date`, `pdp_exp_date`) VALUES
(1, 'C', '2017-03-01', '2022-03-31', '2019-03-31'),
(2, 'EB', '2020-05-01', '2025-05-30', '2022-05-30');

-- --------------------------------------------------------

--
-- Table structure for table `taxi`
--

CREATE TABLE `taxi` (
  `taxi_id` int(11) NOT NULL,
  `taxi_reg` varchar(20) DEFAULT NULL,
  `make` varchar(20) DEFAULT NULL,
  `model` varchar(10) DEFAULT NULL,
  `driver_id` int(11) DEFAULT NULL,
  `disc_id` int(11) DEFAULT NULL,
  `permit_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `taxi`
--

INSERT INTO `taxi` (`taxi_id`, `taxi_reg`, `make`, `model`, `driver_id`, `disc_id`, `permit_id`) VALUES
(1, 'JD25CN', 'Toyota', '2007', 1, 1, 2),
(2, 'BLK098', 'Iveco', '2000', 2, 2, 1);

-- --------------------------------------------------------

--
-- Table structure for table `taxi_disc`
--

CREATE TABLE `taxi_disc` (
  `disc_id` int(11) NOT NULL,
  `test_date` date NOT NULL,
  `exp_date` date NOT NULL,
  `tare` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `taxi_disc`
--

INSERT INTO `taxi_disc` (`disc_id`, `test_date`, `exp_date`, `tare`) VALUES
(1, '2019-11-30', '2020-11-30', 5000),
(2, '2020-06-01', '2021-05-31', 2500);

-- --------------------------------------------------------

--
-- Table structure for table `taxi_permit`
--

CREATE TABLE `taxi_permit` (
  `permit_id` int(11) NOT NULL,
  `persons_standing` int(11) NOT NULL,
  `persons_sitting` int(11) NOT NULL,
  `permit_issue_date` date NOT NULL,
  `permit_exp_date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `taxi_permit`
--

INSERT INTO `taxi_permit` (`permit_id`, `persons_standing`, `persons_sitting`, `permit_issue_date`, `permit_exp_date`) VALUES
(1, 0, 14, '2019-11-30', '2022-10-22'),
(2, 0, 22, '2018-12-01', '2020-10-14');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `driver`
--
ALTER TABLE `driver`
  ADD PRIMARY KEY (`driver_id`),
  ADD KEY `driver_lic` (`driver_lic_id`);

--
-- Indexes for table `driver_lic`
--
ALTER TABLE `driver_lic`
  ADD PRIMARY KEY (`driver_lic_id`);

--
-- Indexes for table `taxi`
--
ALTER TABLE `taxi`
  ADD PRIMARY KEY (`taxi_id`),
  ADD KEY `driver` (`driver_id`),
  ADD KEY `taxi_disc` (`disc_id`),
  ADD KEY `taxi_permit` (`permit_id`);

--
-- Indexes for table `taxi_disc`
--
ALTER TABLE `taxi_disc`
  ADD PRIMARY KEY (`disc_id`);

--
-- Indexes for table `taxi_permit`
--
ALTER TABLE `taxi_permit`
  ADD PRIMARY KEY (`permit_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `driver`
--
ALTER TABLE `driver`
  MODIFY `driver_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `driver_lic`
--
ALTER TABLE `driver_lic`
  MODIFY `driver_lic_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `taxi`
--
ALTER TABLE `taxi`
  MODIFY `taxi_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `taxi_disc`
--
ALTER TABLE `taxi_disc`
  MODIFY `disc_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `taxi_permit`
--
ALTER TABLE `taxi_permit`
  MODIFY `permit_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `driver`
--
ALTER TABLE `driver`
  ADD CONSTRAINT `driver_lic` FOREIGN KEY (`driver_lic_id`) REFERENCES `driver_lic` (`driver_lic_id`);

--
-- Constraints for table `taxi`
--
ALTER TABLE `taxi`
  ADD CONSTRAINT `driver` FOREIGN KEY (`driver_id`) REFERENCES `driver` (`driver_id`),
  ADD CONSTRAINT `taxi_disc` FOREIGN KEY (`disc_id`) REFERENCES `taxi_disc` (`disc_id`),
  ADD CONSTRAINT `taxi_permit` FOREIGN KEY (`permit_id`) REFERENCES `taxi_permit` (`permit_id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Feb 26, 2021 at 01:02 PM
-- Server version: 5.7.19
-- PHP Version: 5.6.31

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `health`
--

-- --------------------------------------------------------

--
-- Table structure for table `doctor`
--

DROP TABLE IF EXISTS `doctor`;
CREATE TABLE IF NOT EXISTS `doctor` (
  `unm` text NOT NULL,
  `fnm` text NOT NULL,
  `lnm` text NOT NULL,
  `desig` text NOT NULL,
  `specl` text NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `doctor`
--

INSERT INTO `doctor` (`unm`, `fnm`, `lnm`, `desig`, `specl`) VALUES
('HALWIS', 'Hashan', 'Alwis', 'Medical Officer', 'Heart');

-- --------------------------------------------------------

--
-- Table structure for table `hospitals`
--

DROP TABLE IF EXISTS `hospitals`;
CREATE TABLE IF NOT EXISTS `hospitals` (
  `unm` text NOT NULL,
  `hnm` text NOT NULL,
  `dstric` text NOT NULL,
  `wrds` int(11) NOT NULL,
  `thetrs` int(11) NOT NULL,
  `icub` int(11) NOT NULL,
  `bds` int(11) NOT NULL,
  `cont` int(11) NOT NULL,
  `ambcnt` int(11) NOT NULL,
  `eml` text NOT NULL,
  `tpe` text NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `hospitals`
--

INSERT INTO `hospitals` (`unm`, `hnm`, `dstric`, `wrds`, `thetrs`, `icub`, `bds`, `cont`, `ambcnt`, `eml`, `tpe`) VALUES
('COLOMBOG', 'National Hospital SL', 'Colombo', 45, 18, 60, 350, 112345672, 772356981, 'general@hospital.com', 'Government'),
('CNAWALOKA', 'Nawaloka Hospital', 'Colombo', 18, 8, 10, 150, 112345645, 772356954, 'nawaloka@hospital.com', 'Private'),
('CASIRI', 'Asiri Central', 'Colombo', 12, 6, 15, 125, 112345734, 772356967, 'asiri@hospital.com', 'Private');

-- --------------------------------------------------------

--
-- Table structure for table `logbook`
--

DROP TABLE IF EXISTS `logbook`;
CREATE TABLE IF NOT EXISTS `logbook` (
  `nic` text NOT NULL,
  `fnm` text NOT NULL,
  `lnm` text NOT NULL,
  `dt` date NOT NULL,
  `rsn` text NOT NULL,
  `stts` text NOT NULL,
  `cm` longtext NOT NULL,
  `doc` text NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `logbook`
--

INSERT INTO `logbook` (`nic`, `fnm`, `lnm`, `dt`, `rsn`, `stts`, `cm`, `doc`) VALUES
('921720041v', 'Malith', 'Athukoralage', '2020-07-01', 'Feaver', 'Normal', 'Addmitted to the hospital. Selyne and paanadol given. discharged after two days', 'Hashan Alwis'),
('921720041v', 'Malith', 'Athukoralage', '2020-08-06', 'Feaver', 'Important', 'Admitted. Dengue positive. Sayline given. One time only injection giveen', 'Hashan Alwis'),
('921720041v', 'Malith', 'Athukoralage', '2021-02-18', 'dsds', 'Important', 'hbhugxni\r\nhhjniasuas', 'Hashan Alwis');

-- --------------------------------------------------------

--
-- Table structure for table `patient`
--

DROP TABLE IF EXISTS `patient`;
CREATE TABLE IF NOT EXISTS `patient` (
  `nic` text NOT NULL,
  `fnm` text NOT NULL,
  `lnm` text NOT NULL,
  `adrs` text NOT NULL,
  `phn` int(11) NOT NULL,
  `eml` text NOT NULL,
  `doc` text NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `patient`
--

INSERT INTO `patient` (`nic`, `fnm`, `lnm`, `adrs`, `phn`, `eml`, `doc`) VALUES
('921720041v', 'Malith', 'Athukoralage', '58/E, Janapriya Mawatha, Alubomulla, Panadura.', 715347402, 'malith1@gmail.com', 'HALWIS');

-- --------------------------------------------------------

--
-- Table structure for table `terms`
--

DROP TABLE IF EXISTS `terms`;
CREATE TABLE IF NOT EXISTS `terms` (
  `fnm` text NOT NULL,
  `lnm` text NOT NULL,
  `unm` text NOT NULL,
  `lup` text NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `terms`
--

INSERT INTO `terms` (`fnm`, `lnm`, `unm`, `lup`) VALUES
('Rumesh', 'Sadaruwan', 'RSADARUWAN', ''),
('Rumesh', 'Sadaruwan', 'RSADARUWAN', 'ashi'),
('Nawaloka', 'hospital', 'COLOMBON', 'ashi');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

DROP TABLE IF EXISTS `users`;
CREATE TABLE IF NOT EXISTS `users` (
  `uid` int(11) NOT NULL AUTO_INCREMENT,
  `unm` text NOT NULL,
  `pw` text NOT NULL,
  `utp` text NOT NULL,
  PRIMARY KEY (`uid`)
) ENGINE=MyISAM AUTO_INCREMENT=14 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`uid`, `unm`, `pw`, `utp`) VALUES
(2, 'admin', '1234', 'sys'),
(3, 'HALWIS', 'P', 'doc'),
(10, 'COLOMBOG', 'P', 'hmanage'),
(12, 'CNAWALOKA', 'P', 'hmanage'),
(13, 'CASIRI', 'P', 'hmanage');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

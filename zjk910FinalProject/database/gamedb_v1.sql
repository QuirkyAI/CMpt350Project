-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Apr 01, 2016 at 06:30 AM
-- Server version: 10.1.10-MariaDB
-- PHP Version: 5.6.15

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `gamedb`
--

-- --------------------------------------------------------

--
-- Table structure for table `developer`
--

CREATE TABLE `developer` (
  `developer_name` varchar(120) NOT NULL,
  `founding_year` int(11) NOT NULL,
  `final_year` int(11) NOT NULL,
  `hq_region` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `games`
--

CREATE TABLE `games` (
  `game_title` varchar(120) NOT NULL,
  `release_year` int(11) NOT NULL,
  `publisher` varchar(120) NOT NULL,
  `developer` varchar(120) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `games_systems`
--

CREATE TABLE `games_systems` (
  `game_title` varchar(120) NOT NULL,
  `release_year` int(11) NOT NULL,
  `system` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `game_regions`
--

CREATE TABLE `game_regions` (
  `game_title` varchar(120) NOT NULL,
  `release_year` int(11) NOT NULL,
  `region` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `game_tags`
--

CREATE TABLE `game_tags` (
  `game_title` varchar(120) NOT NULL,
  `release_year` int(11) NOT NULL,
  `tag` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `publisher`
--

CREATE TABLE `publisher` (
  `publisher_name` varchar(120) NOT NULL,
  `founding_year` int(11) NOT NULL,
  `final_year` int(11) NOT NULL,
  `hq_region` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `regions`
--

CREATE TABLE `regions` (
  `region` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `regions`
--

INSERT INTO `regions` (`region`) VALUES
('australia'),
('china'),
('europe'),
('japan'),
('north_america'),
('russia'),
('south_korea'),
('taiwan');

-- --------------------------------------------------------

--
-- Table structure for table `sales`
--

CREATE TABLE `sales` (
  `game_title` varchar(120) NOT NULL,
  `release_date` date NOT NULL,
  `price` int(11) NOT NULL,
  `system` varchar(10) NOT NULL,
  `units` int(11) NOT NULL,
  `last_update` date NOT NULL,
  `organization` varchar(120) NOT NULL,
  `region` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `systems`
--

CREATE TABLE `systems` (
  `system` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `systems`
--

INSERT INTO `systems` (`system`) VALUES
('3DS'),
('DS'),
('Linux'),
('Mac'),
('PC'),
('PS3'),
('PS4'),
('Wii'),
('WiiU'),
('Xbox360'),
('XboxOne');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `developer`
--
ALTER TABLE `developer`
  ADD PRIMARY KEY (`developer_name`);

--
-- Indexes for table `games`
--
ALTER TABLE `games`
  ADD PRIMARY KEY (`game_title`,`release_year`);

--
-- Indexes for table `games_systems`
--
ALTER TABLE `games_systems`
  ADD PRIMARY KEY (`game_title`,`release_year`,`system`);

--
-- Indexes for table `game_regions`
--
ALTER TABLE `game_regions`
  ADD PRIMARY KEY (`game_title`,`release_year`,`region`);

--
-- Indexes for table `game_tags`
--
ALTER TABLE `game_tags`
  ADD PRIMARY KEY (`game_title`,`release_year`,`tag`);

--
-- Indexes for table `publisher`
--
ALTER TABLE `publisher`
  ADD PRIMARY KEY (`publisher_name`);

--
-- Indexes for table `regions`
--
ALTER TABLE `regions`
  ADD PRIMARY KEY (`region`);

--
-- Indexes for table `sales`
--
ALTER TABLE `sales`
  ADD PRIMARY KEY (`game_title`,`release_date`,`price`,`system`,`organization`);

--
-- Indexes for table `systems`
--
ALTER TABLE `systems`
  ADD PRIMARY KEY (`system`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

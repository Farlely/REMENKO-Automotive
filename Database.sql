-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Host: localhost:8889
-- Generation Time: Mar 19, 2020 at 04:10 PM
-- Server version: 5.7.25
-- PHP Version: 7.2.14

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";

--
-- Database: `RemenkoAutomotive`
--

-- --------------------------------------------------------

--
-- Table structure for table `Automerk`
--

CREATE TABLE `Automerk` (
  `AutomerkCode` int(11) NOT NULL,
  `Automerk` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `Automerk`
--

INSERT INTO `Automerk` (`AutomerkCode`, `Automerk`) VALUES
(1, 'Audi'),
(2, 'Toyota'),
(3, 'Nissan'),
(5, 'ford');

-- --------------------------------------------------------

--
-- Table structure for table `Automodel`
--

CREATE TABLE `Automodel` (
  `AutomodelCode` int(11) NOT NULL,
  `Automodel` varchar(20) NOT NULL,
  `AutomerkCode` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `Automodel`
--

INSERT INTO `Automodel` (`AutomodelCode`, `Automodel`, `AutomerkCode`) VALUES
(401, 'A4', 1);

-- --------------------------------------------------------

--
-- Table structure for table `Bouwjaar`
--

CREATE TABLE `Bouwjaar` (
  `BouwjaarCode` int(11) NOT NULL,
  `Autobouwjaar` date NOT NULL,
  `AutomodelCode` int(11) NOT NULL,
  `DakTypeCode` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `DakType`
--

CREATE TABLE `DakType` (
  `DakTypeCode` int(11) NOT NULL,
  `BouwjaarCode` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `Automerk`
--
ALTER TABLE `Automerk`
  ADD PRIMARY KEY (`AutomerkCode`),
  ADD KEY `AutomerkCode` (`AutomerkCode`);

--
-- Indexes for table `Automodel`
--
ALTER TABLE `Automodel`
  ADD PRIMARY KEY (`AutomodelCode`,`AutomerkCode`),
  ADD KEY `AutomodelCode` (`AutomodelCode`,`AutomerkCode`),
  ADD KEY `AutomerkCode` (`AutomerkCode`);

--
-- Indexes for table `Bouwjaar`
--
ALTER TABLE `Bouwjaar`
  ADD PRIMARY KEY (`BouwjaarCode`,`AutomodelCode`,`DakTypeCode`),
  ADD KEY `BouwjaarCode` (`BouwjaarCode`,`AutomodelCode`,`DakTypeCode`),
  ADD KEY `AutomodelCode` (`AutomodelCode`),
  ADD KEY `DakTypeCode` (`DakTypeCode`);

--
-- Indexes for table `DakType`
--
ALTER TABLE `DakType`
  ADD PRIMARY KEY (`DakTypeCode`,`BouwjaarCode`),
  ADD KEY `DakTypeCode` (`DakTypeCode`,`BouwjaarCode`);

--
-- Constraints for dumped tables
--

--
-- Constraints for table `Automodel`
--
ALTER TABLE `Automodel`
  ADD CONSTRAINT `automodel_ibfk_1` FOREIGN KEY (`AutomerkCode`) REFERENCES `Automerk` (`AutomerkCode`);

--
-- Constraints for table `Bouwjaar`
--
ALTER TABLE `Bouwjaar`
  ADD CONSTRAINT `bouwjaar_ibfk_1` FOREIGN KEY (`AutomodelCode`) REFERENCES `Automodel` (`AutomodelCode`),
  ADD CONSTRAINT `bouwjaar_ibfk_2` FOREIGN KEY (`DakTypeCode`) REFERENCES `DakType` (`DakTypeCode`);

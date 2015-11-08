-- phpMyAdmin SQL Dump
-- version 4.1.14
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Oct 29, 2015 at 03:31 AM
-- Server version: 5.6.17
-- PHP Version: 5.5.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `wp`
--

-- --------------------------------------------------------

--
-- Table structure for table `login`
--

CREATE TABLE IF NOT EXISTS `login` (
  `username` varchar(512) NOT NULL,
  `password` varchar(4096) DEFAULT NULL,
  `firstname` varchar(4096) DEFAULT NULL,
  `lastname` varchar(4096) DEFAULT NULL,
  `profile` varchar(4096) DEFAULT NULL,
  PRIMARY KEY (`username`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `login`
--

INSERT INTO `login` (`username`, `password`, `firstname`, `lastname`, `profile`) VALUES
('datathief', '8b62d8e29548f2e1c3f9966da773942406757ab7c55f3b844c248a2d292a30e98755aa5a42ff01b678409301cd180f563ba2916cfe49892ba44766ec253faaf7', 'Tushar', 'Kanakagiri', 'assets/img/datathief.jpg'),
('prof1', '27e003ef0766d7b44f1051af341212421354556fbf3f3fa462b0f105c3a43c80afc9913a949372988dbbbbcec04968d349687eeca78b5e4fa432f433428bd2bb', 'Professor', 'Oak', 'assets/img/apple.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `questions`
--

CREATE TABLE IF NOT EXISTS `questions` (
  `sl` int(5) NOT NULL,
  `subject` varchar(6) NOT NULL,
  `question` text NOT NULL,
  `marks` int(3) NOT NULL,
  `co` varchar(5) NOT NULL,
  `lo` varchar(5) NOT NULL,
  `used` int(3) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `questions`
--

INSERT INTO `questions` (`sl`, `subject`, `question`, `marks`, `co`, `lo`, `used`) VALUES
(1, '12CS51', 'Why 1', 1, 'CO-1', 'LO-1', 0),
(2, '12CS51', 'Why 2', 2, 'CO-1', 'LO-2', 0),
(3, '12CS51', 'Why 3', 1, 'CO-1', 'LO-3', 0),
(4, '12CS51', 'Why 4', 2, 'CO-1', 'LO-4', 0),
(5, '12CS51', 'Why 5', 1, 'CO-2', 'LO-1', 0),
(6, '12CS51', 'Why 6', 2, 'CO-2', 'LO-2', 0),
(7, '12CS51', 'Why 7', 1, 'CO-2', 'LO-3', 0),
(8, '12CS51', 'Why 8', 2, 'CO-2', 'LO-4', 0),
(9, '12CS51', 'Why 9', 1, 'CO-3', 'LO-1', 0),
(10, '12CS51', 'Why 10', 2, 'CO-3', 'LO-2', 0),
(11, '12CS51', 'Why 11', 1, 'CO-3', 'LO-3', 0),
(12, '12CS51', 'Why 12', 2, 'CO-3', 'LO-4', 0),
(13, '12CS51', 'Why 13', 1, 'CO-4', 'LO-1', 0),
(14, '12CS51', 'Why 14', 2, 'CO-4', 'LO-2', 0),
(15, '12CS51', 'Why 15', 1, 'CO-4', 'LO-3', 0),
(16, '12CS51', 'Why 16', 2, 'CO-4', 'LO-4', 0),
(17, '12CS51', 'Why 17', 1, 'CO-1', 'LO-1', 0),
(18, '12CS51', 'Why 18', 2, 'CO-1', 'LO-2', 0),
(19, '12CS51', 'Why 19', 1, 'CO-1', 'LO-3', 0),
(20, '12CS51', 'Why 20', 2, 'CO-1', 'LO-4', 0),
(21, '12CS51', 'Why 21', 1, 'CO-2', 'LO-1', 0),
(22, '12CS51', 'Why 22', 2, 'CO-2', 'LO-2', 0),
(23, '12CS51', 'Why 23', 1, 'CO-2', 'LO-3', 0),
(24, '12CS51', 'Why 24', 2, 'CO-2', 'LO-4', 0),
(25, '12CS51', 'Why 25', 1, 'CO-3', 'LO-1', 0),
(26, '12CS51', 'Why 26', 2, 'CO-3', 'LO-2', 0),
(27, '12CS51', 'Why 27', 1, 'CO-3', 'LO-3', 0),
(28, '12CS51', 'Why 28', 2, 'CO-3', 'LO-4', 0),
(29, '12CS51', 'Why 29', 1, 'CO-4', 'LO-1', 0),
(30, '12CS51', 'Why 30', 2, 'CO-4', 'LO-2', 0),
(31, '12CS51', 'Why 31', 1, 'CO-4', 'LO-3', 0),
(32, '12CS51', 'Why 32', 2, 'CO-4', 'LO-4', 0),
(33, '12CS51', 'Why 33', 1, 'CO-1', 'LO-1', 0),
(34, '12CS51', 'Why 34', 2, 'CO-1', 'LO-2', 0),
(35, '12CS51', 'Why 35', 1, 'CO-1', 'LO-3', 0),
(36, '12CS51', 'Why 36', 2, 'CO-1', 'LO-4', 0),
(37, '12CS51', 'Why 37', 1, 'CO-2', 'LO-1', 0),
(38, '12CS51', 'Why 38', 2, 'CO-2', 'LO-2', 0),
(39, '12CS51', 'Why 39', 1, 'CO-2', 'LO-3', 0),
(40, '12CS51', 'Why 40', 2, 'CO-2', 'LO-4', 0),
(41, '12CS51', 'Why 41', 1, 'CO-3', 'LO-1', 0),
(42, '12CS51', 'Why 42', 2, 'CO-3', 'LO-2', 0),
(43, '12CS51', 'Why 43', 1, 'CO-3', 'LO-3', 0),
(44, '12CS51', 'Why 44', 2, 'CO-3', 'LO-4', 0),
(45, '12CS51', 'Why 45', 1, 'CO-4', 'LO-1', 0),
(46, '12CS51', 'Why 46', 2, 'CO-4', 'LO-2', 0),
(47, '12CS51', 'Why 47', 1, 'CO-4', 'LO-3', 0),
(48, '12CS51', 'Why 48', 2, 'CO-4', 'LO-4', 0),
(49, '12CS51', 'Why 49', 1, 'CO-1', 'LO-1', 0),
(50, '12CS51', 'Why 50', 2, 'CO-1', 'LO-2', 0),
(51, '12CS51', 'Why 51', 1, 'CO-1', 'LO-3', 0),
(52, '12CS51', 'Why 52', 2, 'CO-1', 'LO-4', 0),
(53, '12CS51', 'Why 53', 1, 'CO-2', 'LO-1', 0),
(54, '12CS51', 'Why 54', 2, 'CO-2', 'LO-2', 0),
(55, '12CS51', 'Why 55', 1, 'CO-2', 'LO-3', 0),
(56, '12CS51', 'Why 56', 2, 'CO-2', 'LO-4', 0),
(57, '12CS51', 'Why 57', 1, 'CO-3', 'LO-1', 0),
(58, '12CS51', 'Why 58', 2, 'CO-3', 'LO-2', 0),
(59, '12CS51', 'Why 59', 1, 'CO-3', 'LO-3', 0),
(60, '12CS51', 'Why 60', 2, 'CO-3', 'LO-4', 0),
(61, '12CS51', 'Why 61', 1, 'CO-4', 'LO-1', 0),
(62, '12CS51', 'Why 62', 2, 'CO-4', 'LO-2', 0),
(63, '12CS51', 'Why 63', 1, 'CO-4', 'LO-3', 0),
(64, '12CS51', 'Why 64', 2, 'CO-4', 'LO-4', 0),
(65, '12CS51', 'Why 65', 1, 'CO-1', 'LO-1', 0),
(66, '12CS51', 'Why 66', 2, 'CO-1', 'LO-2', 0),
(67, '12CS51', 'Why 67', 1, 'CO-1', 'LO-3', 0),
(68, '12CS51', 'Why 68', 2, 'CO-1', 'LO-4', 0),
(69, '12CS51', 'Why 69', 1, 'CO-2', 'LO-1', 0),
(70, '12CS51', 'Why 70', 2, 'CO-2', 'LO-2', 0),
(71, '12CS51', 'Why 71', 1, 'CO-2', 'LO-3', 0),
(72, '12CS51', 'Why 72', 2, 'CO-2', 'LO-4', 0),
(73, '12CS51', 'Why 73', 1, 'CO-3', 'LO-1', 0),
(74, '12CS51', 'Why 74', 2, 'CO-3', 'LO-2', 0),
(75, '12CS51', 'Why 75', 1, 'CO-3', 'LO-3', 0),
(76, '12CS51', 'Why 76', 2, 'CO-3', 'LO-4', 0),
(77, '12CS51', 'Why 77', 1, 'CO-4', 'LO-1', 0),
(78, '12CS51', 'Why 78', 2, 'CO-4', 'LO-2', 0),
(79, '12CS51', 'Why 79', 1, 'CO-4', 'LO-3', 0),
(80, '12CS51', 'Why 80', 2, 'CO-4', 'LO-4', 0),
(81, '12CS51', 'Why 81', 1, 'CO-1', 'LO-1', 0),
(82, '12CS51', 'Why 82', 2, 'CO-1', 'LO-2', 0),
(83, '12CS51', 'Why 83', 1, 'CO-1', 'LO-3', 0),
(84, '12CS51', 'Why 84', 2, 'CO-1', 'LO-4', 0),
(85, '12CS51', 'Why 85', 1, 'CO-2', 'LO-1', 0),
(86, '12CS51', 'Why 86', 2, 'CO-2', 'LO-2', 0),
(87, '12CS51', 'Why 87', 1, 'CO-2', 'LO-3', 0),
(88, '12CS51', 'Why 88', 2, 'CO-2', 'LO-4', 0),
(89, '12CS51', 'Why 89', 1, 'CO-3', 'LO-1', 0),
(90, '12CS51', 'Why 90', 2, 'CO-3', 'LO-2', 0),
(91, '12CS51', 'Why 91', 1, 'CO-3', 'LO-3', 0),
(92, '12CS51', 'Why 92', 2, 'CO-3', 'LO-4', 0),
(93, '12CS51', 'Why 93', 1, 'CO-4', 'LO-1', 0),
(94, '12CS51', 'Why 94', 2, 'CO-4', 'LO-2', 0),
(95, '12CS51', 'Why 95', 1, 'CO-4', 'LO-3', 0),
(96, '12CS51', 'Why 96', 2, 'CO-4', 'LO-4', 0),
(97, '12CS51', 'Why 97', 1, 'CO-1', 'LO-1', 0),
(98, '12CS51', 'Why 98', 2, 'CO-1', 'LO-2', 0),
(99, '12CS51', 'Why 99', 1, 'CO-1', 'LO-3', 0),
(100, '12CS52', 'Why 100', 2, 'CO-1', 'LO-4', 0),
(101, '12CS52', 'Why 101', 1, 'CO-2', 'LO-1', 0),
(102, '12CS52', 'Why 102', 2, 'CO-2', 'LO-2', 0),
(103, '12CS52', 'Why 103', 1, 'CO-2', 'LO-3', 0),
(104, '12CS52', 'Why 104', 2, 'CO-2', 'LO-4', 0),
(105, '12CS52', 'Why 105', 1, 'CO-3', 'LO-1', 0),
(106, '12CS52', 'Why 106', 2, 'CO-3', 'LO-2', 0),
(107, '12CS52', 'Why 107', 1, 'CO-3', 'LO-3', 0),
(108, '12CS52', 'Why 108', 2, 'CO-3', 'LO-4', 0),
(109, '12CS52', 'Why 109', 1, 'CO-4', 'LO-1', 0),
(110, '12CS52', 'Why 110', 2, 'CO-4', 'LO-2', 0),
(111, '12CS52', 'Why 111', 1, 'CO-4', 'LO-3', 0),
(112, '12CS52', 'Why 112', 2, 'CO-4', 'LO-4', 0),
(113, '12CS52', 'Why 113', 1, 'CO-1', 'LO-1', 0),
(114, '12CS52', 'Why 114', 2, 'CO-1', 'LO-2', 0),
(115, '12CS52', 'Why 115', 1, 'CO-1', 'LO-3', 0),
(116, '12CS52', 'Why 116', 2, 'CO-1', 'LO-4', 0),
(117, '12CS52', 'Why 117', 1, 'CO-2', 'LO-1', 0),
(118, '12CS52', 'Why 118', 2, 'CO-2', 'LO-2', 0),
(119, '12CS52', 'Why 119', 1, 'CO-2', 'LO-3', 0),
(120, '12CS52', 'Why 120', 2, 'CO-2', 'LO-4', 0),
(121, '12CS52', 'Why 121', 1, 'CO-3', 'LO-1', 0),
(122, '12CS52', 'Why 122', 2, 'CO-3', 'LO-2', 0),
(123, '12CS52', 'Why 123', 1, 'CO-3', 'LO-3', 0),
(124, '12CS52', 'Why 124', 2, 'CO-3', 'LO-4', 0),
(125, '12CS52', 'Why 125', 1, 'CO-4', 'LO-1', 0),
(126, '12CS52', 'Why 126', 2, 'CO-4', 'LO-2', 0),
(127, '12CS52', 'Why 127', 1, 'CO-4', 'LO-3', 0),
(128, '12CS52', 'Why 128', 2, 'CO-4', 'LO-4', 0),
(129, '12CS52', 'Why 129', 1, 'CO-1', 'LO-1', 0),
(130, '12CS52', 'Why 130', 2, 'CO-1', 'LO-2', 0),
(131, '12CS52', 'Why 131', 1, 'CO-1', 'LO-3', 0),
(132, '12CS52', 'Why 132', 2, 'CO-1', 'LO-4', 0),
(133, '12CS52', 'Why 133', 1, 'CO-2', 'LO-1', 0),
(134, '12CS52', 'Why 134', 2, 'CO-2', 'LO-2', 0),
(135, '12CS52', 'Why 135', 1, 'CO-2', 'LO-3', 0),
(136, '12CS52', 'Why 136', 2, 'CO-2', 'LO-4', 0),
(137, '12CS52', 'Why 137', 1, 'CO-3', 'LO-1', 0),
(138, '12CS52', 'Why 138', 2, 'CO-3', 'LO-2', 0),
(139, '12CS52', 'Why 139', 1, 'CO-3', 'LO-3', 0),
(140, '12CS52', 'Why 140', 2, 'CO-3', 'LO-4', 0),
(141, '12CS52', 'Why 141', 1, 'CO-4', 'LO-1', 0),
(142, '12CS52', 'Why 142', 2, 'CO-4', 'LO-2', 0),
(143, '12CS52', 'Why 143', 1, 'CO-4', 'LO-3', 0),
(144, '12CS52', 'Why 144', 2, 'CO-4', 'LO-4', 0),
(145, '12CS52', 'Why 145', 1, 'CO-1', 'LO-1', 0),
(146, '12CS52', 'Why 146', 2, 'CO-1', 'LO-2', 0),
(147, '12CS52', 'Why 147', 1, 'CO-1', 'LO-3', 0),
(148, '12CS52', 'Why 148', 2, 'CO-1', 'LO-4', 0),
(149, '12CS52', 'Why 149', 1, 'CO-2', 'LO-1', 0),
(150, '12CS52', 'Why 150', 2, 'CO-2', 'LO-2', 0),
(151, '12CS52', 'Why 151', 1, 'CO-2', 'LO-3', 0),
(152, '12CS52', 'Why 152', 2, 'CO-2', 'LO-4', 0),
(153, '12CS52', 'Why 153', 1, 'CO-3', 'LO-1', 0),
(154, '12CS52', 'Why 154', 2, 'CO-3', 'LO-2', 0),
(155, '12CS52', 'Why 155', 1, 'CO-3', 'LO-3', 0),
(156, '12CS52', 'Why 156', 2, 'CO-3', 'LO-4', 0),
(157, '12CS52', 'Why 157', 1, 'CO-4', 'LO-1', 0),
(158, '12CS52', 'Why 158', 2, 'CO-4', 'LO-2', 0),
(159, '12CS52', 'Why 159', 1, 'CO-4', 'LO-3', 0),
(160, '12CS52', 'Why 160', 2, 'CO-4', 'LO-4', 0),
(161, '12CS52', 'Why 161', 1, 'CO-1', 'LO-1', 0),
(162, '12CS52', 'Why 162', 2, 'CO-1', 'LO-2', 0),
(163, '12CS52', 'Why 163', 1, 'CO-1', 'LO-3', 0),
(164, '12CS52', 'Why 164', 2, 'CO-1', 'LO-4', 0),
(165, '12CS52', 'Why 165', 1, 'CO-2', 'LO-1', 0),
(166, '12CS52', 'Why 166', 2, 'CO-2', 'LO-2', 0),
(167, '12CS52', 'Why 167', 1, 'CO-2', 'LO-3', 0),
(168, '12CS52', 'Why 168', 2, 'CO-2', 'LO-4', 0),
(169, '12CS52', 'Why 169', 1, 'CO-3', 'LO-1', 0),
(170, '12CS52', 'Why 170', 2, 'CO-3', 'LO-2', 0),
(171, '12CS52', 'Why 171', 1, 'CO-3', 'LO-3', 0),
(172, '12CS52', 'Why 172', 2, 'CO-3', 'LO-4', 0),
(173, '12CS52', 'Why 173', 1, 'CO-4', 'LO-1', 0),
(174, '12CS52', 'Why 174', 2, 'CO-4', 'LO-2', 0),
(175, '12CS52', 'Why 175', 1, 'CO-4', 'LO-3', 0),
(176, '12CS52', 'Why 176', 2, 'CO-4', 'LO-4', 0),
(177, '12CS52', 'Why 177', 1, 'CO-1', 'LO-1', 0),
(178, '12CS52', 'Why 178', 2, 'CO-1', 'LO-2', 0),
(179, '12CS52', 'Why 179', 1, 'CO-1', 'LO-3', 0),
(180, '12CS52', 'Why 180', 2, 'CO-1', 'LO-4', 0),
(181, '12CS52', 'Why 181', 1, 'CO-2', 'LO-1', 0),
(182, '12CS52', 'Why 182', 2, 'CO-2', 'LO-2', 0),
(183, '12CS52', 'Why 183', 1, 'CO-2', 'LO-3', 0),
(184, '12CS52', 'Why 184', 2, 'CO-2', 'LO-4', 0),
(185, '12CS52', 'Why 185', 1, 'CO-3', 'LO-1', 0),
(186, '12CS52', 'Why 186', 2, 'CO-3', 'LO-2', 0),
(187, '12CS52', 'Why 187', 1, 'CO-3', 'LO-3', 0),
(188, '12CS52', 'Why 188', 2, 'CO-3', 'LO-4', 0),
(189, '12CS52', 'Why 189', 1, 'CO-4', 'LO-1', 0),
(190, '12CS52', 'Why 190', 2, 'CO-4', 'LO-2', 0),
(191, '12CS52', 'Why 191', 1, 'CO-4', 'LO-3', 0),
(192, '12CS52', 'Why 192', 2, 'CO-4', 'LO-4', 0),
(193, '12CS52', 'Why 193', 1, 'CO-1', 'LO-1', 0),
(194, '12CS52', 'Why 194', 2, 'CO-1', 'LO-2', 0),
(195, '12CS52', 'Why 195', 1, 'CO-1', 'LO-3', 0),
(196, '12CS52', 'Why 196', 2, 'CO-1', 'LO-4', 0),
(197, '12CS52', 'Why 197', 1, 'CO-2', 'LO-1', 0),
(198, '12CS52', 'Why 198', 2, 'CO-2', 'LO-2', 0),
(199, '12CS52', 'Why 199', 1, 'CO-2', 'LO-3', 0),
(200, '12CS52', 'Why 200', 2, 'CO-2', 'LO-4', 0),
(201, '12CS53', 'Why 201', 1, 'CO-1', 'LO-1', 0),
(202, '12CS53', 'Why 202', 2, 'CO-1', 'LO-2', 0),
(203, '12CS53', 'Why 203', 1, 'CO-1', 'LO-3', 0),
(204, '12CS53', 'Why 204', 2, 'CO-1', 'LO-4', 0),
(205, '12CS53', 'Why 205', 1, 'CO-2', 'LO-1', 0),
(206, '12CS53', 'Why 206', 2, 'CO-2', 'LO-2', 0),
(207, '12CS53', 'Why 207', 1, 'CO-2', 'LO-3', 0),
(208, '12CS53', 'Why 208', 2, 'CO-2', 'LO-4', 0),
(209, '12CS53', 'Why 209', 1, 'CO-3', 'LO-1', 0),
(210, '12CS53', 'Why 210', 2, 'CO-3', 'LO-2', 0),
(211, '12CS53', 'Why 211', 1, 'CO-3', 'LO-3', 0),
(212, '12CS53', 'Why 212', 2, 'CO-3', 'LO-4', 0),
(213, '12CS53', 'Why 213', 1, 'CO-4', 'LO-1', 0),
(214, '12CS53', 'Why 214', 2, 'CO-4', 'LO-2', 0),
(215, '12CS53', 'Why 215', 1, 'CO-4', 'LO-3', 0),
(216, '12CS53', 'Why 216', 2, 'CO-4', 'LO-4', 0),
(217, '12CS53', 'Why 217', 1, 'CO-1', 'LO-1', 0),
(218, '12CS53', 'Why 218', 2, 'CO-1', 'LO-2', 0),
(219, '12CS53', 'Why 219', 1, 'CO-1', 'LO-3', 0),
(220, '12CS53', 'Why 220', 2, 'CO-1', 'LO-4', 0),
(221, '12CS53', 'Why 221', 1, 'CO-2', 'LO-1', 0),
(222, '12CS53', 'Why 222', 2, 'CO-2', 'LO-2', 0),
(223, '12CS53', 'Why 223', 1, 'CO-2', 'LO-3', 0),
(224, '12CS53', 'Why 224', 2, 'CO-2', 'LO-4', 0),
(225, '12CS53', 'Why 225', 1, 'CO-3', 'LO-1', 0),
(226, '12CS53', 'Why 226', 2, 'CO-3', 'LO-2', 0),
(227, '12CS53', 'Why 227', 1, 'CO-3', 'LO-3', 0),
(228, '12CS53', 'Why 228', 2, 'CO-3', 'LO-4', 0),
(229, '12CS53', 'Why 229', 1, 'CO-4', 'LO-1', 0),
(230, '12CS53', 'Why 230', 2, 'CO-4', 'LO-2', 0),
(231, '12CS53', 'Why 231', 1, 'CO-4', 'LO-3', 0),
(232, '12CS53', 'Why 232', 2, 'CO-4', 'LO-4', 0),
(233, '12CS53', 'Why 233', 1, 'CO-1', 'LO-1', 0),
(234, '12CS53', 'Why 234', 2, 'CO-1', 'LO-2', 0),
(235, '12CS53', 'Why 235', 1, 'CO-1', 'LO-3', 0),
(236, '12CS53', 'Why 236', 2, 'CO-1', 'LO-4', 0),
(237, '12CS53', 'Why 237', 1, 'CO-2', 'LO-1', 0),
(238, '12CS53', 'Why 238', 2, 'CO-2', 'LO-2', 0),
(239, '12CS53', 'Why 239', 1, 'CO-2', 'LO-3', 0),
(240, '12CS53', 'Why 240', 2, 'CO-2', 'LO-4', 0),
(241, '12CS53', 'Why 241', 1, 'CO-3', 'LO-1', 0),
(242, '12CS53', 'Why 242', 2, 'CO-3', 'LO-2', 0),
(243, '12CS53', 'Why 243', 1, 'CO-3', 'LO-3', 0),
(244, '12CS53', 'Why 244', 2, 'CO-3', 'LO-4', 0),
(245, '12CS53', 'Why 245', 1, 'CO-4', 'LO-1', 0),
(246, '12CS53', 'Why 246', 2, 'CO-4', 'LO-2', 0),
(247, '12CS53', 'Why 247', 1, 'CO-4', 'LO-3', 0),
(248, '12CS53', 'Why 248', 2, 'CO-4', 'LO-4', 0),
(249, '12CS53', 'Why 249', 1, 'CO-1', 'LO-1', 0),
(250, '12CS53', 'Why 250', 2, 'CO-1', 'LO-2', 0),
(251, '12CS53', 'Why 251', 1, 'CO-1', 'LO-3', 0),
(252, '12CS53', 'Why 252', 2, 'CO-1', 'LO-4', 0),
(253, '12CS53', 'Why 253', 1, 'CO-2', 'LO-1', 0),
(254, '12CS53', 'Why 254', 2, 'CO-2', 'LO-2', 0),
(255, '12CS53', 'Why 255', 1, 'CO-2', 'LO-3', 0),
(256, '12CS53', 'Why 256', 2, 'CO-2', 'LO-4', 0),
(257, '12CS53', 'Why 257', 1, 'CO-3', 'LO-1', 0),
(258, '12CS53', 'Why 258', 2, 'CO-3', 'LO-2', 0),
(259, '12CS53', 'Why 259', 1, 'CO-3', 'LO-3', 0),
(260, '12CS53', 'Why 260', 2, 'CO-3', 'LO-4', 0),
(261, '12CS53', 'Why 261', 1, 'CO-4', 'LO-1', 0),
(262, '12CS53', 'Why 262', 2, 'CO-4', 'LO-2', 0),
(263, '12CS53', 'Why 263', 1, 'CO-4', 'LO-3', 0),
(264, '12CS53', 'Why 264', 2, 'CO-4', 'LO-4', 0),
(265, '12CS53', 'Why 265', 1, 'CO-1', 'LO-1', 0),
(266, '12CS53', 'Why 266', 2, 'CO-1', 'LO-2', 0),
(267, '12CS53', 'Why 267', 1, 'CO-1', 'LO-3', 0),
(268, '12CS53', 'Why 268', 2, 'CO-1', 'LO-4', 0),
(269, '12CS53', 'Why 269', 1, 'CO-2', 'LO-1', 0),
(270, '12CS53', 'Why 270', 2, 'CO-2', 'LO-2', 0),
(271, '12CS53', 'Why 271', 1, 'CO-2', 'LO-3', 0),
(272, '12CS53', 'Why 272', 2, 'CO-2', 'LO-4', 0),
(273, '12CS53', 'Why 273', 1, 'CO-3', 'LO-1', 0),
(274, '12CS53', 'Why 274', 2, 'CO-3', 'LO-2', 0),
(275, '12CS53', 'Why 275', 1, 'CO-3', 'LO-3', 0),
(276, '12CS53', 'Why 276', 2, 'CO-3', 'LO-4', 0),
(277, '12CS53', 'Why 277', 1, 'CO-4', 'LO-1', 0),
(278, '12CS53', 'Why 278', 2, 'CO-4', 'LO-2', 0),
(279, '12CS53', 'Why 279', 1, 'CO-4', 'LO-3', 0),
(280, '12CS53', 'Why 280', 2, 'CO-4', 'LO-4', 0),
(281, '12CS53', 'Why 281', 1, 'CO-1', 'LO-1', 0),
(282, '12CS53', 'Why 282', 2, 'CO-1', 'LO-2', 0),
(283, '12CS53', 'Why 283', 1, 'CO-1', 'LO-3', 0),
(284, '12CS53', 'Why 284', 2, 'CO-1', 'LO-4', 0),
(285, '12CS53', 'Why 285', 1, 'CO-2', 'LO-1', 0),
(286, '12CS53', 'Why 286', 2, 'CO-2', 'LO-2', 0),
(287, '12CS53', 'Why 287', 1, 'CO-2', 'LO-3', 0),
(288, '12CS53', 'Why 288', 2, 'CO-2', 'LO-4', 0),
(289, '12CS53', 'Why 289', 1, 'CO-3', 'LO-1', 0),
(290, '12CS53', 'Why 290', 2, 'CO-3', 'LO-2', 0),
(291, '12CS53', 'Why 291', 1, 'CO-3', 'LO-3', 0),
(292, '12CS53', 'Why 292', 2, 'CO-3', 'LO-4', 0),
(293, '12CS53', 'Why 293', 1, 'CO-4', 'LO-1', 0),
(294, '12CS53', 'Why 294', 2, 'CO-4', 'LO-2', 0),
(295, '12CS53', 'Why 295', 1, 'CO-4', 'LO-3', 0),
(296, '12CS53', 'Why 296', 2, 'CO-4', 'LO-4', 0),
(297, '12CS53', 'Why 297', 1, 'CO-1', 'LO-1', 0),
(298, '12CS53', 'Why 298', 2, 'CO-1', 'LO-2', 0),
(299, '12CS53', 'Why 299', 1, 'CO-1', 'LO-3', 0),
(300, '12CS53', 'Why 300', 2, 'CO-1', 'LO-4', 0),
(301, '12CS54', 'Why 301', 1, 'CO-2', 'LO-1', 0),
(302, '12CS54', 'Why 302', 2, 'CO-2', 'LO-2', 0),
(303, '12CS54', 'Why 303', 1, 'CO-2', 'LO-3', 0),
(304, '12CS54', 'Why 304', 2, 'CO-2', 'LO-4', 0),
(305, '12CS54', 'Why 305', 1, 'CO-3', 'LO-1', 0),
(306, '12CS54', 'Why 306', 2, 'CO-3', 'LO-2', 0),
(307, '12CS54', 'Why 307', 1, 'CO-3', 'LO-3', 0),
(308, '12CS54', 'Why 308', 2, 'CO-3', 'LO-4', 0),
(309, '12CS54', 'Why 309', 1, 'CO-4', 'LO-1', 0),
(310, '12CS54', 'Why 310', 2, 'CO-4', 'LO-2', 0),
(311, '12CS54', 'Why 311', 1, 'CO-4', 'LO-3', 0),
(312, '12CS54', 'Why 312', 2, 'CO-4', 'LO-4', 0),
(313, '12CS54', 'Why 313', 1, 'CO-1', 'LO-1', 0),
(314, '12CS54', 'Why 314', 2, 'CO-1', 'LO-2', 0),
(315, '12CS54', 'Why 315', 1, 'CO-1', 'LO-3', 0),
(316, '12CS54', 'Why 316', 2, 'CO-1', 'LO-4', 0),
(317, '12CS54', 'Why 317', 1, 'CO-2', 'LO-1', 0),
(318, '12CS54', 'Why 318', 2, 'CO-2', 'LO-2', 0),
(319, '12CS54', 'Why 319', 1, 'CO-2', 'LO-3', 0),
(320, '12CS54', 'Why 320', 2, 'CO-2', 'LO-4', 0),
(321, '12CS54', 'Why 321', 1, 'CO-3', 'LO-1', 0),
(322, '12CS54', 'Why 322', 2, 'CO-3', 'LO-2', 0),
(323, '12CS54', 'Why 323', 1, 'CO-3', 'LO-3', 0),
(324, '12CS54', 'Why 324', 2, 'CO-3', 'LO-4', 0),
(325, '12CS54', 'Why 325', 1, 'CO-4', 'LO-1', 0),
(326, '12CS54', 'Why 326', 2, 'CO-4', 'LO-2', 0),
(327, '12CS54', 'Why 327', 1, 'CO-4', 'LO-3', 0),
(328, '12CS54', 'Why 328', 2, 'CO-4', 'LO-4', 0),
(329, '12CS54', 'Why 329', 1, 'CO-1', 'LO-1', 0),
(330, '12CS54', 'Why 330', 2, 'CO-1', 'LO-2', 0),
(331, '12CS54', 'Why 331', 1, 'CO-1', 'LO-3', 0),
(332, '12CS54', 'Why 332', 2, 'CO-1', 'LO-4', 0),
(333, '12CS54', 'Why 333', 1, 'CO-2', 'LO-1', 0),
(334, '12CS54', 'Why 334', 2, 'CO-2', 'LO-2', 0),
(335, '12CS54', 'Why 335', 1, 'CO-2', 'LO-3', 0),
(336, '12CS54', 'Why 336', 2, 'CO-2', 'LO-4', 0),
(337, '12CS54', 'Why 337', 1, 'CO-3', 'LO-1', 0),
(338, '12CS54', 'Why 338', 2, 'CO-3', 'LO-2', 0),
(339, '12CS54', 'Why 339', 1, 'CO-3', 'LO-3', 0),
(340, '12CS54', 'Why 340', 2, 'CO-3', 'LO-4', 0),
(341, '12CS54', 'Why 341', 1, 'CO-4', 'LO-1', 0),
(342, '12CS54', 'Why 342', 2, 'CO-4', 'LO-2', 0),
(343, '12CS54', 'Why 343', 1, 'CO-4', 'LO-3', 0),
(344, '12CS54', 'Why 344', 2, 'CO-4', 'LO-4', 0),
(345, '12CS54', 'Why 345', 1, 'CO-1', 'LO-1', 0),
(346, '12CS54', 'Why 346', 2, 'CO-1', 'LO-2', 0),
(347, '12CS54', 'Why 347', 1, 'CO-1', 'LO-3', 0),
(348, '12CS54', 'Why 348', 2, 'CO-1', 'LO-4', 0),
(349, '12CS54', 'Why 349', 1, 'CO-2', 'LO-1', 0),
(350, '12CS54', 'Why 350', 2, 'CO-2', 'LO-2', 0),
(351, '12CS54', 'Why 351', 1, 'CO-2', 'LO-3', 0),
(352, '12CS54', 'Why 352', 2, 'CO-2', 'LO-4', 0),
(353, '12CS54', 'Why 353', 1, 'CO-3', 'LO-1', 0),
(354, '12CS54', 'Why 354', 2, 'CO-3', 'LO-2', 0),
(355, '12CS54', 'Why 355', 1, 'CO-3', 'LO-3', 0),
(356, '12CS54', 'Why 356', 2, 'CO-3', 'LO-4', 0),
(357, '12CS54', 'Why 357', 1, 'CO-4', 'LO-1', 0),
(358, '12CS54', 'Why 358', 2, 'CO-4', 'LO-2', 0),
(359, '12CS54', 'Why 359', 1, 'CO-4', 'LO-3', 0),
(360, '12CS54', 'Why 360', 2, 'CO-4', 'LO-4', 0),
(361, '12CS54', 'Why 361', 1, 'CO-1', 'LO-1', 0),
(362, '12CS54', 'Why 362', 2, 'CO-1', 'LO-2', 0),
(363, '12CS54', 'Why 363', 1, 'CO-1', 'LO-3', 0),
(364, '12CS54', 'Why 364', 2, 'CO-1', 'LO-4', 0),
(365, '12CS54', 'Why 365', 1, 'CO-2', 'LO-1', 0),
(366, '12CS54', 'Why 366', 2, 'CO-2', 'LO-2', 0),
(367, '12CS54', 'Why 367', 1, 'CO-2', 'LO-3', 0),
(368, '12CS54', 'Why 368', 2, 'CO-2', 'LO-4', 0),
(369, '12CS54', 'Why 369', 1, 'CO-3', 'LO-1', 0),
(370, '12CS54', 'Why 370', 2, 'CO-3', 'LO-2', 0),
(371, '12CS54', 'Why 371', 1, 'CO-3', 'LO-3', 0),
(372, '12CS54', 'Why 372', 2, 'CO-3', 'LO-4', 0),
(373, '12CS54', 'Why 373', 1, 'CO-4', 'LO-1', 0),
(374, '12CS54', 'Why 374', 2, 'CO-4', 'LO-2', 0),
(375, '12CS54', 'Why 375', 1, 'CO-4', 'LO-3', 0),
(376, '12CS54', 'Why 376', 2, 'CO-4', 'LO-4', 0),
(377, '12CS54', 'Why 377', 1, 'CO-1', 'LO-1', 0),
(378, '12CS54', 'Why 378', 2, 'CO-1', 'LO-2', 0),
(379, '12CS54', 'Why 379', 1, 'CO-1', 'LO-3', 0),
(380, '12CS54', 'Why 380', 2, 'CO-1', 'LO-4', 0),
(381, '12CS54', 'Why 381', 1, 'CO-2', 'LO-1', 0),
(382, '12CS54', 'Why 382', 2, 'CO-2', 'LO-2', 0),
(383, '12CS54', 'Why 383', 1, 'CO-2', 'LO-3', 0),
(384, '12CS54', 'Why 384', 2, 'CO-2', 'LO-4', 0),
(385, '12CS54', 'Why 385', 1, 'CO-3', 'LO-1', 0),
(386, '12CS54', 'Why 386', 2, 'CO-3', 'LO-2', 0),
(387, '12CS54', 'Why 387', 1, 'CO-3', 'LO-3', 0),
(388, '12CS54', 'Why 388', 2, 'CO-3', 'LO-4', 0),
(389, '12CS54', 'Why 389', 1, 'CO-4', 'LO-1', 0),
(390, '12CS54', 'Why 390', 2, 'CO-4', 'LO-2', 0),
(391, '12CS54', 'Why 391', 1, 'CO-4', 'LO-3', 0),
(392, '12CS54', 'Why 392', 2, 'CO-4', 'LO-4', 0),
(393, '12CS54', 'Why 393', 1, 'CO-1', 'LO-1', 0),
(394, '12CS54', 'Why 394', 2, 'CO-1', 'LO-2', 0),
(395, '12CS54', 'Why 395', 1, 'CO-1', 'LO-3', 0),
(396, '12CS54', 'Why 396', 2, 'CO-1', 'LO-4', 0),
(397, '12CS54', 'Why 397', 1, 'CO-2', 'LO-1', 0),
(398, '12CS54', 'Why 398', 2, 'CO-2', 'LO-2', 0),
(399, '12CS54', 'Why 399', 1, 'CO-2', 'LO-3', 0),
(400, '12CS54', 'Why 400', 2, 'CO-2', 'LO-4', 0),
(401, '12CS55', 'Why 401', 1, 'CO-1', 'LO-1', 0),
(402, '12CS55', 'Why 402', 2, 'CO-1', 'LO-2', 0),
(403, '12CS55', 'Why 403', 1, 'CO-1', 'LO-3', 0),
(404, '12CS55', 'Why 404', 2, 'CO-1', 'LO-4', 0),
(405, '12CS55', 'Why 405', 1, 'CO-2', 'LO-1', 0),
(406, '12CS55', 'Why 406', 2, 'CO-2', 'LO-2', 0),
(407, '12CS55', 'Why 407', 1, 'CO-2', 'LO-3', 0),
(408, '12CS55', 'Why 408', 2, 'CO-2', 'LO-4', 0),
(409, '12CS55', 'Why 409', 1, 'CO-3', 'LO-1', 0),
(410, '12CS55', 'Why 410', 2, 'CO-3', 'LO-2', 0),
(411, '12CS55', 'Why 411', 1, 'CO-3', 'LO-3', 0),
(412, '12CS55', 'Why 412', 2, 'CO-3', 'LO-4', 0),
(413, '12CS55', 'Why 413', 1, 'CO-4', 'LO-1', 0),
(414, '12CS55', 'Why 414', 2, 'CO-4', 'LO-2', 0),
(415, '12CS55', 'Why 415', 1, 'CO-4', 'LO-3', 0),
(416, '12CS55', 'Why 416', 2, 'CO-4', 'LO-4', 0),
(417, '12CS55', 'Why 417', 1, 'CO-1', 'LO-1', 0),
(418, '12CS55', 'Why 418', 2, 'CO-1', 'LO-2', 0),
(419, '12CS55', 'Why 419', 1, 'CO-1', 'LO-3', 0),
(420, '12CS55', 'Why 420', 2, 'CO-1', 'LO-4', 0),
(421, '12CS55', 'Why 421', 1, 'CO-2', 'LO-1', 0),
(422, '12CS55', 'Why 422', 2, 'CO-2', 'LO-2', 0),
(423, '12CS55', 'Why 423', 1, 'CO-2', 'LO-3', 0),
(424, '12CS55', 'Why 424', 2, 'CO-2', 'LO-4', 0),
(425, '12CS55', 'Why 425', 1, 'CO-3', 'LO-1', 0),
(426, '12CS55', 'Why 426', 2, 'CO-3', 'LO-2', 0),
(427, '12CS55', 'Why 427', 1, 'CO-3', 'LO-3', 0),
(428, '12CS55', 'Why 428', 2, 'CO-3', 'LO-4', 0),
(429, '12CS55', 'Why 429', 1, 'CO-4', 'LO-1', 0),
(430, '12CS55', 'Why 430', 2, 'CO-4', 'LO-2', 0),
(431, '12CS55', 'Why 431', 1, 'CO-4', 'LO-3', 0),
(432, '12CS55', 'Why 432', 2, 'CO-4', 'LO-4', 0),
(433, '12CS55', 'Why 433', 1, 'CO-1', 'LO-1', 0),
(434, '12CS55', 'Why 434', 2, 'CO-1', 'LO-2', 0),
(435, '12CS55', 'Why 435', 1, 'CO-1', 'LO-3', 0),
(436, '12CS55', 'Why 436', 2, 'CO-1', 'LO-4', 0),
(437, '12CS55', 'Why 437', 1, 'CO-2', 'LO-1', 0),
(438, '12CS55', 'Why 438', 2, 'CO-2', 'LO-2', 0),
(439, '12CS55', 'Why 439', 1, 'CO-2', 'LO-3', 0),
(440, '12CS55', 'Why 440', 2, 'CO-2', 'LO-4', 0),
(441, '12CS55', 'Why 441', 1, 'CO-3', 'LO-1', 0),
(442, '12CS55', 'Why 442', 2, 'CO-3', 'LO-2', 0),
(443, '12CS55', 'Why 443', 1, 'CO-3', 'LO-3', 0),
(444, '12CS55', 'Why 444', 2, 'CO-3', 'LO-4', 0),
(445, '12CS55', 'Why 445', 1, 'CO-4', 'LO-1', 0),
(446, '12CS55', 'Why 446', 2, 'CO-4', 'LO-2', 0),
(447, '12CS55', 'Why 447', 1, 'CO-4', 'LO-3', 0),
(448, '12CS55', 'Why 448', 2, 'CO-4', 'LO-4', 0),
(449, '12CS55', 'Why 449', 1, 'CO-1', 'LO-1', 0),
(450, '12CS55', 'Why 450', 2, 'CO-1', 'LO-2', 0),
(451, '12CS55', 'Why 451', 1, 'CO-1', 'LO-3', 0),
(452, '12CS55', 'Why 452', 2, 'CO-1', 'LO-4', 0),
(453, '12CS55', 'Why 453', 1, 'CO-2', 'LO-1', 0),
(454, '12CS55', 'Why 454', 2, 'CO-2', 'LO-2', 0),
(455, '12CS55', 'Why 455', 1, 'CO-2', 'LO-3', 0),
(456, '12CS55', 'Why 456', 2, 'CO-2', 'LO-4', 0),
(457, '12CS55', 'Why 457', 1, 'CO-3', 'LO-1', 0),
(458, '12CS55', 'Why 458', 2, 'CO-3', 'LO-2', 0),
(459, '12CS55', 'Why 459', 1, 'CO-3', 'LO-3', 0),
(460, '12CS55', 'Why 460', 2, 'CO-3', 'LO-4', 0),
(461, '12CS55', 'Why 461', 1, 'CO-4', 'LO-1', 0),
(462, '12CS55', 'Why 462', 2, 'CO-4', 'LO-2', 0),
(463, '12CS55', 'Why 463', 1, 'CO-4', 'LO-3', 0),
(464, '12CS55', 'Why 464', 2, 'CO-4', 'LO-4', 0),
(465, '12CS55', 'Why 465', 1, 'CO-1', 'LO-1', 0),
(466, '12CS55', 'Why 466', 2, 'CO-1', 'LO-2', 0),
(467, '12CS55', 'Why 467', 1, 'CO-1', 'LO-3', 0),
(468, '12CS55', 'Why 468', 2, 'CO-1', 'LO-4', 0),
(469, '12CS55', 'Why 469', 1, 'CO-2', 'LO-1', 0),
(470, '12CS55', 'Why 470', 2, 'CO-2', 'LO-2', 0),
(471, '12CS55', 'Why 471', 1, 'CO-2', 'LO-3', 0),
(472, '12CS55', 'Why 472', 2, 'CO-2', 'LO-4', 0),
(473, '12CS55', 'Why 473', 1, 'CO-3', 'LO-1', 0),
(474, '12CS55', 'Why 474', 2, 'CO-3', 'LO-2', 0),
(475, '12CS55', 'Why 475', 1, 'CO-3', 'LO-3', 0),
(476, '12CS55', 'Why 476', 2, 'CO-3', 'LO-4', 0),
(477, '12CS55', 'Why 477', 1, 'CO-4', 'LO-1', 0),
(478, '12CS55', 'Why 478', 2, 'CO-4', 'LO-2', 0),
(479, '12CS55', 'Why 479', 1, 'CO-4', 'LO-3', 0),
(480, '12CS55', 'Why 480', 2, 'CO-4', 'LO-4', 0),
(481, '12CS55', 'Why 481', 1, 'CO-1', 'LO-1', 0),
(482, '12CS55', 'Why 482', 2, 'CO-1', 'LO-2', 0),
(483, '12CS55', 'Why 483', 1, 'CO-1', 'LO-3', 0),
(484, '12CS55', 'Why 484', 2, 'CO-1', 'LO-4', 0),
(485, '12CS55', 'Why 485', 1, 'CO-2', 'LO-1', 0),
(486, '12CS55', 'Why 486', 2, 'CO-2', 'LO-2', 0),
(487, '12CS55', 'Why 487', 1, 'CO-2', 'LO-3', 0),
(488, '12CS55', 'Why 488', 2, 'CO-2', 'LO-4', 0),
(489, '12CS55', 'Why 489', 1, 'CO-3', 'LO-1', 0),
(490, '12CS55', 'Why 490', 2, 'CO-3', 'LO-2', 0),
(491, '12CS55', 'Why 491', 1, 'CO-3', 'LO-3', 0),
(492, '12CS55', 'Why 492', 2, 'CO-3', 'LO-4', 0),
(493, '12CS55', 'Why 493', 1, 'CO-4', 'LO-1', 0),
(494, '12CS55', 'Why 494', 2, 'CO-4', 'LO-2', 0),
(495, '12CS55', 'Why 495', 1, 'CO-4', 'LO-3', 0),
(496, '12CS55', 'Why 496', 2, 'CO-4', 'LO-4', 0),
(497, '12CS55', 'Why 497', 1, 'CO-1', 'LO-1', 0),
(498, '12CS55', 'Why 498', 2, 'CO-1', 'LO-2', 0),
(499, '12CS55', 'Why 499', 1, 'CO-1', 'LO-3', 0),
(500, '12CS55', 'Why 500', 2, 'CO-1', 'LO-4', 0);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

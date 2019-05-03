-- phpMyAdmin SQL Dump
-- version 4.8.3
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: May 03, 2019 at 10:31 PM
-- Server version: 5.7.23
-- PHP Version: 7.1.22

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `cultural-buildings-management`
--

-- --------------------------------------------------------

--
-- Table structure for table `buildings`
--

DROP TABLE IF EXISTS `buildings`;
CREATE TABLE IF NOT EXISTS `buildings` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(100) NOT NULL,
  `location` varchar(255) NOT NULL,
  `description` varchar(30000) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=137 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `buildings`
--

INSERT INTO `buildings` (`id`, `name`, `location`, `description`) VALUES
(69, 'Capital Fort', 'Plovdiv, Bulgaria', 'What is Lorem Ipsum?\r\nLorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.\r\n\r\nWhy do we use it?\r\nIt is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout. The point of using Lorem Ipsum is that it has a more-or-less normal distribution of letters, as opposed to using \'Content here, content here\', making it look like readable English. Many desktop publishing packages and web page editors now use Lorem Ipsum as their default model text, and a search for \'lorem ipsum\' will uncover many web sites still in their infancy. Various versions have evolved over the years, sometimes by accident, sometimes on purpose (injected humour and the like).\r\n\r\n\r\nWhere does it come from?\r\nContrary to popular belief, Lorem Ipsum is not simply random text. It has roots in a piece of classical Latin literature from 45 BC, making it over 2000 years old. Richard McClintock, a Latin professor at Hampden-Sydney College in Virginia, looked up one of the more obscure Latin words, consectetur, from a Lorem Ipsum passage, and going through the cites of the word in classical literature, discovered the undoubtable source. Lorem Ipsum comes from sections 1.10.32 and 1.10.33 of \"de Finibus Bonorum et Malorum\" (The Extremes of Good and Evil) by Cicero, written in 45 BC. This book is a treatise on the theory of ethics, very popular during the Renaissance. The first line of Lorem Ipsum, \"Lorem ipsum dolor sit amet..\", comes from a line in section 1.10.32.\r\n\r\nThe standard chunk of Lorem Ipsum used since the 1500s is reproduced below for those interested. Sections 1.10.32 and 1.10.33 from \"de Finibus Bonorum et Malorum\" by Cicero are also reproduced in their exact original form, accompanied by English versions from the 1914 translation by H. Rackham.'),
(70, 'pesho', 'pesho', 'pesho'),
(71, 'Horo toro', 'Horo toro', 'Horo toro'),
(72, 'fsdf', 'sdf', 'sdf'),
(73, 'fsdf', 'sdf', 'sdf'),
(74, 'fsdf', 'sdf', 'sdf'),
(75, 'fsdf', 'sdf', 'sdf'),
(76, 'fsdf', 'sdf', 'sdf'),
(77, 'fsdf', 'sdf', 'sdf'),
(78, 'fsdf', 'sdf', 'sdf'),
(79, '', '', ''),
(80, '', '', ''),
(81, '', '', ''),
(82, '', '', ''),
(83, '', '', ''),
(84, '', '', ''),
(85, '', '', ''),
(86, '', '', ''),
(87, '', '', ''),
(88, '', '', ''),
(89, '', '', ''),
(90, '', '', ''),
(91, '', '', ''),
(92, '', '', ''),
(93, '', '', ''),
(94, '', '', ''),
(95, '', '', ''),
(96, '', '', ''),
(97, '', '', 'fdg'),
(98, '', '', 'fdg'),
(99, '', '', ''),
(100, 'asd', '', ''),
(101, '', '', ''),
(102, '', '', ''),
(103, '', '', ''),
(104, '', '', ''),
(105, '', '', ''),
(106, '', '', ''),
(107, '', '', ''),
(108, '', '', ''),
(109, '', '', ''),
(110, '', '', ''),
(111, '', '', ''),
(112, '', '', ''),
(113, '', '', ''),
(114, '', '', ''),
(115, '', '', ''),
(116, '', '', ''),
(117, 'ttt', 'ttt', 'ttt'),
(118, 'ttt', 'ttt', 'ttt'),
(119, '', '', ''),
(120, '', '', ''),
(121, '', '', ''),
(122, '', '', ''),
(123, '', '', ''),
(124, '', '', ''),
(125, 'asd', 'asd', 'asd'),
(126, 'f', 'f', 'f'),
(127, 'es', 'es', 'es'),
(128, 'es', 'es', 'es'),
(129, 'es', 'es', 'es'),
(130, 'asd', 'Plovdiv, Bulgaria', 'asd'),
(131, 'ffffffffff', '45.9389,8.46186', 'ffffffffffffffff'),
(132, 'PostgreSQL 11', '42.7081,23.3015', 'PostgreSQL 11'),
(133, 'koco', '48.9406,38.718', 'sdf'),
(134, 'eber', '41.5768,24.701', 'erbe'),
(135, 'sd', '42.9844,10.5891', 'sdf'),
(136, 'sd', '19.2572,72.8575', 'sd');

-- --------------------------------------------------------

--
-- Table structure for table `images`
--

DROP TABLE IF EXISTS `images`;
CREATE TABLE IF NOT EXISTS `images` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `path` varchar(100) NOT NULL,
  `buildingId` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `buildingId` (`buildingId`)
) ENGINE=MyISAM AUTO_INCREMENT=80 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `images`
--

INSERT INTO `images` (`id`, `path`, `buildingId`) VALUES
(1, '../../images/45B1BD7E-1550-4F18-B51A-964538765D07.png', 65),
(2, '../../images/537CD36B-93E3-4B1A-82EB-358BCBBEA73A.png', 65),
(3, '../../images/F8B6E418-5F5F-4BCC-9253-19983578C66C.png', 66),
(4, '../../images/CB65BCAA-3279-4F46-AA6A-7FDED40EAAD4.png', 67),
(5, '../../images/1B5A4CAE-CD47-4B1E-BB7D-7AF0718707C0.png', 68),
(6, '../../images/C5B78622-B60F-4179-91BD-7B4A3CB9D717.png', 68),
(7, '../../images/A1192651-83B0-4626-A3B7-EED222ECB13C.png', 69),
(8, '../../images/C978018B-3972-4B3E-9B78-C80248D93830.png', 69),
(9, '../../images/0CEA6C5C-828E-4549-B31F-2CE4971088EF.jpg', 70),
(10, '../../images/89E5EC2F-A679-4BEB-8F59-5EFFD8598D68.jpeg', 71),
(11, '../../images/1C8102AE-0B54-4A06-B35E-B54783242B56.jpg', 72),
(12, '../../images/FFB2AF0D-808F-4BA0-B149-3B39FAD171B0.jpg', 73),
(13, '../../images/978E89A1-D3F0-411D-A72D-3321EF02B1CC.jpg', 74),
(14, '../../images/56454CA6-011B-4735-BA72-57B3C4662D98.jpg', 75),
(15, '../../images/F0186389-9B12-45DC-9890-A6872C16B8FC.jpg', 76),
(16, '../../images/49F4F5C0-0ACF-4782-BEFC-9ADE4B9A5216.jpg', 77),
(17, '../../images/405AEAD2-9CC3-4A46-991E-7961438B8EA6.jpg', 78),
(18, '../../images/270AF81F-3E79-4E20-A692-FF12648D3755.', 79),
(19, '../../images/6360F7F9-7AF5-4532-820D-BA2D9594CA75.', 80),
(20, '../../images/0496ED51-AFDE-414F-963B-2BAF9E517975.', 81),
(21, '../../images/0B3F45E8-B94E-4603-B90C-681F3030B35E.', 82),
(22, '../../images/EF1059EF-7AF6-43F3-8795-5CE6D032F639.', 83),
(23, '../../images/A7752E43-4B20-4BCE-8D61-9EFD055869FF.', 84),
(24, '../../images/F075D2AD-ECB6-44C4-ADD5-E08E1D6D4F9A.', 85),
(25, '../../images/CD23026B-7C64-4FD1-BDA8-E6574FBD8120.', 86),
(26, '../../images/74B1D287-4EFF-44CE-AB65-56A2650A7602.', 87),
(27, '../../images/AE21F388-BAAA-41E2-82AA-CEF9BDB1178D.', 88),
(28, '../../images/313971DD-0187-4520-88B5-98D1165078A9.', 89),
(29, '../../images/26D1C3D0-CE4B-4117-B673-9979CF331622.', 90),
(30, '../../images/6E5514B1-EFE0-43E0-BB9E-356ACD53DC31.', 91),
(31, '../../images/276404C4-755A-4FC1-947E-101D7A058061.', 92),
(32, '../../images/C88C6E4A-A6CA-46A5-8744-4CE984556712.', 93),
(33, '../../images/11504C0E-8563-461A-ACFC-C2BEB2EBA004.', 94),
(34, '../../images/B2023B37-FFD5-44DF-B4D6-7F809F7EB325.', 95),
(35, '../../images/02896149-355F-4363-8D53-485710EF895D.', 96),
(36, '../../images/2E130970-C6E3-4064-887C-5F4E07B671DB.', 97),
(37, '../../images/58BD86BE-2BDC-449B-BA47-A7990E0F43E5.', 98),
(38, '../../images/38B30878-EF23-46E7-B5BA-EC09B43BBA4B.', 99),
(39, '../../images/215CA84C-1868-4516-8AEC-F0092C6C9C55.', 100),
(40, '../../images/CF1F7C14-EA4D-44E3-A588-41868C914F50.', 101),
(41, '../../images/2D8DCA55-5B0D-4545-AD46-07517B26FE52.', 102),
(42, '../../images/5317157C-B6C1-49FD-9C3E-6EABAFD1087B.', 103),
(43, '../../images/617C613B-511F-45FA-A078-AD7ED697A841.', 104),
(44, '../../images/A6B58F0D-EB4F-402A-80BA-8DC6494E8CF5.', 105),
(45, '../../images/F99A3B86-8E5A-4829-BC29-CD42B968C8F3.', 106),
(46, '../../images/7A4CCFF4-99B5-4C1B-974B-9C13AC37E6F5.', 107),
(47, '../../images/C2ABEB62-616A-4B81-B4F2-7E8BD0DD26E5.', 108),
(48, '../../images/67F775A0-7260-4D3F-A6EA-4303B85A6467.', 109),
(49, '../../images/CCA2FF2E-3700-4B61-88CA-D86E8F4A082B.', 110),
(50, '../../images/12EFB0C3-B429-422E-AC24-6FF51F0EF6D3.', 111),
(51, '../../images/6820E5A5-36E0-4FA4-A635-5004F2947E0B.', 112),
(52, '../../images/5FC457AB-F970-467D-94F8-10FC6C525BC0.png', 113),
(53, '../../images/80C723EC-150E-4E1D-852B-D30794F170F1.png', 114),
(54, '../../images/8FDE7D38-FAD0-4B09-890E-A5282F364ADB.', 115),
(55, '../../images/ED308360-4612-4C04-91F0-3114046D8D07.', 116),
(56, '../../images/132FEE11-E5D1-4309-B94E-EB53AD5F1DB6.', 117),
(57, '../../images/A2225F64-E5C4-4E31-8502-07292C9AF9BC.', 118),
(58, '../../images/FEC4F741-173F-43FB-A5DB-48E7028AF51C.exe', 119),
(59, '../../images/D9DB99A8-C2F1-4A05-86CF-ACC7E4A7997A.jpg', 120),
(60, '../../images/BE209C36-6F66-43D3-97D5-29223787C4D0.jpg', 121),
(61, '../../images/B5E41D8A-A4A0-468C-876C-3FACBE247550.htm', 122),
(62, '../../images/BCE05524-278C-42C3-9DF8-CE30AF086C45.pdf', 122),
(63, '../../images/D8F467C9-57D5-4DD8-B8B0-61C05442D7ED.', 123),
(64, '../../images/4C1E50F6-BCB1-488F-BCEE-1B350115E398.', 124),
(65, '../../images/9991F324-B8F4-4E83-8351-61800F4B1613.', 125),
(66, '../../images/96C541E4-B6AE-4442-AF05-F01731445A90.', 126),
(67, '../../images/AA17C43E-BC01-47D5-B1D3-0322F491B4A6.jpg', 127),
(68, '../../images/0E25ABF7-BA1E-4383-9BA1-F109004F1A43.jpg', 128),
(69, '../../images/516E4939-3244-4033-9DC3-A42D68C42455.jpg', 129),
(70, '../../images/937D1494-C3FF-47E7-8B50-5E71BF497B4B.jpg', 130),
(71, '../../images/79B53B15-3D85-41C5-8FA6-37E464753BA6.jpg', 131),
(72, '../../images/7CC8709E-B578-4922-A7D5-D1EA9B3BB595.jpeg', 132),
(73, '../../images/F6D9ED18-7319-4A22-9B19-7742BFEF7808.png', 133),
(74, '../../images/618B549A-00B9-4FBC-AAA7-35F53A41EBDE.jpeg', 134),
(75, '../../images/8B6B6584-C892-4D67-9BE3-F55D8222FA30.jpg', 135),
(76, '../../images/7A22104A-C32F-4BC3-A6B2-AA1EAD103040.jpeg', 135),
(77, '../../images/147B26C4-AF71-47D3-A9C5-055F08DDCA87.jpg', 136),
(78, '../../images/C74B1431-E981-48F7-A7DA-D2763C5E6ADE.jpeg', 136),
(79, '../../images/4E48A53E-6895-4ECD-83D3-663382FC9C18.png', 136);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

DROP TABLE IF EXISTS `users`;
CREATE TABLE IF NOT EXISTS `users` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(50) NOT NULL,
  `password` varchar(255) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `username` (`username`)
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `username`, `password`) VALUES
(1, 'koko', '$2y$10$m6h8but6twXBCFCl8oCvKuA1C/OXzW02otu4ZZlKeYlHlQaMxfFa.');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

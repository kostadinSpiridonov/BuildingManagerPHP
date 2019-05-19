-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: May 19, 2019 at 03:00 PM
-- Server version: 5.7.26
-- PHP Version: 7.2.18

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
) ENGINE=MyISAM AUTO_INCREMENT=153 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `buildings`
--

INSERT INTO `buildings` (`id`, `name`, `location`, `description`) VALUES
(150, 'asd', '38.1071,70.0743', 'asdasd'),
(151, 'ad', '7.78154,2.18361', 'asd'),
(152, 'Capital Fort', '42.6979,23.3222', 'Where does it come from? Contrary to popular belief, Lorem Ipsum is not simply random text. It has roots in a piece of classical Latin literature from 45 BC, making it over 2000 years old. Richard McClintock, a Latin professor at Hampden-Sydney College in Virginia, looked up one of the more obscure Latin words, consectetur, from a Lorem Ipsum passage, and going through the cites of the word in classical literature, discovered the undoubtable source. Lorem Ipsum comes from sections 1.10.32 and 1.10.33 of \"de Finibus Bonorum et Malorum\" (The Extremes of Good and Evil) by Cicero, written in 45 BC. This book is a treatise on the theory of ethics, very popular during the Renaissance. The first line of Lorem Ipsum, \"Lorem ipsum dolor sit amet..\", comes from a line in section 1.10.32. The standard chunk of Lorem Ipsum used since the 1500s is reproduced below for those interested. Sections 1.10.32 and 1.10.33 from \"de Finibus Bonorum et Malorum\" by Cicero are also reproduced in their exact original form, accompanied by English versions from the 1914 translation by H. Rackham.Where does it come from? Contrary to popular belief, Lorem Ipsum is not simply random text. It has roots in a piece of classical Latin literature from 45 BC, making it over 2000 years old. Richard McClintock, a Latin professor at Hampden-Sydney College in Virginia, looked up one of the more obscure Latin words, consectetur, from a Lorem Ipsum passage, and going through the cites of the word in classical literature, discovered the undoubtable source. Lorem Ipsum comes from sections 1.10.32 and 1.10.33 of \"de Finibus Bonorum et Malorum\" (The Extremes of Good and Evil) by Cicero, written in 45 BC. This book is a treatise on the theory of ethics, very popular during the Renaissance. The first line of Lorem Ipsum, \"Lorem ipsum dolor sit amet..\", comes from a line in section 1.10.32. The standard chunk of Lorem Ipsum used since the 1500s is reproduced below for those interested. Sections 1.10.32 and 1.10.33 from \"de Finibus Bonorum et Malorum\" by Cicero are also reproduced in their exact original form, accompanied by English versions from the 1914 translation by H. Rackham.Where does it come from? Contrary to popular belief, Lorem Ipsum is not simply random text. It has roots in a piece of classical Latin literature from 45 BC, making it over 2000 years old. Richard McClintock, a Latin professor at Hampden-Sydney College in Virginia, looked up one of the more obscure Latin words, consectetur, from a Lorem Ipsum passage, and going through the cites of the word in classical literature, discovered the undoubtable source. Lorem Ipsum comes from sections 1.10.32 and 1.10.33 of \"de Finibus Bonorum et Malorum\" (The Extremes of Good and Evil) by Cicero, written in 45 BC. This book is a treatise on the theory of ethics, very popular during the Renaissance. The first line of Lorem Ipsum, \"Lorem ipsum dolor sit amet..\", comes from a line in section 1.10.32. The standard chunk of Lorem Ipsum used since the 1500s is reproduced below for those interested. Sections 1.10.32 and 1.10.33 from \"de Finibus Bonorum et Malorum\" by Cicero are also reproduced in their exact original foby English versions from the 1914 translation by H. Rackham.Where does it come from? Contrary to popular belief, Lorem Ipsum is not simply random text. It has roots in a piece of classical Latin literature from 45 BC, making it over 2000 years old. Richard McClintock, a Latin professor at Hampden-Sydney College in Virginia, looked up one of the more obscure Latin words, consectetur, from a Lorem Ipsum passage, and going through the cites of the word in classical literature, discovered the undoubtable source. Lorem Ipsum comes from sections 1.10.32 and 1.10.33 of \"de Finibus Bonorum et Malorum\" (The Extremes of Good and Evil) by Cicero, written in 45 BC. This book is a treatise on the theory of ethics, very popular during the Renaissance. The first line of Lorem Ipsum'),
(149, 'qwe', '69.2446,-53.539', 'qwe'),
(148, 'qwe', '31.9231,35.8853', 'qwe'),
(145, 'qqq', '-14.2367,-71.2697', 'qq'),
(146, 'Capital Fortas', '42.1418,24.7499', 'asd'),
(147, 'asd', '47.9879,56.5401', 'asdasd');

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
) ENGINE=MyISAM AUTO_INCREMENT=110 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `images`
--

INSERT INTO `images` (`id`, `path`, `buildingId`) VALUES
(92, '../../images/5C2D7ECA-8087-44CE-9126-FFB9D3DEE31B.jpg', 148),
(91, '../../images/1F934CDB-98A4-4437-8218-0155A54925BF.jpg', 147),
(90, '../../images/C461FEA9-BA35-44E5-81F7-2E514DAC936D.jpg', 146),
(87, '../../../images/0D1714D1-279A-4CB1-ABB0-2A2F394099C0.jpg', 143),
(88, '../../images/498BA3B1-53CE-42DF-9B68-0C399CE8FC29.jpg', 144),
(89, '../../images/00C916E9-5B30-4688-99A3-829BF654C71B.jpg', 145),
(109, '../../images/41A44F7C-280C-4AE6-9F6A-E51B8FE2461A.jpg', 152),
(108, '../../images/B57AF82A-104E-4830-92C1-516144572D05.jpg', 152),
(107, '../../images/11E6478D-EB19-4A8A-8FA3-8FEB7E4BF0CB.jpg', 152),
(106, '../../images/47AA1912-38A5-4662-8AA5-E8D70126C23D.png', 152),
(105, '../../images/C992E697-A39D-4C36-AEA6-98F879E0ECF0.jpg', 152),
(104, '../../images/D773D63B-B01D-4C0A-BBF4-9618C949B53A.jpg', 152),
(103, '../../images/4C4AB960-A802-42E0-8D8C-1137056BEC1A.jpg', 152),
(102, '../../images/8A8C02D0-9B8A-4864-94FA-86ED2765BD8D.jpg', 152),
(101, '../../images/72CB68BE-0F72-47B0-A83E-7F447913FA8A.jpg', 152),
(100, '../../images/18CC0E19-0456-4816-A8D5-AB834BD49CF0.jpg', 152),
(99, '../../images/045256BD-04A1-4C14-94C3-505D99ADA9AD.jpg', 152),
(98, '../../images/D05D37DB-3B64-42CB-A6FB-90BD07A5A43B.jpg', 152),
(97, '../../images/2E0C9D28-6DD9-4926-B596-B0E4C1254A64.jpg', 152),
(96, '../../images/C3B41B8D-012F-4EEC-8E26-01C8DBF13391.jpg', 152),
(95, '../../images/D1B84F7E-E314-4851-8942-A880FE563163.jpg', 151),
(94, '../../images/6D544730-9615-4D63-992D-F6370F9B4B3D.jpg', 150),
(93, '../../images/DA1C524D-5E31-46CC-9FE1-1DC0E74123BA.jpg', 149),
(85, '../../images/59B57F65-4A8D-4BBA-B620-61C846D92E57.jpg', 141),
(84, '../../images/63267888-7510-4153-96F2-43F5B730434D.jpg', 141),
(83, '../../images/480E9468-CE57-4683-AFD8-0A649DCADA16.jpg', 140),
(82, '../../images/B8D6D3B8-70C3-4D57-B7F0-529AD37793C9.jpg', 139),
(86, '../../images/F1B8748A-A706-4B97-820E-F4E61FA5B3F5.jpg', 142);

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
(1, 'koko', '$2y$10$BADJF.ocHzYfWDWuen44sOrWw2V3xHSaXYD0aVa7b7qC3FBNR0ite');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

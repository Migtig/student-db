-- phpMyAdmin SQL Dump
-- version 4.9.5
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Apr 15, 2021 at 03:19 PM
-- Server version: 5.7.24
-- PHP Version: 7.4.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `bcit`
--

-- --------------------------------------------------------

--
-- Table structure for table `secure_users`
--

CREATE TABLE `secure_users` (
  `primary_key` int(11) NOT NULL,
  `username` varchar(30) NOT NULL,
  `password` varchar(60) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `secure_users`
--

INSERT INTO `secure_users` (`primary_key`, `username`, `password`) VALUES
(1, 'shania', '$2y$10$ad9OH/9Z58tbl6wiMr45eOwK5xmrHLydnDoBZKzMAv0v0Rec0KFyC'),
(2, 'robert', '$2y$10$8KFSymja9z8ynQG9RhS9Te7/jU4.mG0n3blmZYqeyyovf7.Y39jUO'),
(3, 'jane', '$2y$10$ootMJgJbnMz0hIffyNzZWeYF2x7xsyeucuNyLyJqaqmFJEc.ddnRu'),
(4, 'janet', '$2y$10$ln/uP5C4v7FS5jIW71sw4OF85l9zFB9vxvVCBEANxaSaLx5U..vge');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `secure_users`
--
ALTER TABLE `secure_users`
  ADD PRIMARY KEY (`primary_key`),
  ADD UNIQUE KEY `username` (`username`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `secure_users`
--
ALTER TABLE `secure_users`
  MODIFY `primary_key` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

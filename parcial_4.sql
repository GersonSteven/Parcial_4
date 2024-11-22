-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 22, 2024 at 08:25 PM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.0.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `parcial_4`
--

-- --------------------------------------------------------

--
-- Table structure for table `author`
--

CREATE TABLE `author` (
  `ID_AUTHOR` bigint(11) NOT NULL,
  `FULL_NAME` varchar(255) NOT NULL,
  `DATE_OF_BIRTH` date NOT NULL,
  `DATE_OF_DEATH` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `author`
--

INSERT INTO `author` (`ID_AUTHOR`, `FULL_NAME`, `DATE_OF_BIRTH`, `DATE_OF_DEATH`) VALUES
(1, 'Julio Verme', '0000-00-00', '0000-00-00');

-- --------------------------------------------------------

--
-- Table structure for table `book`
--

CREATE TABLE `book` (
  `ID_BOOK` bigint(11) NOT NULL,
  `TITLE` varchar(255) NOT NULL,
  `DESCRIPTION` varchar(255) NOT NULL,
  `YEAR_PUBLICATION` date NOT NULL,
  `ID_AUTHOR` bigint(20) NOT NULL,
  `ID_GENRE` bigint(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `book`
--

INSERT INTO `book` (`ID_BOOK`, `TITLE`, `DESCRIPTION`, `YEAR_PUBLICATION`, `ID_AUTHOR`, `ID_GENRE`) VALUES
(1, 'Comedia libro', 'Es un libro de comedia', '0000-00-00', 1, 1);

-- --------------------------------------------------------

--
-- Table structure for table `genre`
--

CREATE TABLE `genre` (
  `ID_GENRE` bigint(20) NOT NULL,
  `NAME` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `genre`
--

INSERT INTO `genre` (`ID_GENRE`, `NAME`) VALUES
(1, 'Comedia');

-- --------------------------------------------------------

--
-- Table structure for table `migration`
--

CREATE TABLE `migration` (
  `version` varchar(180) NOT NULL,
  `apply_time` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `migration`
--

INSERT INTO `migration` (`version`, `apply_time`) VALUES
('m000000_000000_base', 1732234087),
('m140209_132017_init', 1732234094),
('m140403_174025_create_account_table', 1732234094),
('m140504_113157_update_tables', 1732234094),
('m140504_130429_create_token_table', 1732234094),
('m140830_171933_fix_ip_field', 1732234094),
('m140830_172703_change_account_table_name', 1732234094),
('m141222_110026_update_ip_field', 1732234094);

-- --------------------------------------------------------

--
-- Table structure for table `profile`
--

CREATE TABLE `profile` (
  `user_id` int(11) NOT NULL,
  `name` varchar(255) DEFAULT NULL,
  `public_email` varchar(255) DEFAULT NULL,
  `gravatar_email` varchar(255) DEFAULT NULL,
  `gravatar_id` varchar(32) DEFAULT NULL,
  `location` varchar(255) DEFAULT NULL,
  `website` varchar(255) DEFAULT NULL,
  `bio` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `social_account`
--

CREATE TABLE `social_account` (
  `id` int(11) NOT NULL,
  `user_id` int(11) DEFAULT NULL,
  `provider` varchar(255) NOT NULL,
  `client_id` varchar(255) NOT NULL,
  `data` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `stock`
--

CREATE TABLE `stock` (
  `ID_STOCK` bigint(20) NOT NULL,
  `ID_BOOK` bigint(20) NOT NULL,
  `TOTAL_STOCK` int(11) NOT NULL,
  `NOTES` varchar(255) NOT NULL,
  `LAST_INVENTARY` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `token`
--

CREATE TABLE `token` (
  `user_id` int(11) NOT NULL,
  `code` varchar(32) NOT NULL,
  `created_at` int(11) NOT NULL,
  `type` smallint(6) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `username` varchar(25) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password_hash` varchar(60) NOT NULL,
  `auth_key` varchar(32) NOT NULL,
  `confirmed_at` int(11) DEFAULT NULL,
  `unconfirmed_email` varchar(255) DEFAULT NULL,
  `blocked_at` int(11) DEFAULT NULL,
  `registration_ip` varchar(45) DEFAULT NULL,
  `created_at` int(11) NOT NULL,
  `updated_at` int(11) NOT NULL,
  `flags` int(11) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `author`
--
ALTER TABLE `author`
  ADD PRIMARY KEY (`ID_AUTHOR`);

--
-- Indexes for table `book`
--
ALTER TABLE `book`
  ADD PRIMARY KEY (`ID_BOOK`),
  ADD KEY `FK_BOOK_AUTHOR` (`ID_AUTHOR`),
  ADD KEY `FK_BOOK_GENRE` (`ID_GENRE`);

--
-- Indexes for table `genre`
--
ALTER TABLE `genre`
  ADD PRIMARY KEY (`ID_GENRE`);

--
-- Indexes for table `migration`
--
ALTER TABLE `migration`
  ADD PRIMARY KEY (`version`);

--
-- Indexes for table `profile`
--
ALTER TABLE `profile`
  ADD PRIMARY KEY (`user_id`);

--
-- Indexes for table `social_account`
--
ALTER TABLE `social_account`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `account_unique` (`provider`,`client_id`),
  ADD KEY `fk_user_account` (`user_id`);

--
-- Indexes for table `stock`
--
ALTER TABLE `stock`
  ADD PRIMARY KEY (`ID_STOCK`),
  ADD KEY `FK_BOOK_STOCK` (`ID_BOOK`);

--
-- Indexes for table `token`
--
ALTER TABLE `token`
  ADD UNIQUE KEY `token_unique` (`user_id`,`code`,`type`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `user_unique_username` (`username`),
  ADD UNIQUE KEY `user_unique_email` (`email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `author`
--
ALTER TABLE `author`
  MODIFY `ID_AUTHOR` bigint(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `book`
--
ALTER TABLE `book`
  MODIFY `ID_BOOK` bigint(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `genre`
--
ALTER TABLE `genre`
  MODIFY `ID_GENRE` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `social_account`
--
ALTER TABLE `social_account`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `stock`
--
ALTER TABLE `stock`
  MODIFY `ID_STOCK` bigint(20) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `book`
--
ALTER TABLE `book`
  ADD CONSTRAINT `FK_BOOK_AUTHOR` FOREIGN KEY (`ID_AUTHOR`) REFERENCES `author` (`ID_AUTHOR`),
  ADD CONSTRAINT `FK_BOOK_GENRE` FOREIGN KEY (`ID_GENRE`) REFERENCES `genre` (`ID_GENRE`);

--
-- Constraints for table `profile`
--
ALTER TABLE `profile`
  ADD CONSTRAINT `fk_user_profile` FOREIGN KEY (`user_id`) REFERENCES `user` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `social_account`
--
ALTER TABLE `social_account`
  ADD CONSTRAINT `fk_user_account` FOREIGN KEY (`user_id`) REFERENCES `user` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `stock`
--
ALTER TABLE `stock`
  ADD CONSTRAINT `FK_BOOK_STOCK` FOREIGN KEY (`ID_BOOK`) REFERENCES `book` (`ID_BOOK`);

--
-- Constraints for table `token`
--
ALTER TABLE `token`
  ADD CONSTRAINT `fk_user_token` FOREIGN KEY (`user_id`) REFERENCES `user` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 11, 2023 at 10:03 PM
-- Server version: 10.4.28-MariaDB
-- PHP Version: 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `gaming_forum`
--
CREATE DATABASE IF NOT EXISTS `gaming_forum` DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci;
USE `gaming_forum`;

-- --------------------------------------------------------

--
-- Table structure for table `comment`
--

CREATE TABLE `comment` (
  `Comment_ID` int(16) NOT NULL,
  `Post_ID` int(11) NOT NULL,
  `User_ID` int(11) NOT NULL,
  `Comment` varchar(2000) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `comment`
--

INSERT INTO `comment` (`Comment_ID`, `Post_ID`, `User_ID`, `Comment`) VALUES
(1, 1, 1, 'OMG, this game is awesome! I\'ve never played something so good like this before. Graphics r amazing and the story, wow! I was literally on the edge of my seat the whole time. Definitly recommend!!!\"'),
(2, 2, 2, 'This game is lit! The gameplay mechanics are sick, and the graphics are like next level. I can\'t stop playing it. Devs did a great job, keep it up!'),
(3, 3, 1, 'I kinda liked the game, but there\'s lots of bugs. Like seriously, I was stuck in a wall LOL. Also, the story was confusing, had no idea what was going on. But hey, it\'s alright for killing time I guess.'),
(4, 1, 2, 'Back in my day, games were simpler. Now, everything\'s so complicated. But this game, it reminds me of the good ol\' days. Nostalgia hit me hard. Controls are a bit wonky, but I\'m enjoying it!'),
(5, 3, 2, 'I\'m new to gaming, and this was my first game. It was overwhelming at first, but I\'m getting the hang of it. The community is really nice and helps me when I\'m stuck. Thumbs up for the friendly players!');

-- --------------------------------------------------------

--
-- Table structure for table `company`
--

CREATE TABLE `company` (
  `Company_ID` int(11) NOT NULL,
  `Company_Name` varchar(24) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `company`
--

INSERT INTO `company` (`Company_ID`, `Company_Name`) VALUES
(0, 'Generic Gaming Company'),
(1, 'test_company');

-- --------------------------------------------------------

--
-- Table structure for table `games`
--

CREATE TABLE `games` (
  `Game_ID` int(11) NOT NULL,
  `Company_ID` int(11) NOT NULL,
  `Genre_ID` int(11) NOT NULL,
  `Title` varchar(20) NOT NULL,
  `Description` varchar(200) NOT NULL,
  `Release_Date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `games`
--

INSERT INTO `games` (`Game_ID`, `Company_ID`, `Genre_ID`, `Title`, `Description`, `Release_Date`) VALUES
(1, 0, 1, 'Generic New Fantasy ', 'BEHOLD! A new generic fantasy game full of amazing action, adventure, and intrigue. Enjoy a totally unique and original game. ', '0000-00-00'),
(2, 1, 1, 'Even More Generic Ga', 'Behold! An entirely even more original fantasy game that you\'ve definitely never seen before.', '2023-12-21'),
(3, 1, 3, 'RPGAdventures', 'Join an amazing cast of characters in RPGAdventures, the brand new RPG by Test Company!', '2023-12-31');

-- --------------------------------------------------------

--
-- Table structure for table `genre`
--

CREATE TABLE `genre` (
  `Genre_ID` int(11) NOT NULL,
  `Genre` varchar(24) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `genre`
--

INSERT INTO `genre` (`Genre_ID`, `Genre`) VALUES
(1, 'Fantasy'),
(2, 'Action'),
(3, 'RPG');

-- --------------------------------------------------------

--
-- Table structure for table `posts`
--

CREATE TABLE `posts` (
  `Post_ID` int(11) NOT NULL,
  `User_ID` int(11) NOT NULL,
  `Date_Created` datetime NOT NULL,
  `Date_Updated` datetime NOT NULL,
  `Content` varchar(2000) NOT NULL,
  `Title` varchar(128) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `posts`
--

INSERT INTO `posts` (`Post_ID`, `User_ID`, `Date_Created`, `Date_Updated`, `Content`, `Title`) VALUES
(1, 1, '2023-12-08 06:55:01', '2023-12-08 06:55:01', 'The fitness gram pacer test is a multi-stage aerobic capacity test that slowly gets more difficult as you progress.', 'Test 1'),
(2, 1, '2023-12-08 06:56:56', '2023-12-08 06:56:56', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum', 'Test 2'),
(3, 2, '2023-12-08 06:58:14', '2023-12-08 06:58:14', '\"Who’s joe?\" a distant voice asks.\r\n\r\nInstantly everyone nearby hears the sound of 1,000s of bricks rapidly shuffling towards his location.\r\n\r\nThe earth itself seemed to cry out in agony, until finally the ground itself split open and a horrific creature crawled from the ground, covered in mucus and tar.\r\n\r\n”Joe Momma…” the creature whispered.\r\n\r\nThe man cried out in pain as he disintegrated into dust, and the whole world fell silent in fear.\r\n\r\n\"I did a little trolling.\" the wretched creature remarked before burrowing back into the earth.', 'Test 3');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `User_ID` int(11) NOT NULL,
  `Company_ID` int(11) NOT NULL,
  `First_Name` varchar(20) NOT NULL,
  `Last_Name` varchar(24) NOT NULL,
  `Email` varchar(24) NOT NULL,
  `Username` varchar(24) NOT NULL,
  `Password` varchar(64) NOT NULL,
  `Date_Created` date NOT NULL,
  `Admin` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`User_ID`, `Company_ID`, `First_Name`, `Last_Name`, `Email`, `Username`, `Password`, `Date_Created`, `Admin`) VALUES
(1, 1, 'Testy', 'McManface', 'ManfaceTest@test.com', 'ManfaceRulez123', 'manface12', '2023-12-08', 1),
(2, 0, 'Testya', 'McWomanface', 'Womanface13@test.com', 'womanface13', 'womanface13', '2023-12-08', 1),
(75624526, 1, 'test', 'test', 'test@email.com', 'test', '$2y$10$p5mqpgVi.a7aGkiwFgfXd..utteDyWF/kYthu0834/W0Sm6QVX9Bu', '2023-12-11', 1);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `comment`
--
ALTER TABLE `comment`
  ADD PRIMARY KEY (`Comment_ID`),
  ADD KEY `posts` (`Post_ID`),
  ADD KEY `users` (`User_ID`);

--
-- Indexes for table `company`
--
ALTER TABLE `company`
  ADD PRIMARY KEY (`Company_ID`);

--
-- Indexes for table `games`
--
ALTER TABLE `games`
  ADD PRIMARY KEY (`Game_ID`),
  ADD KEY `Company_ID` (`Company_ID`),
  ADD KEY `Genre_ID` (`Genre_ID`);

--
-- Indexes for table `genre`
--
ALTER TABLE `genre`
  ADD PRIMARY KEY (`Genre_ID`);

--
-- Indexes for table `posts`
--
ALTER TABLE `posts`
  ADD PRIMARY KEY (`Post_ID`),
  ADD KEY `User_ID` (`User_ID`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`User_ID`),
  ADD KEY `Company_ID` (`Company_ID`);

--
-- Constraints for dumped tables
--

--
-- Constraints for table `comment`
--
ALTER TABLE `comment`
  ADD CONSTRAINT `posts` FOREIGN KEY (`Post_ID`) REFERENCES `posts` (`Post_ID`),
  ADD CONSTRAINT `users` FOREIGN KEY (`User_ID`) REFERENCES `users` (`User_ID`);

--
-- Constraints for table `games`
--
ALTER TABLE `games`
  ADD CONSTRAINT `games_ibfk_1` FOREIGN KEY (`Company_ID`) REFERENCES `company` (`Company_ID`),
  ADD CONSTRAINT `games_ibfk_2` FOREIGN KEY (`Genre_ID`) REFERENCES `genre` (`Genre_ID`);

--
-- Constraints for table `posts`
--
ALTER TABLE `posts`
  ADD CONSTRAINT `posts_ibfk_1` FOREIGN KEY (`User_ID`) REFERENCES `users` (`User_ID`);

--
-- Constraints for table `users`
--
ALTER TABLE `users`
  ADD CONSTRAINT `users_ibfk_1` FOREIGN KEY (`Company_ID`) REFERENCES `company` (`Company_ID`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

-- phpMyAdmin SQL Dump
-- version 4.7.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Aug 12, 2017 at 11:14 PM
-- Server version: 5.5.55-0ubuntu0.14.04.1
-- PHP Version: 5.5.9-1ubuntu4.21

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `cricket`
--

-- --------------------------------------------------------

--
-- Table structure for table `batsman_details`
--

CREATE TABLE `batsman_details` (
  `details_id` int(11) NOT NULL,
  `player_id` int(11) NOT NULL,
  `batting_style` varchar(200) NOT NULL,
  `matches` int(11) NOT NULL,
  `inns` int(11) NOT NULL,
  `not_out` int(11) NOT NULL,
  `batting_runs` int(11) NOT NULL,
  `bowls` int(11) NOT NULL,
  `strike_rate` int(11) NOT NULL,
  `bat_average` float NOT NULL,
  `fours` int(11) NOT NULL,
  `sixs` int(11) NOT NULL,
  `fiftys` int(11) NOT NULL,
  `centurys` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `batsman_details`
--

INSERT INTO `batsman_details` (`details_id`, `player_id`, `batting_style`, `matches`, `inns`, `not_out`, `batting_runs`, `bowls`, `strike_rate`, `bat_average`, `fours`, `sixs`, `fiftys`, `centurys`) VALUES
(1, 1, 'Right handed', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0),
(2, 2, 'Right handed', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0),
(3, 3, 'Right handed', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0),
(4, 4, 'Right handed', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0),
(5, 5, 'Left handed', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0),
(6, 6, 'Right handed', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0),
(7, 7, 'Right handed', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0),
(8, 8, 'Right handed', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0),
(9, 9, 'Right handed', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0),
(10, 10, 'Left handed', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0),
(11, 11, 'Right handed', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0),
(12, 12, 'Right handed', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0),
(13, 14, 'Right handed', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0),
(14, 16, 'Right handed', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0),
(15, 17, 'Right handed', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0),
(16, 18, 'Right handed', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0),
(17, 19, 'Right handed', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0),
(18, 20, 'Right handed', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0),
(19, 21, 'Right handed', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0),
(20, 22, 'Right handed', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0),
(21, 23, 'Right handed', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0),
(22, 24, 'Right handed', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0);

-- --------------------------------------------------------

--
-- Table structure for table `bowler_details`
--

CREATE TABLE `bowler_details` (
  `details_id` int(11) NOT NULL,
  `player_id` int(11) NOT NULL,
  `bowling_type` varchar(100) NOT NULL,
  `matches` int(11) NOT NULL,
  `overs` int(11) NOT NULL,
  `bowling_runs` int(11) NOT NULL,
  `batting_runs` int(11) NOT NULL,
  `wickets` int(11) NOT NULL,
  `bow_avl` int(11) NOT NULL,
  `eco` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `bowler_details`
--

INSERT INTO `bowler_details` (`details_id`, `player_id`, `bowling_type`, `matches`, `overs`, `bowling_runs`, `batting_runs`, `wickets`, `bow_avl`, `eco`) VALUES
(1, 2, 'Right Arm Medium', 0, 0, 0, 0, 0, 0, 0),
(2, 3, 'Left Arm Fast', 0, 0, 0, 0, 0, 0, 0),
(3, 4, 'Right Arm Fast', 0, 0, 0, 0, 0, 0, 0),
(4, 7, 'Left Arm Fast', 0, 0, 0, 0, 0, 0, 0),
(5, 8, 'Right Arm Fast', 0, 0, 0, 0, 0, 0, 0),
(6, 9, '', 0, 0, 0, 0, 0, 0, 0),
(7, 10, '', 0, 0, 0, 0, 0, 0, 0),
(8, 11, '', 0, 0, 0, 0, 0, 0, 0),
(9, 13, 'Right Arm Fast', 0, 0, 0, 0, 0, 0, 0),
(10, 14, 'Left Arm Fast', 0, 0, 0, 0, 0, 0, 0),
(11, 15, 'Left Arm Fast', 0, 0, 0, 0, 0, 0, 0),
(12, 16, 'Left Arm Fast', 0, 0, 0, 0, 0, 0, 0),
(13, 17, 'Right Arm Medium', 0, 0, 0, 0, 0, 0, 0),
(14, 18, 'Right Arm Medium', 0, 0, 0, 0, 0, 0, 0),
(15, 19, 'Left Arm Fast', 0, 0, 0, 0, 0, 0, 0),
(16, 20, 'Left Arm Fast', 0, 0, 0, 0, 0, 0, 0),
(17, 24, '', 0, 0, 0, 0, 0, 0, 0);

-- --------------------------------------------------------

--
-- Table structure for table `login`
--

CREATE TABLE `login` (
  `login_id` int(11) NOT NULL,
  `user_name` varchar(30) NOT NULL,
  `password` varchar(100) NOT NULL,
  `last_login_date` date NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `login`
--

INSERT INTO `login` (`login_id`, `user_name`, `password`, `last_login_date`) VALUES
(1, 'admin', '9923bed617f18e3d937175c9a27a1671', '0000-00-00');

-- --------------------------------------------------------

--
-- Table structure for table `matches`
--

CREATE TABLE `matches` (
  `match_id` int(11) NOT NULL,
  `match_number` varchar(100) NOT NULL,
  `game_type` varchar(150) NOT NULL,
  `date` varchar(100) NOT NULL,
  `time` varchar(100) NOT NULL,
  `venue` varchar(300) NOT NULL,
  `first_team_name` varchar(200) NOT NULL,
  `second_team_name` varchar(200) NOT NULL,
  `winner_team_name` varchar(200) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `matches`
--

INSERT INTO `matches` (`match_id`, `match_number`, `game_type`, `date`, `time`, `venue`, `first_team_name`, `second_team_name`, `winner_team_name`) VALUES
(1, 'One', 'Friendly', '04/15/2017', '8:14 AM', 'Kochi', 'Antartic', 'Artic', 'Artic');

-- --------------------------------------------------------

--
-- Table structure for table `match_batsman_details`
--

CREATE TABLE `match_batsman_details` (
  `match_batsman_id` int(11) NOT NULL,
  `player_id` int(11) NOT NULL,
  `team_name` varchar(200) NOT NULL,
  `match_id` int(11) NOT NULL,
  `batting_runs` int(11) NOT NULL,
  `balls` int(11) NOT NULL,
  `strike_rate` float NOT NULL,
  `fours` int(11) NOT NULL,
  `sixs` int(11) NOT NULL,
  `fiftys` int(11) NOT NULL,
  `centuries` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `match_batsman_details`
--

INSERT INTO `match_batsman_details` (`match_batsman_id`, `player_id`, `team_name`, `match_id`, `batting_runs`, `balls`, `strike_rate`, `fours`, `sixs`, `fiftys`, `centuries`) VALUES
(1, 1, 'Antartic', 1, 39, 20, 195, 4, 3, 0, 0),
(2, 2, 'Antartic', 1, 74, 48, 154.167, 10, 2, 1, 0),
(3, 3, 'Antartic', 1, 0, 1, 0, 0, 0, 0, 0),
(4, 4, 'Antartic', 1, 0, 3, 0, 0, 0, 0, 0),
(5, 5, 'Antartic', 1, 1, 7, 14.2857, 0, 0, 0, 0),
(6, 6, 'Antartic', 1, 10, 10, 100, 0, 1, 0, 0),
(7, 7, 'Antartic', 1, 36, 22, 163.636, 6, 1, 0, 0),
(8, 8, 'Antartic', 1, 5, 8, 62.5, 1, 0, 0, 0),
(9, 9, 'Antartic', 1, 9, 3, 300, 2, 0, 0, 0),
(10, 10, 'Antartic', 1, 3, 9, 33.3333, 0, 0, 0, 0),
(11, 11, 'Antartic', 1, 0, 1, 0, 0, 0, 0, 0),
(12, 12, 'Antartic', 1, 8, 3, 266.667, 2, 0, 0, 0),
(13, 14, 'Artic', 1, 0, 0, 0, 0, 0, 0, 0);

-- --------------------------------------------------------

--
-- Table structure for table `match_bowler_details`
--

CREATE TABLE `match_bowler_details` (
  `match_bowler_id` int(11) NOT NULL,
  `player_id` int(11) NOT NULL,
  `team_name` varchar(200) NOT NULL,
  `match_id` int(11) NOT NULL,
  `overs` int(11) NOT NULL,
  `bowling_runs` int(11) NOT NULL,
  `maiden` int(11) NOT NULL,
  `wicket` int(11) NOT NULL,
  `eco` float NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `match_bowler_details`
--

INSERT INTO `match_bowler_details` (`match_bowler_id`, `player_id`, `team_name`, `match_id`, `overs`, `bowling_runs`, `maiden`, `wicket`, `eco`) VALUES
(1, 2, 'Antartic', 1, 5, 35, 0, 3, 7),
(2, 3, 'Antartic', 1, 1, 17, 0, 0, 17),
(3, 4, 'Antartic', 1, 3, 27, 0, 0, 9),
(4, 7, 'Antartic', 1, 4, 34, 0, 1, 8.5),
(5, 8, 'Antartic', 1, 2, 23, 0, 1, 11.5),
(6, 9, 'Antartic', 1, 1, 10, 0, 0, 10),
(7, 10, 'Antartic', 1, 4, 27, 0, 1, 6.75),
(8, 11, 'Antartic', 1, 2, 24, 0, 0, 12),
(9, 13, 'Artic', 1, 3, 26, 0, 0, 8.66667),
(10, 14, 'Artic', 1, 4, 55, 0, 3, 13.75);

-- --------------------------------------------------------

--
-- Table structure for table `match_players`
--

CREATE TABLE `match_players` (
  `match_player_id` int(11) NOT NULL,
  `player_id` int(11) NOT NULL,
  `match_id` int(11) NOT NULL,
  `team_name` varchar(200) NOT NULL,
  `player_type_id` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `match_players`
--

INSERT INTO `match_players` (`match_player_id`, `player_id`, `match_id`, `team_name`, `player_type_id`) VALUES
(1, 1, 1, 'Antartic', 1),
(2, 2, 1, 'Antartic', 4),
(3, 3, 1, 'Antartic', 4),
(4, 4, 1, 'Antartic', 4),
(5, 5, 1, 'Antartic', 1),
(6, 6, 1, 'Antartic', 1),
(7, 7, 1, 'Antartic', 4),
(8, 8, 1, 'Antartic', 4),
(9, 9, 1, 'Antartic', 4),
(10, 10, 1, 'Antartic', 4),
(11, 11, 1, 'Antartic', 4),
(12, 12, 1, 'Antartic', 1),
(13, 13, 1, 'Artic', 2),
(14, 14, 1, 'Artic', 4);

-- --------------------------------------------------------

--
-- Table structure for table `match_wicket_keeper_details`
--

CREATE TABLE `match_wicket_keeper_details` (
  `match_wicket_keeper_id` int(11) NOT NULL,
  `player_id` int(11) NOT NULL,
  `team_name` varchar(200) NOT NULL,
  `match_id` int(11) NOT NULL,
  `batting_runs` int(11) NOT NULL,
  `balls` int(11) NOT NULL,
  `strike_rate` float NOT NULL,
  `fours` int(11) NOT NULL,
  `sixs` int(11) NOT NULL,
  `fiftys` int(11) NOT NULL,
  `centuries` int(11) NOT NULL,
  `stumping` int(11) NOT NULL,
  `catches` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `player`
--

CREATE TABLE `player` (
  `player_id` int(11) NOT NULL,
  `player_name` varchar(50) NOT NULL,
  `photo_id` int(11) NOT NULL,
  `player_type_id` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `player`
--

INSERT INTO `player` (`player_id`, `player_name`, `photo_id`, `player_type_id`) VALUES
(1, 'Akhil Anand', 1, 1),
(2, 'Avinash Kumar', 2, 4),
(3, 'Rejoy Sunny', 3, 4),
(4, 'Ajith Mathew', 4, 4),
(5, 'Niju Jose', 5, 1),
(6, 'Sreekanth Guest', 6, 1),
(7, 'Nandakumar Unni', 7, 4),
(8, 'Varun Chandran', 8, 4),
(9, 'Tojo Cyriac', 9, 4),
(10, 'Dilip V C', 10, 4),
(11, 'Sinoy Issac', 11, 4),
(12, 'Hari Kumar R', 12, 1),
(13, 'Binoop Balakrishnan', 13, 2),
(14, 'Ranish Raveendran', 14, 4),
(15, 'Sreehari Guest', 15, 2),
(16, 'Depin Das', 16, 4),
(17, 'Srijith Nanda', 17, 4),
(18, 'Sreekanth Mohanan', 18, 4),
(19, 'Anoop Thomas', 19, 4),
(20, 'Dominic Jerry', 20, 4),
(21, 'Sreenadh Guest', 21, 1),
(22, 'Vineeth Ainippully', 22, 1),
(23, 'Vijay Mohan', 23, 1),
(24, 'Test player', 24, 4);

-- --------------------------------------------------------

--
-- Table structure for table `player_type`
--

CREATE TABLE `player_type` (
  `player_type_id` int(11) NOT NULL,
  `player_type` varchar(30) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `player_type`
--

INSERT INTO `player_type` (`player_type_id`, `player_type`) VALUES
(1, 'Batsman'),
(2, 'Bowler'),
(3, 'wicket-keeper'),
(4, 'All-rounder');

-- --------------------------------------------------------

--
-- Table structure for table `user_photos`
--

CREATE TABLE `user_photos` (
  `image_id` int(11) NOT NULL,
  `images_path` varchar(300) NOT NULL,
  `submission_date` varchar(100) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user_photos`
--

INSERT INTO `user_photos` (`image_id`, `images_path`, `submission_date`) VALUES
(1, '/var/www/html/cricket/assets/images/user_icon.png', '2017-08-06'),
(2, '/var/www/html/cricket/assets/images/user_icon.png', '2017-08-06'),
(3, '/var/www/html/cricket/assets/images/user_icon.png', '2017-08-06'),
(4, '/var/www/html/cricket/assets/images/user_icon.png', '2017-08-06'),
(5, '/var/www/html/cricket/assets/images/user_icon.png', '2017-08-06'),
(6, '/var/www/html/cricket/assets/images/user_icon.png', '2017-08-06'),
(7, '/var/www/html/cricket/assets/images/user_icon.png', '2017-08-06'),
(8, '/var/www/html/cricket/assets/images/user_icon.png', '2017-08-06'),
(9, '/var/www/html/cricket/assets/images/user_icon.png', '2017-08-06'),
(10, '/var/www/html/cricket/assets/images/user_icon.png', '2017-08-06'),
(11, '/var/www/html/cricket/assets/images/user_icon.png', '2017-08-06'),
(12, '/var/www/html/cricket/assets/images/user_icon.png', '2017-08-06'),
(13, '/var/www/html/cricket/assets/images/user_icon.png', '2017-08-06'),
(14, '/var/www/html/cricket/assets/images/user_icon.png', '2017-08-06'),
(15, '/var/www/html/cricket/assets/images/user_icon.png', '2017-08-06'),
(16, '/var/www/html/cricket/assets/images/user_icon.png', '2017-08-06'),
(17, '/var/www/html/cricket/assets/images/user_icon.png', '2017-08-06'),
(18, '/var/www/html/cricket/assets/images/user_icon.png', '2017-08-06'),
(19, '/var/www/html/cricket/assets/images/user_icon.png', '2017-08-06'),
(20, '/var/www/html/cricket/assets/images/user_icon.png', '2017-08-06'),
(21, '/var/www/html/cricket/assets/images/user_icon.png', '2017-08-06'),
(22, '/var/www/html/cricket/assets/images/user_icon.png', '2017-08-06'),
(23, '/var/www/html/cricket/assets/images/user_icon.png', '2017-08-06'),
(24, '/var/www/html/cricket/assets/images/user_icon.png', '2017-08-06');

-- --------------------------------------------------------

--
-- Table structure for table `wicket_keeper_details`
--

CREATE TABLE `wicket_keeper_details` (
  `details_id` int(11) NOT NULL,
  `player_id` int(11) NOT NULL,
  `matches` int(11) NOT NULL,
  `inns` int(11) NOT NULL,
  `not_out` int(11) NOT NULL,
  `batting_runs` int(11) NOT NULL,
  `bowls` int(11) NOT NULL,
  `strike_rate` int(11) NOT NULL,
  `bat_average` int(11) NOT NULL,
  `fours` int(11) NOT NULL,
  `sixs` int(11) NOT NULL,
  `fiftys` int(11) NOT NULL,
  `century` int(11) NOT NULL,
  `stumping` int(11) NOT NULL,
  `catches` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `batsman_details`
--
ALTER TABLE `batsman_details`
  ADD PRIMARY KEY (`details_id`);

--
-- Indexes for table `bowler_details`
--
ALTER TABLE `bowler_details`
  ADD PRIMARY KEY (`details_id`);

--
-- Indexes for table `login`
--
ALTER TABLE `login`
  ADD PRIMARY KEY (`login_id`);

--
-- Indexes for table `matches`
--
ALTER TABLE `matches`
  ADD PRIMARY KEY (`match_id`);

--
-- Indexes for table `match_batsman_details`
--
ALTER TABLE `match_batsman_details`
  ADD PRIMARY KEY (`match_batsman_id`);

--
-- Indexes for table `match_bowler_details`
--
ALTER TABLE `match_bowler_details`
  ADD PRIMARY KEY (`match_bowler_id`);

--
-- Indexes for table `match_players`
--
ALTER TABLE `match_players`
  ADD PRIMARY KEY (`match_player_id`);

--
-- Indexes for table `match_wicket_keeper_details`
--
ALTER TABLE `match_wicket_keeper_details`
  ADD PRIMARY KEY (`match_wicket_keeper_id`);

--
-- Indexes for table `player`
--
ALTER TABLE `player`
  ADD PRIMARY KEY (`player_id`);

--
-- Indexes for table `player_type`
--
ALTER TABLE `player_type`
  ADD PRIMARY KEY (`player_type_id`);

--
-- Indexes for table `user_photos`
--
ALTER TABLE `user_photos`
  ADD PRIMARY KEY (`image_id`);

--
-- Indexes for table `wicket_keeper_details`
--
ALTER TABLE `wicket_keeper_details`
  ADD PRIMARY KEY (`details_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `batsman_details`
--
ALTER TABLE `batsman_details`
  MODIFY `details_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;
--
-- AUTO_INCREMENT for table `bowler_details`
--
ALTER TABLE `bowler_details`
  MODIFY `details_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;
--
-- AUTO_INCREMENT for table `login`
--
ALTER TABLE `login`
  MODIFY `login_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `matches`
--
ALTER TABLE `matches`
  MODIFY `match_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `match_batsman_details`
--
ALTER TABLE `match_batsman_details`
  MODIFY `match_batsman_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;
--
-- AUTO_INCREMENT for table `match_bowler_details`
--
ALTER TABLE `match_bowler_details`
  MODIFY `match_bowler_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;
--
-- AUTO_INCREMENT for table `match_players`
--
ALTER TABLE `match_players`
  MODIFY `match_player_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;
--
-- AUTO_INCREMENT for table `match_wicket_keeper_details`
--
ALTER TABLE `match_wicket_keeper_details`
  MODIFY `match_wicket_keeper_id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `player`
--
ALTER TABLE `player`
  MODIFY `player_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;
--
-- AUTO_INCREMENT for table `player_type`
--
ALTER TABLE `player_type`
  MODIFY `player_type_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `user_photos`
--
ALTER TABLE `user_photos`
  MODIFY `image_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;
--
-- AUTO_INCREMENT for table `wicket_keeper_details`
--
ALTER TABLE `wicket_keeper_details`
  MODIFY `details_id` int(11) NOT NULL AUTO_INCREMENT;COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

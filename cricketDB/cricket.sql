-- phpMyAdmin SQL Dump
-- version 4.5.4.1deb2ubuntu2
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Sep 24, 2017 at 08:56 PM
-- Server version: 5.7.19-0ubuntu0.16.04.1
-- PHP Version: 5.6.31-4+ubuntu16.04.1+deb.sury.org+4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
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
  `centurys` int(11) NOT NULL,
  `season` varchar(100) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `batsman_details`
--

INSERT INTO `batsman_details` (`details_id`, `player_id`, `batting_style`, `matches`, `inns`, `not_out`, `batting_runs`, `bowls`, `strike_rate`, `bat_average`, `fours`, `sixs`, `fiftys`, `centurys`, `season`) VALUES
(1, 1, 'Right handed', 4, 4, 2, 100, 100, 2, 25, 0, 0, 0, 0, 'season 1'),
(2, 1, 'Right handed', 2, 2, 1, 50, 50, 1, 25, 0, 0, 0, 0, 'season 2'),
(3, 2, 'Right handed', 5, 20, 2, 200, 200, 5, 40, 0, 0, 0, 0, 'season 1'),
(4, 2, 'Right handed', 3, 30, 1, 100, 100, 0, 33.3333, 0, 0, 0, 0, 'season 2'),
(5, 3, 'Right handed', 6, 4, 3, 300, 300, 6, 50, 0, 0, 0, 0, 'season 1'),
(6, 3, 'Right handed', 4, 3, 2, 200, 200, 5, 50, 0, 0, 0, 0, 'season 2'),
(7, 4, 'Left handed', 7, 10, 8, 350, 200, 10, 50, 0, 0, 0, 0, 'season 1'),
(8, 4, 'Left handed', 6, 9, 5, 250, 150, 5, 41.6667, 0, 0, 0, 0, 'season 2'),
(9, 5, 'Left handed', 20, 20, 10, 250, 250, 10, 12.5, 0, 0, 0, 0, 'season 1'),
(10, 5, 'Left handed', 100, 20, 9, 200, 200, 20, 2, 0, 0, 0, 0, 'season 2'),
(11, 6, 'Right handed', 4, 5, 1, 50, 50, 50, 12.5, 0, 0, 0, 0, 'season 1'),
(12, 6, 'Right handed', 3, 2, 1, 20, 20, 20, 6.66667, 0, 0, 0, 0, 'season 2'),
(13, 7, 'Right handed', 5, 4, 2, 20, 5, 5, 4, 0, 0, 0, 0, 'season 1'),
(14, 7, 'Right handed', 5, 4, 1, 30, 4, 4, 6, 0, 0, 0, 0, 'season 2'),
(15, 12, 'Right handed', 6, 4, 1, 70, 6, 7, 11.6667, 0, 0, 0, 0, 'season 1'),
(16, 12, 'Right handed', 7, 5, 2, 100, 5, 7, 14.2857, 0, 0, 0, 0, 'season 2'),
(17, 13, 'Right handed', 5, 4, 3, 90, 3, 5, 18, 0, 0, 0, 0, 'season 1'),
(18, 13, 'Right handed', 5, 5, 1, 70, 4, 4, 14, 0, 0, 0, 0, 'season 2'),
(19, 14, 'Right handed', 8, 6, 3, 100, 4, 2, 12.5, 0, 0, 0, 0, 'season 1'),
(20, 14, 'Right handed', 7, 3, 4, 90, 5, 3, 12.8571, 0, 0, 0, 0, 'season 2'),
(21, 15, 'Right handed', 8, 5, 3, 60, 4, 4, 7.5, 0, 0, 0, 0, 'season 1'),
(22, 15, 'Right handed', 7, 4, 2, 70, 5, 3, 10, 0, 0, 0, 0, 'season 2'),
(23, 16, 'Right handed', 8, 5, 3, 70, 5, 4, 8.75, 0, 0, 0, 0, 'season 1'),
(24, 16, 'Right handed', 7, 3, 4, 90, 5, 7, 12.8571, 0, 0, 0, 0, 'season 2'),
(25, 17, 'Right handed', 7, 3, 2, 90, 4, 3, 12.8571, 0, 0, 0, 0, 'season 1'),
(26, 17, 'Right handed', 6, 3, 2, 90, 3, 2, 15, 0, 0, 0, 0, 'season 2'),
(27, 18, 'Right handed', 7, 7, 2, 100, 10, 5, 14.2857, 0, 0, 0, 0, 'season 1'),
(28, 18, 'Right handed', 4, 3, 1, 50, 20, 5, 12.5, 0, 0, 0, 0, 'season 2'),
(29, 19, 'Right handed', 15, 10, 3, 200, 200, 30, 13.3333, 0, 0, 0, 0, 'season 1'),
(30, 19, 'Right handed', 10, 8, 3, 200, 100, 5, 20, 0, 0, 0, 0, 'season 2'),
(31, 20, 'Left handed', 5, 3, 1, 150, 50, 20, 30, 0, 0, 0, 0, 'season 1'),
(32, 20, 'Left handed', 7, 2, 1, 50, 50, 5, 7.14286, 0, 0, 0, 0, 'season 2'),
(33, 21, 'Right handed', 6, 4, 2, 250, 60, 5, 41.6667, 0, 0, 0, 0, 'season 1'),
(34, 21, 'Right handed', 5, 5, 1, 170, 50, 5, 34, 0, 0, 0, 0, 'season 2'),
(35, 22, 'Right handed', 6, 4, 3, 30, 4, 5, 5, 0, 0, 0, 0, 'season 1'),
(36, 22, 'Right handed', 5, 4, 3, 70, 50, 5, 14, 0, 0, 0, 0, 'season 2');

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
  `eco` int(11) NOT NULL,
  `season` varchar(200) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `bowler_details`
--

INSERT INTO `bowler_details` (`details_id`, `player_id`, `bowling_type`, `matches`, `overs`, `bowling_runs`, `batting_runs`, `wickets`, `bow_avl`, `eco`, `season`) VALUES
(1, 3, 'Right Arm Fast', 5, 60, 100, 100, 50, 0, 0, 'season 1'),
(2, 3, 'Right Arm Fast', 6, 50, 40, 40, 30, 0, 0, 'season 2'),
(3, 5, 'Right Arm Fast', 5, 60, 65, 75, 50, 0, 0, 'season 1'),
(4, 5, 'Right Arm Fast', 3, 4, 30, 30, 5, 0, 0, 'season 2'),
(5, 6, 'Right Arm Fast', 4, 5, 30, 20, 5, 0, 0, 'season 1'),
(6, 6, 'Right Arm Fast', 5, 30, 30, 25, 0, 0, 0, 'season 2'),
(7, 7, 'Right Arm Fast', 5, 8, 80, 80, 8, 0, 0, 'season 1'),
(8, 7, 'Right Arm Fast', 10, 10, 5, 40, 3, 0, 0, 'season 2'),
(9, 8, 'Right Arm Fast', 7, 10, 80, 80, 7, 0, 0, 'season 1'),
(10, 8, 'Right Arm Fast', 8, 20, 20, 40, 7, 0, 0, 'season 2'),
(11, 9, 'Right Arm Fast', 8, 70, 40, 60, 5, 0, 0, 'season 1'),
(12, 9, 'Right Arm Fast', 6, 7, 50, 50, 3, 0, 0, 'season 2'),
(13, 10, 'Right Arm Fast', 7, 5, 110, 110, 3, 0, 0, 'season 1'),
(14, 10, 'Right Arm Fast', 6, 7, 100, 100, 3, 0, 0, 'season 2'),
(15, 11, 'Right Arm Fast', 6, 5, 40, 50, 2, 0, 0, 'season 1'),
(16, 11, 'Right Arm Fast', 7, 6, 100, 70, 3, 0, 0, 'season 2'),
(17, 12, 'Right Arm Fast', 6, 5, 60, 90, 3, 0, 0, 'season 1'),
(18, 12, 'Right Arm Fast', 7, 6, 80, 70, 2, 0, 0, 'season 2'),
(19, 13, 'Right Arm Fast', 7, 4, 70, 90, 1, 0, 0, 'season 1'),
(20, 13, 'Right Arm Fast', 6, 3, 90, 80, 2, 0, 0, 'season 2'),
(21, 14, 'Right Arm Fast', 6, 4, 100, 90, 2, 0, 0, 'season 1'),
(22, 14, 'Right Arm Fast', 7, 5, 90, 100, 3, 0, 0, 'season 2'),
(23, 15, 'Right Arm Fast', 6, 4, 80, 90, 3, 0, 0, 'season 1'),
(24, 15, 'Right Arm Fast', 7, 6, 100, 90, 3, 0, 0, 'season 2'),
(25, 16, 'Right Arm Fast', 5, 3, 100, 90, 4, 0, 0, 'season 1'),
(26, 16, 'Right Arm Fast', 7, 4, 90, 100, 2, 0, 0, 'season 2'),
(27, 17, 'Right Arm Fast', 7, 4, 90, 80, 3, 0, 0, 'season 1'),
(28, 17, 'Right Arm Fast', 6, 5, 80, 100, 4, 0, 0, 'season 2'),
(29, 18, 'Right Arm Fast', 4, 5, 70, 80, 50, 0, 0, 'season 1'),
(30, 18, 'Right Arm Fast', 3, 20, 50, 20, 5, 0, 0, 'season 2'),
(31, 23, 'Right Arm Fast', 0, 0, 0, 0, 0, 0, 0, 'season 1'),
(32, 23, 'Right Arm Fast', 0, 0, 0, 0, 0, 0, 0, 'season 2'),
(33, 24, 'Right Arm Fast', 1, 1, 1, 1, 0, 0, 0, 'season 1'),
(34, 24, 'Right Arm Fast', 1, 1, 1, 0, 0, 0, 0, 'season 2');

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
  `winner_team_name` varchar(200) NOT NULL,
  `season` varchar(200) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `matches`
--

INSERT INTO `matches` (`match_id`, `match_number`, `game_type`, `date`, `time`, `venue`, `first_team_name`, `second_team_name`, `winner_team_name`, `season`) VALUES
(1, 'One', 'Super Saturday', '03/25/2017', '2:0 PM', 'Kochi', 'Mocc1', 'Pcc 1', 'Mocc1', 'season 3'),
(2, 'One', 'Super Saturday', '03/25/2017', '2:0 PM', 'Kochi', 'Mocc1', 'Pcc 1', 'Mocc1', 'season 3'),
(3, 'One', 'Super Saturday', '03/25/2017', '2:0 PM', 'Kochi', 'Mocc1', 'Pcc 1', 'Mocc1', 'season 3');

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
  `centuries` int(11) NOT NULL,
  `season` varchar(200) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

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
  `eco` float NOT NULL,
  `season` varchar(200) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `match_players`
--

CREATE TABLE `match_players` (
  `match_player_id` int(11) NOT NULL,
  `player_id` int(11) NOT NULL,
  `match_id` int(11) NOT NULL,
  `team_name` varchar(200) NOT NULL,
  `player_type_id` int(11) NOT NULL,
  `season` varchar(200) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `match_players`
--

INSERT INTO `match_players` (`match_player_id`, `player_id`, `match_id`, `team_name`, `player_type_id`, `season`) VALUES
(1, 1, 3, 'Mocc1', 1, ''),
(2, 2, 3, 'Mocc1', 1, ''),
(3, 3, 3, 'Mocc1', 4, ''),
(4, 4, 3, 'Mocc1', 1, ''),
(5, 5, 3, 'Mocc1', 4, ''),
(6, 6, 3, 'Mocc1', 4, ''),
(7, 7, 3, 'Mocc1', 4, ''),
(8, 8, 3, 'Mocc1', 2, ''),
(9, 10, 3, 'Mocc1', 2, ''),
(10, 11, 3, 'Mocc1', 2, ''),
(11, 12, 3, 'Pcc 1', 4, ''),
(12, 13, 3, 'Pcc 1', 4, ''),
(13, 14, 3, 'Pcc 1', 4, ''),
(14, 15, 3, 'Pcc 1', 4, '');

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
  `catches` int(11) NOT NULL,
  `season` varchar(200) NOT NULL
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
(1, 'Atul Mocc', 1, 1),
(2, 'Avinash Mocc', 2, 1),
(3, 'Lino Mocc', 3, 4),
(4, 'NandaKumar Mocc', 4, 1),
(5, 'Ranish Mocc', 5, 4),
(6, 'Bimal Mocc', 6, 4),
(7, 'Sinoy Mocc', 7, 4),
(8, 'Binoop Mocc', 8, 2),
(9, 'Lino Mocc', 9, 2),
(10, 'Vijesh MOCC', 10, 2),
(11, 'Sabarish MOCC', 11, 2),
(12, 'Hari  PCC', 12, 4),
(13, 'Raman PCC', 13, 4),
(14, 'Varun PCC', 14, 4),
(15, 'Vishal PCC', 15, 4),
(16, 'Srehari PCC', 16, 4),
(17, 'Appu PCC', 17, 4),
(18, 'Sreenadh Pcc', 18, 4),
(19, 'Akhil Pcc', 19, 1),
(20, 'KarthiK Pcc', 20, 1),
(21, 'Hari Pcc', 21, 1),
(22, 'Kiran Pcc', 22, 1),
(23, 'Surya', 23, 2),
(24, 'Achu', 24, 2);

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
(1, '/var/www/html/cricket/assets/images/user_icon1.png', '2017-09-24'),
(2, '/var/www/html/cricket/assets/images/user_icon1.png', '2017-09-24'),
(3, '/var/www/html/cricket/assets/images/user_icon1.png', '2017-09-24'),
(4, '/var/www/html/cricket/assets/images/user_icon1.png', '2017-09-24'),
(5, '/var/www/html/cricket/assets/images/user_icon1.png', '2017-09-24'),
(6, '/var/www/html/cricket/assets/images/user_icon1.png', '2017-09-24'),
(7, '/var/www/html/cricket/assets/images/user_icon1.png', '2017-09-24'),
(8, '/var/www/html/cricket/assets/images/user_icon1.png', '2017-09-24'),
(9, '/var/www/html/cricket/assets/images/user_icon1.png', '2017-09-24'),
(10, '/var/www/html/cricket/assets/images/user_icon1.png', '2017-09-24'),
(11, '/var/www/html/cricket/assets/images/user_icon1.png', '2017-09-24'),
(12, '/var/www/html/cricket/assets/images/user_icon1.png', '2017-09-24'),
(13, '/var/www/html/cricket/assets/images/user_icon1.png', '2017-09-24'),
(14, '/var/www/html/cricket/assets/images/user_icon1.png', '2017-09-24'),
(15, '/var/www/html/cricket/assets/images/user_icon1.png', '2017-09-24'),
(16, '/var/www/html/cricket/assets/images/user_icon1.png', '2017-09-24'),
(17, '/var/www/html/cricket/assets/images/user_icon1.png', '2017-09-24'),
(18, '/var/www/html/cricket/assets/images/user_icon1.png', '2017-09-24'),
(19, '/var/www/html/cricket/assets/images/user_icon1.png', '2017-09-24'),
(20, '/var/www/html/cricket/assets/images/user_icon1.png', '2017-09-24'),
(21, '/var/www/html/cricket/assets/images/user_icon1.png', '2017-09-24'),
(22, '/var/www/html/cricket/assets/images/user_icon1.png', '2017-09-24'),
(23, '/var/www/html/cricket/assets/images/user_icon1.png', '2017-09-24'),
(24, '/var/www/html/cricket/assets/images/user_icon1.png', '2017-09-24');

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
  `catches` int(11) NOT NULL,
  `season` varchar(200) NOT NULL
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
  MODIFY `details_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=37;
--
-- AUTO_INCREMENT for table `bowler_details`
--
ALTER TABLE `bowler_details`
  MODIFY `details_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=35;
--
-- AUTO_INCREMENT for table `login`
--
ALTER TABLE `login`
  MODIFY `login_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `matches`
--
ALTER TABLE `matches`
  MODIFY `match_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `match_batsman_details`
--
ALTER TABLE `match_batsman_details`
  MODIFY `match_batsman_id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `match_bowler_details`
--
ALTER TABLE `match_bowler_details`
  MODIFY `match_bowler_id` int(11) NOT NULL AUTO_INCREMENT;
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
  MODIFY `details_id` int(11) NOT NULL AUTO_INCREMENT;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

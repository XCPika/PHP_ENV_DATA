-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 07, 2020 at 02:42 PM
-- Server version: 10.4.11-MariaDB
-- PHP Version: 7.2.29

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `game_data`
--

-- --------------------------------------------------------

--
-- Table structure for table `creation`
--

CREATE TABLE `creation` (
  `id` int(11) NOT NULL,
  `small-1` varchar(400) NOT NULL,
  `text-1` text NOT NULL,
  `small-2` varchar(400) NOT NULL,
  `text-2` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `creation`
--

INSERT INTO `creation` (`id`, `small-1`, `text-1`, `small-2`, `text-2`) VALUES
(1, 'This was the first game I ever created!', 'Originally this game was only for PC but as a learning experience I tried to port it over to iOS (Successfully)', 'This game was made in Game Maker Studio 2', 'An amazing piece of software for introducing the concepts of game design in a manageable way, its just a shame not much of the knowledge is transferable as it relies heavily on pre-made functions like place_meeting(x,y,z) to test if there is a collision'),
(3, 'Orbital Defence was originally called Space Age!', 'Orbital Defence was originally made in Python as part of my college course but was later developed in Swift and remade as Orbital Defence (Space Age was taken D:)', 'A good way on learning something new', 'I was completely new to Swift and XCode when I started this game and by having a finished product to recreate I gave myself clear points to work towards and knowing what I wanted at the end made it easier to learn how to do in-depth parts of Swift without getting distracted or overwhelmed.');

-- --------------------------------------------------------

--
-- Table structure for table `games`
--

CREATE TABLE `games` (
  `id` int(11) NOT NULL,
  `title` varchar(60) NOT NULL,
  `descr` text NOT NULL,
  `image` varchar(100) NOT NULL,
  `platform` varchar(100) NOT NULL,
  `link` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `games`
--

INSERT INTO `games` (`id`, `title`, `descr`, `image`, `platform`, `link`) VALUES
(1, 'Platform Adventure', 'Meet Dave, help Dave bounce his way through 9 levels through three different worlds as you find new obstacles to overcome.\r\nThis is a retro inspired platformer, this means there are no save points!', 'platform_adventure.png', 'iOS and PC', 'https://apps.apple.com/us/app/platform-adventure/id1473953059'),
(2, 'Spirit Collector', 'You are trapped inside a dungeon and the only way to escape is to collect souls which seem to unlock the doors throughout the dungeon and try to make your way to freedom!\r\nEach level adds new skills that you need master as you make your way through the dungeon.', 'spirit_collector.png', 'iOS', 'https://apps.apple.com/bm/app/spirit-collector/id1473264874'),
(3, 'Orbital Defence', 'Fight your way through space to defend your planet from the oncoming enemy invasion.\r\nThis is a simple game designed to bring the nostalgia of old video games back on new devices.', 'orbital_defence.png', 'iOS (Variations available in Python)', 'https://apps.apple.com/om/app/orbital-defence/id1473008791');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `creation`
--
ALTER TABLE `creation`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `games`
--
ALTER TABLE `games`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `games`
--
ALTER TABLE `games`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

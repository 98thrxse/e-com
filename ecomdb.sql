-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 17, 2024 at 06:03 PM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `ecomdb`
--

-- --------------------------------------------------------

--
-- Table structure for table `store`
--

CREATE TABLE `store` (
  `id` int(11) NOT NULL,
  `name` text NOT NULL,
  `description` text NOT NULL,
  `price` double NOT NULL,
  `stock` int(11) NOT NULL,
  `image` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `store`
--

INSERT INTO `store` (`id`, `name`, `description`, `price`, `stock`, `image`) VALUES
(1, 'Grand Theft Auto: San Andreas', 'Step into a thrilling, classic gangster world where all holds are allowed. Beautiful and spoiled Los Santos is just waiting for its hero. Do you dare to become one?<br><br>Grand Theft Auto San Andreas is a classic, legendary production that has permanently entered the canon of video games. We play the role of Carl Johnson, who returns to his homeland again and sadly discovers that the neighborhood is not what it used to be. Former friendships have collapsed, the street\'s code of honor is collapsing, traitors lurk at every turn, and CJ is quickly framed for murder by corrupt cops. There is no other choice but to embark on a path whereby he will be able to clear his name and take righteous revenge. And it will be a long and bloody path.', 2301.67, 24, 'https://images.g2a.com/300x400/1x1x1/grand-theft-auto-san-andreas-steam-key-global-i10000004439009/5910bd32ae653a0c8c46962e'),
(2, 'Fable: The Lost Chapters', 'Fable is a groundbreaking roleplaying-adventure game from Peter Molyneux, in which your every action determines your skills, appearance, and reputation. Create your life story from childhood to death. Grow from an inexperienced adolescent into the most powerful being in the world. Choose the path of righteousness or dedicate your life to evil. Muscles expand with each feat of strength. Force of will increases with each work of wit. Obesity follows gluttony, and skin tans with exposure to sunlight and bleaches bone-white by moonlight. Earn scars in battle and lines of experience with age. Each person you aid, each flower you crush, and each creature you slay will change this world forever. Fable: Who will you be?', 498.49, 53, 'https://images.g2a.com/300x400/1x1x1/fable-the-lost-chapters-steam-key-global-i10000043886003/5910dacdae653a491b2fa82c'),
(3, 'Max Payne 2: The Fall of Max Payne', 'Max Payne 2: The Fall of Max Payne is a third-person shooter developed by Remedy Entertainment and released by Rockstar Games in 2003. The title is a sequel to the best-selling action video game from 2001, where the protagonist investigated the murder of his loved ones to uncover the drug mafia. Max Payne 2 is an excellent recommendation for fans of thrillers and suspense from the age of eighteen.', 216.37, 0, 'https://images.g2a.com/300x400/1x1x1/max-payne-2-the-fall-of-max-payne-steam-key-global-i10000032946013/5910e012ae653a549f57fd74');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `store`
--
ALTER TABLE `store`
  ADD PRIMARY KEY (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

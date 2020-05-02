-- phpMyAdmin SQL Dump
-- version 4.9.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 29, 2020 at 09:07 AM
-- Server version: 10.4.8-MariaDB
-- PHP Version: 7.3.11

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `musica`
--

-- --------------------------------------------------------

--
-- Table structure for table `albums`
--

CREATE TABLE `albums` (
  `id` int(11) NOT NULL,
  `title` varchar(250) COLLATE utf8_unicode_ci NOT NULL,
  `artist` int(11) NOT NULL,
  `genre` int(11) NOT NULL,
  `artworkPath` varchar(500) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `albums`
--

INSERT INTO `albums` (`id`, `title`, `artist`, `genre`, `artworkPath`) VALUES
(1, 'Resentment', 1, 7, 'assets/images/artwork/1.jpg'),
(2, 'Degenerates', 1, 5, 'assets/images/artwork/2.jpg'),
(3, 'Bad Vibrations', 1, 5, 'assets/images/artwork/3.jpg'),
(4, 'Homesick', 1, 5, 'assets/images/artwork/4.jpg'),
(5, 'Common Courtesy', 1, 5, 'assets/images/artwork/5.jpg'),
(6, 'Fashionably Late', 2, 9, 'assets/images/artwork/6.jpg'),
(7, 'Coming Home', 2, 9, 'assets/images/artwork/7.jpg'),
(8, 'Drugs', 2, 9, 'assets/images/artwork/8.jpg'),
(9, 'Popular Monster', 2, 9, 'assets/images/artwork/9.jpg'),
(10, 'The Drug In Me Is Reimagined', 2, 9, 'assets/images/artwork/10.jpg'),
(11, 'The Drug In Me Is You', 2, 9, 'assets/images/artwork/11.jpg'),
(12, 'Living Things', 3, 4, 'assets/images/artwork/12.jpg'),
(13, 'Minutes To Midnight', 3, 4, 'assets/images/artwork/13.jpg'),
(14, 'Hybrid Theory', 3, 4, 'assets/images/artwork/14.jpg'),
(15, 'Meteora', 3, 4, 'assets/images/artwork/15.jpg'),
(16, 'New Divide', 3, 4, 'assets/images/artwork/16.jpg'),
(17, 'Holy Hell', 4, 7, 'assets/images/artwork/17.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `artists`
--

CREATE TABLE `artists` (
  `id` int(11) NOT NULL,
  `name` varchar(50) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `artists`
--

INSERT INTO `artists` (`id`, `name`) VALUES
(1, 'A Day To Remember'),
(2, 'Falling In Reverse'),
(3, 'Linkin Park'),
(4, 'Architects'),
(5, 'Goofy');

-- --------------------------------------------------------

--
-- Table structure for table `genres`
--

CREATE TABLE `genres` (
  `id` int(11) NOT NULL,
  `name` varchar(50) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `genres`
--

INSERT INTO `genres` (`id`, `name`) VALUES
(1, 'Musical Theatre'),
(2, 'EDM'),
(3, 'Dubstep'),
(4, 'Nu Metal'),
(5, 'Rock'),
(6, 'Heavy Metal'),
(7, 'Metalcore'),
(8, 'Adrenaline'),
(9, 'Ronnie Radke'),
(10, 'Country');

-- --------------------------------------------------------

--
-- Table structure for table `playlists`
--

CREATE TABLE `playlists` (
  `id` int(11) NOT NULL,
  `name` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `owner` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `dateCreated` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `playlists`
--

INSERT INTO `playlists` (`id`, `name`, `owner`, `dateCreated`) VALUES
(1, 'Playlist One', 'DonaldTrump69', '2020-04-27 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `playlistsongs`
--

CREATE TABLE `playlistsongs` (
  `id` int(11) NOT NULL,
  `songId` int(11) NOT NULL,
  `playlistId` int(11) NOT NULL,
  `playlistOrder` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `playlistsongs`
--

INSERT INTO `playlistsongs` (`id`, `songId`, `playlistId`, `playlistOrder`) VALUES
(8, 17, 1, 0),
(9, 50, 1, 1),
(10, 46, 1, 2),
(11, 53, 1, 3),
(12, 38, 1, 4),
(13, 32, 1, 5),
(14, 6, 1, 6);

-- --------------------------------------------------------

--
-- Table structure for table `songs`
--

CREATE TABLE `songs` (
  `id` int(11) NOT NULL,
  `title` varchar(250) COLLATE utf8_unicode_ci NOT NULL,
  `artist` int(11) NOT NULL,
  `album` int(11) NOT NULL,
  `genre` int(11) NOT NULL,
  `duration` varchar(8) COLLATE utf8_unicode_ci NOT NULL,
  `path` varchar(500) COLLATE utf8_unicode_ci NOT NULL,
  `albumOrder` int(11) NOT NULL,
  `plays` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `songs`
--

INSERT INTO `songs` (`id`, `title`, `artist`, `album`, `genre`, `duration`, `path`, `albumOrder`, `plays`) VALUES
(1, 'Degenerates', 1, 2, 7, '3:07', 'assets/music/1/A Day To Remember - Degenerates.mp3', 1, 14),
(2, 'Forgive and Forget', 1, 3, 5, '4:42', 'assets/music/1/A Day To Remember - Forgive and Forget.mp3', 2, 11),
(3, 'Have Faith In Me', 1, 4, 5, '3:13', 'assets/music//1/A Day To Remember - Have Faith In Me.mp3', 3, 14),
(4, 'If It Means a Lot to You', 1, 4, 5, '2:02', 'assets/music/1/A Day To Remember - If It Means a Lot to You.mp3', 4, 7),
(5, 'Paranoia', 1, 3, 5, '1:29', 'assets/music/1/A Day To Remember - Paranoia.mp3', 5, 5),
(6, 'Resentment', 1, 1, 7, '4:04', 'assets/music/1/A Day To Remember - Resentment.mp3', 1, 17),
(7, 'Same Book But Never the Same Page', 1, 5, 5, '3:07', 'assets/music/1/A Day To Remember - Same Book But Never the Same Page.mp3', 2, 8),
(9, 'Alone', 2, 6, 9, '8:03', 'assets/music/2/Falling In Reverse - Alone.mp3', 3, 6),
(10, 'Champion', 2, 6, 9, '2:58', 'assets/music/2/Falling In Reverse - Champion.mp3', 3, 6),
(11, 'Drugs', 2, 8, 9, '2:59', 'assets/music/2/Falling In Reverse - Drugs.mp3', 4, 12),
(12, 'I Don\'t Mind', 2, 7, 9, '2:03', 'assets/music/2/Falling In Reverse - I Don\'t Mind.mp3', 5, 3),
(13, 'I\'m Not A Vampire', 2, 11, 9, '4:21', 'assets/music/2/Falling In Reverse - I\'m Not A Vampire.mp3', 5, 9),
(14, 'It\'s Over When It\'s Over', 2, 6, 9, '1:45', 'assets/music/2/Falling In Reverse - It\'s Over When It\'s Over.mp3', 4, 8),
(15, 'Losing My Life', 2, 8, 9, '1:44', 'assets/music/2/Falling In Reverse - Losing My Life.mp3', 3, 5),
(16, 'Losing My Mind', 2, 8, 9, '2:49', 'assets/music/2/Falling In Reverse - Losing My Mind.mp3', 2, 5),
(17, 'Popular Monster', 2, 9, 9, '3:50', 'assets/music/2/Falling In Reverse - Popular Monster.mp3', 1, 15),
(18, 'Rolling Stone - Shy Kidx Remix', 2, 6, 9, '2:43', 'assets/music/2/Falling In Reverse - Rolling Stone - Shy Kidx Remix.mp3', 5, 10),
(19, 'Rolling Stone', 2, 6, 9, '3:32', 'assets/music/2/Falling In Reverse - Rolling Stone.mp3', 4, 6),
(20, 'Superhero', 2, 7, 9, '4:58', 'assets/music/2/Falling In Reverse - Superhero.mp3', 3, 6),
(21, 'The Drug In Me Is Reimagined', 2, 10, 1, '2:42', 'assets/music/2/Falling In Reverse - The Drug In Me Is Reimagined.mp3', 2, 12),
(22, 'A Place for My Head', 3, 14, 4, '3:36', 'assets/music/3/Linkin Park - A Place for My Head.mp3', 1, 5),
(23, 'Bleed It Out', 3, 13, 4, '2:28', 'assets/music/3/Linkin Park - Bleed It Out.mp3', 1, 17),
(24, 'Breaking the Habit', 3, 15, 4, '4:44', 'assets/music/3/Linkin Park - Breaking the Habit.mp3', 2, 18),
(25, 'BURN IT DOWN', 3, 12, 4, '3:26', 'assets/music/3/Linkin Park - BURN IT DOWN.mp3', 3, 28),
(26, 'By Myself', 3, 14, 4, '2:20', 'assets/music/3/Linkin Park - By Myself.mp3', 4, 6),
(27, 'CASTLE OF GLASS', 3, 12, 4, '4:44', 'assets/music/3/Linkin Park - CASTLE OF GLASS.mp3', 5, 6),
(28, 'Crawling', 3, 14, 4, '3:32', 'assets/music/3/Linkin Park - Crawling.mp3', 4, 8),
(29, 'Don\'t Stay', 3, 15, 4, '4:58', 'assets/music/3/Linkin Park - Don\'t Stay.mp3', 3, 10),
(30, 'Easier to Run', 3, 15, 4, '2:42', 'assets/music/3/Linkin Park - Easier to Run.mp3', 2, 12),
(31, 'Faint', 3, 15, 4, '3:36', 'assets/music/3/Linkin Park - Faint.mp3', 1, 9),
(32, 'From the Inside', 3, 15, 4, '2:28', 'assets/music/3/Linkin Park - From the Inside.mp3', 1, 19),
(33, 'Given Up', 3, 13, 4, '4:44', 'assets/music/3/Linkin Park - Given Up.mp3', 2, 17),
(34, 'In The End', 3, 14, 4, '3:26', 'assets/music/3/Linkin Park - In The End.mp3', 3, 30),
(35, 'Leave Out All The Rest', 3, 13, 4, '2:20', 'assets/music/3/Linkin Park - Leave Out All The Rest.mp3', 4, 9),
(36, 'LOST IN THE ECHO', 3, 12, 4, '5:40', 'assets/music/3/Linkin Park - LOST IN THE ECHO.mp3', 3, 26),
(37, 'New Divide', 3, 16, 4, '2:43', 'assets/music/3/Linkin Park - New Divide.mp3', 5, 16),
(38, 'Numb', 3, 15, 4, '2:43', 'assets/music/3/Linkin Park - Numb.mp3', 5, 17),
(39, 'One Step Closer', 3, 14, 4, '3:32', 'assets/music/3/Linkin Park - One Step Closer.mp3', 4, 4),
(40, 'Papercut', 3, 14, 4, '4:58', 'assets/music/3/Linkin Park - Papercut.mp3', 3, 5),
(41, 'POWERLESS', 3, 12, 4, '2:42', 'assets/music/3/Linkin Park - POWERLESS.mp3', 2, 11),
(42, 'Pushing Me Away', 3, 14, 4, '3:36', 'assets/music/3/Linkin Park - Pushing Me Away.mp3', 1, 4),
(43, 'What I\'ve Done', 3, 13, 4, '2:28', 'assets/music/3/Linkin Park - What I\'ve Done.mp3', 1, 16),
(44, 'With You', 3, 14, 4, '4:44', 'assets/music/3/Linkin Park - With You.mp3', 2, 17),
(45, 'A Wasted Hymn', 4, 17, 7, '4:28', 'assets/music/4/Architects - A Wasted Hymn.mp3', 3, 25),
(46, 'Damnation', 4, 17, 7, '2:43', 'assets/music/4/Architects - Damnation.mp3', 2, 19),
(47, 'Death Is Not Defeat', 4, 17, 7, '3:32', 'assets/music/4/Architects - Death Is Not Defeat.mp3', 4, 8),
(48, 'Doomsday', 4, 17, 7, '4:58', 'assets/music/4/Architects - Doomsday.mp3', 3, 11),
(49, 'Dying To Heal', 4, 17, 7, '2:42', 'assets/music/4/Architects - Dying To Heal.mp3', 2, 14),
(50, 'Hereafter', 4, 17, 7, '3:36', 'assets/music/4/Architects - Hereafter.mp3', 1, 8),
(51, 'Holy Hell', 4, 17, 7, '2:28', 'assets/music/4/Architects - Holy Hell.mp3', 1, 22),
(52, 'Mortal After All', 4, 17, 7, '2:43', 'assets/music/4/Architects - Mortal After All.mp3', 5, 19),
(53, 'Royal Beggars', 4, 17, 7, '3:32', 'assets/music/4/Architects - Royal Beggars.mp3', 4, 33);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `username` varchar(25) COLLATE utf8_unicode_ci NOT NULL,
  `firstName` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `lastName` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `email` varchar(200) COLLATE utf8_unicode_ci NOT NULL,
  `password` varchar(32) COLLATE utf8_unicode_ci NOT NULL,
  `signUpDate` datetime NOT NULL,
  `profilePic` varchar(800) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `username`, `firstName`, `lastName`, `email`, `password`, `signUpDate`, `profilePic`) VALUES
(1, 'Admin', 'admin', 'root', 'admin@admin.admin', '21232f297a57a5a743894a0e4a801fc3', '2019-11-05 00:00:00', 'assets/images/profile_pics/head_emerald.png'),
(2, 'Djson0985', 'Yash Djson', 'Dookun', 'dookun88@gmail.com', 'eaff38f19a38e67a1a07dc3d8db649cd', '2019-11-05 00:00:00', 'assets/images/profile_pics/head_emerald.png'),
(3, 'DonaldTrump69', 'Donald', 'Trump', 'Donald.Trump69@gmail.com', '87f77988ccb5aa917c93201ba314fcd4', '2019-11-05 00:00:00', 'assets/images/profile_pics/head_emerald.png'),
(4, 'TestingAccount', 'test', 'testing', 'test@test.test', 'ae2b1fca515949e5d54fb22b8ed95575', '2019-12-10 00:00:00', 'assets/images/profile_pics/head_emerald.png'),
(5, 'TestingAccount2', 'Testing', 'Testing', 'testing@testing.testing', 'ae2b1fca515949e5d54fb22b8ed95575', '2019-12-10 00:00:00', 'assets/images/profile_pics/head_emerald.png');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `albums`
--
ALTER TABLE `albums`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `artists`
--
ALTER TABLE `artists`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `genres`
--
ALTER TABLE `genres`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `playlists`
--
ALTER TABLE `playlists`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `playlistsongs`
--
ALTER TABLE `playlistsongs`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `songs`
--
ALTER TABLE `songs`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `albums`
--
ALTER TABLE `albums`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `artists`
--
ALTER TABLE `artists`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `genres`
--
ALTER TABLE `genres`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `playlists`
--
ALTER TABLE `playlists`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `playlistsongs`
--
ALTER TABLE `playlistsongs`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `songs`
--
ALTER TABLE `songs`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=54;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

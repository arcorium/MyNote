-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 19, 2022 at 06:00 PM
-- Server version: 10.4.22-MariaDB
-- PHP Version: 8.1.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `mynote`
--

-- --------------------------------------------------------

--
-- Table structure for table `books`
--

CREATE TABLE `books` (
  `book_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `book_path` varchar(256) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `day`
--

CREATE TABLE `day` (
  `day_id` int(11) NOT NULL,
  `day` varchar(16) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `day`
--

INSERT INTO `day` (`day_id`, `day`) VALUES
(1, 'Sunday'),
(2, 'Monday'),
(3, 'Tuesday'),
(4, 'Wednesday'),
(5, 'Thursday'),
(6, 'Friday'),
(7, 'Saturday');

-- --------------------------------------------------------

--
-- Table structure for table `jadwal_pelajaran`
--

CREATE TABLE `jadwal_pelajaran` (
  `jadwal_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `nama_jadwal` varchar(64) NOT NULL,
  `day_id` int(11) NOT NULL,
  `waktu_mulai` time NOT NULL,
  `waktu_selesai` time NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `jadwal_pelajaran`
--

INSERT INTO `jadwal_pelajaran` (`jadwal_id`, `user_id`, `nama_jadwal`, `day_id`, `waktu_mulai`, `waktu_selesai`) VALUES
(1, 1, 'tataboga', 1, '12:00:00', '13:00:00'),
(2, 1, 'TIK', 2, '11:00:00', '13:00:00'),
(6, 1, 'Cangs', 7, '08:00:00', '09:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `note`
--

CREATE TABLE `note` (
  `note_id` int(11) NOT NULL,
  `jadwal_id` int(11) NOT NULL,
  `judul` varchar(64) NOT NULL,
  `value` mediumtext NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `note`
--

INSERT INTO `note` (`note_id`, `jadwal_id`, `judul`, `value`) VALUES
(1, 1, 'resep indomie', '1.ula\r\n2.ula\r\n3.ula');

-- --------------------------------------------------------

--
-- Table structure for table `todolist`
--

CREATE TABLE `todolist` (
  `list_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `value` varchar(512) NOT NULL,
  `deadline` datetime NOT NULL,
  `is_finished` tinyint(4) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `todolist`
--

INSERT INTO `todolist` (`list_id`, `user_id`, `value`, `deadline`, `is_finished`) VALUES
(1, 1, 'hahahahahahahaha', '2022-05-31 21:02:25', 0);

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `user_id` int(11) NOT NULL,
  `username` varchar(256) NOT NULL,
  `email` varchar(128) NOT NULL,
  `password` varchar(256) NOT NULL,
  `created_at` datetime NOT NULL DEFAULT current_timestamp(),
  `last_login` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`user_id`, `username`, `email`, `password`, `created_at`, `last_login`) VALUES
(1, 'mizhan', 'mizhan@gmail.com', 'mizhan123', '2022-05-30 21:01:50', '2022-06-19 22:18:36'),
(2, 'huala', 'huala@gmail.com', 'hoala', '2022-05-30 23:10:18', '2022-05-30 23:30:44'),
(12, 'kola', 'kola@gmail.com', 'kola', '2022-05-31 09:29:00', '2022-05-31 09:29:05'),
(13, 'asd', '', 'asd', '2022-06-19 12:41:52', '2022-06-19 13:40:22'),
(14, 'Arcorium', 'mizzhan.ar@gmail.com', '123', '2022-06-19 12:55:23', '2022-06-19 12:55:23'),
(15, 'cxz', 'ayam.ruyuk1@gmail.com', 'zxc', '2022-06-19 13:16:19', '2022-06-19 13:16:19'),
(16, 'ccc', 'asd@asdas.c', 'ccd', '2022-06-19 13:16:46', '2022-06-19 13:16:46'),
(17, 'qqq', '20081010116@student.upnjatim.ac.id', 'q', '2022-06-19 13:17:45', '2022-06-19 13:17:45');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `books`
--
ALTER TABLE `books`
  ADD PRIMARY KEY (`book_id`);

--
-- Indexes for table `day`
--
ALTER TABLE `day`
  ADD PRIMARY KEY (`day_id`);

--
-- Indexes for table `jadwal_pelajaran`
--
ALTER TABLE `jadwal_pelajaran`
  ADD PRIMARY KEY (`jadwal_id`);

--
-- Indexes for table `note`
--
ALTER TABLE `note`
  ADD PRIMARY KEY (`note_id`);

--
-- Indexes for table `todolist`
--
ALTER TABLE `todolist`
  ADD PRIMARY KEY (`list_id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`user_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `books`
--
ALTER TABLE `books`
  MODIFY `book_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `day`
--
ALTER TABLE `day`
  MODIFY `day_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `jadwal_pelajaran`
--
ALTER TABLE `jadwal_pelajaran`
  MODIFY `jadwal_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `note`
--
ALTER TABLE `note`
  MODIFY `note_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `todolist`
--
ALTER TABLE `todolist`
  MODIFY `list_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

-- phpMyAdmin SQL Dump
-- version 5.1.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Sep 08, 2021 at 06:32 PM
-- Server version: 10.4.19-MariaDB
-- PHP Version: 8.0.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `quizdb`
--

-- --------------------------------------------------------

--
-- Table structure for table `quiz`
--

CREATE TABLE `quiz` (
  `id` int(11) NOT NULL,
  `question` varchar(255) NOT NULL,
  `option_a` varchar(255) NOT NULL,
  `option_b` varchar(255) NOT NULL,
  `option_c` varchar(255) NOT NULL,
  `option_d` varchar(255) NOT NULL,
  `answer` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `quiz`
--

INSERT INTO `quiz` (`id`, `question`, `option_a`, `option_b`, `option_c`, `option_d`, `answer`) VALUES
(1, 'What do you use the most?', 'Facebook', 'Whatsapp', 'Youtube', 'Instagram', 'c'),
(2, 'What is your favourite colour?', 'Red', 'Green', 'Blue', 'Yellow', 'd'),
(3, 'What do you like to do in free time?', 'Like to go Gym', 'Love Shopping', 'Go for a Movie', 'Go for a Road Trip', 'b'),
(4, 'What is more important to you?\r\n', 'Money', 'Love', 'Friends & Family', 'Career', 'a');

-- --------------------------------------------------------

--
-- Table structure for table `student_report`
--

CREATE TABLE `student_report` (
  `id` int(11) NOT NULL,
  `qu_id` varchar(255) NOT NULL,
  `student_answer` varchar(255) NOT NULL,
  `user_id` int(11) NOT NULL,
  `review_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `student_report`
--

INSERT INTO `student_report` (`id`, `qu_id`, `student_answer`, `user_id`, `review_id`) VALUES
(1, '1', 'Whatsapp', 29, 0),
(2, '2', 'Yellow', 29, 0),
(3, '3', 'Love Shopping', 29, 0),
(4, '4', 'Love', 29, 0);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`) VALUES
(1, 'naveen', 'naveen@ubuy.com'),
(2, 'ravi', 'ravi@gmail.com'),
(3, 'umes', 'umesh@gmail.com'),
(4, 'ram', 'madhu@gmail.com'),
(5, 'ewwe', 'naveen.rathore@ubuy.com'),
(6, 'prince', 'prince@ubuy.com'),
(7, 'ram', 'ramest@gmail.com'),
(8, 'root', 'root@gmail.com'),
(9, 'rrrr', 'rrr@gmail.com'),
(10, 'hersh', 'hersh@gmail.com'),
(11, 'erewr', 'ewrew@gmail.com'),
(12, 'sita', 'sita@gmail.com'),
(13, 'dfe', 'efef@gam'),
(14, 'naveen', 'erwer@gm'),
(15, '4234', 'ewrw@gm'),
(16, 'erw', 'ewrr@gm'),
(17, 'tttttt', 'tttt@gmai'),
(18, 'saf', 'naveensarawa@gm'),
(19, 'naveen', 'ere@gm'),
(20, 'rrrrrrrrrr', 'rrrrrrrrr@gm'),
(21, 'naveen', 'rwerwe@gmail.com'),
(22, 'uuuuu', 'uuuu@gmail.com'),
(23, 'jay', 'hay@gmail.com'),
(24, 'nannna', 'nanan@gmail.com'),
(25, 'tttt', 'tt@gmail.com'),
(26, 'ooooo', 'oooo@gmail.com'),
(27, 'uuu', 'uuu@gmail.com'),
(28, 'iiiiii', 'iiiiiii@gmail.com'),
(29, 'naveensarawa', '4444@gm'),
(30, '444', '4343@gmail.com');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `quiz`
--
ALTER TABLE `quiz`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `student_report`
--
ALTER TABLE `student_report`
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
-- AUTO_INCREMENT for table `quiz`
--
ALTER TABLE `quiz`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `student_report`
--
ALTER TABLE `student_report`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

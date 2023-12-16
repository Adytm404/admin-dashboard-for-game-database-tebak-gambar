-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 16, 2023 at 11:31 AM
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
-- Database: `siswahos_tubesmobile`
--

-- --------------------------------------------------------

--
-- Table structure for table `games`
--

CREATE TABLE `games` (
  `id` int(11) NOT NULL,
  `level` varchar(250) NOT NULL,
  `file` varchar(250) NOT NULL,
  `answer` varchar(250) NOT NULL,
  `description` varchar(250) NOT NULL,
  `create_at` date NOT NULL DEFAULT current_timestamp(),
  `update_at` date NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `games`
--

INSERT INTO `games` (`id`, `level`, `file`, `answer`, `description`, `create_at`, `update_at`) VALUES
(10, '1', 'localhost:8888/images/prambanan.jpg', 'prambanan', 'candi tersebut memiliki nama candi _ R _ _ _ _ _ _ N', '2023-12-16', '2023-12-16'),
(11, '2', 'localhost:8888/images/monas.jpeg', 'monas', 'Gambar tersebut merupakan icon dari jakarta _ O _ _ S', '2023-12-16', '2023-12-16'),
(12, '3', 'localhost:8888/images/borobudur.jpg', 'borobudur', 'gambar tersebut merupakan icon dari Magelang B _ _ _ _ U _ _ R', '2023-12-16', '2023-12-16'),
(13, '4', 'localhost:8888/images/9c5666031f832fa1cfe85c75dd40bcca090f6ff560a8b431128ce9d4c7f8501f.jpg', 'gedung sate', 'Sering menjadi destinasi wisata dan berada di Bandung _ _ _ _ _ _  _ _ _ _', '2023-12-16', '2023-12-16');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(50) NOT NULL,
  `name` varchar(250) NOT NULL,
  `password` varchar(250) NOT NULL,
  `apikey` varchar(250) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `password`, `apikey`) VALUES
(1, 'admin', 'a2FtdW5hbnlhPw==', 'QDMyMU5ld0FjY291bnQxMDI5MzgxMzI=');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `games`
--
ALTER TABLE `games`
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
-- AUTO_INCREMENT for table `games`
--
ALTER TABLE `games`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(50) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

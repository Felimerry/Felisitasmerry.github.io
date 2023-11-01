-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 01, 2023 at 03:42 AM
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
-- Database: `users`
--

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `role` enum('admin','user') NOT NULL,
  `username` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `role`, `username`, `password`) VALUES
(1, 'admin', 'admin', '$2y$10$t2ULPjj9ezBZLWaPPjaDPu7oTdZ9QRExL5vT9WqXF8jkV4M2dI.OW'),
(2, 'user', 'asep', '$2y$10$2r8Aim.KroMuIBGBVeHEoug7qg5P4ce8PSn2TkZQf.IR2P7rOKnSS'),
(3, 'user', 'budi', '$2y$10$gELv1kC606Fxg0jsz3FYiuyFpwrXSALu9tLKEgtyFhMrYQgFVOcGW'),
(4, 'user', 'x', '$2y$10$h208nVGK2T7mRtjKsrJFZe087GQetUK.5GXlGchrC0KK2IN9Ju1c2'),
(5, 'user', 'a', '$2y$10$m8izPgp2FRhTRL0HubwUEe/ZFV/IoaXnfYTiygNRdLD6RaZ6HaTIO'),
(6, 'user', 'meri', '$2y$10$S1gWL9KeRCBsK3Fr.zwbb.4NSW5qjmI4j7N5Gd8BmdMw8PyXEOAF.');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

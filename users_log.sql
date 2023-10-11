-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Oct 11, 2023 at 06:20 AM
-- Server version: 10.4.27-MariaDB
-- PHP Version: 7.4.33

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_kas`
--

-- --------------------------------------------------------

--
-- Table structure for table `users_log`
--

CREATE TABLE `users_log` (
  `email` varchar(256) NOT NULL,
  `status` int(11) NOT NULL,
  `created` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `users_log`
--

INSERT INTO `users_log` (`email`, `status`, `created`) VALUES
('dsadi@astra-agro.co.id', 1, '2023-10-11 01:28:15'),
('dsadi@astra-agro.co.id', 1, '2023-10-11 01:28:42'),
('dsadi@astra-agro.co.id', 1, '2023-10-11 01:33:30'),
('dsadi@astra-agro.co.id', 1, '2023-10-11 01:33:51'),
('dsadi@astra-agro.co.id', 1, '2023-10-11 01:34:48'),
('dsadi@astra-agro.co.id', 1, '2023-10-11 01:35:05'),
('dsadi@astra-agro.co.id', 1, '2023-10-11 01:35:47'),
('dsadi@astra-agro.co.id', 1, '2023-10-11 01:36:28'),
('dsadi@astra-agro.co.id', 1, '2023-10-11 01:38:06'),
('dsadi@astra-agro.co.id', 0, '2023-10-11 01:38:19'),
('dsadi@astra-agro.co.id', 0, '2023-10-11 01:38:29'),
('dsadi@astra-agro.co.id', 0, '2023-10-11 01:49:28'),
('dsadi@astra-agro.co.id', 0, '2023-10-11 01:51:17'),
('dsadi@astra-agro.co.id', 0, '2023-10-11 01:51:23'),
('dsadi@astra-agro.co.id', 0, '2023-10-11 01:51:28'),
('dsadi@astra-agro.co.id', 0, '2023-10-11 01:51:33'),
('dsadi@astra-agro.co.id', 0, '2023-10-11 01:51:38'),
('dsadi@astra-agro.co.id', 0, '2023-10-11 02:10:13'),
('dsadi@astra-agro.co.id', 0, '2023-10-11 02:13:02'),
('dsadi@astra-agro.co.id', 0, '2023-10-11 02:16:03'),
('dsadi@astra-agro.co.id', 0, '2023-10-11 02:32:10'),
('dsadi@astra-agro.co.id', 0, '2023-10-11 02:32:17'),
('dsadi@astra-agro.co.id', 0, '2023-10-11 02:33:18'),
('dsadi@astra-agro.co.id', 0, '2023-10-11 02:33:31'),
('dsadi@astra-agro.co.id', 0, '2023-10-11 02:33:37'),
('dsadi@astra-agro.co.id', 0, '2023-10-11 02:34:15'),
('dsadi@astra-agro.co.id', 0, '2023-10-11 02:34:21'),
('dsadi@astra-agro.co.id', 0, '2023-10-11 02:34:29'),
('dsadi@astra-agro.co.id', 0, '2023-10-11 02:34:39'),
('dsadi@astra-agro.co.id', 0, '2023-10-11 02:34:46'),
('dsadi@astra-agro.co.id', 0, '2023-10-11 02:35:49'),
('dsadi@astra-agro.co.id', 0, '2023-10-11 02:35:49'),
('dsadi@astra-agro.co.id', 0, '2023-10-11 02:36:10'),
('dsadi@astra-agro.co.id', 0, '2023-10-11 02:36:10'),
('dsadi@astra-agro.co.id', 0, '2023-10-11 02:36:14'),
('dsadi@astra-agro.co.id', 0, '2023-10-11 02:36:14'),
('dsadi@astra-agro.co.id', 0, '2023-10-11 02:36:20'),
('dsadi@astra-agro.co.id', 0, '2023-10-11 02:36:20'),
('dsadi@astra-agro.co.id', 0, '2023-10-11 02:40:07'),
('dsadi@astra-agro.co.id', 0, '2023-10-11 02:40:15'),
('dsadi@astra-agro.co.id', 0, '2023-10-11 02:40:39'),
('dsadi@astra-agro.co.id', 0, '2023-10-11 02:41:19'),
('dsadi@astra-agro.co.id', 0, '2023-10-11 02:41:24'),
('dsadi@astra-agro.co.id', 0, '2023-10-11 02:41:27'),
('dsadi@astra-agro.co.id', 0, '2023-10-11 02:46:34'),
('dsadi@astra-agro.co.id', 0, '2023-10-11 02:46:39'),
('dsadi@astra-agro.co.id', 0, '2023-10-11 02:50:14'),
('dsadi@astra-agro.co.id', 0, '2023-10-11 02:55:31'),
('dsadi@astra-agro.co.id', 0, '2023-10-11 02:55:47'),
('dsadi@astra-agro.co.id', 0, '2023-10-11 02:56:09'),
('dsadi@astra-agro.co.id', 0, '2023-10-11 02:56:41'),
('dsadi@astra-agro.co.id', 0, '2023-10-11 02:56:54'),
('dsadi@astra-agro.co.id', 0, '2023-10-11 02:59:51'),
('dsadi@astra-agro.co.id', 0, '2023-10-11 03:00:23'),
('dsadi@astra-agro.co.id', 0, '2023-10-11 03:00:50'),
('dsadi@astra-agro.co.id', 0, '2023-10-11 03:20:03'),
('dsadi@astra-agro.co.id', 0, '2023-10-11 03:20:23'),
('dsadi@astra-agro.co.id', 0, '2023-10-11 03:20:34'),
('dsadi@astra-agro.co.id', 0, '2023-10-11 03:21:02'),
('dsadi@astra-agro.co.id', 0, '2023-10-11 03:25:59'),
('dsadi@astra-agro.co.id', 0, '2023-10-11 03:26:27'),
('dsadi@astra-agro.co.id', 0, '2023-10-11 03:27:29'),
('dsadi@astra-agro.co.id', 0, '2023-10-11 03:40:19'),
('dsadi@astra-agro.co.id', 0, '2023-10-11 03:42:26'),
('dsadi@astra-agro.co.id', 0, '2023-10-11 03:47:03'),
('dsadi@astra-agro.co.id', 0, '2023-10-11 03:49:18'),
('dsadi@astra-agro.co.id', 0, '2023-10-11 03:49:23'),
('dsadi@astra-agro.co.id', 0, '2023-10-11 03:50:25'),
('dsadi@astra-agro.co.id', 0, '2023-10-11 03:50:34'),
('dsadi@astra-agro.co.id', 0, '2023-10-11 03:50:34'),
('dsadi@astra-agro.co.id', 0, '2023-10-11 03:50:43'),
('dsadi@astra-agro.co.id', 0, '2023-10-11 03:50:43'),
('dsadi@astra-agro.co.id', 0, '2023-10-11 03:51:19'),
('dsadi@astra-agro.co.id', 0, '2023-10-11 03:55:43'),
('dsadi@astra-agro.co.id', 0, '2023-10-11 03:56:22'),
('dsadi@astra-agro.co.id', 0, '2023-10-11 03:56:50'),
('dsadi@astra-agro.co.id', 0, '2023-10-11 03:56:56'),
('dsadi@astra-agro.co.id', 0, '2023-10-11 03:57:55'),
('dsadi@astra-agro.co.id', 0, '2023-10-11 03:58:22'),
('dsadi@astra-agro.co.id', 0, '2023-10-11 03:58:36'),
('dsadi@astra-agro.co.id', 0, '2023-10-11 03:59:18'),
('dsadi@astra-agro.co.id', 0, '2023-10-11 03:59:23'),
('dsadi@astra-agro.co.id', 0, '2023-10-11 03:59:29'),
('dsadi@astra-agro.co.id', 0, '2023-10-11 04:00:08'),
('dsadi@astra-agro.co.id', 0, '2023-10-11 04:07:27'),
('dsadi@astra-agro.co.id', 0, '2023-10-11 04:07:52'),
('dsadi@astra-agro.co.id', 0, '2023-10-11 04:08:10'),
('dsadi@astra-agro.co.id', 0, '2023-10-11 04:10:19');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

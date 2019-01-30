-- phpMyAdmin SQL Dump
-- version 4.7.0
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Jan 30, 2019 at 12:26 PM
-- Server version: 10.1.25-MariaDB
-- PHP Version: 5.6.31

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `emp_records`
--

-- --------------------------------------------------------

--
-- Table structure for table `employee_tbl`
--

CREATE TABLE `employee_tbl` (
  `id` int(11) NOT NULL,
  `emp_id` int(11) NOT NULL,
  `emp_name` varchar(100) NOT NULL,
  `phone` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `dob` varchar(100) NOT NULL,
  `address` text NOT NULL,
  `joining_date` varchar(100) NOT NULL,
  `designation` varchar(100) NOT NULL,
  `status` varchar(10) NOT NULL,
  `leaving_date` varchar(100) NOT NULL,
  `photo` varchar(200) NOT NULL,
  `created_at` varchar(100) NOT NULL,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `employee_tbl`
--

INSERT INTO `employee_tbl` (`id`, `emp_id`, `emp_name`, `phone`, `email`, `dob`, `address`, `joining_date`, `designation`, `status`, `leaving_date`, `photo`, `created_at`, `updated_at`) VALUES
(1, 3036, 'AB UNTAL', '8722222996', 'arjun.provabmail@gmail.com', '31/01', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry.', '18/12', 'Software Engineer', '1', '12', 'ab.jpg', '30-01-2019 04:14:33', '2019-01-30 11:09:56'),
(2, 3037, 'emp_1', '8722222996', 'emp_1@gmail.com', '30/01', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. ', '', '', '1', '', 'avatar.jpg', '28/01/208', '2019-01-30 11:19:11'),
(3, 3038, 'emp_4', '8722222996', 'arjun.provabmail@gmail.com', '21/01', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. ', '', '', '0', '', 'Couple-on-a-Alleppey-honeymoon-houseboat-in-Kerala-acj21042017.jpg', '29-01-2019 04:35:36', '2019-01-30 11:23:13'),
(4, 3039, 'Emp_3', '8722222996', 'utnal.ab@gmail.com', '29/01', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry.', '', '', '0', '', 'alleppey-backwater-tour.jpg', '29-01-2019 04:50:49', '2019-01-30 11:23:14'),
(8, 3040, 'emp_name', '8722222996', 'emp@gmail.com', '12/02', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry.', '12', '', '1', '', 'ab.jpg', '', '2019-01-30 11:09:03'),
(9, 3040, 'emp_name', '8722222996', 'emp@gmail.com', '12/02', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry.', '12', '', '1', '', 'ab.jpg', '', '2019-01-30 09:51:59'),
(10, 3043, 'emp_name', '8722222996', 'emp@gmail.com', '12/02', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry.', '12', '', '1', '', 'ab.jpg', '', '2019-01-30 09:52:00'),
(11, 3044, 'emp_name', '8722222996', 'emp@gmail.com', '12/02', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry.', '12', '', '1', '', 'ab.jpg', '', '2019-01-30 11:08:57'),
(12, 3045, 'emp_name', '8722222996', 'emp@gmail.com', '12/02', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry.', '12', '', '1', '', 'ab.jpg', '', '2019-01-30 09:52:01'),
(13, 3047, 'emp_name', '8722222996', 'emp@gmail.com', '12/02', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry.', '12', '', '1', '', 'ab.jpg', '', '2019-01-30 09:52:06'),
(14, 3048, 'emp_name', '8722222996', 'emp@gmail.com', '12/02', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry.', '12', '', '', '', 'ab.jpg', '', '2019-01-30 09:49:50'),
(15, 3040, 'emp_name', '8722222996', 'emp@gmail.com', '12/02', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry.', '12', '', '1', '', 'ab.jpg', '', '2019-01-30 09:52:03');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `employee_tbl`
--
ALTER TABLE `employee_tbl`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `employee_tbl`
--
ALTER TABLE `employee_tbl`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

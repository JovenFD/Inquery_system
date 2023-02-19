-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Feb 19, 2023 at 06:07 PM
-- Server version: 10.4.27-MariaDB
-- PHP Version: 8.0.25

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_iquery_system`
--

-- --------------------------------------------------------

--
-- Table structure for table `tbl_apt_form`
--

CREATE TABLE `tbl_apt_form` (
  `apt_id` int(11) NOT NULL,
  `post_id` int(11) NOT NULL,
  `apt_pitch` longtext NOT NULL,
  `apt_file` int(11) NOT NULL,
  `apt_created_date` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_branches`
--

CREATE TABLE `tbl_branches` (
  `branches_id` int(11) NOT NULL,
  `branches_name` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tbl_branches`
--

INSERT INTO `tbl_branches` (`branches_id`, `branches_name`) VALUES
(14, 'Frabelle Fishing Corporation'),
(15, 'Frabelle Cold Storage Corporation'),
(16, 'Eona Canning and Food Processing Corporation'),
(17, 'Westpac Meat Processing Corp.'),
(18, 'Frabelle Shipyard Corporation');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_chatbot`
--

CREATE TABLE `tbl_chatbot` (
  `chat_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_post`
--

CREATE TABLE `tbl_post` (
  `post_id` int(11) NOT NULL,
  `branches_id` int(11) NOT NULL,
  `postions_id` int(11) NOT NULL,
  `job_descriptions` longtext NOT NULL,
  `expect_salary` text NOT NULL,
  `salary_type` text NOT NULL,
  `ks_needed` text NOT NULL,
  `p_address` text NOT NULL,
  `p_email` text NOT NULL,
  `p_created_date` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tbl_post`
--

INSERT INTO `tbl_post` (`post_id`, `branches_id`, `postions_id`, `job_descriptions`, `expect_salary`, `salary_type`, `ks_needed`, `p_address`, `p_email`, `p_created_date`) VALUES
(1, 18, 22, 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.', '600', 'Weekly', '<ul><li>Honest</li><li>Hardworking</li><li>computer literate</li></ul>', 'North Bay, Navotas City', 'frabellecorp@gmail.com', '2023-02-18 21:45:23'),
(2, 18, 21, 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.', '800', 'Weekly', '<ul><li>Honest</li><li>Hardworking</li><li>computer literate</li><li>Good Communication skills</li></ul>', 'North Bay, Navotas City', 'frabellecorp@gmail.com', '2023-02-19 16:22:20');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_postions`
--

CREATE TABLE `tbl_postions` (
  `positions_id` int(11) NOT NULL,
  `position_name` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tbl_postions`
--

INSERT INTO `tbl_postions` (`positions_id`, `position_name`) VALUES
(19, 'Data Encoder'),
(20, 'Merchandiser'),
(21, 'Accountant'),
(22, 'Logistics Checker');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_user`
--

CREATE TABLE `tbl_user` (
  `user_id` int(11) NOT NULL,
  `fname` text NOT NULL,
  `lname` text NOT NULL,
  `username` text NOT NULL,
  `password` text NOT NULL,
  `email` text NOT NULL,
  `dob` text NOT NULL,
  `gender` text NOT NULL,
  `usertype` int(11) NOT NULL,
  `create_u_date` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `u_avatar` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tbl_user`
--

INSERT INTO `tbl_user` (`user_id`, `fname`, `lname`, `username`, `password`, `email`, `dob`, `gender`, `usertype`, `create_u_date`, `u_avatar`) VALUES
(15, 'John', 'Doe-user', 'user', '21232f297a57a5a743894a0e4a801fc3', 'user@gmail.com', '2023-02-17', 'Male', 1, '2023-02-18 16:18:27', 'avatar_0.52590100 1676736537.png'),
(18, 'John', 'Doe -admin', 'admin', '21232f297a57a5a743894a0e4a801fc3', 'admin@gmail.com', '2023-02-23', 'Male', 0, '2023-02-19 09:53:33', 'avatar_0.08292600 1676800413.png'),
(22, 'subadmin', 'admin -sub10', 'subadmin', 'abdb392f09c7376fe5ce059f045de38b', 'subadmin@gmail.com', 'No Dob', 'No Gender', 2, '2023-02-19 12:19:39', 'avatar_0.44117100 1676809179.PNG'),
(23, 'subadmin fname', 'subadmin lname', 'subadmin01', 'adcb673c8c99cfd3c433466921163bfa', 'fname@gmail.com', 'No Dob', 'No Gender', 2, '2023-02-19 12:27:24', 'avatar_0.02445800 1676809644.png'),
(24, 'user', 'user', 'user', 'ee11cbb19052e40b07aac0ca060c23ee', 'user@gmail.com', '2023-03-02', 'Female', 1, '2023-02-19 12:41:46', 'avatar.png');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tbl_apt_form`
--
ALTER TABLE `tbl_apt_form`
  ADD PRIMARY KEY (`apt_id`);

--
-- Indexes for table `tbl_branches`
--
ALTER TABLE `tbl_branches`
  ADD PRIMARY KEY (`branches_id`);

--
-- Indexes for table `tbl_chatbot`
--
ALTER TABLE `tbl_chatbot`
  ADD PRIMARY KEY (`chat_id`);

--
-- Indexes for table `tbl_post`
--
ALTER TABLE `tbl_post`
  ADD PRIMARY KEY (`post_id`);

--
-- Indexes for table `tbl_postions`
--
ALTER TABLE `tbl_postions`
  ADD PRIMARY KEY (`positions_id`);

--
-- Indexes for table `tbl_user`
--
ALTER TABLE `tbl_user`
  ADD PRIMARY KEY (`user_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tbl_apt_form`
--
ALTER TABLE `tbl_apt_form`
  MODIFY `apt_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tbl_branches`
--
ALTER TABLE `tbl_branches`
  MODIFY `branches_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT for table `tbl_chatbot`
--
ALTER TABLE `tbl_chatbot`
  MODIFY `chat_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tbl_post`
--
ALTER TABLE `tbl_post`
  MODIFY `post_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `tbl_postions`
--
ALTER TABLE `tbl_postions`
  MODIFY `positions_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT for table `tbl_user`
--
ALTER TABLE `tbl_user`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

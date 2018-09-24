-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Sep 07, 2018 at 12:34 AM
-- Server version: 10.1.13-MariaDB
-- PHP Version: 7.0.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `cfu`
--

-- --------------------------------------------------------

--
-- Table structure for table `docs`
--

CREATE TABLE `docs` (
  `d_id` int(10) NOT NULL,
  `u_id` int(11) NOT NULL,
  `school` varchar(50) NOT NULL,
  `degree` varchar(50) NOT NULL,
  `grade` varchar(10) NOT NULL,
  `stream` varchar(50) NOT NULL,
  `file` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `faq`
--

CREATE TABLE `faq` (
  `id` int(11) NOT NULL,
  `ques` mediumtext NOT NULL,
  `ans` blob NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `faq`
--

INSERT INTO `faq` (`id`, `ques`, `ans`) VALUES
(0, 'Hello', 0x3c703e746869732069732073616d706c6520746578742066696c653c2f703e0d0a),
(0, 'Who can Join?', 0x3c703e416e79626f64792077686f2069732031382b3c2f703e0d0a);

-- --------------------------------------------------------

--
-- Table structure for table `final_paid`
--

CREATE TABLE `final_paid` (
  `id` int(11) NOT NULL,
  `u_id` int(11) NOT NULL,
  `trans_id` varchar(200) NOT NULL,
  `status` varchar(50) NOT NULL,
  `amount` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `final_paid`
--

INSERT INTO `final_paid` (`id`, `u_id`, `trans_id`, `status`, `amount`) VALUES
(1, 32, '', '', ''),
(4, 70, '', '', '');

-- --------------------------------------------------------

--
-- Table structure for table `guest`
--

CREATE TABLE `guest` (
  `id` int(11) NOT NULL,
  `name` varchar(50) NOT NULL,
  `phone` text NOT NULL,
  `email` varchar(100) NOT NULL,
  `query` mediumtext NOT NULL,
  `join_date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `guest`
--

INSERT INTO `guest` (`id`, `name`, `phone`, `email`, `query`, `join_date`) VALUES
(11, 'Saumay Paul', '7002038132', 'saumaypaul20@gmail.com', 'fghfghfghfgh', '2018-09-01');

-- --------------------------------------------------------

--
-- Table structure for table `news`
--

CREATE TABLE `news` (
  `news_id` int(11) NOT NULL,
  `title` varchar(200) NOT NULL,
  `des` blob NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `news`
--

INSERT INTO `news` (`news_id`, `title`, `des`) VALUES
(14, ' Hello Dummy Hello Dummy Hello Dummy Hello Dummy Hello Dummy', 0x3c703e3c7374726f6e673e49747320612064756d6d792046696c653a3c2f7374726f6e673e204465736372697074696f6e20686572653c6272202f3e0d0a3c7374726f6e673e44554d4d5920403a203c2f7374726f6e673e4841484148413c2f703e0d0a),
(15, 'Dummy 2 Dummy 2 Dummy 2', 0x3c703e48656c6c6f204e6f6577732069732068726565723c2f703e0d0a);

-- --------------------------------------------------------

--
-- Table structure for table `placed`
--

CREATE TABLE `placed` (
  `c_id` int(11) NOT NULL,
  `name` varchar(50) NOT NULL,
  `speech` longtext NOT NULL,
  `photo` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `placed`
--

INSERT INTO `placed` (`c_id`, `name`, `speech`, `photo`) VALUES
(1, 'Roni', 'sdsad kjghdskfhkds hsdfkjd lkjsfjsaf lkjs lhshdfj hsfkhfs kjahfkshdsf kjhlDS hfj ksahsa ', 'WhatsApp Image 2017-10-03 at 11.47.44 PM.jpeg');

-- --------------------------------------------------------

--
-- Table structure for table `proof`
--

CREATE TABLE `proof` (
  `p_id` int(10) NOT NULL,
  `u_id` int(10) NOT NULL,
  `poa` varchar(20) NOT NULL,
  `poi` varchar(20) NOT NULL,
  `poa_file` longtext NOT NULL,
  `poi_file` longtext NOT NULL,
  `poa_doc` longtext NOT NULL,
  `poi_doc` longtext NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `proof`
--

INSERT INTO `proof` (`p_id`, `u_id`, `poa`, `poi`, `poa_file`, `poi_file`, `poa_doc`, `poi_doc`) VALUES
(32, 32, 'Proof of Address', 'Proof of Identity', '32-Proof of Address.pdf', '32-Proof of Identity.pdf', 'Passport', 'AADHAR- 12 Digit UIN'),
(39, 65, 'Proof of Address', 'Proof of Identity', '65153573427826889anu.pdf', '65153573469756631 001.pdf', 'Driving License', 'Passport'),
(40, 66, '', '', '', '', '', ''),
(41, 67, '', '', '', '', '', ''),
(42, 69, '', 'Proof of Identity', '', '69-Proof of Identity.pdf', '', 'AADHAR- 12 Digit UIN'),
(43, 70, '', '', '', '', '', '');

-- --------------------------------------------------------

--
-- Table structure for table `register_paid`
--

CREATE TABLE `register_paid` (
  `id` int(11) NOT NULL,
  `u_id` int(11) NOT NULL,
  `trans_id` varchar(200) NOT NULL,
  `status` varchar(50) NOT NULL,
  `amount` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `register_paid`
--

INSERT INTO `register_paid` (`id`, `u_id`, `trans_id`, `status`, `amount`) VALUES
(1, 32, '', 'success', ''),
(3, 70, '', '', '');

-- --------------------------------------------------------

--
-- Table structure for table `team`
--

CREATE TABLE `team` (
  `id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `designation` varchar(20) NOT NULL,
  `speech` mediumtext NOT NULL,
  `photo` longtext NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `team`
--

INSERT INTO `team` (`id`, `name`, `designation`, `speech`, `photo`) VALUES
(2, 'Saumay Paul', 'Designer', 'Website maker since 10.', 'WhatsApp Image 2017-10-03 at 11.47.44 PM.jpeg'),
(3, 'Sahil Hussain', 'Designer UIUX', 'I am a noob.', 'WhatsApp Image 2017-09-29 at 12.22.05 PM.jpeg');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `user_id` int(11) NOT NULL,
  `user_type` varchar(100) NOT NULL,
  `fname` varchar(50) NOT NULL,
  `lname` varchar(50) NOT NULL,
  `ftname` varchar(50) NOT NULL,
  `email` varchar(200) NOT NULL,
  `phone` varchar(12) NOT NULL,
  `dob` date NOT NULL,
  `status` varchar(20) NOT NULL,
  `religion` varchar(20) NOT NULL,
  `caste` varchar(20) NOT NULL,
  `nationality` varchar(20) NOT NULL,
  `join_date` date NOT NULL,
  `password` varchar(500) NOT NULL,
  `gender` varchar(10) NOT NULL,
  `address` varchar(500) NOT NULL,
  `city` varchar(80) NOT NULL,
  `state` varchar(50) NOT NULL,
  `country` varchar(10) NOT NULL,
  `photo` varchar(200) NOT NULL,
  `exp` varchar(50) NOT NULL,
  `lang` varchar(100) NOT NULL,
  `terms` varchar(10) NOT NULL,
  `cv` varchar(200) NOT NULL,
  `reg_pay_status` varchar(50) NOT NULL,
  `reg_pay_txn` varchar(200) NOT NULL,
  `fin_pay_status` varchar(50) NOT NULL,
  `fin_pay_txn` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`user_id`, `user_type`, `fname`, `lname`, `ftname`, `email`, `phone`, `dob`, `status`, `religion`, `caste`, `nationality`, `join_date`, `password`, `gender`, `address`, `city`, `state`, `country`, `photo`, `exp`, `lang`, `terms`, `cv`, `reg_pay_status`, `reg_pay_txn`, `fin_pay_status`, `fin_pay_txn`) VALUES
(32, '', 'Saumay', 'Paul', 'Surojit Paul', 'saumaypaul20@gmail.com', '8474839071', '1996-07-18', 'Single', 'Hindu', 'General', 'Indian', '2018-08-20', '$2y$12$UrLtghhoTv2rEZN.aQJJ4ucNcVr/YDoGCGjY2AeUCCyxJdPlTGSCa', 'Male', 'A3, Neha Apartment, Rukminigaon', 'Tezpur', 'Assam', 'India', '32.jpeg', 'NIL', 'English', 'I Accept', 'CV-32.pdf', 'success', '', '', ''),
(68, 'admin', 'Bijit', 'Mohan', '', 'admin@admin.com', '8812051765', '0000-00-00', '', '', '', '', '0000-00-00', '$2y$10$R8MKBBzQu09B0JBcowLPcORBbT.qCnwUYh3bl7bwvCu2BQYQkbjHG', '', '', '', '', '', '', '', '', '', '', '', '', '', ''),
(69, '', 'Bob', 'Kane', '', 'bob@gmail.com', '8474856666', '0000-00-00', '', '', '', '', '2018-09-02', '$2y$10$hKvvoCjYRhYpMJtCnTT8VeAESmmX3a33pw8kEcbvqAolmYAZHULle', '', '', '', '', '', '', '', '', '', '', '', '', '', ''),
(70, '', 'Saumay', 'Hussain', '', 'consultancyforunemployed@gmail.com', '8956231456', '0000-00-00', '', '', '', '', '2018-09-06', '$2y$10$c1O.DHhTqlLlHbmGsQpULemSi1U9H2mJHpGcjLFdrS3L0td31L8Fq', '', '', '', '', '', '', '', '', '', '', '', '', '', '');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `docs`
--
ALTER TABLE `docs`
  ADD PRIMARY KEY (`d_id`);

--
-- Indexes for table `final_paid`
--
ALTER TABLE `final_paid`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `guest`
--
ALTER TABLE `guest`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `news`
--
ALTER TABLE `news`
  ADD PRIMARY KEY (`news_id`);

--
-- Indexes for table `placed`
--
ALTER TABLE `placed`
  ADD PRIMARY KEY (`c_id`);

--
-- Indexes for table `proof`
--
ALTER TABLE `proof`
  ADD PRIMARY KEY (`p_id`);

--
-- Indexes for table `register_paid`
--
ALTER TABLE `register_paid`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `team`
--
ALTER TABLE `team`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`user_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `docs`
--
ALTER TABLE `docs`
  MODIFY `d_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=56;
--
-- AUTO_INCREMENT for table `final_paid`
--
ALTER TABLE `final_paid`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `guest`
--
ALTER TABLE `guest`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;
--
-- AUTO_INCREMENT for table `news`
--
ALTER TABLE `news`
  MODIFY `news_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;
--
-- AUTO_INCREMENT for table `placed`
--
ALTER TABLE `placed`
  MODIFY `c_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `proof`
--
ALTER TABLE `proof`
  MODIFY `p_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=44;
--
-- AUTO_INCREMENT for table `register_paid`
--
ALTER TABLE `register_paid`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `team`
--
ALTER TABLE `team`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=71;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

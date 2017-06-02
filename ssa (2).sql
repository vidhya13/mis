-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Jun 02, 2017 at 08:18 AM
-- Server version: 10.1.13-MariaDB
-- PHP Version: 5.6.20

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `ssa`
--

-- --------------------------------------------------------

--
-- Table structure for table `api_std`
--

CREATE TABLE `api_std` (
  `id` int(11) NOT NULL,
  `status` int(11) NOT NULL DEFAULT '1',
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `register_no` varchar(150) NOT NULL,
  `student_name` varchar(150) NOT NULL,
  `course` varchar(150) NOT NULL,
  `batch` varchar(150) NOT NULL,
  `institution_name` varchar(300) NOT NULL,
  `institution_short_name` varchar(150) NOT NULL,
  `role` varchar(150) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `api_std`
--

INSERT INTO `api_std` (`id`, `status`, `created_at`, `register_no`, `student_name`, `course`, `batch`, `institution_name`, `institution_short_name`, `role`) VALUES
(1, 1, '2017-06-02 03:46:29', '711715205035', 'VISHNU PRIYA.M', 'Information Technology', '2015', 'KGiSL Institute of Technology', 'KiTE', 'STUDENT'),
(2, 1, '2017-06-02 03:46:57', '711715205034', 'VIJAY KUMAR.M', 'Information Technology', '2015', 'KGiSL Institute of Technology', 'KiTE', 'STUDENT'),
(3, 1, '2017-06-02 03:47:04', '711715205033', 'VALLIKANNU.A.R', 'Information Technology', '2015', 'KGiSL Institute of Technology', 'KiTE', 'STUDENT'),
(4, 1, '2017-06-02 03:47:10', '1032J0056', 'DINESH .P', 'Master of Software Systems', '2010', 'KG College of Arts and Science', 'KGCAS', 'STUDENT'),
(5, 1, '2017-06-02 03:47:15', '1032J0055', 'DEEPAK KUMAR.A', 'Master of Software Systems', '2010', 'KG College of Arts and Science', 'KGCAS', 'STUDENT'),
(6, 1, '2017-06-02 03:47:56', 'admin', 'admin', 'NULL', '', '', '', 'ADMIN'),
(9, 1, '2017-06-02 06:11:16', '1032J0057', 'DIVYA BHARATHI.M', 'Master of Software Systems', '2010', 'KG College of Arts and Science', 'KGCAS', 'STUDENT'),
(10, 1, '2017-06-02 06:11:58', '1032J0057', 'DIVYA BHARATHI.M', 'Master of Software Systems', '2010', 'KG College of Arts and Science', 'KGCAS', 'STUDENT'),
(11, 1, '2017-06-02 06:13:44', '1032J0057', 'DIVYA BHARATHI.M', 'Master of Software Systems', '2010', 'KG College of Arts and Science', 'KGCAS', 'STUDENT');

-- --------------------------------------------------------

--
-- Table structure for table `category`
--

CREATE TABLE `category` (
  `id` int(11) NOT NULL,
  `cat_name` varchar(250) NOT NULL,
  `status` int(11) NOT NULL DEFAULT '1',
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `category`
--

INSERT INTO `category` (`id`, `cat_name`, `status`, `created_at`) VALUES
(1, 'Project', 1, '2017-05-18 07:38:43'),
(2, 'syllabus', 1, '2017-05-18 07:39:15'),
(3, 'study materials', 1, '2017-05-18 11:45:52'),
(4, 'Courses', 1, '2017-05-19 08:57:42');

-- --------------------------------------------------------

--
-- Table structure for table `college`
--

CREATE TABLE `college` (
  `id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `status` int(11) NOT NULL DEFAULT '1',
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `college`
--

INSERT INTO `college` (`id`, `name`, `status`, `created_at`) VALUES
(1, 'KGCAS', 1, '2017-05-08 10:14:08'),
(2, 'KITE', 1, '2017-05-08 10:54:00'),
(4, 'iim', 0, '2017-05-10 12:10:19'),
(5, 'PSG r', 0, '2017-05-17 12:11:30'),
(6, 'PSG ', 1, '2017-05-17 12:12:11');

-- --------------------------------------------------------

--
-- Table structure for table `department`
--

CREATE TABLE `department` (
  `id` int(11) NOT NULL,
  `name` varchar(150) NOT NULL,
  `clg_id` int(11) NOT NULL,
  `status` int(11) NOT NULL DEFAULT '1',
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `department`
--

INSERT INTO `department` (`id`, `name`, `clg_id`, `status`, `created_at`) VALUES
(1, 'it', 4, 0, '2017-05-08 10:14:08'),
(2, 'Cs', 1, 1, '2017-05-08 10:48:43'),
(4, 'CSE', 2, 1, '2017-05-08 10:54:00'),
(5, 'MCA', 4, 1, '2017-05-10 12:10:19'),
(6, 'bca', 1, 1, '2017-05-11 03:55:29'),
(7, 'it', 4, 0, '2017-05-17 12:11:30');

-- --------------------------------------------------------

--
-- Table structure for table `roles`
--

CREATE TABLE `roles` (
  `id` int(11) NOT NULL,
  `role_name` varchar(250) NOT NULL,
  `status` int(11) NOT NULL DEFAULT '1',
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `roles`
--

INSERT INTO `roles` (`id`, `role_name`, `status`, `created_at`) VALUES
(1, 'Admin', 1, '2017-05-17 10:20:47'),
(2, 'SSA Admin', 1, '2017-05-17 10:21:49'),
(3, 'user', 1, '2017-05-17 10:23:25'),
(4, 'faculty', 1, '2017-05-17 10:23:32'),
(5, 'student', 1, '2017-05-17 10:23:50'),
(6, 'principal', 1, '2017-05-17 10:23:57'),
(7, 'managing trustee', 1, '2017-05-17 10:24:03');

-- --------------------------------------------------------

--
-- Table structure for table `section`
--

CREATE TABLE `section` (
  `id` int(11) NOT NULL,
  `name` varchar(50) NOT NULL,
  `dept_id` int(11) NOT NULL,
  `clg_id` int(11) NOT NULL,
  `status` int(11) NOT NULL DEFAULT '1',
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `section`
--

INSERT INTO `section` (`id`, `name`, `dept_id`, `clg_id`, `status`, `created_at`) VALUES
(1, 'A', 1, 1, 1, '2017-05-08 10:52:36'),
(4, 'A', 4, 2, 1, '2017-05-08 10:54:00'),
(6, 'C', 5, 4, 1, '2017-05-10 12:10:19'),
(7, 'B', 6, 1, 1, '2017-05-11 03:55:29'),
(8, 'A', 7, 5, 0, '2017-05-17 12:11:30'),
(9, 'C', 1, 6, 1, '2017-05-17 12:12:12'),
(10, 'A', 6, 1, 1, '2017-05-18 07:16:50'),
(11, 'C', 1, 4, 0, '2017-05-25 07:42:49'),
(12, 'A', 2, 1, 1, '2017-05-31 09:06:56');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `name` varchar(225) NOT NULL,
  `password` varchar(225) NOT NULL,
  `clg_id` int(11) NOT NULL,
  `dept_id` int(11) NOT NULL,
  `section_id` int(11) NOT NULL,
  `batch` varchar(100) NOT NULL,
  `role` varchar(225) NOT NULL,
  `status` int(11) NOT NULL DEFAULT '1',
  `creaed_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `password`, `clg_id`, `dept_id`, `section_id`, `batch`, `role`, `status`, `creaed_at`) VALUES
(1, 'vidhya', '123', 1, 6, 10, '', 'ADMIN', 1, '2017-05-08 11:13:40'),
(2, 'student', 'student', 2, 4, 4, '', 'Student', 1, '2017-05-09 06:36:12'),
(3, 'admin', 'admin', 2, 4, 4, '', 'Admin', 1, '2017-05-09 07:00:17'),
(4, 'suby', 'abc', 4, 5, 6, '', 'USER', 1, '2017-05-10 12:10:42'),
(5, 'principal', 'principal', 4, 5, 6, '', 'Principal', 1, '2017-05-17 05:09:46'),
(6, 'abc', 'abc', 4, 5, 6, '', 'SSA Admin', 1, '2017-05-17 05:23:17'),
(7, 'vidhya', 'vidhya', 1, 6, 7, '2014', 'STUDENT', 1, '2017-05-26 08:36:41'),
(8, 'anu', 'anu', 2, 4, 4, '2015', 'FACULTY', 1, '2017-05-26 08:37:18'),
(9, 'anu', 'anu', 2, 4, 4, '2017', 'FACULTY', 1, '2017-05-26 08:37:53'),
(10, 'dharu', 'dharu', 2, 4, 4, '2016', 'MANAGING TRUSTEE', 1, '2017-05-26 08:38:58'),
(11, 'madhu', 'madhu', 1, 6, 7, '2014', 'STUDENT', 1, '2017-05-30 11:11:05'),
(12, 'malar', 'malar', 1, 2, 12, '2014', 'STUDENT', 1, '2017-05-31 09:07:26'),
(13, 'suby', 'suby', 2, 4, 4, '2015', 'STUDENT', 1, '2017-05-31 10:09:49');

-- --------------------------------------------------------

--
-- Table structure for table `video`
--

CREATE TABLE `video` (
  `v_id` int(11) NOT NULL,
  `video_name` varchar(255) NOT NULL,
  `uploaded_by` varchar(225) NOT NULL,
  `category` varchar(250) NOT NULL,
  `clg_id` int(11) NOT NULL,
  `dept_id` int(11) NOT NULL,
  `section_id` int(11) NOT NULL,
  `from_clg` varchar(225) NOT NULL,
  `from_dept` varchar(225) NOT NULL,
  `from_section` varchar(225) NOT NULL,
  `status` int(11) NOT NULL DEFAULT '1',
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `video`
--

INSERT INTO `video` (`v_id`, `video_name`, `uploaded_by`, `category`, `clg_id`, `dept_id`, `section_id`, `from_clg`, `from_dept`, `from_section`, `status`, `created_at`) VALUES
(1, 'small.mp4', 'admin', 'Project', 1, 6, 7, 'KITE', 'CSE', 'A', 1, '2017-05-09 06:49:55'),
(5, 'small.mp4', 'admin', 'Syllabus', 1, 3, 2, 'KITE', 'CSE', 'A', 1, '2017-05-09 07:01:31'),
(6, 'spacetestSMALL_512kb.mp4', 'admin', 'Study Materials', 4, 5, 6, 'KITE', 'CSE', 'A', 1, '2017-05-10 12:11:03'),
(7, 'spacetestSMALL_512kb.mp4', 'admin', 'Project', 4, 5, 6, 'KITE', 'CSE', 'A', 1, '2017-05-11 04:54:40'),
(8, 'small.mp4', 'admin', 'Syllabus', 1, 6, 7, 'KITE', 'CSE', 'A', 1, '2017-05-11 05:08:20'),
(9, 'spacetestSMALL_512kb.mp4', 'admin', 'Project', 2, 4, 4, 'KITE', 'CSE', 'A', 1, '2017-05-11 05:08:32'),
(10, 'small.mp4', 'admin', 'Syllabus', 4, 5, 6, 'KITE', 'CSE', 'A', 1, '2017-05-11 05:08:53'),
(11, 'small.mp4', 'admin', 'Study Materials', 1, 6, 7, 'KITE', 'CSE', 'A', 1, '2017-05-11 05:09:07'),
(12, 'spacetestSMALL_512kb.mp4', 'admin', 'Syllabus', 2, 4, 4, 'KITE', 'CSE', 'A', 1, '2017-05-11 05:09:15'),
(13, 'small.mp4', 'admin', 'Syllabus', 4, 5, 6, 'KITE', 'CSE', 'A', 1, '2017-05-11 05:09:24'),
(14, 'spacetestSMALL_512kb.mp4', 'admin', 'Project', 2, 4, 4, 'KITE', 'CSE', 'A', 1, '2017-05-11 05:09:33'),
(15, 'small.mp4', 'admin', 'Project', 4, 5, 6, 'KITE', 'CSE', 'A', 0, '2017-05-11 05:09:48'),
(16, 'small.mp4', 'admin', 'Project', 1, 1, 1, 'KITE', 'CSE', 'A', 0, '2017-05-11 12:06:35'),
(17, 'spacetestSMALL_512kb.mp4', 'abc', 'Syllabus', 2, 4, 4, 'IIM', 'MCA', 'C', 1, '2017-05-17 05:26:51'),
(18, '1mb file   Free Download & Streaming   Internet Archive.mp4', 'abc', 'Syllabus', 4, 5, 6, 'IIM', 'MCA', 'C', 1, '2017-05-17 05:35:45'),
(19, '2.your first view and route.mp4', 'abc', 'Project', 4, 5, 6, 'IIM', 'MCA', 'C', 1, '2017-05-17 05:40:14'),
(20, '6.how to manage css and js.mp4', 'admin', 'PROJECT', 1, 6, 7, 'KITE', 'CSE', 'A', 1, '2017-05-18 09:29:45'),
(21, '6.how to manage css and js.mp4', 'admin', 'Study Materials', 2, 4, 4, 'KITE', 'CSE', 'A', 1, '2017-05-18 10:28:08'),
(22, 'spacetestSMALL_512kb.mp4', 'admin', 'Project', 1, 6, 7, 'KITE', 'CSE', 'A', 1, '2017-05-26 10:07:56');

-- --------------------------------------------------------

--
-- Table structure for table `video1`
--

CREATE TABLE `video1` (
  `id` int(11) NOT NULL,
  `status` int(11) NOT NULL DEFAULT '1',
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `v_name` varchar(250) NOT NULL,
  `a_name` varchar(250) NOT NULL,
  `r_name` varchar(250) NOT NULL,
  `student_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `video1`
--

INSERT INTO `video1` (`id`, `status`, `created_at`, `v_name`, `a_name`, `r_name`, `student_id`) VALUES
(1, 1, '2017-06-02 04:03:35', ' 1small.mp4', ' 1Kalimba.mp3', ' 1VASANTHKUMAR VIJAYKUMAR.doc', 1),
(2, 1, '2017-06-02 04:06:21', ' 3spacetestSMALL_512kb.mp4', ' 3Sleep Away.mp3', ' 3nirmal resume.docx', 3),
(3, 1, '2017-06-02 04:10:03', ' 4spacetestSMALL_512kb.mp4', ' 4Maid with the Flaxen Hair.mp3', ' 4gokul resume.docx', 4);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `api_std`
--
ALTER TABLE `api_std`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `category`
--
ALTER TABLE `category`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `college`
--
ALTER TABLE `college`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `department`
--
ALTER TABLE `department`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `roles`
--
ALTER TABLE `roles`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `section`
--
ALTER TABLE `section`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `video`
--
ALTER TABLE `video`
  ADD PRIMARY KEY (`v_id`);

--
-- Indexes for table `video1`
--
ALTER TABLE `video1`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `api_std`
--
ALTER TABLE `api_std`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;
--
-- AUTO_INCREMENT for table `category`
--
ALTER TABLE `category`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `college`
--
ALTER TABLE `college`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT for table `department`
--
ALTER TABLE `department`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
--
-- AUTO_INCREMENT for table `roles`
--
ALTER TABLE `roles`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
--
-- AUTO_INCREMENT for table `section`
--
ALTER TABLE `section`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;
--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;
--
-- AUTO_INCREMENT for table `video`
--
ALTER TABLE `video`
  MODIFY `v_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;
--
-- AUTO_INCREMENT for table `video1`
--
ALTER TABLE `video1`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

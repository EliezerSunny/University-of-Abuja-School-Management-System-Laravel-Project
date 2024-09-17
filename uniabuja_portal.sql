-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Sep 11, 2024 at 06:27 AM
-- Server version: 11.5.2-MariaDB
-- PHP Version: 8.3.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `uniabuja_portal`
--

-- --------------------------------------------------------

--
-- Table structure for table `admins`
--

CREATE TABLE `admins` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `faculty_id` bigint(20) UNSIGNED NOT NULL,
  `department_id` bigint(20) UNSIGNED NOT NULL,
  `section_id` bigint(20) UNSIGNED NOT NULL,
  `unique_id` bigint(20) UNSIGNED DEFAULT NULL,
  `name` varchar(255) NOT NULL,
  `position` varchar(255) DEFAULT NULL,
  `picture` varchar(255) DEFAULT NULL,
  `password` varchar(255) NOT NULL,
  `remember_token` varchar(100) DEFAULT NULL,
  `school_email` varchar(255) DEFAULT NULL,
  `email` varchar(255) NOT NULL,
  `phone_no` varchar(255) DEFAULT NULL,
  `location` varchar(255) DEFAULT NULL,
  `last_activity` varchar(255) DEFAULT NULL,
  `status` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `admins`
--

INSERT INTO `admins` (`id`, `faculty_id`, `department_id`, `section_id`, `unique_id`, `name`, `position`, `picture`, `password`, `remember_token`, `school_email`, `email`, `phone_no`, `location`, `last_activity`, `status`, `created_at`, `updated_at`) VALUES
(2, 7, 1, 3, 1577303032, 'Eliezer Sunny', 'Admin', '1702910251-Eliezer Sunny.jpg', '$2y$10$YmA/fxBmcTt/QPglo9MLM.ZT0gtSJ.AurqQKVNuv4LTj5c2na0OnS', 'imYMs4gS6PLIsG4QLQWJbYynnbBlXW5mmrvuFCo7hWMJ1kfX3zvb4ssKClZp', 'eliezersunny2019@uniabuja.edu.ng', 'eliezersunny@gmail.com', '+2348154596494', 'Oyo State. Nigeria', NULL, 'Active Now', '2023-12-03 19:38:51', '2024-09-09 08:48:12'),
(5, 7, 1, 3, 569527403, 'Paulson Tsemaye', 'Admin', 'user.png', '$2y$10$tud4cwdjBOz3qi7I7/3kROHZqOsxFpXPRBZjeChOgpssyOB77QxjS', NULL, 'paulsontsemaye2019@uniabuja.edu.ng', 'paulsontsemaye@paulsontsemaye.com', '+2348154596494', 'Oyo State. Nigeria', NULL, 'Active Now', '2023-12-18 00:35:00', '2023-12-18 22:36:43');

-- --------------------------------------------------------

--
-- Table structure for table `cleared_clearances`
--

CREATE TABLE `cleared_clearances` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `faculty_id` bigint(20) UNSIGNED NOT NULL,
  `department_id` bigint(20) UNSIGNED NOT NULL,
  `section_id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `lecturer_id` bigint(20) UNSIGNED NOT NULL,
  `admin_id` bigint(20) UNSIGNED DEFAULT NULL,
  `student_clearance_id` bigint(20) UNSIGNED NOT NULL,
  `school_receipt` varchar(255) DEFAULT NULL,
  `student_result` varchar(255) DEFAULT NULL,
  `proof` varchar(255) DEFAULT NULL,
  `status` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `cleared_clearances`
--

INSERT INTO `cleared_clearances` (`id`, `faculty_id`, `department_id`, `section_id`, `user_id`, `lecturer_id`, `admin_id`, `student_clearance_id`, `school_receipt`, `student_result`, `proof`, `status`, `created_at`, `updated_at`) VALUES
(10, 7, 1, 1, 1, 1, 2, 1, NULL, NULL, 'QWRldHVuamkgRWxpZXplciBBZGV0YXlvQ1NDLzIzNzEvMDAxMQ==Nw==MQ==', 'Approved', '2023-12-03 19:52:53', '2023-12-03 19:57:36');

-- --------------------------------------------------------

--
-- Table structure for table `countdowns`
--

CREATE TABLE `countdowns` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `unique_id` varchar(255) DEFAULT NULL,
  `coursereg_timer` varchar(255) DEFAULT NULL,
  `status` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `countdowns`
--

INSERT INTO `countdowns` (`id`, `unique_id`, `coursereg_timer`, `status`, `created_at`, `updated_at`) VALUES
(1, '425948287', 'December 7, 2024 23:59:59', 'Active', '2023-11-17 16:20:29', '2024-09-08 23:20:46');

-- --------------------------------------------------------

--
-- Table structure for table `courses`
--

CREATE TABLE `courses` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `faculty_id` bigint(20) UNSIGNED NOT NULL,
  `department_id` bigint(20) UNSIGNED NOT NULL,
  `level_id` bigint(20) UNSIGNED NOT NULL,
  `section_id` bigint(20) UNSIGNED NOT NULL,
  `semester_id` bigint(20) UNSIGNED NOT NULL,
  `unique_id` varchar(255) DEFAULT NULL,
  `course_code` varchar(255) DEFAULT NULL,
  `course_title` varchar(255) DEFAULT NULL,
  `course_unit` varchar(255) DEFAULT NULL,
  `course_status` varchar(255) DEFAULT NULL,
  `status` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `courses`
--

INSERT INTO `courses` (`id`, `faculty_id`, `department_id`, `level_id`, `section_id`, `semester_id`, `unique_id`, `course_code`, `course_title`, `course_unit`, `course_status`, `status`, `created_at`, `updated_at`) VALUES
(14, 7, 1, 1, 1, 1, '991825427', 'GST101A', 'USE OF ENGLISH', '2', 'C', 'Active', '2023-11-24 05:00:25', '2023-11-24 05:00:25'),
(15, 7, 1, 1, 1, 1, '1012869519', 'BIO101', 'GENERAL BIOLOGY I', '4', 'C', 'Active', '2024-08-26 19:48:43', '2024-08-26 19:48:43'),
(16, 7, 1, 1, 1, 1, '291083867', 'CHM121', 'FOUNDATION CHEMISTRY I', '3', 'C', 'Active', '2024-08-26 19:50:08', '2024-08-26 19:50:08'),
(17, 7, 1, 1, 1, 1, '615999394', 'MTH101', 'ELEMENTARY SET THEORY AND ALGEBRA', '2', 'C', 'Active', '2024-08-26 19:55:19', '2024-08-26 19:55:19'),
(18, 7, 1, 1, 1, 1, '1249055869', 'MTH103', 'TRIGONOMETRY', '3', 'C', 'Active', '2024-08-26 19:56:15', '2024-08-26 19:56:15'),
(19, 7, 1, 1, 1, 1, '1074447088', 'MTH105', 'COORDINATE GEOMETRY', '1', 'C', 'Active', '2024-08-26 19:57:32', '2024-08-26 19:57:32'),
(20, 7, 1, 1, 1, 1, '328962603', 'PHY101', 'MECHANICS AND PROPERTIES OF MATTER', '3', 'C', 'Active', '2024-08-26 19:58:56', '2024-08-26 19:58:56'),
(21, 7, 1, 1, 1, 1, '360124451', 'PHY102', 'INTRODUCTION TO HEAT AND THERMODYNAMICS', '2', 'C', 'Active', '2024-08-26 20:00:02', '2024-08-26 20:00:02'),
(22, 7, 1, 1, 1, 1, '219406915', 'PHY108', 'BASIC EXPERIMENTAL PHYSICS I', '1', 'C', 'Active', '2024-08-26 20:01:40', '2024-08-26 20:01:40'),
(23, 7, 1, 1, 1, 1, '881544765', 'STA101', 'PROBABILITY THEORY I', '2', 'C', 'Active', '2024-08-26 20:02:30', '2024-08-26 20:02:30'),
(24, 7, 1, 1, 1, 2, '1506227689', 'CSC 102', 'Programming in Basic', '2', 'C', 'Active', '2024-09-09 07:49:33', '2024-09-09 07:49:33'),
(25, 7, 1, 1, 1, 2, '1548654455', 'GST 101B', 'COMMUNICATION IN ENGLISH II', '2', 'C', 'Active', '2024-09-09 07:52:02', '2024-09-09 07:52:02'),
(26, 7, 1, 1, 1, 2, '149986908', 'GST 102', 'LOGIC AND PHILOSOPHY', '2', 'C', 'Active', '2024-09-09 07:53:33', '2024-09-09 07:53:33'),
(27, 7, 1, 1, 1, 2, '1656195180', 'GST 104', 'SCIENCE AND SOCIETY', '2', 'C', 'Active', '2024-09-09 07:54:52', '2024-09-09 07:54:52'),
(28, 7, 1, 1, 1, 2, '369493767', 'GST 122', 'USE OF LIBRARY', '1', 'C', 'Active', '2024-09-09 07:56:05', '2024-09-09 07:56:05'),
(29, 7, 1, 1, 1, 2, '20913789', 'MTH 102', 'CALCULUS AND ITS APPLICATION', '3', 'C', 'Active', '2024-09-09 07:57:29', '2024-09-09 07:57:29'),
(30, 7, 1, 1, 1, 2, '131055686', 'MTH 104', 'VECTORS', '2', 'C', 'Active', '2024-09-09 07:58:36', '2024-09-09 07:58:36'),
(31, 7, 1, 1, 1, 2, '800045670', 'MTH 106', 'CONICS', '2', 'C', 'Active', '2024-09-09 07:59:40', '2024-09-09 07:59:40'),
(32, 7, 1, 1, 1, 2, '112229674', 'PHY 103', 'OPTICS, WAVES AND MODERN PHYSICS', '3', 'C', 'Active', '2024-09-09 08:00:54', '2024-09-09 08:00:54'),
(33, 7, 1, 1, 1, 2, '1062609804', 'PHY 104', 'ELECTRICITY AND MAGNETISM', '2', 'C', 'Active', '2024-09-09 08:02:09', '2024-09-09 08:02:09'),
(34, 7, 1, 1, 1, 2, '312834722', 'PHY 109', 'BASIC EXPERIMENTAL PHYSICS II', '1', 'C', 'Active', '2024-09-09 08:03:49', '2024-09-09 08:03:49');

-- --------------------------------------------------------

--
-- Table structure for table `course_regs`
--

CREATE TABLE `course_regs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `faculty_id` bigint(20) UNSIGNED NOT NULL,
  `department_id` bigint(20) UNSIGNED NOT NULL,
  `level_id` bigint(20) UNSIGNED NOT NULL,
  `section_id` bigint(20) UNSIGNED NOT NULL,
  `semester_id` bigint(20) UNSIGNED NOT NULL,
  `course_id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `unique_id` varchar(255) DEFAULT NULL,
  `status` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `course_unit` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `course_regs`
--

INSERT INTO `course_regs` (`id`, `faculty_id`, `department_id`, `level_id`, `section_id`, `semester_id`, `course_id`, `user_id`, `unique_id`, `status`, `created_at`, `updated_at`, `course_unit`) VALUES
(118, 7, 1, 1, 1, 1, 14, 1, '292479305', 'Active', '2024-08-27 07:44:14', '2024-08-27 07:44:14', '2'),
(125, 7, 1, 1, 1, 1, 15, 1, '464376779', 'Active', '2024-09-08 20:50:35', '2024-09-08 20:50:35', '4'),
(126, 7, 1, 1, 1, 1, 16, 1, '1015352060', 'Active', '2024-09-08 20:50:35', '2024-09-08 20:50:35', '3'),
(127, 7, 1, 1, 1, 1, 17, 1, '975777689', 'Active', '2024-09-08 20:50:35', '2024-09-08 20:50:35', '2'),
(128, 7, 1, 1, 1, 1, 18, 1, '1674786002', 'Active', '2024-09-08 20:50:35', '2024-09-08 20:50:35', '3'),
(129, 7, 1, 1, 1, 1, 19, 1, '1627778135', 'Active', '2024-09-08 20:50:35', '2024-09-08 20:50:35', '1'),
(130, 7, 1, 1, 1, 1, 20, 1, '1374500560', 'Active', '2024-09-08 20:50:35', '2024-09-08 20:50:35', '3'),
(131, 7, 1, 1, 1, 1, 21, 1, '125604969', 'Active', '2024-09-08 20:50:36', '2024-09-08 20:50:36', '2'),
(132, 7, 1, 1, 1, 1, 22, 1, '1294481910', 'Active', '2024-09-08 20:50:36', '2024-09-08 20:50:36', '1'),
(133, 7, 1, 1, 1, 1, 23, 1, '451601127', 'Active', '2024-09-08 20:50:36', '2024-09-08 20:50:36', '2'),
(134, 7, 1, 1, 1, 1, 14, 10, '432370833', 'Active', '2024-09-08 23:24:10', '2024-09-08 23:24:10', '2'),
(135, 7, 1, 1, 1, 1, 15, 10, '1250472038', 'Active', '2024-09-08 23:24:10', '2024-09-08 23:24:10', '4'),
(136, 7, 1, 1, 1, 1, 16, 10, '1453056740', 'Active', '2024-09-08 23:24:10', '2024-09-08 23:24:10', '3'),
(137, 7, 1, 1, 1, 1, 17, 10, '768314068', 'Active', '2024-09-08 23:24:10', '2024-09-08 23:24:10', '2'),
(138, 7, 1, 1, 1, 1, 18, 10, '991629191', 'Active', '2024-09-08 23:24:10', '2024-09-08 23:24:10', '3'),
(139, 7, 1, 1, 1, 1, 19, 10, '964730976', 'Active', '2024-09-08 23:24:10', '2024-09-08 23:24:10', '1'),
(140, 7, 1, 1, 1, 1, 20, 10, '1033306568', 'Active', '2024-09-08 23:24:10', '2024-09-08 23:24:10', '3'),
(141, 7, 1, 1, 1, 1, 21, 10, '775714557', 'Active', '2024-09-08 23:24:10', '2024-09-08 23:24:10', '2'),
(142, 7, 1, 1, 1, 1, 22, 10, '413865220', 'Active', '2024-09-08 23:24:10', '2024-09-08 23:24:10', '1'),
(145, 7, 1, 1, 1, 1, 23, 10, '1694642610', 'Active', '2024-09-08 23:28:48', '2024-09-08 23:28:48', '2'),
(146, 7, 1, 1, 1, 2, 24, 1, '1138066075', 'Active', '2024-09-09 08:08:27', '2024-09-09 08:08:27', '2'),
(147, 7, 1, 1, 1, 2, 25, 1, '942698864', 'Active', '2024-09-09 08:08:27', '2024-09-09 08:08:27', '2'),
(148, 7, 1, 1, 1, 2, 26, 1, '1126815501', 'Active', '2024-09-09 08:08:27', '2024-09-09 08:08:27', '2'),
(149, 7, 1, 1, 1, 2, 27, 1, '1084677036', 'Active', '2024-09-09 08:08:27', '2024-09-09 08:08:27', '2'),
(150, 7, 1, 1, 1, 2, 28, 1, '432320845', 'Active', '2024-09-09 08:08:27', '2024-09-09 08:08:27', '1'),
(151, 7, 1, 1, 1, 2, 29, 1, '1626497171', 'Active', '2024-09-09 08:08:27', '2024-09-09 08:08:27', '3'),
(152, 7, 1, 1, 1, 2, 30, 1, '807340678', 'Active', '2024-09-09 08:08:27', '2024-09-09 08:08:27', '2'),
(153, 7, 1, 1, 1, 2, 31, 1, '1283110797', 'Active', '2024-09-09 08:08:27', '2024-09-09 08:08:27', '2'),
(154, 7, 1, 1, 1, 2, 32, 1, '975585718', 'Active', '2024-09-09 08:08:27', '2024-09-09 08:08:27', '3'),
(155, 7, 1, 1, 1, 2, 33, 1, '334180325', 'Active', '2024-09-09 08:08:27', '2024-09-09 08:08:27', '2'),
(156, 7, 1, 1, 1, 2, 34, 1, '139903964', 'Active', '2024-09-09 08:08:27', '2024-09-09 08:08:27', '1');

-- --------------------------------------------------------

--
-- Table structure for table `departments`
--

CREATE TABLE `departments` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `faculty_id` bigint(20) UNSIGNED NOT NULL,
  `department_name` varchar(255) DEFAULT NULL,
  `department_abbreviation` varchar(255) DEFAULT NULL,
  `department_hod_name` varchar(255) DEFAULT NULL,
  `department_logo` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `departments`
--

INSERT INTO `departments` (`id`, `faculty_id`, `department_name`, `department_abbreviation`, `department_hod_name`, `department_logo`, `created_at`, `updated_at`) VALUES
(1, 7, 'Computer Science', 'CSC', 'Computer Science', 'department.png', '2023-10-10 21:12:40', '2023-11-30 01:36:56'),
(2, 6, 'Accounting', 'ACC', 'Accounting', 'department.png', '2023-10-12 16:27:37', '2023-11-30 01:37:16');

-- --------------------------------------------------------

--
-- Table structure for table `faculties`
--

CREATE TABLE `faculties` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `faculty_name` varchar(255) DEFAULT NULL,
  `faculty_award` varchar(255) DEFAULT NULL,
  `faculty_dean_name` varchar(255) DEFAULT NULL,
  `faculty_logo` varchar(255) DEFAULT NULL,
  `unit` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `faculties`
--

INSERT INTO `faculties` (`id`, `faculty_name`, `faculty_award`, `faculty_dean_name`, `faculty_logo`, `unit`, `created_at`, `updated_at`) VALUES
(1, 'Agriculture', 'B. Sc. Ag.', 'Agriculture', 'faculty.png', 'Min: 15 units, Max: 25 units', '2023-10-10 21:09:49', '2023-10-10 21:09:49'),
(2, 'Arts', 'B.A.', 'Arts', 'faculty.png', 'Min: 15 units, Max: 25 units', '2023-10-10 21:10:07', '2023-10-10 21:10:07'),
(3, 'Education', 'B. Ed.', 'Education', 'faculty.png', 'Min: 15 units, Max: 25 units', '2023-10-10 21:10:23', '2023-10-10 21:10:23'),
(4, 'Engineering', 'B. Eng.', 'Engineering', 'faculty.png', 'Min: 15 units, Max: 25 units', '2023-10-10 21:10:48', '2023-10-10 21:10:48'),
(5, 'Law', 'LL.B.', 'Law', 'faculty.png', 'Min: 15 units, Max: 25 units', '2023-10-10 21:11:02', '2023-10-10 21:11:02'),
(6, 'Management Science', 'B.B.A', 'Management Science', 'faculty.png', 'Min: 15 units, Max: 25 units', '2023-10-10 21:11:13', '2023-10-10 21:11:13'),
(7, 'Science', 'B. Sc.', 'Science', 'faculty.png', 'Min: 15 units, Max: 25 units', '2023-10-10 21:11:26', '2023-10-10 21:11:26'),
(8, 'Social Science', 'B.Soc.Sc.', 'Social Science', 'faculty.png', 'Min: 15 units, Max: 25 units', '2023-10-10 21:11:38', '2023-10-10 21:11:38'),
(9, 'Veterinary Medicine', 'V.M.D.', 'Veterinary Medicine', 'faculty.png', 'Min: 15 units, Max: 25 units', '2023-10-10 21:11:58', '2023-10-12 20:57:06');

-- --------------------------------------------------------

--
-- Table structure for table `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `uuid` varchar(255) NOT NULL,
  `connection` text NOT NULL,
  `queue` text NOT NULL,
  `payload` longtext NOT NULL,
  `exception` longtext NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `final_results`
--

CREATE TABLE `final_results` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `faculty_id` bigint(20) UNSIGNED NOT NULL,
  `department_id` bigint(20) UNSIGNED NOT NULL,
  `level_id` bigint(20) UNSIGNED NOT NULL,
  `section_id` bigint(20) UNSIGNED NOT NULL,
  `semester_id` bigint(20) UNSIGNED NOT NULL,
  `result_id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `lecturer_id` bigint(20) UNSIGNED NOT NULL,
  `unique_id` varchar(255) DEFAULT NULL,
  `total_course_unit` varchar(255) DEFAULT NULL,
  `total_wgp` varchar(255) DEFAULT NULL,
  `gpa` varchar(255) DEFAULT NULL,
  `class_grade` varchar(255) DEFAULT NULL,
  `status` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `lecturers`
--

CREATE TABLE `lecturers` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `faculty_id` bigint(20) UNSIGNED NOT NULL,
  `department_id` bigint(20) UNSIGNED NOT NULL,
  `section_id` bigint(20) UNSIGNED NOT NULL,
  `unique_id` varchar(255) DEFAULT NULL,
  `name` varchar(255) NOT NULL,
  `position` varchar(255) DEFAULT NULL,
  `picture` varchar(255) DEFAULT NULL,
  `password` varchar(255) NOT NULL,
  `remember_token` varchar(100) DEFAULT NULL,
  `school_email` varchar(255) DEFAULT NULL,
  `email` varchar(255) NOT NULL,
  `phone_no` varchar(255) DEFAULT NULL,
  `location` varchar(255) DEFAULT NULL,
  `last_activity` varchar(255) DEFAULT NULL,
  `status` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `lecturers`
--

INSERT INTO `lecturers` (`id`, `faculty_id`, `department_id`, `section_id`, `unique_id`, `name`, `position`, `picture`, `password`, `remember_token`, `school_email`, `email`, `phone_no`, `location`, `last_activity`, `status`, `created_at`, `updated_at`) VALUES
(1, 7, 1, 1, '911883908', 'Eliezer', 'Lecturer', '1724563194-Eliezer.jpg', '$2y$10$Kjynnag.cdTWGTbjG2twP..M64v59pP87kZ5ZSlUclIAeN5n.3IG2', NULL, 'eliezersunny2019@uniabuja.edu.ng', 'eliezersunny@eliezersunny.com', '8154596494', 'Oyo State. Nigeria', NULL, 'Active', '2023-10-10 22:01:34', '2024-08-25 04:19:54'),
(2, 6, 2, 1, '1374265429', 'Priceless', 'Lecturer', 'user.png', '$2y$10$Y79ASKc.y8J2uug5EkBsEuUwzBH3okXNzZm/p53dK5s4SPlKhisca', NULL, 'priceless2019@uniabuja.edu.ng', 'priceless@priceless.com', '8154596494', 'Oyo State. Nigeria', NULL, 'Active', '2023-10-12 16:29:14', '2023-11-23 23:13:03'),
(3, 7, 1, 1, '515525186', 'Paulson Tsemaye', 'Lecturer', 'user.png', '$2y$10$BOnrn9piscIDs6myDGkmiej7ygBuIKQ7IsaNieyQ54OhBB3g/40fC', NULL, 'paulsontsemaye2019@uniabuja.edu.ng', 'paulsontsemaye@paulsontsemaye.com', '8154596494', 'Oyo State. Nigeria', NULL, 'Active', '2023-10-12 16:33:16', '2023-12-18 22:40:47');

-- --------------------------------------------------------

--
-- Table structure for table `levels`
--

CREATE TABLE `levels` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `unique_id` varchar(255) DEFAULT NULL,
  `level` varchar(255) DEFAULT NULL,
  `status` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `levels`
--

INSERT INTO `levels` (`id`, `unique_id`, `level`, `status`, `created_at`, `updated_at`) VALUES
(1, '1178330296', '100', 'Active', '2023-10-11 22:43:50', '2023-10-11 22:43:50'),
(2, '23313328', '200', 'Active', '2023-10-11 22:44:02', '2023-10-11 22:44:02'),
(3, '101274032', '300', 'Active', '2023-10-11 22:44:11', '2023-10-12 21:19:47'),
(4, '1109997711', '400', 'Active', '2023-10-11 22:44:18', '2023-10-11 22:44:18'),
(5, '524690232', '500', 'Active', '2023-10-11 22:44:27', '2023-10-11 22:44:27'),
(6, '1021883716', '600', 'Active', '2023-10-11 22:44:36', '2023-10-11 22:44:36'),
(7, '1011687601', '700', 'Active', '2023-10-11 22:44:43', '2023-10-11 22:44:43');

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_100000_create_password_reset_tokens_table', 1),
(2, '2019_08_19_000000_create_failed_jobs_table', 1),
(3, '2019_12_14_000001_create_personal_access_tokens_table', 1),
(4, '2023_08_22_110853_create_faculties_table', 1),
(5, '2023_08_22_111854_create_departments_table', 1),
(6, '2023_08_22_112050_create_sections_table', 1),
(7, '2023_10_10_090241_create_levels_table', 1),
(8, '2014_10_12_000000_create_users_table', 2),
(9, '2023_08_17_080838_create_admins_table', 2),
(10, '2023_08_17_081027_create_lecturers_table', 2),
(11, '2023_10_11_145821_add_faculty_award_to_faculties', 3),
(12, '2023_10_13_164137_create_student_clearances_table', 4),
(13, '2023_10_13_165316_create_cleared_clearances_table', 4),
(14, '2023_10_20_073815_create_semesters_table', 5),
(15, '2023_10_20_071239_create_courses_table', 6),
(16, '2023_10_20_213209_create_course_regs_table', 7),
(17, '2023_10_22_150826_create_payments_table', 8),
(18, '2023_10_22_151446_add_amount_to_payments', 9),
(19, '2023_10_23_042458_add_url_to_payments', 10),
(20, '2023_10_24_040535_add_unit_to_faculties', 11),
(21, '2023_11_01_182733_create_results_table', 12),
(22, '2023_11_01_190511_create_final_results_table', 12),
(23, '2023_11_17_071708_create_countdowns_table', 13),
(24, '2023_11_19_110059_add_courseunit_to_results', 14),
(25, '2023_11_19_200822_add_courseunit_to_course_regs', 15),
(26, '2023_11_19_221605_remove_courseunit_to_course_regs', 16),
(27, '2023_11_19_221811_add_courseunit_to_course_regs', 17),
(28, '2023_11_24_000604_create_roles_table', 18),
(29, '2023_11_24_000635_create_permissions_table', 18),
(30, '2023_11_24_003748_add_role_id_to_lecturers', 19),
(31, '2023_11_24_003829_add_role_id_to_admins', 19),
(32, '2023_11_24_170654_add_role_id_to_users', 20),
(33, '2023_11_25_101430_create_admin_role_permissions_table', 21),
(34, '2023_11_29_172244_add_department_abbrivation_to_departments', 22),
(35, '2023_12_03_103324_create_permission_tables', 23),
(36, '2024_08_16_013843_create_sessions_table', 24);

-- --------------------------------------------------------

--
-- Table structure for table `model_has_permissions`
--

CREATE TABLE `model_has_permissions` (
  `permission_id` bigint(20) UNSIGNED NOT NULL,
  `model_type` varchar(255) NOT NULL,
  `model_id` bigint(20) UNSIGNED NOT NULL,
  `team_id` bigint(20) UNSIGNED DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `model_has_permissions`
--

INSERT INTO `model_has_permissions` (`permission_id`, `model_type`, `model_id`, `team_id`) VALUES
(1, 'App\\Models\\Admin', 2, NULL),
(2, 'App\\Models\\Admin', 2, NULL),
(3, 'App\\Models\\Admin', 2, NULL),
(4, 'App\\Models\\Admin', 2, NULL),
(5, 'App\\Models\\Admin', 2, NULL),
(6, 'App\\Models\\Admin', 2, NULL),
(7, 'App\\Models\\Admin', 2, NULL),
(8, 'App\\Models\\Admin', 2, NULL),
(9, 'App\\Models\\Admin', 2, NULL),
(10, 'App\\Models\\Admin', 2, NULL),
(11, 'App\\Models\\Admin', 2, NULL),
(12, 'App\\Models\\Admin', 2, NULL),
(13, 'App\\Models\\Admin', 2, NULL),
(14, 'App\\Models\\Admin', 2, NULL),
(15, 'App\\Models\\Admin', 2, NULL),
(16, 'App\\Models\\Admin', 2, NULL),
(17, 'App\\Models\\Admin', 2, NULL),
(17, 'App\\Models\\Admin', 5, NULL),
(19, 'App\\Models\\Lecturer', 1, NULL),
(19, 'App\\Models\\Lecturer', 2, NULL),
(19, 'App\\Models\\Lecturer', 3, NULL),
(24, 'App\\Models\\Admin', 2, NULL),
(25, 'App\\Models\\Admin', 2, NULL),
(26, 'App\\Models\\Admin', 2, NULL),
(27, 'App\\Models\\Admin', 2, NULL),
(28, 'App\\Models\\Admin', 2, NULL),
(29, 'App\\Models\\Admin', 2, NULL),
(30, 'App\\Models\\Admin', 2, NULL),
(31, 'App\\Models\\Admin', 2, NULL),
(32, 'App\\Models\\Admin', 2, NULL),
(33, 'App\\Models\\Admin', 2, NULL),
(34, 'App\\Models\\Admin', 2, NULL),
(35, 'App\\Models\\Admin', 2, NULL),
(36, 'App\\Models\\Admin', 2, NULL),
(37, 'App\\Models\\Admin', 2, NULL),
(42, 'App\\Models\\User', 1, NULL),
(42, 'App\\Models\\User', 8, NULL),
(42, 'App\\Models\\User', 10, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `model_has_roles`
--

CREATE TABLE `model_has_roles` (
  `role_id` bigint(20) UNSIGNED NOT NULL,
  `model_type` varchar(255) NOT NULL,
  `model_id` bigint(20) UNSIGNED NOT NULL,
  `team_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `model_has_roles`
--

INSERT INTO `model_has_roles` (`role_id`, `model_type`, `model_id`, `team_id`) VALUES
(4, 'App\\Models\\Admin', 2, NULL),
(4, 'App\\Models\\Admin', 5, NULL),
(5, 'App\\Models\\Admin', 2, NULL),
(5, 'App\\Models\\Lecturer', 1, NULL),
(5, 'App\\Models\\Lecturer', 2, NULL),
(5, 'App\\Models\\Lecturer', 3, NULL),
(6, 'App\\Models\\User', 1, NULL),
(6, 'App\\Models\\User', 8, NULL),
(6, 'App\\Models\\User', 10, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `password_reset_tokens`
--

CREATE TABLE `password_reset_tokens` (
  `email` varchar(255) NOT NULL,
  `token` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `password_reset_tokens`
--

INSERT INTO `password_reset_tokens` (`email`, `token`, `created_at`) VALUES
('adetunjieliazer@gmail.com', '$2y$10$mOlNY8J7ZaeVR1RFqg7mG.W//GEjd6HBcn3dlpFVRhMp3HAlbAmLS', '2024-09-06 07:52:30');

-- --------------------------------------------------------

--
-- Table structure for table `payments`
--

CREATE TABLE `payments` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `faculty_id` bigint(20) UNSIGNED NOT NULL,
  `department_id` bigint(20) UNSIGNED NOT NULL,
  `level_id` bigint(20) UNSIGNED NOT NULL,
  `section_id` bigint(20) UNSIGNED NOT NULL,
  `semester_id` bigint(20) UNSIGNED DEFAULT NULL,
  `course_id` bigint(20) UNSIGNED DEFAULT NULL,
  `user_id` bigint(20) UNSIGNED DEFAULT NULL,
  `unique_id` varchar(255) DEFAULT NULL,
  `currency` varchar(255) DEFAULT NULL,
  `amount` varchar(255) DEFAULT NULL,
  `payment_name` varchar(255) DEFAULT NULL,
  `payment_url` varchar(255) DEFAULT NULL,
  `status` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `payments`
--

INSERT INTO `payments` (`id`, `faculty_id`, `department_id`, `level_id`, `section_id`, `semester_id`, `course_id`, `user_id`, `unique_id`, `currency`, `amount`, `payment_name`, `payment_url`, `status`, `created_at`, `updated_at`) VALUES
(6, 7, 1, 1, 1, NULL, NULL, NULL, '1455248129', 'NGN', '50000', 'School Charges', 'school_charges', 'Active', '2023-11-27 07:19:05', '2023-11-27 07:19:05'),
(7, 6, 2, 1, 1, NULL, NULL, NULL, '421585072', 'NGN', '50000', 'School Charges', 'school_charges', 'Active', '2024-09-09 08:53:55', '2024-09-09 08:53:55');

-- --------------------------------------------------------

--
-- Table structure for table `permissions`
--

CREATE TABLE `permissions` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `guard_name` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `permissions`
--

INSERT INTO `permissions` (`id`, `name`, `guard_name`, `created_at`, `updated_at`) VALUES
(1, 'add_admin', 'admin', '2023-12-07 05:20:45', '2023-12-15 19:29:14'),
(2, 'edit_admin', 'admin', '2023-12-18 05:44:01', '2023-12-18 05:44:01'),
(3, 'add_role', 'admin', '2023-12-18 07:44:12', '2023-12-18 07:44:12'),
(4, 'edit_role', 'admin', '2023-12-18 07:44:52', '2023-12-18 07:44:52'),
(5, 'add_permission', 'admin', '2023-12-18 07:45:08', '2023-12-18 07:45:08'),
(6, 'edit_permission', 'admin', '2023-12-18 07:45:28', '2023-12-18 07:45:28'),
(7, 'get_admin_permission', 'admin', '2023-12-18 08:07:07', '2023-12-18 08:07:07'),
(8, 'edit_admin_permission', 'admin', '2023-12-18 08:07:41', '2023-12-18 08:07:41'),
(9, 'update_admin_permission', 'admin', '2023-12-18 08:08:04', '2023-12-18 08:08:04'),
(10, 'remove_admin_permission', 'admin', '2023-12-18 08:08:30', '2023-12-18 08:08:30'),
(11, 'edit_lecturer_permission', 'admin', '2023-12-18 08:09:26', '2023-12-18 08:09:26'),
(12, 'update_lecturer_permission', 'admin', '2023-12-18 08:11:14', '2023-12-18 08:11:14'),
(13, 'remove_lecturer_permission', 'admin', '2023-12-18 08:11:35', '2023-12-18 08:11:35'),
(14, 'edit_student_permission', 'admin', '2023-12-18 08:14:07', '2023-12-18 08:14:07'),
(15, 'update_student_permission', 'admin', '2023-12-18 08:14:26', '2023-12-18 08:14:26'),
(16, 'remove_student_permission', 'admin', '2023-12-18 08:14:42', '2023-12-18 08:14:42'),
(17, 'dashboard', 'admin', '2023-12-18 10:15:45', '2023-12-18 10:15:45'),
(18, 'settings', 'admin', '2023-12-18 10:16:02', '2023-12-18 10:16:02'),
(19, 'dashboard_l', 'lecturer', '2023-12-18 10:16:33', '2023-12-18 10:16:33'),
(20, 'clearance_form_l', 'lecturer', '2023-12-18 10:17:37', '2023-12-18 10:17:37'),
(21, 'clearance_l', 'lecturer', '2023-12-18 10:18:03', '2023-12-18 10:18:03'),
(22, 'change_picture_l', 'lecturer', '2023-12-18 10:18:30', '2023-12-18 10:18:30'),
(23, 'change_password_l', 'lecturer', '2023-12-18 10:18:55', '2023-12-18 10:18:55'),
(24, 'add_lecturer', 'admin', '2023-12-18 10:20:03', '2023-12-18 10:20:03'),
(25, 'change_lecturer_details', 'admin', '2023-12-18 10:20:19', '2023-12-18 10:20:19'),
(26, 'add_student', 'admin', '2023-12-18 10:20:38', '2023-12-18 10:20:38'),
(27, 'change_student_details', 'admin', '2023-12-18 10:20:56', '2023-12-18 10:20:56'),
(28, 'add_course', 'admin', '2023-12-18 10:21:11', '2023-12-18 10:21:11'),
(29, 'change_course_details', 'admin', '2023-12-18 10:21:29', '2023-12-18 10:21:29'),
(30, 'add_faculty', 'admin', '2023-12-18 10:21:52', '2023-12-18 10:21:52'),
(31, 'change_faculty_details', 'admin', '2023-12-18 10:22:08', '2023-12-18 10:22:08'),
(32, 'add_department', 'admin', '2023-12-18 10:22:26', '2023-12-18 10:22:26'),
(33, 'change_department_details', 'admin', '2023-12-18 10:22:44', '2023-12-18 10:22:44'),
(34, 'add_payment', 'admin', '2023-12-18 10:23:06', '2023-12-18 10:23:06'),
(35, 'change_payment_details', 'admin', '2023-12-18 10:23:21', '2023-12-18 10:23:21'),
(36, 'clearance_form', 'admin', '2023-12-18 10:23:42', '2023-12-18 10:23:42'),
(37, 'clearance', 'admin', '2023-12-18 10:23:58', '2023-12-18 10:23:58'),
(38, 'change_picture', 'admin', '2023-12-18 10:25:24', '2023-12-18 10:25:24'),
(39, 'change_email', 'admin', '2023-12-18 10:25:38', '2023-12-18 10:25:38'),
(40, 'change_password', 'admin', '2023-12-18 10:25:57', '2023-12-18 10:25:57'),
(41, 'settings_l', 'lecturer', '2023-12-18 11:31:38', '2023-12-18 11:31:38'),
(42, 'dashboard_s', 'web', '2023-12-18 18:01:13', '2023-12-18 18:01:13'),
(43, 'final_year', 'web', '2023-12-18 19:18:26', '2023-12-18 19:18:26');

-- --------------------------------------------------------

--
-- Table structure for table `personal_access_tokens`
--

CREATE TABLE `personal_access_tokens` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `tokenable_type` varchar(255) NOT NULL,
  `tokenable_id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `token` varchar(64) NOT NULL,
  `abilities` text DEFAULT NULL,
  `last_used_at` timestamp NULL DEFAULT NULL,
  `expires_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `results`
--

CREATE TABLE `results` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `faculty_id` bigint(20) UNSIGNED NOT NULL,
  `department_id` bigint(20) UNSIGNED NOT NULL,
  `level_id` bigint(20) UNSIGNED NOT NULL,
  `section_id` bigint(20) UNSIGNED NOT NULL,
  `semester_id` bigint(20) UNSIGNED NOT NULL,
  `course_reg_id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `lecturer_id` bigint(20) UNSIGNED NOT NULL,
  `unique_id` varchar(255) DEFAULT NULL,
  `course_unit` varchar(255) DEFAULT NULL,
  `final_score` varchar(255) DEFAULT NULL,
  `grade` varchar(255) DEFAULT NULL,
  `weighted_grade_point` varchar(255) DEFAULT NULL,
  `grade_point` varchar(255) DEFAULT NULL,
  `status` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `results`
--

INSERT INTO `results` (`id`, `faculty_id`, `department_id`, `level_id`, `section_id`, `semester_id`, `course_reg_id`, `user_id`, `lecturer_id`, `unique_id`, `course_unit`, `final_score`, `grade`, `weighted_grade_point`, `grade_point`, `status`, `created_at`, `updated_at`) VALUES
(20, 7, 1, 1, 1, 2, 156, 1, 1, '342468797', '1', '60', 'B', '4', '4', 'Active', '2024-09-09 19:33:16', '2024-09-09 19:33:16'),
(21, 7, 1, 1, 1, 2, 146, 1, 1, '372479350', '2', '50', 'C', '6', '3', 'Active', '2024-09-11 05:06:03', '2024-09-11 05:14:01');

-- --------------------------------------------------------

--
-- Table structure for table `roles`
--

CREATE TABLE `roles` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `team_id` bigint(20) UNSIGNED DEFAULT NULL,
  `name` varchar(255) NOT NULL,
  `guard_name` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `roles`
--

INSERT INTO `roles` (`id`, `team_id`, `name`, `guard_name`, `created_at`, `updated_at`) VALUES
(4, NULL, 'admin', 'admin', '2023-12-15 19:12:19', '2023-12-18 07:41:37'),
(5, NULL, 'lecturer', 'lecturer', '2023-12-18 05:44:45', '2023-12-18 07:42:37'),
(6, NULL, 'student', 'web', '2023-12-18 10:28:08', '2023-12-18 10:28:08');

-- --------------------------------------------------------

--
-- Table structure for table `role_has_permissions`
--

CREATE TABLE `role_has_permissions` (
  `permission_id` bigint(20) UNSIGNED NOT NULL,
  `role_id` bigint(20) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `role_has_permissions`
--

INSERT INTO `role_has_permissions` (`permission_id`, `role_id`) VALUES
(1, 4),
(2, 4),
(41, 5);

-- --------------------------------------------------------

--
-- Table structure for table `sections`
--

CREATE TABLE `sections` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `unique_id` varchar(255) DEFAULT NULL,
  `section` varchar(255) DEFAULT NULL,
  `status` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `sections`
--

INSERT INTO `sections` (`id`, `unique_id`, `section`, `status`, `created_at`, `updated_at`) VALUES
(1, '213363369', '2021/2022', 'Active', '2023-10-10 21:08:00', '2023-10-12 21:16:11'),
(2, '7954922', '2022/2023', 'Active', '2023-10-10 21:08:15', '2023-10-10 21:08:15'),
(3, '1026750623', '2023/2024', 'Active', '2023-10-10 21:08:26', '2023-10-10 21:08:26'),
(4, '1009556041', '2024/2025', 'Active', '2024-08-25 21:59:20', '2024-08-25 21:59:20');

-- --------------------------------------------------------

--
-- Table structure for table `semesters`
--

CREATE TABLE `semesters` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `section_id` bigint(20) UNSIGNED NOT NULL,
  `unique_id` varchar(255) DEFAULT NULL,
  `semester` varchar(255) DEFAULT NULL,
  `status` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `semesters`
--

INSERT INTO `semesters` (`id`, `section_id`, `unique_id`, `semester`, `status`, `created_at`, `updated_at`) VALUES
(1, 1, '1181070315', 'First Semester', 'Active', '2023-10-21 05:31:20', '2023-10-21 06:21:13'),
(2, 1, '1155615683', 'Second Semester', 'Active', '2023-10-21 05:32:39', '2023-10-21 05:32:39');

-- --------------------------------------------------------

--
-- Table structure for table `sessions`
--

CREATE TABLE `sessions` (
  `id` varchar(255) NOT NULL,
  `user_type` varchar(255) DEFAULT NULL,
  `user_id` bigint(20) UNSIGNED DEFAULT NULL,
  `lecturer_id` bigint(20) UNSIGNED DEFAULT NULL,
  `admin_id` bigint(20) UNSIGNED DEFAULT NULL,
  `ip_address` varchar(45) DEFAULT NULL,
  `user_agent` text DEFAULT NULL,
  `payload` longtext NOT NULL,
  `last_activity` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `sessions`
--

INSERT INTO `sessions` (`id`, `user_type`, `user_id`, `lecturer_id`, `admin_id`, `ip_address`, `user_agent`, `payload`, `last_activity`) VALUES
('1dnNjVfzeffSK5stjHHDCCXR93wA55cA77dF2gQI', NULL, 1, NULL, NULL, '127.0.0.1', 'Mozilla/5.0 (Linux; Android 10; K) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/128.0.0.0 Mobile Safari/537.36', 'YTo0OntzOjY6Il90b2tlbiI7czo0MDoiZFlZOThwaVVkcW9OVkNDWFJOWEhyQjFmSE11dkxFWXh1elpJV3J3ciI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6MTk2OiJodHRwOi8vMTI3LjAuMC4xOjgwMDAvY2hlY2tfcmVzdWx0P2xldmVsPTEmc2VtZXN0ZXI9MiZ0PWJuSlhWVXRVT0daRmJXOXFOMGRwV0c1c2MxRkhSWEZFUkcxR1dURkNhbXM1UVdKNlpEaDVhWGxSV25aYWRGSm9aMmhvV0dFNVVHOVpkMWRYVTNBM1NYVXpaVXh2ZFhCUVprSmpTbHBsY2tFM1FrVXlla3haZDI5SU1HaHVPVEo1TkdwbU13JTNEJTNEIjt9czo2OiJfZmxhc2giO2E6Mjp7czozOiJvbGQiO2E6MDp7fXM6MzoibmV3IjthOjA6e319czo1MDoibG9naW5fd2ViXzU5YmEzNmFkZGMyYjJmOTQwMTU4MGYwMTRjN2Y1OGVhNGUzMDk4OWQiO2k6MTt9', 1726035267),
('nZeZpRmH2ndXtZuvCH7mAfMqlo3FgutzMZYIUxBg', NULL, NULL, NULL, NULL, '127.0.0.1', 'Mozilla/5.0 (Linux; Android 10; K) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/128.0.0.0 Mobile Safari/537.36', 'YTo0OntzOjY6Il90b2tlbiI7czo0MDoidWpZZkpGbU9CNWFuZzhneXZiaWF1TGI5SGdibUpyMXVjSWxoSWZDZSI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6NTI6Imh0dHA6Ly8xMjcuMC4wLjE6ODAwMC9sZWN0dXJlci9hZG1pbi9lZGl0X3Jlc3VsdHMvMjEiO31zOjY6Il9mbGFzaCI7YToyOntzOjM6Im9sZCI7YTowOnt9czozOiJuZXciO2E6MDp7fX1zOjUyOiJsb2dpbl9hZG1pbl81OWJhMzZhZGRjMmIyZjk0MDE1ODBmMDE0YzdmNThlYTRlMzA5ODlkIjtpOjI7fQ==', 1726035243);

-- --------------------------------------------------------

--
-- Table structure for table `student_clearances`
--

CREATE TABLE `student_clearances` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `faculty_id` bigint(20) UNSIGNED NOT NULL,
  `department_id` bigint(20) UNSIGNED NOT NULL,
  `level_id` bigint(20) UNSIGNED NOT NULL,
  `section_id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `school_receipt` varchar(255) DEFAULT NULL,
  `student_result` varchar(255) DEFAULT NULL,
  `proof` varchar(255) DEFAULT NULL,
  `status` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `student_clearances`
--

INSERT INTO `student_clearances` (`id`, `faculty_id`, `department_id`, `level_id`, `section_id`, `user_id`, `school_receipt`, `student_result`, `proof`, `status`, `created_at`, `updated_at`) VALUES
(1, 7, 1, 1, 1, 1, '1698343138-feereceipt-Adetunji Eliazer Adetayo.jpg', '1698343138-result-Adetunji Eliazer Adetayo.jpg', NULL, 'Active', '2023-10-19 12:40:31', '2023-10-27 00:58:58');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `faculty_id` bigint(20) UNSIGNED NOT NULL,
  `department_id` bigint(20) UNSIGNED NOT NULL,
  `level_id` bigint(20) UNSIGNED NOT NULL,
  `section_id` bigint(20) UNSIGNED NOT NULL,
  `unique_id` varchar(255) DEFAULT NULL,
  `name` varchar(255) NOT NULL,
  `picture` varchar(255) DEFAULT NULL,
  `programme` varchar(255) DEFAULT NULL,
  `school_receipt` varchar(255) DEFAULT NULL,
  `remember_token` varchar(100) DEFAULT NULL,
  `school_email` varchar(255) DEFAULT NULL,
  `email` varchar(255) NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) NOT NULL,
  `phone_no` varchar(255) DEFAULT NULL,
  `location` varchar(255) DEFAULT NULL,
  `last_activity` varchar(255) DEFAULT NULL,
  `status` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `faculty_id`, `department_id`, `level_id`, `section_id`, `unique_id`, `name`, `picture`, `programme`, `school_receipt`, `remember_token`, `school_email`, `email`, `email_verified_at`, `password`, `phone_no`, `location`, `last_activity`, `status`, `created_at`, `updated_at`) VALUES
(1, 7, 1, 1, 1, 'CSC/2371/001', 'Adetunji Eliezer Adetayo', '1697110341-Adetunji Eliazer Adetayo.png', 'QWRldHVuamkgRWxpZXplciBBZGV0YXlvQ1NDLzIzNzEvMDAxMQ==Nw==MQ==', NULL, 'pTW4NpzcmIcZk7DHFSNPjnSRVuFhbbWHhSCGQLScIs97NZ5sIQCmBlJ1XKYE', 'eliezersunny2019@uniabuja.edu.ngg', 'adetunjieliazer@gmail.com', NULL, '$2y$10$jxBaN2BBRFkl.AlQQnpU1uZAPKQ.skJbpGIZCJIpIBvvGQX7TyJhq', '8154596494', 'Oyo State. Nigeria', NULL, 'Active', '2023-10-12 15:25:56', '2024-09-01 10:00:26'),
(8, 6, 2, 1, 1, 'ACC/2362/001', 'Sunny', 'user.png', 'U3Vubnk=QUNDLzIzNjIvMDAxMQ==Ng==Mg==', NULL, NULL, 'sunny2019@uniabuja.edu.ng', 'sunny@sunny.com', NULL, '$2y$10$Yu5dc7/Cso08CozxJHkpoOnma8BU3N7fQvZI8EFnOxVwH2bkb4MxW', '8154596494', 'Oyo State. Nigeria', NULL, 'Active', '2023-11-30 02:39:24', '2023-11-30 02:39:24'),
(10, 7, 1, 1, 1, 'CSC/2471/002', 'Maxbeatx', 'user.png', 'TWF4YmVhdHg=Q1NDLzI0NzEvMDAyMQ==Nw==MQ==', NULL, NULL, 'eliezersunny2024@uniabuja.edu.ng', 'eliezersunny@eliezersunny.com', NULL, '$2y$10$sS2pTAcXvVZsxXQNWheW5OrKqQxJFZLDDLSgjPwPeJ6smV5c6KrnC', '8154596494', 'Abuja', NULL, 'Active', '2024-08-26 08:43:52', '2024-09-09 08:44:40');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admins`
--
ALTER TABLE `admins`
  ADD PRIMARY KEY (`id`),
  ADD KEY `admins_faculty_id_foreign` (`faculty_id`),
  ADD KEY `admins_department_id_foreign` (`department_id`),
  ADD KEY `admins_section_id_foreign` (`section_id`);

--
-- Indexes for table `cleared_clearances`
--
ALTER TABLE `cleared_clearances`
  ADD PRIMARY KEY (`id`),
  ADD KEY `cleared_clearances_faculty_id_foreign` (`faculty_id`),
  ADD KEY `cleared_clearances_department_id_foreign` (`department_id`),
  ADD KEY `cleared_clearances_section_id_foreign` (`section_id`),
  ADD KEY `cleared_clearances_user_id_foreign` (`user_id`),
  ADD KEY `cleared_clearances_lecturer_id_foreign` (`lecturer_id`),
  ADD KEY `cleared_clearances_admin_id_foreign` (`admin_id`),
  ADD KEY `cleared_clearances_student_clearance_id_foreign` (`student_clearance_id`);

--
-- Indexes for table `countdowns`
--
ALTER TABLE `countdowns`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `courses`
--
ALTER TABLE `courses`
  ADD PRIMARY KEY (`id`),
  ADD KEY `courses_faculty_id_foreign` (`faculty_id`),
  ADD KEY `courses_department_id_foreign` (`department_id`),
  ADD KEY `courses_level_id_foreign` (`level_id`),
  ADD KEY `courses_section_id_foreign` (`section_id`),
  ADD KEY `courses_semester_id_foreign` (`semester_id`);

--
-- Indexes for table `course_regs`
--
ALTER TABLE `course_regs`
  ADD PRIMARY KEY (`id`),
  ADD KEY `course_regs_faculty_id_foreign` (`faculty_id`),
  ADD KEY `course_regs_department_id_foreign` (`department_id`),
  ADD KEY `course_regs_level_id_foreign` (`level_id`),
  ADD KEY `course_regs_section_id_foreign` (`section_id`),
  ADD KEY `course_regs_semester_id_foreign` (`semester_id`),
  ADD KEY `course_regs_course_id_foreign` (`course_id`),
  ADD KEY `course_regs_user_id_foreign` (`user_id`);

--
-- Indexes for table `departments`
--
ALTER TABLE `departments`
  ADD PRIMARY KEY (`id`),
  ADD KEY `departments_faculty_id_foreign` (`faculty_id`);

--
-- Indexes for table `faculties`
--
ALTER TABLE `faculties`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Indexes for table `final_results`
--
ALTER TABLE `final_results`
  ADD PRIMARY KEY (`id`),
  ADD KEY `final_results_faculty_id_foreign` (`faculty_id`),
  ADD KEY `final_results_department_id_foreign` (`department_id`),
  ADD KEY `final_results_level_id_foreign` (`level_id`),
  ADD KEY `final_results_section_id_foreign` (`section_id`),
  ADD KEY `final_results_semester_id_foreign` (`semester_id`),
  ADD KEY `final_results_result_id_foreign` (`result_id`),
  ADD KEY `final_results_user_id_foreign` (`user_id`),
  ADD KEY `final_results_lecturer_id_foreign` (`lecturer_id`);

--
-- Indexes for table `lecturers`
--
ALTER TABLE `lecturers`
  ADD PRIMARY KEY (`id`),
  ADD KEY `lecturers_faculty_id_foreign` (`faculty_id`),
  ADD KEY `lecturers_department_id_foreign` (`department_id`),
  ADD KEY `lecturers_section_id_foreign` (`section_id`);

--
-- Indexes for table `levels`
--
ALTER TABLE `levels`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `model_has_permissions`
--
ALTER TABLE `model_has_permissions`
  ADD PRIMARY KEY (`permission_id`,`model_type`,`model_id`),
  ADD KEY `model_has_permissions_model_id_model_type_index` (`model_id`,`model_type`);

--
-- Indexes for table `model_has_roles`
--
ALTER TABLE `model_has_roles`
  ADD PRIMARY KEY (`role_id`,`model_type`,`model_id`),
  ADD KEY `model_has_roles_model_id_model_type_index` (`model_id`,`model_type`);

--
-- Indexes for table `password_reset_tokens`
--
ALTER TABLE `password_reset_tokens`
  ADD PRIMARY KEY (`email`);

--
-- Indexes for table `payments`
--
ALTER TABLE `payments`
  ADD PRIMARY KEY (`id`),
  ADD KEY `payments_faculty_id_foreign` (`faculty_id`),
  ADD KEY `payments_department_id_foreign` (`department_id`),
  ADD KEY `payments_level_id_foreign` (`level_id`),
  ADD KEY `payments_section_id_foreign` (`section_id`),
  ADD KEY `payments_semester_id_foreign` (`semester_id`),
  ADD KEY `payments_course_id_foreign` (`course_id`),
  ADD KEY `payments_user_id_foreign` (`user_id`);

--
-- Indexes for table `permissions`
--
ALTER TABLE `permissions`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `permissions_name_guard_name_unique` (`name`,`guard_name`);

--
-- Indexes for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  ADD KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`);

--
-- Indexes for table `results`
--
ALTER TABLE `results`
  ADD PRIMARY KEY (`id`),
  ADD KEY `results_faculty_id_foreign` (`faculty_id`),
  ADD KEY `results_department_id_foreign` (`department_id`),
  ADD KEY `results_level_id_foreign` (`level_id`),
  ADD KEY `results_section_id_foreign` (`section_id`),
  ADD KEY `results_semester_id_foreign` (`semester_id`),
  ADD KEY `results_course_reg_id_foreign` (`course_reg_id`),
  ADD KEY `results_user_id_foreign` (`user_id`),
  ADD KEY `results_lecturer_id_foreign` (`lecturer_id`);

--
-- Indexes for table `roles`
--
ALTER TABLE `roles`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `roles_team_id_name_guard_name_unique` (`team_id`,`name`,`guard_name`);

--
-- Indexes for table `role_has_permissions`
--
ALTER TABLE `role_has_permissions`
  ADD PRIMARY KEY (`permission_id`,`role_id`),
  ADD KEY `role_has_permissions_role_id_foreign` (`role_id`);

--
-- Indexes for table `sections`
--
ALTER TABLE `sections`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `semesters`
--
ALTER TABLE `semesters`
  ADD PRIMARY KEY (`id`),
  ADD KEY `semesters_section_id_foreign` (`section_id`);

--
-- Indexes for table `sessions`
--
ALTER TABLE `sessions`
  ADD PRIMARY KEY (`id`),
  ADD KEY `sessions_user_id_index` (`user_id`),
  ADD KEY `sessions_lecturer_id_index` (`lecturer_id`),
  ADD KEY `sessions_admin_id_index` (`admin_id`),
  ADD KEY `sessions_last_activity_index` (`last_activity`);

--
-- Indexes for table `student_clearances`
--
ALTER TABLE `student_clearances`
  ADD PRIMARY KEY (`id`),
  ADD KEY `student_clearances_faculty_id_foreign` (`faculty_id`),
  ADD KEY `student_clearances_department_id_foreign` (`department_id`),
  ADD KEY `student_clearances_level_id_foreign` (`level_id`),
  ADD KEY `student_clearances_section_id_foreign` (`section_id`),
  ADD KEY `student_clearances_user_id_foreign` (`user_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`),
  ADD KEY `users_faculty_id_foreign` (`faculty_id`),
  ADD KEY `users_department_id_foreign` (`department_id`),
  ADD KEY `users_level_id_foreign` (`level_id`),
  ADD KEY `users_section_id_foreign` (`section_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admins`
--
ALTER TABLE `admins`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `cleared_clearances`
--
ALTER TABLE `cleared_clearances`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `countdowns`
--
ALTER TABLE `countdowns`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `courses`
--
ALTER TABLE `courses`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=35;

--
-- AUTO_INCREMENT for table `course_regs`
--
ALTER TABLE `course_regs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=157;

--
-- AUTO_INCREMENT for table `departments`
--
ALTER TABLE `departments`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `faculties`
--
ALTER TABLE `faculties`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `final_results`
--
ALTER TABLE `final_results`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `lecturers`
--
ALTER TABLE `lecturers`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `levels`
--
ALTER TABLE `levels`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=37;

--
-- AUTO_INCREMENT for table `payments`
--
ALTER TABLE `payments`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `permissions`
--
ALTER TABLE `permissions`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=44;

--
-- AUTO_INCREMENT for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `results`
--
ALTER TABLE `results`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT for table `roles`
--
ALTER TABLE `roles`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `sections`
--
ALTER TABLE `sections`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `semesters`
--
ALTER TABLE `semesters`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `student_clearances`
--
ALTER TABLE `student_clearances`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `admins`
--
ALTER TABLE `admins`
  ADD CONSTRAINT `admins_department_id_foreign` FOREIGN KEY (`department_id`) REFERENCES `departments` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `admins_faculty_id_foreign` FOREIGN KEY (`faculty_id`) REFERENCES `faculties` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `admins_section_id_foreign` FOREIGN KEY (`section_id`) REFERENCES `sections` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `cleared_clearances`
--
ALTER TABLE `cleared_clearances`
  ADD CONSTRAINT `cleared_clearances_admin_id_foreign` FOREIGN KEY (`admin_id`) REFERENCES `admins` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `cleared_clearances_department_id_foreign` FOREIGN KEY (`department_id`) REFERENCES `departments` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `cleared_clearances_faculty_id_foreign` FOREIGN KEY (`faculty_id`) REFERENCES `faculties` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `cleared_clearances_lecturer_id_foreign` FOREIGN KEY (`lecturer_id`) REFERENCES `lecturers` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `cleared_clearances_section_id_foreign` FOREIGN KEY (`section_id`) REFERENCES `sections` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `cleared_clearances_student_clearance_id_foreign` FOREIGN KEY (`student_clearance_id`) REFERENCES `student_clearances` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `cleared_clearances_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `courses`
--
ALTER TABLE `courses`
  ADD CONSTRAINT `courses_department_id_foreign` FOREIGN KEY (`department_id`) REFERENCES `departments` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `courses_faculty_id_foreign` FOREIGN KEY (`faculty_id`) REFERENCES `faculties` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `courses_level_id_foreign` FOREIGN KEY (`level_id`) REFERENCES `levels` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `courses_section_id_foreign` FOREIGN KEY (`section_id`) REFERENCES `sections` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `courses_semester_id_foreign` FOREIGN KEY (`semester_id`) REFERENCES `semesters` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `course_regs`
--
ALTER TABLE `course_regs`
  ADD CONSTRAINT `course_regs_course_id_foreign` FOREIGN KEY (`course_id`) REFERENCES `courses` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `course_regs_department_id_foreign` FOREIGN KEY (`department_id`) REFERENCES `departments` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `course_regs_faculty_id_foreign` FOREIGN KEY (`faculty_id`) REFERENCES `faculties` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `course_regs_level_id_foreign` FOREIGN KEY (`level_id`) REFERENCES `levels` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `course_regs_section_id_foreign` FOREIGN KEY (`section_id`) REFERENCES `sections` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `course_regs_semester_id_foreign` FOREIGN KEY (`semester_id`) REFERENCES `semesters` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `course_regs_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `departments`
--
ALTER TABLE `departments`
  ADD CONSTRAINT `departments_faculty_id_foreign` FOREIGN KEY (`faculty_id`) REFERENCES `faculties` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `final_results`
--
ALTER TABLE `final_results`
  ADD CONSTRAINT `final_results_department_id_foreign` FOREIGN KEY (`department_id`) REFERENCES `departments` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `final_results_faculty_id_foreign` FOREIGN KEY (`faculty_id`) REFERENCES `faculties` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `final_results_lecturer_id_foreign` FOREIGN KEY (`lecturer_id`) REFERENCES `lecturers` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `final_results_level_id_foreign` FOREIGN KEY (`level_id`) REFERENCES `levels` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `final_results_result_id_foreign` FOREIGN KEY (`result_id`) REFERENCES `results` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `final_results_section_id_foreign` FOREIGN KEY (`section_id`) REFERENCES `sections` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `final_results_semester_id_foreign` FOREIGN KEY (`semester_id`) REFERENCES `semesters` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `final_results_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `lecturers`
--
ALTER TABLE `lecturers`
  ADD CONSTRAINT `lecturers_department_id_foreign` FOREIGN KEY (`department_id`) REFERENCES `departments` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `lecturers_faculty_id_foreign` FOREIGN KEY (`faculty_id`) REFERENCES `faculties` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `lecturers_section_id_foreign` FOREIGN KEY (`section_id`) REFERENCES `sections` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `model_has_permissions`
--
ALTER TABLE `model_has_permissions`
  ADD CONSTRAINT `model_has_permissions_permission_id_foreign` FOREIGN KEY (`permission_id`) REFERENCES `permissions` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `model_has_roles`
--
ALTER TABLE `model_has_roles`
  ADD CONSTRAINT `model_has_roles_role_id_foreign` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `payments`
--
ALTER TABLE `payments`
  ADD CONSTRAINT `payments_course_id_foreign` FOREIGN KEY (`course_id`) REFERENCES `courses` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `payments_department_id_foreign` FOREIGN KEY (`department_id`) REFERENCES `departments` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `payments_faculty_id_foreign` FOREIGN KEY (`faculty_id`) REFERENCES `faculties` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `payments_level_id_foreign` FOREIGN KEY (`level_id`) REFERENCES `levels` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `payments_section_id_foreign` FOREIGN KEY (`section_id`) REFERENCES `sections` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `payments_semester_id_foreign` FOREIGN KEY (`semester_id`) REFERENCES `semesters` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `payments_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `results`
--
ALTER TABLE `results`
  ADD CONSTRAINT `results_course_reg_id_foreign` FOREIGN KEY (`course_reg_id`) REFERENCES `course_regs` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `results_department_id_foreign` FOREIGN KEY (`department_id`) REFERENCES `departments` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `results_faculty_id_foreign` FOREIGN KEY (`faculty_id`) REFERENCES `faculties` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `results_lecturer_id_foreign` FOREIGN KEY (`lecturer_id`) REFERENCES `lecturers` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `results_level_id_foreign` FOREIGN KEY (`level_id`) REFERENCES `levels` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `results_section_id_foreign` FOREIGN KEY (`section_id`) REFERENCES `sections` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `results_semester_id_foreign` FOREIGN KEY (`semester_id`) REFERENCES `semesters` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `results_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `role_has_permissions`
--
ALTER TABLE `role_has_permissions`
  ADD CONSTRAINT `role_has_permissions_permission_id_foreign` FOREIGN KEY (`permission_id`) REFERENCES `permissions` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `role_has_permissions_role_id_foreign` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `semesters`
--
ALTER TABLE `semesters`
  ADD CONSTRAINT `semesters_section_id_foreign` FOREIGN KEY (`section_id`) REFERENCES `sections` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `student_clearances`
--
ALTER TABLE `student_clearances`
  ADD CONSTRAINT `student_clearances_department_id_foreign` FOREIGN KEY (`department_id`) REFERENCES `departments` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `student_clearances_faculty_id_foreign` FOREIGN KEY (`faculty_id`) REFERENCES `faculties` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `student_clearances_level_id_foreign` FOREIGN KEY (`level_id`) REFERENCES `levels` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `student_clearances_section_id_foreign` FOREIGN KEY (`section_id`) REFERENCES `sections` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `student_clearances_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `users`
--
ALTER TABLE `users`
  ADD CONSTRAINT `users_department_id_foreign` FOREIGN KEY (`department_id`) REFERENCES `departments` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `users_faculty_id_foreign` FOREIGN KEY (`faculty_id`) REFERENCES `faculties` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `users_level_id_foreign` FOREIGN KEY (`level_id`) REFERENCES `levels` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `users_section_id_foreign` FOREIGN KEY (`section_id`) REFERENCES `sections` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

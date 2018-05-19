-- phpMyAdmin SQL Dump
-- version 4.7.7
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 19, 2018 at 08:51 AM
-- Server version: 10.1.30-MariaDB
-- PHP Version: 7.1.14

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `task_management_system`
--

-- --------------------------------------------------------

--
-- Table structure for table `members`
--

CREATE TABLE `members` (
  `id` int(5) UNSIGNED NOT NULL,
  `username` varchar(30) COLLATE utf8_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `name` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `surname` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `type` enum('NISIT','STAFF','ASSESSOR') COLLATE utf8_unicode_ci NOT NULL,
  `std_id` varchar(10) COLLATE utf8_unicode_ci DEFAULT NULL,
  `remember_token` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `members`
--

INSERT INTO `members` (`id`, `username`, `email`, `password`, `name`, `surname`, `type`, `std_id`, `remember_token`) VALUES
(1, 'zan', 'piyachok.d@ku.th', '$2y$10$2hY.G6020kkE1HZAfS2BEOhCWs/togDPpeF2PSfq39CzxeQjfDdZy', 'ปิยะโชค', 'ด้วงทองสุข', 'NISIT', '5820500806', 'bNwksBWaJ6ccT5gmR2tflaseNcfbjoSpCLNUcU5mc25wNxEZ6VprRxeRKJBD'),
(2, 'joe', '', 'joe', 'ชัยธร', 'หลักทอง', 'NISIT', '5820503155', ''),
(3, 'tommytest', '', 'tommy', 'นัฏฐพล', 'ชุมรุม', 'NISIT', '5820509874', ''),
(4, 'prem', '', 'prem', 'ณัฐพงษ์', 'ตันเตโช', 'NISIT', '5820503210', ''),
(5, 'staff1', '', 'staff1', 'อึ่งอ่าง', 'ครางเอ๋งเอ๋ง', 'STAFF', NULL, ''),
(6, 'staff2', '', 'staff2', 'จิ้งจก', 'ตกบันได', 'STAFF', NULL, ''),
(7, 'assessor1', '', 'assessor1', 'จิ้งหรีด', 'วี๊ดว๊าย', 'ASSESSOR', NULL, ''),
(8, 'nisit1', '', 'nisit1', 'มะม่วง', 'ร่วงใต้ต้น', 'NISIT', '5820500000', ''),
(9, 'assessor2', '', 'assessor2', 'มะกอก', 'ปลอกไม่เป็น', 'ASSESSOR', NULL, ''),
(10, 'assessor3', '', 'assessor3', 'ตึ่ง', 'โป๊ะ', 'ASSESSOR', NULL, ''),
(11, 'b5820500806', 'asdasd@asd.asdasd', '$2y$10$yf.rIr11eNyqKdcWyyPld.we67/TrDQXpUAs.9ugKdylCJ/FONNgG', 'asdasdasd', 'asda', 'NISIT', NULL, ''),
(12, 'smilelie2', 'piyachok.d2@ku.th', '$2y$10$2ahHUYRxp9RJmFxfNe4UIOPNph6LS8mj5LE75woefJAUPDKHCn9w6', 'zan', 'zan', 'NISIT', NULL, 'oas7bIGt1dxGVxoc40QrYkAGwKEi4NetZ8IH4lyqf6CWvjvOEnasn2ATECXB'),
(13, 'testzan', 'piyachok.d3@ku.th', '$2y$10$21L.QLaPendG3AnDDmfm4ec2RFt/E./pLqxAZJU5VXQSq9BwLVbCq', 'Piyachok', 'Duangthongsuk', 'NISIT', NULL, 'KKju6ckeqKKZ075876NdDYspcAkZBD9Hd0yrnjXPobQI9agnfrwlEuiaemQj'),
(14, 'test2', 'test2@ku.th', '$2y$10$rOUQx/Qvr5fA.RRQCmHf2O3LU3YfbFNwXGNxJdT9hgvTW7QTkfFSm', 'test2', 'test2', 'ASSESSOR', NULL, 'PK0T60KlKi5EI0PjehVulRR9kCYlVsZRMkBAOKRrJCIRdwe4WkpmwId21t17'),
(15, 'admin14', 'ssss@sss.sss', '$2y$10$GSVntD6xwT5mznDX9Xjn4.4gBkrGpOzkNzRNuicmDnzuCBukPHEjO', 'asdasd', 'asdasd', 'NISIT', NULL, 'HB3Dfgqf7bJ8wr4ZyisPmAMCjjVcjGT987smwbbS13c9ZS6l4pMaMiJ9YCOb'),
(16, 'E5788', 'ssss@sss.sss2', '$2y$10$M5ZuLAstAc30K16ZNgbd8ORvOCWJv6IPrqzrkx0GprXp6Ygz2YfUW', 'Easdw', 'asdwwa', 'ASSESSOR', NULL, 'vw6lPtApEtxsF6vG05RaXKUWSAV8xdfzxYUnoUPCEcWPhWxfboCBPUys54uy'),
(17, 'adminzan', 'piyachok.d4@ku.th', '$2y$10$sDmAq4.ei0BKkSoRCrE8iOtPp7U9aQV5VyuakwRkkk.IV7O6nNhdK', 'Piyachok', 'Duangthongsuk', 'NISIT', NULL, 'sySeBEQsXBqruS8d8XMqkHgHnUiz3nLzh4OE7i3Wwh0EieNrZdmcFATa01eK'),
(18, 'testzan5', 'test5@ku.th', '$2y$10$Cc74neeqvHPBBLWgwsi3Se0MFwh8bgxSNCbTFZTz1P5wpRzyWPx/a', 'test', 'test', 'NISIT', NULL, 'wYVjEwK4KFtbgfPH48XmLp6kjnaeCGwwvsMeCUqkpcEndxxMAfMaUwxXku4Y'),
(19, 'test6', 'test6@ku.th', '$2y$10$oek.u/gd4WvILdSFtL5Ojub9ac0Suq4QXo3BJwTXvddas/cME02Ju', 'test', 'test', 'NISIT', NULL, 'OwFg5pjQjsZ9T2MTrpedWXz1jboWQEv0kshJpkfOdrLeBqbOrzyeWq2zqJED'),
(20, 'test7', 'test7@ku.th', '$2y$10$9q5xGzMLa30gWHvnuMGLReGhq70z6lFBAFvq1BzKl/5IJURzWM3PK', 'test', 'test', 'NISIT', NULL, '4eHBaQTaX9JHi3d6a98EUwSxrM2TLYPXPdk4FXSTyGCgYgZxIPCQ49b04ex1'),
(21, 'suzan', 'admin@admin.admin', '$2y$10$dcz1S3MFJ0zdY0vVtWT/MOedt0AnoFgQndtva7F3bWvbtPYUY9MhK', 'adminzan', 'admin', 'NISIT', '5820500003', 'e3VYjUC2PyjgyZWISS3gpQfwKknq9CbnvsfbPKuiQBy2m3jMk843OmoVCCJn'),
(22, 'testnull', 'null@null.com', '$2y$10$G89oh0cLnK.CWndycloPnu/YRCY1TH8AiiWC207OAyzokzeXxK/OO', 'testnull', 'tenull', 'STAFF', NULL, 'ewkzPN08fFkzyNcVHG7K5M3gbNpmTIjHP1JWOZL4iwTAYkdKVHHFXwIidDaK'),
(23, 'suthicha.c', 'suthicha.c@ku.th', '$2y$10$NnWWm0SQEI9TQlmznTZh6ujj4OPgmKO4SZs90T9Zp6phEmen7Hn/S', 'Suthicha', 'Chinnabutr', 'NISIT', '5820500261', 'O0abJGzO04areaz6bubNBOD6zbfr2Cbhi9s7yZYYx5h1Wl6GL1XXWNQ5nFBH'),
(24, 'zansexy', 'zan@eiei.boy', '$2y$10$9purLSZUTnHmARSOJVu6j.YHn/4pROTKcZkXSN3yT7AG4SGNzbEXO', 'zanny', 'assessor', 'ASSESSOR', NULL, 'uaQdYGruGkszK3d4C6uo22ljJyrUjbRtfsbTtewuKDTQuACtPVaVK0NILPi2'),
(25, 'testass', 'testass@testass.com', '$2y$10$KDxWdsKDi76WaFN0uilv3eZNxfjZO7Qkeqp1pdVOOxEcqR/I7b78u', 'testass', 'testass', 'ASSESSOR', NULL, 'AFsos66KjmICXyvPVnsoA9PMz6NTULvBlHEhMb17g0ytGs8koOK5uwIlpw4v'),
(26, 'nisitlogintest', 'test10@ku.th', '$2y$10$LEyNr26b4srlcyuWKhnl5.da0ZpepyB5aVudE9peienRITleX4skm', 'test', 'test', 'NISIT', '5820501234', NULL),
(27, 'tommy', 'tomzxcv1@hotmail.com', '$2y$10$RfzXr9UNG582FtpXABUPyuDrySGK0JsVxhLc3qQihliS9/vEukGpW', 'นัฏฐพล', 'ชุมรุม', 'NISIT', '5820503201', 'dx0iJy2SxUjpAWLXWzeju8we0midJXPZz2W2nuUsU3tF4MujZEC2uaHI0TLg'),
(28, 'zanstaff', 'staff@tsm.com', '$2y$10$gI93rpy6N1tnBZUYTz7TVOWnweOb0qqoNdVJEAbGXoF2Fr78yQRlC', 'Staff_Zan', 'staff', 'STAFF', NULL, 'd4aUiYjE0LCwwnZMxITTlKA9fXoRImRuOlr0s08K5d9eotIBUM5zMl0ImWyD'),
(29, 'zanstaff2', 'staff2@info.com', '$2y$10$FHA8kndiBl3PyPJx0ra01uie.uaEzUvEO0A5Rw/hwYSL2WXZvmepO', 'Staff_zan2', 'Staff_zan', 'STAFF', NULL, 'ypkIR1Iyd2ZSh402CABM5829pI85J3NrHWmyG6BUhw9mDMjGk5CAHR3fsKjT'),
(30, 'zanass', 'zanass@ass.ass', '$2y$10$NVtUrpM2MyKQf4Slsps7l.CHJpG4bKhvhTULxOGnz.J1emQI.IcBK', 'zanass', 'zanass', 'ASSESSOR', NULL, 'axRmz2ay9bGWr1fRmAxMVDVSJEO2F4qkLgNgpVRwhZxrXHvA5xX8XH03Z9Ct'),
(31, 'user1', 'ddh@gmail.com', '$2y$10$1hu/PK6E3lD3eZFUevje/ead5kfOrUdEC8KYleUZZLLgmWDPqjobu', 'aaa', 'dddd', 'NISIT', '5820503157', 'JclGsyxla9FeB5LynSSvvnt1ojoYJaLolKJNvI90kC1EjOTLBMwz4UXF6iEf'),
(32, '555555', '55555@f.com', '$2y$10$Yd.LukHyokneLiKamuv9MOQrMHCg0zCa27qVWy/LbT.EiAew/uOFS', '555555', '55555555555', 'NISIT', '4454545', 'YlblrsbuT6ZmRVB9rEREvrEdJizloERosY7dLBbXJA99NnlmtzoxI81JoQ0I'),
(33, 'vbvb', 'darkdevilakira@hotmail.com', '$2y$10$1T3xh9jSj7NLiOqvZiipM.0jZBmVgHoKYJyQ3eprn8bjdC3VkEvd6', 'น้องไก่กุ๊กๆ', 'จิ๊บๆ', 'STAFF', NULL, 'Zlboc1AEcK9z33ywVrhDNsUA6S1aAATpSjgcL5Q5BgNHFybs7gBhNaKXuzCQ');

-- --------------------------------------------------------

--
-- Table structure for table `memberyearschool`
--

CREATE TABLE `memberyearschool` (
  `id_member` int(5) UNSIGNED NOT NULL,
  `year` year(4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `memberyearschool`
--

INSERT INTO `memberyearschool` (`id_member`, `year`) VALUES
(1, 2017),
(2, 2017),
(4, 2017),
(8, 2017),
(8, 2019),
(3, 2017);

-- --------------------------------------------------------

--
-- Table structure for table `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `password_resets`
--

INSERT INTO `password_resets` (`email`, `token`, `created_at`) VALUES
('suthicha.c@ku.th', '$2y$10$AtnQ9svrNfuQpmh.g1oLuOz063rP5C/uztWFeMyYS6zDnlG/P0HhG', '2018-04-01 04:55:34'),
('tomzxcv1@hotmail.com', '$2y$10$aPrmtOBM2FQIWR8PmZOl.O1r4MqJH3NGk9Ifz4s3UYlzTJaYMWIGu', '2018-04-02 09:19:38'),
('darkdevilakira@hotmail.com', '$2y$10$mjW6LRMwtlDrOuvqcgBbrehPZ4AY8Q294wPkuweu4Rcj..4BV1Lj2', '2018-04-13 14:20:54'),
('piyachok.d@ku.th', '$2y$10$7jkrnMWvpgDgBAN19rWUZuUGk7q5dXsASNfzT2UIYYrXZEiU7hDeu', '2018-05-18 18:45:02');

-- --------------------------------------------------------

--
-- Table structure for table `works`
--

CREATE TABLE `works` (
  `id` int(5) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL COMMENT 'ชื่องาน',
  `created_date` datetime NOT NULL COMMENT 'วันเปิดงาน',
  `due_time` datetime NOT NULL COMMENT 'วันที่ต้องส่ง',
  `info` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL COMMENT 'รายละเอียดงาน',
  `year_school` year(4) NOT NULL COMMENT 'ปีการศึกษา',
  `patron` int(5) UNSIGNED NOT NULL COMMENT 'คนสั่งงาน',
  `status` enum('WAITING','BOOKED','COMPLETE') COLLATE utf8_unicode_ci NOT NULL DEFAULT 'WAITING' COMMENT 'สถานะงาน',
  `nisit_booked` int(5) UNSIGNED DEFAULT NULL COMMENT 'นิสิตผู้รับงาน',
  `booked_date` datetime DEFAULT NULL COMMENT 'เวลาที่นิสิตรับงาน',
  `complete_date` datetime DEFAULT NULL COMMENT 'เวลาที่ส่งงาน',
  `used_time` time DEFAULT NULL COMMENT 'เวลาที่ทำงาน',
  `summary` text COLLATE utf8_unicode_ci COMMENT 'สรุปผล'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `works`
--

INSERT INTO `works` (`id`, `name`, `created_date`, `due_time`, `info`, `year_school`, `patron`, `status`, `nisit_booked`, `booked_date`, `complete_date`, `used_time`, `summary`) VALUES
(1, 'ตรวจงานวิชา C++ ทุกหมู่เรียน', '2018-03-20 23:00:00', '2018-04-20 12:00:00', 'ตรวจงานทั้งหมด ของหมู่ 700,701,702,703 ในวิชา C++', 2017, 5, 'COMPLETE', 1, '2018-04-02 14:18:22', '2018-04-02 15:46:12', '05:00:00', NULL),
(2, 'จัดห้องเรียน E8303', '2018-03-19 00:00:00', '2018-03-22 00:00:00', NULL, 2017, 6, 'BOOKED', 2, '2018-03-20 09:11:32', NULL, NULL, NULL),
(3, 'จัดห้องเรียน E8304', '2018-04-04 00:00:00', '2018-04-26 00:00:00', NULL, 2017, 6, 'COMPLETE', 1, '2018-04-02 16:03:59', '2018-04-02 16:10:05', '22:12:00', NULL),
(4, 'จัดห้องเรียน E8404', '2018-04-10 00:00:00', '2018-03-22 00:00:00', 'จัดห้อง', 2017, 6, 'COMPLETE', 27, '2018-04-09 17:01:33', '2018-04-09 17:02:55', '03:00:00', 'งานล้มเหลว'),
(5, 'จัดห้องเรียน E1111', '2018-04-10 00:00:00', '2018-04-11 12:31:23', 'จัดห้องให้สวย', 2017, 28, 'COMPLETE', 31, '2018-04-03 10:29:14', '2018-04-03 10:29:58', '23:59:00', 'o'),
(6, 'งานทดสอบของ Staff_zan', '2018-04-02 21:31:01', '2018-04-06 01:00:00', 'เพียงแค่ทดสอบเฉยๆ', 2017, 28, 'BOOKED', 31, '2018-04-03 10:29:01', NULL, NULL, NULL),
(7, 'งานทดสอบของStaff_zan2', '2018-04-02 21:38:21', '2018-04-05 03:10:00', 'ลองทดสอบดู', 2017, 28, 'COMPLETE', 23, '2018-04-02 21:53:55', '2018-04-02 21:54:34', '04:00:00', NULL),
(8, 'ทำความสะอาดครัว', '2018-04-02 21:39:26', '2018-04-06 15:30:00', 'สถานที่ SC1-101', 2017, 28, 'BOOKED', 1, '2018-04-02 21:40:11', NULL, NULL, NULL),
(9, 'จัดส่งเอกสารลับสุดยอด', '2018-04-02 21:43:52', '2018-04-04 07:05:00', 'สถานที่ส่ง : 2 หมู่ 6 กำแพงแสน ม.เกษตรศาสตร์ กำแพงแสน', 2017, 28, 'WAITING', NULL, NULL, NULL, NULL, NULL),
(10, 'จัดส่งเอกสารลับสุดยอด', '2018-04-02 21:44:43', '2018-04-04 07:05:00', 'สถานที่ส่ง : 2 หมู่ 6 กำแพงแสน ม.เกษตรศาสตร์ กำแพงแสน', 2017, 28, 'COMPLETE', 23, '2018-04-02 21:57:12', '2018-04-02 21:57:28', '03:00:00', 'ทำงานสำเร็จแล้วค่ะ'),
(11, 'จัดส่งพัสดุ', '2018-04-02 21:46:39', '2018-04-19 10:00:00', 'ส่งไปยังบ้านนายก', 2017, 28, 'COMPLETE', 1, '2018-04-17 10:37:11', '2018-04-17 10:38:54', '04:00:00', 'ส่งแล้ว'),
(12, 'จัดส่งพัสดุ', '2018-04-02 21:48:53', '2018-04-19 10:00:00', 'ส่งไปยังบ้านนายก', 2017, 28, 'WAITING', NULL, NULL, NULL, NULL, NULL),
(13, 'ทดสอบเปลี่ยนปี', '2019-04-02 21:51:47', '2019-04-10 01:00:00', 'ทดสอบ', 2018, 28, 'COMPLETE', 1, '2018-04-08 23:32:54', '2018-04-09 13:38:38', '01:00:00', 'เสร็จไป 1 ชั่วโมง'),
(15, 'สร้างงานวันนี้', '2018-04-09 16:48:47', '2018-04-21 03:10:00', 'อยากดูปีการศึกษาเฉยๆ', 2017, 8, 'WAITING', NULL, NULL, NULL, NULL, NULL),
(16, 'สร้างงานวันนี้', '2018-04-09 16:48:58', '2018-04-21 03:10:00', 'อยากดูปีการศึกษาเฉยๆ', 2017, 8, 'WAITING', NULL, NULL, NULL, NULL, NULL),
(17, 'ทดสอบเปลี่ยนปี', '2018-04-09 16:52:39', '2018-04-14 02:00:00', 'อยากดูปีการศึกษาเฉยๆ', 2017, 28, 'WAITING', NULL, NULL, NULL, NULL, NULL),
(18, 'ไปส่งไปรษณีย์', '2018-04-09 16:56:14', '2018-04-11 09:00:00', 'ที่กทม', 2017, 28, 'WAITING', NULL, NULL, NULL, NULL, NULL),
(19, 'ลองเปลี่ยนปีเป็นวันที่ 9/9/2019', '2019-09-09 16:57:42', '2019-09-10 09:00:00', NULL, 2019, 28, 'BOOKED', 32, '2018-04-13 21:15:27', NULL, NULL, NULL),
(20, 'ลองเปลี่ยนปีเป็นวันที่ 9/2/2019', '2019-02-09 16:58:45', '2019-02-10 09:02:00', NULL, 2018, 28, 'WAITING', NULL, NULL, NULL, NULL, NULL),
(21, 'โปรเจค web app', '2018-04-13 21:20:26', '2018-04-02 00:00:00', 'รีบปั่นซะนะ', 2017, 33, 'WAITING', NULL, NULL, NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `yearschool`
--

CREATE TABLE `yearschool` (
  `year` year(4) NOT NULL,
  `start_date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `yearschool`
--

INSERT INTO `yearschool` (`year`, `start_date`) VALUES
(2017, '2017-07-01'),
(2018, '2018-08-01'),
(2019, '2019-08-01'),
(2020, '2020-08-01');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `members`
--
ALTER TABLE `members`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `memberyearschool`
--
ALTER TABLE `memberyearschool`
  ADD KEY `id_member` (`id_member`),
  ADD KEY `year` (`year`);

--
-- Indexes for table `works`
--
ALTER TABLE `works`
  ADD PRIMARY KEY (`id`),
  ADD KEY `patron` (`patron`),
  ADD KEY `nisit_booked` (`nisit_booked`),
  ADD KEY `year_school` (`year_school`);

--
-- Indexes for table `yearschool`
--
ALTER TABLE `yearschool`
  ADD PRIMARY KEY (`year`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `members`
--
ALTER TABLE `members`
  MODIFY `id` int(5) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=34;

--
-- AUTO_INCREMENT for table `works`
--
ALTER TABLE `works`
  MODIFY `id` int(5) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `memberyearschool`
--
ALTER TABLE `memberyearschool`
  ADD CONSTRAINT `memberyearschool_ibfk_1` FOREIGN KEY (`id_member`) REFERENCES `members` (`id`),
  ADD CONSTRAINT `memberyearschool_ibfk_2` FOREIGN KEY (`year`) REFERENCES `yearschool` (`year`);

--
-- Constraints for table `works`
--
ALTER TABLE `works`
  ADD CONSTRAINT `works_ibfk_1` FOREIGN KEY (`nisit_booked`) REFERENCES `members` (`id`),
  ADD CONSTRAINT `works_ibfk_2` FOREIGN KEY (`patron`) REFERENCES `members` (`id`),
  ADD CONSTRAINT `works_ibfk_3` FOREIGN KEY (`year_school`) REFERENCES `yearschool` (`year`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

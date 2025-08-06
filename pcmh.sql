-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Aug 04, 2025 at 03:35 AM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `pcmh`
--

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `id` int(11) UNSIGNED NOT NULL,
  `title` varchar(50) NOT NULL,
  `description` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`id`, `title`, `description`) VALUES
(16, 'maternal', 'Maternal health'),
(18, 'health', 'Health Tips'),
(28, 'faq', 'it shows faqs'),
(31, 'child', 'child health category');

-- --------------------------------------------------------

--
-- Table structure for table `posts`
--

CREATE TABLE `posts` (
  `id` int(11) UNSIGNED NOT NULL,
  `title` varchar(255) NOT NULL,
  `body` text NOT NULL,
  `thumbnail` varchar(255) DEFAULT NULL,
  `date_time` timestamp NOT NULL DEFAULT current_timestamp(),
  `category_id` int(11) UNSIGNED DEFAULT NULL,
  `author_id` int(11) UNSIGNED NOT NULL,
  `is_featured` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `posts`
--

INSERT INTO `posts` (`id`, `title`, `body`, `thumbnail`, `date_time`, `category_id`, `author_id`, `is_featured`) VALUES
(36, 'post 3 nnynn', 'tr shhnyn', '1752712328night-king-jon-snow-minimalist-game-of-thrones-177.jpg', '2025-07-17 00:32:08', 16, 13, 0),
(38, 'post check', 'this is a health tip', '1752793104storm-trooper-from-starwars-185.jpg', '2025-07-17 22:58:24', 18, 13, 0),
(39, '3 Easy Ways To Make Your health better', 'post 2 maternal', '1752801730w.jpg', '2025-07-18 01:22:10', 16, 13, 0),
(40, 'Immunization Schedule (Sierra Leone)', 'Age	Vaccine\r\nAt Birth	BCG, OPV0\r\n6 Weeks	Penta1, OPV1, PCV1, Rota1\r\n10 Weeks	Penta2, OPV2, PCV2, Rota2\r\n14 Weeks	Penta3, OPV3, PCV3, IPV\r\n9 Months	Measles, Yellow Fever', '1753147534360_F_731801326_8Os7Qwxjwqr5HYU5nxB5QyJ7ZQihArsM.jpg', '2025-07-22 01:25:34', 31, 13, 0),
(41, 'Common Childhood Illnesses &amp; Prevention', 'Malaria: Use bed nets, clear stagnant water.\r\nDiarrhea: Safe water, handwashing, ORS for treatment.\r\nPneumonia: Vaccination, good nutrition, avoid smoke.', '1753396071360_F_731801326_8Os7Qwxjwqr5HYU5nxB5QyJ7ZQihArsM.jpg', '2025-07-24 22:27:51', 31, 13, 0),
(42, 'Nutrition Tips', 'Exclusive breastfeeding for first 6 months.\r\nIntroduce solid foods at 6 months.\r\nProvide a variety of foods for growth.', '1753396371360_F_731801326_8Os7Qwxjwqr5HYU5nxB5QyJ7ZQihArsM.jpg', '2025-07-24 22:32:51', 31, 13, 0),
(43, 'Growth Milestones', '3 months: Smiles, follows objects\r\n6 months: Sits with support, babbles\r\n12 months: Stands, says simple words\r\n24 months: Walks, uses simple phrases', '1753396407360_F_731801326_8Os7Qwxjwqr5HYU5nxB5QyJ7ZQihArsM.jpg', '2025-07-24 22:33:27', 31, 13, 0),
(48, 'Continuity of sexual and reproductive health services during the COVID-19 pandemic  ', 'In responding to the COVID-19 pandemic, UNFPA drew lessons from various studies from the Ebola epidemic in 2015. The studies revealed increased maternal mortality and morbidity, increased cases of GBV and increased unplanned pregnancies among young people resulting from reduced utilization of maternal health and family services. These issues occurred as a result of the closure of some health facilities due to the overwhelmed health system, and reduced utilization of services by women for fear of contracting Ebola from the health workers. During the COVID-19 pandemic in 2020, UNFPA facilitated the continuity of sexual and reproductive health services by providing targeted support to selected health facilities and modifying the mode of programme delivery. With funding from UK aid, and through the NGO CUAMM, COVID-19 isolation facilities were created at UNFPA-supported hospitals and equipped to facilitate screening for COVID-19. Personal protective equipment and infection prevention supplies were provided to targeted hospitals, community health centres and implementing partners. Doctors, midwives and other selected health care workers were trained in infection prevention and control (IPC) practices.', '1753668496360_F_731801326_8Os7Qwxjwqr5HYU5nxB5QyJ7ZQihArsM.jpg', '2025-07-28 02:08:16', 31, 13, 0),
(49, 'Strengthening the quality of clinical practice for midwifery students', 'To improve the quality of clinical practice during midwifery training, a preceptorship policy and implementation guidelines were finalized and launched with funding from UK aid. Seventy-eight preceptors and faculty members from the three midwifery schools were oriented to the guidelines. This was followed by an assessment of 45 preceptorship sites to document their suitability for midwifery students&rsquo; clinical practice and to identify gaps to be addressed, to inform future programming. In addition, five midwifery tutors were supported in receiving bachelor&rsquo;s and master&rsquo;s degrees, to raise the standard of their teaching.', '1753668655360_F_731801326_8Os7Qwxjwqr5HYU5nxB5QyJ7ZQihArsM.jpg', '2025-07-28 02:10:55', 16, 15, 0),
(50, 'Sustaining quality sexual and reproductive health services', 'To improve quality of care, UNFPA with funding from UK aid, collaborated with the Quality Management Programme (QMP) of the MoHS and the Institute for Healthcare Improvement to strengthen the quality of care in maternal, newborn and child health in Sierra Leone. To achieve this, 30 directors and managers from the MoHS were trained in management of large-scale Quality Improvement (QI) programmes; 40 staff from the QMP and learning districts were trained in leading and facilitating QI to be certified as QI coaches; and 110 service providers from selected health facilities were trained in QI in maternal, newborn and child health. Participants were provided with knowledge and skills on QI tools and methodologies and supported to initiate QI projects to improve Reproductive, Maternal, Newborn, Child and Adolescent Health (RMNCAH) service delivery in the various facilities. Quality improvement mini-projects were initiated by health care providers at three aforementioned referral hospitals on targeted topics such as the correct use of the partograph, monitoring critically ill patients, management of hypertension in pregnancy, prevention of wound infection and other key topics.  ', '1753997743360_F_731801326_8Os7Qwxjwqr5HYU5nxB5QyJ7ZQihArsM.jpg', '2025-07-31 21:35:43', 16, 13, 0),
(51, 'What is the recommended number of antenatal visits?', 'At least 4 visits during pregnancy are recommended for best outcomes.', '', '2025-08-03 23:00:00', 28, 13, 0),
(52, 'When should I start giving my child solid foods?', 'At 6 months, you can start introducing solid foods while continuing breastfeeding.', '', '2025-08-03 23:04:03', 28, 13, 0),
(53, 'How can I prevent malaria?', 'Use insecticide-treated bed nets, clear stagnant water, and seek prompt treatment for fever.', '', '2025-08-03 23:04:25', 28, 13, 0),
(54, 'Where can I get my child vaccinated?', 'Visit your nearest health facility or clinic for free vaccinations as per the national schedule.', '', '2025-08-03 23:04:42', 28, 13, 0),
(55, 'new articl maternal with pic updated', 'description new article  maternal with pic', '1754262454360_F_731801326_8Os7Qwxjwqr5HYU5nxB5QyJ7ZQihArsM.jpg', '2025-08-03 23:07:34', 18, 13, 0),
(56, 'Wash your hands regularly to prevent infections!', 'Washing your handing once you pick a dirty object is very crucial. Do you know the dirtiest object in every day life is the money note. ', '', '2025-08-03 23:19:30', 18, 13, 0),
(57, 'lihduaqiduansc', 'sqklqs ojcnvj kswjdvn', '', '2025-08-04 00:14:57', 16, 13, 0);

-- --------------------------------------------------------

--
-- Table structure for table `queries`
--

CREATE TABLE `queries` (
  `id` int(11) NOT NULL,
  `name` varchar(50) NOT NULL,
  `email` varchar(100) NOT NULL,
  `message` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `queries`
--

INSERT INTO `queries` (`id`, `name`, `email`, `message`) VALUES
(1, 'Question 1', 'abc@gmail.com', 'dwed');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) UNSIGNED NOT NULL,
  `firstname` varchar(50) NOT NULL,
  `lastname` varchar(50) NOT NULL,
  `username` varchar(50) NOT NULL,
  `email` varchar(100) NOT NULL,
  `password` varchar(255) NOT NULL,
  `avatar` varchar(255) NOT NULL,
  `is_admin` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `firstname`, `lastname`, `username`, `email`, `password`, `avatar`, `is_admin`) VALUES
(13, 'Admin', 'A', 'admin', 'admin@gmail.com', '$2y$10$mND.mx72Pw2yo.V8SbHnEeCf.t6vmS8ByKy/i3D5RyVj57SLuo5la', '1750722071360_F_731801326_8Os7Qwxjwqr5HYU5nxB5QyJ7ZQihArsM.jpg', 1),
(15, 'Joe', 'biden', 'jb', 'aaa@gmail.com', '$2y$10$IKslurx9LmnGfXkjC3jvRec2TX/MAGzmysT8XSk0G6OWpkJZqIjx.', '1752799957360_F_731801326_8Os7Qwxjwqr5HYU5nxB5QyJ7ZQihArsM.jpg', 0),
(17, 'dm,d updated ', 'skdln', 'ubnt', 'abc@gmail.com', '$2y$10$vZbnHG7fnPtQ5DOYCKgTpOdt93ni1RdPiKC58TWp.S9aWuYnl/fsS', '1753824855360_F_731801326_8Os7Qwxjwqr5HYU5nxB5QyJ7ZQihArsM.jpg', 0);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `posts`
--
ALTER TABLE `posts`
  ADD PRIMARY KEY (`id`),
  ADD KEY `FK_blog_category` (`category_id`),
  ADD KEY `FK_blog_author` (`author_id`);

--
-- Indexes for table `queries`
--
ALTER TABLE `queries`
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
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=32;

--
-- AUTO_INCREMENT for table `posts`
--
ALTER TABLE `posts`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=58;

--
-- AUTO_INCREMENT for table `queries`
--
ALTER TABLE `queries`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `posts`
--
ALTER TABLE `posts`
  ADD CONSTRAINT `FK_blog_author` FOREIGN KEY (`author_id`) REFERENCES `users` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `FK_blog_category` FOREIGN KEY (`category_id`) REFERENCES `categories` (`id`) ON DELETE SET NULL;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

-- phpMyAdmin SQL Dump
-- version 4.9.0.1
-- https://www.phpmyadmin.net/
--
-- Host: sql111.byetcluster.com
-- Generation Time: Jan 28, 2026 at 12:35 PM
-- Server version: 11.4.9-MariaDB
-- PHP Version: 7.2.22

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `ezyro_40246659_blood_db`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin_info`
--

CREATE TABLE `admin_info` (
  `admin_id` int(10) NOT NULL,
  `admin_name` varchar(50) NOT NULL,
  `admin_username` varchar(50) NOT NULL,
  `admin_password` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `admin_info`
--

INSERT INTO `admin_info` (`admin_id`, `admin_name`, `admin_username`, `admin_password`) VALUES
(1, 'Arideep', 'Arideep', '1234');

-- --------------------------------------------------------

--
-- Table structure for table `blood`
--

CREATE TABLE `blood` (
  `blood_id` int(11) NOT NULL,
  `blood_group` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `blood`
--

INSERT INTO `blood` (`blood_id`, `blood_group`) VALUES
(1, 'B+'),
(2, 'B-'),
(3, 'A+'),
(4, 'O+'),
(5, 'O-'),
(6, 'A-'),
(7, 'AB+'),
(8, 'AB-');

-- --------------------------------------------------------

--
-- Table structure for table `blood_requests`
--

CREATE TABLE `blood_requests` (
  `id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `blood_group` varchar(10) NOT NULL,
  `phone` varchar(20) NOT NULL,
  `city` varchar(100) NOT NULL,
  `hospital` varchar(150) NOT NULL,
  `reason` text NOT NULL,
  `request_date` datetime NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `blood_requests`
--

INSERT INTO `blood_requests` (`id`, `name`, `blood_group`, `phone`, `city`, `hospital`, `reason`, `request_date`) VALUES
(1, 'Test', 'O+', '0000000000', 'Test', 'Test', 'Test', '2025-11-11 05:13:02'),
(2, 'Arideep Kanshabanik', 'O+', '6291895934', 'Bandel', 'ESI Hospital', 'accident\r\n', '2025-11-11 05:56:11'),
(3, 'SUVAJIT PAUL', 'A+', '08335951965', 'Kolkata', 'SWAMI VIVAKANANDA HOSPITAL ', 'For Ranjan sir', '2025-11-17 21:06:35');

-- --------------------------------------------------------

--
-- Table structure for table `contact_info`
--

CREATE TABLE `contact_info` (
  `contact_id` int(11) NOT NULL,
  `contact_address` varchar(100) NOT NULL,
  `contact_mail` varchar(50) NOT NULL,
  `contact_phone` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `contact_info`
--

INSERT INTO `contact_info` (`contact_id`, `contact_address`, `contact_mail`, `contact_phone`) VALUES
(1, 'Barrackpore - Barasat Rd, Sewli Telinipara, Malir Math, Bara Kanthalia, West Bengal 700121', 'info@swamivivekanandauniversity.ac.in ', '+91-7980333922');

-- --------------------------------------------------------

--
-- Table structure for table `contact_queries`
--

CREATE TABLE `contact_queries` (
  `id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `email` varchar(150) NOT NULL,
  `phone` varchar(20) NOT NULL,
  `message` text NOT NULL,
  `submitted_on` datetime NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `contact_queries`
--

INSERT INTO `contact_queries` (`id`, `name`, `email`, `phone`, `message`, `submitted_on`) VALUES
(1, 'Test', 'Test@gmail.com', '0000000000', 'Test', '2025-11-11 05:17:54');

-- --------------------------------------------------------

--
-- Table structure for table `contact_query`
--

CREATE TABLE `contact_query` (
  `query_id` int(11) NOT NULL,
  `query_name` varchar(100) NOT NULL,
  `query_mail` varchar(120) NOT NULL,
  `query_number` char(11) NOT NULL,
  `query_message` longtext NOT NULL,
  `query_date` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `query_status` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `contact_query`
--

INSERT INTO `contact_query` (`query_id`, `query_name`, `query_mail`, `query_number`, `query_message`, `query_date`, `query_status`) VALUES
(1, 'Anuj', 'anuj@gmail.com', '9923471025', 'I need O+ Blood.', '2025-10-18 04:30:56', 1);

-- --------------------------------------------------------

--
-- Table structure for table `donor_details`
--

CREATE TABLE `donor_details` (
  `donor_id` int(11) NOT NULL,
  `donor_name` varchar(50) NOT NULL,
  `donor_number` varchar(10) NOT NULL,
  `donor_mail` varchar(50) DEFAULT NULL,
  `donor_age` int(60) NOT NULL,
  `donor_gender` varchar(10) NOT NULL,
  `donor_blood` varchar(10) NOT NULL,
  `donor_address` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `donor_details`
--

INSERT INTO `donor_details` (`donor_id`, `donor_name`, `donor_number`, `donor_mail`, `donor_age`, `donor_gender`, `donor_blood`, `donor_address`) VALUES
(11, 'Arideep Kanshabanik', '0629189593', 'arideepkanshabanik@gmail.com', 21, 'Male', 'O+', 'Balagarh Road Bamunpara Near Bandel Church'),
(12, 'Suvajit Paul', '8335951965', 'example@gmail.com', 27, 'Male', 'B-', 'Kolkata'),
(14, 'Jina Paul', '0000000000', 'jinapaulbalur@gmail.com', 26, 'Female', 'A+', 'Kolkata'),
(15, 'Diya Chatterjee', '1234567890', 'diyachatterjee200126@gmail.com', 24, 'Female', 'A+', 'Purulia'),
(17, 'Jagannath Karmakar', '1000285643', 'example@gmail.com', 26, 'Male', 'O-', 'Barasat');

-- --------------------------------------------------------

--
-- Table structure for table `pages`
--

CREATE TABLE `pages` (
  `page_id` int(11) NOT NULL,
  `page_name` varchar(255) NOT NULL,
  `page_type` varchar(50) DEFAULT NULL,
  `page_data` longtext NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `pages`
--

INSERT INTO `pages` (`page_id`, `page_name`, `page_type`, `page_data`) VALUES
(2, 'Why Become Donor', 'donor', '<span style=\"color: rgb(0, 0, 0); font-family: &quot;Open Sans&quot;, Arial, sans-serif; font-size: 14px; text-align: justify;\">Blood is the most precious gift that anyone can give to another person the gift of life. A decision to donate your blood can save a life, or even several if your blood is separated into its components red cells, platelets and plasma which can be used individually for patients with specific conditions. Safe blood saves lives and improves health. Blood transfusion is needed for:\r\n<ul><li>women with complications of pregnancy, such as ectopic pregnancies and haemorrhage before, during or after childbirth.\r\n</li><li>children with severe anaemia often resulting from malaria or malnutrition.\r\n</li><li>people with severe trauma following man-made and natural disasters.\r\n</li><li>many complex medical and surgical procedures and cancer patients.</li></ul>\r\n<br>It is also needed for regular transfusions for people with conditions such as thalassaemia and sickle cell disease and is used to make products such as clotting factors for people with haemophilia. There is a constant need for regular blood supply because blood can be stored for only a limited time before use. Regular blood donations by a sufficient number of healthy people are needed to ensure that safe blood will be available whenever and wherever it is needed.</span>'),
(3, 'About Us ', 'aboutus', '<span style=\"color: rgb(0, 0, 0); font-family: &quot;Open Sans&quot;, Arial, sans-serif; text-align: justify;\">Blood bank is a place where blood bags collected from blood donation events are stored in one location. The term blood bank refers to a division of a hospital laboratory where blood products are stored and properly tested to reduce the risk of transfusion-related events. Managing the blood bags received from donation events requires a proper and systematic approach. Each blood bag must be handled with care and treated thoroughly, as it is directly related to saving lives. The development of the Web-based Blood Bank and Donation Management System is proposed to provide management functionality to the blood bank, enabling the handling of blood bags and maintaining records of individuals who wish to donate blood and those in need.\r\n\r\nThis project is made by Arideep Kanshabanik, Jagannath Karmakar, Suvajit Paul, Diya Chatterjee, Jina Paul, and Surajit Maitra.</span>'),
(4, 'The Need For Blood', 'needforblood', '<span style=\"color: rgb(0, 0, 0); font-family: &quot;Open Sans&quot;, Arial, sans-serif; text-align: justify;\">There are many reasons patients need blood. A common misunderstanding about blood usage is that accident victims are the patients who use the most blood. Actually, people needing the most blood include those:\n1) Being treated for cancer<br>\n2) Undergoing orthopedic surgeries<br>\n3) Undergoing cardiovascular surgeries<br>\n4) Being treated for inherited blood disorders</span>'),
(5, 'Blood Tips', 'bloodtips', '<span style=\"color: rgb(0, 0, 0); font-family: &quot;Open Sans&quot;, Arial, sans-serif; text-align: justify;\">\r\n1) You must be in good health. <br>\r\n2) Hydrate and eat a healthy meal before your donation.<br>\r\n3) You are never too old to donate blood. <br>\r\n4) Rest and relaxed.<br>\r\n5) Dont forget your FREE post-donation snack. \r\n</span>'),
(6, 'Who you could Help', 'whoyouhelp', '<span style=\"color: rgb(0, 0, 0); font-family: &quot;Open Sans&quot;, Arial, sans-serif; text-align: justify;\">\nEvery 2 seconds, someone in the World needs blood. Donating blood can help:\n\n1) People who go through disasters or emergency situations.<br>\n2) People who lose blood during major surgeries.<br>\n3) People who have lost blood because of a gastrointestinal bleed.<br>\n4) Women who have serious complications during pregnancy or childbirth.<br>\n5) People with cancer or severe anemia sometimes caused by thalassemia or sickle cell disease.<br>\n</span>'),
(7, 'Blood Groups', 'bloodgroups', '<span style=\"color: rgb(0, 0, 0); font-family: &quot;Open Sans&quot;, Arial, sans-serif; text-align: justify;\">\n  <p>  Blood group of any human being will mainly fall in any one of the following groups.</p>\n                <ul>\n\n                  <li>A positive or A negative</li>\n                  <li>B positive or B negative</li>\n                  <li>O positive or O negative</li>\n                  <li>AB positive or AB negative.</li>\n                </ul>\n                <p>Your blood group is determined by the genes you inherit from your parents.<br>\n                  A healthy diet helps ensure a successful blood donation, and also makes you feel better!\n                </p>\n\n</span>'),
(8, 'Universal Donors And Recepients', 'universal', '<span style=\"color: rgb(0, 0, 0); font-family: &quot;Open Sans&quot;, Arial, sans-serif; text-align: justify;\">\n  <p>\nThe most common blood type is O, followed by type A.\n\nType O individuals are often called \"universal donors\" since their blood can be transfused into persons with any blood type. Those with type AB blood are called \"universal recipients\" because they can receive blood of any type.</p>\n\n            For emergency transfusions, blood group type O negative blood is the variety of blood that has the lowest risk of causing serious reactions for most people who receive it. Because of this, it\'s sometimes called the universal blood donor type.\n\n</span>');

-- --------------------------------------------------------

--
-- Table structure for table `query_stat`
--

CREATE TABLE `query_stat` (
  `id` int(11) NOT NULL,
  `query_type` varchar(45) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `query_stat`
--

INSERT INTO `query_stat` (`id`, `query_type`) VALUES
(1, 'Read'),
(2, 'Pending');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin_info`
--
ALTER TABLE `admin_info`
  ADD PRIMARY KEY (`admin_id`),
  ADD UNIQUE KEY `admin_id` (`admin_id`),
  ADD UNIQUE KEY `admin_username` (`admin_username`);

--
-- Indexes for table `blood`
--
ALTER TABLE `blood`
  ADD PRIMARY KEY (`blood_id`);

--
-- Indexes for table `blood_requests`
--
ALTER TABLE `blood_requests`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `contact_info`
--
ALTER TABLE `contact_info`
  ADD PRIMARY KEY (`contact_id`);

--
-- Indexes for table `contact_queries`
--
ALTER TABLE `contact_queries`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `contact_query`
--
ALTER TABLE `contact_query`
  ADD PRIMARY KEY (`query_id`);

--
-- Indexes for table `donor_details`
--
ALTER TABLE `donor_details`
  ADD PRIMARY KEY (`donor_id`);

--
-- Indexes for table `pages`
--
ALTER TABLE `pages`
  ADD UNIQUE KEY `page_id` (`page_id`),
  ADD UNIQUE KEY `page_type` (`page_type`);

--
-- Indexes for table `query_stat`
--
ALTER TABLE `query_stat`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `id` (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin_info`
--
ALTER TABLE `admin_info`
  MODIFY `admin_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `blood`
--
ALTER TABLE `blood`
  MODIFY `blood_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `blood_requests`
--
ALTER TABLE `blood_requests`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `contact_info`
--
ALTER TABLE `contact_info`
  MODIFY `contact_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `contact_queries`
--
ALTER TABLE `contact_queries`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `contact_query`
--
ALTER TABLE `contact_query`
  MODIFY `query_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `donor_details`
--
ALTER TABLE `donor_details`
  MODIFY `donor_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT for table `pages`
--
ALTER TABLE `pages`
  MODIFY `page_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

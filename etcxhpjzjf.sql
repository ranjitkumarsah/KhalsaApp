-- phpMyAdmin SQL Dump
-- version 4.9.5
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Jul 25, 2023 at 05:22 PM
-- Server version: 10.4.20-MariaDB-1:10.4.20+maria~buster-log
-- PHP Version: 7.4.33

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `etcxhpjzjf`
--

-- --------------------------------------------------------

--
-- Table structure for table `about_page`
--

CREATE TABLE `about_page` (
  `id` int(11) NOT NULL,
  `about` longtext NOT NULL,
  `created_at` datetime NOT NULL DEFAULT current_timestamp(),
  `updated_at` datetime NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `deleted_at` datetime NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `about_page`
--

INSERT INTO `about_page` (`id`, `about`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, '<p><strong>About Us content</strong><br>orem Ipsum has been the industry\'s standard <strong>dummy text</strong> ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type……..</p>', '2023-07-24 09:09:55', '2023-07-24 12:01:03', '2023-07-24 12:01:03');

-- --------------------------------------------------------

--
-- Table structure for table `blood_group`
--

CREATE TABLE `blood_group` (
  `id` int(11) NOT NULL,
  `english` varchar(50) NOT NULL,
  `punjabi` varchar(50) NOT NULL,
  `created_at` datetime NOT NULL DEFAULT current_timestamp(),
  `updated_at` datetime NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `blood_group`
--

INSERT INTO `blood_group` (`id`, `english`, `punjabi`, `created_at`, `updated_at`) VALUES
(1, 'A+', 'ਏ+', '2023-07-10 16:26:58', '2023-07-10 16:26:58'),
(2, 'A-', 'ਏ-', '2023-07-10 16:26:58', '2023-07-10 16:26:58'),
(3, 'B+', 'ਬੀ+', '2023-07-10 16:26:58', '2023-07-10 16:26:58'),
(4, 'B-', 'ਬੀ-', '2023-07-10 16:26:58', '2023-07-10 16:26:58'),
(5, 'AB+', 'ਏਬੀ+', '2023-07-10 16:26:58', '2023-07-10 16:26:58'),
(6, 'AB-', 'ਏਬੀ-', '2023-07-10 16:26:58', '2023-07-10 16:26:58'),
(7, 'O+', 'ਓ+', '2023-07-10 16:26:58', '2023-07-10 16:26:58'),
(8, 'O-', 'ਓ-', '2023-07-10 16:26:58', '2023-07-10 16:26:58');

-- --------------------------------------------------------

--
-- Table structure for table `business`
--

CREATE TABLE `business` (
  `id` int(11) NOT NULL,
  `title` varchar(255) NOT NULL,
  `user_id` varchar(11) DEFAULT NULL,
  `user_type` varchar(11) DEFAULT NULL,
  `description` text NOT NULL,
  `city` varchar(255) DEFAULT NULL,
  `address` varchar(255) NOT NULL,
  `business_type` varchar(255) NOT NULL,
  `phone_number` varchar(100) DEFAULT NULL,
  `status` int(21) NOT NULL DEFAULT 0,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `business`
--

INSERT INTO `business` (`id`, `title`, `user_id`, `user_type`, `description`, `city`, `address`, `business_type`, `phone_number`, `status`, `created_at`, `updated_at`) VALUES
(2, 'Teaching', '1', 'Admin', 'teaching', 'Moga', 'moga', 'Teaching', '9872426227', 1, '2023-07-21 17:15:45', '2023-07-21 11:45:55'),
(3, 'cloths', '1', 'Admin', 'cloths', 'Phagwara', 'Phagwara', 'Clothing store', '9872426227', 1, '2023-07-21 17:54:34', '2023-07-21 12:24:46');

-- --------------------------------------------------------

--
-- Table structure for table `business_types`
--

CREATE TABLE `business_types` (
  `id` int(11) NOT NULL,
  `business_type` varchar(100) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `business_types`
--

INSERT INTO `business_types` (`id`, `business_type`, `created_at`, `updated_at`) VALUES
(1, 'Teaching', '2023-07-21 11:42:35', '2023-07-21 11:42:35'),
(2, 'Doctor', '2023-07-21 11:42:47', '2023-07-21 11:42:47'),
(3, 'Clothing store', '2023-07-21 11:43:02', '2023-07-21 11:43:02');

-- --------------------------------------------------------

--
-- Table structure for table `cardholder`
--

CREATE TABLE `cardholder` (
  `id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `name_punjabi` varchar(255) DEFAULT NULL,
  `age` int(21) NOT NULL,
  `address` varchar(100) DEFAULT NULL,
  `address_punjabi` text DEFAULT NULL,
  `password` varchar(255) DEFAULT NULL,
  `cardholder_profile` varchar(100) DEFAULT NULL,
  `job` varchar(100) DEFAULT NULL,
  `annual_income` int(21) DEFAULT NULL,
  `contact_number` varchar(255) DEFAULT NULL,
  `qualification` varchar(100) DEFAULT NULL,
  `adhaar_number` varchar(255) DEFAULT NULL,
  `own_house` varchar(100) DEFAULT NULL,
  `rent` varchar(100) DEFAULT NULL,
  `rent_price` int(21) DEFAULT NULL,
  `long_disease` varchar(100) DEFAULT NULL,
  `disease_name` varchar(100) DEFAULT NULL,
  `disease_details` varchar(255) DEFAULT NULL,
  `support_organisation` varchar(100) DEFAULT NULL,
  `joined_organisation` varchar(100) DEFAULT NULL,
  `verify_officer` varchar(100) DEFAULT NULL,
  `family_head` varchar(100) DEFAULT NULL,
  `active_status` int(11) NOT NULL DEFAULT 0,
  `verify_status` int(11) NOT NULL DEFAULT 0,
  `add_id` int(21) DEFAULT NULL,
  `add_name` varchar(200) DEFAULT NULL,
  `add_type` varchar(100) DEFAULT NULL,
  `blood_donor` varchar(255) DEFAULT NULL,
  `is_needy` varchar(20) NOT NULL DEFAULT 'No',
  `company_name` varchar(255) DEFAULT NULL,
  `policy_number` varchar(255) DEFAULT NULL,
  `policy_issue_date` varchar(255) DEFAULT NULL,
  `policy_expiry_date` varchar(255) DEFAULT NULL,
  `blood_group` varchar(10) DEFAULT NULL,
  `village` varchar(255) DEFAULT NULL,
  `email` varchar(100) DEFAULT NULL,
  `whatsapp_number` varchar(100) DEFAULT NULL,
  `card_id` varchar(255) DEFAULT NULL,
  `fcm_token` varchar(255) DEFAULT NULL,
  `device_type` int(21) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `cardholder`
--

INSERT INTO `cardholder` (`id`, `name`, `name_punjabi`, `age`, `address`, `address_punjabi`, `password`, `cardholder_profile`, `job`, `annual_income`, `contact_number`, `qualification`, `adhaar_number`, `own_house`, `rent`, `rent_price`, `long_disease`, `disease_name`, `disease_details`, `support_organisation`, `joined_organisation`, `verify_officer`, `family_head`, `active_status`, `verify_status`, `add_id`, `add_name`, `add_type`, `blood_donor`, `is_needy`, `company_name`, `policy_number`, `policy_issue_date`, `policy_expiry_date`, `blood_group`, `village`, `email`, `whatsapp_number`, `card_id`, `fcm_token`, `device_type`, `created_at`, `updated_at`) VALUES
(1, 'Shaan', 'ਸ਼ਾਨ', 40, 'Phagwara', 'ਫਗਵਾੜਾ', '$2y$10$5O4XMdoAosJTvP/rXAtn9uF6s12HUl87GOi58nxEBTiRMW0Ja86Ku', 'https://phpstack-102119-3232905.cloudwaysapps.com/storage/cardholderimg//1689936830302491337_5323937', 'teacher', 10000, '8872210204', 'PhD', '123456789101', 'yes', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'Arinder', 'jimmy kainth', 1, 1, 1, 'Admin', 'Admin', 'yes', 'No', NULL, NULL, NULL, NULL, 'B+', 'Phagwara', 'Tester122@gmail.com', '8872210204', '1699-1000001', 'conKGSXnRSSIyokNWjzz_O:APA91bEL4kb0iq8fBYgWxkVx_WGnKrnpmr7AYYu1V2-w8U9H3kV-H8RjOz0nqNv_zynR-f_304RLsLrVmAZDw41bC9YzAmudPcq4w6abqpqi9UrQuy0GU3i4dMccjGDewQZk5fmlNQCn', 1, '2023-07-21 10:53:50', '2023-07-21 10:53:50'),
(2, 'Test hu', 'ਦਥਫਭ', 25, 'Vb h h dhuv', 'ਦਝਦਥਢਢਦ ਥਧ', '$2y$10$lBDLe2KyXc9oP6N9ImxdquIfQmbriNMZrMc67.SwpL7vkHpFS90Qe', NULL, 'Hhhhj', 2580, '1234567890', 'Post Grad', '255808858686', 'yes', 'yes', 80, NULL, NULL, NULL, NULL, NULL, 'Gcgc', 'Yygcycyy', 1, 1, 8, 'Test Final', 'Volunteer', 'yes', 'Yes', NULL, NULL, NULL, NULL, 'AB+', 'Alawalpur', 'Test@gmail.com', '1236908524', '1984-1000002', 'dHRflAM8R1Gjx2nei-X57K:APA91bGRNTGbGDpaSSUN6f2lt4LcamzdTdhq25IzfFigAjDSVstnllmWd_EHhoHlS7oZ_UYKfn2uAhKEVW9e1FVKwKaPccfHf5SYxXuH2gYaypWIPqvhFomZQzbt_sum5R4ZkMBpml56', 1, '2023-07-25 08:47:14', '2023-07-25 08:47:14'),
(3, 'Dinkar12', 'ਦਿਨਕਰ', 21, 'Gssg', 'ਚਛਜਝਟਠਡ', '$2y$10$Bgt8Ibcd13wgDGyi442QfOJMwcjM5UIdPGPCe/zfqUOvw/7coFcnO', 'https://phpstack-102119-3232905.cloudwaysapps.com/storage/cardholderimg//1690278907image.png', 'Occ', 9876, '8467375819', 'below10', '946868664656', 'yes', 'yes', 1200, NULL, NULL, NULL, NULL, NULL, 'Att', 'Hod', 1, 1, 4, 'Dinkar', 'Volunteer', 'yes', 'Yes', NULL, NULL, NULL, NULL, 'B+', 'Amritsar cantonment', 'dink37@gmail.com', '9484546646', '1984-1000003', 'enkxx0xlS9CMpgXy6kRX0m:APA91bH8nf_7tQsVj8H_lyxwlnngVzltgK8iLuMwBmO2gaSIMEA9A00mbo77JcpmCTFtiq00F-m_D2r-otZLFh9QKImtIOF1e8i0Zpsn9XPwxSzxj6ICrTo8R-H7APfwhyxDnJCn9oXv', 1, '2023-07-25 09:55:07', '2023-07-25 09:55:07');

-- --------------------------------------------------------

--
-- Table structure for table `cardholders`
--

CREATE TABLE `cardholders` (
  `id` int(11) NOT NULL,
  `cardholder_id` int(21) DEFAULT NULL,
  `name` varchar(200) DEFAULT NULL,
  `age` varchar(50) DEFAULT NULL,
  `address` varchar(255) DEFAULT NULL,
  `annual_income` int(21) DEFAULT NULL,
  `own_house` varchar(50) DEFAULT NULL,
  `rent` varchar(50) DEFAULT NULL,
  `rent_price` int(21) DEFAULT NULL,
  `disease_time` varchar(100) DEFAULT NULL,
  `medical_detail` varchar(200) DEFAULT NULL,
  `foundation_detail` varchar(200) DEFAULT NULL,
  `foundation_help` varchar(200) DEFAULT NULL,
  `foundation_member` varchar(200) DEFAULT NULL,
  `govthelp` varchar(200) DEFAULT NULL,
  `help_amount` varchar(100) DEFAULT NULL,
  `agriculture` varchar(200) DEFAULT NULL,
  `cattle` varchar(200) DEFAULT NULL,
  `social_media` varchar(200) DEFAULT NULL,
  `gurudwara` varchar(200) DEFAULT NULL,
  `gurudwara_mgmt` varchar(200) DEFAULT NULL,
  `gurudwara_contact` bigint(20) DEFAULT NULL,
  `attesting_officer` varchar(200) DEFAULT NULL,
  `family_head` varchar(200) DEFAULT NULL,
  `volunteer_name` varchar(200) DEFAULT NULL,
  `volunteer_photo` varchar(255) DEFAULT NULL,
  `aadhaar_card` varchar(255) DEFAULT NULL,
  `two_wheeler` varchar(200) NOT NULL,
  `four_wheeler` varchar(200) DEFAULT NULL,
  `air_conditioner` varchar(200) DEFAULT NULL,
  `income_source` varchar(200) DEFAULT NULL,
  `blood_donor` varchar(100) DEFAULT NULL,
  `date` varchar(100) DEFAULT NULL,
  `volunteer_signature` varchar(200) DEFAULT NULL,
  `active_status` int(11) NOT NULL DEFAULT 0,
  `verify_status` int(11) NOT NULL DEFAULT 0,
  `company_name` varchar(255) DEFAULT NULL,
  `policy_number` varchar(255) DEFAULT NULL,
  `policy_issue_date` varchar(255) DEFAULT NULL,
  `policy_expiry_date` varchar(255) DEFAULT NULL,
  `add_id` int(21) DEFAULT NULL,
  `add_name` varchar(100) DEFAULT NULL,
  `add_type` varchar(100) DEFAULT NULL,
  `card_id` varchar(255) DEFAULT NULL,
  `fcm_token` varchar(255) DEFAULT NULL,
  `device_type` int(21) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `cardholders`
--

INSERT INTO `cardholders` (`id`, `cardholder_id`, `name`, `age`, `address`, `annual_income`, `own_house`, `rent`, `rent_price`, `disease_time`, `medical_detail`, `foundation_detail`, `foundation_help`, `foundation_member`, `govthelp`, `help_amount`, `agriculture`, `cattle`, `social_media`, `gurudwara`, `gurudwara_mgmt`, `gurudwara_contact`, `attesting_officer`, `family_head`, `volunteer_name`, `volunteer_photo`, `aadhaar_card`, `two_wheeler`, `four_wheeler`, `air_conditioner`, `income_source`, `blood_donor`, `date`, `volunteer_signature`, `active_status`, `verify_status`, `company_name`, `policy_number`, `policy_issue_date`, `policy_expiry_date`, `add_id`, `add_name`, `add_type`, `card_id`, `fcm_token`, `device_type`, `created_at`, `updated_at`) VALUES
(1, 2, 'Hhhhj', NULL, NULL, NULL, 'yes', NULL, NULL, 'More than 1 year', 'Edr', 'gcgcgcg\n\nhgj\ngcugcj\nhhcugc', 'Yes', 'Hhhv', 'No', NULL, 'Yfgcgc', 'Gc', 'Yes', 'Hfhg', '6868', 686, NULL, NULL, 'Jjigugjgjgjgjg', NULL, NULL, 'U', NULL, NULL, NULL, NULL, '07/25/23', NULL, 0, 0, 'Yfghvhvhcyfhv8hyg37t', 'Yyyg56868uyjuguyughug8u6e6e8u9ukbn rs3a3ygihihnbcyc9u9u9y4w4e8y', '14-07-2023', '18-05-2023', 8, 'Test Final', 'Volunteer', '1984-1000001', NULL, NULL, '2023-07-25 08:49:36', '2023-07-25 08:49:36'),
(2, 3, 'Patient', NULL, NULL, NULL, 'yes', NULL, NULL, 'Select suffering date', NULL, NULL, 'No', NULL, 'No', NULL, NULL, NULL, 'Yes', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '', NULL, NULL, NULL, NULL, '07/25/23', NULL, 0, 0, NULL, NULL, NULL, NULL, 4, 'Dinkar', 'Volunteer', '1984-1000002', NULL, NULL, '2023-07-25 09:55:24', '2023-07-25 09:55:24');

-- --------------------------------------------------------

--
-- Table structure for table `cardholder_children`
--

CREATE TABLE `cardholder_children` (
  `id` int(11) NOT NULL,
  `cardholder_id` int(21) NOT NULL,
  `cname` varchar(200) DEFAULT NULL,
  `camritdhari` varchar(200) DEFAULT NULL,
  `cage` varchar(200) DEFAULT NULL,
  `cqualification` varchar(200) DEFAULT NULL,
  `cfees` varchar(200) DEFAULT NULL,
  `cschool` varchar(200) DEFAULT NULL,
  `caadhaar` varchar(100) DEFAULT NULL,
  `crelation` varchar(50) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `cardholder_children`
--

INSERT INTO `cardholder_children` (`id`, `cardholder_id`, `cname`, `camritdhari`, `cage`, `cqualification`, `cfees`, `cschool`, `caadhaar`, `crelation`, `created_at`, `updated_at`) VALUES
(1, 1, 'priya', 'No', '18', 'below10', '1000', 'phagwara', '123456789101', 'Daughter', '2023-07-21 10:53:50', '2023-07-21 10:53:50'),
(2, 2, 'Yfg', 'yes', '68', 'Gfhch Ughvh', '356868', 'Yfhcgcgchcc Ughv', '686865555555', 'Daughter', '2023-07-25 08:48:15', '2023-07-25 08:48:15');

-- --------------------------------------------------------

--
-- Table structure for table `cardholder_data`
--

CREATE TABLE `cardholder_data` (
  `id` int(11) NOT NULL,
  `cardholder_id` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `cardholder_data`
--

INSERT INTO `cardholder_data` (`id`, `cardholder_id`) VALUES
(1, '1699-1000001');

-- --------------------------------------------------------

--
-- Table structure for table `cardholder_family`
--

CREATE TABLE `cardholder_family` (
  `id` int(11) NOT NULL,
  `cardholder_id` int(11) NOT NULL,
  `fname` varchar(200) DEFAULT NULL,
  `famritdhari` varchar(200) DEFAULT NULL,
  `fage` varchar(200) DEFAULT NULL,
  `fblood_group` varchar(100) DEFAULT NULL,
  `fqualification` varchar(200) DEFAULT NULL,
  `fjob` varchar(200) DEFAULT NULL,
  `fsalary` varchar(200) DEFAULT NULL,
  `faadhaar` varchar(100) DEFAULT NULL,
  `frelation` varchar(50) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `cardholder_family`
--

INSERT INTO `cardholder_family` (`id`, `cardholder_id`, `fname`, `famritdhari`, `fage`, `fblood_group`, `fqualification`, `fjob`, `fsalary`, `faadhaar`, `frelation`, `created_at`, `updated_at`) VALUES
(1, 1, 'Mohit', 'No', '25', 'B+', 'postgraduate', 'Tester', '10000', '123456789101', 'Brother', '2023-07-21 10:53:50', '2023-07-21 10:53:50'),
(2, 2, 'Trxg', 'yes', '25', 'O-', 'Engineering', 'Fxgcg', '8698968', '258099635585', 'Brother', '2023-07-25 08:47:46', '2023-07-25 08:47:46');

-- --------------------------------------------------------

--
-- Table structure for table `cardsdata`
--

CREATE TABLE `cardsdata` (
  `id` int(11) NOT NULL,
  `card_id` varchar(255) DEFAULT NULL,
  `type` varchar(255) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `cardsdata`
--

INSERT INTO `cardsdata` (`id`, `card_id`, `type`, `created_at`, `updated_at`) VALUES
(1, '1699-1000001', 'Cardholder', '2023-07-21 10:53:50', '2023-07-21 10:53:50'),
(2, '1699-1000002', 'Cardholder', '2023-07-25 08:47:14', '2023-07-25 08:47:14'),
(3, '1984-1000001', 'KhalsaMember', '2023-07-25 08:49:36', '2023-07-25 08:49:36'),
(4, '1984-1000003', 'Cardholder', '2023-07-25 09:55:07', '2023-07-25 09:55:07'),
(5, '1984-1000002', 'KhalsaMember', '2023-07-25 09:55:24', '2023-07-25 09:55:24');

-- --------------------------------------------------------

--
-- Table structure for table `carholders_images`
--

CREATE TABLE `carholders_images` (
  `id` int(11) NOT NULL,
  `cardholders_id` int(21) NOT NULL,
  `image` varchar(255) NOT NULL,
  `aadhaar_images` varchar(255) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `cities`
--

CREATE TABLE `cities` (
  `id` int(10) UNSIGNED NOT NULL,
  `state_id` int(10) UNSIGNED NOT NULL,
  `city` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `cities`
--

INSERT INTO `cities` (`id`, `state_id`, `city`, `created_at`) VALUES
(3127, 32, 'Abohar', '2020-10-26 14:09:00'),
(3128, 32, 'Adampur', '2020-10-26 14:09:00'),
(3129, 32, 'Ahmedgarh', '2020-10-26 14:09:00'),
(3130, 32, 'Ajnala', '2020-10-26 14:09:00'),
(3131, 32, 'Akalgarh', '2020-10-26 14:09:00'),
(3132, 32, 'Alawalpur', '2020-10-26 14:09:00'),
(3133, 32, 'Amloh', '2020-10-26 14:09:00'),
(3134, 32, 'Amritsar', '2020-10-26 14:09:00'),
(3135, 32, 'Amritsar cantonment', '2020-10-26 14:09:00'),
(3136, 32, 'Anandpur sahib', '2020-10-26 14:09:00'),
(3137, 32, 'Badhni kalan', '2020-10-26 14:09:00'),
(3138, 32, 'Bagh purana', '2020-10-26 14:09:00'),
(3139, 32, 'Balachaur', '2020-10-26 14:09:00'),
(3140, 32, 'Banaur', '2020-10-26 14:09:00'),
(3141, 32, 'Banga', '2020-10-26 14:09:00'),
(3142, 32, 'Banur', '2020-10-26 14:09:00'),
(3143, 32, 'Baretta', '2020-10-26 14:09:00'),
(3144, 32, 'Bariwala', '2020-10-26 14:09:00'),
(3145, 32, 'Barnala', '2020-10-26 14:09:00'),
(3146, 32, 'Bassi pathana', '2020-10-26 14:09:00'),
(3147, 32, 'Batala', '2020-10-26 14:09:00'),
(3148, 32, 'Bathinda', '2020-10-26 14:09:00'),
(3149, 32, 'Begowal', '2020-10-26 14:09:00'),
(3150, 32, 'Behrampur', '2020-10-26 14:09:00'),
(3151, 32, 'Bhabat', '2020-10-26 14:09:00'),
(3152, 32, 'Bhadur', '2020-10-26 14:09:00'),
(3153, 32, 'Bhankharpur', '2020-10-26 14:09:00'),
(3154, 32, 'Bharoli kalan', '2020-10-26 14:09:00'),
(3155, 32, 'Bhawanigarh', '2020-10-26 14:09:00'),
(3156, 32, 'Bhikhi', '2020-10-26 14:09:00'),
(3157, 32, 'Bhikhiwind', '2020-10-26 14:09:00'),
(3158, 32, 'Bhisiana', '2020-10-26 14:09:00'),
(3159, 32, 'Bhogpur', '2020-10-26 14:09:00'),
(3160, 32, 'Bhuch', '2020-10-26 14:09:00'),
(3161, 32, 'Bhulath', '2020-10-26 14:09:00'),
(3162, 32, 'Budha theh', '2020-10-26 14:09:00'),
(3163, 32, 'Budhlada', '2020-10-26 14:09:00'),
(3164, 32, 'Chima', '2020-10-26 14:09:00'),
(3165, 32, 'Chohal', '2020-10-26 14:09:00'),
(3166, 32, 'Dasuya', '2020-10-26 14:09:00'),
(3167, 32, 'Daulatpur', '2020-10-26 14:09:00'),
(3168, 32, 'Dera baba nanak', '2020-10-26 14:09:00'),
(3169, 32, 'Dera bassi', '2020-10-26 14:09:00'),
(3170, 32, 'Dhanaula', '2020-10-26 14:09:00'),
(3171, 32, 'Dharam kot', '2020-10-26 14:09:00'),
(3172, 32, 'Dhariwal', '2020-10-26 14:09:00'),
(3173, 32, 'Dhilwan', '2020-10-26 14:09:00'),
(3174, 32, 'Dhuri', '2020-10-26 14:09:00'),
(3175, 32, 'Dinanagar', '2020-10-26 14:09:00'),
(3176, 32, 'Dirba', '2020-10-26 14:09:00'),
(3177, 32, 'Doraha', '2020-10-26 14:09:00'),
(3178, 32, 'Faridkot', '2020-10-26 14:09:00'),
(3179, 32, 'Fateh nangal', '2020-10-26 14:09:00'),
(3180, 32, 'Fatehgarh churian', '2020-10-26 14:09:00'),
(3181, 32, 'Fatehgarh sahib', '2020-10-26 14:09:00'),
(3182, 32, 'Fazilka', '2020-10-26 14:09:00'),
(3183, 32, 'Firozpur', '2020-10-26 14:09:00'),
(3184, 32, 'Firozpur cantonment', '2020-10-26 14:09:00'),
(3185, 32, 'Gardhiwala', '2020-10-26 14:09:00'),
(3186, 32, 'Garhshankar', '2020-10-26 14:09:00'),
(3187, 32, 'Ghagga', '2020-10-26 14:09:00'),
(3188, 32, 'Ghanaur', '2020-10-26 14:09:00'),
(3189, 32, 'Giddarbaha', '2020-10-26 14:09:00'),
(3190, 32, 'Gobindgarh', '2020-10-26 14:09:00'),
(3191, 32, 'Goniana', '2020-10-26 14:09:00'),
(3192, 32, 'Goraya', '2020-10-26 14:09:00'),
(3193, 32, 'Gurdaspur', '2020-10-26 14:09:00'),
(3194, 32, 'Guru har sahai', '2020-10-26 14:09:00'),
(3195, 32, 'Hajipur', '2020-10-26 14:09:00'),
(3196, 32, 'Handiaya', '2020-10-26 14:09:00'),
(3197, 32, 'Hariana', '2020-10-26 14:09:00'),
(3198, 32, 'Hoshiarpur', '2020-10-26 14:09:00'),
(3199, 32, 'Hussainpur', '2020-10-26 14:09:00'),
(3200, 32, 'Jagraon', '2020-10-26 14:09:00'),
(3201, 32, 'Jaitu', '2020-10-26 14:09:00'),
(3202, 32, 'Jalalabad', '2020-10-26 14:09:00'),
(3203, 32, 'Jalandhar', '2020-10-26 14:09:00'),
(3204, 32, 'Jalandhar cantonment', '2020-10-26 14:09:00'),
(3205, 32, 'Jandiala', '2020-10-26 14:09:00'),
(3206, 32, 'Jugial', '2020-10-26 14:09:00'),
(3207, 32, 'Kalanaur', '2020-10-26 14:09:00'),
(3208, 32, 'Kapurthala', '2020-10-26 14:09:00'),
(3209, 32, 'Karoran', '2020-10-26 14:09:00'),
(3210, 32, 'Kartarpur', '2020-10-26 14:09:00'),
(3211, 32, 'Khamanon', '2020-10-26 14:09:00'),
(3212, 32, 'Khanauri', '2020-10-26 14:09:00'),
(3213, 32, 'Khanna', '2020-10-26 14:09:00'),
(3214, 32, 'Kharar', '2020-10-26 14:09:00'),
(3215, 32, 'Khem karan', '2020-10-26 14:09:00'),
(3216, 32, 'Kot fatta', '2020-10-26 14:09:00'),
(3217, 32, 'Kot isa khan', '2020-10-26 14:09:00'),
(3218, 32, 'Kot kapura', '2020-10-26 14:09:00'),
(3219, 32, 'Kotkapura', '2020-10-26 14:09:00'),
(3220, 32, 'Kurali', '2020-10-26 14:09:00'),
(3221, 32, 'Lalru', '2020-10-26 14:09:00'),
(3222, 32, 'Lehra gaga', '2020-10-26 14:09:00'),
(3223, 32, 'Lodhian khas', '2020-10-26 14:09:00'),
(3224, 32, 'Longowal', '2020-10-26 14:09:00'),
(3225, 32, 'Ludhiana', '2020-10-26 14:09:00'),
(3226, 32, 'Machhiwara', '2020-10-26 14:09:00'),
(3227, 32, 'Mahilpur', '2020-10-26 14:09:00'),
(3228, 32, 'Majitha', '2020-10-26 14:09:00'),
(3229, 32, 'Makhu', '2020-10-26 14:09:00'),
(3230, 32, 'Malaut', '2020-10-26 14:09:00'),
(3231, 32, 'Malerkotla', '2020-10-26 14:09:00'),
(3232, 32, 'Maloud', '2020-10-26 14:09:00'),
(3233, 32, 'Mandi gobindgarh', '2020-10-26 14:09:00'),
(3234, 32, 'Mansa', '2020-10-26 14:09:00'),
(3235, 32, 'Maur', '2020-10-26 14:09:00'),
(3236, 32, 'Moga', '2020-10-26 14:09:00'),
(3237, 32, 'Mohali', '2020-10-26 14:09:00'),
(3238, 32, 'Moonak', '2020-10-26 14:09:00'),
(3239, 32, 'Morinda', '2020-10-26 14:09:00'),
(3240, 32, 'Mukerian', '2020-10-26 14:09:00'),
(3241, 32, 'Muktsar', '2020-10-26 14:09:00'),
(3242, 32, 'Mullanpur dakha', '2020-10-26 14:09:00'),
(3243, 32, 'Mullanpur garibdas', '2020-10-26 14:09:00'),
(3244, 32, 'Munak', '2020-10-26 14:09:00'),
(3245, 32, 'Muradpura', '2020-10-26 14:09:00'),
(3246, 32, 'Nabha', '2020-10-26 14:09:00'),
(3247, 32, 'Nakodar', '2020-10-26 14:09:00'),
(3248, 32, 'Nangal', '2020-10-26 14:09:00'),
(3249, 32, 'Nawashahr', '2020-10-26 14:09:00'),
(3250, 32, 'Naya nangal', '2020-10-26 14:09:00'),
(3251, 32, 'Nehon', '2020-10-26 14:09:00'),
(3252, 32, 'Nurmahal', '2020-10-26 14:09:00'),
(3253, 32, 'Pathankot', '2020-10-26 14:09:00'),
(3254, 32, 'Patiala', '2020-10-26 14:09:00'),
(3255, 32, 'Patti', '2020-10-26 14:09:00'),
(3256, 32, 'Pattran', '2020-10-26 14:09:00'),
(3257, 32, 'Payal', '2020-10-26 14:09:00'),
(3258, 32, 'Phagwara', '2020-10-26 14:09:00'),
(3259, 32, 'Phillaur', '2020-10-26 14:09:00'),
(3260, 32, 'Qadian', '2020-10-26 14:09:00'),
(3261, 32, 'Rahon', '2020-10-26 14:09:00'),
(3262, 32, 'Raikot', '2020-10-26 14:09:00'),
(3263, 32, 'Raja sansi', '2020-10-26 14:09:00'),
(3264, 32, 'Rajpura', '2020-10-26 14:09:00'),
(3265, 32, 'Ram das', '2020-10-26 14:09:00'),
(3266, 32, 'Raman', '2020-10-26 14:09:00'),
(3267, 32, 'Rampura', '2020-10-26 14:09:00'),
(3268, 32, 'Rayya', '2020-10-26 14:09:00'),
(3269, 32, 'Rupnagar', '2020-10-26 14:09:00'),
(3270, 32, 'Rurki kasba', '2020-10-26 14:09:00'),
(3271, 32, 'Sahnewal', '2020-10-26 14:09:00'),
(3272, 32, 'Samana', '2020-10-26 14:09:00'),
(3273, 32, 'Samrala', '2020-10-26 14:09:00'),
(3274, 32, 'Sanaur', '2020-10-26 14:09:00'),
(3275, 32, 'Sangat', '2020-10-26 14:09:00'),
(3276, 32, 'Sangrur', '2020-10-26 14:09:00'),
(3277, 32, 'Sansarpur', '2020-10-26 14:09:00'),
(3278, 32, 'Sardulgarh', '2020-10-26 14:09:00'),
(3279, 32, 'Shahkot', '2020-10-26 14:09:00'),
(3280, 32, 'Sham churasi', '2020-10-26 14:09:00'),
(3281, 32, 'Shekhpura', '2020-10-26 14:09:00'),
(3282, 32, 'Sirhind', '2020-10-26 14:09:00'),
(3283, 32, 'Sri hargobindpur', '2020-10-26 14:09:00'),
(3284, 32, 'Sujanpur', '2020-10-26 14:09:00'),
(3285, 32, 'Sultanpur lodhi', '2020-10-26 14:09:00'),
(3286, 32, 'Sunam', '2020-10-26 14:09:00'),
(3287, 32, 'Talwandi bhai', '2020-10-26 14:09:00'),
(3288, 32, 'Talwara', '2020-10-26 14:09:00'),
(3289, 32, 'Tappa', '2020-10-26 14:09:00'),
(3290, 32, 'Tarn taran', '2020-10-26 14:09:00'),
(3291, 32, 'Urmar tanda', '2020-10-26 14:09:00'),
(3292, 32, 'Zira', '2020-10-26 14:09:00'),
(3293, 32, 'Zirakpur', '2020-10-26 14:09:00');

-- --------------------------------------------------------

--
-- Table structure for table `doctors`
--

CREATE TABLE `doctors` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `qualification` varchar(255) NOT NULL,
  `opd_timing` varchar(255) DEFAULT NULL,
  `opd_timing2` varchar(200) DEFAULT NULL,
  `specialization` varchar(255) NOT NULL,
  `days` varchar(255) DEFAULT NULL,
  `status` int(11) NOT NULL DEFAULT 0,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `doctors`
--

INSERT INTO `doctors` (`id`, `name`, `qualification`, `opd_timing`, `opd_timing2`, `specialization`, `days`, `status`, `created_at`, `updated_at`) VALUES
(2, 'Dr. Mohan', 'MBBS', NULL, NULL, 'operation', NULL, 1, '2023-07-21 11:36:04', '2023-07-24 09:17:58'),
(3, 'Dr. Kalyaan', 'MBBS', NULL, NULL, 'operation', NULL, 1, '2023-07-21 11:36:05', '2023-07-24 09:17:10'),
(4, 'Dr. Pritam', 'MBBS', NULL, NULL, 'Blood', NULL, 1, '2023-07-21 11:36:21', '2023-07-24 09:16:50'),
(5, 'Dr. Ranjit', 'MBBS', NULL, NULL, 'BP checkupp', NULL, 0, '2023-07-25 10:48:28', '2023-07-25 10:48:38');

-- --------------------------------------------------------

--
-- Table structure for table `doctor_timing`
--

CREATE TABLE `doctor_timing` (
  `id` int(11) NOT NULL,
  `doctor_id` int(21) NOT NULL,
  `day` varchar(200) DEFAULT NULL,
  `timing` varchar(200) DEFAULT NULL,
  `timing1` varchar(200) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `uuid` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `connection` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `feedbacks`
--

CREATE TABLE `feedbacks` (
  `id` int(11) NOT NULL,
  `title` varchar(255) NOT NULL,
  `description` text NOT NULL,
  `type` varchar(255) DEFAULT NULL,
  `add_id` varchar(100) DEFAULT NULL,
  `add_name` varchar(255) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `feedbacks`
--

INSERT INTO `feedbacks` (`id`, `title`, `description`, `type`, `add_id`, `add_name`, `created_at`, `updated_at`) VALUES
(1, 'Good', 'Good', 'Volunteer', '2', 'Arinder', '2023-07-21 11:48:50', '2023-07-21 11:48:50'),
(3, 'Maan hospital', 'good work .', 'Sewapartner', '4', 'Maanhospital', '2023-07-24 05:54:03', '2023-07-24 05:54:03'),
(4, 'Rdr', 'Gcggcg', 'Volunteer', '8', 'Test Final', '2023-07-25 08:50:17', '2023-07-25 08:50:17');

-- --------------------------------------------------------

--
-- Table structure for table `khalsa_pariwar_link`
--

CREATE TABLE `khalsa_pariwar_link` (
  `id` int(11) NOT NULL,
  `link` text NOT NULL,
  `status` tinyint(4) NOT NULL DEFAULT 0,
  `created_at` datetime NOT NULL DEFAULT current_timestamp(),
  `updated_at` datetime NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `khalsa_pariwar_link`
--

INSERT INTO `khalsa_pariwar_link` (`id`, `link`, `status`, `created_at`, `updated_at`) VALUES
(1, 'https://www.youtube.com/', 0, '2023-07-24 08:10:06', '2023-07-24 09:08:17');

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_resets_table', 1),
(3, '2019_08_19_000000_create_failed_jobs_table', 1),
(4, '2019_12_14_000001_create_personal_access_tokens_table', 1),
(5, '2022_12_12_110834_create_techers_table', 1),
(6, '2022_12_12_110848_create_teachers_table', 1),
(7, '2022_12_12_110908_create_students_table', 1),
(8, '2022_12_12_110924_create_homework_table', 1),
(9, '2022_12_13_062655_create_principals_table', 1),
(10, '2022_12_19_064830_create_assigned_classes_table', 2);

-- --------------------------------------------------------

--
-- Table structure for table `notifications`
--

CREATE TABLE `notifications` (
  `id` int(11) NOT NULL,
  `category` varchar(255) NOT NULL,
  `title` varchar(255) CHARACTER SET utf8mb4 NOT NULL,
  `description` text CHARACTER SET utf8mb4 DEFAULT NULL,
  `image` varchar(255) DEFAULT NULL,
  `location` varchar(255) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `notifications`
--

INSERT INTO `notifications` (`id`, `category`, `title`, `description`, `image`, `location`, `created_at`, `updated_at`) VALUES
(3, 'Volunteer', 'blood B+', 'blood B+', 'https://phpstack-102119-3232905.cloudwaysapps.com/storage/volunteer//1689941897download.png', 'Ahmedgarh', '2023-07-21 12:18:17', '2023-07-21 12:18:17'),
(4, 'Sewapartner', 'blood B+', 'blood B+', 'https://phpstack-102119-3232905.cloudwaysapps.com/storage/volunteer//1689944212download.png', 'Phagwara', '2023-07-21 12:18:17', '2023-07-21 12:56:52'),
(5, 'Volunteer', 'Notification', 'Desccc', 'https://phpstack-102119-3232905.cloudwaysapps.com/storage/volunteer//1690184859checked0.png', 'Phagwara', '2023-07-24 07:47:39', '2023-07-24 07:47:39'),
(6, 'Card_Holder', 'Title 1', 'Desccccc', 'https://phpstack-102119-3232905.cloudwaysapps.com/storage/volunteer//1690184906man.jpg', 'Phagwara', '2023-07-24 07:48:26', '2023-07-24 07:48:26'),
(7, 'Card_Holder', 'Title 2', 'Desc2', 'https://phpstack-102119-3232905.cloudwaysapps.com/public/images/bell.jpg', 'Adampur', '2023-07-24 07:50:00', '2023-07-24 07:50:00'),
(8, 'Card_Holder', 'Title 3', 'desccc', 'https://phpstack-102119-3232905.cloudwaysapps.com/public/images/bell.jpg', 'Adampur', '2023-07-24 07:52:01', '2023-07-24 07:52:01'),
(9, 'Card_Holder', 'Jimmy Tester', 'Desc', 'https://phpstack-102119-3232905.cloudwaysapps.com/public/images/bell.jpg', 'Ajnala', '2023-07-24 07:52:58', '2023-07-24 07:52:58'),
(10, 'Card_Holder', 'Tester', 'tes', 'https://phpstack-102119-3232905.cloudwaysapps.com/public/images/bell.jpg', 'Akalgarh', '2023-07-24 07:54:56', '2023-07-24 07:54:56'),
(11, 'Volunteer', 'Notification3', 'Desc', 'https://phpstack-102119-3232905.cloudwaysapps.com/public/images/bell.jpg', 'Ajnala', '2023-07-25 05:44:23', '2023-07-25 05:44:23'),
(12, 'Volunteer', 'Noti4', 'desc111', 'https://phpstack-102119-3232905.cloudwaysapps.com/public/images/bell.jpg', 'Akalgarh', '2023-07-25 05:50:54', '2023-07-25 10:51:25');

-- --------------------------------------------------------

--
-- Table structure for table `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `personal_access_tokens`
--

CREATE TABLE `personal_access_tokens` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `tokenable_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tokenable_id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(64) COLLATE utf8mb4_unicode_ci NOT NULL,
  `abilities` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `last_used_at` timestamp NULL DEFAULT NULL,
  `expires_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `request_blood`
--

CREATE TABLE `request_blood` (
  `id` int(11) NOT NULL,
  `name` varchar(200) NOT NULL,
  `contact_number` varchar(100) DEFAULT NULL,
  `address` varchar(255) DEFAULT NULL,
  `hospital_name` varchar(200) DEFAULT NULL,
  `blood_group` varchar(200) DEFAULT NULL,
  `requirement_details` varchar(255) DEFAULT NULL,
  `status` int(21) NOT NULL DEFAULT 0,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `request_blood`
--

INSERT INTO `request_blood` (`id`, `name`, `contact_number`, `address`, `hospital_name`, `blood_group`, `requirement_details`, `status`, `created_at`, `updated_at`) VALUES
(1, 'Jimmy', '9188722102', 'Phagwara - Hoshiarpur Road, Phagwara Hoshiarpur Rd, Punjab 146001, India', 'Doaba', 'B-', 'Blood group B-', 1, '2023-07-21 17:20:53', '2023-07-24 05:14:10'),
(2, 'Shaan', '9188722102', 'Phagwara - Hoshiarpur Road, Phagwara Hoshiarpur Rd, Punjab 146001, India', 'Rayat hospital', 'A-', 'A-', 1, '2023-07-21 18:03:34', '2023-07-21 12:33:53'),
(3, 'priya', '8872210204', 'Phagwara', 'maan hospital', 'AB+', 'Blood group AB+', 1, '2023-07-24 11:25:08', '2023-07-24 05:55:30');

-- --------------------------------------------------------

--
-- Table structure for table `services`
--

CREATE TABLE `services` (
  `id` int(11) NOT NULL,
  `service` varchar(255) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `services`
--

INSERT INTO `services` (`id`, `service`, `created_at`, `updated_at`) VALUES
(1, 'Lithotripsy', '2023-07-21 09:39:58', '2023-07-21 09:39:58'),
(2, 'Blood test', '2023-07-21 11:16:13', '2023-07-21 11:16:13'),
(3, 'Blood test11', '2023-07-21 11:16:25', '2023-07-21 11:16:32'),
(4, 'Emergency 123', '2023-07-25 07:49:57', '2023-07-25 10:48:49'),
(5, 'Blood test', '2023-07-25 10:48:56', '2023-07-25 10:48:56');

-- --------------------------------------------------------

--
-- Table structure for table `sewapartners`
--

CREATE TABLE `sewapartners` (
  `id` int(255) NOT NULL,
  `name` varchar(200) NOT NULL,
  `email` varchar(255) NOT NULL,
  `username` varchar(255) DEFAULT NULL,
  `profile` varchar(100) DEFAULT NULL,
  `contactnumber` varchar(200) NOT NULL,
  `password` varchar(200) NOT NULL,
  `numpassword` varchar(200) DEFAULT NULL,
  `sewa_address` varchar(200) NOT NULL,
  `village` varchar(100) DEFAULT NULL,
  `categories` varchar(255) NOT NULL,
  `timings` varchar(200) DEFAULT NULL,
  `timings2` varchar(200) DEFAULT NULL,
  `services` varchar(200) DEFAULT NULL,
  `doctor_name` varchar(255) DEFAULT NULL,
  `doctor_qualification` varchar(255) DEFAULT NULL,
  `opd_timing` varchar(255) DEFAULT NULL,
  `active_status` int(11) NOT NULL DEFAULT 0,
  `badge_status` int(21) NOT NULL DEFAULT 0,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `web_token` text DEFAULT NULL,
  `is_deleted` varchar(2) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `sewapartners`
--

INSERT INTO `sewapartners` (`id`, `name`, `email`, `username`, `profile`, `contactnumber`, `password`, `numpassword`, `sewa_address`, `village`, `categories`, `timings`, `timings2`, `services`, `doctor_name`, `doctor_qualification`, `opd_timing`, `active_status`, `badge_status`, `created_at`, `updated_at`, `web_token`, `is_deleted`) VALUES
(1, 'Rayat Hospital', 'rayatrayat@gmail.com', 'Rayat', 'https://phpstack-102119-3232905.cloudwaysapps.com/storage/sewapartnerimg//1689931922jpg', '9464258788', '$2y$10$ttCEenoiakJf2Ax62qfRzewgEcSWyr.nLZdrfJgrSDMN.llwai2F2', '12345678', '188 Kings Street', 'Abohar', 'Hospital', '24*7', NULL, NULL, NULL, NULL, NULL, 1, 1, '2023-07-21 09:32:02', '2023-07-21 09:40:13', 'cKRP1zgYI69gs2LMIH1KHP:APA91bF3APG3QSAU329OvXKZF30LJUu-AGuzRdJdT12mYpUdnibLnpQ_9c4Kc5DpEjUG0O-XGX86BZq0TgGR6cnMalPD2bIB3wtof9GXsWkTYbJZIX7qsEY8JY199-6cl_SMSnCV5Q07', '0'),
(2, 'Doaba hospital', 'Doabahospital@gmail.com', 'Doabahospital', 'https://phpstack-102119-3232905.cloudwaysapps.com/storage/sewapartnerimg//1689939237png', '98722226227', '$2y$10$AkdXC8iHEHppJfDZeIINIOOZDG0rPHifPwoo/3VHWEukHvNnM64jO', '12345678', 'Phagwara', 'Phagwara', 'Hospital', NULL, NULL, NULL, NULL, NULL, NULL, 1, 1, '2023-07-21 11:33:57', '2023-07-21 11:37:40', NULL, '0'),
(3, 'medical storeMS', 'medicalstore@gmail.com', 'medical store22', NULL, '9872210204', '$2y$10$IZM8MkqNWMXT6BwbcvnpWeZtmme4.Q5zFssRRVq9MJJgBuPobDtv6', '123456789', 'moga', 'Moga', 'Clinic', '09:45', '14:45', NULL, NULL, NULL, NULL, 1, 1, '2023-07-24 04:16:06', '2023-07-25 10:46:44', NULL, '0'),
(8, 'Mohan12', 'mohan@gmail.com', 'mohan@gmail.com', 'https://phpstack-102119-3232905.cloudwaysapps.com/storage/sewapartnerimg//1690199143png', '1234567890', '$2y$10$dEpweNkbqvRmZIallEuLA.RHYPiu3bYau779L6qiXTQeCs05HPr0a', '12345678', 'Phagwara', 'Phagwara', 'Hospital', NULL, NULL, NULL, NULL, NULL, NULL, 1, 0, '2023-07-24 11:45:43', '2023-07-25 10:44:28', NULL, '0'),
(9, 'hospitalABCD', 'hospitalABC@gmail.com', 'hospitalABC', 'https://phpstack-102119-3232905.cloudwaysapps.com/storage/sewapartnerimg//1690282055png', '1234567898', '$2y$10$XE9toD0J9h8VXUpkMAfN..PZIIeEDfXv6jsEuYGEGrKocnVDr1lWe', '123456789', 'Phagwara', 'Phagwara', 'Hospital', NULL, NULL, NULL, NULL, NULL, NULL, 0, 0, '2023-07-25 10:47:35', '2023-07-25 10:47:49', NULL, '0');

-- --------------------------------------------------------

--
-- Table structure for table `sewapartner_account`
--

CREATE TABLE `sewapartner_account` (
  `id` int(11) NOT NULL,
  `cardholder_id` varchar(200) DEFAULT NULL,
  `sewapartner_id` varchar(100) DEFAULT NULL,
  `sewapartner_category` varchar(100) DEFAULT NULL,
  `doctor_name` varchar(200) DEFAULT NULL,
  `description` varchar(200) NOT NULL,
  `charges` varchar(200) NOT NULL,
  `discount` varchar(200) DEFAULT NULL,
  `balance` varchar(200) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `sewapartner_account`
--

INSERT INTO `sewapartner_account` (`id`, `cardholder_id`, `sewapartner_id`, `sewapartner_category`, `doctor_name`, `description`, `charges`, `discount`, `balance`, `created_at`, `updated_at`) VALUES
(1, '1699-1000001', '8', 'Hospital', 'Dr. Pritam', 'Blood Test', '180', '30', '150', '2023-07-24 12:07:54', '2023-07-24 12:07:54');

-- --------------------------------------------------------

--
-- Table structure for table `sewapartner_doctors`
--

CREATE TABLE `sewapartner_doctors` (
  `id` int(11) NOT NULL,
  `sewapartner_id` int(11) NOT NULL,
  `doctor_id` int(21) DEFAULT NULL,
  `doctor_name` varchar(200) DEFAULT NULL,
  `day` varchar(200) DEFAULT NULL,
  `timing` varchar(200) DEFAULT NULL,
  `timing1` varchar(200) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `is_deleted` varchar(2) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `sewapartner_doctors`
--

INSERT INTO `sewapartner_doctors` (`id`, `sewapartner_id`, `doctor_id`, `doctor_name`, `day`, `timing`, `timing1`, `created_at`, `updated_at`, `is_deleted`) VALUES
(19, 8, 4, NULL, 'Monday', '10:32', '11:33', '2023-07-25 05:02:46', '2023-07-25 05:02:46', '0');

-- --------------------------------------------------------

--
-- Table structure for table `sewapartner_notifications`
--

CREATE TABLE `sewapartner_notifications` (
  `id` int(11) NOT NULL,
  `title` varchar(100) NOT NULL,
  `description` text NOT NULL,
  `location` varchar(255) DEFAULT NULL,
  `image` varchar(255) DEFAULT NULL,
  `status` int(11) NOT NULL DEFAULT 0,
  `sewapartner_id` int(21) DEFAULT NULL,
  `sewapartner_name` varchar(255) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `is_deleted` varchar(2) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `sewapartner_notifications`
--

INSERT INTO `sewapartner_notifications` (`id`, `title`, `description`, `location`, `image`, `status`, `sewapartner_id`, `sewapartner_name`, `created_at`, `updated_at`, `is_deleted`) VALUES
(1, 'Need blood gorp A+', 'Need blood gorp A+', 'Banga', 'https://phpstack-102119-3232905.cloudwaysapps.com/public/images/bell.jpg', 1, 4, 'Maanhospital', '2023-07-24 05:04:03', '2023-07-24 05:06:07', '0'),
(2, 'blood AB+', 'blood AB+', 'Banaur', 'https://phpstack-102119-3232905.cloudwaysapps.com/public/images/bell.jpg', 1, 4, 'Maanhospital', '2023-07-24 05:09:40', '2023-07-24 05:09:57', '0'),
(3, 'notification', 'notification', 'Badhni kalan', 'https://phpstack-102119-3232905.cloudwaysapps.com/public/images/bell.jpg', 1, 4, 'Maanhospital', '2023-07-24 05:11:10', '2023-07-24 05:12:31', '0');

-- --------------------------------------------------------

--
-- Table structure for table `sewapartner_services`
--

CREATE TABLE `sewapartner_services` (
  `id` int(11) NOT NULL,
  `sewapartner_id` int(21) NOT NULL,
  `service_id` int(21) DEFAULT NULL,
  `service_name` varchar(200) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `is_deleted` varchar(2) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `sewapartner_services`
--

INSERT INTO `sewapartner_services` (`id`, `sewapartner_id`, `service_id`, `service_name`, `created_at`, `updated_at`, `is_deleted`) VALUES
(1, 1, NULL, 'Lithotripsy', '2023-07-21 09:40:13', '2023-07-21 09:40:13', '0'),
(4, 2, NULL, 'Lithotripsy', '2023-07-21 11:37:40', '2023-07-21 11:37:40', '0'),
(5, 2, NULL, 'Blood test', '2023-07-21 11:37:40', '2023-07-21 11:37:40', '0'),
(14, 5, NULL, 'Blood test', '2023-07-24 04:28:09', '2023-07-24 04:28:09', '0'),
(15, 5, NULL, 'Blood test11', '2023-07-24 04:28:09', '2023-07-24 04:28:09', '0'),
(24, 4, NULL, 'Lithotripsy', '2023-07-24 06:01:22', '2023-07-24 06:01:22', '0'),
(25, 4, NULL, 'Blood test', '2023-07-24 06:01:22', '2023-07-24 06:01:22', '0'),
(26, 4, NULL, 'Blood test11', '2023-07-24 06:01:22', '2023-07-24 06:01:22', '0'),
(27, 6, NULL, 'Lithotripsy', '2023-07-24 09:20:31', '2023-07-24 09:24:00', '1'),
(28, 6, NULL, 'Blood test', '2023-07-24 09:20:31', '2023-07-24 09:24:00', '1'),
(39, 8, NULL, 'Lithotripsy', '2023-07-25 10:44:28', '2023-07-25 10:44:28', '0'),
(40, 8, NULL, 'Blood test', '2023-07-25 10:44:28', '2023-07-25 10:44:28', '0'),
(41, 8, NULL, 'Blood test11', '2023-07-25 10:44:28', '2023-07-25 10:44:28', '0'),
(44, 3, NULL, 'Blood test', '2023-07-25 10:46:44', '2023-07-25 10:46:44', '0'),
(45, 3, NULL, 'Blood test11', '2023-07-25 10:46:44', '2023-07-25 10:46:44', '0'),
(50, 9, NULL, 'Blood test', '2023-07-25 10:47:49', '2023-07-25 10:47:49', '0'),
(51, 9, NULL, 'Blood test11', '2023-07-25 10:47:49', '2023-07-25 10:47:49', '0');

-- --------------------------------------------------------

--
-- Table structure for table `subadmins`
--

CREATE TABLE `subadmins` (
  `id` int(255) NOT NULL,
  `name` varchar(200) NOT NULL,
  `email` varchar(200) NOT NULL,
  `password` varchar(200) NOT NULL,
  `numpassword` varchar(200) DEFAULT NULL,
  `contact_number` varchar(100) NOT NULL,
  `username` varchar(255) DEFAULT NULL,
  `village` varchar(255) DEFAULT NULL,
  `landmark` varchar(255) DEFAULT NULL,
  `address` varchar(200) NOT NULL,
  `active_status` int(21) NOT NULL DEFAULT 0,
  `created_at` varchar(100) NOT NULL,
  `updated_at` varchar(100) NOT NULL,
  `web_token` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `subadmins`
--

INSERT INTO `subadmins` (`id`, `name`, `email`, `password`, `numpassword`, `contact_number`, `username`, `village`, `landmark`, `address`, `active_status`, `created_at`, `updated_at`, `web_token`) VALUES
(2, 'Subadmin', 'Subadmin@gmail.com', '$2y$10$J29Oh9fjYzrqXVdOI54NCOKqNQcJUOJO..ulQopg8aBym.r2p8O6e', '12345678', '9872711717', 'Subadmin', 'Tarn taran', 'taran taran', 'taran taran2', 1, '2023-07-24 10:48:28', '2023-07-24 10:48:28', NULL),
(3, 'jimmy', 'jimmy@gmail.com', '$2y$10$kGoYlpY.Vm6B1bym0d793Oe76vj6mlXqJ0GFF5F6jVQ5XWTrrvUNu', '123456789', '9872226227', 'jimmy', 'Adampur', 'adampur bus stand', 'adampur', 1, '2023-07-25 16:16:05', '2023-07-25 16:16:05', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `supports`
--

CREATE TABLE `supports` (
  `id` int(11) NOT NULL,
  `phone_number` varchar(100) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `supports`
--

INSERT INTO `supports` (`id`, `phone_number`, `created_at`, `updated_at`) VALUES
(1, '9876543210', '2023-07-24 08:10:37', '2023-07-24 11:19:52');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `email_verified_at`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'Admin', 'admin@gmail.com', NULL, '$2y$10$RaMbXaWM5fzz8xQHFbppXexLcjFIqxY/KopOZCxIE/e85CFxvJ9c6', NULL, '2023-01-18 01:32:30', '2023-01-18 01:32:30');

-- --------------------------------------------------------

--
-- Table structure for table `vacancies`
--

CREATE TABLE `vacancies` (
  `id` int(10) UNSIGNED NOT NULL,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `eligibility` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `location` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `salary` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` tinyint(4) NOT NULL DEFAULT 0,
  `created_at` timestamp NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `vacancies`
--

INSERT INTO `vacancies` (`id`, `title`, `description`, `eligibility`, `location`, `salary`, `status`, `created_at`, `updated_at`) VALUES
(1, 'doctor', 'MBBS dr.', 'MBBS', 'Adampur', '25000', 0, '2023-07-21 12:15:35', '2023-07-21 12:15:35');

-- --------------------------------------------------------

--
-- Table structure for table `volunteers`
--

CREATE TABLE `volunteers` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `name_punjabi` varchar(255) DEFAULT NULL,
  `username` varchar(255) DEFAULT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(200) NOT NULL,
  `numpassword` varchar(200) DEFAULT NULL,
  `contact_number` varchar(255) NOT NULL,
  `aadhaar_card_front` varchar(255) DEFAULT NULL,
  `aadhaar_card_back` varchar(255) DEFAULT NULL,
  `vote_card` varchar(255) DEFAULT NULL,
  `profile_pic` varchar(255) DEFAULT NULL,
  `address` varchar(255) NOT NULL,
  `address_punjabi` text DEFAULT NULL,
  `active_status` int(11) NOT NULL DEFAULT 0,
  `village` varchar(255) DEFAULT NULL,
  `landmark` varchar(255) DEFAULT NULL,
  `reference` varchar(200) DEFAULT NULL,
  `fcm_token` varchar(255) DEFAULT NULL,
  `device_type` int(21) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `volunteers`
--

INSERT INTO `volunteers` (`id`, `name`, `name_punjabi`, `username`, `email`, `password`, `numpassword`, `contact_number`, `aadhaar_card_front`, `aadhaar_card_back`, `vote_card`, `profile_pic`, `address`, `address_punjabi`, `active_status`, `village`, `landmark`, `reference`, `fcm_token`, `device_type`, `created_at`, `updated_at`) VALUES
(1, 'Tester', 'ਜਿਮੀ', 'Tester', 'Tester12@gmail.com', '$2y$10$i46dEpWOkZJ9GGr/QcsUDeiX60Na4VzPTttfnR./NX6tL65wT9Qj6', '12345678', '9872234567', 'https://phpstack-102119-3232905.cloudwaysapps.com/storage/volunteer//168993466834 (B) (2).jpg', 'https://phpstack-102119-3232905.cloudwaysapps.com/storage/volunteer//168993466834 (B) (1).jpg', 'https://phpstack-102119-3232905.cloudwaysapps.com/storage/volunteer//1689934668Image 36 (2).jpg', 'https://phpstack-102119-3232905.cloudwaysapps.com/storage/volunteer//168993474234 (B) (2).jpg', 'Phagwara', 'ਫਗਵਾੜਾ', 1, 'Phagwara', 'phagwara', NULL, 'f3BtHcS3T2SRbKIlNslA_0:APA91bFT665oAmUCgyafYQKdSwQbOH2KaOzG2YwhvOrN1QAzh_2W1oww2G7h6jrksNA15LIQHb94blTe07RdE-3c4SB_Dip0-1Z634gQC1R3pdBUzRTJl4iZHpD1ulN14YEzYCfH8AvB', 1, '2023-07-21 10:17:48', '2023-07-24 11:53:30'),
(2, 'Arinder', 'ਅਰਿੰਦਰ', 'Arinder', 'Arinder@gmail.com', '$2y$10$sjIjGi4T1GmjLBp0YN2RN.0UWOsNgkZll2ZfrEMF9N3CnHP.YoLu.', '123456789', '9872711717', 'https://phpstack-102119-3232905.cloudwaysapps.com/storage/volunteer//1689938670download.png', 'https://phpstack-102119-3232905.cloudwaysapps.com/storage/volunteer//1689938670download.png', 'https://phpstack-102119-3232905.cloudwaysapps.com/storage/volunteer//1689938670download.png', 'https://phpstack-102119-3232905.cloudwaysapps.com/storage/volunteer//1689938670download.png', 'moga', 'ਮੋਗਾ', 1, 'Moga', 'moga', NULL, NULL, NULL, '2023-07-21 11:24:30', '2023-07-24 07:59:48'),
(4, 'Dinkar', 'ਦਿਨਕਰ', 'Dinkar', 'dinkar@gmail.com', '$2y$10$KJPDYJOCCWFvPiC63DcJ6enqHAdgsvvrJqTEf4TNEZ2o3yA/qx81.', '12345678', '9876543210', 'https://phpstack-102119-3232905.cloudwaysapps.com/storage/volunteer//1690182103checked0.png', 'https://phpstack-102119-3232905.cloudwaysapps.com/storage/volunteer//1690182103checked1.png', 'https://phpstack-102119-3232905.cloudwaysapps.com/storage/volunteer//1690182103userrrr.jpeg', 'https://phpstack-102119-3232905.cloudwaysapps.com/storage/volunteer//1690182103man.jpg', '557-6308 Ram nagar', '557-6308 ਰਾਮ ਨਗਰ', 1, 'Phagwara', 'Near ram temple', NULL, 'ec46EjN7QA2YgoCQi8vxtN:APA91bGRZDUJG1KKOYBmY7kBT_Fs9v-DXclUlgRG_5Xstud2DrJdJ-SBLOH9VcJ35V5Xx60W9URalu70trBCL4vbo8Q94XOym9HWwKWO0zosoQzff2stc8zPvwc4l77JGBwmKUwzVnBQ', 1, '2023-07-24 07:01:43', '2023-07-24 08:13:21'),
(5, 'Ranjit', 'ਰਣਜੀਤ', 'Ranjit Ranjit', 'Ranjit@gmail.com', '$2y$10$VB9OMjkrKSAwuzVer0glxO25MHDX80P3vZ7pLCe7f8kkCuKJfTIQy', '123456789', '9872226227', 'https://phpstack-102119-3232905.cloudwaysapps.com/storage/volunteer//1690182133download.png', 'https://phpstack-102119-3232905.cloudwaysapps.com/storage/volunteer//1690182133download.png', 'https://phpstack-102119-3232905.cloudwaysapps.com/storage/volunteer//1690182133download.png', 'https://phpstack-102119-3232905.cloudwaysapps.com/storage/volunteer//1690182133download.png', 'Phagwara', 'ਫਗਵਾੜਾ', 0, 'Phagwara', 'phagwara', NULL, NULL, NULL, '2023-07-24 07:02:13', '2023-07-24 07:02:13'),
(6, 'Khushwinder', 'ਖੁਸ਼ਵਿੰਦਰ', 'Khushwinder123', 'Khushwinder@gmail.com', '$2y$10$UGrLikY2fBiqa4ZbLJQdYOOy8csCxDDwpfm30JfiCY7uIFDdQZDAu', '123456789', '9872226227', 'https://phpstack-102119-3232905.cloudwaysapps.com/storage/volunteer//1690182227download.png', 'https://phpstack-102119-3232905.cloudwaysapps.com/storage/volunteer//1690182227download.png', 'https://phpstack-102119-3232905.cloudwaysapps.com/storage/volunteer//1690182227download.png', 'https://phpstack-102119-3232905.cloudwaysapps.com/storage/volunteer//1690182227download.png', 'Phagwara', 'ਫਗਵਾੜਾ', 0, 'Phagwara', 'phagwara', NULL, NULL, NULL, '2023-07-24 07:03:47', '2023-07-24 07:03:47'),
(7, 'ragvinder', 'ਰਗਵਿੰਦਰ ਕੌਰ', 'ragvinder kaur', 'ragvinder@gmail.com', '$2y$10$bygCFCSLD9Baq6iioysSEOXiTLWxuEOMiP6fLr7zLLIIfpcia4uRq', '12345678', '1234567891', 'https://phpstack-102119-3232905.cloudwaysapps.com/storage/volunteer//1690182583q.png', 'https://phpstack-102119-3232905.cloudwaysapps.com/storage/volunteer//1690182583q.png', 'https://phpstack-102119-3232905.cloudwaysapps.com/storage/volunteer//1690182583q.png', 'https://phpstack-102119-3232905.cloudwaysapps.com/storage/volunteer//1690182583q.png', 'phagwara', 'ਫਗਵਾੜਾ', 0, 'Phagwara', 'phagwara', NULL, NULL, NULL, '2023-07-24 07:09:43', '2023-07-24 07:09:43'),
(8, 'Test Final', 'ਅੰਤਮ ਟੈਸਟਿੰਗ', 'appvol', 'admin@gmail.com', '$2y$10$f29MjyiCnpCusKEi7Ww.XeaN7Yhv1New2fYlLDVHb4VoGBfCZBcUW', '12345678', '987654321', 'https://phpstack-102119-3232905.cloudwaysapps.com/storage/volunteer//1690271338sukhwinder singh.png', 'https://phpstack-102119-3232905.cloudwaysapps.com/storage/volunteer//1690271338sukhwinder singh.png', 'https://phpstack-102119-3232905.cloudwaysapps.com/storage/volunteer//1690271338PHOTO-2023-07-05-14-46-54.jpg', 'https://phpstack-102119-3232905.cloudwaysapps.com/storage/volunteer//1690271338PHOTO-2023-07-04-18-47-55.jpg', 'Uttam towers, Phase 8b industrial area mohali', 'ਅੰਤਮ ਟੈਸਟਿੰਗ address', 1, 'Mohali', 'yetdhf', NULL, 'fqbhP6UdQ2GItILglQiAMX:APA91bHmF-FDnkc6MVmAQx7nJhmsiRJiyJbleTr6DWV33-i_zulvfYZdkGAe8dLQMlG2ieKLhcnZOPzIGyLB4S2TXxXRj7B9prJOLC7dR5gQQqHtAHUvOWgam7_z3ddpseMiIEvmnmtb', 1, '2023-07-25 07:48:58', '2023-07-25 07:50:26'),
(9, 'jimmy jimmy', 'ਜਿੰਮੀ ਕੈਂਥ', 'jimmy1243', 'jimmy12@gmail.com', '$2y$10$GKvkhhjhqLwCN7EQXI1yk.AV6TZ8.SHTgEhPsKgIZvJZe9IwZ08nC', '123456789', '9872226227', 'https://phpstack-102119-3232905.cloudwaysapps.com/storage/volunteer//1690282224download.png', 'https://phpstack-102119-3232905.cloudwaysapps.com/storage/volunteer//1690282224download.png', 'https://phpstack-102119-3232905.cloudwaysapps.com/storage/volunteer//1690282224download.png', 'https://phpstack-102119-3232905.cloudwaysapps.com/storage/volunteer//1690282224download.png', 'Phagwara', 'ਫਗਵਾੜਾ', 0, 'Phagwara', 'phagwara', 'Tester', NULL, NULL, '2023-07-25 10:50:24', '2023-07-25 10:50:38'),
(10, 'Progress dialog', 'Test Test', 'progress@gmail.com', 'min@gmail.com', '$2y$10$KfJRADQvImi2psCUcVPGDOTWBWzVDNTdn5vhZfQhfzOc8ggIk/pK6', '12345678', '987654321', 'https://phpstack-102119-3232905.cloudwaysapps.com/storage/volunteer//1690285235health-services-btn-01.png', 'https://phpstack-102119-3232905.cloudwaysapps.com/storage/volunteer//1690285235happy-baisakhi-celebration-vaisakhi-also-known-vector-35804562.jpeg', 'https://phpstack-102119-3232905.cloudwaysapps.com/storage/volunteer//1690285235Artboard – 41.jpg', 'https://phpstack-102119-3232905.cloudwaysapps.com/storage/volunteer//1690285235Artboard – 41.jpg', 'Uttam towers, Phase 8b industrial area mohali', 'ਅੰਤਮ ਟੈਸਟਿੰਗ address', 0, 'Mohali', 'near airport road mohali', NULL, NULL, NULL, '2023-07-25 11:40:35', '2023-07-25 11:40:35');

-- --------------------------------------------------------

--
-- Table structure for table `youtube_channel`
--

CREATE TABLE `youtube_channel` (
  `id` int(11) NOT NULL,
  `youtube_link` varchar(255) NOT NULL,
  `image` varchar(255) DEFAULT NULL,
  `image_name` varchar(255) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `youtube_channel`
--

INSERT INTO `youtube_channel` (`id`, `youtube_link`, `image`, `image_name`, `created_at`, `updated_at`) VALUES
(1, 'https://www.youtube.com/', 'https://phpstack-102119-3232905.cloudwaysapps.com/storage/volunteer//1690268229khalsa-sikh-dialouge-btn-05-final.png', 'khalsa-sikh-dialouge-btn-05-final.png', '2023-07-24 08:10:50', '2023-07-25 06:57:09');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `about_page`
--
ALTER TABLE `about_page`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `blood_group`
--
ALTER TABLE `blood_group`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `business`
--
ALTER TABLE `business`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `business_types`
--
ALTER TABLE `business_types`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `cardholder`
--
ALTER TABLE `cardholder`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `cardholders`
--
ALTER TABLE `cardholders`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `cardholder_children`
--
ALTER TABLE `cardholder_children`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `cardholder_data`
--
ALTER TABLE `cardholder_data`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `cardholder_family`
--
ALTER TABLE `cardholder_family`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `cardsdata`
--
ALTER TABLE `cardsdata`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `carholders_images`
--
ALTER TABLE `carholders_images`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `cities`
--
ALTER TABLE `cities`
  ADD PRIMARY KEY (`id`),
  ADD KEY `cities_state_id_foreign` (`state_id`);

--
-- Indexes for table `doctors`
--
ALTER TABLE `doctors`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `doctor_timing`
--
ALTER TABLE `doctor_timing`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Indexes for table `feedbacks`
--
ALTER TABLE `feedbacks`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `khalsa_pariwar_link`
--
ALTER TABLE `khalsa_pariwar_link`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `notifications`
--
ALTER TABLE `notifications`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Indexes for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  ADD KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`);

--
-- Indexes for table `request_blood`
--
ALTER TABLE `request_blood`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `services`
--
ALTER TABLE `services`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `sewapartners`
--
ALTER TABLE `sewapartners`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `sewapartner_account`
--
ALTER TABLE `sewapartner_account`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `sewapartner_doctors`
--
ALTER TABLE `sewapartner_doctors`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `sewapartner_notifications`
--
ALTER TABLE `sewapartner_notifications`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `sewapartner_services`
--
ALTER TABLE `sewapartner_services`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `subadmins`
--
ALTER TABLE `subadmins`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `supports`
--
ALTER TABLE `supports`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- Indexes for table `vacancies`
--
ALTER TABLE `vacancies`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `volunteers`
--
ALTER TABLE `volunteers`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `youtube_channel`
--
ALTER TABLE `youtube_channel`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `about_page`
--
ALTER TABLE `about_page`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `blood_group`
--
ALTER TABLE `blood_group`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `business`
--
ALTER TABLE `business`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `business_types`
--
ALTER TABLE `business_types`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `cardholder`
--
ALTER TABLE `cardholder`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `cardholders`
--
ALTER TABLE `cardholders`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `cardholder_children`
--
ALTER TABLE `cardholder_children`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `cardholder_data`
--
ALTER TABLE `cardholder_data`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `cardholder_family`
--
ALTER TABLE `cardholder_family`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `cardsdata`
--
ALTER TABLE `cardsdata`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `carholders_images`
--
ALTER TABLE `carholders_images`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `cities`
--
ALTER TABLE `cities`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=48315;

--
-- AUTO_INCREMENT for table `doctors`
--
ALTER TABLE `doctors`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `doctor_timing`
--
ALTER TABLE `doctor_timing`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `feedbacks`
--
ALTER TABLE `feedbacks`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `khalsa_pariwar_link`
--
ALTER TABLE `khalsa_pariwar_link`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `notifications`
--
ALTER TABLE `notifications`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `request_blood`
--
ALTER TABLE `request_blood`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `services`
--
ALTER TABLE `services`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `sewapartners`
--
ALTER TABLE `sewapartners`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `sewapartner_account`
--
ALTER TABLE `sewapartner_account`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `sewapartner_doctors`
--
ALTER TABLE `sewapartner_doctors`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT for table `sewapartner_notifications`
--
ALTER TABLE `sewapartner_notifications`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `sewapartner_services`
--
ALTER TABLE `sewapartner_services`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=52;

--
-- AUTO_INCREMENT for table `subadmins`
--
ALTER TABLE `subadmins`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `supports`
--
ALTER TABLE `supports`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `vacancies`
--
ALTER TABLE `vacancies`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `volunteers`
--
ALTER TABLE `volunteers`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `youtube_channel`
--
ALTER TABLE `youtube_channel`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

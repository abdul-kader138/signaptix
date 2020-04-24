-- phpMyAdmin SQL Dump
-- version 4.7.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 24, 2020 at 08:24 PM
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
-- Database: `sms`
--

-- --------------------------------------------------------

--
-- Table structure for table `sma_brands`
--

CREATE TABLE `sma_brands` (
  `id` int(11) NOT NULL,
  `code` varchar(20) DEFAULT NULL,
  `name` varchar(50) NOT NULL,
  `image` varchar(50) DEFAULT NULL,
  `slug` varchar(55) DEFAULT NULL,
  `description` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `sma_brands`
--

INSERT INTO `sma_brands` (`id`, `code`, `name`, `image`, `slug`, `description`) VALUES
(1, '01', 'East', NULL, '', 'East'),
(2, '02', 'North', NULL, '', 'North'),
(3, '03', 'South', NULL, '', 'South'),
(4, '007', 'Central', NULL, NULL, 'Central'),
(5, '008', 'Tobago', NULL, NULL, 'Tobago');

-- --------------------------------------------------------

--
-- Table structure for table `sma_calendar`
--

CREATE TABLE `sma_calendar` (
  `id` int(11) NOT NULL,
  `title` varchar(55) NOT NULL,
  `description` varchar(255) DEFAULT NULL,
  `start` datetime NOT NULL,
  `end` datetime DEFAULT NULL,
  `color` varchar(7) NOT NULL,
  `user_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `sma_calendar`
--

INSERT INTO `sma_calendar` (`id`, `title`, `description`, `start`, `end`, `color`, `user_id`) VALUES
(10, 'Loan Signing', '<p>testhjgh jhgh hjghghg jjhggh </p>', '2020-04-30 05:30:00', NULL, '#000000', 320),
(11, 'Remote Hire I-9 Verification', '<p>hvhjjhhvhjhvvhvhvjjhjhvhjhvhj bjhhjhhvhjvh iggvjvjhvhj jvvhj</p>', '2020-04-25 21:45:00', NULL, '#000000', 320),
(12, 'Loan Signing', '<p>Tetststs</p>', '2020-04-23 00:00:00', NULL, '#000000', 320),
(13, 'Loan Signing', '<p>sllnfasnfla sdjfj;asd ;l;lskaf;la</p>', '2020-04-24 23:55:00', NULL, '#000000', 320),
(14, 'Remote Hire I-9 Verification', '<p>Testing</p>', '2020-04-21 06:30:00', NULL, '#000000', 320);

-- --------------------------------------------------------

--
-- Table structure for table `sma_captcha`
--

CREATE TABLE `sma_captcha` (
  `captcha_id` bigint(13) UNSIGNED NOT NULL,
  `captcha_time` int(10) UNSIGNED NOT NULL,
  `ip_address` varchar(16) CHARACTER SET latin1 NOT NULL DEFAULT '0',
  `word` varchar(20) CHARACTER SET latin1 NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `sma_captcha`
--

INSERT INTO `sma_captcha` (`captcha_id`, `captcha_time`, `ip_address`, `word`) VALUES
(1, 1585128460, '::1', 'Xp9uzmzc'),
(2, 1585128686, '::1', '2z0LACwX'),
(3, 1585128720, '::1', 'WraWofLS'),
(4, 1585128763, '::1', 'pqNCS4x4'),
(5, 1585128873, '::1', 't5YWvrAc'),
(6, 1585128880, '::1', 'UxCBzILk'),
(7, 1585128910, '::1', 'r2rE51nu'),
(8, 1585128974, '::1', 'jtvo7Mc4'),
(9, 1585129314, '::1', 'PMoyxzA4'),
(10, 1585129350, '::1', 'YQyoIb0l'),
(11, 1585129408, '::1', 'cnFOEWQm'),
(12, 1585129512, '::1', 'Wq64YLzS'),
(13, 1585129570, '::1', 'lTtMdreH'),
(14, 1585129643, '::1', 'nyBzZYix'),
(15, 1585129671, '::1', 'pYrmT0wA'),
(16, 1585129816, '::1', '6zP9DUJQ'),
(17, 1585129888, '::1', 'rkjkXaQI'),
(18, 1585130016, '::1', 'VmHW8jy4'),
(19, 1585130078, '::1', '35BI9ffl'),
(20, 1585130326, '::1', 'Mmq0q29d'),
(21, 1585135026, '::1', 'DDVxQnMa'),
(22, 1585135059, '::1', 'VfhJwyWW'),
(23, 1585206533, '::1', 'e5hMpLvC'),
(24, 1585207000, '::1', 'mSsvOf33'),
(25, 1585207304, '::1', 'aNs3QMwH'),
(26, 1585207465, '::1', 'V4uWDUou'),
(27, 1585207679, '::1', 'rrGxMdGL'),
(28, 1585207742, '::1', 'onv4Sqj0'),
(29, 1585207790, '::1', '5C9H8vtL'),
(30, 1585208316, '::1', 'Mp9JA7ip'),
(31, 1585210333, '::1', '0dQERAKk'),
(32, 1585210495, '::1', 'V20BCkaA'),
(33, 1585210529, '::1', '7uRFcGRa'),
(34, 1585210567, '::1', 'bIKnROzh'),
(35, 1585210814, '::1', 'WnxRgRYH'),
(36, 1585211391, '::1', 'An4orWe8'),
(37, 1585211413, '::1', 'QqjBQHHM'),
(38, 1585211615, '::1', 'HSXyApGy'),
(39, 1585216922, '::1', 'bDpi6JN7'),
(40, 1585397539, '::1', 'DSqq9kLc'),
(41, 1585397572, '::1', 'Oc91xKdt'),
(42, 1585841187, '::1', 'IDEX016Z'),
(43, 1585842281, '::1', '3VPpKiDx'),
(44, 1585842487, '::1', 'L5Mf0JEK');

-- --------------------------------------------------------

--
-- Table structure for table `sma_categories`
--

CREATE TABLE `sma_categories` (
  `id` int(11) NOT NULL,
  `code` varchar(55) NOT NULL,
  `name` varchar(55) NOT NULL,
  `image` varchar(55) DEFAULT NULL,
  `parent_id` int(11) DEFAULT NULL,
  `slug` varchar(55) DEFAULT NULL,
  `description` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `sma_categories`
--

INSERT INTO `sma_categories` (`id`, `code`, `name`, `image`, `parent_id`, `slug`, `description`) VALUES
(2, 'Juniors - U16', 'Under 16', NULL, NULL, NULL, 'Under 16 Boys'),
(3, 'Championship (Boys)', 'Championship (Boys)', NULL, NULL, NULL, 'Championship (Boys)'),
(4, 'Championship (Girls)', 'Championship (Girls)', NULL, NULL, NULL, 'Championship (Girls)'),
(5, 'Premier', 'Premier', NULL, NULL, NULL, 'Boys\' Premier Division'),
(7, 'Form 1 - Under 13', 'Form 1 - Under 13', NULL, NULL, NULL, 'For Form 1 students who are 13 years old and under'),
(8, 'Under 15 (Girls)', 'Under 15 (Girls)', NULL, NULL, NULL, 'Girls under 15'),
(9, 'Senior - Girls', 'Senior - Girls', NULL, NULL, NULL, 'Senior - Girls'),
(10, 'Senior - Boys', 'Senior - Boys', NULL, NULL, NULL, 'Senior - Boys'),
(11, 'Under 14 (Boys)', 'Under 14 (Boys)', NULL, NULL, NULL, 'Under 14 (Boys)'),
(12, 'All', 'All', NULL, NULL, NULL, 'All Divisions');

-- --------------------------------------------------------

--
-- Table structure for table `sma_clients`
--

CREATE TABLE `sma_clients` (
  `id` int(11) NOT NULL,
  `company_name` varchar(100) NOT NULL,
  `tin` varchar(20) DEFAULT NULL,
  `company_phone` varchar(15) DEFAULT NULL,
  `contact_phone` varchar(15) DEFAULT NULL,
  `company_fax` varchar(15) DEFAULT NULL,
  `contact_email` varchar(50) DEFAULT NULL,
  `company_email` varchar(50) DEFAULT NULL,
  `company_type` varchar(50) DEFAULT NULL,
  `receive_invoices` varchar(50) DEFAULT NULL,
  `company_address` varchar(200) DEFAULT NULL,
  `mailing_address` varchar(200) DEFAULT NULL,
  `created_by` int(7) DEFAULT NULL,
  `updated_by` int(7) DEFAULT NULL,
  `created_date` datetime DEFAULT NULL,
  `updated_date` datetime DEFAULT NULL,
  `user_id` int(11) UNSIGNED NOT NULL,
  `note` varchar(200) DEFAULT NULL,
  `ref_no` varchar(25) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `sma_clients`
--

INSERT INTO `sma_clients` (`id`, `company_name`, `tin`, `company_phone`, `contact_phone`, `company_fax`, `contact_email`, `company_email`, `company_type`, `receive_invoices`, `company_address`, `mailing_address`, `created_by`, `updated_by`, `created_date`, `updated_date`, `user_id`, `note`, `ref_no`) VALUES
(4, 'Alliance Mortgage Company', '54-6584218', '888-333-1212', '987-999-3119', '888-333-1213', 'ted@alliancemortgage.com', 'contact@alliancemortgage.com', 'Mortgage Broker', 'By EMail', '<p>1323 Corporate Drive</p><p>Philadelphia,Pennsylvania 29384</p>', '<p>P.O. Box 43211</p><p>Philadelphia,Pennsylvania 29384</p>', 1, 320, '2020-03-26 10:12:44', '2020-04-24 06:12:38', 320, '<p>N/A..</p>', '202000004');

-- --------------------------------------------------------

--
-- Table structure for table `sma_clients_job`
--

CREATE TABLE `sma_clients_job` (
  `id` int(11) NOT NULL,
  `client_id` int(11) NOT NULL,
  `order_number` varchar(50) NOT NULL,
  `loan_number` varchar(50) DEFAULT NULL,
  `total_fee` decimal(10,2) DEFAULT NULL,
  `order_date` datetime DEFAULT NULL,
  `signing_type` varchar(20) DEFAULT NULL,
  `documents_sent` varchar(20) DEFAULT NULL,
  `status` varchar(50) DEFAULT NULL,
  `signers` varchar(50) DEFAULT NULL,
  `signing_location` varchar(200) DEFAULT NULL,
  `instructions` varchar(200) DEFAULT NULL,
  `signer` varchar(50) DEFAULT NULL,
  `co_signer` varchar(50) DEFAULT NULL,
  `signing_location2` varchar(200) DEFAULT NULL,
  `property_address` varchar(200) DEFAULT NULL,
  `telephone_mobile` varchar(15) DEFAULT NULL,
  `telephone_home` varchar(15) DEFAULT NULL,
  `telephone_work` varchar(15) DEFAULT NULL,
  `form_type` varchar(50) NOT NULL,
  `send_scanned_copy` varchar(50) DEFAULT NULL,
  `mail_completed` varchar(50) DEFAULT NULL,
  `hire_status` varchar(50) DEFAULT NULL,
  `start_date` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `sma_clients_job`
--

INSERT INTO `sma_clients_job` (`id`, `client_id`, `order_number`, `loan_number`, `total_fee`, `order_date`, `signing_type`, `documents_sent`, `status`, `signers`, `signing_location`, `instructions`, `signer`, `co_signer`, `signing_location2`, `property_address`, `telephone_mobile`, `telephone_home`, `telephone_work`, `form_type`, `send_scanned_copy`, `mail_completed`, `hire_status`, `start_date`) VALUES
(4, 4, 'AM03182020-02', '', '150.00', '2020-04-21 06:30:00', 'Refinance', 'Mailed to Signer(s)', 'Confirmed', 'mr. x', '<p>Testing</p>', '<p>Testing</p>', 'Others', '', '<p>Testtt</p>', '', '123456666', '12345666666', '01787688674', 'Remote Hire I-9 Verification', 'djADahD', 'testttt', 'asHASHa', '2020-04-22');

-- --------------------------------------------------------

--
-- Table structure for table `sma_client_documents`
--

CREATE TABLE `sma_client_documents` (
  `id` int(11) NOT NULL,
  `order_no` varchar(50) DEFAULT NULL,
  `file_name` varchar(100) DEFAULT NULL,
  `client_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `sma_client_documents`
--

INSERT INTO `sma_client_documents` (`id`, `order_no`, `file_name`, `client_id`) VALUES
(51, 'AM03182020-02', 'e0f7a79dbc257fdc0c1e1634a5ebc1bc.PNG', 4),
(52, 'AM03182020-02', '84c2569d439297e7a10a7da3466a4753.PNG', 4);

-- --------------------------------------------------------

--
-- Table structure for table `sma_coaches`
--

CREATE TABLE `sma_coaches` (
  `id` int(11) NOT NULL,
  `gender` varchar(15) NOT NULL,
  `photo` varchar(300) DEFAULT NULL,
  `first_name` varchar(200) NOT NULL,
  `school_id` int(11) NOT NULL,
  `is_tagged` int(2) NOT NULL DEFAULT '0',
  `team_id` int(7) DEFAULT NULL,
  `created_by` int(7) DEFAULT NULL,
  `updated_by` int(7) DEFAULT NULL,
  `created_date` datetime DEFAULT NULL,
  `updated_date` datetime DEFAULT NULL,
  `username` varchar(100) NOT NULL,
  `last_name` varchar(200) NOT NULL,
  `zone` varchar(50) NOT NULL,
  `division` int(9) NOT NULL,
  `address` varchar(100) DEFAULT NULL,
  `cfl` varchar(20) DEFAULT NULL,
  `c_status` varchar(50) NOT NULL DEFAULT 'Pending',
  `status_updated_date` datetime DEFAULT NULL,
  `status_updated_by` int(9) DEFAULT NULL,
  `document` varchar(100) DEFAULT NULL,
  `note` varchar(200) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `sma_date_format`
--

CREATE TABLE `sma_date_format` (
  `id` int(11) NOT NULL,
  `js` varchar(20) NOT NULL,
  `php` varchar(20) NOT NULL,
  `sql` varchar(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `sma_date_format`
--

INSERT INTO `sma_date_format` (`id`, `js`, `php`, `sql`) VALUES
(1, 'mm-dd-yyyy', 'm-d-Y', '%m-%d-%Y'),
(2, 'mm/dd/yyyy', 'm/d/Y', '%m/%d/%Y'),
(3, 'mm.dd.yyyy', 'm.d.Y', '%m.%d.%Y'),
(4, 'dd-mm-yyyy', 'd-m-Y', '%d-%m-%Y'),
(5, 'dd/mm/yyyy', 'd/m/Y', '%d/%m/%Y'),
(6, 'dd.mm.yyyy', 'd.m.Y', '%d.%m.%Y');

-- --------------------------------------------------------

--
-- Table structure for table `sma_groups`
--

CREATE TABLE `sma_groups` (
  `id` mediumint(8) UNSIGNED NOT NULL,
  `name` varchar(20) NOT NULL,
  `description` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `sma_groups`
--

INSERT INTO `sma_groups` (`id`, `name`, `description`) VALUES
(1, 'owner', 'Owner'),
(2, 'client', 'Client'),
(3, 'notary', 'Notary'),
(4, 'admin_user', 'Admin_User');

-- --------------------------------------------------------

--
-- Table structure for table `sma_login_attempts`
--

CREATE TABLE `sma_login_attempts` (
  `id` mediumint(8) UNSIGNED NOT NULL,
  `ip_address` varbinary(16) NOT NULL,
  `login` varchar(100) NOT NULL,
  `time` int(11) UNSIGNED DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `sma_migrations`
--

CREATE TABLE `sma_migrations` (
  `version` bigint(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `sma_migrations`
--

INSERT INTO `sma_migrations` (`version`) VALUES
(315),
(315);

-- --------------------------------------------------------

--
-- Table structure for table `sma_notaries`
--

CREATE TABLE `sma_notaries` (
  `id` int(11) NOT NULL,
  `notary_phone` varchar(15) DEFAULT NULL,
  `notary_mobile` varchar(15) DEFAULT NULL,
  `notary_fax` varchar(15) DEFAULT NULL,
  `notary_office_phone` varchar(15) DEFAULT NULL,
  `notary_email` varchar(50) DEFAULT NULL,
  `contact_phone` varchar(15) DEFAULT NULL,
  `contact_email` varchar(50) DEFAULT NULL,
  `address` varchar(200) DEFAULT NULL,
  `mailing_address` varchar(200) DEFAULT NULL,
  `created_by` int(7) DEFAULT NULL,
  `updated_by` int(7) DEFAULT NULL,
  `created_date` datetime DEFAULT NULL,
  `updated_date` datetime DEFAULT NULL,
  `user_id` int(11) UNSIGNED NOT NULL,
  `note` varchar(200) DEFAULT NULL,
  `about_yourself` varchar(200) DEFAULT NULL,
  `ref_no` varchar(25) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `sma_notaries`
--

INSERT INTO `sma_notaries` (`id`, `notary_phone`, `notary_mobile`, `notary_fax`, `notary_office_phone`, `notary_email`, `contact_phone`, `contact_email`, `address`, `mailing_address`, `created_by`, `updated_by`, `created_date`, `updated_date`, `user_id`, `note`, `about_yourself`, `ref_no`) VALUES
(19, '888-333-1215', '888-333-1215', '888-333-1215', '888-333-1215', 'contact1@allaincemortgage.com', '987-999-3119', 'ted1@allaincemortgage.com', '<p>1323 Corporate Drive\r\nPennsylvania 29384</p>', '<p>P.O. Box 43211</p><p>Pennsylvania 29384</p>', NULL, 369, '2020-04-02 11:58:22', '2020-04-02 12:01:27', 369, '', '<p>Lorem ipsum, or lipsum as it is sometimes known, is dummy text used in laying out print, graphic or web designs. The passage is attributed to an unknown typesetter in the 15th century who is though', '202000019');

-- --------------------------------------------------------

--
-- Table structure for table `sma_notary_background_check`
--

CREATE TABLE `sma_notary_background_check` (
  `id` int(11) NOT NULL,
  `company` varchar(100) DEFAULT NULL,
  `url` varchar(100) DEFAULT NULL,
  `issue_date` date DEFAULT NULL,
  `background_check` varchar(150) DEFAULT NULL,
  `updated_by` int(7) DEFAULT NULL,
  `updated_date` datetime DEFAULT NULL,
  `notary_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `sma_notary_background_check`
--

INSERT INTO `sma_notary_background_check` (`id`, `company`, `url`, `issue_date`, `background_check`, `updated_by`, `updated_date`, `notary_id`) VALUES
(8, 'National Notary Association', 'http://sms.oneclicksolutionbd.com', '2019-07-31', 'f51ef242a1d014e05b99743411545033.pdf', 369, '2020-04-02 12:07:32', 19);

-- --------------------------------------------------------

--
-- Table structure for table `sma_notary_bar_license`
--

CREATE TABLE `sma_notary_bar_license` (
  `id` int(11) NOT NULL,
  `b_state` varchar(50) DEFAULT NULL,
  `b_license_number` varchar(25) DEFAULT NULL,
  `b_expiration_date` date DEFAULT NULL,
  `b_certificate_attachment` varchar(150) DEFAULT NULL,
  `updated_by` int(7) DEFAULT NULL,
  `updated_date` datetime DEFAULT NULL,
  `notary_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `sma_notary_bar_license`
--

INSERT INTO `sma_notary_bar_license` (`id`, `b_state`, `b_license_number`, `b_expiration_date`, `b_certificate_attachment`, `updated_by`, `updated_date`, `notary_id`) VALUES
(45, 'Pennsylvania', '201911600027', '2024-04-22', 'e7897445395125a327a8876cf1c249c9.pdf', 369, '2020-04-02 12:06:05', 19);

-- --------------------------------------------------------

--
-- Table structure for table `sma_notary_commission`
--

CREATE TABLE `sma_notary_commission` (
  `id` int(11) NOT NULL,
  `commission_state` varchar(50) DEFAULT NULL,
  `commission_number` varchar(25) DEFAULT NULL,
  `expiration_date` date DEFAULT NULL,
  `certificate_attachment` varchar(150) DEFAULT NULL,
  `updated_by` int(7) DEFAULT NULL,
  `updated_date` datetime DEFAULT NULL,
  `notary_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `sma_notary_commission`
--

INSERT INTO `sma_notary_commission` (`id`, `commission_state`, `commission_number`, `expiration_date`, `certificate_attachment`, `updated_by`, `updated_date`, `notary_id`) VALUES
(45, 'Pennsylvania', '201911600027', '2024-04-22', '612460c67f6d9fa9bf92579ca0cd930e.pdf', 369, '2020-04-02 12:03:24', 19);

-- --------------------------------------------------------

--
-- Table structure for table `sma_notary_electronic_commission`
--

CREATE TABLE `sma_notary_electronic_commission` (
  `id` int(11) NOT NULL,
  `e_commission_state` varchar(50) DEFAULT NULL,
  `e_commission_number` varchar(25) DEFAULT NULL,
  `e_expiration_date` date DEFAULT NULL,
  `e_certificate_attachment` varchar(150) DEFAULT NULL,
  `updated_by` int(7) DEFAULT NULL,
  `updated_date` datetime DEFAULT NULL,
  `notary_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `sma_notary_electronic_commission`
--

INSERT INTO `sma_notary_electronic_commission` (`id`, `e_commission_state`, `e_commission_number`, `e_expiration_date`, `e_certificate_attachment`, `updated_by`, `updated_date`, `notary_id`) VALUES
(47, 'Pennsylvania', '201911600027', '2024-04-22', '2510015cdf908b5fe8097924041f8cfc.pdf', 369, '2020-04-02 12:04:16', 19);

-- --------------------------------------------------------

--
-- Table structure for table `sma_notary_insurance`
--

CREATE TABLE `sma_notary_insurance` (
  `id` int(11) NOT NULL,
  `i_company` varchar(100) DEFAULT NULL,
  `i_policy_number` varchar(25) DEFAULT NULL,
  `i_amount` varchar(25) DEFAULT NULL,
  `i_expiration_date` date DEFAULT NULL,
  `i_background_check` varchar(150) DEFAULT NULL,
  `updated_by` int(7) DEFAULT NULL,
  `updated_date` datetime DEFAULT NULL,
  `notary_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `sma_notary_insurance`
--

INSERT INTO `sma_notary_insurance` (`id`, `i_company`, `i_policy_number`, `i_amount`, `i_expiration_date`, `i_background_check`, `updated_by`, `updated_date`, `notary_id`) VALUES
(47, 'Hiscox, Inc', 'UDC-4234942-E0-19', '500', '2020-08-02', 'f5f42cf9d58d0be3189d19bae8d5c2b6.pdf', 369, '2020-04-02 12:09:20', 19);

-- --------------------------------------------------------

--
-- Table structure for table `sma_notary_payments`
--

CREATE TABLE `sma_notary_payments` (
  `id` int(11) NOT NULL,
  `cheque_payable` varchar(100) DEFAULT NULL,
  `eni` varchar(150) DEFAULT NULL,
  `w_9` varchar(150) DEFAULT NULL,
  `updated_by` int(7) DEFAULT NULL,
  `updated_date` datetime DEFAULT NULL,
  `notary_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `sma_notary_payments`
--

INSERT INTO `sma_notary_payments` (`id`, `cheque_payable`, `eni`, `w_9`, `updated_by`, `updated_date`, `notary_id`) VALUES
(46, 'Morgan Notary Service', '222-77-4552', '718972c6d1f75d71a7c862a48fa1eb3f.pdf', 369, '2020-04-02 12:10:36', 19);

-- --------------------------------------------------------

--
-- Table structure for table `sma_notary_producer_license`
--

CREATE TABLE `sma_notary_producer_license` (
  `id` int(11) NOT NULL,
  `state` varchar(50) DEFAULT NULL,
  `license_number` varchar(25) DEFAULT NULL,
  `p_expiration_date` date DEFAULT NULL,
  `p_certificate_attachment` varchar(150) DEFAULT NULL,
  `updated_by` int(7) DEFAULT NULL,
  `updated_date` datetime DEFAULT NULL,
  `notary_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `sma_notary_producer_license`
--

INSERT INTO `sma_notary_producer_license` (`id`, `state`, `license_number`, `p_expiration_date`, `p_certificate_attachment`, `updated_by`, `updated_date`, `notary_id`) VALUES
(47, 'Pennsylvania', '201911600027', '2024-04-22', 'fc2967a9f81e5b6297c04282d9122654.pdf', 369, '2020-04-02 12:05:31', 19);

-- --------------------------------------------------------

--
-- Table structure for table `sma_notary_training`
--

CREATE TABLE `sma_notary_training` (
  `id` int(11) NOT NULL,
  `training` varchar(100) DEFAULT NULL,
  `training_certificate` varchar(150) DEFAULT NULL,
  `updated_by` int(7) DEFAULT NULL,
  `updated_date` datetime DEFAULT NULL,
  `notary_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `sma_notary_training`
--

INSERT INTO `sma_notary_training` (`id`, `training`, `training_certificate`, `updated_by`, `updated_date`, `notary_id`) VALUES
(53, 'Loan Signing System', 'e185113c32e384bf93c805c110df79b1.pdf', 369, '2020-04-02 12:09:47', 19);

-- --------------------------------------------------------

--
-- Table structure for table `sma_notifications`
--

CREATE TABLE `sma_notifications` (
  `id` int(11) NOT NULL,
  `comment` text NOT NULL,
  `date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `from_date` datetime DEFAULT NULL,
  `till_date` datetime DEFAULT NULL,
  `scope` tinyint(1) NOT NULL DEFAULT '3'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `sma_notifications`
--

INSERT INTO `sma_notifications` (`id`, `comment`, `date`, `from_date`, `till_date`, `scope`) VALUES
(1, '<p>THIS IS MESSAGE FOR ALL TEAM MANAGER</p>', '2014-08-15 10:00:57', '2015-01-01 00:00:00', '2019-05-26 23:55:00', 2),
(2, '<p>THIS IS MESSAGE FOR ALL COACHES</p>', '2019-04-29 23:11:22', '2019-04-30 08:10:00', '2019-05-24 23:55:00', 1),
(3, '<p>gyugygg</p>', '2019-06-06 02:36:18', '2019-06-06 08:35:00', '2019-06-14 14:35:00', 1);

-- --------------------------------------------------------

--
-- Table structure for table `sma_order_ref`
--

CREATE TABLE `sma_order_ref` (
  `ref_id` int(11) NOT NULL,
  `date` date NOT NULL,
  `so` int(11) NOT NULL DEFAULT '1',
  `qu` int(11) NOT NULL DEFAULT '1',
  `po` int(11) NOT NULL DEFAULT '1',
  `to` int(11) NOT NULL DEFAULT '1',
  `pos` int(11) NOT NULL DEFAULT '1',
  `do` int(11) NOT NULL DEFAULT '1',
  `pay` int(11) NOT NULL DEFAULT '1',
  `re` int(11) NOT NULL DEFAULT '1',
  `rep` int(11) NOT NULL DEFAULT '1',
  `ex` int(11) NOT NULL DEFAULT '1',
  `ppay` int(11) NOT NULL DEFAULT '1',
  `qa` int(11) DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `sma_order_ref`
--

INSERT INTO `sma_order_ref` (`ref_id`, `date`, `so`, `qu`, `po`, `to`, `pos`, `do`, `pay`, `re`, `rep`, `ex`, `ppay`, `qa`) VALUES
(1, '2015-03-01', 1, 1, 3, 1, 17, 1, 18, 1, 1, 1, 1, 1);

-- --------------------------------------------------------

--
-- Table structure for table `sma_permissions`
--

CREATE TABLE `sma_permissions` (
  `id` int(11) NOT NULL,
  `group_id` int(11) NOT NULL,
  `bulk_actions` tinyint(1) NOT NULL DEFAULT '0',
  `edit_price` tinyint(1) DEFAULT '0',
  `clients-delete` tinyint(1) DEFAULT '0',
  `clients-edit` tinyint(1) DEFAULT '0',
  `clients-add` tinyint(1) DEFAULT '0',
  `clients-index` tinyint(1) DEFAULT '0',
  `notaries-delete` tinyint(1) DEFAULT NULL,
  `notaries-edit` tinyint(1) DEFAULT NULL,
  `notaries-add` tinyint(1) DEFAULT NULL,
  `notaries-index` tinyint(1) DEFAULT NULL,
  `registration-index` tinyint(1) DEFAULT NULL,
  `registration-registration_group` tinyint(1) DEFAULT NULL,
  `registration-delete` tinyint(1) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `sma_permissions`
--

INSERT INTO `sma_permissions` (`id`, `group_id`, `bulk_actions`, `edit_price`, `clients-delete`, `clients-edit`, `clients-add`, `clients-index`, `notaries-delete`, `notaries-edit`, `notaries-add`, `notaries-index`, `registration-index`, `registration-registration_group`, `registration-delete`) VALUES
(12, 2, 0, 0, NULL, 1, NULL, 1, 0, 0, 0, 0, NULL, NULL, NULL),
(13, 3, 1, 0, NULL, NULL, NULL, NULL, 0, 1, 0, 1, NULL, NULL, NULL),
(14, 4, 1, 0, NULL, NULL, 1, 1, NULL, NULL, 1, 1, NULL, NULL, NULL),
(15, 5, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, NULL, NULL, NULL),
(16, 4, 1, 0, NULL, NULL, 1, 1, NULL, NULL, 1, 1, NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `sma_players`
--

CREATE TABLE `sma_players` (
  `id` int(11) NOT NULL,
  `dob` date NOT NULL,
  `gender` varchar(15) NOT NULL,
  `sessions` varchar(20) DEFAULT NULL,
  `year` varchar(15) DEFAULT NULL,
  `photo` varchar(300) DEFAULT NULL,
  `first_name` varchar(200) NOT NULL,
  `bcp` varchar(50) NOT NULL,
  `school_id` int(11) NOT NULL,
  `is_tagged` int(2) NOT NULL DEFAULT '0',
  `team_id` int(7) DEFAULT NULL,
  `created_by` int(7) DEFAULT NULL,
  `updated_by` int(7) DEFAULT NULL,
  `created_date` datetime DEFAULT NULL,
  `updated_date` datetime DEFAULT NULL,
  `username` varchar(100) NOT NULL,
  `last_name` varchar(200) NOT NULL,
  `zone` varchar(50) NOT NULL,
  `last_attend_school` varchar(50) NOT NULL,
  `trs` varchar(50) NOT NULL,
  `sea_year` varchar(50) NOT NULL,
  `pc` varchar(50) NOT NULL,
  `pey` varchar(50) NOT NULL,
  `division` int(9) NOT NULL,
  `address` varchar(100) DEFAULT NULL,
  `sea_number` varchar(50) DEFAULT NULL,
  `jersey_number` varchar(50) DEFAULT NULL,
  `ssfl` varchar(20) DEFAULT NULL,
  `p_status` varchar(50) NOT NULL DEFAULT 'Pending',
  `status_updated_date` datetime DEFAULT NULL,
  `status_updated_by` int(9) DEFAULT NULL,
  `document` varchar(100) DEFAULT NULL,
  `note` varchar(200) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `sma_registration`
--

CREATE TABLE `sma_registration` (
  `id` int(11) UNSIGNED NOT NULL,
  `player_id` varchar(10) NOT NULL,
  `player_first_name` varchar(100) NOT NULL,
  `player_last_name` varchar(100) NOT NULL,
  `reference_no` varchar(50) DEFAULT NULL,
  `created_by` int(11) UNSIGNED DEFAULT NULL,
  `created_date` datetime DEFAULT NULL,
  `status` varchar(100) DEFAULT NULL,
  `note` varchar(250) DEFAULT NULL,
  `player_ref` varchar(50) NOT NULL,
  `school_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `sma_sessions`
--

CREATE TABLE `sma_sessions` (
  `id` varchar(40) NOT NULL,
  `ip_address` varchar(45) NOT NULL,
  `timestamp` int(10) UNSIGNED NOT NULL DEFAULT '0',
  `data` blob NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `sma_sessions`
--

INSERT INTO `sma_sessions` (`id`, `ip_address`, `timestamp`, `data`) VALUES
('1lrg8k1ug3o02vf9gnur69porl2so94d', '::1', 1587737965, 0x5f5f63695f6c6173745f726567656e65726174657c693a313538373733373835353b7265717565737465645f706167657c733a32313a2261646d696e2f636c69656e74732f6a6f624c697374223b6964656e746974797c733a343a2263636363223b757365726e616d657c733a343a2263636363223b656d61696c7c733a32383a22636f6e7461637440616c6c69616e63656d6f7274676167652e636f6d223b757365725f69647c733a333a22333230223b6f6c645f6c6173745f6c6f67696e7c733a31303a2231353837373232393937223b6c6173745f69707c733a333a223a3a31223b6176617461727c733a33363a2262663764633331636535666538376262343939656333373839303761386334622e6a7067223b67656e6465727c4e3b67726f75705f69647c733a313a2232223b766965775f72696768747c733a313a2230223b656469745f72696768747c733a313a2230223b6572726f727c733a34333a223c703e596f7520646964206e6f742073656c65637420612066696c6520746f2075706c6f61642e3c2f703e223b5f5f63695f766172737c613a313a7b733a353a226572726f72223b733a333a226f6c64223b7d),
('44uanpkcf0f3croda9n5923rk62rve6r', '::1', 1587732226, 0x5f5f63695f6c6173745f726567656e65726174657c693a313538373733313936333b7265717565737465645f706167657c733a32313a2261646d696e2f636c69656e74732f6a6f624c697374223b6964656e746974797c733a343a2263636363223b757365726e616d657c733a343a2263636363223b656d61696c7c733a32383a22636f6e7461637440616c6c69616e63656d6f7274676167652e636f6d223b757365725f69647c733a333a22333230223b6f6c645f6c6173745f6c6f67696e7c733a31303a2231353837373232393937223b6c6173745f69707c733a333a223a3a31223b6176617461727c733a33363a2262663764633331636535666538376262343939656333373839303761386334622e6a7067223b67656e6465727c4e3b67726f75705f69647c733a313a2232223b766965775f72696768747c733a313a2230223b656469745f72696768747c733a313a2230223b6572726f727c4e3b),
('62aeis98ta44cn6nj26uijdfgl9dahlv', '::1', 1587751637, 0x5f5f63695f6c6173745f726567656e65726174657c693a313538373735313633363b7265717565737465645f706167657c733a32343a2261646d696e2f636c69656e74732f6164644a6f624c697374223b6964656e746974797c733a343a2263636363223b757365726e616d657c733a343a2263636363223b656d61696c7c733a32383a22636f6e7461637440616c6c69616e63656d6f7274676167652e636f6d223b757365725f69647c733a333a22333230223b6f6c645f6c6173745f6c6f67696e7c733a31303a2231353837373330343933223b6c6173745f69707c733a333a223a3a31223b6176617461727c733a33363a2262663764633331636535666538376262343939656333373839303761386334622e6a7067223b67656e6465727c4e3b67726f75705f69647c733a313a2232223b766965775f72696768747c733a313a2230223b656469745f72696768747c733a313a2230223b6572726f727c4e3b),
('8ll2rkj1hs9eevppq1u5t5atncg16i47', '::1', 1587734916, 0x5f5f63695f6c6173745f726567656e65726174657c693a313538373733343739383b7265717565737465645f706167657c733a32313a2261646d696e2f636c69656e74732f6a6f624c697374223b6964656e746974797c733a343a2263636363223b757365726e616d657c733a343a2263636363223b656d61696c7c733a32383a22636f6e7461637440616c6c69616e63656d6f7274676167652e636f6d223b757365725f69647c733a333a22333230223b6f6c645f6c6173745f6c6f67696e7c733a31303a2231353837373232393937223b6c6173745f69707c733a333a223a3a31223b6176617461727c733a33363a2262663764633331636535666538376262343939656333373839303761386334622e6a7067223b67656e6465727c4e3b67726f75705f69647c733a313a2232223b766965775f72696768747c733a313a2230223b656469745f72696768747c733a313a2230223b6572726f727c4e3b),
('9s8lq7148vqj2ofmvl7s3p4mcef1dgs3', '::1', 1587749166, 0x5f5f63695f6c6173745f726567656e65726174657c693a313538373734383934383b7265717565737465645f706167657c733a32343a2261646d696e2f636c69656e74732f6164644a6f624c697374223b6964656e746974797c733a343a2263636363223b757365726e616d657c733a343a2263636363223b656d61696c7c733a32383a22636f6e7461637440616c6c69616e63656d6f7274676167652e636f6d223b757365725f69647c733a333a22333230223b6f6c645f6c6173745f6c6f67696e7c733a31303a2231353837373330343933223b6c6173745f69707c733a333a223a3a31223b6176617461727c733a33363a2262663764633331636535666538376262343939656333373839303761386334622e6a7067223b67656e6465727c4e3b67726f75705f69647c733a313a2232223b766965775f72696768747c733a313a2230223b656469745f72696768747c733a313a2230223b6572726f727c4e3b),
('ah9s91jdpkvs8d60pir5v89v5493ompn', '::1', 1587738347, 0x5f5f63695f6c6173745f726567656e65726174657c693a313538373733383231333b7265717565737465645f706167657c733a32313a2261646d696e2f636c69656e74732f6a6f624c697374223b6964656e746974797c733a343a2263636363223b757365726e616d657c733a343a2263636363223b656d61696c7c733a32383a22636f6e7461637440616c6c69616e63656d6f7274676167652e636f6d223b757365725f69647c733a333a22333230223b6f6c645f6c6173745f6c6f67696e7c733a31303a2231353837373232393937223b6c6173745f69707c733a333a223a3a31223b6176617461727c733a33363a2262663764633331636535666538376262343939656333373839303761386334622e6a7067223b67656e6465727c4e3b67726f75705f69647c733a313a2232223b766965775f72696768747c733a313a2230223b656469745f72696768747c733a313a2230223b),
('avqnlpd7mrb81bvvs9p9kb4tebpfvobq', '::1', 1587749315, 0x5f5f63695f6c6173745f726567656e65726174657c693a313538373734393331353b7265717565737465645f706167657c733a32343a2261646d696e2f636c69656e74732f6164644a6f624c697374223b6964656e746974797c733a343a2263636363223b757365726e616d657c733a343a2263636363223b656d61696c7c733a32383a22636f6e7461637440616c6c69616e63656d6f7274676167652e636f6d223b757365725f69647c733a333a22333230223b6f6c645f6c6173745f6c6f67696e7c733a31303a2231353837373330343933223b6c6173745f69707c733a333a223a3a31223b6176617461727c733a33363a2262663764633331636535666538376262343939656333373839303761386334622e6a7067223b67656e6465727c4e3b67726f75705f69647c733a313a2232223b766965775f72696768747c733a313a2230223b656469745f72696768747c733a313a2230223b6572726f727c4e3b),
('bnjohiev1trl5ilb2lqjkesddf3g690t', '::1', 1587750786, 0x5f5f63695f6c6173745f726567656e65726174657c693a313538373735303533363b7265717565737465645f706167657c733a32343a2261646d696e2f636c69656e74732f6164644a6f624c697374223b6964656e746974797c733a343a2263636363223b757365726e616d657c733a343a2263636363223b656d61696c7c733a32383a22636f6e7461637440616c6c69616e63656d6f7274676167652e636f6d223b757365725f69647c733a333a22333230223b6f6c645f6c6173745f6c6f67696e7c733a31303a2231353837373330343933223b6c6173745f69707c733a333a223a3a31223b6176617461727c733a33363a2262663764633331636535666538376262343939656333373839303761386334622e6a7067223b67656e6465727c4e3b67726f75705f69647c733a313a2232223b766965775f72696768747c733a313a2230223b656469745f72696768747c733a313a2230223b6572726f727c4e3b),
('de95ugld1bbhij5r0inepmertmpoplhb', '::1', 1587733845, 0x5f5f63695f6c6173745f726567656e65726174657c693a313538373733333732353b7265717565737465645f706167657c733a32313a2261646d696e2f636c69656e74732f6a6f624c697374223b6964656e746974797c733a343a2263636363223b757365726e616d657c733a343a2263636363223b656d61696c7c733a32383a22636f6e7461637440616c6c69616e63656d6f7274676167652e636f6d223b757365725f69647c733a333a22333230223b6f6c645f6c6173745f6c6f67696e7c733a31303a2231353837373232393937223b6c6173745f69707c733a333a223a3a31223b6176617461727c733a33363a2262663764633331636535666538376262343939656333373839303761386334622e6a7067223b67656e6465727c4e3b67726f75705f69647c733a313a2232223b766965775f72696768747c733a313a2230223b656469745f72696768747c733a313a2230223b6572726f727c4e3b),
('e68e3cb0kkhglqug19v6a8cvtctdhlh4', '::1', 1587751536, 0x5f5f63695f6c6173745f726567656e65726174657c693a313538373735313239313b7265717565737465645f706167657c733a32343a2261646d696e2f636c69656e74732f6164644a6f624c697374223b6964656e746974797c733a343a2263636363223b757365726e616d657c733a343a2263636363223b656d61696c7c733a32383a22636f6e7461637440616c6c69616e63656d6f7274676167652e636f6d223b757365725f69647c733a333a22333230223b6f6c645f6c6173745f6c6f67696e7c733a31303a2231353837373330343933223b6c6173745f69707c733a333a223a3a31223b6176617461727c733a33363a2262663764633331636535666538376262343939656333373839303761386334622e6a7067223b67656e6465727c4e3b67726f75705f69647c733a313a2232223b766965775f72696768747c733a313a2230223b656469745f72696768747c733a313a2230223b6572726f727c4e3b),
('elod18r13nq5e1i5d3ui8ck7vpla933m', '::1', 1587733588, 0x5f5f63695f6c6173745f726567656e65726174657c693a313538373733323336343b7265717565737465645f706167657c733a32313a2261646d696e2f636c69656e74732f6a6f624c697374223b6964656e746974797c733a343a2263636363223b757365726e616d657c733a343a2263636363223b656d61696c7c733a32383a22636f6e7461637440616c6c69616e63656d6f7274676167652e636f6d223b757365725f69647c733a333a22333230223b6f6c645f6c6173745f6c6f67696e7c733a31303a2231353837373232393937223b6c6173745f69707c733a333a223a3a31223b6176617461727c733a33363a2262663764633331636535666538376262343939656333373839303761386334622e6a7067223b67656e6465727c4e3b67726f75705f69647c733a313a2232223b766965775f72696768747c733a313a2230223b656469745f72696768747c733a313a2230223b6572726f727c4e3b),
('f7p897hg9pi1covjeqtli7e7kvkpqgm9', '::1', 1587748602, 0x5f5f63695f6c6173745f726567656e65726174657c693a313538373734383630323b7265717565737465645f706167657c733a32343a2261646d696e2f636c69656e74732f6164644a6f624c697374223b6964656e746974797c733a343a2263636363223b757365726e616d657c733a343a2263636363223b656d61696c7c733a32383a22636f6e7461637440616c6c69616e63656d6f7274676167652e636f6d223b757365725f69647c733a333a22333230223b6f6c645f6c6173745f6c6f67696e7c733a31303a2231353837373330343933223b6c6173745f69707c733a333a223a3a31223b6176617461727c733a33363a2262663764633331636535666538376262343939656333373839303761386334622e6a7067223b67656e6465727c4e3b67726f75705f69647c733a313a2232223b766965775f72696768747c733a313a2230223b656469745f72696768747c733a313a2230223b6572726f727c4e3b),
('fhqlog0ak3ei8gacpenjblv4t3g1jvm4', '::1', 1587731006, 0x5f5f63695f6c6173745f726567656e65726174657c693a313538373733303832373b7265717565737465645f706167657c733a32313a2261646d696e2f636c69656e74732f6a6f624c697374223b6964656e746974797c733a343a2263636363223b757365726e616d657c733a343a2263636363223b656d61696c7c733a32383a22636f6e7461637440616c6c69616e63656d6f7274676167652e636f6d223b757365725f69647c733a333a22333230223b6f6c645f6c6173745f6c6f67696e7c733a31303a2231353837373232393937223b6c6173745f69707c733a333a223a3a31223b6176617461727c733a33363a2262663764633331636535666538376262343939656333373839303761386334622e6a7067223b67656e6465727c4e3b67726f75705f69647c733a313a2232223b766965775f72696768747c733a313a2230223b656469745f72696768747c733a313a2230223b6572726f727c4e3b),
('g6cg493fgeltg1s6vp7osobiu0dv6or0', '::1', 1587736135, 0x5f5f63695f6c6173745f726567656e65726174657c693a313538373733363132343b7265717565737465645f706167657c733a32313a2261646d696e2f636c69656e74732f6a6f624c697374223b6964656e746974797c733a343a2263636363223b757365726e616d657c733a343a2263636363223b656d61696c7c733a32383a22636f6e7461637440616c6c69616e63656d6f7274676167652e636f6d223b757365725f69647c733a333a22333230223b6f6c645f6c6173745f6c6f67696e7c733a31303a2231353837373232393937223b6c6173745f69707c733a333a223a3a31223b6176617461727c733a33363a2262663764633331636535666538376262343939656333373839303761386334622e6a7067223b67656e6465727c4e3b67726f75705f69647c733a313a2232223b766965775f72696768747c733a313a2230223b656469745f72696768747c733a313a2230223b6572726f727c4e3b),
('itoi65d21shq4edui331lncadr2ac8bq', '::1', 1587752593, 0x5f5f63695f6c6173745f726567656e65726174657c693a313538373735323539333b7265717565737465645f706167657c733a32343a2261646d696e2f636c69656e74732f6164644a6f624c697374223b6964656e746974797c733a343a2263636363223b757365726e616d657c733a343a2263636363223b656d61696c7c733a32383a22636f6e7461637440616c6c69616e63656d6f7274676167652e636f6d223b757365725f69647c733a333a22333230223b6f6c645f6c6173745f6c6f67696e7c733a31303a2231353837373330343933223b6c6173745f69707c733a333a223a3a31223b6176617461727c733a33363a2262663764633331636535666538376262343939656333373839303761386334622e6a7067223b67656e6465727c4e3b67726f75705f69647c733a313a2232223b766965775f72696768747c733a313a2230223b656469745f72696768747c733a313a2230223b6572726f727c4e3b),
('j23ko4qmc1crv4c6jlsr5mbpnv2s82r5', '::1', 1587751172, 0x5f5f63695f6c6173745f726567656e65726174657c693a313538373735303839303b7265717565737465645f706167657c733a32343a2261646d696e2f636c69656e74732f6164644a6f624c697374223b6964656e746974797c733a343a2263636363223b757365726e616d657c733a343a2263636363223b656d61696c7c733a32383a22636f6e7461637440616c6c69616e63656d6f7274676167652e636f6d223b757365725f69647c733a333a22333230223b6f6c645f6c6173745f6c6f67696e7c733a31303a2231353837373330343933223b6c6173745f69707c733a333a223a3a31223b6176617461727c733a33363a2262663764633331636535666538376262343939656333373839303761386334622e6a7067223b67656e6465727c4e3b67726f75705f69647c733a313a2232223b766965775f72696768747c733a313a2230223b656469745f72696768747c733a313a2230223b6572726f727c4e3b),
('lbkg0mofp75641qn2pp795rs28i0t21h', '::1', 1587736124, 0x5f5f63695f6c6173745f726567656e65726174657c693a313538373733363132343b7265717565737465645f706167657c733a32313a2261646d696e2f636c69656e74732f6a6f624c697374223b6964656e746974797c733a343a2263636363223b757365726e616d657c733a343a2263636363223b656d61696c7c733a32383a22636f6e7461637440616c6c69616e63656d6f7274676167652e636f6d223b757365725f69647c733a333a22333230223b6f6c645f6c6173745f6c6f67696e7c733a31303a2231353837373232393937223b6c6173745f69707c733a333a223a3a31223b6176617461727c733a33363a2262663764633331636535666538376262343939656333373839303761386334622e6a7067223b67656e6465727c4e3b67726f75705f69647c733a313a2232223b766965775f72696768747c733a313a2230223b656469745f72696768747c733a313a2230223b6572726f727c4e3b),
('mcsug6ormmbv7qrolekjk49pnp5a5hoe', '::1', 1587752570, 0x5f5f63695f6c6173745f726567656e65726174657c693a313538373735323231303b7265717565737465645f706167657c733a32343a2261646d696e2f636c69656e74732f6164644a6f624c697374223b6964656e746974797c733a343a2263636363223b757365726e616d657c733a343a2263636363223b656d61696c7c733a32383a22636f6e7461637440616c6c69616e63656d6f7274676167652e636f6d223b757365725f69647c733a333a22333230223b6f6c645f6c6173745f6c6f67696e7c733a31303a2231353837373330343933223b6c6173745f69707c733a333a223a3a31223b6176617461727c733a33363a2262663764633331636535666538376262343939656333373839303761386334622e6a7067223b67656e6465727c4e3b67726f75705f69647c733a313a2232223b766965775f72696768747c733a313a2230223b656469745f72696768747c733a313a2230223b6572726f727c4e3b),
('opeep31pmn15irfdugnhl1nrasj02ksu', '::1', 1587731193, 0x5f5f63695f6c6173745f726567656e65726174657c693a313538373733313138353b7265717565737465645f706167657c733a32313a2261646d696e2f636c69656e74732f6a6f624c697374223b6964656e746974797c733a343a2263636363223b757365726e616d657c733a343a2263636363223b656d61696c7c733a32383a22636f6e7461637440616c6c69616e63656d6f7274676167652e636f6d223b757365725f69647c733a333a22333230223b6f6c645f6c6173745f6c6f67696e7c733a31303a2231353837373232393937223b6c6173745f69707c733a333a223a3a31223b6176617461727c733a33363a2262663764633331636535666538376262343939656333373839303761386334622e6a7067223b67656e6465727c4e3b67726f75705f69647c733a313a2232223b766965775f72696768747c733a313a2230223b656469745f72696768747c733a313a2230223b6572726f727c4e3b),
('pcm35gq2fr7cr55v50fjrlb374k24t5e', '::1', 1587734168, 0x5f5f63695f6c6173745f726567656e65726174657c693a313538373733343136353b7265717565737465645f706167657c733a32313a2261646d696e2f636c69656e74732f6a6f624c697374223b6964656e746974797c733a343a2263636363223b757365726e616d657c733a343a2263636363223b656d61696c7c733a32383a22636f6e7461637440616c6c69616e63656d6f7274676167652e636f6d223b757365725f69647c733a333a22333230223b6f6c645f6c6173745f6c6f67696e7c733a31303a2231353837373232393937223b6c6173745f69707c733a333a223a3a31223b6176617461727c733a33363a2262663764633331636535666538376262343939656333373839303761386334622e6a7067223b67656e6465727c4e3b67726f75705f69647c733a313a2232223b766965775f72696768747c733a313a2230223b656469745f72696768747c733a313a2230223b6572726f727c4e3b),
('qotsuks5ngdu7jhgsnsnonfkcfuiqls9', '::1', 1587730683, 0x5f5f63695f6c6173745f726567656e65726174657c693a313538373733303339333b7265717565737465645f706167657c733a32313a2261646d696e2f636c69656e74732f6a6f624c697374223b6964656e746974797c733a343a2263636363223b757365726e616d657c733a343a2263636363223b656d61696c7c733a32383a22636f6e7461637440616c6c69616e63656d6f7274676167652e636f6d223b757365725f69647c733a333a22333230223b6f6c645f6c6173745f6c6f67696e7c733a31303a2231353837373232393937223b6c6173745f69707c733a333a223a3a31223b6176617461727c733a33363a2262663764633331636535666538376262343939656333373839303761386334622e6a7067223b67656e6465727c4e3b67726f75705f69647c733a313a2232223b766965775f72696768747c733a313a2230223b656469745f72696768747c733a313a2230223b6572726f727c4e3b),
('rjhgjpl9jbccq22lbl6leuce6fv0h2ta', '::1', 1587745742, 0x5f5f63695f6c6173745f726567656e65726174657c693a313538373734353731343b7265717565737465645f706167657c733a32343a2261646d696e2f636c69656e74732f6164644a6f624c697374223b6964656e746974797c733a343a2263636363223b757365726e616d657c733a343a2263636363223b656d61696c7c733a32383a22636f6e7461637440616c6c69616e63656d6f7274676167652e636f6d223b757365725f69647c733a333a22333230223b6f6c645f6c6173745f6c6f67696e7c733a31303a2231353837373330343933223b6c6173745f69707c733a333a223a3a31223b6176617461727c733a33363a2262663764633331636535666538376262343939656333373839303761386334622e6a7067223b67656e6465727c4e3b67726f75705f69647c733a313a2232223b766965775f72696768747c733a313a2230223b656469745f72696768747c733a313a2230223b6572726f727c4e3b),
('tl7anvrg35kno70spkpv9cfq9lnds7eb', '::1', 1587735849, 0x5f5f63695f6c6173745f726567656e65726174657c693a313538373733353535383b7265717565737465645f706167657c733a32313a2261646d696e2f636c69656e74732f6a6f624c697374223b6964656e746974797c733a343a2263636363223b757365726e616d657c733a343a2263636363223b656d61696c7c733a32383a22636f6e7461637440616c6c69616e63656d6f7274676167652e636f6d223b757365725f69647c733a333a22333230223b6f6c645f6c6173745f6c6f67696e7c733a31303a2231353837373232393937223b6c6173745f69707c733a333a223a3a31223b6176617461727c733a33363a2262663764633331636535666538376262343939656333373839303761386334622e6a7067223b67656e6465727c4e3b67726f75705f69647c733a313a2232223b766965775f72696768747c733a313a2230223b656469745f72696768747c733a313a2230223b6572726f727c4e3b),
('udok8j2vursufhi2nb6n663d78abaa0m', '::1', 1587731612, 0x5f5f63695f6c6173745f726567656e65726174657c693a313538373733313534363b7265717565737465645f706167657c733a32313a2261646d696e2f636c69656e74732f6a6f624c697374223b6964656e746974797c733a343a2263636363223b757365726e616d657c733a343a2263636363223b656d61696c7c733a32383a22636f6e7461637440616c6c69616e63656d6f7274676167652e636f6d223b757365725f69647c733a333a22333230223b6f6c645f6c6173745f6c6f67696e7c733a31303a2231353837373232393937223b6c6173745f69707c733a333a223a3a31223b6176617461727c733a33363a2262663764633331636535666538376262343939656333373839303761386334622e6a7067223b67656e6465727c4e3b67726f75705f69647c733a313a2232223b766965775f72696768747c733a313a2230223b656469745f72696768747c733a313a2230223b6572726f727c4e3b),
('vi5q78h4oc1p6amasp8mbq95mtf93nd0', '::1', 1587734737, 0x5f5f63695f6c6173745f726567656e65726174657c693a313538373733343437303b7265717565737465645f706167657c733a32313a2261646d696e2f636c69656e74732f6a6f624c697374223b6964656e746974797c733a343a2263636363223b757365726e616d657c733a343a2263636363223b656d61696c7c733a32383a22636f6e7461637440616c6c69616e63656d6f7274676167652e636f6d223b757365725f69647c733a333a22333230223b6f6c645f6c6173745f6c6f67696e7c733a31303a2231353837373232393937223b6c6173745f69707c733a333a223a3a31223b6176617461727c733a33363a2262663764633331636535666538376262343939656333373839303761386334622e6a7067223b67656e6465727c4e3b67726f75705f69647c733a313a2232223b766965775f72696768747c733a313a2230223b656469745f72696768747c733a313a2230223b6572726f727c4e3b);

-- --------------------------------------------------------

--
-- Table structure for table `sma_settings`
--

CREATE TABLE `sma_settings` (
  `setting_id` int(1) NOT NULL,
  `logo` varchar(255) NOT NULL,
  `logo2` varchar(255) NOT NULL,
  `site_name` varchar(55) NOT NULL,
  `language` varchar(20) NOT NULL,
  `default_warehouse` int(2) NOT NULL,
  `rows_per_page` int(2) NOT NULL,
  `version` varchar(10) NOT NULL DEFAULT '1.0',
  `dateformat` int(11) NOT NULL,
  `theme` varchar(20) NOT NULL,
  `restrict_user` tinyint(4) NOT NULL DEFAULT '0',
  `restrict_calendar` tinyint(4) NOT NULL DEFAULT '0',
  `timezone` varchar(100) DEFAULT NULL,
  `iwidth` int(11) NOT NULL DEFAULT '0',
  `iheight` int(11) NOT NULL,
  `twidth` int(11) NOT NULL,
  `theight` int(11) NOT NULL,
  `watermark` tinyint(1) DEFAULT NULL,
  `reg_ver` tinyint(1) DEFAULT NULL,
  `allow_reg` tinyint(1) DEFAULT NULL,
  `reg_notification` tinyint(1) DEFAULT NULL,
  `auto_reg` tinyint(1) DEFAULT NULL,
  `protocol` varchar(20) NOT NULL DEFAULT 'mail',
  `mailpath` varchar(55) DEFAULT '/usr/sbin/sendmail',
  `smtp_host` varchar(100) DEFAULT NULL,
  `smtp_user` varchar(100) DEFAULT NULL,
  `smtp_pass` varchar(255) DEFAULT NULL,
  `smtp_port` varchar(10) DEFAULT '25',
  `smtp_crypto` varchar(10) DEFAULT NULL,
  `default_email` varchar(100) NOT NULL,
  `mmode` tinyint(1) NOT NULL,
  `bc_fix` tinyint(4) NOT NULL DEFAULT '0',
  `captcha` tinyint(1) NOT NULL DEFAULT '1',
  `attributes` tinyint(1) NOT NULL DEFAULT '0',
  `decimals` tinyint(2) NOT NULL DEFAULT '2',
  `decimals_sep` varchar(2) NOT NULL DEFAULT '.',
  `thousands_sep` varchar(2) NOT NULL DEFAULT ',',
  `rtl` tinyint(1) DEFAULT '0',
  `each_spent` decimal(15,4) DEFAULT NULL,
  `update` tinyint(1) DEFAULT '0',
  `sac` tinyint(1) DEFAULT '0',
  `display_symbol` tinyint(1) DEFAULT NULL,
  `symbol` varchar(50) DEFAULT NULL,
  `remove_expired` tinyint(1) DEFAULT '0',
  `set_focus` tinyint(1) NOT NULL DEFAULT '0',
  `disable_editing` smallint(6) DEFAULT '90',
  `state` varchar(100) DEFAULT NULL,
  `pdf_lib` varchar(20) DEFAULT 'dompdf'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `sma_settings`
--

INSERT INTO `sma_settings` (`setting_id`, `logo`, `logo2`, `site_name`, `language`, `default_warehouse`, `rows_per_page`, `version`, `dateformat`, `theme`, `restrict_user`, `restrict_calendar`, `timezone`, `iwidth`, `iheight`, `twidth`, `theight`, `watermark`, `reg_ver`, `allow_reg`, `reg_notification`, `auto_reg`, `protocol`, `mailpath`, `smtp_host`, `smtp_user`, `smtp_pass`, `smtp_port`, `smtp_crypto`, `default_email`, `mmode`, `bc_fix`, `captcha`, `attributes`, `decimals`, `decimals_sep`, `thousands_sep`, `rtl`, `each_spent`, `update`, `sac`, `display_symbol`, `symbol`, `remove_expired`, `set_focus`, `disable_editing`, `state`, `pdf_lib`) VALUES
(1, 'SSFL-Logo-300x300.jpg', 'Signaptix-Logo.png', 'Signaptix Signing Solution', 'english', 0, 50, '3.4.12', 4, 'default', 1, 0, 'America/New_York', 1300, 1300, 600, 600, 0, 0, 0, 0, NULL, 'smtp', NULL, 'pop.gmail.com', 'codelover138@gmail.com', '12345678', '25', NULL, 'codelover138@gmail.com', 0, 4, 0, 1, 2, ',', '.', 0, NULL, 0, 0, 0, '', 0, 0, 90, 'AN', 'dompdf');

-- --------------------------------------------------------

--
-- Table structure for table `sma_teams`
--

CREATE TABLE `sma_teams` (
  `id` int(11) NOT NULL,
  `photo` varchar(300) DEFAULT NULL,
  `name` varchar(200) NOT NULL,
  `school_id` int(11) NOT NULL,
  `created_by` int(7) DEFAULT NULL,
  `updated_by` int(7) DEFAULT NULL,
  `created_date` datetime DEFAULT NULL,
  `updated_date` datetime DEFAULT NULL,
  `username` varchar(100) NOT NULL,
  `zone` varchar(50) NOT NULL,
  `division` int(9) NOT NULL,
  `other_information` varchar(100) DEFAULT NULL,
  `tfl` varchar(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `sma_users`
--

CREATE TABLE `sma_users` (
  `id` int(11) UNSIGNED NOT NULL,
  `last_ip_address` varbinary(45) DEFAULT NULL,
  `ip_address` varbinary(45) NOT NULL,
  `username` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL,
  `salt` varchar(40) DEFAULT NULL,
  `email` varchar(100) NOT NULL,
  `activation_code` varchar(40) DEFAULT NULL,
  `forgotten_password_code` varchar(100) DEFAULT NULL,
  `forgotten_password_time` int(11) UNSIGNED DEFAULT NULL,
  `remember_code` varchar(40) DEFAULT NULL,
  `created_on` int(11) UNSIGNED NOT NULL,
  `last_login` int(11) UNSIGNED DEFAULT NULL,
  `active` tinyint(1) UNSIGNED DEFAULT NULL,
  `first_name` varchar(50) DEFAULT NULL,
  `last_name` varchar(50) DEFAULT NULL,
  `company` varchar(100) DEFAULT NULL,
  `phone` varchar(20) DEFAULT NULL,
  `avatar` varchar(55) DEFAULT NULL,
  `gender` varchar(20) DEFAULT NULL,
  `group_id` int(10) UNSIGNED NOT NULL,
  `view_right` tinyint(1) NOT NULL DEFAULT '0',
  `edit_right` tinyint(1) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `sma_users`
--

INSERT INTO `sma_users` (`id`, `last_ip_address`, `ip_address`, `username`, `password`, `salt`, `email`, `activation_code`, `forgotten_password_code`, `forgotten_password_time`, `remember_code`, `created_on`, `last_login`, `active`, `first_name`, `last_name`, `company`, `phone`, `avatar`, `gender`, `group_id`, `view_right`, `edit_right`) VALUES
(1, 0x3a3a31, 0x0000, 'codelover', '36911a652dc8dcd6d1fc08fda7e049b0adc0a0a8', NULL, 'codelover138@gmail.com', '4d6bc9a113bb52b421f93f26407a4f9b2a38e132', 'f13f3399fb7b7839005e24abe6a82ec47ef74f0d', 1585058950, '9bdd01e4d1b165fdc400a7ba1b3a10f4e2ffe074', 1351661704, 1587317441, 1, 'Abdul', 'Kader Babu', '', '8801781870371', '1b74784741a77a46929c02840da89173.png', 'male', 1, 1, 1),
(320, 0x3a3a31, 0x3a3a31, 'cccc', '5ff2297342dd0ef5c38d24760aae89e4d93357d1', NULL, 'contact@alliancemortgage.com', NULL, NULL, NULL, NULL, 1585221164, 1587745731, 1, 'Ted', 'Knight', 'CCC', '888-333-1212', 'bf7dc31ce5fe87bb499ec378907a8c4b.jpg', NULL, 2, 0, 0),
(369, 0x3a3a31, 0x3a3a31, 'alisha', '0b7a6cdc0700592e11af0881ba341b8d40fc38ae', NULL, '', NULL, NULL, NULL, NULL, 1585843102, 1585843113, 1, 'Alisha', 'Morgan', '', '888-333-1215', 'ef290adca553054dfdebe39b3c737da4.png', NULL, 3, 0, 0);

-- --------------------------------------------------------

--
-- Table structure for table `sma_user_logins`
--

CREATE TABLE `sma_user_logins` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `company_id` int(11) DEFAULT NULL,
  `ip_address` varbinary(16) NOT NULL,
  `login` varchar(100) NOT NULL,
  `time` timestamp NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `sma_user_logins`
--

INSERT INTO `sma_user_logins` (`id`, `user_id`, `company_id`, `ip_address`, `login`, `time`) VALUES
(1, 1, NULL, 0x31302e312e312e3535, 'owner', '2019-01-23 18:13:41'),
(2, 1, NULL, 0x3a3a31, 'owner', '2019-01-25 08:12:04'),
(3, 1, NULL, 0x3a3a31, 'owner', '2019-01-26 14:48:58'),
(4, 1, NULL, 0x3a3a31, 'owner', '2019-01-30 14:59:44'),
(5, 1, NULL, 0x3a3a31, 'owner', '2019-01-31 14:28:18'),
(6, 1, NULL, 0x3a3a31, 'owner', '2019-02-05 14:14:37'),
(7, 1, NULL, 0x3a3a31, 'owner', '2019-02-05 18:49:37'),
(8, 1, NULL, 0x3a3a31, 'owner', '2019-02-06 15:32:13'),
(9, 1, NULL, 0x3a3a31, 'owner', '2019-02-07 14:50:20'),
(10, 1, NULL, 0x3a3a31, 'owner', '2019-02-08 08:35:30'),
(11, 1, NULL, 0x3a3a31, 'owner', '2019-02-08 10:42:23'),
(12, 1, NULL, 0x3a3a31, 'owner', '2019-02-15 07:55:03'),
(13, 1, NULL, 0x3a3a31, 'owner', '2019-02-25 15:20:17'),
(14, 1, NULL, 0x3a3a31, 'owner', '2019-03-01 06:13:20'),
(15, 1, NULL, 0x3a3a31, 'owner', '2019-03-12 07:08:34'),
(16, 1, NULL, 0x3a3a31, 'owner', '2019-04-07 14:59:35'),
(17, 1, NULL, 0x3a3a31, 'codelover', '2019-04-08 14:55:14'),
(18, 1, NULL, 0x3a3a31, 'codelover', '2019-04-08 15:36:37'),
(19, 1, NULL, 0x3a3a31, 'codelover', '2019-04-11 15:16:35'),
(20, 1, NULL, 0x3a3a31, 'codelover', '2019-04-13 15:19:24'),
(21, 1, NULL, 0x3a3a31, 'codelover', '2019-04-15 14:20:06'),
(22, 11, NULL, 0x3a3a31, 'test', '2019-04-15 15:56:28'),
(23, 1, NULL, 0x3a3a31, 'codelover', '2019-04-15 15:57:30'),
(24, 1, NULL, 0x3a3a31, 'codelover', '2019-04-17 14:33:55'),
(25, 1, NULL, 0x3a3a31, 'codelover', '2019-04-18 04:35:26'),
(26, 4, NULL, 0x3a3a31, 'babu_diu_fpi@yahoo.com', '2019-04-18 06:19:24'),
(27, 1, NULL, 0x3a3a31, 'codelover', '2019-04-18 06:20:59'),
(28, 5, NULL, 0x3a3a31, 'babu1234', '2019-04-18 06:30:49'),
(29, 5, NULL, 0x3a3a31, 'babu1234', '2019-04-18 06:40:17'),
(30, 5, NULL, 0x3a3a31, 'babu1234', '2019-04-18 06:59:17'),
(31, 1, NULL, 0x3a3a31, 'codelover', '2019-04-18 07:23:10'),
(32, 5, NULL, 0x3a3a31, 'babu1234', '2019-04-18 08:38:46'),
(33, 1, NULL, 0x3a3a31, 'codelover', '2019-04-18 08:39:44'),
(34, 1, NULL, 0x3130332e3133362e302e3138, 'codelover', '2019-04-18 17:11:51'),
(35, 1, NULL, 0x3130332e3133362e302e3138, 'codelover', '2019-04-18 17:14:31'),
(36, 1, NULL, 0x3130332e3133362e302e3138, 'codelover', '2019-04-18 17:15:06'),
(37, 5, NULL, 0x3130332e3133362e302e3138, 'babu_diu_fpi1111@yahoo.com', '2019-04-18 17:15:34'),
(38, 1, NULL, 0x3130332e3133362e302e3138, 'codelover', '2019-04-18 17:17:10'),
(39, 1, NULL, 0x3139302e3231332e3139382e3631, 'codelover', '2019-04-18 18:55:09'),
(40, 1, NULL, 0x3139302e3231332e3139382e3631, 'codelover', '2019-04-18 19:03:12'),
(41, 1, NULL, 0x3139302e3231332e3139382e3631, 'codelover', '2019-04-18 20:20:24'),
(42, 1, NULL, 0x3139302e3231332e3139382e3631, 'codelover', '2019-04-21 01:17:33'),
(43, 1, NULL, 0x3139302e3231332e3139382e3631, 'codelover', '2019-04-22 03:05:41'),
(44, 1, NULL, 0x3130332e3133362e302e3138, 'codelover', '2019-04-22 16:30:01'),
(45, 1, NULL, 0x3139302e3231332e3139382e3631, 'codelover', '2019-04-23 02:56:40'),
(46, 7, NULL, 0x3139302e3231332e3139382e3631, 'shope', '2019-04-23 03:28:50'),
(47, 1, NULL, 0x3139302e3231332e3139382e3631, 'codelover', '2019-04-23 03:33:41'),
(48, 8, NULL, 0x3139302e3231332e3139382e3631, 'dwilliams', '2019-04-23 03:40:23'),
(49, 1, NULL, 0x3139302e3231332e3139382e3631, 'codelover', '2019-04-23 03:46:22'),
(50, 1, NULL, 0x3139302e35382e32312e3130, 'Codelover', '2019-04-23 12:40:37'),
(51, 1, NULL, 0x3130332e3133362e302e3138, 'codelover', '2019-04-26 14:18:41'),
(52, 1, NULL, 0x3139302e35382e392e39, 'Codelover', '2019-04-26 19:11:07'),
(53, 1, NULL, 0x3139302e39332e32392e313237, 'codelover', '2019-04-26 20:49:22'),
(54, 1, NULL, 0x3139302e39332e32392e313237, 'codelover', '2019-04-27 18:21:41'),
(55, 1, NULL, 0x3139302e3231332e3139382e3631, 'codelover', '2019-04-29 00:55:21'),
(56, 11, NULL, 0x3139302e3231332e3139382e3631, 'test15', '2019-04-29 00:59:36'),
(57, 1, NULL, 0x3139302e3231332e3139382e3631, 'codelover', '2019-04-29 01:11:39'),
(58, 11, NULL, 0x3139302e3231332e3139382e3631, 'test15', '2019-04-29 01:28:40'),
(59, 1, NULL, 0x3139302e3231332e3139382e3631, 'codelover', '2019-04-29 01:30:17'),
(60, 1, NULL, 0x3139302e39332e32392e313237, 'codelover', '2019-04-29 22:22:52'),
(61, 12, NULL, 0x3139302e39332e32392e313237, 'sarah', '2019-04-29 22:52:47'),
(62, 1, NULL, 0x3139302e39332e32392e313237, 'codelover', '2019-04-29 22:57:27'),
(63, 1, NULL, 0x3139302e39332e32392e313237, 'codelover', '2019-04-29 23:02:40'),
(64, 7, NULL, 0x3139302e39332e32392e313237, 'drommel', '2019-04-29 23:04:04'),
(65, 1, NULL, 0x3139302e39332e32392e313237, 'codelover', '2019-04-29 23:06:18'),
(66, 7, NULL, 0x3139302e39332e32392e313237, 'drommel', '2019-04-29 23:08:55'),
(67, 1, NULL, 0x3139302e39332e32392e313237, 'codelover', '2019-04-29 23:10:06'),
(68, 7, NULL, 0x3139302e39332e32392e313237, 'drommel', '2019-04-29 23:11:59'),
(69, 1, NULL, 0x3139302e35382e392e3134, 'Codelover', '2019-04-30 13:34:59'),
(70, 1, NULL, 0x3139302e35382e392e3134, 'Codelover', '2019-04-30 17:04:37'),
(71, 1, NULL, 0x3139302e3231332e3139382e3631, 'codelover', '2019-05-03 00:26:24'),
(72, 1, NULL, 0x3139302e3231332e3139382e3631, 'codelover', '2019-05-03 02:19:21'),
(73, 13, NULL, 0x3139302e3231332e3139382e3631, 'alice', '2019-05-03 02:38:23'),
(74, 1, NULL, 0x3139302e3231332e3139382e3631, 'codelover', '2019-05-03 02:40:14'),
(75, 1, NULL, 0x3139302e3231332e3139382e3631, 'codelover', '2019-05-03 02:49:35'),
(76, 13, NULL, 0x3139302e3231332e3139382e3631, 'Alice', '2019-05-03 02:51:21'),
(77, 1, NULL, 0x3139302e38332e3233302e313735, 'codelover', '2019-05-03 16:29:28'),
(78, 1, NULL, 0x3138312e3138382e33352e323231, 'codelover', '2019-05-09 14:17:07'),
(79, 1, NULL, 0x3139302e3231332e3139382e3631, 'codelover', '2019-05-12 03:21:00'),
(80, 1, NULL, 0x33392e34352e36322e36, 'codelover', '2019-05-12 05:23:45'),
(81, 1, NULL, 0x3139302e3231332e3139382e3631, 'codelover', '2019-05-13 01:50:40'),
(82, 1, NULL, 0x3139302e39332e32392e313237, 'codelover', '2019-05-13 22:37:45'),
(83, 1, NULL, 0x3139302e35382e382e39, 'codelover', '2019-05-14 22:04:29'),
(84, 1, NULL, 0x3139302e3231332e3139382e3631, 'codelover', '2019-05-15 03:52:56'),
(85, 1, NULL, 0x3139302e3231332e3139382e3631, 'codelover', '2019-05-15 12:09:06'),
(86, 11, NULL, 0x3130332e3131312e3136342e313734, 'adam01', '2019-05-15 14:19:38'),
(87, 11, NULL, 0x3130332e3235352e372e3235, 'adam01', '2019-05-15 17:19:25'),
(88, 1, NULL, 0x3139302e39332e32392e313237, 'codelover', '2019-05-15 19:37:18'),
(89, 9, NULL, 0x3139302e39332e32392e313237, 'Matt', '2019-05-15 20:57:58'),
(90, 1, NULL, 0x3139302e39332e32392e313237, 'codelover', '2019-05-15 21:11:52'),
(91, 9, NULL, 0x3139302e39332e32392e313237, 'matt', '2019-05-15 21:14:19'),
(92, 1, NULL, 0x3230322e38362e3231382e313534, 'codelover', '2019-05-16 03:22:56'),
(93, 1, NULL, 0x3a3a31, 'codelover', '2019-05-16 03:59:51'),
(94, 27, NULL, 0x3a3a31, 'codelover133', '2019-05-16 06:20:46'),
(95, 1, NULL, 0x3a3a31, 'codelover', '2019-05-18 03:09:51'),
(96, 1, NULL, 0x3a3a31, 'codelover', '2019-05-19 03:49:53'),
(97, 27, NULL, 0x3a3a31, 'codelover133', '2019-05-19 03:51:13'),
(98, 1, NULL, 0x3a3a31, 'codelover', '2019-05-19 05:36:49'),
(99, 28, NULL, 0x3a3a31, 'test1', '2019-05-19 05:40:46'),
(100, 1, NULL, 0x3a3a31, 'codelover', '2019-05-19 05:42:13'),
(101, 28, NULL, 0x3a3a31, 'test1', '2019-05-19 05:44:48'),
(102, 1, NULL, 0x3a3a31, 'codelover', '2019-05-19 05:50:15'),
(103, 28, NULL, 0x3a3a31, 'test1', '2019-05-19 05:51:26'),
(104, 29, NULL, 0x3a3a31, 'test2', '2019-05-19 06:31:12'),
(105, 1, NULL, 0x3a3a31, 'codelover', '2019-05-19 06:39:13'),
(106, 28, NULL, 0x3a3a31, 'test1', '2019-05-19 06:43:45'),
(107, 1, NULL, 0x3a3a31, 'codelover', '2019-05-19 06:52:26'),
(108, 1, NULL, 0x3a3a31, 'codelover', '2019-05-19 06:53:40'),
(109, 28, NULL, 0x3a3a31, 'test1', '2019-05-19 06:55:58'),
(110, 1, NULL, 0x3a3a31, 'codelover', '2019-05-19 07:09:57'),
(111, 28, NULL, 0x3a3a31, 'test1', '2019-05-19 07:11:10'),
(112, 1, NULL, 0x3a3a31, 'codelover', '2019-05-19 07:12:09'),
(113, 28, NULL, 0x3a3a31, 'test1', '2019-05-19 07:13:59'),
(114, 1, NULL, 0x3a3a31, 'codelover', '2019-05-20 03:41:33'),
(115, 1, NULL, 0x3a3a31, 'codelover', '2019-05-20 05:06:43'),
(116, 45, NULL, 0x3a3a31, 'testp2', '2019-05-20 05:08:41'),
(117, 1, NULL, 0x3a3a31, 'codelover', '2019-05-20 07:46:40'),
(118, 45, NULL, 0x3a3a31, 'testp2', '2019-05-20 07:49:12'),
(119, 1, NULL, 0x3a3a31, 'codelover', '2019-05-20 07:52:30'),
(120, 48, NULL, 0x3a3a31, 'testc2', '2019-05-20 08:25:21'),
(121, 1, NULL, 0x3a3a31, 'codelover', '2019-05-20 08:32:49'),
(122, 48, NULL, 0x3a3a31, 'testc2', '2019-05-20 08:46:23'),
(123, 33, NULL, 0x3a3a31, 'testp1', '2019-05-20 08:46:48'),
(124, 1, NULL, 0x3a3a31, 'codelover', '2019-05-20 08:48:24'),
(125, 1, NULL, 0x3a3a31, 'codelover', '2019-05-20 08:49:45'),
(126, 48, NULL, 0x3a3a31, 'testc2', '2019-05-20 08:51:51'),
(127, 1, NULL, 0x3a3a31, 'codelover', '2019-05-21 04:56:02'),
(128, 1, NULL, 0x3a3a31, 'codelover', '2019-05-21 06:19:44'),
(129, 49, NULL, 0x3a3a31, 'test4', '2019-05-21 06:20:14'),
(130, 1, NULL, 0x3a3a31, 'codelover', '2019-05-21 06:20:59'),
(131, 49, NULL, 0x3a3a31, 'test4', '2019-05-21 06:22:02'),
(132, 1, NULL, 0x3a3a31, 'codelover', '2019-05-21 06:22:36'),
(133, 1, NULL, 0x3230322e38362e3231382e313534, 'codelover', '2019-05-21 06:44:05'),
(134, 1, NULL, 0x3230322e38362e3231382e313534, 'codelover', '2019-05-21 10:44:29'),
(135, 1, NULL, 0x3139302e3231332e3139382e3631, 'codelover', '2019-05-22 01:56:40'),
(136, 1, NULL, 0x3230322e38362e3231382e313534, 'codelover', '2019-05-23 05:16:41'),
(137, 1, NULL, 0x3230322e38362e3231382e313534, 'codelover', '2019-05-23 05:28:07'),
(138, 1, NULL, 0x3230322e38362e3231382e313534, 'codelover', '2019-05-23 09:03:02'),
(139, 1, NULL, 0x3139302e3231332e3139382e3631, 'Codelover', '2019-05-23 09:53:24'),
(140, 1, NULL, 0x3130332e3133362e302e3138, 'codelover', '2019-05-24 06:06:25'),
(141, 1, NULL, 0x3130332e3133362e302e3138, 'codelover', '2019-05-24 14:40:28'),
(142, 1, NULL, 0x3139302e3231332e3139382e3631, 'codelover', '2019-05-25 10:59:17'),
(143, 1, NULL, 0x3130332e3133362e302e3138, 'codelover', '2019-05-25 18:47:15'),
(144, 1, NULL, 0x3130332e3133362e302e3138, 'codelover', '2019-05-26 16:37:01'),
(145, 1, NULL, 0x3139302e3231332e3139382e3631, 'codelover', '2019-05-26 23:46:29'),
(146, 1, NULL, 0x3130332e3133362e302e3138, 'codelover', '2019-05-29 18:19:56'),
(147, 1, NULL, 0x3139302e3231332e3139382e3631, 'codelover', '2019-05-30 02:04:17'),
(148, 1, NULL, 0x3230322e38362e3231382e313534, 'codelover', '2019-05-30 04:15:55'),
(149, 1, NULL, 0x3139302e3231332e3139382e3631, 'codelover', '2019-05-30 12:09:48'),
(150, 1, NULL, 0x3139302e3231332e3139382e3631, 'codelover', '2019-05-30 12:14:00'),
(151, 52, NULL, 0x3139302e3231332e3139382e3631, 'shope123', '2019-05-30 12:15:10'),
(152, 52, NULL, 0x33392e35392e37322e34, 'shope123', '2019-05-30 12:21:34'),
(153, 52, NULL, 0x3139302e3231332e3139382e3631, 'shope123', '2019-05-30 22:24:10'),
(154, 52, NULL, 0x33392e35392e37322e34, 'shope123', '2019-05-31 03:37:16'),
(155, 1, NULL, 0x3130332e3133362e302e3138, 'codelover', '2019-05-31 10:43:07'),
(156, 52, NULL, 0x3139302e3231332e3139382e3631, 'shope123', '2019-05-31 12:10:20'),
(157, 1, NULL, 0x3130332e3133362e302e3138, 'codelover', '2019-05-31 13:05:30'),
(158, 52, NULL, 0x3139302e3231332e3139382e3631, 'shope123', '2019-06-01 02:18:42'),
(159, 1, NULL, 0x3130332e3133362e302e3138, 'codelover', '2019-06-02 09:28:45'),
(160, 52, NULL, 0x3139302e3231332e3139382e3631, 'shope123', '2019-06-02 12:16:10'),
(161, 52, NULL, 0x3139302e3231332e3139382e3631, 'shope123', '2019-06-02 15:39:18'),
(162, 57, NULL, 0x3139302e3231332e3139382e3631, 'pthomas', '2019-06-02 17:10:10'),
(163, 52, NULL, 0x3139302e3231332e3139382e3631, 'shope123', '2019-06-02 17:19:41'),
(164, 57, NULL, 0x3139302e3231332e3139382e3631, 'pthomas', '2019-06-02 17:22:22'),
(165, 52, NULL, 0x3139302e3231332e3139382e3631, 'shope123', '2019-06-02 17:24:23'),
(166, 1, NULL, 0x3230322e38362e3231382e313534, 'codelover', '2019-06-03 02:57:20'),
(167, 52, NULL, 0x3139302e35382e382e38, 'shope123', '2019-06-03 13:34:35'),
(168, 1, NULL, 0x3130332e3133362e302e3138, 'codelover', '2019-06-03 15:26:53'),
(169, 52, NULL, 0x3139302e3231332e3139382e3631, 'shope123', '2019-06-04 00:16:56'),
(170, 60, NULL, 0x3139302e3231332e3139382e3631, 'mjoseph', '2019-06-04 00:23:47'),
(171, 52, NULL, 0x3139302e3231332e3139382e3631, 'shope123', '2019-06-04 01:22:05'),
(172, 52, NULL, 0x3139302e39332e32392e313237, 'shope123', '2019-06-04 23:12:11'),
(173, 1, NULL, 0x33372e3131312e3232362e313538, 'codelover', '2019-06-05 12:30:03'),
(174, 1, NULL, 0x33372e3131312e3232342e3232, 'codelover', '2019-06-05 15:19:18'),
(175, 52, NULL, 0x3139302e3231332e3139382e3631, 'shope123', '2019-06-06 01:10:55'),
(176, 52, NULL, 0x3139302e3231332e3139382e3631, 'shope123', '2019-06-06 01:16:12'),
(177, 52, NULL, 0x3139302e3231332e3139382e3631, 'shope123', '2019-06-06 01:38:27'),
(178, 52, NULL, 0x33392e35392e3131342e3935, 'shope123', '2019-06-06 02:48:28'),
(179, 63, NULL, 0x3139302e3231332e3139382e3631, 'trump', '2019-06-06 03:08:59'),
(180, 52, NULL, 0x3139302e3231332e3139382e3631, 'shope123', '2019-06-06 03:20:20'),
(181, 52, NULL, 0x3139302e38332e3138342e3137, 'shope123', '2019-06-06 14:06:19'),
(182, 52, NULL, 0x3139302e38332e3233302e313735, 'shope123', '2019-06-06 16:34:33'),
(183, 63, NULL, 0x3139302e38332e3233302e313735, 'trump', '2019-06-06 17:10:27'),
(184, 1, NULL, 0x33372e3131312e3232342e313631, 'codelover', '2019-06-07 02:03:17'),
(185, 52, NULL, 0x33392e35392e35352e323337, 'shope123', '2019-06-07 11:24:44'),
(186, 52, NULL, 0x33392e35392e35352e323337, 'shope123', '2019-06-07 21:07:12'),
(187, 52, NULL, 0x33392e35392e35352e323337, 'shope123', '2019-06-08 05:31:23'),
(188, 52, NULL, 0x3139302e3231332e3139382e3631, 'shope123', '2019-06-08 11:45:52'),
(189, 1, NULL, 0x33372e3131312e3233302e3237, 'codelover', '2019-06-09 11:02:31'),
(190, 1, NULL, 0x33372e3131312e3139392e3234, 'Codelover', '2019-06-09 12:07:38'),
(191, 52, NULL, 0x3139302e3231332e3139382e3631, 'shope123', '2019-06-09 22:17:45'),
(192, 63, NULL, 0x3139302e3231332e3139382e3631, 'trump', '2019-06-09 22:27:51'),
(193, 52, NULL, 0x3139302e3231332e3139382e3631, 'shope123', '2019-06-09 22:36:17'),
(194, 69, NULL, 0x3139302e3231332e3139382e3631, 'Klynch', '2019-06-09 22:57:19'),
(195, 52, NULL, 0x3139302e3231332e3139382e3631, 'shope123', '2019-06-09 23:31:17'),
(196, 75, NULL, 0x3139302e3231332e3139382e3631, 'msmorgan', '2019-06-09 23:35:18'),
(197, 52, NULL, 0x3139302e3231332e3139382e3631, 'shope123', '2019-06-09 23:39:27'),
(198, 70, NULL, 0x3139302e3231332e3139382e3631, 'john smith', '2019-06-09 23:42:53'),
(199, 52, NULL, 0x3139302e3231332e3139382e3631, 'shope123', '2019-06-09 23:46:39'),
(200, 1, NULL, 0x33372e3131312e3232342e313639, 'codelover', '2019-06-10 10:47:48'),
(201, 1, NULL, 0x32342e322e3233302e323138, 'codelover', '2019-06-10 17:10:52'),
(202, 52, NULL, 0x3139302e3231332e3139382e3631, 'shope123', '2019-06-11 01:49:44'),
(203, 63, NULL, 0x3139302e3231332e3139382e3631, 'trump', '2019-06-11 01:54:04'),
(204, 52, NULL, 0x3139302e3231332e3139382e3631, 'shope123', '2019-06-11 02:17:46'),
(205, 1, NULL, 0x33372e3131312e3230332e313637, 'codelover', '2019-06-11 02:20:46'),
(206, 63, NULL, 0x3139302e3231332e3139382e3631, 'trump', '2019-06-11 02:57:54'),
(207, 1, NULL, 0x32342e322e3233302e323138, 'codelover', '2019-06-11 03:32:43'),
(208, 63, NULL, 0x3139302e39332e32392e313237, 'trump', '2019-06-11 19:47:14'),
(209, 52, NULL, 0x3139302e3231332e3139382e3631, 'shope123', '2019-06-12 10:25:08'),
(210, 77, NULL, 0x3139302e3231332e3139382e3631, 'Tobago sec', '2019-06-12 11:41:49'),
(211, 83, NULL, 0x3139302e3231332e3139382e3631, 'mason hall', '2019-06-12 11:46:55'),
(212, 52, NULL, 0x3139302e3231332e3139382e3631, 'shope123', '2019-06-12 11:48:59'),
(213, 52, NULL, 0x3139302e3231332e3139382e3631, 'shope123', '2019-06-12 11:52:28'),
(214, 52, NULL, 0x3139302e35382e382e32, 'Shope123', '2019-06-12 14:05:29'),
(215, 52, NULL, 0x3139302e35382e3234342e323138, 'shope123', '2019-06-12 17:26:42'),
(216, 52, NULL, 0x3139302e35382e3234342e323138, 'shope123', '2019-06-12 17:58:39'),
(217, 86, NULL, 0x3139302e35382e3234342e323138, 'bishops', '2019-06-12 18:05:18'),
(218, 84, NULL, 0x3139302e35382e3234342e323138, 'scarborough', '2019-06-12 18:12:29'),
(219, 83, NULL, 0x3139302e35382e3234342e323138, 'Mason Hall', '2019-06-12 18:12:40'),
(220, 83, NULL, 0x3139302e35382e3234342e323138, 'Mason hall', '2019-06-12 18:12:47'),
(221, 84, NULL, 0x3139302e35382e3234342e323138, 'scarborough', '2019-06-12 18:12:51'),
(222, 83, NULL, 0x3139302e35382e3234342e323138, 'Mason Hall', '2019-06-12 18:12:59'),
(223, 83, NULL, 0x3139302e35382e3234342e323138, 'Mason Hall', '2019-06-12 18:13:38'),
(224, 81, NULL, 0x3139302e35382e3234342e323138, 'Signal hill', '2019-06-12 18:15:09'),
(225, 82, NULL, 0x3139302e35382e3234342e323138, 'pentecostal', '2019-06-12 18:15:31'),
(226, 52, NULL, 0x3139302e35382e3234342e323138, 'shope123', '2019-06-12 18:16:44'),
(227, 77, NULL, 0x3139302e35382e3234342e323138, 'Tobago sec', '2019-06-12 18:17:42'),
(228, 87, NULL, 0x3139302e35382e3234342e323138, 'speyside', '2019-06-12 18:19:58'),
(229, 88, NULL, 0x3139302e35382e3234342e323138, 'Roxborough', '2019-06-12 18:21:20'),
(230, 63, NULL, 0x3139302e35382e3234342e323138, 'trump', '2019-06-12 18:21:34'),
(231, 86, NULL, 0x3139302e35382e3234342e323138, 'bishops', '2019-06-12 18:32:25'),
(232, 52, NULL, 0x3139302e35382e3234342e323138, 'shope123', '2019-06-12 18:37:26'),
(233, 89, NULL, 0x3139302e35382e3234342e323138, 'bishops', '2019-06-12 18:39:46'),
(234, 89, NULL, 0x3139302e35382e3234342e323138, 'bishops', '2019-06-12 18:40:17'),
(235, 52, NULL, 0x3139302e35382e3234342e323138, 'shope123', '2019-06-12 18:41:15'),
(236, 87, NULL, 0x3230302e372e39312e313237, 'speyside', '2019-06-12 18:42:44'),
(237, 83, NULL, 0x3139302e35382e3234342e323138, 'Mason Hall', '2019-06-12 18:55:54'),
(238, 52, NULL, 0x3230302e372e39312e313237, 'shope123', '2019-06-12 19:08:36'),
(239, 52, NULL, 0x3139302e3231332e3139382e3631, 'shope123', '2019-06-13 11:56:20'),
(240, 108, NULL, 0x3139302e3231332e3139382e3631, 'central sec1', '2019-06-13 12:46:37'),
(241, 52, NULL, 0x3139302e3231332e3139382e3631, 'shope123', '2019-06-13 12:48:59'),
(242, 84, NULL, 0x3230302e372e39302e313532, 'Scarborough', '2019-06-13 12:57:13'),
(243, 52, NULL, 0x3139302e35382e31302e31, 'shope123', '2019-06-13 15:48:09'),
(244, 93, NULL, 0x3139302e35382e31302e31, 'Caps East', '2019-06-13 15:52:41'),
(245, 93, NULL, 0x3139302e35382e31302e31, 'Caps East', '2019-06-13 15:54:29'),
(246, 93, NULL, 0x3139302e38332e3233302e313735, 'caps east', '2019-06-13 17:11:46'),
(247, 84, NULL, 0x3230302e372e39302e313532, 'Scarborough', '2019-06-13 19:00:36'),
(248, 93, NULL, 0x3139302e38332e3233302e313735, 'Caps East', '2019-06-14 19:08:25'),
(249, 52, NULL, 0x3139302e3231332e3139382e3631, 'shope123', '2019-06-14 20:56:44'),
(250, 52, NULL, 0x3139302e3231332e3139382e3631, 'shope123', '2019-06-15 10:53:29'),
(251, 1, NULL, 0x3130332e3133362e302e3138, 'codelover', '2019-06-16 14:29:53'),
(252, 52, NULL, 0x3139302e3231332e3139382e3631, 'shope123', '2019-06-16 18:08:32'),
(253, 52, NULL, 0x3139302e3231332e3139382e3631, 'shope123', '2019-06-17 22:15:08'),
(254, 52, NULL, 0x3139302e3231332e3139382e3631, 'shope123', '2019-06-17 22:15:58'),
(255, 110, NULL, 0x3139302e3231332e3139382e3631, 'testuser', '2019-06-17 22:20:22'),
(256, 52, NULL, 0x3138362e39362e3230392e3130, 'shope123', '2019-06-18 12:56:57'),
(257, 52, NULL, 0x3139302e35382e32312e34, 'shope123', '2019-06-18 15:11:47'),
(258, 113, NULL, 0x3139302e35382e32312e34, 'paloseco', '2019-06-18 15:21:44'),
(259, 113, NULL, 0x3138312e3138382e3130392e37, 'paloseco', '2019-06-18 15:22:43'),
(260, 52, NULL, 0x3139302e35382e32312e34, 'shope123', '2019-06-18 15:56:20'),
(261, 52, NULL, 0x3139302e39332e32392e313237, 'shope123', '2019-06-18 18:42:47'),
(262, 52, NULL, 0x3139302e39332e32392e313237, 'shope123', '2019-06-18 19:19:07'),
(263, 131, NULL, 0x3139302e38332e3133332e3231, 'Naparima', '2019-06-18 20:04:25'),
(264, 132, NULL, 0x3137302e3234362e3136312e323437, 'Palo Seco', '2019-06-18 23:31:36'),
(265, 145, NULL, 0x3138312e3138382e3131392e3832, 'Siparia West', '2019-06-18 23:54:16'),
(266, 145, NULL, 0x3138312e3138382e3131392e3832, 'Siparia West', '2019-06-19 00:03:12'),
(267, 144, NULL, 0x3136312e302e3233332e3138, 'Siparia East', '2019-06-19 23:30:00'),
(268, 144, NULL, 0x3136312e302e3233332e3138, 'Siparia East', '2019-06-19 23:46:16'),
(269, 144, NULL, 0x3136312e302e3233332e3138, 'siparia east', '2019-06-19 23:47:55'),
(270, 52, NULL, 0x3139302e3231332e3139382e3631, 'shope123', '2019-06-20 17:48:51'),
(271, 120, NULL, 0x3139302e39332e38352e3535, 'Fyzabad Secondary', '2019-06-20 17:54:44'),
(272, 120, NULL, 0x3139302e39332e38352e3535, 'Fyzabad Secondary', '2019-06-20 17:56:12'),
(273, 52, NULL, 0x3139302e3231332e3139382e3631, 'shope123', '2019-06-20 22:03:10'),
(274, 131, NULL, 0x3138312e3138382e3132342e313231, 'Naparima', '2019-06-21 01:11:55'),
(275, 131, NULL, 0x3138312e3138382e3132342e313231, 'Naparima', '2019-06-21 01:13:08'),
(276, 52, NULL, 0x3139302e3231332e3139382e3631, 'shope123', '2019-06-21 11:13:54'),
(277, 157, NULL, 0x3139302e35382e31372e3434, 'eastmucurapo', '2019-06-21 13:59:08'),
(278, 166, NULL, 0x3139302e35382e31372e3438, 'russell', '2019-06-21 14:01:32'),
(279, 157, NULL, 0x3139302e35382e31372e3434, 'eastmucurapo', '2019-06-21 14:05:42'),
(280, 165, NULL, 0x3139302e35382e382e36, 'qroyal', '2019-06-21 14:06:12'),
(281, 158, NULL, 0x3230302e372e39302e313735, 'Fatima', '2019-06-21 14:07:42'),
(282, 52, NULL, 0x3139302e35382e382e36, 'shope123', '2019-06-21 14:48:58'),
(283, 157, NULL, 0x3138362e34352e37372e313330, 'eastmucurapo', '2019-06-21 14:50:09'),
(284, 52, NULL, 0x3139302e35382e382e36, 'shope123', '2019-06-21 15:15:33'),
(285, 178, NULL, 0x3139302e35382e382e36, 'tranquility', '2019-06-21 15:21:46'),
(286, 178, NULL, 0x3139302e35382e382e36, 'Tranquility', '2019-06-21 15:24:03'),
(287, 175, NULL, 0x3139302e3231332e32312e3236, 'trinitymoka', '2019-06-22 16:11:03'),
(288, 175, NULL, 0x3139302e3231332e32312e3236, 'trinitymoka', '2019-06-22 16:14:59'),
(289, 1, NULL, 0x3130332e3133362e302e3138, 'codelover', '2019-06-24 14:01:44'),
(290, 145, NULL, 0x3138312e3138382e3131392e3832, 'Siparia West', '2019-06-24 16:25:39'),
(291, 52, NULL, 0x3139302e3231332e3139382e3631, 'shope123', '2019-06-24 23:34:51'),
(292, 120, NULL, 0x3138312e3138382e38372e3430, 'fyzabad secondary', '2019-06-25 12:20:05'),
(293, 52, NULL, 0x3230302e372e39302e313631, 'shope123', '2019-06-25 12:44:21'),
(294, 131, NULL, 0x3139302e38332e3133332e3231, 'Naparima', '2019-06-25 14:23:03'),
(295, 52, NULL, 0x3139302e3231332e3139382e3631, 'shope123', '2019-06-25 23:59:27'),
(296, 52, NULL, 0x3139302e3231332e3139382e3631, 'shope123', '2019-06-26 02:10:03'),
(297, 1, NULL, 0x3230322e38362e3231382e313534, 'codelover', '2019-06-26 03:17:10'),
(298, 52, NULL, 0x3139302e3231332e39372e323235, 'shope123', '2019-06-26 16:14:07'),
(299, 182, NULL, 0x3230302e372e39302e313738, 'baratariasouth', '2019-06-26 16:39:14'),
(300, 190, NULL, 0x3139302e3231332e39372e323235, 'fiverivers', '2019-06-26 16:39:17'),
(301, 180, NULL, 0x3139302e35382e31372e3432, 'arimanorth', '2019-06-26 16:39:28'),
(302, 193, NULL, 0x3139302e3231332e39372e323235, 'holycross', '2019-06-26 16:41:03'),
(303, 180, NULL, 0x3139302e35382e31372e3432, 'arimanorth', '2019-06-26 16:41:53'),
(304, 183, NULL, 0x3230302e372e39312e3534, 'bishopeast', '2019-06-26 16:43:09'),
(305, 199, NULL, 0x3230302e372e39312e3336, 'northgate', '2019-06-26 17:08:36'),
(306, 183, NULL, 0x3230302e372e39312e3534, 'bishopeast', '2019-06-26 17:19:57'),
(307, 208, NULL, 0x3139302e3231332e3231382e38, 'trinityeast', '2019-06-26 18:55:04'),
(308, 208, NULL, 0x3139302e3231332e3231382e38, 'trinityeast', '2019-06-26 18:57:37'),
(309, 138, NULL, 0x3139302e35382e3131322e313234, 'ptown', '2019-06-27 01:30:52'),
(310, 208, NULL, 0x3139302e3231332e3230332e3836, 'trinityeast', '2019-06-27 03:29:54'),
(311, 154, NULL, 0x3133382e35392e32372e38, 'Blanchisseuse ', '2019-06-27 04:13:22'),
(312, 133, NULL, 0x3230302e372e39312e3936, 'penal', '2019-06-27 21:58:53'),
(313, 120, NULL, 0x3139302e39332e38352e3535, 'Fyzabad Secondary', '2019-06-27 22:12:57'),
(314, 120, NULL, 0x3139302e39332e38352e3535, 'Fyzabad Secondary', '2019-06-28 01:27:52'),
(315, 1, NULL, 0x33392e36322e312e323239, 'codelover', '2019-06-29 21:03:55'),
(316, 52, NULL, 0x3139302e39332e32392e313237, 'shope123', '2019-06-29 21:26:54'),
(317, 52, NULL, 0x33392e36322e312e323239, 'shope123', '2019-06-29 21:28:51'),
(318, 120, NULL, 0x3139302e39332e38352e3535, 'Fyzabad Secondary', '2019-06-30 15:00:40'),
(319, 120, NULL, 0x3139302e39332e38352e3535, 'Fyzabad Secondary', '2019-07-01 18:22:24'),
(320, 130, NULL, 0x3139302e38332e3235342e3533, 'Moruga', '2019-07-01 21:18:51'),
(321, 120, NULL, 0x3139302e39332e38352e3535, 'Fyzabad Secondary', '2019-07-01 21:59:50'),
(322, 132, NULL, 0x3137302e3234362e3136312e323437, 'Palo Seco', '2019-07-02 01:58:29'),
(323, 52, NULL, 0x3139302e38332e3138342e3137, 'shope123', '2019-07-02 19:15:36'),
(324, 120, NULL, 0x3139302e39332e38352e3535, 'Fyzabad Secondary', '2019-07-02 22:01:11'),
(325, 120, NULL, 0x3139302e39332e38352e3535, 'Fyzabad Secondary', '2019-07-03 18:55:10'),
(326, 132, NULL, 0x3137302e3234362e3136312e323437, 'palo seco', '2019-07-05 00:17:04'),
(327, 132, NULL, 0x3137302e3234362e3136312e323437, 'palo seco', '2019-07-05 00:20:01'),
(328, 52, NULL, 0x3139302e35382e32312e3131, 'shope123', '2019-07-05 11:33:29'),
(329, 256, NULL, 0x3139302e35382e32312e3131, 'Guest', '2019-07-05 11:37:23'),
(330, 1, NULL, 0x3130332e3133362e302e3138, 'codelover', '2019-07-05 18:45:34'),
(331, 52, NULL, 0x3139302e39332e32392e313237, 'shope123', '2019-07-06 20:11:58'),
(332, 52, NULL, 0x3139302e3231332e3139382e3631, 'shope123', '2019-07-07 17:56:55'),
(333, 52, NULL, 0x3130312e35302e3132362e313431, 'shope123 ', '2019-07-08 02:56:04'),
(334, 155, NULL, 0x3139302e3231332e37322e3639, 'diegocentral', '2019-07-08 17:53:33'),
(335, 155, NULL, 0x3139302e3231332e37322e3639, 'diegocentral', '2019-07-08 18:09:19'),
(336, 120, NULL, 0x3139302e39332e38352e3535, 'Fyzabad Secondary', '2019-07-09 00:07:35'),
(337, 52, NULL, 0x3139302e3231332e3139382e3631, 'shope123', '2019-07-09 01:44:16'),
(338, 52, NULL, 0x3139302e3231332e3139382e3631, 'shope123', '2019-07-09 14:27:13'),
(339, 52, NULL, 0x3139302e3231332e3139382e3631, 'shope123', '2019-07-09 14:38:24'),
(340, 93, NULL, 0x3139302e38332e3233302e313735, 'Caps East', '2019-07-09 15:24:02'),
(341, 131, NULL, 0x3139302e3231332e3136382e323530, 'Naparima', '2019-07-09 16:14:04'),
(342, 120, NULL, 0x3139302e39332e38352e3535, 'Fyzabad Secondary', '2019-07-09 18:45:44'),
(343, 1, NULL, 0x3130332e3133362e302e3138, 'codelover', '2019-07-10 14:23:50'),
(344, 133, NULL, 0x3230302e372e39312e3236, 'Penal', '2019-07-10 20:26:48'),
(345, 208, NULL, 0x3139302e3231332e3230332e3836, 'trinityeast', '2019-07-11 04:11:59'),
(346, 208, NULL, 0x3139302e3231332e3230332e3836, 'trinityeast', '2019-07-11 04:36:15'),
(347, 186, NULL, 0x3138312e3138382e322e313136, 'cucollege', '2019-07-12 00:45:02'),
(348, 186, NULL, 0x3138312e3138382e322e313136, 'cucollege', '2019-07-12 00:46:57'),
(349, 204, NULL, 0x3136312e302e3135342e3234, 'stjcollege', '2019-07-12 01:39:26'),
(350, 155, NULL, 0x3139302e3231332e37322e3639, 'diegocentral', '2019-07-12 10:23:00'),
(351, 52, NULL, 0x33392e35392e36332e313730, 'shope123', '2019-07-13 01:11:59'),
(352, 256, NULL, 0x3139302e3231332e3139382e3631, 'guest', '2019-07-13 13:50:41'),
(353, 256, NULL, 0x33392e34312e3234382e313032, 'Guest', '2019-07-13 14:05:11'),
(354, 52, NULL, 0x3132342e3130392e34302e3530, 'shope123 ', '2019-07-16 00:33:23'),
(355, 52, NULL, 0x3131352e3138362e3136342e32, 'shope123 ', '2019-07-16 04:59:23'),
(356, 132, NULL, 0x3137302e3234362e3136312e323437, 'palo seco', '2019-07-16 20:00:20'),
(357, 52, NULL, 0x3131352e3138362e3136342e313539, 'shope123 ', '2019-07-17 00:31:05'),
(358, 52, NULL, 0x3131352e3138362e3136342e313539, 'shope123 ', '2019-07-17 00:46:02'),
(359, 52, NULL, 0x3139302e3231332e3139382e3631, 'shope123', '2019-07-17 01:31:51'),
(360, 52, NULL, 0x3131352e3138362e3136342e313539, 'shope123 ', '2019-07-17 03:34:43'),
(361, 52, NULL, 0x33392e35392e32392e3331, 'shope123', '2019-07-19 05:45:29'),
(362, 1, NULL, 0x3130332e3133362e302e3138, 'codelover', '2019-07-19 06:34:23'),
(363, 167, NULL, 0x3139302e3231332e35332e3232, 'stanthony', '2019-07-22 04:48:59'),
(364, 167, NULL, 0x3139302e3231332e35332e3232, 'stanthony', '2019-07-22 04:50:29'),
(365, 167, NULL, 0x3139302e3231332e35332e3232, 'stanthony', '2019-07-22 04:51:04'),
(366, 167, NULL, 0x3139302e3231332e35332e3232, 'stanthony', '2019-07-22 05:00:29'),
(367, 52, NULL, 0x33392e35392e38392e313239, 'shope123', '2019-07-22 10:59:15'),
(368, 52, NULL, 0x3139302e3231332e3139382e3631, 'shope123', '2019-07-23 12:21:31'),
(369, 1, NULL, 0x3130332e3133362e302e3138, 'codelover', '2019-07-23 18:42:48'),
(370, 52, NULL, 0x3139302e38332e3138342e3137, 'shope123', '2019-07-24 14:49:47'),
(371, 1, NULL, 0x3230322e38362e3231382e313534, 'codelover', '2019-07-25 04:28:03'),
(372, 93, NULL, 0x3139302e38332e3233302e313735, 'Caps East', '2019-07-25 18:41:01'),
(373, 93, NULL, 0x3139302e38332e3233302e313735, 'Caps East', '2019-07-25 18:43:40'),
(374, 204, NULL, 0x3136312e302e3135342e3234, 'stjcollege', '2019-07-25 18:57:15'),
(375, 52, NULL, 0x33392e35392e32352e313033, 'shope123', '2019-07-26 03:41:51'),
(376, 52, NULL, 0x3139302e3231332e3139382e3631, 'shope123', '2019-07-26 12:05:12'),
(377, 52, NULL, 0x3139302e3231332e3139382e3631, 'shope123', '2019-07-26 12:21:51'),
(378, 266, NULL, 0x3139302e3231332e3139382e3631, 'gelliot', '2019-07-26 12:25:27'),
(379, 266, NULL, 0x3139302e39332e37362e323433, 'gelliot', '2019-07-26 12:29:48'),
(380, 52, NULL, 0x33392e35392e34382e323133, 'shope123', '2019-07-26 13:26:24'),
(381, 263, NULL, 0x3139302e38332e3233302e313735, 'lseepersad', '2019-07-26 13:29:14'),
(382, 263, NULL, 0x3139302e38332e3233302e313735, 'lseepersad', '2019-07-26 13:32:30'),
(383, 52, NULL, 0x3130332e3235352e372e3136, 'shope123 ', '2019-08-01 07:37:44'),
(384, 52, NULL, 0x3130332e3235352e372e3136, 'shope123 ', '2019-08-01 14:08:12'),
(385, 52, NULL, 0x3130332e3235352e362e3831, 'shope123 ', '2019-08-02 05:02:05'),
(386, 52, NULL, 0x3130332e3235352e362e3831, 'shope123 ', '2019-08-02 07:34:31'),
(387, 52, NULL, 0x3130332e3235352e362e3831, 'shope123 ', '2019-08-02 10:56:26'),
(388, 266, NULL, 0x3139302e38332e3233302e313735, 'gelliot', '2019-08-02 14:21:35'),
(389, 52, NULL, 0x3130332e3235352e362e313034, 'shope123 ', '2019-08-04 10:29:45'),
(390, 52, NULL, 0x3130332e3235352e362e313034, 'shope123 ', '2019-08-04 12:58:34'),
(391, 165, NULL, 0x3138362e34352e37302e3232, 'qroyal', '2019-08-05 16:43:50'),
(392, 52, NULL, 0x3139302e3231332e3139382e3631, 'shope123', '2019-08-06 09:42:12'),
(393, 266, NULL, 0x3139302e38332e3233302e313735, 'gelliot', '2019-08-06 14:11:29'),
(394, 200, NULL, 0x3136312e302e3135392e313431, 'sjnorth', '2019-08-06 15:31:19'),
(395, 131, NULL, 0x3139302e3231332e3136382e323530, 'Naparima', '2019-08-06 20:55:24'),
(396, 52, NULL, 0x3139302e3231332e3139382e3631, 'shope123', '2019-08-07 00:46:23'),
(397, 172, NULL, 0x3139302e3231332e3139382e3631, 'saints', '2019-08-07 02:03:44'),
(398, 172, NULL, 0x3137302e38322e3231312e323031, 'saints', '2019-08-07 02:05:33'),
(399, 52, NULL, 0x3130332e3235352e372e3539, 'shope123 ', '2019-08-07 11:47:21'),
(400, 266, NULL, 0x3139302e38332e3233302e313735, 'gelliot', '2019-08-07 14:04:09'),
(401, 165, NULL, 0x3138362e34352e36372e3634, 'qroyal', '2019-08-07 17:01:22'),
(402, 52, NULL, 0x3130332e3235352e362e3736, 'shope123 ', '2019-08-08 09:48:15'),
(403, 157, NULL, 0x3139302e35392e3133372e31, 'eastmucurapo', '2019-08-09 01:38:07'),
(404, 52, NULL, 0x3130312e35302e3131322e3138, 'shope123 ', '2019-08-09 07:07:47'),
(405, 52, NULL, 0x3139302e3231332e3139382e3631, 'shope123', '2019-08-09 11:39:00'),
(406, 52, NULL, 0x3130332e3235352e372e3339, 'shope123 ', '2019-08-09 12:12:52'),
(407, 52, NULL, 0x3130332e3235352e372e3339, 'shope123 ', '2019-08-09 21:22:21'),
(408, 52, NULL, 0x3130332e3235352e362e323439, 'shope123 ', '2019-08-10 09:49:24'),
(409, 172, NULL, 0x3136312e302e3135392e35, 'Saints', '2019-08-10 13:26:38'),
(410, 52, NULL, 0x3130342e3233382e35392e33, 'shope123', '2019-08-11 00:57:25'),
(411, 141, NULL, 0x3139302e35392e3134372e313832, 'sando central', '2019-08-12 19:22:42'),
(412, 266, NULL, 0x3139302e39332e37362e323433, 'gelliot', '2019-08-12 21:49:14'),
(413, 193, NULL, 0x3139302e3231332e39372e323235, 'holycross', '2019-08-13 13:56:03'),
(414, 165, NULL, 0x3138362e34352e36372e3634, 'qroyal', '2019-08-13 15:00:32'),
(415, 165, NULL, 0x3138362e34352e36372e3634, 'qroyal', '2019-08-13 16:54:19'),
(416, 141, NULL, 0x3139302e35392e3133362e313933, 'sando central', '2019-08-13 17:20:40'),
(417, 165, NULL, 0x3138362e34352e36372e3634, 'qroyal', '2019-08-13 17:23:08'),
(418, 131, NULL, 0x3139302e3231332e3136382e323530, 'Naparima', '2019-08-14 13:49:13'),
(419, 131, NULL, 0x3139302e3231332e3136382e323530, 'Naparima', '2019-08-14 15:20:48'),
(420, 137, NULL, 0x3138312e3138382e3130392e37, 'pres sando', '2019-08-14 16:02:48'),
(421, 137, NULL, 0x3138312e3138382e3130392e37, 'pres sando', '2019-08-14 16:08:29'),
(422, 52, NULL, 0x3138312e3138382e33322e323131, 'shope123', '2019-08-14 17:21:11'),
(423, 131, NULL, 0x3138312e3138382e33322e323131, 'naparima', '2019-08-14 17:27:22'),
(424, 131, NULL, 0x3139302e3231332e3136382e323530, 'Naparima', '2019-08-14 18:05:14'),
(425, 165, NULL, 0x3139302e3231332e3230302e313035, 'qroyal', '2019-08-14 20:49:59'),
(426, 165, NULL, 0x3139302e3231332e3230302e313035, 'qroyal', '2019-08-14 21:11:24'),
(427, 165, NULL, 0x3138362e34352e36372e3634, 'qroyal', '2019-08-15 02:12:49'),
(428, 165, NULL, 0x3138362e34352e36372e3634, 'qroyal', '2019-08-15 02:26:59'),
(429, 165, NULL, 0x3138362e34352e36372e3634, 'qroyal', '2019-08-15 03:55:16'),
(430, 1, NULL, 0x3131392e33302e33382e313132, 'codelover', '2019-08-15 06:00:31'),
(431, 1, NULL, 0x3a3a31, 'codelover', '2019-08-15 06:14:38'),
(432, 1, NULL, 0x3a3a31, 'codelover', '2019-08-15 16:12:30'),
(433, 1, NULL, 0x3a3a31, 'codelover', '2019-08-16 04:05:30'),
(434, 257, NULL, 0x3a3a31, 'asjasando', '2019-08-16 05:18:04'),
(435, 1, NULL, 0x3a3a31, 'codelover', '2019-08-16 05:24:47'),
(436, 119, NULL, 0x3a3a31, 'fyzabad anglican', '2019-08-16 05:40:15'),
(437, 1, NULL, 0x3a3a31, 'codelover', '2019-08-16 05:43:12'),
(438, 120, NULL, 0x3a3a31, 'fyzabad secondary', '2019-08-16 05:45:48'),
(439, 1, NULL, 0x3a3a31, 'codelover', '2019-08-16 06:12:48'),
(440, 120, NULL, 0x3a3a31, 'fyzabad secondary', '2019-08-16 06:19:41'),
(441, 1, NULL, 0x3a3a31, 'codelover', '2019-08-16 06:20:08'),
(442, 120, NULL, 0x3a3a31, 'fyzabad secondary', '2019-08-16 06:23:13'),
(443, 1, NULL, 0x3a3a31, 'codelover', '2019-08-16 06:23:48'),
(444, 120, NULL, 0x3a3a31, 'fyzabad secondary', '2019-08-16 06:47:56'),
(445, 1, NULL, 0x3a3a31, 'codelover', '2019-08-16 06:48:23'),
(446, 1, NULL, 0x3a3a31, 'codelover', '2020-03-24 17:56:48'),
(447, 1, NULL, 0x3a3a31, 'codelover', '2020-03-25 08:55:54'),
(448, 296, NULL, 0x3a3a31, 'codelover22', '2020-03-25 09:56:45'),
(449, 1, NULL, 0x3a3a31, 'codelover138@gmail.com', '2020-03-25 11:31:20'),
(450, 1, NULL, 0x3a3a31, 'codelover', '2020-03-25 11:43:15'),
(451, 298, NULL, 0x3a3a31, 'codelover11', '2020-03-25 12:41:32'),
(452, 1, NULL, 0x3a3a31, 'codelover', '2020-03-26 06:17:26'),
(453, 316, NULL, 0x3a3a31, 'tol@test.com', '2020-03-26 08:37:57'),
(454, 317, NULL, 0x3a3a31, 'AAA', '2020-03-26 08:40:59'),
(455, 1, NULL, 0x3a3a31, 'codelover', '2020-03-26 08:42:47'),
(456, 1, NULL, 0x3a3a31, 'codelover', '2020-03-26 10:04:04'),
(457, 1, NULL, 0x3a3a31, 'codelover', '2020-03-26 12:54:56'),
(458, 320, NULL, 0x3a3a31, 'cccc', '2020-03-26 14:08:49'),
(459, 1, NULL, 0x3a3a31, 'codelover', '2020-03-26 14:16:18'),
(460, 320, NULL, 0x3a3a31, 'cccc', '2020-03-26 14:20:11'),
(461, 1, NULL, 0x3a3a31, 'codelover', '2020-03-26 14:23:17'),
(462, 321, NULL, 0x3a3a31, 'codelover138', '2020-03-26 15:49:06'),
(463, 1, NULL, 0x3a3a31, 'codelover', '2020-03-26 15:54:03'),
(464, 320, NULL, 0x3a3a31, 'cccc', '2020-03-26 17:23:07'),
(465, 1, NULL, 0x3a3a31, 'codelover', '2020-03-28 03:25:03'),
(466, 1, NULL, 0x3a3a31, 'codelover', '2020-03-28 03:36:46'),
(467, 1, NULL, 0x3a3a31, 'codelover', '2020-03-28 07:25:08'),
(468, 1, NULL, 0x3a3a31, 'codelover', '2020-03-28 08:19:28'),
(469, 1, NULL, 0x3a3a31, 'codelover', '2020-03-28 09:09:09'),
(470, 321, NULL, 0x3a3a31, 'b@b.com', '2020-03-28 09:11:50'),
(471, 1, NULL, 0x3a3a31, 'codelover', '2020-03-28 09:14:57'),
(472, 321, NULL, 0x3a3a31, 'b@b.com', '2020-03-28 09:35:35'),
(473, 1, NULL, 0x3a3a31, 'codelover', '2020-03-28 10:13:02'),
(474, 1, NULL, 0x3a3a31, 'codelover', '2020-03-28 11:03:17'),
(475, 335, NULL, 0x3a3a31, 'b@b111.com', '2020-03-28 11:46:10'),
(476, 1, NULL, 0x3a3a31, 'codelover', '2020-03-28 11:47:14'),
(477, 320, NULL, 0x3a3a31, 'CCCC', '2020-03-28 11:49:56'),
(478, 1, NULL, 0x3a3a31, 'codelover', '2020-03-28 12:14:37'),
(479, 342, NULL, 0x3a3a31, 'tol@test.com', '2020-03-28 12:19:00'),
(480, 1, NULL, 0x3a3a31, 'codelover', '2020-03-28 12:19:18'),
(481, 320, NULL, 0x3a3a31, 'cccc', '2020-03-28 13:59:57'),
(482, 1, NULL, 0x3a3a31, 'codelover', '2020-03-30 04:50:20'),
(483, 1, NULL, 0x3a3a31, 'codelover', '2020-03-30 05:11:34'),
(484, 1, NULL, 0x3a3a31, 'codelover', '2020-03-30 12:45:53'),
(485, 1, NULL, 0x3a3a31, 'codelover', '2020-03-30 12:56:16'),
(486, 1, NULL, 0x3a3a31, 'codelover', '2020-04-01 06:01:28'),
(487, 1, NULL, 0x3a3a31, 'codelover', '2020-04-02 06:28:10'),
(488, 361, NULL, 0x3a3a31, 'alisha', '2020-04-02 15:25:34'),
(489, 362, NULL, 0x3a3a31, 'CACA', '2020-04-02 15:27:10'),
(490, 363, NULL, 0x3a3a31, 'CCCA', '2020-04-02 15:29:52'),
(491, 364, NULL, 0x3a3a31, 'QQQ', '2020-04-02 15:31:17'),
(492, 361, NULL, 0x3a3a31, 'alisha', '2020-04-02 15:35:28'),
(493, 1, NULL, 0x3a3a31, 'codelover', '2020-04-02 15:37:58'),
(494, 367, NULL, 0x3a3a31, 'admin11', '2020-04-02 15:51:32'),
(495, 368, NULL, 0x3a3a31, 'admin21', '2020-04-02 15:53:30'),
(496, 1, NULL, 0x3a3a31, 'codelover', '2020-04-02 15:55:24'),
(497, 369, NULL, 0x3a3a31, 'alisha', '2020-04-02 15:58:33'),
(498, 1, NULL, 0x3a3a31, 'codelover', '2020-04-02 16:11:49'),
(499, 320, NULL, 0x3a3a31, 'cccc', '2020-04-17 08:02:46'),
(500, 320, NULL, 0x3a3a31, 'cccc', '2020-04-17 15:02:40'),
(501, 1, NULL, 0x3a3a31, 'codelover', '2020-04-17 15:11:17'),
(502, 320, NULL, 0x3a3a31, 'CCCC', '2020-04-17 15:11:46'),
(503, 1, NULL, 0x3a3a31, 'codelover', '2020-04-19 17:30:41'),
(504, 320, NULL, 0x3a3a31, 'cccc', '2020-04-19 17:31:05'),
(505, 320, NULL, 0x3a3a31, 'cccc', '2020-04-24 10:09:58'),
(506, 320, NULL, 0x3a3a31, 'cccc', '2020-04-24 12:14:53'),
(507, 320, NULL, 0x3a3a31, 'cccc', '2020-04-24 16:28:51');

-- --------------------------------------------------------

--
-- Table structure for table `sma_warehouses`
--

CREATE TABLE `sma_warehouses` (
  `id` int(11) NOT NULL,
  `code` varchar(50) NOT NULL,
  `name` varchar(255) NOT NULL,
  `address` varchar(255) NOT NULL,
  `map` varchar(255) DEFAULT NULL,
  `phone` varchar(55) DEFAULT NULL,
  `email` varchar(55) DEFAULT NULL,
  `price_group_id` int(11) DEFAULT NULL,
  `home_ground` varchar(100) DEFAULT NULL,
  `zonal_representative` varchar(100) NOT NULL,
  `gcp` varchar(100) NOT NULL,
  `principal` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `sma_brands`
--
ALTER TABLE `sma_brands`
  ADD PRIMARY KEY (`id`),
  ADD KEY `name` (`name`);

--
-- Indexes for table `sma_calendar`
--
ALTER TABLE `sma_calendar`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `sma_captcha`
--
ALTER TABLE `sma_captcha`
  ADD PRIMARY KEY (`captcha_id`),
  ADD KEY `word` (`word`);

--
-- Indexes for table `sma_categories`
--
ALTER TABLE `sma_categories`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id` (`id`);

--
-- Indexes for table `sma_clients`
--
ALTER TABLE `sma_clients`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `sma_clients_job`
--
ALTER TABLE `sma_clients_job`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `order_number` (`order_number`),
  ADD UNIQUE KEY `client_id_2` (`client_id`,`loan_number`);

--
-- Indexes for table `sma_client_documents`
--
ALTER TABLE `sma_client_documents`
  ADD PRIMARY KEY (`id`),
  ADD KEY `order_no` (`order_no`);

--
-- Indexes for table `sma_coaches`
--
ALTER TABLE `sma_coaches`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `username` (`username`);

--
-- Indexes for table `sma_date_format`
--
ALTER TABLE `sma_date_format`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `sma_groups`
--
ALTER TABLE `sma_groups`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `sma_login_attempts`
--
ALTER TABLE `sma_login_attempts`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `sma_notaries`
--
ALTER TABLE `sma_notaries`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `sma_notary_background_check`
--
ALTER TABLE `sma_notary_background_check`
  ADD PRIMARY KEY (`id`),
  ADD KEY `notary_id` (`notary_id`);

--
-- Indexes for table `sma_notary_bar_license`
--
ALTER TABLE `sma_notary_bar_license`
  ADD PRIMARY KEY (`id`),
  ADD KEY `notary_id` (`notary_id`);

--
-- Indexes for table `sma_notary_commission`
--
ALTER TABLE `sma_notary_commission`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `notary_id_2` (`notary_id`),
  ADD KEY `notary_id` (`notary_id`);

--
-- Indexes for table `sma_notary_electronic_commission`
--
ALTER TABLE `sma_notary_electronic_commission`
  ADD PRIMARY KEY (`id`),
  ADD KEY `notary_e_commission` (`notary_id`);

--
-- Indexes for table `sma_notary_insurance`
--
ALTER TABLE `sma_notary_insurance`
  ADD PRIMARY KEY (`id`),
  ADD KEY `notary_id` (`notary_id`);

--
-- Indexes for table `sma_notary_payments`
--
ALTER TABLE `sma_notary_payments`
  ADD PRIMARY KEY (`id`),
  ADD KEY `notary_id` (`notary_id`);

--
-- Indexes for table `sma_notary_producer_license`
--
ALTER TABLE `sma_notary_producer_license`
  ADD PRIMARY KEY (`id`),
  ADD KEY `notary_pro_license` (`notary_id`);

--
-- Indexes for table `sma_notary_training`
--
ALTER TABLE `sma_notary_training`
  ADD PRIMARY KEY (`id`),
  ADD KEY `notary_id` (`notary_id`);

--
-- Indexes for table `sma_notifications`
--
ALTER TABLE `sma_notifications`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `sma_order_ref`
--
ALTER TABLE `sma_order_ref`
  ADD PRIMARY KEY (`ref_id`);

--
-- Indexes for table `sma_permissions`
--
ALTER TABLE `sma_permissions`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `sma_players`
--
ALTER TABLE `sma_players`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `username` (`username`);

--
-- Indexes for table `sma_registration`
--
ALTER TABLE `sma_registration`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `reference_no` (`reference_no`,`player_ref`);

--
-- Indexes for table `sma_sessions`
--
ALTER TABLE `sma_sessions`
  ADD PRIMARY KEY (`id`),
  ADD KEY `ci_sessions_timestamp` (`timestamp`);

--
-- Indexes for table `sma_settings`
--
ALTER TABLE `sma_settings`
  ADD PRIMARY KEY (`setting_id`);

--
-- Indexes for table `sma_teams`
--
ALTER TABLE `sma_teams`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `username` (`username`);

--
-- Indexes for table `sma_users`
--
ALTER TABLE `sma_users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `username` (`username`),
  ADD KEY `username_2` (`username`,`password`),
  ADD KEY `password` (`password`,`email`);

--
-- Indexes for table `sma_user_logins`
--
ALTER TABLE `sma_user_logins`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `sma_warehouses`
--
ALTER TABLE `sma_warehouses`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id` (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `sma_brands`
--
ALTER TABLE `sma_brands`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT for table `sma_calendar`
--
ALTER TABLE `sma_calendar`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;
--
-- AUTO_INCREMENT for table `sma_captcha`
--
ALTER TABLE `sma_captcha`
  MODIFY `captcha_id` bigint(13) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=45;
--
-- AUTO_INCREMENT for table `sma_categories`
--
ALTER TABLE `sma_categories`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;
--
-- AUTO_INCREMENT for table `sma_clients`
--
ALTER TABLE `sma_clients`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `sma_clients_job`
--
ALTER TABLE `sma_clients_job`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `sma_client_documents`
--
ALTER TABLE `sma_client_documents`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=53;
--
-- AUTO_INCREMENT for table `sma_coaches`
--
ALTER TABLE `sma_coaches`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `sma_date_format`
--
ALTER TABLE `sma_date_format`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT for table `sma_groups`
--
ALTER TABLE `sma_groups`
  MODIFY `id` mediumint(8) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `sma_login_attempts`
--
ALTER TABLE `sma_login_attempts`
  MODIFY `id` mediumint(8) UNSIGNED NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `sma_notaries`
--
ALTER TABLE `sma_notaries`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;
--
-- AUTO_INCREMENT for table `sma_notary_background_check`
--
ALTER TABLE `sma_notary_background_check`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
--
-- AUTO_INCREMENT for table `sma_notary_bar_license`
--
ALTER TABLE `sma_notary_bar_license`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=46;
--
-- AUTO_INCREMENT for table `sma_notary_commission`
--
ALTER TABLE `sma_notary_commission`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=46;
--
-- AUTO_INCREMENT for table `sma_notary_electronic_commission`
--
ALTER TABLE `sma_notary_electronic_commission`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=48;
--
-- AUTO_INCREMENT for table `sma_notary_insurance`
--
ALTER TABLE `sma_notary_insurance`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=48;
--
-- AUTO_INCREMENT for table `sma_notary_payments`
--
ALTER TABLE `sma_notary_payments`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=47;
--
-- AUTO_INCREMENT for table `sma_notary_producer_license`
--
ALTER TABLE `sma_notary_producer_license`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=48;
--
-- AUTO_INCREMENT for table `sma_notary_training`
--
ALTER TABLE `sma_notary_training`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=54;
--
-- AUTO_INCREMENT for table `sma_notifications`
--
ALTER TABLE `sma_notifications`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `sma_order_ref`
--
ALTER TABLE `sma_order_ref`
  MODIFY `ref_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `sma_permissions`
--
ALTER TABLE `sma_permissions`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;
--
-- AUTO_INCREMENT for table `sma_players`
--
ALTER TABLE `sma_players`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `sma_registration`
--
ALTER TABLE `sma_registration`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `sma_teams`
--
ALTER TABLE `sma_teams`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `sma_users`
--
ALTER TABLE `sma_users`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=370;
--
-- AUTO_INCREMENT for table `sma_user_logins`
--
ALTER TABLE `sma_user_logins`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=508;
--
-- AUTO_INCREMENT for table `sma_warehouses`
--
ALTER TABLE `sma_warehouses`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- Constraints for dumped tables
--

--
-- Constraints for table `sma_clients_job`
--
ALTER TABLE `sma_clients_job`
  ADD CONSTRAINT `sma_clients_job_ibfk_1` FOREIGN KEY (`client_id`) REFERENCES `sma_clients` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `sma_client_documents`
--
ALTER TABLE `sma_client_documents`
  ADD CONSTRAINT `sma_client_documents_ibfk_1` FOREIGN KEY (`order_no`) REFERENCES `sma_clients_job` (`order_number`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `sma_notary_background_check`
--
ALTER TABLE `sma_notary_background_check`
  ADD CONSTRAINT `sma_notary_background_check_ibfk_1` FOREIGN KEY (`notary_id`) REFERENCES `sma_notaries` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `sma_notary_bar_license`
--
ALTER TABLE `sma_notary_bar_license`
  ADD CONSTRAINT `sma_notary_bar_license_ibfk_1` FOREIGN KEY (`notary_id`) REFERENCES `sma_notaries` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `sma_notary_commission`
--
ALTER TABLE `sma_notary_commission`
  ADD CONSTRAINT `notary_commission` FOREIGN KEY (`notary_id`) REFERENCES `sma_notaries` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `sma_notary_electronic_commission`
--
ALTER TABLE `sma_notary_electronic_commission`
  ADD CONSTRAINT `notary_e_commission` FOREIGN KEY (`notary_id`) REFERENCES `sma_notaries` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `sma_notary_insurance`
--
ALTER TABLE `sma_notary_insurance`
  ADD CONSTRAINT `notary_insurance` FOREIGN KEY (`notary_id`) REFERENCES `sma_notaries` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `sma_notary_payments`
--
ALTER TABLE `sma_notary_payments`
  ADD CONSTRAINT `sma_notary_payments_ibfk_1` FOREIGN KEY (`notary_id`) REFERENCES `sma_notaries` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `sma_notary_producer_license`
--
ALTER TABLE `sma_notary_producer_license`
  ADD CONSTRAINT `notary_pro_license` FOREIGN KEY (`notary_id`) REFERENCES `sma_notaries` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `sma_notary_training`
--
ALTER TABLE `sma_notary_training`
  ADD CONSTRAINT `sma_notary_training_ibfk_1` FOREIGN KEY (`notary_id`) REFERENCES `sma_notaries` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

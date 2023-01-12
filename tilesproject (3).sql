-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Jan 12, 2023 at 12:37 PM
-- Server version: 8.0.30
-- PHP Version: 7.4.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `tilesproject`
--

-- --------------------------------------------------------

--
-- Table structure for table `admins`
--

CREATE TABLE `admins` (
  `id` int UNSIGNED NOT NULL,
  `name` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `username` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `image` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `password` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `admins`
--

INSERT INTO `admins` (`id`, `name`, `email`, `username`, `email_verified_at`, `image`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'Supper Admin', 'abdulbasit3399@gmail.com', 'admin', NULL, '6153e6da956a61632888538.jpg', '$2y$10$6kRk6mi4K5fHN/CxBa4vzuMMKcqsxV1Ad.WCzqxbDckEjWw9UtmHK', 'dRpCOAU3Pd8Vi8t8kKXrJcyMhNAIHzOVEYJXOMcSVxbXbS1bIVCIQW8CBmZK', NULL, '2022-08-11 01:13:57');

-- --------------------------------------------------------

--
-- Table structure for table `admin_password_resets`
--

CREATE TABLE `admin_password_resets` (
  `id` int UNSIGNED NOT NULL,
  `email` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` tinyint(1) NOT NULL DEFAULT '1',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `admin_password_resets`
--

INSERT INTO `admin_password_resets` (`id`, `email`, `token`, `status`, `created_at`, `updated_at`) VALUES
(1, 'abdulbasit3398@gmail.com', '642546', 1, '2022-08-10 13:13:39', '2022-08-11 01:13:57');

-- --------------------------------------------------------

--
-- Table structure for table `commission_logs`
--

CREATE TABLE `commission_logs` (
  `id` bigint UNSIGNED NOT NULL,
  `user_id` int DEFAULT NULL,
  `who` int DEFAULT NULL,
  `level` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `amount` decimal(11,2) NOT NULL DEFAULT '0.00',
  `main_amo` decimal(18,2) DEFAULT '0.00',
  `title` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `trx` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `country`
--

CREATE TABLE `country` (
  `cnt_id` int NOT NULL,
  `country_code` varchar(2) NOT NULL DEFAULT '',
  `country_name` varchar(100) NOT NULL DEFAULT ''
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3 ROW_FORMAT=DYNAMIC;

--
-- Dumping data for table `country`
--

INSERT INTO `country` (`cnt_id`, `country_code`, `country_name`) VALUES
(1, 'AF', 'Afghanistan'),
(2, 'AL', 'Albania'),
(3, 'AX', 'Aland Islands'),
(4, 'DZ', 'Algeria'),
(5, 'AS', 'American Samoa'),
(6, 'AD', 'Andorra'),
(7, 'AO', 'Angola'),
(8, 'AI', 'Anguilla'),
(9, 'AQ', 'Antarctica'),
(10, 'AG', 'Antigua and Barbuda'),
(11, 'AR', 'Argentina'),
(12, 'AM', 'Armenia'),
(13, 'AW', 'Aruba'),
(14, 'AU', 'Australia'),
(15, 'AT', 'Austria'),
(16, 'AZ', 'Azerbaijan'),
(17, 'BS', 'Bahamas'),
(18, 'BH', 'Bahrain'),
(19, 'BD', 'Bangladesh'),
(20, 'BB', 'Barbados'),
(21, 'BY', 'Belarus'),
(22, 'BE', 'Belgium'),
(23, 'BZ', 'Belize'),
(24, 'BJ', 'Benin'),
(25, 'BL', 'Saint Barthelemy'),
(26, 'BM', 'Bermuda'),
(27, 'BT', 'Bhutan'),
(28, 'BO', 'Bolivia'),
(29, 'BA', 'Bosnia and Herzegovina'),
(30, 'BW', 'Botswana'),
(31, 'BV', 'Bouvet Island'),
(32, 'BR', 'Brazil'),
(33, 'IO', 'British Indian Ocean Territory'),
(34, 'BN', 'Brunei Darussalam'),
(35, 'BG', 'Bulgaria'),
(36, 'BF', 'Burkina Faso'),
(37, 'BI', 'Burundi'),
(38, 'KH', 'Cambodia'),
(39, 'CM', 'Cameroon'),
(40, 'CA', 'Canada'),
(41, 'CV', 'Cape Verde'),
(42, 'KY', 'Cayman Islands'),
(43, 'CF', 'Central African Republic'),
(44, 'TD', 'Chad'),
(45, 'CL', 'Chile'),
(46, 'CN', 'China'),
(47, 'CX', 'Christmas Island'),
(48, 'CC', 'Cocos (Keeling) Islands'),
(49, 'CO', 'Colombia'),
(50, 'KM', 'Comoros'),
(51, 'CG', 'Congo'),
(52, 'CK', 'Cook Islands'),
(53, 'CR', 'Costa Rica'),
(54, 'HR', 'Croatia'),
(55, 'CU', 'Cuba'),
(56, 'CY', 'Cyprus'),
(57, 'CW', 'Curaçao'),
(58, 'CZ', 'Czech Republic'),
(59, 'DK', 'Denmark'),
(60, 'DJ', 'Djibouti'),
(61, 'DM', 'Dominica'),
(62, 'DO', 'Dominican Republic'),
(63, 'EC', 'Ecuador'),
(64, 'EG', 'Egypt'),
(65, 'SV', 'El Salvador'),
(66, 'GQ', 'Equatorial Guinea'),
(67, 'ER', 'Eritrea'),
(68, 'EE', 'Estonia'),
(69, 'ET', 'Ethiopia'),
(70, 'FK', 'Falkland Islands (Malvinas)'),
(71, 'FO', 'Faroe Islands'),
(72, 'FJ', 'Fiji'),
(73, 'FI', 'Finland'),
(74, 'FR', 'France'),
(75, 'GF', 'French Guiana'),
(76, 'PF', 'French Polynesia'),
(77, 'TF', 'French Southern and Antarctic Lands'),
(78, 'GA', 'Gabon'),
(79, 'GM', 'Gambia'),
(80, 'GE', 'Georgia'),
(81, 'DE', 'Germany'),
(82, 'GH', 'Ghana'),
(83, 'GI', 'Gibraltar'),
(84, 'GG', 'Guernsey'),
(85, 'GR', 'Greece'),
(86, 'GL', 'Greenland'),
(87, 'GD', 'Grenada'),
(88, 'GP', 'Guadeloupe'),
(89, 'GU', 'Guam'),
(90, 'GT', 'Guatemala'),
(91, 'GN', 'Guinea'),
(92, 'GW', 'Guinea-Bissau'),
(93, 'GY', 'Guyana'),
(94, 'HT', 'Haiti'),
(95, 'HM', 'Heard and Mc Donald Islands'),
(96, 'HN', 'Honduras'),
(97, 'HK', 'Hong Kong'),
(98, 'HU', 'Hungary'),
(99, 'IS', 'Iceland'),
(100, 'IN', 'India'),
(101, 'IM', 'Isle of Man'),
(102, 'ID', 'Indonesia'),
(103, 'IR', 'Iran'),
(104, 'IQ', 'Iraq'),
(105, 'IE', 'Ireland'),
(107, 'IT', 'Italy'),
(108, 'CI', 'Ivory Coast'),
(109, 'JE', 'Jersey'),
(110, 'JM', 'Jamaica'),
(111, 'JP', 'Japan'),
(112, 'JO', 'Jordan'),
(113, 'KZ', 'Kazakhstan'),
(114, 'KE', 'Kenya'),
(115, 'KI', 'Kiribati'),
(116, 'KP', 'Korea(North Korea)'),
(117, 'KR', 'Korea(South Korea)'),
(118, 'XK', 'Kosovo'),
(119, 'KW', 'Kuwait'),
(120, 'KG', 'Kyrgyzstan'),
(121, 'LA', 'Lao PDR'),
(122, 'LV', 'Latvia'),
(123, 'LB', 'Lebanon'),
(124, 'LS', 'Lesotho'),
(125, 'LR', 'Liberia'),
(126, 'LY', 'Libya'),
(127, 'LI', 'Liechtenstein'),
(128, 'LT', 'Lithuania'),
(129, 'LU', 'Luxembourg'),
(130, 'LK', 'Sri Lanka'),
(131, 'MO', 'Macau'),
(132, 'MK', 'Macedonia'),
(133, 'MG', 'Madagascar'),
(134, 'MW', 'Malawi'),
(135, 'MY', 'Malaysia'),
(136, 'MV', 'Maldives'),
(137, 'ML', 'Mali'),
(138, 'MT', 'Malta'),
(139, 'MH', 'Marshall Islands'),
(140, 'MQ', 'Martinique'),
(141, 'MR', 'Mauritania'),
(142, 'MU', 'Mauritius'),
(143, 'YT', 'Mayotte'),
(144, 'MX', 'Mexico'),
(145, 'FM', 'Micronesia'),
(146, 'MD', 'Moldova'),
(147, 'MC', 'Monaco'),
(148, 'MN', 'Mongolia'),
(149, 'ME', 'Montenegro'),
(150, 'MS', 'Montserrat'),
(151, 'MA', 'Morocco'),
(152, 'MZ', 'Mozambique'),
(153, 'MM', 'Myanmar'),
(154, 'NA', 'Namibia'),
(155, 'NR', 'Nauru'),
(156, 'NP', 'Nepal'),
(157, 'NL', 'Netherlands'),
(158, 'AN', 'Netherlands Antilles'),
(159, 'NC', 'New Caledonia'),
(160, 'NZ', 'New Zealand'),
(161, 'NI', 'Nicaragua'),
(162, 'NE', 'Niger'),
(163, 'NG', 'Nigeria'),
(164, 'NU', 'Niue'),
(165, 'NF', 'Norfolk Island'),
(166, 'MP', 'Northern Mariana Islands'),
(167, 'NO', 'Norway'),
(168, 'OM', 'Oman'),
(169, 'PK', 'Pakistan'),
(170, 'PW', 'Palau'),
(171, 'PS', 'Palestine'),
(172, 'PA', 'Panama'),
(173, 'PG', 'Papua New Guinea'),
(174, 'PY', 'Paraguay'),
(175, 'PE', 'Peru'),
(176, 'PH', 'Philippines'),
(177, 'PN', 'Pitcairn'),
(178, 'PL', 'Poland'),
(179, 'PT', 'Portugal'),
(180, 'PR', 'Puerto Rico'),
(181, 'QA', 'Qatar'),
(182, 'RE', 'Reunion Island'),
(183, 'RO', 'Romania'),
(184, 'RU', 'Russian'),
(185, 'RW', 'Rwanda'),
(186, 'KN', 'Saint Kitts and Nevis'),
(187, 'MF', 'Saint Martin (French part)'),
(188, 'SX', 'Sint Maarten (Dutch part)'),
(189, 'LC', 'Saint Pierre and Miquelon'),
(190, 'VC', 'Saint Vincent and the Grenadines'),
(191, 'WS', 'Samoa'),
(192, 'SM', 'San Marino'),
(193, 'ST', 'Sao Tome and Principe'),
(194, 'SA', 'Saudi Arabia'),
(195, 'SN', 'Senegal'),
(196, 'RS', 'Serbia'),
(197, 'SC', 'Seychelles'),
(198, 'SL', 'Sierra Leone'),
(199, 'SG', 'Singapore'),
(200, 'SK', 'Slovakia'),
(201, 'SI', 'Slovenia'),
(202, 'SB', 'Solomon Islands'),
(203, 'SO', 'Somalia'),
(204, 'ZA', 'South Africa'),
(205, 'GS', 'South Georgia and the South Sandwich'),
(206, 'SS', 'South Sudan'),
(207, 'ES', 'Spain'),
(208, 'SH', 'Saint Helena'),
(209, 'SD', 'Sudan'),
(210, 'SR', 'Suriname'),
(211, 'SJ', 'Svalbard and Jan Mayen'),
(212, 'SZ', 'Swaziland'),
(213, 'SE', 'Sweden'),
(214, 'CH', 'Switzerland'),
(215, 'SY', 'Syria'),
(216, 'TW', 'Taiwan'),
(217, 'TJ', 'Tajikistan'),
(218, 'TZ', 'Tanzania'),
(219, 'TH', 'Thailand'),
(220, 'TL', 'Timor-Leste'),
(221, 'TG', 'Togo'),
(222, 'TK', 'Tokelau'),
(223, 'TO', 'Tonga'),
(224, 'TT', 'Trinidad and Tobago'),
(225, 'TN', 'Tunisia'),
(226, 'TR', 'Turkey'),
(227, 'TM', 'Turkmenistan'),
(228, 'TC', 'Turks and Caicos Islands'),
(229, 'TV', 'Tuvalu'),
(230, 'UG', 'Uganda'),
(231, 'UA', 'Ukraine'),
(232, 'AE', 'United Arab Emirates'),
(233, 'GB', 'United Kingdom'),
(234, 'US', 'United States'),
(235, 'UM', 'US Minor Outlying Islands'),
(236, 'UY', 'Uruguay'),
(237, 'UZ', 'Uzbekistan'),
(238, 'VU', 'Vanuatu'),
(239, 'VE', 'Venezuela'),
(240, 'VN', 'Vietnam'),
(241, 'VI', 'Virgin Islands (U.S.)'),
(242, 'VA', 'Vatican City'),
(243, 'WF', 'Wallis and Futuna Islands'),
(244, 'EH', 'Western Sahara'),
(245, 'YE', 'Yemen'),
(246, 'ZM', 'Zambia'),
(247, 'ZW', 'Zimbabwe');

-- --------------------------------------------------------

--
-- Table structure for table `deposits`
--

CREATE TABLE `deposits` (
  `id` int UNSIGNED NOT NULL,
  `user_id` int UNSIGNED NOT NULL,
  `method_code` int UNSIGNED DEFAULT NULL,
  `amount` decimal(18,8) NOT NULL,
  `amount_type` varchar(200) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `method_currency` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `charge` decimal(18,8) DEFAULT NULL,
  `rate` decimal(18,8) DEFAULT NULL,
  `final_amo` decimal(18,8) DEFAULT '0.00000000',
  `detail` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci,
  `account_number` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `bank_address` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci,
  `bank_name` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `routing` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci,
  `check_no` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `customer_full_name` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `customer_address` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci,
  `btc_amo` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `btc_wallet` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `trx` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `try` int NOT NULL DEFAULT '0',
  `verify_image` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` tinyint NOT NULL DEFAULT '2' COMMENT '1:success, 2:pending, 3:cancel',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `document`
--

CREATE TABLE `document` (
  `id` int NOT NULL,
  `user_id` int NOT NULL,
  `document` text NOT NULL,
  `type` tinyint(1) NOT NULL DEFAULT '0' COMMENT '0:tax,1:account,2:investment',
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;

--
-- Dumping data for table `document`
--

INSERT INTO `document` (`id`, `user_id`, `document`, `type`, `updated_at`, `created_at`) VALUES
(1, 11, '[\"610536943e06a1627731604.PDF.pdf\"]', 0, '2021-07-31 15:40:04', '2021-07-31 15:40:04'),
(2, 11, '[\"610536a172a821627731617.data.pdf\"]', 1, '2021-07-31 15:40:17', '2021-07-31 15:40:17'),
(3, 11, '[\"610536b40b75c1627731636.data.pdf\",\"610536b40ba071627731636.PDF.pdf\"]', 2, '2021-07-31 15:40:36', '2021-07-31 15:40:36');

-- --------------------------------------------------------

--
-- Table structure for table `email_sms_templates`
--

CREATE TABLE `email_sms_templates` (
  `id` int UNSIGNED NOT NULL,
  `act` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `name` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `subj` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_body` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci,
  `sms_body` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci,
  `shortcodes` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_status` tinyint NOT NULL DEFAULT '1',
  `sms_status` tinyint NOT NULL DEFAULT '1',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `email_sms_templates`
--

INSERT INTO `email_sms_templates` (`id`, `act`, `name`, `subj`, `email_body`, `sms_body`, `shortcodes`, `email_status`, `sms_status`, `created_at`, `updated_at`) VALUES
(1, 'PASS_RESET_CODE', 'Password Reset', 'Password Reset', '<div>We have received a request to reset the password for your account on <b>{{time}} .<br></b></div><div>Requested From IP: <b>{{ip}}</b> using <b>{{browser}}</b> on <b>{{operating_system}} </b>.</div><div><br></div><br><div><div><div>Your account recovery code is:&nbsp;&nbsp; <font size=\"6\"><b>{{code}}</b></font></div><div><br></div></div></div><div><br></div><div><font size=\"4\" color=\"#CC0000\">If you do not wish to reset your password, please disregard this message. </font><br></div><br>', 'Your account recovery code is: {{code}}', ' {\"code\":\"Password Reset Code\",\"ip\":\"IP of User\",\"browser\":\"Browser of User\",\"operating_system\":\"Operating System of User\",\"time\":\"Request Time\"}', 1, 1, '2019-09-24 17:04:05', '2020-03-07 04:02:42'),
(2, 'PASS_RESET_DONE', 'Password Reset Confirmation', 'You have Reset your password', '<div><p>\r\n    You have successfully reset your password.</p><p>You changed from&nbsp; IP: <b>{{ip}}</b> using <b>{{browser}}</b> on <b>{{operating_system}}&nbsp;</b> on <b>{{time}}</b></p><p><b><br></b></p><p><font color=\"#FF0000\"><b>If you did not changed that, Please contact with us as soon as possible.</b></font><br></p></div>', 'Your password has been changed successfully', '{\"ip\":\"IP of User\",\"browser\":\"Browser of User\",\"operating_system\":\"Operating System of User\",\"time\":\"Request Time\"}', 1, 1, '2019-09-24 17:04:05', '2020-03-07 04:23:47'),
(3, 'EVER_CODE', 'Email Verification', 'Please verify your email address', '<div><br></div><div>Thanks For join with us. <br></div><div>Please use below code to verify your email address. <br></div><div><br></div><div>Your email verification code is:<font size=\"6\"><b> {{code}}</b></font></div>', 'Your email verification code is: {{code}}', '{\"code\":\"Verification code\"}', 1, 1, '2019-09-24 17:04:05', '2020-03-07 04:26:22'),
(4, 'SVER_CODE', 'SMS Verification ', 'Please verify your phone', 'Your phone verification code is: {{code}}', 'Your phone verification code is: {{code}}', '{\"code\":\"Verification code\"}', 0, 1, '2019-09-24 17:04:05', '2020-03-07 19:28:52'),
(5, '2FA_ENABLE', 'Google Two Factor - Enable', 'Google Two Factor Authentication is now  Enabled for Your Account', '<div>You just enabled Google Two Factor Authentication for Your Account.</div><div><br></div><div>Enabled at <b>{{time}} </b>From IP: <b>{{ip}}</b> using <b>{{browser}}</b> on <b>{{operating_system}} </b>.</div>', 'Your verification code is: {{code}}', '{\"ip\":\"IP of User\",\"browser\":\"Browser of User\",\"operating_system\":\"Operating System of User\",\"time\":\"Request Time\"}', 1, 1, '2019-09-24 17:04:05', '2020-03-07 19:42:59'),
(6, '2FA_DISABLE', 'Google Two Factor Disable', 'Google Two Factor Authentication is now  Disabled for Your Account', '<div>You just Disabled Google Two Factor Authentication for Your Account.</div><div><br></div><div>Disabled at <b>{{time}} </b>From IP: <b>{{ip}}</b> using <b>{{browser}}</b> on <b>{{operating_system}} </b>.</div>', 'Google two factor verification is disabled', '{\"ip\":\"IP of User\",\"browser\":\"Browser of User\",\"operating_system\":\"Operating System of User\",\"time\":\"Request Time\"}', 1, 1, '2019-09-24 17:04:05', '2020-03-07 19:43:46'),
(7, 'DEPOSIT_REQUEST', 'Manual Deposit - User Requested', 'Deposit Request Submitted Successfully', '<div>Your deposit request of <b>{{amount}} {{currency}}</b> is via&nbsp; <b>{{method_name}} </b>submitted successfully<b> .<br></b></div><div><b><br></b></div><div><b>Details of your Deposit :<br></b></div><div><br></div><div>Amount : {{amount}} {{currency}}</div><div>Charge: <font color=\"#FF0000\">{{charge}} {{currency}}</font></div><div><br></div><div>Conversion Rate : 1 {{currency}} = {{rate}} {{method_currency}}</div><div>Payable : {{method_amount}} {{method_currency}} <br></div><div>Pay via :&nbsp; {{method_name}}</div><div><br></div><div>Transaction Number : {{trx}}</div><div><br></div><div><br></div>', '{{amount}} Deposit requested by {{method}}. Charge: {{charge}} . Trx: {{trx}}\r\n', '{\"trx\":\"Transaction Number\",\"amount\":\"Request Amount By user\",\"charge\":\"Gateway Charge\",\"currency\":\"Site Currency\",\"rate\":\"Conversion Rate\",\"method_name\":\"Deposit Method Name\",\"method_currency\":\"Deposit Method Currency\",\"method_amount\":\"Deposit Method Amount After Conversion\"}', 1, 1, '2019-09-24 17:04:05', '2020-03-07 20:16:35'),
(8, 'DEPOSIT_APPROVE', 'Manual Deposit - Admin Approved', 'Your Deposit is Approved', '<div>Your deposit request of <b>{{amount}} {{currency}}</b> is via&nbsp; <b>{{method_name}} </b>is Approved .<b><br></b></div><div><b><br></b></div><div><b>Details of your Deposit :<br></b></div><div><br></div><div>Amount : {{amount}} {{currency}}</div><div>Charge: <font color=\"#FF0000\">{{charge}} {{currency}}</font></div><div><br></div><div>Conversion Rate : 1 {{currency}} = {{rate}} {{method_currency}}</div><div>Payable : {{method_amount}} {{method_currency}} <br></div><div>Paid via :&nbsp; {{method_name}}</div><div><br></div><div>Transaction Number : {{trx}}</div><div><font size=\"5\"><b><br></b></font></div><div><font size=\"5\">Your current Balance is <b>{{post_balance}} {{currency}}</b></font></div><div><br></div><div><br><br></div>', 'Admin Approve Your {{amount}} {{gateway_currency}} payment request by {{gateway_name}} transaction : {{transaction}}', '{\"trx\":\"Transaction Number\",\"amount\":\"Request Amount By user\",\"charge\":\"Gateway Charge\",\"currency\":\"Site Currency\",\"rate\":\"Conversion Rate\",\"method_name\":\"Deposit Method Name\",\"method_currency\":\"Deposit Method Currency\",\"method_amount\":\"Deposit Method Amount After Conversion\", \"post_balance\":\"Users Balance After this operation\"}', 1, 1, '2019-09-24 17:04:05', '2020-03-07 20:27:54'),
(9, 'DEPOSIT_REJECT', 'Manual Deposit - Admin Rejected', 'Your Deposit Request is Rejected', '<div>Your deposit request of <b>{{amount}} {{currency}}</b> is via&nbsp; <b>{{method_name}} has been rejected</b>.<b><br></b></div><br><div>Transaction Number was : {{trx}}</div><div><br></div><div>if you have any query, feel free to contact us.<br></div><br><div><br><br></div>', 'Admin Rejected Your {{amount}} {{gateway_currency}} payment request by {{gateway_name}}', '{\"trx\":\"Transaction Number\",\"amount\":\"Request Amount By user\",\"charge\":\"Gateway Charge\",\"currency\":\"Site Currency\",\"rate\":\"Conversion Rate\",\"method_name\":\"Deposit Method Name\",\"method_currency\":\"Deposit Method Currency\",\"method_amount\":\"Deposit Method Amount After Conversion\"}', 1, 1, '2019-09-24 17:04:05', '2020-03-07 20:51:26'),
(10, 'DEPOSIT_COMPLETE', 'Automated Deposit - Successful', 'Deposit Completed Successfully', '<div>Your deposit of <b>{{amount}} {{currency}}</b> is via&nbsp; <b>{{method_name}} </b>has been completed Successfully.<b><br></b></div><div><b><br></b></div><div><b>Details of your Deposit :<br></b></div><div><br></div><div>Amount : {{amount}} {{currency}}</div><div>Charge: <font color=\"#FF0000\">{{charge}} {{currency}}</font></div><div><br></div><div>Conversion Rate : 1 {{currency}} = {{rate}} {{method_currency}}</div><div>Payable : {{method_amount}} {{method_currency}} <br></div><div>Paid via :&nbsp; {{method_name}}</div><div><br></div><div>Transaction Number : {{trx}}</div><div><font size=\"5\"><b><br></b></font></div><div><font size=\"5\">Your current Balance is <b>{{post_balance}} {{currency}}</b></font></div><div><br></div><div><br><br><br></div>', '{{amount}} {{currrency}} Deposit successfully by {{gateway_name}}\r\n', '{\"trx\":\"Transaction Number\",\"amount\":\"Request Amount By user\",\"charge\":\"Gateway Charge\",\"currency\":\"Site Currency\",\"rate\":\"Conversion Rate\",\"method_name\":\"Deposit Method Name\",\"method_currency\":\"Deposit Method Currency\",\"method_amount\":\"Deposit Method Amount After Conversion\", \"post_balance\":\"Users Balance After this operation\"}', 1, 1, '2019-09-24 17:04:05', '2020-03-07 20:58:50'),
(11, 'WITHDRAW_REQUEST', 'Withdraw  - User Requested', 'Withdraw Request Submitted Successfully', '<div>Your withdraw request of <b>{{amount}} {{currency}}</b>&nbsp; via&nbsp; <b>{{method_name}} </b>has been submitted Successfully.<b><br></b></div><div><b><br></b></div><div><b>Details of your withdraw:<br></b></div><div><br></div><div>Amount : {{amount}} {{currency}}</div><div>Charge: <font color=\"#FF0000\">{{charge}} {{currency}}</font></div><div><br></div><div>Conversion Rate : 1 {{currency}} = {{rate}} {{method_currency}}</div><div>You will get: {{method_amount}} {{method_currency}} <br></div><div>Via :&nbsp; {{method_name}}</div><div><br></div><div>Transaction Number : {{trx}}</div><div><font size=\"4\" color=\"#FF0000\"><b><br></b></font></div><div><font size=\"4\" color=\"#FF0000\"><b>This may take {{delay}} to process the payment.</b></font><br></div><div><font size=\"5\"><b><br></b></font></div><div><font size=\"5\"><b><br></b></font></div><div><font size=\"5\">Your current Balance is <b>{{post_balance}} {{currency}}</b></font></div><div><br></div><div><br><br><br><br></div>', '{{amount}} {{currency}} withdraw requested by {{withdraw_method}}. You will get {{method_amount}} {{method_currency}} in {{duration}}. Trx: {{trx}}', '{\"trx\":\"Transaction Number\",\"amount\":\"Request Amount By user\",\"charge\":\"Gateway Charge\",\"currency\":\"Site Currency\",\"rate\":\"Conversion Rate\",\"method_name\":\"Deposit Method Name\",\"method_currency\":\"Deposit Method Currency\",\"method_amount\":\"Deposit Method Amount After Conversion\", \"post_balance\":\"Users Balance After this operation\", \"delay\":\"Delay time for processing\"}', 1, 1, '2019-09-24 17:04:05', '2020-03-07 21:17:29'),
(12, 'WITHDRAW_APPROVE', 'Withdraw - Admin  Approved', 'Withdraw Request has been Processed and your money is sent', '<div>Your withdraw request of <b>{{amount}} {{currency}}</b>&nbsp; via&nbsp; <b>{{method_name}} </b>has been Processed Successfully.<b><br></b></div><div><b><br></b></div><div><b>Details of your withdraw:<br></b></div><div><br></div><div>Amount : {{amount}} {{currency}}</div><div>Charge: <font color=\"#FF0000\">{{charge}} {{currency}}</font></div><div><br></div><div>Conversion Rate : 1 {{currency}} = {{rate}} {{method_currency}}</div><div>You will get: {{method_amount}} {{method_currency}} <br></div><div>Via :&nbsp; {{method_name}}</div><div><br></div><div>Transaction Number : {{trx}}</div><div><br></div><div>-----</div><div><br></div><div><font size=\"4\">Details of Processed Payment :</font></div><div><font size=\"4\"><b>{{admin_details}}</b></font></div><div><br></div><div><br><br><br><br><br></div>', 'Admin Approve Your {{amount}} {{currency}} withdraw request by {{method}}. Transaction {{transaction}}', '{\"trx\":\"Transaction Number\",\"amount\":\"Request Amount By user\",\"charge\":\"Gateway Charge\",\"currency\":\"Site Currency\",\"rate\":\"Conversion Rate\",\"method_name\":\"Deposit Method Name\",\"method_currency\":\"Deposit Method Currency\",\"method_amount\":\"Deposit Method Amount After Conversion\", \"admin_details\":\"Details Provided By Admin\"}', 1, 1, '2019-09-24 17:04:05', '2020-03-07 21:28:54'),
(13, 'WITHDRAW_REJECT', 'Withdraw - Admin Rejected', 'Withdraw Request has been Rejected and your money is refunded to your account', '<div>Your withdraw request of <b>{{amount}} {{currency}}</b>&nbsp; via&nbsp; <b>{{method_name}} </b>has been Rejected.<b><br></b></div><div><b><br></b></div><div><b>Details of your withdraw:<br></b></div><div><br></div><div>Amount : {{amount}} {{currency}}</div><div>Charge: <font color=\"#FF0000\">{{charge}} {{currency}}</font></div><div><br></div><div>Conversion Rate : 1 {{currency}} = {{rate}} {{method_currency}}</div><div>You should get: {{method_amount}} {{method_currency}} <br></div><div>Via :&nbsp; {{method_name}}</div><div><br></div><div>Transaction Number : {{trx}}</div><div><br></div><div><br></div><div>----</div><div><font size=\"3\"><br></font></div><div><font size=\"3\"> {{amount}} {{currency}} has been <b>refunded </b>to your account and your current Balance is <b>{{post_balance}}</b><b> {{currency}}</b></font></div><div><br></div><div>-----</div><div><br></div><div><font size=\"4\">Details of Rejection :</font></div><div><font size=\"4\"><b>{{admin_details}}</b></font></div><div><br></div><div><br><br><br><br><br><br></div>', 'Admin Rejected Your {{amount}} {{currency}} withdraw request. Your Main Balance {{main_balance}}  {{method}} , Transaction {{transaction}}', '{\"trx\":\"Transaction Number\",\"amount\":\"Request Amount By user\",\"charge\":\"Gateway Charge\",\"currency\":\"Site Currency\",\"rate\":\"Conversion Rate\",\"method_name\":\"Deposit Method Name\",\"method_currency\":\"Deposit Method Currency\",\"method_amount\":\"Deposit Method Amount After Conversion\", \"post_balance\":\"Users Balance After this operation\", \"admin_details\":\"Details Provided By Admin\"}', 1, 1, '2019-09-24 17:04:05', '2020-03-07 21:35:36'),
(14, 'BAL_ADD', 'Balance Add by Admin', 'Your Account has been Credited', '<div>{{amount}} {{currency}} has been added to your account .</div><div><br></div><div>Transaction Number : {{trx}}</div><div><br></div>Your Current Balance is : <font size=\"3\"><b>{{post_balance}}&nbsp; {{currency}}</b></font>', '{{amount}} {{currency}} credited in your account. Your Current Balance {{remaining_balance}} {{currency}} . Transaction: #{{trx}}', '{\"trx\":\"Transaction Number\",\"amount\":\"Request Amount By Admin\",\"currency\":\"Site Currency\", \"post_balance\":\"Users Balance After this operation\"}', 1, 1, '2019-09-24 17:04:05', '2020-03-07 21:41:15'),
(15, 'BAL_SUB', 'Balance Subtracted by Admin', 'Your Account has been Debited', '<div>{{amount}} {{currency}} has been subtracted from your account .</div><div><br></div><div>Transaction Number : {{trx}}</div><div><br></div>Your Current Balance is : <font size=\"3\"><b>{{post_balance}}&nbsp; {{currency}}</b></font>', '{{amount}} {{currency}} debited from your account. Your Current Balance {{remaining_balance}} {{currency}} . Transaction: #{{trx}}', '{\"trx\":\"Transaction Number\",\"amount\":\"Request Amount By Admin\",\"currency\":\"Site Currency\", \"post_balance\":\"Users Balance After this operation\"}', 1, 1, '2019-09-24 17:04:05', '2020-03-07 21:43:58'),
(16, 'ADMIN_SUPPORT_REPLY', 'Support Ticket Reply ', 'Reply Support Ticket', '<div><p><span style=\"font-size: 11pt;\" data-mce-style=\"font-size: 11pt;\"><strong>A member from our support team has replied to the following ticket:</strong></span></p><p><b><span style=\"font-size: 11pt;\" data-mce-style=\"font-size: 11pt;\"><strong><br></strong></span></b></p><p><b>[Ticket#{{ticket_id}}] {{ticket_subject}}<br><br>Click here to reply:&nbsp; {{link}}</b></p><p>----------------------------------------------</p><p>Here is the reply : <br></p><p> {{reply}}<br></p></div><div><br></div>', '{{subject}}\r\n\r\n{{reply}}\r\n\r\n\r\nClick here to reply:  {{link}}', '{\"ticket_id\":\"Support Ticket ID\", \"ticket_subject\":\"Subject Of Support Ticket\", \"reply\":\"Reply from Staff/Admin\",\"link\":\"Ticket URL For relpy\"}', 1, 1, NULL, '2020-05-03 20:24:40'),
(201, 'REFERRAL_COMMISSION', 'REFERRAL COMMISSION', 'REFERRAL COMMISSION', 'Congratulation, You you  {{amount}} {{currency}} interest And your main balance {{main_balance}} {{currency}} . {{level}} . Transaction {{trx}}', 'Congratulation, You you  {{amount}} {{currency}} interest And your main balance {{main_balance}} {{currency}} . {{level}} . Transaction {{trx}}', '{\"amount\":\"amount\",\"main_balance\":\"main balance\",\"trx\":\"transaction\",\"level\":\"level\",\"currency\":\"currency\"}', 1, 1, NULL, NULL),
(202, 'INVESTMENT_PURCHASE', 'Investment Plan Purchase', 'Investment Plan Purchase', 'Congratulation, Successfully Invest complete. You invest  {{amount}} {{currency}}  And you will get {{interest_amount}} {{currency}} interest.', 'Congratulation, Successfully Invest complete. You invest  {{amount}} {{currency}}  And you will get {{interest_amount}} {{currency}} interest.', '{\"amount\":\"amount\",\"interest_amount\":\"interest amount\",\"trx\":\"transaction\",\"currency\":\"currency\"}', 1, 1, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `frontends`
--

CREATE TABLE `frontends` (
  `id` int UNSIGNED NOT NULL,
  `data_keys` varchar(40) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `data_values` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `frontends`
--

INSERT INTO `frontends` (`id`, `data_keys`, `data_values`, `created_at`, `updated_at`) VALUES
(2, 'seo.data', '{\"keywords\":[\"investment\",\"reelshares\",\"investment service\",\"bitcoin\",\"crypto currency\",\"invest in private companies\",\"invest in funds\",\"hedge funds\",\"debt funds\",\"private equity\",\"private equity firms\",\"funds\",\"fund management\"],\"description\":\"The Future of Private Money - Earn potentially higher returns upwards to 35% IRR annually from professionally managed private investments including investment firms, funds of funds, hedge funds, investment firms with ReelShares.com\",\"social_title\":\"Reelshares.com\",\"social_description\":\"Earn potentially higher returns upwards to 35% IRR annually from professionally managed private investments including investment firms, funds of funds, hedge funds, investment firms with ReelShares.com\",\"image\":\"631cb126326901662824742.png\"}', '2020-03-01 21:24:03', '2022-09-10 20:45:42'),
(3, 'about.content', '{\"has_image\":\"1\",\"heading\":\"ABOUT US\",\"sub_heading\":\"Lorem ipsum dolor sit amet, consectetur adipisicing elit.\",\"description\":\"Lorem ipsum dolor sit amet, consectetur adipisicing elit. Corporis, voluptatibus consequuntur ducimus reprehenderit ullam aliquam nulla vitae laudantium assumenda tempore dolorem cupiditate numquam veritatis dicta eveniet hic quo rerum id vel! Totam sed porro doloremque ipsa ratione sit veniam perferendis expedita illo, magnam repellat necessitatibus quae nostrum at temporibus atque fugit placeat voluptatem cum, laboriosam, iusto fugiat. Perferendis maiores, sint.\",\"image\":\"5e66510973d901583763721.png\"}', '2020-03-01 21:27:54', '2020-03-10 18:06:14'),
(4, 'blog.content', '{\"heading\":\"Notification\",\"sub_heading\":\"Updates\"}', '2020-03-01 23:20:21', '2022-08-26 02:38:23'),
(10, 'service.content', '{\"heading\":\"Reason To Choose Us\",\"sub_heading\":\"Our goal is to utilize our investors money and provide a source of high income for them while minimizing the any possibility of risk.\"}', '2020-03-01 23:32:12', '2021-01-25 16:18:59'),
(11, 'service.element', '{\"id\":\"11\",\"icon\":\"<i class=\\\"fas fa-wallet\\\"><\\/i>\",\"title\":\"Profitable\",\"description\":\"Our professional traders will utilize your money making sure to get a good profit for you.\"}', '2020-03-01 23:33:10', '2021-01-25 16:24:15'),
(12, 'banner.content', '{\"has_image\":\"1\",\"heading\":\"The future of private money is here\",\"sub_heading\":\"We\\u2019re committed to creating more economic freedom through accessible, safe, and secure financial tools used by Banks and Institutional investors for everyone.\",\"button_name\":\"Sign Up !\",\"button_link\":\"https:\\/\\/app.reelshares.com\\/user\\/register\",\"image\":\"631cad5d2f22a1662823773.png\"}', '2020-03-02 20:47:41', '2022-09-10 20:29:33'),
(16, 'feature.content', '{\"heading\":\"We\'re changing the way you invest.\",\"sub_heading\":\"Investors invest in over 100 years combined knowledge from a group of expert fund managers who have handled over $1 Billion in assets and transactions.\"}', '2020-03-09 02:13:18', '2021-07-27 09:11:50'),
(17, 'feature.element', '{\"id\":\"17\",\"title\":\"Low Minimums\",\"description\":\"Our low minimums give you the flexibility to invest the right amount\",\"icon\":\"<i class=\\\"fab fa-jenkins\\\"><\\/i>\"}', '2020-03-09 02:14:07', '2021-07-21 23:09:25'),
(18, 'feature.element', '{\"id\":\"18\",\"title\":\"SEC Compliant\",\"description\":\"We are a SEC compliant and we offer full transparency to our investors.\",\"icon\":\"<i class=\\\"far fa-id-badge\\\"><\\/i>\"}', '2020-03-09 02:14:28', '2021-07-21 23:12:34'),
(19, 'feature.element', '{\"id\":\"19\",\"title\":\"Institutional quality without the high fees\",\"description\":\"Our online marketplace helps us reduce costs which allows us more flexibility with lower fees, so you can maximize your returns.\",\"icon\":\"<i class=\\\"fas fa-coins\\\"><\\/i>\"}', '2020-03-09 02:14:42', '2021-05-10 02:48:07'),
(20, 'feature.element', '{\"id\":\"20\",\"title\":\"Secure Marketplace\",\"description\":\"We have the Highest SSL Security encryption and every transaction is recorded in office.\",\"icon\":\"<i class=\\\"fas fa-user-secret\\\"><\\/i>\"}', '2020-03-09 02:14:58', '2021-05-10 02:50:48'),
(21, 'feature.element', '{\"id\":\"21\",\"title\":\"Earn higher Returns up 30%\",\"description\":\"Attractive historical risk-adjusted returns\",\"icon\":\"<i class=\\\"fas fa-landmark\\\"><\\/i>\"}', '2020-03-09 02:15:15', '2021-05-10 00:59:56'),
(22, 'feature.element', '{\"id\":\"22\",\"title\":\"Smarter diversification\",\"description\":\"Low correlation to stocks & bonds\",\"icon\":\"<i class=\\\"fas fa-history\\\"><\\/i>\"}', '2020-03-09 02:15:29', '2021-05-10 00:58:46'),
(23, 'testimonial.content', '{\"heading\":\"What People Says\",\"sub_heading\":\"A huge number of people trust us and here are the words of some of them.\"}', '2020-03-09 02:23:14', '2021-01-25 16:51:46'),
(29, 'how_to_get_profit.content', '{\"heading\":\"How To Get Profit.\",\"sub_heading\":\"We utilize your money and provide a source of high income.\"}', '2020-03-09 02:31:52', '2021-01-25 16:10:31'),
(30, 'how_to_get_profit.element', '{\"id\":\"30\",\"title\":\"Get Profit\",\"icon\":\"<i class=\\\"fab fa-hornbill\\\"><\\/i>\",\"short_details\":\"Wait for us to utilize the money and return you a good profit.\"}', '2020-03-09 02:36:27', '2021-01-25 16:14:02'),
(31, 'how_to_get_profit.element', '{\"id\":\"31\",\"title\":\"Choose Plan\",\"icon\":\"<i class=\\\"far fa-images\\\"><\\/i>\",\"short_details\":\"Select the plan from our list of your liking and get started.\"}', '2020-03-09 02:36:41', '2021-01-26 12:51:34'),
(32, 'how_to_get_profit.element', '{\"id\":\"32\",\"title\":\"Create Account\",\"icon\":\"<i class=\\\"fas fa-id-card\\\"><\\/i>\",\"short_details\":\"Create a user profile for yourself using the register option.\"}', '2020-03-09 02:36:55', '2021-01-26 12:51:49'),
(33, 'transaction.content', '{\"heading\":\"Our Latest Transaction\",\"sub_heading\":\"Take a look at our latest transactions made by our investors.\"}', '2020-03-09 02:37:46', '2021-01-25 16:24:55'),
(34, 'top_investor.content', '{\"heading\":\"Recent Orders\",\"sub_heading\":\"Unlock Opportunities\"}', '2020-03-09 02:39:53', '2022-09-10 21:58:14'),
(35, 'statistics.content', '{\"heading\":\"Statistics Graph\",\"sub_heading\":\"Take a look at our user statistic\"}', '2020-03-09 02:40:06', '2021-01-25 16:05:52'),
(36, 'plan.content', '{\"heading\":\"Take a look at your opportunities.\",\"sub_heading\":\"Create an account in under 5 minutes to unlock investment opportunities.\"}', '2020-03-09 02:43:35', '2021-05-13 19:51:25'),
(37, 'service.element', '{\"id\":\"37\",\"icon\":\"<i class=\\\"fas fa-lock\\\"><\\/i>\",\"title\":\"Secure\",\"description\":\"We constantly work on improving our system and level of our security to minimize any potential risks.\"}', '2020-03-09 02:52:48', '2021-01-25 16:23:19'),
(38, 'service.element', '{\"id\":\"38\",\"icon\":\"<i class=\\\"fas fa-file-alt\\\"><\\/i>\",\"title\":\"Certified\",\"description\":\"We are a certified company doing legal business in the legal field. We operate international business.\"}', '2020-03-09 02:53:02', '2021-01-26 12:34:25'),
(39, 'team.content', '{\"heading\":\"Our Expert Team\",\"sub_heading\":\"Take a look at our team of experts working hard to make sure you make a profit.\"}', '2020-03-09 02:53:48', '2021-01-25 16:29:32'),
(43, 'calculation.content', '{\"heading\":\"We Accept Bitcoin\",\"sub_heading\":\"Try our Annualized Return Estimator Tool**\"}', '2020-03-09 18:17:14', '2021-10-01 02:11:22'),
(44, 'counter.content', '{\"heading\":\"Our Statistics\",\"sub_heading\":\"Take a look at our user statistic\"}', '2020-03-09 18:21:17', '2021-01-25 16:09:29'),
(45, 'counter.element', '{\"id\":\"45\",\"title\":\"500\",\"counter_digit\":\"1,543\",\"sub_title\":\"Current Users\",\"icon\":\"<i class=\\\"fas fa-user-friends\\\"><\\/i>\"}', '2020-03-09 18:22:15', '2022-09-10 22:04:55'),
(46, 'counter.element', '{\"title\":\"2,000\",\"counter_digit\":\"2000\",\"sub_title\":\"Total Withdraw\",\"icon\":\"<i class=\\\"fas fa-university\\\"><\\/i>\"}', '2020-03-09 18:22:34', '2020-03-09 18:22:34'),
(47, 'counter.element', '{\"id\":\"47\",\"title\":\"Funds\",\"counter_digit\":\"554,653,432\",\"sub_title\":\"Invested\",\"icon\":\"<i class=\\\"fab fa-stripe\\\"><\\/i>\"}', '2020-03-09 18:22:53', '2022-09-10 22:04:04'),
(48, 'faq.content', '{\"heading\":\"Frequently Asked Questions\",\"sub_heading\":\"We answer some of your Frequently Asked Questions regarding our platform. If you have a query that is not answered here, Please feel free to contact us.\"}', '2020-03-09 18:24:05', '2021-01-25 16:30:26'),
(49, 'faq.element', '{\"id\":\"49\",\"question\":\"How to become a Reelshares Investment partner?\",\"answer\":\"Just follow some easy steps by clicking register button and become a part of our community.<br>\"}', '2020-03-09 18:24:21', '2021-05-03 12:12:31'),
(50, 'faq.element', '{\"id\":\"50\",\"question\":\"How much can an investor request for withdrawal?\",\"answer\":\"Deposit and withdrawal are available for at any time. Be sure, that your funds are not used in any ongoing trade before the withdrawal. The available amount is shown in your dashboard on the main page of Investing platform. Deposit and withdrawal are available for at any time. Be sure, that your funds are not used in any ongoing trade before the withdrawal. The available amount is shown in your dashboard on the main page of Investing platform.<br>\"}', '2020-03-09 18:24:42', '2021-01-27 13:06:20'),
(51, 'faq.element', '{\"id\":\"51\",\"question\":\"How is cooperation with investors implemented?\",\"answer\":\"Cooperation is maintained through our live chat feature. Also we have mail service available to answer any kind of query&nbsp;of yours.\"}', '2020-03-09 18:25:02', '2021-01-27 13:03:58'),
(52, 'faq.element', '{\"id\":\"52\",\"question\":\"What is the main activity of an Investment company?\",\"answer\":\"An&nbsp;investment company&nbsp;is a&nbsp;corporation&nbsp;or trust engaged in the business of&nbsp;investing&nbsp;pooled capital into financial securities.&nbsp;Investment companies&nbsp;make profits by buying and selling shares, property, bonds, cash, other funds and&nbsp;<div>other assets.<br><\\/div>\"}', '2020-03-09 18:25:14', '2021-01-27 13:05:28'),
(53, 'we_accept.content', '{\"heading\":\"Ways to Fund you Account\",\"sub_heading\":\"| PAYPAL | COINBASE | WIRE TRANSFER | BANK CHECK |\"}', '2020-03-09 18:26:57', '2021-10-01 02:12:04'),
(54, 'call_to_action.content', '{\"heading\":\"Get into the Private Market\",\"sub_heading\":\"Equal Opportunity Investing with ReelShares\\u2122\",\"button_link\":\"https:\\/\\/app.reelshares.com\\/user\\/register\",\"button_name\":\"Sign Up\"}', '2020-03-09 18:29:45', '2022-08-22 19:54:55'),
(61, 'subscribe.content', '{\"heading\":\"Subscribe Now\",\"sub_heading\":\"Once you subscribe to our newsletter, we will send our promo offers and news to your email.\"}', '2020-03-09 18:39:20', '2021-01-25 16:46:56'),
(64, 'social_icon.element', '{\"id\":\"64\",\"title\":\"Facebok\",\"icon\":\"<i class=\\\"fab fa-facebook\\\"><\\/i>\",\"url\":\"https:\\/\\/facebook.com\\/reelshares\"}', '2020-03-09 18:40:22', '2022-08-20 11:29:07'),
(65, 'contact_us.content', '{\"title\":\"Need more Information\",\"short_details\":\"Private Market Opportunities\",\"email_address\":\"fund@reelshares.com\",\"contact_details\":\"Wall Street, New York NY\",\"contact_number\":\"917-772-8765\",\"latitude\":\"25.7951\",\"longitude\":\"80.2785\",\"website_footer\":\"<font color=\\\"#000000\\\">Make wealth your equal opportunity Private Market investments.<\\/font>\"}', '2020-03-09 18:41:16', '2022-09-11 04:52:03'),
(66, 'company_policy.element', '{\"id\":\"66\",\"title\":\"Privacy Policy\",\"body\":\"<p class=\\\"MsoNormal\\\" style=\\\"mso-margin-top-alt:auto;mso-margin-bottom-alt:auto;\\r\\nline-height:normal;mso-outline-level:1\\\"><b><span style=\\\"font-size:24.0pt;\\r\\nfont-family:&quot;Times New Roman&quot;,serif;mso-fareast-font-family:&quot;Times New Roman&quot;;\\r\\nmso-font-kerning:18.0pt\\\">Privacy Policy<o:p><\\/o:p><\\/span><\\/b><\\/p>\\r\\n\\r\\n<p class=\\\"MsoNormal\\\" style=\\\"margin-bottom:0in;line-height:normal\\\"><span style=\\\"font-size:12.0pt;font-family:&quot;Times New Roman&quot;,serif;mso-fareast-font-family:\\r\\n&quot;Times New Roman&quot;\\\">Last Updated on January 31, 2020<o:p><\\/o:p><\\/span><\\/p>\\r\\n\\r\\n<p class=\\\"MsoNormal\\\" style=\\\"margin-bottom:0in;line-height:normal\\\"><span style=\\\"font-size:12.0pt;font-family:&quot;Times New Roman&quot;,serif;mso-fareast-font-family:\\r\\n&quot;Times New Roman&quot;\\\">PLEASE READ THIS PRIVACY POLICY CAREFULLY. BY ACCESSING AND\\r\\nUSING THIS WEBSITE, YOU AGREE TO BE BOUND BY THIS PRIVACY POLICY IN ITS\\r\\nENTIRETY. IF YOU DO NOT AGREE WITH THE TERMS OF THIS PRIVACY POLICY, PLEASE DO\\r\\nNOT USE OUR WEBSITE. The website ReelShares.com (the \\u201cSite\\u201d) is brought to you\\r\\nby ReelShares LLC (\\u201cReelShares,\\u201d \\u201cwe,\\u201d \\u201cus,\\u201d or \\u201cour\\u201d). This Privacy Policy\\r\\nprovides information about our policies and procedures regarding the\\r\\ncollection, use, and disclosure of personal information received through the\\r\\nSite from visitors and registered users of the Site (the \\u201cPrivacy Policy\\u201d).\\r\\nThis Privacy Policy is incorporated into, and is part of, our&nbsp;<u><span style=\\\"color:blue\\\">Terms of Use<\\/span><\\/u>&nbsp;which govern your access to the\\r\\nSite and\\/or your use of the Site and of the Content (as defined in the&nbsp;<u><span style=\\\"color:blue\\\">Terms of Use<\\/span><\\/u>) and the services made available on\\r\\nor through the Site (collectively, the \\u201cServices\\u201d). Unless otherwise defined\\r\\nherein, capitalized terms shall have the meaning assigned to such terms in\\r\\nthe&nbsp;Terms of Use. If you have comments, suggestions, questions, or\\r\\nconcerns about our Privacy Policy, please contact us at&nbsp;<u><span style=\\\"color:blue\\\"><a href=\\\"file:\\/\\/\\/C:\\/Users\\/ready\\/Desktop\\/REELSHARES\\/Documents\\/info@reelshares.com\\\">info@reelshares.com<\\/a><\\/span><\\/u>.\\r\\n<o:p><\\/o:p><\\/span><\\/p>\\r\\n\\r\\n<p class=\\\"MsoNormal\\\" style=\\\"mso-margin-top-alt:auto;mso-margin-bottom-alt:auto;\\r\\nline-height:normal;mso-outline-level:4\\\"><b><span style=\\\"font-size:12.0pt;\\r\\nfont-family:&quot;Times New Roman&quot;,serif;mso-fareast-font-family:&quot;Times New Roman&quot;\\\">WHAT\\r\\nINFORMATION IS COLLECTED ON THE SITE<o:p><\\/o:p><\\/span><\\/b><\\/p>\\r\\n\\r\\n<p class=\\\"MsoNormal\\\" style=\\\"margin-bottom:0in;line-height:normal\\\"><span style=\\\"font-size:12.0pt;font-family:&quot;Times New Roman&quot;,serif;mso-fareast-font-family:\\r\\n&quot;Times New Roman&quot;\\\">A. Information You Provide To Us. When you visit our Site,\\r\\nwe may collect your e-mail address if you provide it to us voluntarily in order\\r\\nto contact you about the Services. While some items are optional, most are\\r\\nrequired for legal and security purposes. To sign up as a registered user of\\r\\nour Services (\\u201cRegistered User\\u201d) and access the User Restricted Areas (as\\r\\ndefined in the&nbsp;<u><span style=\\\"color:blue\\\">Terms of Use<\\/span><\\/u>), you\\r\\nhave to create a user account and provide the following personal information to\\r\\nus during the registration process: your name, your e-mail address and your\\r\\nphone number. You may also provide to us voluntarily information about your\\r\\ninvestment profile, such as, income level, return expectations, net worth,\\r\\ninvestment experience, desired investment term, areas of investment interest.\\r\\nIf you contact us by email, we may keep a record of your contact information\\r\\nand correspondence, and may use your email address, and any information that\\r\\nyou provide to us in your message, to respond to you.<o:p><\\/o:p><\\/span><\\/p>\\r\\n\\r\\n<p class=\\\"MsoNormal\\\" style=\\\"margin-bottom:0in;line-height:normal\\\"><span style=\\\"font-size:12.0pt;font-family:&quot;Times New Roman&quot;,serif;mso-fareast-font-family:\\r\\n&quot;Times New Roman&quot;\\\">a. Financial Data. Registered Users who use our Services to\\r\\nmake an investment in our offerings will be asked to provide certain financial\\r\\ndata, such as your bank account number and bank routing number. This\\r\\ninformation is required to enable us or our payment processor, SynapseFI (see the\\r\\n<u><span style=\\\"color:blue\\\">SynapseFI Privacy Policy<\\/span><\\/u> for more\\r\\ninformation on how that data may be used) and our banking partners, Evolve Bank\\r\\n&amp; Trust (see the <u><span style=\\\"color:blue\\\">Evolve Bank &amp; Trust Privacy\\r\\nPolicy<\\/span><\\/u>) and Esquire Bank, to utilize your bank account to originate\\r\\nfunds transfers and make subsequent investment disbursements to you. Because\\r\\nSynapseFI will perform services related to the offering, transaction and\\r\\nprocessing of payments, your personal information will be shared with SynapseFI\\r\\nand will be subject to the <u><span style=\\\"color:blue\\\">SynapseFI Privacy Policy<\\/span><\\/u>.\\r\\nFor purposes of satisfying \\u201cKnow Your Customer\\u201d requirements, we ask for your\\r\\naddress and use the Google Maps API for that purpose (see the&nbsp;<a href=\\\"https:\\/\\/policies.google.com\\/privacy\\\">Google Privacy Policy<\\/a>&nbsp;for\\r\\nmore information on how that data may be used). If you choose to use our\\r\\nreferral service to invite a friend to the Service, we will ask you for that\\r\\nperson\\u2019s email address or import your existing contacts, and automatically send\\r\\nan email invitation. ReelShares stores this information to send this email, to\\r\\nregister your friend if your invitation is accepted and to track the success of\\r\\nour invitation service.<o:p><\\/o:p><\\/span><\\/p>\\r\\n\\r\\n<p class=\\\"MsoNormal\\\" style=\\\"margin-bottom:0in;line-height:normal\\\"><span style=\\\"font-size:12.0pt;font-family:&quot;Times New Roman&quot;,serif;mso-fareast-font-family:\\r\\n&quot;Times New Roman&quot;\\\">B. Information We Collect About Your Interaction with the\\r\\nSite. We collect additional information about your interaction with the Site\\r\\nwithout identifying you as an individual (\\u201cAnonymous Information\\u201d), by using\\r\\ncookies on our Site. For example, we receive certain standard information that\\r\\nyour browser sends to every website you visit, such as your IP address, browser\\r\\ntype and language, access times and referring website addresses. We may use\\r\\nAnonymous Information for any purpose in our discretion. For clarity, Anonymous\\r\\nInformation means information that is not associated with or linked to your\\r\\npersonal information and does not permit the identification of individual\\r\\npersons.<o:p><\\/o:p><\\/span><\\/p>\\r\\n\\r\\n<p class=\\\"MsoNormal\\\" style=\\\"mso-margin-top-alt:auto;mso-margin-bottom-alt:auto;\\r\\nline-height:normal;mso-outline-level:4\\\"><b><span style=\\\"font-size:12.0pt;\\r\\nfont-family:&quot;Times New Roman&quot;,serif;mso-fareast-font-family:&quot;Times New Roman&quot;\\\">HOW\\r\\nINFORMATION COLLECTED ON THE SITE IS USED AND SHARED<o:p><\\/o:p><\\/span><\\/b><\\/p>\\r\\n\\r\\n<p class=\\\"MsoNormal\\\" style=\\\"margin-bottom:0in;line-height:normal\\\"><span style=\\\"font-size:12.0pt;font-family:&quot;Times New Roman&quot;,serif;mso-fareast-font-family:\\r\\n&quot;Times New Roman&quot;\\\">A. How We May Use Your Information. We may use the\\r\\ninformation we collect from and about you on the Site (collectively,\\r\\n\\u201cInformation\\u201d) for any of the following purposes: (i) to operate the Site and\\r\\nprovide the Services; (ii) to respond to your requests and inquiries; (iii) to\\r\\ncontact you and to communicate with you about your use of the Services and your\\r\\nRegistered User account; (iv) to notify you about important changes to our\\r\\nServices, such as updates or revisions to this Privacy Policy or our&nbsp;<u><span style=\\\"color:blue\\\">Terms of Use<\\/span><\\/u>, security announcements or other\\r\\nsimilar messages; (v) to review Site usage and operations and to improve the\\r\\ncontent and functionality of the Site and our Services; (vi) to provide you\\r\\nwith information and materials about our products and services; (vii) to\\r\\naddress problems with the Services; (viii) to protect the security or integrity\\r\\nof our Services, our Registered Users and our business, (ix) to communicate\\r\\nwith you regarding any investments which you have made in products offered on\\r\\nthe Site; and\\/or (x) to tailor the Site to our clients\\u2019 needs.<o:p><\\/o:p><\\/span><\\/p>\\r\\n\\r\\n<p class=\\\"MsoNormal\\\" style=\\\"margin-bottom:0in;line-height:normal\\\"><span style=\\\"font-size:12.0pt;font-family:&quot;Times New Roman&quot;,serif;mso-fareast-font-family:\\r\\n&quot;Times New Roman&quot;\\\">B. How We May Share Your Information. We will not sell or\\r\\nlease your Information to any third party. Except as otherwise expressly\\r\\nprovided in this Privacy Policy, ReelShares will only share your Information:\\r\\n(i) as required by law or regulation or as we believe in good faith that\\r\\ndisclosure of such personal information is reasonably necessary to: (1) satisfy\\r\\nany applicable law or regulation, (2) to respond to claims and\\/or to comply\\r\\nwith a judicial proceeding, court order, or legal process served on us, (3) to\\r\\nprotect and defend our rights or property, and\\/or the rights or property of our\\r\\nRegistered Users, or third parties, as permitted by law, (4) to detect,\\r\\nprevent, or otherwise address fraud, security or technical issues; or (5) to\\r\\nenforce our&nbsp;Terms of Use; (ii) with SynapseFI as is necessary for them to\\r\\nconduct certain compliance services related to \\u201cKnow Your Customer\\u201d regulations\\r\\nand anti-money laundering and sanctions laws (your personal information will be\\r\\nsubject to the <u><span style=\\\"color:blue\\\">SynapseFI Privacy Policy<\\/span><\\/u>)\\r\\nand\\/or (iii) with our service providers that provide certain services to\\r\\nmaintain and operate the Services and certain features on the Services and to\\r\\nconduct certain compliance services related to \\u201cKnow Your Customer\\u201d and\\r\\ncompliance with anti-money laundering and sanctions laws (e.g., we may use\\r\\nthird parties to host the Site or operate various features available on the\\r\\nSite, sending and managing email, analyzing data, and providing search results)\\r\\nand those service providers will be permitted to obtain only the Information\\r\\nthey need to deliver the service. As with any other business, it is possible\\r\\nthat in the future we could merge with or be acquired by another company. If\\r\\nsuch an acquisition occurs, the successor company would have access to the\\r\\nInformation, but would continue to be bound by this Privacy Policy unless and\\r\\nuntil it is amended.<o:p><\\/o:p><\\/span><\\/p>\\r\\n\\r\\n<p class=\\\"MsoNormal\\\" style=\\\"mso-margin-top-alt:auto;mso-margin-bottom-alt:auto;\\r\\nline-height:normal;mso-outline-level:4\\\"><b><span style=\\\"font-size:12.0pt;\\r\\nfont-family:&quot;Times New Roman&quot;,serif;mso-fareast-font-family:&quot;Times New Roman&quot;\\\">ACCESSING,\\r\\nCHANGING OR REMOVING PERSONAL INFORMATION<o:p><\\/o:p><\\/span><\\/b><\\/p>\\r\\n\\r\\n<p class=\\\"MsoNormal\\\" style=\\\"margin-bottom:0in;line-height:normal\\\"><span style=\\\"font-size:12.0pt;font-family:&quot;Times New Roman&quot;,serif;mso-fareast-font-family:\\r\\n&quot;Times New Roman&quot;\\\">If you are a Registered User, we urge you to review your\\r\\npersonal information regularly to ensure that it is correct and complete. We\\r\\nprovide an easy way via your online account profile for you to access, correct,\\r\\nupdate or remove personal information that has previously been provided to us.\\r\\nYou can review your personal information and make any necessary changes at any\\r\\ntime, by logging in to your Registered User account. If you are unable to edit\\r\\nyour personal information by logging into your Registered User account, please\\r\\ncontact us for assistance at&nbsp;<a href=\\\"mailto:support@reelshares.com\\\">support@ReelShares.com<\\/a>.\\r\\n<o:p><\\/o:p><\\/span><\\/p>\\r\\n\\r\\n<p class=\\\"MsoNormal\\\" style=\\\"mso-margin-top-alt:auto;mso-margin-bottom-alt:auto;\\r\\nline-height:normal;mso-outline-level:4\\\"><b><span style=\\\"font-size:12.0pt;\\r\\nfont-family:&quot;Times New Roman&quot;,serif;mso-fareast-font-family:&quot;Times New Roman&quot;\\\">OPTING\\r\\nOUT<o:p><\\/o:p><\\/span><\\/b><\\/p>\\r\\n\\r\\n<p class=\\\"MsoNormal\\\" style=\\\"margin-bottom:0in;line-height:normal\\\"><span style=\\\"font-size:12.0pt;font-family:&quot;Times New Roman&quot;,serif;mso-fareast-font-family:\\r\\n&quot;Times New Roman&quot;\\\">We may also use your contact information to send you\\r\\nmarketing and promotional messages. If you do not want to receive such\\r\\nmessages, you may opt out by following the instructions in the message. Please\\r\\nunderstand that if you choose not to receive promotional correspondence from\\r\\nus, we may still contact you in connection with your relationship, activities,\\r\\ntransactions and communications with us.&nbsp;If you need assistance opting\\r\\nout, please contact us at <a href=\\\"mailto:support@reelshares.com\\\">support@ReelShares.com<\\/a>.<o:p><\\/o:p><\\/span><\\/p>\\r\\n\\r\\n<p class=\\\"MsoNormal\\\" style=\\\"mso-margin-top-alt:auto;mso-margin-bottom-alt:auto;\\r\\nline-height:normal;mso-outline-level:4\\\"><b><span style=\\\"font-size:12.0pt;\\r\\nfont-family:&quot;Times New Roman&quot;,serif;mso-fareast-font-family:&quot;Times New Roman&quot;\\\">SECURITY\\r\\nOF YOUR PERSONAL INFORMATION<o:p><\\/o:p><\\/span><\\/b><\\/p>\\r\\n\\r\\n<p class=\\\"MsoNormal\\\" style=\\\"margin-bottom:0in;line-height:normal\\\"><span style=\\\"font-size:12.0pt;font-family:&quot;Times New Roman&quot;,serif;mso-fareast-font-family:\\r\\n&quot;Times New Roman&quot;\\\">We have implemented reasonable technical and organizational\\r\\nmeasures designed to deter unauthorized access to and use, destruction of,\\r\\nmodification of, or disclosure of personally identifiable information we\\r\\ncollect via the Site. Regardless of the precautions taken by us or by you, no\\r\\ndata transmitted over the Internet or any other public network can be\\r\\nguaranteed to be 100% secure. We cannot ensure or warrant the security of any\\r\\ninformation you transmit to us and you provide all personally identifiable\\r\\ninformation via the Site at your own risk. You are responsible for maintaining\\r\\nthe security of your Registered User profile information, including your\\r\\npassword and for any and all activities that occur under your account. Do not\\r\\nshare this information with anyone. We will never ask you to send your password\\r\\nor other sensitive information to us in an email, though we may ask you to\\r\\nenter this type of information on the Site. If you are sharing a computer with\\r\\nanyone you should always log out before leaving a site or service to protect\\r\\naccess to your personally identifiable information from subsequent users. <o:p><\\/o:p><\\/span><\\/p>\\r\\n\\r\\n<p class=\\\"MsoNormal\\\" style=\\\"mso-margin-top-alt:auto;mso-margin-bottom-alt:auto;\\r\\nline-height:normal;mso-outline-level:4\\\"><b><span style=\\\"font-size:12.0pt;\\r\\nfont-family:&quot;Times New Roman&quot;,serif;mso-fareast-font-family:&quot;Times New Roman&quot;\\\">NOTICE\\r\\nTO USERS IN THE EVENT OF A SECURITY BREACH<o:p><\\/o:p><\\/span><\\/b><\\/p>\\r\\n\\r\\n<p class=\\\"MsoNormal\\\" style=\\\"margin-bottom:0in;line-height:normal\\\"><span style=\\\"font-size:12.0pt;font-family:&quot;Times New Roman&quot;,serif;mso-fareast-font-family:\\r\\n&quot;Times New Roman&quot;\\\">If a Registered User\\u2019s personal information is compromised\\r\\nas the result of a breach of security, we will use commercially reasonable\\r\\nefforts to attempt to notify affected Users directly, or via the Site, of the\\r\\nbreach if we determine that the information is sensitive, in accordance with\\r\\nthis Privacy Policy and the Terms of Use, or as otherwise required by\\r\\napplicable law. <o:p><\\/o:p><\\/span><\\/p>\\r\\n\\r\\n<p class=\\\"MsoNormal\\\" style=\\\"mso-margin-top-alt:auto;mso-margin-bottom-alt:auto;\\r\\nline-height:normal;mso-outline-level:4\\\"><b><span style=\\\"font-size:12.0pt;\\r\\nfont-family:&quot;Times New Roman&quot;,serif;mso-fareast-font-family:&quot;Times New Roman&quot;\\\">COOKIES\\r\\nAND LOG DATA<o:p><\\/o:p><\\/span><\\/b><\\/p>\\r\\n\\r\\n<p class=\\\"MsoNormal\\\" style=\\\"margin-bottom:0in;line-height:normal\\\"><span style=\\\"font-size:12.0pt;font-family:&quot;Times New Roman&quot;,serif;mso-fareast-font-family:\\r\\n&quot;Times New Roman&quot;\\\">A. Tracking Technologies. Unique identifiers such as cookies\\r\\n(which are small text files stored locally on your computer that help store\\r\\nuser preferences and may be html files, Flash files, or other technology), web\\r\\nbeacons or clear gifs (which are small pieces of code placed on websites used\\r\\nto collect advertising metrics, such as counting page views, promotion views,\\r\\nor advertising responses, tags and scripts or similar technologies\\r\\n(collectively referred to as \\u201cTracking Technologies\\u201d) are used by ReelShares\\r\\nand our marketing, analytics, or other service providers to understand Site\\r\\nusage, help customize our content, offerings or advertisements on the Site,\\r\\npersonalize your experience on the Site (e.g., to recognize you by name when\\r\\nyou return to the Site, save your password in password-protected areas, or save\\r\\nyour online settings), analyze trends, allow users to move between associated\\r\\nwebsites without logging into each site, and other purposes related to our\\r\\nmanagement and administration of the Site. In many Internet browsers, you can\\r\\nchoose to delete, disable, turn off or reject most Tracking Technologies\\r\\nthrough the \\u201cInternet Options\\u201d sub-option of the \\u201cTools\\u201d menu option of your\\r\\nbrowser or otherwise as directed by your browser\\u2019s support feature. Additional\\r\\ninformation on deleting, disabling, rejecting or turning off Tracking\\r\\nTechnologies may be available through your browser\\u2019s support feature. Please\\r\\nconsult the \\u201cHelp\\u201d section of your browser for more information. Please know\\r\\nthat certain areas and features of our Site can only be accessed in conjunction\\r\\nwith cookies or similar devices and you should be aware that disabling cookies\\r\\nor similar devices might prevent you from accessing some of our content. We do\\r\\nnot currently respond to \\u201cdo not track\\u201d signals or other mechanisms that might\\r\\nenable users to opt out of tracking on our Site.<o:p><\\/o:p><\\/span><\\/p>\\r\\n\\r\\n<p class=\\\"MsoNormal\\\" style=\\\"margin-bottom:0in;line-height:normal\\\"><span style=\\\"font-size:12.0pt;font-family:&quot;Times New Roman&quot;,serif;mso-fareast-font-family:\\r\\n&quot;Times New Roman&quot;\\\">B. Log Files. Log data collected on web servers supplies us\\r\\nwith aggregate information about the number of visits to different pages on our\\r\\nSite. We use such aggregate information to improve access to our content based\\r\\non our visitors\\u2019 browsers and operating system types to make our content\\r\\navailable to as many users as possible. We do not link the \\u201clog data\\u201d collected\\r\\nto personally identifiable information submitted by users when participating in\\r\\nour activities. This Privacy Policy covers the use of cookies by ReelShares and\\r\\ndoes not cover the use of cookies by any advertisers. Some of our third-party\\r\\nproviders (e.g., third-party advertisers) may use cookies on our site. We have\\r\\nno access to or control over these cookies.<o:p><\\/o:p><\\/span><\\/p>\\r\\n\\r\\n<p class=\\\"MsoNormal\\\" style=\\\"margin-bottom:0in;line-height:normal\\\"><span style=\\\"font-size:12.0pt;font-family:&quot;Times New Roman&quot;,serif;mso-fareast-font-family:\\r\\n&quot;Times New Roman&quot;\\\">C. BY USING THE SERVICES, YOU ARE AGREEING TO THIS PRIVACY\\r\\nPOLICY AND CONSENTING TO THE USE OF TRACKING TECHNOLOGIES AS SET FORTH IN THIS\\r\\nPRIVACY POLICY.<o:p><\\/o:p><\\/span><\\/p>\\r\\n\\r\\n<p class=\\\"MsoNormal\\\" style=\\\"mso-margin-top-alt:auto;mso-margin-bottom-alt:auto;\\r\\nline-height:normal;mso-outline-level:4\\\"><b><span style=\\\"font-size:12.0pt;\\r\\nfont-family:&quot;Times New Roman&quot;,serif;mso-fareast-font-family:&quot;Times New Roman&quot;\\\">LINKS\\r\\nTO OTHER SITES<o:p><\\/o:p><\\/span><\\/b><\\/p>\\r\\n\\r\\n<p class=\\\"MsoNormal\\\" style=\\\"margin-bottom:0in;line-height:normal\\\"><span style=\\\"font-size:12.0pt;font-family:&quot;Times New Roman&quot;,serif;mso-fareast-font-family:\\r\\n&quot;Times New Roman&quot;\\\">Our Site contains links to other websites. The fact that we\\r\\nlink to a website is not an endorsement, authorization or representation of our\\r\\naffiliation with that third party. We do not exercise control over third party\\r\\nwebsites. These other websites may place their own cookies or other files on\\r\\nyour computer, collect data or solicit personal information from you. Other\\r\\nsites follow different rules regarding the use or disclosure of the personal information\\r\\nyou submit to them. We encourage you to read the privacy policies or statements\\r\\nof the other websites you visit. Please be aware that the terms of our Privacy\\r\\nPolicy does not apply to these third party websites. <o:p><\\/o:p><\\/span><\\/p>\\r\\n\\r\\n<p class=\\\"MsoNormal\\\" style=\\\"mso-margin-top-alt:auto;mso-margin-bottom-alt:auto;\\r\\nline-height:normal;mso-outline-level:4\\\"><b><span style=\\\"font-size:12.0pt;\\r\\nfont-family:&quot;Times New Roman&quot;,serif;mso-fareast-font-family:&quot;Times New Roman&quot;\\\">CHILDREN\\u2019S\\r\\nPRIVACY<o:p><\\/o:p><\\/span><\\/b><\\/p>\\r\\n\\r\\n<p class=\\\"MsoNormal\\\" style=\\\"margin-bottom:0in;line-height:normal\\\"><span style=\\\"font-size:12.0pt;font-family:&quot;Times New Roman&quot;,serif;mso-fareast-font-family:\\r\\n&quot;Times New Roman&quot;\\\">This Site is not intended for, or designed to attract,\\r\\nchildren under the age of 13 and as such, we do not intentionally gather\\r\\ninformation from individuals who are under the age of 13. Upon notification\\r\\nthat a child under 13 has provided us with personally identifiable information,\\r\\nwe will delete the child\\u2019s personally identifiable information from our\\r\\nrecords. <o:p><\\/o:p><\\/span><\\/p>\\r\\n\\r\\n<p class=\\\"MsoNormal\\\" style=\\\"mso-margin-top-alt:auto;mso-margin-bottom-alt:auto;\\r\\nline-height:normal;mso-outline-level:4\\\"><b><span style=\\\"font-size:12.0pt;\\r\\nfont-family:&quot;Times New Roman&quot;,serif;mso-fareast-font-family:&quot;Times New Roman&quot;\\\">PRIVACY\\r\\nRIGHTS OF CALIFORNIA RESIDENTS<o:p><\\/o:p><\\/span><\\/b><\\/p>\\r\\n\\r\\n<p class=\\\"MsoNormal\\\" style=\\\"margin-bottom:0in;line-height:normal\\\"><span style=\\\"font-size:12.0pt;font-family:&quot;Times New Roman&quot;,serif;mso-fareast-font-family:\\r\\n&quot;Times New Roman&quot;\\\">Under California law, we must provide California residents\\r\\nwith a summary of their privacy rights. California law requires us to inform\\r\\nyou, at your request, (a) the categories of personal information we collect and\\r\\nthe third parties we share that information with; (b) the names and addresses\\r\\nof such third parties; and (c) examples of the products marketed by such\\r\\ncompanies. Additionally, the Act requires us to allow you to control who you do\\r\\nnot want us to share that information with. To obtain this information, please\\r\\nsend us your request by email at&nbsp;<a href=\\\"mailto:info@reelshares.com\\\">info@ReelShares.com<\\/a>\\r\\nor standard mail to: ReelShares LLC&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;. When contacting us, please\\r\\nindicate your name, address, email address, and what personal information you\\r\\ndo not want us to share. Your request should be labeled \\u201cCalifornia Customer\\r\\nChoice Notice,\\u201d and 30 days should be allowed for a response. There is no\\r\\ncharge for controlling how your personal information is shared. <o:p><\\/o:p><\\/span><\\/p>\\r\\n\\r\\n<p class=\\\"MsoNormal\\\" style=\\\"mso-margin-top-alt:auto;mso-margin-bottom-alt:auto;\\r\\nline-height:normal;mso-outline-level:4\\\"><b><span style=\\\"font-size:12.0pt;\\r\\nfont-family:&quot;Times New Roman&quot;,serif;mso-fareast-font-family:&quot;Times New Roman&quot;\\\">INTERNATIONAL\\r\\nVISITORS<o:p><\\/o:p><\\/span><\\/b><\\/p>\\r\\n\\r\\n<p class=\\\"MsoNormal\\\" style=\\\"margin-bottom:0in;line-height:normal\\\"><span style=\\\"font-size:12.0pt;font-family:&quot;Times New Roman&quot;,serif;mso-fareast-font-family:\\r\\n&quot;Times New Roman&quot;\\\">ReelShares and its hosting companies servers are located in\\r\\nthe United States and our services are directed towards the United States\\r\\nmarket, and our Privacy Policy has been prepared to comply with applicable\\r\\nUnited States law. If you are an international visitor, you should note that by\\r\\nproviding your personal information on or through the Site, you are: (i)\\r\\nconsenting to the transfer of your personal information from regions outside\\r\\nthe United States to the United States which may not have the same data\\r\\ncollection and protection laws as the country in which you reside; and (ii)\\r\\nconsenting to the use of your personal information in accordance with this\\r\\nPrivacy Policy. <o:p><\\/o:p><\\/span><\\/p>\\r\\n\\r\\n<p class=\\\"MsoNormal\\\" style=\\\"mso-margin-top-alt:auto;mso-margin-bottom-alt:auto;\\r\\nline-height:normal;mso-outline-level:4\\\"><b><span style=\\\"font-size:12.0pt;\\r\\nfont-family:&quot;Times New Roman&quot;,serif;mso-fareast-font-family:&quot;Times New Roman&quot;\\\">CHANGES\\r\\nTO THIS PRIVACY POLICY<o:p><\\/o:p><\\/span><\\/b><\\/p>\\r\\n\\r\\n<p class=\\\"MsoNormal\\\" style=\\\"margin-bottom:0in;line-height:normal\\\"><span style=\\\"font-size:12.0pt;font-family:&quot;Times New Roman&quot;,serif;mso-fareast-font-family:\\r\\n&quot;Times New Roman&quot;\\\">We reserve the right at any time to make changes to this\\r\\nPrivacy Policy simply by posting such changes or updates on the Site and\\r\\nwithout any other notice to you. If we do this, we will indicate at the top of\\r\\nthe page the date the Privacy Policy was last updated. Any such changes or\\r\\nupdates will be effective immediately upon posting on the Site. Each time you\\r\\nuse the Site, the current version of this Privacy Policy will apply. You\\r\\nunderstand and agree that your continued use of the Site after we have made any\\r\\nsuch changes constitutes your acceptance of the most current Privacy Policy, as\\r\\namended. You can always refuse to accept the changes to our Privacy Policy by\\r\\nterminating your use of the Services. <o:p><\\/o:p><\\/span><\\/p>\\r\\n\\r\\n<p class=\\\"MsoNormal\\\" style=\\\"mso-margin-top-alt:auto;mso-margin-bottom-alt:auto;\\r\\nline-height:normal;mso-outline-level:4\\\"><b><span style=\\\"font-size:12.0pt;\\r\\nfont-family:&quot;Times New Roman&quot;,serif;mso-fareast-font-family:&quot;Times New Roman&quot;\\\">HOW\\r\\nTO CONTACT US<o:p><\\/o:p><\\/span><\\/b><\\/p>\\r\\n\\r\\n<p class=\\\"MsoNormal\\\" style=\\\"margin-bottom:0in;line-height:normal\\\"><span style=\\\"font-size:12.0pt;font-family:&quot;Times New Roman&quot;,serif;mso-fareast-font-family:\\r\\n&quot;Times New Roman&quot;\\\">If you have any questions about our Privacy Policy, please\\r\\ncontact us by one of the following options: By e-mail: <a href=\\\"mailto:info@reelshares.com\\\">support@ReelShares.com<\\/a>&nbsp;<o:p><\\/o:p><\\/span><\\/p>\\r\\n\\r\\n<p class=\\\"MsoNormal\\\"><o:p>&nbsp;<\\/o:p><\\/p>\"}', '2020-03-09 18:41:41', '2022-08-25 23:24:29'),
(67, 'rules.content', '{\"heading\":\"Rules\",\"sub_heading\":\"Please read our rules and regulations before joining us.\"}', '2020-03-09 18:42:03', '2021-01-25 17:25:12'),
(68, 'rules.element', '{\"title\":\"You agree to be of legal age in your country to partake in this program, and in all the cases your minimal age must be 18 years.\"}', '2020-03-09 18:42:22', '2020-03-09 18:42:22'),
(69, 'rules.element', '{\"title\":\"As a private transaction, this program is exempt from the US Securities Act of 1933, the US Securities Exchange Act of 1934 and the US Investment Company Act of 1940 and all other rules, regulations and amendments thereof. We are not FDIC insured. We are not a licensed bank or a security firm.\"}', '2020-03-09 18:44:07', '2020-03-09 18:44:07'),
(70, 'how_to_get_profit.element', '{\"id\":\"70\",\"title\":\"Make Plan\",\"icon\":\"<i class=\\\"far fa-paper-plane\\\"><\\/i>\",\"short_details\":\"Make a decision of the plan you like and think is the most profitable.\"}', '2020-03-10 18:15:32', '2021-01-26 12:51:04'),
(71, 'service.element', '{\"id\":\"71\",\"icon\":\"<i class=\\\"fas fa-star-of-david\\\"><\\/i>\",\"title\":\"Reliable\",\"description\":\"We are very reliable as a huge number of people trust us. We conduct safe and secure services.\"}', '2020-05-09 06:09:08', '2021-01-26 12:33:36'),
(72, 'service.element', '{\"id\":\"72\",\"icon\":\"<i class=\\\"fas fa-book-open\\\"><\\/i>\",\"title\":\"Transparency & Access\",\"description\":\"Our Platform IO17+ has reporting updates by the minute. All available online.\"}', '2020-05-09 06:11:34', '2021-05-13 20:28:14'),
(73, 'service.element', '{\"id\":\"73\",\"icon\":\"<i class=\\\"fab fa-teamspeak\\\"><\\/i>\",\"title\":\"Asset management\",\"description\":\"Our Managers work vigilantly though the lifetime of each investment.\"}', '2020-05-09 06:11:49', '2021-05-13 19:55:48');
INSERT INTO `frontends` (`id`, `data_keys`, `data_values`, `created_at`, `updated_at`) VALUES
(74, 'company_policy.element', '{\"id\":\"74\",\"title\":\"Disclosures\",\"body\":\"<p class=\\\"MsoNormal\\\">\\u00a9 2021 Reel Shares. All rights reserved.<o:p><\\/o:p><\\/p><p class=\\\"MsoNormal\\\">1. Gross Distributions to Investors refers to the sum of any\\r\\ninterest, preferred return or income distributions, sale gains, and return of\\r\\ncapital after deduction of fees and investment-related expenses, excluding tax\\r\\nwithholding. Updated between inception (2\\/1\\/15) and the end of the last full\\r\\ncalendar quarter.<o:p><\\/o:p><\\/p><p class=\\\"MsoNormal\\\">2. The historical return calculation represents the\\r\\nequity-weighted average annualized internal rate of return (IRR) for realized\\r\\ninvestments offered by ReelShares\\u2122 since inception, after deduction of fees and\\r\\nexpenses. IRR is calculated by first calculating the XIRR of each individual\\r\\nrealized investment, net of all fees charged to investors, and then calculating\\r\\nthe weighted average, weighted by the amount invested. An investment is deemed\\r\\nrealized when no further payments are reasonably anticipated in the future that\\r\\nwould materially impact investor returns.. Updated between inception (2\\/1\\/15)\\r\\nand the end of the last full calendar quarter.<o:p><\\/o:p><\\/p><p class=\\\"MsoNormal\\\"><o:p>&nbsp;<\\/o:p><\\/p><p style=\\\"margin-right: 0px; margin-bottom: 1em; margin-left: 0px; overflow-wrap: inherit;\\\">\\r\\n\\r\\n\\r\\n\\r\\n\\r\\n\\r\\n\\r\\n\\r\\n<\\/p><p class=\\\"MsoNormal\\\">No communication by REEL SHARES LLC or any of its affiliates\\r\\n(collectively, \\u201cReelShares\\u2122\\u201d), through this website or any other medium, should\\r\\nbe construed or is intended to be a recommendation to purchase, sell or hold\\r\\nany security or otherwise to be investment, tax, financial, accounting, legal,\\r\\nregulatory or compliance advice. Nothing on this website is intended as an\\r\\noffer to extend credit, an offer to purchase or sell securities or a\\r\\nsolicitation of any securities transaction.<o:p><\\/o:p><\\/p><p style=\\\"margin-right: 0px; margin-bottom: 1em; margin-left: 0px; overflow-wrap: inherit;\\\">The material contained on this website is not intended to be a recommendation or investment advice, does not constitute a solicitation to buy, sell or hold a security or investment strategy and is not provided in a fiduciary capacity. The information provided does not take into account the specific objectives or circumstances of any particular investor or suggest any specific course of action. The information represents ReelShares\\u2122\\u2019view of the current market environment as of the date appearing above. There can be no assurance that any ReelShares\\u2122 fund or investment will achieve its objectives or avoid substantial losses. Investment decisions should be made based on an investor\\u2019s objectives and circumstances and in consultation with her or her financial professionals. Past performance is no guarantee of future results.<\\/p><p style=\\\"margin-right: 0px; margin-bottom: 1em; margin-left: 0px; overflow-wrap: inherit;\\\">All research and other information provided on this website has been prepared for informational purposes only and ReelShares\\u2122 assumes no liability or responsibility for any errors or omissions in the content of this website or any linked website.<\\/p><p style=\\\"margin-right: 0px; margin-bottom: 1em; margin-left: 0px; overflow-wrap: inherit;\\\">Any financial targets or returns shown on the website are estimated predictions of performance only, are hypothetical, are not based on actual investment results and are not guarantees of future results. Estimated targets do not represent or guarantee the actual results of any transaction, and no representation is made that any transaction will, or is likely to, achieve results or profits similar to those shown. In addition, other financial metrics and calculations shown on the website (including amounts of principal and interest repaid) have not been independently verified or audited and may differ from the actual financial metrics and calculations for any investment, which are contained in the investors\\u2019 portfolios. Any investment information contained herein has been secured from sources that ReelShares\\u2122 believes are reliable, but we make no representations or warranties as to the accuracy or completeness of such information and accept no liability therefor.<\\/p><p style=\\\"margin-right: 0px; margin-bottom: 1em; margin-left: 0px; overflow-wrap: inherit;\\\">Private placement investments are NOT bank deposits (and thus NOT insured by the FDIC or by any other federal governmental agency), are NOT guaranteed by ReelShares\\u2122 or any other party, and MAY lose value. Neither the Securities and Exchange Commission nor any federal or state securities commission or regulatory authority has recommended or approved any investment or the accuracy or completeness of any of the information or materials provided by or through the website. Investors must be able to afford the loss of their entire investment.<\\/p><p style=\\\"margin-right: 0px; margin-bottom: 1em; margin-left: 0px; overflow-wrap: inherit;\\\">Investments in private placements are speculative and involve a high degree of risk and those investors who cannot afford to lose their entire investment should not invest. Additionally, investors may receive illiquid and\\/or restricted securities that may be subject to holding period requirements and\\/or liquidity concerns. Investments in private placements are highly illiquid and those investors who cannot hold an investment for the long term (at least 5-7 years) should not invest. Real estate and other alternative investments should only be part of your overall investment portfolio.<\\/p><p style=\\\"margin-right: 0px; margin-bottom: 1em; margin-left: 0px; overflow-wrap: inherit;\\\">Articles or information from third-party media outside of this domain may discuss ReelShares\\u2122 or relate to information contained herein, but ReelShares\\u2122 does not approve and is not responsible for such content. Hyperlinks to third-party sites, or reproduction of third-party articles, do not constitute an approval or endorsement by ReelShares\\u2122 of the linked or reproduced content.<\\/p><p style=\\\"margin-right: 0px; margin-bottom: 1em; margin-left: 0px; overflow-wrap: inherit;\\\">Investing in securities or real property investments (the \\u201c\\u201dInvestments\\u201d\\u201d) listed on ReelShares\\u2122 pose risks, including but not limited to market risk, credit risk, interest rate risk, and the risk of losing some or all of the money you invest. Before investing you should: (1) conduct your own investigation and analysis; (2) carefully consider the investment and all related charges, expenses, uncertainties and risks, including all uncertainties and risks described in offering materials; and (3) consult with your own investment, tax, financial and legal advisors. Such Investments are only suitable for accredited investors who understand and willing and able to accept the high risks associated with private investments.<\\/p><p style=\\\"margin-right: 0px; margin-bottom: 1em; margin-left: 0px; overflow-wrap: inherit;\\\">Investing in private placements requires long-term commitments, the ability to afford to lose the entire investment, and low liquidity needs. This website provides preliminary and general information about the Investments and is intended for initial reference purposes only. It does not summarize or compile all the applicable information. This website does not constitute an offer to sell or buy any securities or other investments. No offer or sale of any Investments will occur without the delivery of confidential offering materials and related documents. This information contained herein is qualified by and subject to more detailed information in the applicable offering materials. ReelShares\\u2122 is not registered as a broker-dealer. ReelShares\\u2122 does not make any representation or warranty to any prospective investor regarding the legality of an investment in any ReelShares\\u2122 Investments.<\\/p><p style=\\\"margin-right: 0px; margin-bottom: 1em; margin-left: 0px; overflow-wrap: inherit;\\\">Banking services are provided by Wells Fargo, Member FDIC.<\\/p><p style=\\\"margin-right: 0px; margin-bottom: 1em; margin-left: 0px; overflow-wrap: inherit;\\\">Investment advisory services are provided by Wells Fargo Advisors an investment advisor registered with the Securities and Exchange Commission.<\\/p><p style=\\\"margin-right: 0px; margin-bottom: 1em; margin-left: 0px; overflow-wrap: inherit;\\\">Our site uses a third party service to match browser cookies to your mailing address. We then use another company to send special offers through the mail on our behalf. Our company never receives or stores any of this information and our third parties do not provide or sell this information to any other company or service&nbsp;<\\/p>\"}', '2022-08-25 23:28:36', '2022-08-25 23:35:14'),
(75, 'company_policy.element', '{\"id\":\"75\",\"title\":\"Cookie Policy\",\"body\":\"<p class=\\\"MsoNormal\\\">This Cookie Policy explains how ReelShares LLC. and its\\r\\ngroup companies (\\\"ReelShares\\\", \\\"we\\\", \\\"us\\\" and\\r\\n\\\"our\\\") use cookies and similar technologies when you visit our\\r\\nwebsites located at ReelShares.com, app.ReelShares.com or any other websites,\\r\\npages, features, or content we own or operate (collectively, the\\r\\n\\\"Site(s)\\\"), when you use the ReelShares mobile app, and\\/or when you\\r\\ninteract with ReelShares online advertisements or marketing emails (collectively\\r\\nthe \\\"Services\\\"). It explains what these technologies are and why we\\r\\nuse them, as well as your rights to control our use of them.<o:p><\\/o:p><\\/p>\\r\\n\\r\\n<p class=\\\"MsoNormal\\\"><o:p>&nbsp;<\\/o:p><\\/p>\\r\\n\\r\\n<p class=\\\"MsoNormal\\\">In some cases, we may use cookies and similar technologies\\r\\nto collect personal information, or information that becomes personal\\r\\ninformation if we combine it with other information. In such cases the ReelShares\\r\\nGlobal Privacy Policy will apply in addition to this Cookie Policy.<o:p><\\/o:p><\\/p>\\r\\n\\r\\n<p class=\\\"MsoNormal\\\"><o:p>&nbsp;<\\/o:p><\\/p>\\r\\n\\r\\n<p class=\\\"MsoNormal\\\">If you have any questions about our use of cookies or other\\r\\ntechnologies, please submit your request via our Support Portal at <a href=\\\"https:\\/\\/app.reelshares.com\\/contact\\\">Contact Us<\\/a>.<o:p><\\/o:p><\\/p>\\r\\n\\r\\n<p class=\\\"MsoNormal\\\"><o:p>&nbsp;<\\/o:p><\\/p>\\r\\n\\r\\n<p class=\\\"MsoNormal\\\">WHAT ARE COOKIES?<o:p><\\/o:p><\\/p>\\r\\n\\r\\n<p class=\\\"MsoNormal\\\">Cookies are small files, typically of letters and numbers,\\r\\ndownloaded onto your computer or mobile device when you visit certain websites.\\r\\nWhen you return to these websites, or visit other websites that use the same\\r\\ncookies, the websites recognize these cookies and your browsing device. A\\r\\ncookie cannot read data off your hard drive or read cookie files created by\\r\\nother websites.<o:p><\\/o:p><\\/p>\\r\\n\\r\\n<p class=\\\"MsoNormal\\\"><o:p>&nbsp;<\\/o:p><\\/p>\\r\\n\\r\\n<p class=\\\"MsoNormal\\\">Cookies set by the website operator are called \\\"first\\r\\nparty cookies\\\". Cookies set by parties other than the website operator are\\r\\ncalled \\\"third party cookies\\\". The parties that set third party\\r\\ncookies can recognize your web browser both when it visits the ReelShares\\r\\nwebsite and when it visits certain other websites where the third party\\u2019s\\r\\ncookies are also present.<o:p><\\/o:p><\\/p>\\r\\n\\r\\n<p class=\\\"MsoNormal\\\"><o:p>&nbsp;<\\/o:p><\\/p>\\r\\n\\r\\n<p class=\\\"MsoNormal\\\">More information on cookies and their use can be found at\\r\\nwww.aboutcookies.org or www.allaboutcookies.org.<o:p><\\/o:p><\\/p>\\r\\n\\r\\n<p class=\\\"MsoNormal\\\"><o:p>&nbsp;<\\/o:p><\\/p>\\r\\n\\r\\n<p class=\\\"MsoNormal\\\">WHY DO WE USE COOKIES?<o:p><\\/o:p><\\/p>\\r\\n\\r\\n<p class=\\\"MsoNormal\\\">When you access our Sites and Services, we or companies we\\r\\nwork with may place cookies on your computer or other device. These\\r\\ntechnologies help us better understand user behavior, and inform us about which\\r\\nparts of our websites people have visited.<o:p><\\/o:p><\\/p>\\r\\n\\r\\n<p class=\\\"MsoNormal\\\"><o:p>&nbsp;<\\/o:p><\\/p>\\r\\n\\r\\n<p class=\\\"MsoNormal\\\">We use first party and third party cookies to recognize you\\r\\nas a ReelShares customer, customize ReelShares Services, content, and\\r\\nadvertising, to measure promotional effectiveness, and to collect information about\\r\\nyour computer or other access device to mitigate risk, help prevent fraud, and\\r\\npromote trust and safety.<o:p><\\/o:p><\\/p>\\r\\n\\r\\n<p class=\\\"MsoNormal\\\"><o:p>&nbsp;<\\/o:p><\\/p>\\r\\n\\r\\n<p class=\\\"MsoNormal\\\">We may place cookies from third-party service providers who\\r\\nmay use information about your visits to other websites to target\\r\\nadvertisements for products and services available from ReelShares. We do not\\r\\ncontrol the types of information collected and stored by these third-party\\r\\ncookies. You should check the third-party\'s website for more information on how\\r\\nthey use cookies.<o:p><\\/o:p><\\/p>\\r\\n\\r\\n<p class=\\\"MsoNormal\\\"><o:p>&nbsp;<\\/o:p><\\/p>\\r\\n\\r\\n<p class=\\\"MsoNormal\\\">The following are some examples of information that we\\r\\ncollect and how we may use it:<o:p><\\/o:p><\\/p>\\r\\n\\r\\n<p class=\\\"MsoNormal\\\"><o:p>&nbsp;<\\/o:p><\\/p>\\r\\n\\r\\n<p class=\\\"MsoNormal\\\">We may collect and store details of how you use our Sites\\r\\nand Services. Except in limited instances to ensure quality of our Services\\r\\nover the Internet, such information will not be associated with your IP\\r\\naddress.<o:p><\\/o:p><\\/p>\\r\\n\\r\\n<p class=\\\"MsoNormal\\\"><o:p>&nbsp;<\\/o:p><\\/p>\\r\\n\\r\\n<p class=\\\"MsoNormal\\\">We may collect information such as your language, inferred\\r\\nzip code or area code, unique device identifier, referrer URL, location, and\\r\\ntime zone so that we can better understand customer behavior and improve our\\r\\nServices.<o:p><\\/o:p><\\/p>\\r\\n\\r\\n<p class=\\\"MsoNormal\\\"><o:p>&nbsp;<\\/o:p><\\/p>\\r\\n\\r\\n<p class=\\\"MsoNormal\\\">We may collect information regarding customer activities on\\r\\nour websites and platforms, which is used to understand which parts of our\\r\\nSites and Services are of most interest. This data is aggregated, and thus is\\r\\nconsidered non-personal information for the purposes of this Cookie Policy and\\r\\nour Global Privacy Policy.<o:p><\\/o:p><\\/p>\\r\\n\\r\\n<p class=\\\"MsoNormal\\\"><o:p>&nbsp;<\\/o:p><\\/p>\\r\\n\\r\\n<p class=\\\"MsoNormal\\\">WHAT TYPES OF COOKIES DO WE USE?<o:p><\\/o:p><\\/p>\\r\\n\\r\\n<p class=\\\"MsoNormal\\\">We use the following types of cookies:<o:p><\\/o:p><\\/p>\\r\\n\\r\\n<p class=\\\"MsoNormal\\\"><o:p>&nbsp;<\\/o:p><\\/p>\\r\\n\\r\\n<p class=\\\"MsoNormal\\\">Strictly Necessary Cookies<o:p><\\/o:p><\\/p>\\r\\n\\r\\n<p class=\\\"MsoNormal\\\"><o:p>&nbsp;<\\/o:p><\\/p>\\r\\n\\r\\n<p class=\\\"MsoNormal\\\">These cookies are necessary for the Sites to function and\\r\\ncannot be switched off in our systems. They are usually only set in response to\\r\\nactions made by you which amount to a request for services, such as setting\\r\\nyour privacy preferences, logging in, or filling in forms. These also include\\r\\ncookies we may rely on for fraud prevention. You can set your browser to block\\r\\nor alert you about these cookies, but some parts of the site will not then\\r\\nwork.<o:p><\\/o:p><\\/p>\\r\\n\\r\\n<p class=\\\"MsoNormal\\\"><o:p>&nbsp;<\\/o:p><\\/p>\\r\\n\\r\\n<p class=\\\"MsoNormal\\\">Performance\\/Analytics Cookies<o:p><\\/o:p><\\/p>\\r\\n\\r\\n<p class=\\\"MsoNormal\\\"><o:p>&nbsp;<\\/o:p><\\/p>\\r\\n\\r\\n<p class=\\\"MsoNormal\\\">These cookies allow us to count visits and traffic sources\\r\\nso we can measure and improve the performance of our Sites. They help us to\\r\\nknow which pages are the most and least popular and see how visitors move\\r\\naround the site. All information these cookies collect is aggregated and therefore\\r\\nanonymous. If you do not allow these cookies we will not know when you have\\r\\nvisited our site, and will not be able to monitor its performance.<o:p><\\/o:p><\\/p>\\r\\n\\r\\n<p class=\\\"MsoNormal\\\"><o:p>&nbsp;<\\/o:p><\\/p>\\r\\n\\r\\n<p class=\\\"MsoNormal\\\">Functionality Cookies<o:p><\\/o:p><\\/p>\\r\\n\\r\\n<p class=\\\"MsoNormal\\\"><o:p>&nbsp;<\\/o:p><\\/p>\\r\\n\\r\\n<p class=\\\"MsoNormal\\\">These cookies allow us to remember the choices you make and\\r\\nto tailor our Services so we can provide relevant content to you. For example,\\r\\na functionality cookie can remember your preferences (e.g., country or language\\r\\nselection), or your username.<o:p><\\/o:p><\\/p>\\r\\n\\r\\n<p class=\\\"MsoNormal\\\"><o:p>&nbsp;<\\/o:p><\\/p>\\r\\n\\r\\n<p class=\\\"MsoNormal\\\">Targeting\\/Advertising Cookies<o:p><\\/o:p><\\/p>\\r\\n\\r\\n<p class=\\\"MsoNormal\\\"><o:p>&nbsp;<\\/o:p><\\/p>\\r\\n\\r\\n<p class=\\\"MsoNormal\\\">ReelShares uses third party service providers to display advertising\\r\\non our Services and serve advertising on other third party sites that may be\\r\\nrelevant to you or your interests. These cookies are also used to help measure\\r\\nthe effectiveness of the advertising campaign. They remember that you have\\r\\nvisited a website and this information may be shared with other organizations,\\r\\nsuch as advertisers. This means that after you have been to our websites, you\\r\\nmay see some advertisements about our Services elsewhere on the Internet. The\\r\\ninformation collected through this process by the third party service providers\\r\\ndoes not enable us or them to identify your name, contact details or other\\r\\npersonal information that directly identifies you unless you choose to provide\\r\\nthese. Such advertising will only be delivered where permitted by applicable\\r\\nlaw. If you do not allow these cookies, you will experience less advertising\\r\\ntailored to your inferred interests on our Sites and will not receive targeted ReelShares\\r\\nadvertisements on third party websites.<o:p><\\/o:p><\\/p>\\r\\n\\r\\n<p class=\\\"MsoNormal\\\"><o:p>&nbsp;<\\/o:p><\\/p>\\r\\n\\r\\n<p class=\\\"MsoNormal\\\">HOW LONG WILL COOKIES STAY ON MY BROWSING DEVICE?<o:p><\\/o:p><\\/p>\\r\\n\\r\\n<p class=\\\"MsoNormal\\\">The length of time a cookie will stay on your browsing\\r\\ndevice depends on whether it is a \\\"persistent\\\" or \\\"session\\\"\\r\\ncookie. Session cookies will only stay on your device until you close your\\r\\nbrowser. Persistent cookies stay on your browsing device until they expire or\\r\\nare deleted.<o:p><\\/o:p><\\/p>\\r\\n\\r\\n<p class=\\\"MsoNormal\\\"><o:p>&nbsp;<\\/o:p><\\/p>\\r\\n\\r\\n<p class=\\\"MsoNormal\\\">WHAT OTHER SIMILAR TECHNOLOGIES DOES REELSHARES USE?<o:p><\\/o:p><\\/p>\\r\\n\\r\\n<p class=\\\"MsoNormal\\\">In addition to cookies, we may use other similar\\r\\ntechnologies, like web beacons to track users of our Sites and Services. Web\\r\\nbeacons, or \\\"clear gifs,\\\" are tiny graphics with a unique identifier,\\r\\nsimilar in function to cookies. They are used to track the online movements of\\r\\nweb users.<o:p><\\/o:p><\\/p>\\r\\n\\r\\n<p class=\\\"MsoNormal\\\"><o:p>&nbsp;<\\/o:p><\\/p>\\r\\n\\r\\n<p class=\\\"MsoNormal\\\">In contrast to cookies, which are stored on a user\'s\\r\\ncomputer hard drive or device, clear gifs are embedded invisibly on web pages\\r\\nand are about the size of the period at the end of this sentence. We and our\\r\\nthird-party service provider employ web beacons for the reasons stated above\\r\\n(under \\\"Cookies\\\"), but primarily to help us better manage content on\\r\\nour Services by informing us which content is effective.<o:p><\\/o:p><\\/p>\\r\\n\\r\\n<p class=\\\"MsoNormal\\\"><o:p>&nbsp;<\\/o:p><\\/p>\\r\\n\\r\\n<p class=\\\"MsoNormal\\\">We may also use so-called \\\"Flash Cookies\\\" (also\\r\\nknown as \\\"Local Shared Objects or \\\"LSOs\\\") to collect and store\\r\\ninformation about your use of our services, fraud prevention and for other site\\r\\noperations.<o:p><\\/o:p><\\/p>\"}', '2022-08-25 23:34:45', '2022-08-25 23:43:28'),
(76, 'company_policy.element', '{\"title\":\"Trust & Security\",\"body\":\"<p style=\\\"margin-right: 0px; margin-bottom: 1em; margin-left: 0px; overflow-wrap: inherit; color: rgb(68, 68, 68); font-family: Montserrat; font-size: 16px;\\\">Overview<\\/p><p style=\\\"margin-right: 0px; margin-bottom: 1em; margin-left: 0px; overflow-wrap: inherit; color: rgb(68, 68, 68); font-family: Montserrat; font-size: 16px;\\\">ReelShares is a cloud application platform used by individuals and organizations of all sizes to participate in real estate, private equity and private fund transactions. Our platform allows users to safely and securely invest with a technology stack that concentrates on data storage, workflow, scaling, integration, and security.<\\/p><p style=\\\"margin-right: 0px; margin-bottom: 1em; margin-left: 0px; overflow-wrap: inherit; color: rgb(68, 68, 68); font-family: Montserrat; font-size: 16px;\\\"><br><\\/p><p style=\\\"margin-right: 0px; margin-bottom: 1em; margin-left: 0px; overflow-wrap: inherit; color: rgb(68, 68, 68); font-family: Montserrat; font-size: 16px;\\\"><span style=\\\"font-family: Montserrat;\\\">EU-US and Swiss-US Privacy Shield<\\/span><br><\\/p><p style=\\\"margin-right: 0px; margin-bottom: 1em; margin-left: 0px; overflow-wrap: inherit; color: rgb(68, 68, 68); font-family: Montserrat; font-size: 16px;\\\">ReelShares utilizes SG Hosting Inc. for web cloud hosting data centers which complies with the EU-U.S. Privacy Shield Framework and Swiss-U.S. Privacy Shield Framework as set forth by the U.S. Department of Commerce regarding the collection, use, and retention of personal information transferred from the European Union and Switzerland to the United States.&nbsp; SG Hosting Inc. has proved to the Department of Commerce that it adheres to the Privacy Shield Principles.&nbsp; To learn more about the Privacy Shield program, and to view our certification, please visithttps:\\/\\/www.privacyshield.gov\\/<\\/p><p style=\\\"margin-right: 0px; margin-bottom: 1em; margin-left: 0px; overflow-wrap: inherit; color: rgb(68, 68, 68); font-family: Montserrat; font-size: 16px;\\\">SG Hosting Inc. has further committed to cooperate with the panel established by the EU data protection authorities (DPAs) and the Swiss Federal Data Protection and Information Commissioner (FDPIC) with regard to unresolved Privacy Shield complaints concerning data transferred from the EU and Switzerland.<\\/p><p style=\\\"margin-right: 0px; margin-bottom: 1em; margin-left: 0px; overflow-wrap: inherit; color: rgb(68, 68, 68); font-family: Montserrat; font-size: 16px;\\\">SG Hosting Inc. is subject to the investigatory and enforcement powers of the Federal Trade Commission (FTC).<\\/p><p style=\\\"margin-right: 0px; margin-bottom: 1em; margin-left: 0px; overflow-wrap: inherit; color: rgb(68, 68, 68); font-family: Montserrat; font-size: 16px;\\\">Under certain conditions, you may have the right to invoke binding arbitration for complaints regarding Privacy Shield not resolved by any of the other Privacy Shield mechanisms. More information can be found at: https:\\/\\/www.privacyshield.gov\\/article?id=ANNEX-I-introduction.<\\/p><p style=\\\"margin-right: 0px; margin-bottom: 1em; margin-left: 0px; overflow-wrap: inherit; color: rgb(68, 68, 68); font-family: Montserrat; font-size: 16px;\\\">Our Cloud Hosting provider uses Secure Sockets Layer (SSL) software to encrypt the information you enter on our Site in order to protect its security during transmission to and from our Site. When storing information, we protect its security by encryption and pseudonymization of critical data. When we process credit card information and payments, the credit card is subject to tokenization and strong security measures.<\\/p><p style=\\\"margin-right: 0px; margin-bottom: 1em; margin-left: 0px; overflow-wrap: inherit; color: rgb(68, 68, 68); font-family: Montserrat; font-size: 16px;\\\">SG Hosting Inc. maintain physical, electronic and procedural safeguards in connection with the collection, storage and disclosure of personally identifiable customer information. Our security procedures require us in some cases to request proof of identity before disclosing personal information to you.<\\/p>\"}', '2022-08-26 00:53:09', '2022-08-26 00:53:09'),
(77, 'blog.element', '{\"id\":\"77\",\"has_image\":\"1\",\"title\":\"Boyton Beach Medical Office\",\"description\":\"<span style=\\\"color: rgb(42, 43, 48); font-family: Larsseit, sans-serif; font-size: 16px;\\\">&nbsp;Class A, four-story, 40,210 square feet (\\u201cSF\\u201d) medical office building located in Boynton Beach, Florida, (the \\u201cProperty\\u201d). As of March 2022, the Property is 100% occupied and leased to twelve tenants. The Property was built in 1986 and renovated in 2014. Major tenants at the Property include TLC Women\\u2019s Health (a Obstetrician-Gynecologists company), Estimating Edge LLC (a construction software company), and Maximum Healthcare Services (a medical staffing company). The current tenancy consists of 19,515 SF (49% of NRA) of office space and 20,695 SF (51% of NRA) of medical office use and has a weighted average remaining lease term (\\u201cWALT\\u201d) of 4.9 years. The business plan is to let approximately 25% of the traditional office roll to market, perform base building\\/tenant suite capital improvements, and then lease the vacancies to medical office users at higher rents.&nbsp;<\\/span>\",\"image\":\"6307f10d4d8861661464845.jpg\"}', '2022-08-26 02:54:28', '2022-08-26 03:00:45');

-- --------------------------------------------------------

--
-- Table structure for table `gateways`
--

CREATE TABLE `gateways` (
  `id` int UNSIGNED NOT NULL,
  `code` int UNSIGNED NOT NULL,
  `name` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `alias` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `image` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` tinyint(1) NOT NULL DEFAULT '1',
  `parameter_list` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci,
  `supported_currencies` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci,
  `crypto` tinyint NOT NULL DEFAULT '0' COMMENT '0: fiat currency, 1: crypto currency',
  `extra` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci,
  `description` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `gateways`
--

INSERT INTO `gateways` (`id`, `code`, `name`, `alias`, `image`, `status`, `parameter_list`, `supported_currencies`, `crypto`, `extra`, `description`, `created_at`, `updated_at`) VALUES
(1, 101, 'Paypal', 'Paypal', '631ad225107e11662702117.png', 1, '{\"paypal_email\":{\"title\":\"PayPal Email\",\"global\":true,\"value\":\"sb-athav20504296@business.example.com\"}}', '{\"AUD\":\"AUD\",\"BRL\":\"BRL\",\"CAD\":\"CAD\",\"CZK\":\"CZK\",\"DKK\":\"DKK\",\"EUR\":\"EUR\",\"HKD\":\"HKD\",\"HUF\":\"HUF\",\"INR\":\"INR\",\"ILS\":\"ILS\",\"JPY\":\"JPY\",\"MYR\":\"MYR\",\"MXN\":\"MXN\",\"TWD\":\"TWD\",\"NZD\":\"NZD\",\"NOK\":\"NOK\",\"PHP\":\"PHP\",\"PLN\":\"PLN\",\"GBP\":\"GBP\",\"RUB\":\"RUB\",\"SGD\":\"SGD\",\"SEK\":\"SEK\",\"CHF\":\"CHF\",\"THB\":\"THB\",\"USD\":\"$\"}', 0, NULL, 'PayPal allows customers to establish an account on its platform, which is connected to a user\'s credit card or checking account. PayPal is a fast, simple, and secure way to make a payment online.', '2019-09-14 07:14:22', '2022-09-09 10:41:57'),
(2, 102, 'Perfect Money', 'Perfect Money', '60111045e2fa31611731013.png', 0, '{\"passphrase\":{\"title\":\"ALTERNATE PASSPHRASE\",\"global\":true,\"value\":\"6451561651551dfgdfhhth\"},\"wallet_id\":{\"title\":\"PM Wallet\",\"global\":false,\"value\":\"\"}}', '{\"USD\":\"$\",\"EUR\":\"\\u20ac\"}', 0, NULL, 'Paytm is largest mobile payments and commerce platform. It started with online mobile recharge and bill payments and has an online marketplace today. To keep things at ease, you can also use Paytm Wallet.', '2019-09-14 07:14:22', '2021-07-21 23:22:04'),
(3, 103, 'Stripe', 'Stripe', '631ad18f8b56b1662701967.png', 1, '{\"secret_key\":{\"title\":\"Secret Key\",\"global\":true,\"value\":\"sk_test_51LTxK0IStElJjGu4Hx5mqkHaj2PWB9r6X4Omml4YkHnqMRawKvq6La3AOv0WWQPgUOzIaHnetxZUQCvIoLaFYAIq00963B8dea\"},\"publishable_key\":{\"title\":\"PUBLISHABLE KEY\",\"global\":true,\"value\":\"pk_test_51LTxK0IStElJjGu4VFDmtiotAuxa621IaVpW1jyEIdQlRDES56pWL7mVrCqXL0TYf97T11IB7dr2vKPrdR8teCjJ00qYWPStnw\"}}', '{\"USD\":\"USD\",\"AUD\":\"AUD\",\"BRL\":\"BRL\",\"CAD\":\"CAD\",\"CHF\":\"CHF\",\"DKK\":\"DKK\",\"EUR\":\"EUR\",\"GBP\":\"GBP\",\"HKD\":\"HKD\",\"INR\":\"INR\",\"JPY\":\"JPY\",\"MXN\":\"MXN\",\"MYR\":\"MYR\",\"NOK\":\"NOK\",\"NZD\":\"NZD\",\"PLN\":\"PLN\",\"SEK\":\"SEK\",\"SGD\":\"SGD\"}', 0, NULL, 'Stripe is a third-party payments processor built around a simple idea: make it easy for companies to do business online.', '2019-09-14 07:14:22', '2022-09-09 10:39:27'),
(4, 104, 'Skrill', 'Skrill', '601110a3ac59b1611731107.jpg', 1, '{\"pay_to_email\":{\"title\":\"Skrill Email\",\"global\":true,\"value\":\"merchant@skrill.com\"},\"secret_key\":{\"title\":\"Secret Key\",\"global\":true,\"value\":\"TheSoftKing\"}}', '{\"AED\":\"AED\",\"AUD\":\"AUD\",\"BGN\":\"BGN\",\"BHD\":\"BHD\",\"CAD\":\"CAD\",\"CHF\":\"CHF\",\"CZK\":\"CZK\",\"DKK\":\"DKK\",\"EUR\":\"EUR\",\"GBP\":\"GBP\",\"HKD\":\"HKD\",\"HRK\":\"HRK\",\"HUF\":\"HUF\",\"ILS\":\"ILS\",\"INR\":\"INR\",\"ISK\":\"ISK\",\"JOD\":\"JOD\",\"JPY\":\"JPY\",\"KRW\":\"KRW\",\"KWD\":\"KWD\",\"MAD\":\"MAD\",\"MYR\":\"MYR\",\"NOK\":\"NOK\",\"NZD\":\"NZD\",\"OMR\":\"OMR\",\"PLN\":\"PLN\",\"QAR\":\"QAR\",\"RON\":\"RON\",\"RSD\":\"RSD\",\"SAR\":\"SAR\",\"SEK\":\"SEK\",\"SGD\":\"SGD\",\"THB\":\"THB\",\"TND\":\"TND\",\"TRY\":\"TRY\",\"TWD\":\"TWD\",\"USD\":\"USD\",\"ZAR\":\"ZAR\",\"COP\":\"COP\"}', 0, NULL, 'Skrill is one of the most popular electronic payment systems in the world. In addition to rapid processing of payments and low commissions, the system’s advantages include the ability to use credit cards. Making a deposit using Skrill is possible through a form in the Personal Account.', '2019-09-14 07:14:22', '2022-08-28 22:32:49'),
(5, 105, 'PayTM', 'PayTM', '601110ca745921611731146.png', 0, '{\"MID\":{\"title\":\"Merchant ID\",\"global\":true,\"value\":\"DIY12386817555501617\"},\"merchant_key\":{\"title\":\"Merchant Key\",\"global\":true,\"value\":\"bKMfNxPPf_QdZppa\"},\"WEBSITE\":{\"title\":\"Paytm Website\",\"global\":true,\"value\":\"DIYtestingweb\"},\"INDUSTRY_TYPE_ID\":{\"title\":\"Industry Type\",\"global\":true,\"value\":\"Retail\"},\"CHANNEL_ID\":{\"title\":\"CHANNEL ID\",\"global\":true,\"value\":\"WEB\"},\"transaction_url\":{\"title\":\"Transaction URL\",\"global\":true,\"value\":\"https:\\/\\/pguat.paytm.com\\/oltp-web\\/processTransaction\"},\"transaction_status_url\":{\"title\":\"Transaction STATUS URL\",\"global\":true,\"value\":\"https:\\/\\/pguat.paytm.com\\/paytmchecksum\\/paytmCallback.jsp\"}}', '{\"AUD\":\"AUD\",\"ARS\":\"ARS\",\"BDT\":\"BDT\",\"BRL\":\"BRL\",\"BGN\":\"BGN\",\"CAD\":\"CAD\",\"CLP\":\"CLP\",\"CNY\":\"CNY\",\"COP\":\"COP\",\"HRK\":\"HRK\",\"CZK\":\"CZK\",\"DKK\":\"DKK\",\"EGP\":\"EGP\",\"EUR\":\"EUR\",\"GEL\":\"GEL\",\"GHS\":\"GHS\",\"HKD\":\"HKD\",\"HUF\":\"HUF\",\"INR\":\"INR\",\"IDR\":\"IDR\",\"ILS\":\"ILS\",\"JPY\":\"JPY\",\"KES\":\"KES\",\"MYR\":\"MYR\",\"MXN\":\"MXN\",\"MAD\":\"MAD\",\"NPR\":\"NPR\",\"NZD\":\"NZD\",\"NGN\":\"NGN\",\"NOK\":\"NOK\",\"PKR\":\"PKR\",\"PEN\":\"PEN\",\"PHP\":\"PHP\",\"PLN\":\"PLN\",\"RON\":\"RON\",\"RUB\":\"RUB\",\"SGD\":\"SGD\",\"ZAR\":\"ZAR\",\"KRW\":\"KRW\",\"LKR\":\"LKR\",\"SEK\":\"SEK\",\"CHF\":\"CHF\",\"THB\":\"THB\",\"TRY\":\"TRY\",\"UGX\":\"UGX\",\"UAH\":\"UAH\",\"AED\":\"AED\",\"GBP\":\"GBP\",\"USD\":\"USD\",\"VND\":\"VND\",\"XOF\":\"XOF\"}', 0, NULL, 'Paytm is largest mobile payments and commerce platform. It started with online mobile recharge and bill payments and has an online marketplace today. To keep things at ease, you can also use Paytm Wallet.', '2019-09-14 07:14:22', '2021-07-21 23:22:29'),
(6, 106, 'Payeer', 'Payeer', '601110dc13e7f1611731164.png', 0, '{\"merchant_id\":{\"title\":\"Merchant ID\",\"global\":true,\"value\":\"866989763\"},\"secret_key\":{\"title\":\"Secret key\",\"global\":true,\"value\":\"7575\"}}', '{\"USD\":\"USD\",\"EUR\":\"EUR\",\"RUB\":\"RUB\"}', 0, '{\"status\":{\"title\": \"Status URL\",\"value\":\"ipn.g106\"}}', 'Payeer is one of the many e-wallets available for use on betting sites. As mentioned, the payment gateway allows deposits through various methods.', '2019-09-14 07:14:22', '2022-09-09 10:44:54'),
(7, 107, 'PayStack', 'PayStack', NULL, 0, '{\"public_key\":{\"title\":\"Public key\",\"global\":true,\"value\":\"pk_test_3c9c87f51b13c15d99eb367ca6ebc52cc9eb1f33\"},\"secret_key\":{\"title\":\"Secret key\",\"global\":true,\"value\":\"sk_test_2a3f97a146ab5694801f993b60fcb81cd7254f12\"}}', '{\"USD\":\"USD\",\"NGN\":\"NGN\"}', 0, '{\"callback\":{\"title\": \"Callback URL\",\"value\":\"ipn.g107\"},\"webhook\":{\"title\": \"Webhook URL\",\"value\":\"ipn.g107\"}}\r\n', 'Paystack, a widely popular payment gateway for African business, facilitates to accept secure online payments. The payment gateway allows the businesses registered in Africa to accept the payments from global customers.', '2019-09-14 07:14:22', '2021-07-21 23:23:06'),
(8, 108, 'VoguePay', 'VoguePay', NULL, 0, '{\"merchant_id\":{\"title\":\"MERCHANT ID\",\"global\":true,\"value\":\"demo\"}}', '{\"USD\":\"USD\",\"GBP\":\"GBP\",\"EUR\":\"EUR\",\"GHS\":\"GHS\",\"NGN\":\"NGN\",\"ZAR\":\"ZAR\"}', 0, NULL, 'VoguePay is an online payment gateway allows site owners to receive payment for their goods and services on their website without any setup fee for both local and International payments', '2019-09-14 07:14:22', '2021-07-21 23:23:16'),
(9, 109, 'Flutterwave', 'Flutterwave', NULL, 0, '{\"public_key\":{\"title\":\"Public Key\",\"global\":true,\"value\":\"FLWPUBK_TEST-5d9bb05bba2c13aa6c7a1ec7d7526ba2-X\"},\"secret_key\":{\"title\":\"Secret Key\",\"global\":true,\"value\":\"FLWSECK_TEST-2ac7b05b6b9fa8a423eb58241fd7bbb6-X\"},\"encryption_key\":{\"title\":\"Encryption Key\",\"global\":true,\"value\":\"FLWSECK_TEST32e13665a95a\"}}', '{\"KES\":\"KES\",\"GHS\":\"GHS\",\"NGN\":\"NGN\",\"USD\":\"USD\",\"GBP\":\"GBP\",\"EUR\":\"EUR\",\"UGX\":\"UGX\",\"TZS\":\"TZS\"}', 0, NULL, 'Its process credit card and local alternative payments, like mobile money and ACH, across Africa. They make it possible for global merchants to process payments like a local African company.', '2019-09-14 07:14:22', '2021-01-27 13:06:56'),
(10, 110, 'RazorPay', 'RazorPay', NULL, 0, '{\"key_id\":{\"title\":\"Key Id\",\"global\":true,\"value\":\"rzp_test_kiOtejPbRZU90E\"},\"key_secret\":{\"title\":\"Key Secret \",\"global\":true,\"value\":\"osRDebzEqbsE1kbyQJ4y0re7\"}}', '{\"INR\":\"INR\"}', 0, NULL, 'Razor’s payment gateway is one of the most ambitious in its sector. Razorpay allows online businesses to accept, process and disburse digital payments through several payment modes like debit cards, credit cards, net banking, UPI and prepaid digital wallets.', '2019-09-14 07:14:22', '2021-07-21 23:23:20'),
(11, 111, 'Stripe JS', 'Stripe JS', '60111132895ee1611731250.png', 0, '{\"secret_key\":{\"title\":\"Secret Key\",\"global\":true,\"value\":\"sk_test_aat3tzBCCXXBkS4sxY3M8A1B\"},\"publishable_key\":{\"title\":\"PUBLISHABLE KEY\",\"global\":true,\"value\":\"pk_test_AU3G7doZ1sbdpJLj0NaozPBu\"}}', '{\"USD\":\"USD\",\"AUD\":\"AUD\",\"BRL\":\"BRL\",\"CAD\":\"CAD\",\"CHF\":\"CHF\",\"DKK\":\"DKK\",\"EUR\":\"EUR\",\"GBP\":\"GBP\",\"HKD\":\"HKD\",\"INR\":\"INR\",\"JPY\":\"JPY\",\"MXN\":\"MXN\",\"MYR\":\"MYR\",\"NOK\":\"NOK\",\"NZD\":\"NZD\",\"PLN\":\"PLN\",\"SEK\":\"SEK\",\"SGD\":\"SGD\"}', 0, NULL, 'Stripe JS is a third-party payments processor built around a simple idea: make it easy for companies to do business online. It’s not just about processing credit cards. Stripe JS primarily targets developers with a suite of tools that make it nearly effortless to handle everything from in-app payments to marketplace transactions.', '2019-09-14 07:14:22', '2022-09-07 19:47:25'),
(12, 112, 'Instamojo', 'Instamojo', NULL, 0, '{\"api_key\":{\"title\":\"API KEY\",\"global\":true,\"value\":\"test_2241633c3bc44a3de84a3b33969\"},\"auth_token\":{\"title\":\"Auth Token\",\"global\":true,\"value\":\"test_279f083f7bebefd35217feef22d\"},\"salt\":{\"title\":\"Salt\",\"global\":true,\"value\":\"19d38908eeff4f58b2ddda2c6d86ca25\"}}', '{\"INR\":\"INR\"}', 0, NULL, 'Instamojo Payment Gateway in PHP As for indian Payment Gateway. It provides many solutions like test environment and signup process also is simple.', '2019-09-14 07:14:22', '2021-01-27 13:07:44'),
(13, 501, 'Blockchain', 'Blockchain', NULL, 0, '{\"api_key\":{\"title\":\"API Key\",\"global\":true,\"value\":\"8df2e5a0-3798-4b74-871d-973615b57e7b\"},\"xpub_code\":{\"title\":\"XPUB CODE\",\"global\":true,\"value\":\"xpub6CXLqfWXj1xgXe79nEQb3pv2E7TGD13pZgHceZKrQAxqXdrC2FaKuQhm5CYVGyNcHLhSdWau4eQvq3EDCyayvbKJvXa11MX9i2cHPugpt3G\"}}', '{\"BTC\":\"BTC\"}', 1, NULL, 'Blockchain has been able to give under banked groups access to money, allows people to make cross-border payments and uses smart contracts to act as a means towards faster and safer payment processing', '2019-09-14 07:14:22', '2021-01-27 13:08:15'),
(14, 502, 'Block.io', 'Block.io', '6011116b280e51611731307.png', 0, '{\"api_key\":{\"title\":\"API Key\",\"global\":false,\"value\":\"1658-8015-2e5e-9afb\"},\"api_pin\":{\"title\":\"API PIN\",\"global\":true,\"value\":\"abdulbasitasia2022\"}}', '{\"BTC\":\"BTC\",\"LTC\":\"LTC\",\"DOGE\":\"DOGE\"}', 1, '{\"cron\":{\"title\": \"Cron URL\",\"value\":\"ipn.g502\"}}', 'This method provides exponentially higher security for your Wallets and applications than single-signature addresses. This way, you spend coins yourself, without trusting Block.io with your credentials.', '2019-09-14 07:14:22', '2022-09-09 10:35:45'),
(15, 503, 'CoinPayments', 'CoinPayments', '60111191b3da61611731345.jpg', 0, '{\"public_key\":{\"title\":\"Public Key\",\"global\":true,\"value\":\"7638eebaf4061b7f7cdfceb14046318bbdabf7e2f64944773d6550bd59f70274\"},\"private_key\":{\"title\":\"Private Key\",\"global\":true,\"value\":\"Cb6dee7af8Eb9E0D4123543E690dA3673294147A5Dc8e7a621B5d484a3803207\"},\"merchant_id\":{\"title\":\"Merchant ID\",\"global\":true,\"value\":\"93a1e014c4ad60a7980b4a7239673cb4\"}}', '{\"BTC\":\"Bitcoin\",\"BTC.LN\":\"Bitcoin (Lightning Network)\",\"LTC\":\"Litecoin\",\"CPS\":\"CPS Coin\",\"VLX\":\"Velas\",\"APL\":\"Apollo\",\"AYA\":\"Aryacoin\",\"BAD\":\"Badcoin\",\"BCD\":\"Bitcoin Diamond\",\"BCH\":\"Bitcoin Cash\",\"BCN\":\"Bytecoin\",\"BEAM\":\"BEAM\",\"BITB\":\"Bean Cash\",\"BLK\":\"BlackCoin\",\"BSV\":\"Bitcoin SV\",\"BTAD\":\"Bitcoin Adult\",\"BTG\":\"Bitcoin Gold\",\"BTT\":\"BitTorrent\",\"CLOAK\":\"CloakCoin\",\"CLUB\":\"ClubCoin\",\"CRW\":\"Crown\",\"CRYP\":\"CrypticCoin\",\"CRYT\":\"CryTrExCoin\",\"CURE\":\"CureCoin\",\"DASH\":\"DASH\",\"DCR\":\"Decred\",\"DEV\":\"DeviantCoin\",\"DGB\":\"DigiByte\",\"DOGE\":\"Dogecoin\",\"EBST\":\"eBoost\",\"EOS\":\"EOS\",\"ETC\":\"Ether Classic\",\"ETH\":\"Ethereum\",\"ETN\":\"Electroneum\",\"EUNO\":\"EUNO\",\"EXP\":\"EXP\",\"Expanse\":\"Expanse\",\"FLASH\":\"FLASH\",\"GAME\":\"GameCredits\",\"GLC\":\"Goldcoin\",\"GRS\":\"Groestlcoin\",\"KMD\":\"Komodo\",\"LOKI\":\"LOKI\",\"LSK\":\"LSK\",\"MAID\":\"MaidSafeCoin\",\"MUE\":\"MonetaryUnit\",\"NAV\":\"NAV Coin\",\"NEO\":\"NEO\",\"NMC\":\"Namecoin\",\"NVST\":\"NVO Token\",\"NXT\":\"NXT\",\"OMNI\":\"OMNI\",\"PINK\":\"PinkCoin\",\"PIVX\":\"PIVX\",\"POT\":\"PotCoin\",\"PPC\":\"Peercoin\",\"PROC\":\"ProCurrency\",\"PURA\":\"PURA\",\"QTUM\":\"QTUM\",\"RES\":\"Resistance\",\"RVN\":\"Ravencoin\",\"RVR\":\"RevolutionVR\",\"SBD\":\"Steem Dollars\",\"SMART\":\"SmartCash\",\"SOXAX\":\"SOXAX\",\"STEEM\":\"STEEM\",\"STRAT\":\"STRAT\",\"SYS\":\"Syscoin\",\"TPAY\":\"TokenPay\",\"TRIGGERS\":\"Triggers\",\"TRX\":\" TRON\",\"UBQ\":\"Ubiq\",\"UNIT\":\"UniversalCurrency\",\"USDT\":\"Tether USD (Omni Layer)\",\"VTC\":\"Vertcoin\",\"WAVES\":\"Waves\",\"XCP\":\"Counterparty\",\"XEM\":\"NEM\",\"XMR\":\"Monero\",\"XSN\":\"Stakenet\",\"XSR\":\"SucreCoin\",\"XVG\":\"VERGE\",\"XZC\":\"ZCoin\",\"ZEC\":\"ZCash\",\"ZEN\":\"Horizen\"}', 1, NULL, 'CoinPayments is a cloud wallet solution that offers an easy way to integrate a checkout system for numerous cryptocurrencies. Its website offers payment solutions for multiple crypto-currencies such as bitcoin and litecoin.', '2019-09-14 07:14:22', '2021-07-21 23:34:27'),
(16, 504, 'CoinPayments Fiat', 'CoinPayments Fiat', NULL, 0, '{\"merchant_id\":{\"title\":\"Merchant ID\",\"global\":true,\"value\":\"93a1e014c4ad60a7980b4a7239673cb4\"}}', '{\"USD\":\"USD\",\"AUD\":\"AUD\",\"BRL\":\"BRL\",\"CAD\":\"CAD\",\"CHF\":\"CHF\",\"CLP\":\"CLP\",\"CNY\":\"CNY\",\"DKK\":\"DKK\",\"EUR\":\"EUR\",\"GBP\":\"GBP\",\"HKD\":\"HKD\",\"INR\":\"INR\",\"ISK\":\"ISK\",\"JPY\":\"JPY\",\"KRW\":\"KRW\",\"NZD\":\"NZD\",\"PLN\":\"PLN\",\"RUB\":\"RUB\",\"SEK\":\"SEK\",\"SGD\":\"SGD\",\"THB\":\"THB\",\"TWD\":\"TWD\"}', 0, NULL, 'This is the same gateway as CoinPayments but we used fiat currency as calculation currency.', '2019-09-14 07:14:22', '2021-07-21 23:31:41'),
(17, 505, 'Coingate', 'Coingate', NULL, 0, '{\"api_key\":{\"title\":\"API Key\",\"global\":true,\"value\":\"Ba1VgPx6d437xLXGKCBkmwVCEw5kHzRJ6thbGo-N\"}}', '{\"USD\":\"USD\",\"EUR\":\"EUR\"}', 0, NULL, 'CoinGate Bitcoin Payment Processor is an online cryptocurrency platform that provides merchant services to businesses and individuals', '2019-09-14 07:14:22', '2021-07-21 23:31:48'),
(18, 506, 'Coinbase Commerce', 'Coinbase commerce', '60f876e50850a1626896101.jpg', 1, '{\"api_key\":{\"title\":\"API Key\",\"global\":true,\"value\":\"c47cd7df-d8e8-424b-a20a\"},\"secret\":{\"title\":\"Webhook Shared Secret\",\"global\":true,\"value\":\"55871878-2c32-4f64-ab66\"}}', '{\"USD\":\"USD\",\"EUR\":\"EUR\",\"JPY\":\"JPY\",\"GBP\":\"GBP\",\"AUD\":\"AUD\",\"CAD\":\"CAD\",\"CHF\":\"CHF\",\"CNY\":\"CNY\",\"SEK\":\"SEK\",\"NZD\":\"NZD\",\"MXN\":\"MXN\",\"SGD\":\"SGD\",\"HKD\":\"HKD\",\"NOK\":\"NOK\",\"KRW\":\"KRW\",\"TRY\":\"TRY\",\"RUB\":\"RUB\",\"INR\":\"INR\",\"BRL\":\"BRL\",\"ZAR\":\"ZAR\",\"AED\":\"AED\",\"AFN\":\"AFN\",\"ALL\":\"ALL\",\"AMD\":\"AMD\",\"ANG\":\"ANG\",\"AOA\":\"AOA\",\"ARS\":\"ARS\",\"AWG\":\"AWG\",\"AZN\":\"AZN\",\"BAM\":\"BAM\",\"BBD\":\"BBD\",\"BDT\":\"BDT\",\"BGN\":\"BGN\",\"BHD\":\"BHD\",\"BIF\":\"BIF\",\"BMD\":\"BMD\",\"BND\":\"BND\",\"BOB\":\"BOB\",\"BSD\":\"BSD\",\"BTN\":\"BTN\",\"BWP\":\"BWP\",\"BYN\":\"BYN\",\"BZD\":\"BZD\",\"CDF\":\"CDF\",\"CLF\":\"CLF\",\"CLP\":\"CLP\",\"COP\":\"COP\",\"CRC\":\"CRC\",\"CUC\":\"CUC\",\"CUP\":\"CUP\",\"CVE\":\"CVE\",\"CZK\":\"CZK\",\"DJF\":\"DJF\",\"DKK\":\"DKK\",\"DOP\":\"DOP\",\"DZD\":\"DZD\",\"EGP\":\"EGP\",\"ERN\":\"ERN\",\"ETB\":\"ETB\",\"FJD\":\"FJD\",\"FKP\":\"FKP\",\"GEL\":\"GEL\",\"GGP\":\"GGP\",\"GHS\":\"GHS\",\"GIP\":\"GIP\",\"GMD\":\"GMD\",\"GNF\":\"GNF\",\"GTQ\":\"GTQ\",\"GYD\":\"GYD\",\"HNL\":\"HNL\",\"HRK\":\"HRK\",\"HTG\":\"HTG\",\"HUF\":\"HUF\",\"IDR\":\"IDR\",\"ILS\":\"ILS\",\"IMP\":\"IMP\",\"IQD\":\"IQD\",\"IRR\":\"IRR\",\"ISK\":\"ISK\",\"JEP\":\"JEP\",\"JMD\":\"JMD\",\"JOD\":\"JOD\",\"KES\":\"KES\",\"KGS\":\"KGS\",\"KHR\":\"KHR\",\"KMF\":\"KMF\",\"KPW\":\"KPW\",\"KWD\":\"KWD\",\"KYD\":\"KYD\",\"KZT\":\"KZT\",\"LAK\":\"LAK\",\"LBP\":\"LBP\",\"LKR\":\"LKR\",\"LRD\":\"LRD\",\"LSL\":\"LSL\",\"LYD\":\"LYD\",\"MAD\":\"MAD\",\"MDL\":\"MDL\",\"MGA\":\"MGA\",\"MKD\":\"MKD\",\"MMK\":\"MMK\",\"MNT\":\"MNT\",\"MOP\":\"MOP\",\"MRO\":\"MRO\",\"MUR\":\"MUR\",\"MVR\":\"MVR\",\"MWK\":\"MWK\",\"MYR\":\"MYR\",\"MZN\":\"MZN\",\"NAD\":\"NAD\",\"NGN\":\"NGN\",\"NIO\":\"NIO\",\"NPR\":\"NPR\",\"OMR\":\"OMR\",\"PAB\":\"PAB\",\"PEN\":\"PEN\",\"PGK\":\"PGK\",\"PHP\":\"PHP\",\"PKR\":\"PKR\",\"PLN\":\"PLN\",\"PYG\":\"PYG\",\"QAR\":\"QAR\",\"RON\":\"RON\",\"RSD\":\"RSD\",\"RWF\":\"RWF\",\"SAR\":\"SAR\",\"SBD\":\"SBD\",\"SCR\":\"SCR\",\"SDG\":\"SDG\",\"SHP\":\"SHP\",\"SLL\":\"SLL\",\"SOS\":\"SOS\",\"SRD\":\"SRD\",\"SSP\":\"SSP\",\"STD\":\"STD\",\"SVC\":\"SVC\",\"SYP\":\"SYP\",\"SZL\":\"SZL\",\"THB\":\"THB\",\"TJS\":\"TJS\",\"TMT\":\"TMT\",\"TND\":\"TND\",\"TOP\":\"TOP\",\"TTD\":\"TTD\",\"TWD\":\"TWD\",\"TZS\":\"TZS\",\"UAH\":\"UAH\",\"UGX\":\"UGX\",\"UYU\":\"UYU\",\"UZS\":\"UZS\",\"VEF\":\"VEF\",\"VND\":\"VND\",\"VUV\":\"VUV\",\"WST\":\"WST\",\"XAF\":\"XAF\",\"XAG\":\"XAG\",\"XAU\":\"XAU\",\"XCD\":\"XCD\",\"XDR\":\"XDR\",\"XOF\":\"XOF\",\"XPD\":\"XPD\",\"XPF\":\"XPF\",\"XPT\":\"XPT\",\"YER\":\"YER\",\"ZMW\":\"ZMW\",\"ZWL\":\"ZWL\"}\r\n\r\n', 0, '{\"endpoint\":{\"title\": \"Webhook Endpoint\",\"value\":\"ipn.g506\"}}', 'Coinbase Commerce allows merchants to accept cryptocurrency payments in Bitcoin, Bitcoin Cash, Ethereum and Litecoin.', '2019-09-14 07:14:22', '2021-07-21 23:36:59'),
(20, 1000, 'ACH PAYMENT', 'ACH PAYMENT', '60f9208edc62e1626939534.png', 1, '[]', '[]', 0, '{\"delay\":\"4\",\"verify_image\":\"Customer Name\"}', '<h2 style=\"box-sizing: inherit; margin-bottom: 0.5rem; line-height: 1.2; font-size: 35px; font-family: Overpass, sans-serif; color: rgb(0, 0, 0);\"><p class=\"intercom-align-left\" style=\"color: rgb(51, 51, 51); font-family: -apple-system, BlinkMacSystemFont, &quot;Segoe UI&quot;, Helvetica, Arial, sans-serif; font-size: 14px;\">If you have a bank account in the US, you can use ACH to fund your account manually or automatically, without incurring any processing fees. Follow the steps below to make an ACH payment.</p><p class=\"intercom-align-left\" style=\"color: rgb(51, 51, 51); font-family: -apple-system, BlinkMacSystemFont, &quot;Segoe UI&quot;, Helvetica, Arial, sans-serif; font-size: 14px;\"><strong style=\"font-weight: bold;\"><em>NOTE:&nbsp;</em></strong><em>ACH payments are only applicable to US bank accounts. If you are not located in the US, but have a US bank account, please contact&nbsp;<a href=\"mailto:support@rtxplatform.com\" style=\"color: rgb(46, 160, 190);\">support@reelshares.com</a>&nbsp;and we\'ll unlock ACH payments for you. We also accept payments from any location</em><em>&nbsp;via&nbsp;</em><a href=\"https://learn.rtxplatform.com/hc/en-us/articles/360002005214\" rel=\"nofollow noreferrer\" style=\"color: rgb(46, 160, 190);\"><em>Bitcoin</em></a><em>&nbsp;or&nbsp;</em><a href=\"https://learn.rtxplatform.com/hc/en-us/articles/360002001493\" rel=\"nofollow noreferrer\" style=\"color: rgb(46, 160, 190);\"><em>wire</em></a><em>.</em></p><p class=\"intercom-align-left\" style=\"color: rgb(51, 51, 51); font-family: -apple-system, BlinkMacSystemFont, &quot;Segoe UI&quot;, Helvetica, Arial, sans-serif; font-size: 14px;\"><br></p></h2>', '2021-07-21 09:52:50', '2022-09-08 08:35:06'),
(21, 1001, 'Test', 'Test', '', 0, '[]', '[]', 0, '{\"delay\":\"12\",\"verify_image\":\"test\"}', 'test', '2021-07-22 09:12:11', '2022-08-29 22:13:04'),
(22, 1002, 'Bank Checks', 'Bank Checks', '631ad35b221be1662702427.png', 1, '[]', '[]', 0, '{\"delay\":\"7\"}', '<div class=\"columncontrol aem-GridColumn aem-GridColumn--default--12\" style=\"color: rgb(36, 36, 36); font-family: GraphikETRADE, &quot;Helvetica Neue&quot;, Helvetica, Arial, sans-serif; font-size: 13px; letter-spacing: -0.21px;\"><div class=\"row\" style=\"margin-right: -10px; margin-left: -10px; height: 390px;\"><div class=\"col-centered-10\" style=\"position: relative; float: left; width: 491.656px; min-height: 1px; padding-right: 10px; padding-left: 10px; margin-left: 49.1562px;\"><div class=\"aem-Grid aem-Grid--12 aem-Grid--default--12 \"><div class=\"richTextEditor aem-GridColumn aem-GridColumn--default--12\"><h3 class=\"text-center vertical-offset-md\" style=\"font-family: inherit; font-weight: 500; line-height: 28px; color: rgb(36, 36, 36); font-size: 22px; letter-spacing: -0.25px; margin-bottom: 25px !important;\">Mail a check</h3></div><div class=\"richTextEditor aem-GridColumn aem-GridColumn--default--12\"><h4 style=\"font-family: inherit; font-weight: 500; line-height: 21px; color: rgb(36, 36, 36); margin-bottom: 10px; font-size: 15px; letter-spacing: -0.21px;\">For checks made payable to REEL SHARE LLC</h4><ul style=\"margin-bottom: 9px; padding-left: 20px;\"><li style=\"padding: 0px 0px 10px 20px;\">Write your eight-digit account number on the memo line.</li><li style=\"padding: 0px 0px 10px 20px;\">Sign the back of the check and write \"for deposit only to [account number]\" next to or directly under your signature.</li><li style=\"padding: 0px 0px 10px 20px;\">Attach a deposit slip (if you have one)</li></ul></div><div class=\"richTextEditor aem-GridColumn aem-GridColumn--default--12\"><h4 style=\"font-family: inherit; font-weight: 500; line-height: 21px; color: rgb(36, 36, 36); margin-bottom: 10px; font-size: 15px; letter-spacing: -0.21px;\">For checks made payable to you:</h4><ul style=\"margin-bottom: 9px; padding-left: 20px;\"><li style=\"padding: 0px 0px 10px 20px;\">Sign the back of the check and write \"for deposit only to [account number]\" next to or directly under your signature.</li><li style=\"padding: 0px 0px 10px 20px;\">Attach a deposit slip (if you have one)</li></ul></div><div class=\"richTextEditor aem-GridColumn aem-GridColumn--default--12\"><div class=\"text-center vertical-offset-md\" style=\"margin-bottom: 25px !important;\"><span class=\"text-bold\" style=\"font-weight: 600 !important;\">Note:</span>&nbsp;The payee name must match the account owner name on the account in order for the deposit to be processed</div></div></div></div></div></div><div class=\"columncontrol aem-GridColumn aem-GridColumn--default--12\" style=\"color: rgb(36, 36, 36); font-family: GraphikETRADE, &quot;Helvetica Neue&quot;, Helvetica, Arial, sans-serif; font-size: 13px; letter-spacing: -0.21px;\"><div class=\"row\" style=\"margin-right: -10px; margin-left: -10px; height: 268px;\"><div class=\"col-xs-12 col-sm-6 vertical-offset-md \" style=\"min-height: 1px; padding-right: 10px; padding-left: 10px; float: left; width: 295px; margin-bottom: 25px !important;\"><div class=\"aem-Grid aem-Grid--12 aem-Grid--default--12 \"><div class=\"richTextEditor aem-GridColumn aem-GridColumn--default--12\"><div style=\"padding: 0px 0px 0px 15px;\"><p style=\"margin-right: 0px; margin-bottom: 9px; margin-left: 0px;\"><br></p></div></div></div></div><div class=\"col-xs-12 col-sm-6 vertical-offset-md \" style=\"min-height: 1px; padding-right: 10px; padding-left: 10px; float: left; width: 295px; margin-bottom: 25px !important;\"><div class=\"aem-Grid aem-Grid--12 aem-Grid--default--12 \"><div class=\"richTextEditor aem-GridColumn aem-GridColumn--default--12\"><div style=\"padding: 0px 0px 0px 15px;\"><p style=\"margin-right: 0px; margin-bottom: 9px; margin-left: 0px;\">Mail your check deposits to:</p><p style=\"margin-right: 0px; margin-bottom: 9px; margin-left: 0px;\"><span style=\"font-weight: 600;\">Regular US mail</span><br><span style=\"font-family: &quot;Open Sans&quot;, sans-serif; letter-spacing: -0.21px;\">REEL SHARE LLC</span><br>Attention: Deposit Operations<br>c/o E*TRADE Financial Corporation<br>PO Box 484<br>Jersey City, NJ 07303-0484</p><p style=\"margin-right: 0px; margin-bottom: 9px; margin-left: 0px;\"><span style=\"font-weight: 600;\">Overnight mail</span><br><span style=\"font-family: &quot;Open Sans&quot;, sans-serif; letter-spacing: -0.21px;\">REEL SHARE LLC</span><br>Harborside 2<br>200 Hudson Street, Suite 501<br>Jersey City, NJ 07311-1113</p></div></div></div></div></div></div>', '2021-07-22 09:33:21', '2022-09-09 20:51:59'),
(23, 1003, 'Bank Wire', 'Bank Wire', '60f92255a94451626939989.png', 1, '[]', '[]', 0, '{\"delay\":\"2\",\"verify_image\":\"Sign Here !\"}', '<h3 class=\"text-center large-header\" style=\"font-family: GraphikETRADE, &quot;Helvetica Neue&quot;, Helvetica, Arial, sans-serif; font-weight: 500; line-height: 36px; color: rgb(36, 36, 36); margin-bottom: 10px; font-size: 32px; letter-spacing: -0.4px;\">Wire transfer</h3><p class=\"text-center\" style=\"margin-right: 0px; margin-bottom: 9px; margin-left: 0px; color: rgb(36, 36, 36); font-family: GraphikETRADE, &quot;Helvetica Neue&quot;, Helvetica, Arial, sans-serif; font-size: 13px; letter-spacing: -0.21px;\">Wire transfer is an electronic transfer of money between accounts, including accounts at different financial institutions. Wire transfers are fast and highly secure.</p><p class=\"text-center\" style=\"margin-right: 0px; margin-bottom: 9px; margin-left: 0px; color: rgb(36, 36, 36); font-family: GraphikETRADE, &quot;Helvetica Neue&quot;, Helvetica, Arial, sans-serif; font-size: 13px; letter-spacing: -0.21px;\"><br></p><div class=\"richTextEditor aem-GridColumn aem-GridColumn--default--12\" style=\"color: rgb(36, 36, 36); font-family: GraphikETRADE, &quot;Helvetica Neue&quot;, Helvetica, Arial, sans-serif; font-size: 13px; letter-spacing: -0.21px;\"><div style=\"padding: 0px 25px 30px;\"><h3 style=\"font-family: inherit; font-weight: 500; line-height: 28px; color: rgb(36, 36, 36); margin-bottom: 10px; font-size: 22px; letter-spacing: -0.25px;\">Wire money to your REELSHARES private securities account:</h3><ol style=\"margin-bottom: 9px; padding-left: 20px;\"><li style=\"padding: 0px 0px 10px 20px;\">Complete and print out our&nbsp;<font color=\"#5627d8\"><span style=\"font-weight: inherit; border-style: initial; border-color: initial; border-image: initial;\">REELSHARES Wire Transfer Form</span></font>.</li><li style=\"padding: 0px 0px 10px 20px;\">Send the completed form to your other financial institution and ask them to wire funds to REELSHARES.</li></ol></div></div><div class=\"richTextEditor aem-GridColumn aem-GridColumn--default--12\" style=\"color: rgb(36, 36, 36); font-family: GraphikETRADE, &quot;Helvetica Neue&quot;, Helvetica, Arial, sans-serif; font-size: 13px; letter-spacing: -0.21px;\"><div style=\"padding: 0px 25px;\"><p style=\"margin-right: 0px; margin-bottom: 9px; margin-left: 0px;\"><span style=\"font-weight: 600;\">The receiving institution information:</span></p><p style=\"margin-right: 0px; margin-bottom: 9px; margin-left: 0px;\">REELSHARE LLC<br>PO Box 484<br>Jersey City, NJ 07303-0484<br>ABA Routing Number: -----------</p><p style=\"margin-right: 0px; margin-bottom: 9px; margin-left: 0px;\">&nbsp;</p><p style=\"margin-right: 0px; margin-bottom: 9px; margin-left: 0px;\"><span style=\"font-weight: 600;\">Your information:</span></p><span style=\"font-family: var(--para-font); letter-spacing: -0.21px;\">The amount you want to wire</span><br><span style=\"font-family: var(--para-font); letter-spacing: -0.21px;\">Your REELSHARES account number. (Your account number can be found on the Complete View page when you first log on.)</span><br><span style=\"font-family: var(--para-font); letter-spacing: -0.21px;\">Your name and address</span><br></div></div>', '2021-07-22 11:46:29', '2022-09-08 08:27:49');

-- --------------------------------------------------------

--
-- Table structure for table `gateway_currencies`
--

CREATE TABLE `gateway_currencies` (
  `id` int UNSIGNED NOT NULL,
  `name` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `currency` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `symbol` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `method_code` int UNSIGNED NOT NULL,
  `min_amount` decimal(18,8) NOT NULL,
  `max_amount` decimal(18,8) NOT NULL,
  `percent_charge` decimal(8,4) NOT NULL DEFAULT '0.0000',
  `fixed_charge` decimal(18,8) NOT NULL DEFAULT '0.00000000',
  `rate` decimal(18,8) NOT NULL,
  `image` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `gateway_parameter` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `gateway_currencies`
--

INSERT INTO `gateway_currencies` (`id`, `name`, `currency`, `symbol`, `method_code`, `min_amount`, `max_amount`, `percent_charge`, `fixed_charge`, `rate`, `image`, `gateway_parameter`, `created_at`, `updated_at`) VALUES
(2, 'ACH PAYMENT', 'USD', '', 1000, '500.00000000', '1000000.00000000', '0.0000', '0.00000000', '1.00000000', '60f9208edc62e1626939534.png', '[\"Bank Account Number\",\"ACH Routing #\",\"Bank Name\",\"Address\"]', '2021-07-21 09:52:50', '2022-09-08 08:35:06'),
(6, 'Test', '12', '', 1001, '12.00000000', '1200000.00000000', '12.0000', '13.00000000', '10.00000000', '', '[]', '2021-07-22 09:12:11', '2022-08-24 12:18:02'),
(7, 'Bank Checks', 'USD', '', 1002, '50.00000000', '10000000.00000000', '1.0000', '10.00000000', '1.00000000', '631ad35b221be1662702427.png', '[]', '2021-07-22 09:33:21', '2022-09-09 20:51:59'),
(8, 'Bank Wire', 'USD', '', 1003, '100.00000000', '10000000.00000000', '1.0000', '25.00000000', '1.00000000', '60f92255a94451626939989.png', '[]', '2021-07-22 11:46:29', '2022-09-08 08:27:49'),
(17, 'Stripe Js', 'USD', 'USD', 111, '5.00000000', '50000.00000000', '0.0000', '0.00000000', '1.00000000', NULL, '{\"secret_key\":\"sk_test_aat3tzBCCXXBkS4sxY3M8A1B\",\"publishable_key\":\"pk_test_AU3G7doZ1sbdpJLj0NaozPBu\"}', '2022-09-03 02:35:11', '2022-09-03 02:35:11'),
(18, 'Payeer', 'USD', 'USD', 106, '5.00000000', '50000.00000000', '0.0000', '0.00000000', '1.00000000', NULL, '{\"merchant_id\":\"866989763\",\"secret_key\":\"7575\"}', '2022-09-03 02:47:03', '2022-09-03 02:47:03'),
(25, 'BitCoin Payment', 'BTC', 'BTC', 502, '5.00000000', '50000.00000000', '0.0000', '0.00000000', '1.00000000', NULL, '{\"api_pin\":\"abdulbasitasia2022\",\"api_key\":\"96df-d943-4854-4176\"}', '2022-09-07 01:28:17', '2022-09-07 01:28:17'),
(28, 'Credit Card', 'USD', '$', 103, '5.00000000', '5000.00000000', '1.9000', '0.00000000', '1.00000000', NULL, '{\"secret_key\":\"sk_test_51LTxK0IStElJjGu4Hx5mqkHaj2PWB9r6X4Omml4YkHnqMRawKvq6La3AOv0WWQPgUOzIaHnetxZUQCvIoLaFYAIq00963B8dea\",\"publishable_key\":\"pk_test_51LTxK0IStElJjGu4VFDmtiotAuxa621IaVpW1jyEIdQlRDES56pWL7mVrCqXL0TYf97T11IB7dr2vKPrdR8teCjJ00qYWPStnw\"}', '2022-09-09 10:39:27', '2022-09-09 10:39:27'),
(29, 'Paypal', 'USD', '$', 101, '5.00000000', '5000.00000000', '2.0000', '2.00000000', '1.00000000', '60f873ca7a9ca1626895306.png', '{\"paypal_email\":\"sb-athav20504296@business.example.com\"}', '2022-09-09 10:41:57', '2022-09-09 10:41:57');

-- --------------------------------------------------------

--
-- Table structure for table `general_settings`
--

CREATE TABLE `general_settings` (
  `id` int UNSIGNED NOT NULL,
  `sitename` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `cur_text` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL COMMENT 'currency text',
  `cur_sym` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL COMMENT 'currency symbol',
  `efrom` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL COMMENT 'email sent from',
  `etemp` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci COMMENT 'email template',
  `smsapi` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL COMMENT 'sms api',
  `bclr` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL COMMENT 'Base Color',
  `sclr` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL COMMENT 'Secondary Color',
  `ev` tinyint NOT NULL DEFAULT '0' COMMENT 'email verification, 0 - dont check, 1 - check',
  `en` tinyint NOT NULL DEFAULT '0' COMMENT 'email notification, 0 - dont send, 1 - send',
  `mail_config` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci COMMENT 'email configuration',
  `sv` tinyint NOT NULL DEFAULT '0' COMMENT 'sms verication, 0 - dont check, 1 - check',
  `sn` tinyint NOT NULL DEFAULT '0' COMMENT 'sms notification, 0 - dont send, 1 - send',
  `reg` tinyint NOT NULL DEFAULT '0' COMMENT 'allow registration',
  `alert` tinyint NOT NULL DEFAULT '1' COMMENT '0 => none, 1 => iziToast, 2 => toaster',
  `social_login` tinyint(1) NOT NULL DEFAULT '0' COMMENT 'social login',
  `social_credential` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci,
  `active_template` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL COMMENT 'active template folder name',
  `sys_version` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci,
  `deposit_commission` tinyint(1) NOT NULL DEFAULT '1',
  `invest_commission` tinyint(1) NOT NULL DEFAULT '1',
  `invest_return_commission` tinyint(1) NOT NULL DEFAULT '1',
  `twilio_from` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `twilio_sid` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `twilio_token` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `last_cron` datetime DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `general_settings`
--

INSERT INTO `general_settings` (`id`, `sitename`, `cur_text`, `cur_sym`, `efrom`, `etemp`, `smsapi`, `bclr`, `sclr`, `ev`, `en`, `mail_config`, `sv`, `sn`, `reg`, `alert`, `social_login`, `social_credential`, `active_template`, `sys_version`, `deposit_commission`, `invest_commission`, `invest_return_commission`, `twilio_from`, `twilio_sid`, `twilio_token`, `last_cron`, `created_at`, `updated_at`) VALUES
(1, 'Reelshares.com', 'EUR', '€', 'info@reelshares.com', '<br style=\"font-family: Lato, -apple-system, BlinkMacSystemFont, &quot;Segoe UI&quot;, Roboto, &quot;Helvetica Neue&quot;, Arial, sans-serif;\"><br style=\"font-family: Lato, -apple-system, BlinkMacSystemFont, &quot;Segoe UI&quot;, Roboto, &quot;Helvetica Neue&quot;, Arial, sans-serif;\"><div class=\"contents\" style=\"font-family: Lato, -apple-system, BlinkMacSystemFont, &quot;Segoe UI&quot;, Roboto, &quot;Helvetica Neue&quot;, Arial, sans-serif; max-width: 600px; margin: 0px auto; border: 2px solid rgb(0, 0, 54);\"><div class=\"header\" style=\"background-color: rgb(0, 0, 54); padding: 15px; text-align: center;\"><div class=\"logo\" style=\"width: 260px; margin: 0px auto;\"><img><img><img><img src=\"https://i.imgur.com/YwPz46E.png\" width=\"300\"><span style=\"font-family: Lato, -apple-system, BlinkMacSystemFont, &quot;Segoe UI&quot;, Roboto, &quot;Helvetica Neue&quot;, Arial, sans-serif;\">&nbsp;</span></div></div><div class=\"mailtext\" style=\"padding: 30px 15px; background-color: rgb(240, 248, 255); font-family: &quot;Open Sans&quot;, sans-serif; font-size: 16px; line-height: 26px;\">Hi {{name}},&nbsp;<br><br>{{message}}&nbsp;<br><br><br></div><div class=\"footer\" style=\"background-color: rgb(0, 0, 54); padding: 15px; text-align: center;\"><a href=\"http://app.reelshares.com\" style=\"color: rgb(255, 255, 255); background-color: rgb(46, 204, 113); padding: 10px 0px; margin: 10px; display: inline-block; width: 100px; text-transform: uppercase; font-weight: 600; border-radius: 4px;\" title=\"\" target=\"\">WEBSITE</a>&nbsp;<a href=\"http://app.reelshares.com/plan\" style=\"color: rgb(255, 255, 255); background-color: rgb(46, 204, 113); padding: 10px 0px; margin: 10px; display: inline-block; width: 100px; text-transform: uppercase; font-weight: 600; border-radius: 4px;\" title=\"\" target=\"\">PLANS</a>&nbsp;<a href=\"http://app.reelshares.com/contact\" style=\"color: rgb(255, 255, 255); background-color: rgb(46, 204, 113); padding: 10px 0px; margin: 10px; display: inline-block; width: 100px; text-transform: uppercase; font-weight: 600; border-radius: 4px;\" title=\"\" target=\"\">CONTACT</a><img style=\"background-color: rgb(255, 255, 255); text-align: left;\"></div><div class=\"footer\" style=\"background-color: rgb(0, 0, 54); padding: 15px; text-align: center; border-top: 1px solid rgba(255, 255, 255, 0.2);\"><span style=\"font-weight: bolder; color: rgb(255, 255, 255);\">© 2021 REELSHARES.COM. All Rights Reserved.</span><p style=\"color: rgb(221, 221, 221);\">Reelshares\r\n is a registered Investment Platform.</p><div><br></div></div></div><table class=\"layout layout--no-gutter\" style=\"border-spacing: 0px; color: rgb(52, 73, 94); table-layout: fixed; margin-left: auto; margin-right: auto; overflow-wrap: break-word; word-break: break-word;\" align=\"center\"><tbody><tr></tr></tbody></table>', 'https://jdw364.api.infobip.com/api/v3/sendsms/plain?user=readyventure&password=Pal9876543!&sender=RockHYIP&SMSText={{message}}&GSM={{{44791163443}}&type=longSMS', '1b6ced', 'f4f4f4', 1, 1, '{\"name\":\"smtp\",\"host\":\"giow24.siteground.us\",\"port\":\"587\",\"enc\":\"tls\",\"username\":\"mail@reelshares.com\",\"password\":\"Mailserver666!\"}', 1, 1, 1, 1, 1, '{\"google_client_id\":\"53929591142-l40gafo7efd9onfe6tj545sf9g7tv15t.apps.googleusercontent.com\",\"google_client_secret\":\"BRdB3np2IgYLiy4-bwMcmOwN\",\"fb_client_id\":\"277229062999748\",\"fb_client_secret\":\"1acfc850f73d1955d14b282938585122\"}', 'minimal', NULL, 1, 0, 0, '+15086825664', 'AC704fd68d94fdfdfa6cc43ee1ad5acb8d', 'ca0f0c0923433d70ba0bd245b5204622', '2022-10-13 06:30:01', '2019-10-18 17:16:05', '2022-10-13 11:30:01');

-- --------------------------------------------------------

--
-- Table structure for table `invests`
--

CREATE TABLE `invests` (
  `id` int UNSIGNED NOT NULL,
  `user_id` int NOT NULL,
  `plan_id` int NOT NULL,
  `amount` decimal(11,2) NOT NULL DEFAULT '0.00',
  `interest` decimal(11,2) NOT NULL DEFAULT '0.00',
  `period` int NOT NULL,
  `hours` varchar(20) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `time_name` varchar(190) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `return_rec_time` int NOT NULL DEFAULT '0',
  `next_time` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `last_time` timestamp NULL DEFAULT NULL,
  `status` tinyint(1) NOT NULL,
  `capital_status` tinyint(1) NOT NULL COMMENT '1 = YES & 0 = NO',
  `trx` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `invests`
--

INSERT INTO `invests` (`id`, `user_id`, `plan_id`, `amount`, `interest`, `period`, `hours`, `time_name`, `return_rec_time`, `next_time`, `last_time`, `status`, `capital_status`, `trx`, `created_at`, `updated_at`) VALUES
(23, 1, 1, '500.00', '2.50', 100, '24', 'Daily', 34, '2022-10-13 13:30:02', '2022-10-12 13:30:02', 1, 0, '44YTKYQA5ORN', '2022-09-07 23:22:37', '2022-10-12 13:30:02'),
(24, 1, 2, '1000.00', '20.00', -1, '1', 'Per Hr', 738, '2022-10-13 12:30:01', '2022-10-13 11:30:01', 1, 0, 'ONOSBZ74C7MT', '2022-09-08 01:50:25', '2022-10-13 11:30:01'),
(25, 1, 2, '250000.00', '5000.00', -1, '1', 'Per Hr', 233, '2022-10-13 12:30:01', '2022-10-13 11:30:01', 1, 0, 'GVGKOVBRRPO6', '2022-10-02 18:03:45', '2022-10-13 11:30:01'),
(26, 1, 1, '10000.00', '50.00', 100, '24', 'Daily', 8, '2022-10-13 19:30:01', '2022-10-12 19:30:01', 1, 0, 'OFQTYKTHT6A6', '2022-10-04 18:07:32', '2022-10-12 19:30:01'),
(27, 4, 1, '10000.00', '50.00', 100, '24', 'Daily', 6, '2022-10-13 14:30:01', '2022-10-12 14:30:01', 1, 0, 'STVES6Z61W34', '2022-10-06 13:49:48', '2022-10-12 14:30:01'),
(28, 1, 1, '121.00', '0.61', 100, '24', 'Daily', 1, '2022-10-14 11:30:01', '2022-10-13 11:30:01', 1, 0, 'XAEKNP7PZXXE', '2022-10-12 11:03:05', '2022-10-13 11:30:01');

-- --------------------------------------------------------

--
-- Table structure for table `languages`
--

CREATE TABLE `languages` (
  `id` int UNSIGNED NOT NULL,
  `name` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `code` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `icon` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `text_align` tinyint NOT NULL DEFAULT '0' COMMENT '0: left to right text align, 1: right to left text align',
  `is_default` tinyint NOT NULL DEFAULT '0' COMMENT '0: not default language, 1: default language',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `languages`
--

INSERT INTO `languages` (`id`, `name`, `code`, `icon`, `text_align`, `is_default`, `created_at`, `updated_at`) VALUES
(1, 'English', 'en', '5e5d03a5d9a1a1583154085.png', 0, 1, '2020-02-29 22:29:03', '2020-03-10 21:33:19');

-- --------------------------------------------------------

--
-- Table structure for table `pages`
--

CREATE TABLE `pages` (
  `id` bigint UNSIGNED NOT NULL,
  `name` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `slug` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `tempname` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `secs` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `pages`
--

INSERT INTO `pages` (`id`, `name`, `slug`, `tempname`, `secs`, `created_at`, `updated_at`) VALUES
(1, 'HOME', 'home', 'templates.basic.', '[\"feature\",\"counter\",\"how_to_get_profit\",\"calculation\",\"plan\",\"service\",\"transaction\",\"top_investor\",\"call_to_action\",\"team\",\"faq\",\"testimonial\",\"we_accept\",\"blog\",\"subscribe\"]', '2020-03-01 21:54:15', '2021-01-08 23:28:20'),
(4, 'HOME', 'home', 'templates.minimal.', '[\"counter\",\"transaction\"]', '2020-03-10 16:59:25', '2022-09-10 22:10:31');

-- --------------------------------------------------------

--
-- Table structure for table `password_resets`
--

CREATE TABLE `password_resets` (
  `id` int UNSIGNED NOT NULL,
  `email` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `plans`
--

CREATE TABLE `plans` (
  `id` int UNSIGNED NOT NULL,
  `name` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `minimum` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `share_price` double DEFAULT NULL,
  `current_share_price` double NOT NULL DEFAULT '0',
  `total_supply` int DEFAULT '1',
  `circulating_supply` int DEFAULT '0',
  `market_cap` double NOT NULL DEFAULT '1',
  `maximum` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `fixed_amount` varchar(190) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `interest` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `interest_status` int NOT NULL COMMENT '1 = ''%'' / 0 =''currency''',
  `times` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` tinyint NOT NULL DEFAULT '0',
  `interest_plan_type` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `investment_sectors_and_category` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `featured` tinyint NOT NULL DEFAULT '0',
  `capital_back_status` int NOT NULL,
  `lifetime_status` int NOT NULL,
  `repeat_time` varchar(190) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `plan_image` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `plan_document` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci,
  `address` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `overview` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `investment_highlights` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `sponsor` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `transaction_history` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci,
  `property_details` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `risk_disclosures` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `plans`
--

INSERT INTO `plans` (`id`, `name`, `minimum`, `share_price`, `current_share_price`, `total_supply`, `circulating_supply`, `market_cap`, `maximum`, `fixed_amount`, `interest`, `interest_status`, `times`, `status`, `interest_plan_type`, `investment_sectors_and_category`, `featured`, `capital_back_status`, `lifetime_status`, `repeat_time`, `plan_image`, `plan_document`, `address`, `overview`, `investment_highlights`, `sponsor`, `transaction_history`, `property_details`, `risk_disclosures`, `created_at`, `updated_at`) VALUES
(1, 'Neha Fund', '100', 2, 2.0020136253043, 10000000, 10058, 20000000, '5000000', '0', '0.5', 1, '24', 1, 'Equity', 'Real Estate', 1, 0, 0, '100', '[\"6318df5311bc91662574419.jpg\"]', '', '', '<p>ascdsv asaddjccvbasc jlasas,v asj&nbsp; caslj csac</p>', '<p>sdv sffsdffvsd</p>', '<p>&nbsp;sdvdsv sdvsd</p>', '<p>vd sdvsdvsdvsd</p>', '', '<p>vdsvds sdbsdsdb</p>', '2022-09-07 23:13:39', '2022-10-12 11:03:06'),
(2, 'TSLA', '50', 5, 10, 100000, 50000, 500000, '1000000', '0', '2', 1, '1', 1, 'Venture Capital', 'Healthcare', 0, 0, 1, '0', '[\"631904079c2941662583815.jpg\"]', '', 'Nishatabad', '<p>svdsdvsdvsdv</p>', '<p>sdvsdvsvsdv</p>', '<p>sdvs sdsdvsdv</p>', NULL, '', '<p>vsadvascvasc</p>', '2022-09-07 23:21:52', '2022-10-03 09:57:50');

-- --------------------------------------------------------

--
-- Table structure for table `plan_price_history`
--

CREATE TABLE `plan_price_history` (
  `id` int NOT NULL,
  `plan_id` int NOT NULL,
  `date` varchar(100) NOT NULL,
  `share_price` double NOT NULL,
  `market_cap` double NOT NULL DEFAULT '0',
  `outstanding_shares` double NOT NULL DEFAULT '0',
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `plan_price_history`
--

INSERT INTO `plan_price_history` (`id`, `plan_id`, `date`, `share_price`, `market_cap`, `outstanding_shares`, `created_at`, `updated_at`) VALUES
(9, 2, '2022-10-02', 10, 500000, 50000, '2022-10-02 18:03:45', '2022-10-02 18:03:45'),
(10, 2, '2022-10-03', 10, 500000, 50000, '2022-10-03 09:57:50', '2022-10-03 09:57:50'),
(11, 1, '2022-10-03', 2, 20000000, 10000000, '2022-10-03 12:23:53', '2022-10-03 12:23:53'),
(12, 1, '2022-10-04', 2.0010005002501, 20000000, 9995000, '2022-10-04 18:07:32', '2022-10-04 18:07:32'),
(13, 1, '2022-10-06', 2.0020016012009, 20000000, 9990002, '2022-10-06 13:49:49', '2022-10-06 13:49:49'),
(14, 1, '2022-10-12', 2.0020136253043, 20000000, 9989942, '2022-10-12 11:03:06', '2022-10-12 11:03:06');

-- --------------------------------------------------------

--
-- Table structure for table `plugins`
--

CREATE TABLE `plugins` (
  `id` int UNSIGNED NOT NULL,
  `act` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `name` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci,
  `image` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `script` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci,
  `shortcode` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci COMMENT 'object',
  `support` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci COMMENT 'help section',
  `status` tinyint(1) NOT NULL DEFAULT '1',
  `deleted_at` datetime DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `plugins`
--

INSERT INTO `plugins` (`id`, `act`, `name`, `description`, `image`, `script`, `shortcode`, `support`, `status`, `deleted_at`, `created_at`, `updated_at`) VALUES
(1, 'google-analytics', 'Google Analytics', 'Key location is shown bellow', 'google-analytics.png', '<script async src=\"https://www.googletagmanager.com/gtag/js?id={{app_key}}\"></script>\n                <script>\n                  window.dataLayer = window.dataLayer || [];\n                  function gtag(){dataLayer.push(arguments);}\n                  gtag(\"js\", new Date());\n                \n                  gtag(\"config\", \"{{app_key}}\");\n                </script>', '{\"app_key\":{\"title\":\"App Key\",\"value\":\"G-THBPV84Y86\"}}', 'ganalytics.png', 1, NULL, '2019-10-18 17:16:05', '2021-05-05 08:45:28'),
(2, 'tawk-chat', 'Tawk.to', 'Key location is shown bellow', 'tawky_big.png', '<script>\r\n                        var Tawk_API=Tawk_API||{}, Tawk_LoadStart=new Date();\r\n                        (function(){\r\n                        var s1=document.createElement(\"script\"),s0=document.getElementsByTagName(\"script\")[0];\r\n                        s1.async=true;\r\n                        s1.src=\"https://embed.tawk.to/{{app_key}}\";\r\n                        s1.charset=\"UTF-8\";\r\n                        s1.setAttribute(\"crossorigin\",\"*\");\r\n                        s0.parentNode.insertBefore(s1,s0);\r\n                        })();\r\n                    </script>', '{\"app_key\":{\"title\":\"App Key\",\"value\":\"631ac61354f06e12d893a0a6\"}}', 'twak.png', 1, NULL, '2019-10-18 17:16:05', '2022-09-09 10:03:00'),
(3, 'google-recaptcha2', 'Google Recaptcha 2', 'Key location is shown bellow', 'recaptcha3.png', '\r\n<script src=\"https://www.google.com/recaptcha/api.js\"></script>\r\n<div class=\"g-recaptcha\" data-sitekey=\"{{sitekey}}\" data-callback=\"verifyCaptcha\"></div>\r\n<div id=\"g-recaptcha-error\"></div>', '{\"sitekey\":{\"title\":\"Site Key\",\"value\":\"6Le_v54bAAAAAF-eJDXJoZ0f8qtsag-4yJOci6xF\"}}', 'recaptcha.png', 1, NULL, '2019-10-18 17:16:05', '2022-08-11 22:27:20'),
(4, 'custom-captcha', 'Custom Captcha', 'Just Put Any Random String', 'customcaptcha.png', NULL, '{\"random_key\":{\"title\":\"Random String\",\"value\":\"SecureString\"}}', 'na', 0, NULL, '2019-10-18 17:16:05', '2021-01-09 02:26:19');

-- --------------------------------------------------------

--
-- Table structure for table `purchases`
--

CREATE TABLE `purchases` (
  `id` int NOT NULL,
  `user_id` int DEFAULT NULL,
  `tile_id` int DEFAULT NULL,
  `username` varchar(200) DEFAULT NULL,
  `name` varchar(200) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci DEFAULT NULL,
  `amount` varchar(200) DEFAULT NULL,
  `quantity` float NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `purchases`
--

INSERT INTO `purchases` (`id`, `user_id`, `tile_id`, `username`, `name`, `amount`, `quantity`, `created_at`, `updated_at`) VALUES
(11, NULL, 2, 'abdulbasit', 'Orange', '230', 0, '2022-11-28 02:53:27', '2022-11-28 02:53:27'),
(12, NULL, 2, 'alisd', 'Orange', '230', 0, '2022-11-28 03:57:38', '2022-11-28 03:57:38'),
(13, NULL, 3, 'alisd', 'Cola', '99', 0, '2022-11-28 05:06:19', '2022-11-28 05:06:19'),
(14, NULL, 3, 'alisd', 'Cola', '99', 0, '2022-11-28 05:09:22', '2022-11-28 05:09:22'),
(15, NULL, 3, 'alisd', 'Cola', '99', 0, '2022-11-28 05:09:43', '2022-11-28 05:09:43'),
(16, NULL, 3, 'alisd', 'Cola', '99', 0, '2022-11-28 05:15:16', '2022-11-28 05:15:16'),
(17, NULL, 3, 'alisd', 'Cola', '99', 0, '2022-11-28 05:15:29', '2022-11-28 05:15:29'),
(18, NULL, 3, 'alisd', 'Cola', '99', 0, '2022-11-28 05:35:29', '2022-11-28 05:35:29'),
(19, NULL, 3, 'wassifali', 'Cola', '99', 0, '2022-11-28 05:40:06', '2022-11-28 05:40:06'),
(20, NULL, 3, 'wassifali', 'Cola', '99', 0, '2022-11-28 05:40:25', '2022-11-28 05:40:25'),
(21, NULL, 3, 'wassifali', 'Cola', '99', 0, '2022-11-28 05:42:09', '2022-11-28 05:42:09'),
(22, NULL, 3, 'wassifali', 'Cola', '99', 0, '2022-11-28 08:03:04', '2022-11-28 08:03:04'),
(23, NULL, 3, 'kpaul007', 'Cola', '99', 0, '2022-12-07 03:20:22', '2022-12-07 03:20:22'),
(24, NULL, 2, 'kpaul007', 'Orange', '690', 3, '2022-12-15 03:59:23', '2022-12-15 03:59:23'),
(25, NULL, 13, 'kpaul007', 'qwerty', '111', 2, '2022-12-15 05:24:10', '2022-12-15 05:24:10'),
(26, NULL, 13, 'kpaul007', 'qwerty', '111,6', 2, '2022-12-15 05:26:14', '2022-12-15 05:26:14'),
(27, NULL, 13, 'kpaul007', 'qwerty', '111,6', 2, '2022-12-15 05:29:18', '2022-12-15 05:29:18'),
(39, NULL, 14, '21', 'Red', '1,5', 1, '2023-01-12 07:33:10', '2023-01-12 07:33:10'),
(40, NULL, 14, '22', 'Red', '3', 2, '2023-01-12 07:33:19', '2023-01-12 07:33:19'),
(41, NULL, 14, '23', 'Red', '4,5', 3, '2023-01-12 07:33:27', '2023-01-12 07:33:27'),
(42, NULL, 14, '21', 'Red', '6', 4, '2023-01-12 07:35:09', '2023-01-12 07:35:09');

-- --------------------------------------------------------

--
-- Table structure for table `referrals`
--

CREATE TABLE `referrals` (
  `id` int UNSIGNED NOT NULL,
  `level` int NOT NULL,
  `percent` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` int NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `referrals`
--

INSERT INTO `referrals` (`id`, `level`, `percent`, `status`, `created_at`, `updated_at`) VALUES
(1, 1, '3', 1, '2022-08-22 20:07:20', '2022-08-22 20:07:20'),
(2, 2, '1', 1, '2022-08-22 20:07:20', '2022-08-22 20:07:20'),
(3, 3, '1', 1, '2022-08-22 20:07:20', '2022-08-22 20:07:20');

-- --------------------------------------------------------

--
-- Table structure for table `subscribers`
--

CREATE TABLE `subscribers` (
  `id` int UNSIGNED NOT NULL,
  `email` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `support_attachments`
--

CREATE TABLE `support_attachments` (
  `id` int UNSIGNED NOT NULL,
  `support_message_id` int NOT NULL,
  `image` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `support_messages`
--

CREATE TABLE `support_messages` (
  `id` int UNSIGNED NOT NULL,
  `supportticket_id` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `admin_id` int NOT NULL DEFAULT '0',
  `message` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `support_messages`
--

INSERT INTO `support_messages` (`id`, `supportticket_id`, `admin_id`, `message`, `created_at`, `updated_at`) VALUES
(1, '1', 0, 'sdv sdv jsd vlsdk vsd sldk vvsd ls vdsdv', '2022-10-10 16:29:54', '2022-10-10 16:29:54');

-- --------------------------------------------------------

--
-- Table structure for table `support_tickets`
--

CREATE TABLE `support_tickets` (
  `id` int UNSIGNED NOT NULL,
  `user_id` int UNSIGNED DEFAULT NULL,
  `name` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'NULL',
  `email` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'NULL',
  `ticket` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `subject` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` int NOT NULL DEFAULT '1',
  `last_reply` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `support_tickets`
--

INSERT INTO `support_tickets` (`id`, `user_id`, `name`, `email`, `ticket`, `subject`, `status`, `last_reply`, `created_at`, `updated_at`) VALUES
(1, 1, 'abdul basit', 'abdulbasit3398@gmail.com', '177885', 'sample ticket', 0, '2022-10-10 16:29:54', '2022-10-10 16:29:54', '2022-10-10 16:29:54');

-- --------------------------------------------------------

--
-- Table structure for table `test`
--

CREATE TABLE `test` (
  `id` int NOT NULL,
  `data` text
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- --------------------------------------------------------

--
-- Table structure for table `tiles`
--

CREATE TABLE `tiles` (
  `id` int NOT NULL,
  `name` varchar(200) NOT NULL,
  `price` varchar(200) NOT NULL,
  `image` varchar(200) DEFAULT NULL,
  `description` longtext,
  `created_at` timestamp NOT NULL,
  `updated_at` timestamp NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `tiles`
--

INSERT INTO `tiles` (`id`, `name`, `price`, `image`, `description`, `created_at`, `updated_at`) VALUES
(14, 'Red', '1,5', '63bfe3112169a1673519889.jpg', 'abc', '2023-01-12 05:38:13', '2023-01-12 05:38:13'),
(21, 'asdsd', '1.5', '63bfe8bfb2ef91673521343.png', 'sad', '2023-01-12 06:02:24', '2023-01-12 06:02:24');

-- --------------------------------------------------------

--
-- Table structure for table `time_settings`
--

CREATE TABLE `time_settings` (
  `id` int UNSIGNED NOT NULL,
  `name` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `time` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `time_settings`
--

INSERT INTO `time_settings` (`id`, `name`, `time`, `created_at`, `updated_at`) VALUES
(5, 'Monthly', '730', '2018-12-05 00:54:59', '2022-08-25 22:23:33'),
(6, 'Years', '8760', '2018-12-05 00:55:17', '2021-07-10 00:58:57'),
(7, 'Per Hr', '1', '2022-08-25 22:18:40', '2022-08-25 22:22:43'),
(8, 'Daily', '24', '2022-08-25 22:19:04', '2022-08-25 22:19:04'),
(9, 'Quarterly', '2190', '2022-08-25 22:21:13', '2022-08-25 22:21:13'),
(10, 'Semi-Annual', '4380', '2022-08-25 22:26:38', '2022-08-25 22:26:38');

-- --------------------------------------------------------

--
-- Table structure for table `trxes`
--

CREATE TABLE `trxes` (
  `id` bigint UNSIGNED NOT NULL,
  `user_id` int DEFAULT NULL,
  `amount` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `charge` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `trx_type` varchar(10) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `details` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `remark` varchar(91) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `trx` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `post_balance` decimal(18,8) DEFAULT '0.00000000',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `trxes`
--

INSERT INTO `trxes` (`id`, `user_id`, `amount`, `charge`, `trx_type`, `details`, `remark`, `trx`, `post_balance`, `created_at`, `updated_at`) VALUES
(1, 1, '5000.00000000', '95', '+', 'Deposit Via Stripe', 'deposit', 'CYJ3N5AJJEQV', '5000.00000000', '2022-09-07 23:01:56', '2022-09-07 23:01:56'),
(2, 1, '500', '0', '-', 'Invested On Sample Plan', 'invest', 'ZN1HOG52U4Q2', '4500.00000000', '2022-09-07 23:22:37', '2022-09-07 23:22:37'),
(3, 1, '1000', '0', '-', 'Invested On saasdasd', 'invest', 'SHQXP2F6SGF8', '3500.00000000', '2022-09-08 01:50:25', '2022-09-08 01:50:25'),
(4, 1, '20.00', '0', '+', 'Interest Return 20.00 USD Added on Your interest wallet Balance', 'interest', 'ABSS2HQKPHBE', '20.00000000', '2022-09-08 03:00:01', '2022-09-08 03:00:01'),
(5, 1, '20.00', '0', '+', 'Interest Return 20.00 USD Added on Your interest wallet Balance', 'interest', 'SH81GDXT3373', '40.00000000', '2022-09-08 04:00:01', '2022-09-08 04:00:01'),
(6, 1, '20.00', '0', '+', 'Interest Return 20.00 USD Added on Your interest wallet Balance', 'interest', 'U6ECB3PYP94T', '60.00000000', '2022-09-08 05:00:02', '2022-09-08 05:00:02'),
(7, 1, '20.00', '0', '+', 'Interest Return 20.00 USD Added on Your interest wallet Balance', 'interest', 'DOWJG3Y1PB5H', '80.00000000', '2022-09-08 06:30:01', '2022-09-08 06:30:01'),
(8, 1, '20.00', '0', '+', 'Interest Return 20.00 USD Added on Your interest wallet Balance', 'interest', 'JRSTENNY1ZE2', '100.00000000', '2022-09-08 07:30:01', '2022-09-08 07:30:01'),
(9, 1, '20.00', '0', '+', 'Interest Return 20.00 USD Added on Your interest wallet Balance', 'interest', '3T918QOKGT2Q', '120.00000000', '2022-09-08 08:30:01', '2022-09-08 08:30:01'),
(10, 1, '20.00', '0', '+', 'Interest Return 20.00 USD Added on Your interest wallet Balance', 'interest', 'FY5GJ444Q9AG', '140.00000000', '2022-09-08 09:30:02', '2022-09-08 09:30:02'),
(11, 1, '20.00', '0', '+', 'Interest Return 20.00 USD Added on Your interest wallet Balance', 'interest', 'UD2HU5O8V5XQ', '160.00000000', '2022-09-08 10:30:02', '2022-09-08 10:30:02'),
(12, 1, '20.00', '0', '+', 'Interest Return 20.00 USD Added on Your interest wallet Balance', 'interest', 'C1BBB9AKOEZ6', '180.00000000', '2022-09-08 12:00:01', '2022-09-08 12:00:01'),
(13, 1, '20.00', '0', '+', 'Interest Return 20.00 USD Added on Your interest wallet Balance', 'interest', 'DB8EQ8JASJCY', '200.00000000', '2022-09-08 13:00:01', '2022-09-08 13:00:01'),
(14, 1, '20.00', '0', '+', 'Interest Return 20.00 USD Added on Your interest wallet Balance', 'interest', '2OWYKFSCBRPG', '220.00000000', '2022-09-08 14:00:02', '2022-09-08 14:00:02'),
(15, 1, '20.00', '0', '+', 'Interest Return 20.00 USD Added on Your interest wallet Balance', 'interest', '2MA6NCH7HDHN', '240.00000000', '2022-09-08 15:30:01', '2022-09-08 15:30:01'),
(16, 1, '20.00', '0', '+', 'Interest Return 20.00 USD Added on Your interest wallet Balance', 'interest', 'JM4YJKE6FSGB', '260.00000000', '2022-09-08 16:30:02', '2022-09-08 16:30:02'),
(17, 1, '20.00', '0', '+', 'Interest Return 20.00 USD Added on Your interest wallet Balance', 'interest', 'RBZYVAXG9YKT', '280.00000000', '2022-09-08 17:30:02', '2022-09-08 17:30:02'),
(18, 1, '20.00', '0', '+', 'Interest Return 20.00 USD Added on Your interest wallet Balance', 'interest', 'A3SC4EFZ1VMZ', '300.00000000', '2022-09-08 19:00:01', '2022-09-08 19:00:01'),
(19, 1, '20.00', '0', '+', 'Interest Return 20.00 USD Added on Your interest wallet Balance', 'interest', 'B2C7Y7ESGWCZ', '320.00000000', '2022-09-08 20:00:01', '2022-09-08 20:00:01'),
(20, 1, '20.00', '0', '+', 'Interest Return 20.00 USD Added on Your interest wallet Balance', 'interest', 'FGP9XCV62R3O', '340.00000000', '2022-09-08 21:00:01', '2022-09-08 21:00:01'),
(21, 1, '20.00', '0', '+', 'Interest Return 20.00 USD Added on Your interest wallet Balance', 'interest', 'WG13XPRQK1EF', '360.00000000', '2022-09-08 22:00:01', '2022-09-08 22:00:01'),
(22, 1, '20.00', '0', '+', 'Interest Return 20.00 USD Added on Your interest wallet Balance', 'interest', '67XBW8JFFUOZ', '380.00000000', '2022-09-08 23:00:01', '2022-09-08 23:00:01'),
(23, 1, '2.50', '0', '+', 'Interest Return 2.50 USD Added on Your interest wallet Wallet', 'interest', 'TOOTC38GFFU4', '382.50000000', '2022-09-08 23:30:01', '2022-09-08 23:30:01'),
(24, 1, '20.00', '0', '+', 'Interest Return 20.00 USD Added on Your interest wallet Balance', 'interest', 'V4AYYOOYSEKP', '402.50000000', '2022-09-09 00:00:01', '2022-09-09 00:00:01'),
(25, 1, '20.00', '0', '+', 'Interest Return 20.00 USD Added on Your interest wallet Balance', 'interest', '4SZ2PRSDKKR7', '422.50000000', '2022-09-09 01:00:01', '2022-09-09 01:00:01'),
(26, 1, '5000.00000000', '95', '+', 'Deposit Via Stripe', 'deposit', '6ZZ3MXQVEKFU', '8500.00000000', '2022-09-09 01:31:20', '2022-09-09 01:31:20'),
(27, 1, '20.00', '0', '+', 'Interest Return 20.00 USD Added on Your interest wallet Balance', 'interest', 'ZXKWC8DG3KSE', '442.50000000', '2022-09-09 02:00:01', '2022-09-09 02:00:01'),
(28, 1, '20.00', '0', '+', 'Interest Return 20.00 USD Added on Your interest wallet Balance', 'interest', '6W6CHW8EU8ES', '462.50000000', '2022-09-09 03:00:01', '2022-09-09 03:00:01'),
(29, 1, '20.00', '0', '+', 'Interest Return 20.00 USD Added on Your interest wallet Balance', 'interest', 'N64RWJ5D37AE', '482.50000000', '2022-09-09 04:00:01', '2022-09-09 04:00:01'),
(30, 1, '20.00', '0', '+', 'Interest Return 20.00 USD Added on Your interest wallet Balance', 'interest', 'VSCQ5O6K7V1R', '502.50000000', '2022-09-09 05:00:02', '2022-09-09 05:00:02'),
(31, 1, '20.00', '0', '+', 'Interest Return 20.00 USD Added on Your interest wallet Balance', 'interest', 'UTS1B4W9J758', '522.50000000', '2022-09-09 06:30:02', '2022-09-09 06:30:02'),
(32, 1, '20.00', '0', '+', 'Interest Return 20.00 USD Added on Your interest wallet Balance', 'interest', 'AQJHOEU9VZVB', '542.50000000', '2022-09-09 08:00:01', '2022-09-09 08:00:01'),
(33, 1, '20.00', '0', '+', 'Interest Return 20.00 USD Added on Your interest wallet Balance', 'interest', 'HJUBGQAPTBQN', '562.50000000', '2022-09-09 09:00:01', '2022-09-09 09:00:01'),
(34, 1, '20.00', '0', '+', 'Interest Return 20.00 USD Added on Your interest wallet Balance', 'interest', 'YEH1STU7Q2X9', '582.50000000', '2022-09-09 10:00:01', '2022-09-09 10:00:01'),
(35, 1, '20.00', '0', '+', 'Interest Return 20.00 USD Added on Your interest wallet Balance', 'interest', 'NOPD3567EF3D', '602.50000000', '2022-09-09 11:00:01', '2022-09-09 11:00:01'),
(36, 1, '20.00', '0', '+', 'Interest Return 20.00 USD Added on Your interest wallet Balance', 'interest', 'KPNEZQNXWEMH', '622.50000000', '2022-09-09 12:00:02', '2022-09-09 12:00:02'),
(37, 1, '20.00', '0', '+', 'Interest Return 20.00 USD Added on Your interest wallet Balance', 'interest', 'XENOFQOKUDYX', '642.50000000', '2022-09-09 13:00:02', '2022-09-09 13:00:02'),
(38, 1, '20.00', '0', '+', 'Interest Return 20.00 USD Added on Your interest wallet Balance', 'interest', '75U4CKB4NH7Q', '662.50000000', '2022-09-09 14:30:01', '2022-09-09 14:30:01'),
(39, 1, '20.00', '0', '+', 'Interest Return 20.00 USD Added on Your interest wallet Balance', 'interest', 'HWZQDBUKXRNH', '682.50000000', '2022-09-09 15:30:01', '2022-09-09 15:30:01'),
(40, 1, '20.00', '0', '+', 'Interest Return 20.00 USD Added on Your interest wallet Balance', 'interest', '3URFW95JDZVR', '702.50000000', '2022-09-09 16:30:01', '2022-09-09 16:30:01'),
(41, 1, '20.00', '0', '+', 'Interest Return 20.00 USD Added on Your interest wallet Balance', 'interest', 'TFO3M8ZXN4VD', '722.50000000', '2022-09-09 17:30:01', '2022-09-09 17:30:01'),
(42, 1, '20.00', '0', '+', 'Interest Return 20.00 USD Added on Your interest wallet Balance', 'interest', 'QC2K6MH2ZZ41', '742.50000000', '2022-09-09 18:30:01', '2022-09-09 18:30:01'),
(43, 1, '20.00', '0', '+', 'Interest Return 20.00 USD Added on Your interest wallet Balance', 'interest', 'N7V47UVWDRHQ', '762.50000000', '2022-09-09 19:30:01', '2022-09-09 19:30:01'),
(44, 1, '20.00', '0', '+', 'Interest Return 20.00 USD Added on Your interest wallet Balance', 'interest', 'BYZPONAEBET6', '782.50000000', '2022-09-09 20:30:01', '2022-09-09 20:30:01'),
(45, 1, '20.00', '0', '+', 'Interest Return 20.00 USD Added on Your interest wallet Balance', 'interest', '4K4D361GE864', '802.50000000', '2022-09-09 21:30:01', '2022-09-09 21:30:01'),
(46, 1, '20.00', '0', '+', 'Interest Return 20.00 USD Added on Your interest wallet Balance', 'interest', 'VX1NPPPUCKW4', '822.50000000', '2022-09-09 22:30:01', '2022-09-09 22:30:01'),
(47, 1, '2.50', '0', '+', 'Interest Return 2.50 USD Added on Your interest wallet Wallet', 'interest', 'FRDF7UE1QVF1', '825.00000000', '2022-09-09 23:30:01', '2022-09-09 23:30:01'),
(48, 1, '20.00', '0', '+', 'Interest Return 20.00 USD Added on Your interest wallet Balance', 'interest', 'A5A5Z2B48TCA', '845.00000000', '2022-09-09 23:30:01', '2022-09-09 23:30:01'),
(49, 1, '20.00', '0', '+', 'Interest Return 20.00 USD Added on Your interest wallet Balance', 'interest', '27R1ZDSBG8RA', '865.00000000', '2022-09-10 00:30:01', '2022-09-10 00:30:01'),
(50, 1, '20.00', '0', '+', 'Interest Return 20.00 USD Added on Your interest wallet Balance', 'interest', 'A66W52GRO2J9', '885.00000000', '2022-09-10 01:30:01', '2022-09-10 01:30:01'),
(51, 1, '20.00', '0', '+', 'Interest Return 20.00 USD Added on Your interest wallet Balance', 'interest', 'VFMAA9A951YY', '905.00000000', '2022-09-10 02:30:02', '2022-09-10 02:30:02'),
(52, 1, '20.00', '0', '+', 'Interest Return 20.00 USD Added on Your interest wallet Balance', 'interest', 'FTF4YRPVCUST', '925.00000000', '2022-09-10 03:30:02', '2022-09-10 03:30:02'),
(53, 1, '20.00', '0', '+', 'Interest Return 20.00 USD Added on Your interest wallet Balance', 'interest', 'VT8496HZOTD9', '945.00000000', '2022-09-10 05:00:01', '2022-09-10 05:00:01'),
(54, 1, '20.00', '0', '+', 'Interest Return 20.00 USD Added on Your interest wallet Balance', 'interest', 'GY7DGO3BRCR1', '965.00000000', '2022-09-10 06:00:02', '2022-09-10 06:00:02'),
(55, 1, '20.00', '0', '+', 'Interest Return 20.00 USD Added on Your interest wallet Balance', 'interest', '4BJBRVVYFRTQ', '985.00000000', '2022-09-10 07:30:01', '2022-09-10 07:30:01'),
(56, 1, '20.00', '0', '+', 'Interest Return 20.00 USD Added on Your interest wallet Balance', 'interest', '8SWVQ575MNU7', '1005.00000000', '2022-09-10 08:30:02', '2022-09-10 08:30:02'),
(57, 1, '20.00', '0', '+', 'Interest Return 20.00 USD Added on Your interest wallet Balance', 'interest', 'NF1RVCUXEKMP', '1025.00000000', '2022-09-10 09:30:02', '2022-09-10 09:30:02'),
(58, 1, '20.00', '0', '+', 'Interest Return 20.00 USD Added on Your interest wallet Balance', 'interest', 'WMHK6HC8AYH4', '1045.00000000', '2022-09-10 10:30:02', '2022-09-10 10:30:02'),
(59, 1, '20.00', '0', '+', 'Interest Return 20.00 USD Added on Your interest wallet Balance', 'interest', 'ZZVBZP44GFP9', '1065.00000000', '2022-09-10 12:00:01', '2022-09-10 12:00:01'),
(60, 1, '20.00', '0', '+', 'Interest Return 20.00 USD Added on Your interest wallet Balance', 'interest', 'KTG6A8F322CT', '1085.00000000', '2022-09-10 13:00:01', '2022-09-10 13:00:01'),
(61, 1, '20.00', '0', '+', 'Interest Return 20.00 USD Added on Your interest wallet Balance', 'interest', 'JX9CWNSS383U', '1105.00000000', '2022-09-10 14:00:02', '2022-09-10 14:00:02'),
(62, 1, '20.00', '0', '+', 'Interest Return 20.00 USD Added on Your interest wallet Balance', 'interest', 'U84H2DT8PQOA', '1125.00000000', '2022-09-10 15:30:01', '2022-09-10 15:30:01'),
(63, 1, '20.00', '0', '+', 'Interest Return 20.00 USD Added on Your interest wallet Balance', 'interest', 'GWPJCJH5NZ2B', '1145.00000000', '2022-09-10 16:30:01', '2022-09-10 16:30:01'),
(64, 1, '20.00', '0', '+', 'Interest Return 20.00 USD Added on Your interest wallet Balance', 'interest', 'QAAENWZKA3ZK', '1165.00000000', '2022-09-10 17:30:01', '2022-09-10 17:30:01'),
(65, 1, '20.00', '0', '+', 'Interest Return 20.00 USD Added on Your interest wallet Balance', 'interest', 'C98VFHWXKE2M', '1185.00000000', '2022-09-10 18:30:01', '2022-09-10 18:30:01'),
(66, 1, '20.00', '0', '+', 'Interest Return 20.00 USD Added on Your interest wallet Balance', 'interest', '32KD6F5O1D87', '1205.00000000', '2022-09-10 19:30:01', '2022-09-10 19:30:01'),
(67, 1, '20.00', '0', '+', 'Interest Return 20.00 USD Added on Your interest wallet Balance', 'interest', '6DHPE2F97WOX', '1225.00000000', '2022-09-10 20:30:01', '2022-09-10 20:30:01'),
(68, 1, '20.00', '0', '+', 'Interest Return 20.00 USD Added on Your interest wallet Balance', 'interest', 'JKHKAV858DKV', '1245.00000000', '2022-09-10 21:30:01', '2022-09-10 21:30:01'),
(69, 1, '20.00', '0', '+', 'Interest Return 20.00 USD Added on Your interest wallet Balance', 'interest', 'JAUZCWD7HX66', '1265.00000000', '2022-09-10 22:30:01', '2022-09-10 22:30:01'),
(70, 1, '2.50', '0', '+', 'Interest Return 2.50 USD Added on Your interest wallet Wallet', 'interest', 'FZ4S7PUJX1VA', '1267.50000000', '2022-09-10 23:30:01', '2022-09-10 23:30:01'),
(71, 1, '20.00', '0', '+', 'Interest Return 20.00 USD Added on Your interest wallet Balance', 'interest', 'CT8PKM1PUH87', '1287.50000000', '2022-09-10 23:30:01', '2022-09-10 23:30:01'),
(72, 1, '20.00', '0', '+', 'Interest Return 20.00 USD Added on Your interest wallet Balance', 'interest', 'NC72SFDBEG7P', '1307.50000000', '2022-09-11 00:30:02', '2022-09-11 00:30:02'),
(73, 1, '20.00', '0', '+', 'Interest Return 20.00 USD Added on Your interest wallet Balance', 'interest', '1FK7FRRQ2XUA', '1327.50000000', '2022-09-11 02:00:01', '2022-09-11 02:00:01'),
(74, 1, '20.00', '0', '+', 'Interest Return 20.00 USD Added on Your interest wallet Balance', 'interest', 'NHFF2D7G7OTF', '1347.50000000', '2022-09-11 03:00:01', '2022-09-11 03:00:01'),
(75, 1, '20.00', '0', '+', 'Interest Return 20.00 USD Added on Your interest wallet Balance', 'interest', '6K22QNW59MDD', '1367.50000000', '2022-09-11 04:00:01', '2022-09-11 04:00:01'),
(76, 1, '20.00', '0', '+', 'Interest Return 20.00 USD Added on Your interest wallet Balance', 'interest', '6V5UMNNUS3J1', '1387.50000000', '2022-09-11 05:00:01', '2022-09-11 05:00:01'),
(77, 1, '20.00', '0', '+', 'Interest Return 20.00 USD Added on Your interest wallet Balance', 'interest', '1B3PSJ8T44FU', '1407.50000000', '2022-09-11 06:00:01', '2022-09-11 06:00:01'),
(78, 1, '20.00', '0', '+', 'Interest Return 20.00 USD Added on Your interest wallet Balance', 'interest', 'ZUGDPKJHUBW5', '1427.50000000', '2022-09-11 07:00:01', '2022-09-11 07:00:01'),
(79, 1, '20.00', '0', '+', 'Interest Return 20.00 USD Added on Your interest wallet Balance', 'interest', 'ZGZ8YN3XCG27', '1447.50000000', '2022-09-11 08:00:02', '2022-09-11 08:00:02'),
(80, 1, '20.00', '0', '+', 'Interest Return 20.00 USD Added on Your interest wallet Balance', 'interest', 'QR8357DHWHMZ', '1467.50000000', '2022-09-11 09:30:01', '2022-09-11 09:30:01'),
(81, 1, '20.00', '0', '+', 'Interest Return 20.00 USD Added on Your interest wallet Balance', 'interest', 'HK9CY289WS5H', '1487.50000000', '2022-09-11 10:30:01', '2022-09-11 10:30:01'),
(82, 1, '20.00', '0', '+', 'Interest Return 20.00 USD Added on Your interest wallet Balance', 'interest', 'BHASTUMVTK3J', '1507.50000000', '2022-09-11 11:30:01', '2022-09-11 11:30:01'),
(83, 1, '20.00', '0', '+', 'Interest Return 20.00 USD Added on Your interest wallet Balance', 'interest', 'CUT5H19SEQY5', '1527.50000000', '2022-09-11 12:30:02', '2022-09-11 12:30:02'),
(84, 1, '20.00', '0', '+', 'Interest Return 20.00 USD Added on Your interest wallet Balance', 'interest', 'MPDJXPBQ99KT', '1547.50000000', '2022-09-11 14:00:01', '2022-09-11 14:00:01'),
(85, 1, '20.00', '0', '+', 'Interest Return 20.00 USD Added on Your interest wallet Balance', 'interest', 'WHCT1G99U6VZ', '1567.50000000', '2022-09-11 15:00:01', '2022-09-11 15:00:01'),
(86, 1, '20.00', '0', '+', 'Interest Return 20.00 USD Added on Your interest wallet Balance', 'interest', 'UGDN94572UGU', '1587.50000000', '2022-09-11 16:00:01', '2022-09-11 16:00:01'),
(87, 1, '20.00', '0', '+', 'Interest Return 20.00 USD Added on Your interest wallet Balance', 'interest', 'M1R4OUXFUQR6', '1607.50000000', '2022-09-11 17:00:01', '2022-09-11 17:00:01'),
(88, 1, '20.00', '0', '+', 'Interest Return 20.00 USD Added on Your interest wallet Balance', 'interest', '79OA5HRRQW9C', '1627.50000000', '2022-09-11 18:00:02', '2022-09-11 18:00:02'),
(89, 1, '20.00', '0', '+', 'Interest Return 20.00 USD Added on Your interest wallet Balance', 'interest', 'B1R4DQQK822M', '1647.50000000', '2022-09-11 19:30:01', '2022-09-11 19:30:01'),
(90, 1, '20.00', '0', '+', 'Interest Return 20.00 USD Added on Your interest wallet Balance', 'interest', 'JOY3BGM1YNQC', '1667.50000000', '2022-09-11 20:30:01', '2022-09-11 20:30:01'),
(91, 1, '20.00', '0', '+', 'Interest Return 20.00 USD Added on Your interest wallet Balance', 'interest', '39NA5HA84QW8', '1687.50000000', '2022-09-11 21:30:01', '2022-09-11 21:30:01'),
(92, 1, '20.00', '0', '+', 'Interest Return 20.00 USD Added on Your interest wallet Balance', 'interest', 'CGAKUR1DZEBW', '1707.50000000', '2022-09-11 22:30:01', '2022-09-11 22:30:01'),
(93, 1, '2.50', '0', '+', 'Interest Return 2.50 USD Added on Your interest wallet Wallet', 'interest', 'N1C33FYG1XFQ', '1710.00000000', '2022-09-11 23:30:01', '2022-09-11 23:30:01'),
(94, 1, '20.00', '0', '+', 'Interest Return 20.00 USD Added on Your interest wallet Balance', 'interest', 'TWJYP2J6JQAA', '1730.00000000', '2022-09-11 23:30:01', '2022-09-11 23:30:01'),
(95, 1, '20.00', '0', '+', 'Interest Return 20.00 USD Added on Your interest wallet Balance', 'interest', 'OSCNW5OJG18Y', '1750.00000000', '2022-09-12 00:30:01', '2022-09-12 00:30:01'),
(96, 1, '20.00', '0', '+', 'Interest Return 20.00 USD Added on Your interest wallet Balance', 'interest', 'TRND3UX91UJA', '1770.00000000', '2022-09-12 01:30:01', '2022-09-12 01:30:01'),
(97, 1, '20.00', '0', '+', 'Interest Return 20.00 USD Added on Your interest wallet Balance', 'interest', '416BS1F6Y7OG', '1790.00000000', '2022-09-12 02:30:01', '2022-09-12 02:30:01'),
(98, 1, '20.00', '0', '+', 'Interest Return 20.00 USD Added on Your interest wallet Balance', 'interest', 'BAFQZJUPEH62', '1810.00000000', '2022-09-12 03:30:01', '2022-09-12 03:30:01'),
(99, 1, '20.00', '0', '+', 'Interest Return 20.00 USD Added on Your interest wallet Balance', 'interest', 'J6ECRTP4152T', '1830.00000000', '2022-09-12 04:30:01', '2022-09-12 04:30:01'),
(100, 1, '20.00', '0', '+', 'Interest Return 20.00 USD Added on Your interest wallet Balance', 'interest', 'RBDBHTPO7U2V', '1850.00000000', '2022-09-12 05:30:01', '2022-09-12 05:30:01'),
(101, 1, '20.00', '0', '+', 'Interest Return 20.00 USD Added on Your interest wallet Balance', 'interest', '9O7HZF33W1UY', '1870.00000000', '2022-09-12 06:30:02', '2022-09-12 06:30:02'),
(102, 1, '20.00', '0', '+', 'Interest Return 20.00 USD Added on Your interest wallet Balance', 'interest', 'ABDUDUCVG32Q', '1890.00000000', '2022-09-12 08:00:01', '2022-09-12 08:00:01'),
(103, 1, '20.00', '0', '+', 'Interest Return 20.00 USD Added on Your interest wallet Balance', 'interest', 'PTEQYBVUHZ6Y', '1910.00000000', '2022-09-12 09:00:01', '2022-09-12 09:00:01'),
(104, 1, '20.00', '0', '+', 'Interest Return 20.00 USD Added on Your interest wallet Balance', 'interest', 'TKO4NH6Y4XKN', '1930.00000000', '2022-09-12 10:00:02', '2022-09-12 10:00:02'),
(105, 1, '20.00', '0', '+', 'Interest Return 20.00 USD Added on Your interest wallet Balance', 'interest', 'UTPFKG718N38', '1950.00000000', '2022-09-12 11:30:01', '2022-09-12 11:30:01'),
(106, 1, '20.00', '0', '+', 'Interest Return 20.00 USD Added on Your interest wallet Balance', 'interest', 'QQASDYF71GYE', '1970.00000000', '2022-09-12 12:30:01', '2022-09-12 12:30:01'),
(107, 1, '20.00', '0', '+', 'Interest Return 20.00 USD Added on Your interest wallet Balance', 'interest', 'AJWGM88WSHKD', '1990.00000000', '2022-09-12 13:30:01', '2022-09-12 13:30:01'),
(108, 1, '20.00', '0', '+', 'Interest Return 20.00 USD Added on Your interest wallet Balance', 'interest', '2HHH5T9GV86G', '2010.00000000', '2022-09-12 14:30:01', '2022-09-12 14:30:01'),
(109, 1, '20.00', '0', '+', 'Interest Return 20.00 USD Added on Your interest wallet Balance', 'interest', 'YQFQTYODFKZE', '2030.00000000', '2022-09-12 15:30:01', '2022-09-12 15:30:01'),
(110, 1, '20.00', '0', '+', 'Interest Return 20.00 USD Added on Your interest wallet Balance', 'interest', 'RMV1OT7OE84F', '2050.00000000', '2022-09-12 16:30:01', '2022-09-12 16:30:01'),
(111, 1, '20.00', '0', '+', 'Interest Return 20.00 USD Added on Your interest wallet Balance', 'interest', 'WDX382VRSAFA', '2070.00000000', '2022-09-12 17:30:01', '2022-09-12 17:30:01'),
(112, 1, '20.00', '0', '+', 'Interest Return 20.00 USD Added on Your interest wallet Balance', 'interest', '7VZAJFEM5P1Q', '2090.00000000', '2022-09-12 18:30:01', '2022-09-12 18:30:01'),
(113, 1, '20.00', '0', '+', 'Interest Return 20.00 USD Added on Your interest wallet Balance', 'interest', 'S6H31HMNUXNR', '2110.00000000', '2022-09-12 19:30:01', '2022-09-12 19:30:01'),
(114, 1, '20.00', '0', '+', 'Interest Return 20.00 USD Added on Your interest wallet Balance', 'interest', 'US1OWNQ1BJGT', '2130.00000000', '2022-09-12 20:30:01', '2022-09-12 20:30:01'),
(115, 1, '20.00', '0', '+', 'Interest Return 20.00 USD Added on Your interest wallet Balance', 'interest', 'Y5JR3SXNMM3K', '2150.00000000', '2022-09-12 21:30:02', '2022-09-12 21:30:02'),
(116, 1, '20.00', '0', '+', 'Interest Return 20.00 USD Added on Your interest wallet Balance', 'interest', '21JUWAOPSGX5', '2170.00000000', '2022-09-12 23:00:01', '2022-09-12 23:00:01'),
(117, 1, '2.50', '0', '+', 'Interest Return 2.50 USD Added on Your interest wallet Wallet', 'interest', 'S18FKXG51NAN', '2172.50000000', '2022-09-12 23:30:02', '2022-09-12 23:30:02'),
(118, 1, '20.00', '0', '+', 'Interest Return 20.00 USD Added on Your interest wallet Balance', 'interest', 'AJXU89UNJF2P', '2192.50000000', '2022-09-13 00:00:01', '2022-09-13 00:00:01'),
(119, 1, '20.00', '0', '+', 'Interest Return 20.00 USD Added on Your interest wallet Balance', 'interest', 'C32AKNX8QR5A', '2212.50000000', '2022-09-13 01:00:02', '2022-09-13 01:00:02'),
(120, 1, '20.00', '0', '+', 'Interest Return 20.00 USD Added on Your interest wallet Balance', 'interest', '3MDXYXADWY5H', '2232.50000000', '2022-09-13 02:30:01', '2022-09-13 02:30:01'),
(121, 1, '20.00', '0', '+', 'Interest Return 20.00 USD Added on Your interest wallet Balance', 'interest', 'P9OGJB2S5XCM', '2252.50000000', '2022-09-13 03:30:01', '2022-09-13 03:30:01'),
(122, 1, '20.00', '0', '+', 'Interest Return 20.00 USD Added on Your interest wallet Balance', 'interest', 'TOVV9B4TNDZS', '2272.50000000', '2022-09-13 04:30:01', '2022-09-13 04:30:01'),
(123, 1, '20.00', '0', '+', 'Interest Return 20.00 USD Added on Your interest wallet Balance', 'interest', '2EPXCO8H1AD6', '2292.50000000', '2022-09-13 05:30:01', '2022-09-13 05:30:01'),
(124, 1, '20.00', '0', '+', 'Interest Return 20.00 USD Added on Your interest wallet Balance', 'interest', 'EJJQFQGOPGF3', '2312.50000000', '2022-09-13 06:30:01', '2022-09-13 06:30:01'),
(125, 1, '20.00', '0', '+', 'Interest Return 20.00 USD Added on Your interest wallet Balance', 'interest', '6O9YH3JKRQWM', '2332.50000000', '2022-09-13 07:30:01', '2022-09-13 07:30:01'),
(126, 1, '20.00', '0', '+', 'Interest Return 20.00 USD Added on Your interest wallet Balance', 'interest', 'WXP13BGUOMVR', '2352.50000000', '2022-09-13 08:30:01', '2022-09-13 08:30:01'),
(127, 1, '20.00', '0', '+', 'Interest Return 20.00 USD Added on Your interest wallet Balance', 'interest', '7GNWYN2GPXMD', '2372.50000000', '2022-09-13 09:30:01', '2022-09-13 09:30:01'),
(128, 1, '20.00', '0', '+', 'Interest Return 20.00 USD Added on Your interest wallet Balance', 'interest', 'XAJ27OU3KERC', '2392.50000000', '2022-09-13 10:30:01', '2022-09-13 10:30:01'),
(129, 1, '20.00', '0', '+', 'Interest Return 20.00 USD Added on Your interest wallet Balance', 'interest', 'KHF21PW4PEY1', '2412.50000000', '2022-09-13 11:30:02', '2022-09-13 11:30:02'),
(130, 1, '20.00', '0', '+', 'Interest Return 20.00 USD Added on Your interest wallet Balance', 'interest', 'AVXSC3Y1ATJS', '2432.50000000', '2022-09-13 13:00:01', '2022-09-13 13:00:01'),
(131, 1, '20.00', '0', '+', 'Interest Return 20.00 USD Added on Your interest wallet Balance', 'interest', 'AEUC9QVWA1NN', '2452.50000000', '2022-09-13 14:00:02', '2022-09-13 14:00:02'),
(132, 1, '20.00', '0', '+', 'Interest Return 20.00 USD Added on Your interest wallet Balance', 'interest', 'ST247H4N283B', '2472.50000000', '2022-09-13 15:00:02', '2022-09-13 15:00:02'),
(133, 1, '20.00', '0', '+', 'Interest Return 20.00 USD Added on Your interest wallet Balance', 'interest', 'CZXR16E14CY1', '2492.50000000', '2022-09-13 16:30:02', '2022-09-13 16:30:02'),
(134, 1, '20.00', '0', '+', 'Interest Return 20.00 USD Added on Your interest wallet Balance', 'interest', 'NDSMPYQ9VCGO', '2512.50000000', '2022-09-13 17:30:01', '2022-09-13 17:30:01'),
(135, 1, '20.00', '0', '+', 'Interest Return 20.00 USD Added on Your interest wallet Balance', 'interest', 'HPB6XOQCK436', '2532.50000000', '2022-09-13 18:30:01', '2022-09-13 18:30:01'),
(136, 1, '20.00', '0', '+', 'Interest Return 20.00 USD Added on Your interest wallet Balance', 'interest', '2RWJXUJONRWD', '2552.50000000', '2022-09-13 19:30:01', '2022-09-13 19:30:01'),
(137, 1, '20.00', '0', '+', 'Interest Return 20.00 USD Added on Your interest wallet Balance', 'interest', 'YHEP85FGAU62', '2572.50000000', '2022-09-13 20:30:01', '2022-09-13 20:30:01'),
(138, 1, '20.00', '0', '+', 'Interest Return 20.00 USD Added on Your interest wallet Balance', 'interest', 'K6ZCM2XAJWV9', '2592.50000000', '2022-09-13 21:30:02', '2022-09-13 21:30:02'),
(139, 1, '20.00', '0', '+', 'Interest Return 20.00 USD Added on Your interest wallet Balance', 'interest', 'OMGWGRONFGFX', '2612.50000000', '2022-09-13 22:30:02', '2022-09-13 22:30:02'),
(140, 1, '2.50', '0', '+', 'Interest Return 2.50 USD Added on Your interest wallet Wallet', 'interest', 'NR8QVTYXGZR1', '2615.00000000', '2022-09-14 00:00:01', '2022-09-14 00:00:01'),
(141, 1, '20.00', '0', '+', 'Interest Return 20.00 USD Added on Your interest wallet Balance', 'interest', 'A627KRQG1YKO', '2635.00000000', '2022-09-14 00:00:01', '2022-09-14 00:00:01'),
(142, 1, '20.00', '0', '+', 'Interest Return 20.00 USD Added on Your interest wallet Balance', 'interest', 'P4CDMZ1JC69G', '2655.00000000', '2022-09-14 01:00:01', '2022-09-14 01:00:01'),
(143, 1, '20.00', '0', '+', 'Interest Return 20.00 USD Added on Your interest wallet Balance', 'interest', 'XS1EGRP79PSW', '2675.00000000', '2022-09-14 02:00:01', '2022-09-14 02:00:01'),
(144, 1, '20.00', '0', '+', 'Interest Return 20.00 USD Added on Your interest wallet Balance', 'interest', 'WEFNDM8MS2G6', '2695.00000000', '2022-09-14 03:00:01', '2022-09-14 03:00:01'),
(145, 1, '20.00', '0', '+', 'Interest Return 20.00 USD Added on Your interest wallet Balance', 'interest', 'G7Z94YWZEWTN', '2715.00000000', '2022-09-14 04:00:01', '2022-09-14 04:00:01'),
(146, 1, '20.00', '0', '+', 'Interest Return 20.00 USD Added on Your interest wallet Balance', 'interest', 'MYTYW826FSEF', '2735.00000000', '2022-09-14 05:00:01', '2022-09-14 05:00:01'),
(147, 1, '20.00', '0', '+', 'Interest Return 20.00 USD Added on Your interest wallet Balance', 'interest', 'ME5AK6H8GHPY', '2755.00000000', '2022-09-14 06:00:02', '2022-09-14 06:00:02'),
(148, 1, '20.00', '0', '+', 'Interest Return 20.00 USD Added on Your interest wallet Balance', 'interest', 'TVJXXP15DDAM', '2775.00000000', '2022-09-14 07:30:01', '2022-09-14 07:30:01'),
(149, 1, '20.00', '0', '+', 'Interest Return 20.00 USD Added on Your interest wallet Balance', 'interest', 'VV6P6J9F6TRV', '2795.00000000', '2022-09-14 08:30:01', '2022-09-14 08:30:01'),
(150, 1, '20.00', '0', '+', 'Interest Return 20.00 USD Added on Your interest wallet Balance', 'interest', '4FGFAS4JVVDP', '2815.00000000', '2022-09-14 09:30:01', '2022-09-14 09:30:01'),
(151, 1, '20.00', '0', '+', 'Interest Return 20.00 USD Added on Your interest wallet Balance', 'interest', 'NUKKYEJPNYSU', '2835.00000000', '2022-09-14 10:30:02', '2022-09-14 10:30:02'),
(152, 1, '20.00', '0', '+', 'Interest Return 20.00 USD Added on Your interest wallet Balance', 'interest', 'W3JOCEQ6J3S6', '2855.00000000', '2022-09-14 12:00:01', '2022-09-14 12:00:01'),
(153, 1, '20.00', '0', '+', 'Interest Return 20.00 USD Added on Your interest wallet Balance', 'interest', '8O93XQAXHN2Y', '2875.00000000', '2022-09-14 13:00:02', '2022-09-14 13:00:02'),
(154, 1, '20.00', '0', '+', 'Interest Return 20.00 USD Added on Your interest wallet Balance', 'interest', 'FNA2426CAPH1', '2895.00000000', '2022-09-14 14:00:02', '2022-09-14 14:00:02'),
(155, 1, '20.00', '0', '+', 'Interest Return 20.00 USD Added on Your interest wallet Balance', 'interest', '4T7JQZVUAG5S', '2915.00000000', '2022-09-14 15:30:01', '2022-09-14 15:30:01'),
(156, 1, '20.00', '0', '+', 'Interest Return 20.00 USD Added on Your interest wallet Balance', 'interest', '4U59KQ6J9WU1', '2935.00000000', '2022-09-14 16:30:01', '2022-09-14 16:30:01'),
(157, 1, '20.00', '0', '+', 'Interest Return 20.00 USD Added on Your interest wallet Balance', 'interest', 'U63ANBAE39Y5', '2955.00000000', '2022-09-14 17:30:02', '2022-09-14 17:30:02'),
(158, 1, '20.00', '0', '+', 'Interest Return 20.00 USD Added on Your interest wallet Balance', 'interest', 'HC725EKUXOCX', '2975.00000000', '2022-09-14 19:00:02', '2022-09-14 19:00:02'),
(159, 1, '20.00', '0', '+', 'Interest Return 20.00 USD Added on Your interest wallet Balance', 'interest', '97GKWXKQ78ON', '2995.00000000', '2022-09-14 20:30:01', '2022-09-14 20:30:01'),
(160, 1, '20.00', '0', '+', 'Interest Return 20.00 USD Added on Your interest wallet Balance', 'interest', 'PM8WXZ5RPK6H', '3015.00000000', '2022-09-14 21:30:01', '2022-09-14 21:30:01'),
(161, 1, '20.00', '0', '+', 'Interest Return 20.00 USD Added on Your interest wallet Balance', 'interest', 'FKXOE2BJW6AY', '3035.00000000', '2022-09-14 22:30:02', '2022-09-14 22:30:02'),
(162, 1, '2.50', '0', '+', 'Interest Return 2.50 USD Added on Your interest wallet Wallet', 'interest', '2Z6VB4GHRM6Y', '3037.50000000', '2022-09-15 00:00:01', '2022-09-15 00:00:01'),
(163, 1, '20.00', '0', '+', 'Interest Return 20.00 USD Added on Your interest wallet Balance', 'interest', 'PF4J8Q7YUA27', '3057.50000000', '2022-09-15 00:00:01', '2022-09-15 00:00:01'),
(164, 1, '20.00', '0', '+', 'Interest Return 20.00 USD Added on Your interest wallet Balance', 'interest', 'OHBPSVCFAGGX', '3077.50000000', '2022-09-15 01:00:02', '2022-09-15 01:00:02'),
(165, 1, '20.00', '0', '+', 'Interest Return 20.00 USD Added on Your interest wallet Balance', 'interest', 'FX9Y6U2GPT64', '3097.50000000', '2022-09-15 02:00:02', '2022-09-15 02:00:02'),
(166, 1, '20.00', '0', '+', 'Interest Return 20.00 USD Added on Your interest wallet Balance', 'interest', 'WUJ6DBEGBTMR', '3117.50000000', '2022-09-15 03:30:02', '2022-09-15 03:30:02'),
(167, 1, '20.00', '0', '+', 'Interest Return 20.00 USD Added on Your interest wallet Balance', 'interest', 'N23ESDXT2S74', '3137.50000000', '2022-09-15 04:30:02', '2022-09-15 04:30:02'),
(168, 1, '20.00', '0', '+', 'Interest Return 20.00 USD Added on Your interest wallet Balance', 'interest', 'NX71U41DVD6D', '3157.50000000', '2022-09-15 06:00:02', '2022-09-15 06:00:02'),
(169, 1, '20.00', '0', '+', 'Interest Return 20.00 USD Added on Your interest wallet Balance', 'interest', 'MUJQJD8D9SSQ', '3177.50000000', '2022-09-15 07:30:02', '2022-09-15 07:30:02'),
(170, 1, '20.00', '0', '+', 'Interest Return 20.00 USD Added on Your interest wallet Balance', 'interest', 'R3HMV3YYBRZC', '3197.50000000', '2022-09-15 09:00:01', '2022-09-15 09:00:01'),
(171, 1, '20.00', '0', '+', 'Interest Return 20.00 USD Added on Your interest wallet Balance', 'interest', 'ASEZ1AC7G21Z', '3217.50000000', '2022-09-15 10:00:02', '2022-09-15 10:00:02'),
(172, 1, '20.00', '0', '+', 'Interest Return 20.00 USD Added on Your interest wallet Balance', 'interest', 'NRMJK1YTX1NY', '3237.50000000', '2022-09-15 11:00:02', '2022-09-15 11:00:02'),
(173, 1, '20.00', '0', '+', 'Interest Return 20.00 USD Added on Your interest wallet Balance', 'interest', 'Q341DH3CRODW', '3257.50000000', '2022-09-15 12:30:01', '2022-09-15 12:30:01'),
(174, 1, '20.00', '0', '+', 'Interest Return 20.00 USD Added on Your interest wallet Balance', 'interest', 'OA2D97DQVZDW', '3277.50000000', '2022-09-15 13:30:01', '2022-09-15 13:30:01'),
(175, 1, '20.00', '0', '+', 'Interest Return 20.00 USD Added on Your interest wallet Balance', 'interest', 'RKB6OKWN48H3', '3297.50000000', '2022-09-15 14:30:01', '2022-09-15 14:30:01'),
(176, 1, '20.00', '0', '+', 'Interest Return 20.00 USD Added on Your interest wallet Balance', 'interest', '3K1VMKKT7WWK', '3317.50000000', '2022-09-15 15:30:01', '2022-09-15 15:30:01'),
(177, 1, '20.00', '0', '+', 'Interest Return 20.00 USD Added on Your interest wallet Balance', 'interest', 'TUB2YS1NBMY4', '3337.50000000', '2022-09-15 16:30:02', '2022-09-15 16:30:02'),
(178, 1, '20.00', '0', '+', 'Interest Return 20.00 USD Added on Your interest wallet Balance', 'interest', 'B56YKAVUYBM8', '3357.50000000', '2022-09-15 18:00:01', '2022-09-15 18:00:01'),
(179, 1, '20.00', '0', '+', 'Interest Return 20.00 USD Added on Your interest wallet Balance', 'interest', 'YOG8OEBAPR9J', '3377.50000000', '2022-09-15 19:00:01', '2022-09-15 19:00:01'),
(180, 1, '20.00', '0', '+', 'Interest Return 20.00 USD Added on Your interest wallet Balance', 'interest', 'RHES9HQHHS1V', '3397.50000000', '2022-09-15 20:00:01', '2022-09-15 20:00:01'),
(181, 1, '20.00', '0', '+', 'Interest Return 20.00 USD Added on Your interest wallet Balance', 'interest', 'U1X6HBCOT34T', '3417.50000000', '2022-09-15 21:00:02', '2022-09-15 21:00:02'),
(182, 1, '20.00', '0', '+', 'Interest Return 20.00 USD Added on Your interest wallet Balance', 'interest', 'RVOQTRSNZ23P', '3437.50000000', '2022-09-15 22:00:02', '2022-09-15 22:00:02'),
(183, 1, '20.00', '0', '+', 'Interest Return 20.00 USD Added on Your interest wallet Balance', 'interest', 'ZQ41EQAGZ8FG', '3457.50000000', '2022-09-15 23:30:01', '2022-09-15 23:30:01'),
(184, 1, '2.50', '0', '+', 'Interest Return 2.50 USD Added on Your interest wallet Wallet', 'interest', 'UZH1NB4TFE6X', '3460.00000000', '2022-09-16 00:00:01', '2022-09-16 00:00:01'),
(185, 1, '20.00', '0', '+', 'Interest Return 20.00 USD Added on Your interest wallet Balance', 'interest', '96BRQ6D3ZESK', '3480.00000000', '2022-09-16 00:30:01', '2022-09-16 00:30:01'),
(186, 1, '20.00', '0', '+', 'Interest Return 20.00 USD Added on Your interest wallet Balance', 'interest', 'B8FPECU2292V', '3500.00000000', '2022-09-16 01:30:01', '2022-09-16 01:30:01'),
(187, 1, '20.00', '0', '+', 'Interest Return 20.00 USD Added on Your interest wallet Balance', 'interest', 'MZYDROHCVHMD', '3520.00000000', '2022-09-16 02:30:01', '2022-09-16 02:30:01'),
(188, 1, '20.00', '0', '+', 'Interest Return 20.00 USD Added on Your interest wallet Balance', 'interest', 'COJPDW9YDTCU', '3540.00000000', '2022-09-16 03:30:01', '2022-09-16 03:30:01'),
(189, 1, '20.00', '0', '+', 'Interest Return 20.00 USD Added on Your interest wallet Balance', 'interest', 'Y7GY5EGP4UP1', '3560.00000000', '2022-09-16 04:30:01', '2022-09-16 04:30:01'),
(190, 1, '20.00', '0', '+', 'Interest Return 20.00 USD Added on Your interest wallet Balance', 'interest', '2MF1ET1PJ4RJ', '3580.00000000', '2022-09-16 05:30:01', '2022-09-16 05:30:01'),
(191, 1, '20.00', '0', '+', 'Interest Return 20.00 USD Added on Your interest wallet Balance', 'interest', 'VM9KSA4BBM5J', '3600.00000000', '2022-09-16 06:30:02', '2022-09-16 06:30:02'),
(192, 1, '20.00', '0', '+', 'Interest Return 20.00 USD Added on Your interest wallet Balance', 'interest', 'R2UZDCC2J2EQ', '3620.00000000', '2022-09-16 08:00:02', '2022-09-16 08:00:02'),
(193, 1, '20.00', '0', '+', 'Interest Return 20.00 USD Added on Your interest wallet Balance', 'interest', 'ZE8YZSZR74EG', '3640.00000000', '2022-09-16 09:30:01', '2022-09-16 09:30:01'),
(194, 1, '20.00', '0', '+', 'Interest Return 20.00 USD Added on Your interest wallet Balance', 'interest', 'SM7KA8EBM45T', '3660.00000000', '2022-09-16 10:30:01', '2022-09-16 10:30:01'),
(195, 1, '20.00', '0', '+', 'Interest Return 20.00 USD Added on Your interest wallet Balance', 'interest', '69J627K3C773', '3680.00000000', '2022-09-16 11:30:01', '2022-09-16 11:30:01'),
(196, 1, '20.00', '0', '+', 'Interest Return 20.00 USD Added on Your interest wallet Balance', 'interest', '44NBYZ28KQQS', '3700.00000000', '2022-09-16 12:30:01', '2022-09-16 12:30:01'),
(197, 1, '20.00', '0', '+', 'Interest Return 20.00 USD Added on Your interest wallet Balance', 'interest', 'UDAN2QAWSR8R', '3720.00000000', '2022-09-16 13:30:02', '2022-09-16 13:30:02'),
(198, 1, '20.00', '0', '+', 'Interest Return 20.00 USD Added on Your interest wallet Balance', 'interest', 'VQSVU1Y4PG64', '3740.00000000', '2022-09-16 15:00:02', '2022-09-16 15:00:02'),
(199, 1, '20.00', '0', '+', 'Interest Return 20.00 USD Added on Your interest wallet Balance', 'interest', 'MAUV51OVAKOB', '3760.00000000', '2022-09-16 16:30:01', '2022-09-16 16:30:01'),
(200, 1, '20.00', '0', '+', 'Interest Return 20.00 USD Added on Your interest wallet Balance', 'interest', 'EK9RGK26VDP9', '3780.00000000', '2022-09-16 17:30:01', '2022-09-16 17:30:01'),
(201, 1, '20.00', '0', '+', 'Interest Return 20.00 USD Added on Your interest wallet Balance', 'interest', 'MRCXBPR1ME8T', '3800.00000000', '2022-09-16 18:30:01', '2022-09-16 18:30:01'),
(202, 1, '20.00', '0', '+', 'Interest Return 20.00 USD Added on Your interest wallet Balance', 'interest', 'PX5C9XEJRVC2', '3820.00000000', '2022-09-16 19:30:01', '2022-09-16 19:30:01'),
(203, 1, '20.00', '0', '+', 'Interest Return 20.00 USD Added on Your interest wallet Balance', 'interest', '47NAMDVZRBFH', '3840.00000000', '2022-09-16 20:30:01', '2022-09-16 20:30:01'),
(204, 1, '20.00', '0', '+', 'Interest Return 20.00 USD Added on Your interest wallet Balance', 'interest', 'UJO9PRCX53XO', '3860.00000000', '2022-09-16 21:30:01', '2022-09-16 21:30:01'),
(205, 1, '20.00', '0', '+', 'Interest Return 20.00 USD Added on Your interest wallet Balance', 'interest', 'GMXKZ4HV717D', '3880.00000000', '2022-09-16 22:30:01', '2022-09-16 22:30:01'),
(206, 1, '20.00', '0', '+', 'Interest Return 20.00 USD Added on Your interest wallet Balance', 'interest', '5YME3V5ERCX1', '3900.00000000', '2022-09-16 23:30:01', '2022-09-16 23:30:01'),
(207, 1, '2.50', '0', '+', 'Interest Return 2.50 USD Added on Your interest wallet Wallet', 'interest', 'GU4H2HEXTZSY', '3902.50000000', '2022-09-17 00:00:01', '2022-09-17 00:00:01'),
(208, 1, '20.00', '0', '+', 'Interest Return 20.00 USD Added on Your interest wallet Balance', 'interest', 'VQA1ZWDZVE9O', '3922.50000000', '2022-09-17 00:30:01', '2022-09-17 00:30:01'),
(209, 1, '20.00', '0', '+', 'Interest Return 20.00 USD Added on Your interest wallet Balance', 'interest', 'FTAGH1MCBD79', '3942.50000000', '2022-09-17 01:30:01', '2022-09-17 01:30:01'),
(210, 1, '20.00', '0', '+', 'Interest Return 20.00 USD Added on Your interest wallet Balance', 'interest', '3NWY89COPU3Q', '3962.50000000', '2022-09-17 02:30:01', '2022-09-17 02:30:01'),
(211, 1, '20.00', '0', '+', 'Interest Return 20.00 USD Added on Your interest wallet Balance', 'interest', '8H7FBD39VX8D', '3982.50000000', '2022-09-17 03:30:01', '2022-09-17 03:30:01'),
(212, 1, '20.00', '0', '+', 'Interest Return 20.00 USD Added on Your interest wallet Balance', 'interest', 'ZN2NSYJ6SXA9', '4002.50000000', '2022-09-17 04:30:01', '2022-09-17 04:30:01'),
(213, 1, '20.00', '0', '+', 'Interest Return 20.00 USD Added on Your interest wallet Balance', 'interest', 'SPO3X7B2M11R', '4022.50000000', '2022-09-17 05:30:01', '2022-09-17 05:30:01'),
(214, 1, '20.00', '0', '+', 'Interest Return 20.00 USD Added on Your interest wallet Balance', 'interest', '47J291Q9PSY8', '4042.50000000', '2022-09-17 06:30:01', '2022-09-17 06:30:01'),
(215, 1, '20.00', '0', '+', 'Interest Return 20.00 USD Added on Your interest wallet Balance', 'interest', 'YTDWCDBHP1HT', '4062.50000000', '2022-09-17 07:30:01', '2022-09-17 07:30:01'),
(216, 1, '20.00', '0', '+', 'Interest Return 20.00 USD Added on Your interest wallet Balance', 'interest', '8O7XC9KYYR7W', '4082.50000000', '2022-09-17 08:30:01', '2022-09-17 08:30:01'),
(217, 1, '20.00', '0', '+', 'Interest Return 20.00 USD Added on Your interest wallet Balance', 'interest', 'YCRA5TBZQQ2U', '4102.50000000', '2022-09-17 09:30:01', '2022-09-17 09:30:01'),
(218, 1, '20.00', '0', '+', 'Interest Return 20.00 USD Added on Your interest wallet Balance', 'interest', '7YJ86PDA3AD6', '4122.50000000', '2022-09-17 10:30:01', '2022-09-17 10:30:01'),
(219, 1, '20.00', '0', '+', 'Interest Return 20.00 USD Added on Your interest wallet Balance', 'interest', 'XZ5SC49CS83P', '4142.50000000', '2022-09-17 11:30:01', '2022-09-17 11:30:01'),
(220, 1, '20.00', '0', '+', 'Interest Return 20.00 USD Added on Your interest wallet Balance', 'interest', 'A3HK579SCG6S', '4162.50000000', '2022-09-17 12:30:01', '2022-09-17 12:30:01'),
(221, 1, '20.00', '0', '+', 'Interest Return 20.00 USD Added on Your interest wallet Balance', 'interest', 'X76G3DYSTB4T', '4182.50000000', '2022-09-17 13:30:01', '2022-09-17 13:30:01'),
(222, 1, '20.00', '0', '+', 'Interest Return 20.00 USD Added on Your interest wallet Balance', 'interest', 'Y4SB8UYR1R1A', '4202.50000000', '2022-09-17 14:30:01', '2022-09-17 14:30:01'),
(223, 1, '20.00', '0', '+', 'Interest Return 20.00 USD Added on Your interest wallet Balance', 'interest', '1OJXH41E33F5', '4222.50000000', '2022-09-17 15:30:02', '2022-09-17 15:30:02'),
(224, 1, '20.00', '0', '+', 'Interest Return 20.00 USD Added on Your interest wallet Balance', 'interest', 'XAZU6V6SDEQD', '4242.50000000', '2022-09-17 17:00:01', '2022-09-17 17:00:01'),
(225, 1, '20.00', '0', '+', 'Interest Return 20.00 USD Added on Your interest wallet Balance', 'interest', 'CJSYJ9VCF3YG', '4262.50000000', '2022-09-17 18:00:02', '2022-09-17 18:00:02'),
(226, 1, '20.00', '0', '+', 'Interest Return 20.00 USD Added on Your interest wallet Balance', 'interest', 'B56XVSGYY1KT', '4282.50000000', '2022-09-17 19:00:02', '2022-09-17 19:00:02'),
(227, 1, '20.00', '0', '+', 'Interest Return 20.00 USD Added on Your interest wallet Balance', 'interest', 'BKQPEQ4GP53R', '4302.50000000', '2022-09-17 20:30:02', '2022-09-17 20:30:02'),
(228, 1, '20.00', '0', '+', 'Interest Return 20.00 USD Added on Your interest wallet Balance', 'interest', 'SYOWJB4H8H99', '4322.50000000', '2022-09-17 22:00:02', '2022-09-17 22:00:02'),
(229, 1, '20.00', '0', '+', 'Interest Return 20.00 USD Added on Your interest wallet Balance', 'interest', 'SUPJYU9MB735', '4342.50000000', '2022-09-17 23:30:01', '2022-09-17 23:30:01'),
(230, 1, '2.50', '0', '+', 'Interest Return 2.50 USD Added on Your interest wallet Wallet', 'interest', 'TNNACAX9JC5H', '4345.00000000', '2022-09-18 00:00:01', '2022-09-18 00:00:01'),
(231, 1, '20.00', '0', '+', 'Interest Return 20.00 USD Added on Your interest wallet Balance', 'interest', '3O4D1E3NVMJ6', '4365.00000000', '2022-09-18 00:30:01', '2022-09-18 00:30:01'),
(232, 1, '20.00', '0', '+', 'Interest Return 20.00 USD Added on Your interest wallet Balance', 'interest', '8J5WYER85XV5', '4385.00000000', '2022-09-18 01:30:01', '2022-09-18 01:30:01'),
(233, 1, '20.00', '0', '+', 'Interest Return 20.00 USD Added on Your interest wallet Balance', 'interest', 'B4QEQ9N8B78O', '4405.00000000', '2022-09-18 02:30:01', '2022-09-18 02:30:01'),
(234, 1, '20.00', '0', '+', 'Interest Return 20.00 USD Added on Your interest wallet Balance', 'interest', 'S9D9OJRTHTPP', '4425.00000000', '2022-09-18 03:30:02', '2022-09-18 03:30:02'),
(235, 1, '20.00', '0', '+', 'Interest Return 20.00 USD Added on Your interest wallet Balance', 'interest', 'JY5NZU6S8XVS', '4445.00000000', '2022-09-18 05:00:01', '2022-09-18 05:00:01'),
(236, 1, '20.00', '0', '+', 'Interest Return 20.00 USD Added on Your interest wallet Balance', 'interest', 'EMSOC9E86BAZ', '4465.00000000', '2022-09-18 06:00:01', '2022-09-18 06:00:01'),
(237, 1, '20.00', '0', '+', 'Interest Return 20.00 USD Added on Your interest wallet Balance', 'interest', 'DGORCCE52NN3', '4485.00000000', '2022-09-18 07:00:01', '2022-09-18 07:00:01'),
(238, 1, '20.00', '0', '+', 'Interest Return 20.00 USD Added on Your interest wallet Balance', 'interest', '2HT7HHNYNURE', '4505.00000000', '2022-09-18 08:00:01', '2022-09-18 08:00:01'),
(239, 1, '20.00', '0', '+', 'Interest Return 20.00 USD Added on Your interest wallet Balance', 'interest', 'D6C7PG3UPVB3', '4525.00000000', '2022-09-18 09:00:02', '2022-09-18 09:00:02'),
(240, 1, '20.00', '0', '+', 'Interest Return 20.00 USD Added on Your interest wallet Balance', 'interest', 'SV3PS5DNDW24', '4545.00000000', '2022-09-18 10:30:01', '2022-09-18 10:30:01'),
(241, 1, '20.00', '0', '+', 'Interest Return 20.00 USD Added on Your interest wallet Balance', 'interest', 'XRWTDF7J4YQV', '4565.00000000', '2022-09-18 11:30:01', '2022-09-18 11:30:01'),
(242, 1, '20.00', '0', '+', 'Interest Return 20.00 USD Added on Your interest wallet Balance', 'interest', 'PHAO2H88MAW6', '4585.00000000', '2022-09-18 12:30:01', '2022-09-18 12:30:01'),
(243, 1, '20.00', '0', '+', 'Interest Return 20.00 USD Added on Your interest wallet Balance', 'interest', 'TZT33GP37BTR', '4605.00000000', '2022-09-18 13:30:01', '2022-09-18 13:30:01'),
(244, 1, '20.00', '0', '+', 'Interest Return 20.00 USD Added on Your interest wallet Balance', 'interest', 'CD7NU96WFGVH', '4625.00000000', '2022-09-18 14:30:01', '2022-09-18 14:30:01'),
(245, 1, '20.00', '0', '+', 'Interest Return 20.00 USD Added on Your interest wallet Balance', 'interest', 'RENHZWVP4UFX', '4645.00000000', '2022-09-18 15:30:02', '2022-09-18 15:30:02'),
(246, 1, '20.00', '0', '+', 'Interest Return 20.00 USD Added on Your interest wallet Balance', 'interest', 'NSQEDMS728YF', '4665.00000000', '2022-09-18 17:00:01', '2022-09-18 17:00:01'),
(247, 1, '20.00', '0', '+', 'Interest Return 20.00 USD Added on Your interest wallet Balance', 'interest', 'WPVNDAMMYFPX', '4685.00000000', '2022-09-18 18:00:01', '2022-09-18 18:00:01'),
(248, 1, '20.00', '0', '+', 'Interest Return 20.00 USD Added on Your interest wallet Balance', 'interest', 'G7TTODDCQ9T4', '4705.00000000', '2022-09-18 19:00:01', '2022-09-18 19:00:01'),
(249, 1, '20.00', '0', '+', 'Interest Return 20.00 USD Added on Your interest wallet Balance', 'interest', 'OHZ2BN5AXC4Q', '4725.00000000', '2022-09-18 20:00:01', '2022-09-18 20:00:01'),
(250, 1, '20.00', '0', '+', 'Interest Return 20.00 USD Added on Your interest wallet Balance', 'interest', 'PD36D9BQYUFJ', '4745.00000000', '2022-09-18 21:00:01', '2022-09-18 21:00:01'),
(251, 1, '20.00', '0', '+', 'Interest Return 20.00 USD Added on Your interest wallet Balance', 'interest', '33UTZ6E2V5KM', '4765.00000000', '2022-09-18 22:00:01', '2022-09-18 22:00:01'),
(252, 1, '20.00', '0', '+', 'Interest Return 20.00 USD Added on Your interest wallet Balance', 'interest', 'VBGJPP8T193W', '4785.00000000', '2022-09-18 23:00:01', '2022-09-18 23:00:01'),
(253, 1, '2.50', '0', '+', 'Interest Return 2.50 USD Added on Your interest wallet Wallet', 'interest', 'Q1KQUE3MG2YU', '4787.50000000', '2022-09-19 00:00:01', '2022-09-19 00:00:01'),
(254, 1, '20.00', '0', '+', 'Interest Return 20.00 USD Added on Your interest wallet Balance', 'interest', '1ABYP8F9G9K7', '4807.50000000', '2022-09-19 00:00:01', '2022-09-19 00:00:01'),
(255, 1, '2000', '0', '+', 'Added Balance Via Admin', 'admin_added', 'TCPJB4KNNPPP', '6807.50000000', '2022-09-19 00:39:57', '2022-09-19 00:39:57'),
(256, 1, '1000.00000000', '20.00000000', '-', '980 USD Withdraw Via Withdraw Fund Request', 'withdraw_request', 'U6EO6W6S5E1D', '5807.50000000', '2022-09-19 00:41:23', '2022-09-19 00:41:23'),
(257, 1, '10000', '125.00000000', '+', 'Deposit Via Bank Wire', 'manual_deposit', 'VSDAFAQ2DE7D', '18500.00000000', '2022-09-19 00:51:28', '2022-09-19 00:51:28'),
(258, 1, '20.00', '0', '+', 'Interest Return 20.00 USD Added on Your interest wallet Balance', 'interest', 'JA6GN153W3QN', '5827.50000000', '2022-09-19 01:00:01', '2022-09-19 01:00:01'),
(259, 1, '20.00', '0', '+', 'Interest Return 20.00 USD Added on Your interest wallet Balance', 'interest', 'USQPMEPDZF3M', '5847.50000000', '2022-09-19 02:00:01', '2022-09-19 02:00:01'),
(260, 1, '20.00', '0', '+', 'Interest Return 20.00 USD Added on Your interest wallet Balance', 'interest', '3ZR3N9D63WWN', '5867.50000000', '2022-09-19 03:00:01', '2022-09-19 03:00:01'),
(261, 1, '20.00', '0', '+', 'Interest Return 20.00 USD Added on Your interest wallet Balance', 'interest', 'KGKTVN7TJ7Y7', '5887.50000000', '2022-09-19 04:00:01', '2022-09-19 04:00:01'),
(262, 1, '20.00', '0', '+', 'Interest Return 20.00 USD Added on Your interest wallet Balance', 'interest', 'SMWSSBS1XF1D', '5907.50000000', '2022-09-19 05:00:01', '2022-09-19 05:00:01'),
(263, 1, '20.00', '0', '+', 'Interest Return 20.00 USD Added on Your interest wallet Balance', 'interest', 'OW8XNBY832PO', '5927.50000000', '2022-09-19 06:00:01', '2022-09-19 06:00:01'),
(264, 1, '20.00', '0', '+', 'Interest Return 20.00 USD Added on Your interest wallet Balance', 'interest', '1DJJM697QK92', '5947.50000000', '2022-09-19 07:00:01', '2022-09-19 07:00:01'),
(265, 1, '20.00', '0', '+', 'Interest Return 20.00 USD Added on Your interest wallet Balance', 'interest', 'V9CO2YMOZ1MH', '5967.50000000', '2022-09-19 08:00:01', '2022-09-19 08:00:01'),
(266, 1, '20.00', '0', '+', 'Interest Return 20.00 USD Added on Your interest wallet Balance', 'interest', '7WWXK5SV6WAC', '5987.50000000', '2022-09-19 09:00:02', '2022-09-19 09:00:02'),
(267, 1, '20.00', '0', '+', 'Interest Return 20.00 USD Added on Your interest wallet Balance', 'interest', '2WB9Y8C5AZBR', '6007.50000000', '2022-09-19 10:30:01', '2022-09-19 10:30:01'),
(268, 1, '20.00', '0', '+', 'Interest Return 20.00 USD Added on Your interest wallet Balance', 'interest', '53121E5UVZQR', '6027.50000000', '2022-09-19 11:30:01', '2022-09-19 11:30:01'),
(269, 1, '20.00', '0', '+', 'Interest Return 20.00 USD Added on Your interest wallet Balance', 'interest', 'X24EGSCFRQMF', '6047.50000000', '2022-09-19 12:30:01', '2022-09-19 12:30:01'),
(270, 1, '20.00', '0', '+', 'Interest Return 20.00 USD Added on Your interest wallet Balance', 'interest', 'SBWN8NZAUS41', '6067.50000000', '2022-09-19 13:30:01', '2022-09-19 13:30:01'),
(271, 1, '20.00', '0', '+', 'Interest Return 20.00 USD Added on Your interest wallet Balance', 'interest', '7E42GJYAENPP', '6087.50000000', '2022-09-19 14:30:01', '2022-09-19 14:30:01');
INSERT INTO `trxes` (`id`, `user_id`, `amount`, `charge`, `trx_type`, `details`, `remark`, `trx`, `post_balance`, `created_at`, `updated_at`) VALUES
(272, 1, '20.00', '0', '+', 'Interest Return 20.00 USD Added on Your interest wallet Balance', 'interest', 'W4SUC3YQM54E', '6107.50000000', '2022-09-19 15:30:02', '2022-09-19 15:30:02'),
(273, 1, '20.00', '0', '+', 'Interest Return 20.00 USD Added on Your interest wallet Balance', 'interest', 'XFADKUCFB448', '6127.50000000', '2022-09-19 17:00:01', '2022-09-19 17:00:01'),
(274, 1, '20.00', '0', '+', 'Interest Return 20.00 USD Added on Your interest wallet Balance', 'interest', '5MQ25YXA4JQ6', '6147.50000000', '2022-09-19 18:00:02', '2022-09-19 18:00:02'),
(275, 1, '20.00', '0', '+', 'Interest Return 20.00 USD Added on Your interest wallet Balance', 'interest', 'ZHPKYZOP3B5Z', '6167.50000000', '2022-09-19 19:30:01', '2022-09-19 19:30:01'),
(276, 1, '20.00', '0', '+', 'Interest Return 20.00 USD Added on Your interest wallet Balance', 'interest', 'ZHYP95DDC7NS', '6187.50000000', '2022-09-19 20:30:01', '2022-09-19 20:30:01'),
(277, 1, '20.00', '0', '+', 'Interest Return 20.00 USD Added on Your interest wallet Balance', 'interest', 'XW64T3KUK91D', '6207.50000000', '2022-09-19 21:30:01', '2022-09-19 21:30:01'),
(278, 1, '20.00', '0', '+', 'Interest Return 20.00 USD Added on Your interest wallet Balance', 'interest', 'NCBNP16DO121', '6227.50000000', '2022-09-19 22:30:01', '2022-09-19 22:30:01'),
(279, 1, '20.00', '0', '+', 'Interest Return 20.00 USD Added on Your interest wallet Balance', 'interest', '7MO9FPBWNBBQ', '6247.50000000', '2022-09-19 23:30:02', '2022-09-19 23:30:02'),
(280, 1, '2.50', '0', '+', 'Interest Return 2.50 USD Added on Your interest wallet Wallet', 'interest', 'BDWMW47Q841K', '6250.00000000', '2022-09-20 00:00:02', '2022-09-20 00:00:02'),
(281, 1, '20.00', '0', '+', 'Interest Return 20.00 USD Added on Your interest wallet Balance', 'interest', 'ARBKV3DEAEF2', '6270.00000000', '2022-09-20 01:00:01', '2022-09-20 01:00:01'),
(282, 1, '20.00', '0', '+', 'Interest Return 20.00 USD Added on Your interest wallet Balance', 'interest', 'FVC288AWC8T9', '6290.00000000', '2022-09-20 02:00:02', '2022-09-20 02:00:02'),
(283, 1, '20.00', '0', '+', 'Interest Return 20.00 USD Added on Your interest wallet Balance', 'interest', '2U4RT655JZSF', '6310.00000000', '2022-09-20 03:30:01', '2022-09-20 03:30:01'),
(284, 1, '20.00', '0', '+', 'Interest Return 20.00 USD Added on Your interest wallet Balance', 'interest', '7YY22EF5XJP5', '6330.00000000', '2022-09-20 04:30:01', '2022-09-20 04:30:01'),
(285, 1, '2.50', '0', '+', 'Interest Return 2.50 USD Added on Your interest wallet Wallet', 'interest', 'Z2BWOM8RF2EC', '6332.50000000', '2022-09-21 13:00:01', '2022-09-21 13:00:01'),
(286, 1, '20.00', '0', '+', 'Interest Return 20.00 USD Added on Your interest wallet Balance', 'interest', '33PMSZXNAAK1', '6352.50000000', '2022-09-21 13:00:01', '2022-09-21 13:00:01'),
(287, 1, '20.00', '0', '+', 'Interest Return 20.00 USD Added on Your interest wallet Balance', 'interest', 'GOX6QQ4F1HBN', '6372.50000000', '2022-09-21 14:00:02', '2022-09-21 14:00:02'),
(288, 1, '20.00', '0', '+', 'Interest Return 20.00 USD Added on Your interest wallet Balance', 'interest', 'PSM9SZ2KW428', '6392.50000000', '2022-09-21 15:30:02', '2022-09-21 15:30:02'),
(289, 1, '20.00', '0', '+', 'Interest Return 20.00 USD Added on Your interest wallet Balance', 'interest', '3XPZW7JW4P7M', '6412.50000000', '2022-09-21 17:00:01', '2022-09-21 17:00:01'),
(290, 1, '20.00', '0', '+', 'Interest Return 20.00 USD Added on Your interest wallet Balance', 'interest', 'E4N3N5PXRGW9', '6432.50000000', '2022-09-21 18:00:01', '2022-09-21 18:00:01'),
(291, 1, '20.00', '0', '+', 'Interest Return 20.00 USD Added on Your interest wallet Balance', 'interest', '2UNYHGGA4KYA', '6452.50000000', '2022-09-21 19:00:02', '2022-09-21 19:00:02'),
(292, 1, '20.00', '0', '+', 'Interest Return 20.00 USD Added on Your interest wallet Balance', 'interest', 'DRAFQASWBFY7', '6472.50000000', '2022-09-21 20:00:02', '2022-09-21 20:00:02'),
(293, 1, '20.00', '0', '+', 'Interest Return 20.00 USD Added on Your interest wallet Balance', 'interest', 'GGOUP77C8XH6', '6492.50000000', '2022-09-21 21:30:02', '2022-09-21 21:30:02'),
(294, 1, '20.00', '0', '+', 'Interest Return 20.00 USD Added on Your interest wallet Balance', 'interest', 'O6PVQTDSGKUV', '6512.50000000', '2022-09-21 23:00:01', '2022-09-21 23:00:01'),
(295, 1, '20.00', '0', '+', 'Interest Return 20.00 USD Added on Your interest wallet Balance', 'interest', 'U1GUPDSKOYYG', '6532.50000000', '2022-09-22 00:00:01', '2022-09-22 00:00:01'),
(296, 1, '20.00', '0', '+', 'Interest Return 20.00 USD Added on Your interest wallet Balance', 'interest', 'OW19D69SAMTM', '6552.50000000', '2022-09-22 01:00:02', '2022-09-22 01:00:02'),
(297, 1, '20.00', '0', '+', 'Interest Return 20.00 USD Added on Your interest wallet Balance', 'interest', 'FKR6WMDDTC3J', '6572.50000000', '2022-09-22 02:30:02', '2022-09-22 02:30:02'),
(298, 1, '20.00', '0', '+', 'Interest Return 20.00 USD Added on Your interest wallet Balance', 'interest', 'J2MFN2JBX7S6', '6592.50000000', '2022-09-22 04:00:01', '2022-09-22 04:00:01'),
(299, 1, '20.00', '0', '+', 'Interest Return 20.00 USD Added on Your interest wallet Balance', 'interest', 'SR44UXNEXNEV', '6612.50000000', '2022-09-22 05:00:01', '2022-09-22 05:00:01'),
(300, 1, '20.00', '0', '+', 'Interest Return 20.00 USD Added on Your interest wallet Balance', 'interest', 'P8QWXMC1HOB3', '6632.50000000', '2022-09-22 06:00:02', '2022-09-22 06:00:02'),
(301, 1, '20.00', '0', '+', 'Interest Return 20.00 USD Added on Your interest wallet Balance', 'interest', 'QVGNHD32PHJO', '6652.50000000', '2022-09-22 07:30:02', '2022-09-22 07:30:02'),
(302, 1, '20.00', '0', '+', 'Interest Return 20.00 USD Added on Your interest wallet Balance', 'interest', 'UPJF78UUB7X1', '6672.50000000', '2022-09-22 09:00:01', '2022-09-22 09:00:01'),
(303, 1, '20.00', '0', '+', 'Interest Return 20.00 USD Added on Your interest wallet Balance', 'interest', 'S8EG838W745M', '6692.50000000', '2022-09-22 10:00:01', '2022-09-22 10:00:01'),
(304, 1, '20.00', '0', '+', 'Interest Return 20.00 USD Added on Your interest wallet Balance', 'interest', 'YFA4R16HMGA6', '6712.50000000', '2022-09-22 11:00:02', '2022-09-22 11:00:02'),
(305, 1, '20.00', '0', '+', 'Interest Return 20.00 USD Added on Your interest wallet Balance', 'interest', 'EPUYNWWX9GK1', '6732.50000000', '2022-09-22 12:30:02', '2022-09-22 12:30:02'),
(306, 1, '2.50', '0', '+', 'Interest Return 2.50 USD Added on Your interest wallet Wallet', 'interest', 'WTUXNTV6A5EO', '6735.00000000', '2022-09-22 13:00:01', '2022-09-22 13:00:01'),
(307, 1, '20.00', '0', '+', 'Interest Return 20.00 USD Added on Your interest wallet Balance', 'interest', 'TTC9DX2TYZ9K', '6755.00000000', '2022-09-22 14:00:02', '2022-09-22 14:00:02'),
(308, 1, '20.00', '0', '+', 'Interest Return 20.00 USD Added on Your interest wallet Balance', 'interest', 'DFGW6XSSWUT2', '6775.00000000', '2022-09-22 15:00:02', '2022-09-22 15:00:02'),
(309, 1, '20.00', '0', '+', 'Interest Return 20.00 USD Added on Your interest wallet Balance', 'interest', 'D23C3XAP1NP1', '6795.00000000', '2022-09-22 16:30:01', '2022-09-22 16:30:01'),
(310, 1, '20.00', '0', '+', 'Interest Return 20.00 USD Added on Your interest wallet Balance', 'interest', 'YG9JVVKS278W', '6815.00000000', '2022-09-22 17:30:02', '2022-09-22 17:30:02'),
(311, 1, '20.00', '0', '+', 'Interest Return 20.00 USD Added on Your interest wallet Balance', 'interest', '63MZ6YEHXHQ8', '6835.00000000', '2022-09-22 18:30:02', '2022-09-22 18:30:02'),
(312, 1, '20.00', '0', '+', 'Interest Return 20.00 USD Added on Your interest wallet Balance', 'interest', 'BFRESDC1O1SX', '6855.00000000', '2022-09-22 19:30:02', '2022-09-22 19:30:02'),
(313, 1, '20.00', '0', '+', 'Interest Return 20.00 USD Added on Your interest wallet Balance', 'interest', 'D9RH4M8F4SGO', '6875.00000000', '2022-09-22 21:00:01', '2022-09-22 21:00:01'),
(314, 1, '20.00', '0', '+', 'Interest Return 20.00 USD Added on Your interest wallet Balance', 'interest', '7GEO7JOOXESR', '6895.00000000', '2022-09-22 22:00:02', '2022-09-22 22:00:02'),
(315, 1, '20.00', '0', '+', 'Interest Return 20.00 USD Added on Your interest wallet Balance', 'interest', 'NJFVBY15AFPP', '6915.00000000', '2022-09-22 23:00:02', '2022-09-22 23:00:02'),
(316, 1, '20.00', '0', '+', 'Interest Return 20.00 USD Added on Your interest wallet Balance', 'interest', 'YTKQH42H1K3E', '6935.00000000', '2022-09-23 00:30:01', '2022-09-23 00:30:01'),
(317, 1, '20.00', '0', '+', 'Interest Return 20.00 USD Added on Your interest wallet Balance', 'interest', 'HOT4KWFCGFZX', '6955.00000000', '2022-09-23 01:30:02', '2022-09-23 01:30:02'),
(318, 1, '20.00', '0', '+', 'Interest Return 20.00 USD Added on Your interest wallet Balance', 'interest', '4T59ZFWCOASR', '6975.00000000', '2022-09-23 03:00:01', '2022-09-23 03:00:01'),
(319, 1, '20.00', '0', '+', 'Interest Return 20.00 USD Added on Your interest wallet Balance', 'interest', 'O5VM2WBBYT9N', '6995.00000000', '2022-09-23 04:00:01', '2022-09-23 04:00:01'),
(320, 1, '20.00', '0', '+', 'Interest Return 20.00 USD Added on Your interest wallet Balance', 'interest', '59HBPMTV699J', '7015.00000000', '2022-09-23 05:00:02', '2022-09-23 05:00:02'),
(321, 1, '20.00', '0', '+', 'Interest Return 20.00 USD Added on Your interest wallet Balance', 'interest', 'FVOJ3QRUCJEE', '7035.00000000', '2022-09-23 06:00:02', '2022-09-23 06:00:02'),
(322, 1, '20.00', '0', '+', 'Interest Return 20.00 USD Added on Your interest wallet Balance', 'interest', 'MU9RBYQ9X4BS', '7055.00000000', '2022-09-23 07:00:02', '2022-09-23 07:00:02'),
(323, 1, '20.00', '0', '+', 'Interest Return 20.00 USD Added on Your interest wallet Balance', 'interest', '5P3PTPKKZK3Z', '7075.00000000', '2022-09-23 08:00:02', '2022-09-23 08:00:02'),
(324, 1, '20.00', '0', '+', 'Interest Return 20.00 USD Added on Your interest wallet Balance', 'interest', '8PHTTAONYUKN', '7095.00000000', '2022-09-23 09:00:02', '2022-09-23 09:00:02'),
(325, 1, '20.00', '0', '+', 'Interest Return 20.00 USD Added on Your interest wallet Balance', 'interest', 'KV36GP5DAEUY', '7115.00000000', '2022-09-23 10:00:02', '2022-09-23 10:00:02'),
(326, 1, '20.00', '0', '+', 'Interest Return 20.00 USD Added on Your interest wallet Balance', 'interest', '4WCG7EWTPAGH', '7135.00000000', '2022-09-23 11:30:01', '2022-09-23 11:30:01'),
(327, 1, '20.00', '0', '+', 'Interest Return 20.00 USD Added on Your interest wallet Balance', 'interest', 'WN4OYT1EQRG5', '7155.00000000', '2022-09-23 12:30:02', '2022-09-23 12:30:02'),
(328, 1, '2.50', '0', '+', 'Interest Return 2.50 USD Added on Your interest wallet Wallet', 'interest', 'OQZD5WR8Y678', '7157.50000000', '2022-09-23 13:00:01', '2022-09-23 13:00:01'),
(329, 1, '20.00', '0', '+', 'Interest Return 20.00 USD Added on Your interest wallet Balance', 'interest', '6E3KA4QCOKSS', '7177.50000000', '2022-09-23 14:00:01', '2022-09-23 14:00:01'),
(330, 1, '20.00', '0', '+', 'Interest Return 20.00 USD Added on Your interest wallet Balance', 'interest', 'SWGX7YDW28RC', '7197.50000000', '2022-09-23 15:00:01', '2022-09-23 15:00:01'),
(331, 1, '20.00', '0', '+', 'Interest Return 20.00 USD Added on Your interest wallet Balance', 'interest', 'RTRGU7XNF3PR', '7217.50000000', '2022-09-23 16:00:01', '2022-09-23 16:00:01'),
(332, 1, '20.00', '0', '+', 'Interest Return 20.00 USD Added on Your interest wallet Balance', 'interest', 'J65BMZZGXSFJ', '7237.50000000', '2022-09-23 17:00:01', '2022-09-23 17:00:01'),
(333, 1, '20.00', '0', '+', 'Interest Return 20.00 USD Added on Your interest wallet Balance', 'interest', 'QKA81VW1FPN1', '7257.50000000', '2022-09-23 18:00:02', '2022-09-23 18:00:02'),
(334, 1, '20.00', '0', '+', 'Interest Return 20.00 USD Added on Your interest wallet Balance', 'interest', '5RP5C8ZXU22G', '7277.50000000', '2022-09-23 19:30:01', '2022-09-23 19:30:01'),
(335, 1, '20.00', '0', '+', 'Interest Return 20.00 USD Added on Your interest wallet Balance', 'interest', '55RVB5ZMH8AJ', '7297.50000000', '2022-09-23 20:30:02', '2022-09-23 20:30:02'),
(336, 1, '20.00', '0', '+', 'Interest Return 20.00 USD Added on Your interest wallet Balance', 'interest', 'O5ZFWEOPJCOB', '7317.50000000', '2022-09-23 21:30:02', '2022-09-23 21:30:02'),
(337, 1, '20.00', '0', '+', 'Interest Return 20.00 USD Added on Your interest wallet Balance', 'interest', 'FNUWB2C6Q9SF', '7337.50000000', '2022-09-23 23:00:01', '2022-09-23 23:00:01'),
(338, 1, '20.00', '0', '+', 'Interest Return 20.00 USD Added on Your interest wallet Balance', 'interest', 'TH4K281WM6WU', '7357.50000000', '2022-09-24 00:00:01', '2022-09-24 00:00:01'),
(339, 1, '20.00', '0', '+', 'Interest Return 20.00 USD Added on Your interest wallet Balance', 'interest', 'MP39FHJKDREU', '7377.50000000', '2022-09-24 01:00:01', '2022-09-24 01:00:01'),
(340, 1, '20.00', '0', '+', 'Interest Return 20.00 USD Added on Your interest wallet Balance', 'interest', 'O1ZVRTOB366T', '7397.50000000', '2022-09-24 02:00:01', '2022-09-24 02:00:01'),
(341, 1, '20.00', '0', '+', 'Interest Return 20.00 USD Added on Your interest wallet Balance', 'interest', 'N98FPWPVRKVA', '7417.50000000', '2022-09-24 03:00:01', '2022-09-24 03:00:01'),
(342, 1, '20.00', '0', '+', 'Interest Return 20.00 USD Added on Your interest wallet Balance', 'interest', '2APFGSR5FE2Z', '7437.50000000', '2022-09-24 04:00:01', '2022-09-24 04:00:01'),
(343, 1, '20.00', '0', '+', 'Interest Return 20.00 USD Added on Your interest wallet Balance', 'interest', 'M7KCPCAHZQAR', '7457.50000000', '2022-09-24 05:00:01', '2022-09-24 05:00:01'),
(344, 1, '20.00', '0', '+', 'Interest Return 20.00 USD Added on Your interest wallet Balance', 'interest', '6S2CXZXV6S5N', '7477.50000000', '2022-09-24 06:00:01', '2022-09-24 06:00:01'),
(345, 1, '20.00', '0', '+', 'Interest Return 20.00 USD Added on Your interest wallet Balance', 'interest', '6HYUO5AYAGVY', '7497.50000000', '2022-09-24 07:00:01', '2022-09-24 07:00:01'),
(346, 1, '20.00', '0', '+', 'Interest Return 20.00 USD Added on Your interest wallet Balance', 'interest', 'REXXDC16X5PQ', '7517.50000000', '2022-09-24 08:00:01', '2022-09-24 08:00:01'),
(347, 1, '20.00', '0', '+', 'Interest Return 20.00 USD Added on Your interest wallet Balance', 'interest', '6NZR3NTJEUK5', '7537.50000000', '2022-09-24 09:00:01', '2022-09-24 09:00:01'),
(348, 1, '20.00', '0', '+', 'Interest Return 20.00 USD Added on Your interest wallet Balance', 'interest', 'NRRCYDJSEGEG', '7557.50000000', '2022-09-24 10:00:01', '2022-09-24 10:00:01'),
(349, 1, '20.00', '0', '+', 'Interest Return 20.00 USD Added on Your interest wallet Balance', 'interest', 'JZ5YUX3QAXCX', '7577.50000000', '2022-09-24 11:00:01', '2022-09-24 11:00:01'),
(350, 1, '20.00', '0', '+', 'Interest Return 20.00 USD Added on Your interest wallet Balance', 'interest', '6U1RZ4KYMZO7', '7597.50000000', '2022-09-24 12:00:01', '2022-09-24 12:00:01'),
(351, 1, '2.50', '0', '+', 'Interest Return 2.50 USD Added on Your interest wallet Wallet', 'interest', 'R9RPAVOWXV64', '7600.00000000', '2022-09-24 13:00:01', '2022-09-24 13:00:01'),
(352, 1, '20.00', '0', '+', 'Interest Return 20.00 USD Added on Your interest wallet Balance', 'interest', 'FSRRQH5NSYT3', '7620.00000000', '2022-09-24 13:00:01', '2022-09-24 13:00:01'),
(353, 1, '20.00', '0', '+', 'Interest Return 20.00 USD Added on Your interest wallet Balance', 'interest', '5AFRQZW727QM', '7640.00000000', '2022-09-24 14:00:01', '2022-09-24 14:00:01'),
(354, 1, '20.00', '0', '+', 'Interest Return 20.00 USD Added on Your interest wallet Balance', 'interest', 'ZB59DQ3RVRUU', '7660.00000000', '2022-09-24 15:00:02', '2022-09-24 15:00:02'),
(355, 1, '20.00', '0', '+', 'Interest Return 20.00 USD Added on Your interest wallet Balance', 'interest', '8WFYHHP1N464', '7680.00000000', '2022-09-24 16:30:02', '2022-09-24 16:30:02'),
(356, 1, '20.00', '0', '+', 'Interest Return 20.00 USD Added on Your interest wallet Balance', 'interest', 'HH5Q2AKBMUZK', '7700.00000000', '2022-09-24 18:00:02', '2022-09-24 18:00:02'),
(357, 1, '20.00', '0', '+', 'Interest Return 20.00 USD Added on Your interest wallet Balance', 'interest', 'SOWT3EQWVZN5', '7720.00000000', '2022-09-24 19:30:01', '2022-09-24 19:30:01'),
(358, 1, '20.00', '0', '+', 'Interest Return 20.00 USD Added on Your interest wallet Balance', 'interest', '4JMJBMJ5TBP6', '7740.00000000', '2022-09-24 20:30:01', '2022-09-24 20:30:01'),
(359, 1, '20.00', '0', '+', 'Interest Return 20.00 USD Added on Your interest wallet Balance', 'interest', 'XG3EDAWHEHWV', '7760.00000000', '2022-09-24 21:30:01', '2022-09-24 21:30:01'),
(360, 1, '20.00', '0', '+', 'Interest Return 20.00 USD Added on Your interest wallet Balance', 'interest', 'W4NFUKBPF64H', '7780.00000000', '2022-09-24 22:30:02', '2022-09-24 22:30:02'),
(361, 1, '20.00', '0', '+', 'Interest Return 20.00 USD Added on Your interest wallet Balance', 'interest', 'JWCSKHASQ2T1', '7800.00000000', '2022-09-24 23:30:01', '2022-09-24 23:30:01'),
(362, 1, '20.00', '0', '+', 'Interest Return 20.00 USD Added on Your interest wallet Balance', 'interest', 'C4MZVTMY5DRH', '7820.00000000', '2022-09-25 00:30:01', '2022-09-25 00:30:01'),
(363, 1, '20.00', '0', '+', 'Interest Return 20.00 USD Added on Your interest wallet Balance', 'interest', 'GYWCK6W37RTY', '7840.00000000', '2022-09-25 01:30:01', '2022-09-25 01:30:01'),
(364, 1, '20.00', '0', '+', 'Interest Return 20.00 USD Added on Your interest wallet Balance', 'interest', '2K9HMTCYKK3X', '7860.00000000', '2022-09-25 02:30:02', '2022-09-25 02:30:02'),
(365, 1, '20.00', '0', '+', 'Interest Return 20.00 USD Added on Your interest wallet Balance', 'interest', 'WEM7D2BXTGDQ', '7880.00000000', '2022-09-25 04:00:01', '2022-09-25 04:00:01'),
(366, 1, '20.00', '0', '+', 'Interest Return 20.00 USD Added on Your interest wallet Balance', 'interest', 'JA7HNDPWVOOP', '7900.00000000', '2022-09-25 05:00:01', '2022-09-25 05:00:01'),
(367, 1, '20.00', '0', '+', 'Interest Return 20.00 USD Added on Your interest wallet Balance', 'interest', '48XGH33YXFV1', '7920.00000000', '2022-09-25 06:00:01', '2022-09-25 06:00:01'),
(368, 1, '20.00', '0', '+', 'Interest Return 20.00 USD Added on Your interest wallet Balance', 'interest', 'QFDDAMSKS9GZ', '7940.00000000', '2022-09-25 07:00:01', '2022-09-25 07:00:01'),
(369, 1, '20.00', '0', '+', 'Interest Return 20.00 USD Added on Your interest wallet Balance', 'interest', '1UTPNODWJ7PE', '7960.00000000', '2022-09-25 08:00:01', '2022-09-25 08:00:01'),
(370, 1, '20.00', '0', '+', 'Interest Return 20.00 USD Added on Your interest wallet Balance', 'interest', 'UVT99VHQSXJA', '7980.00000000', '2022-09-25 09:00:01', '2022-09-25 09:00:01'),
(371, 1, '20.00', '0', '+', 'Interest Return 20.00 USD Added on Your interest wallet Balance', 'interest', 'T1VCNDD2CGS7', '8000.00000000', '2022-09-25 10:00:02', '2022-09-25 10:00:02'),
(372, 1, '20.00', '0', '+', 'Interest Return 20.00 USD Added on Your interest wallet Balance', 'interest', 'ADUCJDTDH94Z', '8020.00000000', '2022-09-25 11:30:01', '2022-09-25 11:30:01'),
(373, 1, '20.00', '0', '+', 'Interest Return 20.00 USD Added on Your interest wallet Balance', 'interest', 'Z61UO1Z8MADX', '8040.00000000', '2022-09-25 12:30:01', '2022-09-25 12:30:01'),
(374, 1, '2.50', '0', '+', 'Interest Return 2.50 USD Added on Your interest wallet Wallet', 'interest', 'KQBVZW96STQP', '8042.50000000', '2022-09-25 13:00:01', '2022-09-25 13:00:01'),
(375, 1, '20.00', '0', '+', 'Interest Return 20.00 USD Added on Your interest wallet Balance', 'interest', 'YO5YNM2QBWXR', '8062.50000000', '2022-09-25 13:30:01', '2022-09-25 13:30:01'),
(376, 1, '20.00', '0', '+', 'Interest Return 20.00 USD Added on Your interest wallet Balance', 'interest', 'RVVQTGXOJ2EO', '8082.50000000', '2022-09-25 14:30:01', '2022-09-25 14:30:01'),
(377, 1, '20.00', '0', '+', 'Interest Return 20.00 USD Added on Your interest wallet Balance', 'interest', 'QC8XPP5CO28Z', '8102.50000000', '2022-09-25 15:30:01', '2022-09-25 15:30:01'),
(378, 1, '20.00', '0', '+', 'Interest Return 20.00 USD Added on Your interest wallet Balance', 'interest', 'WH12JRCFZB3J', '8122.50000000', '2022-09-25 16:30:01', '2022-09-25 16:30:01'),
(379, 1, '20.00', '0', '+', 'Interest Return 20.00 USD Added on Your interest wallet Balance', 'interest', '3SZ6O6GBBR4P', '8142.50000000', '2022-09-25 17:30:02', '2022-09-25 17:30:02'),
(380, 1, '20.00', '0', '+', 'Interest Return 20.00 USD Added on Your interest wallet Balance', 'interest', 'X4YEXQY2KWJK', '8162.50000000', '2022-09-25 19:00:01', '2022-09-25 19:00:01'),
(381, 1, '20.00', '0', '+', 'Interest Return 20.00 USD Added on Your interest wallet Balance', 'interest', 'ZQMSRQDQMZE8', '8182.50000000', '2022-09-25 20:00:01', '2022-09-25 20:00:01'),
(382, 1, '20.00', '0', '+', 'Interest Return 20.00 USD Added on Your interest wallet Balance', 'interest', 'WOO2RPBN33UH', '8202.50000000', '2022-09-25 21:00:01', '2022-09-25 21:00:01'),
(383, 1, '20.00', '0', '+', 'Interest Return 20.00 USD Added on Your interest wallet Balance', 'interest', 'DCWMVT5AA9VK', '8222.50000000', '2022-09-25 22:00:01', '2022-09-25 22:00:01'),
(384, 1, '20.00', '0', '+', 'Interest Return 20.00 USD Added on Your interest wallet Balance', 'interest', '431YNVUB3QGK', '8242.50000000', '2022-09-25 23:00:01', '2022-09-25 23:00:01'),
(385, 1, '20.00', '0', '+', 'Interest Return 20.00 USD Added on Your interest wallet Balance', 'interest', '7BWTEJ9MMW55', '8262.50000000', '2022-09-26 00:00:01', '2022-09-26 00:00:01'),
(386, 1, '20.00', '0', '+', 'Interest Return 20.00 USD Added on Your interest wallet Balance', 'interest', '84VX9SQ9PUJH', '8282.50000000', '2022-09-26 01:00:01', '2022-09-26 01:00:01'),
(387, 1, '20.00', '0', '+', 'Interest Return 20.00 USD Added on Your interest wallet Balance', 'interest', 'JPDHAECDVUHV', '8302.50000000', '2022-09-26 02:00:01', '2022-09-26 02:00:01'),
(388, 1, '20.00', '0', '+', 'Interest Return 20.00 USD Added on Your interest wallet Balance', 'interest', '1G9QSCTUXF7V', '8322.50000000', '2022-09-26 03:00:02', '2022-09-26 03:00:02'),
(389, 1, '20.00', '0', '+', 'Interest Return 20.00 USD Added on Your interest wallet Balance', 'interest', 'NSTKGY17OTGA', '8342.50000000', '2022-09-26 04:30:01', '2022-09-26 04:30:01'),
(390, 1, '20.00', '0', '+', 'Interest Return 20.00 USD Added on Your interest wallet Balance', 'interest', 'YRFAQKESPMFY', '8362.50000000', '2022-09-26 05:30:01', '2022-09-26 05:30:01'),
(391, 1, '20.00', '0', '+', 'Interest Return 20.00 USD Added on Your interest wallet Balance', 'interest', 'JCWE1ANDERMY', '8382.50000000', '2022-09-26 06:30:02', '2022-09-26 06:30:02'),
(392, 1, '20.00', '0', '+', 'Interest Return 20.00 USD Added on Your interest wallet Balance', 'interest', 'R5BD74DEG1P2', '8402.50000000', '2022-09-26 07:30:01', '2022-09-26 07:30:01'),
(393, 1, '20.00', '0', '+', 'Interest Return 20.00 USD Added on Your interest wallet Balance', 'interest', 'SME5MH7SMF3F', '8422.50000000', '2022-09-26 08:30:01', '2022-09-26 08:30:01'),
(394, 1, '20.00', '0', '+', 'Interest Return 20.00 USD Added on Your interest wallet Balance', 'interest', 'DSDQT48QHUOH', '8442.50000000', '2022-09-26 09:30:01', '2022-09-26 09:30:01'),
(395, 1, '20.00', '0', '+', 'Interest Return 20.00 USD Added on Your interest wallet Balance', 'interest', 'DZ2BNNQGCGSH', '8462.50000000', '2022-09-26 10:30:01', '2022-09-26 10:30:01'),
(396, 1, '20.00', '0', '+', 'Interest Return 20.00 USD Added on Your interest wallet Balance', 'interest', 'GBSD2CHHYUSU', '8482.50000000', '2022-09-26 11:30:02', '2022-09-26 11:30:02'),
(397, 1, '2.50', '0', '+', 'Interest Return 2.50 USD Added on Your interest wallet Wallet', 'interest', 'F8KHHP2VNG1M', '8485.00000000', '2022-09-26 13:00:01', '2022-09-26 13:00:01'),
(398, 1, '20.00', '0', '+', 'Interest Return 20.00 USD Added on Your interest wallet Balance', 'interest', '9WB9W5A1ZRHZ', '8505.00000000', '2022-09-26 13:00:01', '2022-09-26 13:00:01'),
(399, 1, '20.00', '0', '+', 'Interest Return 20.00 USD Added on Your interest wallet Balance', 'interest', 'G1U34W6FYAQD', '8525.00000000', '2022-09-26 14:00:01', '2022-09-26 14:00:01'),
(400, 1, '20.00', '0', '+', 'Interest Return 20.00 USD Added on Your interest wallet Balance', 'interest', '8G6YUXC1EQ6M', '8545.00000000', '2022-09-26 15:00:01', '2022-09-26 15:00:01'),
(401, 1, '20.00', '0', '+', 'Interest Return 20.00 USD Added on Your interest wallet Balance', 'interest', '7PTM3XVROYG9', '8565.00000000', '2022-09-26 16:00:01', '2022-09-26 16:00:01'),
(402, 1, '20.00', '0', '+', 'Interest Return 20.00 USD Added on Your interest wallet Balance', 'interest', '2SFRNTFMFPS6', '8585.00000000', '2022-09-26 17:00:01', '2022-09-26 17:00:01'),
(403, 1, '20.00', '0', '+', 'Interest Return 20.00 USD Added on Your interest wallet Balance', 'interest', '5FRYOH6Y983K', '8605.00000000', '2022-09-26 18:00:02', '2022-09-26 18:00:02'),
(404, 1, '20.00', '0', '+', 'Interest Return 20.00 USD Added on Your interest wallet Balance', 'interest', '9AOXXH47CY86', '8625.00000000', '2022-09-26 19:30:02', '2022-09-26 19:30:02'),
(405, 1, '20.00', '0', '+', 'Interest Return 20.00 USD Added on Your interest wallet Balance', 'interest', 'FSFTATAKSCRZ', '8645.00000000', '2022-09-26 20:30:02', '2022-09-26 20:30:02'),
(406, 1, '20.00', '0', '+', 'Interest Return 20.00 USD Added on Your interest wallet Balance', 'interest', 'U6JEEB63GT9C', '8665.00000000', '2022-09-26 22:00:02', '2022-09-26 22:00:02'),
(407, 1, '20.00', '0', '+', 'Interest Return 20.00 USD Added on Your interest wallet Balance', 'interest', '5S7KPE9BSSQ5', '8685.00000000', '2022-09-26 23:30:01', '2022-09-26 23:30:01'),
(408, 1, '20.00', '0', '+', 'Interest Return 20.00 USD Added on Your interest wallet Balance', 'interest', 'JMJF3FZ2HHTR', '8705.00000000', '2022-09-27 00:30:01', '2022-09-27 00:30:01'),
(409, 1, '20.00', '0', '+', 'Interest Return 20.00 USD Added on Your interest wallet Balance', 'interest', 'JTV6OB3P6BDB', '8725.00000000', '2022-09-27 01:30:01', '2022-09-27 01:30:01'),
(410, 1, '20.00', '0', '+', 'Interest Return 20.00 USD Added on Your interest wallet Balance', 'interest', 'VG3RDFG3V4CT', '8745.00000000', '2022-09-27 02:30:02', '2022-09-27 02:30:02'),
(411, 1, '20.00', '0', '+', 'Interest Return 20.00 USD Added on Your interest wallet Balance', 'interest', 'EQNAGEMQ4TAM', '8765.00000000', '2022-09-27 04:00:01', '2022-09-27 04:00:01'),
(412, 1, '20.00', '0', '+', 'Interest Return 20.00 USD Added on Your interest wallet Balance', 'interest', 'A76WQAXODUAQ', '8785.00000000', '2022-09-27 05:00:01', '2022-09-27 05:00:01'),
(413, 1, '20.00', '0', '+', 'Interest Return 20.00 USD Added on Your interest wallet Balance', 'interest', '5P9D8W3KQFYW', '8805.00000000', '2022-09-27 06:00:01', '2022-09-27 06:00:01'),
(414, 1, '20.00', '0', '+', 'Interest Return 20.00 USD Added on Your interest wallet Balance', 'interest', 'J5S6FOR9111A', '8825.00000000', '2022-09-27 07:00:01', '2022-09-27 07:00:01'),
(415, 1, '20.00', '0', '+', 'Interest Return 20.00 USD Added on Your interest wallet Balance', 'interest', 'CMHW8N26JNRZ', '8845.00000000', '2022-09-27 08:00:01', '2022-09-27 08:00:01'),
(416, 1, '20.00', '0', '+', 'Interest Return 20.00 USD Added on Your interest wallet Balance', 'interest', 'HWV4AOOCK6H4', '8865.00000000', '2022-09-27 09:00:01', '2022-09-27 09:00:01'),
(417, 1, '20.00', '0', '+', 'Interest Return 20.00 USD Added on Your interest wallet Balance', 'interest', '5M3F34WW8EHD', '8885.00000000', '2022-09-27 10:00:02', '2022-09-27 10:00:02'),
(418, 1, '20.00', '0', '+', 'Interest Return 20.00 USD Added on Your interest wallet Balance', 'interest', 'GDJCHWR75M3C', '8905.00000000', '2022-09-27 11:30:02', '2022-09-27 11:30:02'),
(419, 1, '2.50', '0', '+', 'Interest Return 2.50 USD Added on Your interest wallet Wallet', 'interest', 'ES4UKPTBO16F', '8907.50000000', '2022-09-27 13:00:01', '2022-09-27 13:00:01'),
(420, 1, '20.00', '0', '+', 'Interest Return 20.00 USD Added on Your interest wallet Balance', 'interest', '68HQA4URQ2TM', '8927.50000000', '2022-09-27 13:00:01', '2022-09-27 13:00:01'),
(421, 1, '20.00', '0', '+', 'Interest Return 20.00 USD Added on Your interest wallet Balance', 'interest', 'GCXVUMMOB1CM', '8947.50000000', '2022-09-27 14:00:02', '2022-09-27 14:00:02'),
(422, 1, '20.00', '0', '+', 'Interest Return 20.00 USD Added on Your interest wallet Balance', 'interest', 'XZ7UO16PNPTU', '8967.50000000', '2022-09-27 15:30:01', '2022-09-27 15:30:01'),
(423, 1, '20.00', '0', '+', 'Interest Return 20.00 USD Added on Your interest wallet Balance', 'interest', 'GCJPG3PDG7E9', '8987.50000000', '2022-09-27 16:30:01', '2022-09-27 16:30:01'),
(424, 1, '20.00', '0', '+', 'Interest Return 20.00 USD Added on Your interest wallet Balance', 'interest', 'CW8WOCBFNBYA', '9007.50000000', '2022-09-27 17:30:01', '2022-09-27 17:30:01'),
(425, 1, '20.00', '0', '+', 'Interest Return 20.00 USD Added on Your interest wallet Balance', 'interest', 'KHOSRWCQKHXG', '9027.50000000', '2022-09-27 18:30:01', '2022-09-27 18:30:01'),
(426, 1, '20.00', '0', '+', 'Interest Return 20.00 USD Added on Your interest wallet Balance', 'interest', 'TXCHOMRR8XZP', '9047.50000000', '2022-09-27 19:30:01', '2022-09-27 19:30:01'),
(427, 1, '20.00', '0', '+', 'Interest Return 20.00 USD Added on Your interest wallet Balance', 'interest', 'Z3TCHMVV5SHN', '9067.50000000', '2022-09-27 20:30:02', '2022-09-27 20:30:02'),
(428, 1, '20.00', '0', '+', 'Interest Return 20.00 USD Added on Your interest wallet Balance', 'interest', 'HMH65RB1SO87', '9087.50000000', '2022-09-27 22:00:02', '2022-09-27 22:00:02'),
(429, 1, '20.00', '0', '+', 'Interest Return 20.00 USD Added on Your interest wallet Balance', 'interest', '6GKFT5BYQOAG', '9107.50000000', '2022-09-27 23:30:02', '2022-09-27 23:30:02'),
(430, 1, '20.00', '0', '+', 'Interest Return 20.00 USD Added on Your interest wallet Balance', 'interest', 'YC3BZ8O7YGK7', '9127.50000000', '2022-09-28 01:00:01', '2022-09-28 01:00:01'),
(431, 1, '20.00', '0', '+', 'Interest Return 20.00 USD Added on Your interest wallet Balance', 'interest', '3PSV62MOC53C', '9147.50000000', '2022-09-28 02:00:02', '2022-09-28 02:00:02'),
(432, 1, '20.00', '0', '+', 'Interest Return 20.00 USD Added on Your interest wallet Balance', 'interest', 'PWHFQREOONU6', '9167.50000000', '2022-09-28 03:30:01', '2022-09-28 03:30:01'),
(433, 1, '20.00', '0', '+', 'Interest Return 20.00 USD Added on Your interest wallet Balance', 'interest', 'DE9HDHRRTN3X', '9187.50000000', '2022-09-28 04:30:02', '2022-09-28 04:30:02'),
(434, 1, '20.00', '0', '+', 'Interest Return 20.00 USD Added on Your interest wallet Balance', 'interest', 'H9ZZ92PTEQT2', '9207.50000000', '2022-09-28 06:00:02', '2022-09-28 06:00:02'),
(435, 1, '20.00', '0', '+', 'Interest Return 20.00 USD Added on Your interest wallet Balance', 'interest', '1EW2KHVJQ8KB', '9227.50000000', '2022-09-28 07:30:01', '2022-09-28 07:30:01'),
(436, 1, '20.00', '0', '+', 'Interest Return 20.00 USD Added on Your interest wallet Balance', 'interest', 'ZM778OC5WGT8', '9247.50000000', '2022-09-28 08:30:01', '2022-09-28 08:30:01'),
(437, 1, '20.00', '0', '+', 'Interest Return 20.00 USD Added on Your interest wallet Balance', 'interest', 'PYDCD27KE5EK', '9267.50000000', '2022-09-28 09:30:01', '2022-09-28 09:30:01'),
(438, 1, '20.00', '0', '+', 'Interest Return 20.00 USD Added on Your interest wallet Balance', 'interest', 'VF7G9T98OWCD', '9287.50000000', '2022-09-28 10:30:01', '2022-09-28 10:30:01'),
(439, 1, '20.00', '0', '+', 'Interest Return 20.00 USD Added on Your interest wallet Balance', 'interest', 'JB71CTOOT3GK', '9307.50000000', '2022-09-28 11:30:01', '2022-09-28 11:30:01'),
(440, 1, '20.00', '0', '+', 'Interest Return 20.00 USD Added on Your interest wallet Balance', 'interest', 'CZ59XAQG9HXJ', '9327.50000000', '2022-09-28 12:30:01', '2022-09-28 12:30:01'),
(441, 1, '2.50', '0', '+', 'Interest Return 2.50 USD Added on Your interest wallet Wallet', 'interest', 'XKYR21Q5J4DM', '9330.00000000', '2022-09-28 13:00:01', '2022-09-28 13:00:01'),
(442, 1, '20.00', '0', '+', 'Interest Return 20.00 USD Added on Your interest wallet Balance', 'interest', 'MNRG78WY43VM', '9350.00000000', '2022-09-28 13:30:01', '2022-09-28 13:30:01'),
(443, 1, '20.00', '0', '+', 'Interest Return 20.00 USD Added on Your interest wallet Balance', 'interest', '5DC9FNDOMK1E', '9370.00000000', '2022-09-28 14:30:02', '2022-09-28 14:30:02'),
(444, 1, '20.00', '0', '+', 'Interest Return 20.00 USD Added on Your interest wallet Balance', 'interest', 'R6449D4Q6CHW', '9390.00000000', '2022-09-28 16:00:02', '2022-09-28 16:00:02'),
(445, 1, '20.00', '0', '+', 'Interest Return 20.00 USD Added on Your interest wallet Balance', 'interest', '15KVZ6N1TMH8', '9410.00000000', '2022-09-28 17:30:01', '2022-09-28 17:30:01'),
(446, 1, '20.00', '0', '+', 'Interest Return 20.00 USD Added on Your interest wallet Balance', 'interest', 'HW5JV4J2B1RH', '9430.00000000', '2022-09-28 18:30:01', '2022-09-28 18:30:01'),
(447, 1, '20.00', '0', '+', 'Interest Return 20.00 USD Added on Your interest wallet Balance', 'interest', '6J2XTJGMCSZ8', '9450.00000000', '2022-09-28 19:30:02', '2022-09-28 19:30:02'),
(448, 1, '20.00', '0', '+', 'Interest Return 20.00 USD Added on Your interest wallet Balance', 'interest', 'E1GZTO9Q4P5M', '9470.00000000', '2022-09-28 21:00:01', '2022-09-28 21:00:01'),
(449, 1, '20.00', '0', '+', 'Interest Return 20.00 USD Added on Your interest wallet Balance', 'interest', '18HPB4BX9BKF', '9490.00000000', '2022-09-28 22:00:01', '2022-09-28 22:00:01'),
(450, 1, '20.00', '0', '+', 'Interest Return 20.00 USD Added on Your interest wallet Balance', 'interest', 'YKAO5OZ6HA57', '9510.00000000', '2022-09-28 23:00:01', '2022-09-28 23:00:01'),
(451, 1, '20.00', '0', '+', 'Interest Return 20.00 USD Added on Your interest wallet Balance', 'interest', 'M7C21T9NR1FG', '9530.00000000', '2022-09-29 00:00:01', '2022-09-29 00:00:01'),
(452, 1, '20.00', '0', '+', 'Interest Return 20.00 USD Added on Your interest wallet Balance', 'interest', 'ECOPB1XJZH64', '9550.00000000', '2022-09-29 01:00:01', '2022-09-29 01:00:01'),
(453, 1, '20.00', '0', '+', 'Interest Return 20.00 USD Added on Your interest wallet Balance', 'interest', 'BVN1CE1D4SYR', '9570.00000000', '2022-09-29 02:00:02', '2022-09-29 02:00:02'),
(454, 1, '20.00', '0', '+', 'Interest Return 20.00 USD Added on Your interest wallet Balance', 'interest', 'PQSC7789YXKQ', '9590.00000000', '2022-09-29 03:30:01', '2022-09-29 03:30:01'),
(455, 1, '20.00', '0', '+', 'Interest Return 20.00 USD Added on Your interest wallet Balance', 'interest', '945FPC287R63', '9610.00000000', '2022-09-29 04:30:01', '2022-09-29 04:30:01'),
(456, 1, '20.00', '0', '+', 'Interest Return 20.00 USD Added on Your interest wallet Balance', 'interest', 'MSQPCJY9R57K', '9630.00000000', '2022-09-29 05:30:01', '2022-09-29 05:30:01'),
(457, 1, '20.00', '0', '+', 'Interest Return 20.00 USD Added on Your interest wallet Balance', 'interest', 'MJUTXQ3KC81C', '9650.00000000', '2022-09-29 06:30:02', '2022-09-29 06:30:02'),
(458, 1, '20.00', '0', '+', 'Interest Return 20.00 USD Added on Your interest wallet Balance', 'interest', 'FNGNWGSA56OF', '9670.00000000', '2022-09-29 08:00:01', '2022-09-29 08:00:01'),
(459, 1, '20.00', '0', '+', 'Interest Return 20.00 USD Added on Your interest wallet Balance', 'interest', '8AGBT94SFVWA', '9690.00000000', '2022-09-29 09:00:01', '2022-09-29 09:00:01'),
(460, 1, '20.00', '0', '+', 'Interest Return 20.00 USD Added on Your interest wallet Balance', 'interest', 'XW65GY9MTR9H', '9710.00000000', '2022-09-29 10:00:02', '2022-09-29 10:00:02'),
(461, 1, '20.00', '0', '+', 'Interest Return 20.00 USD Added on Your interest wallet Balance', 'interest', 'V64NWG9MESZJ', '9730.00000000', '2022-09-29 11:00:02', '2022-09-29 11:00:02'),
(462, 1, '20.00', '0', '+', 'Interest Return 20.00 USD Added on Your interest wallet Balance', 'interest', '1AHHYSO2NH9A', '9750.00000000', '2022-09-29 12:30:02', '2022-09-29 12:30:02'),
(463, 1, '2.50', '0', '+', 'Interest Return 2.50 USD Added on Your interest wallet Wallet', 'interest', 'O2GPRWFWH6CG', '9752.50000000', '2022-09-29 13:00:01', '2022-09-29 13:00:01'),
(464, 1, '20.00', '0', '+', 'Interest Return 20.00 USD Added on Your interest wallet Balance', 'interest', 'D19PEFBMOVCU', '9772.50000000', '2022-09-29 14:00:01', '2022-09-29 14:00:01'),
(465, 1, '20.00', '0', '+', 'Interest Return 20.00 USD Added on Your interest wallet Balance', 'interest', '6RBSVZDF4T9H', '9792.50000000', '2022-09-29 15:00:01', '2022-09-29 15:00:01'),
(466, 1, '20.00', '0', '+', 'Interest Return 20.00 USD Added on Your interest wallet Balance', 'interest', '1R2DVYYJKJBF', '9812.50000000', '2022-09-29 16:00:01', '2022-09-29 16:00:01'),
(467, 1, '20.00', '0', '+', 'Interest Return 20.00 USD Added on Your interest wallet Balance', 'interest', 'U7295ZFWN5SA', '9832.50000000', '2022-09-29 17:00:02', '2022-09-29 17:00:02'),
(468, 1, '20.00', '0', '+', 'Interest Return 20.00 USD Added on Your interest wallet Balance', 'interest', 'JY5RRQCFDEUT', '9852.50000000', '2022-09-29 18:00:02', '2022-09-29 18:00:02'),
(469, 1, '20.00', '0', '+', 'Interest Return 20.00 USD Added on Your interest wallet Balance', 'interest', '5VWJJ4H6XVDM', '9872.50000000', '2022-09-29 19:30:01', '2022-09-29 19:30:01'),
(470, 1, '20.00', '0', '+', 'Interest Return 20.00 USD Added on Your interest wallet Balance', 'interest', 'H5U4RGMVD881', '9892.50000000', '2022-09-29 20:30:02', '2022-09-29 20:30:02'),
(471, 1, '20.00', '0', '+', 'Interest Return 20.00 USD Added on Your interest wallet Balance', 'interest', '2QYDF411A6VC', '9912.50000000', '2022-09-29 21:30:02', '2022-09-29 21:30:02'),
(472, 1, '20.00', '0', '+', 'Interest Return 20.00 USD Added on Your interest wallet Balance', 'interest', '4JWFY3N5KPNZ', '9932.50000000', '2022-09-29 22:30:02', '2022-09-29 22:30:02'),
(473, 1, '20.00', '0', '+', 'Interest Return 20.00 USD Added on Your interest wallet Balance', 'interest', 'SEVE94PKD7HN', '9952.50000000', '2022-09-30 00:00:02', '2022-09-30 00:00:02'),
(474, 1, '20.00', '0', '+', 'Interest Return 20.00 USD Added on Your interest wallet Balance', 'interest', 'R1NY1TPY8AFW', '9972.50000000', '2022-09-30 01:30:01', '2022-09-30 01:30:01'),
(475, 1, '20.00', '0', '+', 'Interest Return 20.00 USD Added on Your interest wallet Balance', 'interest', 'ASNOV2NTFJW2', '9992.50000000', '2022-09-30 02:30:01', '2022-09-30 02:30:01'),
(476, 1, '20.00', '0', '+', 'Interest Return 20.00 USD Added on Your interest wallet Balance', 'interest', '7Q532UBTTGAY', '10012.50000000', '2022-09-30 03:30:02', '2022-09-30 03:30:02'),
(477, 1, '20.00', '0', '+', 'Interest Return 20.00 USD Added on Your interest wallet Balance', 'interest', 'EA159X3MD3XJ', '10032.50000000', '2022-09-30 05:00:02', '2022-09-30 05:00:02'),
(478, 1, '20.00', '0', '+', 'Interest Return 20.00 USD Added on Your interest wallet Balance', 'interest', 'Y6DZ59S85TB1', '10052.50000000', '2022-09-30 06:30:02', '2022-09-30 06:30:02'),
(479, 1, '20.00', '0', '+', 'Interest Return 20.00 USD Added on Your interest wallet Balance', 'interest', 'PXSQGMW8Q1ZF', '10072.50000000', '2022-09-30 08:00:01', '2022-09-30 08:00:01'),
(480, 1, '20.00', '0', '+', 'Interest Return 20.00 USD Added on Your interest wallet Balance', 'interest', 'HT2B98RN984J', '10092.50000000', '2022-09-30 09:00:01', '2022-09-30 09:00:01'),
(481, 1, '20.00', '0', '+', 'Interest Return 20.00 USD Added on Your interest wallet Balance', 'interest', '99TQXVW8TYST', '10112.50000000', '2022-09-30 10:00:02', '2022-09-30 10:00:02'),
(482, 1, '20.00', '0', '+', 'Interest Return 20.00 USD Added on Your interest wallet Balance', 'interest', '9EXUZFWA8HYU', '10132.50000000', '2022-09-30 11:30:01', '2022-09-30 11:30:01'),
(483, 1, '20.00', '0', '+', 'Interest Return 20.00 USD Added on Your interest wallet Balance', 'interest', 'NSB8387KMM3T', '10152.50000000', '2022-09-30 12:30:01', '2022-09-30 12:30:01'),
(484, 1, '2.50', '0', '+', 'Interest Return 2.50 USD Added on Your interest wallet Wallet', 'interest', 'DVTWCKOOSYQV', '10155.00000000', '2022-09-30 13:00:01', '2022-09-30 13:00:01'),
(485, 1, '20.00', '0', '+', 'Interest Return 20.00 USD Added on Your interest wallet Balance', 'interest', 'WWNPBYXFOC8C', '10175.00000000', '2022-09-30 13:30:01', '2022-09-30 13:30:01'),
(486, 1, '20.00', '0', '+', 'Interest Return 20.00 USD Added on Your interest wallet Balance', 'interest', 'GR1A8XYJXXPJ', '10195.00000000', '2022-09-30 14:30:01', '2022-09-30 14:30:01'),
(487, 1, '20.00', '0', '+', 'Interest Return 20.00 USD Added on Your interest wallet Balance', 'interest', 'PQMQOH3WOT3V', '10215.00000000', '2022-09-30 15:30:01', '2022-09-30 15:30:01'),
(488, 1, '20.00', '0', '+', 'Interest Return 20.00 USD Added on Your interest wallet Balance', 'interest', 'QBPKNHNW4G7Z', '10235.00000000', '2022-09-30 16:30:01', '2022-09-30 16:30:01'),
(489, 1, '20.00', '0', '+', 'Interest Return 20.00 USD Added on Your interest wallet Balance', 'interest', '6PQBYMXAEV6J', '10255.00000000', '2022-09-30 17:30:02', '2022-09-30 17:30:02'),
(490, 1, '20.00', '0', '+', 'Interest Return 20.00 USD Added on Your interest wallet Balance', 'interest', 'M8U91TOAJ74X', '10275.00000000', '2022-09-30 19:00:01', '2022-09-30 19:00:01'),
(491, 1, '20.00', '0', '+', 'Interest Return 20.00 USD Added on Your interest wallet Balance', 'interest', 'PZRF4VHZU6D3', '10295.00000000', '2022-09-30 20:00:01', '2022-09-30 20:00:01'),
(492, 1, '20.00', '0', '+', 'Interest Return 20.00 USD Added on Your interest wallet Balance', 'interest', 'ZGUSECPDEZYN', '10315.00000000', '2022-09-30 21:00:01', '2022-09-30 21:00:01'),
(493, 1, '20.00', '0', '+', 'Interest Return 20.00 USD Added on Your interest wallet Balance', 'interest', 'B41CMUZPVBGT', '10335.00000000', '2022-09-30 22:00:01', '2022-09-30 22:00:01'),
(494, 1, '20.00', '0', '+', 'Interest Return 20.00 USD Added on Your interest wallet Balance', 'interest', 'BT7FP725RRMG', '10355.00000000', '2022-09-30 23:00:01', '2022-09-30 23:00:01'),
(495, 1, '20.00', '0', '+', 'Interest Return 20.00 USD Added on Your interest wallet Balance', 'interest', 'CFYD3U13QWBW', '10375.00000000', '2022-10-01 00:00:01', '2022-10-01 00:00:01'),
(496, 1, '20.00', '0', '+', 'Interest Return 20.00 USD Added on Your interest wallet Balance', 'interest', 'PV4G878BNPXP', '10395.00000000', '2022-10-01 01:00:01', '2022-10-01 01:00:01'),
(497, 1, '20.00', '0', '+', 'Interest Return 20.00 USD Added on Your interest wallet Balance', 'interest', '3R2WRKKSHVAJ', '10415.00000000', '2022-10-01 02:00:02', '2022-10-01 02:00:02'),
(498, 1, '20.00', '0', '+', 'Interest Return 20.00 USD Added on Your interest wallet Balance', 'interest', '9JGSSMP1J8AA', '10435.00000000', '2022-10-01 03:30:01', '2022-10-01 03:30:01'),
(499, 1, '20.00', '0', '+', 'Interest Return 20.00 USD Added on Your interest wallet Balance', 'interest', 'KQV99G3NRWBF', '10455.00000000', '2022-10-01 04:30:01', '2022-10-01 04:30:01'),
(500, 1, '20.00', '0', '+', 'Interest Return 20.00 USD Added on Your interest wallet Balance', 'interest', 'S4XX9J14ZF1O', '10475.00000000', '2022-10-01 05:30:01', '2022-10-01 05:30:01'),
(501, 1, '20.00', '0', '+', 'Interest Return 20.00 USD Added on Your interest wallet Balance', 'interest', 'JFRXCC46G2TE', '10495.00000000', '2022-10-01 06:30:01', '2022-10-01 06:30:01'),
(502, 1, '20.00', '0', '+', 'Interest Return 20.00 USD Added on Your interest wallet Balance', 'interest', 'TNA74QY4FUYW', '10515.00000000', '2022-10-01 07:30:01', '2022-10-01 07:30:01'),
(503, 1, '20.00', '0', '+', 'Interest Return 20.00 USD Added on Your interest wallet Balance', 'interest', '93CN41KR8YEG', '10535.00000000', '2022-10-01 08:30:01', '2022-10-01 08:30:01'),
(504, 1, '20.00', '0', '+', 'Interest Return 20.00 USD Added on Your interest wallet Balance', 'interest', 'WVXJ2H13E1OG', '10555.00000000', '2022-10-01 09:30:01', '2022-10-01 09:30:01'),
(505, 1, '20.00', '0', '+', 'Interest Return 20.00 USD Added on Your interest wallet Balance', 'interest', 'BEWNFAZENKV7', '10575.00000000', '2022-10-01 10:30:02', '2022-10-01 10:30:02'),
(506, 1, '20.00', '0', '+', 'Interest Return 20.00 USD Added on Your interest wallet Balance', 'interest', '4EFKU59PNMYU', '10595.00000000', '2022-10-01 12:00:01', '2022-10-01 12:00:01'),
(507, 1, '2.50', '0', '+', 'Interest Return 2.50 USD Added on Your interest wallet Wallet', 'interest', '2HE6TS1S87CQ', '10597.50000000', '2022-10-01 13:00:01', '2022-10-01 13:00:01'),
(508, 1, '20.00', '0', '+', 'Interest Return 20.00 USD Added on Your interest wallet Balance', 'interest', 'QZPW2JKPM1V1', '10617.50000000', '2022-10-01 13:00:01', '2022-10-01 13:00:01'),
(509, 1, '20.00', '0', '+', 'Interest Return 20.00 USD Added on Your interest wallet Balance', 'interest', 'P6F6VDDQJNJU', '10637.50000000', '2022-10-01 14:00:01', '2022-10-01 14:00:01'),
(510, 1, '20.00', '0', '+', 'Interest Return 20.00 USD Added on Your interest wallet Balance', 'interest', '1N8HWQ38ZWRY', '10657.50000000', '2022-10-01 15:00:01', '2022-10-01 15:00:01'),
(511, 1, '20.00', '0', '+', 'Interest Return 20.00 USD Added on Your interest wallet Balance', 'interest', 'NEZ3BQ8QZZBV', '10677.50000000', '2022-10-01 16:00:01', '2022-10-01 16:00:01'),
(512, 1, '20.00', '0', '+', 'Interest Return 20.00 USD Added on Your interest wallet Balance', 'interest', 'EE9BT4TMPCVN', '10697.50000000', '2022-10-01 17:00:01', '2022-10-01 17:00:01'),
(513, 1, '20.00', '0', '+', 'Interest Return 20.00 USD Added on Your interest wallet Balance', 'interest', 'ZO8P3YPS45VJ', '10717.50000000', '2022-10-01 18:00:01', '2022-10-01 18:00:01'),
(514, 1, '20.00', '0', '+', 'Interest Return 20.00 USD Added on Your interest wallet Balance', 'interest', 'JUAATP3S8XPU', '10737.50000000', '2022-10-01 19:00:01', '2022-10-01 19:00:01'),
(515, 1, '20.00', '0', '+', 'Interest Return 20.00 USD Added on Your interest wallet Balance', 'interest', 'UYYAKDP1BW7N', '10757.50000000', '2022-10-01 20:00:01', '2022-10-01 20:00:01'),
(516, 1, '20.00', '0', '+', 'Interest Return 20.00 USD Added on Your interest wallet Balance', 'interest', 'E7YM4M6BE3DS', '10777.50000000', '2022-10-01 21:00:02', '2022-10-01 21:00:02'),
(517, 1, '20.00', '0', '+', 'Interest Return 20.00 USD Added on Your interest wallet Balance', 'interest', '6BEV1V1BCX3U', '10797.50000000', '2022-10-01 22:30:01', '2022-10-01 22:30:01'),
(518, 1, '20.00', '0', '+', 'Interest Return 20.00 USD Added on Your interest wallet Balance', 'interest', 'AJQQRMH11U2V', '10817.50000000', '2022-10-01 23:30:01', '2022-10-01 23:30:01'),
(519, 1, '20.00', '0', '+', 'Interest Return 20.00 USD Added on Your interest wallet Balance', 'interest', '1YVMNDB7VAK6', '10837.50000000', '2022-10-02 00:30:01', '2022-10-02 00:30:01'),
(520, 1, '20.00', '0', '+', 'Interest Return 20.00 USD Added on Your interest wallet Balance', 'interest', 'VQ3FQQWJE1E5', '10857.50000000', '2022-10-02 01:30:01', '2022-10-02 01:30:01'),
(521, 1, '20.00', '0', '+', 'Interest Return 20.00 USD Added on Your interest wallet Balance', 'interest', 'ZPH9WHGX5Y6X', '10877.50000000', '2022-10-02 02:30:01', '2022-10-02 02:30:01'),
(522, 1, '20.00', '0', '+', 'Interest Return 20.00 USD Added on Your interest wallet Balance', 'interest', 'C8FADR1FFBQ7', '10897.50000000', '2022-10-02 03:30:01', '2022-10-02 03:30:01'),
(523, 1, '20.00', '0', '+', 'Interest Return 20.00 USD Added on Your interest wallet Balance', 'interest', 'OST9JC1EOJTM', '10917.50000000', '2022-10-02 04:30:01', '2022-10-02 04:30:01'),
(524, 1, '20.00', '0', '+', 'Interest Return 20.00 USD Added on Your interest wallet Balance', 'interest', 'O1B8AUSM8AFO', '10937.50000000', '2022-10-02 05:30:02', '2022-10-02 05:30:02'),
(525, 1, '20.00', '0', '+', 'Interest Return 20.00 USD Added on Your interest wallet Balance', 'interest', 'Q8GF6EVKD2UW', '10957.50000000', '2022-10-02 07:00:01', '2022-10-02 07:00:01'),
(526, 1, '20.00', '0', '+', 'Interest Return 20.00 USD Added on Your interest wallet Balance', 'interest', 'RD2HYCCSK8Y4', '10977.50000000', '2022-10-02 08:00:01', '2022-10-02 08:00:01'),
(527, 1, '20.00', '0', '+', 'Interest Return 20.00 USD Added on Your interest wallet Balance', 'interest', '3KM8K6TAHVHM', '10997.50000000', '2022-10-02 09:00:01', '2022-10-02 09:00:01'),
(528, 1, '20.00', '0', '+', 'Interest Return 20.00 USD Added on Your interest wallet Balance', 'interest', 'WA2CAP6DJQWW', '11017.50000000', '2022-10-02 10:00:01', '2022-10-02 10:00:01'),
(529, 1, '20.00', '0', '+', 'Interest Return 20.00 USD Added on Your interest wallet Balance', 'interest', 'YV6F96PX4NGX', '11037.50000000', '2022-10-02 11:00:01', '2022-10-02 11:00:01'),
(530, 1, '20.00', '0', '+', 'Interest Return 20.00 USD Added on Your interest wallet Balance', 'interest', 'R65NJ7UHESQR', '11057.50000000', '2022-10-02 12:00:01', '2022-10-02 12:00:01'),
(531, 1, '2.50', '0', '+', 'Interest Return 2.50 USD Added on Your interest wallet Wallet', 'interest', '8Q2X3B89ZS9P', '11060.00000000', '2022-10-02 13:00:01', '2022-10-02 13:00:01'),
(532, 1, '20.00', '0', '+', 'Interest Return 20.00 USD Added on Your interest wallet Balance', 'interest', 'ZP71A5RNOXO4', '11080.00000000', '2022-10-02 13:00:01', '2022-10-02 13:00:01'),
(533, 1, '20.00', '0', '+', 'Interest Return 20.00 USD Added on Your interest wallet Balance', 'interest', 'HTPHGQJA2Q33', '11100.00000000', '2022-10-02 14:00:02', '2022-10-02 14:00:02'),
(534, 1, '20.00', '0', '+', 'Interest Return 20.00 USD Added on Your interest wallet Balance', 'interest', 'R69YKNK28RJT', '11120.00000000', '2022-10-02 15:30:02', '2022-10-02 15:30:02'),
(535, 1, '20.00', '0', '+', 'Interest Return 20.00 USD Added on Your interest wallet Balance', 'interest', '9EAR9S6Z9V43', '11140.00000000', '2022-10-02 17:00:02', '2022-10-02 17:00:02'),
(536, 1, '10000000', '100025.00000000', '+', 'Deposit Via Bank Wire', 'manual_deposit', '24TSRNC288MJ', '10018500.00000000', '2022-10-02 18:03:28', '2022-10-02 18:03:28'),
(537, 1, '250000', '0', '-', 'Invested On TSLA', 'invest', 'M91ONNZCVJUF', '9768500.00000000', '2022-10-02 18:03:45', '2022-10-02 18:03:45'),
(538, 1, '20.00', '0', '+', 'Interest Return 20.00 USD Added on Your interest wallet Balance', 'interest', '9FF86AEQMZTH', '11160.00000000', '2022-10-02 18:30:01', '2022-10-02 18:30:01'),
(539, 1, '20.00', '0', '+', 'Interest Return 20.00 USD Added on Your interest wallet Balance', 'interest', 'U6DTBV9SSJ12', '11180.00000000', '2022-10-02 19:30:01', '2022-10-02 19:30:01'),
(540, 1, '5000.00', '0', '+', 'Interest Return 5000.00 USD Added on Your interest wallet Balance', 'interest', 'O8VY69B3K73J', '16180.00000000', '2022-10-02 19:30:01', '2022-10-02 19:30:01');
INSERT INTO `trxes` (`id`, `user_id`, `amount`, `charge`, `trx_type`, `details`, `remark`, `trx`, `post_balance`, `created_at`, `updated_at`) VALUES
(541, 1, '20.00', '0', '+', 'Interest Return 20.00 USD Added on Your interest wallet Balance', 'interest', '59VQYEJK5B4R', '16200.00000000', '2022-10-02 20:30:01', '2022-10-02 20:30:01'),
(542, 1, '5000.00', '0', '+', 'Interest Return 5000.00 USD Added on Your interest wallet Balance', 'interest', 'XGEEM9U79TCA', '21200.00000000', '2022-10-02 20:30:01', '2022-10-02 20:30:01'),
(543, 1, '20.00', '0', '+', 'Interest Return 20.00 USD Added on Your interest wallet Balance', 'interest', 'S4EQWCXWOJJ5', '21220.00000000', '2022-10-02 21:30:01', '2022-10-02 21:30:01'),
(544, 1, '5000.00', '0', '+', 'Interest Return 5000.00 USD Added on Your interest wallet Balance', 'interest', 'JEHHMVH9NY9O', '26220.00000000', '2022-10-02 21:30:01', '2022-10-02 21:30:01'),
(545, 1, '20.00', '0', '+', 'Interest Return 20.00 USD Added on Your interest wallet Balance', 'interest', '63RYNCV6R1ST', '26240.00000000', '2022-10-02 22:30:01', '2022-10-02 22:30:01'),
(546, 1, '5000.00', '0', '+', 'Interest Return 5000.00 USD Added on Your interest wallet Balance', 'interest', '3M84APY46Y9J', '31240.00000000', '2022-10-02 22:30:01', '2022-10-02 22:30:01'),
(547, 1, '20.00', '0', '+', 'Interest Return 20.00 USD Added on Your interest wallet Balance', 'interest', 'N1AXDHBMQ72W', '31260.00000000', '2022-10-02 23:30:01', '2022-10-02 23:30:01'),
(548, 1, '5000.00', '0', '+', 'Interest Return 5000.00 USD Added on Your interest wallet Balance', 'interest', 'GBNO1TE6SH48', '36260.00000000', '2022-10-02 23:30:01', '2022-10-02 23:30:01'),
(549, 1, '20.00', '0', '+', 'Interest Return 20.00 USD Added on Your interest wallet Balance', 'interest', 'BZK17XNV4HZW', '36280.00000000', '2022-10-03 00:30:01', '2022-10-03 00:30:01'),
(550, 1, '5000.00', '0', '+', 'Interest Return 5000.00 USD Added on Your interest wallet Balance', 'interest', 'RYRMDAE44SFS', '41280.00000000', '2022-10-03 00:30:01', '2022-10-03 00:30:01'),
(551, 1, '20.00', '0', '+', 'Interest Return 20.00 USD Added on Your interest wallet Balance', 'interest', 'QENW9SMJ83VJ', '41300.00000000', '2022-10-03 01:30:02', '2022-10-03 01:30:02'),
(552, 1, '5000.00', '0', '+', 'Interest Return 5000.00 USD Added on Your interest wallet Balance', 'interest', 'YVRFP9B3SXGJ', '46300.00000000', '2022-10-03 01:30:02', '2022-10-03 01:30:02'),
(553, 1, '20.00', '0', '+', 'Interest Return 20.00 USD Added on Your interest wallet Balance', 'interest', 'HCJG83BMVPZP', '46320.00000000', '2022-10-03 03:00:01', '2022-10-03 03:00:01'),
(554, 1, '5000.00', '0', '+', 'Interest Return 5000.00 USD Added on Your interest wallet Balance', 'interest', 'VT23T7F5C2OU', '51320.00000000', '2022-10-03 03:00:01', '2022-10-03 03:00:01'),
(555, 1, '20.00', '0', '+', 'Interest Return 20.00 USD Added on Your interest wallet Balance', 'interest', '29WNH1KGD7G9', '51340.00000000', '2022-10-03 04:00:01', '2022-10-03 04:00:01'),
(556, 1, '5000.00', '0', '+', 'Interest Return 5000.00 USD Added on Your interest wallet Balance', 'interest', 'GKXVNJW6TG4O', '56340.00000000', '2022-10-03 04:00:01', '2022-10-03 04:00:01'),
(557, 1, '20.00', '0', '+', 'Interest Return 20.00 USD Added on Your interest wallet Balance', 'interest', '9FO6KSQHWDEW', '56360.00000000', '2022-10-03 05:00:01', '2022-10-03 05:00:01'),
(558, 1, '5000.00', '0', '+', 'Interest Return 5000.00 USD Added on Your interest wallet Balance', 'interest', 'N963CE8BF3B1', '61360.00000000', '2022-10-03 05:00:01', '2022-10-03 05:00:01'),
(559, 1, '20.00', '0', '+', 'Interest Return 20.00 USD Added on Your interest wallet Balance', 'interest', 'Z3NQCBDVPE3S', '61380.00000000', '2022-10-03 06:00:02', '2022-10-03 06:00:02'),
(560, 1, '5000.00', '0', '+', 'Interest Return 5000.00 USD Added on Your interest wallet Balance', 'interest', 'ZQUBDC2X4ZO5', '66380.00000000', '2022-10-03 06:00:02', '2022-10-03 06:00:02'),
(561, 1, '20.00', '0', '+', 'Interest Return 20.00 USD Added on Your interest wallet Balance', 'interest', 'BDH5WB6Y716M', '66400.00000000', '2022-10-03 07:30:01', '2022-10-03 07:30:01'),
(562, 1, '5000.00', '0', '+', 'Interest Return 5000.00 USD Added on Your interest wallet Balance', 'interest', 'WZXDSH9AEH5M', '71400.00000000', '2022-10-03 07:30:01', '2022-10-03 07:30:01'),
(563, 1, '20.00', '0', '+', 'Interest Return 20.00 USD Added on Your interest wallet Balance', 'interest', '3G296ZPO8WXY', '71420.00000000', '2022-10-03 08:30:01', '2022-10-03 08:30:01'),
(564, 1, '5000.00', '0', '+', 'Interest Return 5000.00 USD Added on Your interest wallet Balance', 'interest', 'KO4T8NAENFSY', '76420.00000000', '2022-10-03 08:30:01', '2022-10-03 08:30:01'),
(565, 1, '20.00', '0', '+', 'Interest Return 20.00 USD Added on Your interest wallet Balance', 'interest', '32VNS8S8EE72', '76440.00000000', '2022-10-03 09:30:01', '2022-10-03 09:30:01'),
(566, 1, '5000.00', '0', '+', 'Interest Return 5000.00 USD Added on Your interest wallet Balance', 'interest', 'EU2B78KT3SQU', '81440.00000000', '2022-10-03 09:30:01', '2022-10-03 09:30:01'),
(567, 1, '20.00', '0', '+', 'Interest Return 20.00 USD Added on Your interest wallet Balance', 'interest', 'XZ58QFWF72QS', '81460.00000000', '2022-10-03 10:30:01', '2022-10-03 10:30:01'),
(568, 1, '5000.00', '0', '+', 'Interest Return 5000.00 USD Added on Your interest wallet Balance', 'interest', 'YEBKWRZ75JVD', '86460.00000000', '2022-10-03 10:30:01', '2022-10-03 10:30:01'),
(569, 1, '20.00', '0', '+', 'Interest Return 20.00 USD Added on Your interest wallet Balance', 'interest', 'RCMEGUGCW5U2', '86480.00000000', '2022-10-03 11:30:01', '2022-10-03 11:30:01'),
(570, 1, '5000.00', '0', '+', 'Interest Return 5000.00 USD Added on Your interest wallet Balance', 'interest', 'RHW566WMXVOB', '91480.00000000', '2022-10-03 11:30:01', '2022-10-03 11:30:01'),
(571, 1, '20.00', '0', '+', 'Interest Return 20.00 USD Added on Your interest wallet Balance', 'interest', 'NZMF9K49TPM7', '91500.00000000', '2022-10-03 12:30:01', '2022-10-03 12:30:01'),
(572, 1, '5000.00', '0', '+', 'Interest Return 5000.00 USD Added on Your interest wallet Balance', 'interest', 'RGXMEWCDZ24V', '96500.00000000', '2022-10-03 12:30:01', '2022-10-03 12:30:01'),
(573, 1, '2.50', '0', '+', 'Interest Return 2.50 USD Added on Your interest wallet Wallet', 'interest', '89GZJCDS5KWX', '96502.50000000', '2022-10-03 13:00:02', '2022-10-03 13:00:02'),
(574, 1, '20.00', '0', '+', 'Interest Return 20.00 USD Added on Your interest wallet Balance', 'interest', 'NFS3GCYPDRZX', '96522.50000000', '2022-10-03 13:30:01', '2022-10-03 13:30:01'),
(575, 1, '5000.00', '0', '+', 'Interest Return 5000.00 USD Added on Your interest wallet Balance', 'interest', '9P3MRW5Q3PAT', '101522.50000000', '2022-10-03 13:30:01', '2022-10-03 13:30:01'),
(576, 1, '20.00', '0', '+', 'Interest Return 20.00 USD Added on Your interest wallet Balance', 'interest', 'OT4UP9WUV2EX', '101542.50000000', '2022-10-03 14:30:01', '2022-10-03 14:30:01'),
(577, 1, '5000.00', '0', '+', 'Interest Return 5000.00 USD Added on Your interest wallet Balance', 'interest', 'DN7DGG9UG8MU', '106542.50000000', '2022-10-03 14:30:01', '2022-10-03 14:30:01'),
(578, 1, '20.00', '0', '+', 'Interest Return 20.00 USD Added on Your interest wallet Balance', 'interest', 'C51DPVY8CZ3J', '106562.50000000', '2022-10-03 15:30:01', '2022-10-03 15:30:01'),
(579, 1, '5000.00', '0', '+', 'Interest Return 5000.00 USD Added on Your interest wallet Balance', 'interest', '7BZX4RQUMG2V', '111562.50000000', '2022-10-03 15:30:01', '2022-10-03 15:30:01'),
(580, 1, '20.00', '0', '+', 'Interest Return 20.00 USD Added on Your interest wallet Balance', 'interest', '4G3O8QRZ4O5F', '111582.50000000', '2022-10-03 16:30:01', '2022-10-03 16:30:01'),
(581, 1, '5000.00', '0', '+', 'Interest Return 5000.00 USD Added on Your interest wallet Balance', 'interest', 'TK28QADFBNUE', '116582.50000000', '2022-10-03 16:30:01', '2022-10-03 16:30:01'),
(582, 1, '20.00', '0', '+', 'Interest Return 20.00 USD Added on Your interest wallet Balance', 'interest', 'WCZMPUPRG9GM', '116602.50000000', '2022-10-03 17:30:01', '2022-10-03 17:30:01'),
(583, 1, '5000.00', '0', '+', 'Interest Return 5000.00 USD Added on Your interest wallet Balance', 'interest', '3M9FJUUOOUN1', '121602.50000000', '2022-10-03 17:30:01', '2022-10-03 17:30:01'),
(584, 1, '20.00', '0', '+', 'Interest Return 20.00 USD Added on Your interest wallet Balance', 'interest', 'X7TE3F99AFAP', '121622.50000000', '2022-10-03 18:30:01', '2022-10-03 18:30:01'),
(585, 1, '5000.00', '0', '+', 'Interest Return 5000.00 USD Added on Your interest wallet Balance', 'interest', 'HM8ROENC4XT4', '126622.50000000', '2022-10-03 18:30:01', '2022-10-03 18:30:01'),
(586, 1, '20.00', '0', '+', 'Interest Return 20.00 USD Added on Your interest wallet Balance', 'interest', 'VE2S7HVW47GD', '126642.50000000', '2022-10-03 19:30:01', '2022-10-03 19:30:01'),
(587, 1, '5000.00', '0', '+', 'Interest Return 5000.00 USD Added on Your interest wallet Balance', 'interest', 'MYBEFEHAA9CF', '131642.50000000', '2022-10-03 19:30:01', '2022-10-03 19:30:01'),
(588, 1, '20.00', '0', '+', 'Interest Return 20.00 USD Added on Your interest wallet Balance', 'interest', 'MFPXKXHBUKDG', '131662.50000000', '2022-10-03 20:30:02', '2022-10-03 20:30:02'),
(589, 1, '5000.00', '0', '+', 'Interest Return 5000.00 USD Added on Your interest wallet Balance', 'interest', 'ZP979R6UCMYN', '136662.50000000', '2022-10-03 20:30:02', '2022-10-03 20:30:02'),
(590, 1, '20.00', '0', '+', 'Interest Return 20.00 USD Added on Your interest wallet Balance', 'interest', 'TRKJZDDBOTOC', '136682.50000000', '2022-10-03 21:30:02', '2022-10-03 21:30:02'),
(591, 1, '5000.00', '0', '+', 'Interest Return 5000.00 USD Added on Your interest wallet Balance', 'interest', '1XR3P3EKVNEP', '141682.50000000', '2022-10-03 21:30:02', '2022-10-03 21:30:02'),
(592, 1, '20.00', '0', '+', 'Interest Return 20.00 USD Added on Your interest wallet Balance', 'interest', '5AR5D65T97HY', '141702.50000000', '2022-10-03 22:30:02', '2022-10-03 22:30:02'),
(593, 1, '5000.00', '0', '+', 'Interest Return 5000.00 USD Added on Your interest wallet Balance', 'interest', 'NWX63Z1X5J6Y', '146702.50000000', '2022-10-03 22:30:02', '2022-10-03 22:30:02'),
(594, 1, '20.00', '0', '+', 'Interest Return 20.00 USD Added on Your interest wallet Balance', 'interest', 'VE43KVPTTH6V', '146722.50000000', '2022-10-04 00:00:01', '2022-10-04 00:00:01'),
(595, 1, '5000.00', '0', '+', 'Interest Return 5000.00 USD Added on Your interest wallet Balance', 'interest', '7V7MCKA4TG73', '151722.50000000', '2022-10-04 00:00:01', '2022-10-04 00:00:01'),
(596, 1, '20.00', '0', '+', 'Interest Return 20.00 USD Added on Your interest wallet Balance', 'interest', 'E5OAOZDSY329', '151742.50000000', '2022-10-04 01:00:01', '2022-10-04 01:00:01'),
(597, 1, '5000.00', '0', '+', 'Interest Return 5000.00 USD Added on Your interest wallet Balance', 'interest', '8XNMVEK6C2DB', '156742.50000000', '2022-10-04 01:00:01', '2022-10-04 01:00:01'),
(598, 1, '20.00', '0', '+', 'Interest Return 20.00 USD Added on Your interest wallet Balance', 'interest', 'PHUPG4X2FOWJ', '156762.50000000', '2022-10-04 02:00:01', '2022-10-04 02:00:01'),
(599, 1, '5000.00', '0', '+', 'Interest Return 5000.00 USD Added on Your interest wallet Balance', 'interest', 'SE9HDSHBRTCG', '161762.50000000', '2022-10-04 02:00:01', '2022-10-04 02:00:01'),
(600, 1, '20.00', '0', '+', 'Interest Return 20.00 USD Added on Your interest wallet Balance', 'interest', '275RAWJKGCEA', '161782.50000000', '2022-10-04 03:00:01', '2022-10-04 03:00:01'),
(601, 1, '5000.00', '0', '+', 'Interest Return 5000.00 USD Added on Your interest wallet Balance', 'interest', '174Q9DEQTOBP', '166782.50000000', '2022-10-04 03:00:01', '2022-10-04 03:00:01'),
(602, 1, '20.00', '0', '+', 'Interest Return 20.00 USD Added on Your interest wallet Balance', 'interest', 'US2P3RO6V8Z6', '166802.50000000', '2022-10-04 04:00:01', '2022-10-04 04:00:01'),
(603, 1, '5000.00', '0', '+', 'Interest Return 5000.00 USD Added on Your interest wallet Balance', 'interest', 'DV98UT5NJ6B8', '171802.50000000', '2022-10-04 04:00:01', '2022-10-04 04:00:01'),
(604, 1, '20.00', '0', '+', 'Interest Return 20.00 USD Added on Your interest wallet Balance', 'interest', '6EHPS2SV3W9P', '171822.50000000', '2022-10-04 05:00:01', '2022-10-04 05:00:01'),
(605, 1, '5000.00', '0', '+', 'Interest Return 5000.00 USD Added on Your interest wallet Balance', 'interest', 'PB7N153XKUEV', '176822.50000000', '2022-10-04 05:00:01', '2022-10-04 05:00:01'),
(606, 1, '20.00', '0', '+', 'Interest Return 20.00 USD Added on Your interest wallet Balance', 'interest', 'Y2JJRU3VK8ZS', '176842.50000000', '2022-10-04 06:00:01', '2022-10-04 06:00:01'),
(607, 1, '5000.00', '0', '+', 'Interest Return 5000.00 USD Added on Your interest wallet Balance', 'interest', 'ZXVQ76HETXHH', '181842.50000000', '2022-10-04 06:00:01', '2022-10-04 06:00:01'),
(608, 1, '20.00', '0', '+', 'Interest Return 20.00 USD Added on Your interest wallet Balance', 'interest', 'SFGPAXO1F5V3', '181862.50000000', '2022-10-04 07:00:02', '2022-10-04 07:00:02'),
(609, 1, '5000.00', '0', '+', 'Interest Return 5000.00 USD Added on Your interest wallet Balance', 'interest', 'D8S666NXGC7F', '186862.50000000', '2022-10-04 07:00:02', '2022-10-04 07:00:02'),
(610, 1, '20.00', '0', '+', 'Interest Return 20.00 USD Added on Your interest wallet Balance', 'interest', 'CY1B9V44VANH', '186882.50000000', '2022-10-04 08:30:01', '2022-10-04 08:30:01'),
(611, 1, '5000.00', '0', '+', 'Interest Return 5000.00 USD Added on Your interest wallet Balance', 'interest', 'G6FUY79T9OUP', '191882.50000000', '2022-10-04 08:30:01', '2022-10-04 08:30:01'),
(612, 1, '20.00', '0', '+', 'Interest Return 20.00 USD Added on Your interest wallet Balance', 'interest', 'HUK9STQETZRK', '191902.50000000', '2022-10-04 09:30:02', '2022-10-04 09:30:02'),
(613, 1, '5000.00', '0', '+', 'Interest Return 5000.00 USD Added on Your interest wallet Balance', 'interest', 'DAT29QE2MK5A', '196902.50000000', '2022-10-04 09:30:02', '2022-10-04 09:30:02'),
(614, 1, '20.00', '0', '+', 'Interest Return 20.00 USD Added on Your interest wallet Balance', 'interest', 'K45PA296DVQV', '196922.50000000', '2022-10-04 10:30:02', '2022-10-04 10:30:02'),
(615, 1, '5000.00', '0', '+', 'Interest Return 5000.00 USD Added on Your interest wallet Balance', 'interest', 'SCE2OGB3SW26', '201922.50000000', '2022-10-04 10:30:02', '2022-10-04 10:30:02'),
(616, 1, '20.00', '0', '+', 'Interest Return 20.00 USD Added on Your interest wallet Balance', 'interest', 'NX7J1KVHJVD4', '201942.50000000', '2022-10-04 12:00:01', '2022-10-04 12:00:01'),
(617, 1, '5000.00', '0', '+', 'Interest Return 5000.00 USD Added on Your interest wallet Balance', 'interest', 'FDDSSBTWN3XY', '206942.50000000', '2022-10-04 12:00:01', '2022-10-04 12:00:01'),
(618, 1, '20.00', '0', '+', 'Interest Return 20.00 USD Added on Your interest wallet Balance', 'interest', 'GF9XHNR7JZBG', '206962.50000000', '2022-10-04 13:00:01', '2022-10-04 13:00:01'),
(619, 1, '5000.00', '0', '+', 'Interest Return 5000.00 USD Added on Your interest wallet Balance', 'interest', 'ZOQS66NQ8Z66', '211962.50000000', '2022-10-04 13:00:01', '2022-10-04 13:00:01'),
(620, 1, '2.50', '0', '+', 'Interest Return 2.50 USD Added on Your interest wallet Wallet', 'interest', 'K7OBWHQYGOVM', '211965.00000000', '2022-10-04 13:30:01', '2022-10-04 13:30:01'),
(621, 1, '20.00', '0', '+', 'Interest Return 20.00 USD Added on Your interest wallet Balance', 'interest', 'YCBHGCP2H3WX', '211985.00000000', '2022-10-04 14:00:02', '2022-10-04 14:00:02'),
(622, 1, '5000.00', '0', '+', 'Interest Return 5000.00 USD Added on Your interest wallet Balance', 'interest', '51894G9ZHTQM', '216985.00000000', '2022-10-04 14:00:02', '2022-10-04 14:00:02'),
(623, 1, '20.00', '0', '+', 'Interest Return 20.00 USD Added on Your interest wallet Balance', 'interest', 'S66TVZJ2MYUW', '217005.00000000', '2022-10-04 15:30:01', '2022-10-04 15:30:01'),
(624, 1, '5000.00', '0', '+', 'Interest Return 5000.00 USD Added on Your interest wallet Balance', 'interest', 'NGKFC8RQW932', '222005.00000000', '2022-10-04 15:30:01', '2022-10-04 15:30:01'),
(625, 1, '20.00', '0', '+', 'Interest Return 20.00 USD Added on Your interest wallet Balance', 'interest', 'YOWEVAVOR94K', '222025.00000000', '2022-10-04 16:30:01', '2022-10-04 16:30:01'),
(626, 1, '5000.00', '0', '+', 'Interest Return 5000.00 USD Added on Your interest wallet Balance', 'interest', 'OMO4AFQ5JWJZ', '227025.00000000', '2022-10-04 16:30:01', '2022-10-04 16:30:01'),
(627, 1, '50000', '525.00000000', '+', 'Deposit Via Bank Wire', 'manual_deposit', 'QPZEPNCV355D', '9818500.00000000', '2022-10-04 17:08:12', '2022-10-04 17:08:12'),
(628, 1, '20.00', '0', '+', 'Interest Return 20.00 USD Added on Your interest wallet Balance', 'interest', 'HJDXFC2EDSAE', '227045.00000000', '2022-10-04 17:30:01', '2022-10-04 17:30:01'),
(629, 1, '5000.00', '0', '+', 'Interest Return 5000.00 USD Added on Your interest wallet Balance', 'interest', '88GDOD56XHRF', '232045.00000000', '2022-10-04 17:30:01', '2022-10-04 17:30:01'),
(630, 1, '10000', '0', '-', 'Invested On Neha Fund', 'invest', 'V17QV2AF2S8O', '9808500.00000000', '2022-10-04 18:07:32', '2022-10-04 18:07:32'),
(631, 1, '20.00', '0', '+', 'Interest Return 20.00 USD Added on Your interest wallet Balance', 'interest', 'FT3SD5RYWG33', '232065.00000000', '2022-10-04 18:30:01', '2022-10-04 18:30:01'),
(632, 1, '5000.00', '0', '+', 'Interest Return 5000.00 USD Added on Your interest wallet Balance', 'interest', 'GHDMS855XJC9', '237065.00000000', '2022-10-04 18:30:01', '2022-10-04 18:30:01'),
(633, 1, '20.00', '0', '+', 'Interest Return 20.00 USD Added on Your interest wallet Balance', 'interest', 'T68N9GFJ5WQ9', '237085.00000000', '2022-10-04 19:30:01', '2022-10-04 19:30:01'),
(634, 1, '5000.00', '0', '+', 'Interest Return 5000.00 USD Added on Your interest wallet Balance', 'interest', 'SB5UHVVTU5PH', '242085.00000000', '2022-10-04 19:30:01', '2022-10-04 19:30:01'),
(635, 1, '20.00', '0', '+', 'Interest Return 20.00 USD Added on Your interest wallet Balance', 'interest', 'NYVVHRD69MQN', '242105.00000000', '2022-10-04 20:30:02', '2022-10-04 20:30:02'),
(636, 1, '5000.00', '0', '+', 'Interest Return 5000.00 USD Added on Your interest wallet Balance', 'interest', 'GAH1OKQ67VRK', '247105.00000000', '2022-10-04 20:30:02', '2022-10-04 20:30:02'),
(637, 1, '20.00', '0', '+', 'Interest Return 20.00 USD Added on Your interest wallet Balance', 'interest', 'JKCB47YZEGON', '247125.00000000', '2022-10-04 22:00:02', '2022-10-04 22:00:02'),
(638, 1, '5000.00', '0', '+', 'Interest Return 5000.00 USD Added on Your interest wallet Balance', 'interest', '87RPT227YOU1', '252125.00000000', '2022-10-04 22:00:02', '2022-10-04 22:00:02'),
(639, 1, '20.00', '0', '+', 'Interest Return 20.00 USD Added on Your interest wallet Balance', 'interest', 'C2V1YZDYO7A8', '252145.00000000', '2022-10-04 23:30:02', '2022-10-04 23:30:02'),
(640, 1, '5000.00', '0', '+', 'Interest Return 5000.00 USD Added on Your interest wallet Balance', 'interest', 'TMT977MJXGVJ', '257145.00000000', '2022-10-04 23:30:02', '2022-10-04 23:30:02'),
(641, 1, '20.00', '0', '+', 'Interest Return 20.00 USD Added on Your interest wallet Balance', 'interest', 'D1FKS5FUAQXM', '257165.00000000', '2022-10-05 01:00:01', '2022-10-05 01:00:01'),
(642, 1, '5000.00', '0', '+', 'Interest Return 5000.00 USD Added on Your interest wallet Balance', 'interest', '494HV7P88TJS', '262165.00000000', '2022-10-05 01:00:01', '2022-10-05 01:00:01'),
(643, 1, '20.00', '0', '+', 'Interest Return 20.00 USD Added on Your interest wallet Balance', 'interest', '15P1EZW95NFM', '262185.00000000', '2022-10-05 02:00:02', '2022-10-05 02:00:02'),
(644, 1, '5000.00', '0', '+', 'Interest Return 5000.00 USD Added on Your interest wallet Balance', 'interest', 'XQXXC1W94EQQ', '267185.00000000', '2022-10-05 02:00:02', '2022-10-05 02:00:02'),
(645, 1, '20.00', '0', '+', 'Interest Return 20.00 USD Added on Your interest wallet Balance', 'interest', 'FBDSVURDCH3A', '267205.00000000', '2022-10-05 03:30:01', '2022-10-05 03:30:01'),
(646, 1, '5000.00', '0', '+', 'Interest Return 5000.00 USD Added on Your interest wallet Balance', 'interest', 'BKN3BVFH9HCP', '272205.00000000', '2022-10-05 03:30:01', '2022-10-05 03:30:01'),
(647, 1, '20.00', '0', '+', 'Interest Return 20.00 USD Added on Your interest wallet Balance', 'interest', '4BOZCNUSV2V7', '272225.00000000', '2022-10-05 04:30:01', '2022-10-05 04:30:01'),
(648, 1, '5000.00', '0', '+', 'Interest Return 5000.00 USD Added on Your interest wallet Balance', 'interest', 'K732J7QUP2NS', '277225.00000000', '2022-10-05 04:30:01', '2022-10-05 04:30:01'),
(649, 1, '20.00', '0', '+', 'Interest Return 20.00 USD Added on Your interest wallet Balance', 'interest', 'H1KDVEEQWZOD', '277245.00000000', '2022-10-05 05:30:01', '2022-10-05 05:30:01'),
(650, 1, '5000.00', '0', '+', 'Interest Return 5000.00 USD Added on Your interest wallet Balance', 'interest', 'JKSYJ8TS6JN9', '282245.00000000', '2022-10-05 05:30:01', '2022-10-05 05:30:01'),
(651, 1, '20.00', '0', '+', 'Interest Return 20.00 USD Added on Your interest wallet Balance', 'interest', 'SYCWNZRQ7SK3', '282265.00000000', '2022-10-05 06:30:01', '2022-10-05 06:30:01'),
(652, 1, '5000.00', '0', '+', 'Interest Return 5000.00 USD Added on Your interest wallet Balance', 'interest', 'BEANC1SPCHGU', '287265.00000000', '2022-10-05 06:30:01', '2022-10-05 06:30:01'),
(653, 1, '20.00', '0', '+', 'Interest Return 20.00 USD Added on Your interest wallet Balance', 'interest', 'WQE33Y2124KH', '287285.00000000', '2022-10-05 07:30:01', '2022-10-05 07:30:01'),
(654, 1, '5000.00', '0', '+', 'Interest Return 5000.00 USD Added on Your interest wallet Balance', 'interest', 'MGGQ7TMQWJAA', '292285.00000000', '2022-10-05 07:30:01', '2022-10-05 07:30:01'),
(655, 1, '20.00', '0', '+', 'Interest Return 20.00 USD Added on Your interest wallet Balance', 'interest', '3B79QW4623UU', '292305.00000000', '2022-10-05 08:30:02', '2022-10-05 08:30:02'),
(656, 1, '5000.00', '0', '+', 'Interest Return 5000.00 USD Added on Your interest wallet Balance', 'interest', 'JQZEGEQWYQEM', '297305.00000000', '2022-10-05 08:30:02', '2022-10-05 08:30:02'),
(657, 1, '20.00', '0', '+', 'Interest Return 20.00 USD Added on Your interest wallet Balance', 'interest', '72TEBD9COCHB', '297325.00000000', '2022-10-05 10:00:01', '2022-10-05 10:00:01'),
(658, 1, '5000.00', '0', '+', 'Interest Return 5000.00 USD Added on Your interest wallet Balance', 'interest', 'MW1VP8AMD7A9', '302325.00000000', '2022-10-05 10:00:01', '2022-10-05 10:00:01'),
(659, 1, '20.00', '0', '+', 'Interest Return 20.00 USD Added on Your interest wallet Balance', 'interest', 'HTRVJJP94QWD', '302345.00000000', '2022-10-05 11:00:01', '2022-10-05 11:00:01'),
(660, 1, '5000.00', '0', '+', 'Interest Return 5000.00 USD Added on Your interest wallet Balance', 'interest', 'S72FQ6UWWUKT', '307345.00000000', '2022-10-05 11:00:01', '2022-10-05 11:00:01'),
(661, 1, '20.00', '0', '+', 'Interest Return 20.00 USD Added on Your interest wallet Balance', 'interest', 'SA7ZCSSGT3W7', '307365.00000000', '2022-10-05 12:00:01', '2022-10-05 12:00:01'),
(662, 1, '5000.00', '0', '+', 'Interest Return 5000.00 USD Added on Your interest wallet Balance', 'interest', 'KW5KB7RBK9WR', '312365.00000000', '2022-10-05 12:00:01', '2022-10-05 12:00:01'),
(663, 1, '20.00', '0', '+', 'Interest Return 20.00 USD Added on Your interest wallet Balance', 'interest', 'R6388SFSVVGP', '312385.00000000', '2022-10-05 13:00:02', '2022-10-05 13:00:02'),
(664, 1, '5000.00', '0', '+', 'Interest Return 5000.00 USD Added on Your interest wallet Balance', 'interest', 'GAFSDC2PPQH8', '317385.00000000', '2022-10-05 13:00:02', '2022-10-05 13:00:02'),
(665, 1, '2.50', '0', '+', 'Interest Return 2.50 USD Added on Your interest wallet Wallet', 'interest', 'GCU2X2YN2TRS', '317387.50000000', '2022-10-05 13:30:01', '2022-10-05 13:30:01'),
(666, 1, '20.00', '0', '+', 'Interest Return 20.00 USD Added on Your interest wallet Balance', 'interest', 'FWJMQVR145OE', '317407.50000000', '2022-10-05 14:30:01', '2022-10-05 14:30:01'),
(667, 1, '5000.00', '0', '+', 'Interest Return 5000.00 USD Added on Your interest wallet Balance', 'interest', 'KV4AC8DU8E3Q', '322407.50000000', '2022-10-05 14:30:01', '2022-10-05 14:30:01'),
(668, 1, '20.00', '0', '+', 'Interest Return 20.00 USD Added on Your interest wallet Balance', 'interest', 'FB5K7G1EXTY9', '322427.50000000', '2022-10-05 15:30:01', '2022-10-05 15:30:01'),
(669, 1, '5000.00', '0', '+', 'Interest Return 5000.00 USD Added on Your interest wallet Balance', 'interest', '2Y9ZPPVZG6R2', '327427.50000000', '2022-10-05 15:30:01', '2022-10-05 15:30:01'),
(670, 1, '20.00', '0', '+', 'Interest Return 20.00 USD Added on Your interest wallet Balance', 'interest', 'ADMPH3MH45XD', '327447.50000000', '2022-10-05 16:30:02', '2022-10-05 16:30:02'),
(671, 1, '5000.00', '0', '+', 'Interest Return 5000.00 USD Added on Your interest wallet Balance', 'interest', 'QW91XQGPNG8C', '332447.50000000', '2022-10-05 16:30:02', '2022-10-05 16:30:02'),
(672, 1, '20.00', '0', '+', 'Interest Return 20.00 USD Added on Your interest wallet Balance', 'interest', 'TP12MKA5YEPK', '332467.50000000', '2022-10-05 18:00:02', '2022-10-05 18:00:02'),
(673, 1, '5000.00', '0', '+', 'Interest Return 5000.00 USD Added on Your interest wallet Balance', 'interest', 'UA4KMJAQUC3Y', '337467.50000000', '2022-10-05 18:00:02', '2022-10-05 18:00:02'),
(674, 1, '50.00', '0', '+', 'Interest Return 50.00 USD Added on Your interest wallet Wallet', 'interest', '955NBKNVYBVA', '337517.50000000', '2022-10-05 18:30:01', '2022-10-05 18:30:01'),
(675, 1, '20.00', '0', '+', 'Interest Return 20.00 USD Added on Your interest wallet Balance', 'interest', 'SA665VDQ191S', '337537.50000000', '2022-10-05 19:30:02', '2022-10-05 19:30:02'),
(676, 1, '5000.00', '0', '+', 'Interest Return 5000.00 USD Added on Your interest wallet Balance', 'interest', 'VA3ANOFMRJ8Z', '342537.50000000', '2022-10-05 19:30:02', '2022-10-05 19:30:02'),
(677, 1, '20.00', '0', '+', 'Interest Return 20.00 USD Added on Your interest wallet Balance', 'interest', 'K5297D338FS5', '342557.50000000', '2022-10-05 21:00:01', '2022-10-05 21:00:01'),
(678, 1, '5000.00', '0', '+', 'Interest Return 5000.00 USD Added on Your interest wallet Balance', 'interest', 'B75S1ANTJMZT', '347557.50000000', '2022-10-05 21:00:01', '2022-10-05 21:00:01'),
(679, 1, '20.00', '0', '+', 'Interest Return 20.00 USD Added on Your interest wallet Balance', 'interest', '9NBJ57JJWGWY', '347577.50000000', '2022-10-05 22:00:02', '2022-10-05 22:00:02'),
(680, 1, '5000.00', '0', '+', 'Interest Return 5000.00 USD Added on Your interest wallet Balance', 'interest', 'HUTDV5OARA2F', '352577.50000000', '2022-10-05 22:00:02', '2022-10-05 22:00:02'),
(681, 1, '20.00', '0', '+', 'Interest Return 20.00 USD Added on Your interest wallet Balance', 'interest', 'M6CYD2VPWRG9', '352597.50000000', '2022-10-05 23:30:01', '2022-10-05 23:30:01'),
(682, 1, '5000.00', '0', '+', 'Interest Return 5000.00 USD Added on Your interest wallet Balance', 'interest', 'W143BRA32NX6', '357597.50000000', '2022-10-05 23:30:01', '2022-10-05 23:30:01'),
(683, 1, '20.00', '0', '+', 'Interest Return 20.00 USD Added on Your interest wallet Balance', 'interest', 'UJJUGF4U5HS1', '357617.50000000', '2022-10-06 00:30:01', '2022-10-06 00:30:01'),
(684, 1, '5000.00', '0', '+', 'Interest Return 5000.00 USD Added on Your interest wallet Balance', 'interest', 'Y8DNDWCMS5B9', '362617.50000000', '2022-10-06 00:30:01', '2022-10-06 00:30:01'),
(685, 1, '20.00', '0', '+', 'Interest Return 20.00 USD Added on Your interest wallet Balance', 'interest', 'S4AK76NBGU5C', '362637.50000000', '2022-10-06 01:30:01', '2022-10-06 01:30:01'),
(686, 1, '5000.00', '0', '+', 'Interest Return 5000.00 USD Added on Your interest wallet Balance', 'interest', 'EK9EEPPZ3FZM', '367637.50000000', '2022-10-06 01:30:01', '2022-10-06 01:30:01'),
(687, 1, '20.00', '0', '+', 'Interest Return 20.00 USD Added on Your interest wallet Balance', 'interest', '5XUXXOMD4GAN', '367657.50000000', '2022-10-06 02:30:01', '2022-10-06 02:30:01'),
(688, 1, '5000.00', '0', '+', 'Interest Return 5000.00 USD Added on Your interest wallet Balance', 'interest', 'GGY3ZEN8TBVZ', '372657.50000000', '2022-10-06 02:30:01', '2022-10-06 02:30:01'),
(689, 1, '20.00', '0', '+', 'Interest Return 20.00 USD Added on Your interest wallet Balance', 'interest', 'ZYXPOTSAO2JJ', '372677.50000000', '2022-10-06 03:30:01', '2022-10-06 03:30:01'),
(690, 1, '5000.00', '0', '+', 'Interest Return 5000.00 USD Added on Your interest wallet Balance', 'interest', 'XUKTC1WEMXAB', '377677.50000000', '2022-10-06 03:30:01', '2022-10-06 03:30:01'),
(691, 1, '20.00', '0', '+', 'Interest Return 20.00 USD Added on Your interest wallet Balance', 'interest', '8HNOOXKOSD41', '377697.50000000', '2022-10-06 04:30:01', '2022-10-06 04:30:01'),
(692, 1, '5000.00', '0', '+', 'Interest Return 5000.00 USD Added on Your interest wallet Balance', 'interest', 'CDNOWAHVP5SP', '382697.50000000', '2022-10-06 04:30:01', '2022-10-06 04:30:01'),
(693, 1, '20.00', '0', '+', 'Interest Return 20.00 USD Added on Your interest wallet Balance', 'interest', 'Z9YNGZW8OTHD', '382717.50000000', '2022-10-06 05:30:01', '2022-10-06 05:30:01'),
(694, 1, '5000.00', '0', '+', 'Interest Return 5000.00 USD Added on Your interest wallet Balance', 'interest', '2DO7P78TTMRK', '387717.50000000', '2022-10-06 05:30:01', '2022-10-06 05:30:01'),
(695, 1, '20.00', '0', '+', 'Interest Return 20.00 USD Added on Your interest wallet Balance', 'interest', 'NYG3OMBT87KG', '387737.50000000', '2022-10-06 06:30:01', '2022-10-06 06:30:01'),
(696, 1, '5000.00', '0', '+', 'Interest Return 5000.00 USD Added on Your interest wallet Balance', 'interest', 'SQ5ANRD5WS2D', '392737.50000000', '2022-10-06 06:30:01', '2022-10-06 06:30:01'),
(697, 1, '20.00', '0', '+', 'Interest Return 20.00 USD Added on Your interest wallet Balance', 'interest', 'ECK7YTWXFQJ6', '392757.50000000', '2022-10-06 07:30:01', '2022-10-06 07:30:01'),
(698, 1, '5000.00', '0', '+', 'Interest Return 5000.00 USD Added on Your interest wallet Balance', 'interest', '1Y9N8MR5H9YT', '397757.50000000', '2022-10-06 07:30:01', '2022-10-06 07:30:01'),
(699, 1, '20.00', '0', '+', 'Interest Return 20.00 USD Added on Your interest wallet Balance', 'interest', 'BOBR55TQG3G1', '397777.50000000', '2022-10-06 08:30:01', '2022-10-06 08:30:01'),
(700, 1, '5000.00', '0', '+', 'Interest Return 5000.00 USD Added on Your interest wallet Balance', 'interest', 'XBKZOZV6AWGR', '402777.50000000', '2022-10-06 08:30:01', '2022-10-06 08:30:01'),
(701, 1, '20.00', '0', '+', 'Interest Return 20.00 USD Added on Your interest wallet Balance', 'interest', '5EWETMER5PY1', '402797.50000000', '2022-10-06 09:30:01', '2022-10-06 09:30:01'),
(702, 1, '5000.00', '0', '+', 'Interest Return 5000.00 USD Added on Your interest wallet Balance', 'interest', 'P2Q2TU25GSJF', '407797.50000000', '2022-10-06 09:30:01', '2022-10-06 09:30:01'),
(703, 1, '20.00', '0', '+', 'Interest Return 20.00 USD Added on Your interest wallet Balance', 'interest', '7PCGGW87BNOF', '407817.50000000', '2022-10-06 10:30:01', '2022-10-06 10:30:01'),
(704, 1, '5000.00', '0', '+', 'Interest Return 5000.00 USD Added on Your interest wallet Balance', 'interest', 'NCCW1OD7F22U', '412817.50000000', '2022-10-06 10:30:01', '2022-10-06 10:30:01'),
(705, 1, '20.00', '0', '+', 'Interest Return 20.00 USD Added on Your interest wallet Balance', 'interest', 'SWZY6MV4T3U2', '412837.50000000', '2022-10-06 11:30:01', '2022-10-06 11:30:01'),
(706, 1, '5000.00', '0', '+', 'Interest Return 5000.00 USD Added on Your interest wallet Balance', 'interest', '6428Z28FTJG2', '417837.50000000', '2022-10-06 11:30:01', '2022-10-06 11:30:01'),
(707, 1, '20.00', '0', '+', 'Interest Return 20.00 USD Added on Your interest wallet Balance', 'interest', 'SDAJO9KJF9ZU', '417857.50000000', '2022-10-06 12:30:01', '2022-10-06 12:30:01'),
(708, 1, '5000.00', '0', '+', 'Interest Return 5000.00 USD Added on Your interest wallet Balance', 'interest', '3V5XGO76N4HW', '422857.50000000', '2022-10-06 12:30:01', '2022-10-06 12:30:01'),
(709, 1, '2.50', '0', '+', 'Interest Return 2.50 USD Added on Your interest wallet Wallet', 'interest', 'B28ZEG26QZ2M', '422860.00000000', '2022-10-06 13:30:01', '2022-10-06 13:30:01'),
(710, 1, '20.00', '0', '+', 'Interest Return 20.00 USD Added on Your interest wallet Balance', 'interest', '8KHYNW3NV29N', '422880.00000000', '2022-10-06 13:30:01', '2022-10-06 13:30:01'),
(711, 1, '5000.00', '0', '+', 'Interest Return 5000.00 USD Added on Your interest wallet Balance', 'interest', '8Z94NVZOQ44Y', '427880.00000000', '2022-10-06 13:30:01', '2022-10-06 13:30:01'),
(712, 4, '50000', '0.00000000', '+', 'Deposit Via ACH PAYMENT', 'manual_deposit', '9E4DXCHP5TNZ', '50000.00000000', '2022-10-06 13:37:24', '2022-10-06 13:37:24'),
(713, 4, '10000', '0', '-', 'Invested On Neha Fund', 'invest', '7UEWFH7BBPPA', '40000.00000000', '2022-10-06 13:49:48', '2022-10-06 13:49:48'),
(714, 1, '20.00', '0', '+', 'Interest Return 20.00 USD Added on Your interest wallet Balance', 'interest', 'SSYG7N65UCQX', '427900.00000000', '2022-10-06 14:30:01', '2022-10-06 14:30:01'),
(715, 1, '5000.00', '0', '+', 'Interest Return 5000.00 USD Added on Your interest wallet Balance', 'interest', 'JXPVJS3ZJ3ZA', '432900.00000000', '2022-10-06 14:30:01', '2022-10-06 14:30:01'),
(716, 1, '20.00', '0', '+', 'Interest Return 20.00 USD Added on Your interest wallet Balance', 'interest', '2SSOXEEUKM1M', '432920.00000000', '2022-10-06 15:30:01', '2022-10-06 15:30:01'),
(717, 1, '5000.00', '0', '+', 'Interest Return 5000.00 USD Added on Your interest wallet Balance', 'interest', 'VXA9WQQNEEOP', '437920.00000000', '2022-10-06 15:30:01', '2022-10-06 15:30:01'),
(718, 1, '20.00', '0', '+', 'Interest Return 20.00 USD Added on Your interest wallet Balance', 'interest', 'K6V739O3P9KC', '437940.00000000', '2022-10-06 16:30:02', '2022-10-06 16:30:02'),
(719, 1, '5000.00', '0', '+', 'Interest Return 5000.00 USD Added on Your interest wallet Balance', 'interest', 'TWJOW689DNME', '442940.00000000', '2022-10-06 16:30:02', '2022-10-06 16:30:02'),
(720, 1, '20.00', '0', '+', 'Interest Return 20.00 USD Added on Your interest wallet Balance', 'interest', 'CJJ5YG8NEQ42', '442960.00000000', '2022-10-06 18:00:01', '2022-10-06 18:00:01'),
(721, 1, '5000.00', '0', '+', 'Interest Return 5000.00 USD Added on Your interest wallet Balance', 'interest', 'KQMG5TUW2HJK', '447960.00000000', '2022-10-06 18:00:01', '2022-10-06 18:00:01'),
(722, 1, '50.00', '0', '+', 'Interest Return 50.00 USD Added on Your interest wallet Wallet', 'interest', 'RVEGUM5SQBXG', '448010.00000000', '2022-10-06 18:30:01', '2022-10-06 18:30:01'),
(723, 1, '20.00', '0', '+', 'Interest Return 20.00 USD Added on Your interest wallet Balance', 'interest', 'SPBP7J19RGKO', '448030.00000000', '2022-10-06 19:00:02', '2022-10-06 19:00:02'),
(724, 1, '5000.00', '0', '+', 'Interest Return 5000.00 USD Added on Your interest wallet Balance', 'interest', '39BQ5CC4B9B9', '453030.00000000', '2022-10-06 19:00:02', '2022-10-06 19:00:02'),
(725, 1, '20.00', '0', '+', 'Interest Return 20.00 USD Added on Your interest wallet Balance', 'interest', 'J2A3HWNGGTCU', '453050.00000000', '2022-10-06 20:00:02', '2022-10-06 20:00:02'),
(726, 1, '5000.00', '0', '+', 'Interest Return 5000.00 USD Added on Your interest wallet Balance', 'interest', 'CMQ9GEMXFAWG', '458050.00000000', '2022-10-06 20:00:02', '2022-10-06 20:00:02'),
(727, 1, '20.00', '0', '+', 'Interest Return 20.00 USD Added on Your interest wallet Balance', 'interest', 'O1T9OFWAT841', '458070.00000000', '2022-10-06 21:30:01', '2022-10-06 21:30:01'),
(728, 1, '5000.00', '0', '+', 'Interest Return 5000.00 USD Added on Your interest wallet Balance', 'interest', 'UTDQ8ZUNHK2N', '463070.00000000', '2022-10-06 21:30:01', '2022-10-06 21:30:01'),
(729, 1, '20.00', '0', '+', 'Interest Return 20.00 USD Added on Your interest wallet Balance', 'interest', 'SHPKUFJUGAPJ', '463090.00000000', '2022-10-06 22:30:01', '2022-10-06 22:30:01'),
(730, 1, '5000.00', '0', '+', 'Interest Return 5000.00 USD Added on Your interest wallet Balance', 'interest', '22PEHHEVV58H', '468090.00000000', '2022-10-06 22:30:01', '2022-10-06 22:30:01'),
(731, 1, '20.00', '0', '+', 'Interest Return 20.00 USD Added on Your interest wallet Balance', 'interest', '9ESPTQS3Z53S', '468110.00000000', '2022-10-06 23:30:01', '2022-10-06 23:30:01'),
(732, 1, '5000.00', '0', '+', 'Interest Return 5000.00 USD Added on Your interest wallet Balance', 'interest', '6EYW8P6ZCFST', '473110.00000000', '2022-10-06 23:30:01', '2022-10-06 23:30:01'),
(733, 1, '20.00', '0', '+', 'Interest Return 20.00 USD Added on Your interest wallet Balance', 'interest', 'VAEQQRPCHP9F', '473130.00000000', '2022-10-07 00:30:01', '2022-10-07 00:30:01'),
(734, 1, '5000.00', '0', '+', 'Interest Return 5000.00 USD Added on Your interest wallet Balance', 'interest', '5TP53MQ6XFNB', '478130.00000000', '2022-10-07 00:30:01', '2022-10-07 00:30:01'),
(735, 1, '20.00', '0', '+', 'Interest Return 20.00 USD Added on Your interest wallet Balance', 'interest', 'GDFSADHHB4VF', '478150.00000000', '2022-10-07 01:30:02', '2022-10-07 01:30:02'),
(736, 1, '5000.00', '0', '+', 'Interest Return 5000.00 USD Added on Your interest wallet Balance', 'interest', '7TORZC9ZTP5J', '483150.00000000', '2022-10-07 01:30:02', '2022-10-07 01:30:02'),
(737, 1, '20.00', '0', '+', 'Interest Return 20.00 USD Added on Your interest wallet Balance', 'interest', 'VKV31P1YDC38', '483170.00000000', '2022-10-07 03:00:01', '2022-10-07 03:00:01'),
(738, 1, '5000.00', '0', '+', 'Interest Return 5000.00 USD Added on Your interest wallet Balance', 'interest', '3KG7T8FTQRVV', '488170.00000000', '2022-10-07 03:00:02', '2022-10-07 03:00:02'),
(739, 1, '20.00', '0', '+', 'Interest Return 20.00 USD Added on Your interest wallet Balance', 'interest', 'CJJ93GDQ9M2U', '488190.00000000', '2022-10-07 04:00:02', '2022-10-07 04:00:02'),
(740, 1, '5000.00', '0', '+', 'Interest Return 5000.00 USD Added on Your interest wallet Balance', 'interest', '8R8CQU9HNSU5', '493190.00000000', '2022-10-07 04:00:02', '2022-10-07 04:00:02'),
(741, 1, '20.00', '0', '+', 'Interest Return 20.00 USD Added on Your interest wallet Balance', 'interest', '7BS5JP8XSM48', '493210.00000000', '2022-10-07 05:30:01', '2022-10-07 05:30:01'),
(742, 1, '5000.00', '0', '+', 'Interest Return 5000.00 USD Added on Your interest wallet Balance', 'interest', 'X92F4FQ2EJKY', '498210.00000000', '2022-10-07 05:30:01', '2022-10-07 05:30:01'),
(743, 1, '20.00', '0', '+', 'Interest Return 20.00 USD Added on Your interest wallet Balance', 'interest', 'SWEOXYTV85N6', '498230.00000000', '2022-10-07 06:30:01', '2022-10-07 06:30:01'),
(744, 1, '5000.00', '0', '+', 'Interest Return 5000.00 USD Added on Your interest wallet Balance', 'interest', 'W3ROKSZN4JDY', '503230.00000000', '2022-10-07 06:30:01', '2022-10-07 06:30:01'),
(745, 1, '20.00', '0', '+', 'Interest Return 20.00 USD Added on Your interest wallet Balance', 'interest', 'NW5BMSGQ2G4H', '503250.00000000', '2022-10-07 07:30:01', '2022-10-07 07:30:01'),
(746, 1, '5000.00', '0', '+', 'Interest Return 5000.00 USD Added on Your interest wallet Balance', 'interest', '62D4CYQN5JK2', '508250.00000000', '2022-10-07 07:30:01', '2022-10-07 07:30:01'),
(747, 1, '20.00', '0', '+', 'Interest Return 20.00 USD Added on Your interest wallet Balance', 'interest', 'OB5YEX8EFDJA', '508270.00000000', '2022-10-07 08:30:01', '2022-10-07 08:30:01'),
(748, 1, '5000.00', '0', '+', 'Interest Return 5000.00 USD Added on Your interest wallet Balance', 'interest', '1TT3PV8O1OJK', '513270.00000000', '2022-10-07 08:30:01', '2022-10-07 08:30:01'),
(749, 1, '20.00', '0', '+', 'Interest Return 20.00 USD Added on Your interest wallet Balance', 'interest', 'TM2TXGD3WW14', '513290.00000000', '2022-10-07 09:30:01', '2022-10-07 09:30:01'),
(750, 1, '5000.00', '0', '+', 'Interest Return 5000.00 USD Added on Your interest wallet Balance', 'interest', 'UZBVZFO7PKYQ', '518290.00000000', '2022-10-07 09:30:01', '2022-10-07 09:30:01'),
(751, 1, '20.00', '0', '+', 'Interest Return 20.00 USD Added on Your interest wallet Balance', 'interest', 'GKCN5GRM8KH8', '518310.00000000', '2022-10-07 10:30:01', '2022-10-07 10:30:01'),
(752, 1, '5000.00', '0', '+', 'Interest Return 5000.00 USD Added on Your interest wallet Balance', 'interest', 'XN1YQQP99Y1C', '523310.00000000', '2022-10-07 10:30:01', '2022-10-07 10:30:01'),
(753, 1, '20.00', '0', '+', 'Interest Return 20.00 USD Added on Your interest wallet Balance', 'interest', 'B1AOHHJ3W4NY', '523330.00000000', '2022-10-07 11:30:02', '2022-10-07 11:30:02'),
(754, 1, '5000.00', '0', '+', 'Interest Return 5000.00 USD Added on Your interest wallet Balance', 'interest', 'F2VJKYBNU7WG', '528330.00000000', '2022-10-07 11:30:02', '2022-10-07 11:30:02'),
(755, 1, '20.00', '0', '+', 'Interest Return 20.00 USD Added on Your interest wallet Balance', 'interest', 'OKMPB2DQ3V2K', '528350.00000000', '2022-10-07 13:00:01', '2022-10-07 13:00:01'),
(756, 1, '5000.00', '0', '+', 'Interest Return 5000.00 USD Added on Your interest wallet Balance', 'interest', '6G6O7PUUGTEX', '533350.00000000', '2022-10-07 13:00:01', '2022-10-07 13:00:01'),
(757, 1, '2.50', '0', '+', 'Interest Return 2.50 USD Added on Your interest wallet Wallet', 'interest', 'Y7B3DY8ORJF7', '533352.50000000', '2022-10-07 13:30:01', '2022-10-07 13:30:01'),
(758, 1, '20.00', '0', '+', 'Interest Return 20.00 USD Added on Your interest wallet Balance', 'interest', '31GWNOJZDJEM', '533372.50000000', '2022-10-07 14:00:01', '2022-10-07 14:00:01'),
(759, 1, '5000.00', '0', '+', 'Interest Return 5000.00 USD Added on Your interest wallet Balance', 'interest', 'QGJ32GYZQGJ7', '538372.50000000', '2022-10-07 14:00:01', '2022-10-07 14:00:01'),
(760, 4, '50.00', '0', '+', 'Interest Return 50.00 USD Added on Your interest wallet Wallet', 'interest', 'EPHT1XDX8BE1', '50.00000000', '2022-10-07 14:00:01', '2022-10-07 14:00:01'),
(761, 1, '20.00', '0', '+', 'Interest Return 20.00 USD Added on Your interest wallet Balance', 'interest', 'OGZ3JCZTOM3R', '538392.50000000', '2022-10-07 15:00:01', '2022-10-07 15:00:01'),
(762, 1, '5000.00', '0', '+', 'Interest Return 5000.00 USD Added on Your interest wallet Balance', 'interest', 'OFJA3AB7JQZS', '543392.50000000', '2022-10-07 15:00:01', '2022-10-07 15:00:01'),
(763, 1, '20.00', '0', '+', 'Interest Return 20.00 USD Added on Your interest wallet Balance', 'interest', 'O2SK1DBHHN4V', '543412.50000000', '2022-10-07 16:00:01', '2022-10-07 16:00:01'),
(764, 1, '5000.00', '0', '+', 'Interest Return 5000.00 USD Added on Your interest wallet Balance', 'interest', '5O58PGHWTJBU', '548412.50000000', '2022-10-07 16:00:01', '2022-10-07 16:00:01'),
(765, 1, '20.00', '0', '+', 'Interest Return 20.00 USD Added on Your interest wallet Balance', 'interest', 'Q9MR7D3AR4DH', '548432.50000000', '2022-10-07 17:00:01', '2022-10-07 17:00:01'),
(766, 1, '5000.00', '0', '+', 'Interest Return 5000.00 USD Added on Your interest wallet Balance', 'interest', 'QBS2YKMDRM9Z', '553432.50000000', '2022-10-07 17:00:01', '2022-10-07 17:00:01'),
(767, 1, '20.00', '0', '+', 'Interest Return 20.00 USD Added on Your interest wallet Balance', 'interest', 'TFKFR1E2VG2C', '553452.50000000', '2022-10-07 18:00:01', '2022-10-07 18:00:01'),
(768, 1, '5000.00', '0', '+', 'Interest Return 5000.00 USD Added on Your interest wallet Balance', 'interest', 'OQ29B1VOGYAH', '558452.50000000', '2022-10-07 18:00:01', '2022-10-07 18:00:01'),
(769, 1, '50.00', '0', '+', 'Interest Return 50.00 USD Added on Your interest wallet Wallet', 'interest', 'FE4WFKVYD4RY', '558502.50000000', '2022-10-07 18:30:01', '2022-10-07 18:30:01'),
(770, 1, '20.00', '0', '+', 'Interest Return 20.00 USD Added on Your interest wallet Balance', 'interest', '1RGKSCNN5CYZ', '558522.50000000', '2022-10-07 19:00:02', '2022-10-07 19:00:02'),
(771, 1, '5000.00', '0', '+', 'Interest Return 5000.00 USD Added on Your interest wallet Balance', 'interest', 'G55CUXNEG6Y4', '563522.50000000', '2022-10-07 19:00:02', '2022-10-07 19:00:02'),
(772, 1, '20.00', '0', '+', 'Interest Return 20.00 USD Added on Your interest wallet Balance', 'interest', 'GWAJ8UG5UOR1', '563542.50000000', '2022-10-07 20:30:01', '2022-10-07 20:30:01'),
(773, 1, '5000.00', '0', '+', 'Interest Return 5000.00 USD Added on Your interest wallet Balance', 'interest', 'AUA8UXOUC7PR', '568542.50000000', '2022-10-07 20:30:01', '2022-10-07 20:30:01'),
(774, 1, '20.00', '0', '+', 'Interest Return 20.00 USD Added on Your interest wallet Balance', 'interest', '7SXY5BCTX2E5', '568562.50000000', '2022-10-07 21:30:02', '2022-10-07 21:30:02'),
(775, 1, '5000.00', '0', '+', 'Interest Return 5000.00 USD Added on Your interest wallet Balance', 'interest', 'ZZ4EOJ7ZE9MR', '573562.50000000', '2022-10-07 21:30:02', '2022-10-07 21:30:02'),
(776, 1, '20.00', '0', '+', 'Interest Return 20.00 USD Added on Your interest wallet Balance', 'interest', 'UU7S78ZQWP7V', '573582.50000000', '2022-10-07 23:00:01', '2022-10-07 23:00:01'),
(777, 1, '5000.00', '0', '+', 'Interest Return 5000.00 USD Added on Your interest wallet Balance', 'interest', 'ZGWYJBBOV8W4', '578582.50000000', '2022-10-07 23:00:01', '2022-10-07 23:00:01'),
(778, 1, '20.00', '0', '+', 'Interest Return 20.00 USD Added on Your interest wallet Balance', 'interest', 'P3J1Z1D2WMFQ', '578602.50000000', '2022-10-08 00:00:01', '2022-10-08 00:00:01'),
(779, 1, '5000.00', '0', '+', 'Interest Return 5000.00 USD Added on Your interest wallet Balance', 'interest', '9Q9CY2ESFNZR', '583602.50000000', '2022-10-08 00:00:01', '2022-10-08 00:00:01'),
(780, 1, '20.00', '0', '+', 'Interest Return 20.00 USD Added on Your interest wallet Balance', 'interest', 'Y513DNQ9BE2X', '583622.50000000', '2022-10-08 01:00:02', '2022-10-08 01:00:02'),
(781, 1, '5000.00', '0', '+', 'Interest Return 5000.00 USD Added on Your interest wallet Balance', 'interest', 'S1NXPB7JB749', '588622.50000000', '2022-10-08 01:00:02', '2022-10-08 01:00:02'),
(782, 1, '20.00', '0', '+', 'Interest Return 20.00 USD Added on Your interest wallet Balance', 'interest', '4XT4QFADPUWU', '588642.50000000', '2022-10-08 02:00:02', '2022-10-08 02:00:02'),
(783, 1, '5000.00', '0', '+', 'Interest Return 5000.00 USD Added on Your interest wallet Balance', 'interest', 'GBK9KC8N591F', '593642.50000000', '2022-10-08 02:00:02', '2022-10-08 02:00:02'),
(784, 1, '20.00', '0', '+', 'Interest Return 20.00 USD Added on Your interest wallet Balance', 'interest', 'NSDY3XBU71UA', '593662.50000000', '2022-10-08 03:30:01', '2022-10-08 03:30:01'),
(785, 1, '5000.00', '0', '+', 'Interest Return 5000.00 USD Added on Your interest wallet Balance', 'interest', 'ZSYJWAVK415Z', '598662.50000000', '2022-10-08 03:30:01', '2022-10-08 03:30:01'),
(786, 1, '20.00', '0', '+', 'Interest Return 20.00 USD Added on Your interest wallet Balance', 'interest', '1PQ8SJUPQNUF', '598682.50000000', '2022-10-08 04:30:01', '2022-10-08 04:30:01'),
(787, 1, '5000.00', '0', '+', 'Interest Return 5000.00 USD Added on Your interest wallet Balance', 'interest', 'FVPMFPDGFPC3', '603682.50000000', '2022-10-08 04:30:01', '2022-10-08 04:30:01'),
(788, 1, '20.00', '0', '+', 'Interest Return 20.00 USD Added on Your interest wallet Balance', 'interest', 'HE1O1V72PMNU', '603702.50000000', '2022-10-08 05:30:01', '2022-10-08 05:30:01'),
(789, 1, '5000.00', '0', '+', 'Interest Return 5000.00 USD Added on Your interest wallet Balance', 'interest', 'TFYQUWRF369T', '608702.50000000', '2022-10-08 05:30:01', '2022-10-08 05:30:01'),
(790, 1, '20.00', '0', '+', 'Interest Return 20.00 USD Added on Your interest wallet Balance', 'interest', 'Z6SRZ4PXPSZX', '608722.50000000', '2022-10-08 06:30:01', '2022-10-08 06:30:01'),
(791, 1, '5000.00', '0', '+', 'Interest Return 5000.00 USD Added on Your interest wallet Balance', 'interest', 'XHX356DR9ST2', '613722.50000000', '2022-10-08 06:30:01', '2022-10-08 06:30:01'),
(792, 1, '20.00', '0', '+', 'Interest Return 20.00 USD Added on Your interest wallet Balance', 'interest', 'O1EFB6TH4DV9', '613742.50000000', '2022-10-08 07:30:01', '2022-10-08 07:30:01'),
(793, 1, '5000.00', '0', '+', 'Interest Return 5000.00 USD Added on Your interest wallet Balance', 'interest', 'F7UD9KH4K14F', '618742.50000000', '2022-10-08 07:30:01', '2022-10-08 07:30:01'),
(794, 1, '20.00', '0', '+', 'Interest Return 20.00 USD Added on Your interest wallet Balance', 'interest', '9RJPFAZVCVXG', '618762.50000000', '2022-10-08 08:30:01', '2022-10-08 08:30:01'),
(795, 1, '5000.00', '0', '+', 'Interest Return 5000.00 USD Added on Your interest wallet Balance', 'interest', 'A2SG21OG88FO', '623762.50000000', '2022-10-08 08:30:01', '2022-10-08 08:30:01'),
(796, 1, '20.00', '0', '+', 'Interest Return 20.00 USD Added on Your interest wallet Balance', 'interest', '5GDO18GX2OEQ', '623782.50000000', '2022-10-08 09:30:01', '2022-10-08 09:30:01'),
(797, 1, '5000.00', '0', '+', 'Interest Return 5000.00 USD Added on Your interest wallet Balance', 'interest', 'AUKUJNVYXPQS', '628782.50000000', '2022-10-08 09:30:01', '2022-10-08 09:30:01'),
(798, 1, '20.00', '0', '+', 'Interest Return 20.00 USD Added on Your interest wallet Balance', 'interest', '48FJYGW81V2G', '628802.50000000', '2022-10-08 10:30:01', '2022-10-08 10:30:01'),
(799, 1, '5000.00', '0', '+', 'Interest Return 5000.00 USD Added on Your interest wallet Balance', 'interest', 'NHPERX8ZNNS7', '633802.50000000', '2022-10-08 10:30:01', '2022-10-08 10:30:01'),
(800, 1, '20.00', '0', '+', 'Interest Return 20.00 USD Added on Your interest wallet Balance', 'interest', 'EFBNH6FWTUCG', '633822.50000000', '2022-10-08 11:30:01', '2022-10-08 11:30:01'),
(801, 1, '5000.00', '0', '+', 'Interest Return 5000.00 USD Added on Your interest wallet Balance', 'interest', 'OCWSZOBPU1XD', '638822.50000000', '2022-10-08 11:30:01', '2022-10-08 11:30:01'),
(802, 1, '20.00', '0', '+', 'Interest Return 20.00 USD Added on Your interest wallet Balance', 'interest', '4A34BMCQNA1N', '638842.50000000', '2022-10-08 12:30:01', '2022-10-08 12:30:01'),
(803, 1, '5000.00', '0', '+', 'Interest Return 5000.00 USD Added on Your interest wallet Balance', 'interest', 'GWTRUTSEYD77', '643842.50000000', '2022-10-08 12:30:01', '2022-10-08 12:30:01'),
(804, 1, '2.50', '0', '+', 'Interest Return 2.50 USD Added on Your interest wallet Wallet', 'interest', 'YRYHFHHVO2J2', '643845.00000000', '2022-10-08 13:30:01', '2022-10-08 13:30:01');
INSERT INTO `trxes` (`id`, `user_id`, `amount`, `charge`, `trx_type`, `details`, `remark`, `trx`, `post_balance`, `created_at`, `updated_at`) VALUES
(805, 1, '20.00', '0', '+', 'Interest Return 20.00 USD Added on Your interest wallet Balance', 'interest', 'SM2HZJ87AGB5', '643865.00000000', '2022-10-08 13:30:01', '2022-10-08 13:30:01'),
(806, 1, '5000.00', '0', '+', 'Interest Return 5000.00 USD Added on Your interest wallet Balance', 'interest', 'AXEZM87CV9DQ', '648865.00000000', '2022-10-08 13:30:01', '2022-10-08 13:30:01'),
(807, 4, '50.00', '0', '+', 'Interest Return 50.00 USD Added on Your interest wallet Wallet', 'interest', '2EUHCBEWXM1E', '100.00000000', '2022-10-08 14:00:01', '2022-10-08 14:00:01'),
(808, 1, '20.00', '0', '+', 'Interest Return 20.00 USD Added on Your interest wallet Balance', 'interest', 'D4CPKCTMW7UJ', '648885.00000000', '2022-10-08 14:30:01', '2022-10-08 14:30:01'),
(809, 1, '5000.00', '0', '+', 'Interest Return 5000.00 USD Added on Your interest wallet Balance', 'interest', '7X31PCBVGBCX', '653885.00000000', '2022-10-08 14:30:01', '2022-10-08 14:30:01'),
(810, 1, '20.00', '0', '+', 'Interest Return 20.00 USD Added on Your interest wallet Balance', 'interest', 'EVJKS1CAOKHX', '653905.00000000', '2022-10-08 15:30:01', '2022-10-08 15:30:01'),
(811, 1, '5000.00', '0', '+', 'Interest Return 5000.00 USD Added on Your interest wallet Balance', 'interest', 'KEMRVWYWNKJS', '658905.00000000', '2022-10-08 15:30:01', '2022-10-08 15:30:01'),
(812, 1, '20.00', '0', '+', 'Interest Return 20.00 USD Added on Your interest wallet Balance', 'interest', '9BUF6KFM3B8Z', '658925.00000000', '2022-10-08 16:30:02', '2022-10-08 16:30:02'),
(813, 1, '5000.00', '0', '+', 'Interest Return 5000.00 USD Added on Your interest wallet Balance', 'interest', '4VHEZ25PRKPH', '663925.00000000', '2022-10-08 16:30:02', '2022-10-08 16:30:02'),
(814, 1, '20.00', '0', '+', 'Interest Return 20.00 USD Added on Your interest wallet Balance', 'interest', 'RTWMAPTHG8UT', '663945.00000000', '2022-10-08 17:30:02', '2022-10-08 17:30:02'),
(815, 1, '5000.00', '0', '+', 'Interest Return 5000.00 USD Added on Your interest wallet Balance', 'interest', 'TR1TN18TNW69', '668945.00000000', '2022-10-08 17:30:02', '2022-10-08 17:30:02'),
(816, 1, '20.00', '0', '+', 'Interest Return 20.00 USD Added on Your interest wallet Balance', 'interest', 'FRQDJ9H9DW9O', '668965.00000000', '2022-10-08 18:30:02', '2022-10-08 18:30:02'),
(817, 1, '5000.00', '0', '+', 'Interest Return 5000.00 USD Added on Your interest wallet Balance', 'interest', '7GJHSYNYMZRO', '673965.00000000', '2022-10-08 18:30:02', '2022-10-08 18:30:02'),
(818, 1, '50.00', '0', '+', 'Interest Return 50.00 USD Added on Your interest wallet Wallet', 'interest', 'KSBKKH112UX6', '674015.00000000', '2022-10-08 18:30:02', '2022-10-08 18:30:02'),
(819, 1, '20.00', '0', '+', 'Interest Return 20.00 USD Added on Your interest wallet Balance', 'interest', 'WUFYRB89BYO5', '674035.00000000', '2022-10-08 20:00:01', '2022-10-08 20:00:01'),
(820, 1, '5000.00', '0', '+', 'Interest Return 5000.00 USD Added on Your interest wallet Balance', 'interest', 'OMSH5V6M367E', '679035.00000000', '2022-10-08 20:00:01', '2022-10-08 20:00:01'),
(821, 1, '20.00', '0', '+', 'Interest Return 20.00 USD Added on Your interest wallet Balance', 'interest', 'FK4GUUK1BYSE', '679055.00000000', '2022-10-08 21:00:01', '2022-10-08 21:00:01'),
(822, 1, '5000.00', '0', '+', 'Interest Return 5000.00 USD Added on Your interest wallet Balance', 'interest', '3ZZO2XEXPF13', '684055.00000000', '2022-10-08 21:00:01', '2022-10-08 21:00:01'),
(823, 1, '20.00', '0', '+', 'Interest Return 20.00 USD Added on Your interest wallet Balance', 'interest', 'Z8HP6U3NHZPV', '684075.00000000', '2022-10-08 22:00:01', '2022-10-08 22:00:01'),
(824, 1, '5000.00', '0', '+', 'Interest Return 5000.00 USD Added on Your interest wallet Balance', 'interest', '14YO6ZX6V3W7', '689075.00000000', '2022-10-08 22:00:01', '2022-10-08 22:00:01'),
(825, 1, '20.00', '0', '+', 'Interest Return 20.00 USD Added on Your interest wallet Balance', 'interest', 'O6NZFVYCJOW8', '689095.00000000', '2022-10-08 23:00:01', '2022-10-08 23:00:01'),
(826, 1, '5000.00', '0', '+', 'Interest Return 5000.00 USD Added on Your interest wallet Balance', 'interest', 'VPKFQ4HE825A', '694095.00000000', '2022-10-08 23:00:01', '2022-10-08 23:00:01'),
(827, 1, '20.00', '0', '+', 'Interest Return 20.00 USD Added on Your interest wallet Balance', 'interest', 'P9Z3R87TOXJ4', '694115.00000000', '2022-10-09 00:00:01', '2022-10-09 00:00:01'),
(828, 1, '5000.00', '0', '+', 'Interest Return 5000.00 USD Added on Your interest wallet Balance', 'interest', '2U1ZHS4OSRTH', '699115.00000000', '2022-10-09 00:00:01', '2022-10-09 00:00:01'),
(829, 1, '20.00', '0', '+', 'Interest Return 20.00 USD Added on Your interest wallet Balance', 'interest', 'QUMFY3B8QYUZ', '699135.00000000', '2022-10-09 01:00:01', '2022-10-09 01:00:01'),
(830, 1, '5000.00', '0', '+', 'Interest Return 5000.00 USD Added on Your interest wallet Balance', 'interest', 'FD3FAHGNU4T1', '704135.00000000', '2022-10-09 01:00:01', '2022-10-09 01:00:01'),
(831, 1, '20.00', '0', '+', 'Interest Return 20.00 USD Added on Your interest wallet Balance', 'interest', '2TZ8QPFDPFKF', '704155.00000000', '2022-10-09 02:00:01', '2022-10-09 02:00:01'),
(832, 1, '5000.00', '0', '+', 'Interest Return 5000.00 USD Added on Your interest wallet Balance', 'interest', 'HX8UOAX1BPQF', '709155.00000000', '2022-10-09 02:00:01', '2022-10-09 02:00:01'),
(833, 1, '20.00', '0', '+', 'Interest Return 20.00 USD Added on Your interest wallet Balance', 'interest', 'M3J76W34H3P9', '709175.00000000', '2022-10-09 03:00:01', '2022-10-09 03:00:01'),
(834, 1, '5000.00', '0', '+', 'Interest Return 5000.00 USD Added on Your interest wallet Balance', 'interest', 'EE1YYVWCU9D3', '714175.00000000', '2022-10-09 03:00:01', '2022-10-09 03:00:01'),
(835, 1, '20.00', '0', '+', 'Interest Return 20.00 USD Added on Your interest wallet Balance', 'interest', 'H2MZADOOWC1O', '714195.00000000', '2022-10-09 04:00:01', '2022-10-09 04:00:01'),
(836, 1, '5000.00', '0', '+', 'Interest Return 5000.00 USD Added on Your interest wallet Balance', 'interest', 'NADVA8CDXEQ7', '719195.00000000', '2022-10-09 04:00:01', '2022-10-09 04:00:01'),
(837, 1, '20.00', '0', '+', 'Interest Return 20.00 USD Added on Your interest wallet Balance', 'interest', 'RQF6PAVHE9C1', '719215.00000000', '2022-10-09 05:00:01', '2022-10-09 05:00:01'),
(838, 1, '5000.00', '0', '+', 'Interest Return 5000.00 USD Added on Your interest wallet Balance', 'interest', '857NDAM6XN1C', '724215.00000000', '2022-10-09 05:00:01', '2022-10-09 05:00:01'),
(839, 1, '20.00', '0', '+', 'Interest Return 20.00 USD Added on Your interest wallet Balance', 'interest', '2A8ROMMZZZ9R', '724235.00000000', '2022-10-09 06:00:01', '2022-10-09 06:00:01'),
(840, 1, '5000.00', '0', '+', 'Interest Return 5000.00 USD Added on Your interest wallet Balance', 'interest', 'R4XKEN2Z2M88', '729235.00000000', '2022-10-09 06:00:01', '2022-10-09 06:00:01'),
(841, 1, '20.00', '0', '+', 'Interest Return 20.00 USD Added on Your interest wallet Balance', 'interest', '5D31EPR31K3U', '729255.00000000', '2022-10-09 07:00:01', '2022-10-09 07:00:01'),
(842, 1, '5000.00', '0', '+', 'Interest Return 5000.00 USD Added on Your interest wallet Balance', 'interest', 'TDKZ7UK4ZKP5', '734255.00000000', '2022-10-09 07:00:01', '2022-10-09 07:00:01'),
(843, 1, '20.00', '0', '+', 'Interest Return 20.00 USD Added on Your interest wallet Balance', 'interest', 'D8VKYRPU88UO', '734275.00000000', '2022-10-09 08:00:01', '2022-10-09 08:00:01'),
(844, 1, '5000.00', '0', '+', 'Interest Return 5000.00 USD Added on Your interest wallet Balance', 'interest', 'EED3UNPAP391', '739275.00000000', '2022-10-09 08:00:01', '2022-10-09 08:00:01'),
(845, 1, '20.00', '0', '+', 'Interest Return 20.00 USD Added on Your interest wallet Balance', 'interest', 'YY2TKVAD3UM5', '739295.00000000', '2022-10-09 09:00:02', '2022-10-09 09:00:02'),
(846, 1, '5000.00', '0', '+', 'Interest Return 5000.00 USD Added on Your interest wallet Balance', 'interest', 'T2POZ5YRT5NZ', '744295.00000000', '2022-10-09 09:00:02', '2022-10-09 09:00:02'),
(847, 1, '20.00', '0', '+', 'Interest Return 20.00 USD Added on Your interest wallet Balance', 'interest', 'FA6EQBW8FK2M', '744315.00000000', '2022-10-09 10:30:02', '2022-10-09 10:30:02'),
(848, 1, '5000.00', '0', '+', 'Interest Return 5000.00 USD Added on Your interest wallet Balance', 'interest', '9HN5G8WK3WVZ', '749315.00000000', '2022-10-09 10:30:02', '2022-10-09 10:30:02'),
(849, 1, '20.00', '0', '+', 'Interest Return 20.00 USD Added on Your interest wallet Balance', 'interest', '4KNO23KBJH75', '749335.00000000', '2022-10-09 12:00:02', '2022-10-09 12:00:02'),
(850, 1, '5000.00', '0', '+', 'Interest Return 5000.00 USD Added on Your interest wallet Balance', 'interest', 'KEQEDJBGADXC', '754335.00000000', '2022-10-09 12:00:02', '2022-10-09 12:00:02'),
(851, 1, '2.50', '0', '+', 'Interest Return 2.50 USD Added on Your interest wallet Wallet', 'interest', 'GRA227WX3BP5', '754337.50000000', '2022-10-09 13:30:01', '2022-10-09 13:30:01'),
(852, 1, '20.00', '0', '+', 'Interest Return 20.00 USD Added on Your interest wallet Balance', 'interest', '4S78UMEWA9CP', '754357.50000000', '2022-10-09 13:30:01', '2022-10-09 13:30:01'),
(853, 1, '5000.00', '0', '+', 'Interest Return 5000.00 USD Added on Your interest wallet Balance', 'interest', 'WW43UUQ1DR1O', '759357.50000000', '2022-10-09 13:30:01', '2022-10-09 13:30:01'),
(854, 4, '50.00', '0', '+', 'Interest Return 50.00 USD Added on Your interest wallet Wallet', 'interest', 'KHOO7C97Z6AZ', '150.00000000', '2022-10-09 14:00:01', '2022-10-09 14:00:01'),
(855, 1, '20.00', '0', '+', 'Interest Return 20.00 USD Added on Your interest wallet Balance', 'interest', 'SOCHHXW8CJRH', '759377.50000000', '2022-10-09 14:30:01', '2022-10-09 14:30:01'),
(856, 1, '5000.00', '0', '+', 'Interest Return 5000.00 USD Added on Your interest wallet Balance', 'interest', 'NZBVOU5T389N', '764377.50000000', '2022-10-09 14:30:01', '2022-10-09 14:30:01'),
(857, 1, '20.00', '0', '+', 'Interest Return 20.00 USD Added on Your interest wallet Balance', 'interest', 'G47CVFRXKF3F', '764397.50000000', '2022-10-09 15:30:01', '2022-10-09 15:30:01'),
(858, 1, '5000.00', '0', '+', 'Interest Return 5000.00 USD Added on Your interest wallet Balance', 'interest', 'BZEYK7HDZWSU', '769397.50000000', '2022-10-09 15:30:01', '2022-10-09 15:30:01'),
(859, 1, '20.00', '0', '+', 'Interest Return 20.00 USD Added on Your interest wallet Balance', 'interest', '4ERDDYXZ3ROQ', '769417.50000000', '2022-10-09 16:30:02', '2022-10-09 16:30:02'),
(860, 1, '5000.00', '0', '+', 'Interest Return 5000.00 USD Added on Your interest wallet Balance', 'interest', 'WWZMO392QJMX', '774417.50000000', '2022-10-09 16:30:02', '2022-10-09 16:30:02'),
(861, 1, '20.00', '0', '+', 'Interest Return 20.00 USD Added on Your interest wallet Balance', 'interest', 'JV8O5XC4ET69', '774437.50000000', '2022-10-09 17:30:02', '2022-10-09 17:30:02'),
(862, 1, '5000.00', '0', '+', 'Interest Return 5000.00 USD Added on Your interest wallet Balance', 'interest', 'ZZQDBYF5YVH6', '779437.50000000', '2022-10-09 17:30:02', '2022-10-09 17:30:02'),
(863, 1, '20.00', '0', '+', 'Interest Return 20.00 USD Added on Your interest wallet Balance', 'interest', 'UJBT2V366Q37', '779457.50000000', '2022-10-09 19:00:01', '2022-10-09 19:00:01'),
(864, 1, '5000.00', '0', '+', 'Interest Return 5000.00 USD Added on Your interest wallet Balance', 'interest', '6YWTJCXF5MS7', '784457.50000000', '2022-10-09 19:00:01', '2022-10-09 19:00:01'),
(865, 1, '50.00', '0', '+', 'Interest Return 50.00 USD Added on Your interest wallet Wallet', 'interest', 'KSEZ9O1A3QNJ', '784507.50000000', '2022-10-09 19:00:01', '2022-10-09 19:00:01'),
(866, 1, '20.00', '0', '+', 'Interest Return 20.00 USD Added on Your interest wallet Balance', 'interest', '7AG1NOZ1KNN1', '784527.50000000', '2022-10-09 20:00:01', '2022-10-09 20:00:01'),
(867, 1, '5000.00', '0', '+', 'Interest Return 5000.00 USD Added on Your interest wallet Balance', 'interest', 'AQHH89TKYMB8', '789527.50000000', '2022-10-09 20:00:01', '2022-10-09 20:00:01'),
(868, 1, '20.00', '0', '+', 'Interest Return 20.00 USD Added on Your interest wallet Balance', 'interest', 'SMTSD1YVOZCC', '789547.50000000', '2022-10-09 21:00:01', '2022-10-09 21:00:01'),
(869, 1, '5000.00', '0', '+', 'Interest Return 5000.00 USD Added on Your interest wallet Balance', 'interest', 'DX2GHPWUBAFP', '794547.50000000', '2022-10-09 21:00:01', '2022-10-09 21:00:01'),
(870, 1, '20.00', '0', '+', 'Interest Return 20.00 USD Added on Your interest wallet Balance', 'interest', 'PSH1R1GGYNBU', '794567.50000000', '2022-10-09 22:00:02', '2022-10-09 22:00:02'),
(871, 1, '5000.00', '0', '+', 'Interest Return 5000.00 USD Added on Your interest wallet Balance', 'interest', 'BD95R7Z44FYV', '799567.50000000', '2022-10-09 22:00:02', '2022-10-09 22:00:02'),
(872, 1, '20.00', '0', '+', 'Interest Return 20.00 USD Added on Your interest wallet Balance', 'interest', '397HHD3FPUZC', '799587.50000000', '2022-10-09 23:30:01', '2022-10-09 23:30:01'),
(873, 1, '5000.00', '0', '+', 'Interest Return 5000.00 USD Added on Your interest wallet Balance', 'interest', 'QP85SK7J5Z7J', '804587.50000000', '2022-10-09 23:30:01', '2022-10-09 23:30:01'),
(874, 1, '20.00', '0', '+', 'Interest Return 20.00 USD Added on Your interest wallet Balance', 'interest', '4GWWW9NAY6M8', '804607.50000000', '2022-10-10 00:30:01', '2022-10-10 00:30:01'),
(875, 1, '5000.00', '0', '+', 'Interest Return 5000.00 USD Added on Your interest wallet Balance', 'interest', 'WX28HMW3SMVY', '809607.50000000', '2022-10-10 00:30:01', '2022-10-10 00:30:01'),
(876, 1, '20.00', '0', '+', 'Interest Return 20.00 USD Added on Your interest wallet Balance', 'interest', 'AJVCESYJ51Z8', '809627.50000000', '2022-10-10 01:30:02', '2022-10-10 01:30:02'),
(877, 1, '5000.00', '0', '+', 'Interest Return 5000.00 USD Added on Your interest wallet Balance', 'interest', '9UNRJOS48FWS', '814627.50000000', '2022-10-10 01:30:02', '2022-10-10 01:30:02'),
(878, 1, '20.00', '0', '+', 'Interest Return 20.00 USD Added on Your interest wallet Balance', 'interest', '3MZNR4CX8BM7', '814647.50000000', '2022-10-10 03:00:01', '2022-10-10 03:00:01'),
(879, 1, '5000.00', '0', '+', 'Interest Return 5000.00 USD Added on Your interest wallet Balance', 'interest', '93GDUCP6OHYV', '819647.50000000', '2022-10-10 03:00:01', '2022-10-10 03:00:01'),
(880, 1, '20.00', '0', '+', 'Interest Return 20.00 USD Added on Your interest wallet Balance', 'interest', '8MDU4VJ5NUUR', '819667.50000000', '2022-10-10 04:00:02', '2022-10-10 04:00:02'),
(881, 1, '5000.00', '0', '+', 'Interest Return 5000.00 USD Added on Your interest wallet Balance', 'interest', '7DYQO5SVFCKV', '824667.50000000', '2022-10-10 04:00:02', '2022-10-10 04:00:02'),
(882, 1, '20.00', '0', '+', 'Interest Return 20.00 USD Added on Your interest wallet Balance', 'interest', '8A8ZKF2JTZSK', '824687.50000000', '2022-10-10 05:30:01', '2022-10-10 05:30:01'),
(883, 1, '5000.00', '0', '+', 'Interest Return 5000.00 USD Added on Your interest wallet Balance', 'interest', 'ZY6OKETEPNKF', '829687.50000000', '2022-10-10 05:30:01', '2022-10-10 05:30:01'),
(884, 1, '20.00', '0', '+', 'Interest Return 20.00 USD Added on Your interest wallet Balance', 'interest', 'Q4UWDNGJTPW3', '829707.50000000', '2022-10-10 06:30:01', '2022-10-10 06:30:01'),
(885, 1, '5000.00', '0', '+', 'Interest Return 5000.00 USD Added on Your interest wallet Balance', 'interest', '4KMD21TYXGK9', '834707.50000000', '2022-10-10 06:30:01', '2022-10-10 06:30:01'),
(886, 1, '20.00', '0', '+', 'Interest Return 20.00 USD Added on Your interest wallet Balance', 'interest', 'JE7WBRTVCECG', '834727.50000000', '2022-10-10 07:30:01', '2022-10-10 07:30:01'),
(887, 1, '5000.00', '0', '+', 'Interest Return 5000.00 USD Added on Your interest wallet Balance', 'interest', 'RHBXUZQCWCVM', '839727.50000000', '2022-10-10 07:30:01', '2022-10-10 07:30:01'),
(888, 1, '20.00', '0', '+', 'Interest Return 20.00 USD Added on Your interest wallet Balance', 'interest', 'YOHWDCH1Q8HC', '839747.50000000', '2022-10-10 08:30:02', '2022-10-10 08:30:02'),
(889, 1, '5000.00', '0', '+', 'Interest Return 5000.00 USD Added on Your interest wallet Balance', 'interest', 'WC23U1694F33', '844747.50000000', '2022-10-10 08:30:02', '2022-10-10 08:30:02'),
(890, 1, '20.00', '0', '+', 'Interest Return 20.00 USD Added on Your interest wallet Balance', 'interest', '6VOCMAJNB2K1', '844767.50000000', '2022-10-10 09:30:02', '2022-10-10 09:30:02'),
(891, 1, '5000.00', '0', '+', 'Interest Return 5000.00 USD Added on Your interest wallet Balance', 'interest', 'EEP8WCCD3DFQ', '849767.50000000', '2022-10-10 09:30:02', '2022-10-10 09:30:02'),
(892, 1, '20.00', '0', '+', 'Interest Return 20.00 USD Added on Your interest wallet Balance', 'interest', 'KWM5SDTUKRHY', '849787.50000000', '2022-10-10 10:30:02', '2022-10-10 10:30:02'),
(893, 1, '5000.00', '0', '+', 'Interest Return 5000.00 USD Added on Your interest wallet Balance', 'interest', 'EVQVHJ2OW2SJ', '854787.50000000', '2022-10-10 10:30:02', '2022-10-10 10:30:02'),
(894, 1, '20.00', '0', '+', 'Interest Return 20.00 USD Added on Your interest wallet Balance', 'interest', 'JXSRQA6OMMMS', '854807.50000000', '2022-10-10 12:00:01', '2022-10-10 12:00:01'),
(895, 1, '5000.00', '0', '+', 'Interest Return 5000.00 USD Added on Your interest wallet Balance', 'interest', 'OK75ETRJUA84', '859807.50000000', '2022-10-10 12:00:01', '2022-10-10 12:00:01'),
(896, 1, '20.00', '0', '+', 'Interest Return 20.00 USD Added on Your interest wallet Balance', 'interest', 'KHAX26YZHSQ1', '859827.50000000', '2022-10-10 13:00:01', '2022-10-10 13:00:01'),
(897, 1, '5000.00', '0', '+', 'Interest Return 5000.00 USD Added on Your interest wallet Balance', 'interest', 'P6HNHDUEKGDE', '864827.50000000', '2022-10-10 13:00:01', '2022-10-10 13:00:01'),
(898, 1, '2.50', '0', '+', 'Interest Return 2.50 USD Added on Your interest wallet Wallet', 'interest', 'DNST672VN7NT', '864830.00000000', '2022-10-10 13:30:01', '2022-10-10 13:30:01'),
(899, 1, '20.00', '0', '+', 'Interest Return 20.00 USD Added on Your interest wallet Balance', 'interest', 'DAZTA1VYKY49', '864850.00000000', '2022-10-10 14:00:02', '2022-10-10 14:00:02'),
(900, 1, '5000.00', '0', '+', 'Interest Return 5000.00 USD Added on Your interest wallet Balance', 'interest', '29TQ4TXN98ED', '869850.00000000', '2022-10-10 14:00:02', '2022-10-10 14:00:02'),
(901, 4, '50.00', '0', '+', 'Interest Return 50.00 USD Added on Your interest wallet Wallet', 'interest', '5U1C8JRUJAAX', '200.00000000', '2022-10-10 14:00:02', '2022-10-10 14:00:02'),
(902, 1, '20.00', '0', '+', 'Interest Return 20.00 USD Added on Your interest wallet Balance', 'interest', 'AQNE6FV9564Z', '869870.00000000', '2022-10-10 15:30:02', '2022-10-10 15:30:02'),
(903, 1, '5000.00', '0', '+', 'Interest Return 5000.00 USD Added on Your interest wallet Balance', 'interest', 'DCOP196GF3E6', '874870.00000000', '2022-10-10 15:30:02', '2022-10-10 15:30:02'),
(904, 1, '20.00', '0', '+', 'Interest Return 20.00 USD Added on Your interest wallet Balance', 'interest', 'Z3AZ3O1YH6A6', '874890.00000000', '2022-10-10 16:30:02', '2022-10-10 16:30:02'),
(905, 1, '5000.00', '0', '+', 'Interest Return 5000.00 USD Added on Your interest wallet Balance', 'interest', '5P8F3XQMRPKP', '879890.00000000', '2022-10-10 16:30:02', '2022-10-10 16:30:02'),
(906, 1, '20.00', '0', '+', 'Interest Return 20.00 USD Added on Your interest wallet Balance', 'interest', '2T2RW151RRYQ', '879910.00000000', '2022-10-10 17:30:02', '2022-10-10 17:30:02'),
(907, 1, '5000.00', '0', '+', 'Interest Return 5000.00 USD Added on Your interest wallet Balance', 'interest', '41BWMEENQK73', '884910.00000000', '2022-10-10 17:30:02', '2022-10-10 17:30:02'),
(908, 1, '20.00', '0', '+', 'Interest Return 20.00 USD Added on Your interest wallet Balance', 'interest', 'UQEVNWQDBAJA', '884930.00000000', '2022-10-10 19:00:01', '2022-10-10 19:00:01'),
(909, 1, '5000.00', '0', '+', 'Interest Return 5000.00 USD Added on Your interest wallet Balance', 'interest', 'D3PYPJ56UOS2', '889930.00000000', '2022-10-10 19:00:01', '2022-10-10 19:00:01'),
(910, 1, '50.00', '0', '+', 'Interest Return 50.00 USD Added on Your interest wallet Wallet', 'interest', '4TV1OTYT8W5T', '889980.00000000', '2022-10-10 19:00:01', '2022-10-10 19:00:01'),
(911, 1, '20.00', '0', '+', 'Interest Return 20.00 USD Added on Your interest wallet Balance', 'interest', 'C5PYSBREQ5GU', '890000.00000000', '2022-10-10 20:00:01', '2022-10-10 20:00:01'),
(912, 1, '5000.00', '0', '+', 'Interest Return 5000.00 USD Added on Your interest wallet Balance', 'interest', 'Q3KPWY2H7BV5', '895000.00000000', '2022-10-10 20:00:01', '2022-10-10 20:00:01'),
(913, 1, '20.00', '0', '+', 'Interest Return 20.00 USD Added on Your interest wallet Balance', 'interest', '9E2FFFAQSTAB', '895020.00000000', '2022-10-10 21:00:01', '2022-10-10 21:00:01'),
(914, 1, '5000.00', '0', '+', 'Interest Return 5000.00 USD Added on Your interest wallet Balance', 'interest', 'CFA2MSUH5XTH', '900020.00000000', '2022-10-10 21:00:01', '2022-10-10 21:00:01'),
(915, 1, '20.00', '0', '+', 'Interest Return 20.00 USD Added on Your interest wallet Balance', 'interest', 'B8DTUM486W5P', '900040.00000000', '2022-10-10 22:00:01', '2022-10-10 22:00:01'),
(916, 1, '5000.00', '0', '+', 'Interest Return 5000.00 USD Added on Your interest wallet Balance', 'interest', 'AN2GGSNDDDDH', '905040.00000000', '2022-10-10 22:00:01', '2022-10-10 22:00:01'),
(917, 1, '20.00', '0', '+', 'Interest Return 20.00 USD Added on Your interest wallet Balance', 'interest', 'VGY2UGBU5XDU', '905060.00000000', '2022-10-10 23:00:01', '2022-10-10 23:00:01'),
(918, 1, '5000.00', '0', '+', 'Interest Return 5000.00 USD Added on Your interest wallet Balance', 'interest', 'YNT62219Q1A8', '910060.00000000', '2022-10-10 23:00:01', '2022-10-10 23:00:01'),
(919, 1, '20.00', '0', '+', 'Interest Return 20.00 USD Added on Your interest wallet Balance', 'interest', 'BEHHGOVE9VYH', '910080.00000000', '2022-10-11 00:00:02', '2022-10-11 00:00:02'),
(920, 1, '5000.00', '0', '+', 'Interest Return 5000.00 USD Added on Your interest wallet Balance', 'interest', 'GH654VTP82ET', '915080.00000000', '2022-10-11 00:00:02', '2022-10-11 00:00:02'),
(921, 1, '20.00', '0', '+', 'Interest Return 20.00 USD Added on Your interest wallet Balance', 'interest', 'Q3JGY9Z4NR1Y', '915100.00000000', '2022-10-11 01:30:01', '2022-10-11 01:30:01'),
(922, 1, '5000.00', '0', '+', 'Interest Return 5000.00 USD Added on Your interest wallet Balance', 'interest', '5W9C2P8TEYO6', '920100.00000000', '2022-10-11 01:30:01', '2022-10-11 01:30:01'),
(923, 1, '20.00', '0', '+', 'Interest Return 20.00 USD Added on Your interest wallet Balance', 'interest', 'OBKWJ8QO2ET5', '920120.00000000', '2022-10-11 02:30:01', '2022-10-11 02:30:01'),
(924, 1, '5000.00', '0', '+', 'Interest Return 5000.00 USD Added on Your interest wallet Balance', 'interest', 'KYONQ7K6TGUZ', '925120.00000000', '2022-10-11 02:30:01', '2022-10-11 02:30:01'),
(925, 1, '20.00', '0', '+', 'Interest Return 20.00 USD Added on Your interest wallet Balance', 'interest', 'DT8SGOBEK1OJ', '925140.00000000', '2022-10-11 03:30:01', '2022-10-11 03:30:01'),
(926, 1, '5000.00', '0', '+', 'Interest Return 5000.00 USD Added on Your interest wallet Balance', 'interest', 'AMMQB8XX3FC5', '930140.00000000', '2022-10-11 03:30:01', '2022-10-11 03:30:01'),
(927, 1, '20.00', '0', '+', 'Interest Return 20.00 USD Added on Your interest wallet Balance', 'interest', '1YS4CFFYQZAB', '930160.00000000', '2022-10-11 04:30:01', '2022-10-11 04:30:01'),
(928, 1, '5000.00', '0', '+', 'Interest Return 5000.00 USD Added on Your interest wallet Balance', 'interest', 'Q8K5FN1Y94C5', '935160.00000000', '2022-10-11 04:30:01', '2022-10-11 04:30:01'),
(929, 1, '20.00', '0', '+', 'Interest Return 20.00 USD Added on Your interest wallet Balance', 'interest', '95UFYY3QZTVG', '935180.00000000', '2022-10-11 05:30:01', '2022-10-11 05:30:01'),
(930, 1, '5000.00', '0', '+', 'Interest Return 5000.00 USD Added on Your interest wallet Balance', 'interest', 'B7AH458Q8KRZ', '940180.00000000', '2022-10-11 05:30:01', '2022-10-11 05:30:01'),
(931, 1, '20.00', '0', '+', 'Interest Return 20.00 USD Added on Your interest wallet Balance', 'interest', 'VGBT7QRSMY8A', '940200.00000000', '2022-10-11 06:30:02', '2022-10-11 06:30:02'),
(932, 1, '5000.00', '0', '+', 'Interest Return 5000.00 USD Added on Your interest wallet Balance', 'interest', 'PQKKR9C6MZXN', '945200.00000000', '2022-10-11 06:30:02', '2022-10-11 06:30:02'),
(933, 1, '20.00', '0', '+', 'Interest Return 20.00 USD Added on Your interest wallet Balance', 'interest', 'GNED53ASD69P', '945220.00000000', '2022-10-11 08:00:02', '2022-10-11 08:00:02'),
(934, 1, '5000.00', '0', '+', 'Interest Return 5000.00 USD Added on Your interest wallet Balance', 'interest', '86KTN7AECWXO', '950220.00000000', '2022-10-11 08:00:02', '2022-10-11 08:00:02'),
(935, 1, '20.00', '0', '+', 'Interest Return 20.00 USD Added on Your interest wallet Balance', 'interest', 'EBDB2VRDBTEE', '950240.00000000', '2022-10-11 09:00:01', '2022-10-11 09:00:01'),
(936, 1, '5000.00', '0', '+', 'Interest Return 5000.00 USD Added on Your interest wallet Balance', 'interest', 'Y25HPM8H4C9M', '955240.00000000', '2022-10-11 09:00:01', '2022-10-11 09:00:01'),
(937, 1, '20.00', '0', '+', 'Interest Return 20.00 USD Added on Your interest wallet Balance', 'interest', 'SERK5KUF31BD', '955260.00000000', '2022-10-11 10:00:01', '2022-10-11 10:00:01'),
(938, 1, '5000.00', '0', '+', 'Interest Return 5000.00 USD Added on Your interest wallet Balance', 'interest', '9ZN9O9TUXVUJ', '960260.00000000', '2022-10-11 10:00:01', '2022-10-11 10:00:01'),
(939, 1, '20.00', '0', '+', 'Interest Return 20.00 USD Added on Your interest wallet Balance', 'interest', 'KHU1DVJ53PVD', '960280.00000000', '2022-10-11 11:00:01', '2022-10-11 11:00:01'),
(940, 1, '5000.00', '0', '+', 'Interest Return 5000.00 USD Added on Your interest wallet Balance', 'interest', 'XZV7V4AEAV6R', '965280.00000000', '2022-10-11 11:00:01', '2022-10-11 11:00:01'),
(941, 1, '20.00', '0', '+', 'Interest Return 20.00 USD Added on Your interest wallet Balance', 'interest', 'XYE3NXRJWNQK', '965300.00000000', '2022-10-11 12:00:01', '2022-10-11 12:00:01'),
(942, 1, '5000.00', '0', '+', 'Interest Return 5000.00 USD Added on Your interest wallet Balance', 'interest', '7RRD862ON8NG', '970300.00000000', '2022-10-11 12:00:01', '2022-10-11 12:00:01'),
(943, 1, '20.00', '0', '+', 'Interest Return 20.00 USD Added on Your interest wallet Balance', 'interest', 'M3P5VEJFXN9W', '970320.00000000', '2022-10-11 13:00:01', '2022-10-11 13:00:01'),
(944, 1, '5000.00', '0', '+', 'Interest Return 5000.00 USD Added on Your interest wallet Balance', 'interest', '49BGX9QJ7K53', '975320.00000000', '2022-10-11 13:00:01', '2022-10-11 13:00:01'),
(945, 1, '2.50', '0', '+', 'Interest Return 2.50 USD Added on Your interest wallet Wallet', 'interest', 'K8RKA9U6TSNK', '975322.50000000', '2022-10-11 13:30:01', '2022-10-11 13:30:01'),
(946, 1, '20.00', '0', '+', 'Interest Return 20.00 USD Added on Your interest wallet Balance', 'interest', '82G3QPSD9FP2', '975342.50000000', '2022-10-11 14:00:01', '2022-10-11 14:00:01'),
(947, 1, '5000.00', '0', '+', 'Interest Return 5000.00 USD Added on Your interest wallet Balance', 'interest', '246K4YD5BNPN', '980342.50000000', '2022-10-11 14:00:01', '2022-10-11 14:00:01'),
(948, 4, '50.00', '0', '+', 'Interest Return 50.00 USD Added on Your interest wallet Wallet', 'interest', '13NUQO2OG3SB', '250.00000000', '2022-10-11 14:30:01', '2022-10-11 14:30:01'),
(949, 1, '20.00', '0', '+', 'Interest Return 20.00 USD Added on Your interest wallet Balance', 'interest', 'JVAZ4MWDWH2H', '980362.50000000', '2022-10-11 15:00:01', '2022-10-11 15:00:01'),
(950, 1, '5000.00', '0', '+', 'Interest Return 5000.00 USD Added on Your interest wallet Balance', 'interest', '47K7UHUVXT9G', '985362.50000000', '2022-10-11 15:00:01', '2022-10-11 15:00:01'),
(951, 1, '20.00', '0', '+', 'Interest Return 20.00 USD Added on Your interest wallet Balance', 'interest', '5A1JZSXHXYEG', '985382.50000000', '2022-10-11 16:00:01', '2022-10-11 16:00:01'),
(952, 1, '5000.00', '0', '+', 'Interest Return 5000.00 USD Added on Your interest wallet Balance', 'interest', 'HM8CE8WCK6F6', '990382.50000000', '2022-10-11 16:00:01', '2022-10-11 16:00:01'),
(953, 1, '20.00', '0', '+', 'Interest Return 20.00 USD Added on Your interest wallet Balance', 'interest', '5K3MBKWC3ON4', '990402.50000000', '2022-10-11 17:00:01', '2022-10-11 17:00:01'),
(954, 1, '5000.00', '0', '+', 'Interest Return 5000.00 USD Added on Your interest wallet Balance', 'interest', 'AS5G13NB9FJ3', '995402.50000000', '2022-10-11 17:00:01', '2022-10-11 17:00:01'),
(955, 1, '20.00', '0', '+', 'Interest Return 20.00 USD Added on Your interest wallet Balance', 'interest', 'MTG6MEOSJHPQ', '995422.50000000', '2022-10-11 18:00:01', '2022-10-11 18:00:01'),
(956, 1, '5000.00', '0', '+', 'Interest Return 5000.00 USD Added on Your interest wallet Balance', 'interest', 'DY6JHZV3WWGA', '1000422.50000000', '2022-10-11 18:00:01', '2022-10-11 18:00:01'),
(957, 1, '20.00', '0', '+', 'Interest Return 20.00 USD Added on Your interest wallet Balance', 'interest', 'RCZ4WC6NR68U', '1000442.50000000', '2022-10-11 19:00:02', '2022-10-11 19:00:02'),
(958, 1, '5000.00', '0', '+', 'Interest Return 5000.00 USD Added on Your interest wallet Balance', 'interest', 'OGHQWUY2UGHB', '1005442.50000000', '2022-10-11 19:00:02', '2022-10-11 19:00:02'),
(959, 1, '50.00', '0', '+', 'Interest Return 50.00 USD Added on Your interest wallet Wallet', 'interest', 'A113WV3BVQ87', '1005492.50000000', '2022-10-11 19:00:02', '2022-10-11 19:00:02'),
(960, 1, '20.00', '0', '+', 'Interest Return 20.00 USD Added on Your interest wallet Balance', 'interest', '6RKTY5Q81BW7', '1005512.50000000', '2022-10-11 20:30:01', '2022-10-11 20:30:01'),
(961, 1, '5000.00', '0', '+', 'Interest Return 5000.00 USD Added on Your interest wallet Balance', 'interest', '5WMYBGVFS6ZY', '1010512.50000000', '2022-10-11 20:30:01', '2022-10-11 20:30:01'),
(962, 1, '20.00', '0', '+', 'Interest Return 20.00 USD Added on Your interest wallet Balance', 'interest', '4S5T17KUCJTQ', '1010532.50000000', '2022-10-11 21:30:01', '2022-10-11 21:30:01'),
(963, 1, '5000.00', '0', '+', 'Interest Return 5000.00 USD Added on Your interest wallet Balance', 'interest', '7GYZ62SRPV47', '1015532.50000000', '2022-10-11 21:30:01', '2022-10-11 21:30:01'),
(964, 1, '20.00', '0', '+', 'Interest Return 20.00 USD Added on Your interest wallet Balance', 'interest', 'W3PWWJPH4AEG', '1015552.50000000', '2022-10-11 22:30:01', '2022-10-11 22:30:01'),
(965, 1, '5000.00', '0', '+', 'Interest Return 5000.00 USD Added on Your interest wallet Balance', 'interest', '7EF4UVPMGWKT', '1020552.50000000', '2022-10-11 22:30:01', '2022-10-11 22:30:01'),
(966, 1, '20.00', '0', '+', 'Interest Return 20.00 USD Added on Your interest wallet Balance', 'interest', 'EG8K2WVEZ9TV', '1020572.50000000', '2022-10-11 23:30:01', '2022-10-11 23:30:01'),
(967, 1, '5000.00', '0', '+', 'Interest Return 5000.00 USD Added on Your interest wallet Balance', 'interest', '43XB8ET2P1QA', '1025572.50000000', '2022-10-11 23:30:01', '2022-10-11 23:30:01'),
(968, 1, '20.00', '0', '+', 'Interest Return 20.00 USD Added on Your interest wallet Balance', 'interest', '6UKJERB544K2', '1025592.50000000', '2022-10-12 00:30:01', '2022-10-12 00:30:01'),
(969, 1, '5000.00', '0', '+', 'Interest Return 5000.00 USD Added on Your interest wallet Balance', 'interest', 'NM6XZ1QPOQKO', '1030592.50000000', '2022-10-12 00:30:01', '2022-10-12 00:30:01'),
(970, 1, '20.00', '0', '+', 'Interest Return 20.00 USD Added on Your interest wallet Balance', 'interest', 'VZVSV14NKG92', '1030612.50000000', '2022-10-12 01:30:01', '2022-10-12 01:30:01'),
(971, 1, '5000.00', '0', '+', 'Interest Return 5000.00 USD Added on Your interest wallet Balance', 'interest', 'QOB6S7HQ8TPE', '1035612.50000000', '2022-10-12 01:30:01', '2022-10-12 01:30:01'),
(972, 1, '20.00', '0', '+', 'Interest Return 20.00 USD Added on Your interest wallet Balance', 'interest', 'DXW6U147JYK8', '1035632.50000000', '2022-10-12 02:30:01', '2022-10-12 02:30:01'),
(973, 1, '5000.00', '0', '+', 'Interest Return 5000.00 USD Added on Your interest wallet Balance', 'interest', '3J9QMQ8H84AS', '1040632.50000000', '2022-10-12 02:30:01', '2022-10-12 02:30:01'),
(974, 1, '20.00', '0', '+', 'Interest Return 20.00 USD Added on Your interest wallet Balance', 'interest', 'HGZNMQWK6YFA', '1040652.50000000', '2022-10-12 03:30:01', '2022-10-12 03:30:01'),
(975, 1, '5000.00', '0', '+', 'Interest Return 5000.00 USD Added on Your interest wallet Balance', 'interest', 'PQA7TX2R9FDD', '1045652.50000000', '2022-10-12 03:30:01', '2022-10-12 03:30:01'),
(976, 1, '20.00', '0', '+', 'Interest Return 20.00 USD Added on Your interest wallet Balance', 'interest', '4W4F24KNPUHG', '1045672.50000000', '2022-10-12 04:30:01', '2022-10-12 04:30:01'),
(977, 1, '5000.00', '0', '+', 'Interest Return 5000.00 USD Added on Your interest wallet Balance', 'interest', 'MXDWGY2C3APD', '1050672.50000000', '2022-10-12 04:30:01', '2022-10-12 04:30:01'),
(978, 1, '20.00', '0', '+', 'Interest Return 20.00 USD Added on Your interest wallet Balance', 'interest', 'VTQUJR6JZUE7', '1050692.50000000', '2022-10-12 05:30:01', '2022-10-12 05:30:01'),
(979, 1, '5000.00', '0', '+', 'Interest Return 5000.00 USD Added on Your interest wallet Balance', 'interest', 'BGEUJ9H42PCV', '1055692.50000000', '2022-10-12 05:30:01', '2022-10-12 05:30:01'),
(980, 1, '20.00', '0', '+', 'Interest Return 20.00 USD Added on Your interest wallet Balance', 'interest', 'YV5PMMVUSFVX', '1055712.50000000', '2022-10-12 06:30:01', '2022-10-12 06:30:01'),
(981, 1, '5000.00', '0', '+', 'Interest Return 5000.00 USD Added on Your interest wallet Balance', 'interest', 'YGFGQTMVFKEA', '1060712.50000000', '2022-10-12 06:30:01', '2022-10-12 06:30:01'),
(982, 1, '20.00', '0', '+', 'Interest Return 20.00 USD Added on Your interest wallet Balance', 'interest', '445YMYBWNTVX', '1060732.50000000', '2022-10-12 07:30:02', '2022-10-12 07:30:02'),
(983, 1, '5000.00', '0', '+', 'Interest Return 5000.00 USD Added on Your interest wallet Balance', 'interest', 'KWKO48UVAUA5', '1065732.50000000', '2022-10-12 07:30:02', '2022-10-12 07:30:02'),
(984, 1, '20.00', '0', '+', 'Interest Return 20.00 USD Added on Your interest wallet Balance', 'interest', 'WDAQ1VDQRHKJ', '1065752.50000000', '2022-10-12 09:00:01', '2022-10-12 09:00:01'),
(985, 1, '5000.00', '0', '+', 'Interest Return 5000.00 USD Added on Your interest wallet Balance', 'interest', '14Q4NMX3T74E', '1070752.50000000', '2022-10-12 09:00:01', '2022-10-12 09:00:01'),
(986, 1, '20.00', '0', '+', 'Interest Return 20.00 USD Added on Your interest wallet Balance', 'interest', 'R7ZKRKXFP3U2', '1070772.50000000', '2022-10-12 10:00:02', '2022-10-12 10:00:02'),
(987, 1, '5000.00', '0', '+', 'Interest Return 5000.00 USD Added on Your interest wallet Balance', 'interest', 'XMNFP8Q715RX', '1075772.50000000', '2022-10-12 10:00:02', '2022-10-12 10:00:02'),
(988, 1, '121', '0', '-', 'Invested On Neha Fund', 'invest', 'MMAHK6CYVDSB', '9808379.00000000', '2022-10-12 11:03:05', '2022-10-12 11:03:05'),
(989, 1, '20.00', '0', '+', 'Interest Return 20.00 USD Added on Your interest wallet Balance', 'interest', 'WGF8T8FCJ9X4', '1075792.50000000', '2022-10-12 11:30:01', '2022-10-12 11:30:01'),
(990, 1, '5000.00', '0', '+', 'Interest Return 5000.00 USD Added on Your interest wallet Balance', 'interest', '345OX81BP7VW', '1080792.50000000', '2022-10-12 11:30:01', '2022-10-12 11:30:01'),
(991, 1, '20.00', '0', '+', 'Interest Return 20.00 USD Added on Your interest wallet Balance', 'interest', '23K1VHRKSDXO', '1080812.50000000', '2022-10-12 12:30:01', '2022-10-12 12:30:01'),
(992, 1, '5000.00', '0', '+', 'Interest Return 5000.00 USD Added on Your interest wallet Balance', 'interest', '3H9MHXRXTEHD', '1085812.50000000', '2022-10-12 12:30:01', '2022-10-12 12:30:01'),
(993, 1, '2.50', '0', '+', 'Interest Return 2.50 USD Added on Your interest wallet Wallet', 'interest', 'O8RR5HGUAVJS', '1085815.00000000', '2022-10-12 13:30:02', '2022-10-12 13:30:02'),
(994, 1, '20.00', '0', '+', 'Interest Return 20.00 USD Added on Your interest wallet Balance', 'interest', '88FBPYYA4DGW', '1085835.00000000', '2022-10-12 13:30:02', '2022-10-12 13:30:02'),
(995, 1, '5000.00', '0', '+', 'Interest Return 5000.00 USD Added on Your interest wallet Balance', 'interest', 'EVJCEXG5G2Q2', '1090835.00000000', '2022-10-12 13:30:02', '2022-10-12 13:30:02'),
(996, 4, '50.00', '0', '+', 'Interest Return 50.00 USD Added on Your interest wallet Wallet', 'interest', 'X2MAAV4UZAC8', '300.00000000', '2022-10-12 14:30:01', '2022-10-12 14:30:01'),
(997, 1, '20.00', '0', '+', 'Interest Return 20.00 USD Added on Your interest wallet Balance', 'interest', 'S6U5FKWFYPS8', '1090855.00000000', '2022-10-12 15:00:01', '2022-10-12 15:00:01'),
(998, 1, '5000.00', '0', '+', 'Interest Return 5000.00 USD Added on Your interest wallet Balance', 'interest', 'JR6KQZQ4QZWT', '1095855.00000000', '2022-10-12 15:00:01', '2022-10-12 15:00:01'),
(999, 1, '20.00', '0', '+', 'Interest Return 20.00 USD Added on Your interest wallet Balance', 'interest', 'OTDBQN6WNNJ7', '1095875.00000000', '2022-10-12 16:00:01', '2022-10-12 16:00:01'),
(1000, 1, '5000.00', '0', '+', 'Interest Return 5000.00 USD Added on Your interest wallet Balance', 'interest', 'EYOOHCTPPJUG', '1100875.00000000', '2022-10-12 16:00:01', '2022-10-12 16:00:01'),
(1001, 1, '20.00', '0', '+', 'Interest Return 20.00 USD Added on Your interest wallet Balance', 'interest', 'EWBENM5GOMG4', '1100895.00000000', '2022-10-12 17:00:02', '2022-10-12 17:00:02'),
(1002, 1, '5000.00', '0', '+', 'Interest Return 5000.00 USD Added on Your interest wallet Balance', 'interest', 'ZNMA9ES4TROT', '1105895.00000000', '2022-10-12 17:00:02', '2022-10-12 17:00:02'),
(1003, 1, '20.00', '0', '+', 'Interest Return 20.00 USD Added on Your interest wallet Balance', 'interest', '6ZM6KH6UEM4W', '1105915.00000000', '2022-10-12 18:30:02', '2022-10-12 18:30:02'),
(1004, 1, '5000.00', '0', '+', 'Interest Return 5000.00 USD Added on Your interest wallet Balance', 'interest', '8BTNUMXWO3H6', '1110915.00000000', '2022-10-12 18:30:02', '2022-10-12 18:30:02'),
(1005, 1, '50.00', '0', '+', 'Interest Return 50.00 USD Added on Your interest wallet Wallet', 'interest', 'TCNK4QQ6SYA9', '1110965.00000000', '2022-10-12 19:30:01', '2022-10-12 19:30:01'),
(1006, 1, '20.00', '0', '+', 'Interest Return 20.00 USD Added on Your interest wallet Balance', 'interest', 'R596713XCD2W', '1110985.00000000', '2022-10-12 20:00:02', '2022-10-12 20:00:02'),
(1007, 1, '5000.00', '0', '+', 'Interest Return 5000.00 USD Added on Your interest wallet Balance', 'interest', 'N7655XV2572P', '1115985.00000000', '2022-10-12 20:00:02', '2022-10-12 20:00:02'),
(1008, 1, '20.00', '0', '+', 'Interest Return 20.00 USD Added on Your interest wallet Balance', 'interest', '6WYUJ5WDWY7Y', '1116005.00000000', '2022-10-12 21:30:02', '2022-10-12 21:30:02'),
(1009, 1, '5000.00', '0', '+', 'Interest Return 5000.00 USD Added on Your interest wallet Balance', 'interest', 'V9G7DKM8P8T8', '1121005.00000000', '2022-10-12 21:30:02', '2022-10-12 21:30:02'),
(1010, 1, '20.00', '0', '+', 'Interest Return 20.00 USD Added on Your interest wallet Balance', 'interest', '2GM11NSJHG9D', '1121025.00000000', '2022-10-12 23:00:01', '2022-10-12 23:00:01'),
(1011, 1, '5000.00', '0', '+', 'Interest Return 5000.00 USD Added on Your interest wallet Balance', 'interest', 'DQSY39JD55ZA', '1126025.00000000', '2022-10-12 23:00:01', '2022-10-12 23:00:01'),
(1012, 1, '20.00', '0', '+', 'Interest Return 20.00 USD Added on Your interest wallet Balance', 'interest', 'Z1YU2QBYSO63', '1126045.00000000', '2022-10-13 00:00:01', '2022-10-13 00:00:01'),
(1013, 1, '5000.00', '0', '+', 'Interest Return 5000.00 USD Added on Your interest wallet Balance', 'interest', 'TOR93M7M3YDO', '1131045.00000000', '2022-10-13 00:00:01', '2022-10-13 00:00:01'),
(1014, 1, '20.00', '0', '+', 'Interest Return 20.00 USD Added on Your interest wallet Balance', 'interest', 'T3BDPA8H45Q7', '1131065.00000000', '2022-10-13 01:00:01', '2022-10-13 01:00:01'),
(1015, 1, '5000.00', '0', '+', 'Interest Return 5000.00 USD Added on Your interest wallet Balance', 'interest', '9MB3A8CNNEU3', '1136065.00000000', '2022-10-13 01:00:01', '2022-10-13 01:00:01'),
(1016, 1, '20.00', '0', '+', 'Interest Return 20.00 USD Added on Your interest wallet Balance', 'interest', '2MDZSZMNADVG', '1136085.00000000', '2022-10-13 02:00:01', '2022-10-13 02:00:01'),
(1017, 1, '5000.00', '0', '+', 'Interest Return 5000.00 USD Added on Your interest wallet Balance', 'interest', '98ZVKCHODGY4', '1141085.00000000', '2022-10-13 02:00:01', '2022-10-13 02:00:01'),
(1018, 1, '20.00', '0', '+', 'Interest Return 20.00 USD Added on Your interest wallet Balance', 'interest', 'OH86ZH28QNNF', '1141105.00000000', '2022-10-13 03:00:01', '2022-10-13 03:00:01'),
(1019, 1, '5000.00', '0', '+', 'Interest Return 5000.00 USD Added on Your interest wallet Balance', 'interest', 'H9GU5JCW5W57', '1146105.00000000', '2022-10-13 03:00:01', '2022-10-13 03:00:01'),
(1020, 1, '20.00', '0', '+', 'Interest Return 20.00 USD Added on Your interest wallet Balance', 'interest', 'B2QPPOWCJN17', '1146125.00000000', '2022-10-13 04:00:01', '2022-10-13 04:00:01'),
(1021, 1, '5000.00', '0', '+', 'Interest Return 5000.00 USD Added on Your interest wallet Balance', 'interest', 'H8WX2B2WA8QJ', '1151125.00000000', '2022-10-13 04:00:01', '2022-10-13 04:00:01'),
(1022, 1, '20.00', '0', '+', 'Interest Return 20.00 USD Added on Your interest wallet Balance', 'interest', 'UT7Q2PN84GQN', '1151145.00000000', '2022-10-13 05:00:01', '2022-10-13 05:00:01'),
(1023, 1, '5000.00', '0', '+', 'Interest Return 5000.00 USD Added on Your interest wallet Balance', 'interest', 'ZP6768SUEF6Z', '1156145.00000000', '2022-10-13 05:00:01', '2022-10-13 05:00:01'),
(1024, 1, '20.00', '0', '+', 'Interest Return 20.00 USD Added on Your interest wallet Balance', 'interest', '5VYW4KRO2987', '1156165.00000000', '2022-10-13 06:00:02', '2022-10-13 06:00:02'),
(1025, 1, '5000.00', '0', '+', 'Interest Return 5000.00 USD Added on Your interest wallet Balance', 'interest', 'SE4YHNGYDZZT', '1161165.00000000', '2022-10-13 06:00:02', '2022-10-13 06:00:02'),
(1026, 1, '20.00', '0', '+', 'Interest Return 20.00 USD Added on Your interest wallet Balance', 'interest', 'PE9ZUZVBMXF4', '1161185.00000000', '2022-10-13 07:30:01', '2022-10-13 07:30:01'),
(1027, 1, '5000.00', '0', '+', 'Interest Return 5000.00 USD Added on Your interest wallet Balance', 'interest', 'QSQFSP9KEO1W', '1166185.00000000', '2022-10-13 07:30:01', '2022-10-13 07:30:01'),
(1028, 1, '20.00', '0', '+', 'Interest Return 20.00 USD Added on Your interest wallet Balance', 'interest', 'MD2Q1THQMC1U', '1166205.00000000', '2022-10-13 08:30:02', '2022-10-13 08:30:02'),
(1029, 1, '5000.00', '0', '+', 'Interest Return 5000.00 USD Added on Your interest wallet Balance', 'interest', '79YPA6S1WFO7', '1171205.00000000', '2022-10-13 08:30:02', '2022-10-13 08:30:02'),
(1030, 1, '20.00', '0', '+', 'Interest Return 20.00 USD Added on Your interest wallet Balance', 'interest', '876NYS4UWWN9', '1171225.00000000', '2022-10-13 10:00:02', '2022-10-13 10:00:02'),
(1031, 1, '5000.00', '0', '+', 'Interest Return 5000.00 USD Added on Your interest wallet Balance', 'interest', '3MH2RT6P31CA', '1176225.00000000', '2022-10-13 10:00:02', '2022-10-13 10:00:02'),
(1032, 1, '20.00', '0', '+', 'Interest Return 20.00 USD Added on Your interest wallet Balance', 'interest', 'KRMOZD94PFXC', '1176245.00000000', '2022-10-13 11:30:01', '2022-10-13 11:30:01'),
(1033, 1, '5000.00', '0', '+', 'Interest Return 5000.00 USD Added on Your interest wallet Balance', 'interest', 'X9B61XM4A4Q3', '1181245.00000000', '2022-10-13 11:30:01', '2022-10-13 11:30:01'),
(1034, 1, '0.61', '0', '+', 'Interest Return 0.61 USD Added on Your interest wallet Wallet', 'interest', '66PAN3GH3YJM', '1181245.61000000', '2022-10-13 11:30:01', '2022-10-13 11:30:01'),
(1035, 18, '100', '0', '+', 'Added Balance Via Admin', 'admin_added', '8ZGRNR3MSX4P', '101.00000000', '2022-11-28 07:55:59', '2022-11-28 07:55:59'),
(1036, 18, '1', '0', '+', 'Added Balance Via Admin', 'admin_added', 'E54ZEWMFCJR3', '102.00000000', '2022-11-28 07:58:11', '2022-11-28 07:58:11'),
(1037, 18, '10', '0', '+', 'Added Balance Via Admin', 'admin_added', 'NDK196OH1BN4', '112.00000000', '2022-11-28 08:01:20', '2022-11-28 08:01:20'),
(1038, 18, '10', '0', '+', 'Added Balance Via Admin', 'admin_added', 'YRJ5YGQOWMAT', '122.00000000', '2022-11-28 08:02:08', '2022-11-28 08:02:08'),
(1039, 2, '239', NULL, '+', 'Deposit Via Bank Wire', 'manual_deposit', 'GS3GO1V8FKWO', '239.00000000', '2022-12-01 05:38:56', '2022-12-01 05:38:56'),
(1040, 18, '12', '0', '+', 'Added Balance Via Admin', 'admin_added', 'XHJWY9K9XOXV', '35.00000000', '2022-12-01 05:56:07', '2022-12-01 05:56:07'),
(1041, 18, '1', '0', '+', 'Added Balance Via Admin', 'admin_added', 'TM5P37YCW1TS', '36.00000000', '2022-12-01 05:57:31', '2022-12-01 05:57:31'),
(1042, 18, '12', '0', '-', 'Added Balance Via Admin', 'admin_subtract', 'BMUW6WM6EKEV', '24.00000000', '2022-12-01 05:57:42', '2022-12-01 05:57:42'),
(1043, 21, '100', '0', '+', 'Added Balance Via Admin', 'admin_added', 'WNTO1NS385V5', '100.00000000', '2023-01-12 06:27:07', '2023-01-12 06:27:07'),
(1044, 22, '40', '0', '+', 'Added Balance Via Admin', 'admin_added', 'G7RB6K9ZJYX4', '40.00000000', '2023-01-12 06:42:53', '2023-01-12 06:42:53'),
(1045, 23, '30', '0', '+', 'Added Balance Via Admin', 'admin_added', '1CR2YO6WEJAM', '30.00000000', '2023-01-12 06:50:40', '2023-01-12 06:50:40');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int UNSIGNED NOT NULL,
  `firstname` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `lastname` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `username` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email` varchar(90) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `mobile` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `age` int NOT NULL,
  `refer` int DEFAULT NULL,
  `password` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `image` varchar(91) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `address` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci COMMENT 'contains full address',
  `status` tinyint NOT NULL DEFAULT '1' COMMENT '0: banned, 1: active',
  `ev` tinyint NOT NULL DEFAULT '0' COMMENT '0: email unverified, 1: email verified',
  `sv` tinyint NOT NULL DEFAULT '0' COMMENT '0: sms unverified, 1: sms verified',
  `ver_code` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL COMMENT 'stores verification code',
  `ver_code_send_at` datetime DEFAULT NULL COMMENT 'verification send time',
  `ts` tinyint NOT NULL DEFAULT '0' COMMENT '0: 2fa off, 1: 2fa on',
  `tv` tinyint NOT NULL DEFAULT '1' COMMENT '0: 2fa unverified, 1: 2fa verified',
  `tsc` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `investment_experience` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `wisdom_source` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `investment_duration` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `investment_planning` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `provider` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `provider_id` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `bodyclass` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `remember_token` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `firstname`, `lastname`, `username`, `email`, `mobile`, `age`, `refer`, `password`, `image`, `address`, `status`, `ev`, `sv`, `ver_code`, `ver_code_send_at`, `ts`, `tv`, `tsc`, `investment_experience`, `wisdom_source`, `investment_duration`, `investment_planning`, `provider`, `provider_id`, `bodyclass`, `remember_token`, `created_at`, `updated_at`) VALUES
(21, 'ale', 'z', 'alez', NULL, NULL, 0, NULL, '$2y$10$gKN//wQgD6NmfCp5ih7osOK1xZJcHBSL3p58CdWftIcD87ZlCsZJC', NULL, NULL, 1, 0, 0, NULL, NULL, 0, 1, NULL, '', '', '', '', NULL, NULL, NULL, NULL, '2023-01-12 05:35:59', '2023-01-12 05:35:59'),
(22, 'asd', 'asd', 'asd', NULL, NULL, 0, NULL, '$2y$10$Uy5V/TFH5eUT9KrZETYtZOgSGtiP29a5z14BXuNmE.nfoea6ZORyS', NULL, NULL, 1, 0, 0, NULL, NULL, 0, 1, NULL, '', '', '', '', NULL, NULL, NULL, NULL, '2023-01-12 06:23:13', '2023-01-12 06:23:13'),
(23, 'qwerty', 'qwerty', 'qwerty', 'sad@asf.com', NULL, 0, NULL, '$2y$10$k/0TRbRK.qyOexMxz/MuSucDf1qSLlyiZHTm60SBuxbCKMfOlOb7G', NULL, '{\"address\":null,\"city\":null,\"state\":null,\"zip\":null,\"country\":null}', 1, 0, 0, NULL, NULL, 0, 0, NULL, '', '', '', '', NULL, NULL, NULL, NULL, '2023-01-12 06:24:31', '2023-01-12 07:33:01');

-- --------------------------------------------------------

--
-- Table structure for table `user_logins`
--

CREATE TABLE `user_logins` (
  `id` int UNSIGNED NOT NULL,
  `user_id` int UNSIGNED NOT NULL,
  `user_ip` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `location` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `browser` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `os` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `longitude` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `latitude` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `country` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `country_code` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `user_logins`
--

INSERT INTO `user_logins` (`id`, `user_id`, `user_ip`, `location`, `browser`, `os`, `longitude`, `latitude`, `country`, `country_code`, `created_at`, `updated_at`) VALUES
(1, 1, '39.36.51.212', 'Lahore - - Pakistan - PK ', 'Chrome', 'Windows 10', '74.3686', '31.4888', 'Pakistan', 'PK', '2022-09-07 23:00:21', '2022-09-07 23:00:21'),
(2, 1, '39.37.227.135', 'Faisalabad - - Pakistan - PK ', 'Chrome', 'Windows 10', '73.0805', '31.4137', 'Pakistan', 'PK', '2022-09-08 01:48:51', '2022-09-08 01:48:51'),
(3, 2, '68.1.98.20', 'Pensacola - - United States - US ', 'Chrome', 'Windows 10', '-87.2075', '30.4594', 'United States', 'US', '2022-09-08 07:10:55', '2022-09-08 07:10:55'),
(4, 1, '39.37.224.135', 'Faisalabad - - Pakistan - PK ', 'Chrome', 'Windows 10', '73.0805', '31.4137', 'Pakistan', 'PK', '2022-09-08 20:49:03', '2022-09-08 20:49:03'),
(5, 2, '68.1.98.20', 'Pensacola - - United States - US ', 'Chrome', 'Windows 10', '-87.2075', '30.4594', 'United States', 'US', '2022-09-09 01:35:26', '2022-09-09 01:35:26'),
(6, 1, '103.255.7.34', ' - - Pakistan - PK ', 'Handheld Browser', 'iPhone', '70', '30', 'Pakistan', 'PK', '2022-09-09 02:08:15', '2022-09-09 02:08:15'),
(7, 2, '68.1.98.20', 'Pensacola - - United States - US ', 'Chrome', 'Windows 10', '-87.2075', '30.4594', 'United States', 'US', '2022-09-09 09:26:40', '2022-09-09 09:26:40'),
(8, 1, '39.36.76.225', 'Faisalabad - - Pakistan - PK ', 'Chrome', 'Windows 10', '73.0805', '31.4137', 'Pakistan', 'PK', '2022-09-09 20:13:12', '2022-09-09 20:13:12'),
(9, 2, '68.1.98.20', 'Pensacola - - United States - US ', 'Chrome', 'Windows 10', '-87.2075', '30.4594', 'United States', 'US', '2022-09-09 21:09:19', '2022-09-09 21:09:19'),
(10, 1, '68.1.98.20', 'Pensacola - - United States - US ', 'Chrome', 'Windows 10', '-87.2075', '30.4594', 'United States', 'US', '2022-09-09 22:09:00', '2022-09-09 22:09:00'),
(11, 1, '39.36.76.225', 'Faisalabad - - Pakistan - PK ', 'Chrome', 'Windows 10', '73.0805', '31.4137', 'Pakistan', 'PK', '2022-09-09 22:17:18', '2022-09-09 22:17:18'),
(12, 1, '68.1.98.20', 'Pensacola - - United States - US ', 'Chrome', 'Windows 10', '-87.2075', '30.4594', 'United States', 'US', '2022-09-10 00:33:13', '2022-09-10 00:33:13'),
(13, 1, '39.36.76.225', 'Faisalabad - - Pakistan - PK ', 'Chrome', 'Windows 10', '73.0805', '31.4137', 'Pakistan', 'PK', '2022-09-10 01:38:44', '2022-09-10 01:38:44'),
(14, 1, '68.1.98.20', 'Pensacola - - United States - US ', 'Chrome', 'Windows 10', '-87.2075', '30.4594', 'United States', 'US', '2022-09-10 10:46:20', '2022-09-10 10:46:20'),
(15, 1, '68.1.98.20', 'Pensacola - - United States - US ', 'Chrome', 'Windows 10', '-87.2075', '30.4594', 'United States', 'US', '2022-09-11 03:12:21', '2022-09-11 03:12:21'),
(16, 1, '68.1.98.20', 'Pensacola - - United States - US ', 'Chrome', 'Windows 10', '-87.2075', '30.4594', 'United States', 'US', '2022-09-11 08:35:35', '2022-09-11 08:35:35'),
(17, 1, '68.1.98.20', 'Pensacola - - United States - US ', 'Chrome', 'Windows 10', '-87.2075', '30.4594', 'United States', 'US', '2022-09-11 11:05:00', '2022-09-11 11:05:00'),
(18, 1, '68.1.98.20', 'Pensacola - - United States - US ', 'Chrome', 'Windows 10', '-87.2075', '30.4594', 'United States', 'US', '2022-09-11 21:15:40', '2022-09-11 21:15:40'),
(19, 1, '68.1.98.20', 'Pensacola - - United States - US ', 'Chrome', 'Windows 10', '-87.2075', '30.4594', 'United States', 'US', '2022-09-12 00:39:30', '2022-09-12 00:39:30'),
(20, 1, '68.1.98.20', 'Pensacola - - United States - US ', 'Chrome', 'Windows 10', '-87.2075', '30.4594', 'United States', 'US', '2022-09-12 06:00:10', '2022-09-12 06:00:10'),
(21, 1, '68.1.98.20', 'Pensacola - - United States - US ', 'Chrome', 'Windows 10', '-87.2075', '30.4594', 'United States', 'US', '2022-09-12 17:58:43', '2022-09-12 17:58:43'),
(22, 1, '68.1.98.20', 'Pensacola - - United States - US ', 'Chrome', 'Windows 10', '-87.2075', '30.4594', 'United States', 'US', '2022-09-12 23:09:11', '2022-09-12 23:09:11'),
(23, 1, '68.1.98.20', 'Pensacola - - United States - US ', 'Chrome', 'Windows 10', '-87.2075', '30.4594', 'United States', 'US', '2022-09-13 01:18:40', '2022-09-13 01:18:40'),
(24, 1, '39.36.143.232', 'Toba Tek Singh - - Pakistan - PK ', 'Chrome', 'Windows 10', '72.5524', '30.9166', 'Pakistan', 'PK', '2022-09-14 01:35:50', '2022-09-14 01:35:50'),
(25, 1, '39.36.210.155', 'Faisalabad - - Pakistan - PK ', 'Chrome', 'Windows 10', '73.0805', '31.4137', 'Pakistan', 'PK', '2022-09-18 12:30:24', '2022-09-18 12:30:24'),
(26, 1, '39.36.210.155', 'Faisalabad - - Pakistan - PK ', 'Chrome', 'Windows 10', '73.0805', '31.4137', 'Pakistan', 'PK', '2022-09-18 14:55:31', '2022-09-18 14:55:31'),
(27, 1, '39.36.148.71', 'Abbottabad - - Pakistan - PK ', 'Chrome', 'Windows 10', '73.2145', '34.1469', 'Pakistan', 'PK', '2022-09-18 19:47:42', '2022-09-18 19:47:42'),
(28, 1, '68.1.98.20', 'Pensacola - - United States - US ', 'Chrome', 'Windows 10', '-87.2075', '30.4594', 'United States', 'US', '2022-09-18 21:42:59', '2022-09-18 21:42:59'),
(29, 1, '39.36.148.71', 'Abbottabad - - Pakistan - PK ', 'Chrome', 'Windows 10', '73.2145', '34.1469', 'Pakistan', 'PK', '2022-09-18 21:43:57', '2022-09-18 21:43:57'),
(30, 1, '185.134.22.81', 'London - - United Kingdom - GB ', 'Firefox', 'Windows 10', '-0.02', '51.5064', 'United Kingdom', 'GB', '2022-09-19 00:38:48', '2022-09-19 00:38:48'),
(31, 1, '68.1.98.20', 'Pensacola - - United States - US ', 'Chrome', 'Windows 10', '-87.2075', '30.4594', 'United States', 'US', '2022-09-19 10:52:04', '2022-09-19 10:52:04'),
(32, 1, '68.1.98.20', 'Pensacola - - United States - US ', 'Chrome', 'Windows 10', '-87.2075', '30.4594', 'United States', 'US', '2022-09-20 02:33:48', '2022-09-20 02:33:48'),
(33, 1, '39.36.143.190', 'Toba Tek Singh - - Pakistan - PK ', 'Chrome', 'Windows 10', '72.5524', '30.9166', 'Pakistan', 'PK', '2022-09-21 13:17:54', '2022-09-21 13:17:54'),
(34, 3, '193.218.190.109', 'The Hague - - Netherlands - NL ', 'Chrome', 'Windows 8.1', '4.2925', '52.0758', 'Netherlands', 'NL', '2022-09-23 15:25:00', '2022-09-23 15:25:00'),
(35, 3, '193.218.190.109', 'The Hague - - Netherlands - NL ', 'Chrome', 'Windows 8.1', '4.2925', '52.0758', 'Netherlands', 'NL', '2022-09-23 15:26:57', '2022-09-23 15:26:57'),
(36, 1, '68.1.98.20', 'Pensacola - - United States - US ', 'Chrome', 'Windows 10', '-87.2075', '30.4594', 'United States', 'US', '2022-09-27 00:45:26', '2022-09-27 00:45:26'),
(37, 1, '39.37.226.177', 'Sargodha - - Pakistan - PK ', 'Chrome', 'Windows 10', '72.6814', '32.1687', 'Pakistan', 'PK', '2022-09-27 20:53:12', '2022-09-27 20:53:12'),
(38, 1, '68.1.98.20', 'Pensacola - - United States - US ', 'Chrome', 'Windows 10', '-87.2075', '30.4594', 'United States', 'US', '2022-09-27 20:56:04', '2022-09-27 20:56:04'),
(39, 1, '39.36.181.68', 'Faisalabad - - Pakistan - PK ', 'Chrome', 'Windows 10', '73.0805', '31.4137', 'Pakistan', 'PK', '2022-09-30 21:19:44', '2022-09-30 21:19:44'),
(40, 1, '39.36.181.68', 'Faisalabad - - Pakistan - PK ', 'Chrome', 'Windows 10', '73.0805', '31.4137', 'Pakistan', 'PK', '2022-10-02 17:43:17', '2022-10-02 17:43:17'),
(41, 4, '106.215.33.30', 'Noida - - India - IN ', 'Chrome', 'Windows 10', '77.3063', '28.6145', 'India', 'IN', '2022-10-03 10:37:57', '2022-10-03 10:37:57'),
(42, 4, '39.36.181.68', 'Faisalabad - - Pakistan - PK ', 'Chrome', 'Windows 10', '73.0805', '31.4137', 'Pakistan', 'PK', '2022-10-03 12:00:30', '2022-10-03 12:00:30'),
(43, 1, '119.73.115.88', ' - - Pakistan - PK ', 'Chrome', 'Windows 10', '70', '30', 'Pakistan', 'PK', '2022-10-04 16:56:15', '2022-10-04 16:56:15'),
(44, 1, '119.73.115.99', ' - - Pakistan - PK ', 'Chrome', 'Windows 10', '70', '30', 'Pakistan', 'PK', '2022-10-05 11:31:40', '2022-10-05 11:31:40'),
(45, 4, '119.73.115.90', ' - - Pakistan - PK ', 'Chrome', 'Windows 10', '70', '30', 'Pakistan', 'PK', '2022-10-06 13:31:02', '2022-10-06 13:31:02'),
(46, 4, '110.226.31.35', ' - - India - IN ', 'Chrome', 'Windows 10', '77.006', '20.0063', 'India', 'IN', '2022-10-06 13:35:19', '2022-10-06 13:35:19'),
(47, 1, '119.73.115.90', ' - - Pakistan - PK ', 'Chrome', 'Windows 10', '70', '30', 'Pakistan', 'PK', '2022-10-08 12:32:17', '2022-10-08 12:32:17'),
(48, 1, '119.73.115.90', ' - - Pakistan - PK ', 'Chrome', 'Windows 10', '70', '30', 'Pakistan', 'PK', '2022-10-08 13:39:01', '2022-10-08 13:39:01'),
(49, 1, '103.255.5.109', 'Lahore - - Pakistan - PK ', 'Handheld Browser', 'Android', '74.3686', '31.4888', 'Pakistan', 'PK', '2022-10-08 19:49:01', '2022-10-08 19:49:01'),
(50, 1, '39.36.230.64', 'Faisalabad - - Pakistan - PK ', 'Chrome', 'Windows 10', '73.0805', '31.4137', 'Pakistan', 'PK', '2022-10-08 23:50:49', '2022-10-08 23:50:49'),
(51, 1, '101.50.69.69', 'Faisalabad - - Pakistan - PK ', 'Chrome', 'Windows 10', '73.0805', '31.4137', 'Pakistan', 'PK', '2022-10-10 12:28:08', '2022-10-10 12:28:08'),
(52, 1, '119.73.115.243', ' - - Pakistan - PK ', 'Chrome', 'Windows 10', '70', '30', 'Pakistan', 'PK', '2022-10-10 13:16:06', '2022-10-10 13:16:06'),
(53, 1, '103.166.150.66', ' - -  -  ', 'Handheld Browser', 'Android', '', '', '', '', '2022-10-10 15:32:04', '2022-10-10 15:32:04'),
(54, 1, '119.73.115.106', ' - - Pakistan - PK ', 'Chrome', 'Windows 10', '70', '30', 'Pakistan', 'PK', '2022-10-10 16:28:29', '2022-10-10 16:28:29'),
(55, 1, '39.36.255.221', 'Faisalabad - - Pakistan - PK ', 'Chrome', 'Windows 10', '73.0805', '31.4137', 'Pakistan', 'PK', '2022-10-11 00:15:55', '2022-10-11 00:15:55'),
(56, 1, '119.73.115.146', ' - - Pakistan - PK ', 'Chrome', 'Windows 10', '70', '30', 'Pakistan', 'PK', '2022-10-11 11:50:32', '2022-10-11 11:50:32'),
(57, 1, '119.73.115.146', ' - - Pakistan - PK ', 'Chrome', 'Windows 10', '70', '30', 'Pakistan', 'PK', '2022-10-11 12:31:15', '2022-10-11 12:31:15'),
(58, 1, '119.73.115.146', ' - - Pakistan - PK ', 'Chrome', 'Windows 10', '70', '30', 'Pakistan', 'PK', '2022-10-11 16:29:00', '2022-10-11 16:29:00'),
(59, 1, '202.165.231.169', ' - - Pakistan - PK ', 'Chrome', 'Windows 10', '70', '30', 'Pakistan', 'PK', '2022-10-12 10:46:17', '2022-10-12 10:46:17'),
(60, 1, '119.73.115.146', ' - - Pakistan - PK ', 'Chrome', 'Windows 10', '70', '30', 'Pakistan', 'PK', '2022-10-12 12:18:04', '2022-10-12 12:18:04'),
(61, 1, '101.50.78.113', 'Faisalabad - - Pakistan - PK ', 'Chrome', 'Windows 10', '73.0805', '31.4137', 'Pakistan', 'PK', '2022-10-12 15:37:15', '2022-10-12 15:37:15'),
(62, 1, '119.73.115.52', ' - - Pakistan - PK ', 'Chrome', 'Windows 10', '70', '30', 'Pakistan', 'PK', '2022-10-12 16:23:53', '2022-10-12 16:23:53'),
(63, 1, '::1', ' - -  -  ', 'Chrome', 'Windows 10', '', '', '', '', '2022-11-21 02:04:37', '2022-11-21 02:04:37'),
(64, 1, '::1', ' - -  -  ', 'Chrome', 'Windows 10', '', '', '', '', '2022-11-21 02:50:59', '2022-11-21 02:50:59'),
(65, 1, '::1', ' - -  -  ', 'Chrome', 'Windows 10', NULL, NULL, NULL, NULL, '2022-11-22 03:07:11', '2022-11-22 03:07:11'),
(66, 1, '::1', ' - -  -  ', 'Chrome', 'Windows 10', '', '', '', '', '2022-11-23 00:44:48', '2022-11-23 00:44:48'),
(67, 1, '::1', ' - -  -  ', 'Chrome', 'Windows 10', '', '', '', '', '2022-11-23 05:01:33', '2022-11-23 05:01:33'),
(68, 1, '::1', ' - -  -  ', 'Chrome', 'Windows 10', '', '', '', '', '2022-11-23 05:06:57', '2022-11-23 05:06:57'),
(69, 1, '::1', ' - -  -  ', 'Chrome', 'Windows 10', '', '', '', '', '2022-11-23 05:12:08', '2022-11-23 05:12:08'),
(70, 1, '::1', ' - -  -  ', 'Chrome', 'Windows 10', '', '', '', '', '2022-11-23 05:12:53', '2022-11-23 05:12:53'),
(71, 1, '::1', ' - -  -  ', 'Chrome', 'Windows 10', '', '', '', '', '2022-11-23 07:14:03', '2022-11-23 07:14:03'),
(72, 1, '::1', ' - -  -  ', 'Chrome', 'Windows 10', '', '', '', '', '2022-11-28 01:26:50', '2022-11-28 01:26:50'),
(73, 18, '::1', ' - -  -  ', 'Chrome', 'Windows 10', '', '', '', '', '2022-11-28 06:33:27', '2022-11-28 06:33:27'),
(74, 1, '::1', ' - -  -  ', 'Chrome', 'Windows 10', '', '', '', '', '2022-11-28 06:36:36', '2022-11-28 06:36:36'),
(75, 18, '::1', ' - -  -  ', 'Chrome', 'Windows 10', '', '', '', '', '2022-11-28 06:42:31', '2022-11-28 06:42:31'),
(76, 18, '::1', ' - -  -  ', 'Chrome', 'Windows 10', '', '', '', '', '2022-11-28 07:17:50', '2022-11-28 07:17:50'),
(77, 1, '::1', ' - -  -  ', 'Chrome', 'Windows 10', '', '', '', '', '2022-11-28 07:24:08', '2022-11-28 07:24:08'),
(78, 2, '::1', ' - -  -  ', 'Chrome', 'Windows 10', '', '', '', '', '2022-11-28 07:25:39', '2022-11-28 07:25:39'),
(79, 2, '::1', ' - -  -  ', 'Chrome', 'Windows 10', '', '', '', '', '2022-11-28 07:27:20', '2022-11-28 07:27:20'),
(80, 2, '::1', ' - -  -  ', 'Chrome', 'Windows 10', '', '', '', '', '2022-11-28 07:29:03', '2022-11-28 07:29:03'),
(81, 1, '::1', ' - -  -  ', 'Chrome', 'Windows 10', '', '', '', '', '2022-11-28 07:29:27', '2022-11-28 07:29:27'),
(82, 2, '::1', ' - -  -  ', 'Chrome', 'Windows 10', '', '', '', '', '2022-11-28 07:36:18', '2022-11-28 07:36:18'),
(83, 2, '::1', ' - -  -  ', 'Chrome', 'Windows 10', '', '', '', '', '2022-11-30 05:06:50', '2022-11-30 05:06:50'),
(84, 2, '::1', ' - -  -  ', 'Chrome', 'Windows 10', '', '', '', '', '2022-11-30 05:16:25', '2022-11-30 05:16:25'),
(85, 2, '::1', ' - -  -  ', 'Chrome', 'Windows 10', '', '', '', '', '2022-11-30 05:17:25', '2022-11-30 05:17:25'),
(86, 2, '::1', ' - -  -  ', 'Chrome', 'Windows 10', '', '', '', '', '2022-11-30 06:23:31', '2022-11-30 06:23:31'),
(87, 2, '::1', ' - -  -  ', 'Chrome', 'Windows 10', '', '', '', '', '2022-11-30 06:48:31', '2022-11-30 06:48:31'),
(88, 2, '::1', ' - -  -  ', 'Chrome', 'Windows 10', '', '', '', '', '2022-11-30 06:49:21', '2022-11-30 06:49:21'),
(89, 2, '::1', ' - -  -  ', 'Chrome', 'Windows 10', '', '', '', '', '2022-11-30 06:49:54', '2022-11-30 06:49:54'),
(90, 2, '::1', ' - -  -  ', 'Chrome', 'Windows 10', '', '', '', '', '2022-12-01 01:02:20', '2022-12-01 01:02:20'),
(91, 2, '::1', ' - -  -  ', 'Chrome', 'Windows 10', '', '', '', '', '2022-12-01 01:12:50', '2022-12-01 01:12:50'),
(92, 1, '::1', ' - -  -  ', 'Chrome', 'Windows 10', '', '', '', '', '2022-12-01 06:19:45', '2022-12-01 06:19:45'),
(93, 1, '::1', ' - -  -  ', 'Chrome', 'Windows 10', '', '', '', '', '2022-12-02 07:01:26', '2022-12-02 07:01:26'),
(94, 1, '::1', ' - -  -  ', 'Chrome', 'Windows 10', '', '', '', '', '2022-12-03 00:49:57', '2022-12-03 00:49:57');

-- --------------------------------------------------------

--
-- Table structure for table `user_wallets`
--

CREATE TABLE `user_wallets` (
  `id` bigint UNSIGNED NOT NULL,
  `user_id` int DEFAULT NULL,
  `balance` decimal(18,8) DEFAULT '0.00000000',
  `wallet_type` varchar(20) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` tinyint NOT NULL DEFAULT '1',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `user_wallets`
--

INSERT INTO `user_wallets` (`id`, `user_id`, `balance`, `wallet_type`, `status`, `created_at`, `updated_at`) VALUES
(13, 21, '76.00000000', 'deposit_wallet', 1, '2023-01-12 05:35:59', '2023-01-12 07:35:09'),
(14, 22, '29.50000000', 'deposit_wallet', 1, '2023-01-12 06:23:13', '2023-01-12 07:33:19'),
(15, 23, '18.00000000', 'deposit_wallet', 1, '2023-01-12 06:24:31', '2023-01-12 07:33:27');

-- --------------------------------------------------------

--
-- Table structure for table `withdrawals`
--

CREATE TABLE `withdrawals` (
  `id` int UNSIGNED NOT NULL,
  `method_id` int UNSIGNED NOT NULL,
  `user_id` int UNSIGNED NOT NULL,
  `wallet_id` int DEFAULT NULL,
  `amount` decimal(18,8) NOT NULL,
  `currency` varchar(40) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `rate` decimal(18,8) NOT NULL,
  `charge` decimal(18,8) NOT NULL,
  `trx` varchar(40) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `final_amount` decimal(18,8) NOT NULL DEFAULT '0.00000000',
  `after_charge` decimal(18,8) NOT NULL,
  `detail` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci,
  `status` tinyint NOT NULL DEFAULT '0' COMMENT '1=>success, 2=>pending, 3=>cancel,  ',
  `admin_feedback` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `withdrawals`
--

INSERT INTO `withdrawals` (`id`, `method_id`, `user_id`, `wallet_id`, `amount`, `currency`, `rate`, `charge`, `trx`, `final_amount`, `after_charge`, `detail`, `status`, `admin_feedback`, `created_at`, `updated_at`) VALUES
(1, 1, 1, 2, '1000.00000000', 'USD', '1.00000000', '20.00000000', 'U6EO6W6S5E1D', '980.00000000', '980.00000000', '[]', 1, 'Yes : Bank Wire To Abdul.', '2022-09-19 00:41:20', '2022-09-19 00:44:04'),
(2, 1, 1, 2, '121.00000000', 'USD', '1.00000000', '20.00000000', '67M11O69MKZX', '101.00000000', '101.00000000', '[]', 0, NULL, '2022-10-11 15:02:45', '2022-10-11 15:02:45');

-- --------------------------------------------------------

--
-- Table structure for table `withdraw_methods`
--

CREATE TABLE `withdraw_methods` (
  `id` int UNSIGNED NOT NULL,
  `name` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `image` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `min_limit` decimal(18,8) DEFAULT NULL,
  `max_limit` decimal(18,8) NOT NULL DEFAULT '0.00000000',
  `delay` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `fixed_charge` decimal(18,8) DEFAULT NULL,
  `rate` decimal(18,8) DEFAULT NULL,
  `percent_charge` decimal(5,2) DEFAULT NULL,
  `currency` varchar(20) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `user_data` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci,
  `description` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci,
  `status` tinyint(1) NOT NULL DEFAULT '1',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `withdraw_methods`
--

INSERT INTO `withdraw_methods` (`id`, `name`, `image`, `min_limit`, `max_limit`, `delay`, `fixed_charge`, `rate`, `percent_charge`, `currency`, `user_data`, `description`, `status`, `created_at`, `updated_at`) VALUES
(1, 'Withdraw Fund Request', '6318ae6b222661662561899.jpg', '100.00000000', '1000000.00000000', '5', '20.00000000', '1.00000000', '0.00', 'USD', '[]', 'Note Depending on Investment purchased there may be a Holding Time period before you can withdraw funds.', 1, '2022-08-19 02:12:05', '2022-09-07 19:44:59');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admins`
--
ALTER TABLE `admins`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `admins_email_unique` (`email`),
  ADD UNIQUE KEY `admins_username_unique` (`username`);

--
-- Indexes for table `admin_password_resets`
--
ALTER TABLE `admin_password_resets`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `commission_logs`
--
ALTER TABLE `commission_logs`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `country`
--
ALTER TABLE `country`
  ADD PRIMARY KEY (`cnt_id`),
  ADD KEY `cnt_code` (`country_code`);

--
-- Indexes for table `deposits`
--
ALTER TABLE `deposits`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `document`
--
ALTER TABLE `document`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `email_sms_templates`
--
ALTER TABLE `email_sms_templates`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `email_sms_templates_act_unique` (`act`);

--
-- Indexes for table `frontends`
--
ALTER TABLE `frontends`
  ADD PRIMARY KEY (`id`),
  ADD KEY `frontends_key_index` (`data_keys`);

--
-- Indexes for table `gateways`
--
ALTER TABLE `gateways`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `gateways_code_unique` (`code`);

--
-- Indexes for table `gateway_currencies`
--
ALTER TABLE `gateway_currencies`
  ADD PRIMARY KEY (`id`),
  ADD KEY `gateway_currencies_method_code_index` (`method_code`);

--
-- Indexes for table `general_settings`
--
ALTER TABLE `general_settings`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `invests`
--
ALTER TABLE `invests`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `languages`
--
ALTER TABLE `languages`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `pages`
--
ALTER TABLE `pages`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `password_resets`
--
ALTER TABLE `password_resets`
  ADD PRIMARY KEY (`id`),
  ADD KEY `password_resets_email_index` (`email`);

--
-- Indexes for table `plans`
--
ALTER TABLE `plans`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `plan_price_history`
--
ALTER TABLE `plan_price_history`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `plugins`
--
ALTER TABLE `plugins`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `plugins_act_unique` (`act`);

--
-- Indexes for table `purchases`
--
ALTER TABLE `purchases`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `referrals`
--
ALTER TABLE `referrals`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `subscribers`
--
ALTER TABLE `subscribers`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `support_attachments`
--
ALTER TABLE `support_attachments`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `support_messages`
--
ALTER TABLE `support_messages`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `support_tickets`
--
ALTER TABLE `support_tickets`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `test`
--
ALTER TABLE `test`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tiles`
--
ALTER TABLE `tiles`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `time_settings`
--
ALTER TABLE `time_settings`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `trxes`
--
ALTER TABLE `trxes`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`),
  ADD UNIQUE KEY `users_username_unique` (`username`);

--
-- Indexes for table `user_logins`
--
ALTER TABLE `user_logins`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user_wallets`
--
ALTER TABLE `user_wallets`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `withdrawals`
--
ALTER TABLE `withdrawals`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `withdrawals_trx_unique` (`trx`);

--
-- Indexes for table `withdraw_methods`
--
ALTER TABLE `withdraw_methods`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admins`
--
ALTER TABLE `admins`
  MODIFY `id` int UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `admin_password_resets`
--
ALTER TABLE `admin_password_resets`
  MODIFY `id` int UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `commission_logs`
--
ALTER TABLE `commission_logs`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `country`
--
ALTER TABLE `country`
  MODIFY `cnt_id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=248;

--
-- AUTO_INCREMENT for table `deposits`
--
ALTER TABLE `deposits`
  MODIFY `id` int UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=56;

--
-- AUTO_INCREMENT for table `document`
--
ALTER TABLE `document`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `email_sms_templates`
--
ALTER TABLE `email_sms_templates`
  MODIFY `id` int UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=203;

--
-- AUTO_INCREMENT for table `frontends`
--
ALTER TABLE `frontends`
  MODIFY `id` int UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=78;

--
-- AUTO_INCREMENT for table `gateways`
--
ALTER TABLE `gateways`
  MODIFY `id` int UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- AUTO_INCREMENT for table `gateway_currencies`
--
ALTER TABLE `gateway_currencies`
  MODIFY `id` int UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=30;

--
-- AUTO_INCREMENT for table `general_settings`
--
ALTER TABLE `general_settings`
  MODIFY `id` int UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `invests`
--
ALTER TABLE `invests`
  MODIFY `id` int UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=29;

--
-- AUTO_INCREMENT for table `languages`
--
ALTER TABLE `languages`
  MODIFY `id` int UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `pages`
--
ALTER TABLE `pages`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `password_resets`
--
ALTER TABLE `password_resets`
  MODIFY `id` int UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `plans`
--
ALTER TABLE `plans`
  MODIFY `id` int UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `plan_price_history`
--
ALTER TABLE `plan_price_history`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `plugins`
--
ALTER TABLE `plugins`
  MODIFY `id` int UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `purchases`
--
ALTER TABLE `purchases`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=43;

--
-- AUTO_INCREMENT for table `referrals`
--
ALTER TABLE `referrals`
  MODIFY `id` int UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `subscribers`
--
ALTER TABLE `subscribers`
  MODIFY `id` int UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `support_attachments`
--
ALTER TABLE `support_attachments`
  MODIFY `id` int UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `support_messages`
--
ALTER TABLE `support_messages`
  MODIFY `id` int UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `support_tickets`
--
ALTER TABLE `support_tickets`
  MODIFY `id` int UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `test`
--
ALTER TABLE `test`
  MODIFY `id` int NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tiles`
--
ALTER TABLE `tiles`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT for table `time_settings`
--
ALTER TABLE `time_settings`
  MODIFY `id` int UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `trxes`
--
ALTER TABLE `trxes`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=1046;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- AUTO_INCREMENT for table `user_logins`
--
ALTER TABLE `user_logins`
  MODIFY `id` int UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=95;

--
-- AUTO_INCREMENT for table `user_wallets`
--
ALTER TABLE `user_wallets`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `withdrawals`
--
ALTER TABLE `withdrawals`
  MODIFY `id` int UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `withdraw_methods`
--
ALTER TABLE `withdraw_methods`
  MODIFY `id` int UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

-- phpMyAdmin SQL Dump
-- version 4.2.7.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Feb 15, 2017 at 06:53 AM
-- Server version: 5.5.39
-- PHP Version: 5.4.31

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `eptnew`
--

-- --------------------------------------------------------

--
-- Table structure for table `contact_us`
--

CREATE TABLE IF NOT EXISTS `contact_us` (
`contact_id` int(11) NOT NULL,
  `first_name` varchar(255) DEFAULT NULL,
  `last_name` varchar(255) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `phone` varchar(255) DEFAULT NULL,
  `reason` varchar(255) DEFAULT NULL,
  `lab` varchar(255) DEFAULT NULL,
  `additional_info` text,
  `contacted_on` datetime DEFAULT NULL,
  `ip_address` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `countries`
--

CREATE TABLE IF NOT EXISTS `countries` (
`id` int(10) unsigned NOT NULL,
  `iso_name` varchar(255) COLLATE utf8_bin NOT NULL,
  `iso2` varchar(2) COLLATE utf8_bin NOT NULL,
  `iso3` varchar(3) COLLATE utf8_bin NOT NULL,
  `numeric_code` smallint(6) NOT NULL
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_bin AUTO_INCREMENT=250 ;

--
-- Dumping data for table `countries`
--

INSERT INTO `countries` (`id`, `iso_name`, `iso2`, `iso3`, `numeric_code`) VALUES
(1, 'Afghanistan', 'AF', 'AFG', 4),
(2, 'Aland Islands', 'AX', 'ALA', 248),
(3, 'Albania', 'AL', 'ALB', 8),
(4, 'Algeria', 'DZ', 'DZA', 12),
(5, 'American Samoa', 'AS', 'ASM', 16),
(6, 'Andorra', 'AD', 'AND', 20),
(7, 'Angola', 'AO', 'AGO', 24),
(8, 'Anguilla', 'AI', 'AIA', 660),
(9, 'Antarctica', 'AQ', 'ATA', 10),
(10, 'Antigua and Barbuda', 'AG', 'ATG', 28),
(11, 'Argentina', 'AR', 'ARG', 32),
(12, 'Armenia', 'AM', 'ARM', 51),
(13, 'Aruba', 'AW', 'ABW', 533),
(14, 'Australia', 'AU', 'AUS', 36),
(15, 'Austria', 'AT', 'AUT', 40),
(16, 'Azerbaijan', 'AZ', 'AZE', 31),
(17, 'Bahamas', 'BS', 'BHS', 44),
(18, 'Bahrain', 'BH', 'BHR', 48),
(19, 'Bangladesh', 'BD', 'BGD', 50),
(20, 'Barbados', 'BB', 'BRB', 52),
(21, 'Belarus', 'BY', 'BLR', 112),
(22, 'Belgium', 'BE', 'BEL', 56),
(23, 'Belize', 'BZ', 'BLZ', 84),
(24, 'Benin', 'BJ', 'BEN', 204),
(25, 'Bermuda', 'BM', 'BMU', 60),
(26, 'Bhutan', 'BT', 'BTN', 64),
(27, 'Bolivia, Plurinational State of', 'BO', 'BOL', 68),
(28, 'Bonaire, Sint Eustatius and Saba', 'BQ', 'BES', 535),
(29, 'Bosnia and Herzegovina', 'BA', 'BIH', 70),
(30, 'Botswana', 'BW', 'BWA', 72),
(31, 'Bouvet Island', 'BV', 'BVT', 74),
(32, 'Brazil', 'BR', 'BRA', 76),
(33, 'British Indian Ocean Territory', 'IO', 'IOT', 86),
(34, 'Brunei Darussalam', 'BN', 'BRN', 96),
(35, 'Bulgaria', 'BG', 'BGR', 100),
(36, 'Burkina Faso', 'BF', 'BFA', 854),
(37, 'Burundi', 'BI', 'BDI', 108),
(38, 'Cambodia', 'KH', 'KHM', 116),
(39, 'Cameroon', 'CM', 'CMR', 120),
(40, 'Canada', 'CA', 'CAN', 124),
(41, 'Cape Verde', 'CV', 'CPV', 132),
(42, 'Cayman Islands', 'KY', 'CYM', 136),
(43, 'Central African Republic', 'CF', 'CAF', 140),
(44, 'Chad', 'TD', 'TCD', 148),
(45, 'Chile', 'CL', 'CHL', 152),
(46, 'China', 'CN', 'CHN', 156),
(47, 'Christmas Island', 'CX', 'CXR', 162),
(48, 'Cocos (Keeling) Islands', 'CC', 'CCK', 166),
(49, 'Colombia', 'CO', 'COL', 170),
(50, 'Comoros', 'KM', 'COM', 174),
(51, 'Congo', 'CG', 'COG', 178),
(52, 'Congo, the Democratic Republic of the', 'CD', 'COD', 180),
(53, 'Cook Islands', 'CK', 'COK', 184),
(54, 'Costa Rica', 'CR', 'CRI', 188),
(55, 'Cote d''Ivoire', 'CI', 'CIV', 384),
(56, 'Croatia', 'HR', 'HRV', 191),
(57, 'Cuba', 'CU', 'CUB', 192),
(58, 'Cura', 'CW', 'CUW', 531),
(59, 'Cyprus', 'CY', 'CYP', 196),
(60, 'Czech Republic', 'CZ', 'CZE', 203),
(61, 'Denmark', 'DK', 'DNK', 208),
(62, 'Djibouti', 'DJ', 'DJI', 262),
(63, 'Dominica', 'DM', 'DMA', 212),
(64, 'Dominican Republic', 'DO', 'DOM', 214),
(65, 'Ecuador', 'EC', 'ECU', 218),
(66, 'Egypt', 'EG', 'EGY', 818),
(67, 'El Salvador', 'SV', 'SLV', 222),
(68, 'Equatorial Guinea', 'GQ', 'GNQ', 226),
(69, 'Eritrea', 'ER', 'ERI', 232),
(70, 'Estonia', 'EE', 'EST', 233),
(71, 'Ethiopia', 'ET', 'ETH', 231),
(72, 'Falkland Islands (Malvinas)', 'FK', 'FLK', 238),
(73, 'Faroe Islands', 'FO', 'FRO', 234),
(74, 'Fiji', 'FJ', 'FJI', 242),
(75, 'Finland', 'FI', 'FIN', 246),
(76, 'France', 'FR', 'FRA', 250),
(77, 'French Guiana', 'GF', 'GUF', 254),
(78, 'French Polynesia', 'PF', 'PYF', 258),
(79, 'French Southern Territories', 'TF', 'ATF', 260),
(80, 'Gabon', 'GA', 'GAB', 266),
(81, 'Gambia', 'GM', 'GMB', 270),
(82, 'Georgia', 'GE', 'GEO', 268),
(83, 'Germany', 'DE', 'DEU', 276),
(84, 'Ghana', 'GH', 'GHA', 288),
(85, 'Gibraltar', 'GI', 'GIB', 292),
(86, 'Greece', 'GR', 'GRC', 300),
(87, 'Greenland', 'GL', 'GRL', 304),
(88, 'Grenada', 'GD', 'GRD', 308),
(89, 'Guadeloupe', 'GP', 'GLP', 312),
(90, 'Guam', 'GU', 'GUM', 316),
(91, 'Guatemala', 'GT', 'GTM', 320),
(92, 'Guernsey', 'GG', 'GGY', 831),
(93, 'Guinea', 'GN', 'GIN', 324),
(94, 'Guinea-Bissau', 'GW', 'GNB', 624),
(95, 'Guyana', 'GY', 'GUY', 328),
(96, 'Haiti', 'HT', 'HTI', 332),
(97, 'Heard Island and McDonald Islands', 'HM', 'HMD', 334),
(98, 'Holy See (Vatican City State)', 'VA', 'VAT', 336),
(99, 'Honduras', 'HN', 'HND', 340),
(100, 'Hong Kong', 'HK', 'HKG', 344),
(101, 'Hungary', 'HU', 'HUN', 348),
(102, 'Iceland', 'IS', 'ISL', 352),
(103, 'India', 'IN', 'IND', 356),
(104, 'Indonesia', 'ID', 'IDN', 360),
(105, 'Iran, Islamic Republic of', 'IR', 'IRN', 364),
(106, 'Iraq', 'IQ', 'IRQ', 368),
(107, 'Ireland', 'IE', 'IRL', 372),
(108, 'Isle of Man', 'IM', 'IMN', 833),
(109, 'Israel', 'IL', 'ISR', 376),
(110, 'Italy', 'IT', 'ITA', 380),
(111, 'Jamaica', 'JM', 'JAM', 388),
(112, 'Japan', 'JP', 'JPN', 392),
(113, 'Jersey', 'JE', 'JEY', 832),
(114, 'Jordan', 'JO', 'JOR', 400),
(115, 'Kazakhstan', 'KZ', 'KAZ', 398),
(116, 'Kenya', 'KE', 'KEN', 404),
(117, 'Kiribati', 'KI', 'KIR', 296),
(118, 'Korea, Democratic People''s Republic of', 'KP', 'PRK', 408),
(119, 'Korea, Republic of', 'KR', 'KOR', 410),
(120, 'Kuwait', 'KW', 'KWT', 414),
(121, 'Kyrgyzstan', 'KG', 'KGZ', 417),
(122, 'Lao People''s Democratic Republic', 'LA', 'LAO', 418),
(123, 'Latvia', 'LV', 'LVA', 428),
(124, 'Lebanon', 'LB', 'LBN', 422),
(125, 'Lesotho', 'LS', 'LSO', 426),
(126, 'Liberia', 'LR', 'LBR', 430),
(127, 'Libya', 'LY', 'LBY', 434),
(128, 'Liechtenstein', 'LI', 'LIE', 438),
(129, 'Lithuania', 'LT', 'LTU', 440),
(130, 'Luxembourg', 'LU', 'LUX', 442),
(131, 'Macao', 'MO', 'MAC', 446),
(132, 'Macedonia, the former Yugoslav Republic of', 'MK', 'MKD', 807),
(133, 'Madagascar', 'MG', 'MDG', 450),
(134, 'Malawi', 'MW', 'MWI', 454),
(135, 'Malaysia', 'MY', 'MYS', 458),
(136, 'Maldives', 'MV', 'MDV', 462),
(137, 'Mali', 'ML', 'MLI', 466),
(138, 'Malta', 'MT', 'MLT', 470),
(139, 'Marshall Islands', 'MH', 'MHL', 584),
(140, 'Martinique', 'MQ', 'MTQ', 474),
(141, 'Mauritania', 'MR', 'MRT', 478),
(142, 'Mauritius', 'MU', 'MUS', 480),
(143, 'Mayotte', 'YT', 'MYT', 175),
(144, 'Mexico', 'MX', 'MEX', 484),
(145, 'Micronesia, Federated States of', 'FM', 'FSM', 583),
(146, 'Moldova, Republic of', 'MD', 'MDA', 498),
(147, 'Monaco', 'MC', 'MCO', 492),
(148, 'Mongolia', 'MN', 'MNG', 496),
(149, 'Montenegro', 'ME', 'MNE', 499),
(150, 'Montserrat', 'MS', 'MSR', 500),
(151, 'Morocco', 'MA', 'MAR', 504),
(152, 'Mozambique', 'MZ', 'MOZ', 508),
(153, 'Myanmar', 'MM', 'MMR', 104),
(154, 'Namibia', 'NA', 'NAM', 516),
(155, 'Nauru', 'NR', 'NRU', 520),
(156, 'Nepal', 'NP', 'NPL', 524),
(157, 'Netherlands', 'NL', 'NLD', 528),
(158, 'New Caledonia', 'NC', 'NCL', 540),
(159, 'New Zealand', 'NZ', 'NZL', 554),
(160, 'Nicaragua', 'NI', 'NIC', 558),
(161, 'Niger', 'NE', 'NER', 562),
(162, 'Nigeria', 'NG', 'NGA', 566),
(163, 'Niue', 'NU', 'NIU', 570),
(164, 'Norfolk Island', 'NF', 'NFK', 574),
(165, 'Northern Mariana Islands', 'MP', 'MNP', 580),
(166, 'Norway', 'NO', 'NOR', 578),
(167, 'Oman', 'OM', 'OMN', 512),
(168, 'Pakistan', 'PK', 'PAK', 586),
(169, 'Palau', 'PW', 'PLW', 585),
(170, 'Palestine, State of', 'PS', 'PSE', 275),
(171, 'Panama', 'PA', 'PAN', 591),
(172, 'Papua New Guinea', 'PG', 'PNG', 598),
(173, 'Paraguay', 'PY', 'PRY', 600),
(174, 'Peru', 'PE', 'PER', 604),
(175, 'Philippines', 'PH', 'PHL', 608),
(176, 'Pitcairn', 'PN', 'PCN', 612),
(177, 'Poland', 'PL', 'POL', 616),
(178, 'Portugal', 'PT', 'PRT', 620),
(179, 'Puerto Rico', 'PR', 'PRI', 630),
(180, 'Qatar', 'QA', 'QAT', 634),
(181, 'Reunion', 'RE', 'REU', 638),
(182, 'Romania', 'RO', 'ROU', 642),
(183, 'Russian Federation', 'RU', 'RUS', 643),
(184, 'Rwanda', 'RW', 'RWA', 646),
(185, 'Saint Barthelemy', 'BL', 'BLM', 652),
(186, 'Saint Helena, Ascension and Tristan da Cunha', 'SH', 'SHN', 654),
(187, 'Saint Kitts and Nevis', 'KN', 'KNA', 659),
(188, 'Saint Lucia', 'LC', 'LCA', 662),
(189, 'Saint Martin (French part)', 'MF', 'MAF', 663),
(190, 'Saint Pierre and Miquelon', 'PM', 'SPM', 666),
(191, 'Saint Vincent and the Grenadines', 'VC', 'VCT', 670),
(192, 'Samoa', 'WS', 'WSM', 882),
(193, 'San Marino', 'SM', 'SMR', 674),
(194, 'Sao Tome and Principe', 'ST', 'STP', 678),
(195, 'Saudi Arabia', 'SA', 'SAU', 682),
(196, 'Senegal', 'SN', 'SEN', 686),
(197, 'Serbia', 'RS', 'SRB', 688),
(198, 'Seychelles', 'SC', 'SYC', 690),
(199, 'Sierra Leone', 'SL', 'SLE', 694),
(200, 'Singapore', 'SG', 'SGP', 702),
(201, 'Sint Maarten (Dutch part)', 'SX', 'SXM', 534),
(202, 'Slovakia', 'SK', 'SVK', 703),
(203, 'Slovenia', 'SI', 'SVN', 705),
(204, 'Solomon Islands', 'SB', 'SLB', 90),
(205, 'Somalia', 'SO', 'SOM', 706),
(206, 'South Africa', 'ZA', 'ZAF', 710),
(207, 'South Georgia and the South Sandwich Islands', 'GS', 'SGS', 239),
(208, 'South Sudan', 'SS', 'SSD', 728),
(209, 'Spain', 'ES', 'ESP', 724),
(210, 'Sri Lanka', 'LK', 'LKA', 144),
(211, 'Sudan', 'SD', 'SDN', 729),
(212, 'Suriname', 'SR', 'SUR', 740),
(213, 'Svalbard and Jan Mayen', 'SJ', 'SJM', 744),
(214, 'Swaziland', 'SZ', 'SWZ', 748),
(215, 'Sweden', 'SE', 'SWE', 752),
(216, 'Switzerland', 'CH', 'CHE', 756),
(217, 'Syrian Arab Republic', 'SY', 'SYR', 760),
(218, 'Taiwan, Province of China', 'TW', 'TWN', 158),
(219, 'Tajikistan', 'TJ', 'TJK', 762),
(220, 'Tanzania, United Republic of', 'TZ', 'TZA', 834),
(221, 'Thailand', 'TH', 'THA', 764),
(222, 'Timor-Leste', 'TL', 'TLS', 626),
(223, 'Togo', 'TG', 'TGO', 768),
(224, 'Tokelau', 'TK', 'TKL', 772),
(225, 'Tonga', 'TO', 'TON', 776),
(226, 'Trinidad and Tobago', 'TT', 'TTO', 780),
(227, 'Tunisia', 'TN', 'TUN', 788),
(228, 'Turkey', 'TR', 'TUR', 792),
(229, 'Turkmenistan', 'TM', 'TKM', 795),
(230, 'Turks and Caicos Islands', 'TC', 'TCA', 796),
(231, 'Tuvalu', 'TV', 'TUV', 798),
(232, 'Uganda', 'UG', 'UGA', 800),
(233, 'Ukraine', 'UA', 'UKR', 804),
(234, 'United Arab Emirates', 'AE', 'ARE', 784),
(235, 'United Kingdom', 'GB', 'GBR', 826),
(236, 'United States', 'US', 'USA', 840),
(237, 'United States Minor Outlying Islands', 'UM', 'UMI', 581),
(238, 'Uruguay', 'UY', 'URY', 858),
(239, 'Uzbekistan', 'UZ', 'UZB', 860),
(240, 'Vanuatu', 'VU', 'VUT', 548),
(241, 'Venezuela, Bolivarian Republic of', 'VE', 'VEN', 862),
(242, 'Viet Nam', 'VN', 'VNM', 704),
(243, 'Virgin Islands, British', 'VG', 'VGB', 92),
(244, 'Virgin Islands, U.S.', 'VI', 'VIR', 850),
(245, 'Wallis and Futuna', 'WF', 'WLF', 876),
(246, 'Western Sahara', 'EH', 'ESH', 732),
(247, 'Yemen', 'YE', 'YEM', 887),
(248, 'Zambia', 'ZM', 'ZMB', 894),
(249, 'Zimbabwe', 'ZW', 'ZWE', 716);

-- --------------------------------------------------------

--
-- Table structure for table `data_manager`
--

CREATE TABLE IF NOT EXISTS `data_manager` (
`dm_id` int(11) NOT NULL,
  `primary_email` varchar(255) NOT NULL,
  `password` varchar(45) DEFAULT NULL,
  `institute` varchar(500) DEFAULT NULL,
  `first_name` varchar(45) DEFAULT NULL,
  `last_name` varchar(45) DEFAULT NULL,
  `phone` varchar(45) DEFAULT NULL,
  `secondary_email` varchar(45) DEFAULT NULL,
  `UserFld1` varchar(45) DEFAULT NULL,
  `UserFld2` varchar(45) DEFAULT NULL,
  `UserFld3` varchar(45) DEFAULT NULL,
  `mobile` varchar(45) DEFAULT NULL,
  `force_password_reset` int(1) NOT NULL DEFAULT '0',
  `qc_access` varchar(100) DEFAULT NULL,
  `enable_adding_test_response_date` varchar(45) DEFAULT NULL,
  `status` varchar(255) NOT NULL DEFAULT 'inactive',
  `created_on` datetime DEFAULT NULL,
  `created_by` varchar(255) DEFAULT NULL,
  `updated_on` datetime DEFAULT NULL,
  `updated_by` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COMMENT='A PT user Table for Data entry or report printing' AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `distributions`
--

CREATE TABLE IF NOT EXISTS `distributions` (
`distribution_id` int(11) NOT NULL,
  `distribution_code` varchar(255) NOT NULL,
  `distribution_date` date NOT NULL,
  `status` varchar(255) NOT NULL,
  `created_on` datetime DEFAULT NULL,
  `created_by` varchar(255) DEFAULT NULL,
  `updated_on` datetime DEFAULT NULL,
  `updated_by` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `dts_recommended_testkits`
--

CREATE TABLE IF NOT EXISTS `dts_recommended_testkits` (
  `test_no` int(11) NOT NULL,
  `testkit` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `dts_recommended_testkits`
--

INSERT INTO `dts_recommended_testkits` (`test_no`, `testkit`) VALUES
(1, 'tk50f41f66a23df'),
(2, 'tk50f41f66a238f'),
(3, 'tk50f41f66a239e');

-- --------------------------------------------------------

--
-- Table structure for table `dts_shipment_corrective_action_map`
--

CREATE TABLE IF NOT EXISTS `dts_shipment_corrective_action_map` (
  `shipment_map_id` int(11) NOT NULL,
  `corrective_action_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `enrollments`
--

CREATE TABLE IF NOT EXISTS `enrollments` (
  `scheme_id` varchar(255) NOT NULL,
  `participant_id` int(11) NOT NULL,
  `enrolled_on` date DEFAULT NULL,
  `enrollment_ended_on` date DEFAULT NULL,
  `status` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `global_config`
--

CREATE TABLE IF NOT EXISTS `global_config` (
  `name` varchar(255) NOT NULL,
  `value` mediumtext NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `global_config`
--

INSERT INTO `global_config` (`name`, `value`) VALUES
('admin_email', 'adhikariamitabh@gmail.com'),
('custom_field_1', ''),
('custom_field_2', ''),
('custom_field_needed', 'no'),
('pass_percentage', '95'),
('qc_access', 'yes'),
('response_after_evaluate', 'yes');

-- --------------------------------------------------------

--
-- Table structure for table `mail_template`
--

CREATE TABLE IF NOT EXISTS `mail_template` (
`mail_temp_id` int(11) NOT NULL,
  `mail_purpose` varchar(255) NOT NULL,
  `from_name` varchar(255) DEFAULT NULL,
  `mail_from` varchar(255) DEFAULT NULL,
  `mail_cc` varchar(255) DEFAULT NULL,
  `mail_bcc` varchar(255) DEFAULT NULL,
  `mail_subject` varchar(255) DEFAULT NULL,
  `mail_content` text,
  `mail_footer` text
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `participant`
--

CREATE TABLE IF NOT EXISTS `participant` (
`participant_id` int(11) NOT NULL,
  `unique_identifier` varchar(255) NOT NULL,
  `individual` varchar(255) DEFAULT NULL,
  `lab_name` varchar(255) DEFAULT NULL,
  `institute_name` varchar(255) CHARACTER SET utf8 COLLATE utf8_bin DEFAULT NULL,
  `department_name` varchar(255) DEFAULT NULL,
  `address` varchar(500) DEFAULT NULL,
  `city` varchar(255) DEFAULT NULL,
  `state` varchar(255) DEFAULT NULL,
  `country` int(11) NOT NULL,
  `zip` varchar(255) DEFAULT NULL,
  `long` varchar(255) DEFAULT NULL,
  `lat` varchar(255) DEFAULT NULL,
  `shipping_address` varchar(1000) DEFAULT NULL,
  `funding_source` varchar(255) DEFAULT NULL,
  `testing_volume` varchar(255) DEFAULT NULL,
  `enrolled_programs` varchar(255) DEFAULT NULL,
  `site_type` varchar(255) DEFAULT NULL,
  `region` varchar(255) DEFAULT NULL,
  `first_name` varchar(45) DEFAULT NULL,
  `last_name` varchar(45) DEFAULT NULL,
  `mobile` varchar(45) DEFAULT NULL,
  `phone` varchar(45) DEFAULT NULL,
  `contact_name` varchar(255) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `affiliation` varchar(45) DEFAULT NULL,
  `network_tier` int(11) DEFAULT NULL,
  `created_on` datetime DEFAULT NULL,
  `created_by` varchar(45) DEFAULT NULL,
  `updated_on` datetime DEFAULT NULL,
  `updated_by` varchar(45) DEFAULT NULL,
  `status` varchar(255) NOT NULL DEFAULT 'inactive'
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `participant_enrolled_programs_map`
--

CREATE TABLE IF NOT EXISTS `participant_enrolled_programs_map` (
  `participant_id` int(11) NOT NULL,
  `ep_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `participant_manager_map`
--

CREATE TABLE IF NOT EXISTS `participant_manager_map` (
  `participant_id` int(11) NOT NULL,
  `dm_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `reference_dbs_eia`
--

CREATE TABLE IF NOT EXISTS `reference_dbs_eia` (
`id` int(11) NOT NULL,
  `shipment_id` int(11) NOT NULL,
  `sample_id` int(11) NOT NULL,
  `eia` int(11) NOT NULL,
  `lot` varchar(255) DEFAULT NULL,
  `exp_date` date DEFAULT NULL,
  `od` varchar(255) DEFAULT NULL,
  `cutoff` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `reference_dbs_wb`
--

CREATE TABLE IF NOT EXISTS `reference_dbs_wb` (
`id` int(11) NOT NULL,
  `shipment_id` int(11) NOT NULL,
  `sample_id` int(11) NOT NULL,
  `wb` int(11) NOT NULL,
  `lot` varchar(255) DEFAULT NULL,
  `exp_date` date DEFAULT NULL,
  `160` int(11) DEFAULT NULL,
  `120` int(11) DEFAULT NULL,
  `66` int(11) DEFAULT NULL,
  `55` int(11) DEFAULT NULL,
  `51` int(11) DEFAULT NULL,
  `41` int(11) DEFAULT NULL,
  `31` int(11) DEFAULT NULL,
  `24` int(11) DEFAULT NULL,
  `17` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `reference_dts_eia`
--

CREATE TABLE IF NOT EXISTS `reference_dts_eia` (
`id` int(11) NOT NULL,
  `shipment_id` int(11) NOT NULL,
  `sample_id` int(11) NOT NULL,
  `eia` int(11) NOT NULL,
  `lot` varchar(255) DEFAULT NULL,
  `exp_date` date DEFAULT NULL,
  `od` varchar(255) DEFAULT NULL,
  `cutoff` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `reference_dts_rapid_hiv`
--

CREATE TABLE IF NOT EXISTS `reference_dts_rapid_hiv` (
`id` int(11) NOT NULL,
  `shipment_id` varchar(255) NOT NULL,
  `sample_id` varchar(255) NOT NULL,
  `testkit` varchar(255) NOT NULL,
  `lot_no` varchar(255) NOT NULL,
  `expiry_date` date NOT NULL,
  `result` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `reference_dts_wb`
--

CREATE TABLE IF NOT EXISTS `reference_dts_wb` (
`id` int(11) NOT NULL,
  `shipment_id` int(11) NOT NULL,
  `sample_id` int(11) NOT NULL,
  `wb` int(11) NOT NULL,
  `lot` varchar(255) DEFAULT NULL,
  `exp_date` date DEFAULT NULL,
  `160` int(11) DEFAULT NULL,
  `120` int(11) DEFAULT NULL,
  `66` int(11) DEFAULT NULL,
  `55` int(11) DEFAULT NULL,
  `51` int(11) DEFAULT NULL,
  `41` int(11) DEFAULT NULL,
  `31` int(11) DEFAULT NULL,
  `24` int(11) DEFAULT NULL,
  `17` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `reference_result_dbs`
--

CREATE TABLE IF NOT EXISTS `reference_result_dbs` (
  `shipment_id` int(11) NOT NULL,
  `sample_id` int(11) NOT NULL,
  `sample_label` varchar(45) DEFAULT NULL,
  `reference_result` varchar(45) DEFAULT NULL,
  `control` int(11) DEFAULT NULL,
  `mandatory` int(11) NOT NULL DEFAULT '0',
  `sample_score` int(11) NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COMMENT='Referance Result for DBS Shipment';

-- --------------------------------------------------------

--
-- Table structure for table `reference_result_dts`
--

CREATE TABLE IF NOT EXISTS `reference_result_dts` (
  `shipment_id` int(11) NOT NULL,
  `sample_id` int(11) NOT NULL,
  `sample_label` varchar(45) DEFAULT NULL,
  `reference_result` varchar(45) DEFAULT NULL,
  `control` int(11) DEFAULT NULL,
  `mandatory` int(11) NOT NULL DEFAULT '0',
  `sample_score` int(11) NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COMMENT='Referance Result for DTS Shipment';

-- --------------------------------------------------------

--
-- Table structure for table `reference_result_eid`
--

CREATE TABLE IF NOT EXISTS `reference_result_eid` (
  `shipment_id` int(11) NOT NULL,
  `sample_id` int(11) NOT NULL,
  `sample_label` varchar(255) DEFAULT NULL,
  `reference_result` varchar(255) DEFAULT NULL,
  `control` int(11) DEFAULT NULL,
  `reference_hiv_ct_od` varchar(45) DEFAULT NULL,
  `reference_ic_qs` varchar(45) DEFAULT NULL,
  `mandatory` int(11) NOT NULL DEFAULT '0',
  `sample_score` int(11) NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `reference_result_vl`
--

CREATE TABLE IF NOT EXISTS `reference_result_vl` (
  `shipment_id` int(11) NOT NULL,
  `sample_id` int(11) NOT NULL,
  `sample_label` varchar(255) DEFAULT NULL,
  `reference_result` varchar(45) DEFAULT NULL,
  `control` int(11) DEFAULT NULL,
  `mandatory` int(11) NOT NULL DEFAULT '0',
  `sample_score` int(11) NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `reference_vl_calculation`
--

CREATE TABLE IF NOT EXISTS `reference_vl_calculation` (
  `shipment_id` int(11) NOT NULL,
  `sample_id` int(11) NOT NULL,
  `vl_assay` int(11) NOT NULL,
  `q1` double(10,2) NOT NULL,
  `q3` double(10,2) NOT NULL,
  `iqr` double(10,2) NOT NULL,
  `quartile_low` double(10,2) NOT NULL,
  `quartile_high` double(10,2) NOT NULL,
  `mean` double(10,2) NOT NULL,
  `sd` double(10,2) NOT NULL,
  `cv` double(10,2) NOT NULL,
  `low_limit` double(10,2) NOT NULL,
  `high_limit` double(10,2) NOT NULL,
  `calculated_on` datetime DEFAULT NULL,
  `manual_low_limit` double(10,2) NOT NULL DEFAULT '0.00',
  `manual_high_limit` double(10,2) NOT NULL DEFAULT '0.00',
  `updated_on` datetime DEFAULT NULL,
  `updated_by` int(11) DEFAULT NULL,
  `use_range` varchar(255) NOT NULL DEFAULT 'calculated'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `reference_vl_methods`
--

CREATE TABLE IF NOT EXISTS `reference_vl_methods` (
  `shipment_id` int(11) NOT NULL,
  `sample_id` int(11) NOT NULL,
  `assay` int(11) NOT NULL,
  `value` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `report_config`
--

CREATE TABLE IF NOT EXISTS `report_config` (
  `name` varchar(255) NOT NULL DEFAULT '',
  `value` text
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `report_config`
--

INSERT INTO `report_config` (`name`, `value`) VALUES
('logo', 'logo_example.jpg'),
('logo-right', 'logo_right.jpg'),
('report-header', '																																																									<div><div style="text-align: center;"><b><font face="Times">NATIONAL HEALTH LABORATORY QUALITY ASSURANCE SURVEY</font></b></div></div><div style="text-align: center;"><b><font face="Times">NATIONAL AIDS/STI CONTROL PROGRAMME</font></b></div>																																						');

-- --------------------------------------------------------

--
-- Table structure for table `rep_analytes`
--

CREATE TABLE IF NOT EXISTS `rep_analytes` (
`ID` int(11) NOT NULL,
  `AnalyteDescription` varchar(128) NOT NULL,
  `ProgramID` int(11) DEFAULT NULL,
  `ProviderID` int(11) DEFAULT NULL,
  `LabID` int(11) DEFAULT NULL,
  `CreatedDate` datetime DEFAULT NULL,
  `CreatedBy` varchar(50) DEFAULT NULL
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `rep_analytes`
--

INSERT INTO `rep_analytes` (`ID`, `AnalyteDescription`, `ProgramID`, `ProviderID`, `LabID`, `CreatedDate`, `CreatedBy`) VALUES
(1, 'Malaria Parasite Detection and Identification', 1, 1, NULL, '2016-11-29 14:58:18', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `rep_counties`
--

CREATE TABLE IF NOT EXISTS `rep_counties` (
`CountyID` int(11) NOT NULL,
  `Description` varchar(20) DEFAULT NULL,
  `CreatedBy` varchar(50) DEFAULT NULL,
  `CreatedDate` datetime DEFAULT NULL
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=48 ;

--
-- Dumping data for table `rep_counties`
--

INSERT INTO `rep_counties` (`CountyID`, `Description`, `CreatedBy`, `CreatedDate`) VALUES
(1, 'BARINGO', '1', '2016-11-23 16:16:00'),
(2, 'BOMET', '1', '2016-11-24 16:16:00'),
(3, 'BUNGOMA', '1', '2016-11-25 16:16:00'),
(4, 'BUSIA', '1', '2016-11-26 16:16:00'),
(5, 'ELGEYO MARAKWET', '1', '2016-11-27 16:16:00'),
(6, 'EMBU', '1', '2016-11-28 16:16:00'),
(7, 'GARISSA', '1', '2016-11-29 16:16:00'),
(8, 'HOMA BAY', '1', '2016-11-30 16:16:00'),
(9, 'ISIOLO', '1', '2016-12-01 16:16:00'),
(10, 'KAJIADO', '1', '2016-12-02 16:16:00'),
(11, 'KAKAMEGA', '1', '2016-12-03 16:16:00'),
(12, 'KERICHO', '1', '2016-12-04 16:16:00'),
(13, 'KIAMBU', '1', '2016-12-05 16:16:00'),
(14, 'KILIFI', '1', '2016-12-06 16:16:00'),
(15, 'KIRINYAGA', '1', '2016-12-07 16:16:00'),
(16, 'KISII', '1', '2016-12-08 16:16:00'),
(17, 'KISUMU', '1', '2016-12-09 16:16:00'),
(18, 'KITUI', '1', '2016-12-10 16:16:00'),
(19, 'KWALE', '1', '2016-12-11 16:16:00'),
(20, 'LAIKIPIA', '1', '2016-12-12 16:16:00'),
(21, 'LAMU', '1', '2016-12-13 16:16:00'),
(22, 'MACHAKOS', '1', '2016-12-14 16:16:00'),
(23, 'MAKUENI', '1', '2016-12-15 16:16:00'),
(24, 'MANDERA', '1', '2016-12-16 16:16:00'),
(25, 'MARSABIT', '1', '2016-12-17 16:16:00'),
(26, 'MERU', '1', '2016-12-18 16:16:00'),
(27, 'MIGORI', '1', '2016-12-19 16:16:00'),
(28, 'MOMBASA', '1', '2016-12-20 16:16:00'),
(29, 'MURANG`A', '1', '2016-12-21 16:16:00'),
(30, 'NAIROBI', '1', '2016-12-22 16:16:00'),
(31, 'NAKURU', '1', '2016-12-23 16:16:00'),
(32, 'NANDI', '1', '2016-12-24 16:16:00'),
(33, 'NAROK', '1', '2016-12-25 16:16:00'),
(34, 'NYAMIRA', '1', '2016-12-26 16:16:00'),
(35, 'NYANDARUA', '1', '2016-12-27 16:16:00'),
(36, 'NYERI', '1', '2016-12-28 16:16:00'),
(37, 'SAMBURU', '1', '2016-12-29 16:16:00'),
(38, 'SIAYA', '1', '2016-12-30 16:16:00'),
(39, 'TAITA TAVETA', '1', '2016-12-31 16:16:00'),
(40, 'TANA RIVER', '1', '2017-01-01 16:16:00'),
(41, 'THARAKA NITHI', '1', '2017-01-02 16:16:00'),
(42, 'TRANS NZOIA', '1', '2017-01-03 16:16:00'),
(43, 'TURKANA', '1', '2017-01-04 16:16:00'),
(44, 'UASIN GISHU', '1', '2017-01-05 16:16:00'),
(45, 'VIHIGA', '1', '2017-01-06 16:16:00'),
(46, 'WAJIR', '1', '2017-01-07 16:16:00'),
(47, 'WEST POKOT', '1', '2017-01-08 16:16:00');

-- --------------------------------------------------------

--
-- Table structure for table `rep_customfields`
--

CREATE TABLE IF NOT EXISTS `rep_customfields` (
`ID` int(11) NOT NULL,
  `ProviderID` varchar(128) DEFAULT NULL,
  `ProgramID` varchar(128) DEFAULT NULL,
  `ColumnName` varchar(50) DEFAULT NULL,
  `Description` varchar(100) DEFAULT NULL,
  `Mandatory` varchar(128) DEFAULT NULL,
  `Datatype` varchar(50) DEFAULT NULL,
  `Length` int(11) DEFAULT NULL,
  `CreatedBy` varchar(20) DEFAULT NULL,
  `CreatedDate` datetime DEFAULT NULL
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=62 ;

--
-- Dumping data for table `rep_customfields`
--

INSERT INTO `rep_customfields` (`ID`, `ProviderID`, `ProgramID`, `ColumnName`, `Description`, `Mandatory`, `Datatype`, `Length`, `CreatedBy`, `CreatedDate`) VALUES
(55, 'HuQas Provider', 'Malaria', 'Frequency', 'Frequency', NULL, NULL, NULL, NULL, NULL),
(56, 'HuQas Provider', 'Malaria', 'StCount', 'St. Count', NULL, NULL, NULL, NULL, NULL),
(57, 'HuQas Provider', 'Malaria', 'TragetValue', 'Traget Value', NULL, NULL, NULL, NULL, NULL),
(58, 'HuQas Provider', 'Malaria', 'UpperLimit', 'Upper Limit', NULL, NULL, NULL, NULL, NULL),
(59, 'HuQas Provider', 'Malaria', 'LowerLimit', 'Lower Limit', NULL, NULL, NULL, NULL, NULL),
(61, 'HuQas Provider', 'Malaria', 'OverallScore', 'Overall Score', 'NULL', 'varchar', 100, '1', '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `rep_failreasons`
--

CREATE TABLE IF NOT EXISTS `rep_failreasons` (
`ID` int(11) NOT NULL,
  `ReasonDescription` varchar(200) DEFAULT NULL,
  `ProgramID` varchar(128) DEFAULT NULL,
  `ProviderID` varchar(128) DEFAULT NULL,
  `CreatedBy` varchar(100) DEFAULT NULL,
  `CreatedDate` datetime DEFAULT NULL
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `rep_failreasons`
--

INSERT INTO `rep_failreasons` (`ID`, `ReasonDescription`, `ProgramID`, `ProviderID`, `CreatedBy`, `CreatedDate`) VALUES
(1, 'Poor Slide Smear', 'Malaria', 'HuQas Provider', '1', '2016-12-08 10:50:23');

-- --------------------------------------------------------

--
-- Table structure for table `rep_grading`
--

CREATE TABLE IF NOT EXISTS `rep_grading` (
`ID` int(11) NOT NULL,
  `GradeDescription` varchar(128) NOT NULL,
  `ProgramID` varchar(128) DEFAULT NULL,
  `ProviderID` varchar(128) DEFAULT NULL,
  `CreatedDate` datetime DEFAULT NULL,
  `CreatedBy` varchar(50) DEFAULT NULL
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Dumping data for table `rep_grading`
--

INSERT INTO `rep_grading` (`ID`, `GradeDescription`, `ProgramID`, `ProviderID`, `CreatedDate`, `CreatedBy`) VALUES
(1, 'ACCEPTABLE', 'Malaria', 'HuQas Provider', '2016-12-08 10:12:52', '1'),
(2, 'NOT ACCEPTABLE', 'Malaria', 'HuQas Provider', '2016-12-08 10:00:25', '1');

-- --------------------------------------------------------

--
-- Table structure for table `rep_labcontacts`
--

CREATE TABLE IF NOT EXISTS `rep_labcontacts` (
`ContactID` int(11) NOT NULL,
  `LabID` int(11) DEFAULT NULL,
  `ContactName` varchar(50) DEFAULT NULL,
  `ContactEmail` varchar(50) DEFAULT NULL,
  `ContactTelephone` varchar(50) DEFAULT NULL,
  `Status` varchar(11) DEFAULT NULL
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=7 ;

--
-- Dumping data for table `rep_labcontacts`
--

INSERT INTO `rep_labcontacts` (`ContactID`, `LabID`, `ContactName`, `ContactEmail`, `ContactTelephone`, `Status`) VALUES
(5, 1, 'Brian Vidolo', 'brianonyi@gmail.com', '037293972993', 'active'),
(6, 2, 'Brian Kamau', 'dkamau@abnosoftwares.co.ke', '32434343', 'active');

-- --------------------------------------------------------

--
-- Table structure for table `rep_labs`
--

CREATE TABLE IF NOT EXISTS `rep_labs` (
`LabID` int(11) NOT NULL,
  `LabName` varchar(200) NOT NULL,
  `County` int(11) DEFAULT NULL,
  `Address` varchar(20) DEFAULT NULL,
  `PostalCode` int(11) DEFAULT NULL,
  `Telephone` varchar(20) DEFAULT NULL,
  `ContactName` varchar(50) DEFAULT NULL,
  `ContactEmail` varchar(50) DEFAULT NULL,
  `ContactTelephone` varchar(50) DEFAULT NULL,
  `Status` varchar(20) DEFAULT NULL,
  `CreatedBy` varchar(50) DEFAULT NULL,
  `CreatedDate` datetime DEFAULT NULL
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Dumping data for table `rep_labs`
--

INSERT INTO `rep_labs` (`LabID`, `LabName`, `County`, `Address`, `PostalCode`, `Telephone`, `ContactName`, `ContactEmail`, `ContactTelephone`, `Status`, `CreatedBy`, `CreatedDate`) VALUES
(1, 'Coast Provincial General Hospital', 1, '470741', 100, '0737547388', 'dennis kamau', 'dkamau@abnosoftwares.co.ke', '07323243422', 'active', '1', '2017-01-18 12:50:50'),
(2, 'Kenyatta National Hospital\r\n', NULL, '894304', 100, '08984743', 'brian vidoloo', 'bvidolo@abnosoftwares.co.ke', '0839289', 'active', '1', '2016-12-08 14:44:07');

-- --------------------------------------------------------

--
-- Table structure for table `rep_programs`
--

CREATE TABLE IF NOT EXISTS `rep_programs` (
`ProgramID` int(11) NOT NULL,
  `ProgramCode` varchar(10) DEFAULT NULL,
  `Description` varchar(128) DEFAULT NULL,
  `Status` varchar(100) DEFAULT NULL,
  `CreatedBy` varchar(50) DEFAULT NULL,
  `CreatedDate` datetime DEFAULT NULL,
  `Comments` text
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Dumping data for table `rep_programs`
--

INSERT INTO `rep_programs` (`ProgramID`, `ProgramCode`, `Description`, `Status`, `CreatedBy`, `CreatedDate`, `Comments`) VALUES
(1, 'MLR', 'Malaria', 'active', '1', '2016-11-23 16:16:23', NULL),
(2, 'Bio Chem', 'Bio Chemistry', 'active', '1', '2016-12-16 10:06:54', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `rep_providercontacts`
--

CREATE TABLE IF NOT EXISTS `rep_providercontacts` (
`ContactID` int(11) NOT NULL,
  `ProviderID` int(11) DEFAULT NULL,
  `ContactName` varchar(50) DEFAULT NULL,
  `ContactEmail` varchar(50) DEFAULT NULL,
  `ContactTelephone` varchar(50) DEFAULT NULL,
  `Status` varchar(11) DEFAULT NULL
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=6 ;

--
-- Dumping data for table `rep_providercontacts`
--

INSERT INTO `rep_providercontacts` (`ContactID`, `ProviderID`, `ContactName`, `ContactEmail`, `ContactTelephone`, `Status`) VALUES
(1, 1, 'Brian Vidolo', 'brianonyi@gmail.com', '0727547388', 'active'),
(4, 8, 'Dennis Kamau', 'dkamau@gmail.com', '0727547388', 'inactive'),
(5, NULL, 'Brian Kamau', 'dkamau@abnosoftwares.co.ke', '23829380', 'active');

-- --------------------------------------------------------

--
-- Table structure for table `rep_providerfiles`
--

CREATE TABLE IF NOT EXISTS `rep_providerfiles` (
`ID` int(11) NOT NULL,
  `ProviderID` varchar(128) DEFAULT NULL,
  `PeriodID` varchar(128) DEFAULT NULL,
  `ProgramID` varchar(128) DEFAULT NULL,
  `FileName` varchar(100) DEFAULT NULL,
  `FileType` varchar(100) DEFAULT NULL,
  `FileSize` int(11) DEFAULT NULL,
  `Url` varchar(100) DEFAULT NULL,
  `CreatedBy` varchar(50) DEFAULT NULL,
  `CreatedDate` datetime DEFAULT NULL
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=7 ;

--
-- Dumping data for table `rep_providerfiles`
--

INSERT INTO `rep_providerfiles` (`ID`, `ProviderID`, `PeriodID`, `ProgramID`, `FileName`, `FileType`, `FileSize`, `Url`, `CreatedBy`, `CreatedDate`) VALUES
(1, '1', '1', '1', 'Malaria.pdf', 'application/pdf', 142838, 'C:\\temp\\Malaria.pdf', '1', '2016-12-08 11:10:08'),
(2, '1', '2', '2', 'EQA Process Workflow.pdf', 'application/pdf', 592200, 'C:\\temp\\EQA Process Workflow.pdf', '1', '2016-12-08 14:57:43'),
(3, '2', '1', '1', 'Malaria.pdf', 'application/pdf', 142838, 'C:\\temp\\Malaria.pdf', '1', '2016-12-15 10:43:56'),
(4, '2', '1', '1', 'Malaria.pdf', 'application/pdf', 142838, 'C:\\temp\\Malaria.pdf', '1', '2016-12-15 10:55:01'),
(5, '8', '1', '1', 'Malaria.pdf', 'application/pdf', 142838, 'C:\\temp\\Malaria.pdf', '7', '2016-12-15 13:30:09'),
(6, '8', '1', '2', 'Basic_Chemistry.pdf', 'application/pdf', 283843, 'C:\\temp\\Basic_Chemistry.pdf', '7', '2016-12-20 15:50:43');

-- --------------------------------------------------------

--
-- Table structure for table `rep_providerlabs`
--

CREATE TABLE IF NOT EXISTS `rep_providerlabs` (
`ID` int(11) NOT NULL,
  `LabID` int(11) DEFAULT NULL,
  `ProviderID` int(11) DEFAULT NULL,
  `CreatedBy` varchar(50) DEFAULT NULL,
  `CreatedDate` datetime DEFAULT NULL
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `rep_providerlabs`
--

INSERT INTO `rep_providerlabs` (`ID`, `LabID`, `ProviderID`, `CreatedBy`, `CreatedDate`) VALUES
(1, 1, 1, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `rep_providerprograms`
--

CREATE TABLE IF NOT EXISTS `rep_providerprograms` (
`ID` int(11) NOT NULL,
  `ProviderID` int(11) DEFAULT NULL,
  `ProgramID` int(11) DEFAULT NULL,
  `CreatedBy` varchar(50) DEFAULT NULL,
  `CreatedDate` datetime DEFAULT NULL
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=7 ;

--
-- Dumping data for table `rep_providerprograms`
--

INSERT INTO `rep_providerprograms` (`ID`, `ProviderID`, `ProgramID`, `CreatedBy`, `CreatedDate`) VALUES
(5, 12, 1, '1', '2016-12-16 12:27:50'),
(6, 12, 2, '1', '2016-12-16 12:27:50');

-- --------------------------------------------------------

--
-- Table structure for table `rep_providerresultcodes`
--

CREATE TABLE IF NOT EXISTS `rep_providerresultcodes` (
`ID` int(11) NOT NULL,
  `ResultCode` varchar(200) DEFAULT NULL,
  `ProviderID` varchar(128) DEFAULT NULL,
  `CreatedBy` varchar(100) DEFAULT NULL,
  `CreatedDate` datetime DEFAULT NULL
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=8 ;

--
-- Dumping data for table `rep_providerresultcodes`
--

INSERT INTO `rep_providerresultcodes` (`ID`, `ResultCode`, `ProviderID`, `CreatedBy`, `CreatedDate`) VALUES
(1, 'OK', 'HuQas Provider', '1', '2016-12-01 11:08:08'),
(2, 'REAGENT UNAVAILABLE\r\n', 'HuQas Provider', '1', '2016-12-01 11:09:33'),
(3, 'PENDING\r\n', 'HuQas Provider', '1', '2016-12-01 11:09:59'),
(4, 'ANALYZER OUT OF SERVICE\r\n', 'HuQas Provider', '1', '2016-12-01 11:10:26'),
(5, 'FAILURE TO PARTICIPATE\r\n', 'HuQas Provider', '1', '2016-12-01 11:10:53'),
(6, 'TESTING SUSPENDED DURING TEST EVENT\r\n', 'HuQas Provider', '1', '2016-12-01 11:11:13'),
(7, 'BELOW LINEAR/DETECTION LIMIT\r\n', 'HuQas Provider', '1', '2016-12-01 11:11:40');

-- --------------------------------------------------------

--
-- Table structure for table `rep_providerrounds`
--

CREATE TABLE IF NOT EXISTS `rep_providerrounds` (
`ID` int(11) NOT NULL,
  `PeriodDescription` varchar(128) NOT NULL,
  `ProviderID` varchar(128) DEFAULT NULL,
  `EnrolledLabs` int(11) DEFAULT NULL,
  `CreatedBy` varchar(50) DEFAULT NULL,
  `CreatedDate` datetime DEFAULT NULL
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Dumping data for table `rep_providerrounds`
--

INSERT INTO `rep_providerrounds` (`ID`, `PeriodDescription`, `ProviderID`, `EnrolledLabs`, `CreatedBy`, `CreatedDate`) VALUES
(1, '2nd Test Event 2016', 'HuQas Provider', 30, '1', '2016-12-08 10:03:13'),
(2, '3rd Test Event 2016', 'HuQas Provider', 40, '1', '2016-12-08 10:07:27');

-- --------------------------------------------------------

--
-- Table structure for table `rep_providers`
--

CREATE TABLE IF NOT EXISTS `rep_providers` (
`ProviderID` int(11) NOT NULL,
  `ProviderName` varchar(100) NOT NULL,
  `Email` varchar(50) DEFAULT NULL,
  `Address` varchar(20) DEFAULT NULL,
  `Telephone` varchar(20) DEFAULT NULL,
  `PostalCode` int(10) DEFAULT NULL,
  `ContactName` varchar(100) DEFAULT NULL,
  `ContactTelephone` varchar(20) DEFAULT NULL,
  `ContactEmail` varchar(50) DEFAULT NULL,
  `Status` varchar(100) DEFAULT NULL,
  `CreatedBy` varchar(50) DEFAULT NULL,
  `CreatedDate` datetime DEFAULT NULL
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=13 ;

--
-- Dumping data for table `rep_providers`
--

INSERT INTO `rep_providers` (`ProviderID`, `ProviderName`, `Email`, `Address`, `Telephone`, `PostalCode`, `ContactName`, `ContactTelephone`, `ContactEmail`, `Status`, `CreatedBy`, `CreatedDate`) VALUES
(1, 'HuQas Provider', 'brianonyi@gmail.com', '47074 Nairobi, Kenya', '0737547388', 100, 'Dennis Kamau', '0727368823', 'dkamau@abnosoftwares', 'active', '1', '2016-11-23 13:26:08'),
(2, 'Hiv PT', 'vmwenda@gmail.com', '73827', '078327393', 100, 'Victor Mwenda', '0722339993', 'bvidolo@abnosoftwares.co.ke', 'active', '1', '2016-12-14 09:06:27'),
(8, 'Amref Provider', 'info@amref.co.ke', '656555', '0722339993', 100, 'Brian Vidolo', '0722339993', 'brianonyi@gmail.com', 'active', '1', '2016-12-14 09:41:12'),
(12, 'Micro Provider', 'brianonyi@gmail.com', '97765', '0722339993', 100, 'Brian Vidolo', '0722339993', 'bvidolo@abnosoftwares.co.ke', 'active', '1', '2016-12-16 12:27:50');

-- --------------------------------------------------------

--
-- Table structure for table `rep_providersamples`
--

CREATE TABLE IF NOT EXISTS `rep_providersamples` (
`ID` int(11) NOT NULL,
  `SampleCode` varchar(100) DEFAULT NULL,
  `ProviderID` varchar(128) DEFAULT NULL,
  `ProgramID` varchar(128) DEFAULT NULL,
  `PeriodID` varchar(128) DEFAULT NULL,
  `LabID` varchar(128) DEFAULT NULL,
  `CreatedBy` varchar(100) DEFAULT NULL,
  `CreatedDate` datetime DEFAULT NULL
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=5 ;

--
-- Dumping data for table `rep_providersamples`
--

INSERT INTO `rep_providersamples` (`ID`, `SampleCode`, `ProviderID`, `ProgramID`, `PeriodID`, `LabID`, `CreatedBy`, `CreatedDate`) VALUES
(1, 'A', 'HuQas Provider', 'Malaria', '2nd Test Event 2016', 'Lab-001', '1', '2016-12-01 10:17:09'),
(2, 'B', 'HuQas Provider', 'Malaria', '2nd Test Event 2016', 'Lab-001', '1', '2016-12-01 10:17:19'),
(3, 'C', 'HuQas Provider', 'Malaria', '2nd Test Event 2016', 'Lab-001', '1', '2016-12-01 10:17:30'),
(4, 'D', 'HuQas Provider', 'Malaria', '2nd Test Event 2016', 'Lab-001', '1', '2016-12-01 10:17:40');

-- --------------------------------------------------------

--
-- Table structure for table `rep_repository`
--

CREATE TABLE IF NOT EXISTS `rep_repository` (
`ImpID` int(11) NOT NULL COMMENT 'Repository unique Identifier',
  `ProviderID` varchar(128) DEFAULT NULL COMMENT 'Provider Name',
  `LabID` varchar(200) DEFAULT NULL COMMENT 'Lab Names',
  `RoundID` varchar(128) DEFAULT NULL COMMENT 'Round Names',
  `ProgramID` varchar(128) DEFAULT NULL COMMENT 'Program Name',
  `ReleaseDate` date DEFAULT NULL COMMENT 'Release Date',
  `SampleCode` varchar(100) DEFAULT NULL COMMENT 'Sample Code',
  `AnalyteID` varchar(128) DEFAULT NULL COMMENT 'Analyte Name',
  `SampleCondition` varchar(100) DEFAULT NULL COMMENT 'Sample Condition',
  `DateSampleReceived` datetime DEFAULT NULL COMMENT 'Date Sample Received',
  `Result` varchar(200) DEFAULT NULL COMMENT 'Result',
  `ResultCode` varchar(100) DEFAULT NULL COMMENT 'Result Code',
  `Grade` varchar(128) DEFAULT NULL COMMENT 'Grade',
  `TestKitID` varchar(128) DEFAULT NULL COMMENT 'Test Kit Name',
  `DateSampleShipped` datetime DEFAULT NULL COMMENT 'Date Sample Shipped',
  `FailReasonCode` varchar(100) DEFAULT NULL COMMENT 'Fail Reason Code',
  `Frequency` text COMMENT 'Frequency',
  `StCount` text COMMENT 'St. Count',
  `TragetValue` text COMMENT 'Traget Value',
  `UpperLimit` text COMMENT 'Upper Limit',
  `LowerLimit` text COMMENT 'Lower Limit',
  `OverallScore` varchar(100) DEFAULT NULL COMMENT 'Overall Score'
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=61 ;

--
-- Dumping data for table `rep_repository`
--

INSERT INTO `rep_repository` (`ImpID`, `ProviderID`, `LabID`, `RoundID`, `ProgramID`, `ReleaseDate`, `SampleCode`, `AnalyteID`, `SampleCondition`, `DateSampleReceived`, `Result`, `ResultCode`, `Grade`, `TestKitID`, `DateSampleShipped`, `FailReasonCode`, `Frequency`, `StCount`, `TragetValue`, `UpperLimit`, `LowerLimit`, `OverallScore`) VALUES
(1, 'HuQas Provider', 'Coast Provincial General Hospital', '2nd Test Event 2016', 'Malaria', '2016-02-02', 'A', 'Malaria Parasite Detection and Identification ', NULL, NULL, 'No Parasite Seen', 'OK', 'NOT ACCEPTABLE', NULL, NULL, NULL, 'A', '42416', '', '', '42416', NULL),
(2, 'HuQas Provider', 'Coast Provincial General Hospital', '2nd Test Event 2016', 'Malaria', '2016-02-03', 'B', 'Malaria Parasite Detection and Identification ', NULL, NULL, 'No Parasite Seen', 'OK', 'ACCEPTABLE', NULL, NULL, NULL, 'B', '42416', '', '', '42416', NULL),
(3, 'HuQas Provider', 'Coast Provincial General Hospital', '2nd Test Event 2016', 'Malaria', '2016-02-04', 'C', 'Malaria Parasite Detection and Identification ', NULL, NULL, 'Plasmodium falciparum', 'OK', 'NOT ACCEPTABLE', NULL, NULL, NULL, 'C', '42417', '', '', '42417', NULL),
(4, 'HuQas Provider', 'Coast Provincial General Hospital', '2nd Test Event 2016', 'Malaria', '2016-02-05', 'D', 'Malaria Parasite Detection and Identification ', NULL, NULL, 'Plasmodium falciparum', 'OK', 'ACCEPTABLE', NULL, NULL, NULL, 'D', '42418', '', '', '42418', NULL),
(5, 'HuQas Provider', 'Coast Provincial General Hospital', '2nd Test Event 2016', 'Malaria', '2016-02-06', 'E', 'Malaria Parasite Detection and Identification ', NULL, NULL, 'Plasmodium ovale', 'OK', 'ACCEPTABLE', NULL, NULL, NULL, 'E', '42419', '', '', '42419', NULL),
(6, 'HuQas Provider', 'Kangemi Health Center', '2nd Test Event 2016', 'Malaria', '2016-02-07', 'A', 'Malaria Parasite Detection and Identification ', NULL, NULL, 'No Parasite Seen', 'OK', 'NOT ACCEPTABLE', NULL, NULL, NULL, 'A', '42420', '', '', '42420', NULL),
(7, 'HuQas Provider', 'Kangemi Health Center', '2nd Test Event 2016', 'Malaria', '2016-02-08', 'B', 'Malaria Parasite Detection and Identification ', NULL, NULL, 'No Parasite Seen', 'OK', 'ACCEPTABLE', NULL, NULL, NULL, 'B', '42421', '', '', '42421', NULL),
(8, 'HuQas Provider', 'Kangemi Health Center', '2nd Test Event 2016', 'Malaria', '2016-02-09', 'C', 'Malaria Parasite Detection and Identification ', NULL, NULL, 'Plasmodium falciparum', 'OK', 'NOT ACCEPTABLE', NULL, NULL, NULL, 'C', '42422', '', '', '42422', NULL),
(9, 'HuQas Provider', 'Kangemi Health Center', '2nd Test Event 2016', 'Malaria', '2016-02-10', 'D', 'Malaria Parasite Detection and Identification ', NULL, NULL, 'Plasmodium falciparum', 'OK', 'ACCEPTABLE', NULL, NULL, NULL, 'D', '42423', '', '', '42423', NULL),
(10, 'HuQas Provider', 'Kangemi Health Center', '2nd Test Event 2016', 'Malaria', '2016-02-11', 'E', 'Malaria Parasite Detection and Identification ', NULL, NULL, 'Plasmodium ovale', 'OK', 'ACCEPTABLE', NULL, NULL, NULL, 'E', '42424', '', '', '42424', NULL),
(11, 'HuQas Provider', 'Kenyatta National Hospital', '2nd Test Event 2016', 'Malaria', '2016-02-12', '5', 'Malaria Parasite Detection and Identification ', NULL, NULL, 'Plasmodium malariae', 'OK', 'ACCEPTABLE', NULL, NULL, NULL, 'A', '42425', '', '', '42425', NULL),
(12, 'HuQas Provider', 'Kenyatta National Hospital', '2nd Test Event 2016', 'Malaria', '2016-02-13', 'B', 'Malaria Parasite Detection and Identification ', NULL, NULL, 'No Parasite Seen', 'OK', 'ACCEPTABLE', NULL, NULL, NULL, 'B', '42426', '', '', '42426', NULL),
(13, 'HuQas Provider', 'Kenyatta National Hospital', '2nd Test Event 2016', 'Malaria', '2016-02-14', 'C', 'Malaria Parasite Detection and Identification ', NULL, NULL, 'Plasmodium falciparum, Plasmodium malariae', 'OK', 'ACCEPTABLE', NULL, NULL, NULL, 'C', '42427', '', '', '42427', NULL),
(14, 'HuQas Provider', 'Kenyatta National Hospital', '2nd Test Event 2016', 'Malaria', '2016-02-15', 'D', 'Malaria Parasite Detection and Identification ', NULL, NULL, 'Plasmodium falciparum', 'OK', 'ACCEPTABLE', NULL, NULL, NULL, 'D', '42428', '', '', '42428', NULL),
(15, 'HuQas Provider', 'Kenyatta National Hospital', '2nd Test Event 2016', 'Malaria', '2016-02-16', 'E', 'Malaria Parasite Detection and Identification ', NULL, NULL, 'Plasmodium ovale, Plasmodium vivax', 'OK', 'NOT ACCEPTABLE', NULL, NULL, NULL, 'E', '42429', '', '', '42429', NULL),
(16, 'HuQas Provider', 'Kenyatta National Hospital- BTU', '2nd Test Event 2016', 'Malaria', '2016-02-17', 'A', 'Malaria Parasite Detection and Identification ', NULL, NULL, 'No Parasite Seen', 'OK', 'NOT ACCEPTABLE', NULL, NULL, NULL, 'A', '42430', '', '', '42430', NULL),
(17, 'HuQas Provider', 'Kenyatta National Hospital- BTU', '2nd Test Event 2016', 'Malaria', '2016-02-18', 'B', 'Malaria Parasite Detection and Identification ', NULL, NULL, 'No Parasite Seen', 'OK', 'ACCEPTABLE', NULL, NULL, NULL, 'B', '42431', '', '', '42431', NULL),
(18, 'HuQas Provider', 'Kenyatta National Hospital- BTU', '2nd Test Event 2016', 'Malaria', '2016-02-19', 'C', 'Malaria Parasite Detection and Identification ', NULL, NULL, 'Plasmodium vivax', 'OK', 'NOT ACCEPTABLE', NULL, NULL, NULL, 'C', '42432', '', '', '42432', NULL),
(19, 'HuQas Provider', 'Kenyatta National Hospital- BTU', '2nd Test Event 2016', 'Malaria', '2016-02-20', 'D', 'Malaria Parasite Detection and Identification ', NULL, NULL, 'Plasmodium vivax', 'OK', 'NOT ACCEPTABLE', NULL, NULL, NULL, 'D', '42433', '', '', '42433', NULL),
(20, 'HuQas Provider', 'Kenyatta National Hospital- BTU', '2nd Test Event 2016', 'Malaria', '2016-02-21', 'E', 'Malaria Parasite Detection and Identification ', NULL, NULL, 'Plasmodium ovale', 'OK', 'ACCEPTABLE', NULL, NULL, NULL, 'E', '42434', '', '', '42434', NULL),
(21, 'HuQas Provider', 'Gilgil Sub-District Hospital', '2nd Test Event 2016', 'Malaria', '2016-02-22', 'A', 'Malaria Parasite Detection and Identification ', NULL, NULL, 'No Parasite Seen', 'OK', 'NOT ACCEPTABLE', NULL, NULL, NULL, 'A', '42435', '', '', '42435', NULL),
(22, 'HuQas Provider', 'Gilgil Sub-District Hospital', '2nd Test Event 2016', 'Malaria', '2016-02-23', 'B', 'Malaria Parasite Detection and Identification ', NULL, NULL, 'No Parasite Seen', 'OK', 'ACCEPTABLE', NULL, NULL, NULL, 'B', '42436', '', '', '42436', NULL),
(23, 'HuQas Provider', 'Gilgil Sub-District Hospital', '2nd Test Event 2016', 'Malaria', '2016-02-24', 'C', 'Malaria Parasite Detection and Identification ', NULL, NULL, 'Plasmodium falciparum', 'OK', 'NOT ACCEPTABLE', NULL, NULL, NULL, 'C', '42437', '', '', '42437', NULL),
(24, 'HuQas Provider', 'Gilgil Sub-District Hospital', '2nd Test Event 2016', 'Malaria', '2016-02-25', 'D', 'Malaria Parasite Detection and Identification ', NULL, NULL, 'Plasmodium falciparum', 'OK', 'ACCEPTABLE', NULL, NULL, NULL, 'D', '42438', '', '', '42438', NULL),
(25, 'HuQas Provider', 'Gilgil Sub-District Hospital', '2nd Test Event 2016', 'Malaria', '2016-02-26', 'E', 'Malaria Parasite Detection and Identification ', NULL, NULL, 'Plasmodium malariae', 'OK', 'NOT ACCEPTABLE', NULL, NULL, NULL, 'E', '42439', '', '', '42439', NULL),
(26, 'HuQas Provider', 'Kangema Sub County Hospital', '2nd Test Event 2016', 'Malaria', '2016-02-27', 'A', 'Malaria Parasite Detection and Identification ', NULL, NULL, 'Plasmodium malariae', 'OK', 'ACCEPTABLE', NULL, NULL, NULL, 'A', '42440', '', '', '42440', NULL),
(27, 'HuQas Provider', 'Kangema Sub County Hospital', '2nd Test Event 2016', 'Malaria', '2016-02-28', 'B', 'Malaria Parasite Detection and Identification ', NULL, NULL, 'No Parasite Seen', 'OK', 'ACCEPTABLE', NULL, NULL, NULL, 'B', '42441', '', '', '42441', NULL),
(28, 'HuQas Provider', 'Kangema Sub County Hospital', '2nd Test Event 2016', 'Malaria', '2016-02-29', 'C', 'Malaria Parasite Detection and Identification ', NULL, NULL, 'Plasmodium falciparum, Plasmodium malariae', 'OK', 'ACCEPTABLE', NULL, NULL, NULL, 'C', '42442', '', '', '42442', NULL),
(29, 'HuQas Provider', 'Kangema Sub County Hospital', '2nd Test Event 2016', 'Malaria', '2016-03-01', 'D', 'Malaria Parasite Detection and Identification ', NULL, NULL, 'Plasmodium falciparum', 'OK', 'ACCEPTABLE', NULL, NULL, NULL, 'D', '42443', '', '', '42443', NULL),
(30, 'HuQas Provider', 'Kangema Sub County Hospital', '2nd Test Event 2016', 'Malaria', '2016-03-02', 'E', 'Malaria Parasite Detection and Identification ', NULL, NULL, 'Plasmodium ovale', 'OK', 'ACCEPTABLE', NULL, NULL, NULL, 'E', '42444', '', '', '42444', NULL),
(31, 'Amref Provider', 'Coast Provincial General Hospital', '2nd Test Event 2016', 'Malaria', '2016-02-02', 'A', 'Malaria Parasite Detection and Identification ', NULL, NULL, 'No Parasite Seen', 'OK', 'NOT ACCEPTABLE', NULL, NULL, NULL, 'A', '42416', '', '', '42416', NULL),
(32, 'Amref Provider', 'Coast Provincial General Hospital', '2nd Test Event 2016', 'Malaria', '2016-02-03', 'B', 'Malaria Parasite Detection and Identification ', NULL, NULL, 'No Parasite Seen', 'OK', 'ACCEPTABLE', NULL, NULL, NULL, 'B', '42416', '', '', '42416', NULL),
(33, 'Amref Provider', 'Coast Provincial General Hospital', '2nd Test Event 2016', 'Malaria', '2016-02-04', 'C', 'Malaria Parasite Detection and Identification ', NULL, NULL, 'Plasmodium falciparum', 'OK', 'NOT ACCEPTABLE', NULL, NULL, NULL, 'C', '42417', '', '', '42417', NULL),
(34, 'Amref Provider', 'Coast Provincial General Hospital', '2nd Test Event 2016', 'Malaria', '2016-02-05', 'D', 'Malaria Parasite Detection and Identification ', NULL, NULL, 'Plasmodium falciparum', 'OK', 'ACCEPTABLE', NULL, NULL, NULL, 'D', '42418', '', '', '42418', NULL),
(35, 'Amref Provider', 'Coast Provincial General Hospital', '2nd Test Event 2016', 'Malaria', '2016-02-06', 'E', 'Malaria Parasite Detection and Identification ', NULL, NULL, 'Plasmodium ovale', 'OK', 'ACCEPTABLE', NULL, NULL, NULL, 'E', '42419', '', '', '42419', NULL),
(36, 'Amref Provider', 'Kangemi Health Center', '2nd Test Event 2016', 'Malaria', '2016-02-07', 'A', 'Malaria Parasite Detection and Identification ', NULL, NULL, 'No Parasite Seen', 'OK', 'NOT ACCEPTABLE', NULL, NULL, NULL, 'A', '42420', '', '', '42420', NULL),
(37, 'Amref Provider', 'Kangemi Health Center', '2nd Test Event 2016', 'Malaria', '2016-02-08', 'B', 'Malaria Parasite Detection and Identification ', NULL, NULL, 'No Parasite Seen', 'OK', 'ACCEPTABLE', NULL, NULL, NULL, 'B', '42421', '', '', '42421', NULL),
(38, 'Amref Provider', 'Kangemi Health Center', '2nd Test Event 2016', 'Malaria', '2016-02-09', 'C', 'Malaria Parasite Detection and Identification ', NULL, NULL, 'Plasmodium falciparum', 'OK', 'NOT ACCEPTABLE', NULL, NULL, NULL, 'C', '42422', '', '', '42422', NULL),
(39, 'Amref Provider', 'Kangemi Health Center', '2nd Test Event 2016', 'Malaria', '2016-02-10', 'D', 'Malaria Parasite Detection and Identification ', NULL, NULL, 'Plasmodium falciparum', 'OK', 'ACCEPTABLE', NULL, NULL, NULL, 'D', '42423', '', '', '42423', NULL),
(40, 'Amref Provider', 'Kangemi Health Center', '2nd Test Event 2016', 'Malaria', '2016-02-11', 'E', 'Malaria Parasite Detection and Identification ', NULL, NULL, 'Plasmodium ovale', 'OK', 'ACCEPTABLE', NULL, NULL, NULL, 'E', '42424', '', '', '42424', NULL),
(41, 'Amref Provider', 'Kenyatta National Hospital', '2nd Test Event 2016', 'Malaria', '2016-02-12', '5', 'Malaria Parasite Detection and Identification ', NULL, NULL, 'Plasmodium malariae', 'OK', 'ACCEPTABLE', NULL, NULL, NULL, 'A', '42425', '', '', '42425', NULL),
(42, 'Amref Provider', 'Kenyatta National Hospital', '2nd Test Event 2016', 'Malaria', '2016-02-13', 'B', 'Malaria Parasite Detection and Identification ', NULL, NULL, 'No Parasite Seen', 'OK', 'ACCEPTABLE', NULL, NULL, NULL, 'B', '42426', '', '', '42426', NULL),
(43, 'Amref Provider', 'Kenyatta National Hospital', '2nd Test Event 2016', 'Malaria', '2016-02-14', 'C', 'Malaria Parasite Detection and Identification ', NULL, NULL, 'Plasmodium falciparum, Plasmodium malariae', 'OK', 'ACCEPTABLE', NULL, NULL, NULL, 'C', '42427', '', '', '42427', NULL),
(44, 'Amref Provider', 'Kenyatta National Hospital', '2nd Test Event 2016', 'Malaria', '2016-02-15', 'D', 'Malaria Parasite Detection and Identification ', NULL, NULL, 'Plasmodium falciparum', 'OK', 'ACCEPTABLE', NULL, NULL, NULL, 'D', '42428', '', '', '42428', NULL),
(45, 'Amref Provider', 'Kenyatta National Hospital', '2nd Test Event 2016', 'Malaria', '2016-02-16', 'E', 'Malaria Parasite Detection and Identification ', NULL, NULL, 'Plasmodium ovale, Plasmodium vivax', 'OK', 'NOT ACCEPTABLE', NULL, NULL, NULL, 'E', '42429', '', '', '42429', NULL),
(46, 'Amref Provider', 'Kenyatta National Hospital- BTU', '2nd Test Event 2016', 'Malaria', '2016-02-17', 'A', 'Malaria Parasite Detection and Identification ', NULL, NULL, 'No Parasite Seen', 'OK', 'NOT ACCEPTABLE', NULL, NULL, NULL, 'A', '42430', '', '', '42430', NULL),
(47, 'Amref Provider', 'Kenyatta National Hospital- BTU', '2nd Test Event 2016', 'Malaria', '2016-02-18', 'B', 'Malaria Parasite Detection and Identification ', NULL, NULL, 'No Parasite Seen', 'OK', 'ACCEPTABLE', NULL, NULL, NULL, 'B', '42431', '', '', '42431', NULL),
(48, 'Amref Provider', 'Kenyatta National Hospital- BTU', '2nd Test Event 2016', 'Malaria', '2016-02-19', 'C', 'Malaria Parasite Detection and Identification ', NULL, NULL, 'Plasmodium vivax', 'OK', 'NOT ACCEPTABLE', NULL, NULL, NULL, 'C', '42432', '', '', '42432', NULL),
(49, 'Amref Provider', 'Kenyatta National Hospital- BTU', '2nd Test Event 2016', 'Malaria', '2016-02-20', 'D', 'Malaria Parasite Detection and Identification ', NULL, NULL, 'Plasmodium vivax', 'OK', 'NOT ACCEPTABLE', NULL, NULL, NULL, 'D', '42433', '', '', '42433', NULL),
(50, 'Amref Provider', 'Kenyatta National Hospital- BTU', '2nd Test Event 2016', 'Malaria', '2016-02-21', 'E', 'Malaria Parasite Detection and Identification ', NULL, NULL, 'Plasmodium ovale', 'OK', 'ACCEPTABLE', NULL, NULL, NULL, 'E', '42434', '', '', '42434', NULL),
(51, 'Amref Provider', 'Gilgil Sub-District Hospital', '2nd Test Event 2016', 'Malaria', '2016-02-22', 'A', 'Malaria Parasite Detection and Identification ', NULL, NULL, 'No Parasite Seen', 'OK', 'NOT ACCEPTABLE', NULL, NULL, NULL, 'A', '42435', '', '', '42435', NULL),
(52, 'Amref Provider', 'Gilgil Sub-District Hospital', '2nd Test Event 2016', 'Malaria', '2016-02-23', 'B', 'Malaria Parasite Detection and Identification ', NULL, NULL, 'No Parasite Seen', 'OK', 'ACCEPTABLE', NULL, NULL, NULL, 'B', '42436', '', '', '42436', NULL),
(53, 'Amref Provider', 'Gilgil Sub-District Hospital', '2nd Test Event 2016', 'Malaria', '2016-02-24', 'C', 'Malaria Parasite Detection and Identification ', NULL, NULL, 'Plasmodium falciparum', 'OK', 'NOT ACCEPTABLE', NULL, NULL, NULL, 'C', '42437', '', '', '42437', NULL),
(54, 'Amref Provider', 'Gilgil Sub-District Hospital', '2nd Test Event 2016', 'Malaria', '2016-02-25', 'D', 'Malaria Parasite Detection and Identification ', NULL, NULL, 'Plasmodium falciparum', 'OK', 'ACCEPTABLE', NULL, NULL, NULL, 'D', '42438', '', '', '42438', NULL),
(55, 'Amref Provider', 'Gilgil Sub-District Hospital', '2nd Test Event 2016', 'Malaria', '2016-02-26', 'E', 'Malaria Parasite Detection and Identification ', NULL, NULL, 'Plasmodium malariae', 'OK', 'NOT ACCEPTABLE', NULL, NULL, NULL, 'E', '42439', '', '', '42439', NULL),
(56, 'Amref Provider', 'Kangema Sub County Hospital', '2nd Test Event 2016', 'Malaria', '2016-02-27', 'A', 'Malaria Parasite Detection and Identification ', NULL, NULL, 'Plasmodium malariae', 'OK', 'ACCEPTABLE', NULL, NULL, NULL, 'A', '42440', '', '', '42440', NULL),
(57, 'Amref Provider', 'Kangema Sub County Hospital', '2nd Test Event 2016', 'Malaria', '2016-02-28', 'B', 'Malaria Parasite Detection and Identification ', NULL, NULL, 'No Parasite Seen', 'OK', 'ACCEPTABLE', NULL, NULL, NULL, 'B', '42441', '', '', '42441', NULL),
(58, 'Amref Provider', 'Kangema Sub County Hospital', '2nd Test Event 2016', 'Malaria', '2016-02-29', 'C', 'Malaria Parasite Detection and Identification ', NULL, NULL, 'Plasmodium falciparum, Plasmodium malariae', 'OK', 'ACCEPTABLE', NULL, NULL, NULL, 'C', '42442', '', '', '42442', NULL),
(59, 'Amref Provider', 'Kangema Sub County Hospital', '2nd Test Event 2016', 'Malaria', '2016-03-01', 'D', 'Malaria Parasite Detection and Identification ', NULL, NULL, 'Plasmodium falciparum', 'OK', 'ACCEPTABLE', NULL, NULL, NULL, 'D', '42443', '', '', '42443', NULL),
(60, 'Amref Provider', 'Kangema Sub County Hospital', '2nd Test Event 2016', 'Malaria', '2016-03-02', 'E', 'Malaria Parasite Detection and Identification ', NULL, NULL, 'Plasmodium ovale', 'OK', 'ACCEPTABLE', NULL, NULL, NULL, 'E', '42444', '', '', '42444', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `rep_testkits`
--

CREATE TABLE IF NOT EXISTS `rep_testkits` (
`ID` int(11) NOT NULL,
  `TestKitName` varchar(128) NOT NULL,
  `ProgramID` varchar(128) DEFAULT NULL,
  `ProviderID` varchar(128) DEFAULT NULL,
  `CreatedBy` varchar(50) DEFAULT NULL,
  `CreatedDate` datetime DEFAULT NULL
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Dumping data for table `rep_testkits`
--

INSERT INTO `rep_testkits` (`ID`, `TestKitName`, `ProgramID`, `ProviderID`, `CreatedBy`, `CreatedDate`) VALUES
(1, 'TestKit 1', 'Malaria', 'HuQas Provider', '1', '2016-12-08 10:12:36'),
(2, 'TestKit 2', 'Malaria', 'HuQas Provider', '1', '2016-12-08 10:14:54');

-- --------------------------------------------------------

--
-- Table structure for table `response_result_dbs`
--

CREATE TABLE IF NOT EXISTS `response_result_dbs` (
  `shipment_map_id` int(11) NOT NULL,
  `sample_id` int(11) NOT NULL,
  `eia_1` int(11) DEFAULT NULL,
  `lot_no_1` varchar(45) DEFAULT NULL,
  `exp_date_1` date DEFAULT NULL,
  `od_1` varchar(45) DEFAULT NULL,
  `cutoff_1` varchar(45) DEFAULT NULL,
  `eia_2` int(11) DEFAULT NULL,
  `lot_no_2` varchar(45) DEFAULT NULL,
  `exp_date_2` date DEFAULT NULL,
  `od_2` varchar(45) DEFAULT NULL,
  `cutoff_2` varchar(45) DEFAULT NULL,
  `eia_3` int(11) DEFAULT NULL,
  `lot_no_3` varchar(45) DEFAULT NULL,
  `exp_date_3` date DEFAULT NULL,
  `od_3` varchar(45) DEFAULT NULL,
  `cutoff_3` varchar(45) DEFAULT NULL,
  `wb` int(11) DEFAULT NULL,
  `wb_lot` varchar(45) DEFAULT NULL,
  `wb_exp_date` date DEFAULT NULL,
  `wb_160` varchar(45) DEFAULT NULL,
  `wb_120` varchar(45) DEFAULT NULL,
  `wb_66` varchar(45) DEFAULT NULL,
  `wb_55` varchar(45) DEFAULT NULL,
  `wb_51` varchar(45) DEFAULT NULL,
  `wb_41` varchar(45) DEFAULT NULL,
  `wb_31` varchar(45) DEFAULT NULL,
  `wb_24` varchar(45) DEFAULT NULL,
  `wb_17` varchar(45) DEFAULT NULL,
  `reported_result` int(11) DEFAULT NULL,
  `calculated_score` varchar(45) DEFAULT NULL,
  `created_by` varchar(45) DEFAULT NULL,
  `created_on` datetime DEFAULT NULL,
  `updated_by` varchar(45) DEFAULT NULL,
  `updated_on` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `response_result_dts`
--

CREATE TABLE IF NOT EXISTS `response_result_dts` (
  `shipment_map_id` int(11) NOT NULL,
  `sample_id` int(11) NOT NULL,
  `test_kit_name_1` varchar(45) DEFAULT NULL,
  `lot_no_1` varchar(45) DEFAULT NULL,
  `exp_date_1` date DEFAULT NULL,
  `test_result_1` varchar(45) DEFAULT NULL,
  `test_kit_name_2` varchar(45) DEFAULT NULL,
  `lot_no_2` varchar(45) DEFAULT NULL,
  `exp_date_2` date DEFAULT NULL,
  `test_result_2` varchar(45) DEFAULT NULL,
  `test_kit_name_3` varchar(45) DEFAULT NULL,
  `lot_no_3` varchar(45) DEFAULT NULL,
  `exp_date_3` date DEFAULT NULL,
  `test_result_3` varchar(45) DEFAULT NULL,
  `reported_result` varchar(45) DEFAULT NULL,
  `calculated_score` varchar(45) DEFAULT NULL,
  `created_by` varchar(45) DEFAULT NULL,
  `created_on` datetime DEFAULT NULL,
  `updated_by` varchar(45) DEFAULT NULL,
  `updated_on` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `response_result_eid`
--

CREATE TABLE IF NOT EXISTS `response_result_eid` (
  `shipment_map_id` int(11) NOT NULL,
  `sample_id` varchar(45) NOT NULL,
  `reported_result` varchar(45) DEFAULT NULL,
  `hiv_ct_od` varchar(45) DEFAULT NULL,
  `ic_qs` varchar(45) DEFAULT NULL,
  `calculated_score` varchar(45) DEFAULT NULL,
  `created_by` varchar(45) DEFAULT NULL,
  `created_on` datetime DEFAULT NULL,
  `updated_by` varchar(45) DEFAULT NULL,
  `updated_on` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `response_result_vl`
--

CREATE TABLE IF NOT EXISTS `response_result_vl` (
  `shipment_map_id` int(11) NOT NULL,
  `sample_id` varchar(45) NOT NULL,
  `reported_viral_load` varchar(255) DEFAULT NULL,
  `calculated_score` varchar(45) DEFAULT NULL,
  `created_by` varchar(45) DEFAULT NULL,
  `created_on` datetime DEFAULT NULL,
  `updated_by` varchar(45) DEFAULT NULL,
  `updated_on` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `r_control`
--

CREATE TABLE IF NOT EXISTS `r_control` (
`control_id` int(11) NOT NULL,
  `control_name` varchar(255) DEFAULT NULL,
  `for_scheme` varchar(255) DEFAULT NULL,
  `is_active` varchar(45) DEFAULT NULL
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=10 ;

--
-- Dumping data for table `r_control`
--

INSERT INTO `r_control` (`control_id`, `control_name`, `for_scheme`, `is_active`) VALUES
(1, 'Kit Negative Control', 'eid', 'active'),
(2, 'Kit Positive Control', 'eid', 'active'),
(3, 'PT Provider Negative Control', 'eid', 'active'),
(4, 'PT Provider Positive Control', 'eid', 'active'),
(5, 'In-House Negative Control', 'eid', 'active'),
(6, 'In-House Positive Control	', 'eid', 'active'),
(7, 'Negative Control', 'vl', 'active'),
(8, 'Low Positive Control', 'vl', 'active'),
(9, 'High Positive Control', 'vl', 'active');

-- --------------------------------------------------------

--
-- Table structure for table `r_dbs_eia`
--

CREATE TABLE IF NOT EXISTS `r_dbs_eia` (
`eia_id` int(11) NOT NULL,
  `eia_name` varchar(500) NOT NULL
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=5 ;

--
-- Dumping data for table `r_dbs_eia`
--

INSERT INTO `r_dbs_eia` (`eia_id`, `eia_name`) VALUES
(1, 'EIA-01 BioRad Genetic Systems HIV 1/2 plus O'),
(2, 'EIA-02 bioMerieux Vironostika Uniform II plus O (3rd gen)'),
(3, 'EIA-03 bioMerieux Vironostika HIV Ag/Ab (4th gen)'),
(4, 'EIA-04 Murex HIV 1.2.0 (3rd gen)');

-- --------------------------------------------------------

--
-- Table structure for table `r_dbs_wb`
--

CREATE TABLE IF NOT EXISTS `r_dbs_wb` (
`wb_id` int(11) NOT NULL,
  `wb_name` varchar(500) NOT NULL
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=5 ;

--
-- Dumping data for table `r_dbs_wb`
--

INSERT INTO `r_dbs_wb` (`wb_id`, `wb_name`) VALUES
(1, 'WB-01 BioRad GS HIV- 1 Western Blot'),
(2, 'WB-02 Cambridge Biotech HIV-1 Western Blot'),
(3, 'WB-03 BioRad LAV Blot I '),
(4, 'WB-04 Genelab Diagnostics HIV Blot kit');

-- --------------------------------------------------------

--
-- Table structure for table `r_dts_corrective_actions`
--

CREATE TABLE IF NOT EXISTS `r_dts_corrective_actions` (
`action_id` int(11) NOT NULL,
  `corrective_action` text NOT NULL,
  `description` text NOT NULL
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=18 ;

--
-- Dumping data for table `r_dts_corrective_actions`
--

INSERT INTO `r_dts_corrective_actions` (`action_id`, `corrective_action`, `description`) VALUES
(1, 'Please submit response before last date', 'Late response, response not evaluated. Your response received after last date. Expected result for PT panel will be available for your reference. '),
(2, 'Review and refer to SOP for testing. Sample should be tested per National HIV Testing algorithm. ', 'For sample (1/2/3?) National HIV Testing algorithm was not followed.'),
(3, 'Review all testing procedures prior to performing client testing as reported result does not match expected result.', 'Sample (1/2/3?) reported result does not match with expected result.'),
(4, 'You are required to test all samples in PT panel', 'Sample (1/2/3) was not reported '),
(5, 'Ensure expired test kit are not be used for testing. If test kits are not available, please contact your superior.', 'Test kit XYZ expired M days before the test date DD-MON-YYY.'),
(6, 'Ensure expiry date information is submitted for all performed tests.', 'Result not evaluated Ð test kit expiry date (first/second/third) is not reported with PT response.'),
(7, 'Ensure test kit name is reported for all performed tests.', 'Result not evaluated Ð name of test kit not reported.'),
(8, 'Please use the approved test kits according to the SOP/National HIV Testing algorithm for confirmatory and tie-breaker.', 'Testkit XYZ repeated for all 3 test kits'),
(9, 'Please use the approved test kits according to the SOP/National HIV Testing algorithm for confirmatory and tie-breaker.', 'Test kit repeated for confirmatory or tiebreaker test (T1/T2/T3).'),
(10, 'Ensure test kit lot number is reported for all performed tests. ', 'Result not evaluated Ð Test Kit lot number (first/second/third) is not reported.'),
(11, 'Ensure to provide supervisor approval along with his name.', 'Missing supervisor approval for reported result.'),
(12, 'Ensure to provide sample rehydration date', 'Re-hydration date missing in PT report form.'),
(13, 'Ensure to provide to provide panel testing date.', 'Testing date missing in PT report form.'),
(14, 'DTS Testing should be done within specified hours of rehydration as per SOP.', 'Testing is not performed within X to Y hours of rehydration.'),
(15, 'Review all testing procedures prior to performing client testing and contact your supervisor for improvement.', 'Participant did not meet the score criteria (Participant Score is 80 and Required Score is 95)'),
(16, 'Ensure to provide to provide panel receipt date. ', 'Panel receipt date missing in PT report form.'),
(17, 'Please test DTS sample as per National HIV Testing algorithm. Review and refer to SOP for testing.', 'For Test (1/2/3) testing is not performed with country approved test kit.');

-- --------------------------------------------------------

--
-- Table structure for table `r_eid_detection_assay`
--

CREATE TABLE IF NOT EXISTS `r_eid_detection_assay` (
`id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=7 ;

--
-- Dumping data for table `r_eid_detection_assay`
--

INSERT INTO `r_eid_detection_assay` (`id`, `name`) VALUES
(1, 'COBAS Ampliprep/Taqman HIV-1 Qual Test'),
(2, 'Roche - Amplicor HIV-1 Monitor Test'),
(3, 'QIAamp Viral Mini Kit (DNA or RNA)'),
(4, 'Biocentric - Generic'),
(5, 'Chelex'),
(6, 'In House');

-- --------------------------------------------------------

--
-- Table structure for table `r_eid_extraction_assay`
--

CREATE TABLE IF NOT EXISTS `r_eid_extraction_assay` (
`id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=7 ;

--
-- Dumping data for table `r_eid_extraction_assay`
--

INSERT INTO `r_eid_extraction_assay` (`id`, `name`) VALUES
(1, 'COBAS Ampliprep/Taqman HIV-1 Qual Test'),
(2, 'Roche - Amplicor HIV-1 Monitor Test'),
(3, 'QIAamp Viral Mini Kit (DNA or RNA)'),
(4, 'Biocentric - Generic'),
(5, 'Chelex'),
(6, 'In House');

-- --------------------------------------------------------

--
-- Table structure for table `r_enrolled_programs`
--

CREATE TABLE IF NOT EXISTS `r_enrolled_programs` (
`r_epid` int(11) NOT NULL,
  `enrolled_programs` varchar(255) DEFAULT NULL
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Dumping data for table `r_enrolled_programs`
--

INSERT INTO `r_enrolled_programs` (`r_epid`, `enrolled_programs`) VALUES
(1, 'PEPFAR RTQI Program'),
(2, 'PEPFAR');

-- --------------------------------------------------------

--
-- Table structure for table `r_evaluation_comments`
--

CREATE TABLE IF NOT EXISTS `r_evaluation_comments` (
`comment_id` int(11) NOT NULL,
  `scheme` varchar(255) NOT NULL,
  `comment` text NOT NULL
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=9 ;

--
-- Dumping data for table `r_evaluation_comments`
--

INSERT INTO `r_evaluation_comments` (`comment_id`, `scheme`, `comment`) VALUES
(1, 'dts', 'Mandatory Samples not reported'),
(2, 'dts', 'Minimum score not reached'),
(3, 'eid', 'Controls were not reported'),
(4, 'eid', 'Unsatisfactory score'),
(5, 'vl', 'There were not enough responses for the VL Assay chosen'),
(6, 'vl', 'Some mandatory samples were not reported'),
(7, 'dbs', 'Some Mandatory samples were not reported'),
(8, '', 'Did not meet the minimum score required');

-- --------------------------------------------------------

--
-- Table structure for table `r_modes_of_receipt`
--

CREATE TABLE IF NOT EXISTS `r_modes_of_receipt` (
`mode_id` int(11) NOT NULL,
  `mode_name` varchar(255) DEFAULT NULL
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=6 ;

--
-- Dumping data for table `r_modes_of_receipt`
--

INSERT INTO `r_modes_of_receipt` (`mode_id`, `mode_name`) VALUES
(1, 'Courier'),
(2, 'Email'),
(3, 'Scan'),
(4, 'SMS'),
(5, 'Online Response');

-- --------------------------------------------------------

--
-- Table structure for table `r_network_tiers`
--

CREATE TABLE IF NOT EXISTS `r_network_tiers` (
`network_id` int(11) NOT NULL,
  `network_name` varchar(255) DEFAULT NULL
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=4 ;

--
-- Dumping data for table `r_network_tiers`
--

INSERT INTO `r_network_tiers` (`network_id`, `network_name`) VALUES
(1, 'Primary care laboratory service tier'),
(2, 'Secondary and tertiary laboratory service tiers'),
(3, 'Public Health Reference Laboratories');

-- --------------------------------------------------------

--
-- Table structure for table `r_participant_affiliates`
--

CREATE TABLE IF NOT EXISTS `r_participant_affiliates` (
`aff_id` int(11) NOT NULL,
  `affiliate` varchar(255) NOT NULL
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=5 ;

--
-- Dumping data for table `r_participant_affiliates`
--

INSERT INTO `r_participant_affiliates` (`aff_id`, `affiliate`) VALUES
(1, 'PMTCT'),
(2, 'VCT'),
(3, 'Mobile VCT'),
(4, 'Hospital');

-- --------------------------------------------------------

--
-- Table structure for table `r_possibleresult`
--

CREATE TABLE IF NOT EXISTS `r_possibleresult` (
`id` int(11) NOT NULL,
  `scheme_id` varchar(45) NOT NULL,
  `scheme_sub_group` varchar(45) DEFAULT NULL,
  `response` varchar(45) DEFAULT NULL
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=14 ;

--
-- Dumping data for table `r_possibleresult`
--

INSERT INTO `r_possibleresult` (`id`, `scheme_id`, `scheme_sub_group`, `response`) VALUES
(1, 'dts', 'DTS_TEST', 'REACTIVE'),
(2, 'dts', 'DTS_TEST', 'NONREACTIVE'),
(3, 'dts', 'DTS_TEST', 'INVALID'),
(4, 'dts', 'DTS_FINAL', 'POSITIVE'),
(5, 'dts', 'DTS_FINAL', 'NEGATIVE'),
(6, 'dts', 'DTS_FINAL', 'INDETERMINATE'),
(7, 'eid', 'EID_FINAL', 'Positive (HIV Detected)'),
(8, 'eid', 'EID_FINAL', 'Negative (HIV Not Detected)'),
(9, 'eid', 'EID_FINAL', 'Equivocal'),
(10, 'dbs', 'DBS_FINAL', 'P'),
(11, 'dbs', 'DBS_FINAL', 'N'),
(12, 'dts', 'DTS_FINAL', 'Not Tested'),
(13, 'dts', 'DTS_FINAL', 'NOT TESTED');

-- --------------------------------------------------------

--
-- Table structure for table `r_results`
--

CREATE TABLE IF NOT EXISTS `r_results` (
`result_id` int(11) NOT NULL,
  `result_name` varchar(255) NOT NULL
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=4 ;

--
-- Dumping data for table `r_results`
--

INSERT INTO `r_results` (`result_id`, `result_name`) VALUES
(1, 'Pass'),
(2, 'Fail'),
(3, 'Excluded');

-- --------------------------------------------------------

--
-- Table structure for table `r_site_type`
--

CREATE TABLE IF NOT EXISTS `r_site_type` (
`r_stid` int(11) NOT NULL,
  `site_type` varchar(255) DEFAULT NULL
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=13 ;

--
-- Dumping data for table `r_site_type`
--

INSERT INTO `r_site_type` (`r_stid`, `site_type`) VALUES
(1, 'VCT'),
(2, 'Mobile VCT'),
(3, 'TB Center'),
(4, 'Antenatal Clinic (PMTCT)'),
(5, 'Outpatient Clinic'),
(6, 'Hospital'),
(7, 'Laboratory'),
(8, 'District'),
(9, 'Province'),
(10, 'Region'),
(11, 'Department'),
(12, 'Other');

-- --------------------------------------------------------

--
-- Table structure for table `r_testkitname_dts`
--

CREATE TABLE IF NOT EXISTS `r_testkitname_dts` (
  `TestKitName_ID` varchar(50) NOT NULL,
  `scheme_type` varchar(255) NOT NULL,
  `TestKit_Name` varchar(100) DEFAULT NULL,
  `TestKit_Name_Short` varchar(50) DEFAULT NULL,
  `TestKit_Comments` varchar(50) DEFAULT NULL,
  `Updated_On` datetime DEFAULT NULL,
  `Updated_By` int(11) DEFAULT NULL,
  `Installation_id` varchar(50) DEFAULT NULL,
  `TestKit_Manufacturer` varchar(50) DEFAULT NULL,
  `Created_On` datetime DEFAULT NULL,
  `Created_By` int(11) DEFAULT NULL,
  `Approval` int(1) DEFAULT '1' COMMENT '1 = Approved , 0 not approved.',
  `TestKit_ApprovalAgency` varchar(20) DEFAULT NULL COMMENT 'USAID, FDA, LOCAL',
  `source_reference` varchar(50) DEFAULT NULL,
  `CountryAdapted` int(11) DEFAULT NULL COMMENT '0= Not allowed in the country 1 = approved in country ',
  `testkit_1` int(11) NOT NULL DEFAULT '0',
  `testkit_2` int(11) NOT NULL DEFAULT '0',
  `testkit_3` int(11) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `r_testkitname_dts`
--

INSERT INTO `r_testkitname_dts` (`TestKitName_ID`, `scheme_type`, `TestKit_Name`, `TestKit_Name_Short`, `TestKit_Comments`, `Updated_On`, `Updated_By`, `Installation_id`, `TestKit_Manufacturer`, `Created_On`, `Created_By`, `Approval`, `TestKit_ApprovalAgency`, `source_reference`, `CountryAdapted`, `testkit_1`, `testkit_2`, `testkit_3`) VALUES
('tk245A0egsg03q6', '', 'Advanced Quality', NULL, NULL, NULL, NULL, NULL, NULL, '2015-09-08 07:58:54', NULL, 0, NULL, NULL, NULL, 0, 0, 0),
('tk50f41f66a2388', 'dts', 'ACON HIV 1/2/0 Tri-line', 'ACON HIV 1/2/0 Tri', NULL, '2013-01-14 10:09:21', 0, '0', ' Alere', '2012-06-06 11:53:26', 0, 1, 'USAID', 'USAID Approval List March 30, 2012', 1, 1, 0, 1),
('tk50f41f66a238f', 'dts', 'Alere Determine HIV-1/2', 'Alere Determine HIV-1/2', NULL, '2013-01-14 10:09:21', 0, '0', ' Alere/Abbott Laboratories', '2012-06-06 11:53:26', 0, 1, 'USAID', 'USAID Approval List March 30, 2012', 1, 1, 1, 1),
('tk50f41f66a2399', 'dts', 'Aware HIV-1/2 BSP', 'Aware HIV-1/2 BSP', NULL, '2013-01-14 10:09:21', 0, '0', ' Calypte Biomedical ', '2012-06-06 11:53:26', 0, 1, 'USAID', 'USAID Approval List March 30, 2012', 1, 1, 0, 1),
('tk50f41f66a239e', 'dts', 'Bionor HIV-1&2', 'Bionor HIV-1&2', NULL, '2013-01-14 10:09:21', 0, '0', ' Bionor A/S ', '2012-06-06 11:53:26', 0, 1, 'USAID', 'USAID Approval List March 30, 2012', 1, 1, 0, 1),
('tk50f41f66a23a7', 'dts', 'Calypte Aware HIV-1/2 OMT ', 'Calypte Aware HIV-', NULL, '2013-01-14 10:09:21', 0, '0', ' Calypte Biomedical Corp.', '2012-06-06 11:53:26', 0, 1, 'USAID', 'USAID Approval List March 30, 2012', 1, 1, 0, 1),
('tk50f41f66a23b1', 'dts', 'Care Start HIV 1-2-O', 'Care Start HIV 1-2', NULL, '2013-01-14 10:09:21', 0, '0', ' Access Bio, Inc.', '2012-06-06 11:53:26', 0, 1, 'USAID', 'USAID Approval List March 30, 2012', 1, 1, 0, 1),
('tk50f41f66a23b5', 'dts', 'ClearviewÃ‚Â® COMPLETE HIV1/2 (formerly SURE) CHECKÃ‚Â® HIV1/2)', 'ClearviewÃ‚Â® COMPLETE HIV1/2 Non - US Labeling', NULL, '2013-01-14 10:09:21', 0, '0', ' Alere', '2012-06-06 11:53:26', 0, 1, 'USAID', 'USAID Approval List March 30, 2012', 1, 1, 0, 1),
('tk50f41f66a23ba', 'dts', 'ClearviewÃ‚Â® COMPLETE HIV1/2 - US labeling** (formerly SURE CHECKÃ‚Â® HIV1/2)', 'ClearviewÃ‚Â® COMPLETE HIV1/2 - US labeling ', NULL, '2013-01-14 10:09:21', 0, '0', ' Alere', '2012-06-06 11:53:26', 0, 1, 'FDA', 'USAID Approval List March 30, 2012', 1, 1, 0, 1),
('tk50f41f66a23bf', 'dts', 'Clearview  HIV 1/2 STAT-PAK Assay', 'Clearview  HIV 1/2', NULL, '2013-01-14 10:09:21', 0, '0', ' Alere', '2012-06-06 11:53:26', 0, 1, 'FDA', 'USAID Approval List March 30, 2012', 1, 1, 0, 1),
('tk50f41f66a23c4', 'dts', 'Combaids RS Advantage', 'Combaids RS Advant', NULL, '2013-01-14 10:09:21', 0, '0', ' Span Diagnostics Ltd.', '2012-06-06 11:53:26', 0, 1, 'USAID', 'USAID Approval List March 30, 2012', 1, 1, 0, 1),
('tk50f41f66a23c8', 'dts', 'DPP HIV 1/2 Screen ', 'DPP HIV 1/2 Screen', NULL, '2013-01-14 10:09:21', 0, '0', ' Chembio Diagnostic Systems, Inc', '2012-06-06 11:53:26', 0, 1, 'USAID', 'USAID Approval List March 30, 2012', 1, 1, 0, 1),
('tk50f41f66a23cd', 'dts', 'DPP HIV 1 / 2 Screen Assay  Oral Fluid, Whole Blood,Serum & Plasma', 'DPP HIV 1 / 2 Scre', NULL, '2013-01-14 10:09:21', 0, '0', ' Chembio Diagnostic Systems, Inc', '2012-06-06 11:53:26', 0, 1, 'USAID', 'USAID Approval List March 30, 2012', 1, 1, 0, 1),
('tk50f41f66a23d1', 'dts', 'Double Check HIV 1&2', 'Double Check HIV 1', NULL, '2013-01-14 10:09:21', 0, '0', ' Alere/ Orgenics, Ltd', '2012-06-06 11:53:26', 0, 1, 'USAID', 'USAID Approval List March 30, 2012', 1, 1, 0, 1),
('tk50f41f66a23d6', 'dts', 'Double Check Gold HIV1&2', 'Double Check Gold ', NULL, '2013-01-14 10:09:21', 0, '0', ' Alere/ Orgenics, Ltd', '2012-06-06 11:53:26', 0, 1, 'USAID', 'USAID Approval List March 30, 2012', 1, 1, 0, 1),
('tk50f41f66a23db', 'dts', 'EZ-TRUST Rapid Anti-HIV (1&2) Test', 'EZ-TRUST Rapid Ant', NULL, '2013-01-14 10:09:21', 0, '0', ' CS Innovation', '2012-06-06 11:53:26', 0, 1, 'USAID', 'USAID Approval List March 30, 2012', 1, 1, 0, 1),
('tk50f41f66a23df', 'dts', 'First Response HIV 1-2.0', 'First Response HIV', NULL, '2013-01-14 10:09:21', 0, '0', ' Premier Medical Corporation', '2012-06-06 11:53:26', 0, 1, 'USAID', 'USAID Approval List March 30, 2012', 1, 1, 1, 1),
('tk50f41f66a23e3', 'dts', 'Genie Fast HIV 1/2 ', 'Genie Fast HIV 1/2', NULL, '2013-01-14 10:09:21', 0, '0', ' Bio-Rad Laboratories', '2012-06-06 11:53:26', 0, 1, 'USAID', 'USAID Approval List March 30, 2012', 1, 1, 0, 1),
('tk50f41f66a23e8', 'dts', 'HIV 1/2 Gold Rapid Screen Test ', 'HIV 1/2 Gold Rapid', NULL, '2013-01-14 10:09:21', 0, '0', ' Medinostics IntÃ¢â‚¬â„¢l', '2012-06-06 11:53:26', 0, 1, 'USAID', 'USAID Approval List March 30, 2012', 1, 1, 0, 1),
('tk50f41f66a23ed', 'dts', 'HIV 1/2 Rapid Test Kit', 'HIV 1/2 Rapid Test', NULL, '2013-01-14 10:09:21', 0, '0', ' Medinostics IntÃ¢â‚¬â„¢l', '2012-06-06 11:53:26', 0, 1, 'USAID', 'USAID Approval List March 30, 2012', 1, 1, 0, 1),
('tk50f41f66a23f1', 'dts', 'HIV 1/ 2 STAT-PAK Assay', 'HIV 1/ 2 STAT-PAK ', NULL, '2013-01-14 10:09:21', 0, '0', ' Chembio Diagnostic Systems, Inc', '2012-06-06 11:53:26', 0, 1, 'USAID', 'USAID Approval List March 30, 2012', 1, 1, 0, 1),
('tk50f41f66a23f6', 'dts', 'HIV 1/2 STAT-PAK Dipstick Assay', 'HIV 1/2 STAT-PAK D', NULL, '2013-01-14 10:09:21', 0, '0', ' Chembio Diagnostic Systems, Inc', '2012-06-06 11:53:26', 0, 1, 'USAID', 'USAID Approval List March 30, 2012', 1, 1, 0, 1),
('tk50f41f66a23fa', 'dts', 'HIV(1+2) Rapid Test Strip', 'HIV(1+2) Rapid Tes', NULL, '2013-01-14 10:09:21', 0, '0', ' Shanghai Kehua Bio-engineering Co., Ltd (KHB)', '2012-06-06 11:53:26', 0, 1, 'USAID', 'USAID Approval List March 30, 2012', 1, 1, 0, 1),
('tk50f41f66a23ff', 'dts', 'HIVSav 1&2 Rapid SeroTest', 'HIVSav 1&2 Rapid S', NULL, '2013-01-14 10:09:21', 0, '0', ' Savyvon Diagnostics Ltd.', '2012-06-06 11:53:26', 0, 1, 'USAID', 'USAID Approval List March 30, 2012', 1, 1, 0, 1),
('tk50f41f66a2404', 'dts', 'iCARE Rapid Anti-HIV (1&2) ', 'iCARE Rapid Anti-H', NULL, '2013-01-14 10:09:21', 0, '0', ' JAL Innovation', '2012-06-06 11:53:26', 0, 1, 'USAID', 'USAID Approval List March 30, 2012', 1, 1, 0, 1),
('tk50f41f66a2408', 'dts', 'ImmunoComb HIV 1&2', 'ImmunoComb HIV 1&2', NULL, '2013-01-14 10:09:21', 0, '0', ' Alere/ Orgenics, Ltd', '2012-06-06 11:53:26', 0, 1, 'USAID', 'USAID Approval List March 30, 2012', 1, 1, 0, 1),
('tk50f41f66a240d', 'dts', 'InstantCHEK HIV1+2', 'InstantCHEK HIV1+2', NULL, '2013-01-14 10:09:21', 0, '0', ' EY Laboratories', '2012-06-06 11:53:26', 0, 1, 'USAID', 'USAID Approval List March 30, 2012', 1, 1, 0, 1),
('tk50f41f66a2411', 'dts', 'KSII  HIV 1/2 Rapid Diagnostic Test Kit ', 'KSII  HIV 1/2 Rapi', NULL, '2013-01-14 10:09:21', 0, '0', ' K. Shorehill Int''l, Inc.', '2012-06-06 11:53:26', 0, 1, 'USAID', 'USAID Approval List March 30, 2012', 1, 1, 0, 1),
('tk50f41f66a2415', 'dts', 'MPI Diagnostics Anti-HIV (1&2) Test ', 'MPI Diagnostics An', NULL, '2013-01-14 10:09:21', 0, '0', ' MPI Diagnostics', '2012-06-06 11:53:26', 0, 1, 'USAID', 'USAID Approval List March 30, 2012', 1, 1, 0, 1),
('tk50f41f66a241a', 'dts', 'INSTI HIV Antibody', 'INSTI HIV Antibody', NULL, '2013-01-14 10:09:21', 0, '0', ' Biolytical Laboratories', '2012-06-06 11:53:26', 0, 1, 'USAID', 'USAID Approval List March 30, 2012', 1, 1, 0, 1),
('tk50f41f66a241f', 'dts', 'Multispot HIV-1/HIV-2', 'Multispot HIV-1/HI', NULL, '2013-01-14 10:09:21', 0, '0', ' Bio-Rad laboratories', '2012-06-06 11:53:26', 0, 1, 'FDA', 'USAID Approval List March 30, 2012', 1, 1, 0, 1),
('tk50f41f66a2423', 'dts', 'OraQuick ADVANCE Rapid HIV-1/2', 'OraQuick ADVANCE R', NULL, '2013-01-14 10:09:21', 0, '0', ' OraSure Technologies', '2012-06-06 11:53:26', 0, 1, 'FDA', 'USAID Approval List March 30, 2012', 1, 1, 1, 1),
('tk50f41f66a2428', 'dts', 'OraQuick HIV-1/2 Rapid Antibody Test', 'OraQuick HIV-1/2 R', NULL, '2013-01-14 10:09:21', 0, '0', ' OraSure Technologies', '2012-06-06 11:53:26', 0, 1, 'USAID', 'USAID Approval List March 30, 2012', 1, 1, 1, 1),
('tk50f41f66a242c', 'dts', 'RAPID 1-2-3 HEMA Dipstick', 'RAPID 1-2-3 HEMA D', NULL, '2013-01-14 10:09:21', 0, '0', ' Hema Diagnostics Systems', '2012-06-06 11:53:26', 0, 1, 'USAID', 'USAID Approval List March 30, 2012', 1, 1, 0, 1),
('tk50f41f66a2430', 'dts', 'RAPID 1-2-3 HEMA EZ ', 'RAPID 1-2-3 HEMA E', NULL, '2013-01-14 10:09:21', 0, '0', ' Hema Diagnostics Systems', '2012-06-06 11:53:26', 0, 1, 'USAID', 'USAID Approval List March 30, 2012', 1, 1, 0, 1),
('tk50f41f66a2435', 'dts', 'RAPID 1-2-3 HEMA EXPRESS', 'RAPID 1-2-3 HEMA E', NULL, '2013-01-14 10:09:21', 0, '0', ' Hema Diagnostics Systems', '2012-06-06 11:53:26', 0, 1, 'USAID', 'USAID Approval List March 30, 2012', 1, 1, 0, 1),
('tk50f41f66a2439', 'dts', 'Reveal Rapid HIV Test', 'Reveal Rapid HIV T', NULL, '2013-01-14 10:09:21', 0, '0', ' MedMira', '2012-06-06 11:53:26', 0, 1, 'USAID', 'USAID Approval List March 30, 2012', 1, 1, 0, 1),
('tk50f41f66a243e', 'dts', 'Reveal G3 Rapid HIV-1 Antibody Test', 'Reveal G3 Rapid HI', NULL, '2013-01-14 10:09:21', 0, '0', ' MedMira', '2012-06-06 11:53:26', 0, 1, 'FDA', 'USAID Approval List March 30, 2012', 1, 1, 0, 1),
('tk50f41f66a2443', 'dts', 'Signal HIV Rapid Test', 'Signal HIV Rapid T', NULL, '2013-01-14 10:09:21', 0, '0', ' Span Diagnostics Ltd.', '2012-06-06 11:53:26', 0, 1, 'USAID', 'USAID Approval List March 30, 2012', 1, 1, 0, 1),
('tk50f41f66a2447', 'dts', 'Uni-Gold HIV - USAID', 'Uni-Gold HIV -USAID', NULL, '2013-01-14 10:09:21', 0, '0', ' Trinity Biotech', '2012-06-06 11:53:26', 0, 1, 'USAID', 'USAID Approval List March 30, 2012', 1, 1, 0, 1),
('tk50f41f66a244b', 'dts', 'Uni-Gold Recombigen HIV - FDA', 'Uni-Gold Recombige - FDA', NULL, '2013-01-14 10:09:21', 0, '0', ' Trinity Biotech', '2012-06-06 11:53:26', 0, 1, 'FDA', 'USAID Approval List March 30, 2012', 1, 1, 0, 1),
('tk5136b425387a4', 'dts', 'First Own Test Kit', 'MyKitname', 'Comments', NULL, NULL, 'LOG4fabc8babf6eb', 'Oh', '2013-03-06 04:12:37', 0, 1, 'WHO and National', 'Yes', 1, 1, 0, 1),
('tk5137b608ac1d9', 'dts', 'Hexagon HIVI II', 'Hexagon', 'rwer', NULL, NULL, 'LOG4fabc8babf6eb', 'rewr', '2013-03-06 22:32:56', 0, 0, 'NA', 'Yes', 1, 1, 0, 1),
('tk51435b69f3b7e', 'dts', 'gdfg', 'gfdg', 'gfdg', NULL, NULL, '5132ceba8fafa', 'gfdg', '2013-03-15 18:33:29', 0, 1, 'NA', 'NA', 1, 1, 0, 1),
('tk514b50a81832c', 'dts', 'Test Kit New ', 'New ', 'dasd', NULL, NULL, '5132ceba8fafa', 'dsad', '2013-03-21 19:25:44', 0, 1, 'Other', 'Yes', 1, 1, 0, 1),
('tkHhd7y1xOFIOzl', '', 'bioline', NULL, NULL, NULL, NULL, NULL, NULL, '2015-09-08 07:58:52', NULL, 0, NULL, NULL, NULL, 0, 0, 0),
('tkHmogbQfQTpk6c', '', 'Abon', NULL, NULL, NULL, NULL, NULL, NULL, '2015-09-08 07:53:23', NULL, 0, NULL, NULL, NULL, 0, 0, 0),
('tkjbtACskirhDkM', '', 'Advance Quality', NULL, NULL, NULL, NULL, NULL, NULL, '2015-09-08 07:53:23', NULL, 0, NULL, NULL, NULL, 0, 0, 0),
('tkuEhwZIYiS7A1B', '', 'Determine', NULL, NULL, NULL, NULL, NULL, NULL, '2015-09-08 07:55:27', NULL, 0, NULL, NULL, NULL, 0, 0, 0);

-- --------------------------------------------------------

--
-- Table structure for table `r_vl_assay`
--

CREATE TABLE IF NOT EXISTS `r_vl_assay` (
`id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `short_name` varchar(255) NOT NULL
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=7 ;

--
-- Dumping data for table `r_vl_assay`
--

INSERT INTO `r_vl_assay` (`id`, `name`, `short_name`) VALUES
(1, 'Abbott - RealTime ', 'Abbott'),
(2, 'Roche - COBAS Ampliprep/TaqMan', 'Cobas'),
(3, 'Biocentric - Generic HIV Charge Virale', 'Biocentric'),
(4, 'Biomerieux - NucliSENS', 'Biomerieux'),
(5, 'Roche - Amplicor', 'Amplicor'),
(6, 'Other', 'Other');

-- --------------------------------------------------------

--
-- Table structure for table `scheme_list`
--

CREATE TABLE IF NOT EXISTS `scheme_list` (
  `scheme_id` varchar(10) NOT NULL,
  `scheme_name` varchar(255) NOT NULL,
  `response_table` varchar(45) DEFAULT NULL,
  `reference_result_table` varchar(45) DEFAULT NULL,
  `attribute_list` varchar(255) DEFAULT NULL,
  `status` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `scheme_list`
--

INSERT INTO `scheme_list` (`scheme_id`, `scheme_name`, `response_table`, `reference_result_table`, `attribute_list`, `status`) VALUES
('dbs', 'Dried Blood Spot - HIV Serology', 'response_result_dbs', 'reference_result_dbs', NULL, 'inactive'),
('dts', 'Dried Tube Specimen - HIV Serology', 'response_result_dts', 'reference_result_dts', NULL, 'active'),
('eid', 'Dried Blood Spot - Early Infant Diagnosis', 'response_result_eid', 'reference_result_eid', NULL, 'inactive'),
('tb', 'Dried Tube Specimen - Tuberculosis', 'response_result_tb', 'reference_result_tb', NULL, 'active'),
('vl', 'Dried Tube Specimen - HIV Viral Load', 'response_result_vl', 'reference_result_vl', NULL, 'inactive');

-- --------------------------------------------------------

--
-- Table structure for table `shipment`
--

CREATE TABLE IF NOT EXISTS `shipment` (
`shipment_id` int(11) NOT NULL,
  `shipment_code` varchar(255) NOT NULL,
  `scheme_type` varchar(10) DEFAULT NULL,
  `shipment_date` date DEFAULT NULL,
  `lastdate_response` date DEFAULT NULL,
  `distribution_id` int(11) NOT NULL,
  `number_of_samples` int(11) DEFAULT NULL,
  `number_of_controls` int(11) NOT NULL,
  `response_switch` varchar(255) NOT NULL DEFAULT 'off',
  `max_score` int(11) DEFAULT NULL,
  `average_score` varchar(255) DEFAULT '0',
  `shipment_comment` text,
  `created_by_admin` varchar(255) DEFAULT NULL,
  `created_on_admin` datetime DEFAULT NULL,
  `updated_by_admin` varchar(255) DEFAULT NULL,
  `updated_on_admin` datetime DEFAULT NULL,
  `status` varchar(255) NOT NULL DEFAULT 'pending'
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `shipment_participant_map`
--

CREATE TABLE IF NOT EXISTS `shipment_participant_map` (
`map_id` int(11) NOT NULL,
  `shipment_id` int(11) NOT NULL,
  `participant_id` int(11) NOT NULL,
  `attributes` mediumtext,
  `evaluation_status` varchar(10) DEFAULT NULL COMMENT 'Shipment Status					\nUse this to flag - 					\nABCDEFG					',
  `shipment_score` decimal(5,2) DEFAULT NULL,
  `documentation_score` decimal(5,2) DEFAULT '0.00',
  `shipment_test_date` date DEFAULT '0000-00-00',
  `shipment_receipt_date` date DEFAULT NULL,
  `shipment_test_report_date` datetime DEFAULT NULL,
  `participant_supervisor` varchar(45) DEFAULT NULL,
  `supervisor_approval` varchar(45) DEFAULT NULL,
  `review_date` date DEFAULT NULL,
  `final_result` int(11) DEFAULT '0',
  `failure_reason` text,
  `evaluation_comment` int(11) DEFAULT '0',
  `optional_eval_comment` text,
  `is_followup` varchar(255) DEFAULT 'no',
  `is_excluded` varchar(255) NOT NULL DEFAULT 'no',
  `user_comment` varchar(90) DEFAULT NULL,
  `custom_field_1` text,
  `custom_field_2` text,
  `created_on_admin` datetime DEFAULT NULL,
  `updated_on_admin` datetime DEFAULT NULL,
  `updated_by_admin` varchar(45) DEFAULT NULL,
  `updated_on_user` datetime DEFAULT NULL,
  `updated_by_user` varchar(45) DEFAULT NULL,
  `created_by_admin` varchar(45) DEFAULT NULL,
  `created_on_user` datetime DEFAULT NULL,
  `report_generated` varchar(100) DEFAULT NULL,
  `last_new_shipment_mailed_on` datetime DEFAULT NULL,
  `new_shipment_mail_count` int(11) NOT NULL DEFAULT '0',
  `last_not_participated_mailed_on` datetime DEFAULT NULL,
  `last_not_participated_mail_count` int(11) NOT NULL DEFAULT '0',
  `qc_date` date DEFAULT NULL,
  `qc_done_by` int(11) DEFAULT NULL,
  `qc_created_on` datetime DEFAULT NULL,
  `mode_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COMMENT='Shipment for DTS Samples' AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `system_admin`
--

CREATE TABLE IF NOT EXISTS `system_admin` (
`admin_id` int(11) NOT NULL,
  `first_name` varchar(255) DEFAULT NULL,
  `last_name` varchar(255) DEFAULT NULL,
  `primary_email` varchar(255) DEFAULT NULL,
  `password` varchar(255) DEFAULT NULL,
  `secondary_email` varchar(255) DEFAULT NULL,
  `phone` varchar(255) DEFAULT NULL,
  `force_password_reset` int(11) DEFAULT NULL,
  `IsProvider` int(11) DEFAULT NULL,
  `status` varchar(255) DEFAULT 'inactive',
  `created_on` datetime DEFAULT NULL,
  `created_by` varchar(255) DEFAULT NULL,
  `updated_on` datetime DEFAULT NULL,
  `updated_by` varchar(255) DEFAULT NULL,
  `ProviderName` varchar(100) DEFAULT NULL
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=12 ;

--
-- Dumping data for table `system_admin`
--

INSERT INTO `system_admin` (`admin_id`, `first_name`, `last_name`, `primary_email`, `password`, `secondary_email`, `phone`, `force_password_reset`, `IsProvider`, `status`, `created_on`, `created_by`, `updated_on`, `updated_by`, `ProviderName`) VALUES
(1, 'Manager', 'Test', 'eptmanager@gmail.com', '123', '', '9841462565', 1, 0, 'active', NULL, NULL, '2015-03-04 10:56:43', '1', NULL),
(6, 'Demo ', 'Admin', 'demoadmin@gmail.com', 'demopassword#1', 'demo@gmail.com', '12121212', 1, 0, 'active', '2015-09-08 06:21:31', '1', '2015-10-07 01:21:02', '1', NULL),
(7, 'Brian Vidolo', 'Brian Vidolo', 'brianonyi@gmail.com', 'Boblacaster1988@', 'brianonyi@gmail.com', '0722339993', 0, 1, 'active', '2016-12-14 09:41:12', '1', NULL, NULL, 'Amref Provider'),
(10, 'Brian Vidolo', 'Brian Vidolo', 'bvidolo@abnosoftwares.co.ke', 'Boblacaster1988@', 'bvidolo@abnosoftwares.co.ke', '0722339993', 0, 1, 'active', '2016-12-16 12:27:50', '1', NULL, NULL, 'Micro Provider'),
(11, 'Brian Kamau', 'Brian Kamau', 'dkamau@abnosoftwares.co.ke', NULL, 'dkamau@abnosoftwares.co.ke', '23829380', 0, 1, 'active', '2017-01-18 11:38:02', '1', NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_bac_panel_mst`
--

CREATE TABLE IF NOT EXISTS `tbl_bac_panel_mst` (
`id` int(11) NOT NULL,
  `panelName` varchar(45) NOT NULL,
  `panelType` varchar(45) DEFAULT NULL,
  `dateDelivered` date DEFAULT NULL,
  `panelLabel` varchar(45) DEFAULT NULL,
  `panelDateOfDelivery` date DEFAULT NULL,
  `panelDatePrepared` date DEFAULT NULL,
  `status` varchar(45) DEFAULT '1',
  `dateCreated` datetime DEFAULT NULL,
  `totalSamples` int(11) DEFAULT '0',
  `numberOfSamples` int(11) DEFAULT NULL,
  `preparedBy` varchar(45) DEFAULT NULL,
  `panelStatus` varchar(45) DEFAULT '0',
  `shipmentNumber` int(11) DEFAULT NULL
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 COMMENT='Host panels names without the samples attached to them' AUTO_INCREMENT=41 ;

--
-- Dumping data for table `tbl_bac_panel_mst`
--

INSERT INTO `tbl_bac_panel_mst` (`id`, `panelName`, `panelType`, `dateDelivered`, `panelLabel`, `panelDateOfDelivery`, `panelDatePrepared`, `status`, `dateCreated`, `totalSamples`, `numberOfSamples`, `preparedBy`, `panelStatus`, `shipmentNumber`) VALUES
(40, 'uoui', 'uiui', NULL, 'ioio', '2017-01-10', '2017-01-17', '1', NULL, 0, 90, NULL, '0', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_bac_samples`
--

CREATE TABLE IF NOT EXISTS `tbl_bac_samples` (
`id` int(11) NOT NULL,
  `batchName` varchar(45) DEFAULT NULL,
  `datePrepared` date DEFAULT NULL,
  `manOrigin` varchar(45) DEFAULT NULL,
  `bloodPackNo` varchar(45) DEFAULT NULL,
  `expiryDate` date DEFAULT NULL,
  `preparedBy` varchar(45) DEFAULT NULL,
  `materialOrigin` varchar(45) DEFAULT NULL,
  `materialType` varchar(45) DEFAULT NULL,
  `status` int(11) DEFAULT '1',
  `dateCreated` varchar(45) DEFAULT 'NOW()',
  `expiryStatus` varchar(45) DEFAULT '0',
  `collectionDate` date DEFAULT NULL,
  `dispatchable` varchar(45) DEFAULT '1',
  `preparedAt` varchar(105) DEFAULT NULL,
  `lifespan` varchar(45) DEFAULT NULL,
  `originExtraInfo` varchar(100) DEFAULT NULL
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=13 ;

--
-- Dumping data for table `tbl_bac_samples`
--

INSERT INTO `tbl_bac_samples` (`id`, `batchName`, `datePrepared`, `manOrigin`, `bloodPackNo`, `expiryDate`, `preparedBy`, `materialOrigin`, `materialType`, `status`, `dateCreated`, `expiryStatus`, `collectionDate`, `dispatchable`, `preparedAt`, `lifespan`, `originExtraInfo`) VALUES
(12, 'SSDF', NULL, NULL, 'WER', NULL, 'SDFSDF', 'NPHL', 'SDF', 1, 'WER', '0', NULL, '1', 'WER', '3', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_bac_sample_to_panel`
--

CREATE TABLE IF NOT EXISTS `tbl_bac_sample_to_panel` (
`id` int(11) NOT NULL,
  `sampleId` int(11) DEFAULT NULL,
  `panelId` varchar(45) DEFAULT NULL,
  `createdBy` varchar(45) DEFAULT NULL,
  `datecreated` datetime DEFAULT NULL,
  `status` varchar(45) DEFAULT '1',
  `deliveryStatus` varchar(45) DEFAULT NULL,
  `deliveryCondition` varchar(45) DEFAULT NULL,
  `comments` varchar(45) DEFAULT NULL
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=19 ;

--
-- Dumping data for table `tbl_bac_sample_to_panel`
--

INSERT INTO `tbl_bac_sample_to_panel` (`id`, `sampleId`, `panelId`, `createdBy`, `datecreated`, `status`, `deliveryStatus`, `deliveryCondition`, `comments`) VALUES
(17, 12, '40', NULL, NULL, '1', NULL, NULL, NULL),
(18, 12, '40', NULL, NULL, '1', NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_bac_shipments`
--

CREATE TABLE IF NOT EXISTS `tbl_bac_shipments` (
`id` int(11) NOT NULL,
  `shipmentName` varchar(45) DEFAULT NULL,
  `dateCreated` varchar(45) DEFAULT 'curdate()',
  `status` int(11) DEFAULT '1',
  `numberOfSamples` int(11) DEFAULT NULL,
  `numberOfPanels` varchar(45) DEFAULT NULL,
  `courier` varchar(45) DEFAULT NULL,
  `deliveryStatus` varchar(45) DEFAULT NULL,
  `dateDelivered` date DEFAULT NULL,
  `receivedBy` varchar(45) DEFAULT NULL,
  `createdBy` varchar(45) DEFAULT NULL,
  `dispatchedBy` varchar(45) DEFAULT NULL,
  `shipmentDsc` varchar(100) DEFAULT NULL,
  `conditionDispatch` varchar(45) DEFAULT NULL,
  `conditionReceived` varchar(45) DEFAULT NULL,
  `receivingComments` varchar(45) DEFAULT NULL,
  `shipmentLabel` varchar(100) DEFAULT NULL,
  `roundId` int(11) DEFAULT NULL,
  `datePrepared` date DEFAULT NULL,
  `preparedBy` varchar(45) DEFAULT NULL,
  `shipmentStatus` varchar(45) DEFAULT '0'
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=4 ;

--
-- Dumping data for table `tbl_bac_shipments`
--

INSERT INTO `tbl_bac_shipments` (`id`, `shipmentName`, `dateCreated`, `status`, `numberOfSamples`, `numberOfPanels`, `courier`, `deliveryStatus`, `dateDelivered`, `receivedBy`, `createdBy`, `dispatchedBy`, `shipmentDsc`, `conditionDispatch`, `conditionReceived`, `receivingComments`, `shipmentLabel`, `roundId`, `datePrepared`, `preparedBy`, `shipmentStatus`) VALUES
(3, 'ewr', 'curdate()', 1, NULL, '45', 'wer', NULL, NULL, NULL, NULL, NULL, 'wer', NULL, NULL, NULL, 'wer', 0, '2017-01-08', 'wer', '0');

-- --------------------------------------------------------

--
-- Table structure for table `temp_mail`
--

CREATE TABLE IF NOT EXISTS `temp_mail` (
`temp_id` int(11) NOT NULL,
  `message` text,
  `from_mail` varchar(255) DEFAULT NULL,
  `to_email` varchar(255) NOT NULL,
  `bcc` text,
  `cc` text,
  `subject` text,
  `from_full_name` varchar(255) DEFAULT NULL,
  `status` varchar(255) NOT NULL DEFAULT 'pending'
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `contact_us`
--
ALTER TABLE `contact_us`
 ADD PRIMARY KEY (`contact_id`);

--
-- Indexes for table `countries`
--
ALTER TABLE `countries`
 ADD PRIMARY KEY (`id`), ADD UNIQUE KEY `id` (`id`);

--
-- Indexes for table `data_manager`
--
ALTER TABLE `data_manager`
 ADD PRIMARY KEY (`dm_id`), ADD UNIQUE KEY `primary_email` (`primary_email`);

--
-- Indexes for table `distributions`
--
ALTER TABLE `distributions`
 ADD PRIMARY KEY (`distribution_id`);

--
-- Indexes for table `dts_recommended_testkits`
--
ALTER TABLE `dts_recommended_testkits`
 ADD PRIMARY KEY (`test_no`,`testkit`);

--
-- Indexes for table `enrollments`
--
ALTER TABLE `enrollments`
 ADD PRIMARY KEY (`scheme_id`,`participant_id`), ADD KEY `participant_id` (`participant_id`);

--
-- Indexes for table `global_config`
--
ALTER TABLE `global_config`
 ADD PRIMARY KEY (`name`);

--
-- Indexes for table `mail_template`
--
ALTER TABLE `mail_template`
 ADD PRIMARY KEY (`mail_temp_id`);

--
-- Indexes for table `participant`
--
ALTER TABLE `participant`
 ADD PRIMARY KEY (`participant_id`), ADD UNIQUE KEY `unique_identifier` (`unique_identifier`);

--
-- Indexes for table `participant_enrolled_programs_map`
--
ALTER TABLE `participant_enrolled_programs_map`
 ADD PRIMARY KEY (`participant_id`,`ep_id`);

--
-- Indexes for table `participant_manager_map`
--
ALTER TABLE `participant_manager_map`
 ADD PRIMARY KEY (`participant_id`,`dm_id`);

--
-- Indexes for table `reference_dbs_eia`
--
ALTER TABLE `reference_dbs_eia`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `reference_dbs_wb`
--
ALTER TABLE `reference_dbs_wb`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `reference_dts_eia`
--
ALTER TABLE `reference_dts_eia`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `reference_dts_rapid_hiv`
--
ALTER TABLE `reference_dts_rapid_hiv`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `reference_dts_wb`
--
ALTER TABLE `reference_dts_wb`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `reference_result_dbs`
--
ALTER TABLE `reference_result_dbs`
 ADD PRIMARY KEY (`shipment_id`,`sample_id`);

--
-- Indexes for table `reference_result_dts`
--
ALTER TABLE `reference_result_dts`
 ADD PRIMARY KEY (`shipment_id`,`sample_id`);

--
-- Indexes for table `reference_result_eid`
--
ALTER TABLE `reference_result_eid`
 ADD PRIMARY KEY (`shipment_id`,`sample_id`);

--
-- Indexes for table `reference_result_vl`
--
ALTER TABLE `reference_result_vl`
 ADD PRIMARY KEY (`shipment_id`,`sample_id`);

--
-- Indexes for table `reference_vl_calculation`
--
ALTER TABLE `reference_vl_calculation`
 ADD PRIMARY KEY (`shipment_id`,`sample_id`,`vl_assay`);

--
-- Indexes for table `reference_vl_methods`
--
ALTER TABLE `reference_vl_methods`
 ADD PRIMARY KEY (`shipment_id`,`sample_id`,`assay`);

--
-- Indexes for table `report_config`
--
ALTER TABLE `report_config`
 ADD PRIMARY KEY (`name`);

--
-- Indexes for table `rep_analytes`
--
ALTER TABLE `rep_analytes`
 ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `rep_counties`
--
ALTER TABLE `rep_counties`
 ADD PRIMARY KEY (`CountyID`);

--
-- Indexes for table `rep_customfields`
--
ALTER TABLE `rep_customfields`
 ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `rep_failreasons`
--
ALTER TABLE `rep_failreasons`
 ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `rep_grading`
--
ALTER TABLE `rep_grading`
 ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `rep_labcontacts`
--
ALTER TABLE `rep_labcontacts`
 ADD PRIMARY KEY (`ContactID`), ADD KEY `LabID` (`LabID`);

--
-- Indexes for table `rep_labs`
--
ALTER TABLE `rep_labs`
 ADD PRIMARY KEY (`LabID`);

--
-- Indexes for table `rep_programs`
--
ALTER TABLE `rep_programs`
 ADD PRIMARY KEY (`ProgramID`);

--
-- Indexes for table `rep_providercontacts`
--
ALTER TABLE `rep_providercontacts`
 ADD PRIMARY KEY (`ContactID`), ADD KEY `ProviderID` (`ProviderID`);

--
-- Indexes for table `rep_providerfiles`
--
ALTER TABLE `rep_providerfiles`
 ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `rep_providerlabs`
--
ALTER TABLE `rep_providerlabs`
 ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `rep_providerprograms`
--
ALTER TABLE `rep_providerprograms`
 ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `rep_providerresultcodes`
--
ALTER TABLE `rep_providerresultcodes`
 ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `rep_providerrounds`
--
ALTER TABLE `rep_providerrounds`
 ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `rep_providers`
--
ALTER TABLE `rep_providers`
 ADD PRIMARY KEY (`ProviderID`);

--
-- Indexes for table `rep_providersamples`
--
ALTER TABLE `rep_providersamples`
 ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `rep_repository`
--
ALTER TABLE `rep_repository`
 ADD PRIMARY KEY (`ImpID`), ADD KEY `rep_repository_ibfk_1` (`ProviderID`), ADD KEY `LabID` (`LabID`), ADD KEY `RoundID` (`RoundID`), ADD KEY `ProgramID` (`ProgramID`), ADD KEY `AnalyteID` (`AnalyteID`), ADD KEY `Grade` (`Grade`), ADD KEY `TestKitID` (`TestKitID`);

--
-- Indexes for table `rep_testkits`
--
ALTER TABLE `rep_testkits`
 ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `response_result_dbs`
--
ALTER TABLE `response_result_dbs`
 ADD PRIMARY KEY (`shipment_map_id`,`sample_id`);

--
-- Indexes for table `response_result_dts`
--
ALTER TABLE `response_result_dts`
 ADD PRIMARY KEY (`shipment_map_id`,`sample_id`);

--
-- Indexes for table `response_result_eid`
--
ALTER TABLE `response_result_eid`
 ADD PRIMARY KEY (`shipment_map_id`,`sample_id`);

--
-- Indexes for table `response_result_vl`
--
ALTER TABLE `response_result_vl`
 ADD PRIMARY KEY (`shipment_map_id`,`sample_id`);

--
-- Indexes for table `r_control`
--
ALTER TABLE `r_control`
 ADD PRIMARY KEY (`control_id`);

--
-- Indexes for table `r_dbs_eia`
--
ALTER TABLE `r_dbs_eia`
 ADD PRIMARY KEY (`eia_id`);

--
-- Indexes for table `r_dbs_wb`
--
ALTER TABLE `r_dbs_wb`
 ADD PRIMARY KEY (`wb_id`);

--
-- Indexes for table `r_dts_corrective_actions`
--
ALTER TABLE `r_dts_corrective_actions`
 ADD PRIMARY KEY (`action_id`);

--
-- Indexes for table `r_eid_detection_assay`
--
ALTER TABLE `r_eid_detection_assay`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `r_eid_extraction_assay`
--
ALTER TABLE `r_eid_extraction_assay`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `r_enrolled_programs`
--
ALTER TABLE `r_enrolled_programs`
 ADD PRIMARY KEY (`r_epid`);

--
-- Indexes for table `r_evaluation_comments`
--
ALTER TABLE `r_evaluation_comments`
 ADD PRIMARY KEY (`comment_id`);

--
-- Indexes for table `r_modes_of_receipt`
--
ALTER TABLE `r_modes_of_receipt`
 ADD PRIMARY KEY (`mode_id`);

--
-- Indexes for table `r_network_tiers`
--
ALTER TABLE `r_network_tiers`
 ADD PRIMARY KEY (`network_id`);

--
-- Indexes for table `r_participant_affiliates`
--
ALTER TABLE `r_participant_affiliates`
 ADD PRIMARY KEY (`aff_id`);

--
-- Indexes for table `r_possibleresult`
--
ALTER TABLE `r_possibleresult`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `r_results`
--
ALTER TABLE `r_results`
 ADD PRIMARY KEY (`result_id`);

--
-- Indexes for table `r_site_type`
--
ALTER TABLE `r_site_type`
 ADD PRIMARY KEY (`r_stid`);

--
-- Indexes for table `r_testkitname_dts`
--
ALTER TABLE `r_testkitname_dts`
 ADD PRIMARY KEY (`TestKitName_ID`);

--
-- Indexes for table `r_vl_assay`
--
ALTER TABLE `r_vl_assay`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `scheme_list`
--
ALTER TABLE `scheme_list`
 ADD PRIMARY KEY (`scheme_id`);

--
-- Indexes for table `shipment`
--
ALTER TABLE `shipment`
 ADD PRIMARY KEY (`shipment_id`), ADD KEY `scheme_type` (`scheme_type`), ADD KEY `distribution_id` (`distribution_id`);

--
-- Indexes for table `shipment_participant_map`
--
ALTER TABLE `shipment_participant_map`
 ADD PRIMARY KEY (`map_id`), ADD UNIQUE KEY `shipment_id_2` (`shipment_id`,`participant_id`), ADD KEY `shipment_id` (`shipment_id`), ADD KEY `participant_id` (`participant_id`);

--
-- Indexes for table `system_admin`
--
ALTER TABLE `system_admin`
 ADD PRIMARY KEY (`admin_id`);

--
-- Indexes for table `tbl_bac_panel_mst`
--
ALTER TABLE `tbl_bac_panel_mst`
 ADD PRIMARY KEY (`id`,`panelName`);

--
-- Indexes for table `tbl_bac_samples`
--
ALTER TABLE `tbl_bac_samples`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_bac_sample_to_panel`
--
ALTER TABLE `tbl_bac_sample_to_panel`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_bac_shipments`
--
ALTER TABLE `tbl_bac_shipments`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `temp_mail`
--
ALTER TABLE `temp_mail`
 ADD PRIMARY KEY (`temp_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `contact_us`
--
ALTER TABLE `contact_us`
MODIFY `contact_id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `countries`
--
ALTER TABLE `countries`
MODIFY `id` int(10) unsigned NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=250;
--
-- AUTO_INCREMENT for table `data_manager`
--
ALTER TABLE `data_manager`
MODIFY `dm_id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `distributions`
--
ALTER TABLE `distributions`
MODIFY `distribution_id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `mail_template`
--
ALTER TABLE `mail_template`
MODIFY `mail_temp_id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `participant`
--
ALTER TABLE `participant`
MODIFY `participant_id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `reference_dbs_eia`
--
ALTER TABLE `reference_dbs_eia`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `reference_dbs_wb`
--
ALTER TABLE `reference_dbs_wb`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `reference_dts_eia`
--
ALTER TABLE `reference_dts_eia`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `reference_dts_rapid_hiv`
--
ALTER TABLE `reference_dts_rapid_hiv`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `reference_dts_wb`
--
ALTER TABLE `reference_dts_wb`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `rep_analytes`
--
ALTER TABLE `rep_analytes`
MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `rep_counties`
--
ALTER TABLE `rep_counties`
MODIFY `CountyID` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=48;
--
-- AUTO_INCREMENT for table `rep_customfields`
--
ALTER TABLE `rep_customfields`
MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=62;
--
-- AUTO_INCREMENT for table `rep_failreasons`
--
ALTER TABLE `rep_failreasons`
MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `rep_grading`
--
ALTER TABLE `rep_grading`
MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `rep_labcontacts`
--
ALTER TABLE `rep_labcontacts`
MODIFY `ContactID` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT for table `rep_labs`
--
ALTER TABLE `rep_labs`
MODIFY `LabID` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `rep_programs`
--
ALTER TABLE `rep_programs`
MODIFY `ProgramID` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `rep_providercontacts`
--
ALTER TABLE `rep_providercontacts`
MODIFY `ContactID` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT for table `rep_providerfiles`
--
ALTER TABLE `rep_providerfiles`
MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT for table `rep_providerlabs`
--
ALTER TABLE `rep_providerlabs`
MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `rep_providerprograms`
--
ALTER TABLE `rep_providerprograms`
MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT for table `rep_providerresultcodes`
--
ALTER TABLE `rep_providerresultcodes`
MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=8;
--
-- AUTO_INCREMENT for table `rep_providerrounds`
--
ALTER TABLE `rep_providerrounds`
MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `rep_providers`
--
ALTER TABLE `rep_providers`
MODIFY `ProviderID` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=13;
--
-- AUTO_INCREMENT for table `rep_providersamples`
--
ALTER TABLE `rep_providersamples`
MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `rep_repository`
--
ALTER TABLE `rep_repository`
MODIFY `ImpID` int(11) NOT NULL AUTO_INCREMENT COMMENT 'Repository unique Identifier',AUTO_INCREMENT=61;
--
-- AUTO_INCREMENT for table `rep_testkits`
--
ALTER TABLE `rep_testkits`
MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `r_control`
--
ALTER TABLE `r_control`
MODIFY `control_id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=10;
--
-- AUTO_INCREMENT for table `r_dbs_eia`
--
ALTER TABLE `r_dbs_eia`
MODIFY `eia_id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `r_dbs_wb`
--
ALTER TABLE `r_dbs_wb`
MODIFY `wb_id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `r_dts_corrective_actions`
--
ALTER TABLE `r_dts_corrective_actions`
MODIFY `action_id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=18;
--
-- AUTO_INCREMENT for table `r_eid_detection_assay`
--
ALTER TABLE `r_eid_detection_assay`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT for table `r_eid_extraction_assay`
--
ALTER TABLE `r_eid_extraction_assay`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT for table `r_enrolled_programs`
--
ALTER TABLE `r_enrolled_programs`
MODIFY `r_epid` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `r_evaluation_comments`
--
ALTER TABLE `r_evaluation_comments`
MODIFY `comment_id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=9;
--
-- AUTO_INCREMENT for table `r_modes_of_receipt`
--
ALTER TABLE `r_modes_of_receipt`
MODIFY `mode_id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT for table `r_network_tiers`
--
ALTER TABLE `r_network_tiers`
MODIFY `network_id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `r_participant_affiliates`
--
ALTER TABLE `r_participant_affiliates`
MODIFY `aff_id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `r_possibleresult`
--
ALTER TABLE `r_possibleresult`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=14;
--
-- AUTO_INCREMENT for table `r_results`
--
ALTER TABLE `r_results`
MODIFY `result_id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `r_site_type`
--
ALTER TABLE `r_site_type`
MODIFY `r_stid` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=13;
--
-- AUTO_INCREMENT for table `r_vl_assay`
--
ALTER TABLE `r_vl_assay`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT for table `shipment`
--
ALTER TABLE `shipment`
MODIFY `shipment_id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `shipment_participant_map`
--
ALTER TABLE `shipment_participant_map`
MODIFY `map_id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `system_admin`
--
ALTER TABLE `system_admin`
MODIFY `admin_id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=12;
--
-- AUTO_INCREMENT for table `tbl_bac_panel_mst`
--
ALTER TABLE `tbl_bac_panel_mst`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=41;
--
-- AUTO_INCREMENT for table `tbl_bac_samples`
--
ALTER TABLE `tbl_bac_samples`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=13;
--
-- AUTO_INCREMENT for table `tbl_bac_sample_to_panel`
--
ALTER TABLE `tbl_bac_sample_to_panel`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=19;
--
-- AUTO_INCREMENT for table `tbl_bac_shipments`
--
ALTER TABLE `tbl_bac_shipments`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `temp_mail`
--
ALTER TABLE `temp_mail`
MODIFY `temp_id` int(11) NOT NULL AUTO_INCREMENT;
--
-- Constraints for dumped tables
--

--
-- Constraints for table `rep_labcontacts`
--
ALTER TABLE `rep_labcontacts`
ADD CONSTRAINT `rep_labcontacts_ibfk_1` FOREIGN KEY (`LabID`) REFERENCES `rep_labs` (`LabID`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `rep_providercontacts`
--
ALTER TABLE `rep_providercontacts`
ADD CONSTRAINT `rep_providercontacts_ibfk_1` FOREIGN KEY (`ProviderID`) REFERENCES `rep_providers` (`ProviderID`) ON DELETE NO ACTION ON UPDATE NO ACTION;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

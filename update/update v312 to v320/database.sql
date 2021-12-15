-- phpMyAdmin SQL Dump
-- version 4.9.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Feb 26, 2020 at 10:37 AM
-- Server version: 10.4.10-MariaDB
-- PHP Version: 5.6.40

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `v320_blank`
--

-- --------------------------------------------------------

--
-- Table structure for table `currency`
--

INSERT INTO `config` (`config_id`, `title`, `value`) VALUES
(NULL, 'trial_enable', '0'),
(NULL, 'trial_period', '0'),
(NULL, 'paypal_email', 'paypal@domain.com'),
(NULL, 'currency_symbol', '$'),
(NULL, 'stripe_publishable_key', 'xxxxxxxxxxxxxxxxxxxxxxxxxxx'),
(NULL, 'stripe_secret_key', 'xxxxxxxxxxxxxxxxxxxxxxxxxxx'),
(NULL, 'currency', 'USD'),
(NULL, 'paypal_client_id', 'xxxxxxxxxxxxxxxxxxxx'),
(NULL, 'exchange_rate_update_by_cron', '0'),
(NULL, 'enable_ribbon', '1'),
(NULL, 'mobile_ads_enable', '0'),
(NULL, 'mobile_ads_network', 'admob'),
(NULL, 'fan_native_ads_placement_id', 'xxxxxxxxxxxxxxxxxxxx'),
(NULL, 'fan_banner_ads_placement_id', 'xxxxxxxxxxxxxxxxxxxxxxx'),
(NULL, 'fan_Interstitial_ads_placement_id', 'xxxxxxxxxxxxxxxxxxxxxx'),
(NULL, 'startapp_app_id', 'xxxxxxxxxxx'),
(NULL, 'enable_ribbon', '1');

ALTER TABLE `videos` ADD `is_paid` INT(5) NOT NULL DEFAULT '0' AFTER `video_quality`;
ALTER TABLE `live_tv` ADD `is_paid` INT(5) NOT NULL DEFAULT '0' AFTER `featured`;
ALTER TABLE `slider` ADD `action_type` VARCHAR(250) NULL AFTER `publication`, ADD `action_btn_text` VARCHAR(250) NULL DEFAULT 'Watch Now' AFTER `action_type`, ADD `action_id` INT(50) NULL AFTER `action_btn_text`, ADD `action_url` TEXT NULL AFTER `action_id`, ADD `order` INT NULL DEFAULT '1' AFTER `action_url`;


DROP TABLE IF EXISTS `currency`;
CREATE TABLE IF NOT EXISTS `currency` (
  `currency_id` int(11) NOT NULL AUTO_INCREMENT,
  `country` varchar(100) COLLATE utf8mb4_unicode_520_ci DEFAULT NULL,
  `currency` varchar(100) COLLATE utf8mb4_unicode_520_ci DEFAULT NULL,
  `iso_code` varchar(100) COLLATE utf8mb4_unicode_520_ci DEFAULT NULL,
  `symbol` varchar(100) COLLATE utf8mb4_unicode_520_ci DEFAULT NULL,
  `exchange_rate` double NOT NULL DEFAULT 1,
  `default` int(11) NOT NULL DEFAULT 0,
  `status` int(11) NOT NULL DEFAULT 1,
  PRIMARY KEY (`currency_id`)
) ENGINE=MyISAM AUTO_INCREMENT=133 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_520_ci;

--
-- Dumping data for table `currency`
--

INSERT INTO `currency` (`currency_id`, `country`, `currency`, `iso_code`, `symbol`, `exchange_rate`, `default`, `status`) VALUES
(1, 'Albania', 'Leke', 'ALL', 'Lek', 1, 0, 1),
(2, 'America', 'Dollars', 'USD', '$', 1, 0, 1),
(3, 'Afghanistan', 'Afghanis', 'AFN', '؋', 1, 0, 1),
(4, 'Argentina', 'Pesos', 'ARS', '$', 61.399228, 0, 1),
(5, 'Aruba', 'Guilders', 'AWG', 'ƒ', 1, 0, 1),
(6, 'Australia', 'Dollars', 'AUD', '$', 1.4882, 0, 1),
(7, 'Azerbaijan', 'New Manats', 'AZN', 'ман', 1, 0, 1),
(8, 'Bahamas', 'Dollars', 'BSD', '$', 1, 0, 1),
(9, 'Barbados', 'Dollars', 'BBD', '$', 1, 0, 1),
(10, 'Belarus', 'Rubles', 'BYR', 'p.', 1, 0, 1),
(11, 'Belgium', 'Euro', 'EUR', '€', 0.922379, 0, 1),
(12, 'Beliz', 'Dollars', 'BZD', 'BZ$', 1, 0, 1),
(13, 'Bermuda', 'Dollars', 'BMD', '$', 1, 0, 1),
(14, 'Bolivia', 'Bolivianos', 'BOB', '$b', 1, 0, 1),
(15, 'Bosnia and Herzegovina', 'Convertible Marka', 'BAM', 'KM', 1, 0, 1),
(16, 'Botswana', 'Pula', 'BWP', 'P', 1, 0, 1),
(17, 'Bulgaria', 'Leva', 'BGN', 'лв', 1.803753, 0, 1),
(18, 'Brazil', 'Reais', 'BRL', 'R$', 4.330496, 0, 1),
(19, 'Britain (United Kingdom)', 'Pounds', 'GBP', '£', 83, 0, 1),
(20, 'Brunei Darussalam', 'Dollars', 'BND', '$', 1, 0, 1),
(21, 'Cambodia', 'Riels', 'KHR', '៛', 1, 0, 1),
(22, 'Canada', 'Dollars', 'CAD', '$', 1.325097, 0, 1),
(23, 'Cayman Islands', 'Dollars', 'KYD', '$', 1, 0, 1),
(24, 'Chile', 'Pesos', 'CLP', '$', 794.622928, 0, 1),
(25, 'China', 'Yuan Renminbi', 'CNY', '¥', 6.984162, 0, 1),
(26, 'Colombia', 'Pesos', 'COP', '$', 3313, 0, 1),
(27, 'Costa Rica', 'Colón', 'CRC', '₡', 1, 0, 1),
(28, 'Croatia', 'Kuna', 'HRK', 'kn', 6.869981, 0, 1),
(29, 'Cuba', 'Pesos', 'CUP', '₱', 1, 0, 1),
(30, 'Cyprus', 'Euro', 'EUR', '€', 0.922379, 0, 1),
(31, 'Czech Republic', 'Koruny', 'CZK', 'Kč', 22.911451, 0, 1),
(32, 'Denmark', 'Kroner', 'DKK', 'kr', 6.890187, 0, 1),
(33, 'Dominican Republic', 'Pesos', 'DOP ', 'RD$', 53.507402, 0, 1),
(34, 'East Caribbean', 'Dollars', 'XCD', '$', 1, 0, 1),
(35, 'Egypt', 'Pounds', 'EGP', '£', 15.61815, 0, 1),
(36, 'El Salvador', 'Colones', 'SVC', '$', 1, 0, 1),
(37, 'England (United Kingdom)', 'Pounds', 'GBP', '£', 83, 0, 1),
(38, 'Euro', 'Euro', 'EUR', '€', 0.922379, 0, 1),
(39, 'Falkland Islands', 'Pounds', 'FKP', '£', 1, 0, 1),
(40, 'Fiji', 'Dollars', 'FJD', '$', 2.195918, 0, 1),
(41, 'France', 'Euro', 'EUR', '€', 0.922379, 0, 1),
(42, 'Ghana', 'Cedis', 'GHC', '¢', 1, 0, 1),
(43, 'Gibraltar', 'Pounds', 'GIP', '£', 1, 0, 1),
(44, 'Greece', 'Euro', 'EUR', '€', 0.922379, 0, 1),
(45, 'Guatemala', 'Quetzales', 'GTQ', 'Q', 7.63804, 0, 1),
(46, 'Guernsey', 'Pounds', 'GGP', '£', 1, 0, 1),
(47, 'Guyana', 'Dollars', 'GYD', '$', 1, 0, 1),
(48, 'Holland (Netherlands)', 'Euro', 'EUR', '€', 0.922379, 0, 1),
(49, 'Honduras', 'Lempiras', 'HNL', 'L', 1, 0, 1),
(50, 'Hong Kong', 'Dollars', 'HKD', '$', 7.767071, 0, 1),
(51, 'Hungary', 'Forint', 'HUF', 'Ft', 310.231043, 0, 1),
(52, 'Iceland', 'Kronur', 'ISK', 'kr', 126.858376, 0, 1),
(53, 'India', 'Rupees', 'INR', 'Rp', 71.40112, 0, 1),
(54, 'Indonesia', 'Rupiahs', 'IDR', 'Rp', 13612.651679, 0, 1),
(55, 'Iran', 'Rials', 'IRR', '﷼', 1, 0, 1),
(56, 'Ireland', 'Euro', 'EUR', '€', 0.922379, 0, 1),
(57, 'Isle of Man', 'Pounds', 'IMP', '£', 1, 0, 1),
(58, 'Israel', 'New Shekels', 'ILS', '₪', 3.427408, 0, 1),
(59, 'Italy', 'Euro', 'EUR', '€', 0.922379, 0, 1),
(60, 'Jamaica', 'Dollars', 'JMD', 'J$', 1, 0, 1),
(61, 'Japan', 'Yen', 'JPY', '¥', 109.814254, 0, 1),
(62, 'Jersey', 'Pounds', 'JEP', '£', 1, 0, 1),
(63, 'Kazakhstan', 'Tenge', 'KZT', 'лв', 376.834123, 0, 1),
(64, 'Korea (North)', 'Won', 'KPW', '₩', 1, 0, 1),
(65, 'Korea (South)', 'Won', 'KRW', '₩', 1183.94149, 0, 1),
(66, 'Kyrgyzstan', 'Soms', 'KGS', 'лв', 1, 0, 1),
(67, 'Laos', 'Kips', 'LAK', '₭', 1, 0, 1),
(68, 'Latvia', 'Lati', 'LVL', 'Ls', 1, 0, 1),
(69, 'Lebanon', 'Pounds', 'LBP', '£', 1, 0, 1),
(70, 'Liberia', 'Dollars', 'LRD', '$', 1, 0, 1),
(71, 'Liechtenstein', 'Switzerland Francs', 'CHF', 'CHF', 0.980752, 0, 1),
(72, 'Lithuania', 'Litai', 'LTL', 'Lt', 1, 0, 1),
(73, 'Luxembourg', 'Euro', 'EUR', '€', 0.922379, 0, 1),
(74, 'Macedonia', 'Denars', 'MKD', 'ден', 1, 0, 1),
(75, 'Malaysia', 'Ringgits', 'MYR', 'RM', 4.139749, 0, 1),
(76, 'Malta', 'Euro', 'EUR', '€', 0.922379, 0, 1),
(77, 'Mauritius', 'Rupees', 'MUR', '₨', 1, 0, 1),
(78, 'Mexico', 'Pesos', 'MXN', '$', 18.585695, 0, 1),
(79, 'Mongolia', 'Tugriks', 'MNT', '₮', 1, 0, 1),
(80, 'Mozambique', 'Meticais', 'MZN', 'MT', 1, 0, 1),
(81, 'Namibia', 'Dollars', 'NAD', '$', 1, 0, 1),
(82, 'Nepal', 'Rupees', 'NPR', '₨', 1, 0, 1),
(83, 'Netherlands Antilles', 'Guilders', 'ANG', 'ƒ', 1, 0, 1),
(84, 'Netherlands', 'Euro', 'EUR', '€', 0.922379, 0, 1),
(85, 'New Zealand', 'Dollars', 'NZD', '$', 1.553574, 0, 1),
(86, 'Nicaragua', 'Cordobas', 'NIO', 'C$', 1, 0, 1),
(87, 'Nigeria', 'Nairas', 'NGN', '₦', 1, 0, 1),
(88, 'North Korea', 'Won', 'KPW', '₩', 1, 0, 1),
(89, 'Norway', 'Krone', 'NOK', 'kr', 9.253793, 0, 1),
(90, 'Oman', 'Rials', 'OMR', '﷼', 1, 0, 1),
(91, 'Pakistan', 'Rupees', 'PKR', '₨', 154.392233, 0, 1),
(92, 'Panama', 'Balboa', 'PAB', 'B/.', 1, 0, 1),
(93, 'Paraguay', 'Guarani', 'PYG', 'Gs', 6626, 0, 1),
(94, 'Peru', 'Nuevos Soles', 'PEN', 'S/.', 3.383275, 0, 1),
(95, 'Philippines', 'Pesos', 'PHP', 'Php', 50.525693, 0, 1),
(96, 'Poland', 'Zlotych', 'PLN', 'zł', 3.917289, 0, 1),
(97, 'Qatar', 'Rials', 'QAR', '﷼', 1, 0, 1),
(98, 'Romania', 'New Lei', 'RON', 'lei', 4.396745, 0, 1),
(99, 'Russia', 'Rubles', 'RUB', 'руб', 63.537178, 0, 1),
(100, 'Saint Helena', 'Pounds', 'SHP', '£', 1, 0, 1),
(101, 'Saudi Arabia', 'Riyals', 'SAR', '﷼', 3.75061, 0, 1),
(102, 'Serbia', 'Dinars', 'RSD', 'Дин.', 1, 0, 1),
(103, 'Seychelles', 'Rupees', 'SCR', '₨', 1, 0, 1),
(104, 'Singapore', 'Dollars', 'SGD', '$', 1.390516, 0, 1),
(105, 'Slovenia', 'Euro', 'EUR', '€', 0.922379, 0, 1),
(106, 'Solomon Islands', 'Dollars', 'SBD', '$', 1, 0, 1),
(107, 'Somalia', 'Shillings', 'SOS', 'S', 1, 0, 1),
(108, 'South Africa', 'Rand', 'ZAR', 'R', 14.88117, 0, 1),
(109, 'South Korea', 'Won', 'KRW', '₩', 1183.94149, 0, 1),
(110, 'Spain', 'Euro', 'EUR', '€', 0.922379, 0, 1),
(111, 'Sri Lanka', 'Rupees', 'LKR', '₨', 1, 0, 1),
(112, 'Sweden', 'Kronor', 'SEK', 'kr', 9.694847, 0, 1),
(113, 'Switzerland', 'Francs', 'CHF', 'CHF', 0.980752, 0, 1),
(114, 'Suriname', 'Dollars', 'SRD', '$', 1, 0, 1),
(115, 'Syria', 'Pounds', 'SYP', '£', 1, 0, 1),
(116, 'Taiwan', 'New Dollars', 'TWD', 'NT$', 30.0056, 0, 1),
(117, 'Thailand', 'Baht', 'THB', '฿', 31.163295, 0, 1),
(118, 'Trinidad and Tobago', 'Dollars', 'TTD', 'TT$', 1, 0, 1),
(119, 'Turkey', 'Lira', 'TRY', 'TL', 6.053817, 0, 1),
(120, 'Turkey', 'Liras', 'TRL', '£', 1, 0, 1),
(121, 'Tuvalu', 'Dollars', 'TVD', '$', 1, 0, 1),
(122, 'Ukraine', 'Hryvnia', 'UAH', '₴', 24.336642, 0, 1),
(123, 'United Kingdom', 'Pounds', 'GBP', '£', 83, 0, 1),
(124, 'United States of America', 'Dollars', 'USD', '$', 1, 0, 1),
(125, 'Uruguay', 'Pesos', 'UYU', '$U', 37.880896, 0, 1),
(126, 'Uzbekistan', 'Sums', 'UZS', 'лв', 1, 0, 1),
(127, 'Vatican City', 'Euro', 'EUR', '€', 0.922379, 0, 1),
(128, 'Venezuela', 'Bolivares Fuertes', 'VEF', 'Bs', 1, 0, 1),
(129, 'Vietnam', 'Dong', 'VND', '₫', 1, 0, 1),
(130, 'Yemen', 'Rials', 'YER', '﷼', 1, 0, 1),
(131, 'Zimbabwe', 'Zimbabwe Dollars', 'ZWD', 'Z$', 1, 0, 1),
(132, 'Bangladesh', 'Taka', 'BDT', '৳', 83, 0, 1);

-- --------------------------------------------------------

--
-- Table structure for table `keys`
--

DROP TABLE IF EXISTS `keys`;
CREATE TABLE IF NOT EXISTS `keys` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `label` varchar(250) COLLATE utf8mb4_unicode_520_ci DEFAULT 'System',
  `key` varchar(40) COLLATE utf8mb4_unicode_520_ci NOT NULL,
  `level` int(2) NOT NULL,
  `ignore_limits` tinyint(1) NOT NULL DEFAULT 0,
  `is_private_key` tinyint(1) NOT NULL DEFAULT 0,
  `ip_addresses` mediumtext COLLATE utf8mb4_unicode_520_ci DEFAULT NULL,
  `date_created` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_520_ci;

--
-- Dumping data for table `keys`
--

INSERT INTO `keys` (`id`, `label`, `key`, `level`, `ignore_limits`, `is_private_key`, `ip_addresses`, `date_created`) VALUES
(1, 'Default', '3by7j95z61jfoxzr', 1, 0, 0, NULL, 1582700749);

-- --------------------------------------------------------

--
-- Table structure for table `logs`
--

DROP TABLE IF EXISTS `logs`;
CREATE TABLE IF NOT EXISTS `logs` (
  `id` int(11) NOT NULL,
  `uri` varchar(255) COLLATE utf8mb4_unicode_520_ci NOT NULL,
  `method` varchar(6) COLLATE utf8mb4_unicode_520_ci NOT NULL,
  `params` mediumtext COLLATE utf8mb4_unicode_520_ci DEFAULT NULL,
  `api_key` varchar(40) COLLATE utf8mb4_unicode_520_ci NOT NULL,
  `ip_address` varchar(45) COLLATE utf8mb4_unicode_520_ci NOT NULL,
  `time` int(11) NOT NULL,
  `rtime` float DEFAULT NULL,
  `authorized` varchar(1) COLLATE utf8mb4_unicode_520_ci NOT NULL,
  `response_code` smallint(3) DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_520_ci;

-- --------------------------------------------------------

--
-- Table structure for table `plan`
--

DROP TABLE IF EXISTS `plan`;
CREATE TABLE IF NOT EXISTS `plan` (
  `plan_id` int(11) NOT NULL AUTO_INCREMENT,
  `name` longtext COLLATE utf8mb4_unicode_520_ci NOT NULL,
  `day` int(50) DEFAULT 0,
  `screens` longtext COLLATE utf8mb4_unicode_520_ci DEFAULT NULL,
  `price` longtext COLLATE utf8mb4_unicode_520_ci NOT NULL,
  `status` int(11) NOT NULL,
  PRIMARY KEY (`plan_id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_520_ci;

--
-- Dumping data for table `plan`
--

INSERT INTO `plan` (`plan_id`, `name`, `day`, `screens`, `price`, `status`) VALUES
(1, 'Basic', 7, NULL, '5', 1),
(2, 'Professional ', 30, NULL, '10', 1),
(3, 'Ultra', 90, NULL, '20', 1);

-- --------------------------------------------------------

--
-- Table structure for table `rest_logins`
--

DROP TABLE IF EXISTS `rest_logins`;
CREATE TABLE IF NOT EXISTS `rest_logins` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(250) COLLATE utf8mb4_unicode_520_ci NOT NULL,
  `password` varchar(250) COLLATE utf8mb4_unicode_520_ci NOT NULL,
  `status` int(11) NOT NULL DEFAULT 1,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_520_ci;

--
-- Dumping data for table `rest_logins`
--

INSERT INTO `rest_logins` (`id`, `username`, `password`, `status`) VALUES
(1, 'admin', 'jawou3al0h81pm0p', 1);

-- --------------------------------------------------------

--
-- Table structure for table `subscription`
--

DROP TABLE IF EXISTS `subscription`;
CREATE TABLE IF NOT EXISTS `subscription` (
  `subscription_id` int(50) NOT NULL AUTO_INCREMENT,
  `plan_id` int(50) NOT NULL,
  `user_id` int(50) NOT NULL,
  `price_amount` double NOT NULL,
  `paid_amount` float NOT NULL,
  `currency` varchar(50) COLLATE utf8mb4_unicode_520_ci DEFAULT 'USD',
  `timestamp_from` int(50) NOT NULL,
  `timestamp_to` int(50) NOT NULL,
  `payment_method` mediumtext COLLATE utf8mb4_unicode_520_ci NOT NULL,
  `transaction_id` mediumtext COLLATE utf8mb4_unicode_520_ci DEFAULT NULL,
  `payment_info` longtext COLLATE utf8mb4_unicode_520_ci NOT NULL,
  `payment_timestamp` int(50) NOT NULL,
  `recurring` int(10) NOT NULL DEFAULT 1,
  `status` int(5) NOT NULL DEFAULT 1,
  PRIMARY KEY (`subscription_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_520_ci;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

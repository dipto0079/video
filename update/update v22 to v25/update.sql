-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: May 17, 2018 at 10:38 PM
-- Server version: 5.7.19
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
-- Database: `ovoo_v25_blank`
--

--
-- Dumping data for table `config`
--

INSERT INTO `config` (`config_id`, `title`, `value`) VALUES
(83, 'header_templete', 'header1'),
(84, 'footer_templete', 'footer1'),
(85, 'dark_theme', '1'),
(86, 'player_color_skin', 'blue'),
(87, 'player_watermark', '1'),
(88, 'player_watermark_logo', 'uploads/watermark_logo.png'),
(89, 'player_watermark_url', '#'),
(90, 'player_share', '1'),
(91, 'player_share_fb_id', '35345'),
(92, 'player_seek_button', '1'),
(95, 'player_volume_remember', '1'),
(93, 'player_seek_forward', '30'),
(94, 'player_seek_back', '10'),
(98, 'live_tv_publish', '1'),
(99, 'live_tv_title', ''),
(100, 'live_tv_keyword', ''),
(101, 'live_tv_meta_description', ' '),
(102, 'live_tv_pin_primary_menu', '1'),
(103, 'live_tv_pin_footer_menu', '1');
COMMIT;


-- --------------------------------------------------------

--
-- Table structure for table `ads`
--

DROP TABLE IF EXISTS `ads`;
CREATE TABLE IF NOT EXISTS `ads` (
  `ads_id` int(11) NOT NULL AUTO_INCREMENT,
  `ads_name` varchar(250) COLLATE utf8_unicode_ci DEFAULT NULL,
  `unique_name` varchar(250) COLLATE utf8_unicode_ci DEFAULT NULL,
  `ads_size` varchar(250) COLLATE utf8_unicode_ci DEFAULT NULL,
  `ads_type` varchar(200) COLLATE utf8_unicode_ci DEFAULT NULL,
  `ads_url` text COLLATE utf8_unicode_ci NOT NULL,
  `ads_image_url` mediumtext COLLATE utf8_unicode_ci,
  `ads_code` longtext COLLATE utf8_unicode_ci,
  `enable` int(1) DEFAULT '0',
  PRIMARY KEY (`ads_id`)
) ENGINE=MyISAM AUTO_INCREMENT=12 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `ads`
--

INSERT INTO `ads` (`ads_id`, `ads_name`, `unique_name`, `ads_size`, `ads_type`, `ads_url`, `ads_image_url`, `ads_code`, `enable`) VALUES
(1, 'Home Page Header', 'home_header', '728x90', 'code', '', '', '', 0),
(2, 'Movie Page Header', 'movie_header', '728x90', 'image', '', '', '', 0),
(3, 'Genre Page Header', 'genre_header', '728x90', 'image', '', '', '', 0),
(4, 'Country Page Header', 'country_header', '728x90', 'image', '', '', '', 0),
(5, 'Release Page Header', 'release_header', '728x90', 'code', '', '', '', 0),
(6, 'TV-series Page Header', 'tv_header', '728x90', 'image', '', '', '', 0),
(7, 'Type Page Header', 'type_header', '728x90', 'image', '', '', '', 0),
(8, 'Blog Page Header', 'blog_header', '728x90', 'image', '', '', '', 0),
(9, 'Ployer Sidebar', 'player_sidebar', '728x90', 'image', '', '', '', 1),
(10, 'Ployer Top', 'player_top', '728x90', 'image', '', '', '', 0),
(11, 'Ployer Bottom', 'player_bottom', '728x90', 'image', '', '', '', 0);
COMMIT;


-- --------------------------------------------------------

--
-- Table structure for table `languages_iso`
--

DROP TABLE IF EXISTS `languages_iso`;
CREATE TABLE IF NOT EXISTS `languages_iso` (
  `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `name` char(49) CHARACTER SET utf8 DEFAULT NULL,
  `iso` char(2) CHARACTER SET utf8 DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=136 DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Dumping data for table `languages_iso`
--

INSERT INTO `languages_iso` (`id`, `name`, `iso`) VALUES
(1, 'English', 'en'),
(2, 'Afar', 'aa'),
(3, 'Abkhazian', 'ab'),
(4, 'Afrikaans', 'af'),
(5, 'Amharic', 'am'),
(6, 'Arabic', 'ar'),
(7, 'Assamese', 'as'),
(8, 'Aymara', 'ay'),
(9, 'Azerbaijani', 'az'),
(10, 'Bashkir', 'ba'),
(11, 'Belarusian', 'be'),
(12, 'Bulgarian', 'bg'),
(13, 'Bihari', 'bh'),
(14, 'Bislama', 'bi'),
(15, 'Bangla', 'bn'),
(16, 'Tibetan', 'bo'),
(17, 'Breton', 'br'),
(18, 'Catalan', 'ca'),
(19, 'Corsican', 'co'),
(20, 'Czech', 'cs'),
(21, 'Welsh', 'cy'),
(22, 'Danish', 'da'),
(23, 'German', 'de'),
(24, 'Bhutani', 'dz'),
(25, 'Greek', 'el'),
(26, 'Esperanto', 'eo'),
(27, 'Spanish', 'es'),
(28, 'Estonian', 'et'),
(29, 'Basque', 'eu'),
(30, 'Persian', 'fa'),
(31, 'Finnish', 'fi'),
(32, 'Fiji', 'fj'),
(33, 'Faeroese', 'fo'),
(34, 'French', 'fr'),
(35, 'Frisian', 'fy'),
(36, 'Irish', 'ga'),
(37, 'Scots/Gaelic', 'gd'),
(38, 'Galician', 'gl'),
(39, 'Guarani', 'gn'),
(40, 'Gujarati', 'gu'),
(41, 'Hausa', 'ha'),
(42, 'Hindi', 'hi'),
(43, 'Croatian', 'hr'),
(44, 'Hungarian', 'hu'),
(45, 'Armenian', 'hy'),
(46, 'Interlingua', 'ia'),
(47, 'Interlingue', 'ie'),
(48, 'Inupiak', 'ik'),
(49, 'Indonesian', 'in'),
(50, 'Icelandic', 'is'),
(51, 'Italian', 'it'),
(52, 'Hebrew', 'iw'),
(53, 'Japanese', 'ja'),
(54, 'Yiddish', 'ji'),
(55, 'Javanese', 'jw'),
(56, 'Georgian', 'ka'),
(57, 'Kazakh', 'kk'),
(58, 'Greenlandic', 'kl'),
(59, 'Cambodian', 'km'),
(60, 'Kannada', 'kn'),
(61, 'Korean', 'ko'),
(62, 'Kashmiri', 'ks'),
(63, 'Kurdish', 'ku'),
(64, 'Kirghiz', 'ky'),
(65, 'Latin', 'la'),
(66, 'Lingala', 'ln'),
(67, 'Laothian', 'lo'),
(68, 'Lithuanian', 'lt'),
(69, 'Latvian/Lettish', 'lv'),
(70, 'Malagasy', 'mg'),
(71, 'Maori', 'mi'),
(72, 'Macedonian', 'mk'),
(73, 'Malayalam', 'ml'),
(74, 'Mongolian', 'mn'),
(75, 'Moldavian', 'mo'),
(76, 'Marathi', 'mr'),
(77, 'Malay', 'ms'),
(78, 'Maltese', 'mt'),
(79, 'Burmese', 'my'),
(80, 'Nauru', 'na'),
(81, 'Nepali', 'ne'),
(82, 'Dutch', 'nl'),
(83, 'Norwegian', 'no'),
(84, 'Occitan', 'oc'),
(85, '(Afan)/Oromoor/Oriya', 'om'),
(86, 'Punjabi', 'pa'),
(87, 'Polish', 'pl'),
(88, 'Pashto/Pushto', 'ps'),
(89, 'Portuguese', 'pt'),
(90, 'Quechua', 'qu'),
(91, 'Rhaeto-Romance', 'rm'),
(92, 'Kirundi', 'rn'),
(93, 'Romanian', 'ro'),
(94, 'Russian', 'ru'),
(95, 'Kinyarwanda', 'rw'),
(96, 'Sanskrit', 'sa'),
(97, 'Sindhi', 'sd'),
(98, 'Sangro', 'sg'),
(99, 'Serbo-Croatian', 'sh'),
(100, 'Singhalese', 'si'),
(101, 'Slovak', 'sk'),
(102, 'Slovenian', 'sl'),
(103, 'Samoan', 'sm'),
(104, 'Shona', 'sn'),
(105, 'Somali', 'so'),
(106, 'Albanian', 'sq'),
(107, 'Serbian', 'sr'),
(108, 'Siswati', 'ss'),
(109, 'Sesotho', 'st'),
(110, 'Sundanese', 'su'),
(111, 'Swedish', 'sv'),
(112, 'Swahili', 'sw'),
(113, 'Tamil', 'ta'),
(114, 'Telugu', 'te'),
(115, 'Tajik', 'tg'),
(116, 'Thai', 'th'),
(117, 'Tigrinya', 'ti'),
(118, 'Turkmen', 'tk'),
(119, 'Tagalog', 'tl'),
(120, 'Setswana', 'tn'),
(121, 'Tonga', 'to'),
(122, 'Turkish', 'tr'),
(123, 'Tsonga', 'ts'),
(124, 'Tatar', 'tt'),
(125, 'Twi', 'tw'),
(126, 'Ukrainian', 'uk'),
(127, 'Urdu', 'ur'),
(128, 'Uzbek', 'uz'),
(129, 'Vietnamese', 'vi'),
(130, 'Volapuk', 'vo'),
(131, 'Wolof', 'wo'),
(132, 'Xhosa', 'xh'),
(133, 'Yoruba', 'yo'),
(134, 'Chinese', 'zh'),
(135, 'Zulu', 'zu');



ALTER TABLE `video_file` ADD `stream_key` VARCHAR(50) NULL AFTER `video_file_id`;
ALTER TABLE `episodes` ADD `stream_key` VARCHAR(50) NULL AFTER `episodes_id`;

-- --------------------------------------------------------

--
-- Table structure for table `live_tv`
--

DROP TABLE IF EXISTS `live_tv`;
CREATE TABLE IF NOT EXISTS `live_tv` (
  `live_tv_id` int(11) NOT NULL AUTO_INCREMENT,
  `tv_name` varchar(200) DEFAULT NULL,
  `slug` longtext,
  `language` varchar(10) DEFAULT 'en',
  `stream_from` varchar(200) DEFAULT NULL,
  `stream_label` varchar(200) DEFAULT NULL,
  `stream_url` varchar(200) DEFAULT NULL,
  `poster` longtext,
  `thumbnail` longtext,
  `focus_keyword` varchar(200) DEFAULT NULL,
  `meta_description` varchar(200) DEFAULT NULL,
  `featured` int(2) DEFAULT '1',
  `tags` varchar(200) DEFAULT NULL,
  `description` longtext,
  `publish` int(10) UNSIGNED DEFAULT '0',
  PRIMARY KEY (`live_tv_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `live_tv_url`
--

DROP TABLE IF EXISTS `live_tv_url`;
CREATE TABLE IF NOT EXISTS `live_tv_url` (
  `live_tv_url_id` int(11) NOT NULL AUTO_INCREMENT,
  `stream_key` varchar(50) DEFAULT NULL,
  `live_tv_id` int(11) DEFAULT NULL,
  `url_for` varchar(200) DEFAULT NULL,
  `source` varchar(200) DEFAULT NULL,
  `label` varchar(200) DEFAULT NULL,
  `quality` varchar(200) DEFAULT NULL,
  `url` text,
  PRIMARY KEY (`live_tv_url_id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `subtitle`
--

DROP TABLE IF EXISTS `subtitle`;
CREATE TABLE IF NOT EXISTS `subtitle` (
  `subtitle_id` int(11) NOT NULL AUTO_INCREMENT,
  `videos_id` int(50) NOT NULL,
  `video_file_id` int(50) DEFAULT NULL,
  `language` varchar(250) COLLATE utf8_unicode_ci DEFAULT NULL,
  `kind` varchar(250) COLLATE utf8_unicode_ci DEFAULT NULL,
  `src` mediumtext COLLATE utf8_unicode_ci,
  `srclang` varchar(5) COLLATE utf8_unicode_ci DEFAULT NULL,
  `common` int(2) DEFAULT '0',
  `status` int(2) DEFAULT '1',
  PRIMARY KEY (`subtitle_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

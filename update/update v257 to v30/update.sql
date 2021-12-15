-- phpMyAdmin SQL Dump
-- version 4.5.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Jan 29, 2019 at 07:05 PM
-- Server version: 5.7.11
-- PHP Version: 5.6.19

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;


UPDATE `ads` SET `ads_name` = 'Sidebar', `unique_name` = 'sidebar', `ads_size` = '300x600' WHERE `ads`.`ads_id` = 9;
INSERT INTO `ads` (`ads_id`, `ads_name`, `unique_name`, `ads_size`, `ads_type`, `ads_url`, `ads_image_url`, `ads_code`, `enable`) VALUES
(12, 'Billboard(For movie,Landing page & watch page)', 'billboard', '970x250', 'code', '#', 'uploads/ads/970x250.jpg', '', 0);

ALTER TABLE `genre` ADD `featured` INT NULL DEFAULT '0' AFTER `name`;



ALTER TABLE `live_tv` ADD `seo_title` VARCHAR(250) NULL AFTER `tv_name`, ADD `live_tv_category_id` VARCHAR(250) NULL AFTER `seo_title`;
CREATE TABLE `live_tv_category` (
  `live_tv_category_id` int(11) NOT NULL,
  `live_tv_category` varchar(200) DEFAULT NULL,
  `live_tv_category_desc` text,
  `status` int(11) DEFAULT '1'
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `live_tv_category`
--
ALTER TABLE `live_tv_category`
  ADD PRIMARY KEY (`live_tv_category_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `live_tv_category`
--
ALTER TABLE `live_tv_category`
  MODIFY `live_tv_category_id` int(11) NOT NULL AUTO_INCREMENT;
ALTER TABLE `page` ADD `seo_title` VARCHAR(250) NULL AFTER `page_title`;
ALTER TABLE `posts` ADD `seo_title` VARCHAR(250) NULL AFTER `post_title`;

CREATE TABLE `tvseries_subtitle` (
  `tvseries_subtitle_id` int(11) NOT NULL,
  `videos_id` varchar(250) COLLATE utf8_unicode_ci DEFAULT NULL,
  `episodes_id` int(250) DEFAULT NULL,
  `language` varchar(250) COLLATE utf8_unicode_ci DEFAULT NULL,
  `kind` varchar(250) COLLATE utf8_unicode_ci DEFAULT NULL,
  `src` mediumtext COLLATE utf8_unicode_ci,
  `srclang` varchar(5) COLLATE utf8_unicode_ci DEFAULT NULL,
  `common` int(2) DEFAULT '0',
  `status` int(2) DEFAULT '1'
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tvseries_subtitle`
--
ALTER TABLE `tvseries_subtitle`
  ADD PRIMARY KEY (`tvseries_subtitle_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tvseries_subtitle`
--
ALTER TABLE `tvseries_subtitle`
  MODIFY `tvseries_subtitle_id` int(11) NOT NULL AUTO_INCREMENT;
ALTER TABLE `videos` ADD `seo_title` VARCHAR(250) NULL AFTER `title`;
ALTER TABLE `videos` ADD `today_view` INT(250) NULL DEFAULT '0' AFTER `total_rating`, ADD `weekly_view` INT(250) NULL DEFAULT '0' AFTER `today_view`, ADD `monthly_view` INT(250) NULL DEFAULT '0' AFTER `weekly_view`;
ALTER TABLE `comments`
CHANGE `comment` `comment` text COLLATE 'utf8_unicode_ci' NULL AFTER `replay_for`;
ALTER TABLE `post_comments`
CHANGE `comment` `comment` text COLLATE 'utf8_unicode_ci' NULL AFTER `replay_for`;

CREATE TABLE `cron` (
  `cron_id` int(11) NOT NULL,
  `type` varchar(250) NOT NULL,
  `action` varchar(250) NOT NULL,
  `image_url` longtext DEFAULT NULL,
  `save_to` varchar(250) DEFAULT NULL,
  `videos_id` int(250) DEFAULT NULL,
  `admin_email_from` varchar(250) DEFAULT NULL,
  `admin_email` varchar(250) DEFAULT NULL,
  `email_to` varchar(250) DEFAULT NULL,
  `email_sub` varchar(250) DEFAULT NULL,
  `message` longtext
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `cron`
--
ALTER TABLE `cron`
  ADD PRIMARY KEY (`cron_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `cron`
--
ALTER TABLE `cron`
  MODIFY `cron_id` int(11) NOT NULL AUTO_INCREMENT;

INSERT INTO `config` (`config_id`, `title`, `value`) VALUES
(104, 'registration_enable', '1'),
(105, 'frontend_login_enable', '1'),
(106, 'push_notification_enable', ''),
(107, 'onesignal_appid', 'xxxxxxxxxxxxxxx'),
(108, 'onesignal_actionmessage', 'We\\\'d like to show you notifications for the latest news.'),
(109, 'onesignal_acceptbuttontext', 'ALLOW'),
(110, 'onesignal_cancelbuttontext', 'NO THANKS'),
(111, 'onesignal_api_keys', 'xxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxx'),
(112, 'landing_page_enable', '1'),
(113, 'landing_page_image_url', ''),
(114, 'mobile_apps_api_secret_key', 'api2018forovoo'),
(115, 'country_to_primary_menu', '1'),
(116, 'genre_to_primary_menu', '1'),
(117, 'release_to_primary_menu', '1'),
(118, 'show_star_image', '0'),
(119, 'movie_page_seo_title', 'Movie Page SEO Title'),
(120, 'movie_page_focus_keyword', ''),
(121, 'movie_page_meta_description', ''),
(128, 'dmca_policy_content', 'privacy_policy_contentee'),
(122, 'privacy_policy_content', ''),
(123, 'privacy_policy_to_primary_menu', '0'),
(124, 'privacy_policy_to_footer_menu', '1'),
(125, 'disclaimer_text', '<b>Disclaimer:</b> This site does not store any files on its server. All contents are provided by non-affiliated third parties.'),
(126, 'disclaimer_text_enable', '1'),
(127, 'movie_report_enable', '0'),
(129, 'dmca_to_primary_menu', '0'),
(130, 'dmca_to_footer_menu', '1'),
(131, 'dmca_content', ''),
(132, 'contact_to_primary_menu', '0'),
(133, 'contact_to_footer_menu', '1'),
(134, 'movie_report_note', 'Please help us to describe the issue so we can fix it asap. \r\nNote: This feature used to report issue for current movie, not used for requesting new subtitle/audio in another language'),
(135, 'movie_report_email', 'contact@mydomain.com'),
(136, 'movie_request_enable', '0'),
(137, 'movie_request_email', 'contact@mydomain.com'),
(138, 'envato_support_untill', '2019-01-01'),
(139, 'cron_key', '1234567890123456'),
(140, 'db_backup', '1'),
(141, 'backup_schedule', '1');
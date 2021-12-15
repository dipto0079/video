DROP TABLE IF EXISTS cron;
CREATE TABLE `cron` (
  `cron_id` int(11) NOT NULL,
  `type` varchar(250) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `action` varchar(250) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `image_url` longtext CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `save_to` varchar(250) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `videos_id` int(250) DEFAULT NULL,
  `admin_email_from` varchar(250) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `admin_email` varchar(250) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `email_to` varchar(250) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `email_sub` varchar(250) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `message` longtext CHARACTER SET utf32 COLLATE utf32_unicode_ci
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

ALTER TABLE `cron`
  ADD PRIMARY KEY (`cron_id`);

ALTER TABLE `cron`
  MODIFY `cron_id` int(11) NOT NULL AUTO_INCREMENT;
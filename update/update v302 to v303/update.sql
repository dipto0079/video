DELETE FROM config WHERE title = 'mobile_apps_api_secret_key';
DELETE FROM config WHERE title = 'version';
INSERT INTO `config` (`config_id`, `title`, `value`) VALUES (NULL, 'mobile_apps_api_secret_key', '1kkfhferpae5x178fny1fagc');
INSERT INTO `config` (`config_id`, `title`, `value`) VALUES (NULL, 'version', '3.0.3');
ALTER TABLE `episodes` ADD `date_added` DATETIME NULL DEFAULT '2019-04-04 00:00:00' AFTER `file_url`;
ALTER TABLE `videos` ADD `last_ep_added` DATETIME NULL DEFAULT '2019-04-04 00:00:00' AFTER `total_view`;
-- phpMyAdmin SQL Dump
-- version 4.9.0.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost:8889
-- Generation Time: Dec 09, 2019 at 04:55 PM
-- Server version: 5.7.26
-- PHP Version: 7.3.8

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `v310`
--
UPDATE `config` SET `value` = '3.1.0' WHERE `config`.`title` = 'version';
ALTER TABLE `video_file` ADD `order` INT(50) NOT NULL DEFAULT '0' AFTER `file_url`;
ALTER TABLE `video_file` ADD `label` VARCHAR(250) NOT NULL DEFAULT 'Server' AFTER `source_type`;
ALTER TABLE `episodes` ADD `order` INT(50) NOT NULL DEFAULT '0' AFTER `date_added`;
ALTER TABLE `seasons` ADD `order` INT(50) NOT NULL DEFAULT '0' AFTER `seasons_name`;
ALTER TABLE `live_tv_category` ADD `slug` VARCHAR(250) NOT NULL DEFAULT 'change-slug' AFTER `live_tv_category_desc`;
INSERT INTO `config` (`config_id`, `title`, `value`) VALUES (NULL, 'timezone', 'Asia/Dhaka');



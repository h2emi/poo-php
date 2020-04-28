-- Adminer 4.7.6 MySQL dump

SET NAMES utf8;
SET time_zone = '+00:00';
SET foreign_key_checks = 0;
SET sql_mode = 'NO_AUTO_VALUE_ON_ZERO';

CREATE DATABASE `poo` /*!40100 DEFAULT CHARACTER SET utf8 COLLATE utf8_bin */ /*!80016 DEFAULT ENCRYPTION='N' */;
USE `poo`;

CREATE TABLE `Category` (
  `cat_id` int NOT NULL AUTO_INCREMENT,
  `cat_name` varchar(255) COLLATE utf8_bin NOT NULL,
  PRIMARY KEY (`cat_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

INSERT INTO `Category` (`cat_id`, `cat_name`) VALUES
(1,	'vivaces'),
(2,	'tubercules'),
(3,	'bulbe'),
(4,	'liane');

CREATE TABLE `Plante` (
  `plant_id` int NOT NULL AUTO_INCREMENT,
  `plant_name` varchar(255) COLLATE utf8_bin NOT NULL,
  `plant_price` int NOT NULL,
  `plant_category` int NOT NULL,
  PRIMARY KEY (`plant_id`),
  KEY `plant_category` (`plant_category`),
  CONSTRAINT `Plante_ibfk_1` FOREIGN KEY (`plant_category`) REFERENCES `Category` (`cat_id`) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

INSERT INTO `Plante` (`plant_id`, `plant_name`, `plant_price`, `plant_category`) VALUES
(1,	'dahlias',	6,	3),
(2,	'glaieul',	9,	2),
(3,	'basilic',	5,	1),
(4,	'vignes',	12,	4);

-- 2020-04-28 18:48:06

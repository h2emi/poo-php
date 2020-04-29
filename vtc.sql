-- Adminer 4.7.6 MySQL dump

SET NAMES utf8;
SET time_zone = '+00:00';
SET foreign_key_checks = 0;
SET sql_mode = 'NO_AUTO_VALUE_ON_ZERO';

CREATE DATABASE `vtc` /*!40100 DEFAULT CHARACTER SET utf8 COLLATE utf8_bin */ /*!80016 DEFAULT ENCRYPTION='N' */;
USE `vtc`;

CREATE TABLE `Association_vehicule_conducteur` (
  `asso_id` int NOT NULL AUTO_INCREMENT,
  `asso_id_vehicule` int NOT NULL,
  `asso_id_conducteur` int NOT NULL,
  PRIMARY KEY (`asso_id`),
  KEY `asso_vehicule` (`asso_id_vehicule`),
  KEY `asso_conducteur` (`asso_id_conducteur`),
  CONSTRAINT `Association_vehicule_conducteur_ibfk_1` FOREIGN KEY (`asso_id_vehicule`) REFERENCES `Vehicule` (`veh_id`) ON DELETE CASCADE,
  CONSTRAINT `Association_vehicule_conducteur_ibfk_2` FOREIGN KEY (`asso_id_conducteur`) REFERENCES `Conducteur` (`con_id`) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

INSERT INTO `Association_vehicule_conducteur` (`asso_id`, `asso_id_vehicule`, `asso_id_conducteur`) VALUES
(1,	501,	1),
(2,	502,	2),
(3,	503,	3),
(4,	504,	4),
(5,	501,	3);

CREATE TABLE `Conducteur` (
  `con_id` int NOT NULL AUTO_INCREMENT,
  `con_prenom` varchar(255) COLLATE utf8_bin NOT NULL,
  `con_nom` varchar(255) COLLATE utf8_bin NOT NULL,
  PRIMARY KEY (`con_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

INSERT INTO `Conducteur` (`con_id`, `con_prenom`, `con_nom`) VALUES
(1,	'julien',	'avigny'),
(2,	'morgane',	'alamia'),
(3,	'philippe',	'pandre'),
(4,	'amelie',	'blondelle'),
(5,	'alex',	'richy'),
(7,	'emilie',	'flick');

CREATE TABLE `Vehicule` (
  `veh_id` int NOT NULL AUTO_INCREMENT,
  `veh_marque` varchar(255) COLLATE utf8_bin NOT NULL,
  `veh_modele` varchar(255) COLLATE utf8_bin NOT NULL,
  `veh_couleur` varchar(255) COLLATE utf8_bin NOT NULL,
  `veh_immatriculation` varchar(255) COLLATE utf8_bin NOT NULL,
  PRIMARY KEY (`veh_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

INSERT INTO `Vehicule` (`veh_id`, `veh_marque`, `veh_modele`, `veh_couleur`, `veh_immatriculation`) VALUES
(501,	'Peugeot',	'807',	'noir',	'AB-355-CA'),
(502,	'Citroen',	'C8',	'bleu',	'CE-122-AE'),
(503,	'Mercedes',	'Cls',	'vert',	'FH-953-HI'),
(504,	'Volkswagen',	'Touran',	'noir',	'SO-322-NV'),
(505,	'Skoda',	'Octavia',	'gris',	'PB-631-TK'),
(506,	'Volkswagen',	'Passat',	'gris',	'XN-973-MM'),
(507,	'peugeot',	'208',	'rouge',	'AA-666-BB');

-- 2020-04-29 14:58:55

-- Adminer 4.7.6 MySQL dump

SET NAMES utf8;
SET time_zone = '+00:00';
SET foreign_key_checks = 0;
SET sql_mode = 'NO_AUTO_VALUE_ON_ZERO';

CREATE DATABASE `Smala` /*!40100 DEFAULT CHARACTER SET utf8 COLLATE utf8_bin */ /*!80016 DEFAULT ENCRYPTION='N' */;
USE `Smala`;

CREATE TABLE `Smala_images` (
  `image_id` int NOT NULL AUTO_INCREMENT,
  `image_chemin` varchar(255) COLLATE utf8_bin NOT NULL,
  `image_titre` varchar(255) COLLATE utf8_bin NOT NULL,
  PRIMARY KEY (`image_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;


CREATE TABLE `Smala_users` (
  `user_id` int NOT NULL AUTO_INCREMENT,
  `user_email` varchar(255) COLLATE utf8_bin NOT NULL,
  `user_password` varchar(255) COLLATE utf8_bin NOT NULL,
  `user_role` varchar(255) COLLATE utf8_bin NOT NULL,
  PRIMARY KEY (`user_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

INSERT INTO `Smala_users` (`user_id`, `user_email`, `user_password`, `user_role`) VALUES
(1,	'admin@admin.com',	'$2y$10$sg5XY0HRTTN5pFOt8oEDs.wnAkJXRrLsCQqRxmLXSv5aAa8aUJqza',	'admin');

CREATE TABLE `Smala_assoc_users_images` (
  `assoc_id` int NOT NULL AUTO_INCREMENT,
  `assoc_users_id` int NOT NULL,
  `assoc_images_id` int NOT NULL,
  PRIMARY KEY (`assoc_id`),
  KEY `assoc_users_id` (`assoc_users_id`),
  KEY `assoc_images_id` (`assoc_images_id`),
  CONSTRAINT `Smala_assoc_users_images_ibfk_1` FOREIGN KEY (`assoc_users_id`) REFERENCES `Smala_users` (`user_id`),
  CONSTRAINT `Smala_assoc_users_images_ibfk_5` FOREIGN KEY (`assoc_images_id`) REFERENCES `Smala_images` (`image_id`) ON DELETE CASCADE ON UPDATE RESTRICT
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;


-- 2021-03-10 14:48:01

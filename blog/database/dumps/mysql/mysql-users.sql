/*
SQLyog Community Edition- MySQL GUI v6.07
Host - 5.5.5-10.1.19-MariaDB : Database - blogusers
*********************************************************************
Server version : 5.5.5-10.1.19-MariaDB
*/

/*!40101 SET NAMES utf8 */;

/*!40101 SET SQL_MODE=''*/;

create database if not exists `blogusers`;

USE `blogusers`;

/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;

/*Table structure for table `users` */

DROP TABLE IF EXISTS `users`;

CREATE TABLE `users` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `users_email_unique` (`email`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

/*Data for the table `users` */

insert  into `users`(`id`,`name`,`email`,`password`,`remember_token`,`created_at`,`updated_at`) values (2,'Jose Joaquin Gamboa','jose_9515@hotmail.com','$2y$10$yaPUU893f.tRIk41mFTyHuEISUFVroEV/YaRoDLWwr8W18AQD4j6.','Lb9HTJKz7KCUc81dUxhk4IkLB7S9i4cqy0hYlQLG9X6L0zy9zmQSafOvtb0Q','2016-12-19 08:23:20','2016-12-20 20:05:49'),(3,'jose gmail','jose9515@gmail.com','$2y$10$WPSYoxhumx.INE7hhJnZ6eiibnL.Lh4el4WGzIQDAcACuXnbJ7ema',NULL,'2016-12-20 20:06:18','2016-12-20 20:06:18');

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;

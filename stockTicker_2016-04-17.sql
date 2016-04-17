# ************************************************************
# Sequel Pro SQL dump
# Version 4541
#
# http://www.sequelpro.com/
# https://github.com/sequelpro/sequelpro
#
# Host: 127.0.0.1 (MySQL 5.5.42)
# Database: stockTicker
# Generation Time: 2016-04-17 09:03:36 +0000
# ************************************************************


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;


# Dump of table holding
# ------------------------------------------------------------

DROP TABLE IF EXISTS `holding`;

CREATE TABLE `holding` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `token` varchar(300) DEFAULT NULL,
  `stock` varchar(10) DEFAULT NULL,
  `player` varchar(20) DEFAULT NULL,
  `quantity` int(10) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;



# Dump of table movements
# ------------------------------------------------------------

DROP TABLE IF EXISTS `movements`;

CREATE TABLE `movements` (
  `Datetime` varchar(19) DEFAULT NULL,
  `Name` text,
  `Action` varchar(4) DEFAULT NULL,
  `Amount` int(2) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

LOCK TABLES `movements` WRITE;
/*!40000 ALTER TABLE `movements` DISABLE KEYS */;

INSERT INTO `movements` (`Datetime`, `Name`, `Action`, `Amount`)
VALUES
	('2016.02.01-09:01:00','Apple','down',5),
	('2016.02.01-09:01:02','IND','div',5),
	('2016.02.01-09:01:04','OIL','down',10),
	('2016.02.01-09:01:06','GOLD','div',5),
	('2016.02.01-09:01:08','Apple','up',20),
	('2016.02.01-09:01:10','GOLD','div',5),
	('2016.02.01-09:01:12','GOLD','down',20),
	('2016.02.01-09:01:14','IND','div',10),
	('2016.02.01-09:01:16','OIL','up',20),
	('2016.02.01-09:01:18','BOND','down',5),
	('2016.02.01-09:01:20','BOND','up',5),
	('2016.02.01-09:01:22','BOND','div',20),
	('2016.02.01-09:01:24','BOND','div',20),
	('2016.02.01-09:01:26','GOLD','div',20),
	('2016.02.01-09:01:28','IND','up',20),
	('2016.02.01-09:01:30','OIL','down',20),
	('2016.02.01-09:01:32','GRAN','down',20),
	('2016.02.01-09:01:34','BOND','up',5),
	('2016.02.01-09:01:36','GOLD','down',20),
	('2016.02.01-09:01:38','GOLD','down',20),
	('2016.02.01-09:01:40','TECH','down',20),
	('2016.02.01-09:01:42','TECH','up',5),
	('2016.02.01-09:01:44','OIL','up',20),
	('2016.02.01-09:01:46','BOND','up',5),
	('2016.02.01-09:01:48','GOLD','div',10),
	('2016.02.01-09:01:50','GOLD','down',5),
	('2016.02.01-09:01:52','GOLD','up',20),
	('2016.02.01-09:01:54','IND','down',10),
	('2016.02.01-09:01:56','GOLD','div',20);

/*!40000 ALTER TABLE `movements` ENABLE KEYS */;
UNLOCK TABLES;


# Dump of table players
# ------------------------------------------------------------

DROP TABLE IF EXISTS `players`;

CREATE TABLE `players` (
  `Player` text,
  `Cash` int(4) DEFAULT NULL,
  `Equity` int(11) DEFAULT NULL,
  `Username` text
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

LOCK TABLES `players` WRITE;
/*!40000 ALTER TABLE `players` DISABLE KEYS */;

INSERT INTO `players` (`Player`, `Cash`, `Equity`, `Username`)
VALUES
	('andrew',1000,1000,'andrew'),
	('jan',1000,1000,'jan'),
	('anthony',1000,1000,'anthony'),
	('ricky',1000,1000,'ricky');

/*!40000 ALTER TABLE `players` ENABLE KEYS */;
UNLOCK TABLES;


# Dump of table rounds
# ------------------------------------------------------------

DROP TABLE IF EXISTS `rounds`;

CREATE TABLE `rounds` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `team` varchar(3) NOT NULL DEFAULT '',
  `round` int(11) NOT NULL,
  `token` varchar(255) NOT NULL DEFAULT '',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

LOCK TABLES `rounds` WRITE;
/*!40000 ALTER TABLE `rounds` DISABLE KEYS */;

INSERT INTO `rounds` (`id`, `team`, `round`, `token`)
VALUES
	(0,'',0,''),
	(1,'s34',269,'82fa3c00a1c2b49218f5b44c241ca4a4'),
	(2,'s34',270,'82fa3c00a1c2b49218f5b44c241ca4a4'),
	(3,'s34',271,'82fa3c00a1c2b49218f5b44c241ca4a4'),
	(4,'s34',272,'82fa3c00a1c2b49218f5b44c241ca4a4'),
	(5,'s34',273,'50019b9c3a474fbcdbdc14d3a5e9b36f'),
	(6,'s34',274,'50019b9c3a474fbcdbdc14d3a5e9b36f'),
	(7,'s34',275,'50019b9c3a474fbcdbdc14d3a5e9b36f'),
	(8,'s34',287,'2d4d11f1cc9dac29bf284c66e1ca793f'),
	(9,'s34',288,'2d4d11f1cc9dac29bf284c66e1ca793f'),
	(10,'s34',290,'2d4d11f1cc9dac29bf284c66e1ca793f'),
	(11,'s34',291,'da3db7d9c84c25f7db30dd2c8a204e4d'),
	(12,'s34',306,'66f21a0be200f9c7e4c83d045de20ab9');

/*!40000 ALTER TABLE `rounds` ENABLE KEYS */;
UNLOCK TABLES;


# Dump of table stocks
# ------------------------------------------------------------

DROP TABLE IF EXISTS `stocks`;

CREATE TABLE `stocks` (
  `Code` varchar(4) DEFAULT NULL,
  `Name` varchar(10) DEFAULT NULL,
  `Category` varchar(1) DEFAULT NULL,
  `Value` int(3) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

LOCK TABLES `stocks` WRITE;
/*!40000 ALTER TABLE `stocks` DISABLE KEYS */;

INSERT INTO `stocks` (`Code`, `Name`, `Category`, `Value`)
VALUES
	('BOND','Bond','B',66),
	('GOLD','Gold','B',110),
	('GRAN','Grain','B',113),
	('IND','Industrial','B',39),
	('OIL','Oil','B',52),
	('TECH','Tech','B',37);

/*!40000 ALTER TABLE `stocks` ENABLE KEYS */;
UNLOCK TABLES;


# Dump of table transactions
# ------------------------------------------------------------

DROP TABLE IF EXISTS `transactions`;

CREATE TABLE `transactions` (
  `DateTime` varchar(19) DEFAULT NULL,
  `Player` varchar(6) DEFAULT NULL,
  `Stock` varchar(4) DEFAULT NULL,
  `Trans` varchar(4) DEFAULT NULL,
  `Quantity` int(4) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;



# Dump of table users
# ------------------------------------------------------------

DROP TABLE IF EXISTS `users`;

CREATE TABLE `users` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `username` text NOT NULL,
  `password` text NOT NULL,
  `role` text NOT NULL,
  `avatar` text,
  `Player` text,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

LOCK TABLES `users` WRITE;
/*!40000 ALTER TABLE `users` DISABLE KEYS */;

INSERT INTO `users` (`id`, `username`, `password`, `role`, `avatar`, `Player`)
VALUES
	(16,'andrew','$2y$10$CpLYIks0A6rLcZK4lhs6BOase.UbKIPkqlmGTWHiqoI6eSvSLQOEa','admin','0ob7FdtZgo8DHYz.png','andrew'),
	(18,'jan','$2y$10$QP31bFIK7BPUhhUNTVo.veGuFe.iSfG8POQGgzL00CrgYMABuNOZm','guest','Y61SGnkFsneR7qA.png','jan'),
	(20,'anthony','$2y$10$Rd8qcZ3HkPMRKpJQdXJyWe6Au6q3TKy1eo5icvvaJtJl7vdcWEJXe','admin','3y4HKzK6wIEpbX8.png','anthony'),
	(21,'ricky','$2y$10$TwHkFF7p7EM4N6889ZrnHutmIuXkjtlwBzzBudNzg0/ZkIbG5w5AG','guest','EIGUG4bHd9BRL1w.png','ricky');

/*!40000 ALTER TABLE `users` ENABLE KEYS */;
UNLOCK TABLES;



/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;
/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

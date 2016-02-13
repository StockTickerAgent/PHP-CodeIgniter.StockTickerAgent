# ************************************************************
# Sequel Pro SQL dump
# Version 4500
#
# http://www.sequelpro.com/
# https://github.com/sequelpro/sequelpro
#
# Host: localhost (MySQL 5.5.42)
# Database: StockTicker
# Generation Time: 2016-02-13 03:06:59 +0000
# ************************************************************


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;


# Dump of table movements
# ------------------------------------------------------------

DROP TABLE IF EXISTS `movements`;

CREATE TABLE `movements` (
  `Datetime` varchar(19) DEFAULT NULL,
  `Code` varchar(4) DEFAULT NULL,
  `Action` varchar(4) DEFAULT NULL,
  `Amount` int(2) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

LOCK TABLES `movements` WRITE;
/*!40000 ALTER TABLE `movements` DISABLE KEYS */;

INSERT INTO `movements` (`Datetime`, `Code`, `Action`, `Amount`)
VALUES
	('2016.02.01-09:01:00','BOND','down',5),
	('2016.02.01-09:01:02','IND','div',5),
	('2016.02.01-09:01:04','OIL','down',10),
	('2016.02.01-09:01:06','GOLD','div',5),
	('2016.02.01-09:01:08','BOND','up',20),
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
  `Player` varchar(6) DEFAULT NULL,
  `Cash` int(4) DEFAULT NULL,
  `Equity` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

LOCK TABLES `players` WRITE;
/*!40000 ALTER TABLE `players` DISABLE KEYS */;

INSERT INTO `players` (`Player`, `Cash`, `Equity`)
VALUES
	('Mickey',1000,3000),
	('Donald',3000,4000),
	('George',2000,5000),
	('Henry',2500,6000);

/*!40000 ALTER TABLE `players` ENABLE KEYS */;
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
	('BOND','Bonds','B',66),
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

LOCK TABLES `transactions` WRITE;
/*!40000 ALTER TABLE `transactions` DISABLE KEYS */;

INSERT INTO `transactions` (`DateTime`, `Player`, `Stock`, `Trans`, `Quantity`)
VALUES
	('2016.02.01-09:01:00','Donald','BOND','buy',100),
	('2016.02.01-09:01:05','Donald','TECH','sell',1000),
	('2016.02.01-09:01:10','Henry','TECH','sell',1000),
	('2016.02.01-09:01:15','Donald','IND','sell',1000),
	('2016.02.01-09:01:20','George','GOLD','sell',100),
	('2016.02.01-09:01:25','George','OIL','buy',500),
	('2016.02.01-09:01:30','Henry','GOLD','sell',100),
	('2016.02.01-09:01:35','Henry','GOLD','buy',1000),
	('2016.02.01-09:01:40','Donald','TECH','buy',100),
	('2016.02.01-09:01:45','Donald','OIL','sell',100),
	('2016.02.01-09:01:50','Donald','TECH','sell',100),
	('2016.02.01-09:01:55','George','OIL','buy',100),
	('2016.02.01-09:01:60','George','IND','buy',100),
	('2016.02.01-09:01:50','Mickey','TECH','sell',1000);

/*!40000 ALTER TABLE `transactions` ENABLE KEYS */;
UNLOCK TABLES;



/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;
/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

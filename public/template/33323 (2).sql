-- --------------------------------------------------------
-- Host:                         127.0.0.1
-- Server version:               5.5.38-log - MySQL Community Server (GPL)
-- Server OS:                    Win32
-- HeidiSQL Version:             8.3.0.4694
-- --------------------------------------------------------

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET NAMES utf8 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;

-- Dumping structure for table que.branches
CREATE TABLE IF NOT EXISTS `branches` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(225) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8;

-- Dumping data for table que.branches: ~5 rows (approximately)
DELETE FROM `branches`;
/*!40000 ALTER TABLE `branches` DISABLE KEYS */;
INSERT INTO `branches` (`id`, `name`) VALUES
	(1, 'b1'),
	(2, 'b2'),
	(3, 'b3'),
	(4, 'b4'),
	(5, 'b5');
/*!40000 ALTER TABLE `branches` ENABLE KEYS */;


-- Dumping structure for table que.guests
CREATE TABLE IF NOT EXISTS `guests` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `first_name` varchar(255) DEFAULT NULL,
  `last_name` varchar(255) DEFAULT NULL,
  `phone` varchar(50) DEFAULT NULL,
  `position` int(11) DEFAULT NULL,
  `branch` int(11) DEFAULT NULL,
  `time_reg` timestamp NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `is_inside` tinyint(1) DEFAULT '0',
  `prev_position` varchar(50) DEFAULT NULL,
  `time_prev` timestamp NULL DEFAULT NULL,
  `time_left` timestamp NULL DEFAULT NULL,
  `time_come` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `FK_guests_position` (`position`),
  KEY `FK_guests_branch` (`branch`),
  CONSTRAINT `FK_guests_branch` FOREIGN KEY (`branch`) REFERENCES `branches` (`id`),
  CONSTRAINT `FK_guests_position` FOREIGN KEY (`position`) REFERENCES `position` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=utf8;

-- Dumping data for table que.guests: ~5 rows (approximately)
DELETE FROM `guests`;
/*!40000 ALTER TABLE `guests` DISABLE KEYS */;
INSERT INTO `guests` (`id`, `first_name`, `last_name`, `phone`, `position`, `branch`, `time_reg`, `is_inside`, `prev_position`, `time_prev`, `time_left`, `time_come`) VALUES
	(2, 'asdfasdfas', 'dfasdfasdf', '11111', 2, 3, '2015-06-15 17:05:48', 1, NULL, NULL, NULL, NULL),
	(3, 'tvryh34ch4t', 'tscgrtgwergwerg', '4423452345', 2, 1, '2015-06-15 17:25:25', 3, '1', '2015-06-15 18:25:32', '2015-06-15 18:25:42', NULL),
	(4, 'asdfasdf', 'asdfasdfasdf', '05232659745', 1, NULL, '2015-06-15 17:40:47', 4, NULL, NULL, NULL, NULL),
	(5, 'fghdfghdf', 'ghdfghdfgh', '0264546545', 2, 1, '2015-06-15 17:01:37', 1, NULL, NULL, NULL, NULL),
	(6, 'asdfasdfa', 'sdfasdf', '34523452345', 1, NULL, '2015-06-15 17:01:38', 0, NULL, NULL, NULL, NULL);
/*!40000 ALTER TABLE `guests` ENABLE KEYS */;


-- Dumping structure for table que.position
CREATE TABLE IF NOT EXISTS `position` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=20 DEFAULT CHARSET=utf8;

-- Dumping data for table que.position: ~3 rows (approximately)
DELETE FROM `position`;
/*!40000 ALTER TABLE `position` DISABLE KEYS */;
INSERT INTO `position` (`id`, `name`) VALUES
	(1, 'Registration'),
	(2, 'Distribution'),
	(3, 'Test Drive');
/*!40000 ALTER TABLE `position` ENABLE KEYS */;
/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IF(@OLD_FOREIGN_KEY_CHECKS IS NULL, 1, @OLD_FOREIGN_KEY_CHECKS) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;

-- --------------------------------------------------------
-- Хост:                         localhost
-- Версия сервера:               5.6.22-log - MySQL Community Server (GPL)
-- ОС Сервера:                   Win32
-- HeidiSQL Версия:              9.1.0.4867
-- --------------------------------------------------------

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET NAMES utf8mb4 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;

-- Дамп структуры для таблица que.branches
CREATE TABLE IF NOT EXISTS `branches` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(225) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=21 DEFAULT CHARSET=utf8;

-- Дамп данных таблицы que.branches: ~10 rows (приблизительно)
DELETE FROM `branches`;
/*!40000 ALTER TABLE `branches` DISABLE KEYS */;
INSERT INTO `branches` (`id`, `title`) VALUES
	(1, 'תל אביב'),
	(2, 'חיפה'),
	(3, 'רעננה'),
	(4, 'חדרה'),
	(5, 'ירושלים'),
	(6, 'נתניה'),
	(7, 'עכו'),
	(8, 'נצרת'),
	(9, 'אשדוד'),
	(10, 'פתרון בעיות');
/*!40000 ALTER TABLE `branches` ENABLE KEYS */;


-- Дамп структуры для таблица que.guests
CREATE TABLE IF NOT EXISTS `guests` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `first_name` varchar(255) DEFAULT NULL,
  `last_name` varchar(255) DEFAULT NULL,
  `phone` varchar(50) DEFAULT NULL,
  `position` int(11) DEFAULT NULL,
  `branch` int(11) DEFAULT NULL,
  `last_stage` tinyint(1) DEFAULT NULL,
  `time_reg` timestamp NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `is_inside` tinyint(1) DEFAULT '0',
  `prev_position` varchar(50) DEFAULT NULL,
  `time_prev` timestamp NULL DEFAULT NULL,
  `time_left` timestamp NULL DEFAULT NULL,
  `time_come` timestamp NULL DEFAULT NULL,
  `table` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `FK_guests_position` (`position`),
  KEY `FK_guests_branch` (`branch`),
  KEY `FK_guests_tables` (`table`),
  CONSTRAINT `FK_guests_branch` FOREIGN KEY (`branch`) REFERENCES `branches` (`id`),
  CONSTRAINT `FK_guests_position` FOREIGN KEY (`position`) REFERENCES `position` (`id`),
  CONSTRAINT `FK_guests_tables` FOREIGN KEY (`table`) REFERENCES `tables` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8;

-- Дамп данных таблицы que.guests: ~5 rows (приблизительно)
DELETE FROM `guests`;
/*!40000 ALTER TABLE `guests` DISABLE KEYS */;
INSERT INTO `guests` (`id`, `first_name`, `last_name`, `phone`, `position`, `branch`, `last_stage`, `time_reg`, `is_inside`, `prev_position`, `time_prev`, `time_left`, `time_come`, `table`) VALUES
	(1, 'Roman', 'Bunshaft', '0526816925', 2, 1, 1, '2015-06-21 00:51:45', 6, '1', '2015-06-21 00:36:56', NULL, NULL, 2),
	(2, 'Avi', 'Munk', '0543330652', 2, 1, 1, '2015-06-21 00:51:51', 6, '1', '2015-06-21 00:36:29', NULL, NULL, 3),
	(3, 'Shay', 'Lavi', '0524847818', 2, 1, 1, '2015-06-21 00:51:55', 6, '1', '2015-06-21 00:37:16', NULL, NULL, 4),
	(4, 'Larisa', 'Bunshaft', '0526816806', 2, 1, 1, '2015-06-21 00:51:49', 7, '1', '2015-06-21 00:13:01', NULL, NULL, 1),
	(5, 'David', 'Levi', '0553362659', 2, 3, 1, '2015-06-21 01:14:20', 1, '1', '2015-06-21 00:57:16', NULL, NULL, NULL);
/*!40000 ALTER TABLE `guests` ENABLE KEYS */;


-- Дамп структуры для таблица que.position
CREATE TABLE IF NOT EXISTS `position` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=20 DEFAULT CHARSET=utf8;

-- Дамп данных таблицы que.position: ~3 rows (приблизительно)
DELETE FROM `position`;
/*!40000 ALTER TABLE `position` DISABLE KEYS */;
INSERT INTO `position` (`id`, `name`) VALUES
	(1, 'Registration'),
	(2, 'Distribution'),
	(3, 'Test Drive');
/*!40000 ALTER TABLE `position` ENABLE KEYS */;


-- Дамп структуры для таблица que.tables
CREATE TABLE IF NOT EXISTS `tables` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(255) DEFAULT NULL,
  `branch` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `FK_subbranch_branches` (`branch`),
  CONSTRAINT `FK_subbranch_branches` FOREIGN KEY (`branch`) REFERENCES `branches` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8;

-- Дамп данных таблицы que.tables: ~16 rows (приблизительно)
DELETE FROM `tables`;
/*!40000 ALTER TABLE `tables` DISABLE KEYS */;
INSERT INTO `tables` (`id`, `title`, `branch`) VALUES
	(1, 'תל אביב 1', 1),
	(2, 'תל אביב 2', 1),
	(3, 'תל אביב 3', 1),
	(4, 'תל אביב 4', 1),
	(5, 'תל אביב 5', 1),
	(7, NULL, 2),
	(8, NULL, 2),
	(9, NULL, 3),
	(10, NULL, 3),
	(11, NULL, 4),
	(12, NULL, 5),
	(13, NULL, 6),
	(14, NULL, 7),
	(15, NULL, 8),
	(16, NULL, 9),
	(17, NULL, 10);
/*!40000 ALTER TABLE `tables` ENABLE KEYS */;
/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IF(@OLD_FOREIGN_KEY_CHECKS IS NULL, 1, @OLD_FOREIGN_KEY_CHECKS) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;

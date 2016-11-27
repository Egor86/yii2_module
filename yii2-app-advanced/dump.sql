-- --------------------------------------------------------
-- Хост:                         127.0.0.1
-- Версия сервера:               10.1.10-MariaDB - mariadb.org binary distribution
-- ОС Сервера:                   Win32
-- HeidiSQL Версия:              9.3.0.4984
-- --------------------------------------------------------

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET NAMES utf8mb4 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;

-- Дамп структуры для таблица test_db.form
CREATE TABLE IF NOT EXISTS `form` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(50) NOT NULL,
  `status` tinyint(1) unsigned NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8;

-- Дамп данных таблицы test_db.form: ~2 rows (приблизительно)
/*!40000 ALTER TABLE `form` DISABLE KEYS */;
INSERT INTO `form` (`id`, `name`, `status`) VALUES
	(1, 'test', 0),
	(2, 'test666', 1),
	(3, 'test3', 0);
/*!40000 ALTER TABLE `form` ENABLE KEYS */;


-- Дамп структуры для таблица test_db.form_data
CREATE TABLE IF NOT EXISTS `form_data` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `input` varchar(50) DEFAULT NULL,
  `date` date DEFAULT NULL,
  `checkbox` varchar(50) DEFAULT NULL,
  `option` varchar(50) DEFAULT NULL,
  `textarea` text,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- Дамп данных таблицы test_db.form_data: ~0 rows (приблизительно)
/*!40000 ALTER TABLE `form_data` DISABLE KEYS */;
/*!40000 ALTER TABLE `form_data` ENABLE KEYS */;


-- Дамп структуры для таблица test_db.input
CREATE TABLE IF NOT EXISTS `input` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `form_id` int(10) unsigned NOT NULL,
  `input_id` tinyint(1) unsigned NOT NULL,
  `default` varchar(50) COLLATE utf8_german2_ci NOT NULL,
  `placeholder` varchar(50) COLLATE utf8_german2_ci NOT NULL,
  `required` tinyint(1) unsigned NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`),
  KEY `FK1_form_id` (`form_id`),
  CONSTRAINT `FK1_form_id` FOREIGN KEY (`form_id`) REFERENCES `form` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8 COLLATE=utf8_german2_ci;

-- Дамп данных таблицы test_db.input: ~6 rows (приблизительно)
/*!40000 ALTER TABLE `input` DISABLE KEYS */;
INSERT INTO `input` (`id`, `form_id`, `input_id`, `default`, `placeholder`, `required`) VALUES
	(1, 1, 0, 'testDefault', 'testPlaceholder', 0),
	(2, 1, 1, 'testDefault2', 'testPlaceholdert2', 0),
	(3, 1, 4, 'testDefault3', 'testPlaceholdert3', 1),
	(4, 2, 2, '111', 'checkbox', 0),
	(5, 2, 3, 'option1 options2 options3', 'select', 1),
	(6, 2, 0, 'Placeholder', '', 1);
/*!40000 ALTER TABLE `input` ENABLE KEYS */;


-- Дамп структуры для таблица test_db.inputs_data
CREATE TABLE IF NOT EXISTS `inputs_data` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `input0` varchar(255) DEFAULT NULL,
  `input1` varchar(255) DEFAULT NULL,
  `input2` varchar(255) DEFAULT NULL,
  `input3` varchar(255) DEFAULT NULL,
  `input4` varchar(255) DEFAULT NULL,
  `input6` varchar(255) DEFAULT NULL,
  `form_id` int(10) unsigned NOT NULL,
  PRIMARY KEY (`id`),
  KEY `FK1_inputs_data_form_id` (`form_id`),
  CONSTRAINT `FK1_inputs_data_form_id` FOREIGN KEY (`form_id`) REFERENCES `form` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8;

-- Дамп данных таблицы test_db.inputs_data: ~0 rows (приблизительно)
/*!40000 ALTER TABLE `inputs_data` DISABLE KEYS */;
INSERT INTO `inputs_data` (`id`, `input0`, `input1`, `input2`, `input3`, `input4`, `input6`, `form_id`) VALUES
	(1, 'on', '2', 'text input', NULL, NULL, NULL, 2),
	(2, 'on', '2', 'text input3', NULL, NULL, NULL, 2),
	(3, NULL, '1', 'text input222', NULL, NULL, NULL, 2),
	(4, '111', '1', 'Placeholder', NULL, NULL, NULL, 2);
/*!40000 ALTER TABLE `inputs_data` ENABLE KEYS */;


-- Дамп структуры для таблица test_db.person_data
CREATE TABLE IF NOT EXISTS `person_data` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(50) NOT NULL,
  `surname` varchar(50) NOT NULL,
  `birth_date` date NOT NULL,
  `phone` varchar(10) NOT NULL,
  `email` varchar(50) NOT NULL,
  `status` tinyint(1) unsigned NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8;

-- Дамп данных таблицы test_db.person_data: ~0 rows (приблизительно)
/*!40000 ALTER TABLE `person_data` DISABLE KEYS */;
INSERT INTO `person_data` (`id`, `name`, `surname`, `birth_date`, `phone`, `email`, `status`) VALUES
	(1, 'Его', 'Егор', '2016-11-10', '1111111111', 'yehor86@mail.ru', 2),
	(2, 'Егор', 'Егор', '2016-11-20', '5555555555', 'yehor86@mail.ru', 0),
	(3, 'Егор', 'Егор', '2016-11-26', '9999999999', 'yehor86@mail.ru', 0);
/*!40000 ALTER TABLE `person_data` ENABLE KEYS */;


-- Дамп структуры для таблица test_db.user
CREATE TABLE IF NOT EXISTS `user` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `auth_key` varchar(32) COLLATE utf8_unicode_ci NOT NULL,
  `password_hash` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `password_reset_token` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `status` smallint(6) NOT NULL DEFAULT '10',
  `created_at` int(11) NOT NULL,
  `updated_at` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `username` (`username`),
  UNIQUE KEY `email` (`email`),
  UNIQUE KEY `password_reset_token` (`password_reset_token`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- Дамп данных таблицы test_db.user: ~0 rows (приблизительно)
/*!40000 ALTER TABLE `user` DISABLE KEYS */;
INSERT INTO `user` (`id`, `username`, `auth_key`, `password_hash`, `password_reset_token`, `email`, `status`, `created_at`, `updated_at`) VALUES
	(1, 'egor', 'pllE8mYjvgNwn4uDo98hxjxYMGL9qYwb', '$2y$13$l5HmrXRMqPiTCCCDRfSUQOLoo79F8q7g4gB4XElDvFUoHFI8XLD3a', NULL, 'yehor86@mail.ru', 10, 1479839067, 1479839067);
/*!40000 ALTER TABLE `user` ENABLE KEYS */;
/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IF(@OLD_FOREIGN_KEY_CHECKS IS NULL, 1, @OLD_FOREIGN_KEY_CHECKS) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;

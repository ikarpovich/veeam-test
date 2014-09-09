-- phpMyAdmin SQL Dump
-- version 4.0.10.2
-- http://www.phpmyadmin.net
--
-- Хост: localhost
-- Время создания: Сен 09 2014 г., 19:40
-- Версия сервера: 5.1.73
-- Версия PHP: 5.3.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- База данных: `veaamtest`
--

-- --------------------------------------------------------

--
-- Структура таблицы `Department`
--

CREATE TABLE IF NOT EXISTS `Department` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` char(255) COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=3 ;

--
-- Дамп данных таблицы `Department`
--

INSERT INTO `Department` (`id`, `name`) VALUES
(1, 'Business Department'),
(2, 'IT Department');

-- --------------------------------------------------------

--
-- Структура таблицы `Job`
--

CREATE TABLE IF NOT EXISTS `Job` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `department_id` int(11) DEFAULT NULL,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `text` longtext COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`id`),
  KEY `IDX_C395A618AE80F5DF` (`department_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=5 ;

--
-- Дамп данных таблицы `Job`
--

INSERT INTO `Job` (`id`, `department_id`, `name`, `text`) VALUES
(1, 1, 'Business Analyst', 'Job description for the Business Analyst'),
(2, 1, 'Accountant', 'Job description for the Accountant'),
(3, 2, 'Software Engineer', 'Job description for the Software Engeneer'),
(4, 2, 'QA Engineer', 'Job description for the QA Engineer');

-- --------------------------------------------------------

--
-- Структура таблицы `JobLanguage`
--

CREATE TABLE IF NOT EXISTS `JobLanguage` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `job_id` int(11) DEFAULT NULL,
  `language` char(2) COLLATE utf8_unicode_ci NOT NULL,
  `text` longtext COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`id`),
  KEY `IDX_4596CAD2BE04EA9` (`job_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=4 ;

--
-- Дамп данных таблицы `JobLanguage`
--

INSERT INTO `JobLanguage` (`id`, `job_id`, `language`, `text`) VALUES
(1, 1, 'ru', 'Job description in Russian'),
(2, 3, 'de', 'Job description in Deutsch'),
(3, 3, 'ru', 'Another Description in Russia');

-- --------------------------------------------------------

--
-- Структура таблицы `Language`
--

CREATE TABLE IF NOT EXISTS `Language` (
  `id` char(2) COLLATE utf8_unicode_ci NOT NULL,
  `name` char(255) COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Дамп данных таблицы `Language`
--

INSERT INTO `Language` (`id`, `name`) VALUES
('de', 'Deutsch'),
('ru', 'Russian');

--
-- Ограничения внешнего ключа сохраненных таблиц
--

--
-- Ограничения внешнего ключа таблицы `Job`
--
ALTER TABLE `Job`
  ADD CONSTRAINT `FK_C395A618AE80F5DF` FOREIGN KEY (`department_id`) REFERENCES `Department` (`id`);

--
-- Ограничения внешнего ключа таблицы `JobLanguage`
--
ALTER TABLE `JobLanguage`
  ADD CONSTRAINT `FK_4596CAD2BE04EA9` FOREIGN KEY (`job_id`) REFERENCES `Job` (`id`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

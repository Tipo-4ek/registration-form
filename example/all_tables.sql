-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Хост: localhost
-- Время создания: Дек 21 2022 г., 21:23
-- Версия сервера: 5.7.35-38
-- Версия PHP: 7.4.26

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- База данных: `tipo4ek_snkform`
--

-- --------------------------------------------------------

--
-- Структура таблицы `full_edu`
--

CREATE TABLE IF NOT EXISTS `full_edu` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(100) CHARACTER SET utf8 NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4;

--
-- Дамп данных таблицы `full_edu`
--

INSERT INTO `full_edu` (`id`, `name`) VALUES
(1, 'Новосибирский Государственный Медицинскй Университет'),
(2, 'Новосибирский государственный технический университет');

-- --------------------------------------------------------

--
-- Структура таблицы `section`
--

CREATE TABLE IF NOT EXISTS `section` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(100) CHARACTER SET utf8 NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4;

--
-- Дамп данных таблицы `section`
--

INSERT INTO `section` (`id`, `name`) VALUES
(2, 'Секция 1'),
(3, 'Секция 2'),
(4, 'Секция 3');

-- --------------------------------------------------------

--
-- Структура таблицы `short_edu`
--

CREATE TABLE IF NOT EXISTS `short_edu` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `full_edu_id` int(11) NOT NULL,
  `name` varchar(100) CHARACTER SET utf8 NOT NULL,
  PRIMARY KEY (`id`),
  KEY `full_edu_id` (`full_edu_id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4;

--
-- Дамп данных таблицы `short_edu`
--

INSERT INTO `short_edu` (`id`, `full_edu_id`, `name`) VALUES
(1, 1, 'НГМУ'),
(2, 2, 'НГТУ');

-- --------------------------------------------------------

--
-- Структура таблицы `subsection`
--

CREATE TABLE IF NOT EXISTS `subsection` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `section_id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `section_id` (`section_id`)
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=utf8mb4;

--
-- Дамп данных таблицы `subsection`
--

INSERT INTO `subsection` (`id`, `section_id`, `name`) VALUES
(5, 2, 'Подсекция1 к Секции 1'),
(6, 2, 'Подсекция2 к Секции 1'),
(7, 3, 'Подсекция1 к Секции 2'),
(8, 3, 'Подсекция2 к Секции 2');

--
-- Ограничения внешнего ключа сохраненных таблиц
--

--
-- Ограничения внешнего ключа таблицы `short_edu`
--
ALTER TABLE `short_edu`
  ADD CONSTRAINT `short_edu_ibfk_1` FOREIGN KEY (`full_edu_id`) REFERENCES `full_edu` (`id`) ON UPDATE CASCADE;

--
-- Ограничения внешнего ключа таблицы `subsection`
--
ALTER TABLE `subsection`
  ADD CONSTRAINT `subsection_ibfk_1` FOREIGN KEY (`section_id`) REFERENCES `section` (`id`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

-- phpMyAdmin SQL Dump
-- version 4.8.3
-- https://www.phpmyadmin.net/
--
-- Хост: 127.0.0.1
-- Время создания: Мар 28 2019 г., 18:44
-- Версия сервера: 10.1.36-MariaDB
-- Версия PHP: 7.2.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- База данных: `brave`
--

-- --------------------------------------------------------

--
-- Структура таблицы `city`
--

CREATE TABLE `city` (
  `id` int(10) UNSIGNED NOT NULL,
  `listofcity` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `country_id` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Дамп данных таблицы `city`
--

INSERT INTO `city` (`id`, `listofcity`, `country_id`) VALUES
(1, 'Москва', 1),
(2, 'Санкт-Петербург', 1),
(3, 'Ижевск', 1),
(4, 'Омск', 1),
(5, 'Пермь', 1),
(6, 'Екатеринбург', 1),
(7, 'Казань', 1),
(8, 'Нижний Новгород', 1),
(9, 'Сочи', 1),
(10, 'Владивосток', 1),
(11, 'Вашингтон', 2),
(12, 'Нью-Йорк', 2),
(13, 'Майами', 2),
(14, 'Лос Анджелес', 2),
(15, 'Лас Вегас', 2),
(16, 'Чикаго', 2),
(17, 'Бостон', 2),
(18, 'Детройт', 2),
(19, 'Сан-Диего', 2),
(20, 'Сан-Франциско', 2),
(21, 'Лондон', 3),
(22, 'Манчестер', 3),
(23, 'Оксфорд', 3),
(24, 'Ливерпуль', 3),
(25, 'Бирмингем', 3),
(26, 'Эдинбург', 3),
(27, 'Кембридж', 3),
(28, 'Глазго', 3),
(29, 'Бристоль', 3),
(30, 'Йорк', 3),
(31, 'Лидс', 3),
(32, 'Париж', 4),
(33, 'Ницца', 4),
(34, 'Марсель', 4),
(35, 'Бордо', 4),
(36, 'Лион', 4),
(37, 'Страсбург', 4),
(38, 'Канны', 4),
(39, 'Тулуза', 4),
(40, 'Лилль', 4),
(41, 'Нант', 4),
(42, 'Мельбурн', 5),
(43, 'Сидней', 5),
(44, 'Перт', 5),
(45, 'Аделаида', 5),
(46, 'Канберра', 5),
(47, 'Брисбен', 5),
(48, 'Дарвин', 5),
(49, 'Хобарт', 5),
(50, 'Кэрнс', 5),
(51, 'Голд-Кост', 5),
(52, 'Амстердам', 6),
(53, 'Роттердам', 6),
(54, 'Гаага', 6),
(55, 'Делфт', 6),
(56, 'Харлем', 6),
(57, 'Лейден', 6),
(58, 'Маастрихт', 6),
(59, 'Утрехт', 6),
(60, 'Эйндховен', 6),
(61, 'Грониген', 6),
(62, 'Неймеген', 6);

-- --------------------------------------------------------

--
-- Структура таблицы `country`
--

CREATE TABLE `country` (
  `id` int(10) UNSIGNED NOT NULL,
  `listofcoutry` varchar(255) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Дамп данных таблицы `country`
--

INSERT INTO `country` (`id`, `listofcoutry`) VALUES
(1, 'Россия'),
(2, 'США'),
(3, 'Великобритания'),
(4, 'Франция'),
(5, 'Австралия'),
(6, 'Нидерланды');

--
-- Индексы сохранённых таблиц
--

--
-- Индексы таблицы `city`
--
ALTER TABLE `city`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `country`
--
ALTER TABLE `country`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT для сохранённых таблиц
--

--
-- AUTO_INCREMENT для таблицы `city`
--
ALTER TABLE `city`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=63;

--
-- AUTO_INCREMENT для таблицы `country`
--
ALTER TABLE `country`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

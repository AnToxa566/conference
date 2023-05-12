-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Хост: 127.0.0.1:3306
-- Время создания: Май 12 2023 г., 11:17
-- Версия сервера: 8.0.30
-- Версия PHP: 7.2.34

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- База данных: `conference_db`
--

-- --------------------------------------------------------

--
-- Структура таблицы `conferences`
--

CREATE TABLE `conferences` (
  `id` int UNSIGNED NOT NULL,
  `title` varchar(255) CHARACTER SET utf8mb3 COLLATE utf8mb3_general_ci NOT NULL,
  `dateTimeEvent` datetime NOT NULL,
  `latitude` float DEFAULT NULL,
  `longitude` float DEFAULT NULL,
  `country` varchar(100) CHARACTER SET utf8mb3 COLLATE utf8mb3_general_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Дамп данных таблицы `conferences`
--

INSERT INTO `conferences` (`id`, `title`, `dateTimeEvent`, `latitude`, `longitude`, `country`) VALUES
(9, 'Распродажа в Novus', '2022-10-16 10:00:00', 50.4142, 30.5384, 'Украина');

-- --------------------------------------------------------

--
-- Структура таблицы `countries`
--

CREATE TABLE `countries` (
  `country_id` int UNSIGNED NOT NULL,
  `country_name` varchar(128) CHARACTER SET utf8mb3 COLLATE utf8mb3_general_ci NOT NULL DEFAULT ''
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;

--
-- Дамп данных таблицы `countries`
--

INSERT INTO `countries` (`country_id`, `country_name`) VALUES
(4, 'Австралия'),
(63, 'Австрия'),
(81, 'Азербайджан'),
(173, 'Ангуилья'),
(177, 'Аргентина'),
(245, 'Армения'),
(248, 'Беларусь'),
(401, 'Белиз'),
(404, 'Бельгия'),
(425, 'Бермуды'),
(428, 'Болгария'),
(467, 'Бразилия'),
(616, 'Великобритания'),
(924, 'Венгрия'),
(971, 'Вьетнам'),
(994, 'Гаити'),
(1007, 'Гваделупа'),
(1012, 'Германия'),
(1206, 'Голландия'),
(1258, 'Греция'),
(1280, 'Грузия'),
(1366, 'Дания'),
(1380, 'Египет'),
(1393, 'Израиль'),
(1451, 'Индия'),
(1663, 'Иран'),
(1696, 'Ирландия'),
(1707, 'Испания'),
(1786, 'Италия'),
(1894, 'Казахстан'),
(2163, 'Камерун'),
(2172, 'Канада'),
(2297, 'Кипр'),
(2303, 'Киргызстан'),
(2374, 'Китай'),
(2430, 'Коста-Рика'),
(2443, 'Кувейт'),
(2448, 'Латвия'),
(2509, 'Ливия'),
(2514, 'Литва'),
(2614, 'Люксембург'),
(2617, 'Мексика'),
(2788, 'Молдова'),
(2833, 'Монако'),
(2837, 'Новая Зеландия'),
(2880, 'Норвегия'),
(2897, 'Польша'),
(3141, 'Португалия'),
(3156, 'Реюньон'),
(3159, 'Россия'),
(5647, 'Сальвадор'),
(5666, 'Словакия'),
(5673, 'Словения'),
(5678, 'Суринам'),
(5681, 'США'),
(9575, 'Таджикистан'),
(9638, 'Туркменистан'),
(9701, 'Туркс и Кейкос'),
(9705, 'Турция'),
(9782, 'Уганда'),
(9787, 'Узбекистан'),
(9908, 'Украина'),
(10648, 'Финляндия'),
(10668, 'Франция'),
(10874, 'Чехия'),
(10904, 'Швейцария'),
(10933, 'Швеция'),
(10968, 'Эстония'),
(11002, 'Югославия'),
(11014, 'Южная Корея'),
(11060, 'Япония'),
(277551, 'Нидерланды'),
(277553, 'Хорватия'),
(277555, 'Румыния'),
(277557, 'Гонконг'),
(277559, 'Индонезия'),
(277561, 'Иордания'),
(277563, 'Малайзия'),
(277565, 'Сингапур'),
(277567, 'Тайвань'),
(277569, 'Туркмения'),
(582029, 'Карибы'),
(582031, 'Чили'),
(582040, 'Корея'),
(582041, 'Македония'),
(582043, 'Мальта'),
(582044, 'Пакистан'),
(582046, 'Перу'),
(582050, 'Тайланд'),
(582051, 'О.А.Э.'),
(582060, 'Ливан'),
(582064, 'Эквадор'),
(582065, 'Морокко'),
(582067, 'Сирия'),
(582077, 'Куба'),
(582082, 'Мозамбик'),
(582090, 'Тунис'),
(582105, 'Остров Мэн'),
(582106, 'Ямайка'),
(2505884, 'Ливан'),
(2567393, 'Гондурас'),
(2577958, 'Доминиканская республика'),
(2687701, 'Монголия'),
(3410238, 'Ирак'),
(3661568, 'ЮАР'),
(7716093, 'Арулько');

--
-- Индексы сохранённых таблиц
--

--
-- Индексы таблицы `conferences`
--
ALTER TABLE `conferences`
  ADD UNIQUE KEY `id` (`id`);

--
-- Индексы таблицы `countries`
--
ALTER TABLE `countries`
  ADD PRIMARY KEY (`country_id`);

--
-- AUTO_INCREMENT для сохранённых таблиц
--

--
-- AUTO_INCREMENT для таблицы `conferences`
--
ALTER TABLE `conferences`
  MODIFY `id` int UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=29;

--
-- AUTO_INCREMENT для таблицы `countries`
--
ALTER TABLE `countries`
  MODIFY `country_id` int UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7716094;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

-- phpMyAdmin SQL Dump
-- version 4.7.3
-- https://www.phpmyadmin.net/
--
-- Хост: 127.0.0.1:3306
-- Время создания: Июн 25 2020 г., 19:59
-- Версия сервера: 5.6.37
-- Версия PHP: 5.5.38

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- База данных: `dms`
--

-- --------------------------------------------------------

--
-- Структура таблицы `accounts`
--

CREATE TABLE `accounts` (
  `id` int(11) NOT NULL,
  `login` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL,
  `name` varchar(50) NOT NULL,
  `access` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `accounts`
--

INSERT INTO `accounts` (`id`, `login`, `password`, `name`, `access`) VALUES
(0, 'user1', 'qwerty', 'Егоров Юрий Сергеевич', '1'),
(1, 'user2', 'qwerty', 'Дмитриев Сергей Михайлович', '0');

-- --------------------------------------------------------

--
-- Структура таблицы `org`
--

CREATE TABLE `org` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `org`
--

INSERT INTO `org` (`id`, `name`) VALUES
(0, 'NGTU'),
(1, 'Студсовет');

-- --------------------------------------------------------

--
-- Структура таблицы `stud_sovet`
--

CREATE TABLE `stud_sovet` (
  `id` int(11) NOT NULL,
  `om` varchar(255) NOT NULL,
  `id_account` int(11) NOT NULL,
  `id_org` int(11) NOT NULL,
  `status` int(11) NOT NULL,
  `date` varchar(255) NOT NULL,
  `date_con` varchar(255) NOT NULL,
  `comment` varchar(1000) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `stud_sovet`
--

INSERT INTO `stud_sovet` (`id`, `om`, `id_account`, `id_org`, `status`, `date`, `date_con`, `comment`) VALUES
(582, '97bd011f9909dabae8f82ae8132e407cbb8018a9', 0, 1, 2, '2020-06-23 12:14:19', '2020-06-25 15:04:33', ''),
(10427, 'a8c9b8b4f7d831e9663de41b288ff907684a75f0', 0, 1, 1, '2020-06-25 11:25:57', '2020-06-25 11:53:22', ''),
(12298, 'f14dcc13be208df4318980d215d996eb80fedee1', 49466, 1, 2, '2020-06-25 11:31:57', '2020-06-25 15:04:35', ''),
(15530, 'a8c9b8b4f7d831e9663de41b288ff907684a75f0', 0, 1, 3, '2020-06-23 14:46:42', '2020-06-23 22:00:48', 'ыпывп'),
(19351, 'a8c9b8b4f7d831e9663de41b288ff907684a75f0', 49466, 1, 2, '2020-06-25 13:41:24', '2020-06-25 15:04:35', ''),
(40271, '1bbc05fe6c065588cf32c509e16055ceb1d108bb', 1, 0, 3, '2020-06-23 12:14:52', '2020-06-23 15:39:18', ''),
(49466, 'f14dcc13be208df4318980d215d996eb80fedee1', 0, 1, 0, '2020-06-23 15:44:46', '2020-06-25 15:04:36', ''),
(52527, 'a8c9b8b4f7d831e9663de41b288ff907684a75f0', 0, 1, 0, '2020-06-25 11:29:48', '', ''),
(55365, 'a8c9b8b4f7d831e9663de41b288ff907684a75f0', 0, 1, 3, '2020-06-23 12:14:14', '2020-06-23 15:44:56', ''),
(56345, 'f14dcc13be208df4318980d215d996eb80fedee1', 49466, 1, 0, '2020-06-25 15:00:55', '', ''),
(59409, 'f14dcc13be208df4318980d215d996eb80fedee1', 582, 1, 3, '2020-06-23 22:05:26', '2020-06-24 21:03:50', ''),
(65399, 'f14dcc13be208df4318980d215d996eb80fedee1', 1, 0, 5, '2020-06-23 15:45:16', '', ''),
(79764, 'f14dcc13be208df4318980d215d996eb80fedee1', 0, 1, 1, '2020-06-23 12:14:09', '2020-06-23 14:46:15', ''),
(82700, 'f14dcc13be208df4318980d215d996eb80fedee1', 0, 1, 1, '2020-06-23 14:58:21', '2020-06-23 14:59:40', ''),
(97748, 'a8c9b8b4f7d831e9663de41b288ff907684a75f0', 0, 1, 0, '2020-06-25 11:29:24', '', '');

--
-- Индексы сохранённых таблиц
--

--
-- Индексы таблицы `accounts`
--
ALTER TABLE `accounts`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `login` (`login`);

--
-- Индексы таблицы `org`
--
ALTER TABLE `org`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `stud_sovet`
--
ALTER TABLE `stud_sovet`
  ADD PRIMARY KEY (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

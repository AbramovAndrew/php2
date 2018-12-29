-- phpMyAdmin SQL Dump
-- version 4.8.2
-- https://www.phpmyadmin.net/
--
-- Хост: 127.0.0.1
-- Время создания: Дек 27 2018 г., 15:17
-- Версия сервера: 10.1.32-MariaDB
-- Версия PHP: 7.2.5

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- База данных: `gallery`
--

-- --------------------------------------------------------

--
-- Структура таблицы `gall_gen`
--

CREATE TABLE `gall_gen` (
  `id` int(11) NOT NULL,
  `descr_alt` varchar(256) NOT NULL,
  `descr_cap` text NOT NULL,
  `link_big` varchar(128) NOT NULL,
  `link_small` varchar(128) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `gall_gen`
--

INSERT INTO `gall_gen` (`id`, `descr_alt`, `descr_cap`, `link_big`, `link_small`) VALUES
(1, 'Восхитительное фото космического пространства № 1', 'Снимок телескопа Hubble № 1 передает все богатство красок дальнего космоса', '001_big.jpg', '001_small.jpg'),
(2, 'Восхитительное фото космического пространства № 2', 'Снимок телескопа Hubble № 2 передает все богатство красок дальнего космоса', '002_big.jpg', '002_small.jpg'),
(3, 'Восхитительное фото космического пространства № 3', 'Снимок телескопа Hubble № 3 передает все богатство красок дальнего космоса', '003_big.jpg', '003_small.jpg'),
(4, 'Восхитительное фото космического пространства № 4', 'Снимок телескопа Hubble № 4 передает все богатство красок дальнего космоса', '004_big.jpg', '004_small.jpg'),
(5, 'Восхитительное фото космического пространства № 5', 'Снимок телескопа Hubble № 5 передает все богатство красок дальнего космоса', '005_big.jpg', '005_small.jpg'),
(6, 'Восхитительное фото космического пространства № 6', 'Снимок телескопа Hubble № 6 передает все богатство красок дальнего космоса', '006_big.jpg', '006_small.jpg');

--
-- Индексы сохранённых таблиц
--

--
-- Индексы таблицы `gall_gen`
--
ALTER TABLE `gall_gen`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT для сохранённых таблиц
--

--
-- AUTO_INCREMENT для таблицы `gall_gen`
--
ALTER TABLE `gall_gen`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

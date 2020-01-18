-- phpMyAdmin SQL Dump
-- version 4.9.0.1
-- https://www.phpmyadmin.net/
--
-- Хост: 127.0.0.1:3306
-- Время создания: Янв 18 2020 г., 20:19
-- Версия сервера: 10.3.13-MariaDB-log
-- Версия PHP: 7.1.32

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- База данных: `taskforcedb`
--

-- --------------------------------------------------------

--
-- Структура таблицы `category`
--

CREATE TABLE `category` (
  `id` int(11) NOT NULL COMMENT 'id категории',
  `name` varchar(120) NOT NULL COMMENT 'название категории',
  `icon` int(120) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Индексы сохранённых таблиц
--

--
-- Индексы таблицы `category`
--
ALTER TABLE `category`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT для сохранённых таблиц
--

--
-- AUTO_INCREMENT для таблицы `category`
--
ALTER TABLE `category`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT COMMENT 'id категории';
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
INSERT INTO category (name, icon) 
VALUES 
"Курьерские услуги", "delivary"; 
INSERT INTO category (name, icon) 
VALUES 
"Уборка", "clean"; 
INSERT INTO category (name, icon) 
VALUES 
"Переезды", "cargo"; 
INSERT INTO category (name, icon) 
VALUES 
"Компьютерная помощь", "neo"; 
INSERT INTO category (name, icon) 
VALUES 
"Ремонт квартирный", "flat"; 
INSERT INTO category (name, icon) 
VALUES 
"Ремонт техники", "repair"; 
INSERT INTO category (name, icon) 
VALUES 
"Красота", "beauty"; 
INSERT INTO category (name, icon) 
VALUES 
"Фото", "photo";
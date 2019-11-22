-- phpMyAdmin SQL Dump
-- version 4.6.5.2
-- https://www.phpmyadmin.net/
--
-- Хост: 127.0.0.1:3306
-- Время создания: Ноя 22 2019 г., 18:22
-- Версия сервера: 5.7.16-log
-- Версия PHP: 7.1.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- База данных: `TaskForce`
--

-- --------------------------------------------------------

--
-- Структура таблицы `Category`
--

CREATE TABLE `Category` (
  `id` int(11) NOT NULL COMMENT 'id категории',
  `category_name` varchar(120) NOT NULL COMMENT 'название категории'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Структура таблицы `Chat`
--

CREATE TABLE `Chat` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL COMMENT 'id пользователя',
  `task_id` int(11) NOT NULL COMMENT 'id задания',
  `created_at` datetime NOT NULL COMMENT 'время создания поста в чате',
  `message` varchar(255) NOT NULL COMMENT 'содержание поста в чате'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Структура таблицы `Contact`
--

CREATE TABLE `Contact` (
  `user_id` int(11) NOT NULL COMMENT 'id исполнителя',
  `phone` varchar(120) NOT NULL COMMENT 'номер телефона пользователя',
  `email` varchar(120) NOT NULL COMMENT 'email пользователя',
  `skype` varchar(120) NOT NULL COMMENT 'skype пользователя',
  `other_messenger` int(11) NOT NULL COMMENT 'другой мессенжер'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Структура таблицы `Location`
--

CREATE TABLE `Location` (
  `id` int(11) NOT NULL,
  `town_id` int(11) NOT NULL COMMENT 'код города',
  `latitude` decimal(10,7) NOT NULL COMMENT 'широта города (географ.)',
  `longitude` decimal(10,7) NOT NULL COMMENT 'долгота города (географ.)'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Структура таблицы `Respond`
--

CREATE TABLE `Respond` (
  `id` int(11) NOT NULL COMMENT 'id отклика',
  `user_id` int(11) NOT NULL COMMENT 'id  исполнителя',
  `execute_budjet` int(11) NOT NULL COMMENT 'бюджет/стоимость работ',
  `comment` varchar(255) NOT NULL COMMENT 'текст  отклика на задание',
  `create_at` datetime NOT NULL COMMENT 'время создания отклика на задание'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Структура таблицы `Review`
--

CREATE TABLE `Review` (
  `id` int(11) NOT NULL COMMENT 'id отзыва',
  `author_id` int(11) NOT NULL COMMENT 'id заказчика',
  `task_id` int(11) NOT NULL COMMENT 'id задания',
  `review_content` varchar(450) NOT NULL COMMENT 'содержание отзыва',
  `rate_stars` int(11) NOT NULL COMMENT 'оценка выполнения задания 1-5 звёзд',
  `create_at` datetime NOT NULL COMMENT 'время создания отзыва'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Структура таблицы `Task`
--

CREATE TABLE `Task` (
  `id` int(11) NOT NULL COMMENT 'id задания',
  `author_id` int(11) NOT NULL COMMENT 'id заказчика',
  `executor_id` int(11) NOT NULL COMMENT 'id  исполнителя',
  `town_id` int(11) NOT NULL COMMENT 'код города',
  `title` varchar(200) NOT NULL COMMENT 'название задания',
  `description` varchar(450) NOT NULL COMMENT 'описание задания',
  `category_id` int(11) NOT NULL COMMENT 'категория работ',
  `budget` int(11) NOT NULL COMMENT 'бюджет/стоимость работ',
  `end_date` date NOT NULL COMMENT 'дата окончания работ',
  `task_status` varchar(120) NOT NULL COMMENT 'статус задания'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Структура таблицы `Town`
--

CREATE TABLE `Town` (
  `id` int(11) NOT NULL COMMENT 'код города',
  `name` varchar(120) NOT NULL COMMENT 'название города'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COMMENT='Названия городов';

-- --------------------------------------------------------

--
-- Структура таблицы `User`
--

CREATE TABLE `User` (
  `id` int(11) NOT NULL COMMENT 'id пользователя',
  `full_name` varchar(200) NOT NULL COMMENT 'имя и фамилия пользователя',
  `created_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP COMMENT 'дата и время создания аккаунта',
  `role` varchar(100) NOT NULL COMMENT 'роль: заказчик или исполнитель',
  `password` varchar(100) NOT NULL COMMENT 'пароль к аккаунту',
  `avatar` varchar(200) NOT NULL COMMENT 'аватарка пользователя',
  `about_user` varchar(450) NOT NULL COMMENT 'рассказ исполнителя о себе',
  `birthday` date NOT NULL COMMENT 'дата рождения',
  `town_id` int(11) NOT NULL COMMENT 'код города'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Структура таблицы `UserEvent`
--

CREATE TABLE `UserEvent` (
  `id` int(11) NOT NULL COMMENT 'id типа события',
  `user_id` int(11) NOT NULL COMMENT 'id  исполнителя',
  `name` varchar(120) NOT NULL COMMENT 'наименование события',
  `icon` varchar(120) NOT NULL COMMENT 'url пиктограммы события'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Структура таблицы `UserImage`
--

CREATE TABLE `UserImage` (
  `id` int(11) NOT NULL COMMENT 'id загруженного файла',
  `user_id` int(11) NOT NULL COMMENT 'id пользователя, кто размещает файлы',
  `file_url` varchar(255) NOT NULL COMMENT 'url размещения загруженного файла'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Структура таблицы `UserStatistic`
--

CREATE TABLE `UserStatistic` (
  `user_id` int(11) NOT NULL COMMENT 'id  исполнителя',
  `views_number` int(11) NOT NULL COMMENT 'кол-во просмотров аккаунта исполнителя',
  `available_now` tinyint(1) DEFAULT '0' COMMENT 'свободен ли исполнитель',
  `last_visit` datetime NOT NULL COMMENT 'время последнего посещения сайта'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Структура таблицы `user_categories`
--

CREATE TABLE `user_categories` (
  `user_id` int(11) NOT NULL COMMENT 'id пользователя',
  `category_id` int(11) NOT NULL COMMENT 'id категории'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COMMENT='таблица связи';

--
-- Индексы сохранённых таблиц
--

--
-- Индексы таблицы `Category`
--
ALTER TABLE `Category`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `Chat`
--
ALTER TABLE `Chat`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_id` (`user_id`),
  ADD KEY `task_id` (`task_id`);

--
-- Индексы таблицы `Contact`
--
ALTER TABLE `Contact`
  ADD PRIMARY KEY (`user_id`),
  ADD KEY `user_id` (`user_id`);

--
-- Индексы таблицы `Location`
--
ALTER TABLE `Location`
  ADD PRIMARY KEY (`id`),
  ADD KEY `town_id` (`town_id`);

--
-- Индексы таблицы `Respond`
--
ALTER TABLE `Respond`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_id` (`user_id`);

--
-- Индексы таблицы `Review`
--
ALTER TABLE `Review`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_id` (`author_id`),
  ADD KEY `task_id` (`task_id`);

--
-- Индексы таблицы `Task`
--
ALTER TABLE `Task`
  ADD PRIMARY KEY (`id`),
  ADD KEY `category_id` (`category_id`),
  ADD KEY `author_id` (`author_id`),
  ADD KEY `town_id` (`town_id`),
  ADD KEY `executor_id` (`executor_id`);

--
-- Индексы таблицы `Town`
--
ALTER TABLE `Town`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `User`
--
ALTER TABLE `User`
  ADD PRIMARY KEY (`id`),
  ADD KEY `town_id` (`town_id`);

--
-- Индексы таблицы `UserEvent`
--
ALTER TABLE `UserEvent`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_id` (`user_id`);

--
-- Индексы таблицы `UserImage`
--
ALTER TABLE `UserImage`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_id` (`user_id`);

--
-- Индексы таблицы `UserStatistic`
--
ALTER TABLE `UserStatistic`
  ADD PRIMARY KEY (`user_id`),
  ADD KEY `user_id` (`user_id`);

--
-- Индексы таблицы `user_categories`
--
ALTER TABLE `user_categories`
  ADD KEY `user_id` (`user_id`),
  ADD KEY `category_id` (`category_id`);

--
-- AUTO_INCREMENT для сохранённых таблиц
--

--
-- AUTO_INCREMENT для таблицы `Chat`
--
ALTER TABLE `Chat`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT для таблицы `Respond`
--
ALTER TABLE `Respond`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT COMMENT 'id отклика';
--
-- AUTO_INCREMENT для таблицы `Review`
--
ALTER TABLE `Review`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT COMMENT 'id отзыва';
--
-- AUTO_INCREMENT для таблицы `Task`
--
ALTER TABLE `Task`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT COMMENT 'id задания';
--
-- AUTO_INCREMENT для таблицы `User`
--
ALTER TABLE `User`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT COMMENT 'id пользователя';
--
-- AUTO_INCREMENT для таблицы `UserEvent`
--
ALTER TABLE `UserEvent`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT COMMENT 'id типа события', AUTO_INCREMENT=9;
--
-- AUTO_INCREMENT для таблицы `UserImage`
--
ALTER TABLE `UserImage`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT COMMENT 'id загруженного файла';
--
-- Ограничения внешнего ключа сохраненных таблиц
--

--
-- Ограничения внешнего ключа таблицы `Chat`
--
ALTER TABLE `Chat`
  ADD CONSTRAINT `chat_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `User` (`id`) ON UPDATE CASCADE,
  ADD CONSTRAINT `chat_ibfk_2` FOREIGN KEY (`task_id`) REFERENCES `Task` (`id`) ON UPDATE CASCADE;

--
-- Ограничения внешнего ключа таблицы `Contact`
--
ALTER TABLE `Contact`
  ADD CONSTRAINT `contact_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `User` (`id`);

--
-- Ограничения внешнего ключа таблицы `Location`
--
ALTER TABLE `Location`
  ADD CONSTRAINT `location_ibfk_1` FOREIGN KEY (`town_id`) REFERENCES `Town` (`id`) ON UPDATE CASCADE;

--
-- Ограничения внешнего ключа таблицы `Respond`
--
ALTER TABLE `Respond`
  ADD CONSTRAINT `respond_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `User` (`id`) ON UPDATE CASCADE;

--
-- Ограничения внешнего ключа таблицы `Review`
--
ALTER TABLE `Review`
  ADD CONSTRAINT `review_ibfk_1` FOREIGN KEY (`author_id`) REFERENCES `User` (`id`) ON UPDATE CASCADE,
  ADD CONSTRAINT `review_ibfk_2` FOREIGN KEY (`task_id`) REFERENCES `Task` (`id`) ON UPDATE CASCADE;

--
-- Ограничения внешнего ключа таблицы `Task`
--
ALTER TABLE `Task`
  ADD CONSTRAINT `task_ibfk_1` FOREIGN KEY (`author_id`) REFERENCES `User` (`id`) ON UPDATE CASCADE,
  ADD CONSTRAINT `task_ibfk_2` FOREIGN KEY (`executor_id`) REFERENCES `User` (`id`) ON UPDATE CASCADE,
  ADD CONSTRAINT `task_ibfk_3` FOREIGN KEY (`town_id`) REFERENCES `Location` (`id`) ON UPDATE CASCADE,
  ADD CONSTRAINT `task_ibfk_4` FOREIGN KEY (`category_id`) REFERENCES `Category` (`id`) ON UPDATE CASCADE;

--
-- Ограничения внешнего ключа таблицы `UserEvent`
--
ALTER TABLE `UserEvent`
  ADD CONSTRAINT `userevent_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `User` (`id`) ON UPDATE CASCADE;

--
-- Ограничения внешнего ключа таблицы `UserImage`
--
ALTER TABLE `UserImage`
  ADD CONSTRAINT `userimage_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `User` (`id`) ON UPDATE CASCADE;

--
-- Ограничения внешнего ключа таблицы `UserStatistic`
--
ALTER TABLE `UserStatistic`
  ADD CONSTRAINT `userstatistic_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `User` (`id`) ON UPDATE CASCADE;

--
-- Ограничения внешнего ключа таблицы `user_categories`
--
ALTER TABLE `user_categories`
  ADD CONSTRAINT `user_categories_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `User` (`id`) ON UPDATE CASCADE,
  ADD CONSTRAINT `user_categories_ibfk_2` FOREIGN KEY (`category_id`) REFERENCES `Category` (`id`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

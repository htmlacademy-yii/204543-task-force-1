-- phpMyAdmin SQL Dump
-- version 4.9.0.1
-- https://www.phpmyadmin.net/
--
-- Хост: 127.0.0.1:3306
-- Время создания: Мар 07 2020 г., 19:49
-- Версия сервера: 10.3.13-MariaDB-log
-- Версия PHP: 7.2.22

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- База данных: `test_db07march_empty`
--

-- --------------------------------------------------------

--
-- Структура таблицы `category`
--

CREATE TABLE `category` (
  `id` int(11) NOT NULL COMMENT 'id категории',
  `name` varchar(120) CHARACTER SET utf8mb4 NOT NULL COMMENT 'название категории',
  `icon` varchar(120) CHARACTER SET utf8mb4 NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Структура таблицы `chat`
--

CREATE TABLE `chat` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL COMMENT 'id пользователя',
  `task_id` int(11) NOT NULL COMMENT 'id задания',
  `created_at` datetime NOT NULL COMMENT 'время создания поста в чате',
  `message` varchar(255) CHARACTER SET utf8mb4 NOT NULL COMMENT 'содержание поста в чате'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Структура таблицы `location`
--

CREATE TABLE `location` (
  `id` int(11) NOT NULL COMMENT 'id записи локации',
  `town_id` int(11) NOT NULL COMMENT 'код города',
  `latitude` decimal(9,7) NOT NULL COMMENT 'широта города (географ.)',
  `longitude` decimal(9,7) NOT NULL COMMENT 'долгота города (географ.)'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Структура таблицы `profile`
--

CREATE TABLE `profile` (
  `user_id` int(11) NOT NULL COMMENT 'id исполнителя',
  `address` varchar(200) CHARACTER SET utf8mb4 NOT NULL COMMENT 'адрес исполнителя',
  `phone` varchar(120) CHARACTER SET utf8mb4 NOT NULL COMMENT 'номер телефона пользователя',
  `email` varchar(120) CHARACTER SET utf8mb4 NOT NULL COMMENT 'email пользователя',
  `skype` varchar(120) CHARACTER SET utf8mb4 NOT NULL COMMENT 'skype пользователя',
  `other_messenger` varchar(120) CHARACTER SET utf8mb4 NOT NULL COMMENT 'другой мессенжер'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Структура таблицы `respond`
--

CREATE TABLE `respond` (
  `id` int(11) NOT NULL COMMENT 'id отклика',
  `task_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL COMMENT 'id  исполнителя',
  `execute_budget` int(11) NOT NULL COMMENT 'бюджет/стоимость работ',
  `comment` varchar(255) CHARACTER SET utf8mb4 NOT NULL COMMENT 'текст  отклика на задание',
  `created_at` datetime DEFAULT current_timestamp() COMMENT 'время создания отклика на задание'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Структура таблицы `review`
--

CREATE TABLE `review` (
  `id` int(11) NOT NULL COMMENT 'id отзыва',
  `author_id` int(11) NOT NULL COMMENT 'id заказчика',
  `task_id` int(11) NOT NULL COMMENT 'id задания',
  `executor_id` int(11) NOT NULL,
  `review_content` varchar(450) CHARACTER SET utf8mb4 NOT NULL COMMENT 'содержание отзыва',
  `rate_stars` decimal(3,2) NOT NULL COMMENT 'оценка выполнения задания 1-5 звёзд',
  `create_date` datetime DEFAULT current_timestamp() COMMENT 'время создания отзыва'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Структура таблицы `task`
--

CREATE TABLE `task` (
  `id` int(11) NOT NULL COMMENT 'id задания',
  `add_dt` datetime NOT NULL COMMENT 'время создания задания',
  `author_id` int(11) NOT NULL COMMENT 'id заказчика',
  `executor_id` int(11) NOT NULL COMMENT 'id  исполнителя',
  `location_id` int(11) NOT NULL COMMENT 'почтовый индекс города',
  `title` varchar(200) CHARACTER SET utf8mb4 NOT NULL COMMENT 'название задания',
  `description` varchar(450) CHARACTER SET utf8mb4 NOT NULL COMMENT 'описание задания',
  `category_id` int(11) NOT NULL COMMENT 'категория работ',
  `budget` int(11) NOT NULL COMMENT 'бюджет/стоимость работ',
  `end_date` datetime NOT NULL COMMENT 'дата окончания работ',
  `task_status` varchar(120) CHARACTER SET utf8mb4 NOT NULL COMMENT 'статус задания'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Структура таблицы `town`
--

CREATE TABLE `town` (
  `id` int(11) NOT NULL COMMENT 'почтовый код города',
  `town` varchar(120) CHARACTER SET utf8mb4 NOT NULL COMMENT 'название города'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COMMENT='Названия городов';

-- --------------------------------------------------------

--
-- Структура таблицы `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL COMMENT 'id пользователя',
  `full_name` varchar(200) CHARACTER SET utf8mb4 NOT NULL COMMENT 'имя и фамилия пользователя',
  `created_at` datetime DEFAULT current_timestamp() COMMENT 'дата и время создания аккаунта',
  `role` varchar(100) CHARACTER SET utf8mb4 NOT NULL COMMENT 'роль: заказчик или исполнитель',
  `password` varchar(100) CHARACTER SET utf8mb4 NOT NULL COMMENT 'пароль к аккаунту',
  `avatar` varchar(200) CHARACTER SET utf8mb4 NOT NULL COMMENT 'URL аватара пользователя',
  `about_user` varchar(450) CHARACTER SET utf8mb4 NOT NULL COMMENT 'рассказ исполнителя о себе',
  `birthdate` date NOT NULL COMMENT 'дата рождения',
  `town_id` int(11) NOT NULL COMMENT 'почтовый код города'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Структура таблицы `userevent`
--

CREATE TABLE `userevent` (
  `id` int(11) NOT NULL COMMENT 'id типа события',
  `user_id` int(11) NOT NULL COMMENT 'id  исполнителя',
  `event` varchar(120) CHARACTER SET utf8mb4 NOT NULL COMMENT 'наименование события',
  `icon` varchar(120) NOT NULL COMMENT 'константа имени события'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Структура таблицы `userimage`
--

CREATE TABLE `userimage` (
  `id` int(11) NOT NULL COMMENT 'id загруженного файла',
  `user_id` int(11) NOT NULL COMMENT 'id пользователя, кто размещает файлы',
  `file_url` varchar(255) CHARACTER SET utf8mb4 NOT NULL COMMENT 'url размещения загруженного файла'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Структура таблицы `userstatistic`
--

CREATE TABLE `userstatistic` (
  `user_id` int(11) NOT NULL COMMENT 'id  исполнителя',
  `views_number` int(11) NOT NULL COMMENT 'кол-во просмотров аккаунта исполнителя',
  `available_now` tinyint(1) DEFAULT 0 COMMENT 'свободен ли исполнитель',
  `last_visit` datetime NOT NULL COMMENT 'время последнего посещения сайта'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Структура таблицы `user_category`
--

CREATE TABLE `user_category` (
  `user_id` int(11) NOT NULL COMMENT 'id пользователя',
  `category_id` int(11) NOT NULL COMMENT 'id категории'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COMMENT='таблица связи';

--
-- Индексы сохранённых таблиц
--

--
-- Индексы таблицы `category`
--
ALTER TABLE `category`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `chat`
--
ALTER TABLE `chat`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_id` (`user_id`),
  ADD KEY `task_id` (`task_id`);

--
-- Индексы таблицы `location`
--
ALTER TABLE `location`
  ADD PRIMARY KEY (`id`),
  ADD KEY `location_ibfk_1` (`town_id`);

--
-- Индексы таблицы `profile`
--
ALTER TABLE `profile`
  ADD PRIMARY KEY (`user_id`),
  ADD UNIQUE KEY `phone` (`phone`),
  ADD UNIQUE KEY `email` (`email`),
  ADD KEY `user_id` (`user_id`);

--
-- Индексы таблицы `respond`
--
ALTER TABLE `respond`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_id` (`user_id`);

--
-- Индексы таблицы `review`
--
ALTER TABLE `review`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_id` (`author_id`),
  ADD KEY `review_ibfk_2` (`task_id`),
  ADD KEY `executor_id` (`executor_id`);

--
-- Индексы таблицы `task`
--
ALTER TABLE `task`
  ADD PRIMARY KEY (`id`),
  ADD KEY `category_id` (`category_id`),
  ADD KEY `author_id` (`author_id`),
  ADD KEY `town_id` (`location_id`),
  ADD KEY `task_ibfk_2` (`executor_id`);

--
-- Индексы таблицы `town`
--
ALTER TABLE `town`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`),
  ADD KEY `town_id` (`town_id`);

--
-- Индексы таблицы `userevent`
--
ALTER TABLE `userevent`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_id` (`user_id`);

--
-- Индексы таблицы `userimage`
--
ALTER TABLE `userimage`
  ADD PRIMARY KEY (`id`),
  ADD KEY `userimage_ibfk_1` (`user_id`);

--
-- Индексы таблицы `userstatistic`
--
ALTER TABLE `userstatistic`
  ADD PRIMARY KEY (`user_id`),
  ADD KEY `user_id` (`user_id`);

--
-- Индексы таблицы `user_category`
--
ALTER TABLE `user_category`
  ADD KEY `user_id` (`user_id`),
  ADD KEY `category_id` (`category_id`);

--
-- AUTO_INCREMENT для сохранённых таблиц
--

--
-- AUTO_INCREMENT для таблицы `category`
--
ALTER TABLE `category`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT COMMENT 'id категории', AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT для таблицы `chat`
--
ALTER TABLE `chat`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT для таблицы `location`
--
ALTER TABLE `location`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT COMMENT 'id записи локации', AUTO_INCREMENT=31;

--
-- AUTO_INCREMENT для таблицы `respond`
--
ALTER TABLE `respond`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT COMMENT 'id отклика', AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT для таблицы `review`
--
ALTER TABLE `review`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT COMMENT 'id отзыва', AUTO_INCREMENT=26;

--
-- AUTO_INCREMENT для таблицы `task`
--
ALTER TABLE `task`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT COMMENT 'id задания', AUTO_INCREMENT=41;

--
-- AUTO_INCREMENT для таблицы `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT COMMENT 'id пользователя', AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT для таблицы `userevent`
--
ALTER TABLE `userevent`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT COMMENT 'id типа события', AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT для таблицы `userimage`
--
ALTER TABLE `userimage`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT COMMENT 'id загруженного файла', AUTO_INCREMENT=11;

--
-- Ограничения внешнего ключа сохраненных таблиц
--

--
-- Ограничения внешнего ключа таблицы `chat`
--
ALTER TABLE `chat`
  ADD CONSTRAINT `chat_ibfk_1` FOREIGN KEY (`task_id`) REFERENCES `task` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `chat_ibfk_2` FOREIGN KEY (`user_id`) REFERENCES `user` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Ограничения внешнего ключа таблицы `location`
--
ALTER TABLE `location`
  ADD CONSTRAINT `location_ibfk_1` FOREIGN KEY (`town_id`) REFERENCES `town` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Ограничения внешнего ключа таблицы `profile`
--
ALTER TABLE `profile`
  ADD CONSTRAINT `profile_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `user` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Ограничения внешнего ключа таблицы `respond`
--
ALTER TABLE `respond`
  ADD CONSTRAINT `respond_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `user` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Ограничения внешнего ключа таблицы `review`
--
ALTER TABLE `review`
  ADD CONSTRAINT `review_ibfk_1` FOREIGN KEY (`author_id`) REFERENCES `user` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `review_ibfk_2` FOREIGN KEY (`task_id`) REFERENCES `task` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `review_ibfk_3` FOREIGN KEY (`executor_id`) REFERENCES `user` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

-- phpMyAdmin SQL Dump
-- version 4.9.0.1
-- https://www.phpmyadmin.net/
--
-- Хост: 127.0.0.1:3306
-- Время создания: Мар 07 2020 г., 19:25
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
-- База данных: `yiitaskforce_db`
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

--
-- Дамп данных таблицы `category`
--

INSERT INTO `category` (`id`, `name`, `icon`) VALUES
(1, 'Красота', 'quo'),
(2, 'Ремонт квартирный', 'libero'),
(3, 'Уборка', 'voluptas'),
(4, 'Ремонт техники', 'dolor'),
(5, 'Курьерские услуги', 'aliquam'),
(6, 'Переезды', 'et'),
(7, 'Компьютерная помощь', 'eaque'),
(8, 'Фото', 'quod');

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

--
-- Дамп данных таблицы `chat`
--

INSERT INTO `chat` (`id`, `user_id`, `task_id`, `created_at`, `message`) VALUES
(1, 2, 1, '2019-04-29 04:47:24', 'Et odit distinctio voluptatem qui. Sit occaecati ipsam atque eius aliquid quos et.'),
(2, 2, 3, '2020-02-16 22:04:42', 'Asperiores et ut voluptate. Earum reprehenderit aspernatur adipisci autem. Sequi inventore laboriosam mollitia.'),
(3, 9, 2, '2019-10-01 20:06:06', 'Ipsam necessitatibus ad hic et. Sint veritatis asperiores debitis. Ipsum voluptates ad optio aut et et.'),
(4, 2, 1, '2019-07-27 16:12:51', 'Fugiat et eum in perspiciatis. Optio est quod rerum sit nemo. A rerum dolores atque et aspernatur minima fugiat vero.'),
(5, 9, 3, '2019-07-01 10:37:38', 'Odio eveniet soluta amet quod illo. Perferendis ipsam quod ut quisquam. Est rem libero necessitatibus minus velit fuga.'),
(6, 1, 3, '2019-10-04 02:40:58', 'Maxime aut dolorem quidem et. Dolores fugiat saepe quasi. Vitae quos est rerum et reiciendis corporis.'),
(7, 7, 4, '2019-08-12 02:39:13', 'Et et et molestiae tempore. Et aspernatur ipsam hic praesentium repellat molestiae. Unde debitis totam minima incidunt.'),
(8, 3, 1, '2019-06-01 22:37:55', 'Quia soluta quis velit et et voluptates numquam. Explicabo ut est eos tenetur voluptatem voluptas.'),
(9, 6, 3, '2020-02-03 17:56:27', 'Est rerum voluptatem pariatur perferendis. Et debitis nostrum voluptatem quod. Tempore nobis dolores quos sequi.'),
(10, 3, 2, '2019-07-24 20:12:49', 'Est et nihil repellat modi quia perspiciatis aut. Est laudantium aut ducimus recusandae quis ut.'),
(11, 5, 1, '2020-01-23 13:49:00', 'Ratione ipsam sint qui nulla error. Est ab illo ab quas deserunt incidunt repellendus. Ut velit beatae itaque et.'),
(12, 3, 4, '2019-10-04 17:59:14', 'Quis perferendis nisi optio. Ut eaque quo nisi. Iste eaque aut vel non quisquam.'),
(13, 6, 2, '2019-03-04 07:40:02', 'Qui rem ducimus magni nulla. Quis eos quaerat dicta quia et. Maxime harum aut necessitatibus.'),
(14, 4, 2, '2019-03-15 16:48:43', 'Eum sunt dicta non omnis occaecati quae. Repudiandae aut quod laudantium. Rerum et sed totam ut in non.'),
(15, 6, 1, '2019-09-01 04:09:40', 'Omnis in in qui unde tempora. Nam ut voluptas dolorem quas. Eum eum autem cum ut dignissimos.');

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

--
-- Дамп данных таблицы `location`
--

INSERT INTO `location` (`id`, `town_id`, `latitude`, `longitude`) VALUES
(1, 232886, '-70.7705420', '46.0429520'),
(2, 133287, '61.4974130', '51.9076910'),
(3, 453647, '-30.3226740', '45.3572070'),
(4, 296611, '77.0569760', '17.7501210'),
(5, 570693, '-44.9048110', '28.1853370'),
(6, 625447, '-10.4545610', '74.9961860'),
(7, 232886, '1.5388320', '79.7985030'),
(8, 551192, '-56.5496030', '-59.2492440'),
(9, 504279, '18.6631590', '-0.3512290'),
(10, 133287, '80.6895010', '4.0059510'),
(11, 110213, '22.7761530', '64.9375100'),
(12, 453647, '4.0965620', '-59.9047320'),
(13, 257031, '-22.8360120', '50.7642470'),
(14, 132844, '48.0068480', '-80.3847220'),
(15, 110213, '-20.3219410', '38.9696310'),
(16, 470300, '-65.9789760', '74.9211830'),
(17, 551192, '0.0009850', '-37.5169200'),
(18, 199007, '-47.7217540', '-16.5517040'),
(19, 232886, '-29.7057600', '-47.3913200'),
(20, 614726, '-75.7596680', '-71.2398050'),
(21, 509927, '33.2054780', '89.6944790'),
(22, 551192, '10.4368410', '57.7233410'),
(23, 107192, '41.5848880', '9.1850950'),
(24, 210099, '13.1538020', '20.8087230'),
(25, 257031, '36.7402140', '-80.5030440'),
(26, 453647, '45.0955840', '-30.1017690'),
(27, 216399, '-28.3062090', '-9.8676780'),
(28, 430893, '69.7532420', '69.8778510'),
(29, 132844, '-27.4130500', '-39.7548220'),
(30, 570693, '35.5880870', '5.4046410');

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

--
-- Дамп данных таблицы `profile`
--

INSERT INTO `profile` (`user_id`, `address`, `phone`, `email`, `skype`, `other_messenger`) VALUES
(1, '39771 Leuschke Park\nEast Belleport, NY 57484-4443', '+5514962319955', 'allen95@wyman.com', 'magni', 'ut'),
(2, '440 Mariane Circle\nLake Spencer, FL 92437-9082', '+1671248891966', 'alana73@gmail.com', 'est', 'corporis'),
(3, '176 Santos Ways Suite 638\nEast Kasandraview, WI 80774-3470', '+2802602175037', 'kerluke.karolann@gmail.com', 'sed', 'exercitationem'),
(4, '84030 Wiza Branch\nLake Clarkstad, VA 38064-6279', '+6530133619796', 'fredrick59@gmail.com', 'ratione', 'quia'),
(5, '5003 Dolly Point Apt. 308\nNew Carolina, MT 38364', '+5354291843485', 'ohilpert@skiles.com', 'ab', 'sequi'),
(6, '5082 Novella Meadows\nEast Lelah, ID 73286', '+2373670379116', 'gmayer@gmail.com', 'voluptatibus', 'quis'),
(7, '9270 Esta Crescent Suite 541\nCrookschester, ID 94852-3277', '+5866677367391', 'ella.ebert@hotmail.com', 'quos', 'maxime'),
(8, '293 Upton Spurs\nPort King, IL 22180', '+2780201225262', 'lottie00@koch.org', 'sunt', 'quidem'),
(9, '498 Maya Alley Apt. 605\nNicolastown, NV 23603-0985', '+7712789893108', 'okon.alessandra@gmail.com', 'dolorum', 'tempora'),
(10, '19019 Rath Lodge\nFriesenburgh, LA 50747', '+3445659829947', 'junior64@lubowitz.com', 'aut', 'velit');

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

--
-- Дамп данных таблицы `respond`
--

INSERT INTO `respond` (`id`, `task_id`, `user_id`, `execute_budget`, `comment`, `created_at`) VALUES
(1, 6, 7, 98176, 'Suscipit illo repellendus iure. Aliquid dolor dolorum laborum molestias suscipit impedit dolor. Eligendi blanditiis neque asperiores libero qui et cum. Culpa optio maxime qui assumenda.', '2019-05-24 20:31:24'),
(2, 8, 10, 35312, 'Perferendis laboriosam omnis asperiores ducimus quo. Nostrum omnis illum provident omnis fugiat. Rerum sit est veritatis praesentium. Natus et voluptatum ut enim facere. Temporibus cum ad molestias.', '2019-12-21 22:13:10'),
(3, 4, 7, 38322, 'Hic harum reprehenderit ad explicabo ut quisquam provident rerum. Iste harum voluptatem hic quas sed. Molestias dolorum a vel consectetur quo.', '2019-04-12 21:44:59'),
(4, 8, 5, 23338, 'Explicabo blanditiis eligendi incidunt sed veniam consequatur ex. Veritatis recusandae ut necessitatibus quia commodi similique. Dolores atque reprehenderit ea. Sapiente quidem sit ullam quia ea eos et.', '2019-05-19 17:47:27'),
(5, 4, 2, 50021, 'Corrupti laborum esse non assumenda. Libero sapiente laborum accusamus voluptas commodi voluptatem. Inventore sint suscipit et est molestiae eum.', '2019-11-02 16:43:00'),
(6, 9, 7, 815, 'Necessitatibus sit repellat vel quia. Architecto sit molestias rerum cupiditate omnis quia exercitationem. Quia et nemo dolor tenetur et aperiam quia eveniet.', '2019-09-17 06:51:18'),
(7, 3, 7, 80962, 'Iure aliquid esse molestiae non quia labore sunt officia. Molestiae est rerum velit asperiores omnis ipsam enim. Quae quidem qui voluptate qui. Laudantium deleniti porro ipsam recusandae sapiente.', '2019-02-12 22:29:16'),
(8, 2, 6, 31180, 'Iste sequi sit in quidem et. Est voluptatibus soluta sapiente. Dolorem velit temporibus accusantium eligendi cum.', '2019-08-20 20:45:38'),
(9, 1, 8, 91132, 'Soluta aliquid et explicabo impedit est veritatis perferendis. Non qui aut in est adipisci ab. Voluptatum soluta veniam in dolore in. Est quo et eum quas architecto sed.', '2019-02-10 20:10:10'),
(10, 4, 3, 98811, 'Et dolores explicabo qui repudiandae deleniti voluptas ipsa. Sint eius dolorem quam ex eum hic. Et doloremque qui accusamus beatae. Voluptatem recusandae dolorum hic nesciunt accusantium. Repellendus corporis eum est id nemo est.', '2019-05-11 01:19:47'),
(11, 2, 9, 41495, 'Aut fugit quia asperiores doloremque enim. Placeat ab illo velit. Eum consequatur ipsa iure assumenda qui id ipsam. Et qui aut quia aut et amet. Minus quam aut omnis omnis aut.', '2019-07-21 12:36:12'),
(12, 4, 6, 57840, 'Repellat veritatis eum eum odit. Explicabo dolorem officia impedit ut. Consequuntur omnis voluptates assumenda sed. Rerum impedit in molestiae ut. Officia iure facere incidunt asperiores asperiores repellat beatae aliquid.', '2019-02-13 10:43:33');

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

--
-- Дамп данных таблицы `review`
--

INSERT INTO `review` (`id`, `author_id`, `task_id`, `executor_id`, `review_content`, `rate_stars`, `create_date`) VALUES
(1, 2, 13, 1, 'Id debitis laudantium qui quam omnis vitae. Consequuntur iure magnam et illo non sit. Et rem fugiat debitis atque. Mollitia numquam commodi est exercitationem aut alias quas.', '2.00', '2019-02-11 19:35:35'),
(2, 1, 4, 2, 'Nisi est dolore reiciendis voluptatem provident exercitationem. Atque nesciunt voluptatem ad mollitia modi maiores. Aut unde sed voluptas perferendis quia dolores nulla.', '1.00', '2019-05-15 19:20:57'),
(3, 1, 9, 6, 'Ut voluptates aliquid autem molestias voluptatum. Delectus dolore possimus ut doloremque consequatur expedita possimus libero.', '1.00', '2020-01-15 10:21:26'),
(4, 8, 16, 8, 'Aut velit delectus et repellat autem at itaque et. Aspernatur sed cupiditate architecto. Repellat earum non impedit qui voluptatem ut. Sed nisi accusantium officia est aspernatur.', '1.00', '2019-09-03 20:12:19'),
(5, 1, 12, 4, 'Est id et et non nemo non. Tempora illo consequatur sed magnam nesciunt rerum. Et harum iusto iusto qui. Voluptatem non eaque accusamus ipsum quidem sapiente non.', '1.00', '2019-11-12 17:04:27'),
(6, 2, 15, 1, 'Quod et quae dolorum voluptatum. Amet explicabo culpa fugiat deserunt. Laboriosam cumque magnam fugiat sunt.', '3.00', '2019-10-31 21:29:36'),
(7, 4, 10, 8, 'Aut possimus ea dolorem quam facilis. Et provident omnis eum at eaque vitae nihil est. Sequi omnis ut provident aut. Fugit voluptatem ut praesentium.', '3.00', '2019-05-03 18:56:22'),
(8, 3, 3, 6, 'Omnis ab minima veritatis hic iure. Eligendi a voluptatibus aliquid est tenetur ut. Voluptas quasi molestiae aut quis. Consequuntur velit dolor autem animi sit fuga. Molestiae sapiente voluptatem a recusandae.', '4.00', '2019-05-06 04:27:35'),
(9, 3, 11, 6, 'Quis autem ea et iusto totam debitis tempora similique. Occaecati nobis earum deleniti in. Alias quis quia ea.', '4.00', '2019-08-20 10:33:42'),
(10, 7, 1, 3, 'Consequatur voluptas voluptatem et maiores quibusdam animi eveniet. Perspiciatis aperiam atque laboriosam quibusdam sed et. Ullam reprehenderit quae aperiam ut totam. Est similique odio natus commodi et dolores iusto.', '1.00', '2019-08-17 22:34:29'),
(11, 2, 3, 3, 'Aliquam labore veritatis rem similique et. Atque sit esse laboriosam culpa enim. Sed omnis nisi rerum asperiores necessitatibus. Aut odio dolores facilis. Eveniet facere consequuntur sed. Natus et et dolores.', '2.00', '2020-01-20 08:34:07'),
(12, 7, 18, 4, 'Sed ea est id voluptatem. Cum fugiat aperiam nemo sunt. Id dolore inventore id est quia. Quia quis recusandae consequatur necessitatibus ut cupiditate et quod.', '5.00', '2020-01-20 20:23:04'),
(13, 7, 15, 4, 'Magni est numquam laboriosam beatae. Est et voluptatum aut facilis a nulla est. Ex possimus aspernatur quae enim enim voluptate.', '3.00', '2019-07-31 06:00:17'),
(14, 7, 15, 1, 'Quia vitae aut repellat ipsam itaque voluptas. Minus corrupti pariatur facilis quo odio aperiam. Temporibus eum iusto quidem aut delectus. Quaerat ab eos adipisci tempora quibusdam unde.', '1.00', '2020-02-28 14:54:11'),
(15, 9, 18, 7, 'Voluptas eius repellat optio qui. Non amet numquam quo eaque.', '1.00', '2019-12-10 03:37:06'),
(16, 6, 3, 2, 'Dolor repellendus delectus doloribus consequatur. Deserunt fugit dolor molestiae cupiditate facere nam. Nulla et qui suscipit voluptate quod rem labore eos. Sed aperiam aperiam odit autem quia.', '5.00', '2020-02-08 19:09:34'),
(17, 9, 10, 1, 'Odio qui dolores maiores. Id nemo non at sed assumenda et sed. Libero repudiandae consequatur consequatur excepturi illum. Id eum ut labore odio at qui esse. Qui error velit ratione omnis magni sit inventore.', '1.00', '2019-02-18 13:18:28'),
(18, 3, 3, 8, 'Dolor rerum asperiores quis libero aspernatur. Quibusdam a perspiciatis aut sed totam nostrum enim. Beatae enim libero iusto est. Est dignissimos voluptatibus excepturi cumque quas. Cumque rerum porro facere. Sunt maiores sit sed quis sit.', '2.00', '2019-09-23 23:01:06'),
(19, 10, 9, 3, 'Magni assumenda qui sed dolorum voluptatibus voluptatem. Deserunt error suscipit dicta. Illo molestiae neque dolor asperiores a deserunt.', '4.00', '2019-07-06 04:45:51'),
(20, 6, 18, 6, 'Labore assumenda laudantium veniam id. Autem et consequuntur iste sit a eveniet enim repudiandae. Temporibus corrupti et vero doloremque.', '1.00', '2019-09-05 10:25:57'),
(21, 8, 3, 2, 'Et facilis qui suscipit iure totam quo quod. Enim sunt provident quis voluptatibus. Architecto vero consequatur quis dignissimos. Quia quas et saepe alias expedita. Maiores debitis quasi velit ea deleniti quis labore.', '5.00', '2020-02-11 22:28:41'),
(22, 9, 10, 9, 'Deserunt expedita aperiam aspernatur deserunt facere incidunt. Alias aut dicta ea quaerat assumenda. Accusamus recusandae nam dolores sit. Quia itaque ipsam earum occaecati labore unde.', '4.00', '2019-07-08 08:14:31'),
(23, 6, 2, 4, 'Quas mollitia doloremque placeat modi et cumque est. Corporis beatae dolor eum nulla. Dolorem aperiam nostrum et quis porro. Ut officia dolore cum perferendis aut necessitatibus et.', '1.00', '2019-08-05 16:10:49'),
(24, 9, 2, 5, 'Sit harum in a saepe. Sunt repellendus repellendus dolor nostrum. Quod distinctio delectus blanditiis ea. Error reiciendis aut tenetur. Facere voluptas velit iure tempora consequatur.', '4.00', '2019-03-31 04:00:32'),
(25, 7, 5, 3, 'Ex ipsum praesentium illo incidunt consequuntur aperiam. Accusantium quia omnis occaecati repudiandae placeat et iusto. Sit et occaecati voluptatem esse velit maxime. Sunt adipisci et qui eos ut. Magnam et quia architecto nobis aut debitis sint.', '2.00', '2019-10-28 17:57:05');

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

--
-- Дамп данных таблицы `task`
--

INSERT INTO `task` (`id`, `add_dt`, `author_id`, `executor_id`, `location_id`, `title`, `description`, `category_id`, `budget`, `end_date`, `task_status`) VALUES
(1, '2019-10-31 03:44:01', 10, 3, 132844, 'Consequatur quia.', 'Quisquam omnis aut et est nostrum expedita. Tempora animi consequatur voluptas ad quo vel. Rerum atque est a in porro iste.', 1, 8492, '2019-09-20 00:00:00', 'new'),
(2, '2019-04-25 03:35:21', 1, 9, 509927, 'Illo numquam.', 'Fuga optio iure optio id et velit. Fugit est quia accusantium illum rerum soluta voluptas. Blanditiis facilis pariatur eum deleniti accusantium.', 5, 7471, '2019-01-22 00:00:00', 'inprogress'),
(3, '2019-02-15 12:07:19', 3, 5, 622006, 'Corporis aut.', 'Est at eum quae dolorem impedit et. Labore quae reiciendis autem ratione ad earum. Quia et omnis qui et eaque et.', 3, 9564, '2019-03-31 00:00:00', 'completed'),
(4, '2019-12-07 02:45:17', 4, 1, 132844, 'Fugit enim tempore.', 'Et ea rerum ut qui soluta porro. Laboriosam magni soluta reiciendis quis facere vel corporis. Sit odio quis nihil iusto est aut sunt.', 4, 5001, '2019-03-31 00:00:00', 'new'),
(5, '2019-06-20 08:14:01', 1, 5, 625447, 'Eum vel asperiores.', 'Qui distinctio facere beatae quod nostrum et. Et expedita sunt sunt doloribus nihil est non. Consequatur excepturi expedita ut. Accusamus vitae voluptatem atque debitis officia architecto odio.', 5, 6125, '2019-06-05 00:00:00', 'cancel'),
(6, '2019-02-11 19:01:54', 8, 5, 551192, 'Facilis voluptates excepturi.', 'Consectetur non ab et perferendis. Quae in voluptatem sed natus distinctio. Porro facilis earum est dolorum rerum eius placeat.', 4, 7967, '2019-04-18 00:00:00', 'cancel'),
(7, '2019-07-28 06:18:53', 7, 7, 430893, 'Voluptatem iste ex.', 'Suscipit veniam non repellendus. Fugit in vero sequi ut. Praesentium quam molestiae aut odit voluptas ad. Molestiae velit facere quis maiores.', 1, 719, '2019-05-02 00:00:00', 'failed'),
(8, '2019-10-31 08:51:21', 9, 8, 257031, 'Aut mollitia.', 'Ullam nisi quo ipsa placeat dolorum. Vitae eligendi rerum quo reprehenderit. Officia vero nemo delectus aut. Voluptatem cumque veniam officiis nobis numquam.', 6, 933, '2019-06-28 00:00:00', 'failed'),
(9, '2019-11-30 06:09:41', 6, 2, 133287, 'Sint sapiente eos.', 'Perferendis nam sint id officia illum. Molestiae odio temporibus enim aliquid aut praesentium et. Et ut minus quas doloremque. Velit soluta voluptatem ut quam.', 4, 2767, '2019-09-19 00:00:00', 'completed'),
(10, '2019-02-14 13:44:52', 7, 1, 132844, 'Itaque incidunt veniam.', 'Quaerat est est nostrum. Magnam ut in cumque omnis inventore. Voluptatum non voluptate totam tenetur sequi est quibusdam.', 6, 7768, '2019-05-19 00:00:00', 'inprogress'),
(11, '2019-04-14 05:21:00', 8, 10, 107192, 'Qui et.', 'Omnis labore provident consequuntur similique. Debitis est blanditiis quisquam quis ipsum molestiae voluptatem. Ad aut animi nihil. Tenetur quod dicta nostrum corporis.', 4, 6122, '2019-05-09 00:00:00', 'cancel'),
(12, '2019-03-30 03:18:01', 2, 10, 199007, 'Eius libero.', 'Odit nesciunt facilis repellat ut eveniet nesciunt. Debitis excepturi dolorum nihil quos magni et porro. Atque eos molestiae voluptate. Iure voluptatem voluptates fugit dolorem alias nihil.', 6, 4533, '2019-10-29 00:00:00', 'failed'),
(13, '2019-03-01 03:22:48', 10, 10, 296611, 'Et odit.', 'Cupiditate libero reprehenderit minus reprehenderit rerum. Magni non provident quae natus. Velit distinctio omnis tempore officia. Commodi cum voluptate itaque eum rerum.', 2, 7561, '2019-04-01 00:00:00', 'completed'),
(14, '2019-02-03 14:10:05', 5, 2, 296611, 'Voluptas ut.', 'Et sapiente laudantium laudantium sint voluptas temporibus. Ut est vitae voluptatem ea dolor. Maiores sunt officia temporibus officia.', 6, 1367, '2020-01-19 00:00:00', 'new'),
(15, '2020-03-06 22:21:06', 2, 5, 570693, 'Eaque dolorem.', 'Modi libero accusantium aperiam dolor. Sunt similique porro quibusdam est optio vero quo. Earum placeat molestiae quibusdam consequatur vitae explicabo eum et.', 6, 9119, '2019-08-31 00:00:00', 'new'),
(16, '2020-01-28 05:49:07', 4, 9, 210099, 'Voluptas natus natus.', 'Voluptatum rerum id nihil nihil quae aut quam. Quos amet iusto a ullam. Ducimus quam voluptatem omnis.', 3, 6312, '2019-01-27 00:00:00', 'new'),
(17, '2019-07-18 13:24:32', 5, 9, 570693, 'Eum illo.', 'Aliquid nulla provident rerum qui et nam id aliquam. Aut amet ut quibusdam ea vel magni perferendis. Sit et distinctio aut quis est magni quasi. Asperiores rerum officia in fugit et.', 3, 8200, '2019-03-26 00:00:00', 'failed'),
(18, '2019-11-24 16:58:54', 1, 5, 551192, 'Et ut.', 'Ducimus est incidunt doloribus laborum aperiam non. Consequatur pariatur ut quia expedita quo et consequuntur. Repudiandae tempore optio nesciunt animi. In fuga hic ratione quia delectus ea quod.', 3, 4974, '2019-07-04 00:00:00', 'failed'),
(19, '2019-04-25 00:46:42', 8, 8, 380567, 'Quo nemo quidem.', 'Soluta et provident doloremque saepe voluptatibus voluptatum. Aut et voluptas odit ut qui dolor voluptatem et. Architecto sint et sed corrupti.', 1, 5803, '2019-07-09 00:00:00', 'new'),
(20, '2019-02-04 07:06:58', 6, 4, 107192, 'Et nobis.', 'Et quia omnis dolor qui dolorem ratione blanditiis. At enim quos id necessitatibus. Sequi qui placeat iste rerum labore.', 5, 3869, '2019-03-02 00:00:00', 'completed'),
(21, '2019-03-20 16:55:46', 8, 9, 232886, 'Atque sit voluptatibus.', 'Occaecati ex dolores asperiores ex quis vero. Quisquam ducimus fugiat dolor officia quis eos.', 4, 9524, '2019-01-15 00:00:00', 'cancel'),
(22, '2019-06-26 08:55:48', 4, 1, 570693, 'Aspernatur iste voluptatum.', 'Voluptatem pariatur maxime fugit. Possimus nobis est et velit dolor. Praesentium eligendi repellat et dolorem commodi doloremque quia. Similique sed sit quam.', 5, 6960, '2019-08-27 00:00:00', 'completed'),
(23, '2019-07-27 19:18:50', 10, 2, 199007, 'Eius facilis.', 'Suscipit aliquam voluptas molestiae consectetur. Eveniet aut libero inventore et. Non laborum officia ut rerum id vitae. Amet omnis maxime praesentium voluptas. Repudiandae rerum architecto vel.', 4, 8534, '2019-09-05 00:00:00', 'new'),
(24, '2019-06-16 06:59:00', 5, 1, 380567, 'Eveniet ipsam.', 'Quia inventore aliquid pariatur beatae explicabo. Possimus eaque libero et delectus pariatur eaque eligendi. Itaque quo expedita pariatur molestiae.', 1, 5000, '2019-01-05 00:00:00', 'completed'),
(25, '2019-08-11 05:19:41', 5, 8, 614726, 'Voluptas veritatis aut.', 'Dolore aliquid fuga molestias iusto sapiente quisquam atque sint. Quod sunt aperiam dicta et sit perferendis rem. Molestiae reiciendis animi sit a.', 2, 5882, '2019-08-31 00:00:00', 'new'),
(26, '2019-08-18 04:28:40', 1, 8, 596258, 'Officia quasi aut.', 'Fuga modi ipsum rem eum molestiae qui. Non quas aliquam minus quis est est. Praesentium omnis est voluptatem quo.', 6, 9511, '2019-09-10 00:00:00', 'failed'),
(27, '2019-07-06 02:44:57', 9, 1, 210099, 'Voluptate eius soluta.', 'Dolor magni et illo est. Distinctio quis nesciunt autem saepe quos qui. Praesentium amet recusandae nobis ducimus. Ipsa at explicabo maiores qui ut.', 2, 4565, '2019-06-09 00:00:00', 'completed'),
(28, '2019-04-12 03:19:44', 9, 10, 509927, 'Quasi ut.', 'Fugit iure consequatur voluptate eligendi nesciunt. Explicabo eos officia expedita provident quia provident ullam. Repudiandae perspiciatis molestias voluptas laboriosam.', 6, 2137, '2019-05-15 00:00:00', 'cancel'),
(29, '2019-02-24 11:09:13', 8, 1, 133287, 'Veritatis odit.', 'Odio nisi non qui aut id. Repellendus nihil et id unde eveniet. Repellendus molestiae id et eaque ut ipsum. Consequatur optio et accusamus perferendis quis vel.', 5, 6032, '2019-06-25 00:00:00', 'completed'),
(30, '2019-02-10 14:04:18', 9, 1, 570693, 'Consequuntur possimus.', 'Incidunt a facilis voluptatem praesentium et. Necessitatibus sunt ut voluptas quia quia eligendi. Nihil autem aliquid dolores a consequatur.', 6, 585, '2019-09-21 00:00:00', 'inprogress'),
(31, '2019-08-23 12:27:46', 2, 4, 216399, 'Adipisci cumque doloribus.', 'Aliquam earum repellendus dolores accusamus. Animi laboriosam quis a vero et quis quia dolorem. Aut expedita ut quia quia. Et corporis doloribus quis sit velit voluptate.', 6, 5798, '2019-12-05 00:00:00', 'failed'),
(32, '2019-10-07 04:51:27', 5, 8, 509927, 'Consectetur assumenda.', 'Quibusdam et dolorem reiciendis. Omnis qui atque aspernatur sint repudiandae animi dignissimos. Cum eveniet vitae ea et ipsam maxime aut deleniti. Quis et iste consequuntur beatae cum consequatur.', 2, 1992, '2020-01-01 00:00:00', 'inprogress'),
(33, '2019-04-07 02:20:43', 8, 4, 622006, 'Laboriosam odio.', 'Ab sunt quod tenetur ducimus voluptatem veniam. Consequatur veniam quis reiciendis. Dolorem id nisi unde eum facere quia.', 2, 9574, '2019-11-17 00:00:00', 'failed'),
(34, '2019-10-23 18:13:44', 4, 5, 132844, 'Placeat nihil.', 'At repellendus architecto animi aut. Ut quasi recusandae quia non rerum blanditiis. Voluptas quia ut magnam qui rem consequatur et. Est ad molestias earum fuga recusandae quibusdam quis.', 4, 8540, '2019-06-04 00:00:00', 'inprogress'),
(35, '2019-10-13 13:21:38', 7, 3, 232886, 'Sit numquam.', 'Sequi aliquam repellat praesentium fugiat. Dolores fugit excepturi facilis totam voluptatem. Ut et corporis quia quia rerum repudiandae.', 4, 3631, '2019-09-15 00:00:00', 'completed'),
(36, '2020-01-29 16:44:42', 3, 7, 457564, 'Blanditiis et dolor.', 'Qui praesentium nostrum necessitatibus amet molestiae. Quod est earum ea animi laboriosam ratione ut. Itaque rem rerum minus mollitia recusandae reprehenderit commodi quo.', 5, 3155, '2019-09-22 00:00:00', 'inprogress'),
(37, '2019-05-05 08:52:48', 10, 4, 453647, 'Qui dolore vero.', 'Quidem neque eveniet ut voluptas recusandae. Explicabo corporis placeat unde ut debitis doloremque temporibus. Ut nihil enim officia voluptatem. Optio architecto ipsum dolor accusamus.', 6, 1535, '2019-05-14 00:00:00', 'inprogress'),
(38, '2019-04-17 16:38:37', 2, 2, 296611, 'Voluptas voluptatem reiciendis.', 'Harum voluptatem corporis alias. Itaque harum officia doloremque excepturi ipsum quis. Voluptatum ipsa aliquam doloribus reprehenderit aliquam aut veritatis. Sed quidem quod et.', 6, 1452, '2019-08-11 00:00:00', 'new'),
(39, '2019-04-24 08:33:46', 5, 5, 509927, 'Id quia.', 'Quia pariatur est vero ducimus minima. Quaerat et nostrum aliquam id. Et blanditiis repudiandae odio iusto. Et perspiciatis aut ducimus dolores veritatis cum architecto eligendi.', 6, 471, '2019-12-27 00:00:00', 'cancel'),
(40, '2019-02-21 17:40:29', 5, 10, 380567, 'Quia et.', 'Commodi commodi et illum quisquam maxime impedit eum. Veritatis expedita deserunt quos ex. Nostrum iste nisi rerum ex itaque illo dolores eveniet.', 1, 5384, '2019-03-21 00:00:00', 'new');

-- --------------------------------------------------------

--
-- Структура таблицы `town`
--

CREATE TABLE `town` (
  `id` int(11) NOT NULL COMMENT 'почтовый код города',
  `town` varchar(120) CHARACTER SET utf8mb4 NOT NULL COMMENT 'название города'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COMMENT='Названия городов';

--
-- Дамп данных таблицы `town`
--

INSERT INTO `town` (`id`, `town`) VALUES
(107192, 'Feeneyville'),
(110213, 'Steuberstad'),
(132844, 'Josefinahaven'),
(133287, 'Rauburgh'),
(199007, 'Jordynhaven'),
(210099, 'New Oscarland'),
(216399, 'Ernestfurt'),
(232886, 'Zemlakshire'),
(257031, 'Casperside'),
(296611, 'New Leta'),
(380567, 'West Herminia'),
(430893, 'Lake Daxstad'),
(453647, 'Eleanoreburgh'),
(457564, 'O\'Connerview'),
(470300, 'Collinsport'),
(504279, 'Spinkaport'),
(509927, 'Brettberg'),
(551192, 'East Mariane'),
(564435, 'Wardberg'),
(569521, 'East Adelle'),
(570693, 'Kayleighville'),
(596258, 'Dinofort'),
(598728, 'Greenbury'),
(614726, 'Port Albertaside'),
(622006, 'Cronafort'),
(625447, 'Hartmannton'),
(626657, 'North Claremouth'),
(626871, 'Towneberg'),
(641652, 'West Andres'),
(691287, 'Smithshire');

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

--
-- Дамп данных таблицы `user`
--

INSERT INTO `user` (`id`, `full_name`, `created_at`, `role`, `password`, `avatar`, `about_user`, `birthdate`, `town_id`) VALUES
(1, 'Adela Mraz', '2019-10-03 00:00:00', '1', '7}!obB=\'&fnB.r\'?[z', 'https://lorempixel.com/640/480/?39521', 'Est illum nostrum nulla placeat sint. Sed mollitia ipsum hic laborum nostrum ipsa. Iste repudiandae aut facere architecto.', '1964-08-04', 158612),
(2, 'Fleta Stamm', '2019-08-15 00:00:00', '1', 'h)CgSbJn%J(sY\'t*DWN`', 'https://lorempixel.com/640/480/?79197', 'Nostrum sit dolores et maxime aut optio qui officia. Vel provident voluptatibus qui et repellat possimus repudiandae. Omnis neque iure accusantium vel ipsam est delectus eveniet.', '2003-06-30', 336631),
(3, 'Nathaniel Schneider IV', '2019-12-15 00:00:00', '0', 'ly%!1;Kv!p&8ck~N|E`', 'https://lorempixel.com/640/480/?11491', 'Voluptas ullam quaerat et ea. Fugiat sit pariatur et et. Sit recusandae reprehenderit quia. Repellat dolores voluptates et ut. Architecto et soluta aut sint autem et.', '1981-03-31', 337182),
(4, 'Myron Bernier II', '2019-01-22 00:00:00', '1', 'lle54/Tl>qHzol', 'https://lorempixel.com/640/480/?45518', 'Quasi minus eos corporis fuga et dolorem inventore. Ut qui voluptas et ab. Commodi officiis nisi est recusandae.', '1945-03-14', 370671),
(5, 'Arnold McGlynn', '2019-04-06 00:00:00', '0', 'B@83/4?ck.', 'https://lorempixel.com/640/480/?44743', 'Nobis eveniet odit ipsum recusandae. Officia voluptatem aspernatur ad id dolorem numquam ipsa. Dignissimos dolor ut quia architecto optio.', '1968-05-06', 597542),
(6, 'Emmalee Kiehn', '2019-04-16 00:00:00', '0', 'LGN<t/Syla*E:?d', 'https://lorempixel.com/640/480/?41974', 'Iure non qui rerum non modi sed. Ut veritatis consequatur sint odit officia. Praesentium voluptas porro eum doloremque atque et.', '1953-02-24', 163456),
(7, 'Mr. Consuelo Wilderman', '2019-06-17 00:00:00', '1', 'IukJEi>:de8ZN0Ks', 'https://lorempixel.com/640/480/?64059', 'Dolores aut assumenda placeat et rerum non fugit. Deleniti ea non sequi quo facilis sunt nam. Quae dolorem ut occaecati et quia est omnis. Quo voluptatem ex rerum dignissimos autem nulla.', '1948-06-10', 102404),
(8, 'Arnaldo Johnston I', '2019-04-18 00:00:00', '0', '=vYpo_bC', 'https://lorempixel.com/640/480/?11868', 'Excepturi in magni quo vel facilis nobis. Enim numquam autem id asperiores rem voluptates ullam quia. Dolores repellat vitae officia soluta.', '1957-09-10', 490567),
(9, 'Ms. Una Streich', '2019-03-17 00:00:00', '1', '7;HGF;A.f:K7.', 'https://lorempixel.com/640/480/?37756', 'Aperiam eos ea unde iusto deleniti quia cumque. Rerum vitae tempore nihil et qui. Laborum cumque eos dolorum provident voluptatem molestiae ex. Numquam suscipit dicta saepe.', '1985-11-10', 520365),
(10, 'Alexa Leannon', '2019-12-12 00:00:00', '1', '\'|?^u9\\xty1q~', 'https://lorempixel.com/640/480/?18367', 'Non architecto aperiam doloribus culpa exercitationem delectus. Illum sint voluptatem ut. Mollitia autem quisquam perspiciatis autem magni omnis. Debitis necessitatibus optio et quia.', '1966-12-11', 628215);

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

--
-- Дамп данных таблицы `userevent`
--

INSERT INTO `userevent` (`id`, `user_id`, `event`, `icon`) VALUES
(1, 8, 'enim', 'cancel'),
(2, 7, 'vitae', 'complete'),
(3, 1, 'ad', 'complete'),
(4, 6, 'odio', 'cancel'),
(5, 9, 'et', 'respond'),
(6, 10, 'veniam', 'respond'),
(7, 5, 'quia', 'create'),
(8, 10, 'consequuntur', 'cancel'),
(9, 5, 'impedit', 'create'),
(10, 5, 'numquam', 'complete'),
(11, 2, 'qui', 'respond'),
(12, 3, 'sapiente', 'cancel'),
(13, 6, 'illo', 'respond'),
(14, 4, 'non', 'respond'),
(15, 5, 'ad', 'create');

-- --------------------------------------------------------

--
-- Структура таблицы `userimage`
--

CREATE TABLE `userimage` (
  `id` int(11) NOT NULL COMMENT 'id загруженного файла',
  `user_id` int(11) NOT NULL COMMENT 'id пользователя, кто размещает файлы',
  `file_url` varchar(255) CHARACTER SET utf8mb4 NOT NULL COMMENT 'url размещения загруженного файла'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `userimage`
--

INSERT INTO `userimage` (`id`, `user_id`, `file_url`) VALUES
(1, 8, 'https://lorempixel.com/640/480/?31428'),
(2, 1, 'https://lorempixel.com/640/480/?26650'),
(3, 8, 'https://lorempixel.com/640/480/?35350'),
(4, 9, 'https://lorempixel.com/640/480/?88100'),
(5, 7, 'https://lorempixel.com/640/480/?81504'),
(6, 5, 'https://lorempixel.com/640/480/?82328'),
(7, 10, 'https://lorempixel.com/640/480/?86515'),
(8, 10, 'https://lorempixel.com/640/480/?11573'),
(9, 6, 'https://lorempixel.com/640/480/?10593'),
(10, 6, 'https://lorempixel.com/640/480/?74983');

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

--
-- Дамп данных таблицы `userstatistic`
--

INSERT INTO `userstatistic` (`user_id`, `views_number`, `available_now`, `last_visit`) VALUES
(1, 8, 0, '2020-03-07 05:05:30'),
(2, 14, 0, '2020-03-05 15:15:16'),
(3, 10, 1, '2020-03-05 20:48:57'),
(4, 14, 0, '2020-03-06 07:40:23'),
(5, 15, 0, '2020-03-05 02:26:11'),
(6, 15, 1, '2020-03-06 18:34:01'),
(7, 5, 1, '2020-03-06 12:05:15'),
(8, 2, 0, '2020-03-07 06:59:40'),
(9, 6, 1, '2020-03-05 17:53:17'),
(10, 9, 0, '2020-03-05 15:52:03');

-- --------------------------------------------------------

--
-- Структура таблицы `user_category`
--

CREATE TABLE `user_category` (
  `user_id` int(11) NOT NULL COMMENT 'id пользователя',
  `category_id` int(11) NOT NULL COMMENT 'id категории'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COMMENT='таблица связи';

--
-- Дамп данных таблицы `user_category`
--

INSERT INTO `user_category` (`user_id`, `category_id`) VALUES
(2, 5),
(7, 7),
(8, 5),
(10, 1),
(5, 5),
(3, 7),
(9, 1),
(5, 4),
(5, 7),
(6, 7),
(7, 1),
(3, 3),
(5, 5),
(8, 4),
(1, 3),
(3, 4),
(7, 2),
(6, 1),
(9, 7),
(4, 1);

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

--
-- Ограничения внешнего ключа таблицы `task`
--
ALTER TABLE `task`
  ADD CONSTRAINT `task_ibfk_1` FOREIGN KEY (`author_id`) REFERENCES `user` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `task_ibfk_2` FOREIGN KEY (`category_id`) REFERENCES `category` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `task_ibfk_3` FOREIGN KEY (`executor_id`) REFERENCES `user` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `task_ibfk_4` FOREIGN KEY (`location_id`) REFERENCES `location` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Ограничения внешнего ключа таблицы `user`
--
ALTER TABLE `user`
  ADD CONSTRAINT `user_ibfk_1` FOREIGN KEY (`town_id`) REFERENCES `town` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Ограничения внешнего ключа таблицы `userevent`
--
ALTER TABLE `userevent`
  ADD CONSTRAINT `userevent_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `user` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Ограничения внешнего ключа таблицы `userimage`
--
ALTER TABLE `userimage`
  ADD CONSTRAINT `userimage_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `user` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Ограничения внешнего ключа таблицы `userstatistic`
--
ALTER TABLE `userstatistic`
  ADD CONSTRAINT `userstatistic_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `user` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Ограничения внешнего ключа таблицы `user_category`
--
ALTER TABLE `user_category`
  ADD CONSTRAINT `user_category_ibfk_1` FOREIGN KEY (`category_id`) REFERENCES `category` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `user_category_ibfk_2` FOREIGN KEY (`user_id`) REFERENCES `user` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

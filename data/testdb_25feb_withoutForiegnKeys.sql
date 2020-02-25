-- phpMyAdmin SQL Dump
-- version 4.9.0.1
-- https://www.phpmyadmin.net/
--
-- Хост: 127.0.0.1:3306
-- Время создания: Фев 25 2020 г., 18:58
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
-- База данных: `testdb_25feb`
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
(1, 'Quia in.', 'aut'),
(2, 'Eum et magnam.', 'aut'),
(3, 'Quia odit.', 'voluptatem'),
(4, 'Itaque dicta.', 'nulla'),
(5, 'Quas dolor optio.', 'est'),
(6, 'Debitis molestiae.', 'dolor'),
(7, 'At in illum.', 'mollitia');

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
  `rate_stars` int(11) NOT NULL COMMENT 'оценка выполнения задания 1-5 звёзд',
  `created_at` datetime DEFAULT current_timestamp() COMMENT 'время создания отзыва'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `review`
--

INSERT INTO `review` (`id`, `author_id`, `task_id`, `executor_id`, `review_content`, `rate_stars`, `created_at`) VALUES
(1, 7, 5, 8, 'Ipsam et explicabo labore natus sed optio voluptatem. Ducimus aliquid blanditiis sit vitae. Dolorem qui ratione id est officia esse culpa. Officia quam aut itaque recusandae dicta dolores quam.', 5, '2019-04-28 16:54:14'),
(2, 9, 12, 7, 'Voluptate ullam eos delectus cumque autem. Omnis in fugiat recusandae. Aliquid incidunt exercitationem ad.', 2, '2019-02-27 23:08:34'),
(3, 6, 6, 8, 'Quis quasi ducimus natus rerum consectetur veritatis et. Nulla consequatur esse atque omnis. Expedita optio deserunt incidunt. Ipsa explicabo unde neque qui consectetur.', 4, '2019-06-03 06:25:41'),
(4, 9, 10, 7, 'Repudiandae nobis provident id reiciendis consectetur dolorem. Ad architecto optio distinctio exercitationem sint voluptatum. Natus ut aspernatur quia explicabo deserunt et.', 1, '2019-08-20 19:44:28'),
(5, 9, 7, 1, 'Omnis repellat tempora porro adipisci. Eaque totam officia corporis inventore. Minus pariatur ipsa et voluptatum est nostrum praesentium ipsum.', 4, '2019-01-09 09:47:54'),
(6, 5, 9, 5, 'Amet nihil quae dignissimos sit ut quia. Quia quo consequatur quos hic provident. Et nulla voluptates aut reiciendis commodi fuga. Fuga porro tempora ad in quis. Labore tempora in est quos et illum rerum. Sequi et natus voluptas corporis.', 2, '2019-07-05 11:28:27'),
(7, 5, 9, 8, 'Laborum delectus voluptatem necessitatibus qui. Vel quasi aut excepturi nesciunt eaque dolorum. Ut voluptatem error velit veritatis atque vero rem.', 4, '2019-04-08 04:35:04'),
(8, 6, 9, 1, 'Accusantium qui suscipit quia mollitia aliquid ea quo. Eum vel nobis maxime sint rerum debitis a. Nihil quasi sunt est. Sint aut officia qui sed at quidem qui. Enim nostrum dolor sequi aliquid.', 3, '2019-05-05 08:03:52');

-- --------------------------------------------------------

--
-- Структура таблицы `task`
--

CREATE TABLE `task` (
  `id` int(11) NOT NULL COMMENT 'id задания',
  `created_at` datetime NOT NULL COMMENT 'время создания задания',
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

INSERT INTO `task` (`id`, `created_at`, `author_id`, `executor_id`, `location_id`, `title`, `description`, `category_id`, `budget`, `end_date`, `task_status`) VALUES
(1, '2019-08-08 17:10:02', 7, 2, 453647, 'Id exercitationem omnis.', 'Magni quas incidunt nulla ut omnis repudiandae. Voluptas unde odit cum et cupiditate. Modi explicabo eos facere odio esse qui.', 1, 7374, '2019-09-23 00:00:00', 'cancel'),
(2, '2019-09-24 18:30:03', 4, 10, 232886, 'Cumque hic reiciendis.', 'Cupiditate quae dolore numquam qui ut. Minima corrupti saepe harum iusto est. Corrupti eum facere consequatur sunt ratione ut quos quis.', 4, 5151, '2019-03-26 00:00:00', 'cancel'),
(3, '2020-02-09 03:39:24', 9, 5, 380567, 'Vel omnis.', 'Maiores est veniam sunt veritatis. Aut et ut eos et ut vel. Deserunt sed inventore tempora dicta nobis non. Earum suscipit possimus quia nihil odio sunt ipsam.', 3, 9495, '2019-03-19 00:00:00', 'cancel'),
(4, '2019-10-03 11:17:23', 2, 7, 570693, 'Et omnis eius.', 'Ut vel voluptatem nobis sit voluptatem atque ex. Nobis id dolorem nostrum alias molestias. Dolor aut quis expedita sequi. Facilis illo inventore voluptate.', 4, 4063, '2019-09-17 00:00:00', 'failed'),
(5, '2019-07-18 13:50:23', 7, 8, 107192, 'Eius deleniti.', 'Delectus ut ipsum illo nisi et voluptatem quis. Eos qui ut officiis maiores quaerat quos. Magnam dignissimos cupiditate id ducimus in molestiae.', 6, 1280, '2019-10-18 00:00:00', 'inprogress'),
(6, '2019-02-16 06:23:06', 3, 5, 216399, 'Blanditiis occaecati.', 'Qui molestias sint occaecati nulla. Quae odio quo similique ipsum. Quidem dolores fugit cumque et. Totam iure quam fugiat et.', 2, 5211, '2019-11-05 00:00:00', 'new'),
(7, '2019-02-22 04:26:12', 2, 9, 504279, 'Non eum.', 'Porro quis quos praesentium ea. Dolorem impedit earum officia hic. Aut cum molestiae voluptas ut explicabo magnam nulla. Et aut reiciendis quaerat ipsam cupiditate.', 6, 2883, '2019-06-24 00:00:00', 'cancel'),
(8, '2020-02-19 00:32:22', 9, 6, 133287, 'Voluptate non.', 'In vel molestias eius sapiente totam sit ullam. Sit tenetur nisi voluptatibus ea. Omnis velit maxime saepe amet soluta accusamus ullam magni.', 6, 9571, '2019-12-04 00:00:00', 'inprogress'),
(9, '2019-05-12 11:55:35', 5, 10, 257031, 'Molestiae voluptatum magnam.', 'Non quo mollitia et quibusdam. Non consequatur ut et ipsa. Eligendi aperiam rerum sit ea optio. Sed tenetur architecto ab sit. Architecto sed esse voluptatem enim tenetur porro incidunt doloribus.', 2, 1039, '2019-12-06 00:00:00', 'new'),
(10, '2019-04-23 19:13:40', 10, 3, 132844, 'Tenetur enim.', 'Sint dolore aspernatur sapiente dolor. Inventore et voluptates fugiat vel possimus. Nisi nesciunt asperiores maxime eos.', 4, 5542, '2019-06-13 00:00:00', 'new'),
(11, '2019-03-21 00:11:41', 6, 5, 430893, 'Est quas.', 'Dolores esse dignissimos totam nam. Quibusdam numquam sed eum delectus optio deserunt quis dolorem. Placeat voluptates porro dolores quam. Et ut velit similique asperiores animi.', 5, 6799, '2019-01-04 00:00:00', 'failed'),
(12, '2019-10-08 16:06:07', 2, 9, 570693, 'Atque est.', 'Ut est qui id maiores. Quaerat porro est numquam ea saepe qui et. Cupiditate sint eaque nobis ut molestias. Necessitatibus et consequatur veniam quia aut facilis earum et.', 5, 9917, '2019-09-11 00:00:00', 'failed'),
(13, '2019-04-05 22:10:34', 2, 4, 430893, 'Eum at.', 'Sequi nihil assumenda omnis. Quia temporibus alias debitis omnis voluptas eum natus.', 4, 1137, '2019-03-18 00:00:00', 'cancel'),
(14, '2019-10-29 14:49:07', 5, 4, 380567, 'Maiores et.', 'Error molestiae sed iusto rerum ut. Autem voluptas tempora sed voluptate. Sunt est molestias molestiae consequatur dicta dolorem itaque.', 6, 6808, '2019-08-03 00:00:00', 'inprogress'),
(15, '2019-10-19 21:03:15', 8, 9, 504279, 'Iure sint.', 'Culpa fuga qui esse sint rerum sapiente delectus cupiditate. Facilis optio nam in et nesciunt magnam mollitia. Aliquid magnam vero alias officiis.', 6, 1954, '2019-07-15 00:00:00', 'inprogress'),
(16, '2019-11-12 20:24:09', 5, 3, 380567, 'Distinctio molestiae.', 'Dolor et numquam ea. Et quis praesentium quis voluptatem vel. Cupiditate quia hic repellat quia. Consequuntur odio facilis aut earum ad est quae.', 4, 9397, '2019-12-25 00:00:00', 'cancel'),
(17, '2019-10-04 14:39:52', 9, 8, 132844, 'Adipisci fuga ut.', 'Voluptates eveniet culpa at nam. Voluptates magni optio voluptas quo quia exercitationem. Ad non nostrum architecto omnis veritatis enim ut rerum.', 4, 4860, '2019-06-20 00:00:00', 'new');

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
(1, 4, 'soluta', 'complete'),
(2, 5, 'nesciunt', 'create'),
(3, 8, 'mollitia', 'complete'),
(4, 5, 'labore', 'complete'),
(5, 1, 'cum', 'create'),
(6, 9, 'ullam', 'create'),
(7, 7, 'necessitatibus', 'refuse'),
(8, 10, 'dolorem', 'create'),
(9, 8, 'alias', 'create'),
(10, 7, 'perferendis', 'respond'),
(11, 3, 'quam', 'cancel'),
(12, 4, 'quis', 'create'),
(13, 2, 'voluptates', 'respond');

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
(1, 13, 2, '2019-10-16 17:56:31'),
(2, 0, 1, '2019-09-06 02:03:02'),
(3, 15, 2, '2019-01-14 18:52:38'),
(4, 8, 2, '2019-11-30 13:05:43'),
(5, 10, 1, '2019-07-18 05:04:42'),
(6, 4, 2, '2019-09-02 15:08:15'),
(7, 14, 2, '2019-06-16 22:04:56'),
(8, 2, 1, '2019-08-14 19:22:11'),
(9, 10, 2, '2019-07-16 00:59:52'),
(10, 14, 2, '2019-12-18 21:02:12');

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
(1, 2),
(5, 1),
(10, 5),
(1, 1),
(2, 4),
(10, 2),
(1, 7),
(6, 1),
(10, 5),
(8, 4),
(4, 6),
(3, 5),
(9, 4),
(8, 4),
(4, 5);

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
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT COMMENT 'id категории', AUTO_INCREMENT=8;

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
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT COMMENT 'id отзыва', AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT для таблицы `task`
--
ALTER TABLE `task`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT COMMENT 'id задания', AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT для таблицы `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT COMMENT 'id пользователя', AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT для таблицы `userevent`
--
ALTER TABLE `userevent`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT COMMENT 'id типа события', AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT для таблицы `userimage`
--
ALTER TABLE `userimage`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT COMMENT 'id загруженного файла', AUTO_INCREMENT=11;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

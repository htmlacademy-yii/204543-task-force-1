-- phpMyAdmin SQL Dump
-- version 4.9.0.1
-- https://www.phpmyadmin.net/
--
-- Хост: 127.0.0.1:3306
-- Время создания: Янв 20 2020 г., 14:46
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
-- База данных: `yiitask_db`
--

-- --------------------------------------------------------

--
-- Структура таблицы `category`
--

CREATE TABLE `category` (
  `id` int(11) NOT NULL COMMENT 'id категории',
  `name` varchar(120) NOT NULL COMMENT 'название категории',
  `icon` varchar(120) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `category`
--

INSERT INTO `category` (`id`, `name`, `icon`) VALUES
(10, 'Курьерские услуги', 'delivary'),
(11, 'Уборка', 'clean'),
(12, 'Переезды', 'cargo'),
(13, 'Компьютерная помощь', 'neo'),
(14, 'Ремонт квартирный', 'flat'),
(15, 'Ремонт техники', 'repair'),
(16, 'Красота', 'beauty'),
(17, 'Фото', 'photo');

-- --------------------------------------------------------

--
-- Структура таблицы `cities`
--

CREATE TABLE `cities` (
  `id` int(11) NOT NULL COMMENT 'id города',
  `city` varchar(120) COLLATE utf8mb4_unicode_ci NOT NULL COMMENT 'название города',
  `latitude` decimal(10,7) NOT NULL COMMENT 'широта местоположения',
  `longitude` decimal(10,7) NOT NULL COMMENT 'долгота местоположения'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Структура таблицы `opinions`
--

CREATE TABLE `opinions` (
  `id` int(11) NOT NULL,
  `dt_add` date NOT NULL,
  `rate` int(11) NOT NULL,
  `description` text COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Дамп данных таблицы `opinions`
--

INSERT INTO `opinions` (`id`, `dt_add`, `rate`, `description`) VALUES
(1, '2019-08-19', 3, 'Cras non velit nec nisi vulputate nonummy. Maecenas tincidunt lacus at velit. Vivamus vel nulla eget eros elementum pellentesque.\n\nQuisque porta volutpat erat. Quisque erat eros, viverra eget, congue eget, semper rutrum, nulla. Nunc purus.\n\nPhasellus in felis. Donec semper sapien a libero. Nam dui.'),
(2, '2019-02-22', 2, 'Fusce posuere felis sed lacus. Morbi sem mauris, laoreet ut, rhoncus aliquet, pulvinar sed, nisl. Nunc rhoncus dui vel sem.\n\nSed sagittis. Nam congue, risus semper porta volutpat, quam pede lobortis ligula, sit amet eleifend pede libero quis orci. Nullam molestie nibh in lectus.\n\nPellentesque at nulla. Suspendisse potenti. Cras in purus eu magna vulputate luctus.'),
(3, '2019-07-11', 2, 'Curabitur in libero ut massa volutpat convallis. Morbi odio odio, elementum eu, interdum eu, tincidunt in, leo. Maecenas pulvinar lobortis est.\n\nPhasellus sit amet erat. Nulla tempus. Vivamus in felis eu sapien cursus vestibulum.'),
(4, '2018-10-07', 2, 'Duis aliquam convallis nunc. Proin at turpis a pede posuere nonummy. Integer non velit.\n\nDonec diam neque, vestibulum eget, vulputate ut, ultrices vel, augue. Vestibulum ante ipsum primis in faucibus orci luctus et ultrices posuere cubilia Curae; Donec pharetra, magna vestibulum aliquet ultrices, erat tortor sollicitudin mi, sit amet lobortis sapien sapien non mi. Integer ac neque.'),
(5, '2018-12-01', 1, 'Aenean lectus. Pellentesque eget nunc. Donec quis orci eget orci vehicula condimentum.\n\nCurabitur in libero ut massa volutpat convallis. Morbi odio odio, elementum eu, interdum eu, tincidunt in, leo. Maecenas pulvinar lobortis est.'),
(6, '2018-11-09', 3, 'In congue. Etiam justo. Etiam pretium iaculis justo.'),
(7, '2018-12-10', 5, 'In hac habitasse platea dictumst. Morbi vestibulum, velit id pretium iaculis, diam erat fermentum justo, nec condimentum neque sapien placerat ante. Nulla justo.\n\nAliquam quis turpis eget elit sodales scelerisque. Mauris sit amet eros. Suspendisse accumsan tortor quis turpis.\n\nSed ante. Vivamus tortor. Duis mattis egestas metus.'),
(8, '2018-10-20', 2, 'Curabitur gravida nisi at nibh. In hac habitasse platea dictumst. Aliquam augue quam, sollicitudin vitae, consectetuer eget, rutrum at, lorem.\n\nInteger tincidunt ante vel ipsum. Praesent blandit lacinia erat. Vestibulum sed magna at nunc commodo placerat.'),
(9, '2018-10-27', 2, 'Cras non velit nec nisi vulputate nonummy. Maecenas tincidunt lacus at velit. Vivamus vel nulla eget eros elementum pellentesque.\n\nQuisque porta volutpat erat. Quisque erat eros, viverra eget, congue eget, semper rutrum, nulla. Nunc purus.'),
(10, '2019-06-14', 4, 'Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Proin risus. Praesent lectus.');

-- --------------------------------------------------------

--
-- Структура таблицы `profiles`
--

CREATE TABLE `profiles` (
  `id` int(11) NOT NULL,
  `address` varchar(250) COLLATE utf8mb4_unicode_ci NOT NULL,
  `bd` date NOT NULL,
  `about` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `phone` varchar(15) COLLATE utf8mb4_unicode_ci NOT NULL,
  `skype` varchar(120) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Дамп данных таблицы `profiles`
--

INSERT INTO `profiles` (`id`, `address`, `bd`, `about`, `phone`, `skype`) VALUES
(1, '38737 Moose Avenue', '1989-11-11', 'In est risus, auctor sed, tristique in, tempus sit amet, sem. Fusce consequat.', '75531015353', 'Re-engineered'),
(2, '738 Hagan Lane', '1989-03-05', 'Pellentesque ultrices mattis odio.', '75531015353', 'mobile'),
(3, '758 Old Shore Parkway', '1989-12-30', 'Morbi a ipsum. Integer a nibh. In quis justo.', '16371407508', 'Re-engineered'),
(4, '11 Dovetail Junction', '0629-03-03', 'Suspendisse potenti.', '21468788926', 'Grass-roots'),
(5, '050 Bowman Alley', '1989-04-08', 'Morbi quis tortor id nulla ultrices aliquet. Maecenas leo odio, condimentum id, luctus nec, molestie sed, justo.', '62931646367', 'fault-tolerant'),
(6, '5 Iowa Avenue', '1989-04-18', 'Maecenas tristique, est et tempus semper, est quam pharetra magna, ac consequat metus sapien ut nunc. Vestibulum ante ipsum primis in faucibus orci luctus et ultrices posuere cubilia Curae; Mauris viverra diam vitae quam.', '63271348718', 'Team-oriented'),
(7, '87119 Northland Hill', '1989-03-20', 'Sed vel enim sit amet nunc viverra dapibus. Nulla suscipit ligula in lacus.', '41056175169', 'portal'),
(8, '6823 Lillian Point', '1989-12-13', 'Pellentesque viverra pede ac diam. Cras pellentesque volutpat dui. Maecenas tristique, est et tempus semper, est quam pharetra magna, ac consequat metus sapien ut nunc.', '72882384431', 'intermediate'),
(9, '43 Marquette Plaza', '1989-01-14', 'Morbi ut odio.', '69043821394', 'local area network'),
(10, '5303 Village Green Hill', '1989-02-03', 'Suspendisse ornare consequat lectus. In est risus, auctor sed, tristique in, tempus sit amet, sem. Fusce consequat.', '28396220507', 'upward-trending'),
(11, '67399 Reindahl Place', '1989-05-23', 'Phasellus sit amet erat. Nulla tempus. Vivamus in felis eu sapien cursus vestibulum.', '83344513307', 'grid-enabled'),
(12, '45 Twin Pines Hill', '1989-07-06', 'Vivamus metus arcu, adipiscing molestie, hendrerit at, vulputate vitae, nisl. Aenean lectus. Pellentesque eget nunc.', '64890419671', 'background'),
(13, '46 Sheridan Place', '1903-04-16', 'Quisque ut erat. Curabitur gravida nisi at nibh. In hac habitasse platea dictumst.', '23005580487', 'challenge'),
(14, '73 Kedzie Terrace', '1989-11-07', 'Pellentesque at nulla. Suspendisse potenti. Cras in purus eu magna vulputate luctus.', '27052074771', 'coherent'),
(15, '85509 Ludington Drive', '1989-02-13', 'Cras pellentesque volutpat dui.', '14800371520', 'neutral'),
(16, '67 Northwestern Center', '1989-07-07', 'Aliquam erat volutpat. In congue.', '75569924500', 'Programmable'),
(17, '725 Eagle Crest Hill', '1989-09-29', 'Nulla ac enim. In tempor, turpis nec euismod scelerisque, quam turpis adipiscing lorem, vitae mattis nibh ligula nec sem. Duis aliquam convallis nunc.', '37349256497', 'encompassing'),
(18, '507 Graceland Junction', '1989-03-19', 'Suspendisse potenti.', '12403580562', 'knowledge base'),
(19, '92 Gina Park', '1989-09-29', 'Phasellus sit amet erat.', '40139478003', 'dynamic'),
(20, '8 Ridgeview Trail', '1989-12-21', 'Cras pellentesque volutpat dui.', '76657531985', 'solution');

-- --------------------------------------------------------

--
-- Структура таблицы `replies`
--

CREATE TABLE `replies` (
  `id` int(11) NOT NULL,
  `dt_add` datetime NOT NULL,
  `rate` int(11) NOT NULL,
  `description` text COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Дамп данных таблицы `replies`
--

INSERT INTO `replies` (`id`, `dt_add`, `rate`, `description`) VALUES
(1, '2019-05-09 00:00:00', 1, 'Curabitur gravida nisi at nibh. In hac habitasse platea dictumst. Aliquam augue quam, sollicitudin vitae, consectetuer eget, rutrum at, lorem.\n\nInteger tincidunt ante vel ipsum. Praesent blandit lacinia erat. Vestibulum sed magna at nunc commodo placerat.\n\nPraesent blandit. Nam nulla. Integer pede justo, lacinia eget, tincidunt eget, tempus vel, pede.'),
(2, '2018-10-27 00:00:00', 4, 'Fusce consequat. Nulla nisl. Nunc nisl.\n\nDuis bibendum, felis sed interdum venenatis, turpis enim blandit mi, in porttitor pede justo eu massa. Donec dapibus. Duis at velit eu est congue elementum.\n\nIn hac habitasse platea dictumst. Morbi vestibulum, velit id pretium iaculis, diam erat fermentum justo, nec condimentum neque sapien placerat ante. Nulla justo.'),
(3, '2018-11-02 00:00:00', 5, 'Fusce consequat. Nulla nisl. Nunc nisl.\n\nDuis bibendum, felis sed interdum venenatis, turpis enim blandit mi, in porttitor pede justo eu massa. Donec dapibus. Duis at velit eu est congue elementum.\n\nIn hac habitasse platea dictumst. Morbi vestibulum, velit id pretium iaculis, diam erat fermentum justo, nec condimentum neque sapien placerat ante. Nulla justo.'),
(4, '2019-06-04 00:00:00', 3, 'Praesent blandit. Nam nulla. Integer pede justo, lacinia eget, tincidunt eget, tempus vel, pede.\n\nMorbi porttitor lorem id ligula. Suspendisse ornare consequat lectus. In est risus, auctor sed, tristique in, tempus sit amet, sem.\n\nFusce consequat. Nulla nisl. Nunc nisl.'),
(5, '2018-10-09 00:00:00', 3, 'In hac habitasse platea dictumst. Morbi vestibulum, velit id pretium iaculis, diam erat fermentum justo, nec condimentum neque sapien placerat ante. Nulla justo.'),
(6, '2019-07-16 00:00:00', 4, 'Nullam sit amet turpis elementum ligula vehicula consequat. Morbi a ipsum. Integer a nibh.\n\nIn quis justo. Maecenas rhoncus aliquam lacus. Morbi quis tortor id nulla ultrices aliquet.\n\nMaecenas leo odio, condimentum id, luctus nec, molestie sed, justo. Pellentesque viverra pede ac diam. Cras pellentesque volutpat dui.'),
(7, '2019-01-22 00:00:00', 5, 'Cras mi pede, malesuada in, imperdiet et, commodo vulputate, justo. In blandit ultrices enim. Lorem ipsum dolor sit amet, consectetuer adipiscing elit.'),
(8, '2019-06-11 00:00:00', 4, 'Praesent id massa id nisl venenatis lacinia. Aenean sit amet justo. Morbi ut odio.\n\nCras mi pede, malesuada in, imperdiet et, commodo vulputate, justo. In blandit ultrices enim. Lorem ipsum dolor sit amet, consectetuer adipiscing elit.\n\nProin interdum mauris non ligula pellentesque ultrices. Phasellus id sapien in sapien iaculis congue. Vivamus metus arcu, adipiscing molestie, hendrerit at, vulputate vitae, nisl.'),
(9, '2019-02-16 00:00:00', 3, 'Vestibulum quam sapien, varius ut, blandit non, interdum in, ante. Vestibulum ante ipsum primis in faucibus orci luctus et ultrices posuere cubilia Curae; Duis faucibus accumsan odio. Curabitur convallis.\n\nDuis consequat dui nec nisi volutpat eleifend. Donec ut dolor. Morbi vel lectus in quam fringilla rhoncus.\n\nMauris enim leo, rhoncus sed, vestibulum sit amet, cursus id, turpis. Integer aliquet, massa id lobortis convallis, tortor risus dapibus augue, vel accumsan tellus nisi eu orci. Mauris lacinia sapien quis libero.'),
(10, '2019-07-16 00:00:00', 5, 'Aenean lectus. Pellentesque eget nunc. Donec quis orci eget orci vehicula condimentum.\n\nCurabitur in libero ut massa volutpat convallis. Morbi odio odio, elementum eu, interdum eu, tincidunt in, leo. Maecenas pulvinar lobortis est.'),
(11, '2018-11-11 00:00:00', 4, 'In hac habitasse platea dictumst. Etiam faucibus cursus urna. Ut tellus.'),
(12, '2018-11-01 00:00:00', 5, 'Duis aliquam convallis nunc. Proin at turpis a pede posuere nonummy. Integer non velit.\n\nDonec diam neque, vestibulum eget, vulputate ut, ultrices vel, augue. Vestibulum ante ipsum primis in faucibus orci luctus et ultrices posuere cubilia Curae; Donec pharetra, magna vestibulum aliquet ultrices, erat tortor sollicitudin mi, sit amet lobortis sapien sapien non mi. Integer ac neque.\n\nDuis bibendum. Morbi non quam nec dui luctus rutrum. Nulla tellus.'),
(13, '2018-10-05 00:00:00', 1, 'Cras mi pede, malesuada in, imperdiet et, commodo vulputate, justo. In blandit ultrices enim. Lorem ipsum dolor sit amet, consectetuer adipiscing elit.\n\nProin interdum mauris non ligula pellentesque ultrices. Phasellus id sapien in sapien iaculis congue. Vivamus metus arcu, adipiscing molestie, hendrerit at, vulputate vitae, nisl.'),
(14, '2019-02-28 00:00:00', 3, 'Maecenas ut massa quis augue luctus tincidunt. Nulla mollis molestie lorem. Quisque ut erat.\n\nCurabitur gravida nisi at nibh. In hac habitasse platea dictumst. Aliquam augue quam, sollicitudin vitae, consectetuer eget, rutrum at, lorem.'),
(15, '2019-07-04 00:00:00', 3, 'Aenean fermentum. Donec ut mauris eget massa tempor convallis. Nulla neque libero, convallis eget, eleifend luctus, ultricies eu, nibh.\n\nQuisque id justo sit amet sapien dignissim vestibulum. Vestibulum ante ipsum primis in faucibus orci luctus et ultrices posuere cubilia Curae; Nulla dapibus dolor vel est. Donec odio justo, sollicitudin ut, suscipit a, feugiat et, eros.\n\nVestibulum ac est lacinia nisi venenatis tristique. Fusce congue, diam id ornare imperdiet, sapien urna pretium nisl, ut volutpat sapien arcu sed augue. Aliquam erat volutpat.'),
(16, '2019-07-30 00:00:00', 3, 'Curabitur in libero ut massa volutpat convallis. Morbi odio odio, elementum eu, interdum eu, tincidunt in, leo. Maecenas pulvinar lobortis est.\n\nPhasellus sit amet erat. Nulla tempus. Vivamus in felis eu sapien cursus vestibulum.'),
(17, '2019-07-10 00:00:00', 4, 'Suspendisse potenti. In eleifend quam a odio. In hac habitasse platea dictumst.\n\nMaecenas ut massa quis augue luctus tincidunt. Nulla mollis molestie lorem. Quisque ut erat.'),
(18, '2019-09-15 00:00:00', 2, 'Duis bibendum. Morbi non quam nec dui luctus rutrum. Nulla tellus.'),
(19, '2018-10-16 00:00:00', 3, 'Duis bibendum. Morbi non quam nec dui luctus rutrum. Nulla tellus.\n\nIn sagittis dui vel nisl. Duis ac nibh. Fusce lacus purus, aliquet at, feugiat non, pretium quis, lectus.'),
(20, '2019-02-13 00:00:00', 4, 'Integer tincidunt ante vel ipsum. Praesent blandit lacinia erat. Vestibulum sed magna at nunc commodo placerat.\n\nPraesent blandit. Nam nulla. Integer pede justo, lacinia eget, tincidunt eget, tempus vel, pede.');

-- --------------------------------------------------------

--
-- Структура таблицы `tasks`
--

CREATE TABLE `tasks` (
  `id` int(11) NOT NULL,
  `dt_add` datetime NOT NULL,
  `category_id` int(11) NOT NULL,
  `description` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `expire` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `name` varchar(120) COLLATE utf8mb4_unicode_ci NOT NULL,
  `address` varchar(250) COLLATE utf8mb4_unicode_ci NOT NULL,
  `budget` decimal(8,2) NOT NULL,
  `latitude` decimal(10,7) NOT NULL,
  `longitude` decimal(10,7) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Дамп данных таблицы `tasks`
--

INSERT INTO `tasks` (`id`, `dt_add`, `category_id`, `description`, `expire`, `name`, `address`, `budget`, `latitude`, `longitude`) VALUES
(4, '2019-03-09 00:00:00', 2, 'Suspendisse potenti. In eleifend quam a odio. In hac habitasse platitudeea dictumst.', '2019-11-15', 'enable impactful technologies', '1 Eagan Crossing', '6587.00', '6.9641667', '158.2083333'),
(5, '2019-07-03 00:00:00', 3, 'Nam ultrices, libero non mattis pulvinar, nulla pede ullamcorper augue, a suscipit nulla elit ac nulla. Sed vel enim sit amet nunc viverra dapibus. Nulla suscipit ligula in lacus.\r\n\r\nCurabitur at ipsum ac tellus semper interdum. Mauris ullamcorper purus sit amet nulla. Quisque arcu libero, rutrum ac, lobortis vel, dapibus at, diam.', '2019-12-07', 'exploit revolutionary portals', '24043 Paget Alley', '2904.00', '5.6235050', '10.2544044'),
(6, '2019-06-27 00:00:00', 2, 'Nulla ut erat id mauris vulputate elementum. Nullam varius. Nulla facilisi.\r\n\r\nCras non velit nec nisi vulputate nonummy. Maecenas tincidunt lacus at velit. Vivamus vel nulla eget eros elementum pellentesque.\r\n\r\nQuisque porta volutpat erat. Quisque erat eros, viverra eget, congue eget, semper rutrum, nulla. Nunc purus.', '2019-11-23', 'matrix next-generation e-commerce', '2867 Dryden Pass', '1170.00', '63.5932190', '53.9068532'),
(7, '2019-01-01 00:00:00', 1, 'Praesent blandit. Nam nulla. Integer pede justo, lacinia eget, tincidunt eget, tempus vel, pede.\r\n\r\nMorbi porttitor lorem id ligula. Suspendisse ornare consequat lectus. In est risus, auctor sed, tristique in, tempus sit amet, sem.\r\n\r\nFusce consequat. Nulla nisl. Nunc nisl.', '2019-11-10', 'benchmark plug-and-play infomediaries', '80 Cambridge Street', '838.00', '20.5800358', '-75.2435307'),
(8, '2019-09-07 00:00:00', 3, 'Praesent blandit. Nam nulla. Integer pede justo, lacinia eget, tincidunt eget, tempus vel, pede.', '2019-12-15', 'integrate cross-platitudeform e-business', '1 Stone Corner Junction', '7484.00', '14.9326574', '-91.6941845'),
(9, '2018-11-01 00:00:00', 7, 'Quisque porta volutpat erat. Quisque erat eros, viverra eget, congue eget, semper rutrum, nulla. Nunc purus.', '2019-11-24', 'enable dot-com niches', '12 Stephen Terrace', '5725.00', '40.1631270', '116.6388680'),
(10, '2019-09-13 00:00:00', 5, 'Fusce posuere felis sed lacus. Morbi sem mauris, laoreet ut, rhoncus aliquet, pulvinar sed, nisl. Nunc rhoncus dui vel sem.', '2019-11-19', 'transform web-enabled relatitudeionships', '6213 Lake View Drive', '4414.00', '44.3794871', '20.2638941'),
(11, '2019-04-01 00:00:00', 8, 'Integer tincidunt ante vel ipsum. Praesent blandit lacinia erat. Vestibulum sed magna at nunc commodo placerat.\r\n\r\nPraesent blandit. Nam nulla. Integer pede justo, lacinia eget, tincidunt eget, tempus vel, pede.\r\n\r\nMorbi porttitor lorem id ligula. Suspendisse ornare consequat lectus. In est risus, auctor sed, tristique in, tempus sit amet, sem.', '2019-11-14', 'strategize frictionless solutions', '994 Corry Park', '3454.00', '-7.3251485', '108.3607464'),
(12, '2019-03-28 00:00:00', 4, 'Cras mi pede, malesuada in, imperdiet et, commodo vulputate, justo. In blandit ultrices enim. Lorem ipsum dolor sit amet, consectetuer adipiscing elit.', '2019-12-12', 'innovate seamless metrics', '2 Bluestem Park', '3101.00', '43.0000000', '-87.9700000'),
(13, '2019-05-01 00:00:00', 4, 'Donec diam neque, vestibulum eget, vulputate ut, ultrices vel, augue. Vestibulum ante ipsum primis in faucibus orci luctus et ultrices posuere cubilia Curae; Donec pharetra, magna vestibulum aliquet ultrices, erat tortor sollicitudin mi, sit amet lobortis sapien sapien non mi. Integer ac neque.', '2019-12-19', 'integrate wireless infomediaries', '1 Dexter Hill', '6562.00', '41.3410168', '-8.3169303');

-- --------------------------------------------------------

--
-- Структура таблицы `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `email` varchar(120) COLLATE utf8mb4_unicode_ci NOT NULL,
  `name` varchar(120) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(120) COLLATE utf8mb4_unicode_ci NOT NULL,
  `dt_add` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Дамп данных таблицы `users`
--

INSERT INTO `users` (`id`, `email`, `name`, `password`, `dt_add`) VALUES
(60, 'kbuttress0@1und1.de', 'Karrie Buttress', 'JcfoKBYAB4k', '2019-08-10 00:00:00'),
(61, 'baymer1@hp.com', 'Bob Aymer', 'ZEE54kg', '2018-12-21 00:00:00'),
(62, 'zboulding2@macromedia.com', 'Zilvia Boulding', 'VJyMV1Zat', '2019-07-25 00:00:00'),
(63, 'emollon3@bloglovin.com', 'Emalee Mollon', 'XUIeJ693h', '2018-11-13 00:00:00'),
(64, 'mmulberry4@cmu.edu', 'Maria Mulberry', 'oWspnl', '2019-07-20 00:00:00'),
(65, 'lby5@mozilla.com', 'Levey By', 'GdtcUU', '2019-02-12 00:00:00'),
(66, 'beates6@last.fm', 'Baron Eates', 'UQw6VeA', '2019-05-03 00:00:00'),
(67, 'tvink7@fotki.com', 'Trip Vink', '49znXd7haFGz', '2019-01-13 00:00:00'),
(68, 'bterbeck8@about.me', 'Boonie Terbeck', 'unCjJTF7sjs', '2019-09-15 00:00:00'),
(69, 'atraviss9@auda.org.au', 'Alonzo Traviss', 'dLuVMAg', '2018-12-19 00:00:00'),
(70, 'nwitteringa@google.com.br', 'Natassia Wittering', 'tQlUG4n', '2019-03-24 00:00:00'),
(71, 'fbrookeb@nba.com', 'Felice Brooke', 's9y9Mcfgy1g', '2019-09-27 00:00:00'),
(72, 'cviccaryc@amazon.co.uk', 'Carlen Viccary', '9qd747vh', '2018-12-06 00:00:00'),
(73, 'hgethingsd@sogou.com', 'Hendrik Gethings', 'zzN5c4', '2018-11-18 00:00:00'),
(74, 'dgirodiase@stanford.edu', 'Dunc Girodias', 'j9QW6GQI', '2018-10-14 00:00:00'),
(75, 'btanmanf@smh.com.au', 'Bibbie Tanman', '1aukKNEIneq', '2019-05-03 00:00:00'),
(76, 'bbartolettig@simplemachines.org', 'Barnabas Bartoletti', '3chTNtqhoo', '2018-12-25 00:00:00'),
(77, 'nculliph@fc2.com', 'Nixie Cullip', '2UdKIR2f', '2019-04-07 00:00:00'),
(78, 'mpimblotti@xing.com', 'Matilde Pimblott', 'nGZ8disdg', '2019-07-18 00:00:00'),
(79, 'askurrayj@un.org', 'Al Skurray', 'bL9tAf', '2018-11-25 00:00:00');

--
-- Индексы сохранённых таблиц
--

--
-- Индексы таблицы `category`
--
ALTER TABLE `category`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `cities`
--
ALTER TABLE `cities`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `opinions`
--
ALTER TABLE `opinions`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `profiles`
--
ALTER TABLE `profiles`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `replies`
--
ALTER TABLE `replies`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `tasks`
--
ALTER TABLE `tasks`
  ADD PRIMARY KEY (`id`),
  ADD KEY `category_id` (`category_id`);

--
-- Индексы таблицы `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT для сохранённых таблиц
--

--
-- AUTO_INCREMENT для таблицы `category`
--
ALTER TABLE `category`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT COMMENT 'id категории', AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT для таблицы `cities`
--
ALTER TABLE `cities`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT COMMENT 'id города';

--
-- AUTO_INCREMENT для таблицы `opinions`
--
ALTER TABLE `opinions`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT для таблицы `profiles`
--
ALTER TABLE `profiles`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=45;

--
-- AUTO_INCREMENT для таблицы `replies`
--
ALTER TABLE `replies`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT для таблицы `tasks`
--
ALTER TABLE `tasks`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT для таблицы `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=80;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

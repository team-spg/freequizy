-- phpMyAdmin SQL Dump
-- version 4.4.14
-- http://www.phpmyadmin.net
--
-- Хост: 127.0.0.1
-- Время создания: Май 13 2018 г., 11:52
-- Версия сервера: 5.6.26
-- Версия PHP: 5.6.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- База данных: `quiz_resource`
--

-- --------------------------------------------------------

--
-- Структура таблицы `anatomiya`
--

CREATE TABLE IF NOT EXISTS `anatomiya` (
  `id` int(3) unsigned NOT NULL,
  `question` varchar(500) NOT NULL,
  `a` varchar(500) NOT NULL,
  `b` varchar(500) NOT NULL,
  `c` varchar(500) NOT NULL,
  `d` varchar(500) NOT NULL,
  `answer` varchar(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Структура таблицы `astronomiya`
--

CREATE TABLE IF NOT EXISTS `astronomiya` (
  `id` int(3) unsigned NOT NULL,
  `question` varchar(500) NOT NULL,
  `a` varchar(500) NOT NULL,
  `b` varchar(500) NOT NULL,
  `c` varchar(500) NOT NULL,
  `d` varchar(500) NOT NULL,
  `answer` varchar(1) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

--
-- Дамп данных таблицы `astronomiya`
--

INSERT INTO `astronomiya` (`id`, `question`, `a`, `b`, `c`, `d`, `answer`) VALUES
(1, 'Astronomlar qizil sayyora deb atydigan sayyoraning haqiqiy nimi nima?', 'Yupiter', 'Mars', '', '', 'b');

-- --------------------------------------------------------

--
-- Структура таблицы `botanika`
--

CREATE TABLE IF NOT EXISTS `botanika` (
  `id` int(3) unsigned NOT NULL,
  `question` varchar(500) NOT NULL,
  `a` varchar(500) NOT NULL,
  `b` varchar(500) NOT NULL,
  `c` varchar(500) NOT NULL,
  `d` varchar(500) NOT NULL,
  `answer` varchar(1) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=latin1;

--
-- Дамп данных таблицы `botanika`
--

INSERT INTO `botanika` (`id`, `question`, `a`, `b`, `c`, `d`, `answer`) VALUES
(1, 'Oâ€™zbekistonda tabiiy holda oâ€™sadigan yuksak oâ€™simliklarning necha turi maâ€™lum?', '4600', '4500', '8000', '4000', 'b'),
(2, 'Botanika soâ€™zi yunoncha soâ€™zdan olinib, qanday maâ€™no anglatadi?', 'Hayvon', 'Zamburugâ€™', 'Oâ€™simlik', 'Mikroorganizm', 'c'),
(3, 'Dorivor oâ€™simliklar berilgan qatorni toping?', 'Isiriq , zubturum, shirach', 'Isiriq ,shuvoq, sallagul', 'Isiriq, chakanda, zubturum', 'Sirach, sallagul', 'c'),
(4, 'Istemol qilinadigan oâ€™simliklar berilgan qatorni toping?', 'Ravoch, doâ€™lana', 'Ravoch, sallagul', 'Xolmon shirach', 'Sebarga, burchoq', 'a'),
(5, 'Yovvoyi yem-xashak oâ€™simliklari berilgan qatorni toping?', 'Sallagul,doâ€™lana,ravoch', 'Xolmon, shirach, sallagul', 'Shuvoq, sebarga, burchoq', 'Izen,ravoch', 'c'),
(6, 'Yer yuzida gulli oâ€™simliklarning nechta oilasi mavjud?', '532', '531', '530', '533', 'd'),
(7, 'Yer yuzida gulli oâ€™simliklarning qancha turkumi mavjud?', '12000', '13000', '11000', '11500', 'b'),
(8, 'Seyshel palmasi yongâ€™oqlarining ogâ€™irligi qancha?', '22kg', '23kg', '25kg', '20kg', 'c'),
(9, 'Meksika kaktuslari tanasida qancha suv saqlaydi?', '200 l', '250 l', '300 l', '280 l', 'a'),
(10, 'Hasharotxoâ€™r oâ€™simliklar berilgan qatorni toping?', 'Nepentes, xolmon', 'Nepentes, drosera', 'Xolmon, kaktus', 'Drosera, xolmon', 'b');

-- --------------------------------------------------------

--
-- Структура таблицы `chemistry`
--

CREATE TABLE IF NOT EXISTS `chemistry` (
  `id` int(3) unsigned NOT NULL,
  `question` varchar(500) NOT NULL,
  `a` varchar(500) NOT NULL,
  `b` varchar(500) NOT NULL,
  `c` varchar(500) NOT NULL,
  `d` varchar(500) NOT NULL,
  `answer` varchar(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Структура таблицы `informatika`
--

CREATE TABLE IF NOT EXISTS `informatika` (
  `id` int(3) unsigned NOT NULL,
  `question` varchar(500) NOT NULL,
  `a` varchar(500) NOT NULL,
  `b` varchar(500) NOT NULL,
  `c` varchar(500) NOT NULL,
  `d` varchar(500) NOT NULL,
  `answer` varchar(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Структура таблицы `ingiliz_tili`
--

CREATE TABLE IF NOT EXISTS `ingiliz_tili` (
  `id` int(3) unsigned NOT NULL,
  `question` varchar(500) NOT NULL,
  `a` varchar(500) NOT NULL,
  `b` varchar(500) NOT NULL,
  `c` varchar(500) NOT NULL,
  `d` varchar(500) NOT NULL,
  `answer` varchar(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Структура таблицы `iqtisod`
--

CREATE TABLE IF NOT EXISTS `iqtisod` (
  `id` int(3) unsigned NOT NULL,
  `question` varchar(500) NOT NULL,
  `a` varchar(500) NOT NULL,
  `b` varchar(500) NOT NULL,
  `c` varchar(500) NOT NULL,
  `d` varchar(500) NOT NULL,
  `answer` varchar(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Структура таблицы `java_programming`
--

CREATE TABLE IF NOT EXISTS `java_programming` (
  `id` int(3) unsigned NOT NULL,
  `question` varchar(500) NOT NULL,
  `a` varchar(500) NOT NULL,
  `b` varchar(500) NOT NULL,
  `c` varchar(500) NOT NULL,
  `d` varchar(500) NOT NULL,
  `answer` varchar(1) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

--
-- Дамп данных таблицы `java_programming`
--

INSERT INTO `java_programming` (`id`, `question`, `a`, `b`, `c`, `d`, `answer`) VALUES
(1, 'Java was first developed in?', '1990', '1991', '1993', '1996', 'b'),
(2, 'The old name of java was?', 'J language', 'oak', 'oct', 'none of above', 'b');

-- --------------------------------------------------------

--
-- Структура таблицы `kimyo`
--

CREATE TABLE IF NOT EXISTS `kimyo` (
  `id` int(3) unsigned NOT NULL,
  `question` varchar(500) NOT NULL,
  `a` varchar(500) NOT NULL,
  `b` varchar(500) NOT NULL,
  `c` varchar(500) NOT NULL,
  `d` varchar(500) NOT NULL,
  `answer` varchar(1) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

--
-- Дамп данных таблицы `kimyo`
--

INSERT INTO `kimyo` (`id`, `question`, `a`, `b`, `c`, `d`, `answer`) VALUES
(1, 'H2O moddasining nomini toping?', 'Ko''mir', 'Oltin gugurt', 'Suv', 'Vodorot', 'c');

--
-- Индексы сохранённых таблиц
--

--
-- Индексы таблицы `anatomiya`
--
ALTER TABLE `anatomiya`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `astronomiya`
--
ALTER TABLE `astronomiya`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `botanika`
--
ALTER TABLE `botanika`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `chemistry`
--
ALTER TABLE `chemistry`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `informatika`
--
ALTER TABLE `informatika`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `ingiliz_tili`
--
ALTER TABLE `ingiliz_tili`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `iqtisod`
--
ALTER TABLE `iqtisod`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `java_programming`
--
ALTER TABLE `java_programming`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `kimyo`
--
ALTER TABLE `kimyo`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT для сохранённых таблиц
--

--
-- AUTO_INCREMENT для таблицы `anatomiya`
--
ALTER TABLE `anatomiya`
  MODIFY `id` int(3) unsigned NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT для таблицы `astronomiya`
--
ALTER TABLE `astronomiya`
  MODIFY `id` int(3) unsigned NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT для таблицы `botanika`
--
ALTER TABLE `botanika`
  MODIFY `id` int(3) unsigned NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=11;
--
-- AUTO_INCREMENT для таблицы `chemistry`
--
ALTER TABLE `chemistry`
  MODIFY `id` int(3) unsigned NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT для таблицы `informatika`
--
ALTER TABLE `informatika`
  MODIFY `id` int(3) unsigned NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT для таблицы `ingiliz_tili`
--
ALTER TABLE `ingiliz_tili`
  MODIFY `id` int(3) unsigned NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT для таблицы `iqtisod`
--
ALTER TABLE `iqtisod`
  MODIFY `id` int(3) unsigned NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT для таблицы `java_programming`
--
ALTER TABLE `java_programming`
  MODIFY `id` int(3) unsigned NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT для таблицы `kimyo`
--
ALTER TABLE `kimyo`
  MODIFY `id` int(3) unsigned NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=2;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

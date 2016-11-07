-- phpMyAdmin SQL Dump
-- version 4.5.4.1deb2ubuntu2
-- http://www.phpmyadmin.net
--
-- Хост: localhost
-- Время создания: Ноя 06 2016 г., 22:17
-- Версия сервера: 5.7.16-0ubuntu0.16.04.1
-- Версия PHP: 5.6.27-1+deb.sury.org~xenial+1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- База данных: `home4`
--

-- --------------------------------------------------------

--
-- Структура таблицы `Department`
--

CREATE TABLE `Department` (
  `department_id` int(11) NOT NULL,
  `department_name` varchar(30) DEFAULT NULL,
  `university_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `Department`
--

INSERT INTO `Department` (`department_id`, `department_name`, `university_id`) VALUES
(1, 'PHP', 1),
(2, 'Java', 1),
(3, 'Python', 1);

-- --------------------------------------------------------

--
-- Структура таблицы `Discipline`
--

CREATE TABLE `Discipline` (
  `discipline_id` int(11) NOT NULL,
  `discipline_name` varchar(15) DEFAULT NULL,
  `department_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `Discipline`
--

INSERT INTO `Discipline` (`discipline_id`, `discipline_name`, `department_id`) VALUES
(1, 'PHP', 1),
(2, 'Java For Web', 2),
(3, 'Basic Python', 3);

-- --------------------------------------------------------

--
-- Структура таблицы `Homework`
--

CREATE TABLE `Homework` (
  `homework_id` int(11) NOT NULL,
  `homework_name` varchar(50) DEFAULT NULL,
  `homework_done` tinyint(1) DEFAULT NULL,
  `discipline_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `Homework`
--

INSERT INTO `Homework` (`homework_id`, `homework_name`, `homework_done`, `discipline_id`) VALUES
(1, 'Базовые настройки', 1, 2),
(2, 'Git, Composer', 1, 1),
(3, 'Mysql, Базы данных', 0, 1);

-- --------------------------------------------------------

--
-- Структура таблицы `Student`
--

CREATE TABLE `Student` (
  `student_id` int(11) NOT NULL,
  `student_name` varchar(15) DEFAULT NULL,
  `student_sirname` varchar(20) DEFAULT NULL,
  `student_email` varchar(60) DEFAULT NULL,
  `student_telnumber` varchar(20) DEFAULT NULL,
  `department_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `Student`
--

INSERT INTO `Student` (`student_id`, `student_name`, `student_sirname`, `student_email`, `student_telnumber`, `department_id`) VALUES
(1, 'Максим', 'Столяров', 'Windmill_78@mail.ru', '80936574893', 1),
(2, 'Петров', 'Александр', 'PertovA75@mail.ru', '80938763245', 1),
(3, 'Зинченко', 'Роман', 'ErezarBboy@mail.ru', '80932614775', 2),
(4, 'Лепехин', 'Роман', 'LepeshkaRoma@mail.ru', '80675906825', 3);

-- --------------------------------------------------------

--
-- Структура таблицы `Student_Homework`
--

CREATE TABLE `Student_Homework` (
  `student_id` int(11) NOT NULL,
  `homework_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `Student_Homework`
--

INSERT INTO `Student_Homework` (`student_id`, `homework_id`) VALUES
(1, 1),
(2, 1),
(3, 1),
(1, 2),
(2, 2),
(4, 2),
(2, 3),
(4, 3);

-- --------------------------------------------------------

--
-- Структура таблицы `Teacher`
--

CREATE TABLE `Teacher` (
  `teacher_id` int(11) NOT NULL,
  `teacher_sirname` varchar(20) DEFAULT NULL,
  `teacher_name` varchar(15) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `Teacher`
--

INSERT INTO `Teacher` (`teacher_id`, `teacher_sirname`, `teacher_name`) VALUES
(1, 'Рубака', 'Алексей'),
(2, 'Мошта', 'Алексей'),
(3, 'Чабаненко', 'Дмитрий'),
(4, 'Нагорный', 'Юрий'),
(5, 'Весенний', 'Аркадий');

-- --------------------------------------------------------

--
-- Структура таблицы `Teacher_Discipline`
--

CREATE TABLE `Teacher_Discipline` (
  `teacher_id` int(11) NOT NULL,
  `discipline_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `Teacher_Discipline`
--

INSERT INTO `Teacher_Discipline` (`teacher_id`, `discipline_id`) VALUES
(2, 1),
(3, 1),
(5, 1),
(1, 2),
(4, 2),
(1, 3),
(4, 3);

-- --------------------------------------------------------

--
-- Структура таблицы `University`
--

CREATE TABLE `University` (
  `university_id` int(11) NOT NULL,
  `university_name` varchar(30) DEFAULT NULL,
  `university_city` varchar(30) DEFAULT NULL,
  `university_site` varchar(30) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `University`
--

INSERT INTO `University` (`university_id`, `university_name`, `university_city`, `university_site`) VALUES
(1, 'GeekHub', 'Cherkassy', 'Geekhub.ua'),
(2, 'CHDTU', 'Cherkassy', 'cdtdu.edu'),
(3, 'KPI', 'Kyiv', 'kpi.ua'),
(4, 'MGU', 'Moscow', 'mgu.ru'),
(5, 'CHNU', 'Cherkassy', 'chnu.edu');

--
-- Индексы сохранённых таблиц
--

--
-- Индексы таблицы `Department`
--
ALTER TABLE `Department`
  ADD PRIMARY KEY (`department_id`),
  ADD KEY `university_id` (`university_id`);

--
-- Индексы таблицы `Discipline`
--
ALTER TABLE `Discipline`
  ADD PRIMARY KEY (`discipline_id`);

--
-- Индексы таблицы `Homework`
--
ALTER TABLE `Homework`
  ADD PRIMARY KEY (`homework_id`),
  ADD KEY `discipline_id` (`discipline_id`);

--
-- Индексы таблицы `Student`
--
ALTER TABLE `Student`
  ADD PRIMARY KEY (`student_id`),
  ADD KEY `department_id` (`department_id`);

--
-- Индексы таблицы `Student_Homework`
--
ALTER TABLE `Student_Homework`
  ADD PRIMARY KEY (`student_id`,`homework_id`),
  ADD KEY `homework_id` (`homework_id`);

--
-- Индексы таблицы `Teacher`
--
ALTER TABLE `Teacher`
  ADD PRIMARY KEY (`teacher_id`);

--
-- Индексы таблицы `Teacher_Discipline`
--
ALTER TABLE `Teacher_Discipline`
  ADD PRIMARY KEY (`teacher_id`,`discipline_id`),
  ADD KEY `discipline_id` (`discipline_id`);

--
-- Индексы таблицы `University`
--
ALTER TABLE `University`
  ADD PRIMARY KEY (`university_id`);

--
-- AUTO_INCREMENT для сохранённых таблиц
--

--
-- AUTO_INCREMENT для таблицы `Department`
--
ALTER TABLE `Department`
  MODIFY `department_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT для таблицы `Discipline`
--
ALTER TABLE `Discipline`
  MODIFY `discipline_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT для таблицы `Homework`
--
ALTER TABLE `Homework`
  MODIFY `homework_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT для таблицы `Student`
--
ALTER TABLE `Student`
  MODIFY `student_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT для таблицы `Teacher`
--
ALTER TABLE `Teacher`
  MODIFY `teacher_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT для таблицы `University`
--
ALTER TABLE `University`
  MODIFY `university_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- Ограничения внешнего ключа сохраненных таблиц
--

--
-- Ограничения внешнего ключа таблицы `Department`
--
ALTER TABLE `Department`
  ADD CONSTRAINT `Department_ibfk_1` FOREIGN KEY (`university_id`) REFERENCES `University` (`university_id`);

--
-- Ограничения внешнего ключа таблицы `Homework`
--
ALTER TABLE `Homework`
  ADD CONSTRAINT `Homework_ibfk_1` FOREIGN KEY (`discipline_id`) REFERENCES `Discipline` (`discipline_id`);

--
-- Ограничения внешнего ключа таблицы `Student`
--
ALTER TABLE `Student`
  ADD CONSTRAINT `Student_ibfk_1` FOREIGN KEY (`department_id`) REFERENCES `Department` (`department_id`);

--
-- Ограничения внешнего ключа таблицы `Student_Homework`
--
ALTER TABLE `Student_Homework`
  ADD CONSTRAINT `Student_Homework_ibfk_1` FOREIGN KEY (`student_id`) REFERENCES `Student` (`student_id`),
  ADD CONSTRAINT `Student_Homework_ibfk_2` FOREIGN KEY (`homework_id`) REFERENCES `Homework` (`homework_id`);

--
-- Ограничения внешнего ключа таблицы `Teacher_Discipline`
--
ALTER TABLE `Teacher_Discipline`
  ADD CONSTRAINT `Teacher_Discipline_ibfk_1` FOREIGN KEY (`teacher_id`) REFERENCES `Teacher` (`teacher_id`),
  ADD CONSTRAINT `Teacher_Discipline_ibfk_2` FOREIGN KEY (`discipline_id`) REFERENCES `Discipline` (`discipline_id`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

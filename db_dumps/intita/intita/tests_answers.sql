-- --------------------------------------------------------
-- Host:                         127.0.0.1
-- Server version:               5.6.21 - MySQL Community Server (GPL)
-- Server OS:                    Win32
-- HeidiSQL version:             7.0.0.4053
-- Date/time:                    2015-08-14 16:50:40
-- --------------------------------------------------------

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET NAMES utf8 */;
/*!40014 SET FOREIGN_KEY_CHECKS=0 */;

-- Dumping structure for table intita.tests_answers
DROP TABLE IF EXISTS `tests_answers`;
CREATE TABLE IF NOT EXISTS `tests_answers` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `id_test` int(10) NOT NULL,
  `answer` varchar(255) NOT NULL,
  `is_valid` tinyint(4) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `FK_tests_answers_tests` (`id_test`)
) ENGINE=InnoDB AUTO_INCREMENT=698 DEFAULT CHARSET=utf8;

-- Dumping data for table intita.tests_answers: ~676 rows (approximately)
/*!40000 ALTER TABLE `tests_answers` DISABLE KEYS */;
INSERT INTO `tests_answers` (`id`, `id_test`, `answer`, `is_valid`) VALUES
	(22, 35, 'gtsrth', 0),
	(23, 35, 'grtstgsr', 1),
	(24, 35, 'gtsrtg', 0),
	(25, 36, '58i4', 1),
	(26, 36, 'i68i4', 1),
	(27, 36, 'u686', 0),
	(28, 37, '3', 0),
	(29, 37, '4', 1),
	(30, 37, '5', 0),
	(31, 37, '6', 0),
	(32, 38, '3', 0),
	(33, 38, '4', 1),
	(34, 38, '5', 0),
	(35, 38, '6', 0),
	(36, 39, '1', 1),
	(37, 39, '2', 0),
	(38, 39, '3', 0),
	(39, 39, '4', 1),
	(40, 40, '1', 1),
	(41, 40, '2', 0),
	(42, 40, '3', 0),
	(43, 40, '4', 0),
	(44, 40, '5', 0),
	(45, 40, '6', 0),
	(46, 40, '7', 0),
	(47, 40, '8', 0),
	(48, 40, '9', 0),
	(49, 40, '10', 0),
	(50, 41, 'указание на выполнение действий', 1),
	(51, 41, 'система правил, описывающая последовательность действий, которые необходимо выполнить для решения задачи', 0),
	(52, 41, 'процесс выполнения вычислений, приводящих к решению задачи.', 0),
	(53, 42, 'информативность', 0),
	(54, 42, 'дискретность', 1),
	(55, 42, 'массовость', 1),
	(56, 42, 'оперативность', 0),
	(57, 42, 'определенность', 0),
	(58, 42, 'цикличность', 0),
	(59, 42, 'результативность.', 1),
	(60, 43, '', 1),
	(61, 44, '', 1),
	(62, 44, '', 0),
	(63, 44, '', 0),
	(64, 44, '', 0),
	(65, 45, '', 0),
	(66, 45, '', 1),
	(67, 45, '', 0),
	(68, 45, '', 0),
	(69, 46, 'система правил, описывающая последовательность действий, которые необходимо выполнить для решения задачи', 0),
	(70, 46, 'указание на выполнение действий из заданного набора', 0),
	(71, 46, 'область внешней памяти для хранения текстовых, числовых данных и другой информации', 0),
	(72, 46, 'последовательность команд, реализующая алгоритм решения задачи.', 1),
	(73, 47, '1', 1),
	(74, 47, '1', 1),
	(75, 47, '1', 1),
	(76, 48, 'Отримати освіту', 1),
	(77, 48, 'Знати і розуміти основи математики.', 1),
	(78, 48, 'Натхнення.', 1),
	(79, 48, 'Працювати та отримувати фаховий досвід.', 1),
	(80, 48, 'Постійно вдосконалюватись.', 1),
	(81, 49, 'Української', 0),
	(82, 49, 'Англійської', 1),
	(83, 49, 'Мови машиних кодів', 0),
	(84, 49, 'Мови програмування', 1),
	(85, 50, 'стійкою', 1),
	(86, 50, 'безкоштовною', 0),
	(87, 50, 'ефективною', 1),
	(88, 50, 'гарною', 0),
	(89, 50, 'веселою', 0),
	(90, 50, 'зручною', 1),
	(91, 51, 'Постановка задачі, створення моделі програми.', 0),
	(92, 51, 'Планування та вибір методу рішення задачі.', 0),
	(93, 51, 'Розробка алгоритму.', 0),
	(94, 51, 'Кодування.', 1),
	(95, 51, 'Тестування.', 0),
	(96, 51, 'Аналіз результатів роботи програми, складання технічної документації.', 0),
	(97, 51, 'Подальше супроводження.', 0),
	(98, 52, 'система правил, описывающая последовательность действий, которые необходимо выполнить для решения задачи', 1),
	(99, 52, 'система правил, описывающая последовательность действий, которые необходимо выполнить для решения задачи', 0),
	(100, 52, 'система правил, описывающая последовательность действий, которые необходимо выполнить для решения задачи', 0),
	(101, 53, 'пооператорное выполнение программы', 1),
	(102, 53, 'пооператорное выполнение программы', 0),
	(103, 53, 'пооператорное выполнение программы', 0),
	(104, 54, 'пооператорное выполнение программы', 1),
	(105, 54, 'поиск файлов на диске', 0),
	(106, 54, 'полное выполнение программы.', 0),
	(107, 55, ' переводит исходный текст в машинный код', 0),
	(108, 55, 'формирует текстовый файл', 0),
	(109, 55, 'записывает машинный код в форме загрузочного файла', 1),
	(110, 56, 'алгоритмический язык, использующий команды MS-DOS', 1),
	(111, 56, 'алгоритмический язык программирования, работающий в режиме интерпретации', 0),
	(112, 56, 'алгоритмический язык, работающий только в среде Windows.', 1),
	(113, 57, 'fdfsds', 1),
	(114, 57, 'gfghgfhfg', 0),
	(115, 58, 'fghfghgf', 0),
	(116, 58, 'fghgfhf', 1),
	(117, 58, 'hgfhfghfgh', 0),
	(118, 59, 'буквы латинского алфавита', 1),
	(119, 59, 'буквы русского алфавита', 0),
	(120, 59, 'буквы греческого алфавита', 0),
	(121, 59, 'цифры', 1),
	(122, 59, 'знаки арифметических операций: +, -, /, "', 1),
	(123, 59, 'знаки операций отношений: >, <, =, >=, <=, <>', 1),
	(124, 59, 'специальные знаки:!,?, #, %,&, $,«,«,,.,,', 1),
	(125, 59, 'специальные знаки:!,?, #, %,&, $,«,«,,.,,', 0),
	(126, 59, 'круглые скобки () и) квадратные скобки.', 1),
	(127, 59, '', 0),
	(128, 60, 'etert', 0),
	(129, 60, 'ertert', 0),
	(130, 60, 'ertert', 0),
	(131, 60, 'etert', 1),
	(132, 60, 'etert', 0),
	(133, 60, 'etertet', 0),
	(134, 60, 'etert', 0),
	(135, 60, 'etert', 0),
	(136, 60, 'etrt', 0),
	(137, 60, 'erterter', 0),
	(138, 60, 'eterterte', 0),
	(139, 61, 'числовые;', 1),
	(140, 61, 'текстовые:', 1),
	(141, 61, 'указатели', 0),
	(142, 61, 'типы данных', 0),
	(143, 61, 'записи', 0),
	(144, 62, '+В, -14, 21.5Е2, 0.05', 1),
	(145, 62, ' 3.4*Е8, 45.Е2, -16', 0),
	(146, 62, ' 18.2, .05Е1, -18', 1),
	(147, 62, '0.05Е5, ±16, -21,5', 0),
	(148, 62, '21-Ю2, -18, 45.2', 0),
	(149, 63, 'відповідь 1', 0),
	(150, 63, 'відповідь 2', 1),
	(151, 63, 'відповідь 3', 0),
	(152, 64, 'зберігання інформації', 0),
	(153, 64, 'розповсюдження інформації', 0),
	(154, 64, 'обчислення інформації', 1),
	(155, 64, 'демонстрація інформації', 0),
	(156, 65, 'додавання', 1),
	(157, 65, 'віднімання', 1),
	(158, 65, 'множення', 0),
	(159, 65, 'ділення', 0),
	(160, 66, 'Висока температура.', 1),
	(161, 66, 'Занадто яскраве світло.', 0),
	(162, 66, 'Швидкий вихід зі строю ламп.', 1),
	(163, 66, 'Радиаційне випромінювання.', 0),
	(164, 67, 'Використання відновлювальних джерел енергії', 0),
	(165, 67, 'Винайдення транзистора.', 1),
	(166, 67, 'Зміна конструкції електроної лампи.', 0),
	(167, 67, 'Винайдення магнітної стрічки.', 0),
	(168, 68, 'Вони менші за транзистори.', 1),
	(169, 68, 'Їх виробництво дешевше.', 1),
	(170, 68, 'Вони не гріються.', 0),
	(171, 68, 'Вони працюють безшумно.', 0),
	(172, 68, 'У них значно більша за транзистори швидкодія.', 1),
	(173, 69, 'Електроні лампи - інтегральні мікросхеми - транзистори - мікропроцесори.', 0),
	(174, 69, 'Транзистори - електроні лампи - мікпропроцесори - інтегральні мікросхеми.', 0),
	(175, 69, 'Електроні лампи - мікропроцесори - транзистори - інтегральні мікросхеми.', 0),
	(176, 69, 'Електроні лампи - транзистори - інтегральні мікросхеми - мікропроцесори.', 1),
	(177, 70, 'Материнська плата.', 1),
	(178, 70, 'Прінтер.', 0),
	(179, 70, 'Процесор', 1),
	(180, 70, 'Монітор', 0),
	(181, 70, 'Оперативна пам’ять', 1),
	(182, 70, 'Жорсткий диск.', 1),
	(183, 70, 'Дисковод.', 0),
	(184, 70, '', 0),
	(185, 71, 'Материнська плата.', 1),
	(186, 71, 'Прінтер.', 0),
	(187, 71, 'Процесор', 1),
	(188, 71, 'Монітор', 0),
	(189, 71, 'Оперативна пам’ять', 1),
	(190, 71, 'Жорсткий диск.', 1),
	(191, 71, 'Дисковод.', 0),
	(192, 72, '', 0),
	(193, 73, '1', 1),
	(194, 74, 'u467uj467', 0),
	(195, 74, 'jru7ui78', 1),
	(196, 74, 'ur674', 0),
	(197, 75, 'answer 1', 0),
	(198, 75, 'answer 2', 1),
	(199, 75, 'answer 3', 1),
	(200, 76, 'ferfref', 1),
	(201, 76, 'rfrefref', 0),
	(202, 77, '1', 1),
	(203, 77, '1', 1),
	(204, 77, '1', 1),
	(205, 80, 'лаоправпрвапралпав', 1),
	(206, 80, 'оапрлаврпларпла', 0),
	(207, 81, 'тест', 1),
	(208, 81, '', 0),
	(209, 82, 'служебное слово на языке QBASIC', 0),
	(210, 82, 'область памяти, в которой хранится некоторое значение', 1),
	(211, 82, ' значение регистра.', 0),
	(212, 83, ' любая последовательность любых символов', 0),
	(213, 83, 'последовательность латинских букв, цифр, специальных знаков (кроме пробел', 1),
	(214, 83, 'которая всегда должна начинаться с латинской буквы', 0),
	(215, 83, 'последовательность русских, латинских букв, начинающихся с латинской буквы и из специальных знаков, допускающая знак подчеркивания.', 0),
	(216, 84, '1212', 1),
	(217, 84, '1212', 0),
	(218, 84, '21212', 0),
	(219, 84, '121212', 0),
	(220, 85, ')', 1),
	(221, 85, '(', 0),
	(222, 86, 'dfsf', 1),
	(223, 87, '1', 0),
	(224, 87, '2', 0),
	(225, 87, '3', 0),
	(226, 87, '5', 0),
	(227, 87, '4', 1),
	(228, 88, 'алгоритмический язык, использующий команды MS-DOS', 1),
	(229, 88, 'алгоритмический язык программирования, работающий в режиме интерпретации', 0),
	(230, 88, 'алгоритмический язык, работающий только в среде Windows.', 1),
	(231, 89, 'QBASIC — это', 1),
	(232, 89, 'QBASIC — это', 1),
	(233, 90, 'QBASIC — это', 0),
	(234, 90, 'QBASIC — это', 0),
	(235, 90, 'QBASIC — это', 1),
	(236, 91, '1', 1),
	(237, 92, 'выфявыфяы', 0),
	(238, 92, 'выфв', 0),
	(239, 93, 'роа', 1),
	(240, 94, 'прикладное программное обеспечение, используемое для создания текстовых документов и работы с ними', 1),
	(241, 94, 'прикладное программное обеспечение, используемое для создания таблиц и работы с ними', 0),
	(242, 94, 'прикладное программное обеспечение, используемое для автоматизации задач бухгалтерского учета.', 0),
	(243, 95, 'именами столбцов', 0),
	(244, 95, 'областью пересечения строк и столбцов', 0),
	(245, 95, 'номерами строк.', 0),
	(246, 98, '"', 1),
	(247, 98, '№', 0),
	(248, 98, ';', 1),
	(249, 98, '%', 0),
	(250, 99, '???????????????????????', 0),
	(251, 99, '%%%%%%%%%%%%', 1),
	(252, 99, '@@@@@@@@@@@', 0),
	(253, 99, '################', 0),
	(254, 100, '!!!!!!!!!!!!!!!!!!!!!', 0),
	(255, 100, '??????????????', 0),
	(256, 100, '!?!?!?', 1),
	(257, 101, '          ', 0),
	(258, 102, '1', 1),
	(259, 103, 'тьтьтиьт', 0),
	(260, 103, 'тьтиьттьть', 1),
	(261, 103, 'ьитьстьтиьт', 0),
	(262, 103, 'ьитьтьтьт', 0),
	(263, 104, 'ваава', 0),
	(264, 105, '100', 0),
	(265, 105, '200', 0),
	(266, 105, '300', 0),
	(267, 105, '400', 0),
	(268, 105, '500', 1),
	(269, 106, '1000', 0),
	(270, 106, '2000', 0),
	(271, 106, '3000', 0),
	(272, 106, '4000', 0),
	(273, 106, '5000', 1),
	(274, 107, '1000', 0),
	(275, 107, '2000', 0),
	(276, 107, '3000', 0),
	(277, 107, '4000', 0),
	(278, 107, '5000', 1),
	(279, 108, 'Відповідь 1', 1),
	(280, 108, 'відповідь 2', 0),
	(281, 108, 'Відповідь', 0),
	(282, 109, 'fgdfg', 0),
	(283, 109, 'fgdfg', 1),
	(284, 109, 'fgfdgdf', 0),
	(285, 110, 'rdgdh', 0),
	(286, 110, 'ghghg', 0),
	(287, 110, 'cghghf', 0),
	(288, 110, 'xghgfh', 0),
	(289, 110, 'xghxgfh', 0),
	(290, 110, 'ghghfh', 1),
	(291, 110, 'gfhghgfhgf', 0),
	(292, 110, 'ghxfghfgh', 1),
	(293, 111, 'cnjvhn', 0),
	(294, 111, 'cnhh', 1),
	(295, 111, 'xhjghj', 0),
	(296, 111, 'xfjhj', 0),
	(297, 111, 'fgjhjhg', 0),
	(298, 115, 'cbcvbcvbc', 1),
	(299, 115, 'cbcvbcvbc', 0),
	(300, 116, 'dfkvmfd', 1),
	(301, 116, 'dfkvmfd', 0),
	(302, 116, 'dfkvmfd', 0),
	(303, 117, '1000', 0),
	(304, 117, '1000', 0),
	(305, 117, '1000', 0),
	(306, 117, '1000', 0),
	(307, 117, '1000', 1),
	(308, 118, '"6. Название теста - Белая береза Под моим окном Принакрылась снегом, Точно серебром.  На пушистых ветках Снежною каймой Распустились кисти Белой бахромой."', 0),
	(309, 118, '"6. Название теста - Белая береза Под моим окном Принакрылась снегом, Точно серебром.  На пушистых ветках Снежною каймой Распустились кисти Белой бахромой."', 1),
	(310, 118, '"6. Название теста - Белая береза Под моим окном Принакрылась снегом, Точно серебром.  На пушистых ветках Снежною каймой Распустились кисти Белой бахромой."', 0),
	(311, 118, '"6. Название теста - Белая береза Под моим окном Принакрылась снегом, Точно серебром.  На пушистых ветках Снежною каймой Распустились кисти Белой бахромой."', 1),
	(312, 119, '3', 0),
	(313, 119, '3', 0),
	(314, 119, '3', 1),
	(315, 120, 'апрапап', 0),
	(316, 120, 'апрапап', 1),
	(317, 120, 'апрапап', 1),
	(318, 120, 'апрапап', 0),
	(319, 121, '2121', 0),
	(320, 121, '2121', 1),
	(321, 122, '3', 0),
	(322, 122, '6', 0),
	(323, 122, '10', 0),
	(324, 122, '4', 1),
	(325, 122, '4', 1),
	(326, 123, '5', 1),
	(327, 123, '1', 0),
	(328, 123, '7', 1),
	(329, 123, '2', 0),
	(330, 124, 'hmhnmnm', 1),
	(331, 125, 'процесор', 0),
	(332, 125, 'принтер', 0),
	(333, 125, 'клавіатура', 1),
	(334, 125, 'монітор', 0),
	(335, 126, 'Алфавітно-цифрові клавіші.', 1),
	(336, 126, 'Керуючі клавіші.', 1),
	(337, 126, 'Функціональні клавіші.', 1),
	(338, 126, 'Клавіші керування курсором.', 1),
	(339, 126, 'Цифрова клавіатура.', 1),
	(340, 126, 'Знакові клавіші.', 0),
	(341, 127, 'Оптичні', 1),
	(342, 127, 'Оптико-механічні', 0),
	(343, 127, 'Оптико-механічні', 0),
	(344, 128, 'Кулькова ручка.', 1),
	(345, 128, 'Олівець', 1),
	(346, 128, 'Зошит', 0),
	(347, 128, 'Лінійка', 0),
	(348, 129, 'веб-камери', 0),
	(349, 129, 'відеокарти', 1),
	(350, 129, 'аудіокарти', 0),
	(351, 129, 'дисковода', 0),
	(352, 130, 'принтер', 1),
	(353, 130, 'материнська плата', 0),
	(354, 130, 'системний блок', 0),
	(355, 130, 'монітор', 0),
	(356, 131, 'обробки команд виконуваної програми;', 0),
	(357, 131, 'читання / запису даних з зовнішнього носія;', 1),
	(358, 131, 'зберігання команд виконуваної програми;', 0),
	(359, 131, 'довготривалого зберігання інформації;', 0),
	(360, 131, 'виведення інформації на папір.', 0),
	(361, 132, '1000', 0),
	(362, 132, '2000', 0),
	(363, 132, '3000', 0),
	(364, 132, '4000', 0),
	(365, 132, '5000', 1),
	(366, 133, 'Як послідовність зображень.', 0),
	(367, 133, 'Як послідовність зображень та звуків.', 0),
	(368, 133, 'Як послідовність 0 та 1.', 1),
	(369, 134, '1000', 0),
	(370, 134, '1024', 0),
	(371, 134, '1048,58', 1),
	(372, 134, '1038,55', 0),
	(373, 135, 'Кеш-пам’ять.', 0),
	(374, 135, 'Оперативна пам’ять.', 0),
	(375, 135, 'Постійна пам’ять.', 1),
	(376, 136, 'Оперативна пам’ять.', 0),
	(377, 136, 'Рухова пам’ять.', 1),
	(378, 136, 'Флеш-пам’ять.', 0),
	(379, 136, 'Словесно-логічна пам’ять.', 1),
	(380, 136, 'Кеш-пам’ять', 0),
	(381, 137, 'Ієрархічні', 1),
	(382, 137, 'Субординовані', 0),
	(383, 137, 'Кластерні.', 1),
	(384, 137, 'Систематизовані', 0),
	(385, 137, 'Розподілені', 1),
	(386, 138, 'Контролює дії користувача.', 0),
	(387, 138, 'Керує апаратними складовими комп’ютера.', 1),
	(388, 138, 'Забезпечує взаємодію комп’ютера та користувача.', 1),
	(389, 139, 'Системне', 0),
	(390, 139, 'Прикладне', 1),
	(391, 139, 'Інструментальне', 0),
	(392, 140, 'Програмне забезпечення, яке шкодить здоров’ю людини.', 0),
	(393, 140, 'Програмне забезпечення, яке забирає вільний час.', 0),
	(394, 140, 'Програмне забезпечення, яке перешкоджає нормальній роботі комп’ютера.', 1),
	(395, 141, 'Вірус', 0),
	(396, 141, 'Бактерія', 1),
	(397, 141, 'Драйвер', 1),
	(398, 141, 'Троянські програми.', 0),
	(399, 141, 'Хробаки.', 0),
	(400, 141, 'Змії.', 1),
	(401, 142, 'У ЕОМ використовується десяткова система числення.', 1),
	(402, 142, 'ЕОМ контролюється попередньо розробленим алгоритмом, який викладений зрозумілим для машини чином.', 0),
	(403, 142, 'У пам’яті ЕОМ зберігаються лише дані, а команди, які необхідно виконувати вводяться у ЕОМ програмістом, безпосередньо перед їх виконанням.', 1),
	(404, 142, 'Щоб знайти необхідну комірку пам’яті необхідно перебрати всі, поки не буде знайдена потрібна.', 1),
	(405, 142, 'Існує можливість розробити програму таким чином, щоб при певних умовах виконувались різні ділянки коду.', 0),
	(406, 143, 'Команди обов’язково записуються у сусідні комірки пам’яті.', 1),
	(407, 143, 'Дані обов’язково записуються у сусідні комірки пам’яті.', 0),
	(408, 143, 'Остання команда має бути командою завершення роботи.', 1),
	(409, 143, 'Для виконання операції достатньо знати тип операції.', 0),
	(410, 143, 'Дані у пам’яті зберігаються у зручному для людини вигляді.', 0),
	(411, 143, 'Керуючий пристрій містить регістр, яку називають “лічильник команд”.', 0),
	(412, 143, 'Всі команди виконуються послідовно, перехід на команду, яка не є наступною неможливий.', 0),
	(413, 144, 'Висока вартість виробництва комп’ютерів на архітектурі фон Неймана.', 0),
	(414, 144, 'Обмеженність швидкості виконання операцій максимально можливою швидкістю передачі інформації від пам’яті до арифметико-логічного пристрою', 1),
	(415, 144, 'Виконання програм відбувається тільки поступово.', 1),
	(416, 144, 'Для написання складної програми потрібно написати велику кількість команд, адже перелік зрозумілих для машини команд дуже обмежений.', 1),
	(417, 145, 'Можливість виконання декількох операцій одночасно.', 0),
	(418, 145, 'Команди та дані для їх виконання поступають до арифметико-логічного пристрою різними шляхами.', 1),
	(419, 145, 'Відсутній пристрій вводу-ведення.', 0),
	(420, 146, 'Модифікована гарвардська архітектура', 0),
	(421, 146, 'Розширена гарвардьска архітекутра', 0),
	(422, 146, 'Гібридна гарвардська архітектура', 1),
	(423, 147, 'Кремній', 1),
	(424, 147, 'Плутоній', 0),
	(425, 147, 'Пластмаса', 0),
	(426, 147, 'Дерево', 0),
	(427, 148, 'так', 1),
	(428, 148, 'ні', 0),
	(429, 148, 'важко відповісти', 0),
	(430, 149, '16 000 000 біт', 0),
	(431, 149, '100 000 000 біт', 0),
	(432, 149, '1 600 000 000 біт', 1),
	(433, 149, '2 000 000 біт', 0),
	(434, 150, 'Вікна та папки на комп’ютері.', 0),
	(435, 150, 'Робочий стіл.', 0),
	(436, 150, 'Спеціальна програма (комплекс програм), яка забезпечує взаємодію між користувачем та комп’ютером.', 1),
	(437, 151, 'Керує апаратним забезпеченням комп’ютера.', 1),
	(438, 151, 'Навчає комп’ютер виконувати певні операції.', 0),
	(439, 151, 'Дозволяє обробляти текст.', 0),
	(440, 151, 'Примушує комп’ютер виконувати дії, які задає користувач.', 1),
	(441, 151, 'Дозволяє встановлювати та запускати на комп’ютері різні програми, які необхідні для користувача.', 1),
	(442, 152, 'UNIX', 0),
	(443, 152, 'OS/2', 0),
	(444, 152, 'Atlas', 0),
	(445, 152, 'Windows 3.1', 0),
	(446, 152, 'Windows 95', 0),
	(447, 152, 'DOS', 1),
	(448, 152, 'MacOS', 0),
	(449, 152, 'Linux', 0),
	(450, 153, 'Вони безкоштовні.', 1),
	(451, 153, 'Вони дуже поширені та виробники обладнання підтрумують драйвера у актуальному стані.', 0),
	(452, 153, 'Вони оптимізовані для роботи на конкретній архітектурі процесора.', 0),
	(453, 153, 'Вони мають вбудовані засоби захисту.', 1),
	(454, 154, 'Ядро', 0),
	(455, 154, 'Програми для роботи з текстом.', 1),
	(456, 154, 'Драйвери', 0),
	(457, 154, 'Набір системних утиліт.', 0),
	(458, 154, 'Інтерфейс взаємодії з користувачем.', 0),
	(459, 154, 'Програми для роботи в мережі інтернет.', 1),
	(460, 155, '-1', 1),
	(461, 155, '-2', 0),
	(462, 155, '-3', 0),
	(463, 155, '-4', 0),
	(464, 155, '-5', 0),
	(465, 155, '-6', 1),
	(466, 156, 'информативность', 0),
	(467, 156, 'дискретность', 1),
	(468, 156, 'массовость', 1),
	(469, 156, 'оперативность', 0),
	(470, 156, 'определенность', 1),
	(471, 156, 'цикличность', 0),
	(472, 156, 'результативность.', 1),
	(473, 156, 'вапияпвярвп', 0),
	(474, 157, 'словесным', 1),
	(475, 157, ' словесно-графическим', 0),
	(476, 157, 'графическим', 0),
	(477, 157, 'формально-словесным', 1),
	(478, 157, 'на алгоритмическом языке', 1),
	(479, 157, 'последовательностью байтов.', 0),
	(480, 158, '1000', 0),
	(481, 158, '2000', 0),
	(482, 158, '30000', 0),
	(483, 158, '5456456', 0),
	(484, 158, '5654654', 0),
	(485, 158, '4565465', 0),
	(486, 158, '4564565', 0),
	(487, 158, '5645654654', 0),
	(488, 158, '356565465', 0),
	(489, 158, '56456456456', 1),
	(490, 159, 'система правил, описывающая последовательность действий, которые необходимо выполнить для решения задачи', 0),
	(491, 159, 'указание на выполнение действий из заданного набора', 0),
	(492, 159, 'область внешней памяти для хранения текстовых, числовых данных и другой информации', 0),
	(493, 159, 'последовательность команд, реализующая алгоритм решения задачи.', 1),
	(494, 160, 'переводит исходный текст в машинный код', 0),
	(495, 160, 'формирует текстовый файл', 0),
	(496, 160, 'записывает машинный код в форме загрузочного файла.', 1),
	(497, 161, 'алгоритмический язык, использующий команды MS-DOS', 0),
	(498, 161, 'алгоритмический язык программирования, работающий в режиме интерпретации', 0),
	(499, 161, 'записывает машинный код в форме загрузочного файла.', 1),
	(500, 162, 'буквы латинского алфавита', 1),
	(501, 162, 'буквы русского алфавита', 0),
	(502, 162, 'буквы греческого алфавита', 0),
	(503, 162, 'цифры', 1),
	(504, 162, 'знаки арифметических операций: +, -, /, "', 1),
	(505, 162, 'знаки операций отношений: >, <, =, >=, <=, <>', 1),
	(506, 162, 'специальные знаки:!,?, #, %,&, $,«,«,,.,,', 1),
	(507, 162, 'круглые скобки () и) квадратные скобки.', 1),
	(508, 163, 'буквы латинского алфавита', 1),
	(509, 163, 'буквы русского алфавита', 0),
	(510, 163, 'буквы греческого алфавита', 0),
	(511, 163, 'цифры', 1),
	(512, 163, 'знаки арифметических операций: +, -, /, "', 1),
	(513, 163, 'знаки операций отношений: >, <, =, >=, <=, <>', 1),
	(514, 163, 'специальные знаки:!,?, #, %,&, $,«,«,,.,,', 1),
	(515, 163, 'круглые скобки () и) квадратные скобки.', 1),
	(516, 164, 'числовые;', 1),
	(517, 164, 'текстовые', 1),
	(518, 164, 'указатели', 0),
	(519, 164, 'типы данных', 0),
	(520, 164, 'записи.', 0),
	(521, 165, 'целые', 1),
	(522, 165, 'с фиксированной точкой', 0),
	(523, 165, 'в виде строк', 1),
	(524, 165, 'с плавающей точкой.', 1),
	(525, 166, '+В, -14, 21.5Е2, 0.05', 1),
	(526, 166, ' 3.4*Е8, 45.Е2, -16', 0),
	(527, 166, '18.2, .05Е1, -18', 1),
	(528, 166, '0.05Е5, ±16, -21,5', 0),
	(529, 166, '21-Ю2, -18, 45.2', 0),
	(530, 167, 'верно', 1),
	(531, 167, 'неверно', 0),
	(532, 168, ' чисел', 1),
	(533, 168, 'констант', 1),
	(534, 168, 'команд MS-DOS', 0),
	(535, 168, 'машинных команд', 0),
	(536, 168, 'переменных', 1),
	(537, 168, 'функций', 1),
	(538, 168, 'круглых скобок', 1),
	(539, 168, ' квадратных скобок.', 0),
	(540, 169, 'служебное слово на языке QBASIC', 0),
	(541, 169, 'область памяти, в которой хранится некоторое значение', 1),
	(542, 169, ' значение регистра.', 0),
	(543, 170, '!', 1),
	(544, 170, '№', 1),
	(545, 170, ')(', 0),
	(546, 170, '+', 0),
	(547, 170, '=', 0),
	(548, 170, '-', 0),
	(549, 170, '+/-', 1),
	(550, 170, '*', 1),
	(551, 171, 'Можливість зберігати жорстко обмежену кількість структур', 1),
	(552, 171, 'Виділення суттєвого неперервного сегмента пам\'яті', 1),
	(553, 171, 'Складність доступу до окремої структури', 0),
	(554, 171, 'Необхідність наперед знати розмір масиву', 1),
	(555, 172, 'F', 0),
	(556, 172, 'E', 0),
	(557, 172, 'D', 0),
	(558, 172, 'C', 0),
	(559, 172, 'B', 0),
	(560, 172, 'A', 0),
	(561, 172, '9', 0),
	(562, 172, '8', 0),
	(563, 172, '7', 1),
	(564, 172, '6', 1),
	(565, 172, '5', 1),
	(566, 172, '4', 1),
	(567, 172, '3', 1),
	(568, 172, '2', 1),
	(569, 172, '1', 1),
	(570, 172, '0', 1),
	(571, 173, '155', 0),
	(572, 173, '255', 1),
	(573, 173, '245', 0),
	(574, 173, '555', 0),
	(575, 174, '10001110', 0),
	(576, 174, '10001001', 1),
	(577, 174, '01001101', 0),
	(578, 174, '10011011', 0),
	(579, 175, '415', 0),
	(580, 175, '389', 0),
	(581, 175, '479', 1),
	(582, 175, '513', 0),
	(583, 176, '55', 1),
	(584, 176, '43', 0),
	(585, 176, '87', 0),
	(586, 176, '85', 0),
	(587, 177, 'Рецеп приготування страви.', 1),
	(588, 177, 'Порядок евакуації у надзвичайній ситуації.', 1),
	(589, 177, 'Прохання матері купити на базарі картоплю та ще якісь овочів.', 0),
	(590, 178, 'Зрозумілість', 1),
	(591, 178, 'Компактність', 0),
	(592, 178, 'Визначеність', 1),
	(593, 178, 'Повторюваність', 0),
	(594, 178, 'Масовість', 1),
	(595, 178, 'Дискретність', 1),
	(596, 178, 'Результативність', 1),
	(597, 179, 'Так', 0),
	(598, 179, 'Ні', 1),
	(599, 179, 'Складно відповісти', 0),
	(600, 180, 'Метод батога та пряника', 0),
	(601, 180, 'Метод «від балди».', 0),
	(602, 180, 'Метод північно-західного кута.', 1),
	(603, 181, 'Перед початком розробки програми команда програмістів має виконати певні оздоровчі процедури.', 0),
	(604, 181, 'При запуску програма виконує певні процедури над вхідними даними.', 0),
	(605, 181, 'Код програми розбивається на логічно завершені ділянки, які виділяються у окремі процедури (функції), кожна з яких здійснює певну цілісну дію.', 1),
	(606, 182, 'Так', 1),
	(607, 182, 'Ні', 0),
	(608, 182, 'Важко відповісти.', 0),
	(609, 183, 'Розробка програми починаючи з верхнього рядка і до низу.', 0),
	(610, 183, 'Розробка спочатку головної частини програми “логіки”, а потім – всіх модулів нижчих рівнів.', 1),
	(611, 183, 'Перед початком написання програми програміст має спуститись у двір подихати свіжим повітрям.', 0),
	(612, 184, 'Команда програмістів має здійснити сходження на найближчу гору.', 0),
	(613, 184, 'Написання програми починається з кінця.', 0),
	(614, 184, 'Спочатку розробляються модулі програми нижчого рівня, потім поєднуються у модулі вищого рівня, які в свою чергу поєднуються у готову програму.', 1),
	(615, 185, 'Введення поняття циклів.', 1),
	(616, 185, 'Введення поняття операторів умовного переходу.', 1),
	(617, 185, 'Поява нових структур даних.', 0),
	(618, 186, 'Автомобіль', 0),
	(619, 186, 'Креслення автомобіля, по яким програміст може собі його виготовити.', 0),
	(620, 186, 'Можливість використати вже готові класи у своїй роботі для спрощення розробки програми.', 1),
	(621, 187, 'Знання передаються від батька до сина.', 0),
	(622, 187, 'Можливість створити новий клас на основі існуючого з метою розширення функціоналу.', 1),
	(623, 187, 'Об’єкт може успадкувати інформацію з іншого об’єкту.', 0),
	(624, 188, 'Це мова, яка зрозуміла комп’ютеру та використовується для складання програм.', 1),
	(625, 188, 'Це мова, якою користуються програмісти для спілкування між собою.', 0),
	(626, 188, 'Це мова, яка використовується програмами при обміні даними.', 0),
	(627, 189, 'Вона незрозуміла для програміста на перший погляд.', 1),
	(628, 189, 'Їх складно перенести на інший комп’ютер.', 1),
	(629, 189, 'Для використання машинної мови потрібно заливати в комп’ютер машинне масло.', 0),
	(630, 190, 'Набір команд для програмування.', 0),
	(631, 190, 'Спеціальна програма для перекладу команд асемблерної мови на мову машинних кодів.', 1),
	(632, 190, 'Перша мова програмування.', 0),
	(633, 191, 'того, що комп’ютери сталі розумніші', 0),
	(634, 191, 'того, що комп’ютери змогли спілкуватись з програмістом.', 0),
	(635, 191, 'того, що програма має більш зрозумілий вигляд, команди основані на звичній людській мові.', 1),
	(636, 192, 'Розділення програми на структурні частини.', 1),
	(637, 192, 'Технологія програмування стала більш структурованою, чітко визначено з чого почати розробку програми та кожен наступний крок.', 0),
	(638, 192, 'Використання структур даних для різних змінних, які логічно поєднанні між собою.', 1),
	(639, 193, 'Воно виникло пізніше.', 0),
	(640, 193, 'Об’єкт являє собою сукупність структур.', 0),
	(641, 193, 'Об’єкт це поєднання структури даних та методів, які видозмінюють ці дані.', 1),
	(642, 194, 'JavaScript', 1),
	(643, 194, 'C++', 0),
	(644, 194, 'PHP', 1),
	(645, 194, 'SWIFT', 0),
	(646, 194, 'Ruby On Rails', 1),
	(647, 194, 'Objective-C', 0),
	(648, 195, 'Спільнота програмістів, у якій вони між собою спілкуються та обмінюються досвідом.', 0),
	(649, 195, 'Спеціальні програми, які полегшують роботу програміста, допомагають у розробці програми.', 1),
	(650, 195, 'Територія, де більше всього працює програмістів.', 0),
	(651, 196, 'Використання стандартизованої мови програмування підвищує якість програмного продукту.', 0),
	(652, 196, 'Використання нестандартизованої мови програмування перешкоджає продажу програми.', 0),
	(653, 196, 'Можливість використання різних середовищ розробки для однієї мови програмування.', 1),
	(654, 197, 'Введення можливості – визнання її не рекомендованою для використання  - визнання її застарівшою.', 0),
	(655, 197, 'Введення можливості – визнання її не рекомендованою для використання  - визнання її застарівшою – виключення можливості зі стандарту.', 1),
	(656, 197, 'Введення можливості – визнання її застарівшою – виключення можливості зі стандарту.', 0),
	(657, 197, 'Введення можливості – визнання її не рекомендованою для використання – виключення можливості зі стандарту.', 0),
	(658, 197, 'Введення можливості - визнання її застарівшою - визнання її не рекомендованою для використання – виключення можливості зі стандарту.', 0),
	(659, 198, 'и ти', 1),
	(660, 198, 'итит', 0),
	(661, 198, 'чст', 0),
	(662, 199, 'hm', 0),
	(663, 199, 'gjm', 1),
	(664, 199, 'gj', 0),
	(665, 200, '7', 1),
	(666, 200, '5', 0),
	(667, 200, '8', 0),
	(668, 201, '1', 0),
	(669, 201, '2', 0),
	(670, 201, '3', 0),
	(671, 201, '4', 1),
	(672, 201, '5', 0),
	(673, 202, '1', 0),
	(674, 202, '2', 0),
	(675, 202, '3', 0),
	(676, 202, '4', 1),
	(677, 202, '5', 1),
	(678, 203, '1', 0),
	(679, 203, '2', 0),
	(680, 203, '3', 0),
	(681, 203, '4', 1),
	(682, 203, '1', 0),
	(683, 203, '2', 0),
	(684, 203, '3', 0),
	(685, 203, '4', 1),
	(686, 204, 'vbc', 0),
	(687, 204, 'cvb', 0),
	(688, 204, 'vb', 0),
	(689, 204, 'cvb', 1),
	(690, 204, 'cvb', 0),
	(691, 204, 'vb', 0),
	(692, 204, 'cvb', 0),
	(693, 204, 'v', 0),
	(694, 204, 'cvb', 1),
	(695, 205, 'BDJFK', 0),
	(696, 205, 'VFDZBZFG', 1),
	(697, 205, 'BGFZB', 0);
/*!40000 ALTER TABLE `tests_answers` ENABLE KEYS */;
/*!40014 SET FOREIGN_KEY_CHECKS=1 */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;

-- --------------------------------------------------------
-- Host:                         127.0.0.1
-- Server version:               5.6.21 - MySQL Community Server (GPL)
-- Server OS:                    Win32
-- HeidiSQL version:             7.0.0.4053
-- Date/time:                    2015-05-25 14:12:35
-- --------------------------------------------------------

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET NAMES utf8 */;
/*!40014 SET FOREIGN_KEY_CHECKS=0 */;

-- Dumping structure for table int_ita_db.lecture_element
DROP TABLE IF EXISTS `lecture_element`;
CREATE TABLE IF NOT EXISTS `lecture_element` (
  `id_block` int(11) NOT NULL AUTO_INCREMENT,
  `id_lecture` int(11) NOT NULL,
  `block_order` int(11) NOT NULL,
  `type` varchar(15) NOT NULL,
  `id_type` tinyint(4) NOT NULL,
  `html_block` text NOT NULL,
  PRIMARY KEY (`id_block`),
  KEY `FK_lecture_element_element_type` (`id_type`),
  CONSTRAINT `FK_lecture_element_element_type` FOREIGN KEY (`id_type`) REFERENCES `element_type` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=29 DEFAULT CHARSET=utf8 COMMENT='Chapters and other lecture''s resources ';

-- Dumping data for table int_ita_db.lecture_element: ~11 rows (approximately)
/*!40000 ALTER TABLE `lecture_element` DISABLE KEYS */;
INSERT INTO `lecture_element` (`id_block`, `id_lecture`, `block_order`, `type`, `id_type`, `html_block`) VALUES
	(9, 1, 1, 'video', 2, 'https://www.youtube.com/embed/L3Mg6lk6yyA'),
	(10, 1, 6, 'instruction', 7, '<li>On line 7, set <span class="colorBP"><span class="colorGreen">$</span>terms</span> equal to a number greater than 5. Make sure to put a semicolon at the end of the line.</li>\r\n                <li>On line 9, edit the state condition so that your program will be out Some expressions return a \' logical value": TRUE or FALSE, text like thise:<span class="colorAlert">You get a 10% discount!</span></li>'),
	(13, 1, 3, 'text', 1, '<p><span class="colorBlack">Імена змінних</span>\n</p>\n<p>Будь-яка змінна в РНР має ім\'я, що починається із знаку $, наприклад Svariable. При такому способі формування імен змінних їх дуже легко відрізнити від іншого коду. Якщо в інших мовах інколи може виникати плутанина з тим, що при першому погляді на код не завжди ясно - де тут змінні, а де функції, то в РНР це питання навіть не постає. Наприклад, ссилка на змінну по її імені, що зберігається в іншій змінній:\n</p>'),
	(18, 1, 7, 'instruction', 7, '<li>On line 7, set <span class="colorBP"><span class="colorGreen">$</span>terms</span> equal to a number greater than 5. Make sure to put a semicolon at the end of the line.</li>\r\n                <li>On line 9, edit the state condition so that your program will be out Some expressions return a \' logical value": TRUE or FALSE, text like thise:<span class="colorAlert">You get a 10% discount!</span></li>'),
	(19, 1, 5, 'video', 2, 'https://www.youtube.com/embed/L3Mg6lk6yyA'),
	(21, 2, 1, 'text', 1, '<p><span class="colorBlack">Імена змінних<em></em></span>\n	<strong><del><em></em></del></strong>\n</p>\n<p>Будь-яка змінна в РНР має ім\'я, що починається із знаку $, наприклад Svariable. При такому способі формування імен змінних їх дуже легко відрізнити від іншого коду. Якщо в інших мовах інколи може виникати плутанина з тим, що при першому погляді на код не завжди ясно - де тут змінні, а де функції, то в РНР це питання навіть не постає. Наприклад, ссилка на змінну по її імені, що зберігається в іншій змінній:\n</p>'),
	(22, 3, 1, 'text', 1, ' <span class="colorBlack">Імена змінних</span>\r\n    <p>Будь-яка змінна в РНР має ім\'я, що починається із знаку $, наприклад Svariable. При такому способі формування імен змінних їх дуже легко відрізнити від іншого коду. Якщо в інших мовах інколи може виникати плутанина з тим, що при першому погляді на код не завжди ясно - де тут змінні, а де функції, то в РНР це питання навіть не постає. Наприклад, ссилка на змінну по її імені, що зберігається в іншій змінній:</p>'),
	(23, 24, 1, 'text', 1, '<p>New text block!</p>'),
	(24, 24, 2, 'text', 1, '<p><iframe width="420" height="315" src="https://www.youtube.com/embed/7KAhgrBDl3A" frameborder="0" allowfullscreen=""></iframe></p>'),
	(25, 1, 2, 'label', 8, 'Частина 1: Типи змінних та перемінних'),
	(28, 1, 4, 'label', 8, 'Частина 2: Типи змінних та перемінних');
/*!40000 ALTER TABLE `lecture_element` ENABLE KEYS */;
/*!40014 SET FOREIGN_KEY_CHECKS=1 */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;

-- --------------------------------------------------------
-- Host:                         127.0.0.1
-- Server version:               5.6.21 - MySQL Community Server (GPL)
-- Server OS:                    Win32
-- HeidiSQL version:             7.0.0.4053
-- Date/time:                    2015-07-27 18:23:28
-- --------------------------------------------------------

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET NAMES utf8 */;
/*!40014 SET FOREIGN_KEY_CHECKS=0 */;

-- Dumping structure for table int_ita_db.phpbb_acl_groups
DROP TABLE IF EXISTS `phpbb_acl_groups`;
CREATE TABLE IF NOT EXISTS `phpbb_acl_groups` (
  `group_id` mediumint(8) unsigned NOT NULL DEFAULT '0',
  `forum_id` mediumint(8) unsigned NOT NULL DEFAULT '0',
  `auth_option_id` mediumint(8) unsigned NOT NULL DEFAULT '0',
  `auth_role_id` mediumint(8) unsigned NOT NULL DEFAULT '0',
  `auth_setting` tinyint(2) NOT NULL DEFAULT '0',
  KEY `group_id` (`group_id`),
  KEY `auth_opt_id` (`auth_option_id`),
  KEY `auth_role_id` (`auth_role_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

-- Dumping data for table int_ita_db.phpbb_acl_groups: ~106 rows (approximately)
/*!40000 ALTER TABLE `phpbb_acl_groups` DISABLE KEYS */;
INSERT INTO `phpbb_acl_groups` (`group_id`, `forum_id`, `auth_option_id`, `auth_role_id`, `auth_setting`) VALUES
	(1, 0, 88, 0, 1),
	(1, 0, 97, 0, 1),
	(1, 0, 115, 0, 1),
	(5, 0, 0, 5, 0),
	(5, 0, 0, 1, 0),
	(2, 0, 0, 6, 0),
	(3, 0, 0, 6, 0),
	(4, 0, 0, 5, 0),
	(4, 0, 0, 10, 0),
	(7, 0, 0, 23, 0),
	(1, 15, 0, 17, 0),
	(2, 15, 0, 22, 0),
	(5, 15, 0, 14, 0),
	(1, 16, 0, 17, 0),
	(2, 16, 0, 22, 0),
	(5, 16, 0, 14, 0),
	(1, 17, 0, 17, 0),
	(2, 17, 0, 22, 0),
	(5, 17, 0, 14, 0),
	(1, 18, 0, 17, 0),
	(2, 18, 0, 22, 0),
	(5, 18, 0, 14, 0),
	(1, 19, 0, 17, 0),
	(2, 19, 0, 22, 0),
	(5, 19, 0, 14, 0),
	(1, 20, 0, 17, 0),
	(2, 20, 0, 22, 0),
	(5, 20, 0, 14, 0),
	(1, 21, 0, 17, 0),
	(2, 21, 0, 22, 0),
	(5, 21, 0, 14, 0),
	(1, 24, 0, 17, 0),
	(2, 24, 0, 22, 0),
	(5, 24, 0, 14, 0),
	(1, 25, 0, 17, 0),
	(2, 25, 0, 22, 0),
	(5, 25, 0, 14, 0),
	(1, 26, 0, 17, 0),
	(2, 26, 0, 22, 0),
	(5, 26, 0, 14, 0),
	(1, 27, 0, 17, 0),
	(2, 27, 0, 22, 0),
	(5, 27, 0, 14, 0),
	(1, 28, 0, 17, 0),
	(2, 28, 0, 22, 0),
	(5, 28, 0, 14, 0),
	(1, 29, 0, 17, 0),
	(2, 29, 0, 22, 0),
	(5, 29, 0, 14, 0),
	(1, 30, 0, 17, 0),
	(2, 30, 0, 22, 0),
	(5, 30, 0, 14, 0),
	(1, 31, 0, 17, 0),
	(2, 31, 0, 22, 0),
	(5, 31, 0, 14, 0),
	(1, 32, 0, 17, 0),
	(2, 32, 0, 22, 0),
	(5, 32, 0, 14, 0),
	(1, 33, 0, 17, 0),
	(2, 33, 0, 22, 0),
	(5, 33, 0, 14, 0),
	(1, 34, 0, 17, 0),
	(2, 34, 0, 22, 0),
	(5, 34, 0, 14, 0),
	(1, 35, 0, 17, 0),
	(2, 35, 0, 22, 0),
	(5, 35, 0, 14, 0),
	(1, 36, 0, 17, 0),
	(2, 36, 0, 22, 0),
	(5, 36, 0, 14, 0),
	(1, 37, 0, 17, 0),
	(2, 37, 0, 22, 0),
	(5, 37, 0, 14, 0),
	(1, 38, 0, 17, 0),
	(2, 38, 0, 22, 0),
	(5, 38, 0, 14, 0),
	(1, 39, 0, 17, 0),
	(2, 39, 0, 22, 0),
	(5, 39, 0, 14, 0),
	(1, 40, 0, 17, 0),
	(2, 40, 0, 22, 0),
	(5, 40, 0, 14, 0),
	(1, 41, 0, 17, 0),
	(2, 41, 0, 22, 0),
	(5, 41, 0, 14, 0),
	(1, 42, 0, 17, 0),
	(2, 42, 0, 22, 0),
	(5, 42, 0, 14, 0),
	(1, 43, 0, 17, 0),
	(2, 43, 0, 22, 0),
	(5, 43, 0, 14, 0),
	(1, 44, 0, 17, 0),
	(2, 44, 0, 22, 0),
	(5, 44, 0, 14, 0),
	(1, 45, 0, 17, 0),
	(2, 45, 0, 22, 0),
	(5, 45, 0, 14, 0),
	(1, 46, 0, 17, 0),
	(2, 46, 0, 22, 0),
	(5, 46, 0, 14, 0),
	(1, 47, 0, 17, 0),
	(2, 47, 0, 22, 0),
	(5, 47, 0, 14, 0),
	(1, 48, 0, 17, 0),
	(2, 48, 0, 22, 0),
	(5, 48, 0, 14, 0);
/*!40000 ALTER TABLE `phpbb_acl_groups` ENABLE KEYS */;
/*!40014 SET FOREIGN_KEY_CHECKS=1 */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;

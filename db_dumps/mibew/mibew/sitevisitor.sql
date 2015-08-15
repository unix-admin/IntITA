-- --------------------------------------------------------
-- Host:                         127.0.0.1
-- Server version:               5.6.21 - MySQL Community Server (GPL)
-- Server OS:                    Win32
-- HeidiSQL version:             7.0.0.4053
-- Date/time:                    2015-08-15 11:35:27
-- --------------------------------------------------------

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET NAMES utf8 */;
/*!40014 SET FOREIGN_KEY_CHECKS=0 */;

-- Dumping structure for table mibew.sitevisitor
DROP TABLE IF EXISTS `sitevisitor`;
CREATE TABLE IF NOT EXISTS `sitevisitor` (
  `visitorid` int(11) NOT NULL AUTO_INCREMENT,
  `userid` varchar(255) NOT NULL,
  `username` varchar(64) DEFAULT NULL,
  `firsttime` int(11) NOT NULL DEFAULT '0',
  `lasttime` int(11) NOT NULL DEFAULT '0',
  `entry` text NOT NULL,
  `details` text NOT NULL,
  `invitations` int(11) NOT NULL DEFAULT '0',
  `chats` int(11) NOT NULL DEFAULT '0',
  `threadid` int(11) DEFAULT NULL,
  PRIMARY KEY (`visitorid`),
  KEY `threadid` (`threadid`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- Dumping data for table mibew.sitevisitor: ~0 rows (approximately)
/*!40000 ALTER TABLE `sitevisitor` DISABLE KEYS */;
/*!40000 ALTER TABLE `sitevisitor` ENABLE KEYS */;
/*!40014 SET FOREIGN_KEY_CHECKS=1 */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;

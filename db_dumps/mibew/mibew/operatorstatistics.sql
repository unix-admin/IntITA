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

-- Dumping structure for table mibew.operatorstatistics
DROP TABLE IF EXISTS `operatorstatistics`;
CREATE TABLE IF NOT EXISTS `operatorstatistics` (
  `statid` int(11) NOT NULL AUTO_INCREMENT,
  `date` int(11) NOT NULL DEFAULT '0',
  `operatorid` int(11) NOT NULL,
  `threads` int(11) NOT NULL DEFAULT '0',
  `messages` int(11) NOT NULL DEFAULT '0',
  `averagelength` float(10,1) NOT NULL DEFAULT '0.0',
  `sentinvitations` int(11) NOT NULL DEFAULT '0',
  `acceptedinvitations` int(11) NOT NULL DEFAULT '0',
  `rejectedinvitations` int(11) NOT NULL DEFAULT '0',
  `ignoredinvitations` int(11) NOT NULL DEFAULT '0',
  PRIMARY KEY (`statid`),
  KEY `operatorid` (`operatorid`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- Dumping data for table mibew.operatorstatistics: ~0 rows (approximately)
/*!40000 ALTER TABLE `operatorstatistics` DISABLE KEYS */;
/*!40000 ALTER TABLE `operatorstatistics` ENABLE KEYS */;
/*!40014 SET FOREIGN_KEY_CHECKS=1 */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;

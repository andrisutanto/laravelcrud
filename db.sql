-- --------------------------------------------------------
-- Host:                         127.0.0.1
-- Server version:               5.7.33 - MySQL Community Server (GPL)
-- Server OS:                    Win64
-- HeidiSQL Version:             11.3.0.6295
-- --------------------------------------------------------

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET NAMES utf8 */;
/*!50503 SET NAMES utf8mb4 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;


-- Dumping database structure for dblearnlaravel9
CREATE DATABASE IF NOT EXISTS `dblearnlaravel9` /*!40100 DEFAULT CHARACTER SET utf8 */;
USE `dblearnlaravel9`;

-- Dumping structure for table dblearnlaravel9.mahasiswa
CREATE TABLE IF NOT EXISTS `mahasiswa` (
  `mhsnim` char(7) NOT NULL,
  `mhsnama` varchar(100) DEFAULT NULL,
  `mhstelp` char(15) DEFAULT NULL,
  `mhsalamat` varchar(200) DEFAULT NULL,
  PRIMARY KEY (`mhsnim`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- Dumping data for table dblearnlaravel9.mahasiswa: ~0 rows (approximately)
/*!40000 ALTER TABLE `mahasiswa` DISABLE KEYS */;
INSERT INTO `mahasiswa` (`mhsnim`, `mhsnama`, `mhstelp`, `mhsalamat`) VALUES
	('118013', 'Andri Sutanto', '08122015002', 'Jl Lebak Indah Regency Blok B 50'),
	('123456', 'Edwin Prastyan', '0812364656', 'Kebraon'),
	('129875', 'Andrew', '02568764613', 'Klampis'),
	('333333', 'Shierling', '0846464646', 'Bukit Darmo'),
	('365488', 'Andrias Lukman', '08165978979', 'Bukit Palma'),
	('365976', 'Klemens', '02456894545', 'Nirwana');
/*!40000 ALTER TABLE `mahasiswa` ENABLE KEYS */;

/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IFNULL(@OLD_FOREIGN_KEY_CHECKS, 1) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40111 SET SQL_NOTES=IFNULL(@OLD_SQL_NOTES, 1) */;

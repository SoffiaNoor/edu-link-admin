-- --------------------------------------------------------
-- Host:                         127.0.0.1
-- Server version:               10.4.28-MariaDB - mariadb.org binary distribution
-- Server OS:                    Win64
-- HeidiSQL Version:             12.6.0.6765
-- --------------------------------------------------------

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET NAMES utf8 */;
/*!50503 SET NAMES utf8mb4 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;


-- Dumping database structure for db_edulink
CREATE DATABASE IF NOT EXISTS `db_edulink` /*!40100 DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci */;
USE `db_edulink`;

-- Dumping structure for table db_edulink.bidang
CREATE TABLE IF NOT EXISTS `bidang` (
  `idbidang` int(11) NOT NULL,
  `namabidang` varchar(5) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`idbidang`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- Data exporting was unselected.

-- Dumping structure for table db_edulink.mapel
CREATE TABLE IF NOT EXISTS `mapel` (
  `idmp` int(11) NOT NULL,
  `namamapel` varchar(255) DEFAULT NULL,
  `idbidang` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`idmp`),
  KEY `idbidang` (`idbidang`),
  CONSTRAINT `mapel_ibfk_1` FOREIGN KEY (`idbidang`) REFERENCES `bidang` (`idbidang`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- Data exporting was unselected.

-- Dumping structure for table db_edulink.mentor
CREATE TABLE IF NOT EXISTS `mentor` (
  `idmentor` int(11) NOT NULL,
  `namamentor` varchar(50) DEFAULT NULL,
  `pendidikan` varchar(10) DEFAULT NULL,
  `ptn` varchar(50) DEFAULT NULL,
  `idbidang` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`idmentor`),
  KEY `idbidang` (`idbidang`),
  CONSTRAINT `mentor_ibfk_1` FOREIGN KEY (`idbidang`) REFERENCES `bidang` (`idbidang`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- Data exporting was unselected.

-- Dumping structure for table db_edulink.murid
CREATE TABLE IF NOT EXISTS `murid` (
  `idmurid` int(11) NOT NULL,
  `namamurid` varchar(50) DEFAULT NULL,
  `namasekolah` varchar(50) DEFAULT NULL,
  `gender` varchar(10) DEFAULT NULL,
  `tanggallahir` date DEFAULT NULL,
  `kelas` int(11) DEFAULT NULL,
  `idbidang` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`idmurid`),
  KEY `idbidang` (`idbidang`),
  CONSTRAINT `murid_ibfk_1` FOREIGN KEY (`idbidang`) REFERENCES `bidang` (`idbidang`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- Data exporting was unselected.

-- Dumping structure for table db_edulink.pesan_konsul
CREATE TABLE IF NOT EXISTS `pesan_konsul` (
  `idkonsul` int(11) NOT NULL,
  `idmentor` int(11) DEFAULT NULL,
  `idmurid` int(11) DEFAULT NULL,
  `idbidang` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`idkonsul`),
  KEY `idmentor` (`idmentor`),
  KEY `idmurid` (`idmurid`),
  KEY `idbidang` (`idbidang`),
  CONSTRAINT `pesan_konsul_ibfk_1` FOREIGN KEY (`idmentor`) REFERENCES `mentor` (`idmentor`),
  CONSTRAINT `pesan_konsul_ibfk_2` FOREIGN KEY (`idmurid`) REFERENCES `murid` (`idmurid`),
  CONSTRAINT `pesan_konsul_ibfk_3` FOREIGN KEY (`idbidang`) REFERENCES `bidang` (`idbidang`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- Data exporting was unselected.

-- Dumping structure for table db_edulink.pesan_kursus
CREATE TABLE IF NOT EXISTS `pesan_kursus` (
  `idkursus` int(11) NOT NULL,
  `idmurid` int(11) DEFAULT NULL,
  `idmapel` int(11) DEFAULT NULL,
  `idmentor` int(11) DEFAULT NULL,
  `idbidang` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`idkursus`),
  KEY `idmurid` (`idmurid`),
  KEY `idmapel` (`idmapel`),
  KEY `idmentor` (`idmentor`),
  KEY `idbidang` (`idbidang`),
  CONSTRAINT `pesan_kursus_ibfk_1` FOREIGN KEY (`idmurid`) REFERENCES `murid` (`idmurid`),
  CONSTRAINT `pesan_kursus_ibfk_2` FOREIGN KEY (`idmapel`) REFERENCES `mapel` (`idmp`),
  CONSTRAINT `pesan_kursus_ibfk_3` FOREIGN KEY (`idmentor`) REFERENCES `mentor` (`idmentor`),
  CONSTRAINT `pesan_kursus_ibfk_4` FOREIGN KEY (`idbidang`) REFERENCES `bidang` (`idbidang`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- Data exporting was unselected.

/*!40103 SET TIME_ZONE=IFNULL(@OLD_TIME_ZONE, 'system') */;
/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IFNULL(@OLD_FOREIGN_KEY_CHECKS, 1) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40111 SET SQL_NOTES=IFNULL(@OLD_SQL_NOTES, 1) */;

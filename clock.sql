-- MySQL dump 10.16  Distrib 10.1.48-MariaDB, for debian-linux-gnu (x86_64)
--
-- Host: localhost    Database: clock
-- ------------------------------------------------------
-- Server version	10.1.48-MariaDB-0+deb9u2

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;

--
-- Table structure for table `czas_pracy`
--

DROP TABLE IF EXISTS `czas_pracy`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `czas_pracy` (
  `id_czas_pracy` int(11) NOT NULL DEFAULT '0',
  `czas_start` timestamp NULL DEFAULT NULL,
  `czas_stop` timestamp NULL DEFAULT NULL,
  `notatka` longtext COMMENT 'notatka',
  `id_projekt` int(11) DEFAULT NULL COMMENT 'id projekt',
  `id_uzytkownik` int(11) DEFAULT NULL COMMENT 'id uzytkownik',
  PRIMARY KEY (`id_czas_pracy`),
  KEY `id_projekt` (`id_projekt`),
  KEY `fk_czas_pracy_uzytkownik` (`id_uzytkownik`),
  CONSTRAINT `fk_czas_pracy_uzytkownik` FOREIGN KEY (`id_uzytkownik`) REFERENCES `uzytkownik` (`id_uzytkownik`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `id_projekt` FOREIGN KEY (`id_projekt`) REFERENCES `projekt` (`id_projekt`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COMMENT='czas_pracy';
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `czas_pracy`
--

LOCK TABLES `czas_pracy` WRITE;
/*!40000 ALTER TABLE `czas_pracy` DISABLE KEYS */;
INSERT INTO `czas_pracy` VALUES (1000,'2022-01-05 16:00:00','2022-01-05 18:00:00','note 0',434633,24),(1001,'2022-01-05 20:00:00','2022-01-05 21:00:00','note 1',434633,24),(123232,'2022-01-28 15:58:14','2022-01-28 16:58:19','Krótka notatka',222222,23),(124431,'2022-01-27 20:17:36','2022-01-29 20:17:39','Krótka notatka',23453,23),(12234123,'2022-01-28 09:00:00','2022-01-28 11:00:00','Krótka notatka',222222,23);
/*!40000 ALTER TABLE `czas_pracy` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `projekt`
--

DROP TABLE IF EXISTS `projekt`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `projekt` (
  `id_projekt` int(11) NOT NULL COMMENT 'id projekt',
  `nazwa` varchar(1000) DEFAULT NULL COMMENT 'nazwa',
  `opis` text COMMENT 'opis',
  PRIMARY KEY (`id_projekt`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COMMENT='projekt';
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `projekt`
--

LOCK TABLES `projekt` WRITE;
/*!40000 ALTER TABLE `projekt` DISABLE KEYS */;
INSERT INTO `projekt` VALUES (23453,'Projekcik IPZ','To jest krótki opis do projektu'),(222222,'Projekt 1','Krótki opis projektu'),(434633,'Bardzo ciężki projekt','Krótki opis do ciężkiego projektu z IPZ');
/*!40000 ALTER TABLE `projekt` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `rola`
--

DROP TABLE IF EXISTS `rola`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `rola` (
  `id_rola` int(11) NOT NULL,
  `nazwa` char(255) DEFAULT NULL COMMENT 'nazwa',
  `opis` longtext COMMENT 'opis',
  PRIMARY KEY (`id_rola`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COMMENT='rola';
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `rola`
--

LOCK TABLES `rola` WRITE;
/*!40000 ALTER TABLE `rola` DISABLE KEYS */;
INSERT INTO `rola` VALUES (101,'user','rola zwyklego usera'),(202,'admin','rola zwykłego admina');
/*!40000 ALTER TABLE `rola` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `uzytkownik`
--

DROP TABLE IF EXISTS `uzytkownik`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `uzytkownik` (
  `id_uzytkownik` int(11) NOT NULL AUTO_INCREMENT,
  `imie` char(255) DEFAULT NULL COMMENT 'imie',
  `nazwisko` char(255) DEFAULT NULL COMMENT 'nazwisko',
  `adres_ulica` char(255) DEFAULT NULL COMMENT 'adres ulica',
  `adres_numer_domu_mieszkania` int(11) DEFAULT NULL COMMENT 'adres numer domu mieszkania',
  `adres_miasto` char(255) DEFAULT NULL COMMENT 'adres miasto',
  `adres_kod_pocztowy` char(6) DEFAULT NULL COMMENT 'adres kod pocztowy',
  `adres_kraj` char(255) DEFAULT NULL COMMENT 'adres kraj',
  `klasa_uzytkownika` char(255) DEFAULT NULL COMMENT 'klasa uzytkownika',
  `email` char(255) DEFAULT NULL COMMENT 'email',
  `telefon_komorkowy` char(255) DEFAULT NULL COMMENT 'telefon komorkowy',
  `haslo` char(255) DEFAULT NULL COMMENT 'haslo',
  `id_rola` int(11) DEFAULT NULL COMMENT 'id rola',
  PRIMARY KEY (`id_uzytkownik`),
  KEY `fk_uzytkownik_rola` (`id_rola`),
  CONSTRAINT `fk_uzytkownik_rola` FOREIGN KEY (`id_rola`) REFERENCES `rola` (`id_rola`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB AUTO_INCREMENT=26 DEFAULT CHARSET=utf8mb4 COMMENT='uzytkownik';
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `uzytkownik`
--

LOCK TABLES `uzytkownik` WRITE;
/*!40000 ALTER TABLE `uzytkownik` DISABLE KEYS */;
INSERT INTO `uzytkownik` VALUES (21,'Jan','Wieczorkowski','Maslana',123,'Warszawa','01-231','Polska','user','jan@jan.com',NULL,NULL,NULL),(22,'Jan','Wieczorkowski','Maslana',123,'Warszawa','01-231','Polska','user','jan@jan.com',NULL,NULL,NULL),(23,'Robert\n','Kraczmarski','Maslana',123,'Warszawa','01-231','Polska','user','jan@jan.com','234-123-332','jana!haslo',101),(24,'Wojtek','Wieczorkowski','Wioslarska',1334,'Radom','45-343','Polska','user','jan@maurycy.com','234-123-332','jana!haslo!maurycy',101),(25,'Maurycy','Wieczorkowski','Wioslarska',1334,'Radom','45-343','Polska','user','jan@maurycy.com','234-123-332','jana!haslo!maurycy',101);
/*!40000 ALTER TABLE `uzytkownik` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2022-01-27  1:01:11

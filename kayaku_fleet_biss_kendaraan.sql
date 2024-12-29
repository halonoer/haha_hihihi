-- MySQL dump 10.13  Distrib 5.7.17, for Win64 (x86_64)
--
-- Host: localhost    Database: kayaku_fleet
-- ------------------------------------------------------
-- Server version	5.5.62

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;

--
-- Table structure for table `biss_kendaraan`
--

DROP TABLE IF EXISTS `biss_kendaraan`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `biss_kendaraan` (
  `kendaraan_id` int(11) NOT NULL DEFAULT '0',
  `jenis_kendaraan` varchar(50) CHARACTER SET utf8 DEFAULT NULL,
  `pabrikan` varchar(50) CHARACTER SET utf8 DEFAULT NULL,
  `tipe_model` varchar(30) CHARACTER SET utf8 DEFAULT NULL,
  `nomor_kendaraan` varchar(30) CHARACTER SET utf8 DEFAULT NULL,
  `nama_kendaraan` varchar(100) CHARACTER SET utf8 DEFAULT NULL,
  `tahun_pembuatan` varchar(10) CHARACTER SET utf8 DEFAULT NULL,
  `bahan_bakar` varchar(20) CHARACTER SET utf8 DEFAULT NULL,
  `nomor_rangka` varchar(100) CHARACTER SET utf8 DEFAULT NULL,
  `nomor_mesin` varchar(100) CHARACTER SET utf8 DEFAULT NULL,
  `nomor_plat` varchar(15) CHARACTER SET utf8 DEFAULT NULL,
  `oddometer` int(11) DEFAULT NULL,
  `keterangan` varchar(300) CHARACTER SET utf8 DEFAULT NULL,
  `created_by` varchar(150) CHARACTER SET utf8 DEFAULT NULL,
  `created_date` datetime DEFAULT NULL,
  `last_update_by` varchar(300) CHARACTER SET utf8 DEFAULT NULL,
  `last_update_date` datetime DEFAULT NULL,
  PRIMARY KEY (`kendaraan_id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `biss_kendaraan`
--

LOCK TABLES `biss_kendaraan` WRITE;
/*!40000 ALTER TABLE `biss_kendaraan` DISABLE KEYS */;
INSERT INTO `biss_kendaraan` VALUES (1,'sepeda motor','honda','beat street','MTR/2024/0001','honda beat (2024)','2024','bensin','MH1JFU126HK064890','JFU1E2081989','G2435E',803180,'Sehat','admin','2024-11-07 15:47:29','admin','2024-11-08 02:05:42'),(2,'mobil','toyota','supra','CAR/2024/0001','Toyota Supra 2024','2024','bensin','MH1JFU126HK064841','JFU1E2081984','W4984B',468456,'Sehat','admin','2024-11-07 15:47:34',NULL,NULL),(3,'sepeda motor','honda','Vario 125','MTR/2024/0002','Honda Vario 125 (2017)','2017','bensin','MH1JFU126HK064843','JFU1E2081987','W4988B',803180,'Sehat','admin','2024-11-07 15:47:39','admin','2024-11-08 02:06:28'),(5,'truk','Mitsubishi ','Fuso Fighter FN 62F','TRK/2024/0001','Mitsubishi Fuso Fighter FN 62F 2024','2024','solar','MH1JFU126HK067777','JFU1E2081111','W5555B',803180,'Sehat','admin','2024-11-07 16:04:18',NULL,NULL),(6,'Sepeda Motor','Yamaha','Nmax','MTR/2024/0003','Yamaha Nmax 2024','2024','Bensin','MH1JFU126HK069999','JFU1E2081980','W6789B',803180,'Sehat','admin','2024-11-07 16:10:12','admin','2024-11-08 02:08:15'),(7,'Mobil','Honda','Civic Type R','CAR/2024/0002','Honda Civic Type R 2024','2024','Bensin','MH1JFU126HK076543','JFU1E2082121','W7890B',468456,'Sehat','admin','2024-11-07 16:20:01','admin','2024-11-08 02:10:30'),(8,'Sepeda Motor','Suzuki','Satria F150','MTR/2024/0004','Suzuki Satria F150 2024','2024','Bensin','MH1JFU126HK087654','JFU1E2082255','W8901B',803180,'Sehat','admin','2024-11-07 16:30:19','admin','2024-11-08 02:12:45'),(9,'Sepeda Motor','KTM','Duke 390','MTR/2024/0005','KTM Duke 390 2024','2024','Bensin','MH1JFU126HK110000','JFU1E2082500','W1357B',502312,'Sehat','admin','2024-11-07 17:00:45','admin','2024-11-08 02:20:35'),(10,'Mobil','BMW','X5 M','CAR/2024/0003','BMW X5 M 2024','2024','Bensin','MH1JFU126HK120001','JFU1E2082600','W2468B',250456,'Sehat','admin','2024-11-07 17:10:55','admin','2024-11-08 02:22:40'),(11,'Truk','Isuzu','Giga','TRK/2024/0003','Isuzu Giga 2024','2024','Solar','MH1JFU126HK130000','JFU1E2082701','W3579B',900321,'Sehat','admin','2024-11-07 17:20:05','admin','2024-11-08 02:25:15'),(12,'Bus','Volvo','B8R','BUS/2024/0003','Volvo B8R 2024','2024','Bensin','MH1JFU126HK140001','JFU1E2082802','W4680B',756321,'Sehat','admin','2024-11-07 17:30:15','admin','2024-11-08 02:27:40');
/*!40000 ALTER TABLE `biss_kendaraan` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2024-12-29 19:27:45

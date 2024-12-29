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
-- Table structure for table `biss_jenisbarang`
--

DROP TABLE IF EXISTS `biss_jenisbarang`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `biss_jenisbarang` (
  `kdjenis` varchar(5) NOT NULL,
  `namajns` varchar(100) DEFAULT NULL,
  `prefix` varchar(3) DEFAULT NULL,
  `created_by` varchar(100) DEFAULT NULL,
  `created_date` date DEFAULT NULL,
  `last_update_by` varchar(100) DEFAULT NULL,
  `last_update_date` date DEFAULT NULL,
  PRIMARY KEY (`kdjenis`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `biss_jenisbarang`
--

LOCK TABLES `biss_jenisbarang` WRITE;
/*!40000 ALTER TABLE `biss_jenisbarang` DISABLE KEYS */;
INSERT INTO `biss_jenisbarang` VALUES ('J-01','PC','PC',NULL,'2011-12-20',NULL,NULL),('J-02','Notebook','NB',NULL,'2011-12-20',NULL,'2011-12-20'),('J-03','Printer','PR',NULL,'2011-12-20',NULL,NULL),('J-04','Scanner','SC',NULL,'2011-12-22',NULL,NULL),('J-05','Antena Grid',NULL,NULL,'2007-07-24',NULL,NULL),('J-06','Monitor','MN',NULL,'2011-12-22',NULL,'2011-12-22'),('J-07','Wireless',NULL,NULL,'2007-07-24',NULL,'2007-07-24'),('J-08','LAN',NULL,'Developer','2012-02-23',NULL,NULL),('J-09','UPS','UP','Developer','2012-02-23',NULL,NULL),('J-10','Fingerprint (Absensi)',NULL,'Developer','2012-03-26',NULL,NULL),('J-11','Cooler Pad Notebook',NULL,'Developer','2012-04-17',NULL,NULL),('J-12','Access Point','AP','Developer','2012-04-17',NULL,NULL),('J-13','External harddisk','EH','Developer','2012-05-20',NULL,NULL),('J-14','Modem','MD','Developer','2012-08-28',NULL,NULL),('J-15','Earphone',NULL,'Developer','2012-09-11',NULL,NULL),('J-16','Keyboard',NULL,'Developer','2012-09-20',NULL,NULL),('J-17','Mouse',NULL,'Developer','2012-09-20',NULL,NULL),('J-18','Meja','MJ','Anis Eka','2013-08-22',NULL,NULL),('J-19','Kursi','KS','Anis Eka','2013-08-22',NULL,NULL),('J-20','Lemari','AL','Anis Eka','2013-08-22','Aryo','2021-01-16'),('J-21','AC','AC','Anis Eka','2013-08-22','Developer','2019-08-08'),('J-22','Penghancur Kertas','PK','Anis Eka','2013-08-22',NULL,NULL),('J-23','Dispenser','DS','Anis Eka','2013-08-22',NULL,NULL),('J-24','Lemari Es','LE','Anis Eka','2013-08-22',NULL,NULL),('J-25','Mic','MI','Anis Eka','2013-08-22','Hardiansyah','2023-05-20'),('J-26','Karpet','KA','Anis Eka','2013-08-22',NULL,NULL),('J-27','Telepon','TP','Anis Eka','2013-08-22','Hardiansyah','2023-03-29'),('J-28','Mesin Ketik','ME','Anis Eka','2013-08-22','Hardiansyah','2022-06-11'),('J-29','Amplifire','AM','Anis Eka','2013-08-22','Hardiansyah','2022-01-27'),('J-30','Mixer','MX','Anis Eka','2013-08-22',NULL,NULL),('J-31','Speaker','SK','Anis Eka','2013-08-22','Hardiansyah','2022-01-27'),('J-32','White Board','WB','Anis Eka','2013-08-22','Hardiansyah','2022-01-27'),('J-33','Proyektor','PY','Anis Eka','2013-08-22',NULL,NULL),('J-34','Layar Proyektor','LP','Anis Eka','2013-08-22',NULL,NULL),('J-35','Brankas','BR','Anis Eka','2013-08-22',NULL,NULL),('J-37','Kipas Angin','FN','Anis Eka','2013-08-22','Hardiansyah','2022-01-27'),('J-38','Mobil','MB','Anis Eka','2013-08-22','Hardiansyah','2022-01-27'),('J-39','Sepeda Motor','SM','Anis Eka','2013-08-22','Hardiansyah','2022-01-19'),('J-40','Kamera','KM','Anis Eka','2013-08-22',NULL,NULL),('J-41','Kalkulator','KL','Anis Eka','2013-08-22',NULL,NULL),('J-42','Handycam','CM','Anis Eka','2013-08-22','Hardiansyah','2023-03-29'),('J-43','Mesin Potong Rumput Gendong','MP','Anis Eka','2013-08-22','Hardiansyah','2023-03-01'),('J-45','Switch Hub','SH','Developer','2014-04-14','Developer','2014-04-14'),('J-46','KOSONG',NULL,'Imam Chusnul','2021-12-18',NULL,NULL),('J-47','Modem Router','MR','Developer','2014-05-07','Developer','2014-05-08'),('J-48','Router','RB','Developer','2014-05-07',NULL,NULL),('J-49','Smart Phone','SP','Irwan','2014-09-22',NULL,NULL),('J-50','CCTV',NULL,'Irwan','2014-12-04',NULL,NULL),('J-51','RECORDER','RC','Irwan','2015-10-05',NULL,NULL),('J-52','POINTER','PO','Developer','2016-03-11',NULL,NULL),('j-53','Handy Talky','HT','Developer','2016-08-04','syaichu','2023-03-25'),('J-54','Tablet','TB','Irwan','2019-05-06',NULL,NULL),('J-55','Website',NULL,'Galih M A','2020-05-25','Galih M A','2020-05-25'),('J-56','Air Purifier','PF','Developer','2020-12-12',NULL,NULL),('J-57','Meja Kursi Tamu','MK','Aryo','2021-01-16',NULL,NULL),('J-58','EXHAUST FAN','EX','Hardiansyah','2021-05-01',NULL,NULL),('J-59','Webcam',NULL,'Irwan','2021-09-15',NULL,NULL),('J-60','Storage Network',NULL,'Irwan','2021-09-16',NULL,NULL),('J-61','Video Conference','VC','Irwan Pratama P','2022-05-09','Irwan Pratama P','2022-05-09'),('J-62','TELEVISI DIGITAL','TV','Hardiansyah','2022-05-24','Hardiansyah','2022-05-24'),('J-63','TEMPAT TIDUR','KT','Hardiansyah','2022-06-04','Hardiansyah','2023-02-21'),('J-64','Water Heater','WH','Hardiansyah','2022-06-04',NULL,NULL),('J-65','RAK PRODUK','RP','Hardiansyah','2023-01-07',NULL,NULL),('J-66','Mesin Potong Rumput Dorong','RD','Hardiansyah','2023-03-01',NULL,NULL),('J-67','Pesawat Telepon','PT','Hardiansyah','2023-03-04','Hardiansyah','2023-03-04'),('J-68','MEJA MINI SOCCER','MS','Hardiansyah','2023-03-04',NULL,NULL),('J-69','MEJA PIMPONG','MT','Hardiansyah','2023-03-04',NULL,NULL),('J-70','AQUARIUM','AQ','Hardiansyah','2023-03-07',NULL,NULL),('J-71','Alat Pengusir Nyamuk','PN','Hardiansyah','2023-03-18','Hardiansyah','2023-03-29'),('J-72','VACUUM CLEANER','VA','Hardiansyah','2023-08-12','Hardiansyah','2023-08-12'),('J-73','Sepeda','SPD','Hardiansyah','2023-08-19',NULL,NULL),('J-74','Mesin Cuci Baju','MC','Hardiansyah','2023-08-23',NULL,NULL);
/*!40000 ALTER TABLE `biss_jenisbarang` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2024-12-29 19:27:47

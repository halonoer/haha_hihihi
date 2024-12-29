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
-- Table structure for table `biss_grupruang`
--

DROP TABLE IF EXISTS `biss_grupruang`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `biss_grupruang` (
  `kdgrup` varchar(5) NOT NULL,
  `namagrupruang` varchar(200) DEFAULT NULL,
  `created_by` varchar(100) DEFAULT NULL,
  `created_date` date DEFAULT NULL,
  `last_update_by` varchar(100) DEFAULT NULL,
  `last_update_date` date DEFAULT NULL,
  PRIMARY KEY (`kdgrup`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `biss_grupruang`
--

LOCK TABLES `biss_grupruang` WRITE;
/*!40000 ALTER TABLE `biss_grupruang` DISABLE KEYS */;
INSERT INTO `biss_grupruang` VALUES ('GR-00','-','Developer','2014-04-17',NULL,NULL),('GR-01','Kantor Pusat Lantai 1','Anis Eka','2013-10-11',NULL,NULL),('GR-02','Kantor Pusat Lantai 2','Anis Eka','2013-10-11',NULL,NULL),('GR-03','Kantor Pusat Lantai 3','Anis Eka','2013-10-11',NULL,NULL),('GR-04','Ruang Mushola Pabrik 1','Anis Eka','2013-10-11','Hardiansyah','2023-03-18'),('GR-05','RR Utama 1; RR UTAMA 2;  MANAJER UMUM ; pemsusdir','Anis Eka','2013-10-11','Hardiansyah','2024-03-14'),('GR-06','Area Parkir Belakang','Anis Eka','2013-10-11',NULL,NULL),('GR-07','Area Parkir Depan','Anis Eka','2013-10-11',NULL,NULL),('GR-08','Kantin','Anis Eka','2013-10-11','Hardiansyah','2023-03-20'),('GR-09','Kantor Lab. Pabrik 1 Lantai 1','Anis Eka','2013-10-11','Anis Eka','2013-10-11'),('GR-10','Kantor Lab. Pabrik 1 Lantai 2','Anis Eka','2013-10-11',NULL,NULL),('GR-11','Kantor KWK, Gudang SDM, Gudang Keuangan, kepala satpam dan alat band','Anis Eka','2013-10-11','Hardiansyah','2023-07-22'),('GR-12','Area Gudang Material 1 Pabrik 1','Anis Eka','2013-10-11','Hardiansyah','2023-02-25'),('GR-13','Area Gudang Material 2 Pabrik 1','Anis Eka','2013-10-11','Hardiansyah','2022-02-19'),('GR-14','Area Gudang Material 3 Pabrik 1','Anis Eka','2013-10-11','Hardiansyah','2023-02-25'),('GR-15','WP Plan','Anis Eka','2013-10-11','Hardiansyah','2023-03-30'),('GR-16','Flowable Plant','Anis Eka','2013-10-11',NULL,NULL),('GR-17','Produksi Cair 2 Plant','Anis Eka','2013-10-11',NULL,NULL),('GR-18','Produksi Cair 1 Plant','Anis Eka','2013-10-11',NULL,NULL),('GR-19','Butiran Plant','Anis Eka','2013-10-11',NULL,NULL),('GR-20','Petrovita Plant','Anis Eka','2013-10-11',NULL,NULL),('GR-21','Petrokum / Rodentisida Plant','Anis Eka','2013-10-11',NULL,NULL),('GR-22','Cair 3 Plant','Anis Eka','2013-10-11',NULL,NULL),('GR-23','Ruang Mushola Produksi','Anis Eka','2013-10-11','Hardiansyah','2023-03-18'),('GR-24','Area Gudang Material 4 Pabrik 1','Anis Eka','2013-10-11','Hardiansyah','2023-02-25'),('GR-25','Area Gudang Material 6 Pabrik 1','Anis Eka','2013-10-11','Hardiansyah','2023-02-25'),('GR-26','Hartek & Eng. Pabrik 1 Lantai 1','Anis Eka','2013-10-11',NULL,NULL),('GR-27','Hartek & Eng. Pabrik 1 Lantai 2','Anis Eka','2013-10-11',NULL,NULL),('GR-28','TPS B3','Anis Eka','2013-10-11',NULL,NULL),('GR-29','Incenerator','Anis Eka','2013-10-11',NULL,NULL),('GR-30','Genset','Anis Eka','2013-10-11',NULL,NULL),('GR-31','Area Gudang Material 5 Pabrik 1','Anis Eka','2013-10-11','Hardiansyah','2023-02-25'),('GR-32','Gudang Jadi KIG FB 8-9','Anis Eka','2013-10-11',NULL,NULL),('GR-34','Gudang Jadi KIG FB 23','Anis Eka','2013-10-11','Anis Eka','2013-10-11'),('GR-37','Kantor Riset Petrokimia Kayaku','Anis Eka','2013-10-11',NULL,NULL),('GR-38','Pabrik 2 KIG','Anis Eka','2013-10-11',NULL,NULL),('GR-39','Ruang Kantor Pabrik 2 Lantai 1','Anis Eka','2013-10-11',NULL,NULL),('GR-40','Ruang Kantor Pabrik 2 Lantai 2','Anis Eka','2013-10-11',NULL,NULL),('GR-41','Pestisida 2 Plant','Anis Eka','2013-10-11',NULL,NULL),('GR-42','Hartek Pabrik 2','Anis Eka','2013-10-11',NULL,NULL),('GR-43','Gudang Material Pupuk Hayati','Anis Eka','2013-10-11',NULL,NULL),('GR-44','Pupuk Hayati Plant','Anis Eka','2013-10-11',NULL,NULL),('GR-45','PLAN HAYATI PABRIK 2','Anis Eka','2013-10-11','Hardiansyah','2023-03-30'),('GR-46','Gudang Perkakas','Anis Eka','2013-10-21',NULL,NULL),('GR-47','Kantor PIPPK dan Quality','Developer','2014-04-19','Hardiansyah','2022-04-09'),('GR-48','Gedung Graha Petrokimia','Developer','2014-04-19',NULL,NULL),('GR-49','Area Gudang Material Pabrik 2','Developer','2014-04-19','Hardiansyah','2023-02-25'),('GR-50','Regional Manager Wilayah I','Developer','2015-05-07','Hardiansyah','2022-09-07'),('GR-51','Regional Manager Wilayah II','Developer','2015-05-07','Hardiansyah','2022-09-07'),('GR-52','POS SATPAM','Syaichudin','2018-01-15','Hardiansyah','2023-03-18'),('GR-53','Area Gudang Jadi Pabrik III','Syaichudin','2018-01-15',NULL,NULL),('GR-54','AREA PRODUKSI PABRIK 3','Syaichudin','2018-01-15','Hardiansyah','2023-02-06'),('GR-55','Area Gudang Material Pabrik 3','Syaichudin','2018-01-15','Hardiansyah','2022-02-16'),('GR-56','Gedung Riset ','Irwan','2018-08-23','Hardiansyah','2022-02-16'),('GR-57','RUANG HARTEK PABRIK 3','Hardiansyah','2022-02-19',NULL,NULL),('GR-58','AREA PRODUKSI PABRIK 1','Hardiansyah','2022-02-19','Hardiansyah','2023-02-06'),('GR-61','shower thl, kantor SPI , ISM dan TI lantai 1','Hardiansyah','2022-04-09','Hardiansyah','2023-10-07'),('GR-62','kantor SPI , ISM dan TI lantai 2','Hardiansyah','2022-04-09',NULL,NULL),('GR-63','Quality Pabrik 1','Hardiansyah','2022-04-12',NULL,NULL),('GR-64','Quality Pabrik 2','Hardiansyah','2022-04-12',NULL,NULL),('GR-65','Quality Pabrik 3','Hardiansyah','2022-04-12',NULL,NULL),('GR-66','Ruang Rapat Marketing','Hardiansyah','2022-04-23',NULL,NULL),('GR-67','Kantor Perjaka Jakarta','Hardiansyah','2022-05-30',NULL,NULL),('GR-68','PEKAMART','Hardiansyah','2022-07-22',NULL,NULL),('GR-69','Regional Manager Wilayah III','Hardiansyah','2022-09-07',NULL,NULL),('GR-70','Regional Manager Wilayah IV','Hardiansyah','2022-09-07',NULL,NULL),('GR-71','Perkantoran Pabrik 3, Riset , Quality Ruang Rapat, Masjid','Hardiansyah','2022-10-06','Hardiansyah','2023-03-13'),('GR-72','kosong','Hardiansyah','2022-11-26','Hardiansyah','2023-02-25'),('GR-73','AREA PRODUKSI PABRIK 2','Hardiansyah','2023-02-06',NULL,NULL),('GR-74','IPAL','Hardiansyah','2023-02-10',NULL,NULL),('GR-75','AREA GUDANG JADI PABRIK 2','Hardiansyah','2023-03-16','Hardiansyah','2023-03-16'),('GR-76','HALAMAN PABRIK 2','Hardiansyah','2023-03-20',NULL,NULL),('GR-77','HALAMAN PABRIK 3','Hardiansyah','2023-03-20',NULL,NULL),('GR-78','HALAMAN PABRIK 1','Hardiansyah','2023-03-20',NULL,NULL),('GR-79','Perkantoran produksi, LK3, hartek pabrik 3 dan shower produksi','Hardiansyah','2023-07-22','Hardiansyah','2023-08-19'),('GR-80','Gudang Riset Pabrik 3','Hardiansyah','2024-02-13',NULL,NULL),('GR-81','Area Perkebunan Pabrik 3','Hardiansyah','2024-02-13',NULL,NULL);
/*!40000 ALTER TABLE `biss_grupruang` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2024-12-29 19:27:43

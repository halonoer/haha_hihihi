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
-- Temporary view structure for view `vu_inventaris`
--

DROP TABLE IF EXISTS `vu_inventaris`;
/*!50001 DROP VIEW IF EXISTS `vu_inventaris`*/;
SET @saved_cs_client     = @@character_set_client;
SET character_set_client = utf8;
/*!50001 CREATE VIEW `vu_inventaris` AS SELECT 
 1 AS `kdbarang`,
 1 AS `kdjenis`,
 1 AS `namajns`,
 1 AS `prefix`,
 1 AS `noinventaris`,
 1 AS `namabrg`,
 1 AS `nomerseri`,
 1 AS `motherboard`,
 1 AS `processor`,
 1 AS `ram`,
 1 AS `harddisk`,
 1 AS `created_by`,
 1 AS `created_date`,
 1 AS `last_update_by`,
 1 AS `last_update_date`,
 1 AS `thnbeli`,
 1 AS `kondisi`,
 1 AS `ketspesifikasi`,
 1 AS `nmuser`,
 1 AS `lancard`,
 1 AS `kdunit`,
 1 AS `DEPARTMENT_CODE`,
 1 AS `DEPARTMENT_NAME`,
 1 AS `tempat`,
 1 AS `kdruangan`,
 1 AS `namaruangan`,
 1 AS `kdgrup`,
 1 AS `namagrupruang`,
 1 AS `pengelola`,
 1 AS `foto`*/;
SET character_set_client = @saved_cs_client;

--
-- Temporary view structure for view `vu_ruangan`
--

DROP TABLE IF EXISTS `vu_ruangan`;
/*!50001 DROP VIEW IF EXISTS `vu_ruangan`*/;
SET @saved_cs_client     = @@character_set_client;
SET character_set_client = utf8;
/*!50001 CREATE VIEW `vu_ruangan` AS SELECT 
 1 AS `kdruangan`,
 1 AS `namaruangan`,
 1 AS `kdgrup`,
 1 AS `namagrupruang`,
 1 AS `created_by`,
 1 AS `created_date`,
 1 AS `last_update_by`,
 1 AS `last_update_date`,
 1 AS `keterangan`,
 1 AS `unit_id`,
 1 AS `DEPARTMENT_CODE`,
 1 AS `DEPARTMENT_NAME`*/;
SET character_set_client = @saved_cs_client;

--
-- Final view structure for view `vu_inventaris`
--

/*!50001 DROP VIEW IF EXISTS `vu_inventaris`*/;
/*!50001 SET @saved_cs_client          = @@character_set_client */;
/*!50001 SET @saved_cs_results         = @@character_set_results */;
/*!50001 SET @saved_col_connection     = @@collation_connection */;
/*!50001 SET character_set_client      = utf8 */;
/*!50001 SET character_set_results     = utf8 */;
/*!50001 SET collation_connection      = utf8_general_ci */;
/*!50001 CREATE ALGORITHM=UNDEFINED */
/*!50013 DEFINER=`root`@`localhost` SQL SECURITY DEFINER */
/*!50001 VIEW `vu_inventaris` AS select `i`.`kdbarang` AS `kdbarang`,`i`.`kdjenis` AS `kdjenis`,`j`.`namajns` AS `namajns`,`j`.`prefix` AS `prefix`,`i`.`noinventaris` AS `noinventaris`,`i`.`namabrg` AS `namabrg`,`i`.`nomerseri` AS `nomerseri`,`i`.`motherboard` AS `motherboard`,`i`.`processor` AS `processor`,`i`.`ram` AS `ram`,`i`.`harddisk` AS `harddisk`,`i`.`created_by` AS `created_by`,`i`.`created_date` AS `created_date`,`i`.`last_update_by` AS `last_update_by`,`i`.`last_update_date` AS `last_update_date`,`i`.`thnbeli` AS `thnbeli`,`i`.`kondisi` AS `kondisi`,`i`.`ketspesifikasi` AS `ketspesifikasi`,`i`.`nmuser` AS `nmuser`,`i`.`lancard` AS `lancard`,`i`.`kdunit` AS `kdunit`,`u`.`DEPARTMENT_CODE` AS `DEPARTMENT_CODE`,`u`.`DEPARTMENT_NAME` AS `DEPARTMENT_NAME`,`i`.`tempat` AS `tempat`,`r`.`kdruangan` AS `kdruangan`,`r`.`namaruangan` AS `namaruangan`,`r`.`kdgrup` AS `kdgrup`,`g`.`namagrupruang` AS `namagrupruang`,`i`.`pengelola` AS `pengelola`,`i`.`foto` AS `foto` from ((((`biss_inventaris` `i` join `biss_jenisbarang` `j` on((`i`.`kdjenis` = `j`.`kdjenis`))) left join `department` `u` on((`i`.`kdunit` = `u`.`DEPARTMENT_ID`))) join `biss_ruangan` `r` on((`i`.`kdruangan` = `r`.`kdruangan`))) join `biss_grupruang` `g` on((`r`.`kdgrup` = `g`.`kdgrup`))) */;
/*!50001 SET character_set_client      = @saved_cs_client */;
/*!50001 SET character_set_results     = @saved_cs_results */;
/*!50001 SET collation_connection      = @saved_col_connection */;

--
-- Final view structure for view `vu_ruangan`
--

/*!50001 DROP VIEW IF EXISTS `vu_ruangan`*/;
/*!50001 SET @saved_cs_client          = @@character_set_client */;
/*!50001 SET @saved_cs_results         = @@character_set_results */;
/*!50001 SET @saved_col_connection     = @@collation_connection */;
/*!50001 SET character_set_client      = utf8 */;
/*!50001 SET character_set_results     = utf8 */;
/*!50001 SET collation_connection      = utf8_general_ci */;
/*!50001 CREATE ALGORITHM=UNDEFINED */
/*!50013 DEFINER=`root`@`localhost` SQL SECURITY DEFINER */
/*!50001 VIEW `vu_ruangan` AS select `r`.`kdruangan` AS `kdruangan`,`r`.`namaruangan` AS `namaruangan`,`r`.`kdgrup` AS `kdgrup`,`g`.`namagrupruang` AS `namagrupruang`,`r`.`created_by` AS `created_by`,`r`.`created_date` AS `created_date`,`r`.`last_update_by` AS `last_update_by`,`r`.`last_update_date` AS `last_update_date`,`r`.`keterangan` AS `keterangan`,`r`.`unit_id` AS `unit_id`,`d`.`DEPARTMENT_CODE` AS `DEPARTMENT_CODE`,`d`.`DEPARTMENT_NAME` AS `DEPARTMENT_NAME` from ((`biss_ruangan` `r` join `biss_grupruang` `g` on((`r`.`kdgrup` = `g`.`kdgrup`))) left join `department` `d` on((`r`.`unit_id` = `d`.`DEPARTMENT_ID`))) */;
/*!50001 SET character_set_client      = @saved_cs_client */;
/*!50001 SET character_set_results     = @saved_cs_results */;
/*!50001 SET collation_connection      = @saved_col_connection */;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2024-12-29 19:27:56

-- MySQL dump 10.13  Distrib 5.7.17, for Win64 (x86_64)
--
-- Host: 127.0.0.1    Database: com_wiseape_tasklog
-- ------------------------------------------------------
-- Server version	5.7.18-log

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
-- Table structure for table `tasklog`
--

DROP TABLE IF EXISTS `tasklog`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `tasklog` (
  `IdTaskLog` int(11) NOT NULL AUTO_INCREMENT,
  `TaskTitle1` varchar(225) DEFAULT NULL,
  `TaskTitle2` varchar(225) DEFAULT NULL,
  `TaskTitle3` varchar(225) DEFAULT NULL,
  `TaskTitle4` varchar(225) DEFAULT NULL,
  `TaskDate` datetime DEFAULT NULL,
  PRIMARY KEY (`IdTaskLog`)
) ENGINE=InnoDB AUTO_INCREMENT=15 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tasklog`
--

LOCK TABLES `tasklog` WRITE;
/*!40000 ALTER TABLE `tasklog` DISABLE KEYS */;
INSERT INTO `tasklog` VALUES (1,'Weekly Meeting','Microsoft Project Presentation Meeting','','','2017-07-24 04:40:36'),(2,'E-Faktur Meeting','Meeting Connected Salesman','','','2017-07-25 12:00:07'),(3,'SCIS Code Review','SPAR Claim Code Review','Update Trakindo Framework','','2017-07-26 12:00:07'),(4,'Meeting Process Maker','','','','2017-07-27 12:00:55'),(5,'Fixing Stock Request Marcomm Hangfire','','','','2017-07-20 12:00:19'),(6,'Fixing Stock Request Marcomm','Fixing e-Faktur','','','2017-07-21 12:00:19'),(7,'Meeting HLSD WWWP','','','','2017-07-17 12:00:24'),(8,'Webservice untuk Process Maker','','','','2017-07-28 12:00:17'),(9,'Weekly meeting','Webservice process maker','','','2017-07-31 12:00:57'),(10,'Stock Request Scheduler Build Release and Test','Code Review SCC','','','2017-08-01 12:00:55'),(11,'Meeting HLSD Sulawesi lt 16','','','','2017-08-03 12:00:27'),(12,'Code Review SCC application, Review TD','Marcomm Scheduler QA','','','2017-08-04 12:00:53'),(13,'Fixing Marcomm Schedulre','Innovation TD Review','','','2017-08-07 12:00:25'),(14,'EOR Project Timeline, Deployment Marcomm Scheduler','Weekly Meeting','','','2017-08-08 12:00:02');
/*!40000 ALTER TABLE `tasklog` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2017-08-09  8:54:07

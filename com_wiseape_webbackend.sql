-- MySQL dump 10.13  Distrib 5.7.17, for Win64 (x86_64)
--
-- Host: 127.0.0.1    Database: com_wiseape_webbackend
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
-- Table structure for table `gallery`
--

DROP TABLE IF EXISTS `gallery`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `gallery` (
  `IdGallery` bigint(20) NOT NULL AUTO_INCREMENT,
  `GalleryCaption` longtext,
  `ImageDate` datetime(6) DEFAULT NULL,
  `ImageUrl` longtext,
  `GalleryAlbumId` int(11) DEFAULT NULL,
  PRIMARY KEY (`IdGallery`)
) ENGINE=InnoDB AUTO_INCREMENT=480 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `gallery`
--

LOCK TABLES `gallery` WRITE;
/*!40000 ALTER TABLE `gallery` DISABLE KEYS */;
INSERT INTO `gallery` VALUES (78,'','2017-06-06 00:00:00.000000','N0KhLgaQeRwulcGMIztU.jpg',5),(79,'','2017-06-06 00:00:00.000000','w7pW9iSXQMpxxbn0z0c3.jpg',5),(80,'','2017-06-06 00:00:00.000000','tXUnsYVwQ4N05LfQMVKJ.jpg',5),(81,'','2017-06-06 00:00:00.000000','2DkPvIIlw2pAZadYyK6I.jpg',5),(82,'','2017-06-06 00:00:00.000000','LnbzP1Uj7dfO0b8YzzB2.jpg',5),(86,'','2017-06-07 00:00:00.000000','qNQovbMwcbRc9OHsZKYN.jpg',6),(87,'','2017-06-07 00:00:00.000000','Qw6xTtGz4FsuxBrMUWPd.jpg',6),(88,'','2017-06-07 00:00:00.000000','wBHw2uPLVkHW8wkHUeEj.jpg',6),(89,'','2017-06-07 00:00:00.000000','biwXt1584BZTFFXYLqpr.jpg',7),(90,'','2017-06-07 00:00:00.000000','FN4IVwGcYkTRNrDiq0sJ.jpg',7),(91,'','2017-06-07 00:00:00.000000','KU1uuozF7wihvvCwdXTg.jpg',3),(92,'','2017-06-07 00:00:00.000000','Hh0RrJauuEyWEw4pylmY.jpg',3),(96,'','2017-06-07 00:00:00.000000','uwYqkFUE1MDtJsNPEVpV.jpg',8),(97,'','2017-06-07 00:00:00.000000','PO8S2yVtdjULLWRavdMZ.jpg',8),(98,'','2017-06-07 00:00:00.000000','64whmDqgV3OMpA8eN3ts.jpg',8),(99,'','2017-06-07 00:00:00.000000','HXV1qDTL5LZSub4h8Bk4.jpg',8),(100,'','2017-06-07 00:00:00.000000','JOjCLbgZiLNcM0fX9XGd.jpg',8),(101,'','2017-06-07 00:00:00.000000','FpjYWOnEWH6UXwErj8H1.jpg',2),(102,'','2017-06-07 00:00:00.000000','r0bwhi32KgAUyFenRhYB.jpg',2),(103,'','2017-06-07 00:00:00.000000','cs8o4GZRPJJKjgtCGO0P.jpg',2),(104,'','2017-06-07 00:00:00.000000','j7OzFNkhezZ5z3FjzRlV.jpg',2),(105,'','2017-06-07 00:00:00.000000','fMMd7B71STfBJatAZhgj.jpg',9),(106,'','2017-06-07 00:00:00.000000','uLpygIP8e9upTD6gcmGX.jpg',9),(107,'','2017-06-07 00:00:00.000000','5itoDFiOcLxtIJvAjjHm.png',9),(108,'','2017-06-07 00:00:00.000000','hzjoUkKxkDSjDbWJGSX6.jpg',4),(109,'','2017-06-07 00:00:00.000000','P6KP0Hsv0fjMw1bo3lrj.jpg',4),(110,'','2017-06-07 00:00:00.000000','c29BtGFX16G7iPMKwsMB.jpg',10),(111,'','2017-06-07 00:00:00.000000','N6cmFy3S3f1USb8xYv3O.JPG',11),(112,'','2017-06-07 00:00:00.000000','f0mXwJE28l8KKv6wRLS9.JPG',12),(120,'','2017-06-08 00:00:00.000000','KGhZPy69vomWjag6DPyT.JPG',16),(121,'','2017-06-08 00:00:00.000000','YowYuAfwf7PMlpnl6EO6.JPG',17),(123,'','2017-06-08 00:00:00.000000','yHERT4dUaz2DMtH5VClt.JPG',19),(125,'','2017-06-08 00:00:00.000000','TDSlg4xBoJ9eEfIGnvXH.JPG',21),(129,'','2017-06-08 00:00:00.000000','UorT9cdKhEHV4FpoShHx.JPG',25),(144,'','2017-06-08 00:00:00.000000','WolBWI87GE3viXABBfXl.JPG',26),(145,'','2017-06-08 00:00:00.000000','KxVKi9aJ0OBvlAaCFKvI.JPG',26),(146,'','2017-06-08 00:00:00.000000','W0Y0P3muWsqTzxHAb9Gb.JPG',26),(147,'','2017-06-08 00:00:00.000000','FeyEAyBTyfwAunhDz3Jz.JPG',26),(298,'','2017-06-08 00:00:00.000000','2g98YBlO5DKCBx7co9Op.jpg',23),(299,'','2017-06-08 00:00:00.000000','eRJ2oOjeqr1NcSl5JDC8.jpg',23),(300,'','2017-06-08 00:00:00.000000','hNeCCiSiPke3YJ2toV7n.jpg',23),(301,'','2017-06-08 00:00:00.000000','tVKJRh3JsxZcgGKgfdt9.jpg',23),(302,'','2017-06-08 00:00:00.000000','PbGGNIx7ynA3DebrJdVL.png',27),(303,'','2017-06-08 00:00:00.000000','YuYeJCyfFXUrpG9gf1Lr.jpeg',28),(305,'','2017-06-08 00:00:00.000000','c1SVeYhoyqXi7vuB44L9.jpeg',30),(306,'','2017-06-08 00:00:00.000000','fFAEgcst1RodL3YpyEQZ.png',31),(307,'','2017-06-09 00:00:00.000000','m9mgc2YIbC8K62BUH6L9.jpg',18),(308,'','2017-06-09 00:00:00.000000','JSCDsUwTmkQm6FcwC2d6.jpg',18),(309,'','2017-06-09 00:00:00.000000','ysmJ4TtWHLCnsQotr6Es.jpg',18),(310,'','2017-06-09 00:00:00.000000','Bu1n96uj1ZOjmJkMiNR9.jpg',18),(311,'','2017-06-09 00:00:00.000000','N9ZCulRR5YgktYPOpj6g.jpg',18),(312,'','2017-06-09 00:00:00.000000','1pvvu0jInQbGDtVpeWpL.jpg',18),(313,'','2017-06-09 00:00:00.000000','ljmx1rtYYHy0vxc5M7hV.jpg',18),(314,'','2017-06-09 00:00:00.000000','A6f1QXkZe7Kgv1FzUU8k.jpg',18),(315,'','2017-06-09 00:00:00.000000','BJF5ee2djlrzkC3Z4pBJ.jpg',18),(316,'','2017-06-09 00:00:00.000000','mmjmzJmKMMOKeTThfoze.JPG',18),(317,'','2017-06-09 00:00:00.000000','7fJZ2sCcUp3XA5bepzSH.jpg',15),(318,'','2017-06-09 00:00:00.000000','Ca6DiHwjrLPvLS6pE0mi.jpg',15),(319,'','2017-06-09 00:00:00.000000','iMJJ6eBhcfaOn0850P6w.jpg',15),(320,'','2017-06-09 00:00:00.000000','fbfvCq0BhZE9eW4l1FZU.jpg',15),(321,'','2017-06-09 00:00:00.000000','YFVt7Xq3UP2yYHo6TLdb.jpg',15),(322,'','2017-06-09 00:00:00.000000','iTvommLIHRkGmbVPldql.jpg',15),(333,'','2017-06-09 00:00:00.000000','KyBHLPyJAnfrLkDk0zh9.jpg',22),(334,'','2017-06-09 00:00:00.000000','1wKe8bFC0KbJwnJ0rXGx.jpg',22),(335,'','2017-06-09 00:00:00.000000','hRGZtddO7B41UNnYGR9d.jpg',22),(336,'','2017-06-09 00:00:00.000000','xPfia1Ehar9JkyugVNNP.jpg',22),(337,'','2017-06-09 00:00:00.000000','Rhk8f71Ge11uimGsNGjG.jpg',22),(338,'','2017-06-09 00:00:00.000000','1xbqMEUPTxjIXtE8WkMf.jpg',22),(339,'','2017-06-09 00:00:00.000000','btgfu40SWz1VTeV6QBl7.jpg',20),(340,'','2017-06-09 00:00:00.000000','d2Xm7IpywN6MjvvXoGHS.jpg',20),(341,'','2017-06-09 00:00:00.000000','oJIpYjzLo0VHWftQDccC.jpg',20),(342,'','2017-06-09 00:00:00.000000','k4ehW36A58BtnkUrSw0Q.jpg',20),(356,'','2017-06-09 00:00:00.000000','WXQrh2XxWjbetnPB7BVg.JPG',13),(357,'','2017-06-09 00:00:00.000000','QDH4ACerPH21aDmdXQeL.JPG',13),(358,'','2017-06-09 00:00:00.000000','vVSLt8uVeyTVUpkRCY9K.JPG',13),(359,'','2017-06-09 00:00:00.000000','NceTBT2BXDiyFo3h4Pni.JPG',13),(360,'','2017-06-09 00:00:00.000000','coEWRygcGxAGDCDrYdLC.JPG',13),(361,'','2017-06-09 00:00:00.000000','ON1qKuXvLw88l9lyFDdp.JPG',13),(367,'','2017-06-09 00:00:00.000000','7ycylqNe46NIF4g7X6Oz.jpg',14),(368,'','2017-06-09 00:00:00.000000','AHWCDDCAYhGu2dfS3Av1.jpg',14),(369,'','2017-06-09 00:00:00.000000','Cgy776lx9I1TBnAMUqpH.jpg',14),(370,'','2017-06-09 00:00:00.000000','dUNs1azoL63nyOho2zb3.jpg',14),(371,'','2017-06-09 00:00:00.000000','9kEf36ylAbPKPBiBhomH.jpg',14),(372,'','2017-06-09 00:00:00.000000','fS2eNbSEAnO07KEWVqdX.jpg',14),(374,'','2017-06-09 00:00:00.000000','vy7LQ7EwzRHSmnug3Qui.jpg',24),(375,'','2017-06-09 00:00:00.000000','AmntuKdxkNfF6PuKbtOF.jpg',24),(376,'','2017-06-09 00:00:00.000000','rFRnSOsKyZaJJCEQnAUi.jpg',24),(377,'','2017-06-09 00:00:00.000000','hJZvxD4LBmA1YfIovLez.jpg',24),(378,'','2017-06-10 00:00:00.000000','zEk5gNfimnUyftv3Wc9y.jpg',32),(379,'','2017-06-11 00:00:00.000000','ZX1MJAhanvrQOj6zT5N4.jpg',33),(380,'','2017-06-11 00:00:00.000000','n9pEQcb4ZQMzWpcwE0Bi.jpg',34),(381,'','2017-06-11 00:00:00.000000','2uTdsrA5jjrosjPA8uWQ.jpg',34),(387,'','2017-06-11 00:00:00.000000','n9pEQcb4ZQMzWpcwE0Bi.jpg',35),(388,'','2017-06-11 00:00:00.000000','2uTdsrA5jjrosjPA8uWQ.jpg',35),(389,'','2017-06-11 00:00:00.000000','dsQDGvkLZjDvM2oqtagN.jpg',35),(390,'','2017-06-11 00:00:00.000000','zHUnvPVBHn89CeKMlcKQ.jpg',35),(391,'','2017-06-11 00:00:00.000000','nRvL2uyvK8gn1SM1k8GW.jpg',35),(392,'','2017-06-11 00:00:00.000000','JWv8akjYJW2RkahXmpkC.jpg',35),(393,'','2017-06-11 00:00:00.000000','gnMQ68v6g75fIXXA2tUj.jpg',35),(394,'','2017-06-11 00:00:00.000000','PXVwElZ8kJZC4GEGhvqq.jpg',36),(395,'','2017-06-11 00:00:00.000000','SgwsdAUmzJMUDr8JTaO0.jpg',36),(401,'','2017-06-11 00:00:00.000000','PXVwElZ8kJZC4GEGhvqq.jpg',37),(402,'','2017-06-11 00:00:00.000000','SgwsdAUmzJMUDr8JTaO0.jpg',37),(403,'','2017-06-11 00:00:00.000000','wnbcy1oDzgkl9XKt0riL.jpg',37),(404,'','2017-06-11 00:00:00.000000','DoMDjO7yBxAZssHVF42u.jpg',37),(405,'','2017-06-11 00:00:00.000000','OjeCFRBZ9P8Gvyyd71Zb.jpg',37),(406,'','2017-06-11 00:00:00.000000','vl66hJPeMIz2rf4iUj7P.jpg',37),(407,'','2017-06-11 00:00:00.000000','1WdaXLYRuJDFOfhBVkAo.jpg',37),(415,'','2017-06-11 00:00:00.000000','oRJXl3QaNYzDksefZoXk.jpg',38),(416,'','2017-06-11 00:00:00.000000','c9G9v6G8nTSK0TFrfhZK.jpg',38),(417,'','2017-06-11 00:00:00.000000','ALvVe6C0Q8YR9kUjtl7O.jpg',38),(418,'','2017-06-11 00:00:00.000000','XKVg8JH2LkVc4TZDGSql.jpg',38),(419,'','2017-06-11 00:00:00.000000','A4uwiDvKtbZuGIA6dhJt.jpg',38),(420,'','2017-06-11 00:00:00.000000','aB3yvwrxHoj1FbCewsvW.jpg',38),(421,'','2017-06-11 00:00:00.000000','aRCisjM2N1E0x1wy8lnv.jpg',38),(422,'','2017-06-11 00:00:00.000000','OjPhFO2r5wElUSl6JGP4.jpg',38),(423,'','2017-06-11 00:00:00.000000','CWbOD1jXuS3IEIgG967f.jpeg',39),(424,'','2017-06-11 00:00:00.000000','s3KdHw4gYtYLCWBtdJdy.jpeg',39),(425,'','2017-06-11 00:00:00.000000','3SW7gN1jKR1ElWmv5qnr.jpeg',39),(426,'','2017-06-11 00:00:00.000000','k6yjXqUhVYdBcuiqX15w.jpeg',39),(427,'','2017-06-11 00:00:00.000000','dJiu5FKZK0I1x4NbY5GG.jpeg',39),(428,'','2017-06-11 00:00:00.000000','RARIQ6Acn4DAdQpKGNk0.jpg',39),(429,'','2017-06-11 00:00:00.000000','H101iL9FU8jNAVRLgPxo.jpeg',29),(468,'','2017-06-11 00:00:00.000000','SmSg5ZdAKkFUbBGZpR8I.jpg',40),(469,'','2017-06-11 00:00:00.000000','PP0O5uNKzr9Xh4EjczLD.jpg',40),(470,'','2017-06-11 00:00:00.000000','I2HaCmlubOcfCwc6d6r4.jpg',40),(471,'','2017-06-11 00:00:00.000000','BIQ5B0AZO3urUenkcvNY.jpg',40),(472,'','2017-06-11 00:00:00.000000','SSzwgvtR1FBPyHURdqkL.jpg',40),(473,'','2017-06-11 00:00:00.000000','rMdlfdboXmY6zZVioJsi.jpg',40),(474,'','2017-06-11 00:00:00.000000','QBT5eL0isXxbWY9nOJJz.jpg',40),(475,'','2017-06-17 00:00:00.000000','EQqzN4B0LzJDXgbsK0XK.JPG',41),(476,'','2017-06-17 00:00:00.000000','PnGRlwgijEhOGVMOHDNR.jpg',41),(477,'','2017-06-17 00:00:00.000000','GP8WbDoequTcdSaWp2tY.jpg',41),(478,'','2017-06-17 00:00:00.000000','zLWMRyG1APpeyxjVs34I.jpg',41),(479,'','2017-06-17 00:00:00.000000','ak1GFViH644fMHaFIqZp.jpg',41);
/*!40000 ALTER TABLE `gallery` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `galleryalbum`
--

DROP TABLE IF EXISTS `galleryalbum`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `galleryalbum` (
  `IdGalleryAlbum` int(11) NOT NULL AUTO_INCREMENT,
  `AlbumTitle` varchar(250) DEFAULT NULL,
  `AlbumDescription` longtext,
  `AlbumCreatedDate` datetime(6) DEFAULT NULL,
  `AlbumImage` text NOT NULL,
  `Tag` varchar(250) NOT NULL,
  PRIMARY KEY (`IdGalleryAlbum`)
) ENGINE=InnoDB AUTO_INCREMENT=41 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `galleryalbum`
--

LOCK TABLES `galleryalbum` WRITE;
/*!40000 ALTER TABLE `galleryalbum` DISABLE KEYS */;
INSERT INTO `galleryalbum` VALUES (13,'INIFD X Scarf Magazine Workshop','Album 4','2016-11-05 06:30:56.000000','OT75xX6A2lNPeCmfeDVI.JPG','Gallery Album'),(14,'Media Workshop: Skirt','Album 5','2016-11-12 09:45:47.000000','QXnfwR87roUsJAFfBhJc.jpg','Gallery Album'),(15,'Fashion Workshop-Making Your Own Culottes','Album 6','2016-10-01 10:25:47.000000','38RS3GhkV30xfAlOtedQ.jpg','Gallery Album'),(18,'Open House (13th August 2016)','Album 9','2016-08-13 10:30:47.000000','YZPux5gUWvbZ7DzkrLMM.jpg','Gallery Album'),(20,'Workshop with Firrina Sinatrya','Album 11','2016-10-29 10:30:37.000000','l7ESYZIjZkTplXkaU0iC.jpg','Gallery Album'),(22,'Fashion Workshop at Jakarta Intercultural School','Album 13','2016-10-31 01:00:24.000000','RW2oINZPULWpfvs2bTbc.jpg','Gallery Album'),(23,'INIFD Launching (20th June 2016)','Pertama','2016-06-20 09:00:48.000000','ip5IsEmNkNzEXwMb0KGk.jpg','Gallery Album'),(24,'Media Workshop: Vest','Album 15','2016-11-19 09:55:15.000000','yhKniAE1PiLE3oY0C8qS.jpg','Gallery Album'),(28,'Media Coverage 1','Media Coverage 1','2017-06-08 06:30:59.000000','OPy6Xr1doNqNXc2lp26R.jpeg','Media Coverage'),(29,'Media Coverage 2','Media Coverage 2','2017-06-15 10:25:57.000000','NqX6wyVjQ7FeEU9ybJbV.jpeg','Media Coverage'),(30,'Media Coverage 3','Media Coverage 3','2017-06-08 06:30:25.000000','9yTvNWykKncavuQrFLTU.jpeg','Media Coverage'),(31,'Media Coverage 4','Media Coverage 4','2017-06-08 06:10:28.000000','888axkaJ9yiFihpOZIap.png','Media Coverage'),(35,'Tailoring Design 101 Workshop with Jeffry Tan','','2016-12-03 02:10:40.000000','Y2FKqq075TvFwaORQ6r8.jpg','Gallery Album'),(37,'INIFD X Fashion Valet Luncheon','','2016-12-17 03:15:22.000000','qv4Uq1RNsW64AtwkYSJW.jpg','Gallery Album'),(38,'INIFD X Pesona Magazine Workshop','','2017-01-14 11:55:36.000000','GhljXhamtFjTpZVHXfJz.jpg','Gallery Album'),(39,'Fashion Workshop: Brand Analysis','','2017-02-11 11:55:33.000000','WdbgNaXmyIxfaNkeZ3YI.jpg','Gallery Album'),(40,'Media Gathering at Ristorante da Valentino (18th May 2016)','','2016-05-18 11:55:20.000000','4KSSdmddfB5kiRf98G5p.jpg','Gallery Album');
/*!40000 ALTER TABLE `galleryalbum` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `gender`
--

DROP TABLE IF EXISTS `gender`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `gender` (
  `IdGender` int(11) NOT NULL AUTO_INCREMENT,
  `GenderName` varchar(245) DEFAULT NULL,
  `GenderInfo` varchar(45) DEFAULT NULL,
  PRIMARY KEY (`IdGender`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `gender`
--

LOCK TABLES `gender` WRITE;
/*!40000 ALTER TABLE `gender` DISABLE KEYS */;
INSERT INTO `gender` VALUES (1,'Male','Male'),(2,'Female','Female');
/*!40000 ALTER TABLE `gender` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `post`
--

DROP TABLE IF EXISTS `post`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `post` (
  `IdPost` bigint(20) NOT NULL,
  `PostTitle` varchar(250) DEFAULT NULL,
  `PostSubTitle` varchar(250) DEFAULT NULL,
  `PostDate` datetime(6) DEFAULT NULL,
  `PostShortText` longtext,
  `PostText` longtext,
  `PostMainImage` longtext,
  `PostedById` int(11) DEFAULT NULL,
  `PostTag` varchar(45) DEFAULT NULL,
  `IsActive` int(11) DEFAULT NULL,
  PRIMARY KEY (`IdPost`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `post`
--

LOCK TABLES `post` WRITE;
/*!40000 ALTER TABLE `post` DISABLE KEYS */;
/*!40000 ALTER TABLE `post` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `user`
--

DROP TABLE IF EXISTS `user`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `user` (
  `IdUser` int(11) NOT NULL AUTO_INCREMENT,
  `FirstName` varchar(250) DEFAULT NULL,
  `LastName` varchar(250) DEFAULT NULL,
  `UserPicture` longtext,
  `UserRegisteredDate` datetime(6) DEFAULT NULL,
  `GenderId` int(11) DEFAULT NULL,
  `UserEmail` varchar(250) DEFAULT NULL,
  `UserPhone` varchar(250) DEFAULT NULL,
  `UserGroupId` int(11) DEFAULT NULL,
  `UserPassword` varchar(100) NOT NULL,
  PRIMARY KEY (`IdUser`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `user`
--

LOCK TABLES `user` WRITE;
/*!40000 ALTER TABLE `user` DISABLE KEYS */;
INSERT INTO `user` VALUES (1,'Administrator','Website','yT2qkjwavP30jDrEVYqt.jpg;','2017-09-09 12:00:00.000000',1,'admin','34239898798',1,'rotikeju98');
/*!40000 ALTER TABLE `user` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `usergroup`
--

DROP TABLE IF EXISTS `usergroup`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `usergroup` (
  `IdUserGroup` int(11) NOT NULL AUTO_INCREMENT,
  `UserGroup` varchar(250) DEFAULT NULL,
  `UserGroupDesc` longtext,
  PRIMARY KEY (`IdUserGroup`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `usergroup`
--

LOCK TABLES `usergroup` WRITE;
/*!40000 ALTER TABLE `usergroup` DISABLE KEYS */;
INSERT INTO `usergroup` VALUES (1,'Administrator','Administrator');
/*!40000 ALTER TABLE `usergroup` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `video`
--

DROP TABLE IF EXISTS `video`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `video` (
  `IdVideo` int(11) NOT NULL AUTO_INCREMENT,
  `VideoTitle` varchar(250) DEFAULT NULL,
  `VideoUrl` text,
  PRIMARY KEY (`IdVideo`),
  UNIQUE KEY `IdVideo` (`IdVideo`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `video`
--

LOCK TABLES `video` WRITE;
/*!40000 ALTER TABLE `video` DISABLE KEYS */;
INSERT INTO `video` VALUES (2,'fasdfasdf','https://www.youtube.com/embed/hTJmuJI1ITQ');
/*!40000 ALTER TABLE `video` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2017-08-09  9:28:15

-- MySQL dump 10.13  Distrib 5.7.17, for Win64 (x86_64)
--
-- Host: 127.0.0.1    Database: com_wiseape_workflowengine
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
-- Table structure for table `application`
--

DROP TABLE IF EXISTS `application`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `application` (
  `IdApplication` int(11) NOT NULL AUTO_INCREMENT,
  `ApplicationName` varchar(250) DEFAULT NULL,
  `ApplicationTitle` varchar(250) DEFAULT NULL,
  `ApplicationInfo` longtext,
  `ApplicationIconSmall` longtext,
  `ApplicationIconMiddle` longtext,
  `ApplicationIconLarge` longtext,
  `ApplicationPath` longtext,
  `ApplicationFile` longtext,
  `ApplicationClass` varchar(250) DEFAULT NULL,
  `ApplicationMainFunction` varchar(250) DEFAULT NULL,
  `DisplayIcon` int(11) DEFAULT NULL,
  `IsActive` int(11) DEFAULT NULL,
  `UseWorkflow` int(11) DEFAULT NULL,
  PRIMARY KEY (`IdApplication`)
) ENGINE=InnoDB AUTO_INCREMENT=29 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `application`
--

LOCK TABLES `application` WRITE;
/*!40000 ALTER TABLE `application` DISABLE KEYS */;
INSERT INTO `application` VALUES (1,'AppListUser','List of User','List user application','UserManagement/images/icon/user-list.png','UserManagement/images/icon/user-list.png','UserManagement/images/icon/user-list.png','UserManagement/AppListUser','AppListUser.js','AppListUser','run',1,1,1),(2,'AppAddUser','Add User','Add User','UserManagement/images/icon/user-add.png','UserManagement/images/icon/user-add.png','UserManagement/images/icon/user-add.png','UserManagement/AppAddUser','AppAddUser.js','AppAddUser','run',1,1,1),(3,'AppEditUser','Edit User','Edit User','UserManagement/images/icon/user-edit.png','UserManagement/images/icon/user-edit.png','UserManagement/images/icon/user-edit.png','UserManagement/AppEditUser','AppEditUser.js','AppEditUser','run',0,1,1),(4,'AppDeleteUser','Delete User','Delete User','UserManagement/images/icon/user-delete.png','UserManagement/images/icon/user-delete.png','UserManagement/images/icon/user-delete.png','UserManagement/AppDeleteUser','AppDeleteUser.js','AppDeleteUser','run',0,1,1),(5,'AppListGalleryAlbum','List of Album','List of Gallery Album','GalleryAlbum/images/icon/album-list.png','GalleryAlbum/images/icon/album-list.png','GalleryAlbum/images/icon/album-list.png','GalleryAlbum/AppListGalleryAlbum','AppListGalleryAlbum.js','AppListGalleryAlbum','run',1,1,0),(6,'AppAddGalleryAlbum','Add Album','Add Album','GalleryAlbum/images/icon/album-add.png','GalleryAlbum/images/icon/album-add.png','GalleryAlbum/images/icon/album-add.png','GalleryAlbum/AppAddGalleryAlbum','AppAddGalleryAlbum.js','AppAddGalleryAlbum','run',1,1,0),(7,'AppEditGalleryAlbum','Edit Album','Edit Album','GalleryAlbum/images/icon/album-edit.png','GalleryAlbum/images/icon/album-edit.png','GalleryAlbum/images/icon/album-edit.png','GalleryAlbum/AppEditGalleryAlbum','AppEditGalleryAlbum.js','AppEditGalleryAlbum','run',0,1,0),(8,'AppDeleteGalleryAlbum','Delete Album','Delete Album','GalleryAlbum/images/icon/album-delete.png','GalleryAlbum/images/icon/album-delete.png','GalleryAlbum/images/icon/album-delete.png','GalleryAlbum/AppDeleteGalleryAlbum','AppDeleteGalleryAlbum.js','AppDeleteGalleryAlbum','run',0,1,0),(9,'AppListVideo','List of Video','List of Video','Video/images/icon/video-list.png','Video/images/icon/video-list.png','Video/images/icon/video-list.png','Video/AppListVideo','AppListVideo.js','AppListVideo','run',1,1,0),(10,'AppAddVideo','Add Video','Add Video','Video/images/icon/video-add.png','Video/images/icon/video-add.png','Video/images/icon/video-add.png','Video/AppAddVideo','AppAddVideo.js','AppAddVideo','run',1,1,0),(11,'AppEditVideo','Edit Video','Edit Video','Video/images/icon/video-edit.png','Video/images/icon/video-edit.png','Video/images/icon/video-edit.png','Video/AppEditVideo','AppEditVideo.js','AppEditVideo','run',0,1,0),(12,'AppDeleteVideo','Delete Video','Delete Video','Video/images/icon/video-delete.png','Video/images/icon/video-delete.png','Video/images/icon/video-delete.png','Video/AppDeleteVideo','AppDeleteVideo.js','AppDeleteVideo','run',0,1,0),(13,'AppListApplication','List of Application','List of Application','Application/images/icon/list-application-icon.png','Application/images/icon/list-application-icon.png','Application/images/icon/list-application-icon.png','Application/AppListApplication','AppListApplication.js','AppListApplication','run',1,1,0),(14,'AppAddApplication','Add Application','Add Application','Application/images/icon/add-application-icon.png','Application/images/icon/add-application-icon.png','Application/images/icon/add-application-icon.png','Application/AppAddApplication','AppAddApplication.js','AppAddApplication','run',1,1,0),(15,'AppEditApplication','Edit Application','Edit Application','Application/images/icon/add-application-icon.png','Application/images/icon/add-application-icon.png','Application/images/icon/add-application-icon.png','Application/AppEditApplication','AppEditApplication.js','AppEditApplication','run',0,1,0),(16,'AppDeleteApplication','Delete Application','Delete Application','Application/images/icon/add-application-icon.png','Application/images/icon/add-application-icon.png','Application/images/icon/add-application-icon.png','Application/AppDeleteApplication','AppDeleteApplication.js','AppDeleteApplication','run',0,1,0),(17,'AppListProcessGroup','List Process Group','application to list processgroup data','ProcessGroup/images/icon/list-processgroup-icon.svg','ProcessGroup/images/icon/list-processgroup-icon.svg','ProcessGroup/images/icon/list-processgroup-icon.svg','ProcessGroup/AppListProcessGroup','AppListProcessGroup.js','AppListProcessGroup','run',1,1,0),(18,'AppAddProcessGroup','Add Process Group','application to addprocessgroup data','ProcessGroup/images/icon/add-processgroup-icon.png','ProcessGroup/images/icon/add-processgroup-icon.png','ProcessGroup/images/icon/add-processgroup-icon.png','ProcessGroup/AppAddProcessGroup','AppAddProcessGroup.js','AppAddProcessGroup','run',1,1,0),(19,'AppEditProcessGroup','Edit Process Group','application to AppEditProcessGroup data','ProcessGroup/images/icon/list-processgroup-icon.png','ProcessGroup/images/icon/list-processgroup-icon.png','ProcessGroup/images/icon/list-processgroup-icon.png','ProcessGroup/AppEditProcessGroup','AppEditProcessGroup.js','AppEditProcessGroup','run',0,0,0),(20,'AppDeleteProcessGroup','Delete Process Group','application to AppDeleteProcessGroup data','ProcessGroup/images/icon/list-processgroup-icon.png','ProcessGroup/images/icon/list-processgroup-icon.png','ProcessGroup/images/icon/list-processgroup-icon.png','ProcessGroup/AppDeleteProcessGroup','AppDeleteProcessGroup.js','AppDeleteProcessGroup','run',0,0,0),(21,'AppListProcess','List Of Process','AppListProcess','Process/images/icon/list-process-icon.svg','Process/images/icon/list-process-icon.svg','Process/images/icon/list-process-icon.svg','Process/AppListProcess','AppListProcess.js','AppListProcess','run',1,1,1),(22,'AppAddProcess','Add Process','AppAddProcess','Process/images/icon/add-process-icon.png','Process/images/icon/add-process-icon.png','Process/images/icon/add-process-icon.png','Process/AppAddProcess','AppAddProcess.js','AppAddProcess','run',1,1,0),(23,'AppEditProcess','Edit Process','AppEditProcess','Process/images/edit-process-icon.png','Process/images/edit-process-icon.png','Process/images/edit-process-icon.png','Process/AppEditProcess','AppEditProcess.js','AppEditProcess','run',0,0,0),(24,'AppDeleteProcess','Delete Process','AppDeleteProcess','Process/images/delete-process-icon.png','Process/images/delete-process-icon.png','Process/images/delete-process-icon.png','Process/AppDeleteProcess','AppDeleteProcess.js','AppDeleteProcess','run',0,0,0),(25,'AppListTasklog','List of Tasklog','AppListTasklog','Tasklog/images/icon/list-tasklog-icon.png','Tasklog/images/icon/list-tasklog-icon.png','Tasklog/images/icon/list-tasklog-icon.png','Tasklog/AppListTasklog','AppListTasklog.js','AppListTasklog','run',1,1,1),(26,'AppAddTasklog','Add Tasklog','Adding Tasklog data','Tasklog/images/icon/add-tasklog-icon.svg','Tasklog/images/icon/add-tasklog-icon.svg','Tasklog/images/icon/add-tasklog-icon.svg','Tasklog/AppAddTasklog','AppAddTasklog.js','AppAddTasklog','run',1,1,0),(27,'AppEditTasklog','Edit Tasklog','Edit Tasklog','Tasklog/images/icon/edit-tasklog-icon.png','Tasklog/images/icon/edit-tasklog-icon.png','Tasklog/images/icon/edit-tasklog-icon.png','Tasklog/AppEditTasklog','AppEditTasklog.js','AppEditTasklog','run',0,1,0),(28,'AppDeleteTasklog','Delete Tasklog','Delete Tasklog','Tasklog/images/icon/delete-tasklog-icon.png','Tasklog/images/icon/delete-tasklog-icon.png','Tasklog/images/icon/delete-tasklog-icon.png','Tasklog/AppDeleteTasklog','AppDeleteTasklog.js','AppDeleteTasklog','run',0,1,0);
/*!40000 ALTER TABLE `application` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `process`
--

DROP TABLE IF EXISTS `process`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `process` (
  `IdProcess` int(11) NOT NULL AUTO_INCREMENT,
  `ProcessNo` varchar(250) DEFAULT NULL,
  `ProcessName` varchar(250) DEFAULT NULL,
  `ProcessInfo` longtext,
  `ProcessCreatedDate` datetime(6) DEFAULT NULL,
  `ApplicationId` int(11) DEFAULT NULL,
  `PreviousWorkflowEvaluatorId` int(11) DEFAULT NULL,
  `NextWorkflowEvaluatorId` int(11) DEFAULT NULL,
  `WorkflowId` int(11) DEFAULT NULL,
  `CreatedByUserId` bigint(20) DEFAULT NULL,
  `ProcessGroupId` int(11) DEFAULT NULL,
  PRIMARY KEY (`IdProcess`),
  KEY `FK_Process_Workflow` (`WorkflowId`),
  KEY `FK_Process_ProcessGroup` (`ProcessGroupId`),
  KEY `FK_Process_Application` (`ApplicationId`),
  CONSTRAINT `FK_Process_Application` FOREIGN KEY (`ApplicationId`) REFERENCES `application` (`IdApplication`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `FK_Process_ProcessGroup` FOREIGN KEY (`ProcessGroupId`) REFERENCES `processgroup` (`IdProcessGroup`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `FK_Process_Workflow` FOREIGN KEY (`WorkflowId`) REFERENCES `workflow` (`IdWorkflow`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB AUTO_INCREMENT=29 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `process`
--

LOCK TABLES `process` WRITE;
/*!40000 ALTER TABLE `process` DISABLE KEYS */;
INSERT INTO `process` VALUES (1,'P0001','ListOfUser','List of Users','2017-11-11 00:00:00.000000',1,NULL,1,1,1,1),(2,'P0002','AddUser','Add User','2017-11-11 00:00:00.000000',2,1,NULL,1,1,1),(3,'P0003','EditUser','Edit User','2017-11-11 00:00:00.000000',3,1,NULL,1,1,1),(4,'P0004','DeleteUser','Delete User','2017-11-11 00:00:00.000000',4,1,NULL,1,1,1),(5,'P0005','ListOfAlbum','List of Albums','2017-11-11 00:00:00.000000',5,1,1,1,1,2),(8,'P0006','AddAlbum',NULL,NULL,6,1,1,1,1,2),(9,'P0007','EditAlbum',NULL,NULL,7,1,1,1,1,2),(10,'P0008','DeleteAlbum',NULL,NULL,8,1,1,1,1,2),(11,'P0009','ListOfVideo',NULL,NULL,9,0,NULL,1,1,3),(12,'P0010','EditVideo',NULL,'2017-06-19 17:42:12.000000',11,NULL,NULL,1,1,3),(13,'P0011','AddVideo',NULL,'2017-06-19 17:44:00.000000',10,NULL,NULL,1,1,3),(14,'P0012','DeleteVideo',NULL,'2017-06-19 17:45:21.000000',12,NULL,NULL,1,1,3),(15,'P0013','ListOfApplication',NULL,NULL,13,NULL,NULL,1,1,4),(16,'P0014','AddApplication',NULL,NULL,14,NULL,NULL,1,1,4),(17,'P0015','EditApplication',NULL,NULL,15,NULL,NULL,1,1,4),(18,'P0016','DeleteApplication',NULL,NULL,16,NULL,NULL,1,1,4),(19,'P0017','ListOfProcessGroup',NULL,NULL,17,NULL,NULL,1,1,4),(20,'P0018','AddProcessGroup',NULL,NULL,18,NULL,NULL,1,1,4),(21,'P0019','EditProcessGroup',NULL,NULL,19,NULL,NULL,1,1,4),(22,'p0020','DeleteProcessGroup',NULL,NULL,20,NULL,NULL,1,1,4),(23,'P0021','ListOfProcess',NULL,NULL,21,NULL,NULL,1,1,4),(24,'P0022','AddProcess',NULL,NULL,22,NULL,NULL,1,1,4),(25,'P0023','EditProcess',NULL,NULL,23,NULL,NULL,1,1,4),(26,'P0024','DeleteProcess',NULL,NULL,24,NULL,NULL,1,1,4),(27,'P0025','List of Tasklog','List of Tasklog','2017-07-25 06:25:34.000000',25,1,1,1,1,5),(28,'P0026','AddTaskLog','Add Tasklog','2017-07-26 04:30:48.000000',26,1,1,1,1,5);
/*!40000 ALTER TABLE `process` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `processdata`
--

DROP TABLE IF EXISTS `processdata`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `processdata` (
  `IdProcessData` int(11) NOT NULL AUTO_INCREMENT,
  `PreviousProcessId` int(11) DEFAULT NULL,
  `Data` longtext,
  `NextProcessId` int(11) DEFAULT NULL,
  `WorkflowId` int(11) DEFAULT NULL,
  `SessionCode` longtext,
  PRIMARY KEY (`IdProcessData`),
  KEY `FK_ProcessData_Workflow` (`WorkflowId`),
  CONSTRAINT `FK_ProcessData_Workflow` FOREIGN KEY (`WorkflowId`) REFERENCES `workflow` (`IdWorkflow`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB AUTO_INCREMENT=396 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `processdata`
--

LOCK TABLES `processdata` WRITE;
/*!40000 ALTER TABLE `processdata` DISABLE KEYS */;
INSERT INTO `processdata` VALUES (365,1,'{\"IdUser\":\"5\",\"FirstName\":\"Batman\",\"LastName\":\"Robin Lagi\",\"BirthDate\":\"1980-07-08T23:30:00.000Z\",\"BirthPlace\":\"Gotham\",\"Phone\":\"324234\",\"Email\":\"batman@gotham.com\",\"uid\":4,\"boundindex\":4,\"uniqueid\":\"2821-25-28-29-182723\",\"visibleindex\":4,\"command\":\"add\"}',2,1,'TOYHqi1qeG0K'),(395,1,'{\"IdUser\":\"2\",\"FirstName\":\"Abraham\",\"LastName\":\"Samad\",\"BirthDate\":\"1980-09-23T05:00:00.000Z\",\"BirthPlace\":\"Jakarta\",\"Phone\":\"3242343242\",\"Email\":\"hudabeybi@yahoo.com\",\"uid\":1,\"boundindex\":1,\"uniqueid\":\"3022-26-28-24-172627\",\"visibleindex\":1,\"command\":\"edit\"}',3,1,'rfB2rwpW0ulx');
/*!40000 ALTER TABLE `processdata` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `processgroup`
--

DROP TABLE IF EXISTS `processgroup`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `processgroup` (
  `IdProcessGroup` int(11) NOT NULL AUTO_INCREMENT,
  `ProcessGroupName` varchar(250) DEFAULT NULL,
  `ProcessGroupTitle` varchar(250) DEFAULT NULL,
  `ProcessGroupInfo` longtext,
  `IconSmall` longtext,
  `IconMiddle` longtext,
  `IconLarge` longtext,
  `IsActive` int(11) DEFAULT NULL,
  `IsDisplay` int(11) DEFAULT NULL,
  PRIMARY KEY (`IdProcessGroup`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `processgroup`
--

LOCK TABLES `processgroup` WRITE;
/*!40000 ALTER TABLE `processgroup` DISABLE KEYS */;
INSERT INTO `processgroup` VALUES (1,'UserManagement','User Management','User Management Application Group','UserManagement/images/icon/usergroup-icon.png','UserManagement/images/icon/usergroup-icon.png','UserManagement/images/icon/usergroup-icon.png',1,1),(2,'GalleryAlbum','Gallery Album','Gallery Album Group','GalleryAlbum/images/icon/galleryalbum-icon.png','GalleryAlbum/images/icon/galleryalbum-icon.png','GalleryAlbum/images/icon/galleryalbum-icon.png',1,0),(3,'VideoAlbum','Video Album','Video Album Management','Video/images/icon/video-icon.png','Video/images/icon/video-icon.png','Video/images/icon/video-icon.png',1,0),(4,'ApplicationManagement','Application Management','Application Management','Application/images/icon/application-icon.png','Application/images/icon/application-icon.png','Application/images/icon/application-icon.png',1,1),(5,'Tasklog','Tasklog','Tasklog','Tasklog/images/icon/tasklog-icon.svg','Tasklog/images/icon/tasklog-icon.svg','Tasklog/images/icon/tasklog-icon.svg',1,1);
/*!40000 ALTER TABLE `processgroup` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `workflow`
--

DROP TABLE IF EXISTS `workflow`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `workflow` (
  `IdWorkflow` int(11) NOT NULL AUTO_INCREMENT,
  `WorkflowNo` varchar(250) DEFAULT NULL,
  `WorkflowName` varchar(250) DEFAULT NULL,
  `WorkflowDesc` longtext,
  PRIMARY KEY (`IdWorkflow`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `workflow`
--

LOCK TABLES `workflow` WRITE;
/*!40000 ALTER TABLE `workflow` DISABLE KEYS */;
INSERT INTO `workflow` VALUES (1,'WF0001','User Management','Workflow Management');
/*!40000 ALTER TABLE `workflow` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `workflowevaluator`
--

DROP TABLE IF EXISTS `workflowevaluator`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `workflowevaluator` (
  `IdWorkflowEvaluator` int(11) NOT NULL AUTO_INCREMENT,
  `EvaluatorOperationType` varchar(250) DEFAULT NULL,
  `ImmediateRunNext` int(11) DEFAULT NULL,
  `WorkflowId` int(11) DEFAULT NULL,
  PRIMARY KEY (`IdWorkflowEvaluator`),
  KEY `FK_WorkflowEvaluator_Workflow` (`WorkflowId`),
  CONSTRAINT `FK_WorkflowEvaluator_Workflow` FOREIGN KEY (`WorkflowId`) REFERENCES `workflow` (`IdWorkflow`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `workflowevaluator`
--

LOCK TABLES `workflowevaluator` WRITE;
/*!40000 ALTER TABLE `workflowevaluator` DISABLE KEYS */;
INSERT INTO `workflowevaluator` VALUES (1,'OR',1,1);
/*!40000 ALTER TABLE `workflowevaluator` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `workflowevaluatoritem`
--

DROP TABLE IF EXISTS `workflowevaluatoritem`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `workflowevaluatoritem` (
  `IdWorkflowEvaluatorItem` int(11) NOT NULL AUTO_INCREMENT,
  `WorkflowEvaluatorExpression` longtext,
  `NextProcessId` int(11) DEFAULT NULL,
  `WorkflowEvaluatorId` int(11) DEFAULT NULL,
  PRIMARY KEY (`IdWorkflowEvaluatorItem`),
  KEY `FK_WorkflowEvaluatorItem_WorkflowEvaluator` (`WorkflowEvaluatorId`),
  CONSTRAINT `FK_WorkflowEvaluatorItem_WorkflowEvaluator` FOREIGN KEY (`WorkflowEvaluatorId`) REFERENCES `workflowevaluator` (`IdWorkflowEvaluator`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `workflowevaluatoritem`
--

LOCK TABLES `workflowevaluatoritem` WRITE;
/*!40000 ALTER TABLE `workflowevaluatoritem` DISABLE KEYS */;
INSERT INTO `workflowevaluatoritem` VALUES (1,'if(param[\"command\"] == \"add\")\r\n	return true;',2,1),(2,'if(param[\"command\"] == \"edit\")\r\n	return true;',3,1),(3,'if(param[\"command\"] == \"delete\")\r\n	return true;',4,1);
/*!40000 ALTER TABLE `workflowevaluatoritem` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `workflowevaluatortype`
--

DROP TABLE IF EXISTS `workflowevaluatortype`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `workflowevaluatortype` (
  `IdWorkflowEvaluatorType` int(11) NOT NULL,
  `EvaluatorType` varchar(50) DEFAULT NULL,
  `IsActive` int(11) DEFAULT NULL,
  PRIMARY KEY (`IdWorkflowEvaluatorType`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `workflowevaluatortype`
--

LOCK TABLES `workflowevaluatortype` WRITE;
/*!40000 ALTER TABLE `workflowevaluatortype` DISABLE KEYS */;
INSERT INTO `workflowevaluatortype` VALUES (1,'ONETRUE',1),(2,'ALLTRUE',1);
/*!40000 ALTER TABLE `workflowevaluatortype` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2017-08-09  8:54:42

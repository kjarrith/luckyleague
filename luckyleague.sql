-- MySQL dump 10.13  Distrib 5.6.19, for debian-linux-gnu (x86_64)
--
-- Host: localhost    Database: luckyleague
-- ------------------------------------------------------
-- Server version	5.6.19-0ubuntu0.14.04.1

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
-- Table structure for table `betlings`
--

DROP TABLE IF EXISTS `betlings`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `betlings` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `event_id` int(11) DEFAULT NULL,
  `bet_id` int(11) DEFAULT NULL,
  `title` varchar(60) DEFAULT NULL,
  `odds` varchar(100) DEFAULT NULL,
  `pos` int(2) DEFAULT NULL,
  `is_active` int(11) DEFAULT NULL,
  `status` int(11) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=67 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `betlings`
--

LOCK TABLES `betlings` WRITE;
/*!40000 ALTER TABLE `betlings` DISABLE KEYS */;
INSERT INTO `betlings` VALUES (1,1,1,'1','2.6',NULL,NULL,0),(4,1,1,'X','6/26',NULL,NULL,0),(5,1,1,'2','0.9',NULL,NULL,0),(6,1,2,'1 or less','1.6',NULL,NULL,0),(7,1,2,'More than 1','1.2',NULL,NULL,0),(8,1,3,'Van Persie','1.4',NULL,NULL,0),(9,1,3,'Rooney','1.8',NULL,NULL,0),(10,6,3,'sdf','1.2',NULL,1,0),(11,6,3,'sdf','1.2',NULL,1,0),(12,6,3,'sdf','1.2',NULL,1,0),(13,6,3,'sdf','1.2',NULL,1,0),(14,6,3,'sdf','1.2',NULL,1,0),(15,6,3,'234','1.2',NULL,1,0),(16,1,22,'Teitur','2',NULL,1,0),(17,1,23,'Teitur','23',NULL,1,0),(18,1,24,'teitur','23',NULL,1,0),(19,1,25,'teitur','2',NULL,1,0),(20,1,26,'teitur','34',NULL,1,0),(21,1,27,'sdf','23',NULL,1,0),(22,1,27,'sdf','32',NULL,1,0),(23,1,27,'ahd','22',NULL,1,0),(24,1,28,'gsd','23',NULL,1,0),(25,1,28,'asd','df',NULL,1,0),(26,1,28,'234234','df',NULL,1,0),(27,1,28,'676','df',NULL,1,0),(28,1,29,'ser','sdf',NULL,1,0),(29,1,29,'234','23fds',NULL,1,0),(30,0,38,'Teitur','2.3',NULL,1,0),(31,0,38,'Gunnar','4.3',NULL,1,0),(32,0,39,'Teitur','2.3',NULL,1,0),(33,0,39,'Styrmir','3.2',NULL,1,0),(34,13,40,'sick balls','2',NULL,1,0),(35,13,41,'Styrmir','1.83',NULL,1,0),(36,13,41,'Teitur','1.83',NULL,1,0),(37,13,42,'sdf','23',NULL,1,0),(38,14,43,'Magnús','1.83',NULL,1,0),(39,14,43,'Jórunn','1.83',NULL,1,0),(40,15,44,'HOU Rockets','1.57',NULL,1,1),(41,15,44,'DEN Nuggets','2.55',NULL,1,2),(42,16,45,'Styrmir Elí','1.83',NULL,1,1),(43,16,45,'Teitur','1.83',NULL,1,2),(44,17,46,'Já','1.01',NULL,1,0),(45,17,46,'Nei','40',NULL,1,0),(46,18,47,'Alma','1.83',NULL,1,0),(47,18,47,'Björg','1.83',NULL,1,0),(48,14,48,'Magnús','1.83',NULL,1,0),(49,14,48,'Hinn','1.83',NULL,1,0),(50,18,49,'Númer 1','1.83',NULL,1,0),(51,18,49,'Númer 2','1.83',NULL,1,0),(52,18,49,'Númer 3','1.83',NULL,1,0),(53,18,49,'Númer 4','1.83',NULL,1,0),(54,18,49,'Númer 5','1.83',NULL,1,0),(55,18,49,'Númer 6','1.83',NULL,1,0),(56,18,49,'Númer 7','1.83',NULL,1,0),(57,18,49,'Númer 9','1.83',NULL,1,0),(58,18,49,'Númer 10','1.83',NULL,1,0),(59,18,49,'Númer 11','1.83',NULL,1,0),(60,18,49,'Númer 12','1.5',NULL,1,0),(61,18,49,'Númer 13','1.5',NULL,1,0),(62,18,49,'Númer 14','1.5',NULL,1,0),(63,18,49,'Númer 15','10',NULL,1,0),(64,18,49,'Númer 16','20',NULL,1,0),(65,18,49,'Númer 17','20',NULL,1,0),(66,18,49,'Númer 18','20',NULL,1,0);
/*!40000 ALTER TABLE `betlings` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `bets`
--

DROP TABLE IF EXISTS `bets`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `bets` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `event_id` int(11) DEFAULT NULL,
  `description` varchar(140) DEFAULT NULL,
  `bet_type` int(1) DEFAULT NULL,
  `is_active` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=50 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `bets`
--

LOCK TABLES `bets` WRITE;
/*!40000 ALTER TABLE `bets` DISABLE KEYS */;
INSERT INTO `bets` VALUES (1,1,'Fulltime Result',3,NULL),(2,1,'Match Goals',2,NULL),(3,1,'To score first goal',1,NULL),(4,6,'sdfsd',1,1),(5,6,'sdf',1,1),(6,6,'Sigurvegari',1,1),(7,6,'Sigur',1,1),(8,6,'sdfsd',1,1),(9,6,'sdfsdf',1,1),(10,6,'sdf',1,1),(11,6,'sdf',1,1),(12,6,'sdf',1,1),(13,6,'sdf',1,1),(14,6,'sdf',1,1),(15,6,'sdf',1,1),(16,6,'sdf',1,1),(17,6,'sdf',1,1),(18,6,'prufa',2,1),(19,6,'edsf',2,1),(20,1,'234',3,1),(21,1,'sdf',2,1),(22,1,'Sigurvegari',3,1),(23,1,'sdf',2,1),(24,1,'sdf',3,1),(25,1,'Sigurvegari',1,1),(26,1,'Sigurvegari',3,1),(27,1,'sdf',1,1),(28,1,'asdf',2,1),(29,1,'wer',1,1),(30,1,'wer',1,1),(31,0,'Sigurvegari',3,1),(32,0,'Sigurvegari',3,1),(33,0,'Sigurvegari',1,1),(34,0,'sdf',2,1),(35,0,'sigurvegari',3,1),(36,0,'Sigurveagari',3,1),(37,0,'Sigurvegari',1,1),(38,0,'Sigurvegari',1,1),(39,0,'Sigurvegari',2,1),(40,13,'fsd',1,1),(41,13,'Sigurvegari',2,1),(42,13,'sdf',2,1),(44,15,'Money Line',2,0),(45,16,'Sigurvegari',2,1),(46,17,'Nær kjöri',2,1),(47,18,'Sigurvegari',2,1),(48,14,'Sigurvegari',2,1),(49,18,'Nefndin',5,1);
/*!40000 ALTER TABLE `bets` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `betsplaced`
--

DROP TABLE IF EXISTS `betsplaced`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `betsplaced` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `bet_id` int(11) DEFAULT NULL,
  `betling_id` int(11) DEFAULT NULL,
  `stake` int(11) DEFAULT NULL,
  `odds` varchar(99) DEFAULT NULL,
  `user_id` int(11) DEFAULT NULL,
  `status` int(11) NOT NULL DEFAULT '1',
  `placed_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NULL DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=97 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `betsplaced`
--

LOCK TABLES `betsplaced` WRITE;
/*!40000 ALTER TABLE `betsplaced` DISABLE KEYS */;
INSERT INTO `betsplaced` VALUES (86,47,47,5,'\n                                1.83\n                            ',3,1,'2015-03-15 23:09:08',NULL),(87,45,43,50,'\n                                1.83\n                            ',3,1,'2015-03-15 23:16:51',NULL),(88,49,54,20,'\n                                1.83\n                            ',3,1,'2015-03-16 18:14:33',NULL),(89,47,47,40,'\n                                1.83\n                            ',3,1,'2015-03-16 21:27:19',NULL),(90,49,50,22,'\n                                1.83\n                            ',3,1,'2015-03-16 21:36:29',NULL),(91,49,57,55,'\n                                1.83\n                            ',3,1,'2015-03-17 08:42:41',NULL),(92,45,42,55,'\n                                1.83\n                            ',3,1,'2015-03-17 08:46:10',NULL),(93,49,52,55,'\n                                1.83\n                            ',3,1,'2015-03-17 09:12:17',NULL),(94,49,52,55,'\n                                1.83\n                            ',3,1,'2015-03-17 09:12:17',NULL),(95,49,51,55,'\n                                1.83\n                            ',3,1,'2015-03-17 09:20:25',NULL),(96,49,56,586,'\n                                1.83\n                            ',3,1,'2015-03-17 09:21:30',NULL);
/*!40000 ALTER TABLE `betsplaced` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `categories`
--

DROP TABLE IF EXISTS `categories`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `categories` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `cat_name` varchar(30) DEFAULT NULL,
  `cat_description` varchar(140) DEFAULT NULL,
  `status` int(1) DEFAULT '1',
  `img_url` varchar(500) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `categories`
--

LOCK TABLES `categories` WRITE;
/*!40000 ALTER TABLE `categories` DISABLE KEYS */;
INSERT INTO `categories` VALUES (6,'Kosningavikan','Kosningavika Verzlunarskólans. 10 embætti, 30+ frambjóðendur og þessvegna nóg af veðmálum.',1,NULL),(7,'Fótbolti','Allir elska fótbolta',1,NULL),(8,'NBA','Allir elska körfubolta',1,'http://www.f-covers.com/cover/basketball-close-facebook-cover-timeline-banner-for-fb.jpg'),(9,'English Premier League ','Flott deild',1,'');
/*!40000 ALTER TABLE `categories` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `events`
--

DROP TABLE IF EXISTS `events`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `events` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `event_name` varchar(100) DEFAULT NULL,
  `open_date` date DEFAULT NULL,
  `close_date` date DEFAULT NULL,
  `close_time` timestamp NULL DEFAULT NULL,
  `is_active` int(11) DEFAULT NULL,
  `category_id` int(5) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=20 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `events`
--

LOCK TABLES `events` WRITE;
/*!40000 ALTER TABLE `events` DISABLE KEYS */;
INSERT INTO `events` VALUES (14,'Málfundafélagið','0000-00-00','0000-00-00','0000-00-00 00:00:00',1,6),(15,'HOU Rockets vs DEN Nuggets','0000-00-00','0000-00-00','0000-00-00 00:00:00',3,8),(16,'Forseti','2015-03-07','2015-03-27','2015-03-27 18:00:00',1,6),(17,'Féhirðir','2015-03-05','2015-03-27','2015-03-27 18:00:00',1,6),(18,'Viljinn','2015-03-16','2015-03-27','2015-03-27 18:00:00',1,6);
/*!40000 ALTER TABLE `events` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `invitecodes`
--

DROP TABLE IF EXISTS `invitecodes`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `invitecodes` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `code` varchar(8) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `invitecodes`
--

LOCK TABLES `invitecodes` WRITE;
/*!40000 ALTER TABLE `invitecodes` DISABLE KEYS */;
INSERT INTO `invitecodes` VALUES (1,'verzlo1');
/*!40000 ALTER TABLE `invitecodes` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `levels`
--

DROP TABLE IF EXISTS `levels`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `levels` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `level` int(11) DEFAULT NULL,
  `bet_limit` int(11) DEFAULT NULL,
  `xp_limit` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `levels`
--

LOCK TABLES `levels` WRITE;
/*!40000 ALTER TABLE `levels` DISABLE KEYS */;
INSERT INTO `levels` VALUES (1,1,500,50),(2,2,750,100),(3,3,1000,200),(4,4,1500,500),(5,5,2000,2000);
/*!40000 ALTER TABLE `levels` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `users`
--

DROP TABLE IF EXISTS `users`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `users` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `email` varchar(60) DEFAULT '',
  `password` varchar(60) DEFAULT NULL,
  `first_name` varchar(60) DEFAULT NULL,
  `last_name` varchar(60) DEFAULT NULL,
  `level` int(11) NOT NULL DEFAULT '1',
  `current_xp` int(11) NOT NULL DEFAULT '0',
  `current_balance` int(11) NOT NULL DEFAULT '0',
  `profile_img` varchar(400) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `last_login_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NULL DEFAULT NULL,
  `remember_token` varchar(70) DEFAULT NULL,
  `admin` int(1) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=15 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `users`
--

LOCK TABLES `users` WRITE;
/*!40000 ALTER TABLE `users` DISABLE KEYS */;
INSERT INTO `users` VALUES (1,'Jón Hilmar','jBecgroup-1',NULL,NULL,3,0,0,'https://fbcdn-sphotos-f-a.akamaihd.net/hphotos-ak-xap1/t31.0-8/10659029_10152888910282668_656087738497958030_o.jpg','2015-02-01 16:56:13','2015-02-01 16:56:15',NULL,NULL,0),(2,'hjuh','jhgjhg',NULL,NULL,0,0,0,NULL,'2015-02-01 16:56:13','2015-02-01 16:56:15',NULL,NULL,0),(3,'kjarrith@gmail.com','$2y$10$Y0E6kXazeXpXS38n4WtUKORLt.EwiujUX15onDs1jjRCA1GWXIJtm','Kjartan','Thorisson',3,162,3075,'https://fbcdn-sphotos-f-a.akamaihd.net/hphotos-ak-xpa1/v/t1.0-9/10001381_10203410549403407_1147776395_n.jpg?oh=a83d5121d08d10e0cb81d9fbdbf2e099&oe=55586D96&__gda__=1428319606_bf74ce41a8be8ad45e5902c732fe84a5','2015-02-01 16:56:13','2015-02-01 16:56:15','2015-03-16 23:31:54','mQ6UIpnaWIpBvNB4cJoZkWi0GIiecXnFvNZxHpE0TN5p75XvLeOY3av8VNRf',1),(4,'astgeir@gmail.com','12345','Ástgeir','Ólafsson',2,0,5000,NULL,'0000-00-00 00:00:00','0000-00-00 00:00:00',NULL,NULL,0),(5,'gunnar@gmail.com','$2y$10$SKQZ90MdSiEsebVXS/UGyuIibuiG.XWftiNV.PmQByRXheIjNZGze','Gunnar','Thoroddsen',1,0,2344,NULL,'0000-00-00 00:00:00','0000-00-00 00:00:00','2015-03-14 17:26:42','lpYechxWj6JdzNJN7koazudbJXF2aEKalXpBoczF97QOADRMwKRhHdBivYdj',0),(6,'',NULL,'Hörður','Guðmundsson',5,0,34544,NULL,'0000-00-00 00:00:00','0000-00-00 00:00:00',NULL,NULL,0),(7,'',NULL,'Jón','Karlsson',1,0,3565,NULL,'0000-00-00 00:00:00','0000-00-00 00:00:00',NULL,NULL,0),(8,'',NULL,'Sigurgeir','Jónasson',3,0,6788,NULL,'0000-00-00 00:00:00','0000-00-00 00:00:00',NULL,NULL,0),(9,'',NULL,'Geir ','Zoega',1,0,1500,NULL,'0000-00-00 00:00:00','0000-00-00 00:00:00',NULL,NULL,0),(10,'',NULL,'Árni Steinn','Viggóson',1,0,2450,NULL,'0000-00-00 00:00:00','0000-00-00 00:00:00',NULL,NULL,0),(11,'k.geirsson@gmail.com','$2y$10$LvudI0n7Dk.r8kRv./EyseUkwupiJAVL4GKOTeJHMSsBxHEKvQyyu','Kristján Ingi','Geirsson',1,5,506,NULL,'0000-00-00 00:00:00','0000-00-00 00:00:00','2015-03-15 19:01:38','CktInpZIR5XIfNZtnPb9p08UqQa8BwLHhy8Vgwvzj6gyaHszeMMJNA3iO9wy',0),(12,'',NULL,NULL,NULL,1,0,0,NULL,'0000-00-00 00:00:00','0000-00-00 00:00:00',NULL,NULL,0),(13,'laksdjf@sddf.is','$2y$10$RFBXhlBeo1weNYVH1gci5OFBRe6T/5BuNdQNfOeIiERVPB0bdged.','gunnar','skeggsson',1,0,500,NULL,'0000-00-00 00:00:00','0000-00-00 00:00:00',NULL,NULL,0),(14,'kjadsf@sdf.is','$2y$10$BuUokXao1wOjJt3ObQcfZeNWppFZEhqyTVGZDSBOGFsVhzgIIz3Lu','gunnar','skeggsson',1,0,500,NULL,'0000-00-00 00:00:00','0000-00-00 00:00:00','2015-03-15 19:36:12','pR6RTDXoRzjGT4klQrNrWxm5DgxhcBRQk9CWMOYYtaTkpm5g7gPqna9WDE68',0);
/*!40000 ALTER TABLE `users` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2015-03-17 13:21:09

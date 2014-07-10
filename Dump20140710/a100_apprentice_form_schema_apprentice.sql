CREATE DATABASE  IF NOT EXISTS `a100_apprentice_form_schema` /*!40100 DEFAULT CHARACTER SET latin1 */;
USE `a100_apprentice_form_schema`;
-- MySQL dump 10.13  Distrib 5.6.13, for osx10.6 (i386)
--
-- Host: 127.0.0.1    Database: a100_apprentice_form_schema
-- ------------------------------------------------------
-- Server version	5.5.34

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
-- Table structure for table `apprentice`
--

DROP TABLE IF EXISTS `apprentice`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `apprentice` (
  `apprentice_id` int(11) NOT NULL AUTO_INCREMENT,
  `first_name` varchar(45) DEFAULT NULL,
  `last_name` varchar(45) DEFAULT NULL,
  `email_address` varchar(45) DEFAULT NULL,
  `passsword` varchar(45) DEFAULT NULL,
  `major` varchar(35) DEFAULT NULL,
  `graduation_date` date DEFAULT NULL,
  `address` varchar(45) DEFAULT NULL,
  `city` varchar(45) DEFAULT NULL,
  `state` varchar(45) DEFAULT NULL,
  `zip_code` varchar(45) DEFAULT NULL,
  `mobile_phone` varchar(45) DEFAULT '(###)###-###',
  `linkedin_profile` varchar(45) DEFAULT NULL,
  `online_portfolio` varchar(45) DEFAULT NULL,
  `work_status` char(4) DEFAULT NULL,
  `age` char(4) DEFAULT NULL,
  `schedule` varchar(250) DEFAULT NULL,
  `created_date` date DEFAULT NULL,
  `active` char(4) DEFAULT NULL,
  `Other` varchar(50) DEFAULT NULL,
  `path_id` int(11) NOT NULL,
  `institution_id` int(11) DEFAULT NULL,
  `cohort_id` int(11) DEFAULT NULL,
  PRIMARY KEY (`apprentice_id`),
  KEY `path_id_idx` (`path_id`),
  KEY `id` (`institution_id`),
  KEY `id_idx` (`cohort_id`),
  CONSTRAINT `id` FOREIGN KEY (`institution_id`) REFERENCES `institution` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `path_id` FOREIGN KEY (`path_id`) REFERENCES `path_to_a100` (`path_id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `apprentice`
--

LOCK TABLES `apprentice` WRITE;
/*!40000 ALTER TABLE `apprentice` DISABLE KEYS */;
INSERT INTO `apprentice` VALUES (1,'pinxia ','li','pinch123us@yahoo,com','123456','CS','2015-01-20','644 Prospect Street','New Haven','CT','06511','(203)-479-2998','N/A','N/A','1','Yes','20 hours ','2014-07-10','Yes','N/A',1,1,1),(2,'Nitish','Mathur','mathur.nitish@gmail.com','123456','CS','2014-07-10','',NULL,NULL,NULL,'(###)###-###','2','N/A','Yes','Yes','Monday: 5:30-8:30pm; Wednesday: 5:30-8:30pm; Friday: 3-5pm','2014-07-10','Yes','N/A',2,3,2),(3,'Timith','Smith','smithtim108@gmail.com','111111','CS','2014-07-10','211 Willow','New Haven','CT','06511','(203)123-1234','N/A','N/A','Yes','Yes','Available','2014-07-10','Yes','N/A',2,2,2);
/*!40000 ALTER TABLE `apprentice` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2014-07-10 19:05:52

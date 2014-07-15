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
-- Table structure for table `technical_experience`
--

DROP TABLE IF EXISTS `technical_experience`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `technical_experience` (
  `tech_id` int(11) NOT NULL AUTO_INCREMENT,
  `program_id` int(11) NOT NULL,
  `front_end_id` int(11) NOT NULL,
  `content_mgmt_id` int(11) NOT NULL,
  `work_id` int(11) NOT NULL,
  `app_stack_id` int(11) NOT NULL,
  `other` varchar(45) DEFAULT NULL,
  PRIMARY KEY (`tech_id`),
  KEY `program_id_idx` (`program_id`),
  KEY `content_mgmt_id_idx` (`content_mgmt_id`),
  KEY `front_end_id_idx` (`front_end_id`),
  KEY `work_id_idx` (`work_id`),
  KEY `app_stack_id_idx` (`app_stack_id`),
  CONSTRAINT `app_stack_id` FOREIGN KEY (`app_stack_id`) REFERENCES `application_stack` (`app_stack_id`) ON DELETE NO ACTION ON UPDATE CASCADE,
  CONSTRAINT `content_mgmt_id` FOREIGN KEY (`content_mgmt_id`) REFERENCES `content_management_system` (`content_mgmt_id`) ON DELETE NO ACTION ON UPDATE CASCADE,
  CONSTRAINT `front_end_id` FOREIGN KEY (`front_end_id`) REFERENCES `front_end_language` (`front_end_id`) ON DELETE NO ACTION ON UPDATE CASCADE,
  CONSTRAINT `program_id` FOREIGN KEY (`program_id`) REFERENCES `programming_experience` (`program_id`) ON DELETE NO ACTION ON UPDATE CASCADE,
  CONSTRAINT `work_id` FOREIGN KEY (`work_id`) REFERENCES `work_experience` (`work_id`) ON DELETE NO ACTION ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `technical_experience`
--

LOCK TABLES `technical_experience` WRITE;
/*!40000 ALTER TABLE `technical_experience` DISABLE KEYS */;
/*!40000 ALTER TABLE `technical_experience` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2014-07-15 17:09:36

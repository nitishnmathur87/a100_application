CREATE DATABASE  IF NOT EXISTS `A100 Database` /*!40100 DEFAULT CHARACTER SET latin1 */;
USE `A100 Database`;
-- MySQL dump 10.13  Distrib 5.6.13, for osx10.6 (i386)
--
-- Host: localhost    Database: A100 Database
-- ------------------------------------------------------
-- Server version	5.6.17

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
-- Table structure for table `Apprentice`
--

DROP TABLE IF EXISTS `Apprentice`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `Apprentice` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(45) NOT NULL,
  `cohort` varchar(15) DEFAULT NULL,
  `address` varchar(20) DEFAULT NULL,
  `city` varchar(20) NOT NULL,
  `telephone` bigint(20) DEFAULT '0',
  `school` varchar(25) DEFAULT NULL,
  `graduation` varchar(15) DEFAULT NULL,
  `visa` varchar(10) DEFAULT NULL,
  `veteran` varchar(10) DEFAULT NULL,
  `comments` text,
  `work experience` double DEFAULT '0',
  `unix_linux` int(1) NOT NULL DEFAULT '0',
  `sql` int(1) NOT NULL DEFAULT '0',
  `git` int(1) NOT NULL DEFAULT '0',
  `wordpress` int(1) NOT NULL DEFAULT '0',
  `drupal` int(1) NOT NULL DEFAULT '0',
  `python` int(1) NOT NULL DEFAULT '0',
  `svn` int(1) NOT NULL DEFAULT '0',
  `objective_c` int(1) NOT NULL DEFAULT '0',
  `ruby_rails` int(1) NOT NULL DEFAULT '0',
  `c_plusplus` int(1) NOT NULL DEFAULT '0',
  `dot_net` int(1) NOT NULL DEFAULT '0',
  `php` int(1) NOT NULL DEFAULT '0',
  `html_css` int(1) NOT NULL DEFAULT '0',
  `java` int(1) NOT NULL DEFAULT '0',
  `javascript` int(1) NOT NULL DEFAULT '0',
  `interest1` varchar(30) DEFAULT NULL,
  `interest2` varchar(30) DEFAULT NULL,
  `interest3` varchar(30) DEFAULT NULL,
  `Email` varchar(45) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `Apprentice`
--

LOCK TABLES `Apprentice` WRITE;
/*!40000 ALTER TABLE `Apprentice` DISABLE KEYS */;
/*!40000 ALTER TABLE `Apprentice` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2014-06-26 22:23:18

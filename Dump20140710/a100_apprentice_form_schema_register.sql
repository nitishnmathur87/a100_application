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
-- Table structure for table `register`
--

DROP TABLE IF EXISTS `register`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `register` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `first_name` varchar(45) DEFAULT NULL,
  `last_name` varchar(45) DEFAULT NULL,
  `email_address` varchar(45) DEFAULT NULL,
  `password` varchar(45) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=35 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `register`
--

LOCK TABLES `register` WRITE;
/*!40000 ALTER TABLE `register` DISABLE KEYS */;
INSERT INTO `register` VALUES (1,'pinxia','li','p@gmail.com','password'),(2,'xiao','wang','wang@yaho.com','123456'),(4,'fang','wang','fang@gmail.com','123456'),(5,'pinxia','li','pli3@gmail.com','123456'),(6,'ray','el','el@gmail.com','111111'),(7,'San','Liu','san@yahoo.com','111111'),(8,'rose','pink','rose@yahoo.com','111111'),(9,'mary','huntington','mary@yahoo.com','111111'),(10,'John','Edward','john@yahoo.com','111111'),(11,'Nitish','Mathur','mathur.nitish@gmail.com','4c9de483c348a67448b306155b9451229e850a86f1532'),(12,'Timith','Smith','tim@gmail.com','d0d0859bb28b00a2a5d86fdd57d9ef985ff0cb4f50a84'),(13,'tim','tom','tim@hotmail.com','bab461f7b36c9292bf9f0c62c48ebf5ee939999f788e7'),(14,'ahmet','sen','52ahmetsen@gmail.com','872f389301a39a1d9555717661d0ed11d9c0a788ee530'),(15,'Nicholas','Aponte','nick@hotmailc.om','7e2e76cffc612e3cdfa4e2d3ac2a910c7acc7020e267c'),(17,'Scott','Russel','scottedwardrussell@gmail.com','fe6b752c7e48a1c82ef481146e1109f134bfef3b01f6c'),(18,'wu','han','wu@hotmail.com','41c20709b363e7c4631c68fcb6086de19cb97f312b527'),(19,'Blake','Praharaj','blakekp@gmail.com','3efb9f92fdca39912f113833d20c0279b4d6195f18b73'),(33,'Thad','Ng','thaddeus.a.ng@gmail.com','295bcedc24ca990fc947009724af4e6ad14c6745ec945'),(34,'Nitish','Krishna','kniti@gmail.com','eec05be3490c7ad623b04f9a46a1953713765647ed58a');
/*!40000 ALTER TABLE `register` ENABLE KEYS */;
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

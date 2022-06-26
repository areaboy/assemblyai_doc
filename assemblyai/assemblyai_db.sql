-- MariaDB dump 10.19  Distrib 10.4.19-MariaDB, for Win64 (AMD64)
--
-- Host: localhost    Database: assemblyai
-- ------------------------------------------------------
-- Server version	10.4.19-MariaDB

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;

--
-- Table structure for table `sentiments`
--

DROP TABLE IF EXISTS `sentiments`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `sentiments` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `conversation_id` varchar(200) DEFAULT NULL,
  `documents` text DEFAULT NULL,
  `score` varchar(200) DEFAULT NULL,
  `sentiments` varchar(200) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=61 DEFAULT CHARSET=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `sentiments`
--

LOCK TABLES `sentiments` WRITE;
/*!40000 ALTER TABLE `sentiments` DISABLE KEYS */;
INSERT INTO `sentiments` VALUES (57,'o39z4tfcph-f99d-4d5c-98e4-5c43ff8cdf0a','This product is really nice.','0.98889845609665','POSITIVE'),(58,'o39z4tfcph-f99d-4d5c-98e4-5c43ff8cdf0a','Some are bad while others are good.','0.52502274513245','NEGATIVE'),(59,'o39z4tfcph-f99d-4d5c-98e4-5c43ff8cdf0a','USA Fred Saudi Feeding I will be here at France.','0.93011206388474','NEUTRAL'),(60,'o39z4tfcph-f99d-4d5c-98e4-5c43ff8cdf0a','The best job ever.','0.97755265235901','POSITIVE');
/*!40000 ALTER TABLE `sentiments` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Dumping routines for database 'assemblyai'
--
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2022-06-26 11:29:47

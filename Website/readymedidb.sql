-- MySQL dump 10.19  Distrib 10.3.36-MariaDB, for debian-linux-gnu (x86_64)
--
-- Host: localhost    Database: readymedi
-- ------------------------------------------------------
-- Server version	10.3.36-MariaDB-0+deb10u2

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
-- Table structure for table `Illness`
--

DROP TABLE IF EXISTS `Illness`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `Illness` (
  `illid` int(11) NOT NULL,
  `name` text NOT NULL,
  `description` text NOT NULL,
  PRIMARY KEY (`illid`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 `ENCRYPTION_KEY_ID`=100;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `Illness`
--

LOCK TABLES `Illness` WRITE;
/*!40000 ALTER TABLE `Illness` DISABLE KEYS */;
INSERT INTO `Illness` VALUES (1,'Valley Fever','fungal infection caused by coccidioides that are often breathed in'),(2,'Common Cold','viral infection of the nose and throat');
/*!40000 ALTER TABLE `Illness` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `Illness_Symptoms`
--

DROP TABLE IF EXISTS `Illness_Symptoms`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `Illness_Symptoms` (
  `name` text NOT NULL,
  `description` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 `ENCRYPTION_KEY_ID`=100;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `Illness_Symptoms`
--

LOCK TABLES `Illness_Symptoms` WRITE;
/*!40000 ALTER TABLE `Illness_Symptoms` DISABLE KEYS */;
INSERT INTO `Illness_Symptoms` VALUES ('Common Cold','Sore Throat'),('Valley Fever','Cough, Fatigue, Fever, Shortness of Breath, Headache, Night Sweats, Muscle aches or joint pain, Rash on upper body or legs');
/*!40000 ALTER TABLE `Illness_Symptoms` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `Patient`
--

DROP TABLE IF EXISTS `Patient`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `Patient` (
  `patId` int(11) NOT NULL,
  `name` text NOT NULL,
  PRIMARY KEY (`patId`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 `ENCRYPTION_KEY_ID`=100;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `Patient`
--

LOCK TABLES `Patient` WRITE;
/*!40000 ALTER TABLE `Patient` DISABLE KEYS */;
INSERT INTO `Patient` VALUES (1111,'Billy'),(1222,'Billy Bob'),(1333,'Billy Bob Joe');
/*!40000 ALTER TABLE `Patient` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2023-02-21 18:56:53

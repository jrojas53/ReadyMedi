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
INSERT INTO `Illness` VALUES (1,'Valley Fever','fungal infection caused by coccidioides that are often breathed in'),(2,'Common Cold','viral infection of the nose and throat'),(3,'Flu','viral infection of the respiratory tract caused by influenze viruses'),(4,'Strep Throat','infection of the back of the throat caused by the bacteria Streptococcus pyogenes'),(5,'Pink Eye','Conjunctivitis, inflammation of the outer layer of the white part of the eye'),(6,'Stomach Flu','Viral gastroenteritis, inflammation and irritation of stomach and intestines'),(7,'Chickenpox','viral illness caused by varicella zoster forming itchy blisters'),(8,'Pneumonia','inflammatory condition of the lung affecting alveoli by virus or bacteria'),(9,'Asthma','long-term inflammatory disease of the aiways of the lungs causing airflow obstruction'),(10,'COVID-19','highly contagious disease caused by severe acute respiratory syndrom coronavirus 2'),(11,'Diabetes','common endocrine disease characterized by sustained high blood sugar levels');
/*!40000 ALTER TABLE `Illness` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `Illness_Symptoms`
--

DROP TABLE IF EXISTS `Illness_Symptoms`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `Illness_Symptoms` (
  `illid` int(11) DEFAULT NULL,
  `name` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 `ENCRYPTION_KEY_ID`=100;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `Illness_Symptoms`
--

LOCK TABLES `Illness_Symptoms` WRITE;
/*!40000 ALTER TABLE `Illness_Symptoms` DISABLE KEYS */;
INSERT INTO `Illness_Symptoms` VALUES (1,'Sore Throat'),(1,'Cough'),(1,'Fever'),(1,'Shortness of Breath'),(2,'Cough'),(2,'Sneeze'),(2,'Stuffy Nose'),(2,'Watery Eyes'),(2,'Fever'),(2,'Mucus'),(3,'Fever'),(3,'Cough'),(3,'Sore Throat'),(3,'Runny or Stuffy Nose'),(3,'Muscle Aches'),(3,'Body Aches'),(3,'Headache'),(3,'Fatigue'),(4,'Throat pain'),(4,'Painful Swallowing'),(4,'Swollen, Tender Lymph Nodes'),(4,'Fever'),(4,'Headache'),(4,'Rash'),(4,'Tiny Red Spots on the back of the roof of mouth'),(5,'Pink or Red Color in the White of the Eyes'),(5,'Increased tear Production');
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

--
-- Table structure for table `Symptom`
--

DROP TABLE IF EXISTS `Symptom`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `Symptom` (
  `sympid` int(11) NOT NULL,
  `name` text NOT NULL,
  PRIMARY KEY (`sympid`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 `ENCRYPTION_KEY_ID`=100;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `Symptom`
--

LOCK TABLES `Symptom` WRITE;
/*!40000 ALTER TABLE `Symptom` DISABLE KEYS */;
INSERT INTO `Symptom` VALUES (1,'Cough'),(2,'Mucus'),(3,'Phlegm'),(4,'Sneezing'),(5,'Congestion'),(6,'Runny nose'),(7,'Loss of smell'),(8,'Chills'),(9,'Fever'),(10,'Fatigue'),(11,'Headache'),(12,'Sore Throat'),(13,'Sinus Pressure');
/*!40000 ALTER TABLE `Symptom` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2023-02-25 17:21:44

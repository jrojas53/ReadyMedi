-- MySQL dump 10.19  Distrib 10.3.38-MariaDB, for debian-linux-gnu (x86_64)
--
-- Host: localhost    Database: readymedi
-- ------------------------------------------------------
-- Server version	10.3.38-MariaDB-0+deb10u1

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
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci `ENCRYPTION_KEY_ID`=100;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `Illness`
--

LOCK TABLES `Illness` WRITE;
/*!40000 ALTER TABLE `Illness` DISABLE KEYS */;
INSERT INTO `Illness` VALUES (1,'Valley Fever','fungal infection caused by coccidioides that are often breathed in'),(2,'Common Cold','viral infection of the nose and throat'),(3,'Flu','viral infection of the respiratory tract caused by influenze viruses'),(4,'Strep Throat','infection of the back of the throat caused by the bacteria Streptococcus pyogenes'),(5,'Pink Eye','Conjunctivitis, inflammation of the outer layer of the white part of the eye'),(6,'Stomach Flu','Viral gastroenteritis, inflammation and irritation of stomach and intestines'),(7,'Chickenpox','viral illness caused by varicella zoster forming itchy blisters'),(8,'Pneumonia','inflammatory condition of the lung affecting alveoli by virus or bacteria'),(9,'Asthma','long-term inflammatory disease of the aiways of the lungs causing airflow obstruction'),(10,'COVID-19','highly contagious disease caused by severe acute respiratory syndrome coronavirus 2'),(11,'Diabetes','common endocrine disease characterized by sustained high blood sugar levels'),(12,'Hypertension','blood pressure that is higher than normal'),(13,'Obesity','excessive body fat that increases the risk of other health problems'),(14,'Arthritis','inflammations of joints, causing pain and stiffness that can worsen with age'),(15,'Gingivitis','gum disease that causes inflamed gums'),(16,'Osteoporosis','bone disease that develops when bone mineral density and bone mass decreases'),(17,'Sleep Apnea','a sleep disorder in which breathing repeatedly stops and starts'),(18,'Allergic Rhinitis','Inflammation of the inside of the nose caused by an allergen'),(19,'COPD','Chronic obstructive pulmonary disease, causes airflow blockage and breathing problems'),(20,'Acne','Common skin condition that causes spots on skin'),(21,'Eczema','Dermatitis, inflammation of the skin'),(22,'Migraine','Headache of varying intensity'),(23,'IBS','Irritable Bowel Syndrome, condition characterized by digestive problems'),(24,'Acid Reflux','digestive disease in which stomach acid or bile irritates the food pipe lining'),(25,'Kidney Stone','a small, hard deposit that forms in the kidneys and is often painful when passed'),(26,'Laryngitis','Inflammation of the larynx, the voice box'),(27,'Measles','an acute viral respiratory illness'),(28,'Cellulitis','a common bacterial skin infection that could be potentially serious'),(29,'Kidney Disease','nephropathy, which is damage to the kidney'),(30,'Epilepsy','a neurological disorder in which nerve cell activity in the brain is disturbed'),(31,'Allergies','An immune system response to foreign substances');
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
  `name` text NOT NULL,
  `sympid` int(11) DEFAULT NULL,
  `question_ID` int(11) DEFAULT NULL,
  KEY `question_ID` (`question_ID`),
  CONSTRAINT `Illness_Symptoms_ibfk_1` FOREIGN KEY (`question_ID`) REFERENCES `demo_questions` (`question_ID`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci `ENCRYPTION_KEY_ID`=100;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `Illness_Symptoms`
--

LOCK TABLES `Illness_Symptoms` WRITE;
/*!40000 ALTER TABLE `Illness_Symptoms` DISABLE KEYS */;
INSERT INTO `Illness_Symptoms` VALUES (1,'Throat pain',12,24),(1,'Cough',1,8),(1,'Fever',9,9),(1,'Shortness of Breath',14,10),(2,'Cough',1,8),(2,'sneezing',15,19),(2,'runny nose',6,6),(2,'Watery Eyes',17,1),(2,'Fever',9,9),(2,'Mucus',2,17),(3,'Fever',9,9),(3,'Cough',1,8),(3,'Throat pain',12,24),(3,'runny nose',6,6),(3,'Body Aches',18,7),(3,'Headache',11,15),(3,'Fatigue',10,12),(4,'Throat pain',12,24),(4,'Painful Swallowing',19,29),(4,'Swollen/Tender Lymph Nodes',20,30),(4,'Fever',9,9),(4,'Headache',11,15),(4,'Rash',21,3),(4,'Tiny Red Spots on the back of the roof of mouth',22,31),(5,'Pink or Red Color in the White of the Eyes',23,71),(5,'Increased tear Production',24,72),(6,'Diarrhea',25,5),(6,'Cramps',26,73),(6,'Flatulence',27,74),(6,'Nausea',28,14),(6,'Vomit',29,13),(6,'Dehydration',30,76),(6,'Appetite loss',31,75),(6,'Belching',32,32),(6,'Indigestion',33,33),(6,'Fatigue',10,12),(6,'Chills',8,23),(6,'Headache',11,15),(7,'Itchiness',34,34),(7,'Blisters',35,35),(7,'Scabs',36,36),(7,'Fatigue',10,12),(7,'Throat pain',12,24),(7,'Appetite Loss',31,75),(7,'Swollen/Tender Lymph Nodes',20,30),(8,'Cough',1,8),(8,'Phlegm',3,18),(8,'Fever',9,9),(8,'Rapid Heartbeat',38,38),(8,'Difficulty Breathing',39,39),(8,'Chills',8,23),(8,'Sweating',40,40),(8,'Fatigue',10,12),(9,'Shortness of Breath',14,10),(9,'Cough',1,8),(9,'Wheezing',41,41),(9,'Difficulty Breathing',39,39),(9,'Chest Pain',42,42),(9,'Chest Tightness',43,43),(10,'Loss of taste',44,44),(10,'Fever',9,9),(10,'Shortness of Breath',14,10),(10,'Cough',1,8),(10,'Difficulty Breathing',39,39),(10,'Chills',8,23),(10,'Fatigue',10,12),(10,'Body Aches',18,7),(10,'Headache',11,15),(11,'Frequent need to urinate',45,45),(11,'Often hungry',46,46),(11,'Often thirsty',47,47),(11,'Blurry vision',48,48),(11,'Loss of weight',49,49),(11,'Dry skin',50,50),(11,'Tingling hands or feet',51,51),(11,'Numbness in hands or feet',52,52),(12,'High Blood Pressure',53,53),(13,'Overweight',54,54),(13,'High body fat',55,55),(14,'joint pain',56,56),(14,'swelling',57,57),(14,'restricted joint movement',58,58),(14,'warm red skin over joints',59,59),(15,'gum irritation',60,60),(15,'gum swelling',61,61),(15,'gum bleeding',62,62),(16,'bone fracture',63,63),(16,'stooped posture',64,64),(16,'height loss',65,65),(17,'daytime sleepiness',66,66),(17,'insomnia',67,67),(17,'sleep deprivation',68,68),(17,'loud snoring',69,69),(18,'sneezing',4,19),(18,'congestion',5,20),(18,'runny nose',6,6),(18,'nose redness',70,70),(19,'cough',1,8),(19,'phlegm',3,18),(19,'shortness of breath',14,10),(19,'wheezing',41,41),(19,'Fatigue',10,12),(19,'chest tightness',43,43),(22,'Headache',11,15),(22,'Nausea',28,14),(22,'sensitivity to light',71,16),(31,'runny nose',6,6),(31,'Sneezing',15,19),(31,'Rash',21,3),(31,'Diarrhea',25,5),(31,'tenderness in face',73,4),(22,'Throbbing side head pain',74,11),(10,'loss of smell',7,21),(2,'sinus pressure',13,25),(3,'sinus pressure',13,25),(2,'stuffy nose',16,26),(3,'stuffy nose',16,26),(31,'Watery eyes',17,27),(2,'Body aches',18,28),(3,'Body aches',18,28),(7,'Body aches',37,37);
/*!40000 ALTER TABLE `Illness_Symptoms` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `MIKETYSON`
--

DROP TABLE IF EXISTS `MIKETYSON`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `MIKETYSON` (
  `test_ID` int(11) NOT NULL AUTO_INCREMENT,
  `first_ill` char(225) DEFAULT NULL,
  `first_percent` int(11) DEFAULT NULL,
  `sec_ill` char(225) DEFAULT NULL,
  `sec_percent` int(11) DEFAULT NULL,
  `third_ill` char(225) DEFAULT NULL,
  `third_percent` int(11) DEFAULT NULL,
  `symptoms` char(225) DEFAULT NULL,
  PRIMARY KEY (`test_ID`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci `ENCRYPTION_KEY_ID`=100;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `MIKETYSON`
--

LOCK TABLES `MIKETYSON` WRITE;
/*!40000 ALTER TABLE `MIKETYSON` DISABLE KEYS */;
/*!40000 ALTER TABLE `MIKETYSON` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `Mick`
--

DROP TABLE IF EXISTS `Mick`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `Mick` (
  `test_ID` int(11) NOT NULL AUTO_INCREMENT,
  `first_ill` char(225) DEFAULT NULL,
  `first_percent` int(11) DEFAULT NULL,
  `sec_ill` char(225) DEFAULT NULL,
  `sec_percent` int(11) DEFAULT NULL,
  `third_ill` char(225) DEFAULT NULL,
  `third_percent` int(11) DEFAULT NULL,
  `symptoms` char(225) DEFAULT NULL,
  PRIMARY KEY (`test_ID`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci `ENCRYPTION_KEY_ID`=100;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `Mick`
--

LOCK TABLES `Mick` WRITE;
/*!40000 ALTER TABLE `Mick` DISABLE KEYS */;
/*!40000 ALTER TABLE `Mick` ENABLE KEYS */;
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
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci `ENCRYPTION_KEY_ID`=100;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `Patient`
--

LOCK TABLES `Patient` WRITE;
/*!40000 ALTER TABLE `Patient` DISABLE KEYS */;
INSERT INTO `Patient` VALUES (15,'john_doe'),(18,'jane_doe'),(27,'k_test'),(28,'jrojas'),(29,'BobRoss7'),(30,'test_krissy'),(32,'k_test2'),(33,'k_test3'),(35,'k_test4'),(37,'k_test5'),(40,'k_test6'),(42,'k_test7'),(44,'k_test8'),(49,'k_test9'),(51,'k_test10'),(53,'k_test11'),(54,'k_test12'),(55,'k_tesst13'),(56,'k_test14'),(57,'k_test15'),(58,'k_test16'),(59,'k_tesst17'),(60,'k_test18'),(61,'k_test19'),(62,'k_tesst20'),(63,'k_test21'),(64,'k_test22'),(65,'k_tesst23'),(66,'k_test24'),(68,'k_test25'),(70,'k_tesst26'),(71,'k_test27'),(73,'j_test21'),(74,'happyhappyhappy'),(75,'BruceKickButt'),(76,'smithy'),(81,'j_test2'),(1111,'Billy'),(1222,'Billy Bob'),(1333,'Billy Bob Joe');
/*!40000 ALTER TABLE `Patient` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `Patient_Symptoms`
--

DROP TABLE IF EXISTS `Patient_Symptoms`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `Patient_Symptoms` (
  `patId` int(11) DEFAULT NULL,
  `sympid` int(11) DEFAULT NULL,
  KEY `patId` (`patId`),
  KEY `sympid` (`sympid`),
  CONSTRAINT `Patient_Symptoms_ibfk_1` FOREIGN KEY (`patId`) REFERENCES `Patient` (`patId`),
  CONSTRAINT `Patient_Symptoms_ibfk_2` FOREIGN KEY (`sympid`) REFERENCES `Symptom` (`sympid`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci `ENCRYPTION_KEY_ID`=100;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `Patient_Symptoms`
--

LOCK TABLES `Patient_Symptoms` WRITE;
/*!40000 ALTER TABLE `Patient_Symptoms` DISABLE KEYS */;
/*!40000 ALTER TABLE `Patient_Symptoms` ENABLE KEYS */;
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
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci `ENCRYPTION_KEY_ID`=100;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `Symptom`
--

LOCK TABLES `Symptom` WRITE;
/*!40000 ALTER TABLE `Symptom` DISABLE KEYS */;
INSERT INTO `Symptom` VALUES (1,'Cough'),(2,'Mucus'),(3,'Phlegm'),(4,'Sneezing'),(5,'Congestion'),(6,'Runny nose'),(7,'Loss of smell'),(8,'Chills'),(9,'Fever'),(10,'Fatigue'),(11,'Headache'),(12,'Sore Throat'),(13,'Sinus Pressure'),(14,'Shortness of Breath'),(15,'Sneeze'),(16,'Stuffy Nose'),(17,'Watery Eyes'),(18,'Body Aches'),(19,'Painful Swallowing'),(20,'Swollen, Tender Lymph Nodes'),(21,'Rash'),(22,'Tiny Red Spots on the back of the roof of mouth'),(23,'Pink or Red Color in the White of the Eyes'),(24,'Increased tear production'),(25,'Diarrhea'),(26,'Cramps'),(27,'Flatulence'),(28,'Nausea'),(29,'Vomit'),(30,'Dehydration'),(31,'Loss of appetite'),(32,'Belching'),(33,'Indigestion'),(34,'Itchiness'),(35,'Blisters'),(36,'Scabs'),(37,'Red Spots'),(38,'Rapid Heartbeat'),(39,'Difficulty Breathing'),(40,'Sweating'),(41,'Wheezing'),(42,'Chest Pain'),(43,'Chest Tightness'),(44,'Loss of taste'),(45,'Frequent need to urinate'),(46,'Often hungry'),(47,'Often thirsty'),(48,'Blurry vision'),(49,'Loss of weight'),(50,'Dry skin'),(51,'Tingling hands or feet'),(52,'Numbness in hands or feet'),(53,'High Blood Pressure'),(54,'Overweight'),(55,'High body fat'),(56,'joint pain'),(57,'swelling'),(58,'restricted joint movement'),(59,'warm red skin on joints'),(60,'gum irritation'),(61,'gum swelling'),(62,'gum bleeding'),(63,'bone fracture'),(64,'stooped posture'),(65,'height loss'),(66,'daytime sleepiness'),(67,'insomnia'),(68,'sleep deprivation'),(69,'loud snoring'),(70,'nose redness'),(71,'sensitivity to light'),(72,'eye pain'),(73,'tenderness in face'),(74,'throbbing side head pain'),(75,'eye pain');
/*!40000 ALTER TABLE `Symptom` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `User`
--

DROP TABLE IF EXISTS `User`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `User` (
  `user_id` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(30) NOT NULL,
  `password` text DEFAULT NULL,
  `f_Name` char(225) DEFAULT NULL,
  `l_Name` char(225) DEFAULT NULL,
  `email` varchar(225) DEFAULT NULL,
  PRIMARY KEY (`user_id`),
  UNIQUE KEY `username` (`username`),
  UNIQUE KEY `UC_Email` (`email`),
  CONSTRAINT `username_not_empty` CHECK (`username` <> '')
) ENGINE=InnoDB AUTO_INCREMENT=82 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci `ENCRYPTION_KEY_ID`=100;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `User`
--

LOCK TABLES `User` WRITE;
/*!40000 ALTER TABLE `User` DISABLE KEYS */;
INSERT INTO `User` VALUES (15,'john_doe','$2y$10$xSs/9ocbkS.xLL6jx1MmmeFVDGJ7JBSAZziH3j515BmQL9cS.tURS',NULL,NULL,NULL),(18,'jane_doe','$2y$10$VUq7JlncPOfaIYCYD89WAeMGaSuRCDkp35sVODlOYdRYYohUzwpyK',NULL,NULL,NULL),(27,'k_test','$2y$10$3YY7krBz3SDNkSsvAZOmZu22hNNjrmvpmL2XJH1RqdPPzhA.BeVfG',NULL,NULL,NULL),(28,'jrojas','$2y$10$JmbHtUEQZaPV2dpyrz6Rg.RanAk2Ff8FQaEdXiKScyQtWheJyvnDm',NULL,NULL,NULL),(29,'BobRoss7','$2y$10$jVTCGI4A88i/0QKV/gdLYu2ZPVeXjBZCpxzV7vhdRl5SBhZfZmgA.',NULL,NULL,NULL),(30,'test-krissy','$2y$10$/qYDEGUYk7dsuGHzNDcFxeZ.HNsPcmOa5WbcjuyIDuGLWcgj9BOVu',NULL,NULL,NULL),(32,'k_test2','$2y$10$XN97Ls9JxKtnP3vnQSPr8uENZbO6arnPEkRj6Dp8B9NZ6/uVXgQw.',NULL,NULL,'kcoggshall@csub.edu'),(33,'k_test3','$2y$10$w2NjrxEWi.xU8uowIL1Xa.Mh4MPVLLrAS54X9.AeG31dXUZ6ttUyW',NULL,NULL,'krissy@krissy.poop'),(35,'k_test4','$2y$10$MNvI6.wNFYpxQGEjUYTKh.cIi5FQpkq1k8fvJgc.pdOdmYjVQHTVq','Not Krissy','Not C','notKrissy@whoAsked'),(37,'k_test5','$2y$10$blXKyIAKpu3IzdpyT6i7Mu77jdr7zES.AF0iGvZC4ksyalQlzjVQu','Totally Krissy','Totally yeah','uhuhuhuh@yup.omg'),(40,'k_test6','$2y$10$dSZd9FAb5I/t2HtD72xL.O6HtsLnvD9pGcZD/TGhfUpWNmzoA26B.','Yup','Nope','yes@no.com'),(42,'k_test7','$2y$10$5td.TsrnOA4UXBSvm6./L.9ql6UEXv2/Rov/ubF.MEG1jWbJiWH.i','no','yes','no@yes.com'),(44,'k_test8','$2y$10$j3DPG/gFE71Ajo1o7Grxt.yNNP7N/KBwV9F1XjhQM3MMnZqO93K5e','gyu','fy','dgdt@drgd.fy'),(49,'k_test9','$2y$10$XQAS6k/rvEeYK.gjuI2DxOEK9sUrrLI5CKVrhGwUP2JuBE1MI72Ba','weg','gyu','gui@hui.vd'),(51,'k_test10','$2y$10$b/Ca3QBTwHiQIh7dcNOUbeDMUJtWJV2VLHzEoZn2ciW3lU9Idf4..','vdfvd','fd','dsv@gfbd.dd'),(53,'k_test11','$2y$10$.VzQLp98.Ijkmjcz/U9Cv.0rouAAaBSgkXfMvHxcglaedSRMAhKLe','fdbd','gyufdsguis','GUIDVS@fdiuvgui.c'),(54,'k_test12','$2y$10$tQxmy6XpBcLesCOU.rYPcOVQrKsnqNVcan4XDVF0UdbNXGtj017k2','uhuhuhu','huhuh','huh@huhu.com'),(55,'k_test13','$2y$10$.RYUjlBtYhbzfF848SMikuYgUX0GPSgd8tkHBtlgm92zShUfNrKVm','gr','r','bdrt@'),(56,'k_test14','$2y$10$tkEsca/VDcDgDIhGCyHFTeiIaB.UPW64CEwwMWE6ejfpmTI.aVGw2','frji','gyre','iugig@'),(57,'k_test15','$2y$10$phI.VGzuQuNfSayH5yFSjuQXcuMC6TQVv/ic7PoO3w0t8vMhTWt0q','fgy','gyuefguy','GYGY'),(58,'k_test16','$2y$10$r1YG5jGOwCujtRP2ASwRq.t0dfuLjB9XmLqAy2garIdi67skmPmFa','fe','eda','greg'),(59,'k_test17','$2y$10$zFhl2QjrBrIUWuBgHBpSLuWgm76U4Fp7GcE/xpOsO.g2.JF7fyAbS','rg','rg','era@'),(60,'k_test18','$2y$10$50wHksbPqFvloRAFe3Mp0urvNeTxCKk7k7rtSC14.v1vghWTC0wty','fres','rg','rgr'),(61,'k_test19','$2y$10$k.brtCOpznuXIMYzKpHi3.v3dWAdoNdL8uopASioLg/bnbyp1ZHxS','ee','sthr','thrs'),(62,'k_test20','$2y$10$1VC2LEd1LBJM6MSoBj63Je7aBp.rYvfhWPpu5IYoKWkM19D0Kv/E6','gsr','rgs','dz'),(63,'k_test21','$2y$10$Ze3q2uWEaHp3jXic27x5SelDCNNueYQm6c75dgX4F4J4g2L4kg/Fm','sgr','gsr','sg'),(64,'k_test22','$2y$10$0vnV37hdsBCaTYUCDzhY3uDkIq6JAJtyahlCg0maVSS9P93Qx.Edq','er','fe','er'),(65,'k_test23','$2y$10$QsiE/9k9iSk2MczsxBrm5e8meB685vPxY22KTqmHSlqsmwgldL1W.','fsd','dsg','efw'),(66,'k_test24','$2y$10$3Del9Jx9GivOnF2QzR4DEeGr9Q38EFw2zg7VRrsqmpPNy9MQdHv56','gwe','ewfg','gr'),(68,'k_test25','$2y$10$U2RyFnmhoLiWf3r.IHLDGeOWd6tOi6HKlSf5KswuDWHK0RKIX0KKK','grd','dg','gd'),(70,'k_test26','$2y$10$/oarbBIfPplkNvpRAGlNEuER7j07iYp8GgNENKTCzYyj./jRuDbw.','gbd','gbd','ff'),(71,'k_test27','$2y$10$vB2I38IlqGgleJQgIr8LEu/yfqAvjqLtFwmJVb4UMCPmXqcgGYj26','sf','f','fd'),(73,'j_test1','$2y$10$YEHErxa57B4QBmQOamDXMuPQC48jjw79.v97tTLPWLWPiFR2n8mu2','Jesus','Rojas','jesusmrojas5991@gmail.com'),(74,'happyhappyhappy','$2y$10$agdmaXZLfhGTB7sCCkwXqej8G.tRnD8NHLbP3pB75EmRSkganm9xK','Happy','Gilmore','happyhappy@happy.com'),(75,'BruceKickButt','$2y$10$6HhlONCNMdEi9Ydi.rzkNuRZ674ySkq7HzUh0UJTITUMp/cOU7ZWS','Bruce','Lee','brucerocks@hotmail.com'),(76,'smithy','$2y$10$B6TluOzsuQ5tcLBJEw9P6OFSS/TFECTN2l0QS55JeYshCAmIRSUs.','Bobby','Smith','smithy@aol.com'),(79,'Adam','$2y$10$TD.mSQiMQt5eu.m0p1Jh5e0JAH0UHS/WojHqTBFokAzjjMtnouy3a','Adam','Smith','smithsmith@hotmail.com'),(81,'j_test2','$2y$10$0s.HcVLGjOetRDsChthaKu1Di/lrFu40lpVTfWSCMDMMU/.eCs7AS','Jesus','Rojas','jrojas53@csub.edu');
/*!40000 ALTER TABLE `User` ENABLE KEYS */;
UNLOCK TABLES;
/*!50003 SET @saved_cs_client      = @@character_set_client */ ;
/*!50003 SET @saved_cs_results     = @@character_set_results */ ;
/*!50003 SET @saved_col_connection = @@collation_connection */ ;
/*!50003 SET character_set_client  = utf8mb4 */ ;
/*!50003 SET character_set_results = utf8mb4 */ ;
/*!50003 SET collation_connection  = utf8mb4_general_ci */ ;
/*!50003 SET @saved_sql_mode       = @@sql_mode */ ;
/*!50003 SET sql_mode              = 'STRICT_TRANS_TABLES,ERROR_FOR_DIVISION_BY_ZERO,NO_AUTO_CREATE_USER,NO_ENGINE_SUBSTITUTION' */ ;
DELIMITER ;;
/*!50003 CREATE*/ /*!50017 DEFINER=`readymedi`@`localhost`*/ /*!50003 TRIGGER user_to_patient
AFTER INSERT ON User
for each row
INSERT INTO Patient (patId, name)
values (NEW.user_id, NEW.username) */;;
DELIMITER ;
/*!50003 SET sql_mode              = @saved_sql_mode */ ;
/*!50003 SET character_set_client  = @saved_cs_client */ ;
/*!50003 SET character_set_results = @saved_cs_results */ ;
/*!50003 SET collation_connection  = @saved_col_connection */ ;
/*!50003 SET @saved_cs_client      = @@character_set_client */ ;
/*!50003 SET @saved_cs_results     = @@character_set_results */ ;
/*!50003 SET @saved_col_connection = @@collation_connection */ ;
/*!50003 SET character_set_client  = utf8mb4 */ ;
/*!50003 SET character_set_results = utf8mb4 */ ;
/*!50003 SET collation_connection  = utf8mb4_general_ci */ ;
/*!50003 SET @saved_sql_mode       = @@sql_mode */ ;
/*!50003 SET sql_mode              = 'STRICT_TRANS_TABLES,ERROR_FOR_DIVISION_BY_ZERO,NO_AUTO_CREATE_USER,NO_ENGINE_SUBSTITUTION' */ ;
DELIMITER ;;
/*!50003 CREATE*/ /*!50017 DEFINER=`readymedi`@`localhost`*/ /*!50003 TRIGGER remove_patient
BEFORE DELETE ON User
for each row 
DELETE FROM Patient
WHERE Patient.patId = OLD.user_id */;;
DELIMITER ;
/*!50003 SET sql_mode              = @saved_sql_mode */ ;
/*!50003 SET character_set_client  = @saved_cs_client */ ;
/*!50003 SET character_set_results = @saved_cs_results */ ;
/*!50003 SET collation_connection  = @saved_col_connection */ ;

--
-- Table structure for table `demo_questions`
--

DROP TABLE IF EXISTS `demo_questions`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `demo_questions` (
  `question_ID` int(11) NOT NULL,
  `question_text` varchar(255) NOT NULL,
  `answer1` varchar(255) NOT NULL,
  `answer2` varchar(255) NOT NULL,
  PRIMARY KEY (`question_ID`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci `ENCRYPTION_KEY_ID`=100;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `demo_questions`
--

LOCK TABLES `demo_questions` WRITE;
/*!40000 ALTER TABLE `demo_questions` DISABLE KEYS */;
INSERT INTO `demo_questions` VALUES (1,'Have you experienced an eye infection?','No','Yes'),(2,'Have you experienced eye pain?','No','Yes'),(3,'Have you experienced a rash or hives?','No','Yes'),(4,'Have you experienced tenderness in any part of face?','No','Yes'),(5,'Have you experienced diarrhea?','No','Yes'),(6,'Have you experienced a runny nose?','No','Yes'),(7,'Have you been experiencing body aches?','No','Yes'),(8,'Have you had a cough?','No','Yes'),(9,'Have you had a fever?','No','Yes'),(10,'Have you experienced shortness of breath?','No','Yes'),(11,'Have you had throbbing pain on the sides of your head?','No','Yes'),(12,'Have you experienced fatigue?','No','Yes'),(13,'Have you been vomiting?','No','Yes'),(14,'Have you been experiencing nausea?','No','Yes'),(15,'Have you been having headaches?','No','Yes'),(16,'Have you experienced a sensitivity to light?','No','Yes'),(17,'Have you experienced mucus?','No','Yes'),(18,'Have you experienced phlegm?','No','Yes'),(19,'Have you experienced sneezing?','No','Yes'),(20,'Have you experienced congestion?','No','Yes'),(21,'Have you experienced a loss of smell?','No','Yes'),(23,'Have you experienced chills?','No','Yes'),(24,'Have you experienced a sore throat?','No','Yes'),(25,'Have you experienced sinus pressure?','No','Yes'),(26,'Have you experienced a stuffy nose','No','Yes'),(27,'Have you experienced watery eyes?','No','Yes'),(28,'Have you experienced body aches?','No','Yes'),(29,'Have you experienced pain during swallowing?','No','Yes'),(30,'Have you experienced swollen or tender lymph nodes?','No','Yes'),(31,'Have you experienced red spots on the roof of the mouth?','No','Yes'),(32,'Have you experienced belching?','No','Yes'),(33,'Have you experienced indigestion?','No','Yes'),(34,'Have you experienced itchiness?','No','Yes'),(35,'Have you experienced blisters?','No','Yes'),(36,'Have you had scabs?','No','Yes'),(37,'Have you experienced red spots?','No','Yes'),(38,'Have you experienced a rapid heartbeat?','No','Yes'),(39,'Have you experienced difficulty breathing?','No','Yes'),(40,'Have you experienced an increase in sweating?','No','Yes'),(41,'Have you experienced wheezing?','No','Yes'),(42,'Have you experienced chest pain?','No','Yes'),(43,'Have you experienced tightness in your chest?','No','Yes'),(44,'Have you experienced a loss of taste?','No','Yes'),(45,'Have you experienced an increased need to urinate?','No','Yes'),(46,'Have you experienced frequent hunger?','No','Yes'),(47,'Have you experienced frequent thirstiness?','No','Yes'),(48,'Have you experienced blurry vision?','No','Yes'),(49,'Have you experienced a noticeable loss in weight?','No','Yes'),(50,'Have you experienced dry skin?','No','Yes'),(51,'Have you experienced tingling in your hands or feet?','No','Yes'),(52,'Have you experienced numbness in your hands or feet?','No','Yes'),(53,'Have you experienced high blood pressure?','No','Yes'),(54,'Are you overweight?','No','Yes'),(55,'Do you have high body fat?','No','Yes'),(56,'Have you experienced pain in your joints?','No','Yes'),(57,'Have you experienced swelling?','No','Yes'),(58,'Have you experienced restricted join movement?','No','Yes'),(59,'Is the skin on your joints warm or red?','No','Yes'),(60,'Have you experienced irritation in your gums?','No','Yes'),(61,'Have you experienced swelling in your gums?','No','Yes'),(62,'Have you experienced bleeding gums?','No','Yes'),(63,'Have you experienced a bone fracture?','No','Yes'),(64,'Is your posture stooped?','No','Yes'),(65,'Have you experienced a loss in height?','No','Yes'),(66,'Have you experienced daytime sleepiness?','No','Yes'),(67,'Do you have insomnia?','No','Yes'),(68,'Do you feel sleep deprived?','No','Yes'),(69,'Do you snore loudly?','No','Yes'),(70,'Have you experienced redness in your nose?','No','Yes'),(71,'Have you experienced pink or red in the sclera/whites of your eyes','No','Yes'),(72,'Have you experienced pink an increase in tear production','No','Yes'),(73,'Have you experienced cramps','No','Yes'),(74,'Have you experienced flatulence','No','Yes'),(75,'Have you experienced a loss in appetite?','No','Yes'),(76,'Have you been dehydrated?','No','Yes');
/*!40000 ALTER TABLE `demo_questions` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `j_test1`
--

DROP TABLE IF EXISTS `j_test1`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `j_test1` (
  `test_ID` int(11) NOT NULL AUTO_INCREMENT,
  `first_ill` char(225) DEFAULT NULL,
  `first_percent` int(11) DEFAULT NULL,
  `sec_ill` char(225) DEFAULT NULL,
  `sec_percent` int(11) DEFAULT NULL,
  `third_ill` char(225) DEFAULT NULL,
  `third_percent` int(11) DEFAULT NULL,
  `symptoms` char(225) DEFAULT NULL,
  PRIMARY KEY (`test_ID`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci `ENCRYPTION_KEY_ID`=100;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `j_test1`
--

LOCK TABLES `j_test1` WRITE;
/*!40000 ALTER TABLE `j_test1` DISABLE KEYS */;
/*!40000 ALTER TABLE `j_test1` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `j_test2`
--

DROP TABLE IF EXISTS `j_test2`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `j_test2` (
  `test_ID` int(11) NOT NULL AUTO_INCREMENT,
  `first_ill` char(225) DEFAULT NULL,
  `first_percent` int(11) DEFAULT NULL,
  `sec_ill` char(225) DEFAULT NULL,
  `sec_percent` int(11) DEFAULT NULL,
  `third_ill` char(225) DEFAULT NULL,
  `third_percent` int(11) DEFAULT NULL,
  `symptoms` char(225) DEFAULT NULL,
  PRIMARY KEY (`test_ID`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci `ENCRYPTION_KEY_ID`=100;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `j_test2`
--

LOCK TABLES `j_test2` WRITE;
/*!40000 ALTER TABLE `j_test2` DISABLE KEYS */;
/*!40000 ALTER TABLE `j_test2` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `k_test21`
--

DROP TABLE IF EXISTS `k_test21`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `k_test21` (
  `test_ID` int(11) NOT NULL AUTO_INCREMENT,
  `first_ill` char(225) DEFAULT NULL,
  `first_percent` int(11) DEFAULT NULL,
  `sec_ill` char(225) DEFAULT NULL,
  `sec_percent` int(11) DEFAULT NULL,
  `third_ill` char(225) DEFAULT NULL,
  `third_percent` int(11) DEFAULT NULL,
  `symptoms` char(225) DEFAULT NULL,
  PRIMARY KEY (`test_ID`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci `ENCRYPTION_KEY_ID`=100;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `k_test21`
--

LOCK TABLES `k_test21` WRITE;
/*!40000 ALTER TABLE `k_test21` DISABLE KEYS */;
/*!40000 ALTER TABLE `k_test21` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `k_test23`
--

DROP TABLE IF EXISTS `k_test23`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `k_test23` (
  `test_ID` int(11) NOT NULL AUTO_INCREMENT,
  `first_ill` char(225) DEFAULT NULL,
  `first_percent` int(11) DEFAULT NULL,
  `sec_ill` char(225) DEFAULT NULL,
  `sec_percent` int(11) DEFAULT NULL,
  `third_ill` char(225) DEFAULT NULL,
  `third_percent` int(11) DEFAULT NULL,
  `symptoms` char(225) DEFAULT NULL,
  PRIMARY KEY (`test_ID`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci `ENCRYPTION_KEY_ID`=100;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `k_test23`
--

LOCK TABLES `k_test23` WRITE;
/*!40000 ALTER TABLE `k_test23` DISABLE KEYS */;
/*!40000 ALTER TABLE `k_test23` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `k_test27`
--

DROP TABLE IF EXISTS `k_test27`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `k_test27` (
  `test_ID` int(11) NOT NULL AUTO_INCREMENT,
  `first_ill` char(225) DEFAULT NULL,
  `first_percent` int(11) DEFAULT NULL,
  `sec_ill` char(225) DEFAULT NULL,
  `sec_percent` int(11) DEFAULT NULL,
  `third_ill` char(225) DEFAULT NULL,
  `third_percent` int(11) DEFAULT NULL,
  `symptoms` char(225) DEFAULT NULL,
  PRIMARY KEY (`test_ID`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci `ENCRYPTION_KEY_ID`=100;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `k_test27`
--

LOCK TABLES `k_test27` WRITE;
/*!40000 ALTER TABLE `k_test27` DISABLE KEYS */;
/*!40000 ALTER TABLE `k_test27` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `quiz_questions`
--

DROP TABLE IF EXISTS `quiz_questions`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `quiz_questions` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `question_text` varchar(255) NOT NULL,
  `answer1` varchar(255) NOT NULL,
  `answer2` varchar(255) NOT NULL,
  `answer3` varchar(255) NOT NULL,
  `answer4` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=15 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci `ENCRYPTION_KEY_ID`=100;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `quiz_questions`
--

LOCK TABLES `quiz_questions` WRITE;
/*!40000 ALTER TABLE `quiz_questions` DISABLE KEYS */;
INSERT INTO `quiz_questions` VALUES (1,'Have you experienced headaches?','Never','Rarely','Sometimes','Frequently'),(2,'Have you experienced coughing?','Never','Rarely','Sometimes','Frequently'),(3,'Have you experienced sneezing?','Never','Rarely','Sometimes','Frequently'),(4,'Have you experienced nausea?','Never','Rarely','Sometimes','Frequently'),(5,'Have you experienced diarrhea?','Never','Rarely','Sometimes','Frequently'),(6,'How often have you been outside?','Less than once a day','1-2 times a day','2-3 times a day','More than 3 times a day'),(7,'Have you been experiencing chest pain?','No','Mild','Moderate','Severe'),(8,'Have you had trouble sleeping?','No','Occasionally','Frequently','Every night'),(9,'Have you experienced an unusual amount of tiredness?','No','Occasionally','Frequently','Constantly'),(10,'Have you experienced nasal congestion?','Never','Rarely','Sometimes','Frequently'),(11,'Have you experienced a runny nose?','Never','Rarely','Sometimes','Frequently'),(12,'Have you experienced watery eyes?','Never','Rarely','Sometimes','Frequently'),(13,'Have you been experiencing hives?','No','Mild','Moderate','Severe'),(14,'Have you been experiencing muscle aches?','No','Mild','Moderate','Severe');
/*!40000 ALTER TABLE `quiz_questions` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `role`
--

DROP TABLE IF EXISTS `role`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `role` (
  `role_id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(30) DEFAULT NULL,
  PRIMARY KEY (`role_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci `ENCRYPTION_KEY_ID`=100;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `role`
--

LOCK TABLES `role` WRITE;
/*!40000 ALTER TABLE `role` DISABLE KEYS */;
/*!40000 ALTER TABLE `role` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `userTest`
--

DROP TABLE IF EXISTS `userTest`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `userTest` (
  `testID` int(11) NOT NULL AUTO_INCREMENT,
  `first_ill` char(225) DEFAULT NULL,
  `first_percent` int(11) DEFAULT NULL,
  `sec_ill` char(225) DEFAULT NULL,
  `sec_percent` int(11) DEFAULT NULL,
  `third_ill` char(225) DEFAULT NULL,
  `third_percent` int(11) DEFAULT NULL,
  `symptoms` char(225) DEFAULT NULL,
  PRIMARY KEY (`testID`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci `ENCRYPTION_KEY_ID`=100;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `userTest`
--

LOCK TABLES `userTest` WRITE;
/*!40000 ALTER TABLE `userTest` DISABLE KEYS */;
/*!40000 ALTER TABLE `userTest` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2023-05-14 17:05:08

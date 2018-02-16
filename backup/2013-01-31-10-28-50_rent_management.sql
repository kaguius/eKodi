-- MySQL dump 10.13  Distrib 5.5.29, for debian-linux-gnu (x86_64)
--
-- Host: localhost    Database: rent_management
-- ------------------------------------------------------
-- Server version	5.5.29-0ubuntu0.12.04.1

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
-- Table structure for table `admin_status`
--

DROP TABLE IF EXISTS `admin_status`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `admin_status` (
  `id` int(5) NOT NULL AUTO_INCREMENT,
  `admin_status` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=latin1 COMMENT='latin1_swedish_ci';
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `admin_status`
--

LOCK TABLES `admin_status` WRITE;
/*!40000 ALTER TABLE `admin_status` DISABLE KEYS */;
INSERT INTO `admin_status` VALUES (1,'Administrator'),(2,'Management'),(3,'User'),(4,'Developer'),(5,'Property Owner');
/*!40000 ALTER TABLE `admin_status` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `banking_deposit`
--

DROP TABLE IF EXISTS `banking_deposit`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `banking_deposit` (
  `id` int(5) NOT NULL AUTO_INCREMENT,
  `unit_id` int(5) DEFAULT NULL,
  `tenant_id` int(5) DEFAULT NULL,
  `bank_deposit` longtext,
  `mode` varchar(15) DEFAULT NULL,
  `transactiontime` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `banking_deposit`
--

LOCK TABLES `banking_deposit` WRITE;
/*!40000 ALTER TABLE `banking_deposit` DISABLE KEYS */;
INSERT INTO `banking_deposit` VALUES (1,15,1,'The amount has been banked.','rent','2012-07-20 06:31:37'),(2,15,1,'The amount has been banked.','deposit','2012-07-20 06:32:59');
/*!40000 ALTER TABLE `banking_deposit` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `calender`
--

DROP TABLE IF EXISTS `calender`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `calender` (
  `id` int(5) NOT NULL AUTO_INCREMENT,
  `month` varchar(15) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=13 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `calender`
--

LOCK TABLES `calender` WRITE;
/*!40000 ALTER TABLE `calender` DISABLE KEYS */;
INSERT INTO `calender` VALUES (1,'Jan'),(2,'Feb'),(3,'Mar'),(4,'Apr'),(5,'May'),(6,'Jun'),(7,'Jul'),(8,'Aug'),(9,'Sep'),(10,'Oct'),(11,'Nov'),(12,'Dec');
/*!40000 ALTER TABLE `calender` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `checklist_approach`
--

DROP TABLE IF EXISTS `checklist_approach`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `checklist_approach` (
  `id` int(5) NOT NULL AUTO_INCREMENT,
  `approach` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `checklist_approach`
--

LOCK TABLES `checklist_approach` WRITE;
/*!40000 ALTER TABLE `checklist_approach` DISABLE KEYS */;
INSERT INTO `checklist_approach` VALUES (1,'Generals'),(2,'Specifics');
/*!40000 ALTER TABLE `checklist_approach` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `checklist_const`
--

DROP TABLE IF EXISTS `checklist_const`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `checklist_const` (
  `id` int(5) NOT NULL AUTO_INCREMENT,
  `location` int(5) DEFAULT NULL,
  `construct` varchar(150) DEFAULT NULL,
  `property_id` int(5) DEFAULT NULL,
  `manager_id` int(10) DEFAULT NULL,
  `UID` int(10) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=140 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `checklist_const`
--

LOCK TABLES `checklist_const` WRITE;
/*!40000 ALTER TABLE `checklist_const` DISABLE KEYS */;
INSERT INTO `checklist_const` VALUES (1,6,'Floor Tiles',NULL,NULL,NULL),(2,6,'Wall Tiles',NULL,NULL,NULL),(3,6,'Sliding Door',NULL,NULL,NULL),(4,6,'Sockets',NULL,NULL,NULL),(5,6,'Serving Window',NULL,NULL,NULL),(6,6,'Balcony Tiles',NULL,NULL,NULL),(7,6,'Ballustrates',NULL,NULL,NULL),(8,7,'Work Top',NULL,NULL,NULL),(9,7,'Floor Tiles',NULL,NULL,NULL),(10,7,'Door Fittings',NULL,NULL,NULL),(11,7,'Cupboards',NULL,NULL,NULL),(12,7,'Sinks',NULL,NULL,NULL),(13,7,'Sink Tap',NULL,NULL,NULL),(14,7,'Kitchen Window',NULL,NULL,NULL),(15,7,'Mainswitch',NULL,NULL,NULL),(16,7,'Door',NULL,NULL,NULL),(17,8,'Door to Flash Area',NULL,NULL,NULL),(18,8,'Floor Tiles',NULL,NULL,NULL),(19,8,'Wall Tiles',NULL,NULL,NULL),(20,8,'Tap',NULL,NULL,NULL),(21,8,'Drainage',NULL,NULL,NULL),(22,8,'Sockets',NULL,NULL,NULL),(23,8,'Vents',NULL,NULL,NULL),(24,9,'Tiles',NULL,NULL,NULL),(25,9,'Switches',NULL,NULL,NULL),(26,10,'Wardrobes',NULL,NULL,NULL),(27,10,'Floor Tiles',NULL,NULL,NULL),(28,10,'Dressing Tables',NULL,NULL,NULL),(29,10,'Window',NULL,NULL,NULL),(30,10,'Door Fitting',NULL,NULL,NULL),(31,10,'Switches',NULL,NULL,NULL),(32,10,'AC Point',NULL,NULL,NULL),(33,10,'Provision for Fan',NULL,NULL,NULL),(34,10,'Sockets',NULL,NULL,NULL),(35,11,'Wardrobes',NULL,NULL,NULL),(36,11,'Floor Tiles',NULL,NULL,NULL),(37,11,'Dressing Table',NULL,NULL,NULL),(38,11,'Window',NULL,NULL,NULL),(39,11,'Door Fittings',NULL,NULL,NULL),(40,11,'Switches',NULL,NULL,NULL),(41,11,'AC Point',NULL,NULL,NULL),(42,11,'Provision for Fan',NULL,NULL,NULL),(43,11,'Sockets',NULL,NULL,NULL),(44,12,'Door',NULL,NULL,NULL),(45,12,'Wall Tiles',NULL,NULL,NULL),(46,12,'Floor Tiles',NULL,NULL,NULL),(47,12,'Gradient',NULL,NULL,NULL),(48,12,'Drainage Poing',NULL,NULL,NULL),(49,12,'Window',NULL,NULL,NULL),(50,12,'Shower Unit',NULL,NULL,NULL),(51,12,'Heater Switch',NULL,NULL,NULL),(52,12,'Lighting',NULL,NULL,NULL),(53,12,'Towel Holder',NULL,NULL,NULL),(54,12,'Sink Outside',NULL,NULL,NULL),(55,13,'Door',NULL,NULL,NULL),(56,13,'Floor Tiles',NULL,NULL,NULL),(57,13,'Cistern',NULL,NULL,NULL),(58,13,'Wall Tiles',NULL,NULL,NULL),(59,13,'Drainage',NULL,NULL,NULL),(60,13,'Toilet Paper Holder',NULL,NULL,NULL),(61,13,'Tap Fitting',NULL,NULL,NULL),(62,14,'Door',NULL,NULL,NULL),(63,14,'Wardrobes',NULL,NULL,NULL),(64,14,'Dressing Table',NULL,NULL,NULL),(65,14,'Window',NULL,NULL,NULL),(66,14,'Corner House 1',NULL,NULL,NULL),(67,14,'Middle House 1',NULL,NULL,NULL),(68,14,'Sockets',NULL,NULL,NULL),(69,14,'AC Point',NULL,NULL,NULL),(70,14,'Bulb',NULL,NULL,NULL),(71,14,'Floor Tiles',NULL,NULL,NULL),(72,14,'Sink',NULL,NULL,NULL),(73,14,'Toilet Paper Holder',NULL,NULL,NULL),(74,14,'Slope to Diff Toilet and Shower',NULL,NULL,NULL),(75,14,'Heater Switch',NULL,NULL,NULL),(76,14,'Lighting Switch',NULL,NULL,NULL),(77,14,'Wall Tiles',NULL,NULL,NULL),(78,14,'Floor Tiles',NULL,NULL,NULL),(79,14,'Window',NULL,NULL,NULL),(80,14,'Painting',NULL,NULL,NULL),(81,15,'Sockets',124,0,1),(82,24,'Heater',127,8,35),(83,24,'Power Socket',127,8,35),(84,16,'Main Door',127,8,35),(85,16,'Power Sockets',127,8,35),(86,16,'Power Switches',127,8,35),(87,16,'Fireplace',127,8,35),(88,16,'Windows',127,8,35),(89,16,'Light Fixtures',127,8,35),(90,17,'Counter Board',127,8,35),(91,17,'Pantry',127,8,35),(92,17,'Sink',127,8,35),(93,17,'Taps',127,8,35),(94,17,'Overhead Shelves',127,8,35),(95,17,'Power Socket',127,8,35),(96,18,'Shower Heater',127,8,35),(97,18,'Taps',127,8,35),(98,18,'Shower',127,8,35),(99,19,'Light Fixture',127,8,35),(100,17,'Light Fixture',127,8,35),(101,19,'Toilet',127,8,35),(102,20,'Power Sockets',127,8,35),(103,20,'Light Fixtures',127,8,35),(104,20,'Sink',127,8,35),(105,20,'Mirror',127,8,35),(106,21,'Light Fixture',127,8,35),(107,21,'Power Socket',127,8,35),(108,19,'Power Socket',127,8,35),(109,21,'Closets',127,8,35),(110,22,'Closets',127,8,35),(111,22,'Power Socket',127,8,35),(112,22,'Light Fixture',127,8,35),(113,23,'Door',127,8,35),(114,17,'Door',127,8,35),(115,17,'Window',127,8,35),(116,18,'Window',127,8,35),(117,18,'Door',127,8,35),(118,19,'Door',127,8,35),(119,19,'Window',127,8,35),(120,20,'Back Door',127,8,35),(121,20,'Windows',127,8,35),(122,21,'Window',127,8,35),(123,21,'Door',127,8,35),(124,22,'Windows',127,8,35),(125,22,'Door',127,8,35),(126,23,'Windows',127,8,35),(127,23,'Closet',127,8,35),(128,23,'Light Fixture',127,8,35),(129,23,'Power Sockets',127,8,35),(130,23,'Bathtub',127,8,35),(131,23,'Toilet',127,8,35),(132,25,'Tap',127,8,35),(133,25,'Power Socket',127,8,35),(134,26,'Windows',127,8,35),(135,26,'Door',127,8,35),(136,26,'Light Fixture',127,8,35),(137,26,'Tap',127,8,35),(138,26,'Shower Head',127,8,35),(139,26,'Toilet',127,8,35);
/*!40000 ALTER TABLE `checklist_const` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `checklist_location`
--

DROP TABLE IF EXISTS `checklist_location`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `checklist_location` (
  `id` int(5) NOT NULL AUTO_INCREMENT,
  `location` varchar(100) DEFAULT NULL,
  `property_id` int(10) DEFAULT NULL,
  `manager_id` int(10) DEFAULT NULL,
  `UID` int(10) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=27 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `checklist_location`
--

LOCK TABLES `checklist_location` WRITE;
/*!40000 ALTER TABLE `checklist_location` DISABLE KEYS */;
INSERT INTO `checklist_location` VALUES (1,'Exterior',NULL,NULL,NULL),(2,'Plastering',NULL,NULL,NULL),(3,'Painting',NULL,NULL,NULL),(4,'Waste Water Drainage',NULL,NULL,NULL),(5,'Main Door',NULL,NULL,NULL),(6,'Sitting Room',NULL,NULL,NULL),(7,'Kitchen',NULL,NULL,NULL),(8,'Flash Area',NULL,NULL,NULL),(9,'Alley Way',NULL,NULL,NULL),(10,'Bedroom 1',NULL,NULL,NULL),(11,'Bedroom 2',NULL,NULL,NULL),(12,'Bathroom',NULL,NULL,NULL),(13,'Toilet',NULL,NULL,NULL),(14,'Master Bedroom',NULL,NULL,NULL),(15,'Sitting Room',124,0,1),(16,'Living Room',127,8,35),(17,'Kitchen',127,8,35),(18,'Bathroom',127,8,35),(19,'Toilet',127,8,35),(20,'Hallway',127,8,35),(21,'Bedroom 1',127,8,35),(22,'Bedroom 2',127,8,35),(23,'Master Bedroom',127,8,35),(24,'Heater Closet',127,8,35),(25,'Compound',127,8,35),(26,'Servant Quarter',127,8,35);
/*!40000 ALTER TABLE `checklist_location` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `comms_table`
--

DROP TABLE IF EXISTS `comms_table`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `comms_table` (
  `id` int(5) NOT NULL AUTO_INCREMENT,
  `unit_id` int(5) DEFAULT NULL,
  `tenant_id` int(5) DEFAULT NULL,
  `comm_paid` float DEFAULT NULL,
  `comm_month` int(5) DEFAULT NULL,
  `comm_year` int(5) DEFAULT NULL,
  `status` int(11) DEFAULT NULL,
  `banked` int(5) DEFAULT '0',
  `transactiontime` datetime DEFAULT NULL,
  `UID` int(10) DEFAULT NULL,
  `manager_id` int(10) DEFAULT NULL,
  `payment_id` int(10) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `comms_table`
--

LOCK TABLES `comms_table` WRITE;
/*!40000 ALTER TABLE `comms_table` DISABLE KEYS */;
INSERT INTO `comms_table` VALUES (1,239,26,3600,1,2013,2,0,'2013-01-27 09:07:41',35,8,NULL);
/*!40000 ALTER TABLE `comms_table` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `county`
--

DROP TABLE IF EXISTS `county`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `county` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `county` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=48 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `county`
--

LOCK TABLES `county` WRITE;
/*!40000 ALTER TABLE `county` DISABLE KEYS */;
INSERT INTO `county` VALUES (1,'Baringo'),(2,'Bomet'),(3,'Bungoma'),(4,'Busia'),(5,'Elgeyo Marakwet'),(6,'Embu'),(7,'Garissa'),(8,'Homa Bay'),(9,'Isiolo'),(10,'Kajiado'),(11,'Kakamega'),(12,'Kericho'),(13,'Kiambu'),(14,'Kilifi'),(15,'Kirinyaga'),(16,'Kisii'),(17,'Kisumu'),(18,'Kitui'),(19,'Kwale'),(20,'Laikipia'),(21,'Lamu'),(22,'Machakos'),(23,'Makueni'),(24,'Mandera'),(25,'Marsabit'),(26,'Meru'),(27,'Migori'),(28,'Mombasa'),(29,'Muranga'),(30,'Nairobi'),(31,'Nakuru'),(32,'Nandi'),(33,'Narok'),(34,'Nyamira'),(35,'Nyandarua'),(36,'Nyeri'),(37,'Samburu'),(38,'Siaya'),(39,'Taita Taveta'),(40,'Tana River'),(41,'Tharaka Nithi'),(42,'Trans Nzoia'),(43,'Turkana'),(44,'Uasin Gishu'),(45,'Vihiga'),(46,'Wajir'),(47,'West Pokot');
/*!40000 ALTER TABLE `county` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `deposit_payment`
--

DROP TABLE IF EXISTS `deposit_payment`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `deposit_payment` (
  `id` int(5) NOT NULL AUTO_INCREMENT,
  `unit_id` int(5) DEFAULT NULL,
  `tenant_id` int(5) DEFAULT NULL,
  `deposit_payment` float DEFAULT NULL,
  `actual_deposit` float DEFAULT NULL,
  `rent_month` int(5) DEFAULT NULL,
  `rent_year` int(5) DEFAULT NULL,
  `banked` int(5) DEFAULT '0',
  `transactiontime` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `deposit_payment`
--

LOCK TABLES `deposit_payment` WRITE;
/*!40000 ALTER TABLE `deposit_payment` DISABLE KEYS */;
/*!40000 ALTER TABLE `deposit_payment` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `expense_items`
--

DROP TABLE IF EXISTS `expense_items`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `expense_items` (
  `id` int(5) NOT NULL AUTO_INCREMENT,
  `property_id` int(5) DEFAULT NULL,
  `expense_name` varchar(100) DEFAULT NULL,
  `budget_expense` float DEFAULT NULL,
  `user_id` int(5) DEFAULT NULL,
  `transactiontime` datetime DEFAULT NULL,
  `UID` int(10) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=17 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `expense_items`
--

LOCK TABLES `expense_items` WRITE;
/*!40000 ALTER TABLE `expense_items` DISABLE KEYS */;
INSERT INTO `expense_items` VALUES (4,5,'Electricity',1200,1,'2012-07-20 06:19:03',NULL),(5,5,'Water',2000,1,'2012-07-20 06:19:19',NULL),(6,5,'Garbage',500,1,'2012-07-20 06:19:29',NULL),(7,5,'Rodentkil',464,1,'2012-07-20 06:19:48',NULL),(8,5,'Security',15000,1,'2012-07-20 06:20:02',NULL),(9,5,'Caretaker',6000,1,'2012-07-20 06:20:15',NULL),(10,6,'Gardener',5000,1,'2012-08-03 10:56:57',NULL),(11,6,'Utility',4000,1,'2012-08-03 10:57:13',NULL),(12,6,'Security',8000,1,'2012-08-03 10:57:29',NULL),(13,127,'street electricity',2000,35,'2013-01-26 19:33:57',35),(14,127,'caretaker',4000,35,'2013-01-26 19:36:04',35),(15,127,'borehole power bill',5500,35,'2013-01-26 19:37:48',35),(16,127,'guards',6000,35,'2013-01-26 19:39:42',35);
/*!40000 ALTER TABLE `expense_items` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `expense_payment`
--

DROP TABLE IF EXISTS `expense_payment`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `expense_payment` (
  `id` int(5) NOT NULL AUTO_INCREMENT,
  `property_id` int(5) DEFAULT NULL,
  `expense_id` int(5) DEFAULT NULL,
  `expense_payment` float DEFAULT NULL,
  `expense_month` int(5) DEFAULT NULL,
  `expense_year` int(5) DEFAULT NULL,
  `transactiontime` datetime DEFAULT NULL,
  `UID` int(10) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=27 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `expense_payment`
--

LOCK TABLES `expense_payment` WRITE;
/*!40000 ALTER TABLE `expense_payment` DISABLE KEYS */;
INSERT INTO `expense_payment` VALUES (1,5,4,1200,7,2012,'2012-07-20 06:28:01',NULL),(2,5,5,2000,7,2012,'2012-07-20 06:28:01',NULL),(3,5,6,500,7,2012,'2012-07-20 06:28:01',NULL),(4,5,9,6000,7,2012,'2012-07-20 06:28:01',NULL),(5,5,4,1200,8,2012,'2012-08-03 04:32:28',NULL),(6,5,5,2000,8,2012,'2012-08-03 04:32:28',NULL),(7,5,8,15000,8,2012,'2012-08-03 07:11:11',NULL),(10,5,9,6000,8,2012,'2012-08-03 07:17:51',NULL),(11,6,10,5000,8,2012,'2012-08-03 11:01:07',NULL),(12,6,11,2000,8,2012,'2012-08-03 11:01:07',NULL),(13,6,12,8000,8,2012,'2012-08-03 11:01:07',NULL),(14,5,4,1200,9,2012,'2012-09-19 08:37:07',NULL),(15,5,5,500,9,2012,'2012-09-19 08:37:07',NULL),(16,5,6,500,9,2012,'2012-09-20 13:26:45',NULL),(17,5,7,464,9,2012,'2012-09-20 13:26:45',NULL),(18,6,11,4000,9,2012,'2012-09-20 13:27:03',NULL),(19,6,10,5000,11,2012,'2012-11-15 10:12:00',NULL),(20,6,11,300,11,2012,'2012-11-15 10:12:24',NULL),(21,6,12,2000,11,2012,'2012-11-15 10:12:24',NULL),(22,5,4,500,11,2012,'2012-11-15 10:12:36',NULL),(23,127,13,500,1,2013,'2013-01-27 09:22:34',35),(24,127,14,4000,1,2013,'2013-01-27 09:22:34',35),(25,127,15,500,1,2013,'2013-01-27 09:22:34',35),(26,127,16,6000,1,2013,'2013-01-27 09:22:34',35);
/*!40000 ALTER TABLE `expense_payment` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `fin_asset_register`
--

DROP TABLE IF EXISTS `fin_asset_register`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `fin_asset_register` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `asset_tag` varchar(150) DEFAULT NULL,
  `description` longtext,
  `brand` varchar(150) DEFAULT NULL,
  `model_no` varchar(150) DEFAULT NULL,
  `serial_number` varchar(150) DEFAULT NULL,
  `purchase_value` float DEFAULT NULL,
  `purchase_year` int(5) DEFAULT NULL,
  `asset_location` longtext,
  `UID` int(11) DEFAULT NULL,
  `manager_id` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `fin_asset_register`
--

LOCK TABLES `fin_asset_register` WRITE;
/*!40000 ALTER TABLE `fin_asset_register` DISABLE KEYS */;
/*!40000 ALTER TABLE `fin_asset_register` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `fin_expense_payment`
--

DROP TABLE IF EXISTS `fin_expense_payment`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `fin_expense_payment` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `expense_id` int(10) DEFAULT '0',
  `expense_category` int(10) DEFAULT '0',
  `manager_id` int(10) DEFAULT '0',
  `name` varchar(150) DEFAULT NULL,
  `payment` float DEFAULT NULL,
  `payment_type` varchar(10) DEFAULT NULL,
  `payment_number` varchar(50) DEFAULT NULL,
  `expense_day` int(5) DEFAULT NULL,
  `expense_month` int(5) DEFAULT NULL,
  `expense_year` int(5) DEFAULT NULL,
  `UID` int(5) DEFAULT NULL,
  `bank_rec` int(5) DEFAULT '0',
  `transactiontime` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `fin_expense_payment`
--

LOCK TABLES `fin_expense_payment` WRITE;
/*!40000 ALTER TABLE `fin_expense_payment` DISABLE KEYS */;
/*!40000 ALTER TABLE `fin_expense_payment` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `fin_expenses_items`
--

DROP TABLE IF EXISTS `fin_expenses_items`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `fin_expenses_items` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `expense_category` int(5) DEFAULT NULL,
  `expense_name` varchar(150) DEFAULT NULL,
  `expense_code` varchar(50) DEFAULT NULL,
  `manager_id` int(5) DEFAULT NULL,
  `UID` int(5) DEFAULT NULL,
  `transactiontime` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `fin_expenses_items`
--

LOCK TABLES `fin_expenses_items` WRITE;
/*!40000 ALTER TABLE `fin_expenses_items` DISABLE KEYS */;
/*!40000 ALTER TABLE `fin_expenses_items` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `fin_petty_cash_payment`
--

DROP TABLE IF EXISTS `fin_petty_cash_payment`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `fin_petty_cash_payment` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `name` varchar(150) DEFAULT NULL,
  `payment` float NOT NULL DEFAULT '0',
  `payment_type` varchar(15) DEFAULT NULL,
  `payment_number` varchar(15) DEFAULT NULL,
  `manager_id` int(5) DEFAULT NULL,
  `petty_cash_day` int(5) DEFAULT NULL,
  `petty_cash_month` int(5) DEFAULT NULL,
  `petty_cash_year` int(5) DEFAULT NULL,
  `UID` int(5) DEFAULT NULL,
  `transactiontime` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `fin_petty_cash_payment`
--

LOCK TABLES `fin_petty_cash_payment` WRITE;
/*!40000 ALTER TABLE `fin_petty_cash_payment` DISABLE KEYS */;
/*!40000 ALTER TABLE `fin_petty_cash_payment` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `fin_petty_cash_reduce`
--

DROP TABLE IF EXISTS `fin_petty_cash_reduce`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `fin_petty_cash_reduce` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `petty_cash` float DEFAULT NULL,
  `manager_id` int(5) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `fin_petty_cash_reduce`
--

LOCK TABLES `fin_petty_cash_reduce` WRITE;
/*!40000 ALTER TABLE `fin_petty_cash_reduce` DISABLE KEYS */;
/*!40000 ALTER TABLE `fin_petty_cash_reduce` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `managers`
--

DROP TABLE IF EXISTS `managers`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `managers` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `phone_number` varchar(50) DEFAULT NULL,
  `company_name` varchar(150) DEFAULT NULL,
  `email_address` varchar(150) DEFAULT NULL,
  `comments` longtext,
  `transactiontime` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `managers`
--

LOCK TABLES `managers` WRITE;
/*!40000 ALTER TABLE `managers` DISABLE KEYS */;
INSERT INTO `managers` VALUES (1,'0722972709','Andrew Chege Kibe','kaguius@gmail.com','I am a tenant and am interested in using e-Kodi.  However, my manager isn\'t currently setup with you guys.  Here are the contact details...\r\n\r\nMy Rental Address: Tumanini Gardens\r\nManager Name: Kinyanjui\r\nManager Email: N/A\r\nManager Phone: 0704469814\r\n','2013-01-12 12:14:53');
/*!40000 ALTER TABLE `managers` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `passwords`
--

DROP TABLE IF EXISTS `passwords`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `passwords` (
  `id` int(5) NOT NULL AUTO_INCREMENT,
  `passwords` varchar(15) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `passwords`
--

LOCK TABLES `passwords` WRITE;
/*!40000 ALTER TABLE `passwords` DISABLE KEYS */;
INSERT INTO `passwords` VALUES (1,'f4r5ZzBZ'),(2,'SXe8ATRu'),(3,'PMKEVVjQ'),(4,'QgEp45An'),(5,'m6MdLtCF'),(6,'r9ZUGwFY'),(7,'pCndCcKs'),(8,'SwEbgQbF'),(9,'H3K5jRNR'),(10,'dY9BCA9f');
/*!40000 ALTER TABLE `passwords` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `payment_type`
--

DROP TABLE IF EXISTS `payment_type`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `payment_type` (
  `id` int(5) NOT NULL AUTO_INCREMENT,
  `payment_type` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `payment_type`
--

LOCK TABLES `payment_type` WRITE;
/*!40000 ALTER TABLE `payment_type` DISABLE KEYS */;
INSERT INTO `payment_type` VALUES (1,'Cash'),(2,'Kenswitch'),(3,'MPESA'),(4,'ZAP'),(5,'Yu Cash'),(6,'VISA'),(7,'Master Card');
/*!40000 ALTER TABLE `payment_type` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `payments`
--

DROP TABLE IF EXISTS `payments`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `payments` (
  `id` int(5) NOT NULL AUTO_INCREMENT,
  `unit_id` int(5) DEFAULT NULL,
  `tenant_id` int(5) DEFAULT NULL,
  `payment` float DEFAULT NULL,
  `actual_penalties` float DEFAULT '0',
  `rent_month` int(5) DEFAULT NULL,
  `rent_year` int(5) DEFAULT NULL,
  `banked` int(5) DEFAULT '0',
  `category` int(5) DEFAULT '0',
  `payment_type` int(5) DEFAULT NULL,
  `transactiontime` datetime DEFAULT NULL,
  `water_pay` float DEFAULT NULL,
  `service_charge` float DEFAULT NULL,
  `manager_id` int(10) DEFAULT NULL,
  `UID` int(10) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `payments`
--

LOCK TABLES `payments` WRITE;
/*!40000 ALTER TABLE `payments` DISABLE KEYS */;
INSERT INTO `payments` VALUES (1,239,26,36000,0,1,2013,0,1,1,'2013-01-27 09:07:41',NULL,0,8,35),(2,239,26,36000,0,1,2013,0,2,1,'2013-01-27 09:07:41',NULL,3600,8,35);
/*!40000 ALTER TABLE `payments` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `property_details`
--

DROP TABLE IF EXISTS `property_details`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `property_details` (
  `id` int(5) NOT NULL AUTO_INCREMENT,
  `property_name` varchar(150) DEFAULT NULL,
  `physical_address` longtext,
  `location` varchar(100) DEFAULT NULL,
  `property_owner` varchar(150) DEFAULT NULL,
  `propety_contact` varchar(50) DEFAULT NULL,
  `deposit` int(5) DEFAULT NULL,
  `bank_name` varchar(50) DEFAULT NULL,
  `bank_branch` varchar(50) DEFAULT NULL,
  `account_name` varchar(100) DEFAULT NULL,
  `account_number` varchar(150) DEFAULT NULL,
  `property_code` varchar(100) DEFAULT NULL,
  `commission` int(5) DEFAULT NULL,
  `penalties_day` int(5) DEFAULT NULL,
  `penalties` int(5) DEFAULT NULL,
  `transactiontime` datetime DEFAULT NULL,
  `property_month` int(11) DEFAULT NULL,
  `property_year` int(11) DEFAULT NULL,
  `email_address` varchar(50) DEFAULT NULL,
  `water_cost` int(11) DEFAULT NULL,
  `taxes` varchar(5) DEFAULT NULL,
  `lr_number` varchar(40) DEFAULT NULL,
  `construction_year` varchar(5) DEFAULT NULL,
  `property_type` varchar(15) DEFAULT NULL,
  `manager_id` int(10) DEFAULT NULL,
  `UID` int(10) DEFAULT NULL,
  `owner_id` int(5) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=128 DEFAULT CHARSET=latin1 COMMENT='latin1_swedish_ci';
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `property_details`
--

LOCK TABLES `property_details` WRITE;
/*!40000 ALTER TABLE `property_details` DISABLE KEYS */;
INSERT INTO `property_details` VALUES (7,'ZA: Yusuf Kikabhai','Zawadi apartments are located in the Northern Coast of Mombasa','Mombasa','Yusuf Kikabhai','1111111',1,'','','','','ClydeRMS-778-7',10,5,10,'2012-11-17 17:29:04',11,2012,NULL,NULL,NULL,NULL,NULL,NULL,1,NULL,NULL),(8,'ZA: Feisal Sherman','Zawadi apartments are located in the Northern Coast of Mombasa','Mombasa','Feisal Sherman','1111111',1,'','','','','ClydeRMS-778-8',10,5,10,'2012-11-17 17:37:10',11,2012,NULL,NULL,NULL,NULL,NULL,NULL,1,NULL,NULL),(9,'ZA: Nurbhai Dossajjee','Zawadi apartments are located in the Northern Coast of Mombasa','Mombasa','Nurbhai Dossajjee','1111111',1,'','','','','ClydeRMS-778-9',10,5,10,'2012-11-17 17:40:15',11,2012,NULL,NULL,NULL,NULL,NULL,NULL,1,NULL,NULL),(10,'ZA: Dr. Mahesh Chudasama','Zawadi Apartments','Mombasa','Dr. Mahesh Chudasama','1111111',1,'','','','','ClydeRMS-778-10',10,5,10,'2012-11-17 14:58:54',11,2012,NULL,NULL,NULL,NULL,NULL,NULL,1,NULL,NULL),(11,'ZA: Anne Nyawira','','Mombasa','Anne Nyawira','1111111',1,'','','','','ClydeRMS-778-11',10,5,10,'2012-11-17 15:02:31',11,2012,'',10,'','','','Residential',1,1,NULL),(12,'ZA: Thithi Holdings Ltd','','Mombasa','Thithi Holdings Ltd','1111111',1,'','','','','ClydeRMS-778-12',10,5,10,'2012-11-17 15:03:37',11,2012,NULL,NULL,NULL,NULL,NULL,NULL,1,NULL,NULL),(13,'ZA: MBS','','Mombasa','MBS','1111111',1,'','','','','ClydeRMS-778-13',10,5,10,'2012-11-17 15:04:39',11,2012,NULL,NULL,NULL,NULL,NULL,NULL,1,NULL,NULL),(14,'ZA: Beatrice Wanjiru Ikumu','','Mombasa','Beatrice Wanjiru Ikumu','1111111',1,'','','','','ClydeRMS-778-14',10,5,10,'2012-11-17 15:05:11',11,2012,NULL,NULL,NULL,NULL,NULL,NULL,1,NULL,NULL),(15,'ZA: John Kingori Kariuki','','Mombasa','John Kingori Kariuki','1111111',1,'','','','','ClydeRMS-778-15',10,5,10,'2012-11-17 15:05:50',11,2012,'',NULL,NULL,NULL,NULL,NULL,1,NULL,NULL),(16,'ZA: Lornah Wanjiku Ngure','','Mombasa','Lornah Wanjiku Ngure','1111111',1,'','','','','ClydeRMS-778-16',10,5,10,'2012-11-17 15:09:15',11,2012,NULL,NULL,NULL,NULL,NULL,NULL,1,NULL,NULL),(17,'ZA: Erick Langat','','Mombasa','Erick Langat','1111111',1,'','','','','ClydeRMS-778-17',10,5,10,'2012-11-17 15:10:04',11,2012,NULL,NULL,NULL,NULL,NULL,NULL,1,NULL,NULL),(18,'ZA: Alfred Kaingu Ngua','','Mombasa','Alfred Kaingu Ngua','1111111',1,'','','','','ClydeRMS-778-18',10,5,10,'2012-11-17 15:10:33',11,2012,'',10,'','','','Residential',1,1,NULL),(19,'ZA: Jayshree Dinesh Shah ','','Mombasa','Jayshree Dinesh Shah ','1111111',1,'','','','','ClydeRMS-778-19',10,5,10,'2012-11-17 15:18:49',11,2012,NULL,NULL,NULL,NULL,NULL,NULL,1,NULL,NULL),(20,'ZA: Abdulrazak Mohamed Kubwa/ Faiza Maulid','','Mombasa','Abdulrazak Mohamed Kubwa/ Faiza Maulid','1111111',1,'','','','','ClydeRMS-778-20',10,5,10,'2012-11-17 15:19:19',11,2012,'',10,'','','','Residential',1,1,NULL),(21,'ZA: Farhia Omar Aden','','Mombasa','Farhia Omar Aden','1111111',1,'','','','','ClydeRMS-778-21',10,5,10,'2012-11-17 15:20:28',11,2012,NULL,NULL,NULL,NULL,NULL,NULL,1,NULL,NULL),(22,'ZA: Murtaza Hatimali Ebrahimji','','Mombasa','Murtaza Hatimali Ebrahimji','1111111',1,'','','','','ClydeRMS-778-22',10,5,10,'2012-11-17 16:50:32',11,2012,NULL,NULL,NULL,NULL,NULL,NULL,1,NULL,NULL),(23,'ZA: Karmar Enterprises','','Mombasa','Karmar Enterprises','1111111',1,'','','','','ClydeRMS-778-23',10,5,10,'2012-11-17 16:51:09',11,2012,NULL,NULL,NULL,NULL,NULL,NULL,1,NULL,NULL),(24,'ZA: Sherman','','Mombasa','Sherman','1111111',1,'','','','','ClydeRMS-778-24',10,5,10,'2012-11-17 16:51:49',11,2012,NULL,NULL,NULL,NULL,NULL,NULL,1,NULL,NULL),(25,'ZA: Mohamed Msellem Sheikh Amin','','Mombasa','Mohamed Msellem Sheikh Amin','1111111',1,'','','','','ClydeRMS-778-25',10,5,10,'2012-11-17 16:52:22',11,2012,NULL,NULL,NULL,NULL,NULL,NULL,1,NULL,NULL),(26,'ZA: Faith Kiarie','','Mombasa','Faith Kiarie','1111111',1,'','','','','ClydeRMS-778-26',10,5,10,'2012-11-17 16:53:01',11,2012,NULL,NULL,NULL,NULL,NULL,NULL,1,NULL,NULL),(27,'ZA: Ibrahim Abdullahi','','Mombasa','Ibrahim Abdullahi','1111111',1,'','','','','ClydeRMS-778-27',10,5,10,'2012-11-17 16:54:19',11,2012,NULL,NULL,NULL,NULL,NULL,NULL,1,NULL,NULL),(28,'ZA: John Kamau Muiruri','','Mombasa','John Kamau Muiruri','1111111',1,'','','','','ClydeRMS-778-28',10,5,10,'2012-11-17 17:19:05',11,2012,NULL,NULL,NULL,NULL,NULL,NULL,1,NULL,NULL),(29,'ZA: Hezekiah Wangombe Gichohi','','Mombasa','Hezekiah Wangombe Gichohi','1111111',1,'','','','','ClydeRMS-778-29',10,5,10,'2012-11-17 17:26:32',11,2012,NULL,NULL,NULL,NULL,NULL,NULL,1,NULL,NULL),(30,'ZA: Bertha Kalama','','Mombasa','Bertha Kalama','1111111',1,'','','','','ClydeRMS-778-30',10,5,10,'2012-11-17 17:27:10',11,2012,NULL,NULL,NULL,NULL,NULL,NULL,1,NULL,NULL),(31,'ZA: Firoz Sachak','','Mombasa','Firoz Sachak','1111111',1,'','','','','ClydeRMS-778-31',10,5,10,'2012-11-17 17:28:00',11,2012,NULL,NULL,NULL,NULL,NULL,NULL,1,NULL,NULL),(32,'ZA: Mr & Mrs Martin Muigah','','Mombasa','Mr & Mrs Martin Muigah','1111111',1,'','','','','ClydeRMS-778-32',10,5,10,'2012-11-17 17:28:43',11,2012,NULL,NULL,NULL,NULL,NULL,NULL,1,NULL,NULL),(33,'ZA: Faith Muluka','','Mombasa','Faith Muluka','1111111',1,'','','','','ClydeRMS-778-33',10,5,10,'2012-11-17 17:29:58',11,2012,NULL,NULL,NULL,NULL,NULL,NULL,1,NULL,NULL),(34,'ZA: Yusuf Kutbudin Kasamali','','Mombasa','Yusuf Kutbudin Kasamali','1111111',1,'','','','','ClydeRMS-778-34',10,5,10,'2012-11-17 17:59:31',11,2012,'',NULL,NULL,NULL,NULL,NULL,1,NULL,NULL),(35,'ZA: Stephen Mutethia Raiji','','Mombasa','Stephen Mutethia Raiji','1111111',1,'','','','','ClydeRMS-778-35',10,5,10,'2012-11-17 18:00:02',11,2012,'',NULL,NULL,NULL,NULL,NULL,1,NULL,NULL),(36,'ZA: Ruweida Jamal Din','','Mombasa','Ruweida Jamal Din','1111111',1,'','','','','ClydeRMS-778-36',10,5,10,'2012-11-17 18:02:19',11,2012,'',NULL,NULL,NULL,NULL,NULL,1,NULL,NULL),(37,'ZA: Vahida Shaukathussein','','Mombasa','Vahida Shaukathussein','1111111',1,'','','','','ClydeRMS-778-37',10,5,10,'2012-11-17 18:03:03',11,2012,'',NULL,NULL,NULL,NULL,NULL,1,NULL,NULL),(38,'ZA: Isaack Tulula','','Mombasa','Isaack Tulula','1111111',1,'','','','','ClydeRMS-778-38',10,5,10,'2012-11-17 18:49:05',11,2012,'',NULL,NULL,NULL,NULL,NULL,1,NULL,NULL),(39,'ZA: Frank Muchiri','','Mombasa','Frank Muchiri','1111111',1,'','','','','ClydeRMS-778-39',10,5,10,'2012-11-17 18:49:29',11,2012,'',NULL,NULL,NULL,NULL,NULL,1,NULL,NULL),(40,'ZA: Strategy Centre Africa Limited','','Mombasa','Strategy Centre Africa Limited','1111111',1,'','','','','ClydeRMS-778-40',10,5,10,'2012-11-17 18:53:05',11,2012,'',NULL,NULL,NULL,NULL,NULL,1,NULL,NULL),(41,'ZA: Kampire Violette','','Mombasa','Kampire Violette','1111111',1,'','','','','ClydeRMS-778-41',10,5,10,'2012-11-17 18:53:45',11,2012,'',NULL,NULL,NULL,NULL,NULL,1,NULL,NULL),(42,'ZA: Beatrice Wanjiru Ikinu','','Mombasa','Beatrice Wanjiru Ikinu','1111111',1,'','','','','ClydeRMS-778-42',10,5,10,'2012-11-17 18:54:39',11,2012,'',NULL,NULL,NULL,NULL,NULL,1,NULL,NULL),(43,'ZA: Reene Agnes','','Mombasa','Reene Agnes','1111111',1,'','','','','ClydeRMS-778-43',10,5,10,'2012-11-17 18:55:34',11,2012,'',NULL,NULL,NULL,NULL,NULL,1,NULL,NULL),(44,'ZA: Edward Masika','','Mombasa','Edward Masika','1111111',1,'','','','','e-kodi-44',10,5,10,'2012-11-17 19:10:39',11,2012,'',NULL,NULL,NULL,NULL,NULL,1,NULL,NULL),(45,'ZA: Abid Dungawalla','','Mombasa','Abid Dungawalla','1111111',1,'','','','','e-kodi-45',10,5,10,'2012-11-17 19:11:21',11,2012,'',10,'','','','Residential',1,1,NULL),(46,'ZA: Esther Ngiya','','Mombasa','Esther Ngiya','1111111',1,'','','','','e-kodi-46',10,5,10,'2012-11-17 19:15:24',11,2012,'',NULL,NULL,NULL,NULL,NULL,1,NULL,NULL),(47,'ZA: Prof. Dorothy Ngacha','','Mombasa','Prof. Dorothy Ngacha','1111111',1,'','','','','e-kodi-47',10,5,10,'2012-11-18 11:29:27',11,2012,'',NULL,NULL,NULL,NULL,NULL,1,NULL,NULL),(48,'ZA: PM Ndungu','','Mombasa','Pm Ndungu','1111111',1,'','','','','e-kodi-48',10,5,10,'2012-11-18 11:29:59',11,2012,'',NULL,NULL,NULL,NULL,NULL,1,NULL,NULL),(49,'ZA: Najaa Omar Said','','Mombasa','Najaa Omar Said','1111111',1,'','','','','e-kodi-49',10,5,10,'2012-11-18 11:30:35',11,2012,'',NULL,NULL,NULL,NULL,NULL,1,NULL,NULL),(50,'ZA: Flora Kidere','','Mombasa','Flora Kidere','1111111',1,'','','','','e-kodi-50',10,5,10,'2012-11-18 11:31:07',11,2012,'',NULL,NULL,NULL,NULL,NULL,1,NULL,NULL),(51,'ZA: Maimuna Abrary','','Mombasa','Maimuna Abrary','1111111',1,'','','','','e-kodi-51',10,5,10,'2012-11-18 11:31:55',11,2012,'',NULL,NULL,NULL,NULL,NULL,1,NULL,NULL),(52,'ZA: Kennedu Kabui Kihumba','','Mombasa','Kennedu Kabui Kihumba','1111111',1,'','','','','e-kodi-52',10,5,10,'2012-11-18 11:32:31',11,2012,'',NULL,NULL,NULL,NULL,NULL,1,NULL,NULL),(53,'ZA: Zahir Nathani Yakub','','Mombasa','Zahir Nathani Yakub','1111111',1,'','','','','e-kodi-53',10,5,10,'2012-11-18 11:33:05',11,2012,'',NULL,NULL,NULL,NULL,NULL,1,NULL,NULL),(54,'ZA: D.H','','Mombasa','D.h','1111111',1,'','','','','e-kodi-54',10,5,10,'2012-11-18 11:33:40',11,2012,'',NULL,NULL,NULL,NULL,NULL,1,NULL,NULL),(55,'ZA: Joyce Wanjiru Munene','','Mombasa','Joyce Wanjiru Munene','1111111',1,'','','','','e-kodi-55',10,5,10,'2012-11-18 11:34:12',11,2012,'',NULL,NULL,NULL,NULL,NULL,1,NULL,NULL),(56,'ZA: Zuberi Musa Raloo','','Mombasa','Zuberi Musa Raloo','1111111',1,'','','','','e-kodi-56',10,5,10,'2012-11-18 11:34:51',11,2012,'',NULL,NULL,NULL,NULL,NULL,1,NULL,NULL),(57,'ZA: Deniel Tengo Tengo','','Mombasa','Deniel Tengo Tengo','1111111',1,'','','','','e-kodi-57',10,5,10,'2012-11-18 11:35:58',11,2012,'',NULL,NULL,NULL,NULL,NULL,1,NULL,NULL),(58,'ZA: Rosemary Wangu Munene','','Mombasa','Rosemary Wangu Munene','1111111',1,'','','','','e-kodi-58',10,5,10,'2012-11-18 11:36:35',11,2012,'',NULL,NULL,NULL,NULL,NULL,1,NULL,NULL),(59,'ZA: Lucy Wanjuhi Nganga','','Mombasa','Lucy Wanjuhi Nganga','1111111',1,'','','','','e-kodi-59',10,5,10,'2012-11-18 11:37:06',11,2012,'',NULL,NULL,NULL,NULL,NULL,1,NULL,NULL),(60,'ZA: Amina Mohamed Saleem Salyani','','Mombasa','Amina Mohamed Saleem Salyani','1111111',1,'','','','','e-kodi-60',10,5,10,'2012-11-18 11:37:36',11,2012,'',10,'','','','Residential',1,1,NULL),(61,'ZA: Abdulhafiz Mohamed Bashir Harunani','','Mombasa','Abdulhafiz Mohamed Bashir Harunani','1111111',1,'','','','','e-kodi-61',10,5,10,'2012-11-18 11:38:14',11,2012,'',10,'','','','Residential',1,1,NULL),(62,'ZA: Eshak Adam Harunani','','Mombasa','Eshak Adam Harunani','1111111',1,'','','','','e-kodi-62',10,5,10,'2012-11-18 11:38:40',11,2012,'',NULL,NULL,NULL,NULL,NULL,1,NULL,NULL),(63,'ZA: Bhanda Khuda','','Mombasa','Bhanda Khuda','1111111',1,'','','','','e-kodi-63',10,5,10,'2012-11-18 11:39:09',11,2012,'',NULL,NULL,NULL,NULL,NULL,1,NULL,NULL),(64,'ZA: Mark Kamau Kibe','','Mombasa','Mark Kamau Kibe','1111111',1,'','','','','e-kodi-64',10,5,10,'2012-11-18 11:39:36',11,2012,'',NULL,NULL,NULL,NULL,NULL,1,NULL,NULL),(65,'ZA: Victor Benson Olwande Oballa And Priscilla Cynthea Achieng Onyango','','Mombasa','Victor Benson Olwande Oballa And Priscilla Cynthea Achieng Onyango','1111111',1,'','','','','e-kodi-65',10,5,10,'2012-11-18 14:46:04',11,2012,'',NULL,NULL,NULL,NULL,NULL,1,NULL,NULL),(66,'ZA: John Gitonga & Allote Businge','','Mombasa','John Gitonga & Allote Businge','1111111',1,'','','','','e-kodi-66',10,5,10,'2012-11-18 14:46:58',11,2012,'',NULL,NULL,NULL,NULL,NULL,1,NULL,NULL),(67,'ZA: Hitesh Chudasama','','Mombasa','Hitesh Chudasama','1111111',1,'','','','','e-kodi-67',10,5,10,'2012-11-18 14:47:44',11,2012,'',NULL,NULL,NULL,NULL,NULL,1,NULL,NULL),(68,'ZA: Linet Nyamboke','','Mombasa','Linet Nyamboke','1111111',1,'','','','','e-kodi-68',10,5,10,'2012-11-18 14:48:30',11,2012,'',NULL,NULL,NULL,NULL,NULL,1,NULL,NULL),(69,'ZA: Charles Muriithi','','Mombasa','Charles Muriithi','1111111',1,'','','','','e-kodi-69',10,5,10,'2012-11-18 14:48:57',11,2012,'',NULL,NULL,NULL,NULL,NULL,1,NULL,NULL),(70,'ZA: Shabbir Kapacee','','Mombasa','Shabbir Kapacee','1111111',1,'','','','','e-kodi-70',10,5,10,'2012-11-18 14:49:29',11,2012,'',NULL,NULL,NULL,NULL,NULL,1,NULL,NULL),(71,'ZA: Asgal Mamujee','','Mombasa','Asgal Mamujee','1111111',1,'','','','','e-kodi-71',10,5,10,'2012-11-18 14:50:04',11,2012,'',NULL,NULL,NULL,NULL,NULL,1,NULL,NULL),(72,'ZA: Joon','','Mombasa','Joon','1111111',1,'','','','','e-kodi-72',10,5,10,'2012-11-18 14:50:44',11,2012,'',NULL,NULL,NULL,NULL,NULL,1,NULL,NULL),(73,'ZA: Mr. Ahmed Assad Ahmed Hassan','','Mombasa','Mr. Ahmed Assad Ahmed Hassan','1111111',1,'','','','','e-kodi-73',10,5,10,'2012-11-18 14:51:11',11,2012,'',NULL,NULL,NULL,NULL,NULL,1,NULL,NULL),(74,'ZA: Murtaza Tajbhai','','Mombasa','Murtaza Tajbhai','1111111',1,'','','','','e-kodi-74',10,5,10,'2012-11-18 14:51:35',11,2012,'',NULL,NULL,NULL,NULL,NULL,1,NULL,NULL),(75,'ZA: Alshad Jamal','','Mombasa','Alshad Jamal','1111111',1,'','','','','e-kodi-75',10,5,10,'2012-11-18 14:52:28',11,2012,'',10,'','','','Residential',1,1,NULL),(76,'ZA: Azziza Shapi Mohamed','','Mombasa','Azziza Shapi Mohamed','1111111',1,'','','','','e-kodi-76',10,5,10,'2012-11-18 14:52:56',11,2012,'',NULL,NULL,NULL,NULL,NULL,1,NULL,NULL),(77,'ZA: Angela Mwashumbe','','Mombasa','Angela Mwashumbe','1111111',1,'','','','','e-kodi-77',10,5,10,'2012-11-18 14:53:26',11,2012,'',10,'','','','Residential',1,1,NULL),(78,'ZA: Begum Ali Khamis Shapi','','Mombasa','Begum Ali Khamis Shapi','1111111',1,'','','','','e-kodi-78',10,5,10,'2012-11-18 14:53:59',11,2012,'',NULL,NULL,NULL,NULL,NULL,1,NULL,NULL),(79,'ZA: Purity Rukunga','','Mombasa','Purity Rukunga','1111111',1,'','','','','e-kodi-79',10,5,10,'2012-11-18 14:58:28',11,2012,'',NULL,NULL,NULL,NULL,NULL,1,NULL,NULL),(80,'ZA: Anthony Kiplimo Kiplagat','','Mombasa','Anthony Kiplimo Kiplagat','1111111',1,'','','','','e-kodi-80',10,5,10,'2012-11-18 15:00:06',11,2012,'',NULL,NULL,NULL,NULL,NULL,1,NULL,NULL),(81,'ZA: Abdurrahman Abdulrazak/Shaheedabanu A. Khandwalla','','Mombasa','Abdurrahman Abdulrazak/shaheedabanu A. Khandwalla','1111111',1,'','','','','e-kodi-81',10,5,10,'2012-11-18 15:01:06',11,2012,'',10,'No','','','Residential',1,1,NULL),(82,'ZA: Robert Noah Karara','','Mombasa','Robert Noah Karara','1111111',1,'','','','','e-kodi-82',10,5,10,'2012-11-18 15:01:33',11,2012,'',NULL,NULL,NULL,NULL,NULL,1,NULL,NULL),(83,'ZA: Jackline Chepkirui/Veronica Mulira','','Mombasa','Jackline Chepkirui/veronica Mulira','1111111',1,'','','','','e-kodi-83',10,5,10,'2012-11-18 15:02:03',11,2012,'',NULL,NULL,NULL,NULL,NULL,1,NULL,NULL),(84,'ZA: Christine Chesire/Sospeter','','Mombasa','Christine Chesire/sospeter','1111111',1,'','','','','e-kodi-84',10,5,10,'2012-11-18 15:03:35',11,2012,'',NULL,NULL,NULL,NULL,NULL,1,NULL,NULL),(85,'ZA: Timothy Kipkoech Kendgor','','Mombasa','Timothy Kipkoech Kendgor','1111111',1,'','','','','e-kodi-85',10,5,10,'2012-11-18 15:04:23',11,2012,'',NULL,NULL,NULL,NULL,NULL,1,NULL,NULL),(86,'ZA: Pius Oyier And Gladys  Opar','','Mombasa','Pius Oyier And Gladys  Opar','1111111',1,'','','','','e-kodi-86',10,5,10,'2012-11-18 15:05:33',11,2012,'',NULL,NULL,NULL,NULL,NULL,1,NULL,NULL),(87,'ZA: Mrs Kimura (Greenpark)','','Mombasa','Mrs Kimura (greenpark)','1111111',1,'','','','','e-kodi-87',10,5,10,'2012-11-18 15:06:00',11,2012,'',NULL,NULL,NULL,NULL,NULL,1,NULL,NULL),(88,'ZA: Sarah Malinga','','Mombasa','Sarah Malinga','1111111',1,'','','','','e-kodi-88',10,5,10,'2012-11-18 15:06:47',11,2012,'',NULL,NULL,NULL,NULL,NULL,1,NULL,NULL),(89,'ZA: Charna Ivestments','','Mombasa','Charna Ivestments','1111111',1,'','','','','e-kodi-89',10,5,10,'2012-11-18 15:07:29',11,2012,'',NULL,NULL,NULL,NULL,NULL,1,NULL,NULL),(90,'ZA: Chung Sok Song & Mrs Hyung Ran Lee','','Mombasa','Chung Sok Song & Mrs Hyung Ran Lee','1111111',1,'','','','','e-kodi-90',10,5,10,'2012-11-18 15:07:58',11,2012,'',NULL,NULL,NULL,NULL,NULL,1,NULL,NULL),(91,'ZA: Caroline Armstrong','','Mombasa','Caroline Armstrong','1111111',1,'','','','','e-kodi-91',10,5,10,'2012-11-18 15:08:45',11,2012,'',NULL,NULL,NULL,NULL,NULL,1,NULL,NULL),(92,'ZA: Anne Wanja Wamithi','','Mombasa','Anne Wanja Wamithi','1111111',1,'','','','','e-kodi-92',10,5,10,'2012-11-18 15:09:32',11,2012,'',10,'','','','Residential',1,1,NULL),(93,'ZA: Muthoni Gateere Catherine','','Mombasa','Muthoni Gateere Catherine','1111111',1,'','','','','e-kodi-93',10,5,10,'2012-11-18 15:10:02',11,2012,'',NULL,NULL,NULL,NULL,NULL,1,NULL,NULL),(94,'ZA: Catherine Wairimu Kamande','','Mombasa','Catherine Wairimu Kamande','1111111',1,'','','','','e-kodi-94',10,5,10,'2012-11-18 15:10:33',11,2012,'',NULL,NULL,NULL,NULL,NULL,1,NULL,NULL),(95,'ZA: Farida Soud','','Mombasa','Farida Soud','1111111',1,'','','','','e-kodi-95',10,5,10,'2012-11-18 15:11:20',11,2012,'',NULL,NULL,NULL,NULL,NULL,1,NULL,NULL),(96,'ZA: Mohamed Karimjee','','Mombasa','Mohamed Karimjee','1111111',1,'','','','','e-kodi-96',10,5,10,'2012-11-18 15:12:23',11,2012,'',NULL,NULL,NULL,NULL,NULL,1,NULL,NULL),(97,'ZA: Felistas Seenoi','','Mombasa','Felistas Seenoi','1111111',1,'','','','','e-kodi-97',10,5,10,'2012-11-18 15:21:08',11,2012,'',NULL,NULL,NULL,NULL,NULL,1,NULL,NULL),(98,'ZA: Pauline Wambui Nginga','','Mombasa','Pauline Wambui Nginga','1111111',1,'','','','','e-kodi-98',10,5,10,'2012-11-18 15:21:54',11,2012,'',NULL,NULL,NULL,NULL,NULL,1,NULL,NULL),(99,'ZA: Shekha Hamed Abdallah','','Mombasa','Shekha Hamed Abdallah','1111111',1,'','','','','e-kodi-99',10,5,10,'2012-11-18 15:24:48',11,2012,'',NULL,NULL,NULL,NULL,NULL,1,NULL,NULL),(100,'ZA: Mustafa Mohamed Hussein','','Mombasa','Mustafa Mohamed Hussein','1111111',1,'','','','','e-kodi-100',10,5,10,'2012-11-18 15:24:53',11,2012,'',NULL,NULL,NULL,NULL,NULL,1,NULL,NULL),(101,'ZA: Sujay Madurshi Mulji Khajaw','','Mombasa','Sujay Madurshi Mulji Khajaw','1111111',1,'','','','','e-kodi-101',10,5,10,'2012-11-18 15:27:54',11,2012,'',NULL,NULL,NULL,NULL,NULL,1,NULL,NULL),(102,'ZA: Hussein Mohamed Ali','','Mombasa','Hussein Mohamed Ali','1111111',1,'','','','','e-kodi-102',10,5,10,'2012-11-18 15:28:22',11,2012,'',NULL,NULL,NULL,NULL,NULL,1,NULL,NULL),(103,'ZA: Zakirhussein Saiger','','Mombasa','Zakirhussein Saiger','1111111',1,'','','','','e-kodi-103',10,5,10,'2012-11-18 15:28:48',11,2012,'',NULL,NULL,NULL,NULL,NULL,1,NULL,NULL),(104,'ZA: Salim K. Noorani','','Mombasa','Salim K. Noorani','1111111',1,'','','','','e-kodi-104',10,5,10,'2012-11-18 15:29:26',11,2012,'',NULL,NULL,NULL,NULL,NULL,1,NULL,NULL),(105,'ZA: Shabbir Karimjee','','Mombasa','Shabbir Karimjee','1111111',1,'','','','','e-kodi-105',10,5,10,'2012-11-18 15:30:28',11,2012,'',NULL,NULL,NULL,NULL,NULL,1,NULL,NULL),(106,'ZA: Evans Nyangara','','Mombasa','Evans Nyangara','1111111',1,'','','','','e-kodi-106',10,5,10,'2012-11-18 15:30:57',11,2012,'',NULL,NULL,NULL,NULL,NULL,1,NULL,NULL),(107,'ZA: Juzer Asgarali Ebrahimjee','','Mombasa','Juzer Asgarali Ebrahimjee','1111111',1,'','','','','e-kodi-107',10,5,10,'2012-11-18 15:31:22',11,2012,'',NULL,NULL,NULL,NULL,NULL,1,NULL,NULL),(108,'ZA: Mahendrakumar Rajbhai','','Mombasa','Mahendrakumar Rajbhai','1111111',1,'','','','','e-kodi-108',10,5,10,'2012-11-18 15:37:30',11,2012,'',NULL,NULL,NULL,NULL,NULL,1,NULL,NULL),(109,'ZA: Dr. Atul Shah','','Mombasa','Dr. Atul Shah','1111111',1,'','','','','e-kodi-109',10,5,10,'2012-11-18 15:39:19',11,2012,'',NULL,NULL,NULL,NULL,NULL,1,NULL,NULL),(110,'ZA: January Muthenya Wambua','','Mombasa','January Muthenya Wambua','1111111',1,'','','','','e-kodi-110',10,5,10,'2012-11-18 15:39:55',11,2012,'',NULL,NULL,NULL,NULL,NULL,1,NULL,NULL),(111,'ZA: Abbas Muzzaffer Karimjee','','Mombasa','Abbas Muzzaffer Karimjee','1111111',1,'','','','','e-kodi-111',10,5,10,'2012-11-18 15:40:18',11,2012,'',10,'','','','Residential',1,1,NULL),(112,'ZA: Asif Jetha','','Mombasa','Asif Jetha','1111111',1,'','','','','e-kodi-112',10,5,10,'2012-11-18 15:41:05',11,2012,'',NULL,NULL,NULL,NULL,NULL,1,NULL,NULL),(113,'ZA: Lawrence Siele','','Mombasa','Lawrence Siele','1111111',1,'','','','','e-kodi-113',10,5,10,'2012-11-18 15:46:09',11,2012,'',NULL,NULL,NULL,NULL,NULL,1,NULL,NULL),(114,'ZA: Maria Mullah','','Mombasa','Maria Mullah','1111111',1,'','','','','e-kodi-114',10,5,10,'2012-11-18 15:46:36',11,2012,'',NULL,NULL,NULL,NULL,NULL,1,NULL,NULL),(115,'ZA: Kush Haria','','Mombasa','Kush Haria','1111111',1,'','','','','e-kodi-115',10,5,10,'2012-11-18 15:47:01',11,2012,'',NULL,NULL,NULL,NULL,NULL,1,NULL,NULL),(116,'ZA: Janardanan Myliat','','Mombasa','Janardanan Myliat','1111111',1,'','','','','e-kodi-116',10,5,10,'2012-11-18 15:47:27',11,2012,'',NULL,NULL,NULL,NULL,NULL,1,NULL,NULL),(117,'ZA: Liquat Valiji','','Mombasa','Liquat Valiji','1111111',1,'','','','','e-kodi-117',10,5,10,'2012-11-18 15:48:01',11,2012,'',NULL,NULL,NULL,NULL,NULL,1,NULL,NULL),(118,'ZA: Nurdin Rajbhai','','Mombasa','Nurdin Rajbhai','1111111',1,'','','','','e-kodi-118',10,5,10,'2012-11-18 15:48:42',11,2012,'',NULL,NULL,NULL,NULL,NULL,1,NULL,NULL),(119,'ZA: Augustine Moyo','','Mombasa','Augustine Moyo','1111111',1,'','','','','e-kodi-119',10,5,10,'2012-11-18 15:49:02',11,2012,'',NULL,NULL,NULL,NULL,NULL,1,NULL,NULL),(120,'ZA: Purity Muthoni Kinoti','','Mombasa','Purity Muthoni Kinoti','1111111',1,'','','','','e-kodi-120',10,5,10,'2012-11-18 15:49:37',11,2012,'',NULL,NULL,NULL,NULL,NULL,1,NULL,NULL),(122,'Timami Homes','P.O box 87288-80100 Mombasa','Kongowea','Timami Homes','0722725544',1,'','','','','e-Kodi-122',10,10,2,'2012-11-26 11:21:51',11,2012,'swaifissa@gmail.com',10,'Yes','','','Residential',1,1,NULL),(123,'Za: Victor Omwanda','Mombasa','Mombasa','Victor Omwanda','1111111',1,'','','','','e-Kodi-123',10,5,10,'2012-11-28 14:50:12',11,2012,'admin@admin.com',10,NULL,NULL,NULL,NULL,1,NULL,NULL),(124,'Mkomani Apartments','N/A','Mombasa','Mkomani Apartments','1111111',1,'','','','','e-Kodi-124',10,5,10,'2012-12-31 11:16:26',12,2012,'lawrence@blacksands.biz',10,'Yes','','','Residential',1,1,NULL),(125,'Armtrev','','Nairobi','Amtrev Enterprises','254 722270985',1,'','','','','e-Kodi-125',10,0,0,'2013-01-16 09:44:46',1,2013,'roselynwk@gmail.com',10,'No','110','2012','Residential',5,1,NULL),(127,'Tumaini Gardens','Ngecha Road','Kiambu','Ruth Kirago','Ã·254722686268',1,'','','','','e-Kodi-127',10,7,15,'2013-01-26 19:07:03',1,2013,'info@e-kodi.com',1,'Yes','','1972','Residential',8,1,NULL);
/*!40000 ALTER TABLE `property_details` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `property_item`
--

DROP TABLE IF EXISTS `property_item`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `property_item` (
  `id` int(5) NOT NULL AUTO_INCREMENT,
  `property_listing` int(5) DEFAULT NULL,
  `location` varchar(100) DEFAULT NULL,
  `floor` varchar(100) DEFAULT NULL,
  `rent` varchar(50) DEFAULT NULL,
  `service_charge` varchar(50) DEFAULT NULL,
  `deposit_paid` int(5) DEFAULT '0',
  `tenant` int(5) DEFAULT '0',
  `transactiontime` datetime DEFAULT NULL,
  `property_month` int(11) DEFAULT NULL,
  `property_year` int(11) DEFAULT NULL,
  `unit_type` varchar(15) DEFAULT NULL,
  `UID` int(10) DEFAULT NULL,
  `list` int(5) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=243 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `property_item`
--

LOCK TABLES `property_item` WRITE;
/*!40000 ALTER TABLE `property_item` DISABLE KEYS */;
INSERT INTO `property_item` VALUES (22,8,'2/Block 1/Floor 2/02','Block 1: Second Floor','30000','0',0,0,'2012-11-18 16:43:03',11,2012,'3BR',NULL,NULL),(23,8,'3/Block 1/Floor 2/03','Block 1: Second Floor','30000','0',0,0,'2012-11-18 16:43:41',11,2012,'3BR',NULL,NULL),(24,8,'4/Block 1/Floor 2/04','Block 1: Second Floor','30000','0',0,0,'2012-11-18 17:54:15',11,2012,'3BR',NULL,NULL),(25,8,'5/Block 1/Floor 2/05','Block 1: Second Floor','30000','0',0,0,'2012-11-18 18:09:10',11,2012,'3BR',NULL,NULL),(26,8,'6/Block 1/Floor 2/06','Block 1: Second Floor','30000','0',0,0,'2012-11-18 18:12:32',11,2012,'3BR',NULL,NULL),(27,8,'7/Block 1/Floor 3/01','Block 1: Third Floor','30000','0',0,0,'2012-11-18 18:14:28',11,2012,'3BR',NULL,NULL),(28,8,'8/Block 1/Floor 3/02','Block 1: Third Floor','30000','0',0,0,'2012-11-18 18:14:51',11,2012,'3BR',NULL,NULL),(29,8,'9/Block 1/Floor 3/03','Block 1: Third Floor','30000','0',0,0,'2012-11-18 18:15:18',11,2012,'3BR',NULL,NULL),(30,8,'10/Block 1/Floor 3/04','Block 1: Third Floor','30000','0',0,0,'2012-11-18 19:00:04',11,2012,'3BR',NULL,NULL),(31,8,'12/Block 1/Floor 3/06','Block 1: Third Floor','30000','0',0,0,'2012-11-18 19:18:53',11,2012,'3BR',NULL,NULL),(32,9,'13/Block 1/Floor 4/01','Block 1: Fourth Floor','30000','0',0,0,'2012-11-18 19:19:27',11,2012,'3BR',NULL,NULL),(33,9,'14/Block 1/Floor 4/02','Block 1: Fourth Floor','30000','0',0,0,'2012-11-18 19:20:05',11,2012,'3BR',NULL,NULL),(34,9,'15/Block 1/Floor 4/03','Block 1: Fourth Floor','30000','0',0,0,'2012-11-18 19:20:38',11,2012,'3BR',NULL,NULL),(35,9,'16/Block 1/Floor 4/04','Block 1: Fourth Floor','30000','0',0,0,'2012-11-18 19:20:55',11,2012,'3BR',NULL,NULL),(36,10,'17/Block 1/Floor 4/05','Block 1: Fourth Floor','30000','0',0,0,'2012-11-18 19:21:18',11,2012,'3BR',NULL,NULL),(37,10,'18/Block 1/Floor 4/06','Block 1: Third Floor','30000','0',0,0,'2012-11-18 19:21:48',11,2012,'3BR',NULL,NULL),(38,11,'19/Block 2/Floor Gr/01','Block 2: Ground Floor','30000','0',0,0,'2012-11-18 19:22:48',11,2012,'3BR',NULL,NULL),(39,12,'20/Block 2/Floor Gr/02','Block 2: Ground Floor','30000','0',0,0,'2012-11-18 19:24:13',11,2012,'3BR',NULL,NULL),(40,12,'21/Block 2/Floor Gr/03','Block 2: Ground Floor','30000','0',0,0,'2012-11-18 19:24:30',11,2012,'3BR',NULL,NULL),(41,12,'22/Block 2/Floor Gr/04','Block 2: Ground Floor','30000','0',0,0,'2012-11-18 19:24:59',11,2012,'3BR',NULL,NULL),(42,13,'27/Block 2/Floor Gr/09','Block 2: Ground Floor','30000','0',0,0,'2012-11-18 19:25:42',11,2012,'3BR',NULL,NULL),(43,13,'28/Block 2/Floor Gr/10','Block 2: Ground Floor','30000','0',0,0,'2012-11-18 19:27:13',11,2012,'3BR',NULL,NULL),(44,13,'29/Block 2/Floor Gr/11','Block 2: Ground Floor','30000','0',0,0,'2012-11-18 19:27:50',11,2012,'3BR',NULL,NULL),(45,13,'30/Block 2/Floor Gr/12','Block 2: Ground Floor','30000','0',0,0,'2012-11-18 19:29:27',11,2012,'3BR',NULL,NULL),(47,122,'Timami Homes','Ground Floor','10000','0',1,0,'2012-11-26 11:22:25',11,2012,'1BR',NULL,NULL),(48,8,'1/Block 1/Floor 2/01','Second Floor','35000','0',0,0,'2012-11-27 09:46:10',11,2012,'3BR',NULL,NULL),(49,8,'11/Block 1/Floor 3/05','Third Floor','35000','0',0,0,'2012-11-27 09:46:52',11,2012,'3BR',NULL,NULL),(50,21,'31/Block 2/Floor 1/01','Block 2: First Floor','30000','0',0,0,'2012-11-28 08:26:05',11,2012,'3BR',NULL,NULL),(51,99,'32/Block 2/Floor 1/02','Block 2: First Floor','30000','0',0,0,'2012-11-28 08:26:44',11,2012,'3BR',NULL,NULL),(52,12,'33/Block 2/Floor 1/03','Block 2: First Floor','30000','0',0,0,'2012-11-28 08:27:16',11,2012,'3BR',NULL,NULL),(53,12,'34/Block 2/Floor 1/04','Block 2: First Floor','30000','0',0,0,'2012-11-28 08:28:47',11,2012,'3BR',NULL,NULL),(54,16,'35/Block 2/Floor 1/05','Block 2: First Floor','30000','0',0,0,'2012-11-28 08:29:12',11,2012,'3BR',NULL,NULL),(55,17,'36/Block 2/Floor 1/06','Block 2: First Floor','30000','0',0,0,'2012-11-28 08:29:42',11,2012,'2BR',NULL,NULL),(56,18,'39/Block 2/Floor 1/09','Block 2: First Floor','30000','0',0,0,'2012-11-28 08:30:06',11,2012,'3BR',NULL,NULL),(57,19,'40/Block 2/Floor 1/10','Block 2: First Floor','30000','0',0,0,'2012-11-28 08:30:29',11,2012,'3BR',NULL,NULL),(58,20,'41/Block 2/Floor 1/11','Block 2: First Floor','30000','0',0,0,'2012-11-28 08:30:53',11,2012,'3BR',NULL,NULL),(59,20,'42/Block 2/Floor 1/12','Block 2: First Floor','30000','0',0,0,'2012-11-28 08:31:17',11,2012,'3BR',NULL,NULL),(60,21,'43/Block 2/Floor 2/01','Block 2: Second Floor','30000','0',0,0,'2012-11-28 08:31:52',11,2012,'3BR',NULL,NULL),(61,14,'44/Block 2/Floor 2/02','Block 2: Second Floor','30000','0',0,0,'2012-11-28 08:32:18',11,2012,'3BR',NULL,NULL),(62,22,'46/Block 2/Floor 2/04','Block 2: Second Floor','30000','0',0,0,'2012-11-28 08:33:48',11,2012,'3BR',NULL,NULL),(63,23,'47/Block 2/Floor 2/05','Block 2: Second Floor','30000','0',0,0,'2012-11-28 08:34:20',11,2012,'3BR',NULL,NULL),(64,24,'51/Block 2/Floor 2/09','Block 2: Second Floor','30000','0',0,0,'2012-11-28 08:49:59',11,2012,'3BR',NULL,NULL),(65,24,'52/Block 2/Floor 2/10','Block 2: Second Floor','30000','0',0,0,'2012-11-28 08:50:23',11,2012,'3BR',NULL,NULL),(66,24,'53/Block 2/Floor 2/11','Block 2: Second Floor','30000','0',0,0,'2012-11-28 08:53:16',11,2012,'3BR',NULL,NULL),(67,24,'54/Block 2/Floor 2/12','Block 2: Second Floor','30000','0',0,0,'2012-11-28 08:54:06',11,2012,'3BR',NULL,NULL),(68,8,'55/Block 2/Floor 3/01','Block 2: Third Floor','30000','0',0,0,'2012-11-28 10:13:07',11,2012,'3BR',NULL,NULL),(69,8,'56/Block 2/Floor 3/02','Block 2: Third Floor','30000','0',0,0,'2012-11-28 10:13:35',11,2012,'3BR',NULL,NULL),(70,8,'57/Block 2/Floor 3/03','Block 2: Third Floor','30000','0',0,0,'2012-11-28 10:16:03',11,2012,'3BR',NULL,NULL),(71,8,'58/Block 2/Floor 3/04','Block 2: Third Floor','30000','0',0,0,'2012-11-28 10:16:55',11,2012,'3BR',NULL,NULL),(72,8,'59/Block 2/Floor 3/05','Block 2: Third Floor','30000','0',0,0,'2012-11-28 10:17:25',11,2012,'3BR',NULL,NULL),(73,8,'63/Block 2/Floor 3/09','Block 2: Third Floor','30000','0',0,0,'2012-11-28 10:17:47',11,2012,'3BR',NULL,NULL),(74,24,'64/Block 2/Floor 3/10','Block 2: Fourth Floor','30000','0',0,0,'2012-11-28 10:18:15',11,2012,'3BR',NULL,NULL),(75,24,'65/Block 2/Floor 3/11','Block 2: Fourth Floor','30000','0',0,0,'2012-11-28 10:18:44',11,2012,'3BR',NULL,NULL),(76,25,'71/Block 2/Floor 4/05','Block 2: Fourth Floor','30000','0',0,0,'2012-11-28 10:44:09',11,2012,'3BR',NULL,NULL),(77,26,'78/Block 2/Floor 4/12','Block 2: Fourth Floor','30000','0',0,0,'2012-11-28 10:44:41',11,2012,'3BR',NULL,NULL),(78,27,'91/Block 3/Floor 1/01','Block 3: First Floor','30000','0',0,0,'2012-11-28 12:27:07',11,2012,'3BR',NULL,NULL),(79,28,'95/Block 3/Floor 1/05','Block 3: First Floor','30000','0',0,0,'2012-11-28 12:28:39',11,2012,'3BR',NULL,NULL),(80,29,'95/Block 3/Floor 1/05','Block 3: First Floor','30000','0',0,0,'2012-11-28 12:31:28',11,2012,'2BR',NULL,NULL),(81,30,'97/Block 3/Floor 1/07','Block 3: First Floor','30000','0',0,0,'2012-11-28 12:35:49',11,2012,'2BR',NULL,NULL),(82,31,'99/Block 3/Floor 1/09','Block 3: First Floor','30000','0',0,0,'2012-11-28 12:37:43',11,2012,'3BR',NULL,NULL),(83,31,'100/Block 3/Floor 1/10','Block 3: First Floor','30000','0',0,0,'2012-11-28 12:38:37',11,2012,'3BR',NULL,NULL),(84,44,'101/Block 3/Floor 1/11','Block 3: First Floor','30000','0',0,0,'2012-11-28 12:39:05',11,2012,'3BR',NULL,NULL),(85,32,'103/Block 3/Floor 2/01','Block 3: Second Floor','30000','0',0,0,'2012-11-28 12:40:00',11,2012,'3BR',NULL,NULL),(86,33,'104/Block 3/Floor 2/02','Block 3: Second Floor','30000','0',0,0,'2012-11-28 12:40:27',11,2012,'3BR',NULL,NULL),(87,33,'105/Block 3/Floor 2/03','Block 3: Second Floor','30000','0',0,0,'2012-11-28 12:41:03',11,2012,'3BR',NULL,NULL),(88,34,'106/Block 3/Floor 2/04','Block 3: Second Floor','30000','0',0,0,'2012-11-28 12:41:39',11,2012,'3BR',NULL,NULL),(89,35,'107/Block 3/Floor 2/05','Block 3: Second Floor','30000','0',0,0,'2012-11-28 12:42:18',11,2012,'3BR',NULL,NULL),(90,36,'108/Block 3/Floor 2/06','Block 3: Second Floor','30000','0',0,0,'2012-11-28 12:43:01',11,2012,'2BR',NULL,NULL),(91,7,'379/Block 1/Floor 2/01','Block 1: First Floor','30000','0',0,0,'2012-11-28 12:46:39',11,2012,'3BR',NULL,NULL),(92,37,'111/Block 3/Floor 2/09','Block 3: Seconf Floor','30000','0',0,0,'2012-11-28 12:54:26',11,2012,'3BR',NULL,NULL),(93,38,'112/Block 3/Floor 2/10','Block 3: Second Floor','30000','0',0,0,'2012-11-28 12:55:59',11,2012,'3BR',NULL,NULL),(94,39,'113/Block 3/Floor 2/11','Block 3: Second Floor','30000','0',0,0,'2012-11-28 12:57:27',11,2012,'3BR',NULL,NULL),(95,40,'114/Block 3/Floor 2/12','Block 3: Second Floor','30000','0',0,0,'2012-11-28 12:58:56',11,2012,'3BR',NULL,NULL),(96,41,'115/Block 3/Floor 3/01','Block 3: Third Floor','30000','0',0,0,'2012-11-28 13:00:10',11,2012,'3BR',NULL,NULL),(97,42,'118/Block 3/Floor 3/04','Block 3: Third Floor','30000','0',0,0,'2012-11-28 13:00:42',11,2012,'3BR',NULL,NULL),(98,43,'119/Block 3/Floor 3/05','Block 3: Third Floor','30000','0',0,0,'2012-11-28 13:01:23',11,2012,'3BR',NULL,NULL),(99,44,'120/Block 3/Floor 3/06','Block 3: Third Floor','30000','0',0,0,'2012-11-28 13:02:10',11,2012,'2BR',NULL,NULL),(100,45,'123/Block 3/Floor 3/09','Block 3: Third Floor','30000','0',0,0,'2012-11-28 13:11:44',11,2012,'3BR',NULL,NULL),(101,46,'124/Block 3/Floor 3/10','Block 3: Third Floor','30000','0',0,0,'2012-11-28 13:12:14',11,2012,'3BR',NULL,NULL),(102,40,'125/Block 3/Floor 3/11','Block 3: Third Floor','30000','0',0,0,'2012-11-28 13:12:42',11,2012,'3BR',NULL,NULL),(103,47,'126/Block 3/Floor 3/12','Block 3: Third Floor','30000','0',0,0,'2012-11-28 13:13:14',11,2012,'3BR',NULL,NULL),(104,48,'127/Block 3/Floor 4/01','Block 3: Fourth Floor','30000','0',0,0,'2012-11-28 13:15:32',11,2012,'3BR',NULL,NULL),(105,49,'129/Block 3/Floor 4/03','Block 3: Fourth Floor','30000','0',0,0,'2012-11-28 13:16:06',11,2012,'3BR',NULL,NULL),(106,50,'131/Block 3/Floor 4/05','Block 3: Fourth Floor','30000','0',0,0,'2012-11-28 13:17:12',11,2012,'3BR',NULL,NULL),(107,51,'135/Block 3/Floor 4/09','Block 3: Fourth Floor','30000','0',0,0,'2012-11-28 13:17:37',11,2012,'3BR',NULL,NULL),(108,52,'136/Block 3/Floor 4/10','Block 3: Fourth Floor','30000','0',0,0,'2012-11-28 13:20:12',11,2012,'3BR',NULL,NULL),(109,53,'138/Block 3/Floor 4/12','Block 3: Fourth Floor','30000','0',0,0,'2012-11-28 13:20:39',11,2012,'3BR',NULL,NULL),(110,54,'143/Block 4/Floor Gr/05','Block 4: Ground Floor','30000','0',0,0,'2012-11-28 13:21:27',11,2012,'2BR',NULL,NULL),(111,54,'144/Block 4/Floor Gr/06','Block 4: Ground Floor','30000','0',0,0,'2012-11-28 13:21:57',11,2012,'2BR',NULL,NULL),(112,54,'145/Block 4/Floor Gr/07','Block 4: Ground Floor','30000','0',0,0,'2012-11-28 13:22:22',11,2012,'2BR',NULL,NULL),(113,55,'150/Block 4/Floor 1/01','Block 4: First Floor','30000','0',0,0,'2012-11-28 13:23:09',11,2012,'3BR',NULL,NULL),(114,56,'151/Block 4/Floor 1/02','Block 4: First Floor','30000','0',0,0,'2012-11-28 13:30:23',11,2012,'3BR',NULL,NULL),(115,56,'152/Block 4/Floor 1/03','Block 4: First Floor','30000','0',0,0,'2012-11-28 13:30:57',11,2012,'3BR',NULL,NULL),(116,55,'153/Block 4/Floor 1/04','Block 4: First Floor','30000','0',0,0,'2012-11-28 13:31:30',11,2012,'3BR',NULL,NULL),(117,54,'154/Block 4/Floor 1/05','Block 4: First Floor','30000','0',0,0,'2012-11-28 13:31:57',11,2012,'2BR',NULL,NULL),(118,54,'156/Block 4/Floor 1/07','Block 4: First Floor','30000','0',0,0,'2012-11-28 13:32:30',11,2012,'2BR',NULL,NULL),(119,54,'155/Block 4/Floor 1/06','Block 4: First Floor','30000','0',0,0,'2012-11-28 13:33:19',11,2012,'2BR',NULL,NULL),(120,57,'157/Block 4/Floor 1/08','Block 4: First Floor','30000','0',0,0,'2012-11-28 13:33:59',11,2012,'3BR',NULL,NULL),(121,58,'161/Block 4/Floor 2/01','Block 4: Second Floor','30000','0',0,0,'2012-11-28 13:34:41',11,2012,'3BR',NULL,NULL),(122,58,'162/Block 4/Floor 2/02','Block 4: Second Floor','30000','0',0,0,'2012-11-28 13:35:07',11,2012,'3BR',NULL,NULL),(123,59,'163/Block 4/Floor 2/03','Block 4: Second Floor','30000','0',0,0,'2012-11-28 13:35:55',11,2012,'3BR',NULL,NULL),(124,59,'164/Block 4/Floor 2/04','Block 4: Second Floor','30000','0',0,0,'2012-11-28 13:36:23',11,2012,'3BR',NULL,NULL),(125,54,'165/Block 4/Floor 2/05','Block 4: Second Floor','30000','0',0,0,'2012-11-28 13:37:01',11,2012,'2BR',NULL,NULL),(126,54,'166/Block 4/Floor 2/06','Block 4: Second Floor','30000','0',0,0,'2012-11-28 13:37:27',11,2012,'2BR',NULL,NULL),(127,54,'167/Block 4/Floor 2/07','Block 4: Second Floor','30000','0',0,0,'2012-11-28 13:38:02',11,2012,'2BR',NULL,NULL),(128,60,'168/Block 4/Floor 2/08','Block 4: Second Floor','30000','0',0,0,'2012-11-28 13:38:31',11,2012,'3BR',NULL,NULL),(129,61,'169/Block 4/Floor 2/09','Block 4: Second Floor','30000','0',0,0,'2012-11-28 13:39:10',11,2012,'3BR',NULL,NULL),(130,62,'170/Block 4/Floor 2/10','Block 4: Second Floor','30000','0',0,0,'2012-11-28 13:41:08',11,2012,'3BR',NULL,NULL),(131,62,'171/Block 4/Floor 2/11','Block 4: Second Floor','30000','0',0,0,'2012-11-28 13:41:35',11,2012,'3BR',NULL,NULL),(132,63,'173/Block 4/Floor 3/02','Block 4: Third Floor','30000','0',0,0,'2012-11-28 13:42:11',11,2012,'3BR',NULL,NULL),(133,63,'174/Block 4/Floor 3/03','Block 4: Third Floor','30000','0',0,0,'2012-11-28 13:42:49',11,2012,'3BR',NULL,NULL),(134,64,'175/Block 4/Floor 3/04','Block 4: Third Floor','30000','0',0,0,'2012-11-28 13:43:23',11,2012,'3BR',NULL,NULL),(135,54,'176/Block 4/Floor 3/05','Block 4: Third Floor','30000','0',0,0,'2012-11-28 13:44:09',11,2012,'2BR',NULL,NULL),(136,54,'177/Block 4/Floor 3/06','Block 4: Third Floor','30000','0',0,0,'2012-11-28 13:44:37',11,2012,'2BR',NULL,NULL),(137,54,'178/Block 4/Floor 3/07','Block 4: Third Floor','30000','0',0,0,'2012-11-28 13:45:10',11,2012,'2BR',NULL,NULL),(138,65,'179/Block 4/Floor 3/08','Block 4: Third Floor','30000','0',0,0,'2012-11-28 13:47:25',11,2012,'3BR',NULL,NULL),(139,59,'180/Block 4/Floor 3/09','Block 4: Third Floor','30000','0',0,0,'2012-11-28 13:47:52',11,2012,'3BR',NULL,NULL),(140,63,'181/Block 4/Floor 3/10','Block 4: Third Floor','30000','0',0,0,'2012-11-28 13:48:20',11,2012,'3BR',NULL,NULL),(141,63,'182/Block 4/Floor 3/11','Block 4: Third Floor','30000','0',0,0,'2012-11-28 13:49:53',11,2012,'3BR',NULL,NULL),(142,66,'183/Block 4/Floor 4/01','Block 4: Fourth Floor','30000','0',0,0,'2012-11-28 13:53:43',11,2012,'3BR',NULL,NULL),(143,63,'184/Block 4/Floor 4/02','Block 4: Fourth Floor','30000','0',0,0,'2012-11-28 13:54:39',11,2012,'3BR',NULL,NULL),(144,63,'185/Block 4/Floor 4/03','Block 4: Fourth Floor','30000','0',0,0,'2012-11-28 13:55:04',11,2012,'3BR',NULL,NULL),(145,63,'186/Block 4/Floor 4/04','Block 4: Fourth Floor','30000','0',0,0,'2012-11-28 13:55:36',11,2012,'3BR',NULL,NULL),(146,54,'187/Block 4/Floor 4/05','Block 4: Fourth Floor','30000','0',0,0,'2012-11-28 14:40:26',11,2012,'2BR',NULL,NULL),(147,54,'188/Block 4/Floor 4/06','Block 4: Fourth Floor','30000','0',0,0,'2012-11-28 14:40:54',11,2012,'2BR',NULL,NULL),(148,54,'189/Block 4/Floor 4/07','Block 4: Fourth Floor','30000','0',0,0,'2012-11-28 14:41:18',11,2012,'2BR',NULL,NULL),(149,63,'190/Block 4/Floor 4/08','Block 4: Fourth Floor','30000','0',0,0,'2012-11-28 14:41:48',11,2012,'3BR',NULL,NULL),(150,63,'191/Block 4/Floor 4/09','Block 4: Fourth Floor','30000','0',0,0,'2012-11-28 14:42:18',11,2012,'3BR',NULL,NULL),(151,63,'192/Block 4/Floor 4/10','Block 4: Fourth Floor','30000','0',0,0,'2012-11-28 14:42:59',11,2012,'3BR',NULL,NULL),(152,123,'193/Block 4/Floor 4/11','Block 4: Fourth Floor','30000','0',0,0,'2012-11-28 14:50:45',11,2012,'3BR',NULL,NULL),(153,54,'199/Block 5/Floor Gr/06','Block 5: Ground Floor','30000','0',0,0,'2012-11-28 14:52:03',11,2012,'2BR',NULL,NULL),(154,54,'200/Block 5/Floor Gr/07','Block 5: Ground Floor','30000','0',0,0,'2012-11-28 14:53:12',11,2012,'3BR',NULL,NULL),(155,67,'210/Block 5/Floor 1/05','Block 5: First Floor','30000','0',0,0,'2012-11-28 14:54:08',11,2012,'3BR',NULL,NULL),(156,68,'218/Block 5/Floor 2/01','Block 5: Second Floor','30000','0',0,0,'2012-11-28 14:55:22',11,2012,'3BR',NULL,NULL),(157,69,'221/Block 5/Floor 2/04','Block 5: Second Floor','30000','0',0,0,'2012-11-28 14:56:29',11,2012,'3BR',NULL,NULL),(158,70,'231/Block 5/Floor 3/02','Block 5: Third Floor','30000','0',0,0,'2012-11-28 14:57:25',11,2012,'3BR',NULL,NULL),(159,70,'232/Block 5/Floor 3/03','Block 5: Third Floor','30000','0',0,0,'2012-11-28 14:59:37',11,2012,'3BR',NULL,NULL),(160,71,'233/Block 5/Floor 3/04','Block 5: Third Floor','30000','0',0,0,'2012-11-28 15:03:24',11,2012,'3BR',NULL,NULL),(161,75,'265/Block 6/Floor Gr/12','Block 6: Ground Floor','30000','0',0,0,'2012-11-28 15:18:33',11,2012,'3BR',NULL,NULL),(162,76,'266/Block 6/Floor 1/01','Block 6: First Floor','30000','0',0,0,'2012-11-28 15:25:55',11,2012,'3BR',NULL,NULL),(163,77,'271/Block 6/Floor 1/06','Block 6: First Floor','30000','0',0,0,'2012-11-28 15:27:09',11,2012,'2BR',NULL,NULL),(164,78,'274/Block 6/Floor 1/09','Block 6: First Floor','30000','0',0,0,'2012-11-28 15:28:18',11,2012,'3BR',NULL,NULL),(165,79,'277/Block 6/Floor 1/12','Block 6: First Floor','30000','0',0,0,'2012-11-28 15:28:47',11,2012,'3BR',NULL,NULL),(166,25,'278/Block 6/Floor 2/01','Block 6: Second Floor','30000','0',0,0,'2012-11-28 15:29:31',11,2012,'3BR',NULL,NULL),(167,80,'279/Block 6/Floor 2/02','Block 6: Second Floor','30000','0',0,0,'2012-11-28 15:30:46',11,2012,'3BR',NULL,NULL),(168,81,'282/Block 6/Floor 2/05','Block 6: Second Floor','30000','0',0,0,'2012-11-28 15:31:27',11,2012,'3BR',NULL,NULL),(169,58,'286/Block 6/Floor 2/09','Block 6: Second Floor','30000','0',0,0,'2012-11-28 15:32:25',11,2012,'3BR',NULL,NULL),(170,82,'287/Block 6/Floor 2/10','Block 6: Second Floor','30000','0',0,0,'2012-11-28 15:33:11',11,2012,'3BR',NULL,NULL),(171,83,'289/Block 6/Floor 2/12','Block 6: Second Floor','30000','0',0,0,'2012-11-28 15:46:30',11,2012,'3BR',NULL,NULL),(172,84,'290/Block 6/Floor 3/01','Block 6: Third Floor','30000','0',0,0,'2012-11-28 15:48:12',11,2012,'3BR',NULL,NULL),(173,85,'291/Block 6/Floor 3/02','Block 6: Third Floor','30000','0',0,0,'2012-11-28 15:50:52',11,2012,'3BR',NULL,NULL),(174,84,'298/Block 6/Floor 3/09','Block 6: Second Floor','30000','0',0,0,'2012-11-28 15:51:48',11,2012,'3BR',NULL,NULL),(175,86,'299/Block 6/Floor 3/10','Block 6: Thrird Floor','30000','0',0,0,'2012-11-28 15:52:20',11,2012,'3BR',NULL,NULL),(176,86,'300/Block 6/Floor 3/11','Block 6: Third Floor','30000','0',0,0,'2012-11-28 15:53:06',11,2012,'3BR',NULL,NULL),(177,87,'301/Block 6/Floor 3/12','Block 6: Third Floor','30000','0',0,0,'2012-11-28 15:53:52',11,2012,'3BR',NULL,NULL),(178,88,'302/Block 6/Floor 4/01','Block 6: Fourth Floor','30000','0',0,0,'2012-11-28 15:54:23',11,2012,'3BR',NULL,NULL),(179,89,'303/Block 6/Floor 4/02','Block 6: Fourth Floor','30000','0',0,0,'2012-11-28 15:55:26',11,2012,'3BR',NULL,NULL),(180,90,'304/Block 6/Floor 4/03','Block 6: Fourth Floor','30000','0',0,0,'2012-11-28 15:55:53',11,2012,'3BR',NULL,NULL),(181,90,'305/Block 6/Floor 4/04','Block 6: Fourth Floor','30000','0',0,0,'2012-11-28 15:56:26',11,2012,'3BR',NULL,NULL),(182,89,'306/Block 6/Floor 4/05','Block 6: Fourth Floor','30000','0',0,0,'2012-11-28 15:57:07',11,2012,'3BR',NULL,NULL),(183,91,'307/Block 6/Floor 4/06','Block 6: Fourth Floor','30000','0',0,0,'2012-11-28 15:58:11',11,2012,'2BR',NULL,NULL),(184,92,'310/Block 6/Floor 4/09','Block 6: Fourth Floor','30000','0',0,0,'2012-11-28 15:58:55',11,2012,'3BR',NULL,NULL),(185,93,'311/Block 6/Floor 4/10','Block 6: Fourth Floor','30000','0',0,0,'2012-11-28 16:00:21',11,2012,'3BR',NULL,NULL),(186,90,'312/Block 6/Floor 4/11','Block 6: Fourth Floor','30000','0',0,0,'2012-11-28 16:01:11',11,2012,'3BR',NULL,NULL),(187,90,'313/Block 6/Floor 4/12','Block 6: Fourth Floor','30000','0',0,0,'2012-11-28 16:01:55',11,2012,'3BR',NULL,NULL),(188,94,'314/Block 7/Floor Gr/01','Block 7: Ground Floor','30000','0',0,0,'2012-11-28 16:02:34',11,2012,'3BR',NULL,NULL),(189,95,'318/Block 7/Floor Gr/05','Block 7: Ground Floor','30000','0',0,0,'2012-11-28 16:03:15',11,2012,'3BR',NULL,NULL),(190,96,'319/Block 7/Floor Gr/06','Block 7: ground Floor','30000','0',0,0,'2012-11-28 16:03:58',11,2012,'3BR',NULL,NULL),(191,97,'324/Block 7/Floor Gr/11','Block 7: Ground Floor','30000','0',0,0,'2012-11-28 16:07:40',11,2012,'3BR',NULL,NULL),(192,97,'325/Block 7/Floor Gr/12','Block 7: Ground Floor','30000','0',0,0,'2012-11-28 16:08:10',11,2012,'3BR',NULL,NULL),(193,97,'326/Block 7/Floor Gr/13','Block 7: Ground Floor','30000','0',0,0,'2012-11-28 16:08:37',11,2012,'3BR',NULL,NULL),(194,98,'327/Block 7/Floor 1/01','Block 7: First Floor','30000','0',0,0,'2012-11-28 16:10:44',11,2012,'3BR',NULL,NULL),(195,97,'328/Block 7/Floor 1/02','Block 7: First Floor','30000','3',0,0,'2012-11-28 16:11:20',11,2012,'3BR',NULL,NULL),(196,99,'329/Block 7/Floor 1/03','Block 7: First Floor','30000','0',0,0,'2012-11-28 16:12:19',11,2012,'3BR',NULL,NULL),(197,15,'330/Block 7/Floor 1/04','Block 7: First Floor','30000','0',0,0,'2012-11-28 16:12:51',11,2012,'3BR',NULL,NULL),(198,75,'331/Block 7/Floor 1/05','Block 7: First Floor','30000','0',0,0,'2012-11-28 16:13:28',11,2012,'3BR',NULL,NULL),(199,100,'332/Block 7/Floor 1/06','Block 7: First Floor','30000','0',0,0,'2012-11-28 16:13:59',11,2012,'3BR',NULL,NULL),(200,101,'336/Block 7/Floor 1/10','Block 7: First Floor','30000','0',0,0,'2012-11-28 16:14:36',11,2012,'3BR',NULL,NULL),(201,97,'337/Block 7/Floor 1/11','Block 7: First Floor','30000','0',0,0,'2012-11-28 16:15:06',11,2012,'3BR',NULL,NULL),(202,102,'338/Block 7/Floor 1/12','Block 7: First Floor','30000','0',0,0,'2012-11-28 16:17:58',11,2012,'3BR',NULL,NULL),(203,97,'339/Block 7/Floor 1/13','Block 7: First Floor','30000','0',0,0,'2012-11-28 16:18:26',11,2012,'3BR',NULL,NULL),(204,103,'340/Block 7/Floor 2/01','Block 7: Second Floor','30000','0',0,0,'2012-11-28 16:19:01',11,2012,'3BR',NULL,NULL),(205,94,'341/Block 7/Floor 2/02','Block 7: Second Floor','30000','0',0,0,'2012-11-28 16:19:29',11,2012,'3BR',NULL,NULL),(206,104,'342/Block 7/Floor 2/03','Block 7: Second Floor','30000','0',0,0,'2012-11-28 16:22:29',11,2012,'3BR',NULL,NULL),(207,105,'343/Block 7/Floor 2/04','Block 7: Second Floor','30000','0',0,0,'2012-11-28 16:23:13',11,2012,'3BR',NULL,NULL),(208,106,'344/Block 7/Floor 2/05','Block 7: Second Floor','30000','0',0,0,'2012-11-28 16:23:46',11,2012,'3BR',NULL,NULL),(209,107,'345/Block 7/Floor 2/06','Block 7: Second Floor','30000','0',0,0,'2012-11-28 16:24:17',11,2012,'3BR',NULL,NULL),(210,108,'351/Block 7/Floor 2/12','Block 7: Second Floor','30000','0',0,0,'2012-11-28 16:25:04',11,2012,'3BR',NULL,NULL),(211,108,'352/Block 7/Floor 2/13','Block 7: Second Floor','30000','0',0,0,'2012-11-28 16:25:38',11,2012,'3BR',NULL,NULL),(212,109,'353/Block 7/Floor 3/01','Block 7: Third Floor','30000','0',0,0,'2012-11-28 16:26:14',11,2012,'3BR',NULL,NULL),(213,109,'354/Block 7/Floor 3/02','Block 7: Third Floor','30000','0',0,0,'2012-11-28 16:26:40',11,2012,'3BR',NULL,NULL),(214,110,'355/Block 7/Floor 3/03','Block 7: Third Floor','30000','0',0,0,'2012-11-28 16:27:13',11,2012,'3BR',NULL,NULL),(215,111,'356/Block 7/Floor 3/04','Block 7: Third Floor','30000','0',1,0,'2012-11-28 16:27:45',11,2012,'3BR',NULL,NULL),(216,111,'357/Block 7/Floor 3/05','Block 7: Third Floor','30000','0',0,0,'2012-11-28 16:29:20',11,2012,'3BR',NULL,NULL),(217,112,'358/Block 7/Floor 3/06','Block 7: Third Floor','30000','0',0,0,'2012-11-28 16:29:48',11,2012,'3BR',NULL,NULL),(218,113,'363/Block 7/Floor 3/11','Block 7: Third Floor','30000','0',0,0,'2012-11-28 16:30:20',11,2012,'3BR',NULL,NULL),(219,97,'364/Block 7/Floor 3/12','Block 7: Third Floor','30000','0',0,0,'2012-11-28 16:31:05',11,2012,'3BR',NULL,NULL),(220,97,'365/Block 7/Floor 3/13','Block 7: Third Floor','30000','0',0,0,'2012-11-28 16:31:34',11,2012,'3BR',NULL,NULL),(221,114,'366/Block 7/Floor 4/01','Block 7: Fourth Floor','30000','0',0,0,'2012-11-28 16:32:11',11,2012,'3BR',NULL,NULL),(222,115,'367/Block 7/Floor 4/02','Block 7: Fourth Floor','30000','0',0,0,'2012-11-28 16:33:00',11,2012,'3BR',NULL,NULL),(223,116,'368/Block 7/Floor 4/03','Block 7: Fourth Floor','30000','0',0,0,'2012-11-28 16:33:48',11,2012,'3BR',NULL,NULL),(224,117,'369/Block 7/Floor 4/04','Block 7: Fourth Floor','30000','0',0,0,'2012-11-28 16:34:36',11,2012,'3BR',NULL,NULL),(225,97,'370/Block 7/Floor 4/05','Block 7: Fourth Floor','30000','0',0,0,'2012-11-28 16:35:28',11,2012,'3BR',NULL,NULL),(226,118,'371/Block 7/Floor 4/06','Block 7: Fourth Floor','30000','0',0,0,'2012-11-28 16:36:25',11,2012,'3BR',NULL,NULL),(227,97,'375/Block 7/Floor 4/10','Block 7: Fourth Floor','30000','0',0,0,'2012-11-28 16:36:59',11,2012,'3BR',NULL,NULL),(228,119,'377/Block 7/Floor 4/12','Block 7: Fourth Floor','30000','0',0,0,'2012-11-28 16:37:37',11,2012,'3BR',NULL,NULL),(229,120,'378/Block 7/Floor 4/13','Block 7: Fourth Floor','30000','0',0,0,'2012-11-28 16:38:59',11,2012,'3BR',NULL,NULL),(230,122,'House No; Two','First Floor','10000','100',1,0,'2012-11-29 15:11:43',11,2012,'1BR',NULL,NULL),(231,124,'House No 1','Ground Floor','17000','0',0,0,'2012-12-31 11:17:51',12,2012,'1BR',1,1),(232,124,'House No 2','Ground Floor','23000','0',0,0,'2012-12-31 11:18:27',12,2012,'2BR',1,1),(233,124,'House No 3','Ground Floor','17000','0',0,0,'2012-12-31 11:19:04',12,2012,'1BR',1,1),(234,124,'House No 4','Ground Floor','23000','0',0,0,'2012-12-31 11:20:02',12,2012,'2BR',1,1),(235,124,'House No 5','First Floor','17000','0',0,0,'2012-12-31 11:21:06',12,2012,'1BR',1,1),(236,124,'House No 6','First Floor','23000','0',0,0,'2012-12-31 11:22:20',12,2012,'2BR',1,1),(237,124,'House No 7','First Floor','17000','0',0,0,'2012-12-31 11:23:27',12,2012,'1BR',1,1),(238,124,'House No 8','First Floor','23000','0',0,0,'2012-12-31 11:23:54',12,2012,'2BR',1,1),(239,127,'Zao','Ground Floor','36000','3600',1,26,'2013-01-26 19:08:36',1,2013,'3BR',35,0),(240,127,'Tumaini','Ground Floor','36000','3600',0,0,'2013-01-26 19:24:33',1,2013,'3BR',35,0),(241,127,'Nuru','Ground Floor','36000','3600',0,0,'2013-01-26 19:26:04',1,2013,'3BR',35,0),(242,127,'Sadaka','Ground Floor','36000','3600',0,0,'2013-01-26 19:27:37',1,2013,'3BR',35,0);
/*!40000 ALTER TABLE `property_item` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `property_item_enquiries`
--

DROP TABLE IF EXISTS `property_item_enquiries`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `property_item_enquiries` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `property_id` int(10) DEFAULT NULL,
  `unit_id` int(10) DEFAULT NULL,
  `name` varchar(50) DEFAULT NULL,
  `phone_number` varchar(50) DEFAULT NULL,
  `email_address` varchar(50) DEFAULT NULL,
  `transactiontime` datetime DEFAULT NULL,
  `comments` longtext,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `property_item_enquiries`
--

LOCK TABLES `property_item_enquiries` WRITE;
/*!40000 ALTER TABLE `property_item_enquiries` DISABLE KEYS */;
/*!40000 ALTER TABLE `property_item_enquiries` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `property_managers`
--

DROP TABLE IF EXISTS `property_managers`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `property_managers` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `manager_code` varchar(100) DEFAULT NULL,
  `company_name` varchar(150) DEFAULT NULL,
  `physical_address` longtext,
  `location` varchar(50) DEFAULT NULL,
  `phone_number` varchar(50) DEFAULT NULL,
  `email_address` varchar(50) DEFAULT NULL,
  `commission` float DEFAULT NULL,
  `manager_month` int(5) DEFAULT NULL,
  `manager_year` int(5) DEFAULT NULL,
  `bank_name` varchar(50) DEFAULT NULL,
  `bank_branch` varchar(50) DEFAULT NULL,
  `account_name` varchar(50) DEFAULT NULL,
  `account_number` varchar(50) DEFAULT NULL,
  `transactiontime` datetime DEFAULT NULL,
  `UID` int(10) DEFAULT NULL,
  `terms` int(10) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=9 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `property_managers`
--

LOCK TABLES `property_managers` WRITE;
/*!40000 ALTER TABLE `property_managers` DISABLE KEYS */;
INSERT INTO `property_managers` VALUES (1,'e-Kodi-PM-0001','Blacksands Logistics Ltd','First Floor\r\nKalair Centre - Nyali\r\nP.O BOX 43062 â€“ 80100\r\nMombasa','Mombasa','+254 700 483375','lawrence@blacksands.biz',10,12,2012,'','','','','2012-12-31 10:45:47',1,NULL),(2,'e-Kodi-PM-0002','Johari Estates Ltd','Thika','Muranga','111111','johariestates@gmail.com',0,12,2012,'','','','','2012-12-31 10:57:30',1,NULL),(3,'e-Kodi-PM-003','GOLDEN DREAMS GROUP OF COMPANIES.',NULL,'Nairobi','0736890830','kibathinduati@yahoo.com',NULL,1,2013,NULL,NULL,NULL,NULL,'2013-01-15 08:34:34',NULL,NULL),(4,'e-Kodi-PM-04','Mikky Co. Ltd',NULL,'Nairobi','','mukokoj@gmail.com',NULL,1,2013,NULL,NULL,NULL,NULL,'2013-01-15 20:52:09',NULL,NULL),(5,'e-Kodi-PM-5','Armtrev Enterprises','','Nairobi','254 722270985','roselynwk@gmail.com',0,1,2013,'','','','','2013-01-16 09:43:14',1,NULL),(6,'e-Kodi-PM-6','Telecomputing',NULL,'Nairobi','0710584935','bkbrainstorm@gmail.com',NULL,1,2013,NULL,NULL,NULL,NULL,'2013-01-16 16:27:47',NULL,NULL),(8,'e-Kodi-PM-7','Clyde Systems Ltd','','Nairobi','+254704469814','akibe@e-kodi.com',0,1,2013,'','','','','2013-01-19 13:43:04',1,1);
/*!40000 ALTER TABLE `property_managers` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `property_owner_remittances`
--

DROP TABLE IF EXISTS `property_owner_remittances`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `property_owner_remittances` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `property_id` int(10) DEFAULT NULL,
  `landlord_name` varchar(250) DEFAULT NULL,
  `amount` float DEFAULT NULL,
  `remmitance_month` int(5) DEFAULT NULL,
  `payment_type` int(5) DEFAULT NULL,
  `remmitance_year` int(5) DEFAULT NULL,
  `manager_id` int(5) DEFAULT NULL,
  `UID` int(5) DEFAULT NULL,
  `trans_id` varchar(100) DEFAULT NULL,
  `transactiontime` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `property_owner_remittances`
--

LOCK TABLES `property_owner_remittances` WRITE;
/*!40000 ALTER TABLE `property_owner_remittances` DISABLE KEYS */;
/*!40000 ALTER TABLE `property_owner_remittances` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `rent_payment`
--

DROP TABLE IF EXISTS `rent_payment`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `rent_payment` (
  `id` int(5) NOT NULL AUTO_INCREMENT,
  `unit_id` int(5) DEFAULT NULL,
  `tenant_id` int(5) DEFAULT NULL,
  `rent_payment` float DEFAULT NULL,
  `actual_rent` float DEFAULT NULL,
  `rent_month` int(5) DEFAULT NULL,
  `rent_year` int(5) DEFAULT NULL,
  `banked` int(5) DEFAULT '0',
  `transactiontime` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `rent_payment`
--

LOCK TABLES `rent_payment` WRITE;
/*!40000 ALTER TABLE `rent_payment` DISABLE KEYS */;
/*!40000 ALTER TABLE `rent_payment` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `repairs_table`
--

DROP TABLE IF EXISTS `repairs_table`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `repairs_table` (
  `id` int(5) NOT NULL AUTO_INCREMENT,
  `property_name` int(5) DEFAULT NULL,
  `property_unit` int(5) DEFAULT NULL,
  `repair_name` varchar(150) DEFAULT NULL,
  `repair_cost` float DEFAULT NULL,
  `justification` longtext,
  `repair_month` int(5) DEFAULT NULL,
  `repair_year` int(5) DEFAULT NULL,
  `UID` int(5) DEFAULT NULL,
  `transactiontime` datetime DEFAULT NULL,
  `payment` int(5) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `repairs_table`
--

LOCK TABLES `repairs_table` WRITE;
/*!40000 ALTER TABLE `repairs_table` DISABLE KEYS */;
INSERT INTO `repairs_table` VALUES (1,5,14,'Glass Door',1500,'Was bought at blah blah coz of blah blah',9,2012,1,'2012-09-19 13:28:56',NULL),(2,5,14,'Leaky faucet',150,'The faucet was leaking and thus bought a new one to replace it.',9,2012,1,'2012-09-20 12:19:33',NULL),(3,5,14,'Missing Shower Head',250,'Stolen and thus had to buy.',9,2012,1,'2012-09-20 12:38:38',NULL),(4,5,14,'Shower Door',500,'Broken in half, had to repair.',11,2012,1,'2012-11-15 12:50:21',NULL);
/*!40000 ALTER TABLE `repairs_table` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `support_logs`
--

DROP TABLE IF EXISTS `support_logs`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `support_logs` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `support_ticket` varchar(50) DEFAULT NULL,
  `company_name` varchar(150) DEFAULT NULL,
  `email_address` varchar(150) DEFAULT NULL,
  `report_type` int(5) DEFAULT NULL,
  `comments` longtext,
  `resolved` int(5) DEFAULT '0',
  `UID` int(10) DEFAULT NULL,
  `how` longtext,
  `transactiontime` datetime DEFAULT NULL,
  `solved_time` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `support_logs`
--

LOCK TABLES `support_logs` WRITE;
/*!40000 ALTER TABLE `support_logs` DISABLE KEYS */;
INSERT INTO `support_logs` VALUES (1,'e-Kodi-Support-','Andrew Kibe','kaguius@gmail.com',1,'vkdcbkj',2,1,'cjns','2013-01-02 12:01:27','2013-01-02 12:03:42');
/*!40000 ALTER TABLE `support_logs` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tax_rate`
--

DROP TABLE IF EXISTS `tax_rate`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `tax_rate` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `Amount` float DEFAULT '0',
  `percent` int(11) DEFAULT '0',
  KEY `Index 1` (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=6 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tax_rate`
--

LOCK TABLES `tax_rate` WRITE;
/*!40000 ALTER TABLE `tax_rate` DISABLE KEYS */;
INSERT INTO `tax_rate` VALUES (1,121968,10),(2,114912,15),(3,114912,20),(4,114912,25),(5,466704,30);
/*!40000 ALTER TABLE `tax_rate` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tenant_checklist`
--

DROP TABLE IF EXISTS `tenant_checklist`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `tenant_checklist` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `property_id` int(10) DEFAULT '0',
  `unit_id` int(10) DEFAULT '0',
  `tenant_id` int(10) DEFAULT '0',
  `construct_id` int(10) DEFAULT '0',
  `status_move_in` varchar(200) DEFAULT NULL,
  `status_move_out` varchar(200) DEFAULT NULL,
  `cost` float DEFAULT '0',
  `comments` varchar(200) DEFAULT NULL,
  `moveout_comments` varchar(200) DEFAULT NULL,
  `manager_id` int(10) DEFAULT '0',
  `UID` int(10) DEFAULT '0',
  `movein_month` int(10) DEFAULT NULL,
  `movein_year` int(10) DEFAULT NULL,
  `moveout_month` int(10) DEFAULT NULL,
  `moveout_year` int(10) DEFAULT NULL,
  `UID2` int(10) DEFAULT NULL,
  `transactiontime` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=59 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tenant_checklist`
--

LOCK TABLES `tenant_checklist` WRITE;
/*!40000 ALTER TABLE `tenant_checklist` DISABLE KEYS */;
INSERT INTO `tenant_checklist` VALUES (1,127,239,26,82,'Good',NULL,0,'',NULL,8,35,1,2013,NULL,NULL,NULL,'2013-01-27 09:21:45'),(2,127,239,26,83,'Good',NULL,0,'',NULL,8,35,1,2013,NULL,NULL,NULL,'2013-01-27 09:21:45'),(3,127,239,26,84,'Good',NULL,0,'',NULL,8,35,1,2013,NULL,NULL,NULL,'2013-01-27 09:21:45'),(4,127,239,26,85,'Good',NULL,0,'',NULL,8,35,1,2013,NULL,NULL,NULL,'2013-01-27 09:21:45'),(5,127,239,26,86,'Good',NULL,0,'',NULL,8,35,1,2013,NULL,NULL,NULL,'2013-01-27 09:21:45'),(6,127,239,26,87,'Good',NULL,0,'',NULL,8,35,1,2013,NULL,NULL,NULL,'2013-01-27 09:21:45'),(7,127,239,26,88,'Good',NULL,0,'',NULL,8,35,1,2013,NULL,NULL,NULL,'2013-01-27 09:21:45'),(8,127,239,26,89,'Good',NULL,0,'',NULL,8,35,1,2013,NULL,NULL,NULL,'2013-01-27 09:21:45'),(9,127,239,26,90,'Good',NULL,0,'',NULL,8,35,1,2013,NULL,NULL,NULL,'2013-01-27 09:21:45'),(10,127,239,26,91,'Good',NULL,0,'',NULL,8,35,1,2013,NULL,NULL,NULL,'2013-01-27 09:21:45'),(11,127,239,26,92,'Good',NULL,0,'',NULL,8,35,1,2013,NULL,NULL,NULL,'2013-01-27 09:21:45'),(12,127,239,26,93,'Good',NULL,0,'',NULL,8,35,1,2013,NULL,NULL,NULL,'2013-01-27 09:21:45'),(13,127,239,26,94,'Good',NULL,0,'',NULL,8,35,1,2013,NULL,NULL,NULL,'2013-01-27 09:21:45'),(14,127,239,26,95,'Good',NULL,0,'',NULL,8,35,1,2013,NULL,NULL,NULL,'2013-01-27 09:21:45'),(15,127,239,26,96,'Good',NULL,0,'',NULL,8,35,1,2013,NULL,NULL,NULL,'2013-01-27 09:21:45'),(16,127,239,26,97,'Good',NULL,0,'',NULL,8,35,1,2013,NULL,NULL,NULL,'2013-01-27 09:21:45'),(17,127,239,26,98,'Good',NULL,0,'',NULL,8,35,1,2013,NULL,NULL,NULL,'2013-01-27 09:21:45'),(18,127,239,26,99,'Good',NULL,0,'',NULL,8,35,1,2013,NULL,NULL,NULL,'2013-01-27 09:21:45'),(19,127,239,26,100,'Good',NULL,0,'',NULL,8,35,1,2013,NULL,NULL,NULL,'2013-01-27 09:21:45'),(20,127,239,26,101,'Good',NULL,0,'',NULL,8,35,1,2013,NULL,NULL,NULL,'2013-01-27 09:21:45'),(21,127,239,26,102,'Good',NULL,0,'',NULL,8,35,1,2013,NULL,NULL,NULL,'2013-01-27 09:21:45'),(22,127,239,26,103,'Good',NULL,0,'',NULL,8,35,1,2013,NULL,NULL,NULL,'2013-01-27 09:21:45'),(23,127,239,26,104,'Good',NULL,0,'',NULL,8,35,1,2013,NULL,NULL,NULL,'2013-01-27 09:21:45'),(24,127,239,26,105,'Good',NULL,0,'',NULL,8,35,1,2013,NULL,NULL,NULL,'2013-01-27 09:21:45'),(25,127,239,26,106,'Good',NULL,0,'',NULL,8,35,1,2013,NULL,NULL,NULL,'2013-01-27 09:21:45'),(26,127,239,26,107,'Good',NULL,0,'',NULL,8,35,1,2013,NULL,NULL,NULL,'2013-01-27 09:21:45'),(27,127,239,26,108,'Good',NULL,0,'',NULL,8,35,1,2013,NULL,NULL,NULL,'2013-01-27 09:21:45'),(28,127,239,26,109,'Good',NULL,0,'',NULL,8,35,1,2013,NULL,NULL,NULL,'2013-01-27 09:21:45'),(29,127,239,26,110,'Good',NULL,0,'',NULL,8,35,1,2013,NULL,NULL,NULL,'2013-01-27 09:21:45'),(30,127,239,26,111,'Good',NULL,0,'',NULL,8,35,1,2013,NULL,NULL,NULL,'2013-01-27 09:21:45'),(31,127,239,26,112,'New',NULL,0,'',NULL,8,35,1,2013,NULL,NULL,NULL,'2013-01-27 09:21:45'),(32,127,239,26,113,'Good',NULL,0,'',NULL,8,35,1,2013,NULL,NULL,NULL,'2013-01-27 09:21:45'),(33,127,239,26,114,'Good',NULL,0,'',NULL,8,35,1,2013,NULL,NULL,NULL,'2013-01-27 09:21:45'),(34,127,239,26,115,'Good',NULL,0,'',NULL,8,35,1,2013,NULL,NULL,NULL,'2013-01-27 09:21:45'),(35,127,239,26,116,'Good',NULL,0,'',NULL,8,35,1,2013,NULL,NULL,NULL,'2013-01-27 09:21:45'),(36,127,239,26,117,'Good',NULL,0,'',NULL,8,35,1,2013,NULL,NULL,NULL,'2013-01-27 09:21:45'),(37,127,239,26,118,'Good',NULL,0,'',NULL,8,35,1,2013,NULL,NULL,NULL,'2013-01-27 09:21:45'),(38,127,239,26,119,'Good',NULL,0,'',NULL,8,35,1,2013,NULL,NULL,NULL,'2013-01-27 09:21:45'),(39,127,239,26,120,'Good',NULL,0,'',NULL,8,35,1,2013,NULL,NULL,NULL,'2013-01-27 09:21:45'),(40,127,239,26,121,'Good',NULL,0,'',NULL,8,35,1,2013,NULL,NULL,NULL,'2013-01-27 09:21:45'),(41,127,239,26,122,'Good',NULL,0,'',NULL,8,35,1,2013,NULL,NULL,NULL,'2013-01-27 09:21:45'),(42,127,239,26,123,'Good',NULL,0,'',NULL,8,35,1,2013,NULL,NULL,NULL,'2013-01-27 09:21:45'),(43,127,239,26,124,'Good',NULL,0,'',NULL,8,35,1,2013,NULL,NULL,NULL,'2013-01-27 09:21:45'),(44,127,239,26,125,'Good',NULL,0,'',NULL,8,35,1,2013,NULL,NULL,NULL,'2013-01-27 09:21:45'),(45,127,239,26,126,'Good',NULL,0,'',NULL,8,35,1,2013,NULL,NULL,NULL,'2013-01-27 09:21:45'),(46,127,239,26,127,'Good',NULL,0,'',NULL,8,35,1,2013,NULL,NULL,NULL,'2013-01-27 09:21:45'),(47,127,239,26,128,'Good',NULL,0,'',NULL,8,35,1,2013,NULL,NULL,NULL,'2013-01-27 09:21:45'),(48,127,239,26,129,'Good',NULL,0,'',NULL,8,35,1,2013,NULL,NULL,NULL,'2013-01-27 09:21:45'),(49,127,239,26,130,'Good',NULL,0,'',NULL,8,35,1,2013,NULL,NULL,NULL,'2013-01-27 09:21:45'),(50,127,239,26,131,'Good',NULL,0,'',NULL,8,35,1,2013,NULL,NULL,NULL,'2013-01-27 09:21:45'),(51,127,239,26,132,'Good',NULL,0,'',NULL,8,35,1,2013,NULL,NULL,NULL,'2013-01-27 09:21:45'),(52,127,239,26,133,'Good',NULL,0,'',NULL,8,35,1,2013,NULL,NULL,NULL,'2013-01-27 09:21:45'),(53,127,239,26,134,'Good',NULL,0,'',NULL,8,35,1,2013,NULL,NULL,NULL,'2013-01-27 09:21:45'),(54,127,239,26,135,'Good',NULL,0,'',NULL,8,35,1,2013,NULL,NULL,NULL,'2013-01-27 09:21:45'),(55,127,239,26,136,'Good',NULL,0,'',NULL,8,35,1,2013,NULL,NULL,NULL,'2013-01-27 09:21:45'),(56,127,239,26,137,'Good',NULL,0,'',NULL,8,35,1,2013,NULL,NULL,NULL,'2013-01-27 09:21:45'),(57,127,239,26,138,'Good',NULL,0,'',NULL,8,35,1,2013,NULL,NULL,NULL,'2013-01-27 09:21:45'),(58,127,239,26,139,'Good',NULL,0,'',NULL,8,35,1,2013,NULL,NULL,NULL,'2013-01-27 09:21:45');
/*!40000 ALTER TABLE `tenant_checklist` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tenant_status`
--

DROP TABLE IF EXISTS `tenant_status`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `tenant_status` (
  `id` int(5) NOT NULL AUTO_INCREMENT,
  `tenant_status` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tenant_status`
--

LOCK TABLES `tenant_status` WRITE;
/*!40000 ALTER TABLE `tenant_status` DISABLE KEYS */;
INSERT INTO `tenant_status` VALUES (1,'In-House'),(2,'Vacated'),(3,'Evicted due to Default'),(4,'New Occupant');
/*!40000 ALTER TABLE `tenant_status` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tenants`
--

DROP TABLE IF EXISTS `tenants`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `tenants` (
  `id` int(5) NOT NULL AUTO_INCREMENT,
  `tenant_code` varchar(50) DEFAULT NULL,
  `property_listing` int(5) DEFAULT NULL,
  `property_block` int(5) DEFAULT NULL,
  `tenant_name` varchar(150) DEFAULT NULL,
  `mailing_address` longtext,
  `phone_number` varchar(100) DEFAULT NULL,
  `email_address` varchar(50) DEFAULT NULL,
  `next_kin` varchar(100) DEFAULT NULL,
  `next_kin_contact` varchar(100) DEFAULT NULL,
  `tenant_status` int(5) DEFAULT NULL,
  `transactiontime` datetime DEFAULT NULL,
  `employment_place` varchar(150) DEFAULT NULL,
  `designation` varchar(100) DEFAULT NULL,
  `work_id` varchar(15) DEFAULT NULL,
  `work_address` longtext,
  `street` varchar(50) DEFAULT NULL,
  `building` varchar(100) DEFAULT NULL,
  `floor` varchar(50) DEFAULT NULL,
  `id_number` varchar(50) DEFAULT NULL,
  `manager_id` int(10) DEFAULT NULL,
  `UID` int(10) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=27 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tenants`
--

LOCK TABLES `tenants` WRITE;
/*!40000 ALTER TABLE `tenants` DISABLE KEYS */;
INSERT INTO `tenants` VALUES (15,'ClydeRMS-569-00015',122,47,'Joseph Kibe','P.O. Box 42008 00100','+254721100342','punchizi@yahoo.com','None','None',2,'2012-11-28 17:08:49',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL),(23,'ClydeRMS-569-00023',122,230,'Andrew Chege Kibe','None','+254721100342','akibe@wenyebiashara.biz','None','None',2,'2012-11-29 16:38:06',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL),(24,'ClydeRMS-569-00024',111,215,'Andrew Chege Kibe','None','+254721100342','akibe@wenyebiashara.biz','None','None',2,'2012-11-29 16:54:18',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL),(25,'ClydeRMS-569-00025',111,215,'Andrew Chege Kibe','None','+254721100342','akibe@wenyebiashara.biz','None','None',2,'2012-11-29 16:55:24',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL),(26,'ClydeRMS-569-00026',127,239,'Gilbert Kemboi','None','+2552222','kabucho@kabucho.com','None','None',1,'2013-01-27 09:07:41','NYBA','','','','','','','2222222',NULL,35);
/*!40000 ALTER TABLE `tenants` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `testimonials`
--

DROP TABLE IF EXISTS `testimonials`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `testimonials` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `comment` longtext,
  `owner` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `testimonials`
--

LOCK TABLES `testimonials` WRITE;
/*!40000 ALTER TABLE `testimonials` DISABLE KEYS */;
INSERT INTO `testimonials` VALUES (1,'Now all of my tenant information is in one place instead of bits and pieces at each office. Thanks e-Kodi team!','Lawrence Kamau (Blacksands Logistics)'),(2,'Moving tenants in at any time is easy, all the prorated charges are automatically calculated for me. No more messing up the math and shortchanging myself.','Fidelis Nganga Mwangi'),(3,'It is kind of intimidating to start using new software. But you made it easy and support was very kind and patient with me. Thanks!',NULL),(4,'I feel so much more in control now. I wish I had found e-Kodi sooner',NULL),(5,'Wow am I glad I found you guys, love the way everything works!',NULL),(6,'Thanks - you guys are amazingly responsive... that is worth it\'s weight in gold.','Agnes Mbuya (Waumini Sacco)'),(7,'The software is so user friendly and easy to use, I love it!',NULL),(8,'You guys rock',NULL),(9,'There is nowhere else I can get all these features for as little in a month... I only have 7 units so this is a great deal!',NULL);
/*!40000 ALTER TABLE `testimonials` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `user_logs`
--

DROP TABLE IF EXISTS `user_logs`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `user_logs` (
  `id` int(5) NOT NULL AUTO_INCREMENT,
  `username` varchar(50) DEFAULT NULL,
  `user_id` int(5) DEFAULT NULL,
  `log_time` datetime DEFAULT NULL,
  `log_ipaddress` varchar(20) DEFAULT NULL,
  `log_browser` varchar(150) DEFAULT NULL,
  `city` varchar(150) DEFAULT NULL,
  `country` varchar(150) DEFAULT NULL,
  `latitude` varchar(150) DEFAULT NULL,
  `longitude` varchar(150) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=136 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `user_logs`
--

LOCK TABLES `user_logs` WRITE;
/*!40000 ALTER TABLE `user_logs` DISABLE KEYS */;
INSERT INTO `user_logs` VALUES (1,'kaguius@gmail.com',1,'2012-07-14 07:44:16','127.0.0.1','Mozilla/5.0 (Windows NT 6.1; WOW64; rv:13.0) Gecko/20100101 Firefox/13.0.1',NULL,NULL,NULL,NULL),(2,'kaguius@gmail.com',1,'2012-07-14 07:44:59','127.0.0.1','Mozilla/5.0 (Windows NT 6.1; WOW64; rv:13.0) Gecko/20100101 Firefox/13.0.1',NULL,NULL,NULL,NULL),(3,'kaguius@gmail.com',1,'2012-07-15 11:33:43','127.0.0.1','Mozilla/5.0 (Windows NT 6.1; WOW64; rv:13.0) Gecko/20100101 Firefox/13.0.1',NULL,NULL,NULL,NULL),(4,'kaguius@gmail.com',1,'2012-07-15 11:51:00','127.0.0.1','Mozilla/5.0 (Windows NT 6.1; WOW64; rv:13.0) Gecko/20100101 Firefox/13.0.1',NULL,NULL,NULL,NULL),(5,'kaguius@gmail.com',1,'2012-07-15 11:56:02','127.0.0.1','Mozilla/5.0 (Windows NT 6.1; WOW64; rv:13.0) Gecko/20100101 Firefox/13.0.1',NULL,NULL,NULL,NULL),(6,'kaguius@gmail.com',1,'2012-07-15 12:01:29','127.0.0.1','Mozilla/5.0 (Windows NT 6.1; WOW64; rv:13.0) Gecko/20100101 Firefox/13.0.1',NULL,NULL,NULL,NULL),(7,'kaguius@gmail.com',1,'2012-07-15 12:13:41','127.0.0.1','Mozilla/5.0 (Windows NT 6.1; WOW64; rv:13.0) Gecko/20100101 Firefox/13.0.1',NULL,NULL,NULL,NULL),(8,'kaguius@gmail.com',1,'2012-07-15 12:13:58','127.0.0.1','Mozilla/5.0 (Windows NT 6.1; WOW64; rv:13.0) Gecko/20100101 Firefox/13.0.1',NULL,NULL,NULL,NULL),(9,'kaguius@gmail.com',1,'2012-07-15 12:14:05','127.0.0.1','Mozilla/5.0 (Windows NT 6.1; WOW64; rv:13.0) Gecko/20100101 Firefox/13.0.1',NULL,NULL,NULL,NULL),(10,'kaguius@gmail.com',1,'2012-07-15 12:14:55','127.0.0.1','Mozilla/5.0 (Windows NT 6.1; WOW64; rv:13.0) Gecko/20100101 Firefox/13.0.1',NULL,NULL,NULL,NULL),(11,'kaguius@gmail.com',1,'2012-07-15 12:15:44','127.0.0.1','Mozilla/5.0 (Windows NT 6.1; WOW64; rv:13.0) Gecko/20100101 Firefox/13.0.1',NULL,NULL,NULL,NULL),(12,'kaguius@gmail.com',1,'2012-07-15 12:16:28','127.0.0.1','Mozilla/5.0 (Windows NT 6.1; WOW64; rv:13.0) Gecko/20100101 Firefox/13.0.1',NULL,NULL,NULL,NULL),(13,'kaguius@gmail.com',1,'2012-07-15 12:17:33','127.0.0.1','Mozilla/5.0 (Windows NT 6.1; WOW64; rv:13.0) Gecko/20100101 Firefox/13.0.1',NULL,NULL,NULL,NULL),(14,'kaguius@gmail.com',1,'2012-07-15 12:18:52','127.0.0.1','Mozilla/5.0 (Windows NT 6.1; WOW64; rv:13.0) Gecko/20100101 Firefox/13.0.1',NULL,NULL,NULL,NULL),(15,'kaguius@gmail.com',1,'2012-07-15 12:22:13','127.0.0.1','Mozilla/5.0 (Windows NT 6.1; WOW64; rv:13.0) Gecko/20100101 Firefox/13.0.1',NULL,NULL,NULL,NULL),(16,'kaguius@gmail.com',1,'2012-07-15 12:25:14','127.0.0.1','Mozilla/5.0 (Windows NT 6.1; WOW64; rv:13.0) Gecko/20100101 Firefox/13.0.1',NULL,NULL,NULL,NULL),(17,'kaguius@gmail.com',1,'2012-07-15 12:25:43','127.0.0.1','Mozilla/5.0 (Windows NT 6.1; WOW64; rv:13.0) Gecko/20100101 Firefox/13.0.1',NULL,NULL,NULL,NULL),(18,'kaguius@gmail.com',1,'2012-07-15 12:27:27','127.0.0.1','Mozilla/5.0 (Windows NT 6.1; WOW64; rv:13.0) Gecko/20100101 Firefox/13.0.1',NULL,NULL,NULL,NULL),(19,'kaguius@gmail.com',1,'2012-07-15 12:29:11','127.0.0.1','Mozilla/5.0 (Windows NT 6.1; WOW64; rv:13.0) Gecko/20100101 Firefox/13.0.1',NULL,NULL,NULL,NULL),(20,'kaguius@gmail.com',1,'2012-07-15 12:31:43','127.0.0.1','Mozilla/5.0 (Windows NT 6.1; WOW64; rv:13.0) Gecko/20100101 Firefox/13.0.1',NULL,NULL,NULL,NULL),(21,'kaguius@gmail.com',1,'2012-07-16 04:58:04','127.0.0.1','Mozilla/5.0 (Windows NT 6.1; WOW64; rv:13.0) Gecko/20100101 Firefox/13.0.1',NULL,NULL,NULL,NULL),(22,'kaguius@gmail.com',1,'2012-07-16 13:23:41','127.0.0.1','Mozilla/5.0 (Windows NT 6.1; WOW64; rv:13.0) Gecko/20100101 Firefox/13.0.1',NULL,NULL,NULL,NULL),(23,'admin@admin.com',2,'2012-07-16 13:32:01','127.0.0.1','Mozilla/5.0 (Windows NT 6.1; WOW64; rv:13.0) Gecko/20100101 Firefox/13.0.1',NULL,NULL,NULL,NULL),(24,'kaguius@gmail.com',1,'2012-07-19 06:26:55','127.0.0.1','Mozilla/5.0 (Windows NT 6.1; WOW64; rv:13.0) Gecko/20100101 Firefox/13.0.1',NULL,NULL,NULL,NULL),(25,'kaguius@gmail.com',1,'2012-07-19 06:36:32','127.0.0.1','Mozilla/5.0 (Windows NT 6.1; WOW64; rv:13.0) Gecko/20100101 Firefox/13.0.1',NULL,NULL,NULL,NULL),(26,'kaguius@gmail.com',1,'2012-07-19 10:23:19','127.0.0.1','Mozilla/5.0 (Windows NT 6.1; WOW64; rv:13.0) Gecko/20100101 Firefox/13.0.1',NULL,NULL,NULL,NULL),(27,'kaguius@gmail.com',1,'2012-07-20 05:30:19','127.0.0.1','Mozilla/5.0 (Windows NT 6.1; WOW64; rv:13.0) Gecko/20100101 Firefox/13.0.1',NULL,NULL,NULL,NULL),(28,'kaguius@gmail.com',1,'2012-07-20 09:55:38','127.0.0.1','Mozilla/5.0 (Windows NT 6.1; WOW64; rv:13.0) Gecko/20100101 Firefox/13.0.1',NULL,NULL,NULL,NULL),(29,'kaguius@gmail.com',1,'2012-07-21 07:00:16','127.0.0.1','Mozilla/5.0 (Windows NT 6.1; WOW64; rv:13.0) Gecko/20100101 Firefox/13.0.1',NULL,NULL,NULL,NULL),(30,'kaguius@gmail.com',1,'2012-07-21 07:10:47','127.0.0.1','Mozilla/5.0 (Windows NT 6.1; WOW64; rv:13.0) Gecko/20100101 Firefox/13.0.1',NULL,NULL,NULL,NULL),(31,'kaguius@gmail.com',1,'2012-07-21 07:22:00','127.0.0.1','Mozilla/5.0 (Windows NT 6.1; WOW64; rv:13.0) Gecko/20100101 Firefox/13.0.1',NULL,NULL,NULL,NULL),(32,'kaguius@gmail.com',1,'2012-07-21 07:22:26','127.0.0.1','Mozilla/5.0 (Windows NT 6.1; WOW64; rv:13.0) Gecko/20100101 Firefox/13.0.1',NULL,NULL,NULL,NULL),(33,'kaguius@gmail.com',1,'2012-07-21 07:22:44','127.0.0.1','Mozilla/5.0 (Windows NT 6.1; WOW64; rv:13.0) Gecko/20100101 Firefox/13.0.1',NULL,NULL,NULL,NULL),(34,'kaguius@gmail.com',1,'2012-07-21 11:00:31','127.0.0.1','Mozilla/5.0 (Windows NT 6.1; WOW64; rv:13.0) Gecko/20100101 Firefox/13.0.1',NULL,NULL,NULL,NULL),(35,'kaguius@gmail.com',1,'2012-08-03 04:30:09','127.0.0.1','Mozilla/5.0 (Windows NT 6.1; WOW64; rv:13.0) Gecko/20100101 Firefox/13.0.1',NULL,NULL,NULL,NULL),(36,'kaguius@gmail.com',1,'2012-08-03 10:45:11','127.0.0.1','Mozilla/5.0 (Windows NT 6.1; WOW64; rv:13.0) Gecko/20100101 Firefox/13.0.1',NULL,NULL,NULL,NULL),(37,'kaguius@gmail.com',1,'2012-09-19 08:32:39','127.0.0.1','Mozilla/5.0 (Windows NT 6.1; WOW64; rv:15.0) Gecko/20100101 Firefox/15.0.1',NULL,NULL,NULL,NULL),(38,'kaguius@gmail.com',1,'2012-09-20 12:18:29','127.0.0.1','Mozilla/5.0 (Windows NT 6.1; WOW64; rv:15.0) Gecko/20100101 Firefox/15.0.1',NULL,NULL,NULL,NULL),(39,'kaguius@gmail.com',1,'2012-11-13 19:31:09','127.0.0.1','Mozilla/5.0 (X11; Ubuntu; Linux i686; rv:16.0) Gecko/20100101 Firefox/16.0',NULL,NULL,NULL,NULL),(40,'kaguius@gmail.com',1,'2012-11-15 10:10:43','127.0.0.1','Mozilla/5.0 (X11; Ubuntu; Linux i686; rv:16.0) Gecko/20100101 Firefox/16.0',NULL,NULL,NULL,NULL),(41,'kaguius@gmail.com',1,'2012-11-15 11:51:00','127.0.0.1','Mozilla/5.0 (X11; Ubuntu; Linux i686; rv:16.0) Gecko/20100101 Firefox/16.0',NULL,NULL,NULL,NULL),(42,'kaguius@gmail.com',1,'2012-11-15 14:12:44','127.0.0.1','Mozilla/5.0 (X11; Ubuntu; Linux i686; rv:16.0) Gecko/20100101 Firefox/16.0',NULL,NULL,NULL,NULL),(43,'kaguius@gmail.com',1,'2012-11-15 14:41:16','127.0.0.1','Mozilla/5.0 (X11; Ubuntu; Linux i686; rv:16.0) Gecko/20100101 Firefox/16.0',NULL,NULL,NULL,NULL),(44,'kaguius@gmail.com',1,'2012-11-15 15:07:48','127.0.0.1','Mozilla/5.0 (X11; Ubuntu; Linux i686; rv:16.0) Gecko/20100101 Firefox/16.0',NULL,NULL,NULL,NULL),(45,'kaguius@gmail.com',1,'2012-11-15 15:43:32','127.0.0.1','Mozilla/5.0 (X11; Ubuntu; Linux i686; rv:16.0) Gecko/20100101 Firefox/16.0',NULL,NULL,NULL,NULL),(46,'kaguius@gmail.com',1,'2012-11-15 15:51:00','127.0.0.1','Mozilla/5.0 (X11; Ubuntu; Linux i686; rv:16.0) Gecko/20100101 Firefox/16.0',NULL,NULL,NULL,NULL),(47,'kaguius@gmail.com',1,'2012-11-17 12:20:03','127.0.0.1','Mozilla/5.0 (X11; Ubuntu; Linux i686; rv:16.0) Gecko/20100101 Firefox/16.0',NULL,NULL,NULL,NULL),(48,'kaguius@gmail.com',1,'2012-11-17 12:24:58','127.0.0.1','Mozilla/5.0 (X11; Ubuntu; Linux i686; rv:16.0) Gecko/20100101 Firefox/16.0',NULL,NULL,NULL,NULL),(49,'kaguius@gmail.com',1,'2012-11-17 12:40:28','127.0.0.1','Mozilla/5.0 (X11; Ubuntu; Linux i686; rv:16.0) Gecko/20100101 Firefox/16.0',NULL,NULL,NULL,NULL),(50,'kaguius@gmail.com',1,'2012-11-17 14:45:13','127.0.0.1','Mozilla/5.0 (X11; Ubuntu; Linux i686; rv:16.0) Gecko/20100101 Firefox/16.0',NULL,NULL,NULL,NULL),(51,'kaguius@gmail.com',1,'2012-11-17 16:35:28','127.0.0.1','Mozilla/5.0 (X11; Ubuntu; Linux i686; rv:16.0) Gecko/20100101 Firefox/16.0',NULL,NULL,NULL,NULL),(52,'kaguius@gmail.com',1,'2012-11-17 17:19:25','127.0.0.1','Mozilla/5.0 (X11; Ubuntu; Linux i686; rv:16.0) Gecko/20100101 Firefox/16.0',NULL,NULL,NULL,NULL),(53,'kaguius@gmail.com',1,'2012-11-17 14:57:57','197.181.5.162','Mozilla/5.0 (X11; Ubuntu; Linux i686; rv:16.0) Gecko/20100101 Firefox/16.0',NULL,NULL,NULL,NULL),(54,'admin@admin.com',2,'2012-11-17 15:10:56','212.49.88.103','Mozilla/5.0 (iPad; CPU OS 5_0 like Mac OS X) AppleWebKit/534.46 (KHTML, like Gecko) Version/5.1 Mobile/9A334 Safari/7534.48.3',NULL,NULL,NULL,NULL),(55,'kaguius@gmail.com',1,'2012-11-17 18:41:22','197.181.5.162','Mozilla/5.0 (X11; Ubuntu; Linux i686; rv:16.0) Gecko/20100101 Firefox/16.0',NULL,NULL,NULL,NULL),(56,'kaguius@gmail.com',1,'2012-11-17 22:02:09','197.178.127.25','Mozilla/5.0 (Android; Mobile; rv:16.0) Gecko/16.0 Firefox/16.0',NULL,NULL,NULL,NULL),(57,'kaguius@gmail.com',1,'2012-11-18 09:53:24','41.80.55.125','Mozilla/5.0 (X11; Ubuntu; Linux i686; rv:16.0) Gecko/20100101 Firefox/16.0',NULL,NULL,NULL,NULL),(58,'kaguius@gmail.com',1,'2012-11-18 10:01:55','41.80.55.125','Mozilla/5.0 (X11; Ubuntu; Linux i686; rv:16.0) Gecko/20100101 Firefox/16.0',NULL,NULL,NULL,NULL),(59,'kaguius@gmail.com',1,'2012-11-18 11:20:25','41.80.55.125','Mozilla/5.0 (X11; Ubuntu; Linux i686; rv:16.0) Gecko/20100101 Firefox/16.0',NULL,NULL,NULL,NULL),(60,'kaguius@gmail.com',1,'2012-11-18 17:51:05','197.179.136.25','Mozilla/5.0 (X11; Ubuntu; Linux i686; rv:16.0) Gecko/20100101 Firefox/16.0',NULL,NULL,NULL,NULL),(61,'admin@admin.com',2,'2012-11-18 22:05:37','197.178.68.149','Mozilla/5.0 (Macintosh; Intel Mac OS X 10.7; rv:16.0) Gecko/20100101 Firefox/16.0',NULL,NULL,NULL,NULL),(62,'admin@admin.com',2,'2012-11-19 07:16:12','41.207.65.137','Mozilla/5.0 (Windows NT 6.0) AppleWebKit/537.11 (KHTML, like Gecko) Chrome/23.0.1271.64 Safari/537.11 AlexaToolbar/alxg-3.1',NULL,NULL,NULL,NULL),(63,'kaguius@gmail.com',1,'2012-11-19 08:02:19','41.78.24.150','Mozilla/5.0 (X11; Ubuntu; Linux i686; rv:16.0) Gecko/20100101 Firefox/16.0',NULL,NULL,NULL,NULL),(64,'admin@admin.com',2,'2012-11-19 08:19:01','62.24.105.114','Mozilla/5.0 (Macintosh; Intel Mac OS X 10.7; rv:16.0) Gecko/20100101 Firefox/16.0',NULL,NULL,NULL,NULL),(65,'kaguius@gmail.com',1,'2012-11-19 13:49:00','41.78.24.150','Mozilla/5.0 (X11; Ubuntu; Linux i686; rv:16.0) Gecko/20100101 Firefox/16.0',NULL,NULL,NULL,NULL),(66,'kaguius@gmail.com',1,'2012-11-19 15:30:35','41.78.24.150','Mozilla/5.0 (X11; Ubuntu; Linux i686; rv:16.0) Gecko/20100101 Firefox/16.0',NULL,NULL,NULL,NULL),(67,'kaguius@gmail.com',1,'2012-11-21 20:35:44','197.179.138.122','Mozilla/5.0 (X11; Ubuntu; Linux i686; rv:16.0) Gecko/20100101 Firefox/16.0',NULL,NULL,NULL,NULL),(68,'admin@admin.com',2,'2012-11-22 15:16:45','212.49.88.107','Opera/9.80 (Windows NT 5.1; U; en) Presto/2.10.289 Version/12.02',NULL,NULL,NULL,NULL),(69,'admin@admin.com',2,'2012-11-22 18:03:57','197.177.21.220','Mozilla/5.0 (Android; Mobile; rv:16.0) Gecko/16.0 Firefox/16.0',NULL,NULL,NULL,NULL),(70,'kaguius@gmail.com',1,'2012-11-23 15:36:13','41.90.142.99','Mozilla/5.0 (X11; Ubuntu; Linux i686; rv:17.0) Gecko/17.0 Firefox/17.0',NULL,NULL,NULL,NULL),(71,'admin@admin.com',2,'2012-11-23 18:39:26','212.49.88.100','Mozilla/5.0 (iPad; CPU OS 5_0 like Mac OS X) AppleWebKit/534.46 (KHTML, like Gecko) Version/5.1 Mobile/9A334 Safari/7534.48.3',NULL,NULL,NULL,NULL),(72,'admin@admin.com',2,'2012-11-23 18:57:38','212.49.88.100','Mozilla/5.0 (iPad; CPU OS 5_0 like Mac OS X) AppleWebKit/534.46 (KHTML, like Gecko) Version/5.1 Mobile/9A334 Safari/7534.48.3',NULL,NULL,NULL,NULL),(73,'admin@admin.com',2,'2012-11-24 18:24:35','212.49.88.102','Mozilla/5.0 (iPad; CPU OS 5_0 like Mac OS X) AppleWebKit/534.46 (KHTML, like Gecko) Version/5.1 Mobile/9A334 Safari/7534.48.3',NULL,NULL,NULL,NULL),(74,'kaguius@gmail.com',1,'2013-01-03 12:49:50','41.81.28.95','Mozilla/5.0 (X11; Linux i686) AppleWebKit/537.11 (KHTML, like Gecko) Chrome/23.0.1271.97 Safari/537.11','','','',''),(75,'kaguius@gmail.com',1,'0000-00-00 00:00:00','197.182.184.165','Mozilla/5.0 (X11; Ubuntu; Linux i686; rv:17.0) Gecko/20100101 Firefox/17.0','','','',''),(76,'kaguius@gmail.com',1,'2013-01-04 08:40:44','197.182.184.165','Mozilla/5.0 (X11; Ubuntu; Linux i686; rv:17.0) Gecko/20100101 Firefox/17.0','','','',''),(77,'kaguius@gmail.com',1,'2013-01-04 09:16:57','197.182.184.165','Mozilla/5.0 (X11; Ubuntu; Linux i686; rv:17.0) Gecko/20100101 Firefox/17.0','','','',''),(78,'kaguius@gmail.com',1,'2013-01-04 12:08:35','197.182.157.96','Mozilla/5.0 (X11; Linux i686) AppleWebKit/537.11 (KHTML, like Gecko) Chrome/23.0.1271.97 Safari/537.11','','','',''),(79,'kaguius@gmail.com',1,'0000-00-00 00:00:00','197.182.157.96','Mozilla/5.0 (Android; Tablet; rv:17.0) Gecko/17.0 Firefox/17.0','','','',''),(80,'kaguius@gmail.com',1,'2013-01-04 16:09:45','197.182.157.96','Mozilla/5.0 (Android; Tablet; rv:17.0) Gecko/17.0 Firefox/17.0','','','',''),(81,'kaguius@gmail.com',1,'2013-01-04 16:42:59','197.179.139.1','Mozilla/5.0 (X11; Linux i686) AppleWebKit/537.11 (KHTML, like Gecko) Chrome/23.0.1271.97 Safari/537.11','','','',''),(82,'stella@blacksands.biz',27,'0000-00-00 00:00:00','197.179.139.1','Mozilla/5.0 (X11; Linux i686) AppleWebKit/537.11 (KHTML, like Gecko) Chrome/23.0.1271.97 Safari/537.11','','','',''),(83,'stella@blacksands.biz',27,'2013-01-04 16:59:57','197.179.139.1','Mozilla/5.0 (X11; Linux i686) AppleWebKit/537.11 (KHTML, like Gecko) Chrome/23.0.1271.97 Safari/537.11','','','',''),(84,'kaguius@gmail.com',1,'2013-01-04 18:18:44','197.182.189.35','Mozilla/5.0 (Android; Tablet; rv:17.0) Gecko/17.0 Firefox/17.0','','','',''),(85,'kaguius@gmail.com',1,'0000-00-00 00:00:00','41.90.154.15','Mozilla/5.0 (X11; Ubuntu; Linux i686; rv:17.0) Gecko/20100101 Firefox/17.0','','','',''),(86,'kaguius@gmail.com',1,'2013-01-05 13:23:09','41.90.154.15','Mozilla/5.0 (X11; Ubuntu; Linux i686; rv:17.0) Gecko/20100101 Firefox/17.0','','','',''),(87,'kaguius@gmail.com',1,'2013-01-06 10:14:13','197.179.230.49','Mozilla/5.0 (X11; Ubuntu; Linux i686; rv:17.0) Gecko/20100101 Firefox/17.0','','','',''),(88,'kaguius@gmail.com',1,'2013-01-07 10:56:47','197.180.198.98','Mozilla/5.0 (Android; Tablet; rv:17.0) Gecko/17.0 Firefox/17.0','','','',''),(89,'kaguius@gmail.com',1,'2013-01-07 11:05:35','197.180.198.98','Mozilla/5.0 (X11; Ubuntu; Linux i686; rv:17.0) Gecko/20100101 Firefox/17.0','','','',''),(90,'mwangiie@gmail.com',26,'0000-00-00 00:00:00','196.202.194.222','Mozilla/5.0 (Windows NT 5.1; rv:12.0) Gecko/20100101 Firefox/12.0','','','',''),(91,'mwangiie@gmail.com',26,'2013-01-07 18:18:41','196.202.194.222','Mozilla/5.0 (Windows NT 5.1; rv:12.0) Gecko/20100101 Firefox/12.0','','','',''),(92,'kaguius@gmail.com',1,'2013-01-07 22:10:09','41.81.187.53','Mozilla/5.0 (Android; Tablet; rv:17.0) Gecko/17.0 Firefox/17.0','','','',''),(93,'kaguius@gmail.com',1,'2013-01-07 22:13:16','41.81.187.53','Mozilla/5.0 (Android; Tablet; rv:17.0) Gecko/17.0 Firefox/17.0','','','',''),(94,'kaguius@gmail.com',1,'2013-01-07 22:20:29','41.81.187.53','Mozilla/5.0 (Android; Tablet; rv:17.0) Gecko/17.0 Firefox/17.0','','','',''),(95,'kaguius@gmail.com',1,'2013-01-10 10:36:23','197.254.43.62','Mozilla/5.0 (X11; Ubuntu; Linux i686; rv:18.0) Gecko/20100101 Firefox/18.0','','','',''),(96,'kaguius@gmail.com',1,'2013-01-15 13:26:51','197.254.43.62','Mozilla/5.0 (Android; Tablet; rv:18.0) Gecko/18.0 Firefox/18.0','','','',''),(97,'kaguius@gmail.com',1,'2013-01-15 13:27:18','197.254.43.62','Mozilla/5.0 (Android; Tablet; rv:18.0) Gecko/18.0 Firefox/18.0','','','',''),(98,'kaguius@gmail.com',1,'2013-01-15 18:38:03','197.178.28.205','Mozilla/5.0 (X11; Linux i686) AppleWebKit/537.17 (KHTML, like Gecko) Chrome/24.0.1312.52 Safari/537.17','','','',''),(99,'kaguius@gmail.com',1,'2013-01-16 12:15:21','197.181.37.226','Mozilla/5.0 (X11; Linux i686) AppleWebKit/537.17 (KHTML, like Gecko) Chrome/24.0.1312.52 Safari/537.17','','','',''),(100,'kaguius@gmail.com',1,'2013-01-16 12:15:25','197.181.37.226','Mozilla/5.0 (X11; Linux i686) AppleWebKit/537.17 (KHTML, like Gecko) Chrome/24.0.1312.52 Safari/537.17','','','',''),(101,'kaguius@gmail.com',1,'2013-01-16 14:13:53','41.81.51.200','Mozilla/5.0 (X11; Ubuntu; Linux i686; rv:18.0) Gecko/20100101 Firefox/18.0','','','',''),(102,'mwangiie@gmail.com',26,'2013-01-16 16:32:31','196.202.194.222','Mozilla/5.0 (Windows NT 5.1; rv:12.0) Gecko/20100101 Firefox/12.0','','','',''),(103,'mwangiie@gmail.com',26,'2013-01-16 16:32:52','196.202.194.222','Mozilla/5.0 (Windows NT 5.1; rv:12.0) Gecko/20100101 Firefox/12.0','','','',''),(104,'mwangiie@gmail.com',26,'2013-01-16 16:43:25','196.202.194.222','Mozilla/5.0 (Windows NT 5.1; rv:12.0) Gecko/20100101 Firefox/12.0','','','',''),(105,'jmwangi@e-kodi.com',32,'2013-01-16 16:47:51','196.202.194.222','Mozilla/5.0 (Windows NT 5.1; rv:12.0) Gecko/20100101 Firefox/12.0','','','',''),(106,'mwangiie@gmail.com',26,'2013-01-16 16:55:27','196.202.194.222','Mozilla/5.0 (Windows NT 5.1; rv:12.0) Gecko/20100101 Firefox/12.0','','','',''),(107,'kaguius@gmail.com',1,'2013-01-19 13:05:31','41.90.213.14','Mozilla/5.0 (X11; Linux i686) AppleWebKit/537.17 (KHTML, like Gecko) Chrome/24.0.1312.52 Safari/537.17','','','',''),(108,'kaguius@gmail.com',1,'2013-01-19 14:11:56','41.90.213.14','Mozilla/5.0 (X11; Linux i686) AppleWebKit/537.17 (KHTML, like Gecko) Chrome/24.0.1312.52 Safari/537.17','','','',''),(109,'kaguius@gmail.com',1,'2013-01-19 16:48:03','197.182.248.239','Mozilla/5.0 (X11; Linux i686) AppleWebKit/537.17 (KHTML, like Gecko) Chrome/24.0.1312.52 Safari/537.17','','','',''),(110,'kaguius@gmail.com',1,'2013-01-19 18:06:02','197.182.248.239','Mozilla/5.0 (Android; Tablet; rv:18.0) Gecko/18.0 Firefox/18.0','','','',''),(111,'kaguius@gmail.com',1,'2013-01-19 18:06:32','197.182.248.239','Mozilla/5.0 (Android; Tablet; rv:18.0) Gecko/18.0 Firefox/18.0','','','',''),(112,'jmwangi@e-kodi.com',32,'2013-01-19 20:29:05','197.178.99.113','Mozilla/5.0 (Windows NT 5.1; rv:17.0) Gecko/20100101 Firefox/17.0','','','',''),(113,'jmwangi@e-kodi.com',32,'2013-01-19 20:29:38','197.178.99.113','Mozilla/5.0 (Windows NT 5.1; rv:17.0) Gecko/20100101 Firefox/17.0','','','',''),(114,'kaguius@gmail.com',1,'2013-01-20 07:27:45','197.176.131.3','Mozilla/5.0 (X11; Linux i686) AppleWebKit/537.17 (KHTML, like Gecko) Chrome/24.0.1312.52 Safari/537.17','','','',''),(115,'jmwangi@e-kodi.com',32,'2013-01-22 05:30:05','41.81.18.31','Mozilla/5.0 (Windows NT 5.1; rv:18.0) Gecko/20100101 Firefox/18.0','','','',''),(116,'jmwangi@e-kodi.com',32,'2013-01-22 05:32:05','41.81.18.31','Mozilla/5.0 (Windows NT 5.1; rv:18.0) Gecko/20100101 Firefox/18.0','','','',''),(117,'kaguius@gmail.com',1,'2013-01-22 09:30:55','197.254.43.62','Mozilla/5.0 (X11; Linux i686) AppleWebKit/537.17 (KHTML, like Gecko) Chrome/24.0.1312.52 Safari/537.17','','','',''),(118,'kaguius@gmail.com',1,'2013-01-22 12:23:39','197.254.43.62','Mozilla/5.0 (X11; Linux i686) AppleWebKit/537.17 (KHTML, like Gecko) Chrome/24.0.1312.52 Safari/537.17','','','',''),(119,'jmwangi@e-kodi.com',32,'2013-01-22 15:44:13','197.220.100.70','Mozilla/5.0 (Windows NT 5.1; rv:18.0) Gecko/20100101 Firefox/18.0','','','',''),(120,'jmwangi@e-kodi.com',32,'2013-01-22 17:35:00','197.220.100.70','Mozilla/5.0 (Windows NT 5.1; rv:18.0) Gecko/20100101 Firefox/18.0','','','',''),(121,'jmwangi@e-kodi.com',32,'2013-01-22 17:49:09','197.220.100.70','Mozilla/5.0 (Windows NT 5.1; rv:18.0) Gecko/20100101 Firefox/18.0','','','',''),(122,'jmwangi@e-kodi.com',32,'2013-01-22 17:50:24','197.220.100.70','Mozilla/5.0 (Windows NT 5.1; rv:18.0) Gecko/20100101 Firefox/18.0','','','',''),(123,'kaguius@gmail.com',1,'2013-01-23 13:35:21','197.254.43.62','Mozilla/5.0 (X11; Linux i686) AppleWebKit/537.17 (KHTML, like Gecko) Chrome/24.0.1312.56 Safari/537.17','','','',''),(124,'kaguius@gmail.com',1,'2013-01-23 13:48:02','197.254.43.62','Mozilla/5.0 (compatible; MSIE 9.0; Windows NT 6.1; WOW64; Trident/5.0)','','','',''),(125,'kaguius@gmail.com',1,'2013-01-24 09:20:06','197.254.43.62','Mozilla/5.0 (X11; Ubuntu; Linux i686; rv:18.0) Gecko/20100101 Firefox/18.0','','','',''),(126,'jmwangi@e-kodi.com',32,'2013-01-24 11:55:29','41.139.173.86','Mozilla/5.0 (Windows NT 6.1; WOW64; rv:18.0) Gecko/20100101 Firefox/18.0','','','',''),(127,'jmwangi@e-kodi.com',32,'2013-01-24 11:55:48','41.139.173.86','Mozilla/5.0 (Windows NT 6.1; WOW64; rv:18.0) Gecko/20100101 Firefox/18.0','','','',''),(128,'kaguius@gmail.com',1,'2013-01-26 18:48:33','197.179.124.56','Mozilla/5.0 (Android; Tablet; rv:18.0) Gecko/18.0 Firefox/18.0','','','',''),(129,'kaguius@gmail.com',1,'2013-01-26 18:49:19','197.179.124.56','Mozilla/5.0 (Android; Tablet; rv:18.0) Gecko/18.0 Firefox/18.0','','','',''),(130,'info@e-kodi.com',35,'2013-01-26 19:20:25','197.179.124.56','Mozilla/5.0 (Android; Tablet; rv:18.0) Gecko/18.0 Firefox/18.0','','','',''),(131,'info@e-kodi.com',35,'2013-01-27 08:41:52','41.90.145.209','Mozilla/5.0 (X11; Linux i686) AppleWebKit/537.17 (KHTML, like Gecko) Chrome/24.0.1312.56 Safari/537.17','','','',''),(132,'jmwangi@e-kodi.com',32,'2013-01-28 08:07:23','197.178.63.206','Mozilla/5.0 (Windows NT 5.1; rv:18.0) Gecko/20100101 Firefox/18.0','','','',''),(133,'kaguius@gmail.com',1,'2013-01-29 14:00:54','197.254.43.62','Mozilla/5.0 (X11; Ubuntu; Linux i686; rv:18.0) Gecko/20100101 Firefox/18.0','','','',''),(134,'jmwangi@e-kodi.com',32,'2013-01-30 15:37:24','196.202.194.222','Mozilla/5.0 (Windows NT 5.1; rv:18.0) Gecko/20100101 Firefox/18.0','','','',''),(135,'kaguius@gmail.com',1,'2013-01-31 10:28:07','197.254.43.62','Mozilla/5.0 (X11; Ubuntu; Linux i686; rv:18.0) Gecko/20100101 Firefox/18.0','','','','');
/*!40000 ALTER TABLE `user_logs` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `user_profiles`
--

DROP TABLE IF EXISTS `user_profiles`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `user_profiles` (
  `id` int(5) NOT NULL AUTO_INCREMENT,
  `first_name` varchar(50) DEFAULT NULL,
  `last_name` varchar(50) DEFAULT NULL,
  `email_address` varchar(50) DEFAULT NULL,
  `password_main` varchar(100) DEFAULT NULL,
  `password_confirm` varchar(100) DEFAULT NULL,
  `phone_number` varchar(50) DEFAULT NULL,
  `admin_status` int(5) NOT NULL DEFAULT '3',
  `transactiontime` datetime DEFAULT NULL,
  `tenant_id` int(5) NOT NULL,
  `user_status` int(5) DEFAULT NULL,
  `manager_id` int(10) DEFAULT NULL,
  `UID` int(10) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=37 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `user_profiles`
--

LOCK TABLES `user_profiles` WRITE;
/*!40000 ALTER TABLE `user_profiles` DISABLE KEYS */;
INSERT INTO `user_profiles` VALUES (1,'Andrew','Kibe','kaguius@gmail.com','3f1f22537f11f5fa990c95fe123a946c','3f1f22537f11f5fa990c95fe123a946c','+254704469814',1,'2012-07-14 07:09:00',3,1,0,1),(24,'Johari','Estates','johariestates@gmail.com','2e4c8970a17635461501d63b697f0f89','2e4c8970a17635461501d63b697f0f89','111111',2,'2012-12-31 11:28:03',0,1,2,1),(25,'Lawrence','Kamau','lawrence@blacksands.biz','7d3196ad738de371f81fc54621f97fc1','7d3196ad738de371f81fc54621f97fc1','0738155170',2,'2012-12-31 11:31:22',0,1,1,1),(27,'Stella','Ouya','stella@blacksands.biz','b98046dfae4e045bb4d2362a7d5d61e6','b98046dfae4e045bb4d2362a7d5d61e6','+254716204990',2,'2013-01-04 16:56:36',0,1,1,1),(28,'JOHN','KIBATHI','kibathinduati@yahoo.com','536305a63a82f5476938e1012404cc6a','536305a63a82f5476938e1012404cc6a','0729780720',2,'2013-01-15 08:34:34',0,0,3,NULL),(29,'joseph','mukoko','mukokoj@gmail.com','536305a63a82f5476938e1012404cc6a','536305a63a82f5476938e1012404cc6a','+254 722 779337',2,'2013-01-15 20:52:09',0,0,4,NULL),(30,'kinuthia','roselyn','roselynwk@gmail.com','3ec8b43214d06a99a0b3481aa2302ba0','3ec8b43214d06a99a0b3481aa2302ba0','245 722270985',2,'2013-01-16 09:43:14',0,0,5,NULL),(31,'Brian','Towett','bkbrainstorm@gmail.com','7336e2489b1089b46ca62d53f132496e','7336e2489b1089b46ca62d53f132496e','0710584935',2,'2013-01-16 16:27:47',0,0,6,NULL),(32,'Jamie','Irungu','jmwangi@e-kodi.com','f962bed5616612c8c7053f6e97e72b12','f962bed5616612c8c7053f6e97e72b12','0722972709',1,'2013-01-16 16:47:21',0,1,0,26),(33,'wd','wd','kembzzz.iyo@gmail.com','3ec8b43214d06a99a0b3481aa2302ba0','3ec8b43214d06a99a0b3481aa2302ba0','556',2,'2013-01-18 06:42:54',0,0,7,NULL),(35,'Test','Account','info@e-kodi.com','0efffc51d5e228e69bec75545457b977','0efffc51d5e228e69bec75545457b977','0722686268',2,'2013-01-26 19:12:47',0,1,8,1),(36,'Gilbert','Kemboi','kabucho@kabucho.com','3ec8b43214d06a99a0b3481aa2302ba0',NULL,'+2552222',3,'2013-01-27 09:07:41',26,1,8,1);
/*!40000 ALTER TABLE `user_profiles` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `users_failed_logs`
--

DROP TABLE IF EXISTS `users_failed_logs`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `users_failed_logs` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `email_address` varchar(70) DEFAULT NULL,
  `password` varchar(30) DEFAULT NULL,
  `ipaddress` varchar(15) DEFAULT NULL,
  `tranasctiontime` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=36 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `users_failed_logs`
--

LOCK TABLES `users_failed_logs` WRITE;
/*!40000 ALTER TABLE `users_failed_logs` DISABLE KEYS */;
INSERT INTO `users_failed_logs` VALUES (1,'kaguius@gmail.com','48Kaguius92%','41.80.9.13',NULL),(2,'kaguius@gmail.com','48Kaguius92%','41.80.9.13',NULL),(3,'email@email.com','johari','62.24.111.243',NULL),(4,'email@email.com','Johari','62.24.111.243',NULL),(5,'email@email.com','johari','62.24.111.243',NULL),(6,'johariestates@gmail.com','johari','41.81.28.95',NULL),(7,'johariestates@gmail.com','johari','41.81.28.95',NULL),(8,'kaguius@gamail.com','48Kaguius92%','197.182.184.165',NULL),(9,'kaguius@gmail.com','kaguius','197.182.184.165',NULL),(10,'kaguius@gmail.com','kaguius','197.182.184.165',NULL),(11,'kaguius@gmail.com','kaguius','197.182.184.165',NULL),(12,'kaguius@gmail.com','kaguius','197.182.184.165',NULL),(13,'agnes2@agnes2.com','agnes','41.90.154.15',NULL),(14,'agnes2@agnes2.com','agnes','41.90.154.15',NULL),(15,'kaguius@gmail.com','kaguius','197.179.230.49',NULL),(16,'jmwangi','4N3mtn%','196.202.194.222',NULL),(17,'jmwangi@e-kodi.com','4N3mtn%','196.202.194.222',NULL),(18,'jmwangi@e-kodi.com','4N3mtn%','196.202.194.222',NULL),(19,'jmwangi@e-kodi.com','4N3mtn%','196.202.194.222',NULL),(20,'jmwangi@e-kodi.com','4N3mtn%','196.202.194.222',NULL),(21,'jmwangi@e-kodi.com','4N3mtn%','196.202.194.222','2013-01-16 16:29:13'),(22,'jmwangi@e-kodi.com','4N3mtn%','196.202.194.222','2013-01-16 16:29:30'),(23,'jmwangi@e-kodi.com','4N3mtn%','196.202.194.222','2013-01-16 16:30:33'),(24,'jmwangi@e-kodi.com','4N3mtn%','196.202.194.222','2013-01-16 16:37:09'),(25,'mwangiie@gmail.com','mwangiie','196.202.194.222','2013-01-16 16:38:12'),(26,'mwangiie@gmail.com','mwangiie','196.202.194.222','2013-01-16 16:43:02'),(27,'mwangiie@gmail.com','mwangiie','196.202.194.222','2013-01-16 16:43:45'),(28,'mwangiie@gmail.com','mwangiie','196.202.194.222','2013-01-16 16:44:14'),(29,'kag','kag','197.254.43.62','2013-01-21 09:38:38'),(30,'kag','kag','197.254.43.62','2013-01-22 09:33:39'),(31,'jmwangi@e-kodi.com','DECEMBER','197.220.100.70','2013-01-22 17:49:45'),(32,'yebne1@gmail.com','giant06','41.220.233.4','2013-01-23 06:51:09'),(33,'kaguius@gmail.com','48Kaguiuys92%','197.254.43.62','2013-01-23 13:47:40'),(34,'jmwangi@ekodi.com','december','41.139.173.86','2013-01-24 11:54:39'),(35,'jmwangi@ekodi.com','december','41.139.173.86','2013-01-24 11:55:08');
/*!40000 ALTER TABLE `users_failed_logs` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `water_meter_details`
--

DROP TABLE IF EXISTS `water_meter_details`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `water_meter_details` (
  `id` int(5) NOT NULL AUTO_INCREMENT,
  `property_name` int(5) DEFAULT NULL,
  `property_unit` int(5) DEFAULT NULL,
  `tenant` int(5) DEFAULT NULL,
  `previous_reading` int(15) DEFAULT NULL,
  `last_reading` int(15) DEFAULT NULL,
  `cost` int(10) DEFAULT NULL,
  `month` int(5) DEFAULT NULL,
  `year` int(5) DEFAULT NULL,
  `transactiontime` datetime DEFAULT NULL,
  `paid` int(11) DEFAULT '0',
  `UID` int(10) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=17 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `water_meter_details`
--

LOCK TABLES `water_meter_details` WRITE;
/*!40000 ALTER TABLE `water_meter_details` DISABLE KEYS */;
INSERT INTO `water_meter_details` VALUES (1,6,18,3,0,10000,100000,10,2012,'2012-11-21 16:30:30',1,NULL),(2,6,18,3,10000,15000,50000,11,2012,'2012-11-21 16:40:08',1,NULL),(3,6,17,2,0,2000,20000,11,2012,'2012-11-21 16:40:22',0,NULL),(4,6,17,2,2000,3000,10000,11,2012,'2012-11-21 16:47:54',NULL,NULL),(5,6,17,2,3000,4000,10000,11,2012,'2012-11-21 16:48:23',NULL,NULL),(6,6,18,3,15000,15100,1000,11,2012,'2012-11-21 16:50:37',NULL,NULL),(7,6,18,3,15100,15150,500,11,2012,'2012-11-21 16:51:59',NULL,NULL),(8,6,17,2,4000,4001,10,11,2012,'2012-11-21 16:52:37',NULL,NULL),(9,6,17,2,4001,4003,20,11,2012,'2012-11-21 16:53:19',NULL,NULL),(10,5,15,1,0,150,0,11,2012,'2012-11-21 17:22:37',NULL,NULL),(11,5,13,4,0,150,7500,11,2012,'2012-11-21 17:29:19',NULL,NULL),(12,6,18,3,15150,15155,50,11,2012,'2012-11-21 17:40:02',NULL,NULL),(13,6,19,5,0,50,500,11,2012,'2012-11-23 15:43:30',NULL,NULL),(14,6,20,6,0,15,150,11,2012,'2012-11-24 21:04:05',0,NULL),(15,12,21,12,0,15,150,11,2012,'2012-11-24 21:16:43',1,NULL),(16,121,46,13,0,15,150,11,2012,'2012-11-25 20:20:11',1,NULL);
/*!40000 ALTER TABLE `water_meter_details` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2013-01-31 10:28:52

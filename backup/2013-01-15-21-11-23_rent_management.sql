-- MySQL dump 10.13  Distrib 5.5.28, for debian-linux-gnu (i686)
--
-- Host: localhost    Database: rent_management
-- ------------------------------------------------------
-- Server version	5.5.28-0ubuntu0.12.04.3

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
) ENGINE=MyISAM AUTO_INCREMENT=6 DEFAULT CHARSET=latin1 COMMENT='latin1_swedish_ci';
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
) ENGINE=MyISAM AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;
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
) ENGINE=MyISAM AUTO_INCREMENT=13 DEFAULT CHARSET=latin1;
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
  `property_id` int(5) DEFAULT NULL,
  `location` int(5) DEFAULT NULL,
  `construct` varchar(150) DEFAULT NULL,
  `manager_id` int(10) DEFAULT NULL,
  `UID` int(10) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=148 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `checklist_const`
--

LOCK TABLES `checklist_const` WRITE;
/*!40000 ALTER TABLE `checklist_const` DISABLE KEYS */;
INSERT INTO `checklist_const` VALUES (119,6,10,'Provision For Fan',3,29),(118,6,10,'AC Point',3,29),(117,6,10,'Switches',3,29),(116,6,10,'Door Fittings',3,29),(115,6,10,'Window',3,29),(114,6,10,'Dressing Table',3,29),(113,6,10,'Floor Tiles',3,29),(112,6,10,'Wardrobes',3,29),(110,6,9,'Switches',3,29),(109,6,9,'Tiles',3,29),(108,6,8,'Vents',3,29),(107,6,8,'Sockets',3,29),(106,6,8,'Drainage ',3,29),(105,6,8,'Tap',3,29),(104,6,8,'Wall Tiles',3,29),(103,6,8,'Floor Tiles',3,29),(102,6,8,'Door To Flash Area',3,29),(101,6,7,'Door',3,29),(100,6,7,'Mainswitch',3,29),(99,6,7,'Kitchen Window',3,29),(98,6,7,'Sink Tap',3,29),(97,6,7,'Sinks ',3,29),(96,6,7,'Cupboards',3,29),(95,6,7,'Wall Tiles',3,29),(94,6,7,'Floor Tiles',3,29),(93,6,7,'Work Top',3,29),(92,6,6,'Ballustrates',3,29),(91,6,6,'Balcony Tiles',3,29),(90,6,6,'Serving Window',3,29),(89,6,6,'Sockets',3,29),(88,6,6,'Sliding Door',3,29),(87,6,4,'Waste Water Drainage',3,29),(86,6,3,'Painting',3,29),(85,6,2,'Plastering',3,29),(84,6,1,'Exterior',3,29),(82,6,6,'Floor Tiles',3,29),(83,6,6,'Wall Tiles',3,29),(120,6,10,'Sockets',3,29),(121,6,11,'Wardrobes',3,29),(122,6,11,'Floor Tiles',3,29),(123,6,11,'Dressing Table',3,29),(124,6,11,'Window',3,29),(125,6,11,'Door Fittings',3,29),(126,6,11,'Switches',3,29),(127,6,11,'Ac Point',3,29),(128,6,11,'Provision For Fan',3,29),(129,6,11,'Sockets',3,29),(130,6,12,'Door',3,29),(131,6,12,'Wall Tiles',3,29),(132,6,12,'Floor Tiles',3,29),(133,6,12,'Gradient',3,29),(134,6,12,'Drainage Point',3,29),(135,6,12,'Window',3,29),(136,6,12,'Shower Unit',3,29),(137,6,12,'Heater Switch',3,29),(138,6,12,'Lighting',3,29),(139,6,12,'Towel Holder',3,29),(140,6,12,'Sink Outside',3,29),(141,6,13,'Door',3,29),(142,6,13,'Floor Tiles',3,29),(143,6,13,'Cistern',3,29),(144,6,13,'Wall Tiles',3,29),(145,6,16,'Door',3,29),(146,6,16,'Wardrobes',3,29),(147,6,5,'Main Door',3,29);
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
  `property_id` int(10) DEFAULT NULL,
  `location` varchar(100) DEFAULT NULL,
  `manager_id` int(10) DEFAULT NULL,
  `UID` int(10) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=17 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `checklist_location`
--

LOCK TABLES `checklist_location` WRITE;
/*!40000 ALTER TABLE `checklist_location` DISABLE KEYS */;
INSERT INTO `checklist_location` VALUES (1,6,'Exterior',3,1),(2,6,'Plastering',3,NULL),(3,6,'Painting',3,NULL),(4,6,'Waste Water Drainage',3,NULL),(5,6,'Main Door',3,NULL),(6,6,'Sitting Room',3,NULL),(7,6,'Kitchen',3,1),(8,6,'Flash Area',3,NULL),(9,6,'Alley Way',3,NULL),(10,6,'Bedroom 1',3,NULL),(11,6,'Bedroom 2',3,NULL),(12,6,'Bathroom',3,NULL),(13,6,'Toilet',3,NULL),(16,6,'Master Bedroom',3,29);
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
) ENGINE=MyISAM AUTO_INCREMENT=26 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `comms_table`
--

LOCK TABLES `comms_table` WRITE;
/*!40000 ALTER TABLE `comms_table` DISABLE KEYS */;
INSERT INTO `comms_table` VALUES (1,26,29,1000,10,2012,2,0,'2012-12-03 18:35:12',NULL,3,NULL),(4,27,30,1500,11,2012,2,0,'2012-12-07 20:44:05',NULL,3,NULL),(3,26,29,1000,11,2012,2,0,'2012-12-07 18:53:48',NULL,3,NULL),(5,26,29,1000,11,2012,2,0,'2012-12-07 21:43:34',NULL,3,NULL),(6,17,2,1000,11,2012,2,0,'2012-12-07 16:13:55',NULL,3,NULL),(7,18,3,1000,11,2012,2,0,'2012-12-07 16:15:08',NULL,3,NULL),(8,18,31,1000,11,2012,2,0,'2012-12-10 20:16:48',1,3,NULL),(9,27,30,1500,11,2012,2,0,'2012-12-15 02:15:28',NULL,3,NULL),(10,18,31,1000,11,2012,2,0,'2012-12-15 03:24:45',30,3,NULL),(11,17,2,0,11,2012,2,0,'2012-12-18 09:44:01',1,3,NULL),(12,17,2,885,11,2012,2,0,'2012-12-28 19:59:39',29,3,NULL),(13,18,3,1000,11,2012,2,0,'2012-12-28 19:59:59',29,3,NULL),(14,18,31,1000,11,2012,2,0,'2012-12-28 19:59:59',29,3,NULL),(15,17,2,-35,11,2012,2,0,'2012-12-28 20:01:25',29,3,NULL),(16,26,29,950,11,2012,2,0,'2012-12-28 20:05:56',29,3,NULL),(17,26,29,55,11,2012,2,0,'2012-12-28 20:11:01',29,3,NULL),(18,27,30,1660,11,2012,2,0,'2012-12-28 20:22:27',29,3,23),(19,26,29,1000,11,2012,2,0,'2012-12-28 20:30:08',29,3,24),(20,27,30,1500,11,2012,2,0,'2012-12-28 20:30:08',29,3,25),(21,26,29,1210,11,2012,2,0,'2012-12-28 20:33:48',29,3,26),(22,27,30,1820,11,2012,2,0,'2012-12-28 20:33:48',29,3,27),(23,26,29,1000,12,2012,2,0,'2012-12-28 20:36:14',29,3,28),(24,27,30,1500,12,2012,2,0,'2012-12-28 20:36:14',29,3,29),(25,18,31,1100,12,2012,2,0,'2012-12-28 20:47:02',29,3,30);
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
) ENGINE=MyISAM AUTO_INCREMENT=25 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `expense_items`
--

LOCK TABLES `expense_items` WRITE;
/*!40000 ALTER TABLE `expense_items` DISABLE KEYS */;
INSERT INTO `expense_items` VALUES (4,5,'Electricity',1200,1,'2012-07-20 06:19:03',NULL),(5,5,'Water',2000,1,'2012-07-20 06:19:19',NULL),(6,5,'Garbage',500,1,'2012-07-20 06:19:29',NULL),(7,5,'Rodentkil',464,1,'2012-07-20 06:19:48',NULL),(8,5,'Security',15000,1,'2012-07-20 06:20:02',NULL),(9,5,'Caretaker',6000,1,'2012-07-20 06:20:15',NULL),(10,6,'Gardener',5000,1,'2012-08-03 10:56:57',NULL),(11,6,'Utility',4000,1,'2012-08-03 10:57:13',NULL),(12,6,'Security',8000,1,'2012-08-03 10:57:29',NULL),(13,6,'Food for Caretaker',200,1,'2012-12-02 20:55:19',NULL),(14,6,'Food',300,1,'2012-12-02 20:59:15',NULL),(15,6,'Food',300,1,'2012-12-02 21:00:17',NULL),(16,7,'Security',500,1,'2012-12-07 22:58:43',NULL),(17,7,'Garden',1000,1,'2012-12-07 22:59:01',NULL),(18,8,'Garden',600,1,'2012-12-07 23:00:13',NULL),(19,8,'Security',1000,1,'2012-12-07 23:00:29',NULL),(20,6,'Cleaning',4000,29,'2012-12-15 13:05:06',29),(24,6,'Lawn Faucet',1500,29,'2012-12-30 01:07:08',29);
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
) ENGINE=MyISAM AUTO_INCREMENT=10 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `expense_payment`
--

LOCK TABLES `expense_payment` WRITE;
/*!40000 ALTER TABLE `expense_payment` DISABLE KEYS */;
INSERT INTO `expense_payment` VALUES (1,8,18,600,12,2012,'2012-12-07 23:00:45',NULL),(2,8,19,800,12,2012,'2012-12-07 23:00:45',NULL),(3,7,16,500,12,2012,'2012-12-07 23:01:28',NULL),(4,7,17,1000,12,2012,'2012-12-07 23:01:28',NULL),(5,6,10,5000,12,2012,'2012-12-10 20:35:55',1),(6,6,11,400,12,2012,'2012-12-10 20:35:55',1),(7,6,12,3000,12,2012,'2012-12-10 20:35:55',1),(8,6,20,3000,12,2012,'2012-12-15 13:05:36',29),(9,6,24,1500,12,2012,'2012-12-30 01:07:08',29);
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
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `fin_asset_register`
--

LOCK TABLES `fin_asset_register` WRITE;
/*!40000 ALTER TABLE `fin_asset_register` DISABLE KEYS */;
INSERT INTO `fin_asset_register` VALUES (1,'e-Kodi-ASSET-0001','Intel Core 2 Duo','Dell','Vostro 220s','gihukjh-5555',45000,2008,'Main Office',29,3);
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
) ENGINE=MyISAM AUTO_INCREMENT=7 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `fin_expense_payment`
--

LOCK TABLES `fin_expense_payment` WRITE;
/*!40000 ALTER TABLE `fin_expense_payment` DISABLE KEYS */;
INSERT INTO `fin_expense_payment` VALUES (1,1,3,3,'Book First',150,'Cash','VN002',14,12,2012,29,0,'2012-12-14 17:53:55'),(2,3,3,3,'Nairobi Water',350,'Cheque','001245',14,12,2012,29,0,'2012-12-14 17:56:38'),(4,12,3,3,'Black Sands Logistics Ltd',2000,'Cheque','000123',14,12,2012,29,0,'2012-12-14 22:28:30'),(5,12,3,3,'Black Sands Logistics Ltd',2300,'Cheque','000128',15,12,2012,29,0,'2012-12-15 00:50:53'),(6,8,2,3,'Tech Today',1500,'Cheque','000145',15,12,2012,29,0,'2012-12-15 02:50:28');
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
) ENGINE=MyISAM AUTO_INCREMENT=16 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `fin_expenses_items`
--

LOCK TABLES `fin_expenses_items` WRITE;
/*!40000 ALTER TABLE `fin_expenses_items` DISABLE KEYS */;
INSERT INTO `fin_expenses_items` VALUES (1,3,'Stationery','ek-0052',3,1,'2012-12-13 17:35:33'),(3,3,'Water','ek-3-',3,32,'2012-12-14 12:09:08'),(4,3,'Security','ek-3-3',3,32,'2012-12-14 12:10:27'),(5,3,'Insurance','ek-3-4',3,32,'2012-12-14 12:41:51'),(7,3,'Supplies','ek-3-5',3,29,'2012-12-14 12:48:55'),(8,2,'Technology Licences','ek-3-7',3,29,'2012-12-14 12:57:35'),(9,3,'Meals & Entertainment','ek-3-8',3,29,'2012-12-14 13:01:26'),(10,3,'Rent','e-Kodi-10',3,29,'2012-12-14 13:21:10'),(12,3,'Petty Cash','e-Kodi-11',3,29,'2012-12-14 21:57:20'),(13,3,'Telephone','e-Kodi-13',3,29,'2012-12-14 21:59:58'),(14,3,'Rent','e-Kodi-14',0,1,'2012-12-18 18:58:18'),(15,1,'Wages','e-Kodi-15',0,1,'2013-01-06 10:18:08');
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
) ENGINE=MyISAM AUTO_INCREMENT=14 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `fin_petty_cash_payment`
--

LOCK TABLES `fin_petty_cash_payment` WRITE;
/*!40000 ALTER TABLE `fin_petty_cash_payment` DISABLE KEYS */;
INSERT INTO `fin_petty_cash_payment` VALUES (9,'Accounts Book',300,'Cash','VN003',3,15,12,2012,29,'2012-12-15 00:20:20'),(10,'Stamps',200,'Cash','VN004',3,15,12,2012,29,'2012-12-15 00:44:32'),(8,'Stamps',150,'Cash','VN002',3,15,12,2012,29,'2012-12-15 00:20:20'),(11,'Matches',50,'Cash','VN005',3,15,12,2012,29,'2012-12-15 00:44:32'),(12,'Butter',150,'Cash','VN006',3,15,12,2012,29,'2012-12-15 00:44:32'),(13,'Batteries',1200,'Cash','VN004',3,15,12,2012,29,'2012-12-15 00:49:59');
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
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `fin_petty_cash_reduce`
--

LOCK TABLES `fin_petty_cash_reduce` WRITE;
/*!40000 ALTER TABLE `fin_petty_cash_reduce` DISABLE KEYS */;
INSERT INTO `fin_petty_cash_reduce` VALUES (1,2250,3);
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
) ENGINE=MyISAM AUTO_INCREMENT=3 DEFAULT CHARSET=latin1 ROW_FORMAT=DYNAMIC;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `managers`
--

LOCK TABLES `managers` WRITE;
/*!40000 ALTER TABLE `managers` DISABLE KEYS */;
INSERT INTO `managers` VALUES (1,'0722972709','Andrew Chege Kibe','kaguius@gmail.com','I am a tenant and am interested in using e-Kodi. However, my manager isn\'t currently setup with you guys. Here are the contact details...\r\n\r\nMy Rental Address: Tumaini gardens\r\nManager Name: Kinyanjui\r\nManager Email: None\r\nManager Phone: 0704469814\r\n','2013-01-12 15:00:00'),(2,'0722972709','Andrew Chege Kibe','kaguius@gmail.com','I am a tenant and am interested in using e-Kodi.  However, my manager isn\'t currently setup with you guys.  Here are the contact details...\r\n\r\nMy Rental Address: Tumaini gardens\r\nManager Name: Kinyanjui\r\nManager Email: None\r\nManager Phone: 0704469814\r\n','2013-01-12 15:02:09');
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
) ENGINE=MyISAM AUTO_INCREMENT=11 DEFAULT CHARSET=latin1;
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
) ENGINE=MyISAM AUTO_INCREMENT=9 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `payment_type`
--

LOCK TABLES `payment_type` WRITE;
/*!40000 ALTER TABLE `payment_type` DISABLE KEYS */;
INSERT INTO `payment_type` VALUES (1,'Cash'),(2,'Kenswitch'),(3,'MPESA'),(4,'ZAP'),(5,'Yu Cash'),(6,'VISA'),(7,'Master Card'),(8,'Cheque');
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
  `payment` float DEFAULT '0',
  `service_charge` float DEFAULT '0',
  `actual_penalties` float DEFAULT '0',
  `water_pay` float DEFAULT '0',
  `rent_month` int(5) DEFAULT NULL,
  `rent_year` int(5) DEFAULT NULL,
  `banked` int(5) DEFAULT '0',
  `category` int(5) DEFAULT '0',
  `payment_type` int(5) DEFAULT NULL,
  `transactiontime` datetime DEFAULT NULL,
  `manager_id` int(10) DEFAULT NULL,
  `UID` int(10) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=32 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `payments`
--

LOCK TABLES `payments` WRITE;
/*!40000 ALTER TABLE `payments` DISABLE KEYS */;
INSERT INTO `payments` VALUES (1,26,29,10000,0,0,0,9,2012,0,1,1,'2012-12-03 18:35:12',3,1),(2,26,29,10000,500,0,0,9,2012,0,2,1,'2012-12-03 18:35:12',3,1),(4,26,29,10000,500,1050,0,10,2012,0,2,1,'2012-12-07 18:53:48',3,1),(5,27,30,15000,0,0,0,10,2012,0,1,1,'2012-12-07 20:44:05',3,1),(6,27,30,15000,1000,0,0,10,2012,0,2,1,'2012-12-07 20:44:05',3,1),(7,26,29,10000,500,1050,400,11,2012,0,2,2,'2012-12-07 21:43:34',3,1),(8,17,2,10000,0,0,0,11,2012,0,2,1,'2012-12-07 16:13:55',3,1),(9,18,3,10000,0,0,0,11,2012,0,2,1,'2012-12-07 16:15:08',3,1),(10,18,31,20000,0,0,0,10,2012,0,1,1,'2012-12-10 20:16:48',3,1),(11,18,31,10000,0,0,0,10,2012,0,2,1,'2012-12-10 20:16:48',3,1),(12,27,30,15000,1000,1600,0,11,2012,0,2,1,'2012-12-15 02:15:28',3,1),(13,18,31,10000,0,1000,0,8,2012,0,2,6,'2012-12-15 03:16:10',NULL,NULL),(14,18,31,10000,0,1000,0,9,2012,0,2,6,'2012-12-15 03:17:28',NULL,30),(15,18,31,10000,0,1000,0,11,2012,0,2,6,'2012-12-15 03:24:45',3,30),(16,17,2,0,1500,0,0,11,2012,0,2,1,'2012-12-18 10:54:50',3,2012),(17,17,2,8850,1500,1150,0,11,2012,0,2,1,'0000-00-00 00:00:00',3,2012),(18,18,3,10000,0,1000,0,11,2012,0,2,1,'0000-00-00 00:00:00',3,2012),(19,18,31,10000,0,1000,0,11,2012,0,2,1,'0000-00-00 00:00:00',3,2012),(20,17,2,-350,1500,0,0,11,2012,0,2,1,'0000-00-00 00:00:00',3,2012),(21,26,29,9500,500,1050,0,11,2012,0,2,1,'0000-00-00 00:00:00',3,2012),(22,26,29,550,500,0,0,11,2012,0,2,1,'0000-00-00 00:00:00',3,2012),(23,27,30,16600,1000,1600,0,11,2012,0,2,1,'0000-00-00 00:00:00',3,2012),(24,26,29,10000,500,1050,0,11,2012,0,2,1,'0000-00-00 00:00:00',3,2012),(25,27,30,15000,1000,1600,0,11,2012,0,2,1,'0000-00-00 00:00:00',3,2012),(26,26,29,12100,500,1050,0,11,2012,0,2,1,'0000-00-00 00:00:00',3,2012),(27,27,30,18200,1000,1600,0,11,2012,0,2,1,'0000-00-00 00:00:00',3,2012),(28,26,29,10000,500,1050,0,12,2012,0,2,1,'0000-00-00 00:00:00',3,2012),(29,27,30,15000,1000,1600,0,12,2012,0,2,1,'0000-00-00 00:00:00',3,2012),(30,18,31,10000,0,1000,0,12,2012,0,2,1,'0000-00-00 00:00:00',3,2012),(31,17,2,10000,0,0,0,11,2012,0,1,1,'2012-12-15 16:15:14',3,29);
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
  `water_cost` int(5) DEFAULT NULL,
  `taxes` varchar(5) DEFAULT 'No',
  `lr_number` varchar(40) DEFAULT NULL,
  `construction_year` varchar(5) DEFAULT NULL,
  `property_type` varchar(15) DEFAULT NULL,
  `manager_id` int(10) DEFAULT NULL,
  `UID` int(10) DEFAULT NULL,
  `owner_id` int(5) DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=17 DEFAULT CHARSET=latin1 COMMENT='latin1_swedish_ci';
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `property_details`
--

LOCK TABLES `property_details` WRITE;
/*!40000 ALTER TABLE `property_details` DISABLE KEYS */;
INSERT INTO `property_details` VALUES (5,'White House','Tena Estate','Nairobi','Ms Holdings Ltd','0726158156',1,'Barclays Bank','Gikomba','MS Holdings Ltd','458711112','ClydeRMS-778-5',8,5,10,'2012-07-20 06:17:13',7,2012,'',50,'No','Land Ref #','1984','Residential',0,NULL,0),(6,'Phase 13 236','The Development   Overview This magnificent new development is situated on the Thika Garissa Road, a few minutes drive from the Thika CBD, and within easy reach of Nairobi and its environs. Set on 5 acres of prime land, Kivulini Thika is set to become one of the most prestigious ','Muranga','Kayas Kenya Ltd','0720170084',2,'Equity Bank','Harambee Avenue','Kayas Kenya Ltd','0011120004652','ClydeRMS-778-6',10,10,10,'2012-08-03 10:48:34',8,2012,'kaguius@gmail.com',120,'Yes','Land Ref #','1984','Commercial',3,29,0),(7,'Zawadi Apartments','Zawadi apartments are located in the Northern Coast of Mombasa','Mombasa','Yusuf Kikabhai','1111111',1,'','','','','ClydeRMS-778-7',10,5,10,'2012-11-17 17:29:04',11,2012,'',10,'Yes','','','Residential',3,NULL,0),(8,'Zawadi Apartments','Zawadi apartments are located in the Northern Coast of Mombasa','Mombasa','Feisal Sherman','1111111',1,'','','','','ClydeRMS-778-8',10,5,10,'2012-11-17 17:37:10',11,2012,'gmail@gmail.com',8,'Yes','Land Ref #','1982','Residential',3,NULL,38),(9,'ZA: Nurbhai Dossajjee','Zawadi apartments are located in the Northern Coast of Mombasa','Mombasa','Nurbhai Dossajjee','1111111',1,'','','','','ClydeRMS-778-9',10,5,10,'2012-11-17 17:40:15',11,2012,'gmail@gmail.com',NULL,'No',NULL,NULL,NULL,NULL,NULL,38),(10,'White','Tena Estate','Nairobi','Ms Holdings Ltd','1111111',1,'Barclays Bank','Gikomba','','458711112','ClydeRMS-778-10',8,5,10,'2012-11-17 18:43:27',11,2012,'kaguius@gmail.com',10,'Yes','','','Residential',3,NULL,38),(11,'ZA: Edward Masika','','Mombasa','Edward Masika','1111111',1,'','','','','ClydeRMS-778-11',10,5,10,'2012-11-17 22:05:25',11,2012,'',NULL,'No',NULL,NULL,NULL,NULL,NULL,38),(12,'ZA: Abid Dungawalla','','Mombasa','Abid Dungawalla','1111111',1,'','','','','ClydeRMS-778-12',10,5,10,'2012-11-17 22:07:53',11,2012,'',10,'No',NULL,NULL,NULL,3,NULL,38),(16,'Tumaini Gardens',NULL,'Kiambu','Zara Kimani','+254725790499',NULL,'','','','','e-Kodi-13',NULL,NULL,NULL,'2012-12-26 12:36:39',12,2012,'agnes@agnes.com',NULL,'No','','','Residential',4,NULL,38);
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
  `location` varchar(15) DEFAULT NULL,
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
  `list` int(5) DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=32 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `property_item`
--

LOCK TABLES `property_item` WRITE;
/*!40000 ALTER TABLE `property_item` DISABLE KEYS */;
INSERT INTO `property_item` VALUES (13,5,'SQ 1','Ground Floor','5000','500',1,0,'2012-07-20 06:20:54',7,2012,'Bed Sitter',NULL,0),(14,5,'SQ 2','Ground Floor','6000','600',1,0,'2012-07-20 06:21:14',7,2012,'Bed Sitter',NULL,0),(15,5,'House No: 3','First Floor','15000','1500',1,1,'2012-07-20 06:23:11',7,2012,'2BR',NULL,0),(16,5,'House No: 4','First Floor','15000','1500',1,0,'2012-07-20 06:23:27',7,2012,'2BR',NULL,0),(17,6,'House No. 01','Ground Floor','10000','1500',1,0,'2012-08-03 10:50:13',8,2012,'Bed Sitter',1,1),(18,6,'House No. 02','Ground Floor','10000','0',1,31,'2012-08-03 10:52:57',8,2012,'2BR',1,0),(19,6,'Second Floor: R','2nd Floor','10000','1000',1,0,'2012-11-15 15:10:09',11,2012,'2BR',NULL,0),(20,6,'Name','First Floor','15000','100',1,0,'2012-11-18 17:25:04',11,2012,'3BR',NULL,0),(21,12,'No 1','Ground Floor','15000','500',1,0,'2012-11-24 20:56:25',11,2012,'2BR',NULL,0),(22,10,'Unit Name','First Floor','30000','0',1,0,'2012-11-28 09:09:30',11,2012,'2BR',NULL,0),(23,10,'Unit Name 2','First Floor','30000','0',1,0,'2012-11-28 09:11:02',11,2012,'3BR',NULL,0),(24,10,'Unit Name 2','f','30000','0',1,0,'2012-11-28 09:11:52',11,2012,'Holiday Home',NULL,0),(25,6,'Loc','1st','10000','1000',1,0,'2012-12-02 10:52:36',12,2012,'Bed Sitter',NULL,0),(26,8,'Zao','Ground Floor','10000','500',1,29,'2012-12-03 18:22:25',12,2012,'1BR',NULL,0),(27,8,'Tumaini','Ground Floor','15000','1000',1,30,'2012-12-07 20:43:04',12,2012,'1BR',NULL,0),(28,8,'Zao','1st Floor','15000','0',0,0,'2012-12-14 08:57:06',12,2012,'2BR',1,1),(29,12,'Zao','1st Floor','15000','0',0,0,'2012-12-14 08:57:58',12,2012,'2BR',1,1),(30,6,'Tumaini','Ground Floor','35000','3600',0,0,'2012-12-15 12:46:53',12,2012,'3BR',29,1),(31,6,'Name','Name','5000','0',0,0,'2012-12-27 16:42:59',12,2012,'Bed Sitter',29,1);
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
) ENGINE=MyISAM AUTO_INCREMENT=8 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `property_item_enquiries`
--

LOCK TABLES `property_item_enquiries` WRITE;
/*!40000 ALTER TABLE `property_item_enquiries` DISABLE KEYS */;
INSERT INTO `property_item_enquiries` VALUES (1,6,17,'Rajab Kabucho','+254704469814','kabucho@kabucho.com','2012-12-10 15:24:49',NULL),(2,6,18,'Agnes','+2552222','agnes@agnes.com','2012-12-10 15:26:02',NULL),(3,6,18,'Name','+254704469814','jscnjkl','2012-12-10 15:27:30',NULL),(4,0,17,'Andrew Kibe','+254704469814','kaguius@gmail.com','2012-12-11 14:03:40','None'),(5,6,17,'Andrew Kibe','+254704469814','kaguius@gmail.com','2012-12-11 14:04:40','None'),(6,6,17,'Andrew Kibe','+254704469814','kaguius@gmail.com','2012-12-11 14:08:21','None'),(7,6,17,'Andrew Kibe','+254721100342','kaguius@gmail.com','2012-12-11 14:29:39','None');
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
INSERT INTO `property_managers` VALUES (1,'e-Kodi-PM-0001','Name','None','Nairobi','+254721100342','kaguius@gmail.com',20,12,2012,'','','','','2012-12-06 21:27:16',NULL,NULL),(2,'e-Kodi-PM-0002','Name','None','Nairobi','+254721100342','kaguius@gmail.com',30,12,2012,'','','','','2012-12-06 21:32:30',NULL,NULL),(3,'e-Kodi-PM-003','Blacksands Logistics Ltd','Mombasa','Mombasa','+254721100342','andrew.kibe@blacksands.biz',20,12,2012,'','','','','2012-12-07 13:35:13',NULL,NULL),(8,'e-Kodi-PM-04','Clyde Systems Ltd',NULL,'Nairobi','+254721100342','akibe@wenyebiashara.biz',NULL,12,2012,'','','','','2012-12-26 12:35:56',NULL,1);
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
) ENGINE=MyISAM AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `property_owner_remittances`
--

LOCK TABLES `property_owner_remittances` WRITE;
/*!40000 ALTER TABLE `property_owner_remittances` DISABLE KEYS */;
INSERT INTO `property_owner_remittances` VALUES (1,6,'Kayas Kenya Ltd',19500,12,NULL,2012,3,29,'Cheque No 000122','2012-12-15 04:09:41'),(2,6,'Kayas Kenya Ltd',19500,12,8,2012,3,29,'Cheque No 000122','2012-12-15 04:11:44');
/*!40000 ALTER TABLE `property_owner_remittances` ENABLE KEYS */;
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
  `payment` int(5) DEFAULT NULL,
  `repair_month` int(5) DEFAULT NULL,
  `repair_year` int(5) DEFAULT NULL,
  `UID` int(5) DEFAULT NULL,
  `transactiontime` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=8 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `repairs_table`
--

LOCK TABLES `repairs_table` WRITE;
/*!40000 ALTER TABLE `repairs_table` DISABLE KEYS */;
INSERT INTO `repairs_table` VALUES (1,5,14,'Glass Door',1500,'Was bought at blah blah coz of blah blah',NULL,9,2012,1,'2012-09-19 13:28:56'),(2,5,14,'Leaky faucet',150,'The faucet was leaking and thus bought a new one to replace it.',NULL,9,2012,1,'2012-09-20 12:19:33'),(3,5,14,'Missing Shower Head',250,'Stolen and thus had to buy.',NULL,9,2012,1,'2012-09-20 12:38:38'),(4,5,14,'Shower Door',500,'Broken in half, had to repair.',NULL,11,2012,1,'2012-11-15 12:50:21'),(5,6,17,'Lawn Faucet',1000,'cacascas',1,12,2012,29,'2012-12-29 13:33:24'),(6,6,30,'Door Handle',200,'Broken when previous tenent was moving out, Mr John.',1,12,2012,29,'2012-12-29 13:43:40'),(7,6,17,'Lawn Faucet',1500,'jcfh',2,12,2012,29,'2012-12-30 01:07:08');
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
) ENGINE=MyISAM AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `support_logs`
--

LOCK TABLES `support_logs` WRITE;
/*!40000 ALTER TABLE `support_logs` DISABLE KEYS */;
INSERT INTO `support_logs` VALUES (1,'e-Kodi-Support-1','Clyde Systems Ltd','info@e-Kodi.com',4,'What the fuck is wrong with you?',2,1,'Nothing.\r\n','2012-12-26 14:45:58','2012-12-30 02:54:14'),(2,'e-Kodi-Support-2','Kamau wa Njoroge','punchizi@yahoo.com',2,'I am unable to login to the system.',0,NULL,NULL,'2012-12-28 13:54:33',NULL),(3,'e-Kodi-Support-3','Andrew Kibe','kaguius@gmail.com',2,'Please sort me out.',2,1,'gsfgsr','2012-12-30 01:57:54','2012-12-30 03:08:42');
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
) ENGINE=MyISAM AUTO_INCREMENT=23 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tenant_checklist`
--

LOCK TABLES `tenant_checklist` WRITE;
/*!40000 ALTER TABLE `tenant_checklist` DISABLE KEYS */;
INSERT INTO `tenant_checklist` VALUES (2,6,18,31,82,'OK','OK',0,'','OK',3,29,12,2012,12,2012,29,'2012-12-29 21:20:53'),(3,6,18,31,83,'OK','OK',0,'','OK',3,29,12,2012,12,2012,29,'2012-12-29 21:20:53'),(4,6,18,31,84,'OK','OK',0,'','OK',3,29,12,2012,12,2012,29,'2012-12-29 21:20:53'),(5,6,18,31,85,'OK','Ok',0,'','Ok',3,29,12,2012,12,2012,29,'2012-12-29 21:20:53'),(6,6,18,31,86,'OK','',0,'','',3,29,12,2012,12,2012,29,'2012-12-29 21:20:53'),(7,6,18,31,87,'OK','',0,'','',3,29,12,2012,12,2012,29,'2012-12-29 21:20:53'),(8,6,18,31,88,'OK','',0,'','',3,29,12,2012,12,2012,29,'2012-12-29 21:20:53'),(9,6,18,31,89,'OK','Broken',150,'','Needs a new one',3,29,12,2012,12,2012,29,'2012-12-29 21:20:53'),(10,6,18,31,90,'OK','',0,'','',3,29,12,2012,12,2012,29,'2012-12-29 21:20:53'),(11,6,18,31,91,'OK','',0,'','',3,29,12,2012,12,2012,29,'2012-12-29 21:20:53'),(12,6,18,31,92,'OK','',0,'','',3,29,12,2012,12,2012,29,'2012-12-29 21:20:53'),(13,6,18,31,93,'OK','',0,'','',3,29,12,2012,12,2012,29,'2012-12-29 21:20:53'),(14,6,18,31,94,'OK','',0,'OK','',3,29,12,2012,12,2012,29,'2012-12-29 21:20:53'),(15,6,18,31,95,'OK','',0,'OK','',3,29,12,2012,12,2012,29,'2012-12-29 21:20:53'),(16,6,18,31,96,'OK','',0,'OK','',3,29,12,2012,12,2012,29,'2012-12-29 21:20:53'),(17,6,18,31,97,'OK','',0,'OK','',3,29,12,2012,12,2012,29,'2012-12-29 21:20:53'),(18,6,18,31,146,'OK',NULL,0,'Ok',NULL,3,29,12,2012,NULL,NULL,NULL,'2012-12-29 22:42:22'),(19,6,18,31,147,'OK',NULL,0,'OK',NULL,3,29,12,2012,NULL,NULL,NULL,'2012-12-29 22:42:22'),(20,6,18,31,144,'OK',NULL,0,'OK',NULL,3,29,12,2012,NULL,NULL,NULL,'2012-12-29 22:43:51'),(21,6,18,31,145,'OK',NULL,0,'OK',NULL,3,29,12,2012,NULL,NULL,NULL,'2012-12-29 22:43:51'),(22,6,18,31,133,'Ok',NULL,0,'Ok',NULL,3,29,12,2012,NULL,NULL,NULL,'2012-12-29 22:44:39');
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
) ENGINE=MyISAM AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tenant_status`
--

LOCK TABLES `tenant_status` WRITE;
/*!40000 ALTER TABLE `tenant_status` DISABLE KEYS */;
INSERT INTO `tenant_status` VALUES (1,'In-House'),(2,'Vacated'),(3,'Evicted due to Defaulting'),(4,'New Occupant');
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
  `employment_place` varchar(150) DEFAULT NULL,
  `designation` varchar(100) DEFAULT NULL,
  `work_id` varchar(25) DEFAULT NULL,
  `work_address` longtext,
  `street` varchar(100) DEFAULT NULL,
  `building` varchar(100) DEFAULT NULL,
  `floor` varchar(50) DEFAULT NULL,
  `id_number` varchar(50) DEFAULT NULL,
  `tenant_status` int(5) DEFAULT NULL,
  `transactiontime` datetime DEFAULT NULL,
  `manager_id` int(10) DEFAULT NULL,
  `UID` int(10) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=32 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tenants`
--

LOCK TABLES `tenants` WRITE;
/*!40000 ALTER TABLE `tenants` DISABLE KEYS */;
INSERT INTO `tenants` VALUES (1,'ClydeRMS-569-0001',5,15,'Amani Mwadime','P.O. Box 45222','0721100342','n/a','Mwadime Junior','None',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,1,'2012-07-20 06:27:11',3,NULL),(2,'ClydeRMS-569-0002',6,17,'James Mwangi','P.O. Box 42008 00100 Nbi','+254721100342','kaguius@gmail.com','Mwangi Irungu','+254704469814',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,2,'2012-08-03 10:55:19',3,NULL),(3,'ClydeRMS-569-0003',6,18,'Alice Muiruri','P.O. Box 451236 01000 Thika','+254789456123','n/a','n/a','n/a',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,2,'2012-08-03 10:59:38',3,NULL),(30,'ClydeRMS-569-00030',8,27,'Carolyne Alana','None','+254711239584','carolyqty@gmail.com','None','None',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,1,'2012-12-07 20:44:05',3,NULL),(29,'ClydeRMS-569-00029',8,26,'Joseph Kibe','None','+254721100342','punchizi@yahoo.com','None','None',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,1,'2012-12-03 18:35:12',3,NULL),(31,'ClydeRMS-569-00031',6,18,'KIbe Muigai','None','+254704469814','agnes2@agnes2.com','None','None',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,1,'2012-12-10 20:16:48',3,1);
/*!40000 ALTER TABLE `tenants` ENABLE KEYS */;
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
) ENGINE=MyISAM AUTO_INCREMENT=176 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `user_logs`
--

LOCK TABLES `user_logs` WRITE;
/*!40000 ALTER TABLE `user_logs` DISABLE KEYS */;
INSERT INTO `user_logs` VALUES (1,'kaguius@gmail.com',1,'2012-12-03 17:16:47','127.0.0.1','Mozilla/5.0 (X11; Ubuntu; Linux i686; rv:17.0) Gecko/17.0 Firefox/17.0','','','',''),(2,'punchizi@yahoo.com',27,'2012-12-07 21:06:05','127.0.0.1','Mozilla/5.0 (X11; Linux i686) AppleWebKit/537.11 (KHTML, like Gecko) Chrome/23.0.1271.91 Safari/537.11','','','',''),(3,'punchizi@yahoo.com',27,'2012-12-07 21:12:08','127.0.0.1','Mozilla/5.0 (X11; Linux i686) AppleWebKit/537.11 (KHTML, like Gecko) Chrome/23.0.1271.91 Safari/537.11','','','',''),(4,'kaguius@gmail.com',1,'2012-12-07 22:32:20','127.0.0.1','Mozilla/5.0 (X11; Ubuntu; Linux i686; rv:17.0) Gecko/17.0 Firefox/17.0','','','',''),(5,'kaguius@gmail.com',1,'2012-12-06 19:27:29','127.0.0.1','Mozilla/5.0 (X11; Ubuntu; Linux i686; rv:17.0) Gecko/20100101 Firefox/17.0','','','',''),(6,'kaguius@gmail.com',1,'2012-12-07 12:58:48','127.0.0.1','Mozilla/5.0 (X11; Ubuntu; Linux i686; rv:17.0) Gecko/20100101 Firefox/17.0','','','',''),(7,'kaguius@gmail.com',1,'2012-12-07 16:09:27','127.0.0.1','Mozilla/5.0 (X11; Ubuntu; Linux i686; rv:17.0) Gecko/20100101 Firefox/17.0','','','',''),(8,'kaguius@gmail.com',1,'2012-12-07 16:38:59','127.0.0.1','Mozilla/5.0 (X11; Ubuntu; Linux i686; rv:17.0) Gecko/20100101 Firefox/17.0','','','',''),(9,'kaguius@gmail.com',1,'2012-12-07 16:39:48','127.0.0.1','Mozilla/5.0 (X11; Ubuntu; Linux i686; rv:17.0) Gecko/20100101 Firefox/17.0','','','',''),(10,'kaguius@gmail.com',1,'2012-12-07 16:40:16','127.0.0.1','Mozilla/5.0 (X11; Ubuntu; Linux i686; rv:17.0) Gecko/20100101 Firefox/17.0','','','',''),(11,'kaguius@gmail.com',1,'2012-12-07 16:43:07','127.0.0.1','Mozilla/5.0 (X11; Ubuntu; Linux i686; rv:17.0) Gecko/20100101 Firefox/17.0','','','',''),(12,'kaguius@gmail.com',1,'2012-12-07 16:44:42','127.0.0.1','Mozilla/5.0 (X11; Ubuntu; Linux i686; rv:17.0) Gecko/20100101 Firefox/17.0','','','',''),(13,'email@email.com',29,'2012-12-07 17:04:35','127.0.0.1','Mozilla/5.0 (X11; Ubuntu; Linux i686; rv:17.0) Gecko/20100101 Firefox/17.0','','','',''),(14,'email@email.com',29,'2012-12-07 17:05:40','127.0.0.1','Mozilla/5.0 (X11; Ubuntu; Linux i686; rv:17.0) Gecko/20100101 Firefox/17.0','','','',''),(15,'email@email.com',29,'2012-12-07 17:06:31','127.0.0.1','Mozilla/5.0 (X11; Ubuntu; Linux i686; rv:17.0) Gecko/20100101 Firefox/17.0','','','',''),(16,'email@email.com',29,'2012-12-07 17:08:36','127.0.0.1','Mozilla/5.0 (X11; Ubuntu; Linux i686; rv:17.0) Gecko/20100101 Firefox/17.0','','','',''),(17,'email@email.com',29,'2012-12-07 17:09:50','127.0.0.1','Mozilla/5.0 (X11; Ubuntu; Linux i686; rv:17.0) Gecko/20100101 Firefox/17.0','','','',''),(18,'email@email.com',29,'2012-12-07 17:11:04','127.0.0.1','Mozilla/5.0 (X11; Ubuntu; Linux i686; rv:17.0) Gecko/20100101 Firefox/17.0','','','',''),(19,'email@email.com',29,'2012-12-07 17:12:23','127.0.0.1','Mozilla/5.0 (X11; Ubuntu; Linux i686; rv:17.0) Gecko/20100101 Firefox/17.0','','','',''),(20,'kaguius@gmail.com',1,'2012-12-07 17:20:09','127.0.0.1','Mozilla/5.0 (X11; Ubuntu; Linux i686; rv:17.0) Gecko/20100101 Firefox/17.0','','','',''),(21,'kaguius@gmail.com',1,'2012-12-07 21:25:59','127.0.0.1','Mozilla/5.0 (X11; Ubuntu; Linux i686; rv:17.0) Gecko/20100101 Firefox/17.0','','','',''),(22,'kaguius@gmail.com',1,'2012-12-07 21:26:20','127.0.0.1','Mozilla/5.0 (X11; Ubuntu; Linux i686; rv:17.0) Gecko/20100101 Firefox/17.0','','','',''),(23,'punchizi@yahoo.com',27,'2012-12-07 22:00:58','127.0.0.1','Mozilla/5.0 (X11; Ubuntu; Linux i686; rv:17.0) Gecko/20100101 Firefox/17.0','','','',''),(24,'punchizi@yahoo.com',27,'2012-12-07 22:02:50','127.0.0.1','Mozilla/5.0 (X11; Ubuntu; Linux i686; rv:17.0) Gecko/20100101 Firefox/17.0','','','',''),(25,'punchizi@yahoo.com',27,'2012-12-07 22:03:52','127.0.0.1','Mozilla/5.0 (X11; Ubuntu; Linux i686; rv:17.0) Gecko/20100101 Firefox/17.0','','','',''),(26,'punchizi@yahoo.com',27,'2012-12-07 22:04:47','127.0.0.1','Mozilla/5.0 (X11; Ubuntu; Linux i686; rv:17.0) Gecko/20100101 Firefox/17.0','','','',''),(27,'kaguius@gmail.com',1,'0000-00-00 00:00:00','127.0.0.1','Mozilla/5.0 (X11; Ubuntu; Linux i686; rv:17.0) Gecko/20100101 Firefox/17.0','','','',''),(28,'kaguius@gmail.com',1,'0000-00-00 00:00:00','127.0.0.1','Mozilla/5.0 (X11; Ubuntu; Linux i686; rv:17.0) Gecko/20100101 Firefox/17.0','','','',''),(29,'kaguius@gmail.com',1,'2012-12-08 10:58:39','127.0.0.1','Mozilla/5.0 (X11; Ubuntu; Linux i686; rv:17.0) Gecko/20100101 Firefox/17.0','','','',''),(30,'email@email.com',29,'2012-12-08 11:12:07','127.0.0.1','Mozilla/5.0 (X11; Ubuntu; Linux i686; rv:17.0) Gecko/20100101 Firefox/17.0','','','',''),(31,'email@email.com',29,'2012-12-08 11:15:56','127.0.0.1','Mozilla/5.0 (X11; Ubuntu; Linux i686; rv:17.0) Gecko/20100101 Firefox/17.0','','','',''),(32,'kaguius@gmail.com',1,'2012-12-08 11:20:12','127.0.0.1','Mozilla/5.0 (X11; Ubuntu; Linux i686; rv:17.0) Gecko/20100101 Firefox/17.0','','','',''),(33,'email@email.com',29,'2012-12-08 11:34:01','127.0.0.1','Mozilla/5.0 (X11; Ubuntu; Linux i686; rv:17.0) Gecko/20100101 Firefox/17.0','','','',''),(34,'kaguius@gmail.com',1,'2012-12-08 11:34:44','127.0.0.1','Mozilla/5.0 (X11; Ubuntu; Linux i686; rv:17.0) Gecko/20100101 Firefox/17.0','','','',''),(35,'email@email.com',29,'2012-12-08 11:36:55','127.0.0.1','Mozilla/5.0 (X11; Ubuntu; Linux i686; rv:17.0) Gecko/20100101 Firefox/17.0','','','',''),(36,'email@email.com',29,'2012-12-08 11:42:00','127.0.0.1','Mozilla/5.0 (X11; Ubuntu; Linux i686; rv:17.0) Gecko/20100101 Firefox/17.0','','','',''),(37,'kaguius@gmail.com',1,'2012-12-08 11:45:28','127.0.0.1','Mozilla/5.0 (X11; Ubuntu; Linux i686; rv:17.0) Gecko/20100101 Firefox/17.0','','','',''),(38,'email@email.com',29,'2012-12-08 11:47:35','127.0.0.1','Mozilla/5.0 (X11; Ubuntu; Linux i686; rv:17.0) Gecko/20100101 Firefox/17.0','','','',''),(39,'kaguius@gmail.com',1,'2012-12-08 12:06:44','127.0.0.1','Mozilla/5.0 (X11; Ubuntu; Linux i686; rv:17.0) Gecko/20100101 Firefox/17.0','','','',''),(40,'email@email.com',29,'2012-12-08 12:07:06','127.0.0.1','Mozilla/5.0 (X11; Ubuntu; Linux i686; rv:17.0) Gecko/20100101 Firefox/17.0','','','',''),(41,'email@email.com',29,'2012-12-08 12:36:35','127.0.0.1','Mozilla/5.0 (X11; Ubuntu; Linux i686; rv:17.0) Gecko/20100101 Firefox/17.0','Nairobi','Kenya','-1.2830','36.8170'),(42,'kaguius@gmail.com',1,'2012-12-08 12:37:28','127.0.0.1','Mozilla/5.0 (X11; Ubuntu; Linux i686; rv:17.0) Gecko/20100101 Firefox/17.0','Nairobi','Kenya','-1.2830','36.8170'),(43,'kaguius@gmail.com',1,'2012-12-08 12:41:51','127.0.0.1','Mozilla/5.0 (X11; Ubuntu; Linux i686; rv:17.0) Gecko/20100101 Firefox/17.0','','','',''),(44,'email@email.com',29,'2012-12-08 12:44:12','127.0.0.1','Mozilla/5.0 (X11; Ubuntu; Linux i686; rv:17.0) Gecko/20100101 Firefox/17.0','','','',''),(45,'kaguius@gmail.com',1,'2012-12-08 14:59:20','127.0.0.1','Mozilla/5.0 (X11; Ubuntu; Linux i686; rv:17.0) Gecko/20100101 Firefox/17.0','','','',''),(46,'kaguius@gmail.com',1,'0000-00-00 00:00:00','127.0.0.1','Mozilla/5.0 (X11; Ubuntu; Linux i686; rv:17.0) Gecko/20100101 Firefox/17.0','','','',''),(47,'kaguius@gmail.com',1,'0000-00-00 00:00:00','127.0.0.1','Mozilla/5.0 (X11; Ubuntu; Linux i686; rv:17.0) Gecko/20100101 Firefox/17.0','','','',''),(48,'kaguius@gmail.com',1,'2012-12-09 12:57:24','127.0.0.1','Mozilla/5.0 (X11; Ubuntu; Linux i686; rv:17.0) Gecko/20100101 Firefox/17.0','','','',''),(49,'kaguius@gmail.com',1,'2012-12-10 11:30:03','127.0.0.1','Mozilla/5.0 (X11; Ubuntu; Linux i686; rv:17.0) Gecko/20100101 Firefox/17.0','','','',''),(50,'kaguius@gmail.com',1,'2012-12-10 12:12:14','127.0.0.1','Mozilla/5.0 (X11; Linux i686) AppleWebKit/537.11 (KHTML, like Gecko) Chrome/23.0.1271.95 Safari/537.11','','','',''),(51,'kaguius@gmail.com',1,'2012-12-10 12:12:51','127.0.0.1','Mozilla/5.0 (X11; Linux i686) AppleWebKit/537.11 (KHTML, like Gecko) Chrome/23.0.1271.95 Safari/537.11','','','',''),(52,'kaguius@gmail.com',1,'2012-12-10 12:13:10','127.0.0.1','Mozilla/5.0 (X11; Linux i686) AppleWebKit/537.11 (KHTML, like Gecko) Chrome/23.0.1271.95 Safari/537.11','','','',''),(53,'kaguius@gmail.com',1,'2012-12-10 12:48:54','127.0.0.1','Mozilla/5.0 (X11; Linux i686) AppleWebKit/537.11 (KHTML, like Gecko) Chrome/23.0.1271.95 Safari/537.11','','','',''),(54,'kaguius@gmail.com',1,'2012-12-10 12:49:10','127.0.0.1','Mozilla/5.0 (X11; Linux i686) AppleWebKit/537.11 (KHTML, like Gecko) Chrome/23.0.1271.95 Safari/537.11','','','',''),(55,'kaguius@gmail.com',1,'2012-12-10 12:50:35','127.0.0.1','Mozilla/5.0 (X11; Linux i686) AppleWebKit/537.11 (KHTML, like Gecko) Chrome/23.0.1271.95 Safari/537.11','','','',''),(56,'kaguius@gmail.com',1,'2012-12-10 12:51:10','127.0.0.1','Mozilla/5.0 (X11; Linux i686) AppleWebKit/537.11 (KHTML, like Gecko) Chrome/23.0.1271.95 Safari/537.11','','','',''),(57,'kaguius@gmail.com',1,'2012-12-10 12:52:04','127.0.0.1','Mozilla/5.0 (X11; Linux i686) AppleWebKit/537.11 (KHTML, like Gecko) Chrome/23.0.1271.95 Safari/537.11','','','',''),(58,'kaguius@gmail.com',1,'2012-12-10 12:53:34','127.0.0.1','Mozilla/5.0 (X11; Linux i686) AppleWebKit/537.11 (KHTML, like Gecko) Chrome/23.0.1271.95 Safari/537.11','','','',''),(59,'email@email.com',29,'2012-12-10 12:53:52','127.0.0.1','Mozilla/5.0 (X11; Linux i686) AppleWebKit/537.11 (KHTML, like Gecko) Chrome/23.0.1271.95 Safari/537.11','','','',''),(60,'kaguius@gmail.com',1,'2012-12-10 13:18:18','127.0.0.1','Mozilla/5.0 (X11; Linux i686) AppleWebKit/537.11 (KHTML, like Gecko) Chrome/23.0.1271.95 Safari/537.11','','','',''),(61,'email@email.com',29,'2012-12-10 13:38:20','127.0.0.1','Mozilla/5.0 (X11; Linux i686) AppleWebKit/537.11 (KHTML, like Gecko) Chrome/23.0.1271.95 Safari/537.11','','','',''),(62,'kaguius@gmail.com',1,'2012-12-10 15:56:19','127.0.0.1','Mozilla/5.0 (X11; Linux i686) AppleWebKit/537.11 (KHTML, like Gecko) Chrome/23.0.1271.95 Safari/537.11','','','',''),(63,'kaguius@gmail.com',1,'2012-12-10 19:18:54','127.0.0.1','Mozilla/5.0 (X11; Ubuntu; Linux i686; rv:17.0) Gecko/20100101 Firefox/17.0','','','',''),(64,'kaguius@gmail.com',1,'2012-12-10 20:00:16','127.0.0.1','Mozilla/5.0 (X11; Linux i686) AppleWebKit/537.11 (KHTML, like Gecko) Chrome/23.0.1271.95 Safari/537.11','','','',''),(65,'kaguius@gmail.com',1,'2012-12-10 20:40:11','127.0.0.1','Mozilla/5.0 (X11; Ubuntu; Linux i686; rv:17.0) Gecko/20100101 Firefox/17.0','','','',''),(66,'email@email.com',29,'2012-12-10 20:47:30','127.0.0.1','Mozilla/5.0 (X11; Linux i686) AppleWebKit/537.11 (KHTML, like Gecko) Chrome/23.0.1271.95 Safari/537.11','','','',''),(67,'email@email.com',29,'2012-12-10 20:48:01','127.0.0.1','Mozilla/5.0 (X11; Linux i686) AppleWebKit/537.11 (KHTML, like Gecko) Chrome/23.0.1271.95 Safari/537.11','','','',''),(68,'kaguius@gmail.com',1,'2012-12-10 21:59:26','127.0.0.1','Mozilla/5.0 (X11; Linux i686) AppleWebKit/537.11 (KHTML, like Gecko) Chrome/23.0.1271.95 Safari/537.11','','','',''),(69,'email@email.com',29,'2012-12-10 21:59:51','127.0.0.1','Mozilla/5.0 (X11; Linux i686) AppleWebKit/537.11 (KHTML, like Gecko) Chrome/23.0.1271.95 Safari/537.11','','','',''),(70,'kaguius@gmail.com',1,'2012-12-11 09:30:35','127.0.0.1','Mozilla/5.0 (X11; Linux i686) AppleWebKit/537.11 (KHTML, like Gecko) Chrome/23.0.1271.95 Safari/537.11','','','',''),(71,'kaguius@gmail.com',1,'2012-12-13 11:30:00','127.0.0.1','Mozilla/5.0 (X11; Ubuntu; Linux i686; rv:17.0) Gecko/20100101 Firefox/17.0','','','',''),(72,'kaguius@gmail.com',1,'2012-12-13 13:43:05','127.0.0.1','Mozilla/5.0 (X11; Ubuntu; Linux i686; rv:17.0) Gecko/20100101 Firefox/17.0','','','',''),(73,'kaguius@gmail.com',1,'2012-12-13 15:21:16','127.0.0.1','Mozilla/5.0 (X11; Ubuntu; Linux i686; rv:17.0) Gecko/20100101 Firefox/17.0','','','',''),(74,'kaguius@gmail.com',1,'2012-12-14 08:52:52','127.0.0.1','Mozilla/5.0 (X11; Linux i686) AppleWebKit/537.11 (KHTML, like Gecko) Chrome/23.0.1271.97 Safari/537.11','','','',''),(75,'kaguius@gmail.com',1,'2012-12-14 09:50:30','127.0.0.1','Mozilla/5.0 (X11; Linux i686) AppleWebKit/537.11 (KHTML, like Gecko) Chrome/23.0.1271.97 Safari/537.11','','','',''),(76,'yebne1@gmail.com',32,'2012-12-14 09:52:39','127.0.0.1','Mozilla/5.0 (X11; Linux i686) AppleWebKit/537.11 (KHTML, like Gecko) Chrome/23.0.1271.97 Safari/537.11','','','',''),(77,'email@email.com',29,'2012-12-14 10:08:02','127.0.0.1','Mozilla/5.0 (X11; Linux i686) AppleWebKit/537.11 (KHTML, like Gecko) Chrome/23.0.1271.97 Safari/537.11','','','',''),(78,'yebne1@gmail.com',32,'2012-12-14 10:08:46','127.0.0.1','Mozilla/5.0 (X11; Linux i686) AppleWebKit/537.11 (KHTML, like Gecko) Chrome/23.0.1271.97 Safari/537.11','','','',''),(79,'kaguius@gmail.com',1,'2012-12-14 11:57:15','127.0.0.1','Mozilla/5.0 (X11; Linux i686) AppleWebKit/537.11 (KHTML, like Gecko) Chrome/23.0.1271.97 Safari/537.11','','','',''),(80,'email@email.com',29,'2012-12-14 12:01:10','127.0.0.1','Mozilla/5.0 (X11; Linux i686) AppleWebKit/537.11 (KHTML, like Gecko) Chrome/23.0.1271.97 Safari/537.11','','','',''),(81,'yebne1@gmail.com',32,'2012-12-14 12:01:26','127.0.0.1','Mozilla/5.0 (X11; Linux i686) AppleWebKit/537.11 (KHTML, like Gecko) Chrome/23.0.1271.97 Safari/537.11','','','',''),(82,'email@email.com',29,'2012-12-14 12:46:32','127.0.0.1','Mozilla/5.0 (X11; Linux i686) AppleWebKit/537.11 (KHTML, like Gecko) Chrome/23.0.1271.97 Safari/537.11','','','',''),(83,'email@email.com',29,'2012-12-14 15:10:31','127.0.0.1','Mozilla/5.0 (X11; Ubuntu; Linux i686; rv:17.0) Gecko/20100101 Firefox/17.0','','','',''),(84,'email@email.com',29,'2012-12-14 16:54:55','127.0.0.1','Mozilla/5.0 (X11; Linux i686) AppleWebKit/537.11 (KHTML, like Gecko) Chrome/23.0.1271.97 Safari/537.11','','','',''),(85,'email@email.com',29,'2012-12-14 16:56:18','127.0.0.1','Mozilla/5.0 (X11; Ubuntu; Linux i686; rv:17.0) Gecko/20100101 Firefox/17.0','','','',''),(86,'email@email.com',29,'2012-12-14 21:09:11','127.0.0.1','Mozilla/5.0 (X11; Ubuntu; Linux i686; rv:17.0) Gecko/20100101 Firefox/17.0','','','',''),(87,'email@email.com',29,'2012-12-15 00:02:29','127.0.0.1','Mozilla/5.0 (X11; Ubuntu; Linux i686; rv:17.0) Gecko/20100101 Firefox/17.0','','','',''),(88,'agnes@agnes.com',30,'2012-12-15 03:13:40','127.0.0.1','Mozilla/5.0 (X11; Ubuntu; Linux i686; rv:17.0) Gecko/20100101 Firefox/17.0','','','',''),(89,'email@email.com',29,'2012-12-15 03:25:09','127.0.0.1','Mozilla/5.0 (X11; Ubuntu; Linux i686; rv:17.0) Gecko/20100101 Firefox/17.0','','','',''),(90,'email@email.com',29,'2012-12-15 11:08:54','127.0.0.1','Mozilla/5.0 (X11; Ubuntu; Linux i686; rv:17.0) Gecko/20100101 Firefox/17.0','','','',''),(91,'kaguius@gmail.com',1,'2012-12-15 11:24:04','127.0.0.1','Mozilla/5.0 (X11; Ubuntu; Linux i686; rv:17.0) Gecko/20100101 Firefox/17.0','','','',''),(92,'agnes@agnes.com',30,'2012-12-15 11:27:32','127.0.0.1','Mozilla/5.0 (X11; Ubuntu; Linux i686; rv:17.0) Gecko/20100101 Firefox/17.0','','','',''),(93,'agnes@agnes.com',30,'2012-12-15 12:32:47','127.0.0.1','Mozilla/5.0 (X11; Ubuntu; Linux i686; rv:17.0) Gecko/20100101 Firefox/17.0','','','',''),(94,'email@email.com',29,'2012-12-15 12:44:58','127.0.0.1','Mozilla/5.0 (X11; Ubuntu; Linux i686; rv:17.0) Gecko/20100101 Firefox/17.0','','','',''),(95,'agnes@agnes.com',30,'2012-12-15 14:01:35','127.0.0.1','Mozilla/5.0 (X11; Ubuntu; Linux i686; rv:17.0) Gecko/20100101 Firefox/17.0','','','',''),(96,'kaguius@gmail.com',1,'2012-12-16 17:55:24','127.0.0.1','Mozilla/5.0 (X11; Ubuntu; Linux i686; rv:17.0) Gecko/20100101 Firefox/17.0','','','',''),(97,'email@email.com',29,'2012-12-16 17:59:15','127.0.0.1','Mozilla/5.0 (X11; Ubuntu; Linux i686; rv:17.0) Gecko/20100101 Firefox/17.0','','','',''),(98,'agnes@agnes.com',30,'2012-12-16 18:08:05','127.0.0.1','Mozilla/5.0 (X11; Ubuntu; Linux i686; rv:17.0) Gecko/20100101 Firefox/17.0','','','',''),(99,'email@email.com',29,'2012-12-17 14:00:48','127.0.0.1','Mozilla/5.0 (X11; Ubuntu; Linux i686; rv:17.0) Gecko/20100101 Firefox/17.0','','','',''),(100,'kaguius@gmail.com',1,'2012-12-17 16:03:10','127.0.0.1','Mozilla/5.0 (X11; Ubuntu; Linux i686; rv:17.0) Gecko/20100101 Firefox/17.0','','','',''),(101,'kaguius@gmail.com',1,'2012-12-18 09:12:43','127.0.0.1','Mozilla/5.0 (X11; Ubuntu; Linux i686; rv:17.0) Gecko/20100101 Firefox/17.0','','','',''),(102,'kaguius@gmail.com',1,'2012-12-18 09:47:27','127.0.0.1','Mozilla/5.0 (X11; Ubuntu; Linux i686; rv:17.0) Gecko/20100101 Firefox/17.0','','','',''),(103,'email@email.com',29,'2012-12-18 10:56:33','127.0.0.1','Mozilla/5.0 (X11; Ubuntu; Linux i686; rv:17.0) Gecko/20100101 Firefox/17.0','','','',''),(104,'kaguius@gmail.com',1,'2012-12-18 11:35:57','127.0.0.1','Mozilla/5.0 (X11; Ubuntu; Linux i686; rv:17.0) Gecko/20100101 Firefox/17.0','','','',''),(105,'email@email.com',29,'2012-12-18 11:46:31','127.0.0.1','Mozilla/5.0 (X11; Ubuntu; Linux i686; rv:17.0) Gecko/20100101 Firefox/17.0','','','',''),(106,'email@email.com',29,'2012-12-18 12:19:51','127.0.0.1','Mozilla/5.0 (X11; Linux i686) AppleWebKit/537.11 (KHTML, like Gecko) Chrome/23.0.1271.97 Safari/537.11','','','',''),(107,'kaguius@gmail.com',1,'2012-12-18 12:21:24','127.0.0.1','Mozilla/5.0 (X11; Linux i686) AppleWebKit/537.11 (KHTML, like Gecko) Chrome/23.0.1271.97 Safari/537.11','','','',''),(108,'email@email.com',29,'2012-12-18 12:22:42','127.0.0.1','Mozilla/5.0 (X11; Linux i686) AppleWebKit/537.11 (KHTML, like Gecko) Chrome/23.0.1271.97 Safari/537.11','','','',''),(109,'kaguius@gmail.com',1,'2012-12-18 13:24:02','127.0.0.1','Mozilla/5.0 (X11; Ubuntu; Linux i686; rv:17.0) Gecko/20100101 Firefox/17.0','','','',''),(110,'agnes@agnes.com',30,'2012-12-18 13:52:55','127.0.0.1','Mozilla/5.0 (X11; Ubuntu; Linux i686; rv:17.0) Gecko/20100101 Firefox/17.0','','','',''),(111,'kaguius@gmail.com',1,'2012-12-18 15:23:33','127.0.0.1','Mozilla/5.0 (X11; Ubuntu; Linux i686; rv:17.0) Gecko/20100101 Firefox/17.0','','','',''),(112,'kaguius@gmail.com',1,'2012-12-18 16:30:22','127.0.0.1','Mozilla/5.0 (X11; Linux i686) AppleWebKit/537.11 (KHTML, like Gecko) Chrome/23.0.1271.97 Safari/537.11','','','',''),(113,'kaguius@gmail.com',1,'2012-12-18 17:27:17','127.0.0.1','Mozilla/5.0 (X11; Ubuntu; Linux i686; rv:17.0) Gecko/20100101 Firefox/17.0','','','',''),(114,'agnes@agnes.com',30,'2012-12-19 10:19:10','127.0.0.1','Mozilla/5.0 (X11; Ubuntu; Linux i686; rv:17.0) Gecko/20100101 Firefox/17.0','','','',''),(115,'kaguius@gmail.com',1,'2012-12-19 10:22:26','127.0.0.1','Mozilla/5.0 (X11; Ubuntu; Linux i686; rv:17.0) Gecko/20100101 Firefox/17.0','','','',''),(116,'kaguius@gmail.com',1,'2012-12-19 10:23:34','127.0.0.1','Mozilla/5.0 (X11; Ubuntu; Linux i686; rv:17.0) Gecko/20100101 Firefox/17.0','','','',''),(117,'kaguius@gmail.com',1,'2012-12-21 14:37:12','127.0.0.1','Mozilla/5.0 (X11; Ubuntu; Linux i686; rv:17.0) Gecko/20100101 Firefox/17.0','','','',''),(118,'kaguius@gmail.com',1,'2012-12-21 14:47:22','127.0.0.1','Mozilla/5.0 (X11; Ubuntu; Linux i686; rv:17.0) Gecko/20100101 Firefox/17.0','','','',''),(119,'kaguius@gmail.com',1,'2012-12-21 14:47:38','127.0.0.1','Mozilla/5.0 (X11; Ubuntu; Linux i686; rv:17.0) Gecko/20100101 Firefox/17.0','','','',''),(120,'kaguius@gmail.com',1,'2012-12-21 15:34:52','127.0.0.1','Mozilla/5.0 (X11; Ubuntu; Linux i686; rv:17.0) Gecko/20100101 Firefox/17.0','','','',''),(121,'kaguius@gmail.com',1,'2012-12-22 11:41:48','127.0.0.1','Mozilla/5.0 (X11; Ubuntu; Linux i686; rv:17.0) Gecko/20100101 Firefox/17.0','','','',''),(122,'agnes@agnes.com',30,'0000-00-00 00:00:00','127.0.0.1','Mozilla/5.0 (X11; Ubuntu; Linux i686; rv:17.0) Gecko/20100101 Firefox/17.0','','','',''),(123,'kaguius@gmail.com',1,'0000-00-00 00:00:00','127.0.0.1','Mozilla/5.0 (X11; Ubuntu; Linux i686; rv:17.0) Gecko/20100101 Firefox/17.0','','','',''),(124,'kaguius@gmail.com',1,'0000-00-00 00:00:00','127.0.0.1','Mozilla/5.0 (X11; Ubuntu; Linux i686; rv:17.0) Gecko/20100101 Firefox/17.0','','','',''),(125,'kaguius@gmail.com',1,'2012-12-27 16:36:17','127.0.0.1','Mozilla/5.0 (X11; Ubuntu; Linux i686; rv:17.0) Gecko/20100101 Firefox/17.0','','','',''),(126,'kaguius@gmail.com',1,'2012-12-27 16:38:10','127.0.0.1','Mozilla/5.0 (X11; Ubuntu; Linux i686; rv:17.0) Gecko/20100101 Firefox/17.0','','','',''),(127,'email@email.com',29,'2012-12-27 16:39:18','127.0.0.1','Mozilla/5.0 (X11; Ubuntu; Linux i686; rv:17.0) Gecko/20100101 Firefox/17.0','','','',''),(128,'agnes@agnes.com',30,'0000-00-00 00:00:00','127.0.0.1','Mozilla/5.0 (X11; Ubuntu; Linux i686; rv:17.0) Gecko/20100101 Firefox/17.0','','','',''),(129,'email@email.com',29,'2012-12-27 16:52:40','127.0.0.1','Mozilla/5.0 (X11; Ubuntu; Linux i686; rv:17.0) Gecko/20100101 Firefox/17.0','','','',''),(130,'kaguius@gmail.com',1,'0000-00-00 00:00:00','127.0.0.1','Mozilla/5.0 (X11; Ubuntu; Linux i686; rv:17.0) Gecko/20100101 Firefox/17.0','','','',''),(131,'kaguius@gmail.com',1,'2012-12-28 18:37:51','127.0.0.1','Mozilla/5.0 (X11; Ubuntu; Linux i686; rv:17.0) Gecko/20100101 Firefox/17.0','','','',''),(132,'email@email.com',29,'2012-12-28 18:53:41','127.0.0.1','Mozilla/5.0 (X11; Ubuntu; Linux i686; rv:17.0) Gecko/20100101 Firefox/17.0','','','',''),(133,'kaguius@gmail.com',1,'2012-12-29 10:31:07','127.0.0.1','Mozilla/5.0 (X11; Ubuntu; Linux i686; rv:17.0) Gecko/20100101 Firefox/17.0','','','',''),(134,'email@email.com',29,'2012-12-29 10:36:14','127.0.0.1','Mozilla/5.0 (X11; Ubuntu; Linux i686; rv:17.0) Gecko/20100101 Firefox/17.0','','','',''),(135,'kaguius@gmail.com',1,'2012-12-29 15:21:18','127.0.0.1','Mozilla/5.0 (X11; Ubuntu; Linux i686; rv:17.0) Gecko/20100101 Firefox/17.0','','','',''),(136,'agnes2@agnes2.com',30,'0000-00-00 00:00:00','127.0.0.1','Mozilla/5.0 (X11; Linux i686) AppleWebKit/537.11 (KHTML, like Gecko) Chrome/23.0.1271.97 Safari/537.11','','','',''),(137,'agnes2@agnes2.com',30,'0000-00-00 00:00:00','127.0.0.1','Mozilla/5.0 (X11; Linux i686) AppleWebKit/537.11 (KHTML, like Gecko) Chrome/23.0.1271.97 Safari/537.11','','','',''),(138,'agnes2@agnes2.com',30,'0000-00-00 00:00:00','127.0.0.1','Mozilla/5.0 (X11; Linux i686) AppleWebKit/537.11 (KHTML, like Gecko) Chrome/23.0.1271.97 Safari/537.11','','','',''),(139,'agnes2@agnes2.com',30,'0000-00-00 00:00:00','127.0.0.1','Mozilla/5.0 (X11; Linux i686) AppleWebKit/537.11 (KHTML, like Gecko) Chrome/23.0.1271.97 Safari/537.11','','','',''),(140,'kaguius@gmail.com',1,'0000-00-00 00:00:00','127.0.0.1','Mozilla/5.0 (X11; Linux i686) AppleWebKit/537.11 (KHTML, like Gecko) Chrome/23.0.1271.97 Safari/537.11','','','',''),(141,'agnes2@agnes2.com',30,'0000-00-00 00:00:00','127.0.0.1','Mozilla/5.0 (X11; Ubuntu; Linux i686; rv:17.0) Gecko/20100101 Firefox/17.0','','','',''),(142,'kaguius@gmail.com',1,'0000-00-00 00:00:00','127.0.0.1','Mozilla/5.0 (X11; Ubuntu; Linux i686; rv:17.0) Gecko/20100101 Firefox/17.0','','','',''),(143,'kaguius@gmail.com',1,'2012-12-29 15:35:34','127.0.0.1','Mozilla/5.0 (X11; Ubuntu; Linux i686; rv:17.0) Gecko/20100101 Firefox/17.0','','','',''),(144,'carolyqty@gmail.com',28,'0000-00-00 00:00:00','127.0.0.1','Mozilla/5.0 (X11; Ubuntu; Linux i686; rv:17.0) Gecko/20100101 Firefox/17.0','','','',''),(145,'carolyqty@gmail.com',28,'0000-00-00 00:00:00','127.0.0.1','Mozilla/5.0 (X11; Ubuntu; Linux i686; rv:17.0) Gecko/20100101 Firefox/17.0','','','',''),(146,'carolyqty@gmail.com',28,'0000-00-00 00:00:00','127.0.0.1','Mozilla/5.0 (X11; Ubuntu; Linux i686; rv:17.0) Gecko/20100101 Firefox/17.0','','','',''),(147,'agnes2@agnes2.com',30,'0000-00-00 00:00:00','127.0.0.1','Mozilla/5.0 (X11; Ubuntu; Linux i686; rv:17.0) Gecko/20100101 Firefox/17.0','','','',''),(148,'kaguius@gmail.com',1,'0000-00-00 00:00:00','127.0.0.1','Mozilla/5.0 (X11; Ubuntu; Linux i686; rv:17.0) Gecko/20100101 Firefox/17.0','','','',''),(149,'kaguius@gmail.com',1,'2012-12-29 15:49:03','127.0.0.1','Mozilla/5.0 (X11; Ubuntu; Linux i686; rv:17.0) Gecko/20100101 Firefox/17.0','','','',''),(150,'email@email.com',29,'2012-12-29 16:19:36','127.0.0.1','Mozilla/5.0 (X11; Ubuntu; Linux i686; rv:17.0) Gecko/20100101 Firefox/17.0','','','',''),(151,'kaguius@gmail.com',1,'2012-12-30 02:02:42','127.0.0.1','Mozilla/5.0 (X11; Ubuntu; Linux i686; rv:17.0) Gecko/20100101 Firefox/17.0','','','',''),(152,'kaguius@gmail.com',1,'2012-12-30 03:42:33','127.0.0.1','Mozilla/5.0 (X11; Ubuntu; Linux i686; rv:17.0) Gecko/20100101 Firefox/17.0','','','',''),(153,'kaguius@gmail.com',1,'2012-12-30 03:51:03','127.0.0.1','Mozilla/5.0 (X11; Linux i686) AppleWebKit/537.11 (KHTML, like Gecko) Chrome/23.0.1271.97 Safari/537.11','','','',''),(154,'kaguius@gmail.com',1,'0000-00-00 00:00:00','127.0.0.1','Mozilla/5.0 (X11; Linux i686) AppleWebKit/537.11 (KHTML, like Gecko) Chrome/23.0.1271.97 Safari/537.11','','','',''),(155,'kaguius@gmail.com',1,'2012-12-31 13:46:28','127.0.0.1','Mozilla/5.0 (X11; Linux i686) AppleWebKit/537.11 (KHTML, like Gecko) Chrome/23.0.1271.97 Safari/537.11','','','',''),(156,'kaguius@gmail.com',1,'2013-01-02 12:48:03','127.0.0.1','Mozilla/5.0 (X11; Linux i686) AppleWebKit/537.11 (KHTML, like Gecko) Chrome/23.0.1271.97 Safari/537.11','','','',''),(157,'kaguius@gmail.com',1,'2013-01-02 15:10:15','127.0.0.1','Mozilla/5.0 (X11; Linux i686) AppleWebKit/537.11 (KHTML, like Gecko) Chrome/23.0.1271.97 Safari/537.11','','','',''),(158,'kaguius@gmail.com',1,'2013-01-03 15:45:56','127.0.0.1','Mozilla/5.0 (X11; Ubuntu; Linux i686; rv:17.0) Gecko/20100101 Firefox/17.0','','','',''),(159,'kaguius@gmail.com',1,'2013-01-03 19:36:15','127.0.0.1','Mozilla/5.0 (X11; Linux i686) AppleWebKit/537.11 (KHTML, like Gecko) Chrome/23.0.1271.97 Safari/537.11','','','',''),(160,'kaguius@gmail.com',1,'2013-01-04 15:04:11','127.0.0.1','Mozilla/5.0 (X11; Ubuntu; Linux i686; rv:17.0) Gecko/20100101 Firefox/17.0','','','',''),(161,'agnes2@agnes2.com',30,'0000-00-00 00:00:00','127.0.0.1','Mozilla/5.0 (X11; Ubuntu; Linux i686; rv:17.0) Gecko/20100101 Firefox/17.0','','','',''),(162,'agnes2@agnes2.com',30,'0000-00-00 00:00:00','127.0.0.1','Mozilla/5.0 (X11; Linux i686) AppleWebKit/537.11 (KHTML, like Gecko) Chrome/23.0.1271.97 Safari/537.11','','','',''),(163,'kaguius@gmail.com',1,'2013-01-06 10:15:35','127.0.0.1','Mozilla/5.0 (X11; Linux i686) AppleWebKit/537.11 (KHTML, like Gecko) Chrome/23.0.1271.97 Safari/537.11','','','',''),(164,'kaguius@gmail.com',1,'2013-01-07 14:38:45','127.0.0.1','Mozilla/5.0 (X11; Linux i686) AppleWebKit/537.11 (KHTML, like Gecko) Chrome/23.0.1271.97 Safari/537.11','','','',''),(165,'kaguius@gmail.com',1,'2013-01-07 14:55:06','127.0.0.1','Mozilla/5.0 (X11; Ubuntu; Linux i686; rv:17.0) Gecko/20100101 Firefox/17.0','','','',''),(166,'murungaru@murungaru.com',38,'2013-01-07 16:43:06','127.0.0.1','Mozilla/5.0 (X11; Ubuntu; Linux i686; rv:17.0) Gecko/20100101 Firefox/17.0','','','',''),(167,'kaguius@gmail.com',1,'2013-01-07 20:26:07','127.0.0.1','Mozilla/5.0 (X11; Ubuntu; Linux i686; rv:17.0) Gecko/20100101 Firefox/17.0','','','',''),(168,'murungaru@murungaru.com',38,'2013-01-07 20:27:19','127.0.0.1','Mozilla/5.0 (X11; Ubuntu; Linux i686; rv:17.0) Gecko/20100101 Firefox/17.0','','','',''),(169,'kaguius@gmail.com',1,'2013-01-07 20:36:50','127.0.0.1','Mozilla/5.0 (X11; Ubuntu; Linux i686; rv:17.0) Gecko/20100101 Firefox/17.0','','','',''),(170,'murungaru@murungaru.com',38,'2013-01-07 20:37:32','127.0.0.1','Mozilla/5.0 (X11; Ubuntu; Linux i686; rv:17.0) Gecko/20100101 Firefox/17.0','','','',''),(171,'kaguius@gmail.com',1,'2013-01-07 21:07:57','127.0.0.1','Mozilla/5.0 (X11; Ubuntu; Linux i686; rv:17.0) Gecko/20100101 Firefox/17.0','','','',''),(172,'kaguius@gmail.com',1,'2013-01-08 13:17:07','127.0.0.1','Mozilla/5.0 (X11; Linux i686) AppleWebKit/537.11 (KHTML, like Gecko) Chrome/23.0.1271.97 Safari/537.11','','','',''),(173,'kaguius@gmail.com',1,'2013-01-08 13:17:15','127.0.0.1','Mozilla/5.0 (X11; Linux i686) AppleWebKit/537.11 (KHTML, like Gecko) Chrome/23.0.1271.97 Safari/537.11','','','',''),(174,'kaguius@gmail.com',1,'2013-01-15 19:22:52','127.0.0.1','Mozilla/5.0 (X11; Ubuntu; Linux i686; rv:18.0) Gecko/20100101 Firefox/18.0','','','',''),(175,'kaguius@gmail.com',1,'2013-01-15 20:27:53','127.0.0.1','Mozilla/5.0 (X11; Ubuntu; Linux i686; rv:18.0) Gecko/20100101 Firefox/18.0','','','','');
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
  `user_status` int(5) DEFAULT '0',
  `manager_id` int(10) DEFAULT '0',
  `UID` int(10) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=39 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `user_profiles`
--

LOCK TABLES `user_profiles` WRITE;
/*!40000 ALTER TABLE `user_profiles` DISABLE KEYS */;
INSERT INTO `user_profiles` VALUES (1,'Andrew','Kibe','kaguius@gmail.com','3f1f22537f11f5fa990c95fe123a946c','3f1f22537f11f5fa990c95fe123a946c','+254704469814',1,'2012-07-14 07:09:00',3,1,0,1),(2,'Admin','Admin','admin@admin.com','c5cc866787366e0436182a20831e2d08','c5cc866787366e0436182a20831e2d08','+254721121121',2,'2012-07-14 07:09:00',0,1,NULL,NULL),(11,'Kim Kardashian',NULL,'admin2@admin.com','c5cc866787366e0436182a20831e2d08',NULL,'+254725790499',3,'2012-11-28 19:54:19',13,0,NULL,NULL),(9,'Kaguius','Kibe2','kaguius@yahoo.com','c5cc866787366e0436182a20831e2d08',NULL,'+254704469814',4,'2012-11-24 19:05:56',11,1,NULL,NULL),(10,'Joe Kibe',NULL,'punchizi@yahoo.com','8ef9c1ec73984d86836aa6c0f2f0c311',NULL,'+254721100342',3,'2012-11-24 20:57:17',12,0,NULL,NULL),(12,'Kim Kardashian Senior',NULL,'','d0ff7075ac9c0a00d2be05b18e831078',NULL,'+254725790499',3,'2012-11-28 20:41:16',0,0,NULL,NULL),(13,'Kim Senior',NULL,'','21232f297a57a5a743894a0e4a801fc3',NULL,'+254725790499',3,'2012-11-28 20:45:24',0,0,NULL,NULL),(14,'Kim Juniour',NULL,'admin@admin.com','d0ff7075ac9c0a00d2be05b18e831078',NULL,'+254704469814',3,'2012-11-28 20:49:45',0,0,NULL,NULL),(23,'Andrew Chege Kibe',NULL,'akibe@wenyebiashara.biz','18e3a7a253fe7a712bed610ae8a8fdd6',NULL,'+254704469814',3,'2012-12-02 10:53:35',25,1,NULL,NULL),(27,'Joseph Kibe',NULL,'punchizi@yahoo.com','8ef9c1ec73984d86836aa6c0f2f0c311',NULL,'+254721100342',3,'2012-12-03 18:35:12',29,1,NULL,NULL),(28,'Carolyne','Alana','carolyqty@gmail.com','440635083d08df58d672201e89e44fc6','440635083d08df58d672201e89e44fc6','+254711239584',3,'2012-12-07 20:44:05',30,1,3,1),(29,'Lawrence','Kamau','email@email.com','7d3196ad738de371f81fc54621f97fc1','7d3196ad738de371f81fc54621f97fc1','+254721100342',2,'2012-12-07 17:01:58',0,1,3,1),(30,'Kibe','Muigai','agnes2@agnes2.com','2d8463b5c3a3c6c8854a175683fe6303','2d8463b5c3a3c6c8854a175683fe6303','+254704469814',3,'2012-12-10 20:16:48',31,1,3,1),(31,'Alana','Zawadi','alana@alana.com','440635083d08df58d672201e89e44fc6','440635083d08df58d672201e89e44fc6','+254704469814',2,'2012-12-10 21:00:50',0,1,3,29),(32,'Ali','Nasser','yebne1@gmail.com','0aacc89a4d28750d01c14976f8a9668f','0aacc89a4d28750d01c14976f8a9668f','+254704469814',1,'2012-12-14 09:52:30',0,1,0,1),(37,'Andrew','Kibe','akibe@wenyebiashara.biz','5c4e2f0e28ba0db239212d9a8d39e954','5c4e2f0e28ba0db239212d9a8d39e954','+254721100342',2,'2012-12-26 12:35:56',0,0,4,NULL),(36,'Andrew','Kibe','info@e-Kodi.com','b6062a3a5c68908e90387180da56a0bc','b6062a3a5c68908e90387180da56a0bc','+254721100342',2,'2012-12-22 13:08:18',0,0,4,NULL),(38,'KIbe','Murungaru','murungaru@murungaru.com','85ebd0e819b1b811cdfdd9397ff6b9b3','85ebd0e819b1b811cdfdd9397ff6b9b3','111111',5,'2013-01-07 14:49:13',0,1,3,1);
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
) ENGINE=MyISAM AUTO_INCREMENT=37 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `users_failed_logs`
--

LOCK TABLES `users_failed_logs` WRITE;
/*!40000 ALTER TABLE `users_failed_logs` DISABLE KEYS */;
INSERT INTO `users_failed_logs` VALUES (1,'','','127.0.0.1',NULL),(2,'kaguius@yahoo.com','c5cc866787366e0436182a20831e2d','127.0.0.1',NULL),(3,'','kag','127.0.0.1',NULL),(4,'kaguius','kaguius','127.0.0.1',NULL),(5,'kaguius','123456789','127.0.0.1',NULL),(6,'kaguius','kaguius','127.0.0.1',NULL),(7,'kaguius','kaguius','127.0.0.1',NULL),(8,'kaguius','kaguius','127.0.0.1',NULL),(9,'kaguius','kaguius','127.0.0.1',NULL),(10,'kaguius','kaguius','127.0.0.1',NULL),(11,'kaguius','kaguius','127.0.0.1',NULL),(12,'kaguius@gmail.com','kaguius','127.0.0.1',NULL),(13,'kaguius@gmail.com','kaguius','127.0.0.1',NULL),(14,'email@email.com','kaguius','127.0.0.1',NULL),(15,'agnes@agnes.com','adnes','127.0.0.1',NULL),(16,'kaguius@gmail..com','kaguius','127.0.0.1',NULL),(17,'kag','kag','127.0.0.1',NULL),(18,'kag','kag','127.0.0.1',NULL),(19,'kag','kag','127.0.0.1',NULL),(20,'kag','kag','127.0.0.1',NULL),(21,'kag','kag','127.0.0.1',NULL),(22,'kaguius@gmail.com','kaguius','127.0.0.1',NULL),(23,'kaguius@gmail.com','kaguius','127.0.0.1',NULL),(24,'kaguius@gmail.com','458Kaguius92%','127.0.0.1',NULL),(25,'lawrence@blacksands.biz','blacksands','127.0.0.1',NULL),(26,'agnes2@agnes2.com','agvd','127.0.0.1',NULL),(27,'kaguius@gmail.com','kaguius','127.0.0.1',NULL),(28,'kaguius@gmail.com','kaguius','127.0.0.1',NULL),(29,'kaguius@gmail.com','kaguius','127.0.0.1',NULL),(30,'agnes@agnes.com','agnes','127.0.0.1',NULL),(31,'lawrence@blacksands.biz','blacksands','127.0.0.1',NULL),(32,'kag','kag','127.0.0.1',NULL),(33,'kag','kag','127.0.0.1','0000-00-00 00:00:00'),(34,'kag','kag','127.0.0.1','2013-01-08 13:09:08'),(35,'kag','kag','127.0.0.1','0000-00-00 00:00:00'),(36,'kag','kag','127.0.0.1','2013-01-08 13:10:34');
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
) ENGINE=MyISAM AUTO_INCREMENT=23 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `water_meter_details`
--

LOCK TABLES `water_meter_details` WRITE;
/*!40000 ALTER TABLE `water_meter_details` DISABLE KEYS */;
INSERT INTO `water_meter_details` VALUES (1,6,18,3,0,10000,100000,10,2012,'2012-11-21 16:30:30',1,NULL),(2,6,18,3,10000,15000,50000,11,2012,'2012-11-21 16:40:08',1,NULL),(3,6,17,2,0,2000,20000,11,2012,'2012-11-21 16:40:22',0,NULL),(4,6,17,2,2000,3000,10000,11,2012,'2012-11-21 16:47:54',NULL,NULL),(5,6,17,2,3000,4000,10000,11,2012,'2012-11-21 16:48:23',NULL,NULL),(6,6,18,3,15000,15100,1000,11,2012,'2012-11-21 16:50:37',NULL,NULL),(7,6,18,3,15100,15150,500,11,2012,'2012-11-21 16:51:59',NULL,NULL),(8,6,17,2,4000,4001,10,11,2012,'2012-11-21 16:52:37',NULL,NULL),(9,6,17,2,4001,4003,20,11,2012,'2012-11-21 16:53:19',NULL,NULL),(10,5,15,1,0,150,0,11,2012,'2012-11-21 17:22:37',NULL,NULL),(11,5,13,4,0,150,7500,11,2012,'2012-11-21 17:29:19',NULL,NULL),(12,6,18,3,15150,15155,50,11,2012,'2012-11-21 17:40:02',NULL,NULL),(13,6,19,5,0,50,500,11,2012,'2012-11-23 15:43:30',NULL,NULL),(14,6,20,6,0,15,150,11,2012,'2012-11-24 21:04:05',0,NULL),(15,12,21,12,0,15,150,11,2012,'2012-11-24 21:16:43',1,NULL),(17,8,26,29,0,50,400,11,2012,'2012-12-07 19:42:53',1,NULL),(18,6,18,31,15155,16000,101400,11,2012,'2012-12-15 13:21:47',0,29),(19,6,18,31,16000,16050,6000,12,2012,'2012-12-28 20:43:13',0,29),(20,6,18,3,16050,16051,120,12,2012,'2012-12-28 21:14:26',0,29),(21,8,27,30,0,10,80,12,2012,'2012-12-28 21:15:54',0,29),(22,8,26,29,50,60,80,12,2012,'2012-12-28 21:20:52',0,29);
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

-- Dump completed on 2013-01-15 21:11:23

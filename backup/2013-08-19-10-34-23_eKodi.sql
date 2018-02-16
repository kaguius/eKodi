-- MySQL dump 10.13  Distrib 5.5.32, for debian-linux-gnu (i686)
--
-- Host: localhost    Database: eKodi
-- ------------------------------------------------------
-- Server version	5.5.32-0ubuntu0.12.04.1

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
) ENGINE=MyISAM AUTO_INCREMENT=100 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `comms_table`
--

LOCK TABLES `comms_table` WRITE;
/*!40000 ALTER TABLE `comms_table` DISABLE KEYS */;
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
) ENGINE=MyISAM AUTO_INCREMENT=28 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `expense_items`
--

LOCK TABLES `expense_items` WRITE;
/*!40000 ALTER TABLE `expense_items` DISABLE KEYS */;
INSERT INTO `expense_items` VALUES (4,5,'Electricity',1200,1,'2012-07-20 06:19:03',NULL),(5,5,'Water',2000,1,'2012-07-20 06:19:19',NULL),(6,5,'Garbage',500,1,'2012-07-20 06:19:29',NULL),(7,5,'Rodentkil',464,1,'2012-07-20 06:19:48',NULL),(8,5,'Security',15000,1,'2012-07-20 06:20:02',NULL),(9,5,'Caretaker',6000,1,'2012-07-20 06:20:15',NULL),(10,6,'Gardener',5000,1,'2012-08-03 10:56:57',NULL),(11,6,'Utility',4000,1,'2012-08-03 10:57:13',NULL),(12,6,'Security',8000,1,'2012-08-03 10:57:29',NULL),(13,6,'Food for Caretaker',200,1,'2012-12-02 20:55:19',NULL),(14,6,'Food',300,1,'2012-12-02 20:59:15',NULL),(15,6,'Food',300,1,'2012-12-02 21:00:17',NULL),(16,7,'Security',500,1,'2012-12-07 22:58:43',NULL),(17,7,'Garden',1000,1,'2012-12-07 22:59:01',NULL),(18,8,'Garden',600,1,'2012-12-07 23:00:13',NULL),(19,8,'Security',1000,1,'2012-12-07 23:00:29',NULL),(20,6,'Cleaning',4000,29,'2012-12-15 13:05:06',29),(24,6,'Lawn Faucet',1500,29,'2012-12-30 01:07:08',29),(27,6,'land rates',15000,1,'2013-05-23 16:45:14',1),(26,6,'Faucet',500,1,'2013-04-29 17:08:04',1);
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
) ENGINE=MyISAM AUTO_INCREMENT=21 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `expense_payment`
--

LOCK TABLES `expense_payment` WRITE;
/*!40000 ALTER TABLE `expense_payment` DISABLE KEYS */;
INSERT INTO `expense_payment` VALUES (1,8,18,600,12,2012,'2012-12-07 23:00:45',NULL),(2,8,19,800,12,2012,'2012-12-07 23:00:45',NULL),(3,7,16,500,12,2012,'2012-12-07 23:01:28',NULL),(4,7,17,1000,12,2012,'2012-12-07 23:01:28',NULL),(5,6,10,5000,12,2012,'2012-12-10 20:35:55',1),(6,6,11,400,12,2012,'2012-12-10 20:35:55',1),(7,6,12,3000,12,2012,'2012-12-10 20:35:55',1),(8,6,20,3000,12,2012,'2012-12-15 13:05:36',29),(9,6,24,1500,12,2012,'2012-12-30 01:07:08',29),(10,6,10,5000,1,2013,'2013-01-23 19:52:11',1),(11,6,10,4000,3,2013,'2013-03-15 15:40:09',1),(12,6,12,8000,3,2013,'2013-03-15 15:40:09',1),(16,5,5,500,4,2013,'2013-04-29 10:49:06',1),(15,5,4,1500,4,2013,'2013-04-29 10:02:57',1),(17,5,6,500,4,2013,'2013-04-29 10:49:06',1),(20,6,10,1500,5,2013,'2013-05-11 11:05:53',1),(19,6,26,500,4,2013,'2013-04-29 17:08:04',1);
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
  `property_id` int(10) DEFAULT NULL,
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
) ENGINE=MyISAM AUTO_INCREMENT=12 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `fin_expense_payment`
--

LOCK TABLES `fin_expense_payment` WRITE;
/*!40000 ALTER TABLE `fin_expense_payment` DISABLE KEYS */;
INSERT INTO `fin_expense_payment` VALUES (11,17,3,21,0,'Andrew Kibe',1000,'Cash','KMV-001-456',16,8,2013,1,0,'2013-08-16 12:17:44'),(10,17,3,21,0,'James Mwangi',5000,'MPESA','GG45RGt5',16,8,2013,1,0,'2013-08-16 12:16:49'),(9,15,1,21,0,'James Kamau',15000,'Cash','KMV-0124',15,8,2013,1,0,'2013-08-15 15:43:26');
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
  `property_id` int(5) DEFAULT NULL,
  `UID` int(5) DEFAULT NULL,
  `transactiontime` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=19 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `fin_expenses_items`
--

LOCK TABLES `fin_expenses_items` WRITE;
/*!40000 ALTER TABLE `fin_expenses_items` DISABLE KEYS */;
INSERT INTO `fin_expenses_items` VALUES (1,3,'Stationery','ek-0052',3,NULL,1,'2012-12-13 17:35:33'),(3,3,'Water','ek-3-',3,NULL,32,'2012-12-14 12:09:08'),(4,3,'Security','ek-3-3',3,NULL,32,'2012-12-14 12:10:27'),(5,3,'Insurance','ek-3-4',3,NULL,32,'2012-12-14 12:41:51'),(7,3,'Supplies','ek-3-5',3,NULL,29,'2012-12-14 12:48:55'),(8,2,'Technology Licences','ek-3-7',3,NULL,29,'2012-12-14 12:57:35'),(9,3,'Meals & Entertainment','ek-3-8',3,NULL,29,'2012-12-14 13:01:26'),(10,3,'Rent','e-Kodi-10',3,NULL,29,'2012-12-14 13:21:10'),(12,3,'Petty Cash','e-Kodi-11',3,NULL,29,'2012-12-14 21:57:20'),(13,3,'Telephone','e-Kodi-13',3,NULL,29,'2012-12-14 21:59:58'),(14,3,'Rent','e-Kodi-14',0,21,1,'2012-12-18 18:58:18'),(15,1,'Wages','e-Kodi-15',0,21,1,'2013-01-06 10:18:08'),(16,1,'Petty Cash','e-Kodi-16',0,21,1,'2013-03-15 16:00:57'),(17,3,'Salaries','e-Kodi-17',0,21,1,'2013-08-16 12:16:25'),(18,3,'Nairobi Water','e-Kodi-18',0,21,1,'2013-08-17 14:17:11');
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
  `payment_image` varchar(250) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=10 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `payment_type`
--

LOCK TABLES `payment_type` WRITE;
/*!40000 ALTER TABLE `payment_type` DISABLE KEYS */;
INSERT INTO `payment_type` VALUES (1,'Cash',NULL),(2,'Kenswitch','images/ps_kenswitch.png'),(3,'MPESA','images/ps_mpesa.jpg'),(4,'ZAP','images/ps_zap.jpg'),(5,'Yu Cash','images/ps_yucash.jpg'),(6,'VISA','images/ps_visa.jpg'),(7,'Master Card','images/ps_mastercard.jpg'),(8,'Cheque',NULL),(9,'Deposit Slip',NULL);
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
  `expected` float DEFAULT NULL,
  `received` float DEFAULT NULL,
  `payment` float DEFAULT '0',
  `service_charge` float DEFAULT '0',
  `actual_penalties` float DEFAULT '0',
  `water_pay` float DEFAULT '0',
  `parking_fee` float DEFAULT '0',
  `garbage_fee` float DEFAULT NULL,
  `water_deposit` float DEFAULT NULL,
  `elec_deposit` float DEFAULT NULL,
  `balance` float DEFAULT '0',
  `display_balance` float DEFAULT '0',
  `rent_month` int(5) DEFAULT NULL,
  `rent_year` int(5) DEFAULT NULL,
  `ref_id` varchar(10) DEFAULT NULL,
  `category` int(5) DEFAULT '0',
  `payment_type` int(5) DEFAULT NULL,
  `transactiontime` datetime DEFAULT NULL,
  `manager_id` int(10) DEFAULT NULL,
  `UID` int(10) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=151 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `payments`
--

LOCK TABLES `payments` WRITE;
/*!40000 ALTER TABLE `payments` DISABLE KEYS */;
INSERT INTO `payments` VALUES (110,33,33,12397,NULL,11070,0,1127,0,0,200,NULL,NULL,0,0,7,2013,'GH445F',2,3,'2013-08-17 14:38:20',3,1),(111,34,34,19470,NULL,15000,0,1770,2500,0,200,NULL,NULL,0,0,7,2013,'3333333',2,9,'2013-08-17 15:04:11',3,1),(109,33,33,15070,NULL,10930,0,1370,2500,0,200,NULL,NULL,0,70,7,2013,'GH445F',2,3,'2013-08-17 14:37:40',3,1),(142,57,38,16004,16000,15000,0,0,810,0,200,NULL,NULL,-6,4,7,2013,NULL,2,1,'2013-08-17 16:27:25',13,1),(141,58,39,16730,16500,15000,0,0,1530,0,200,NULL,NULL,0,230,7,2013,NULL,2,1,'2013-08-17 16:27:25',13,1),(140,64,45,17290,17110,16000,0,0,1080,0,200,NULL,NULL,10,180,7,2013,'',2,1,'2013-08-17 16:27:25',13,1),(139,61,42,17100,17100,16000,0,0,900,0,200,NULL,NULL,0,0,7,2013,'',2,1,'2013-08-17 16:27:25',13,1),(136,55,36,15380,16280,15000,0,0,180,0,200,NULL,NULL,0,-900,7,2013,'33333',2,9,'2013-08-17 16:12:03',13,1),(143,59,40,16357,17000,16000,0,0,180,0,200,NULL,NULL,-23,-643,7,2013,NULL,2,1,'2013-08-17 16:27:25',13,1),(144,62,43,37258,18000,16000,0,1677,1170,0,200,NULL,NULL,18211,19258,7,2013,NULL,2,1,'2013-08-17 16:27:25',13,1),(145,63,44,48804,15100,15000,0,2998,900,0,200,NULL,NULL,29706,33704,7,2013,NULL,2,1,'2013-08-17 16:27:25',13,1),(146,65,46,17264,17535,15000,0,0,450,0,200,NULL,NULL,1614,-271,7,2013,NULL,2,1,'2013-08-17 16:27:25',13,1),(147,60,41,34086,16500,16000,0,0,360,0,200,NULL,NULL,17526,17586,7,2013,NULL,2,1,'2013-08-17 16:27:25',13,1),(148,56,37,28103,20000,15000,0,1595,720,0,200,NULL,NULL,10588,8103,7,2013,NULL,2,1,'2013-08-17 16:27:25',13,1),(149,54,35,15091,0,11000,0,1290,1080,0,200,NULL,NULL,1521,15091,7,2013,NULL,2,1,'2013-08-17 16:27:25',13,1);
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
  `penalties_day_2` int(5) DEFAULT NULL,
  `penalties_2` int(5) DEFAULT NULL,
  `penalties_day_3` int(5) DEFAULT NULL,
  `penalties_3` int(5) DEFAULT NULL,
  `penalties_day_4` int(5) DEFAULT NULL,
  `penalties_4` int(5) DEFAULT NULL,
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
) ENGINE=MyISAM AUTO_INCREMENT=24 DEFAULT CHARSET=latin1 COMMENT='latin1_swedish_ci';
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `property_details`
--

LOCK TABLES `property_details` WRITE;
/*!40000 ALTER TABLE `property_details` DISABLE KEYS */;
INSERT INTO `property_details` VALUES (23,'Kasarani 42','Kasarani','Nairobi','Paul Kamau Waweru','0722111111',1,'','','','','e-Kodi-23',0,5,0,0,0,0,0,0,0,'2013-08-17 15:37:10',8,2013,'email@email.com',90,'No','','','Residential',13,1,0),(22,'Kasarani 15','Kasarani','Kiambu','Paul Kamau Waweru','0722111111',1,'','','','','e-Kodi-22',0,5,10,0,0,0,0,0,0,'2013-08-17 15:20:27',8,2013,'email@email.com',50,'No','','','Residential',13,1,0);
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
  `deposit` varchar(50) DEFAULT NULL,
  `rent` varchar(50) DEFAULT NULL,
  `service_charge` varchar(50) DEFAULT NULL,
  `parking_fee` varchar(50) DEFAULT NULL,
  `garbage_fee` varchar(50) DEFAULT NULL,
  `deposit_paid` int(5) DEFAULT '0',
  `tenant` int(5) DEFAULT '0',
  `transactiontime` datetime DEFAULT NULL,
  `property_month` int(11) DEFAULT NULL,
  `property_year` int(11) DEFAULT NULL,
  `unit_type` varchar(15) DEFAULT NULL,
  `UID` int(10) DEFAULT NULL,
  `list` int(5) DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=66 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `property_item`
--

LOCK TABLES `property_item` WRITE;
/*!40000 ALTER TABLE `property_item` DISABLE KEYS */;
INSERT INTO `property_item` VALUES (36,22,'A0','','11000','13500','','','350',0,0,'2013-08-17 15:22:34',8,2013,'',1,0),(37,22,'A1','','10000','7500','','','150',0,0,'2013-08-17 15:23:33',8,2013,'',1,0),(38,22,'A2','','8500','8500','','','350',0,0,'2013-08-17 15:24:08',8,2013,'',1,0),(39,22,'A3','','7500','6500','','','350',0,0,'2013-08-17 15:24:57',8,2013,'',1,0),(40,22,'A4','','7000','6500','','','350',0,0,'2013-08-17 15:25:24',8,2013,'',1,0),(41,22,'A5','','7500','6500','','','350',0,0,'2013-08-17 15:25:58',8,2013,'',1,0),(42,22,'A6','','8500','6500','','','350',0,0,'2013-08-17 15:26:30',8,2013,'',1,0),(43,22,'A7','','8500','6500','','','350',0,0,'2013-08-17 15:26:59',8,2013,'',1,0),(44,22,'A8','','8500','6500','','','350',0,0,'2013-08-17 15:28:39',8,2013,'',1,0),(45,22,'A9','','8500','6500','','','350',0,0,'2013-08-17 15:29:03',8,2013,'',1,0),(46,22,'A10','','7500','6500','','','350',0,0,'2013-08-17 15:29:22',8,2013,'',1,0),(47,22,'A11','','7500','6500','','','350',0,0,'2013-08-17 15:29:42',8,2013,'',1,0),(48,22,'A12','','7500','6500','','','350',0,0,'2013-08-17 15:30:03',8,2013,'',1,0),(49,22,'A13','','9500','7500','','','350',0,0,'2013-08-17 15:31:05',8,2013,'',1,0),(50,22,'A14','','11000','8000','','','350',0,0,'2013-08-17 15:31:30',8,2013,'',1,0),(51,22,'A15','','5500','3500','','','150',0,0,'2013-08-17 15:32:00',8,2013,'',1,0),(52,22,'A16','','11500','8500','','','350',0,0,'2013-08-17 15:32:36',8,2013,'',1,0),(53,22,'A17','','11000','8500','','','350',0,0,'2013-08-17 15:33:17',8,2013,'',1,0),(54,23,'House No. 01','','12500','11000','','','200',1,35,'2013-08-17 15:37:41',8,2013,'',1,0),(55,23,'House No. 02','','17000','15000','','','200',1,36,'2013-08-17 15:38:05',8,2013,'',1,0),(56,23,'House No. 03','','13000','15000','','','200',1,37,'2013-08-17 15:38:28',8,2013,'',1,0),(57,23,'House No. 04','','15000','15000','','','200',1,38,'2013-08-17 15:39:08',8,2013,'',1,0),(58,23,'House No. 05','','17500','15000','','','200',1,39,'2013-08-17 15:39:31',8,2013,'',1,0),(59,23,'House No. 06','','18500','16000','','','200',1,40,'2013-08-17 15:40:23',8,2013,'',1,0),(60,23,'House No. 07','','18500','1600','','','200',1,41,'2013-08-17 15:40:56',8,2013,'',1,0),(61,23,'House No. 08','','18500','16000','','','200',1,42,'2013-08-17 15:41:26',8,2013,'',1,0),(62,23,'House No. 09','','18500','16000','','','200',1,43,'2013-08-17 15:41:54',8,2013,'',1,0),(63,23,'House No. 10','','14500','1500','','','200',1,44,'2013-08-17 15:42:20',8,2013,'',1,0),(64,23,'House No. 11','','18500','16000','','','200',1,45,'2013-08-17 15:42:52',8,2013,'',1,0),(65,23,'House No. 12','','15000','1500','','','200',1,46,'2013-08-17 15:43:17',8,2013,'',1,0);
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
  `pin_number` varchar(50) DEFAULT NULL,
  `vat_number` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=14 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `property_managers`
--

LOCK TABLES `property_managers` WRITE;
/*!40000 ALTER TABLE `property_managers` DISABLE KEYS */;
INSERT INTO `property_managers` VALUES (1,'e-Kodi-PM-0001','Name','None','Nairobi','+254721100342','kaguius@gmail.com',20,12,2012,'','','','','2012-12-06 21:27:16',NULL,NULL,NULL,NULL),(3,'e-Kodi-PM-003','Blacksands Logistics Ltd','Mombasa','Mombasa','+254721100342','andrew.kibe@blacksands.biz',20,12,2012,'','','','','2012-12-07 13:35:13',1,NULL,'P000591181R','0183076V'),(8,'e-Kodi-PM-04','Clyde Systems Ltd',NULL,'Nairobi','+254721100342','akibe@wenyebiashara.biz',NULL,12,2012,'','','','','2012-12-26 12:35:56',NULL,1,NULL,NULL),(9,'e-Kodi-PM-9','Clyde Systems Ltd',NULL,'Nairobi','+254704469814','akibe@e-kodi.com',NULL,2,2013,NULL,NULL,NULL,NULL,'2013-02-21 15:45:16',NULL,NULL,NULL,NULL),(11,'e-Kodi-PM-10','Digit Ltd',NULL,'Nairobi','+254721100342','punchizi@yahoo.com',NULL,4,2013,NULL,NULL,NULL,NULL,'2013-04-05 11:33:50',NULL,1,NULL,NULL),(12,'e-Kodi-PM-12','Kipsang Ltd',NULL,'Nakuru','+254721100342','kipsang@kip.com',NULL,5,2013,NULL,NULL,NULL,NULL,'2013-05-10 11:53:13',NULL,1,NULL,NULL),(13,'e-Kodi-PM-13','Paul Kamau Waweru','Ruiru','Kiambu','+254722893171','waweru57@yahoo.com',0,8,2013,'','','','','2013-08-17 15:15:44',1,NULL,'None','None');
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
  `unit_id` int(10) DEFAULT NULL,
  `tenant_id` int(10) DEFAULT NULL,
  `amount` float DEFAULT NULL,
  `payments` float DEFAULT NULL,
  `remmitance_month` int(5) DEFAULT NULL,
  `payment_type` int(5) DEFAULT NULL,
  `remmitance_year` int(5) DEFAULT NULL,
  `manager_id` int(5) DEFAULT NULL,
  `UID` int(5) DEFAULT NULL,
  `trans_id` varchar(100) DEFAULT NULL,
  `transactiontime` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=32 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `property_owner_remittances`
--

LOCK TABLES `property_owner_remittances` WRITE;
/*!40000 ALTER TABLE `property_owner_remittances` DISABLE KEYS */;
INSERT INTO `property_owner_remittances` VALUES (15,NULL,33,33,12397,NULL,8,3,2013,3,1,'GH445F','2013-08-17 14:38:20'),(21,23,59,40,17000,NULL,7,1,2013,13,1,NULL,'2013-08-17 16:27:25'),(22,23,64,45,17110,NULL,7,1,2013,13,1,NULL,'2013-08-17 16:27:25'),(23,23,62,43,18000,NULL,7,1,2013,13,1,NULL,'2013-08-17 16:27:25'),(24,23,58,39,16500,NULL,7,1,2013,13,1,NULL,'2013-08-17 16:27:25'),(25,23,57,38,16000,NULL,7,1,2013,13,1,NULL,'2013-08-17 16:27:25'),(26,23,56,46,17535,NULL,7,1,2013,13,1,NULL,'2013-08-17 16:27:25'),(27,23,63,44,15100,NULL,7,1,2013,13,1,NULL,'2013-08-17 16:27:25'),(28,23,60,41,16500,NULL,7,1,2013,13,1,NULL,'2013-08-17 16:27:25'),(29,23,55,36,16280,NULL,7,1,2013,13,1,NULL,'2013-08-17 16:27:25'),(30,23,61,42,17100,NULL,7,1,2013,13,1,NULL,'2013-08-17 16:27:25'),(31,23,56,37,20000,NULL,7,1,2013,13,1,NULL,'2013-08-17 16:27:25');
/*!40000 ALTER TABLE `property_owner_remittances` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `property_type`
--

DROP TABLE IF EXISTS `property_type`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `property_type` (
  `id` int(5) NOT NULL AUTO_INCREMENT,
  `property_type` varchar(150) DEFAULT NULL,
  `manager_id` int(5) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `property_type`
--

LOCK TABLES `property_type` WRITE;
/*!40000 ALTER TABLE `property_type` DISABLE KEYS */;
INSERT INTO `property_type` VALUES (1,'Kindergatten',NULL),(2,'Shop',NULL),(3,'Bed Sitter',NULL),(4,'1BR',NULL),(5,'2BR',NULL),(6,'3BR',NULL),(7,'4BR',NULL),(8,'5BR',NULL),(9,'Holiday Home',NULL);
/*!40000 ALTER TABLE `property_type` ENABLE KEYS */;
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
  `repair_cost` float DEFAULT '0',
  `justification` longtext,
  `payment` int(5) DEFAULT NULL,
  `repair_category` int(5) DEFAULT '1',
  `repair_month` int(5) DEFAULT NULL,
  `repair_year` int(5) DEFAULT NULL,
  `UID` int(5) DEFAULT NULL,
  `transactiontime` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=10 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `repairs_table`
--

LOCK TABLES `repairs_table` WRITE;
/*!40000 ALTER TABLE `repairs_table` DISABLE KEYS */;
INSERT INTO `repairs_table` VALUES (1,5,14,'Glass Door',1500,'Was bought at blah blah coz of blah blah',NULL,1,9,2012,1,'2012-09-19 13:28:56'),(2,5,14,'Leaky faucet',150,'The faucet was leaking and thus bought a new one to replace it.',NULL,1,9,2012,1,'2012-09-20 12:19:33'),(3,5,14,'Missing Shower Head',250,'Stolen and thus had to buy.',NULL,1,9,2012,1,'2012-09-20 12:38:38'),(4,5,14,'Shower Door',500,'Broken in half, had to repair.',NULL,1,11,2012,1,'2012-11-15 12:50:21'),(5,6,17,'Lawn Faucet',1000,'cacascas',1,1,12,2012,29,'2012-12-29 13:33:24'),(6,6,30,'Door Handle',200,'Broken when previous tenent was moving out, Mr John.',1,1,12,2012,29,'2012-12-29 13:43:40'),(7,6,17,'Lawn Faucet',1500,'jcfh',2,1,12,2012,29,'2012-12-30 01:07:08'),(9,6,17,'Faucet',500,'Repair lawn faucet',2,2,4,2013,39,'2013-04-29 15:18:17');
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
) ENGINE=MyISAM AUTO_INCREMENT=88 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tenant_checklist`
--

LOCK TABLES `tenant_checklist` WRITE;
/*!40000 ALTER TABLE `tenant_checklist` DISABLE KEYS */;
INSERT INTO `tenant_checklist` VALUES (2,6,18,31,82,'OK','Ok',0,'','',3,29,12,2012,3,2013,1,'2012-12-29 21:20:53'),(3,6,18,31,83,'OK','Ok',0,'','',3,29,12,2012,3,2013,1,'2012-12-29 21:20:53'),(4,6,18,31,84,'OK','Ok',0,'','',3,29,12,2012,3,2013,1,'2012-12-29 21:20:53'),(5,6,18,31,85,'OK','Ok',0,'','',3,29,12,2012,3,2013,1,'2012-12-29 21:20:53'),(6,6,18,31,86,'OK','Fine',0,'','',3,29,12,2012,3,2013,1,'2012-12-29 21:20:53'),(7,6,18,31,87,'OK','Fine',0,'','',3,29,12,2012,3,2013,1,'2012-12-29 21:20:53'),(8,6,18,31,88,'OK','Fine',0,'','',3,29,12,2012,3,2013,1,'2012-12-29 21:20:53'),(9,6,18,31,89,'OK','Fine',0,'','',3,29,12,2012,3,2013,1,'2012-12-29 21:20:53'),(10,6,18,31,90,'OK','Fine',0,'','',3,29,12,2012,3,2013,1,'2012-12-29 21:20:53'),(11,6,18,31,91,'OK','Fine',0,'','',3,29,12,2012,3,2013,1,'2012-12-29 21:20:53'),(12,6,18,31,92,'OK','Fine',0,'','',3,29,12,2012,3,2013,1,'2012-12-29 21:20:53'),(13,6,18,31,93,'OK','Fine',0,'','',3,29,12,2012,3,2013,1,'2012-12-29 21:20:53'),(14,6,18,31,94,'OK','Fine',0,'OK','',3,29,12,2012,3,2013,1,'2012-12-29 21:20:53'),(15,6,18,31,95,'OK','Fine',0,'OK','',3,29,12,2012,3,2013,1,'2012-12-29 21:20:53'),(16,6,18,31,96,'OK','Fine',0,'OK','',3,29,12,2012,3,2013,1,'2012-12-29 21:20:53'),(17,6,18,31,97,'OK','Fine',0,'OK','',3,29,12,2012,3,2013,1,'2012-12-29 21:20:53'),(18,6,18,31,146,'OK','Fine',0,'Ok','',3,29,12,2012,3,2013,1,'2012-12-29 22:42:22'),(19,6,18,31,147,'OK','Fine',0,'OK','',3,29,12,2012,3,2013,1,'2012-12-29 22:42:22'),(20,6,18,31,144,'OK','Ok',0,'OK','',3,29,12,2012,3,2013,1,'2012-12-29 22:43:51'),(21,6,18,31,145,'OK','Ok',0,'OK','',3,29,12,2012,3,2013,1,'2012-12-29 22:43:51'),(22,6,18,31,133,'Ok','Ok',0,'Ok','',3,29,12,2012,3,2013,1,'2012-12-29 22:44:39'),(23,6,17,32,82,'Fine',NULL,0,'',NULL,0,1,3,2013,NULL,NULL,NULL,'2013-03-13 13:11:43'),(24,6,17,32,83,'Fine',NULL,0,'',NULL,0,1,3,2013,NULL,NULL,NULL,'2013-03-13 13:11:43'),(25,6,17,32,84,'Fine',NULL,0,'',NULL,0,1,3,2013,NULL,NULL,NULL,'2013-03-13 13:11:43'),(26,6,17,32,85,'Fine',NULL,0,'',NULL,0,1,3,2013,NULL,NULL,NULL,'2013-03-13 13:11:43'),(27,6,17,32,86,'Fine',NULL,0,'',NULL,0,1,3,2013,NULL,NULL,NULL,'2013-03-13 13:11:43'),(28,6,17,32,87,'Fine',NULL,0,'',NULL,0,1,3,2013,NULL,NULL,NULL,'2013-03-13 13:11:43'),(29,6,17,32,88,'Fine',NULL,0,'',NULL,0,1,3,2013,NULL,NULL,NULL,'2013-03-13 13:11:43'),(30,6,17,32,89,'Fine',NULL,0,'',NULL,0,1,3,2013,NULL,NULL,NULL,'2013-03-13 13:11:43'),(31,6,17,32,90,'Fine',NULL,0,'',NULL,0,1,3,2013,NULL,NULL,NULL,'2013-03-13 13:11:43'),(32,6,17,32,91,'Fine',NULL,0,'',NULL,0,1,3,2013,NULL,NULL,NULL,'2013-03-13 13:11:43'),(33,6,17,32,92,'Fine',NULL,0,'',NULL,0,1,3,2013,NULL,NULL,NULL,'2013-03-13 13:11:43'),(34,6,17,32,93,'Fine',NULL,0,'',NULL,0,1,3,2013,NULL,NULL,NULL,'2013-03-13 13:11:43'),(35,6,17,32,94,'Fine',NULL,0,'',NULL,0,1,3,2013,NULL,NULL,NULL,'2013-03-13 13:11:43'),(36,6,17,32,95,'Fine',NULL,0,'',NULL,0,1,3,2013,NULL,NULL,NULL,'2013-03-13 13:11:43'),(37,6,17,32,96,'Fine',NULL,0,'',NULL,0,1,3,2013,NULL,NULL,NULL,'2013-03-13 13:11:43'),(38,6,17,32,97,'Fine',NULL,0,'',NULL,0,1,3,2013,NULL,NULL,NULL,'2013-03-13 13:11:43'),(39,6,17,32,98,'Fine',NULL,0,'',NULL,0,1,3,2013,NULL,NULL,NULL,'2013-03-13 13:11:43'),(40,6,17,32,99,'Fine',NULL,0,'',NULL,0,1,3,2013,NULL,NULL,NULL,'2013-03-13 13:11:43'),(41,6,17,32,100,'Fine',NULL,0,'',NULL,0,1,3,2013,NULL,NULL,NULL,'2013-03-13 13:11:43'),(42,6,17,32,101,'Fine',NULL,0,'',NULL,0,1,3,2013,NULL,NULL,NULL,'2013-03-13 13:11:43'),(43,6,17,32,102,'Fine',NULL,0,'',NULL,0,1,3,2013,NULL,NULL,NULL,'2013-03-13 13:11:43'),(44,6,17,32,103,'Fine',NULL,0,'',NULL,0,1,3,2013,NULL,NULL,NULL,'2013-03-13 13:11:43'),(45,6,17,32,104,'Fine',NULL,0,'',NULL,0,1,3,2013,NULL,NULL,NULL,'2013-03-13 13:11:43'),(46,6,17,32,105,'Fine',NULL,0,'',NULL,0,1,3,2013,NULL,NULL,NULL,'2013-03-13 13:11:43'),(47,6,17,32,106,'Fine',NULL,0,'',NULL,0,1,3,2013,NULL,NULL,NULL,'2013-03-13 13:11:43'),(48,6,17,32,107,'Fine',NULL,0,'',NULL,0,1,3,2013,NULL,NULL,NULL,'2013-03-13 13:11:43'),(49,6,17,32,108,'Fine',NULL,0,'',NULL,0,1,3,2013,NULL,NULL,NULL,'2013-03-13 13:11:43'),(50,6,17,32,109,'Fine',NULL,0,'',NULL,0,1,3,2013,NULL,NULL,NULL,'2013-03-13 13:11:43'),(51,6,17,32,110,'Fine',NULL,0,'',NULL,0,1,3,2013,NULL,NULL,NULL,'2013-03-13 13:11:43'),(52,6,17,32,112,'Fine',NULL,0,'',NULL,0,1,3,2013,NULL,NULL,NULL,'2013-03-13 13:11:43'),(53,6,17,32,113,'Fine',NULL,0,'',NULL,0,1,3,2013,NULL,NULL,NULL,'2013-03-13 13:11:43'),(54,6,17,32,114,'Fine',NULL,0,'',NULL,0,1,3,2013,NULL,NULL,NULL,'2013-03-13 13:11:43'),(55,6,17,32,115,'Fine',NULL,0,'',NULL,0,1,3,2013,NULL,NULL,NULL,'2013-03-13 13:11:43'),(56,6,17,32,116,'Fine',NULL,0,'',NULL,0,1,3,2013,NULL,NULL,NULL,'2013-03-13 13:11:43'),(57,6,17,32,117,'Fine',NULL,0,'',NULL,0,1,3,2013,NULL,NULL,NULL,'2013-03-13 13:11:43'),(58,6,17,32,118,'Fine',NULL,0,'',NULL,0,1,3,2013,NULL,NULL,NULL,'2013-03-13 13:11:43'),(59,6,17,32,119,'Fine',NULL,0,'',NULL,0,1,3,2013,NULL,NULL,NULL,'2013-03-13 13:11:43'),(60,6,17,32,120,'Fine',NULL,0,'',NULL,0,1,3,2013,NULL,NULL,NULL,'2013-03-13 13:11:43'),(61,6,17,32,121,'Fine',NULL,0,'',NULL,0,1,3,2013,NULL,NULL,NULL,'2013-03-13 13:11:43'),(62,6,17,32,122,'Fine',NULL,0,'',NULL,0,1,3,2013,NULL,NULL,NULL,'2013-03-13 13:11:43'),(63,6,17,32,123,'Fine',NULL,0,'',NULL,0,1,3,2013,NULL,NULL,NULL,'2013-03-13 13:11:43'),(64,6,17,32,124,'Fine',NULL,0,'',NULL,0,1,3,2013,NULL,NULL,NULL,'2013-03-13 13:11:43'),(65,6,17,32,125,'Fine',NULL,0,'',NULL,0,1,3,2013,NULL,NULL,NULL,'2013-03-13 13:11:43'),(66,6,17,32,126,'Fine',NULL,0,'',NULL,0,1,3,2013,NULL,NULL,NULL,'2013-03-13 13:11:43'),(67,6,17,32,127,'Fine',NULL,0,'',NULL,0,1,3,2013,NULL,NULL,NULL,'2013-03-13 13:11:43'),(68,6,17,32,128,'Fine',NULL,0,'',NULL,0,1,3,2013,NULL,NULL,NULL,'2013-03-13 13:11:43'),(69,6,17,32,129,'Fine',NULL,0,'',NULL,0,1,3,2013,NULL,NULL,NULL,'2013-03-13 13:11:43'),(70,6,17,32,130,'Fine',NULL,0,'',NULL,0,1,3,2013,NULL,NULL,NULL,'2013-03-13 13:11:43'),(71,6,17,32,131,'Fine',NULL,0,'',NULL,0,1,3,2013,NULL,NULL,NULL,'2013-03-13 13:11:43'),(72,6,17,32,132,'Fine',NULL,0,'',NULL,0,1,3,2013,NULL,NULL,NULL,'2013-03-13 13:11:43'),(73,6,17,32,133,'Fine',NULL,0,'',NULL,0,1,3,2013,NULL,NULL,NULL,'2013-03-13 13:11:43'),(74,6,17,32,134,'Fine',NULL,0,'',NULL,0,1,3,2013,NULL,NULL,NULL,'2013-03-13 13:11:43'),(75,6,17,32,135,'Fine',NULL,0,'',NULL,0,1,3,2013,NULL,NULL,NULL,'2013-03-13 13:11:43'),(76,6,17,32,136,'Fine',NULL,0,'',NULL,0,1,3,2013,NULL,NULL,NULL,'2013-03-13 13:11:43'),(77,6,17,32,137,'Fine',NULL,0,'',NULL,0,1,3,2013,NULL,NULL,NULL,'2013-03-13 13:11:43'),(78,6,17,32,138,'Fine',NULL,0,'',NULL,0,1,3,2013,NULL,NULL,NULL,'2013-03-13 13:11:43'),(79,6,17,32,139,'Fine',NULL,0,'',NULL,0,1,3,2013,NULL,NULL,NULL,'2013-03-13 13:11:43'),(80,6,17,32,140,'Fine',NULL,0,'',NULL,0,1,3,2013,NULL,NULL,NULL,'2013-03-13 13:11:43'),(81,6,17,32,141,'Fine',NULL,0,'',NULL,0,1,3,2013,NULL,NULL,NULL,'2013-03-13 13:11:43'),(82,6,17,32,142,'Fine',NULL,0,'',NULL,0,1,3,2013,NULL,NULL,NULL,'2013-03-13 13:11:43'),(83,6,17,32,143,'Fine',NULL,0,'',NULL,0,1,3,2013,NULL,NULL,NULL,'2013-03-13 13:11:43'),(84,6,17,32,144,'Fine',NULL,0,'',NULL,0,1,3,2013,NULL,NULL,NULL,'2013-03-13 13:11:43'),(85,6,17,32,145,'Fine',NULL,0,'',NULL,0,1,3,2013,NULL,NULL,NULL,'2013-03-13 13:11:43'),(86,6,17,32,146,'Fine',NULL,0,'',NULL,0,1,3,2013,NULL,NULL,NULL,'2013-03-13 13:11:43'),(87,6,17,32,147,'Fine',NULL,0,'',NULL,0,1,3,2013,NULL,NULL,NULL,'2013-03-13 13:11:43');
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
INSERT INTO `tenant_status` VALUES (1,'In-House'),(2,'Vacated'),(3,'Evicted due to Defaulting');
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
  `lease_start_date` date DEFAULT NULL,
  `lease_end_date` date DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=47 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tenants`
--

LOCK TABLES `tenants` WRITE;
/*!40000 ALTER TABLE `tenants` DISABLE KEYS */;
INSERT INTO `tenants` VALUES (1,'eKodi-0001',5,15,'Amani Mwadime','P.O. Box 45222','0721100342','n/a','Mwadime Junior','None',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,1,'2012-07-20 06:27:11',3,NULL,NULL,NULL),(2,'eKodi-0002',6,17,'James Mwangi','P.O. Box 42008 00100 Nbi','+254721100342','kaguius@gmail.com','Mwangi Irungu','+254704469814',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,2,'2012-08-03 10:55:19',3,NULL,NULL,NULL),(3,'eKodi-0003',6,18,'Alice Muiruri','P.O. Box 451236 01000 Thika','+254789456123','n/a','n/a','n/a',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,2,'2012-08-03 10:59:38',3,NULL,NULL,NULL),(30,'eKodi-00030',8,27,'Carolyne Alana','None','+254711239584','carolyqty@gmail.com','None','None',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,1,'2012-12-07 20:44:05',3,NULL,NULL,NULL),(29,'eKodi-00029',8,26,'Joseph Kibe','None','+254721100342','punchizi@yahoo.com','None','None',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,1,'2012-12-03 18:35:12',3,NULL,NULL,NULL),(31,'eKodi-00031',6,18,'KIbe Muigai','None','+254704469814','agnes2@agnes2.com','None','None',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,2,'2012-12-10 20:16:48',3,1,NULL,NULL),(32,'eKodi-00032',6,17,'Gilbert Kemboi','nadlk','+254721100342','kaguius@yahoo.com','None','None','NYBA','','','','','','','222222222',1,'2013-01-27 12:04:19',3,1,NULL,NULL),(33,'ClydeRMS-569-00033',21,33,'Jane Wambui Mbugua','None','0725864688','kaguius@gmail.com','None','None','None','None','','','','','','23049745',1,'2013-08-15 13:20:32',NULL,1,'2013-08-01','2013-08-31'),(34,'ClydeRMS-569-00034',21,34,'Robert Kipkirui','None','0725864688','kaguius@gmail.com','None','None','None','','','','','','','23049745',1,'2013-08-15 13:33:57',NULL,1,'2013-08-01','2013-08-31'),(35,'ClydeRMS-569-00035',23,54,'Jane Wambui Mbugua','','','','','','','','','','','','','',1,'2013-08-17 15:45:14',NULL,1,'1970-01-01','1970-01-01'),(36,'ClydeRMS-569-00036',23,55,'Robert Kipkirui','','','','','','','','','','','','','',1,'2013-08-17 15:47:45',NULL,1,'1970-01-01','1970-01-01'),(37,'ClydeRMS-569-00037',23,56,'Susan Wanjala','','','','','','','','','','','','','',1,'2013-08-17 15:48:03',NULL,1,'1970-01-01','1970-01-01'),(38,'ClydeRMS-569-00038',23,57,'Mathew Toitoek','','','','','','','','','','','','','',1,'2013-08-17 15:48:20',NULL,1,'1970-01-01','1970-01-01'),(39,'ClydeRMS-569-00039',23,58,'Jonah Gathama Wachira','','','','','','','','','','','','','',1,'2013-08-17 15:48:39',NULL,1,'1970-01-01','1970-01-01'),(40,'ClydeRMS-569-00040',23,59,'Chirles Ouma','','','','','','','','','','','','','',1,'2013-08-17 15:49:00',NULL,1,'1970-01-01','1970-01-01'),(41,'ClydeRMS-569-00041',23,60,'Phebeans O Weya','','','','','','','','','','','','','',1,'2013-08-17 15:49:30',NULL,1,'1970-01-01','1970-01-01'),(42,'ClydeRMS-569-00042',23,61,'Rosalind Nyaga','','','','','','','','','','','','','',1,'2013-08-17 15:50:09',NULL,1,'1970-01-01','1970-01-01'),(43,'ClydeRMS-569-00043',23,62,'Emilly Wairimu Ndegwa','','','','','','','','','','','','','',1,'2013-08-17 15:50:30',NULL,1,'1970-01-01','1970-01-01'),(44,'ClydeRMS-569-00044',23,63,'Peter Kibiwott','','','','','','','','','','','','','',1,'2013-08-17 15:50:46',NULL,1,'1970-01-01','1970-01-01'),(45,'ClydeRMS-569-00045',23,64,'Elizabeth Wangari','','','','','','','','','','','','','',1,'2013-08-17 15:51:08',NULL,1,'1970-01-01','1970-01-01'),(46,'ClydeRMS-569-00046',23,65,'Patrick Kanyi','','','','','','','','','','','','','',1,'2013-08-17 15:51:45',NULL,1,'1970-01-01','1970-01-01');
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
  `owner` varchar(150) DEFAULT NULL,
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
) ENGINE=MyISAM AUTO_INCREMENT=262 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `user_logs`
--

LOCK TABLES `user_logs` WRITE;
/*!40000 ALTER TABLE `user_logs` DISABLE KEYS */;
INSERT INTO `user_logs` VALUES (1,'kaguius@gmail.com',1,'2012-12-03 17:16:47','127.0.0.1','Mozilla/5.0 (X11; Ubuntu; Linux i686; rv:17.0) Gecko/17.0 Firefox/17.0','','','',''),(2,'punchizi@yahoo.com',27,'2012-12-07 21:06:05','127.0.0.1','Mozilla/5.0 (X11; Linux i686) AppleWebKit/537.11 (KHTML, like Gecko) Chrome/23.0.1271.91 Safari/537.11','','','',''),(3,'punchizi@yahoo.com',27,'2012-12-07 21:12:08','127.0.0.1','Mozilla/5.0 (X11; Linux i686) AppleWebKit/537.11 (KHTML, like Gecko) Chrome/23.0.1271.91 Safari/537.11','','','',''),(4,'kaguius@gmail.com',1,'2012-12-07 22:32:20','127.0.0.1','Mozilla/5.0 (X11; Ubuntu; Linux i686; rv:17.0) Gecko/17.0 Firefox/17.0','','','',''),(5,'kaguius@gmail.com',1,'2012-12-06 19:27:29','127.0.0.1','Mozilla/5.0 (X11; Ubuntu; Linux i686; rv:17.0) Gecko/20100101 Firefox/17.0','','','',''),(6,'kaguius@gmail.com',1,'2012-12-07 12:58:48','127.0.0.1','Mozilla/5.0 (X11; Ubuntu; Linux i686; rv:17.0) Gecko/20100101 Firefox/17.0','','','',''),(7,'kaguius@gmail.com',1,'2012-12-07 16:09:27','127.0.0.1','Mozilla/5.0 (X11; Ubuntu; Linux i686; rv:17.0) Gecko/20100101 Firefox/17.0','','','',''),(8,'kaguius@gmail.com',1,'2012-12-07 16:38:59','127.0.0.1','Mozilla/5.0 (X11; Ubuntu; Linux i686; rv:17.0) Gecko/20100101 Firefox/17.0','','','',''),(9,'kaguius@gmail.com',1,'2012-12-07 16:39:48','127.0.0.1','Mozilla/5.0 (X11; Ubuntu; Linux i686; rv:17.0) Gecko/20100101 Firefox/17.0','','','',''),(10,'kaguius@gmail.com',1,'2012-12-07 16:40:16','127.0.0.1','Mozilla/5.0 (X11; Ubuntu; Linux i686; rv:17.0) Gecko/20100101 Firefox/17.0','','','',''),(11,'kaguius@gmail.com',1,'2012-12-07 16:43:07','127.0.0.1','Mozilla/5.0 (X11; Ubuntu; Linux i686; rv:17.0) Gecko/20100101 Firefox/17.0','','','',''),(12,'kaguius@gmail.com',1,'2012-12-07 16:44:42','127.0.0.1','Mozilla/5.0 (X11; Ubuntu; Linux i686; rv:17.0) Gecko/20100101 Firefox/17.0','','','',''),(13,'email@email.com',29,'2012-12-07 17:04:35','127.0.0.1','Mozilla/5.0 (X11; Ubuntu; Linux i686; rv:17.0) Gecko/20100101 Firefox/17.0','','','',''),(14,'email@email.com',29,'2012-12-07 17:05:40','127.0.0.1','Mozilla/5.0 (X11; Ubuntu; Linux i686; rv:17.0) Gecko/20100101 Firefox/17.0','','','',''),(15,'email@email.com',29,'2012-12-07 17:06:31','127.0.0.1','Mozilla/5.0 (X11; Ubuntu; Linux i686; rv:17.0) Gecko/20100101 Firefox/17.0','','','',''),(16,'email@email.com',29,'2012-12-07 17:08:36','127.0.0.1','Mozilla/5.0 (X11; Ubuntu; Linux i686; rv:17.0) Gecko/20100101 Firefox/17.0','','','',''),(17,'email@email.com',29,'2012-12-07 17:09:50','127.0.0.1','Mozilla/5.0 (X11; Ubuntu; Linux i686; rv:17.0) Gecko/20100101 Firefox/17.0','','','',''),(18,'email@email.com',29,'2012-12-07 17:11:04','127.0.0.1','Mozilla/5.0 (X11; Ubuntu; Linux i686; rv:17.0) Gecko/20100101 Firefox/17.0','','','',''),(19,'email@email.com',29,'2012-12-07 17:12:23','127.0.0.1','Mozilla/5.0 (X11; Ubuntu; Linux i686; rv:17.0) Gecko/20100101 Firefox/17.0','','','',''),(20,'kaguius@gmail.com',1,'2012-12-07 17:20:09','127.0.0.1','Mozilla/5.0 (X11; Ubuntu; Linux i686; rv:17.0) Gecko/20100101 Firefox/17.0','','','',''),(21,'kaguius@gmail.com',1,'2012-12-07 21:25:59','127.0.0.1','Mozilla/5.0 (X11; Ubuntu; Linux i686; rv:17.0) Gecko/20100101 Firefox/17.0','','','',''),(22,'kaguius@gmail.com',1,'2012-12-07 21:26:20','127.0.0.1','Mozilla/5.0 (X11; Ubuntu; Linux i686; rv:17.0) Gecko/20100101 Firefox/17.0','','','',''),(23,'punchizi@yahoo.com',27,'2012-12-07 22:00:58','127.0.0.1','Mozilla/5.0 (X11; Ubuntu; Linux i686; rv:17.0) Gecko/20100101 Firefox/17.0','','','',''),(24,'punchizi@yahoo.com',27,'2012-12-07 22:02:50','127.0.0.1','Mozilla/5.0 (X11; Ubuntu; Linux i686; rv:17.0) Gecko/20100101 Firefox/17.0','','','',''),(25,'punchizi@yahoo.com',27,'2012-12-07 22:03:52','127.0.0.1','Mozilla/5.0 (X11; Ubuntu; Linux i686; rv:17.0) Gecko/20100101 Firefox/17.0','','','',''),(26,'punchizi@yahoo.com',27,'2012-12-07 22:04:47','127.0.0.1','Mozilla/5.0 (X11; Ubuntu; Linux i686; rv:17.0) Gecko/20100101 Firefox/17.0','','','',''),(27,'kaguius@gmail.com',1,'0000-00-00 00:00:00','127.0.0.1','Mozilla/5.0 (X11; Ubuntu; Linux i686; rv:17.0) Gecko/20100101 Firefox/17.0','','','',''),(28,'kaguius@gmail.com',1,'0000-00-00 00:00:00','127.0.0.1','Mozilla/5.0 (X11; Ubuntu; Linux i686; rv:17.0) Gecko/20100101 Firefox/17.0','','','',''),(29,'kaguius@gmail.com',1,'2012-12-08 10:58:39','127.0.0.1','Mozilla/5.0 (X11; Ubuntu; Linux i686; rv:17.0) Gecko/20100101 Firefox/17.0','','','',''),(30,'email@email.com',29,'2012-12-08 11:12:07','127.0.0.1','Mozilla/5.0 (X11; Ubuntu; Linux i686; rv:17.0) Gecko/20100101 Firefox/17.0','','','',''),(31,'email@email.com',29,'2012-12-08 11:15:56','127.0.0.1','Mozilla/5.0 (X11; Ubuntu; Linux i686; rv:17.0) Gecko/20100101 Firefox/17.0','','','',''),(32,'kaguius@gmail.com',1,'2012-12-08 11:20:12','127.0.0.1','Mozilla/5.0 (X11; Ubuntu; Linux i686; rv:17.0) Gecko/20100101 Firefox/17.0','','','',''),(33,'email@email.com',29,'2012-12-08 11:34:01','127.0.0.1','Mozilla/5.0 (X11; Ubuntu; Linux i686; rv:17.0) Gecko/20100101 Firefox/17.0','','','',''),(34,'kaguius@gmail.com',1,'2012-12-08 11:34:44','127.0.0.1','Mozilla/5.0 (X11; Ubuntu; Linux i686; rv:17.0) Gecko/20100101 Firefox/17.0','','','',''),(35,'email@email.com',29,'2012-12-08 11:36:55','127.0.0.1','Mozilla/5.0 (X11; Ubuntu; Linux i686; rv:17.0) Gecko/20100101 Firefox/17.0','','','',''),(36,'email@email.com',29,'2012-12-08 11:42:00','127.0.0.1','Mozilla/5.0 (X11; Ubuntu; Linux i686; rv:17.0) Gecko/20100101 Firefox/17.0','','','',''),(37,'kaguius@gmail.com',1,'2012-12-08 11:45:28','127.0.0.1','Mozilla/5.0 (X11; Ubuntu; Linux i686; rv:17.0) Gecko/20100101 Firefox/17.0','','','',''),(38,'email@email.com',29,'2012-12-08 11:47:35','127.0.0.1','Mozilla/5.0 (X11; Ubuntu; Linux i686; rv:17.0) Gecko/20100101 Firefox/17.0','','','',''),(39,'kaguius@gmail.com',1,'2012-12-08 12:06:44','127.0.0.1','Mozilla/5.0 (X11; Ubuntu; Linux i686; rv:17.0) Gecko/20100101 Firefox/17.0','','','',''),(40,'email@email.com',29,'2012-12-08 12:07:06','127.0.0.1','Mozilla/5.0 (X11; Ubuntu; Linux i686; rv:17.0) Gecko/20100101 Firefox/17.0','','','',''),(41,'email@email.com',29,'2012-12-08 12:36:35','127.0.0.1','Mozilla/5.0 (X11; Ubuntu; Linux i686; rv:17.0) Gecko/20100101 Firefox/17.0','Nairobi','Kenya','-1.2830','36.8170'),(42,'kaguius@gmail.com',1,'2012-12-08 12:37:28','127.0.0.1','Mozilla/5.0 (X11; Ubuntu; Linux i686; rv:17.0) Gecko/20100101 Firefox/17.0','Nairobi','Kenya','-1.2830','36.8170'),(43,'kaguius@gmail.com',1,'2012-12-08 12:41:51','127.0.0.1','Mozilla/5.0 (X11; Ubuntu; Linux i686; rv:17.0) Gecko/20100101 Firefox/17.0','','','',''),(44,'email@email.com',29,'2012-12-08 12:44:12','127.0.0.1','Mozilla/5.0 (X11; Ubuntu; Linux i686; rv:17.0) Gecko/20100101 Firefox/17.0','','','',''),(45,'kaguius@gmail.com',1,'2012-12-08 14:59:20','127.0.0.1','Mozilla/5.0 (X11; Ubuntu; Linux i686; rv:17.0) Gecko/20100101 Firefox/17.0','','','',''),(46,'kaguius@gmail.com',1,'0000-00-00 00:00:00','127.0.0.1','Mozilla/5.0 (X11; Ubuntu; Linux i686; rv:17.0) Gecko/20100101 Firefox/17.0','','','',''),(47,'kaguius@gmail.com',1,'0000-00-00 00:00:00','127.0.0.1','Mozilla/5.0 (X11; Ubuntu; Linux i686; rv:17.0) Gecko/20100101 Firefox/17.0','','','',''),(48,'kaguius@gmail.com',1,'2012-12-09 12:57:24','127.0.0.1','Mozilla/5.0 (X11; Ubuntu; Linux i686; rv:17.0) Gecko/20100101 Firefox/17.0','','','',''),(49,'kaguius@gmail.com',1,'2012-12-10 11:30:03','127.0.0.1','Mozilla/5.0 (X11; Ubuntu; Linux i686; rv:17.0) Gecko/20100101 Firefox/17.0','','','',''),(50,'kaguius@gmail.com',1,'2012-12-10 12:12:14','127.0.0.1','Mozilla/5.0 (X11; Linux i686) AppleWebKit/537.11 (KHTML, like Gecko) Chrome/23.0.1271.95 Safari/537.11','','','',''),(51,'kaguius@gmail.com',1,'2012-12-10 12:12:51','127.0.0.1','Mozilla/5.0 (X11; Linux i686) AppleWebKit/537.11 (KHTML, like Gecko) Chrome/23.0.1271.95 Safari/537.11','','','',''),(52,'kaguius@gmail.com',1,'2012-12-10 12:13:10','127.0.0.1','Mozilla/5.0 (X11; Linux i686) AppleWebKit/537.11 (KHTML, like Gecko) Chrome/23.0.1271.95 Safari/537.11','','','',''),(53,'kaguius@gmail.com',1,'2012-12-10 12:48:54','127.0.0.1','Mozilla/5.0 (X11; Linux i686) AppleWebKit/537.11 (KHTML, like Gecko) Chrome/23.0.1271.95 Safari/537.11','','','',''),(54,'kaguius@gmail.com',1,'2012-12-10 12:49:10','127.0.0.1','Mozilla/5.0 (X11; Linux i686) AppleWebKit/537.11 (KHTML, like Gecko) Chrome/23.0.1271.95 Safari/537.11','','','',''),(55,'kaguius@gmail.com',1,'2012-12-10 12:50:35','127.0.0.1','Mozilla/5.0 (X11; Linux i686) AppleWebKit/537.11 (KHTML, like Gecko) Chrome/23.0.1271.95 Safari/537.11','','','',''),(56,'kaguius@gmail.com',1,'2012-12-10 12:51:10','127.0.0.1','Mozilla/5.0 (X11; Linux i686) AppleWebKit/537.11 (KHTML, like Gecko) Chrome/23.0.1271.95 Safari/537.11','','','',''),(57,'kaguius@gmail.com',1,'2012-12-10 12:52:04','127.0.0.1','Mozilla/5.0 (X11; Linux i686) AppleWebKit/537.11 (KHTML, like Gecko) Chrome/23.0.1271.95 Safari/537.11','','','',''),(58,'kaguius@gmail.com',1,'2012-12-10 12:53:34','127.0.0.1','Mozilla/5.0 (X11; Linux i686) AppleWebKit/537.11 (KHTML, like Gecko) Chrome/23.0.1271.95 Safari/537.11','','','',''),(59,'email@email.com',29,'2012-12-10 12:53:52','127.0.0.1','Mozilla/5.0 (X11; Linux i686) AppleWebKit/537.11 (KHTML, like Gecko) Chrome/23.0.1271.95 Safari/537.11','','','',''),(60,'kaguius@gmail.com',1,'2012-12-10 13:18:18','127.0.0.1','Mozilla/5.0 (X11; Linux i686) AppleWebKit/537.11 (KHTML, like Gecko) Chrome/23.0.1271.95 Safari/537.11','','','',''),(61,'email@email.com',29,'2012-12-10 13:38:20','127.0.0.1','Mozilla/5.0 (X11; Linux i686) AppleWebKit/537.11 (KHTML, like Gecko) Chrome/23.0.1271.95 Safari/537.11','','','',''),(62,'kaguius@gmail.com',1,'2012-12-10 15:56:19','127.0.0.1','Mozilla/5.0 (X11; Linux i686) AppleWebKit/537.11 (KHTML, like Gecko) Chrome/23.0.1271.95 Safari/537.11','','','',''),(63,'kaguius@gmail.com',1,'2012-12-10 19:18:54','127.0.0.1','Mozilla/5.0 (X11; Ubuntu; Linux i686; rv:17.0) Gecko/20100101 Firefox/17.0','','','',''),(64,'kaguius@gmail.com',1,'2012-12-10 20:00:16','127.0.0.1','Mozilla/5.0 (X11; Linux i686) AppleWebKit/537.11 (KHTML, like Gecko) Chrome/23.0.1271.95 Safari/537.11','','','',''),(65,'kaguius@gmail.com',1,'2012-12-10 20:40:11','127.0.0.1','Mozilla/5.0 (X11; Ubuntu; Linux i686; rv:17.0) Gecko/20100101 Firefox/17.0','','','',''),(66,'email@email.com',29,'2012-12-10 20:47:30','127.0.0.1','Mozilla/5.0 (X11; Linux i686) AppleWebKit/537.11 (KHTML, like Gecko) Chrome/23.0.1271.95 Safari/537.11','','','',''),(67,'email@email.com',29,'2012-12-10 20:48:01','127.0.0.1','Mozilla/5.0 (X11; Linux i686) AppleWebKit/537.11 (KHTML, like Gecko) Chrome/23.0.1271.95 Safari/537.11','','','',''),(68,'kaguius@gmail.com',1,'2012-12-10 21:59:26','127.0.0.1','Mozilla/5.0 (X11; Linux i686) AppleWebKit/537.11 (KHTML, like Gecko) Chrome/23.0.1271.95 Safari/537.11','','','',''),(69,'email@email.com',29,'2012-12-10 21:59:51','127.0.0.1','Mozilla/5.0 (X11; Linux i686) AppleWebKit/537.11 (KHTML, like Gecko) Chrome/23.0.1271.95 Safari/537.11','','','',''),(70,'kaguius@gmail.com',1,'2012-12-11 09:30:35','127.0.0.1','Mozilla/5.0 (X11; Linux i686) AppleWebKit/537.11 (KHTML, like Gecko) Chrome/23.0.1271.95 Safari/537.11','','','',''),(71,'kaguius@gmail.com',1,'2012-12-13 11:30:00','127.0.0.1','Mozilla/5.0 (X11; Ubuntu; Linux i686; rv:17.0) Gecko/20100101 Firefox/17.0','','','',''),(72,'kaguius@gmail.com',1,'2012-12-13 13:43:05','127.0.0.1','Mozilla/5.0 (X11; Ubuntu; Linux i686; rv:17.0) Gecko/20100101 Firefox/17.0','','','',''),(73,'kaguius@gmail.com',1,'2012-12-13 15:21:16','127.0.0.1','Mozilla/5.0 (X11; Ubuntu; Linux i686; rv:17.0) Gecko/20100101 Firefox/17.0','','','',''),(74,'kaguius@gmail.com',1,'2012-12-14 08:52:52','127.0.0.1','Mozilla/5.0 (X11; Linux i686) AppleWebKit/537.11 (KHTML, like Gecko) Chrome/23.0.1271.97 Safari/537.11','','','',''),(75,'kaguius@gmail.com',1,'2012-12-14 09:50:30','127.0.0.1','Mozilla/5.0 (X11; Linux i686) AppleWebKit/537.11 (KHTML, like Gecko) Chrome/23.0.1271.97 Safari/537.11','','','',''),(76,'yebne1@gmail.com',32,'2012-12-14 09:52:39','127.0.0.1','Mozilla/5.0 (X11; Linux i686) AppleWebKit/537.11 (KHTML, like Gecko) Chrome/23.0.1271.97 Safari/537.11','','','',''),(77,'email@email.com',29,'2012-12-14 10:08:02','127.0.0.1','Mozilla/5.0 (X11; Linux i686) AppleWebKit/537.11 (KHTML, like Gecko) Chrome/23.0.1271.97 Safari/537.11','','','',''),(78,'yebne1@gmail.com',32,'2012-12-14 10:08:46','127.0.0.1','Mozilla/5.0 (X11; Linux i686) AppleWebKit/537.11 (KHTML, like Gecko) Chrome/23.0.1271.97 Safari/537.11','','','',''),(79,'kaguius@gmail.com',1,'2012-12-14 11:57:15','127.0.0.1','Mozilla/5.0 (X11; Linux i686) AppleWebKit/537.11 (KHTML, like Gecko) Chrome/23.0.1271.97 Safari/537.11','','','',''),(80,'email@email.com',29,'2012-12-14 12:01:10','127.0.0.1','Mozilla/5.0 (X11; Linux i686) AppleWebKit/537.11 (KHTML, like Gecko) Chrome/23.0.1271.97 Safari/537.11','','','',''),(81,'yebne1@gmail.com',32,'2012-12-14 12:01:26','127.0.0.1','Mozilla/5.0 (X11; Linux i686) AppleWebKit/537.11 (KHTML, like Gecko) Chrome/23.0.1271.97 Safari/537.11','','','',''),(82,'email@email.com',29,'2012-12-14 12:46:32','127.0.0.1','Mozilla/5.0 (X11; Linux i686) AppleWebKit/537.11 (KHTML, like Gecko) Chrome/23.0.1271.97 Safari/537.11','','','',''),(83,'email@email.com',29,'2012-12-14 15:10:31','127.0.0.1','Mozilla/5.0 (X11; Ubuntu; Linux i686; rv:17.0) Gecko/20100101 Firefox/17.0','','','',''),(84,'email@email.com',29,'2012-12-14 16:54:55','127.0.0.1','Mozilla/5.0 (X11; Linux i686) AppleWebKit/537.11 (KHTML, like Gecko) Chrome/23.0.1271.97 Safari/537.11','','','',''),(85,'email@email.com',29,'2012-12-14 16:56:18','127.0.0.1','Mozilla/5.0 (X11; Ubuntu; Linux i686; rv:17.0) Gecko/20100101 Firefox/17.0','','','',''),(86,'email@email.com',29,'2012-12-14 21:09:11','127.0.0.1','Mozilla/5.0 (X11; Ubuntu; Linux i686; rv:17.0) Gecko/20100101 Firefox/17.0','','','',''),(87,'email@email.com',29,'2012-12-15 00:02:29','127.0.0.1','Mozilla/5.0 (X11; Ubuntu; Linux i686; rv:17.0) Gecko/20100101 Firefox/17.0','','','',''),(88,'agnes@agnes.com',30,'2012-12-15 03:13:40','127.0.0.1','Mozilla/5.0 (X11; Ubuntu; Linux i686; rv:17.0) Gecko/20100101 Firefox/17.0','','','',''),(89,'email@email.com',29,'2012-12-15 03:25:09','127.0.0.1','Mozilla/5.0 (X11; Ubuntu; Linux i686; rv:17.0) Gecko/20100101 Firefox/17.0','','','',''),(90,'email@email.com',29,'2012-12-15 11:08:54','127.0.0.1','Mozilla/5.0 (X11; Ubuntu; Linux i686; rv:17.0) Gecko/20100101 Firefox/17.0','','','',''),(91,'kaguius@gmail.com',1,'2012-12-15 11:24:04','127.0.0.1','Mozilla/5.0 (X11; Ubuntu; Linux i686; rv:17.0) Gecko/20100101 Firefox/17.0','','','',''),(92,'agnes@agnes.com',30,'2012-12-15 11:27:32','127.0.0.1','Mozilla/5.0 (X11; Ubuntu; Linux i686; rv:17.0) Gecko/20100101 Firefox/17.0','','','',''),(93,'agnes@agnes.com',30,'2012-12-15 12:32:47','127.0.0.1','Mozilla/5.0 (X11; Ubuntu; Linux i686; rv:17.0) Gecko/20100101 Firefox/17.0','','','',''),(94,'email@email.com',29,'2012-12-15 12:44:58','127.0.0.1','Mozilla/5.0 (X11; Ubuntu; Linux i686; rv:17.0) Gecko/20100101 Firefox/17.0','','','',''),(95,'agnes@agnes.com',30,'2012-12-15 14:01:35','127.0.0.1','Mozilla/5.0 (X11; Ubuntu; Linux i686; rv:17.0) Gecko/20100101 Firefox/17.0','','','',''),(96,'kaguius@gmail.com',1,'2012-12-16 17:55:24','127.0.0.1','Mozilla/5.0 (X11; Ubuntu; Linux i686; rv:17.0) Gecko/20100101 Firefox/17.0','','','',''),(97,'email@email.com',29,'2012-12-16 17:59:15','127.0.0.1','Mozilla/5.0 (X11; Ubuntu; Linux i686; rv:17.0) Gecko/20100101 Firefox/17.0','','','',''),(98,'agnes@agnes.com',30,'2012-12-16 18:08:05','127.0.0.1','Mozilla/5.0 (X11; Ubuntu; Linux i686; rv:17.0) Gecko/20100101 Firefox/17.0','','','',''),(99,'email@email.com',29,'2012-12-17 14:00:48','127.0.0.1','Mozilla/5.0 (X11; Ubuntu; Linux i686; rv:17.0) Gecko/20100101 Firefox/17.0','','','',''),(100,'kaguius@gmail.com',1,'2012-12-17 16:03:10','127.0.0.1','Mozilla/5.0 (X11; Ubuntu; Linux i686; rv:17.0) Gecko/20100101 Firefox/17.0','','','',''),(101,'kaguius@gmail.com',1,'2012-12-18 09:12:43','127.0.0.1','Mozilla/5.0 (X11; Ubuntu; Linux i686; rv:17.0) Gecko/20100101 Firefox/17.0','','','',''),(102,'kaguius@gmail.com',1,'2012-12-18 09:47:27','127.0.0.1','Mozilla/5.0 (X11; Ubuntu; Linux i686; rv:17.0) Gecko/20100101 Firefox/17.0','','','',''),(103,'email@email.com',29,'2012-12-18 10:56:33','127.0.0.1','Mozilla/5.0 (X11; Ubuntu; Linux i686; rv:17.0) Gecko/20100101 Firefox/17.0','','','',''),(104,'kaguius@gmail.com',1,'2012-12-18 11:35:57','127.0.0.1','Mozilla/5.0 (X11; Ubuntu; Linux i686; rv:17.0) Gecko/20100101 Firefox/17.0','','','',''),(105,'email@email.com',29,'2012-12-18 11:46:31','127.0.0.1','Mozilla/5.0 (X11; Ubuntu; Linux i686; rv:17.0) Gecko/20100101 Firefox/17.0','','','',''),(106,'email@email.com',29,'2012-12-18 12:19:51','127.0.0.1','Mozilla/5.0 (X11; Linux i686) AppleWebKit/537.11 (KHTML, like Gecko) Chrome/23.0.1271.97 Safari/537.11','','','',''),(107,'kaguius@gmail.com',1,'2012-12-18 12:21:24','127.0.0.1','Mozilla/5.0 (X11; Linux i686) AppleWebKit/537.11 (KHTML, like Gecko) Chrome/23.0.1271.97 Safari/537.11','','','',''),(108,'email@email.com',29,'2012-12-18 12:22:42','127.0.0.1','Mozilla/5.0 (X11; Linux i686) AppleWebKit/537.11 (KHTML, like Gecko) Chrome/23.0.1271.97 Safari/537.11','','','',''),(109,'kaguius@gmail.com',1,'2012-12-18 13:24:02','127.0.0.1','Mozilla/5.0 (X11; Ubuntu; Linux i686; rv:17.0) Gecko/20100101 Firefox/17.0','','','',''),(110,'agnes@agnes.com',30,'2012-12-18 13:52:55','127.0.0.1','Mozilla/5.0 (X11; Ubuntu; Linux i686; rv:17.0) Gecko/20100101 Firefox/17.0','','','',''),(111,'kaguius@gmail.com',1,'2012-12-18 15:23:33','127.0.0.1','Mozilla/5.0 (X11; Ubuntu; Linux i686; rv:17.0) Gecko/20100101 Firefox/17.0','','','',''),(112,'kaguius@gmail.com',1,'2012-12-18 16:30:22','127.0.0.1','Mozilla/5.0 (X11; Linux i686) AppleWebKit/537.11 (KHTML, like Gecko) Chrome/23.0.1271.97 Safari/537.11','','','',''),(113,'kaguius@gmail.com',1,'2012-12-18 17:27:17','127.0.0.1','Mozilla/5.0 (X11; Ubuntu; Linux i686; rv:17.0) Gecko/20100101 Firefox/17.0','','','',''),(114,'agnes@agnes.com',30,'2012-12-19 10:19:10','127.0.0.1','Mozilla/5.0 (X11; Ubuntu; Linux i686; rv:17.0) Gecko/20100101 Firefox/17.0','','','',''),(115,'kaguius@gmail.com',1,'2012-12-19 10:22:26','127.0.0.1','Mozilla/5.0 (X11; Ubuntu; Linux i686; rv:17.0) Gecko/20100101 Firefox/17.0','','','',''),(116,'kaguius@gmail.com',1,'2012-12-19 10:23:34','127.0.0.1','Mozilla/5.0 (X11; Ubuntu; Linux i686; rv:17.0) Gecko/20100101 Firefox/17.0','','','',''),(117,'kaguius@gmail.com',1,'2012-12-21 14:37:12','127.0.0.1','Mozilla/5.0 (X11; Ubuntu; Linux i686; rv:17.0) Gecko/20100101 Firefox/17.0','','','',''),(118,'kaguius@gmail.com',1,'2012-12-21 14:47:22','127.0.0.1','Mozilla/5.0 (X11; Ubuntu; Linux i686; rv:17.0) Gecko/20100101 Firefox/17.0','','','',''),(119,'kaguius@gmail.com',1,'2012-12-21 14:47:38','127.0.0.1','Mozilla/5.0 (X11; Ubuntu; Linux i686; rv:17.0) Gecko/20100101 Firefox/17.0','','','',''),(120,'kaguius@gmail.com',1,'2012-12-21 15:34:52','127.0.0.1','Mozilla/5.0 (X11; Ubuntu; Linux i686; rv:17.0) Gecko/20100101 Firefox/17.0','','','',''),(121,'kaguius@gmail.com',1,'2012-12-22 11:41:48','127.0.0.1','Mozilla/5.0 (X11; Ubuntu; Linux i686; rv:17.0) Gecko/20100101 Firefox/17.0','','','',''),(122,'agnes@agnes.com',30,'0000-00-00 00:00:00','127.0.0.1','Mozilla/5.0 (X11; Ubuntu; Linux i686; rv:17.0) Gecko/20100101 Firefox/17.0','','','',''),(123,'kaguius@gmail.com',1,'0000-00-00 00:00:00','127.0.0.1','Mozilla/5.0 (X11; Ubuntu; Linux i686; rv:17.0) Gecko/20100101 Firefox/17.0','','','',''),(124,'kaguius@gmail.com',1,'0000-00-00 00:00:00','127.0.0.1','Mozilla/5.0 (X11; Ubuntu; Linux i686; rv:17.0) Gecko/20100101 Firefox/17.0','','','',''),(125,'kaguius@gmail.com',1,'2012-12-27 16:36:17','127.0.0.1','Mozilla/5.0 (X11; Ubuntu; Linux i686; rv:17.0) Gecko/20100101 Firefox/17.0','','','',''),(126,'kaguius@gmail.com',1,'2012-12-27 16:38:10','127.0.0.1','Mozilla/5.0 (X11; Ubuntu; Linux i686; rv:17.0) Gecko/20100101 Firefox/17.0','','','',''),(127,'email@email.com',29,'2012-12-27 16:39:18','127.0.0.1','Mozilla/5.0 (X11; Ubuntu; Linux i686; rv:17.0) Gecko/20100101 Firefox/17.0','','','',''),(128,'agnes@agnes.com',30,'0000-00-00 00:00:00','127.0.0.1','Mozilla/5.0 (X11; Ubuntu; Linux i686; rv:17.0) Gecko/20100101 Firefox/17.0','','','',''),(129,'email@email.com',29,'2012-12-27 16:52:40','127.0.0.1','Mozilla/5.0 (X11; Ubuntu; Linux i686; rv:17.0) Gecko/20100101 Firefox/17.0','','','',''),(130,'kaguius@gmail.com',1,'0000-00-00 00:00:00','127.0.0.1','Mozilla/5.0 (X11; Ubuntu; Linux i686; rv:17.0) Gecko/20100101 Firefox/17.0','','','',''),(131,'kaguius@gmail.com',1,'2012-12-28 18:37:51','127.0.0.1','Mozilla/5.0 (X11; Ubuntu; Linux i686; rv:17.0) Gecko/20100101 Firefox/17.0','','','',''),(132,'email@email.com',29,'2012-12-28 18:53:41','127.0.0.1','Mozilla/5.0 (X11; Ubuntu; Linux i686; rv:17.0) Gecko/20100101 Firefox/17.0','','','',''),(133,'kaguius@gmail.com',1,'2012-12-29 10:31:07','127.0.0.1','Mozilla/5.0 (X11; Ubuntu; Linux i686; rv:17.0) Gecko/20100101 Firefox/17.0','','','',''),(134,'email@email.com',29,'2012-12-29 10:36:14','127.0.0.1','Mozilla/5.0 (X11; Ubuntu; Linux i686; rv:17.0) Gecko/20100101 Firefox/17.0','','','',''),(135,'kaguius@gmail.com',1,'2012-12-29 15:21:18','127.0.0.1','Mozilla/5.0 (X11; Ubuntu; Linux i686; rv:17.0) Gecko/20100101 Firefox/17.0','','','',''),(136,'agnes2@agnes2.com',30,'0000-00-00 00:00:00','127.0.0.1','Mozilla/5.0 (X11; Linux i686) AppleWebKit/537.11 (KHTML, like Gecko) Chrome/23.0.1271.97 Safari/537.11','','','',''),(137,'agnes2@agnes2.com',30,'0000-00-00 00:00:00','127.0.0.1','Mozilla/5.0 (X11; Linux i686) AppleWebKit/537.11 (KHTML, like Gecko) Chrome/23.0.1271.97 Safari/537.11','','','',''),(138,'agnes2@agnes2.com',30,'0000-00-00 00:00:00','127.0.0.1','Mozilla/5.0 (X11; Linux i686) AppleWebKit/537.11 (KHTML, like Gecko) Chrome/23.0.1271.97 Safari/537.11','','','',''),(139,'agnes2@agnes2.com',30,'0000-00-00 00:00:00','127.0.0.1','Mozilla/5.0 (X11; Linux i686) AppleWebKit/537.11 (KHTML, like Gecko) Chrome/23.0.1271.97 Safari/537.11','','','',''),(140,'kaguius@gmail.com',1,'0000-00-00 00:00:00','127.0.0.1','Mozilla/5.0 (X11; Linux i686) AppleWebKit/537.11 (KHTML, like Gecko) Chrome/23.0.1271.97 Safari/537.11','','','',''),(141,'agnes2@agnes2.com',30,'0000-00-00 00:00:00','127.0.0.1','Mozilla/5.0 (X11; Ubuntu; Linux i686; rv:17.0) Gecko/20100101 Firefox/17.0','','','',''),(142,'kaguius@gmail.com',1,'0000-00-00 00:00:00','127.0.0.1','Mozilla/5.0 (X11; Ubuntu; Linux i686; rv:17.0) Gecko/20100101 Firefox/17.0','','','',''),(143,'kaguius@gmail.com',1,'2012-12-29 15:35:34','127.0.0.1','Mozilla/5.0 (X11; Ubuntu; Linux i686; rv:17.0) Gecko/20100101 Firefox/17.0','','','',''),(144,'carolyqty@gmail.com',28,'0000-00-00 00:00:00','127.0.0.1','Mozilla/5.0 (X11; Ubuntu; Linux i686; rv:17.0) Gecko/20100101 Firefox/17.0','','','',''),(145,'carolyqty@gmail.com',28,'0000-00-00 00:00:00','127.0.0.1','Mozilla/5.0 (X11; Ubuntu; Linux i686; rv:17.0) Gecko/20100101 Firefox/17.0','','','',''),(146,'carolyqty@gmail.com',28,'0000-00-00 00:00:00','127.0.0.1','Mozilla/5.0 (X11; Ubuntu; Linux i686; rv:17.0) Gecko/20100101 Firefox/17.0','','','',''),(147,'agnes2@agnes2.com',30,'0000-00-00 00:00:00','127.0.0.1','Mozilla/5.0 (X11; Ubuntu; Linux i686; rv:17.0) Gecko/20100101 Firefox/17.0','','','',''),(148,'kaguius@gmail.com',1,'0000-00-00 00:00:00','127.0.0.1','Mozilla/5.0 (X11; Ubuntu; Linux i686; rv:17.0) Gecko/20100101 Firefox/17.0','','','',''),(149,'kaguius@gmail.com',1,'2012-12-29 15:49:03','127.0.0.1','Mozilla/5.0 (X11; Ubuntu; Linux i686; rv:17.0) Gecko/20100101 Firefox/17.0','','','',''),(150,'email@email.com',29,'2012-12-29 16:19:36','127.0.0.1','Mozilla/5.0 (X11; Ubuntu; Linux i686; rv:17.0) Gecko/20100101 Firefox/17.0','','','',''),(151,'kaguius@gmail.com',1,'2012-12-30 02:02:42','127.0.0.1','Mozilla/5.0 (X11; Ubuntu; Linux i686; rv:17.0) Gecko/20100101 Firefox/17.0','','','',''),(152,'kaguius@gmail.com',1,'2012-12-30 03:42:33','127.0.0.1','Mozilla/5.0 (X11; Ubuntu; Linux i686; rv:17.0) Gecko/20100101 Firefox/17.0','','','',''),(153,'kaguius@gmail.com',1,'2012-12-30 03:51:03','127.0.0.1','Mozilla/5.0 (X11; Linux i686) AppleWebKit/537.11 (KHTML, like Gecko) Chrome/23.0.1271.97 Safari/537.11','','','',''),(154,'kaguius@gmail.com',1,'0000-00-00 00:00:00','127.0.0.1','Mozilla/5.0 (X11; Linux i686) AppleWebKit/537.11 (KHTML, like Gecko) Chrome/23.0.1271.97 Safari/537.11','','','',''),(155,'kaguius@gmail.com',1,'2012-12-31 13:46:28','127.0.0.1','Mozilla/5.0 (X11; Linux i686) AppleWebKit/537.11 (KHTML, like Gecko) Chrome/23.0.1271.97 Safari/537.11','','','',''),(156,'kaguius@gmail.com',1,'2013-01-02 12:48:03','127.0.0.1','Mozilla/5.0 (X11; Linux i686) AppleWebKit/537.11 (KHTML, like Gecko) Chrome/23.0.1271.97 Safari/537.11','','','',''),(157,'kaguius@gmail.com',1,'2013-01-02 15:10:15','127.0.0.1','Mozilla/5.0 (X11; Linux i686) AppleWebKit/537.11 (KHTML, like Gecko) Chrome/23.0.1271.97 Safari/537.11','','','',''),(158,'kaguius@gmail.com',1,'2013-01-03 15:45:56','127.0.0.1','Mozilla/5.0 (X11; Ubuntu; Linux i686; rv:17.0) Gecko/20100101 Firefox/17.0','','','',''),(159,'kaguius@gmail.com',1,'2013-01-03 19:36:15','127.0.0.1','Mozilla/5.0 (X11; Linux i686) AppleWebKit/537.11 (KHTML, like Gecko) Chrome/23.0.1271.97 Safari/537.11','','','',''),(160,'kaguius@gmail.com',1,'2013-01-04 15:04:11','127.0.0.1','Mozilla/5.0 (X11; Ubuntu; Linux i686; rv:17.0) Gecko/20100101 Firefox/17.0','','','',''),(161,'agnes2@agnes2.com',30,'0000-00-00 00:00:00','127.0.0.1','Mozilla/5.0 (X11; Ubuntu; Linux i686; rv:17.0) Gecko/20100101 Firefox/17.0','','','',''),(162,'agnes2@agnes2.com',30,'0000-00-00 00:00:00','127.0.0.1','Mozilla/5.0 (X11; Linux i686) AppleWebKit/537.11 (KHTML, like Gecko) Chrome/23.0.1271.97 Safari/537.11','','','',''),(163,'kaguius@gmail.com',1,'2013-01-06 10:15:35','127.0.0.1','Mozilla/5.0 (X11; Linux i686) AppleWebKit/537.11 (KHTML, like Gecko) Chrome/23.0.1271.97 Safari/537.11','','','',''),(164,'kaguius@gmail.com',1,'2013-01-07 14:38:45','127.0.0.1','Mozilla/5.0 (X11; Linux i686) AppleWebKit/537.11 (KHTML, like Gecko) Chrome/23.0.1271.97 Safari/537.11','','','',''),(165,'kaguius@gmail.com',1,'2013-01-07 14:55:06','127.0.0.1','Mozilla/5.0 (X11; Ubuntu; Linux i686; rv:17.0) Gecko/20100101 Firefox/17.0','','','',''),(166,'murungaru@murungaru.com',38,'2013-01-07 16:43:06','127.0.0.1','Mozilla/5.0 (X11; Ubuntu; Linux i686; rv:17.0) Gecko/20100101 Firefox/17.0','','','',''),(167,'kaguius@gmail.com',1,'2013-01-07 20:26:07','127.0.0.1','Mozilla/5.0 (X11; Ubuntu; Linux i686; rv:17.0) Gecko/20100101 Firefox/17.0','','','',''),(168,'murungaru@murungaru.com',38,'2013-01-07 20:27:19','127.0.0.1','Mozilla/5.0 (X11; Ubuntu; Linux i686; rv:17.0) Gecko/20100101 Firefox/17.0','','','',''),(169,'kaguius@gmail.com',1,'2013-01-07 20:36:50','127.0.0.1','Mozilla/5.0 (X11; Ubuntu; Linux i686; rv:17.0) Gecko/20100101 Firefox/17.0','','','',''),(170,'murungaru@murungaru.com',38,'2013-01-07 20:37:32','127.0.0.1','Mozilla/5.0 (X11; Ubuntu; Linux i686; rv:17.0) Gecko/20100101 Firefox/17.0','','','',''),(171,'kaguius@gmail.com',1,'2013-01-07 21:07:57','127.0.0.1','Mozilla/5.0 (X11; Ubuntu; Linux i686; rv:17.0) Gecko/20100101 Firefox/17.0','','','',''),(172,'kaguius@gmail.com',1,'2013-01-08 13:17:07','127.0.0.1','Mozilla/5.0 (X11; Linux i686) AppleWebKit/537.11 (KHTML, like Gecko) Chrome/23.0.1271.97 Safari/537.11','','','',''),(173,'kaguius@gmail.com',1,'2013-01-08 13:17:15','127.0.0.1','Mozilla/5.0 (X11; Linux i686) AppleWebKit/537.11 (KHTML, like Gecko) Chrome/23.0.1271.97 Safari/537.11','','','',''),(174,'kaguius@gmail.com',1,'2013-01-15 19:22:52','127.0.0.1','Mozilla/5.0 (X11; Ubuntu; Linux i686; rv:18.0) Gecko/20100101 Firefox/18.0','','','',''),(175,'kaguius@gmail.com',1,'2013-01-15 20:27:53','127.0.0.1','Mozilla/5.0 (X11; Ubuntu; Linux i686; rv:18.0) Gecko/20100101 Firefox/18.0','','','',''),(176,'kaguius@gmail.com',1,'2013-01-16 15:14:44','127.0.0.1','Mozilla/5.0 (X11; Ubuntu; Linux i686; rv:18.0) Gecko/20100101 Firefox/18.0','','','',''),(177,'kaguius@gmail.com',1,'2013-01-17 16:30:15','127.0.0.1','Mozilla/5.0 (X11; Ubuntu; Linux i686; rv:18.0) Gecko/20100101 Firefox/18.0','','','',''),(178,'kaguius@gmail.com',1,'2013-01-18 10:15:59','127.0.0.1','Mozilla/5.0 (X11; Ubuntu; Linux i686; rv:18.0) Gecko/20100101 Firefox/18.0','','','',''),(179,'kaguius@gmail.com',1,'2013-01-18 15:05:40','127.0.0.1','Mozilla/5.0 (X11; Ubuntu; Linux i686; rv:18.0) Gecko/20100101 Firefox/18.0','','','',''),(180,'kaguius@gmail.com',1,'2013-01-18 15:34:52','127.0.0.1','Mozilla/5.0 (X11; Ubuntu; Linux i686; rv:18.0) Gecko/20100101 Firefox/18.0','','','',''),(181,'kaguius@gmail.com',1,'2013-01-19 16:06:25','127.0.0.1','Mozilla/5.0 (X11; Ubuntu; Linux i686; rv:18.0) Gecko/20100101 Firefox/18.0','','','',''),(182,'kaguius@gmail.com',1,'2013-01-19 17:53:32','127.0.0.1','Mozilla/5.0 (X11; Ubuntu; Linux i686; rv:18.0) Gecko/20100101 Firefox/18.0','','','',''),(183,'agnes2@agnes2.com',30,'2013-01-19 20:35:10','127.0.0.1','Mozilla/5.0 (X11; Ubuntu; Linux i686; rv:18.0) Gecko/20100101 Firefox/18.0','','','',''),(184,'kaguius@gmail.com',1,'2013-01-22 15:25:27','127.0.0.1','Mozilla/5.0 (X11; Ubuntu; Linux i686; rv:18.0) Gecko/20100101 Firefox/18.0','','','',''),(185,'kaguius@gmail.com',1,'2013-01-23 19:35:58','127.0.0.1','Mozilla/5.0 (X11; Linux i686) AppleWebKit/537.17 (KHTML, like Gecko) Chrome/24.0.1312.56 Safari/537.17','','','',''),(186,'kaguius@gmail.com',1,'2013-01-27 11:52:55','127.0.0.1','Mozilla/5.0 (X11; Ubuntu; Linux i686; rv:18.0) Gecko/20100101 Firefox/18.0','','','',''),(187,'kaguius@gmail.com',1,'2013-01-28 21:54:53','127.0.0.1','Mozilla/5.0 (X11; Linux i686) AppleWebKit/537.17 (KHTML, like Gecko) Chrome/24.0.1312.56 Safari/537.17','','','',''),(188,'kaguius@gmail.com',1,'2013-02-05 10:57:29','127.0.0.1','Mozilla/5.0 (X11; Linux i686) AppleWebKit/537.17 (KHTML, like Gecko) Chrome/24.0.1312.57 Safari/537.17','','','',''),(189,'kaguius@gmail.com',1,'2013-02-11 13:32:23','127.0.0.1','Mozilla/5.0 (X11; Linux i686) AppleWebKit/537.17 (KHTML, like Gecko) Chrome/24.0.1312.69 Safari/537.17','','','',''),(190,'kaguius@gmail.com',1,'2013-03-13 11:39:40','127.0.0.1','Mozilla/5.0 (X11; Ubuntu; Linux i686; rv:19.0) Gecko/20100101 Firefox/19.0','','','',''),(191,'kaguius@yahoo.com',39,'2013-03-13 15:39:28','127.0.0.1','Mozilla/5.0 (X11; Ubuntu; Linux i686; rv:19.0) Gecko/20100101 Firefox/19.0','','','',''),(192,'kaguius@yahoo.com',39,'2013-03-13 15:39:53','127.0.0.1','Mozilla/5.0 (X11; Ubuntu; Linux i686; rv:19.0) Gecko/20100101 Firefox/19.0','','','',''),(193,'kaguius@yahoo.com',39,'2013-03-13 16:54:25','127.0.0.1','Mozilla/5.0 (X11; Ubuntu; Linux i686; rv:19.0) Gecko/20100101 Firefox/19.0','','','',''),(194,'kaguius@gmail.com',1,'2013-03-13 17:04:52','127.0.0.1','Mozilla/5.0 (X11; Ubuntu; Linux i686; rv:19.0) Gecko/20100101 Firefox/19.0','','','',''),(195,'kaguius@yahoo.com',39,'2013-03-13 18:02:57','127.0.0.1','Mozilla/5.0 (X11; Ubuntu; Linux i686; rv:19.0) Gecko/20100101 Firefox/19.0','','','',''),(196,'kaguius@gmail.com',1,'2013-03-14 11:03:32','127.0.0.1','Mozilla/5.0 (X11; Ubuntu; Linux i686; rv:19.0) Gecko/20100101 Firefox/19.0','','','',''),(197,'kaguius@yahoo.com',39,'2013-03-14 11:09:23','127.0.0.1','Mozilla/5.0 (X11; Ubuntu; Linux i686; rv:19.0) Gecko/20100101 Firefox/19.0','','','',''),(198,'kaguius@gmail.com',1,'2013-03-14 11:11:19','127.0.0.1','Mozilla/5.0 (X11; Linux i686) AppleWebKit/537.22 (KHTML, like Gecko) Chrome/25.0.1364.160 Safari/537.22','','','',''),(199,'kaguius@gmail.com',1,'2013-03-14 13:55:40','127.0.0.1','Mozilla/5.0 (X11; Linux i686) AppleWebKit/537.22 (KHTML, like Gecko) Chrome/25.0.1364.160 Safari/537.22','','','',''),(200,'kaguius@gmail.com',1,'2013-03-14 15:45:18','127.0.0.1','Mozilla/5.0 (X11; Linux i686) AppleWebKit/537.22 (KHTML, like Gecko) Chrome/25.0.1364.160 Safari/537.22','','','',''),(201,'kaguius@yahoo.com',39,'2013-03-14 15:53:47','127.0.0.1','Mozilla/5.0 (X11; Ubuntu; Linux i686; rv:19.0) Gecko/20100101 Firefox/19.0','','','',''),(202,'kaguius@yahoo.com',39,'2013-03-15 09:22:42','127.0.0.1','Mozilla/5.0 (X11; Linux i686) AppleWebKit/537.22 (KHTML, like Gecko) Chrome/25.0.1364.172 Safari/537.22','','','',''),(203,'kaguius@yahoo.com',39,'2013-03-15 09:38:43','127.0.0.1','Mozilla/5.0 (X11; Linux i686) AppleWebKit/537.22 (KHTML, like Gecko) Chrome/25.0.1364.172 Safari/537.22','','','',''),(204,'kaguius@yahoo.com',39,'2013-03-15 09:51:25','127.0.0.1','Mozilla/5.0 (X11; Linux i686) AppleWebKit/537.22 (KHTML, like Gecko) Chrome/25.0.1364.172 Safari/537.22','','','',''),(205,'kaguius@yahoo.com',39,'2013-03-15 09:55:11','127.0.0.1','Mozilla/5.0 (X11; Linux i686) AppleWebKit/537.22 (KHTML, like Gecko) Chrome/25.0.1364.172 Safari/537.22','','','',''),(206,'kaguius@yahoo.com',39,'2013-03-15 15:18:18','127.0.0.1','Mozilla/5.0 (X11; Linux i686) AppleWebKit/537.22 (KHTML, like Gecko) Chrome/25.0.1364.172 Safari/537.22','','','',''),(207,'kaguius@gmail.com',1,'2013-03-15 15:22:24','127.0.0.1','Mozilla/5.0 (X11; Ubuntu; Linux i686; rv:19.0) Gecko/20100101 Firefox/19.0','','','',''),(208,'kaguius@yahoo.com',39,'2013-03-22 13:41:32','127.0.0.1','Mozilla/5.0 (X11; Linux i686) AppleWebKit/537.22 (KHTML, like Gecko) Chrome/25.0.1364.172 Safari/537.22','','','',''),(209,'kaguius@gmail.com',1,'2013-03-29 06:02:38','127.0.0.1','Mozilla/5.0 (X11; Linux i686) AppleWebKit/537.22 (KHTML, like Gecko) Chrome/25.0.1364.172 Safari/537.22','','','',''),(210,'agnes2@agnes2.com',30,'2013-04-05 11:50:45','127.0.0.1','Mozilla/5.0 (X11; Linux i686) AppleWebKit/537.31 (KHTML, like Gecko) Chrome/26.0.1410.43 Safari/537.31','','','',''),(211,'kaguius@gmail.com',1,'2013-04-05 11:50:58','127.0.0.1','Mozilla/5.0 (X11; Linux i686) AppleWebKit/537.31 (KHTML, like Gecko) Chrome/26.0.1410.43 Safari/537.31','','','',''),(212,'agnes2@agnes2.com',30,'2013-04-26 16:40:53','127.0.0.1','Mozilla/5.0 (X11; Linux i686) AppleWebKit/537.31 (KHTML, like Gecko) Chrome/26.0.1410.63 Safari/537.31','','','',''),(213,'kaguius@gmail.com',1,'2013-04-26 16:41:50','127.0.0.1','Mozilla/5.0 (X11; Ubuntu; Linux i686; rv:20.0) Gecko/20100101 Firefox/20.0','','','',''),(214,'kaguius@yahoo.com',39,'2013-04-26 16:42:55','127.0.0.1','Mozilla/5.0 (X11; Linux i686) AppleWebKit/537.31 (KHTML, like Gecko) Chrome/26.0.1410.63 Safari/537.31','','','',''),(215,'agnes2@agnes2.com',30,'2013-04-26 16:47:42','127.0.0.1','Mozilla/5.0 (X11; Linux i686) AppleWebKit/537.31 (KHTML, like Gecko) Chrome/26.0.1410.63 Safari/537.31','','','',''),(216,'kaguius@gmail.com',1,'2013-04-26 17:43:10','127.0.0.1','Mozilla/5.0 (X11; Linux i686) AppleWebKit/537.31 (KHTML, like Gecko) Chrome/26.0.1410.63 Safari/537.31','','','',''),(217,'kaguius@gmail.com',1,'2013-04-29 09:30:08','127.0.0.1','Mozilla/5.0 (X11; Ubuntu; Linux i686; rv:20.0) Gecko/20100101 Firefox/20.0','','','',''),(218,'kaguius@gmail.com',1,'2013-04-29 10:41:52','127.0.0.1','Mozilla/5.0 (X11; Ubuntu; Linux i686; rv:20.0) Gecko/20100101 Firefox/20.0','','','',''),(219,'agnes2@agnes2.com',30,'2013-04-29 13:16:47','127.0.0.1','Mozilla/5.0 (X11; Ubuntu; Linux i686; rv:20.0) Gecko/20100101 Firefox/20.0','','','',''),(220,'kaguius@gmail.com',1,'2013-04-29 13:17:17','127.0.0.1','Mozilla/5.0 (X11; Ubuntu; Linux i686; rv:20.0) Gecko/20100101 Firefox/20.0','','','',''),(221,'kaguius@yahoo.com',39,'2013-04-29 13:18:01','127.0.0.1','Mozilla/5.0 (X11; Ubuntu; Linux i686; rv:20.0) Gecko/20100101 Firefox/20.0','','','',''),(222,'kaguius@gmail.com',1,'2013-04-29 13:36:35','127.0.0.1','Mozilla/5.0 (X11; Linux i686) AppleWebKit/537.22 (KHTML, like Gecko) Ubuntu Chromium/25.0.1364.160 Chrome/25.0.1364.160 Safari/537.22','','','',''),(223,'kaguius@yahoo.com',39,'2013-04-29 14:33:34','127.0.0.1','Mozilla/5.0 (X11; Ubuntu; Linux i686; rv:20.0) Gecko/20100101 Firefox/20.0','','','',''),(224,'kaguius@gmail.com',1,'2013-04-29 15:06:37','127.0.0.1','Mozilla/5.0 (X11; Linux i686) AppleWebKit/537.22 (KHTML, like Gecko) Ubuntu Chromium/25.0.1364.160 Chrome/25.0.1364.160 Safari/537.22','','','',''),(225,'kaguius@gmail.com',1,'2013-04-29 16:06:19','127.0.0.1','Mozilla/5.0 (X11; Ubuntu; Linux i686; rv:20.0) Gecko/20100101 Firefox/20.0','','','',''),(226,'kaguius@yahoo.com',39,'2013-04-29 17:16:04','127.0.0.1','Mozilla/5.0 (X11; Linux i686) AppleWebKit/537.22 (KHTML, like Gecko) Ubuntu Chromium/25.0.1364.160 Chrome/25.0.1364.160 Safari/537.22','','','',''),(227,'kaguius@yahoo.com',39,'2013-04-29 17:37:39','127.0.0.1','Mozilla/5.0 (X11; Linux i686) AppleWebKit/537.22 (KHTML, like Gecko) Ubuntu Chromium/25.0.1364.160 Chrome/25.0.1364.160 Safari/537.22','','','',''),(228,'kaguius@gmail.com',1,'2013-04-30 09:05:57','127.0.0.1','Mozilla/5.0 (X11; Ubuntu; Linux i686; rv:20.0) Gecko/20100101 Firefox/20.0','','','',''),(229,'kaguius@gmail.com',1,'2013-05-09 08:39:28','127.0.0.1','Mozilla/5.0 (X11; Ubuntu; Linux i686; rv:20.0) Gecko/20100101 Firefox/20.0','','','',''),(230,'kaguius@gmail.com',1,'2013-05-09 15:10:41','127.0.0.1','Mozilla/5.0 (X11; Ubuntu; Linux i686; rv:20.0) Gecko/20100101 Firefox/20.0','','','',''),(231,'kaguius@gmail.com',1,'2013-05-10 09:20:48','127.0.0.1','Mozilla/5.0 (X11; Ubuntu; Linux i686; rv:20.0) Gecko/20100101 Firefox/20.0','','','',''),(232,'kaguius@gmail.com',1,'2013-05-10 11:43:19','127.0.0.1','Mozilla/5.0 (X11; Ubuntu; Linux i686; rv:20.0) Gecko/20100101 Firefox/20.0','','','',''),(233,'kaguius@gmail.com',1,'2013-05-10 16:14:42','127.0.0.1','Mozilla/5.0 (X11; Ubuntu; Linux i686; rv:20.0) Gecko/20100101 Firefox/20.0','','','',''),(234,'kaguius@gmail.com',1,'2013-05-10 19:11:07','127.0.0.1','Mozilla/5.0 (X11; Ubuntu; Linux i686; rv:20.0) Gecko/20100101 Firefox/20.0','','','',''),(235,'kaguius@gmail.com',1,'2013-05-10 19:44:32','127.0.0.1','Mozilla/5.0 (X11; Ubuntu; Linux i686; rv:20.0) Gecko/20100101 Firefox/20.0','','','',''),(236,'kaguius@gmail.com',1,'2013-05-11 10:46:05','127.0.0.1','Mozilla/5.0 (X11; Ubuntu; Linux i686; rv:20.0) Gecko/20100101 Firefox/20.0','','','',''),(237,'kaguius@gmail.com',1,'2013-05-11 10:47:08','127.0.0.1','Mozilla/5.0 (X11; Ubuntu; Linux i686; rv:20.0) Gecko/20100101 Firefox/20.0','','','',''),(238,'kaguius@gmail.com',1,'2013-05-14 17:31:41','127.0.0.1','Mozilla/5.0 (X11; Linux i686) AppleWebKit/537.31 (KHTML, like Gecko) Chrome/26.0.1410.63 Safari/537.31','','','',''),(239,'kaguius@gmail.com',1,'2013-05-15 12:07:31','127.0.0.1','Mozilla/5.0 (X11; Ubuntu; Linux i686; rv:20.0) Gecko/20100101 Firefox/20.0','','','',''),(240,'kaguius@gmail.com',1,'2013-05-23 09:23:22','127.0.0.1','Mozilla/5.0 (X11; Linux i686) AppleWebKit/537.31 (KHTML, like Gecko) Chrome/26.0.1410.63 Safari/537.31','','','',''),(241,'kaguius@gmail.com',1,'2013-05-23 09:57:08','127.0.0.1','Mozilla/5.0 (X11; Ubuntu; Linux i686; rv:21.0) Gecko/20100101 Firefox/21.0','','','',''),(242,'kaguius@gmail.com',1,'2013-05-23 10:20:27','127.0.0.1','Mozilla/5.0 (X11; Linux i686) AppleWebKit/537.31 (KHTML, like Gecko) Chrome/26.0.1410.63 Safari/537.31','','','',''),(243,'kaguius@gmail.com',1,'2013-05-23 11:28:10','127.0.0.1','Mozilla/5.0 (X11; Linux i686) AppleWebKit/537.31 (KHTML, like Gecko) Chrome/26.0.1410.63 Safari/537.31','','','',''),(244,'kaguius@gmail.com',1,'2013-05-23 15:18:27','127.0.0.1','Mozilla/5.0 (X11; Linux i686) AppleWebKit/537.31 (KHTML, like Gecko) Chrome/26.0.1410.63 Safari/537.31','','','',''),(245,'kaguius@gmail.com',1,'2013-06-28 10:55:20','127.0.0.1','Mozilla/5.0 (X11; Ubuntu; Linux i686; rv:21.0) Gecko/20100101 Firefox/21.0','','','',''),(246,'kaguius@gmail.com',1,'2013-06-28 11:13:09','127.0.0.1','Mozilla/5.0 (X11; Linux i686) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/27.0.1453.93 Safari/537.36','','','',''),(247,'kaguius@gmail.com',1,'2013-06-30 16:03:05','127.0.0.1','Mozilla/5.0 (X11; Ubuntu; Linux i686; rv:21.0) Gecko/20100101 Firefox/21.0','','','',''),(248,'kaguius@gmail.com',1,'2013-06-30 16:05:50','127.0.0.1','Mozilla/5.0 (X11; Ubuntu; Linux i686; rv:21.0) Gecko/20100101 Firefox/21.0','','','',''),(249,'kaguius@yahoo.com',39,'2013-06-30 16:07:01','127.0.0.1','Mozilla/5.0 (X11; Ubuntu; Linux i686; rv:21.0) Gecko/20100101 Firefox/21.0','','','',''),(250,'kaguius@gmail.com',1,'2013-08-14 13:43:58','127.0.0.1','Mozilla/5.0 (X11; Linux i686) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/28.0.1500.95 Safari/537.36','','','',''),(251,'kaguius@gmail.com',1,'2013-08-15 08:36:25','127.0.0.1','Mozilla/5.0 (X11; Linux i686) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/28.0.1500.95 Safari/537.36','','','',''),(252,'kaguius@gmail.com',1,'2013-08-15 09:26:09','127.0.0.1','Mozilla/5.0 (X11; Linux i686) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/28.0.1500.95 Safari/537.36','','','',''),(253,'kaguius@gmail.com',1,'2013-08-15 12:06:25','127.0.0.1','Mozilla/5.0 (X11; Linux i686) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/28.0.1500.95 Safari/537.36','','','',''),(254,'kaguius@gmail.com',1,'2013-08-15 14:28:06','127.0.0.1','Mozilla/5.0 (X11; Linux i686) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/28.0.1500.95 Safari/537.36','','','',''),(255,'email@email.com',29,'2013-08-15 17:08:46','127.0.0.1','Mozilla/5.0 (X11; Linux i686) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/28.0.1500.95 Safari/537.36','','','',''),(256,'kaguius@gmail.com',1,'2013-08-15 17:12:47','127.0.0.1','Mozilla/5.0 (X11; Linux i686) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/28.0.1500.95 Safari/537.36','','','',''),(257,'kaguius@gmail.com',1,'2013-08-15 17:13:15','127.0.0.1','Mozilla/5.0 (X11; Linux i686) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/28.0.1500.95 Safari/537.36','','','',''),(258,'kaguius@gmail.com',1,'2013-08-16 11:59:32','127.0.0.1','Mozilla/5.0 (X11; Linux i686) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/28.0.1500.95 Safari/537.36','','','',''),(259,'kaguius@gmail.com',1,'2013-08-17 10:43:09','127.0.0.1','Mozilla/5.0 (X11; Linux i686) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/28.0.1500.95 Safari/537.36','','','',''),(260,'kaguius@gmail.com',1,'2013-08-17 13:35:54','127.0.0.1','Mozilla/5.0 (X11; Ubuntu; Linux i686; rv:23.0) Gecko/20100101 Firefox/23.0','','','',''),(261,'kaguius@gmail.com',1,'2013-08-19 09:14:50','127.0.0.1','Mozilla/5.0 (X11; Linux i686) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/28.0.1500.95 Safari/537.36','','','','');
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
) ENGINE=MyISAM AUTO_INCREMENT=58 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `user_profiles`
--

LOCK TABLES `user_profiles` WRITE;
/*!40000 ALTER TABLE `user_profiles` DISABLE KEYS */;
INSERT INTO `user_profiles` VALUES (1,'Andrew','Kibe','kaguius@gmail.com','3f1f22537f11f5fa990c95fe123a946c','3f1f22537f11f5fa990c95fe123a946c','+254704469814',1,'2012-07-14 07:09:00',3,1,0,1),(2,'Admin','Admin','admin@admin.com','c5cc866787366e0436182a20831e2d08','c5cc866787366e0436182a20831e2d08','+254721121121',2,'2012-07-14 07:09:00',0,1,NULL,NULL),(11,'Kim Kardashian',NULL,'admin2@admin.com','c5cc866787366e0436182a20831e2d08',NULL,'+254725790499',3,'2012-11-28 19:54:19',13,0,NULL,NULL),(9,'Kaguius','Kibe2','kaguius@yahoo.com','c5cc866787366e0436182a20831e2d08',NULL,'+254704469814',4,'2012-11-24 19:05:56',11,1,NULL,NULL),(10,'Joe Kibe',NULL,'punchizi@yahoo.com','8ef9c1ec73984d86836aa6c0f2f0c311',NULL,'+254721100342',3,'2012-11-24 20:57:17',12,0,NULL,NULL),(12,'Kim Kardashian Senior',NULL,'','d0ff7075ac9c0a00d2be05b18e831078',NULL,'+254725790499',3,'2012-11-28 20:41:16',0,0,NULL,NULL),(13,'Kim Senior',NULL,'','21232f297a57a5a743894a0e4a801fc3',NULL,'+254725790499',3,'2012-11-28 20:45:24',0,1,NULL,NULL),(14,'Kim Juniour',NULL,'admin@admin.com','d0ff7075ac9c0a00d2be05b18e831078',NULL,'+254704469814',3,'2012-11-28 20:49:45',0,1,NULL,NULL),(23,'Andrew Chege Kibe',NULL,'akibe@wenyebiashara.biz','18e3a7a253fe7a712bed610ae8a8fdd6',NULL,'+254704469814',3,'2012-12-02 10:53:35',25,1,NULL,NULL),(27,'Joseph Kibe',NULL,'punchizi@yahoo.com','8ef9c1ec73984d86836aa6c0f2f0c311',NULL,'+254721100342',3,'2012-12-03 18:35:12',29,1,NULL,NULL),(28,'Carolyne','Alana','carolyqty@gmail.com','440635083d08df58d672201e89e44fc6','440635083d08df58d672201e89e44fc6','+254711239584',3,'2012-12-07 20:44:05',30,1,3,1),(29,'Lawrence','Kamau','email@email.com','3f1f22537f11f5fa990c95fe123a946c','3f1f22537f11f5fa990c95fe123a946c','+254721100342',2,'2012-12-07 17:01:58',0,1,3,1),(30,'Kibe','Muigai','agnes2@agnes2.com','2d8463b5c3a3c6c8854a175683fe6303','2d8463b5c3a3c6c8854a175683fe6303','+254704469814',3,'2012-12-10 20:16:48',0,1,3,1),(31,'Alana','Zawadi','alana@alana.com','440635083d08df58d672201e89e44fc6','440635083d08df58d672201e89e44fc6','+254704469814',2,'2012-12-10 21:00:50',0,1,3,29),(32,'Ali','Nasser','yebne1@gmail.com','0aacc89a4d28750d01c14976f8a9668f','0aacc89a4d28750d01c14976f8a9668f','+254704469814',1,'2012-12-14 09:52:30',0,1,0,1),(37,'Andrew','Kibe','akibe@wenyebiashara.biz','5c4e2f0e28ba0db239212d9a8d39e954','5c4e2f0e28ba0db239212d9a8d39e954','+254721100342',2,'2012-12-26 12:35:56',0,0,4,NULL),(36,'Andrew','Kibe','info@e-Kodi.com','b6062a3a5c68908e90387180da56a0bc','b6062a3a5c68908e90387180da56a0bc','+254721100342',2,'2012-12-22 13:08:18',0,0,4,NULL),(38,'KIbe','Murungaru','murungaru@murungaru.com','85ebd0e819b1b811cdfdd9397ff6b9b3','85ebd0e819b1b811cdfdd9397ff6b9b3','111111',5,'2013-01-07 14:49:13',0,1,3,1),(39,'Gilbert ','Kemboi','kaguius@yahoo.com','bd90ad0cd73b8d7259fd6384752d0b83','bd90ad0cd73b8d7259fd6384752d0b83','+254721100342',3,'2013-01-27 12:04:19',32,1,3,1),(40,'Andrew','Kibe','akibe@e-kodi.com','7336e2489b1089b46ca62d53f132496e','7336e2489b1089b46ca62d53f132496e','+254704469814',2,'2013-02-21 15:45:16',0,0,9,NULL),(42,'Joseph','Kibe','punchizi@yahoo.com','536305a63a82f5476938e1012404cc6a','536305a63a82f5476938e1012404cc6a','+254721100342',2,'2013-04-05 11:33:50',0,0,11,NULL),(43,'Augustine','Kipsang','kipsang@kip.com','bc8ae20ef4bf09196f5c0e2b10118e16','bc8ae20ef4bf09196f5c0e2b10118e16','+254704469814',2,'2013-05-10 11:53:13',0,0,12,NULL),(44,'Jane Wambui Mbugua',NULL,'jwambui@gmail.com','7336e2489b1089b46ca62d53f132496e',NULL,'0725864688',3,'2013-08-15 13:20:32',33,1,3,1),(45,'Robert Kipkirui',NULL,'robert@gmail.com','536305a63a82f5476938e1012404cc6a',NULL,'0725864688',3,'2013-08-15 13:33:57',34,1,3,1),(46,'Jane Wambui Mbugua',NULL,'','14abe63efafbc52576d01d4900ef7670',NULL,'',3,'2013-08-17 15:45:14',35,1,13,1),(47,'Robert Kipkirui',NULL,'','3ec8b43214d06a99a0b3481aa2302ba0',NULL,'',3,'2013-08-17 15:47:45',36,1,13,1),(48,'Susan Wanjala',NULL,'','3ec8b43214d06a99a0b3481aa2302ba0',NULL,'',3,'2013-08-17 15:48:03',37,1,13,1),(49,'Mathew Toitoek',NULL,'','a1152d88a971abc12e0eeb988a4589c8',NULL,'',3,'2013-08-17 15:48:20',38,1,13,1),(50,'Jonah Gathama Wachira',NULL,'','536305a63a82f5476938e1012404cc6a',NULL,'',3,'2013-08-17 15:48:39',39,1,13,1),(51,'Chirles Ouma',NULL,'','5c4e2f0e28ba0db239212d9a8d39e954',NULL,'',3,'2013-08-17 15:49:00',40,1,13,1),(52,'Phebeans O Weya',NULL,'','536305a63a82f5476938e1012404cc6a',NULL,'',3,'2013-08-17 15:49:30',41,1,13,1),(53,'Rosalind Nyaga',NULL,'','bc8ae20ef4bf09196f5c0e2b10118e16',NULL,'',3,'2013-08-17 15:50:09',42,1,13,1),(54,'Emilly Wairimu Ndegwa',NULL,'','dbfff619ee2d00d46227dcfc3e611ac6',NULL,'',3,'2013-08-17 15:50:30',43,1,13,1),(55,'Peter Kibiwott',NULL,'','3ec8b43214d06a99a0b3481aa2302ba0',NULL,'',3,'2013-08-17 15:50:46',44,1,13,1),(56,'Elizabeth Wangari',NULL,'','2c9390a8c6fd6426431a115d141921b0',NULL,'',3,'2013-08-17 15:51:08',45,1,13,1),(57,'Patrick Kanyi',NULL,'','536305a63a82f5476938e1012404cc6a',NULL,'',3,'2013-08-17 15:51:45',46,1,13,1);
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
) ENGINE=MyISAM AUTO_INCREMENT=46 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `users_failed_logs`
--

LOCK TABLES `users_failed_logs` WRITE;
/*!40000 ALTER TABLE `users_failed_logs` DISABLE KEYS */;
INSERT INTO `users_failed_logs` VALUES (1,'','','127.0.0.1',NULL),(2,'kaguius@yahoo.com','c5cc866787366e0436182a20831e2d','127.0.0.1',NULL),(3,'','kag','127.0.0.1',NULL),(4,'kaguius','kaguius','127.0.0.1',NULL),(5,'kaguius','123456789','127.0.0.1',NULL),(6,'kaguius','kaguius','127.0.0.1',NULL),(7,'kaguius','kaguius','127.0.0.1',NULL),(8,'kaguius','kaguius','127.0.0.1',NULL),(9,'kaguius','kaguius','127.0.0.1',NULL),(10,'kaguius','kaguius','127.0.0.1',NULL),(11,'kaguius','kaguius','127.0.0.1',NULL),(12,'kaguius@gmail.com','kaguius','127.0.0.1',NULL),(13,'kaguius@gmail.com','kaguius','127.0.0.1',NULL),(14,'email@email.com','kaguius','127.0.0.1',NULL),(15,'agnes@agnes.com','adnes','127.0.0.1',NULL),(16,'kaguius@gmail..com','kaguius','127.0.0.1',NULL),(17,'kag','kag','127.0.0.1',NULL),(18,'kag','kag','127.0.0.1',NULL),(19,'kag','kag','127.0.0.1',NULL),(20,'kag','kag','127.0.0.1',NULL),(21,'kag','kag','127.0.0.1',NULL),(22,'kaguius@gmail.com','kaguius','127.0.0.1',NULL),(23,'kaguius@gmail.com','kaguius','127.0.0.1',NULL),(24,'kaguius@gmail.com','458Kaguius92%','127.0.0.1',NULL),(25,'lawrence@blacksands.biz','blacksands','127.0.0.1',NULL),(26,'agnes2@agnes2.com','agvd','127.0.0.1',NULL),(27,'kaguius@gmail.com','kaguius','127.0.0.1',NULL),(28,'kaguius@gmail.com','kaguius','127.0.0.1',NULL),(29,'kaguius@gmail.com','kaguius','127.0.0.1',NULL),(30,'agnes@agnes.com','agnes','127.0.0.1',NULL),(31,'lawrence@blacksands.biz','blacksands','127.0.0.1',NULL),(32,'kag','kag','127.0.0.1',NULL),(33,'kag','kag','127.0.0.1','0000-00-00 00:00:00'),(34,'kag','kag','127.0.0.1','2013-01-08 13:09:08'),(35,'kag','kag','127.0.0.1','0000-00-00 00:00:00'),(36,'kag','kag','127.0.0.1','2013-01-08 13:10:34'),(37,'kaguius@yahoo.com','gilbert','127.0.0.1','2013-03-13 16:54:06'),(38,'kabucho@kabucho.com','kabucho','127.0.0.1','2013-04-26 16:40:45'),(39,'kaguius@gmail.com','Kaguius%','127.0.0.1','2013-04-29 15:06:12'),(40,'kaguius@gmail.com','Kaguius%','127.0.0.1','2013-04-29 15:06:21'),(41,'kaguius@gmail.com','kaguius','127.0.0.1','2013-05-11 10:46:43'),(42,'admin2@admin.com','kaguius','127.0.0.1','2013-06-30 16:05:25'),(43,'kaguius@gmail.com','48Kaguius92%','127.0.0.1','2013-08-15 14:22:58'),(44,'kaguius@gmail.com','48Kaguius92%','127.0.0.1','2013-08-15 14:23:55'),(45,'kaguius@gmail.com','48Kaguius92%','127.0.0.1','2013-08-15 14:25:29');
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
  `payment` float DEFAULT '0',
  `balance` float DEFAULT '0',
  `month` int(5) DEFAULT NULL,
  `year` int(5) DEFAULT NULL,
  `transactiontime` datetime DEFAULT NULL,
  `paid` int(11) DEFAULT '0',
  `UID` int(10) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=42 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `water_meter_details`
--

LOCK TABLES `water_meter_details` WRITE;
/*!40000 ALTER TABLE `water_meter_details` DISABLE KEYS */;
INSERT INTO `water_meter_details` VALUES (15,12,21,12,0,15,150,NULL,NULL,11,2012,'2012-11-24 21:16:43',1,NULL),(25,6,17,32,4120,5120,120000,120000,0,5,2013,'2013-05-11 11:00:35',1,1),(21,8,27,30,0,10,80,0,NULL,12,2012,'2012-12-28 21:15:54',0,29),(22,8,26,29,50,60,80,0,NULL,12,2012,'2012-12-28 21:20:52',0,29),(26,6,17,32,5120,5150,3600,0,0,8,2013,'2013-08-15 09:28:07',0,1),(27,21,33,33,0,50,2500,2500,0,8,2013,'2013-08-15 13:22:06',1,1),(28,21,34,34,0,50,2500,2500,0,8,2013,'2013-08-15 13:44:32',1,1),(30,23,54,35,694,696,180,0,0,7,2013,'2013-08-17 15:59:34',0,1),(31,23,55,36,915,927,1080,1080,0,7,2013,'2013-08-17 16:00:11',1,1),(32,23,56,37,1301,1314,1170,0,0,7,2013,'2013-08-17 16:00:31',0,1),(33,23,57,38,790,802,1080,0,0,7,2013,'2013-08-17 16:00:47',0,1),(34,23,58,39,1086,1103,1530,0,0,7,2013,'2013-08-17 16:01:02',0,1),(35,23,59,40,923,932,810,0,0,7,2013,'2013-08-17 16:01:18',0,1),(36,23,60,41,725,730,450,0,0,7,2013,'2013-08-17 16:01:35',0,1),(37,23,61,42,539,549,900,900,0,7,2013,'2013-08-17 16:02:03',1,1),(38,23,62,43,891,895,360,0,0,7,2013,'2013-08-17 16:02:28',0,1),(39,23,63,44,419,421,180,0,0,7,2013,'2013-08-17 16:02:45',0,1),(40,23,64,45,1004,1014,900,900,0,7,2013,'2013-08-17 16:03:05',1,1),(41,23,65,46,579,587,720,0,0,7,2013,'2013-08-17 16:03:23',0,1);
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

-- Dump completed on 2013-08-19 10:34:23

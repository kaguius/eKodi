# MySQL Navigator Xport
# Database: rent_management
# root@127.0.0.1

# CREATE DATABASE rent_management;
# USE rent_management;

#
# Table structure for table 'admin_status'
#

# DROP TABLE IF EXISTS admin_status;
CREATE TABLE `admin_status` (
  `id` int(5) NOT NULL AUTO_INCREMENT,
  `admin_status` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1 COMMENT='latin1_swedish_ci';

#
# Dumping data for table 'admin_status'
#

INSERT INTO admin_status VALUES (1,'Administrator');
INSERT INTO admin_status VALUES (2,'Management');
INSERT INTO admin_status VALUES (3,'User');

#
# Table structure for table 'banking_deposit'
#

# DROP TABLE IF EXISTS banking_deposit;
CREATE TABLE `banking_deposit` (
  `id` int(5) NOT NULL AUTO_INCREMENT,
  `unit_id` int(5) DEFAULT NULL,
  `tenant_id` int(5) DEFAULT NULL,
  `bank_deposit` longtext,
  `mode` varchar(15) DEFAULT NULL,
  `transactiontime` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

#
# Dumping data for table 'banking_deposit'
#

INSERT INTO banking_deposit VALUES (1,15,1,'The amount has been banked.','rent','2012-07-20 06:31:37');
INSERT INTO banking_deposit VALUES (2,15,1,'The amount has been banked.','deposit','2012-07-20 06:32:59');

#
# Table structure for table 'calender'
#

# DROP TABLE IF EXISTS calender;
CREATE TABLE `calender` (
  `id` int(5) NOT NULL AUTO_INCREMENT,
  `month` varchar(15) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=13 DEFAULT CHARSET=latin1;

#
# Dumping data for table 'calender'
#

INSERT INTO calender VALUES (1,'Jan');
INSERT INTO calender VALUES (2,'Feb');
INSERT INTO calender VALUES (3,'Mar');
INSERT INTO calender VALUES (4,'Apr');
INSERT INTO calender VALUES (5,'May');
INSERT INTO calender VALUES (6,'Jun');
INSERT INTO calender VALUES (7,'Jul');
INSERT INTO calender VALUES (8,'Aug');
INSERT INTO calender VALUES (9,'Sep');
INSERT INTO calender VALUES (10,'Oct');
INSERT INTO calender VALUES (11,'Nov');
INSERT INTO calender VALUES (12,'Dec');

#
# Table structure for table 'comms_table'
#

# DROP TABLE IF EXISTS comms_table;
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
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=52 DEFAULT CHARSET=latin1;

#
# Dumping data for table 'comms_table'
#

INSERT INTO comms_table VALUES (32,15,1,1200,7,2012,1,0,'2012-07-20 06:27:11');
INSERT INTO comms_table VALUES (33,15,1,1200,7,2012,2,0,'2012-07-20 06:27:11');
INSERT INTO comms_table VALUES (34,15,1,1200,8,2012,2,0,'2012-08-03 04:30:43');
INSERT INTO comms_table VALUES (35,17,2,2000,8,2012,1,0,'2012-08-03 10:55:19');
INSERT INTO comms_table VALUES (36,17,2,1000,8,2012,2,0,'2012-08-03 10:55:19');
INSERT INTO comms_table VALUES (37,18,3,2000,8,2012,1,0,'2012-08-03 10:59:38');
INSERT INTO comms_table VALUES (38,18,3,1000,8,2012,2,0,'2012-08-03 10:59:38');
INSERT INTO comms_table VALUES (47,15,1,1200,9,2012,2,0,'2012-09-19 11:26:06');
INSERT INTO comms_table VALUES (48,17,2,1000,11,2012,2,0,'2012-11-15 10:11:18');
INSERT INTO comms_table VALUES (49,18,3,1000,11,2012,2,0,'2012-11-15 10:11:18');
INSERT INTO comms_table VALUES (50,15,1,1200,11,2012,2,0,'2012-11-15 12:30:42');
INSERT INTO comms_table VALUES (51,13,4,400,11,2012,2,0,'2012-11-15 12:30:42');

#
# Table structure for table 'deposit_payment'
#

# DROP TABLE IF EXISTS deposit_payment;
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

#
# Dumping data for table 'deposit_payment'
#


#
# Table structure for table 'expense_items'
#

# DROP TABLE IF EXISTS expense_items;
CREATE TABLE `expense_items` (
  `id` int(5) NOT NULL AUTO_INCREMENT,
  `property_id` int(5) DEFAULT NULL,
  `expense_name` varchar(100) DEFAULT NULL,
  `budget_expense` float DEFAULT NULL,
  `user_id` int(5) DEFAULT NULL,
  `transactiontime` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=13 DEFAULT CHARSET=latin1;

#
# Dumping data for table 'expense_items'
#

INSERT INTO expense_items VALUES (4,5,'Electricity',1200,1,'2012-07-20 06:19:03');
INSERT INTO expense_items VALUES (5,5,'Water',2000,1,'2012-07-20 06:19:19');
INSERT INTO expense_items VALUES (6,5,'Garbage',500,1,'2012-07-20 06:19:29');
INSERT INTO expense_items VALUES (7,5,'Rodentkil',464,1,'2012-07-20 06:19:48');
INSERT INTO expense_items VALUES (8,5,'Security',15000,1,'2012-07-20 06:20:02');
INSERT INTO expense_items VALUES (9,5,'Caretaker',6000,1,'2012-07-20 06:20:15');
INSERT INTO expense_items VALUES (10,6,'Gardener',5000,1,'2012-08-03 10:56:57');
INSERT INTO expense_items VALUES (11,6,'Utility',4000,1,'2012-08-03 10:57:13');
INSERT INTO expense_items VALUES (12,6,'Security',8000,1,'2012-08-03 10:57:29');

#
# Table structure for table 'expense_payment'
#

# DROP TABLE IF EXISTS expense_payment;
CREATE TABLE `expense_payment` (
  `id` int(5) NOT NULL AUTO_INCREMENT,
  `property_id` int(5) DEFAULT NULL,
  `expense_id` int(5) DEFAULT NULL,
  `expense_payment` float DEFAULT NULL,
  `expense_month` int(5) DEFAULT NULL,
  `expense_year` int(5) DEFAULT NULL,
  `transactiontime` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=23 DEFAULT CHARSET=latin1;

#
# Dumping data for table 'expense_payment'
#

INSERT INTO expense_payment VALUES (1,5,4,1200,7,2012,'2012-07-20 06:28:01');
INSERT INTO expense_payment VALUES (2,5,5,2000,7,2012,'2012-07-20 06:28:01');
INSERT INTO expense_payment VALUES (3,5,6,500,7,2012,'2012-07-20 06:28:01');
INSERT INTO expense_payment VALUES (4,5,9,6000,7,2012,'2012-07-20 06:28:01');
INSERT INTO expense_payment VALUES (5,5,4,1200,8,2012,'2012-08-03 04:32:28');
INSERT INTO expense_payment VALUES (6,5,5,2000,8,2012,'2012-08-03 04:32:28');
INSERT INTO expense_payment VALUES (7,5,8,15000,8,2012,'2012-08-03 07:11:11');
INSERT INTO expense_payment VALUES (10,5,9,6000,8,2012,'2012-08-03 07:17:51');
INSERT INTO expense_payment VALUES (11,6,10,5000,8,2012,'2012-08-03 11:01:07');
INSERT INTO expense_payment VALUES (12,6,11,2000,8,2012,'2012-08-03 11:01:07');
INSERT INTO expense_payment VALUES (13,6,12,8000,8,2012,'2012-08-03 11:01:07');
INSERT INTO expense_payment VALUES (14,5,4,1200,9,2012,'2012-09-19 08:37:07');
INSERT INTO expense_payment VALUES (15,5,5,500,9,2012,'2012-09-19 08:37:07');
INSERT INTO expense_payment VALUES (16,5,6,500,9,2012,'2012-09-20 13:26:45');
INSERT INTO expense_payment VALUES (17,5,7,464,9,2012,'2012-09-20 13:26:45');
INSERT INTO expense_payment VALUES (18,6,11,4000,9,2012,'2012-09-20 13:27:03');
INSERT INTO expense_payment VALUES (19,6,10,5000,11,2012,'2012-11-15 10:12:00');
INSERT INTO expense_payment VALUES (20,6,11,300,11,2012,'2012-11-15 10:12:24');
INSERT INTO expense_payment VALUES (21,6,12,2000,11,2012,'2012-11-15 10:12:24');
INSERT INTO expense_payment VALUES (22,5,4,500,11,2012,'2012-11-15 10:12:36');

#
# Table structure for table 'passwords'
#

# DROP TABLE IF EXISTS passwords;
CREATE TABLE `passwords` (
  `id` int(5) NOT NULL AUTO_INCREMENT,
  `passwords` varchar(15) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=latin1;

#
# Dumping data for table 'passwords'
#

INSERT INTO passwords VALUES (1,'f4r5ZzBZ');
INSERT INTO passwords VALUES (2,'SXe8ATRu');
INSERT INTO passwords VALUES (3,'PMKEVVjQ');
INSERT INTO passwords VALUES (4,'QgEp45An');
INSERT INTO passwords VALUES (5,'m6MdLtCF');
INSERT INTO passwords VALUES (6,'r9ZUGwFY');
INSERT INTO passwords VALUES (7,'pCndCcKs');
INSERT INTO passwords VALUES (8,'SwEbgQbF');
INSERT INTO passwords VALUES (9,'H3K5jRNR');
INSERT INTO passwords VALUES (10,'dY9BCA9f');

#
# Table structure for table 'payment_type'
#

# DROP TABLE IF EXISTS payment_type;
CREATE TABLE `payment_type` (
  `id` int(5) NOT NULL AUTO_INCREMENT,
  `payment_type` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=latin1;

#
# Dumping data for table 'payment_type'
#

INSERT INTO payment_type VALUES (1,'Cash');
INSERT INTO payment_type VALUES (2,'Cheque');
INSERT INTO payment_type VALUES (3,'MPESA');
INSERT INTO payment_type VALUES (4,'ZAP');
INSERT INTO payment_type VALUES (5,'Yu Cash');
INSERT INTO payment_type VALUES (6,'Orange Money');

#
# Table structure for table 'payments'
#

# DROP TABLE IF EXISTS payments;
CREATE TABLE `payments` (
  `id` int(5) NOT NULL AUTO_INCREMENT,
  `unit_id` int(5) DEFAULT NULL,
  `tenant_id` int(5) DEFAULT NULL,
  `payment` float DEFAULT NULL,
  `actual_payment` float DEFAULT NULL,
  `actual_penalties` float DEFAULT '0',
  `rent_month` int(5) DEFAULT NULL,
  `rent_year` int(5) DEFAULT NULL,
  `banked` int(5) DEFAULT '0',
  `category` int(5) DEFAULT '0',
  `payment_type` int(5) DEFAULT NULL,
  `transactiontime` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=22 DEFAULT CHARSET=latin1;

#
# Dumping data for table 'payments'
#

INSERT INTO payments VALUES (1,15,1,15000,13800,0,7,2012,1,1,NULL,'2012-07-20 06:27:11');
INSERT INTO payments VALUES (2,15,1,16500,15300,0,7,2012,1,2,NULL,'2012-07-20 06:27:11');
INSERT INTO payments VALUES (3,15,1,16500,15300,0,8,2012,0,2,NULL,'2012-08-03 04:30:43');
INSERT INTO payments VALUES (4,17,2,20000,18000,0,8,2012,0,1,NULL,'2012-08-03 10:55:19');
INSERT INTO payments VALUES (5,17,2,10000,9000,0,8,2012,0,2,NULL,'2012-08-03 10:55:19');
INSERT INTO payments VALUES (6,18,3,20000,18000,0,8,2012,0,1,NULL,'2012-08-03 10:59:38');
INSERT INTO payments VALUES (7,18,3,10000,9000,0,8,2012,0,2,NULL,'2012-08-03 10:59:38');
INSERT INTO payments VALUES (8,13,4,5000,5000,0,9,2012,0,1,2,'2012-09-19 08:34:39');
INSERT INTO payments VALUES (9,13,4,5500,5100,0,9,2012,0,2,2,'2012-09-19 08:34:39');
INSERT INTO payments VALUES (11,17,2,10000,9000,0,9,2012,0,2,2,'2012-09-19 09:17:45');
INSERT INTO payments VALUES (12,18,3,10000,9000,0,9,2012,0,2,3,'2012-09-19 09:17:45');
INSERT INTO payments VALUES (17,15,1,18150,15300,1650,9,2012,0,2,1,'2012-09-19 11:26:06');
INSERT INTO payments VALUES (18,17,2,11000,9000,1000,11,2012,0,2,2,'2012-11-15 10:11:18');
INSERT INTO payments VALUES (19,18,3,11000,9000,1000,11,2012,0,2,1,'2012-11-15 10:11:18');
INSERT INTO payments VALUES (20,15,1,18150,15300,1650,11,2012,0,2,3,'2012-11-15 12:30:42');
INSERT INTO payments VALUES (21,13,4,6050,5100,550,11,2012,0,2,1,'2012-11-15 12:30:42');

#
# Table structure for table 'property_details'
#

# DROP TABLE IF EXISTS property_details;
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
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=latin1 COMMENT='latin1_swedish_ci';

#
# Dumping data for table 'property_details'
#

INSERT INTO property_details VALUES (5,'White House','Tena Estate','Tena Estate','Ms Holdings Ltd','0726158156',1,'Barclays Bank','Gikomba','MS Holdings Ltd','458711112','ClydeRMS-778-5',8,5,10,'2012-07-20 06:17:13',7,2012);
INSERT INTO property_details VALUES (6,'Phase 13 236','1642 Thika','Thika','Kayas Kenya Ltd','0720170084',2,'Equity Bank','Harambee Avenue','Kayas Kenya Ltd','0011120004652','ClydeRMS-778-6',10,10,10,'2012-08-03 10:48:34',8,2012);
INSERT INTO property_details VALUES (7,'Zawadi Apartments','Zawadi apartments are located in the Northern Coast of Mombasa','Mombasa','Yusuf Kikabhai','1111111',1,'','','','','ClydeRMS-778-7',10,5,10,'2012-11-17 17:29:04',11,2012);
INSERT INTO property_details VALUES (8,'Zawadi Apartments','Zawadi apartments are located in the Northern Coast of Mombasa','Mombasa','Feisal Sherman','1111111',1,'','','','','ClydeRMS-778-8',10,5,10,'2012-11-17 17:37:10',11,2012);
INSERT INTO property_details VALUES (9,'Zawadi Apartments','Zawadi apartments are located in the Northern Coast of Mombasa','Mombasa','Nurbhai Dossajjee','1111111',1,'','','','','ClydeRMS-778-9',10,5,10,'2012-11-17 17:40:15',11,2012);

#
# Table structure for table 'property_item'
#

# DROP TABLE IF EXISTS property_item;
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
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=20 DEFAULT CHARSET=latin1;

#
# Dumping data for table 'property_item'
#

INSERT INTO property_item VALUES (13,5,'SQ 1','Ground Floor','5000','500',1,4,'2012-07-20 06:20:54',7,2012);
INSERT INTO property_item VALUES (14,5,'SQ 2','Ground Floor','6000','600',0,0,'2012-07-20 06:21:14',7,2012);
INSERT INTO property_item VALUES (15,5,'House No: 3','First Floor','15000','1500',1,1,'2012-07-20 06:23:11',7,2012);
INSERT INTO property_item VALUES (16,5,'House No: 4','First Floor','15000','1500',0,0,'2012-07-20 06:23:27',7,2012);
INSERT INTO property_item VALUES (17,6,'House No. 01','Ground Floor','10000','0',1,2,'2012-08-03 10:50:13',8,2012);
INSERT INTO property_item VALUES (18,6,'House No. 02','Ground Floor','10000','0',1,3,'2012-08-03 10:52:57',8,2012);
INSERT INTO property_item VALUES (19,6,'Second Floor: R','2nd Floor','15000','0',0,0,'2012-11-15 15:10:09',11,2012);

#
# Table structure for table 'rent_payment'
#

# DROP TABLE IF EXISTS rent_payment;
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

#
# Dumping data for table 'rent_payment'
#


#
# Table structure for table 'repairs_table'
#

# DROP TABLE IF EXISTS repairs_table;
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
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;

#
# Dumping data for table 'repairs_table'
#

INSERT INTO repairs_table VALUES (1,5,14,'Glass Door',1500,'Was bought at blah blah coz of blah blah',9,2012,1,'2012-09-19 13:28:56');
INSERT INTO repairs_table VALUES (2,5,14,'Leaky faucet',150,'The faucet was leaking and thus bought a new one to replace it.',9,2012,1,'2012-09-20 12:19:33');
INSERT INTO repairs_table VALUES (3,5,14,'Missing Shower Head',250,'Stolen and thus had to buy.',9,2012,1,'2012-09-20 12:38:38');
INSERT INTO repairs_table VALUES (4,5,14,'Shower Door',500,'Broken in half, had to repair.',11,2012,1,'2012-11-15 12:50:21');

#
# Table structure for table 'tenant_status'
#

# DROP TABLE IF EXISTS tenant_status;
CREATE TABLE `tenant_status` (
  `id` int(5) NOT NULL AUTO_INCREMENT,
  `tenant_status` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;

#
# Dumping data for table 'tenant_status'
#

INSERT INTO tenant_status VALUES (1,'In-House');
INSERT INTO tenant_status VALUES (2,'Vacated');
INSERT INTO tenant_status VALUES (3,'Evicted due to Default');
INSERT INTO tenant_status VALUES (4,'New Occupant');

#
# Table structure for table 'tenants'
#

# DROP TABLE IF EXISTS tenants;
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
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;

#
# Dumping data for table 'tenants'
#

INSERT INTO tenants VALUES (1,'ClydeRMS-569-0001',5,15,'Amani Mwadime','P.O. Box 45222','0721100342','n/a','Mwadime Junior','None',1,'2012-07-20 06:27:11');
INSERT INTO tenants VALUES (2,'ClydeRMS-569-0002',6,17,'James Mwangi','P.O. Box 42008 00100 Nbi','+254721100342','kaguius@gmail.com','Mwangi Irungu','+254704469814',1,'2012-08-03 10:55:19');
INSERT INTO tenants VALUES (3,'ClydeRMS-569-0003',6,18,'Alice Muiruri','P.O. Box 451236 01000 Thika','+254789456123','n/a','n/a','n/a',1,'2012-08-03 10:59:38');
INSERT INTO tenants VALUES (4,'ClydeRMS-569-0004',5,13,'Name','bnadho','0721145632','kaguius@gmail.com','k','l',1,'2012-09-19 08:34:39');

#
# Table structure for table 'user_logs'
#

# DROP TABLE IF EXISTS user_logs;
CREATE TABLE `user_logs` (
  `id` int(5) NOT NULL AUTO_INCREMENT,
  `username` varchar(50) DEFAULT NULL,
  `user_id` int(5) DEFAULT NULL,
  `log_time` datetime DEFAULT NULL,
  `log_ipaddress` varchar(20) DEFAULT NULL,
  `log_browser` varchar(150) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=53 DEFAULT CHARSET=latin1;

#
# Dumping data for table 'user_logs'
#

INSERT INTO user_logs VALUES (1,'kaguius@gmail.com',1,'2012-07-14 07:44:16','127.0.0.1','Mozilla/5.0 (Windows NT 6.1; WOW64; rv:13.0) Gecko/20100101 Firefox/13.0.1');
INSERT INTO user_logs VALUES (2,'kaguius@gmail.com',1,'2012-07-14 07:44:59','127.0.0.1','Mozilla/5.0 (Windows NT 6.1; WOW64; rv:13.0) Gecko/20100101 Firefox/13.0.1');
INSERT INTO user_logs VALUES (3,'kaguius@gmail.com',1,'2012-07-15 11:33:43','127.0.0.1','Mozilla/5.0 (Windows NT 6.1; WOW64; rv:13.0) Gecko/20100101 Firefox/13.0.1');
INSERT INTO user_logs VALUES (4,'kaguius@gmail.com',1,'2012-07-15 11:51:00','127.0.0.1','Mozilla/5.0 (Windows NT 6.1; WOW64; rv:13.0) Gecko/20100101 Firefox/13.0.1');
INSERT INTO user_logs VALUES (5,'kaguius@gmail.com',1,'2012-07-15 11:56:02','127.0.0.1','Mozilla/5.0 (Windows NT 6.1; WOW64; rv:13.0) Gecko/20100101 Firefox/13.0.1');
INSERT INTO user_logs VALUES (6,'kaguius@gmail.com',1,'2012-07-15 12:01:29','127.0.0.1','Mozilla/5.0 (Windows NT 6.1; WOW64; rv:13.0) Gecko/20100101 Firefox/13.0.1');
INSERT INTO user_logs VALUES (7,'kaguius@gmail.com',1,'2012-07-15 12:13:41','127.0.0.1','Mozilla/5.0 (Windows NT 6.1; WOW64; rv:13.0) Gecko/20100101 Firefox/13.0.1');
INSERT INTO user_logs VALUES (8,'kaguius@gmail.com',1,'2012-07-15 12:13:58','127.0.0.1','Mozilla/5.0 (Windows NT 6.1; WOW64; rv:13.0) Gecko/20100101 Firefox/13.0.1');
INSERT INTO user_logs VALUES (9,'kaguius@gmail.com',1,'2012-07-15 12:14:05','127.0.0.1','Mozilla/5.0 (Windows NT 6.1; WOW64; rv:13.0) Gecko/20100101 Firefox/13.0.1');
INSERT INTO user_logs VALUES (10,'kaguius@gmail.com',1,'2012-07-15 12:14:55','127.0.0.1','Mozilla/5.0 (Windows NT 6.1; WOW64; rv:13.0) Gecko/20100101 Firefox/13.0.1');
INSERT INTO user_logs VALUES (11,'kaguius@gmail.com',1,'2012-07-15 12:15:44','127.0.0.1','Mozilla/5.0 (Windows NT 6.1; WOW64; rv:13.0) Gecko/20100101 Firefox/13.0.1');
INSERT INTO user_logs VALUES (12,'kaguius@gmail.com',1,'2012-07-15 12:16:28','127.0.0.1','Mozilla/5.0 (Windows NT 6.1; WOW64; rv:13.0) Gecko/20100101 Firefox/13.0.1');
INSERT INTO user_logs VALUES (13,'kaguius@gmail.com',1,'2012-07-15 12:17:33','127.0.0.1','Mozilla/5.0 (Windows NT 6.1; WOW64; rv:13.0) Gecko/20100101 Firefox/13.0.1');
INSERT INTO user_logs VALUES (14,'kaguius@gmail.com',1,'2012-07-15 12:18:52','127.0.0.1','Mozilla/5.0 (Windows NT 6.1; WOW64; rv:13.0) Gecko/20100101 Firefox/13.0.1');
INSERT INTO user_logs VALUES (15,'kaguius@gmail.com',1,'2012-07-15 12:22:13','127.0.0.1','Mozilla/5.0 (Windows NT 6.1; WOW64; rv:13.0) Gecko/20100101 Firefox/13.0.1');
INSERT INTO user_logs VALUES (16,'kaguius@gmail.com',1,'2012-07-15 12:25:14','127.0.0.1','Mozilla/5.0 (Windows NT 6.1; WOW64; rv:13.0) Gecko/20100101 Firefox/13.0.1');
INSERT INTO user_logs VALUES (17,'kaguius@gmail.com',1,'2012-07-15 12:25:43','127.0.0.1','Mozilla/5.0 (Windows NT 6.1; WOW64; rv:13.0) Gecko/20100101 Firefox/13.0.1');
INSERT INTO user_logs VALUES (18,'kaguius@gmail.com',1,'2012-07-15 12:27:27','127.0.0.1','Mozilla/5.0 (Windows NT 6.1; WOW64; rv:13.0) Gecko/20100101 Firefox/13.0.1');
INSERT INTO user_logs VALUES (19,'kaguius@gmail.com',1,'2012-07-15 12:29:11','127.0.0.1','Mozilla/5.0 (Windows NT 6.1; WOW64; rv:13.0) Gecko/20100101 Firefox/13.0.1');
INSERT INTO user_logs VALUES (20,'kaguius@gmail.com',1,'2012-07-15 12:31:43','127.0.0.1','Mozilla/5.0 (Windows NT 6.1; WOW64; rv:13.0) Gecko/20100101 Firefox/13.0.1');
INSERT INTO user_logs VALUES (21,'kaguius@gmail.com',1,'2012-07-16 04:58:04','127.0.0.1','Mozilla/5.0 (Windows NT 6.1; WOW64; rv:13.0) Gecko/20100101 Firefox/13.0.1');
INSERT INTO user_logs VALUES (22,'kaguius@gmail.com',1,'2012-07-16 13:23:41','127.0.0.1','Mozilla/5.0 (Windows NT 6.1; WOW64; rv:13.0) Gecko/20100101 Firefox/13.0.1');
INSERT INTO user_logs VALUES (23,'admin@admin.com',2,'2012-07-16 13:32:01','127.0.0.1','Mozilla/5.0 (Windows NT 6.1; WOW64; rv:13.0) Gecko/20100101 Firefox/13.0.1');
INSERT INTO user_logs VALUES (24,'kaguius@gmail.com',1,'2012-07-19 06:26:55','127.0.0.1','Mozilla/5.0 (Windows NT 6.1; WOW64; rv:13.0) Gecko/20100101 Firefox/13.0.1');
INSERT INTO user_logs VALUES (25,'kaguius@gmail.com',1,'2012-07-19 06:36:32','127.0.0.1','Mozilla/5.0 (Windows NT 6.1; WOW64; rv:13.0) Gecko/20100101 Firefox/13.0.1');
INSERT INTO user_logs VALUES (26,'kaguius@gmail.com',1,'2012-07-19 10:23:19','127.0.0.1','Mozilla/5.0 (Windows NT 6.1; WOW64; rv:13.0) Gecko/20100101 Firefox/13.0.1');
INSERT INTO user_logs VALUES (27,'kaguius@gmail.com',1,'2012-07-20 05:30:19','127.0.0.1','Mozilla/5.0 (Windows NT 6.1; WOW64; rv:13.0) Gecko/20100101 Firefox/13.0.1');
INSERT INTO user_logs VALUES (28,'kaguius@gmail.com',1,'2012-07-20 09:55:38','127.0.0.1','Mozilla/5.0 (Windows NT 6.1; WOW64; rv:13.0) Gecko/20100101 Firefox/13.0.1');
INSERT INTO user_logs VALUES (29,'kaguius@gmail.com',1,'2012-07-21 07:00:16','127.0.0.1','Mozilla/5.0 (Windows NT 6.1; WOW64; rv:13.0) Gecko/20100101 Firefox/13.0.1');
INSERT INTO user_logs VALUES (30,'kaguius@gmail.com',1,'2012-07-21 07:10:47','127.0.0.1','Mozilla/5.0 (Windows NT 6.1; WOW64; rv:13.0) Gecko/20100101 Firefox/13.0.1');
INSERT INTO user_logs VALUES (31,'kaguius@gmail.com',1,'2012-07-21 07:22:00','127.0.0.1','Mozilla/5.0 (Windows NT 6.1; WOW64; rv:13.0) Gecko/20100101 Firefox/13.0.1');
INSERT INTO user_logs VALUES (32,'kaguius@gmail.com',1,'2012-07-21 07:22:26','127.0.0.1','Mozilla/5.0 (Windows NT 6.1; WOW64; rv:13.0) Gecko/20100101 Firefox/13.0.1');
INSERT INTO user_logs VALUES (33,'kaguius@gmail.com',1,'2012-07-21 07:22:44','127.0.0.1','Mozilla/5.0 (Windows NT 6.1; WOW64; rv:13.0) Gecko/20100101 Firefox/13.0.1');
INSERT INTO user_logs VALUES (34,'kaguius@gmail.com',1,'2012-07-21 11:00:31','127.0.0.1','Mozilla/5.0 (Windows NT 6.1; WOW64; rv:13.0) Gecko/20100101 Firefox/13.0.1');
INSERT INTO user_logs VALUES (35,'kaguius@gmail.com',1,'2012-08-03 04:30:09','127.0.0.1','Mozilla/5.0 (Windows NT 6.1; WOW64; rv:13.0) Gecko/20100101 Firefox/13.0.1');
INSERT INTO user_logs VALUES (36,'kaguius@gmail.com',1,'2012-08-03 10:45:11','127.0.0.1','Mozilla/5.0 (Windows NT 6.1; WOW64; rv:13.0) Gecko/20100101 Firefox/13.0.1');
INSERT INTO user_logs VALUES (37,'kaguius@gmail.com',1,'2012-09-19 08:32:39','127.0.0.1','Mozilla/5.0 (Windows NT 6.1; WOW64; rv:15.0) Gecko/20100101 Firefox/15.0.1');
INSERT INTO user_logs VALUES (38,'kaguius@gmail.com',1,'2012-09-20 12:18:29','127.0.0.1','Mozilla/5.0 (Windows NT 6.1; WOW64; rv:15.0) Gecko/20100101 Firefox/15.0.1');
INSERT INTO user_logs VALUES (39,'kaguius@gmail.com',1,'2012-11-13 19:31:09','127.0.0.1','Mozilla/5.0 (X11; Ubuntu; Linux i686; rv:16.0) Gecko/20100101 Firefox/16.0');
INSERT INTO user_logs VALUES (40,'kaguius@gmail.com',1,'2012-11-15 10:10:43','127.0.0.1','Mozilla/5.0 (X11; Ubuntu; Linux i686; rv:16.0) Gecko/20100101 Firefox/16.0');
INSERT INTO user_logs VALUES (41,'kaguius@gmail.com',1,'2012-11-15 11:51:00','127.0.0.1','Mozilla/5.0 (X11; Ubuntu; Linux i686; rv:16.0) Gecko/20100101 Firefox/16.0');
INSERT INTO user_logs VALUES (42,'kaguius@gmail.com',1,'2012-11-15 14:12:44','127.0.0.1','Mozilla/5.0 (X11; Ubuntu; Linux i686; rv:16.0) Gecko/20100101 Firefox/16.0');
INSERT INTO user_logs VALUES (43,'kaguius@gmail.com',1,'2012-11-15 14:41:16','127.0.0.1','Mozilla/5.0 (X11; Ubuntu; Linux i686; rv:16.0) Gecko/20100101 Firefox/16.0');
INSERT INTO user_logs VALUES (44,'kaguius@gmail.com',1,'2012-11-15 15:07:48','127.0.0.1','Mozilla/5.0 (X11; Ubuntu; Linux i686; rv:16.0) Gecko/20100101 Firefox/16.0');
INSERT INTO user_logs VALUES (45,'kaguius@gmail.com',1,'2012-11-15 15:43:32','127.0.0.1','Mozilla/5.0 (X11; Ubuntu; Linux i686; rv:16.0) Gecko/20100101 Firefox/16.0');
INSERT INTO user_logs VALUES (46,'kaguius@gmail.com',1,'2012-11-15 15:51:00','127.0.0.1','Mozilla/5.0 (X11; Ubuntu; Linux i686; rv:16.0) Gecko/20100101 Firefox/16.0');
INSERT INTO user_logs VALUES (47,'kaguius@gmail.com',1,'2012-11-17 12:20:03','127.0.0.1','Mozilla/5.0 (X11; Ubuntu; Linux i686; rv:16.0) Gecko/20100101 Firefox/16.0');
INSERT INTO user_logs VALUES (48,'kaguius@gmail.com',1,'2012-11-17 12:24:58','127.0.0.1','Mozilla/5.0 (X11; Ubuntu; Linux i686; rv:16.0) Gecko/20100101 Firefox/16.0');
INSERT INTO user_logs VALUES (49,'kaguius@gmail.com',1,'2012-11-17 12:40:28','127.0.0.1','Mozilla/5.0 (X11; Ubuntu; Linux i686; rv:16.0) Gecko/20100101 Firefox/16.0');
INSERT INTO user_logs VALUES (50,'kaguius@gmail.com',1,'2012-11-17 14:45:13','127.0.0.1','Mozilla/5.0 (X11; Ubuntu; Linux i686; rv:16.0) Gecko/20100101 Firefox/16.0');
INSERT INTO user_logs VALUES (51,'kaguius@gmail.com',1,'2012-11-17 16:35:28','127.0.0.1','Mozilla/5.0 (X11; Ubuntu; Linux i686; rv:16.0) Gecko/20100101 Firefox/16.0');
INSERT INTO user_logs VALUES (52,'kaguius@gmail.com',1,'2012-11-17 17:19:25','127.0.0.1','Mozilla/5.0 (X11; Ubuntu; Linux i686; rv:16.0) Gecko/20100101 Firefox/16.0');

#
# Table structure for table 'user_profiles'
#

# DROP TABLE IF EXISTS user_profiles;
CREATE TABLE `user_profiles` (
  `id` int(5) NOT NULL AUTO_INCREMENT,
  `first_name` varchar(50) DEFAULT NULL,
  `last_name` varchar(50) DEFAULT NULL,
  `email_address` varchar(50) DEFAULT NULL,
  `password_main` varchar(100) DEFAULT NULL,
  `password_confirm` varchar(100) DEFAULT NULL,
  `phone_number` varchar(50) DEFAULT NULL,
  `admin_status` int(5) DEFAULT '3',
  `transactiontime` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

#
# Dumping data for table 'user_profiles'
#

INSERT INTO user_profiles VALUES (1,'Andrew','Kibe','kaguius@gmail.com','c5cc866787366e0436182a20831e2d08','c5cc866787366e0436182a20831e2d08','+254704469814',1,'2012-07-14 07:09:00');
INSERT INTO user_profiles VALUES (2,'Admin','Admin','admin@admin.com','c5cc866787366e0436182a20831e2d08','c5cc866787366e0436182a20831e2d08','+254721121121',1,'2012-07-14 07:09:00');


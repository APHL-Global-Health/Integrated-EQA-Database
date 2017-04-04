-- MySQL dump 10.13  Distrib 5.7.12, for Win32 (AMD64)
--
-- Host: 127.0.0.1    Database: eanalyze
-- ------------------------------------------------------
-- Server version	5.5.5-10.1.19-MariaDB

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
-- Table structure for table `contact_us`
--

DROP TABLE IF EXISTS `contact_us`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `contact_us` (
  `contact_id` int(11) NOT NULL AUTO_INCREMENT,
  `first_name` varchar(255) DEFAULT NULL,
  `last_name` varchar(255) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `phone` varchar(255) DEFAULT NULL,
  `reason` varchar(255) DEFAULT NULL,
  `lab` varchar(255) DEFAULT NULL,
  `additional_info` text,
  `contacted_on` datetime DEFAULT NULL,
  `ip_address` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`contact_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `contact_us`
--

LOCK TABLES `contact_us` WRITE;
/*!40000 ALTER TABLE `contact_us` DISABLE KEYS */;
/*!40000 ALTER TABLE `contact_us` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `countries`
--

DROP TABLE IF EXISTS `countries`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `countries` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `iso_name` varchar(255) COLLATE utf8_bin NOT NULL,
  `iso2` varchar(2) COLLATE utf8_bin NOT NULL,
  `iso3` varchar(3) COLLATE utf8_bin NOT NULL,
  `numeric_code` smallint(6) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `id` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=250 DEFAULT CHARSET=utf8 COLLATE=utf8_bin;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `countries`
--

LOCK TABLES `countries` WRITE;
/*!40000 ALTER TABLE `countries` DISABLE KEYS */;
INSERT INTO `countries` VALUES (1,'Afghanistan','AF','AFG',4),(2,'Aland Islands','AX','ALA',248),(3,'Albania','AL','ALB',8),(4,'Algeria','DZ','DZA',12),(5,'American Samoa','AS','ASM',16),(6,'Andorra','AD','AND',20),(7,'Angola','AO','AGO',24),(8,'Anguilla','AI','AIA',660),(9,'Antarctica','AQ','ATA',10),(10,'Antigua and Barbuda','AG','ATG',28),(11,'Argentina','AR','ARG',32),(12,'Armenia','AM','ARM',51),(13,'Aruba','AW','ABW',533),(14,'Australia','AU','AUS',36),(15,'Austria','AT','AUT',40),(16,'Azerbaijan','AZ','AZE',31),(17,'Bahamas','BS','BHS',44),(18,'Bahrain','BH','BHR',48),(19,'Bangladesh','BD','BGD',50),(20,'Barbados','BB','BRB',52),(21,'Belarus','BY','BLR',112),(22,'Belgium','BE','BEL',56),(23,'Belize','BZ','BLZ',84),(24,'Benin','BJ','BEN',204),(25,'Bermuda','BM','BMU',60),(26,'Bhutan','BT','BTN',64),(27,'Bolivia, Plurinational State of','BO','BOL',68),(28,'Bonaire, Sint Eustatius and Saba','BQ','BES',535),(29,'Bosnia and Herzegovina','BA','BIH',70),(30,'Botswana','BW','BWA',72),(31,'Bouvet Island','BV','BVT',74),(32,'Brazil','BR','BRA',76),(33,'British Indian Ocean Territory','IO','IOT',86),(34,'Brunei Darussalam','BN','BRN',96),(35,'Bulgaria','BG','BGR',100),(36,'Burkina Faso','BF','BFA',854),(37,'Burundi','BI','BDI',108),(38,'Cambodia','KH','KHM',116),(39,'Cameroon','CM','CMR',120),(40,'Canada','CA','CAN',124),(41,'Cape Verde','CV','CPV',132),(42,'Cayman Islands','KY','CYM',136),(43,'Central African Republic','CF','CAF',140),(44,'Chad','TD','TCD',148),(45,'Chile','CL','CHL',152),(46,'China','CN','CHN',156),(47,'Christmas Island','CX','CXR',162),(48,'Cocos (Keeling) Islands','CC','CCK',166),(49,'Colombia','CO','COL',170),(50,'Comoros','KM','COM',174),(51,'Congo','CG','COG',178),(52,'Congo, the Democratic Republic of the','CD','COD',180),(53,'Cook Islands','CK','COK',184),(54,'Costa Rica','CR','CRI',188),(55,'Cote d\'Ivoire','CI','CIV',384),(56,'Croatia','HR','HRV',191),(57,'Cuba','CU','CUB',192),(58,'Cura','CW','CUW',531),(59,'Cyprus','CY','CYP',196),(60,'Czech Republic','CZ','CZE',203),(61,'Denmark','DK','DNK',208),(62,'Djibouti','DJ','DJI',262),(63,'Dominica','DM','DMA',212),(64,'Dominican Republic','DO','DOM',214),(65,'Ecuador','EC','ECU',218),(66,'Egypt','EG','EGY',818),(67,'El Salvador','SV','SLV',222),(68,'Equatorial Guinea','GQ','GNQ',226),(69,'Eritrea','ER','ERI',232),(70,'Estonia','EE','EST',233),(71,'Ethiopia','ET','ETH',231),(72,'Falkland Islands (Malvinas)','FK','FLK',238),(73,'Faroe Islands','FO','FRO',234),(74,'Fiji','FJ','FJI',242),(75,'Finland','FI','FIN',246),(76,'France','FR','FRA',250),(77,'French Guiana','GF','GUF',254),(78,'French Polynesia','PF','PYF',258),(79,'French Southern Territories','TF','ATF',260),(80,'Gabon','GA','GAB',266),(81,'Gambia','GM','GMB',270),(82,'Georgia','GE','GEO',268),(83,'Germany','DE','DEU',276),(84,'Ghana','GH','GHA',288),(85,'Gibraltar','GI','GIB',292),(86,'Greece','GR','GRC',300),(87,'Greenland','GL','GRL',304),(88,'Grenada','GD','GRD',308),(89,'Guadeloupe','GP','GLP',312),(90,'Guam','GU','GUM',316),(91,'Guatemala','GT','GTM',320),(92,'Guernsey','GG','GGY',831),(93,'Guinea','GN','GIN',324),(94,'Guinea-Bissau','GW','GNB',624),(95,'Guyana','GY','GUY',328),(96,'Haiti','HT','HTI',332),(97,'Heard Island and McDonald Islands','HM','HMD',334),(98,'Holy See (Vatican City State)','VA','VAT',336),(99,'Honduras','HN','HND',340),(100,'Hong Kong','HK','HKG',344),(101,'Hungary','HU','HUN',348),(102,'Iceland','IS','ISL',352),(103,'India','IN','IND',356),(104,'Indonesia','ID','IDN',360),(105,'Iran, Islamic Republic of','IR','IRN',364),(106,'Iraq','IQ','IRQ',368),(107,'Ireland','IE','IRL',372),(108,'Isle of Man','IM','IMN',833),(109,'Israel','IL','ISR',376),(110,'Italy','IT','ITA',380),(111,'Jamaica','JM','JAM',388),(112,'Japan','JP','JPN',392),(113,'Jersey','JE','JEY',832),(114,'Jordan','JO','JOR',400),(115,'Kazakhstan','KZ','KAZ',398),(116,'Kenya','KE','KEN',404),(117,'Kiribati','KI','KIR',296),(118,'Korea, Democratic People\'s Republic of','KP','PRK',408),(119,'Korea, Republic of','KR','KOR',410),(120,'Kuwait','KW','KWT',414),(121,'Kyrgyzstan','KG','KGZ',417),(122,'Lao People\'s Democratic Republic','LA','LAO',418),(123,'Latvia','LV','LVA',428),(124,'Lebanon','LB','LBN',422),(125,'Lesotho','LS','LSO',426),(126,'Liberia','LR','LBR',430),(127,'Libya','LY','LBY',434),(128,'Liechtenstein','LI','LIE',438),(129,'Lithuania','LT','LTU',440),(130,'Luxembourg','LU','LUX',442),(131,'Macao','MO','MAC',446),(132,'Macedonia, the former Yugoslav Republic of','MK','MKD',807),(133,'Madagascar','MG','MDG',450),(134,'Malawi','MW','MWI',454),(135,'Malaysia','MY','MYS',458),(136,'Maldives','MV','MDV',462),(137,'Mali','ML','MLI',466),(138,'Malta','MT','MLT',470),(139,'Marshall Islands','MH','MHL',584),(140,'Martinique','MQ','MTQ',474),(141,'Mauritania','MR','MRT',478),(142,'Mauritius','MU','MUS',480),(143,'Mayotte','YT','MYT',175),(144,'Mexico','MX','MEX',484),(145,'Micronesia, Federated States of','FM','FSM',583),(146,'Moldova, Republic of','MD','MDA',498),(147,'Monaco','MC','MCO',492),(148,'Mongolia','MN','MNG',496),(149,'Montenegro','ME','MNE',499),(150,'Montserrat','MS','MSR',500),(151,'Morocco','MA','MAR',504),(152,'Mozambique','MZ','MOZ',508),(153,'Myanmar','MM','MMR',104),(154,'Namibia','NA','NAM',516),(155,'Nauru','NR','NRU',520),(156,'Nepal','NP','NPL',524),(157,'Netherlands','NL','NLD',528),(158,'New Caledonia','NC','NCL',540),(159,'New Zealand','NZ','NZL',554),(160,'Nicaragua','NI','NIC',558),(161,'Niger','NE','NER',562),(162,'Nigeria','NG','NGA',566),(163,'Niue','NU','NIU',570),(164,'Norfolk Island','NF','NFK',574),(165,'Northern Mariana Islands','MP','MNP',580),(166,'Norway','NO','NOR',578),(167,'Oman','OM','OMN',512),(168,'Pakistan','PK','PAK',586),(169,'Palau','PW','PLW',585),(170,'Palestine, State of','PS','PSE',275),(171,'Panama','PA','PAN',591),(172,'Papua New Guinea','PG','PNG',598),(173,'Paraguay','PY','PRY',600),(174,'Peru','PE','PER',604),(175,'Philippines','PH','PHL',608),(176,'Pitcairn','PN','PCN',612),(177,'Poland','PL','POL',616),(178,'Portugal','PT','PRT',620),(179,'Puerto Rico','PR','PRI',630),(180,'Qatar','QA','QAT',634),(181,'Reunion','RE','REU',638),(182,'Romania','RO','ROU',642),(183,'Russian Federation','RU','RUS',643),(184,'Rwanda','RW','RWA',646),(185,'Saint Barthelemy','BL','BLM',652),(186,'Saint Helena, Ascension and Tristan da Cunha','SH','SHN',654),(187,'Saint Kitts and Nevis','KN','KNA',659),(188,'Saint Lucia','LC','LCA',662),(189,'Saint Martin (French part)','MF','MAF',663),(190,'Saint Pierre and Miquelon','PM','SPM',666),(191,'Saint Vincent and the Grenadines','VC','VCT',670),(192,'Samoa','WS','WSM',882),(193,'San Marino','SM','SMR',674),(194,'Sao Tome and Principe','ST','STP',678),(195,'Saudi Arabia','SA','SAU',682),(196,'Senegal','SN','SEN',686),(197,'Serbia','RS','SRB',688),(198,'Seychelles','SC','SYC',690),(199,'Sierra Leone','SL','SLE',694),(200,'Singapore','SG','SGP',702),(201,'Sint Maarten (Dutch part)','SX','SXM',534),(202,'Slovakia','SK','SVK',703),(203,'Slovenia','SI','SVN',705),(204,'Solomon Islands','SB','SLB',90),(205,'Somalia','SO','SOM',706),(206,'South Africa','ZA','ZAF',710),(207,'South Georgia and the South Sandwich Islands','GS','SGS',239),(208,'South Sudan','SS','SSD',728),(209,'Spain','ES','ESP',724),(210,'Sri Lanka','LK','LKA',144),(211,'Sudan','SD','SDN',729),(212,'Suriname','SR','SUR',740),(213,'Svalbard and Jan Mayen','SJ','SJM',744),(214,'Swaziland','SZ','SWZ',748),(215,'Sweden','SE','SWE',752),(216,'Switzerland','CH','CHE',756),(217,'Syrian Arab Republic','SY','SYR',760),(218,'Taiwan, Province of China','TW','TWN',158),(219,'Tajikistan','TJ','TJK',762),(220,'Tanzania, United Republic of','TZ','TZA',834),(221,'Thailand','TH','THA',764),(222,'Timor-Leste','TL','TLS',626),(223,'Togo','TG','TGO',768),(224,'Tokelau','TK','TKL',772),(225,'Tonga','TO','TON',776),(226,'Trinidad and Tobago','TT','TTO',780),(227,'Tunisia','TN','TUN',788),(228,'Turkey','TR','TUR',792),(229,'Turkmenistan','TM','TKM',795),(230,'Turks and Caicos Islands','TC','TCA',796),(231,'Tuvalu','TV','TUV',798),(232,'Uganda','UG','UGA',800),(233,'Ukraine','UA','UKR',804),(234,'United Arab Emirates','AE','ARE',784),(235,'United Kingdom','GB','GBR',826),(236,'United States','US','USA',840),(237,'United States Minor Outlying Islands','UM','UMI',581),(238,'Uruguay','UY','URY',858),(239,'Uzbekistan','UZ','UZB',860),(240,'Vanuatu','VU','VUT',548),(241,'Venezuela, Bolivarian Republic of','VE','VEN',862),(242,'Viet Nam','VN','VNM',704),(243,'Virgin Islands, British','VG','VGB',92),(244,'Virgin Islands, U.S.','VI','VIR',850),(245,'Wallis and Futuna','WF','WLF',876),(246,'Western Sahara','EH','ESH',732),(247,'Yemen','YE','YEM',887),(248,'Zambia','ZM','ZMB',894),(249,'Zimbabwe','ZW','ZWE',716);
/*!40000 ALTER TABLE `countries` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `data_manager`
--

DROP TABLE IF EXISTS `data_manager`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `data_manager` (
  `dm_id` int(11) NOT NULL AUTO_INCREMENT,
  `primary_email` varchar(255) NOT NULL,
  `password` varchar(45) DEFAULT NULL,
  `institute` varchar(500) DEFAULT NULL,
  `first_name` varchar(45) DEFAULT NULL,
  `last_name` varchar(45) DEFAULT NULL,
  `phone` varchar(45) DEFAULT NULL,
  `secondary_email` varchar(45) DEFAULT NULL,
  `UserFld1` varchar(45) DEFAULT NULL,
  `UserFld2` varchar(45) DEFAULT NULL,
  `UserFld3` varchar(45) DEFAULT NULL,
  `mobile` varchar(45) DEFAULT NULL,
  `force_password_reset` int(1) NOT NULL DEFAULT '0',
  `qc_access` varchar(100) DEFAULT NULL,
  `enable_adding_test_response_date` varchar(45) DEFAULT NULL,
  `enable_choosing_mode_of_receipt` varchar(45) DEFAULT NULL,
  `view_only_access` varchar(45) DEFAULT NULL,
  `status` varchar(255) NOT NULL DEFAULT 'inactive',
  `created_on` datetime DEFAULT NULL,
  `created_by` varchar(255) DEFAULT NULL,
  `updated_on` datetime DEFAULT NULL,
  `updated_by` varchar(255) DEFAULT NULL,
  `last_login` datetime DEFAULT NULL,
  `IsVl` varchar(45) DEFAULT '0',
  PRIMARY KEY (`dm_id`),
  UNIQUE KEY `primary_email` (`primary_email`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1 COMMENT='A PT user Table for Data entry or report printing';
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `data_manager`
--

LOCK TABLES `data_manager` WRITE;
/*!40000 ALTER TABLE `data_manager` DISABLE KEYS */;
INSERT INTO `data_manager` VALUES (1,'brianonyi@gmail.com','boblacaster1988@','bvidolo Lab','Brian','Vidolo','0711560619','boblacaster@yahoo.com',NULL,NULL,NULL,'0727547388',0,'yes','yes','yes','no','active','2017-02-01 10:22:34','1','2017-04-03 20:37:45','1','2017-03-27 22:17:33','3'),(2,'vvidal@gmail.com','boblacaster1988@','Kenyatta Hospital','Victor','Vidal','','vvidal@gmail.com',NULL,NULL,NULL,'0727547388',0,'no','yes','yes','no','active','2017-03-20 08:36:31','1',NULL,NULL,'2017-03-27 22:18:01','0');
/*!40000 ALTER TABLE `data_manager` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `distributions`
--

DROP TABLE IF EXISTS `distributions`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `distributions` (
  `distribution_id` int(11) NOT NULL AUTO_INCREMENT,
  `distribution_code` varchar(255) NOT NULL,
  `distribution_date` date NOT NULL,
  `status` varchar(255) NOT NULL,
  `created_on` datetime DEFAULT NULL,
  `created_by` varchar(255) DEFAULT NULL,
  `updated_on` datetime DEFAULT NULL,
  `updated_by` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`distribution_id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `distributions`
--

LOCK TABLES `distributions` WRITE;
/*!40000 ALTER TABLE `distributions` DISABLE KEYS */;
INSERT INTO `distributions` VALUES (1,'PT001','2017-02-15','shipped','2017-02-01 10:23:41','1',NULL,NULL),(2,'PT002','2017-03-15','shipped','2017-03-19 20:32:56','1','2017-03-20 08:59:52','1'),(3,'P003','2017-03-16','shipped','2017-03-27 21:50:30','1',NULL,NULL);
/*!40000 ALTER TABLE `distributions` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `dts_recommended_testkits`
--

DROP TABLE IF EXISTS `dts_recommended_testkits`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `dts_recommended_testkits` (
  `test_no` int(11) NOT NULL,
  `testkit` varchar(255) NOT NULL,
  PRIMARY KEY (`test_no`,`testkit`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `dts_recommended_testkits`
--

LOCK TABLES `dts_recommended_testkits` WRITE;
/*!40000 ALTER TABLE `dts_recommended_testkits` DISABLE KEYS */;
INSERT INTO `dts_recommended_testkits` VALUES (1,'tk50f41f66a2388'),(1,'tk50f41f66a238f'),(1,'tk50f41f66a2399'),(1,'tk50f41f66a239e'),(1,'tk50f41f66a23a7'),(1,'tk50f41f66a23b1'),(1,'tk50f41f66a23b5'),(1,'tk50f41f66a23ba'),(1,'tk50f41f66a23bf'),(1,'tk50f41f66a23c4'),(1,'tk50f41f66a23c8'),(1,'tk50f41f66a23cd'),(1,'tk50f41f66a23d1'),(1,'tk50f41f66a23d6'),(1,'tk50f41f66a23db'),(1,'tk50f41f66a23df'),(1,'tk50f41f66a23e3'),(1,'tk50f41f66a23e8'),(1,'tk50f41f66a23ed'),(1,'tk50f41f66a23f1'),(1,'tk50f41f66a23f6'),(1,'tk50f41f66a23fa'),(1,'tk50f41f66a23ff'),(1,'tk50f41f66a2404'),(1,'tk50f41f66a2408'),(1,'tk50f41f66a240d'),(1,'tk50f41f66a2411'),(1,'tk50f41f66a2415'),(1,'tk50f41f66a241a'),(1,'tk50f41f66a241f'),(1,'tk50f41f66a2423'),(1,'tk50f41f66a2428'),(1,'tk50f41f66a242c'),(1,'tk50f41f66a2430'),(1,'tk50f41f66a2435'),(1,'tk50f41f66a2439'),(1,'tk50f41f66a243e'),(1,'tk50f41f66a2443'),(1,'tk50f41f66a2447'),(1,'tk50f41f66a244b'),(1,'tk5136b425387a4'),(1,'tk5137b608ac1d9'),(1,'tk51435b69f3b7e'),(1,'tk514b50a81832c'),(2,'tk50f41f66a238f'),(2,'tk50f41f66a23df'),(2,'tk50f41f66a2423'),(2,'tk50f41f66a2428'),(3,'tk50f41f66a2388'),(3,'tk50f41f66a238f'),(3,'tk50f41f66a2399'),(3,'tk50f41f66a239e'),(3,'tk50f41f66a23a7'),(3,'tk50f41f66a23b1'),(3,'tk50f41f66a23b5'),(3,'tk50f41f66a23ba'),(3,'tk50f41f66a23bf'),(3,'tk50f41f66a23c4'),(3,'tk50f41f66a23c8'),(3,'tk50f41f66a23cd'),(3,'tk50f41f66a23d1'),(3,'tk50f41f66a23d6'),(3,'tk50f41f66a23db'),(3,'tk50f41f66a23df'),(3,'tk50f41f66a23e3'),(3,'tk50f41f66a23e8'),(3,'tk50f41f66a23ed'),(3,'tk50f41f66a23f1'),(3,'tk50f41f66a23f6'),(3,'tk50f41f66a23fa'),(3,'tk50f41f66a23ff'),(3,'tk50f41f66a2404'),(3,'tk50f41f66a2408'),(3,'tk50f41f66a240d'),(3,'tk50f41f66a2411'),(3,'tk50f41f66a2415'),(3,'tk50f41f66a241a'),(3,'tk50f41f66a241f'),(3,'tk50f41f66a2423'),(3,'tk50f41f66a2428'),(3,'tk50f41f66a242c'),(3,'tk50f41f66a2430'),(3,'tk50f41f66a2435'),(3,'tk50f41f66a2439'),(3,'tk50f41f66a243e'),(3,'tk50f41f66a2443'),(3,'tk50f41f66a2447'),(3,'tk50f41f66a244b'),(3,'tk5136b425387a4'),(3,'tk5137b608ac1d9'),(3,'tk51435b69f3b7e'),(3,'tk514b50a81832c');
/*!40000 ALTER TABLE `dts_recommended_testkits` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `dts_shipment_corrective_action_map`
--

DROP TABLE IF EXISTS `dts_shipment_corrective_action_map`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `dts_shipment_corrective_action_map` (
  `shipment_map_id` int(11) NOT NULL,
  `corrective_action_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `dts_shipment_corrective_action_map`
--

LOCK TABLES `dts_shipment_corrective_action_map` WRITE;
/*!40000 ALTER TABLE `dts_shipment_corrective_action_map` DISABLE KEYS */;
/*!40000 ALTER TABLE `dts_shipment_corrective_action_map` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `enrollments`
--

DROP TABLE IF EXISTS `enrollments`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `enrollments` (
  `scheme_id` varchar(255) NOT NULL,
  `participant_id` int(11) NOT NULL,
  `enrolled_on` date DEFAULT NULL,
  `enrollment_ended_on` date DEFAULT NULL,
  `status` varchar(255) NOT NULL,
  PRIMARY KEY (`scheme_id`,`participant_id`),
  KEY `participant_id` (`participant_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `enrollments`
--

LOCK TABLES `enrollments` WRITE;
/*!40000 ALTER TABLE `enrollments` DISABLE KEYS */;
INSERT INTO `enrollments` VALUES ('eid',1,'2017-02-10',NULL,'enrolled'),('eid',8,'2017-03-19',NULL,'enrolled'),('eid',9,'2017-03-19',NULL,'enrolled'),('vl',1,'2017-02-01',NULL,'enrolled'),('vl',8,'2017-03-19',NULL,'enrolled'),('vl',9,'2017-03-19',NULL,'enrolled');
/*!40000 ALTER TABLE `enrollments` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `facility`
--

DROP TABLE IF EXISTS `facility`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `facility` (
  `ID` int(11) NOT NULL AUTO_INCREMENT,
  `FacilityName` varchar(100) DEFAULT NULL,
  `MFLCode` varchar(50) DEFAULT NULL,
  `Department` int(11) DEFAULT NULL,
  `PhysicalAddress` varchar(50) DEFAULT NULL,
  `PostalAddress` varchar(50) DEFAULT NULL,
  `Email` varchar(50) DEFAULT NULL,
  `Town` varchar(20) DEFAULT NULL,
  `Telephone` varchar(30) DEFAULT NULL,
  `County` int(11) DEFAULT NULL,
  `Country` int(11) DEFAULT NULL,
  `Partner` varchar(50) DEFAULT NULL,
  `ContactName` varchar(50) DEFAULT NULL,
  `ContactEmail` varchar(50) DEFAULT NULL,
  `ContactTelephone` varchar(30) DEFAULT NULL,
  `additionalinfo` text,
  PRIMARY KEY (`ID`),
  KEY `Department` (`Department`),
  KEY `County` (`County`),
  CONSTRAINT `facility_ibfk_2` FOREIGN KEY (`County`) REFERENCES `rep_counties` (`CountyID`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB AUTO_INCREMENT=14 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `facility`
--

LOCK TABLES `facility` WRITE;
/*!40000 ALTER TABLE `facility` DISABLE KEYS */;
INSERT INTO `facility` VALUES (2,'Kenyatta','001',1,'4465','fvg','boblacaster@yahoo.com','Nairobi','739273',20,17,'Test','brian','brianonyi@gmail.com','45656',''),(7,'Kenyatta Hospital','F001',1,'Upperhill','47074','boblacaster@yahoo.com','Nairobi','0727547388',30,116,'1','Brian Vidolo','brianonyi@gmail.com','0727547388','welccome'),(8,'Kenyatta Hospital','F001',1,'Upperhill','5454','boblacaster@yahoo.com','Nairobi','5334',30,116,'1','Brian Vidolo','brianonyi@gmail.com','64533','welcome'),(9,'Kenyatta Hospital','F001',1,'Upperhill','5454','boblacaster@yahoo.com','Nairobi','5334',30,116,'1','Brian Vidolo','brianonyi@gmail.com','64533','welcome'),(10,'Kenyatta Hospital','F001',1,'Upperhill','5454','boblacaster@yahoo.com','Nairobi','5334',30,116,'1','Brian Vidolo','brianonyi@gmail.com','64533','welcome'),(11,'Kenyatta Hospital','F001',1,'Upperhill','5454','boblacaster@yahoo.com','Nairobi','5334',30,116,'1','Brian Vidolo','brianonyi@gmail.com','64533','welcome'),(12,'Kenyatta Hospital','F001',1,'Upperhill','47074','boblacaster@yahoo.com','Nairobi','064545',30,116,'1','Brian Vidolo','brianonyi@gmail.com','324243',''),(13,'Kenyatta Hospital','F001',1,'Upperhill','47074','boblacaster@yahoo.com','Nairobi','064545',30,116,'1','Brian Vidolo','brianonyi@gmail.com','324243','');
/*!40000 ALTER TABLE `facility` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `facilityplatform`
--

DROP TABLE IF EXISTS `facilityplatform`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `facilityplatform` (
  `ID` int(11) NOT NULL AUTO_INCREMENT,
  `FacilityID` int(11) DEFAULT NULL,
  `PlatformID` int(11) DEFAULT NULL,
  PRIMARY KEY (`ID`),
  KEY `PlatformID` (`PlatformID`),
  KEY `facilityplatform_ibfk_1` (`FacilityID`),
  CONSTRAINT `facilityplatform_ibfk_1` FOREIGN KEY (`FacilityID`) REFERENCES `participant` (`participant_id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `facilityplatform_ibfk_2` FOREIGN KEY (`PlatformID`) REFERENCES `vl_platform` (`ID`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `facilityplatform`
--

LOCK TABLES `facilityplatform` WRITE;
/*!40000 ALTER TABLE `facilityplatform` DISABLE KEYS */;
INSERT INTO `facilityplatform` VALUES (1,8,1),(2,8,4);
/*!40000 ALTER TABLE `facilityplatform` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `facilityscheme`
--

DROP TABLE IF EXISTS `facilityscheme`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `facilityscheme` (
  `ID` int(11) NOT NULL AUTO_INCREMENT,
  `FacilityID` int(11) DEFAULT NULL,
  `SchemeID` int(11) DEFAULT NULL,
  PRIMARY KEY (`ID`),
  KEY `SchemeID` (`SchemeID`),
  KEY `facilityscheme_ibfk_1` (`FacilityID`),
  CONSTRAINT `facilityscheme_ibfk_1` FOREIGN KEY (`FacilityID`) REFERENCES `participant` (`participant_id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `facilityscheme_ibfk_2` FOREIGN KEY (`SchemeID`) REFERENCES `vl_scheme` (`ID`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `facilityscheme`
--

LOCK TABLES `facilityscheme` WRITE;
/*!40000 ALTER TABLE `facilityscheme` DISABLE KEYS */;
INSERT INTO `facilityscheme` VALUES (2,8,1),(3,8,2);
/*!40000 ALTER TABLE `facilityscheme` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `global_config`
--

DROP TABLE IF EXISTS `global_config`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `global_config` (
  `name` varchar(255) NOT NULL,
  `value` mediumtext NOT NULL,
  PRIMARY KEY (`name`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `global_config`
--

LOCK TABLES `global_config` WRITE;
/*!40000 ALTER TABLE `global_config` DISABLE KEYS */;
INSERT INTO `global_config` VALUES ('admin_email','eptmanager@gmail.com'),('custom_field_1',''),('custom_field_2',''),('custom_field_needed','no'),('pass_percentage','95'),('qc_access','no'),('response_after_evaluate','no'),('text_under_logo','Test Instance for Viral Load and Early Infant Diagnosis PT Schemes');
/*!40000 ALTER TABLE `global_config` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `home_banner`
--

DROP TABLE IF EXISTS `home_banner`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `home_banner` (
  `banner_id` int(11) NOT NULL AUTO_INCREMENT,
  `image` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`banner_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `home_banner`
--

LOCK TABLES `home_banner` WRITE;
/*!40000 ALTER TABLE `home_banner` DISABLE KEYS */;
/*!40000 ALTER TABLE `home_banner` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `mail_template`
--

DROP TABLE IF EXISTS `mail_template`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `mail_template` (
  `mail_temp_id` int(11) NOT NULL AUTO_INCREMENT,
  `mail_purpose` varchar(255) NOT NULL,
  `from_name` varchar(255) DEFAULT NULL,
  `mail_from` varchar(255) DEFAULT NULL,
  `mail_cc` varchar(255) DEFAULT NULL,
  `mail_bcc` varchar(255) DEFAULT NULL,
  `mail_subject` varchar(255) DEFAULT NULL,
  `mail_content` text,
  `mail_footer` text,
  PRIMARY KEY (`mail_temp_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `mail_template`
--

LOCK TABLES `mail_template` WRITE;
/*!40000 ALTER TABLE `mail_template` DISABLE KEYS */;
/*!40000 ALTER TABLE `mail_template` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `participant`
--

DROP TABLE IF EXISTS `participant`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `participant` (
  `participant_id` int(11) NOT NULL AUTO_INCREMENT,
  `unique_identifier` varchar(255) NOT NULL,
  `individual` varchar(255) DEFAULT NULL,
  `lab_name` varchar(500) CHARACTER SET utf8 COLLATE utf8_bin DEFAULT NULL,
  `institute_name` varchar(255) CHARACTER SET utf8 COLLATE utf8_bin DEFAULT NULL,
  `department_name` varchar(255) DEFAULT NULL,
  `address` varchar(500) DEFAULT NULL,
  `city` varchar(255) DEFAULT NULL,
  `state` varchar(255) DEFAULT NULL,
  `country` int(11) DEFAULT NULL,
  `zip` varchar(255) DEFAULT NULL,
  `long` varchar(255) DEFAULT NULL,
  `lat` varchar(255) DEFAULT NULL,
  `shipping_address` varchar(1000) DEFAULT NULL,
  `funding_source` varchar(255) DEFAULT NULL,
  `testing_volume` varchar(255) DEFAULT NULL,
  `enrolled_programs` varchar(255) DEFAULT NULL,
  `site_type` varchar(255) DEFAULT NULL,
  `region` varchar(255) DEFAULT NULL,
  `first_name` varchar(500) CHARACTER SET utf8 COLLATE utf8_bin DEFAULT NULL,
  `last_name` varchar(45) DEFAULT NULL,
  `mobile` varchar(45) DEFAULT NULL,
  `phone` varchar(45) DEFAULT NULL,
  `contact_name` varchar(255) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `affiliation` varchar(45) DEFAULT NULL,
  `network_tier` int(11) DEFAULT NULL,
  `created_on` datetime DEFAULT NULL,
  `created_by` varchar(45) DEFAULT NULL,
  `updated_on` datetime DEFAULT NULL,
  `updated_by` varchar(45) DEFAULT NULL,
  `status` varchar(255) DEFAULT 'inactive',
  PRIMARY KEY (`participant_id`),
  UNIQUE KEY `unique_identifier` (`unique_identifier`)
) ENGINE=InnoDB AUTO_INCREMENT=12 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `participant`
--

LOCK TABLES `participant` WRITE;
/*!40000 ALTER TABLE `participant` DISABLE KEYS */;
INSERT INTO `participant` VALUES (1,'P001','yes',NULL,'bvidolo Lab','lab','','Nairobi','',116,'','','','','','',NULL,'7','Nairobi','busia ','lab','','','','brianonyi@gmail.com','Hospital',1,'2017-02-01 10:20:59','eptmanager@gmail.com',NULL,NULL,'active'),(2,'P002','yes',NULL,'Kenyatta',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'kakamega','lab',NULL,'0727547388',NULL,'brianonyi2@gmail.com',NULL,NULL,'2017-02-22 08:20:54','eptmanager@gmail.com',NULL,NULL,'active'),(8,'F001','no','Kenyatta Hospital','Kenyatta Hospital','Labaratory','upperhill','Nairobi','',116,'00100-47438','','','47676 Nairobi, Kenya','','',NULL,'','BARINGO','Kenyatta Hospital','','4354545','5454545','Brian Vidolo','brianonyi@gmail.com','Hospital',3,'2017-03-19 20:11:33','eptmanager@gmail.com','2017-04-03 23:31:47','eptmanager@gmail.com','active'),(9,'P003','yes',NULL,'Kenyatta Hospital',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'Victor','Vidal',NULL,'073923829',NULL,'vvidal@gmail.com',NULL,NULL,'2017-03-19 21:15:18','eptmanager@gmail.com',NULL,NULL,'active'),(10,'TEST001','no','TEST 001','TEST LAB','BATCERIAL','175 KISII','NAIAROBI','N/A',116,'','','','','','',NULL,'','KISII','TEST 001','','','','','TEST@GMAIL.COM','Hospital',3,'2017-04-03 22:03:28','TEST@GMAIL.COM',NULL,NULL,'active'),(11,'pop','no',NULL,'opo','po','opop','po','po',116,'','','','',NULL,NULL,NULL,NULL,'BARINGO','opo','','','','','test@gmail.com',NULL,0,'2017-04-03 23:29:07','eptmanager@gmail.com',NULL,NULL,'active');
/*!40000 ALTER TABLE `participant` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `participant_enrolled_programs_map`
--

DROP TABLE IF EXISTS `participant_enrolled_programs_map`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `participant_enrolled_programs_map` (
  `participant_id` int(11) NOT NULL,
  `ep_id` int(11) NOT NULL,
  PRIMARY KEY (`participant_id`,`ep_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `participant_enrolled_programs_map`
--

LOCK TABLES `participant_enrolled_programs_map` WRITE;
/*!40000 ALTER TABLE `participant_enrolled_programs_map` DISABLE KEYS */;
/*!40000 ALTER TABLE `participant_enrolled_programs_map` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `participant_manager_map`
--

DROP TABLE IF EXISTS `participant_manager_map`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `participant_manager_map` (
  `participant_id` int(11) NOT NULL,
  `dm_id` int(11) NOT NULL,
  `status` varchar(45) DEFAULT '1',
  PRIMARY KEY (`participant_id`,`dm_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `participant_manager_map`
--

LOCK TABLES `participant_manager_map` WRITE;
/*!40000 ALTER TABLE `participant_manager_map` DISABLE KEYS */;
INSERT INTO `participant_manager_map` VALUES (1,1,'1'),(2,1,'1'),(3,1,'1'),(9,2,'1');
/*!40000 ALTER TABLE `participant_manager_map` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `participantassays`
--

DROP TABLE IF EXISTS `participantassays`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `participantassays` (
  `ID` int(11) NOT NULL AUTO_INCREMENT,
  `AssayID` int(11) DEFAULT NULL,
  `Participant` int(11) DEFAULT NULL,
  PRIMARY KEY (`ID`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `participantassays`
--

LOCK TABLES `participantassays` WRITE;
/*!40000 ALTER TABLE `participantassays` DISABLE KEYS */;
/*!40000 ALTER TABLE `participantassays` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `partners`
--

DROP TABLE IF EXISTS `partners`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `partners` (
  `partner_id` int(11) NOT NULL AUTO_INCREMENT,
  `partner_name` varchar(500) DEFAULT NULL,
  `link` varchar(500) DEFAULT NULL,
  `sort_order` int(11) DEFAULT NULL,
  `added_by` int(11) NOT NULL,
  `added_on` datetime NOT NULL,
  `status` varchar(45) DEFAULT NULL,
  PRIMARY KEY (`partner_id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `partners`
--

LOCK TABLES `partners` WRITE;
/*!40000 ALTER TABLE `partners` DISABLE KEYS */;
INSERT INTO `partners` VALUES (1,'Partner One','',1,1,'2017-03-19 12:09:18','active'),(2,'Partner two','',2,1,'2017-03-19 12:09:27','active');
/*!40000 ALTER TABLE `partners` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `publications`
--

DROP TABLE IF EXISTS `publications`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `publications` (
  `publication_id` int(11) NOT NULL AUTO_INCREMENT,
  `content` text,
  `file_name` varchar(255) DEFAULT NULL,
  `sort_order` int(11) DEFAULT NULL,
  `added_by` int(11) NOT NULL,
  `added_on` datetime NOT NULL,
  `status` varchar(45) DEFAULT NULL,
  PRIMARY KEY (`publication_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `publications`
--

LOCK TABLES `publications` WRITE;
/*!40000 ALTER TABLE `publications` DISABLE KEYS */;
/*!40000 ALTER TABLE `publications` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `r_control`
--

DROP TABLE IF EXISTS `r_control`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `r_control` (
  `control_id` int(11) NOT NULL AUTO_INCREMENT,
  `control_name` varchar(255) DEFAULT NULL,
  `for_scheme` varchar(255) DEFAULT NULL,
  `is_active` varchar(45) DEFAULT NULL,
  PRIMARY KEY (`control_id`)
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `r_control`
--

LOCK TABLES `r_control` WRITE;
/*!40000 ALTER TABLE `r_control` DISABLE KEYS */;
INSERT INTO `r_control` VALUES (1,'Kit Negative Control','eid','active'),(2,'Kit Positive Control','eid','active'),(3,'PT Provider Negative Control','eid','active'),(4,'PT Provider Positive Control','eid','active'),(5,'In-House Negative Control','eid','active'),(6,'In-House Positive Control	','eid','active'),(7,'Negative Control','vl','active'),(8,'Low Positive Control','vl','active'),(9,'High Positive Control','vl','active');
/*!40000 ALTER TABLE `r_control` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `r_dbs_eia`
--

DROP TABLE IF EXISTS `r_dbs_eia`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `r_dbs_eia` (
  `eia_id` int(11) NOT NULL AUTO_INCREMENT,
  `eia_name` varchar(500) NOT NULL,
  PRIMARY KEY (`eia_id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `r_dbs_eia`
--

LOCK TABLES `r_dbs_eia` WRITE;
/*!40000 ALTER TABLE `r_dbs_eia` DISABLE KEYS */;
INSERT INTO `r_dbs_eia` VALUES (1,'EIA-01 BioRad Genetic Systems HIV 1/2 plus O'),(2,'EIA-02 bioMerieux Vironostika Uniform II plus O (3rd gen)'),(3,'EIA-03 bioMerieux Vironostika HIV Ag/Ab (4th gen)'),(4,'EIA-04 Murex HIV 1.2.0 (3rd gen)');
/*!40000 ALTER TABLE `r_dbs_eia` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `r_dbs_wb`
--

DROP TABLE IF EXISTS `r_dbs_wb`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `r_dbs_wb` (
  `wb_id` int(11) NOT NULL AUTO_INCREMENT,
  `wb_name` varchar(500) NOT NULL,
  PRIMARY KEY (`wb_id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `r_dbs_wb`
--

LOCK TABLES `r_dbs_wb` WRITE;
/*!40000 ALTER TABLE `r_dbs_wb` DISABLE KEYS */;
INSERT INTO `r_dbs_wb` VALUES (1,'WB-01 BioRad GS HIV- 1 Western Blot'),(2,'WB-02 Cambridge Biotech HIV-1 Western Blot'),(3,'WB-03 BioRad LAV Blot I '),(4,'WB-04 Genelab Diagnostics HIV Blot kit');
/*!40000 ALTER TABLE `r_dbs_wb` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `r_dts_corrective_actions`
--

DROP TABLE IF EXISTS `r_dts_corrective_actions`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `r_dts_corrective_actions` (
  `action_id` int(11) NOT NULL AUTO_INCREMENT,
  `corrective_action` text NOT NULL,
  `description` text NOT NULL,
  PRIMARY KEY (`action_id`)
) ENGINE=InnoDB AUTO_INCREMENT=18 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `r_dts_corrective_actions`
--

LOCK TABLES `r_dts_corrective_actions` WRITE;
/*!40000 ALTER TABLE `r_dts_corrective_actions` DISABLE KEYS */;
INSERT INTO `r_dts_corrective_actions` VALUES (1,'Please submit response before last date','Late response, response not evaluated. Your response received after last date. Expected result for PT panel will be available for your reference. '),(2,'Review and refer to SOP for testing. Sample should be tested per National HIV Testing algorithm. ','For sample (1/2/3?) National HIV Testing algorithm was not followed.'),(3,'Review all testing procedures prior to performing client testing as reported result does not match expected result.','Sample (1/2/3?) reported result does not match with expected result.'),(4,'You are required to test all samples in PT panel','Sample (1/2/3) was not reported '),(5,'Ensure expired test kit are not be used for testing. If test kits are not available, please contact your superior.','Test kit XYZ expired M days before the test date DD-MON-YYY.'),(6,'Ensure expiry date information is submitted for all performed tests.','Result not evaluated Ð test kit expiry date (first/second/third) is not reported with PT response.'),(7,'Ensure test kit name is reported for all performed tests.','Result not evaluated Ð name of test kit not reported.'),(8,'Please use the approved test kits according to the SOP/National HIV Testing algorithm for confirmatory and tie-breaker.','Testkit XYZ repeated for all 3 test kits'),(9,'Please use the approved test kits according to the SOP/National HIV Testing algorithm for confirmatory and tie-breaker.','Test kit repeated for confirmatory or tiebreaker test (T1/T2/T3).'),(10,'Ensure test kit lot number is reported for all performed tests. ','Result not evaluated Ð Test Kit lot number (first/second/third) is not reported.'),(11,'Ensure to provide supervisor approval along with his name.','Missing supervisor approval for reported result.'),(12,'Ensure to provide sample rehydration date','Re-hydration date missing in PT report form.'),(13,'Ensure to provide to provide panel testing date.','Testing date missing in PT report form.'),(14,'DTS Testing should be done within specified hours of rehydration as per SOP.','Testing is not performed within X to Y hours of rehydration.'),(15,'Review all testing procedures prior to performing client testing and contact your supervisor for improvement.','Participant did not meet the score criteria (Participant Score is 80 and Required Score is 95)'),(16,'Ensure to provide to provide panel receipt date. ','Panel receipt date missing in PT report form.'),(17,'Please test DTS sample as per National HIV Testing algorithm. Review and refer to SOP for testing.','For Test (1/2/3) testing is not performed with country approved test kit.');
/*!40000 ALTER TABLE `r_dts_corrective_actions` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `r_eid_detection_assay`
--

DROP TABLE IF EXISTS `r_eid_detection_assay`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `r_eid_detection_assay` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  `status` varchar(45) NOT NULL DEFAULT 'active',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `r_eid_detection_assay`
--

LOCK TABLES `r_eid_detection_assay` WRITE;
/*!40000 ALTER TABLE `r_eid_detection_assay` DISABLE KEYS */;
INSERT INTO `r_eid_detection_assay` VALUES (1,'COBAS Ampliprep/Taqman HIV-1 Qual Test','active'),(2,'Roche - Amplicor HIV-1 Monitor Test','active'),(3,'QIAamp Viral Mini Kit (DNA or RNA)','active'),(4,'Biocentric - Generic','active'),(5,'Chelex','active'),(6,'In House','active'),(7,'Abbott RealTime HIV-1 Qualitative Assay','active');
/*!40000 ALTER TABLE `r_eid_detection_assay` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `r_eid_extraction_assay`
--

DROP TABLE IF EXISTS `r_eid_extraction_assay`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `r_eid_extraction_assay` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  `status` varchar(45) NOT NULL DEFAULT 'active',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `r_eid_extraction_assay`
--

LOCK TABLES `r_eid_extraction_assay` WRITE;
/*!40000 ALTER TABLE `r_eid_extraction_assay` DISABLE KEYS */;
INSERT INTO `r_eid_extraction_assay` VALUES (1,'COBAS Ampliprep/Taqman HIV-1 Qual Test','active'),(2,'Roche - Amplicor HIV-1 Monitor Test','active'),(3,'QI Aamp Viral Mini Kit (DNA or RNA)','active'),(4,'Biocentric - Generic','active'),(5,'Chelex','active'),(6,'In House','active'),(7,'Abbott RealTime HIV-1 Qualitative Assay','active'),(8,'Other','active');
/*!40000 ALTER TABLE `r_eid_extraction_assay` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `r_enrolled_programs`
--

DROP TABLE IF EXISTS `r_enrolled_programs`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `r_enrolled_programs` (
  `r_epid` int(11) NOT NULL AUTO_INCREMENT,
  `enrolled_programs` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`r_epid`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `r_enrolled_programs`
--

LOCK TABLES `r_enrolled_programs` WRITE;
/*!40000 ALTER TABLE `r_enrolled_programs` DISABLE KEYS */;
INSERT INTO `r_enrolled_programs` VALUES (1,'PEPFAR RTQI Program'),(2,'PEPFAR');
/*!40000 ALTER TABLE `r_enrolled_programs` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `r_evaluation_comments`
--

DROP TABLE IF EXISTS `r_evaluation_comments`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `r_evaluation_comments` (
  `comment_id` int(11) NOT NULL AUTO_INCREMENT,
  `scheme` varchar(255) NOT NULL,
  `comment` text NOT NULL,
  PRIMARY KEY (`comment_id`)
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `r_evaluation_comments`
--

LOCK TABLES `r_evaluation_comments` WRITE;
/*!40000 ALTER TABLE `r_evaluation_comments` DISABLE KEYS */;
INSERT INTO `r_evaluation_comments` VALUES (1,'dts','Mandatory Samples not reported'),(2,'dts','Minimum score not reached'),(3,'eid','Controls were not reported'),(4,'eid','Unsatisfactory score'),(5,'vl','There were not enough responses for the VL Assay chosen'),(6,'vl','Some mandatory samples were not reported'),(7,'dbs','Some Mandatory samples were not reported'),(8,'','Did not meet the minimum score required');
/*!40000 ALTER TABLE `r_evaluation_comments` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `r_modes_of_receipt`
--

DROP TABLE IF EXISTS `r_modes_of_receipt`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `r_modes_of_receipt` (
  `mode_id` int(11) NOT NULL AUTO_INCREMENT,
  `mode_name` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`mode_id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `r_modes_of_receipt`
--

LOCK TABLES `r_modes_of_receipt` WRITE;
/*!40000 ALTER TABLE `r_modes_of_receipt` DISABLE KEYS */;
INSERT INTO `r_modes_of_receipt` VALUES (1,'Online Response'),(2,'Courier'),(3,'Email'),(4,'Scan'),(5,'SMS');
/*!40000 ALTER TABLE `r_modes_of_receipt` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `r_network_tiers`
--

DROP TABLE IF EXISTS `r_network_tiers`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `r_network_tiers` (
  `network_id` int(11) NOT NULL AUTO_INCREMENT,
  `network_name` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`network_id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `r_network_tiers`
--

LOCK TABLES `r_network_tiers` WRITE;
/*!40000 ALTER TABLE `r_network_tiers` DISABLE KEYS */;
INSERT INTO `r_network_tiers` VALUES (1,'Primary care laboratory service tier'),(2,'Secondary and tertiary laboratory service tiers'),(3,'Public Health Reference Laboratories');
/*!40000 ALTER TABLE `r_network_tiers` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `r_participant_affiliates`
--

DROP TABLE IF EXISTS `r_participant_affiliates`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `r_participant_affiliates` (
  `aff_id` int(11) NOT NULL AUTO_INCREMENT,
  `affiliate` varchar(255) NOT NULL,
  PRIMARY KEY (`aff_id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `r_participant_affiliates`
--

LOCK TABLES `r_participant_affiliates` WRITE;
/*!40000 ALTER TABLE `r_participant_affiliates` DISABLE KEYS */;
INSERT INTO `r_participant_affiliates` VALUES (1,'PMTCT'),(2,'VCT'),(3,'Mobile VCT'),(4,'Hospital');
/*!40000 ALTER TABLE `r_participant_affiliates` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `r_possibleresult`
--

DROP TABLE IF EXISTS `r_possibleresult`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `r_possibleresult` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `scheme_id` varchar(45) NOT NULL,
  `scheme_sub_group` varchar(45) DEFAULT NULL,
  `response` varchar(45) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=14 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `r_possibleresult`
--

LOCK TABLES `r_possibleresult` WRITE;
/*!40000 ALTER TABLE `r_possibleresult` DISABLE KEYS */;
INSERT INTO `r_possibleresult` VALUES (1,'dts','DTS_TEST','REACTIVE'),(2,'dts','DTS_TEST','NONREACTIVE'),(3,'dts','DTS_TEST','INVALID'),(4,'dts','DTS_FINAL','POSITIVE'),(5,'dts','DTS_FINAL','NEGATIVE'),(6,'dts','DTS_FINAL','INDETERMINATE'),(7,'eid','EID_FINAL','Positive (HIV Detected)'),(8,'eid','EID_FINAL','Negative (HIV Not Detected)'),(9,'eid','EID_FINAL','Equivocal'),(10,'dbs','DBS_FINAL','P'),(11,'dbs','DBS_FINAL','N'),(12,'dts','DTS_FINAL','Not Tested'),(13,'dts','DTS_FINAL','NOT TESTED');
/*!40000 ALTER TABLE `r_possibleresult` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `r_results`
--

DROP TABLE IF EXISTS `r_results`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `r_results` (
  `result_id` int(11) NOT NULL AUTO_INCREMENT,
  `result_name` varchar(255) NOT NULL,
  PRIMARY KEY (`result_id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `r_results`
--

LOCK TABLES `r_results` WRITE;
/*!40000 ALTER TABLE `r_results` DISABLE KEYS */;
INSERT INTO `r_results` VALUES (1,'Pass'),(2,'Fail'),(3,'Excluded'),(4,'Not Evaluated');
/*!40000 ALTER TABLE `r_results` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `r_site_type`
--

DROP TABLE IF EXISTS `r_site_type`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `r_site_type` (
  `r_stid` int(11) NOT NULL AUTO_INCREMENT,
  `site_type` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`r_stid`)
) ENGINE=InnoDB AUTO_INCREMENT=13 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `r_site_type`
--

LOCK TABLES `r_site_type` WRITE;
/*!40000 ALTER TABLE `r_site_type` DISABLE KEYS */;
INSERT INTO `r_site_type` VALUES (1,'VCT'),(2,'Mobile VCT'),(3,'TB Center'),(4,'Antenatal Clinic (PMTCT)'),(5,'Outpatient Clinic'),(6,'Hospital'),(7,'Laboratory'),(8,'District'),(9,'Province'),(10,'Region'),(11,'Department'),(12,'Other');
/*!40000 ALTER TABLE `r_site_type` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `r_testkitname_dts`
--

DROP TABLE IF EXISTS `r_testkitname_dts`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `r_testkitname_dts` (
  `TestKitName_ID` varchar(50) NOT NULL,
  `scheme_type` varchar(255) NOT NULL,
  `TestKit_Name` varchar(100) DEFAULT NULL,
  `TestKit_Name_Short` varchar(50) DEFAULT NULL,
  `TestKit_Comments` varchar(50) DEFAULT NULL,
  `Updated_On` datetime DEFAULT NULL,
  `Updated_By` int(11) DEFAULT NULL,
  `Installation_id` varchar(50) DEFAULT NULL,
  `TestKit_Manufacturer` varchar(50) DEFAULT NULL,
  `Created_On` datetime DEFAULT NULL,
  `Created_By` int(11) DEFAULT NULL,
  `Approval` int(1) DEFAULT '1' COMMENT '1 = Approved , 0 not approved.',
  `TestKit_ApprovalAgency` varchar(20) DEFAULT NULL COMMENT 'USAID, FDA, LOCAL',
  `source_reference` varchar(50) DEFAULT NULL,
  `CountryAdapted` int(11) DEFAULT NULL COMMENT '0= Not allowed in the country 1 = approved in country ',
  `testkit_1` int(11) NOT NULL DEFAULT '0',
  `testkit_2` int(11) NOT NULL DEFAULT '0',
  `testkit_3` int(11) NOT NULL DEFAULT '0',
  PRIMARY KEY (`TestKitName_ID`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `r_testkitname_dts`
--

LOCK TABLES `r_testkitname_dts` WRITE;
/*!40000 ALTER TABLE `r_testkitname_dts` DISABLE KEYS */;
INSERT INTO `r_testkitname_dts` VALUES ('tk245A0egsg03q6','','Advanced Quality',NULL,NULL,NULL,NULL,NULL,NULL,'2015-09-08 07:58:54',NULL,0,NULL,NULL,NULL,0,0,0),('tk50f41f66a2388','dts','ACON HIV 1/2/0 Tri-line','ACON HIV 1/2/0 Tri',NULL,'2013-01-14 10:09:21',0,'0',' Alere','2012-06-06 11:53:26',0,1,'USAID','USAID Approval List March 30, 2012',1,1,0,1),('tk50f41f66a238f','dts','Alere Determine HIV-1/2','Alere Determine HIV-1/2',NULL,'2013-01-14 10:09:21',0,'0',' Alere/Abbott Laboratories','2012-06-06 11:53:26',0,1,'USAID','USAID Approval List March 30, 2012',1,1,1,1),('tk50f41f66a2399','dts','Aware HIV-1/2 BSP','Aware HIV-1/2 BSP',NULL,'2013-01-14 10:09:21',0,'0',' Calypte Biomedical ','2012-06-06 11:53:26',0,1,'USAID','USAID Approval List March 30, 2012',1,1,0,1),('tk50f41f66a239e','dts','Bionor HIV-1&2','Bionor HIV-1&2',NULL,'2013-01-14 10:09:21',0,'0',' Bionor A/S ','2012-06-06 11:53:26',0,1,'USAID','USAID Approval List March 30, 2012',1,1,0,1),('tk50f41f66a23a7','dts','Calypte Aware HIV-1/2 OMT ','Calypte Aware HIV-',NULL,'2013-01-14 10:09:21',0,'0',' Calypte Biomedical Corp.','2012-06-06 11:53:26',0,1,'USAID','USAID Approval List March 30, 2012',1,1,0,1),('tk50f41f66a23b1','dts','Care Start HIV 1-2-O','Care Start HIV 1-2',NULL,'2013-01-14 10:09:21',0,'0',' Access Bio, Inc.','2012-06-06 11:53:26',0,1,'USAID','USAID Approval List March 30, 2012',1,1,0,1),('tk50f41f66a23b5','dts','ClearviewÃ‚Â® COMPLETE HIV1/2 (formerly SURE) CHECKÃ‚Â® HIV1/2)','ClearviewÃ‚Â® COMPLETE HIV1/2 Non - US Labeling',NULL,'2013-01-14 10:09:21',0,'0',' Alere','2012-06-06 11:53:26',0,1,'USAID','USAID Approval List March 30, 2012',1,1,0,1),('tk50f41f66a23ba','dts','ClearviewÃ‚Â® COMPLETE HIV1/2 - US labeling** (formerly SURE CHECKÃ‚Â® HIV1/2)','ClearviewÃ‚Â® COMPLETE HIV1/2 - US labeling ',NULL,'2013-01-14 10:09:21',0,'0',' Alere','2012-06-06 11:53:26',0,1,'FDA','USAID Approval List March 30, 2012',1,1,0,1),('tk50f41f66a23bf','dts','Clearview  HIV 1/2 STAT-PAK Assay','Clearview  HIV 1/2',NULL,'2013-01-14 10:09:21',0,'0',' Alere','2012-06-06 11:53:26',0,1,'FDA','USAID Approval List March 30, 2012',1,1,0,1),('tk50f41f66a23c4','dts','Combaids RS Advantage','Combaids RS Advant',NULL,'2013-01-14 10:09:21',0,'0',' Span Diagnostics Ltd.','2012-06-06 11:53:26',0,1,'USAID','USAID Approval List March 30, 2012',1,1,0,1),('tk50f41f66a23c8','dts','DPP HIV 1/2 Screen ','DPP HIV 1/2 Screen',NULL,'2013-01-14 10:09:21',0,'0',' Chembio Diagnostic Systems, Inc','2012-06-06 11:53:26',0,1,'USAID','USAID Approval List March 30, 2012',1,1,0,1),('tk50f41f66a23cd','dts','DPP HIV 1 / 2 Screen Assay  Oral Fluid, Whole Blood,Serum & Plasma','DPP HIV 1 / 2 Scre',NULL,'2013-01-14 10:09:21',0,'0',' Chembio Diagnostic Systems, Inc','2012-06-06 11:53:26',0,1,'USAID','USAID Approval List March 30, 2012',1,1,0,1),('tk50f41f66a23d1','dts','Double Check HIV 1&2','Double Check HIV 1',NULL,'2013-01-14 10:09:21',0,'0',' Alere/ Orgenics, Ltd','2012-06-06 11:53:26',0,1,'USAID','USAID Approval List March 30, 2012',1,1,0,1),('tk50f41f66a23d6','dts','Double Check Gold HIV1&2','Double Check Gold ',NULL,'2013-01-14 10:09:21',0,'0',' Alere/ Orgenics, Ltd','2012-06-06 11:53:26',0,1,'USAID','USAID Approval List March 30, 2012',1,1,0,1),('tk50f41f66a23db','dts','EZ-TRUST Rapid Anti-HIV (1&2) Test','EZ-TRUST Rapid Ant',NULL,'2013-01-14 10:09:21',0,'0',' CS Innovation','2012-06-06 11:53:26',0,1,'USAID','USAID Approval List March 30, 2012',1,1,0,1),('tk50f41f66a23df','dts','First Response HIV 1-2.0','First Response HIV',NULL,'2013-01-14 10:09:21',0,'0',' Premier Medical Corporation','2012-06-06 11:53:26',0,1,'USAID','USAID Approval List March 30, 2012',1,1,1,1),('tk50f41f66a23e3','dts','Genie Fast HIV 1/2 ','Genie Fast HIV 1/2',NULL,'2013-01-14 10:09:21',0,'0',' Bio-Rad Laboratories','2012-06-06 11:53:26',0,1,'USAID','USAID Approval List March 30, 2012',1,1,0,1),('tk50f41f66a23e8','dts','HIV 1/2 Gold Rapid Screen Test ','HIV 1/2 Gold Rapid',NULL,'2013-01-14 10:09:21',0,'0',' Medinostics IntÃ¢â‚¬â„¢l','2012-06-06 11:53:26',0,1,'USAID','USAID Approval List March 30, 2012',1,1,0,1),('tk50f41f66a23ed','dts','HIV 1/2 Rapid Test Kit','HIV 1/2 Rapid Test',NULL,'2013-01-14 10:09:21',0,'0',' Medinostics IntÃ¢â‚¬â„¢l','2012-06-06 11:53:26',0,1,'USAID','USAID Approval List March 30, 2012',1,1,0,1),('tk50f41f66a23f1','dts','HIV 1/ 2 STAT-PAK Assay','HIV 1/ 2 STAT-PAK ',NULL,'2013-01-14 10:09:21',0,'0',' Chembio Diagnostic Systems, Inc','2012-06-06 11:53:26',0,1,'USAID','USAID Approval List March 30, 2012',1,1,0,1),('tk50f41f66a23f6','dts','HIV 1/2 STAT-PAK Dipstick Assay','HIV 1/2 STAT-PAK D',NULL,'2013-01-14 10:09:21',0,'0',' Chembio Diagnostic Systems, Inc','2012-06-06 11:53:26',0,1,'USAID','USAID Approval List March 30, 2012',1,1,0,1),('tk50f41f66a23fa','dts','HIV(1+2) Rapid Test Strip','HIV(1+2) Rapid Tes',NULL,'2013-01-14 10:09:21',0,'0',' Shanghai Kehua Bio-engineering Co., Ltd (KHB)','2012-06-06 11:53:26',0,1,'USAID','USAID Approval List March 30, 2012',1,1,0,1),('tk50f41f66a23ff','dts','HIVSav 1&2 Rapid SeroTest','HIVSav 1&2 Rapid S',NULL,'2013-01-14 10:09:21',0,'0',' Savyvon Diagnostics Ltd.','2012-06-06 11:53:26',0,1,'USAID','USAID Approval List March 30, 2012',1,1,0,1),('tk50f41f66a2404','dts','iCARE Rapid Anti-HIV (1&2) ','iCARE Rapid Anti-H',NULL,'2013-01-14 10:09:21',0,'0',' JAL Innovation','2012-06-06 11:53:26',0,1,'USAID','USAID Approval List March 30, 2012',1,1,0,1),('tk50f41f66a2408','dts','ImmunoComb HIV 1&2','ImmunoComb HIV 1&2',NULL,'2013-01-14 10:09:21',0,'0',' Alere/ Orgenics, Ltd','2012-06-06 11:53:26',0,1,'USAID','USAID Approval List March 30, 2012',1,1,0,1),('tk50f41f66a240d','dts','InstantCHEK HIV1+2','InstantCHEK HIV1+2',NULL,'2013-01-14 10:09:21',0,'0',' EY Laboratories','2012-06-06 11:53:26',0,1,'USAID','USAID Approval List March 30, 2012',1,1,0,1),('tk50f41f66a2411','dts','KSII  HIV 1/2 Rapid Diagnostic Test Kit ','KSII  HIV 1/2 Rapi',NULL,'2013-01-14 10:09:21',0,'0',' K. Shorehill Int\'l, Inc.','2012-06-06 11:53:26',0,1,'USAID','USAID Approval List March 30, 2012',1,1,0,1),('tk50f41f66a2415','dts','MPI Diagnostics Anti-HIV (1&2) Test ','MPI Diagnostics An',NULL,'2013-01-14 10:09:21',0,'0',' MPI Diagnostics','2012-06-06 11:53:26',0,1,'USAID','USAID Approval List March 30, 2012',1,1,0,1),('tk50f41f66a241a','dts','INSTI HIV Antibody','INSTI HIV Antibody',NULL,'2013-01-14 10:09:21',0,'0',' Biolytical Laboratories','2012-06-06 11:53:26',0,1,'USAID','USAID Approval List March 30, 2012',1,1,0,1),('tk50f41f66a241f','dts','Multispot HIV-1/HIV-2','Multispot HIV-1/HI',NULL,'2013-01-14 10:09:21',0,'0',' Bio-Rad laboratories','2012-06-06 11:53:26',0,1,'FDA','USAID Approval List March 30, 2012',1,1,0,1),('tk50f41f66a2423','dts','OraQuick ADVANCE Rapid HIV-1/2','OraQuick ADVANCE R',NULL,'2013-01-14 10:09:21',0,'0',' OraSure Technologies','2012-06-06 11:53:26',0,1,'FDA','USAID Approval List March 30, 2012',1,1,1,1),('tk50f41f66a2428','dts','OraQuick HIV-1/2 Rapid Antibody Test','OraQuick HIV-1/2 R',NULL,'2013-01-14 10:09:21',0,'0',' OraSure Technologies','2012-06-06 11:53:26',0,1,'USAID','USAID Approval List March 30, 2012',1,1,1,1),('tk50f41f66a242c','dts','RAPID 1-2-3 HEMA Dipstick','RAPID 1-2-3 HEMA D',NULL,'2013-01-14 10:09:21',0,'0',' Hema Diagnostics Systems','2012-06-06 11:53:26',0,1,'USAID','USAID Approval List March 30, 2012',1,1,0,1),('tk50f41f66a2430','dts','RAPID 1-2-3 HEMA EZ ','RAPID 1-2-3 HEMA E',NULL,'2013-01-14 10:09:21',0,'0',' Hema Diagnostics Systems','2012-06-06 11:53:26',0,1,'USAID','USAID Approval List March 30, 2012',1,1,0,1),('tk50f41f66a2435','dts','RAPID 1-2-3 HEMA EXPRESS','RAPID 1-2-3 HEMA E',NULL,'2013-01-14 10:09:21',0,'0',' Hema Diagnostics Systems','2012-06-06 11:53:26',0,1,'USAID','USAID Approval List March 30, 2012',1,1,0,1),('tk50f41f66a2439','dts','Reveal Rapid HIV Test','Reveal Rapid HIV T',NULL,'2013-01-14 10:09:21',0,'0',' MedMira','2012-06-06 11:53:26',0,1,'USAID','USAID Approval List March 30, 2012',1,1,0,1),('tk50f41f66a243e','dts','Reveal G3 Rapid HIV-1 Antibody Test','Reveal G3 Rapid HI',NULL,'2013-01-14 10:09:21',0,'0',' MedMira','2012-06-06 11:53:26',0,1,'FDA','USAID Approval List March 30, 2012',1,1,0,1),('tk50f41f66a2443','dts','Signal HIV Rapid Test','Signal HIV Rapid T',NULL,'2013-01-14 10:09:21',0,'0',' Span Diagnostics Ltd.','2012-06-06 11:53:26',0,1,'USAID','USAID Approval List March 30, 2012',1,1,0,1),('tk50f41f66a2447','dts','Uni-Gold HIV - USAID','Uni-Gold HIV -USAID',NULL,'2013-01-14 10:09:21',0,'0',' Trinity Biotech','2012-06-06 11:53:26',0,1,'USAID','USAID Approval List March 30, 2012',1,1,0,1),('tk50f41f66a244b','dts','Uni-Gold Recombigen HIV - FDA','Uni-Gold Recombige - FDA',NULL,'2013-01-14 10:09:21',0,'0',' Trinity Biotech','2012-06-06 11:53:26',0,1,'FDA','USAID Approval List March 30, 2012',1,1,0,1),('tk5136b425387a4','dts','First Own Test Kit','MyKitname','Comments',NULL,NULL,'LOG4fabc8babf6eb','Oh','2013-03-06 04:12:37',0,1,'WHO and National','Yes',1,1,0,1),('tk5137b608ac1d9','dts','Hexagon HIVI II','Hexagon','rwer',NULL,NULL,'LOG4fabc8babf6eb','rewr','2013-03-06 22:32:56',0,0,'NA','Yes',1,1,0,1),('tk51435b69f3b7e','dts','gdfg','gfdg','gfdg',NULL,NULL,'5132ceba8fafa','gfdg','2013-03-15 18:33:29',0,1,'NA','NA',1,1,0,1),('tk514b50a81832c','dts','Test Kit New ','New ','dasd',NULL,NULL,'5132ceba8fafa','dsad','2013-03-21 19:25:44',0,1,'Other','Yes',1,1,0,1),('tkHhd7y1xOFIOzl','','bioline',NULL,NULL,NULL,NULL,NULL,NULL,'2015-09-08 07:58:52',NULL,0,NULL,NULL,NULL,0,0,0),('tkHmogbQfQTpk6c','','Abon',NULL,NULL,NULL,NULL,NULL,NULL,'2015-09-08 07:53:23',NULL,0,NULL,NULL,NULL,0,0,0),('tkjbtACskirhDkM','','Advance Quality',NULL,NULL,NULL,NULL,NULL,NULL,'2015-09-08 07:53:23',NULL,0,NULL,NULL,NULL,0,0,0),('tkuEhwZIYiS7A1B','','Determine',NULL,NULL,NULL,NULL,NULL,NULL,'2015-09-08 07:55:27',NULL,0,NULL,NULL,NULL,0,0,0);
/*!40000 ALTER TABLE `r_testkitname_dts` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `r_vl_assay`
--

DROP TABLE IF EXISTS `r_vl_assay`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `r_vl_assay` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  `short_name` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `r_vl_assay`
--

LOCK TABLES `r_vl_assay` WRITE;
/*!40000 ALTER TABLE `r_vl_assay` DISABLE KEYS */;
INSERT INTO `r_vl_assay` VALUES (1,'Plasma HIV RNA measurement','Plasma HIV RNA'),(2,'DBS HIV RNA measurement','DBS HIV RNA'),(3,'DBS HIV DNA PCR','DBS HIV DNA PCR'),(4,'test','test');
/*!40000 ALTER TABLE `r_vl_assay` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `readinesschecklist`
--

DROP TABLE IF EXISTS `readinesschecklist`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `readinesschecklist` (
  `ID` int(11) NOT NULL AUTO_INCREMENT,
  `ParticipantID` int(11) DEFAULT NULL,
  `q1` bit(1) DEFAULT NULL,
  `q2` bit(1) DEFAULT NULL,
  `q3` bit(1) DEFAULT NULL,
  `q4` bit(1) DEFAULT NULL,
  `q5` bit(1) DEFAULT NULL,
  `q6` bit(1) DEFAULT NULL,
  `status` varchar(100) DEFAULT NULL,
  `verdict` varchar(250) DEFAULT NULL,
  `comment` text,
  `added_by` int(11) DEFAULT NULL,
  `added_on` datetime DEFAULT NULL,
  PRIMARY KEY (`ID`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `readinesschecklist`
--

LOCK TABLES `readinesschecklist` WRITE;
/*!40000 ALTER TABLE `readinesschecklist` DISABLE KEYS */;
INSERT INTO `readinesschecklist` VALUES (1,1,'','','','','','','Complete','Congratulations, you have been approved for participation in this EQA round. Your panel will be shipped within 2 weeks. We greatly appreciate your continued support','Welcome',NULL,'2017-03-19 14:54:36');
/*!40000 ALTER TABLE `readinesschecklist` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `receiveshipment`
--

DROP TABLE IF EXISTS `receiveshipment`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `receiveshipment` (
  `ID` int(11) NOT NULL AUTO_INCREMENT,
  `ShipmentCode` varchar(50) DEFAULT NULL,
  `SampleStatus` text,
  `ReceivedBy` varchar(50) DEFAULT NULL,
  `DateReceived` datetime DEFAULT NULL,
  PRIMARY KEY (`ID`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `receiveshipment`
--

LOCK TABLES `receiveshipment` WRITE;
/*!40000 ALTER TABLE `receiveshipment` DISABLE KEYS */;
/*!40000 ALTER TABLE `receiveshipment` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `reference_dbs_eia`
--

DROP TABLE IF EXISTS `reference_dbs_eia`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `reference_dbs_eia` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `shipment_id` int(11) NOT NULL,
  `sample_id` int(11) NOT NULL,
  `eia` int(11) NOT NULL,
  `lot` varchar(255) DEFAULT NULL,
  `exp_date` date DEFAULT NULL,
  `od` varchar(255) DEFAULT NULL,
  `cutoff` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `reference_dbs_eia`
--

LOCK TABLES `reference_dbs_eia` WRITE;
/*!40000 ALTER TABLE `reference_dbs_eia` DISABLE KEYS */;
/*!40000 ALTER TABLE `reference_dbs_eia` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `reference_dbs_wb`
--

DROP TABLE IF EXISTS `reference_dbs_wb`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `reference_dbs_wb` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `shipment_id` int(11) NOT NULL,
  `sample_id` int(11) NOT NULL,
  `wb` int(11) NOT NULL,
  `lot` varchar(255) DEFAULT NULL,
  `exp_date` date DEFAULT NULL,
  `160` int(11) DEFAULT NULL,
  `120` int(11) DEFAULT NULL,
  `66` int(11) DEFAULT NULL,
  `55` int(11) DEFAULT NULL,
  `51` int(11) DEFAULT NULL,
  `41` int(11) DEFAULT NULL,
  `31` int(11) DEFAULT NULL,
  `24` int(11) DEFAULT NULL,
  `17` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `reference_dbs_wb`
--

LOCK TABLES `reference_dbs_wb` WRITE;
/*!40000 ALTER TABLE `reference_dbs_wb` DISABLE KEYS */;
/*!40000 ALTER TABLE `reference_dbs_wb` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `reference_dts_eia`
--

DROP TABLE IF EXISTS `reference_dts_eia`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `reference_dts_eia` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `shipment_id` int(11) NOT NULL,
  `sample_id` int(11) NOT NULL,
  `eia` int(11) NOT NULL,
  `lot` varchar(255) DEFAULT NULL,
  `exp_date` date DEFAULT NULL,
  `od` varchar(255) DEFAULT NULL,
  `cutoff` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `reference_dts_eia`
--

LOCK TABLES `reference_dts_eia` WRITE;
/*!40000 ALTER TABLE `reference_dts_eia` DISABLE KEYS */;
/*!40000 ALTER TABLE `reference_dts_eia` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `reference_dts_rapid_hiv`
--

DROP TABLE IF EXISTS `reference_dts_rapid_hiv`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `reference_dts_rapid_hiv` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `shipment_id` varchar(255) NOT NULL,
  `sample_id` varchar(255) NOT NULL,
  `testkit` varchar(255) NOT NULL,
  `lot_no` varchar(255) NOT NULL,
  `expiry_date` date NOT NULL,
  `result` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `reference_dts_rapid_hiv`
--

LOCK TABLES `reference_dts_rapid_hiv` WRITE;
/*!40000 ALTER TABLE `reference_dts_rapid_hiv` DISABLE KEYS */;
/*!40000 ALTER TABLE `reference_dts_rapid_hiv` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `reference_dts_wb`
--

DROP TABLE IF EXISTS `reference_dts_wb`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `reference_dts_wb` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `shipment_id` int(11) NOT NULL,
  `sample_id` int(11) NOT NULL,
  `wb` int(11) NOT NULL,
  `lot` varchar(255) DEFAULT NULL,
  `exp_date` date DEFAULT NULL,
  `160` int(11) DEFAULT NULL,
  `120` int(11) DEFAULT NULL,
  `66` int(11) DEFAULT NULL,
  `55` int(11) DEFAULT NULL,
  `51` int(11) DEFAULT NULL,
  `41` int(11) DEFAULT NULL,
  `31` int(11) DEFAULT NULL,
  `24` int(11) DEFAULT NULL,
  `17` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `reference_dts_wb`
--

LOCK TABLES `reference_dts_wb` WRITE;
/*!40000 ALTER TABLE `reference_dts_wb` DISABLE KEYS */;
/*!40000 ALTER TABLE `reference_dts_wb` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `reference_result_dbs`
--

DROP TABLE IF EXISTS `reference_result_dbs`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `reference_result_dbs` (
  `shipment_id` int(11) NOT NULL,
  `sample_id` int(11) NOT NULL,
  `sample_label` varchar(45) DEFAULT NULL,
  `reference_result` varchar(45) DEFAULT NULL,
  `control` int(11) DEFAULT NULL,
  `mandatory` int(11) NOT NULL DEFAULT '0',
  `sample_score` int(11) NOT NULL DEFAULT '1',
  PRIMARY KEY (`shipment_id`,`sample_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COMMENT='Referance Result for DBS Shipment';
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `reference_result_dbs`
--

LOCK TABLES `reference_result_dbs` WRITE;
/*!40000 ALTER TABLE `reference_result_dbs` DISABLE KEYS */;
/*!40000 ALTER TABLE `reference_result_dbs` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `reference_result_dts`
--

DROP TABLE IF EXISTS `reference_result_dts`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `reference_result_dts` (
  `shipment_id` int(11) NOT NULL,
  `sample_id` int(11) NOT NULL,
  `sample_label` varchar(45) DEFAULT NULL,
  `reference_result` varchar(45) DEFAULT NULL,
  `control` int(11) DEFAULT NULL,
  `mandatory` int(11) NOT NULL DEFAULT '0',
  `sample_score` int(11) NOT NULL DEFAULT '1',
  PRIMARY KEY (`shipment_id`,`sample_id`),
  CONSTRAINT `reference_result_dts_ibfk_1` FOREIGN KEY (`shipment_id`) REFERENCES `shipment` (`shipment_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COMMENT='Referance Result for DTS Shipment';
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `reference_result_dts`
--

LOCK TABLES `reference_result_dts` WRITE;
/*!40000 ALTER TABLE `reference_result_dts` DISABLE KEYS */;
/*!40000 ALTER TABLE `reference_result_dts` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `reference_result_eid`
--

DROP TABLE IF EXISTS `reference_result_eid`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `reference_result_eid` (
  `shipment_id` int(11) NOT NULL,
  `sample_id` int(11) NOT NULL,
  `sample_label` varchar(255) DEFAULT NULL,
  `reference_result` varchar(255) DEFAULT NULL,
  `control` int(11) DEFAULT NULL,
  `reference_hiv_ct_od` varchar(45) DEFAULT NULL,
  `reference_ic_qs` varchar(45) DEFAULT NULL,
  `mandatory` int(11) NOT NULL DEFAULT '0',
  `sample_score` int(11) NOT NULL DEFAULT '1',
  PRIMARY KEY (`shipment_id`,`sample_id`),
  CONSTRAINT `reference_result_eid_ibfk_1` FOREIGN KEY (`shipment_id`) REFERENCES `shipment` (`shipment_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `reference_result_eid`
--

LOCK TABLES `reference_result_eid` WRITE;
/*!40000 ALTER TABLE `reference_result_eid` DISABLE KEYS */;
/*!40000 ALTER TABLE `reference_result_eid` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `reference_result_tb`
--

DROP TABLE IF EXISTS `reference_result_tb`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `reference_result_tb` (
  `shipment_id` int(11) NOT NULL,
  `sample_id` int(11) NOT NULL,
  `sample_label` varchar(255) DEFAULT NULL,
  `mtb_detected` varchar(255) DEFAULT NULL,
  `rif_resistance` varchar(255) DEFAULT NULL,
  `probe_d` varchar(255) DEFAULT NULL,
  `probe_c` varchar(255) DEFAULT NULL,
  `probe_e` varchar(255) DEFAULT NULL,
  `probe_b` varchar(255) DEFAULT NULL,
  `spc` varchar(255) DEFAULT NULL,
  `probe_a` varchar(255) DEFAULT NULL,
  `control` int(11) DEFAULT NULL,
  `mandatory` int(11) NOT NULL DEFAULT '0',
  `sample_score` int(11) NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `reference_result_tb`
--

LOCK TABLES `reference_result_tb` WRITE;
/*!40000 ALTER TABLE `reference_result_tb` DISABLE KEYS */;
/*!40000 ALTER TABLE `reference_result_tb` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `reference_result_vl`
--

DROP TABLE IF EXISTS `reference_result_vl`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `reference_result_vl` (
  `shipment_id` int(11) NOT NULL,
  `sample_id` int(11) NOT NULL,
  `sample_label` varchar(255) DEFAULT NULL,
  `reference_result` varchar(45) DEFAULT NULL,
  `control` int(11) DEFAULT NULL,
  `mandatory` int(11) NOT NULL DEFAULT '0',
  `sample_score` int(11) NOT NULL DEFAULT '1',
  PRIMARY KEY (`shipment_id`,`sample_id`),
  CONSTRAINT `reference_result_vl_ibfk_1` FOREIGN KEY (`shipment_id`) REFERENCES `shipment` (`shipment_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `reference_result_vl`
--

LOCK TABLES `reference_result_vl` WRITE;
/*!40000 ALTER TABLE `reference_result_vl` DISABLE KEYS */;
INSERT INTO `reference_result_vl` VALUES (1,1,'A',NULL,1,1,1),(1,2,'B',NULL,1,1,1),(1,3,'C',NULL,1,1,1),(2,1,'A',NULL,0,1,1),(2,2,'B',NULL,0,1,1),(2,3,'C',NULL,0,1,1),(3,1,'A',NULL,0,1,1),(3,2,'B',NULL,0,1,1),(3,3,'C',NULL,0,1,1),(3,4,'D',NULL,0,1,1);
/*!40000 ALTER TABLE `reference_result_vl` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `reference_vl_calculation`
--

DROP TABLE IF EXISTS `reference_vl_calculation`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `reference_vl_calculation` (
  `shipment_id` int(11) NOT NULL,
  `sample_id` int(11) NOT NULL,
  `vl_assay` int(11) NOT NULL,
  `q1` double(20,10) DEFAULT NULL,
  `q3` double(20,10) DEFAULT NULL,
  `iqr` double(20,10) DEFAULT NULL,
  `quartile_low` double(20,10) DEFAULT NULL,
  `quartile_high` double(20,10) DEFAULT NULL,
  `mean` double(20,10) DEFAULT NULL,
  `sd` double(20,10) DEFAULT NULL,
  `cv` double(20,10) DEFAULT NULL,
  `low_limit` double(20,10) DEFAULT NULL,
  `high_limit` double(20,10) DEFAULT NULL,
  `calculated_on` datetime DEFAULT NULL,
  `manual_mean` double(20,10) DEFAULT NULL,
  `manual_sd` double(20,10) DEFAULT NULL,
  `manual_cv` double(20,10) DEFAULT NULL,
  `manual_q1` double(20,10) DEFAULT NULL,
  `manual_q3` double(20,10) DEFAULT NULL,
  `manual_iqr` double(20,10) DEFAULT NULL,
  `manual_quartile_low` double(20,10) DEFAULT NULL,
  `manual_quartile_high` double(20,10) DEFAULT NULL,
  `manual_low_limit` double(20,10) DEFAULT NULL,
  `manual_high_limit` double(20,10) DEFAULT NULL,
  `updated_on` datetime DEFAULT NULL,
  `updated_by` int(11) DEFAULT NULL,
  `use_range` varchar(255) NOT NULL DEFAULT 'calculated',
  PRIMARY KEY (`shipment_id`,`sample_id`,`vl_assay`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `reference_vl_calculation`
--

LOCK TABLES `reference_vl_calculation` WRITE;
/*!40000 ALTER TABLE `reference_vl_calculation` DISABLE KEYS */;
INSERT INTO `reference_vl_calculation` VALUES (1,1,1,2.0000000000,NULL,NULL,NULL,NULL,1.0000000000,0.0000000000,NULL,0.5000000000,1.5000000000,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'2017-03-20 08:55:13',NULL,'calculated'),(1,2,1,2.0000000000,NULL,NULL,NULL,NULL,1.0000000000,0.0000000000,NULL,0.5000000000,1.5000000000,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'2017-03-20 08:55:13',NULL,'calculated'),(1,3,1,2.0000000000,NULL,NULL,NULL,NULL,1.0000000000,0.0000000000,NULL,0.5000000000,1.5000000000,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'2017-03-20 08:55:13',NULL,'calculated'),(2,1,1,2.0000000000,NULL,NULL,NULL,NULL,1.0000000000,0.0000000000,NULL,0.5000000000,1.5000000000,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'calculated'),(2,2,1,2.0000000000,NULL,NULL,NULL,NULL,1.0000000000,0.0000000000,NULL,0.5000000000,1.5000000000,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'calculated'),(2,3,1,2.0000000000,NULL,NULL,NULL,NULL,1.0000000000,0.0000000000,NULL,0.5000000000,1.5000000000,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'calculated'),(3,1,1,2.0000000000,NULL,NULL,NULL,NULL,1.0000000000,0.0000000000,NULL,0.5000000000,1.5000000000,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'calculated'),(3,2,1,2.0000000000,NULL,NULL,NULL,NULL,1.0000000000,0.0000000000,NULL,0.5000000000,1.5000000000,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'calculated'),(3,3,1,2.0000000000,NULL,NULL,NULL,NULL,1.0000000000,0.0000000000,NULL,0.5000000000,1.5000000000,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'calculated');
/*!40000 ALTER TABLE `reference_vl_calculation` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `reference_vl_methods`
--

DROP TABLE IF EXISTS `reference_vl_methods`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `reference_vl_methods` (
  `shipment_id` int(11) NOT NULL,
  `sample_id` int(11) NOT NULL,
  `assay` int(11) NOT NULL,
  `value` varchar(255) NOT NULL,
  PRIMARY KEY (`shipment_id`,`sample_id`,`assay`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `reference_vl_methods`
--

LOCK TABLES `reference_vl_methods` WRITE;
/*!40000 ALTER TABLE `reference_vl_methods` DISABLE KEYS */;
INSERT INTO `reference_vl_methods` VALUES (1,1,1,'12'),(1,2,1,'10'),(1,3,1,'14'),(2,1,1,'3'),(2,1,2,'3'),(2,2,1,'4'),(2,2,2,'4'),(2,3,1,'5'),(2,3,2,'5'),(3,1,1,'7'),(3,2,2,'7'),(3,3,1,'6'),(3,4,2,'6');
/*!40000 ALTER TABLE `reference_vl_methods` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `rep_analytes`
--

DROP TABLE IF EXISTS `rep_analytes`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `rep_analytes` (
  `ID` int(11) NOT NULL AUTO_INCREMENT,
  `AnalyteDescription` varchar(128) NOT NULL,
  `ProgramID` int(11) DEFAULT NULL,
  `ProviderID` int(11) DEFAULT NULL,
  `LabID` int(11) DEFAULT NULL,
  `CreatedDate` datetime DEFAULT NULL,
  `CreatedBy` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`ID`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `rep_analytes`
--

LOCK TABLES `rep_analytes` WRITE;
/*!40000 ALTER TABLE `rep_analytes` DISABLE KEYS */;
INSERT INTO `rep_analytes` VALUES (1,'Malaria Parasite Detection and Identification',1,1,NULL,'2016-11-29 14:58:18',NULL);
/*!40000 ALTER TABLE `rep_analytes` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `rep_counties`
--

DROP TABLE IF EXISTS `rep_counties`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `rep_counties` (
  `CountyID` int(11) NOT NULL AUTO_INCREMENT,
  `Description` varchar(20) DEFAULT NULL,
  `CreatedBy` varchar(50) DEFAULT NULL,
  `CreatedDate` datetime DEFAULT NULL,
  `dateCreated` datetime DEFAULT CURRENT_TIMESTAMP,
  `status` varchar(45) DEFAULT '1',
  PRIMARY KEY (`CountyID`)
) ENGINE=InnoDB AUTO_INCREMENT=48 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `rep_counties`
--

LOCK TABLES `rep_counties` WRITE;
/*!40000 ALTER TABLE `rep_counties` DISABLE KEYS */;
INSERT INTO `rep_counties` VALUES (1,'BARINGO','1','2016-11-23 16:16:00','2017-04-03 19:41:02','1'),(2,'BOMET','1','2016-11-24 16:16:00','2017-04-03 19:41:02','1'),(3,'BUNGOMA','1','2016-11-25 16:16:00','2017-04-03 19:41:02','1'),(4,'BUSIA','1','2016-11-26 16:16:00','2017-04-03 19:41:02','1'),(5,'ELGEYO MARAKWET','1','2016-11-27 16:16:00','2017-04-03 19:41:02','1'),(6,'EMBU','1','2016-11-28 16:16:00','2017-04-03 19:41:02','1'),(7,'GARISSA','1','2016-11-29 16:16:00','2017-04-03 19:41:02','1'),(8,'HOMA BAY','1','2016-11-30 16:16:00','2017-04-03 19:41:02','1'),(9,'ISIOLO','1','2016-12-01 16:16:00','2017-04-03 19:41:02','1'),(10,'KAJIADO','1','2016-12-02 16:16:00','2017-04-03 19:41:02','1'),(11,'KAKAMEGA','1','2016-12-03 16:16:00','2017-04-03 19:41:02','1'),(12,'KERICHO','1','2016-12-04 16:16:00','2017-04-03 19:41:02','1'),(13,'KIAMBU','1','2016-12-05 16:16:00','2017-04-03 19:41:02','1'),(14,'KILIFI','1','2016-12-06 16:16:00','2017-04-03 19:41:02','1'),(15,'KIRINYAGA','1','2016-12-07 16:16:00','2017-04-03 19:41:02','1'),(16,'KISII','1','2016-12-08 16:16:00','2017-04-03 19:41:02','1'),(17,'KISUMU','1','2016-12-09 16:16:00','2017-04-03 19:41:02','1'),(18,'KITUI','1','2016-12-10 16:16:00','2017-04-03 19:41:02','1'),(19,'KWALE','1','2016-12-11 16:16:00','2017-04-03 19:41:02','1'),(20,'LAIKIPIA','1','2016-12-12 16:16:00','2017-04-03 19:41:02','1'),(21,'LAMU','1','2016-12-13 16:16:00','2017-04-03 19:41:02','1'),(22,'MACHAKOS','1','2016-12-14 16:16:00','2017-04-03 19:41:02','1'),(23,'MAKUENI','1','2016-12-15 16:16:00','2017-04-03 19:41:02','1'),(24,'MANDERA','1','2016-12-16 16:16:00','2017-04-03 19:41:02','1'),(25,'MARSABIT','1','2016-12-17 16:16:00','2017-04-03 19:41:02','1'),(26,'MERU','1','2016-12-18 16:16:00','2017-04-03 19:41:02','1'),(27,'MIGORI','1','2016-12-19 16:16:00','2017-04-03 19:41:02','1'),(28,'MOMBASA','1','2016-12-20 16:16:00','2017-04-03 19:41:02','1'),(29,'MURANG`A','1','2016-12-21 16:16:00','2017-04-03 19:41:02','1'),(30,'NAIROBI','1','2016-12-22 16:16:00','2017-04-03 19:41:02','1'),(31,'NAKURU','1','2016-12-23 16:16:00','2017-04-03 19:41:02','1'),(32,'NANDI','1','2016-12-24 16:16:00','2017-04-03 19:41:02','1'),(33,'NAROK','1','2016-12-25 16:16:00','2017-04-03 19:41:02','1'),(34,'NYAMIRA','1','2016-12-26 16:16:00','2017-04-03 19:41:02','1'),(35,'NYANDARUA','1','2016-12-27 16:16:00','2017-04-03 19:41:02','1'),(36,'NYERI','1','2016-12-28 16:16:00','2017-04-03 19:41:02','1'),(37,'SAMBURU','1','2016-12-29 16:16:00','2017-04-03 19:41:02','1'),(38,'SIAYA','1','2016-12-30 16:16:00','2017-04-03 19:41:02','1'),(39,'TAITA TAVETA','1','2016-12-31 16:16:00','2017-04-03 19:41:02','1'),(40,'TANA RIVER','1','2017-01-01 16:16:00','2017-04-03 19:41:02','1'),(41,'THARAKA NITHI','1','2017-01-02 16:16:00','2017-04-03 19:41:02','1'),(42,'TRANS NZOIA','1','2017-01-03 16:16:00','2017-04-03 19:41:02','1'),(43,'TURKANA','1','2017-01-04 16:16:00','2017-04-03 19:41:02','1'),(44,'UASIN GISHU','1','2017-01-05 16:16:00','2017-04-03 19:41:02','1'),(45,'VIHIGA','1','2017-01-06 16:16:00','2017-04-03 19:41:02','1'),(46,'WAJIR','1','2017-01-07 16:16:00','2017-04-03 19:41:02','1'),(47,'WEST POKOT','1','2017-01-08 16:16:00','2017-04-03 19:41:02','1');
/*!40000 ALTER TABLE `rep_counties` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `rep_customfields`
--

DROP TABLE IF EXISTS `rep_customfields`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `rep_customfields` (
  `ID` int(11) NOT NULL AUTO_INCREMENT,
  `ProviderID` varchar(128) DEFAULT NULL,
  `ProgramID` varchar(128) DEFAULT NULL,
  `ColumnName` varchar(50) DEFAULT NULL,
  `Description` varchar(100) DEFAULT NULL,
  `Mandatory` varchar(128) DEFAULT NULL,
  `Datatype` varchar(50) DEFAULT NULL,
  `Length` int(11) DEFAULT NULL,
  `CreatedBy` varchar(20) DEFAULT NULL,
  `CreatedDate` datetime DEFAULT NULL,
  PRIMARY KEY (`ID`)
) ENGINE=InnoDB AUTO_INCREMENT=62 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `rep_customfields`
--

LOCK TABLES `rep_customfields` WRITE;
/*!40000 ALTER TABLE `rep_customfields` DISABLE KEYS */;
INSERT INTO `rep_customfields` VALUES (55,'HuQas Provider','Malaria','Frequency','Frequency',NULL,NULL,NULL,NULL,NULL),(56,'HuQas Provider','Malaria','StCount','St. Count',NULL,NULL,NULL,NULL,NULL),(57,'HuQas Provider','Malaria','TragetValue','Traget Value',NULL,NULL,NULL,NULL,NULL),(58,'HuQas Provider','Malaria','UpperLimit','Upper Limit',NULL,NULL,NULL,NULL,NULL),(59,'HuQas Provider','Malaria','LowerLimit','Lower Limit',NULL,NULL,NULL,NULL,NULL),(61,'HuQas Provider','Malaria','OverallScore','Overall Score','NULL','varchar',100,'1','0000-00-00 00:00:00');
/*!40000 ALTER TABLE `rep_customfields` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `rep_failreasons`
--

DROP TABLE IF EXISTS `rep_failreasons`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `rep_failreasons` (
  `ID` int(11) NOT NULL AUTO_INCREMENT,
  `ReasonDescription` varchar(200) DEFAULT NULL,
  `ProgramID` varchar(128) DEFAULT NULL,
  `ProviderID` varchar(128) DEFAULT NULL,
  `CreatedBy` varchar(100) DEFAULT NULL,
  `CreatedDate` datetime DEFAULT NULL,
  PRIMARY KEY (`ID`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `rep_failreasons`
--

LOCK TABLES `rep_failreasons` WRITE;
/*!40000 ALTER TABLE `rep_failreasons` DISABLE KEYS */;
INSERT INTO `rep_failreasons` VALUES (1,'Poor Slide Smear','Malaria','HuQas Provider','1','2016-12-08 10:50:23');
/*!40000 ALTER TABLE `rep_failreasons` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `rep_grading`
--

DROP TABLE IF EXISTS `rep_grading`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `rep_grading` (
  `ID` int(11) NOT NULL AUTO_INCREMENT,
  `GradeDescription` varchar(128) NOT NULL,
  `ProgramID` varchar(128) DEFAULT NULL,
  `ProviderID` varchar(128) DEFAULT NULL,
  `CreatedDate` datetime DEFAULT NULL,
  `CreatedBy` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`ID`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `rep_grading`
--

LOCK TABLES `rep_grading` WRITE;
/*!40000 ALTER TABLE `rep_grading` DISABLE KEYS */;
INSERT INTO `rep_grading` VALUES (1,'ACCEPTABLE','Malaria','HuQas Provider','2016-12-08 10:12:52','1'),(2,'NOT ACCEPTABLE','Malaria','HuQas Provider','2016-12-08 10:00:25','1');
/*!40000 ALTER TABLE `rep_grading` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `rep_labcontacts`
--

DROP TABLE IF EXISTS `rep_labcontacts`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `rep_labcontacts` (
  `ContactID` int(11) NOT NULL AUTO_INCREMENT,
  `LabID` int(11) DEFAULT NULL,
  `ContactName` varchar(50) DEFAULT NULL,
  `ContactEmail` varchar(50) DEFAULT NULL,
  `ContactTelephone` varchar(50) DEFAULT NULL,
  `Status` varchar(11) DEFAULT NULL,
  PRIMARY KEY (`ContactID`),
  KEY `LabID` (`LabID`),
  CONSTRAINT `rep_labcontacts_ibfk_1` FOREIGN KEY (`LabID`) REFERENCES `rep_labs` (`LabID`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `rep_labcontacts`
--

LOCK TABLES `rep_labcontacts` WRITE;
/*!40000 ALTER TABLE `rep_labcontacts` DISABLE KEYS */;
INSERT INTO `rep_labcontacts` VALUES (5,1,'Brian Vidolo','brianonyi@gmail.com','037293972993','active'),(6,2,'Brian Kamau','dkamau@abnosoftwares.co.ke','32434343','active');
/*!40000 ALTER TABLE `rep_labcontacts` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `rep_labs`
--

DROP TABLE IF EXISTS `rep_labs`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `rep_labs` (
  `LabID` int(11) NOT NULL AUTO_INCREMENT,
  `LabName` varchar(200) NOT NULL,
  `County` int(11) DEFAULT NULL,
  `Address` varchar(20) DEFAULT NULL,
  `PostalCode` int(11) DEFAULT NULL,
  `Telephone` varchar(20) DEFAULT NULL,
  `ContactName` varchar(50) DEFAULT NULL,
  `ContactEmail` varchar(50) DEFAULT NULL,
  `ContactTelephone` varchar(50) DEFAULT NULL,
  `Status` varchar(20) DEFAULT NULL,
  `CreatedBy` varchar(50) DEFAULT NULL,
  `CreatedDate` datetime DEFAULT NULL,
  PRIMARY KEY (`LabID`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `rep_labs`
--

LOCK TABLES `rep_labs` WRITE;
/*!40000 ALTER TABLE `rep_labs` DISABLE KEYS */;
INSERT INTO `rep_labs` VALUES (1,'Coast Provincial General Hospital',1,'470741',100,'0737547388','dennis kamau','dkamau@abnosoftwares.co.ke','07323243422','active','1','2017-01-18 12:50:50'),(2,'Kenyatta National Hospital\r\n',NULL,'894304',100,'08984743','brian vidoloo','bvidolo@abnosoftwares.co.ke','0839289','active','1','2016-12-08 14:44:07');
/*!40000 ALTER TABLE `rep_labs` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `rep_programs`
--

DROP TABLE IF EXISTS `rep_programs`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `rep_programs` (
  `ProgramID` int(11) NOT NULL AUTO_INCREMENT,
  `ProgramCode` varchar(10) DEFAULT NULL,
  `Description` varchar(128) DEFAULT NULL,
  `Status` varchar(100) DEFAULT NULL,
  `CreatedBy` varchar(50) DEFAULT NULL,
  `CreatedDate` datetime DEFAULT NULL,
  `Comments` text,
  PRIMARY KEY (`ProgramID`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `rep_programs`
--

LOCK TABLES `rep_programs` WRITE;
/*!40000 ALTER TABLE `rep_programs` DISABLE KEYS */;
INSERT INTO `rep_programs` VALUES (1,'MLR','Malaria','active','1','2016-11-23 16:16:23',NULL),(2,'Bio Chem','Bio Chemistry','active','1','2016-12-16 10:06:54',NULL);
/*!40000 ALTER TABLE `rep_programs` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `rep_providercontacts`
--

DROP TABLE IF EXISTS `rep_providercontacts`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `rep_providercontacts` (
  `ContactID` int(11) NOT NULL AUTO_INCREMENT,
  `ProviderID` int(11) DEFAULT NULL,
  `ContactName` varchar(50) DEFAULT NULL,
  `ContactEmail` varchar(50) DEFAULT NULL,
  `ContactTelephone` varchar(50) DEFAULT NULL,
  `Status` varchar(11) DEFAULT NULL,
  PRIMARY KEY (`ContactID`),
  KEY `ProviderID` (`ProviderID`),
  CONSTRAINT `rep_providercontacts_ibfk_1` FOREIGN KEY (`ProviderID`) REFERENCES `rep_providers` (`ProviderID`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `rep_providercontacts`
--

LOCK TABLES `rep_providercontacts` WRITE;
/*!40000 ALTER TABLE `rep_providercontacts` DISABLE KEYS */;
INSERT INTO `rep_providercontacts` VALUES (1,1,'Brian Vidolo','brianonyi@gmail.com','0727547388','active'),(4,8,'Dennis Kamau','dkamau@gmail.com','0727547388','inactive'),(5,NULL,'Brian Kamau','dkamau@abnosoftwares.co.ke','23829380','active'),(6,8,'Victor Mwenda','vmwenda@gmail.com','0722339993','active'),(7,8,'Victor Mwendwa','vmwesh@gmail.com','0722339993','active');
/*!40000 ALTER TABLE `rep_providercontacts` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `rep_providerfiles`
--

DROP TABLE IF EXISTS `rep_providerfiles`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `rep_providerfiles` (
  `ID` int(11) NOT NULL AUTO_INCREMENT,
  `ProviderID` varchar(128) DEFAULT NULL,
  `PeriodID` varchar(128) DEFAULT NULL,
  `ProgramID` varchar(128) DEFAULT NULL,
  `FileName` varchar(100) DEFAULT NULL,
  `FileType` varchar(100) DEFAULT NULL,
  `FileSize` int(11) DEFAULT NULL,
  `Url` varchar(100) DEFAULT NULL,
  `CreatedBy` varchar(50) DEFAULT NULL,
  `CreatedDate` datetime DEFAULT NULL,
  PRIMARY KEY (`ID`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `rep_providerfiles`
--

LOCK TABLES `rep_providerfiles` WRITE;
/*!40000 ALTER TABLE `rep_providerfiles` DISABLE KEYS */;
INSERT INTO `rep_providerfiles` VALUES (1,'1','1','1','Malaria.pdf','application/pdf',142838,'C:\\temp\\Malaria.pdf','1','2016-12-08 11:10:08'),(2,'1','2','2','EQA Process Workflow.pdf','application/pdf',592200,'C:\\temp\\EQA Process Workflow.pdf','1','2016-12-08 14:57:43'),(3,'2','1','1','Malaria.pdf','application/pdf',142838,'C:\\temp\\Malaria.pdf','1','2016-12-15 10:43:56'),(4,'2','1','1','Malaria.pdf','application/pdf',142838,'C:\\temp\\Malaria.pdf','1','2016-12-15 10:55:01'),(5,'8','1','1','Malaria.pdf','application/pdf',142838,'C:\\temp\\Malaria.pdf','7','2016-12-15 13:30:09'),(6,'8','1','2','Basic_Chemistry.pdf','application/pdf',283843,'C:\\temp\\Basic_Chemistry.pdf','7','2016-12-20 15:50:43');
/*!40000 ALTER TABLE `rep_providerfiles` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `rep_providerlabs`
--

DROP TABLE IF EXISTS `rep_providerlabs`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `rep_providerlabs` (
  `ID` int(11) NOT NULL AUTO_INCREMENT,
  `LabID` int(11) DEFAULT NULL,
  `ProviderID` int(11) DEFAULT NULL,
  `CreatedBy` varchar(50) DEFAULT NULL,
  `CreatedDate` datetime DEFAULT NULL,
  PRIMARY KEY (`ID`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `rep_providerlabs`
--

LOCK TABLES `rep_providerlabs` WRITE;
/*!40000 ALTER TABLE `rep_providerlabs` DISABLE KEYS */;
INSERT INTO `rep_providerlabs` VALUES (1,1,1,NULL,NULL);
/*!40000 ALTER TABLE `rep_providerlabs` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `rep_providerprograms`
--

DROP TABLE IF EXISTS `rep_providerprograms`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `rep_providerprograms` (
  `ID` int(11) NOT NULL AUTO_INCREMENT,
  `ProviderID` int(11) DEFAULT NULL,
  `ProgramID` int(11) DEFAULT NULL,
  `CreatedBy` varchar(50) DEFAULT NULL,
  `CreatedDate` datetime DEFAULT NULL,
  PRIMARY KEY (`ID`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `rep_providerprograms`
--

LOCK TABLES `rep_providerprograms` WRITE;
/*!40000 ALTER TABLE `rep_providerprograms` DISABLE KEYS */;
INSERT INTO `rep_providerprograms` VALUES (5,12,1,'1','2016-12-16 12:27:50'),(6,12,2,'1','2016-12-16 12:27:50');
/*!40000 ALTER TABLE `rep_providerprograms` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `rep_providerresultcodes`
--

DROP TABLE IF EXISTS `rep_providerresultcodes`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `rep_providerresultcodes` (
  `ID` int(11) NOT NULL AUTO_INCREMENT,
  `ResultCode` varchar(200) DEFAULT NULL,
  `ProviderID` varchar(128) DEFAULT NULL,
  `CreatedBy` varchar(100) DEFAULT NULL,
  `CreatedDate` datetime DEFAULT NULL,
  PRIMARY KEY (`ID`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `rep_providerresultcodes`
--

LOCK TABLES `rep_providerresultcodes` WRITE;
/*!40000 ALTER TABLE `rep_providerresultcodes` DISABLE KEYS */;
INSERT INTO `rep_providerresultcodes` VALUES (1,'OK','HuQas Provider','1','2016-12-01 11:08:08'),(2,'REAGENT UNAVAILABLE\r\n','HuQas Provider','1','2016-12-01 11:09:33'),(3,'PENDING\r\n','HuQas Provider','1','2016-12-01 11:09:59'),(4,'ANALYZER OUT OF SERVICE\r\n','HuQas Provider','1','2016-12-01 11:10:26'),(5,'FAILURE TO PARTICIPATE\r\n','HuQas Provider','1','2016-12-01 11:10:53'),(6,'TESTING SUSPENDED DURING TEST EVENT\r\n','HuQas Provider','1','2016-12-01 11:11:13'),(7,'BELOW LINEAR/DETECTION LIMIT\r\n','HuQas Provider','1','2016-12-01 11:11:40');
/*!40000 ALTER TABLE `rep_providerresultcodes` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `rep_providerrounds`
--

DROP TABLE IF EXISTS `rep_providerrounds`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `rep_providerrounds` (
  `ID` int(11) NOT NULL AUTO_INCREMENT,
  `PeriodDescription` varchar(128) NOT NULL,
  `ProviderID` varchar(128) DEFAULT NULL,
  `EnrolledLabs` int(11) DEFAULT NULL,
  `CreatedBy` varchar(50) DEFAULT NULL,
  `CreatedDate` datetime DEFAULT NULL,
  PRIMARY KEY (`ID`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `rep_providerrounds`
--

LOCK TABLES `rep_providerrounds` WRITE;
/*!40000 ALTER TABLE `rep_providerrounds` DISABLE KEYS */;
INSERT INTO `rep_providerrounds` VALUES (1,'2nd Test Event 2016','HuQas Provider',30,'1','2016-12-08 10:03:13'),(2,'3rd Test Event 2016','HuQas Provider',40,'1','2016-12-08 10:07:27');
/*!40000 ALTER TABLE `rep_providerrounds` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `rep_providers`
--

DROP TABLE IF EXISTS `rep_providers`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `rep_providers` (
  `ProviderID` int(11) NOT NULL AUTO_INCREMENT,
  `ProviderName` varchar(100) NOT NULL,
  `Email` varchar(50) DEFAULT NULL,
  `Address` varchar(20) DEFAULT NULL,
  `Telephone` varchar(20) DEFAULT NULL,
  `PostalCode` int(10) DEFAULT NULL,
  `ContactName` varchar(100) DEFAULT NULL,
  `ContactTelephone` varchar(20) DEFAULT NULL,
  `ContactEmail` varchar(50) DEFAULT NULL,
  `Status` varchar(100) DEFAULT NULL,
  `CreatedBy` varchar(50) DEFAULT NULL,
  `CreatedDate` datetime DEFAULT NULL,
  PRIMARY KEY (`ProviderID`)
) ENGINE=InnoDB AUTO_INCREMENT=14 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `rep_providers`
--

LOCK TABLES `rep_providers` WRITE;
/*!40000 ALTER TABLE `rep_providers` DISABLE KEYS */;
INSERT INTO `rep_providers` VALUES (1,'HuQas Provider','brianonyi@gmail.com','47074 Nairobi, Kenya','0737547388',100,'Dennis Kamau','0727368823','dkamau@abnosoftwares','active','1','2016-11-23 13:26:08'),(2,'Hiv PT','vmwenda@gmail.com','73827','078327393',100,'Victor Mwenda','0722339993','bvidolo@abnosoftwares.co.ke','active','1','2016-12-14 09:06:27'),(8,'Amref Provider','info@amref.co.ke','656555','0722339993',100,'Brian Vidolo','0722339993','brianonyi@gmail.com','active','1','2016-12-14 09:41:12'),(12,'Micro Provider','brianonyi@gmail.com','97765','0722339993',100,'Brian Vidolo','0722339993','bvidolo@abnosoftwares.co.ke','active','1','2016-12-16 12:27:50'),(13,'Victor Vidal','vvidal@gmail.com','47074','0722339993',100,NULL,NULL,NULL,'active','9','2017-04-03 12:07:51');
/*!40000 ALTER TABLE `rep_providers` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `rep_providersamples`
--

DROP TABLE IF EXISTS `rep_providersamples`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `rep_providersamples` (
  `ID` int(11) NOT NULL AUTO_INCREMENT,
  `SampleCode` varchar(100) DEFAULT NULL,
  `ProviderID` varchar(128) DEFAULT NULL,
  `ProgramID` varchar(128) DEFAULT NULL,
  `PeriodID` varchar(128) DEFAULT NULL,
  `LabID` varchar(128) DEFAULT NULL,
  `CreatedBy` varchar(100) DEFAULT NULL,
  `CreatedDate` datetime DEFAULT NULL,
  PRIMARY KEY (`ID`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `rep_providersamples`
--

LOCK TABLES `rep_providersamples` WRITE;
/*!40000 ALTER TABLE `rep_providersamples` DISABLE KEYS */;
INSERT INTO `rep_providersamples` VALUES (1,'A','HuQas Provider','Malaria','2nd Test Event 2016','Lab-001','1','2016-12-01 10:17:09'),(2,'B','HuQas Provider','Malaria','2nd Test Event 2016','Lab-001','1','2016-12-01 10:17:19'),(3,'C','HuQas Provider','Malaria','2nd Test Event 2016','Lab-001','1','2016-12-01 10:17:30'),(4,'D','HuQas Provider','Malaria','2nd Test Event 2016','Lab-001','1','2016-12-01 10:17:40');
/*!40000 ALTER TABLE `rep_providersamples` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `rep_repository`
--

DROP TABLE IF EXISTS `rep_repository`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `rep_repository` (
  `ImpID` int(11) NOT NULL AUTO_INCREMENT COMMENT 'Repository unique Identifier',
  `ProviderID` varchar(128) DEFAULT NULL COMMENT 'Provider Name',
  `LabID` varchar(200) DEFAULT NULL COMMENT 'Lab Names',
  `RoundID` varchar(128) DEFAULT NULL COMMENT 'Round Names',
  `ProgramID` varchar(128) DEFAULT NULL COMMENT 'Program Name',
  `ReleaseDate` date DEFAULT NULL COMMENT 'Release Date',
  `SampleCode` varchar(100) DEFAULT NULL COMMENT 'Sample Code',
  `AnalyteID` varchar(128) DEFAULT NULL COMMENT 'Analyte Name',
  `SampleCondition` varchar(100) DEFAULT NULL COMMENT 'Sample Condition',
  `DateSampleReceived` datetime DEFAULT NULL COMMENT 'Date Sample Received',
  `Result` varchar(200) DEFAULT NULL COMMENT 'Result',
  `ResultCode` varchar(100) DEFAULT NULL COMMENT 'Result Code',
  `Grade` varchar(128) DEFAULT NULL COMMENT 'Grade',
  `TestKitID` varchar(128) DEFAULT NULL COMMENT 'Test Kit Name',
  `DateSampleShipped` datetime DEFAULT NULL COMMENT 'Date Sample Shipped',
  `FailReasonCode` varchar(100) DEFAULT NULL COMMENT 'Fail Reason Code',
  `Frequency` text COMMENT 'Frequency',
  `StCount` text COMMENT 'St. Count',
  `TragetValue` text COMMENT 'Traget Value',
  `UpperLimit` text COMMENT 'Upper Limit',
  `LowerLimit` text COMMENT 'Lower Limit',
  `OverallScore` varchar(100) DEFAULT NULL COMMENT 'Overall Score',
  PRIMARY KEY (`ImpID`),
  KEY `rep_repository_ibfk_1` (`ProviderID`),
  KEY `LabID` (`LabID`),
  KEY `RoundID` (`RoundID`),
  KEY `ProgramID` (`ProgramID`),
  KEY `AnalyteID` (`AnalyteID`),
  KEY `Grade` (`Grade`),
  KEY `TestKitID` (`TestKitID`)
) ENGINE=InnoDB AUTO_INCREMENT=91 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `rep_repository`
--

LOCK TABLES `rep_repository` WRITE;
/*!40000 ALTER TABLE `rep_repository` DISABLE KEYS */;
INSERT INTO `rep_repository` VALUES (1,'HuQas Provider','Coast Provincial General Hospital','2nd Test Event 2016','Malaria','2016-02-02','A','Malaria Parasite Detection and Identification ',NULL,NULL,'No Parasite Seen','OK','NOT ACCEPTABLE',NULL,NULL,NULL,'A','42416','','','42416',NULL),(2,'HuQas Provider','Coast Provincial General Hospital','2nd Test Event 2016','Malaria','2016-02-03','B','Malaria Parasite Detection and Identification ',NULL,NULL,'No Parasite Seen','OK','ACCEPTABLE',NULL,NULL,NULL,'B','42416','','','42416',NULL),(3,'HuQas Provider','Coast Provincial General Hospital','2nd Test Event 2016','Malaria','2016-02-04','C','Malaria Parasite Detection and Identification ',NULL,NULL,'Plasmodium falciparum','OK','NOT ACCEPTABLE',NULL,NULL,NULL,'C','42417','','','42417',NULL),(4,'HuQas Provider','Coast Provincial General Hospital','2nd Test Event 2016','Malaria','2016-02-05','D','Malaria Parasite Detection and Identification ',NULL,NULL,'Plasmodium falciparum','OK','ACCEPTABLE',NULL,NULL,NULL,'D','42418','','','42418',NULL),(5,'HuQas Provider','Coast Provincial General Hospital','2nd Test Event 2016','Malaria','2016-02-06','E','Malaria Parasite Detection and Identification ',NULL,NULL,'Plasmodium ovale','OK','ACCEPTABLE',NULL,NULL,NULL,'E','42419','','','42419',NULL),(6,'HuQas Provider','Kangemi Health Center','2nd Test Event 2016','Malaria','2016-02-07','A','Malaria Parasite Detection and Identification ',NULL,NULL,'No Parasite Seen','OK','NOT ACCEPTABLE',NULL,NULL,NULL,'A','42420','','','42420',NULL),(7,'HuQas Provider','Kangemi Health Center','2nd Test Event 2016','Malaria','2016-02-08','B','Malaria Parasite Detection and Identification ',NULL,NULL,'No Parasite Seen','OK','ACCEPTABLE',NULL,NULL,NULL,'B','42421','','','42421',NULL),(8,'HuQas Provider','Kangemi Health Center','2nd Test Event 2016','Malaria','2016-02-09','C','Malaria Parasite Detection and Identification ',NULL,NULL,'Plasmodium falciparum','OK','NOT ACCEPTABLE',NULL,NULL,NULL,'C','42422','','','42422',NULL),(9,'HuQas Provider','Kangemi Health Center','2nd Test Event 2016','Malaria','2016-02-10','D','Malaria Parasite Detection and Identification ',NULL,NULL,'Plasmodium falciparum','OK','ACCEPTABLE',NULL,NULL,NULL,'D','42423','','','42423',NULL),(10,'HuQas Provider','Kangemi Health Center','2nd Test Event 2016','Malaria','2016-02-11','E','Malaria Parasite Detection and Identification ',NULL,NULL,'Plasmodium ovale','OK','ACCEPTABLE',NULL,NULL,NULL,'E','42424','','','42424',NULL),(11,'HuQas Provider','Kenyatta National Hospital','2nd Test Event 2016','Malaria','2016-02-12','5','Malaria Parasite Detection and Identification ',NULL,NULL,'Plasmodium malariae','OK','ACCEPTABLE',NULL,NULL,NULL,'A','42425','','','42425',NULL),(12,'HuQas Provider','Kenyatta National Hospital','2nd Test Event 2016','Malaria','2016-02-13','B','Malaria Parasite Detection and Identification ',NULL,NULL,'No Parasite Seen','OK','ACCEPTABLE',NULL,NULL,NULL,'B','42426','','','42426',NULL),(13,'HuQas Provider','Kenyatta National Hospital','2nd Test Event 2016','Malaria','2016-02-14','C','Malaria Parasite Detection and Identification ',NULL,NULL,'Plasmodium falciparum, Plasmodium malariae','OK','ACCEPTABLE',NULL,NULL,NULL,'C','42427','','','42427',NULL),(14,'HuQas Provider','Kenyatta National Hospital','2nd Test Event 2016','Malaria','2016-02-15','D','Malaria Parasite Detection and Identification ',NULL,NULL,'Plasmodium falciparum','OK','ACCEPTABLE',NULL,NULL,NULL,'D','42428','','','42428',NULL),(15,'HuQas Provider','Kenyatta National Hospital','2nd Test Event 2016','Malaria','2016-02-16','E','Malaria Parasite Detection and Identification ',NULL,NULL,'Plasmodium ovale, Plasmodium vivax','OK','NOT ACCEPTABLE',NULL,NULL,NULL,'E','42429','','','42429',NULL),(16,'HuQas Provider','Kenyatta National Hospital- BTU','2nd Test Event 2016','Malaria','2016-02-17','A','Malaria Parasite Detection and Identification ',NULL,NULL,'No Parasite Seen','OK','NOT ACCEPTABLE',NULL,NULL,NULL,'A','42430','','','42430',NULL),(17,'HuQas Provider','Kenyatta National Hospital- BTU','2nd Test Event 2016','Malaria','2016-02-18','B','Malaria Parasite Detection and Identification ',NULL,NULL,'No Parasite Seen','OK','ACCEPTABLE',NULL,NULL,NULL,'B','42431','','','42431',NULL),(18,'HuQas Provider','Kenyatta National Hospital- BTU','2nd Test Event 2016','Malaria','2016-02-19','C','Malaria Parasite Detection and Identification ',NULL,NULL,'Plasmodium vivax','OK','NOT ACCEPTABLE',NULL,NULL,NULL,'C','42432','','','42432',NULL),(19,'HuQas Provider','Kenyatta National Hospital- BTU','2nd Test Event 2016','Malaria','2016-02-20','D','Malaria Parasite Detection and Identification ',NULL,NULL,'Plasmodium vivax','OK','NOT ACCEPTABLE',NULL,NULL,NULL,'D','42433','','','42433',NULL),(20,'HuQas Provider','Kenyatta National Hospital- BTU','2nd Test Event 2016','Malaria','2016-02-21','E','Malaria Parasite Detection and Identification ',NULL,NULL,'Plasmodium ovale','OK','ACCEPTABLE',NULL,NULL,NULL,'E','42434','','','42434',NULL),(21,'HuQas Provider','Gilgil Sub-District Hospital','2nd Test Event 2016','Malaria','2016-02-22','A','Malaria Parasite Detection and Identification ',NULL,NULL,'No Parasite Seen','OK','NOT ACCEPTABLE',NULL,NULL,NULL,'A','42435','','','42435',NULL),(22,'HuQas Provider','Gilgil Sub-District Hospital','2nd Test Event 2016','Malaria','2016-02-23','B','Malaria Parasite Detection and Identification ',NULL,NULL,'No Parasite Seen','OK','ACCEPTABLE',NULL,NULL,NULL,'B','42436','','','42436',NULL),(23,'HuQas Provider','Gilgil Sub-District Hospital','2nd Test Event 2016','Malaria','2016-02-24','C','Malaria Parasite Detection and Identification ',NULL,NULL,'Plasmodium falciparum','OK','NOT ACCEPTABLE',NULL,NULL,NULL,'C','42437','','','42437',NULL),(24,'HuQas Provider','Gilgil Sub-District Hospital','2nd Test Event 2016','Malaria','2016-02-25','D','Malaria Parasite Detection and Identification ',NULL,NULL,'Plasmodium falciparum','OK','ACCEPTABLE',NULL,NULL,NULL,'D','42438','','','42438',NULL),(25,'HuQas Provider','Gilgil Sub-District Hospital','2nd Test Event 2016','Malaria','2016-02-26','E','Malaria Parasite Detection and Identification ',NULL,NULL,'Plasmodium malariae','OK','NOT ACCEPTABLE',NULL,NULL,NULL,'E','42439','','','42439',NULL),(26,'HuQas Provider','Kangema Sub County Hospital','2nd Test Event 2016','Malaria','2016-02-27','A','Malaria Parasite Detection and Identification ',NULL,NULL,'Plasmodium malariae','OK','ACCEPTABLE',NULL,NULL,NULL,'A','42440','','','42440',NULL),(27,'HuQas Provider','Kangema Sub County Hospital','2nd Test Event 2016','Malaria','2016-02-28','B','Malaria Parasite Detection and Identification ',NULL,NULL,'No Parasite Seen','OK','ACCEPTABLE',NULL,NULL,NULL,'B','42441','','','42441',NULL),(28,'HuQas Provider','Kangema Sub County Hospital','2nd Test Event 2016','Malaria','2016-02-29','C','Malaria Parasite Detection and Identification ',NULL,NULL,'Plasmodium falciparum, Plasmodium malariae','OK','ACCEPTABLE',NULL,NULL,NULL,'C','42442','','','42442',NULL),(29,'HuQas Provider','Kangema Sub County Hospital','2nd Test Event 2016','Malaria','2016-03-01','D','Malaria Parasite Detection and Identification ',NULL,NULL,'Plasmodium falciparum','OK','ACCEPTABLE',NULL,NULL,NULL,'D','42443','','','42443',NULL),(30,'HuQas Provider','Kangema Sub County Hospital','2nd Test Event 2016','Malaria','2016-03-02','E','Malaria Parasite Detection and Identification ',NULL,NULL,'Plasmodium ovale','OK','ACCEPTABLE',NULL,NULL,NULL,'E','42444','','','42444',NULL),(31,'Amref Provider','Coast Provincial General Hospital','2nd Test Event 2016','Malaria','2016-02-02','A','Malaria Parasite Detection and Identification ',NULL,NULL,'No Parasite Seen','OK','NOT ACCEPTABLE',NULL,NULL,NULL,'A','42416','','','42416',NULL),(32,'Amref Provider','Coast Provincial General Hospital','2nd Test Event 2016','Malaria','2016-02-03','B','Malaria Parasite Detection and Identification ',NULL,NULL,'No Parasite Seen','OK','ACCEPTABLE',NULL,NULL,NULL,'B','42416','','','42416',NULL),(33,'Amref Provider','Coast Provincial General Hospital','2nd Test Event 2016','Malaria','2016-02-04','C','Malaria Parasite Detection and Identification ',NULL,NULL,'Plasmodium falciparum','OK','NOT ACCEPTABLE',NULL,NULL,NULL,'C','42417','','','42417',NULL),(34,'Amref Provider','Coast Provincial General Hospital','2nd Test Event 2016','Malaria','2016-02-05','D','Malaria Parasite Detection and Identification ',NULL,NULL,'Plasmodium falciparum','OK','ACCEPTABLE',NULL,NULL,NULL,'D','42418','','','42418',NULL),(35,'Amref Provider','Coast Provincial General Hospital','2nd Test Event 2016','Malaria','2016-02-06','E','Malaria Parasite Detection and Identification ',NULL,NULL,'Plasmodium ovale','OK','ACCEPTABLE',NULL,NULL,NULL,'E','42419','','','42419',NULL),(36,'Amref Provider','Kangemi Health Center','2nd Test Event 2016','Malaria','2016-02-07','A','Malaria Parasite Detection and Identification ',NULL,NULL,'No Parasite Seen','OK','NOT ACCEPTABLE',NULL,NULL,NULL,'A','42420','','','42420',NULL),(37,'Amref Provider','Kangemi Health Center','2nd Test Event 2016','Malaria','2016-02-08','B','Malaria Parasite Detection and Identification ',NULL,NULL,'No Parasite Seen','OK','ACCEPTABLE',NULL,NULL,NULL,'B','42421','','','42421',NULL),(38,'Amref Provider','Kangemi Health Center','2nd Test Event 2016','Malaria','2016-02-09','C','Malaria Parasite Detection and Identification ',NULL,NULL,'Plasmodium falciparum','OK','NOT ACCEPTABLE',NULL,NULL,NULL,'C','42422','','','42422',NULL),(39,'Amref Provider','Kangemi Health Center','2nd Test Event 2016','Malaria','2016-02-10','D','Malaria Parasite Detection and Identification ',NULL,NULL,'Plasmodium falciparum','OK','ACCEPTABLE',NULL,NULL,NULL,'D','42423','','','42423',NULL),(40,'Amref Provider','Kangemi Health Center','2nd Test Event 2016','Malaria','2016-02-11','E','Malaria Parasite Detection and Identification ',NULL,NULL,'Plasmodium ovale','OK','ACCEPTABLE',NULL,NULL,NULL,'E','42424','','','42424',NULL),(41,'Amref Provider','Kenyatta National Hospital','2nd Test Event 2016','Malaria','2016-02-12','5','Malaria Parasite Detection and Identification ',NULL,NULL,'Plasmodium malariae','OK','ACCEPTABLE',NULL,NULL,NULL,'A','42425','','','42425',NULL),(42,'Amref Provider','Kenyatta National Hospital','2nd Test Event 2016','Malaria','2016-02-13','B','Malaria Parasite Detection and Identification ',NULL,NULL,'No Parasite Seen','OK','ACCEPTABLE',NULL,NULL,NULL,'B','42426','','','42426',NULL),(43,'Amref Provider','Kenyatta National Hospital','2nd Test Event 2016','Malaria','2016-02-14','C','Malaria Parasite Detection and Identification ',NULL,NULL,'Plasmodium falciparum, Plasmodium malariae','OK','ACCEPTABLE',NULL,NULL,NULL,'C','42427','','','42427',NULL),(44,'Amref Provider','Kenyatta National Hospital','2nd Test Event 2016','Malaria','2016-02-15','D','Malaria Parasite Detection and Identification ',NULL,NULL,'Plasmodium falciparum','OK','ACCEPTABLE',NULL,NULL,NULL,'D','42428','','','42428',NULL),(45,'Amref Provider','Kenyatta National Hospital','2nd Test Event 2016','Malaria','2016-02-16','E','Malaria Parasite Detection and Identification ',NULL,NULL,'Plasmodium ovale, Plasmodium vivax','OK','NOT ACCEPTABLE',NULL,NULL,NULL,'E','42429','','','42429',NULL),(46,'Amref Provider','Kenyatta National Hospital- BTU','2nd Test Event 2016','Malaria','2016-02-17','A','Malaria Parasite Detection and Identification ',NULL,NULL,'No Parasite Seen','OK','NOT ACCEPTABLE',NULL,NULL,NULL,'A','42430','','','42430',NULL),(47,'Amref Provider','Kenyatta National Hospital- BTU','2nd Test Event 2016','Malaria','2016-02-18','B','Malaria Parasite Detection and Identification ',NULL,NULL,'No Parasite Seen','OK','ACCEPTABLE',NULL,NULL,NULL,'B','42431','','','42431',NULL),(48,'Amref Provider','Kenyatta National Hospital- BTU','2nd Test Event 2016','Malaria','2016-02-19','C','Malaria Parasite Detection and Identification ',NULL,NULL,'Plasmodium vivax','OK','NOT ACCEPTABLE',NULL,NULL,NULL,'C','42432','','','42432',NULL),(49,'Amref Provider','Kenyatta National Hospital- BTU','2nd Test Event 2016','Malaria','2016-02-20','D','Malaria Parasite Detection and Identification ',NULL,NULL,'Plasmodium vivax','OK','NOT ACCEPTABLE',NULL,NULL,NULL,'D','42433','','','42433',NULL),(50,'Amref Provider','Kenyatta National Hospital- BTU','2nd Test Event 2016','Malaria','2016-02-21','E','Malaria Parasite Detection and Identification ',NULL,NULL,'Plasmodium ovale','OK','ACCEPTABLE',NULL,NULL,NULL,'E','42434','','','42434',NULL),(51,'Amref Provider','Gilgil Sub-District Hospital','2nd Test Event 2016','Malaria','2016-02-22','A','Malaria Parasite Detection and Identification ',NULL,NULL,'No Parasite Seen','OK','NOT ACCEPTABLE',NULL,NULL,NULL,'A','42435','','','42435',NULL),(52,'Amref Provider','Gilgil Sub-District Hospital','2nd Test Event 2016','Malaria','2016-02-23','B','Malaria Parasite Detection and Identification ',NULL,NULL,'No Parasite Seen','OK','ACCEPTABLE',NULL,NULL,NULL,'B','42436','','','42436',NULL),(53,'Amref Provider','Gilgil Sub-District Hospital','2nd Test Event 2016','Malaria','2016-02-24','C','Malaria Parasite Detection and Identification ',NULL,NULL,'Plasmodium falciparum','OK','NOT ACCEPTABLE',NULL,NULL,NULL,'C','42437','','','42437',NULL),(54,'Amref Provider','Gilgil Sub-District Hospital','2nd Test Event 2016','Malaria','2016-02-25','D','Malaria Parasite Detection and Identification ',NULL,NULL,'Plasmodium falciparum','OK','ACCEPTABLE',NULL,NULL,NULL,'D','42438','','','42438',NULL),(55,'Amref Provider','Gilgil Sub-District Hospital','2nd Test Event 2016','Malaria','2016-02-26','E','Malaria Parasite Detection and Identification ',NULL,NULL,'Plasmodium malariae','OK','NOT ACCEPTABLE',NULL,NULL,NULL,'E','42439','','','42439',NULL),(56,'Amref Provider','Kangema Sub County Hospital','2nd Test Event 2016','Malaria','2016-02-27','A','Malaria Parasite Detection and Identification ',NULL,NULL,'Plasmodium malariae','OK','ACCEPTABLE',NULL,NULL,NULL,'A','42440','','','42440',NULL),(57,'Amref Provider','Kangema Sub County Hospital','2nd Test Event 2016','Malaria','2016-02-28','B','Malaria Parasite Detection and Identification ',NULL,NULL,'No Parasite Seen','OK','ACCEPTABLE',NULL,NULL,NULL,'B','42441','','','42441',NULL),(58,'Amref Provider','Kangema Sub County Hospital','2nd Test Event 2016','Malaria','2016-02-29','C','Malaria Parasite Detection and Identification ',NULL,NULL,'Plasmodium falciparum, Plasmodium malariae','OK','ACCEPTABLE',NULL,NULL,NULL,'C','42442','','','42442',NULL),(59,'Amref Provider','Kangema Sub County Hospital','2nd Test Event 2016','Malaria','2016-03-01','D','Malaria Parasite Detection and Identification ',NULL,NULL,'Plasmodium falciparum','OK','ACCEPTABLE',NULL,NULL,NULL,'D','42443','','','42443',NULL),(60,'Amref Provider','Kangema Sub County Hospital','2nd Test Event 2016','Malaria','2016-03-02','E','Malaria Parasite Detection and Identification ',NULL,NULL,'Plasmodium ovale','OK','ACCEPTABLE',NULL,NULL,NULL,'E','42444','','','42444',NULL),(61,'Amref Provider','Coast Provincial General Hospital','3rd Test Event 2016','Malaria','2016-02-02','A','Malaria Parasite Detection and Identification ',NULL,NULL,'No Parasite Seen','OK','NOT ACCEPTABLE',NULL,NULL,NULL,'A','42416','','','42416',NULL),(62,'Amref Provider','Coast Provincial General Hospital','3rd Test Event 2016','Malaria','2016-02-03','B','Malaria Parasite Detection and Identification ',NULL,NULL,'No Parasite Seen','OK','ACCEPTABLE',NULL,NULL,NULL,'B','42416','','','42416',NULL),(63,'Amref Provider','Coast Provincial General Hospital','3rd Test Event 2016','Malaria','2016-02-04','C','Malaria Parasite Detection and Identification ',NULL,NULL,'Plasmodium falciparum','OK','NOT ACCEPTABLE',NULL,NULL,NULL,'C','42417','','','42417',NULL),(64,'Amref Provider','Coast Provincial General Hospital','3rd Test Event 2016','Malaria','2016-02-05','D','Malaria Parasite Detection and Identification ',NULL,NULL,'Plasmodium falciparum','OK','ACCEPTABLE',NULL,NULL,NULL,'D','42418','','','42418',NULL),(65,'Amref Provider','Coast Provincial General Hospital','3rd Test Event 2016','Malaria','2016-02-06','E','Malaria Parasite Detection and Identification ',NULL,NULL,'Plasmodium ovale','OK','ACCEPTABLE',NULL,NULL,NULL,'E','42419','','','42419',NULL),(66,'Amref Provider','Kangemi Health Center','3rd Test Event 2016','Malaria','2016-02-07','A','Malaria Parasite Detection and Identification ',NULL,NULL,'No Parasite Seen','OK','NOT ACCEPTABLE',NULL,NULL,NULL,'A','42420','','','42420',NULL),(67,'Amref Provider','Kangemi Health Center','3rd Test Event 2016','Malaria','2016-02-08','B','Malaria Parasite Detection and Identification ',NULL,NULL,'No Parasite Seen','OK','ACCEPTABLE',NULL,NULL,NULL,'B','42421','','','42421',NULL),(68,'Amref Provider','Kangemi Health Center','3rd Test Event 2016','Malaria','2016-02-09','C','Malaria Parasite Detection and Identification ',NULL,NULL,'Plasmodium falciparum','OK','NOT ACCEPTABLE',NULL,NULL,NULL,'C','42422','','','42422',NULL),(69,'Amref Provider','Kangemi Health Center','3rd Test Event 2016','Malaria','2016-02-10','D','Malaria Parasite Detection and Identification ',NULL,NULL,'Plasmodium falciparum','OK','ACCEPTABLE',NULL,NULL,NULL,'D','42423','','','42423',NULL),(70,'Amref Provider','Kangemi Health Center','3rd Test Event 2016','Malaria','2016-02-11','E','Malaria Parasite Detection and Identification ',NULL,NULL,'Plasmodium ovale','OK','ACCEPTABLE',NULL,NULL,NULL,'E','42424','','','42424',NULL),(71,'Amref Provider','Kenyatta National Hospital','3rd Test Event 2016','Malaria','2016-02-12','5','Malaria Parasite Detection and Identification ',NULL,NULL,'Plasmodium malariae','OK','ACCEPTABLE',NULL,NULL,NULL,'A','42425','','','42425',NULL),(72,'Amref Provider','Kenyatta National Hospital','3rd Test Event 2016','Malaria','2016-02-13','B','Malaria Parasite Detection and Identification ',NULL,NULL,'No Parasite Seen','OK','ACCEPTABLE',NULL,NULL,NULL,'B','42426','','','42426',NULL),(73,'Amref Provider','Kenyatta National Hospital','3rd Test Event 2016','Malaria','2016-02-14','C','Malaria Parasite Detection and Identification ',NULL,NULL,'Plasmodium falciparum, Plasmodium malariae','OK','ACCEPTABLE',NULL,NULL,NULL,'C','42427','','','42427',NULL),(74,'Amref Provider','Kenyatta National Hospital','3rd Test Event 2016','Malaria','2016-02-15','D','Malaria Parasite Detection and Identification ',NULL,NULL,'Plasmodium falciparum','OK','ACCEPTABLE',NULL,NULL,NULL,'D','42428','','','42428',NULL),(75,'Amref Provider','Kenyatta National Hospital','3rd Test Event 2016','Malaria','2016-02-16','E','Malaria Parasite Detection and Identification ',NULL,NULL,'Plasmodium ovale, Plasmodium vivax','OK','NOT ACCEPTABLE',NULL,NULL,NULL,'E','42429','','','42429',NULL),(76,'Amref Provider','Kenyatta National Hospital- BTU','3rd Test Event 2016','Malaria','2016-02-17','A','Malaria Parasite Detection and Identification ',NULL,NULL,'No Parasite Seen','OK','NOT ACCEPTABLE',NULL,NULL,NULL,'A','42430','','','42430',NULL),(77,'Amref Provider','Kenyatta National Hospital- BTU','3rd Test Event 2016','Malaria','2016-02-18','B','Malaria Parasite Detection and Identification ',NULL,NULL,'No Parasite Seen','OK','ACCEPTABLE',NULL,NULL,NULL,'B','42431','','','42431',NULL),(78,'Amref Provider','Kenyatta National Hospital- BTU','3rd Test Event 2016','Malaria','2016-02-19','C','Malaria Parasite Detection and Identification ',NULL,NULL,'Plasmodium vivax','OK','NOT ACCEPTABLE',NULL,NULL,NULL,'C','42432','','','42432',NULL),(79,'Amref Provider','Kenyatta National Hospital- BTU','3rd Test Event 2016','Malaria','2016-02-20','D','Malaria Parasite Detection and Identification ',NULL,NULL,'Plasmodium vivax','OK','NOT ACCEPTABLE',NULL,NULL,NULL,'D','42433','','','42433',NULL),(80,'Amref Provider','Kenyatta National Hospital- BTU','3rd Test Event 2016','Malaria','2016-02-21','E','Malaria Parasite Detection and Identification ',NULL,NULL,'Plasmodium ovale','OK','ACCEPTABLE',NULL,NULL,NULL,'E','42434','','','42434',NULL),(81,'Amref Provider','Gilgil Sub-District Hospital','3rd Test Event 2016','Malaria','2016-02-22','A','Malaria Parasite Detection and Identification ',NULL,NULL,'No Parasite Seen','OK','NOT ACCEPTABLE',NULL,NULL,NULL,'A','42435','','','42435',NULL),(82,'Amref Provider','Gilgil Sub-District Hospital','3rd Test Event 2016','Malaria','2016-02-23','B','Malaria Parasite Detection and Identification ',NULL,NULL,'No Parasite Seen','OK','ACCEPTABLE',NULL,NULL,NULL,'B','42436','','','42436',NULL),(83,'Amref Provider','Gilgil Sub-District Hospital','3rd Test Event 2016','Malaria','2016-02-24','C','Malaria Parasite Detection and Identification ',NULL,NULL,'Plasmodium falciparum','OK','NOT ACCEPTABLE',NULL,NULL,NULL,'C','42437','','','42437',NULL),(84,'Amref Provider','Gilgil Sub-District Hospital','3rd Test Event 2016','Malaria','2016-02-25','D','Malaria Parasite Detection and Identification ',NULL,NULL,'Plasmodium falciparum','OK','ACCEPTABLE',NULL,NULL,NULL,'D','42438','','','42438',NULL),(85,'Amref Provider','Gilgil Sub-District Hospital','3rd Test Event 2016','Malaria','2016-02-26','E','Malaria Parasite Detection and Identification ',NULL,NULL,'Plasmodium malariae','OK','NOT ACCEPTABLE',NULL,NULL,NULL,'E','42439','','','42439',NULL),(86,'Amref Provider','Kangema Sub County Hospital','3rd Test Event 2016','Malaria','2016-02-27','A','Malaria Parasite Detection and Identification ',NULL,NULL,'Plasmodium malariae','OK','ACCEPTABLE',NULL,NULL,NULL,'A','42440','','','42440',NULL),(87,'Amref Provider','Kangema Sub County Hospital','3rd Test Event 2016','Malaria','2016-02-28','B','Malaria Parasite Detection and Identification ',NULL,NULL,'No Parasite Seen','OK','ACCEPTABLE',NULL,NULL,NULL,'B','42441','','','42441',NULL),(88,'Amref Provider','Kangema Sub County Hospital','3rd Test Event 2016','Malaria','2016-02-29','C','Malaria Parasite Detection and Identification ',NULL,NULL,'Plasmodium falciparum, Plasmodium malariae','OK','ACCEPTABLE',NULL,NULL,NULL,'C','42442','','','42442',NULL),(89,'Amref Provider','Kangema Sub County Hospital','3rd Test Event 2016','Malaria','2016-03-01','D','Malaria Parasite Detection and Identification ',NULL,NULL,'Plasmodium falciparum','OK','ACCEPTABLE',NULL,NULL,NULL,'D','42443','','','42443',NULL),(90,'Amref Provider','Kangema Sub County Hospital','3rd Test Event 2016','Malaria','2016-03-02','E','Malaria Parasite Detection and Identification ',NULL,NULL,'Plasmodium ovale','OK','ACCEPTABLE',NULL,NULL,NULL,'E','42444','','','42444',NULL);
/*!40000 ALTER TABLE `rep_repository` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `rep_testkits`
--

DROP TABLE IF EXISTS `rep_testkits`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `rep_testkits` (
  `ID` int(11) NOT NULL AUTO_INCREMENT,
  `TestKitName` varchar(128) NOT NULL,
  `ProgramID` varchar(128) DEFAULT NULL,
  `ProviderID` varchar(128) DEFAULT NULL,
  `CreatedBy` varchar(50) DEFAULT NULL,
  `CreatedDate` datetime DEFAULT NULL,
  PRIMARY KEY (`ID`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `rep_testkits`
--

LOCK TABLES `rep_testkits` WRITE;
/*!40000 ALTER TABLE `rep_testkits` DISABLE KEYS */;
INSERT INTO `rep_testkits` VALUES (1,'TestKit 1','Malaria','HuQas Provider','1','2016-12-08 10:12:36'),(2,'TestKit 2','Malaria','HuQas Provider','1','2016-12-08 10:14:54');
/*!40000 ALTER TABLE `rep_testkits` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `report_config`
--

DROP TABLE IF EXISTS `report_config`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `report_config` (
  `name` varchar(255) NOT NULL DEFAULT '',
  `value` text,
  PRIMARY KEY (`name`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `report_config`
--

LOCK TABLES `report_config` WRITE;
/*!40000 ALTER TABLE `report_config` DISABLE KEYS */;
INSERT INTO `report_config` VALUES ('logo','logo_example.jpg'),('logo-right','logo_right.jpg'),('report-header','\r\n			\r\n			\r\n			\r\n			\r\n			\r\n			\r\n			\r\n			\r\n			\r\n			\r\n			\r\n			\r\n			\r\n			\r\n			\r\n			\r\n			\r\n			\r\n			\r\n			<div><div style=\"text-align: center;\"><br></div></div><div style=\"text-align: center;\"><br></div>\r\n\r\n																																								');
/*!40000 ALTER TABLE `report_config` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `response_result_dbs`
--

DROP TABLE IF EXISTS `response_result_dbs`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `response_result_dbs` (
  `shipment_map_id` int(11) NOT NULL,
  `sample_id` int(11) NOT NULL,
  `eia_1` int(11) DEFAULT NULL,
  `lot_no_1` varchar(45) DEFAULT NULL,
  `exp_date_1` date DEFAULT NULL,
  `od_1` varchar(45) DEFAULT NULL,
  `cutoff_1` varchar(45) DEFAULT NULL,
  `eia_2` int(11) DEFAULT NULL,
  `lot_no_2` varchar(45) DEFAULT NULL,
  `exp_date_2` date DEFAULT NULL,
  `od_2` varchar(45) DEFAULT NULL,
  `cutoff_2` varchar(45) DEFAULT NULL,
  `eia_3` int(11) DEFAULT NULL,
  `lot_no_3` varchar(45) DEFAULT NULL,
  `exp_date_3` date DEFAULT NULL,
  `od_3` varchar(45) DEFAULT NULL,
  `cutoff_3` varchar(45) DEFAULT NULL,
  `wb` int(11) DEFAULT NULL,
  `wb_lot` varchar(45) DEFAULT NULL,
  `wb_exp_date` date DEFAULT NULL,
  `wb_160` varchar(45) DEFAULT NULL,
  `wb_120` varchar(45) DEFAULT NULL,
  `wb_66` varchar(45) DEFAULT NULL,
  `wb_55` varchar(45) DEFAULT NULL,
  `wb_51` varchar(45) DEFAULT NULL,
  `wb_41` varchar(45) DEFAULT NULL,
  `wb_31` varchar(45) DEFAULT NULL,
  `wb_24` varchar(45) DEFAULT NULL,
  `wb_17` varchar(45) DEFAULT NULL,
  `reported_result` int(11) DEFAULT NULL,
  `calculated_score` varchar(45) DEFAULT NULL,
  `created_by` varchar(45) DEFAULT NULL,
  `created_on` datetime DEFAULT NULL,
  `updated_by` varchar(45) DEFAULT NULL,
  `updated_on` datetime DEFAULT NULL,
  PRIMARY KEY (`shipment_map_id`,`sample_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `response_result_dbs`
--

LOCK TABLES `response_result_dbs` WRITE;
/*!40000 ALTER TABLE `response_result_dbs` DISABLE KEYS */;
/*!40000 ALTER TABLE `response_result_dbs` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `response_result_dts`
--

DROP TABLE IF EXISTS `response_result_dts`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `response_result_dts` (
  `shipment_map_id` int(11) NOT NULL,
  `sample_id` int(11) NOT NULL,
  `test_kit_name_1` varchar(45) DEFAULT NULL,
  `lot_no_1` varchar(45) DEFAULT NULL,
  `exp_date_1` date DEFAULT NULL,
  `test_result_1` varchar(45) DEFAULT NULL,
  `test_kit_name_2` varchar(45) DEFAULT NULL,
  `lot_no_2` varchar(45) DEFAULT NULL,
  `exp_date_2` date DEFAULT NULL,
  `test_result_2` varchar(45) DEFAULT NULL,
  `test_kit_name_3` varchar(45) DEFAULT NULL,
  `lot_no_3` varchar(45) DEFAULT NULL,
  `exp_date_3` date DEFAULT NULL,
  `test_result_3` varchar(45) DEFAULT NULL,
  `reported_result` varchar(45) DEFAULT NULL,
  `calculated_score` varchar(45) DEFAULT NULL,
  `created_by` varchar(45) DEFAULT NULL,
  `created_on` datetime DEFAULT NULL,
  `updated_by` varchar(45) DEFAULT NULL,
  `updated_on` datetime DEFAULT NULL,
  PRIMARY KEY (`shipment_map_id`,`sample_id`),
  CONSTRAINT `response_result_dts_ibfk_1` FOREIGN KEY (`shipment_map_id`) REFERENCES `shipment_participant_map` (`map_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `response_result_dts`
--

LOCK TABLES `response_result_dts` WRITE;
/*!40000 ALTER TABLE `response_result_dts` DISABLE KEYS */;
/*!40000 ALTER TABLE `response_result_dts` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `response_result_eid`
--

DROP TABLE IF EXISTS `response_result_eid`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `response_result_eid` (
  `shipment_map_id` int(11) NOT NULL,
  `sample_id` varchar(45) NOT NULL,
  `reported_result` varchar(45) DEFAULT NULL,
  `hiv_ct_od` varchar(45) DEFAULT NULL,
  `ic_qs` varchar(45) DEFAULT NULL,
  `calculated_score` varchar(45) DEFAULT NULL,
  `created_by` varchar(45) DEFAULT NULL,
  `created_on` datetime DEFAULT NULL,
  `updated_by` varchar(45) DEFAULT NULL,
  `updated_on` datetime DEFAULT NULL,
  PRIMARY KEY (`shipment_map_id`,`sample_id`),
  CONSTRAINT `response_result_eid_ibfk_1` FOREIGN KEY (`shipment_map_id`) REFERENCES `shipment_participant_map` (`map_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `response_result_eid`
--

LOCK TABLES `response_result_eid` WRITE;
/*!40000 ALTER TABLE `response_result_eid` DISABLE KEYS */;
/*!40000 ALTER TABLE `response_result_eid` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `response_result_tb`
--

DROP TABLE IF EXISTS `response_result_tb`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `response_result_tb` (
  `shipment_map_id` int(11) NOT NULL,
  `sample_id` varchar(45) NOT NULL,
  `date_tested` date DEFAULT NULL,
  `mtb_detected` varchar(255) DEFAULT NULL,
  `rif_resistance` varchar(255) DEFAULT NULL,
  `probe_d` varchar(255) DEFAULT NULL,
  `probe_c` varchar(255) DEFAULT NULL,
  `probe_e` varchar(255) DEFAULT NULL,
  `probe_b` varchar(255) DEFAULT NULL,
  `spc` varchar(255) DEFAULT NULL,
  `probe_a` varchar(255) DEFAULT NULL,
  `calculated_score` varchar(45) DEFAULT NULL,
  `created_by` varchar(45) DEFAULT NULL,
  `created_on` datetime DEFAULT NULL,
  `updated_by` varchar(45) DEFAULT NULL,
  `updated_on` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `response_result_tb`
--

LOCK TABLES `response_result_tb` WRITE;
/*!40000 ALTER TABLE `response_result_tb` DISABLE KEYS */;
/*!40000 ALTER TABLE `response_result_tb` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `response_result_vl`
--

DROP TABLE IF EXISTS `response_result_vl`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `response_result_vl` (
  `shipment_map_id` int(11) NOT NULL,
  `sample_id` varchar(45) NOT NULL,
  `reported_viral_load` varchar(255) DEFAULT NULL,
  `calculated_score` varchar(45) DEFAULT NULL,
  `is_tnd` varchar(45) DEFAULT NULL,
  `created_by` varchar(45) DEFAULT NULL,
  `created_on` datetime DEFAULT NULL,
  `updated_by` varchar(45) DEFAULT NULL,
  `updated_on` datetime DEFAULT NULL,
  PRIMARY KEY (`shipment_map_id`,`sample_id`),
  CONSTRAINT `response_result_vl_ibfk_1` FOREIGN KEY (`shipment_map_id`) REFERENCES `shipment_participant_map` (`map_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `response_result_vl`
--

LOCK TABLES `response_result_vl` WRITE;
/*!40000 ALTER TABLE `response_result_vl` DISABLE KEYS */;
INSERT INTO `response_result_vl` VALUES (1,'1','3','fail',NULL,'1','2017-02-01 10:48:03','eptmanager@gmail.com','2017-03-20 08:56:32'),(1,'2','4','fail',NULL,'1','2017-02-01 10:48:03','eptmanager@gmail.com','2017-03-20 08:56:32'),(1,'3','5','fail',NULL,'1','2017-02-01 10:48:03','eptmanager@gmail.com','2017-03-20 08:56:32'),(2,'1','1','pass',NULL,'1','2017-03-19 23:10:40','eptmanager@gmail.com','2017-03-20 08:57:49'),(2,'2','1','pass',NULL,'1','2017-03-19 23:10:40','eptmanager@gmail.com','2017-03-20 08:57:49'),(2,'3','1','pass',NULL,'1','2017-03-19 23:10:41','eptmanager@gmail.com','2017-03-20 08:57:49');
/*!40000 ALTER TABLE `response_result_vl` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `response_vl_not_tested_reason`
--

DROP TABLE IF EXISTS `response_vl_not_tested_reason`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `response_vl_not_tested_reason` (
  `vl_not_tested_reason_id` int(11) NOT NULL AUTO_INCREMENT,
  `vl_not_tested_reason` varchar(500) DEFAULT NULL,
  `status` varchar(45) NOT NULL DEFAULT 'active',
  PRIMARY KEY (`vl_not_tested_reason_id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `response_vl_not_tested_reason`
--

LOCK TABLES `response_vl_not_tested_reason` WRITE;
/*!40000 ALTER TABLE `response_vl_not_tested_reason` DISABLE KEYS */;
INSERT INTO `response_vl_not_tested_reason` VALUES (1,'Issue with Sample','active'),(2,'Viral Load Machine not working','active'),(3,'Other','active');
/*!40000 ALTER TABLE `response_vl_not_tested_reason` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `scheme_list`
--

DROP TABLE IF EXISTS `scheme_list`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `scheme_list` (
  `scheme_id` varchar(10) NOT NULL,
  `scheme_name` varchar(255) NOT NULL,
  `response_table` varchar(45) DEFAULT NULL,
  `reference_result_table` varchar(45) DEFAULT NULL,
  `attribute_list` varchar(255) DEFAULT NULL,
  `status` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`scheme_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `scheme_list`
--

LOCK TABLES `scheme_list` WRITE;
/*!40000 ALTER TABLE `scheme_list` DISABLE KEYS */;
INSERT INTO `scheme_list` VALUES ('dbs','Dried Blood Spot - HIV Serology','response_result_dbs','reference_result_dbs',NULL,'Inactive'),('dts','Dried Tube Specimen - HIV Serology','response_result_dts','reference_result_dts',NULL,'Inactive'),('eid','Dried Blood Spot - Early Infant Diagnosis','response_result_eid','reference_result_eid',NULL,'active'),('tb','Dried Tube Specimen - Tuberculosis','response_result_tb','reference_result_tb',NULL,'Inactive'),('vl','Dried Tube Specimen - HIV Viral Load','response_result_vl','reference_result_vl',NULL,'active');
/*!40000 ALTER TABLE `scheme_list` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `shipment`
--

DROP TABLE IF EXISTS `shipment`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `shipment` (
  `shipment_id` int(11) NOT NULL AUTO_INCREMENT,
  `shipment_code` varchar(255) NOT NULL,
  `scheme_type` varchar(10) DEFAULT NULL,
  `shipment_date` date DEFAULT NULL,
  `lastdate_response` date DEFAULT NULL,
  `distribution_id` int(11) NOT NULL,
  `number_of_samples` int(11) DEFAULT NULL,
  `number_of_controls` int(11) NOT NULL,
  `response_switch` varchar(255) NOT NULL DEFAULT 'off',
  `max_score` int(11) DEFAULT NULL,
  `average_score` varchar(255) DEFAULT '0',
  `shipment_comment` text,
  `created_by_admin` varchar(255) DEFAULT NULL,
  `created_on_admin` datetime DEFAULT NULL,
  `updated_by_admin` varchar(255) DEFAULT NULL,
  `updated_on_admin` datetime DEFAULT NULL,
  `status` varchar(255) NOT NULL DEFAULT 'pending',
  PRIMARY KEY (`shipment_id`),
  KEY `scheme_type` (`scheme_type`),
  KEY `distribution_id` (`distribution_id`),
  CONSTRAINT `shipment_ibfk_1` FOREIGN KEY (`scheme_type`) REFERENCES `scheme_list` (`scheme_id`),
  CONSTRAINT `shipment_ibfk_2` FOREIGN KEY (`distribution_id`) REFERENCES `distributions` (`distribution_id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `shipment`
--

LOCK TABLES `shipment` WRITE;
/*!40000 ALTER TABLE `shipment` DISABLE KEYS */;
INSERT INTO `shipment` VALUES (1,'VL0217-1','vl','2017-02-15','2017-02-28',1,0,3,'on',3,'0',NULL,'eptmanager@gmail.com','2017-02-01 10:25:31',NULL,NULL,'evaluated'),(2,'VL0317-1','vl','2017-04-01','2017-04-30',2,3,0,'on',3,'0',NULL,'eptmanager@gmail.com','2017-03-19 20:35:07','eptmanager@gmail.com','2017-03-20 12:52:14','finalized'),(3,'VL0317-2','vl','2017-03-16','2017-03-31',3,4,0,'on',NULL,'0',NULL,'eptmanager@gmail.com','2017-03-27 22:03:20',NULL,NULL,'shipped');
/*!40000 ALTER TABLE `shipment` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `shipment_participant_map`
--

DROP TABLE IF EXISTS `shipment_participant_map`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `shipment_participant_map` (
  `map_id` int(11) NOT NULL AUTO_INCREMENT,
  `shipment_id` int(11) NOT NULL,
  `participant_id` int(11) NOT NULL,
  `attributes` mediumtext,
  `evaluation_status` varchar(10) DEFAULT NULL COMMENT 'Shipment Status					\nUse this to flag - 					\nABCDEFG					',
  `shipment_score` decimal(5,2) DEFAULT NULL,
  `documentation_score` decimal(5,2) DEFAULT '0.00',
  `shipment_test_date` date DEFAULT '0000-00-00',
  `is_pt_test_not_performed` varchar(45) DEFAULT NULL,
  `vl_not_tested_reason` int(11) DEFAULT NULL,
  `pt_test_not_performed_comments` text,
  `pt_support_comments` text,
  `shipment_receipt_date` date DEFAULT NULL,
  `shipment_test_report_date` datetime DEFAULT NULL,
  `participant_supervisor` varchar(255) DEFAULT NULL,
  `supervisor_approval` varchar(45) DEFAULT NULL,
  `review_date` date DEFAULT NULL,
  `final_result` int(11) DEFAULT '0',
  `failure_reason` text,
  `evaluation_comment` int(11) DEFAULT '0',
  `optional_eval_comment` text,
  `is_followup` varchar(255) DEFAULT 'no',
  `is_excluded` varchar(255) NOT NULL DEFAULT 'no',
  `user_comment` varchar(90) DEFAULT NULL,
  `custom_field_1` text,
  `custom_field_2` text,
  `created_on_admin` datetime DEFAULT NULL,
  `updated_on_admin` datetime DEFAULT NULL,
  `updated_by_admin` varchar(45) DEFAULT NULL,
  `updated_on_user` datetime DEFAULT NULL,
  `updated_by_user` varchar(45) DEFAULT NULL,
  `created_by_admin` varchar(45) DEFAULT NULL,
  `created_on_user` datetime DEFAULT NULL,
  `report_generated` varchar(100) DEFAULT NULL,
  `last_new_shipment_mailed_on` datetime DEFAULT NULL,
  `new_shipment_mail_count` int(11) NOT NULL DEFAULT '0',
  `last_not_participated_mailed_on` datetime DEFAULT NULL,
  `last_not_participated_mail_count` int(11) NOT NULL DEFAULT '0',
  `qc_done` varchar(45) NOT NULL DEFAULT 'no',
  `qc_date` date DEFAULT NULL,
  `qc_done_by` varchar(255) DEFAULT NULL,
  `qc_created_on` datetime DEFAULT NULL,
  `mode_id` int(11) DEFAULT NULL,
  PRIMARY KEY (`map_id`),
  UNIQUE KEY `shipment_id_2` (`shipment_id`,`participant_id`),
  KEY `shipment_id` (`shipment_id`),
  KEY `participant_id` (`participant_id`),
  CONSTRAINT `shipment_participant_map_ibfk_1` FOREIGN KEY (`shipment_id`) REFERENCES `shipment` (`shipment_id`),
  CONSTRAINT `shipment_participant_map_ibfk_2` FOREIGN KEY (`participant_id`) REFERENCES `participant` (`participant_id`)
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=latin1 COMMENT='Shipment for DTS Samples';
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `shipment_participant_map`
--

LOCK TABLES `shipment_participant_map` WRITE;
/*!40000 ALTER TABLE `shipment_participant_map` DISABLE KEYS */;
INSERT INTO `shipment_participant_map` VALUES (1,1,1,'{\"sample_rehydration_date\":\"2017-02-16\",\"vl_assay\":\"1\",\"assay_lot_number\":\"4\",\"assay_expiration_date\":\"2017-02-18\",\"specimen_volume\":\"15\"}','19111190',0.00,0.00,'2017-02-16',NULL,NULL,NULL,NULL,'2017-02-15','2017-02-01 00:00:00','brian','yes',NULL,4,'[{\"warning\":\"Sample <strong>A<\\/strong> was reported wrongly\"},{\"warning\":\"Sample <strong>B<\\/strong> was reported wrongly\"},{\"warning\":\"Sample <strong>C<\\/strong> was reported wrongly\"},{\"warning\":\"Could not determine score. Not enough responses found in the chosen VL Assay.\"}]',0,'','no','no','',NULL,NULL,'2017-02-01 10:26:06','2017-03-20 08:56:32','eptmanager@gmail.com','2017-02-01 10:50:44','1','1','2017-02-01 10:48:03','yes',NULL,0,NULL,0,'yes','2017-02-16','brian','2017-02-01 10:50:44',1),(2,2,1,'{\"sample_rehydration_date\":\"2017-04-04\",\"vl_assay\":\"1\",\"assay_lot_number\":\"2\",\"assay_expiration_date\":\"2017-04-30\",\"specimen_volume\":\"2\"}','19111190',100.00,0.00,'2017-03-09',NULL,NULL,NULL,NULL,'2017-04-05','2017-03-19 00:00:00','','',NULL,1,'[]',0,'','no','no','',NULL,NULL,'2017-03-19 23:05:22','2017-03-20 08:57:49','eptmanager@gmail.com','2017-03-19 23:15:40','1','1','2017-03-19 23:10:40','yes',NULL,0,NULL,0,'',NULL,NULL,NULL,1),(3,2,8,NULL,'19901190',NULL,0.00,'0000-00-00',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,0,NULL,0,NULL,'no','no',NULL,NULL,NULL,'2017-03-19 23:05:22',NULL,NULL,NULL,NULL,'1',NULL,NULL,NULL,0,NULL,0,'no',NULL,NULL,NULL,NULL),(4,2,9,NULL,'19901190',NULL,0.00,'0000-00-00',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,0,NULL,0,NULL,'no','no',NULL,NULL,NULL,'2017-03-19 23:05:22',NULL,NULL,NULL,NULL,'1',NULL,NULL,NULL,0,NULL,0,'no',NULL,NULL,NULL,NULL),(5,3,1,NULL,'19901190',NULL,0.00,'0000-00-00',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,0,NULL,0,NULL,'no','no',NULL,NULL,NULL,'2017-03-27 22:09:05',NULL,NULL,NULL,NULL,'1',NULL,NULL,NULL,0,NULL,0,'no',NULL,NULL,NULL,NULL),(6,3,8,NULL,'19901190',NULL,0.00,'0000-00-00',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,0,NULL,0,NULL,'no','no',NULL,NULL,NULL,'2017-03-27 22:09:05',NULL,NULL,NULL,NULL,'1',NULL,NULL,NULL,0,NULL,0,'no',NULL,NULL,NULL,NULL),(7,3,9,NULL,'19901190',NULL,0.00,'0000-00-00',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,0,NULL,0,NULL,'no','no',NULL,NULL,NULL,'2017-03-27 22:09:05',NULL,NULL,NULL,NULL,'1',NULL,NULL,NULL,0,NULL,0,'no',NULL,NULL,NULL,NULL),(8,3,2,NULL,'19901190',NULL,0.00,'0000-00-00',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,0,NULL,0,NULL,'no','no',NULL,NULL,NULL,'2017-03-27 22:09:05',NULL,NULL,NULL,NULL,'1',NULL,NULL,NULL,0,NULL,0,'no',NULL,NULL,NULL,NULL);
/*!40000 ALTER TABLE `shipment_participant_map` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `system_admin`
--

DROP TABLE IF EXISTS `system_admin`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `system_admin` (
  `admin_id` int(11) NOT NULL AUTO_INCREMENT,
  `first_name` varchar(255) DEFAULT NULL,
  `last_name` varchar(255) DEFAULT NULL,
  `primary_email` varchar(255) DEFAULT NULL,
  `password` varchar(255) DEFAULT NULL,
  `secondary_email` varchar(255) DEFAULT NULL,
  `phone` varchar(255) DEFAULT NULL,
  `force_password_reset` int(11) DEFAULT NULL,
  `status` varchar(255) DEFAULT 'inactive',
  `created_on` datetime DEFAULT NULL,
  `created_by` varchar(255) DEFAULT NULL,
  `updated_on` datetime DEFAULT NULL,
  `updated_by` varchar(255) DEFAULT NULL,
  `IsVl` int(11) DEFAULT NULL,
  `IsProvider` varchar(11) DEFAULT '0',
  `ProviderName` varchar(100) NOT NULL,
  `AssignModule` int(11) DEFAULT '0',
  PRIMARY KEY (`admin_id`)
) ENGINE=InnoDB AUTO_INCREMENT=12 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `system_admin`
--

LOCK TABLES `system_admin` WRITE;
/*!40000 ALTER TABLE `system_admin` DISABLE KEYS */;
INSERT INTO `system_admin` VALUES (1,'Manager','Test','eptmanager@gmail.com','123','','9841462565',1,'active',NULL,NULL,'2015-03-04 10:56:43','1',3,'0','',0),(2,'Ruth','Mumo','rmumo@gmail.com','boblacaster1988@','','0727547388',1,'active','2017-04-01 10:27:00','1','2017-04-01 10:41:24','1',1,'3','',0),(3,'John','Kinyanjui','micro@gmail.com','boblacaster1988@','','0727547388',1,'active','2017-04-03 10:32:04','1',NULL,NULL,2,'3','',0),(4,'Valentine','Madirani','vmadirani@gmail.com','boblacaster1988@','','0727547388',1,'active','2017-04-03 10:44:17','2',NULL,NULL,1,NULL,'',0),(9,'Nelson','Akenga','nelson@gmail.com','boblacaster1988@','','0727547388',1,'active','2017-04-03 12:05:12','1',NULL,NULL,2,NULL,'',0),(10,'Victor Mwendwa','Victor Mwendwa','vmwesh@gmail.com','boblacaster1988@','vmwesh@gmail.com','0722339993',0,'active','2017-04-03 14:52:06','9',NULL,NULL,2,'1','Amref Provider',0),(11,'TEST 001','TEST AGAIN','osoromichael@gmail.com','Michael@23','','07115603619',1,'active','2017-04-03 23:42:13','1',NULL,NULL,3,'1','',0);
/*!40000 ALTER TABLE `system_admin` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tbl_bac_bacteria`
--

DROP TABLE IF EXISTS `tbl_bac_bacteria`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `tbl_bac_bacteria` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `organismName` varchar(100) DEFAULT NULL,
  `organismCode` varchar(100) DEFAULT NULL,
  `conceptCode` varchar(100) DEFAULT NULL,
  `fullName` varchar(100) DEFAULT NULL,
  `dateCreated` datetime DEFAULT CURRENT_TIMESTAMP,
  `createdBy` varchar(100) DEFAULT '1',
  `lastUpdatePerson` int(11) DEFAULT '1',
  `updateDate` datetime DEFAULT NULL,
  `status` int(11) DEFAULT '1',
  PRIMARY KEY (`id`),
  KEY `fullname` (`fullName`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tbl_bac_bacteria`
--

LOCK TABLES `tbl_bac_bacteria` WRITE;
/*!40000 ALTER TABLE `tbl_bac_bacteria` DISABLE KEYS */;
/*!40000 ALTER TABLE `tbl_bac_bacteria` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tbl_bac_bacteria_csv`
--

DROP TABLE IF EXISTS `tbl_bac_bacteria_csv`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `tbl_bac_bacteria_csv` (
  `Organism Name` text,
  `NHSN Organism Code` text,
  `SNOMED Concept Code` int(11) DEFAULT NULL,
  `SNOMED Fully Specified Name` text
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tbl_bac_bacteria_csv`
--

LOCK TABLES `tbl_bac_bacteria_csv` WRITE;
/*!40000 ALTER TABLE `tbl_bac_bacteria_csv` DISABLE KEYS */;
/*!40000 ALTER TABLE `tbl_bac_bacteria_csv` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tbl_bac_couriers`
--

DROP TABLE IF EXISTS `tbl_bac_couriers`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `tbl_bac_couriers` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `courierName` varchar(45) DEFAULT NULL,
  `address` varchar(45) DEFAULT NULL,
  `mobile` varchar(45) DEFAULT NULL,
  `email` varchar(45) DEFAULT NULL,
  `tel` varchar(45) DEFAULT NULL,
  `physicalAddress` varchar(45) DEFAULT NULL,
  `status` varchar(45) DEFAULT '1',
  `dateCreated` datetime DEFAULT CURRENT_TIMESTAMP,
  `createdBy` varchar(45) DEFAULT NULL,
  `lastUpdatePerson` varchar(45) DEFAULT NULL,
  `dateUpdate` datetime DEFAULT NULL,
  `tbl_bac_courierscol` varchar(45) DEFAULT NULL,
  `contactPerson` varchar(45) DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `courierName_UNIQUE` (`courierName`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tbl_bac_couriers`
--

LOCK TABLES `tbl_bac_couriers` WRITE;
/*!40000 ALTER TABLE `tbl_bac_couriers` DISABLE KEYS */;
/*!40000 ALTER TABLE `tbl_bac_couriers` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tbl_bac_expected_micro_bacterial_agents`
--

DROP TABLE IF EXISTS `tbl_bac_expected_micro_bacterial_agents`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `tbl_bac_expected_micro_bacterial_agents` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `sampleId` varchar(45) DEFAULT NULL,
  `antiMicroAgent` varchar(45) DEFAULT NULL,
  `reportedToStatus` varchar(45) DEFAULT NULL,
  `diskContent` int(11) DEFAULT NULL,
  `status` int(11) DEFAULT '1',
  `createdBy` int(11) DEFAULT NULL,
  `dateCreated` datetime DEFAULT NULL,
  `lastUpdatePerson` int(11) DEFAULT NULL,
  `updateDate` datetime DEFAULT NULL,
  `finalScore` varchar(45) DEFAULT NULL,
  `roundId` varchar(45) DEFAULT NULL,
  `agentScore` decimal(10,0) DEFAULT '0',
  PRIMARY KEY (`id`),
  UNIQUE KEY `SAMPLE_ANTI_UK` (`sampleId`,`antiMicroAgent`)
) ENGINE=InnoDB AUTO_INCREMENT=23 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tbl_bac_expected_micro_bacterial_agents`
--

LOCK TABLES `tbl_bac_expected_micro_bacterial_agents` WRITE;
/*!40000 ALTER TABLE `tbl_bac_expected_micro_bacterial_agents` DISABLE KEYS */;
INSERT INTO `tbl_bac_expected_micro_bacterial_agents` VALUES (7,'3','amikacin','yes',10,1,1,NULL,NULL,NULL,'I',NULL,4),(11,'3','ampicilin','yes',10,1,1,NULL,NULL,NULL,'I',NULL,4),(16,'1','amikacin','yes',15,1,1,NULL,NULL,NULL,'I',NULL,4),(17,'1','colistin','yes',22,1,1,NULL,NULL,NULL,'I',NULL,4),(18,'1','cloxacilin','yes',25,1,1,NULL,NULL,NULL,'I',NULL,4),(19,'1','ampicilin','yes',555,1,1,NULL,NULL,NULL,'I',NULL,4),(20,'2','amikacin','yes',12,1,1,NULL,NULL,NULL,'I',NULL,10),(21,'2','ampicilin','yes',12,1,1,NULL,NULL,NULL,'I',NULL,10),(22,'2','colistin','yes',12,1,1,NULL,NULL,NULL,'I',NULL,10);
/*!40000 ALTER TABLE `tbl_bac_expected_micro_bacterial_agents` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tbl_bac_expected_results`
--

DROP TABLE IF EXISTS `tbl_bac_expected_results`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `tbl_bac_expected_results` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `sampleId` varchar(45) DEFAULT NULL,
  `roundId` varchar(45) DEFAULT NULL,
  `dateCreated` datetime DEFAULT CURRENT_TIMESTAMP,
  `createdBy` int(11) DEFAULT NULL,
  `lastUpdatePerson` int(11) DEFAULT NULL,
  `updateDate` datetime DEFAULT NULL,
  `grainStainReaction` varchar(105) DEFAULT NULL,
  `grainStainReactionScore` int(11) DEFAULT NULL,
  `primaryMedia` varchar(105) DEFAULT NULL,
  `primaryMediaScore` int(11) DEFAULT NULL,
  `incubationConditions` varchar(105) DEFAULT NULL,
  `incubationConditionsScore` int(11) DEFAULT NULL,
  `colonialMorphology` varchar(45) DEFAULT NULL,
  `colonialMorphologyScore` int(11) DEFAULT NULL,
  `bacterialQualification` varchar(105) DEFAULT NULL,
  `bacterialQualificationScore` int(11) DEFAULT NULL,
  `bacterialReagents` varchar(105) DEFAULT NULL,
  `bacterialReagentsScore` int(11) DEFAULT NULL,
  `isolateProcessing` varchar(105) DEFAULT NULL,
  `isolateProcessingScore` int(11) DEFAULT NULL,
  `finalIdentification` varchar(105) DEFAULT NULL,
  `finalIdentificationScore` int(11) DEFAULT NULL,
  `status` varchar(45) DEFAULT '1',
  PRIMARY KEY (`id`),
  UNIQUE KEY `sampleId_UNIQUE` (`sampleId`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tbl_bac_expected_results`
--

LOCK TABLES `tbl_bac_expected_results` WRITE;
/*!40000 ALTER TABLE `tbl_bac_expected_results` DISABLE KEYS */;
INSERT INTO `tbl_bac_expected_results` VALUES (1,'1','','2017-03-15 14:59:19',1,1,'0000-00-00 00:00:00','Abiotrophia adiacens',4,'slide',1,'27',1,'grey',1,'Acanthamoeba',1,'amoxicilin',1,'serotypomg',1,'Abiotrophia adiacens',4,'1'),(2,'2','','2017-03-15 15:02:30',1,1,'0000-00-00 00:00:00','Achromobacter ruhlandii',4,'slide',2,'30',2,'30',2,'Achromobacter',2,'amikacilin',2,'serotyping',2,'Achromobacter ruhlandii',4,'1');
/*!40000 ALTER TABLE `tbl_bac_expected_results` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tbl_bac_grades`
--

DROP TABLE IF EXISTS `tbl_bac_grades`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `tbl_bac_grades` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `grade` varchar(45) DEFAULT NULL,
  `lowerMark` int(11) DEFAULT NULL,
  `upperMark` int(11) DEFAULT NULL,
  `remarks` varchar(45) DEFAULT NULL,
  `createdBy` int(11) DEFAULT NULL,
  `dateCreated` datetime DEFAULT CURRENT_TIMESTAMP,
  `lastUpdatePerson` varchar(45) DEFAULT NULL,
  `updateDate` datetime DEFAULT NULL,
  `status` varchar(45) DEFAULT '1',
  PRIMARY KEY (`id`),
  UNIQUE KEY `G_UK` (`grade`),
  UNIQUE KEY `L_UK` (`lowerMark`),
  UNIQUE KEY `U_UK` (`upperMark`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tbl_bac_grades`
--

LOCK TABLES `tbl_bac_grades` WRITE;
/*!40000 ALTER TABLE `tbl_bac_grades` DISABLE KEYS */;
INSERT INTO `tbl_bac_grades` VALUES (3,'UNACCEPTABLE',0,74,'UNACCEPTABLE',1,'2017-03-15 15:12:01','1','0000-00-00 00:00:00','1'),(6,'ACCEPTABLE',75,100,'ACCEPTABLE',1,'2017-03-20 12:21:24',NULL,NULL,'1');
/*!40000 ALTER TABLE `tbl_bac_grades` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tbl_bac_micro_bacterial_agents`
--

DROP TABLE IF EXISTS `tbl_bac_micro_bacterial_agents`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `tbl_bac_micro_bacterial_agents` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `antiMicroAgent` varchar(105) DEFAULT NULL,
  `reportedToStatus` varchar(45) DEFAULT NULL,
  `diskContent` int(11) DEFAULT NULL,
  `userId` int(11) DEFAULT NULL,
  `sampleId` int(11) DEFAULT NULL,
  `roundId` int(11) DEFAULT NULL,
  `participantId` int(11) DEFAULT NULL,
  `panelToSampleId` int(11) DEFAULT NULL,
  `status` varchar(45) DEFAULT '1',
  `dateCreated` datetime DEFAULT CURRENT_TIMESTAMP,
  `lastUpdatePerson` varchar(45) DEFAULT NULL,
  `updateDate` datetime DEFAULT NULL,
  `level` varchar(45) DEFAULT NULL,
  `createdBy` int(11) DEFAULT NULL,
  `score` decimal(4,2) DEFAULT '0.00',
  `markedStatus` varchar(45) DEFAULT '0',
  `published` varchar(45) DEFAULT '0',
  `adminMarked` varchar(45) DEFAULT '0',
  `finalScore` varchar(45) DEFAULT '0',
  PRIMARY KEY (`id`),
  UNIQUE KEY `name_sample_round_lab` (`roundId`,`sampleId`,`antiMicroAgent`,`participantId`)
) ENGINE=InnoDB AUTO_INCREMENT=46 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tbl_bac_micro_bacterial_agents`
--

LOCK TABLES `tbl_bac_micro_bacterial_agents` WRITE;
/*!40000 ALTER TABLE `tbl_bac_micro_bacterial_agents` DISABLE KEYS */;
INSERT INTO `tbl_bac_micro_bacterial_agents` VALUES (41,'ampicilin','yes',11,1,2,1,1,4,'1','2017-03-30 16:52:11','1',NULL,'1',1,0.00,'0','1','0','R'),(42,'ampicilin','yes',88,1,1,1,1,3,'1','2017-04-03 09:42:19','1',NULL,'1',1,0.00,'0','1','0','S'),(43,'colistin','yes',28,1,1,1,1,3,'1','2017-04-03 09:42:19','1',NULL,'1',1,0.00,'0','1','0','R'),(44,'cloxacilin','yes',28,1,1,1,1,3,'1','2017-04-03 09:42:19','1',NULL,'1',1,0.00,'0','1','0','R'),(45,'amikacin','yes',128,1,1,1,1,3,'1','2017-04-03 09:42:19','1',NULL,'1',1,0.00,'0','1','0','I');
/*!40000 ALTER TABLE `tbl_bac_micro_bacterial_agents` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tbl_bac_panel_mst`
--

DROP TABLE IF EXISTS `tbl_bac_panel_mst`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `tbl_bac_panel_mst` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `panelName` varchar(45) NOT NULL,
  `panelType` varchar(45) DEFAULT NULL,
  `dateDelivered` date DEFAULT NULL,
  `panelLabel` varchar(45) DEFAULT NULL,
  `panelDateOfDelivery` date DEFAULT NULL,
  `panelDatePrepared` date DEFAULT NULL,
  `status` varchar(45) DEFAULT '1',
  `dateCreated` datetime DEFAULT CURRENT_TIMESTAMP,
  `totalSamples` int(11) DEFAULT '0',
  `numberOfSamples` int(11) DEFAULT NULL,
  `preparedBy` varchar(45) DEFAULT NULL,
  `panelStatus` varchar(45) DEFAULT '0',
  `shipmentNumber` int(11) DEFAULT NULL,
  `quantity` int(11) DEFAULT NULL,
  `receivedBy` varchar(45) DEFAULT NULL,
  `participantId` int(11) DEFAULT NULL,
  `barcode` varchar(20) DEFAULT NULL,
  `lastUpdatePerson` int(11) DEFAULT NULL,
  `dateUpdate` datetime DEFAULT CURRENT_TIMESTAMP,
  `createdBy` int(11) DEFAULT NULL,
  `totalSamplesAdded` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`,`panelName`),
  UNIQUE KEY `uk_panel_name` (`panelName`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1 COMMENT='Host panels names without the samples attached to them';
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tbl_bac_panel_mst`
--

LOCK TABLES `tbl_bac_panel_mst` WRITE;
/*!40000 ALTER TABLE `tbl_bac_panel_mst` DISABLE KEYS */;
INSERT INTO `tbl_bac_panel_mst` VALUES (1,'PANEL/A/17','WET','2017-02-25','PANEL/A/17','2017-03-15','2017-03-15','1','2017-03-15 15:13:01',0,10,NULL,'4',0,NULL,NULL,NULL,'9137505279285476',1,'2017-03-15 15:13:01',1,NULL);
/*!40000 ALTER TABLE `tbl_bac_panel_mst` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tbl_bac_panels_shipments`
--

DROP TABLE IF EXISTS `tbl_bac_panels_shipments`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `tbl_bac_panels_shipments` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `panelId` int(11) DEFAULT NULL,
  `shipmentId` int(11) DEFAULT NULL,
  `datecreated` datetime DEFAULT CURRENT_TIMESTAMP,
  `createdBy` varchar(45) DEFAULT NULL,
  `deliveryStatus` varchar(45) DEFAULT '0',
  `status` varchar(45) DEFAULT '1',
  `lastUpdatePerson` int(11) DEFAULT NULL,
  `dateUpdate` datetime DEFAULT CURRENT_TIMESTAMP,
  `conditionStatus` varchar(45) DEFAULT NULL,
  `comments` varchar(105) DEFAULT NULL,
  `quantity` int(11) DEFAULT NULL,
  `dateDelivered` datetime DEFAULT NULL,
  `storageMeans` varchar(105) DEFAULT NULL,
  `panelsReceived` int(11) DEFAULT NULL,
  `tempOfSamples` varchar(45) DEFAULT NULL,
  `receivedBy` varchar(45) DEFAULT NULL,
  `participantId` varchar(45) DEFAULT NULL,
  `receiveComment` varchar(200) DEFAULT NULL,
  `roundId` int(11) DEFAULT NULL,
  `startRoundFlag` varchar(45) DEFAULT '0',
  PRIMARY KEY (`id`),
  UNIQUE KEY `uk_ship_panel_lab` (`panelId`,`shipmentId`,`participantId`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tbl_bac_panels_shipments`
--

LOCK TABLES `tbl_bac_panels_shipments` WRITE;
/*!40000 ALTER TABLE `tbl_bac_panels_shipments` DISABLE KEYS */;
INSERT INTO `tbl_bac_panels_shipments` VALUES (1,1,1,'2017-03-15 15:34:00','1','3','1',NULL,'2017-03-15 15:34:00',NULL,NULL,1,'2017-03-17 15:49:34',NULL,NULL,NULL,NULL,NULL,NULL,NULL,'0'),(2,1,1,'2017-03-15 16:57:07','1','4','1',1,'2017-03-15 16:57:07','wet',NULL,1,'2017-03-28 15:27:44',NULL,NULL,NULL,NULL,'1','okay',1,'1'),(3,1,2,'2017-03-25 02:30:58','1','0','1',NULL,'2017-03-25 02:30:58',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'0');
/*!40000 ALTER TABLE `tbl_bac_panels_shipments` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tbl_bac_programs`
--

DROP TABLE IF EXISTS `tbl_bac_programs`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `tbl_bac_programs` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `programCode` varchar(50) DEFAULT NULL,
  `dateCreated` datetime DEFAULT CURRENT_TIMESTAMP,
  `createdBy` int(11) DEFAULT NULL,
  `lastUpdatePerson` int(11) DEFAULT NULL,
  `currentRoundId` int(11) DEFAULT NULL,
  `updateDate` date DEFAULT NULL,
  `programDesc` varchar(90) DEFAULT NULL,
  `programName` varchar(90) DEFAULT NULL,
  `status` int(11) DEFAULT '1',
  PRIMARY KEY (`id`),
  UNIQUE KEY `tbl_bac_programs__pk_code` (`programName`,`programCode`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tbl_bac_programs`
--

LOCK TABLES `tbl_bac_programs` WRITE;
/*!40000 ALTER TABLE `tbl_bac_programs` DISABLE KEYS */;
/*!40000 ALTER TABLE `tbl_bac_programs` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tbl_bac_ready_labs`
--

DROP TABLE IF EXISTS `tbl_bac_ready_labs`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `tbl_bac_ready_labs` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `labId` varchar(45) DEFAULT NULL,
  `dateCreated` datetime DEFAULT CURRENT_TIMESTAMP,
  `createdBy` varchar(45) DEFAULT NULL,
  `updateDate` varchar(45) DEFAULT NULL,
  `lastUpdatePerson` varchar(45) DEFAULT NULL,
  `status` varchar(45) DEFAULT '1',
  `roundId` int(11) DEFAULT NULL,
  `totalParticipants` int(11) DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=12 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tbl_bac_ready_labs`
--

LOCK TABLES `tbl_bac_ready_labs` WRITE;
/*!40000 ALTER TABLE `tbl_bac_ready_labs` DISABLE KEYS */;
INSERT INTO `tbl_bac_ready_labs` VALUES (2,'2','2017-02-22 11:45:33',NULL,NULL,'1','2',33,0),(4,'2','2017-02-22 11:45:33',NULL,NULL,'1','2',35,0),(5,'1','2017-02-22 11:45:33',NULL,NULL,'1','2',1,0),(11,'1','2017-03-28 15:30:58','1',NULL,NULL,'1',2,0);
/*!40000 ALTER TABLE `tbl_bac_ready_labs` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tbl_bac_response_results`
--

DROP TABLE IF EXISTS `tbl_bac_response_results`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `tbl_bac_response_results` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `sampleId` varchar(45) DEFAULT NULL,
  `roundId` varchar(45) DEFAULT NULL,
  `participantId` varchar(45) DEFAULT NULL,
  `userId` varchar(45) DEFAULT '1',
  `panelToSampleId` varchar(45) DEFAULT '1',
  `dateCreated` datetime DEFAULT CURRENT_TIMESTAMP,
  `createdBy` int(11) DEFAULT NULL,
  `lastUpdatePerson` int(11) DEFAULT NULL,
  `updateDate` datetime DEFAULT NULL,
  `grainStainReaction` varchar(105) DEFAULT NULL,
  `grainStainReactionScore` int(11) DEFAULT NULL,
  `primaryMedia` varchar(105) DEFAULT NULL,
  `primaryMediaScore` int(11) DEFAULT NULL,
  `incubationConditions` varchar(105) DEFAULT NULL,
  `incubationConditionsScore` int(11) DEFAULT NULL,
  `colonialMorphology` varchar(45) DEFAULT NULL,
  `colonialMorphologyScore` int(11) DEFAULT NULL,
  `bacterialQualification` varchar(105) DEFAULT NULL,
  `bacterialQualificationScore` int(11) DEFAULT NULL,
  `bacterialReagents` varchar(105) DEFAULT NULL,
  `bacterialReagentsScore` int(11) DEFAULT NULL,
  `isolateProcessing` varchar(105) DEFAULT NULL,
  `isolateProcessingScore` int(11) DEFAULT NULL,
  `finalIdentification` varchar(105) DEFAULT NULL,
  `finalIdentificationScore` int(11) DEFAULT NULL,
  `finalScore` decimal(4,2) DEFAULT '0.00',
  `status` varchar(45) DEFAULT '1',
  `changedStatus` varchar(45) DEFAULT '1',
  `markedStatus` varchar(45) DEFAULT '0',
  `feedback` int(11) DEFAULT '0',
  `published` int(11) DEFAULT '0',
  `totalMicroAgentsScore` decimal(4,2) DEFAULT '0.00',
  `grade` varchar(45) DEFAULT NULL,
  `remarks` varchar(105) DEFAULT NULL,
  `adminRemarks` varchar(400) DEFAULT NULL,
  `correctiveAction` int(11) DEFAULT '0',
  `adminMarked` varchar(45) DEFAULT '0',
  PRIMARY KEY (`id`),
  UNIQUE KEY `sampleId_UNIQUE` (`sampleId`,`roundId`,`participantId`,`userId`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tbl_bac_response_results`
--

LOCK TABLES `tbl_bac_response_results` WRITE;
/*!40000 ALTER TABLE `tbl_bac_response_results` DISABLE KEYS */;
INSERT INTO `tbl_bac_response_results` VALUES (1,'1','1','1','1','3','2017-03-16 12:07:07',1,1,'0000-00-00 00:00:00','qwe',0,'0',0,'0',0,'0',0,'0',0,'0',0,'27',0,'qwe',0,0.00,'1','1','1',0,1,0.00,'UNACCEPTABLE','UNACCEPTABLE','Well Done',0,'0'),(5,'2','1','1','1','4','2017-03-16 17:31:10',1,1,'0000-00-00 00:00:00','hotter',0,'27',0,'27',0,'27',0,'27',0,'27',0,'27',0,'cools',0,0.00,'1','1','1',0,1,0.00,'UNACCEPTABLE','UNACCEPTABLE','',1,'0');
/*!40000 ALTER TABLE `tbl_bac_response_results` ENABLE KEYS */;
UNLOCK TABLES;
/*!50003 SET @saved_cs_client      = @@character_set_client */ ;
/*!50003 SET @saved_cs_results     = @@character_set_results */ ;
/*!50003 SET @saved_col_connection = @@collation_connection */ ;
/*!50003 SET character_set_client  = utf8mb4 */ ;
/*!50003 SET character_set_results = utf8mb4 */ ;
/*!50003 SET collation_connection  = utf8mb4_general_ci */ ;
/*!50003 SET @saved_sql_mode       = @@sql_mode */ ;
/*!50003 SET sql_mode              = 'NO_AUTO_CREATE_USER,NO_ENGINE_SUBSTITUTION' */ ;
DELIMITER ;;
/*!50003 CREATE*/ /*!50017 DEFINER=`root`@`localhost`*/ /*!50003 TRIGGER `updateSamplesToUsers` AFTER UPDATE ON `tbl_bac_response_results` FOR EACH ROW BEGIN
	update tbl_bac_samples_to_users 
	   set 
	   totalCorrectScore=new.finalScore,
       grade=new.grade,
       remarks=new.remarks,
       adminMarked=new.adminMarked,
       totalMicroAgentsScore=new.totalMicroAgentsScore
   where 
   sampleId=new.sampleId and 
   roundId=new.roundId and 
   participantId=new.participantId and
    panelToSampleId=new.panelToSampleId and 
     userId=new.userId;
    
END */;;
DELIMITER ;
/*!50003 SET sql_mode              = @saved_sql_mode */ ;
/*!50003 SET character_set_client  = @saved_cs_client */ ;
/*!50003 SET character_set_results = @saved_cs_results */ ;
/*!50003 SET collation_connection  = @saved_col_connection */ ;

--
-- Table structure for table `tbl_bac_rounds`
--

DROP TABLE IF EXISTS `tbl_bac_rounds`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `tbl_bac_rounds` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `roundName` varchar(45) DEFAULT NULL,
  `roundCode` varchar(45) DEFAULT NULL,
  `startDate` date DEFAULT NULL,
  `endDate` date DEFAULT NULL,
  `createdBy` int(11) DEFAULT NULL,
  `status` int(11) DEFAULT '1',
  `roundStatus` int(11) DEFAULT '1',
  `dateCreated` datetime DEFAULT CURRENT_TIMESTAMP,
  `lastUpdatePerson` int(11) DEFAULT NULL,
  `updateDate` datetime DEFAULT CURRENT_TIMESTAMP,
  `roundDesc` varchar(200) DEFAULT NULL,
  `totalSamplesAdded` int(11) DEFAULT '0',
  `daysLeft` int(11) DEFAULT '0',
  `totalShipmentsAdded` int(11) DEFAULT '0',
  `startRoundFlag` varchar(45) DEFAULT '0',
  `dateStarted` datetime DEFAULT NULL,
  `evaluated` int(11) DEFAULT '0',
  `published` int(11) DEFAULT '0',
  PRIMARY KEY (`id`),
  UNIQUE KEY `roundName_UNIQUE` (`roundName`),
  UNIQUE KEY `roundCode_UNIQUE` (`roundCode`),
  UNIQUE KEY `uk_round_roundname` (`roundName`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tbl_bac_rounds`
--

LOCK TABLES `tbl_bac_rounds` WRITE;
/*!40000 ALTER TABLE `tbl_bac_rounds` DISABLE KEYS */;
INSERT INTO `tbl_bac_rounds` VALUES (1,'ROUND A 2017','ROUND/1/17','2017-03-14','2017-07-16',1,1,1,'2017-03-15 15:25:28',1,'2017-03-15 15:25:28','FIRST ROUND 2017',0,0,0,'1',NULL,1,1),(2,'second quarter','round 0002','2017-03-26','2017-04-30',1,1,1,'2017-03-27 04:27:28',NULL,'2017-03-27 04:27:28','bacterial',0,0,0,'0',NULL,0,0);
/*!40000 ALTER TABLE `tbl_bac_rounds` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tbl_bac_rounds_labs`
--

DROP TABLE IF EXISTS `tbl_bac_rounds_labs`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `tbl_bac_rounds_labs` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `roundId` varchar(45) DEFAULT NULL,
  `labId` varchar(45) DEFAULT NULL,
  `dateCreated` datetime DEFAULT CURRENT_TIMESTAMP,
  `createdBy` varchar(45) DEFAULT NULL,
  `lastUpdatePerson` varchar(45) DEFAULT NULL,
  `dateUpdate` varchar(45) DEFAULT NULL,
  `status` varchar(45) DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `UK_LAB_ROUND` (`roundId`,`labId`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tbl_bac_rounds_labs`
--

LOCK TABLES `tbl_bac_rounds_labs` WRITE;
/*!40000 ALTER TABLE `tbl_bac_rounds_labs` DISABLE KEYS */;
INSERT INTO `tbl_bac_rounds_labs` VALUES (1,'1','1','2017-03-15 16:57:07','1',NULL,NULL,NULL);
/*!40000 ALTER TABLE `tbl_bac_rounds_labs` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tbl_bac_sample_instructions`
--

DROP TABLE IF EXISTS `tbl_bac_sample_instructions`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `tbl_bac_sample_instructions` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `introduction` varchar(1000) DEFAULT NULL,
  `scope` varchar(1000) DEFAULT NULL,
  `proficiency` varchar(1000) DEFAULT NULL,
  `surveyRequirement` varchar(1000) DEFAULT NULL,
  `factorsInfluenceTesting` varchar(1000) DEFAULT NULL,
  `selectionOfSample` varchar(1000) DEFAULT NULL,
  `homogeneityAndStability` varchar(1000) DEFAULT NULL,
  `clinicalDetails` varchar(1000) DEFAULT NULL,
  `specialHandling` varchar(1000) DEFAULT NULL,
  `specificEnvirons` varchar(1000) DEFAULT NULL,
  `sampleDispatch` varchar(1000) DEFAULT NULL,
  `returnInstructions` varchar(1000) DEFAULT NULL,
  `sampleInstructions` varchar(1000) DEFAULT NULL,
  `dateCreated` datetime DEFAULT CURRENT_TIMESTAMP,
  `createdBy` varchar(45) DEFAULT NULL,
  `lastUpdatePerson` varchar(45) DEFAULT NULL,
  `updateDate` datetime DEFAULT NULL,
  `status` varchar(45) DEFAULT '1',
  `sampleId` int(11) DEFAULT NULL,
  `batchName` varchar(45) DEFAULT NULL,
  `sampleReception` varchar(1000) DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `UNIQ_SAMPLEID` (`sampleId`),
  KEY `INDEX_KEY` (`id`,`status`,`sampleId`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tbl_bac_sample_instructions`
--

LOCK TABLES `tbl_bac_sample_instructions` WRITE;
/*!40000 ALTER TABLE `tbl_bac_sample_instructions` DISABLE KEYS */;
INSERT INTO `tbl_bac_sample_instructions` VALUES (2,'thank you for participating in the nmrl proficiency testing scheme (pts) this year. we hope that your participation will be beneficial to your laboratory, as well as being enjoyable. we would like to welcome any new participants to the program.','the nmrl pts aims to determine the laboratory procedures on handling specimen including complete identification, antimicrobial susceptible testing and recommendation to clinicians. participants are encouraged to perform all the survey challenges.','read the clinical details and processing instructions for each sample. samples shall be analyzed using your own standard operating procedures. all participants are required to use the test method of their choice.\nsamples should be treated in the same way as routine patient specimen.','the nmrl pts endeavors to assess all aspects of specimen management, such as turn-around time, accuracy of reports, clinical relevance of results, specimen handling, etc. rapid turn-around time is an essential element of specimen management; survey questionnaires which are received after the return deadline will be penalized and those received after the interim results are distributed will not be assessed.\n if a laboratory code is not completed or incorrectly stated on the survey response form the submitted results shall not be assessed, this is equivalent to omitting a patient name of a report.\nplease contact nmrl if you are unsure of your laboratory code.','temperature:\n samples are shipped at ambient conditions. please ensure that samples are stored and processed at room temperature at all times unless instructions are supplied to the contrary.\n\n\n\nstability: \nsome of the simulated specimens have a limited viability; therefore your laboratory should process the samples as soon as they are received in the laboratory.','isolates which are included in the nmrl pts is carefully characterized to ensure that typical morphology and features to facilitate identification. prior to distribution, the organisms are tested using standard phenotypic, and where required, genotypic methods.',NULL,'the package contains:\nâ€¢	instruction sheet\nâ€¢	previous eqa performance reports\nâ€¢	2 cary blair swabs and 4 gram stain smears','if the packages contain broken samples, sterilize (autoclave) the container and contents immediately. dispose broken samples as per safety protocols used in your laboratory. guard against the production of aerosols. please follow universal safety precautions at all times.\ncarry out all procedures aseptically, preferably in class ii biosafety cabinet','please keep all processed samples at room temperature until you have identified the organism/s fully.','an electronic notification is sent out on dispatch of the pts samples, should you not receive your shipment or the condition of the shipment is unsuitable, please contact the scheme coordinators within 5 working days of the notification received.','the proficiency test results should be returned either by email or the postal address provided on the first page of this instruction sheet.','This package contains 4 samples A, B, C, D. Please open package and inspect for any breakages, possible deterioration during transportation or missing samples, inform PTS Scheme coordinator via email if samples were unsuitable. ','2017-03-22 17:11:50','1',NULL,NULL,'9',0,'EQA/NPHL/A/17','this package contains 4 samples a, b, c, d. please open package and inspect for any breakages, possible deterioration during transportation or missing samples, inform pts scheme coordinator via email if samples were unsuitable. \nplease keep all samples at room temperature until you have identified the organism/s fully.'),(6,'thank you for participating in the nmrl proficiency testing scheme (pts) this year. we hope that your participation will be beneficial to your laboratory, as well as being enjoyable. we would like to welcome any new participants to the program.','the nmrl pts aims to determine the laboratory procedures on handling specimen including complete identification, antimicrobial susceptible testing and recommendation to clinicians. participants are encouraged to perform all the survey challenges.','read the clinical details and processing instructions for each sample. samples shall be analyzed using your own standard operating procedures. all participants are required to use the test method of their choice.\nsamples should be treated in the same way as routine patient specimen.','the nmrl pts endeavors to assess all aspects of specimen management, such as turn-around time, accuracy of reports, clinical relevance of results, specimen handling, etc. rapid turn-around time is an essential element of specimen management; survey questionnaires which are received after the return deadline will be penalized and those received after the interim results are distributed will not be assessed.\n if a laboratory code is not completed or incorrectly stated on the survey response form the submitted results shall not be assessed, this is equivalent to omitting a patient name of a report.\nplease contact nmrl if you are unsure of your laboratory code.','temperature:\n samples are shipped at ambient conditions. please ensure that samples are stored and processed at room temperature at all times unless instructions are supplied to the contrary.\n\n\n\nstability: \nsome of the simulated specimens have a limited viability; therefore your laboratory should process the samples as soon as they are received in the laboratory.','isolates which are included in the nmrl pts is carefully characterized to ensure that typical morphology and features to facilitate identification. prior to distribution, the organisms are tested using standard phenotypic, and where required, genotypic methods.','zxczxczxc','the package contains:\nâ€¢	instruction sheet\nâ€¢	previous eqa performance reports\nâ€¢	2 cary blair swabs and 4 gram stain smears','if the packages contain broken samples, sterilize (autoclave) the container and contents immediately. dispose broken samples as per safety protocols used in your laboratory. guard against the production of aerosols. please follow universal safety precautions at all times.\ncarry out all procedures aseptically, preferably in class ii biosafety cabinet','please keep all processed samples at room temperature until you have identified the organism/s fully.','an electronic notification is sent out on dispatch of the pts samples, should you not receive your shipment or the condition of the shipment is unsuitable, please contact the scheme coordinators within 5 working days of the notification received.','the proficiency test results should be returned either by email or the postal address provided on the first page of this instruction sheet.','This package contains 4 samples A, B, C, D. Please open package and inspect for any breakages, possible deterioration during transportation or missing samples, inform PTS Scheme coordinator via email if samples were unsuitable. ','2017-03-23 11:17:15','1','','0000-00-00 00:00:00','1',2,'EQA/NPHL/A/17','this package contains 4 samples a, b, c, d. please open package and inspect for any breakages, possible deterioration during transportation or missing samples, inform pts scheme coordinator via email if samples were unsuitable. \nplease keep all samples at room temperature until you have identified the organism/s fully.'),(7,'thank you for participating in the nmrl proficiency testing scheme (pts) this year. we hope that your participation will be beneficial to your laboratory, as well as being enjoyable. we would like to welcome any new participants to the program.','the nmrl pts aims to determine the laboratory procedures on handling specimen including complete identification, antimicrobial susceptible testing and recommendation to clinicians. participants are encouraged to perform all the survey challenges.','read the clinical details and processing instructions for each sample. samples shall be analyzed using your own standard operating procedures. all participants are required to use the test method of their choice.\nsamples should be treated in the same way as routine patient specimen.','the nmrl pts endeavors to assess all aspects of specimen management, such as turn-around time, accuracy of reports, clinical relevance of results, specimen handling, etc. rapid turn-around time is an essential element of specimen management; survey questionnaires which are received after the return deadline will be penalized and those received after the interim results are distributed will not be assessed.\n if a laboratory code is not completed or incorrectly stated on the survey response form the submitted results shall not be assessed, this is equivalent to omitting a patient name of a report.\nplease contact nmrl if you are unsure of your laboratory code.','temperature:\n samples are shipped at ambient conditions. please ensure that samples are stored and processed at room temperature at all times unless instructions are supplied to the contrary.\n\n\n\nstability: \nsome of the simulated specimens have a limited viability; therefore your laboratory should process the samples as soon as they are received in the laboratory.','isolates which are included in the nmrl pts is carefully characterized to ensure that typical morphology and features to facilitate identification. prior to distribution, the organisms are tested using standard phenotypic, and where required, genotypic methods.','asdaSDasdasdAS','the package contains:\nâ€¢	instruction sheet\nâ€¢	previous eqa performance reports\nâ€¢	2 cary blair swabs and 4 gram stain smears','if the packages contain broken samples, sterilize (autoclave) the container and contents immediately. dispose broken samples as per safety protocols used in your laboratory. guard against the production of aerosols. please follow universal safety precautions at all times.\ncarry out all procedures aseptically, preferably in class ii biosafety cabinet','please keep all processed samples at room temperature until you have identified the organism/s fully.','an electronic notification is sent out on dispatch of the pts samples, should you not receive your shipment or the condition of the shipment is unsuitable, please contact the scheme coordinators within 5 working days of the notification received.','the proficiency test results should be returned either by email or the postal address provided on the first page of this instruction sheet.','This package contains 4 samples A, B, C, D. Please open package and inspect for any breakages, possible deterioration during transportation or missing samples, inform PTS Scheme coordinator via email if samples were unsuitable. ','2017-03-23 11:18:50','1','1','0000-00-00 00:00:00','1',1,'EQA/NPHL/A/17','this package contains 4 samples a, b, c, d. please open package and inspect for any breakages, possible deterioration during transportation or missing samples, inform pts scheme coordinator via email if samples were unsuitable. \nplease keep all samples at room temperature until you have identified the organism/s fully.');
/*!40000 ALTER TABLE `tbl_bac_sample_instructions` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tbl_bac_sample_to_panel`
--

DROP TABLE IF EXISTS `tbl_bac_sample_to_panel`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `tbl_bac_sample_to_panel` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `sampleId` int(11) DEFAULT NULL,
  `panelId` varchar(45) DEFAULT NULL,
  `createdBy` varchar(45) DEFAULT NULL,
  `dateCreated` datetime DEFAULT CURRENT_TIMESTAMP,
  `status` varchar(15) DEFAULT '1',
  `lastUpdatePerson` int(11) DEFAULT NULL,
  `dateUpdate` datetime DEFAULT CURRENT_TIMESTAMP,
  `deliveryStatus` int(11) DEFAULT '0',
  `deliveryCondition` varchar(45) DEFAULT NULL,
  `comments` varchar(45) DEFAULT NULL,
  `quantity` int(11) DEFAULT '1',
  `dateDelivered` date DEFAULT NULL,
  `participantId` int(11) DEFAULT NULL,
  `issuedStatus` int(11) DEFAULT '0',
  `roundId` int(11) DEFAULT NULL,
  `totalAddedSamples` int(11) DEFAULT NULL,
  `shipmentId` int(11) DEFAULT NULL,
  `startRoundFlag` int(11) DEFAULT '0',
  `conditionStatus` varchar(105) DEFAULT NULL,
  `sampleComment` varchar(300) DEFAULT NULL,
  `responseStatus` varchar(45) DEFAULT '0',
  `feedBack` varchar(45) DEFAULT '0',
  `issuedFlag` varchar(45) DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tbl_bac_sample_to_panel`
--

LOCK TABLES `tbl_bac_sample_to_panel` WRITE;
/*!40000 ALTER TABLE `tbl_bac_sample_to_panel` DISABLE KEYS */;
INSERT INTO `tbl_bac_sample_to_panel` VALUES (1,1,'1','1','2017-03-15 15:13:22','1',NULL,'2017-03-15 15:13:22',NULL,NULL,NULL,1,'2017-03-17',NULL,0,NULL,1,1,0,NULL,NULL,'null','0','0'),(2,2,'1','1','2017-03-15 15:13:22','1',NULL,'2017-03-15 15:13:22',NULL,NULL,NULL,1,'2017-03-19',NULL,0,NULL,1,1,0,NULL,NULL,'null','0','0'),(3,1,'1','1','2017-03-15 16:57:07','1',1,'2017-03-15 16:57:07',4,NULL,'okay',1,'2017-03-28',1,0,1,1,1,1,'wet','nice condition','1','0','1'),(4,2,'1','1','2017-03-15 16:57:07','1',1,'2017-03-15 16:57:07',4,NULL,'okay',1,'2017-03-28',1,0,1,1,1,1,'wet','nice condition','1','0','1');
/*!40000 ALTER TABLE `tbl_bac_sample_to_panel` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tbl_bac_samples`
--

DROP TABLE IF EXISTS `tbl_bac_samples`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `tbl_bac_samples` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `batchName` varchar(45) DEFAULT NULL,
  `datePrepared` date DEFAULT NULL,
  `manOrigin` varchar(45) DEFAULT NULL,
  `bloodPackNo` varchar(45) DEFAULT NULL,
  `expiryDate` date DEFAULT NULL,
  `preparedBy` varchar(45) DEFAULT NULL,
  `materialOrigin` varchar(45) DEFAULT NULL,
  `materialType` varchar(45) DEFAULT NULL,
  `status` int(11) DEFAULT '1',
  `dateCreated` datetime DEFAULT CURRENT_TIMESTAMP,
  `expiryStatus` varchar(45) DEFAULT '0',
  `collectionDate` date DEFAULT NULL,
  `dispatchable` varchar(45) DEFAULT '1',
  `preparedAt` varchar(105) DEFAULT NULL,
  `lifespan` varchar(45) DEFAULT NULL,
  `originExtraInfo` varchar(100) DEFAULT NULL,
  `quantity` int(11) DEFAULT NULL,
  `sampleStatus` varchar(45) DEFAULT '5',
  `participantId` varchar(45) DEFAULT 'null',
  `dateDelivered` date DEFAULT NULL,
  `barcode` varchar(45) DEFAULT 'null',
  `lastUpdatePerson` int(11) DEFAULT NULL,
  `dateUpdate` datetime DEFAULT CURRENT_TIMESTAMP,
  `createdBy` int(11) DEFAULT NULL,
  `issuedStatus` int(11) DEFAULT '0',
  `totalSamplesAdded` int(11) DEFAULT NULL,
  `materialSource` varchar(100) DEFAULT NULL,
  `sampleDetails` varchar(100) DEFAULT NULL,
  `sampleType` varchar(10) DEFAULT NULL,
  `sampleInstructions` varchar(100) DEFAULT NULL,
  `expectedResults` int(11) DEFAULT '0',
  PRIMARY KEY (`id`),
  UNIQUE KEY `uk_sample_batcname` (`batchName`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tbl_bac_samples`
--

LOCK TABLES `tbl_bac_samples` WRITE;
/*!40000 ALTER TABLE `tbl_bac_samples` DISABLE KEYS */;
INSERT INTO `tbl_bac_samples` VALUES (1,'EQA/NPHL/A/17','2017-03-15','','','0000-00-00','osoro','NPHL','stool',1,'2017-03-15 14:34:48','0','0000-00-00','1','knh','10','',0,'5','null','0000-00-00','22549100794003607',1,'2017-03-15 14:34:48',1,0,0,'sample isolates','Please check the stool for ant organisms','2','add the reagents and identify the organism',0),(2,'EQA/NPHL/B/17','2017-03-15','','','0000-00-00','OMOLLO','NPHL','MUCUS',1,'2017-03-15 14:55:09','0','0000-00-00','1','KNH','10','',0,'5','null','0000-00-00','45727664592903094',1,'2017-03-15 14:55:09',1,0,0,'standard organisms','bacteria','2','Identify the bacteria',0);
/*!40000 ALTER TABLE `tbl_bac_samples` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tbl_bac_samples_to_users`
--

DROP TABLE IF EXISTS `tbl_bac_samples_to_users`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `tbl_bac_samples_to_users` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `userId` int(11) DEFAULT NULL,
  `sampleId` int(11) DEFAULT NULL,
  `panelToSampleId` int(11) DEFAULT NULL,
  `dateAllocated` datetime DEFAULT CURRENT_TIMESTAMP,
  `dateCreated` datetime DEFAULT CURRENT_TIMESTAMP,
  `status` varchar(45) NOT NULL DEFAULT '1',
  `lastUpdatePerson` varchar(45) DEFAULT NULL,
  `dateUpdate` datetime DEFAULT NULL,
  `receiveStatus` varchar(45) DEFAULT NULL,
  `createdBy` int(11) DEFAULT NULL,
  `responseStatus` varchar(45) DEFAULT '0',
  `feedBack` varchar(45) DEFAULT '0',
  `sampleStatus` varchar(45) DEFAULT NULL,
  `dateReturned` datetime DEFAULT NULL,
  `roundId` int(11) DEFAULT NULL,
  `participantId` int(11) DEFAULT NULL,
  `totalCorrectScore` int(11) DEFAULT '0',
  `totalMicroAgentsScore` int(11) DEFAULT '0',
  `remarks` varchar(45) DEFAULT NULL,
  `grade` varchar(45) DEFAULT NULL,
  `published` int(11) DEFAULT '0',
  `adminMarked` varchar(45) DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tbl_bac_samples_to_users`
--

LOCK TABLES `tbl_bac_samples_to_users` WRITE;
/*!40000 ALTER TABLE `tbl_bac_samples_to_users` DISABLE KEYS */;
INSERT INTO `tbl_bac_samples_to_users` VALUES (1,1,1,3,'2017-03-16 11:28:38','2017-03-16 11:28:38','1','1',NULL,NULL,1,'1','1',NULL,NULL,1,1,0,0,'UNACCEPTABLE','UNACCEPTABLE',1,'0'),(2,1,2,4,'2017-03-16 17:29:50','2017-03-16 17:29:50','1','1',NULL,NULL,1,'1','1',NULL,NULL,1,1,0,0,'UNACCEPTABLE','UNACCEPTABLE',1,'0');
/*!40000 ALTER TABLE `tbl_bac_samples_to_users` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tbl_bac_saved_email_notifications`
--

DROP TABLE IF EXISTS `tbl_bac_saved_email_notifications`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `tbl_bac_saved_email_notifications` (
  `id` int(11) NOT NULL,
  `recepientEmail` varchar(45) DEFAULT NULL,
  `message` varchar(500) DEFAULT NULL,
  `subject` varchar(45) DEFAULT NULL,
  `status` varchar(45) DEFAULT NULL,
  `createdBy` varchar(45) DEFAULT NULL,
  `dateCreated` datetime DEFAULT CURRENT_TIMESTAMP,
  `updateDate` datetime DEFAULT NULL,
  `lastUpdatePerson` varchar(45) DEFAULT NULL,
  `sendStatus` varchar(45) DEFAULT '1',
  `dateEmailSent` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tbl_bac_saved_email_notifications`
--

LOCK TABLES `tbl_bac_saved_email_notifications` WRITE;
/*!40000 ALTER TABLE `tbl_bac_saved_email_notifications` DISABLE KEYS */;
/*!40000 ALTER TABLE `tbl_bac_saved_email_notifications` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tbl_bac_shipment_logs`
--

DROP TABLE IF EXISTS `tbl_bac_shipment_logs`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `tbl_bac_shipment_logs` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `dateReceived` datetime DEFAULT CURRENT_TIMESTAMP,
  `panelsReceived` varchar(45) DEFAULT NULL,
  `shipmentStatus` varchar(45) DEFAULT NULL,
  `receivedBy` varchar(45) DEFAULT NULL,
  `createdBy` varchar(45) DEFAULT NULL,
  `shipmentId` varchar(45) DEFAULT NULL,
  `addressedTo` varchar(45) DEFAULT NULL,
  `status` varchar(45) DEFAULT NULL,
  `dateCreated` datetime DEFAULT CURRENT_TIMESTAMP,
  `participantId` varchar(45) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=79 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tbl_bac_shipment_logs`
--

LOCK TABLES `tbl_bac_shipment_logs` WRITE;
/*!40000 ALTER TABLE `tbl_bac_shipment_logs` DISABLE KEYS */;
INSERT INTO `tbl_bac_shipment_logs` VALUES (1,NULL,NULL,'0',NULL,NULL,'1',NULL,'1','2017-03-15 16:18:02',NULL),(2,NULL,NULL,'0',NULL,NULL,'1',NULL,'1','2017-03-15 16:20:07',NULL),(3,NULL,NULL,'0',NULL,NULL,'1',NULL,'1','2017-03-15 16:20:43',NULL),(4,NULL,NULL,'2',NULL,NULL,'1','Osoro Michael','1','2017-03-16 10:36:31',NULL),(5,NULL,NULL,'2',NULL,NULL,'1','Osoro Michael','1','2017-03-16 10:36:49',NULL),(6,NULL,NULL,'2',NULL,NULL,'1','Osoro Michael','1','2017-03-16 10:37:18',NULL),(7,NULL,NULL,'2',NULL,NULL,'1','Osoro Michael','1','2017-03-16 10:37:38',NULL),(8,NULL,NULL,'2',NULL,NULL,'1','Osoro Michael','1','2017-03-16 12:51:48',NULL),(9,NULL,NULL,'2',NULL,NULL,'1','Osoro Michael','1','2017-03-16 13:33:29',NULL),(10,NULL,NULL,'2',NULL,NULL,'1','Osoro Michael','1','2017-03-16 13:34:54',NULL),(11,NULL,NULL,'2',NULL,NULL,'1','Osoro Michael','1','2017-03-16 14:29:32',NULL),(12,NULL,NULL,'2',NULL,NULL,'1','Osoro Michael','1','2017-03-16 14:41:01',NULL),(13,NULL,NULL,'2',NULL,NULL,'1','Osoro Michael','1','2017-03-16 14:43:56',NULL),(14,NULL,NULL,'2',NULL,NULL,'1','Osoro Michael','1','2017-03-16 18:09:42',NULL),(15,NULL,NULL,'2',NULL,NULL,'1','Osoro Michael','1','2017-03-16 18:18:12',NULL),(16,NULL,NULL,'2',NULL,NULL,'1','Osoro Michael','1','2017-03-16 18:18:17',NULL),(17,NULL,NULL,'2',NULL,NULL,'1','Osoro Michael','1','2017-03-17 14:19:16',NULL),(18,'2017-03-17 00:00:00','10','3',NULL,NULL,'1','Osoro Michael','1','2017-03-17 14:56:02',NULL),(19,'2017-03-17 00:00:00','10','2',NULL,NULL,'1','Osoro Michael','1','2017-03-17 14:56:42',NULL),(20,'2017-02-25 00:00:00','23','3',NULL,NULL,'1','Osoro Michael','1','2017-03-17 15:28:37',NULL),(21,'2017-01-29 00:00:00','23','3',NULL,NULL,'1','Osoro Michael','1','2017-03-17 15:28:53',NULL),(22,'2017-02-25 00:00:00','23','3',NULL,NULL,'1','Osoro Michael','1','2017-03-17 15:36:37',NULL),(23,'2017-02-25 00:00:00','23','3',NULL,NULL,'1','Osoro Michael','1','2017-03-17 15:37:57',NULL),(24,'2017-02-25 00:00:00','23','2',NULL,NULL,'1','Osoro Michael','1','2017-03-17 15:44:05',NULL),(25,'2017-02-25 00:00:00','2','3',NULL,NULL,'1','Osoro Michael','1','2017-03-17 15:44:39',NULL),(26,'2017-02-26 00:00:00','12','3',NULL,NULL,'1','Osoro Michael','1','2017-03-17 15:49:34',NULL),(27,'2017-02-26 00:00:00','12','3',NULL,NULL,'1','Osoro Michael','1','2017-03-17 15:50:43',NULL),(28,'2017-02-26 00:00:00','12','3',NULL,NULL,'1','Osoro Michael','1','2017-03-17 16:02:51',NULL),(29,'2017-02-26 00:00:00','12','2',NULL,NULL,'1','Osoro Michael','1','2017-03-17 16:07:38',NULL),(30,'2017-02-25 00:00:00','23','3',NULL,NULL,'1','Osoro Michael','1','2017-03-17 16:08:42',NULL),(31,'2017-02-25 00:00:00','23','3',NULL,NULL,'1','Osoro Michael','1','2017-03-17 16:09:56',NULL),(32,'2017-02-25 00:00:00','23','3',NULL,NULL,'1','Osoro Michael','1','2017-03-17 16:10:46',NULL),(33,'2017-02-25 00:00:00','12','3',NULL,NULL,'1','Osoro Michael','1','2017-03-17 16:14:48',NULL),(34,'2017-02-25 00:00:00','23','3',NULL,NULL,'1','Osoro Michael','1','2017-03-17 16:18:03',NULL),(35,'2017-02-25 00:00:00','23','3',NULL,NULL,'1','Osoro Michael','1','2017-03-17 16:18:54',NULL),(36,'2017-02-25 00:00:00','23','3',NULL,NULL,'1','Osoro Michael','1','2017-03-18 16:42:10',NULL),(37,'2017-02-25 00:00:00','23','3',NULL,NULL,'1','Osoro Michael','1','2017-03-18 16:42:16',NULL),(38,'2017-02-25 00:00:00','23','3',NULL,NULL,'1','Osoro Michael','1','2017-03-20 12:14:25',NULL),(39,'2017-02-25 00:00:00','23','3',NULL,NULL,'1','Osoro Michael','1','2017-03-20 12:23:04',NULL),(40,'2017-02-25 00:00:00','23','3',NULL,NULL,'1','Osoro Michael','1','2017-03-20 12:30:52',NULL),(41,'2017-02-25 00:00:00','23','3',NULL,NULL,'1','Osoro Michael','1','2017-03-20 12:30:55',NULL),(42,'2017-02-25 00:00:00','23','3',NULL,NULL,'1','Osoro Michael','1','2017-03-20 19:11:19',NULL),(43,'2017-02-25 00:00:00','23','3',NULL,NULL,'1','Osoro Michael','1','2017-03-20 19:11:25',NULL),(44,'2017-02-25 00:00:00','23','3',NULL,NULL,'1','Osoro Michael','1','2017-03-20 19:11:29',NULL),(45,'2017-02-25 00:00:00','23','3',NULL,NULL,'1','Osoro Michael','1','2017-03-20 19:11:33',NULL),(46,'2017-02-25 00:00:00','23','3',NULL,NULL,'1','Osoro Michael','1','2017-03-21 09:20:41',NULL),(47,'2017-02-25 00:00:00','23','3',NULL,NULL,'1','Osoro Michael','1','2017-03-21 09:23:10',NULL),(48,'2017-02-25 00:00:00','23','3',NULL,NULL,'1','Osoro Michael','1','2017-03-21 09:25:17',NULL),(49,'2017-02-25 00:00:00','23','3',NULL,NULL,'1','Osoro Michael','1','2017-03-21 09:26:02',NULL),(50,'2017-02-25 00:00:00','23','3',NULL,NULL,'1','Osoro Michael','1','2017-03-21 09:30:04',NULL),(51,'2017-02-25 00:00:00','23','3',NULL,NULL,'1','Osoro Michael','1','2017-03-21 09:34:32',NULL),(52,'2017-02-25 00:00:00','23','3',NULL,NULL,'1','Osoro Michael','1','2017-03-21 09:35:13',NULL),(53,'2017-02-25 00:00:00','23','3',NULL,NULL,'1','Osoro Michael','1','2017-03-21 09:36:05',NULL),(54,'2017-02-25 00:00:00','23','3',NULL,NULL,'1','Osoro Michael','1','2017-03-21 09:36:34',NULL),(55,'2017-02-25 00:00:00','23','3',NULL,NULL,'1','Osoro Michael','1','2017-03-21 09:41:18',NULL),(56,'2017-02-25 00:00:00','23','3',NULL,NULL,'1','Osoro Michael','1','2017-03-21 09:42:01',NULL),(57,'2017-02-25 00:00:00','23','3',NULL,NULL,'1','Osoro Michael','1','2017-03-21 09:42:55',NULL),(58,'2017-02-25 00:00:00','23','3',NULL,NULL,'1','Osoro Michael','1','2017-03-21 09:43:36',NULL),(59,'2017-02-25 00:00:00','23','3',NULL,NULL,'1','Osoro Michael','1','2017-03-21 09:45:02',NULL),(60,'2017-02-25 00:00:00','23','3',NULL,NULL,'1','Osoro Michael','1','2017-03-21 09:46:11',NULL),(61,'2017-02-25 00:00:00','23','3',NULL,NULL,'1','Osoro Michael','1','2017-03-21 09:46:31',NULL),(62,'2017-02-25 00:00:00','23','3',NULL,NULL,'1','Osoro Michael','1','2017-03-21 09:48:29',NULL),(63,'2017-02-25 00:00:00','23','3',NULL,NULL,'1','Osoro Michael','1','2017-03-21 09:48:58',NULL),(64,'2017-02-25 00:00:00','23','3',NULL,NULL,'1','Osoro Michael','1','2017-03-21 09:50:53',NULL),(65,'2017-02-25 00:00:00','23','3',NULL,NULL,'1','Osoro Michael','1','2017-03-21 09:52:04',NULL),(66,'2017-02-25 00:00:00','23','3',NULL,NULL,'1','Osoro Michael','1','2017-03-21 09:52:25',NULL),(67,'2017-02-25 00:00:00','23','3',NULL,NULL,'1','Osoro Michael','1','2017-03-21 09:53:21',NULL),(68,'2017-02-25 00:00:00','23','3',NULL,NULL,'1','Osoro Michael','1','2017-03-21 09:54:59',NULL),(69,'2017-02-25 00:00:00','23','3',NULL,NULL,'1','Osoro Michael','1','2017-03-21 09:55:27',NULL),(70,'2017-02-25 00:00:00','23','3',NULL,NULL,'1','Osoro Michael','1','2017-03-21 10:01:00',NULL),(71,'2017-02-25 00:00:00','23','3',NULL,NULL,'1','Osoro Michael','1','2017-03-21 10:02:51',NULL),(72,'2017-02-25 00:00:00','23','3',NULL,NULL,'1','Osoro Michael','1','2017-03-21 10:07:37',NULL),(73,'2017-02-25 00:00:00','23','3',NULL,NULL,'1','Osoro Michael','1','2017-03-21 10:09:42',NULL),(74,'2017-02-25 00:00:00','23','3',NULL,NULL,'1','Osoro Michael','1','2017-03-21 14:22:46',NULL),(75,'2017-02-25 00:00:00','23','2',NULL,NULL,'1','Osoro Michael','1','2017-03-28 15:21:16',NULL),(76,'2017-02-25 00:00:00','23','4',NULL,NULL,'1','Osoro Michael','1','2017-03-28 15:22:55',NULL),(77,'2017-02-25 00:00:00','23','3',NULL,NULL,'1','Osoro Michael','1','2017-03-28 15:27:44',NULL),(78,'2017-02-25 00:00:00','23','3',NULL,NULL,'1','Osoro Michael','1','2017-04-03 12:57:43',NULL);
/*!40000 ALTER TABLE `tbl_bac_shipment_logs` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tbl_bac_shipments`
--

DROP TABLE IF EXISTS `tbl_bac_shipments`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `tbl_bac_shipments` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `shipmentName` varchar(45) DEFAULT NULL,
  `dateCreated` datetime DEFAULT CURRENT_TIMESTAMP,
  `status` int(11) DEFAULT '1',
  `lastUpdatePerson` int(11) DEFAULT NULL,
  `dateUpdate` datetime DEFAULT CURRENT_TIMESTAMP,
  `numberOfSamples` int(11) DEFAULT NULL,
  `numberOfPanels` varchar(45) DEFAULT NULL,
  `courier` varchar(45) DEFAULT NULL,
  `deliveryStatus` varchar(45) DEFAULT NULL,
  `dateDelivered` date DEFAULT NULL,
  `receivedBy` varchar(45) DEFAULT NULL,
  `createdBy` varchar(45) DEFAULT NULL,
  `dispatchedBy` varchar(45) DEFAULT NULL,
  `shipmentDsc` varchar(100) DEFAULT NULL,
  `conditionDispatch` varchar(45) DEFAULT NULL,
  `conditionReceived` varchar(45) DEFAULT NULL,
  `receiveComments` varchar(105) DEFAULT NULL,
  `shipmentLabel` varchar(100) DEFAULT NULL,
  `roundId` varchar(20) DEFAULT NULL,
  `datePrepared` date DEFAULT NULL,
  `preparedBy` varchar(45) DEFAULT NULL,
  `shipmentStatus` varchar(45) DEFAULT '0',
  `panelsReceived` int(11) DEFAULT NULL,
  `dateReceived` date DEFAULT NULL,
  `tempAtReceiving` varchar(45) DEFAULT NULL,
  `storage` varchar(45) DEFAULT NULL,
  `dateDispatched` date DEFAULT NULL,
  `temperature` varchar(45) DEFAULT NULL,
  `dispatchComments` varchar(45) DEFAULT NULL,
  `dispatchCourier` varchar(45) DEFAULT NULL,
  `addressedTo` varchar(45) DEFAULT NULL,
  `shippingMethod` varchar(45) DEFAULT NULL,
  `totalPanelsAdded` int(11) DEFAULT '0',
  `labId` int(11) DEFAULT NULL,
  `startRoundFlag` varchar(10) DEFAULT '0',
  `evaluated` int(11) DEFAULT '0',
  PRIMARY KEY (`id`),
  UNIQUE KEY `uk_shipment_name` (`shipmentName`),
  KEY `shipmentIndexKey` (`id`,`shipmentName`,`addressedTo`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tbl_bac_shipments`
--

LOCK TABLES `tbl_bac_shipments` WRITE;
/*!40000 ALTER TABLE `tbl_bac_shipments` DISABLE KEYS */;
INSERT INTO `tbl_bac_shipments` VALUES (1,'SHIPMENT/A/17','2017-03-15 15:14:57',1,1,'2017-03-15 15:14:57',NULL,'100',NULL,NULL,NULL,NULL,'1',NULL,'carries panels with samples one to kajiado',NULL,NULL,'23','SHIPMENT/1/17','1','2017-03-15','OSORO','3',23,'2017-02-25','23','23','2017-03-15','20','10 panels','G4S','Osoro Michael','Lorry',0,NULL,'1',1),(2,'shipment 002','2017-03-25 02:30:28',1,NULL,'2017-03-25 02:30:28',NULL,'10',NULL,NULL,NULL,NULL,'1',NULL,'s001',NULL,NULL,NULL,'soo1',NULL,'2017-03-25','osor michael','0',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,0,NULL,'0',0);
/*!40000 ALTER TABLE `tbl_bac_shipments` ENABLE KEYS */;
UNLOCK TABLES;
/*!50003 SET @saved_cs_client      = @@character_set_client */ ;
/*!50003 SET @saved_cs_results     = @@character_set_results */ ;
/*!50003 SET @saved_col_connection = @@collation_connection */ ;
/*!50003 SET character_set_client  = utf8mb4 */ ;
/*!50003 SET character_set_results = utf8mb4 */ ;
/*!50003 SET collation_connection  = utf8mb4_general_ci */ ;
/*!50003 SET @saved_sql_mode       = @@sql_mode */ ;
/*!50003 SET sql_mode              = 'NO_AUTO_CREATE_USER,NO_ENGINE_SUBSTITUTION' */ ;
DELIMITER ;;
/*!50003 CREATE*/ /*!50017 DEFINER=`root`@`localhost`*/ /*!50003 TRIGGER `updatePanelAndSamples` AFTER UPDATE ON `tbl_bac_shipments` FOR EACH ROW BEGIN
IF(new.evaluated=0) THEN
	update tbl_bac_panels_shipments 
	   set 
	   deliveryStatus=new.shipmentStatus,
       dateDelivered=current_timestamp,
	   quantity='1',
	   receivedBy=new.receivedBy
   where shipmentId=new.id and roundId is not null;


  update tbl_bac_panel_mst 
   set 
	   dateDelivered=new.dateReceived,
	   panelStatus=new.shipmentStatus,
	   shipmentNumber=concat('S-0',new.id)
   where tbl_bac_panel_mst.id in
  (select panelId from  tbl_bac_panels_shipments where  tbl_bac_panels_shipments.shipmentId=new.id)
  ;

 update tbl_bac_panels_shipments 
   set 
	   
       deliveryStatus=new.shipmentStatus
       
   where tbl_bac_panels_shipments.shipmentId=new.id;
  


	update tbl_bac_sample_to_panel set 
    deliveryStatus =new.shipmentStatus,
     dateDelivered=current_timestamp,
    shipmentId=new.id
    where panelId in(	
	select panelId from  tbl_bac_panels_shipments where  tbl_bac_panels_shipments.shipmentId=new.id	
	)  and roundId is not null;
  


   -- Insert record into audit table
   INSERT INTO tbl_bac_shipment_logs
		   ( dateReceived,
			panelsReceived,
			shipmentStatus,
			receivedBy,
			addressedTo,
			status,
			shipmentId
			)
   VALUES
	   ( new.dateReceived,
		new.panelsReceived,
		new.shipmentStatus,
		new.receivedBy,
		new.addressedTo,
		'1',
		new.id
		 );
ELSE
 INSERT INTO tbl_bac_shipment_logs
		   ( dateReceived,
			panelsReceived,
			shipmentStatus,
			receivedBy,
			addressedTo,
			status,
			shipmentId
			)
   VALUES
	   ( new.dateReceived,
		new.panelsReceived,
		new.shipmentStatus,
		new.receivedBy,
		new.addressedTo,
		'1',
		new.id
		 );
END IF;

END */;;
DELIMITER ;
/*!50003 SET sql_mode              = @saved_sql_mode */ ;
/*!50003 SET character_set_client  = @saved_cs_client */ ;
/*!50003 SET character_set_results = @saved_cs_results */ ;
/*!50003 SET collation_connection  = @saved_col_connection */ ;

--
-- Table structure for table `tbl_bac_suscepitibility`
--

DROP TABLE IF EXISTS `tbl_bac_suscepitibility`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `tbl_bac_suscepitibility` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `userId` int(11) DEFAULT NULL,
  `participantId` int(11) DEFAULT NULL,
  `sampleId` int(11) DEFAULT NULL,
  `panelToSampleId` int(11) DEFAULT NULL,
  `dateCreated` datetime DEFAULT CURRENT_TIMESTAMP,
  `createdBy` varchar(45) DEFAULT NULL,
  `lastUpdatePerson` varchar(45) DEFAULT NULL,
  `updateDate` datetime DEFAULT NULL,
  `status` int(11) DEFAULT '1',
  `isolateIdentification` varchar(105) DEFAULT NULL,
  `methodUsed` varchar(105) DEFAULT NULL,
  `mediaUsed` varchar(105) DEFAULT NULL,
  `mediaManufacturer` varchar(105) DEFAULT NULL,
  `discManufacturer` varchar(100) DEFAULT NULL,
  `guidelines` varchar(105) DEFAULT NULL,
  `roundId` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `user_lab_sample_round_uk` (`participantId`,`sampleId`,`roundId`,`userId`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tbl_bac_suscepitibility`
--

LOCK TABLES `tbl_bac_suscepitibility` WRITE;
/*!40000 ALTER TABLE `tbl_bac_suscepitibility` DISABLE KEYS */;
INSERT INTO `tbl_bac_suscepitibility` VALUES (1,1,1,1,3,'2017-03-16 12:16:32','1','1','0000-00-00 00:00:00',1,'0','0','0','0','0','CLSI',1),(4,1,1,2,4,'2017-03-16 17:31:21','1','1','0000-00-00 00:00:00',1,'amikacin','slide','glass','smk','smk','HUQAS',1);
/*!40000 ALTER TABLE `tbl_bac_suscepitibility` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tbl_bac_test_agents`
--

DROP TABLE IF EXISTS `tbl_bac_test_agents`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `tbl_bac_test_agents` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `testAgentName` varchar(45) DEFAULT NULL,
  `testAgentCode` varchar(45) DEFAULT NULL,
  `testAgentType` varchar(45) DEFAULT NULL,
  `fewRange` int(11) DEFAULT NULL,
  `modRange` int(11) DEFAULT NULL,
  `manyRange` int(11) DEFAULT NULL,
  `status` varchar(45) DEFAULT '1',
  `createdBy` varchar(45) DEFAULT NULL,
  `dateCreated` datetime DEFAULT CURRENT_TIMESTAMP,
  `lastUpdatePerson` varchar(45) DEFAULT NULL,
  `updateDate` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tbl_bac_test_agents`
--

LOCK TABLES `tbl_bac_test_agents` WRITE;
/*!40000 ALTER TABLE `tbl_bac_test_agents` DISABLE KEYS */;
INSERT INTO `tbl_bac_test_agents` VALUES (1,'amikacin','501','3',10,100,1000,'1','1','2017-03-15 14:50:01',NULL,NULL),(2,'colistin','702','3',20,500,1500,'1','1','2017-03-15 14:50:36',NULL,NULL),(3,'ampicilin','502','3',100,1000,5000,'1','1','2017-03-15 14:51:06',NULL,NULL),(5,'cloxacilin','520','3',55,155,250,'1','1','2017-03-15 14:52:27',NULL,NULL),(6,'qweqwe','asd','1',NULL,NULL,NULL,'1','1','2017-03-25 00:26:59',NULL,NULL);
/*!40000 ALTER TABLE `tbl_bac_test_agents` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tbl_bac_test_types`
--

DROP TABLE IF EXISTS `tbl_bac_test_types`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `tbl_bac_test_types` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `testName` varchar(45) DEFAULT NULL,
  `testDesc` varchar(45) DEFAULT NULL,
  `dateCreated` datetime DEFAULT CURRENT_TIMESTAMP,
  `createdBy` varchar(45) DEFAULT NULL,
  `status` varchar(45) DEFAULT '1',
  `lastUpdatePerson` varchar(45) DEFAULT NULL,
  `updateDate` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tbl_bac_test_types`
--

LOCK TABLES `tbl_bac_test_types` WRITE;
/*!40000 ALTER TABLE `tbl_bac_test_types` DISABLE KEYS */;
INSERT INTO `tbl_bac_test_types` VALUES (2,'ID testing','Identification','2017-03-22 15:17:21','1','1',NULL,NULL);
/*!40000 ALTER TABLE `tbl_bac_test_types` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `temp_mail`
--

DROP TABLE IF EXISTS `temp_mail`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `temp_mail` (
  `temp_id` int(11) NOT NULL AUTO_INCREMENT,
  `message` text,
  `from_mail` varchar(255) DEFAULT NULL,
  `to_email` varchar(255) NOT NULL,
  `bcc` text,
  `cc` text,
  `subject` text,
  `from_full_name` varchar(255) DEFAULT NULL,
  `status` varchar(255) NOT NULL DEFAULT 'pending',
  PRIMARY KEY (`temp_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `temp_mail`
--

LOCK TABLES `temp_mail` WRITE;
/*!40000 ALTER TABLE `temp_mail` DISABLE KEYS */;
/*!40000 ALTER TABLE `temp_mail` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `vl_department`
--

DROP TABLE IF EXISTS `vl_department`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `vl_department` (
  `ID` int(11) NOT NULL AUTO_INCREMENT,
  `DepartmentName` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`ID`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `vl_department`
--

LOCK TABLES `vl_department` WRITE;
/*!40000 ALTER TABLE `vl_department` DISABLE KEYS */;
INSERT INTO `vl_department` VALUES (1,'Testing');
/*!40000 ALTER TABLE `vl_department` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `vl_mfl`
--

DROP TABLE IF EXISTS `vl_mfl`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `vl_mfl` (
  `ID` int(11) NOT NULL AUTO_INCREMENT,
  `Code` varchar(40) DEFAULT NULL,
  `Name` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`ID`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `vl_mfl`
--

LOCK TABLES `vl_mfl` WRITE;
/*!40000 ALTER TABLE `vl_mfl` DISABLE KEYS */;
INSERT INTO `vl_mfl` VALUES (1,'001','Test');
/*!40000 ALTER TABLE `vl_mfl` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `vl_platform`
--

DROP TABLE IF EXISTS `vl_platform`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `vl_platform` (
  `ID` int(11) NOT NULL AUTO_INCREMENT,
  `PlatformName` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`ID`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `vl_platform`
--

LOCK TABLES `vl_platform` WRITE;
/*!40000 ALTER TABLE `vl_platform` DISABLE KEYS */;
INSERT INTO `vl_platform` VALUES (1,'Roche CAP/CTM'),(2,'Roche C8800'),(3,'Roche 4800'),(4,'Abbott m2000');
/*!40000 ALTER TABLE `vl_platform` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `vl_scheme`
--

DROP TABLE IF EXISTS `vl_scheme`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `vl_scheme` (
  `ID` int(11) NOT NULL AUTO_INCREMENT,
  `SchemeName` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`ID`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `vl_scheme`
--

LOCK TABLES `vl_scheme` WRITE;
/*!40000 ALTER TABLE `vl_scheme` DISABLE KEYS */;
INSERT INTO `vl_scheme` VALUES (1,'Viral Load'),(2,'EID');
/*!40000 ALTER TABLE `vl_scheme` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Dumping events for database 'eanalyze'
--

--
-- Dumping routines for database 'eanalyze'
--
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2017-04-04  7:52:22

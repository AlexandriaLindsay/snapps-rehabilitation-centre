-- MySQL dump 10.13  Distrib 5.5.46, for debian-linux-gnu (x86_64)
--
-- Host: localhost    Database: capstone_alex
-- ------------------------------------------------------
-- Server version	5.5.46-0ubuntu0.14.04.2

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
-- Table structure for table `customers`
--

DROP TABLE IF EXISTS `customers`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `customers` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `first_name` varchar(255) DEFAULT NULL,
  `last_name` varchar(255) DEFAULT NULL,
  `street_1` varchar(255) DEFAULT NULL,
  `street_2` varchar(255) DEFAULT NULL,
  `city` varchar(255) DEFAULT NULL,
  `postal_code` varchar(255) DEFAULT NULL,
  `province` varchar(255) DEFAULT NULL,
  `country` varchar(255) DEFAULT NULL,
  `phone` varchar(255) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `password` varchar(255) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` datetime DEFAULT NULL,
  `deleted` tinyint(1) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=83 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `customers`
--

LOCK TABLES `customers` WRITE;
/*!40000 ALTER TABLE `customers` DISABLE KEYS */;
INSERT INTO `customers` VALUES (82,'Alex','Lindsay','135 rive st','','lorette','r0d 000','manitoba','canada','8767777777','alexxlindsay808@hotmail.com','$2y$10$eN0wCPQCgTK62nYmymJTLOVu0z2Et2NPUWZvgu7KZtwK/lAtuD//e','2017-08-11 22:38:14',NULL,0);
/*!40000 ALTER TABLE `customers` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `line_items`
--

DROP TABLE IF EXISTS `line_items`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `line_items` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `product_id` int(11) DEFAULT NULL,
  `order_id` int(11) DEFAULT NULL,
  `quantity` int(11) DEFAULT NULL,
  `unit_price` decimal(7,2) DEFAULT NULL,
  `product_name` varchar(255) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` datetime DEFAULT NULL,
  `deleted` tinyint(1) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `line_items`
--

LOCK TABLES `line_items` WRITE;
/*!40000 ALTER TABLE `line_items` DISABLE KEYS */;
/*!40000 ALTER TABLE `line_items` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `orders`
--

DROP TABLE IF EXISTS `orders`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `orders` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `customers_id` int(11) DEFAULT NULL,
  `first_name` varchar(255) DEFAULT NULL,
  `last_name` varchar(255) DEFAULT NULL,
  `street_1` varchar(255) DEFAULT NULL,
  `street_2` varchar(255) DEFAULT NULL,
  `city` varchar(255) DEFAULT NULL,
  `postal_code` varchar(255) DEFAULT NULL,
  `province` varchar(255) DEFAULT NULL,
  `country` varchar(255) DEFAULT NULL,
  `phone` varchar(255) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `sub_total` decimal(7,2) DEFAULT NULL,
  `gst` decimal(7,2) DEFAULT NULL,
  `pst` decimal(7,2) DEFAULT NULL,
  `total` decimal(7,2) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` datetime DEFAULT NULL,
  `deleted` tinyint(1) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `orders`
--

LOCK TABLES `orders` WRITE;
/*!40000 ALTER TABLE `orders` DISABLE KEYS */;
/*!40000 ALTER TABLE `orders` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `products`
--

DROP TABLE IF EXISTS `products`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `products` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `sku` varchar(255) DEFAULT NULL,
  `name` varchar(255) DEFAULT NULL,
  `short_description` varchar(255) DEFAULT NULL,
  `long_description` varchar(255) DEFAULT NULL,
  `image` varchar(255) DEFAULT NULL,
  `price` decimal(7,2) DEFAULT NULL,
  `cost` decimal(7,2) DEFAULT NULL,
  `shipping_cost` decimal(7,2) DEFAULT NULL,
  `shipping_weight` float DEFAULT NULL,
  `product_dimensions` varchar(255) DEFAULT NULL,
  `discount` int(11) DEFAULT NULL,
  `availibility` tinyint(1) DEFAULT NULL,
  `quantity` int(11) DEFAULT NULL,
  `quantity_sold` int(11) DEFAULT NULL,
  `supplier` varchar(255) DEFAULT NULL,
  `category` varchar(255) DEFAULT NULL,
  `brand` varchar(255) DEFAULT NULL,
  `upc` int(11) DEFAULT NULL,
  `rating` int(11) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` datetime DEFAULT NULL,
  `deleted` tinyint(1) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=21 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `products`
--

LOCK TABLES `products` WRITE;
INSERT INTO `products` VALUES (1,'HD79JLS','Freeze Dried Crickets','Curabitur porta in eros sed mattis. Lorem ipsum dolor sit amet, consectetur adipiscing elit. Integer sed justo nec felis bibendum elementum id et leo. Nullam id dictum nisl. Etiam laoreet fringilla ex, sit amet interdum','Etiam at dignissim augue. Etiam at auctor metus. Morbi sollicitudin semper ultricies. Donec vitae lectus sed ante sollicitudin bibendum. Cras consectetur dolor a neque consequat consequat. Vestibulum vel massa eu sem finibus varius ac sit amet libero. Ves','freeze-dried-crickets-flukers.jpg',8.99,5.99,9.99,50.5,'5 x 6 x 2',0,0,10,5,'turtles R us','food','flukers',2147483647,8,'2017-07-30 03:53:51',NULL,0),(2,'A379JLS','Turtle Shorts','Curabitur porta in eros sed mattis. Lorem ipsum dolor sit amet, consectetur adipiscing elit. Integer sed justo nec felis bibendum elementum id et leo. Nullam id dictum nisl. Etiam laoreet fringilla ex, sit amet interdum','Etiam at dignissim augue. Etiam at auctor metus. Morbi sollicitudin semper ultricies. Donec vitae lectus sed ante sollicitudin bibendum. Cras consectetur dolor a neque consequat consequat. Vestibulum vel massa eu sem finibus varius ac sit amet libero. Ves','turtle_shorts.jpg',50.99,2.99,15.99,6.5,'15 x 6 x 4',0,0,30,5,'turtle fash','turtle accessories','franklin',2147483647,10,'2017-07-30 03:53:51',NULL,0),(3,'B37988S','Reptile Waterfall Rock','Curabitur porta in eros sed mattis. Lorem ipsum dolor sit amet, consectetur adipiscing elit. Integer sed justo nec felis bibendum elementum id et leo. Nullam id dictum nisl. Etiam laoreet fringilla ex, sit amet interdum','Etiam at dignissim augue. Etiam at auctor metus. Morbi sollicitudin semper ultricies. Donec vitae lectus sed ante sollicitudin bibendum. Cras consectetur dolor a neque consequat consequat. Vestibulum vel massa eu sem finibus varius ac sit amet libero. Ves','reptile_waterfall_rock.jpg',9.99,8.25,5.99,20.5,'30 x 16 x 8',0,0,10,2,'turtle island','habitat decor','zoo med',2147483647,7,'2017-07-30 03:53:51',NULL,0),(4,'AA8488S','Reptile Terrarium Liner','Curabitur porta in eros sed mattis. Lorem ipsum dolor sit amet, consectetur adipiscing elit. Integer sed justo nec felis bibendum elementum id et leo. Nullam id dictum nisl. Etiam laoreet fringilla ex, sit amet interdum','Etiam at dignissim augue. Etiam at auctor metus. Morbi sollicitudin semper ultricies. Donec vitae lectus sed ante sollicitudin bibendum. Cras consectetur dolor a neque consequat consequat. Vestibulum vel massa eu sem finibus varius ac sit amet libero. Ves','reptile_liner.jpg',5.75,2.25,8.99,10.5,'50 x 17 x 10',0,0,6,1,'turtle island','substrate & beding','zilla',2147483647,9,'2017-07-30 03:53:51',NULL,0),(5,'FKC7500','Day & Night LED Terrarium','Curabitur porta in eros sed mattis. Lorem ipsum dolor sit amet, consectetur adipiscing elit. Integer sed justo nec felis bibendum elementum id et leo. Nullam id dictum nisl. Etiam laoreet fringilla ex, sit amet interdum','Etiam at dignissim augue. Etiam at auctor metus. Morbi sollicitudin semper ultricies. Donec vitae lectus sed ante sollicitudin bibendum. Cras consectetur dolor a neque consequat consequat. Vestibulum vel massa eu sem finibus varius ac sit amet libero. Ves','day_night_led.jpg',4.75,1.25,10.99,19.5,'30 x 22 x 10',0,0,20,15,'tropics Inc.','lights & fixtures','exoterra',2147483647,8,'2017-07-30 03:53:51',NULL,0),(6,'8675D00','Phosphorus Calcium with Vitamin D','Curabitur porta in eros sed mattis. Lorem ipsum dolor sit amet, consectetur adipiscing elit. Integer sed justo nec felis bibendum elementum id et leo. Nullam id dictum nisl. Etiam laoreet fringilla ex, sit amet interdum','Etiam at dignissim augue. Etiam at auctor metus. Morbi sollicitudin semper ultricies. Donec vitae lectus sed ante sollicitudin bibendum. Cras consectetur dolor a neque consequat consequat. Vestibulum vel massa eu sem finibus varius ac sit amet libero. Ves','phosphorus_calcium.jpg',33.99,5.25,15.99,22.5,'8 x 10 x 7',0,0,18,33,'turtles R us','vitamins','repcal',2147483647,3,'2017-07-30 03:53:51',NULL,0),(7,'LCM5D00','Wipe Out Terrarium Cleaner','Curabitur porta in eros sed mattis. Lorem ipsum dolor sit amet, consectetur adipiscing elit. Integer sed justo nec felis bibendum elementum id et leo. Nullam id dictum nisl. Etiam laoreet fringilla ex, sit amet interdum','Etiam at dignissim augue. Etiam at auctor metus. Morbi sollicitudin semper ultricies. Donec vitae lectus sed ante sollicitudin bibendum. Cras consectetur dolor a neque consequat consequat. Vestibulum vel massa eu sem finibus varius ac sit amet libero. Ves','reptile_cleaner.jpg',6.99,2.25,4.99,2.5,'2 x 10 x 17',0,0,50,36,'turtles temple inc.','sanitizers','zoo med',2147483647,9,'2017-07-30 03:53:51',NULL,0),(8,'HDJ79AA','Quad T5 Hood','Curabitur porta in eros sed mattis. Lorem ipsum dolor sit amet, consectetur adipiscing elit. Integer sed justo nec felis bibendum elementum id et leo. Nullam id dictum nisl. Etiam laoreet fringilla ex, sit amet interdum','Etiam at dignissim augue. Etiam at auctor metus. Morbi sollicitudin semper ultricies. Donec vitae lectus sed ante sollicitudin bibendum. Cras consectetur dolor a neque consequat consequat. Vestibulum vel massa eu sem finibus varius ac sit amet libero. Ves','quad_t5_hood.jpg',16.75,6.50,7.99,10.5,'2 x 11 x 6',0,0,10,6,'tropics inc.','heaters','aqua sun',2147483647,7,'2017-07-30 03:53:51',NULL,0),(9,'HJJJ9AA','Turtle Tub Kit','Curabitur porta in eros sed mattis. Lorem ipsum dolor sit amet, consectetur adipiscing elit. Integer sed justo nec felis bibendum elementum id et leo. Nullam id dictum nisl. Etiam laoreet fringilla ex, sit amet interdum','Etiam at dignissim augue. Etiam at auctor metus. Morbi sollicitudin semper ultricies. Donec vitae lectus sed ante sollicitudin bibendum. Cras consectetur dolor a neque consequat consequat. Vestibulum vel massa eu sem finibus varius ac sit amet libero. Ves','turtle_tub.jpg',8.75,1.50,5.50,50.5,'30 x 12 x 18',0,0,16,5,'turtles R us','terrariums','zoo med',2147483647,10,'2017-07-30 03:53:51',NULL,0),(10,'KDOF888','Tortoise Playpen','Curabitur porta in eros sed mattis. Lorem ipsum dolor sit amet, consectetur adipiscing elit. Integer sed justo nec felis bibendum elementum id et leo. Nullam id dictum nisl. Etiam laoreet fringilla ex, sit amet interdum','Etiam at dignissim augue. Etiam at auctor metus. Morbi sollicitudin semper ultricies. Donec vitae lectus sed ante sollicitudin bibendum. Cras consectetur dolor a neque consequat consequat. Vestibulum vel massa eu sem finibus varius ac sit amet libero. Ves','tortoise_playpen.jpg',24.99,10.50,4.30,8.5,'10 x 8 x 4',0,0,22,2,'turtle island','terrariums','zoo med',2147483647,6,'2017-07-30 03:53:51',NULL,0),(11,'8475HSV','Fortified Turtle Food','Curabitur porta in eros sed mattis. Lorem ipsum dolor sit amet, consectetur adipiscing elit. Integer sed justo nec felis bibendum elementum id et leo. Nullam id dictum nisl. Etiam laoreet fringilla ex, sit amet interdum','Etiam at dignissim augue. Etiam at auctor metus. Morbi sollicitudin semper ultricies. Donec vitae lectus sed ante sollicitudin bibendum. Cras consectetur dolor a neque consequat consequat. Vestibulum vel massa eu sem finibus varius ac sit amet libero. Ves','fortified_turtle_food.jpg',13.85,12.50,9.30,12.8,'18 x 8 x 4',0,0,8,2,'turtle island','food','zilla',2147483647,5,'2017-07-30 03:53:51',NULL,0),(12,'NMB957B','Dripper Reptile Plant','Curabitur porta in eros sed mattis. Lorem ipsum dolor sit amet, consectetur adipiscing elit. Integer sed justo nec felis bibendum elementum id et leo. Nullam id dictum nisl. Etiam laoreet fringilla ex, sit amet interdum','Etiam at dignissim augue. Etiam at auctor metus. Morbi sollicitudin semper ultricies. Donec vitae lectus sed ante sollicitudin bibendum. Cras consectetur dolor a neque consequat consequat. Vestibulum vel massa eu sem finibus varius ac sit amet libero. Ves','dripper_reptile_plant.jpg',6.50,2.50,9.30,4.5,'5 x 4 x 2',0,0,30,26,'turtles temple','habitat & decor','aqua sun',2147483647,7,'2017-07-30 03:53:51',NULL,0),(13,'MMM98DD','ReptiTemp 500R Thermostat','Curabitur porta in eros sed mattis. Lorem ipsum dolor sit amet, consectetur adipiscing elit. Integer sed justo nec felis bibendum elementum id et leo. Nullam id dictum nisl. Etiam laoreet fringilla ex, sit amet interdum','Etiam at dignissim augue. Etiam at auctor metus. Morbi sollicitudin semper ultricies. Donec vitae lectus sed ante sollicitudin bibendum. Cras consectetur dolor a neque consequat consequat. Vestibulum vel massa eu sem finibus varius ac sit amet libero. Ves','reptitemp.jpg',16.50,8.25,8.50,14.5,'15 x 24 x 12',0,0,21,26,'tropics inc.','humidity & temperature control','aqua sun',2147483647,9,'2017-07-30 03:53:51',NULL,0),(14,'LM05844','Pinkie Frozen Mice','Curabitur porta in eros sed mattis. Lorem ipsum dolor sit amet, consectetur adipiscing elit. Integer sed justo nec felis bibendum elementum id et leo. Nullam id dictum nisl. Etiam laoreet fringilla ex, sit amet interdum','Etiam at dignissim augue. Etiam at auctor metus. Morbi sollicitudin semper ultricies. Donec vitae lectus sed ante sollicitudin bibendum. Cras consectetur dolor a neque consequat consequat. Vestibulum vel massa eu sem finibus varius ac sit amet libero. Ves','frozen_pinkies.jpg',4.99,0.25,6.99,1.5,'1 x 2 x 2',0,0,55,40,'reptile forium.','food','arctic',2147483647,10,'2017-07-30 03:53:51',NULL,0),(15,'LM05844','Can O Snails','Curabitur porta in eros sed mattis. Lorem ipsum dolor sit amet, consectetur adipiscing elit. Integer sed justo nec felis bibendum elementum id et leo. Nullam id dictum nisl. Etiam laoreet fringilla ex, sit amet interdum','Etiam at dignissim augue. Etiam at auctor metus. Morbi sollicitudin semper ultricies. Donec vitae lectus sed ante sollicitudin bibendum. Cras consectetur dolor a neque consequat consequat. Vestibulum vel massa eu sem finibus varius ac sit amet libero. Ves','can_o_snail.jpg',7.99,0.25,6.99,1.5,'1 x 2 x 2',0,0,60,20,'reptile forium.','food','zoo med',2147483647,10,'2017-07-30 03:53:51',NULL,0),(16,'PPO900K','Reptile Terrarim Background','Curabitur porta in eros sed mattis. Lorem ipsum dolor sit amet, consectetur adipiscing elit. Integer sed justo nec felis bibendum elementum id et leo. Nullam id dictum nisl. Etiam laoreet fringilla ex, sit amet interdum','Etiam at dignissim augue. Etiam at auctor metus. Morbi sollicitudin semper ultricies. Donec vitae lectus sed ante sollicitudin bibendum. Cras consectetur dolor a neque consequat consequat. Vestibulum vel massa eu sem finibus varius ac sit amet libero. Ves','terrarium_background.jpg',17.99,6.25,8.99,11.5,'12 x 16 x 5',0,0,20,26,'turtles temple.','habitat & decor','repti sun',2147483647,7,'2017-07-30 03:53:51',NULL,0),(17,'345745F','Vitamin D3 Indoor Supplement','Curabitur porta in eros sed mattis. Lorem ipsum dolor sit amet, consectetur adipiscing elit. Integer sed justo nec felis bibendum elementum id et leo. Nullam id dictum nisl. Etiam laoreet fringilla ex, sit amet interdum','Etiam at dignissim augue. Etiam at auctor metus. Morbi sollicitudin semper ultricies. Donec vitae lectus sed ante sollicitudin bibendum. Cras consectetur dolor a neque consequat consequat. Vestibulum vel massa eu sem finibus varius ac sit amet libero. Ves','indoor_supplement.jpg',27.99,10.25,10.99,19.5,'8 x 2 x 4',0,0,11,4,'turtles R us.','vitamins & supplements','all living things',2147483647,7,'2017-07-30 03:53:51',NULL,0),(18,'XXXACDS','5.0 UVB Reptile Lamp','Curabitur porta in eros sed mattis. Lorem ipsum dolor sit amet, consectetur adipiscing elit. Integer sed justo nec felis bibendum elementum id et leo. Nullam id dictum nisl. Etiam laoreet fringilla ex, sit amet interdum','Etiam at dignissim augue. Etiam at auctor metus. Morbi sollicitudin semper ultricies. Donec vitae lectus sed ante sollicitudin bibendum. Cras consectetur dolor a neque consequat consequat. Vestibulum vel massa eu sem finibus varius ac sit amet libero. Ves','uvb_lamp.jpg',7.99,1.25,7.99,22.5,'28 x 12 x 9',0,0,19,34,'turtles R us.','light fixtures','repti sun',2147483647,6,'2017-07-30 03:53:51',NULL,0),(19,'CVGF6HH','Calcium Supplement Powder','Curabitur porta in eros sed mattis. Lorem ipsum dolor sit amet, consectetur adipiscing elit. Integer sed justo nec felis bibendum elementum id et leo. Nullam id dictum nisl. Etiam laoreet fringilla ex, sit amet interdum','Etiam at dignissim augue. Etiam at auctor metus. Morbi sollicitudin semper ultricies. Donec vitae lectus sed ante sollicitudin bibendum. Cras consectetur dolor a neque consequat consequat. Vestibulum vel massa eu sem finibus varius ac sit amet libero. Ves','calcium_powder.jpg',17.99,10.25,9.99,14.5,'9 x 12 x 6',0,0,44,54,'turtle island.','vitamins & supplements','repcal',2147483647,8,'2017-07-30 03:53:51',NULL,0),(20,'JKHJ889','Reptile Screen Cover','Curabitur porta in eros sed mattis. Lorem ipsum dolor sit amet, consectetur adipiscing elit. Integer sed justo nec felis bibendum elementum id et leo. Nullam id dictum nisl. Etiam laoreet fringilla ex, sit amet interdum','Etiam at dignissim augue. Etiam at auctor metus. Morbi sollicitudin semper ultricies. Donec vitae lectus sed ante sollicitudin bibendum. Cras consectetur dolor a neque consequat consequat. Vestibulum vel massa eu sem finibus varius ac sit amet libero. Ves','screen_cover.jpg',37.99,12.25,9.99,24.5,'19 x 15 x 16',0,0,14,34,'tropics inc.','accessories','zilla',2147483647,8,'2017-07-30 03:53:51',NULL,0);
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2017-08-15  4:16:24

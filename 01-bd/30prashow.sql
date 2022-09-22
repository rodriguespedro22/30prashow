CREATE DATABASE  IF NOT EXISTS `30prashow` /*!40100 DEFAULT CHARACTER SET utf8 */;
USE `30prashow`;
-- MySQL dump 10.13  Distrib 5.7.38, for Win64 (x86_64)
--
-- Host: 127.0.0.1    Database: 30prashow
-- ------------------------------------------------------
-- Server version	5.5.5-10.4.24-MariaDB

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
-- Table structure for table `addresses`
--

DROP TABLE IF EXISTS `addresses`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `addresses` (
                             `id` int(11) NOT NULL AUTO_INCREMENT,
                             `street` varchar(45) NOT NULL,
                             `number` varchar(45) NOT NULL,
                             `complement` varchar(45) NOT NULL,
                             `city` varchar(45) NOT NULL,
                             `state` varchar(45) NOT NULL,
                             `zipCode` varchar(45) NOT NULL,
                             `idUser` int(11) NOT NULL,
                             `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
                             `udated_at` timestamp NULL DEFAULT NULL ON UPDATE current_timestamp(),
                             PRIMARY KEY (`id`),
                             KEY `fk_addresses_users_idx` (`idUser`),
                             CONSTRAINT `fk_addresses_users` FOREIGN KEY (`idUser`) REFERENCES `users` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `addresses`
--

LOCK TABLES `addresses` WRITE;
/*!40000 ALTER TABLE `addresses` DISABLE KEYS */;
/*!40000 ALTER TABLE `addresses` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `authors`
--

DROP TABLE IF EXISTS `authors`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `authors` (
                           `id` int(11) NOT NULL AUTO_INCREMENT,
                           `school` varchar(255) NOT NULL,
                           `idUser` int(11) NOT NULL,
                           PRIMARY KEY (`id`),
                           KEY `fk_authors_users1_idx` (`idUser`),
                           CONSTRAINT `fk_authors_users1` FOREIGN KEY (`idUser`) REFERENCES `users` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `authors`
--

LOCK TABLES `authors` WRITE;
/*!40000 ALTER TABLE `authors` DISABLE KEYS */;
INSERT INTO `authors` VALUES (1,'Charqueadas',2);
/*!40000 ALTER TABLE `authors` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `evaluates_show`
--

DROP TABLE IF EXISTS `evaluates_show`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `evaluates_show` (
                                     `id` int(11) NOT NULL AUTO_INCREMENT,
                                     `idEvaluators` int(11) NOT NULL,
                                     `idShows` int(11) NOT NULL,
                                     PRIMARY KEY (`id`),
                                     KEY `fk_evaluators_has_shows_shows1_idx` (`idShows`),
                                     KEY `fk_evaluators_has_shows_evaluators1_idx` (`idEvaluators`),
                                     CONSTRAINT `fk_evaluators_has_shows_evaluators1` FOREIGN KEY (`idEvaluators`) REFERENCES `evaluators` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
                                     CONSTRAINT `fk_evaluators_has_shows_shows1` FOREIGN KEY (`idShows`) REFERENCES `shows` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `evaluates_show`
--

LOCK TABLES `evaluates_show` WRITE;
/*!40000 ALTER TABLE `evaluates_show` DISABLE KEYS */;
/*!40000 ALTER TABLE `evaluates_show` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `evaluators`
--

DROP TABLE IF EXISTS `evaluators`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `evaluators` (
                              `id` int(11) NOT NULL AUTO_INCREMENT,
                              `linkLattes` varchar(255) NOT NULL,
                              `idUser` int(11) NOT NULL,
                              PRIMARY KEY (`id`),
                              KEY `fk_evaluators_users1_idx` (`idUser`),
                              CONSTRAINT `fk_evaluators_users1` FOREIGN KEY (`idUser`) REFERENCES `users` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `evaluators`
--

LOCK TABLES `evaluators` WRITE;
/*!40000 ALTER TABLE `evaluators` DISABLE KEYS */;
INSERT INTO `evaluators` VALUES (1,'lLink lattes',3);
/*!40000 ALTER TABLE `evaluators` ENABLE KEYS */;

UNLOCK TABLES;


DROP TABLE IF EXISTS `singers-categories`;
/*!40101 SET @saved_cs_client     = @@character_set_client*/;
/*!40101 SET character_set_client = utf8*/;
CREATE TABLE `singers-categories` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `singers` varchar(255) NOT NULL,
PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=12 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client*/;
--
-- Dumping data for table `singers-categories`
--

LOCK TABLES `singers-categories` WRITE;
/*!40000 ALTER TABLE `singers-categories` DISABLE KEYS*/;
INSERT INTO `singers-categories` VALUES (1,'Matue'),
                                        (2,'Teto'),
                                        (3,'Wiu');
/*!40000 ALTER TABLE `singers-categories` ENABLE KEYS*/;
UNLOCK TABLES;

--
-- Table structure for table `shows`
--

DROP TABLE IF EXISTS `shows`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `shows` (
                           `id` int(11) NOT NULL AUTO_INCREMENT,
                           `day` date,
                           `name` varchar(100) NOT NULL,
                           `local` varchar(100) NOT NULL,
                           `image` varchar(300) NOT NULL,
                           `idCategory` int(11) NOT NULL,
                           `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
                           `updated_at` timestamp NULL DEFAULT NULL ON UPDATE current_timestamp(),
                            PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=15 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `shows`
--

LOCK TABLES `shows` WRITE;
/*!40000 ALTER TABLE `shows` DISABLE KEYS */;
INSERT INTO `shows` VALUES  (1,'20-05-2023', 'Show do Matue','Porto Alegre RS - Pepsi', 'https://i0.wp.com/www.picsphotopress.com/wp-content/uploads/2022/04/20220404119271.jpeg?resize=600%2C337&ssl=1', 1, '2022-09-20 17:43:50', NULL), 
                            (2,'03-07-2023', 'Show do Teto', 'Festa do Branco', 'https://images.sympla.com.br/6267082772801-xs.jpg',2, '2022-09-20 18:39:23', NULL),
                            (3,'09-04-2023', 'Show do Teto', 'Palazzo Lounge Bar', 'https://d106p58duwuiz5.cloudfront.net/event/cover/595e6ca8ab9394fae1c8a58cca6b0726.jpg',2, '2022-09-20 18:39:23', NULL),
                            (4,'09-04-2023', 'Show do Teto', 'Charqueadas - Tiradentes', 'https://d106p58duwuiz5.cloudfront.net/event/cover/595e6ca8ab9394fae1c8a58cca6b0726.jpg',2, '2022-09-20 18:39:23', NULL),
                            (5,'09-04-2023', 'Show do Teto', 'Charqueadas - Tiradentes', 'https://d106p58duwuiz5.cloudfront.net/event/cover/595e6ca8ab9394fae1c8a58cca6b0726.jpg',2, '2022-09-20 18:39:23', NULL),
                            (6,'09-04-2023', 'Show do Teto', 'Charqueadas - Tiradentes', 'https://d106p58duwuiz5.cloudfront.net/event/cover/595e6ca8ab9394fae1c8a58cca6b0726.jpg',2, '2022-09-20 18:39:23', NULL);
/*!40000 ALTER TABLE `shows` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `users`
--

DROP TABLE IF EXISTS `users`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `users` (
                         `id` int(11) NOT NULL AUTO_INCREMENT,
                         `name` varchar(45) NOT NULL,
                         `email` varchar(45) NOT NULL,
                         `password` varchar(255) NOT NULL,
                         `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
                         `updated_at` timestamp NULL DEFAULT NULL ON UPDATE current_timestamp(),
                         PRIMARY KEY (`id`),
                         UNIQUE KEY `email_UNIQUE` (`email`)
) ENGINE=InnoDB AUTO_INCREMENT=35 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `users`
--

LOCK TABLES `users` WRITE;
/*!40000 ALTER TABLE `users` DISABLE KEYS */;
INSERT INTO `users` VALUES (1,'Pedro','pedro@gmail.com','1234','2022-09-20 22:43:59',NULL);
/*!40000 ALTER TABLE `users` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `write_show`
--

DROP TABLE IF EXISTS `write_show`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `write_show` (
                                 `id` int(11) NOT NULL AUTO_INCREMENT,
                                 `idAuthors` int(11) NOT NULL,
                                 `idShows` int(11) NOT NULL,
                                 PRIMARY KEY (`id`),
                                 KEY `fk_authors_has_shows_shows1_idx` (`idShows`),
                                 KEY `fk_authors_has_shows_authors1_idx` (`idAuthors`),
                                 CONSTRAINT `fk_authors_has_shows_authors1` FOREIGN KEY (`idAuthors`) REFERENCES `authors` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
                                 CONSTRAINT `fk_authors_has_shows_shows1` FOREIGN KEY (`idShows`) REFERENCES `shows` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `write_show`
--

LOCK TABLES `write_show` WRITE;
/*!40000 ALTER TABLE `write_show` DISABLE KEYS */;
/*!40000 ALTER TABLE `write_show` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Dumping events for database '30prashow'
--

--
-- Dumping routines for database '30prashow'
--
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2022-08-26  8:34:56
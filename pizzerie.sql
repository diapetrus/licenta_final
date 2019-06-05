-- MySQL dump 10.13  Distrib 5.7.25, for osx10.14 (x86_64)
--
-- Host: localhost    Database: pizza
-- ------------------------------------------------------
-- Server version	5.7.25

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
-- Table structure for table `history`
--

DROP TABLE IF EXISTS `history`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `history` (
  `idh` int(11) NOT NULL AUTO_INCREMENT,
  `idu` int(11) NOT NULL,
  `totalprice` double NOT NULL,
  `date` date NOT NULL,
  PRIMARY KEY (`idh`)
) ENGINE=InnoDB AUTO_INCREMENT=57 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `history`
--

LOCK TABLES `history` WRITE;
/*!40000 ALTER TABLE `history` DISABLE KEYS */;
INSERT INTO `history` VALUES (54,1,89.7,'2019-06-04'),(55,1,163.5,'2019-06-04'),(56,1,98.7,'2019-06-04');
/*!40000 ALTER TABLE `history` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `history_products`
--

DROP TABLE IF EXISTS `history_products`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `history_products` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `idp` int(11) DEFAULT NULL,
  `idh` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `idp_idx` (`idp`),
  KEY `idh_idx` (`idh`),
  CONSTRAINT `idh` FOREIGN KEY (`idh`) REFERENCES `history` (`idh`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `idp` FOREIGN KEY (`idp`) REFERENCES `pizza` (`idp`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB AUTO_INCREMENT=28 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `history_products`
--

LOCK TABLES `history_products` WRITE;
/*!40000 ALTER TABLE `history_products` DISABLE KEYS */;
INSERT INTO `history_products` VALUES (17,1,54),(18,2,54),(19,3,54),(20,7,55),(21,8,55),(22,10,55),(23,10,55),(24,10,55),(25,10,56),(26,10,56),(27,10,56);
/*!40000 ALTER TABLE `history_products` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `pizza`
--

DROP TABLE IF EXISTS `pizza`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `pizza` (
  `idp` int(11) NOT NULL AUTO_INCREMENT,
  `titlep` varchar(100) NOT NULL,
  `describep` varchar(1000) NOT NULL,
  `imagep` varchar(256) NOT NULL,
  `pricep` float NOT NULL,
  PRIMARY KEY (`idp`)
) ENGINE=InnoDB AUTO_INCREMENT=40 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `pizza`
--

LOCK TABLES `pizza` WRITE;
/*!40000 ALTER TABLE `pizza` DISABLE KEYS */;
INSERT INTO `pizza` VALUES (1,'Margherita','Sos de rosii, mozzarella','/images/margerita.jpg',24.9),(2,'Prosciutto cotto','Sos de rosii, sunca, mozzarella','/images/proscitto cotto.jpg',29.9),(3,'Prosciutto funghi','Sos de rosii, sunca, ciuperci, mozzarella','/images/prosciutto funghi.jpeg',34.9),(4,'Cannibale','Sos de rosii, salam, sunca, cremvursti, cabanos, mozzarella','/images/Canibale.png',36.9),(5,'Salame','Sos de rosii, salam, mozzarella','/images/salami.jpg',29.9),(6,'Quattro stagioni','Sos de rosii, salam, sunca, ciuperci, ardei, mozzarella','/images/quatro stagioni.jpg',35.9),(7,'Pepperoni','Sos de rosii, salam picant, ardei iue, mozzarella','/images/pepperoni.jpg',29.9),(8,'Mexicana','Sos de rosii, sunca, fasole, ardei iute, porumb, mozzarella','/images/mexicana.jpg',34.9),(9,'Tonno e cipolla','Sos de rosii, ceapa, ton, rosii, masline, mozzarella','/images/tonno.jpg',28.9),(10,'Diavolo','Sos de rosii, salam, salam picant, ardei iute, mozzarella','/images/diavolo.jpg',32.9),(11,'Americana','Sos de rosii, cremvursti, cartofi prajiti, mozzarella','/images/americana.jpg',29.9),(12,'Hawaii','Sos de rosii, sunca, ananas, mozzarella','/images/hawaii.jpg',31.9),(13,'Safari','Sos de rosii, ciuperci, sunca de pui, ardei, mozzarella','/images/safari.jpg',31.9),(14,'Al pollo','Sos de rosii, piept de pui, ardei, masline, mozzarella','/images/polo.jpg',31.9),(15,'Funghi','Sos de rosii, ciuperci, mozzarella','/images/funghi.jpg',27.9),(16,'Bismark','Sos de rosii, ceapa, sunca, ou, mozzarella','/images/bismark.png',31.9),(17,'Quatro formaggi','Sos de rosii, cascaval, gorgonzola, cas afumat, mozzarella','/images/formagi.jpg',32.9),(18,'Vegetariana','Sos de rosii, ciuperci, ceapa, ardei, mazare, porumb, rosii, masline, mozzarella','/images/vegetariana.jpg',31.9),(19,'Prociutto crudo','Sos de rosii, prosciutto, mozzarella','/images/crudo.jpg',33.9),(20,'Pizza de post','Sos de rosii, ciuperci, ceapa, ardei, mazare, porumb, rosii, masline','/images/post.jpg',26.9),(21,'Carbonara','Smantana cu usturoi, sunca, bancon, ciuperci, parmesan, mozzarella','/images/carbonara.jpg',35.9),(22,'Callzone','Sos de rosii, sunca, ciuperci, cabanos, mozzarella','/images/calzone.jpg',32.9),(23,'Capriciosa','Sos de rosii, ciuperci, sunca, porumb, masline, mozzarella','/images/capriciosa.jpg',34.9),(24,'Romana','Sos de rosii, salam picant, ciuperci, masline, mozzarella','/images/romana.jpg',33.9),(25,'Siciliana','Sos de rosii, bacon, ciuperci, masline, mozzarella','/images/siciliana.jpg',32.9),(26,'Acapulco','Sos de rosii, sunca, ciuperci, bacon, carnati taranesti, ardei, rosii, mozzarella','/images/acapulco.jpg',37.9),(27,'Napoli','Sos, file anchois, ceapa, capere, masline, mozzarella','/images/napoli.jpg',33.9),(28,'Sole mio','Sos de rosii, sunca, salam, carnati taranesti, ciuperci, masline, ou, mozzarella','/images/sole.jpg',36.9),(29,'Crudo e gorgonzola','Sos de rosii, gorgonzola, prosciutto crudo, rosii, mozzarella','/images/crudog.jpg',36.9),(30,'Mare e monti','Sos de rosii, fructe de mare, masline, mozzarella','/images/mare.jpg',36.9),(31,'Bresaola','Sos de rosii, pastrama de vita, rucola, parmesan, mozzarella','/images/bresaola.jpg',35.9),(32,'Carnivora','Sos de rosii, salam, sunca, bacon, carnati taranesti, ardei, masline, mozzarella','/images/carnivora.jpg',38.9),(33,'Paesana','Sos de rosii, bacon, carnati taranesti, ceapa, mozzarella','/images/paesana.jpg',34.9),(34,'Rustica','Sos de rosii, bacon, porumb, ciuperci, mozzarella','/images/rustica.jpg',33.9),(35,'Ginos','Sos de rosii, salam, sunca, cabanos, bacon, spanac, broccoli, masline, mozzarella','/images/ginos.jpg',40.9),(36,'Verdure','Sos de rosii, anghinare, dovlecel, ciuperci, rosii, spanac, broccoli, masline, mozzarella','/images/verdure.jpg',32.9),(37,'Spinaci','Sos de rosii, bancon, spanac, ou, mozzarella','/images/spinaci.jpg',34.9),(38,'Calabrese','Sos de rosii, bacon, anghinare, gorgonzola, masline, mozzarella','/images/calabrese.jpg',34.9),(39,'Ortolana','Sos de rosii, sunca, bancon, anghinare, dovlecel, broccoli, masline, mozzarella','/images/ortolana.jpg',36.9);
/*!40000 ALTER TABLE `pizza` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `users`
--

DROP TABLE IF EXISTS `users`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `users` (
  `idu` int(11) NOT NULL AUTO_INCREMENT,
  `email` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL,
  `address` varchar(100) NOT NULL,
  `phone` varchar(13) NOT NULL,
  `points` varchar(100) NOT NULL,
  PRIMARY KEY (`idu`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `users`
--

LOCK TABLES `users` WRITE;
/*!40000 ALTER TABLE `users` DISABLE KEYS */;
INSERT INTO `users` VALUES (1,'dianapetrus13081997@gmail.com','df4a6da2e566d941e65a2652d7ec7752','str. Corneliu Coposu nr. 36A','0741936484',''),(2,'dya_rock97@yahoo.com','38eb03c69a2b6fd2cb73673799c92680','lala','0788999333','');
/*!40000 ALTER TABLE `users` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2019-06-05 11:34:58

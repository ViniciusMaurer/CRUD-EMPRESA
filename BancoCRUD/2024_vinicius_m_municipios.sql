-- MySQL dump 10.13  Distrib 8.0.36, for Win64 (x86_64)
--
-- Host: 192.168.20.2    Database: 2024_vinicius_m
-- ------------------------------------------------------
-- Server version	8.0.39-0ubuntu0.24.04.2

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!50503 SET NAMES utf8 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;

--
-- Table structure for table `municipios`
--

DROP TABLE IF EXISTS `municipios`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `municipios` (
  `idCidade` int NOT NULL AUTO_INCREMENT,
  `cidade` varchar(100) CHARACTER SET utf8mb3 COLLATE utf8mb3_bin NOT NULL,
  `uf` char(2) CHARACTER SET utf8mb3 COLLATE utf8mb3_bin DEFAULT 'RS',
  PRIMARY KEY (`idCidade`)
) ENGINE=InnoDB AUTO_INCREMENT=82 DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_bin;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `municipios`
--

LOCK TABLES `municipios` WRITE;
/*!40000 ALTER TABLE `municipios` DISABLE KEYS */;
INSERT INTO `municipios` VALUES (2,'Presidente','PR'),(3,'Dois Irmãos','RS'),(4,'Estância Velha','SC'),(16,'Rio de Janeiro','RJ'),(17,'Pentecoste','CE'),(18,'Novo Hamburgo','RS'),(19,'São Paulo','SP'),(24,'Dois Primos','RS'),(26,'Sergipe','CE'),(27,'Campinas','SP'),(28,'Rio de Janeiro','RJ'),(29,'Presidente Lucena','RS'),(30,'Porto Alegre','RS'),(31,'Caxias do Sul','RS'),(32,'Pelotas','RS'),(33,'Canoas','RS'),(34,'Santa Maria','RS'),(35,'Gravataí','RS'),(36,'Viamão','RS'),(37,'Novo Hamburgo','RS'),(38,'São Leopoldo','RS'),(39,'Rio Grande','RS'),(40,'Alvorada','RS'),(41,'Passo Fundo','RS'),(42,'Sapucaia do Sul','RS'),(43,'Uruguaiana','RS'),(44,'Santa Cruz do Sul','RS'),(45,'Bagé','RS'),(46,'Bento Gonçalves','RS'),(47,'Erechim','RS'),(48,'Guaíba','RS'),(49,'Santana do Livramento','RS'),(50,'Cachoeirinha','RS'),(51,'Alegrete','RS'),(52,'Ijuí','RS'),(53,'Farroupilha','RS'),(54,'São Borja','RS'),(55,'Lajeado','RS'),(56,'Esteio','RS'),(57,'Cachoeira do Sul','RS'),(58,'Venâncio Aires','RS'),(59,'São Gabriel','RS'),(60,'Tramandaí','RS'),(61,'Taquara','RS'),(62,'Carazinho','RS'),(63,'Dom Pedrito','RS'),(64,'Frederico Westphalen','RS'),(65,'Parobé','RS'),(66,'Itaqui','RS'),(67,'Camaquã','RS'),(68,'Quaraí','RS'),(69,'Capão da Canoa','RS'),(70,'São Lourenço do Sul','RS'),(71,'Vacaria','RS'),(72,'Torres','RS'),(73,'Santo Ângelo','RS'),(74,'Osório','RS'),(75,'Rosário do Sul','RS'),(76,'Sapiranga','RS'),(77,'Marau','RS'),(78,'Soledade','RS'),(79,'Santiago','RS'),(80,'Ceara','CE'),(81,'Um teste','UM');
/*!40000 ALTER TABLE `municipios` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2024-10-31 13:56:01

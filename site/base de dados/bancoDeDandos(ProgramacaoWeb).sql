CREATE DATABASE  IF NOT EXISTS `projeto_programacao` /*!40100 DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci */ /*!80016 DEFAULT ENCRYPTION='N' */;
USE `projeto_programacao`;
-- MySQL dump 10.13  Distrib 8.0.34, for Win64 (x86_64)
--
-- Host: localhost    Database: projeto_programacao
-- ------------------------------------------------------
-- Server version	8.0.35

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
-- Table structure for table `detalhes_encomenda`
--

DROP TABLE IF EXISTS `detalhes_encomenda`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `detalhes_encomenda` (
  `idDetalheEncomenda` int NOT NULL AUTO_INCREMENT,
  `idEncomenda` int DEFAULT NULL,
  `idProduto` int DEFAULT NULL,
  `quantidade` int DEFAULT NULL,
  PRIMARY KEY (`idDetalheEncomenda`),
  KEY `idEncomenda` (`idEncomenda`),
  KEY `idProduto` (`idProduto`),
  CONSTRAINT `detalhes_encomenda_ibfk_1` FOREIGN KEY (`idEncomenda`) REFERENCES `encomendas` (`idEncomenda`),
  CONSTRAINT `detalhes_encomenda_ibfk_2` FOREIGN KEY (`idProduto`) REFERENCES `produtos` (`idProduto`)
) ENGINE=InnoDB AUTO_INCREMENT=15 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `detalhes_encomenda`
--

LOCK TABLES `detalhes_encomenda` WRITE;
/*!40000 ALTER TABLE `detalhes_encomenda` DISABLE KEYS */;
INSERT INTO `detalhes_encomenda` VALUES (1,1,1,100),(2,1,1,1200),(3,1,2,200),(4,2,1,5000),(7,5,12,2000),(8,6,8,4000),(9,7,5,1000),(10,8,12,500),(11,9,18,500),(12,13,9,4000),(13,6,16,1000);
/*!40000 ALTER TABLE `detalhes_encomenda` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `encomendas`
--

DROP TABLE IF EXISTS `encomendas`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `encomendas` (
  `idEncomenda` int NOT NULL AUTO_INCREMENT,
  `idFornecedor` int DEFAULT NULL,
  `dataEncomenda` date DEFAULT NULL,
  `horaChegada` time DEFAULT NULL,
  PRIMARY KEY (`idEncomenda`),
  KEY `idFornecedor` (`idFornecedor`),
  CONSTRAINT `encomendas_ibfk_1` FOREIGN KEY (`idFornecedor`) REFERENCES `fornecedores` (`idFornecedor`)
) ENGINE=InnoDB AUTO_INCREMENT=16 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `encomendas`
--

LOCK TABLES `encomendas` WRITE;
/*!40000 ALTER TABLE `encomendas` DISABLE KEYS */;
INSERT INTO `encomendas` VALUES (1,5,'2024-01-11','17:55:00'),(2,1,'2024-01-11','17:50:00'),(5,6,'2024-01-19','09:10:00'),(6,1,'2024-01-10','08:19:00'),(7,1,'2024-01-10','09:00:00'),(8,1,'2024-01-10','10:30:00'),(9,1,'2024-01-10','12:00:00'),(10,5,'2024-01-11','09:30:00'),(11,5,'2024-01-11','11:00:00'),(13,6,'2024-01-10','15:00:00'),(15,6,'2024-01-11','09:00:00');
/*!40000 ALTER TABLE `encomendas` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `fornecedores`
--

DROP TABLE IF EXISTS `fornecedores`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `fornecedores` (
  `idFornecedor` int NOT NULL AUTO_INCREMENT,
  `nome` varchar(50) NOT NULL,
  `morada` varchar(250) NOT NULL,
  `email` varchar(50) NOT NULL,
  `responsavel` varchar(50) NOT NULL,
  `contacto` varchar(50) NOT NULL,
  PRIMARY KEY (`idFornecedor`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `fornecedores`
--

LOCK TABLES `fornecedores` WRITE;
/*!40000 ALTER TABLE `fornecedores` DISABLE KEYS */;
INSERT INTO `fornecedores` VALUES (1,'Sada','Torres Novas','sada@gmail.com','João','985412589'),(5,'Lusiaves','Calçada Fonte da Junqueira, n 36','andre.oaragao@hotmail.com','Adriana','985412589'),(6,'Kilom','São Julião do Tojal ','kilom@gmail.com','Fábio Torres','985412589'),(7,'Gesco','Torres Novas','gesco@gmail.com','João','9888564421');
/*!40000 ALTER TABLE `fornecedores` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `funcao`
--

DROP TABLE IF EXISTS `funcao`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `funcao` (
  `idFuncao` int NOT NULL AUTO_INCREMENT,
  `nomeFuncao` varchar(50) NOT NULL,
  PRIMARY KEY (`idFuncao`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `funcao`
--

LOCK TABLES `funcao` WRITE;
/*!40000 ALTER TABLE `funcao` DISABLE KEYS */;
INSERT INTO `funcao` VALUES (1,'Supervisor qualidade'),(2,'Técnico de qualidade'),(3,'Supervisor de picking'),(4,'Picking'),(5,'Supervisor de Planeamento');
/*!40000 ALTER TABLE `funcao` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `login`
--

DROP TABLE IF EXISTS `login`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `login` (
  `idLogin` int NOT NULL AUTO_INCREMENT,
  `nomeUtilizador` varchar(50) NOT NULL,
  `pass` varchar(250) NOT NULL,
  PRIMARY KEY (`idLogin`),
  UNIQUE KEY `nomeUtilizador` (`nomeUtilizador`)
) ENGINE=InnoDB AUTO_INCREMENT=48 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `login`
--

LOCK TABLES `login` WRITE;
/*!40000 ALTER TABLE `login` DISABLE KEYS */;
INSERT INTO `login` VALUES (1,'andre','admin'),(33,'ismael ','5555'),(40,'saliu','5555'),(44,'joao','5555');
/*!40000 ALTER TABLE `login` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `produtos`
--

DROP TABLE IF EXISTS `produtos`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `produtos` (
  `idProduto` int NOT NULL AUTO_INCREMENT,
  `nome` varchar(50) NOT NULL,
  `tipoProduto` varchar(50) NOT NULL,
  `tipoAnimal` varchar(50) NOT NULL,
  PRIMARY KEY (`idProduto`)
) ENGINE=InnoDB AUTO_INCREMENT=20 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `produtos`
--

LOCK TABLES `produtos` WRITE;
/*!40000 ALTER TABLE `produtos` DISABLE KEYS */;
INSERT INTO `produtos` VALUES (1,'Picanha','Granel','Vaca'),(2,'Maminha Fatiada','Vácuo','Vaca'),(5,'Bife de Contrafilé','Vácuo','Vaca'),(6,'Coxas de Frango Desossadas','Vácuo','Frango'),(7,'Lombo de Porco Temperado','Vácuo','Porco'),(8,'Costeletas de Cordeiro Marinadas','Granel','Borrego'),(9,'Peito de Frango em Filés','Vácuo','Frango'),(10,'Carne Moída de Vaca Premium','Granel','Vaca'),(11,'Pernil Suíno Defumado','Vácuo','Porco'),(12,'Asas de Frango Temperadas','Granel','Frango'),(13,'Tiras de Filé de Vaca para Churrasco','Vácuo','Vaca'),(14,'Peito de Pato Grelhado','Vácuo','Pato'),(15,'Costelinhas de Porco ao Molho Barbecue','Granel','Porco'),(16,'Hambúrguer de Frango Orgânico','Vácuo','Frango'),(17,'Picanha de Vaca Prime','Granel','Vaca'),(18,'Linguiça de Porco Artesanal','Vácuo','Porco'),(19,'Peito de Frango Desfiado','Granel','Frango');
/*!40000 ALTER TABLE `produtos` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `utilizadores`
--

DROP TABLE IF EXISTS `utilizadores`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `utilizadores` (
  `idUtilizadores` int NOT NULL AUTO_INCREMENT,
  `nome` varchar(50) NOT NULL,
  `idade` int NOT NULL,
  `morada` varchar(250) NOT NULL,
  `contacto` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `idFuncao` int DEFAULT NULL,
  `idLogin` int DEFAULT NULL,
  PRIMARY KEY (`idUtilizadores`),
  KEY `idFuncao` (`idFuncao`),
  KEY `idLogin` (`idLogin`),
  CONSTRAINT `utilizadores_ibfk_1` FOREIGN KEY (`idFuncao`) REFERENCES `funcao` (`idFuncao`),
  CONSTRAINT `utilizadores_ibfk_2` FOREIGN KEY (`idLogin`) REFERENCES `login` (`idLogin`)
) ENGINE=InnoDB AUTO_INCREMENT=22 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `utilizadores`
--

LOCK TABLES `utilizadores` WRITE;
/*!40000 ALTER TABLE `utilizadores` DISABLE KEYS */;
INSERT INTO `utilizadores` VALUES (1,'André Oliveira Aragão ',32,'Calsada da Junqueira','910588658','andre.oaragao@hotmail.com',5,1),(9,'Ismael Santos',20,'AV Merlicio Machado','910854789','ismael@gmail.com',3,33),(16,'Sailu',20,'AV Merlicio Machado','985458965','saliu@gmail.com',1,40),(20,'João Santos',29,'Rua C','985458965','joao@gmail.com',2,44);
/*!40000 ALTER TABLE `utilizadores` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2024-01-23 13:22:04

CREATE DATABASE  IF NOT EXISTS `ba97` /*!40100 DEFAULT CHARACTER SET utf8 */;
USE `ba97`;
-- MySQL dump 10.13  Distrib 5.7.17, for Win64 (x86_64)
--
-- Host: localhost    Database: ba97
-- ------------------------------------------------------
-- Server version	5.5.5-10.1.30-MariaDB

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
-- Table structure for table `base`
--

DROP TABLE IF EXISTS `base`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `base` (
  `ba` int(10) unsigned NOT NULL,
  `backbone` varchar(45) DEFAULT NULL,
  `mes` varchar(45) DEFAULT NULL,
  `estacao` varchar(45) DEFAULT NULL,
  `mntfo` varchar(45) DEFAULT NULL,
  `indicador` varchar(45) DEFAULT NULL,
  `abertura` varchar(45) DEFAULT NULL,
  `promessa` varchar(45) DEFAULT NULL,
  `acionamento` varchar(45) DEFAULT NULL,
  `baixa` varchar(45) DEFAULT NULL,
  `sla` varchar(45) DEFAULT NULL,
  `cod` varchar(45) DEFAULT NULL,
  `cadastrado` varchar(45) DEFAULT NULL,
  `ma` varchar(45) DEFAULT NULL,
  PRIMARY KEY (`ba`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `cabo`
--

DROP TABLE IF EXISTS `cabo`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `cabo` (
  `cod` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `uf` varchar(3) DEFAULT NULL,
  `cabo` varchar(45) DEFAULT NULL,
  `trecho` varchar(150) DEFAULT NULL,
  PRIMARY KEY (`cod`)
) ENGINE=InnoDB AUTO_INCREMENT=6589 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `cadastro`
--

DROP TABLE IF EXISTS `cadastro`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `cadastro` (
  `ba` int(10) unsigned NOT NULL,
  `mes` varchar(45) DEFAULT NULL,
  `estacao` varchar(45) DEFAULT NULL,
  `mntfo` varchar(45) DEFAULT NULL,
  `indicador` varchar(45) DEFAULT NULL,
  `abertura` varchar(45) DEFAULT NULL,
  `promessa` varchar(45) DEFAULT NULL,
  `acionamento` varchar(45) DEFAULT NULL,
  `baixa` varchar(45) DEFAULT NULL,
  `sla` varchar(45) DEFAULT NULL,
  `cod` varchar(45) DEFAULT NULL,
  `nome_cabo` varchar(45) DEFAULT NULL,
  `entre_local` varchar(45) DEFAULT NULL,
  `ma` varchar(45) DEFAULT NULL,
  `tipo_utilizacao` varchar(45) DEFAULT NULL,
  `causa_rompimento` varchar(45) DEFAULT NULL,
  `sub_causa` varchar(45) DEFAULT NULL,
  `usu_cabo` varchar(45) DEFAULT NULL,
  `ba_comum` varchar(45) DEFAULT NULL,
  `prazo` varchar(45) DEFAULT NULL,
  `metro_cabo` varchar(45) DEFAULT NULL,
  `lote_cabo` varchar(45) DEFAULT NULL,
  `cod_sap` varchar(45) DEFAULT NULL,
  `cgr` varchar(45) DEFAULT NULL,
  `n_prot_bo` varchar(45) DEFAULT NULL,
  `obs_nao_abertura_bo` varchar(45) DEFAULT NULL,
  `remanejo_fibra` varchar(45) DEFAULT NULL,
  `qtd_cx_usada` varchar(45) DEFAULT NULL,
  `n_emenda_enpe` varchar(45) DEFAULT NULL,
  `endereco_enpe` varchar(45) DEFAULT NULL,
  `pendencia_35d` varchar(45) DEFAULT NULL,
  `jm` varchar(45) DEFAULT NULL,
  `n_jm` varchar(45) DEFAULT NULL,
  `data_abert_jan` varchar(45) DEFAULT NULL,
  `prev_regula` varchar(45) DEFAULT NULL,
  `just_fora_prazo` varchar(500) DEFAULT NULL,
  `ccto_cli` varchar(500) DEFAULT NULL,
  `descricao` varchar(500) DEFAULT NULL,
  `coord_cabo` varchar(500) DEFAULT NULL,
  `coord_enpe` varchar(500) DEFAULT NULL,
  `informe_pendencia` varchar(500) DEFAULT NULL,
  `material_35d` varchar(45) DEFAULT NULL,
  `croqui` varchar(45) DEFAULT NULL,
  `foto` varchar(45) DEFAULT NULL,
  `data_cad` date DEFAULT NULL,
  `ga` varchar(85) DEFAULT NULL,
  PRIMARY KEY (`ba`),
  KEY `fk_cadastro_base_idx` (`ba`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `cod_sap`
--

DROP TABLE IF EXISTS `cod_sap`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `cod_sap` (
  `cod` int(11) NOT NULL,
  `descr` varchar(45) DEFAULT NULL,
  PRIMARY KEY (`cod`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `codigo`
--

DROP TABLE IF EXISTS `codigo`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `codigo` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `causa` varchar(80) DEFAULT NULL,
  `sub` varchar(80) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=99 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `usuario`
--

DROP TABLE IF EXISTS `usuario`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `usuario` (
  `id` int(10) unsigned NOT NULL,
  `nome` varchar(85) DEFAULT NULL,
  `login` varchar(45) DEFAULT NULL,
  `senha` varchar(45) DEFAULT NULL,
  `acesso` varchar(45) DEFAULT NULL,
  `area` varchar(45) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2019-10-03 13:11:08

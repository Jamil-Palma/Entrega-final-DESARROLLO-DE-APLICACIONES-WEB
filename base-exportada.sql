-- MySQL dump 10.13  Distrib 8.0.20, for Linux (x86_64)
--
-- Host: localhost    Database: pagina_proyecto
-- ------------------------------------------------------
-- Server version	8.0.20-0ubuntu0.20.04.1

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!50503 SET NAMES utf8mb4 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;

--
-- Table structure for table `aula`
--

DROP TABLE IF EXISTS `aula`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `aula` (
  `id_aula` bigint unsigned NOT NULL AUTO_INCREMENT,
  `curso` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id_aula`)
) ENGINE=InnoDB AUTO_INCREMENT=24 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `aula`
--

LOCK TABLES `aula` WRITE;
/*!40000 ALTER TABLE `aula` DISABLE KEYS */;
INSERT INTO `aula` VALUES (1,'SIA1','2020-06-03 14:49:40','2020-06-03 14:49:40'),(2,'SIA2','2020-06-03 14:49:43','2020-06-03 14:49:43'),(3,'SIC1','2020-07-12 14:56:53','2020-07-12 14:56:53'),(4,'SIC2','2020-07-28 20:47:16','2020-07-28 20:47:16'),(8,'SID3','2020-08-10 00:48:51','2020-08-10 00:48:51'),(9,'SID4','2020-08-10 00:48:55','2020-08-10 00:48:55'),(10,'SID5','2020-08-10 00:48:58','2020-08-10 00:48:58'),(11,'SID6','2020-08-10 00:49:02','2020-08-10 00:49:02'),(12,'SIC3','2020-08-10 00:49:10','2020-08-10 00:49:10'),(13,'SIC4','2020-08-10 00:49:14','2020-08-10 00:49:14'),(14,'SIC5','2020-08-10 00:49:17','2020-08-10 00:49:17'),(15,'SIC6','2020-08-10 00:49:21','2020-08-10 00:49:21'),(16,'ED3SIS1','2020-08-10 00:49:30','2020-08-10 00:49:30'),(17,'ED3SIS2','2020-08-10 00:49:35','2020-08-10 00:49:35'),(18,'ED3SIS3','2020-08-10 00:49:39','2020-08-10 00:49:39'),(19,'ED3SIS4','2020-08-10 00:49:43','2020-08-10 00:49:43'),(20,'ED3SIS5','2020-08-10 00:49:49','2020-08-10 00:49:49'),(21,'ED3SIS6','2020-08-10 00:49:54','2020-08-10 00:49:54'),(22,'LRED','2020-08-10 00:50:02','2020-08-10 00:50:02'),(23,'LHARD','2020-08-10 00:50:06','2020-08-10 00:50:06');
/*!40000 ALTER TABLE `aula` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `extra`
--

DROP TABLE IF EXISTS `extra`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `extra` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `anuncio` varchar(200) COLLATE utf8mb4_unicode_ci NOT NULL,
  `fecha_limite` timestamp NOT NULL,
  `semestre` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `extra`
--

LOCK TABLES `extra` WRITE;
/*!40000 ALTER TABLE `extra` DISABLE KEYS */;
INSERT INTO `extra` VALUES (1,'En cumplimiento a la R.H.C.F. FNI Nº 118/2020, se procederá a habilitar el retiro de materias registradas para la gestión I/2020 a partir del 14/05/2020 al 21/05/2020 (impostergable)','2020-08-31 15:59:59','I-2020','2020-06-03 00:56:16','2020-08-10 01:52:44');
/*!40000 ALTER TABLE `extra` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `horario`
--

DROP TABLE IF EXISTS `horario`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `horario` (
  `id_horario` bigint unsigned NOT NULL AUTO_INCREMENT,
  `hora` int NOT NULL,
  `id_aula` bigint unsigned NOT NULL,
  `id_materia` bigint unsigned NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id_horario`),
  KEY `horario_id_aula_foreign` (`id_aula`),
  KEY `horario_id_materia_foreign` (`id_materia`),
  CONSTRAINT `horario_id_aula_foreign` FOREIGN KEY (`id_aula`) REFERENCES `aula` (`id_aula`),
  CONSTRAINT `horario_id_materia_foreign` FOREIGN KEY (`id_materia`) REFERENCES `materia` (`id_materia`)
) ENGINE=InnoDB AUTO_INCREMENT=23 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `horario`
--

LOCK TABLES `horario` WRITE;
/*!40000 ALTER TABLE `horario` DISABLE KEYS */;
INSERT INTO `horario` VALUES (1,26,1,1,'2020-06-03 15:05:11','2020-06-03 15:05:11'),(2,12,1,1,'2020-07-12 14:53:40','2020-07-12 14:53:40'),(3,34,2,3,'2020-07-12 15:13:08','2020-07-12 15:13:08'),(4,2,3,3,'2020-07-12 15:13:31','2020-07-12 15:13:31'),(5,20,4,4,'2020-07-28 20:51:04','2020-07-28 20:51:04'),(6,7,2,4,'2020-08-09 21:12:42','2020-08-09 21:12:42'),(7,2,12,7,'2020-08-10 01:11:23','2020-08-10 01:11:23'),(8,10,11,7,'2020-08-10 01:11:43','2020-08-10 01:11:43'),(9,3,19,24,'2020-08-10 01:12:09','2020-08-10 01:12:09'),(10,5,22,24,'2020-08-10 01:12:44','2020-08-10 01:12:44'),(11,26,14,8,'2020-08-10 01:13:19','2020-08-10 01:13:19'),(12,20,20,8,'2020-08-10 01:13:33','2020-08-10 01:13:33'),(13,2,18,9,'2020-08-10 01:15:28','2020-08-10 01:15:28'),(14,26,22,9,'2020-08-10 01:15:42','2020-08-10 01:15:42'),(15,5,13,12,'2020-08-10 01:16:09','2020-08-10 01:16:09'),(16,34,16,12,'2020-08-10 01:16:24','2020-08-10 01:16:24'),(17,3,13,11,'2020-08-10 01:18:10','2020-08-10 01:18:10'),(18,19,4,11,'2020-08-10 01:18:21','2020-08-10 01:18:21'),(19,2,13,10,'2020-08-10 01:21:58','2020-08-10 01:21:58'),(20,10,15,10,'2020-08-10 01:22:07','2020-08-10 01:22:07'),(21,35,22,19,'2020-08-10 01:22:46','2020-08-10 01:22:46'),(22,29,23,19,'2020-08-10 01:23:00','2020-08-10 01:23:00');
/*!40000 ALTER TABLE `horario` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `informe`
--

DROP TABLE IF EXISTS `informe`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `informe` (
  `id_informe` bigint unsigned NOT NULL AUTO_INCREMENT,
  `tipo` varchar(30) COLLATE utf8mb4_unicode_ci NOT NULL,
  `fecha_envio` timestamp NOT NULL,
  `nombre_informe` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `id_materia` bigint unsigned NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id_informe`),
  KEY `informe_id_materia_foreign` (`id_materia`),
  CONSTRAINT `informe_id_materia_foreign` FOREIGN KEY (`id_materia`) REFERENCES `materia` (`id_materia`)
) ENGINE=InnoDB AUTO_INCREMENT=21 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `informe`
--

LOCK TABLES `informe` WRITE;
/*!40000 ALTER TABLE `informe` DISABLE KEYS */;
INSERT INTO `informe` VALUES (1,'PLAN DE ESTUDIOS','2020-06-03 14:44:11','PLAN DE ESTUDIOS inf a I-2020.docx',1,'2020-06-03 14:44:11','2020-06-03 14:44:11'),(2,'PLAN DE ESTUDIOS','2020-07-12 15:07:55','PLAN DE ESTUDIOS inf a I-2020.docx',1,'2020-07-12 15:07:55','2020-07-12 15:07:55'),(3,'PLAN DE ESTUDIOS','2020-07-12 15:14:07','PLAN DE ESTUDIOS SIS2210 A I-2020.docx',3,'2020-07-12 15:14:07','2020-07-12 15:14:07'),(4,'PLAN DE ESTUDIOS','2020-08-02 01:05:51','PLAN DE ESTUDIOS MAT1100 A II-2020.docx',5,'2020-08-02 01:05:51','2020-08-02 01:05:51'),(5,'PLAN DE ESTUDIOS','2020-08-10 01:08:50','PLAN DE ESTUDIOS INF 1210 A II-2020.docx',7,'2020-08-10 01:08:50','2020-08-10 01:08:50'),(6,'PLAN DE ESTUDIOS','2020-08-10 01:09:08','PLAN DE ESTUDIOS INF 1210 B II-2020.docx',8,'2020-08-10 01:09:08','2020-08-10 01:09:08'),(7,'PLAN DE ESTUDIOS','2020-08-10 01:09:30','PLAN DE ESTUDIOS INF 3920 A II-2020.docx',24,'2020-08-10 01:09:30','2020-08-10 01:09:30'),(8,'INFORME DE ACTIVIDADES','2020-08-10 01:09:47','INFORME DE ACTIVIDADES INF 1210 A II-2020.docx',7,'2020-08-10 01:09:47','2020-08-10 01:09:47'),(9,'INFORME DE ACTIVIDADES','2020-08-10 01:10:13','INFORME DE ACTIVIDADES INF 1210 B II-2020.docx',8,'2020-08-10 01:10:13','2020-08-10 01:10:13'),(10,'INFORME DE ACTIVIDADES','2020-08-10 01:10:26','INFORME DE ACTIVIDADES INF 3920 A II-2020.docx',24,'2020-08-10 01:10:26','2020-08-10 01:10:26'),(11,'PLAN DE ESTUDIOS','2020-08-10 01:14:29','PLAN DE ESTUDIOS INF 2310 A II-2020.docx',9,'2020-08-10 01:14:29','2020-08-10 01:14:29'),(12,'PLAN DE ESTUDIOS','2020-08-10 01:14:39','PLAN DE ESTUDIOS INF 2710 A II-2020.docx',12,'2020-08-10 01:14:39','2020-08-10 01:14:39'),(13,'INFORME DE ACTIVIDADES','2020-08-10 01:14:52','INFORME DE ACTIVIDADES INF 2310 A II-2020.docx',9,'2020-08-10 01:14:52','2020-08-10 01:14:52'),(14,'INFORME DE ACTIVIDADES','2020-08-10 01:15:01','INFORME DE ACTIVIDADES INF 2710 A II-2020.docx',12,'2020-08-10 01:15:01','2020-08-10 01:15:01'),(15,'PLAN DE ESTUDIOS','2020-08-10 01:17:36','PLAN DE ESTUDIOS INF 2610 A II-2020.docx',11,'2020-08-10 01:17:36','2020-08-10 01:17:36'),(16,'INFORME DE ACTIVIDADES','2020-08-10 01:17:51','INFORME DE ACTIVIDADES INF 2610 A II-2020.docx',11,'2020-08-10 01:17:51','2020-08-10 01:17:51'),(17,'PLAN DE ESTUDIOS','2020-08-10 01:19:02','PLAN DE ESTUDIOS INF 2430 A II-2020.docx',10,'2020-08-10 01:19:02','2020-08-10 01:19:02'),(18,'PLAN DE ESTUDIOS','2020-08-10 01:19:17','PLAN DE ESTUDIOS INF 3731 A II-2020.docx',19,'2020-08-10 01:19:17','2020-08-10 01:19:17'),(19,'INFORME DE ACTIVIDADES','2020-08-10 01:19:27','INFORME DE ACTIVIDADES INF 2430 A II-2020.docx',10,'2020-08-10 01:19:27','2020-08-10 01:19:27'),(20,'INFORME DE ACTIVIDADES','2020-08-10 01:19:36','INFORME DE ACTIVIDADES INF 3731 A II-2020.docx',19,'2020-08-10 01:19:36','2020-08-10 01:19:36');
/*!40000 ALTER TABLE `informe` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `materia`
--

DROP TABLE IF EXISTS `materia`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `materia` (
  `id_materia` bigint unsigned NOT NULL AUTO_INCREMENT,
  `sigla` varchar(10) COLLATE utf8mb4_unicode_ci NOT NULL,
  `paralelo` varchar(10) COLLATE utf8mb4_unicode_ci NOT NULL,
  `nombre` varchar(40) COLLATE utf8mb4_unicode_ci NOT NULL,
  `id_usuario` bigint unsigned NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id_materia`),
  KEY `materia_id_usuario_foreign` (`id_usuario`),
  CONSTRAINT `materia_id_usuario_foreign` FOREIGN KEY (`id_usuario`) REFERENCES `users` (`id_usuario`)
) ENGINE=InnoDB AUTO_INCREMENT=27 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `materia`
--

LOCK TABLES `materia` WRITE;
/*!40000 ALTER TABLE `materia` DISABLE KEYS */;
INSERT INTO `materia` VALUES (1,'inf','a','informatica',2,'2020-06-03 14:43:50','2020-06-03 14:43:50'),(2,'SIS1110','A','metodologia de la programacion I',3,'2020-07-12 14:59:04','2020-07-12 14:59:04'),(3,'SIS2210','A','programacion 2',2,'2020-07-12 15:12:42','2020-07-12 15:12:42'),(4,'SIS2310','A','Metodologia de la programacion III',2,'2020-07-28 20:47:08','2020-07-28 20:47:08'),(5,'MAT1100','A','calculo 1',4,'2020-08-01 22:41:19','2020-08-01 22:41:19'),(7,'INF 1210','A','ANALISIS DISCRETO',8,'2020-08-10 00:53:13','2020-08-10 00:53:13'),(8,'INF 1210','B','ANALISIS DISCRETO',8,'2020-08-10 00:53:29','2020-08-10 00:53:29'),(9,'INF 2310','A','SISTEMAS OPERATIVOS I',9,'2020-08-10 00:54:06','2020-08-10 00:54:06'),(10,'INF 2430','A','BASE DE DATOS I',10,'2020-08-10 00:54:53','2020-08-10 00:54:53'),(11,'INF 2610','A','TEORIA DE LA INFORMACION',11,'2020-08-10 00:55:16','2020-08-10 00:55:16'),(12,'INF 2710','A','SEGURIDAD DE SISTEMAS INFORMATICOS',9,'2020-08-10 00:55:45','2020-08-10 00:55:45'),(13,'INF 3420','A','SISTEMAS OPERATIVOS II',12,'2020-08-10 00:56:44','2020-08-10 00:56:44'),(14,'INF 3510','A','REDES INFORMATICAS I',13,'2020-08-10 00:57:16','2020-08-10 00:57:16'),(15,'INF 3520','A','BASE DE DATOS II',14,'2020-08-10 00:57:52','2020-08-10 00:57:52'),(16,'INF 2530','A','ESTRUCTURA DE COMPUTADORES II',15,'2020-08-10 00:58:27','2020-08-10 00:58:27'),(17,'INF3632','A','SISTEMAS DE TRANSMISION OPTICOS',12,'2020-08-10 00:59:39','2020-08-10 00:59:39'),(18,'INF 3641','A','ALGORITMICA GENERAL',16,'2020-08-10 01:00:05','2020-08-10 01:00:05'),(19,'INF 3731','A','INTELIGENCIA ARTIFICIAL I',10,'2020-08-10 01:00:38','2020-08-10 01:00:38'),(20,'INF 3742','A','REDES DE BANDA ANCHA',17,'2020-08-10 01:01:16','2020-08-10 01:01:16'),(21,'INF 3812','A','REDES INFORMATICAS III',18,'2020-08-10 01:01:45','2020-08-10 01:01:45'),(22,'INF 3822','A','COMUNICACION INALAMBRICA',13,'2020-08-10 01:02:13','2020-08-10 01:02:13'),(23,'INF 3912','A','TALLER DE TELEMATICA II',16,'2020-08-10 01:02:37','2020-08-10 01:02:37'),(24,'INF 3920','A','SISTEMAS DE INFORMACION GEOGRAFICA',8,'2020-08-10 01:03:14','2020-08-10 01:03:14'),(25,'INF 2720','A','INGENIERIA DE SOFTWARE I',19,'2020-08-10 01:05:09','2020-08-10 01:05:09'),(26,'INF 3911','A','DESARROLLO DE APLICACIONES WEB',24,'2020-08-10 01:05:34','2020-08-10 01:05:34');
/*!40000 ALTER TABLE `materia` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `migrations`
--

DROP TABLE IF EXISTS `migrations`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `migrations` (
  `id` int unsigned NOT NULL AUTO_INCREMENT,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `migrations`
--

LOCK TABLES `migrations` WRITE;
/*!40000 ALTER TABLE `migrations` DISABLE KEYS */;
INSERT INTO `migrations` VALUES (1,'2014_10_12_000000_create_users_table',1),(2,'2014_10_12_100000_create_password_resets_table',1),(3,'2020_05_05_212310_create_materias_table',1),(4,'2020_05_06_000218_create_informes_table',1),(5,'2020_05_06_001753_create_observacions_table',1),(6,'2020_05_12_210614_create_extras_table',1),(7,'2020_05_26_024954_create_aula_table',1),(8,'2020_05_26_025011_create_horario_table',1);
/*!40000 ALTER TABLE `migrations` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `observacion`
--

DROP TABLE IF EXISTS `observacion`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `observacion` (
  `id_obs` bigint unsigned NOT NULL AUTO_INCREMENT,
  `asunto` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `origen` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL,
  `destino` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL,
  `fecha_envio` timestamp NOT NULL,
  `detalle` varchar(200) COLLATE utf8mb4_unicode_ci NOT NULL,
  `id_informe` bigint unsigned NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id_obs`),
  KEY `observacion_id_informe_foreign` (`id_informe`),
  CONSTRAINT `observacion_id_informe_foreign` FOREIGN KEY (`id_informe`) REFERENCES `informe` (`id_informe`)
) ENGINE=InnoDB AUTO_INCREMENT=14 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `observacion`
--

LOCK TABLES `observacion` WRITE;
/*!40000 ALTER TABLE `observacion` DISABLE KEYS */;
INSERT INTO `observacion` VALUES (1,'OBSERVACION PLAN DE ESTUDIOS inf a I-2020','2','1','2020-06-03 14:54:28','fas\r\n            sf dfs',1,'2020-06-03 14:54:28','2020-06-03 14:54:28'),(2,'OBSERVACION PLAN DE ESTUDIOS inf a I-2020','2','1','2020-06-03 14:54:52','ya me revisan :v?',1,'2020-06-03 14:54:52','2020-06-03 14:54:52'),(3,'OBSERVACION PLAN DE ESTUDIOS inf a I-2020','1','2','2020-06-03 14:55:37','envia otro :v',1,'2020-06-03 14:55:37','2020-06-03 14:55:37'),(4,'OBSERVACION PLAN DE ESTUDIOS inf a I-2020','2','1','2020-07-12 15:08:20','ya me dicen como esta?',2,'2020-07-12 15:08:20','2020-07-12 15:08:20'),(5,'OBSERVACION PLAN DE ESTUDIOS MAT1100 A II-2020','1','4','2020-08-04 00:16:13','gg al fin dio esto, x2',4,'2020-08-04 00:16:13','2020-08-04 00:16:13'),(6,'OBSERVACION PLAN DE ESTUDIOS INF 1210 B II-2020','1','8','2020-08-10 01:24:42','buen informe esta este',6,'2020-08-10 01:24:42','2020-08-10 01:24:42'),(7,'OBSERVACION PLAN DE ESTUDIOS INF 2310 A II-2020','1','9','2020-08-10 01:25:12','parece bien tu informe, pero revisa la pagina 2, punto 4',11,'2020-08-10 01:25:12','2020-08-10 01:25:12'),(8,'OBSERVACION PLAN DE ESTUDIOS INF 2710 A II-2020','1','9','2020-08-10 01:25:33','genial, todo esta aceptado, puedes continuar',12,'2020-08-10 01:25:33','2020-08-10 01:25:33'),(9,'OBSERVACION PLAN DE ESTUDIOS INF 3731 A II-2020','1','10','2020-08-10 01:25:52','por favor vuelve a enviar tu informe',18,'2020-08-10 01:25:52','2020-08-10 01:25:52'),(10,'OBSERVACION PLAN DE ESTUDIOS INF 2430 A II-2020','1','10','2020-08-10 01:26:17','a ver como te lo digo....tienes que usar el formato por defecto que todos usan',17,'2020-08-10 01:26:17','2020-08-10 01:26:17'),(11,'OBSERVACION PLAN DE ESTUDIOS INF 2610 A II-2020','1','11','2020-08-10 01:27:24','a ver....revisando nuevamente',15,'2020-08-10 01:27:24','2020-08-10 01:27:24'),(12,'OBSERVACION PLAN DE ESTUDIOS INF 1210 B II-2020','1','8','2020-08-10 01:27:44','muy bien, puede continuar con sus clases',6,'2020-08-10 01:27:44','2020-08-10 01:27:44'),(13,'OBSERVACION PLAN DE ESTUDIOS INF 1210 B II-2020','1','8','2020-08-10 01:28:04','muy bien ingeniera, reporte entregado',6,'2020-08-10 01:28:04','2020-08-10 01:28:04');
/*!40000 ALTER TABLE `observacion` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `password_resets`
--

DROP TABLE IF EXISTS `password_resets`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `password_resets` (
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  KEY `password_resets_email_index` (`email`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `password_resets`
--

LOCK TABLES `password_resets` WRITE;
/*!40000 ALTER TABLE `password_resets` DISABLE KEYS */;
/*!40000 ALTER TABLE `password_resets` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `users`
--

DROP TABLE IF EXISTS `users`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `users` (
  `id_usuario` bigint unsigned NOT NULL AUTO_INCREMENT,
  `ci` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL,
  `nombre` varchar(30) COLLATE utf8mb4_unicode_ci NOT NULL,
  `apellido` varchar(30) COLLATE utf8mb4_unicode_ci NOT NULL,
  `cel` int NOT NULL,
  `email` varchar(30) COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_name` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `is_admin` tinyint(1) NOT NULL DEFAULT '0',
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id_usuario`)
) ENGINE=InnoDB AUTO_INCREMENT=25 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `users`
--

LOCK TABLES `users` WRITE;
/*!40000 ALTER TABLE `users` DISABLE KEYS */;
INSERT INTO `users` VALUES (1,'12345','administrador','segundo',1000,'gg@gmail.com','admi','$2y$10$gru4eJ7J2XQLtYYMqbbaxe8RFY7TDW5Zq7r73rFUgohQDj9R0oiNO',1,NULL,NULL,'2020-08-04 00:12:40'),(2,'123456','profe','sorcito',2000,'gg2@gmail.com','usuario','$2y$10$kSmUYgGg3gY/0RFZsJBHFe2J.mAxspQE6hyKQlTutBTtJm3p5QeM2',0,NULL,NULL,'2020-08-04 00:22:16'),(3,'38272910','jose','mamani',83948193,'josejose@gmail.com','userjose','$2y$10$DcJka0tTboJqoQW6VNzqLusdGYbdJ2PYmung/9SHLZkZX6fAICvqK',0,NULL,'2020-07-12 14:57:50','2020-07-12 14:57:50'),(4,'12346','usuario_1','usuario_1',1005,'c1@gmail.com','cuenta_1','$2y$10$Qvbd0mfvVEE/7TAXt6KmvuwS.NDDLNI299DWsXB4Vl92R4X.LJSjm',0,NULL,'2020-08-01 22:39:40','2020-08-01 22:39:40'),(5,'567','usuario borrar','borrame',876,'borrar@gmail.com','borrar','$2y$10$cN2el8b0Pu4RDsGayFG6wesHnie3rIUfgGiEhbljj7tzx94HamZV6',1,NULL,'2020-08-09 21:49:51','2020-08-09 21:49:51'),(8,'1234567','MARIA ANGELICA','ANDRADE ZEBALLOS',69581410,'maaz@gmail.com','maaz','$2y$10$/sI4Gj9GTuTE8TR0h.0n1eNAvOQndRBT.MhN3iO/GS70dl1Q.LOHy',0,NULL,'2020-08-10 00:31:30','2020-08-10 00:31:30'),(9,'1234568','CESAR FERNANDO','ESCALANTE LUNARIO',69581411,'cfel@gmail.com','cfel','$2y$10$O1PS/HZ34MtXRqdsEZEBvOpnKi3qGlZ6VtRz7K8EQlBAWRSKUMo2C',0,NULL,'2020-08-10 00:32:14','2020-08-10 00:32:14'),(10,'1234569','EDILBERTO LUCIO','SALGADO ARI',69581412,'elsa@gmail.com','elsa','$2y$10$qrpRic3l.R3/9b3sr0HNJeZz0Fm6u/Csza9BrNHzjIDQgAZQbMSge',0,NULL,'2020-08-10 00:33:12','2020-08-10 00:33:12'),(11,'12345570','FRANZ','CHINCHE IMAÑA',69581413,'fci@gmail.com','fci','$2y$10$.odahBfAHUysAee7enoXtOlNVdNE9SB35FocbK9PPW/KdLSr5sAh2',0,NULL,'2020-08-10 00:34:04','2020-08-10 00:34:04'),(12,'1234571','ANDY ALEX','CESPEDES ROJAS',69581414,'aacr@gmail.com','aacr','$2y$10$bcc6J.IDwCfrAtFTR1u07.tYBUBYes0xgIVB.uBkahoX83fzTPhSS',0,NULL,'2020-08-10 00:35:13','2020-08-10 00:35:13'),(13,'1234572','GREGORIO FERNANDO','UREÑA MERIDA',69581415,'gfum@gmail.com','gfum','$2y$10$QGSro3.K3/K9y9uYYmYwDuEwBQgkmhWG/5.C6ffYzeC/S4cQs0Z2G',0,NULL,'2020-08-10 00:36:09','2020-08-10 00:36:09'),(14,'1234573','DAVID EDGAR','MAYTA SARMIENTO',69581416,'dems@gmail.com','dems','$2y$10$iU/8JJSsKXDNEqFOLLZI/ePnF8mt3wlJf2UNO68wUdW4RbuLgqf3W',0,NULL,'2020-08-10 00:37:01','2020-08-10 00:37:01'),(15,'1234574','JUAN','CHOQUE UÑO',69581417,'jcu@gmail.com','jcu','$2y$10$b9OUjSEybsiUJx18WP63BuMwfdOlev6myh4hHZJPkarM.Fn9uhzcq',0,NULL,'2020-08-10 00:37:58','2020-08-10 00:37:58'),(16,'1234575','MIGUEL ANGEL','REYNOLDS SALINAS',69581418,'mars@gmail.com','mars','$2y$10$LucS5Daal6xA2lrWyvwzZuW4GHKKVVfbjKhIPeB2wUSgQwEE5zNkm',0,NULL,'2020-08-10 00:38:45','2020-08-10 00:38:45'),(17,'1234578','JUAN','BARRIOS CORDOVA',69581419,'jbc@gmail.com','jbc','$2y$10$R19oa7.uubm8aVJTIZ0/z.bqA6l9adWPKg36x1XMZBqe41rrE8A72',0,NULL,'2020-08-10 00:39:59','2020-08-10 00:39:59'),(18,'1234580','DENNIS','MARTINEZ CROVO',69581420,'dmc@gmail.com','dmc','$2y$10$IZTRPuOz4QcuT3TDBxtjtuK2lVhCydlFtuVOznu5eCFeVM5kz5ZSe',0,NULL,'2020-08-10 00:40:53','2020-08-10 00:40:53'),(19,'1234581','JULIO CESAR','BERMUDEZ VARGAS',69581421,'jcbv@gmail.com','jcbv','$2y$10$YOw8Vb2MG8Z20EgHgHN93.JHYghoXnJxf9Naz3aNbVOJFuK/GwOny',0,NULL,'2020-08-10 00:41:41','2020-08-10 00:41:41'),(20,'1234582','TEOFILO CESAR','MISERICORDIA AYAVIRI',69581422,'tcma@gmail.com','tcma','$2y$10$jrG6tWg.Eb2ELqQyei2DbuptAKK1CFtxiC14dFB43hRwePoAw0xd2',0,NULL,'2020-08-10 00:42:26','2020-08-10 00:42:26'),(21,'1234583','CARLOS RICARDO','BALDERRAMA VASQUEZ',69581423,'crbv@gmail.com','crbv','$2y$10$yFTGIaCZc9C.QNjvEWx51upu6yPBtRNn7jC2JmtVKxSbWyJanI97i',0,NULL,'2020-08-10 00:43:22','2020-08-10 00:43:22'),(22,'1234584','RUBEN','MEDINACELLI ORTIZ',69581424,'rmo@gmail.com','rmo','$2y$10$GwdJZaof4BGR0ILMRw5OcutHN39vzVYNiBRoMZ9jy1srl8o2OT9Tq',0,NULL,'2020-08-10 00:44:08','2020-08-10 00:44:08'),(23,'1234585','NELSON','TAPIA HINOJOSA',69581425,'nth@gmail.com','nth','$2y$10$WUMsSLeLm3IZ01iSKgu0KO3CCLWuJxyWdTVKe1a8s87EcHcddlkjm',0,NULL,'2020-08-10 00:44:54','2020-08-10 00:44:54'),(24,'1234586','JUAN CARLOS','VALLEJOS PANIAGUA',69581426,'jcvp@gmail.com','jcvp','$2y$10$kju84ytKAfIfdXZ4R0SI5OYU.QSVrRAR0UORn4cBjHI6i2B1eCj9C',0,NULL,'2020-08-10 00:46:22','2020-08-10 00:46:22');
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

-- Dump completed on 2020-08-09 21:52:59

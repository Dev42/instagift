-- MySQL dump 10.13  Distrib 5.1.49, for pc-linux-gnu (i686)
--
-- Host: 10.7.26.21    Database: instagift
-- ------------------------------------------------------
-- Server version	5.5.29-log
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;

--
-- Table structure for table `contato`
--

DROP TABLE IF EXISTS `contato`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `contato` (
  `cnt_10_id` int(11) NOT NULL AUTO_INCREMENT,
  `cli_10_id` int(11) NOT NULL,
  `cnt_30_nome` text NOT NULL,
  `cnt_10_tipo` int(11) NOT NULL,
  `cnt_10_ddd` int(11) NOT NULL,
  `cnt_10_tel` int(11) NOT NULL,
  `cnt_30_email` text NOT NULL,
  PRIMARY KEY (`cnt_10_id`)
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `contato`
--

LOCK TABLES `contato` WRITE;
/*!40000 ALTER TABLE `contato` DISABLE KEYS */;
INSERT INTO `contato` VALUES (1,14,'Giovanni Giannichi',1,11,11111111,'giogiannichi@gmail.com'),(2,14,'Giovanni Giannichi',1,11,11111111,'giogiannichi@gmail.com'),(3,14,'Giovanni Giannichi',1,11,11111111,'giogiannichi@gmail.com'),(4,17,'Reinaldo Silotto',1,11,2222,'silotto@weeby.com.br'),(5,17,'Reinaldo Silotto',1,11,2222,'silotto@weeby.com.br'),(6,17,'Reinaldo Silotto',1,11,2222,'silotto@weeby.com.br'),(7,17,'Giovanni Giannichi',1,11,11111111,'giogiannichi@gmail.com'),(8,17,'Reinaldo Silotto',1,11,29251845,'silotto@weeby.com.br');
/*!40000 ALTER TABLE `contato` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `endereco`
--

DROP TABLE IF EXISTS `endereco`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `endereco` (
  `end_10_id` int(11) NOT NULL AUTO_INCREMENT,
  `cli_10_id` int(11) NOT NULL,
  `end_30_logradouro` text NOT NULL,
  `end_30_bairro` text NOT NULL,
  `end_10_numero` text NOT NULL,
  `end_30_complemento` text NOT NULL,
  `end_30_cidade` text NOT NULL,
  `end_30_estado` text NOT NULL,
  `end_30_cep` text NOT NULL,
  PRIMARY KEY (`end_10_id`)
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `endereco`
--

LOCK TABLES `endereco` WRITE;
/*!40000 ALTER TABLE `endereco` DISABLE KEYS */;
INSERT INTO `endereco` VALUES (1,14,'Rua Francisco Lipi','Parada Inglesa','88','','SAO PAULO','SP','02243-000'),(2,14,'Rua Francisco Lipi','Parada Inglesa','88','Complemento teste','SAO PAULO','SP','02243-000'),(3,14,'Rua Francisco Lipi','Parada Inglesa','88','','SAO PAULO','SP','02243-000'),(4,17,'Rua Teste','Freguesia do O','22','','SÃ£o Paulo','SP','02929-140'),(5,17,'Rua Teste, 222','Freguesia do O','22','','SÃ£o Paulo','SP','02929-140'),(6,17,'Rua Teste, 222','Freguesia do O','22','teste','SÃ£o Paulo','SP','02929-140'),(7,17,'','Parada Inglesa','88','Complemento teste','SAO PAULO','SP','02243-000'),(8,17,'Rua Carmelito R. Barbosa','Moinho Velho','23','Casa','SÃ£o Paulo','SP','02929-140');
/*!40000 ALTER TABLE `endereco` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `foto_produto`
--

DROP TABLE IF EXISTS `foto_produto`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `foto_produto` (
  `foto_produto_10_id` int(11) NOT NULL AUTO_INCREMENT,
  `foto_produto_10_id_produto` int(11) NOT NULL,
  `foto_produto_30_url` varchar(255) NOT NULL,
  PRIMARY KEY (`foto_produto_10_id`),
  KEY `foto_produto_ibfk_1` (`foto_produto_10_id_produto`),
  CONSTRAINT `foto_produto_ibfk_1` FOREIGN KEY (`foto_produto_10_id_produto`) REFERENCES `produto` (`produto_10_id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=87 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `foto_produto`
--

LOCK TABLES `foto_produto` WRITE;
/*!40000 ALTER TABLE `foto_produto` DISABLE KEYS */;
INSERT INTO `foto_produto` VALUES (75,48,'5159c318069b1-48produto_sticker.jpg'),(76,49,'5159c6b0a6aeb-49produto_squeres.jpg'),(77,50,'5159cb415100c-50produto_cards.jpg'),(78,51,'5159cf00d19a8-51produto_minibook.jpg'),(79,52,'5159d655dfb55-52produto_postais.jpg'),(80,53,'5159d70dd24e7-53produto_canvas.jpg'),(81,54,'5159d871576cf-54produto_quadro.jpg'),(82,55,'5159d982190fc-55produto_album.jpg'),(83,56,'5159daa035ca1-56produto_minibox.jpg'),(84,57,'5159db6e5ad2f-57produto_portaretrato.jpg'),(85,58,'5159dc6482115-58produto_caixamdf.jpg'),(86,59,'5159dd3593e8f-59produto_ima.jpg');
/*!40000 ALTER TABLE `foto_produto` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `pedidos`
--

DROP TABLE IF EXISTS `pedidos`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `pedidos` (
  `ped_10_id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `user_10_id` int(10) NOT NULL,
  `produto_10_id` int(10) NOT NULL,
  `ped_10_quantidade` int(10) NOT NULL,
  `ped_10_status` int(10) NOT NULL,
  `ped_10_pag_status` int(10) NOT NULL,
  `ped_10_paymode` int(10) NOT NULL,
  `ped_22_created_at` int(11) NOT NULL,
  PRIMARY KEY (`ped_10_id`),
  KEY `user_10_id` (`user_10_id`,`produto_10_id`),
  KEY `produto_10_id` (`produto_10_id`),
  CONSTRAINT `pedidos_ibfk_2` FOREIGN KEY (`user_10_id`) REFERENCES `user` (`user_10_id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `pedidos_ibfk_3` FOREIGN KEY (`produto_10_id`) REFERENCES `produto` (`produto_10_id`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `pedidos`
--

LOCK TABLES `pedidos` WRITE;
/*!40000 ALTER TABLE `pedidos` DISABLE KEYS */;
/*!40000 ALTER TABLE `pedidos` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `pedidos_chart`
--

DROP TABLE IF EXISTS `pedidos_chart`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `pedidos_chart` (
  `cht_10_id` int(11) NOT NULL AUTO_INCREMENT,
  `user_10_id` int(11) NOT NULL,
  `produto_10_id` int(11) NOT NULL,
  `cht_35_config` text NOT NULL,
  `cht_10_quantidade` int(11) NOT NULL,
  `cht_22_created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`cht_10_id`)
) ENGINE=InnoDB AUTO_INCREMENT=12 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `pedidos_chart`
--

LOCK TABLES `pedidos_chart` WRITE;
/*!40000 ALTER TABLE `pedidos_chart` DISABLE KEYS */;
INSERT INTO `pedidos_chart` VALUES (1,14,59,'https://fbcdn-sphotos-b-a.akamaihd.net/hphotos-ak-ash3/s720x720/600041_537886352901284_1825963265_n.jpg;https://fbcdn-sphotos-c-a.akamaihd.net/hphotos-ak-prn1/579570_10200509261523913_1057467673_n.jpg;https://fbcdn-sphotos-c-a.akamaihd.net/hphotos-ak-prn1/579570_10200509261523913_1057467673_n.jpg;https://fbcdn-sphotos-b-a.akamaihd.net/hphotos-ak-ash3/s720x720/600041_537886352901284_1825963265_n.jpg;https://fbcdn-sphotos-b-a.akamaihd.net/hphotos-ak-ash3/s720x720/600041_537886352901284_1825963265_n.jpg;https://fbcdn-sphotos-b-a.akamaihd.net/hphotos-ak-ash3/s720x720/600041_537886352901284_1825963265_n.jpg;https://fbcdn-sphotos-g-a.akamaihd.net/hphotos-ak-prn1/65807_512862942070292_529770085_n.jpg;https://fbcdn-sphotos-g-a.akamaihd.net/hphotos-ak-prn1/65807_512862942070292_529770085_n.jpg;https://fbcdn-sphotos-g-a.akamaihd.net/hphotos-ak-prn1/65807_512862942070292_529770085_n.jpg;https://fbcdn-sphotos-g-a.akamaihd.net/hphotos-ak-prn1/65807_512862942070292_529770085_n.jpg;https://fbcdn-sphotos-g-a.akamaihd.net/hphotos-ak-prn1/65807_512862942070292_529770085_n.jpg;https://fbcdn-sphotos-g-a.akamaihd.net/hphotos-ak-prn1/65807_512862942070292_529770085_n.jpg',2,'0000-00-00 00:00:00'),(2,14,0,'',0,'0000-00-00 00:00:00'),(3,14,59,'https://fbcdn-sphotos-b-a.akamaihd.net/hphotos-ak-ash3/s720x720/600041_537886352901284_1825963265_n.jpg;https://fbcdn-sphotos-c-a.akamaihd.net/hphotos-ak-prn1/579570_10200509261523913_1057467673_n.jpg;https://fbcdn-sphotos-c-a.akamaihd.net/hphotos-ak-prn1/579570_10200509261523913_1057467673_n.jpg;https://fbcdn-sphotos-b-a.akamaihd.net/hphotos-ak-ash3/s720x720/600041_537886352901284_1825963265_n.jpg;https://fbcdn-sphotos-b-a.akamaihd.net/hphotos-ak-ash3/s720x720/600041_537886352901284_1825963265_n.jpg;https://fbcdn-sphotos-b-a.akamaihd.net/hphotos-ak-ash3/s720x720/600041_537886352901284_1825963265_n.jpg;https://fbcdn-sphotos-g-a.akamaihd.net/hphotos-ak-prn1/65807_512862942070292_529770085_n.jpg;https://fbcdn-sphotos-g-a.akamaihd.net/hphotos-ak-prn1/65807_512862942070292_529770085_n.jpg;https://fbcdn-sphotos-g-a.akamaihd.net/hphotos-ak-prn1/65807_512862942070292_529770085_n.jpg;https://fbcdn-sphotos-g-a.akamaihd.net/hphotos-ak-prn1/65807_512862942070292_529770085_n.jpg;https://fbcdn-sphotos-g-a.akamaihd.net/hphotos-ak-prn1/65807_512862942070292_529770085_n.jpg;https://fbcdn-sphotos-g-a.akamaihd.net/hphotos-ak-prn1/65807_512862942070292_529770085_n.jpg',3,'0000-00-00 00:00:00'),(4,14,0,'',0,'0000-00-00 00:00:00'),(5,14,59,'https://fbcdn-sphotos-b-a.akamaihd.net/hphotos-ak-ash3/s720x720/600041_537886352901284_1825963265_n.jpg;https://fbcdn-sphotos-c-a.akamaihd.net/hphotos-ak-prn1/579570_10200509261523913_1057467673_n.jpg;https://fbcdn-sphotos-c-a.akamaihd.net/hphotos-ak-prn1/579570_10200509261523913_1057467673_n.jpg;https://fbcdn-sphotos-b-a.akamaihd.net/hphotos-ak-ash3/s720x720/600041_537886352901284_1825963265_n.jpg;https://fbcdn-sphotos-b-a.akamaihd.net/hphotos-ak-ash3/s720x720/600041_537886352901284_1825963265_n.jpg;https://fbcdn-sphotos-b-a.akamaihd.net/hphotos-ak-ash3/s720x720/600041_537886352901284_1825963265_n.jpg;https://fbcdn-sphotos-g-a.akamaihd.net/hphotos-ak-prn1/65807_512862942070292_529770085_n.jpg;https://fbcdn-sphotos-g-a.akamaihd.net/hphotos-ak-prn1/65807_512862942070292_529770085_n.jpg;https://fbcdn-sphotos-g-a.akamaihd.net/hphotos-ak-prn1/65807_512862942070292_529770085_n.jpg;https://fbcdn-sphotos-g-a.akamaihd.net/hphotos-ak-prn1/65807_512862942070292_529770085_n.jpg;https://fbcdn-sphotos-g-a.akamaihd.net/hphotos-ak-prn1/65807_512862942070292_529770085_n.jpg;https://fbcdn-sphotos-g-a.akamaihd.net/hphotos-ak-prn1/65807_512862942070292_529770085_n.jpg',2,'0000-00-00 00:00:00'),(6,17,59,'http://distilleryimage0.s3.amazonaws.com/74bfd2ec85c011e29e3522000a9f18ab_7.jpg;http://distilleryimage0.s3.amazonaws.com/268607f485c011e2ae2122000a9e0911_7.jpg;http://distilleryimage4.s3.amazonaws.com/856c318c903111e2b7d622000a1f968a_7.jpg;http://distilleryimage1.s3.amazonaws.com/0f49c176941f11e2940222000a1fbd52_7.jpg;http://distilleryimage6.s3.amazonaws.com/437d69307ac411e2829522000a1fa769_7.jpg;http://distilleryimage0.s3.amazonaws.com/268607f485c011e2ae2122000a9e0911_7.jpg;http://distilleryimage0.s3.amazonaws.com/7d17cb247ea011e28cc022000a9f308d_7.jpg;http://distilleryimage9.s3.amazonaws.com/5b765ab281f711e2a2f822000a1f97e4_7.jpg;http://distilleryimage11.s3.amazonaws.com/9f98814881f711e2992f22000a1fb823_7.jpg;http://distilleryimage0.s3.amazonaws.com/1e481a7475e811e2aeda22000a1f973b_7.jpg;http://distilleryimage0.s3.amazonaws.com/a2eef0ac610911e28ddc22000a9f15db_7.jpg;http://distilleryimage4.s3.amazonaws.com/cb6d74e4625411e28e1522000a1f9a99_7.jpg',1,'0000-00-00 00:00:00'),(7,17,0,'',0,'0000-00-00 00:00:00'),(8,17,59,'http://distilleryimage0.s3.amazonaws.com/74bfd2ec85c011e29e3522000a9f18ab_7.jpg;http://distilleryimage4.s3.amazonaws.com/856c318c903111e2b7d622000a1f968a_7.jpg;http://distilleryimage0.s3.amazonaws.com/268607f485c011e2ae2122000a9e0911_7.jpg;http://distilleryimage3.s3.amazonaws.com/e248a988838b11e2a46122000a9d0dc6_7.jpg;http://distilleryimage6.s3.amazonaws.com/437d69307ac411e2829522000a1fa769_7.jpg;http://distilleryimage4.s3.amazonaws.com/13612bbe7ac511e2b61322000a1f9358_7.jpg;http://distilleryimage9.s3.amazonaws.com/5b765ab281f711e2a2f822000a1f97e4_7.jpg;http://distilleryimage11.s3.amazonaws.com/9f98814881f711e2992f22000a1fb823_7.jpg;http://distilleryimage3.s3.amazonaws.com/9b0f94fe7a2711e29d0322000a1f97e3_7.jpg;http://distilleryimage0.s3.amazonaws.com/1e481a7475e811e2aeda22000a1f973b_7.jpg;http://distilleryimage3.s3.amazonaws.com/ef3dd09266f211e28efa22000a1fbd9c_7.jpg;http://distilleryimage4.s3.amazonaws.com/cb6d74e4625411e28e1522000a1f9a99_7.jpg',1,'0000-00-00 00:00:00'),(9,17,59,'http://distilleryimage4.s3.amazonaws.com/f5a6796866f511e2ba9922000a1f9c9a_7.jpg;http://distilleryimage3.s3.amazonaws.com/ef3dd09266f211e28efa22000a1fbd9c_7.jpg;http://distilleryimage4.s3.amazonaws.com/cb6d74e4625411e28e1522000a1f9a99_7.jpg;http://distilleryimage0.s3.amazonaws.com/a2eef0ac610911e28ddc22000a9f15db_7.jpg;http://distilleryimage0.s3.amazonaws.com/9c026e86610911e294a422000a1f9874_7.jpg;http://distilleryimage8.s3.amazonaws.com/3ffcd1ec670511e29fa922000a1f8feb_7.jpg;http://distilleryimage7.s3.amazonaws.com/d87aac0a68a411e28c1022000a9e08e0_7.jpg;http://distilleryimage4.s3.amazonaws.com/4ad76d9268a511e282c522000a1fa433_7.jpg;http://distilleryimage0.s3.amazonaws.com/1e481a7475e811e2aeda22000a1f973b_7.jpg;http://distilleryimage3.s3.amazonaws.com/9b0f94fe7a2711e29d0322000a1f97e3_7.jpg;http://distilleryimage3.s3.amazonaws.com/ef3dd09266f211e28efa22000a1fbd9c_7.jpg;http://distilleryimage4.s3.amazonaws.com/13612bbe7ac511e2b61322000a1f9358_7.jpg',1,'0000-00-00 00:00:00'),(10,17,59,'http://distilleryimage9.s3.amazonaws.com/b66da1dc8bfc11e293e422000a1fbe78_7.jpg;http://distilleryimage9.s3.amazonaws.com/b549943c139811e2be981231380f620c_7.jpg;http://distilleryimage0.s3.amazonaws.com/5fc30d38131911e2a4431231381407ca_7.jpg;http://distilleryimage11.s3.amazonaws.com/71676a38131011e2a23c22000a1de655_7.jpg;http://distilleryimage11.s3.amazonaws.com/71676a38131011e2a23c22000a1de655_7.jpg;http://distilleryimage11.s3.amazonaws.com/71676a38131011e2a23c22000a1de655_7.jpg;http://distilleryimage11.s3.amazonaws.com/71676a38131011e2a23c22000a1de655_7.jpg;http://distilleryimage11.s3.amazonaws.com/71676a38131011e2a23c22000a1de655_7.jpg;http://distilleryimage11.s3.amazonaws.com/71676a38131011e2a23c22000a1de655_7.jpg;http://distilleryimage11.s3.amazonaws.com/71676a38131011e2a23c22000a1de655_7.jpg;http://distilleryimage11.s3.amazonaws.com/71676a38131011e2a23c22000a1de655_7.jpg;http://distilleryimage11.s3.amazonaws.com/71676a38131011e2a23c22000a1de655_7.jpg',1,'0000-00-00 00:00:00'),(11,17,59,'http://distilleryimage1.s3.amazonaws.com/0f49c176941f11e2940222000a1fbd52_7.jpg;http://distilleryimage0.s3.amazonaws.com/74bfd2ec85c011e29e3522000a9f18ab_7.jpg;http://distilleryimage0.s3.amazonaws.com/268607f485c011e2ae2122000a9e0911_7.jpg;http://distilleryimage3.s3.amazonaws.com/e248a988838b11e2a46122000a9d0dc6_7.jpg;http://distilleryimage6.s3.amazonaws.com/437d69307ac411e2829522000a1fa769_7.jpg;http://distilleryimage4.s3.amazonaws.com/13612bbe7ac511e2b61322000a1f9358_7.jpg;http://distilleryimage0.s3.amazonaws.com/7d17cb247ea011e28cc022000a9f308d_7.jpg;http://distilleryimage9.s3.amazonaws.com/5b765ab281f711e2a2f822000a1f97e4_7.jpg;http://distilleryimage11.s3.amazonaws.com/9f98814881f711e2992f22000a1fb823_7.jpg;http://distilleryimage3.s3.amazonaws.com/9b0f94fe7a2711e29d0322000a1f97e3_7.jpg;http://distilleryimage0.s3.amazonaws.com/1e481a7475e811e2aeda22000a1f973b_7.jpg;http://distilleryimage4.s3.amazonaws.com/4ad76d9268a511e282c522000a1fa433_7.jpg',1,'0000-00-00 00:00:00');
/*!40000 ALTER TABLE `pedidos_chart` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `produto`
--

DROP TABLE IF EXISTS `produto`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `produto` (
  `produto_10_id` int(11) NOT NULL AUTO_INCREMENT,
  `produto_30_nome` varchar(255) NOT NULL,
  `produto_30_desc_curta` varchar(255) NOT NULL,
  `produto_60_desc_completa` longtext NOT NULL,
  `produto_20_valor` decimal(10,2) NOT NULL,
  `produto_20_frete` decimal(10,2) NOT NULL,
  `produto_40_cores` text NOT NULL,
  `produto_20_peso` decimal(10,3) NOT NULL,
  `produto_30_banner` varchar(255) NOT NULL,
  `produto_30_foto` varchar(255) NOT NULL,
  `produto_10_prazo_producao` int(10) NOT NULL,
  `produto_10_largura_minima` int(10) NOT NULL,
  `produto_10_altura_minima` int(10) NOT NULL,
  `produto_10_minimo_fotos` int(10) NOT NULL,
  `produto_12_active` int(1) NOT NULL,
  PRIMARY KEY (`produto_10_id`)
) ENGINE=InnoDB AUTO_INCREMENT=60 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `produto`
--

LOCK TABLES `produto` WRITE;
/*!40000 ALTER TABLE `produto` DISABLE KEYS */;
INSERT INTO `produto` VALUES (48,'Stickers','25 Stickers, 5x5cm, R$ 24,00','Ã‰ muito divertido ter suas fotos impressas em pequenos adesivos para poder colar onde quiser! FaÃ§a seus primeiros 25 stickers e experimente... VocÃª vai pedir mais! 25 Stickers, 5x5cm, R$ 24,50','24.50','0.00','','80.000','5159c317d10c1-produto_sticker.jpg','5159c317e929d-produto_sticker.jpg',5,5,5,25,1),(49,'Squares','20 mini squares, 10x10cm, R$ 24,00 - 10 squares, 13x13cm, R$18,00','ImpressÃµes em papel fotogrÃ¡fico fosco para vocÃª montar seus Ã¡lbuns, arquivar nas miniboxes (link) ou espalhar por aÃ­! OpÃ§Ãµes: 20 mini squares, 10x10cm, R$ 24,00 - 10 squares, 13x13cm, R$ 18,00','24.00','0.00','','35.000','5159c6b0888b3-produto_squeres.jpg','5159c6b097f3f-produto_squeres.jpg',5,10,10,20,1),(50,'Cards','36 cards, 7x9cm, R$ 50,00','ImpressÃµes feitas em papel de alta densidade com acabamento fosco. Lembram o estilo polaroid, deixando uma pequena margem abaixo da imagem para anotaÃ§Ãµes ou legendas. Se vocÃª Ã© um photolover, vocÃª precisa criar seus cards! 36 cards, 7x9cm, R$ 50,00','50.00','0.00','','69.000','5159cb413b25f-produto_cards.jpg','5159cb41480ea-produto_cards.jpg',5,7,9,36,1),(51,'Minibook','Minibook 9x10cm. Confira opÃ§Ãµes Ã  partir de R$ 40,00','Montar minibooks Ã© uma Ã³tima maneira de criar um arquivo com suas fotos. FaÃ§a minibooks e organize-os na sua memory box (link para imagem detalhe da memory box). OpÃ§Ãµes: 2 minibooks com 24 fotos, 9x10cm, R$ 58,00 / 1 minibook com 48 fotos, 9x10cm, R$ 40,00 / 10 minibooks com 48 fotos casa, 9x10cm, R$ 369,00/ ganhe 1 memory box.','0.00','0.00','','83.000','5159cf00b956c-produto_minibook.jpg','5159cf00c84db-produto_minibook.jpg',5,9,10,24,1),(52,'Postais','12 postais, 15x15cm, R$ 12,99','Divirta-se criando postais com as suas fotos! Essa pode ser uma maneira diferente de mandar  um \"oi\" ou desejar um feliz aniversÃ¡rio pra alguÃ©m... 12 postais, 15x15cm, R$ 12,99.','12.99','0.00','','85.000','5159d655c56b7-produto_postais.jpg','5159d655d16c9-produto_postais.jpg',5,15,15,12,1),(53,'Canvas','30x30cm, R$ 95,90','Imagine uma foto impressa em uma tela, como uma obra de arte... Pronto! Quer que a gente mande esse quadro para sua casa? 30x30cm, R$ 95,90.','95.90','0.00','','433.000','5159d70d9ea1e-produto_canvas.jpg','5159d70dc7e82-produto_canvas.jpg',5,30,30,1,1),(54,'Quadro','30x30cm, R$ 85,90','Este quadro valoriza qualquer imagem... Uma impressÃ£o incrÃ­vel e laminaÃ§Ã£o fosca para vocÃª exibir o seu talento fotogrÃ¡fico. 30x30cm, R$ 85,90.','85.90','0.00','','445.000','5159d871456e3-produto_quadro.jpg','5159d8715062a-produto_quadro.jpg',5,30,30,1,1),(55,'Ãlbum','20x20cm, R$45,90','Ãlbum com a foto que vocÃª escolher na capa e 30 pÃ¡ginas de alta gramatura para personalizar com seus squares (link para squares) prediletos - 20x20cm, R$ 45,90.','45.90','0.00','','400.000','5159d981f1c17-produto_album.jpg','5159d9820ed3f-produto_album.jpg',5,20,20,1,1),(56,'Minibox','10x10x5cm, R$9,90','O que cabe nesta caixa? Nove brigadeiros, quatro pÃ£es de mel, um bloquinho de notas ou  muitos clips, enfim... Escolha a sua foto e a cor da minibox com certeza vocÃª encontrarÃ¡ uma utilidade para ela! 10x10x5cm, R$ 9,90 (deixar opÃ§Ã£o no sistema para cadastrar novos formatos de caixas que aparecerÃ£o como opÃ§Ã£o de tamanho).','9.90','0.00','','96.000','5159daa01fc77-produto_minibox.jpg','5159daa02b84f-produto_minibox.jpg',5,10,10,1,1),(57,'Porta-retrato','19x19cm, R$25,50','A moldura pode ser preta ou branca e este porta-retratos tambÃ©m pode ser pendurado como um quadro - 19x19cm, R$ 25,00 (deixar opÃ§Ã£o no sistena para cadastrar novos formatos de caixas que aparecerÃ£o como opÃ§Ã£o de tamanho).','25.50','0.00','','370.000','5159db6e0c8d9-produto_portaretrato.jpg','5159db6e4b56e-produto_portaretrato.jpg',5,19,19,1,1),(58,'Caixa MDF','15x15x13cm, R$ 119,90','Caixa em MDF totalmente personalizada. Escolha suas fotos para compor tampa e laterais. VocÃª vai usÃ¡-la como arquivo e como peÃ§a de decoraÃ§Ã£o. 15x15x13cm, R$ 119,90 (deixar opÃ§Ã£o no sistema para cadastrar novos formatos de caixas que aparecerÃ£o como opÃ§Ã£o de tamanho, isso implicarÃ¡ em uma faca diferente).','119.90','0.00','','630.000','5159dc646ef1c-produto_caixamdf.jpg','5159dc647a9f0-produto_caixamdf.jpg',5,15,15,1,1),(59,'ImÃ£','12 Ã­mÃ£s, 5x5cm, R$ 18,00','Selecione suas fotos preferidas e crie imÃ£s. Ideais para enfeitar a porta da geladeira, segurar recados ou para presentear os convidados de sua festa! OpÃ§Ãµes: 12 imÃ£s 5x5cm R$ 18,00 / 10 imÃ£s, 7x7cm, R$ 20,00','18.00','0.00','','60.000','5159dd35489e6-produto_ima.jpg','5159dd358261d-produto_ima.jpg',5,5,5,12,1);
/*!40000 ALTER TABLE `produto` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `produto_fornecedor`
--

DROP TABLE IF EXISTS `produto_fornecedor`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `produto_fornecedor` (
  `produto_fornecedor_10_id` int(11) NOT NULL AUTO_INCREMENT,
  `produto_fornecedor_10_id_produto` int(11) NOT NULL,
  `produto_fornecedor_10_id_fornecedor` int(11) NOT NULL,
  PRIMARY KEY (`produto_fornecedor_10_id`)
) ENGINE=InnoDB AUTO_INCREMENT=106 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `produto_fornecedor`
--

LOCK TABLES `produto_fornecedor` WRITE;
/*!40000 ALTER TABLE `produto_fornecedor` DISABLE KEYS */;
INSERT INTO `produto_fornecedor` VALUES (24,16,10),(25,16,12),(26,18,12),(27,18,10),(28,19,12),(29,19,10),(32,21,12),(33,21,10),(38,23,10),(39,23,12),(40,22,12),(41,22,10),(42,20,12),(43,20,10),(44,24,12),(45,24,10),(46,25,10),(47,26,12),(48,26,10),(49,27,10),(50,28,10),(51,29,10),(52,30,10),(53,31,10),(54,32,10),(58,33,10),(65,39,10),(71,45,10),(74,34,10),(80,40,10),(81,41,10),(82,42,10),(83,43,10),(84,44,10),(85,46,10),(86,47,10),(87,35,10),(88,36,10),(89,37,10),(90,38,10),(92,49,10),(93,50,10),(94,51,10),(95,52,10),(96,53,10),(97,54,10),(98,55,10),(99,56,10),(100,57,10),(101,58,10),(102,59,10),(105,48,12);
/*!40000 ALTER TABLE `produto_fornecedor` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `ultimos_logados`
--

DROP TABLE IF EXISTS `ultimos_logados`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `ultimos_logados` (
  `ultimo_10_id` int(11) NOT NULL AUTO_INCREMENT,
  `ultimo_30_id_conta` varchar(255) NOT NULL,
  `ultimo_10_tipo_conta` int(11) NOT NULL,
  `user_10_id` int(11) NOT NULL,
  PRIMARY KEY (`ultimo_10_id`)
) ENGINE=InnoDB AUTO_INCREMENT=20 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `ultimos_logados`
--

LOCK TABLES `ultimos_logados` WRITE;
/*!40000 ALTER TABLE `ultimos_logados` DISABLE KEYS */;
INSERT INTO `ultimos_logados` VALUES (1,'100001472313325',2,14),(2,'524988561',2,13),(3,'524988561',2,1),(4,'524988561',2,1),(5,'231699433',1,1),(6,'231699433',1,1),(7,'15929679',1,1),(8,'15929679',1,1),(9,'231699433',1,1),(10,'524988561',2,1),(11,'231699433',1,1),(12,'100001472313325',2,1),(13,'524988561',2,1),(14,'15929679',1,1),(15,'15929679',1,1),(16,'15929679',1,1),(17,'524988561',2,19),(18,'15929679',1,17),(19,'231699433',1,17);
/*!40000 ALTER TABLE `ultimos_logados` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `user`
--

DROP TABLE IF EXISTS `user`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `user` (
  `user_10_id` int(11) NOT NULL AUTO_INCREMENT,
  `user_30_nome` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `user_30_contato` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `user_30_doc1` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `user_30_doc2` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `user_10_tel_ddd` int(2) NOT NULL,
  `user_10_tel` int(10) NOT NULL,
  `user_30_endereco` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `user_30_obs` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `user_30_username` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `user_30_password` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `user_30_email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `user_12_type` int(2) NOT NULL,
  `user_12_active` int(1) NOT NULL,
  PRIMARY KEY (`user_10_id`)
) ENGINE=InnoDB AUTO_INCREMENT=25 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `user`
--

LOCK TABLES `user` WRITE;
/*!40000 ALTER TABLE `user` DISABLE KEYS */;
INSERT INTO `user` VALUES (1,'','','','',0,0,'','','admin','MjEyMzJmMjk3YTU3YTVhNzQzODk0YTBlNGE4MDFmYzM=','andre.simoes@quup.com.br',1,1),(8,'','','','',0,0,'','','youniquevisual','Y2Y3MjVhMGM3NDU5YmM4NzA2ZmZkNTBlNDRjOTllZDY=','pedro@youniquevisual.com.br',2,1),(9,'','','','',0,0,'','','larplasticos','YTJmZGQ5YzdiN2U4ZTk0ZTQwMTEwNmM0ZTFhY2IzNDc=','andre@larplasticos.com.br',2,1),(11,'administrador','Gerente de vendas','','',11,544234532,'','','administrador','MTE1MmQ4NTNhNGFkMDc1MjA3NmM0YTNhYzcyNjgyNjE=','administrador@administrador.com.br',2,1),(12,'Empresa de venda 2','JosÃ©','','',11,33322342,'EndereÃ§o da empresa','ObservaÃ§Ãµes','fornecedor2','YTJjYTBmYTQxZjQ4ZmIwNmEzYmE5MjJmMjYyMTJmZDI=','zezim@vendaempresa2.com.br',3,1),(17,'Teste da Silva','Teste da Silva','1111111','11111',11,111111,'Rua do Teste, 234','','teste','MjEyMzJmMjk3YTU3YTVhNzQzODk0YTBlNGE4MDFmYzM=','silotto@weeby.com.br',2,1),(19,'Teste','Teste','1111','1111',11,111111,'Rua Teste,11','','teste2','MDUzZTNkODJlMzBkZGNlNDY2ZDNiNjhhZmRjZjEwYmY=','teste@teste.com',2,1),(22,'Reinaldo Silotto','Reinaldo Silotto','16824818836','265713985',11,222,'Rua Teste, 222','','teste4','ZDZjNzg4NWNkOGIwM2E5ZmMxMTBkMmM3MGZiNTMyMTU=','silotto@weeby.com.br',2,1),(23,'Reinaldo Silotto','Reinaldo Silotto','16824818836','265713985',11,2222,'Rua Teste, 222','','testando','OWIwMmQzNzgzZDFlNjhmNjExMGY0OGQ4OTI4Y2Y3ZDk=','reinaldo@labssj.com.br',2,1),(24,'Giovanni Giannichi','Giovanni Giannichi','111111111-11','22222222-2',11,11111111,'Rua Francisco Lipi,88','','giovanni','NGMxNzNmZmQxZmFhZjkwZTA3NzRkNzJhYWE4YjJmNTc=','giogiannichi@gmail.com',2,1);
/*!40000 ALTER TABLE `user` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Dumping routines for database 'instagift'
--
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2013-04-23 10:06:43

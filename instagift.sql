-- phpMyAdmin SQL Dump
-- version 3.4.9
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Jan 22, 2013 at 01:44 AM
-- Server version: 5.5.22
-- PHP Version: 5.3.13

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `instagift`
--

-- --------------------------------------------------------

--
-- Table structure for table `foto_produto`
--

CREATE TABLE IF NOT EXISTS `foto_produto` (
  `foto_produto_10_id` int(11) NOT NULL AUTO_INCREMENT,
  `foto_produto_10_id_produto` int(11) NOT NULL,
  `foto_produto_30_url` varchar(255) NOT NULL,
  PRIMARY KEY (`foto_produto_10_id`),
  KEY `foto_produto_ibfk_1` (`foto_produto_10_id_produto`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=47 ;

-- --------------------------------------------------------

--
-- Table structure for table `pedidos`
--

CREATE TABLE IF NOT EXISTS `pedidos` (
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
  KEY `produto_10_id` (`produto_10_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `produto`
--

CREATE TABLE IF NOT EXISTS `produto` (
  `produto_10_id` int(11) NOT NULL AUTO_INCREMENT,
  `produto_30_nome` varchar(255) NOT NULL,
  `produto_30_desc_curta` varchar(255) NOT NULL,
  `produto_60_desc_completa` longtext NOT NULL,
  `produto_20_valor` decimal(10,2) NOT NULL,
  `produto_20_peso` decimal(10,3) NOT NULL,
  `produto_30_banner` varchar(255) NOT NULL,
  `produto_10_prazo_producao` int(10) NOT NULL,
  `produto_10_largura_minima` int(10) NOT NULL,
  `produto_10_altura_minima` int(10) NOT NULL,
  `produto_10_minimo_fotos` int(10) NOT NULL,
  `produto_12_active` int(1) NOT NULL,
  PRIMARY KEY (`produto_10_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=25 ;

--
-- Dumping data for table `produto`
--

INSERT INTO `produto` (`produto_10_id`, `produto_30_nome`, `produto_30_desc_curta`, `produto_60_desc_completa`, `produto_20_valor`, `produto_20_peso`, `produto_30_banner`, `produto_10_prazo_producao`, `produto_10_largura_minima`, `produto_10_altura_minima`, `produto_10_minimo_fotos`, `produto_12_active`) VALUES
(24, 'ImÃ£ de geladeira', 'ImÃ£ de geladeira, personalizado a partir do gosto do cliente', 'DescriÃ§Ã£o completa', 250.00, 0.100, '50fe09fc1e186-imas.jpg', 15, 350, 350, 30, 1);

-- --------------------------------------------------------

--
-- Table structure for table `produto_fornecedor`
--

CREATE TABLE IF NOT EXISTS `produto_fornecedor` (
  `produto_fornecedor_10_id` int(11) NOT NULL AUTO_INCREMENT,
  `produto_fornecedor_10_id_produto` int(11) NOT NULL,
  `produto_fornecedor_10_id_fornecedor` int(11) NOT NULL,
  PRIMARY KEY (`produto_fornecedor_10_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=46 ;

--
-- Dumping data for table `produto_fornecedor`
--

INSERT INTO `produto_fornecedor` (`produto_fornecedor_10_id`, `produto_fornecedor_10_id_produto`, `produto_fornecedor_10_id_fornecedor`) VALUES
(24, 16, 10),
(25, 16, 12),
(26, 18, 12),
(27, 18, 10),
(28, 19, 12),
(29, 19, 10),
(32, 21, 12),
(33, 21, 10),
(38, 23, 10),
(39, 23, 12),
(40, 22, 12),
(41, 22, 10),
(42, 20, 12),
(43, 20, 10),
(44, 24, 12),
(45, 24, 10);

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE IF NOT EXISTS `user` (
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
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=13 ;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`user_10_id`, `user_30_nome`, `user_30_contato`, `user_30_doc1`, `user_30_doc2`, `user_10_tel_ddd`, `user_10_tel`, `user_30_endereco`, `user_30_obs`, `user_30_username`, `user_30_password`, `user_30_email`, `user_12_type`, `user_12_active`) VALUES
(1, '', '', '', '', 0, 0, '', '', 'admin', 'MjEyMzJmMjk3YTU3YTVhNzQzODk0YTBlNGE4MDFmYzM=', 'andre.simoes@quup.com.br', 1, 1),
(8, '', '', '', '', 0, 0, '', '', 'youniquevisual', 'Y2Y3MjVhMGM3NDU5YmM4NzA2ZmZkNTBlNDRjOTllZDY=', 'pedro@youniquevisual.com.br', 2, 1),
(9, '', '', '', '', 0, 0, '', '', 'larplasticos', 'YTJmZGQ5YzdiN2U4ZTk0ZTQwMTEwNmM0ZTFhY2IzNDc=', 'andre@larplasticos.com.br', 2, 1),
(10, 'Empresa de venda', 'Contato', '', '', 11, 22223333, 'Rua VoluntÃ¡rios da PÃ¡tria, 2820, sala 58', 'observaÃ§Ã£o', 'fornecedor1', 'YWJiOGU4OTBiZjZiMTMwMWU0YTIxMDZkNGM1NDhmNzM=', 'andre.simoes@quup.com.br', 3, 1),
(11, 'administrador', 'Gerente de vendas', '', '', 11, 544234532, '', '', 'administrador', 'MTE1MmQ4NTNhNGFkMDc1MjA3NmM0YTNhYzcyNjgyNjE=', 'administrador@administrador.com.br', 2, 1),
(12, 'Empresa de venda 2', 'JosÃ©', '', '', 11, 33322342, 'EndereÃ§o da empresa', 'ObservaÃ§Ãµes', 'fornecedor2', 'YTJjYTBmYTQxZjQ4ZmIwNmEzYmE5MjJmMjYyMTJmZDI=', 'zezim@vendaempresa2.com.br', 3, 1);

--
-- Constraints for dumped tables
--

--
-- Constraints for table `foto_produto`
--
ALTER TABLE `foto_produto`
  ADD CONSTRAINT `foto_produto_ibfk_1` FOREIGN KEY (`foto_produto_10_id_produto`) REFERENCES `produto` (`produto_10_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `pedidos`
--
ALTER TABLE `pedidos`
  ADD CONSTRAINT `pedidos_ibfk_2` FOREIGN KEY (`user_10_id`) REFERENCES `user` (`user_10_id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `pedidos_ibfk_3` FOREIGN KEY (`produto_10_id`) REFERENCES `produto` (`produto_10_id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

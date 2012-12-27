-- phpMyAdmin SQL Dump
-- version 3.4.9
-- http://www.phpmyadmin.net
--
-- Servidor: localhost
-- Tempo de Geração: 15/09/2012 às 20h34min
-- Versão do Servidor: 5.5.22
-- Versão do PHP: 5.3.13

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Banco de Dados: `instagift`
--

-- --------------------------------------------------------

--
-- Estrutura da tabela `foto_produto`
--

CREATE TABLE IF NOT EXISTS `foto_produto` (
  `foto_produto_10_id` int(11) NOT NULL AUTO_INCREMENT,
  `foto_produto_10_id_produto` int(11) NOT NULL,
  `foto_produto_30_url` varchar(255) NOT NULL,
  PRIMARY KEY (`foto_produto_10_id`),
  KEY `foto_produto_ibfk_1` (`foto_produto_10_id_produto`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=40 ;

--
-- Extraindo dados da tabela `foto_produto`
--

INSERT INTO `foto_produto` (`foto_produto_10_id`, `foto_produto_10_id_produto`, `foto_produto_30_url`) VALUES
(1, 11, '505265a3d00ce-11Roupas-Abercrombie-Fitch.jpg'),
(2, 11, '505265a3e058f-11'),
(3, 11, '505265a3eb4fe-11'),
(4, 11, '505265a3f3768-11nike.png'),
(5, 11, '505265a40a38d-11'),
(6, 11, '505265a417d9f-11adidas (4).gif'),
(7, 11, '505265a4200d5-11adidas (4).gif'),
(8, 12, '505265c6b7181-12Roupas-Abercrombie-Fitch.jpg'),
(9, 12, '505265c6daab0-12'),
(10, 12, '505265c6eadc6-12'),
(11, 12, '505265c7070f7-12nike.png'),
(12, 12, '505265c72fddf-12'),
(13, 12, '505265c73ace3-12adidas (4).gif'),
(14, 12, '505265c75e3a9-12adidas (4).gif'),
(15, 13, '5052662981a13-13Roupas-Abercrombie-Fitch.jpg'),
(16, 13, '50526629a2533-13nike.png'),
(17, 13, '50526629c3023-13adidas (4).gif'),
(18, 13, '50526629ebd1b-13adidas (4).gif'),
(19, 13, '5052662a15a1a-13'),
(20, 13, '5052662a208cd-13'),
(21, 13, '5052662a2b73d-13'),
(22, 14, '505266a9a88ea-14Roupas-Abercrombie-Fitch.jpg'),
(23, 14, '505266a9c122b-14nike.png'),
(24, 14, '505266a9e1c46-14adidas (4).gif'),
(25, 14, '505266aa13bd4-14adidas (4).gif'),
(26, 14, '505266aa3466f-14'),
(27, 14, '505266aa47776-14'),
(28, 14, '505266aa62a50-14'),
(29, 16, '505267238eca0-16Roupas-Abercrombie-Fitch.jpg'),
(31, 16, '50526723d0235-16adidas (4).gif'),
(37, 16, '5053671beed96-16nike.png'),
(38, 16, '5053671c1e874-16lg1.jpg'),
(39, 16, '5053671c44a9a-16Logo_Ecko_Presse_RGB-757862.jpg');

-- --------------------------------------------------------

--
-- Estrutura da tabela `pedidos`
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
-- Estrutura da tabela `produto`
--

CREATE TABLE IF NOT EXISTS `produto` (
  `produto_10_id` int(11) NOT NULL AUTO_INCREMENT,
  `produto_30_nome` varchar(255) NOT NULL,
  `produto_30_desc_curta` varchar(255) NOT NULL,
  `produto_60_desc_completa` longtext NOT NULL,
  `produto_20_valor` decimal(10,2) NOT NULL,
  `produto_20_peso` decimal(10,3) NOT NULL,
  `produto_10_prazo_producao` int(10) NOT NULL,
  `produto_10_largura_minima` int(10) NOT NULL,
  `produto_10_altura_minima` int(10) NOT NULL,
  `produto_10_minimo_fotos` int(10) NOT NULL,
  `produto_12_active` int(1) NOT NULL,
  PRIMARY KEY (`produto_10_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=18 ;

--
-- Extraindo dados da tabela `produto`
--

INSERT INTO `produto` (`produto_10_id`, `produto_30_nome`, `produto_30_desc_curta`, `produto_60_desc_completa`, `produto_20_valor`, `produto_20_peso`, `produto_10_prazo_producao`, `produto_10_largura_minima`, `produto_10_altura_minima`, `produto_10_minimo_fotos`, `produto_12_active`) VALUES
(1, 'teste', 'desc curta', 'Essa Ã© a descriÃ§Ã£o completa do produto, ele Ã© utilizado de diversas maneiras e tem muitaa importancia! ', 250.00, 35.000, 8, 400, 120, 7, 1),
(2, 'Porta retratos', 'Porta retratos para 30 fotos', 'Essa Ã© a descriÃ§Ã£o mais completa para o produto, ela aparecerÃ¡ dentro da pÃ¡gina do produto! \r\n\r\nMostra alguns detalhes especÃ­ficos e etc...', 250.00, 0.100, 15, 350, 350, 30, 1),
(3, 'Porta retratos', 'Porta retratos para 30 fotos', 'Essa Ã© a descriÃ§Ã£o mais completa para o produto, ela aparecerÃ¡ dentro da pÃ¡gina do produto! \r\n\r\nMostra alguns detalhes especÃ­ficos e etc...', 250.00, 0.100, 15, 350, 350, 30, 1),
(4, 'Porta retratos', 'Porta retratos para 30 fotos', 'Essa Ã© a descriÃ§Ã£o mais completa para o produto, ela aparecerÃ¡ dentro da pÃ¡gina do produto! \r\n\r\nMostra alguns detalhes especÃ­ficos e etc...', 250.00, 0.100, 15, 350, 350, 30, 1),
(5, 'Porta retratos', 'Porta retratos para 30 fotos', 'Essa Ã© a descriÃ§Ã£o mais completa para o produto, ela aparecerÃ¡ dentro da pÃ¡gina do produto! \r\n\r\nMostra alguns detalhes especÃ­ficos e etc...', 250.00, 0.100, 15, 350, 350, 30, 1),
(6, 'Porta retratos', 'Porta retratos para 30 fotos', 'Essa Ã© a descriÃ§Ã£o mais completa para o produto, ela aparecerÃ¡ dentro da pÃ¡gina do produto! \r\n\r\nMostra alguns detalhes especÃ­ficos e etc...', 250.00, 0.100, 15, 350, 350, 30, 1),
(7, 'Porta retratos', 'Porta retratos para 30 fotos', 'Essa Ã© a descriÃ§Ã£o mais completa para o produto, ela aparecerÃ¡ dentro da pÃ¡gina do produto! \r\n\r\nMostra alguns detalhes especÃ­ficos e etc...', 250.00, 0.100, 15, 350, 350, 30, 1),
(8, 'Porta retratos', 'Porta retratos para 30 fotos', 'Essa Ã© a descriÃ§Ã£o mais completa para o produto, ela aparecerÃ¡ dentro da pÃ¡gina do produto! \r\n\r\nMostra alguns detalhes especÃ­ficos e etc...', 250.00, 0.100, 15, 350, 350, 30, 1),
(9, 'Porta retratos', 'Porta retratos para 30 fotos', 'Essa Ã© a descriÃ§Ã£o mais completa para o produto, ela aparecerÃ¡ dentro da pÃ¡gina do produto! \r\n\r\nMostra alguns detalhes especÃ­ficos e etc...', 250.00, 0.100, 15, 350, 350, 30, 1),
(10, 'Porta retratos', 'Porta retratos para 30 fotos', 'Essa Ã© a descriÃ§Ã£o mais completa para o produto, ela aparecerÃ¡ dentro da pÃ¡gina do produto! \r\n\r\nMostra alguns detalhes especÃ­ficos e etc...', 250.00, 0.100, 15, 350, 350, 30, 1),
(11, 'Porta retratos', 'Porta retratos para 30 fotos', 'Essa Ã© a descriÃ§Ã£o mais completa para o produto, ela aparecerÃ¡ dentro da pÃ¡gina do produto! \r\n\r\nMostra alguns detalhes especÃ­ficos e etc...', 250.00, 0.100, 15, 350, 350, 30, 1),
(12, 'Porta retratos', 'Porta retratos para 30 fotos', 'Essa Ã© a descriÃ§Ã£o mais completa para o produto, ela aparecerÃ¡ dentro da pÃ¡gina do produto! \r\n\r\nMostra alguns detalhes especÃ­ficos e etc...', 250.00, 0.100, 15, 350, 350, 30, 1),
(13, 'Porta retratos', 'Porta retratos para 30 fotos', 'Essa Ã© a descriÃ§Ã£o mais completa para o produto, ela aparecerÃ¡ dentro da pÃ¡gina do produto! \r\n\r\nMostra alguns detalhes especÃ­ficos e etc...', 250.00, 0.100, 15, 350, 350, 30, 1),
(14, 'Porta retratos', 'Porta retratos para 30 fotos', 'Essa Ã© a descriÃ§Ã£o mais completa para o produto, ela aparecerÃ¡ dentro da pÃ¡gina do produto! \r\n\r\nMostra alguns detalhes especÃ­ficos e etc...', 250.00, 0.100, 15, 350, 350, 30, 1),
(15, 'Porta retratos', 'Porta retratos para 30 fotos', 'Essa Ã© a descriÃ§Ã£o mais completa para o produto, ela aparecerÃ¡ dentro da pÃ¡gina do produto! \r\n\r\nMostra alguns detalhes especÃ­ficos e etc...', 250.00, 0.100, 15, 350, 350, 30, 1),
(16, 'Cubo personalizado', 'Cubo personalizado', 'Cubo personalizadoCubo personalizadoCubo personalizadoCubo personalizado', 70.00, 0.200, 5, 400, 400, 6, 1),
(17, 'Porta retratos', 'Porta retratos para 30 fotos', 'Essa Ã© a descriÃ§Ã£o mais completa para o produto, ela aparecerÃ¡ dentro da pÃ¡gina do produto! \r\n\r\nMostra alguns detalhes especÃ­ficos e etc...', 250.00, 0.100, 15, 350, 350, 30, 1);

-- --------------------------------------------------------

--
-- Estrutura da tabela `produto_fornecedor`
--

CREATE TABLE IF NOT EXISTS `produto_fornecedor` (
  `produto_fornecedor_10_id` int(11) NOT NULL AUTO_INCREMENT,
  `produto_fornecedor_10_id_produto` int(11) NOT NULL,
  `produto_fornecedor_10_id_fornecedor` int(11) NOT NULL,
  PRIMARY KEY (`produto_fornecedor_10_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=26 ;

--
-- Extraindo dados da tabela `produto_fornecedor`
--

INSERT INTO `produto_fornecedor` (`produto_fornecedor_10_id`, `produto_fornecedor_10_id_produto`, `produto_fornecedor_10_id_fornecedor`) VALUES
(24, 16, 10),
(25, 16, 12);

-- --------------------------------------------------------

--
-- Estrutura da tabela `user`
--

CREATE TABLE IF NOT EXISTS `user` (
  `user_10_id` int(11) NOT NULL AUTO_INCREMENT,
  `user_30_nome` varchar(255) NOT NULL,
  `user_30_contato` varchar(255) NOT NULL,
  `user_10_tel_ddd` int(2) NOT NULL,
  `user_10_tel` int(10) NOT NULL,
  `user_30_endereco` varchar(255) NOT NULL,
  `user_30_obs` varchar(255) NOT NULL,
  `user_30_username` varchar(255) NOT NULL,
  `user_30_password` varchar(255) NOT NULL,
  `user_30_email` varchar(255) NOT NULL,
  `user_12_type` int(2) NOT NULL,
  `user_12_active` int(1) NOT NULL,
  PRIMARY KEY (`user_10_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=13 ;

--
-- Extraindo dados da tabela `user`
--

INSERT INTO `user` (`user_10_id`, `user_30_nome`, `user_30_contato`, `user_10_tel_ddd`, `user_10_tel`, `user_30_endereco`, `user_30_obs`, `user_30_username`, `user_30_password`, `user_30_email`, `user_12_type`, `user_12_active`) VALUES
(1, '', '', 0, 0, '', '', 'admin', 'MjEyMzJmMjk3YTU3YTVhNzQzODk0YTBlNGE4MDFmYzM=', 'andre.simoes@quup.com.br', 1, 1),
(8, '', '', 0, 0, '', '', 'youniquevisual', 'Y2Y3MjVhMGM3NDU5YmM4NzA2ZmZkNTBlNDRjOTllZDY=', 'pedro@youniquevisual.com.br', 2, 1),
(9, '', '', 0, 0, '', '', 'larplasticos', 'YTJmZGQ5YzdiN2U4ZTk0ZTQwMTEwNmM0ZTFhY2IzNDc=', 'andre@larplasticos.com.br', 2, 1),
(10, 'Empresa de venda', 'Contato', 11, 22223333, 'Rua VoluntÃ¡rios da PÃ¡tria, 2820, sala 58', 'observaÃ§Ã£o', 'fornecedor1', 'YWJiOGU4OTBiZjZiMTMwMWU0YTIxMDZkNGM1NDhmNzM=', 'andre.simoes@quup.com.br', 3, 1),
(11, 'administrador', 'Gerente de vendas', 11, 544234532, '', '', 'administrador', 'MTE1MmQ4NTNhNGFkMDc1MjA3NmM0YTNhYzcyNjgyNjE=', 'administrador@administrador.com.br', 2, 1),
(12, 'Empresa de venda 2', 'JosÃ©', 11, 33322342, 'EndereÃ§o da empresa', 'ObservaÃ§Ãµes', 'fornecedor2', 'YTJjYTBmYTQxZjQ4ZmIwNmEzYmE5MjJmMjYyMTJmZDI=', 'zezim@vendaempresa2.com.br', 3, 1);

--
-- Restrições para as tabelas dumpadas
--

--
-- Restrições para a tabela `foto_produto`
--
ALTER TABLE `foto_produto`
  ADD CONSTRAINT `foto_produto_ibfk_1` FOREIGN KEY (`foto_produto_10_id_produto`) REFERENCES `produto` (`produto_10_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Restrições para a tabela `pedidos`
--
ALTER TABLE `pedidos`
  ADD CONSTRAINT `pedidos_ibfk_3` FOREIGN KEY (`produto_10_id`) REFERENCES `produto` (`produto_10_id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `pedidos_ibfk_2` FOREIGN KEY (`user_10_id`) REFERENCES `user` (`user_10_id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

-- phpMyAdmin SQL Dump
-- version 3.5.1
-- http://www.phpmyadmin.net
--
-- Servidor: localhost
-- Tempo de Geração: 14/05/2013 às 00:47:05
-- Versão do Servidor: 5.5.25
-- Versão do PHP: 5.4.4

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

CREATE TABLE `foto_produto` (
  `foto_produto_10_id` int(11) NOT NULL AUTO_INCREMENT,
  `foto_produto_10_id_produto` int(11) NOT NULL,
  `foto_produto_30_url` varchar(255) NOT NULL,
  PRIMARY KEY (`foto_produto_10_id`),
  KEY `foto_produto_ibfk_1` (`foto_produto_10_id_produto`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=21 ;

--
-- Extraindo dados da tabela `foto_produto`
--

INSERT INTO `foto_produto` (`foto_produto_10_id`, `foto_produto_10_id_produto`, `foto_produto_30_url`) VALUES
(9, 31, '516cd11af36ac-31adidas (4).gif'),
(10, 31, '516cd11b25674-31nike.png'),
(11, 31, '516cd11b48ce1-312 lix 50 L-20120126-195530.JPG'),
(12, 31, '516cd11b64164-31azul 13 litros pequena-20111118-153424.png'),
(13, 32, '517eab405da81-32516cd11af36ac-31adidas (4).gif'),
(14, 32, '517eab4070083-32516cd11b48ce1-312 lix 50 L-20120126-195530.JPG'),
(15, 32, '517eab407d926-32516cd11b25674-31nike.png'),
(16, 32, '517eab408ee6e-32516cd11b64164-31azul 13 litros pequena-20111118-153424.png'),
(17, 33, '518cecae4cf3d-33517eab401cc54-caixa.jpg'),
(18, 33, '518cecae5d359-33517eab401cc54-caixa.jpg'),
(19, 33, '518cecae71b97-33517eab401cc54-caixa.jpg'),
(20, 33, '518cecae8233a-33517eab401cc54-caixa.jpg');

-- --------------------------------------------------------

--
-- Estrutura da tabela `pedidos`
--

CREATE TABLE `pedidos` (
  `ped_10_id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `ped_35_nome` text NOT NULL,
  `ped_35_email` text NOT NULL,
  `ped_35_ddd` text NOT NULL,
  `ped_35_telefone` text NOT NULL,
  `ped_35_logradouro` text NOT NULL,
  `ped_35_numero` text NOT NULL,
  `ped_35_complemento` text NOT NULL,
  `ped_35_cep` text NOT NULL,
  `ped_35_bairro` text NOT NULL,
  `ped_35_cidade` text NOT NULL,
  `ped_35_estado` text NOT NULL,
  `ped_20_valorPedido` decimal(10,2) NOT NULL,
  `ped_20_valorFrete` decimal(10,2) NOT NULL,
  `ped_20_peso` decimal(10,3) NOT NULL,
  `ped_12_frete` int(1) NOT NULL,
  `ped_12_status` int(1) NOT NULL,
  `ped_12_statusPag` int(1) NOT NULL,
  `ped_30_paymode` varchar(255) NOT NULL,
  `ped_22_created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`ped_10_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=10 ;

--
-- Extraindo dados da tabela `pedidos`
--

INSERT INTO `pedidos` (`ped_10_id`, `ped_35_nome`, `ped_35_email`, `ped_35_ddd`, `ped_35_telefone`, `ped_35_logradouro`, `ped_35_numero`, `ped_35_complemento`, `ped_35_cep`, `ped_35_bairro`, `ped_35_cidade`, `ped_35_estado`, `ped_20_valorPedido`, `ped_20_valorFrete`, `ped_20_peso`, `ped_12_frete`, `ped_12_status`, `ped_12_statusPag`, `ped_30_paymode`, `ped_22_created_at`) VALUES
(7, 'Giovanni Giannichi Forte', 'giogiannichi@gmail.com', '11', '11111111', 'Rua CapitÃ£o Francisco Lipi', '88', 'Complemento Teste', '02243-000', 'Vila Dom Pedro II', 'SÃ£o Paulo', 'SP', 44.80, 13.20, 0.700, 1, 1, 1, 'PAGSEGURO', '0000-00-00 00:00:00'),
(8, '', '', '', '', '', '', '', '02243-000', '', '', '', 44.80, 13.20, 0.700, 1, 1, 1, 'PAGSEGURO', '0000-00-00 00:00:00'),
(9, 'Giovanni Giannichi Forte', 'giogiannichi@gmail.com', '11', '11111111', 'Rua CapitÃ£o Francisco Lipi', '88', 'Complemento Teste', '02243-000', 'Vila Dom Pedro II', 'SÃ£o Paulo', 'SP', 44.80, 13.20, 0.700, 1, 1, 1, 'PAGSEGURO', '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Estrutura da tabela `pedidos_chart`
--

CREATE TABLE `pedidos_chart` (
  `cht_10_id` int(11) NOT NULL AUTO_INCREMENT,
  `produto_10_id` int(11) NOT NULL,
  `ped_10_id` int(11) NOT NULL,
  `cht_30_nome` varchar(255) NOT NULL,
  `cht_20_valor` decimal(10,2) NOT NULL,
  `cht_10_nrFotos` int(11) NOT NULL,
  `cht_20_peso` decimal(10,3) NOT NULL,
  `cht_35_urlFotos` text NOT NULL,
  `cht_35_urlFotosTampa` text NOT NULL,
  `cht_10_quantidade` int(11) NOT NULL,
  `cht_30_cor` varchar(255) NOT NULL,
  PRIMARY KEY (`cht_10_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=49 ;

--
-- Extraindo dados da tabela `pedidos_chart`
--

INSERT INTO `pedidos_chart` (`cht_10_id`, `produto_10_id`, `ped_10_id`, `cht_30_nome`, `cht_20_valor`, `cht_10_nrFotos`, `cht_20_peso`, `cht_35_urlFotos`, `cht_35_urlFotosTampa`, `cht_10_quantidade`, `cht_30_cor`) VALUES
(43, 33, 7, 'Caixa Pequena', 19.90, 8, 0.200, 'http://distilleryimage0.s3.amazonaws.com/2bbf0580754f11e2b52d22000a9f189b_7.jpg;http://distilleryimage0.s3.amazonaws.com/2bbf0580754f11e2b52d22000a9f189b_7.jpg;http://distilleryimage0.s3.amazonaws.com/2bbf0580754f11e2b52d22000a9f189b_7.jpg;http://distilleryimage0.s3.amazonaws.com/2bbf0580754f11e2b52d22000a9f189b_7.jpg;http://distilleryimage0.s3.amazonaws.com/2bbf0580754f11e2b52d22000a9f189b_7.jpg;http://distilleryimage0.s3.amazonaws.com/2bbf0580754f11e2b52d22000a9f189b_7.jpg;http://distilleryimage0.s3.amazonaws.com/2bbf0580754f11e2b52d22000a9f189b_7.jpg;http://distilleryimage0.s3.amazonaws.com/2bbf0580754f11e2b52d22000a9f189b_7.jpg', 'http://distilleryimage10.s3.amazonaws.com/cb2e23faa10d11e2aee522000a9f15b9_7.jpg', 1, 'Branco'),
(44, 33, 7, 'Caixa Grande', 24.90, 12, 0.500, 'http://distilleryimage9.s3.amazonaws.com/3c05740045d511e281d622000a1f975c_7.jpg;http://distilleryimage9.s3.amazonaws.com/3c05740045d511e281d622000a1f975c_7.jpg;http://distilleryimage9.s3.amazonaws.com/3c05740045d511e281d622000a1f975c_7.jpg;http://distilleryimage9.s3.amazonaws.com/3c05740045d511e281d622000a1f975c_7.jpg;http://distilleryimage9.s3.amazonaws.com/3c05740045d511e281d622000a1f975c_7.jpg;http://distilleryimage9.s3.amazonaws.com/3c05740045d511e281d622000a1f975c_7.jpg;http://distilleryimage9.s3.amazonaws.com/3c05740045d511e281d622000a1f975c_7.jpg;http://distilleryimage9.s3.amazonaws.com/3c05740045d511e281d622000a1f975c_7.jpg;http://distilleryimage9.s3.amazonaws.com/3c05740045d511e281d622000a1f975c_7.jpg;http://distilleryimage9.s3.amazonaws.com/3c05740045d511e281d622000a1f975c_7.jpg;http://distilleryimage9.s3.amazonaws.com/3c05740045d511e281d622000a1f975c_7.jpg;http://distilleryimage9.s3.amazonaws.com/3c05740045d511e281d622000a1f975c_7.jpg', 'http://distilleryimage8.s3.amazonaws.com/8a192bfc74ae11e2a56722000a1f9d88_7.jpg;http://distilleryimage8.s3.amazonaws.com/8a192bfc74ae11e2a56722000a1f9d88_7.jpg;http://distilleryimage8.s3.amazonaws.com/8a192bfc74ae11e2a56722000a1f9d88_7.jpg;http://distilleryimage8.s3.amazonaws.com/8a192bfc74ae11e2a56722000a1f9d88_7.jpg', 1, 'Branco'),
(45, 33, 8, 'Caixa Pequena', 19.90, 8, 0.200, 'http://distilleryimage0.s3.amazonaws.com/2bbf0580754f11e2b52d22000a9f189b_7.jpg;http://distilleryimage0.s3.amazonaws.com/2bbf0580754f11e2b52d22000a9f189b_7.jpg;http://distilleryimage0.s3.amazonaws.com/2bbf0580754f11e2b52d22000a9f189b_7.jpg;http://distilleryimage0.s3.amazonaws.com/2bbf0580754f11e2b52d22000a9f189b_7.jpg;http://distilleryimage0.s3.amazonaws.com/2bbf0580754f11e2b52d22000a9f189b_7.jpg;http://distilleryimage0.s3.amazonaws.com/2bbf0580754f11e2b52d22000a9f189b_7.jpg;http://distilleryimage0.s3.amazonaws.com/2bbf0580754f11e2b52d22000a9f189b_7.jpg;http://distilleryimage0.s3.amazonaws.com/2bbf0580754f11e2b52d22000a9f189b_7.jpg', 'http://distilleryimage10.s3.amazonaws.com/cb2e23faa10d11e2aee522000a9f15b9_7.jpg', 1, 'Branco'),
(46, 33, 8, 'Caixa Grande', 24.90, 12, 0.500, 'http://distilleryimage9.s3.amazonaws.com/3c05740045d511e281d622000a1f975c_7.jpg;http://distilleryimage9.s3.amazonaws.com/3c05740045d511e281d622000a1f975c_7.jpg;http://distilleryimage9.s3.amazonaws.com/3c05740045d511e281d622000a1f975c_7.jpg;http://distilleryimage9.s3.amazonaws.com/3c05740045d511e281d622000a1f975c_7.jpg;http://distilleryimage9.s3.amazonaws.com/3c05740045d511e281d622000a1f975c_7.jpg;http://distilleryimage9.s3.amazonaws.com/3c05740045d511e281d622000a1f975c_7.jpg;http://distilleryimage9.s3.amazonaws.com/3c05740045d511e281d622000a1f975c_7.jpg;http://distilleryimage9.s3.amazonaws.com/3c05740045d511e281d622000a1f975c_7.jpg;http://distilleryimage9.s3.amazonaws.com/3c05740045d511e281d622000a1f975c_7.jpg;http://distilleryimage9.s3.amazonaws.com/3c05740045d511e281d622000a1f975c_7.jpg;http://distilleryimage9.s3.amazonaws.com/3c05740045d511e281d622000a1f975c_7.jpg;http://distilleryimage9.s3.amazonaws.com/3c05740045d511e281d622000a1f975c_7.jpg', 'http://distilleryimage8.s3.amazonaws.com/8a192bfc74ae11e2a56722000a1f9d88_7.jpg;http://distilleryimage8.s3.amazonaws.com/8a192bfc74ae11e2a56722000a1f9d88_7.jpg;http://distilleryimage8.s3.amazonaws.com/8a192bfc74ae11e2a56722000a1f9d88_7.jpg;http://distilleryimage8.s3.amazonaws.com/8a192bfc74ae11e2a56722000a1f9d88_7.jpg', 1, 'Branco'),
(47, 33, 9, 'Caixa Pequena', 19.90, 8, 0.200, 'http://distilleryimage0.s3.amazonaws.com/2bbf0580754f11e2b52d22000a9f189b_7.jpg;http://distilleryimage0.s3.amazonaws.com/2bbf0580754f11e2b52d22000a9f189b_7.jpg;http://distilleryimage0.s3.amazonaws.com/2bbf0580754f11e2b52d22000a9f189b_7.jpg;http://distilleryimage0.s3.amazonaws.com/2bbf0580754f11e2b52d22000a9f189b_7.jpg;http://distilleryimage0.s3.amazonaws.com/2bbf0580754f11e2b52d22000a9f189b_7.jpg;http://distilleryimage0.s3.amazonaws.com/2bbf0580754f11e2b52d22000a9f189b_7.jpg;http://distilleryimage0.s3.amazonaws.com/2bbf0580754f11e2b52d22000a9f189b_7.jpg;http://distilleryimage0.s3.amazonaws.com/2bbf0580754f11e2b52d22000a9f189b_7.jpg', 'http://distilleryimage10.s3.amazonaws.com/cb2e23faa10d11e2aee522000a9f15b9_7.jpg', 1, 'Branco'),
(48, 33, 9, 'Caixa Grande', 24.90, 12, 0.500, 'http://distilleryimage9.s3.amazonaws.com/3c05740045d511e281d622000a1f975c_7.jpg;http://distilleryimage9.s3.amazonaws.com/3c05740045d511e281d622000a1f975c_7.jpg;http://distilleryimage9.s3.amazonaws.com/3c05740045d511e281d622000a1f975c_7.jpg;http://distilleryimage9.s3.amazonaws.com/3c05740045d511e281d622000a1f975c_7.jpg;http://distilleryimage9.s3.amazonaws.com/3c05740045d511e281d622000a1f975c_7.jpg;http://distilleryimage9.s3.amazonaws.com/3c05740045d511e281d622000a1f975c_7.jpg;http://distilleryimage9.s3.amazonaws.com/3c05740045d511e281d622000a1f975c_7.jpg;http://distilleryimage9.s3.amazonaws.com/3c05740045d511e281d622000a1f975c_7.jpg;http://distilleryimage9.s3.amazonaws.com/3c05740045d511e281d622000a1f975c_7.jpg;http://distilleryimage9.s3.amazonaws.com/3c05740045d511e281d622000a1f975c_7.jpg;http://distilleryimage9.s3.amazonaws.com/3c05740045d511e281d622000a1f975c_7.jpg;http://distilleryimage9.s3.amazonaws.com/3c05740045d511e281d622000a1f975c_7.jpg', 'http://distilleryimage8.s3.amazonaws.com/8a192bfc74ae11e2a56722000a1f9d88_7.jpg;http://distilleryimage8.s3.amazonaws.com/8a192bfc74ae11e2a56722000a1f9d88_7.jpg;http://distilleryimage8.s3.amazonaws.com/8a192bfc74ae11e2a56722000a1f9d88_7.jpg;http://distilleryimage8.s3.amazonaws.com/8a192bfc74ae11e2a56722000a1f9d88_7.jpg', 1, 'Branco');

-- --------------------------------------------------------

--
-- Estrutura da tabela `produto`
--

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
  `produto_12_tipo` int(1) NOT NULL,
  `produto_12_active` int(1) NOT NULL,
  PRIMARY KEY (`produto_10_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=34 ;

--
-- Extraindo dados da tabela `produto`
--

INSERT INTO `produto` (`produto_10_id`, `produto_30_nome`, `produto_30_desc_curta`, `produto_60_desc_completa`, `produto_20_valor`, `produto_20_frete`, `produto_40_cores`, `produto_20_peso`, `produto_30_banner`, `produto_30_foto`, `produto_10_prazo_producao`, `produto_10_largura_minima`, `produto_10_altura_minima`, `produto_10_minimo_fotos`, `produto_12_tipo`, `produto_12_active`) VALUES
(31, 'Teste', 'teste', 'teste', 1.00, 1.00, '[]', 1.000, '510a5f0c691ee-cards.jpg', 'foto-teste.jpg', 5, 400, 400, 10, 0, 1),
(32, 'Caixa', 'Um segundo teste de produto', 'Teste de produto com layout da caixa', 20.00, 10.00, '[{"cor":"008000","nome":"Verde"},{"cor":"ff0000","nome":"Vermelho"}]', 0.350, '517eab401cc54-caixa.jpg', '517eab40389c9-caixa.jpg', 5, 600, 600, 25, 1, 1),
(33, 'Outra Caixa', 'Outro teste de caixa', 'Outro teste de cadastro de caixa', 0.00, 0.00, '[{"cor":"ffffff","nome":"Branco"},{"cor":"a0522d","nome":"Marrom"}]', 0.000, '518cecae128c4-517eab401cc54-caixa.jpg', '518cecae31b43-517eab401cc54-caixa.jpg', 5, 500, 500, 2, 1, 1);

-- --------------------------------------------------------

--
-- Estrutura da tabela `produto_fornecedor`
--

CREATE TABLE `produto_fornecedor` (
  `produto_fornecedor_10_id` int(11) NOT NULL AUTO_INCREMENT,
  `produto_fornecedor_10_id_produto` int(11) NOT NULL,
  `produto_fornecedor_10_id_fornecedor` int(11) NOT NULL,
  PRIMARY KEY (`produto_fornecedor_10_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=54 ;

--
-- Extraindo dados da tabela `produto_fornecedor`
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
(48, 32, 10),
(49, 31, 10),
(53, 33, 10);

-- --------------------------------------------------------

--
-- Estrutura da tabela `produto_info`
--

CREATE TABLE `produto_info` (
  `produto_info_10_id` int(11) NOT NULL AUTO_INCREMENT,
  `produto_10_id` int(11) NOT NULL,
  `produto_info_30_nome` varchar(255) NOT NULL,
  `produto_info_20_valor` decimal(10,2) NOT NULL,
  `produto_info_35_desc` text NOT NULL,
  `produto_info_10_nrFotos` int(11) NOT NULL,
  `produto_info_12_peso` decimal(10,3) NOT NULL,
  PRIMARY KEY (`produto_info_10_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=8 ;

--
-- Extraindo dados da tabela `produto_info`
--

INSERT INTO `produto_info` (`produto_info_10_id`, `produto_10_id`, `produto_info_30_nome`, `produto_info_20_valor`, `produto_info_35_desc`, `produto_info_10_nrFotos`, `produto_info_12_peso`) VALUES
(6, 33, 'Caixa Pequena', 19.90, '8 Fotos laterais', 8, 0.200),
(7, 33, 'Caixa Grande', 24.90, '12 Fotos Laterais', 12, 0.500);

-- --------------------------------------------------------

--
-- Estrutura da tabela `user`
--

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
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=17 ;

--
-- Extraindo dados da tabela `user`
--

INSERT INTO `user` (`user_10_id`, `user_30_nome`, `user_30_contato`, `user_30_doc1`, `user_30_doc2`, `user_10_tel_ddd`, `user_10_tel`, `user_30_endereco`, `user_30_obs`, `user_30_username`, `user_30_password`, `user_30_email`, `user_12_type`, `user_12_active`) VALUES
(1, '', '', '', '', 0, 0, '', '', 'admin', 'MjEyMzJmMjk3YTU3YTVhNzQzODk0YTBlNGE4MDFmYzM=', 'andre.simoes@quup.com.br', 1, 1),
(8, '', '', '', '', 0, 0, '', '', 'youniquevisual', 'Y2Y3MjVhMGM3NDU5YmM4NzA2ZmZkNTBlNDRjOTllZDY=', 'pedro@youniquevisual.com.br', 2, 1),
(9, '', '', '', '', 0, 0, '', '', 'larplasticos', 'YTJmZGQ5YzdiN2U4ZTk0ZTQwMTEwNmM0ZTFhY2IzNDc=', 'andre@larplasticos.com.br', 2, 1),
(10, 'Empresa de venda', 'Contato', '', '', 11, 22223333, 'Rua VoluntÃ¡rios da PÃ¡tria, 2820, sala 58', 'observaÃ§Ã£o', 'fornecedor1', 'YWJiOGU4OTBiZjZiMTMwMWU0YTIxMDZkNGM1NDhmNzM=', 'andre.simoes@quup.com.br', 3, 1),
(11, 'administrador', 'Gerente de vendas', '', '', 11, 544234532, '', '', 'administrador', 'MTE1MmQ4NTNhNGFkMDc1MjA3NmM0YTNhYzcyNjgyNjE=', 'administrador@administrador.com.br', 2, 1),
(12, 'Empresa de venda 2', 'JosÃ©', '', '', 11, 33322342, 'EndereÃ§o da empresa', 'ObservaÃ§Ãµes', 'fornecedor2', 'YTJjYTBmYTQxZjQ4ZmIwNmEzYmE5MjJmMjYyMTJmZDI=', 'zezim@vendaempresa2.com.br', 3, 1),
(15, 'Giovanni Giannichi', 'Giovanni Giannichi', '111111111-11', '22222222-2', 11, 11111111, 'Rua Francisco Lipi', '', 'giovanni', 'ZTIyZWFhMWQxZTFlNGY3N2NkZTc5MTYzM2QyYjhhMDk=', 'giogiannichi@gmail.com', 2, 1),
(16, 'Giovanni Giannichi', 'Giovanni Giannichi', '111111111-11', '22222222-2', 11, 11111111, 'Rua Francisco Lipi,88', '', 'giovanni2', 'MTRhMjUyMjRhNzRlMDNmZTVhNTJhMGM3MTg5OGYxYmE=', 'giogiannichi@gmail.com', 2, 1);

--
-- Restrições para as tabelas dumpadas
--

--
-- Restrições para a tabela `foto_produto`
--
ALTER TABLE `foto_produto`
  ADD CONSTRAINT `foto_produto_ibfk_1` FOREIGN KEY (`foto_produto_10_id_produto`) REFERENCES `produto` (`produto_10_id`) ON DELETE CASCADE ON UPDATE CASCADE;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

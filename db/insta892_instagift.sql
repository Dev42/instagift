-- phpMyAdmin SQL Dump
-- version 3.5.5
-- http://www.phpmyadmin.net
--
-- Máquina: localhost
-- Data de Criação: 28-Maio-2013 às 16:55
-- Versão do servidor: 5.5.23-55
-- versão do PHP: 5.3.17

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Base de Dados: `insta892_instagift`
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
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=21 ;

--
-- Extraindo dados da tabela `foto_produto`
--

INSERT INTO `foto_produto` (`foto_produto_10_id`, `foto_produto_10_id_produto`, `foto_produto_30_url`) VALUES
(17, 33, '518cecae4cf3d-33517eab401cc54-caixa.jpg'),
(18, 33, '518cecae5d359-33517eab401cc54-caixa.jpg'),
(19, 33, '518cecae71b97-33517eab401cc54-caixa.jpg'),
(20, 33, '518cecae8233a-33517eab401cc54-caixa.jpg');

-- --------------------------------------------------------

--
-- Estrutura da tabela `pedidos`
--

CREATE TABLE IF NOT EXISTS `pedidos` (
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
  `ped_22_created_at` bigint(20) NOT NULL,
  PRIMARY KEY (`ped_10_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=47 ;

--
-- Extraindo dados da tabela `pedidos`
--

INSERT INTO `pedidos` (`ped_10_id`, `ped_35_nome`, `ped_35_email`, `ped_35_ddd`, `ped_35_telefone`, `ped_35_logradouro`, `ped_35_numero`, `ped_35_complemento`, `ped_35_cep`, `ped_35_bairro`, `ped_35_cidade`, `ped_35_estado`, `ped_20_valorPedido`, `ped_20_valorFrete`, `ped_20_peso`, `ped_12_frete`, `ped_12_status`, `ped_12_statusPag`, `ped_30_paymode`, `ped_22_created_at`) VALUES
(41, 'aline teste 1', 'lilisci@gmail.com', '11', '981231357', 'Rua Domingos Fernandes', '462', 'apto131', '04509-011', 'Vila Nova ConceiÃ§Ã£o', 'SÃ£o Paulo', 'SP', 99.50, 13.70, 1.000, 1, 1, 1, 'PAGSEGURO', 0),
(42, 'aline teste 1', 'lilisci@gmail.com', '11', '981231357', 'Rua Domingos Fernandes', '4', '', '04509-011', 'Vila Nova ConceiÃ§Ã£o', 'SÃ£o Paulo', 'SP', 24.90, 13.20, 0.500, 1, 1, 1, 'PAGSEGURO', 1368783650),
(43, 'aline teste 1', 'lilisci@gmail.com', '11', '89760912', 'Rua Domingos Fernandes', '123', '', '04509-010', 'Vila Nova ConceiÃ§Ã£o', 'SÃ£o Paulo', 'SP', 59.70, 14.20, 0.600, 1, 1, 1, 'PAGSEGURO', 1369152798),
(44, 'Reinaldo Silotto', 'silotto.reinaldo@gmail.com', '11', '987400799', 'Rua Carmelito Rodrigues Barbosa', '22', '', '02929-140', 'Moinho Velho', 'SÃ£o Paulo', 'SP', 39.80, 14.10, 0.400, 1, 1, 1, 'PAGSEGURO', 1369301187),
(45, 'aline teste 1', 'lilisci@gmail.com', '11', '87654', 'Rua Joaquim Antunes', '234', '', '05415-001', 'Pinheiros', 'SÃ£o Paulo', 'SP', 24.90, 14.10, 0.500, 1, 1, 1, 'PAGSEGURO', 1369313274),
(46, 'aline teste 1', 'lilisci@gmail.com', '11', '56789876', 'Rua Joaquim Antunes', '123', '', '05415-001', 'Pinheiros', 'SÃ£o Paulo', 'SP', 24.90, 14.10, 0.500, 1, 1, 1, 'PAGSEGURO', 1369313299);

-- --------------------------------------------------------

--
-- Estrutura da tabela `pedidos_chart`
--

CREATE TABLE IF NOT EXISTS `pedidos_chart` (
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
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=92 ;

--
-- Extraindo dados da tabela `pedidos_chart`
--

INSERT INTO `pedidos_chart` (`cht_10_id`, `produto_10_id`, `ped_10_id`, `cht_30_nome`, `cht_20_valor`, `cht_10_nrFotos`, `cht_20_peso`, `cht_35_urlFotos`, `cht_35_urlFotosTampa`, `cht_10_quantidade`, `cht_30_cor`) VALUES
(85, 33, 41, 'Caixa Pequena', 99.50, 8, 1.000, 'http://distilleryimage5.s3.amazonaws.com/e55c66cab6a111e2b23022000a1f9ad5_7.jpg;http://distilleryimage1.s3.amazonaws.com/36e11bcab69e11e28f8f22000a9e07b9_7.jpg;http://distilleryimage8.s3.amazonaws.com/0a09cb98b69d11e2b0f722000a9f18db_7.jpg;http://distilleryimage11.s3.amazonaws.com/1aa60cf6b69c11e2b51f22000a9f4da7_7.jpg;http://distilleryimage2.s3.amazonaws.com/fabd49b6b69811e29e6f22000a9e2992_7.jpg;http://distilleryimage9.s3.amazonaws.com/f720fc3ab69811e29b2022000a9f1561_7.jpg;http://distilleryimage2.s3.amazonaws.com/db3a83e2b69d11e2a3aa22000a1f97a4_7.jpg;http://distilleryimage10.s3.amazonaws.com/825b0590b2af11e2b12d22000a9e295b_7.jpg', 'http://distilleryimage2.s3.amazonaws.com/db3a83e2b69d11e2a3aa22000a1f97a4_7.jpg', 5, 'Marrom'),
(86, 33, 42, 'Caixa Grande', 24.90, 12, 0.500, 'http://distilleryimage5.s3.amazonaws.com/e55c66cab6a111e2b23022000a1f9ad5_7.jpg;http://distilleryimage1.s3.amazonaws.com/36e11bcab69e11e28f8f22000a9e07b9_7.jpg;http://distilleryimage2.s3.amazonaws.com/db3a83e2b69d11e2a3aa22000a1f97a4_7.jpg;http://distilleryimage8.s3.amazonaws.com/0a09cb98b69d11e2b0f722000a9f18db_7.jpg;http://distilleryimage11.s3.amazonaws.com/1aa60cf6b69c11e2b51f22000a9f4da7_7.jpg;http://distilleryimage5.s3.amazonaws.com/e55c66cab6a111e2b23022000a1f9ad5_7.jpg;http://distilleryimage1.s3.amazonaws.com/36e11bcab69e11e28f8f22000a9e07b9_7.jpg;http://distilleryimage2.s3.amazonaws.com/db3a83e2b69d11e2a3aa22000a1f97a4_7.jpg;http://distilleryimage8.s3.amazonaws.com/0a09cb98b69d11e2b0f722000a9f18db_7.jpg;http://distilleryimage2.s3.amazonaws.com/db3a83e2b69d11e2a3aa22000a1f97a4_7.jpg;http://distilleryimage1.s3.amazonaws.com/36e11bcab69e11e28f8f22000a9e07b9_7.jpg;http://distilleryimage5.s3.amazonaws.com/e55c66cab6a111e2b23022000a1f9ad5_7.jpg', 'http://distilleryimage1.s3.amazonaws.com/36e11bcab69e11e28f8f22000a9e07b9_7.jpg', 1, 'Marrom'),
(87, 33, 43, 'Caixa Pequena', 19.90, 8, 0.200, 'http://sphotos-c.ak.fbcdn.net/hphotos-ak-prn1/s720x720/150644_4911945909267_745011822_n.jpg;http://sphotos-c.ak.fbcdn.net/hphotos-ak-prn1/s720x720/150644_4911945909267_745011822_n.jpg;http://sphotos-c.ak.fbcdn.net/hphotos-ak-prn1/s720x720/150644_4911945909267_745011822_n.jpg;http://sphotos-b.ak.fbcdn.net/hphotos-ak-ash3/561778_4375945113388_1222614490_n.jpg;http://sphotos-b.xx.fbcdn.net/hphotos-ash4/s720x720/377178_524094524273727_1571315834_n.jpg;http://sphotos-a.xx.fbcdn.net/hphotos-ash4/s720x720/408370_524092627607250_2041062665_n.jpg;http://sphotos-b.xx.fbcdn.net/hphotos-ash3/539725_3681163234054_737887842_n.jpg;http://sphotos-b.xx.fbcdn.net/hphotos-ash3/528917_410113125668697_192425749_n.jpg', 'http://sphotos-c.ak.fbcdn.net/hphotos-ak-prn1/s720x720/150644_4911945909267_745011822_n.jpg', 1, 'Branco'),
(88, 33, 43, 'Caixa Pequena', 39.80, 8, 0.400, 'http://distilleryimage11.s3.amazonaws.com/25bdb69e9f0311e28f8322000a9f18ae_7.jpg;http://distilleryimage8.s3.amazonaws.com/b6c875ee9f0211e29ebd22000aaa21ed_7.jpg;http://distilleryimage4.s3.amazonaws.com/2d03e5fe9cb011e28a7322000a1fa414_7.jpg;http://distilleryimage0.s3.amazonaws.com/02c2192ca3d711e2a63622000a9e28ec_7.jpg;http://distilleryimage9.s3.amazonaws.com/23b695e0a55811e2b17a22000a1fa432_7.jpg;http://distilleryimage0.s3.amazonaws.com/d5f3e8f2a7c411e2963b22000a1f9c8c_7.jpg;http://distilleryimage2.s3.amazonaws.com/f8ee98c8a89311e2a45b22000a9e06cb_7.jpg;http://distilleryimage7.s3.amazonaws.com/9210e098aa0511e299ae22000a1f9c95_7.jpg', 'http://distilleryimage2.s3.amazonaws.com/db3a83e2b69d11e2a3aa22000a1f97a4_7.jpg;http://distilleryimage4.s3.amazonaws.com/2d03e5fe9cb011e28a7322000a1fa414_7.jpg;http://distilleryimage8.s3.amazonaws.com/b6c875ee9f0211e29ebd22000aaa21ed_7.jpg;http://distilleryimage11.s3.amazonaws.com/25bdb69e9f0311e28f8322000a9f18ae_7.jpg', 2, 'Marrom'),
(89, 33, 44, 'Caixa Pequena', 39.80, 8, 0.400, 'http://distilleryimage0.s3.amazonaws.com/268607f485c011e2ae2122000a9e0911_7.jpg;http://distilleryimage0.s3.amazonaws.com/268607f485c011e2ae2122000a9e0911_7.jpg;http://distilleryimage0.s3.amazonaws.com/268607f485c011e2ae2122000a9e0911_7.jpg;http://distilleryimage0.s3.amazonaws.com/268607f485c011e2ae2122000a9e0911_7.jpg;http://distilleryimage0.s3.amazonaws.com/268607f485c011e2ae2122000a9e0911_7.jpg;http://distilleryimage0.s3.amazonaws.com/268607f485c011e2ae2122000a9e0911_7.jpg;http://distilleryimage0.s3.amazonaws.com/268607f485c011e2ae2122000a9e0911_7.jpg;http://distilleryimage0.s3.amazonaws.com/268607f485c011e2ae2122000a9e0911_7.jpg', 'http://distilleryimage9.s3.amazonaws.com/fa994502bcc411e2b39c22000a1f8adc_7.jpg', 2, 'Marrom'),
(90, 33, 45, 'Caixa Grande', 24.90, 12, 0.500, 'http://sphotos-d.ak.fbcdn.net/hphotos-ak-snc6/229302_1986192171058_8284549_n.jpg;http://sphotos-d.ak.fbcdn.net/hphotos-ak-snc6/229302_1986192171058_8284549_n.jpg;http://sphotos-d.ak.fbcdn.net/hphotos-ak-snc6/229302_1986192171058_8284549_n.jpg;http://sphotos-d.ak.fbcdn.net/hphotos-ak-snc6/229302_1986192171058_8284549_n.jpg;http://sphotos-d.ak.fbcdn.net/hphotos-ak-snc6/229302_1986192171058_8284549_n.jpg;http://sphotos-d.ak.fbcdn.net/hphotos-ak-snc6/229302_1986192171058_8284549_n.jpg;http://sphotos-h.ak.fbcdn.net/hphotos-ak-ash4/s720x720/314820_489314984418348_1317663801_n.jpg;http://sphotos-h.ak.fbcdn.net/hphotos-ak-ash4/s720x720/314820_489314984418348_1317663801_n.jpg;http://sphotos-h.ak.fbcdn.net/hphotos-ak-ash4/s720x720/314820_489314984418348_1317663801_n.jpg;http://sphotos-h.ak.fbcdn.net/hphotos-ak-ash4/s720x720/314820_489314984418348_1317663801_n.jpg;http://sphotos-h.ak.fbcdn.net/hphotos-ak-ash4/s720x720/314820_489314984418348_1317663801_n.jpg;http://sphotos-h.ak.fbcdn.net/hphotos-ak-ash4/s720x720/314820_489314984418348_1317663801_n.jpg', 'http://sphotos-g.ak.fbcdn.net/hphotos-ak-ash3/s720x720/560172_4826349249263_600534604_n.jpg', 1, 'Marrom'),
(91, 33, 46, 'Caixa Grande', 24.90, 12, 0.500, 'http://sphotos-d.ak.fbcdn.net/hphotos-ak-snc6/229302_1986192171058_8284549_n.jpg;http://sphotos-d.ak.fbcdn.net/hphotos-ak-snc6/229302_1986192171058_8284549_n.jpg;http://sphotos-d.ak.fbcdn.net/hphotos-ak-snc6/229302_1986192171058_8284549_n.jpg;http://sphotos-d.ak.fbcdn.net/hphotos-ak-snc6/229302_1986192171058_8284549_n.jpg;http://sphotos-d.ak.fbcdn.net/hphotos-ak-snc6/229302_1986192171058_8284549_n.jpg;http://sphotos-d.ak.fbcdn.net/hphotos-ak-snc6/229302_1986192171058_8284549_n.jpg;http://sphotos-h.ak.fbcdn.net/hphotos-ak-ash4/s720x720/314820_489314984418348_1317663801_n.jpg;http://sphotos-h.ak.fbcdn.net/hphotos-ak-ash4/s720x720/314820_489314984418348_1317663801_n.jpg;http://sphotos-h.ak.fbcdn.net/hphotos-ak-ash4/s720x720/314820_489314984418348_1317663801_n.jpg;http://sphotos-h.ak.fbcdn.net/hphotos-ak-ash4/s720x720/314820_489314984418348_1317663801_n.jpg;http://sphotos-h.ak.fbcdn.net/hphotos-ak-ash4/s720x720/314820_489314984418348_1317663801_n.jpg;http://sphotos-h.ak.fbcdn.net/hphotos-ak-ash4/s720x720/314820_489314984418348_1317663801_n.jpg', 'http://sphotos-g.ak.fbcdn.net/hphotos-ak-ash3/s720x720/560172_4826349249263_600534604_n.jpg', 1, 'Marrom');

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
(33, 'Outra Caixa', 'Outro teste de caixa', 'Outro teste de cadastro de caixa', 0.00, 0.00, '[{"cor":"ffffff","nome":"Branco"},{"cor":"a0522d","nome":"Marrom"}]', 0.000, '518cecae128c4-517eab401cc54-caixa.jpg', '518cecae31b43-517eab401cc54-caixa.jpg', 5, 500, 500, 2, 1, 1);

-- --------------------------------------------------------

--
-- Estrutura da tabela `produto_fornecedor`
--

CREATE TABLE IF NOT EXISTS `produto_fornecedor` (
  `produto_fornecedor_10_id` int(11) NOT NULL AUTO_INCREMENT,
  `produto_fornecedor_10_id_produto` int(11) NOT NULL,
  `produto_fornecedor_10_id_fornecedor` int(11) NOT NULL,
  PRIMARY KEY (`produto_fornecedor_10_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=54 ;

--
-- Extraindo dados da tabela `produto_fornecedor`
--

INSERT INTO `produto_fornecedor` (`produto_fornecedor_10_id`, `produto_fornecedor_10_id_produto`, `produto_fornecedor_10_id_fornecedor`) VALUES
(53, 33, 10);

-- --------------------------------------------------------

--
-- Estrutura da tabela `produto_info`
--

CREATE TABLE IF NOT EXISTS `produto_info` (
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
-- Constraints for dumped tables
--

--
-- Limitadores para a tabela `foto_produto`
--
ALTER TABLE `foto_produto`
  ADD CONSTRAINT `foto_produto_ibfk_1` FOREIGN KEY (`foto_produto_10_id_produto`) REFERENCES `produto` (`produto_10_id`) ON DELETE CASCADE ON UPDATE CASCADE;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

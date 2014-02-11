-- phpMyAdmin SQL Dump
-- version 3.5.1
-- http://www.phpmyadmin.net
--
-- Servidor: localhost
-- Tempo de Geração: 23/07/2013 às 05:07:22
-- Versão do Servidor: 5.5.25
-- Versão do PHP: 5.4.4

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Banco de Dados: `insta892_instagift`
--

-- --------------------------------------------------------

--
-- Estrutura da tabela `cupom`
--

CREATE TABLE `cupom` (
  `cupom_10_id` int(11) NOT NULL AUTO_INCREMENT,
  `cupom_35_codigo` text NOT NULL,
  `cupom_10_valor` int(3) NOT NULL,
  `cupom_22_validade` bigint(20) NOT NULL,
  `cupom_12_status` int(1) NOT NULL,
  PRIMARY KEY (`cupom_10_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

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
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=25 ;

--
-- Extraindo dados da tabela `foto_produto`
--

INSERT INTO `foto_produto` (`foto_produto_10_id`, `foto_produto_10_id_produto`, `foto_produto_30_url`) VALUES
(17, 33, '518cecae4cf3d-33517eab401cc54-caixa.jpg'),
(18, 33, '518cecae5d359-33517eab401cc54-caixa.jpg'),
(19, 33, '518cecae71b97-33517eab401cc54-caixa.jpg'),
(20, 33, '518cecae8233a-33517eab401cc54-caixa.jpg'),
(21, 34, '51e4200165eea-34518c4df7b10a3-2 lix 40 L-20120130-110454.JPG'),
(22, 34, '51e420017648e-34518c4ced87d31-3_E30_b_verde[1]-20111118-121957.jpg'),
(23, 34, '51e4200185b91-34518c4ac8c2572-3_E30_b_verde[1]-20111118-121957.jpg'),
(24, 34, '51e4200195035-34518c4d9d86959-2 lix 40 L-20120130-110454.JPG');

-- --------------------------------------------------------

--
-- Estrutura da tabela `frases`
--

CREATE TABLE `frases` (
  `frase_10_id` int(11) NOT NULL AUTO_INCREMENT,
  `frase_35_nome` text NOT NULL,
  `frase_30_url` varchar(255) NOT NULL,
  PRIMARY KEY (`frase_10_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=6 ;

--
-- Extraindo dados da tabela `frases`
--

INSERT INTO `frases` (`frase_10_id`, `frase_35_nome`, `frase_30_url`) VALUES
(4, 'Teste de Frase Cool', '51e74de62afbb-frase.png'),
(5, 'Teste de Frase Cool 2', '51e74df03792d-frase.png');

-- --------------------------------------------------------

--
-- Estrutura da tabela `frases_user`
--

CREATE TABLE `frases_user` (
  `frase_user_10_id` int(11) NOT NULL AUTO_INCREMENT,
  `cht_10_id` int(11) NOT NULL,
  `frase_user_35_urlFoto` text NOT NULL,
  `frase_user_35_urlFrase` text NOT NULL,
  `frase_user_30_posicao` varchar(255) NOT NULL,
  `frase_user_30_width` varchar(255) NOT NULL,
  PRIMARY KEY (`frase_user_10_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=14 ;

--
-- Extraindo dados da tabela `frases_user`
--

INSERT INTO `frases_user` (`frase_user_10_id`, `cht_10_id`, `frase_user_35_urlFoto`, `frase_user_35_urlFrase`, `frase_user_30_posicao`, `frase_user_30_width`) VALUES
(9, 8, 'https://fbcdn-sphotos-b-a.akamaihd.net/hphotos-ak-ash4/1005157_10201040365484937_427546249_n.jpg', '51e74de62afbb-frase.png', '0,206', '280'),
(10, 13, 'https://fbcdn-sphotos-b-a.akamaihd.net/hphotos-ak-ash4/1005157_10201040365484937_427546249_n.jpg', '51e74df03792d-frase.png', '5,95', '280'),
(11, 14, 'https://fbcdn-sphotos-b-a.akamaihd.net/hphotos-ak-ash4/1005157_10201040365484937_427546249_n.jpg', '51e74df03792d-frase.png', '10,0', '280'),
(12, 15, 'https://fbcdn-sphotos-b-a.akamaihd.net/hphotos-ak-ash4/1005157_10201040365484937_427546249_n.jpg', '51e74df03792d-frase.png', '10,0', '280'),
(13, 16, 'https://fbcdn-sphotos-b-a.akamaihd.net/hphotos-ak-ash4/1005157_10201040365484937_427546249_n.jpg', '51e74df03792d-frase.png', '10,0', '280');

-- --------------------------------------------------------

--
-- Estrutura da tabela `pedidos`
--

CREATE TABLE `pedidos` (
  `ped_10_id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `ped_35_nome` text CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `ped_35_email` text CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `ped_35_ddd` text CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `ped_35_telefone` text CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `ped_35_logradouro` text CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `ped_35_numero` text CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `ped_35_complemento` text CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `ped_35_cep` text CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `ped_35_bairro` text CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `ped_35_cidade` text CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `ped_35_estado` text CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `ped_20_valorPedido` decimal(10,2) NOT NULL,
  `ped_20_valorFrete` decimal(10,2) NOT NULL,
  `ped_10_descCupom` int(3) NOT NULL,
  `ped_35_codigoCupom` text NOT NULL,
  `ped_20_peso` decimal(10,3) NOT NULL,
  `ped_12_frete` int(1) NOT NULL,
  `ped_12_status` int(1) NOT NULL,
  `ped_12_statusPag` int(1) NOT NULL,
  `ped_30_paymode` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `ped_22_created_at` bigint(20) NOT NULL,
  PRIMARY KEY (`ped_10_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=40 ;

--
-- Extraindo dados da tabela `pedidos`
--

INSERT INTO `pedidos` (`ped_10_id`, `ped_35_nome`, `ped_35_email`, `ped_35_ddd`, `ped_35_telefone`, `ped_35_logradouro`, `ped_35_numero`, `ped_35_complemento`, `ped_35_cep`, `ped_35_bairro`, `ped_35_cidade`, `ped_35_estado`, `ped_20_valorPedido`, `ped_20_valorFrete`, `ped_10_descCupom`, `ped_35_codigoCupom`, `ped_20_peso`, `ped_12_frete`, `ped_12_status`, `ped_12_statusPag`, `ped_30_paymode`, `ped_22_created_at`) VALUES
(29, 'Giovanni Giannichi Forte', 'giogiannichi@gmail.com', '11', '11111111', 'Rua CapitÃ£o Francisco Lipi', '88', 'Teste time', '02243-000', 'Vila Dom Pedro II', 'SÃ£o Paulo', 'SP', 19.90, 12.40, 0, '', 0.200, 1, 1, 1, 'PAGSEGURO', 1368636634),
(30, 'Giovanni Giannichi Forte', 'giogiannichi@gmail.com', '11', '11111111', 'Rua CapitÃ£o Francisco Lipi', '88', 'Teste time', '02243-000', 'Vila Dom Pedro II', 'SÃ£o Paulo', 'SP', 19.90, 12.40, 0, '', 0.200, 1, 1, 1, 'PAGSEGURO', 1368637953),
(31, 'Giovanni Giannichi Forte', 'giogiannichi@gmail.com', '11', '11111111', 'Rua CapitÃ£o Francisco Lipi', '88', 'Teste time', '02243-000', 'Vila Dom Pedro II', 'SÃ£o Paulo', 'SP', 19.90, 12.40, 0, '', 0.200, 1, 1, 1, 'PAGSEGURO', 1368620047),
(32, 'Giovanni Giannichi', 'giogiannichi@gmail.com', '11', '11111111', 'Rua CapitÃ£o Francisco Lipi', '88', '', '02243-000', 'Vila Dom Pedro II', 'SÃ£o Paulo', 'SP', 19.90, 12.30, 0, '', 0.200, 2, 1, 1, 'PAGSEGURO', 1369773634),
(33, 'Giovanni Giannichi', 'giogiannichi@gmail.com', '11', '11111111', 'Rua CapitÃ£o Francisco Lipi', '11', '', '02243-000', 'Vila Dom Pedro II', 'SÃ£o Paulo', 'SP', 29.90, 14.10, 0, '', 0.500, 1, 1, 1, 'PAGSEGURO', 1374500414),
(34, 'Giovanni Giannichi', 'giogiannichi@gmail.com', '11', '11111111', 'Rua CapitÃ£o Francisco Lipi', '88', '', '02243-000', 'Vila Dom Pedro II', 'SÃ£o Paulo', 'SP', 29.90, 12.30, 0, '', 0.500, 2, 1, 1, 'PAGSEGURO', 1374517610),
(35, 'Giovanni Giannichi', 'giogiannichi@gmail.com', '22', '33333333', 'Rua CapitÃ£o Francisco Lipi', '88', '', '02243-000', 'Vila Dom Pedro II', 'SÃ£o Paulo', 'SP', 29.90, 14.10, 5, 'Compartilhamento Facebook', 0.500, 1, 1, 1, 'PAGSEGURO', 1374519851),
(36, 'Produto Normal', 'giogiannichi@gmail.com', '11', '11111111', 'Rua CapitÃ£o Francisco Lipi', '11', '', '02243-000', 'Vila Dom Pedro II', 'SÃ£o Paulo', 'SP', 29.90, 14.10, 5, 'Compartilhamento Facebook', 0.500, 1, 1, 1, 'PAGSEGURO', 1374520118),
(37, 'Giovanni Giannichi', 'giogiannichi@gmail.com', '11', '11111111', 'Rua CapitÃ£o Francisco Lipi', '88', '', '02243-000', 'Vila Dom Pedro II', 'SÃ£o Paulo', 'SP', 29.90, 14.10, 5, 'Compartilhamento Facebook', 0.500, 1, 1, 1, 'PAGSEGURO', 1374520232),
(38, 'Giovanni Giannichi', 'giogiannichi@gmail.com', '11', '11111111', 'Rua CapitÃ£o Francisco Lipi', '88', '', '02243-000', 'Vila Dom Pedro II', 'SÃ£o Paulo', 'SP', 29.90, 14.10, 5, 'Compartilhamento Facebook', 0.500, 1, 1, 1, 'PAGSEGURO', 1374520652),
(39, 'Giovanni Giannichi', 'giogiannichi@gmail.com', '11', '11111111', 'Rua CapitÃ£o Francisco Lipi', '88', '', '02243-000', 'Vila Dom Pedro II', 'SÃ£o Paulo', 'SP', 29.90, 14.10, 5, 'Compartilhamento Facebook', 0.500, 1, 1, 1, 'PAGSEGURO', 1374520784);

-- --------------------------------------------------------

--
-- Estrutura da tabela `pedidos_chart`
--

CREATE TABLE `pedidos_chart` (
  `cht_10_id` int(11) NOT NULL AUTO_INCREMENT,
  `produto_10_id` int(11) NOT NULL,
  `ped_10_id` int(11) NOT NULL,
  `cht_30_nome` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `cht_20_valor` decimal(10,2) NOT NULL,
  `cht_10_nrFotos` int(11) NOT NULL,
  `cht_20_peso` decimal(10,3) NOT NULL,
  `cht_35_urlFotos` text COLLATE utf8_unicode_ci NOT NULL,
  `cht_35_urlFotosTampa` text COLLATE utf8_unicode_ci NOT NULL,
  `cht_10_quantidade` int(11) NOT NULL,
  `cht_30_cor` varchar(255) CHARACTER SET latin1 NOT NULL,
  `cht_12_status` int(1) NOT NULL,
  `cht_30_username` varchar(255) CHARACTER SET latin1 NOT NULL,
  `cht_12_origem` int(1) NOT NULL,
  PRIMARY KEY (`cht_10_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=22 ;

--
-- Extraindo dados da tabela `pedidos_chart`
--

INSERT INTO `pedidos_chart` (`cht_10_id`, `produto_10_id`, `ped_10_id`, `cht_30_nome`, `cht_20_valor`, `cht_10_nrFotos`, `cht_20_peso`, `cht_35_urlFotos`, `cht_35_urlFotosTampa`, `cht_10_quantidade`, `cht_30_cor`, `cht_12_status`, `cht_30_username`, `cht_12_origem`) VALUES
(2, 33, 27, 'Caixa Pequena', 19.90, 8, 0.200, 'http://distilleryimage0.s3.amazonaws.com/2bbf0580754f11e2b52d22000a9f189b_7.jpg;http://distilleryimage8.s3.amazonaws.com/8a192bfc74ae11e2a56722000a1f9d88_7.jpg;http://distilleryimage8.s3.amazonaws.com/8a192bfc74ae11e2a56722000a1f9d88_7.jpg;http://distilleryimage8.s3.amazonaws.com/8a192bfc74ae11e2a56722000a1f9d88_7.jpg;http://distilleryimage8.s3.amazonaws.com/8a192bfc74ae11e2a56722000a1f9d88_7.jpg;http://distilleryimage8.s3.amazonaws.com/8a192bfc74ae11e2a56722000a1f9d88_7.jpg;http://distilleryimage8.s3.amazonaws.com/8a192bfc74ae11e2a56722000a1f9d88_7.jpg;http://distilleryimage8.s3.amazonaws.com/8a192bfc74ae11e2a56722000a1f9d88_7.jpg', 'http://distilleryimage0.s3.amazonaws.com/2bbf0580754f11e2b52d22000a9f189b_7.jpg', 1, 'Branco', 0, '', 0),
(3, 33, 28, 'Caixa Pequena', 19.90, 8, 0.200, 'http://distilleryimage0.s3.amazonaws.com/2bbf0580754f11e2b52d22000a9f189b_7.jpg;http://distilleryimage8.s3.amazonaws.com/8a192bfc74ae11e2a56722000a1f9d88_7.jpg;http://distilleryimage8.s3.amazonaws.com/8a192bfc74ae11e2a56722000a1f9d88_7.jpg;http://distilleryimage8.s3.amazonaws.com/8a192bfc74ae11e2a56722000a1f9d88_7.jpg;http://distilleryimage8.s3.amazonaws.com/8a192bfc74ae11e2a56722000a1f9d88_7.jpg;http://distilleryimage8.s3.amazonaws.com/8a192bfc74ae11e2a56722000a1f9d88_7.jpg;http://distilleryimage8.s3.amazonaws.com/8a192bfc74ae11e2a56722000a1f9d88_7.jpg;http://distilleryimage8.s3.amazonaws.com/8a192bfc74ae11e2a56722000a1f9d88_7.jpg', 'http://distilleryimage0.s3.amazonaws.com/2bbf0580754f11e2b52d22000a9f189b_7.jpg', 1, 'Branco', 0, '', 0),
(4, 33, 29, 'Caixa Pequena', 19.90, 8, 0.200, 'http://distilleryimage0.s3.amazonaws.com/2bbf0580754f11e2b52d22000a9f189b_7.jpg;http://distilleryimage0.s3.amazonaws.com/2bbf0580754f11e2b52d22000a9f189b_7.jpg;http://distilleryimage0.s3.amazonaws.com/2bbf0580754f11e2b52d22000a9f189b_7.jpg;http://distilleryimage0.s3.amazonaws.com/2bbf0580754f11e2b52d22000a9f189b_7.jpg;http://distilleryimage0.s3.amazonaws.com/2bbf0580754f11e2b52d22000a9f189b_7.jpg;http://distilleryimage0.s3.amazonaws.com/2bbf0580754f11e2b52d22000a9f189b_7.jpg;http://distilleryimage0.s3.amazonaws.com/2bbf0580754f11e2b52d22000a9f189b_7.jpg;http://distilleryimage0.s3.amazonaws.com/2bbf0580754f11e2b52d22000a9f189b_7.jpg', 'http://distilleryimage8.s3.amazonaws.com/8a192bfc74ae11e2a56722000a1f9d88_7.jpg', 1, 'Branco', 0, '', 0),
(5, 33, 30, 'Caixa Pequena', 19.90, 8, 0.200, 'http://distilleryimage8.s3.amazonaws.com/8a192bfc74ae11e2a56722000a1f9d88_7.jpg;http://distilleryimage8.s3.amazonaws.com/8a192bfc74ae11e2a56722000a1f9d88_7.jpg;http://distilleryimage8.s3.amazonaws.com/8a192bfc74ae11e2a56722000a1f9d88_7.jpg;http://distilleryimage8.s3.amazonaws.com/8a192bfc74ae11e2a56722000a1f9d88_7.jpg;http://distilleryimage8.s3.amazonaws.com/8a192bfc74ae11e2a56722000a1f9d88_7.jpg;http://distilleryimage8.s3.amazonaws.com/8a192bfc74ae11e2a56722000a1f9d88_7.jpg;http://distilleryimage8.s3.amazonaws.com/8a192bfc74ae11e2a56722000a1f9d88_7.jpg;http://distilleryimage8.s3.amazonaws.com/8a192bfc74ae11e2a56722000a1f9d88_7.jpg', 'http://distilleryimage2.s3.amazonaws.com/bb37c6625c4e11e2843f22000a9e0722_7.jpg', 1, 'Branco', 0, '', 0),
(6, 33, 31, 'Caixa Pequena', 19.90, 8, 0.200, 'http://distilleryimage8.s3.amazonaws.com/8a192bfc74ae11e2a56722000a1f9d88_7.jpg;http://distilleryimage8.s3.amazonaws.com/8a192bfc74ae11e2a56722000a1f9d88_7.jpg;http://distilleryimage8.s3.amazonaws.com/8a192bfc74ae11e2a56722000a1f9d88_7.jpg;http://distilleryimage8.s3.amazonaws.com/8a192bfc74ae11e2a56722000a1f9d88_7.jpg;http://distilleryimage8.s3.amazonaws.com/8a192bfc74ae11e2a56722000a1f9d88_7.jpg;http://distilleryimage8.s3.amazonaws.com/8a192bfc74ae11e2a56722000a1f9d88_7.jpg;http://distilleryimage8.s3.amazonaws.com/8a192bfc74ae11e2a56722000a1f9d88_7.jpg;http://distilleryimage8.s3.amazonaws.com/8a192bfc74ae11e2a56722000a1f9d88_7.jpg', 'http://distilleryimage0.s3.amazonaws.com/2bbf0580754f11e2b52d22000a9f189b_7.jpg', 1, 'Branco', 0, '', 0),
(7, 33, 32, 'Caixa Pequena', 19.90, 8, 0.200, 'https://fbcdn-sphotos-g-a.akamaihd.net/hphotos-ak-prn1/65807_512862942070292_529770085_n.jpg;https://fbcdn-sphotos-g-a.akamaihd.net/hphotos-ak-prn1/65807_512862942070292_529770085_n.jpg;https://fbcdn-sphotos-g-a.akamaihd.net/hphotos-ak-prn1/65807_512862942070292_529770085_n.jpg;https://fbcdn-sphotos-g-a.akamaihd.net/hphotos-ak-prn1/65807_512862942070292_529770085_n.jpg;https://fbcdn-sphotos-g-a.akamaihd.net/hphotos-ak-prn1/65807_512862942070292_529770085_n.jpg;https://fbcdn-sphotos-g-a.akamaihd.net/hphotos-ak-prn1/65807_512862942070292_529770085_n.jpg;https://fbcdn-sphotos-g-a.akamaihd.net/hphotos-ak-prn1/65807_512862942070292_529770085_n.jpg;https://fbcdn-sphotos-g-a.akamaihd.net/hphotos-ak-prn1/65807_512862942070292_529770085_n.jpg', 'https://fbcdn-sphotos-b-a.akamaihd.net/hphotos-ak-ash4/s720x720/299922_4697166510400_1259030800_n.jpg', 1, 'Branco', 0, '', 0),
(8, 34, 33, 'OpÃ§Ã£o Ãšnica', 29.90, 12, 0.500, 'https://fbcdn-sphotos-b-a.akamaihd.net/hphotos-ak-ash4/1005157_10201040365484937_427546249_n.jpg;https://fbcdn-sphotos-b-a.akamaihd.net/hphotos-ak-ash4/1005157_10201040365484937_427546249_n.jpg;https://fbcdn-sphotos-b-a.akamaihd.net/hphotos-ak-ash4/1005157_10201040365484937_427546249_n.jpg;https://fbcdn-sphotos-b-a.akamaihd.net/hphotos-ak-ash4/1005157_10201040365484937_427546249_n.jpg;https://fbcdn-sphotos-b-a.akamaihd.net/hphotos-ak-ash4/1005157_10201040365484937_427546249_n.jpg;https://fbcdn-sphotos-b-a.akamaihd.net/hphotos-ak-ash4/1005157_10201040365484937_427546249_n.jpg;https://fbcdn-sphotos-b-a.akamaihd.net/hphotos-ak-ash4/1005157_10201040365484937_427546249_n.jpg;https://fbcdn-sphotos-b-a.akamaihd.net/hphotos-ak-ash4/1005157_10201040365484937_427546249_n.jpg;https://fbcdn-sphotos-b-a.akamaihd.net/hphotos-ak-ash4/1005157_10201040365484937_427546249_n.jpg;https://fbcdn-sphotos-b-a.akamaihd.net/hphotos-ak-ash4/1005157_10201040365484937_427546249_n.jpg;https://fbcdn-sphotos-b-a.akamaihd.net/hphotos-ak-ash4/1005157_10201040365484937_427546249_n.jpg;https://fbcdn-sphotos-b-a.akamaihd.net/hphotos-ak-ash4/1005157_10201040365484937_427546249_n.jpg', '', 1, 'Branco', 2, 'giogiannichi', 2),
(9, 34, 34, 'OpÃ§Ã£o Ãšnica', 29.90, 12, 0.500, 'https://fbcdn-sphotos-b-a.akamaihd.net/hphotos-ak-ash4/1005157_10201040365484937_427546249_n.jpg;https://fbcdn-sphotos-b-a.akamaihd.net/hphotos-ak-ash4/1005157_10201040365484937_427546249_n.jpg;https://fbcdn-sphotos-b-a.akamaihd.net/hphotos-ak-ash4/1005157_10201040365484937_427546249_n.jpg;https://fbcdn-sphotos-b-a.akamaihd.net/hphotos-ak-ash4/1005157_10201040365484937_427546249_n.jpg;https://fbcdn-sphotos-b-a.akamaihd.net/hphotos-ak-ash4/1005157_10201040365484937_427546249_n.jpg;https://fbcdn-sphotos-b-a.akamaihd.net/hphotos-ak-ash4/1005157_10201040365484937_427546249_n.jpg;https://fbcdn-sphotos-f-a.akamaihd.net/hphotos-ak-ash4/1002106_10201040352764619_1250008925_n.jpg;https://fbcdn-sphotos-e-a.akamaihd.net/hphotos-ak-frc3/s720x720/996802_10201040334604165_702957116_n.jpg;https://fbcdn-sphotos-e-a.akamaihd.net/hphotos-ak-frc3/s720x720/996802_10201040334604165_702957116_n.jpg;https://fbcdn-sphotos-e-a.akamaihd.net/hphotos-ak-frc3/s720x720/996802_10201040334604165_702957116_n.jpg;https://fbcdn-sphotos-e-a.akamaihd.net/hphotos-ak-frc3/s720x720/996802_10201040334604165_702957116_n.jpg;https://fbcdn-sphotos-e-a.akamaihd.net/hphotos-ak-frc3/s720x720/996802_10201040334604165_702957116_n.jpg', '', 1, 'Branco', 2, 'giogiannichi', 2),
(13, 34, 35, 'OpÃ§Ã£o Ãšnica', 29.90, 12, 0.500, 'https://fbcdn-sphotos-b-a.akamaihd.net/hphotos-ak-ash4/1005157_10201040365484937_427546249_n.jpg;https://fbcdn-sphotos-b-a.akamaihd.net/hphotos-ak-ash4/1005157_10201040365484937_427546249_n.jpg;https://fbcdn-sphotos-b-a.akamaihd.net/hphotos-ak-ash4/1005157_10201040365484937_427546249_n.jpg;https://fbcdn-sphotos-b-a.akamaihd.net/hphotos-ak-ash4/1005157_10201040365484937_427546249_n.jpg;https://fbcdn-sphotos-b-a.akamaihd.net/hphotos-ak-ash4/1005157_10201040365484937_427546249_n.jpg;https://fbcdn-sphotos-b-a.akamaihd.net/hphotos-ak-ash4/1005157_10201040365484937_427546249_n.jpg;https://fbcdn-sphotos-b-a.akamaihd.net/hphotos-ak-ash4/1005157_10201040365484937_427546249_n.jpg;https://fbcdn-sphotos-b-a.akamaihd.net/hphotos-ak-ash4/1005157_10201040365484937_427546249_n.jpg;https://fbcdn-sphotos-b-a.akamaihd.net/hphotos-ak-ash4/1005157_10201040365484937_427546249_n.jpg;https://fbcdn-sphotos-b-a.akamaihd.net/hphotos-ak-ash4/1005157_10201040365484937_427546249_n.jpg;https://fbcdn-sphotos-b-a.akamaihd.net/hphotos-ak-ash4/1005157_10201040365484937_427546249_n.jpg;https://fbcdn-sphotos-b-a.akamaihd.net/hphotos-ak-ash4/1005157_10201040365484937_427546249_n.jpg', '', 1, 'Branco', 2, 'giogiannichi', 2),
(14, 34, 36, 'OpÃ§Ã£o Ãšnica', 29.90, 12, 0.500, 'https://fbcdn-sphotos-b-a.akamaihd.net/hphotos-ak-ash4/1005157_10201040365484937_427546249_n.jpg;https://fbcdn-sphotos-b-a.akamaihd.net/hphotos-ak-ash4/1005157_10201040365484937_427546249_n.jpg;https://fbcdn-sphotos-b-a.akamaihd.net/hphotos-ak-ash4/1005157_10201040365484937_427546249_n.jpg;https://fbcdn-sphotos-b-a.akamaihd.net/hphotos-ak-ash4/1005157_10201040365484937_427546249_n.jpg;https://fbcdn-sphotos-b-a.akamaihd.net/hphotos-ak-ash4/1005157_10201040365484937_427546249_n.jpg;https://fbcdn-sphotos-b-a.akamaihd.net/hphotos-ak-ash4/1005157_10201040365484937_427546249_n.jpg;https://fbcdn-sphotos-b-a.akamaihd.net/hphotos-ak-ash4/1005157_10201040365484937_427546249_n.jpg;https://fbcdn-sphotos-b-a.akamaihd.net/hphotos-ak-ash4/1005157_10201040365484937_427546249_n.jpg;https://fbcdn-sphotos-b-a.akamaihd.net/hphotos-ak-ash4/1005157_10201040365484937_427546249_n.jpg;https://fbcdn-sphotos-b-a.akamaihd.net/hphotos-ak-ash4/1005157_10201040365484937_427546249_n.jpg;https://fbcdn-sphotos-b-a.akamaihd.net/hphotos-ak-ash4/1005157_10201040365484937_427546249_n.jpg;https://fbcdn-sphotos-b-a.akamaihd.net/hphotos-ak-ash4/1005157_10201040365484937_427546249_n.jpg', '', 1, 'Preto', 2, 'giogiannichi', 2),
(15, 34, 37, 'OpÃ§Ã£o Ãšnica', 29.90, 12, 0.500, 'https://fbcdn-sphotos-b-a.akamaihd.net/hphotos-ak-ash4/1005157_10201040365484937_427546249_n.jpg;https://fbcdn-sphotos-b-a.akamaihd.net/hphotos-ak-ash4/1005157_10201040365484937_427546249_n.jpg;https://fbcdn-sphotos-b-a.akamaihd.net/hphotos-ak-ash4/1005157_10201040365484937_427546249_n.jpg;https://fbcdn-sphotos-b-a.akamaihd.net/hphotos-ak-ash4/1005157_10201040365484937_427546249_n.jpg;https://fbcdn-sphotos-b-a.akamaihd.net/hphotos-ak-ash4/1005157_10201040365484937_427546249_n.jpg;https://fbcdn-sphotos-b-a.akamaihd.net/hphotos-ak-ash4/1005157_10201040365484937_427546249_n.jpg;https://fbcdn-sphotos-b-a.akamaihd.net/hphotos-ak-ash4/1005157_10201040365484937_427546249_n.jpg;https://fbcdn-sphotos-b-a.akamaihd.net/hphotos-ak-ash4/1005157_10201040365484937_427546249_n.jpg;https://fbcdn-sphotos-b-a.akamaihd.net/hphotos-ak-ash4/1005157_10201040365484937_427546249_n.jpg;https://fbcdn-sphotos-b-a.akamaihd.net/hphotos-ak-ash4/1005157_10201040365484937_427546249_n.jpg;https://fbcdn-sphotos-b-a.akamaihd.net/hphotos-ak-ash4/1005157_10201040365484937_427546249_n.jpg;https://fbcdn-sphotos-b-a.akamaihd.net/hphotos-ak-ash4/1005157_10201040365484937_427546249_n.jpg', '', 1, 'Branco', 2, 'giogiannichi', 2),
(17, 34, 38, 'OpÃ§Ã£o Ãšnica', 29.90, 12, 0.500, 'https://fbcdn-sphotos-b-a.akamaihd.net/hphotos-ak-ash4/1005157_10201040365484937_427546249_n.jpg;https://fbcdn-sphotos-b-a.akamaihd.net/hphotos-ak-ash4/1005157_10201040365484937_427546249_n.jpg;https://fbcdn-sphotos-b-a.akamaihd.net/hphotos-ak-ash4/1005157_10201040365484937_427546249_n.jpg;https://fbcdn-sphotos-b-a.akamaihd.net/hphotos-ak-ash4/1005157_10201040365484937_427546249_n.jpg;https://fbcdn-sphotos-b-a.akamaihd.net/hphotos-ak-ash4/1005157_10201040365484937_427546249_n.jpg;https://fbcdn-sphotos-b-a.akamaihd.net/hphotos-ak-ash4/1005157_10201040365484937_427546249_n.jpg;https://fbcdn-sphotos-b-a.akamaihd.net/hphotos-ak-ash4/1005157_10201040365484937_427546249_n.jpg;https://fbcdn-sphotos-b-a.akamaihd.net/hphotos-ak-ash4/1005157_10201040365484937_427546249_n.jpg;https://fbcdn-sphotos-b-a.akamaihd.net/hphotos-ak-ash4/1005157_10201040365484937_427546249_n.jpg;https://fbcdn-sphotos-b-a.akamaihd.net/hphotos-ak-ash4/1005157_10201040365484937_427546249_n.jpg;https://fbcdn-sphotos-b-a.akamaihd.net/hphotos-ak-ash4/1005157_10201040365484937_427546249_n.jpg;https://fbcdn-sphotos-b-a.akamaihd.net/hphotos-ak-ash4/1005157_10201040365484937_427546249_n.jpg', '', 1, 'Branco', 2, 'giogiannichi', 2),
(18, 34, 39, 'OpÃ§Ã£o Ãšnica', 29.90, 12, 0.500, 'https://fbcdn-sphotos-b-a.akamaihd.net/hphotos-ak-ash4/1005157_10201040365484937_427546249_n.jpg;https://fbcdn-sphotos-b-a.akamaihd.net/hphotos-ak-ash4/1005157_10201040365484937_427546249_n.jpg;https://fbcdn-sphotos-b-a.akamaihd.net/hphotos-ak-ash4/1005157_10201040365484937_427546249_n.jpg;https://fbcdn-sphotos-b-a.akamaihd.net/hphotos-ak-ash4/1005157_10201040365484937_427546249_n.jpg;https://fbcdn-sphotos-b-a.akamaihd.net/hphotos-ak-ash4/1005157_10201040365484937_427546249_n.jpg;https://fbcdn-sphotos-b-a.akamaihd.net/hphotos-ak-ash4/1005157_10201040365484937_427546249_n.jpg;https://fbcdn-sphotos-b-a.akamaihd.net/hphotos-ak-ash4/1005157_10201040365484937_427546249_n.jpg;https://fbcdn-sphotos-b-a.akamaihd.net/hphotos-ak-ash4/1005157_10201040365484937_427546249_n.jpg;https://fbcdn-sphotos-b-a.akamaihd.net/hphotos-ak-ash4/1005157_10201040365484937_427546249_n.jpg;https://fbcdn-sphotos-b-a.akamaihd.net/hphotos-ak-ash4/1005157_10201040365484937_427546249_n.jpg;https://fbcdn-sphotos-b-a.akamaihd.net/hphotos-ak-ash4/1005157_10201040365484937_427546249_n.jpg;https://fbcdn-sphotos-b-a.akamaihd.net/hphotos-ak-ash4/1005157_10201040365484937_427546249_n.jpg', '', 1, 'Branco', 2, 'giogiannichi', 2),
(21, 34, 0, 'OpÃ§Ã£o Ãšnica', 29.90, 12, 0.500, 'https://fbcdn-sphotos-b-a.akamaihd.net/hphotos-ak-ash4/1005157_10201040365484937_427546249_n.jpg;https://fbcdn-sphotos-b-a.akamaihd.net/hphotos-ak-ash4/1005157_10201040365484937_427546249_n.jpg;https://fbcdn-sphotos-b-a.akamaihd.net/hphotos-ak-ash4/1005157_10201040365484937_427546249_n.jpg;https://fbcdn-sphotos-b-a.akamaihd.net/hphotos-ak-ash4/1005157_10201040365484937_427546249_n.jpg;https://fbcdn-sphotos-b-a.akamaihd.net/hphotos-ak-ash4/1005157_10201040365484937_427546249_n.jpg;https://fbcdn-sphotos-b-a.akamaihd.net/hphotos-ak-ash4/1005157_10201040365484937_427546249_n.jpg;https://fbcdn-sphotos-b-a.akamaihd.net/hphotos-ak-ash4/1005157_10201040365484937_427546249_n.jpg;https://fbcdn-sphotos-b-a.akamaihd.net/hphotos-ak-ash4/1005157_10201040365484937_427546249_n.jpg;https://fbcdn-sphotos-b-a.akamaihd.net/hphotos-ak-ash4/1005157_10201040365484937_427546249_n.jpg;https://fbcdn-sphotos-b-a.akamaihd.net/hphotos-ak-ash4/1005157_10201040365484937_427546249_n.jpg;https://fbcdn-sphotos-b-a.akamaihd.net/hphotos-ak-ash4/1005157_10201040365484937_427546249_n.jpg;https://fbcdn-sphotos-b-a.akamaihd.net/hphotos-ak-ash4/1005157_10201040365484937_427546249_n.jpg', '', 1, 'Branco', 1, 'giogiannichi', 2);

-- --------------------------------------------------------

--
-- Estrutura da tabela `produto`
--

CREATE TABLE `produto` (
  `produto_10_id` int(11) NOT NULL AUTO_INCREMENT,
  `produto_30_nome` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `produto_30_desc_curta` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `produto_60_desc_completa` longtext CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `produto_20_valor` decimal(10,2) NOT NULL,
  `produto_20_frete` decimal(10,2) NOT NULL,
  `produto_40_cores` text CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `produto_20_peso` decimal(10,3) NOT NULL,
  `produto_30_banner` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `produto_30_foto` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `produto_10_prazo_producao` int(10) NOT NULL,
  `produto_10_largura_minima` int(10) NOT NULL,
  `produto_10_altura_minima` int(10) NOT NULL,
  `produto_10_minimo_fotos` int(10) NOT NULL,
  `produto_12_tipo` int(1) NOT NULL,
  `produto_12_active` int(1) NOT NULL,
  PRIMARY KEY (`produto_10_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=35 ;

--
-- Extraindo dados da tabela `produto`
--

INSERT INTO `produto` (`produto_10_id`, `produto_30_nome`, `produto_30_desc_curta`, `produto_60_desc_completa`, `produto_20_valor`, `produto_20_frete`, `produto_40_cores`, `produto_20_peso`, `produto_30_banner`, `produto_30_foto`, `produto_10_prazo_producao`, `produto_10_largura_minima`, `produto_10_altura_minima`, `produto_10_minimo_fotos`, `produto_12_tipo`, `produto_12_active`) VALUES
(33, 'Outra Caixa', 'Outro teste de caixa', 'Outro teste de cadastro de caixa', 0.00, 0.00, '[{"cor":"ffffff","nome":"Branco"},{"cor":"a0522d","nome":"Marrom"}]', 0.000, '518cecae128c4-517eab401cc54-caixa.jpg', '518cecae31b43-517eab401cc54-caixa.jpg', 5, 500, 500, 2, 1, 1),
(34, 'Produto Normal', 'Teste de produto normal com frases cool', 'Produto Normal com Frases Cool', 0.00, 0.00, '[{"cor":"ffffff","nome":"Branco"},{"cor":"000000","nome":"Preto"}]', 0.000, '51e4200111b51-minibook.jpg', '51e420014d013-minibook.jpg', 3, 500, 500, 12, 0, 1);

-- --------------------------------------------------------

--
-- Estrutura da tabela `produto_fornecedor`
--

CREATE TABLE `produto_fornecedor` (
  `produto_fornecedor_10_id` int(11) NOT NULL AUTO_INCREMENT,
  `produto_fornecedor_10_id_produto` int(11) NOT NULL,
  `produto_fornecedor_10_id_fornecedor` int(11) NOT NULL,
  PRIMARY KEY (`produto_fornecedor_10_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=56 ;

--
-- Extraindo dados da tabela `produto_fornecedor`
--

INSERT INTO `produto_fornecedor` (`produto_fornecedor_10_id`, `produto_fornecedor_10_id_produto`, `produto_fornecedor_10_id_fornecedor`) VALUES
(53, 33, 10),
(55, 34, 10);

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
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=11 ;

--
-- Extraindo dados da tabela `produto_info`
--

INSERT INTO `produto_info` (`produto_info_10_id`, `produto_10_id`, `produto_info_30_nome`, `produto_info_20_valor`, `produto_info_35_desc`, `produto_info_10_nrFotos`, `produto_info_12_peso`) VALUES
(6, 33, 'Caixa Pequena', 19.90, '8 Fotos laterais', 8, 0.200),
(7, 33, 'Caixa Grande', 24.90, '12 Fotos Laterais', 12, 0.500),
(9, 34, 'OpÃ§Ã£o Ãšnica', 29.90, '12 Fotos', 12, 0.500),
(10, 34, 'Era opÃ§Ã£o Ãºnica', 15.90, '10 Fotos', 10, 0.450);

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
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=19 ;

--
-- Extraindo dados da tabela `user`
--

INSERT INTO `user` (`user_10_id`, `user_30_nome`, `user_30_contato`, `user_30_doc1`, `user_30_doc2`, `user_10_tel_ddd`, `user_10_tel`, `user_30_endereco`, `user_30_obs`, `user_30_username`, `user_30_password`, `user_30_email`, `user_12_type`, `user_12_active`) VALUES
(1, 'Admin Fotu', 'Admin', '', '', 11, 11111111, '', '', 'admin', 'MjEyMzJmMjk3YTU3YTVhNzQzODk0YTBlNGE4MDFmYzM=', 'admin@fotu.net.br', 1, 1),
(10, 'Empresa de venda', 'Contato', '', '', 11, 22223333, 'Rua VoluntÃ¡rios da PÃ¡tria, 2820, sala 58', 'observaÃ§Ã£o', 'fornecedor1', 'YWJiOGU4OTBiZjZiMTMwMWU0YTIxMDZkNGM1NDhmNzM=', 'andre.simoes@quup.com.br', 3, 1),
(17, 'Fornecedor teste 2', 'Fornecedor', '', '', 22, 22222222, 'Teste', 'Teste obs', 'fornecedor', 'YWNlZjk2NDJlYTgzYjRmYjM3OTRmMGIyMjhkZTNlNzc=', 'fornecedor@teste.com.br', 3, 1),
(18, 'Giovanni Giannichi', '', '', '', 0, 0, '', '', 'giogiannichi', 'YTBlMTVhNTk5ZTEyMzA1NmRjZjY4YTcxMzVhNjU4M2Y=', 'giogiannichi@gmail.com', 2, 1);

-- --------------------------------------------------------

--
-- Estrutura da tabela `user_foto`
--

CREATE TABLE `user_foto` (
  `fot_10_id` int(11) NOT NULL AUTO_INCREMENT,
  `usr_10_id` int(11) NOT NULL,
  `fot_30_path` varchar(255) NOT NULL,
  PRIMARY KEY (`fot_10_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Extraindo dados da tabela `user_foto`
--

INSERT INTO `user_foto` (`fot_10_id`, `usr_10_id`, `fot_30_path`) VALUES
(1, 18, '51e8702046e18-18slk2012.jpg'),
(2, 18, '51e8702fdc64c-18casamento1.jpg');

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

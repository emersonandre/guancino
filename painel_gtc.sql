-- phpMyAdmin SQL Dump
-- version 4.1.14
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: 01-Ago-2016 às 22:12
-- Versão do servidor: 5.6.17
-- PHP Version: 5.5.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `painel_gtc`
--

-- --------------------------------------------------------

--
-- Estrutura da tabela `gtc_horarios`
--

CREATE TABLE IF NOT EXISTS `gtc_horarios` (
  `id` int(10) NOT NULL AUTO_INCREMENT COMMENT 'id do cadastro horarios',
  `id_linha` int(5) NOT NULL COMMENT 'is da tabela linha',
  `id_variacao` int(10) NOT NULL COMMENT 'id da tabela variacao',
  `horario` varchar(5) NOT NULL COMMENT 'horario cadastrado',
  `segunda` int(1) NOT NULL COMMENT '0-false 1-true',
  `terca` int(1) NOT NULL COMMENT '0-nao 1-sim',
  `quarta` int(1) NOT NULL COMMENT '0-nao 1-sim',
  `quinta` int(1) NOT NULL COMMENT '0-nao 1-sim',
  `sexta` int(1) NOT NULL COMMENT '0-nao 1-sim',
  `sabado` int(1) NOT NULL COMMENT '0-nao 1-sim',
  `domingo` int(1) NOT NULL COMMENT '0-nao 1-sim',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=80 ;

--
-- Extraindo dados da tabela `gtc_horarios`
--

INSERT INTO `gtc_horarios` (`id`, `id_linha`, `id_variacao`, `horario`, `segunda`, `terca`, `quarta`, `quinta`, `sexta`, `sabado`, `domingo`) VALUES
(39, 37, 0, '10:18', 1, 1, 0, 0, 1, 1, 0),
(45, 36, 0, '10:19', 1, 1, 1, 1, 1, 1, 1),
(48, 36, 0, '10:58', 1, 0, 0, 0, 1, 0, 0),
(52, 1, 0, '10:18', 1, 0, 1, 0, 0, 1, 1),
(56, 3, 0, '10:15', 1, 1, 1, 1, 1, 0, 1),
(58, 3, 0, '10:10', 1, 0, 0, 0, 1, 1, 0),
(60, 3, 0, '10:15', 1, 0, 0, 0, 1, 0, 0),
(62, 2, 0, '10:19', 1, 1, 1, 1, 1, 1, 1),
(63, 2, 0, '10:20', 1, 1, 1, 1, 1, 1, 1),
(65, 2, 0, '10:18', 1, 0, 0, 0, 1, 0, 0),
(66, 2, 0, '10:21', 0, 0, 0, 0, 0, 0, 0),
(67, 2, 0, '10:26', 1, 0, 0, 0, 0, 0, 0),
(69, 2, 0, '08:05', 1, 1, 1, 1, 1, 0, 0),
(70, 2, 0, '09:00', 1, 1, 1, 1, 1, 0, 0),
(71, 2, 0, '09:10', 1, 1, 1, 1, 1, 0, 0),
(72, 2, 0, '09:15', 1, 1, 1, 1, 1, 0, 0),
(73, 2, 0, '12:00', 1, 1, 1, 1, 1, 0, 0),
(74, 37, 0, '10:17', 1, 1, 0, 0, 1, 1, 0),
(75, 36, 1, '10:10', 1, 0, 0, 0, 1, 1, 0),
(76, 36, 1, '10:11', 1, 1, 1, 1, 1, 1, 1),
(78, 35, 0, '10:15', 1, 0, 0, 0, 1, 1, 0);

-- --------------------------------------------------------

--
-- Estrutura da tabela `gtc_linhas`
--

CREATE TABLE IF NOT EXISTS `gtc_linhas` (
  `id` int(5) NOT NULL AUTO_INCREMENT COMMENT 'id da linha',
  `numero` int(5) NOT NULL COMMENT 'numero da linha(unico)',
  `nome` varchar(100) NOT NULL COMMENT 'nome da linha',
  `obs` varchar(200) DEFAULT NULL COMMENT 'observação(se houver)',
  PRIMARY KEY (`id`),
  UNIQUE KEY `numero` (`numero`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=43 ;

--
-- Extraindo dados da tabela `gtc_linhas`
--

INSERT INTO `gtc_linhas` (`id`, `numero`, `nome`, `obs`) VALUES
(1, 2, 'qweqwe', 'qweqwe'),
(2, 3, 'teste2', 'sasasda'),
(3, 1, 'linha 1', 'linha de teste'),
(35, 12, 'bairro centro', 'linha bairro centro / terminal urbano'),
(36, 15, 'bairro belvedere', 'bairro belvedere passa pelo trevo'),
(37, 16, 'bairro bela vista', 'bairro bela vista passa pela fernando machado'),
(40, 10, 'ttttttttttttttttttttttttt', 'tttttttttttttttttt'),
(41, 18, 'teste de linha centro', 'teste de linhas gravadas'),
(42, 25, 'teste de linha centro', 'teste de linhas gravadas');

-- --------------------------------------------------------

--
-- Estrutura da tabela `gtc_linhas_variacao`
--

CREATE TABLE IF NOT EXISTS `gtc_linhas_variacao` (
  `id` int(10) NOT NULL AUTO_INCREMENT COMMENT 'is da variacao',
  `id_linha` int(10) NOT NULL COMMENT 'id da linha cadastrada',
  `nome` varchar(100) NOT NULL,
  `obs` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=7 ;

--
-- Extraindo dados da tabela `gtc_linhas_variacao`
--

INSERT INTO `gtc_linhas_variacao` (`id`, `id_linha`, `nome`, `obs`) VALUES
(1, 36, 'teste variacao', 'teste'),
(2, 35, 'teste2', 'teste'),
(3, 35, 'variacao 2', 'teste de variacao 2'),
(4, 35, 'teste de variaÃ§Ã£o 3', 'teste de variacao'),
(5, 35, 'variacao teste 4', 'teste de variacao'),
(6, 35, 'terminal / guancino', '');

-- --------------------------------------------------------

--
-- Estrutura da tabela `gtc_usuario`
--

CREATE TABLE IF NOT EXISTS `gtc_usuario` (
  `id` int(5) NOT NULL AUTO_INCREMENT COMMENT 'id usuario',
  `nome` varchar(100) NOT NULL,
  `usuario` varchar(15) NOT NULL COMMENT 'login do usuario do sistema',
  `senha` varchar(15) NOT NULL COMMENT 'senha do usuário do sistema',
  `flag` int(1) NOT NULL DEFAULT '0' COMMENT '0-usuario comun / 1- administrador do sistema',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=2 ;

--
-- Extraindo dados da tabela `gtc_usuario`
--

INSERT INTO `gtc_usuario` (`id`, `nome`, `usuario`, `senha`, `flag`) VALUES
(1, 'admin', 'admin', '145819', 1);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

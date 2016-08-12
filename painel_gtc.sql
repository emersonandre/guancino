-- phpMyAdmin SQL Dump
-- version 4.1.14
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: 11-Ago-2016 às 19:51
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
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=104 ;

--
-- Extraindo dados da tabela `gtc_horarios`
--

INSERT INTO `gtc_horarios` (`id`, `id_linha`, `id_variacao`, `horario`, `segunda`, `terca`, `quarta`, `quinta`, `sexta`, `sabado`, `domingo`) VALUES
(88, 43, 9, '10:00', 1, 0, 0, 0, 0, 1, 0),
(89, 43, 10, '10:05', 1, 0, 0, 1, 0, 0, 1),
(90, 44, 11, '10:10', 1, 1, 1, 1, 1, 1, 1),
(91, 44, 12, '10:30', 0, 0, 1, 1, 0, 0, 1),
(92, 44, 12, '10:31', 1, 1, 0, 0, 1, 1, 0),
(93, 44, 12, '10:32', 1, 0, 0, 0, 1, 0, 0),
(94, 44, 13, '10:35', 1, 0, 0, 0, 1, 1, 0),
(97, 44, 12, '10:33', 1, 0, 0, 0, 1, 1, 0),
(98, 44, 14, '10:57', 1, 1, 1, 1, 1, 1, 1),
(99, 44, 0, '10:00', 1, 0, 0, 0, 1, 1, 0),
(102, 44, 13, '10:02', 1, 0, 0, 0, 0, 1, 0),
(103, 43, 9, '10:06', 1, 0, 0, 0, 1, 0, 0);

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
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=45 ;

--
-- Extraindo dados da tabela `gtc_linhas`
--

INSERT INTO `gtc_linhas` (`id`, `numero`, `nome`, `obs`) VALUES
(43, 10, 'Centro', ''),
(44, 12, 'guancino', '');

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
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=15 ;

--
-- Extraindo dados da tabela `gtc_linhas_variacao`
--

INSERT INTO `gtc_linhas_variacao` (`id`, `id_linha`, `nome`, `obs`) VALUES
(9, 43, 'terminal / guancino', ''),
(10, 43, 'Universidade', ''),
(11, 44, 'Escolas', ''),
(12, 44, 'bairro belvedere', ''),
(13, 44, 'Bairro Centro', ''),
(14, 44, 'Bairro Norte', '');

-- --------------------------------------------------------

--
-- Estrutura da tabela `gtc_usuario`
--

CREATE TABLE IF NOT EXISTS `gtc_usuario` (
  `id` int(5) NOT NULL AUTO_INCREMENT COMMENT 'id usuario',
  `nome` varchar(100) NOT NULL,
  `usuario` varchar(15) NOT NULL COMMENT 'login do usuario do sistema',
  `senha` varchar(32) NOT NULL COMMENT 'senha do usuário do sistema',
  `flag` int(1) NOT NULL DEFAULT '0' COMMENT '0-usuario comun / 1- administrador do sistema',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=10 ;

--
-- Extraindo dados da tabela `gtc_usuario`
--

INSERT INTO `gtc_usuario` (`id`, `nome`, `usuario`, `senha`, `flag`) VALUES
(6, 'Administrador', 'admin', '2cb20b7fae5c7dcfaac0c3b4feff373c', 1);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

-- phpMyAdmin SQL Dump
-- version 3.4.11.1deb2+deb7u1
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Feb 10, 2015 at 12:28 PM
-- Server version: 5.5.40
-- PHP Version: 5.4.36-0+deb7u3

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `blog`
--

-- --------------------------------------------------------

--
-- Table structure for table `tbl_autor`
--

CREATE TABLE IF NOT EXISTS `tbl_autor` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `saram` int(7) NOT NULL,
  `posto_graduacao` int(11) NOT NULL,
  `especialidade` int(11) NOT NULL,
  `nome` varchar(128) COLLATE utf8_unicode_ci NOT NULL,
  `senha` varchar(128) COLLATE utf8_unicode_ci NOT NULL,
  `email` varchar(128) COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=3 ;

--
-- Dumping data for table `tbl_autor`
--

INSERT INTO `tbl_autor` (`id`, `saram`, `posto_graduacao`, `especialidade`, `nome`, `senha`, `email`) VALUES
(1, 0, 0, 0, 'goku', '$2a$10$JTJf6', 'goku@example.com'),
(2, 0, 0, 0, 'naruto', 'XqC94rrOtzuF397OHa4m', 'naruto@example.com');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_chamado`
--

CREATE TABLE IF NOT EXISTS `tbl_chamado` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `secao` varchar(50) DEFAULT NULL,
  `posto_graduacao` varchar(50) DEFAULT NULL,
  `nome` varchar(255) DEFAULT NULL,
  `usuario` varchar(255) NOT NULL,
  `ramal` int(4) DEFAULT NULL,
  `tipo` varchar(50) DEFAULT NULL,
  `prioridade` varchar(50) DEFAULT NULL,
  `descricao` varchar(50) DEFAULT NULL,
  `parecer_tecnico` varchar(255) DEFAULT NULL,
  `hora_abertura` datetime NOT NULL,
  `ultima_modificacao` datetime NOT NULL,
  `status` tinyint(1) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=31 ;

--
-- Dumping data for table `tbl_chamado`
--

INSERT INTO `tbl_chamado` (`id`, `secao`, `posto_graduacao`, `nome`, `usuario`, `ramal`, `tipo`, `prioridade`, `descricao`, `parecer_tecnico`, `hora_abertura`, `ultima_modificacao`, `status`) VALUES
(21, '2', '3', 'Raphael Santana', 'santanarscs', 2232, '2', '1', 'problema de cabeÃ§a2', 'ssdfsfseg', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 1),
(22, '1', '6', 'Raphael santana', '', 2232, '1', '3', 'defeito', 'efaefaef', '0000-00-00 00:00:00', '2015-02-09 21:46:50', 0),
(23, '2', '2', 'Raphael Santana2', '', 2232, '1', '3', 'caguei mole', 'aefafe', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 1),
(24, '1', '6', 'David', '', 2232, '1', '3', 'nao sei oque mais', '0', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 1),
(25, '14', '11', 'FalÃ§Ã£o', '', 2232, '3', '3', 'instalar plugin banco do brasil', NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0),
(26, '7', '13', 'Magrilia', '', 2220, '1', '3', 'colocar arquivo na pagina do depens', NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0),
(27, '11', '9', 'Lizziane', '', 2280, '3', '3', 'dor no cÃº', NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0),
(28, '11', '9', 'Alessandra Mulan', '', 2280, '3', '3', 'dor no cutuvelo', NULL, '2015-02-03 23:26:21', '0000-00-00 00:00:00', 0),
(29, '3', '1', 'efaefa', 'sergio', 2232, '3', '1', 'faefaege', 'SÃ©rgio Ã© um boiola', '2015-02-04 17:34:28', '2015-02-09 21:52:41', 1),
(30, '4', '2', 'aefae', 'sergio', 2231, '1', '1', 'afeagae aeasef', NULL, '2015-02-04 17:56:32', '0000-00-00 00:00:00', 0);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_post`
--

CREATE TABLE IF NOT EXISTS `tbl_post` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `titulo` varchar(128) COLLATE utf8_unicode_ci NOT NULL,
  `conteudo` text COLLATE utf8_unicode_ci NOT NULL,
  `autor_id` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `FK_post_author` (`autor_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=4 ;

--
-- Dumping data for table `tbl_post`
--

INSERT INTO `tbl_post` (`id`, `titulo`, `conteudo`, `autor_id`) VALUES
(1, 'Um Post do Goku', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.', 1),
(2, 'Outro Post do Goku', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.', 1),
(3, 'Um Post do Naruto', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.', 2);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_usuario`
--

CREATE TABLE IF NOT EXISTS `tbl_usuario` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `saram` int(7) NOT NULL,
  `posto_graduacao` int(11) NOT NULL,
  `especialidade` int(11) NOT NULL,
  `nome` varchar(255) DEFAULT NULL,
  `data_nascimento` date NOT NULL,
  `data_ultima_promocao` date NOT NULL,
  `data_praca` date NOT NULL,
  `secao` int(11) NOT NULL,
  `login` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `senha` varchar(255) NOT NULL,
  `grupo` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=15 ;

--
-- Dumping data for table `tbl_usuario`
--

INSERT INTO `tbl_usuario` (`id`, `saram`, `posto_graduacao`, `especialidade`, `nome`, `data_nascimento`, `data_ultima_promocao`, `data_praca`, `secao`, `login`, `email`, `senha`, `grupo`) VALUES
(6, 6253814, 13, 2, 'Raphael Santana Correia Silva', '1991-10-13', '2011-06-21', '2011-01-12', 1, 'santanarscs', 'santanarscs@depens.intraer', '5c0361d604a32db263876c4ed4bc828c', 1),
(7, 242424, 13, 2, 'SÃ©rgio Teixeira', '1989-11-24', '2014-11-24', '2013-11-24', 1, 'sergio', '0', '4297f44b13955235245b2497399d7a93', 0),
(8, 6253814, 13, 2, 'Miqueias Coelho', '1985-02-28', '2012-11-16', '2006-01-04', 10, 'malaquias', '', '4297f44b13955235245b2497399d7a93', 0),
(9, 1234567, 1, 1, 'Adauto Freitas', '1970-07-08', '2012-07-11', '1991-07-17', 17, 'adautoafm', '', '4297f44b13955235245b2497399d7a93', 1),
(10, 2039485, 15, 8, 'Cesar Augusto', '1995-02-09', '2014-07-23', '2014-02-03', 17, 'cesar', 'cesaraugusto@depens.intraer', '4297f44b13955235245b2497399d7a93', 2),
(14, 3242134, 10, 3, 'JosÃ© Roberto', '2005-02-10', '2015-02-11', '2015-02-18', 16, 'jroberto', 'jroberto@depens.intraer', '4297f44b13955235245b2497399d7a93', 2);

--
-- Constraints for dumped tables
--

--
-- Constraints for table `tbl_post`
--
ALTER TABLE `tbl_post`
  ADD CONSTRAINT `FK_post_author` FOREIGN KEY (`autor_id`) REFERENCES `tbl_autor` (`id`) ON DELETE CASCADE;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

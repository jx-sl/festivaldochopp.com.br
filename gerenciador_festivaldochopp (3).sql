-- phpMyAdmin SQL Dump
-- version 3.5.1
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Apr 16, 2014 at 12:04 PM
-- Server version: 5.5.24-log
-- PHP Version: 5.3.13

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `gerenciador_festivaldochopp`
--

-- --------------------------------------------------------

--
-- Table structure for table `fotos`
--

CREATE TABLE IF NOT EXISTS `fotos` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `imagem` varchar(100) NOT NULL,
  `descricao` varchar(250) NOT NULL,
  `id_galeria` int(11) NOT NULL,
  `ativo` tinyint(1) NOT NULL,
  `data_criacao` date NOT NULL,
  PRIMARY KEY (`id`),
  KEY `id_galeria` (`id_galeria`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=26 ;

--
-- Dumping data for table `fotos`
--

INSERT INTO `fotos` (`id`, `imagem`, `descricao`, `id_galeria`, `ativo`, `data_criacao`) VALUES
(23, 'festivalchopp_8.jpg', 'imagem', 16, 1, '2014-04-16'),
(24, 'festivalchopp_9.jpg', 'imagem', 16, 1, '2014-04-16'),
(25, 'festivalchopp_10.jpg', 'imagem', 16, 1, '2014-04-16');

-- --------------------------------------------------------

--
-- Table structure for table `galerias`
--

CREATE TABLE IF NOT EXISTS `galerias` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `imagem` varchar(100) NOT NULL,
  `titulo` varchar(250) NOT NULL,
  `descricao` text NOT NULL,
  `ativo` tinyint(1) NOT NULL,
  `data_criacao` date NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=17 ;

--
-- Dumping data for table `galerias`
--

INSERT INTO `galerias` (`id`, `imagem`, `titulo`, `descricao`, `ativo`, `data_criacao`) VALUES
(16, 'img.jpg', 'Galeria teste', 'Teste 02', 1, '2014-04-16');

-- --------------------------------------------------------

--
-- Table structure for table `noticias`
--

CREATE TABLE IF NOT EXISTS `noticias` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `titulo` varchar(250) NOT NULL,
  `ativo` tinyint(1) NOT NULL,
  `imagem` varchar(100) NOT NULL,
  `descricao` text NOT NULL,
  `data_criacao` date NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `slider`
--

CREATE TABLE IF NOT EXISTS `slider` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `titulo` text NOT NULL,
  `imagem` varchar(100) NOT NULL,
  `descricao` text NOT NULL,
  `link` varchar(300) NOT NULL,
  `ativo` tinyint(1) NOT NULL,
  `data_criacao` date NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=3 ;

--
-- Dumping data for table `slider`
--

INSERT INTO `slider` (`id`, `titulo`, `imagem`, `descricao`, `link`, `ativo`, `data_criacao`) VALUES
(1, 'Titulo 01', 'thumb01.jpg', 'asdfbjskDBGKHHBhblkhbkjJH', '#', 1, '2014-04-13'),
(2, 'Titulo 02', 'thumb02.jpg', '', '', 1, '2014-04-02');

-- --------------------------------------------------------

--
-- Table structure for table `usuarios`
--

CREATE TABLE IF NOT EXISTS `usuarios` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `login` varchar(50) NOT NULL,
  `pass` varchar(500) NOT NULL,
  `nome` text NOT NULL,
  `data_criacao` date NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `usuarios`
--

INSERT INTO `usuarios` (`id`, `login`, `pass`, `nome`, `data_criacao`) VALUES
(1, 'admin', 'e10adc3949ba59abbe56e057f20f883e', 'Administrador', '2014-04-15');

--
-- Constraints for dumped tables
--

--
-- Constraints for table `fotos`
--
ALTER TABLE `fotos`
  ADD CONSTRAINT `fotos_ibfk_2` FOREIGN KEY (`id_galeria`) REFERENCES `galerias` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

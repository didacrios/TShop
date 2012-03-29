-- phpMyAdmin SQL Dump
-- version 3.4.5
-- http://www.phpmyadmin.net
--
-- Servidor: localhost
-- Temps de generació: 29-03-2012 a les 16:01:16
-- Versió del servidor: 5.5.16
-- Versió de PHP : 5.3.8

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Base de dades: `tmbc_eshop`
--

-- --------------------------------------------------------

--
-- Estructura de la taula `ts_clients`
--

CREATE TABLE IF NOT EXISTS `ts_clients` (
  `id_client` int(11) NOT NULL AUTO_INCREMENT,
  `id_grup` int(11) NOT NULL,
  `usuari` varchar(20) NOT NULL,
  `contrasenya` char(32) NOT NULL,
  `nom` varchar(100) NOT NULL,
  `cognoms` varchar(100) NOT NULL,
  `correu` varchar(30) NOT NULL,
  `data_registre` datetime NOT NULL,
  `data_seen` datetime NOT NULL,
  `tipus_email` enum('html','text') NOT NULL DEFAULT 'html',
  `llista_correu` enum('0','1') NOT NULL DEFAULT '1' COMMENT '0 desactivat / 1 activat',
  `id_idioma` int(11) NOT NULL DEFAULT '1',
  `codiactivacio` char(32) NOT NULL,
  `estat` enum('0','1') NOT NULL DEFAULT '0' COMMENT '0 -> deshabilitat | 1-> habilitat',
  PRIMARY KEY (`id_client`),
  UNIQUE KEY `correu` (`correu`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=9 ;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

-- phpMyAdmin SQL Dump
-- version 4.1.14
-- http://www.phpmyadmin.net
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 21-01-2015 a las 09:25:54
-- Versión del servidor: 5.6.17
-- Versión de PHP: 5.5.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Base de datos: `raneros`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `album`
--

CREATE TABLE IF NOT EXISTS `album` (
  `idAlbum` int(11) NOT NULL AUTO_INCREMENT,
  `nombre` varchar(45) DEFAULT NULL,
  PRIMARY KEY (`idAlbum`),
  UNIQUE KEY `idAlbum_UNIQUE` (`idAlbum`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=2 ;

--
-- Volcado de datos para la tabla `album`
--

INSERT INTO `album` (`idAlbum`, `nombre`) VALUES
(1, 'tapas');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `cometario`
--

CREATE TABLE IF NOT EXISTS `cometario` (
  `idcomentario` int(11) NOT NULL AUTO_INCREMENT,
  `comentario` varchar(500) NOT NULL,
  `usuario_idusuarios` int(11) NOT NULL,
  `evento_idEvento` int(11) DEFAULT NULL,
  `tapa_idTapa` int(11) DEFAULT NULL,
  `foto_idFoto` int(11) DEFAULT NULL,
  PRIMARY KEY (`idcomentario`),
  KEY `fk_cometario_usuario1_idx` (`usuario_idusuarios`),
  KEY `fk_cometario_evento1_idx` (`evento_idEvento`),
  KEY `fk_cometario_tapa1_idx` (`tapa_idTapa`),
  KEY `fk_cometario_foto1_idx` (`foto_idFoto`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=7 ;

--
-- Volcado de datos para la tabla `cometario`
--

INSERT INTO `cometario` (`idcomentario`, `comentario`, `usuario_idusuarios`, `evento_idEvento`, `tapa_idTapa`, `foto_idFoto`) VALUES
(6, 'mu rica', 1, NULL, 27, NULL);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `evento`
--

CREATE TABLE IF NOT EXISTS `evento` (
  `idEvento` int(11) NOT NULL AUTO_INCREMENT,
  `nombre` varchar(45) NOT NULL,
  `descripcion` varchar(500) NOT NULL,
  `fecha` date NOT NULL,
  `portada` varchar(400) NOT NULL,
  `album_idAlbum` int(11) NOT NULL,
  PRIMARY KEY (`idEvento`,`album_idAlbum`),
  UNIQUE KEY `idEvento_UNIQUE` (`idEvento`),
  KEY `fk_evento_album1_idx` (`album_idAlbum`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `foto`
--

CREATE TABLE IF NOT EXISTS `foto` (
  `idFoto` int(11) NOT NULL AUTO_INCREMENT,
  `foto` varchar(400) DEFAULT NULL,
  `album_idAlbum` int(11) NOT NULL,
  `tapa_idtapa` int(11) NOT NULL,
  PRIMARY KEY (`idFoto`),
  UNIQUE KEY `idFoto_UNIQUE` (`idFoto`),
  KEY `fk_foto_album1_idx` (`album_idAlbum`),
  KEY `tapa_idtapa` (`tapa_idtapa`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=20 ;

--
-- Volcado de datos para la tabla `foto`
--

INSERT INTO `foto` (`idFoto`, `foto`, `album_idAlbum`, `tapa_idtapa`) VALUES
(1, 'tomate.jpg', 1, 1),
(2, 'lomo.jpg', 1, 2),
(19, 'carneConTomate.jpg', 1, 27);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `menu`
--

CREATE TABLE IF NOT EXISTS `menu` (
  `idMenu` int(11) NOT NULL,
  `nombre` varchar(45) NOT NULL,
  `url` varchar(300) NOT NULL,
  `soloRoot` tinyint(1) NOT NULL DEFAULT '1',
  `usuario_idusuarios` int(11) NOT NULL,
  PRIMARY KEY (`idMenu`),
  KEY `fk_menu_usuario1_idx` (`usuario_idusuarios`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `menu`
--

INSERT INTO `menu` (`idMenu`, `nombre`, `url`, `soloRoot`, `usuario_idusuarios`) VALUES
(0, 'Inicio', 'index.php', 0, 0),
(2, 'Galeria', 'galeria.php', 0, 0),
(3, 'Eventos', 'eventos.php', 0, 0),
(4, 'Carta', 'carta.php', 0, 0),
(5, 'Productos', 'productos.php', 0, 0),
(6, 'Conocenos', 'conocenos.php', 0, 0),
(7, 'Ingresar', 'ingresar.php', 0, 0);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tapa`
--

CREATE TABLE IF NOT EXISTS `tapa` (
  `idTapa` int(11) NOT NULL AUTO_INCREMENT,
  `nombre` varchar(100) NOT NULL,
  `descripcion` varchar(500) NOT NULL,
  `tipoTapa_idTipoTapa` int(11) NOT NULL,
  PRIMARY KEY (`idTapa`),
  UNIQUE KEY `idTapa_UNIQUE` (`idTapa`),
  KEY `fk_tapa_tipoTapa1_idx` (`tipoTapa_idTipoTapa`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=28 ;

--
-- Volcado de datos para la tabla `tapa`
--

INSERT INTO `tapa` (`idTapa`, `nombre`, `descripcion`, `tipoTapa_idTipoTapa`) VALUES
(1, 'Tomate', 'Pan rustico y crujiente con un rico tomate de la tierra aderezado con aceite de oliva virgen extra.', 1),
(2, 'Lomo', 'Jugoso filete de lomo en bollo crujiente sobre una base de pimiento y tomate de la tierra.', 3),
(27, 'Carne con Tomate', 'Carne con Tomate', 3);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tipotapa`
--

CREATE TABLE IF NOT EXISTS `tipotapa` (
  `idTipoTapa` int(11) NOT NULL AUTO_INCREMENT,
  `nombre` varchar(45) NOT NULL,
  PRIMARY KEY (`idTipoTapa`),
  UNIQUE KEY `idTipoTapa_UNIQUE` (`idTipoTapa`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=6 ;

--
-- Volcado de datos para la tabla `tipotapa`
--

INSERT INTO `tipotapa` (`idTipoTapa`, `nombre`) VALUES
(1, 'Desayunos'),
(2, 'Alpargatas'),
(3, 'Almuerzos'),
(5, 'Bodegas');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuario`
--

CREATE TABLE IF NOT EXISTS `usuario` (
  `idusuarios` int(11) NOT NULL AUTO_INCREMENT,
  `nombre` varchar(45) DEFAULT NULL,
  `apellidos` varchar(45) DEFAULT NULL,
  `nick` varchar(45) NOT NULL,
  `email` varchar(45) NOT NULL,
  `password` varchar(100) NOT NULL,
  `esRoot` tinyint(1) NOT NULL DEFAULT '0',
  PRIMARY KEY (`idusuarios`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=3 ;

--
-- Volcado de datos para la tabla `usuario`
--

INSERT INTO `usuario` (`idusuarios`, `nombre`, `apellidos`, `nick`, `email`, `password`, `esRoot`) VALUES
(1, 'prueba', 'prueba', 'prueba', 'admin@raneros.es', '$2y$10$qbUqzFdOXu3iSMkW3tS6Te5cZhcgzMwY3s0JmEk3zt7SA2ivnb91G', 0),
(2, 'adasd', 'adfasdf', 'admin', 'asdfasdf', '$2y$10$0/hS4Nd7VNltVtLCYJiqv.SOe7rwVuFE0CI3nJLD.Q97/xK3pjnhq', 1);

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `cometario`
--
ALTER TABLE `cometario`
  ADD CONSTRAINT `fk_cometario_evento1` FOREIGN KEY (`evento_idEvento`) REFERENCES `evento` (`idEvento`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_cometario_foto1` FOREIGN KEY (`foto_idFoto`) REFERENCES `foto` (`idFoto`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_cometario_tapa1` FOREIGN KEY (`tapa_idTapa`) REFERENCES `tapa` (`idTapa`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_cometario_usuario1` FOREIGN KEY (`usuario_idusuarios`) REFERENCES `usuario` (`idusuarios`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `evento`
--
ALTER TABLE `evento`
  ADD CONSTRAINT `fk_evento_album1` FOREIGN KEY (`album_idAlbum`) REFERENCES `album` (`idAlbum`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `foto`
--
ALTER TABLE `foto`
  ADD CONSTRAINT `fk_foto_album1` FOREIGN KEY (`album_idAlbum`) REFERENCES `album` (`idAlbum`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `foto_ibfk_1` FOREIGN KEY (`tapa_idtapa`) REFERENCES `tapa` (`idTapa`) ON DELETE CASCADE ON UPDATE CASCADE;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

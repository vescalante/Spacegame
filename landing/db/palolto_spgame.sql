-- phpMyAdmin SQL Dump
-- version 5.0.3
-- https://www.phpmyadmin.net/
--
-- Servidor: localhost:3306
-- Tiempo de generación: 16-12-2020 a las 21:15:22
-- Versión del servidor: 10.1.47-MariaDB-0+deb9u1
-- Versión de PHP: 7.3.22

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `palolto_spgame`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `acceso`
--

CREATE TABLE `acceso` (
  `id_acceso` int(11) NOT NULL,
  `usuario` varchar(45) DEFAULT NULL,
  `password` varchar(45) DEFAULT NULL,
  `nombre` varchar(150) DEFAULT NULL,
  `apellido` varchar(100) DEFAULT NULL,
  `email` varchar(100) DEFAULT NULL,
  `categoria` varchar(100) DEFAULT NULL,
  `ultimo_ingreso` date DEFAULT NULL,
  `ingresos` int(11) DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `acceso`
--

INSERT INTO `acceso` (`id_acceso`, `usuario`, `password`, `nombre`, `apellido`, `email`, `categoria`, `ultimo_ingreso`, `ingresos`) VALUES
(1, 'admin', 'Pass2@20reg', 'Usuario', 'Administrador', 'victor.escalante@mymarketlogic.com', 'admin', '2020-01-17', 24);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `registro`
--

CREATE TABLE `registro` (
  `reg_id` int(10) UNSIGNED NOT NULL,
  `reg_origen` varchar(180) NOT NULL,
  `reg_nombre` varchar(255) CHARACTER SET latin1 NOT NULL DEFAULT '',
  `reg_email` varchar(100) CHARACTER SET latin1 NOT NULL DEFAULT '',
  `reg_alias` varchar(50) NOT NULL,
  `reg_avatar` varchar(180) NOT NULL,
  `reg_score` int(11) NOT NULL DEFAULT '0',
  `reg_intentos` int(11) NOT NULL DEFAULT '3',
  `qrcode` varchar(255) DEFAULT NULL,
  `envios` int(11) DEFAULT '1',
  `flag_cc` int(11) NOT NULL DEFAULT '0',
  `reg_estatus` int(11) NOT NULL DEFAULT '0',
  `reg_fecha_alta` date DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `registro`
--

INSERT INTO `registro` (`reg_id`, `reg_origen`, `reg_nombre`, `reg_email`, `reg_alias`, `reg_avatar`, `reg_score`, `reg_intentos`, `qrcode`, `envios`, `flag_cc`, `reg_estatus`, `reg_fecha_alta`) VALUES
(1, 'WEBFORM', 'Ruben', 'rrodriguez@developmentfactor.com.mx', 'rubz', 'avatar_player_18.png', 0, 3, '328150458899', 1, 0, 0, '2020-11-28');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `acceso`
--
ALTER TABLE `acceso`
  ADD PRIMARY KEY (`id_acceso`);

--
-- Indices de la tabla `registro`
--
ALTER TABLE `registro`
  ADD PRIMARY KEY (`reg_id`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `acceso`
--
ALTER TABLE `acceso`
  MODIFY `id_acceso` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de la tabla `registro`
--
ALTER TABLE `registro`
  MODIFY `reg_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

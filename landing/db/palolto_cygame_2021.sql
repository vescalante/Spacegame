-- phpMyAdmin SQL Dump
-- version 5.0.3
-- https://www.phpmyadmin.net/
--
-- Servidor: localhost:3306
-- Tiempo de generación: 22-02-2021 a las 20:55:28
-- Versión del servidor: 10.1.48-MariaDB-0+deb9u1
-- Versión de PHP: 7.3.26

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `palolto_cygame`
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
  `reg_empresa` varchar(255) DEFAULT NULL,
  `reg_puesto` varchar(255) DEFAULT NULL,
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

INSERT INTO `registro` (`reg_id`, `reg_origen`, `reg_nombre`, `reg_email`, `reg_empresa`, `reg_puesto`, `reg_alias`, `reg_avatar`, `reg_score`, `reg_intentos`, `qrcode`, `envios`, `flag_cc`, `reg_estatus`, `reg_fecha_alta`) VALUES
(1, 'WEBFORM', 'Roxana ', 'rvallejo@developmentfactor.com.mx', 'Development Factor', 'Ejecutiva de cuenta', 'Roxx', 'avatar_player_14.png', 6010, 2, '873734996780', 1, 0, 0, '2020-12-21'),
(2, 'WEBFORM', 'Roxana ', 'roxana.vallejo@developmentfactor.com.mx', 'Development Factor', 'Ejecutiva de cuenta', 'Roxy', 'avatar_player_15.png', 15, 1, '531594167052', 1, 0, 0, '2020-12-21'),
(3, 'WEBFORM', 'Víctor Hugo', 'vescalante@dfactor.com', 'DevFactor', 'Desarrollo', 'vicx', 'avatar_player_07.png', 57021, 3, '677285217327', 1, 0, 0, '2020-12-21'),
(4, 'WEBFORM', 'MIGUEL', 'mbarbosa@developmentfactor.com.mx', 'DEVELOPMENT FACTOR', 'CREATIVO', 'MIKE', 'avatar_player_10.png', 1640, 2, '243929395553', 1, 0, 0, '2020-12-22'),
(5, 'WEBFORM', 'Yazmin', 'yarch@developmentfactor.com.mx', 'dfactor', 'MKT', 'arch', 'avatar_player_13.png', 0, 2, '279002656161', 1, 0, 0, '2021-01-07'),
(6, 'WEBFORM', 'Angel Monroy', 'amonroy@developmentfactor.com.mx', 'PRUEBA DE REGISTRO', 'DWEB', 'Amonroydfactor', 'avatar_player_13.png', 21310, 0, '873552740834', 1, 0, 0, '2021-01-20'),
(13, 'WEBFORM', 'Miguel Bello', 'miguelbello@proelium.mx', 'Proelium', 'CEO', 'Mikel', 'avatar_player_07.png', 1600, 2, '284993661638', 1, 0, 0, '2021-01-21'),
(7, 'WEBFORM', 'Ruben', 'rrodriguez@dfactor.com.mx', 'Successophy Comunicacion Estrategica SA de CV', 'Gerente', 'rubz', 'avatar_player_08.png', 5535, 1, '053865080596', 1, 0, 0, '2021-01-20'),
(8, 'WEBFORM', 'juan', 'IDV23900@GMAIL.COM', ' RUIZ IÑ', 'Diseñador', 'sas', 'avatar_player_15.png', 925, 2, '745586943772', 1, 0, 0, '2021-01-20'),
(9, 'WEBFORM', 'Dann', 'ggarcia@developmentfactor.com.mx', 'DFactor', 'CAMAROGRAFO ', 'Danno', 'avatar_player_11.png', 0, 3, '420219642118', 1, 0, 0, '2021-01-20'),
(10, 'WEBFORM', 'Marco Antonio', 'mmartinez@developmentfactor.com.mx', 'Development Factor', 'Diseñador', 'mmartinez', 'avatar_player_15.png', 685, 1, '870798089737', 1, 0, 0, '2021-01-20'),
(11, 'WEBFORM', 'Alan David', 'aaquino@developmentfactor.mx', 'Dfactor', 'DG', 'Davis', 'avatar_player_07.png', 0, 3, '836400542798', 1, 0, 0, '2021-01-20'),
(12, 'WEBFORM', 'Eliel Cristalinas Villanueva', 'sistemas@developmentfactor.com.mx', 'dfactor', 'Sistemas', '73173', 'avatar_player_07.png', 540, 2, '966501401742', 1, 0, 0, '2021-01-20'),
(14, 'WEBFORM', 'Marisol Gonzalez', 'mgonzalezo@paloaltonetworks.com', 'Palo Alto Networks', 'Head of Marketing', 'Marisol', 'avatar_player_07.png', 4170, 0, '775830097549', 1, 0, 0, '2021-01-27'),
(15, 'WEBFORM', 'Haide Escorcia', 'hescorcia@developmentfactor.com.mx', 'Development Factor', 'CEO', 'Haide', 'avatar_player_14.png', 0, 3, '951340261555', 1, 0, 0, '2021-02-17'),
(16, 'WEBFORM', 'leonardo', 'lulloaponce@algo-studio.com.mx', 'Algo', 'Creativo ', 'Leo', 'avatar_player_06.png', 0, 2, '288687317256', 1, 0, 0, '2021-02-17');

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
  MODIFY `reg_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

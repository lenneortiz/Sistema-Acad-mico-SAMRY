-- phpMyAdmin SQL Dump
-- version 3.4.10.1deb1
-- http://www.phpmyadmin.net
--
-- Servidor: localhost
-- Tiempo de generación: 08-05-2014 a las 14:44:14
-- Versión del servidor: 5.5.32
-- Versión de PHP: 5.3.10-1ubuntu3.10

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Base de datos: `SAMRY`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `ambiente`
--

CREATE TABLE IF NOT EXISTS `ambiente` (
  `id_ambiente` int(11) NOT NULL AUTO_INCREMENT,
  `id_plantel` int(11) NOT NULL,
  `nombre_ambiente` varchar(200) COLLATE utf8_spanish_ci NOT NULL,
  `tipo_ambiente` varchar(50) COLLATE utf8_spanish_ci NOT NULL,
  `turno_clase` varchar(50) COLLATE utf8_spanish_ci NOT NULL,
  `horario_clase` varchar(20) COLLATE utf8_spanish_ci NOT NULL,
  `id_user_facilitador` int(11) NOT NULL,
  `id_user_coordinador` int(11) NOT NULL,
  `id_user_vocero` int(11) NOT NULL,
  `id_cohorte` int(11) NOT NULL,
  `id_semestre` int(11) NOT NULL,
  PRIMARY KEY (`id_ambiente`),
  KEY `id_user_facilitador` (`id_user_facilitador`),
  KEY `id_user_coordinador` (`id_user_coordinador`),
  KEY `id_user_vocero` (`id_user_vocero`),
  KEY `id_cohorte` (`id_cohorte`),
  KEY `id_semestre` (`id_semestre`),
  KEY `id_plantel` (`id_plantel`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci AUTO_INCREMENT=10 ;

--
-- Volcado de datos para la tabla `ambiente`
--

INSERT INTO `ambiente` (`id_ambiente`, `id_plantel`, `nombre_ambiente`, `tipo_ambiente`, `turno_clase`, `horario_clase`, `id_user_facilitador`, `id_user_coordinador`, `id_user_vocero`, `id_cohorte`, `id_semestre`) VALUES
(1, 17, 'AMBIENTE LA CUCHILLA', 'Robinson', 'Sabado a Domingo', 'Nocturno', 11, 15, 7, 1, 1),
(2, 12, 'ambiente Robinson', 'Centro de trabajo', 'Lunes a Viernes', 'Diurno', 13, 16, 7, 1, 1),
(3, 8, 'batalla de carabobo', 'Alternativo', 'Lunes a Viernes', 'Nocturno', 6, 2, 4, 1, 1),
(4, 3, 'Alambres de Yaracuy', 'Centro de trabajo', 'Lunes a Viernes', 'Diurno', 3, 9, 7, 1, 1),
(5, 19, 'La Honestidad', 'Alternativo', 'Lunes a Viernes', 'Nocturno', 14, 16, 17, 2, 3),
(6, 21, 'Ernesto &quot;Che&quot; Guevara', 'Robinson', 'Lunes a Viernes', 'Nocturno', 6, 8, 7, 2, 3),
(7, 12, 'Simón Bolívar', 'Centro de trabajo', 'Sabado a Domingo', 'Diurno', 11, 16, 4, 2, 3),
(8, 5, 'Pueblo Comunal Bella Vista', 'Alternativo', 'Lunes a Viernes', 'Nocturno', 3, 15, 7, 2, 3),
(9, 6, 'sector Las tapias', 'Alternativo', 'Lunes a Viernes', 'Nocturno', 13, 15, 17, 2, 3);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `cohorte`
--

CREATE TABLE IF NOT EXISTS `cohorte` (
  `id_cohorte` int(11) NOT NULL AUTO_INCREMENT,
  `describe_cohorte` varchar(12) COLLATE utf8_spanish_ci NOT NULL,
  `tipo_cohorte` char(1) COLLATE utf8_spanish_ci NOT NULL,
  `fec_inic` varchar(10) COLLATE utf8_spanish_ci NOT NULL,
  `fec_fin` varchar(10) COLLATE utf8_spanish_ci NOT NULL,
  `estado_cohorte` varchar(10) COLLATE utf8_spanish_ci NOT NULL,
  `fec_registro` date DEFAULT NULL,
  `anio` year(4) DEFAULT NULL,
  PRIMARY KEY (`id_cohorte`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci AUTO_INCREMENT=3 ;

--
-- Volcado de datos para la tabla `cohorte`
--

INSERT INTO `cohorte` (`id_cohorte`, `describe_cohorte`, `tipo_cohorte`, `fec_inic`, `fec_fin`, `estado_cohorte`, `fec_registro`, `anio`) VALUES
(1, 'cohorte-18', 'A', '12/01/2014', '20/12/2014', 'Activo', '2014-04-29', 2014),
(2, 'cohorte-20', 'B', '12/01/2015', '20/12/2015', 'Activo', '2014-04-29', 2014);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `documentos`
--

CREATE TABLE IF NOT EXISTS `documentos` (
  `id_documento` int(11) NOT NULL AUTO_INCREMENT,
  `id_vencedor` int(11) NOT NULL,
  `partida_naci` char(2) COLLATE utf8_spanish_ci NOT NULL,
  `nota_certificada_9_grado` char(2) COLLATE utf8_spanish_ci NOT NULL,
  `fotocopia_cedula` char(2) COLLATE utf8_spanish_ci NOT NULL,
  `foto` char(2) COLLATE utf8_spanish_ci NOT NULL,
  PRIMARY KEY (`id_documento`),
  KEY `id_vencedor` (`id_vencedor`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci AUTO_INCREMENT=17 ;

--
-- Volcado de datos para la tabla `documentos`
--

INSERT INTO `documentos` (`id_documento`, `id_vencedor`, `partida_naci`, `nota_certificada_9_grado`, `fotocopia_cedula`, `foto`) VALUES
(1, 1, 'SI', 'SI', 'SI', 'SI'),
(2, 2, 'SI', 'SI', 'SI', 'SI'),
(3, 3, 'SI', 'SI', 'SI', 'SI'),
(4, 4, 'SI', 'SI', 'SI', 'SI'),
(5, 5, 'SI', 'SI', 'SI', 'SI'),
(6, 6, 'SI', 'SI', 'SI', 'SI'),
(7, 7, 'SI', 'SI', 'SI', 'SI'),
(8, 8, 'SI', 'NO', 'SI', 'NO'),
(9, 9, 'SI', 'SI', 'SI', 'NO'),
(10, 10, 'SI', 'SI', 'SI', 'SI'),
(11, 11, 'SI', 'SI', 'SI', 'SI'),
(12, 12, 'SI', 'SI', 'SI', 'NO'),
(13, 13, 'SI', 'SI', 'SI', 'NO'),
(14, 14, 'SI', 'SI', 'SI', 'NO'),
(15, 15, 'SI', 'SI', 'SI', 'NO'),
(16, 16, 'SI', 'SI', 'SI', 'NO');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `dvd`
--

CREATE TABLE IF NOT EXISTS `dvd` (
  `id_dvd` int(11) NOT NULL AUTO_INCREMENT,
  `id_ambiente` int(11) NOT NULL,
  `fec_asignado_dvd` varchar(10) COLLATE utf8_spanish_ci NOT NULL,
  `marca_dvd` varchar(40) COLLATE utf8_spanish_ci NOT NULL,
  `modelo_dvd` varchar(40) COLLATE utf8_spanish_ci NOT NULL,
  `serial_fabrica_dvd` varchar(100) COLLATE utf8_spanish_ci NOT NULL,
  `serial_ribas_dvd` varchar(100) COLLATE utf8_spanish_ci NOT NULL,
  PRIMARY KEY (`id_dvd`),
  KEY `id_ambiente` (`id_ambiente`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci AUTO_INCREMENT=3 ;

--
-- Volcado de datos para la tabla `dvd`
--

INSERT INTO `dvd` (`id_dvd`, `id_ambiente`, `fec_asignado_dvd`, `marca_dvd`, `modelo_dvd`, `serial_fabrica_dvd`, `serial_ribas_dvd`) VALUES
(1, 1, '14/01/2014', 'philips', 'SPD6104BD', 'SPD6002BM/00', 'R04050KG00'),
(2, 9, '13/01/2014', 'panasonic', 'DT-l32b5', 'YK1C0814910799', 'RB95056469');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `folleto`
--

CREATE TABLE IF NOT EXISTS `folleto` (
  `id_folleto` int(11) NOT NULL AUTO_INCREMENT,
  `id_ambiente` int(11) NOT NULL,
  `fec_asignado_folleto` varchar(10) COLLATE utf8_spanish_ci NOT NULL,
  `cantidad_folleto` varchar(40) COLLATE utf8_spanish_ci NOT NULL,
  `kit_video_clase` varchar(200) COLLATE utf8_spanish_ci NOT NULL,
  PRIMARY KEY (`id_folleto`),
  KEY `id_ambiente` (`id_ambiente`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci AUTO_INCREMENT=3 ;

--
-- Volcado de datos para la tabla `folleto`
--

INSERT INTO `folleto` (`id_folleto`, `id_ambiente`, `fec_asignado_folleto`, `cantidad_folleto`, `kit_video_clase`) VALUES
(1, 1, '14/01/2014', '50', 'SI'),
(2, 9, '13/01/2014', '20', 'SI');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `hora_clase`
--

CREATE TABLE IF NOT EXISTS `hora_clase` (
  `id_hora` int(11) NOT NULL AUTO_INCREMENT,
  `id_semestre` int(11) NOT NULL,
  `id_materia` int(11) NOT NULL,
  `hora` int(1) NOT NULL,
  `tipo_clase` varchar(35) COLLATE utf8_spanish_ci DEFAULT NULL,
  PRIMARY KEY (`id_hora`),
  KEY `id_semestre` (`id_semestre`),
  KEY `id_materia` (`id_materia`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci AUTO_INCREMENT=21 ;

--
-- Volcado de datos para la tabla `hora_clase`
--

INSERT INTO `hora_clase` (`id_hora`, `id_semestre`, `id_materia`, `hora`, `tipo_clase`) VALUES
(1, 1, 1, 5, 'semanales'),
(2, 1, 2, 3, 'semanales'),
(3, 1, 6, 2, 'semanales'),
(4, 1, 7, 2, 'quincenales'),
(5, 1, 10, 5, 'semanales'),
(6, 2, 1, 3, 'semanales'),
(7, 2, 2, 2, 'semanales'),
(8, 2, 5, 2, 'semanales'),
(9, 2, 6, 2, 'semanales'),
(10, 2, 7, 2, 'quincenales'),
(11, 2, 8, 3, 'semanales'),
(12, 2, 10, 3, 'semanales'),
(13, 3, 1, 3, 'semanales'),
(14, 3, 3, 1, 'semanales'),
(15, 3, 4, 1, 'semanales'),
(16, 3, 6, 1, 'semanales'),
(17, 3, 7, 2, 'quincenales'),
(18, 3, 8, 2, 'semanales'),
(19, 3, 9, 1, 'semanales'),
(20, 3, 10, 2, 'semanales');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `materia`
--

CREATE TABLE IF NOT EXISTS `materia` (
  `id_materia` int(11) NOT NULL AUTO_INCREMENT,
  `descripcion` varchar(50) COLLATE utf8_spanish_ci NOT NULL,
  `estado` varchar(10) COLLATE utf8_spanish_ci NOT NULL,
  PRIMARY KEY (`id_materia`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci AUTO_INCREMENT=11 ;

--
-- Volcado de datos para la tabla `materia`
--

INSERT INTO `materia` (`id_materia`, `descripcion`, `estado`) VALUES
(1, 'Matemática', 'no activo'),
(2, 'Geografía Universal', 'no activo'),
(3, 'Geografía de Venezuela', 'activo'),
(4, 'Historia de Venezuela', 'activo'),
(5, 'Histroria Universal', 'activo'),
(6, 'ingles', 'activo'),
(7, 'Formacion de la Ciudadanía', 'activo'),
(8, 'Ciencia', 'activo'),
(9, 'Computación', 'activo'),
(10, 'lenguaje', 'activo');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `materia_semestre`
--

CREATE TABLE IF NOT EXISTS `materia_semestre` (
  `id_semestre` int(11) NOT NULL,
  `id_materia` int(11) NOT NULL,
  KEY `id_semestre` (`id_semestre`),
  KEY `id_materia` (`id_materia`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `materia_semestre`
--

INSERT INTO `materia_semestre` (`id_semestre`, `id_materia`) VALUES
(1, 1),
(1, 2),
(1, 6),
(1, 7),
(1, 10),
(2, 1),
(2, 2),
(2, 5),
(2, 6),
(2, 7),
(2, 8),
(2, 10),
(3, 1),
(3, 3),
(3, 4),
(3, 6),
(3, 7),
(3, 8),
(3, 9),
(3, 10);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `perfil`
--

CREATE TABLE IF NOT EXISTS `perfil` (
  `id_perfil` int(11) NOT NULL AUTO_INCREMENT,
  `perfil` varchar(50) COLLATE utf8_spanish_ci NOT NULL,
  PRIMARY KEY (`id_perfil`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci AUTO_INCREMENT=5 ;

--
-- Volcado de datos para la tabla `perfil`
--

INSERT INTO `perfil` (`id_perfil`, `perfil`) VALUES
(1, 'administrador'),
(2, 'facilitador'),
(3, 'coordinador'),
(4, 'vocero');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `plantel`
--

CREATE TABLE IF NOT EXISTS `plantel` (
  `id_plantel` int(11) NOT NULL AUTO_INCREMENT,
  `nombre_plantel` varchar(100) COLLATE utf8_spanish_ci NOT NULL,
  `direcc_plantel` varchar(200) COLLATE utf8_spanish_ci NOT NULL,
  `estado` varchar(50) COLLATE utf8_spanish_ci NOT NULL,
  `municipio` varchar(50) COLLATE utf8_spanish_ci NOT NULL,
  `parroquia` varchar(50) COLLATE utf8_spanish_ci NOT NULL,
  `codigo_plantel` varchar(100) COLLATE utf8_spanish_ci NOT NULL,
  `plan_de_estudio` int(11) NOT NULL,
  PRIMARY KEY (`id_plantel`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci AUTO_INCREMENT=22 ;

--
-- Volcado de datos para la tabla `plantel`
--

INSERT INTO `plantel` (`id_plantel`, `nombre_plantel`, `direcc_plantel`, `estado`, `municipio`, `parroquia`, `codigo_plantel`, `plan_de_estudio`) VALUES
(1, 'CENTRO DE EDUCACIÓN INICIAL SEMBRADORA', 'BARRIO LA SEMBRADORA ALBARICO', 'Yaracuy', 'San Felipe', 'San Felipe', 'OD01962211', 31053),
(2, 'CENTRO DE EDUCACIÓN INICIAL TAPIAS I  ', 'AV SAN MARCOS CRUCE CON 1RO. DE MAYO SECTOR I  ', ' Yaracuy ', 'San Felipe ', 'San Felipe ', ' OD01972211  ', 31051),
(3, 'CENTRO DE EDUCACION INICIAL SAN FELIPE EL FUERTE', 'AV 17 ENTRE CALLES 16 Y 17 SECTOR ITALVEN', 'Yaracuy', 'San Felipe', 'San Felipe', 'OD02012211', 31051),
(4, 'UNIDAD EDUCATIVA EL COROZO  ', 'CALLE PRINCIPAL CASERIO EL COROZO  ', ' Yaracuy ', 'San Felipe ', 'San Felipe ', ' OD02052211  ', 31049),
(5, 'CENTRO DE EDUCACION INICIAL JOSE GREGORIO HERNANDEZ', 'CALLE PRINCIPAL DE JOSE GREGORIO HERNANDEZ', 'Yaracuy', 'San Felipe', 'San Felipe', 'OD01942211', 31051),
(6, 'CENTRO DE EDUCACIÓN INICIAL TAPIAS II', 'VIA LA MARROQUINA CON AVENIDA URDANETA SECTOR III', 'yaracuy', 'san felipe', 'san felipe', 'OD02002211', 31053),
(7, 'CENTRO DE EDUCACIÓN INICIAL ORASIL HERNANDEZ', 'CALLE PRINCIPAL LA PLAYITA VIA SAN JAVIER', 'yaracuy', 'san felipe', 'san felipe', 'OD01982211', 31053),
(8, 'CENTRO DE EDUCACIÓN INICIAL SEVERIANO JIMENEZ', 'FINAL CALLE#3 ENTRE AV.1 Y 2PANAMERICANA SECTOR CANTARRANA', 'yaracuy', 'san felipe', 'san felipe', 'OD02022211', 31049),
(9, 'UNIDAD EDUCATIVA EL PEÑON', 'CARRETERA PANAMERICANA VIA MORON SECTOR EL PEÑON', 'yaracuy', 'san felipe', 'san felipe', 'OD02062211', 31053),
(10, 'UNIDAD EDUCATIVA TESORERO', 'CASERIO TESORERO ABAJO KILOMETRO 30', 'yaracuy', 'san felipe', 'san felipe', 'OD02092211', 32010),
(11, 'CENTRO DE EDUCACIÓN INICIAL STTE CARLOS A. COLMENAREZ YANEZ', 'FINAL DE LA QUINTA AVENIDA VIA EL COROZO INSTALACIONES DEL DESTACAMENTO N. 45', 'yaracuy', 'san felipe', 'san felipe', 'OD02862211', 41000),
(12, 'CENTRO DE EDUCACIÓN INICIAL IGNACIO OSORIO', 'FINAL AV LA PATRIA FRENTE AL TERMINAL VIEJO', 'yaracuy', 'san felipe', 'san felipe', 'OD03582211', 32010),
(13, 'CENTRO DE EDUCACIÓN INICIAL APOLONIA PALAVICINI', 'calle PRINCIPAL S/N LA TRILLA', 'Yaracuy', 'San Felipe', 'San Felipe', 'OD03632211', 32010),
(14, 'CENTRO DE EDUCACIÓN INICIAL GENERAL ROGELIO FREYTEZ', 'CALLE REAL DE MARINCITO', 'yaracuy', 'san felipe', 'san felipe', 'OD03662211', 32010),
(15, 'CENTRO DE EDUCACIÓN INICIAL GUARAPO NER 296', 'CALLE PRINCIPAL GUARAPO', 'yaracuy', 'san felipe', 'san felipe', 'OD03672211', 32012),
(16, 'CENTRO DE EDUCACIÓN INICIAL SAN ANTONIO (SIMONCITO)', 'URB. SAN ANTONIO', 'Yaracuy', 'San Felipe', 'San Felipe', 'OD03712211', 32013),
(17, 'CENTRO DE EDUCACIÓN INICIAL HIGUERON', 'MODULO DE SERVICIO DE HIGUERON', 'Yaracuy', 'San Felipe', 'San Felipe', 'OD03722211', 31053),
(18, 'UNIDAD EDUCATIVA LA MOSCA', 'CALLE LA MOSCA CON CALLEJON COUNTRY CLUB', 'Yaracuy', 'San Felipe', 'San Felipe', 'OD04022211', 31050),
(19, 'CENTRO DE EDUCACIÓN INICIAL CHARITO', 'ALBARICO', 'yaracuy', 'san felipe', 'san felipe', 'OD0368221', 32010),
(20, 'CENTRO DE EDUCACIÓN INICIAL JOBITO', 'CALLE PRINCIPAL JOBITO', 'yaracuy', 'san felipe', 'san felipe', 'OD03742211', 32013),
(21, 'ESCUELA BÁSICA CARMEN DE RAMIREZ', 'FINAL CALLE PRINCIPAL DE HIGUERON ENTRE IV Y V ETAPA', 'yaracuy', 'san felipe', 'san felipe', 'OD05712211', 32010);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `semestre`
--

CREATE TABLE IF NOT EXISTS `semestre` (
  `id_semestre` int(11) NOT NULL AUTO_INCREMENT,
  `id_cohorte` int(11) NOT NULL,
  `decribe_semestre` varchar(13) COLLATE utf8_spanish_ci NOT NULL,
  `numero_semestre` int(11) NOT NULL,
  `fec_inic` varchar(13) COLLATE utf8_spanish_ci NOT NULL,
  `fec_fin` varchar(13) COLLATE utf8_spanish_ci NOT NULL,
  `fecha_registro` date DEFAULT NULL,
  `duracion_semestre` int(2) NOT NULL,
  PRIMARY KEY (`id_semestre`),
  KEY `id_cohorte` (`id_cohorte`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci AUTO_INCREMENT=4 ;

--
-- Volcado de datos para la tabla `semestre`
--

INSERT INTO `semestre` (`id_semestre`, `id_cohorte`, `decribe_semestre`, `numero_semestre`, `fec_inic`, `fec_fin`, `fecha_registro`, `duracion_semestre`) VALUES
(1, 1, 'semestre-1', 1, '09/01/2014', '10/06/2014', '2014-05-03', 21),
(2, 1, 'semestre-2', 2, '20/06/2014', '12/01/2015', '2014-05-03', 21),
(3, 2, 'semestre-3', 3, '12/01/2015', '12/06/2015', '2014-05-03', 28);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `televisor`
--

CREATE TABLE IF NOT EXISTS `televisor` (
  `id_televisor` int(11) NOT NULL AUTO_INCREMENT,
  `id_ambiente` int(11) NOT NULL,
  `fec_asignado_tv` varchar(10) COLLATE utf8_spanish_ci NOT NULL,
  `marca_tv` varchar(40) COLLATE utf8_spanish_ci NOT NULL,
  `modelo_tv` varchar(40) COLLATE utf8_spanish_ci NOT NULL,
  `serial_de_fabrica_tv` varchar(100) COLLATE utf8_spanish_ci NOT NULL,
  `serial_ribas_tv` varchar(100) COLLATE utf8_spanish_ci NOT NULL,
  PRIMARY KEY (`id_televisor`),
  KEY `id_ambiente` (`id_ambiente`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci AUTO_INCREMENT=3 ;

--
-- Volcado de datos para la tabla `televisor`
--

INSERT INTO `televisor` (`id_televisor`, `id_ambiente`, `fec_asignado_tv`, `marca_tv`, `modelo_tv`, `serial_de_fabrica_tv`, `serial_ribas_tv`) VALUES
(1, 1, '14/01/2014', 'philips', 'FR5697', 'MA1C08140670799', 'RB95056448'),
(2, 9, '13/01/2014', 'Panasonic', 'Tc-l32b6l', 'YK21C08155370798', 'RB95656449');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuario`
--

CREATE TABLE IF NOT EXISTS `usuario` (
  `id_user` int(11) NOT NULL AUTO_INCREMENT,
  `cedula` int(8) NOT NULL,
  `nombre1` varchar(20) COLLATE utf8_spanish_ci NOT NULL,
  `nombre2` varchar(20) COLLATE utf8_spanish_ci DEFAULT NULL,
  `apellido1` varchar(20) COLLATE utf8_spanish_ci NOT NULL,
  `apellido2` varchar(20) COLLATE utf8_spanish_ci DEFAULT NULL,
  `edad` int(2) NOT NULL,
  `fec_nac` varchar(20) COLLATE utf8_spanish_ci NOT NULL,
  `direccion` text COLLATE utf8_spanish_ci NOT NULL,
  `login` varchar(30) COLLATE utf8_spanish_ci NOT NULL,
  `pass` text COLLATE utf8_spanish_ci NOT NULL,
  `sexo` char(2) COLLATE utf8_spanish_ci NOT NULL,
  `telef_user` varchar(12) COLLATE utf8_spanish_ci DEFAULT NULL,
  `correo` varchar(200) COLLATE utf8_spanish_ci DEFAULT NULL,
  `id_perfil` int(11) NOT NULL,
  `estado` varchar(10) COLLATE utf8_spanish_ci NOT NULL,
  `fec_reg` date NOT NULL,
  PRIMARY KEY (`id_user`),
  KEY `id_perfil` (`id_perfil`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci AUTO_INCREMENT=18 ;

--
-- Volcado de datos para la tabla `usuario`
--

INSERT INTO `usuario` (`id_user`, `cedula`, `nombre1`, `nombre2`, `apellido1`, `apellido2`, `edad`, `fec_nac`, `direccion`, `login`, `pass`, `sexo`, `telef_user`, `correo`, `id_perfil`, `estado`, `fec_reg`) VALUES
(1, 13795080, 'Lenne', 'Ernesto', 'Lopez', 'Ortiz', 35, '17/08/1979', 'San Felipe Edo:Yaracuy Municipio Independencia.Av.cedeño,Urbanización Canaima Norte,Calle #3', 'lenneortiz', '$2a$07$R.gJb2U2N.FmZ4hPp1y2C.ai4RPtE/JO/TVu4PNI/ss/Y9r/3tc66', 'M', '0424-2380825', 'lenneortiz.@gmail.com', 1, 'activo', '2014-04-23'),
(2, 97950798, 'Pedro', 'Josue', 'Nava', 'Peña', 24, '11/06/1990', 'San Felipe Edo.yaracuy Municipio San Felipe Urb.los Altos De Yurubi', 'pepenava', '$2a$07$R.gJb2U2N.FmZ4hPp1y2C.D4.sWEblow6D/TcxPikWKkpL79Flxq6', 'M', '0412-8503355', 'leopoldo_J@gmail.com', 3, 'activo', '2014-04-16'),
(3, 14795860, 'Luis', 'Alberto', 'Lopez', 'Ortiz', 45, '17/08/1969', 'San Felipe Edo:Yaracuy Municipio Cocorote.Av.principal,Urbanización Casa De Madera ,Calle #3', 'luisortiz', '$2a$07$R.gJb2U2N.FmZ4hPp1y2C.ai4RPtE/JO/TVu4PNI/ss/Y9r/3tc66', 'M', '0424-2380825', 'luisortiz.@gmail.com', 2, 'activo', '2014-04-16'),
(4, 97944798, 'Alberto', 'Jose', 'Parra', 'Peña', 49, '11/06/1965', 'San Felipe Edo.Yaracuy', 'albertoparra', '$2a$07$R.gJb2U2N.FmZ4hPp1y2C.D4.sWEblow6D/TcxPikWKkpL79Flxq6', 'M', '0414-8505655', 'albert_parra.@gmail.com', 4, 'activo', '2014-04-16'),
(5, 14819134, 'Alinedo', 'Carlos', 'Sanchez', 'Javier', 24, '01/04/1990', 'San Felipe Edo.yaracuy Municipio San Felipe Urb.los Pinos Calle #4', 'alinedo_sanches', '$2a$07$R.gJb2U2N.FmZ4hPp1y2C.qtBDYXdSy.HBjLOCfvnv9QiZD39bg/S', 'M', '0412-3559834', 'alinedo_Z@gmail.com', 2, 'activo', '2014-04-17'),
(6, 19192726, 'Ana', 'Abreu', 'Vicenta', 'Torres', 24, '01/04/1990', 'San Felipe Edo:Yaracuy Municipio Independencia.Av.cedeño,Urbanización Canaima Norte,Calle #1', 'vicenta_abreu', '$2a$07$R.gJb2U2N.FmZ4hPp1y2C.pyWlQstU1fKe5SxZKnbmoe.r1Lv2wSC', 'F', '0414-4559847', 'vicenta@gmail.com', 2, 'activo', '2014-04-17'),
(7, 15979031, 'Yulimar', 'Andreina', 'Navaz', 'Campos', 28, '01/04/1986', 'San Felipe Edo.yaracuy Municipio San Felipe Urb.los Mangos Calle #4', 'yulimar_andreina', '$2a$07$R.gJb2U2N.FmZ4hPp1y2C.ZvyGS2scKy5xvi7lFPJ9V2lzW0c18T6', 'F', '0412-8559456', 'yulimar_@gmail.com', 4, 'activo', '2014-04-17'),
(8, 18759156, 'Franklin', 'Santiago', 'Alejos', 'Quero', 28, '01/04/1986', 'San Felipe Edo.yaracuy Municipio Independencia', 'franklin12345', '$2a$07$R.gJb2U2N.FmZ4hPp1y2C.KN1cLYSN4zd5rtiqZ099TjsXJ2RFiYm', 'M', '0412-8503466', 'franklin_@gamil.com', 3, 'activo', '2014-04-19'),
(9, 15966099, 'Jennyfer', 'Carolina', 'Lopez', 'Isena', 30, '01/04/1984', 'Municipio Independencia Urb.virge Del Valle', 'carolina_jennyfer', '$2a$07$R.gJb2U2N.FmZ4hPp1y2C.jW2At3jCzz/krla9SlaBp6DRYMCHcUS', 'F', '0426-6749822', 'jennyfer_L@gmail.com', 3, 'activo', '2014-04-19'),
(10, 19873781, 'Luis', 'Eduardo', 'Lopez', 'Garcia', 24, '16/01/1990', 'San Felipe Edo.yaracuy Municipio Cocorote Av.2 Entre Calle 3 Y 4', 'luis_eduardo', '$2a$07$R.gJb2U2N.FmZ4hPp1y2C.cTkFqTVHKIJyXumfv6l4UY8k/bR/Bd2', 'M', '0412-4559823', 'eduardo_19@hotmail.com', 2, 'activo', '2014-04-19'),
(11, 15769073, 'Adriana', 'Thais', 'Alverez', 'Gimenez', 30, '19/05/1984', 'San Felipe Edo.yaracuy', 'adriana12345', '$2a$07$R.gJb2U2N.FmZ4hPp1y2C.Byc31FDrxegsqniY35H65CvFCEEV6yC', 'F', '0412-4559834', 'adrianaG@gmail.com', 2, 'activo', '2014-04-19'),
(12, 12937388, 'jose', 'angel', 'aguero', 'mogollon', 38, '05/04/1976', 'san felipe edo.yaracuy', 'jose_angel', '$2a$07$R.gJb2U2N.FmZ4hPp1y2C.lzfHipLO7hWiuXheOZN/BCYSX/H47Cq', 'M', '0424-3459723', 'angel_M@gmail.com', 3, '', '2014-04-19'),
(13, 8516587, 'Zulay', 'Mercedez', 'Camacho', 'Peña', 54, '01/04/1960', 'San Felipe Edo.yaracuy Municipio Independencia', 'mercedez_camacho', '$2a$07$R.gJb2U2N.FmZ4hPp1y2C.ODawKYMNGfSEtGNATyJdPDxFJO4W3VO', 'F', '0412-3454323', 'mercedez_C@hotmail.com', 2, 'activo', '2014-04-19'),
(14, 18053433, 'Frander', 'Jode', 'Añes', 'Peralta', 26, '01/04/1988', 'San Felipe Edo.yaracuy Municipio San Felipe Ubr.la Acension', 'frander_jose', '$2a$07$R.gJb2U2N.FmZ4hPp1y2C.9JJRuHy2xkHCQtOgwyq/E3NtlE.I/QG', 'M', '0426-2349765', 'frander24@hotmail.com', 2, 'activo', '2014-04-19'),
(15, 17700229, 'Alberto', 'Jose', 'Lopez', 'Campo', 27, '01/04/1987', 'San Felipe Edo.yaracuy Municipio Cocorote Av.4 Entre Calle 14 Y 15', 'alberto _hernandez', '$2a$07$R.gJb2U2N.FmZ4hPp1y2C.29p6cWnjniKnzDKdCLuJnfhjo4lP1Fi', 'M', '0412-3458874', 'hernandez@gmail.com', 3, 'activo', '2014-04-19'),
(16, 7913296, 'Yusmari', 'Margarita', 'Bravo', 'Perez', 50, '11/06/1964', 'San Felipe Edo:Yaracuy Municipio Independencia.Av.cedeño,Urbanización Canaima Norte,Calle #3', 'margarita_bravo', '$2a$07$R.gJb2U2N.FmZ4hPp1y2C.1sUfqSFE6sTsz58c57yl1XrKvu7Slr6', 'F', '0412-8584467', 'margarita_B@gmail.com', 3, 'activo', '2014-04-19'),
(17, 16110635, 'carlos', 'jose', 'gavidia', 'valero', 25, '09/05/1989', 'san felipe yaracuy', 'jose_g', '$2a$07$R.gJb2U2N.FmZ4hPp1y2C.Fd5D4sWmkzidowHboInEvDnGMDIK2Ie', 'M', '0416-4534456', 'joseG@gmail.com', 4, 'activo', '2014-05-08');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `vencedor`
--

CREATE TABLE IF NOT EXISTS `vencedor` (
  `id_vencedor` int(11) NOT NULL AUTO_INCREMENT,
  `cedula` int(11) NOT NULL,
  `nacionalidad` char(1) COLLATE utf8_spanish_ci NOT NULL,
  `nombre1` varchar(20) COLLATE utf8_spanish_ci NOT NULL,
  `nombre2` varchar(20) COLLATE utf8_spanish_ci DEFAULT NULL,
  `apellido1` varchar(20) COLLATE utf8_spanish_ci DEFAULT NULL,
  `apellido2` varchar(20) COLLATE utf8_spanish_ci DEFAULT NULL,
  `sexo` char(1) COLLATE utf8_spanish_ci NOT NULL,
  `telf_vencedor` varchar(12) COLLATE utf8_spanish_ci DEFAULT NULL,
  `fec_nac` varchar(10) COLLATE utf8_spanish_ci NOT NULL,
  `edad` int(11) NOT NULL,
  `lugar_nacimiento` varchar(200) COLLATE utf8_spanish_ci DEFAULT NULL,
  `estado_nac` varchar(50) COLLATE utf8_spanish_ci DEFAULT NULL,
  `ultimo_anio_aprobado` char(3) COLLATE utf8_spanish_ci NOT NULL,
  `grado_robinson` char(4) COLLATE utf8_spanish_ci DEFAULT NULL,
  `discapacidad` char(2) COLLATE utf8_spanish_ci DEFAULT NULL,
  `etnia_indigena` char(2) COLLATE utf8_spanish_ci DEFAULT NULL,
  `becado` char(2) COLLATE utf8_spanish_ci DEFAULT NULL,
  `estado` varchar(15) COLLATE utf8_spanish_ci NOT NULL,
  PRIMARY KEY (`id_vencedor`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci AUTO_INCREMENT=17 ;

--
-- Volcado de datos para la tabla `vencedor`
--

INSERT INTO `vencedor` (`id_vencedor`, `cedula`, `nacionalidad`, `nombre1`, `nombre2`, `apellido1`, `apellido2`, `sexo`, `telf_vencedor`, `fec_nac`, `edad`, `lugar_nacimiento`, `estado_nac`, `ultimo_anio_aprobado`, `grado_robinson`, `discapacidad`, `etnia_indigena`, `becado`, `estado`) VALUES
(1, 7589908, 'V', 'Guadalupe', '', 'Acuña', 'Elida', 'F', '0412-8504456', '10/02/1970', 44, 'Barquisimeto', 'Lara', '9', '', 'NO', '', 'SI', 'ACTIVO'),
(2, 14710857, 'V', 'Amarily', 'Angelies', 'Tovar', 'Zuluaga', 'F', '0424-2343426', '04/02/1984', 30, 'San felipe', 'Yaracuy', '9', '', 'NO', '', 'SI', 'ACTIVO'),
(3, 7585117, 'V', 'Naudi', 'Fermin', 'Lopez', 'Vasquez', 'M', '0424-2369388', '09/03/1960', 54, 'Barquisimeto', 'Lara', '9', '', 'NO', '', 'SI', 'ACTIVO'),
(4, 15769468, 'V', 'Hector', 'Jose', 'Carrillo', 'Gutierres', 'M', '0414-4459834', '08/04/1984', 30, 'San felipe', 'Yaracuy', '9', '', 'NO', '', 'SI', 'ACTIVO'),
(5, 16594321, 'V', 'Oritta', 'Carmen', 'Castillo', 'Perrazo', 'F', '0424-2343388', '01/04/1984', 30, 'San felipe', 'Yaracuy', '6', '', 'NO', '', 'SI', 'ACTIVO'),
(6, 3912752, 'V', 'Manuel', 'Antonio', 'Maya', 'Montano', 'M', '0426-2343399', '12/04/1954', 60, 'Valencia', 'Carabobo', '6', '', 'NO', 'NO', 'SI', 'ACTIVO'),
(7, 4483937, 'V', 'Julio', 'Cesar', 'Ecudero', 'Andrades', 'M', '0424-4545299', '14/06/1949', 65, 'San diego', 'Carabobo', '9', '', 'NO', 'YE', 'SI', 'ACTIVO'),
(8, 11653609, 'V', 'Saray', 'Elizabeth', 'Maita', 'Madan', 'F', '0424-3559866', '11/02/1970', 44, 'Churuguara', 'Falcón', '6', '', 'NO', '', 'SI', 'ACTIVO'),
(9, 13695096, 'V', 'Reina', 'Rafaela', 'Martinez', 'Castro', 'F', '0424-3459450', '13/06/1979', 35, 'Zaraza', 'guarico', '9', '', 'NO', '', 'SI', 'ACTIVO'),
(10, 7910463, 'V', 'Manuel', 'Alfredo', 'Quero', 'Lopez', 'M', '0416-4504477', '15/04/1970', 44, 'El Tocuyo', 'lara', '9', '', 'NO', '', 'SI', 'ACTIVO'),
(11, 12079121, 'V', 'Amparo', '', 'Zuluaga', 'Valderrama', 'F', '0412-8353345', '16/06/1978', 36, 'Meridad', 'Santa Cruz de Mora', '9', '', 'NO', '', 'SI', 'ACTIVO'),
(12, 16481702, 'V', 'Javier', 'Custodio', 'Ybarra', 'Hereidad', 'M', '0416-4504400', '20/02/1984', 30, 'Aricagua', 'miranda', '9', '', 'NO', '', 'SI', 'ACTIVO'),
(13, 17700741, 'V', 'Anthony', 'Daniel', 'Carabaño', 'Goto', 'M', '0416-4534556', '17/07/1986', 28, 'Charallave', 'miranda', '9', '', 'NO', '', 'SI', 'ACTIVO'),
(14, 7592502, 'V', 'nereida', 'coromoto', 'castellano', 'espinoza', 'M', '0412-4506534', '05/05/1970', 44, 'puerto cabello', 'carabobo', '9', '', 'NO', 'NO', 'No', 'ACTIVO'),
(15, 22318947, 'V', 'angelica', 'cesilia', 'moreno', 'guerrero', 'F', '0424-2380503', '01/04/1994', 20, 'naguanagua', 'carabobo', '9', '', 'NO', 'NO', 'No', 'ACTIVO'),
(16, 18759780, 'V', 'Julmaryis', 'Jaquelyn', 'Herrera', 'Pinto', 'F', '0412-3409874', '01/04/1988', 26, 'San felipe', 'Yaracuy', '9', '', 'NO', 'NO', 'SI', 'ACTIVO');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `video_clase_area`
--

CREATE TABLE IF NOT EXISTS `video_clase_area` (
  `id_semestre` int(11) NOT NULL,
  `id_materia` int(11) NOT NULL,
  `cantidad` int(2) DEFAULT NULL,
  KEY `id_semestre` (`id_semestre`),
  KEY `id_materia` (`id_materia`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `video_clase_area`
--

INSERT INTO `video_clase_area` (`id_semestre`, `id_materia`, `cantidad`) VALUES
(1, 1, 75),
(1, 2, 40),
(1, 6, 30),
(1, 7, 20),
(1, 10, 75),
(2, 1, 45),
(2, 2, 30),
(2, 5, 30),
(2, 6, 30),
(2, 7, 20),
(2, 8, 45),
(2, 10, 45),
(3, 1, 60),
(3, 3, 40),
(3, 4, 40),
(3, 6, 40),
(3, 7, 20),
(3, 8, 40),
(3, 9, 20),
(3, 10, 20);

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `ambiente`
--
ALTER TABLE `ambiente`
  ADD CONSTRAINT `ambiente_ibfk_1` FOREIGN KEY (`id_user_facilitador`) REFERENCES `usuario` (`id_user`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `ambiente_ibfk_2` FOREIGN KEY (`id_user_coordinador`) REFERENCES `usuario` (`id_user`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `ambiente_ibfk_3` FOREIGN KEY (`id_user_vocero`) REFERENCES `usuario` (`id_user`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `ambiente_ibfk_4` FOREIGN KEY (`id_cohorte`) REFERENCES `cohorte` (`id_cohorte`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `ambiente_ibfk_5` FOREIGN KEY (`id_semestre`) REFERENCES `semestre` (`id_semestre`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `ambiente_ibfk_6` FOREIGN KEY (`id_plantel`) REFERENCES `plantel` (`id_plantel`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `documentos`
--
ALTER TABLE `documentos`
  ADD CONSTRAINT `documentos_ibfk_1` FOREIGN KEY (`id_vencedor`) REFERENCES `vencedor` (`id_vencedor`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `dvd`
--
ALTER TABLE `dvd`
  ADD CONSTRAINT `dvd_ibfk_1` FOREIGN KEY (`id_ambiente`) REFERENCES `ambiente` (`id_ambiente`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `folleto`
--
ALTER TABLE `folleto`
  ADD CONSTRAINT `folleto_ibfk_1` FOREIGN KEY (`id_ambiente`) REFERENCES `ambiente` (`id_ambiente`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `hora_clase`
--
ALTER TABLE `hora_clase`
  ADD CONSTRAINT `hora_clase_ibfk_1` FOREIGN KEY (`id_semestre`) REFERENCES `semestre` (`id_semestre`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `hora_clase_ibfk_2` FOREIGN KEY (`id_materia`) REFERENCES `materia` (`id_materia`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `materia_semestre`
--
ALTER TABLE `materia_semestre`
  ADD CONSTRAINT `materia_semestre_ibfk_1` FOREIGN KEY (`id_semestre`) REFERENCES `semestre` (`id_semestre`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `materia_semestre_ibfk_2` FOREIGN KEY (`id_materia`) REFERENCES `materia` (`id_materia`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `semestre`
--
ALTER TABLE `semestre`
  ADD CONSTRAINT `semestre_ibfk_1` FOREIGN KEY (`id_cohorte`) REFERENCES `cohorte` (`id_cohorte`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `televisor`
--
ALTER TABLE `televisor`
  ADD CONSTRAINT `televisor_ibfk_1` FOREIGN KEY (`id_ambiente`) REFERENCES `ambiente` (`id_ambiente`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `usuario`
--
ALTER TABLE `usuario`
  ADD CONSTRAINT `usuario_ibfk_1` FOREIGN KEY (`id_perfil`) REFERENCES `perfil` (`id_perfil`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `video_clase_area`
--
ALTER TABLE `video_clase_area`
  ADD CONSTRAINT `video_clase_area_ibfk_1` FOREIGN KEY (`id_semestre`) REFERENCES `semestre` (`id_semestre`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `video_clase_area_ibfk_2` FOREIGN KEY (`id_materia`) REFERENCES `materia` (`id_materia`) ON DELETE CASCADE ON UPDATE CASCADE;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
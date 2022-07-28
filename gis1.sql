-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 16-03-2022 a las 04:02:51
-- Versión del servidor: 10.4.22-MariaDB
-- Versión de PHP: 8.0.13

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `gis1`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `paciente`
--

CREATE TABLE `paciente` (
  `idPaciente` int(11) NOT NULL,
  `nombres` varchar(60) NOT NULL,
  `apellidos` varchar(60) NOT NULL,
  `fecha_nacimiento` date NOT NULL,
  `sexo` varchar(30) NOT NULL,
  `direccion` varchar(100) NOT NULL,
  `cedula` varchar(10) NOT NULL,
  `telefono` varchar(10) NOT NULL,
  `celular` varchar(10) NOT NULL,
  `mail` varchar(50) NOT NULL,
  `latitud` float DEFAULT NULL,
  `longitud` float DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `paciente`
--

INSERT INTO `paciente` (`idPaciente`, `nombres`, `apellidos`, `fecha_nacimiento`, `sexo`, `direccion`, `cedula`, `telefono`, `celular`, `mail`, `latitud`, `longitud`) VALUES
(12, 'Lidia Esperanza', 'Enriquez Chamba', '2022-06-15', 'FEMENINO', 'Ayacucho', '1105494692', '+593995549', '+593995549', 'clientecovid2022@gmail.com', -1.66386, -78.6532);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `prueba_covid`
--

CREATE TABLE `prueba_covid` (
  `id_pruebacovid` int(11) NOT NULL,
  `idPaciente` int(11) NOT NULL,
  `n_personas_vive` int(11) NOT NULL,
  `trabaja` tinyint(1) NOT NULL,
  `estudia` tinyint(1) NOT NULL,
  `enfermedad_catastrofica` tinyint(1) NOT NULL,
  `diabetes` tinyint(1) NOT NULL,
  `sobrepeso` tinyint(1) NOT NULL,
  `seguro_iees` tinyint(1) NOT NULL,
  `nombre_contacto_emergencia` varchar(50) NOT NULL,
  `telefono_c_e` varchar(10) NOT NULL,
  `celular_c_e` varchar(10) NOT NULL,
  `mail` varchar(50) NOT NULL,
  `examen_covid` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `prueba_covid`
--

INSERT INTO `prueba_covid` (`id_pruebacovid`, `idPaciente`, `n_personas_vive`, `trabaja`, `estudia`, `enfermedad_catastrofica`, `diabetes`, `sobrepeso`, `seguro_iees`, `nombre_contacto_emergencia`, `telefono_c_e`, `celular_c_e`, `mail`, `examen_covid`) VALUES
(6, 12, 3, 1, 0, 1, 0, 1, 0, 'Carlos Perez', '032876654', '0987654321', 'carlos@gmail.com', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuario`
--

CREATE TABLE `usuario` (
  `id_usuario` int(11) NOT NULL,
  `nombre_usuario` varchar(50) NOT NULL,
  `correo` varchar(50) NOT NULL,
  `usuario` varchar(50) NOT NULL,
  `contrasena` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `usuario`
--

INSERT INTO `usuario` (`id_usuario`, `nombre_usuario`, `correo`, `usuario`, `contrasena`) VALUES
(5, 'Lidia Esperanza Enriquez Chamba', 'clientecovid2022@gmail.com', '1105494692', 'QszfxG6rxgiItr1');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `paciente`
--
ALTER TABLE `paciente`
  ADD PRIMARY KEY (`idPaciente`);

--
-- Indices de la tabla `prueba_covid`
--
ALTER TABLE `prueba_covid`
  ADD PRIMARY KEY (`id_pruebacovid`),
  ADD KEY `idPaciente` (`idPaciente`);

--
-- Indices de la tabla `usuario`
--
ALTER TABLE `usuario`
  ADD PRIMARY KEY (`id_usuario`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `paciente`
--
ALTER TABLE `paciente`
  MODIFY `idPaciente` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT de la tabla `prueba_covid`
--
ALTER TABLE `prueba_covid`
  MODIFY `id_pruebacovid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT de la tabla `usuario`
--
ALTER TABLE `usuario`
  MODIFY `id_usuario` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `prueba_covid`
--
ALTER TABLE `prueba_covid`
  ADD CONSTRAINT `prueba_covid_ibfk_1` FOREIGN KEY (`idPaciente`) REFERENCES `paciente` (`idPaciente`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
